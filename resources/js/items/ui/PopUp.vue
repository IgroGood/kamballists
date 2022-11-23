<template>
    <div v-show="modelValue" class="modal fixed" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <slot></slot>
    </div>
    <div v-show="modelValue" class="modal-back" v-on:click="this.$emit('update:modelValue', $event.target.style.display === 'none')"></div>
</template>

<script>
export default {
    name: "PopUp",
    props: {
        modelValue: {
            type: Boolean,
            default: false
        },
    },
}
</script>

<style lang="sass" scoped>
.modal
    background-color: #fff
    padding: 20px
    max-height: 80vh
    overflow: auto
    z-index: 100
.modal-back::before
    display: block
    content: ''
    position: fixed
    top: 0
    left: 0
    width: 100vw
    height: 100vh
    background: linear-gradient(0deg, rgba(28, 91, 147, 0.5), rgba(28, 91, 147, 0.5))
</style>
