<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $fillable=[
                        'tip_nombre',
                        ];

    protected $table = 'tipo_usuario'; // Asegúrate de que el nombre de la tabla esté bien

    protected $primaryKey = 'tip_id'; // Cambia 'marca_id' al nombre correcto de tu clave primaria
    
    public function usuario(){
    
        return $this->belongsTo(User::class,'tip_id');
   
    }
}
