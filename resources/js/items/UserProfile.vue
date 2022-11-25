<template>
    <div class="avatar-block__wrapper">
        <div class="avatar-block__container">
            <UserAvatar />
            <div class="user-data">
                <div class="user-name">
                    {{ $page.props.user.phone }}
                </div>
                <div class="user-points__wrapper">
                    <div class="user-points__avatar">
                        <Avatar class="svg" />
                        291
                    </div>

                    <div class="user-points__coins">
                        <Coins class="svg" />
                        293
                    </div>
                </div>
            </div>
        </div>

        <div class="user-rating__wrapper">
            <div class="user-rating__outer">
                <div class="user-rating__inner"></div>
            </div>
            <Star class="svg" />
        </div>

    </div>

    <div class="user-menu">
        <div class="user-menu__item">
            <h3>Заполнить профиль</h3>
            подарим 300 Owl-баллов
        </div>
        <div class="user-menu__item my-requests">Мои заявки</div>
        <div class="user-menu__item">Друзья</div>
        <div class="user-menu__item">Настройки</div>
        <div class="user-menu__item">Тех. поддержка</div>
    </div>
</template>

<script>
import UserAvatar from './ui/icons/UserAvatar.vue';
import Star from './ui/icons/Star.vue'
import Avatar from './ui/icons/Avatar.vue'
import Coins from './ui/icons/Coins.vue'

export default {
    components: {
        UserAvatar,
        Star,
        Avatar,
        Coins
    }
}
</script>

<style lang="sass" scoped>
.avatar-block
    &__wrapper
        padding: 2rem 0rem
        display: flex
        align-items: center
        justify-content: center
        flex-direction: column
    &__container
        display: flex
.svg
    display: block
    fill: #777777

.user
    &-data
        margin-left: 1.7rem

    &-name
        font-weight: 700
        font-size: 20px

    &-points
        &__wrapper
            display: flex
            align-items: center
            justify-content: space-between
            margin-top: 1rem
            gap: 3rem

    &-rating

        &__wrapper
            padding: 3rem 1rem 1rem 1rem
            display: flex
            align-items: center
            gap: .5rem
            justify-content: space-between
            width: 100%


        &__outer
            display: block
            width: 100%
            border-radius: 15px
            background-color: #e2e8f0
            height: 12px

        &__inner
            display: block
            width: 37%
            height: 12px
            background-color: #006FFD
            border-radius: 15px
    &-menu

        &__item
            padding: 0.9rem 0rem
            margin-left: 2rem
            margin-right: 2rem
            border-bottom: 1px solid #e2e8f0
            h3
                padding: 0
                margin: 0
            &::after
                content: ''
                display: inline-block
                background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAANCAYAAACdKY9CAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAC3SURBVHgBjZK9DcIwEIXvAhItIzBCVmAS0wWqYCZwWgqOFChQkUxCNoANmAOKHLZFJCzZxq/wn96ne2cb4Cui65zolMMfZeOCs5cAnNzr+iKSABxmnR4fA3NL1KgQgL8bEwvwfdP1cmCupNyoKDDqQE2LiMIHeYEYFARsxOP5qaeFhpYa6s3ZNGjWFawZUcntuo9WsGYTx5jLooJQD84tecwOkGJ2ejAvjQw5I652ZdFBivYJf+kDvtNQBNE1JFkAAAAASUVORK5CYII=')
                height: 12px
                width: 12px

</style>
