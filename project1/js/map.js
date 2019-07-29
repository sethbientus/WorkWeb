var map;
function load_map() {
    map = new L.Map('map');
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
    map.attributionControl.setPrefix('');
    map.setView(new L.LatLng(36.925, -4.2056),6);
}
function search_location() {
    var latitude = document.getElementById("lati").value;
    var longitude = document.getElementById("longi").value;
    var city = document.getElementById("country").value;
    var nzoom = 12;
    var myMarker = L.marker([latitude, longitude], 
    {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map);
    map.setView(new L.LatLng(latitude,longitude), 9);
    myMarker.bindPopup("Location of the activity is in : <br>"
    +city+"<br>At latitude: " + latitude + "<br />At Longitude: " + longitude).openPopup();
}
document.getElementById("btnn").addEventListener("click", search_location);
