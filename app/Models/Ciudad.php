<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudades';
    
    protected $fillable = [
        'descripcion',
        'estado',
        'departamento_id'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function localidades()
    {
        return $this->hasMany(Localidad::class);
    }
}
