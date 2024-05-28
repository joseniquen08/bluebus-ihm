<?php
session_start();

$obj = new Agencia();
$usuario_correo = $_SESSION['user_email'];

$datos_usuario = $obj->BuscarUsuarioPorCorreo($usuario_correo);

// Guardar los datos del usuario en la sesión
$_SESSION['user_data'] = $datos_usuario;
?>