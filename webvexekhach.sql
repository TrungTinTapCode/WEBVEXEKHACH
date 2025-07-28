-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: webvexekhach
-- ------------------------------------------------------
-- Server version	9.3.0

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,NULL,NULL,NULL,NULL,'1234567890',NULL,'$2y$12$TOAGHqO/aCsKuUX.RexwmuNtNBJURoyYXkL.MLDHTxUa7M2wYHBHa',NULL,'2025-07-16 09:01:21','2025-07-16 09:01:21'),(2,NULL,NULL,NULL,NULL,'0815278843',NULL,'$2y$12$zOyH/hqHCpKif1h54UVQvetUeggr/pqTI80FWjPfR1A9sSMoH1liy',NULL,'2025-07-16 09:08:49','2025-07-16 09:08:49'),(3,'Lộc cà nhong nhong','2025-01-20',', ','nhongnhong@gmail.com','0112220200','Nữ','$2y$12$8ynY/X4KO0yloEjuI/cwxO7u0CGnZ27evzXBPL2fjZNJcKVH4gIXW',NULL,'2025-07-20 06:27:50','2025-07-23 18:07:22'),(4,NULL,NULL,NULL,NULL,'1234567789',NULL,'$2y$12$PSw.INGM0tsXkIcCl668Se7Oj1xQKJ7JptoK9FT3e1rP0RnIo.ivO',NULL,'2025-07-20 06:40:05','2025-07-20 06:40:05'),(5,'Huy',NULL,NULL,NULL,'1234567899',NULL,'$2y$12$XVGSK05xUz8XaUETj.WhsuWlOvmY1bucQUnBA5LNiELGwM3ew/yp6',NULL,'2025-07-20 07:55:58','2025-07-20 07:55:58'),(6,'Lộc cà nhongggggg','2025-05-20','388 Nguyễn Văn Cừ, Phường Cái Khế, Cần Thơ','loccanhongggggggggggg@gmail.com','0931891832','Nữ','$2y$12$vVd.rkOJ9HqHPRdNQf2zbOnSM4ShItvNpGIy651RmFiqx6UmLGDDi',NULL,'2025-07-20 19:49:44','2025-07-24 18:19:37'),(7,'Tín mèo méo meo','2025-05-20','388 Nguyễn Văn Cừ, Xã An Phú, An Giang','timeo@gmail.com','0919111999','Nam','$2y$12$oJcCcj/1W3khi2boTBK7AO6Ecow0Mv2cVSgKOGw2n2glMmviJQcNC',NULL,'2025-07-23 13:51:36','2025-07-23 17:20:33'),(8,'Trung Tín',NULL,NULL,NULL,'0852924499',NULL,'$2y$12$JR4MbXSoP6uh818aHWjoiOMDOMnXhdsB/BhqOd2AYJO4o1HX85BjW',NULL,'2025-07-26 05:13:00','2025-07-26 05:13:00'),(9,'Admin',NULL,'Xã Vĩnh Hòa Hưng, An Giang',NULL,'0949678027','Nam','$2y$12$q9QawXoDiqrNDvD0CHcaieeKlD5r09V7GZH5j2W7TAH6cZkNKgRVG',NULL,'2025-07-26 05:57:21','2025-07-26 06:06:25'),(10,'DrCeutics B5',NULL,NULL,NULL,'0943577176',NULL,'$2y$12$mb/Qy45JaFvpB9h.lRGyR.W6AJJDLIWLjFPKI98WyteR3X15YyHN6',NULL,'2025-07-26 14:25:03','2025-07-26 14:25:03');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_details` (
  `booking_detail_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint unsigned NOT NULL,
  `seat_id` bigint unsigned NOT NULL,
  `passenger_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `ticket_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`booking_detail_id`),
  UNIQUE KEY `booking_details_ticket_number_unique` (`ticket_number`),
  KEY `booking_details_booking_id_foreign` (`booking_id`),
  KEY `booking_details_seat_id_foreign` (`seat_id`),
  CONSTRAINT `booking_details_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  CONSTRAINT `booking_details_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_details`
--

LOCK TABLES `booking_details` WRITE;
/*!40000 ALTER TABLE `booking_details` DISABLE KEYS */;
INSERT INTO `booking_details` VALUES (1,1,41,'Chưa xác định','Chưa xác định',120000.00,'zijnkzzrEz','2025-07-25 22:57:37','2025-07-25 22:57:37'),(2,1,42,'Chưa xác định','Chưa xác định',120000.00,'9XBv3jnFRw','2025-07-25 22:57:37','2025-07-25 22:57:37'),(3,2,43,'Chưa xác định','Chưa xác định',120000.00,'Uo7RcOkmjP','2025-07-25 22:59:51','2025-07-25 22:59:51'),(4,3,63,'Chưa xác định','Chưa xác định',250000.00,'UX5mztdKD9','2025-07-25 23:03:45','2025-07-25 23:03:45'),(5,3,64,'Chưa xác định','Chưa xác định',250000.00,'zfuk87HGVr','2025-07-25 23:03:45','2025-07-25 23:03:45'),(6,4,61,'Chưa xác định','Chưa xác định',250000.00,'cdWMwWqIEG','2025-07-26 07:18:46','2025-07-26 07:18:46'),(7,5,65,'Chưa xác định','Chưa xác định',250000.00,'dxvJLlAOsA','2025-07-26 09:18:49','2025-07-26 09:18:49'),(8,6,81,'Chưa xác định','Chưa xác định',50000.00,'T77Pff32KI','2025-07-26 09:29:51','2025-07-26 09:29:51'),(9,7,82,'Chưa xác định','Chưa xác định',50000.00,'O5hJs08Rc5','2025-07-26 17:01:05','2025-07-26 17:01:05'),(10,8,44,'Chưa xác định','Chưa xác định',120000.00,'nrlJhAVxdY','2025-07-26 17:39:33','2025-07-26 17:39:33'),(11,9,68,'Chưa xác định','Chưa xác định',250000.00,'JmJbTieCXK','2025-07-27 00:24:06','2025-07-27 00:24:06'),(12,10,62,'Chưa xác định','Chưa xác định',250000.00,'R1pZ9r65WT','2025-07-27 01:15:44','2025-07-27 01:15:44'),(13,11,49,'Chưa xác định','Chưa xác định',120000.00,'7ToXOcBu50','2025-07-27 02:18:08','2025-07-27 02:18:08'),(14,12,161,'Chưa xác định','Chưa xác định',10000.00,'MIVEzpWMTl','2025-07-27 02:43:55','2025-07-27 02:43:55'),(15,12,162,'Chưa xác định','Chưa xác định',10000.00,'xzIbec7y5Q','2025-07-27 02:43:55','2025-07-27 02:43:55'),(16,12,164,'Chưa xác định','Chưa xác định',10000.00,'BlYc2CGUeV','2025-07-27 02:43:55','2025-07-27 02:43:55'),(17,12,163,'Chưa xác định','Chưa xác định',10000.00,'CYYOh1WPyW','2025-07-27 02:43:55','2025-07-27 02:43:55'),(18,12,165,'Chưa xác định','Chưa xác định',10000.00,'WJlM89Fbdh','2025-07-27 02:43:55','2025-07-27 02:43:55'),(19,12,166,'Chưa xác định','Chưa xác định',10000.00,'oAPGU7kUwI','2025-07-27 02:43:55','2025-07-27 02:43:55'),(20,12,168,'Chưa xác định','Chưa xác định',10000.00,'hGUKWbWdH7','2025-07-27 02:43:55','2025-07-27 02:43:55'),(21,12,167,'Chưa xác định','Chưa xác định',10000.00,'dY1JV0Tlix','2025-07-27 02:43:55','2025-07-27 02:43:55'),(22,12,169,'Chưa xác định','Chưa xác định',10000.00,'aHARPGDV3i','2025-07-27 02:43:55','2025-07-27 02:43:55'),(23,12,170,'Chưa xác định','Chưa xác định',10000.00,'5RMNVMlUaj','2025-07-27 02:43:55','2025-07-27 02:43:55'),(24,12,179,'Chưa xác định','Chưa xác định',10000.00,'76LPsn84gR','2025-07-27 02:43:55','2025-07-27 02:43:55'),(25,12,180,'Chưa xác định','Chưa xác định',10000.00,'QQtjyA1Wi2','2025-07-27 02:43:55','2025-07-27 02:43:55'),(26,12,178,'Chưa xác định','Chưa xác định',10000.00,'PAPGb3GXse','2025-07-27 02:43:55','2025-07-27 02:43:55'),(27,12,177,'Chưa xác định','Chưa xác định',10000.00,'mJmqYw2vTH','2025-07-27 02:43:55','2025-07-27 02:43:55'),(28,12,175,'Chưa xác định','Chưa xác định',10000.00,'xfhJv5BuVz','2025-07-27 02:43:55','2025-07-27 02:43:55'),(29,12,176,'Chưa xác định','Chưa xác định',10000.00,'NZGWvSPN4X','2025-07-27 02:43:55','2025-07-27 02:43:55'),(30,12,174,'Chưa xác định','Chưa xác định',10000.00,'Y035BU3AUO','2025-07-27 02:43:55','2025-07-27 02:43:55'),(31,12,173,'Chưa xác định','Chưa xác định',10000.00,'loD6UK6fFN','2025-07-27 02:43:55','2025-07-27 02:43:55'),(32,12,171,'Chưa xác định','Chưa xác định',10000.00,'kqbRJ5jACF','2025-07-27 02:43:55','2025-07-27 02:43:55'),(33,12,172,'Chưa xác định','Chưa xác định',10000.00,'meHyjkPBNa','2025-07-27 02:43:55','2025-07-27 02:43:55'),(34,13,181,'Chưa xác định','Chưa xác định',10000.00,'ji2POSTa3p','2025-07-27 02:57:48','2025-07-27 02:57:48'),(35,13,182,'Chưa xác định','Chưa xác định',10000.00,'YifD5rtv1t','2025-07-27 02:57:48','2025-07-27 02:57:48'),(36,13,183,'Chưa xác định','Chưa xác định',10000.00,'d2X8Kgevtn','2025-07-27 02:57:48','2025-07-27 02:57:48'),(37,13,184,'Chưa xác định','Chưa xác định',10000.00,'dAa7xw4mTc','2025-07-27 02:57:48','2025-07-27 02:57:48'),(38,13,186,'Chưa xác định','Chưa xác định',10000.00,'tM8jC3mXwr','2025-07-27 02:57:48','2025-07-27 02:57:48'),(39,13,185,'Chưa xác định','Chưa xác định',10000.00,'5tCWw9yfq8','2025-07-27 02:57:48','2025-07-27 02:57:48'),(40,13,187,'Chưa xác định','Chưa xác định',10000.00,'6KZdbshgac','2025-07-27 02:57:48','2025-07-27 02:57:48'),(41,13,188,'Chưa xác định','Chưa xác định',10000.00,'pMYDjPUA9H','2025-07-27 02:57:48','2025-07-27 02:57:48'),(42,13,190,'Chưa xác định','Chưa xác định',10000.00,'YzD9oOUTC9','2025-07-27 02:57:48','2025-07-27 02:57:48'),(43,13,189,'Chưa xác định','Chưa xác định',10000.00,'MI9rN8of8M','2025-07-27 02:57:48','2025-07-27 02:57:48'),(44,14,47,'Chưa xác định','Chưa xác định',120000.00,'gwqOS9I1pE','2025-07-27 19:47:04','2025-07-27 19:47:04');
/*!40000 ALTER TABLE `booking_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `booking_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `schedule_id` bigint unsigned NOT NULL,
  `booking_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` enum('unpaid','paid','refunded') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  UNIQUE KEY `bookings_booking_code_unique` (`booking_code`),
  KEY `bookings_customer_id_foreign` (`customer_id`),
  KEY `bookings_schedule_id_foreign` (`schedule_id`),
  CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `bookings_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,1,4,'OTGGDUVJ',240000.00,'confirmed','unpaid','Sẽ có người gọi điện xác nhận đặt vé sau 5 phút','2025-07-25 22:57:37','2025-07-25 22:57:59'),(2,1,4,'Z11CWRSS',120000.00,'completed','paid',NULL,'2025-07-25 22:59:51','2025-07-26 08:41:44'),(3,1,5,'HLCJJYTP',500000.00,'cancelled','refunded',NULL,'2025-07-25 23:03:45','2025-07-26 02:26:10'),(4,1,5,'MAEF1A3A',250000.00,'cancelled','refunded',NULL,'2025-07-26 07:18:46','2025-07-26 17:04:09'),(5,1,5,'QXXEUUOG',250000.00,'confirmed','paid',NULL,'2025-07-26 09:18:49','2025-07-26 09:19:01'),(6,1,6,'ZMCO7KPJ',50000.00,'confirmed','paid',NULL,'2025-07-26 09:29:51','2025-07-26 09:30:33'),(7,1,6,'MDIS9NHX',50000.00,'completed','paid','Sẽ có người gọi điện xác nhận đặt vé sau 5 phút','2025-07-26 17:01:05','2025-07-26 17:14:51'),(8,1,4,'W0N9XKP9',120000.00,'cancelled','refunded',NULL,'2025-07-26 17:39:33','2025-07-27 01:11:38'),(9,1,5,'MDMFLHBQ',250000.00,'confirmed','paid',NULL,'2025-07-27 00:24:06','2025-07-27 00:24:29'),(10,1,5,'8VNTILOR',250000.00,'pending','unpaid',NULL,'2025-07-27 01:15:44','2025-07-27 01:15:44'),(11,1,4,'RVC92CLF',120000.00,'pending','unpaid',NULL,'2025-07-27 02:18:08','2025-07-27 02:18:08'),(12,1,8,'ZFURIDDE',200000.00,'confirmed','unpaid','Sẽ có người gọi điện xác nhận đặt vé sau 5 phút','2025-07-27 02:43:55','2025-07-27 02:44:00'),(13,1,10,'DCRSEU9H',100000.00,'confirmed','unpaid','Sẽ có người gọi điện xác nhận đặt vé sau 5 phút','2025-07-27 02:57:48','2025-07-27 02:58:03'),(14,1,4,'ZMCSYRR4',120000.00,'confirmed','unpaid','Sẽ có người gọi điện xác nhận đặt vé sau 5 phút','2025-07-27 19:47:04','2025-07-27 19:47:08');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buses`
--

DROP TABLE IF EXISTS `buses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buses` (
  `bus_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bus_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_seats` int NOT NULL,
  `amenities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bus_id`),
  UNIQUE KEY `buses_license_plate_unique` (`license_plate`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buses`
--

LOCK TABLES `buses` WRITE;
/*!40000 ALTER TABLE `buses` DISABLE KEYS */;
INSERT INTO `buses` VALUES (1,'Cosmo','65A-12345','Giường nằm',40,NULL,1,'2025-07-23 06:42:54','2025-07-23 06:42:54'),(5,'Nhung','64EA56789','bus',20,NULL,1,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(6,'Lấn Tộc','65A112345','Limo',20,NULL,1,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(7,'Cẩm Nhung Luxury','68EA4567','bus',20,NULL,1,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(9,'HHuy','123456','bus',20,NULL,1,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(10,'a','68A12345','bus',20,NULL,1,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(11,'QHuy','65A05349','bus',20,NULL,1,'2025-07-27 02:42:51','2025-07-27 02:42:51'),(12,'TestBooked','68A16933','bus',20,NULL,1,'2025-07-27 02:57:15','2025-07-27 02:57:15');
/*!40000 ALTER TABLE `buses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customer_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customers_phone_number_unique` (`phone_number`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Admin','0949678027','admin@gmail.com',NULL,NULL,'2025-07-25 22:57:21','2025-07-25 22:57:59'),(2,'DrCeutics B5','0943577176',NULL,NULL,NULL,'2025-07-26 07:25:03','2025-07-26 07:25:03');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(5,'2025_07_09_195933_create_routes_table',2),(6,'2025_07_10_165947_create_promotions_table',2),(7,'2025_07_16_151102_create_buses_table',2),(8,'2025_07_16_151203_create_schedules_table',2),(9,'2025_07_16_151300_create_seats_table',2),(10,'2025_07_16_151351_create_customers_table',2),(11,'2025_07_16_151512_create_bookings_table',2),(12,'2025_07_16_151547_create_booking_details_table',2),(13,'2025_07_16_151930_create_payments_table',2),(14,'2025_07_16_152123_create_reports_table',2),(15,'2025_07_22_131335_add_bus_name_to_buses_table',3),(16,'2025_07_22_153812_add_is_active_to_routes_table',4),(17,'2025_07_22_164657_add_departure_and_destination_to_routes_table',4),(18,'2025_07_23_140632_add_gender_to_account_table',5),(19,'2025_07_25_090825_add_is_booked_to_seats_table',6),(20,'2025_07_26_145055_add_is_active_to_schedules_table',7),(21,'2025_07_26_160447_add_completed_to_schedules_table',8),(22,'2025_07_27_092322_update_payment_method_enum_in_payments_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `payment_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint unsigned NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `payment_method` enum('VIETCOMBANK','AGRIBANK','VIETTINBANK','BIDV','VISA','MASTERCARD') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','completed','failed','refunded') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `payments_booking_id_foreign` (`booking_id`),
  CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `report_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `report_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_date` date NOT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `routes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `old_price` decimal(10,0) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `bg_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routes`
--

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` VALUES (1,'Nvc','','',NULL,120000,125000,1,NULL,'2025-07-22 06:12:42','2025-07-22 06:12:42'),(2,'An Giang - Cần Thơ','An Giang','Cần Thơ','routes/Dhavs44q2NJ3laTDHJlH4haLBicol75Lrw13TDjQ.jpg',250000,NULL,1,NULL,'2025-07-23 06:43:40','2025-07-26 09:23:06'),(3,'HG','Hậu Giang','Cần Thơ','routes/Tet6YH8Lvyuo6Hc126CYsll4lhjw8eKX5TJI1pqE.jpg',50000,NULL,1,NULL,'2025-07-26 09:25:52','2025-07-26 09:25:52'),(4,'Test','Cần Thơ','Vĩnh Long','routes/fcOhQ0P9g7iGadzI1vwFmAP9R7OBz84gZUH5Hft6.jpg',10000,NULL,1,NULL,'2025-07-27 01:13:29','2025-07-27 01:13:29'),(5,'A','Kiên Giang','An Giang','routes/0QyRJd5eaijphYQVYdBbobdnSCS6RDKhNnDQz9Vm.jpg',30000,NULL,1,NULL,'2025-07-28 01:35:16','2025-07-28 01:35:16');
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `schedule_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `route_id` bigint unsigned NOT NULL,
  `bus_id` bigint unsigned NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `status` enum('scheduled','departed','arrived','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'scheduled',
  `actual_departure` datetime DEFAULT NULL,
  `actual_arrival` datetime DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`schedule_id`),
  KEY `schedules_route_id_foreign` (`route_id`),
  KEY `schedules_bus_id_foreign` (`bus_id`),
  CONSTRAINT `schedules_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`bus_id`),
  CONSTRAINT `schedules_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,2,1,'2025-07-26 20:02:00','2025-07-29 20:02:00','arrived',NULL,NULL,NULL,'2025-07-25 06:03:02','2025-07-26 09:14:01',0,1),(4,1,5,'2025-07-25 20:36:00','2025-07-26 20:36:00','scheduled',NULL,NULL,NULL,'2025-07-25 06:36:26','2025-07-25 06:36:26',1,0),(5,2,6,'2025-07-26 13:02:00','2025-07-29 13:02:00','scheduled',NULL,NULL,NULL,'2025-07-25 23:03:01','2025-07-25 23:03:01',1,0),(6,3,1,'2025-07-27 23:26:00','2025-07-28 23:26:00','scheduled',NULL,NULL,NULL,'2025-07-26 09:26:26','2025-07-26 17:14:36',1,0),(7,2,10,'2025-07-28 09:34:00','2025-07-29 09:34:00','scheduled',NULL,NULL,NULL,'2025-07-27 02:34:44','2025-07-27 02:34:44',1,0),(8,4,11,'2025-07-28 09:43:00','2025-07-29 09:43:00','arrived',NULL,NULL,NULL,'2025-07-27 02:43:07','2025-07-27 02:52:45',0,1),(10,4,12,'2025-07-30 09:57:00','2025-07-31 09:57:00','arrived',NULL,NULL,NULL,'2025-07-27 02:57:34','2025-07-27 03:02:04',0,1),(11,3,12,'2025-08-01 10:02:00','2025-08-02 10:02:00','arrived',NULL,NULL,NULL,'2025-07-27 03:02:29','2025-07-27 03:17:29',0,1);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seats` (
  `seat_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` bigint unsigned NOT NULL,
  `seat_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_type` enum('normal','vip','window','aisle') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `is_booked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`seat_id`),
  UNIQUE KEY `seats_bus_id_seat_number_unique` (`bus_id`,`seat_number`),
  CONSTRAINT `seats_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`bus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seats`
--

LOCK TABLES `seats` WRITE;
/*!40000 ALTER TABLE `seats` DISABLE KEYS */;
INSERT INTO `seats` VALUES (41,5,'1','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(42,5,'2','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(43,5,'3','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(44,5,'4','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(45,5,'5','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(46,5,'6','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(47,5,'7','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(48,5,'8','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(49,5,'9','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(50,5,'10','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(51,5,'11','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(52,5,'12','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(53,5,'13','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(54,5,'14','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(55,5,'15','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(56,5,'16','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(57,5,'17','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(58,5,'18','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(59,5,'19','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(60,5,'20','normal',1,0,'2025-07-25 06:33:44','2025-07-25 06:33:44'),(61,6,'1','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(62,6,'2','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(63,6,'3','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(64,6,'4','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(65,6,'5','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(66,6,'6','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(67,6,'7','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(68,6,'8','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(69,6,'9','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(70,6,'10','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(71,6,'11','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(72,6,'12','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(73,6,'13','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(74,6,'14','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(75,6,'15','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(76,6,'16','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(77,6,'17','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(78,6,'18','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(79,6,'19','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(80,6,'20','normal',1,0,'2025-07-25 23:02:44','2025-07-25 23:02:44'),(81,7,'1','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(82,7,'2','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(83,7,'3','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(84,7,'4','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(85,7,'5','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(86,7,'6','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(87,7,'7','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(88,7,'8','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(89,7,'9','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(90,7,'10','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(91,7,'11','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(92,7,'12','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(93,7,'13','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(94,7,'14','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(95,7,'15','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(96,7,'16','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(97,7,'17','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(98,7,'18','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(99,7,'19','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(100,7,'20','normal',1,0,'2025-07-26 09:29:30','2025-07-26 09:29:30'),(121,9,'1','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(122,9,'2','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(123,9,'3','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(124,9,'4','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(125,9,'5','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(126,9,'6','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(127,9,'7','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(128,9,'8','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(129,9,'9','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(130,9,'10','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(131,9,'11','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(132,9,'12','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(133,9,'13','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(134,9,'14','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(135,9,'15','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(136,9,'16','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(137,9,'17','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(138,9,'18','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(139,9,'19','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(140,9,'20','normal',1,0,'2025-07-26 16:50:14','2025-07-26 16:50:14'),(141,10,'1','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(142,10,'2','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(143,10,'3','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(144,10,'4','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(145,10,'5','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(146,10,'6','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(147,10,'7','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(148,10,'8','normal',1,0,'2025-07-27 02:34:11','2025-07-27 02:34:11'),(149,10,'9','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(150,10,'10','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(151,10,'11','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(152,10,'12','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(153,10,'13','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(154,10,'14','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(155,10,'15','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(156,10,'16','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(157,10,'17','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(158,10,'18','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(159,10,'19','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(160,10,'20','normal',1,0,'2025-07-27 02:34:12','2025-07-27 02:34:12'),(161,11,'1','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(162,11,'2','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(163,11,'3','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(164,11,'4','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(165,11,'5','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(166,11,'6','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(167,11,'7','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(168,11,'8','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(169,11,'9','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(170,11,'10','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(171,11,'11','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(172,11,'12','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(173,11,'13','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(174,11,'14','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(175,11,'15','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(176,11,'16','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(177,11,'17','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(178,11,'18','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(179,11,'19','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(180,11,'20','normal',1,0,'2025-07-27 02:42:51','2025-07-27 02:52:45'),(181,12,'1','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(182,12,'2','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(183,12,'3','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(184,12,'4','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(185,12,'5','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(186,12,'6','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(187,12,'7','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(188,12,'8','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(189,12,'9','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(190,12,'10','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(191,12,'11','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(192,12,'12','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(193,12,'13','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(194,12,'14','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(195,12,'15','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(196,12,'16','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(197,12,'17','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(198,12,'18','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(199,12,'19','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40'),(200,12,'20','normal',1,0,'2025-07-27 02:57:15','2025-07-27 03:17:40');
/*!40000 ALTER TABLE `seats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('dDGv04FYHD4hq1o3VRuLoXmJxCm3wEa5CZuRJddE',9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ25HUG9DUVBacnpXaVdPbWFldHl5bWphb05pMzVoWFMyeTNjSGlTZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==',1753645677),('YZtxfMqG0w7ckZ5IswR5TYXM2ePMs0kTFEvEoPqM',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3FaYlk2T2p6bjhuUFdKZ0lKR1FxUU9lQVMxczR1blBCOVY0SDNMUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9idXNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1753668924);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-28  9:36:53
