@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">CUENTA</h1>--}}

@section('contenido')


    <form action="{{route('users.update', Auth::user()->id)}}" method="POST">
        @csrf
        @method('put')

        <label for="name">{{Auth::user()->name}} {{Auth::user()->surname}}</label><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{Auth::user()->email}}"><br>

        <label for="phone">{{__('Teléfono')}}:</label><br>
        <input type="number" name="phone" id="phone" value="{{Auth::user()->phone}}"><br>

        <label for="nif">NIF:</label><br>
        <input type="text" name="nif" id="nif" value="{{Auth::user()->nif}}"><br>

        <label for="born">Fecha de nacimiento:</label><br>
        <input type="date" name="born" id="born" value="{{Auth::user()->born}}"><br>

        <label for="alias">Apodo:</label><br>
        <input type="text" name="alias" id="alias" value="{{Auth::user()->alias}}"><br>

        <label for="department">Departamento:</label><br>
        <input type="text" name="department" id="department" value="{{Auth::user()->department}}"><br>

        <label for="hiring">Fecha de contratación:</label><br>
        <input type="date" name="hiring" id="hiring" value="{{Auth::user()->hiring}}"><br>

        <label for="modify"></label><br>
        <input type="hidden" name="modify" id="modify" value=1><br>

        <label for="status">Estado del empleado:</label>
        @if(Auth::user()->rol == 'admin')
        <select name="status" id="status" class="form-control w-auto">
            <option value="{{Auth::user()->status}}"></option>
            <option value="active">activo</option>
            <option value="inactive">inactivo</option>
            <option value="holidays">vacaciones</option>
            <option value="injured">baja</option>
        </select>
        @else
            {{Auth::user()->status}} <br>
        @endif

        <label for="gender">Genero del empleado:</label>
        <select name="gender" id="gender" class="form-control w-auto">
            <option value="{{Auth::user()->gender}}"></option>
            <option value="male">Hombre</option>
            <option value="female">Mujer</option>
            <option value="unidentified">Prefiero no decirlo</option>
        </select>

        <label for="Posición">Posición del empleado:</label>
        @if(Auth::user()->rol == 'admin')
        <select name="position" id="position" class="form-control w-auto">
            <option value="{{Auth::user()->position}}"></option>
            <option value="manager">Director</option>
            <option value="administrative">Administrativo</option>
            <option value="business">Comercial</option>
        </select>
        @else
            {{Auth::user()->position}} <br>
        @endif

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password"><br>

        <label for="password_confirmation">Repite Contraseña:</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>
        <label for="Posición">Rol:</label>
@if(Auth::user()->rol == 'admin')
                <select name="rol" id="rol" class="form-control">
                    <option value="{{Auth::user()->rol}}"></option>
                    <option value="admin">Administrador</option>
                    <option value="worker">Empleado</option>

                </select>
                @else
                {{Auth::user()->rol}}
                @endif

        <input type="submit" name="eviar" value="Enviar">
    </form>
    <p>{{Auth::user()->rol}}</p>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@endsection