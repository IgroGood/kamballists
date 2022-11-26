let userPos = {
    latitude : null,
    longitude : null
}

navigator.geolocation.getCurrentPosition((position) => {
        userPos.latitude = position.coords.latitude
        userPos.longitude = position.coords.longitude
    }, (error) => {
        console.warn(`Geolocation Error (${error.code}): ${error.message}`);  
    }, {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    }
)

export default userPos;