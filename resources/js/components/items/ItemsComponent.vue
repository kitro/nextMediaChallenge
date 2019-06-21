<template>
    <div>
        <h1>Items</h1>
        <ItemComponent v-for="item in items" v-bind:key="item.id" v-bind:item="item"></ItemComponent>
        <div>
            <button class="btn btn-primary text-center" @click="nextPage">Load More</button>
            <LoadingComponent v-bind:loading="isLoading"></LoadingComponent>
        </div>
    </div>
</template>

<script>
import {api} from '../../api/api.js'

export default {
    data : function() {
        return {
            isLoading: false,
            error: {},
            moreToLoad: true,
            page: 0,
            last_page: -1,
            items: []
        }
    }, 

    mounted() {
        this.allItems(this.page++)
    },

    methods: {
        allItems(page) {
            this.isLoading = true
            api.get(`items?page=${page}`).then(data => {
                this.items.push(...data.data.data)   
                this.last_page = data.data.last_page           
            }).finally(() => {
                this.isLoading = false
            })            
        },

        nextPage() {
            this.allItems(this.page++)
        }
    }
}
</script>

<style>

</style>
