@extends('layouts.app')

@section('content')
    <div class="container md:mx-56 space-y-5">
        <div class="w-full text-center">
            <div class="text-xl font-black">{{ $user->firstname }} {{ $user->lastname }}</div>
            <div class="text-xs font-thin">Votre compte personnel</div>
        </div>

        <div class="flex w-full">
            <nav class="flex flex-col md:w-1/6 border-2 border-opacity-80 border-green-700 rounded divide-y-2 divide-green-700 divide-opacity-80 divide-solid">
                <h1 class="p-2 font-black">Paramètres</h1>
                <a  class="p-2 hover:bg-gray-100 hover:border-l-4 border-green-700" href="#">Compte</a>
            </nav>

            <div id="contents" class="w-full ml-5">
                <div class="space-y-3">
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
                </div>
            </div>
        </div>
    </div>
@endsection