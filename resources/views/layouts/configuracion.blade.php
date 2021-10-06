<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alma Web - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('css')
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenes/A.png')}}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>

    <div id="app">
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h4>Configuración</h4>
                </div>
        
                <ul class="list-unstyled components">
                    <li class="{{ request()->routeIs('contacto') ? 'active' : ''}}">
                        <a href="{{ route('contacto') }}"><i class="icon ion-md-home mr-2"></i>Inicio</a>
                    </li>
                    <li class="{{ request()->routeIs('departamentos') ? 'active' : ''}}">
                        <a href="{{ route('departamentos') }}"><i class="icon ion-md-train mr-2"></i>Departamentos</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.municipios.index') ? 'active' : ''}}">
                        <a href="{{ route('admin.municipios.index') }}"><i class="icon ion-md-bus mr-2"></i>Municipios</a>
                    </li>
                    <li class="{{ request()->routeIs('estadoPedidos') ? 'active' : ''}}">
                        <a href="{{ route('estadoPedidos') }}"><i class="icon ion-md-cart lead mr-2"></i>Pedidos</a>
                    </li>
                    <li class="{{ request()->routeIs('estadoAgenda') ? 'active' : ''}}">
                        <a href="{{ route('estadoAgenda') }}"><i class="icon ion-md-calendar mr-2"></i>Agenda</a>
                    </li>
        
                    <li>
                        <a href="#homeFirstmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                                class="icon ion-md-document mr-2"></i>Permisos</a>
                        <ul class="collapse list-unstyled" id="homeFirstmenu">
                            <li class="{{ request()->routeIs('admin.permisos.index') ? 'active1' : ''}}">
                                <a href="{{ route('admin.permisos.index') }}">Permisos</a>
                            </li>
                            <li class="{{ request()->routeIs('admin.roles.index') ? 'active1' : ''}}">
                                <a href="{{ route('admin.roles.index') }}">Permisos del rol</a>
                            </li>
                        </ul>
                    </li>
        
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                                class="icon ion-ios-pricetags mr-2"></i>Productos</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="#">Tipo de producto</a>
                            </li>
                            <li>
                                <a href="#">Unidad de medida</a>
                            </li>
                            <li>
                                <a href="#">Marca de producto</a>
                            </li>
                            <li>
                                <a href="#">Tarifa de producto</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('admin.roles.index') ? 'active' : ''}}">
                        <a href="{{ route('admin.roles.index') }}"><i class="icon ion-md-contacts mr-2"></i>Roles</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                                class="icon ion-md-clipboard lead mr-2"></i>Servicios</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li class="{{ request()->routeIs('tipoServicios') ? 'active1' : ''}}">
                                <a href="{{ route('tipoServicios') }}">Tipo de servicio</a>
                            </li>
                            <li class="{{ request()->routeIs('tarifaServicios') ? 'active1' : ''}}">
                                <a href="{{ route('tarifaServicios') }}">Tarifa de servicio</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('admin.sucursales.index') ? 'active' : ''}}"> 
                        <a href="{{ route('admin.sucursales.index') }}"><i class="icon ion-md-browsers mr-2"></i>Centro de estética</a>
                    </li>
                    <li class="{{ request()->routeIs('quienes-somos') ? 'active' : ''}}">
                        <a href="{{ route('quienes-somos') }}"><i class="icon ion-md-desktop mr-2"></i>Home formularios</a>
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
                @include('sweetalert::alert')
        @yield('content')

    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
