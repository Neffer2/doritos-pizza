@extends('layouts.app')
@section('content')
    <ul>
        <li><a href="{{ route('premios') }}">Premios</a></li>
        <li><a href="{{ route('puntaje') }}">Puntaje</a></li>
        <li><a href="{{ route('ranking') }}">Ranking</a></li>
        <li><a href="{{ route('registrar_codigo') }}">Ingresa tu c&oacute;digo</a></li>
    </ul>
@endsection
