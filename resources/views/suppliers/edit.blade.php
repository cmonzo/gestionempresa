@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">ACTUALIZAR PROVEEDOR</h1>--}}

@section('contenido')
    <form action="{{route('suppliers.update', $supplier->id)}}" method="POST">
        @csrf
        @method('put')
        <label for="name">Nombre del proveedor:</label><br>
        <input type="text" name="name" id="name" value="{{$supplier->name}}"><br>


        <label for="phone">TELEFONO</label><br>
        <input type="number" name="phone" id="phone" value="{{$supplier->phone}}"><br>

        <label for="cif">CIF</label><br>
        <input type="text" name="cif" id="cif" value="{{$supplier->cif}}"><br>

        <label for="adress">DIRECCION</label><br>
        <input type="text" name="adress" id="adress" value="{{$supplier->adress}}"><br>

        <input type="submit" name="enviar" value="Enviar">
    </form>


@endsection