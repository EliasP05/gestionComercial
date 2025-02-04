<x-layout meta-title="Usuarios">
            <div class="flex justify-between items-center">
                <h1 class="text-4xl font-bold">Usuarios</h1>
                <div>
                    <a class=" bg-blue-400 text-white px-3 py-1 rounded-lg hover:text-blue-400 hover:bg-white border border-blue-400" href="{{route('usuarios.create')}}">{{__("Add")}} Usuario</a>
                    <a class="bg-gray-400 text-white px-3 py-1 rounded-lg hover:text-gray-400 hover:bg-white border border-gray-400" href="{{route('usuarios.pdf')}}">Descargar</a>
                </div>
            </div>
        
        @session('status')
            <div class="status text-gray-400">
                {{$value}}
            </div>   
        @endsession
        <table class="hidden md:table w-full border-collapse table-fixed shadow-md mt-8">
            <thead>
                <tr class=" bg-slate-200">
                    <th class="rounded-tl-lg py-2">DNI</th>
                    <th class="py-2">Nombre</th>
                    <th class="py-2">Apellido</th>
                    <th class="py-2">E-mail</th>
                    <th class="py-2">rol</th>
                    <th class="rounded-tr-lg py-2">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($usuarios as $user)
                <tr class=" border-b border-slate-200">
                    <td class="py-1">{{$user->usu_dni}}</td>
                    <td class="py-1">{{$user->name}}</td>
                    <td class="py-1">{{$user->usu_apellido}}</td>
                    <td class="py-1">{{$user->email}}</td>
                    <td class="py-1">{{$user->tipo->tip_nombre ?? ''}}</td>
                    <td class="flex justify-center items-center space-x-1 py-1 ">
                        <a class=" bg-yellow-400 text-white px-2 rounded-md focus:ring-2" href="{{route('usuarios.edit', $user)}}">{{__("Edit")}}</a>
                        <form action="{{route('usuarios.destroy',$user)}}" method="POST">
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
                    <th class="py-2">Apellido</th>
                    <th class="py-2">rol</th>
                    <th class="rounded-tr-lg py-2">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($usuarios as $user)
                <tr class=" odd:bg-white even:bg-slate-50 ">
                    <td class="py-1">{{$user->usu_email}}</td>
                    <td class="py-1">{{$user->tipo->tipo_nombre ?? ''}}</td>
                    <td class="flex justify-center items-center space-x-1 py-1 ">
                        <button class=" bg-yellow-400 text-white px-2 rounded-md focus:ring-2" href="{{route('usuarios.edit', $user)}}">{{__("Edit")}}</button>
                        <form action="{{route('products.destroy',$user)}}" method="POST">
                            @csrf @method('DELETE')    
                            <button class=" bg-red-400 text-white px-2 rounded-md focus:ring-2">{{__("Delete")}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-layout>