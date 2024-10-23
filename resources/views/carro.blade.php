<x-layout>
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-4xl font-bold">Caja</h1> 
        @session('status')
            <div class="status text-gray-400">
                {{$value}}
            </div>   
        @endsession  
    </div>
   
    @include('carro.buscador')

<div class="grid md:grid-cols-4 w-full space-x-5 mt-8">
        <div class="col-span-3">
            <table class=" w-full table border-collapse shadow-md">
                <thead >
                    <tr class="bg-slate-200">
                        <th class="rounded-tl-lg py-2">cod</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>precio unit.</th>
                        <th>cantidad</th>
                        <th>subtotal</th>
                        <th class="rounded-tr-lg py-2">Accion</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $total=0.00;
                    @endphp
                        @if (session('carrito'))
                            @foreach (session('carrito') as $producto)
                            
                                <tr class="">
                                    <td>{{$producto['codigo']}}</td> 
                                    <td>{{$producto['nombre']}}</td>
                                    <td>{{$producto['detalle']}}</td>
                                    <td>${{$producto['precio']}}</td>
                                    <td>
                                        <form action="{{route('actualizarCarro',['producto'=>$producto['codigo']])}}" method="GET">
                                            <input type="number" name="cantidad" value="{{$producto['cantidad']}}" class="w-10 px-0 rounded-md text-center border-slate-400"> 
                                             <button type="submit" class="bg-blue-400 p-1 rounded-md text-white hover:bg-slate-700">Actualizar</button>
                                        </form>
                                    </td>   
                                    <td>${{$producto['subtotal']}}</td>
                                    <td><a href="{{route('carrito.quitarItem',['item'=>$producto['codigo']])}}" class="bg-red-600 p-1 rounded-md text-white hover:bg-slate-700">Eliminar</a></td>
                                </tr> 
                                @php
                                    $total=bcadd($producto['subtotal'],$total,2);
                                @endphp
                            @endforeach 
                        @else
                            
                        @endif
                        
                    
                </tbody>
            </table>
                
        </div>
        <div class="w-full col-span-1">
            @include('carro.total')
        </div>
    </div>
  
</x-layout>
