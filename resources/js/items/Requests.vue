<template>
    <ProfileTabs @tab="(type) => handleChange(type)" />
    <ProfilePlacedPage v-if="tabType === 'placed'" />
    <ProfileProcessPage v-if="tabType === 'process'" />
    <ProfileSucceedPage v-if="tabType === 'succeed'" />
    <bottom-menu />
</template>

<script>
import BottomMenu from "./ui/BottomMenu";
import ProfileTabs from "./ProfileTabs.vue";
import ProfilePlacedPage from "./ProfilePlaced.vue";
import ProfileProcessPage from "./ProfileProcess.vue";
import ProfileSucceedPage from "./ProfileSucceed.vue";

export default {
    name: "Profile",

    components: {
        BottomMenu,
        ProfileTabs,
        ProfilePlacedPage,
        ProfileProcessPage,
        ProfileSucceedPage
    },

    data() {
        return {
            tabType : "placed"
        }
    },

    mounted() {
        
    },

    methods : {
        handleChange(e) {
            this.tabType = e
        }
    }
}
</script>

<style scoped>

</style>
