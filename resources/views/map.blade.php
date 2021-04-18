@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/map.js') }}" defer></script>
    
    <style id="marker-size"></style>
    <div id="contentMap">
        <div id="map" class="h-screen w-screen"></div>
        {{-- <div id="panel" class="bg-white absolute inset-y-0 right-0 h-full z-5000 transform translate-x-full transition duration-250 ease-in-out"></div> --}}
    </div>
@endsection
