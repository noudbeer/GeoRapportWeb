const users_view         = document.querySelector("#users")

const user_search_input  = document.querySelector("#userSearch")
const user_search_button = document.querySelector("#userSearchButton")
const results            = document.querySelector("#reponseRequest")
const users_input        = document.querySelector("[name='users'")

const inputSociety       = document.querySelector("#inputSociety")

inputSociety.addEventListener("click", scriptAutocomplete())

// Recupère en JSON la valeur du controller_input
const getUsers = () =>
    JSON.parse(users_input.value)

const setUsers = (data) => {
    users_input.value = JSON.stringify(data)
    redrawUsers()
}

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

const redrawUsers = () => {
    const users = getUsers()

    users_view.innerHTML = ""

    users.forEach(user => {
        const el = document.createElement("div")
        el.classList = "flex justify-between items-center space-y-1"
        el.innerHTML = `
            ${user.firstname} ${user.lastname} (${user.email})
            <button class="delete_user bg-red-500 p-1 hover:bg-red-600 rounded">Supprimer l'accès</button>
        `

        el.querySelector(".delete_user").addEventListener("click", (e) => {
            e.preventDefault()

            setUsers(deleteUserFrom(user, users))
        })

        users_view.appendChild(el)
    })
}

user_search_button.addEventListener("click", (e) => {
    fetch("users/" + encodeURIComponent(user_search_input.value))
        .then(json => json.json())
        .then(data => {
            
            results.innerHTML = ""

            data.forEach(user => {
                const el = document.createElement("div")
                el.classList = "flex justify-between w-full items-center rounded-lg bg-gray-200 p-3"
                el.innerHTML = `
                    ${user.firstname} ${user.lastname} (${user.email})
                    <button class="add_user bg-green-600 p-1 hover:bg-green-700 rounded">Ajouter l'utilisateur</button>
                `

                el.querySelector(".add_user").addEventListener("click", (e) => {
                    e.preventDefault()

                    const users = getUsers()

                    if (!users.find(equalsUser(user))) {
                        users.push(user)
                        setUsers(users)
                    }
                })

                results.appendChild(el)
            })
        })
        .catch(err => console.log(err))
})

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
        }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });
    
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
} 

/**
 * takes the names of the companies and use them in the autocomplete 
 */
function scriptAutocomplete() {
    fetch("societies/all")
        .then(json => json.json())
        .then(data => {
            var table = []
            for(let i=0; i<data.length; i++) {
                table.push(data[i].name);
            }
            autocomplete(inputSociety, table);
        });
}

/**
 * function to generate access for a client
 */
// function generateAccess() {

// }