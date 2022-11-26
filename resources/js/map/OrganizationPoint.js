// type OrganizationType = "green" | "yellow" | "red"

export default class OrganizationPoint {
    // latitide: number
    // longitude: number
    // title: string
    // description: string
    // type: OrganizationType

    constructor(latitide, longitude, type, title, description) {
        this.latitide = latitide,
        this.longitude = longitude,
        this.type = type,
        this.title = title,
        this.description = description
    }
}