<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Profesional</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/profesional/estilo.css') }}" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../Public/Imagenes/A.png" />

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <img src="../Public/Imagenes/logo3.png" class="logo-brand" alt="logo">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-dark" href="index.html">Inicio</a>
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

    </nav>

    <div class="container py-5">

        <div class="p-5 bg-white rounded shadow mb-5">
            <!-- Bordered tabs-->
            <ul id="myTab1" role="tablist"
                class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                <li class="nav-item flex-sm-fill">
                    <a id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1"
                        aria-selected="true"
                        class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Inicio</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1"
                        aria-selected="false"
                        class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Citas programadas</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact1-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1"
                        aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Mi
                        perfíl</a>
                </li>
            </ul>
            <div id="myTab1Content" class="tab-content">
                <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                    <h2>Bienvenido Profesional</h2>
                    <p>Revisa la última información sobre tus citas asignadas.</p>
                    <div class="container cards">
                        <div class="row">
                            <div class="col-md-4 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Total de citas</h6>
                                        <h2 class="text-right"><i class="icon ion-md-paper f-left"></i><span>15</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-3">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Citas asignadas</h6>
                                        <h2 class="text-right"><i class="icon ion-md-rocket f-left"></i><span>8</span></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-3">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Próxima cita</h6>
                                        <h4 class="text-right"><i class="icon ion-md-checkbox f-left"></i><span>02/07/2021</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-3">
                                <div class="card bg-c-pink order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Citas canceladas</h6>
                                        <h2 class="text-right"><i class="icon ion-md-sad f-left"></i><span>2</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">

                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col col-lg-6">
                                        <h2>Mis agendas</h2>
                                    </div>
                                    <div class="col col-lg-3">
                                        <button type="button" class="btn btn-light" data-toggle="modal"
                                            data-target="#Registrar"><i class="icon ion-md-calendar mr-2"></i>
                                            Agendar una nueva cita
                                        </button>
                                    </div>
                                    <div class="col col-lg-3">
                                        <div class="search-box">
                                            <i class="icon ion-md-search"></i>
                                            <input type="text" class="form-control" placeholder="Buscar&hellip;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll"></label>
                                            </span>
                                        </th>
                                        <th>Identificador de la agenda</th>
                                        <th>Servicio</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Estado de la agenda</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                <label for="checkbox1"></label>
                                            </span>
                                        </td>
                                        <td>1</td>
                                        <td>Limpieza fácial</td>
                                        <td>Manuela V</td>
                                        <td>21/06/2021</td>
                                        <td>4 Pm</td>
                                        <td>Activa</td>
                                        <td>
                                            <a href="#detalleAgenda" class="#" data-toggle="modal"><i
                                                    class="icon ion-md-eye"></i></a>
                                            <a href="#modificarAgenda" class="#" data-toggle="modal">
                                                <i class="icon ion-md-create"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox2" name="options[]" value="1">
                                                <label for="checkbox2"></label>
                                            </span>
                                        </td>
                                        <td>2</td>
                                        <td>Depilación con cera</td>
                                        <td>Manuela V</td>
                                        <td>23/06/2021</td>
                                        <td>2 Pm</td>
                                        <td>Activa</td>
                                        <td>
                                            <a href="#detalleAgenda" class="#" data-toggle="modal"><i
                                                    class="icon ion-md-eye"></i></a>
                                            <a href="#modificarAgenda" class="#" data-toggle="modal">
                                                    <i class="icon ion-md-create"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                                <label for="checkbox3"></label>
                                            </span>
                                        </td>
                                        <td>3</td>
                                        <td>Masaje de Relajación</td>
                                        <td>Manuela V</td>
                                        <td>20/06/2021</td>
                                        <td>5 Pm</td>
                                        <td>Inactiva</td>
                                        <td>
                                            <a href="#detalleAgenda" class="#" data-toggle="modal"><i
                                                    class="icon ion-md-eye"></i></a>
                                            <a href="#modificarAgenda" class="#" data-toggle="modal">
                                                    <i class="icon ion-md-create"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="clearfix">
                                <div class="hint-text"> Mostrando <b>5</b> de <b>25</b> entradas</div>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#">Anterior</a></li>
                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="Registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="Registrar" id="exampleModalLabel">Formulario de registro agenda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="formulario" id="formulario">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="servicio" class="col-form-label">Servicio:</label>
                                                    <select class="form-control form-control-lg" name="servicio"
                                                        id="servicio">
                                                        <option value="">Seleccionar...</option>
                                                        <option value="limpieza facial">Limpieza facial</option>
                                                        <option value="masaje de relajacion">Masaje de Relajación
                                                        </option>
                                                        <option value="depilacion con cera">Depilación con cera</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="cliente" class="col-form-label">Cliete:</label>
                                                    <select class="form-control form-control-lg" name="cliente"
                                                        id="cliente">
                                                        <option value="">Seleccionar...</option>
                                                        <option>Sergio</option>
                                                        <option>Tatiana</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="fecha" class="col-form-label">Fecha:</label>
                                                    <input type="date" class="form-control" id="fecha" name="fecha">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="hora" class="col-form-label">Hora:</label>
                                                    <input type="time" class="form-control" id="hora" name="hora">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="button" id="Guardar" class="btn btn-success">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="detalleAgenda" tabindex="-1" role="dialog"
                        aria-labelledby="detalleAgenda" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modificar" id="exampleModalLabel">Detalle de la agenda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">


                                        <div id="app" class="col-12">

                                            <h2>Agenda</h2>

                                            <div class="row my-3">
                                                <div class="col-8">
                                                    <h4>Alma centro de estética</h4>
                                                    <p>Yolombó Antioquia</p>
                                                    <p>Correo: almacentroestetica@gmail.com</p>
                                                    <p>Contacto: 3057341600/3106157156</p>
                                                </div>
                                                <div class="col-4">
                                                    <img src="../Public/Imagenes/logo3.png" class="logo-brand" />
                                                </div>
                                            </div>

                                            <hr />

                                            <div class="cond row text-center">
                                                <div class="col-12 mt-3">
                                                    <h5>Fecha de la agenda:</h5>
                                                    <p>28/06/2021</p>
                                                    <h5>Hora de la agenda:</h5>
                                                    <p>2:00 Pm</p>
                                                    <h4>Servicio</h4>
                                                    <p>Limpieza fácial profunda</p>
                                                    <h5>Profesional</h5>
                                                    <p>Manuela Vargas</p>
                                                    <h5>Cliente</h5>
                                                    <p>Andrés Marulanda</p>
                                                    <h5>Correo electrónico</h5>
                                                    <p>andresmarulanda@gmail.com</p>
                                                    <h5>Número de celular</h5>
                                                    <p>3145453432</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modificarAgenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel">Formulario de modificar cita</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="formularioM" id="formularioM">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="servicioM" class="col-form-label">Servicio:</label>
                                                    <select class="form-control form-control-lg" name="servicioM"
                                                        id="servicioM">
                                                        <option value="">Seleccionar...</option>
                                                        <option value="limpieza facial">Limpieza facial</option>
                                                        <option value="masaje de relajacion">Masaje de Relajación</option>
                                                        <option value="depilacion con cera">Depilación con cera</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="clienteM" class="col-form-label">Cliete:</label>
                                                    <select class="form-control form-control-lg" name="clienteM"
                                                        id="clienteM">
                                                        <option value="">Seleccionar...</option>
                                                        <option>Sergio</option>
                                                        <option>Tatiana</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="fechaM" class="col-form-label">Fecha:</label>
                                                    <input type="date" class="form-control" id="fechaM" name="fechaM">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="horaM" class="col-form-label">Hora:</label>
                                                    <input type="time" class="form-control" id="horaM" name="horaM">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="button" id="ActualizarC" class="btn btn-success">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h4 class="text-uppercase text-center">Información de mi perfil</h4>
                        </div>
                        <div class="card-body">
                            <form name="formulario2" id="formulario2">

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="tipo_documento">Tipo de documento</label>
                                        <select class="form-control form-control-sm" name="tipo_documento"
                                            id="tipo_documento">
                                            <option value="">Seleccionar...</option>
                                            <option value="tarjeta de identidad">Tarjeta de identidad</option>
                                            <option value="cedula de ciudadania">Cédula de ciudadanía</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="identificacion">Número de identificación</label>
                                        <input type="text" class="form-control" placeholder="Identificación"
                                            name="identificacion" id="identificacion" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="nombre">Nombres</label>
                                        <input type="text" placeholder="Nombres" class="form-control" name="nombre"
                                            id="nombre" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido">Apellidos</label>
                                        <input type="text" placeholder="Apellidos" class="form-control" id="apellido"
                                            name="apellido" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="correo">Email</label>
                                        <input type="text" class="form-control" placeholder="Correo electrónico"
                                            name="correo" id="correo" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="celular">Número de celular</label>
                                        <input type="number" pattern="^\d{10}$" placeholder="Número"
                                            class="form-control" id="celular" name="celular" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="contrasena">Contraseña</label>
                                        <input type="password" placeholder="Contraseña" class="form-control"
                                            id="contrasena" name="contrasena" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contrasena2">Confirmar contraseña</label>
                                        <input type="password" placeholder="Confirmar contraseña" class="form-control"
                                            id="contrasena2" name="contrasena2" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="Direccion">Dirección de residencia</label>
                                        <input type="text" placeholder="Dirección" class="form-control" id="Direccion"
                                            name="Direccion" />
                                    </div>
                                </div>
                                <div style="margin-top:15px;">
                                    <button type="submit" class="btn btn-light rounded-0 mr-3">Cancelar</button>
                                    <button type="button" class="btn btn-secondary rounded-0"
                                        id="Actualizar">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End bordered tabs -->
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <!--Libreria para alertas-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
