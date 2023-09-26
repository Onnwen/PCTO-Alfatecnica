-- MariaDB dump 10.19  Distrib 10.5.18-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: alfatecnica2
-- ------------------------------------------------------
-- Server version	10.5.18-MariaDB-0+deb11u1

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
  `path_logo` varchar(100) DEFAULT NULL,
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
  `unique_Code` varchar(6) NOT NULL COMMENT 'Si tratta di un codice che serve in fase di registrazione del personale in modo da preservare l''id dell''azieda e preservarne i dati. Ogni azienda una volta registrata avrà il suo codice e sarà compito dell''azienda fare in modo che questo venga usato correttamente.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Companies_unique_Code_uindex` (`unique_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Companies`
--

LOCK TABLES `Companies` WRITE;
/*!40000 ALTER TABLE `Companies` DISABLE KEYS */;
INSERT INTO `Companies` VALUES (1,'Dallara','Varano de Melegari','img/loghi/azienda1.png','Via Provinciale, 33',43040,'Varano de Melegari','PR','3408871542','dallarastradale@dallara.auto','','0521887265','6528716254','','','','img/planimetrie/download.png',532,392,'123456'),(2,'Bercella','Varano de Melegari','img/loghi/azienda2.png','Via Enzo Ferrari, 10',43040,'Varano de Melegari','PR','3338765298','bercella@bercella.it','','0521829983','9992837625','','','','img/planimetrie/checojon-scaled.png',532,392,'234567'),(3,'NonSoloTabacchi','Ozzano Taro','img/loghi/azienda3.png','Via Nazionale, 64',43044,'Ozzano Taro','PR','3762983625','nonsolotabacchi@gmail.com',NULL,'0521765287','7725276534','tabaccheriaozzano_64@nonsolotabacchi.it',NULL,NULL,'img/planimetrie/planimetrie-case.png',532,392,'345678'),(6,'Pluto','Pluto','img/loghi/azienda1.png','Pluto',1337,'Pluto','Pluto','Pluto','Pluto','Pluto','Pluto','Pluto','Pluto','Cassitto non è capace','Scartazza è un apple fan',NULL,NULL,NULL,'456789'),(21,'Test','tbest','img/loghi/azienda1.png','ste',65465,'sads','asdf','asdf','asd','asdf','asdf','asdf','asdf','dsaf','sadf',NULL,NULL,NULL,'111111'),(22,'ABC','asd','img/loghi/azienda1.png','asd',654654,'asd','asdfasdf','fasdfas','fa','adsfsd','sadfsad','asdfsad','sda','asdfa','sadfasd',NULL,NULL,NULL,'222222'),(23,'Per testare immagini','awdfds','img/loghi/azienda1.png','fasdfasda',698,'sdfasd','aa','asdkjfhlaks','adlkfsjaskdjf','asdfjasdjfl','aldskjflkasdf','dfjhasdkjfsa','sldkjflkasdjf','asdlkfjlkasdjf','sdlfkjalskdjf',NULL,NULL,NULL,'333333'),(24,'Per testare le immagini parte 2','dafljsdklf','img/loghi/azienda1.png','alskflksdajf',465,'dslkfjasdl','alksdflka','asldfkjlask','asdlfkjaskldf','dfakljsdlkf','asdlkfjlask','asdlkfjlkasd','dslakfjsdlkf','asdlkfalskdf','afsdkljflajsd',NULL,NULL,NULL,'444444'),(25,'Ultima Prova','Afghanistan','img/loghi/azienda1.png','Via dei Talebani, 2',1234,'Kabul','Kabul','NO','osama@binladen.com','Osama Bin Laden','NO','NO','osamabinladen@gmail.com','Terroristi','Attento alla dinamite',NULL,NULL,NULL,'555555'),(31,'asòàdljkflàaskj','asdfj','img/loghi/asòàdljkflàaskj','sduyiaasdy',23,'sdfyui','sdfs','asdfsdf','asdf','asdfsa','asdf','asdfasdf','sdaf','asdfasdfasdf','asdfasdfsdf','img/planimetrie/asòàdljkflàaskj',1500,2000,'999999'),(32,'LKSKLSJL','wdjkf','img/loghi/LKSKLSJL','asduiosdafasd',23423,'asdfasdf','asdfsdf','asdfasdf','asdfas','anfòkasuy','sdfhdf','asdiufi','wetg','sdalfjkweuio','aweuibn8v','img/planimetrie/LKSKLSJL',1500,2000,'000000'),(33,'Pifferaio Magico','Terra delle fiabe','img/loghi/Pifferaio Magico','Via Principale',5,'Villaggio con i topi','MA','','','','','','','','','img/planimetrie/Pifferaio Magico',1500,2000,'ZGXQNJ');
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
  CONSTRAINT `Form_Fields_Form_Sections_section_id_fk` FOREIGN KEY (`section_id`) REFERENCES `Form_Sections` (`section_id`) ON DELETE CASCADE,
  CONSTRAINT `Form_Fields_Product_Category_product_category_id_fk` FOREIGN KEY (`product_category_id`) REFERENCES `Product_Category` (`product_category_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form_Fields`
--

LOCK TABLES `Form_Fields` WRITE;
/*!40000 ALTER TABLE `Form_Fields` DISABLE KEYS */;
INSERT INTO `Form_Fields` VALUES (10,43,'FORM_TEST_1_SECTION_1_QUESTION_1',10),(11,43,'FORM_TEST_1_SECTION_1_QUESTION_2',10),(12,43,'FORM_TEST_1_SECTION_1_QUESTION_3',10),(13,43,'FORM_TEST_1_SECTION_1_QUESTION_4',10),(14,43,'FORM_TEST_1_SECTION_2_QUESTION_1',11),(15,43,'FORM_TEST_1_SECTION_2_QUESTION_2',11),(16,43,'FORM_TEST_1_SECTION_3_QUESTION_1',12),(17,43,'FORM_TEST_1_SECTION_3_QUESTION_2',12),(18,43,'FORM_TEST_1_SECTION_3_QUESTION_3',12),(22,45,'qweqwe',15),(23,45,'qwe',15),(24,45,'new',15),(25,45,'eww',16);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form_Sections`
--

LOCK TABLES `Form_Sections` WRITE;
/*!40000 ALTER TABLE `Form_Sections` DISABLE KEYS */;
INSERT INTO `Form_Sections` VALUES (10,'FORM_TEST_1_SECTION_1'),(11,'FORM_TEST_1_SECTION_2'),(12,'FORM_TEST_1_SECTION_3'),(13,'DELETE'),(14,'DELETE'),(15,'qwe'),(16,'qwe');
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
  `type` int(11) DEFAULT NULL,
  `icon_image_path` varchar(100) DEFAULT NULL,
  `revisionMonthDuration` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Category`
--

LOCK TABLES `Product_Category` WRITE;
/*!40000 ALTER TABLE `Product_Category` DISABLE KEYS */;
INSERT INTO `Product_Category` VALUES (1,'Estintore',0,'img/prodotti/estintore.png',6),(2,'Idrante',0,'img/prodotti/idrante.png',6),(3,'Testing',0,NULL,6),(31,'TEST_PRODUCT_2',0,'',6),(43,'FORM_TEST_1',1,'',NULL),(45,'q2ewqe',1,'',NULL),(46,'Dinamite',0,'',NULL),(52,'Banana',0,'img/prodotti/Banana',NULL);
/*!40000 ALTER TABLE `Product_Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Data`
--

DROP TABLE IF EXISTS `Product_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Data` (
  `sold_product_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  KEY `Product_Data_Product_Fields_field_id_fk` (`field_id`),
  KEY `Product_Data_Sold_Products_sold_product_id_fk` (`sold_product_id`),
  CONSTRAINT `Product_Data_Product_Fields_field_id_fk` FOREIGN KEY (`field_id`) REFERENCES `Product_Fields` (`field_id`),
  CONSTRAINT `Product_Data_Sold_Products_sold_product_id_fk` FOREIGN KEY (`sold_product_id`) REFERENCES `Sold_Products` (`sold_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Data`
--

LOCK TABLES `Product_Data` WRITE;
/*!40000 ALTER TABLE `Product_Data` DISABLE KEYS */;
INSERT INTO `Product_Data` VALUES (9,12,'1'),(9,13,'2'),(9,14,'3'),(9,15,'4'),(9,16,'CIAO'),(9,17,'6'),(9,18,'7'),(9,19,'HELLO'),(54,12,'yuiyui'),(54,13,'yuiyuiyu'),(54,14,'iyuiyu'),(54,15,'iyuiyu'),(54,16,'iyuiyu'),(54,17,'iyuiuy'),(54,18,'iyuiuy'),(54,19,'iyui'),(84,1,'uiyui'),(84,2,'uyiyui'),(84,3,'uyiyui'),(84,4,'uyiyu'),(84,5,'iuyiy'),(84,6,'iyuiy'),(84,7,'iyui'),(84,8,'uiyuiuy'),(84,9,'iyuiui'),(84,10,'uyiyuiuy'),(86,1,'fhgfh'),(86,2,'fghgfh'),(86,3,'gfhfgh'),(86,4,'fghgfh'),(86,5,'gfhghgf'),(86,6,'hfghfg'),(86,7,'hfghgf'),(86,8,'hfhgfhfg'),(86,9,'hgfhfg'),(86,10,'hgfhfghfg'),(87,12,'dfgh'),(87,13,'dfgh'),(87,14,'fghfg'),(87,15,'hfg'),(87,16,'hh'),(87,17,'dfh'),(87,18,'dfhh'),(87,19,'dfh');
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
  `product_category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`field_id`),
  KEY `Product_Fields_Product_Category_product_category_id_fk` (`product_category_id`),
  CONSTRAINT `Product_Fields_Product_Category_product_category_id_fk` FOREIGN KEY (`product_category_id`) REFERENCES `Product_Category` (`product_category_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1531 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Fields`
--

LOCK TABLES `Product_Fields` WRITE;
/*!40000 ALTER TABLE `Product_Fields` DISABLE KEYS */;
INSERT INTO `Product_Fields` VALUES (1,1,'Numero aziendale'),(2,1,'Tipo estintore (Kg)'),(3,1,'Costruzione '),(4,1,'Anno'),(5,1,'Matricola'),(6,1,'Capacità estinguente'),(7,1,'Dislocazione'),(8,1,'Revisione'),(9,1,'Ricollaudo'),(10,1,'Tipo manutenzione'),(12,2,'Numero aziendale'),(13,2,'Diam. Ug. Lancia (mm)'),(14,2,'Pressione statica (bar)'),(15,2,'Pressione dinamica (bar)'),(16,2,'Collaudo'),(17,2,'Esercizio'),(18,2,'Dislocazione'),(19,2,'Tipo manutenzione'),(22,3,'TestingField1'),(1508,3,'TestingField2'),(1510,3,'TestingField3'),(1511,3,'TestingField4'),(1518,46,'Quantità tritolo'),(1519,46,'Temperatura massima'),(1520,46,'Filo da tagliare'),(1526,52,'Potassio');
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
INSERT INTO `Revisions` VALUES (1,1,'0527-05-14 00:00:00'),(1,1,'2019-01-08 00:00:00'),(1,1,'2021-11-18 00:00:00'),(1,1,'2022-01-13 00:00:00'),(1,1,'2022-11-08 00:00:00'),(1,1,'2022-11-17 18:48:00'),(1,1,'2022-12-29 00:00:00'),(1,1,'2022-12-30 00:00:00'),(1,1,'2023-01-04 00:00:00'),(2,1,'2022-11-24 11:11:00'),(2,1,'2023-06-14 00:00:00'),(2,2,'2022-10-07 00:00:00'),(2,2,'2022-10-26 00:00:00'),(2,2,'2023-04-12 00:00:00'),(3,2,'2022-10-15 00:00:00'),(3,2,'2022-12-31 00:00:00'),(3,2,'2024-06-13 00:00:00');
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
INSERT INTO `Sold_Products` VALUES (9,2,2,180,300),(33,2,3,324,234),(54,2,2,202,202),(84,1,1,197,39),(86,1,1,248,254),(87,1,2,285,199);
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
INSERT INTO `User_Company` VALUES (23,21),(25,21),(40,21),(43,21),(58,21);
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
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hashed_password` varchar(256) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `stringRetrievePassword` varchar(20) DEFAULT NULL,
  `active` int(11) DEFAULT NULL COMMENT 'This column has different values dipending on the staus of the account registration',
  `activedByCompany` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Users_pk` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (23,'test@gmail.com','$2y$10$JJX7Ht1s32x7El7wh19RqOnjnXgB47M/kp4PXHzkbLIkTYj8uPO2S','Mario','Rossi',1,NULL,1,1),(25,'chrimalefico@gmail.com','$2y$10$Xnlcby3rvGMmXbUduJASnOU1r5sdD9WpgfBV.W8HtvshQKNIXZaM2','Christian','Canossa',1,NULL,1,1),(33,'andreascart04@gmail.com','$2y$10$JJX7Ht1s32x7El7wh19RqOnjnXgB47M/kp4PXHzkbLIkTYj8uPO2S','Andrea','Scartazza',1,NULL,1,1),(40,'ohniohnio@ihbi.com','$2y$10$JJX7Ht1s32x7El7wh19RqOnjnXgB47M/kp4PXHzkbLIkTYj8uPO2S','wdhoiuhdqiu','iuhiuhiuhi',0,NULL,1,1),(43,'onnwen.cassitto@icloud.com','$2y$10$JJX7Ht1s32x7El7wh19RqOnjnXgB47M/kp4PXHzkbLIkTYj8uPO2S','fdgfdgfd','dfgdfgf',0,NULL,1,1),(58,'christian.canossa04@gmail.com','$2y$10$1wfs5r8tltxEer6uPb5VZ.p6ofjpLJnl75YdSWUsJ0w0DQqzlYB7W','Christian','Canossa',0,NULL,0,1);
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

-- Dump completed on 2023-04-20 12:17:32
