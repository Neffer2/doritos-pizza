@extends('layouts.app')
@section('content')
    <div class="main-ranking-container">
        <div class="ranking-info">
            <img class="ranking-logo-img" src="{{ asset('assets/landing/ranking-text-img.png') }}" alt="Ranking logo">
            <img class="ranking-text-img" src="{{ asset('assets/landing/ranking-text.png') }}" alt="Ranking Text">
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
            </div>
            @endforeach
        </div>

    </div>
    </div>
@endsection
