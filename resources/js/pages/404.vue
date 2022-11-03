<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>404</h1>
                <p>Ops...la pagina che cercavi non esiste. Vuoi <router-link :to="{ name: 'home' }">tornare alla home?</router-link></p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scoped>
    
</style>