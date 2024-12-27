@extends('layouts.app')
@section('content')
    <h1>Puntaje</h1>
    puntos: {{ auth()->user()->puntos }}
@endsection
