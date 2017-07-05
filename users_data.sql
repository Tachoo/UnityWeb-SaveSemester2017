-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2017 a las 18:57:06
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `savesemester`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `premium` int(10) DEFAULT '0',
  `password` varchar(64) DEFAULT NULL,
  `server` varchar(64) DEFAULT 'NA',
  `horasjugadas` bigint(200) DEFAULT '0',
  `rango` varchar(64) DEFAULT 'none',
  `validate` int(1) DEFAULT '0',
  `code` int(100) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_data`
--

INSERT INTO `users_data` (`id`, `email`, `username`, `premium`, `password`, `server`, `horasjugadas`, `rango`, `validate`, `code`) VALUES
(1, 'senao28@icloud.com', 'Tachoo', 12, 'Ninoyuki200', 'asia', 90, 'Master', 0, 0),
(2, 'senao28@prodigy.com', 'XTachoo', 700, 'iloveniconiconii', 'NA', 390, 'Challenger', 0, 0),
(3, 'tachoo@tachoo.xyz', 'Nosoytachoo', 1, '123', 'LAN', 0, 'principiante', 0, 0),
(9, 'padre@tu.com', 'padre', 0, 'soytupadre', 'USA', 0, 'none', 0, 29811),
(8, 'edgar@edgar.com', 'Edgarmoreno', 0, 'contradeedgar', 'LAN', 0, 'none', 0, 15789);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
