window.onload = () => {
    getLocationConstant();
};

function getLocationConstant() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
    } else {
        alert("Tu navegador no soporta la geolocalización");
    }
}

function onGeoSuccess(event) {
    let input_latitude = document.getElementById("input-latitude");
    if (typeof (input_latitude) != 'undefined' && input_latitude != null) {
        input_latitude.value = event.coords.latitude;
    }

    let input_longitude = document.getElementById("input-longitude");
    if (typeof (input_longitude) != 'undefined' && input_longitude != null) {
        input_longitude.value = event.coords.longitude;
    }
}

// If something has gone wrong with the geolocation request
function onGeoError(event) {
    alert("Error code " + event.code + ". " + event.message);
}
