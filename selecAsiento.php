<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asientos | Lima - Tumbes | BlueBus</title>
  <!-- Enlace a la hoja de estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Enlace a los iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* Estilos personalizados */
    body {
      background-color: #e8f5ff;
      /* Fondo celeste */
      color: #004080;
      /* Texto azul oscuro */
    }

    .navbar {
      background-color: #052659;
      /* Azul oscuro para la barra de navegación */
    }

    .nav-link {
      color: #ffffff;
      /* Texto blanco para los enlaces de navegación */
    }

    .carousel-caption {
      background-color: rgba(0, 64, 128, 0.7);
      /* Fondo semi-transparente azul oscuro para las descripciones en el slider */
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
      color: #5483B3;
      /* Cambia el color de las flechas del slider */
    }
    
    .navbar-brand {
      margin-right: auto; /* Centrar el logo en la esquina izquierda */
    }
    
    /* CSS personalizado para ajustar el tamaño del logo */
    .navbar-brand img {
      width: 50px; /* Tamaño del logo */
      height: 50px;
    }

    @media (max-width: 991.98px) { /* Ajustar el tamaño del logo para dispositivos móviles */
      .navbar-brand img {
        max-width: 120px; /* Tamaño máximo del logo en dispositivos móviles */
      }
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

    .asientos-container {
      width: calc(52px * 5);
      height: calc(52px * 14);
      list-style: none;
      padding: 0;
    }

    .asiento-item {
      width: calc(100% / 5);
      height: calc(100% / 14);
    }

    .asiento-btn {
      width: 44px;
      height: 44px;
    }

    .timeline {
      border-left: 3px solid #052659;
      border-bottom-right-radius: 4px;
      border-top-right-radius: 4px;
      margin: 0 auto;
      letter-spacing: 0.2px;
      position: relative;
      line-height: 1.4em;
      font-size: 1.03em;
      list-style: none;
      text-align: left;
      margin-left: 75px;
    }

    @media (max-width: 767px) {
      .timeline {
        max-width: 98%;
        padding: 25px;
      }
    }

    .timeline h2,
    .timeline h3 {
      font-weight: 500;
      font-size: 1.1rem;
      margin-bottom: 10px;
    }

    .timeline .event {
      padding-bottom: 5px;
      margin-bottom: 5px;
      position: relative;
    }

    @media (max-width: 767px) {
      .timeline .event {
        padding-top: 30px;
      }
    }

    .timeline .event:last-of-type {
      padding-bottom: 0;
      margin-bottom: 0;
      border: none;
    }

    .timeline .event:before,
    .timeline .event:after {
      position: absolute;
      display: block;
      top: 0;
    }

    .timeline .event:before {
      top: -3px;
      left: -153px;
      content: attr(data-date);
      text-align: right;
      font-weight: 500;
      font-size: 0.82em;
      min-width: 120px;
    }

    @media (max-width: 767px) {
      .timeline .event:before {
        left: 0px;
        text-align: left;
      }
    }

    .timeline .event:after {
      -webkit-box-shadow: 0 0 0 3px #052659;
      box-shadow: 0 0 0 3px #052659;
      left: -21px;
      background: #fff;
      border-radius: 50%;
      height: 9px;
      width: 9px;
      content: "";
      top: 5px;
    }

    @media (max-width: 767px) {
      .timeline .event:after {
        left: -31.8px;
      }
    }

    .rtl .timeline {
      border-left: 0;
      text-align: right;
      border-bottom-right-radius: 0;
      border-top-right-radius: 0;
      border-bottom-left-radius: 4px;
      border-top-left-radius: 4px;
      border-right: 3px solid #052659;
    }

    .rtl .timeline .event::before {
      left: 0;
      right: -170px;
    }

    .rtl .timeline .event::after {
      left: 0;
      right: -55.8px;
    }
    
    .bg-info {
      background-color: #052659 !important;
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

  <main class="py-4 d-flex flex-column align-items-start mx-auto" style="max-width: 64rem;">
    <div class="w-100 text-center mb-4">
      <p class="fs-3 fw-bolder">Elección de asientos</p>
      <div class="d-flex justify-content-center align-items-center fs-5 fw-medium" style="gap: 2rem;">
        <p>Ruta: Lima - Tumbes</p>
        <p>10/04/2024 6:30 PM</p>
      </div>
    </div>
    <div class="d-flex w-100" style="gap: 2rem;">
      <div class="card w-100">
        <div class="card-header px-4 py-3">
          <p class="mb-0 fw-semibold">Elige tus asientos</p>
        </div>
        <div class="card-body py-4 d-flex justify-content-center">
          <div class="border border-primary p-3 rounded-4 text-center">
            <p class="fs-5 fw-semibold mb-4">Primer piso</p>
            <ul class="d-flex flex-wrap asientos-container m-0">
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-1" autocomplete="off" disabled>
                <label class="btn btn-outline-primary asiento-btn" for="asiento-1">1</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-2" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-2">2</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-3" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-3">3</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-4" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-4">4</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-5" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-5">5</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-6" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-6">6</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-7" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-7">7</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-8" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-8">8</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-9" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-9">9</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-10" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-10">10</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-11" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-11">11</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-12" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-12">12</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-13" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-13">13</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-14" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-14">14</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-15" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-15">15</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-16" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-16">16</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-17" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-17">17</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-18" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-18">18</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-19" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-19">19</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-20" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-20">20</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-21" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-21">21</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-22" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-22">22</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-23" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-23">23</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-24" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-24">24</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-25" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-25">25</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-26" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-26">26</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-27" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-27">27</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-28" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-28">28</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-29" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-29">29</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-30" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-30">30</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-31" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-31">31</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-32" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-32">32</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-33" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-33">33</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-34" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-34">34</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-35" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-35">35</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-36" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-36">36</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-37" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-37">37</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-38" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-38">38</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-39" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-39">39</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-40" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-40">40</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-41" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-41">41</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-42" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-42">42</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-43" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-43">43</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-44" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-44">44</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-45" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-45">45</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-46" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-46">46</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-47" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-47">47</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-48" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-48">48</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-49" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-49">49</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-50" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-50">50</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-51" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-51">51</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-52" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-52">52</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-53" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-53">53</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-54" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-54">54</label><br>
              </li>
              <li class="asiento-item"></li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-55" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-55">55</label><br>
              </li>
              <li class="asiento-item">
                <input type="checkbox" class="btn-check" id="asiento-56" autocomplete="off">
                <label class="btn btn-outline-primary asiento-btn" for="asiento-56">56</label><br>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column" style="flex: none; width: 400px; gap: 2rem;">
        <div class="card">
          <div class="card-header px-4 py-3">
            <p class="mb-0 fw-semibold">Embarque y Desembarque</p>
          </div>
          <div class="card-body px-4 py-4">
            <div class="mb-2 d-flex justify-content-end">
              <span class="badge text-bg-light border">Salida: miércoles, abr. 10</span>
            </div>
            <div id="content">
              <ul class="timeline" style="padding-left: 1rem;">
                <li class="event" data-date="06:30 pm">
                  <h3>Lima</h3>
                  <p class="mb-0">Javier Prado</p>
                </li>
                <li class="event" data-date="09:30 am">
                  <h3>Tumbes</h3>
                  <p class="mb-0">Tumbes</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header px-4 py-3">
            <p class="mb-0 fw-semibold">Asientos elegidos</p>
          </div>
          <div class="card-body px-4 py-4">
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between">
                <span>Asiento 15</span>
                <span>S/. 80.00</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Asiento 16</span>
                <span>S/. 80.00</span>
              </li>
            </ul>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between fw-medium">
                <span>Total</span>
                <span>S/. 160.00</span>
              </li>
            </ul>
          </div>
        </div>
        <div>
          <button class="btn btn-primary w-100" style="background: #052659 !important; border-color: #052659 !important;">Confirmar pasajeros</button>
        </div>
      </div>
    </div>
  </main>

  <!-- Pie de Página -->
  <footer class="bg-info text-white text-center py-4">
    <div class="container">
      <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +123 456 789 | <i class="bi bi-geo-alt"></i> Dirección:
        Av. Principal 123, Ciudad Principal, País</p>
      <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@empresa.com</p>
    </div>
  </footer>

  <!-- Script de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>