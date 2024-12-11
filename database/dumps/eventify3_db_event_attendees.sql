-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: eventify3_db
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `event_attendees`
--

DROP TABLE IF EXISTS `event_attendees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_attendees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `ticket_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_attendees_event_id_foreign` (`event_id`),
  KEY `event_attendees_ticket_id_foreign` (`ticket_id`),
  KEY `event_attendees_user_id_foreign` (`user_id`),
  CONSTRAINT `event_attendees_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_attendees_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_attendees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_attendees`
--

LOCK TABLES `event_attendees` WRITE;
/*!40000 ALTER TABLE `event_attendees` DISABLE KEYS */;
INSERT INTO `event_attendees` VALUES (1,1,1,2,1,1,'2024-12-10 12:20:26','2024-12-11 12:04:26'),(2,1,1,3,1,1,'2024-12-10 12:29:53','2024-12-11 12:15:57'),(3,1,2,3,2,0,'2024-12-10 12:34:14','2024-12-10 12:34:14'),(4,1,1,3,2,0,'2024-12-10 12:35:34','2024-12-10 12:35:34'),(5,1,1,3,2,0,'2024-12-10 12:39:02','2024-12-10 12:39:02'),(6,1,1,3,2,0,'2024-12-10 12:39:14','2024-12-10 12:39:14'),(7,1,1,3,2,0,'2024-12-10 12:39:25','2024-12-10 12:39:25'),(8,1,1,3,2,0,'2024-12-10 12:39:57','2024-12-10 12:39:57'),(9,3,3,2,1,0,'2024-12-10 13:05:24','2024-12-10 13:05:24'),(10,3,3,3,1,0,'2024-12-10 13:06:35','2024-12-10 13:06:35'),(11,3,4,3,1,0,'2024-12-10 13:06:59','2024-12-10 13:06:59'),(12,1,2,3,2,0,'2024-12-11 02:20:32','2024-12-11 02:20:32'),(13,1,1,3,1,0,'2024-12-11 02:28:02','2024-12-11 02:28:02'),(14,1,1,3,1,0,'2024-12-11 02:37:02','2024-12-11 02:37:02'),(15,1,1,3,1,0,'2024-12-11 02:40:29','2024-12-11 02:40:29'),(16,1,1,3,1,0,'2024-12-11 02:43:20','2024-12-11 02:43:20'),(17,1,1,3,1,0,'2024-12-11 02:44:04','2024-12-11 02:44:04'),(18,3,3,12,1,0,'2024-12-11 03:08:04','2024-12-11 03:08:04'),(19,1,2,12,1,0,'2024-12-11 05:58:20','2024-12-11 05:58:20');
/*!40000 ALTER TABLE `event_attendees` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-11  1:34:31
