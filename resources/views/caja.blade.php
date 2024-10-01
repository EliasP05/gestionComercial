<x-layout>
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold">Caja</h1>  
    </div>
    @session('status')
            <div class="status text-gray-400">
                {{$value}}
            </div>   
    @endsession
    <div class="buscar">
        <form action="{{route('buscaProd')}}" method="GET">
            <x-text-input id="prod" name="prod"  placeholder="Busca un producto"/>
            <x-input-error class="mt-2" :messages="$errors->get('prod')" />
            <x-primary-button >Buscar</x-primary-button>
        </form>
    </div>
            <table>
                <thead>
                    <tr>
                        <th>cod</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>precio unit.</th>
                        <th>cantidad</th>
                        <th>subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            
                        </td>
                    </tr>
                </tfoot>
            </table>
</x-layout>