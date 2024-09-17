@vite('resources/css/app.css')
@include('partials.navigation')
<div class="container mx-auto">
    <div class="max-w-4xl mx-auto mt-5 px-5 py-2 rounded-lg border border-gray-300">
        <h1 class="text-center text-3xl">Editar producto</h1>
        <form action="{{route('products.update',$product)}}" method="post">
            @csrf  @method('PATCH') 
        @include('products.forms')
            <div class="flex justify-end space-x-5 items-center">
                <a class="bg-gray-500 text-white px-2 py-1 rounded-md font-semibold focus:ring-2" href="{{route('producto')}}">{{__('Go Back')}}</a>
                <button class="bg-blue-500 text-white px-2 py-1 rounded-md font-semibold focus:ring-2" type="submit">{{__('Save')}}</button>
            
            </div>
        </form>
    </div>
</div>

