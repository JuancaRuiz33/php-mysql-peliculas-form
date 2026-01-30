-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2025 a las 03:24:47
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
-- Base de datos: `cine_isil`
--
CREATE DATABASE IF NOT EXISTS `cine_isil` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cine_isil`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `premios` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `titulo`, `premios`, `fechaCreacion`, `duracion`, `genero`) VALUES
(1, 'Godzilla y Kong: El nuevo Imperio', 0, '2024-03-25', 115, 'Accion, Drama, Ciencia ficción, Fantasia y Aventur'),
(9, 'Oppenhaimer', 7, '2023-07-21', 180, 'Suspenso, Drama, Historia'),
(11, 'Spiderman: Sin Camino a casa', 1, '2021-12-17', 148, 'Accion, Superhéroes, romance, Fantasia'),
(12, 'Django, en el nombre del hijo', 0, '2018-01-25', 100, 'Accion, suspenso'),
(13, 'Son como niños 2', 2, '2013-08-15', 101, 'Comedia'),
(14, 'Jurassic World: el reino caido', 5, '2015-06-11', 133, 'Accion, Ciencia ficción'),
(15, '007 Operacion Skyfall', 3, '2012-10-23', 143, 'Accion, suspenso'),
(16, 'Rocky', 2, '1976-11-21', 120, 'Deporte, Accion, Drama');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
