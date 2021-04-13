@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center m-2 border-2 border-green-600 rounded-lg">
    <div class="m-3 space-y-2">
        <div class="text-center border-b border-green-600">{{ __('Login') }}</div>

        <form class="space-y-2" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" class="@error('email') text-red-600 @enderror">{{ __('E-Mail Address') }}</label>
                <div>
                    <input id="email" name="email" type="email" class="border rounded @error('email') border-red-600 @enderror" autofocus>
                    @error('email')
                        <span>
                            <strong class="text-red-600">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" class="@error('email') text-red-600 @enderror">{{ __('Password') }}</label>
                <div>
                    <input id="password" name="password" type="password" class="border rounded @error('email') border-red-600 @enderror">
                    @error('password')
                        <span>
                            <strong class="text-red-600">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <input type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label>{{ __('Remember Me') }}</label>
            </div>

            <div class="flex justify-between space-x-2 items-center">
                <button type="submit" class="bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">
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
