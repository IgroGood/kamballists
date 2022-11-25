<template>
    <div v-show="modelValue" class="modal asdasd">
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
    position: fixed
    top: 50%
    left: 50%
    transform: translate(-50%, -50%)
    background-color: #fff
    border-radius: 20px
    box-shadow: 0px 3px 10px #6b7280
    padding: 2em
    max-height: 80vh
    width: 90%
    overflow: auto
    z-index: 10
.modal-back::before
    display: block
    content: ''
    position: fixed
    top: 0
    left: 0
    width: 100vw
    height: 100vh
    background: linear-gradient(0deg, rgba(28, 91, 147, 0.5), rgba(28, 91, 147, 0.5))

.modal::-webkit-scrollbar
    width: 6px
.modal::-webkit-scrollbar-track
    background: rgba(255, 255, 255, 0)
.modal::-webkit-scrollbar-thumb
    background-color: #006FFD
    border-radius: 20px
    border: 3px solid rgba(255, 255, 255, 0)
</style>
