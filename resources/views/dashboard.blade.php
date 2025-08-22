@extends('layouts.app')
@section('content')
    <div class="main-home-container">
        <div class="doritos-logo-container">
            <img src="{{ asset('assets/landing/doritos-logo.png') }}" alt="Doritos">
        </div>
        <div class="home-info-container">
            <p>Podrás acumular puntos desde el <span>18 de agosto de 2025 </span>hasta el <span>2 de noviembre del
                    2025</span></p>
        </div>
        <div class="puntaje-mobile">
            <img src="{{ asset('assets/landing/logo-doritos-mobile-1.png') }}" alt="">
            <div class="puntos-container-mobile">
                <p class="text-puntos-first">Llevas</p>
                <p class="text-puntos-middle">
                    {{ auth()->user()->puntos }}
                </p>
                <p class="text-puntos-last">puntos</p>
            </div>
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
                <div class="puntos-container">
                    <p class="text-puntos-first">Llevas</p>
                    <p class="text-puntos-middle">
                        {{ auth()->user()->puntos }}
                    </p>
                    <p class="text-puntos-last">puntos</p>
                </div>
            </div>
        </div>
        <div class="home-info-container">
            <img src="{{ asset('assets/landing/click-seccion-deseada.png') }}" alt="">
        </div>
        <!-- Botón de logout fijo abajo a la izquierda -->
        <a href="{{ route('logout') }}" class="logout-fixed">
            <button type="button" class="logout-btn">
                Salir
            </button>
        </a>
    </div>
@endsection
