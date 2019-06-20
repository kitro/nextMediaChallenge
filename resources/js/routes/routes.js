import Vue from 'vue'
import VueRouter from 'vue-router'

// Signin & Signup Components
import Signin from '../views/Signin'
import Signup from '../views/Signup'
import Home from '../views/Home'
import Profile from '../views/Profile'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [  
        {
            path: '',
            name: 'signin',
            component: Signin,
        },   
        {
            path: '/signup',
            name: 'signup',
            component: Signup,
        },   
        {
            path: '/home',
            name: 'home',
            component: Home,
        },   
        {
            path: '/profile',
            name: 'profile',
            component: Profile,
        },   
    ],
})
