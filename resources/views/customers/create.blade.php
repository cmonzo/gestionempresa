@extends('layaout')

@section('titulo')
<h1 class="display-1">CREAR CLIENTE</h1>

@section('contenido')
    <div class="crear">
        <form action="{{route('customers.store')}}" method="POST">
            @csrf

            <label for="name">Nombre del cliente:</label><br>
            <input type="text" name="name" id="name"><br>

            <label for="surname">Apellidos</label><br>
            <input type="text" name="surname" id="surname"><br>

            <label for="phone">TELEFONO</label><br>
            <input type="number" name="phone" id="phone"><br>

            <label for="nif">DNI</label><br>
            <input type="text" name="nif" id="nif"><br>

            <label for="adress">Dirección</label><br>
            <input type="text" name="adress" id="adress"><br>

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>

@endsection