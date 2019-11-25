CREATE DATABASE  IF NOT EXISTS `gauchoRocket` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gauchoRocket`;
-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: localhost    Database: gauchoRocket
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
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
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asientos_ocupados` (
  `fila` int(11) NOT NULL,
  `asiento` int(11) NOT NULL,
  `id_vuelo` int(11) NOT NULL,
  `tipo_cabina` varchar(1) NOT NULL,
  `cod_reserva` varchar(10) NOT NULL,
  PRIMARY KEY (`fila`,`asiento`,`id_vuelo`,`tipo_cabina`,`cod_reserva`),
  KEY `id_vuelo` (`id_vuelo`),
  KEY `reser_idx` (`cod_reserva`),
  CONSTRAINT `asientos_ocupados_ibfk_2` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id_vuelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asientos_ocupados`
--

LOCK TABLES `asientos_ocupados` WRITE;
/*!40000 ALTER TABLE `asientos_ocupados` DISABLE KEYS */;
INSERT INTO `asientos_ocupados` VALUES (0,1,1,'F','FDNo8Kwr'),(0,2,1,'F','FDNo8Kwr'),(0,3,1,'F','FDNo8Kwr'),(1,1,1,'F','FDNo8Kwr'),(2,1,1,'F','jYufUK27'),(0,0,2,'S','al6Wx48i'),(0,2,2,'G','LAcjZFfH'),(0,2,2,'S','Z7hLqweW'),(0,3,2,'G','LAcjZFfH'),(0,4,2,'G','LAcjZFfH'),(0,4,2,'S','mC6qlhOp'),(0,5,2,'G','LAcjZFfH'),(0,7,2,'G','LAcjZFfH'),(0,8,2,'G','LAcjZFfH'),(0,9,2,'G','LAcjZFfH'),(1,8,2,'G','LAcjZFfH'),(1,9,2,'G','LAcjZFfH'),(0,0,3,'S','T3ChwS9F'),(1,0,3,'S','YJqaWdsD'),(1,2,3,'S','bdQjuYn1'),(1,3,3,'S','bdQjuYn1'),(0,0,5,'S','rzhLqJDl'),(0,1,5,'S','rzhLqJDl'),(0,0,8,'S','ZXtabjhp'),(0,1,8,'S','ZXtabjhp'),(0,2,8,'S','ZXtabjhp'),(0,3,8,'S','ZXtabjhp'),(0,4,8,'S','ZXtabjhp'),(0,5,8,'F','E9DiQNHf'),(0,5,8,'S','ZXtabjhp'),(0,6,8,'S','ZXtabjhp'),(0,7,8,'F','E9DiQNHf'),(0,7,8,'S','Mi7w18pQ'),(0,8,8,'S','Mi7w18pQ'),(0,9,8,'S','Mi7w18pQ'),(2,5,8,'F','gjdkIh2U'),(2,6,8,'F','gjdkIh2U'),(0,3,10,'S','wIqzX68r');
/*!40000 ALTER TABLE `asientos_ocupados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cabina`
--

DROP TABLE IF EXISTS `cabina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
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
INSERT INTO `centro_medico` VALUES (1,'Centro Medico Buenos Aires','Av Rivadavia 11506',273),(2,'Centro Medico Shanghai','Boedo 1150',210),(3,'Centro Medico Ankara','Marcos Paz 569',198);
/*!40000 ALTER TABLE `centro_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `confirmacion`
--

DROP TABLE IF EXISTS `confirmacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_destino`)
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
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
CREATE TABLE `persona` (
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `dni_persona` bigint(20) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `tipo_pasajero` tinyint(4) DEFAULT '0',
  `mail` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`dni_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES ('admin','admin','0001-01-01',0,'gaucho rocket 0000',3,'admin@gauchorocket.com.ar'),('test','uno','2019-11-06',555555,'tester 123',2,'tester@mail.com'),('test','dos','2019-11-07',4444444,'tester 4333',3,'otrotester@mail.com'),('Pity','Martinez','2010-10-10',10101010,'La concha de tu vieja',1,'pity@gmail.com'),('Primer','Pasajero','2000-11-01',11111111,'Casilla 4',2,'fliaPasajero@familiar.com'),('Sebastian','Basconcelo','2018-11-30',11122333,'La Tirica 1190',1,'asdasd@gmail.com'),('Nicolas','Admin','1996-10-21',11222333,'moronmoron 14',0,'admintest@test.com'),('Pity','Labruna','2019-12-31',11223342,'Monumental',2,'111@111'),('caca','Labruna','2019-12-31',11223349,'Rara22',1,'cdcd@dede.com'),('Gabi','Gabigol','2002-12-31',11998877,'Flamengo Campeao',2,'fla@gmail.com'),('primer','pasajero','2000-11-15',12344321,'falsa 123',1,'testing@test.bb'),('Nico','Del Canio','1990-01-31',12345678,'Izq 1111',0,'nico@gmail.com'),('Roman','Riquelme','2000-12-31',13579753,'Bombonera',0,'rr@gmail.com'),('Pablo','Aimar','1978-01-10',14598237,'Payaso 123',2,'payaso@gmail.com'),('asdfas','fdasfd','2019-11-29',14789655,'asdf 156',3,'tuvi@ieja.com'),('Segundo','Pasajero','2000-11-01',22222222,'Casilla 4',1,'fliaPasajero@familiar.com'),('Angel','Labruna','2007-11-30',22334455,'Monumental',1,'cac@c.c'),('el colado','que quiere sumarse','2000-11-30',22777999,'rere 22 ',3,'rere@elloco.com'),('Nacho ','Fernandez','2019-11-23',22998866,'Lima 10',3,'nacho@gmail.com'),('Manuela','Castaneira','1999-12-31',23456789,'Izq 1111',0,'manu@gmail.com'),('Horacio','Larreta','2003-12-31',23890100,'El pela 123',2,'pela@gmail.com'),('Juan ','Quintero','2018-12-09',24680864,'Madrid 31',2,'jfq@gmail.com'),('asdasdasdasd','Basconcelo','2019-12-31',27592555,'La Rioja 1990',1,'asdasd@gmail.com'),('Sebastian','Basconcelo','1979-08-16',27592556,'La Tirica 1190',2,'el_basco@hotmail.com'),('Ana','Molina','1981-05-31',31008831,'Guaycuru 1253',3,'jm@gmail.com'),('Carlos','Fernandez','1998-12-31',31008832,'Guaycuru 1253',2,'jm2@gmail.com'),('Cesar','Segovia','1999-10-29',31008833,'Guaycuru 1253',3,'jm3@gmail.com'),('Fabiola','Fernandez','1989-01-31',31008834,'Guaycuru 1253',3,'jm4@gmail.com'),('Fernanda','Segovia','1997-11-11',31008836,'Guaycuru 1253',1,'jm5@gmail.com'),('Sebastian','Saul','2019-12-31',31008839,'cdcdc',2,'111@11'),('Samuel','Levingston','1990-11-11',32547698,'Laselva 1234',0,'levingston@gmail.com'),('Matias','Rossi','1999-12-31',33224433,'La motonera',1,'rossi@gmail.com'),('Tercer','Pasajero','2000-11-01',33333333,'Casilla 4',2,'fliaPasajero@familiar.com'),('Manuel','Lanzini','1989-01-01',39156026,'La boca muerta 123',3,'lanza@gmail.com'),('Nico','Carrere','1996-10-21',39879432,'Varela 222',2,'nico_carrere96@hotmail.com'),('Lucas','Roque','2000-11-28',39888787,'La roche 222',1,'test@uncolado.com'),('Lucho','Javito','2001-06-30',41809999,'La U 44',2,'luchoj@gmail.com'),('Marcelo','Delgado','1997-12-31',43241211,'Lacitronella 34',1,'chelo@gmail.com'),('Manuel','Santos','1997-05-24',43564789,'Colombia 1111',3,'santos@gmail.com'),('el ','cheto','1980-03-22',44444444,'chetolandia 123',0,'algun@email.com'),('Laura','Lacome','2006-10-30',45544554,'Lopez123',1,'lacome@gmail.om'),('Ambar','Josefina','2011-07-09',51267565,'La Escuela no va',3,'ambar@gmail.com'),('Llenando','La suite','1900-11-22',55666888,'test 123',1,'nono@asd.a'),('Sebastian','Labruna','2019-12-31',65432109,'La Tirica 1190',2,'el_basco@hotmail.com'),('Nico','nico','2000-11-09',66666666,'lala 123',0,'eldeltrabajo@work.com'),('Sebastian','Gomez','1990-12-31',67452312,'Granaderos 1100',1,'gomito@gmail.com'),('Ale','Profe','2019-11-22',67564539,'La Rioja 1234',0,'profe@test.com'),('Nico','nar','1980-12-12',77777777,'lala 123',0,'eldeltrabajo@work.com'),('El otro','Que llena','1900-11-23',88777999,'test 123',3,'nono@asd.a'),('Otro','Nico','1990-12-13',88888888,'lala 123',0,'eldeltrabajo@work.com'),('Angel','Labruna','2007-01-23',98765431,'Monumental',0,'labru@g.com'),('Angel','Zara','2019-12-31',99998888,'Rara22',0,'rar@rar.com'),('Alguno ','de Por ahi','1970-12-14',99999999,'lala 123',0,'eldeltrabajo@work.com'),('asdc','asdc','2019-11-21',123412341,'asdc',0,'aasc@asdc.ds'),('Wanchope ','Abila','1996-12-31',225544667,'Montenegro 123',2,'wanchupen@gmail.com'),('sdcas','vsdcsa','2019-11-19',1234123412,'asasdca',0,'asca@acs.sdc'),('qwfsda','fqewfwqe','1994-12-20',2526362589,'asdfawe 213',0,'asdcas@sdyuvca.scu');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `reserva_vuelo` int(11) NOT NULL,
  `cod_reserva` varchar(10) NOT NULL,
  `dni_persona_reserva` bigint(20) NOT NULL,
  `tipo_cabina` varchar(1) NOT NULL,
  `tipo_servicio` varchar(15) DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0',
  `checkin` tinyint(1) NOT NULL DEFAULT '0',
  `lista_espera` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_reserva`),
  KEY `dni_persona_reserva` (`dni_persona_reserva`),
  KEY `vuelo_idx` (`reserva_vuelo`),
  KEY `tipoCabina_idx` (`tipo_cabina`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`dni_persona_reserva`) REFERENCES `persona` (`dni_persona`),
  CONSTRAINT `vuelo` FOREIGN KEY (`reserva_vuelo`) REFERENCES `vuelo` (`id_vuelo`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (47,1,'tRjG9Vfp',39879432,'S','gourmet',0,0,0),(48,2,'al6Wx48i',27592556,'S','gourmet',1,1,0),(50,2,'1ECmYHyf',22334455,'S','gourmet',1,1,0),(51,2,'Z7hLqweW',43564789,'S','spa',1,1,0),(52,2,'xivzSWLB',99998888,'S','standard',0,1,0),(53,3,'z7vxbZW6',99998888,'S','standard',0,0,0),(54,3,'bdQjuYn1',11122333,'S','gourmet',1,1,0),(55,3,'bdQjuYn1',33333333,'S','gourmet',1,1,0),(56,10,'wIqzX68r',24680864,'S','spa',1,1,0),(57,10,'AKerhOLI',10101010,'S','standard',0,0,0),(58,8,'lLpSct4o',10101010,'S','standard',0,0,0),(59,3,'n6daUCIV',31008839,'S','standard',0,0,0),(60,10,'m4KX2JWN',11223349,'S','standard',0,0,0),(61,5,'SnYsQxAv',51267565,'G','standard',0,0,0),(62,5,'SnYsQxAv',41809999,'G','standard',0,0,0),(63,2,'fJShkCMX',45544554,'S','standard',0,0,0),(64,3,'OP7fvSm0',11223342,'S','standard',0,0,0),(65,4,'fvZNXGhq',12344321,'S','standard',0,0,0),(66,3,'XaxCqJ9t',11122333,'S','standard',0,0,0),(67,8,'mGzuS6R4',65432109,'S','standard',0,0,0),(68,3,'Ak148EiI',27592555,'S','standard',0,0,0),(69,14,'qksyZLUv',23890100,'S','standard',0,0,0),(70,8,'E9DiQNHf',67452312,'F','gourmet',1,1,0),(71,2,'NAOYICg8',11998877,'S','standard',0,0,0),(72,8,'5LCze2xB',22998866,'S','standard',0,0,0),(73,8,'osJ0jeUF',39156026,'S','standard',0,0,0),(74,14,'wEiNazp3',14598237,'S','standard',0,0,0),(75,6,'yRhB1Sqx',225544667,'S','standard',0,0,0),(76,2,'ut9pGfvd',33224433,'S','standard',0,0,0),(77,2,'mC6qlhOp',43241211,'S','standard',1,1,0),(78,8,'gjdkIh2U',555555,'F','gourmet',1,1,0),(79,8,'gjdkIh2U',4444444,'F','gourmet',1,1,0);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_trayecto`
--

DROP TABLE IF EXISTS `reserva_trayecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reserva_trayecto` (
  `cod_reserva` varchar(11) NOT NULL,
  `id_trayecto` int(11) NOT NULL,
  PRIMARY KEY (`cod_reserva`,`id_trayecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_trayecto`
--

LOCK TABLES `reserva_trayecto` WRITE;
/*!40000 ALTER TABLE `reserva_trayecto` DISABLE KEYS */;
INSERT INTO `reserva_trayecto` VALUES ('1ECmYHyf',2),('5LCze2xB',8),('5LCze2xB',9),('5LCze2xB',10),('Ak148EiI',3),('AKerhOLI',19),('AKerhOLI',20),('AKerhOLI',21),('al6Wx48i',2),('bdQjuYn1',3),('E9DiQNHf',8),('fJShkCMX',2),('fvZNXGhq',4),('gjdkIh2U',8),('gjdkIh2U',9),('gjdkIh2U',10),('hc9NQktp',1),('lLpSct4o',8),('m4KX2JWN',19),('m4KX2JWN',20),('m4KX2JWN',21),('mC6qlhOp',2),('mGzuS6R4',8),('mGzuS6R4',9),('mGzuS6R4',10),('mJprKZ62',1),('n6daUCIV',3),('NAOYICg8',2),('OP7fvSm0',3),('osJ0jeUF',8),('Pti3vChX',1),('qksyZLUv',73),('qksyZLUv',74),('qksyZLUv',75),('qksyZLUv',76),('qksyZLUv',77),('qksyZLUv',78),('SnYsQxAv',5),('tRjG9Vfp',1),('ut9pGfvd',2),('vhQXcpSU',2),('WARTGjD8',2),('WDtbE1Bv',8),('WDtbE1Bv',9),('WDtbE1Bv',10),('wEiNazp3',73),('wEiNazp3',74),('wEiNazp3',75),('wEiNazp3',76),('wEiNazp3',77),('wEiNazp3',78),('wIqzX68r',19),('wIqzX68r',20),('wIqzX68r',21),('XaxCqJ9t',3),('xivzSWLB',2),('yRhB1Sqx',6),('Z7hLqweW',2),('z7vxbZW6',3);
/*!40000 ALTER TABLE `reserva_trayecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_equipo`
--

DROP TABLE IF EXISTS `tipo_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
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
INSERT INTO `trayecto` VALUES (1,1,1,1,8,800),(2,2,2,2,8,800),(3,3,1,1,8,800),(4,4,2,2,8,800),(5,5,1,1,840,15000),(6,6,1,1,840,15000),(7,7,1,1,840,15000),(8,8,3,4,17,1000),(9,8,4,5,43,2500),(10,8,5,6,16,900),(19,10,3,4,1,200),(20,10,4,5,10,2000),(21,10,5,6,32,5000),(31,12,3,5,14,2000),(32,12,5,7,62,6000),(33,12,7,8,112,12000),(34,12,8,9,163,16000),(35,12,9,10,233,23000),(36,12,10,11,310,30000),(73,14,3,5,10,5000),(74,14,5,7,42,11500),(75,14,7,8,75,22000),(76,14,8,9,110,30000),(77,14,9,10,160,38000),(78,14,10,11,237,50000),(79,16,1,1,840,18000);
/*!40000 ALTER TABLE `trayecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `nick` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `dni_usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`dni_usuario`),
  CONSTRAINT `dni` FOREIGN KEY (`dni_usuario`) REFERENCES `persona` (`dni_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('pity','81dc9bdb52d04dc20036dbd8313ed055',0,10101010),('roman','b59c67bf196a4758191e42f76670ceba',0,13579753),('jfq','81dc9bdb52d04dc20036dbd8313ed055',0,24680864),('anamolina','81dc9bdb52d04dc20036dbd8313ed055',0,31008831),('levingston','81dc9bdb52d04dc20036dbd8313ed055',0,32547698),('eladmin','81dc9bdb52d04dc20036dbd8313ed055',0,39879432),('elprofe','81dc9bdb52d04dc20036dbd8313ed055',0,67564539),('admin','81dc9bdb52d04dc20036dbd8313ed055',1,99999999);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vuelo`
--

DROP TABLE IF EXISTS `vuelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelo`
--

LOCK TABLES `vuelo` WRITE;
/*!40000 ALTER TABLE `vuelo` DISABLE KEYS */;
INSERT INTO `vuelo` VALUES (1,1,1,12,'2019-11-04'),(2,2,1,15,'2019-11-04'),(3,3,1,17,'2019-11-04'),(4,4,1,12,'2019-11-04'),(5,5,1,13,'2019-11-15'),(6,42,2,12,'2019-11-27'),(7,42,2,22,'2020-01-01'),(8,10,3,8,'2019-11-04'),(9,10,3,8,'2019-11-07'),(10,27,3,9,'2019-11-20'),(11,27,3,14,'2019-11-07'),(12,15,3,8,'2019-11-06'),(13,15,3,8,'2019-11-09'),(14,32,3,20,'2019-11-11'),(15,32,3,22,'2019-11-13'),(16,43,2,14,'2020-02-05');
/*!40000 ALTER TABLE `vuelo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-25 20:17:58
