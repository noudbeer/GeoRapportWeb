@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/map.js') }}" defer></script>

    <style id="marker-size"></style>
    <div id="contentMap">
        <div id="map" class="h-screen w-screen"></div>

        <div id="panelSite" class=" bg-white fixed flex inset-y-0 right-0 w-full h-full z-5000 transform translate-x-full transition duration-250 ease-in-out origin-top-right lg:w-auto">
            <div class="flex flex-col w-10 my-0.5 space-y-0.5">
                <button type="button" id="close_button" class="bg-red-500 font-bold p-1 rounded-md hover:bg-red-600" onclick="closePanel(getElementById('panelSite'))">x</button>
                <button type="button" id="retract_button" class="bg-blue-500 h-full font-bold p-1 rounded-md hover:bg-blue-400" onclick="retractPanel(getElementById('panelSite'))">></button>
            </div>
            <div class="w-full m-2 overflow-y-auto">
                <h1 class="font-bold text-center underline">NOUVEAU CHANTIER</h1>

                <form method="POST" action="#" class="flex flex-col mt-3">
                    <div class="space-y-5">
                        <div>
                            <div>
                                <label>Nom du chantier :</label>
                                <input class="rounded-lg w-full" type="text" name="name" id="nameOrder" oninput="changePopup('nameOrder', 'titlePopup')" required>
                            </div>
                            
                            <div>
                                <label>N° de commande chantier :</label>
                                <input class="rounded-lg w-full" type="number" name="commande" id="inputOrder" oninput="changePopup('inputOrder', 'orderNumberPopup')" required>
                            </div>

                            <div>
                                <label>Client :</label>
                                <input class="rounded-lg w-full autocomplete" type="text" name="client" id="inputClient" oninput="changePopup('inputClient', 'clientPopup')" required>
                                @foreach ($societies as $society)
                                    <div>{{$society->name}}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-1" id="position">
                            <label>Lieu du chantier :</label>

                            <div class="items-center text-center p-1" id="contentCheckboxAddPoint">
                                <input type="checkbox" id="checkbox_addPoint" class="rounded p-1 hover:bg-blue-500" onchange="removeError();" checked>
                                <label>Ajouter des points de délimitation</label>
                            </div>

                            <div class="text-center" id="content_checkbox_linear">
                                <input type="checkbox" id="checkbox_linear" class="rounded" type="checkbox" name="zone" checked="true">
                                <label>Ce chantier est une zone (non linéaire)</label>
                            </div>
                        </div>

                        <div>
                            <label>Status :</label>
                            <select class="rounded-lg w-full" name="status" id="status" required>
                                <option>En cours</option>
                                <option>Chantier terminé</option>
                            </select>
                        </div>

                        <div>
                            <label>Contributeurs :</label>

                            @foreach ($users as $user)
                                <div class="flex justify-around items-center">{{$user->firstname}} {{$user->lastname}} ({{$user->email}}) <button class="bg-red-500 p-1 hover:bg-red-600 rounded">Supprimer des contributeurs</button></div>
                            @endforeach
                        </div>

                        <div class="space-y-1">
                            <label>Médiateurs :</label>

                            @foreach ($users as $user)
                                <div class="flex justify-around items-center">{{$user->firstname}} {{$user->lastname}} ({{$user->email}}) <button class="bg-red-500 p-1 hover:bg-red-600 rounded">Supprimer des médiateurs</button></div>
                            @endforeach

                            <div>
                                <label>Ajouter un controlleur ou contributeur :</label>
                                <div class="text-center ">
                                    <input class="rounded-lg w-1/2" type="text" name="mediatorsSearch" id="mediatorsSearch">
                                    <input type="button" class="bg-blue-400 p-2 hover:bg-blue-500 rounded w-1/3" name="mediatorsSearchButton" id="mediatorsSearchButton" value="Chercher">
                                </div>
                            </div>
                            
                            <form class="rounded-lg w-full bg-gray-200 p-2" action="#">
                                @foreach ($users as $user)
                                    <div class="flex justify-around items-center bg-gray-200 p-1 rounded">
                                        {{$user->firstname}} {{$user->lastname}} ({{$user->email}}) 
                                        <div class="flex flex-col space-y-0.5">
                                            <button class="bg-yellow-300 p-1 hover:bg-yellow-400 rounded">Ajouter comme médiateur</button>
                                            <button class="bg-green-600 p-1 hover:bg-green-700 rounded">Ajouter comme contributeur</button>
                                        </div>
                                    </div>
                                @endforeach
                            </form>
                        </div>

                        <button class="bg-green-600 w-full transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Valider ce chantier</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="panelIntervention" class="bg-white fixed flex inset-y-0 right-0 w-full h-full z-5000 transform translate-x-full transition duration-250 ease-in-out origin-top-right lg:w-auto">
            <div class="flex flex-col w-10 my-0.5 space-y-0.5">
                <button type="button" id="close_button" class="bg-red-500 font-bold p-1 rounded-md hover:bg-red-600" onclick="closePanel(getElementById('panelIntervention'))">x</button>
                <button type="button" id="retract_button" class="bg-blue-500 h-full font-bold p-1 rounded-md hover:bg-blue-400" onclick="retractPanel(getElementById('panelIntervention'))">></button>
            </div>
            <div class="w-full m-2 overflow-y-autoloca">
                <h1 class="font-bold text-center underline">LISTE DES CHANTIERS</h1>
                <ul class="flex flex-col mt-3 space-y-1">
                    <li class="flex content-between items-center space-x-3">
                        <h2>CHANTIER 1</h2>
                        <div>
                            <button class="bg-yellow-300 h-full p-1 rounded-md hover:bg-yellow-400">Modifier le chantier</button>
                            <button class="bg-blue-500 h-full p-1 rounded-md hover:bg-blue-600">Voir le chantier</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
