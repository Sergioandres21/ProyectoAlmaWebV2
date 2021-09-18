@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

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
            <li class="active">
                <a href="configuracionPedidos.html"><i class="icon ion-md-cart lead mr-2"></i>Pedidos</a>
            </li>
            <li>
                <a href="configuracionAgenda.html"><i class="icon ion-md-calendar mr-2"></i>Agenda</a>
            </li>

            <li>
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

{{-- Registrar estado de pedido --}}

                <div class="modal fade" id="RegistrarEstadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Registrar estado de pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre del estado del pedido:</label>
                                                <input type="text" class="nombre form-control" id="nombre"
                                                    name="nombre">
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="estadoPedido" class="col-form-label">Estado:</label>
                                            <select name="estadoPedido" id="estadoPedido" class="estadoPedido form-control">
                                                <option value="">Seleccionar...</option>
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success add_estado">Guardar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- EditEstadomodal --}}

                <div class="modal fade" id="EditEstadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar estado de pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">

                                    <ul id="updateform_errList"></ul>
                                    <input type="hidden" id="edit_esta_id">
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre del estado del pedido:</label>
                                                <input type="text" class="edit_nombre form-control" id="edit_nombre"
                                                    name="edit_nombre">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="estado" class="col-form-label">Estado:</label>
                                                <select name="edit_estadoPedido" id="edit_estadoPedido" class="edit_estadoPedido form-control">
                                                    <option value="">Seleccionar...</option>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success editar_estado">Actualizar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- Delete-Estadomodal --}}

            <div class="modal fade" id="EliminarEstadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Eliminar estado de pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">

                                    <input type="hidden" id="eliminar_esta_id">
                                    <h4>¿Estás seguro que deseas eliminar este registro?</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger eliminar_estado_btn">Si, eliminar</button>
                                </div>
            
                        </div>
                    </div>
            </div>


    <div class="container">

        <div class="text-center">
            <h4>Estado de pedidos</h4>
        </div>

    <div class="container caja">
        <div class="table-responsive">
                    <table class="table table-striped table-hover" id="estadoP">
                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                            data-target="#RegistrarEstadoModal">
                            <i class="icon ion-md-add mr-2"></i>Registrar estado
                        </button>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE ESTADO</th>
                                <th>ESTADO</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('ajax/estado-pedidos/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

<script>

</script>
    
@endsection