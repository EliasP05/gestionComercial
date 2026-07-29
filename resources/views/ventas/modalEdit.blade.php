<input type="checkbox" name="" id="tw-modal{{ $detalle->prod_id }}" class="peer fixed appearance-none opacity-0">

<label for="tw-modal{{ $detalle->prod_id }}"
    class=" pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain
    bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 
    peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


    <label for=""
        class="max-h-[calc(100vh - 1em)] h-fit max-w-lg scale-90 overflow-y-auto
        overscroll-contain rounded-md bg-white p6 text-black shadow-2xl transition p-3">
        <form action="" method="GET">
            <div class="flex justify-between items-center">
                <h3 class=" text-lg font-bold">Eliminar Item</h3>

            </div>

            <div>
                <p>Esta seguro de elminar el poducto {{ $detalle->producto->prod_nom }}</p>
            </div>
            <div>
                <button type="button" class="btn-delete"
                    onclick="quitarItem({{ $venta->venta_id }}, {{ $detalle->prod_id }})">
                    Sí, eliminar
                </button>
            </div>
        </form>
    </label>
</label>
