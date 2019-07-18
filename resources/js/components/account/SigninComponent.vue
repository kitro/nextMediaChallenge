<template>
    <div>
        <Navbar></Navbar>
        <h2>Sign in</h2>
        <div v-show="error.msg" class="alert alert-danger" role="alert">
            {{error.msg}}
        </div>
        <form @submit.prevent="signin">
            <div class="form-group">
                <label for="email">Email address</label>
                <input v-model="user.email" type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input v-model="user.password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            <router-link :to="{ name: 'signup' }" class="float-right" >Sign up</router-link>
        </form>
    </div>
</template>

<script>

import {api} from '../../api/api.js'

export default {
    data: function() {
        return {
            isLoading: false,
            error: {},
            user : {
                email : '',
                password: '',
                client_id: process.env.MIX_APP_API_CLIENT_ID,
                client_secret: process.env.MIX_APP_API_CLIENT_SECRET
            }
        }
    },

    methods: {
        signin() {
            
            api.post("signin", this.user).then(data => {
               
                // add token to api
                api.defaults.headers.common['Authorization'] = `Bearer ${data.data.access_token}`
                this.$router.push({ name: 'profile'})
               
            }).catch(err => {
                Vue.set(this.error, 'msg', err.response.data.msg)
            })
        }
    }    
}
</script>

<style>

</style>
