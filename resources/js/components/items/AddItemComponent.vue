<template>
    <div>
        <h2>Add new item</h2>
        <div v-show="error.msg" class="alert alert-danger" role="alert">
            {{error.msg}}
        </div>
        <form @submit.prevent="addItem">
            <div class="form-group">
                <label for="title">Title</label>
                <input v-model="item.title" type="text" class="form-control" id="title" placeholder="title">
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea v-model="item.description" class="form-control" id="desc" placeholder="Description">
                </textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" ref="file" class="form-control" id="image" 
                            v-on:change="handleFileUpload()" />
                
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
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
            item : {
                title : '',
                description: '',
                file: ''
            }
        }
    },
    methods: {
        addItem() {

            let formData = new FormData();
            formData.append('item_title', this.item.title);
            formData.append('item_description', this.item.description);
            formData.append('item_image', this.item.file);
            
            api.post("items", formData,{
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
            }).then(data => {
                alert("item created")
                this.$router.push({ name: 'home'})
               
            }).catch(err => {
                this.error.msg = err.response.data.message                
            })
        },
        handleFileUpload(){
            this.item.file = this.$refs.file.files[0];
        }
        
    }      
}
</script>

<style>

</style>
