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
    

    
    {{--NOMBRE:<br>{{$user->name}} <br>--}}
    {{-- EDITAR EQUIPO: <a href="{{route('users.edit',['team' => $user->name])}}">editar</a> <br> --}}
    

        
        {{-- @if($event->users->contains(Auth::user()))
            <a href="{{route('desapuntar',$event)}}">Desapuntarme</a>
        @else
            <a href="{{route('apuntar',$event)}}">Apuntarme</a>
        @endif --}}
    
    {{-- @forelse ($team->users as $user)
        
    <div class="player">
        @if(Auth::check())
            {{$user->name}} <br>
        @endif    

    </div>
    
    <div class="gamer">
        {{$user->name}}
        {{$user->number}}

    </div>
    @empty
        No hay jugadores apuntados
    @endforelse --}}
    
    </div>
    {{-- <form action="{{route('users.destroy',$user->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="eliminar">
</form> --}}
</div>
    
@endsection