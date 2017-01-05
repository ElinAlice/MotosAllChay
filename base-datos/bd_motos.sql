-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2016 a las 21:48:53
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_motos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmoto`
--

CREATE TABLE `motos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Anio` varchar(4) NOT NULL,
  `Color` varchar(10) NOT NULL,
  `Combustible` varchar(10) NOT NULL,
  `Motor` varchar(20) NOT NULL,
  created DATETIME DEFAULT NULL,
  modified DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `treparacion_moto`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Fecha` date NOT NULL,
  `id_motos` int(11) NOT NULL,
  `id_trabajadors` int(8) NOT NULL,
  `Tipo_Reparacion` varchar(50) NOT NULL,
  `Costo` decimal(5,2) NOT NULL,
  `Detalle_Reparacion` varchar(100) NOT NULL,
  created DATETIME DEFAULT NULL,
  modified DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttrabajador`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `DNI_Empleado` int(8) NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  created DATETIME DEFAULT NULL,
  modified DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
ALTER TABLE `registros`
  ADD CONSTRAINT `treparacion_moto_ibfk_1` FOREIGN KEY (`id_motos`) REFERENCES `motos` (`id`),
  ADD CONSTRAINT `treparacion_moto_ibfk_2` FOREIGN KEY (`id_trabajadors`) REFERENCES `trabajadors` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
