-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 29, 2019 at 09:18 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gauchorocket`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirmación`
--

CREATE TABLE `confirmación` (
  `hash` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nac` date NOT NULL,
  `dni` bigint(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `tipo_pasajero` tinyint(4) NOT NULL DEFAULT '1',
  `mail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`nombre`, `apellido`, `fecha_nac`, `dni`, `direccion`, `tipo_pasajero`, `mail`) VALUES
('xxxx', 'xxxx', '1111-11-11', 1111111, 'xxxx', 1, 'xxx@asdd.com'),
('admin', 'admin', '1970-12-31', 11122333, 'varela 223', 0, 'admin@test.com'),
('Coco', 'Chanel', '0012-12-12', 12121212, 'LaLaLa', 1, 'lalla@lalal.com'),
('Coca', 'Llala', '1313-12-13', 13131313, 'lalalal', 1, 'lallalala@lalalal.com'),
('Carlos', 'Saul', '1898-09-09', 22334455, 'La chota 1100', 1, 'tuhna@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` bigint(20) NOT NULL,
  `dni_pasajero` bigint(20) NOT NULL,
  `cod_reserva` varchar(50) NOT NULL,
  `id_vuelo` int(11) NOT NULL,
  `tipo_cabina` varchar(20) NOT NULL,
  `pagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `dni_pasajero`, `cod_reserva`, `id_vuelo`, `tipo_cabina`, `pagado`) VALUES
(3, 11122333, '100', 21, 'suite', 0),
(4, 11122333, '41', 3, 'suite', 0),
(9, 22334455, '73', 3, 'suite', 0),
(10, 1111111, '29', 3, 'suite', 0),
(11, 12121212, '58', 3, 'suite', 0),
(12, 13131313, '58', 3, 'suite', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_vuelo`
--

CREATE TABLE `tipo_vuelo` (
  `id_tipo_vuelo` tinyint(4) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_vuelo`
--

INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `descripcion`) VALUES
(1, 'suborbital'),
(2, 'entredestinos'),
(3, 'tour');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `nick` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `dni` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nick`, `password`, `rol`, `dni`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', '2', 11122333);

-- --------------------------------------------------------

--
-- Table structure for table `vuelo`
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
-- Dumping data for table `vuelo`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `dni` (`dni`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `dni_pasajero` (`dni_pasajero`),
  ADD KEY `id_vuelo` (`id_vuelo`);

--
-- Indexes for table `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id_tipo_vuelo`),
  ADD KEY `id` (`id_tipo_vuelo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nick`,`dni`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `dni` (`dni`) USING BTREE;

--
-- Indexes for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`dni_pasajero`) REFERENCES `persona` (`dni`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id_vuelo`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`);

--
-- Constraints for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_vuelo` (`id_tipo_vuelo`);
