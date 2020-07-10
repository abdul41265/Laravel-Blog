<template>
    <div>
        <div class="row">
        
            <div  class="col">
                <div v-if="loading">Loading.....</div>
                <div v-else>
                <h2>{{post.title}}</h2>
                <hr>
                <article>{{post.content}}</article>
                <button
                v-if="isLoggedIn"
                 type="submit"
                class="btn btn-primary"
                 :disabled="loading"
                @click.prevent="like"
                 >Like</button>
                 <button
                v-if="isLoggedIn"
                 type="submit"
                class="btn btn-primary"
                 :disabled="loading"
                 >Edit</button>

                <!-- <router-link :to="{name: 'post.like', params:{id}}"><h5 class="card-title">{{ count($post.likes)  }}</h5></router-link> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState} from "vuex";
export default {

    data(){
        return{
            post:null,
            loading:false
        }

    },
     computed:{

    ...mapState({
      isLoggedIn: "isLoggedIn"
    }),
  },
    created(){
        this.loading=true;
        axios
        .get(`/api/posts/${this.$route.params.id}`)
        .then(response =>{
            this.post=response.data.data;
            this.loading=false;

            });
    },

    methods: {
    async like() {
      this.loading = true;
      this.errors = null;

      try {
        // const response = await axios.get("/api/post/{id}/like",this.post.id);
        const response = await axios.get(`/api/post/${this.$route.params.id}/like`);
        
          this.$router.push({ name: "home" });
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }

      this.loading = false;
    }
  }
}
</script>