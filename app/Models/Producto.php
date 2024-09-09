<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=['marca_id'];
    protected $table = 'productos'; // Asegúrate de que el nombre de la tabla esté bien

    protected $primaryKey = 'prod_id'; // Cambia 'marca_id' al nombre correcto de tu clave primaria
}
