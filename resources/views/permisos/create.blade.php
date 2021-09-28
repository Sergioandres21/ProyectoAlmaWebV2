<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración permisos</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">

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
            <li>
                <a href="dashboard.html"><i class="icon ion-md-home mr-2"></i>Panel de control</a>
            </li>
            <li>
                <a href="ProcesoAgenda.html"><i class="icon ion-md-calendar lead mr-2"></i>Agenda</a>
            </li>
            <li class="active">

                {{-- Mostrar botones de acuerdo al rol --}}
                @can('admin.users')
                    
                <a href="{{route('admin.users')}}"><i class="icon ion-md-people lead mr-2"></i>Clientes</a>

                @endcan

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

    <!-- Page Content  -->
    <div id="content">

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

                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrador
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="PerfilAdmin.html">Mi perfil <i
                                        class="icon ion-md-person lead mr-2"></i></a>
                                <a class="dropdown-item" href="../Configuracion/indexconfiguracion.html">Configuración <i
                                        class="icon ion-md-settings lead mr-2"></i></a>
                                <a class="dropdown-item" href="../CuentaUsuario/usuario.html">Cuentas usuario <i
                                        class="icon ion-md-people lead mr-2"></i></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../Index.php">Cerrar sesión <i
                                        class="icon ion-md-power lead mr-2"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <h3 class='text-center'>Crear nuevo permiso</h3>
        </header>

        <div class="card">
            <div class="card-body">

                @if (session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @endif
                
                <form action="{{ route('permisos.store') }}" method="POST">
                    
                    @csrf

                    <div class="col">
                    <label>Nombre:</label>
                        <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del permiso" autofocus>
                        @if ($errors->has('name'))
                        <span class="error text-danger mt-2" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label>Descripción:</label>
                            <input type="text" class="form-control" name="description" placeholder="Ingrese la descripción del permiso" autofocus>
                            @if ($errors->has('description'))
                                <span class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                            @endif
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                    </div>    
                </form>
            </div>
        </div>

<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
            
<script>
    $(document).ready(function(){
        $('#usuarios').DataTable({
            "language": {
                    "url": '/libs/datatables/spanish.json',
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});
</script>

