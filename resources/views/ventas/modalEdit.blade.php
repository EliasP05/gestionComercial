<input type="checkbox" id="tw-modal{{ $item['prod_id'] }}" class="peer fixed appearance-none opacity-0">

<label for="tw-modal{{ $item['prod_id'] }}"
    class=" pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain
    bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100
    peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


    <label for=""
        class="max-h-[calc(100vh - 1em)] h-fit max-w-lg scale-90 overflow-y-auto
        overscroll-contain rounded-md bg-white p6 text-black shadow-2xl transition p-3">
        <div class="flex justify-between items-center">
            <h3 class=" text-lg font-bold">Eliminar Item</h3>
        </div>

        <div>
            <p>¿Está seguro de eliminar el producto {{ $item['nombre'] }}?</p>
        </div>
        <div class="flex justify-end space-x-2 mt-3">
            <label for="tw-modal{{ $item['prod_id'] }}" class="btn-cancel cursor-pointer">No</label>
            <button type="button" class="btn-delete btn-quitar">
                Sí, eliminar
            </button>
        </div>
    </label>
</label>
