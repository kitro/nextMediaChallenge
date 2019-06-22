<template>
    <div>
        <h2>Update password</h2>
        <div v-show="error.msg" class="alert alert-danger" role="alert">
            {{error.msg}}
        </div>
        <form @submit.prevent="updatePassword">
            <div class="form-group">
                <label for="old_password">Old password</label>
                <input v-model="user.old_password" type="password" class="form-control" id="old_password" placeholder="Old password" required>
            </div>
            <div class="form-group">
                <label for="password">New password</label>
                <input v-model="user.password" type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm password </label>
                <input v-model="user.password_confirmation" type="password" class="form-control" id="confirm-password" placeholder="Confirm password" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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
                old_password : '',
                password: '',
                password_confirmation: ''
            }
        }
    },

    methods: {
        updatePassword() {
            
            api.put("account/password", this.user).then(data => {
               
                alert("Your password has been changed successfully")
               
            }).catch(err => {
                Vue.set(this.error, 'msg', err.response.data.msg)
            })
        }
    }    
}
</script>

<style>

</style>
