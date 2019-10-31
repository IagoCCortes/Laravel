<template>
    <div>
        <button class="btn btn-light mb-1" @click="likePost" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'likes'],

        mounted(){
            console.log('Component mounted.');
        },

        data : function(){
            return{
                status: this.likes,
            }
        },

        methods: {
            likePost(){
                axios.post('/like/' + this.postId)
                    .then(response => {
                    this.status = !this.status;
                    })
                    .catch(errors => {
                        if(errors.response.status == 401){
                            window.location ='/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Dislike' : 'Like';
            }
        }
    }
</script>