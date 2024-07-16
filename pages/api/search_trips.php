<?php
include_once 'classes/Conexion.php';
include_once 'lib/Agencia.php';

if (isset($_POST['origen']) && isset($_POST['destino']) && isset($_POST['fecha'])) {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];

    // Validar formato de fecha
    if (DateTime::createFromFormat('Y-m-d', $fecha) !== false) {
        $agencia = new Agencia();
        $viajes = $agencia->buscarViajes($origen, $destino, $fecha);

        if (!empty($viajes)) {
            echo 'results-found';
        } else {
            echo 'no-results';
        }
    } else {
        echo 'invalid-date';
    }
} else {
    echo 'missing-parameters';
}
