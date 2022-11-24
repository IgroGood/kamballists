<template>
    <h1>Profile</h1>
    <ProfileTabs />
    <bottom-menu />
</template>

<script>
import BottomMenu from "../items/ui/BottomMenu";
import ProfileTabs from "../items/ProfileTabs.vue";
export default {
    name: "Profile",

    components: {
        BottomMenu,
        ProfileTabs
    },
}
</script>

<style scoped>

</style>
