@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">ACTUALIZAR CLIENTE</h1>--}}

@section('contenido')
<form action="{{route('customers.update',$customer->id)}}" method="POST">
    @csrf
    @method('put')
            <label for="name">Nombre del cliente:</label><br>
            <input type="text" name="name" id="name" value="{{$customer->name}}"><br>

            <label for="surname">Apellidos</label><br>
            <input type="text" name="surname" id="surname" value="{{$customer->surname}}"><br>

            <label for="phone">Teléfono</label><br>
            <input type="number" name="phone" id="phone" value="{{$customer->phone}}"><br>

            <label for="nif">NIF</label><br>
            <input type="text" name="nif" id="nif" value="{{$customer->nif}}"><br>

            <label for="adress">Dirección</label><br>
            <input type="text" name="adress" id="adress" value="{{$customer->adress}}"><br>

            <button type="submit">Actualizar</button>
</form>

    
@endsection