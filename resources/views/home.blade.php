@extends('layouts.app')

@section('content')
    <div class="container flex h-96 m-auto justify-center bg-onf">
        <div class="m-auto space-y-2 border-2 border-green-700 rounded-lg p-3">
            <div class="text-center border-b border-green-700">{{ __('Dashboard') }}</div>

            <div class="text-center space-y-2 p-5">
                @if (session('status'))
                    <div class="" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
            
            <div class="flex justify-center mt-3 text-center">
                @auth
                    <div class="flex space-x-1">
                        <a href="{{ url('/map') }}" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">Map</a>
                        <a href="{{ route("logout") }}" class="bg-red-500 transition duration-150 ease-in-out hover:bg-red-600 rounded-md p-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-gray-300 transition duration-150 ease-in-out hover:bg-gray-500 rounded-md p-1">{{ __('Login') }}</a>
                
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-gray-300 transition duration-150 ease-in-out hover:bg-gray-500 rounded-md p-1">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
