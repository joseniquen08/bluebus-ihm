<?php
include_once 'classes/Admin.php';

$objAdmin = new Admin();
$users = $objAdmin->listarUsuariosAdmin();

$base_url = (isset($_SERVER["HTTPS"]) ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . "/bluebus-ihm";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador | Usuarios</title>
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
    <h1 class="display-4">Mantenimiento de Usuarios</h1>
  </header>

  <!-- Main content -->
  <main class="container mb-5">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>COD_USER</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>CORREO</th>
            <th>PASSWORD</th>
            <th>ROL</th>
            <th>HERRAMIENTAS CRUD</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?= $user['COD_USER'] ?></td>
              <td><?= $user['NOMBRES'] ?></td>
              <td><?= $user['APELLIDOS'] ?></td>
              <td><?= $user['CORREO'] ?></td>
              <td><?= $user['PASSWORD'] ?></td>
              <td><?= $user['ROL'] ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-success btn-crud" title="Añadir"><i class="bi bi-plus"></i></a>
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