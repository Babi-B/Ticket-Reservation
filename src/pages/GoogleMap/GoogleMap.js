//getting user location
function getLocation() {
    navigator.geolocation.watchPosition(position => {
        let array = [position.coords.longitude, position.coords.latitude];
        console.log(array);
        return {
            array
        };
    });
}

getLocation();

//   display map
mapboxgl.accessToken = "pk.eyJ1IjoiYmVubmRpcCIsImEiOiJjazRtdWExYWwweHA4M2tuNTljbmxjcjlmIn0.ji9iFK1hYN1sP1H-Kl99Rw";

let map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v9",
    center: [9.2632243, 4.1559658],
    zoom: 15
});

map.addControl(new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true
}));
// var marker = new mapboxgl.Marker().setLngLat([9.2632243, 4.1559658]).addTo(map);