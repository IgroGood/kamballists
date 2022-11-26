import { ymapsSettings } from './ymapsSettings';

export class YandexMap {
    constructor() {

        this._element = document.querySelector(`#${ymapsSettings.elementId}`);
        if (!this._element) return;

        this.init();
        this.setMapControls();
    }

    init() {
        this._ymap = new ymaps.Map(ymapsSettings.elementId, {
            center: ymapsSettings.coordinates,
            zoom: ymapsSettings.zoom,
            controls: []
        }, {
            searchControlProvider: 'yandex#search'
        });
    }

    setMapControls() {
        // Add or remove this controls
        this._ymap.controls
            .remove("mapTools")
            .remove("trafficControl")
            .remove("typeSelector")
            .remove("searchControl")
            .remove("typeSelector")
            .remove("scaleLine")
            .remove("routeEditor");

        this._ymap.controls.add("zoomControl");
    }

    getYmap() {
        return this._ymap
    }
}