<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    use HasFactory;
    
    protected $table = 'codigos';
    
    protected $fillable = [
        'description',
        'estado_id',
        'canal_id',
    ];

    // Relación con Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    // Relación con Canal
    public function canal()
    {
        return $this->belongsTo(Canal::class);
    }

    // Relación con RegistroCodigo
    public function registros()
    {
        return $this->hasMany(RegistroCodigo::class, 'codigo_id');
    }

    // Accessor para obtener el código como string
    public function getCodigoAttribute()
    {
        return $this->description;
    }
}
