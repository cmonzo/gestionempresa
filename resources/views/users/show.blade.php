@extends('layaout')

@section('titulo')
{{--<h1>USUARUI {{$user->name}}</h1>--}}

@section('contenido')
    <div class="mostrar">
        <div>
            {{$user->name}} {{$user->surname}}<br>
            Correo:{{$user->email}} <br>
            Teléfono:{{$user->phone}} <br>
            NIF:{{$user->nif}} <br>
            Fecha de nacimiento:{{$user->born}} <br>
            Genero:{{$user->gender}} <br>
            Alias:{{$user->alias}} <br>
            Departamento:{{$user->department}} <br>
            Cargo:{{$user->position}} <br>
            Fecha de contratación:{{$user->hiring}} <br>
            Estado del empleado:{{$user->status}} <br>
            rol: {{$user->rol}} <br>

        </div>

        @if(Auth::user()->rol == 'admin')
            <a href="{{route('users.edit', $user->id)}}">Editar usuario</a>
        @endif

        @if(Auth::user()->rol == 'admin')
            <form action="{{route('users.destroy', $user->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="eliminar">
            </form>
        @endif

    </div>

@endsection