<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    
    protected $table = 'localidades';
    
    protected $fillable = [
        'nombre',
        'ciudad_id'
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function barrios()
    {
        return $this->hasMany(Barrio::class);
    }
}
