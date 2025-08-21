<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    use HasFactory;
    
    protected $table = 'canales';
    
    protected $fillable = [
        'description',
    ];

    // Relación con Código
    public function codigos()
    {
        return $this->hasMany(Codigo::class);
    }
}
