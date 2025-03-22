@extends('layaout')

@section('titulo')
    <h1 class="display-1">ACTUALIZAR VENTA</h1>

@section('contenido')
<form action="{{route('sales.update',$sale->id)}}" method="POST">
    @csrf
    @method('put')
    <label for="type">Tipo de venta:</label><br>
    <input type="text" name="type" id="type" value="{{$sale->type}}"><br>

    <label for="charge">Cargo:</label><br>
    <input type="number" name="charge" id="charge" value="{{$sale->charge}}"><br>


    <input type="submit" name="eviar" value="Enviar">
</form>

    
@endsection