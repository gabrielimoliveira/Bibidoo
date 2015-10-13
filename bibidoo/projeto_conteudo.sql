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
-- Table structure for table `conteudo`
--

DROP TABLE IF EXISTS `conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conteudo` (
  `idConteudo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `descricao` varchar(400) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `idDisciplina` int(11) NOT NULL,
  PRIMARY KEY (`idConteudo`),
  KEY `fk_Conteudo_Categoria1_idx` (`idDisciplina`),
  CONSTRAINT `fk_Conteudo_Categoria1` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conteudo`
--

LOCK TABLES `conteudo` WRITE;
/*!40000 ALTER TABLE `conteudo` DISABLE KEYS */;
INSERT INTO `conteudo` VALUES (1,'Tema Livre','entradaTEMALIVRE.bmp','Aqui você pode soltar sua imaginação e produzir sua história da forma que desejar. Se você deseja produzir sua história, clique em iniciar.','2° ao 5° ano',1),(2,'Estações do Ano','entradaESTACOESDOANO.png','Chamamos de estação do ano cada uma das quatro subdivisões do ano baseadas em padrões climáticos. Que são elas: verão, outono, primavera e inverno. As estações do ano ocorrem devido à inclinação da terra em relação ao sol. Se você deseja produzir sua história com as estações, clique em iniciar.','2° ano',3),(3,'Meios de Transporte','entradaMEIOSDETRANSPORTE.png','O transporte pode ser realizado por meio de corpos d’água, terrestre e aéreo. Aqui você vai encontrar todos eles. Se você deseja produzir sua história, clique em iniciar.','2° ano',3),(4,'Zona Rural e Zona Urbana','entradaZONARURALURBANA.png','Zona rural é o espaço compreendido no campo e a Zona urbana é o espaço ocupado por uma cidade. Aqui você vai encontrar os transportes, cenários e animais das zonas. Se você deseja produzir sua história, clique em iniciar.','4° ano',3),(5,'Brasil','entradaBRASIL.png','O Brasil é composto por várias regiões e todos elas possuem sua própria cultura. Aqui você vai encontrar alguma das comemorações das regiões do Norte, Nordeste, Sudeste e Sul. Se você deseja produzir sua história, clique em iniciar.','5° ano',3),(6,'Animais','entradaANIMAIS.png','Assim como tudo que existe no mundo, os animais são importantíssimos para os seres humanos e toda a cadeia que nos compõem. Se você deseja produzir sua história com as espécies dos animais, clique em iniciar.','3° ano',2),(7,'Vida das Plantas','entradaVIDADASPLANTAS.png','As plantas tem grandes funções em nossas vidas, sendo a principal delas a sustentação da vida na Terra. São elas que, juntamente com as algas, produzem o oxigênio necessário à respiração dos seres vivos. Se você deseja produzir sua história com as espécies das plantas, clique em iniciar.','3° ano',2),(8,'Corpo Humano','entradaCORPO.png','Aqui você poderá montar o corpo humano, com livres escolhas. Se você deseja produzir sua história, clique em iniciar.','5° ano',2),(9,'Clima','entradaCLIMA.png','O clima é o estudo médio do tempo para o determinado período ou mês em uma certa localidade, abrangendo maior número de dados e eventos possíveis das condições de tempo. Se você deseja produzir sua história com os climas, clique em iniciar.','5° ano',2),(10,'Datas Comemorativas','entradadaDATASCOMEMORATIVAS.png','As datas comemorativas são de grande importância na nossa sociedade, onde cada data é celebrado diferentes significados. Aqui você vai encontrar: aniversário e dias das crianças. Se você deseja produzir sua história com essas datas, clique em iniciar.','2° ano',4);
/*!40000 ALTER TABLE `conteudo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-13 14:05:04
