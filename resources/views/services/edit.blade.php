@extends('layaout')

@section('titulo')

@section('contenido')
<form action="{{route('services.update',$service->id)}}" method="POST">
    @csrf
    @method('put')
            <label for="type">Nombre del servicio:</label><br>
            <input type="text" name="type" id="type" value="{{$service->type}}"><br>

            <label for="iva">IVA</label><br>
            <input type="number" name="iva" id="iva" value="{{$service->iva}}"><br>

            <button type="submit">Actualizar</button>
</form>

    
@endsection