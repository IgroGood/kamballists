<template>
    <div class="main">
        <!-- <YandexMap :settings="ymapsApiSettings" :coordinates="ymapsSettings.coordinates" class="yandex-maps">
        <YandexMarker :coordinates="[55.753723, 37.6197953]" :marker-id="200"
            :options="{ hasBalloon: true, openEmptyBalloon: true, fill: true, fillColor: '00ff00ff', openBalloonOnClick: true }"
            :properties="{ balloonContentHeader: 'Мошенники!', balloonContentBody: 'Нужно сообщить в ФНС', }" />
        </YandexMap> -->
        <div id="map" class="yandex-maps"></div>

        <pop-up v-model="showCreateNewUserModal">
            <feedback :latitude="latitude" :longitude="longitude" :address="address"></feedback>
        </pop-up>

        <pop-up v-model="showOrgModal">
<!--            <div v-if="organization != null">-->
<!--                <h1>{{organization.organisation_name}}</h1>-->
<!--                <h2>{{organization.address}}</h2>-->
<!--                <hr>-->
<!--                <h2>{{organization.description}}</h2>-->
<!--                <h4>Статус: <span>{{ organization.status }}</span></h4>-->
<!--                <h4>Отзывы</h4>-->

<!--                <ul>-->
<!--                    <li v-for="review in reviews">-->
<!--                        <h4>{{ review.description }}</h4>-->
<!--                        <p>Дата: <span>{{ review.created_at }}</span></p>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
            <OrganizationPopUp :organization="organization" :reviews="reviews"/>
        </pop-up>

        <button class="kb-button button" @click="showCreateNewUserModal = true">
            Сообщить
        </button>

        <bottom-menu/>
    </div>
</template>

<script>
import {ymapsApiSettings} from '../map/ymapsSettings';
import {YandexMap} from '../map/YandexMap'
import OrganizationPoint from '../map/OrganizationPoint'
import MapController from '../map/MapController'
import userPos from "../map/geolocation"
import {loadYmap} from 'vue-yandex-maps'
import BottomMenu from "../items/ui/BottomMenu";
import PopUp from "../items/ui/PopUp";
import Feedback from "../items/Feedback";
import OrganizationPopUp from '../items/ui/OrganizationPopUp.vue';



export default {
    components: {
        BottomMenu,
        PopUp,
        Feedback,
        OrganizationPopUp
    },

    data(){
        return {
            latitude : 0,
            longitude : 0,
            showCreateNewUserModal: false,
            showOrgModal: false,
            organization: null,
            reviews: null,
            address : null
        }
    },

    created() {
        this.getOrgs().forEach(e => { console.log(e) })
        console.log(this.getOrgs()[1])
    },

    // Лучше сюда не смотреть.

    async mounted() {
        let thisContext = this;
        await loadYmap(ymapsApiSettings);

        const yandexMap = new YandexMap()
        const ymap = yandexMap.getYmap()
        const mapController = new MapController(ymap)

        //TODO: создание кастомной фигни. НЕ забыть после хахатона
        // var iconContentLayout = ymaps.templateLayoutFactory.createClass(
        //     '<div class="icon-content-layout">ssssssssssss</div>'
        // );
        // var pointBalloonLayout = ymaps.templateLayoutFactory.createClass(
        //     '<div class="eventmap-ballon">КОНТЕНТ</div>'
        // );
        // ymaps.layout.storage.add('point#iconContent', iconContentLayout);
        // ymaps.layout.storage.add('point#pointBalloon', pointBalloonLayout);

        let pointCollection = new ymaps.GeoObjectCollection();
        this.$page.props.organisations.forEach(org => {
            var myPlacemark = new ymaps.Placemark([org.latitude, org.longitude], null, {
                preset: this.getStatusMark(org.status)
            });

            myPlacemark.events.add('click', function () {
                thisContext.openOrg(org.id);
            });

            pointCollection.add(myPlacemark);
        });

        ymap.geoObjects.add(pointCollection);

        if(userPos.latitude && userPos.longitude) {
            mapController.setUserPoint(userPos.latitude, userPos.longitude)
            this.latitude = userPos.latitude
            this.longitude = userPos.longitude
        }

        ymap.events.add('click', (e) => {
            this.latitude = mapController.currentBaloonCoords.latitude
            this.longitude = mapController.currentBaloonCoords.longitude
            mapController.getGeocodedAddress(e.get('coords'))
                .then(res => {
                    this.address = mapController.minimizeAdress(res)
                })
        });
    },

    methods: {
        openOrg(id){
            // console.log(id)
            this.showOrgModal = true

            //TODO: -_-
            this.organization = this.getOrgs()[id - 1]

            axios.post(route('organisation.reviews', id)).then(r => {
                this.reviews = r.data.data
            });

            // axios.post(route('organisation.reviews', id)).then(r => {
            //     this.organization = r.data.data
            // });

        },

        getOrgs(){
            return this.$page.props.organisations
        },

        getStatusMark(issue_id){
            switch (issue_id){
                case 1:
                    return 'islands#redDotIcon'
                case 2:
                    return 'islands#yellowDotIcon'
                case 3:
                    return 'islands#yellowDotIcon'
                case 4:
                    return 'islands#darkGreenDotIcon'
                default:
                    return 'islands#grayDotIcon'
            }
        },

        //TODO: мусор забрать
        createPlacemark(organizationPoint) {
            return new ymaps.Placemark([organizationPoint.latitide, organizationPoint.longitude], {
                iconContent: '',
            }, {
                iconLayout: 'point#iconContent',
                balloonContentLayout: 'point#pointBalloon',
                iconShape: {
                    type: 'Rectangle',
                    coordinates: [
                        [-25, -60],
                        [30, 10]
                    ]
                }
            });
        }
    }
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

<style lang="sass">
//.eventmap-ballon
//    position: fixed
//    left: 50%
//    top: 50%
//    width: 80%
//    height: 80%
//    background: white
//    transform: translate(-50%, -50%)
//    padding: 20px
</style>
