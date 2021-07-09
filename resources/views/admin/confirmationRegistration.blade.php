@extends('layouts.app')

@section('content')
    <div class="container flex h-96 m-auto justify-center bg-onf">
        <div class="m-auto space-y-2 border-2 border-green-700 rounded-lg p-3">
            <div class="text-center border-b border-green-700">Validation de l'ajout d'un nouvel utilisateur</div>

            <div class="text-center space-y-2 p-5">
                Un mail de vérification de l'addresse email a été envoyé.
            </div>
            
            <div class="flex justify-around mt-3 text-center">
                <a href="{{ route('register') }}" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Ajouter d'un nouvel utilisateur</a>
                <a href="{{ route('map') }}"              class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Retour à la map</a>
            </div>
        </div>
    </div>
@endsection