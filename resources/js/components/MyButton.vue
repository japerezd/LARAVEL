<template>
    <div>
        <button :type="type" class="my-button" v-text="test.name"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            //debe tener antes el api (estamos usando post) y despues el nombre de la ruta de nuestro post
            //api/vue, {} <-- no le pasamos ningun objeto
            //despues regresa un "promise con then"  
            axios.post('api/vue', {}) 
                .then(response => {
                    this.test = response.data;
                })
                .catch(function (error) {
      console.log(error.response);
                });
    
        },

        data: function(){
            return {
                test: null,
            }
        },

        props:[
            'text',
            'type'
        ]
    }
</script>

<style>
    .my-button{
        background-color: #123455;
        color:#fff;
        padding: 10px 20px;
        font-weight: bold;
    }
</style>