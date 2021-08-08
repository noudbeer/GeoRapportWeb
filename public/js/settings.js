const contents = document.querySelector("#contents")

let showAccount = () => {
    contents.innerHTML = ""

    let el = document.createElement("div")
    el.classList = "space-y-3"
    el.innerHTML = `
        <div class="space-y-1">
            <h1 class="text-xl font-bold border-b-2 border-gray-200">Changer les informations</h1>
            
            <form method="POST" action="" class="space-x-1 grid grid-cols-3">
                @csrf
                <label>Nom :</label>
                <input class="border rounded shadow-xl ">
                <button class="bg-gray-200 hover:bg-gray-300 border rounded shadow-xl">Changer</button>
            </form>

            <form method="POST" action="" class="space-x-1 grid grid-cols-3">
                @csrf
                <label>Prénom :</label>
                <input class="border rounded shadow-xl ">
                <button class="bg-gray-200 hover:bg-gray-300 border rounded shadow-xl">Changer</button>
            </form>
        </div>

        <div class="space-y-1">
            <h1 class="text-xl font-bold border-b-2 border-gray-200">Changer son adresse email</h1>

            <form method="POST" action="" class="space-x-1 grid grid-cols-3">
                @csrf
                <label>Adresse email :</label>
                <input class="border rounded shadow-xl ">
                <button class="bg-gray-200 hover:bg-gray-300 border rounded shadow-xl">Changer</button>
            </form>
        </div>

        <div class="space-y-1">
            <h1 class="text-xl font-bold border-b-2 border-gray-200">Changer son mot de passe</h1>

            <form method="POST" action="" class="space-y-1">
                @csrf
                <div class="space-x-1 grid grid-cols-2">
                    <label>Mot de passe :</label>
                    <input class="border rounded shadow-xl">
                </div>

                <div class="space-x-1 grid grid-cols-2">
                    <label>Confirmation du mot de passe :</label>
                    <input class="border rounded shadow-xl">
                </div>

                <button class="w-full bg-gray-200 hover:bg-gray-300 border rounded shadow-xl">Changer</button>
            </form>
        </div>
    `
    contents.appendChild(el);
}

let clearContents = () => {
    contents.innerHTML = ""
}