<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Apellido --}}
        <div class="mt-4">
            <x-input-label for="usu_apellido" :value="__('Last Name')" />
            <x-text-input id="usu_apellido" class="block mt-1 w-full" type="text" name="usu_apellido" :value="old('name')" required autofocus autocomplete="usu_apellido" />
            <x-input-error :messages="$errors->get('usu_apellido')" class="mt-2" />
        </div>
        {{-- DNI --}}
        <div class="mt-4">
            <x-input-label for="usu_dni" :value="'DNI'" />
            <x-text-input id="usu_dni" class="block mt-1 w-full" type="number" name="usu_dni" :value="old('name')" required autofocus autocomplete="usu_dni" />
            <x-input-error :messages="$errors->get('usu_apellido')" class="mt-2" />
        </div>
        {{--TIPO--}}
        <div class="mt-4">
            <select name="tip_id" id="tip_id" class="block w-full border ring-1  py-1.5 px-2 ring-gray-300 rounded-md font-normal">
                <option value="{{$user->tip_id ?? " "}}" selected>{{$user->tipo->tip_nombre ?? "Seleccione un Tipo"}}</option>
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->tip_id}}">{{$tipo->tip_nombre}}</option >
                @endforeach
            </select>
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
