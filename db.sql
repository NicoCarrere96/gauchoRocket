-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 15, 2019 at 01:26 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gauchorocket`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);


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
-- Constraints for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_vuelo` (`id`);
