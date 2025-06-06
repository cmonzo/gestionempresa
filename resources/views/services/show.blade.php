@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">SERVICIO {{$service->type}}</h1>--}}

@section('contenido')
    <div class="service cm-service">
        <div>
            TIPO:{{$service->type}}<br>
            IVA:{{$service->iva}}<br>
            <img src="{{ Storage::url('images/' . $service->photo) }}" alt="fotoproducto" style="width: 50%">
            <div>
                <p>PROVEEDORES</p>
                <p>@forelse ($service->suppliers as $supplier)

                    <div class="col-6 col-sm-4">
                        <p>NOMBRE: {{$supplier->name}}</p>
                        <p>TELEFONO: {{$supplier->phone}}</p>
                        <p>CIF: {{$supplier->cif}}</p>
                        <p>DIRECCION: {{$supplier->adress}}</p>
                    </div>


                @empty
                    No hay proveedores apuntados
                @endforelse</p>
            </div>

            @if(Auth::check())
                <a href="{{route('services.edit', $service->id)}}" class="btn btn-custom">
                    MODIFICAR SERVICIO
                </a>
            @endif

            @if(Auth::user()->rol == 'admin')
                <form action="{{route('services.destroy', $service->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="eliminar servicio" class="btn btn-custom">
                </form>
            @endif

        </div>
    </div>

@endsection