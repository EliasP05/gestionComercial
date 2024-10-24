<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=['marca_id',
                        'prod_cod',
                        'prod_nom',
                        'prod_descripcion',
                        'prod_costo',
                        'prod_precio',
                        'prod_stock',
                        'prod_stock_min'];

    protected $table = 'productos'; // Asegúrate de que el nombre de la tabla esté bien

    protected $primaryKey = 'prod_id'; // Cambia 'marca_id' al nombre correcto de tu clave primaria
    
    public function marca(){
    
        return $this->belongsTo(Marca::class,'marca_id','marca_id');
   
    }
    // Relación uno a muchos: Un producto esta en muchos detalles de ventas
    public function detalle(){
    
        return $this->hasMany(Detalle::class,'prod_id','prod_id');
   
    }

}
