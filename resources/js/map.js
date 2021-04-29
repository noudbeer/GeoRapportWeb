import L, { icon, point } from 'leaflet'
require("leaflet/dist/leaflet.css");


const mark = L.icon({
    iconUrl: '../storage/app/public/img/marker-icon.png',
 });

/**
 * Création de la map
 */
let map = L.map('map', {
		zoomControl: false,
		minZoom:4
	})
	.setView([46.68336307047757, 2.1368408203125004], 6);	// Position de base de la carte

/**
 * Copyright
 */
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
		attribution: "&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors",
	}).addTo(map);

/**
 * Position du zoom
 */
L.control.zoom({
		position: "bottomright"
	}).addTo(map);

function setPopup(latlng) {
    var container = document.createElement("div");

    container.innerHTML = `
        <div class="text-center">
            <p>
                <div>Latitude: ` + latlng.lat + `</div>
                <div>Longitude: ` + latlng.lng + `</div>
            </p>
            <button id="buttonCreateSite" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Créer un chantier</button>
        </div>
    `;
    container.querySelector('#buttonCreateSite').onclick = () => { openPanel(document.querySelector('#panelSite'), latlng); createGeometry(sitePoints); sitePoints = [latlng]; };
    
    return container;
}


let sitePoints = []; // tableau contenant les points d'un chantier

function onMapClick(e) {
    if((document.querySelector("#checkbox_addPoint:checked") == null) || (panelOpen == false)) {
        var container = setPopup(e.latlng);
        
        L.popup()
        .setLatLng(e.latlng)
        .setContent(container)
        .openOn(map);
    } 
    else {
            sitePoints.push(e.latlng);
            addPointOnPanel(e.latlng);
            createGeometry(sitePoints);
    }
}

function createGeometry(table) {
    if(document.querySelector("#checkbox_linear:checked") == null) {
        // map.removeLayer(L); //ça ne march point !!
        L.polyline(table).addTo(map);
    }
    else { 
        // map.removeLayer(L);
        L.polygon(table).addTo(map);
    }
}

// Clic map
map.on('click', onMapClick);

L.marker([45.77901739936284, 3.1146240234375004], {icon: mark}).addTo(map);
// var marker = L.marker([46.68336307047757, 2.1368408203125004])
//     .addTo(map);

    
// var polygon = L.polygon([
//     [43, 4],
//     [43, 2],
//     [45, 2],
//     [45, 4]
// ]).addTo(map);
    



// marker.bindPopup("Je suis un chantier d'un point");
// polygon.bindPopup("Je suis une zone de chantier");

// var circle = L.circle([46.68, 2.13], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 500
// }).addTo(map);
// circle.bindPopup("I am a circle.");

// var popup = L.popup()
//     .setLatLng([46.2, 2.2])
//     .setContent("I am a standalone popup.")
//     .openOn(map);

// function onMapClickAlert(e) {
//     alert("You clicked the map at " + e.latlng);
// }
