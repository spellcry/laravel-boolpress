<template>
    <div class="tags">
        <ul class="tags-list">
            Tags:
            <li class="list-item" v-for="(tag, index) in tags" :key="index">{{ tag.name }}</li>
        </ul>
    </div>
</template>
<script>
export default {
    props: ['tags']
}
</script>
<style lang="scss" scoped>
    .tags-list {
        display: flex;
        gap: 1rem;
        padding-left: 0;
        list-style-type: none;
    }
</style>