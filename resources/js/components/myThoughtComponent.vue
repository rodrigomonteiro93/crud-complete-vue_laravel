<template>
    <div class="col-md-8">
        <form-component @new="addThought"></form-component>

        <thought-component
            v-for="(thought, index) in thoughts"
            :key="thought.id"
            :thought="thought"
            @delete="deleteThought(index)"
            @update="updateThought(index, ...arg)"
        ></thought-component>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                thoughts : []
            }
        },
        mounted() {
            axios.get('/thought').then((response) => {
                this.thoughts = response.data;
            })
        },
        methods:{
            addThought(thought){
                this.thoughts.push(thought);
            },
            deleteThought(index){
                this.thoughts.splice(index, 1);
            },
            updateThought(index, thought){
                this.thoughts[index] = thought;
            }
        }
    }
</script>
