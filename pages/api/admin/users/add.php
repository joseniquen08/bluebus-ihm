<?php
include_once 'classes/Admin.php';

$objAdmin = new Admin();

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$password = $_POST["password"];
$rol = $_POST["rol"];

$objAdmin->registrarUsuarioAdmin($nombres, $apellidos, $correo, $password, $rol);
