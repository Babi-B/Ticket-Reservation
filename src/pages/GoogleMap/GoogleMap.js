//getting user location
let userLocation = function getLocation() {
    navigator.geolocation.getCurrentPosition(position => {
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

var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-79.4512, 43.6568],
    zoom: 5
});

var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl
});

document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
// var marker = new mapboxgl.Marker().setLngLat([9.2632243, 4.1559658]).addTo(map);