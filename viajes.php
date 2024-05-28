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
</head>
<body>
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