<template>
    <div class="container my-5">
        <h2>All Posts:</h2>

        <div class="my_loader" v-if="loading">
            <div class="spinner-grow" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>

        <PostCard v-else v-for="(post,index) in posts" :key="index" :post="post"/>
        
        <!-- Pagination -->
        <nav class="w-100">
            <ul class="pagination d-flex justify-content-center mt-5">

                <li v-if="current_page > 1" class="page-item">
                    <a class="page-link" @click="getPostList(current_page - 1)" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>

                <li :class="{active: n === current_page}" v-for="n in last_page" :key="n" @click="getPostList(n)" class="page-item">
                    <a class="page-link">{{n}}</a>
                </li>

                <li v-if="current_page < last_page" class="page-item">
                    <a class="page-link" @click="getPostList(current_page + 1)" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

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
                loading: false,
                current_page: null,
                last_page: null
            }
        },
        methods: {
            getPostList(page) {
                this.loading = true;

                axios
                .get(`${this.localhost}/api/posts/?page=${page}`)
                .then(response => {
                    this.posts = response.data.posts.data;
                    
                    // const {current_page} = response.data.posts;
                    this.current_page = response.data.posts.current_page;
                    this.last_page = response.data.posts.last_page;
                })

                

                .catch((err) => {
                    console.error(err);
                })

                .then(()=> this.loading = false);
            }
        },
        created() {
            this.getPostList();
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