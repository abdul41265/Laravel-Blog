<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-white border-bottom navbar-light">
      <router-link class="navbar-brand mr-auto" :to="{name: 'home'}">LaravelBnb</router-link>

      <ul class="navbar-nav">

        <li class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'register'}" class="nav-link">Register</router-link>
        </li>

        <li class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </li>

        
        <li class="nav-item" v-if="isLoggedIn">
          <router-link :to="{name: 'create'}" class="nav-link">Create Post</router-link>
        </li>
        <li class="nav-item" v-if="isLoggedIn">
          <a class="nav-link" href="#" @click.prevent="logout">Logout</a>

        </li>
      </ul>
    </nav>

    <div class="container mt-4 mb-4 pr-4 pl-4">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import { isLoggedIn } from '../../../laravel-vue-spa-course/resources/js/shared/utils/auth';

export default {
//   data() {
//     return {
//       lastSearch: this.$store.state.lastSearch
//     };
//   },
  computed: {
    ...mapState({
      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({
      itemsInBasket: "itemsInBasket"
    }),
    somethingElse() {
      return 1 + 2;
    }
  },
  methods: {
    async logout() {
      try {
        axios.post("/logout");
        this.$store.dispatch("logout");
      } catch (error) {
        this.$store.dispatch("logout");
      }
    }
  }
};
</script>