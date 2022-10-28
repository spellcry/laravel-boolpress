<template>
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ title }}</h1>
                <ul>
                    <li v-for="post in posts">{{ post.title }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            title: 'Boolpress Vue',
            posts: []
        }
    },
    methods: {
        fetchPosts() {
            axios.get('/api/posts')
                .then((res) => {
                    const { posts } = res.data
                    this.posts = posts
                })
        },
    },
    beforeMount() {
        this.fetchPosts()
    }
}
</script>
<style lang="scss" scoped>
    
</style>