<?php
include_once 'Conexion.php';
include_once 'Agencia.php';

// Verificar si los parámetros están presentes y coinciden
if (isset($_GET['origen'], $_GET['destino'], $_GET['fecha']) &&
    $_GET['origen'] && $_GET['destino'] && $_GET['fecha']) {
    // Los parámetros están presentes y no están vacíos
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $fecha = $_GET['fecha'];

    $agencia = new Agencia();
    $viajes = $agencia->buscarViajes($origen, $destino, $fecha);

    if (!empty($viajes)) {
        // Mostrar los resultados de la búsqueda
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados de Viajes</title>
        <!-- Enlace a la hoja de estilos de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Enlace a los iconos de Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="css/registro_style.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <!-- Enlace a jQuery (necesario para AJAX) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <!-- Barra de Navegación -->
        <?php require_once "components/navbar.php"; ?>

        <div class="container py-5">
            <h1 class="display-4 mb-4">Resultados de Viajes</h1>
            <ul class="list-group">
                <?php foreach ($viajes as $viaje): ?>
                <li class="list-group-item">
                    <strong>Código de Viaje:</strong> <?php echo htmlspecialchars($viaje['COD_VIA']); ?><br>
                    <strong>Fecha:</strong> <?php echo htmlspecialchars($viaje['FECHA_VIA']); ?><br>
                    <strong>Hora:</strong> <?php echo htmlspecialchars($viaje['HORA_VIA']); ?><br>
                    <strong>Duración:</strong> <?php echo htmlspecialchars($viaje['DURACION']); ?><br>
                    <strong>Precio:</strong> S/.<?php echo htmlspecialchars($viaje['PRECIO_BASE']); ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

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
<?php
    } else {
        // No se encontraron viajes para los criterios seleccionados
        echo '<h1>No se encontraron viajes para los criterios seleccionados.</h1>';
    }
} else {
    // Falta al menos uno de los parámetros necesarios
    echo '<h1>Faltan parámetros para realizar la búsqueda.</h1>';
}
?>