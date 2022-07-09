-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: webapp_blog_yii_php
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB-2ubuntu1

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
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `meta_key` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categories`
--

LOCK TABLES `tbl_categories` WRITE;
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` VALUES (1,'Lenovo','sếtgr',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Dell','',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Asus','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'HP','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `author` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`),
  CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comment`
--

LOCK TABLES `tbl_comment` WRITE;
/*!40000 ALTER TABLE `tbl_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_coupons`
--

DROP TABLE IF EXISTS `tbl_coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` float DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_coupons`
--

LOCK TABLES `tbl_coupons` WRITE;
/*!40000 ALTER TABLE `tbl_coupons` DISABLE KEYS */;
INSERT INTO `tbl_coupons` VALUES (1,'AHIHI123',2,0);
/*!40000 ALTER TABLE `tbl_coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_currency_rates`
--

DROP TABLE IF EXISTS `tbl_currency_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_currency_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_currency_rates`
--

LOCK TABLES `tbl_currency_rates` WRITE;
/*!40000 ALTER TABLE `tbl_currency_rates` DISABLE KEYS */;
INSERT INTO `tbl_currency_rates` VALUES (1,'Việt Nam Đồng ','VND',23000.1),(2,'Euro ','EUR',0.83),(3,'Bảng Anh','GBP',0.7075),(4,'Yên Nhật','JPY',110),(5,'Đô La Úc','AUD',1.2948),(6,'Đô la mĩ','USD',1);
/*!40000 ALTER TABLE `tbl_currency_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_language_codes`
--

DROP TABLE IF EXISTS `tbl_language_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_language_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_language_codes`
--

LOCK TABLES `tbl_language_codes` WRITE;
/*!40000 ALTER TABLE `tbl_language_codes` DISABLE KEYS */;
INSERT INTO `tbl_language_codes` VALUES (1,'Italian (Italy)','it','IT'),(2,'Japanese (Japan)','ja','JP'),(3,'German (Germany)','de','DE'),(4,'English (United States)','en','US'),(5,'Spanish (Spain)','es','ES'),(6,'French (France)','fr','FR'),(7,'Lithuanian (Lithuania)','lt','LT'),(8,'Vietnamese (Viet Nam)','vi','VN');
/*!40000 ALTER TABLE `tbl_language_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lookup`
--

DROP TABLE IF EXISTS `tbl_lookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lookup`
--

LOCK TABLES `tbl_lookup` WRITE;
/*!40000 ALTER TABLE `tbl_lookup` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lookup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_migration`
--

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base',1622098175),('m210514_021022_lookup',1622098179),('m210514_021723_user',1622098179),('m210514_022239_post',1622098180),('m210514_022656_comment',1622098180),('m210514_023450_tag',1622098180),('m210514_024239_post_foreigin_key',1622098181),('m210514_024701_comment_foreigin_key',1622098182),('m210521_080731_product',1622098182),('m210521_082103_category',1622098182),('m210521_082404_product_category_foreigin_key',1622098184),('m210602_062822_order',1622617744),('m210602_080632_currency_rates',1622621410),('m210602_134037_language_codes',1622641537),('m210603_010350_add_view_product',1622682550),('m210604_034412_coupon',1622786937),('m210606_014800_order_detail',1622944413),('m210610_082737_slug',1623344775),('m210610_082811_slugs',1623344775),('m210611_022435_review',1623378959),('m210611_170329_somes_column',1623431313),('m210612_060234_verificationCode_User',1623477826);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_optional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `ship_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_company_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address_optional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_comments` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order`
--

LOCK TABLES `tbl_order` WRITE;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` VALUES (1,0,'2021-06-02 00:00:00',1,1,'','','GB','','','','','','',NULL,'','','GB','','','','','','',NULL),(2,0,'2021-06-03 00:00:00',1,5,'Tân','IT','VN','N/A','xuan lộc, đồng nai, việt nam','','Đồng Nai','810000','phuongtan12357nguyen@gmail.com',363220339,'Sieu','Share','VN','','xuân lộc, đồng nai, việt nam','','Đồng Nai','810000','ggggggggggggg',363220339),(3,0,'2021-06-06 00:00:00',1,16,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(4,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(5,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(6,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(7,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(8,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(9,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(10,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(11,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(12,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(13,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(14,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(15,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(16,0,'2021-06-06 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(17,0,'2021-06-06 00:00:00',1,1700,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(18,0,'2021-06-06 00:00:00',1,1490,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(19,0,'2021-06-07 00:00:00',1,1790,'Phương','Nguyễn','GB','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(20,0,'2021-06-07 00:00:00',1,1790,'Phương','Nguyễn','GB','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(21,0,'2021-06-07 00:00:00',1,1790,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(22,0,'2021-06-07 00:00:00',1,3490,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(23,0,'2021-06-07 00:00:00',1,3490,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(24,0,'2021-06-07 00:00:00',1,3490,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(25,0,'2021-06-07 00:00:00',1,5134,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(26,0,'2021-06-07 00:00:00',1,5030,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(27,0,'2021-06-07 00:00:00',1,11214,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(28,0,'2021-06-07 00:00:00',1,11214,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(29,0,'2021-06-07 00:00:00',1,11214,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(30,0,'2021-06-07 00:00:00',1,11214,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(31,0,'2021-06-07 00:00:00',1,11214,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(32,0,'2021-06-07 00:00:00',1,11214,'Phương','Nguyễn','GB','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(33,1,'2021-06-08 15:50:56',1,1854,'Nguyen','Tan','VN','','11 Huynh Thuc Khang, Hiep Phu, Quan 9, Ho Chi Minh, Viet Nam','','Ho Chi Minh','','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(34,0,'2021-06-10 11:06:15',1,5562,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(35,0,'2021-06-10 11:08:16',1,5562,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL),(36,0,'2021-06-10 11:21:43',1,3580,'Phương','Nguyễn','VN','N/A','xuan lộc, đồng nai, việt nam','','Xuân Lộc','810000','phuongtan12357nguyen@gmail.com',363220339,'','','GB','','','','','','',NULL);
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order_detail`
--

DROP TABLE IF EXISTS `tbl_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order_detail`
--

LOCK TABLES `tbl_order_detail` WRITE;
/*!40000 ALTER TABLE `tbl_order_detail` DISABLE KEYS */;
INSERT INTO `tbl_order_detail` VALUES (1,3,8,1700,10,'2021-06-06 09:06:55'),(2,3,6,1790,6,'2021-06-06 09:06:55'),(3,4,6,1790,1,'2021-06-06 13:10:59'),(4,5,6,1790,1,'2021-06-06 13:13:21'),(5,6,6,1790,1,'2021-06-06 13:13:37'),(6,7,6,1790,1,'2021-06-06 13:13:58'),(7,8,6,1790,1,'2021-06-06 13:14:38'),(8,9,6,1790,1,'2021-06-06 13:14:51'),(9,10,6,1790,1,'2021-06-06 13:15:27'),(10,11,6,1790,1,'2021-06-06 13:15:47'),(11,12,6,1790,1,'2021-06-06 13:17:41'),(12,13,6,1790,1,'2021-06-06 13:20:20'),(13,14,6,1790,1,'2021-06-06 13:21:58'),(14,15,6,1790,1,'2021-06-06 13:22:30'),(15,16,6,1790,1,'2021-06-06 13:22:45'),(16,17,8,1700,1,'2021-06-06 15:51:50'),(17,18,5,1490,1,'2021-06-06 16:52:42'),(18,20,6,1790,1,'2021-06-07 13:47:48'),(19,21,6,1790,1,'2021-06-07 13:48:27'),(20,22,6,1790,1,'2021-06-07 13:51:03'),(21,22,8,1700,1,'2021-06-07 13:51:03'),(22,23,6,1790,1,'2021-06-07 13:54:28'),(23,23,8,1700,1,'2021-06-07 13:54:28'),(24,24,6,1790,1,'2021-06-07 13:56:21'),(25,24,8,1700,1,'2021-06-07 13:56:21'),(26,25,7,1854,1,'2021-06-07 13:58:47'),(27,25,5,1490,1,'2021-06-07 13:58:47'),(28,25,6,1790,1,'2021-06-07 13:58:47'),(29,26,6,1790,1,'2021-06-07 14:01:04'),(30,26,4,1750,1,'2021-06-07 14:01:04'),(31,26,5,1490,1,'2021-06-07 14:01:04'),(32,27,7,1854,1,'2021-06-07 14:10:24'),(33,27,8,1700,2,'2021-06-07 14:10:24'),(34,27,5,1490,4,'2021-06-07 14:10:24'),(35,28,7,1854,1,'2021-06-07 14:12:32'),(36,28,8,1700,2,'2021-06-07 14:12:32'),(37,28,5,1490,4,'2021-06-07 14:12:32'),(38,31,7,1854,1,'2021-06-07 14:18:45'),(39,31,8,1700,2,'2021-06-07 14:18:45'),(40,31,5,1490,4,'2021-06-07 14:18:45'),(41,32,7,1854,1,'2021-06-07 14:21:32'),(42,32,8,1700,2,'2021-06-07 14:21:32'),(43,32,5,1490,4,'2021-06-07 14:21:32'),(44,33,7,1854,1,'2021-06-08 15:50:56'),(45,34,7,1854,3,'2021-06-10 11:06:15'),(46,35,7,1854,3,'2021-06-10 11:08:16'),(47,36,6,1790,2,'2021-06-10 11:21:43');
/*!40000 ALTER TABLE `tbl_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_post` (`author_id`),
  CONSTRAINT `FK_user_post` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_post`
--

LOCK TABLES `tbl_post` WRITE;
/*!40000 ALTER TABLE `tbl_post` DISABLE KEYS */;
INSERT INTO `tbl_post` VALUES (3,'The First Post 1','<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\">\r\n	<div>\r\n		<span style=\"color: #569cd6;\">public</span>&nbsp;<span style=\"color: #569cd6;\">function</span>&nbsp;<span style=\"color: #dcdcaa;\">actionCreate</span>()</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;{</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>&nbsp;=&nbsp;<span style=\"color: #569cd6;\">new</span>&nbsp;<span style=\"color: #4ec9b0;\">Post</span>;</div>\r\n	<br />\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #6a9955;\">//&nbsp;Uncomment&nbsp;the&nbsp;following&nbsp;line&nbsp;if&nbsp;AJAX&nbsp;validation&nbsp;is&nbsp;needed</span></div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #6a9955;\">//&nbsp;$this-&gt;performAjaxValidation($model);</span></div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$user</span>&nbsp;=&nbsp;<span style=\"color: #4ec9b0;\">User</span>::<span style=\"color: #dcdcaa;\">model</span>()-&gt;<span style=\"color: #dcdcaa;\">getAll</span>();</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #6a9955;\">//&nbsp;print_r($user);</span></div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$data</span>&nbsp;=&nbsp;<span style=\"color: #4ec9b0;\">CHtml</span>::<span style=\"color: #dcdcaa;\">listData</span>(<span style=\"color: #9cdcfe;\">$user</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;id&#39;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;username&#39;</span>);</div>\r\n	<br />\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #c586c0;\">if</span>&nbsp;(<span style=\"color: #dcdcaa;\">isset</span>(<span style=\"color: #9cdcfe;\">$_POST</span>[<span style=\"color: #ce9178;\">&#39;Post&#39;</span>]))&nbsp;{</div>\r\n	<br />\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">attributes</span>&nbsp;=&nbsp;<span style=\"color: #9cdcfe;\">$_POST</span>[<span style=\"color: #ce9178;\">&#39;Post&#39;</span>];</div>\r\n	<br />\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">create_time</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">gmdate</span>(<span style=\"color: #ce9178;\">&#39;Y-m-d&nbsp;H:i:s&#39;</span>,&nbsp;<span style=\"color: #dcdcaa;\">time</span>()&nbsp;+&nbsp;<span style=\"color: #b5cea8;\">7</span>&nbsp;*&nbsp;<span style=\"color: #b5cea8;\">3600</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">update_time</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">gmdate</span>(<span style=\"color: #ce9178;\">&#39;Y-m-d&nbsp;H:i:s&#39;</span>,&nbsp;<span style=\"color: #dcdcaa;\">time</span>()&nbsp;+&nbsp;<span style=\"color: #b5cea8;\">7</span>&nbsp;*&nbsp;<span style=\"color: #b5cea8;\">3600</span>);</div>\r\n	<br />\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #c586c0;\">if</span>&nbsp;(<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #dcdcaa;\">save</span>())</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">$this</span>-&gt;<span style=\"color: #dcdcaa;\">redirect</span>(<span style=\"color: #dcdcaa;\">array</span>(<span style=\"color: #ce9178;\">&#39;view&#39;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;id&#39;</span>&nbsp;=&gt;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">id</span>));</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</div>\r\n	<br />\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">$this</span>-&gt;<span style=\"color: #dcdcaa;\">render</span>(<span style=\"color: #ce9178;\">&#39;create&#39;</span>,&nbsp;<span style=\"color: #dcdcaa;\">array</span>(</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #ce9178;\">&#39;model&#39;</span>&nbsp;=&gt;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>,</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #ce9178;\">&#39;data&#39;</span>&nbsp;=&gt;&nbsp;<span style=\"color: #9cdcfe;\">$data</span>,</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;));</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;}</div>\r\n</div>\r\n<p>\r\n	Hi</p>\r\n','1',1,'2021-05-28 17:17:34','2021-05-28 17:17:34',1),(4,'Post 1','<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\">\n	<div>\n		<span style=\"color: #569cd6;\">public</span>&nbsp;<span style=\"color: #569cd6;\">function</span>&nbsp;<span style=\"color: #dcdcaa;\">actionCreate</span>()</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;{</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>&nbsp;=&nbsp;<span style=\"color: #569cd6;\">new</span>&nbsp;<span style=\"color: #4ec9b0;\">Post</span>;</div>\n	<br />\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #6a9955;\">//&nbsp;Uncomment&nbsp;the&nbsp;following&nbsp;line&nbsp;if&nbsp;AJAX&nbsp;validation&nbsp;is&nbsp;needed</span></div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #6a9955;\">//&nbsp;$this-&gt;performAjaxValidation($model);</span></div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$user</span>&nbsp;=&nbsp;<span style=\"color: #4ec9b0;\">User</span>::<span style=\"color: #dcdcaa;\">model</span>()-&gt;<span style=\"color: #dcdcaa;\">getAll</span>();</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #6a9955;\">//&nbsp;print_r($user);</span></div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$data</span>&nbsp;=&nbsp;<span style=\"color: #4ec9b0;\">CHtml</span>::<span style=\"color: #dcdcaa;\">listData</span>(<span style=\"color: #9cdcfe;\">$user</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;id&#39;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;username&#39;</span>);</div>\n	<br />\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #c586c0;\">if</span>&nbsp;(<span style=\"color: #dcdcaa;\">isset</span>(<span style=\"color: #9cdcfe;\">$_POST</span>[<span style=\"color: #ce9178;\">&#39;Post&#39;</span>]))&nbsp;{</div>\n	<br />\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">attributes</span>&nbsp;=&nbsp;<span style=\"color: #9cdcfe;\">$_POST</span>[<span style=\"color: #ce9178;\">&#39;Post&#39;</span>];</div>\n	<br />\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">create_time</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">gmdate</span>(<span style=\"color: #ce9178;\">&#39;Y-m-d&nbsp;H:i:s&#39;</span>,&nbsp;<span style=\"color: #dcdcaa;\">time</span>()&nbsp;+&nbsp;<span style=\"color: #b5cea8;\">7</span>&nbsp;*&nbsp;<span style=\"color: #b5cea8;\">3600</span>);</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">update_time</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">gmdate</span>(<span style=\"color: #ce9178;\">&#39;Y-m-d&nbsp;H:i:s&#39;</span>,&nbsp;<span style=\"color: #dcdcaa;\">time</span>()&nbsp;+&nbsp;<span style=\"color: #b5cea8;\">7</span>&nbsp;*&nbsp;<span style=\"color: #b5cea8;\">3600</span>);</div>\n	<br />\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #c586c0;\">if</span>&nbsp;(<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #dcdcaa;\">save</span>())</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">$this</span>-&gt;<span style=\"color: #dcdcaa;\">redirect</span>(<span style=\"color: #dcdcaa;\">array</span>(<span style=\"color: #ce9178;\">&#39;view&#39;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;id&#39;</span>&nbsp;=&gt;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>-&gt;<span style=\"color: #9cdcfe;\">id</span>));</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</div>\n	<br />\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">$this</span>-&gt;<span style=\"color: #dcdcaa;\">render</span>(<span style=\"color: #ce9178;\">&#39;create&#39;</span>,&nbsp;<span style=\"color: #dcdcaa;\">array</span>(</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #ce9178;\">&#39;model&#39;</span>&nbsp;=&gt;&nbsp;<span style=\"color: #9cdcfe;\">$model</span>,</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #ce9178;\">&#39;data&#39;</span>&nbsp;=&gt;&nbsp;<span style=\"color: #9cdcfe;\">$data</span>,</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;));</div>\n	<div>\n		&nbsp;&nbsp;&nbsp;&nbsp;}</div>\n</div>\n<p>\n	Hi</p>\n','1',1,'2021-06-10 21:06:02','2021-06-10 21:06:02',1),(5,'Post 2','<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\">\r\n	<div style=\"line-height: 19px;\">\r\n		<div>\r\n			<div style=\"line-height: 19px;\">\r\n				<div>\r\n					<span style=\"color: #569cd6;\">&lt;?php</span></div>\r\n				<div>\r\n					<span style=\"color: #6a9955;\">/*&nbsp;@var&nbsp;$this&nbsp;PostController&nbsp;*/</span></div>\r\n				<div>\r\n					<span style=\"color: #6a9955;\">/*&nbsp;@var&nbsp;$model&nbsp;Post&nbsp;*/</span></div>\r\n				<div>\r\n					<span style=\"color: #6a9955;\">/*&nbsp;@var&nbsp;$form&nbsp;CActiveForm&nbsp;*/</span></div>\r\n				<div>\r\n					<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;wide&nbsp;form&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>=<span style=\"color: #569cd6;\">$this</span>-&gt;<span style=\"color: #dcdcaa;\">beginWidget</span>(<span style=\"color: #ce9178;\">&#39;CActiveForm&#39;</span>,&nbsp;<span style=\"color: #dcdcaa;\">array</span>(</div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #ce9178;\">&#39;action&#39;</span>=&gt;<span style=\"color: #4ec9b0;\">Yii</span>::<span style=\"color: #dcdcaa;\">app</span>()-&gt;<span style=\"color: #dcdcaa;\">createUrl</span>(<span style=\"color: #569cd6;\">$this</span>-&gt;<span style=\"color: #9cdcfe;\">route</span>),</div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #ce9178;\">&#39;method&#39;</span>=&gt;<span style=\"color: #ce9178;\">&#39;get&#39;</span>,</div>\r\n				<div>\r\n					));&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;id&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textField</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;id&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;title&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textField</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;title&#39;</span>,<span style=\"color: #dcdcaa;\">array</span>(<span style=\"color: #ce9178;\">&#39;size&#39;</span>=&gt;<span style=\"color: #b5cea8;\">60</span>,<span style=\"color: #ce9178;\">&#39;maxlength&#39;</span>=&gt;<span style=\"color: #b5cea8;\">255</span>));&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;content&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textArea</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;content&#39;</span>,<span style=\"color: #dcdcaa;\">array</span>(<span style=\"color: #ce9178;\">&#39;rows&#39;</span>=&gt;<span style=\"color: #b5cea8;\">6</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;cols&#39;</span>=&gt;<span style=\"color: #b5cea8;\">50</span>));&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;tag&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textField</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;tag&#39;</span>,<span style=\"color: #dcdcaa;\">array</span>(<span style=\"color: #ce9178;\">&#39;size&#39;</span>=&gt;<span style=\"color: #b5cea8;\">60</span>,<span style=\"color: #ce9178;\">&#39;maxlength&#39;</span>=&gt;<span style=\"color: #b5cea8;\">255</span>));&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;status&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textField</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;status&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;create_time&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textField</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;create_time&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;update_time&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textField</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;update_time&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">label</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;author_id&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #9cdcfe;\">$form</span>-&gt;<span style=\"color: #dcdcaa;\">textField</span>(<span style=\"color: #9cdcfe;\">$model</span>,<span style=\"color: #ce9178;\">&#39;author_id&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;</span><span style=\"color: #569cd6;\">div</span>&nbsp;<span style=\"color: #9cdcfe;\">class</span>=<span style=\"color: #ce9178;\">&quot;row&nbsp;buttons&quot;</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #dcdcaa;\">echo</span>&nbsp;<span style=\"color: #4ec9b0;\">CHtml</span>::<span style=\"color: #dcdcaa;\">submitButton</span>(<span style=\"color: #ce9178;\">&#39;Search&#39;</span>);&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<div>\r\n					&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					<span style=\"color: #569cd6;\">&lt;?php</span>&nbsp;<span style=\"color: #569cd6;\">$this</span>-&gt;<span style=\"color: #dcdcaa;\">endWidget</span>();&nbsp;<span style=\"color: #569cd6;\">?</span><span style=\"color: #569cd6;\">&gt;</span></div>\r\n				<br />\r\n				<div>\r\n					<span style=\"color: #808080;\">&lt;/</span><span style=\"color: #569cd6;\">div</span><span style=\"color: #808080;\">&gt;</span><span style=\"color: #6a9955;\">&lt;!--&nbsp;search-form&nbsp;--&gt;</span></div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n','1',1,'2021-06-12 21:45:32','2021-06-12 21:45:32',1),(6,'Post 3','<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\">\r\n	<div>\r\n		<span style=\"color: #569cd6;\">function</span>&nbsp;<span style=\"color: #dcdcaa;\">convert_name</span>(<span style=\"color: #9cdcfe;\">$str</span>)</div>\r\n	<div>\r\n		{</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&agrave;|&aacute;|ạ|ả|&atilde;|&acirc;|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;a&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&egrave;|&eacute;|ẹ|ẻ|ẽ|&ecirc;|ề|ế|ệ|ể|ễ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;e&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&igrave;|&iacute;|ị|ỉ|ĩ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;i&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&ograve;|&oacute;|ọ|ỏ|&otilde;|&ocirc;|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;o&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&ugrave;|&uacute;|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;u&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(ỳ|&yacute;|ỵ|ỷ|ỹ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;y&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(đ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;d&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&Agrave;|&Aacute;|Ạ|Ả|&Atilde;|&Acirc;|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;A&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&Egrave;|&Eacute;|Ẹ|Ẻ|Ẽ|&Ecirc;|Ề|Ế|Ệ|Ể|Ễ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;E&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&Igrave;|&Iacute;|Ị|Ỉ|Ĩ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;I&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&Ograve;|&Oacute;|Ọ|Ỏ|&Otilde;|&Ocirc;|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;O&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&Ugrave;|&Uacute;|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;U&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(Ỳ|&Yacute;|Ỵ|Ỷ|Ỹ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;Y&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(Đ)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;D&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(\\&ldquo;|\\&rdquo;|\\&lsquo;|\\&rsquo;|\\,|\\!|\\&amp;|\\;|\\@|\\#|\\%|\\~|\\`|\\=|\\_|\\&#39;|</span><span style=\"color: #d7ba7d;\">\\]</span><span style=\"color: #d16969;\">|</span><span style=\"color: #d7ba7d;\">\\[</span><span style=\"color: #d16969;\">|</span><span style=\"color: #d7ba7d;\">\\}</span><span style=\"color: #d16969;\">|</span><span style=\"color: #d7ba7d;\">\\{</span><span style=\"color: #d16969;\">|\\)|\\(|\\</span>+<span style=\"color: #d16969;\">|</span><span style=\"color: #d7ba7d;\">\\^</span><span style=\"color: #d16969;\">)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;-&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #9cdcfe;\">$str</span>&nbsp;=&nbsp;<span style=\"color: #dcdcaa;\">preg_replace</span>(<span style=\"color: #d16969;\">&quot;/(&nbsp;)/&quot;</span>,&nbsp;<span style=\"color: #ce9178;\">&#39;-&#39;</span>,&nbsp;<span style=\"color: #9cdcfe;\">$str</span>);</div>\r\n	<div>\r\n		&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color: #c586c0;\">return</span>&nbsp;<span style=\"color: #9cdcfe;\">$str</span>;</div>\r\n	<div>\r\n		}</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n','1',1,'2021-06-12 21:53:28','2021-06-12 21:53:28',1),(7,'Post 31','<p>\r\n	rrrr</p>\r\n','1',1,'2022-07-09 07:52:56','2022-07-09 07:52:56',1),(8,'Post 31','<p>\r\n	rrrr</p>\r\n','1',1,'2022-07-09 07:52:56','2022-07-09 07:52:56',1),(9,'Post 4','<p>\r\n	rresre</p>\r\n','1',1,'2022-07-09 07:53:46','2022-07-09 07:53:46',1),(10,'Post 3','<p>\r\n	ewfewa fewa e</p>\r\n','1',1,'2022-07-09 07:59:56','2022-07-09 07:59:56',1),(11,'Post 3','<p>\r\n	ytiuy</p>\r\n','1',1,'2022-07-09 08:16:22','2022-07-09 08:16:22',1);
/*!40000 ALTER TABLE `tbl_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `meta_key` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_category` (`category_id`),
  CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` VALUES (1,'Dell M4700','Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.',2,1680,'/uploads/1622098297_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg','','','',1,7,'','','2021-05-27 13:51:37','2021-05-21 00:00:00',1),(2,'Dell M4800','Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.',2,1850,'/uploads/1622098363_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg','','','',1,1,'','','2021-05-27 13:52:43','2021-05-21 00:00:00',NULL),(3,'Dell M4800 VGA K2000','Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.',2,1800,'/uploads/1622098389_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg','','','',1,18,'','','2021-05-27 13:53:09','2021-05-21 00:00:00',NULL),(4,'Máy tính HP 1','Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.',4,1750,'/uploads/1622098411_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg','','','',1,8,'','','2021-05-27 13:53:31','2021-05-21 00:00:00',NULL),(5,'Laptop  Dell Precision 7710 Core I7','Laptop  Dell Precision 7710 Core I7Laptop  Dell Precision 7710 Core I7Laptop  Dell Precision 7710 Core I7',2,1490,'/uploads/1622124648_laptop-cu-dell-precision-7710-core-i7-3.jpg','','','',1,57,'','','2021-05-27 21:10:48','2021-05-27 21:10:48',NULL),(6,'LAPTOP HP Elitebook 820-G2','LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2',4,1790,'/uploads/1622124836_LAPTOP-HP-Elitebook-820-G2.jpg','','','',1,64,'','','2021-05-27 21:13:56','2021-05-21 00:00:00',NULL),(7,'Laptop Asus Vivobook X509JP i5 1035G1 2020','Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020',3,1854,'/uploads/1622124995_121277701_352157449201209_8169048760513127722_n.jpg','','','',1,119,'','','2021-05-27 21:16:35','2021-05-21 00:00:00',NULL),(8,'Dell M4800 VGA K1000','edfhsrtdshrt',2,1700,'/uploads/1622624865_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg','','','',1,147,'','','2021-06-02 16:07:45','2021-05-21 00:00:00',1),(9,'Dell M4700  S','2021-05-21 00:00:002021-05-21 00:00:002021-05-21 00:00:002021-05-21 00:00:002021-05-21 00:00:002021-05-21 00:00:00',2,19000000,'/uploads/1623315768_15747326_637547476452773_2952732291714805388_n.jpg','','','',1,155,'','','2021-06-10 16:02:48','2021-06-10 16:02:48',1),(10,'Laptop Asus Vivobook X512F','<h2 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 18px; line-height: 1.2; margin: 0px 0px 20px; padding: 0px; vertical-align: baseline; font-family: Inter, sans-serif; text-transform: uppercase; color: rgb(68, 68, 68); background-color: rgb(255, 255, 255);\">\r\n	ƯU ĐIỂM NỔI BẬT CỦA&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\"><span data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\"><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">ASUS VIVOBOOK X512F</em></span></span></h2>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<a href=\"https://shopee.vn/ncthanh1212\" rel=\"noopener noreferrer\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; background-color: transparent; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(68, 68, 68); text-decoration-line: none; transition: all 0.5s ease 0s;\" target=\"_blank\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">Laptop Asus Vivobook X512F, i5 &ndash; 8265u, 8G, 1T, vga 2G, 15,6in, FHD, gi&aacute; rẻ</span></a></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	&nbsp;</div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">D&ograve;ng asus đời mớii, mỏng nhẹ, mạnh mẽ</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">M&aacute;y like new, full box 100%.</span></div>\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px 0px 20px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">C&ograve;n BH ch&iacute;nh h&atilde;ng: 10 &ndash; 2021</span></p>\r\n<h2 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 18px; line-height: 1.2; margin: 0px 0px 20px; padding: 0px; vertical-align: baseline; font-family: Inter, sans-serif; text-transform: uppercase; color: rgb(68, 68, 68); background-color: rgb(255, 255, 255);\">\r\n	TH&Ocirc;NG SỐ KỸ THUẬT<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\"><span data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">&nbsp;<a href=\"https://laptopnct.com/danh-muc-san-pham/laptop-asus/\" rel=\"noopener noreferrer\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; background-color: transparent; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(68, 68, 68); text-decoration-line: none; transition: all 0.5s ease 0s;\" target=\"_blank\">ASUS VIVOBOOK X512F</a></span></span></h2>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+&nbsp;OS windows 10 bản quyền.</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+ cpu&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(255, 0, 0);\">i5 &ndash; 8265u</span>&nbsp;tốc độ&nbsp;8X1,6G, turbo l&ecirc;n&nbsp;3,9G&nbsp;(8cpus), chạy mạnh, m&aacute;t</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\"><span data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+ ram&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(255, 0, 0);\">8G.</span></span></span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\"><span data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+ hdd&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(255, 0, 0);\">1T.</span></span></span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+ lcd&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(255, 0, 0);\">15,6in</span>&nbsp;IPS<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(255, 0, 0);\">&nbsp;Full HD</span>(&nbsp;1920 x 1080), tr&agrave;n viền,&nbsp;m&agrave;u cực đẹp, sắc n&eacute;t.</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+ Vga c&oacute; 2vga:</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\"><span data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">==&gt; intel&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(255, 0, 0);\">UHD 620.</span></span></span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">==&gt; vga rời&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(255, 0, 0);\">Nvida MX250&nbsp;=&nbsp;2G</span>,&nbsp;chơi game, đồ họa ok.</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+&nbsp;usb 3.0, HDMI, usb type C.</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+&nbsp;Finger ID.</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+ Pin&nbsp;5 giờ</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: 700; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">+ ph&iacute;m chiclet, full ph&iacute;m số, c&oacute; đ&egrave;n b&agrave;n ph&iacute;m.</span></div>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	&nbsp;</div>\r\n<h2 data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 18px; line-height: 1.2; margin: 0px 0px 20px; padding: 0px; vertical-align: baseline; font-family: Inter, sans-serif; text-transform: uppercase; color: rgb(68, 68, 68); background-color: rgb(255, 255, 255);\">\r\n	=&gt;&nbsp;<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\"><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">ASUS VIVOBOOK X512F</em>&nbsp;Đ&Aacute;NG MUA TRONG TẦM GI&Aacute; &ndash; CẤU H&Igrave;NH KHỦNG THIẾT KẾ ĐẸP &ndash; NẾU MUA TH&Igrave; N&Ecirc;N UPDATE SSD.</span></h2>\r\n<div data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 15px; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: Inter, &quot;Segoe UI&quot;, Roboto, -apple-system, BlinkMacSystemFont, sans-serif; background-color: rgb(255, 255, 255);\">\r\n	&nbsp;</div>\r\n<h2 data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: 18px; line-height: 1.2; margin: 0px 0px 20px; padding: 0px; vertical-align: baseline; font-family: Inter, sans-serif; text-transform: uppercase; color: rgb(68, 68, 68); background-color: rgb(255, 255, 255);\">\r\n	<span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline; color: rgb(51, 102, 255);\"><span data-redactor=\"1\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: none; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; text-align: inherit; vertical-align: baseline;\">ASUS VIVOBOOK X512F =&gt;&nbsp;</span>GI&Aacute;:&nbsp;11.5TR</span></h2>\r\n',3,1100,'/uploads/1623332017_Laptop-Asus-Vivobook-X512F-đời-mới-mỏng-nhẹ-mạnh-mẽ-4.jpg','','','',1,290,'','','2021-06-10 20:33:37','2021-06-10 20:33:37',1),(11,'Laptop  Dell Precision 7710 Core I7 v2','<div role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, Helvetica, sans-serif, Verdana; font-size: 14px; background-color: rgb(255, 255, 255);\">\r\n	<div class=\"tab-content\" style=\"box-sizing: border-box; margin: 0px 0px 30px; padding: 0px;\">\r\n		<div class=\"tab-pane fade in active\" id=\"home\" role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; opacity: 1; transition: opacity 0.15s linear 0s;\">\r\n			LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2</div>\r\n		<div>\r\n			<div role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">\r\n				<div class=\"tab-content\" style=\"box-sizing: border-box; margin: 0px 0px 30px; padding: 0px;\">\r\n					<div class=\"tab-pane fade in active\" id=\"home\" role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; opacity: 1; transition: opacity 0.15s linear 0s;\">\r\n						LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2</div>\r\n					<div>\r\n						<div role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">\r\n							<div class=\"tab-content\" style=\"box-sizing: border-box; margin: 0px 0px 30px; padding: 0px;\">\r\n								<div class=\"tab-pane fade in active\" id=\"home\" role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; opacity: 1; transition: opacity 0.15s linear 0s;\">\r\n									LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2</div>\r\n								<div>\r\n									<div role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">\r\n										<div class=\"tab-content\" style=\"box-sizing: border-box; margin: 0px 0px 30px; padding: 0px;\">\r\n											<div class=\"tab-pane fade in active\" id=\"home\" role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; opacity: 1; transition: opacity 0.15s linear 0s;\">\r\n												LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2</div>\r\n											<div>\r\n												<div role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">\r\n													<div class=\"tab-content\" style=\"box-sizing: border-box; margin: 0px 0px 30px; padding: 0px;\">\r\n														<div class=\"tab-pane fade in active\" id=\"home\" role=\"tabpanel\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; opacity: 1; transition: opacity 0.15s linear 0s;\">\r\n															LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2</div>\r\n														<div>\r\n															&nbsp;</div>\r\n													</div>\r\n												</div>\r\n											</div>\r\n										</div>\r\n									</div>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n',2,15800000,'/uploads/1657236243_bagua_4_1024x1024.jpg','','','',1,1,'','','2022-07-08 06:24:03','2022-07-09 09:56:49',1),(12,'Máy tính HP ','<p>\r\n	dh trdtrd htfrd htfd htf&nbsp;</p>\r\n<p>\r\n	d ht</p>\r\n<p>\r\n	d ht</p>\r\n<p>\r\n	x htd htdr</p>\r\n<p>\r\n	&nbsp;htdr ht</p>\r\n',4,18050000,'/uploads/1657330359_1622124836_LAPTOP-HP-Elitebook-820-G2.jpg','','','',1,2,'','','2022-07-09 08:32:39','2022-07-09 08:32:39',1),(13,'Máy tính HP 1','<p>\r\n	&nbsp;srges gres gres gres g</p>\r\n<p>\r\n	re s</p>\r\n<p>\r\n	gr</p>\r\n<p>\r\n	e sg</p>\r\n<p>\r\n	res&nbsp;</p>\r\n<p>\r\n	gres gres</p>\r\n',4,18600000,'/uploads/1657330484_1622124836_LAPTOP-HP-Elitebook-820-G2.jpg','','','',1,1,'','','2022-07-09 08:34:44','2022-07-09 08:34:44',1);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reviews`
--

DROP TABLE IF EXISTS `tbl_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reviews`
--

LOCK TABLES `tbl_reviews` WRITE;
/*!40000 ALTER TABLE `tbl_reviews` DISABLE KEYS */;
INSERT INTO `tbl_reviews` VALUES (1,10,0,'t4greg','admin@gmail.com','',2,NULL),(2,10,0,'t4greg','user1@gmail.com','',2,NULL),(3,10,0,'Admin','user1@gmail.com','',5,NULL),(4,10,0,'fdgfrd','user1@gmail.com','dưefewfe',1,NULL),(5,10,0,'tanhong1','phuongtan12357nguyen@gmail.com','Good',2,NULL),(6,8,0,'Sieu Share','sieushare.com@gmail.com','retretretretretr',5,NULL),(7,10,0,'Ăn Uống 2','user1@gmail.com','gdhfdgf',3,'2021-05-31 13:53:09'),(8,10,0,'Ăn Uống 2','phuongtan12357@gmail.com','gggggg',1,'2021-05-27 13:53:09'),(9,10,1,'admin','admin@admin.com','hi all',2,NULL),(10,10,0,'Admin','phuongtan12357nguyen@gmail.com','fdgrsegr',4,NULL),(11,10,0,'t4greg','phuongtan12357nguyen@gmail.com','rdgtrytry',3,NULL),(12,10,0,'Admin','phuongtan12357nguyen@gmail.com','gresgre',3,NULL),(13,9,0,'Sieu Share','user1@gmail.com','dđ',3,'2021-06-12 20:57:47'),(14,9,0,'Ăn Uống 2','phuongtan12357nguyen@gmail.com','123',4,'2021-06-12 20:59:03'),(15,8,0,'Test','test@gmail.com','Ut non enim eleifend felis pretium feugiat. Phasellus accumsan cursus velit. Phasellus nec sem in justo pellentesque facilisis. Quisque malesuada placerat nisl. Nunc nulla.',2,'2021-06-14 08:07:39'),(16,1,1,'admin','admin@admin.com','ok',5,'2022-07-08 06:11:56'),(17,9,1,'admin','admin@admin.com','ngon',5,'2022-07-08 06:58:32');
/*!40000 ALTER TABLE `tbl_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_slugs`
--

DROP TABLE IF EXISTS `tbl_slugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_slugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT 0,
  `post_id` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT 0,
  `tag_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_slugs`
--

LOCK TABLES `tbl_slugs` WRITE;
/*!40000 ALTER TABLE `tbl_slugs` DISABLE KEYS */;
INSERT INTO `tbl_slugs` VALUES (1,'post-3-123',0,3,0,0),(2,'post-1',0,4,0,0),(3,'post-2-2-lhsaa',0,5,0,0),(4,'post-3',0,6,0,0),(5,'dell-m4700',1,0,0,0),(6,'dell-m4800',2,0,0,0),(7,'dell-m4800-vga-k2000',3,0,0,0),(8,'may-tinh-hp-1',4,0,0,0),(9,'may-tinh-hp-1',4,0,0,0),(10,'laptop-hp',6,0,0,0),(11,'dell-7710-i7',5,0,0,0),(12,'asus-x590jp',7,0,0,0),(13,'m4800-k1000',8,0,0,0),(14,'m4700-s',9,0,0,0),(15,'laptop-saus',10,0,0,0),(16,'asus',0,0,3,0),(17,'dell',0,0,2,0),(18,'lenovo',0,0,1,0),(19,'hp',0,0,4,0),(20,'post-31',0,7,0,0),(21,'post-31-ppzw09vkta',0,8,0,0),(22,'post-4',0,9,0,0),(23,'post-3-i6e3bopnr3',0,10,0,0),(24,'laptop--dell-precision-7710-core-i7-v2',0,11,0,0),(25,'may-tinh-hp-',12,0,0,0),(26,'may-tinh-hp-a2',13,0,0,0),(27,'laptop--dell-precision-7710-core-i7-v2-4',11,0,0,0);
/*!40000 ALTER TABLE `tbl_slugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tag`
--

DROP TABLE IF EXISTS `tbl_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tag`
--

LOCK TABLES `tbl_tag` WRITE;
/*!40000 ALTER TABLE `tbl_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verificationCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','admin','admin@admin.com','AaAaAa',NULL),(2,'ahihi','ahihi','ahihi@hi.co','verificationCode',NULL),(3,'phuongtan','12345678910','phuongtan12357nguyen@gmail.com','verificationCode',NULL);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-09 10:14:56
