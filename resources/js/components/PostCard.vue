<template>
    <div class="post">
        <img class="post__img" v-if="post.cover" :src="post.cover_path" alt="">
        <h3 class="post__title">
            {{ post.title }}
        </h3>
        <p v-if="post.category" class="post__category">
            Category: {{ post.category.name }}
        </p>
        <p v-if="post.tags" class="post__tags">
            Tags: <span v-for="(tag, index) in post.tags">{{ tag.name }}{{ index < post.tags.length - 1 ? ' - ' : '' }}</span>
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