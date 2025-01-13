@extends('layouts.app')
@section('content')
    <div class="main-premios-container">
        <div class="volver-logo-container">
            <a href="/">
                <img src="{{ asset('assets/landing/volver-logo.png') }}" alt="Volver logo">
            </a>

        </div>
        <div class="top-premios">
            <img src="{{ asset('assets/landing/premios-text.png') }}" alt="Premios Text">
        </div>
        <div class="bottom-premios">
            <img src="{{ asset('assets/landing/premio-pizza-maker.png') }}" alt="Pizza Maker">
            <img src="{{ asset('assets/landing/premio-wafleras-mini.png') }}" alt="Wafleras Mini">
        </div>
    </div>
@endsection
