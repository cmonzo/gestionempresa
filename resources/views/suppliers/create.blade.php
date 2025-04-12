@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">CREAR PROVEEDOR</h1>--}}

@section('contenido')
    <div class="crear">
        <form action="{{route('suppliers.store')}}" method="POST">
            @csrf

            <label for="name">Nombre del proveedor:</label><br>
            <input type="text" name="name" id="name"><br>

            <label for="phone">TELEFONO</label><br>
            <input type="number" name="phone" id="phone"><br>

            <label for="cif">CIF</label><br>
            <input type="text" name="cif" id="cif"><br>

            <label for="adress">DIRECCION</label><br>
            <input type="text" name="adress" id="adress"><br>

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>

@endsection