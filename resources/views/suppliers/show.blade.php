@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">PROVEEDOR {{$supplier->name}}</h1>--}}



@section('contenido')
    <div class="service">
        <div>
            <p>TELEFONO: {{$supplier->phone}}</p>
            <p>CIF: {{$supplier->cif}}</p>
            <p>DIRECCIÓN: {{$supplier->adress}}</p>
           
        </div>
         @if(Auth::check())
    <a href="{{route('suppliers.edit', $supplier->id)}}" class="btn btn-custom">
        MODIFICAR SERVICIO
    </a>
    @endif
   
     @if(Auth::user()->rol == 'admin')
            <form action="{{route('suppliers.destroy', $supplier->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="eliminar">
            </form>
        @endif
    </div>

@endsection