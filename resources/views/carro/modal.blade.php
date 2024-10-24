<input type="checkbox" name="" id="tw-modal{{$venta->venta_id}}" class="peer fixed appearance-none opacity-0">
    
    <label for="tw-modal{{$venta->venta_id}}" class=" pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain
    bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 
    peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


        <label for="" class="max-h-[calc(100vh - 5em)] h-fit max-w-lg scale-90 overflow-y-auto
        overscroll-contain rounded-md bg-white p6 text-black shadow-2xl transition p-3">
            <h3 class=" text-lg font-bold">Venta N° {{$venta->venta_id}}</h3>
            <p class="py-4">
 @php
                    $sub=0.00;
                @endphp
                @foreach($venta->detalle as $detalle)
               
                <div class="flex">
                    <div>{{ $detalle->prod_id}}</div>
                    <div>{{ $detalle->producto->prod_nom}}</div>
                    <div> {{$detalle->det_prod_precio}}</div>
                    <div>{{ $detalle->det_cantidad }}</div>
                    <div>$ 
                        @php
                              $sub=bcmul($detalle->det_cantidad,$detalle->det_prod_precio,2);
                        @endphp
                        {{$sub}}
                    </div>
                </div>
                    
                @endforeach

            </p>
        </label>

    </label>