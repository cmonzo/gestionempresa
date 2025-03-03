@extends('layaout')

@section('titulo')
    <h1>USUARUI {{$user->name}}</h1>

@section('contenido')
<div class="mostrar">   
<div>
    {{$user->name}} <br>
    Correo:<br>{{$user->email}} <br>
    
    rol: {{$user->rol}} <br>
    
    </div>
    
</div>
    
@endsection