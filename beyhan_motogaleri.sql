-- MySQL dump 10.13  Distrib 9.1.0, for macos14 (arm64)
--
-- Host: localhost    Database: beyhan_motogaleri
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adminTable`
--

DROP TABLE IF EXISTS `adminTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminTable` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `adminAd` varchar(45) DEFAULT NULL,
  `adminSifre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminTable`
--

LOCK TABLES `adminTable` WRITE;
/*!40000 ALTER TABLE `adminTable` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kullaniciTable`
--

DROP TABLE IF EXISTS `kullaniciTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kullaniciTable` (
  `kullaniciID` int NOT NULL AUTO_INCREMENT,
  `kullaniciAd` varchar(45) DEFAULT NULL,
  `kullaniciSifre` varchar(60) DEFAULT NULL,
  `kullaniciEposta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kullaniciID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kullaniciTable`
--

LOCK TABLES `kullaniciTable` WRITE;
/*!40000 ALTER TABLE `kullaniciTable` DISABLE KEYS */;
INSERT INTO `kullaniciTable` VALUES (1,'atahan','$2y$12$fMXrK2KcJBDkYXgawuwE7Om6TqMvKyrH1htm38Ln90V9MWSCE5oOy',NULL),(2,'oznurhocam','$2y$12$jUdQRavPw9z9dadUePlZY.0RI2jxfSzGqViI4RuJPold4sWPoGRLK',NULL);
/*!40000 ALTER TABLE `kullaniciTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urunlerTable`
--

DROP TABLE IF EXISTS `urunlerTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `urunlerTable` (
  `urunID` int NOT NULL AUTO_INCREMENT,
  `urunAd` varchar(45) DEFAULT NULL,
  `urunFiyat` varchar(20) DEFAULT NULL,
  `urunResim` varchar(250) DEFAULT NULL,
  `urunAciklama` varchar(150) DEFAULT NULL,
  `kategoriID` int DEFAULT NULL,
  PRIMARY KEY (`urunID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urunlerTable`
--

LOCK TABLES `urunlerTable` WRITE;
/*!40000 ALTER TABLE `urunlerTable` DISABLE KEYS */;
INSERT INTO `urunlerTable` VALUES (1,'CBR1000RR-R','1.621.250','https://powersports.honda.com/-/media/products/family/cbr1000rr-r-fireblade-sp/trims/trim-main/cbr1000rr-r-fireblade-sp/2025/2025-cbr1000rr-r-fireblade-sp-grand_prix_red-1505x923.png','',1),(2,'CBR600RR','811.000','https://powersports.honda.com/motorcycle/supersport/-/media/products/family/cbr600rr/trims/trim-main/cbr600rr/2026/2026-cbr600rr-deep_pearl_gray-1505x923.png','',1),(3,'CBR500R','507.250','https://powersports.honda.com/motorcycle/sport/-/media/products/family/cbr500r/trims/trim-main/cbr500r/2025/2025-cbr500r-grand_prix_red-1505x923.png','',1),(4,'CB750 Hornet','617.250','https://powersports.honda.com/motorcycle/standard/-/media/products/family/cb750-hornet/trims/trim-main/cb750-hornet/2025/2025-cb750-hornet-matte_pearl_white-1505x923.png','',2),(5,'CB650R','666.750 ','https://powersports.honda.com/motorcycle/standard/-/media/products/family/cb650r/trims/trim-main/cb650r-e-clutch/2025/2025-cb650r-e-clutch-pearl_smoky_gray-1505x923.png','',2),(6,'CB500 Hornet','479.500','https://powersports.honda.com/motorcycle/standard/-/media/products/family/cb500f/trims/trim-main/cb500f/2025/2025-cb500f-matte_black_metallic-1505x923.png','',2),(7,'NT1100','928.000','https://powersports.honda.com/motorcycle/touring/-/media/products/family/nt1100/trims/trim-main/nt1100-dct/2025/2025-nt1100-dct-pearl_hawkeye_blue-1505x923.png','',3),(8,'CRF250R','348.100','https://powersports.honda.com/motorcycle/motocross/-/media/products/family/crf250r/trims/trim-main/crf250r/2025/2025-crf250r-red-1505x923.png','',4),(9,'PCX125','204.000 ','https://powersports.honda.com/motorcycle/scooter/-/media/products/family/pcx/trims/trim-main/pcx/2025/2025-pcx-pearl_gray-1505x923.png','',5),(10,'Africa Twin','811.750','https://powersports.honda.com/motorcycle/adventure/-/media/products/family/africa-twin/trims/trim-main/africa-twin-adventure-sports-es/2025/2025-africa-twin-adventure-sports-es-pearl_white-1505x923.png','',6),(11,'Ruckus','183.500','https://powersports.honda.com/motorcycle/scooter/-/media/products/family/ruckus/trims/trim-main/ruckus/2025/2025-ruckus-black-1505x923.png','',7),(12,'deneme','111.111','','',3);
/*!40000 ALTER TABLE `urunlerTable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-25 21:48:17
