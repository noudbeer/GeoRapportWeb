@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/admin/customersManagement.js') }}" defer></script>

    <div class="sm:mx-56 space-y-5 divide-y-2 divide-green-700 divide-dashed text-center">

        <h1 class="text-xl font-black underline py-5">Panneau Administrateurs</h1>

        <div id="addClientAccess">
            <h2 class="text-base font-semibold underline">Ajouter des accès clients</h2>

            <form class="space-y-6" method="POST" action="{{ route('addClients') }}">
                @csrf

                <div class="flex flex-col justify-center space-y-1 sm:flex-row sm:justify-around ">
                    <div>
                        <div class="flex justify-around items-center space-x-1">
                            <label>Rechercher un utilisateur :</label>

                            <div class="text-center">
                                <input type="text"   name="userSearch"       id="userSearch"       class="rounded-lg" >
                                <input type="button" name="userSearchButton" id="userSearchButton" class="bg-blue-400 p-2 hover:bg-blue-500 rounded"  value="Rechercher">
                            </div>
                        </div>
                            
                        <div id="reponseRequest" class="mx-3"></div>
                    </div>
                    
                    <input type="hidden" id="usersInput" name="users" value="[]">
                    
                    <div class="space-y-3">
                        <div class="flex justify-center items-center space-x-1">
                            <label>Societé :</label>
                            <div class="autocomplete">
                                <input id="inputSociety" class="rounded @error('inputSociety') text-red-600 @enderror" type="text" name="inputSociety" required>
                            </div>
                            @error('inputSociety')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="users" class="space-y-1"></div>
                    </div>
                </div>

                <button type="submit" class="bg-green-600 hover:bg-green-700 rounded p-1">Valider les accès aux clients</button>
            </form>
        </div>

        <div>
            <h2 class="text-base font-semibold underline" id="existingCustomerAccess">Liste des compte client existant</h2>

            <table class="table-auto w-full">
                <thead>
                  <tr>
                    <th class="w-1/2">Société</th>
                    <th class="w-1/2">Utilisateur</th>
                    <th></th>
                  </tr>
                </thead>

                @foreach ($society_user as $item)
                    <tr class="hover:bg-green-700 hover:bg-opacity-75">
                        <td class="p-1">{{ $item->society->name }}</td>
                        <td class="p-1">{{ $item->user->firstname }} {{ $item->user->lastname }} ( {{ $item->user->email }} )</td>
                        <td class="p-1">
                            <a href="#" class="p-1 rounded bg-red-600 hover:bg-red-700">Supprimer

                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection