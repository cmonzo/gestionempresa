@extends('layaout')

@section('titulo')
<h1 class="display-1">SERVICIOS</h1>

@section('contenido')
    <div class="container text-center">
        <div class="row align-items-center">
            @forelse ($services as $service)

                <div class="col-6 col-sm-4">

                    <strong>Servicio: <a href="{{route('services.show', $service->id)}}">{{$service->type}}
                            {{$service->id}}</a></strong>
                    <p>IVA: {{$service->iva}}</p>
                </div>


            @empty
                No hay servicios apuntados
            @endforelse
        </div>
    </div>


@endsection