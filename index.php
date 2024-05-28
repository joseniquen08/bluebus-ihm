<?php
// Incluye el archivo Agencia.php que contiene tu función validarLogin
include_once './Agencia.php';
include_once './Conexion.php';

// Inicia la sesión
session_start();

$obj = new Agencia();
// Define una variable para almacenar el mensaje de error
$mensaje_error = '';

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario y sanitízalos
    $usuario_correo = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $contraseña = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validar los inputs
    if (!filter_var($usuario_correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje_error = "Correo electrónico no válido.";
    } elseif (strlen($contraseña) < 8) {
        $mensaje_error = "La contraseña debe tener al menos 8 caracteres.";
    } elseif (!preg_match('/[A-Za-z]/', $contraseña) || !preg_match('/[0-9]/', $contraseña)) {
        $mensaje_error = "La contraseña debe contener letras y números.";
    } else {
        // Llama a tu función validarLogin
        if ($obj->validarLogin($usuario_correo, $contraseña)) {
            // Si las credenciales son válidas, guarda la información del usuario en la sesión y redirige al usuario a la página de inicio
            $_SESSION['user_email'] = $usuario_correo;
            header("Location: inicio.php");
            exit();
        } else {
            // Si las credenciales no son válidas, muestra un mensaje de error
            $mensaje_error = "Credenciales incorrectas. Intente de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BlueBus - Login</title>
  <!-- Enlace a la hoja de estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Enlace a los iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="css/style-login.css" rel="stylesheet" type="text/css"/>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-color-blue-oscuro">
  <div class="bg-white rounded-5 text-secondary d-flex justify-content-between" style="width: 60rem">
    <div class="left-box shadow">
        <img src="images/pexels-mauricio-espinoza-gavilano-582278929-17029844.jpg" alt="Machu Picchu" style="border-top-left-radius: 2rem; border-bottom-left-radius: 2rem;">
    </div>
    <div class="right-box">
      <div class="p-5 text-secondary shadow" style="width: 25rem; border-top-right-radius: 2rem; border-bottom-right-radius: 2rem;">
        <div class="d-flex justify-content-center">
          <img src="images/login-icon.svg" alt="login-icon" style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Login</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> <!-- Aquí se especifica la acción y método del formulario -->
          <div class="input-group mt-4">
            <div class="input-group-text bg-color-blue-oscuro">
              <img src="images/username-icon.svg" alt="username-icon" style="height: 1rem" />
            </div>
            <input name="email" class="form-control bg-light" type="email" placeholder="Correo electrónico" required />
          </div>
          <div class="input-group mt-1">
            <div class="input-group-text bg-color-blue-oscuro">
              <img src="images/password-icon.svg" alt="password-icon" style="height: 1rem" />
            </div>
            <input name="password" class="form-control bg-light" type="password" placeholder="Contraseña" required pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" title="La contraseña debe tener al menos 8 caracteres, e incluir letras y números." />
          </div>
          <button type="submit" class="btn btn-blue-oscuro text-white w-100 mt-4 fw-semibold shadow-sm">Iniciar sesión</button>
        </form>
        <?php if(!empty($mensaje_error)) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $mensaje_error; ?>
            </div>
        <?php } ?>
        <div class="d-flex gap-1 justify-content-center mt-1">
          <div>¿No estás registrado?</div>
          <a href="#" class="text-decoration-none text-blue-oscuro fw-semibold">Registrate</a>
        </div>
        <!-- Resto del contenido -->
        <div class="d-flex justify-content-around mt-3">
          <a href="#" class="text-decoration-none text-blue-oscuro">¿Olvidaste tu contraseña?</a>
          <a href="#" class="text-decoration-none text-blue-oscuro">Contacto</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>