<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: white">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav w-100 d-flex justify-content-between">
                <li class="nav-item flex-fill text-center">
                    <a class="nav-link" href="{{route('indice')}}">INICIO</a>
                </li>
                <li class="nav-item flex-fill text-center">
                    <a class="nav-link" href="{{route('services.index')}}">SERVICIOS</a>
                </li>
                <li class="nav-item flex-fill text-center">
                    <a class="nav-link" href="{{route('suppliers.index')}}">PROVEEDORES</a>
                </li>
                <li class="nav-item flex-fill text-center">
                    <a class="nav-link" href="{{route('contacto')}}">CONTACTO</a>
                </li>

                @if(Auth::check())
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" href="{{route('sales.index')}}">VENTAS</a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" href="{{route('customers.index')}}">CLIENTES</a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" href="{{route('users.account')}}">MI CUENTA</a>
                    </li>

                    @if(Auth::user()->rol == 'worker')

                    @elseif(Auth::user()->rol == 'admin')
                        <li class="nav-item flex-fill text-center">
                            <a class="nav-link" href="{{route('registro')}}">REGISTRAR EMPLEADO</a>
                        </li>
                        <li class="nav-item flex-fill text-center">
                            <a class="nav-link" href="{{route('users.index')}}">USUARIOS</a>
                        </li>


                    @endif
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" href="{{route('logout')}}">CERRAR SESION</a>
                    </li>
                @else
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>