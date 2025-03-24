@extends('layaout')

@section('titulo')
<h1 class="display-1">CREAR VENTA</h1>

@section('contenido')
    <div class="crear">
        <form action="{{route('sales.store')}}" method="POST">
            @csrf

            <label for="type">Tipo:</label><br>
            <input type="text" name="type" id="type"><br>

            <label for="charge">Cargo</label><br>
            <input type="text" name="charge" id="charge"><br><br>

            <select name="customer" id="customer" class="form-control">
                @forelse ($customers as $customer)
                    <option value="{{ $customer->id }}">CLIENTE {{ $customer->name }}</option>
                    @empty
                    No hay clientes apuntados
                @endforelse
            </select>
            
            <select name="user" id="user" class="form-control">
                @forelse ($users as $user)
                    <option value="{{ $user->id }}">usuario {{ $user->name }}</option>
                    @empty
                    No hay clientes apuntados
                @endforelse
            </select>

            crear desplegable para elegir el cliente que se le hace la venta y luego cambiarlo en el controlador

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>

    <div class="row align-items-center">
        @forelse ($customers as $customer)

            <div class="col-6 col-sm-4">

            
                <p>Tipo: {{$customer->name}}</p>
                <p>Cargo: {{$customer->surname}}</p>
                
            </div>


        @empty
            No hay clientes apuntados
        @endforelse
    </div>

@endsection