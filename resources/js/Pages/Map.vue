<template>
    <!-- <YandexMap :settings="ymapsApiSettings" :coordinates="ymapsSettings.coordinates" class="yandex-maps">
        <YandexMarker :coordinates="[55.753723, 37.6197953]" :marker-id="200"
            :options="{ hasBalloon: true, openEmptyBalloon: true, fill: true, fillColor: '00ff00ff', openBalloonOnClick: true }"
            :properties="{ balloonContentHeader: 'Мошенники!', balloonContentBody: 'Нужно сообщить в ФНС', }" />
    </YandexMap> -->
    <div id="map" class="yandex-maps">

    </div>
    <div>
        Точки приёма платежей на карте
    </div>

    <bottom-menu/>
</template>

<script>
import { ymapsApiSettings } from '../map/ymapsSettings';
import { YandexMap } from '../map/YandexMap'
import OrganizationPoint from '../map/OrganizationPoint'
import MapController from '../map/MapController'
import { loadYmap } from 'vue-yandex-maps'
import BottomMenu from "../items/ui/BottomMenu";

export default {
    components: {
        BottomMenu
    },

    async mounted() {
        await loadYmap(ymapsApiSettings);

        const yandexMap = new YandexMap()
        const ymap = yandexMap.getYmap()
        const mapController = new MapController(ymap)

        const points = [
            new OrganizationPoint(55.687086, 37.529789, "red", "Мошенники", "Не берут через терминаds"),
            new OrganizationPoint(55.8, 37.65, "yellow", "Имеются вопросы", "Терминал есть, но предпочитают перевод"),
            new OrganizationPoint(55.697086, 37.529789, "green", "Безопасные платежи", "Всё хорошо, отличный магазин!")
        ]

        points.map(point => {
            console.log(point)
            mapController.displayOrganizationPoint(point)
        })
    },
}
</script>

<style lang="sass" scoped>
.asd
    background-color: red
.yandex-maps
    width: 100%
    height: 500px

</style>
