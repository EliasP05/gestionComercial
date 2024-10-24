<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $fillable=[
    'venta_id',
    'prod_id',
    'det_prod_costo',
    'det_prod_precio',
    'det_cantidad',
];

    protected $table='det_ventas';
    protected $primarykey=null;
    public $incrementing = false;



     // Relación muchos a uno: Un detalle pertenece a una venta
    public function venta(){
        return $this->belongsTo(Venta::class,'venta_id','venta_id'); 
    }
    public function producto(){
        return $this->belongsTo(Producto::class,'prod_id','prod_id'); 
    }
}

