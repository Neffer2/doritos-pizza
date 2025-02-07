@extends('layouts.app')
@section('content')
    <div class="main-home-container">
        <div class="doritos-logo-container">
            <img src="{{ asset('assets/landing/doritos-logo.png') }}" alt="Doritos">

        </div>
        <div class="home-info-container">
            <img class="top-home-img" src="{{ asset('assets/landing/info-home-text.png') }}" alt="">
        </div>
        <div class="puntaje-mobile">
            <img src="{{ asset('assets/landing/logo-doritos-mobile-1.png') }}" alt="">
            <img src="{{ asset('assets/landing/logo-doritos-mobile-2.png') }}" alt="">
        </div>
        <div class="home-options-container">
            <div class="image-row">
                <a href="{{ route('registrar_codigo') }}">
                    <img src="{{ asset('assets/landing/ingresa-codigo-img.png') }}" alt="Ingresa tu código">
                </a>
                <a href="{{ route('ranking') }}">
                    <img src="{{ asset('assets/landing/ranking-img.png') }}" alt="Ranking">
                </a>
            </div>
        </div>
        <div class="home-info-container">
            <img src="{{ asset('assets/landing/click-seccion-deseada.png') }}" alt="">

        </div>
    </div>
@endsection
