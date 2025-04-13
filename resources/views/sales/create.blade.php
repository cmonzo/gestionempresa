@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">CREAR VENTA</h1>--}}

@section('contenido')
    <div class="crear">
        <form action="{{route('sales.store')}}" method="POST">
            @csrf

            <label for="type">TIPO:</label><br>
            <input type="text" name="type" id="type"><br>

            <label for="net">PRECIO NETO</label><br>
            <input type="number" name="net" id="net" min="1" step="0.01"><br><br>

            <label for="commission">COMISION</label><br>
            <input type="number" name="commission" id="commission" min="1" step="0.01"><br><br>

            <label for="comment">COMENTARIO:</label><br>
            <input type="text" name="comment" id="comment"><br>

            <select name="customer" id="customer" class="form-control">
                @forelse ($customers as $customer)
                    <option value="{{ $customer->id }}">CLIENTE {{ $customer->name }}</option>
                    @empty
                    No hay clientes apuntados
                @endforelse
            </select>

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>

    <div class="row align-items-center">
        
    </div>

@endsection