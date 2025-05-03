@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">REGISTRO USUARIO</h1>--}}
    @section('contenido')
    
<div class="register">
    <form action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name">Nombre del trabajador:</label><br>
        <input type="text" name="name" id="name"><br>

        <label for="surname">Apellidos del trabajador:</label><br>
        <input type="text" name="surname" id="surname"><br>

        <label for="phone">Teléfono:</label><br>
        <input type="number" name="phone" id="phone"><br>

        <label for="nif">NIF:</label><br>
        <input type="text" name="nif" id="nif"><br>

        <label for="born">Fecha de nacimiento:</label><br>
        <input type="date" name="born" id="born"><br>

        <label for="alias">Apodo:</label><br>
        <input type="text" name="alias" id="alias"><br>

        <label for="department">Departamento:</label><br>
        <input type="text" name="department" id="department"><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email"><br>

        <label for="hiring">Fecha de contratación:</label><br>
        <input type="date" name="hiring" id="hiring"><br>

        <label for="status">Estado del empleado:</label>
        <select name="status" id="status" class="form-control">
            <option value="active">activo</option>
            <option value="inactive">inactivo</option>
            <option value="holidays">vacaciones</option>
            <option value="injured">baja</option>
        </select>

        <label for="gender">Genero del empleado:</label>
        <select name="gender" id="gender" class="form-control">
            <option value="male">Hombre</option>
            <option value="female">Mujer</option>
            <option value="unidentified">Prefiero no decirlo</option>
        </select>

        <label for="Posición">Posición del empleado:</label>
        <select name="position" id="position" class="form-control">
            <option value="manager">Director</option>
            <option value="administrative">Administrativo</option>
            <option value="business">Comercial</option>
        </select>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password"><br>

        <label for="password_confirmation">Repite Contraseña:</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>
        
        <input type="submit" name="enviar" value="Enviar">
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