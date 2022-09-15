
require('./bootstrap');
//window.Vue = require('vue');
import vue from 'vue'
window.Vue = vue;

//import App from './App.vue';
//import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
//import axios from 'axios';
import { routes } from './routes';

Vue.use(VueRouter);
//Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
});