@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">VENTA {{$sale->id}} {{$sale->type}}</h1>--}}

@section('contenido')
<div class="service">   
<div>
    <p>LOCALIZADOR: {{$sale->locator}}</p>
    <p>TIPO: {{$sale->type}}</p>
    <p>PRECIO NETO: {{$sale->net}}€</p>
    <p>COMISION: {{$sale->commission}}€</p>
    <p>PVP: {{$sale->net + $sale->commission}}€</p>
    <p>COMENTARIO: {{$sale->comment}}</p>
    <p>VENDEDOR: {{$sale->user->name}}</p>
    <p>Cliente: {{$sale->customer->name}} {{$sale->customer->surname}}</p>
    <a href="{{route('services.show', $sale->service->id)}}">{{$sale->service->type}}</a>
    
     @if(Auth::check())
    <a href="{{route('sales.edit', $sale->id)}}" class="btn btn-custom">
        MODIFICAR VENTA
    </a>
    @endif
    
    @if(Auth::user()->rol == 'admin')
            <form action="{{route('sales.destroy', $sale->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="eliminar">
            </form>
        @endif
</div>
    
@endsection