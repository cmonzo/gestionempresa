@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">CREAR SERVICIO</h1>--}}

@section('contenido')
    <div class="crear">
        {{--<form action="{{route('services.store')}}" method="POST">
            @csrf

            <label for="type">Nombre del servicio:</label><br>
            <input type="text" name="type" id="type"><br>

            <label for="iva">Localización</label><br>
            <input type="number" name="iva" id="iva"><br>

            
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*">

            <input type="submit" name="enviar" value="Enviar">
        </form>--}}
        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" accept="image/*">

            <label for="type">Nombre del servicio:</label><br>
            <input type="text" name="type" id="type"><br>

            <label for="iva">IVA</label><br>
            <input type="number" name="iva" id="iva"><br>

            <select name="supplier_id" id="supplier_id" class="form-control">
                @forelse ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">PROVEEDOR {{ $supplier->name }}</option>
                    @empty
                    No hay proveedores apuntados
                @endforelse
            </select>

            <button type="submit">Enviar</button>
        </form>
    </div>

@endsection