<template>
    <h2>Магазин находится здесь?</h2>
    <form action="post">
        <input type="text" name="address" id="">
        <div id="map"></div>
        <label for="problem_type">Выберите проблему</label>
        <div class="wrapper">
            <div class="problem-type" data-value="no-therminal">Нет терминала</div>
            <div class="problem-type" data-value="not-working">Терминал не работает</div>
            <div class="problem-type" data-value="baryga">Терминал есть, но попросили оплатить переводом или наличными
            </div>
        </div>

        <label for="additional_text">Дополните заявку</label>
        <textarea name="additional_text" id=""></textarea>
        <input type="file" name="photo" id="">
        <input type="hidden" name="problem_type">
    </form>
</template>

<style lang="sass" scoped>
h2
    text-align: center

label
    font-weight: 700
    margin-bottom: 1rem
    display: block

.wrapper
    display: flex
    gap: 10px
    align-items: center
    justify-content: flex-start
    flex-wrap: wrap
.problem-type
    display: block
    padding: 0.5rem 0.7rem
    border-radius: 12px
    background-color: #EAF2FF
    color: #006FFD


    &.active
      background-color: #006FFD
      color: #fff
</style>