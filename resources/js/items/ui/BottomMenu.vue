<template>
    <div class="bottom-menu">
        <ul class="bottom-menu__list">
            <li><a class="icon icon-map" :href="route('app.home')"><GeoIcon />Карта</a></li>
            <li><a class="icon icon-avatar" :href="route('app.avatar')"><AvatarIcon />Аватар</a></li>
            <li><a class="icon icon-partners" :href="route('app.partners')"><PartnersIcon />Партнеры</a></li>
            <li><a class="icon icon-profile" :href="route('app.profile')"><ProfileIcon />Профиль</a></li>
        </ul>
    </div>

    
</template>

<script>
import GeoIcon from "./icons/Geo.vue"
import AvatarIcon from "./icons/Avatar.vue"
import PartnersIcon from "./icons/Partners.vue"
import ProfileIcon from "./icons/Profile.vue"

export default {
    name: "BottomMenu",

    components : {
        GeoIcon,
        AvatarIcon,
        PartnersIcon,
        ProfileIcon
    }
}
</script>

<style lang="sass" scoped>
.bottom-menu
    background: #fff
    width: 100vw
    position: fixed
    bottom: 0
    box-shadow: 2px 2px 5px #6b7280
    padding: 16px 0
    &__list
        display: flex
        justify-content: center
        list-style: none
        padding: 0
        margin: 0
        li
            margin: 0 auto

            a
                svg
                    fill: #D4D6DD

                &.active
                    fill: #006FFD                   
.icon
    display: flex
    flex-direction: column
    align-items: center
    
    &-map
    &-avatar
    &-partners
    &-profile
</style>
