<div class="w-full shadow-md rounded-lg">
            <div class="w-full bg-blue-400 py-2 text-center font-bold capitalize text-white rounded-tl-lg rounded-tr-lg">total</div>
  
            <form action="{{route('confirmar')}}" method="POST" class="py-3 flex justify-around items-center">
                @csrf        

                @if (session('carrito'))
                    <label for="total" class="font-bold">$
                        <input type="number" id="total" name="total" value="{{$total}}" class="h-10 bg-slate-200 border-slate-400 rounded-md" disabled>
                    </label>

                    <input type="number" name="venta_total" value="{{$total}}" class="hidden" >
                    <input type="text" name="usu_id" value="1" class="hidden" >


                    <a href="{{route('cancelar')}}" class="bg-red-600 text-white rounded-md p-2 hover:bg-red-700">Cancelar</a>
                    <button type="submit" class="bg-green-600 text-white rounded-md p-2 hover:bg-green-700" >Confirmar</button>
                @else
                    <input type="number" name="" value="0.00" class="font-bold rounded-md" disabled>
                    <a href="{{route('cancelar')}}" class="bg-gray-400 text-gray-200 rounded-md p-2 cursor-none pointer-events-none" >Cancelar</a>
                    <button type="submit" class="bg-gray-400 text-gray-200 rounded-md p-2" disabled>Confirmar</button>
                @endif
                
            </form>
</div>
     