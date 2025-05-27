<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('titulo') Carlos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <header class="text-center">


        GESTIÓN EMPRESA
        {{--<div class="language-switcher">
            <form action="{{ route('locale.change') }}" method="GET">
                <select onchange="window.location.href='{{ route('locale.change', '') }}/'+this.value">
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                </select>
            </form>
        </div>--}}
    </header>
    @include('partials.nav')

    <main>
        @yield('contenido')
        
    </main>
    <footer>
        @include('partials.pie')
    </footer>
</body>

</html>