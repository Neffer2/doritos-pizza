<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'document',
        'celular',
        'departamento_id',
        'ciudad_id',
        'localidad_id',
        'barrio_id',
        'direccion',
        'fecha_nacimiento',
        'email',
        'password',
        'terminos',
        'habeas_data',
        'estado_id',
        'puntos',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'fecha_nacimiento' => 'date',
    ];

    // Relaciones
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    public function barrio()
    {
        return $this->belongsTo(Barrio::class);
    }
}
