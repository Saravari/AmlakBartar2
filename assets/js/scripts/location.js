var element = [];
element[0] = document.getElementById('lat').value;
element[1] = document.getElementById('lng').value;
setLocation = [element[0],element[1]];
var map = L.map('mylocation').setView(setLocation, 14);
L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
map.attributionControl.setPrefix(false);
var marker = new L.marker(setLocation, {
    draggable: false
});
map.addLayer(marker);
