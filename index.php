<?php
// Incluye el archivo Agencia.php que contiene tu función validarLogin
include_once './Agencia.php';
include_once './Conexion.php';

$obj = new Agencia();
// Define una variable para almacenar el mensaje de error
$mensaje_error = '';
?>

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
    <link href="css/incio_style.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/BlueBus_logo.png" alt="BlueBus Logo" class="logo mb-4" height="35" width="auto">
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
            <img src="images/pexels-mauricio-espinoza-gavilano-582278929-17029842.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Lima</h5>
            <p>Disfruta de nuestras excursiones a las mejores playas del país.</p>
          </div>
        </div>
        <div class="carousel-item">
            <img src="images/pexels-sbenavides-17043614.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Arequipa</h5>
            <p>Descubre la belleza natural de nuestro país con nuestros tours ecológicos.</p>
          </div>
        </div>
        <div class="carousel-item">
            <img src="images/pexels-cristianloayza-16198315.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Trujillo</h5>
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

    <!-- Contenido Principal -->
    <div class="container py-5">
      <h1 class="display-3 mb-5 text-center">Encuentra tu destino ideal</h1>
      <form action="search.php" method="GET" class="search-form">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Origen</label>
              <select class="form-select" id="inputGroupSelect01">
              <option selected>Elije...</option>
                <option value="1">LIMA</option>
                <option value="2">ICA</option>
                <option value="3">AREQUIPA</option>
                <option value="4">CAMANA</option>
                <option value="5">CHIMBOTE</option>
                <option value="5">TRUJILLO</option>
                <option value="5">HUARMEY</option>
                <option value="5">CHICLAYO</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect02">Destino</label>
              <select class="form-select" id="inputGroupSelect02">
                <option selected>Elije...</option>
                <option value="1">LIMA</option>
                <option value="2">ICA</option>
                <option value="3">AREQUIPA</option>
                <option value="4">CAMANA</option>
                <option value="5">CHIMBOTE</option>
                <option value="5">TRUJILLO</option>
                <option value="5">HUARMEY</option>
                <option value="5">CHICLAYO</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect03">Fecha de Salida</label>
              <input type="date" class="form-control" id="inputGroupSelect03" required>
            </div>
          </div>
          <div class="col-md-1">
          <button type="submit" class="btn btn-primary" formaction="selecAsiento.php?cod_via='VIA0001'">Buscar</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Contenedores de Viajes -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active"> <!-- Añadir la clase 'active' al primer item -->
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                    <img src="images/ballenas-tumbes-turismo.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Lima - Tumbes</h5>
                    <p class="card-text">Explora los mejores destinos costeros con nosotros.</p>
                    <a href="selecAsiento.php" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
              <!-- Agregar más tarjetas aquí -->
              <div class="col-lg-4">
                <div class="card mb-4">
                    <img src="images/pexels-sbenavides-17043614.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Lima - Aqrequipa</h5>
                    <p class="card-text">Descripción corta del destino.</p>
                    <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card mb-4">
                    <img src="images/pexels-mauricio-espinoza-gavilano-582278929-17029844.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Arequipa - Lima</h5>
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