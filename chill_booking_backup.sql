-- MySQL dump 10.13  Distrib 8.2.0, for Win64 (x86_64)
--
-- Host: 192.168.88.60    Database: chill_booking
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

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
-- Table structure for table `additional_services`
--

DROP TABLE IF EXISTS `additional_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `additional_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint unsigned NOT NULL,
  `using_id` bigint unsigned NOT NULL,
  `max_qty` int unsigned DEFAULT NULL,
  `price` double unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional_services`
--

LOCK TABLES `additional_services` WRITE;
/*!40000 ALTER TABLE `additional_services` DISABLE KEYS */;
INSERT INTO `additional_services` VALUES (1,'Pallet Wrap',1,1,10,125,'2024-10-30 18:21:48','2024-10-30 18:21:48');
/*!40000 ALTER TABLE `additional_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Metro Area 1'),(2,'Metro Area 2'),(3,'Metro Area 3'),(4,'CANBERRA'),(5,'Armidale (OF)'),(6,'BLUE MOUNTAINS');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_additional_services`
--

DROP TABLE IF EXISTS `booking_additional_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_additional_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint unsigned NOT NULL,
  `additional_service_id` bigint unsigned DEFAULT NULL,
  `qty` int unsigned DEFAULT NULL,
  `value` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_additional_services_booking_id_foreign` (`booking_id`),
  KEY `booking_additional_services_additional_service_id_foreign` (`additional_service_id`),
  CONSTRAINT `booking_additional_services_additional_service_id_foreign` FOREIGN KEY (`additional_service_id`) REFERENCES `additional_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_additional_services_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_additional_services`
--

LOCK TABLES `booking_additional_services` WRITE;
/*!40000 ALTER TABLE `booking_additional_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_additional_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_consignment_groups`
--

DROP TABLE IF EXISTS `booking_consignment_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_consignment_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint unsigned NOT NULL,
  `temperature_mode_id` bigint unsigned NOT NULL,
  `total_qty` double DEFAULT NULL,
  `total_spaces` double DEFAULT NULL,
  `total_volume` double DEFAULT NULL,
  `total_weight` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_consignment_groups_booking_id_foreign` (`booking_id`),
  KEY `booking_consignment_groups_temperature_mode_id_foreign` (`temperature_mode_id`),
  CONSTRAINT `booking_consignment_groups_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_consignment_groups_temperature_mode_id_foreign` FOREIGN KEY (`temperature_mode_id`) REFERENCES `temperature_modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_consignment_groups`
--

LOCK TABLES `booking_consignment_groups` WRITE;
/*!40000 ALTER TABLE `booking_consignment_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_consignment_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_consignments`
--

DROP TABLE IF EXISTS `booking_consignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_consignments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_consignment_group_id` bigint unsigned NOT NULL,
  `consignment_id` bigint unsigned NOT NULL,
  `qty` int unsigned NOT NULL,
  `length` double unsigned DEFAULT NULL,
  `width` double unsigned DEFAULT NULL,
  `height` double unsigned DEFAULT NULL,
  `weight` double unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_consignments_booking_consignment_group_id_foreign` (`booking_consignment_group_id`),
  KEY `booking_consignments_consignment_id_foreign` (`consignment_id`),
  CONSTRAINT `booking_consignments_booking_consignment_group_id_foreign` FOREIGN KEY (`booking_consignment_group_id`) REFERENCES `booking_consignment_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_consignments_consignment_id_foreign` FOREIGN KEY (`consignment_id`) REFERENCES `consignments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_consignments`
--

LOCK TABLES `booking_consignments` WRITE;
/*!40000 ALTER TABLE `booking_consignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_consignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_consumables`
--

DROP TABLE IF EXISTS `booking_consumables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_consumables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_consignment_group_id` bigint unsigned NOT NULL,
  `consumable_id` bigint unsigned NOT NULL,
  `qty` int unsigned NOT NULL,
  `length` double unsigned DEFAULT NULL,
  `width` double unsigned DEFAULT NULL,
  `height` double unsigned DEFAULT NULL,
  `weight` double unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_consumables_booking_consignment_group_id_foreign` (`booking_consignment_group_id`),
  KEY `booking_consumables_consumable_id_foreign` (`consumable_id`),
  CONSTRAINT `booking_consumables_booking_consignment_group_id_foreign` FOREIGN KEY (`booking_consignment_group_id`) REFERENCES `booking_consignment_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_consumables_consumable_id_foreign` FOREIGN KEY (`consumable_id`) REFERENCES `consumables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_consumables`
--

LOCK TABLES `booking_consumables` WRITE;
/*!40000 ALTER TABLE `booking_consumables` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_consumables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_pallet_management`
--

DROP TABLE IF EXISTS `booking_pallet_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_pallet_management` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint unsigned NOT NULL,
  `pallet_management_id` bigint unsigned NOT NULL,
  `qty` tinyint unsigned NOT NULL,
  `pallet_method` tinyint unsigned NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_pallet_management_booking_id_foreign` (`booking_id`),
  KEY `booking_pallet_management_pallet_management_id_foreign` (`pallet_management_id`),
  CONSTRAINT `booking_pallet_management_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_pallet_management_pallet_management_id_foreign` FOREIGN KEY (`pallet_management_id`) REFERENCES `pallet_management` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_pallet_management`
--

LOCK TABLES `booking_pallet_management` WRITE;
/*!40000 ALTER TABLE `booking_pallet_management` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_pallet_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_status` tinyint unsigned NOT NULL,
  `payment_status` tinyint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dangerous_goods` tinyint(1) DEFAULT NULL,
  `pickup_detail_id` bigint unsigned DEFAULT NULL,
  `delivery_detail_id` bigint unsigned DEFAULT NULL,
  `final_price` double DEFAULT NULL,
  `total_qty` int unsigned DEFAULT NULL,
  `total_spaces` int unsigned DEFAULT NULL,
  `total_volume` int unsigned DEFAULT NULL,
  `total_weight` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_pickup_detail_id_foreign` (`pickup_detail_id`),
  KEY `bookings_delivery_detail_id_foreign` (`delivery_detail_id`),
  CONSTRAINT `bookings_delivery_detail_id_foreign` FOREIGN KEY (`delivery_detail_id`) REFERENCES `delivery_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bookings_pickup_detail_id_foreign` FOREIGN KEY (`pickup_detail_id`) REFERENCES `pickup_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (3,1,0,'John Doe','JD Logistics','john.doe@example.com','+1234567890','REF12345',0,4,1,250.5,10,2,5,100,'2024-10-28 21:05:42','2024-10-28 21:05:42');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `consignment_additional_services`
--

DROP TABLE IF EXISTS `consignment_additional_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consignment_additional_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `consignment_id` bigint unsigned NOT NULL,
  `additional_service_id` bigint unsigned NOT NULL,
  `booking_consignment_group_id` bigint unsigned NOT NULL,
  `qty` int unsigned DEFAULT NULL,
  `value` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consignment_additional_services_consignment_id_foreign` (`consignment_id`),
  KEY `consignment_additional_services_additional_service_id_foreign` (`additional_service_id`),
  KEY `cons_add_services_booking_group_fk` (`booking_consignment_group_id`),
  CONSTRAINT `cons_add_services_booking_group_fk` FOREIGN KEY (`booking_consignment_group_id`) REFERENCES `booking_consignment_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `consignment_additional_services_additional_service_id_foreign` FOREIGN KEY (`additional_service_id`) REFERENCES `additional_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `consignment_additional_services_consignment_id_foreign` FOREIGN KEY (`consignment_id`) REFERENCES `consignments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consignment_additional_services`
--

LOCK TABLES `consignment_additional_services` WRITE;
/*!40000 ALTER TABLE `consignment_additional_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `consignment_additional_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consignments`
--

DROP TABLE IF EXISTS `consignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consignments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_qty` int unsigned DEFAULT NULL,
  `max_length` double unsigned DEFAULT NULL,
  `max_width` double unsigned DEFAULT NULL,
  `max_height` double unsigned DEFAULT NULL,
  `max_weight` double unsigned DEFAULT NULL,
  `additional_service_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consignments_additional_service_id_foreign` (`additional_service_id`),
  CONSTRAINT `consignments_additional_service_id_foreign` FOREIGN KEY (`additional_service_id`) REFERENCES `additional_services` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consignments`
--

LOCK TABLES `consignments` WRITE;
/*!40000 ALTER TABLE `consignments` DISABLE KEYS */;
INSERT INTO `consignments` VALUES (1,'Pallet',11,120,120,120,160,NULL,'2024-10-30 17:57:34','2024-10-30 17:57:34'),(2,'Carton',15,10,15,30,100,NULL,'2024-10-30 17:58:29','2024-10-30 17:58:29');
/*!40000 ALTER TABLE `consignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumables`
--

DROP TABLE IF EXISTS `consumables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consumables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_qty` int unsigned DEFAULT NULL,
  `length` double unsigned DEFAULT NULL,
  `width` double unsigned DEFAULT NULL,
  `height` double unsigned DEFAULT NULL,
  `weight` double unsigned DEFAULT NULL,
  `price` double unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumables`
--

LOCK TABLES `consumables` WRITE;
/*!40000 ALTER TABLE `consumables` DISABLE KEYS */;
INSERT INTO `consumables` VALUES (1,'Dry ice',1,1,1,1,1,NULL,'2024-10-30 18:00:40','2024-10-30 18:00:40');
/*!40000 ALTER TABLE `consumables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_details`
--

DROP TABLE IF EXISTS `delivery_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_type` tinyint unsigned NOT NULL,
  `delivery_time_type` tinyint unsigned NOT NULL,
  `location_id` bigint unsigned DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `timeslot_from` time DEFAULT NULL,
  `timeslot_to` time DEFAULT NULL,
  `office_time` time DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_instructions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_details_location_id_foreign` (`location_id`),
  CONSTRAINT `delivery_details_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_details`
--

LOCK TABLES `delivery_details` WRITE;
/*!40000 ALTER TABLE `delivery_details` DISABLE KEYS */;
INSERT INTO `delivery_details` VALUES (1,2,3,2,'456 Delivery Ave','145.0365','-37.8286','2024-11-01 00:00:00','13:00:00','17:00:00',NULL,'Mark Smith','+9876543210','mark.smith@example.com','Delivery Co.','contact@deliveryco.com','Leave at the front door','2024-10-28 21:05:42','2024-10-28 21:05:42');
/*!40000 ALTER TABLE `delivery_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
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
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `location_schedules`
--

DROP TABLE IF EXISTS `location_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location_schedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint unsigned NOT NULL,
  `day_number` int unsigned DEFAULT NULL,
  `from` time DEFAULT NULL,
  `to` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_schedules_location_id_foreign` (`location_id`),
  CONSTRAINT `location_schedules_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location_schedules`
--

LOCK TABLES `location_schedules` WRITE;
/*!40000 ALTER TABLE `location_schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `location_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state_id` bigint unsigned DEFAULT NULL,
  `area_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_state_id_foreign` (`state_id`),
  KEY `locations_area_id_foreign` (`area_id`),
  CONSTRAINT `locations_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE SET NULL,
  CONSTRAINT `locations_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Armidale',NULL,NULL,NULL,'Armidale','2350',NULL,'2024-10-30 15:55:42',2,5),(2,'Canberra Central',NULL,NULL,NULL,'Canberra Central','2601',NULL,'2024-10-30 15:54:56',1,4),(3,'Blackheath',NULL,NULL,NULL,'Blackheath','2785','2024-10-30 16:00:14','2024-10-30 16:00:14',2,6);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2020_10_04_115514_create_moonshine_roles_table',2),(5,'2020_10_05_173148_create_moonshine_tables',2),(6,'2022_12_19_115549_create_moonshine_socialites_table',2),(7,'9999_12_20_173629_create_notifications_table',2),(23,'2024_08_23_110909_create_additional_services_table',3),(24,'2024_08_26_121732_create_consumables_table',3),(25,'2024_08_26_172331_create_consignments_table',3),(26,'2024_08_27_190828_create_temperature_modes_table',3),(27,'2024_08_27_202957_create_pallet_management_table',3),(28,'2024_08_28_121237_create_locations_table',3),(29,'2024_08_29_134111_create_pickup_details_table',3),(30,'2024_08_29_134127_create_delivery_details_table',3),(31,'2024_08_30_192221_create_bookings_table',3),(32,'2024_08_30_194823_create_booking_additional_services_table',3),(33,'2024_08_30_195721_create_booking_pallet_management_table',3),(34,'2024_08_30_204235_create_booking_consignment_groups_table',3),(35,'2024_08_30_204609_create_booking_consignments_table',3),(36,'2024_08_30_204908_create_booking_consumables_table',3),(37,'2024_08_30_211153_create_consignment_additional_services_table',3),(38,'2024_10_27_213204_create_personal_access_tokens_table',4),(39,'2024_10_28_192156_rename_columns_in_pickup_details',5),(40,'2024_10_30_152327_create_states_table',6),(41,'2024_10_30_152335_create_areas_table',6),(42,'2024_10_30_152948_add_state_and_area_to_locations_table',6),(43,'2024_10_30_183159_create_options_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_socialites`
--

DROP TABLE IF EXISTS `moonshine_socialites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_socialites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moonshine_user_id` bigint unsigned NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moonshine_socialites_driver_identity_unique` (`driver`,`identity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_socialites`
--

LOCK TABLES `moonshine_socialites` WRITE;
/*!40000 ALTER TABLE `moonshine_socialites` DISABLE KEYS */;
/*!40000 ALTER TABLE `moonshine_socialites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_user_roles`
--

DROP TABLE IF EXISTS `moonshine_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_user_roles`
--

LOCK TABLES `moonshine_user_roles` WRITE;
/*!40000 ALTER TABLE `moonshine_user_roles` DISABLE KEYS */;
INSERT INTO `moonshine_user_roles` VALUES (1,'Admin','2024-10-26 16:09:51','2024-10-26 16:09:51');
/*!40000 ALTER TABLE `moonshine_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_users`
--

DROP TABLE IF EXISTS `moonshine_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moonshine_user_role_id` bigint unsigned NOT NULL DEFAULT '1',
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moonshine_users_email_unique` (`email`),
  KEY `moonshine_users_moonshine_user_role_id_foreign` (`moonshine_user_role_id`),
  CONSTRAINT `moonshine_users_moonshine_user_role_id_foreign` FOREIGN KEY (`moonshine_user_role_id`) REFERENCES `moonshine_user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_users`
--

LOCK TABLES `moonshine_users` WRITE;
/*!40000 ALTER TABLE `moonshine_users` DISABLE KEYS */;
INSERT INTO `moonshine_users` VALUES (1,1,'andrew.chuev@gmail.com','$2y$12$bDyC3ejVamZhD30RRDAa.OUjJ3fWbA/R9qBH.cDXVlDh4AgEL906C','Andrew','moonshine_users/yqEmr6ylnAK0vCrEQ6nLcbBIOuzDZ27GgoTLC7GR.jpg','xXJMJwPk7IlVXhJD1npcgoypDWfrdhZkI7yHRk6vmK2spKNTnjJYww3jxzb9','2024-10-26 16:10:17','2024-10-26 17:49:39');
/*!40000 ALTER TABLE `moonshine_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('1b07ec65-9f07-4037-917f-8f30577faefc','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"File exported\",\"button\":{\"link\":\"https:\\/\\/chill-booking.local\\/storage\\/booking-resource.xlsx\",\"label\":\"Download\"},\"color\":null}',NULL,'2024-10-30 16:39:48','2024-10-30 16:39:48');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `options_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pallet_management`
--

DROP TABLE IF EXISTS `pallet_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pallet_management` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchangeble` tinyint(1) NOT NULL,
  `transferable` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pallet_management`
--

LOCK TABLES `pallet_management` WRITE;
/*!40000 ALTER TABLE `pallet_management` DISABLE KEYS */;
INSERT INTO `pallet_management` VALUES (1,'Chep Pallet',1,0,'2024-10-30 18:07:17','2024-10-30 18:07:58');
/*!40000 ALTER TABLE `pallet_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pickup_details`
--

DROP TABLE IF EXISTS `pickup_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pickup_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pickup_type` tinyint unsigned NOT NULL,
  `pickup_time_type` tinyint unsigned NOT NULL,
  `location_id` bigint unsigned DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `timeslot_from` time DEFAULT NULL,
  `timeslot_to` time DEFAULT NULL,
  `office_time` time DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_instructions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pickup_details_location_id_foreign` (`location_id`),
  CONSTRAINT `pickup_details_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pickup_details`
--

LOCK TABLES `pickup_details` WRITE;
/*!40000 ALTER TABLE `pickup_details` DISABLE KEYS */;
INSERT INTO `pickup_details` VALUES (4,1,2,1,'123 Pickup St','144.9631','-37.8136','2024-10-30 00:00:00','09:00:00','12:00:00',NULL,'Jane Doe','+1234567890','jane.doe@example.com','JD Logistics','contact@jdlogistics.com','Handle with care','2024-10-28 21:05:42','2024-10-28 21:05:42');
/*!40000 ALTER TABLE `pickup_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('xSOKuOYHw1vJ3xSeWohfZKps4kljorhZN3wGUstp',1,'192.168.88.7','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoianFZZFF4QkhobVBqeWh2bzkyRms1UG5FdXhtU0Z2YXYxQUNmT0Z6eiI7czo1NjoibG9naW5fbW9vbnNoaW5lXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIzOiJwYXNzd29yZF9oYXNoX21vb25zaGluZSI7czo2MDoiJDJ5JDEyJGJEeUMzZWpWYW1aaEQzMFJSREFhLk9VakozZldiQS9SOXFCSC5jRFhWbERoNEFnRUw5MDZDIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxMDA6Imh0dHBzOi8vY2hpbGwtYm9va2luZy5sb2NhbC9hZG1pbi9yZXNvdXJjZS9hZGRpdGlvbmFsLXNlcnZpY2UtcmVzb3VyY2UvYWRkaXRpb25hbC1zZXJ2aWNlLWluZGV4LXBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1730312509);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Australian Capital Territory'),(2,'New South Wales'),(3,'Queensland');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temperature_modes`
--

DROP TABLE IF EXISTS `temperature_modes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temperature_modes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temperature_modes`
--

LOCK TABLES `temperature_modes` WRITE;
/*!40000 ALTER TABLE `temperature_modes` DISABLE KEYS */;
INSERT INTO `temperature_modes` VALUES (1,'Chilled','2024-10-30 16:04:24','2024-10-30 16:04:24');
/*!40000 ALTER TABLE `temperature_modes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

-- Dump completed on 2024-10-30 20:50:45
