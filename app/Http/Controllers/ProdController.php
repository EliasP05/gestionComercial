<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductoRequest;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Producto::with('marca')->get();

        return view('product',['products'=>$products]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas=Marca::get();
        return view('products.create',['marcas'=>$marcas],['product'=>new Producto()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProductoRequest $request)
    {
        Producto::create($request->validated());

        session()->flash('status','Producto añadido');

        return redirect()->route('producto');

    }

    /**
     * Display the specified resource.
     */
    public function edit($product)
    {
        // dd($product );
       $products= Producto::with('marca')->find($product);
        // dd($products);
        $marcas=Marca::where('marca_id','!=',$products->marca_id)->get();
            return view('products.edit',['product'=>$products],['marcas'=>$marcas] );

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveProductoRequest $request, Producto $product)
    {
        // dd($request);
        $product->update($request->validated());

        session()->flash('status','Producto modificado');
        return redirect()->route('producto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $product)
    {
        $product->delete();

        session()->flash('status', 'Producto Eliminado');
        return redirect()->route('producto');
    }
}
