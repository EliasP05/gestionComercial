<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.navigation')
    <h1 class="text-3xl font-bold underline text-blue-800 mt-1 bg-orange-400 text-center">Productos</h1> &nbsp; <a href="{{route('products.create')}}">{{__("Add")}} nuevo producto</a>
<br>
@session('status')
    <div class="status">
        {{$value}}
    </div>   
@endsession

    @foreach ($products as $product){{$product->prod_cod}}
        {{$product->prod_nom}}, {{$product->prod_descripcion}},{{$product->marca->marca_nombre ?? 'sin marca'}},
        <a href="{{route('products.edit', $product)}}">{{__("Edit")}}</a>, 
        <form action="{{route('products.destroy',$product)}}" method="POST">
            @csrf @method('DELETE')    
            <button>{{__("Delete")}}</button>
        </form>
        <br>{{--{{route('products.edit',$product)}} /productos/{{$product}}/edit--}}
     @endforeach
</body>
</html>