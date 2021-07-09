<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GeoRapport') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/menu.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/autocomplete.css') }}">
</head>
<body class="overflow-hidden">
    <div id="app">
        <div class="container flex h-96 m-auto justify-center bg-onf">
            <div class="m-auto space-y-2 border-2 border-green-700 rounded-lg ">

                <h1 class="text-xl font-black p-3 text-center border-b border-green-700">Validation de l'ajout d'un nouvel utilisateur</h1>

                <div class="flex flex-col justify-center text-center p-3">
                    <p>Un mail de vérification a été envoyé au nouvel utilisateur.  </p>

                    <strong class="font-black">Veuillez vous déconnecter et vous reconnecter sur votre compte pour continuer vos travaux.</strong>

                    <form id="logout-form m-6" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="rounded-md p-3 bg-green-600 transition duration-150 ease-in-out hover:bg-green-700">
                            Se déconecter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
