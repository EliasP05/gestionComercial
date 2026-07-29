<x-layout meta-title="Editar Venta">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-4xl font-bold">Editar Venta N° {{ $ventas->venta_id }}</h1>
        <a class="bg-blue-400 text-white px-3 py-1 rounded-lg hover:text-blue-400 hover:bg-white border border-blue-400"
            href="{{ route('ventas.pdf', ['venta_id' => $ventas->venta_id]) }}">Comprobante</a>
    </div>

    <p class="text-slate-600 mb-4">
        Fecha y hora: {{ $ventas->created_at->format('d/m/Y H:i') }} — Vendedor: {{ $ventas->usuario->name }}
    </p>

    <div id="venta-edit" data-confirm-url="{{ route('ventas.confirmar', $ventas) }}"
        data-cancel-url="{{ route('ventas.cancelar', $ventas) }}" data-redirect-url="{{ route('ventas') }}">

        <table class="w-full border-collapse table-fixed shadow-md">
            <thead>
                <tr class="bg-slate-200">
                    <th class="rounded-tl-lg py-2">cod.</th>
                    <th class="py-2">Producto</th>
                    <th class="py-2">Precio</th>
                    <th class="py-2">Cantidad</th>
                    <th class="py-2">Subtotal</th>
                    <th class="rounded-tr-lg py-2">Acción</th>
                </tr>
            </thead>
            <tbody id="venta-items-body">
                @forelse ($items as $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; @endphp
                    <tr class="border-b border-slate-200 text-center" data-prod-id="{{ $item['prod_id'] }}"
                        data-precio="{{ $item['precio'] }}" data-cantidad-actual="{{ $item['cantidad'] }}"
                        data-update-url="{{ route('ventas.item.update', ['venta' => $ventas, 'prod' => $item['prod_id']]) }}"
                        data-quitar-url="{{ route('ventas.item.quitar', ['venta' => $ventas, 'prod' => $item['prod_id']]) }}">
                        <td class="py-1">{{ $item['prod_id'] }}</td>
                        <td class="py-1">{{ $item['nombre'] }}</td>
                        <td class="py-1">$ {{ number_format($item['precio'], 2) }}</td>
                        <td class="py-1">
                            <input type="number" min="1" value="{{ $item['cantidad'] }}"
                                class="w-16 text-center rounded-md border-slate-400 cantidad-input">
                        </td>
                        <td class="py-1 subtotal" data-value="{{ $subtotal }}">$ {{ number_format($subtotal, 2) }}
                        </td>
                        <td class="py-1">
                            <button type="button" class="btn-delete btn-quitar">Quitar</button>
                        </td>
                    </tr>
                @empty
                    <tr id="venta-items-empty">
                        <td colspan="6" class="py-4 text-center text-slate-500">No quedan productos en esta venta.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="bg-slate-200">
                    <td class="font-bold py-1" colspan="4">Total</td>
                    <td class="font-bold py-1" id="venta-total">
                        $ {{ number_format(collect($items)->sum(fn($i) => $i['precio'] * $i['cantidad']), 2) }}
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div id="venta-edit-msg" class="mt-2 text-sm"></div>

        <div class="flex justify-end space-x-2 mt-4">
            <button type="button" id="btn-cancelar-edicion" class="btn-cancel">Cancelar</button>
            <button type="button" id="btn-confirmar-edicion" class="btn-confirm">Confirmar cambios</button>
        </div>
    </div>
</x-layout>
