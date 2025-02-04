<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venta=Venta::with('detalle.producto')->get();
        //dd($venta);
        return view('ventas',['ventas'=>$venta]);
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
    public function show(venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(venta $venta)
    {
        //
    }
    public function generarPdf($venta_id){
        $venta = Venta::with('detalle.producto')
                ->where('venta_id',$venta_id)
                ->get();
        //dump($venta);
        $pdf=Pdf::loadView('ventas.pdf',compact('venta'));
        //return $pdf->download('comprobante.pdf');
        return view('ventas.pdf',['venta'=>$venta]);
    } 
}
