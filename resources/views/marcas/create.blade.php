<h1>{{__("Add")}} Marca</h1>
<form action="{{route('marcas.store')}}" method="post">
    @csrf
    @include('marcas.forms')
    <br>
    <a href="{{route('marcas')}}">{{__("Go Back")}}</a>
    <button type="submit">{{__("Save")}}</button>
</form>