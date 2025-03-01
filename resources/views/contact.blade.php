@extends('layaout')

@section('titulo')
    <h1 class="display-1">INICIO</h1>

@section('contenido')
    
    
<div class="register">
    {{--<form action="{{route('send')}}" method="POST">--}}
    <form action="mailto:gestionempresamonzo@gmail.com" method="GET">
        @csrf
    
        <label for="name">Nombre de usuario:</label><br>
        <input type="text" name="name" id="name" required><br>
    
        
    
        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="message">Mensaje:</label><br>
        <input type="message" name="message" id="message" required><br>
    
        <input type="submit" name="eviar" value="Enviar">
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