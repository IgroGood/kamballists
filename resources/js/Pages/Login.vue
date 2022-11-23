<template>
    <section>
        <div class="container">
            <h1>Камбаллисты</h1>
            <button @click="testRoute">test route</button>
            <span>{{ massage }}</span>
        </div>
    </section>
</template>

<script>
export default {
    name: "Login",
    components: {

    },

    data() {
        return {
            massage: ''
        }
    },

    methods: {
        testRoute(){
            this.massage = route('index')
        }
    }
}
</script>

<style lang="sass" scoped>

</style>
