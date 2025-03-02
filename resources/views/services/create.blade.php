@extends('layaout')

@section('titulo')
<h1 class="display-1">CREAR SERVICIO</h1>

@section('contenido')
    <div class="crear">
        <form action="{{route('services.store')}}" method="POST">
            @csrf

            <label for="type">Nombre del servicio:</label><br>
            <input type="text" name="type" id="type"><br>

            <label for="iva">Localización</label><br>
            <input type="number" name="iva" id="iva"><br>

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>

@endsection