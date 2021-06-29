const divInterventionsSite = document.querySelector("#interventionsSite");
var interventionsList = []

/**
 * display interventions of a site
 * @param {integer} siteNumber 
 */
function displayInterventions(site) {
    titleSiteInterventionsPanel.textContent = site.name

    fetch("site/" + site.id + "/interventions/")
        .then(json => json.json())
        .then(data => {
            divInterventionsSite.innerHTML = ""

            interventionsList = data.data
            
            data.data.forEach(intervention => {

                const el = document.createElement("tr")
                el.classList = "hover:bg-gray-200"

                // <a href="intervention/${intervention.id}" class="bg-gray-300 h-full p-1 rounded-md hover:bg-gray-400">Détails</a>
                el.innerHTML = `
                    <td class="border px-2 py-1 text-center">
                        <button id="button_showIntervention" type="button" class="bg-gray-500 text-white px-6 py-2 rounded font-medium mx-3 hover:bg-gray-600 transition duration-200 each-in-out" onclick="displayInterventionDetails(${data.data.indexOf(intervention)})">Détails</button>
                    </td>
                    <td class="border px-2 py-1 text-center">${intervention.datetimeOfIntervention}</td>
                    <td class="border px-2 py-1 text-center">${intervention.type.name}</td>
                    <td class="border px-2 py-1 text-center">${intervention.interventionsGroup.name}</td>
                    <td class="border px-2 py-1 text-center">${intervention.teamMembers}</td>
                    <td class="border px-2 py-1 text-center">${intervention.quantity}<br>${intervention.unit}</td>
                    <td class="border px-2 py-1 text-center">${intervention.timeSpent}<br>${intervention.unitOfTime.name}</td>
                `
                divInterventionsSite.appendChild(el)
            })
        })
}

function displayInterventionDetails(intervention) {

    var i = interventionsList[intervention]

    hidePanelContent()
    document.querySelector('#panelContent_interventionDetails').classList.remove("hidden")
    openPanel(document.querySelector("#panel"))


    document.querySelector("#intervention_backButton").onclick = function() {
        hidePanelContent()
        document.querySelector('#panelContent_interventions').classList.remove("hidden")
        openPanel(document.querySelector("#panel"))
        displayInterventions(i.site)
    }

    document.querySelector("#intervention_name").innerHTML = `
        <p class="6xl font-bold">${i.interventionsGroup.name}</p>
    `

    document.querySelector("#intervention_site").innerHTML = `
        <p class="text-xl font-semibold my-2 w-64">Chantier : ${i.site.name}</p>
        <div class="flex flex-col gap-2 text-gray-400 text-sm">
            <div class="2xl">N° de devis : ${i.site.orderNumber}</div>
            <div class="2xl">N° CPD : ${i.site.cpdNumber}</div>
        </div>
    `
    document.querySelector("#intervention_comment").innerHTML = `
        <p class="text-xl font-semibold my-2 w-64">Comment</p>
        <div class="flex flex-col gap-2 text-gray-400 text-sm">
            <div class="2xl">Créateur      : ${i.owner.firstname} ${i.owner.lastname}</div>
            <div class="2xl">Type          : ${i.type.name}</div>
            <div class="2xl">Date          : ${i.datetimeOfIntervention}</div>
            <div class="2xl">Group         : ${i.interventionsGroup.name}</div>
            <div class="2xl">Workers       : ${i.teamMembers}</div>
            <div class="2xl">Quantity      : ${i.quantity} ${i.unit}</div>
            <div class="2xl">Time spent    : ${i.timeSpent} ${i.unitOfTime.name}</div>
        </div>
    `
}