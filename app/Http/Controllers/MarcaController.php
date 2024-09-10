<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas=Marca::get();

        return view('marca',['marcas'=>$marcas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas.create',['marca' => new Marca]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveMarcaRequest $request)
    {
        // $validate=$request->validated([
        //     'marca_nombre'=>['required'],
        // ]);
        // $marca=new Marca();
        // $marca->marca_nombre= $request->input('marca_nombre');
        // $marca->save();


        Marca::create($request->validated());
        
        session()->flash('status','Marca registrada');
        return redirect()->route('marcas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('marcas.edit',['marca'=>$marca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveMarcaRequest $request, Marca $marca)
    {
        

        $marca->update($request->validated());

        session()->flash('status','Marca modificada');
        return redirect()->route('marcas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();

        session()->flash('status','Marca eliminada');
        return redirect()->route('marcas');
    }
}
