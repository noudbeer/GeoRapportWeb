@extends('layouts.app')

@section('content')
    <div class="sm:mx-56 space-y-5 divide-y-2 divide-green-700 divide-dashed text-center">

        <div>
            <h1 class="text-xl font-black underline py-5">Création d'un nouvel utilisateur</h1>
        </div>

        <form class="space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex justify-around">
                <div>
                    <label for="lastname" class="@error('lastname') text-red-600 @enderror">{{ __('LastName') }} :</label>
                    <input id="lastname" type="text" class="border border-green-700 rounded-lg @error('email') border-red-600 @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                    @error('lastname')
                        <span role="alert">
                            <strong class="text-red-600">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="firstname" class="@error('firstname') text-red-600 @enderror">{{ __('FirstName') }} :</label>
                    <input id="firstname" type="text" class="border border-green-700 rounded-lg @error('email') border-red-600 @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                    @error('firstname')
                        <span role="alert">
                            <strong class="text-red-600">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" class="w-1/3 @error('email') text-red-600 @enderror">{{ __('E-Mail Address') }} :</label>
                <input id="email" type="email" class="w-2/3 max-w-full border border-green-700 rounded-lg text-center @error('email') border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span role="alert">
                        <strong class="text-red-600">{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label>Rôle :</label>
                <select  id="role" class="rounded-lg @error('role') text-red-600 @enderror" name="role_id" required>
                    @foreach ($roles as $role)
                        <option value={{ $role->id }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <button class="bg-green-600 p-2 rounded-lg hover:bg-green-700">Créer</button>
        </form>
    </div>
@endsection