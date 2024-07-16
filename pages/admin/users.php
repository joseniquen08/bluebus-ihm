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
  <!-- SweetAlert2 CSS and JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
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
    <!-- Botón de Añadir -->
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary custom-btn mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal">Añadir</button>
    </div>

    <!-- Modal de Editar Usuario -->
    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editar_usuario_form">
            <div class="modal-body">
              <input type="hidden" id="editar_codigo_usuario" name="codigo_usuario">
              <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="editar_nombres" name="nombres" required>
              </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="editar_apellidos" name="apellidos" required>
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="text" class="form-control" id="editar_correo" name="correo" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="editar_password" name="password" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Modal de Agregar -->
    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="agregar_form">
            <div class="modal-body">
              <!-- Aquí van los campos del formulario para agregar un nuevo usuario -->
              <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="agregar_nombres" name="nombres" required>
              </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="agregar_apellidos" name="apellidos" required>
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="text" class="form-control" id="agregar_correo" name="correo" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="agregar_password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="agregar_rol" name="rol">
                  <option value="ADMIN">Admin</option>
                  <option value="CLIENTE">Cliente</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Reserva</button>
            </div>
          </form>
        </div>
      </div>
    </div>
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
                <button type="button" class="btn btn-sm btn-warning btn-crud" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal" data-codigo-usuario="<?= $user['COD_USER'] ?>" data-nombres="<?= $user['NOMBRES'] ?>" data-apellidos="<?= $user['APELLIDOS'] ?>" data-correo="<?= $user['CORREO'] ?>" data-password="<?= $user['PASSWORD'] ?>"><i class="bi bi-pencil"></i></button>
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
  <script>
    $(document).ready(function() {
      // Envío del formulario para agregar reserva
      $("#agregar_form").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
          url: '<?= $base_url ?>/api/admin/usuarios/agregar',
          type: 'POST',
          data: {
            nombres: $("#agregar_nombres").val(),
            apellidos: $("#agregar_apellidos").val(),
            correo: $("#agregar_correo").val(),
            password: $("#agregar_password").val(),
            rol: $("#agregar_rol").val(),
          },
          success: function(response) {
            $("#agregarModal").modal('hide');
            Swal.fire({
              icon: 'success',
              title: 'Usuario agregado',
              text: 'El usuario se agregó correctamente.',
              showConfirmButton: true
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = '<?= $base_url ?>/admin/usuarios';
              }
            });
          },
          error: function(xhr, textStatus, errorThrown) {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'No se pudo agregar la reserva. Error: ' + errorThrown,
              showConfirmButton: true
            });
          }
        });
      });

      // Envío del formulario para editar estado de reserva
      $("#editar_usuario_form").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
          url: '<?= $base_url ?>/api/admin/usuarios/editar',
          type: 'POST',
          data: {
            codigo_usuario: $("#editar_codigo_usuario").val(),
            nombres: $("#editar_nombres").val(),
            apellidos: $("#editar_apellidos").val(),
            correo: $("#editar_correo").val(),
            password: $("#editar_password").val()
          },
          success: function(response) {
            $("#editarUsuarioModal").modal('hide');
            Swal.fire({
              icon: 'success',
              title: 'Usuario actualizado',
              text: 'El usuario se actualizó correctamente.',
              showConfirmButton: true
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload(); // Recargar la página o actualizar la lista de usuarios
              }
            });
          },
          error: function(xhr, textStatus, errorThrown) {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'No se pudo actualizar el usuario. Error: ' + errorThrown,
              showConfirmButton: true
            });
          }
        });
      });

      $("#editarUsuarioModal").on("show.bs.modal", function(event) {
        const button = event.relatedTarget
        const codigo_usuario = button.getAttribute('data-codigo-usuario')
        const nombres = button.getAttribute('data-nombres')
        const apellidos = button.getAttribute('data-apellidos')
        const correo = button.getAttribute('data-correo')
        const password = button.getAttribute('data-password')

        $("#editar_codigo_usuario").val(codigo_usuario)
        $("#editar_nombres").val(nombres)
        $("#editar_apellidos").val(apellidos)
        $("#editar_correo").val(correo)
        $("#editar_password").val(password)
      })
    });

    // Función para editar estado de reserva
    function editarEstado(codigo_reserva) {
      if (confirm("¿Estás seguro de cambiar el estado de esta reserva?")) {
        // Aquí podrías cargar el estado actual de la reserva y mostrarlo en el modal
        // Por simplicidad, aquí simplemente abrimos el modal para editar
        $("#editarEstadoModal").modal('show');
        $("#codigo_reserva_edit").val(codigo_reserva);
      }
    }
  </script>
</body>

</html>