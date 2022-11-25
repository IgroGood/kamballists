<template>
    <input type="checkbox" :id="uuid" class="custom-checkbox" name="checkbox"/>
    <label :for="uuid"><span style="width: 100%"><slot></slot></span></label><br>
</template>

<script>
let uuid = 0;

export default {
    name: "ItemCheckbox",

    beforeCreate() {
        this.uuid = "ItemCheckbox" + uuid.toString();
        uuid += 1;
    },
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
    border: 1px solid #006FFD
    border-radius: 2px
    margin-right: 5px
    background-repeat: no-repeat
    background-position: center center
    background-size: 50% 50%
.custom-checkbox:checked+label::before
    background: #006FFD
    background-position: 50% 50%
    background-size: cover
</style>
