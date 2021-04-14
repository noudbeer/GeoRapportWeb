import L from 'leaflet'
require("leaflet/dist/leaflet.css");
/**
 * Création de la map
 */
var map = L.map('map', {
		zoomControl: false,
		minZoom:5
	})
	.setView([46.68336307047757, 2.1368408203125004], 7)	// Position de base de la carte
	.on("click",      e => { L.onClick(e) })	 			// Clic sur la carte
	.on("popupopen",  e => { L.popup_opened = true })   // Ouverture d'une popup
	.on("popupclose", e => { L.popup_opened = false })  // Fermeture d'une popup
	.on("zoom",       e => { L.refreshMarkerSize() });  // Changement du niveau de zoom

/**
 * Style de la map
 */
var URLstyleMap = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
var attributionMap = "&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors";

/**
 * Copyright
 */
L.tileLayer(URLstyleMap, {
		attribution: attributionMap,
	}).addTo(map);

/**
 * Position du zoom
 */
L.control.zoom({
		position: "bottomright"
	}).addTo(map);

