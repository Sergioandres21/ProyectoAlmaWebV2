<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Iniciar Sesión - AlmaWeb</title>
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{ asset('css/login/style.css') }}" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />    
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
                            <a class="nav-link" href="login.php"><ion-icon name="log-in-outline" class="mr-2"></ion-icon>Iniciar sesión</a>
                        </li>
                    </ul>
          </div>
        </div>
      </nav>

      <section class="vh-100 ff-login">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="ff-login-box">
                <form method="POST" action="{{ route('login') }}">

                    @csrf

                  <h3 class="text-center font-weight-light text-uppercase">Login</h3>
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  <div class="custom-control custom-checkbox ml-4 mt-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Recordarme') }}
                    </label>
                  </div>

            
                  <div class="pie-form">
                    <div class="text-center">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    </div>
                    <div class="col-12 text-center mb-2">
                      <a href="Olvidousuario.html">¿Olvidaste tu usuario?</a>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-lg mt-3 mb-2 ff-login-btn font-weight-bold">
                    {{ __('Ingresar') }}
                </button>

                <div class="col-12 text-center">
                    <p>¿No tiene una cuenta de AlmaWeb?</p>
                    <a href="{{route('register')}}" class="boton-regis btn-lg">Registrarme</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    

{{--     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>

