@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/map.js') }}" defer></script>
    <script src="{{ asset('js/panels.js') }}" defer></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script src="{{ asset('js/points_site.js') }}" defer></script>
    <script src="{{ asset('js/site_users.js') }}" defer></script>
    <script src="{{ asset('js/interventionsPanel.js') }}" defer></script>

    <style id="marker-size"></style>
    <div id="contentMap">

        <input id="sites" value="{{ $sites }}" class="w-full" hidden/>

        <div id="map" class="h-screen w-screen"></div>

        <div id="panel" class=" bg-white fixed flex inset-y-0 right-0 w-full h-full z-5000 transform translate-x-full transition duration-250 ease-in-out origin-top-right lg:w-auto">
            <div class="flex flex-col w-10 my-0.5 space-y-0.5">
                <button type="button" id="close_button" class="bg-red-500 font-bold p-1 rounded-md hover:bg-red-600" onclick="closePanel(getElementById('panel'))">x</button>
                <button type="button" id="retract_button" class="bg-blue-500 h-full font-bold p-1 rounded-md hover:bg-blue-400" onclick="retractPanel(getElementById('panel'))">></button>
            </div>

            {{-- Panneau nouveau chantier --}}
            <div id="panelContent_site" class="hidden w-full m-2 overflow-y-auto">
                <h1 class="font-bold text-center underline">NOUVEAU CHANTIER</h1>

                <form method="POST" action="{{ route('editSite') }}" autocomplete="off" class="flex flex-col mt-3">
                    @csrf
                    {{-- {{ $errors }} --}}
                    <div class="space-y-5">
                        <div>
                            <div>

                                <div class="autocomplete">
                                    <label>Client :</label>  
                                    <input id="inputClient" class="rounded-lg w-full @error('inputClient') text-red-600 @enderror" type="text" name="client" oninput="changePopup('inputClient', 'clientPopup');" required>
                                </div>
                                @error('inputClient')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror


                                <div>
                                    <label>Intitulé du devis :</label>
                                    <input id="orderTitle" class="rounded-lg w-full @error('orderTitle') text-red-600 @enderror" type="text" name="order_title" oninput="changePopup('orderTitle', 'orderTitlePopup')">
                                </div>
                                @error('orderTitle')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror                                
                                
                                <div>
                                    <label>N° de devis :</label>
                                    <input id="inputOrder" class="rounded-lg w-full @error('inputOrder') text-red-600 @enderror" type="text" name="orderNumber" oninput="changePopup('inputOrder', 'orderNumberPopup')">
                                </div>
                                @error('inputOrder')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror

                                <div>
                                    <label>Nom du chantier :</label>
                                    <input id="cpdTitle" class="rounded-lg w-full @error('cpdTitle') text-red-600 @enderror" type="text" name="cpd_title" oninput="changePopup('cpdTitle', 'cpdTitlePopup')">
                                </div>
                                @error('cpdTitle')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror

                                <div>
                                    <label>N° de CPD :</label>
                                    <input id="inputCpd" class="rounded-lg w-full @error('inputCpd') text-red-600 @enderror" type="text" name="cpdNumber" oninput="changePopup('inputCpd', 'cpdNumberPopup')">
                                </div>
                                @error('inputCpd')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror

                        </div>


                        <div class="space-y-1" id="position">
                            <label>Localisation du chantier :</label>

                            <div class="items-center text-center p-1" id="contentCheckboxAddPoint">
                                <input type="checkbox" id="checkbox_addPoint" class="rounded p-1 hover:bg-blue-500" onchange="removeError();">
                                <label>Ajouter des points de délimitation</label>
                            </div>

                            <div class="grid grid-flow-row grid-cols-2 grid-rows-1 items-center newPoint mx-1">
                                <label>Latitude :</label>
                                <label>Longitude :</label>
                            </div>
                            
                            <input id="inputPoints" name="points" class="hidden" value="[]">
                            <div id="points"></div>

                            <div class="text-center" id="content_checkbox_linear">
                                <input type="checkbox" id="checkbox_zone" class="rounded" name="isZone">
                                <label>Ce chantier est une zone (non linéaire)</label>
                            </div>
                        </div>


                        <div>
                            <label for="beginning">Date de début du chantier :</label>
                            <input type="date" id="beginning" name="beginning" class="rounded-lg @error('beginning') text-red-600 @enderror">
                        </div>
                        @error('beginning')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror


                        <div>
                            <label>Statut :</label>
                            <select  id="status" class="rounded-lg w-full @error('status') text-red-600 @enderror" name="status_id" required>
                                @foreach ($status as $stat)
                                    <option value={{ $stat->id }}>{{ $stat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('status')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror


                        <div class="space-y-2">
                            <div>
                                <div class="flex items-center space-x-1">
                                    <button id="validator_infomation"><svg width="15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="svg-inline--fa fa-info-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg></button>
                                    <label>Valideur(s) :</label>
                                </div>
                                <div id="validators"></div>
                            </div>

                            <div>
                                <div class="flex items-center space-x-1">
                                    <button id="contributor_infomation"><svg width="15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="svg-inline--fa fa-info-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg></button>
                                    <label>Contributeurs :</label>
                                </div>
                                <div id="contributors"></div>
                            </div>

                            <div>
                                <label>Ajouter un valideur ou un contributeur :</label>
                                <div class="text-center">
                                    <input type="text"   name="userSearch"       id="userSearch"       class="rounded-lg w-1/2" >
                                    <input type="button" name="userSearchButton" id="userSearchButton" class="bg-blue-400 p-2 hover:bg-blue-500 rounded w-1/3"  value="Chercher">
                                </div>

                                <input type="hidden" name="validators"  value="[]">
                                <input type="hidden" name="contributors" value="[]">
                            </div>

                            <div id="reponseRequest"></div>
                        </div>


                        <button class="bg-green-600 w-full transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-3">Valider ce chantier</button>
                    </div>
                </form>
            </div>

            <div id="panelContent_interventions" class="hidden w-full m-2 overflow-y-auto px-1">
                <h1 class="font-bold text-center underline" id="titleSiteInterventionsPanel"></h1>

                <div class="flex flex-col justify-center mt-3 space-y-1">
                    <h2 class="underline">Interventions :</h2>
                    <button class="rounded-md p-2 m-20 text-white bg-green-600 hover:bg-green-700">Ajouter une intervention</button>

                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="w-20">Date</th>
                                <th class="w-20">Nature des travaux</th>
                                <th class="w-20">Secteur d'intervention</th>
                                <th class="w-20">Équipe</th>
                                <th class="w-20">Quantité</th>
                                <th class="w-20">Temps de l'intervention</th>
                            </tr>

                            <tbody id="interventionsSite"></tbody>
                        </thead>
                    </table>
                </div>
            </div>

            <div id="panelContent_interventionDetails" class="hidden w-full m-2 overflow-y-auto px-1">
                <div class="py-8 flex flex-col gap-4 items-center mx-4" id="interventionInfo">

                    <div class="w-full flex flex-row items-center">
                        <button id="intervention_backButton" type="button" class="bg-gray-500 text-white px-4 py-2 rounded font-medium hover:bg-gray-600 transition duration-200 each-in-out">
                            <img src="{{ asset('assets/left-arrow_white.svg') }}" class="w-5" />
                        </button>
                        {{-- <div class="flex-grow" ></div> --}}
                        <div id="intervention_name" class="mx-2 flex-grow text-center"></div>
                    </div>
                    
                    <div class="p-3 bg-gray-100 rounded-lg flex items-center justify-between space-x-8">
                        <div id="intervention_site"></div>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-lg flex items-center justify-between space-x-8">
                        <div id="intervention_comment"></div>
                    </div>
                </div>
            </div>


            {{-- Création d'une intervention --}}
            <div id="panelCreate_intervention" class="hidden w-full m-2 overflow-y-auto px-1">
                <h1 class="font-bold text-center underline">Nouvelle intervention</h1>

                <form method="POST" action="#" autocomplete="off" class="flex flex-col mt-3">
                    @csrf
                    {{-- {{ $errors }} --}}
                    <div class="space-y-5">
                        <button class="bg-green-600 w-full transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-3">Valider ce chantier</button>
                    </div>
                </form>
            </div>

            {{-- Panneau de visualisation de la liste des chantiers --}}
            <div id="panelContent_sitesList" class="hidden w-full m-2 overflow-y-auto px-1">
                <h1 class="font-bold text-center underline">Chantiers</h1>

                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="w-20">Statut (date de fermeture du chantier)</th>
                            <th class="w-20">Date d'ouverture du chantier</th>
                            <th class="w-20">Nom</th>
                            <th class="w-20">Équipe</th>
                        </tr>
                        <tbody id="sitesTable"></tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
