<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Producto;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('caja');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Caja $caja)
    {    $prod=Producto::get($caja);
        dd($prod);
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
        //
    }
}
