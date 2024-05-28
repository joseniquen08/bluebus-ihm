<?php
require_once './Conexion.php';

$cod_via = isset($_REQUEST["COD_VIA"]) ? $_REQUEST["COD_VIA"] : "VIA001";

$cn = new Conexion();
$sql = "SELECT v.HORA_VIA, v.FECHA_VIA, v.DURACION, d.NOM_DESTINO AS Destino, dd.NOM_DESTINO AS Origen FROM viaje AS v JOIN destino AS d ON d.COD_DESTINO = v.DESTINO JOIN destino AS dd ON dd.COD_DESTINO = v.ORIGEN WHERE COD_VIA = '$cod_via'";
$res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
$row = mysqli_fetch_assoc($res);
print_r($row)
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asientos | <?= $row["Origen"] ?> - <?= $row["Destino"] ?> | BlueBus</title>
  <!-- Enlace a la hoja de estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Enlace a los iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./css/global.css">
  <link rel="stylesheet" href="./css/seleccionar_asiento.css">
  <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
<?php require_once "components/navbar.php"; ?>

  <main class="py-4 d-flex flex-column align-items-start mx-auto" style="max-width: 64rem;">
    <div class="w-100 text-center mb-4">
      <p class="fs-2 fw-bolder">Elección de asientos</p>
      <div class="d-flex flex-column justify-content-center align-items-center fs-5">
        <p class="fs-4 fw-semibold"><?= $row["Origen"] ?> - <?= $row["Destino"] ?></p>
        <p><?= date_format(date_create($row["FECHA_VIA"]), "d/m/Y") ?> <?= $row["HORA_VIA"] ?></p>
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
              <span class="badge text-bg-light border">Salida: sabado, abr. 0</span>
            </div>
            <div id="content">
              <ul class="timeline" style="padding-left: 1rem;">
                <li class="event" data-date="08:00 pm">
                  <h3>Arequipa</h3>
                  <p class="mb-0">Terrapuerto</p>
                </li>
                <li class="event" data-date="12:30 am">
                  <h3>Lima</h3>
                  <p class="mb-0">Javier Prado</p>
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
  <footer id="contacto" class="bg-info text-white text-center py-4">
    <div class="container">
      <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
      <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
    </div>
  </footer>

  <!-- Script de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>