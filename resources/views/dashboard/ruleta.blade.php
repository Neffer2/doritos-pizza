@extends('layouts.ruletaLayaout')
@section('content')
    <div style="font-family: 'primary-font', sans-serif; position: absolute; left:-1000px; visibility:hidden;">.</div>
    <div id="game-container-mobile"></div>
    <div id="game-container-desk"></div> 

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="module" src="{{ asset('src/phaser.min.js') }}"></script>
    <script type="module" src="{{ asset('src/mobile/main.js') }}"></script>
    <script type="module" src="{{ asset('src/desk/main.js') }}"></script>
@endsection
