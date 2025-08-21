<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroCodigo extends Model
{
    use HasFactory;
    
    protected $table = 'registro_codigos';
    
    protected $fillable = [
        'user_id',
        'codigo_id',
    ];

    // Relación con Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Código
    public function codigo()
    {
        return $this->belongsTo(Codigo::class, 'codigo_id');
    }
}
