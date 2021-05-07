const controllers_input  = document.querySelector("[name='controllers'")
const contributors_input = document.querySelector("[name='contributors'")
const controllers_view   = document.querySelector("#controllers")
const contributors_view  = document.querySelector("#contributors")

const user_search_input  = document.querySelector("#userSearch")
const user_search_button = document.querySelector("#userSearchButton")
const results            = document.querySelector("#reponseRequest")


// Retourne une fonction de test qui indique si un utilisateur est égal à l'utilisateur donné
const equalsUser = (user) =>
    (tested_user) =>
        tested_user.id === user.id

// Retourne une fonction de test qui indique si un utilisateur n'est pas égal à l'utilisateur donné
const notEqualsUser = (user) =>
    (tested_user) =>
        tested_user.id !== user.id

// Supprime un utilisateur du tableau donné et le renvoie
const deleteUserFrom = (user, array) =>
    array.filter(notEqualsUser(user))


const getControllers = () =>
    JSON.parse(controllers_input.value)

const redrawControllers = () => {
    const controllers = getControllers()

    controllers_view.innerHTML = ""

    controllers.forEach(user => {
        const el = document.createElement("div")
        el.classList = "flex justify-around items-center"
        el.innerHTML = `
            ${user.firstname} ${user.lastname} (${user.email})
            <button class="delete_controller bg-red-500 p-1 hover:bg-red-600 rounded">Supprimer des contrôleurs</button>
        `

        el.querySelector(".delete_controller").addEventListener("click", (e) => {
            e.preventDefault()

            setControllers(deleteUserFrom(user, controllers))
        })

        controllers_view.appendChild(el)
    })
}

const setControllers = (data) => {
    controllers_input.value = JSON.stringify(data)
    redrawControllers()
}


const getContributors = () =>
    JSON.parse(contributors_input.value)

const redrawContributors = () => {
    const contributors = getContributors()

    contributors_view.innerHTML = ""

    contributors.forEach(user => {
        const el = document.createElement("div")
        el.classList = "flex justify-around items-center"
        el.innerHTML = `
            ${user.firstname} ${user.lastname} (${user.email})
            <button class="delete_contributor bg-red-500 p-1 hover:bg-red-600 rounded">Supprimer des contributeurs</button>
        `

        el.querySelector(".delete_contributor").addEventListener("click", (e) => {
            e.preventDefault()

            setContributors(deleteUserFrom(user, contributors))
        })

        contributors_view.appendChild(el)
    })
}

const setContributors = (data) => {
    contributors_input.value = JSON.stringify(data)
    redrawContributors()
}


user_search_button.addEventListener("click", (e) => {
    fetch("map/users/" + encodeURIComponent(user_search_input.value))
        .then(json => json.json())
        .then(data => {
            
            results.innerHTML = ""

            data.forEach(user => {
                const el = document.createElement("div")
                el.classList = "flex justify-around w-full items-center rounded-lg bg-gray-200 p-3"
                el.innerHTML = `
                    ${user.firstname} ${user.lastname} (${user.email})
                    <div class="flex flex-col space-y-0.5">
                        <button class="add_controller  bg-yellow-300 p-1 hover:bg-yellow-400 rounded">Ajouter comme contrôleur</button>
                        <button class="add_contributor bg-green-600  p-1 hover:bg-green-700  rounded">Ajouter comme contributeur</button>
                    </div>
                `

                el.querySelector(".add_controller").addEventListener("click", (e) => {
                    e.preventDefault()

                    const controllers = getControllers()

                    if (!controllers.find(equalsUser(user))) {
                        controllers.push(user)
                        setControllers(controllers)
                    }
                })
                el.querySelector(".add_contributor").addEventListener("click", (e) => {
                    e.preventDefault()

                    const contributors = getContributors()

                    if (!contributors.find(equalsUser(user))) {
                        contributors.push(user)
                        setContributors(contributors)
                    }
                })

                results.appendChild(el)
            })

        })
        .catch(err => console.log(err))
})

/* <div class="flex justify-around items-center">Prénom Nom (email)<button class="bg-red-500 p-1 hover:bg-red-600 rounded">Supprimer des contributeurs</button></div>
<div class="flex justify-around items-center">Prénom Nom (email)<button class="bg-red-500 p-1 hover:bg-red-600 rounded">Supprimer des contrôleurs</button></div> */