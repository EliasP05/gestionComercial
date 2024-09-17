<div class="mb-5">
    <label for="prod_cod" class="block text-sm font-medium ">Code:
        <input type="text" class="block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" name="prod_cod" id="prod_cod" value="{{old('prod_cod',$product->prod_cod)}}">
    </label>
        @error('prod_cod')    
            <small class="text-red-500">{{$message}}</small>
        @enderror
</div>
    
    <div class="grid grid-cols-1  md:grid-cols-2 gap-5">
        <div class="">
            <label for="prod_nom" class="block text-sm font-medium">Name:
                <input type="text" class="block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" name="prod_nom" id="prod_nom" value="{{old('prod_nom',$product->prod_nom)}}">
            </label>
                @error('prod_nom')
                    <small class="text-red-500">{{$message}}</small>
                @enderror
        </div>
        <div class="mb-5">
            <label for="marca_id" class="text-sm font-medium">
            <div class="block ">Select una marca </div> 
                    <select name="marca_id" id="marca_id" class="block w-full border ring-1  py-1.5 px-2 ring-gray-300 rounded-md font-normal">
                        <option value="{{$product->marca_id ?? " "}}" selected>{{$product->marca->marca_nombre ?? "Seleccione un marca"}}</option>
                        @foreach ($marcas as $marca)
                            <option value="{{$marca->marca_id}}">{{$marca->marca_nombre}}</option >
                        @endforeach
                    </select>
            </label>
            @error('marca_id')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>        
    </div>
        
<div class="mb-5">
    <label for="prod_descripcion" class="block text-sm font-medium">
        Detail:    
            <textarea name="prod_descripcion" id="prod_descripcion" rows="10" class="w-full ring-1 ring-inset ring-gray-300 rounded-md py-1.5 px-2 a font-normal sm:text-sm sm:leading-6">{{old('prod_descripcion',$product->prod_descripcion)}}</textarea>
    </label>
        @error('prod_descripcion')
            <small style="color:red">{{$message}}</small>
        @enderror
</div>

    <div class="grid grid-cols-2 gap-3 mb-5 md:grid-cols-4">
        <div class="block">
            <label for="prod_stock" class="font-bold text-sm">Stock:
            <input type="number" name="prod_stock" id="prod_stock" class=" block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" value="{{old('prod_stock',$product->prod_stock)}}"></label> 
            @error('prod_stock')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div class="block">
            <label for="prod_stock_min" class=" font-bold text-sm">Stock Min. :
            <input type="number" name="prod_stock_min" id="prod_stock_min" class=" block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" value="{{old('prod_stock_min',$product->prod_stock_min)}}"></label> 
            @error('prod_stock_min')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div class="block">
            <label for="prod_costo" class=" font-bold text-sm">Cost:
            <input type="number" name="prod_costo" id="prod_costo" class=" block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" value="{{old('prod_costo',$product->prod_costo)}}"></label> 
            @error('prod_costo')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div class="block">
            <label for="prod_precio" class=" font-bold text-sm">Price:
            <input type="number" name="prod_precio" id="prod_precio" class=" block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" value="{{old('prod_precio',$product->prod_precio)}}"></label>
            @error('prod_precio')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div> 
    </div>
    