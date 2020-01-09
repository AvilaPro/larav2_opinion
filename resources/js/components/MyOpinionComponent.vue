<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form-component @new="addOpinion"></form-component>

            <opinion-component 
                v-for="(opinion, index) in opiniones"
                :key="opinion.id"
                :opinion="opinion"
                @update="updateOpinion(index, ...arguments)"
                @delete="deleteOpinion(index)">

            </opinion-component>

        </div>
    </div>
</template>

<script>
    
    export default {

        mounted() {
            console.log('Component MyOpinionComponent.');
            axios.get('/opiniones').then((response) => {
                console.log(response);
                this.opiniones = response.data;
            })
        },

        data() {
            return {
                opiniones: []
            }
        },

        methods: {
            addOpinion(opinion) {
                this.opiniones.push(opinion);
            },
            updateOpinion(index, opinion) {
                this.opiniones[index] = opinion;
            },
            deleteOpinion(index) {
                this.opiniones.splice(index, 1);
            }
        }
    }
</script>