<template>
    <div>
        <h1>Items</h1>
        <ItemComponent v-for="item in items" v-bind:key="item.id" v-bind:item="item"></ItemComponent>
        <div>
            <button class="btn btn-primary text-center" @click="allItems(page+1)">Load More</button>
            <LoadingComponent v-bind:loading="isLoading"></LoadingComponent>
        </div>
    </div>
</template>

<script>
import {api} from '../../api/api.js'
import { log } from 'util';

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
        this.allItems(this.page+1)
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
        }
    }
}
</script>

<style>

</style>
