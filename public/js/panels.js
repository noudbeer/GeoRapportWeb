const controller_infomation      = document.querySelector("#controller_infomation")
const contributor_infomation     = document.querySelector("#contributor_infomation")
const checkbox_addPoints         = document.querySelector("#checkbox_addPoint")
const titleSiteInterventionPanel = document.querySelector("#siteName")
const interventionsSite          = document.querySelector("#interventionsSite")

let panelOpen = false
let panelRetracted = false

function hidePanelContent() {
    var children = document.getElementById('panel').children;
    for(var i=0; i<children.length; i++) {
        if(children[i].id.match(/panelContent/g)) {
            children[i].classList.add('hidden')
        }
    }
}

function scriptAutocomplete() {

    fetch("map/societies")
        .then(json => json.json())
        .then(data => {
            var table = []
            for(let i=0; i<data.length; i++) {
                table.push(data[i].name);
            }
            autocomplete(document.querySelector('#inputClient'), table);
        });
}

function openPanel(panel) {
    if(panelOpen)
        closePanel(panel)

    checkbox_addPoints.checked = false

    panel.classList.toggle("translate-x-full")
    panel.querySelector('#retract_button').innerHTML = ">"

    panelOpen = true
    panelRetracted = false
}

function closePanel(panel) {
    if(document.querySelector("#checkbox_addPoint:checked") == null) {
        if(panelRetracted) {
            panel.classList.toggle("translate-x-retracted")
            panel.classList.toggle("translate-x-full")
        } 
        else {
            panel.classList.toggle("translate-x-full")
        }
        
        if(panel == document.querySelector('panel')) {
            panel.querySelector("#latitude").value = null
            panel.querySelector("#longitude").value = null
        }

        panel.querySelectorAll(".newPoint").forEach((point) => {
            point.remove()
        })
        
        removePoints()
        removeError()

        panel.querySelector('#reponseRequest').innerHTML = ""
        panelOpen = false
        panelRetracted = false

        // TODO : Désactiver l'autocomplete
    } 
    else {
        document.querySelector("#contentCheckboxAddPoint").classList.add("rounded")
        document.querySelector("#contentCheckboxAddPoint").classList.add("border-2")
        document.querySelector("#contentCheckboxAddPoint").classList.add("border-red-600")
        document.querySelector("#contentCheckboxAddPoint").classList.add("animate-pulse")
        
        window.alert("\tMode édition en cours...\n\nVous êtes dans l'édition d'une délimitation de chantier. Vous ne pouvez pas fermer le panneau pendant une édition.\nDécocher la checkbox (le bouton \"Ajouter des points de délimitation\") pour sortir du mode édition.")
    }
}

/**
 * Remove annimations from errors 
 */
 function removeError() {
    document.querySelector("#contentCheckboxAddPoint").classList.remove("rounded")
    document.querySelector("#contentCheckboxAddPoint").classList.remove("border-2")
    document.querySelector("#contentCheckboxAddPoint").classList.remove("border-red-600")
    document.querySelector("#contentCheckboxAddPoint").classList.remove("animate-pulse")
}

function retractPanel(panel) {
    if(panel.classList.contains('translate-x-retracted')) {
        panel.querySelector("#retract_button").innerHTML = ">"
        panel.querySelector("#close_button").classList.remove("hidden")
    } else {
        panel.querySelector("#retract_button").innerHTML = "<"
        panel.querySelector("#close_button").classList.add("hidden")
    }

    panel.classList.toggle("translate-x-retracted")
    panelRetracted = !panelRetracted
}

function showInterventions(site) {
    titleSiteInterventionPanel.textContent = site.name
}

/**
 * Popup information role controller
 */
controller_infomation.addEventListener("click", (e) => {
    window.alert(`
            \tQu'est ce qu'un contrôleur ?\n\n
        Un contrôleur est un utilisateur qui peut donner les droits de contributeur (visibilité et ajout d'interventions) à un autre utilisateur.
        Il possède également les droits de contributeur.
    `)
})
/**
 * Popup information role contributor
 */
 contributor_infomation.addEventListener("click", (e) => {
    window.alert(`
            \tQu'est ce qu'un contributeur ?\n\n
        Un contributeur est un utilisateur qui peut à des droits de visibilité d'un chantier et des interventions et d'ajout d'interventions.
    `)
})