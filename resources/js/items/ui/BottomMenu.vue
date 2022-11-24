<template>
    <div class="bottom-menu">
        <ul class="bottom-menu__list">
            <li><a class="icon icon-map" :href="route('app.home')">Карта</a></li>
            <li><a class="icon icon-avatar" :href="route('app.avatar')">Аватар</a></li>
            <li><a class="icon icon-partners" :href="route('app.partners')">Партнеры</a></li>
            <li><a class="icon icon-profile" :href="route('app.profile')">Профиль</a></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "BottomMenu"
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
.icon
    display: flex
    flex-direction: column
    align-items: center
    &::before
        content: ''
        background-color: #0073ff
        width: 32px
        height: 32px
    &-map
    &-avatar
    &-partners
    &-profile
</style>
