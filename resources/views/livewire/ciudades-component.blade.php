<div class="ciudad-departamento-container">
    <div class="input-container">
        <label for="departamento">Departamento</label>
        <select wire:model.live="departamento" id="departamento" name="departamento" value="{{ old('departamento') }}" required>
            <option value="">Seleccionar</option>
            @foreach ($departamentos as $dept)
                <option value="{{ $dept->id }}">{{ $dept->descripcion }}</option>
            @endforeach
        </select>
        @error('departamento')
            <p class="register-form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="input-container">
        <label for="ciudad">Ciudad</label>
        <select wire:model.live="ciudad" id="ciudad" name="ciudad" value="{{ old('ciudad') }}" required>
            <option value="">Seleccionar</option>
            @foreach ($ciudades as $city)
                <option value="{{ $city->id }}">{{ $city->descripcion }}</option>
            @endforeach
        </select>
        @error('ciudad')
            <p class="register-form-error">{{ $message }}</p>
        @enderror
    </div>

    @if($showLocalidadBarrio)
        <div class="input-container">
            <label for="localidad">Localidad</label>
            <select wire:model.live="localidad" id="localidad" name="localidad" value="{{ old('localidad') }}" required>
                <option value="">Seleccionar</option>
                @foreach ($localidades as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->nombre }}</option>
                @endforeach
            </select>
            @error('localidad')
                <p class="register-form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-container">
            <label for="barrio">Barrio</label>
            <select wire:model="barrio" id="barrio" name="barrio" value="{{ old('barrio') }}" required>
                <option value="">Seleccionar</option>
                @foreach ($barrios as $bar)
                    <option value="{{ $bar->id }}">{{ $bar->nombre }}</option>
                @endforeach
            </select>
            @error('barrio')
                <p class="register-form-error">{{ $message }}</p>
            @enderror
        </div>
    @endif
</div>
