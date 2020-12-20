<template>
    <div class="card">
        <div class="card-header">O que esta pensando?</div>
        <div class="card-body">
            <form action="post" v-on:submit.prevent="newThought()">
                <div class="form-group">
                    <label for="thought">Estou pensando em:</label>
                    <input type="text" id="thought" name="thought" v-model="description" class="form-control">
                </div>
                <button class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return {
              description : ''
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newThought(){

                const param = {
                    description: this.description
                };

                this.description = '';
                axios.post('/thought', param).then((response) => {
                    const thought = response.data;
                    this.$emit('new', thought);
                });
            }
        }
    }
</script>
