<h1>{{__('Add')}} producto</h1>
<form action="{{route('products.store')}}" method="POST">
    @csrf
    @include('products.forms')
    <a href="{{route('producto')}}">{{__('Go Back')}}</a> &nbsp;<button type="submit">{{__('Save')}}</button>
</form>