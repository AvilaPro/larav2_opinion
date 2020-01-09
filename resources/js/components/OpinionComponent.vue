<template>
    <div class="card">
        <div class="card-header">Publicado en: {{ opinion.created_at }} - Ultima Actualizacion: {{  opinion.updated_at }}</div>

            <div class="card-body">
                <input v-if="editMode" type="text" class="form-control" v-model="opinion.description">
                <p v-else>{{ opinion.description }}</p>
                
            </div>

            <div class="card-footer">
                <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()" >
                    Guardar Cambios
                </button>
                <button v-else class="btn btn-info" v-on:click="onClickEdit()" >
                    Editar Opinion
                </button>
                <button class="btn btn-danger" v-on:click="onClickDelete()">
                    Eliminar Opinion
                </button>
            </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: ['opinion'], //Obtencion externa del obj opinion

        data() {
            return{
                editMode: false
            }
        },

        mounted() {
            console.log('Component OpinionComponent.')
        },

        methods: {
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                const id = this.opinion.id;
                const url = 'http://my-opinion/opiniones/';
                const params = {
                    description: this.opinion.description
                }
                axios.put(url + id, params).then((response) => {
                    this.editMode = false;
                    const opinion = response.data;
                    this.$emit('update', opinion);
                });                
            },
            onClickDelete() {
                const id = this.opinion.id;
                const url = 'http://my-opinion/opiniones/';
                axios.delete(url + id).then(() => {
                    this.$emit('delete');
                })                
            }
        }
    }
</script>
