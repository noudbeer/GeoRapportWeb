const divsitesTable = document.querySelector('#sitesTable')

/**
 * display visible sites
 * @param {integer} siteNumber 
 */
 function displaySitesTable($user) {
    fetch("sites/")
        .then(json => json.json())
        .then(data => {
            divInterventionsSite.innerHTML = ""

            data.data.forEach(intervention => {

                const el = document.createElement("tr")
                el.classList = "hover:bg-gray-200"

                el.innerHTML = `
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