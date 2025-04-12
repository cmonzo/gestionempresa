@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">ACTUALIZAR CLIENTE</h1>--}}

@section('contenido')
<form action="{{route('customers.update',$customer->name)}}" method="POST">
    @csrf
    @method('put')
    <label for="name">Nombre de cliente:</label><br>
    <input type="text" name="username" id="username" value="{{$customer->name}}"><br>

    <label for="surname">Apellidos:</label><br>
    <input type="text" name="surname" id="surname" value="{{$customer->surname}}"><br>

    <label for="phone">Localización</label><br>
    <input type="number" name="phone" id="phone" value="{{$customer->phone}}"><br>

    <label for="nif">FECHA:</label><br>
    <input type="text" name="nif" id="nif" value="{{$customer->nif}}"><br>

    <label for="adress">Dirección:</label><br>
    <input type="text" name="adress" id="adress" value="{{$customer->adress}}"><br>

    <input type="submit" name="eviar" value="Enviar">
</form>

    
@endsection