@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/settings.js') }}" defer></script>

    <div class="container md:mx-56 space-y-5">
        <div class="w-full text-center">
            <div class="text-xl font-black">{{ $user->firstname }} {{ $user->lastname }}</div>
            <div class="text-xs font-thin">Votre compte personnel</div>
        </div>

        <div class="flex w-full">
            <nav class="flex flex-col md:w-1/6 border-2 border-opacity-80 border-green-700 rounded divide-y-2 divide-green-700 divide-opacity-80 divide-solid">
                <h1 class="p-2 font-black">Paramètres</h1>
                
                <button class="p-2 hover:bg-gray-100 border-green-700" onclick="showAccount();">Compte</button>
                <button class="p-2 hover:bg-gray-100 border-green-700" onclick="clearContents();">Clear</button>
            </nav>

            <div id="contents" class="w-full ml-5"></div>
        </div>
    </div>
@endsection