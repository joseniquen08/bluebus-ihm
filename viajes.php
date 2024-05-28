<?php
include_once 'Conexion.php';
include_once 'Agencia.php';

if (isset($_GET['origen']) && isset($_GET['destino']) && isset($_GET['fecha'])) {
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $fecha = $_GET['fecha'];

    $agencia = new Agencia();
    $viajes = $agencia->buscarViajes($origen, $destino, $fecha);
} else {
    die('Faltan parámetros para la búsqueda.');
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados de Viajes</title>
        <!-- Enlace a la hoja de estilos de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container py-5">
            <h1 class="display-4 mb-4">Resultados de Viajes</h1>
            <?php if (!empty($viajes)): ?>
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
            <?php else: ?>
                <div class="alert alert-warning">No se encontraron viajes para los criterios seleccionados.</div>
            <?php endif; ?>
        </div>
    </body>
</html>