<?php

include_once './Conexion.php';

class Admin
{
    // VERIFICARADMIN
    function verificarCredencialesAdmin($correo, $contrasenia)
    {
        $cn = new Conexion();
        $sql = "CALL VerificarCredencialesAdmin('$correo', '$contrasenia')";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $row = mysqli_fetch_assoc($res);
        $resultado = $row['resultado'];
        return $resultado === '1';
    }
    // USUARIOS
    // REGISTRO DE USUARIO ADMIN
    function registrarUsuarioAdmin($nombres, $apellidos, $correo, $contraseña, $rol)
    {
        $cn = new Conexion();
        $sql = "CALL RegistrarUsuario('$nombres', '$apellidos', '$correo', '$contraseña', '$rol')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    // ACTUALIZAR USUARIO ADMIN
    function actualizarUsuarioAdmin($codigo, $nombres, $apellidos, $correo, $contraseña, $rol)
    {
        $cn = new Conexion();
        $sql = "CALL ActualizarUsuarioAdmin('$codigo', '$nombres', '$apellidos', '$correo', '$contraseña', '$rol')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    // DESTINO
    // REGISTRAR DESTINO ADMIN
    function registrarDestinoAdmin($codigo, $nombre, $estado, $descripcion)
    {
        $cn = new Conexion();
        $sql = "CALL RegistrarUsuario('$codigo', '$nombre', '$estado', '$descripcion')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }

    // ACTUALIZAR DESTINO ADMIN
    function actualizarDestinoAdmin($codigo, $nombre, $estado, $descripcion)
    {
        $cn = new Conexion();
        $sql = "CALL ActualizarDestinoAdmin('$codigo', '$nombre', '$estado', '$descripcion')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    //VIAJES
    //REGISTRAR VIAJES ADMIN
    function insertarViajeAdmin($codigo, $fecha_via, $hora_via, $duracion, $cod_bus, $cod_destino, $cod_origen, $precio_base)
    {
        $cn = new Conexion();
        $sql = "CALL InsertarViajeAdmin('$codigo', '$fecha_via', '$hora_via', '$duracion', '$cod_bus', '$cod_destino', '$cod_origen', '$precio_base')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    //ACTUALIZAR VIAJES ADMIN
    function actualizarViajeAdmin($codigo, $fecha_via, $hora_via, $duracion, $cod_bus, $cod_destino, $cod_origen, $precio_base)
    {
        $cn = new Conexion();
        $sql = "CALL ActualizarViajeAdmin('$codigo', '$fecha_via', '$hora_via', '$duracion', '$cod_bus', '$cod_destino', '$cod_origen', '$precio_base')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    //ELIMINAR VIAJES ADMIN
    function eliminarViajeAdmin($codigo)
    {
        $cn = new Conexion();
        $sql = "CALL EliminarViajeAdmin('$codigo')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
}