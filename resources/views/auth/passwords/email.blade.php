@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center m-2 border-2 border-green-600 rounded-lg">
    <div class="m-3 space-y-2">
        <div class="text-center border-b border-green-600">{{ __('Reset Password') }}</div>
        @if (session('status'))
            <div class="">
                {{ session('status') }}
            </div>
        @endif

        <form class="space-y-2" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="">
                <label for="email" class="@error('email') text-red-600 @enderror">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input class="border rounded @error('email') border-red-600 @enderror" id="email" type="email" autofocus>

                    @error('email')
                        <span>
                            <strong class="text-red-600">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="items-center bg-green-600 transition duration-150 ease-in-out hover:bg-green-700 rounded-md p-1">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>
</div>
@endsection
