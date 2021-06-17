const divInterventionsSite = document.querySelector("#interventionsSite");

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

            data.data.forEach(intervention => {

                const el = document.createElement("tr")
                el.classList = "hover:bg-gray-200"

                el.innerHTML = `
                    <td class="border px-2 py-1 text-center">
                        <a href="intervention/${intervention.id}" class="bg-gray-300 h-full p-1 rounded-md hover:bg-gray-400">Détails</a
                    td>
                    <td class="border px-2 py-1 text-center">${intervention.datetimeOfIntervention}</td>
                    <td class="border px-2 py-1 text-center">${intervention.type.name}</td>
                    <td class="border px-2 py-1 text-center">${intervention.interventionsGroup.name}</td>
                    <td class="border px-2 py-1 text-center">${intervention.owner.firstname}<br>${intervention.owner.lastname}</td>
                    <td class="border px-2 py-1 text-center">${intervention.quantity}<br>${intervention.unit}</td>
                    <td class="border px-2 py-1 text-center">${intervention.timeSpent}<br>${intervention.unitOfTime.name}</td>
                `
                divInterventionsSite.appendChild(el)
            })
        })
}