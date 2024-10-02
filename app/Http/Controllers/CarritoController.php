<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carro');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {   
        $producto = Producto::find($request->prod_cod);

        if (isset ($producto)) {

            $carrito=session()->get('carrito',[]); //si no hay datos en la sesión'CARRITO', obtengo NULL
            if(isset($carrito[$producto->prod_cod])){

                $carrito[$producto->prod_cod]['cantidad']+=1;
                $carrito[$producto->prod_cod]['subtotal']=$carrito[$producto->prod_cod]['cantidad']*$carrito[$producto->prod_cod]['precio'];
            } else{
                
                $carrito[$producto->prod_cod]=[
                    'codigo'=>$producto->prod_cod,
                    'nombre'=>$producto->prod_nom,
                    'detalle'=>$producto->prod_descripcion,
                    'precio'=>$producto->prod_precio,
                    'cantidad'=>$request->cantidad,
                    'subtotal'=>$producto->prod_precio
                ];

            }
            //dd($carrito);
            session()->put('carrito', $carrito);

            session()->flash('status','Producto agregado');
            return view('carro');
        } else {
            session()->flash('status','El producto no se encuentra');
            return redirect()->route('carrito');
        }     
    }


public function cancelCarrito(){

    session()->forget('carrito');

    session()->flash('status','venta cancelada');
    return redirect()->route('carrito');
}    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caja $caja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caja $caja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caja $caja)
    {
        
    }
}
