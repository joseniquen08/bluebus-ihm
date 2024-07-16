<?php
include_once 'classes/Admin.php';

if (isset($_POST['codigo_usuario'], $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['password'])) {
  $codigo_usuario = $_POST['codigo_usuario'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $correo = $_POST['correo'];
  $password = $_POST['password'];

  $objAdmin = new Admin();
  $objAdmin->actualizarUsuarioAdmin($codigo_usuario, $nombres, $apellidos, $correo, $password, "");

  echo "Estado de reserva actualizado correctamente";
}
