@vite('resources/css/app.css')
@include('partials.navigation')
<div class="container mx-auto">
    <div class=" max-w-4xl mx-auto mt-5 px-5 py-2 rounded-lg shadow-md">
        <h1 class="text-center text-3xl ">{{__('Add')}} Producto</h1>
        <form action="{{route('products.store')}}" method="POST">
            @csrf
            @include('products.forms')
            <a href="{{route('producto')}}">{{__('Go Back')}}</a> &nbsp;<button type="submit">{{__('Save')}}</button>
        </form>
    </div>
    
</div>
