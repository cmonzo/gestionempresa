@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">PROVEEDORES</h1>--}}

@section('contenido')
    <div class="container text-center">
        <div class="row align-items-center">
            @forelse ($suppliers as $supplier)

                <div class="col-6 col-sm-4">

                    <strong>Servicio: <a href="{{route('suppliers.show', $supplier->id)}}">{{$supplier->name}}
                            </a></strong>
                    <p>NOMBRE: {{$supplier->name}}</p>
                    <p>TELEFONO: {{$supplier->phone}}</p>
                    <p>CIF: {{$supplier->cif}}</p>
                    <p>DIRECCIÓN: {{$supplier->adress}}</p>
                </div>


            @empty
                No hay proveedores apuntados
            @endforelse
        </div>
    </div>

    <a href="{{ route('suppliers.create') }}" class="btn btn-custom">
        CREAR PROVEEDOR
    </a>
@endsection