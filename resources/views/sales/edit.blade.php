@extends('layaout')

@section('titulo')
   {{-- <h1 class="display-1">ACTUALIZAR VENTA</h1>--}}

@section('contenido')
<form action="{{route('sales.update',$sale->id)}}" method="POST">
    @csrf
    @method('put')
    <label for="type">TIPO:</label><br>
    <input type="text" name="type" id="type"><br>

    <label for="net">PRECIO NETO</label><br>
    <input type="number" name="net" id="net" min="1" step="0.01"><br><br>

    <label for="commission">COMISION</label><br>
    <input type="number" name="commission" id="commission" min="1" step="0.01"><br><br>

    <label for="comment">COMENTARIO:</label><br>
    <input type="text" name="type" id="type"><br>

    <select name="customer" id="customer" class="form-control">
        @forelse ($customers as $customer)
            <option value="{{ $customer->id }}">CLIENTE {{ $customer->name }}</option>
            @empty
            No hay clientes apuntados
        @endforelse
    </select>


    <input type="submit" name="eviar" value="Enviar">
</form>

    
@endsection