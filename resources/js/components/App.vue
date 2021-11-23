<template>
    <div class="container my-5">
        <main>
            <PostList/>
        </main>
    </div>
</template>

<script>

import PostList from "./posts/PostList.vue"

    export default {
        name: 'App',
        data() {
            return {

            }
        },
        components: {
            PostList,
        },
    }
</script>
