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
                <h4>Configuración</h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="indexconfiguracion.html"><i class="icon ion-md-home mr-2"></i>Inicio</a>
                </li>
                <li>
                    <a href="configuracionDepartamento.html"><i class="icon ion-md-train mr-2"></i>Departamentos</a>
                </li>
                <li>
                    <a href="configuracionMunicipio.html"><i class="icon ion-md-bus mr-2"></i>Municipios</a>
                </li>
                <li>
                    <a href="configuracionPedidos.html"><i class="icon ion-md-cart lead mr-2"></i>Pedidos</a>
                </li>
                <li>
                    <a href="configuracionAgenda.html"><i class="icon ion-md-calendar mr-2"></i>Agenda</a>
                </li>

                <li class="active">
                    <a href="#homeFirstmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="icon ion-md-document mr-2"></i>Permisos</a>
                    <ul class="collapse list-unstyled" id="homeFirstmenu">
                        <li>
                            <a href="configuracionPermisos.html">Permisos</a>
                        </li>
                        <li>
                            <a href="configuracionPermisoRol.html">Permisos del rol</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="icon ion-ios-pricetags mr-2"></i>Productos</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="configuracionTipoproducto.html">Tipo de producto</a>
                        </li>
                        <li>
                            <a href="configuracionUnidadMedida.html">Unidad de medida</a>
                        </li>
                        <li>
                            <a href="configuracionMarcaproducto.html">Marca de producto</a>
                        </li>
                        <li>
                            <a href="configuracionTarifiaproducto.html">Tarifa de producto</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="configuracionRoles.html"><i class="icon ion-md-contacts mr-2"></i>Roles</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="icon ion-md-clipboard lead mr-2"></i>Servicios</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="configuracionTiposervicio.html">Tipo de servicio</a>
                        </li>
                        <li>
                            <a href="configuracionTarifaservicio.html">Tarifa de servicio</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="configuracionCentroestetica.html"><i class="icon ion-md-browsers mr-2"></i>Razón social</a>
                </li>
                <li>
                    <a href="formulariosHome.html"><i class="icon ion-md-desktop mr-2"></i>Home formularios</a>
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
                                <a class="nav-link text-dark" href="../Procesos/dashboard.html">Inicio</a>
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
                                <a class="nav-link text-dark dropdown-toggle" href="#"
                                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Administrador
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../Procesos/PerfilAdmin.html">Mi perfil <i
                                            class="icon ion-md-person lead mr-2"></i></a>
                                    <a class="dropdown-item" href="indexconfiguracion.html">Configuración <i
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
                <h3 class='text-center'></h3>
            </header>


            <div class="text-center">
                <h2>Lista de Permisos</h2>
            </div>

            @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
            @endif
    
            <div class="table-responsive">
                <a class="btn btn-secondary btn-sm float-right" href="{{route('permisos.create')}}">Nuevo Permiso</a>
                <table id="permisos" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del permiso</th>
                            <th>Descripción</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                       @forelse ($permissions as $permission)
                           <tr>
                               <td>{{$permission->id}}</td>
                               <td>{{$permission->name}}</td>
                               <td>{{$permission->description}}</td>
                            
                               <td width="td-actions text-right">
                                <a href="{{route('permisos.show', $permission->id)}}" class="btn btn-info">Ver</a>

                                   <a href="{{route('permisos.edit', $permission->id)}}" class="btn btn-sm btn-primary">Editar</a>

                                   <form action="{{route('permisos.destroy', $permission->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                       <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                   </form>
                               </td>
                           </tr>
                           @empty 
                           <h1>No existen permisos registrados</h1>
                       @endforelse
                    </tbody>
                </table>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                <script
                    src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    crossorigin="anonymous"></script>

                <!--Libreria para alertas-->
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                <script>
                    $(document).ready(function () {
                        $('#sidebarCollapse').on('click', function () {
                            $('#sidebar').toggleClass('active');
                        });
                    });
                </script>

</body>

</html>