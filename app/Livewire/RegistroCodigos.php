<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Codigo;
use App\Models\RegistroCodigo;
use Illuminate\Support\Facades\Auth;

class RegistroCodigos extends Component
{
    // Models
    public $codigo;

    // Useful vars
    public $user;

    public function render()
    {
        return view('livewire.registro-codigos');
    }

    public function mount(){
        $this->user = Auth::user();
    }

    public function RegistrarCodigo(){
        $this->validate([
            'codigo' => 'required'
        ]);

        $codigo = Codigo::where([
            ['description', $this->codigo],
            ['estado_id', 1]
        ])->first();

        if (!$codigo) {
            return redirect()->back()->with('error', 'El código no es válido');
        }

        $codigo->estado_id = 2;
        $codigo->save();

        $registro = new RegistroCodigo();
        $registro->user_id = $this->user->id;
        $registro->codigo_id = $codigo->id;
        $registro->save();

        $this->user->estado_id = 4;
        $this->user->save();

        return redirect()->route('dashboard');
    }
}
