@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">ACTUALIZAR PROVEEDOR</h1>--}}

@section('contenido')
<form action="{{route('suppliers.update',$supplier->id)}}" method="POST">
    @csrf
    @method('put')
    <label for="name">Nombre de proveedor:</label><br>
    <input type="text" name="name" id="name" value="{{$supplier->name}}"><br>

    <label for="phone">TELEFONO:</label><br>
    <input type="number" name="phone" id="phone" value="{{$supplier->phone}}"><br>

    <label for="cif">CIF</label><br>
    <input type="text" name="cif" id="cif" value="{{$supplier->cif}}"><br>

    <label for="adress">DIRECCION:</label><br>
    <input type="text" name="adress" id="adress" value="{{$supplier->adress}}"><br>

    <label for="tags">Etiquetas:</label><br>
    <input type="text" name="tags" id="tags" value="{{$event->description}}"><br>
    
    <input type="submit" name="eviar" value="Enviar">
</form>

    
@endsection