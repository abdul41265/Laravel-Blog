
import VueRouter from "vue-router";
import Post from "./components/Post";
import Feed from "./components/Feed";
import SinglePost from "./components/SinglePost";


const routes = [
    {
        path: "/",
        component: Feed,
        name: "home",

    },

    {
        path: "/post",
        component: Post,
        name: "post"
    },
    {
        path: "/post/:id",
        component: SinglePost,
        name: "singlepost"
    },
    {
        path: "/auth/login",
        component: require("./auth/Login").default,
        name: "login"
    },
    {
        path: "/auth/register",
        component: require("./auth/Register").default,
        name: "register"
    },
    {
        path: "/admin/create",
        component: require("./components/PostCreate").default,
        name: "create"
    },
    {
        path: "/post/:id/edit",
        component: require("./components/PostEdit").default,
        name: "edit"
    }
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: "history",
  });

  export default router;