@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">CUENTA</h1>--}}

    @section('contenido')
    

<form action="{{route('users.update', Auth::user()->id)}}" method="POST">
    @csrf
    @method('put')

    <label for="name">{{Auth::user()->name}}</label><br>
    
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" value="{{Auth::user()->email}}"><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" name="password" id="password"><br>

    <label for="password_confirmation">Repite Contraseña:</label><br>
    <input type="password" name="password_confirmation" id="password_confirmation"><br>


    <input type="submit" name="eviar" value="Enviar">
</form>
<p>{{Auth::user()->rol}}</p>
<form action="{{route('users.destroy',Auth::user()->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="eliminar">
</form>



@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@endsection