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
    <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>
    <!-- Barra de Navegación -->
    <?php require_once "components/navbar.php"; ?>

    <!-- Slider de Viajes -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/carrusel_foto_1.jpg" class="d-block w-100 custom-slider-img" alt="Cuzco">
          <div class="carousel-caption d-none d-md-block">
            <h5>Cuzco</h5>
            <p>Disfruta de excursiones en construcciones milenarias.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carrusel_foto_2.jpg" class="d-block w-100 custom-slider-img" alt="Cuzco">
          <div class="carousel-caption d-none d-md-block">
            <h5>Cuzco</h5>
            <p>No te pierdas de la montaña de colores.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carrusel_foto_3.jpg" class="d-block w-100 custom-slider-img" alt="Cuzco">
          <div class="carousel-caption d-none d-md-block">
            <h5>Cuzco</h5>
            <p>Descubre la belleza natural de nuestro país con nuestros tours ecológicos.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carrusel_foto_4.jpg" class="d-block w-100 custom-slider-img" alt="Cordillera">
          <div class="carousel-caption d-none d-md-block">
            <h5>Cordillera</h5>
            <p>Descubre la belleza natural de nuestro país con nuestros tours ecológicos.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carrusel_foto_5.jpg" class="d-block w-100 custom-slider-img" alt="Lima">
          <div class="carousel-caption d-none d-md-block">
            <h5>Lima</h5>
            <p>Descubre la belleza natural de nuestro país en la Lima costera.</p>
          </div>
        </div>
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

    <br><br>

    <!-- Contenido Principal -->
    <div class="container py-5">
      <h1 class="display-3 mb-5 text-center">Encuentra tu destino ideal</h1>
      <form action="search.php" method="GET" class="search-form">
        <div class="row justify-content-center">
          <div class="col-md-4 mb-3">
            <div class="form-floating">
              <select class="form-select" id="floatingSelectOrigen" name="origen" required>
                <option selected disabled>Elije...</option>
                <option value="LIMA">LIMA</option>
                <option value="ICA">ICA</option>
                <option value="AREQUIPA">AREQUIPA</option>
                <option value="CAMANA">CAMANA</option>
                <option value="CHIMBOTE">CHIMBOTE</option>
                <option value="TRUJILLO">TRUJILLO</option>
                <option value="HUARMEY">HUARMEY</option>
                <option value="CHICLAYO">CHICLAYO</option>
              </select>
              <label for="floatingSelectOrigen">Origen</label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="form-floating">
              <select class="form-select" id="floatingSelectDestino" name="destino" required>
                <option selected disabled>Elije...</option>
                <option value="LIMA">LIMA</option>
                <option value="ICA">ICA</option>
                <option value="AREQUIPA">AREQUIPA</option>
                <option value="CAMANA">CAMANA</option>
                <option value="CHIMBOTE">CHIMBOTE</option>
                <option value="TRUJILLO">TRUJILLO</option>
                <option value="HUARMEY">HUARMEY</option>
                <option value="CHICLAYO">CHICLAYO</option>
              </select>
              <label for="floatingSelectDestino">Destino</label>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="form-floating">
              <input type="date" class="form-control" id="floatingInputFecha" name="fecha_salida" required>
              <label for="floatingInputFecha">Fecha de Salida</label>
            </div>
          </div>
          <div class="col-md-1 mb-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100" formaction="seleccionar_asiento.php?cod_via='VIA0001'">Buscar</button>
          </div>
        </div>
      </form>
    </div>


    <!-- Contenedores de Viajes -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <img src="images/ballenas-tumbes-turismo.jpg" class="card-img-top" alt="Lima - Tumbes">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Lima - Tumbes</h5>
                    <p class="card-text">Explora los mejores destinos costeros con nosotros.</p>
                    <a href="selecAsiento.php" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <img src="images/pexels-sbenavides-17043614.jpg" class="card-img-top" alt="Lima - Arequipa">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Lima - Arequipa</h5>
                    <p class="card-text">Descripción corta del destino.</p>
                    <a href="#" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <img src="images/pexels-mauricio-espinoza-gavilano-582278929-17029844.jpg" class="card-img-top" alt="Arequipa - Lima">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Arequipa - Lima</h5>
                    <p class="card-text">Descripción corta del destino.</p>
                    <a href="#" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <img src="images/chimbote_catedral.png" class="card-img-top" alt="Destino 4">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Lima - Chimbote</h5>
                    <p class="card-text">Descripción corta del destino.</p>
                    <a href="#" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <img src="images/chiclayo_catedral.png" class="card-img-top" alt="Destino 5">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Lima - Chiclayo</h5>
                    <p class="card-text">Descripción corta del destino.</p>
                    <a href="#" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <img src="images/ica_laguna.png" class="card-img-top" alt="Destino 6">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Ica - Lima</h5>
                    <p class="card-text">Descripción corta del destino.</p>
                    <a href="#" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>

    <!-- Pie de Página -->
    <footer id="contacto" class="bg-info text-white text-center py-4">
      <div class="container">
        <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +123 456 789 | <i class="bi bi-geo-alt"></i> Dirección: Av. Principal 123, Ciudad Principal, País</p>
        <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@empresa.com</p>
      </div>
    </footer>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>