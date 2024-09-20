<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail // si sacamos el implement sacamos la verificacion de email
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'usu_dni',
            'name',
            'usu_apellido',
            'email',
            'password',
            'tip_id',
    ];
    protected $table = 'users'; // Asegúrate de que el nombre de la tabla esté bien

    protected $primaryKey = 'usu_id'; // Cambia 'marca_id' al nombre correcto de tu clave primaria
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tipo(){
    
        return $this->belongsTo(Tipo::class,'tip_id');
   
    }
}
