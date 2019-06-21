<template>
    <div>
        <h2>Hi {{user.email}}</h2>        
    </div>
</template>

<script>
import {api} from '../../api/api.js'

export default {
    data: function() {
        return {
            user: {}
        }
    },

    mounted() {
        this.account()
    },

    methods: {
        account() {
            api.get('account').then(data => {
                if(data.data.ok) {
                    this.user = data.data.user
                }
            }).catch(err => {
                this.$router.push({name: 'signin'})
            })
        }
    }
}
</script>

<style>

</style>
