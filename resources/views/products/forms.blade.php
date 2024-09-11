<label for="prod_cod">Code:<input type="text" name="prod_cod" id="prod_cod" value="{{old('prod_cod',$product->prod_cod)}}"></label><br>
        @error('prod_cod')    
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror
    
    <label for="prod_nom">Name:<input type="text" name="prod_nom" id="prod_nom" value="{{old('prod_nom',$product->prod_nom)}}"></label> <br>
        @error('prod_nom')
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror
    
    <label for="marca_id">
        Select una marca
            <select name="marca_id" id="marca_id" >
                <option value="{{$product->marca_id ?? " "}}" selected>{{$product->marca->marca_nombre ?? "Seleccione un marca"}}</option>
                @foreach ($marcas as $marca)
                    <option value="{{$marca->marca_id}}">{{$marca->marca_nombre}}</option >
                @endforeach
            </select>
    </label><br>
        @error('marca_id')
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror
    
    <label for="prod_descripcion">
            Detail: <br>
                <textarea name="prod_descripcion" id="prod_descripcion" cols="30" rows="10">{{old('prod_descripcion',$product->prod_descripcion)}}</textarea>
        </label> <br>
        @error('prod_descripcion')
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror
    
    <label for="prod_stock">Stock:<input type="number" name="prod_stock" id="prod_stock" value="{{old('prod_stock',$product->prod_stock)}}"></label> <br>
        @error('prod_stock')
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror
    
    <label for="prod_stock_min">Stock Min. :<input type="number" name="prod_stock_min" id="prod_stock_min" value="{{old('prod_stock_min',$product->prod_stock_min)}}"></label> <br>
        @error('prod_stock_min')
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror
    
    <label for="prod_costo">Cost:<input type="number" name="prod_costo" id="prod_costo" value="{{old('prod_costo',$product->prod_costo)}}"></label> <br>
        @error('prod_costo')
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror
    
    <label for="prod_precio">Price:<input type="number" name="prod_precio" id="prod_precio" value="{{old('prod_precio',$product->prod_precio)}}"></label> <br>
        @error('prod_precio')
            <small style="color:red">{{$message}}</small>
            <br>
        @enderror