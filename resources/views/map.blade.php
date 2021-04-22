@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/map.js') }}" defer></script>
    
    <style id="marker-size"></style>
    <div id="contentMap">
        <div id="map" class="h-screen w-screen"></div>

        <div id="panel" class="bg-white fixed flex inset-y-0 right-0 w-full h-full z-5000 transform translate-x-full transition duration-250 ease-in-out origin-top-right lg:w-auto">
            <div class="flex flex-col w-10 my-0.5 space-y-0.5">
                <button type="button" id="close_button" class="bg-red-500 font-bold p-1 rounded-md hover:bg-red-600" onclick="closePanel()">x</button>
                <button type="button" id="retract_button" class="bg-blue-500 h-full font-bold p-1 rounded-md hover:bg-blue-400" onclick="retractPanel()">></button>
            </div>
            <div class="w-full m-2">
                <h1 class="font-bold text-center underline">NOUVEAU CHANTIER</h1>

                <form method="POST" action="#" class="flex flex-col mt-3">
                    <div class="space-y-1">
                        <div>
                            <label>N° de commande chantier :</label>
                            <input class="rounded-lg w-full" type="number" name="commande" id="inputOrder" required>
                        </div>

                        <div>
                            <label>Nom du chantier :</label>
                            <input class="rounded-lg w-full" type="text" name="name" id="nameOrder" required>
                        </div>

                        <div class="space-y-1">
                            <label>Lieu du chantier :</label>

                            <div class="text-center">
                                <input class="rounded" type="checkbox" name="zone" checked="true">
                                <label>Ce chantier est une zone (non linéaire)</label>
                            </div>

                            <div class="text-center">
                                <label>Latitude :</label>
                                <input class="rounded-lg" type="number" id="latitude" required>

                                <label>Longitude :</label>
                                <input class="rounded-lg" type="number" id="longitude" required>
                            </div>

                            <form action="#">
                                <button class="w-full bg-blue-400 rounded-lg p-1 hover:bg-blue-500">Ajouter un point sur la carte</button>
                            </form>
                        </div>

                        <div>
                            <label>Status :</label>
                            <select class="rounded-lg w-full" name="status" id="status" required>
                                <option>En cours</option>
                                <option>Chantier terminé</option>
                            </select>
                        </div>

                        <div>
                            <label>Client :</label>
                            <input class="rounded-lg w-full" type="text" name="client" id="client" required>
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

                            <div class="text-center">
                                <input class="rounded-lg " type="text" name="mediatorsSearch" id="mediatorsSearch">
                                <input type="button" class="bg-blue-400 p-1 hover:bg-blue-500 rounded" name="mediatorsSearchButton" id="mediatorsSearchButton" value="Chercher">
                            </div>
                            
                            <form class="rounded-lg w-full bg-gray-200 p-2" action="#">
                                @foreach ($users as $user)
                                    <div class="flex justify-around items-center">
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
    </div>
@endsection
