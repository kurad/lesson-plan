
require('./bootstrap');
import vue from 'vue'
window.Vue = vue;

import VueRouter from 'vue-router';
import { routes } from './routes';

Vue.use(VueRouter);


const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
});