<template>
    <div class="post">
        <img class="post__img" v-if="post.cover" :src="post.cover_path" alt="">
        <h3 class="post__title">
            {{ post.title }}
        </h3>
        <p class="post__category">
            {{ post.category ? post.category.name : null }}
        </p>
        <p class="post__created-at">
            {{ post.date }}
        </p>
    </div>
</template>
<script>
export default {
    props: {
        post: Object,
    }
}
</script>
<style lang="scss" scoped>
    .post {
        height: 100%;
    }
    .post__img {
        width: 100%;
    }
</style>