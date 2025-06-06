@extends('layaout')

@section('titulo')
{{--<h1 class="display-1">VENTAS</h1>--}}

@section('contenido')
  <div class="container text-center">
    <div class="row align-items-center">
    <form action="{{route('showSaleClient')}}" method="POST">
      @csrf
      <label for="worker">Empleado o cliente:</label><br>
      <input type="text" name="worker" id="worker"><br>

      <input type="submit" name="enviar" value="Buscar">
    </form>
    <table style="width:100%">
      <caption>VENTAS 2025</caption>
      <thead>
      <tr>
        <th>LOCALIZADOR</th>
        <th>TIPO</th>
        <th>PRECIO NETO</th>
        <th>COMISION</th>
        <th>PRECIO DE VENTA</th>
        <th>COMENTARIO</th>
        <th>VENDEDOR</th>
        <th>CLIENTE</th>
        <th>SERVICIO</th>
        <th>FECHA DE CREACION</th>
        <th>FECHA DE MODIFICACION</th>
      </tr>
      </thead>
      <tbody>
      @forelse ($sales as $sale)

      <tr>
      <td> <a href="{{route('sales.show', $sale->id)}}">{{$sale->locator}}</a></td>
      <td>{{$sale->type}}</td>
      <td>{{$sale->net}}€</td>
      <td>{{$sale->commission}}€</td>
      <td>{{$sale->net + $sale->commission}}€</td>
      <td>{{$sale->comment}}</td>
      <td>{{$sale->user->name}} {{$sale->user->surname}}</td>
      <td>{{$sale->customer->name}} {{$sale->customer->surname}}</td>
      <td> <a href="{{route('services.show', $sale->service->id)}}">{{$sale->service->type}}</a></td>
      <td>{{$sale->created_at}}</td>
      <td>{{$sale->updated_at}}</td>
      </tr>





    @empty
      No hay clientes apuntados
    @endforelse
      </tbody>
      <tfoot>
      <tr>
        <td colspan="3"></td>
      </tr>
      </tfoot>
    </table>

    </div>
  </div>

  <a href="{{ route('sales.create') }}" class="btn btn-custom">
    CREAR VENTA
  </a>
@endsection