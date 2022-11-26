<template>
    <ProfileTabs @tab="(type) => handleChange(type)" />
    <div class="wrapper">
        <ProfilePlacedPage v-if="tabType === 'placed'" :appeals="getProcessedAppeals()" />
        <ProfileProcessPage v-if="tabType === 'process'" />
        <ProfileSucceedPage v-if="tabType === 'succeed'" :appeals="getApprovedAppeals()" />
    </div>
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
            tabType: "placed",
            appeals : this.$page.props.appeals
        }
    },

    mounted() {
       
    },

    methods: {
        handleChange(e) {
            this.tabType = e
        },

        getApprovedAppeals() {
            return this.appeals.filter(item => item.status == 1)
        },

        getProcessedAppeals() {
            return this.appeals.filter(item => item.status == 0)
        }
    }
}
</script>

<style lang="sass" scoped>
.wrapper
    padding-left: 0.7rem
    padding-right: 0.7rem

</style>
