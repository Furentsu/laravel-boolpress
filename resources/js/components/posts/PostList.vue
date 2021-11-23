<template>
    <div class="container my-5">
        <h2>All Posts:</h2>
        <PostCard v-for="(post,index) in posts" :key="index" :post="post"/>
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
            }
        },
        created() {
            axios
            .get(`${this.localhost}/api/posts/`)
            .then(response => (this.posts = response.data.posts) )
            

            
            .catch((err) => {
                console.error(err);
            });
        }
    }
</script>
