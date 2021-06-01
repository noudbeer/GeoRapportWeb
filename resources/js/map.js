import L, { icon, point } from 'leaflet'
require("leaflet/dist/leaflet.css");

const mark = L.icon({
    iconUrl: '/storage/app/public/img/marker-icon.png',
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

/**
 * Function to set a popup
 * @param {array of float} latlng 
 * @returns 
 */
function setPopup(latlng) {
    var container = document.createElement("div")
    container.className = "text-center"
    container.innerHTML = `
        <h1 class="text-center underline font-bold" id="titlePopup"></h1>
        <div>
            <h1 class="text-center" id="orderPop" hidden>N° de commande : <span id="orderNumberPopup"></span></h1>
            <h1 class="text-center" id="clientPop" hidden>Client : <span id="clientPopup"></span></h1>
        </div>
        <p>
            <div>Latitude: <span id="latPop">` + latlng.lat + `</span></div>
            <div>Longitude: <span id="lngPop">` + latlng.lng + `</span></div>
        </p>
        <button id="buttonCreateSite" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Créer un chantier</button>
    `
    container.querySelector('#buttonCreateSite').onclick = () => { 
        openPanel(document.querySelector('#panelSite'), latlng)
        addPointInput(latlng)
        drawEdit(getPoints())
    };
    
    return container
}

function onMapClick(e) {
    if((document.querySelector("#checkbox_addPoint:checked") == null) || (panelOpen == false)) {
        var container = setPopup(e.latlng);
        
        L.popup()
        .setLatLng(e.latlng)
        .setContent(container)
        .openOn(map);
    } 
    else {
        addPointInput(e.latlng)
        drawEdit(getPoints());
    }
}

// Clic map
map.on('click', onMapClick);




// SITE LAYER
const sites = JSON.parse(document.querySelector("#sites").value)

function setPopupSite(site) {
    var container = document.createElement("div")
    container.className = "text-center"
    container.innerHTML = `
        <h1 class="text-center underline font-bold" id="titlePopup">`+ (site.name) +`</h1>
        <div>
            <h1 class="text-center">N° de commande : <span id="orderNumberPopup">`+ (site.orderNumber) +`</span></h1>
            <h1 class="text-center">Nom du client : <span id="clientPopup">`+ (site.client) +`</span></h1>
            <h1 class="text-center">Date du début du chantier : <span id="clientPopup">`+ (site.beginning) +`</span></h1>
            <h1 class="text-center">Status du chantier : <span id="clientPopup">`+ (site.status) +`</span></h1>
            <h1 class="text-center">Owner : <span id="clientPopup">`+ (site.owner) +`</span></h1>
        </div>
        <button id="buttonShowSite" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Afficher le chantier</button>
    `
    return container
}

sites.forEach(site => {
    let form
    if(site.isZone)
        form = L.polygon(JSON.parse(site.points)).addTo(map)
    else
        form = L.polyline(JSON.parse(site.points)).addTo(map)


    let container = setPopupSite(site)
    form.bindPopup(container)
})





// LAYER EDIT
let layerEdit = L.polyline(points).addTo(map);

function drawEdit(points) {
    layerEdit.remove()

    if(document.querySelector("#checkbox_zone:checked") == null)
       layerEdit = L.polyline(points).addTo(map);
    else
        layerEdit = L.polygon(points).addTo(map);
}