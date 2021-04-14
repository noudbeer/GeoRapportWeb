@extends('layouts.app')

@section('content')
<div class="container mx-auto flex h-96 m-auto justify-center">
    <div class="m-auto space-y-2 border-2 border-green-700 rounded-lg p-3">
        <div class="text-center border-b border-green-600">{{ __('Register') }}</div>

            <form class="space-y-2" method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label for="firstname" class="@error('firstname') text-red-600 @enderror">{{ __('FirstName') }}</label>
                    <div>
                        <input id="firstname" type="text" class="border rounded @error('email') border-red-600 @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                        @error('firstname')
                            <span role="alert">
                                <strong class="text-red-600">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="lastname" class="@error('lastname') text-red-600 @enderror">{{ __('LastName') }}</label>
                    <div>
                        <input id="lastname" type="text" class="border rounded @error('email') border-red-600 @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                        @error('lastname')
                            <span role="alert">
                                <strong class="text-red-600">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="@error('email') text-red-600 @enderror">{{ __('E-Mail Address') }}</label>
                    <div>
                        <input id="email" type="email" class="border rounded @error('email') border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span role="alert">
                                <strong class="text-red-600">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="@error('email') text-red-600 @enderror">{{ __('Password') }}</label>
                    <div>
                        <input id="password" type="password" class="border rounded @error('email') border-red-600 @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-600">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password-confirm" class="@error('email') text-red-600 @enderror">{{ __('Confirm Password') }}</label>
                    <div>
                        <input id="password-confirm" type="password" class="border rounded @error('email') border-red-600 @enderror" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1"">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
