var map;
var feature;
function load_map() {
	map = new L.Map('map');
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);
    map.attributionControl.setPrefix('');
    map.setView(new L.LatLng(36.925, -4.2056),5);
    L.marker([36.925,-4.2056]).bindPopup("Default Location").addTo(map);
}
function Search() {
    var address = document.getElementById("country");
    $.getJSON('http://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + address.value, function(data) {
        var items =[];
        $.each(data, function(key, val) {
            bound = val.boundingbox;
            var loc1 = new L.LatLng(bound[0], bound[2]);
			var loc2 = new L.LatLng( bound[1],  bound[3]);
			var bounds = new L.LatLngBounds(loc1, loc2);
			var loc3 = new L.LatLng(bound[0], bound[3]);
			var loc4 = new L.LatLng( bound[1],  bound[2]);
			feature = L.polyline( [loc1, loc4, loc2, loc3, loc1], {color: 'red'}).addTo(map);
			map.fitBounds(bounds);
        });
    });
}
window.onload = load_map;