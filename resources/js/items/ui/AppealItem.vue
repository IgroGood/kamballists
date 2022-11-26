<template>
    <div class="wrapper">
        <div class="appeal-item">
            <div class="name">{{ appeal.description }}</div>
            <div class="address">{{ appeal.address }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        appeal: Object
    }
}
</script>

<style lang="sass" scoped>
.wrapper
    margin-top: .7rem
.appeal-item
    padding: 0.5rem 0
    border-bottom: 1px solid #bbb
.name
    color: #1F2024

.address
    color: #71727A


</style>