<x-layout>
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold">Caja</h1>  
    </div>
    @session('status')
            <div class="status text-gray-400">
                {{$value}}
            </div>   
    @endsession
    <div class="buscar">
        <form action="{{route('buscaProd')}}" method="POST">
            @csrf
            <x-text-input id="prod_cod" name="prod_cod"  placeholder="Busca un producto"/>
            <input type="number" name="cantidad" id="cantidad" value="1">
            <x-input-error class="mt-2" :messages="$errors->get('prod_cod')" />
            <x-primary-button >Buscar</x-primary-button>
        </form>
    </div>
 
    
            <table>
                <thead>
                    <tr>
                        <th>cod</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>precio unit.</th>
                        <th>cantidad</th>
                        <th>subtotal</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total=0;
                    @endphp
                        @if (session('carrito'))
                            @foreach (session('carrito') as $producto)
                            
                                <tr>
                                    <td>{{$producto['codigo']}}</td> 
                                    <td>{{$producto['nombre']}}</td>
                                    <td>{{$producto['detalle']}}</td>
                                    <td>{{$producto['precio']}}</td>
                                    <td>
                                        <form action="{{route('actualizarCarro',['producto'=>$producto['codigo']])}}" method="GET">
                                            <input type="number" name="cantidad" value="{{$producto['cantidad']}}"> 
                                             <button type="submit">Actualizar</button>
                                        </form>
                                    </td>   
                                    <td>{{$producto['subtotal']}}</td>
                                    <td><a href="{{route('carrito.quitarItem',['item'=>$producto['codigo']])}}">Eliminar</a></td>
                                </tr> 
                                @php
                                    $total+=$producto['subtotal'];
                                @endphp
                            @endforeach 
                        @else
                            
                        @endif
                        
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            total
                        </td>
                        <form action="{{route('confirmar')}}" method="POST">
                            @csrf        
                        <td>
                            @if (session('carrito'))
                            <input type="number" name="venta_total" value="{{$total}}" >
                                <input type="text" name="usu_id" value="1" >
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('cancelar')}}">cancelar</a>
                        </td>
                        <td>
                           <button type="submit">Confirmar</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
                        </form>
</x-layout>
