<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio - Empresa de Transporte Terrestre</title>
  <!-- Enlace a la hoja de estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Enlace a los iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* Estilos personalizados */
    /* CSS personalizado para centrar el logo en la esquina y hacerlo responsivo */
    .navbar-brand {
      margin-right: auto;
      /* Centrar el logo en la esquina izquierda */
    }

    /* CSS personalizado para ajustar el tamaño del logo */
    .navbar-brand img {
      width: 50px;
      /* Tamaño del logo */
      height: 50px;
    }

    @media (max-width: 991.98px) {

      /* Ajustar el tamaño del logo para dispositivos móviles */
      .navbar-brand img {
        max-width: 120px;
        /* Tamaño máximo del logo en dispositivos móviles */
      }
    }

    body {
      background-color: #c1e8ff;
      /* Fondo celeste */
      color: #021024;
      /* Texto azul oscuro */
    }

    .navbar {
      background-color: #052659;
      /* Azul oscuro para la barra de navegación */
    }

    .nav-link {
      color: #fff;
      /* Texto celeste para los enlaces de navegación */
    }

    .carousel-caption {
      background-color: rgba(5, 38, 89, 0.7);
      /* Fondo semi-transparente azul oscuro para las descripciones en el slider */
    }

    .card {
      background-color: #7da0ca;
      /* Fondo celeste para las tarjetas de destinos */
      border: none;
      /* Sin borde */
    }

    .card:hover {
      transform: scale(1.05);
      /* Efecto de escala al hacer hover */
      z-index: 1;
      /* Se eleva al hacer hover */
    }

    .carousel-item img {
      height: 400px;
      /* Aumenta la altura de las imágenes del slider */
    }

    .carousel-control-prev,
    .carousel-control-next {
      top: 50%;
      /* Posiciona los botones de control en el centro vertical */
      transform: translateY(-50%);
      /* Centra verticalmente los botones de control */
      z-index: 1;
      /* Asegura que estén encima del contenido del slider */
      color: #5483b3;
      /* Cambia el color de las flechas del slider */
    }

    .navbar.sticky-top {
      animation: fadeInDown 0.5s;
      /* Animación para mostrar la barra pegajosa */
    }

    @keyframes fadeInDown {
      0% {
        opacity: 0;
        transform: translateY(-100%);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .bg-light {
      background-color: #c1e8ff;
      /* Fondo celeste para la sección adicional */
    }

    .bg-info {
      background-color: #052659 !important;
    }

    .text-info {
      color: #021024;
      /* Texto azul oscuro para el pie de página */
    }
  </style>
</head>

<body>

  <!-- Barra de Navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="./images/BlueBus_logo.png" alt="BlueBus Logo" class="logo mb-4">
      </a>
      <!-- Botón de hamburguesa para dispositivos móviles -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Elementos de navegación -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-info-circle"></i> Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-people"></i> Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-envelope"></i> Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Slider de Viajes -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Viaje a la playa</h5>
          <p>Disfruta de nuestras excursiones a las mejores playas del país.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Explora la naturaleza</h5>
          <p>Descubre la belleza natural de nuestro país con nuestros tours ecológicos.</p>
        </div>
      </div>
      <!-- Agrega más elementos carousel-item según sea necesario -->
    </div>
    <!-- Flechas de control -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <br></br>
  <br></br>

  <!-- Contenedores de Viajes -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active"> <!-- Añadir la clase 'active' al primer item -->
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <img src="./images/ballenas-tumbes-turismo.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Lima - Tumbes</h5>
                  <p class="card-text">Explora los mejores destinos costeros con nosotros.</p>
                  <a href="seleccionar_asiento.php?COD_VIA=VIA008" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <!-- Agregar más tarjetas aquí -->
            <div class="col-lg-4">
              <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Destino 2</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Destino 3</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="row">
            <!-- Aquí comienza un nuevo carousel-item -->
            <div class="col-lg-4">
              <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Destino 4</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Destino 5</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Destino 6</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
  </div>

  <!-- Sección adicional -->
  <section class="bg-light py-5">
    <div class="container">
      <h2>Otra Sección Relacionada con Viajes</h2>
      <p>Agrega aquí información adicional relacionada con los servicios de transporte terrestre que ofrece la empresa. Puede ser testimonios de clientes, promociones especiales, consejos para viajar, etc.</p>
    </div>
  </section>

  <!-- Pie de Página -->
  <footer class="bg-info text-white text-center py-4">
    <div class="container">
      <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +123 456 789 | <i class="bi bi-geo-alt"></i> Dirección: Av. Principal 123, Ciudad Principal, País</p>
      <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@empresa.com</p>
    </div>
  </footer>

  <!-- Script de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>