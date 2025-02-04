
<h3 class=" text-md font-bold">Forma de Pago</h3>
<div class="flex justify-between my-1">
    <label for="radioEfectivo"><input type="radio" name="formaP" id="radioEfectivo">Efectivo</label>
    <label for="tarjeta"><input type="radio" name="formaP" id="tarjeta">Tarjeta</label>
    <label for="transferencia"><input type="radio" name="formaP" id="transferencia">Transferencia</label>
</div>

<div class="flex flex-col gap-2 my-1 justify-center" id="camposeEfectivo">
    <div class="flex justify-center items-center">
        <label for="" class=" font-semibold">Total $</label><input class=" rounded-md" id="inputTotal" type="number" value="{{$total}}" readonly>
    </div>
    <div class="flex justify-center items-center">
        <label for="" class=" font-semibold">Pagó $</label><input  class=" rounded-md" id="inputPago" name="dinero_cliente" type="number" value="{{$total}}">
    </div>
    <div class="flex justify-center items-center">
        <label for="" class=" font-semibold">Vuelto $</label><input class="font-bold rounded-md" id="inputVuelto" name="dinero_vuelto" type="number" readonly>
    </div>
</div>