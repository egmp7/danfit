/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('navbar', require('./components/inc/Navbar.vue').default);
Vue.component('app', require('./components/App.vue').default);


/**
 * Import ROUTER
 */


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
   
const routes = [
    { path: '/', component: require('./components/comp/User.vue').default},
    { path: '/tipo', component: require('./components/comp/Tipo.vue').default },
    { path: '/calendario', component: require('./components/comp/Calendario.vue').default },
    { path: '/configuracion', component: require('./components/comp/Configuracion.vue').default },
    { path: '/workout', component: require('./components/comp/Workout.vue').default }


  ]

const router = new VueRouter({
  routes // short for `routes: routes`
})  

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
