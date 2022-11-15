-- MariaDB dump 10.19  Distrib 10.9.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: alfatecnica2
-- ------------------------------------------------------
-- Server version	10.9.4-MariaDB

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
  `planimetry_image_width` int(11) DEFAULT NULL,
  `planimetry_image_height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Companies`
--

LOCK TABLES `Companies` WRITE;
/*!40000 ALTER TABLE `Companies` DISABLE KEYS */;
INSERT INTO `Companies` VALUES
(1,'Dallara','Varano de Melegari','img/loghi/azienda1.png','Via Provinciale, 33',43040,'Varano de Melegari','PR','3408871542','dallarastradale@dallara.auto','','0521887265','6528716254','','','','img/planimetrie/download.png',532,392),
(2,'Bercella','Varano de Melegari','img/loghi/azienda2.png','Via Enzo Ferrari, 10',43040,'Varano de Melegari','PR','3338765298','bercella@bercella.it','','0521829983','9992837625','','','','img/planimetrie/checojon-scaled.png',532,392),
(3,'NonSoloTabacchi','Ozzano Taro','img/loghi/azienda3.png','Via Nazionale, 64',43044,'Ozzano Taro','PR','3762983625','nonsolotabacchi@gmail.com',NULL,'0521765287','7725276534','tabaccheriaozzano_64@nonsolotabacchi.it',NULL,NULL,'img/planimetrie/planimetrie-case.png',532,392),
(6,'Pluto','Pluto','img/loghi/azienda1.png','Pluto',1337,'Pluto','Pluto','Pluto','Pluto','Pluto','Pluto','Pluto','Pluto','Cassitto non è capace','Scartazza è un apple fan',NULL,NULL,NULL),
(21,'Test','tbest','img/loghi/azienda1.png','ste',65465,'sads','asdf','asdf','asd','asdf','asdf','asdf','asdf','dsaf','sadf',NULL,NULL,NULL),
(22,'ABC','asd','img/loghi/azienda1.png','asd',654654,'asd','asdfasdf','fasdfas','fa','adsfsd','sadfsad','asdfsad','sda','asdfa','sadfasd',NULL,NULL,NULL),
(23,'Per testare immagini','awdfds','img/loghi/azienda1.png','fasdfasda',698,'sdfasd','aa','asdkjfhlaks','adlkfsjaskdjf','asdfjasdjfl','aldskjflkasdf','dfjhasdkjfsa','sldkjflkasdjf','asdlkfjlkasdjf','sdlfkjalskdjf',NULL,NULL,NULL),
(24,'Per testare le immagini parte 2','dafljsdklf','img/loghi/azienda1.png','alskflksdajf',465,'dslkfjasdl','alksdflka','asldfkjlask','asdlfkjaskldf','dfakljsdlkf','asdlkfjlask','asdlkfjlkasd','dslakfjsdlkf','asdlkfalskdf','afsdkljflajsd',NULL,NULL,NULL),
(25,'Ultima Prova','Afghanistan','img/loghi/azienda1.png','Via dei Talebani, 2',1234,'Kabul','Kabul','NO','osama@binladen.com','Osama Bin Laden','NO','NO','osamabinladen@gmail.com','Terroristi','Attento alla dinamite',NULL,NULL,NULL),
(26,'LLLL','asdfas','img/loghi/LLLL-MicrosoftTeams-image4.jpg','asdfasd',64,'asdfas','asdf','asdfa','asdf','adfa','asdf','sdf','asdf','asdf','asdf',NULL,NULL,NULL),
(27,'PLZ','aflksd','img/loghi/PLZ-MicrosoftTeams-image4.jpg','asdlkfj',6546,'asldkfj','alskdjflksadjf','asdlkfjlaskd','asdlkjlksadjf','sdalkfjalkd','alkwdjflaksd','asdkfjlksdaf','asdlkfjlaskdf','asdlkfjskldaf','falksdlkfjad',NULL,NULL,NULL),
(28,'BNBBN','adfjlaskdfj','img/loghi/BNBBN-MicrosoftTeams-image.jpg','oqiurwohf',54,'asdkfja','asdkjfh','kjadfkjsd','adsfasdkjf','KLHFkjdshfk','lksadjflskdj','sdkjfhajkdf','dsalfsdlkfjsadlkjflasdkfjl','lkasdjfklasdf','lkasdfjlkasdjfl',NULL,NULL,NULL);
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
  PRIMARY KEY (`sold_product_id`),
  KEY `Form_Data_Form_Fields_field_id_fk` (`field_id`),
  CONSTRAINT `Form_Data_Form_Fields_field_id_fk` FOREIGN KEY (`field_id`) REFERENCES `Form_Fields` (`field_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  PRIMARY KEY (`field_id`),
  KEY `Form_Fields_Form_Sections_section_id_fk` (`section_id`),
  KEY `Form_Fields_Product_Category_product_category_id_fk` (`product_category_id`),
  CONSTRAINT `Form_Fields_Form_Sections_section_id_fk` FOREIGN KEY (`section_id`) REFERENCES `Form_Sections` (`section_id`) ON UPDATE CASCADE,
  CONSTRAINT `Form_Fields_Product_Category_product_category_id_fk` FOREIGN KEY (`product_category_id`) REFERENCES `Product_Category` (`product_category_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Category`
--

LOCK TABLES `Product_Category` WRITE;
/*!40000 ALTER TABLE `Product_Category` DISABLE KEYS */;
INSERT INTO `Product_Category` VALUES
(1,'Estintore',NULL,'img/prodotti/estintore.png'),
(2,'Idrante',NULL,'img/prodotti/idrante.png'),
(3,'Testing',NULL,NULL);
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
  `value` varchar(100) DEFAULT NULL,
  KEY `Product_Data_Product_Fields_field_id_fk` (`field_id`),
  KEY `Product_Data_Sold_Products_sold_product_id_fk` (`sold_product_id`),
  CONSTRAINT `Product_Data_Product_Fields_field_id_fk` FOREIGN KEY (`field_id`) REFERENCES `Product_Fields` (`field_id`) ON UPDATE CASCADE,
  CONSTRAINT `Product_Data_Sold_Products_sold_product_id_fk` FOREIGN KEY (`sold_product_id`) REFERENCES `Sold_Products` (`sold_product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Data`
--

LOCK TABLES `Product_Data` WRITE;
/*!40000 ALTER TABLE `Product_Data` DISABLE KEYS */;
INSERT INTO `Product_Data` VALUES
(9,12,'1'),
(9,13,'2'),
(9,14,'3'),
(9,15,'4'),
(9,16,'CIAO'),
(9,17,'6'),
(9,18,'7'),
(9,19,'HELLO'),
(54,12,'yuiyui'),
(54,13,'yuiyuiyu'),
(54,14,'iyuiyu'),
(54,15,'iyuiyu'),
(54,16,'iyuiyu'),
(54,17,'iyuiuy'),
(54,18,'iyuiuy'),
(54,19,'iyui'),
(84,1,'uiyui'),
(84,2,'uyiyui'),
(84,3,'uyiyui'),
(84,4,'uyiyu'),
(84,5,'iuyiy'),
(84,6,'iyuiy'),
(84,7,'iyui'),
(84,8,'uiyuiuy'),
(84,9,'iyuiui'),
(84,10,'uyiyuiuy'),
(86,1,'fhgfh'),
(86,2,'fghgfh'),
(86,3,'gfhfgh'),
(86,4,'fghgfh'),
(86,5,'gfhghgf'),
(86,6,'hfghfg'),
(86,7,'hfghgf'),
(86,8,'hfhgfhfg'),
(86,9,'hgfhfg'),
(86,10,'hgfhfghfg'),
(87,12,'dfgh'),
(87,13,'dfgh'),
(87,14,'fghfg'),
(87,15,'hfg'),
(87,16,'hh'),
(87,17,'dfh'),
(87,18,'dfhh'),
(87,19,'dfh');
/*!40000 ALTER TABLE `Product_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Fields`
--

DROP TABLE IF EXISTS `Product_Fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Fields` (
  `field_id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Fields`
--

LOCK TABLES `Product_Fields` WRITE;
/*!40000 ALTER TABLE `Product_Fields` DISABLE KEYS */;
INSERT INTO `Product_Fields` VALUES
(1,1,'Numero aziendale'),
(2,1,'Tipo estintore (Kg)'),
(3,1,'Costruzione '),
(4,1,'Anno'),
(5,1,'Matricola'),
(6,1,'Capacità estinguente'),
(7,1,'Dislocazione'),
(8,1,'Revisione'),
(9,1,'Ricollaudo'),
(10,1,'Tipo manutenzione'),
(12,2,'Numero aziendale'),
(13,2,'Diam. Ug. Lancia (mm)'),
(14,2,'Pressione statica (bar)'),
(15,2,'Pressione dinamica (bar)'),
(16,2,'Collaudo'),
(17,2,'Esercizio'),
(18,2,'Dislocazione'),
(19,2,'Tipo manutenzione'),
(21,3,'TestingField1'),
(22,3,'TestingField2');
/*!40000 ALTER TABLE `Product_Fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Revisions`
--

DROP TABLE IF EXISTS `Revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Revisions` (
  `product_category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`product_category_id`,`company_id`,`data`),
  KEY `Revisions_Companies` (`company_id`),
  CONSTRAINT `Revisions_Companies` FOREIGN KEY (`company_id`) REFERENCES `Companies` (`id`),
  CONSTRAINT `Revisions_ProductCategory` FOREIGN KEY (`product_category_id`) REFERENCES `Product_Category` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Revisions`
--

LOCK TABLES `Revisions` WRITE;
/*!40000 ALTER TABLE `Revisions` DISABLE KEYS */;
INSERT INTO `Revisions` VALUES
(1,1,'2022-11-08 00:00:00'),
(1,1,'2022-11-17 18:48:00'),
(1,2,'2022-10-08 00:00:00'),
(2,1,'2022-11-24 11:11:00'),
(2,2,'2022-10-07 00:00:00'),
(2,2,'2022-10-26 00:00:00'),
(3,2,'2022-10-15 00:00:00');
/*!40000 ALTER TABLE `Revisions` ENABLE KEYS */;
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
  PRIMARY KEY (`sold_product_id`),
  KEY `Sold_Products_Product_Category_product_category_id_fk` (`product_category_id`),
  KEY `Sold_Products_Companies_id_fk` (`company_id`),
  CONSTRAINT `Sold_Products_Companies_id_fk` FOREIGN KEY (`company_id`) REFERENCES `Companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Sold_Products_Product_Category_product_category_id_fk` FOREIGN KEY (`product_category_id`) REFERENCES `Product_Category` (`product_category_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sold_Products`
--

LOCK TABLES `Sold_Products` WRITE;
/*!40000 ALTER TABLE `Sold_Products` DISABLE KEYS */;
INSERT INTO `Sold_Products` VALUES
(9,2,2,180,300),
(33,2,3,324,234),
(54,2,2,202,202),
(84,1,1,351,108),
(86,1,1,184,253),
(87,1,2,285,199);
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
  PRIMARY KEY (`user_id`,`company_id`),
  KEY `User_Company_Companies_id_fk` (`company_id`),
  CONSTRAINT `User_Company_Companies_id_fk` FOREIGN KEY (`company_id`) REFERENCES `Companies` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `User_Company_Users_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hashed_password` varchar(128) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES
(1,'onnwen.cassitto@icloud.com','a33356e9f35ec519b88dbbcf23147f0b','onnwen','cassitto',1),
(2,'test@gmail.com','a33356e9f35ec519b88dbbcf23147f0b','Pippo','Pluto',1);
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

-- Dump completed on 2022-11-15 18:34:33
