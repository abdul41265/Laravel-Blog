/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import router from "./routes";
import VueRouter from "vue-router";
import Index from "./index";
import Vuex from 'vuex';
import storeDefinition from "./store";

window.Vue = require('vue');

Vue.use(Vuex);

const store = new Vuex.Store(storeDefinition);


    Vue.use(VueRouter);
  
    window.axios.interceptors.response.use(
        response => {
            return response;
        },
        error => {
            if (401 === error.response.status) {
                store.dispatch("logout");
            }
    
            return Promise.reject(error);
        }
    );

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        "index": Index
    },
    async beforeCreate() {
        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadUser");
    },
});
