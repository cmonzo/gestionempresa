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
            <form action="{{route('users.updateWorker', Auth::user()->id)}}" method="POST">
                @csrf
                @method('put')
                <label for="status">Estado del empleado:</label>

                <select name="status" id="status" class="form-control">
                    <option value="{{$user->status}}"></option>
                    <option value="active">activo</option>
                    <option value="inactive">inactivo</option>
                    <option value="holidays">vacaciones</option>
                    <option value="injured">baja</option>
                </select>


                <label for="Posición">Posición del empleado:</label>

                <select name="position" id="position" class="form-control">
                    <option value="{{$user->position}}"></option>
                    <option value="manager">Director</option>
                    <option value="administrative">Administrativo</option>
                    <option value="business">Comercial</option>
                </select>

                <label for="Posición">Rol:</label>

                <select name="rol" id="rol" class="form-control">
                    <option value="{{$user->rol}}"></option>
                    <option value="admin">Administrador</option>
                    <option value="worker">Empleado</option>

                </select>


                <input type="submit" name="eviar" value="Actualziar">
            </form>
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