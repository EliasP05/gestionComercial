<x-layout>
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold">Algo</h1>  
    </div>
    @session('status')
            <div class="status text-gray-400">
                {{$value}}
            </div>   
        @endsession
</x-layout>