@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center m-2 border-2 border-green-500 rounded-lg">
    <div class="m-3 space-y-2">
        <div class="text-center border-b border-green-500">{{ __('Login') }}</div>

        <form class="space-y-2" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="">
                <label for="email" class="@error('email') text-red-600 @enderror">{{ __('E-Mail Address') }}</label>
                <div class="">
                    <input id="email" name="email" type="email" class="border rounded @error('email') border-red-600 @enderror" autofocus>
                    @error('email')
                        <span>
                            <strong class="text-red-600">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <label for="password" class="@error('email') text-red-600 @enderror">{{ __('Password') }}</label>
                <div class="">
                    <input id="password" name="password" type="password" class="border rounded @error('email') border-red-600 @enderror">
                    @error('password')
                        <span>
                            <strong class="text-red-600">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <input type="checkbox" {{ old('remember') ? 'checked' : '' }}>

                <label class="">{{ __('Remember Me') }}</label>
            </div>

            <div class="flex justify-between space-x-2 items-center">
                <button type="submit" class="bg-green-400 transition duration-150 ease-in-out hover:bg-green-500 rounded-md p-1">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="hover:underline">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
