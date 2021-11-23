<template>
    <div class="container my-5">
        <h2>All Posts:</h2>

        <div class="my_loader" v-if="loading">
            <div class="spinner-grow" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <PostCard v-else v-for="(post,index) in posts" :key="index" :post="post"/>
        
    </div>
</template>

<script>

    import PostCard from './PostCard.vue'

    export default {
        name: 'PostList',
        components: {
            PostCard,
        },
        data() {
            return {
                posts: [],
                localhost: 'http://127.0.0.1:8000',
                loading: false
            }
        },
        created() {
            this.loading = true;

            axios
            .get(`${this.localhost}/api/posts/`)
            .then(response => (this.posts = response.data.posts))

            .catch((err) => {
                console.error(err);
            })

            .then(()=> this.loading = false);
        }
    }
</script>

<style lang="scss" scoped>

    .my_loader {
        width: 100%;
        position: fixed;
        top : 0;
        left : 0;
        right : 0;
        bottom : 0;
        background-color: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index : 8;
}

</style>