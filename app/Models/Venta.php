<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable=['usu_id',
                        'venta_total',
                    'dinero_cliente',
                'dinero_vuelto'];


    protected $table='ventas';
    protected $primarykey='venta_id';


    public function usuario(){
        return $this->belongsTo(User::class,'usu_id');
    }

// Relación uno a muchos: Una venta tiene muchos detalles de ventas
    public function detalle(){

        return $this->hasMany(Detalle::class,'venta_id','venta_id');
    }
}
