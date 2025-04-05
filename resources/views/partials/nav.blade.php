<nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">#</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('indice')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('services.index')}}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.account')}}">Mi cuenta</a>
                    </li>
                    @if(Auth::user()->rol == 'worker')

                    @elseif(Auth::user()->rol == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('registro')}}">Registrar empleado</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Cerrar Sesión</a>
                    </li>
                @else

                @endif
            </ul>
        </div>
    </div>
</nav>