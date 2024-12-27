<div>
    <input type="text" wire:model.lazy="codigo">
    <button wire:click="RegistrarCodigo">Registrar</button>
    @error('codigo')
        <span>{{ $message }}</span>
    @enderror
</div>
