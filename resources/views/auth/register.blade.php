@extends('layaout')

@section('titulo')
    <h1 class="display-1">REGISTRO USUARIO</h1>
    @section('contenido')
    
<div class="register">
    <form action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name">Nombre del trabajador:</label><br>
        <input type="text" name="name" id="name"><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email"><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password"><br>

        <label for="password_confirmation">Repite Contraseña:</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>
        
        <input type="submit" name="enviar" value="Enviar">
    </form>
</div>



@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@endsection