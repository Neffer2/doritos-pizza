<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use App\Models\Ciudad;
use App\Models\Localidad;
use App\Models\Barrio;

class CiudadesComponent extends Component
{
    // Models
    public $departamento, $departamentos, $ciudad, $localidad, $barrio;
    public $ciudades = [], $localidades = [], $barrios = [];
    public $showLocalidadBarrio = false;

    public function render()
    {
        return view('livewire.ciudades-component');
    }

    public function getDepartamentos(){
        $this->departamentos = Departamento::with('ciudades')->get();
    }

    public function mount(){
        $this->getDepartamentos();
    }

    public function updatedDepartamento($value)
    {
        $this->ciudad = null;
        $this->localidad = null;
        $this->barrio = null;
        $this->localidades = [];
        $this->barrios = [];
        $this->showLocalidadBarrio = false;

        if ($value) {
            $departamentoSelected = $this->departamentos->where('id', $value)->first();
            $this->ciudades = $departamentoSelected ? $departamentoSelected->ciudades : [];
        } else {
            $this->ciudades = [];
        }
    }

    public function updatedCiudad($value)
    {
        $this->localidad = null;
        $this->barrio = null;
        $this->localidades = [];
        $this->barrios = [];
        $this->showLocalidadBarrio = false;

        if ($value) {
            $ciudadSelected = Ciudad::find($value);
            
            // Verificar si es Bogotá (ID 107)
            if ($ciudadSelected && $ciudadSelected->id == 107) {
                $this->localidades = $ciudadSelected->localidades;
                $this->showLocalidadBarrio = true;
            }
        }
    }

    public function updatedLocalidad($value)
    {
        $this->barrio = null;
        $this->barrios = [];

        if ($value) {
            $localidadSelected = Localidad::find($value);
            $this->barrios = $localidadSelected ? $localidadSelected->barrios : [];
        }
    }
}
