-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2017 a las 08:38:23
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmotos`
--
CREATE DATABASE IF NOT EXISTS `bdmotos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdmotos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DNI_Empleado` int(8) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `DNI_Empleado` (`DNI_Empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `DNI_Empleado`, `Direccion`, `Nombre`, `Apellidos`, `Tipo`, `created`, `modified`) VALUES
(1, 71960340, 'genga123', 'Robert', 'Human Caceres', 'Admin', NULL, '2016-12-29 16:47:16'),
(2, 71960342, 'genga', 'Juan', 'Laurenz Salas', 'Admin', '2016-12-29 15:13:55', '2016-12-29 16:33:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motos`
--

CREATE TABLE IF NOT EXISTS `motos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Anio` varchar(4) NOT NULL,
  `Color` varchar(10) NOT NULL,
  `Combustible` varchar(10) NOT NULL,
  `Motor` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motos`
--

INSERT INTO `motos` (`id`, `Marca`, `Modelo`, `Anio`, `Color`, `Combustible`, `Motor`, `created`, `modified`) VALUES
(1, 'pulsar', 'E-1', '2015', 'Negro', 'Gasolina', '250', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `moto_id` int(11) NOT NULL,
  `empleado_id` int(8) NOT NULL,
  `Tipo_Reparacion` varchar(50) NOT NULL,
  `Costo` decimal(5,2) NOT NULL,
  `Detalle_Reparacion` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `treparacion_moto_ibfk_1` (`moto_id`),
  KEY `treparacion_moto_ibfk_2` (`empleado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `Fecha`, `moto_id`, `empleado_id`, `Tipo_Reparacion`, `Costo`, `Detalle_Reparacion`, `created`, `modified`) VALUES
(1, '2016-12-29', 1, 2, 'Cambio de LLantas', '50.00', 'Cambio de las 2 LLantas', NULL, '2017-01-04 21:47:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'robert Humana Caceres', 'pepo', '$2a$10$Ga08w0iHghTQc02klG9Ytu3xG2ov7D0PZIcaT5w72PgDHtmniu5ae', 'admin', '2017-01-05 07:25:09', '2017-01-05 07:50:22'),
(2, 'juanito', 'perez', '$2a$10$Ga08w0iHghTQc02klG9Ytu3xG2ov7D0PZIcaT5w72PgDHtmniu5ae', 'user', '2017-01-05 07:52:18', '2017-01-05 08:34:41'),
(3, 'Pedro Pica', 'pedro', '$2a$10$pwVy6yhBfWPFWjzJf14/3.rHv83SnH8vcLWvW7bU6FgBZrMYrCDha', 'user', '2017-01-05 08:03:07', '2017-01-05 08:03:07');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `treparacion_moto_ibfk_1` FOREIGN KEY (`moto_id`) REFERENCES `motos` (`id`),
  ADD CONSTRAINT `treparacion_moto_ibfk_2` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
