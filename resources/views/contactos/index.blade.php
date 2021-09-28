<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet"> 

  <!-- Ionic icons -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../Public/Imagenes/A.png" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">

  <title>Configuración</title>
</head>


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
            <li class="active">
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

{{--         <div id="content" class="bg-white w-100">

            <div class="col-sm-10 offset-sm-1 text-center">
                <header>
                    <h1 class='text-center display-5'>Configuración información de contacto</h1>
                </header>
                <div style="margin-top: 35px;">
                    <form  id="formulario" name="formulario">
                        <div class="form-group">
                            <label for="numero">Link número de whatsapp <i
                                    class="icon ion-logo-whatsapp mr-3"></i></label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Link">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico <i class="icon ion-md-mail mr-3"></i></label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Dirección de email">
                        </div>

                        <div class="form-group">
                            <label for="instagram">Instagram <i class="icon ion-logo-instagram mr-3"></i></label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                placeholder="Instagram">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción - información adicional</label>
                            <textarea class="form-control" id="descripcion" rows="4" name="descripcion"
                                placeholder="Descripcion"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success mr-4" id="Guardar">Guardar</button>
                            <button type="button" class="btn btn-dark mr-4">Cancelar</button>
                            <button type="button" class="btn btn-info" onclick="limpiarCampos();" id="limpiar">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

        {{-- EditEstadomodal --}}

        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar Redes sociales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                    <div class="modal-body">
                        <ul id="updateform_errList"></ul>

                        <input type="hidden" id="registro_id">

                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_whatsapp" class="edit_whatsapp col-form-label">Link Whatsapp:</label>
                                <input type="text" id="edit_whatsapp" class="edit_whatsapp form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_email" class="edit_email col-form-label">Email:</label>
                                <input type="text" id="edit_email" class="edit_email form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_instagram" class="col-form-label">Link instagram:</label>
                                <input type="text" id="edit_instagram" class="edit_instagram form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_descripcion" class="col-form-label">Descripción:</label>
                                <textarea class="form-control" id="edit_descripcion" name="edit_descripcion" rows="4">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success editar_contacto">Actualizar</button>
                    </div>

            </div>
        </div>
    </div>

    <div class="container caja">   

        <div class="text-center">
            <h2>Registro página principal</h2>
        </div>


                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>WHATSAPP</th>
                                <th>EMAIL</th>
                                <th>INSTAGRAM</th>
                                <th>DESCRIPCION</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
          integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
          crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
  
        <!--Libreria para alertas-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
        <!-- Abrir / cerrar menu -->
        <script>
          $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
            });
          });
        </script>

    <script type="text/javascript" src="{{ asset('ajax/contacto/script.js') }}"></script>
  
  </body>
  
  </html>