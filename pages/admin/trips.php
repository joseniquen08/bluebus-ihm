<?php
include_once 'classes/Admin.php';

$objAdmin = new Admin();
$viajes = $objAdmin->listarViajesAdmin();

$base_url = (isset($_SERVER["HTTPS"]) ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . "/bluebus-ihm";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador | Viajes</title>
  <link rel="shortcut icon" href="<?= $base_url ?>/assets/images/BlueBus_logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="<?= $base_url ?>/assets/css/crud_styles.css" rel="stylesheet" type="text/css" />
  <link href="<?= $base_url ?>/assets/css/navbar.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
  <!-- Navbar -->
  <?php require_once "components/navbar.php"; ?>

  <!-- Header -->
  <header class="container mt-5 mb-4 text-center">
    <a href="<?= $base_url ?>/admin/inicio" class="btn btn-link">Volver</a>
    <h1 class="display-4">Mantenimiento de Viajes</h1>
  </header>

  <!-- Main content -->
  <main class="container mb-5">
    <!-- Botón de Añadir -->
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary custom-btn mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal">Añadir</button>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>COD_VIA</th>
            <th>FECHA_VIA</th>
            <th>HORA_VIA</th>
            <th>DURACION</th>
            <th>BUS</th>
            <th>ORIGEN</th>
            <th>DESTINO</th>
            <th>PRECIO_BASE</th>
            <th>HERRAMIENTAS CRUD</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($viajes as $viaje) : ?>
            <tr>
              <td><?= $viaje['COD_VIA'] ?></td>
              <td><?= $viaje['FECHA_VIA'] ?></td>
              <td><?= $viaje['HORA_VIA'] ?></td>
              <td><?= $viaje['DURACION'] ?></td>
              <td><?= $viaje['BUS'] ?></td>
              <td><?= $viaje['ORIGEN'] ?></td>
              <td><?= $viaje['DESTINO'] ?></td>
              <td><?= $viaje['PRECIO_BASE'] ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-warning btn-crud" title="Editar"><i class="bi bi-pencil"></i></a>
                <a href="#" class="btn btn-sm btn-danger btn-crud" title="Eliminar"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <!-- Pie de Página -->
  <?php require_once "components/footer.php"; ?>

  <!-- Scripts de JavaScript y Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>