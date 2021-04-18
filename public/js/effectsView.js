function openDropdown() {
    var menu = document.getElementById("menu");
    menu.className = "absolute inset-y-0  h-full w-full z-5000 bg-green-700 divide-y-2 divide-black divide-solid transition duration-250 ease-in-out sm:origin-top-left sm:absolute sm:w-auto"; 
}

function closeMenu(menu) {
    menu.className = "absolute inset-y-0 h-full z-5000 transform -translate-x-full transition duration-250 ease-in-out";
}

function closePanel(panel) {
    panel.className = "bg-white absolute inset-y-0 right-0 h-full z-5000 transform translate-x-full transition duration-250 ease-in-out";
    panel.remove();
}

function retractPanel(panel) {
    if(panel.className == "bg-white absolute inset-y-0 right-0 h-full w-full z-5000 transition duration-250 ease-in-out sm:origin-top-right sm:absolute sm:w-auto") {
        panel.className = "bg-white absolute inset-y-0 right-0 h-full z-5000 transform translate-x-1/10 transition duration-250 ease-in-out"; //transition pour cacher le panneau
        panel.className = "hidden"; // on cache le panneau

        //creation d'un panneau "rétracté"
        var buttonOpenPanel = document.createElement("div");
        buttonOpenPanel.setAttribute("id", "buttonOpenPanel");
        buttonOpenPanel.innerHTML = `
            <button type="button" class="bg-blue-500 h-full w-10 font-bold p-1" onclick="retractPanel(panel)"><</button>
        `;

        // ajout au site
        var map = document.getElementById("map")
        var parentMap = document.getElementById("map").parentNode;
        parentMap.insertBefore(buttonOpenPanel, map);

        buttonOpenPanel.className = "bg-white absolute inset-y-0 right-0 h-full z-5000 transition duration-250 ease-in-out origin-top-right absolute w-auto";
    }
    else {
        var retractPanel = document.getElementById("buttonOpenPanel");
        retractPanel.className = "bg-white absolute inset-y-0 right-0 h-full z-5000 transform translate-x-full transition duration-250 ease-in-out"
        retractPanel.remove();
        panel.className = "bg-white absolute inset-y-0 right-0 h-full w-full z-5000 transition duration-250 ease-in-out sm:origin-top-right sm:absolute sm:w-auto";
    }
}


function openPanel() {
    // <div id="panel" class="bg-white absolute inset-y-0 right-0 h-full z-5000 transform translate-x-full transition duration-250 ease-in-out"></div>
    // var panel = document.getElementById("panel");
    var panel = document.createElement("div");
    panel.setAttribute("id", "panel");
    panel.className = "bg-white absolute inset-y-0 right-0 h-full z-5000 transform translate-x-full transition duration-250 ease-in-out";
    
    var map = document.getElementById("map")
    var parentMap = document.getElementById("map").parentNode;
    parentMap.insertBefore(panel, map);


    panel.innerHTML = `
        <div class="flex h-full">
            <div class="flex flex-col w-10">
                <button type="button" id="close_button" class="bg-red-500 font-bold p-1" onclick="closePanel(panel)">x</button>
                <button type="button" id="retract_button" class="bg-blue-500 h-full font-bold p-1" onclick="retractPanel(panel)">></button>
            </div>
            <div class="w-full">
                <h1 class="font-bold text-center m-2">NOUVEAU CHANTIER</h1>
            </div>
        </div>
    `;
    
    panel.className = "bg-white absolute inset-y-0 right-0 h-full w-full z-5000 transition duration-250 ease-in-out sm:origin-top-right sm:absolute sm:w-auto";

    return panel;
}