
require('./bootstrap');
import Vue from 'vue';
//window.Vue = require('vue');
import VueRouter from 'vue-router';
import {routes} from './routes';
Vue.use(VueRouter);

//Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


 
const router = new VueRouter({
    mode: 'history',
    routes:routes
    
    
});
export default router;


const app = new Vue({
    el: '#app',
    router:router,
});
