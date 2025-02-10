<div class="mb-5">
    <label for="usu_dni" class="block text-sm font-medium ">DNI:
        <input type="number" class="block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" name="usu_dni" id="usu_dni" value="{{old('usu_dni',$user->usu_dni)}}">
    </label>
        @error('usu_dni')    
            <small class="text-red-500">{{$message}}</small>
        @enderror
</div>

    <div class="grid grid-cols-1  md:grid-cols-2 gap-5">
        <div class="">
            <label for="name" class="block text-sm font-medium">{{__('Name')}}:
                <input type="text" class="block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" name="name" id="name" value="{{old('name',$user->name)}}">
            </label>
                @error('name')
                    <small class="text-red-500">{{$message}}</small>
                @enderror
        </div>
        <div class="mb-5">
            <label for="tip_id" class="text-sm font-medium">
            <div class="block ">Tipo de Usuario </div> 
           
                    <select name="tip_id" id="tip_id" class="block w-full border ring-1  py-1.5 px-2 ring-gray-300 rounded-md font-normal">
                        <option value="{{$user->roles->first()->id ?? " "}}" selected>{{$user->roles->first()->name ?? "Seleccione un Tipo"}}</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->name}}</option >
                        @endforeach
                    </select>
            </label>
            @error('tip_id')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>        
    </div>
    <div class="mb-5">
        <label for="usu_apellido" class="block text-sm font-medium ">{{__('Last Name')}}:
            <input type="text" class="block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" name="usu_apellido" id="usu_apellido" value="{{old('usu_apellido',$user->usu_apellido)}}">
        </label>
            @error('usu_apellido')    
                <small class="text-red-500">{{$message}}</small>
            @enderror
    </div>

    <div class="  mb-5 ">
        <div class="block">
            <label for="email" class="font-bold text-sm">{{__('E-Mail')}}:
            <input type="email" name="email" id="email" class=" block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" value="{{old('email',$user->email)}}"></label> 
            @error('email')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        {{-- <div class="block">
            <label for="password" class=" font-bold text-sm">{{__('Password')}}:
            <input type="password" name="password" id="password" class=" block w-full rounded-md py-1.5 px-2 font-normal shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-inset  sm:text-sm sm:leading-6" value="{{old('password',$user->password)}}"></label> 
            @error('password')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div> --}}
    </div>
    