@extends('layouts.app')
@section('content')
    <h1>Ranking</h1>
    @foreach ($ranking as $key => $ranking_)
        {{ $key+=1 }} -- {{ $ranking_->name }} - {{ $ranking_->puntos }} <br>
    @endforeach
    <br>
    <br>
    {{ Auth()->user()->name }} Tu puesto en el ranking es: {{ $user_position }}
@endsection
