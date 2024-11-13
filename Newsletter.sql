-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 00:41:17
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
-- Base de datos: `horizon_bank`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `cajadeahorro` int(10) NOT NULL,
  `saldo` decimal(10,0) NOT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`cajadeahorro`, `saldo`, `fecha`, `id_usuario`) VALUES
(1234567892, -12067, '2024-10-28', 1),
(1234567893, 29900, '2024-10-28', 2),
(1234567894, 31610, '2024-10-28', 3),
(1234567895, 1110, '2024-11-02', 4),
(1234567896, 5263, '2024-11-04', 5),
(1234567897, 90, '2024-11-06', 6),
(1234567898, 0, '2024-11-11', 7),
(1234567899, 0, '2024-11-11', 8),
(1234567900, 0, '2024-11-11', 9),
(1234567901, 0, '2024-11-11', 10),
(1234567902, 0, '2024-11-11', 12),
(1234567903, 0, '2024-11-11', 13),
(1234567904, 0, '2024-11-11', 14),
(1234567905, 0, '2024-11-11', 16),
(1234567906, 0, '2024-11-11', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `numtransaccion` int(11) NOT NULL,
  `cajadeahorro` int(11) NOT NULL,
  `caja_destino` int(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`numtransaccion`, `cajadeahorro`, `caja_destino`, `tipo`, `monto`, `descripcion`, `fecha`) VALUES
(2, 1234567892, 1234567896, 'transferencia', 100, 'donacion', '2024-11-05 00:00:00'),
(3, 1234567892, 1234567896, 'transferencia', 100, 'donacion', '2024-11-05 00:00:00'),
(4, 1234567892, 1234567896, 'transferencia', 100, 'donacion', '2024-11-05 00:00:00'),
(5, 1234567892, 1234567896, 'transferencia', 50, '1', '2024-11-05 00:00:00'),
(6, 1234567892, 1234567896, 'transferencia', 100, 'DISFRUTALO PAPA', '2024-11-05 00:00:00'),
(7, 1234567892, 1234567896, 'transferencia', 100, 'DISFRUTALO PAPA', '2024-11-05 00:00:00'),
(8, 1234567892, 1234567896, 'transferencia', 1410, 'Alquiler', '2024-11-05 00:00:00'),
(9, 1234567892, 1234567896, 'transferencia', 1410, 'Alquiler', '2024-11-05 00:00:00'),
(10, 1234567892, 1234567896, 'transferencia', 333, 'Honorarios', '2024-11-05 00:00:00'),
(11, 1234567892, 1234567896, 'transferencia', 100, 'a', '2024-11-05 00:00:00'),
(12, 1234567892, 1234567896, 'transferencia', 100, '1', '2024-11-05 00:00:00'),
(13, 1234567892, 1234567896, 'transferencia', 100, 'ej: pago', '2024-11-05 00:00:00'),
(14, 1234567892, 1234567896, 'transferencia', 100, 'ej: pago', '2024-11-05 00:00:00'),
(15, 1234567892, 1234567896, 'transferencia', 1, 'ej: pago', '2024-11-05 00:00:00'),
(16, 1234567892, 1234567896, 'transferencia', 1, 'ej: pago', '2024-11-05 00:00:00'),
(17, 1234567892, 1234567896, 'transferencia', 1, 'ej: pago', '2024-11-05 00:00:00'),
(18, 1234567892, 1234567896, 'transferencia', 13, 'ej: pago', '2024-11-05 00:00:00'),
(19, 1234567892, 1234567896, 'transferencia', 13, 'ej: pago', '2024-11-05 00:00:00'),
(20, 1234567892, 1234567896, 'transferencia', 100, 'ej: pago', '2024-11-05 00:00:00'),
(21, 1234567892, 1234567896, 'transferencia', 100, 'ej: pago', '2024-11-05 00:00:00'),
(22, 1234567892, 1234567896, 'transferencia', 100, 'ej: pago', '2024-11-05 00:00:00'),
(23, 1234567892, 1234567896, 'transferencia', 100, 'ej: pago', '2024-11-05 00:00:00'),
(24, 1234567893, 1234567892, 'transferencia', 7610, 'alquiler', '2024-11-05 00:00:00'),
(25, 1234567893, 1234567892, 'transferencia', 100, 'de onda', '2024-11-05 00:00:00'),
(26, 1234567892, 1234567896, 'transferencia', 100, 'ej: pago', '2024-11-06 00:00:00'),
(27, 1234567897, 1234567892, 'transferencia', 10, 'lo que te debia', '2024-11-06 00:00:00'),
(28, 1234567892, 1234567894, 'transferencia', 30500, 'ALQUILER', '2024-11-11 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `dni` int(8) NOT NULL,
  `alias` varchar(12) NOT NULL,
  `contrasena` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `dni`, `alias`, `contrasena`) VALUES
(1, 'bruno.diaz1011@gmail.com', 42873269, 'papuneta', 'b3f36def33fff27629fc7e84c95ce8ca'),
(2, 'facha33@gmail.com', 22342309, 'fachipiola', 'ektadc123'),
(3, 'tomaschamorro10@hotmail.com', 43304130, 'tomyyyu', 'ektadc123'),
(4, 'santichan@hotmail.com', 42889392, 'xganador', 'ektadc123'),
(5, 'carlosjuan@gmail.com', 24242525, 'juanca11', 'ektadc123'),
(6, 'bruni10@gmail.com', 42873266, 'lamaquina', '@Ektadc123'),
(7, 'carlos@carlos', 93993939, 'carlitos', '769eb227aec1e3a'),
(8, 'prueba@gmail.com', 11112222, 'pruebita', '769eb227aec1e3a'),
(9, 'facha@facha', 33334444, 'facha', '769eb227aec1e3a'),
(10, 'facha2@facha2', 22223333, 'fach3', 'd41d8cd98f00b20'),
(12, 'sad@dasdasda', 13124242, 'fachipiola12', 'd41d8cd98f00b20'),
(13, 'asdsadasd@adasdas', 13123123, 'fachipiola11', '769eb227aec1e3a'),
(14, 'brunoSchub@cloud', 31234242, 'brunoSchub', '769eb227aec1e3ad783a3f30e8e7d7b3'),
(16, 'asdasdad@gmail.com', 42873261, 'fafita', '769eb227aec1e3ad783a3f30e8e7d7b3'),
(17, 'script@script', 90909090, 'script', '464440f9dfe2818f8446606d7d1f032f');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`cajadeahorro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`numtransaccion`),
  ADD KEY `cajadeahorro` (`cajadeahorro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `cajadeahorro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567907;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `numtransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `cajadeahorro` FOREIGN KEY (`cajadeahorro`) REFERENCES `cuenta` (`cajadeahorro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
