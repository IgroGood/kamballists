<template>
    <input type="checkbox" id="checkbox" class="custom-checkbox" name="checkbox"/>
    <label for="checkbox"><slot></slot></label><br>
</template>

<script>
export default {
    name: "ItemCheckbox"
}
</script>

<style lang="sass" scoped>
.custom-checkbox
    position: absolute
    z-index: -1
    opacity: 0

.custom-checkbox+label
    display: inline-flex
    align-items: center
    user-select: none
    cursor: pointer
    font-size: 16px
    margin-bottom: 10px
.custom-checkbox+label::before
    content: ''
    display: inline-block
    width: 13px
    height: 13px
    border: 1px solid #1C5B93
    border-radius: 2px
    margin-right: 5px
    background-repeat: no-repeat
    background-position: center center
    background-size: 50% 50%
.custom-checkbox:checked+label::before
    background-image: url(/images/check-mark.svg)
    background-position: 50% 50%
    background-size: cover
</style>
