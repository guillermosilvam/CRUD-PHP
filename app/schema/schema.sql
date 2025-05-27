-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2025 a las 20:45:33
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
-- Base de datos: `php_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `codigo` int(15) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`codigo`, `nombre`) VALUES
(112233, 'Caracas'),
(445566, 'Merida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajeros`
--

CREATE TABLE `pasajeros` (
  `fk_pasaporte` int(15) NOT NULL,
  `fk_codigo_reservacion` int(15) NOT NULL,
  `asiento` varchar(3) NOT NULL,
  `clase` enum('Primera','Turista','Economica') NOT NULL DEFAULT 'Economica',
  `precio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasajeros`
--

INSERT INTO `pasajeros` (`fk_pasaporte`, `fk_codigo_reservacion`, `asiento`, `clase`, `precio`) VALUES
(648984, 1, 'P2', 'Primera', 800),
(4984658, 1, 'P1', 'Primera', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `codigo` int(15) NOT NULL,
  `fk_pasaporte_solicitante` int(15) NOT NULL,
  `fk_codigo_viaje` int(15) NOT NULL,
  `cantidad_puestos` int(1) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`codigo`, `fk_pasaporte_solicitante`, `fk_codigo_viaje`, `cantidad_puestos`, `estado`, `fecha_creacion`) VALUES
(1, 4984658, 1441, 2, 'Activo', '2025-05-27 02:46:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trenes`
--

CREATE TABLE `trenes` (
  `codigo` int(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `velocidad` int(3) NOT NULL,
  `capacidad_total` int(3) NOT NULL,
  `capacidad_economica` int(2) NOT NULL,
  `capacidad_turista` int(2) NOT NULL,
  `capacidad_primera` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trenes`
--

INSERT INTO `trenes` (`codigo`, `nombre`, `velocidad`, `capacidad_total`, `capacidad_economica`, `capacidad_turista`, `capacidad_primera`) VALUES
(7777, 'Nozomi', 100, 120, 40, 40, 40),
(8888, 'Hikari', 200, 200, 100, 50, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `pasaporte` int(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `edad` int(3) NOT NULL,
  `sexo` enum('Masculino','Femenino') NOT NULL,
  `tipo` enum('Operador','Supervisor') NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pasaporte`, `nombre`, `edad`, `sexo`, `tipo`, `clave`) VALUES
(648984, 'Guillermo Silva', 19, 'Masculino', 'Supervisor', '1234'),
(4984658, 'Gilberto Wu', 21, 'Masculino', 'Operador', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `codigo` int(15) NOT NULL,
  `fk_codigo_tren` int(15) NOT NULL,
  `fk_codigo_origen` int(15) NOT NULL,
  `fk_codigo_destino` int(15) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`codigo`, `fk_codigo_tren`, `fk_codigo_origen`, `fk_codigo_destino`, `fecha`, `hora`) VALUES
(1441, 8888, 112233, 445566, '2025-05-27', '09:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD PRIMARY KEY (`fk_pasaporte`,`fk_codigo_reservacion`),
  ADD KEY `fk_codigo_reservacion` (`fk_codigo_reservacion`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_codigo_solicitante` (`fk_pasaporte_solicitante`),
  ADD KEY `fk_codigo_viaje` (`fk_codigo_viaje`);

--
-- Indices de la tabla `trenes`
--
ALTER TABLE `trenes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pasaporte`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_codigo_tren` (`fk_codigo_tren`),
  ADD KEY `fk_codigo_origen` (`fk_codigo_origen`),
  ADD KEY `fk_codigo_destino` (`fk_codigo_destino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD CONSTRAINT `pasajeros_ibfk_1` FOREIGN KEY (`fk_pasaporte`) REFERENCES `usuarios` (`pasaporte`) ON DELETE CASCADE,
  ADD CONSTRAINT `pasajeros_ibfk_2` FOREIGN KEY (`fk_codigo_reservacion`) REFERENCES `reservaciones` (`codigo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`fk_pasaporte_solicitante`) REFERENCES `usuarios` (`pasaporte`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`fk_codigo_viaje`) REFERENCES `viajes` (`codigo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`fk_codigo_tren`) REFERENCES `trenes` (`codigo`),
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`fk_codigo_origen`) REFERENCES `ciudades` (`codigo`),
  ADD CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`fk_codigo_destino`) REFERENCES `ciudades` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
