CREATE DATABASE  IF NOT EXISTS `excuses` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `excuses`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: excuses
-- ------------------------------------------------------
-- Server version	5.7.31teachers

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
-- Table structure for table `excuse`
--

DROP TABLE IF EXISTS `excuse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `excuse` (
  `exID` int(11) NOT NULL AUTO_INCREMENT,
  `occID` int(11) NOT NULL,
  `excuseText` varchar(255) DEFAULT NULL,
  `usedLastDate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`exID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `excuse`
--

LOCK TABLES `excuse` WRITE;
/*!40000 ALTER TABLE `excuse` DISABLE KEYS */;
INSERT INTO `excuse` VALUES (1,3,'Hunden tygget i stykker routeren, den trodde det var et kjøttbein','25/12/2022 02:11'),(2,3,'Glemte lader på skolen og hadde ikke strøm på laptop','25/12/2022 01:05'),(3,7,'Trodde meldingen var fra morra mi..','25/12/2022 04:25'),(4,7,'Hadde ikke telefonen med meg','26/12/2022 10:07');
/*!40000 ALTER TABLE `excuse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `occasion`
--

DROP TABLE IF EXISTS `occasion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `occasion` (
  `occID` int(11) NOT NULL AUTO_INCREMENT,
  `occText` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`occID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `occasion`
--

LOCK TABLES `occasion` WRITE;
/*!40000 ALTER TABLE `occasion` DISABLE KEYS */;
INSERT INTO `occasion` VALUES (1,'Må gå tidlig'),(2,'Kom for sent'),(3,'Sen innlevering'),(4,'Glemt lader'),(5,'Leverte feil dokument'),(6,'Glemt gymtøy'),(7,'Svarte ikke på melding');
/*!40000 ALTER TABLE `occasion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-01 11:28:26
