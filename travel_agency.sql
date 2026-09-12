-- MySQL dump 10.13  Distrib 8.4.10, for Linux (x86_64)
--
-- Host: localhost    Database: travel_agency
-- ------------------------------------------------------
-- Server version	8.4.10-0ubuntu0.26.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `access` (
  `id_user` int NOT NULL,
  `id_table` int NOT NULL,
  `accesses` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`,`id_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `access` WRITE;
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` VALUES (1,1,0),(1,2,0),(1,3,0),(1,4,0),(1,5,0),(1,6,0),(1,7,0),(1,8,0),(2,1,1),(2,2,1),(2,3,1),(2,4,1),(2,5,1),(2,6,1),(2,7,1),(2,8,1),(3,1,0),(3,2,1),(3,3,1),(3,4,1),(3,5,1),(3,6,0),(3,7,0),(3,8,1),(4,1,0),(4,2,0),(4,3,0),(4,4,0),(4,5,0),(4,6,0),(4,7,0),(4,8,0),(5,1,0),(5,2,0),(5,3,0),(5,4,0),(5,5,0),(5,6,0),(5,7,0),(5,8,0),(6,1,0),(6,2,0),(6,3,0),(6,4,0),(6,5,0),(6,6,0),(6,7,0),(6,8,0),(7,1,0),(7,2,0),(7,3,0),(7,4,0),(7,5,0),(7,6,0),(7,7,0),(7,8,0),(8,1,0),(8,2,0),(8,3,0),(8,4,0),(8,5,0),(8,6,0),(8,7,0),(8,8,0),(9,1,0),(9,2,0),(9,3,0),(9,4,0),(9,5,0),(9,6,0),(9,7,0),(9,8,0),(10,1,0),(10,2,0),(10,3,0),(10,4,0),(10,5,0),(10,6,0),(10,7,0),(10,8,0),(11,1,0),(11,2,0),(11,3,0),(11,4,0),(11,5,0),(11,6,0),(11,7,0),(11,8,0),(12,1,0),(12,2,0),(12,3,0),(12,4,0),(12,5,0),(12,6,0),(12,7,0),(12,8,0),(14,1,0),(14,2,0),(14,3,0),(14,4,0),(14,5,0),(14,6,0),(14,7,0),(14,8,0),(16,1,0),(16,2,0),(16,3,0),(16,4,0),(16,5,0),(16,6,0),(16,7,0),(16,8,0);
/*!40000 ALTER TABLE `access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `id_booking` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `id_tour` int NOT NULL,
  `id_hotel` int NOT NULL,
  `booking_date` date NOT NULL,
  `status_booking` varchar(20) NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,1,1,1,'2026-06-18','Отменено'),(2,2,2,5,'2026-06-18','Отменено'),(3,3,3,14,'2026-06-19','Оплачено'),(4,4,4,10,'2026-06-19','Отменено'),(5,5,5,13,'2026-06-20','Ожидает оплаты'),(6,6,1,2,'2026-06-20','Отменено'),(7,7,2,6,'2026-06-20','Отменено'),(8,8,3,4,'2026-06-21','Подтверждено'),(9,9,4,11,'2026-06-21','Отменено'),(10,10,5,15,'2026-06-21','Ожидает оплаты'),(11,1,2,3,'2026-06-22','Отменено'),(12,2,3,4,'2026-06-22','Оплачено'),(13,3,4,12,'2026-06-22','Отменено'),(14,4,5,13,'2026-06-23','Ожидает оплаты'),(15,5,1,1,'2026-06-23','Оплачено'),(16,6,2,5,'2026-06-23','Отменено'),(17,7,3,7,'2026-06-24','Подтверждено'),(18,8,4,8,'2026-06-24','Отменено'),(19,9,5,14,'2026-06-24','Ожидает оплаты'),(21,3,2,6,'2026-06-25','Подтверждено'),(27,2,3,0,'0000-00-00','Ожидает оплаты'),(29,2,3,3,'0000-00-00','Оплачено'),(31,3,5,14,'0000-00-00','Ожидает оплаты'),(32,3,2,1,'0000-00-00','Ожидает оплаты');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `ClientsID` int NOT NULL AUTO_INCREMENT,
  `FIO` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`ClientsID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Иванов Иван Сергеевич','+79991234567','ivanov@mail.ru','x7k'),(2,'Петрова Анна Викторовна','+79992345678','god','damn'),(3,'Сидоров Максим Андреевич','+79876963142','admini','ilya12'),(4,'Кузнецова Елена Игоревна','+79994567890','kuznetsova@mail.ru','n2wr'),(5,'Смирнов Дмитрий Олегович','+79995678901','smirnov@mail.ru','q5v'),(6,'Васильева Мария Сергеевна','+79996789012','vasileva@mail.ru','b9xd'),(7,'Попов Артём Александрович','+79997890123','popov@mail.ru','k3m'),(8,'Морозова Дарья Николаевна','+79998901234','morozova@mail.ru','r7pz'),(9,'Волков Кирилл Евгеньевич','+79999012345','volkov@mail.ru','t4qy'),(10,'Фёдорова Алина Павловна','+79990123456','fedorova@mail.ru','w8n'),(13,'Кострюков Евгений Евгеньевич','89876963142','apchihba@mail.ru','123'),(14,'asdaw','й2123','aryslan300@gmail.com','йцу'),(16,'Арслан Риянович','89876951538','aryslan300@mail.com','123');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id_country` int NOT NULL AUTO_INCREMENT,
  `name_country` varchar(50) NOT NULL,
  `socr_nc` varchar(10) NOT NULL,
  PRIMARY KEY (`id_country`),
  KEY `id_country` (`id_country`),
  KEY `id_country_2` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Турция','турц'),(2,'Египет','егп'),(3,'Вьетнам','вьет'),(4,'Китай','кит'),(5,'Россия','рос'),(6,'Мальдивыя','мальд');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels` (
  `id_country` int NOT NULL,
  `id_hotel` int NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(50) NOT NULL,
  `stars` int NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id_hotel`),
  KEY `id_country` (`id_country`),
  KEY `id_country_2` (`id_country`),
  KEY `id_country_3` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (2,1,'Sunrise Resort',5,'Хургада'),(2,2,'Desert Rose',4,'Бурмалда'),(3,3,'Muong Thanh Luxury',5,'Дананг'),(4,4,'Hilton Guangzhou',5,'Гуанчжоу'),(5,5,'Radisson Rosa Khutor',5,'Сочи'),(6,6,'Kurumba Maldives',5,'Мале'),(4,7,'Grand Hyatt Beijing',5,'Пекин'),(4,8,'Shanghai Marriott',5,'Шанхай'),(4,9,'Hilton Guangzhou',5,'Гуанчжоу'),(5,10,'Cosmos Hotel',4,'Москва'),(5,11,'Park Inn Nevsky',4,'Санкт-Петербург'),(5,12,'Radisson Rosa Khutor',5,'Сочи'),(6,13,'Sun Siyam Olhuveli',5,'Мале'),(6,14,'Hard Rock Hotel Maldives',5,'Мале'),(6,15,'Kurumba Maldives',5,'Мале'),(5,16,'Boonda Forest Home',3,'Саранск');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pictures` (
  `id_pict` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `image_link` varchar(50) NOT NULL,
  `id_country` int NOT NULL,
  PRIMARY KEY (`id_pict`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (1,'2026-06-23','local','images/china/1.jfif',4),(2,'2026-06-23','local','images/china/2.jfif',4),(3,'2026-06-23','local','images/china/3.jfif',4),(4,'2026-06-23','local','images/china/4.jfif',4),(5,'2026-06-23','local','images/china/5.jfif',4),(6,'2026-06-23','local','images/china/6.jfif',4),(7,'2026-06-23','local','images/china/7.jfif',4),(8,'2026-06-23','local','images/china/8.jfif',4),(9,'2026-06-23','local','images/china/9.jfif',4),(10,'2026-06-23','local','images/china/10.jfif',4),(11,'2026-06-23','local','images/china/11.jfif',4),(12,'2026-06-23','local','images/china/12.jfif',4),(13,'2026-06-23','local','images/china/china.jpg',4),(14,'2026-06-23','local','images/egypt/1.jfif',2),(15,'2026-06-23','local','images/egypt/2.jfif',2),(16,'2026-06-23','local','images/egypt/3.jfif',2),(17,'2026-06-23','local','images/egypt/4.jfif',2),(18,'2026-06-23','local','images/egypt/5.jfif',2),(19,'2026-06-23','local','images/egypt/6.jfif',2),(20,'2026-06-23','local','images/egypt/7.jfif',2),(21,'2026-06-23','local','images/egypt/8.jfif',2),(22,'2026-06-23','local','images/egypt/9.jfif',2),(23,'2026-06-23','local','images/egypt/egypt.jpg',2),(24,'2026-06-23','local','images/mald/1.jpg',6),(25,'2026-06-23','local','images/mald/2.jfif',6),(26,'2026-06-23','local','images/mald/3.jfif',6),(27,'2026-06-23','local','images/mald/4.jfif',6),(28,'2026-06-23','local','images/mald/5.jfif',6),(29,'2026-06-23','local','images/mald/6.jfif',6),(30,'2026-06-23','local','images/mald/7.jfif',6),(31,'2026-06-23','local','images/mald/8.jfif',6),(32,'2026-06-23','local','images/mald/9.jfif',6),(33,'2026-06-23','local','images/mald/10.jfif',6),(34,'2026-06-23','local','images/mald/11.jfif',6),(35,'2026-06-23','local','images/mald/mald.jpg',6),(36,'2026-06-23','local','images/russia/1.jfif',5),(37,'2026-06-23','local','images/russia/2.jfif',5),(38,'2026-06-23','local','images/russia/3.jfif',5),(39,'2026-06-23','local','images/russia/4.jfif',5),(40,'2026-06-23','local','images/russia/5.jfif',5),(41,'2026-06-23','local','images/russia/6.jfif',5),(42,'2026-06-23','local','images/russia/7.jfif',5),(43,'2026-06-23','local','images/russia/8.jfif',5),(44,'2026-06-23','local','images/russia/9.jfif',5),(45,'2026-06-23','local','images/russia/10.jfif',5),(46,'2026-06-23','local','images/russia/11.jfif',5),(47,'2026-06-23','local','images/russia/12.jfif',5),(48,'2026-06-23','local','images/russia/russia.jpg',5),(49,'2026-06-23','local','images/turkey/1.jfif',1),(50,'2026-06-23','local','images/turkey/2.jfif',1),(51,'2026-06-23','local','images/turkey/3.jfif',1),(52,'2026-06-23','local','images/turkey/4.jfif',1),(53,'2026-06-23','local','images/turkey/5.jfif',1),(54,'2026-06-23','local','images/turkey/6.jfif',1),(55,'2026-06-23','local','images/turkey/7.jfif',1),(56,'2026-06-23','local','images/turkey/8.jfif',1),(57,'2026-06-23','local','images/turkey/turkey.jpg',1),(58,'2026-06-23','local','images/vietnam/1.jfif',3),(59,'2026-06-23','local','images/vietnam/2.jfif',3),(60,'2026-06-23','local','images/vietnam/3.jfif',3),(61,'2026-06-23','local','images/vietnam/4.jfif',3),(62,'2026-06-23','local','images/vietnam/5.jfif',3),(63,'2026-06-23','local','images/vietnam/6.jfif',3),(64,'2026-06-23','local','images/vietnam/7.jfif',3),(65,'2026-06-23','local','images/vietnam/vietnam.jpg',3);
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tables` (
  `id_table` int NOT NULL AUTO_INCREMENT,
  `numb_of_table` int NOT NULL,
  `name_of_table` varchar(50) NOT NULL,
  PRIMARY KEY (`id_table`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES (1,1,'access'),(2,2,'booking'),(3,3,'clients'),(4,4,'country'),(5,5,'hotels'),(6,6,'pictures'),(7,7,'tables'),(8,8,'tours');
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tours` (
  `id_tour` int NOT NULL AUTO_INCREMENT,
  `id_country` int NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_tour`),
  KEY `id_tour` (`id_tour`),
  KEY `id_country` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (1,2,'2026-07-01','2026-07-13',75000.00),(2,2,'2026-07-03','2026-07-12',82000.00),(3,3,'2026-07-05','2026-07-25',135000.00),(4,5,'2026-07-07','2026-07-14',60000.00),(5,6,'2026-07-10','2026-07-30',195000.00);
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-12 12:51:43
