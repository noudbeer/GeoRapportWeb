const validator_infomation      = document.querySelector("#validator_infomation")
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

/**
 * takes the names of the companies and use them in the autocomplete 
 */
function scriptAutocomplete(popup) {
    fetch("societies/all")
        .then(json => json.json())
        .then(data => {
            var table = []
            for(let i=0; i<data.length; i++) {
                table.push(data[i].name);
            }
            autocomplete(document.querySelector('#inputClient'), table, popup);
        });
}

function openPanel(panel) {
    if(panelOpen)
        closePanel(panel)

    checkbox_addPoints.checked = false

    panel.classList.toggle("translate-x-full")
    panel.querySelector('#retract_button').innerHTML = ">"
    panel.querySelector("#close_button").classList.remove("hidden")

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

        checkbox_addPoints.checked = false
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

/**
 * Popup information role validator
 */
 validator_infomation.addEventListener("click", (e) => {
    window.alert(`
            Qu'est ce qu'un valideur ?\n\n
        Un valideur aura le droit de valider ou non les interventions envoyé sur le chantier pour que le client puisse les voir à son tour.
        Il a aussi le droit de modifier un chantier après qu'il ai été créé.
        Il possède aussi les droits du contributeur.

        Exemple de personne qui peuvent avoir les droits de valideur : Conducteur de travaux, Responsable d'opération.
    `)
})
/**
 * Popup information role contributor
 */
 contributor_infomation.addEventListener("click", (e) => {
    window.alert(`
            Qu'est ce qu'un contributeur ?\n\n
        Un contributeur peut voir les chantiers qui lui sont associés.
        Il peut aussi envoyer des interventionssur ce chantier à partir de l'application mobile.
        
        Exemple de personne qui peuvent avoir les droits de contributeur : ouvrier, chef d'équipe.
    `)
})