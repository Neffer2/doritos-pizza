<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/puntaje.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/codigo.css') }}?v={{ time() }}">
    <title>Doritos Pizza</title>
    @livewireStyles
</head>

<body>
    @yield('content')
    @livewireScripts
</body>

</html>
