<template>
    <h1>Профиль</h1>
    <Requests v-if="currentPage === 'requests'"/>
    <UserProfile v-if="currentPage === 'profile'"/>
    <BottomMenu />
</template>

<script>
import Requests from "../items/Requests.vue";
import BottomMenu from "../items/ui/BottomMenu";
import UserProfile from "../items/UserProfile.vue";

export default {
    name: "Profile",

    components: {
        Requests,
        BottomMenu,
        UserProfile
    },

    data() {
        return {
            currentPage : "profile"
        }
    },

    mounted() {
        /// Осторожно, колхоз!
        document.querySelector(".my-requests").addEventListener("click", (e) => {
            this.currentPage = 'requests'
        })
    },

    methods: {

    }
}
</script>

<style lang="sass" scoped>

</style>
