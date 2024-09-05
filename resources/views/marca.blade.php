<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('partials.navigation')
@session('status')

    <div class="status">
        {{$value}}
    </div>
@endsession
    
    <h1>marcas</h1> &nbsp; <a href="{{route('marcas.create')}}">Agregar marca</a>
    <br>

    @foreach ($marcas as $marca)
    {{$marca->marca_id}}
    {{$marca->marca_nombre}} , <a href="{{route('marcas.edit', $marca->marca_id)}}">Editar</a> , <a href="">Borrar</a>  
    <br>
    @endforeach
</body>
</html>