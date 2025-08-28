<x-guest-layout>
    <div class="main-forgot-password-container">
        <div class="forgot-password-container">
            <h1 class="forgot-title">Restablecer contraseña</h1>
            <p class="forgot-desc">
                Ingresa tu nueva contraseña para tu cuenta Doritos.
            </p>
            <form method="POST" action="{{ route('password.store') }}" class="forgot-form">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <!-- Email Address -->
                <div class="forgot-field">
                    <x-input-label for="email" :value="__('Email')" class="forgot-label" />
                    <x-text-input id="email" class="forgot-input" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="forgot-error" />
                </div>
                <!-- Password -->
                <div class="forgot-field">
                    <x-input-label for="password" :value="__('Password')" class="forgot-label" />
                    <x-text-input id="password" class="forgot-input" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="forgot-error" />
                </div>
                <!-- Confirm Password -->
                <div class="forgot-field">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="forgot-label" />
                    <x-text-input id="password_confirmation" class="forgot-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="forgot-error" />
                </div>
                <div class="forgot-actions">
                    <x-primary-button class="forgot-btn">
                        {{ __('Restablecer contraseña') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
