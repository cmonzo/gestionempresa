@extends('layaout')

@section('titulo')
{{--<h1>USUARIOS</h1>--}}

@section('contenido')
    @isset($_GET['elim'])
        @if($_GET['elim'] == 1)
            <p>El USUARIO se ha eliminado</p>
        @endif
    @endisset
    <h1>Listado de usuarios</h1>
    <div class="users">
        @forelse ($users as $user)
            <div class="usuario">
                @if(Auth::check())
                    <a href="{{route('users.show', $user->id)}}">
                        {{$user->name}} <br>
                        
                @endif





            </div>
        @empty
            No hay usuarios

        @endforelse

    </div>


@endsection