@extends('layouts.app')
@section('content')
    <div class="main-ranking-container">
        <div class="volver-logo-container">
            <a href="/">
                <img src="{{ asset('assets/landing/volver-logo.png') }}" alt="Volver logo">
            </a>

        </div>
        <div class="ranking-info">
            <img class="ranking-logo-img" src="{{ asset('assets/landing/ranking-text-img.png') }}" alt="Ranking logo">
            <img class="ranking-text-img" src="{{ asset('assets/landing/ranking-text.png') }}" alt="Ranking Text">
            <div class="ranking-text-prices">
                <img class="ranking-price" src="{{ asset('assets/landing/pizza-maker.png') }}" alt="Ranking Text">
                <img class="ranking-price" src="{{ asset('assets/landing/waflera-mini.png') }}" alt="Ranking Text">
            </div>
        </div>

        <div class="ranking-display">
            <div class="ranking-table-display">
                @foreach ($ranking as $key => $ranking_)
                    <div class="ranking-table">
                        <div class="position-cell">
                            <p class="position-cell-number">{{ $key + 1 }}</p>
                            <img src="{{ asset('assets/landing/ranking-icon.png') }}" alt="Jugador" class="player-icon">
                            <p class="position-cell-name">{{ $ranking_->name }}</p>
                        </div>
                        <div class="points-cell">{{ $ranking_->puntos }} PTS</div>
                        <div class="prize-cell">
                            <img src="{{ asset('assets/landing/ranking-premio-1.png') }}" alt="aaa">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    </div>
@endsection
