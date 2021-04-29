<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GeoRapport') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/panels.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="overflow-hidden">
    <div id="app">
        @guest
            <nav class="flex justify-between p-3 sm:px-20 bg-green-700 items-center">
                <div>
                    <a href="{{ url('/') }}" onfocus="this.blur();">
                        <button class="font-black" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span>{{ config('app.name', 'GeoRapport') }}</span>
                        </button>
                    </a>
                </div>

                <svg height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 237 89.1">
                    <style>
                        .st0 {
                            fill: #00652e
                        }
                
                        .st2 {
                            fill: #fff
                        }
                    </style>
                    <path class="st0" d="M118 89.1c24.6 0 44.6-20 44.6-44.6C162.5 20 142.6 0 118 0S73.4 20 73.4 44.6s20 44.5 44.6 44.5">
                    </path>
                    <path d="M220 78.8c9.4 0 17-7.6 17-17s-7.6-17-17-17H17c-9.4 0-17 7.6-17 17s7.6 17 17 17" fill="#00a550"></path>
                    <path class="st2"
                        d="M17.7 52.6c2.7 0 5.7 2.4 5.7 8.8 0 6.7-3.3 8.8-5.7 8.8-2.8 0-5.7-2.5-5.7-9 0-5.7 2.9-8.6 5.7-8.6m0 14.4c1.5 0 2.4-1.1 2.4-5.6 0-3-.4-5.5-2.4-5.5-1.8 0-2.4 2.1-2.4 5.5.1 3.5.6 5.6 2.4 5.6M25.7 60.5h-.9v-2.1h.9v-.8c0-3.4 1.8-5 3.9-5 .5 0 .7.1 1.3.2v2.6c-.4-.1-.4-.2-.7-.2-1.1 0-1.5.8-1.5 2v1.1H30v2.1h-1.5V70h-2.9M32 60.5h-.9v-2.1h.9v-.8c0-3.4 1.8-5 3.9-5 .5 0 .7.1 1.3.2v2.6c-.4-.1-.4-.2-.7-.2-1.1 0-1.5.8-1.5 2v1.1h1.5v2.1H35V70h-3M38.3 58.4h2.9V70h-2.9zM50.5 69.5c-1.1.5-1.8.8-2.6.8-2.6 0-4.6-2.5-4.6-6s1.9-6.1 4.6-6.1c.8 0 1.5.2 2.5.8v2.7c-.7-.5-1.3-.8-1.9-.8-1.3 0-2.2 1.3-2.2 3.2 0 2 .9 3.4 2.3 3.4.6 0 1.1-.2 1.9-.8M59.7 69.1c-1.1.8-2.2 1.2-3.4 1.2-3.5 0-4.3-3.5-4.3-5.8 0-3.6 1.7-6.3 4.1-6.3 2.2 0 3.9 2.1 3.8 6.6h-5c.1 2 1 3.1 2.3 3.1.8 0 1.5-.3 2.4-.9m-2.3-3.9c0-1.9-.4-2.9-1.1-2.9-.8 0-1.2 1.1-1.2 2.9h2.3zM192.1 58.4h2.7v4.4c.6-3.1 1.4-4.5 2.5-4.5.5 0 1.1.2 1.7.7l-.6 3.2c-.4-.4-.8-.6-1.2-.6-1.5 0-2.2 3.4-2.2 6.6V70h-2.9M207.6 69.1c-1.1.8-2.2 1.2-3.4 1.2-3.5 0-4.3-3.5-4.3-5.8 0-3.6 1.7-6.3 4.1-6.3 2.2 0 3.9 2.1 3.8 6.6h-5c.1 2 1 3.1 2.3 3.1.8 0 1.5-.3 2.4-.9m-2.3-3.9c0-1.9-.4-2.9-1.1-2.9-.8 0-1.2 1.1-1.2 2.9h2.3zM216.2 69.3c-1.1.7-1.8 1-2.6 1-1.4 0-3.1-1-3.1-3.9v-5.6h-1.3v-.5l3.7-5.4h.5v3.6h2.7v2.3h-2.7v4.9c0 1.1.3 1.8 1 1.8.5 0 .9-.2 1.7-.9M217.7 66.6c1.2.8 2.1 1.2 3 1.2.6 0 1.1-.4 1.1-1 0-1.6-4.2-1.3-4.2-4.9 0-2.2 1.4-3.7 3.4-3.7 1 0 2 .3 3 1.1v2.4c-.6-.4-1.2-.7-1.7-.9-.5-.2-.9-.3-1.4-.3-.7 0-1.1.3-1.1.8 0 1.6 4.5 1.2 4.5 5.2 0 2.2-1.4 3.8-3.5 3.8-1 0-1.9-.3-3.2-1M65.2 52.9h2.9l3.7 9.7v-9.7h3v17.2H72l-3.8-10.2h-.1v10.2h-2.9M85.8 69.2c-1 .8-1.7 1.1-2.4 1.1-.9 0-1.3-.5-1.5-1.6-1 1.2-1.7 1.6-2.7 1.6-1.3 0-2.4-1.3-2.4-2.9 0-2.4 2.1-3.5 5-4.7v-.4c0-1.1-.4-1.6-1.2-1.6-1 0-1.9.5-3.2 1.8v-2.6c1.3-1.2 2.3-1.6 3.9-1.6 1.8 0 3.4.7 3.4 3.3v4.7c0 1.1 0 1.3.3 1.3.2 0 .5-.1.8-.5m-4-2.8c-1.5.7-2.3 1.3-2.3 2.3 0 .7.4 1.2 1 1.2.5 0 .7-.1 1.3-.8v-2.7zM93.5 69.3c-1.1.7-1.8 1-2.6 1-1.4 0-3.1-1-3.1-3.9v-5.6h-1.3v-.5l3.7-5.4h.5v3.6h2.7v2.3h-2.7v4.9c0 1.1.3 1.8 1 1.8.5 0 .9-.2 1.7-.9M95.5 58.4h2.9V70h-2.9zM105 70.4c-2.6 0-4.5-2.6-4.5-6.1 0-3.9 2.2-6.1 4.5-6.1 2.4 0 4.5 2.3 4.5 6.1 0 3.5-1.9 6.1-4.5 6.1m0-9.5c-1 0-1.5 1.2-1.5 3.4 0 2.4.5 3.4 1.5 3.4s1.5-1.1 1.5-3.4c-.1-2.2-.5-3.4-1.5-3.4M111.5 58.4h2.9V60c.7-1.3 1.5-1.9 2.6-1.9 1.8 0 3 1.5 3 4.2V70h-2.9v-7.1c0-1.3-.3-2.1-1.1-2.1-.7 0-1.2.7-1.6 1.9V70h-2.9M130.7 69.2c-1 .8-1.7 1.1-2.4 1.1-.9 0-1.3-.5-1.5-1.6-1 1.2-1.7 1.6-2.7 1.6-1.3 0-2.4-1.3-2.4-2.9 0-2.4 2-3.5 5-4.7v-.4c0-1.1-.4-1.6-1.2-1.6-1 0-1.9.5-3.2 1.8v-2.6c1.3-1.2 2.4-1.6 3.9-1.6 1.8 0 3.4.7 3.4 3.3v4.7c0 1.1 0 1.3.3 1.3.2 0 .5-.1.8-.5m-4-2.8c-1.5.7-2.3 1.3-2.3 2.3 0 .7.4 1.2 1 1.2.5 0 .7-.1 1.3-.8v-2.7zM132.3 52.9h2.9v17.2h-2.9zM146.2 68.9c-.9 1-1.6 1.4-2.5 1.4-2 0-3.6-2.6-3.6-6 0-3.5 1.5-6 3.7-6 .9 0 1.5.3 2.4 1.3V53h2.9v17.2h-2.9m0-8.3c-.6-.7-.9-1-1.5-1-1 0-1.6 1.2-1.6 3.3 0 2.1.6 3.3 1.5 3.3.6 0 1.1-.4 1.6-1.2v-4.4zM158.9 69.1c-1.1.8-2.2 1.2-3.4 1.2-3.5 0-4.3-3.5-4.3-5.8 0-3.6 1.7-6.3 4.1-6.3 2.1 0 3.9 2.1 3.8 6.6h-5c.1 2 1 3.1 2.3 3.1.8 0 1.5-.3 2.4-.9m-2.3-3.9c0-1.9-.4-2.9-1.1-2.9-.8 0-1.2 1.1-1.2 2.9h2.3zM160.9 66.6c1.2.8 2.1 1.2 3 1.2.6 0 1.1-.4 1.1-1 0-1.6-4.2-1.3-4.2-4.9 0-2.2 1.4-3.7 3.4-3.7 1 0 2 .3 3 1.1v2.4c-.6-.4-1.2-.7-1.7-.9-.5-.2-.9-.3-1.4-.3-.7 0-1.1.3-1.1.8 0 1.6 4.5 1.2 4.5 5.2 0 2.2-1.4 3.8-3.5 3.8-1 0-1.9-.3-3.2-1M172.5 52.9h7.2v2.9h-4.1v4.1h3.9v3h-3.9v7.2h-3.1M185.6 70.4c-2.6 0-4.5-2.6-4.5-6.1 0-3.9 2.2-6.1 4.5-6.1 2.4 0 4.5 2.3 4.5 6.1 0 3.5-1.9 6.1-4.5 6.1m0-9.5c-1 0-1.5 1.2-1.5 3.4 0 2.4.5 3.4 1.5 3.4s1.5-1.1 1.5-3.4c-.1-2.2-.5-3.4-1.5-3.4M101 10.1c.3-.1 1.2 1.1.9.1-.1-.2.1-.4.2-.6.1-.2-.1-.5.1-.7.4-.5 2.4-2.1 2.2-1.2-.1.4.5.5.9.1.1-.1.2-.7.5-.8.6-.2 2.2-.9 1.9-.2-.5 1.1.4.6.5.7.5.2-.1-.8 1-1.1.8-.2 1.6-.9 2.4.2.1.1.7-.1.7-.3 0-.7.8-.8 1.3-1 .7-.4 1.6.2 2.2.4.4.1 1.1-.1 1.6-.3.4-.2.9-.2 1.2 0 .3.2-.2.9.2.8.6-.1 1.1-.6 1.7-.8.8-.2 1.5-.2 2.4-.4.1 0 .4.1.5.2.2.2-.1.5.2.7.4.1.9.2 1.2.3.5.1.7-.1 1.2-.1.3 0 .6.4.9.5.9.2 1.6-.4 2.2.2.5.5.2.3-.5.4-.1 0-.4.4-.2.5.4.3.2-.3.8 0 .5.3.7-.4 1.4-.2.5.1.4.8.9.8.4 0 .7-.3 1-.1.4.2.4.6.5.9.1.5.8 0 1.1.2.2.1-.1.4-.1.7 0 .1.8 0 .8 0 .7-.1.9-.1 1.3.4.2.3-.3.5-.2.8.1.4.8.7.9.8.4.5-.9 1.1-1.9 1.6-.9.5-1.2 1.2-2.3 1.1-.1 0-.5-.2-.9-.1-.1 0-.3.2-.3.2.4.2.4.4.1.6-1 .7-1.8 1.7-3 1.7-.3 0 0-.6-.3-.6-.3.1-1-.1-.9.3.1.4.9.5.7.9-.4.7-1.5 1.5-2.5.9-.2-.1-.4.4-.5.7-.3.6-1.1 1.1-2 .8 0 0-.2.1-.2.2.3.3.2.7 0 .8-.6.4-1.1.8-1.8.9-.3.1-.7.3-1.1.6-.3.2-.7.1-1-.3-.3.4-1 .4-1.1.9-.1.4.8.2.4.7-.5.7-1.3.8-2.1 1-.7.1-1 .9-1.7 1.3-.3.2-.8-.1-.9.2-.1.5-.7.8-1.1 1.2-.3.4-.9-.1-1.2.1-.2.1-.3.5-.5.8-.3.5-.9.9-1.5 1.2-.2.1-.6 0-.8.1-.9.5-.7.7-1.6 1.2-.2.1-.3.7-1.6-.2-.4-.3.4-.8.4-1.2 0-.3 0-.4-.2-.2-.5.5-1.3 1.5-2.2.6-.2-.2-.5-.7-1-.5-.4.1-1-.1-1-.4.1 0 .7-.3.7-.4.1-.2.1-.4 0-.4-.9.1-.9.5-1.3.1-.2-.2 0-.6-.4-.4-.3.1-.2 0-.5-.1 0-.1-.3-.3-.3-.3 0-.5.5-.2.8-.6.1-.1 0-.2-.1-.2-.5 0-.9.1-1.3-.1-.5-.2.3-.6.4-.9 0-.1.1-.3-.1-.3-.3 0-.7.3-.9-.1-.1-.3-1.1-1-.9-1.5.2-.5 1.6-.7 1.1-.9-.7-.4-.4-.1-.9 0s-1 0-.9-.6c.1-.7 1.4-.5 1.9-.8 0-.9-1.1-.4-1.3-.6-.4-.5-.6-1-.2-1.5.1-.1.5-.4.6-.7 0-.1.1-.2.2-.3-.1-.1-.3-.2-.3-.3-.3-.4.2-.6.4-1 .1-.3.6-.9.5-1.2-.1-.3-.9-.5-.6-.8.6-.6 0-.7 1.3-1.2.2-.1 1.8 0 1.7-.2-.3-.6-1.2.1-1.4-.8-.2-.8 1.2-.2 1.7-.7-.4-.2-1.4-.5-1.1-.9.1-.3.5-1.1 1-1.3M113 42.5V32l25.8-16c.3.8.3 1.8.3 1.8l-23.6 14.7v10">
                    </path>
                    <path class="st2" d="M117.2 42.5V33l22-13.6c-.3 2.2 0 1-.3 2.2l-19.1 11.9v8.9"></path>
                    <path class="st2" d="M121.4 42.5V34l17.2-10.6c-.7 2.2-.6 1.7-1.2 2.8L124 34.4v8.1"></path>
                    <path class="st0"
                        d="M109.6 10.5c.6.3.4-.4.4-.7-.1-.4-.5 0-.8.2-.4.2-.8.1-1.2.1-.2 0-.4.6-.1.7.6.1.9-.7 1.7-.3M116.1 11.9c-.6.3-.8 1.6-.9 2.1 0 .1.8-.3.9-.3.3-.2.6-.2.8-.4.3-.1 1.3-.5 1.2-.8-.1-.3-1.2.3-1.2-.1 0-.3.3-.5.6-.7-.5-.5-1 0-1.4.2M117.7 10.8c0 .1-.1.4.1.3 1.1-.1 1.4-.4 2.2-1.1l-.2-.2c-.7.2-1.4.7-2.3.4-.1 0-.1.1-.1.2.1.3.3 0 .3.4M119.4 14.4c-.2.2-.8.3-.5.6.9.8-.8 1.4-1.3 2 .2.2 1.3-.4 1.4 0 .2.8-.8.9-1.1 1.5 0 .1.1.2.2.1s.2-.2.3-.2c.6-.1 1.3.2 1.7-.4.2-.2-.3-.2-.3-.3-.1-.3.3-.5.3-.7 0-.3-.3-.6-.2-.8.4-.5.8-1.4.8-2.4 0-.3-1 .3-1.3.6M112.6 13.7c-.1.1-1.7.7-1.7.8-1.9.9 3.8 0 2.9-.3-.3-.2.8-1.4-.9-.4 0 .1-.1-.2-.3-.1M112.5 17.3c-.2-.1-.7.4-1 .2-.4-.2.4-.9 0-.9-.7-.1-1.7.6-2.2 1 0 0 .3.1.4 0 .3-.2.7-.3 1-.2.3.1.3.6.1.6-.5.2-1 .5-1.6.7-.4.1-.9.3-1.2.7-.1.1 0 .2.1.2.9-.1 1.6-1.1 2.3-.7.3.1.3.8.6 1.1.2.2.5-.1.5-.3.1-.3-.1-.7.1-.9.4-.6 1.1-.6 1.7-.9.3-.1.5.2.7.1 0 .2.1.4-.1.6.5.3.8-.1 1.1-.4.3-.3.2-.6-.2-.7-.8 0-1.5.2-2.3-.2M112.4 9.1c-.5 0-.5.8-.2.8.5.1 2.2-.9 2.6-1.2.2-.1-1.1-.1-1.4-.1-.2-.2-.7.4-1 .5M114.7 7.2c.1-.2-.2-.2-.2-.4-.1.3-2.3.8-2.2 1.1 0 .1 1.7-.2 1.8-.3.2-.1.5-.2.6-.4M116.7 7.3c-.1.1-.4.7-.4.7.3 0 2-.5 1.9-1.1 0-.1-.8-.1-.8 0-.2 0-.4.2-.7.4M119.7 7.3c.1.9 2.3-.5 2.3-.7-.1-.4-2.7.2-3.1.4-.1 0 .3.6.4.5.1 0 .4-.4.4-.2M122 8.1c-.3.1-.6.1-.9.4.7.4 1.4.1 1.7-.6.1-.1.1-.3-.1-.3s-.4.4-.7.5M121.4 10c-.8.4.2 1.3-.2 2h-.2c-.2.1-.2.3-.3.5.9-.1 1.5-.4 2.3-.5.5 0 .9-.5 1.2-1 .1-.1.1-.3-.1-.3-.9 0-1.7 1.2-2.4.6-.3-.3.1-1.2.6-1.6-.2-.4-.5.1-.9.3M126.4 9c-.1-.1-.7-.3-.7-.1 0 .6-.3.7-.4 1.2.8-.1 2.6-.5 2.5-1.2-.1-.6-.9.5-1.4.1M127.1 7.3c.2-.1.7-.2.5-.4-.3-.3-1.7 0-2.1.3.3.6 1.3.1 1.6.1M130.8 10.8c.3-.1 1.1-1 1.4-1.2-.4-.4-1.4-.1-1.6.1-.1.1-.8.6-.7.7 0 .3-1.6 1.4.9.4M131.1 13.3c-.5.3-1.1.6-1.2 1.2 0 .2.4.2.5.1.7-.5 1.1-1.2 2-1.1.1 0 .2-.1.2-.2-.5-.2-1-.3-1.5 0M134.7 11.8c-.5.3-1.1.3-1.3.8 0 .1.2.1.3.1.1 0 .2-.2.3-.2.3-.1.7-.1.9.2.4-.2 1.1-1.1.6-1.5-.2 0-.8.5-.8.6M127.7 13.7c0 .2-.6.7-.8.9.6.3 1.4-.7 1.8-.8.3-.1.7-.3.9-.7.1-.2-.2-.2-.2-.4-.6.3-1.3 0-1.8.4-.2.2.1.4.1.6M124.7 13c.4-.1.6-.4 1-.5.3-.1.3-.7.1-.6-1.1.6-2.4 1-3.3 2.1.4.3.8 0 1.2.4.1.1.3-.2.4-.3-.2-.1-.4-.4-.2-.6.2-.2.5-.5.8-.5M123.7 15.9c-.1-.2.1-.3.2-.5.1-.1 0-.2-.1-.2-.7.1-1.2 1-2 .5 0 0-.2.1-.2.2-.1.5.5.1.6.4.1.5-.3.9-.3 1.3 0 .1.1.2.2.2.3.1.6-.1.7-.4.1-.1 0-.3 0-.3.4-.4 1-.8 1.6-.5.1-.2.3-.1.4-.2.2-.1.4.1.5.2.1.2-.1.4-.2.6-.1.1.2.1.3.1.4-.3 1-.5 1-.8-.1-1.2-1.6 0-2.4-.4-.1 0-.3-.1-.3-.2M116.6 21c.7-.3 2.8-.2 3.3-.9-1-1.5-3.4.5-4.5 1.2-.1.1.1.2.1.2.3-.2.7-.4 1.1-.5M115.4 22.4c-.3 0-.5.3-.6.5-.1.3-.1.6-.2.9-.1.1.2.1.3.1.3-.2.6-.3 1-.4.1 0 .2-.1.2-.2v-1c0-.1-.1-.2-.2-.1-.1 0-.2.2-.5.2M111.5 24.9c-.2.1-1.1.7-1.2.8.5.2-.4.7-.2 1.2.7-.5 2.4-1.3 3.1-1.9-.6-.4-.1-.9-.1-1.3s-.5-.4-.7-.1c-.4.4-.3 1-.9 1.3M109.8 23.5c.5-.3 2.3-1 2.2-1.6-.1-.3-1.6.6-2 .6-.2 0 .1-.5-.5-.4-.6.1 0-.3-1 .7-.7.7-.2.7.1 1.2.2.4.8-.2 1.2-.5M106.4 25.3c-.9.5-1 1-2.1.9-.5 0-1 .4-1.6.4-.1 0-.2.1-.1.2.2.3.5.6.9.6.5.1.9-.4 1.4-.5.4-.1.7.3 1.1.1.8-.4 1.2-1 1.1-1.7-.1-.3-.5-.1-.7 0M107.9 27.9c-1.1-.2-1.4.7-.8 1.1.5.3 2.2-1.4 2.6-1.7.1-.1-.5.1-.5 0-.2-.2-1.1.7-1.3.6M106 20.4c-.4-.1-.7.2-1 .3.4.3.8.1 1.2.2.2 0 .1.4.4.3.2-.1.3-.3.3-.6.3.1.2-.3.4-.4-.5-.3-.8.3-1.3.2M102.4 23.3c-.2 0-.2.3-.4.3-.8 0-1.7-.2-2.2.6-.1.1 0 .2.1.2.4-.1.8-.5 1.2-.4.3.1.3.6.6.5.5-.1 1-.1 1.5-.3-.9-.4-.1-.9.2-1.5 0 0-.1-.2-.2-.1-.3.2-.4.6-.8.7M104.6 18.7c.4-.2.9-.7.8-.9-.4-.6.8-1.2 1.4-1.3 1.2-1.6-2.3.3-2.5.8-.1.3.6.4.4.8-.3.5-1.9 1.1-1.5 1.2.6.1 1-.4 1.4-.6M101.5 21c.6-.6-.9-.2-.8-.3l-.2-.2c-.2.2-1.2.2-1.3.5 0 .1-.3.9-.2.8.2-.1 2.4-.6 2.5-.8M101.5 19.1c.1-.2.3 0 .4-.1.2-.3.2-.6.5-.8-.7-.5-1.8-.4-2.3.3-.1.1 0 .2.1.2.3-.1.6-.4.9-.1.1.2-.1.5.2.7 0 .2.1 0 .2-.2M107 14.8c.3-.1 2.3-.4 1.6-1.1 0 0-1.8.3-1.9.3-.7.2-.8.4-1.2 1.1-.1.1-.8.7-.7.7 1 0 2.1-.7 1.9-.7.2-.1.2-.3.3-.3M109.9 12.1c.2.6-.8.6-.8.8.1.5 2-.7 2.5-.9-.1-.2-1.7-.1-1.7.1M104.9 12.2l.2-.2c-.3-.3-.8-.2-1.1-.1l-1.2.6c-.1 0-.4.7-.3.7.9 0 1.7-.5 2.4-1M107.3 9.2c.2-.3 1.2-.2 1.5-.5.3-.3-1-.4-1.2-.3-.4.1-.8.4-.6.8 0 .2.2.1.3 0M105.2 11.3c.1-.1 1.6-1.4.9-1.5-.1 0-1.8.9-1.9.9-.3 0-.4.3-.3.5 0 .1.1.2.2.2s1 0 1.1-.1M101.7 16.4c.1-.1 1.4-.6 1.5-.7.1-.1.7-1.1.7-1.1-.3-.8-2.7 1.6-3 1.9.2.2.3.2.8-.1">
                    </path>
                    <path class="st0"
                        d="M109.6 10.5c.6.3.4-.4.4-.7-.1-.4-.5 0-.8.2-.4.2-.8.1-1.2.1-.2 0-.4.6-.1.7.6.1.9-.7 1.7-.3M112.4 9.1c-.5 0-.5.8-.2.8.5.1 2.2-.9 2.6-1.2.2-.1-1.1-.1-1.4-.1-.2-.2-.7.4-1 .5M114.7 7.2c.1-.2-.2-.2-.2-.4-.1.3-2.3.8-2.2 1.1 0 .1 1.7-.2 1.8-.3.2-.1.5-.2.6-.4M116.7 7.3c-.1.1-.4.7-.4.7.3 0 2-.5 1.9-1.1 0-.1-.8-.1-.8 0-.2 0-.4.2-.7.4M119.7 7.3c.1.9 2.3-.5 2.3-.7-.1-.4-2.7.2-3.1.4-.1 0 .3.6.4.5.1 0 .4-.4.4-.2M122 8.1c-.3.1-.6.1-.9.4.7.4 1.4.1 1.7-.6.1-.1.1-.3-.1-.3s-.4.4-.7.5M126.4 9c-.1-.1-.7-.3-.7-.1 0 .6-.3.7-.4 1.2.8-.1 2.6-.5 2.5-1.2-.1-.6-.9.5-1.4.1M127.1 7.3c.2-.1.7-.2.5-.4-.3-.3-1.7 0-2.1.3.3.6 1.3.1 1.6.1M130.8 10.8c.3-.1 1.1-1 1.4-1.2-.4-.4-1.4-.1-1.6.1-.1.1-.8.6-.7.7 0 .3-1.6 1.4.9.4M131.1 13.3c-.5.3-1.1.6-1.2 1.2 0 .2.4.2.5.1.7-.5 1.1-1.2 2-1.1.1 0 .2-.1.2-.2-.5-.2-1-.3-1.5 0M107.3 9.2c.2-.3 1.2-.2 1.5-.5.3-.3-1-.4-1.2-.3-.4.1-.8.4-.6.8 0 .2.2.1.3 0M106 20.4c-.4-.1-.7.2-1 .3.4.3.8.1 1.2.2.2 0 .1.4.4.3.2-.1.3-.3.3-.6.3.1.2-.3.4-.4-.5-.3-.8.3-1.3.2M116.1 11.9c-.6.3-.8 1.6-.9 2.1 0 .1.8-.3.9-.3.3-.2.6-.2.8-.4.3-.1 1.3-.5 1.2-.8-.1-.3-1.2.3-1.2-.1 0-.3.3-.5.6-.7-.5-.5-1 0-1.4.2M117.7 10.8c0 .1-.1.4.1.3 1.1-.1 1.4-.4 2.2-1.1l-.2-.2c-.7.2-1.4.7-2.3.4-.1 0-.1.1-.1.2.1.3.3 0 .3.4M119.4 14.4c-.2.2-.8.3-.5.6.9.8-.8 1.4-1.3 2 .2.2 1.3-.4 1.4 0 .2.8-.8.9-1.1 1.5 0 .1.1.2.2.1s.2-.2.3-.2c.6-.1 1.3.2 1.7-.4.2-.2-.3-.2-.3-.3-.1-.3.3-.5.3-.7 0-.3-.3-.6-.2-.8.4-.5.8-1.4.8-2.4 0-.3-1 .3-1.3.6M112.6 13.7c-.1.1-1.7.7-1.7.8-1.9.9 3.8 0 2.9-.3-.3-.2.8-1.4-.9-.4 0 .1-.1-.2-.3-.1M112.5 17.3c-.2-.1-.7.4-1 .2-.4-.2.4-.9 0-.9-.7-.1-1.7.6-2.2 1 0 0 .3.1.4 0 .3-.2.7-.3 1-.2.3.1.3.6.1.6-.5.2-1 .5-1.6.7-.4.1-.9.3-1.2.7-.1.1 0 .2.1.2.9-.1 1.6-1.1 2.3-.7.3.1.3.8.6 1.1.2.2.5-.1.5-.3.1-.3-.1-.7.1-.9.4-.6 1.1-.6 1.7-.9.3-.1.5.2.7.1 0 .2.1.4-.1.6.5.3.8-.1 1.1-.4.3-.3.2-.6-.2-.7-.8 0-1.5.2-2.3-.2M121.4 10c-.8.4.2 1.3-.2 2h-.2c-.2.1-.2.3-.3.5.9-.1 1.5-.4 2.3-.5.5 0 .9-.5 1.2-1 .1-.1.1-.3-.1-.3-.9 0-1.7 1.2-2.4.6-.3-.3.1-1.2.6-1.6-.2-.4-.5.1-.9.3M127.7 13.7c0 .2-.6.7-.8.9.6.3 1.4-.7 1.8-.8.3-.1.7-.3.9-.7.1-.2-.2-.2-.2-.4-.6.3-1.3 0-1.8.4-.2.2.1.4.1.6M124.7 13c.4-.1.6-.4 1-.5.3-.1.3-.7.1-.6-1.1.6-2.4 1-3.3 2.1.4.3.8 0 1.2.4.1.1.3-.2.4-.3-.2-.1-.4-.4-.2-.6.2-.2.5-.5.8-.5M123.7 15.9c-.1-.2.1-.3.2-.5.1-.1 0-.2-.1-.2-.7.1-1.2 1-2 .5 0 0-.2.1-.2.2-.1.5.5.1.6.4.1.5-.3.9-.3 1.3 0 .1.1.2.2.2.3.1.6-.1.7-.4.1-.1 0-.3 0-.3.4-.4 1-.8 1.6-.5.1-.2.3-.1.4-.2.2-.1.4.1.5.2.1.2-.1.4-.2.6-.1.1.2.1.3.1.4-.3 1-.5 1-.8-.1-1.2-1.6 0-2.4-.4-.1 0-.3-.1-.3-.2M116.6 21c.7-.3 2.8-.2 3.3-.9-1-1.5-3.4.5-4.5 1.2-.1.1.1.2.1.2.3-.2.7-.4 1.1-.5M115.4 22.4c-.3 0-.5.3-.6.5-.1.3-.1.6-.2.9-.1.1.2.1.3.1.3-.2.6-.3 1-.4.1 0 .2-.1.2-.2v-1c0-.1-.1-.2-.2-.1-.1 0-.2.2-.5.2M111.5 24.9c-.2.1-1.1.7-1.2.8.5.2-.4.7-.2 1.2.7-.5 2.4-1.3 3.1-1.9-.6-.4-.1-.9-.1-1.3s-.5-.4-.7-.1c-.4.4-.3 1-.9 1.3M109.8 23.5c.5-.3 2.3-1 2.2-1.6-.1-.3-1.6.6-2 .6-.2 0 .1-.5-.5-.4-.6.1 0-.3-1 .7-.7.7-.2.7.1 1.2.2.4.8-.2 1.2-.5M102.4 23.3c-.2 0-.2.3-.4.3-.8 0-1.7-.2-2.2.6-.1.1 0 .2.1.2.4-.1.8-.5 1.2-.4.3.1.3.6.6.5.5-.1 1-.1 1.5-.3-.9-.4-.1-.9.2-1.5 0 0-.1-.2-.2-.1-.3.2-.4.6-.8.7M104.6 18.7c.4-.2.9-.7.8-.9-.4-.6.8-1.2 1.4-1.3 1.2-1.6-2.3.3-2.5.8-.1.3.6.4.4.8-.3.5-1.9 1.1-1.5 1.2.6.1 1-.4 1.4-.6M101.5 21c.6-.6-.9-.2-.8-.3l-.2-.2c-.2.2-1.2.2-1.3.5 0 .1-.3.9-.2.8.2-.1 2.4-.6 2.5-.8M101.5 19.1c.1-.2.3 0 .4-.1.2-.3.2-.6.5-.8-.7-.5-1.8-.4-2.3.3-.1.1 0 .2.1.2.3-.1.6-.4.9-.1.1.2-.1.5.2.7 0 .2.1 0 .2-.2M107 14.8c.3-.1 2.3-.4 1.6-1.1 0 0-1.8.3-1.9.3-.7.2-.8.4-1.2 1.1-.1.1-.8.7-.7.7 1 0 2.1-.7 1.9-.7.2-.1.2-.3.3-.3M109.9 12.1c.2.6-.8.6-.8.8.1.5 2-.7 2.5-.9-.1-.2-1.7-.1-1.7.1M104.9 12.2l.2-.2c-.3-.3-.8-.2-1.1-.1l-1.2.6c-.1 0-.4.7-.3.7.9 0 1.7-.5 2.4-1M105.2 11.3c.1-.1 1.6-1.4.9-1.5-.1 0-1.8.9-1.9.9-.3 0-.4.3-.3.5 0 .1.1.2.2.2s1 0 1.1-.1M101.7 16.4c.1-.1 1.4-.6 1.5-.7.1-.1.7-1.1.7-1.1-.3-.8-2.7 1.6-3 1.9.2.2.3.2.8-.1M106.4 25.3c-.9.5-1 1-2.1.9-.5 0-1 .4-1.6.4-.1 0-.2.1-.1.2.2.3.5.6.9.6.5.1.9-.4 1.4-.5.4-.1.7.3 1.1.1.8-.4 1.2-1 1.1-1.7-.1-.3-.5-.1-.7 0M107.9 27.9c-1.1-.2-1.4.7-.8 1.1.5.3 2.2-1.4 2.6-1.7.1-.1-.5.1-.5 0-.2-.2-1.1.7-1.3.6M134.7 11.8c-.5.3-1.1.3-1.3.8 0 .1.2.1.3.1.1 0 .2-.2.3-.2.3-.1.7-.1.9.2.4-.2 1.1-1.1.6-1.5-.2 0-.8.5-.8.6">
                    </path>
                    <path class="st2"
                        d="M109 42.5V30.9L137.5 13c.3.4.5.9.8 1.5l-26.8 16.9v11.1M203.1 54.2h2.1l1.8 2.9h-1.8l-1.1-1.7-1.1 1.7h-1.7M41.3 55.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5 1.5.7 1.5 1.5M98.5 55.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5 1.5.7 1.5 1.5">
                    </path>
                </svg>

                <ul class="flex space-x-4">
                    <!-- Authentication Links -->
                    @if (Route::has('login'))
                        <li class="">
                            <a class="hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="">
                            <a class="hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </nav>
        @else
            <nav>
                <div class="absolute m-3 z-5000">
                    <a href="#" id="buttonOpenDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onfocus="this.blur();" onclick="openDropdown()">
                        <svg height="40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#006432" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
                    </a>
                </div>
                
                <div class="absolute inset-y-0 h-full z-5000 transform -translate-x-full transition duration-250 ease-in-out" id="menu" aria-labelledby="menuDropdown">
                    <div class="flex justify-between items-center m-3">
                        <a href="{{ asset('home') }}" class="font-black" id="buttonCloseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onfocus="this.blur();">
                            GeoRapport
                        </a>
                        <a href="#" class="" id="buttonCloseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onfocus="this.blur();" onclick="closeMenu(getElementById('menu'))">
                            <svg height="40px" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="accessible-icon" class="svg-inline--fa fa-accessible-icon fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M423.9 255.8L411 413.1c-3.3 40.7-63.9 35.1-60.6-4.9l10-122.5-41.1 2.3c10.1 20.7 15.8 43.9 15.8 68.5 0 41.2-16.1 78.7-42.3 106.5l-39.3-39.3c57.9-63.7 13.1-167.2-74-167.2-25.9 0-49.5 9.9-67.2 26L73 243.2c22-20.7 50.1-35.1 81.4-40.2l75.3-85.7-42.6-24.8-51.6 46c-30 26.8-70.6-18.5-40.5-45.4l68-60.7c9.8-8.8 24.1-10.2 35.5-3.6 0 0 139.3 80.9 139.5 81.1 16.2 10.1 20.7 36 6.1 52.6L285.7 229l106.1-5.9c18.5-1.1 33.6 14.4 32.1 32.7zm-64.9-154c28.1 0 50.9-22.8 50.9-50.9C409.9 22.8 387.1 0 359 0c-28.1 0-50.9 22.8-50.9 50.9 0 28.1 22.8 50.9 50.9 50.9zM179.6 456.5c-80.6 0-127.4-90.6-82.7-156.1l-39.7-39.7C36.4 287 24 320.3 24 356.4c0 130.7 150.7 201.4 251.4 122.5l-39.7-39.7c-16 10.9-35.3 17.3-56.1 17.3z"></path></svg>
                        </a>
                    </div>
                    
                    <div class="flex flex-col">
                        <a href="{{ url('/') }}" class="px-2 hover:bg-green-600">Accueil</a>
                        <a href="{{ route('map') }}" class="px-2 hover:bg-green-600">Map</a>
                    </div>

                    <div class="flex flex-col">
                        <a href="#" class="px-2 hover:bg-green-600" onclick="openPanel(getElementById('panelSite')); closeMenu(getElementById('menu'));">Créer un nouveau chantier</a>
                        <a href="#" class="px-2 hover:bg-green-600" onclick="openPanel(getElementById('panelIntervention')); closeMenu(getElementById('menu'));">Liste des chantiers</a>
                    </div>
                    
                    @if ( Auth::user()->hasRole('admin') )
                        <div class="flex flex-col">
                            <a href="#" class="px-2 hover:bg-green-600">Gestion des rôles</a>
                        </div>
                    @endif

                    <div class="flex flex-col px-2 hover:bg-green-600">
                        <a class="" href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a>
                        <form id="logout-form" action="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    
                    <div class="flex justify-center pt-2">
                        <svg height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 237 89.1">
                            <style>
                                .st0 {
                                    fill: #00652e
                                }
                        
                                .st2 {
                                    fill: #fff
                                }
                            </style>
                            <path class="st0" d="M118 89.1c24.6 0 44.6-20 44.6-44.6C162.5 20 142.6 0 118 0S73.4 20 73.4 44.6s20 44.5 44.6 44.5">
                            </path>
                            <path d="M220 78.8c9.4 0 17-7.6 17-17s-7.6-17-17-17H17c-9.4 0-17 7.6-17 17s7.6 17 17 17" fill="#00a550"></path>
                            <path class="st2"
                                d="M17.7 52.6c2.7 0 5.7 2.4 5.7 8.8 0 6.7-3.3 8.8-5.7 8.8-2.8 0-5.7-2.5-5.7-9 0-5.7 2.9-8.6 5.7-8.6m0 14.4c1.5 0 2.4-1.1 2.4-5.6 0-3-.4-5.5-2.4-5.5-1.8 0-2.4 2.1-2.4 5.5.1 3.5.6 5.6 2.4 5.6M25.7 60.5h-.9v-2.1h.9v-.8c0-3.4 1.8-5 3.9-5 .5 0 .7.1 1.3.2v2.6c-.4-.1-.4-.2-.7-.2-1.1 0-1.5.8-1.5 2v1.1H30v2.1h-1.5V70h-2.9M32 60.5h-.9v-2.1h.9v-.8c0-3.4 1.8-5 3.9-5 .5 0 .7.1 1.3.2v2.6c-.4-.1-.4-.2-.7-.2-1.1 0-1.5.8-1.5 2v1.1h1.5v2.1H35V70h-3M38.3 58.4h2.9V70h-2.9zM50.5 69.5c-1.1.5-1.8.8-2.6.8-2.6 0-4.6-2.5-4.6-6s1.9-6.1 4.6-6.1c.8 0 1.5.2 2.5.8v2.7c-.7-.5-1.3-.8-1.9-.8-1.3 0-2.2 1.3-2.2 3.2 0 2 .9 3.4 2.3 3.4.6 0 1.1-.2 1.9-.8M59.7 69.1c-1.1.8-2.2 1.2-3.4 1.2-3.5 0-4.3-3.5-4.3-5.8 0-3.6 1.7-6.3 4.1-6.3 2.2 0 3.9 2.1 3.8 6.6h-5c.1 2 1 3.1 2.3 3.1.8 0 1.5-.3 2.4-.9m-2.3-3.9c0-1.9-.4-2.9-1.1-2.9-.8 0-1.2 1.1-1.2 2.9h2.3zM192.1 58.4h2.7v4.4c.6-3.1 1.4-4.5 2.5-4.5.5 0 1.1.2 1.7.7l-.6 3.2c-.4-.4-.8-.6-1.2-.6-1.5 0-2.2 3.4-2.2 6.6V70h-2.9M207.6 69.1c-1.1.8-2.2 1.2-3.4 1.2-3.5 0-4.3-3.5-4.3-5.8 0-3.6 1.7-6.3 4.1-6.3 2.2 0 3.9 2.1 3.8 6.6h-5c.1 2 1 3.1 2.3 3.1.8 0 1.5-.3 2.4-.9m-2.3-3.9c0-1.9-.4-2.9-1.1-2.9-.8 0-1.2 1.1-1.2 2.9h2.3zM216.2 69.3c-1.1.7-1.8 1-2.6 1-1.4 0-3.1-1-3.1-3.9v-5.6h-1.3v-.5l3.7-5.4h.5v3.6h2.7v2.3h-2.7v4.9c0 1.1.3 1.8 1 1.8.5 0 .9-.2 1.7-.9M217.7 66.6c1.2.8 2.1 1.2 3 1.2.6 0 1.1-.4 1.1-1 0-1.6-4.2-1.3-4.2-4.9 0-2.2 1.4-3.7 3.4-3.7 1 0 2 .3 3 1.1v2.4c-.6-.4-1.2-.7-1.7-.9-.5-.2-.9-.3-1.4-.3-.7 0-1.1.3-1.1.8 0 1.6 4.5 1.2 4.5 5.2 0 2.2-1.4 3.8-3.5 3.8-1 0-1.9-.3-3.2-1M65.2 52.9h2.9l3.7 9.7v-9.7h3v17.2H72l-3.8-10.2h-.1v10.2h-2.9M85.8 69.2c-1 .8-1.7 1.1-2.4 1.1-.9 0-1.3-.5-1.5-1.6-1 1.2-1.7 1.6-2.7 1.6-1.3 0-2.4-1.3-2.4-2.9 0-2.4 2.1-3.5 5-4.7v-.4c0-1.1-.4-1.6-1.2-1.6-1 0-1.9.5-3.2 1.8v-2.6c1.3-1.2 2.3-1.6 3.9-1.6 1.8 0 3.4.7 3.4 3.3v4.7c0 1.1 0 1.3.3 1.3.2 0 .5-.1.8-.5m-4-2.8c-1.5.7-2.3 1.3-2.3 2.3 0 .7.4 1.2 1 1.2.5 0 .7-.1 1.3-.8v-2.7zM93.5 69.3c-1.1.7-1.8 1-2.6 1-1.4 0-3.1-1-3.1-3.9v-5.6h-1.3v-.5l3.7-5.4h.5v3.6h2.7v2.3h-2.7v4.9c0 1.1.3 1.8 1 1.8.5 0 .9-.2 1.7-.9M95.5 58.4h2.9V70h-2.9zM105 70.4c-2.6 0-4.5-2.6-4.5-6.1 0-3.9 2.2-6.1 4.5-6.1 2.4 0 4.5 2.3 4.5 6.1 0 3.5-1.9 6.1-4.5 6.1m0-9.5c-1 0-1.5 1.2-1.5 3.4 0 2.4.5 3.4 1.5 3.4s1.5-1.1 1.5-3.4c-.1-2.2-.5-3.4-1.5-3.4M111.5 58.4h2.9V60c.7-1.3 1.5-1.9 2.6-1.9 1.8 0 3 1.5 3 4.2V70h-2.9v-7.1c0-1.3-.3-2.1-1.1-2.1-.7 0-1.2.7-1.6 1.9V70h-2.9M130.7 69.2c-1 .8-1.7 1.1-2.4 1.1-.9 0-1.3-.5-1.5-1.6-1 1.2-1.7 1.6-2.7 1.6-1.3 0-2.4-1.3-2.4-2.9 0-2.4 2-3.5 5-4.7v-.4c0-1.1-.4-1.6-1.2-1.6-1 0-1.9.5-3.2 1.8v-2.6c1.3-1.2 2.4-1.6 3.9-1.6 1.8 0 3.4.7 3.4 3.3v4.7c0 1.1 0 1.3.3 1.3.2 0 .5-.1.8-.5m-4-2.8c-1.5.7-2.3 1.3-2.3 2.3 0 .7.4 1.2 1 1.2.5 0 .7-.1 1.3-.8v-2.7zM132.3 52.9h2.9v17.2h-2.9zM146.2 68.9c-.9 1-1.6 1.4-2.5 1.4-2 0-3.6-2.6-3.6-6 0-3.5 1.5-6 3.7-6 .9 0 1.5.3 2.4 1.3V53h2.9v17.2h-2.9m0-8.3c-.6-.7-.9-1-1.5-1-1 0-1.6 1.2-1.6 3.3 0 2.1.6 3.3 1.5 3.3.6 0 1.1-.4 1.6-1.2v-4.4zM158.9 69.1c-1.1.8-2.2 1.2-3.4 1.2-3.5 0-4.3-3.5-4.3-5.8 0-3.6 1.7-6.3 4.1-6.3 2.1 0 3.9 2.1 3.8 6.6h-5c.1 2 1 3.1 2.3 3.1.8 0 1.5-.3 2.4-.9m-2.3-3.9c0-1.9-.4-2.9-1.1-2.9-.8 0-1.2 1.1-1.2 2.9h2.3zM160.9 66.6c1.2.8 2.1 1.2 3 1.2.6 0 1.1-.4 1.1-1 0-1.6-4.2-1.3-4.2-4.9 0-2.2 1.4-3.7 3.4-3.7 1 0 2 .3 3 1.1v2.4c-.6-.4-1.2-.7-1.7-.9-.5-.2-.9-.3-1.4-.3-.7 0-1.1.3-1.1.8 0 1.6 4.5 1.2 4.5 5.2 0 2.2-1.4 3.8-3.5 3.8-1 0-1.9-.3-3.2-1M172.5 52.9h7.2v2.9h-4.1v4.1h3.9v3h-3.9v7.2h-3.1M185.6 70.4c-2.6 0-4.5-2.6-4.5-6.1 0-3.9 2.2-6.1 4.5-6.1 2.4 0 4.5 2.3 4.5 6.1 0 3.5-1.9 6.1-4.5 6.1m0-9.5c-1 0-1.5 1.2-1.5 3.4 0 2.4.5 3.4 1.5 3.4s1.5-1.1 1.5-3.4c-.1-2.2-.5-3.4-1.5-3.4M101 10.1c.3-.1 1.2 1.1.9.1-.1-.2.1-.4.2-.6.1-.2-.1-.5.1-.7.4-.5 2.4-2.1 2.2-1.2-.1.4.5.5.9.1.1-.1.2-.7.5-.8.6-.2 2.2-.9 1.9-.2-.5 1.1.4.6.5.7.5.2-.1-.8 1-1.1.8-.2 1.6-.9 2.4.2.1.1.7-.1.7-.3 0-.7.8-.8 1.3-1 .7-.4 1.6.2 2.2.4.4.1 1.1-.1 1.6-.3.4-.2.9-.2 1.2 0 .3.2-.2.9.2.8.6-.1 1.1-.6 1.7-.8.8-.2 1.5-.2 2.4-.4.1 0 .4.1.5.2.2.2-.1.5.2.7.4.1.9.2 1.2.3.5.1.7-.1 1.2-.1.3 0 .6.4.9.5.9.2 1.6-.4 2.2.2.5.5.2.3-.5.4-.1 0-.4.4-.2.5.4.3.2-.3.8 0 .5.3.7-.4 1.4-.2.5.1.4.8.9.8.4 0 .7-.3 1-.1.4.2.4.6.5.9.1.5.8 0 1.1.2.2.1-.1.4-.1.7 0 .1.8 0 .8 0 .7-.1.9-.1 1.3.4.2.3-.3.5-.2.8.1.4.8.7.9.8.4.5-.9 1.1-1.9 1.6-.9.5-1.2 1.2-2.3 1.1-.1 0-.5-.2-.9-.1-.1 0-.3.2-.3.2.4.2.4.4.1.6-1 .7-1.8 1.7-3 1.7-.3 0 0-.6-.3-.6-.3.1-1-.1-.9.3.1.4.9.5.7.9-.4.7-1.5 1.5-2.5.9-.2-.1-.4.4-.5.7-.3.6-1.1 1.1-2 .8 0 0-.2.1-.2.2.3.3.2.7 0 .8-.6.4-1.1.8-1.8.9-.3.1-.7.3-1.1.6-.3.2-.7.1-1-.3-.3.4-1 .4-1.1.9-.1.4.8.2.4.7-.5.7-1.3.8-2.1 1-.7.1-1 .9-1.7 1.3-.3.2-.8-.1-.9.2-.1.5-.7.8-1.1 1.2-.3.4-.9-.1-1.2.1-.2.1-.3.5-.5.8-.3.5-.9.9-1.5 1.2-.2.1-.6 0-.8.1-.9.5-.7.7-1.6 1.2-.2.1-.3.7-1.6-.2-.4-.3.4-.8.4-1.2 0-.3 0-.4-.2-.2-.5.5-1.3 1.5-2.2.6-.2-.2-.5-.7-1-.5-.4.1-1-.1-1-.4.1 0 .7-.3.7-.4.1-.2.1-.4 0-.4-.9.1-.9.5-1.3.1-.2-.2 0-.6-.4-.4-.3.1-.2 0-.5-.1 0-.1-.3-.3-.3-.3 0-.5.5-.2.8-.6.1-.1 0-.2-.1-.2-.5 0-.9.1-1.3-.1-.5-.2.3-.6.4-.9 0-.1.1-.3-.1-.3-.3 0-.7.3-.9-.1-.1-.3-1.1-1-.9-1.5.2-.5 1.6-.7 1.1-.9-.7-.4-.4-.1-.9 0s-1 0-.9-.6c.1-.7 1.4-.5 1.9-.8 0-.9-1.1-.4-1.3-.6-.4-.5-.6-1-.2-1.5.1-.1.5-.4.6-.7 0-.1.1-.2.2-.3-.1-.1-.3-.2-.3-.3-.3-.4.2-.6.4-1 .1-.3.6-.9.5-1.2-.1-.3-.9-.5-.6-.8.6-.6 0-.7 1.3-1.2.2-.1 1.8 0 1.7-.2-.3-.6-1.2.1-1.4-.8-.2-.8 1.2-.2 1.7-.7-.4-.2-1.4-.5-1.1-.9.1-.3.5-1.1 1-1.3M113 42.5V32l25.8-16c.3.8.3 1.8.3 1.8l-23.6 14.7v10">
                            </path>
                            <path class="st2" d="M117.2 42.5V33l22-13.6c-.3 2.2 0 1-.3 2.2l-19.1 11.9v8.9"></path>
                            <path class="st2" d="M121.4 42.5V34l17.2-10.6c-.7 2.2-.6 1.7-1.2 2.8L124 34.4v8.1"></path>
                            <path class="st0"
                                d="M109.6 10.5c.6.3.4-.4.4-.7-.1-.4-.5 0-.8.2-.4.2-.8.1-1.2.1-.2 0-.4.6-.1.7.6.1.9-.7 1.7-.3M116.1 11.9c-.6.3-.8 1.6-.9 2.1 0 .1.8-.3.9-.3.3-.2.6-.2.8-.4.3-.1 1.3-.5 1.2-.8-.1-.3-1.2.3-1.2-.1 0-.3.3-.5.6-.7-.5-.5-1 0-1.4.2M117.7 10.8c0 .1-.1.4.1.3 1.1-.1 1.4-.4 2.2-1.1l-.2-.2c-.7.2-1.4.7-2.3.4-.1 0-.1.1-.1.2.1.3.3 0 .3.4M119.4 14.4c-.2.2-.8.3-.5.6.9.8-.8 1.4-1.3 2 .2.2 1.3-.4 1.4 0 .2.8-.8.9-1.1 1.5 0 .1.1.2.2.1s.2-.2.3-.2c.6-.1 1.3.2 1.7-.4.2-.2-.3-.2-.3-.3-.1-.3.3-.5.3-.7 0-.3-.3-.6-.2-.8.4-.5.8-1.4.8-2.4 0-.3-1 .3-1.3.6M112.6 13.7c-.1.1-1.7.7-1.7.8-1.9.9 3.8 0 2.9-.3-.3-.2.8-1.4-.9-.4 0 .1-.1-.2-.3-.1M112.5 17.3c-.2-.1-.7.4-1 .2-.4-.2.4-.9 0-.9-.7-.1-1.7.6-2.2 1 0 0 .3.1.4 0 .3-.2.7-.3 1-.2.3.1.3.6.1.6-.5.2-1 .5-1.6.7-.4.1-.9.3-1.2.7-.1.1 0 .2.1.2.9-.1 1.6-1.1 2.3-.7.3.1.3.8.6 1.1.2.2.5-.1.5-.3.1-.3-.1-.7.1-.9.4-.6 1.1-.6 1.7-.9.3-.1.5.2.7.1 0 .2.1.4-.1.6.5.3.8-.1 1.1-.4.3-.3.2-.6-.2-.7-.8 0-1.5.2-2.3-.2M112.4 9.1c-.5 0-.5.8-.2.8.5.1 2.2-.9 2.6-1.2.2-.1-1.1-.1-1.4-.1-.2-.2-.7.4-1 .5M114.7 7.2c.1-.2-.2-.2-.2-.4-.1.3-2.3.8-2.2 1.1 0 .1 1.7-.2 1.8-.3.2-.1.5-.2.6-.4M116.7 7.3c-.1.1-.4.7-.4.7.3 0 2-.5 1.9-1.1 0-.1-.8-.1-.8 0-.2 0-.4.2-.7.4M119.7 7.3c.1.9 2.3-.5 2.3-.7-.1-.4-2.7.2-3.1.4-.1 0 .3.6.4.5.1 0 .4-.4.4-.2M122 8.1c-.3.1-.6.1-.9.4.7.4 1.4.1 1.7-.6.1-.1.1-.3-.1-.3s-.4.4-.7.5M121.4 10c-.8.4.2 1.3-.2 2h-.2c-.2.1-.2.3-.3.5.9-.1 1.5-.4 2.3-.5.5 0 .9-.5 1.2-1 .1-.1.1-.3-.1-.3-.9 0-1.7 1.2-2.4.6-.3-.3.1-1.2.6-1.6-.2-.4-.5.1-.9.3M126.4 9c-.1-.1-.7-.3-.7-.1 0 .6-.3.7-.4 1.2.8-.1 2.6-.5 2.5-1.2-.1-.6-.9.5-1.4.1M127.1 7.3c.2-.1.7-.2.5-.4-.3-.3-1.7 0-2.1.3.3.6 1.3.1 1.6.1M130.8 10.8c.3-.1 1.1-1 1.4-1.2-.4-.4-1.4-.1-1.6.1-.1.1-.8.6-.7.7 0 .3-1.6 1.4.9.4M131.1 13.3c-.5.3-1.1.6-1.2 1.2 0 .2.4.2.5.1.7-.5 1.1-1.2 2-1.1.1 0 .2-.1.2-.2-.5-.2-1-.3-1.5 0M134.7 11.8c-.5.3-1.1.3-1.3.8 0 .1.2.1.3.1.1 0 .2-.2.3-.2.3-.1.7-.1.9.2.4-.2 1.1-1.1.6-1.5-.2 0-.8.5-.8.6M127.7 13.7c0 .2-.6.7-.8.9.6.3 1.4-.7 1.8-.8.3-.1.7-.3.9-.7.1-.2-.2-.2-.2-.4-.6.3-1.3 0-1.8.4-.2.2.1.4.1.6M124.7 13c.4-.1.6-.4 1-.5.3-.1.3-.7.1-.6-1.1.6-2.4 1-3.3 2.1.4.3.8 0 1.2.4.1.1.3-.2.4-.3-.2-.1-.4-.4-.2-.6.2-.2.5-.5.8-.5M123.7 15.9c-.1-.2.1-.3.2-.5.1-.1 0-.2-.1-.2-.7.1-1.2 1-2 .5 0 0-.2.1-.2.2-.1.5.5.1.6.4.1.5-.3.9-.3 1.3 0 .1.1.2.2.2.3.1.6-.1.7-.4.1-.1 0-.3 0-.3.4-.4 1-.8 1.6-.5.1-.2.3-.1.4-.2.2-.1.4.1.5.2.1.2-.1.4-.2.6-.1.1.2.1.3.1.4-.3 1-.5 1-.8-.1-1.2-1.6 0-2.4-.4-.1 0-.3-.1-.3-.2M116.6 21c.7-.3 2.8-.2 3.3-.9-1-1.5-3.4.5-4.5 1.2-.1.1.1.2.1.2.3-.2.7-.4 1.1-.5M115.4 22.4c-.3 0-.5.3-.6.5-.1.3-.1.6-.2.9-.1.1.2.1.3.1.3-.2.6-.3 1-.4.1 0 .2-.1.2-.2v-1c0-.1-.1-.2-.2-.1-.1 0-.2.2-.5.2M111.5 24.9c-.2.1-1.1.7-1.2.8.5.2-.4.7-.2 1.2.7-.5 2.4-1.3 3.1-1.9-.6-.4-.1-.9-.1-1.3s-.5-.4-.7-.1c-.4.4-.3 1-.9 1.3M109.8 23.5c.5-.3 2.3-1 2.2-1.6-.1-.3-1.6.6-2 .6-.2 0 .1-.5-.5-.4-.6.1 0-.3-1 .7-.7.7-.2.7.1 1.2.2.4.8-.2 1.2-.5M106.4 25.3c-.9.5-1 1-2.1.9-.5 0-1 .4-1.6.4-.1 0-.2.1-.1.2.2.3.5.6.9.6.5.1.9-.4 1.4-.5.4-.1.7.3 1.1.1.8-.4 1.2-1 1.1-1.7-.1-.3-.5-.1-.7 0M107.9 27.9c-1.1-.2-1.4.7-.8 1.1.5.3 2.2-1.4 2.6-1.7.1-.1-.5.1-.5 0-.2-.2-1.1.7-1.3.6M106 20.4c-.4-.1-.7.2-1 .3.4.3.8.1 1.2.2.2 0 .1.4.4.3.2-.1.3-.3.3-.6.3.1.2-.3.4-.4-.5-.3-.8.3-1.3.2M102.4 23.3c-.2 0-.2.3-.4.3-.8 0-1.7-.2-2.2.6-.1.1 0 .2.1.2.4-.1.8-.5 1.2-.4.3.1.3.6.6.5.5-.1 1-.1 1.5-.3-.9-.4-.1-.9.2-1.5 0 0-.1-.2-.2-.1-.3.2-.4.6-.8.7M104.6 18.7c.4-.2.9-.7.8-.9-.4-.6.8-1.2 1.4-1.3 1.2-1.6-2.3.3-2.5.8-.1.3.6.4.4.8-.3.5-1.9 1.1-1.5 1.2.6.1 1-.4 1.4-.6M101.5 21c.6-.6-.9-.2-.8-.3l-.2-.2c-.2.2-1.2.2-1.3.5 0 .1-.3.9-.2.8.2-.1 2.4-.6 2.5-.8M101.5 19.1c.1-.2.3 0 .4-.1.2-.3.2-.6.5-.8-.7-.5-1.8-.4-2.3.3-.1.1 0 .2.1.2.3-.1.6-.4.9-.1.1.2-.1.5.2.7 0 .2.1 0 .2-.2M107 14.8c.3-.1 2.3-.4 1.6-1.1 0 0-1.8.3-1.9.3-.7.2-.8.4-1.2 1.1-.1.1-.8.7-.7.7 1 0 2.1-.7 1.9-.7.2-.1.2-.3.3-.3M109.9 12.1c.2.6-.8.6-.8.8.1.5 2-.7 2.5-.9-.1-.2-1.7-.1-1.7.1M104.9 12.2l.2-.2c-.3-.3-.8-.2-1.1-.1l-1.2.6c-.1 0-.4.7-.3.7.9 0 1.7-.5 2.4-1M107.3 9.2c.2-.3 1.2-.2 1.5-.5.3-.3-1-.4-1.2-.3-.4.1-.8.4-.6.8 0 .2.2.1.3 0M105.2 11.3c.1-.1 1.6-1.4.9-1.5-.1 0-1.8.9-1.9.9-.3 0-.4.3-.3.5 0 .1.1.2.2.2s1 0 1.1-.1M101.7 16.4c.1-.1 1.4-.6 1.5-.7.1-.1.7-1.1.7-1.1-.3-.8-2.7 1.6-3 1.9.2.2.3.2.8-.1">
                            </path>
                            <path class="st0"
                                d="M109.6 10.5c.6.3.4-.4.4-.7-.1-.4-.5 0-.8.2-.4.2-.8.1-1.2.1-.2 0-.4.6-.1.7.6.1.9-.7 1.7-.3M112.4 9.1c-.5 0-.5.8-.2.8.5.1 2.2-.9 2.6-1.2.2-.1-1.1-.1-1.4-.1-.2-.2-.7.4-1 .5M114.7 7.2c.1-.2-.2-.2-.2-.4-.1.3-2.3.8-2.2 1.1 0 .1 1.7-.2 1.8-.3.2-.1.5-.2.6-.4M116.7 7.3c-.1.1-.4.7-.4.7.3 0 2-.5 1.9-1.1 0-.1-.8-.1-.8 0-.2 0-.4.2-.7.4M119.7 7.3c.1.9 2.3-.5 2.3-.7-.1-.4-2.7.2-3.1.4-.1 0 .3.6.4.5.1 0 .4-.4.4-.2M122 8.1c-.3.1-.6.1-.9.4.7.4 1.4.1 1.7-.6.1-.1.1-.3-.1-.3s-.4.4-.7.5M126.4 9c-.1-.1-.7-.3-.7-.1 0 .6-.3.7-.4 1.2.8-.1 2.6-.5 2.5-1.2-.1-.6-.9.5-1.4.1M127.1 7.3c.2-.1.7-.2.5-.4-.3-.3-1.7 0-2.1.3.3.6 1.3.1 1.6.1M130.8 10.8c.3-.1 1.1-1 1.4-1.2-.4-.4-1.4-.1-1.6.1-.1.1-.8.6-.7.7 0 .3-1.6 1.4.9.4M131.1 13.3c-.5.3-1.1.6-1.2 1.2 0 .2.4.2.5.1.7-.5 1.1-1.2 2-1.1.1 0 .2-.1.2-.2-.5-.2-1-.3-1.5 0M107.3 9.2c.2-.3 1.2-.2 1.5-.5.3-.3-1-.4-1.2-.3-.4.1-.8.4-.6.8 0 .2.2.1.3 0M106 20.4c-.4-.1-.7.2-1 .3.4.3.8.1 1.2.2.2 0 .1.4.4.3.2-.1.3-.3.3-.6.3.1.2-.3.4-.4-.5-.3-.8.3-1.3.2M116.1 11.9c-.6.3-.8 1.6-.9 2.1 0 .1.8-.3.9-.3.3-.2.6-.2.8-.4.3-.1 1.3-.5 1.2-.8-.1-.3-1.2.3-1.2-.1 0-.3.3-.5.6-.7-.5-.5-1 0-1.4.2M117.7 10.8c0 .1-.1.4.1.3 1.1-.1 1.4-.4 2.2-1.1l-.2-.2c-.7.2-1.4.7-2.3.4-.1 0-.1.1-.1.2.1.3.3 0 .3.4M119.4 14.4c-.2.2-.8.3-.5.6.9.8-.8 1.4-1.3 2 .2.2 1.3-.4 1.4 0 .2.8-.8.9-1.1 1.5 0 .1.1.2.2.1s.2-.2.3-.2c.6-.1 1.3.2 1.7-.4.2-.2-.3-.2-.3-.3-.1-.3.3-.5.3-.7 0-.3-.3-.6-.2-.8.4-.5.8-1.4.8-2.4 0-.3-1 .3-1.3.6M112.6 13.7c-.1.1-1.7.7-1.7.8-1.9.9 3.8 0 2.9-.3-.3-.2.8-1.4-.9-.4 0 .1-.1-.2-.3-.1M112.5 17.3c-.2-.1-.7.4-1 .2-.4-.2.4-.9 0-.9-.7-.1-1.7.6-2.2 1 0 0 .3.1.4 0 .3-.2.7-.3 1-.2.3.1.3.6.1.6-.5.2-1 .5-1.6.7-.4.1-.9.3-1.2.7-.1.1 0 .2.1.2.9-.1 1.6-1.1 2.3-.7.3.1.3.8.6 1.1.2.2.5-.1.5-.3.1-.3-.1-.7.1-.9.4-.6 1.1-.6 1.7-.9.3-.1.5.2.7.1 0 .2.1.4-.1.6.5.3.8-.1 1.1-.4.3-.3.2-.6-.2-.7-.8 0-1.5.2-2.3-.2M121.4 10c-.8.4.2 1.3-.2 2h-.2c-.2.1-.2.3-.3.5.9-.1 1.5-.4 2.3-.5.5 0 .9-.5 1.2-1 .1-.1.1-.3-.1-.3-.9 0-1.7 1.2-2.4.6-.3-.3.1-1.2.6-1.6-.2-.4-.5.1-.9.3M127.7 13.7c0 .2-.6.7-.8.9.6.3 1.4-.7 1.8-.8.3-.1.7-.3.9-.7.1-.2-.2-.2-.2-.4-.6.3-1.3 0-1.8.4-.2.2.1.4.1.6M124.7 13c.4-.1.6-.4 1-.5.3-.1.3-.7.1-.6-1.1.6-2.4 1-3.3 2.1.4.3.8 0 1.2.4.1.1.3-.2.4-.3-.2-.1-.4-.4-.2-.6.2-.2.5-.5.8-.5M123.7 15.9c-.1-.2.1-.3.2-.5.1-.1 0-.2-.1-.2-.7.1-1.2 1-2 .5 0 0-.2.1-.2.2-.1.5.5.1.6.4.1.5-.3.9-.3 1.3 0 .1.1.2.2.2.3.1.6-.1.7-.4.1-.1 0-.3 0-.3.4-.4 1-.8 1.6-.5.1-.2.3-.1.4-.2.2-.1.4.1.5.2.1.2-.1.4-.2.6-.1.1.2.1.3.1.4-.3 1-.5 1-.8-.1-1.2-1.6 0-2.4-.4-.1 0-.3-.1-.3-.2M116.6 21c.7-.3 2.8-.2 3.3-.9-1-1.5-3.4.5-4.5 1.2-.1.1.1.2.1.2.3-.2.7-.4 1.1-.5M115.4 22.4c-.3 0-.5.3-.6.5-.1.3-.1.6-.2.9-.1.1.2.1.3.1.3-.2.6-.3 1-.4.1 0 .2-.1.2-.2v-1c0-.1-.1-.2-.2-.1-.1 0-.2.2-.5.2M111.5 24.9c-.2.1-1.1.7-1.2.8.5.2-.4.7-.2 1.2.7-.5 2.4-1.3 3.1-1.9-.6-.4-.1-.9-.1-1.3s-.5-.4-.7-.1c-.4.4-.3 1-.9 1.3M109.8 23.5c.5-.3 2.3-1 2.2-1.6-.1-.3-1.6.6-2 .6-.2 0 .1-.5-.5-.4-.6.1 0-.3-1 .7-.7.7-.2.7.1 1.2.2.4.8-.2 1.2-.5M102.4 23.3c-.2 0-.2.3-.4.3-.8 0-1.7-.2-2.2.6-.1.1 0 .2.1.2.4-.1.8-.5 1.2-.4.3.1.3.6.6.5.5-.1 1-.1 1.5-.3-.9-.4-.1-.9.2-1.5 0 0-.1-.2-.2-.1-.3.2-.4.6-.8.7M104.6 18.7c.4-.2.9-.7.8-.9-.4-.6.8-1.2 1.4-1.3 1.2-1.6-2.3.3-2.5.8-.1.3.6.4.4.8-.3.5-1.9 1.1-1.5 1.2.6.1 1-.4 1.4-.6M101.5 21c.6-.6-.9-.2-.8-.3l-.2-.2c-.2.2-1.2.2-1.3.5 0 .1-.3.9-.2.8.2-.1 2.4-.6 2.5-.8M101.5 19.1c.1-.2.3 0 .4-.1.2-.3.2-.6.5-.8-.7-.5-1.8-.4-2.3.3-.1.1 0 .2.1.2.3-.1.6-.4.9-.1.1.2-.1.5.2.7 0 .2.1 0 .2-.2M107 14.8c.3-.1 2.3-.4 1.6-1.1 0 0-1.8.3-1.9.3-.7.2-.8.4-1.2 1.1-.1.1-.8.7-.7.7 1 0 2.1-.7 1.9-.7.2-.1.2-.3.3-.3M109.9 12.1c.2.6-.8.6-.8.8.1.5 2-.7 2.5-.9-.1-.2-1.7-.1-1.7.1M104.9 12.2l.2-.2c-.3-.3-.8-.2-1.1-.1l-1.2.6c-.1 0-.4.7-.3.7.9 0 1.7-.5 2.4-1M105.2 11.3c.1-.1 1.6-1.4.9-1.5-.1 0-1.8.9-1.9.9-.3 0-.4.3-.3.5 0 .1.1.2.2.2s1 0 1.1-.1M101.7 16.4c.1-.1 1.4-.6 1.5-.7.1-.1.7-1.1.7-1.1-.3-.8-2.7 1.6-3 1.9.2.2.3.2.8-.1M106.4 25.3c-.9.5-1 1-2.1.9-.5 0-1 .4-1.6.4-.1 0-.2.1-.1.2.2.3.5.6.9.6.5.1.9-.4 1.4-.5.4-.1.7.3 1.1.1.8-.4 1.2-1 1.1-1.7-.1-.3-.5-.1-.7 0M107.9 27.9c-1.1-.2-1.4.7-.8 1.1.5.3 2.2-1.4 2.6-1.7.1-.1-.5.1-.5 0-.2-.2-1.1.7-1.3.6M134.7 11.8c-.5.3-1.1.3-1.3.8 0 .1.2.1.3.1.1 0 .2-.2.3-.2.3-.1.7-.1.9.2.4-.2 1.1-1.1.6-1.5-.2 0-.8.5-.8.6">
                            </path>
                            <path class="st2"
                                d="M109 42.5V30.9L137.5 13c.3.4.5.9.8 1.5l-26.8 16.9v11.1M203.1 54.2h2.1l1.8 2.9h-1.8l-1.1-1.7-1.1 1.7h-1.7M41.3 55.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5 1.5.7 1.5 1.5M98.5 55.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5 1.5.7 1.5 1.5">
                            </path>
                        </svg>
                    </div>
                </div>
            </nav>
        @endguest

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
