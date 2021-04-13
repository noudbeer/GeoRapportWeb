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
    <script src="{{ asset('js/effectsView.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        @guest
            <nav class="flex justify-between p-3 sm:px-20 bg-green-700">
                <div class="">
                    <a class="font-black" href="{{ url('/') }}">
                        {{ config('app.name', 'GeoRapport') }}
                    </a>
                    <button class="" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="n"></span>
                    </button>
                </div>

                <ul class="flex space-x-4">
                    <!-- Authentication Links -->
                    @if (Route::has('login'))
                        <li class="">
                            <a class="hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="">
                            <a class="hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </nav>
        @else
            <nav>
                <div class="absolute m-3">
                    <a href="#" id="buttonOpenDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onfocus="this.blur();" onclick="openDropdown()">
                        <svg height="40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#006432" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
                    </a>
                </div>
                
                <div class="absolute inset-y-0 transform -translate-x-full transition duration-250 ease-in-out" id="menu" aria-labelledby="menuDropdown">
                    <a href="#" class="flex justify-end m-3" id="buttonCloseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onfocus="this.blur();" onclick="openDropdown()">
                        <svg height="40px" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="accessible-icon" class="svg-inline--fa fa-accessible-icon fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M423.9 255.8L411 413.1c-3.3 40.7-63.9 35.1-60.6-4.9l10-122.5-41.1 2.3c10.1 20.7 15.8 43.9 15.8 68.5 0 41.2-16.1 78.7-42.3 106.5l-39.3-39.3c57.9-63.7 13.1-167.2-74-167.2-25.9 0-49.5 9.9-67.2 26L73 243.2c22-20.7 50.1-35.1 81.4-40.2l75.3-85.7-42.6-24.8-51.6 46c-30 26.8-70.6-18.5-40.5-45.4l68-60.7c9.8-8.8 24.1-10.2 35.5-3.6 0 0 139.3 80.9 139.5 81.1 16.2 10.1 20.7 36 6.1 52.6L285.7 229l106.1-5.9c18.5-1.1 33.6 14.4 32.1 32.7zm-64.9-154c28.1 0 50.9-22.8 50.9-50.9C409.9 22.8 387.1 0 359 0c-28.1 0-50.9 22.8-50.9 50.9 0 28.1 22.8 50.9 50.9 50.9zM179.6 456.5c-80.6 0-127.4-90.6-82.7-156.1l-39.7-39.7C36.4 287 24 320.3 24 356.4c0 130.7 150.7 201.4 251.4 122.5l-39.7-39.7c-16 10.9-35.3 17.3-56.1 17.3z"></path></svg>
                    </a>
                    
                    <div class="flex flex-col">
                        <a href="{{ url('/') }}" class="px-2 hover:bg-green-300">Accueil</a>
                        <a href="{{ route('map') }}" class="px-2 hover:bg-green-300">Map</a>
                    </div>

                    <div class="flex flex-col">
                        <a href="#" class="px-2 hover:bg-green-300" onclick="@if (Route::currentRouteName() == 'map') new NewPointPanel(map).show(); return false; @endif">Créer un nouveau chantier</a>
                        <a href="#" class="px-2 hover:bg-green-300" onclick="@if (Route::currentRouteName() == 'map') new NewRoutePanel(map).show(); return false; @endif">Liste des chantiers</a>
                    </div>
                    
                    @if ( Auth::user()->hasRole('admin') )
                        <div class="flex flex-col">
                            <a href="#" class="px-2 hover:bg-green-300">Gestion des rôles</a>
                        </div>
                    @endif

                    <div class="flex flex-col px-2 hover:bg-green-300">
                        <a class="" href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
        @endguest

        <main class="container mx-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
