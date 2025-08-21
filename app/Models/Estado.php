<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'estado_id');
    }
}
