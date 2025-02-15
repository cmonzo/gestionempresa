@extends('layaout')

@section('titulo')
    <h1 class="display-1">ACTUALIZAR EVENTO</h1>

@section('contenido')
<form action="{{route('events.update',$event->name)}}" method="POST">
    @csrf
    @method('put')
    <label for="name">Nombre de usuario:</label><br>
    <input type="text" name="username" id="username" value="{{$event->name}}"><br>

    <label for="description">Descripción:</label><br>
    <input type="text" name="description" id="description" value="{{$event->description}}"><br>

    <label for="location">Localización</label><br>
    <input type="text" name="location" id="location" value="{{$event->location}}"><br>

    <label for="fecha">FECHA:</label><br>
    <input type="date" name="fecha" id="fecha" value="{{$event->date}}"><br>

    <label for="hora">Hora:</label><br>
    <input type="time" name="hora" id="hora" value="{{$event->hour}}"><br>

    <label for="tags">Etiquetas:</label><br>
    <input type="text" name="tags" id="tags" value="{{$event->description}}"><br>
    @if (Auth::check() && Auth::user()->rol == 'admin')
    <select name="visibilidad" id="visibilidad">
        <option value="1">Hacer visible</option>
        <option value="0">Hacer invisible</option>
    </select>
    @endif
    <input type="submit" name="eviar" value="Enviar">
</form>

    
@endsection