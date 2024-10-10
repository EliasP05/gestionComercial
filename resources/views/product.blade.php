<x-layout meta-title="Productos">
            <div class="flex justify-between items-center">
                <h1 class="text-4xl font-bold">Productos</h1>  
                <a class=" bg-blue-400 text-white px-3 py-1 rounded-lg hover:text-blue-400 hover:bg-white border border-blue-400" href="{{route('products.create')}}">{{__("Add")}} producto</a>
            </div>
        
        @session('status')
            <div class="status text-gray-400">
                {{$value}}
            </div>   
        @endsession
        <table class="hidden md:table w-full border-collapse table-fixed shadow-md mt-8">
            <thead>
                <tr class=" bg-slate-200">
                    <th class="rounded-tl-lg py-2">Cod.</th>
                    <th class="py-2">Nombre</th>
                    <th class="py-2">Descripcion</th>
                    <th class="py-2">Marca</th>
                    <th class="py-2">Precio</th>
                    <th class="py-2">Stock</th>
                    <th class="rounded-tr-lg py-2">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($products as $product)
                <tr class=" border-b border-slate-200">
                    <td class="py-1">{{$product->prod_cod}}</td>
                    <td class="py-1">{{$product->prod_nom}}</td>
                    <td class="py-1">{{$product->prod_descripcion}}</td>
                    <td class="py-1">{{$product->marca->marca_nombre ?? 'sin marca'}}</td>
                    <td class="py-1">$ {{$product->prod_precio}}</td>
                    <td class="py-1">{{$product->prod_stock}}</td>
                    <td class="flex justify-center items-center space-x-1 py-1 ">
                        <a class=" bg-yellow-400 text-white px-2 rounded-md focus:ring-2" href="{{route('products.edit', $product)}}">{{__("Edit")}}</a>
                        <form action="{{route('products.destroy',$product)}}" method="POST">
                            @csrf @method('DELETE')    
                            <button class=" bg-red-400 text-white px-2 rounded-md focus:ring-2">{{__("Delete")}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="w-full border-collapse table-fixed shadow-md md:hidden">
            <thead>
                <tr class=" bg-slate-200">
                    <th class="rounded-tl-lg py-2">Nombre</th>
                    <th class="py-2">Descripcion</th>
                    <th class="py-2">Precio</th>
                    <th class="rounded-tr-lg py-2">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($products as $product)
                <tr class=" odd:bg-white even:bg-slate-50 ">
                    <td class="py-1">{{$product->prod_nom}}</td>
                    <td class="py-1">{{$product->prod_descripcion}}</td>
                    <td class="py-1">$ {{$product->prod_precio}}</td>
                    <td class="flex justify-center items-center space-x-1 py-1 ">
                        <button class=" bg-yellow-400 text-white px-2 rounded-md focus:ring-2" href="{{route('products.edit', $product)}}">{{__("Edit")}}</button>
                        <form action="{{route('products.destroy',$product)}}" method="POST">
                            @csrf @method('DELETE')    
                            <button class=" bg-red-400 text-white px-2 rounded-md focus:ring-2">{{__("Delete")}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-layout>