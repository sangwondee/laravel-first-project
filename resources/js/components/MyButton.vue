<template>
    <div>
        <button :type="submit" class="my-button" v-text="text">Submit</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: [
            'text'
        ]
    }
</script>

<style>
    .my-button {
        background-color: #333;
        color: #fff;
        padding: 10px 15px;
        font-weight: bold;
    }
</style>