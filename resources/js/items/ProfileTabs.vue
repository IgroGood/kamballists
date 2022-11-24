<template>
    <div class="tabs__wrapper">
        <ul class="tabs">
            <li data-type="archive" @click="emitType($event)">Поданые</li>
            <li data-type="process" @click="emitType($event)">В процессе</li>
            <li data-type="succeed" @click="emitType($event)">Обработанные</li>
        </ul>
    </div>
</template>

<script>
export default {
    methods : {
        emitType(e) {
            const currentTab = e.target
            // console.log(e.target.getAttribute("data-type"))
            this.$emit(currentTab.getAttribute("data-type"))
            this.makeActive(currentTab)
        },

        makeActive(tab) {
            const tabs = tab.closest('ul').querySelectorAll("li")
            tabs.forEach(element => {
                element.classList.remove("active")
            })
            tab.classList.add("active")
        }
    }
}
</script>

<style lang="sass" scoped>
ul
    list-style: none
    margin-block-start: 0
    margin-block-end: 0
    margin-inline-start: 0
    margin-inline-end: 0
    padding-inline-start: 0

.tabs
    font-family: 'Inter'
    display: flex
  
    width: 100%
    justify-content: space-between
    background-color: #F8F9FE
    color: #71727A
    padding: 3px 3px
    border-radius: 16px
    
    &__wrapper
        padding: 0.2rem 0.5rem
    
    li
        padding: 10px 0
        flex-grow: 1
        display: flex
        justify-content: center
        &.active
            background-color: #fff
            border-radius: 15px

</style>