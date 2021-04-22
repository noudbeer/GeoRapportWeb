function openDropdown() {
    var menu = document.getElementById("menu");
    menu.className = "absolute inset-y-0  h-full w-full z-5000 bg-green-700 divide-y-2 divide-black divide-solid transition duration-250 ease-in-out sm:origin-top-left sm:absolute sm:w-auto"; 
}

function closeMenu(menu) {
    menu.className = "absolute inset-y-0 h-full z-5000 transform -translate-x-full transition duration-250 ease-in-out";
}


//PANEL
let panelOpen = false;

function closePanel() {
    panel.classList.toggle("translate-x-full");
    panel.querySelector("#latitude").value = null;
    panel.querySelector("#longitude").value = null;

    panelOpen = false;
}

function retractPanel() {
    if(panel.classList.contains('translate-x-retracted'))
        panel.querySelector("#retract_button").innerHTML = ">";
    else
        panel.querySelector("#retract_button").innerHTML = "<";
    panel.classList.toggle("translate-x-retracted");
}

function openPanel(lat, long) {
    if(panelOpen)
        closePanel();

    panel.classList.toggle("translate-x-full");
    
    panel.querySelector("#latitude").value = lat;
    panel.querySelector("#longitude").value = long;

    panelOpen = true;
}