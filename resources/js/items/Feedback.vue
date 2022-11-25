<template>
  <div style="padding: 1em;">
      <div class="form">
          <h1>Магазин находится здесь?</h1>
          <input v-model="organisation" class="kb-input" style="width: 100%" type="text" placeholder="Уточните адрес">

          <h2>Выберете проблему</h2>
<!--          колхоз-->
          <div style="display: flex; flex-direction: column">
              <label for="c1"><input v-model="c1" type="checkbox" id="c1">Нет терминала</label>
              <label for="c2"><input v-model="c2" type="checkbox" id="c2">Терминал есть, но попросили оплатить
                  переводом или наличными</label>
              <label for="c3"><input v-model="c3" type="checkbox" id="c3">Терминал не работает</label>
          </div>
<!--          кароч лень-->
<!--          <item-checkbox></item-checkbox>-->
          <h2>Дополните заявку</h2>
          <textarea v-model="description" class="form-textarea" placeholder="Например, если магазин находится в ТЦ, укажите его этаж и расположение"></textarea>
          <button class="kb-button">Отправить</button>
      </div>
  </div>
</template>

<script>
import ItemCheckbox from "./ui/ItemCheckbox";
export default {
    name: "Feedback",
    components: {
        ItemCheckbox,
    },

    data(){
        return {
            organisation: '', // 2gis справочник
            description: '',
            c1: true,
            c2: true,
            c3: true,
        }
    },

    created() {
        //2gis протухший ключ дала для справочника =(
        this.getListOrganisation()
    },

    methods: {
        sendMessage(){
            axios.post(route('index'), {
                'organisation': '',
                'description': '',
                'address': '[54.2131,55.1234]',
                'type': 1
            }).then(r => {
                console.log(r)
            }).catch(reason => console.log(reason.response));
        },

        getListOrganisation(){
            axios.get('https://catalog.api.2gis.com/3.0/items', {
                'q': 'кафе',
                'sort_point': '37.630866,55.752256',
                'key': '4699c8cf-0acf-4c5b-ac23-1af7f738c7ef',
            }).then(r => {
                console.log(r)
            }).catch(reason => console.log(reason.response));
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
</style>
