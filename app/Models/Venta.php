<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable=['usu_id',
                        'venta_total'];


    protected $table='ventas';
    protected $primarykey='venta_id';


    public function usuario(){
        return $this->belongsTo(User::class,'usu_id');
    }

    public function detalle(){

        return $this->hasMany(Detalle::class,'venta_id');
    }
}
