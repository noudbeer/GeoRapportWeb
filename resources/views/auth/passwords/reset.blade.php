@extends('layouts.app')

@section('content')
<div class="container mx-auto flex h-96 m-auto justify-center">
    <div class="m-auto space-y-2 border-2 border-green-700 rounded-lg p-3">
        <div class="text-center border-b border-green-600">{{ __('Reset Password') }}</div>

        <form class="space-y-2" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input class="border rounded" type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email">{{ __('E-Mail Address') }}</label>
                <div>
                    <input class="border rounded" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <div>
                    <label class="@error('password') text-red-600 @enderror" for="password">{{ __('Password') }}</label>
                    <div>
                        <input id="password" type="password" class="border rounded @error('password') border-red-600 @enderror" name="password" required autocomplete="new-password">
                    </div>
                </div>

                <div>
                    <label for="password-confirm" class="@error('password') text-red-600 @enderror">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="border rounded @error('password') border-red-600 @enderror" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                @error('password')
                    <span role="alert">
                        <strong class="text-red-600">{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="items-center bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">
                {{ __('Reset Password') }}
            </button>
        </form>
    </div>
</div>
@endsection
