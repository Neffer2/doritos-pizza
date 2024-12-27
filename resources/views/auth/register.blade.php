<div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="email">Correo</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="document">Documento</label>
            <input id="document" type="text" name="document" :value="old('document')" required autocomplete="" />
            @error('document')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="celular">Celular</label>
            <input id="celular" type="text" name="celular" :value="old('celular')" required autocomplete="" />
            @error('celular')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="ciudad">Ciudad</label>
            <input id="ciudad" type="text" name="ciudad" :value="old('ciudad')" required autocomplete="" />
            @error('ciudad')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
