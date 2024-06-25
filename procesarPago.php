<?php
// Cargar el autoloader de Composer
require 'vendor/autoload.php';

use WpOrg\Requests\Requests; // Actualizado para PSR-4

// Configurar tu API Key y autenticación
$PUBLIC_KEY = "pk_test_6f2f52eb25c0c934";
$SECRET_KEY = "sk_test_d3d937df704f4082";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

$charge = $culqi->Charges->create(
    array(
        "amount" => $_POST['total_price'],
        "capture" => true,
        "currency_code" => "PEN",
        "description" => "Venta de prueba",
        "email" => $_POST['email'],
        "source_id" => $_POST['token'],
    )
);

echo "El pago se ha realizado con éxito."

?>
