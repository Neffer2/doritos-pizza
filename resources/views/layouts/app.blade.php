<!DOCTY    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/puntaje.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/codigo.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/premios.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/ranking.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/whatsapp.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/faq-view.css') }}?v={{ time() }}">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/puntaje.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/codigo.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/premios.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/ranking.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/whatsapp.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}?v={{ time() }}">
    <link rel="shortcut icon" href="{{ asset('assets/landing/favicon-96x96.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-papm6p6Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Doritos Pizza</title>
    @livewireStyles
</head>

<body>
    @yield('content')
    @livewireScripts
    @livewire('whatsapp-button')
    @livewire('faq-button')
</body>

</html>
