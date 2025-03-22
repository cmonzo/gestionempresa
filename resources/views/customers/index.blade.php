@extends('layaout')

@section('titulo')
<h1 class="display-1">CLIENTES</h1>

@section('contenido')
    <div class="container text-center">
        <div class="row align-items-center">
            @forelse ($customers as $customer)

                <div class="col-6 col-sm-4">

                    <strong>Cliente: <a href="{{route('customers.show', $customer->id)}}">{{$customer->name}}
                            {{$customer->id}}</a></strong>
                    <p>NOMBRE: {{$customer->name}}</p>
                    <p>APELLIDOS: {{$customer->surname}}</p>
                    <p>NIF: {{$customer->nif}}</p>
                    <p>TELEFONO: {{$customer->phone}}</p>
                </div>


            @empty
                No hay clientes apuntados
            @endforelse
        </div>
    </div>


@endsection