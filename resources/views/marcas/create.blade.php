<h1>Agregar Marca</h1>
<form action="{{route('marca.store')}}" method="post">
    @csrf

    <label for="marca_nombre">Nombre<input type="text" name="marca_nombre" id="marca_nombre"></label>

   <button type="submit">Guardar</button>
</form>
