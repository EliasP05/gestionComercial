<header class="bg-gray-100 shadow-md px-6  ">

    <div class="flex h-16 justify-between items-center">
        <button class="text-blue-400 rounded-full p-1 -ml-1 hover:bg-blue-400 hover:text-white transition-all ease-linear duration-200 
        focus:ring-2">
            <svg class="h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        <div class="flex items-center">
            <a class="text-3xl font-bold hover:text-blue-400 hover:text-4xl transition-all ease-linear duration-200" href="">Logo</a>
           
            <div class="space-x-8 hidden md:flex ml-8 ">
                <a class="  cursor-pointer px-3 py-2  text-blue-400  font-bold" href="{{route('inicio')}}">Inicio</a>
                <a class="  cursor-pointer px-3 py-2  text-gray-400 hover:text-blue-400 hover:border-b-2 transition-colors" href="{{route('producto')}}">Productos</a>
                <a class="  cursor-pointer px-3 py-2  text-gray-400 hover:text-blue-400 hover:border-b-2 transition-colors" href="{{route('marcas')}}">Marca</a>    
            </div>
        </div>
        
        <div class="flex">
            <button class=" rounded-full focus:ring-2 hover:bg-blue-400 hover:text-white text-blue-400 transition-all ease-linear duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </button>
        </div> 
        
    </div>
    <div class=" space-y-1 pb-2 border-t pt-2 md:hidden">
        <a class=" block cursor-pointer px-3 py-2 rounded-md  text-white bg-blue-400 transition-colors" href="{{route('inicio')}}">Inicio</a>
        <a class=" block cursor-pointer px-3 py-2 rounded-md text-blue-400 hover:text-white hover:bg-blue-400 transition-colors" href="{{route('producto')}}">Productos</a>
        <a class=" block cursor-pointer px-3 py-2 rounded-md text-blue-400 hover:text-white hover:bg-blue-400 transition-colors" href="{{route('marcas')}}">Marca</a>
    </div>
</header>