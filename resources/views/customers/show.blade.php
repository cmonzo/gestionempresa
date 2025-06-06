@extends('layaout')

@section('titulo')
    {{--<h1 class="display-1">CLIENTE {{$customer->name}} {{$customer->surname}}</h1>--}}

@section('contenido')
<div class="service">   
<div>
   {{$customer->name}} {{$customer->surname}}<br>
   {{$customer->nif}}<br>
   {{$customer->adress}}<br>
   {{$customer->phone}}<br>
     @if(Auth::check())
                <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-custom">
                    MODIFICAR CLIENTE
                </a>
            @endif
</div>
    
@endsection