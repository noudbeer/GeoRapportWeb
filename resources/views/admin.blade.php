@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/admin/users.js') }}" defer></script>

    <div class="sm:mx-56 space-y-5 divide-y-2 divide-green-700 divide-dashed text-center">
        <h1 class="text-xl font-black underline py-5">Panneau Administrateurs</h1>

        <div>
            <h2 class="text-base font-semibold underline">Liste des compte client existant</h2>

            <table class="table-auto w-full">
                <thead>
                  <tr>
                    <th class="w-1/2">Société</th>
                    <th class="w-1/2">Utilisateur</th>
                  </tr>
                </thead>

                @foreach ($society_user as $item)
                    <tr class="hover:bg-green-700 hover:bg-opacity-75">
                        <td>{{ $item->society->name }}</td>
                        <td>{{ $item->user->firstname }} {{ $item->user->lastname }} ( {{ $item->user->email }} )</td>
                @endforeach
            </table>
        </div>

        <div>
            <h2 class="text-base font-semibold underline">Ajouter des accès clients</h2>

            <form class="space-y-6">
                @csrf

                <div class="flex flex-col justify-center space-y-1 sm:flex-row sm:justify-around ">
                    <div>
                        <div class="flex justify-center items-center space-x-1">
                            <label>Societé :</label>
                            <div class="autocomplete">
                                <input id="inputSociety" class="rounded-lg @error('inputSociety') text-red-600 @enderror" type="text" name="inputSociety" required>
                            </div>
                            @error('inputSociety')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div>
                            <button class="p-1 bg-yellow-500 hover:bg-yellow-600 rounded-lg" onclick="generateAccess()">Générer un code d'accès client</button>
                        </div>

                        <p>OU</p>

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
                    </div>
                </div>

                <div id="users"></div>

                <button class="bg-green-600 hover:bg-green-700 rounded p-1">Ajouter les accès aux clients</button>
            </form>
        </div>
    </div>
@endsection