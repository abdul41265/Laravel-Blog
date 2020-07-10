<template>
  <div v-if="isLoggedIn" class="w-50 m-auto">
    <div class="card card-body">
      <form>
        <div class="form-group">
          <label for="title">Title</label>
          <input
            type="text"
            name="title"
         
            class="form-control"
            v-model="post.title"
            :class="[{'is-invalid': errorFor('title')}]"
          />
          <v-errors :errors="errorFor('title')"></v-errors>
        </div>

        <div class="form-group">
          <label for="content">Your content</label>
          <textarea
            type="text"
            name="content"
            
            class="form-control"
            v-model="post.content"
            :class="[{'is-invalid': errorFor('content')}]"
          />
          <v-errors :errors="errorFor('content')"></v-errors>
        </div>

        <button
          type="submit"
          class="btn btn-primary btn-lg btn-block"
          :disabled="loading"
          @click.prevent="edit"
        >Edit Post</button>

        <hr />

        <!-- <div>
          Already have an account?
          <router-link :to="{name: 'login'}" class="font-weight-bold">Log-in</router-link>
        </div> -->
      </form>
    </div>
  </div>
</template>

<script>
import validationErrors from "../mixins/validationErrors";
import { mapState} from "vuex";

export default {
 
 mixins: [validationErrors],
  data() {
    
    return {
      post: {
        title: null,
        content: null,
      },
      loading: false
    };
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
    async edit() {
      this.loading = true;
      this.errors = null;

      try {
        const response = await axios.post("/api/admin/edit",this.post);
         if(response==204){
             console.log("success");

         }
          this.$router.push({ name: "home" });
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }

      this.loading = false;
    }
  }
 
};
</script>