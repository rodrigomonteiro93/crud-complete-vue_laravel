<template>

    <div class="card">
        <div class="card-header">Publicado em: {{ thought.created_at }} - Atualizado em: {{ thought.updated_at }}</div>
        <div class="card-body">
            <input v-if="editMode" class="form-control" type="text" v-model="thought.description" />
            <p v-else>
                {{ thought.description }}
            </p>
        </div>
        <div class="card-footer al">
            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">Guardar alterações</button>
            <button v-else class="btn btn-info" v-on:click="onClickEdit()">Editar</button>
            <button class="btn btn-danger" v-on:click="onClickDelete()">Excluir</button>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['thought'],
        data(){
            return{
                editMode: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete(){
                axios.delete(`/thought/${this.thought.id}`).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit(){
                this.editMode = true;
            },
            onClickUpdate(){
                const params = {
                    description : this.thought.description
                };
                axios.put(`/thought/${this.thought.id}`, params).then((response) => {
                    this.editMode = false;
                    const thought = response.data;
                    this.$emit('saveEdition', thought);
                });
            }
        }
    }
</script>
