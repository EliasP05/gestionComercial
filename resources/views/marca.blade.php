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
    <div class="container mx-auto mt-2">
        <div class="flex justify-between items-center">
            <h1 class="text-4xl font-bold">Marcas</h1>
            <a class="bg-blue-400 text-white px-3 py-1 rounded-lg hover:text-blue-400 hover:bg-white border border-blue-400" href="{{route('marcas.create')}}">{{__("Add")}} marca</a>
        </div>
        @session('status')
            <div class="status text-gray-400">
                {{$value}}
            </div>
        @endsession
        <table class="table w-full border-collapse table-fixed shadow-md mt-8">
            <thead>
                <tr class=" bg-slate-200">
                    <th class="rounded-tl-lg py-2">Nombre</th>
                    <th class="rounded-tr-lg py-2">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($marcas as $marca)
                <tr class=" border-b border-slate-200">
                    <td class="py-1">{{$marca->marca_nombre}}</td>
                    <td class="flex justify-center items-center space-x-1 py-1 ">
                        <a class=" bg-yellow-400 text-white px-2 rounded-md focus:ring-2" href="{{route('marcas.edit', ['marca'=>$marca])}}">{{__("Edit")}}</a>
                        <form action="{{route('marcas.destroy',$marca)}}" method="POST">
                        @csrf @method('DELETE')    
                            <button class=" bg-red-400 text-white px-2 rounded-md focus:ring-2">{{__("Delete")}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>