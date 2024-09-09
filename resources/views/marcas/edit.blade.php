<h1>{{__("Edit")}} Marca</h1>
<form action="{{route('marcas.update',$marca)}}" method="post">
    @csrf   @method('patch')                                   
    @include('marcas.forms') <br>
    <a href="{{route('marcas')}}">{{__("Go Back")}}</a>
   <button type="submit">{{__("Save")}}</button>
</form>