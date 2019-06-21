<template>
    <div class="card-item">
        <div class="card" style="width: 18rem;">
        <img :src="item.image_path" class="card-img-top" :alt="item.title">
        <div class="card-body">
            <p class="card-title">{{item.title}}</p>
            <p class="card-text">{{item.description}}</p>
        </div>
        </div>
        
    </div>
</template>

<script>
export default {
    props: {
        item: Object
    }
}
</script>

<style>
.card-item {
    display: inline-block;
    padding: 10px;
}
</style>
