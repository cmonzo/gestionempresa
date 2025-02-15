@extends('layaout')

@section('titulo')
    <h1 class="display-1">AULAS</h1>

@section('contenido')
    <div class="rooms">
        @forelse ($room as $roo)
        
    <div>
    
            {{-- {{$team->name}} {{$team->id}} --}}
            <strong>Nombre: <a href="{{route('rooms.show',$roo->id)}}">{{$roo->name}} {{$roo->id}}</a></strong>
            {{$user->team->id}}
    </div>       
    
    
    @empty
        No hay aulas apuntados
    @endforelse
    
    </div>

    
@endsection