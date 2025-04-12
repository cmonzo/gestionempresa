@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">VENTAS</h1>--}}

@section('contenido')
    <div class="container text-center">
        <div class="row align-items-center">
            @forelse ($sales as $sale)

                <div class="col-6 col-sm-4">

                    <strong>Venta: <a href="{{route('sales.show', $sale->id)}}">{{$sale->type}}
                            {{$sale->id}}</a></strong>
                    <p>Tipo: {{$sale->type}}</p>
                    <p>Cargo: {{$sale->charge}}</p>
                    <p>Vendedor: {{$sale->user->name}}</p>
                    <p>Cliente: {{$sale->customer->name}} {{$sale->customer->surname}}</p>
                </div>


            @empty
                No hay clientes apuntados
            @endforelse
        </div>
    </div>


@endsection