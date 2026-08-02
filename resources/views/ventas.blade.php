<x-layout meta-title="Ventas">
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold">Ventas</h1>
        {{-- <a class="bg-blue-400 text-white px-3 py-1 rounded-lg hover:text-blue-400 hover:bg-white border border-blue-400" href="{{route('marcas.create')}}">{{__("Add")}} marca</a> --}}
    </div>
    @session('status')
        <div class="status text-gray-400">
            {{ $value }}
        </div>
    @endsession
    <table class="table w-full border-collapse table-fixed shadow-md mt-8 scroll-auto">
        <thead>
            <tr class=" bg-slate-200">
                <th class="rounded-tl-lg py-2">Nro. Venta</th>
                <th class="">Usuario</th>
                <th class="">Fecha y hora</th>
                <th class="">Total</th>
                <th class="rounded-tr-lg  py-2">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($ventas as $venta)
                <tr class=" border-b border-slate-200">

                    <td class="py-1">{{ $venta->venta_id }}</td>
                    <td class="py-1">{{ $venta->usuario->name }}</td>
                    <td class="py-1">{{ $venta->created_at->format('d-m-Y H:i') }}</td>
                    <td class="py-1">${{ $venta->venta_total }}</td>
                    <td class="flex justify-center items-center space-x-1 py-1 ">
                        @if (Auth()->user()->hasRole('Administrador'))
                            <a class="btn-update" href="{{ route('ventas.edit', $venta) }}">Modificar</a>
                        @endif

                        <label for="tw-modal{{ $venta->venta_id }}" class="btn-see">
                            Ver
                            @include('ventas.modal')
                        </label>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
