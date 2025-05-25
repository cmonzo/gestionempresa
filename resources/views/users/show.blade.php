@extends('layaout')

@section('titulo')
{{--<h1>USUARUI {{$user->name}}</h1>--}}

@section('contenido')
    <div class="mostrar">
        <div>
            {{$user->name}} {{$user->surname}}<br>
            Correo:<br>{{$user->email}} <br>
            Teléfono:<br>{{$user->phone}} <br>
            NIF:<br>{{$user->nif}} <br>
            Fecha de nacimiento:<br>{{$user->born}} <br>
            Genero:<br>{{$user->gender}} <br>
            Alias:<br>{{$user->alias}} <br>
            Departamento:<br>{{$user->department}} <br>
            Cargo:<br>{{$user->position}} <br>
            Fecha de contratación:<br>{{$user->hiring}} <br>
            Estado del empleado:<br>{{$user->status}} <br>
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