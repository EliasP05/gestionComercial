<div class="w-full">
    <form action="{{route('buscaProd')}}" method="POST" class="flex space-x-3">
        @csrf
        <x-text-input id="prod_cod" name="prod_cod"  placeholder="Busca un producto" class="w-full"/>
        <input type="number" name="cantidad" id="cantidad" value="1" class="hidden">
        <x-input-error class="mt-2" :messages="$errors->get('prod_cod')" />
        <x-primary-button >Buscar</x-primary-button>
    </form>
</div>