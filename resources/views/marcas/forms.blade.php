<div class="mb-5">
    <label class="text-sm font-medium" for="marca_nombre">Name:
        <input class="w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" type="text" name="marca_nombre" id="marca_nombre" value="{{old('marca_nombre',$marca->marca_nombre ?? 'sin marca')}}"></label>
        @error('marca_nombre')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div> 
    
