<input type="checkbox" name="" id="tw-modal-confirmar" class="peer fixed appearance-none opacity-0">
    
    <label for="tw-modal-confirmar" class=" pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain
    bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 
    peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


        <label for="" class="max-h-[calc(100vh - 1em)] h-fit max-w-lg scale-90 overflow-y-auto
            overscroll-contain rounded-md bg-white p6 text-black shadow-2xl transition p-3">
            <div class="flex justify-between items-center">
                <h3 class=" text-lg font-bold">Confirmar venta</h3>
            </div>
            
            <table class=" table w-full border-collapse table-fixed shadow-md mt-8">
               @if (session('carrito'))
                        <tr class=" bg-slate-200">
                            <th class="rounded-tl-lg py-2">Producto</th>
                            <th class="py-2">Precio</th>
                            <th class="py-2">Cantidad</th>
                            <th class="rounded-tr-lg py-2">Subtotal</th>
                        </tr>
                   @foreach (session('carrito') as $producto)
                        <tr class=" border-b border-slate-200 text-center">
                            <td>{{$producto['nombre']}}</td>
                            <td>${{$producto['precio']}}</td>
                            <td>{{$producto['cantidad']}}</td>
                            <td>${{$producto['subtotal']}}</td>
                        </tr>
                   @endforeach
                        <tr class=" bg-slate-200">
                            <td class="font-bold py-1" colspan="3">Total</td>
                            <td class="font-bold py-1 text-center">${{$total}}</td>
                        </tr>
               @endif
            </table>
            <div class="flex justify-end pt-2">
                <button type="submit" class="bg-green-600 text-white rounded-md p-1.5 hover:bg-green-700" >Confirmar</button>
            </div>
            <div>
                @include('carro.tipo')
            </div>
        </label>
    </label>  