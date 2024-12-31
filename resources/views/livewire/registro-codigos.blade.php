<div class="main-codigo-container">
    <div class="volver-logo-container">
        <a href="/">
            <img src="{{ asset('assets/landing/volver-logo.png') }}" alt="Volver logo">
        </a>
    </div>

    <div class="registrar-codigo-container">
        <img class="doritos-logo-codigos" src=" {{ asset('assets/landing/doritos-logo.png') }}" alt="">
        <img class="info-text-1" src="{{ asset('assets/landing/codigo-text-info1.png') }}" alt="">
        <input class="input-codigo" type="text" wire:model.lazy="codigo">
        <button class="btn-codigo" wire:click="RegistrarCodigo">Registrar</button>
        @session('error')
            <span class="error-codigo-text">{{ session('error') }}</span>
        @endsession
        <img class="info-text-2" src="{{ asset('assets/landing/codigo-text-info.png') }}" alt="">
    </div>

    <div class="codigo-img-container">
        <img src="{{ asset('assets/landing/doritos-pizza.png') }}" alt="">

    </div>
</div>
