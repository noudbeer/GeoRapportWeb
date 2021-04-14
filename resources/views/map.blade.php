@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/map.js') }}" defer></script>
    
    <style id="marker-size"></style>
    <div id="map" class="h-screen w-screen"></div>
@endsection
