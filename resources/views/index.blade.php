<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Almaweb">
    <meta name="description" content="Centro de estética servicios de belleza">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">

    <!-- Ionic icons-->
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenes/A.png')}}" />

    <title>AlmaWeb Página principal</title>
</head>


<body>
<header class="header navbar-area">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a href="Index2.html"><img src="{{ asset('imagenes/logo3.png')}}" class="logo-brand" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero"><ion-icon name="home-outline" class="mr-2"></ion-icon>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Vista/Servicios/indexservicio.html"><ion-icon name="bookmarks-outline" class="mr-2"></ion-icon>Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Vista/Productos/Productos.html"><ion-icon name="bag-handle-outline" class="mr-2"></ion-icon>Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros"><ion-icon name="accessibility-outline" class="mr-2"></ion-icon>Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><ion-icon name="at-circle-outline" class="mr-2"></ion-icon>Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Vista/Productos/carrito.html">
                                <ion-icon name="cart-outline" class="mr-2"></ion-icon>Carrito
                        </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}"><ion-icon name="log-in-outline" class="mr-2"></ion-icon>Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <div>
        <a href="https://wa.link/kobe1c" class="btn-wsp" target="_blank">
            <i class="icon ion-logo-whatsapp"></i>
        </a>
    </div>

    <section id="hero">
        <div class="container">
            <div class="content-center">
                <h1 class="mt-5">Alma centro de estética</h1>
                <p>Todo para el cuidado de la piel en nuestras manos.</p>
                <a href="Vista/Servicios/agenda.html" class="btn btn-secondary mt-4">Agendar una cita <i class="icon ion-md-arrow ml-2"></i></a>
            </div>
        </div>
    </section>

    <section id="servicios">
        <div class="container-fluid">
            <div class="content-center">
                <h2>Nuestros <b>Servicios.</b></h2>
                <p>En Alma centro de estética brindamos los mejores servicios y con excelente atención al público,
                nuestro objetivo principal es el cuidadado de la piel brindando la mejor experiencia y cuidado.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="Vista/Servicios/indexservicio.html #faciales">
                                <h3>Servicios Faciales</h3>
                            </a>
                            <a href="Vista/Servicios/indexservicio.html #faciales">
                                <p>Cuidado fácial</p>
                            </a>
                        </div>
                        <img src="{{ asset('imagenes/servicio1.jpg')}}" class="img-fluid" alt="Portfolio 01">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="Vista/Servicios/indexservicio.html #corporales">
                                <h3>Servicios Corporales</h3>
                            </a>
                            <a href="Vista/Servicios/indexservicio.html #corporales">
                                <p>Cuidado corporal</p>
                            </a>
                        </div>
                        <img src="{{ asset('imagenes/servicio2.jpg')}}" class="img-fluid" alt="Portfolio 02">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="Vista/Servicios/indexservicio.html #faciales">
                                <h3>Servicios de depilación</h3>
                            </a>
                            <a href="Vista/Servicios/indexservicio.html #faciales">
                                <p>Piel perfecta</p>
                            </a>
                        </div>
                        <img src="{{ asset('imagenes/servicios3.jpg')}}" class="img-fluid" alt="Portfolio 03">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="Vista/Servicios/indexservicio.html #corporales">
                                <h3>Masajes</h3>
                            </a>
                            <a href="Vista/Servicios/indexservicio.html #corporales">
                                <p>Relajación múscular</p>
                            </a>
                        </div>
                        <img src="{{ asset('imagenes/servicio4.jpg')}}" class="img-fluid" alt="Portfolio 04">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="">¿Deseas ver todos los servicios?</p>
                <a href="Vista/Servicios/indexservicio.html" class="text-dark"><b>Ver servicios.</b></a>
            </div>
        </div>
    </section>

    <section id="productos">
        <div class="container">
            <div class="row">
                <div class="content-center">
                    <h2>Nuestros <b>productos.</b></h2>
                    <p>Ofrecemos los mejores productos para el cuidado de la piel y el cabello, con estos 
                    productos te ofrecemos una excelente calidad y con precios muy accesibles.</p>
                </div>
                <div class="col-sm-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="Vista/Productos/productos.html #faciales">
                                    <img class="d-block w-100" src="{{ asset('imagenes/faciales.png')}}" alt="First slide">
                                </a>
                                <div class="carousel-caption">
                                    <h3>Productos Faciales</h3>
                                    <p>Lo mejor para todo tipo de piel!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <a href="Vista/Productos/productos.html #capilar">
                                    <img class="d-block w-100" src="{{ asset('imagenes/capilares.png')}}" alt="Second slide">
                                    <div class="carousel-caption">
                                </a>
                                <h3>Productos Capilares</h3>
                                <p>Excelente calidad para el cuidado del cabello!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="Vista/Productos/productos.html #facial2">
                                <img class="d-block w-100" src="{{ asset('imagenes/producto3.jpg')}}" alt="Third slide">
                            </a>
                            <div class="carousel-caption">
                                <h3>Más productos faciales</h3>
                                <p>Animate a comprar!</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="">¿Deseas ver todos los productos?</p>
            <a href="Vista/Productos/productos.html" class="text-dark"><b>Ver productos.</b></a>
        </div>
        </div>
    </section>

    <section id="nosotros" class="divider">
        <div class="container">
            <div class="content-center">
                <h2>Información sobre nuestra <b>microempresa</b></h2>
                <p>A continuación conoceras un poco acerca de nosotros e ideales a futuro.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pricing-container">
                        <div class="plans">
                            <h3> <b> ¿Quienes somos? </b></h3>
                            <p>“ALMA CENTRO DE ESTÉTICA” 
                                es una microempresa de servicios en belleza y estética, con domicilio 16-188 Calle Santa Bárbara, 
                                Yolombó, Colombia, constituida en junio del año 2020 y que tiene por objeto brindar a sus clientes: 
                                Servicios y tratamientos de belleza y estética especializada en cosmetología; ofrece soluciones a los 
                                problemas relacionados con impurezas faciales, Maso terapia, Estética de depilación, Porcelanización facial,
                                entre otros servicios.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pricing-container">
                        <div class="plans2">
                            <h3><b>Misión</b></h3>
                            <p>Somos un Centro Integral de Estética y belleza dedicado a mejorar y mantener la belleza del rostro y cuerpo buscando 
                            la unificación del concepto belleza-salud, mediante productos de alta calidad en combinación con aparatología de última generación 
                            y lo último en técnicas manuales lo que hacen de “ALMA CENTRO DE ESTÉTICA” un espacio único de bienestar, donde la imagen toma punto 
                            clave para lograr el éxito tanto personal como profesional, ya que una buena imagen detona belleza, armonía y Salud.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="pricing-container">
                        <div class="plans">
                            <h3><b>Visión</b></h3>
                            <p>Para el año 2021 “ALMA CENTRO DE ESTÉTICA” se proyecta Convertir en una referencia en el mercado regional a través de la excelencia
                            en la calidad en la provisión de servicios de estética, refiriéndose a los desafíos de la innovación, la actualización constante de los tratamientos
                            y las inversiones estructurales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-4 map-responsive">
                <h4 class="text-center"><b>¿Cómo llegar a nuestras instalaciones?</b></h4>
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.8499583299763!2d-75.01228291192166!3d6.597128931925207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4475d3013f8a4b%3A0xeba91ed1b5dadabb!2sCarrera%2018%20%2317-02%2C%20Yolomb%C3%B3%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1622432454900!5m2!1ses!2sco"
                    allowfullscreen="" loading="lazy"></iframe>
                </div>
                
                <div class="col-md-6 mt-5">
                <h3 class="text-center"><b>Contáctanos</b></h3>
                    <form id="formcontacto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="Correo">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="asunto" placeholder="Asunto">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <textarea class="form-control" id="mensaje" rows="4" placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary full-width" onclick="validacion();">Envíar mensaje</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <img src="{{ asset('imagenes/logo3.png')}}" class="logo-brand" alt="logo">
            <ul class="list-inline">
                <li class="list-inline-item footer-menu"><a href="#hero">Inicio</a></li>
                <li class="list-inline-item footer-menu"><a href="#servicios">Servicios</a></li>
                <li class="list-inline-item footer-menu"><a href="#productos">Productos</a></li>
                <li class="list-inline-item footer-menu"><a href="#nosotros">Nosotros</a></li>
                <li class="list-inline-item footer-menu"><a href="#contact">Contáctanos</a></li>
                <li class="list-inline-item footer-menu"><a href="Vista/Login/login.php">Login</a></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="https://www.instagram.com/almaestetica20/" target="_blank"><i class="icon ion-logo-instagram"></i></a>
                </li>
                <li class="list-inline-item"><a href="https://wa.link/kobe1c" target="_blank"><i class="icon ion-logo-whatsapp"></i></a>
                </li>
                <li class="list-inline-item"><a href="#contact"><i class="icon ion-md-mail"></i></a>
                </li>
            </ul>
            <small>©2021 Todos los derechos reservados. Creado por <a href="#" class="font-weight-bold" target="_blank"
                    rel="noopener">Equipo AlmaWeb</a></small>
        </div>
    </footer>

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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

        <script type="text/javascript" src="Vista/Public/Js/js_inicio/contacto.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>