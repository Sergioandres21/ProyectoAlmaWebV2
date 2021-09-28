<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio - administrador</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/dashboard/estilo.css') }}" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../Public/Imagenes/A.png" />

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <title>Index administrador</title>
</head>

<body>

    <div class="d-flex">

        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Tablero</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="dashboard.html"><i class="icon ion-md-home mr-2"></i>Panel de control</a>
                </li>
                <li>
                    <a href="ProcesoAgenda.html"><i class="icon ion-md-calendar lead mr-2"></i>Agenda</a>
                </li>
                <li>
                    <a href="ProcesoCliente.html"><i class="icon ion-md-people lead mr-2"></i>Clientes</a>
                </li>
                <li>
                    <a href="informes.html"><i class="icon ion-md-paper lead mr-2"></i>Informes</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="icon ion-md-cart lead mr-2"></i>Productos</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="ProcesoProducto.html"><i class="icon ion-md-pricetags mr-2"></i>Sección
                                Productos</a>
                        </li>
                        <li>
                            <a href="ImagenesProducto.html"><i class="icon ion-md-photos mr-2"></i>Imágenes
                                productos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="ProcesoProveedor.html"> <i class="icon ion-md-person lead mr-2"></i>Proveedores</a>
                </li>
                <li>
                    <a href="ProcesoProfesional.html"> <i class="icon ion-md-contacts lead mr-2"></i>Profesionales</a>
                </li>
                <li>
                    <a href="Reportes.html"> <i class="icon ion-md-clipboard lead mr-2"></i>Reportes</a>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="icon ion-md-cog lead mr-2"></i>Servicios</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="ProcesoServicio.html"><i class="icon ion-md-hand mr-2"></i>Sección Servicios</a>
                        </li>
                        <li>
                            <a href="ImagenServicios.html"><i class="icon ion-md-photos mr-2"></i>Imágenes servicios</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="ProcesoPedidos.html"> <i class="icon ion-logo-dropbox lead mr-2"></i>Pedidos</a>
                </li>
                <li>
                    <a href="Administrador.html"> <i class="icon ion-md-contact lead mr-2"></i>Administrador</a>
                </li>
                <li>
                    <a href="BoletasPago.html"> <i class="icon ion-md-cash mr-2"></i>Boletas de pago</a>
                </li>
            </ul>
        </nav>

        <!-- Inicio del nabvar -->
        <div id="page-content-wrapper" class="w-100 bg-light">

            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <div class="container">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="icon ion-md-list"></i>
                        <span>Mostrar / esconder menú</span>
                    </button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link text-dark" href="dashboard.html">Inicio</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon ion-md-notifications"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <p class="dropdown-item bg-light">Tienes 0 notificaciones</p>
                                    <div class="dropdown-divider"></div>
                                    <p class="dropdown-item bg-secondary text-white">No se recibío ninguna cita</p>
                                </div>
                            </li>

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Bienvenido Administrador</h1>
                                <p class="lead text-muted">Revisa la última información</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Ingresos totales</h6>
                                            <h3 class="font-weight-bold">$50000</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i>
                                                65.5%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Productos activos</h6>
                                            <h3 class="font-weight-bold">100</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i>
                                                40.50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Número de ventas</h6>
                                            <h3 class="font-weight-bold">30</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i> 30%
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Número de clientes</h6>
                                            <h3 class="font-weight-bold">60</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i>10%
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="bg-mix py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Número de pedidos</h6>
                                            <h3 class="font-weight-bold">5</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i>
                                                50.50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Número de citas activas</h6>
                                            <h3 class="font-weight-bold">15</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i>
                                                25.50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Servicios activos</h6>
                                            <h3 class="font-weight-bold">14</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i>
                                                75.50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex my-3">
                                        <div class="mx-auto text-center">
                                            <h6 class="text-muted">Citas inactivas</h6>
                                            <h3 class="font-weight-bold">60</h3>
                                            <h6 class="text-warning"><i class="icon ion-md-arrow-dropup-circle"></i>
                                                15.50%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 my-3">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h6 class="font-weight-bold mb-0">Número de citas en los últimos meses</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart" width="300" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 my-3">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h6 class="font-weight-bold mb-0">Ventas recientes</h6>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-cart"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$25000</h6><span
                                                    class="badge badge-warning ml-2">Sin descuento</span>
                                                <small class="d-block text-muted">Cerum de aloe vera</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i>
                                                </h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$20000</h6><span
                                                    class="badge badge-warning ml-2">Sin descuento</span>
                                                <small class="d-block text-muted">Aceite de coco</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-cart"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$25000</h6><span
                                                    class="badge badge-warning ml-2">Sin descuento</span>
                                                <small class="d-block text-muted">Aceite de rosa mosqueta</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i>
                                                </h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$10000</h6><span
                                                    class="badge badge-warning ml-2">Sin descuento</span>
                                                <small class="d-block text-muted">Agua de rosas</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2 mb-3">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-cart"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$20000</h6><span
                                                    class="badge badge-warning ml-2">Sin descuento</span>
                                                <small class="d-block text-muted">Aceite de almendra</small>
                                            </div>
                                        </div>
                                        <a href="informes.html" class="btn btn-primary w-100">Ver todas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <!--Libreria para alertas-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Abrir / cerrar menu -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script>

        /*Página para sacar los gráficos, https://www.chartjs.org/*/
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Feb 2021', 'Mar 2021', 'Abr 2021', 'May 2021'],
                datasets: [{
                    label: 'Citas de los últimos meses',
                    data: [25, 50, 70, 100],
                    backgroundColor: [
                        '#F7CE90',
                        '#F7CE90',
                        '#F7CE90',
                        '#FEDCD2'
                    ],
                    maxBarThickness: 30,
                    maxBarLength: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>
