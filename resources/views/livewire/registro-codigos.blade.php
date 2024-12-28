<div>
    <input type="text" wire:model.lazy="codigo">
    <button wire:click="RegistrarCodigo">Registrar</button>
    
    @session('error')
        <span>{{ session('error') }}</span>    
    @endsession
</div>
