<?php
include_once 'Conexion.php';
include_once 'Agencia.php';

if (isset($_GET['origen'], $_GET['destino'], $_GET['fecha']) && $_GET['origen'] && $_GET['destino'] && $_GET['fecha']) {
    $agencia = new Agencia();
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $fecha = $_GET['fecha'];

    $viajes = $agencia->buscarViajes($origen, $destino, $fecha);

    if (!empty($viajes)) {
        $origen_nombre = $agencia->nombreDestino($origen);
        $destino_nombre = $agencia->nombreDestino($destino);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Viajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/viajes_style.css" rel="stylesheet" type="text/css"/>
    <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
    <link href="css/resultados.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php require_once "components/navbar.php"; ?>

    <div class="container py-5">
        <h1 class="display-4 mb-4 text-center">Resultados de Viajes</h1>
        <p>Resultados: <?php echo count($viajes); ?></p>
        <div class="row justify-content-center" id="results-container">
            <?php foreach ($viajes as $viaje): ?>
            <div class="col-md-8 mb-4 viaje-card" 
                    data-price="<?php echo htmlspecialchars($viaje['PRECIO_BASE']); ?>"
                    data-duration="<?php echo htmlspecialchars($viaje['DURACION']); ?>"
                    data-earliest="<?php echo htmlspecialchars($viaje['HORA_VIA']); ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <h5 class="card-title"><i class="bi bi-clock"></i> <?php echo htmlspecialchars($viaje['HORA_VIA']); ?></h5>
                            </div>
                            <div class="col-md-2 text-center">
                                <p class="mb-0"><?php echo htmlspecialchars($origen_nombre); ?></p>
                            </div>
                            <div class="col-md-2 text-center">
                                <p class="card-text mb-0"><?php echo htmlspecialchars($viaje['DURACION']); ?></p>
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="col-md-2 text-center">
                                <p class="mb-0"><?php echo htmlspecialchars($destino_nombre); ?></p>
                            </div>
                            <div class="col-md-3 text-center">
                                <p class="card-text mb-0">Fecha: <?php echo htmlspecialchars($viaje['FECHA_VIA']); ?></p>
                            </div>
                            <div class="col-md-1 text-center">
                                <a href="seleccionar_asiento.php?COD_VIA=<?php echo $viaje['COD_VIA']; ?>" class="btn btn-price">S/.<?php echo htmlspecialchars($viaje['PRECIO_BASE']); ?> <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer id="contacto" class="bg-info text-white text-center py-4">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>
</body>
</html>
<?php
    } else {
        echo '<h1>No se encontraron viajes para los criterios seleccionados.</h1>';
    }
} else {
    echo '<h1>Faltan parámetros para realizar la búsqueda.</h1>';
}
?>
