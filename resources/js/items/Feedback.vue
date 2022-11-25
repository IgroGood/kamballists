<template>
    <div style="padding: 1em;">
        <div class="form">
            <h1>Магазин находится здесь?</h1>
            <input v-model="organisation" class="kb-input" style="width: 100%" type="text" placeholder="Уточните адрес">

            <h2>Выберете проблему</h2>
            <!-- не колхоз-->
            <div class="type-select__wrapper" @click="($event) => {selectProblemType($event)}">
                <div class="type-select" data-value="1">Нет терминала</div>
                <div class="type-select" data-value="2">Терминал есть, но попросили оплатить
                    переводом или наличными</div>
                <div class="type-select" data-value="3">Терминал не работает</div>
            </div>
            <input type="hidden" name="type" id="type" :value="type">
            <h2>Дополните заявку</h2>
            <textarea v-model="description" class="form-textarea"
                placeholder="Например, если магазин находится в ТЦ, укажите его этаж и расположение">{{description}}</textarea>
                {{latitude}} {{longitude}}
            <button class="kb-button" @click="sendMessage">Отправить</button>
        </div>
    </div>
</template>

<script>
import ItemCheckbox from "./ui/ItemCheckbox";
export default {
    name: "Feedback",
    props: {
        latitude: Number,
        longitude: Number
    },
    components: {
        ItemCheckbox,
    },

    data() {
        return {
            organisation: '', // 2gis справочник
            description: '',
            type: 1,
        }
    },

    created() {
        //2gis протухший ключ дала для справочника =(
        this.getListOrganisation()
    },

    methods: {
        sendMessage() {
            axios.post(route('index'), {
                'organisation': '',
                'description': this.description,
                'address': `[${this.latitude},${this.longitude}]`,
                'type': this.type
            }).then(r => {
                console.log(r)
            }).catch(reason => console.log(reason.response));
        },

        getListOrganisation() {
            axios.get('https://catalog.api.2gis.com/3.0/items', {
                'q': 'кафе',
                'sort_point': '37.630866,55.752256',
                'key': '4699c8cf-0acf-4c5b-ac23-1af7f738c7ef',
            }).then(r => {
                // console.log(r)
            }).catch(reason => console.log(reason.response));
        },

        selectProblemType(e) {
            const currentProblemButton = e.target
            const wrapper = currentProblemButton.closest(".type-select__wrapper")
            const problemButtons = wrapper.querySelectorAll(".type-select")
            problemButtons.forEach(element => element.classList.remove("active"));
            currentProblemButton.classList.add("active")
            this.type = parseInt(currentProblemButton.getAttribute("data-value"))
        }
    }
}
</script>

<style lang="sass" scoped>
.hhekko
    width: 100%

.form-textarea
    display: block
    width: 100%
    max-width: 100%
    border: 1px solid #718096
    padding: 16px
    margin-bottom: 20px

.type-select
    background-color: #EAF2FF
    color: #006FFD
    padding: 0.2rem 0.5rem
    border-radius: 13px
    max-width: 550px
    &.active
      background-color: #006FFD
      color: #fff  
    &__wrapper
        display: flex
        flex-wrap: wrap
        gap: 0.5rem
</style>
