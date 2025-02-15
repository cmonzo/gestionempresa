@extends('layaout')

@section('titulo')
    <h1 class="display-1">CREAR EQUIPO</h1>

@section('contenido')
<div class="crear">
<form action="{{route('teams.store')}}" method="POST">
    @csrf

    {{-- <label for="name">Nombre del evento:</label><br>
    <input type="text" name="username" id="username" value="{{Auth::user()->name}}"><br> --}}

    <label for="team">EQUIPO:</label><br>
    <textarea rows="10" cols="50" name="team" id="team"></textarea><br>

    {{-- <label for="location">Localización</label><br>
    <input type="text" name="location" id="location"><br>

    <label for="fecha">FECHA:</label><br>
    <input type="date" name="fecha" id="fecha"><br>

    <label for="hora">Hora:</label><br>
    <input type="time" name="hora" id="hora"><br>

    <label for="tags">Etiquetas:</label><br>
    <input type="text" name="tags" id="tags"><br> --}}

    <input type="submit" name="enviar" value="Enviar">
</form>
</div>
    
@endsection