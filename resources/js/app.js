require('./bootstrap');
import Vue from "vue";
import App from "./app/App";
import { routes } from "./app/routes";
import VueRouter from "vue-router";

const router = new VueRouter({
    routes,
    mode : 'history'
})


const app = new Vue({
    el: '#app',
    router : router,
    render : app => app(App),
});
