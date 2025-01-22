<title>Doritos Pizza | Login</title>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="main-login-container">
    <div class="login-content">
        <h1>Iniciar sesión</h1>
        <form method="POST" class="login-form" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="email-container">
                <label for="email">Correo electrónico</label>
                <input id="email" type="text" name="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="password-container">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" :value="old('email')" required
                    autocomplete="current-password" />
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="registro-container">
                <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>

            </div>
            <div class="forgot-password-container">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvistaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <div class="login-btn-container">
                <x-primary-button class="login-btn">
                    <img src="{{ asset('assets/landing/aceptar-btn.png') }}" alt="Log in">
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
