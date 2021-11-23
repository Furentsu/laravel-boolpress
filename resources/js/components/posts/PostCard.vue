<template>

    <div class="card">
        <div class="card-header">
            {{post.title }}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{post.post_content }}</p>
                <footer class="blockquote-footer">Post by <cite title="Author">{{post.author}}</cite></footer>
            </blockquote>
        </div>
    </div>

</template>

<script>

    export default {
        name: 'PostCard',
        props: ['post'],
        data() {
            return {

            }
        },
    }
</script>