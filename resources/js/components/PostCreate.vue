<template>
  <div v-if="isLoggedIn" class="w-50 m-auto">
    <div class="card card-body">
      <form>
        <div class="form-group">
          <label for="title">Title</label>
          <input
            type="text"
            name="title"
            placeholder="Enter your name"
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
            placeholder="Enter your content"
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
          @click.prevent="make"
        >Create Post</button>

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
  methods: {
    async make() {
      this.loading = true;
      this.errors = null;

      try {
        const response = await axios.post("/api/admin/create",this.post);
        
          this.$router.push({ name: "home" });
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }

      this.loading = false;
    }
  }
 
};
</script>