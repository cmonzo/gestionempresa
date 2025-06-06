@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">PROVEEDOR {{$supplier->name}}</h1>--}}



@section('contenido')
    <div class="service">
        <div>
            <p>NOMBRE: {{$supplier->name}}</p>
            <p>TELEFONO: {{$supplier->phone}}</p>
            <p>CIF: {{$supplier->cif}}</p>
            <p>DIRECCIÓN: {{$supplier->adress}}</p>
            <p>SERVICIOS</p>
            <div class="row align-items-center">
            @forelse ($supplier->services as $service)

                <div class="col-6 col-sm-4">

                    <strong>Servicio: <a href="{{route('services.show', $service->id)}}">{{$service->type}}
                            </a></strong>
                    <p>IVA: {{$service->iva}}</p>
                    <p><img src="{{ Storage::url('images/'.$service->photo) }}" alt="fotoproducto" style="width: 50%"></p>
                </div>


            @empty
                No hay servicios apuntados
            @endforelse
        </div>
           
        </div>
         @if(Auth::check())
    <a href="{{route('suppliers.edit', $supplier->id)}}" class="btn btn-custom">
        MODIFICAR PROVEEDOR
    </a>
    @endif
   
     @if(Auth::user()->rol == 'admin')
            <form action="{{route('suppliers.destroy', $supplier->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="eliminar proveedor" class="btn btn-custom">
            </form>
        @endif
    </div>

@endsection