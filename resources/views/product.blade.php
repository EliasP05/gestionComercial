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
    <h1>Productos</h1> &nbsp; <a href="{{route('products.create')}}">{{__("Add")}} nuevo producto</a>
<br>
    @foreach ($products as $product)
        {{$product->prod_nom}}, {{$product->prod_descripcion}}, <a href="{{route('products.edit', $product->prod_id)}}">{{__("Edit")}}</a>, <a href="">{{__("Delete")}}</a>
     <br>{{--{{route('products.edit',$product)}} /productos/{{$product}}/edit--}}
        @endforeach
</body>
</html>