<template>
    <div class="card">
        <div class="card-header">Cual es tu opinion ahora?</div>

        <div class="card-body">
            

            <form action="" v-on:submit.prevent="newOpinion()">
                <div class="form-group">
                    <label for="">Mi opinion ahora es:</label>
                    <input type="text" class="form-control" name="opinion"
                    v-model="description">
                </div>
                <button type="submit" class="btn btn-primary">
                    Enviar Opinion
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data: function() {
            return {
                description:''
            }
        },

        mounted() {
            console.log('Component FormComponent.');        
        },

        methods: {
            newOpinion() {
                
                const params = {
                    description: this.description
                };
                this.description = '';
                axios.post('opiniones',params)
                .then((response) => {
                    const opinion = response.data;
                    this.$emit('new', opinion);
                })
                .catch(e => {
                    console.log(e);
                });
                /* let opinion = {
                    id: 2,
                    description: this.description,
                    created_at: "02/01/2020"
                }; */
                
                //alert(this.description);
            }
        }
    }
</script>