///////////////////
//      MENU     //
///////////////////

function openDropdown() {
    var menu = document.getElementById("menu");
    menu.className = "absolute inset-y-0  h-full w-full z-5000 bg-green-700 divide-y-2 divide-black divide-solid transition duration-250 ease-in-out sm:origin-top-left sm:absolute sm:w-auto"; 
}

function closeMenu(menu) {
    menu.className = "absolute inset-y-0 h-full z-5000 transform -translate-x-full transition duration-250 ease-in-out";
}

///////////////////
//     PANELS     //
///////////////////

let panelOpen = false;
let panelRetracted = false;

function openPanel(panel, point) {
    if(panelOpen)
        closePanel(panel);

    panel.classList.toggle("translate-x-full");
    panel.querySelector('#retract_button').innerHTML = ">";

    if(point != null) {
        addPointOnPanel(point);
    }
    panelOpen = true;
    panelRetracted = false;
}

function closePanel(panel) {
    if(document.querySelector("#checkbox_addPoint:checked") == null) {
        if(panelRetracted) {
            panel.classList.toggle("translate-x-retracted");
            panel.classList.toggle("translate-x-full");
        }
        else {
            panel.classList.toggle("translate-x-full");
        }
        
        if(panel == document.querySelector('panelSite')) {
            panel.querySelector("#latitude").value = null;
            panel.querySelector("#longitude").value = null;
        }

        panel.querySelectorAll(".newPoint").forEach((point) => {
            point.remove();
        })

        removeError();

        panelOpen = false;
        panelRetracted = false;
    }
    else {
        document.querySelector("#contentCheckboxAddPoint").classList.add("rounded");
        document.querySelector("#contentCheckboxAddPoint").classList.add("border-2");
        document.querySelector("#contentCheckboxAddPoint").classList.add("border-red-600");
        document.querySelector("#contentCheckboxAddPoint").classList.add("animate-pulse");
        
        window.alert("\tMode édition en cours...\n\nVous êtes dans l'édition d'une délimitation de chantier. Vous ne pouvez pas fermer le panneau pendant une édition.\nDécocher la checkbox (le bouton \"Ajouter des points de délimitation\") pour sortir du mode édition.");
    }
}

function retractPanel(panel) {
    if(panel.classList.contains('translate-x-retracted'))
        panel.querySelector("#retract_button").innerHTML = ">";
    else
        panel.querySelector("#retract_button").innerHTML = "<";

    panel.classList.toggle("translate-x-retracted");
    panelRetracted = !panelRetracted;
}

/**
 * Fonction qui permet de rajouter un point de délimitation d'un chantier
 */
function addPointOnPanel(point) {
    var parent = document.getElementById("position");
    var button = document.querySelector("#content_checkbox_linear");
   
    var newDiv = document.createElement("div");
    newDiv.classList.toggle("flex");
    newDiv.classList.toggle("justify-center");
    newDiv.classList.toggle("items-center");
    newDiv.classList.toggle("text-center");
    newDiv.classList.toggle("mx-1");
    newDiv.classList.toggle("newPoint");

    newDiv.innerHTML = `
        <div class="mx-1">
            <label>Latitude :</label>
            <input class="rounded-lg w-full" type="number" step="0.0000000000001" id="latitude" required>
        </div>

        <div class="mx-1">
            <label>Longitude :</label>
            <input class="rounded-lg w-full" type="number" step="0.0000000000001" id="longitude" required>
        </div>`;

    newDiv.querySelector('#latitude').value = point.lat;
    newDiv.querySelector('#longitude').value = point.lng;

    parent.insertBefore(newDiv, button); // Add "newDiv" befor the "button"
}

/**
 * Remove annimations from errors 
 */
function removeError() {
    document.querySelector("#contentCheckboxAddPoint").classList.remove("rounded");
    document.querySelector("#contentCheckboxAddPoint").classList.remove("border-2");
    document.querySelector("#contentCheckboxAddPoint").classList.remove("border-red-600");
    document.querySelector("#contentCheckboxAddPoint").classList.remove("animate-pulse");
}