<div>
    <div class="input-container">
        <label for="departamento">Departamento</label>
        <select wire:model.live="departamento" id="departamento" name="departamento" value="{{ old('departamento') }}" required>
            <option>Seleccionar</option>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
            @endforeach
        </select>
        @error('departamento')
            <p class="register-form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="input-container">
        <label for="ciudad">Ciudad</label>
        <select id="ciudad" name="ciudad" value="{{ old('ciudad') }}" required>
            @if ($this->departamento)
                @foreach ($departamentos->where('id', $this->departamento)->first()->ciudades as $ciudad)
                    <option value="{{ $ciudad->descripcion }}">{{ $ciudad->descripcion }}</option>
                @endforeach
            @endif
        </select>
        @error('ciudad')
            <p class="register-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>
