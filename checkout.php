<?php
require_once './Conexion.php';

$cod_via = isset($_REQUEST["COD_VIA"]) ? $_REQUEST["COD_VIA"] : "VIA001";

// session_start();

if (isset($_SESSION['selected_seats'])) {
    $selected_seats = $_SESSION['selected_seats'];
}

if (isset($_SESSION['total_price'])) {
    $total_price = $_SESSION['total_price'];
}

$cn = new Conexion();
$sql = "SELECT v.HORA_VIA, v.FECHA_VIA, v.DURACION, d.NOM_DESTINO AS Destino, dd.NOM_DESTINO AS Origen FROM viaje AS v JOIN destino AS d ON d.COD_DESTINO = v.DESTINO JOIN destino AS dd ON dd.COD_DESTINO = v.ORIGEN WHERE COD_VIA = '$cod_via'";
$res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
$row = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | BlueBus</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a los iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tus hojas de estilo personalizadas -->
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/checkout.css">
    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <?php require_once "components/navbar.php"; ?>
    <div class="main-content">
        <div class="container">
            <div class="row mt-5">
                <!-- Detalle del viaje -->
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            Detalle del viaje
                        </div>
                        <div class="card-body">
                            <h3><?php echo $row['Origen'] . ' - ' . $row['Destino']; ?></h3>
                            <p><?php echo $row['FECHA_VIA'] . ' ' . $row['HORA_VIA']; ?></p>
                        </div>
                    </div>
                    <!-- Asientos seleccionados -->
                    <div class="card mb-3">
                        <div class="card-header">
                            Asientos seleccionados
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Asiento 25</li>
                                <li>Asiento 26</li>
                                <li>Asiento 27</li>
                                <li>Asiento 28</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Datos del comprador -->
                    <div class="card">
                        <div class="card-header">
                            Datos del comprador
                        </div>
                        <div class="card-body">
                            <p>Nombres: Flavio Sebastian</p>
                            <p>Apellidos: Villanueva Medina</p>
                            <p>Correo electrónico: flaviovm2013@gmail.com</p>
                        </div>
                    </div>
                </div>
                <!-- Resumen del pedido -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Resumen del pedido
                        </div>
                        <div class="card-body">
                            <p>Cantidad de asientos: 4</p>
                            <p>Total: S/. 320.00</p>
                            <button class="btn btn-primary">Realizar pago</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
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