import { get } from "lodash"

const points_view    = document.querySelector("#points")
const points_input = document.querySelector("#inputPoints")

const getPoints = () =>
    JSON.parse(points_input.value)

const redrawPoints = () => {
    const points = getPoints()
    
    points_view.innerHTML = ""

    points.forEach(pojnt => {
        const el =  document.createElement("div")
        el.classList = "flex justify-center items-center text-center mx-1 newPoint"
        el.innerHTML = `
            <input class="rounded-lg w-1/2" type="number" step="0.0000000000001" id="inputLat" oninput="changePopup('inputLat', 'latPop');" required>
            <input class="rounded-lg w-1/2" type="number" step="0.0000000000001" id="inputLng" oninput="changePopup('inputLng', 'lngPop');" required>
        `
    });
}


/**
 * function to add on input hidden a position
 * @param {array} point 
 */
function addPointInput(point) {
    points_input.value += JSON.stringify(point)
}

/**
 * Fonction to add delimitation points in site
 * @param {array} point 
 */
function addPointOnPanel(point) {
    var newDiv = document.createElement("div")

    newDiv.classList.toggle("flex", "justify-center", "items-center", "text-center", "mx-1", "newPoint")
    newDiv.innerHTML = `
        <input class="rounded-lg w-1/2" type="number" step="0.0000000000001" id="inputLat" oninput="changePopup('inputLat', 'latPop');" required>
        <input class="rounded-lg w-1/2" type="number" step="0.0000000000001" id="inputLng" oninput="changePopup('inputLng', 'lngPop');" required>
    `
    newDiv.querySelector('#inputLat').value = point.lat
    newDiv.querySelector('#inputLng').value = point.lng

    points_view.appendChild(newDiv)
}

/**
 * Change content of the popup on the map
 * @param {button} input_id 
 * @param {button} div_id 
 */
function changePopup(input_id, div_id) {
    let text = document.getElementById(input_id).value.trim()
    document.getElementById(div_id).innerHTML = text
    document.querySelector("#buttonCreateSite").className = "hidden"
}