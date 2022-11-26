<template>
    <AppealItem v-for="appeal in appeals" :key="appeal.id" :appeal="appeal"  />
    <NoRequests v-if="!appeals || appeals.length === 0" />
</template>

<script>
import AppealItem from './ui/AppealItem.vue';
import NoRequests from './ui/NoRequests.vue'
export default {
    props : {
        appeals : Object
    },
    components : {
        NoRequests,
        AppealItem
    },

    mounted() {
        console.log(this.appeals)
    }
}
</script>

<style>

</style>