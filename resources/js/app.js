/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


// Signin & Signup Components

Vue.component('Signin', require('./views/Signin.vue').default);
Vue.component('Signup', require('./views/Signup.vue').default);
Vue.component('SigninComponent', require('./components/account/SigninComponent.vue').default);
Vue.component('SignupComponent', require('./components/account/SignupComponent.vue').default);

// Profile components
Vue.component('Profile', require('./views/Profile.vue').default);
Vue.component('ProfileComponent', require('./components/profile/ProfileComponent.vue').default);
Vue.component('UpdatePasswordComponent', require('./components/profile/UpdatePasswordComponent.vue').default);

// Item Components
Vue.component('Home', require('./views/Home.vue').default);
Vue.component('ItemsComponent', require('./components/items/ItemsComponent.vue').default);
Vue.component('ItemComponent', require('./components/items/ItemComponent.vue').default);

import routes from './routes/routes.js'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: routes
});
