{{-- filepath: /c:/laragon/www/doritos-pizza/resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doritos Pizza | Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/landing/favicon-96x96.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}?v={{ time() }}">
    @livewireStyles
</head>
<body>
    <div class="main-register-container">
        <div class="register-content">
            <h1>Registro</h1>
            <form method="POST" class="register-form" action="{{ route('register') }}">
                @csrf
                <div class="input-container">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-container">
                    <label for="email">Correo</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-container">
                    <label for="document">Documento</label>
                    <input id="document" type="text" name="document" :value="old('document')" required autocomplete="" />
                    @error('document')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-container">
                    <label for="celular">Celular</label>
                    <input id="celular" type="text" name="celular" :value="old('celular')" required autocomplete="" />
                    @error('celular')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-container">
                    <label for="fecha">Fecha Nacimiento</label>
                    <input id="fecha" type="date" name="fecha" required autofocus autocomplete="" max="2007-01-01"/>
                    @error('fecha')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                @livewire('ciudades-component')

                <div class="input-container">
                    <label for="direccion">Dirección</label>
                    <input id="direccion" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="" />
                    @error('direccion')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-container">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="input-container">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <a class="tyc-container" href="{{ asset('assets/legal/Actividad_LA_PIZZERIA_DE_DORITOS.pdf') }}" target="_blank">
                    <input type="checkbox" name="terminos" id="terminos" required>
                    <label>Acepto los Términos y Condiciones</label>
                    @error('terminos')
                        <div class="register-form-error">{{ $message }}</div>
                    @enderror
                </a>

                <div class="tyc-container">
                    <input type="checkbox" name="habeas_data" id="habeas_data" required>
                    <label for="habeas_data">Autorizo el tratamiento de datos personales</label>
                    @error('habeas_data')
                        <div class="register-form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="registered-container">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('¿Ya tienes una cuenta?') }}
                    </a>
                </div>

                <div class="register-btn-container">
                    <x-primary-button class="register-btn">
                        <img src="{{ asset('assets/landing/aceptar-btn.png') }}" alt="Register">
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    @livewireScripts
</body>
</html>