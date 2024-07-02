<?php
// Autoload de clases
require_once './Conexion.php';
require_once './Agencia.php';

$obj = new Agencia();

// Cargar el autoloader de Composer
require 'vendor/autoload.php';

use WpOrg\Requests\Requests; // Actualizado para PSR-4

// Configurar tu API Key y autenticación
$PUBLIC_KEY = "pk_test_6f2f52eb25c0c934";
$SECRET_KEY = "sk_test_d3d937df704f4082";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

try {
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

    if ($charge->outcome->type == 'venta_exitosa') {
        // Si el pago es exitoso, guardar la compra en la base de datos
        $total_price = $_POST['total_price'] / 100;
        $email = $_POST['email'];
        $cod_via = $_POST['COD_VIA'];
        $selected_seats_json = $_POST['selected_seats'];
        session_start(); // Asegurarse de que la sesión está iniciada
        $cod_user = $_SESSION['user_data']['COD_USER'];

        // Llamar al procedimiento almacenado
        $obj->comprar($cod_user, $cod_via, $total_price, $selected_seats_json);

        echo "Pago y registro exitosos.";
    } else {
        echo "Error en la transacción: " . $charge->outcome->user_message;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
