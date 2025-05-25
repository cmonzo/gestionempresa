@extends('layaout')

@section('titulo')
{{--<h1>USUARUI {{$user->name}}</h1>--}}

@section('contenido')
    <div class="mostrar">


        @if(Auth::user()->rol == 'admin')
            <form action="{{route('users.update', $user->id)}}" method="POST">
                @csrf
                @method('put')
                <label for="name">{{$user->name}}</label><br>
                <input type="text" name="name" id="name" value="{{$user->name}}"><br>

                <label for="surname">{{$user->surname}}</label><br>
                <input type="text" name="surname" id="surname" value="{{$user->surname}}"><br>

                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" value="{{$user->email}}"><br>

                <label for="phone">Teléfono:</label><br>
                <input type="number" name="phone" id="phone" value="{{$user->phone}}"><br>

                <label for="nif">NIF:</label><br>
                <input type="text" name="nif" id="nif" value="{{$user->nif}}"><br>

                <label for="born">Fecha de nacimiento:</label><br>
                <input type="date" name="born" id="born" value="{{$user->born}}"><br>

                <label for="alias">Apodo:</label><br>
                <input type="text" name="alias" id="alias" value="{{$user->alias}}"><br>

                <label for="department">Departamento:</label><br>
                <input type="text" name="department" id="department" value="{{$user->department}}"><br>

                <label for="hiring">Fecha de contratación:</label><br>
                <input type="date" name="hiring" id="hiring" value="{{$user->hiring}}"><br>
                <label for="status">Estado del empleado:</label>

                <select name="status" id="status" class="form-control">
                    <option value="{{$user->status}}"></option>
                    <option value="active">activo</option>
                    <option value="inactive">inactivo</option>
                    <option value="holidays">vacaciones</option>
                    <option value="injured">baja</option>
                </select>

                <label for="gender">Genero del empleado:</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="{{Auth::user()->gender}}"></option>
                    <option value="male">Hombre</option>
                    <option value="female">Mujer</option>
                    <option value="unidentified">Prefiero no decirlo</option>
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