<h1>Editar producto</h1>
<form action="{{route('products.update',$product)}}" method="post">
    @csrf  @method('PATCH') 
 @include('products.forms')
    <a href="{{route('producto')}}">{{__('Go Back')}}</a> &nbsp;<button type="submit">{{__('Save')}}</button>
</form>
