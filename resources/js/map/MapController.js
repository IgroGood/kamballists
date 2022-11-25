let colorMap = new Map()

colorMap.set("green", "#52f705ff")
colorMap.set("red", "#e01010ff")
colorMap.set("yellow", "yellow")

export default class MapController {
    constructor(ymap) {
        this._ymap = ymap
        this._currentBaloon = null
        this.addMapEventListeners()
    }

    displayOrganizationPoint(organizationPoint) {
        this._ymap.geoObjects
            .add(new ymaps.Placemark([organizationPoint.latitide, organizationPoint.longitude], {
                balloonContentHeader: organizationPoint.title,
                balloonContentBody: organizationPoint.description
            }, {
                preset: 'islands#circleIcon',
                // iconLayout : 'iconShadowLayout',
                iconColor: colorMap.get(organizationPoint.type)
            }))
    }

    setUserPoint(latitide, longitude) {
        this._currentBaloon = new ymaps.Placemark([latitide, longitude], {
            balloonContentHeader: "Вы здесь",
            balloonContentBody: "На страже безопасности безналичных платежей!"
        }, {
            preset: 'islands#dotIcon',
            // iconLayout : 'iconShadowLayout',
            iconColor: "red"
        })

        this._ymap.geoObjects
            .add(this._currentBaloon)

        this.currentBaloonCoords = {
            latitude: latitide,
            longitude: longitude
        }
    }

    setPointByClick(e) {
        if (this._currentBaloon) {
            this._ymap.geoObjects.remove(this._currentBaloon)
        }

        const coords = e.get('coords');
        this._currentBaloon = new ymaps.Placemark(coords, null, {
            preset: 'islands#blueDotIcon'
        });

        this._ymap.geoObjects
            .add(this._currentBaloon);

        this.currentBaloonCoords = {
            latitude: coords[0],
            longitude: coords[1]
        }
    }

    addMapEventListeners() {
        this._ymap.events.add('click', this.setPointByClick.bind(this))
    }

} 