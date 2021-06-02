const points_view    = document.querySelector("#points")
const points_input = document.querySelector("#inputPoints")

const getPoints = () =>
    JSON.parse(points_input.value)

const setPoints = (data) => {
    points_input.value = JSON.stringify(data)
    redrawPoints()
}

const removePoints = () => {
    points_input.value = JSON.stringify([])
    redrawPoints()
}

const redrawPoints = () => {
    const points = getPoints()
    
    points_view.innerHTML = ""

    points.forEach(point => {
        const el =  document.createElement("div")
        el.classList = "flex justify-between items-center text-center newPoint"
        el.innerHTML = `
            <div class="flex justify-center items-center text-center mx-1">
                <input class="rounded-lg w-1/2" type="text" step="0.0000000000001" value="${point.lat}" id="inputLng" oninput="changePopup('inputLng', 'lngPop');" required>
                <input class="rounded-lg w-1/2" type="text" step="0.0000000000001" value="${point.lng}" id="inputLat" oninput="changePopup('inputLat', 'latPop');" required>
            </div>

            <button class="rounded-lg w-9 h-9 bg-red-500 hover:bg-red-600 font-bold mx-1" type="button" onclick="deletePoint(${point})">X</button>
        `
        points_view.appendChild(el)
    });
}

/**
 * function to add on input hidden a position
 * @param {array} point 
 */
function addPointInput(point) {
    const points = getPoints()
    points.push(point)
    setPoints(points)
}

/**
 * function to delete one point
 * @param {array} point 
 */
function deletePoint(point) {
    let points = getPoints()
    console.log(points)
    points.splice(0, 1, point)
    setPoints(points)
    console.log(points)
}

/**
 * Change content of the popup on the map
 * @param {button} input_id 
 * @param {button} div_id 
 */
function changePopup(input_id, div_id) {
    let text = document.querySelector("#"+input_id).value.trim()
    document.querySelector("#"+div_id).innerHTML = text
    
    // Show site's informations
    document.querySelector("#siteInformations").removeAttribute("hidden")
}