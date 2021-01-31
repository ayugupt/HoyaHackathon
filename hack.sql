CREATE DATABASE  IF NOT EXISTS `hack` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hack`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: hack
-- ------------------------------------------------------
-- Server version	5.6.45-log

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
-- Table structure for table `patient_details`
--

DROP TABLE IF EXISTS `patient_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(45) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `disease` varchar(200) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `last_visit` date DEFAULT NULL,
  `next_visit` timestamp NULL DEFAULT NULL,
  `condition` varchar(45) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_details`
--

LOCK TABLES `patient_details` WRITE;
/*!40000 ALTER TABLE `patient_details` DISABLE KEYS */;
INSERT INTO `patient_details` VALUES (1,'Sheetal Mathotra',25,'Fever','Delhi','2021-01-02','2021-01-15 05:00:00','Sick','Under Observations',1),(2,'Karan Saini',30,'Cough','Jaipur','2021-01-08','2021-01-30 07:30:00','Mild Sickness','Cough Persists',1),(3,'Rajiv Gupta',35,'Chest Pain','Mumbai','2021-01-06','2021-01-31 09:30:00','Sick','Pain settled but weakness',1),(4,'Abhay Agarwal',40,'Typhoid','Delhi','2020-01-10','2021-01-18 06:00:00','Sick','under observation',1);
/*!40000 ALTER TABLE `patient_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_vital_stat`
--

DROP TABLE IF EXISTS `patient_vital_stat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_vital_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `vital_stat_name` varchar(45) DEFAULT NULL,
  `vital_stat_value` varchar(45) DEFAULT NULL,
  `vital_stat_range` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT 'sysadmin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_vital_stat`
--

LOCK TABLES `patient_vital_stat` WRITE;
/*!40000 ALTER TABLE `patient_vital_stat` DISABLE KEYS */;
INSERT INTO `patient_vital_stat` VALUES (1,1,'glucose','93','65-99 mg/dl',1,'2021-01-14 18:30:00','sysadmin'),(2,1,'globulin, total','2,4','1.5-4.5 g/dl',1,'2021-01-15 16:00:33','sysadmin'),(3,1,'bun','14','6-20 mg/dl',1,'2021-01-15 16:00:33','sysadmin'),(4,1,'a/g ratio','2.1','1.2-2.2 ',1,'2021-01-15 16:00:33','sysadmin');
/*!40000 ALTER TABLE `patient_vital_stat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hack'
--

--
-- Dumping routines for database 'hack'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-16 10:40:10
