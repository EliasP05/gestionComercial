<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venta = Venta::with('detalle.producto', 'usuario')->get();
        //dd($venta);
        return view('ventas', ['ventas' => $venta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        $venta->load('usuario', 'detalle.producto');
        //dd($venta);

        $key = 'edicion_venta_' . $venta->venta_id;
        if (!session()->has($key)) {
            $items = [];
            foreach ($venta->detalle as $det) {
                $items[$det->prod_id] = [
                    'prod_id' => $det->prod_id,
                    'nombre' => $det->producto->prod_nom,
                    'precio' => $det->det_prod_precio,
                    'costo' => $det->det_prod_costo,
                    'cantidad' => $det->det_cantidad,
                    'cantidad_original' => $det->det_cantidad,
                ];
            }
            session()->put($key, $items);
        }
        //$detalles = Venta::with('usuario', 'detalle.producto')->where('venta_id', $venta->venta_id)->get();

        return view(
            'ventas.edit',
            [
                'ventas' => $venta,
                'items' => session()->get($key)
            ]
        );
    }

    public function quitarItem(Venta $venta, $prod)
    {
        $key = 'edicion_venta_' . $venta->venta_id;
        $items = session()->get($key, []);
        if (isset($items[$prod])) {
            unset($items[$prod]);
            session()->put($key, $items);
            return response()->json(['status' => 'ok', 'items' => $items]);
        }

        return response()->json(['status' => 'error', 'message' => 'Item no encontrado'], 404);
    }

    public function updateItemSesion(Request $request, Venta $venta, $prod)
    {
        $key = 'edicion_venta_' . $venta->venta_id;
        $items = session()->get($key, []);
        $cantidad = (int) $request->cantidad;

        if (isset($items[$prod]) && $cantidad > 0) {
            $items[$prod]['cantidad'] = $cantidad;
            session()->put($key, $items);
            return response()->json(['status' => 'ok', 'items' => $items]);
        }

        return response()->json(['status' => 'error', 'message' => 'Cantidad inválida'], 422);
    }


    public function cancelarEdicion(Venta $venta)
    {
        session()->forget('edicion_venta_' . $venta->venta_id);
        return response()->json(['status' => 'ok', 'redirect' => route('ventas')]);
    }

    public function confirmarEdicion(Venta $venta)
    {
        $key = 'edicion_venta_' . $venta->venta_id;
        $items = session()->get($key, []);

        DB::beginTransaction();

        try {
            foreach ($items as $item) {
                $diferencia = $item['cantidad_original'] - $item['cantidad'];

                Detalle::where('venta_id', $venta->venta_id)
                    ->where('prod_id', $item['prod_id'])
                    ->update(['det_cantidad' => $item['cantidad']]);

                $producto = Producto::find($item['prod_id']);
                if ($producto) {
                    $producto->prod_stock += $diferencia;
                    $producto->save();
                }
            }

            // Items que estaban en la venta original pero ya no están en $items -> se eliminaron
            $detallesActuales = Detalle::where('venta_id', $venta->venta_id)->get();

            foreach ($detallesActuales as $d) {
                if (!isset($items[$d->prod_id])) {
                    $producto = Producto::find($d->prod_id);
                    if ($producto) {
                        $producto->prod_stock += $d->det_cantidad;
                        $producto->save();
                    }
                    Detalle::where('venta_id', $venta->venta_id)
                        ->where('prod_id', $d->prod_id)
                        ->delete();
                }
            }

            $venta->venta_total = collect($items)->sum(fn($i) => bcmul($i['cantidad'], $i['precio'], 2));
            $venta->save();
            session()->forget($key);
            DB::commit();
            return response()->json(['status' => 'ok', 'message' => 'Venta actualizada']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => 'No se pudo guardar'], 500);
        }
    }

    public function generarPdf($venta_id)
    {
        $venta = Venta::with('detalle.producto')
            ->where('venta_id', $venta_id)
            ->get();
        //dump($venta);
        $pdf = Pdf::loadView('ventas.pdf', compact('venta'));
        return $pdf->download('comprobante' . $venta_id . '.pdf');
        //return view('ventas.pdf', ['venta' => $venta]);
    }
}
