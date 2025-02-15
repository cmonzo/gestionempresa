@extends('layaout')

@section('titulo')
    <h1 class="display-1">INICIO</h1>

@section('contenido')
    
    
    <div class="inicio">
       BIENVENDIO
       @if(Auth::check())
            {{Auth::user()->name}}
        @else
            
       @endif
        <br>Bienvenido a GESTION<br>
        

    </div>
    <div class="slider">
        <div class="slides">
            <!-- Cada "div" dentro de "slides" es una imagen del slider -->
            <div class="slide"><img src="img/hotel.jpg" alt="hotel"></div>
            <div class="slide"><img src="img/traslado.jpg" alt="traslado"></div>
            <div class="slide"><img src="img/vuelo.jpg" alt="vuelo"></div>
        </div>
    </div>

    <script src="js/slider.js"></script>
    
@endsection