<input type="checkbox" name="" id="tw-modal{{$venta->venta_id}}" class="peer fixed appearance-none opacity-0">
    
    <label for="tw-modal{{$venta->venta_id}}" class=" pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain
    bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 
    peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


        <label for="" class="max-h-[calc(100vh - 1em)] h-fit max-w-lg scale-90 overflow-y-auto
        overscroll-contain rounded-md bg-white p6 text-black shadow-2xl transition p-3">
        <div class="flex justify-between items-center">
            <h3 class=" text-lg font-bold">Venta N° {{$venta->venta_id}}</h3>
            <a class=" bg-blue-400 text-white px-3 py-1 rounded-lg hover:text-blue-400 hover:bg-white border border-blue-400" href="{{route('ventas.pdf',['venta_id'=>$venta->venta_id])}}">Comprobante</a>
        </div>
            
            <table class="hidden md:table w-full border-collapse table-fixed shadow-md mt-8">
                @php
                    $sub=0.00;
                @endphp
                <tr class=" bg-slate-200">
                    <th class="rounded-tl-lg py-2">cod.</th>
                    <th class="py-2">Producto</th>
                    <th class="py-2">Precio</th>
                    <th class="py-2">Cantidad</th>
                    <th class="rounded-tr-lg py-2">Subtotal</th>
                </tr>
                @foreach($venta->detalle as $detalle)
               
                <tr class=" border-b border-slate-200">
                    <td class="py-1" >{{ $detalle->prod_id}}</td>
                    <td class="py-1" >{{ $detalle->producto->prod_nom}}</td>
                    <td class="py-1" > {{$detalle->det_prod_precio}}</td>
                    <td class="py-1" >{{ $detalle->det_cantidad }}</td>
                    
                    <td class="py-1" >$ 
                        @php
                              $sub=bcmul($detalle->det_cantidad,$detalle->det_prod_precio,2);
                        @endphp
                        {{$sub}}
                    </td>
                    
                </tr>
                    
                @endforeach
                <tr class=" bg-slate-200">
                    <td class="font-bold py-1" colspan="4">Total</td>
                    <td class="font-bold py-1">${{$venta->venta_total}}</td>
                </tr>
                
            </table>
        </label>

    </label>