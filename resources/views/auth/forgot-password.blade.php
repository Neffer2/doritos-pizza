<x-guest-layout>
    <div class="main-forgot-password-container">


        <div class="forgot-password-container">
            <h1 class="forgot-title">¿Olvidaste tu contraseña?</h1>
            <p class="forgot-desc">
                {{ __('No hay problema. Ingresa tu correo y te enviaremos un enlace para restablecerla.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="forgot-form">
                @csrf

                <!-- Email Address -->
                <div class="forgot-field">
                    <x-input-label for="email" :value="__('Email')" class="forgot-label" />
                    <x-text-input id="email" class="forgot-input" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="forgot-error" />
                </div>

                <div class="forgot-actions">
                    <x-primary-button class="forgot-btn">
                        {{ __('Enviar enlace de recuperación') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
