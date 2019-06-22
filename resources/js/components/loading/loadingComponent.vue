<template>
    <div class="d-flex justify-content-center">
        <div v-show="loading" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            loading : {
                type: Boolean,
                default: false
            }
        }
    }

</script>

<style>

</style>
