function openDropdown() {
    var menu = document.getElementById("menu");
    menu.className = "absolute inset-y-0  h-full w-full z-5000 bg-green-700 divide-y-2 divide-black divide-solid transition duration-250 ease-in-out sm:origin-top-left sm:absolute sm:w-auto"; 
}

function closeMenu(menu) {
    menu.className = "absolute inset-y-0 h-full z-5000 transform -translate-x-full transition duration-250 ease-in-out";
}

///////////////////
//     PANEL     //
///////////////////
let panelOpen = false;

function closePanel(panel) {
    panel.classList.toggle("translate-x-full");
    
    if(panel == document.querySelector('panelSite')) {
        panel.querySelector("#latitude").value = null;
        panel.querySelector("#longitude").value = null;
    }

    panel.querySelectorAll(".newPoint").forEach((point) => {
        point.remove();
    })

    panelOpen = false;
}

function retractPanel(panel) {
    if(panel.classList.contains('translate-x-retracted'))
        panel.querySelector("#retract_button").innerHTML = ">";
    else
        panel.querySelector("#retract_button").innerHTML = "<";
    panel.classList.toggle("translate-x-retracted");
}

function openPanel(panel, lat, long) {
    if(panelOpen)
        closePanel(panel);

    panel.classList.toggle("translate-x-full");
    
    if(lat != null) 
        panel.querySelector("#latitude").value = lat;
    if(long != null)
        panel.querySelector("#longitude").value = long;

    panelOpen = true;
}

/**
 * Fonction qui permet de rajouter un point de délimitation d'un chantier
 */
function addPoint() {
    var parent = document.getElementById("position");
    var button = document.getElementById("contentButtonAddPoint");
   
    var newDiv = document.createElement("div");
    newDiv.classList.toggle("text-center");
    newDiv.classList.toggle("newPoint");

    newDiv.innerHTML = `
        <label>Latitude :</label>
        <input class="rounded-lg" type="number" id="latitude" required>

        <label>Longitude :</label>
        <input class="rounded-lg" type="number" id="longitude" required>`;

        parent.insertBefore(newDiv, button);
}