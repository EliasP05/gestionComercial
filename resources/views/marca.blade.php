<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.navigation')
@session('status')

    <div class="status">
        {{$value}}
    </div>
@endsession
    
    <h1>Marcas</h1> &nbsp; <a href="{{route('marcas.create')}}">{{__("Add")}} marca</a>
    <br>

    @foreach ($marcas as $marca)

    {{$marca->marca_id}}
    {{$marca->marca_nombre}} , <a href="{{route('marcas.edit', ['marca'=>$marca])}}">{{__("Edit")}}</a>
    <form action="{{route('marcas.destroy',$marca)}}" method="POST">
    @csrf @method('DELETE')    
        <button>{{__("Delete")}}</button>
    </form>
    <br>
    @endforeach
</body>
</html>