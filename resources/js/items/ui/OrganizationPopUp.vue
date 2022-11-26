<template>
    <div v-if="organization != null">
        <h1 :data-type="organization.status" class="name">{{ organization.organisation_name }}</h1>
        <div class="address">
            <GeoIcon class="svg" />{{ organization.address }}
        </div>
        <hr>
        <h3 class="description">Описание</h3>
        {{ organization.description }}
        <h3>Отзывы</h3>

        <ul>
            <li v-for="review in reviews">
                <h4>{{ review.description }}</h4>
                <p>Дата: <span>{{ review.created_at }}</span></p>
            </li>
        </ul>
    </div>
</template>


<script>
import GeoIcon from "../ui/icons/Geo.vue"

let colorMap = new Map()

colorMap.set("1", "#52f705ff")
colorMap.set("2", "#e01010ff")
colorMap.set("3", "yellow")

export default {
    components: {
        GeoIcon
    },

    props: {
        organization: Object,
        reviews: []
    }
}
</script>

<style lang="sass" scoped>
h3
    border-bottom: 1px solid #e2e8f0
    padding-bottom: 0.5rem
.svg
    fill: #e2e8f0

.address
    display: flex
    gap: .5rem

.name::before
    content: ''
    display: inline-block
    height: 18px
    width: 18px
    border-radius: 10px
    margin-right: 1rem

.name
    &[data-type='1']::before
        background-color: red
    &[data-type='2']::before
        background-color: yellow
    &[data-type='4']::before
        background-color: green


</style>
