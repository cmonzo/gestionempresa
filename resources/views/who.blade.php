@extends('layaout')

@section('titulo')
<h1 class="display-1">INICIO</h1>

@section('contenido')


    <div class="who">
        <p> En Gestión Empresa, nos apasiona transformar tus viajes en experiencias inolvidables. Somos una agencia
            especializada en la organización y gestión de viajes corporativos, turísticos y de negocios, diseñados para
            adaptarse a las necesidades de cada cliente. Con años de experiencia en el sector, nos hemos consolidado como un
            referente en la industria, ofreciendo soluciones integrales que combinan eficiencia, calidad y un servicio
            personalizado.</p>

        <p> Nuestra misión es simplificar la planificación de tus viajes, permitiéndote disfrutar al máximo de cada destino
            mientras nosotros nos encargamos de todos los detalles. Desde la reserva de vuelos y alojamientos hasta la
            organización de itinerarios completos, en Gestión Empresa nos comprometemos a brindarte un servicio impecable
            que supere tus expectativas.</p>

        <p>¿Por qué elegirnos?
            <ul>

                <li> Experiencia y profesionalismo: Contamos con un equipo de expertos en viajes que conocen cada rincón del
                    mundo y están dispuestos a asesorarte en cada paso.</li>

                <li>Soluciones a medida: Entendemos que cada viaje es único, por eso diseñamos planes personalizados que se
                    ajustan a tus requerimientos y presupuesto.</li>

                <li>Tecnología innovadora: Utilizamos herramientas avanzadas para garantizar la mejor gestión de tus
                    reservas y viajes, ofreciéndote transparencia y seguridad en cada transacción.</li>

                <li>Compromiso con el cliente: Tu satisfacción es nuestra prioridad. Trabajamos con dedicación para
                    asegurarnos de que cada experiencia sea excepcional.</li>
            </ul>
        </p>
        <p> En Gestión Empresa, no solo organizamos viajes; creamos conexiones, facilitamos oportunidades y construimos
            recuerdos que perduran. Ya sea que estés planeando un viaje de negocios, una escapada de fin de semana o una
            aventura internacional, estamos aquí para hacerlo posible.</p>

        <p>Descubre la diferencia de viajar con profesionales. Bienvenido a Gestión Empresa, tu aliado en cada viaje.</p>

        <p>Contacta con nosotros hoy mismo y comienza a planificar tu próxima gran experiencia.</p>

    </div>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif


@endsection