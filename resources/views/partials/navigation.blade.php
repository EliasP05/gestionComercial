<header class="bg-gray-100 shadow-md px-6 ">

    <div class="flex h-16 max-w-7xl mx-auto justify-between items-center">
        <button class="text-blue-400 rounded-full p-1 -ml-1 hover:bg-blue-400 hover:text-white transition-all ease-linear duration-200 
        focus:ring-2">
            <svg class="h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        <div class="flex items-center">
            <a class="text-3xl font-bold hover:text-blue-400 hover:scale-95 transition-all ease-linear duration-200" href="">Logo</a>
           
            <div class="space-x-8 hidden md:flex ml-8 ">
                <a class="  cursor-pointer px-3 py-2  text-blue-400  font-bold" href="{{route('inicio')}}">Inicio</a>
                <a class="  cursor-pointer px-3 py-2  text-gray-400 hover:text-blue-400 hover:underline transition-colors duration-200" href="{{route('usuarios')}}">Usuarios</a>   
                <a class="  cursor-pointer px-3 py-2  text-gray-400 hover:text-blue-400 hover:underline transition-colors duration-200" href="{{route('producto')}}">Productos</a>
                <a class="  cursor-pointer px-3 py-2  text-gray-400 hover:text-blue-400 hover:underline transition-colors duration-200" href="{{route('marcas')}}">Marca</a>
            </div>
        </div>
        
        <div class="flex">
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-400  hover:text-blue-400 hover:underline focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <button class="rounded-full focus:ring-2 hover:bg-blue-400 hover:text-white text-blue-400 transition-all ease-linear duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
            </button>
        </div>   
    </div>
   
        

        

    {{-- opciones de celu  --}}
    <div class=" space-y-1 pb-2 border-t pt-2 md:hidden">
        <a class=" block cursor-pointer px-3 py-2 rounded-md  text-white bg-blue-400 transition-colors" href="{{route('inicio')}}">Inicio</a>
        <a class=" block cursor-pointer px-3 py-2 rounded-md text-blue-400 hover:text-white hover:bg-blue-400 transition-colors" href="{{route('producto')}}">Productos</a>
        <a class=" block cursor-pointer px-3 py-2 rounded-md text-blue-400 hover:text-white hover:bg-blue-400 transition-colors" href="{{route('marcas')}}">Marca</a>
    </div>

   
</header>
