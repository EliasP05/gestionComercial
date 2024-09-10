{{-- @vite('resources/css/app.css') --}}
<label for="marca_nombre">Nombre<input type="text" name="marca_nombre" id="marca_nombre" value="{{old('marca_nombre',$product->marca->marca_nombre ?? 'sin marca')}}"></label>
    @error('marca_nombre')
        <br>
        <small style="color:red">{{$message}}</small>
    @enderror
