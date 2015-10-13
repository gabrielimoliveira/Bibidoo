-- MySQL dump 10.13  Distrib 5.6.23, for Win32 (x86)
--
-- Host: localhost    Database: projeto
-- ------------------------------------------------------
-- Server version	5.6.24-log

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
-- Table structure for table `paginasimagens`
--

DROP TABLE IF EXISTS `paginasimagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paginasimagens` (
  `idPaginasImagens` int(11) NOT NULL AUTO_INCREMENT,
  `idPaginas` int(11) NOT NULL,
  `idImagens` int(11) NOT NULL,
  `posicaox` varchar(45) DEFAULT NULL,
  `posicaoy` varchar(45) DEFAULT NULL,
  `texto` longtext,
  `posicaotexto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPaginasImagens`),
  KEY `fk_Paginas_has_Imagens_Imagens1_idx` (`idImagens`),
  KEY `fk_Paginas_has_Imagens_Paginas1_idx` (`idPaginas`),
  CONSTRAINT `fk_Paginas_has_Imagens_Imagens1` FOREIGN KEY (`idImagens`) REFERENCES `imagens` (`idImagens`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Paginas_has_Imagens_Paginas1` FOREIGN KEY (`idPaginas`) REFERENCES `paginas` (`idPaginas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginasimagens`
--

LOCK TABLES `paginasimagens` WRITE;
/*!40000 ALTER TABLE `paginasimagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `paginasimagens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-13 14:05:18
