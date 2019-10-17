-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2019 at 02:00 AM
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
  `tipo_pasajero` tinyint(4) NOT NULL,
  `mail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_vuelo`
--

CREATE TABLE `tipo_vuelo` (
  `id` tinyint(4) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_vuelo`
--

INSERT INTO `tipo_vuelo` (`id`, `descripcion`) VALUES
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
('gaucho', '827ccb0eea8a706c4c34a16891f84e7b', '2', 1111111111),
('qwerty', '81dc9bdb52d04dc20036dbd8313ed055', '2', 1122334455),
('xxxxx', '81dc9bdb52d04dc20036dbd8313ed055', '2', 2233445566);

-- --------------------------------------------------------

--
-- Table structure for table `vuelo`
--

CREATE TABLE `vuelo` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `origen` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `tipo` tinyint(11) NOT NULL,
  `cant_pasaj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vuelo`
--

INSERT INTO `vuelo` (`id`, `fecha`, `origen`, `destino`, `tipo`, `cant_pasaj`) VALUES
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
-- Indexes for table `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `nick` (`nick`),
  ADD PRIMARY KEY (`dni`),
  ADD KEY `dni` (`dni`);

--
-- Indexes for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `persona`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`usuario.dni`) REFERENCES `persona` (`persona.dni`);

--
-- Constraints for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_vuelo` (`id`);
