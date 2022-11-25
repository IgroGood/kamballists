<template>
    <div class="main">
        <!-- <YandexMap :settings="ymapsApiSettings" :coordinates="ymapsSettings.coordinates" class="yandex-maps">
        <YandexMarker :coordinates="[55.753723, 37.6197953]" :marker-id="200"
            :options="{ hasBalloon: true, openEmptyBalloon: true, fill: true, fillColor: '00ff00ff', openBalloonOnClick: true }"
            :properties="{ balloonContentHeader: 'Мошенники!', balloonContentBody: 'Нужно сообщить в ФНС', }" />
        </YandexMap> -->
        <div id="map" class="yandex-maps"></div>

        <pop-up v-model="showCreateNewUserModal">
            <feedback></feedback>
        </pop-up>

        <button class="kb-button button" @click="showCreateNewUserModal = true">
            Сообщить
        </button>

        <bottom-menu/>
    </div>
</template>

<script>
import { ymapsApiSettings } from '../map/ymapsSettings';
import { YandexMap } from '../map/YandexMap'
import OrganizationPoint from '../map/OrganizationPoint'
import MapController from '../map/MapController'
import userPos from "../map/geolocation"
import { loadYmap } from 'vue-yandex-maps'
import BottomMenu from "../items/ui/BottomMenu";
import PopUp from "../items/ui/PopUp";
import Feedback from "../items/Feedback";
export default {
    components: {
        BottomMenu,
        PopUp,
        Feedback
    },

    data(){
        this.place_of_incident = null
        return {
            showCreateNewUserModal: false,
        }
    },

    // Лучше сюда не смотреть.

    async mounted() {
        await loadYmap(ymapsApiSettings);

        const yandexMap = new YandexMap()
        const ymap = yandexMap.getYmap()
        const mapController = new MapController(ymap)

        const points = [
            new OrganizationPoint(62.034741, 129.729014, "red", "Мошенники", "Не берут через терминаds"),
            new OrganizationPoint(62.010546, 129.710280, "yellow", "Имеются вопросы", "Терминал есть, но предпочитают перевод"),
            new OrganizationPoint(62.040608, 129.750592, "green", "Безопасные платежи", "Всё хорошо, отличный магазин!")
        ]

        points.map(point => mapController.displayOrganizationPoint(point))

        if(userPos.latitude && userPos.longitude) {
            mapController.setUserPoint(userPos.latitude, userPos.longitude)
        }

        //Я предупреждал
        let thisObj = this;
        ymap.events.add('click', function (e) {
            if(thisObj.place_of_incident !== null)
                ymap.geoObjects.remove(thisObj.place_of_incident);
            let coords = e.get('coords');
            thisObj.place_of_incident = new ymaps.Placemark(coords, null, {
                preset: 'islands#blueDotIcon'
            });
            ymap.geoObjects.add(thisObj.place_of_incident);
        });
    },
}
</script>

<style lang="sass" scoped>
.main
    width: 100vw
    height: 100vh
    display: flex
.asd
    background-color: red
.yandex-maps
    width: 100%
.button
    width: 250px
    position: fixed
    left: 50%
    bottom: 100px
    transform: translate(-50%, 0)
</style>
