<template>
  <div style="padding: 1em;">
      <div class="form">
          <h1>Магазин находится здесь?</h1>
          <input class="kb-input" style="width: 100%" type="text" placeholder="Уточните адрес">

          <h2>Выберете проблему</h2>
          <item-checkbox>Нет терминала</item-checkbox>
          <item-checkbox>Терминал не работает</item-checkbox>
          <item-checkbox>Терминал есть, но попросили оплатить
              переводом или наличными</item-checkbox>
          <h2>Дополните заявку</h2>
          <textarea class="form-textarea" placeholder="Например, если магазин находится в ТЦ, укажите его этаж и расположение"></textarea>
          <button class="kb-button">Отправить</button>
      </div>
  </div>
</template>

<script>
import ItemCheckbox from "./ui/ItemCheckbox";
export default {
    name: "Feedback",
    components: {
        ItemCheckbox
    },

    created() {
        this.getListOrganisation()

    },

    methods: {
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
    margin-bottom: 20px
</style>
