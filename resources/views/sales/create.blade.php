@extends('layaout')

@section('titulo')
<h1 class="display-1">CREAR VENTA</h1>

@section('contenido')
    <div class="crear">
        <form action="{{route('sales.store')}}" method="POST">
            @csrf

            <label for="type">Tipo:</label><br>
            <input type="text" name="type" id="type"><br>

            <label for="charge">Cargo</label><br>
            <input type="text" name="charge" id="charge"><br>

            crear desplegable para elegir el cliente que se le hace la venta y luego cambiarlo en el controlador

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>

@endsection