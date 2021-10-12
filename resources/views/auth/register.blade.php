<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/registro/estilo.css') }}" rel="stylesheet">

    <!-- Ionic icons-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../Public/Imagenes/A.png" />


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar">
        <div class="container">
            <img src="../Public/Imagenes/logo3.png" class="logo-brand" alt="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../Index.php"><ion-icon name="home-outline" class="mr-2"></ion-icon>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Servicios/indexservicio.html"><ion-icon name="bookmarks-outline" class="mr-2"></ion-icon>Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Productos/Productos.html"><ion-icon name="bag-handle-outline" class="mr-2"></ion-icon>Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Index.php #nosotros"><ion-icon name="accessibility-outline" class="mr-2"></ion-icon>Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Index.php #contact"><ion-icon name="at-circle-outline" class="mr-2"></ion-icon>Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Productos/carrito.html">
                                <ion-icon name="cart-outline" class="mr-2"></ion-icon>Carrito
                        </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Login/login.php"><ion-icon name="log-in-outline" class="mr-2"></ion-icon>Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="contact-form-section" class="form-content-wrap seccion">
        <div class="container">
            <div class="row">
                <div class="tab-content">
                    <div class="col-sm-12">
                        <div class="item-wrap">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="item-content colBottomMargin">
                                        <div class="item-info">
                                            <h2 class="item-title text-center">Formulario de registro usuario</h2>

                                        </div>
                                        <!--End item-info -->

                                    </div>
                                    <!--End item-content -->
                                </div>
                                <!--End col -->


                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label for="tipo usuario">Tipo Usuario</label>
                                                
                                                <select class="custom-select" name="tipo" id="tipo" @error('tipo') is-invalid @enderror name="tipo" value="{{ old('tipo') }}">
                                                    <option value="">Seleccionar...</option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Usuario</option>
                                                    <option value="3">Profesional</option>
                                                </select>
                                                @error('tipo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="name">Nombres*</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="apellido">Apellidos*</label>
                                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autofocus>

                                            @error('apellido')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="email">Email*</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="celular">Celular*</label>
                                            <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autofocus>

                                            @error('celular')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="contrasena">Contraseña*</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="contrasena2">Repetir contraseña*</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="estado">Estado</label>
                                            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}">
                                                <option value="">Seleccionar...</option>
                                                <option value="1">Activo</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="imagen">Imagen de usuario (opcional)</label>
                                            <input type="file" accept=".jpg,.png,.jpeg" class="form-control-file"
                                                id="imagen" placeholder="Seleccione una foto" name="imagen" disabled>
                                        </div>

                                        <div class="form-group last col text-center">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                {{ __('Registrar') }}
                                            </button>
                                            <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Volver al inicio</a>
                                        </div>

                                    </div>
                                </form>

                                <!-- Optional JavaScript -->
                                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                                    crossorigin="anonymous"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                                    crossorigin="anonymous"></script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                                    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                                    crossorigin="anonymous"></script>

                                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</body>

</html>
