<template>
    <div>
        <h2>Sign up</h2>
        <div>
            {{error.msg}}
        </div>
        <form @submit.prevent="signup">
            <div class="form-group">
                <label for="email">Email address</label>
                <input v-model="user.email" type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input v-model="user.password" type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm password </label>
                <input v-model="user.password_confirmation" type="password" class="form-control" id="confirm-password" placeholder="Confirm password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
            <router-link :to="{ name: 'signin' }" class="float-right" >Sign in</router-link>
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
                password_confirmation: '',
            }
        }
    },

    methods: {
        signup() {
            
            api.post("signup", this.user).then(data => {
                if(data.data.ok) {
                    alert("account created, sign in now")

                }
            }).catch(err => {
                this.error.msg = "Error occure"
            })
        }
    }


}
</script>

<style>

</style>
