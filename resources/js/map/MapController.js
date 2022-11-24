let colorMap = new Map()

colorMap.set("green", "#52f705ff")
colorMap.set("red", "#e01010ff")
colorMap.set("yellow", "yellow")

export default class MapController {
    constructor(ymap) {
        this._ymap = ymap
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
}