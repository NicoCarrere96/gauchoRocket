-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 12, 2019 at 01:23 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gauchoRocket2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabina`
--

CREATE TABLE `cabina` (
  `cabina_id_modelo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cabina`
--

INSERT INTO `cabina` (`cabina_id_modelo`, `descripcion`, `capacidad`) VALUES
(1, 'F', 75),
(1, 'G', 200),
(1, 'S', 25),
(2, 'F', 18),
(2, 'G', 100),
(2, 'S', 2),
(3, 'F', 50),
(3, 'G', 0),
(3, 'S', 50),
(4, 'F', 0),
(4, 'G', 110),
(4, 'S', 0),
(5, 'F', 50),
(5, 'G', 0),
(5, 'S', 10),
(6, 'F', 70),
(6, 'G', 0),
(6, 'S', 10),
(7, 'F', 75),
(7, 'G', 200),
(7, 'S', 25),
(8, 'F', 10),
(8, 'G', 300),
(8, 'S', 40),
(9, 'F', 25),
(9, 'G', 150),
(9, 'S', 25),
(10, 'F', 0),
(10, 'G', 0),
(10, 'S', 100);

-- --------------------------------------------------------

--
-- Table structure for table `centro_medico`
--

CREATE TABLE `centro_medico` (
  `id_centro_medico` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `cantidad_turnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centro_medico`
--

INSERT INTO `centro_medico` (`id_centro_medico`, `descripcion`, `direccion`, `cantidad_turnos`) VALUES
(1, 'Centro Medico Buenos Aires', 'Av Rivadavia 11506', 300),
(2, 'Centro Medico Shanghai', 'Boedo 1150', 210),
(3, 'Centro Medico Ankara', 'Marcos Paz 569', 200);

-- --------------------------------------------------------

--
-- Table structure for table `confirmacion`
--

CREATE TABLE `confirmacion` (
  `hash` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destino`
--

INSERT INTO `destino` (`id_destino`, `descripcion`) VALUES
(1, 'Buenos Aires'),
(2, 'Ankara'),
(3, 'Estacion Espacial Internacional'),
(4, 'Orbital Hotel'),
(5, 'Luna'),
(6, 'Marte'),
(7, 'Ganimedes'),
(8, 'Europa'),
(9, 'Io'),
(10, 'Encelado'),
(11, 'Titan');

-- --------------------------------------------------------

--
-- Table structure for table `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `modelo_equipo` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `modelo_equipo`, `matricula`) VALUES
(1, 1, 'O1'),
(2, 1, 'O2'),
(3, 1, 'O6'),
(4, 1, 'O7'),
(5, 2, 'O3'),
(6, 2, 'O4'),
(7, 2, 'O5'),
(8, 2, 'O8'),
(9, 2, 'O9'),
(10, 3, 'BA1'),
(11, 3, 'BA2'),
(12, 3, 'BA3'),
(13, 4, 'BA4'),
(14, 4, 'BA5'),
(15, 4, 'BA6'),
(16, 4, 'BA7'),
(17, 5, 'BA8'),
(18, 5, 'BA9'),
(19, 5, 'BA10'),
(20, 5, 'BA11'),
(21, 5, 'BA12'),
(22, 6, 'BA13'),
(23, 6, 'BA14'),
(24, 6, 'BA15'),
(25, 6, 'BA16'),
(26, 6, 'BA17'),
(27, 7, 'AA1'),
(28, 7, 'AA5'),
(29, 7, 'AA9'),
(30, 7, 'AA13'),
(31, 7, 'AA17'),
(32, 8, 'AA2'),
(33, 8, 'AA6'),
(34, 8, 'AA10'),
(35, 8, 'AA14'),
(36, 8, 'AA18'),
(37, 9, 'AA3'),
(38, 9, 'AA7'),
(39, 9, 'AA11'),
(40, 9, 'AA15'),
(41, 9, 'AA19'),
(42, 10, 'AA4'),
(43, 10, 'AA8'),
(44, 10, 'AA12'),
(45, 10, 'AA16');

-- --------------------------------------------------------

--
-- Table structure for table `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `modelo_tipo_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `descripcion`, `modelo_tipo_vuelo`) VALUES
(1, 'Calandria', 1),
(2, 'Colibri', 1),
(3, 'Zorzal', 2),
(4, 'Carancho', 2),
(5, 'Aguilucho', 2),
(6, 'Canario', 2),
(7, 'Aguila', 3),
(8, 'Condor', 3),
(9, 'Halcon', 3),
(10, 'Guanaco', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nivel_pasajero`
--

CREATE TABLE `nivel_pasajero` (
  `id_nivel` int(11) NOT NULL,
  `id_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nivel_pasajero`
--

INSERT INTO `nivel_pasajero` (`id_nivel`, `id_numero`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 3),
(9, 3),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `dni_persona` bigint(20) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `tipo_pasajero` tinyint(4) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`nombre`, `apellido`, `fecha_nac`, `dni_persona`, `direccion`, `tipo_pasajero`, `mail`) VALUES
('carlos', 'molino', '2010-09-09', 11223344, 'la caca', NULL, 'caca@caca.com'),
('Sebastian', 'Basconcelo', '2017-11-30', 22334455, 'La Tirica 1190', NULL, 'asdasd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `reserva_vuelo` int(11) NOT NULL,
  `reserva_trayecto` int(11) NOT NULL,
  `cod_reserva` int(11) NOT NULL,
  `dni_persona_reserva` bigint(20) NOT NULL,
  `tipo_cabina` varchar(1) DEFAULT NULL,
  `cantidad_lugares` int(11) DEFAULT NULL,
  `pagado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `reserva_vuelo`, `reserva_trayecto`, `cod_reserva`, `dni_persona_reserva`, `tipo_cabina`, `cantidad_lugares`, `pagado`) VALUES
(2, 1, 1, 1, 11223344, '1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_viaje`
--

CREATE TABLE `tipo_viaje` (
  `id_tipo_viaje` int(11) NOT NULL,
  `descripcion_tv` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_viaje`
--

INSERT INTO `tipo_viaje` (`id_tipo_viaje`, `descripcion_tv`) VALUES
(1, 'Suborbital'),
(2, 'Tour'),
(3, 'Entre destinos');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_vuelo`
--

CREATE TABLE `tipo_vuelo` (
  `id_tipo_vuelo` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_vuelo`
--

INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `descripcion`) VALUES
(1, 'Orbital'),
(2, 'Baja aceleración'),
(3, 'Alta aceleración');

-- --------------------------------------------------------

--
-- Table structure for table `trayecto`
--

CREATE TABLE `trayecto` (
  `id_trayecto` int(11) NOT NULL,
  `id_vuelo_trayecto` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trayecto`
--

INSERT INTO `trayecto` (`id_trayecto`, `id_vuelo_trayecto`, `origen`, `destino`, `duracion`, `precio`) VALUES
(1, 1, 1, 1, 8, 800),
(2, 2, 2, 2, 8, 800),
(3, 3, 1, 1, 8, 800),
(4, 4, 2, 2, 8, 800),
(5, 5, 1, 1, 840, 15000),
(6, 6, 1, 1, 840, 15000),
(7, 7, 3, 4, 1, 100),
(8, 8, 3, 5, 17, 1000),
(9, 8, 3, 6, 43, 2500),
(10, 8, 4, 5, 16, 900),
(11, 8, 4, 6, 42, 2400),
(12, 8, 5, 6, 26, 1800),
(13, 8, 4, 3, 1, 100),
(14, 8, 5, 3, 17, 1000),
(15, 8, 6, 3, 43, 2500),
(16, 8, 5, 4, 16, 900),
(17, 8, 6, 4, 42, 2400),
(18, 8, 6, 5, 26, 1800),
(19, 10, 3, 4, 1, 200),
(20, 10, 3, 5, 10, 2000),
(21, 10, 3, 6, 32, 5000),
(22, 10, 4, 5, 9, 1800),
(23, 10, 4, 6, 31, 4900),
(24, 10, 5, 6, 22, 4500),
(25, 10, 4, 3, 1, 200),
(26, 10, 5, 3, 10, 2000),
(27, 10, 6, 3, 32, 5000),
(28, 10, 5, 4, 9, 1800),
(29, 10, 6, 4, 31, 4900),
(30, 10, 6, 5, 22, 4500),
(31, 12, 3, 5, 14, 2000),
(32, 12, 3, 7, 62, 6000),
(33, 12, 3, 8, 112, 12000),
(34, 12, 3, 9, 163, 16000),
(35, 12, 3, 10, 233, 23000),
(36, 12, 3, 11, 310, 30000),
(37, 12, 5, 7, 48, 5000),
(38, 12, 5, 8, 98, 9000),
(39, 12, 5, 9, 149, 15000),
(40, 12, 5, 10, 219, 22000),
(41, 12, 5, 11, 296, 28000),
(42, 12, 7, 8, 50, 5000),
(43, 12, 7, 9, 101, 10000),
(44, 12, 7, 10, 171, 17000),
(45, 12, 7, 11, 248, 24000),
(46, 12, 8, 9, 51, 5500),
(47, 12, 8, 10, 121, 12500),
(48, 12, 8, 11, 192, 18000),
(49, 12, 9, 10, 70, 3000),
(50, 12, 9, 11, 147, 15000),
(51, 12, 10, 11, 77, 7500),
(52, 12, 5, 3, 18, 2000),
(53, 12, 7, 3, 62, 6000),
(54, 12, 8, 3, 112, 12000),
(55, 12, 9, 3, 163, 16000),
(56, 12, 10, 3, 233, 23000),
(57, 12, 11, 3, 310, 30000),
(58, 12, 7, 5, 48, 5000),
(59, 12, 8, 5, 98, 9000),
(60, 12, 9, 5, 149, 15000),
(61, 12, 10, 5, 219, 22000),
(62, 12, 11, 5, 296, 28000),
(63, 12, 8, 7, 50, 5000),
(64, 12, 9, 7, 101, 10000),
(65, 12, 10, 7, 171, 17000),
(66, 12, 11, 7, 248, 24000),
(67, 12, 9, 8, 51, 5500),
(68, 12, 10, 8, 121, 12500),
(69, 12, 11, 8, 192, 18000),
(70, 12, 10, 9, 70, 3000),
(71, 12, 11, 9, 147, 15000),
(72, 12, 11, 10, 77, 7500),
(73, 14, 3, 5, 10, 5000),
(74, 14, 3, 7, 42, 11500),
(75, 14, 3, 8, 75, 22000),
(76, 14, 3, 9, 110, 30000),
(77, 14, 3, 10, 160, 38000),
(78, 14, 3, 11, 237, 50000),
(79, 14, 5, 7, 32, 10000),
(80, 14, 5, 8, 65, 20000),
(81, 14, 5, 9, 100, 29000),
(82, 14, 5, 10, 150, 35000),
(83, 14, 5, 11, 202, 40000),
(84, 14, 7, 8, 33, 10000),
(85, 14, 7, 9, 38, 11000),
(86, 14, 7, 10, 88, 24000),
(87, 14, 7, 11, 140, 34000),
(88, 14, 8, 9, 35, 10500),
(89, 14, 8, 10, 85, 24000),
(90, 14, 8, 11, 137, 34000),
(91, 14, 9, 10, 50, 14000),
(92, 14, 9, 11, 102, 30000),
(93, 14, 10, 11, 52, 18000),
(94, 14, 5, 3, 10, 5000),
(95, 14, 7, 3, 42, 11500),
(96, 14, 8, 3, 75, 22000),
(97, 14, 9, 3, 110, 30000),
(98, 14, 10, 3, 160, 38000),
(99, 14, 11, 3, 237, 50000),
(100, 14, 7, 5, 32, 10000),
(101, 14, 8, 5, 65, 20000),
(102, 14, 9, 5, 100, 29000),
(103, 14, 10, 5, 150, 35000),
(104, 14, 11, 5, 202, 40000),
(105, 14, 8, 7, 33, 10000),
(106, 14, 9, 7, 38, 11000),
(107, 14, 10, 7, 88, 24000),
(108, 14, 11, 7, 140, 34000),
(109, 14, 9, 8, 35, 10500),
(110, 14, 10, 8, 85, 24000),
(111, 14, 11, 8, 137, 34000),
(112, 14, 10, 9, 50, 14000),
(113, 14, 11, 9, 102, 30000),
(114, 14, 11, 10, 52, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `nick` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `rol` varchar(15) NOT NULL,
  `dni_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nick`, `password`, `rol`, `dni_usuario`) VALUES
('rere', 'b59c67bf196a4758191e42f76670ceba', '2', 11222333),
('admin', 'admin', 'admin', 11223344),
('basco1979', '1111', '2', 12345678),
('cacho', '1122', 'usuario', 22334455);

-- --------------------------------------------------------

--
-- Table structure for table `vuelo`
--

CREATE TABLE `vuelo` (
  `id_vuelo` int(11) NOT NULL,
  `equipo_vuelo` int(11) NOT NULL,
  `tipo_viaje_vuelo` int(11) NOT NULL,
  `hora_partida` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vuelo`
--

INSERT INTO `vuelo` (`id_vuelo`, `equipo_vuelo`, `tipo_viaje_vuelo`, `hora_partida`, `fecha`) VALUES
(1, 1, 1, 12, '2019-11-04'),
(2, 2, 1, 15, '2019-11-04'),
(3, 3, 1, 17, '2019-11-04'),
(4, 4, 1, 12, '2019-11-04'),
(5, 5, 1, 18, '2019-11-04'),
(6, 42, 2, 12, '2019-10-27'),
(7, 43, 2, 22, '2020-01-03'),
(8, 10, 3, 8, '2019-11-04'),
(9, 10, 3, 8, '2019-11-07'),
(10, 27, 3, 9, '2019-11-05'),
(11, 27, 3, 14, '2019-11-07'),
(12, 15, 3, 8, '2019-11-06'),
(13, 15, 3, 8, '2019-11-09'),
(14, 32, 3, 20, '2019-11-11'),
(15, 32, 3, 22, '2019-11-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabina`
--
ALTER TABLE `cabina`
  ADD PRIMARY KEY (`cabina_id_modelo`,`descripcion`);

--
-- Indexes for table `centro_medico`
--
ALTER TABLE `centro_medico`
  ADD PRIMARY KEY (`id_centro_medico`);

--
-- Indexes for table `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indexes for table `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `modelo_equipo` (`modelo_equipo`);

--
-- Indexes for table `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `modelo_tipo_vuelo` (`modelo_tipo_vuelo`);

--
-- Indexes for table `nivel_pasajero`
--
ALTER TABLE `nivel_pasajero`
  ADD PRIMARY KEY (`id_nivel`,`id_numero`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`dni_persona`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `reserva_vuelo` (`reserva_vuelo`,`reserva_trayecto`),
  ADD KEY `dni_persona_reserva` (`dni_persona_reserva`);

--
-- Indexes for table `tipo_viaje`
--
ALTER TABLE `tipo_viaje`
  ADD PRIMARY KEY (`id_tipo_viaje`);

--
-- Indexes for table `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id_tipo_vuelo`);

--
-- Indexes for table `trayecto`
--
ALTER TABLE `trayecto`
  ADD PRIMARY KEY (`id_vuelo_trayecto`,`id_trayecto`),
  ADD KEY `partida` (`origen`),
  ADD KEY `llegada` (`destino`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni_usuario`);

--
-- Indexes for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `tipo_viaje_vuelo` (`tipo_viaje_vuelo`),
  ADD KEY `equipo_vuelo` (`equipo_vuelo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centro_medico`
--
ALTER TABLE `centro_medico`
  MODIFY `id_centro_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabina`
--
ALTER TABLE `cabina`
  ADD CONSTRAINT `cabina_ibfk_1` FOREIGN KEY (`cabina_id_modelo`) REFERENCES `modelo` (`id_modelo`);

--
-- Constraints for table `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `trayecto` (`origen`),
  ADD CONSTRAINT `destino_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `trayecto` (`destino`);

--
-- Constraints for table `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`modelo_equipo`) REFERENCES `modelo` (`id_modelo`);

--
-- Constraints for table `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`modelo_tipo_vuelo`) REFERENCES `tipo_vuelo` (`id_tipo_vuelo`);

--
-- Constraints for table `nivel_pasajero`
--
ALTER TABLE `nivel_pasajero`
  ADD CONSTRAINT `nivel_pasajero_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `modelo` (`id_modelo`);

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`dni_persona`) REFERENCES `usuario` (`dni_usuario`);

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`reserva_vuelo`,`reserva_trayecto`) REFERENCES `trayecto` (`id_vuelo_trayecto`, `id_trayecto`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`dni_persona_reserva`) REFERENCES `persona` (`dni_persona`);

--
-- Constraints for table `trayecto`
--
ALTER TABLE `trayecto`
  ADD CONSTRAINT `trayecto_ibfk_1` FOREIGN KEY (`id_vuelo_trayecto`) REFERENCES `vuelo` (`id_vuelo`),
  ADD CONSTRAINT `trayecto_ibfk_2` FOREIGN KEY (`origen`) REFERENCES `destino` (`id_destino`),
  ADD CONSTRAINT `trayecto_ibfk_3` FOREIGN KEY (`destino`) REFERENCES `destino` (`id_destino`);

--
-- Constraints for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`tipo_viaje_vuelo`) REFERENCES `tipo_viaje` (`id_tipo_viaje`),
  ADD CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`equipo_vuelo`) REFERENCES `equipo` (`id_equipo`);