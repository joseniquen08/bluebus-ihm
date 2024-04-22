<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BlueBus - Login</title>
  <!-- Enlace a la hoja de estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .bg-color-blue-oscuro {
      background-color: #052659;
    }

    .text-blue-oscuro {
      --bs-text-opacity: 1;
      color: #052659 !important;
    }

    .btn-blue-oscuro {
      --bs-btn-color: #000;
      --bs-btn-bg: #052659;
      --bs-btn-border-color: #052659;
      --bs-btn-hover-color: #000;
      --bs-btn-hover-bg: #0e356e;
      --bs-btn-hover-border-color: #0e356e;
      --bs-btn-focus-shadow-rgb: 11, 172, 204;
      --bs-btn-active-color: #000;
      --bs-btn-active-bg: #1f4d91;
      --bs-btn-active-border-color: #0e356e;
      --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      --bs-btn-disabled-color: #000;
      --bs-btn-disabled-bg: #052659;
      --bs-btn-disabled-border-color: #052659;
    }

    .left-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-top-left-radius: 0.5rem;
      border-bottom-left-radius: 0.5rem;
    }

    .right-box {
      border-top-right-radius: 0.5rem;
      border-bottom-right-radius: 0.5rem;
    }
  </style>

</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-color-blue-oscuro">
  <div class="bg-white rounded-5 text-secondary d-flex justify-content-between" style="width: 60rem">
    <div class="left-box shadow">
      <img src="./images/machu-picchu.jpg" alt="Machu Picchu" style="border-top-left-radius: 2rem; border-bottom-left-radius: 2rem;">
    </div>
    <div class="right-box">
      <div class="p-5 text-secondary shadow" style="width: 25rem; border-top-right-radius: 2rem; border-bottom-right-radius: 2rem;">
        <div class="d-flex justify-content-center">
          <img src="./images/login-icon.svg" alt="login-icon" style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Login</div>
        <div class="input-group mt-4">
          <div class="input-group-text bg-color-blue-oscuro">
            <img src="./images/username-icon.svg" alt="username-icon" style="height: 1rem" />
          </div>
          <input class="form-control bg-light" type="text" placeholder="Correo electrónico" />
        </div>
        <div class="input-group mt-1">
          <div class="input-group-text bg-color-blue-oscuro">
            <img src="./images/password-icon.svg" alt="password-icon" style="height: 1rem" />
          </div>
          <input class="form-control bg-light" type="password" placeholder="Contraseña" />
        </div>
        <div class="d-flex justify-content-around mt-1">
          <div class="d-flex align-items-center gap-1">
            <input class="form-check-input" type="checkbox" />
            <div class="pt-1" style="font-size: 0.9rem">Recuérdame</div>
          </div>
          <div class="pt-1">
            <a href="#" class="text-decoration-none text-blue-oscuro fw-semibold fst-italic"
              style="font-size: 0.9rem">¿Olvidaste tu contraseña?</a>
          </div>
        </div>
        <div class="btn btn-blue-oscuro text-white w-100 mt-4 fw-semibold shadow-sm">
          Iniciar sesión
        </div>
        <div class="d-flex gap-1 justify-content-center mt-1">
          <div>¿No estás registrado?</div>
          <a href="#" class="text-decoration-none text-blue-oscuro fw-semibold">Registrate</a>
        </div>
        <div class="p-3">
          <div class="border-bottom text-center" style="height: 0.9rem">
            <span class="bg-white px-3">o</span>
          </div>
        </div>
        <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
          <img src="./images/google-icon.svg" alt="google-icon" style="height: 1.6rem" />
          <div class="fw-semibold text-secondary">Continúa con Google</div>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>
