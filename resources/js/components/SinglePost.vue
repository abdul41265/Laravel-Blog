<template>
    <div>
        <div class="row">
        
            <div  class="col">
                <div v-if="loading">Loading.....</div>
                <div v-else>
                <h2>{{post.title}}</h2>
                <hr>
                <article>{{post.content}}</article>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            post:null,
            loading:false
        }

    },
    created(){
        this.loading=true;
        axios
        .get(`/api/posts/${this.$route.params.id}`)
        .then(response =>{
            this.post=response.data.data;
            this.loading=false;

            });
    }
}
</script>