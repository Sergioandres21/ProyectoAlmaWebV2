<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal usuario</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/usuario/estilo.css') }}" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../Public/Imagenes/A.png" />
    
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Tablero</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.html"><i class="icon ion-md-home mr-2"></i>Inicio</a>
                </li>
                <li>
                    <a href="pedido.html"><i class="icon ion-md-cart mr-2"></i>Mis pedidos</a>
                </li>
                <li>
                    <a href="boletaPago.html"><i class="icon ion-logo-usd mr-2"></i>Mis boletas de pago</a>
                </li>
                <li>
                    <a href="agenda.html"><i class="icon ion-md-calendar mr-2"></i>Mis agendas</a>
                </li>
                <li>
                    <a href="perfil.html"><i class="icon ion-md-contact mr-2"></i>Mi perfíl</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <div class="container">
                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
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
                                <a class="nav-link text-dark" href="index.html">Inicio</a>
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

            <header>
                <h3 class='text-center'></h3>
            </header>

            <!--https://bootsnipp.com/snippets/aMVZE-->

            <div class="jumbotron">
                <div class="row w-100">
                    <div class="col-md-3">
                        <div class="card border-info mx-sm-1 p-3">
                            <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-car"
                                    aria-hidden="true"></span></div>
                            <div class="text-info text-center mt-3">
                                <h4>Próxima cita</h4>
                            </div>
                            <div class="text-info text-center mt-2">
                                <h1>22/06/2021</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-success mx-sm-1 p-3">
                            <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye"
                                    aria-hidden="true"></span></div>
                            <div class="text-success text-center mt-3">
                                <h4>Número de pedidos</h4>
                            </div>
                            <div class="text-success text-center mt-2">
                                <h1>5</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger mx-sm-1 p-3">
                            <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-heart"
                                    aria-hidden="true"></span></div>
                            <div class="text-danger text-center mt-3">
                                <h4>Agendas pendientes</h4>
                            </div>
                            <div class="text-danger text-center mt-2">
                                <h1>6</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-warning mx-sm-1 p-3">
                            <div class="card border-warning shadow text-warning p-3 my-card"><span class="fa fa-inbox"
                                    aria-hidden="true"></span></div>
                            <div class="text-warning text-center mt-3">
                                <h4>Total compras</h4>
                            </div>
                            <div class="text-warning text-center mt-2">
                                <h1>3</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white w-100">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 text-center">

                        <div class="card rounded-0" style="margin-top: 35px;">
                            <div class="card-header bg-light">
                                <h6 class="font-weight-bold mb-0">Productos comprados</h6>
                            </div>
                            <div class="card-body" id="grafico">
                                <canvas id="myChart" width="400" height="130"></canvas>
                            </div>
                        </div>
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

            <script>
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>

            <script>
                // Seleccionar y desactivar check box
                var checkbox = $('table tbody input[type="checkbox"]');
                $("#selectAll").click(function () {
                    if (this.checked) {
                        checkbox.each(function () {
                            this.checked = true;
                        });
                    } else {
                        checkbox.each(function () {
                            this.checked = false;
                        });
                    }
                });
                checkbox.click(function () {
                    if (!this.checked) {
                        $("#selectAll").prop("checked", false);
                    }
                });
            </script>

            <script>

                /*Página para sacar los gráficos, https://www.chartjs.org/*/
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Mar 2021', 'Abr 2021', 'May 2021', 'Jun 2021'],
                        datasets: [{
                            label: 'Número de productos comprados',
                            data: [20, 35, 15, 5],
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