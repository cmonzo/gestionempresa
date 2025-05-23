@extends('layaout')

@section('titulo')
    {{--<h1>USUARUI {{$user->name}}</h1>--}}

@section('contenido')
<div class="mostrar">   
<div>
    {{$user->name}} <br>
    Correo:<br>{{$user->email}} <br>
    
    rol: {{$user->rol}} <br>
    
    </div>
    
    @if(Auth::user()->rol == 'admin')
    <form action="{{route('users.destroy', $user->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="eliminar">
    </form>
    @endif
    
</div>
    
@endsection