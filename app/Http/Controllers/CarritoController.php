<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveVentaRequest;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carro'); 
    }

    public function store(SaveVentaRequest $request)
    {
        DB::beginTransaction();

        try{
            $venta=Venta::create($request->validated());
            //dd($venta->id);
            if($venta){
                        $carrito=session()->get('carrito');
                        foreach($carrito as $item)
                        {
                            Detalle::create([
                            'venta_id' => $venta->id,
                            'prod_id' => $item['codigo'],
                            'det_prod_costo'=>$item['costo'],
                            'det_prod_precio'=>$item['precio'],
                            'det_cantidad'=>$item['cantidad'],
                            ]);
                            $producto=Producto::find($item['codigo']);
                            if($producto){
                                $producto->prod_stock-=$item['cantidad'];
                                $producto->save();
                            }
                        }
                        session()->forget('carrito');
                        
                        DB::commit();

                        session()->flash('status','venta realizada');
                        return redirect()->route('carrito');
                    }
        
        } catch(\Exception $e){
            DB::rollback();

            session()->forget('carrito');

            session()->flash('status','Hubo un problema al realizar la venta');
            return redirect()->route('carrito');
        }

    }


    public function show(Request $request)
    {   
        $producto = Producto::find($request->prod_cod);

        if (isset ($producto)) {

            $carrito=session()->get('carrito',[]); //si no hay datos en la sesión'CARRITO', obtengo NULL
            if(isset($carrito[$producto->prod_cod])){

                $carrito[$producto->prod_cod]['cantidad']+=1;
                $carrito[$producto->prod_cod]['subtotal']=bcmul($carrito[$producto->prod_cod]['cantidad'],$carrito[$producto->prod_cod]['precio'],2);
            } else{
                
                $carrito[$producto->prod_cod]=[
                    'codigo'=>$producto->prod_cod,
                    'nombre'=>$producto->prod_nom,
                    'detalle'=>$producto->prod_descripcion,
                    'costo'=>$producto->prod_costo,
                    'precio'=>$producto->prod_precio,
                    'cantidad'=>$request->cantidad,
                    'subtotal'=>$producto->prod_precio
                ];

            }
            //dd($carrito);
            session()->put('carrito', $carrito);

            session()->flash('status','Producto agregado');
            return redirect()->route('carrito');
        } else {
            session()->flash('status','El producto no se encuentra');
            return redirect()->route('carrito');
        }     
    }

   public function quitarItem($item){

    $carrito=session()->get('carrito');
    if(isset($carrito[$item])){
        unset($carrito[$item]);

    }

    session()->forget('key');
    session()->put('carrito', $carrito);
    return redirect()->route('carrito'); 
}

public function updateCarro(Request $request,$producto){
    $carrito=session()->get('carrito');
    //dd($request ,$producto);
    $carrito[$producto]['cantidad']=$request->cantidad;
    $carrito[$producto]['subtotal']=bcmul($request->cantidad,$carrito[$producto]['precio'],2);


    session()->put('carrito', $carrito);
    return view('carro');
}

public function cancelCarrito(){

    session()->forget('carrito');

    session()->flash('status','venta cancelada');
    return redirect()->route('carrito');
}    

   
}
