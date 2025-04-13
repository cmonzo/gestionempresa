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
                    <p>LOCALIZADOR: {{$sale->locator}}</p>
                    <p>TIPO: {{$sale->type}}</p>
                    <p>PRECIO NETO: {{$sale->net}}€</p>
                    <p>COMISION: {{$sale->commission}}€</p>
                    <p>PVP: {{$sale->net + $sale->commission}}€</p>
                    <p>COMENTARIO: {{$sale->comment}}</p>
                    <p>VENDEDOR: {{$sale->user->name}}</p>
                    <p>Cliente: {{$sale->customer->name}} {{$sale->customer->surname}}</p>
                </div>


            @empty
                No hay clientes apuntados
            @endforelse
        </div>
    </div>

    <a href="{{ route('sales.create') }}" class="btn btn-custom">
        CREAR VENTA
    </a>
@endsection