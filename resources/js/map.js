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
    container.className = "text-center";

    container.innerHTML = `
        <h1 class="text-center underline font-bold" id="titlePopup"></h1>
        <div>
            <h1 class="text-center">N° de commande : <span id="orderNumberPopup"></span></h1>
            <h1 class="text-center"> Nom du client : <span id="clientPopup"></span></h1>
        </div>
        <p>
            <div>Latitude: <span id="latPop">` + latlng.lat + `</span></div>
            <div>Longitude: <span id="lngPop">` + latlng.lng + `</span></div>
        </p>
        <button id="buttonCreateSite" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Créer un chantier</button>
    `;
    container.querySelector('#buttonCreateSite').onclick = () => { openPanel(document.querySelector('#panelSite'), latlng); createGeometry(sitePoints); sitePoints = [latlng]; };
    
    return container;
}

const sitePoints = []; // tableau contenant les points d'un chantier

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
        // polyline.removeLayer();
        const polyline = L.polyline(table).addTo(map);
    }
    else { 
        // map.removeLayer(L);
        const polygon = L.polygon(table).addTo(map);
    }
}

// Clic map
map.on('click', onMapClick);

// Example to use marker
// var marker = L.marker([45.77901739936284, 3.1146240234375004], {icon: mark}).addTo(map);

// Example of popup
marker.bindPopup("Je suis un chantier d'un point");
// polygon.bindPopup("Je suis une zone de chantier");

// Example of cercle
// var circle = L.circle([46.68, 2.13], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 500
// }).addTo(map);
// circle.bindPopup("I am a circle.");
