import L, { bounds, icon, point, popup } from 'leaflet'
require("leaflet/dist/leaflet.css");

const marker = L.icon({
    iconUrl: 'assets/traffic_cone.png',
    iconAnchor: [16, 32],
    popupAnchor:  [0, -32]
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
		position: "bottomleft"
	}).addTo(map);

/**
 * Function to set a popup
 * @param {array of float} latlng 
 * @returns 
 */
function setPopup(latlng) {
    var container = document.createElement("div")
    container.classList.add("text-center", "space-y-2")
    container.innerHTML = `
        <h1 class="text-center underline font-bold" id="cpdTitlePopup"></h1>
        <div id="siteInformations">
            <h1 class="text-center">N° de CPD : <span id="cpdNumberPopup"></span></h1>
            <br/>
            <h1 class="text-center">Intitulé du devis : <span id="orderTitlePopup"></span></h1>
            <h1 class="text-center">N° de devis : <span id="orderNumberPopup"></span></h1>
            <br/>
            <h1 class="text-center">Client : <span id="clientPopup"></span></h1>
            <br/>
        </div>
        <div>
            <div>Latitude: <span id="latPop">` + latlng.lat + `</span></div>
            <div>Longitude: <span id="lngPop">` + latlng.lng + `</span></div>
        </div>
        <button id="buttonCreateSite" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Créer un chantier</button>
    `
    container.querySelector('#buttonCreateSite').onclick = () => { 
        hidePanelContent(document.querySelector('#panel'))
        document.querySelector('#panelContent_site').classList.remove("hidden")
        openPanel(document.querySelector('#panel'))
        addPointInput(latlng)
        drawEdit(getPoints())

        // TODO: utiliser un proxy pour drawEdit quand on supprime un point
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

        scriptAutocomplete(map._popup)

        map.setView(e.latlng, 12)
    } 
    else {
        addPointInput(e.latlng)
        drawEdit(getPoints());
    }
}

function onPolySiteClick(e) {
    map.fitBounds(e.target._bounds)
}

function onMarkerSiteClick(e) {
    map.setView(e.target._latlng, 14)
}

// Clic map
map.on('click', onMapClick);




// SITE LAYER
const sites = JSON.parse(document.querySelector("#sites").value)

function setPopupSite(site) {
    var container = document.createElement("div")
    container.classList.add("text-center", "space-y-2")

    var cpdTitle = ""
    var cpdNum = ""
    var orderTitle = ""
    var orderNum = ""

    if(site.cpd_title != null) {
        cpdTitle = `<h1 class="text-center underline font-bold" id="titlePopup">`+ (site.cpd_title) +`</h1>`
    }
    if(site.cpdNumber != null) {
        cpdNum = `<h1 class="text-center">N° de CPD : `+ (site.cpdNumber) +`</h1><br/>`
    }
    if(site.order_title != null) {
        orderTitle = `<h1 class="text-center">Intitulé du devis : `+ (site.order_title) +`</h1>`
    }
    if(site.orderNumber != null) {
        orderNum = `<h1 class="text-center">N° de devis : `+ (site.orderNumber) +`</h1><br/>`
    }

    container.innerHTML = 
        cpdTitle +
        `<div>` + 
            cpdNum + orderTitle + orderNum + `
            <h1 class="text-center">Nom du client : `+ (site.client.name) +`</h1>
            <br/>
            <h1 class="text-center">Statut du chantier : `+ (site.status.name) +`</h1>
            <h1 class="text-center">Date du début du chantier : `+ (site.beginning) +`</h1>
            <h1 class="text-center">Créateur : `+ (site.owner.firstname) +` `+ (site.owner.lastname) +` (`+ (site.owner.email) +`)</h1>
        </div>
        <div class="flex content-around space-x-1">
            <button id="buttonEditSite" class="bg-yellow-400 transition duration-150 ease-in-out hover:bg-yellow-500 rounded-md p-1">Modifier le chantier</button>
            <button id="buttonShowIntervention" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Afficher les interventions du chantier</button>
        </div>
        `

    container.querySelector('#buttonShowIntervention').onclick = () => { 
        hidePanelContent()
        document.querySelector('#panelContent_interventions').classList.remove("hidden")
        openPanel(document.querySelector("#panel"))
        displayInterventions(site)
    };

    return container
}

sites.forEach(site => {
    let shape

    var pts = JSON.parse(site.points)

    if(site.isZone){
        shape = L.polygon(pts)
        shape.on('click', onPolySiteClick)
    }
    else if (pts.length > 1){
        shape = L.polyline(pts)
        shape.on('click', onPolySiteClick)
    }
    else{
        shape = L.marker(pts[0], {icon: marker})
        shape.on('click', onMarkerSiteClick)
    }

    shape.addTo(map)

    let container = setPopupSite(site)
    shape.bindPopup(container)
})


// LAYER EDIT
let layerEdit = L.polyline(points).addTo(map);

global.drawEdit = function(points) {
    layerEdit.remove()

    if(document.querySelector("#checkbox_zone:checked") == null)
       layerEdit = L.polyline(points).addTo(map);
    else
        layerEdit = L.polygon(points).addTo(map);
}

document.querySelector("#checkbox_zone").onclick = function() {
    layerEdit.remove()
    if (this.checked)
        layerEdit = L.polygon(getPoints()).addTo(map);
    else
        layerEdit = L.polyline(getPoints()).addTo(map);
}