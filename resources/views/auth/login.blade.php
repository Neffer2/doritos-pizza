<div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">Correo</label>
            <input id="email" type="text" name="email" :value="old('email')" required autofocus autocomplete="username" />
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" :value="old('email')" required autocomplete="current-password" />
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
