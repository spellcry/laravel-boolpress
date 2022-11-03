<template>
    <section v-if="post" class="post">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img class="image mb-3" :src="post.cover_path" alt="">
                    <h1>{{ post.title }}</h1>
                    <p>{{ slug }}</p>
                    <Tags :tags="post.tags"/>
                    <p>{{ post.category?.name }}</p>
                    <p>{{ post.content }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import Tags from '../components/Tags.vue'
export default {
    props: ['slug'],
    data() {
        return {
            post: null,
            err: {}
        }
    },
    components: {
        Tags
    },
    methods: {
        fetchPost() {
            axios.get(`/api/posts/${ this.slug }`).then(res => {
                const { post } = res.data
                this.post = post
                console.log(this.post)
            }).catch(err => {
                this.$router.replace({ name: '404'})
            })
        }
    },
    created() {
        this.fetchPost()
    }
}
</script>
<style lang="scss" scoped>
    .post {
        .image {
            max-width: 100%;
        }
    }
</style>