CREATE DATABASE  IF NOT EXISTS `gauchorocket` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gauchorocket`;
-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: gauchorocket
-- ------------------------------------------------------
-- Server version	5.7.27-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asientos_ocupados`
--

DROP TABLE IF EXISTS `asientos_ocupados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asientos_ocupados` (
  `fila` int(11) NOT NULL,
  `asiento` int(11) NOT NULL,
  `id_vuelo` int(11) NOT NULL,
  `tipo_cabina` varchar(1) NOT NULL,
  KEY `id_vuelo` (`id_vuelo`),
  CONSTRAINT `asientos_ocupados_ibfk_2` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id_vuelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asientos_ocupados`
--

LOCK TABLES `asientos_ocupados` WRITE;
/*!40000 ALTER TABLE `asientos_ocupados` DISABLE KEYS */;
INSERT INTO `asientos_ocupados` VALUES (1,1,3,'F'),(0,1,3,'F'),(0,1,8,'F'),(0,2,8,'F'),(1,2,8,'F'),(1,1,8,'F'),(0,3,8,'F'),(0,0,8,'F'),(0,1,8,'F'),(4,3,8,'F'),(4,4,8,'F'),(0,3,3,'F'),(0,9,2,'F'),(0,9,2,'F'),(0,9,2,'F'),(0,8,2,'F'),(0,8,2,'F'),(0,8,2,'F'),(0,8,2,'F'),(0,8,2,'F'),(0,8,2,'F'),(2,4,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(0,8,8,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(3,2,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(2,3,2,'F'),(0,4,3,'S'),(0,1,3,'S'),(0,3,3,'S'),(0,2,1,'F'),(1,2,1,'F'),(0,3,1,'F'),(1,3,1,'F'),(9,3,1,'F');
/*!40000 ALTER TABLE `asientos_ocupados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cabina`
--

DROP TABLE IF EXISTS `cabina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cabina` (
  `cabina_id_modelo` int(11) NOT NULL,
  `descripcion` varchar(1) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `filas` int(11) NOT NULL,
  `asientos` int(11) NOT NULL,
  PRIMARY KEY (`cabina_id_modelo`,`descripcion`),
  CONSTRAINT `cabina_ibfk_1` FOREIGN KEY (`cabina_id_modelo`) REFERENCES `modelo` (`id_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabina`
--

LOCK TABLES `cabina` WRITE;
/*!40000 ALTER TABLE `cabina` DISABLE KEYS */;
INSERT INTO `cabina` VALUES (1,'F',75,15,5),(1,'G',200,20,10),(1,'S',25,5,5),(2,'F',18,6,3),(2,'G',100,10,10),(2,'S',2,1,2),(3,'F',50,5,10),(3,'G',0,0,0),(3,'S',50,5,10),(4,'F',0,0,0),(4,'G',110,11,10),(4,'S',0,0,0),(5,'F',50,5,10),(5,'G',0,0,0),(5,'S',10,5,2),(6,'F',70,10,7),(6,'G',0,0,0),(6,'S',10,5,2),(7,'F',75,15,5),(7,'G',200,20,10),(7,'S',25,5,5),(8,'F',10,5,2),(8,'G',300,20,15),(8,'S',40,10,4),(9,'F',25,5,5),(9,'G',150,15,10),(9,'S',25,5,5),(10,'F',0,0,0),(10,'G',0,0,0),(10,'S',100,10,10);
/*!40000 ALTER TABLE `cabina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centro_medico`
--

DROP TABLE IF EXISTS `centro_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centro_medico` (
  `id_centro_medico` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `cantidad_turnos` int(11) NOT NULL,
  PRIMARY KEY (`id_centro_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_medico`
--

LOCK TABLES `centro_medico` WRITE;
/*!40000 ALTER TABLE `centro_medico` DISABLE KEYS */;
INSERT INTO `centro_medico` VALUES (1,'Centro Medico Buenos Aires','Av Rivadavia 11506',300),(2,'Centro Medico Shanghai','Boedo 1150',210),(3,'Centro Medico Ankara','Marcos Paz 569',200);
/*!40000 ALTER TABLE `centro_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `confirmacion`
--

DROP TABLE IF EXISTS `confirmacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `confirmacion` (
  `hash` varchar(40) NOT NULL,
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confirmacion`
--

LOCK TABLES `confirmacion` WRITE;
/*!40000 ALTER TABLE `confirmacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `confirmacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destino`
--

DROP TABLE IF EXISTS `destino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_destino`),
  CONSTRAINT `destino_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `trayecto` (`origen`),
  CONSTRAINT `destino_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `trayecto` (`destino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destino`
--

LOCK TABLES `destino` WRITE;
/*!40000 ALTER TABLE `destino` DISABLE KEYS */;
INSERT INTO `destino` VALUES (1,'Buenos Aires'),(2,'Ankara'),(3,'Estacion Espacial Internacional'),(4,'Orbital Hotel'),(5,'Luna'),(6,'Marte'),(7,'Ganimedes'),(8,'Europa'),(9,'Io'),(10,'Encelado'),(11,'Titan');
/*!40000 ALTER TABLE `destino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo_equipo` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `modelo_equipo` (`modelo_equipo`),
  CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`modelo_equipo`) REFERENCES `modelo` (`id_modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (1,1,'O1'),(2,1,'O2'),(3,1,'O6'),(4,1,'O7'),(5,2,'O3'),(6,2,'O4'),(7,2,'O5'),(8,2,'O8'),(9,2,'O9'),(10,3,'BA1'),(11,3,'BA2'),(12,3,'BA3'),(13,4,'BA4'),(14,4,'BA5'),(15,4,'BA6'),(16,4,'BA7'),(17,5,'BA8'),(18,5,'BA9'),(19,5,'BA10'),(20,5,'BA11'),(21,5,'BA12'),(22,6,'BA13'),(23,6,'BA14'),(24,6,'BA15'),(25,6,'BA16'),(26,6,'BA17'),(27,7,'AA1'),(28,7,'AA5'),(29,7,'AA9'),(30,7,'AA13'),(31,7,'AA17'),(32,8,'AA2'),(33,8,'AA6'),(34,8,'AA10'),(35,8,'AA14'),(36,8,'AA18'),(37,9,'AA3'),(38,9,'AA7'),(39,9,'AA11'),(40,9,'AA15'),(41,9,'AA19'),(42,10,'AA4'),(43,10,'AA8'),(44,10,'AA12'),(45,10,'AA16');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `modelo_tipo_vuelo` int(11) NOT NULL,
  PRIMARY KEY (`id_modelo`),
  KEY `modelo_tipo_vuelo` (`modelo_tipo_vuelo`),
  CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`modelo_tipo_vuelo`) REFERENCES `tipo_equipo` (`id_tipo_vuelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (1,'Calandria',1),(2,'Colibri',1),(3,'Zorzal',2),(4,'Carancho',2),(5,'Aguilucho',2),(6,'Canario',2),(7,'Aguila',3),(8,'Condor',3),(9,'Halcon',3),(10,'Guanaco',3);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_pasajero`
--

DROP TABLE IF EXISTS `nivel_pasajero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel_pasajero` (
  `id_nivel` int(11) NOT NULL,
  `id_numero` int(11) NOT NULL,
  PRIMARY KEY (`id_nivel`,`id_numero`),
  CONSTRAINT `nivel_pasajero_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `modelo` (`id_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_pasajero`
--

LOCK TABLES `nivel_pasajero` WRITE;
/*!40000 ALTER TABLE `nivel_pasajero` DISABLE KEYS */;
INSERT INTO `nivel_pasajero` VALUES (1,2),(1,3),(2,2),(2,3),(3,1),(3,2),(3,3),(4,2),(4,3),(5,2),(5,3),(6,1),(6,2),(6,3),(7,2),(7,3),(8,3),(9,3),(10,2),(10,3);
/*!40000 ALTER TABLE `nivel_pasajero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `dni_persona` bigint(20) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `tipo_pasajero` tinyint(4) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`dni_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES ('admin','admin','0001-01-01',11111111,'gaucho rocket 0000',3,'admin@gauchorocket.com.ar'),('Nicolas','Admin','1996-10-21',11222333,'moronmoron 14',0,'admintest@test.com'),('primer','pasajero','2000-11-15',12344321,'falsa 123',NULL,'testing@test.bb'),('Nico','Del Canio','1990-01-31',12345678,'Izq 1111',NULL,'nico@gmail.com'),('Manuela','Castaneira','1999-12-31',23456789,'Izq 1111',NULL,'manu@gmail.com'),('Ana','Molina','1981-05-31',31008831,'Guaycuru 1253',3,'jm@gmail.com'),('Carlos','Fernandez','1998-12-31',31008832,'Guaycuru 1253',2,'jm2@gmail.com'),('Cesar','Segovia','1999-10-29',31008833,'Guaycuru 1253',3,'jm3@gmail.com'),('Fabiola','Fernandez','1989-01-31',31008834,'Guaycuru 1253',3,'jm4@gmail.com'),('Fernanda','Segovia','1997-11-11',31008836,'Guaycuru 1253',1,'jm5@gmail.com'),('Samuel','Levingston','1990-11-11',32547698,'Laselva 1234',0,'levingston@gmail.com'),('el ','cheto','1980-03-22',44444444,'chetolandia 123',NULL,'algun@email.com'),('Nico','nico','2000-11-09',66666666,'lala 123',NULL,'eldeltrabajo@work.com'),('Nico','nar','1980-12-12',77777777,'lala 123',NULL,'eldeltrabajo@work.com'),('Otro','Nico','1990-12-13',88888888,'lala 123',NULL,'eldeltrabajo@work.com'),('Angel','Labruna','2007-01-23',98765431,'Monumental',NULL,'labru@g.com'),('Alguno ','de Por ahi','1970-12-14',99999999,'lala 123',NULL,'eldeltrabajo@work.com'),('asdc','asdc','2019-11-21',123412341,'asdc',NULL,'aasc@asdc.ds'),('sdcas','vsdcsa','2019-11-19',1234123412,'asasdca',NULL,'asca@acs.sdc'),('qwfsda','fqewfwqe','1994-12-20',2526362589,'asdfawe 213',0,'asdcas@sdyuvca.scu');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `reserva_vuelo` int(11) NOT NULL,
  `cod_reserva` varchar(10) NOT NULL,
  `dni_persona_reserva` bigint(20) NOT NULL,
  `tipo_cabina` varchar(1) NOT NULL,
  `tipo_servicio` varchar(15) DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0',
  `checkin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_reserva`),
  KEY `dni_persona_reserva` (`dni_persona_reserva`),
  KEY `vuelo_idx` (`reserva_vuelo`),
  KEY `tipoCabina_idx` (`tipo_cabina`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`dni_persona_reserva`) REFERENCES `persona` (`dni_persona`),
  CONSTRAINT `vuelo` FOREIGN KEY (`reserva_vuelo`) REFERENCES `vuelo` (`id_vuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (3,2,'LAcjZFfH',2526362589,'G','',0,1),(4,8,'ZXtabjhp',31008831,'S','',0,1),(5,8,'ZXtabjhp',31008832,'S','',0,1),(6,8,'ZXtabjhp',31008833,'S','',0,1),(7,8,'ZXtabjhp',31008834,'S','',0,1),(8,8,'ZXtabjhp',31008836,'S','',0,1),(9,8,'Mi7w18pQ',23456789,'S','',0,1),(10,8,'Mi7w18pQ',12345678,'S','',0,1),(11,3,'9GSvEfRd',11111111,'S','',1,1),(12,3,'T3ChwS9F',98765431,'S','gourmet',0,1),(13,3,'YJqaWdsD',31008831,'S','standard',0,1),(14,1,'FDNo8Kwr',66666666,'F',NULL,0,1),(15,1,'FDNo8Kwr',77777777,'F',NULL,0,1),(16,1,'FDNo8Kwr',88888888,'F',NULL,0,1),(17,1,'FDNo8Kwr',99999999,'F',NULL,0,1),(18,1,'jYufUK27',44444444,'F',NULL,0,1);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_trayecto`
--

DROP TABLE IF EXISTS `reserva_trayecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva_trayecto` (
  `cod_reserva` int(11) NOT NULL,
  `id_trayecto` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_reserva`,`id_trayecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_trayecto`
--

LOCK TABLES `reserva_trayecto` WRITE;
/*!40000 ALTER TABLE `reserva_trayecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva_trayecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_equipo`
--

DROP TABLE IF EXISTS `tipo_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_equipo` (
  `id_tipo_vuelo` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_vuelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_equipo`
--

LOCK TABLES `tipo_equipo` WRITE;
/*!40000 ALTER TABLE `tipo_equipo` DISABLE KEYS */;
INSERT INTO `tipo_equipo` VALUES (1,'Orbital'),(2,'Baja aceleración'),(3,'Alta aceleración');
/*!40000 ALTER TABLE `tipo_equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_viaje`
--

DROP TABLE IF EXISTS `tipo_viaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_viaje` (
  `id_tipo_viaje` int(11) NOT NULL,
  `descripcion_tv` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_viaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_viaje`
--

LOCK TABLES `tipo_viaje` WRITE;
/*!40000 ALTER TABLE `tipo_viaje` DISABLE KEYS */;
INSERT INTO `tipo_viaje` VALUES (1,'Suborbital'),(2,'Tour'),(3,'Entre destinos');
/*!40000 ALTER TABLE `tipo_viaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trayecto`
--

DROP TABLE IF EXISTS `trayecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trayecto` (
  `id_trayecto` int(11) NOT NULL,
  `id_vuelo_trayecto` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id_vuelo_trayecto`,`id_trayecto`),
  KEY `partida` (`origen`),
  KEY `llegada` (`destino`),
  CONSTRAINT `trayecto_ibfk_1` FOREIGN KEY (`id_vuelo_trayecto`) REFERENCES `vuelo` (`id_vuelo`),
  CONSTRAINT `trayecto_ibfk_2` FOREIGN KEY (`origen`) REFERENCES `destino` (`id_destino`),
  CONSTRAINT `trayecto_ibfk_3` FOREIGN KEY (`destino`) REFERENCES `destino` (`id_destino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trayecto`
--

LOCK TABLES `trayecto` WRITE;
/*!40000 ALTER TABLE `trayecto` DISABLE KEYS */;
INSERT INTO `trayecto` VALUES (1,1,1,1,8,800),(2,2,2,2,8,800),(3,3,1,1,8,800),(4,4,2,2,8,800),(5,5,1,1,840,15000),(6,6,1,1,840,15000),(7,7,3,4,1,100),(8,8,3,5,17,1000),(9,8,3,6,43,2500),(10,8,4,5,16,900),(11,8,4,6,42,2400),(12,8,5,6,26,1800),(13,8,4,3,1,100),(14,8,5,3,17,1000),(15,8,6,3,43,2500),(16,8,5,4,16,900),(17,8,6,4,42,2400),(18,8,6,5,26,1800),(19,10,3,4,1,200),(20,10,3,5,10,2000),(21,10,3,6,32,5000),(22,10,4,5,9,1800),(23,10,4,6,31,4900),(24,10,5,6,22,4500),(25,10,4,3,1,200),(26,10,5,3,10,2000),(27,10,6,3,32,5000),(28,10,5,4,9,1800),(29,10,6,4,31,4900),(30,10,6,5,22,4500),(31,12,3,5,14,2000),(32,12,3,7,62,6000),(33,12,3,8,112,12000),(34,12,3,9,163,16000),(35,12,3,10,233,23000),(36,12,3,11,310,30000),(37,12,5,7,48,5000),(38,12,5,8,98,9000),(39,12,5,9,149,15000),(40,12,5,10,219,22000),(41,12,5,11,296,28000),(42,12,7,8,50,5000),(43,12,7,9,101,10000),(44,12,7,10,171,17000),(45,12,7,11,248,24000),(46,12,8,9,51,5500),(47,12,8,10,121,12500),(48,12,8,11,192,18000),(49,12,9,10,70,3000),(50,12,9,11,147,15000),(51,12,10,11,77,7500),(52,12,5,3,18,2000),(53,12,7,3,62,6000),(54,12,8,3,112,12000),(55,12,9,3,163,16000),(56,12,10,3,233,23000),(57,12,11,3,310,30000),(58,12,7,5,48,5000),(59,12,8,5,98,9000),(60,12,9,5,149,15000),(61,12,10,5,219,22000),(62,12,11,5,296,28000),(63,12,8,7,50,5000),(64,12,9,7,101,10000),(65,12,10,7,171,17000),(66,12,11,7,248,24000),(67,12,9,8,51,5500),(68,12,10,8,121,12500),(69,12,11,8,192,18000),(70,12,10,9,70,3000),(71,12,11,9,147,15000),(72,12,11,10,77,7500),(73,14,3,5,10,5000),(74,14,3,7,42,11500),(75,14,3,8,75,22000),(76,14,3,9,110,30000),(77,14,3,10,160,38000),(78,14,3,11,237,50000),(79,14,5,7,32,10000),(80,14,5,8,65,20000),(81,14,5,9,100,29000),(82,14,5,10,150,35000),(83,14,5,11,202,40000),(84,14,7,8,33,10000),(85,14,7,9,38,11000),(86,14,7,10,88,24000),(87,14,7,11,140,34000),(88,14,8,9,35,10500),(89,14,8,10,85,24000),(90,14,8,11,137,34000),(91,14,9,10,50,14000),(92,14,9,11,102,30000),(93,14,10,11,52,18000),(94,14,5,3,10,5000),(95,14,7,3,42,11500),(96,14,8,3,75,22000),(97,14,9,3,110,30000),(98,14,10,3,160,38000),(99,14,11,3,237,50000),(100,14,7,5,32,10000),(101,14,8,5,65,20000),(102,14,9,5,100,29000),(103,14,10,5,150,35000),(104,14,11,5,202,40000),(105,14,8,7,33,10000),(106,14,9,7,38,11000),(107,14,10,7,88,24000),(108,14,11,7,140,34000),(109,14,9,8,35,10500),(110,14,10,8,85,24000),(111,14,11,8,137,34000),(112,14,10,9,50,14000),(113,14,11,9,102,30000),(114,14,11,10,52,18000);
/*!40000 ALTER TABLE `trayecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nick` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `admin` int(1) NOT NULL,
  `dni_usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`dni_usuario`),
  CONSTRAINT `dni` FOREIGN KEY (`dni_usuario`) REFERENCES `persona` (`dni_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('admin','81dc9bdb52d04dc20036dbd8313ed055',1,11111111),('anamolina','81dc9bdb52d04dc20036dbd8313ed055',0,31008831),('levingston','81dc9bdb52d04dc20036dbd8313ed055',0,32547698);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vuelo`
--

DROP TABLE IF EXISTS `vuelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vuelo` (
  `id_vuelo` int(11) NOT NULL AUTO_INCREMENT,
  `equipo_vuelo` int(11) NOT NULL,
  `tipo_viaje_vuelo` int(11) NOT NULL,
  `hora_partida` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_vuelo`),
  KEY `tipo_viaje_vuelo` (`tipo_viaje_vuelo`),
  KEY `equipo_vuelo` (`equipo_vuelo`),
  CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`tipo_viaje_vuelo`) REFERENCES `tipo_viaje` (`id_tipo_viaje`),
  CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`equipo_vuelo`) REFERENCES `equipo` (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelo`
--

LOCK TABLES `vuelo` WRITE;
/*!40000 ALTER TABLE `vuelo` DISABLE KEYS */;
INSERT INTO `vuelo` VALUES (1,1,1,12,'2019-11-04'),(2,2,1,15,'2019-11-04'),(3,3,1,17,'2019-11-04'),(4,4,1,12,'2019-11-04'),(5,5,1,18,'2019-11-04'),(6,42,2,12,'2019-10-27'),(7,43,2,22,'2020-01-03'),(8,10,3,8,'2019-11-04'),(9,10,3,8,'2019-11-07'),(10,27,3,9,'2019-11-05'),(11,27,3,14,'2019-11-07'),(12,15,3,8,'2019-11-06'),(13,15,3,8,'2019-11-09'),(14,32,3,20,'2019-11-11'),(15,32,3,22,'2019-11-13');
/*!40000 ALTER TABLE `vuelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'gauchorocket'
--

--
-- Dumping routines for database 'gauchorocket'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-13 16:55:15