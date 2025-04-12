@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">LOGIN</h1>--}}

    @section('contenido')
    
<div class="register">
<form action="{{route('login')}}" method="POST">
    @csrf

    <label for="name">Nombre de usuario:</label><br>
    <input type="text" name="name" id="name"><br>

    

    <label for="password">Contraseña:</label><br>
    <input type="password" name="password" id="password"><br>

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