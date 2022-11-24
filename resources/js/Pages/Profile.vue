<template>
    <h1>Profile</h1>
    <ProfileTabs @tab="(type) => handleChange(type)" />
    <ProfilePlacedPage v-if="tabType === 'placed'" />
    <ProfileProcessPage v-if="tabType === 'process'" />
    <ProfileSucceedPage v-if="tabType === 'succeed'" />
    <bottom-menu />
</template>

<script>
import BottomMenu from "../items/ui/BottomMenu";
import ProfileTabs from "../items/ProfileTabs.vue";
import ProfilePlacedPage from "../items/ProfilePlaced.vue";
import ProfileProcessPage from "../items/ProfileProcess.vue";
import ProfileSucceedPage from "../items/ProfileSucceed.vue";

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
