<template>
    <NoRequests v-if="!appeals || appeals.length === 0" />
</template>


<script>
import NoRequests from './ui/NoRequests.vue'

export default {
    props : {
        appeals : Object
    },

    components : {
        NoRequests
    },

    mounted() {
        console.log(this.appeals)
    }
}
</script>