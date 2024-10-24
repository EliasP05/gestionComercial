<x-layout meta-title="Ventas">
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold">ventas</h1>
        {{-- <a class="bg-blue-400 text-white px-3 py-1 rounded-lg hover:text-blue-400 hover:bg-white border border-blue-400" href="{{route('marcas.create')}}">{{__("Add")}} marca</a> --}}
    </div>
    @session('status')
        <div class="status text-gray-400">
            {{$value}}
        </div>
    @endsession
    <table class="table w-full border-collapse table-fixed shadow-md mt-8 scroll-auto">
        <thead>
            <tr class=" bg-slate-200">
                <th class="rounded-tl-lg py-2">Nro. Venta</th>
                <th class="">Fecha</th>
                <th class="">Total</th>
                <th class="rounded-tr-lg  py-2">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($ventas as $venta)
            <tr class=" border-b border-slate-200">
                <td class="py-1">{{$venta->venta_id}}</td>
                <td class="py-1">{{$venta->created_at}}</td> 
                <td class="py-1">${{$venta->venta_total}}</td>
                <td class="flex justify-center items-center space-x-1 py-1 ">
                    <label for="tw-modal{{$venta->venta_id}}" class="cursor-pointer rounded px-1 text-white bg-blue-400 hover:bg-slate-700">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg> --}}Ver
                        @include('carro.modal')
                    </label>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>