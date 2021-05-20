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
        // <div class="flex justify-between mx-1">
        //         <button type="button" class="rounded-lg p-1 hover:bg-green-700">
        //             <svg class="h-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        //                 <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
        //             </svg>
        //         </button>

        //         <button type="button" class="rounded-lg p-1 hover:bg-green-700">
        //             <svg class="h-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        //                 <path fill="currentColor" d="M413.1 222.5l22.2 22.2c9.4 9.4 9.4 24.6 0 33.9L241 473c-9.4 9.4-24.6 9.4-33.9 0L12.7 278.6c-9.4-9.4-9.4-24.6 0-33.9l22.2-22.2c9.5-9.5 25-9.3 34.3.4L184 343.4V56c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24v287.4l114.8-120.5c9.3-9.8 24.8-10 34.3-.4z"></path>
        //             </svg>
        //         </button>
        //     </div>
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
    let text = document.getElementById(input_id).value.trim()
    document.getElementById(div_id).innerHTML = text
    document.querySelector("#buttonCreateSite").className = "hidden"
}