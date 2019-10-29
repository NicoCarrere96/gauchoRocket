-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-10-2019 a las 01:49:53
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gauchorocket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirmación`
--

CREATE TABLE `confirmación` (
  `hash` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nac` date NOT NULL,
  `dni` bigint(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `tipo_pasajero` tinyint(4) NOT NULL,
  `mail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nombre`, `apellido`, `fecha_nac`, `dni`, `direccion`, `tipo_pasajero`, `mail`) VALUES
('admin', 'admin', '1970-12-31', 11122333, 'varela 223', 0, 'admin@test.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` bigint(20) NOT NULL,
  `dni_pasajero` bigint(20) NOT NULL,
  `cod_reserva` varchar(50) NOT NULL,
  `id_vuelo` int(11) NOT NULL,
  `tipo_cabina` bigint(20) NOT NULL,
  `pagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vuelo`
--

CREATE TABLE `tipo_vuelo` (
  `id_tipo_vuelo` tinyint(4) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_vuelo`
--

INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `descripcion`) VALUES
(1, 'suborbital'),
(2, 'entredestinos'),
(3, 'tour');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nick` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `dni` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nick`, `password`, `rol`, `dni`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', '2', 11122333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id_vuelo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `origen` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `tipo` tinyint(11) NOT NULL,
  `cant_pasaj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id_vuelo`, `fecha`, `origen`, `destino`, `tipo`, `cant_pasaj`) VALUES
(1, '2019-10-20', 'Marte', 'Luna', 2, 40),
(2, '2019-10-21', 'Buenos Aires', 'Ankara', 1, 100),
(3, '2019-10-21', 'Buenos Aires', 'EEI', 1, 100),
(4, '2019-10-21', 'Buenos Aires', 'OrbitalHotel', 1, 100),
(5, '2019-10-21', 'Buenos Aires', 'Luna', 1, 100),
(6, '2019-10-21', 'Buenos Aires', 'Marte', 1, 100),
(7, '2019-10-21', 'Ankara', 'EEI', 1, 100),
(8, '2019-10-21', 'Ankara', 'OrbitalHotel', 1, 100),
(9, '2019-10-21', 'Ankara', 'Marte', 1, 100),
(10, '2019-10-22', 'EEI', 'OrbitalHotel', 2, 50),
(11, '2019-10-22', 'OrbitalHotel', 'Luna', 2, 50),
(12, '2019-10-21', 'EEI', 'Marte', 2, 50),
(13, '2019-10-21', 'EEI', 'Europa', 2, 100),
(14, '2019-10-22', 'EEI', 'Marte', 2, 50),
(15, '2019-10-22', 'EEI', 'Ganimedes', 2, 50),
(16, '2019-10-22', 'EEI', 'Europa', 2, 50),
(17, '2019-10-22', 'EEI', 'IO', 2, 50),
(18, '2019-10-22', 'EEI', 'Encedalo', 2, 50),
(19, '2019-10-22', 'EEI', 'Titan', 2, 50),
(20, '2019-10-22', 'OrbitalHotel', 'Marte', 2, 50),
(21, '2019-10-22', 'EEI', 'Luna', 2, 50),
(22, '2019-10-15', 'Buenos Aires', 'OrbitalHotel', 1, 200),
(23, '2019-10-16', 'Buenos Aires', 'OrbitalHotel', 1, 200);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `dni_pasajero` (`dni_pasajero`),
  ADD KEY `id_vuelo` (`id_vuelo`);

--
-- Indices de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id_tipo_vuelo`),
  ADD KEY `id` (`id_tipo_vuelo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nick`,`dni`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `dni` (`dni`) USING BTREE;

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`dni_pasajero`) REFERENCES `persona` (`dni`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id_vuelo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`);

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_vuelo` (`id_tipo_vuelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
