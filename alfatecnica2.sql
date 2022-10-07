-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: alfatecnica2
-- ------------------------------------------------------
-- Server version	10.9.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Companies`
--

DROP TABLE IF EXISTS `Companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `path_logo` varchar(40) NOT NULL,
  `address` varchar(150) NOT NULL,
  `CAP` int(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `phoneNumber1` varchar(20) DEFAULT NULL,
  `emailAddress1` varchar(50) DEFAULT NULL,
  `personalReference` text DEFAULT NULL,
  `phoneNumber2` varchar(20) DEFAULT NULL,
  `cellPhoneNumber` varchar(20) DEFAULT NULL,
  `emailAddress2` varchar(50) DEFAULT NULL,
  `companyNotes` text DEFAULT NULL,
  `clientNotes` text DEFAULT NULL,
  `planimetry_image_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Companies`
--

LOCK TABLES `Companies` WRITE;
/*!40000 ALTER TABLE `Companies` DISABLE KEYS */;
INSERT INTO `Companies` VALUES
(1,'Dallara','Varano de Melegari','img/loghi/azienda1.png','Via Provinciale, 33',43040,'Varano de Melegari','PR','3408871542','dallarastradale@dallara.auto',NULL,'0521887265','6528716254',NULL,NULL,NULL,NULL),
(2,'Bercella','Varano de Melegari','img/loghi/azienda2.png','Via Enzo Ferrari, 10',43040,'Varano de Melegari','PR','3338765298','bercella@bercella.it',NULL,'0521829983','9992837625',NULL,NULL,NULL,NULL),
(3,'NonSoloTabacchi','Ozzano Taro','img/loghi/azienda3.png','Via Nazionale, 64',43044,'Ozzano Taro','PR','3762983625','nonsolotabacchi@gmail.com',NULL,'0521765287','7725276534','tabaccheriaozzano_64@nonsolotabacchi.it',NULL,NULL,NULL);
/*!40000 ALTER TABLE `Companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Form_Data`
--

DROP TABLE IF EXISTS `Form_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Form_Data` (
  `sold_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) DEFAULT NULL,
  `answer` tinyint(1) DEFAULT NULL,
  `comment` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`sold_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form_Data`
--

LOCK TABLES `Form_Data` WRITE;
/*!40000 ALTER TABLE `Form_Data` DISABLE KEYS */;
/*!40000 ALTER TABLE `Form_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Form_Fields`
--

DROP TABLE IF EXISTS `Form_Fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Form_Fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form_Fields`
--

LOCK TABLES `Form_Fields` WRITE;
/*!40000 ALTER TABLE `Form_Fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `Form_Fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Form_Sections`
--

DROP TABLE IF EXISTS `Form_Sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Form_Sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form_Sections`
--

LOCK TABLES `Form_Sections` WRITE;
/*!40000 ALTER TABLE `Form_Sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `Form_Sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Category`
--

DROP TABLE IF EXISTS `Product_Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `visualization_type` int(11) DEFAULT NULL,
  `icon_image_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Category`
--

LOCK TABLES `Product_Category` WRITE;
/*!40000 ALTER TABLE `Product_Category` DISABLE KEYS */;
INSERT INTO `Product_Category` VALUES
(1,'Estintore',NULL,NULL);
/*!40000 ALTER TABLE `Product_Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Data`
--

DROP TABLE IF EXISTS `Product_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Data` (
  `sold_product_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Data`
--

LOCK TABLES `Product_Data` WRITE;
/*!40000 ALTER TABLE `Product_Data` DISABLE KEYS */;
INSERT INTO `Product_Data` VALUES
(1,1,'5kg'),
(1,2,'Pompieri'),
(1,3,'Rosso'),
(2,1,'7,5kg'),
(2,2,'Alfatecnica'),
(2,3,'Blu'),
(3,1,'10kg'),
(3,2,'Pompieri'),
(3,3,'Arancione');
/*!40000 ALTER TABLE `Product_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Fields`
--

DROP TABLE IF EXISTS `Product_Fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Fields`
--

LOCK TABLES `Product_Fields` WRITE;
/*!40000 ALTER TABLE `Product_Fields` DISABLE KEYS */;
INSERT INTO `Product_Fields` VALUES
(1,1,'Peso'),
(2,2,'Marchio'),
(3,3,'Colore');
/*!40000 ALTER TABLE `Product_Fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sold_Products`
--

DROP TABLE IF EXISTS `Sold_Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sold_Products` (
  `sold_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  PRIMARY KEY (`sold_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sold_Products`
--

LOCK TABLES `Sold_Products` WRITE;
/*!40000 ALTER TABLE `Sold_Products` DISABLE KEYS */;
INSERT INTO `Sold_Products` VALUES
(1,1,1,0,0),
(2,1,1,5,5),
(3,2,1,3,3);
/*!40000 ALTER TABLE `Sold_Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_Company`
--

DROP TABLE IF EXISTS `User_Company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Company` (
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Company`
--

LOCK TABLES `User_Company` WRITE;
/*!40000 ALTER TABLE `User_Company` DISABLE KEYS */;
/*!40000 ALTER TABLE `User_Company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb3 DEFAULT NULL,
  `hashed_password` varchar(128) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES
(1,'onnwen.cassitto@icloud.com','ciaociao','onnwen','cassitto',1);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-07 18:40:23
