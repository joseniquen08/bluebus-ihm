-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2024 a las 06:06:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdviajesbus`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDestinoAdmin` (IN `codigo` CHAR(6), IN `nombre` VARCHAR(50), IN `estado` VARCHAR(10), IN `descripcion` TEXT)   BEGIN
    UPDATE destino SET NOM_DESTINO = nombre, ESTADO = estado, DESCRIPCION = descripcion WHERE COD_DESTINO = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarUsuario` (IN `codigo` CHAR(6), IN `nombres` VARCHAR(30), IN `apellidos` VARCHAR(30), IN `correo` VARCHAR(35), IN `contraseña` VARCHAR(25))   BEGIN
    UPDATE USUARIO SET NOMBRES = nombres, APELLIDOS = apellidos, CORREO = correo, PASSWORD = contraseña WHERE COD_USER = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarUsuarioAdmin` (IN `codigo` CHAR(6), IN `nombres` VARCHAR(30), IN `apellidos` VARCHAR(30), IN `correo` VARCHAR(35), IN `contraseña` VARCHAR(25), IN `rol` VARCHAR(10))   BEGIN
    UPDATE usuario SET NOMBRES = nombres, APELLIDOS = apellidos, CORREO = correo, PASSWORD = contraseña  WHERE COD_USER = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarViajeAdmin` (IN `codigo` CHAR(8), IN `fecha_via` DATE, IN `hora_via` TIME, IN `duracion` VARCHAR(10), IN `cod_bus` CHAR(6), IN `cod_destino` CHAR(6), IN `cod_origen` CHAR(6), IN `precio_base` DECIMAL(10,2))   BEGIN
    UPDATE viaje 
    SET FECHA_VIA = fecha_via, HORA_VIA = hora_via, DURACION = duracion, BUS = cod_bus, DESTINO = cod_destino, ORIGEN = cod_origen, PRECIO_BASE = precio_base WHERE COD_VIA = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarAsientoPorID` (IN `id_asiento` INT)   BEGIN
    SELECT * FROM ASIENTO WHERE ID = id_asiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarBusPorPlaca` (IN `placa_bus` CHAR(6))   BEGIN
    SELECT * FROM BUS WHERE PLACA = placa_bus;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarDestinoPorID` (IN `codigo_destino` CHAR(6))   BEGIN
    SELECT * FROM DESTINO WHERE COD_DESTINO = codigo_destino;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarOficinaPorID` (IN `codigo_oficina` CHAR(6))   BEGIN
    SELECT * FROM OFICINA WHERE NUM_LOCAL = codigo_oficina;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarReservaPorID` (IN `codigo_reserva` INT)   BEGIN
    SELECT * FROM RESERVA WHERE COD_RESERVA = codigo_reserva;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarTipoServicioPorID` (IN `codigo_servicio` CHAR(2))   BEGIN
    SELECT * FROM TIPO_SERVICIO WHERE COD_SERVICIO = codigo_servicio;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarUsuarioPorCorreo` (IN `correo_usuario` VARCHAR(35))   BEGIN
    SELECT * FROM USUARIO WHERE CORREO = correo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarUsuarioPorID` (IN `codigo_usuario` CHAR(6))   BEGIN
    SELECT * FROM USUARIO WHERE COD_USER = codigo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarVentaPorID` (IN `codigo_venta` INT)   BEGIN
    SELECT * FROM VENTA WHERE COD_VENTA = codigo_venta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarViajePorID` (IN `codigo_viaje` CHAR(8))   BEGIN
    SELECT * FROM VIAJE WHERE COD_VIA = codigo_viaje;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarViajes` (IN `origen_cod` CHAR(6), IN `destino_cod` CHAR(6), IN `fecha_via` DATE)   BEGIN
    SELECT * FROM VIAJE 
    WHERE ORIGEN = origen_cod 
    AND DESTINO = destino_cod 
    AND FECHA_VIA = fecha_via;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CancelarReserva` (IN `reserva_id` INT)   BEGIN
    DECLARE asiento_id INT;
    SELECT ID_ASIENTO INTO asiento_id FROM RESERVA WHERE COD_RESERVA = reserva_id;
    UPDATE ASIENTO SET ESTADO = 'Libre' WHERE ID = asiento_id;
    DELETE FROM RESERVA WHERE COD_RESERVA = reserva_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ComprarBoleto` (IN `usuario_cod` CHAR(6), IN `viaje_cod` CHAR(8), IN `asiento_id` INT)   BEGIN
    DECLARE nueva_reserva_id INT;
    DECLARE nuevo_codigo_venta INT;
    
    -- Insertar reserva
    INSERT INTO RESERVA (COD_VIA, COD_USER, ID_ASIENTO) VALUES (viaje_cod, usuario_cod, asiento_id);
    SET nueva_reserva_id = LAST_INSERT_ID();
    
    -- Insertar venta asociada a la reserva
    INSERT INTO VENTA (COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES (nueva_reserva_id, CURDATE(), 0, 'Pendiente');
    SET nuevo_codigo_venta = LAST_INSERT_ID();
    
    -- Actualizar estado del asiento a 'Reservado'
    UPDATE ASIENTO SET ESTADO = 'Reservado' WHERE ID = asiento_id;
    
    SELECT nuevo_codigo_venta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarViajeAdmin` (IN `codigo` CHAR(8))   BEGIN
    DELETE FROM viaje
    WHERE COD_VIA = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarViajeAdmin` (IN `codigo` CHAR(8), IN `fecha_via` DATE, IN `hora_via` TIME, IN `duracion` VARCHAR(10), IN `cod_bus` CHAR(6), IN `cod_destino` CHAR(6), IN `cod_origen` CHAR(6), IN `precio_base` DECIMAL(10,2))   BEGIN
    INSERT INTO viaje (COD_VIA, FECHA_VIA, HORA_VIA, DURACION, BUS, DESTINO, ORIGEN, PRECIO_BASE) 
    VALUES (codigo, fecha_via, hora_via, duracion, cod_bus, cod_destino, cod_origen, precio_base);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarAsientos` ()   BEGIN
    SELECT * FROM ASIENTO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarBuses` ()   BEGIN
    SELECT * FROM BUS;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarDestinos` ()   BEGIN
    SELECT * FROM DESTINO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarOficinas` ()   BEGIN
    SELECT * FROM OFICINA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarReservas` ()   BEGIN
    SELECT * FROM RESERVA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarTiposServicio` ()   BEGIN
    SELECT * FROM TIPO_SERVICIO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarUsuarios` ()   BEGIN
    SELECT * FROM USUARIO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarVentas` ()   BEGIN
    SELECT * FROM VENTA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarViajes` ()   BEGIN
    SELECT * FROM VIAJE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarAsientosDisponibles` (IN `viaje_cod` CHAR(8))   BEGIN
    SELECT * FROM ASIENTO WHERE COD_VIA = viaje_cod AND ESTADO = 'Libre';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarAsientosOcupados` (IN `viaje_cod` CHAR(8))   BEGIN
    SELECT * FROM ASIENTO WHERE COD_VIA = viaje_cod AND ESTADO = 'Vendido';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarDestinoAdmin` (IN `codigo` CHAR(6), IN `nombre` VARCHAR(50), IN `estado` VARCHAR(10), IN `descripcion` TEXT)   BEGIN
    INSERT INTO destino (COD_DESTINO, NOM_DESTINO, ESTADO, DESCRIPCION)
    VALUES (codigo, nombre, estado, descripcion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarUsuario` (IN `nombres` VARCHAR(30), IN `apellidos` VARCHAR(30), IN `correo` VARCHAR(35), IN `contraseña` VARCHAR(25), IN `rol` VARCHAR(10))   BEGIN
    DECLARE ultimo_codigo CHAR(6);
    DECLARE nuevo_codigo CHAR(6);
    DECLARE numero_codigo INT;
    -- Obtener el último código de usuario
    SELECT COD_USER INTO ultimo_codigo
    FROM USUARIO
    ORDER BY COD_USER DESC
    LIMIT 1;
    -- Extraer la parte numérica del código y convertirla a un número
    SET numero_codigo = CAST(SUBSTRING(ultimo_codigo, 3) AS UNSIGNED);
    -- Incrementar el número
    SET numero_codigo = numero_codigo + 1;
    -- Formatear el nuevo código con el prefijo 'US' y el número ajustado a 4 dígitos con ceros a la izquierda
    SET nuevo_codigo = CONCAT('US', LPAD(numero_codigo, 4, '0'));
    -- Insertar el nuevo usuario con el nuevo código
    INSERT INTO USUARIO (COD_USER, NOMBRES, APELLIDOS, CORREO, PASSWORD, ROL)
    VALUES (nuevo_codigo, nombres, apellidos, correo, contraseña, rol);
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `ObtenerUsuarioPorCorreo` (`usuario_correo` VARCHAR(35)) RETURNS CHAR(6) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE codigo_usuario CHAR(6);
    SELECT COD_USER INTO codigo_usuario FROM USUARIO WHERE CORREO = usuario_correo;
    RETURN codigo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `VerificarCredenciales` (`usuario_correo` VARCHAR(35), `contraseña` VARCHAR(25)) RETURNS TINYINT(1)  BEGIN
    DECLARE existe BOOLEAN;
    SELECT EXISTS(SELECT * FROM USUARIO WHERE CORREO = usuario_correo AND PASSWORD = contraseña) INTO existe;
    RETURN existe;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `VerificarCredencialesAdmin` (`usuario_correo` VARCHAR(35), `contraseña` VARCHAR(25)) RETURNS TINYINT(1)  BEGIN
    DECLARE existe BOOLEAN;
    SELECT EXISTS (SELECT * FROM USUARIO WHERE CORREO = usuario_correo AND PASSWORD = contraseña AND ROL = 'admin') INTO existe;
    RETURN existe;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `ID` int(11) NOT NULL,
  `COD_VIA` char(8) NOT NULL,
  `NUM_ASIENTO` int(11) NOT NULL,
  `TIPO_ASIENTO` varchar(20) NOT NULL,
  `ESTADO` enum('Libre','Reservado','Vendido') NOT NULL DEFAULT 'Libre',
  `PRECIO` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`ID`, `COD_VIA`, `NUM_ASIENTO`, `TIPO_ASIENTO`, `ESTADO`, `PRECIO`) VALUES
(1, 'VIA001', 1, 'Semi cama', 'Libre', 110.00),
(2, 'VIA003', 1, 'Semi cama', 'Libre', 130.00),
(3, 'VIA005', 1, 'Semi cama', 'Libre', 160.00),
(4, 'VIA007', 1, 'Semi cama', 'Libre', 140.00),
(5, 'VIA009', 1, 'Semi cama', 'Libre', 130.00),
(6, 'VIA010', 1, 'Semi cama', 'Libre', 130.00),
(7, 'VIA011', 1, 'Semi cama', 'Libre', 130.00),
(8, 'VIA012', 1, 'Semi cama', 'Libre', 130.00),
(9, 'VIA013', 1, 'Semi cama', 'Libre', 130.00),
(10, 'VIA014', 1, 'Semi cama', 'Libre', 130.00),
(11, 'VIA015', 1, 'Semi cama', 'Libre', 130.00),
(12, 'VIA016', 1, 'Semi cama', 'Libre', 130.00),
(13, 'VIA017', 1, 'Semi cama', 'Libre', 130.00),
(14, 'VIA018', 1, 'Semi cama', 'Libre', 130.00),
(15, 'VIA019', 1, 'Semi cama', 'Libre', 130.00),
(16, 'VIA020', 1, 'Semi cama', 'Libre', 130.00),
(17, 'VIA002', 1, 'Sofá cama', 'Libre', 106.00),
(18, 'VIA004', 1, 'Sofá cama', 'Libre', 118.00),
(19, 'VIA006', 1, 'Sofá cama', 'Libre', 142.00),
(20, 'VIA008', 1, 'Sofá cama', 'Libre', 178.00),
(21, 'VIA001', 2, 'Semi cama', 'Libre', 110.00),
(22, 'VIA003', 2, 'Semi cama', 'Libre', 130.00),
(23, 'VIA005', 2, 'Semi cama', 'Libre', 160.00),
(24, 'VIA007', 2, 'Semi cama', 'Libre', 140.00),
(25, 'VIA009', 2, 'Semi cama', 'Libre', 130.00),
(26, 'VIA010', 2, 'Semi cama', 'Libre', 130.00),
(27, 'VIA011', 2, 'Semi cama', 'Libre', 130.00),
(28, 'VIA012', 2, 'Semi cama', 'Libre', 130.00),
(29, 'VIA013', 2, 'Semi cama', 'Libre', 130.00),
(30, 'VIA014', 2, 'Semi cama', 'Libre', 130.00),
(31, 'VIA015', 2, 'Semi cama', 'Libre', 130.00),
(32, 'VIA016', 2, 'Semi cama', 'Libre', 130.00),
(33, 'VIA017', 2, 'Semi cama', 'Libre', 130.00),
(34, 'VIA018', 2, 'Semi cama', 'Libre', 130.00),
(35, 'VIA019', 2, 'Semi cama', 'Libre', 130.00),
(36, 'VIA020', 2, 'Semi cama', 'Libre', 130.00),
(37, 'VIA002', 2, 'Sofá cama', 'Libre', 106.00),
(38, 'VIA004', 2, 'Sofá cama', 'Libre', 118.00),
(39, 'VIA006', 2, 'Sofá cama', 'Libre', 142.00),
(40, 'VIA008', 2, 'Sofá cama', 'Libre', 178.00),
(41, 'VIA001', 3, 'Semi cama', 'Libre', 110.00),
(42, 'VIA003', 3, 'Semi cama', 'Libre', 130.00),
(43, 'VIA005', 3, 'Semi cama', 'Libre', 160.00),
(44, 'VIA007', 3, 'Semi cama', 'Libre', 140.00),
(45, 'VIA009', 3, 'Semi cama', 'Libre', 130.00),
(46, 'VIA010', 3, 'Semi cama', 'Libre', 130.00),
(47, 'VIA011', 3, 'Semi cama', 'Libre', 130.00),
(48, 'VIA012', 3, 'Semi cama', 'Libre', 130.00),
(49, 'VIA013', 3, 'Semi cama', 'Libre', 130.00),
(50, 'VIA014', 3, 'Semi cama', 'Libre', 130.00),
(51, 'VIA015', 3, 'Semi cama', 'Libre', 130.00),
(52, 'VIA016', 3, 'Semi cama', 'Libre', 130.00),
(53, 'VIA017', 3, 'Semi cama', 'Libre', 130.00),
(54, 'VIA018', 3, 'Semi cama', 'Libre', 130.00),
(55, 'VIA019', 3, 'Semi cama', 'Libre', 130.00),
(56, 'VIA020', 3, 'Semi cama', 'Libre', 130.00),
(57, 'VIA002', 3, 'Sofá cama', 'Libre', 106.00),
(58, 'VIA004', 3, 'Sofá cama', 'Libre', 118.00),
(59, 'VIA006', 3, 'Sofá cama', 'Libre', 142.00),
(60, 'VIA008', 3, 'Sofá cama', 'Libre', 178.00),
(61, 'VIA001', 4, 'Semi cama', 'Libre', 110.00),
(62, 'VIA003', 4, 'Semi cama', 'Libre', 130.00),
(63, 'VIA005', 4, 'Semi cama', 'Libre', 160.00),
(64, 'VIA007', 4, 'Semi cama', 'Libre', 140.00),
(65, 'VIA009', 4, 'Semi cama', 'Libre', 130.00),
(66, 'VIA010', 4, 'Semi cama', 'Libre', 130.00),
(67, 'VIA011', 4, 'Semi cama', 'Libre', 130.00),
(68, 'VIA012', 4, 'Semi cama', 'Libre', 130.00),
(69, 'VIA013', 4, 'Semi cama', 'Libre', 130.00),
(70, 'VIA014', 4, 'Semi cama', 'Libre', 130.00),
(71, 'VIA015', 4, 'Semi cama', 'Libre', 130.00),
(72, 'VIA016', 4, 'Semi cama', 'Libre', 130.00),
(73, 'VIA017', 4, 'Semi cama', 'Libre', 130.00),
(74, 'VIA018', 4, 'Semi cama', 'Libre', 130.00),
(75, 'VIA019', 4, 'Semi cama', 'Libre', 130.00),
(76, 'VIA020', 4, 'Semi cama', 'Libre', 130.00),
(77, 'VIA002', 4, 'Sofá cama', 'Libre', 106.00),
(78, 'VIA004', 4, 'Sofá cama', 'Libre', 118.00),
(79, 'VIA006', 4, 'Sofá cama', 'Libre', 142.00),
(80, 'VIA008', 4, 'Sofá cama', 'Libre', 178.00),
(81, 'VIA001', 5, 'Semi cama', 'Libre', 110.00),
(82, 'VIA003', 5, 'Semi cama', 'Libre', 130.00),
(83, 'VIA005', 5, 'Semi cama', 'Libre', 160.00),
(84, 'VIA007', 5, 'Semi cama', 'Libre', 140.00),
(85, 'VIA009', 5, 'Semi cama', 'Libre', 130.00),
(86, 'VIA010', 5, 'Semi cama', 'Libre', 130.00),
(87, 'VIA011', 5, 'Semi cama', 'Libre', 130.00),
(88, 'VIA012', 5, 'Semi cama', 'Libre', 130.00),
(89, 'VIA013', 5, 'Semi cama', 'Libre', 130.00),
(90, 'VIA014', 5, 'Semi cama', 'Libre', 130.00),
(91, 'VIA015', 5, 'Semi cama', 'Libre', 130.00),
(92, 'VIA016', 5, 'Semi cama', 'Libre', 130.00),
(93, 'VIA017', 5, 'Semi cama', 'Libre', 130.00),
(94, 'VIA018', 5, 'Semi cama', 'Libre', 130.00),
(95, 'VIA019', 5, 'Semi cama', 'Libre', 130.00),
(96, 'VIA020', 5, 'Semi cama', 'Libre', 130.00),
(97, 'VIA002', 5, 'Sofá cama', 'Libre', 106.00),
(98, 'VIA004', 5, 'Sofá cama', 'Libre', 118.00),
(99, 'VIA006', 5, 'Sofá cama', 'Libre', 142.00),
(100, 'VIA008', 5, 'Sofá cama', 'Libre', 178.00),
(101, 'VIA001', 6, 'Semi cama', 'Libre', 110.00),
(102, 'VIA001', 7, 'Semi cama', 'Libre', 110.00),
(103, 'VIA001', 8, 'Semi cama', 'Libre', 110.00),
(104, 'VIA001', 9, 'Semi cama', 'Libre', 110.00),
(105, 'VIA001', 10, 'Semi cama', 'Libre', 110.00),
(106, 'VIA001', 11, 'Semi cama', 'Libre', 110.00),
(107, 'VIA001', 12, 'Semi cama', 'Libre', 110.00),
(108, 'VIA001', 13, 'Semi cama', 'Libre', 110.00),
(109, 'VIA001', 14, 'Semi cama', 'Libre', 110.00),
(110, 'VIA001', 15, 'Semi cama', 'Libre', 110.00),
(111, 'VIA001', 16, 'Semi cama', 'Libre', 110.00),
(112, 'VIA001', 17, 'Semi cama', 'Libre', 110.00),
(113, 'VIA001', 18, 'Semi cama', 'Libre', 110.00),
(114, 'VIA001', 19, 'Semi cama', 'Libre', 110.00),
(115, 'VIA001', 20, 'Semi cama', 'Libre', 110.00),
(116, 'VIA001', 21, 'Semi cama', 'Libre', 110.00),
(117, 'VIA001', 22, 'Semi cama', 'Libre', 110.00),
(118, 'VIA001', 23, 'Semi cama', 'Libre', 110.00),
(119, 'VIA001', 24, 'Semi cama', 'Libre', 110.00),
(120, 'VIA001', 25, 'Semi cama', 'Libre', 110.00),
(121, 'VIA001', 26, 'Semi cama', 'Libre', 110.00),
(122, 'VIA001', 27, 'Semi cama', 'Libre', 110.00),
(123, 'VIA001', 28, 'Semi cama', 'Libre', 110.00),
(124, 'VIA001', 29, 'Semi cama', 'Libre', 110.00),
(125, 'VIA001', 30, 'Semi cama', 'Libre', 110.00),
(126, 'VIA002', 6, 'Sofá cama', 'Libre', 106.00),
(127, 'VIA002', 7, 'Sofá cama', 'Libre', 106.00),
(128, 'VIA002', 8, 'Sofá cama', 'Libre', 106.00),
(129, 'VIA002', 9, 'Sofá cama', 'Libre', 106.00),
(130, 'VIA002', 10, 'Sofá cama', 'Libre', 106.00),
(131, 'VIA002', 11, 'Sofá cama', 'Libre', 106.00),
(132, 'VIA002', 12, 'Sofá cama', 'Libre', 106.00),
(133, 'VIA002', 13, 'Sofá cama', 'Libre', 106.00),
(134, 'VIA002', 14, 'Sofá cama', 'Libre', 106.00),
(135, 'VIA002', 15, 'Sofá cama', 'Libre', 106.00),
(136, 'VIA002', 16, 'Sofá cama', 'Libre', 106.00),
(137, 'VIA002', 17, 'Sofá cama', 'Libre', 106.00),
(138, 'VIA002', 18, 'Sofá cama', 'Libre', 106.00),
(139, 'VIA002', 19, 'Sofá cama', 'Libre', 106.00),
(140, 'VIA002', 20, 'Sofá cama', 'Libre', 106.00),
(141, 'VIA002', 21, 'Sofá cama', 'Libre', 106.00),
(142, 'VIA002', 22, 'Sofá cama', 'Libre', 106.00),
(143, 'VIA002', 23, 'Sofá cama', 'Libre', 106.00),
(144, 'VIA002', 24, 'Sofá cama', 'Libre', 106.00),
(145, 'VIA002', 25, 'Sofá cama', 'Libre', 106.00),
(146, 'VIA002', 26, 'Sofá cama', 'Libre', 106.00),
(147, 'VIA002', 27, 'Sofá cama', 'Libre', 106.00),
(148, 'VIA002', 28, 'Sofá cama', 'Libre', 106.00),
(149, 'VIA002', 29, 'Sofá cama', 'Libre', 106.00),
(150, 'VIA002', 30, 'Sofá cama', 'Libre', 106.00),
(151, 'VIA003', 6, 'Semi cama', 'Libre', 130.00),
(152, 'VIA003', 7, 'Semi cama', 'Libre', 130.00),
(153, 'VIA003', 8, 'Semi cama', 'Libre', 130.00),
(154, 'VIA003', 9, 'Semi cama', 'Libre', 130.00),
(155, 'VIA003', 10, 'Semi cama', 'Libre', 130.00),
(156, 'VIA003', 11, 'Semi cama', 'Libre', 130.00),
(157, 'VIA003', 12, 'Semi cama', 'Libre', 130.00),
(158, 'VIA003', 13, 'Semi cama', 'Libre', 130.00),
(159, 'VIA003', 14, 'Semi cama', 'Libre', 130.00),
(160, 'VIA003', 15, 'Semi cama', 'Libre', 130.00),
(161, 'VIA003', 16, 'Semi cama', 'Libre', 130.00),
(162, 'VIA003', 17, 'Semi cama', 'Libre', 130.00),
(163, 'VIA003', 18, 'Semi cama', 'Libre', 130.00),
(164, 'VIA003', 19, 'Semi cama', 'Libre', 130.00),
(165, 'VIA003', 20, 'Semi cama', 'Libre', 130.00),
(166, 'VIA003', 21, 'Semi cama', 'Libre', 130.00),
(167, 'VIA003', 22, 'Semi cama', 'Libre', 130.00),
(168, 'VIA003', 23, 'Semi cama', 'Libre', 130.00),
(169, 'VIA003', 24, 'Semi cama', 'Libre', 130.00),
(170, 'VIA003', 25, 'Semi cama', 'Libre', 130.00),
(171, 'VIA003', 26, 'Semi cama', 'Libre', 130.00),
(172, 'VIA003', 27, 'Semi cama', 'Libre', 130.00),
(173, 'VIA003', 28, 'Semi cama', 'Libre', 130.00),
(174, 'VIA003', 29, 'Semi cama', 'Libre', 130.00),
(175, 'VIA003', 30, 'Semi cama', 'Libre', 130.00),
(176, 'VIA004', 6, 'Sofá cama', 'Libre', 118.00),
(177, 'VIA004', 7, 'Sofá cama', 'Libre', 118.00),
(178, 'VIA004', 8, 'Sofá cama', 'Libre', 118.00),
(179, 'VIA004', 9, 'Sofá cama', 'Libre', 118.00),
(180, 'VIA004', 10, 'Sofá cama', 'Libre', 118.00),
(181, 'VIA004', 11, 'Sofá cama', 'Libre', 118.00),
(182, 'VIA004', 12, 'Sofá cama', 'Libre', 118.00),
(183, 'VIA004', 13, 'Sofá cama', 'Libre', 118.00),
(184, 'VIA004', 14, 'Sofá cama', 'Libre', 118.00),
(185, 'VIA004', 15, 'Sofá cama', 'Libre', 118.00),
(186, 'VIA004', 16, 'Sofá cama', 'Libre', 118.00),
(187, 'VIA004', 17, 'Sofá cama', 'Libre', 118.00),
(188, 'VIA004', 18, 'Sofá cama', 'Libre', 118.00),
(189, 'VIA004', 19, 'Sofá cama', 'Libre', 118.00),
(190, 'VIA004', 20, 'Sofá cama', 'Libre', 118.00),
(191, 'VIA004', 21, 'Sofá cama', 'Libre', 118.00),
(192, 'VIA004', 22, 'Sofá cama', 'Libre', 118.00),
(193, 'VIA004', 23, 'Sofá cama', 'Libre', 118.00),
(194, 'VIA004', 24, 'Sofá cama', 'Libre', 118.00),
(195, 'VIA004', 25, 'Sofá cama', 'Libre', 118.00),
(196, 'VIA004', 26, 'Sofá cama', 'Libre', 118.00),
(197, 'VIA004', 27, 'Sofá cama', 'Libre', 118.00),
(198, 'VIA004', 28, 'Sofá cama', 'Libre', 118.00),
(199, 'VIA004', 29, 'Sofá cama', 'Libre', 118.00),
(200, 'VIA004', 30, 'Sofá cama', 'Libre', 118.00),
(201, 'VIA005', 6, 'Semi cama', 'Libre', 160.00),
(202, 'VIA005', 7, 'Semi cama', 'Libre', 160.00),
(203, 'VIA005', 8, 'Semi cama', 'Libre', 160.00),
(204, 'VIA005', 9, 'Semi cama', 'Libre', 160.00),
(205, 'VIA005', 10, 'Semi cama', 'Libre', 160.00),
(206, 'VIA005', 11, 'Semi cama', 'Libre', 160.00),
(207, 'VIA005', 12, 'Semi cama', 'Libre', 160.00),
(208, 'VIA005', 13, 'Semi cama', 'Libre', 160.00),
(209, 'VIA005', 14, 'Semi cama', 'Libre', 160.00),
(210, 'VIA005', 15, 'Semi cama', 'Libre', 160.00),
(211, 'VIA005', 16, 'Semi cama', 'Libre', 160.00),
(212, 'VIA005', 17, 'Semi cama', 'Libre', 160.00),
(213, 'VIA005', 18, 'Semi cama', 'Libre', 160.00),
(214, 'VIA005', 19, 'Semi cama', 'Libre', 160.00),
(215, 'VIA005', 20, 'Semi cama', 'Libre', 160.00),
(216, 'VIA005', 21, 'Semi cama', 'Libre', 160.00),
(217, 'VIA005', 22, 'Semi cama', 'Libre', 160.00),
(218, 'VIA005', 23, 'Semi cama', 'Libre', 160.00),
(219, 'VIA005', 24, 'Semi cama', 'Libre', 160.00),
(220, 'VIA005', 25, 'Semi cama', 'Libre', 160.00),
(221, 'VIA005', 26, 'Semi cama', 'Libre', 160.00),
(222, 'VIA005', 27, 'Semi cama', 'Libre', 160.00),
(223, 'VIA005', 28, 'Semi cama', 'Libre', 160.00),
(224, 'VIA005', 29, 'Semi cama', 'Libre', 160.00),
(225, 'VIA005', 30, 'Semi cama', 'Libre', 160.00),
(226, 'VIA006', 6, 'Sofá cama', 'Libre', 142.00),
(227, 'VIA006', 7, 'Sofá cama', 'Libre', 142.00),
(228, 'VIA006', 8, 'Sofá cama', 'Libre', 142.00),
(229, 'VIA006', 9, 'Sofá cama', 'Libre', 142.00),
(230, 'VIA006', 10, 'Sofá cama', 'Libre', 142.00),
(231, 'VIA006', 11, 'Sofá cama', 'Libre', 142.00),
(232, 'VIA006', 12, 'Sofá cama', 'Libre', 142.00),
(233, 'VIA006', 13, 'Sofá cama', 'Libre', 142.00),
(234, 'VIA006', 14, 'Sofá cama', 'Libre', 142.00),
(235, 'VIA006', 15, 'Sofá cama', 'Libre', 142.00),
(236, 'VIA006', 16, 'Sofá cama', 'Libre', 142.00),
(237, 'VIA006', 17, 'Sofá cama', 'Libre', 142.00),
(238, 'VIA006', 18, 'Sofá cama', 'Libre', 142.00),
(239, 'VIA006', 19, 'Sofá cama', 'Libre', 142.00),
(240, 'VIA006', 20, 'Sofá cama', 'Libre', 142.00),
(241, 'VIA006', 21, 'Sofá cama', 'Libre', 142.00),
(242, 'VIA006', 22, 'Sofá cama', 'Libre', 142.00),
(243, 'VIA006', 23, 'Sofá cama', 'Libre', 142.00),
(244, 'VIA006', 24, 'Sofá cama', 'Libre', 142.00),
(245, 'VIA006', 25, 'Sofá cama', 'Libre', 142.00),
(246, 'VIA006', 26, 'Sofá cama', 'Libre', 142.00),
(247, 'VIA006', 27, 'Sofá cama', 'Libre', 142.00),
(248, 'VIA006', 28, 'Sofá cama', 'Libre', 142.00),
(249, 'VIA006', 29, 'Sofá cama', 'Libre', 142.00),
(250, 'VIA006', 30, 'Sofá cama', 'Libre', 142.00),
(251, 'VIA007', 6, 'Semi cama', 'Libre', 140.00),
(252, 'VIA007', 7, 'Semi cama', 'Libre', 140.00),
(253, 'VIA007', 8, 'Semi cama', 'Libre', 140.00),
(254, 'VIA007', 9, 'Semi cama', 'Libre', 140.00),
(255, 'VIA007', 10, 'Semi cama', 'Libre', 140.00),
(256, 'VIA007', 11, 'Semi cama', 'Libre', 140.00),
(257, 'VIA007', 12, 'Semi cama', 'Libre', 140.00),
(258, 'VIA007', 13, 'Semi cama', 'Libre', 140.00),
(259, 'VIA007', 14, 'Semi cama', 'Libre', 140.00),
(260, 'VIA007', 15, 'Semi cama', 'Libre', 140.00),
(261, 'VIA007', 16, 'Semi cama', 'Libre', 140.00),
(262, 'VIA007', 17, 'Semi cama', 'Libre', 140.00),
(263, 'VIA007', 18, 'Semi cama', 'Libre', 140.00),
(264, 'VIA007', 19, 'Semi cama', 'Libre', 140.00),
(265, 'VIA007', 20, 'Semi cama', 'Libre', 140.00),
(266, 'VIA007', 21, 'Semi cama', 'Libre', 140.00),
(267, 'VIA007', 22, 'Semi cama', 'Libre', 140.00),
(268, 'VIA007', 23, 'Semi cama', 'Libre', 140.00),
(269, 'VIA007', 24, 'Semi cama', 'Libre', 140.00),
(270, 'VIA007', 25, 'Semi cama', 'Libre', 140.00),
(271, 'VIA007', 26, 'Semi cama', 'Libre', 140.00),
(272, 'VIA007', 27, 'Semi cama', 'Libre', 140.00),
(273, 'VIA007', 28, 'Semi cama', 'Libre', 140.00),
(274, 'VIA007', 29, 'Semi cama', 'Libre', 140.00),
(275, 'VIA007', 30, 'Semi cama', 'Libre', 140.00),
(276, 'VIA008', 6, 'Sofá cama', 'Libre', 178.00),
(277, 'VIA008', 7, 'Sofá cama', 'Libre', 178.00),
(278, 'VIA008', 8, 'Sofá cama', 'Libre', 178.00),
(279, 'VIA008', 9, 'Sofá cama', 'Libre', 178.00),
(280, 'VIA008', 10, 'Sofá cama', 'Libre', 178.00),
(281, 'VIA008', 11, 'Sofá cama', 'Libre', 178.00),
(282, 'VIA008', 12, 'Sofá cama', 'Libre', 178.00),
(283, 'VIA008', 13, 'Sofá cama', 'Libre', 178.00),
(284, 'VIA008', 14, 'Sofá cama', 'Libre', 178.00),
(285, 'VIA008', 15, 'Sofá cama', 'Libre', 178.00),
(286, 'VIA008', 16, 'Sofá cama', 'Libre', 178.00),
(287, 'VIA008', 17, 'Sofá cama', 'Libre', 178.00),
(288, 'VIA008', 18, 'Sofá cama', 'Libre', 178.00),
(289, 'VIA008', 19, 'Sofá cama', 'Libre', 178.00),
(290, 'VIA008', 20, 'Sofá cama', 'Libre', 178.00),
(291, 'VIA008', 21, 'Sofá cama', 'Libre', 178.00),
(292, 'VIA008', 22, 'Sofá cama', 'Libre', 178.00),
(293, 'VIA008', 23, 'Sofá cama', 'Libre', 178.00),
(294, 'VIA008', 24, 'Sofá cama', 'Libre', 178.00),
(295, 'VIA008', 25, 'Sofá cama', 'Libre', 178.00),
(296, 'VIA008', 26, 'Sofá cama', 'Libre', 178.00),
(297, 'VIA008', 27, 'Sofá cama', 'Libre', 178.00),
(298, 'VIA008', 28, 'Sofá cama', 'Libre', 178.00),
(299, 'VIA008', 29, 'Sofá cama', 'Libre', 178.00),
(300, 'VIA008', 30, 'Sofá cama', 'Libre', 178.00),
(301, 'VIA009', 6, 'Semi cama', 'Libre', 130.00),
(302, 'VIA009', 7, 'Semi cama', 'Libre', 130.00),
(303, 'VIA009', 8, 'Semi cama', 'Libre', 130.00),
(304, 'VIA009', 9, 'Semi cama', 'Libre', 130.00),
(305, 'VIA009', 10, 'Semi cama', 'Libre', 130.00),
(306, 'VIA009', 11, 'Semi cama', 'Libre', 130.00),
(307, 'VIA009', 12, 'Semi cama', 'Libre', 130.00),
(308, 'VIA009', 13, 'Semi cama', 'Libre', 130.00),
(309, 'VIA009', 14, 'Semi cama', 'Libre', 130.00),
(310, 'VIA009', 15, 'Semi cama', 'Libre', 130.00),
(311, 'VIA009', 16, 'Semi cama', 'Libre', 130.00),
(312, 'VIA009', 17, 'Semi cama', 'Libre', 130.00),
(313, 'VIA009', 18, 'Semi cama', 'Libre', 130.00),
(314, 'VIA009', 19, 'Semi cama', 'Libre', 130.00),
(315, 'VIA009', 20, 'Semi cama', 'Libre', 130.00),
(316, 'VIA009', 21, 'Semi cama', 'Libre', 130.00),
(317, 'VIA009', 22, 'Semi cama', 'Libre', 130.00),
(318, 'VIA009', 23, 'Semi cama', 'Libre', 130.00),
(319, 'VIA009', 24, 'Semi cama', 'Libre', 130.00),
(320, 'VIA009', 25, 'Semi cama', 'Libre', 130.00),
(321, 'VIA009', 26, 'Semi cama', 'Libre', 130.00),
(322, 'VIA009', 27, 'Semi cama', 'Libre', 130.00),
(323, 'VIA009', 28, 'Semi cama', 'Libre', 130.00),
(324, 'VIA009', 29, 'Semi cama', 'Libre', 130.00),
(325, 'VIA009', 30, 'Semi cama', 'Libre', 130.00),
(326, 'VIA010', 6, 'Semi cama', 'Libre', 130.00),
(327, 'VIA010', 7, 'Semi cama', 'Libre', 130.00),
(328, 'VIA010', 8, 'Semi cama', 'Libre', 130.00),
(329, 'VIA010', 9, 'Semi cama', 'Libre', 130.00),
(330, 'VIA010', 10, 'Semi cama', 'Libre', 130.00),
(331, 'VIA010', 11, 'Semi cama', 'Libre', 130.00),
(332, 'VIA010', 12, 'Semi cama', 'Libre', 130.00),
(333, 'VIA010', 13, 'Semi cama', 'Libre', 130.00),
(334, 'VIA010', 14, 'Semi cama', 'Libre', 130.00),
(335, 'VIA010', 15, 'Semi cama', 'Libre', 130.00),
(336, 'VIA010', 16, 'Semi cama', 'Libre', 130.00),
(337, 'VIA010', 17, 'Semi cama', 'Libre', 130.00),
(338, 'VIA010', 18, 'Semi cama', 'Libre', 130.00),
(339, 'VIA010', 19, 'Semi cama', 'Libre', 130.00),
(340, 'VIA010', 20, 'Semi cama', 'Libre', 130.00),
(341, 'VIA010', 21, 'Semi cama', 'Libre', 130.00),
(342, 'VIA010', 22, 'Semi cama', 'Libre', 130.00),
(343, 'VIA010', 23, 'Semi cama', 'Libre', 130.00),
(344, 'VIA010', 24, 'Semi cama', 'Libre', 130.00),
(345, 'VIA010', 25, 'Semi cama', 'Libre', 130.00),
(346, 'VIA010', 26, 'Semi cama', 'Libre', 130.00),
(347, 'VIA010', 27, 'Semi cama', 'Libre', 130.00),
(348, 'VIA010', 28, 'Semi cama', 'Libre', 130.00),
(349, 'VIA010', 29, 'Semi cama', 'Libre', 130.00),
(350, 'VIA010', 30, 'Semi cama', 'Libre', 130.00),
(351, 'VIA011', 6, 'Semi cama', 'Libre', 130.00),
(352, 'VIA011', 7, 'Semi cama', 'Libre', 130.00),
(353, 'VIA011', 8, 'Semi cama', 'Libre', 130.00),
(354, 'VIA011', 9, 'Semi cama', 'Libre', 130.00),
(355, 'VIA011', 10, 'Semi cama', 'Libre', 130.00),
(356, 'VIA011', 11, 'Semi cama', 'Libre', 130.00),
(357, 'VIA011', 12, 'Semi cama', 'Libre', 130.00),
(358, 'VIA011', 13, 'Semi cama', 'Libre', 130.00),
(359, 'VIA011', 14, 'Semi cama', 'Libre', 130.00),
(360, 'VIA011', 15, 'Semi cama', 'Libre', 130.00),
(361, 'VIA011', 16, 'Semi cama', 'Libre', 130.00),
(362, 'VIA011', 17, 'Semi cama', 'Libre', 130.00),
(363, 'VIA011', 18, 'Semi cama', 'Libre', 130.00),
(364, 'VIA011', 19, 'Semi cama', 'Libre', 130.00),
(365, 'VIA011', 20, 'Semi cama', 'Libre', 130.00),
(366, 'VIA011', 21, 'Semi cama', 'Libre', 130.00),
(367, 'VIA011', 22, 'Semi cama', 'Libre', 130.00),
(368, 'VIA011', 23, 'Semi cama', 'Libre', 130.00),
(369, 'VIA011', 24, 'Semi cama', 'Libre', 130.00),
(370, 'VIA011', 25, 'Semi cama', 'Libre', 130.00),
(371, 'VIA011', 26, 'Semi cama', 'Libre', 130.00),
(372, 'VIA011', 27, 'Semi cama', 'Libre', 130.00),
(373, 'VIA011', 28, 'Semi cama', 'Libre', 130.00),
(374, 'VIA011', 29, 'Semi cama', 'Libre', 130.00),
(375, 'VIA011', 30, 'Semi cama', 'Libre', 130.00),
(376, 'VIA012', 6, 'Sofá cama', 'Libre', 178.00),
(377, 'VIA012', 7, 'Sofá cama', 'Libre', 178.00),
(378, 'VIA012', 8, 'Sofá cama', 'Libre', 178.00),
(379, 'VIA012', 9, 'Sofá cama', 'Libre', 178.00),
(380, 'VIA012', 10, 'Sofá cama', 'Libre', 178.00),
(381, 'VIA012', 11, 'Sofá cama', 'Libre', 178.00),
(382, 'VIA012', 12, 'Sofá cama', 'Libre', 178.00),
(383, 'VIA012', 13, 'Sofá cama', 'Libre', 178.00),
(384, 'VIA012', 14, 'Sofá cama', 'Libre', 178.00),
(385, 'VIA012', 15, 'Sofá cama', 'Libre', 178.00),
(386, 'VIA012', 16, 'Sofá cama', 'Libre', 178.00),
(387, 'VIA012', 17, 'Sofá cama', 'Libre', 178.00),
(388, 'VIA012', 18, 'Sofá cama', 'Libre', 178.00),
(389, 'VIA012', 19, 'Sofá cama', 'Libre', 178.00),
(390, 'VIA012', 20, 'Sofá cama', 'Libre', 178.00),
(391, 'VIA012', 21, 'Sofá cama', 'Libre', 178.00),
(392, 'VIA012', 22, 'Sofá cama', 'Libre', 178.00),
(393, 'VIA012', 23, 'Sofá cama', 'Libre', 178.00),
(394, 'VIA012', 24, 'Sofá cama', 'Libre', 178.00),
(395, 'VIA012', 25, 'Sofá cama', 'Libre', 178.00),
(396, 'VIA012', 26, 'Sofá cama', 'Libre', 178.00),
(397, 'VIA012', 27, 'Sofá cama', 'Libre', 178.00),
(398, 'VIA012', 28, 'Sofá cama', 'Libre', 178.00),
(399, 'VIA012', 29, 'Sofá cama', 'Libre', 178.00),
(400, 'VIA012', 30, 'Sofá cama', 'Libre', 178.00),
(401, 'VIA013', 6, 'Semi cama', 'Libre', 160.00),
(402, 'VIA013', 7, 'Semi cama', 'Libre', 160.00),
(403, 'VIA013', 8, 'Semi cama', 'Libre', 160.00),
(404, 'VIA013', 9, 'Semi cama', 'Libre', 160.00),
(405, 'VIA013', 10, 'Semi cama', 'Libre', 160.00),
(406, 'VIA013', 11, 'Semi cama', 'Libre', 160.00),
(407, 'VIA013', 12, 'Semi cama', 'Libre', 160.00),
(408, 'VIA013', 13, 'Semi cama', 'Libre', 160.00),
(409, 'VIA013', 14, 'Semi cama', 'Libre', 160.00),
(410, 'VIA013', 15, 'Semi cama', 'Libre', 160.00),
(411, 'VIA013', 16, 'Semi cama', 'Libre', 160.00),
(412, 'VIA013', 17, 'Semi cama', 'Libre', 160.00),
(413, 'VIA013', 18, 'Semi cama', 'Libre', 160.00),
(414, 'VIA013', 19, 'Semi cama', 'Libre', 160.00),
(415, 'VIA013', 20, 'Semi cama', 'Libre', 160.00),
(416, 'VIA013', 21, 'Semi cama', 'Libre', 160.00),
(417, 'VIA013', 22, 'Semi cama', 'Libre', 160.00),
(418, 'VIA013', 23, 'Semi cama', 'Libre', 160.00),
(419, 'VIA013', 24, 'Semi cama', 'Libre', 160.00),
(420, 'VIA013', 25, 'Semi cama', 'Libre', 160.00),
(421, 'VIA013', 26, 'Semi cama', 'Libre', 160.00),
(422, 'VIA013', 27, 'Semi cama', 'Libre', 160.00),
(423, 'VIA013', 28, 'Semi cama', 'Libre', 160.00),
(424, 'VIA013', 29, 'Semi cama', 'Libre', 160.00),
(425, 'VIA013', 30, 'Semi cama', 'Libre', 160.00),
(426, 'VIA014', 6, 'Sofá cama', 'Libre', 180.00),
(427, 'VIA014', 7, 'Sofá cama', 'Libre', 180.00),
(428, 'VIA014', 8, 'Sofá cama', 'Libre', 180.00),
(429, 'VIA014', 9, 'Sofá cama', 'Libre', 180.00),
(430, 'VIA014', 10, 'Sofá cama', 'Libre', 180.00),
(431, 'VIA014', 11, 'Sofá cama', 'Libre', 180.00),
(432, 'VIA014', 12, 'Sofá cama', 'Libre', 180.00),
(433, 'VIA014', 13, 'Sofá cama', 'Libre', 180.00),
(434, 'VIA014', 14, 'Sofá cama', 'Libre', 180.00),
(435, 'VIA014', 15, 'Sofá cama', 'Libre', 180.00),
(436, 'VIA014', 16, 'Sofá cama', 'Libre', 180.00),
(437, 'VIA014', 17, 'Sofá cama', 'Libre', 180.00),
(438, 'VIA014', 18, 'Sofá cama', 'Libre', 180.00),
(439, 'VIA014', 19, 'Sofá cama', 'Libre', 180.00),
(440, 'VIA014', 20, 'Sofá cama', 'Libre', 180.00),
(441, 'VIA014', 21, 'Sofá cama', 'Libre', 180.00),
(442, 'VIA014', 22, 'Sofá cama', 'Libre', 180.00),
(443, 'VIA014', 23, 'Sofá cama', 'Libre', 180.00),
(444, 'VIA014', 24, 'Sofá cama', 'Libre', 180.00),
(445, 'VIA014', 25, 'Sofá cama', 'Libre', 180.00),
(446, 'VIA014', 26, 'Sofá cama', 'Libre', 180.00),
(447, 'VIA014', 27, 'Sofá cama', 'Libre', 180.00),
(448, 'VIA014', 28, 'Sofá cama', 'Libre', 180.00),
(449, 'VIA014', 29, 'Sofá cama', 'Libre', 180.00),
(450, 'VIA014', 30, 'Sofá cama', 'Libre', 180.00),
(451, 'VIA015', 6, 'Semi cama', 'Libre', 145.00),
(452, 'VIA015', 7, 'Semi cama', 'Libre', 145.00),
(453, 'VIA015', 8, 'Semi cama', 'Libre', 145.00),
(454, 'VIA015', 9, 'Semi cama', 'Libre', 145.00),
(455, 'VIA015', 10, 'Semi cama', 'Libre', 145.00),
(456, 'VIA015', 11, 'Semi cama', 'Libre', 145.00),
(457, 'VIA015', 12, 'Semi cama', 'Libre', 145.00),
(458, 'VIA015', 13, 'Semi cama', 'Libre', 145.00),
(459, 'VIA015', 14, 'Semi cama', 'Libre', 145.00),
(460, 'VIA015', 15, 'Semi cama', 'Libre', 145.00),
(461, 'VIA015', 16, 'Semi cama', 'Libre', 145.00),
(462, 'VIA015', 17, 'Semi cama', 'Libre', 145.00),
(463, 'VIA015', 18, 'Semi cama', 'Libre', 145.00),
(464, 'VIA015', 19, 'Semi cama', 'Libre', 145.00),
(465, 'VIA015', 20, 'Semi cama', 'Libre', 145.00),
(466, 'VIA015', 21, 'Semi cama', 'Libre', 145.00),
(467, 'VIA015', 22, 'Semi cama', 'Libre', 145.00),
(468, 'VIA015', 23, 'Semi cama', 'Libre', 145.00),
(469, 'VIA015', 24, 'Semi cama', 'Libre', 145.00),
(470, 'VIA015', 25, 'Semi cama', 'Libre', 145.00),
(471, 'VIA015', 26, 'Semi cama', 'Libre', 145.00),
(472, 'VIA015', 27, 'Semi cama', 'Libre', 145.00),
(473, 'VIA015', 28, 'Semi cama', 'Libre', 145.00),
(474, 'VIA015', 29, 'Semi cama', 'Libre', 145.00),
(475, 'VIA015', 30, 'Semi cama', 'Libre', 145.00),
(476, 'VIA016', 6, 'Semi cama', 'Libre', 130.00),
(477, 'VIA016', 7, 'Semi cama', 'Libre', 130.00),
(478, 'VIA016', 8, 'Semi cama', 'Libre', 130.00),
(479, 'VIA016', 9, 'Semi cama', 'Libre', 130.00),
(480, 'VIA016', 10, 'Semi cama', 'Libre', 130.00),
(481, 'VIA016', 11, 'Semi cama', 'Libre', 130.00),
(482, 'VIA016', 12, 'Semi cama', 'Libre', 130.00),
(483, 'VIA016', 13, 'Semi cama', 'Libre', 130.00),
(484, 'VIA016', 14, 'Semi cama', 'Libre', 130.00),
(485, 'VIA016', 15, 'Semi cama', 'Libre', 130.00),
(486, 'VIA016', 16, 'Semi cama', 'Libre', 130.00),
(487, 'VIA016', 17, 'Semi cama', 'Libre', 130.00),
(488, 'VIA016', 18, 'Semi cama', 'Libre', 130.00),
(489, 'VIA016', 19, 'Semi cama', 'Libre', 130.00),
(490, 'VIA016', 20, 'Semi cama', 'Libre', 130.00),
(491, 'VIA016', 21, 'Semi cama', 'Libre', 130.00),
(492, 'VIA016', 22, 'Semi cama', 'Libre', 130.00),
(493, 'VIA016', 23, 'Semi cama', 'Libre', 130.00),
(494, 'VIA016', 24, 'Semi cama', 'Libre', 130.00),
(495, 'VIA016', 25, 'Semi cama', 'Libre', 130.00),
(496, 'VIA016', 26, 'Semi cama', 'Libre', 130.00),
(497, 'VIA016', 27, 'Semi cama', 'Libre', 130.00),
(498, 'VIA016', 28, 'Semi cama', 'Libre', 130.00),
(499, 'VIA016', 29, 'Semi cama', 'Libre', 130.00),
(500, 'VIA016', 30, 'Semi cama', 'Libre', 130.00),
(501, 'VIA017', 6, 'Semi cama', 'Libre', 130.00),
(502, 'VIA017', 7, 'Semi cama', 'Libre', 130.00),
(503, 'VIA017', 8, 'Semi cama', 'Libre', 130.00),
(504, 'VIA017', 9, 'Semi cama', 'Libre', 130.00),
(505, 'VIA017', 10, 'Semi cama', 'Libre', 130.00),
(506, 'VIA017', 11, 'Semi cama', 'Libre', 130.00),
(507, 'VIA017', 12, 'Semi cama', 'Libre', 130.00),
(508, 'VIA017', 13, 'Semi cama', 'Libre', 130.00),
(509, 'VIA017', 14, 'Semi cama', 'Libre', 130.00),
(510, 'VIA017', 15, 'Semi cama', 'Libre', 130.00),
(511, 'VIA017', 16, 'Semi cama', 'Libre', 130.00),
(512, 'VIA017', 17, 'Semi cama', 'Libre', 130.00),
(513, 'VIA017', 18, 'Semi cama', 'Libre', 130.00),
(514, 'VIA017', 19, 'Semi cama', 'Libre', 130.00),
(515, 'VIA017', 20, 'Semi cama', 'Libre', 130.00),
(516, 'VIA017', 21, 'Semi cama', 'Libre', 130.00),
(517, 'VIA017', 22, 'Semi cama', 'Libre', 130.00),
(518, 'VIA017', 23, 'Semi cama', 'Libre', 130.00),
(519, 'VIA017', 24, 'Semi cama', 'Libre', 130.00),
(520, 'VIA017', 25, 'Semi cama', 'Libre', 130.00),
(521, 'VIA017', 26, 'Semi cama', 'Libre', 130.00),
(522, 'VIA017', 27, 'Semi cama', 'Libre', 130.00),
(523, 'VIA017', 28, 'Semi cama', 'Libre', 130.00),
(524, 'VIA017', 29, 'Semi cama', 'Libre', 130.00),
(525, 'VIA017', 30, 'Semi cama', 'Libre', 130.00),
(526, 'VIA018', 6, 'Semi cama', 'Libre', 130.00),
(527, 'VIA018', 7, 'Semi cama', 'Libre', 130.00),
(528, 'VIA018', 8, 'Semi cama', 'Libre', 130.00),
(529, 'VIA018', 9, 'Semi cama', 'Libre', 130.00),
(530, 'VIA018', 10, 'Semi cama', 'Libre', 130.00),
(531, 'VIA018', 11, 'Semi cama', 'Libre', 130.00),
(532, 'VIA018', 12, 'Semi cama', 'Libre', 130.00),
(533, 'VIA018', 13, 'Semi cama', 'Libre', 130.00),
(534, 'VIA018', 14, 'Semi cama', 'Libre', 130.00),
(535, 'VIA018', 15, 'Semi cama', 'Libre', 130.00),
(536, 'VIA018', 16, 'Semi cama', 'Libre', 130.00),
(537, 'VIA018', 17, 'Semi cama', 'Libre', 130.00),
(538, 'VIA018', 18, 'Semi cama', 'Libre', 130.00),
(539, 'VIA018', 19, 'Semi cama', 'Libre', 130.00),
(540, 'VIA018', 20, 'Semi cama', 'Libre', 130.00),
(541, 'VIA018', 21, 'Semi cama', 'Libre', 130.00),
(542, 'VIA018', 22, 'Semi cama', 'Libre', 130.00),
(543, 'VIA018', 23, 'Semi cama', 'Libre', 130.00),
(544, 'VIA018', 24, 'Semi cama', 'Libre', 130.00),
(545, 'VIA018', 25, 'Semi cama', 'Libre', 130.00),
(546, 'VIA018', 26, 'Semi cama', 'Libre', 130.00),
(547, 'VIA018', 27, 'Semi cama', 'Libre', 130.00),
(548, 'VIA018', 28, 'Semi cama', 'Libre', 130.00),
(549, 'VIA018', 29, 'Semi cama', 'Libre', 130.00),
(550, 'VIA018', 30, 'Semi cama', 'Libre', 130.00),
(551, 'VIA019', 6, 'Semi cama', 'Libre', 130.00),
(552, 'VIA019', 7, 'Semi cama', 'Libre', 130.00),
(553, 'VIA019', 8, 'Semi cama', 'Libre', 130.00),
(554, 'VIA019', 9, 'Semi cama', 'Libre', 130.00),
(555, 'VIA019', 10, 'Semi cama', 'Libre', 130.00),
(556, 'VIA019', 11, 'Semi cama', 'Libre', 130.00),
(557, 'VIA019', 12, 'Semi cama', 'Libre', 130.00),
(558, 'VIA019', 13, 'Semi cama', 'Libre', 130.00),
(559, 'VIA019', 14, 'Semi cama', 'Libre', 130.00),
(560, 'VIA019', 15, 'Semi cama', 'Libre', 130.00),
(561, 'VIA019', 16, 'Semi cama', 'Libre', 130.00),
(562, 'VIA019', 17, 'Semi cama', 'Libre', 130.00),
(563, 'VIA019', 18, 'Semi cama', 'Libre', 130.00),
(564, 'VIA019', 19, 'Semi cama', 'Libre', 130.00),
(565, 'VIA019', 20, 'Semi cama', 'Libre', 130.00),
(566, 'VIA019', 21, 'Semi cama', 'Libre', 130.00),
(567, 'VIA019', 22, 'Semi cama', 'Libre', 130.00),
(568, 'VIA019', 23, 'Semi cama', 'Libre', 130.00),
(569, 'VIA019', 24, 'Semi cama', 'Libre', 130.00),
(570, 'VIA019', 25, 'Semi cama', 'Libre', 130.00),
(571, 'VIA019', 26, 'Semi cama', 'Libre', 130.00),
(572, 'VIA019', 27, 'Semi cama', 'Libre', 130.00),
(573, 'VIA019', 28, 'Semi cama', 'Libre', 130.00),
(574, 'VIA019', 29, 'Semi cama', 'Libre', 130.00),
(575, 'VIA019', 30, 'Semi cama', 'Libre', 130.00),
(576, 'VIA020', 6, 'Semi cama', 'Libre', 130.00),
(577, 'VIA020', 7, 'Semi cama', 'Libre', 130.00),
(578, 'VIA020', 8, 'Semi cama', 'Libre', 130.00),
(579, 'VIA020', 9, 'Semi cama', 'Libre', 130.00),
(580, 'VIA020', 10, 'Semi cama', 'Libre', 130.00),
(581, 'VIA020', 11, 'Semi cama', 'Libre', 130.00),
(582, 'VIA020', 12, 'Semi cama', 'Libre', 130.00),
(583, 'VIA020', 13, 'Semi cama', 'Libre', 130.00),
(584, 'VIA020', 14, 'Semi cama', 'Libre', 130.00),
(585, 'VIA020', 15, 'Semi cama', 'Libre', 130.00),
(586, 'VIA020', 16, 'Semi cama', 'Libre', 130.00),
(587, 'VIA020', 17, 'Semi cama', 'Libre', 130.00),
(588, 'VIA020', 18, 'Semi cama', 'Libre', 130.00),
(589, 'VIA020', 19, 'Semi cama', 'Libre', 130.00),
(590, 'VIA020', 20, 'Semi cama', 'Libre', 130.00),
(591, 'VIA020', 21, 'Semi cama', 'Libre', 130.00),
(592, 'VIA020', 22, 'Semi cama', 'Libre', 130.00),
(593, 'VIA020', 23, 'Semi cama', 'Libre', 130.00),
(594, 'VIA020', 24, 'Semi cama', 'Libre', 130.00),
(595, 'VIA020', 25, 'Semi cama', 'Libre', 130.00),
(596, 'VIA020', 26, 'Semi cama', 'Libre', 130.00),
(597, 'VIA020', 27, 'Semi cama', 'Libre', 130.00),
(598, 'VIA020', 28, 'Semi cama', 'Libre', 130.00),
(599, 'VIA020', 29, 'Semi cama', 'Libre', 130.00),
(600, 'VIA020', 30, 'Semi cama', 'Libre', 130.00),
(601, 'VIA021', 6, 'Semi cama', 'Libre', 130.00),
(602, 'VIA021', 7, 'Semi cama', 'Libre', 130.00),
(603, 'VIA021', 8, 'Semi cama', 'Libre', 130.00),
(604, 'VIA021', 9, 'Semi cama', 'Libre', 130.00),
(605, 'VIA021', 10, 'Semi cama', 'Libre', 130.00),
(606, 'VIA021', 11, 'Semi cama', 'Libre', 130.00),
(607, 'VIA021', 12, 'Semi cama', 'Libre', 130.00),
(608, 'VIA021', 13, 'Semi cama', 'Libre', 130.00),
(609, 'VIA021', 14, 'Semi cama', 'Libre', 130.00),
(610, 'VIA021', 15, 'Semi cama', 'Libre', 130.00),
(611, 'VIA021', 16, 'Semi cama', 'Libre', 130.00),
(612, 'VIA021', 17, 'Semi cama', 'Libre', 130.00),
(613, 'VIA021', 18, 'Semi cama', 'Libre', 130.00),
(614, 'VIA021', 19, 'Semi cama', 'Libre', 130.00),
(615, 'VIA021', 20, 'Semi cama', 'Libre', 130.00),
(616, 'VIA021', 21, 'Semi cama', 'Libre', 130.00),
(617, 'VIA021', 22, 'Semi cama', 'Libre', 130.00),
(618, 'VIA021', 23, 'Semi cama', 'Libre', 130.00),
(619, 'VIA021', 24, 'Semi cama', 'Libre', 130.00),
(620, 'VIA021', 25, 'Semi cama', 'Libre', 130.00),
(621, 'VIA021', 26, 'Semi cama', 'Libre', 130.00),
(622, 'VIA021', 27, 'Semi cama', 'Libre', 130.00),
(623, 'VIA021', 28, 'Semi cama', 'Libre', 130.00),
(624, 'VIA021', 29, 'Semi cama', 'Libre', 130.00),
(625, 'VIA021', 30, 'Semi cama', 'Libre', 130.00),
(626, 'VIA022', 6, 'Semi cama', 'Libre', 130.00),
(627, 'VIA022', 7, 'Semi cama', 'Libre', 130.00),
(628, 'VIA022', 8, 'Semi cama', 'Libre', 130.00),
(629, 'VIA022', 9, 'Semi cama', 'Libre', 130.00),
(630, 'VIA022', 10, 'Semi cama', 'Libre', 130.00),
(631, 'VIA022', 11, 'Semi cama', 'Libre', 130.00),
(632, 'VIA022', 12, 'Semi cama', 'Libre', 130.00),
(633, 'VIA022', 13, 'Semi cama', 'Libre', 130.00),
(634, 'VIA022', 14, 'Semi cama', 'Libre', 130.00),
(635, 'VIA022', 15, 'Semi cama', 'Libre', 130.00),
(636, 'VIA022', 16, 'Semi cama', 'Libre', 130.00),
(637, 'VIA022', 17, 'Semi cama', 'Libre', 130.00),
(638, 'VIA022', 18, 'Semi cama', 'Libre', 130.00),
(639, 'VIA022', 19, 'Semi cama', 'Libre', 130.00),
(640, 'VIA022', 20, 'Semi cama', 'Libre', 130.00),
(641, 'VIA022', 21, 'Semi cama', 'Libre', 130.00),
(642, 'VIA022', 22, 'Semi cama', 'Libre', 130.00),
(643, 'VIA022', 23, 'Semi cama', 'Libre', 130.00),
(644, 'VIA022', 24, 'Semi cama', 'Libre', 130.00),
(645, 'VIA022', 25, 'Semi cama', 'Libre', 130.00),
(646, 'VIA022', 26, 'Semi cama', 'Libre', 130.00),
(647, 'VIA022', 27, 'Semi cama', 'Libre', 130.00),
(648, 'VIA022', 28, 'Semi cama', 'Libre', 130.00),
(649, 'VIA022', 29, 'Semi cama', 'Libre', 130.00),
(650, 'VIA022', 30, 'Semi cama', 'Libre', 130.00),
(651, 'VIA023', 6, 'Semi cama', 'Libre', 130.00),
(652, 'VIA023', 7, 'Semi cama', 'Libre', 130.00),
(653, 'VIA023', 8, 'Semi cama', 'Libre', 130.00),
(654, 'VIA023', 9, 'Semi cama', 'Libre', 130.00),
(655, 'VIA023', 10, 'Semi cama', 'Libre', 130.00),
(656, 'VIA023', 11, 'Semi cama', 'Libre', 130.00),
(657, 'VIA023', 12, 'Semi cama', 'Libre', 130.00),
(658, 'VIA023', 13, 'Semi cama', 'Libre', 130.00),
(659, 'VIA023', 14, 'Semi cama', 'Libre', 130.00),
(660, 'VIA023', 15, 'Semi cama', 'Libre', 130.00),
(661, 'VIA023', 16, 'Semi cama', 'Libre', 130.00),
(662, 'VIA023', 17, 'Semi cama', 'Libre', 130.00),
(663, 'VIA023', 18, 'Semi cama', 'Libre', 130.00),
(664, 'VIA023', 19, 'Semi cama', 'Libre', 130.00),
(665, 'VIA023', 20, 'Semi cama', 'Libre', 130.00),
(666, 'VIA023', 21, 'Semi cama', 'Libre', 130.00),
(667, 'VIA023', 22, 'Semi cama', 'Libre', 130.00),
(668, 'VIA023', 23, 'Semi cama', 'Libre', 130.00),
(669, 'VIA023', 24, 'Semi cama', 'Libre', 130.00),
(670, 'VIA023', 25, 'Semi cama', 'Libre', 130.00),
(671, 'VIA023', 26, 'Semi cama', 'Libre', 130.00),
(672, 'VIA023', 27, 'Semi cama', 'Libre', 130.00),
(673, 'VIA023', 28, 'Semi cama', 'Libre', 130.00),
(674, 'VIA023', 29, 'Semi cama', 'Libre', 130.00),
(675, 'VIA023', 30, 'Semi cama', 'Libre', 130.00),
(676, 'VIA024', 6, 'Semi cama', 'Libre', 130.00),
(677, 'VIA024', 7, 'Semi cama', 'Libre', 130.00),
(678, 'VIA024', 8, 'Semi cama', 'Libre', 130.00),
(679, 'VIA024', 9, 'Semi cama', 'Libre', 130.00),
(680, 'VIA024', 10, 'Semi cama', 'Libre', 130.00),
(681, 'VIA024', 11, 'Semi cama', 'Libre', 130.00),
(682, 'VIA024', 12, 'Semi cama', 'Libre', 130.00),
(683, 'VIA024', 13, 'Semi cama', 'Libre', 130.00),
(684, 'VIA024', 14, 'Semi cama', 'Libre', 130.00),
(685, 'VIA024', 15, 'Semi cama', 'Libre', 130.00),
(686, 'VIA024', 16, 'Semi cama', 'Libre', 130.00),
(687, 'VIA024', 17, 'Semi cama', 'Libre', 130.00),
(688, 'VIA024', 18, 'Semi cama', 'Libre', 130.00),
(689, 'VIA024', 19, 'Semi cama', 'Libre', 130.00),
(690, 'VIA024', 20, 'Semi cama', 'Libre', 130.00),
(691, 'VIA024', 21, 'Semi cama', 'Libre', 130.00),
(692, 'VIA024', 22, 'Semi cama', 'Libre', 130.00),
(693, 'VIA024', 23, 'Semi cama', 'Libre', 130.00),
(694, 'VIA024', 24, 'Semi cama', 'Libre', 130.00),
(695, 'VIA024', 25, 'Semi cama', 'Libre', 130.00),
(696, 'VIA025', 6, 'Semi cama', 'Libre', 130.00),
(697, 'VIA025', 7, 'Semi cama', 'Libre', 130.00),
(698, 'VIA025', 8, 'Semi cama', 'Libre', 130.00),
(699, 'VIA025', 9, 'Semi cama', 'Libre', 130.00),
(700, 'VIA025', 10, 'Semi cama', 'Libre', 130.00),
(701, 'VIA025', 11, 'Semi cama', 'Libre', 130.00),
(702, 'VIA025', 12, 'Semi cama', 'Libre', 130.00),
(703, 'VIA025', 13, 'Semi cama', 'Libre', 130.00),
(704, 'VIA025', 14, 'Semi cama', 'Libre', 130.00),
(705, 'VIA025', 15, 'Semi cama', 'Libre', 130.00),
(706, 'VIA025', 16, 'Semi cama', 'Libre', 130.00),
(707, 'VIA025', 17, 'Semi cama', 'Libre', 130.00),
(708, 'VIA025', 18, 'Semi cama', 'Libre', 130.00),
(709, 'VIA025', 19, 'Semi cama', 'Libre', 130.00),
(710, 'VIA025', 20, 'Semi cama', 'Libre', 130.00),
(711, 'VIA025', 21, 'Semi cama', 'Libre', 130.00),
(712, 'VIA025', 22, 'Semi cama', 'Libre', 130.00),
(713, 'VIA025', 23, 'Semi cama', 'Libre', 130.00),
(714, 'VIA025', 24, 'Semi cama', 'Libre', 130.00),
(715, 'VIA025', 25, 'Semi cama', 'Libre', 130.00),
(716, 'VIA026', 6, 'Semi cama', 'Libre', 130.00),
(717, 'VIA026', 7, 'Semi cama', 'Libre', 130.00),
(718, 'VIA026', 8, 'Semi cama', 'Libre', 130.00),
(719, 'VIA026', 9, 'Semi cama', 'Libre', 130.00),
(720, 'VIA026', 10, 'Semi cama', 'Libre', 130.00),
(721, 'VIA026', 11, 'Semi cama', 'Libre', 130.00),
(722, 'VIA026', 12, 'Semi cama', 'Libre', 130.00),
(723, 'VIA026', 13, 'Semi cama', 'Libre', 130.00),
(724, 'VIA026', 14, 'Semi cama', 'Libre', 130.00),
(725, 'VIA026', 15, 'Semi cama', 'Libre', 130.00),
(726, 'VIA026', 16, 'Semi cama', 'Libre', 130.00),
(727, 'VIA026', 17, 'Semi cama', 'Libre', 130.00),
(728, 'VIA026', 18, 'Semi cama', 'Libre', 130.00),
(729, 'VIA026', 19, 'Semi cama', 'Libre', 130.00),
(730, 'VIA026', 20, 'Semi cama', 'Libre', 130.00),
(731, 'VIA026', 21, 'Semi cama', 'Libre', 130.00),
(732, 'VIA026', 22, 'Semi cama', 'Libre', 130.00),
(733, 'VIA026', 23, 'Semi cama', 'Libre', 130.00),
(734, 'VIA026', 24, 'Semi cama', 'Libre', 130.00),
(735, 'VIA026', 25, 'Semi cama', 'Libre', 130.00),
(736, 'VIA027', 6, 'Semi cama', 'Libre', 130.00),
(737, 'VIA027', 7, 'Semi cama', 'Libre', 130.00),
(738, 'VIA027', 8, 'Semi cama', 'Libre', 130.00),
(739, 'VIA027', 9, 'Semi cama', 'Libre', 130.00),
(740, 'VIA027', 10, 'Semi cama', 'Libre', 130.00),
(741, 'VIA027', 11, 'Semi cama', 'Libre', 130.00),
(742, 'VIA027', 12, 'Semi cama', 'Libre', 130.00),
(743, 'VIA027', 13, 'Semi cama', 'Libre', 130.00),
(744, 'VIA027', 14, 'Semi cama', 'Libre', 130.00),
(745, 'VIA027', 15, 'Semi cama', 'Libre', 130.00),
(746, 'VIA027', 16, 'Semi cama', 'Libre', 130.00),
(747, 'VIA027', 17, 'Semi cama', 'Libre', 130.00),
(748, 'VIA027', 18, 'Semi cama', 'Libre', 130.00),
(749, 'VIA027', 19, 'Semi cama', 'Libre', 130.00),
(750, 'VIA027', 20, 'Semi cama', 'Libre', 130.00),
(751, 'VIA027', 21, 'Semi cama', 'Libre', 130.00),
(752, 'VIA027', 22, 'Semi cama', 'Libre', 130.00),
(753, 'VIA027', 23, 'Semi cama', 'Libre', 130.00),
(754, 'VIA027', 24, 'Semi cama', 'Libre', 130.00),
(755, 'VIA027', 25, 'Semi cama', 'Libre', 130.00),
(756, 'VIA028', 6, 'Semi cama', 'Libre', 130.00),
(757, 'VIA028', 7, 'Semi cama', 'Libre', 130.00),
(758, 'VIA028', 8, 'Semi cama', 'Libre', 130.00),
(759, 'VIA028', 9, 'Semi cama', 'Libre', 130.00),
(760, 'VIA028', 10, 'Semi cama', 'Libre', 130.00),
(761, 'VIA028', 11, 'Semi cama', 'Libre', 130.00),
(762, 'VIA028', 12, 'Semi cama', 'Libre', 130.00),
(763, 'VIA028', 13, 'Semi cama', 'Libre', 130.00),
(764, 'VIA028', 14, 'Semi cama', 'Libre', 130.00),
(765, 'VIA028', 15, 'Semi cama', 'Libre', 130.00),
(766, 'VIA028', 16, 'Semi cama', 'Libre', 130.00),
(767, 'VIA028', 17, 'Semi cama', 'Libre', 130.00),
(768, 'VIA028', 18, 'Semi cama', 'Libre', 130.00),
(769, 'VIA028', 19, 'Semi cama', 'Libre', 130.00),
(770, 'VIA028', 20, 'Semi cama', 'Libre', 130.00),
(771, 'VIA028', 21, 'Semi cama', 'Libre', 130.00),
(772, 'VIA028', 22, 'Semi cama', 'Libre', 130.00),
(773, 'VIA028', 23, 'Semi cama', 'Libre', 130.00),
(774, 'VIA028', 24, 'Semi cama', 'Libre', 130.00),
(775, 'VIA028', 25, 'Semi cama', 'Libre', 130.00),
(776, 'VIA029', 6, 'Semi cama', 'Libre', 130.00),
(777, 'VIA029', 7, 'Semi cama', 'Libre', 130.00),
(778, 'VIA029', 8, 'Semi cama', 'Libre', 130.00),
(779, 'VIA029', 9, 'Semi cama', 'Libre', 130.00),
(780, 'VIA029', 10, 'Semi cama', 'Libre', 130.00),
(781, 'VIA029', 11, 'Semi cama', 'Libre', 130.00),
(782, 'VIA029', 12, 'Semi cama', 'Libre', 130.00),
(783, 'VIA029', 13, 'Semi cama', 'Libre', 130.00),
(784, 'VIA029', 14, 'Semi cama', 'Libre', 130.00),
(785, 'VIA029', 15, 'Semi cama', 'Libre', 130.00),
(786, 'VIA029', 16, 'Semi cama', 'Libre', 130.00),
(787, 'VIA029', 17, 'Semi cama', 'Libre', 130.00),
(788, 'VIA029', 18, 'Semi cama', 'Libre', 130.00),
(789, 'VIA029', 19, 'Semi cama', 'Libre', 130.00),
(790, 'VIA029', 20, 'Semi cama', 'Libre', 130.00),
(791, 'VIA029', 21, 'Semi cama', 'Libre', 130.00),
(792, 'VIA029', 22, 'Semi cama', 'Libre', 130.00),
(793, 'VIA029', 23, 'Semi cama', 'Libre', 130.00),
(794, 'VIA029', 24, 'Semi cama', 'Libre', 130.00),
(795, 'VIA029', 25, 'Semi cama', 'Libre', 130.00),
(796, 'VIA030', 6, 'Semi cama', 'Libre', 130.00),
(797, 'VIA030', 7, 'Semi cama', 'Libre', 130.00),
(798, 'VIA030', 8, 'Semi cama', 'Libre', 130.00),
(799, 'VIA030', 9, 'Semi cama', 'Libre', 130.00),
(800, 'VIA030', 10, 'Semi cama', 'Libre', 130.00),
(801, 'VIA030', 11, 'Semi cama', 'Libre', 130.00),
(802, 'VIA030', 12, 'Semi cama', 'Libre', 130.00),
(803, 'VIA030', 13, 'Semi cama', 'Libre', 130.00),
(804, 'VIA030', 14, 'Semi cama', 'Libre', 130.00),
(805, 'VIA030', 15, 'Semi cama', 'Libre', 130.00),
(806, 'VIA030', 16, 'Semi cama', 'Libre', 130.00),
(807, 'VIA030', 17, 'Semi cama', 'Libre', 130.00),
(808, 'VIA030', 18, 'Semi cama', 'Libre', 130.00),
(809, 'VIA030', 19, 'Semi cama', 'Libre', 130.00),
(810, 'VIA030', 20, 'Semi cama', 'Libre', 130.00),
(811, 'VIA030', 21, 'Semi cama', 'Libre', 130.00),
(812, 'VIA030', 22, 'Semi cama', 'Libre', 130.00),
(813, 'VIA030', 23, 'Semi cama', 'Libre', 130.00),
(814, 'VIA030', 24, 'Semi cama', 'Libre', 130.00),
(815, 'VIA030', 25, 'Semi cama', 'Libre', 130.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bus`
--

CREATE TABLE `bus` (
  `PLACA` char(6) NOT NULL,
  `NUM_ASIENTOS` int(11) NOT NULL,
  `PISOS` int(11) NOT NULL,
  `TIPO_BUS` varchar(20) NOT NULL,
  `MODELO` varchar(50) DEFAULT NULL,
  `CAPACIDAD_CARGA` int(11) DEFAULT NULL,
  `ESTADO_MANTENIMIENTO` enum('Bueno','Regular','Malo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bus`
--

INSERT INTO `bus` (`PLACA`, `NUM_ASIENTOS`, `PISOS`, `TIPO_BUS`, `MODELO`, `CAPACIDAD_CARGA`, `ESTADO_MANTENIMIENTO`) VALUES
('ABC123', 50, 1, 'Simple', 'Marcopolo Paradiso 1800 DD', 5000, 'Bueno'),
('DEF456', 40, 2, 'Doble piso', 'Volvo 9800 DD', 6000, 'Regular'),
('GHI789', 50, 1, 'Simple', 'Irizar i6', 4800, 'Bueno'),
('JKL012', 40, 1, 'Simple', 'Mercedes-Benz OF 1621', 4500, 'Bueno'),
('MNO345', 30, 1, 'Simple', 'MAN 18.310 HOCL', 4000, 'Regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `COD_DESTINO` char(6) NOT NULL,
  `NOM_DESTINO` varchar(50) NOT NULL,
  `ESTADO` varchar(10) NOT NULL,
  `DESCRIPCION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`COD_DESTINO`, `NOM_DESTINO`, `ESTADO`, `DESCRIPCION`) VALUES
('AREQUI', 'Arequipa', '', 'Ciudad conocida como la Ciudad Blanca, ubicada en el sur del Perú'),
('CAMANA', 'Camaná', '', 'Ciudad costera ubicada en la región de Arequipa'),
('CHICLA', 'Chiclayo', '', 'Ciudad ubicada en la costa norte del Perú, conocida por su gastronomía y sitios arqueológicos'),
('CHIMBO', 'Chimbote', '', 'Ciudad portuaria ubicada en la región de Áncash'),
('HUARME', 'Huarmey', '', 'Ciudad costera ubicada en la región de Áncash'),
('ICA', 'Ica', '', 'Ciudad ubicada en la costa sur del Perú, conocida por sus viñedos y dunas de arena'),
('LIMA', 'Lima', '', 'Capital del Perú'),
('TRUJIL', 'Trujillo', '', 'Ciudad ubicada en la costa norte del Perú, conocida por su patrimonio histórico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE `oficina` (
  `NUM_LOCAL` char(6) NOT NULL,
  `TELEFONO_FIJO` varchar(15) DEFAULT NULL,
  `TELEFONO_CEL` varchar(15) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `NOMBRE_OFI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`NUM_LOCAL`, `TELEFONO_FIJO`, `TELEFONO_CEL`, `DIRECCION`, `NOMBRE_OFI`) VALUES
('OFI001', '01-1234567', '999888777', 'Av. Arequipa 123', 'Oficina Principal'),
('OFI002', '01-9876543', '988777666', 'Av. Tacna 456', 'Oficina Central');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `COD_RESERVA` int(11) NOT NULL,
  `COD_VIA` char(8) NOT NULL,
  `COD_USER` char(6) NOT NULL,
  `ID_ASIENTO` int(11) NOT NULL,
  `ESTADO` enum('Reservado','Pagado') NOT NULL DEFAULT 'Reservado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`COD_RESERVA`, `COD_VIA`, `COD_USER`, `ID_ASIENTO`, `ESTADO`) VALUES
(1, 'VIA001', 'US1004', 1, 'Reservado'),
(2, 'VIA003', 'US1005', 2, 'Reservado'),
(3, 'VIA005', 'US1006', 3, 'Reservado'),
(4, 'VIA007', 'US1007', 4, 'Reservado'),
(5, 'VIA009', 'US1008', 5, 'Reservado'),
(6, 'VIA010', 'US1009', 6, 'Reservado'),
(7, 'VIA011', 'US1010', 7, 'Reservado'),
(8, 'VIA012', 'US1011', 8, 'Reservado'),
(9, 'VIA013', 'US1012', 9, 'Reservado'),
(10, 'VIA014', 'US1013', 10, 'Reservado'),
(11, 'VIA015', 'US1004', 11, 'Reservado'),
(12, 'VIA016', 'US1005', 12, 'Reservado'),
(13, 'VIA017', 'US1006', 13, 'Reservado'),
(14, 'VIA018', 'US1007', 14, 'Reservado'),
(15, 'VIA019', 'US1008', 15, 'Reservado'),
(16, 'VIA020', 'US1009', 16, 'Reservado'),
(17, 'VIA002', 'US1010', 17, 'Reservado'),
(18, 'VIA004', 'US1011', 18, 'Reservado'),
(19, 'VIA006', 'US1012', 19, 'Reservado'),
(20, 'VIA008', 'US1013', 20, 'Reservado'),
(21, 'VIA001', 'US1004', 21, 'Reservado'),
(22, 'VIA003', 'US1005', 22, 'Reservado'),
(23, 'VIA005', 'US1006', 23, 'Reservado'),
(24, 'VIA007', 'US1007', 24, 'Reservado'),
(25, 'VIA009', 'US1008', 25, 'Reservado'),
(26, 'VIA010', 'US1009', 26, 'Reservado'),
(27, 'VIA011', 'US1010', 27, 'Reservado'),
(28, 'VIA012', 'US1011', 28, 'Reservado'),
(29, 'VIA013', 'US1012', 29, 'Reservado'),
(30, 'VIA014', 'US1013', 30, 'Reservado'),
(31, 'VIA015', 'US1004', 31, 'Pagado'),
(32, 'VIA016', 'US1005', 32, 'Pagado'),
(33, 'VIA017', 'US1006', 33, 'Pagado'),
(34, 'VIA018', 'US1007', 34, 'Pagado'),
(35, 'VIA019', 'US1008', 35, 'Pagado'),
(36, 'VIA020', 'US1009', 36, 'Pagado'),
(37, 'VIA002', 'US1010', 37, 'Pagado'),
(38, 'VIA004', 'US1011', 38, 'Pagado'),
(39, 'VIA006', 'US1012', 39, 'Pagado'),
(40, 'VIA008', 'US1013', 40, 'Pagado'),
(41, 'VIA001', 'US1004', 41, 'Pagado'),
(42, 'VIA003', 'US1005', 42, 'Pagado'),
(43, 'VIA005', 'US1006', 43, 'Pagado'),
(44, 'VIA007', 'US1007', 44, 'Pagado'),
(45, 'VIA009', 'US1008', 45, 'Pagado'),
(46, 'VIA010', 'US1009', 46, 'Pagado'),
(47, 'VIA011', 'US1010', 47, 'Pagado'),
(48, 'VIA012', 'US1011', 48, 'Pagado'),
(49, 'VIA013', 'US1012', 49, 'Pagado'),
(50, 'VIA014', 'US1013', 50, 'Pagado'),
(51, 'VIA001', 'US1001', 1, 'Reservado'),
(52, 'VIA002', 'US1002', 37, 'Reservado'),
(53, 'VIA003', 'US1003', 2, 'Reservado'),
(54, 'VIA004', 'US1004', 78, 'Reservado'),
(55, 'VIA005', 'US1005', 3, 'Reservado'),
(56, 'VIA006', 'US1006', 39, 'Reservado'),
(57, 'VIA007', 'US1007', 4, 'Reservado'),
(58, 'VIA008', 'US1008', 80, 'Reservado'),
(59, 'VIA009', 'US1009', 5, 'Reservado'),
(60, 'VIA010', 'US1010', 6, 'Reservado'),
(61, 'VIA011', 'US1011', 7, 'Reservado'),
(62, 'VIA012', 'US1012', 8, 'Reservado'),
(63, 'VIA013', 'US1013', 9, 'Reservado'),
(64, 'VIA014', 'US1001', 10, 'Reservado'),
(65, 'VIA015', 'US1002', 11, 'Reservado'),
(66, 'VIA016', 'US1003', 12, 'Reservado'),
(67, 'VIA017', 'US1004', 13, 'Reservado'),
(68, 'VIA018', 'US1005', 14, 'Reservado'),
(69, 'VIA019', 'US1006', 15, 'Reservado'),
(70, 'VIA020', 'US1007', 16, 'Reservado'),
(71, 'VIA001', 'US1008', 17, 'Reservado'),
(72, 'VIA002', 'US1009', 38, 'Reservado'),
(73, 'VIA003', 'US1010', 18, 'Reservado'),
(74, 'VIA004', 'US1011', 79, 'Reservado'),
(75, 'VIA005', 'US1012', 19, 'Reservado'),
(76, 'VIA006', 'US1013', 40, 'Reservado'),
(77, 'VIA007', 'US1001', 20, 'Reservado'),
(78, 'VIA008', 'US1002', 81, 'Reservado'),
(79, 'VIA009', 'US1003', 21, 'Reservado'),
(80, 'VIA010', 'US1004', 22, 'Reservado'),
(81, 'VIA011', 'US1005', 23, 'Reservado'),
(82, 'VIA012', 'US1006', 24, 'Reservado'),
(83, 'VIA013', 'US1007', 25, 'Reservado'),
(84, 'VIA014', 'US1008', 26, 'Reservado'),
(85, 'VIA015', 'US1009', 27, 'Reservado'),
(86, 'VIA016', 'US1010', 28, 'Reservado'),
(87, 'VIA017', 'US1011', 29, 'Reservado'),
(88, 'VIA018', 'US1012', 30, 'Reservado'),
(89, 'VIA019', 'US1013', 31, 'Reservado'),
(90, 'VIA020', 'US1001', 32, 'Reservado'),
(91, 'VIA001', 'US1002', 33, 'Reservado'),
(92, 'VIA002', 'US1003', 57, 'Reservado'),
(93, 'VIA003', 'US1004', 34, 'Reservado'),
(94, 'VIA004', 'US1005', 78, 'Reservado'),
(95, 'VIA005', 'US1006', 35, 'Reservado'),
(96, 'VIA006', 'US1007', 59, 'Reservado'),
(97, 'VIA007', 'US1008', 36, 'Reservado'),
(98, 'VIA008', 'US1009', 80, 'Reservado'),
(99, 'VIA009', 'US1010', 37, 'Reservado'),
(100, 'VIA010', 'US1011', 38, 'Reservado'),
(101, 'VIA011', 'US1012', 39, 'Reservado'),
(102, 'VIA012', 'US1013', 40, 'Reservado'),
(103, 'VIA013', 'US1001', 41, 'Reservado'),
(104, 'VIA014', 'US1002', 42, 'Reservado'),
(105, 'VIA015', 'US1003', 43, 'Reservado'),
(106, 'VIA016', 'US1004', 44, 'Reservado'),
(107, 'VIA017', 'US1005', 45, 'Reservado'),
(108, 'VIA018', 'US1006', 46, 'Reservado'),
(109, 'VIA019', 'US1007', 47, 'Reservado'),
(110, 'VIA020', 'US1008', 48, 'Reservado'),
(111, 'VIA001', 'US1009', 49, 'Reservado'),
(112, 'VIA002', 'US1010', 59, 'Reservado'),
(113, 'VIA003', 'US1011', 50, 'Reservado'),
(114, 'VIA004', 'US1012', 80, 'Reservado'),
(115, 'VIA005', 'US1013', 51, 'Reservado'),
(116, 'VIA006', 'US1001', 79, 'Reservado'),
(117, 'VIA007', 'US1002', 52, 'Reservado'),
(118, 'VIA008', 'US1003', 81, 'Reservado'),
(119, 'VIA009', 'US1004', 53, 'Reservado'),
(120, 'VIA010', 'US1005', 54, 'Reservado'),
(121, 'VIA011', 'US1006', 55, 'Reservado'),
(122, 'VIA012', 'US1007', 56, 'Reservado'),
(123, 'VIA013', 'US1008', 57, 'Reservado'),
(124, 'VIA014', 'US1009', 58, 'Reservado'),
(125, 'VIA015', 'US1010', 59, 'Reservado'),
(126, 'VIA016', 'US1011', 60, 'Reservado'),
(127, 'VIA017', 'US1012', 61, 'Reservado'),
(128, 'VIA018', 'US1013', 62, 'Reservado'),
(129, 'VIA019', 'US1001', 63, 'Reservado'),
(130, 'VIA020', 'US1002', 64, 'Reservado'),
(131, 'VIA001', 'US1003', 65, 'Reservado'),
(132, 'VIA002', 'US1004', 61, 'Reservado'),
(133, 'VIA003', 'US1005', 66, 'Reservado'),
(134, 'VIA004', 'US1006', 82, 'Reservado'),
(135, 'VIA005', 'US1007', 67, 'Reservado'),
(136, 'VIA006', 'US1008', 63, 'Reservado'),
(137, 'VIA007', 'US1009', 68, 'Reservado'),
(138, 'VIA008', 'US1010', 83, 'Reservado'),
(139, 'VIA009', 'US1011', 69, 'Reservado'),
(140, 'VIA010', 'US1012', 70, 'Reservado'),
(141, 'VIA011', 'US1013', 71, 'Reservado'),
(142, 'VIA012', 'US1001', 72, 'Reservado'),
(143, 'VIA013', 'US1002', 73, 'Reservado'),
(144, 'VIA014', 'US1003', 74, 'Reservado'),
(145, 'VIA015', 'US1004', 75, 'Reservado'),
(146, 'VIA016', 'US1005', 76, 'Reservado'),
(147, 'VIA017', 'US1006', 77, 'Reservado'),
(148, 'VIA018', 'US1007', 78, 'Reservado'),
(149, 'VIA019', 'US1008', 79, 'Reservado'),
(150, 'VIA020', 'US1009', 80, 'Reservado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `COD_SERVICIO` char(2) NOT NULL,
  `TIPO_SERVICIO` varchar(20) NOT NULL,
  `TIPO_BUS` varchar(20) NOT NULL,
  `TIPO_ASIENTO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`COD_SERVICIO`, `TIPO_SERVICIO`, `TIPO_BUS`, `TIPO_ASIENTO`) VALUES
('1', 'Escala', 'Simple', 'Semi cama'),
('2', 'Directo', 'Doble piso', 'Sofá cama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `COD_USER` char(6) NOT NULL,
  `NOMBRES` varchar(30) NOT NULL,
  `APELLIDOS` varchar(30) NOT NULL,
  `CORREO` varchar(35) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL,
  `ROL` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`COD_USER`, `NOMBRES`, `APELLIDOS`, `CORREO`, `PASSWORD`, `ROL`) VALUES
('US1000', 'Flavio Sebastian', 'Villanueva Medina', 'flaviovm2013@gmail.com', 'Ejemplo123!', 'admin'),
('US1001', 'Juan', 'Perez', 'juanperez@gmail.com', 'Password123', 'cliente'),
('US1002', 'María', 'Gomez', 'mariagomez@gmail.com', 'SecurePass123', 'cliente'),
('US1003', 'Carlos', 'Lopez', 'carloslopez@gmail.com', 'Passw0rd!', 'cliente'),
('US1004', 'Juan', 'Perez', 'juan.perez@example.com', 'Pass1234', 'cliente'),
('US1005', 'Maria', 'Lopez', 'maria.lopez@example.com', 'Lopez1234', 'cliente'),
('US1006', 'Carlos', 'Gomez', 'carlos.gomez@example.com', 'GoMez1234', 'cliente'),
('US1007', 'Ana', 'Martinez', 'ana.martinez@example.com', 'Martinez1A', 'cliente'),
('US1008', 'Luis', 'Hernandez', 'luis.hernandez@example.com', 'HerNandez2', 'cliente'),
('US1009', 'Elena', 'Ruiz', 'elena.ruiz@example.com', 'Ruiz1234!', 'cliente'),
('US1010', 'David', 'Ramirez', 'david.ramirez@example.com', 'Ramirez34$', 'cliente'),
('US1011', 'Laura', 'Diaz', 'laura.diaz@example.com', 'DiazLa34#', 'cliente'),
('US1012', 'Jose', 'Mendez', 'jose.mendez@example.com', 'Mendez12%', 'cliente'),
('US1013', 'Sara', 'Vega', 'sara.vega@example.com', 'VegaSara12', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `COD_VENTA` int(11) NOT NULL,
  `COD_RESERVA` int(11) NOT NULL,
  `FECHA_VENTA` date NOT NULL,
  `MONTO_TOTAL` decimal(10,2) NOT NULL,
  `ESTADO_PAGO` enum('Pendiente','Pagado') NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`COD_VENTA`, `COD_RESERVA`, `FECHA_VENTA`, `MONTO_TOTAL`, `ESTADO_PAGO`) VALUES
(1, 31, '2024-07-05', 110.00, 'Pagado'),
(2, 32, '2024-07-06', 130.00, 'Pagado'),
(3, 33, '2024-07-07', 130.00, 'Pagado'),
(4, 34, '2024-07-08', 130.00, 'Pagado'),
(5, 35, '2024-07-09', 130.00, 'Pagado'),
(6, 36, '2024-07-10', 130.00, 'Pagado'),
(7, 37, '2024-07-11', 106.00, 'Pagado'),
(8, 38, '2024-07-05', 118.00, 'Pagado'),
(9, 39, '2024-07-06', 142.00, 'Pagado'),
(10, 40, '2024-07-07', 178.00, 'Pagado'),
(11, 41, '2024-07-08', 110.00, 'Pagado'),
(12, 42, '2024-07-09', 130.00, 'Pagado'),
(13, 43, '2024-07-10', 160.00, 'Pagado'),
(14, 44, '2024-07-11', 140.00, 'Pagado'),
(15, 45, '2024-07-05', 130.00, 'Pagado'),
(16, 46, '2024-07-06', 130.00, 'Pagado'),
(17, 47, '2024-07-07', 130.00, 'Pagado'),
(18, 48, '2024-07-08', 130.00, 'Pagado'),
(19, 49, '2024-07-09', 130.00, 'Pagado'),
(20, 50, '2024-07-10', 130.00, 'Pagado'),
(21, 1, '2024-07-05', 110.00, 'Pendiente'),
(22, 2, '2024-07-06', 130.00, 'Pendiente'),
(23, 3, '2024-07-07', 130.00, 'Pendiente'),
(24, 4, '2024-07-08', 130.00, 'Pendiente'),
(25, 5, '2024-07-09', 130.00, 'Pendiente'),
(26, 6, '2024-07-10', 130.00, 'Pendiente'),
(27, 7, '2024-07-11', 130.00, 'Pendiente'),
(28, 8, '2024-07-05', 130.00, 'Pendiente'),
(29, 9, '2024-07-06', 130.00, 'Pendiente'),
(30, 10, '2024-07-07', 130.00, 'Pendiente'),
(31, 11, '2024-07-08', 130.00, 'Pendiente'),
(32, 12, '2024-07-09', 130.00, 'Pendiente'),
(33, 13, '2024-07-10', 130.00, 'Pendiente'),
(34, 14, '2024-07-11', 130.00, 'Pendiente'),
(35, 15, '2024-07-05', 130.00, 'Pendiente'),
(36, 16, '2024-07-06', 130.00, 'Pendiente'),
(37, 17, '2024-07-07', 130.00, 'Pendiente'),
(38, 18, '2024-07-08', 130.00, 'Pendiente'),
(39, 19, '2024-07-09', 130.00, 'Pendiente'),
(40, 20, '2024-07-10', 130.00, 'Pendiente'),
(41, 21, '2024-07-11', 106.00, 'Pendiente'),
(42, 22, '2024-07-05', 118.00, 'Pendiente'),
(43, 23, '2024-07-06', 142.00, 'Pendiente'),
(44, 24, '2024-07-07', 178.00, 'Pendiente'),
(45, 25, '2024-07-08', 110.00, 'Pendiente'),
(46, 26, '2024-07-09', 130.00, 'Pendiente'),
(47, 27, '2024-07-10', 130.00, 'Pendiente'),
(48, 28, '2024-07-11', 130.00, 'Pendiente'),
(49, 29, '2024-07-05', 130.00, 'Pendiente'),
(50, 30, '2024-07-06', 130.00, 'Pendiente'),
(51, 51, '2024-02-01', 110.00, 'Pendiente'),
(52, 52, '2024-02-05', 130.00, 'Pendiente'),
(53, 53, '2024-02-08', 160.00, 'Pendiente'),
(54, 54, '2024-02-12', 140.00, 'Pendiente'),
(55, 55, '2024-02-15', 130.00, 'Pendiente'),
(56, 56, '2024-02-18', 130.00, 'Pendiente'),
(57, 57, '2024-02-22', 130.00, 'Pendiente'),
(58, 58, '2024-02-25', 130.00, 'Pendiente'),
(59, 59, '2024-02-28', 130.00, 'Pendiente'),
(60, 60, '2024-02-03', 130.00, 'Pendiente'),
(61, 61, '2024-03-02', 110.00, 'Pendiente'),
(62, 62, '2024-03-06', 130.00, 'Pendiente'),
(63, 63, '2024-03-09', 160.00, 'Pendiente'),
(64, 64, '2024-03-13', 140.00, 'Pendiente'),
(65, 65, '2024-03-16', 130.00, 'Pendiente'),
(66, 66, '2024-03-19', 130.00, 'Pendiente'),
(67, 67, '2024-03-23', 130.00, 'Pendiente'),
(68, 68, '2024-03-26', 130.00, 'Pendiente'),
(69, 69, '2024-03-29', 130.00, 'Pendiente'),
(70, 70, '2024-03-01', 130.00, 'Pendiente'),
(71, 71, '2024-03-04', 130.00, 'Pendiente'),
(72, 72, '2024-03-07', 130.00, 'Pendiente'),
(73, 73, '2024-03-10', 130.00, 'Pendiente'),
(74, 74, '2024-03-14', 130.00, 'Pendiente'),
(75, 75, '2024-03-17', 130.00, 'Pendiente'),
(76, 76, '2024-03-20', 130.00, 'Pendiente'),
(77, 77, '2024-03-24', 130.00, 'Pendiente'),
(78, 78, '2024-03-27', 130.00, 'Pendiente'),
(79, 79, '2024-03-30', 130.00, 'Pendiente'),
(80, 80, '2024-03-05', 130.00, 'Pendiente'),
(81, 81, '2024-04-02', 110.00, 'Pendiente'),
(82, 82, '2024-04-06', 130.00, 'Pendiente'),
(83, 83, '2024-04-09', 160.00, 'Pendiente'),
(84, 84, '2024-04-13', 140.00, 'Pendiente'),
(85, 85, '2024-04-16', 130.00, 'Pendiente'),
(86, 86, '2024-04-19', 130.00, 'Pendiente'),
(87, 87, '2024-04-23', 130.00, 'Pendiente'),
(88, 88, '2024-04-26', 130.00, 'Pendiente'),
(89, 89, '2024-04-29', 130.00, 'Pendiente'),
(90, 90, '2024-04-01', 130.00, 'Pendiente'),
(91, 91, '2024-04-04', 130.00, 'Pendiente'),
(92, 92, '2024-04-07', 130.00, 'Pendiente'),
(93, 93, '2024-04-10', 130.00, 'Pendiente'),
(94, 94, '2024-04-14', 130.00, 'Pendiente'),
(95, 95, '2024-04-17', 130.00, 'Pendiente'),
(96, 96, '2024-04-20', 130.00, 'Pendiente'),
(97, 97, '2024-04-24', 130.00, 'Pendiente'),
(98, 98, '2024-04-27', 130.00, 'Pendiente'),
(99, 99, '2024-04-30', 130.00, 'Pendiente'),
(100, 100, '2024-04-05', 130.00, 'Pendiente'),
(101, 101, '2024-05-02', 110.00, 'Pendiente'),
(102, 102, '2024-05-06', 130.00, 'Pendiente'),
(103, 103, '2024-05-09', 160.00, 'Pendiente'),
(104, 104, '2024-05-13', 140.00, 'Pendiente'),
(105, 105, '2024-05-16', 130.00, 'Pendiente'),
(106, 106, '2024-05-19', 130.00, 'Pendiente'),
(107, 107, '2024-05-23', 130.00, 'Pendiente'),
(108, 108, '2024-05-26', 130.00, 'Pendiente'),
(109, 109, '2024-05-29', 130.00, 'Pendiente'),
(110, 110, '2024-05-01', 130.00, 'Pendiente'),
(111, 111, '2024-05-04', 130.00, 'Pendiente'),
(112, 112, '2024-05-07', 130.00, 'Pendiente'),
(113, 113, '2024-05-10', 130.00, 'Pendiente'),
(114, 114, '2024-05-14', 130.00, 'Pendiente'),
(115, 115, '2024-05-17', 130.00, 'Pendiente'),
(116, 116, '2024-05-20', 130.00, 'Pendiente'),
(117, 117, '2024-05-24', 130.00, 'Pendiente'),
(118, 118, '2024-05-27', 130.00, 'Pendiente'),
(119, 119, '2024-05-30', 130.00, 'Pendiente'),
(120, 120, '2024-05-05', 130.00, 'Pendiente'),
(121, 121, '2024-05-08', 130.00, 'Pendiente'),
(122, 122, '2024-05-11', 130.00, 'Pendiente'),
(123, 123, '2024-05-15', 130.00, 'Pendiente'),
(124, 124, '2024-05-18', 130.00, 'Pendiente'),
(125, 125, '2024-05-21', 130.00, 'Pendiente'),
(126, 126, '2024-06-02', 110.00, 'Pendiente'),
(127, 127, '2024-06-06', 130.00, 'Pendiente'),
(128, 128, '2024-06-09', 160.00, 'Pendiente'),
(129, 129, '2024-06-13', 140.00, 'Pendiente'),
(130, 130, '2024-06-16', 130.00, 'Pendiente'),
(131, 131, '2024-06-19', 130.00, 'Pendiente'),
(132, 132, '2024-06-23', 130.00, 'Pendiente'),
(133, 133, '2024-06-26', 130.00, 'Pendiente'),
(134, 134, '2024-06-29', 130.00, 'Pendiente'),
(135, 135, '2024-06-01', 130.00, 'Pendiente'),
(136, 136, '2024-06-04', 130.00, 'Pendiente'),
(137, 137, '2024-06-07', 130.00, 'Pendiente'),
(138, 138, '2024-06-10', 130.00, 'Pendiente'),
(139, 139, '2024-06-14', 130.00, 'Pendiente'),
(140, 140, '2024-06-17', 130.00, 'Pendiente'),
(141, 141, '2024-06-20', 130.00, 'Pendiente'),
(142, 142, '2024-06-24', 130.00, 'Pendiente'),
(143, 143, '2024-06-27', 130.00, 'Pendiente'),
(144, 144, '2024-06-30', 130.00, 'Pendiente'),
(145, 145, '2024-06-03', 130.00, 'Pendiente'),
(146, 146, '2024-06-05', 130.00, 'Pendiente'),
(147, 147, '2024-06-08', 130.00, 'Pendiente'),
(148, 148, '2024-06-11', 130.00, 'Pendiente'),
(149, 149, '2024-06-15', 130.00, 'Pendiente'),
(150, 150, '2024-06-18', 130.00, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `COD_VIA` char(8) NOT NULL,
  `FECHA_VIA` date NOT NULL,
  `HORA_VIA` time NOT NULL,
  `DURACION` varchar(10) NOT NULL,
  `BUS` char(6) NOT NULL,
  `DESTINO` char(6) NOT NULL,
  `ORIGEN` char(6) NOT NULL,
  `PRECIO_BASE` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`COD_VIA`, `FECHA_VIA`, `HORA_VIA`, `DURACION`, `BUS`, `DESTINO`, `ORIGEN`, `PRECIO_BASE`) VALUES
('VIA001', '2024-04-20', '08:00:00', '4h 0min', 'ABC123', 'LIMA', 'AREQUI', 100.00),
('VIA002', '2024-04-20', '09:00:00', '3h 30min', 'DEF456', 'ICA', 'LIMA', 80.00),
('VIA003', '2024-04-21', '10:00:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA004', '2024-04-21', '11:00:00', '5h 30min', 'DEF456', 'CAMANA', 'LIMA', 90.00),
('VIA005', '2024-04-22', '12:00:00', '8h 0min', 'ABC123', 'CHIMBO', 'LIMA', 150.00),
('VIA006', '2024-04-22', '13:00:00', '7h 30min', 'DEF456', 'TRUJIL', 'LIMA', 110.00),
('VIA007', '2024-04-23', '14:00:00', '10h 0min', 'ABC123', 'HUARME', 'LIMA', 130.00),
('VIA008', '2024-04-23', '15:00:00', '9h 30min', 'DEF456', 'CHICLA', 'LIMA', 140.00),
('VIA009', '2024-04-21', '12:00:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA010', '2024-04-21', '12:30:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA011', '2024-04-21', '16:30:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA012', '2024-04-21', '18:00:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA013', '2024-04-21', '18:30:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA014', '2024-04-21', '19:00:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA015', '2024-04-21', '20:00:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA016', '2024-04-21', '20:30:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA017', '2024-04-21', '21:00:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA018', '2024-04-21', '21:30:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA019', '2024-04-21', '22:00:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA020', '2024-04-21', '22:30:00', '6h 0min', 'ABC123', 'AREQUI', 'LIMA', 120.00),
('VIA021', '2024-07-19', '08:00:00', '02:30:00', 'ABC123', 'AREQUI', 'LIMA', 50.00),
('VIA022', '2024-07-20', '09:00:00', '03:15:00', 'DEF456', 'CAMANA', 'LIMA', 55.00),
('VIA023', '2024-07-21', '10:00:00', '04:00:00', 'GHI789', 'CHICLA', 'LIMA', 60.00),
('VIA024', '2024-07-22', '11:00:00', '01:45:00', 'JKL012', 'CHIMBO', 'LIMA', 65.00),
('VIA025', '2024-07-23', '12:00:00', '02:30:00', 'MNO345', 'HUARME', 'LIMA', 70.00),
('VIA026', '2024-07-24', '13:00:00', '03:15:00', 'ABC123', 'ICA', 'LIMA', 75.00),
('VIA027', '2024-07-25', '14:00:00', '04:00:00', 'DEF456', 'LIMA', 'TRUJIL', 80.00),
('VIA028', '2024-07-26', '15:00:00', '01:45:00', 'GHI789', 'TRUJIL', 'LIMA', 85.00),
('VIA029', '2024-07-27', '16:00:00', '02:30:00', 'JKL012', 'AREQUI', 'LIMA', 90.00),
('VIA030', '2024-07-28', '17:00:00', '03:15:00', 'MNO345', 'CAMANA', 'LIMA', 95.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COD_VIA` (`COD_VIA`);

--
-- Indices de la tabla `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`PLACA`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`COD_DESTINO`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`NUM_LOCAL`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`COD_RESERVA`),
  ADD KEY `COD_VIA` (`COD_VIA`),
  ADD KEY `COD_USER` (`COD_USER`),
  ADD KEY `ID_ASIENTO` (`ID_ASIENTO`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`COD_SERVICIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`COD_USER`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`COD_VENTA`),
  ADD KEY `COD_RESERVA` (`COD_RESERVA`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`COD_VIA`),
  ADD KEY `BUS` (`BUS`),
  ADD KEY `DESTINO` (`DESTINO`),
  ADD KEY `ORIGEN` (`ORIGEN`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=816;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `COD_RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `COD_VENTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`COD_VIA`) REFERENCES `viaje` (`COD_VIA`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`COD_VIA`) REFERENCES `viaje` (`COD_VIA`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`COD_USER`) REFERENCES `usuario` (`COD_USER`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`ID_ASIENTO`) REFERENCES `asiento` (`ID`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`COD_RESERVA`) REFERENCES `reserva` (`COD_RESERVA`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`BUS`) REFERENCES `bus` (`PLACA`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`DESTINO`) REFERENCES `destino` (`COD_DESTINO`),
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`ORIGEN`) REFERENCES `destino` (`COD_DESTINO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
