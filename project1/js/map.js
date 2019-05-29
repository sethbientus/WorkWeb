var map;
var feature;
var loca1;
function load_map() {
    map = new L.Map('map');
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
    map.attributionControl.setPrefix('');
    map.setView(new L.LatLng(36.925, -4.2056),5);
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
            feature = L.polyline( [loc1, loc4, loc2, loc3, loc1], {color: 'none'}).addTo(map);
			map.fitBounds(bounds);

        });
    });
}
// function LoadMap(){

//     var addresse = "rwanda";
//     map = new L.Map('map');L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{}).addTo(map);
//     map.attributionControl.setPrefix('');
//     $.getJSON('http://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + addresse, function(data){
//         var item = [];
//         $.each(data,function(key, val){
//             bounde = val.boundingbox;
//             var loca1 =new L.LatLng(bounde[0],bounde[3]);
//             map.setView(new L.LatLng(bounde[0],bounde[3],5));
//             console.log(new L.LatLng(bounde[0],bounde[3]));
//         });
//     });

// }