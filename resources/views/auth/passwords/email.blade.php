@extends('layouts.app')

@section('content')
<div class="container mx-auto flex h-96 m-auto justify-center">
    <div class="m-auto space-y-2 border-2 border-green-700 rounded-lg p-3">
        <div class="text-center border-b border-green-600">{{ __('Reset Password') }}</div>
        @if (session('status'))
            <div class="">
                {{ session('status') }}
            </div>
        @endif

        <form class="space-y-2" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <label class="@error('email') text-red-600 @enderror" for="email">{{ __('E-Mail Address') }}</label>
                <div>
                    <input class="border rounded @error('email') border-red-600 @enderror" name="email" id="email" type="email" autofocus>
                </div>
                @error('email')
                    <span>
                        <strong class="text-red-600">{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="items-center bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>
</div>
@endsection
