@extends('layouts.app')
@section('content')
    <div class="main-puntaje-container">
        <div class="volver-logo-container">
            <a href="/">
                <img src="{{ asset('assets/landing/volver-logo.png') }}" alt="Volver logo">
            </a>

        </div>
        <div class="puntaje-img">
            <img src="{{ asset('assets/landing/tu-puntaje.png') }}" alt="">
        </div>
        <div class="puntaje-text-container">
            <p class="puntaje-text">Llevas</p>
            <p class="puntaje-number">
                {{ auth()->user()->puntos }}
            </p>
            <p class="puntaje-info">Puntos</p>
            <img src="{{ asset('assets/landing/puntaje-info-img.png') }}" alt="">
        </div>

    </div>
@endsection
