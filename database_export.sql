-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: kdjxkbin_pro1014
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-log-cll-lve

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
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_paid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`,`prod_id`),
  KEY `fk_item_prod_idx` (`prod_id`),
  CONSTRAINT `fk_item_cart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`),
  CONSTRAINT `fk_item_prod` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` (`cart_id`, `prod_id`, `quantity`, `price_at_paid`) VALUES (2,1,1,NULL),(2,2,1,NULL),(5,1,10,NULL),(5,2,9,NULL),(5,6,2,NULL),(747,1,1,NULL),(747,2,6,NULL),(749,1,5,NULL),(749,2,16,NULL),(749,6,4,NULL),(749,8,8,NULL),(749,15,1,NULL),(751,31,1,NULL),(752,6,1,NULL),(753,1,2,NULL),(754,48,1,NULL),(755,1,2,NULL),(755,2,4,NULL),(755,8,1,NULL),(756,2,2,NULL),(756,24,2,NULL),(756,30,1,NULL),(757,6,10,NULL),(759,30,1,NULL),(760,1,30,NULL),(761,1,1,NULL),(762,2,1,NULL),(763,1,4,NULL),(764,2,2147483644,NULL),(764,20,5,NULL),(765,2,3,NULL),(767,31,19,NULL),(768,36,14,NULL),(769,27,18,NULL),(769,28,15,NULL),(770,1,4,NULL);
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` enum('active','order_wait','order_success','order_fail') NOT NULL DEFAULT 'active',
  `voucher_id` varchar(100) DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `cart_total` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_user_cart_idx` (`user_id`),
  KEY `fk_voucher_cart_idx` (`voucher_id`),
  CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `fk_voucher_cart` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`voucher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=771 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`cart_id`, `user_id`, `status`, `voucher_id`, `paid_date`, `cart_total`, `address`) VALUES (1,1,'active','123456',NULL,0,NULL),(2,2,'active',NULL,NULL,220000,NULL),(4,3,'active',NULL,NULL,0,NULL),(5,9,'order_success','test123',NULL,1620000,NULL),(6,16,'active',NULL,NULL,0,NULL),(746,9,'order_success',NULL,NULL,0,NULL),(747,9,'order_success',NULL,NULL,820000,NULL),(748,9,'order_success',NULL,NULL,0,NULL),(749,9,'order_success',NULL,NULL,2838000,NULL),(750,20,'order_success',NULL,NULL,0,NULL),(751,18,'order_success',NULL,NULL,10000,NULL),(752,20,'active',NULL,NULL,170000,NULL),(753,21,'active',NULL,NULL,200000,NULL),(754,9,'order_success',NULL,NULL,40000,NULL),(755,9,'order_success','Test123',NULL,526000,NULL),(756,18,'order_wait','123456',NULL,365000,NULL),(757,22,'order_fail',NULL,NULL,1700000,NULL),(758,22,'active',NULL,NULL,0,NULL),(759,9,'order_success','vc01',NULL,45000,NULL),(760,24,'order_success','vc01',NULL,600000,NULL),(761,9,'order_success','vc01',NULL,20000,NULL),(762,9,'order_success','test123',NULL,119000,NULL),(763,9,'order_success',NULL,NULL,115000,NULL),(764,25,'active','ABCXYZ',NULL,2147483647,NULL),(765,18,'active','ABCXYZ',NULL,360000,NULL),(766,27,'active',NULL,NULL,NULL,NULL),(767,28,'order_success',NULL,NULL,225000,NULL),(768,28,'order_success',NULL,NULL,105000,NULL),(769,28,'active',NULL,NULL,3060000,NULL),(770,9,'active',NULL,NULL,80000,NULL);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_desc` text DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`) VALUES (1,'Bánh chocopie',''),(2,'Bánh Snack',''),(3,'Bánh Qui',''),(4,'Bánh tươi',''),(5,'Kẹo',''),(6,'Các loại hạt, trái cây sấy khô',''),(11,'','');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_cat_id` int(11) NOT NULL,
  `faq_quest` text NOT NULL,
  `faq_answer` text NOT NULL,
  PRIMARY KEY (`faq_id`),
  KEY `fk_faq_cat_idx` (`faq_cat_id`),
  CONSTRAINT `fk_faq_cat` FOREIGN KEY (`faq_cat_id`) REFERENCES `faq_categories` (`faq_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categories`
--

DROP TABLE IF EXISTS `faq_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_categories` (
  `faq_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_name` varchar(255) NOT NULL,
  PRIMARY KEY (`faq_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categories`
--

LOCK TABLES `faq_categories` WRITE;
/*!40000 ALTER TABLE `faq_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_text` int(11) NOT NULL,
  `feedback_time` timestamp NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `fk_feedback_user_idx` (`user_id`),
  CONSTRAINT `fk_feedback_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liked_comments`
--

DROP TABLE IF EXISTS `liked_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liked_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`,`user_id`,`prod_id`),
  KEY `fk_user_likecmt_idx` (`user_id`),
  KEY `fk_prod_likecmt_idx` (`prod_id`),
  CONSTRAINT `fk_prod_likecmt` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  CONSTRAINT `fk_user_likecmt` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liked_comments`
--

LOCK TABLES `liked_comments` WRITE;
/*!40000 ALTER TABLE `liked_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `liked_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otp`
--

DROP TABLE IF EXISTS `otp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otp` (
  `user_id` int(11) NOT NULL,
  `otp_code` int(11) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `is_used` enum('0','1') NOT NULL DEFAULT '0',
  KEY `otp_users_user_id_fk` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otp`
--

LOCK TABLES `otp` WRITE;
/*!40000 ALTER TABLE `otp` DISABLE KEYS */;
INSERT INTO `otp` (`user_id`, `otp_code`, `create_at`, `is_used`) VALUES (9,649494,'2023-11-29 03:37:55','1'),(9,769601,'2023-11-29 03:39:53','1'),(9,285300,'2023-11-29 03:40:55','1'),(9,557989,'2023-11-29 03:51:46','1'),(9,326430,'2023-11-29 09:55:46','1'),(9,631896,'2023-11-29 10:02:48','1'),(9,966291,'2023-11-29 15:51:34','1'),(9,771176,'2023-11-29 15:51:42','1'),(9,941906,'2023-11-29 15:52:08','1'),(9,108619,'2023-11-29 15:53:09','1'),(9,976380,'2023-11-29 15:53:55','1'),(9,564643,'2023-11-30 04:46:02','1'),(9,717019,'2023-11-30 04:47:36','1'),(9,208679,'2023-11-30 04:49:01','1'),(9,110133,'2023-12-04 10:07:44','1'),(27,450407,'2023-12-06 05:51:58','0'),(28,924793,'2023-12-07 17:24:48','1'),(28,777782,'2023-12-07 17:25:02','0');
/*!40000 ALTER TABLE `otp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_comments`
--

DROP TABLE IF EXISTS `product_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_id`),
  KEY `fk_prod_cmt_idx` (`prod_id`),
  KEY `fk_user_cmt_idx` (`user_id`),
  CONSTRAINT `fk_prod_cmt` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  CONSTRAINT `fk_user_cmt` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_comments`
--

LOCK TABLES `product_comments` WRITE;
/*!40000 ALTER TABLE `product_comments` DISABLE KEYS */;
INSERT INTO `product_comments` (`comment_id`, `prod_id`, `user_id`, `comment_text`, `comment_time`) VALUES (13,6,18,'bánh rất ngon','2023-11-30 05:27:35'),(14,6,20,'good','2023-11-30 12:56:51'),(15,1,9,'ngon','2023-11-30 14:58:09'),(16,9,9,'ok','2023-12-01 09:46:53'),(17,1,24,'Bánh này ngon lắm','2023-12-04 10:16:46'),(18,31,28,'sản phẩm xịn','2023-12-07 17:21:18'),(19,19,28,'sản phẩm vip ','2023-12-07 17:25:45');
/*!40000 ALTER TABLE `product_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_rates`
--

DROP TABLE IF EXISTS `product_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_rates` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_star` int(11) NOT NULL,
  `rate_text` text DEFAULT NULL,
  `rate_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `fk_prod_idx` (`prod_id`),
  KEY `fk_user_idx` (`user_id`),
  CONSTRAINT `fk_prod_rate` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  CONSTRAINT `fk_user_rate` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_rates`
--

LOCK TABLES `product_rates` WRITE;
/*!40000 ALTER TABLE `product_rates` DISABLE KEYS */;
INSERT INTO `product_rates` (`rate_id`, `rate_star`, `rate_text`, `rate_date`, `user_id`, `prod_id`) VALUES (8,5,'Bánh này ngon lắm, mọi người nên mua nha','2023-12-02 12:41:42',9,1),(9,5,'Bánh rất ngon, tôi đã mua','2023-12-02 12:41:42',8,1),(10,4,'Nên mua nha','2023-12-02 12:41:42',14,1),(11,4,'Bánh ngon, nhưng hơi khô','2023-12-02 12:41:42',15,1),(12,3,'Bánh ngon, mà ship hàng lâu quá nên mình cho 3 sao nhé!','2023-12-02 12:41:42',19,1);
/*!40000 ALTER TABLE `product_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_stocks`
--

DROP TABLE IF EXISTS `product_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_stocks` (
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`prod_id`),
  CONSTRAINT `fk_prod` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_stocks`
--

LOCK TABLES `product_stocks` WRITE;
/*!40000 ALTER TABLE `product_stocks` DISABLE KEYS */;
INSERT INTO `product_stocks` (`prod_id`, `quantity`, `last_update`) VALUES (1,6,'2023-11-12 06:36:27'),(2,1002,'2023-11-15 10:10:30'),(6,0,'2023-11-24 04:04:28'),(8,888,'2023-11-24 04:04:28'),(9,999,'2023-11-24 04:04:28'),(15,500,'2023-11-24 04:04:28'),(19,500,'2023-11-24 04:04:28'),(20,500,'2023-11-24 04:04:28'),(21,500,'2023-11-24 04:04:28'),(23,500,'2023-11-24 04:04:28'),(24,500,'2023-11-25 05:04:28'),(25,500,'2023-11-25 05:04:28'),(26,500,'2023-11-25 05:04:28'),(27,500,'2023-11-25 05:04:28'),(28,500,'2023-11-25 05:04:28'),(29,500,'2023-11-25 05:04:28'),(30,500,'2023-11-25 05:04:28'),(31,500,'2023-11-25 05:04:28'),(32,500,'2023-11-25 05:04:28'),(33,500,'2023-11-25 05:04:28'),(34,500,'2023-11-25 05:04:28'),(35,500,'2023-11-25 05:04:28'),(36,500,'2023-11-25 05:04:28'),(37,500,'2023-11-25 05:04:28'),(38,500,'2023-11-25 05:04:28'),(39,500,'2023-11-25 05:04:28'),(40,500,'2023-11-25 05:04:28'),(41,500,'2023-11-25 05:04:28'),(42,500,'2023-11-25 05:04:28'),(43,500,'2023-11-25 05:04:28'),(44,500,'2023-11-25 05:04:28'),(45,500,'2023-11-25 05:04:28'),(46,500,'2023-11-25 05:04:28'),(47,500,'2023-11-25 05:04:28'),(48,500,'2023-11-25 05:04:28'),(49,500,'2023-11-25 05:04:28'),(50,500,'2023-11-25 05:04:28'),(51,500,'2023-11-25 05:04:28');
/*!40000 ALTER TABLE `product_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `prod_desc` text DEFAULT NULL,
  `prod_price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `views` int(11) DEFAULT 0,
  `best_sell` enum('0','1') DEFAULT '0',
  `img_path` text NOT NULL,
  `is_delete` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`prod_id`),
  KEY `fk_cat_idx` (`category_id`),
  CONSTRAINT `fk_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `category_id`, `views`, `best_sell`, `img_path`, `is_delete`) VALUES (1,'Lay\'s phô mai','Snack khoai tây phô mai là món ăn vặt hấp dẫn với hương vị ngọt ngào của khoai tây và lớp phô mai béo ngậy. Sản phẩm cung cấp năng lượng tự nhiên và protein.',20000,2,492,'0','https://bom.so/0B3dlU','0'),(2,'Bánh chocopie cacao','Bánh Choco Pie Orion Cacao là chiếc bánh kẹp nhân kem dẻo tan chảy, vỏ bánh với độ mềm xốp thơm ngon đặc trưng hương vị ca cao.',120000,1,193,'0','https://i.imgur.com/QsCvclv.png','0'),(6,'Bánh Qui White Castle','Đây là loại bánh quy bơ các biến thể từ bánh quy sandwich như kem sữa trứng. Bánh cực kỳ ngon khi kết hợp với mứt và tuyệt vời khi nhúng vào chocolate.',170000,3,391,'0','https://bom.so/lwsnl3','0'),(8,'Bánh mì lá dứa','Bánh mì lá dứa thơm ngọt, mềm dai cho bữa sáng thêm hấp dẫn',6000,4,328,'0','https://bom.so/GPup9z','0'),(9,'Kẹo dừa','Kẹo được chế biến từ nguyên liệu chính là cơm dừa, đường và mạch nha. Đây là loại kẹo đặc sản và là một nghề thủ công truyền thống mang đậm văn hóa xứ sở',18000,5,573,'0','https://bom.so/uIUHUJ','0'),(15,'Bánh chocopie vị dâu','Bánh Chocopie là một loại nước sốt quả mọng kép gồm kem sữa, quả mâm xôi và dâu tây được kẹp giữa những chiếc bánh trắng như tuyết đầu mùa và phủ một lớp sô cô la trắng. ',90000,1,275,'0','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpX2hYCN7CLVWweFUtyFJjKtW5cRYcDyHk0Q&usqp=CAU','0'),(19,'Bánh Chocopie Orion','Orion mang đến cho bạn bánh ChocoPie truyền thống với cấu trúc bánh mềm mịn, nhân marshmallow dẻo và vị sô cô la đặc trưng',90000,1,252,'0','https://bom.so/h62lw9','0'),(20,'Bánh chocopie vị dứa','Bánh mềm phủ socola Omeli Chocolate Pie vị Lá Dứa',60000,1,280,'0','https://bom.so/Jut9eQ','0'),(21,'Chocolate Oreo','',30000,1,803,'0','https://bom.so/MB85da','0'),(23,'Hạt hạnh nhân','',160000,6,603,'0','https://bom.so/9ox0ZM','0'),(24,'Hạt điều','',40000,6,284,'0','https://bom.so/kQpOgm','0'),(25,'Hạt hướng dương','',21000,6,102,'0','https://bom.so/mSlw0u','0'),(26,'Mít sấy','',79000,6,583,'0','https://bom.so/8CYOVK','0'),(27,'Nho sấy','',120000,6,403,'0','https://bom.so/LQm6tw','0'),(28,'Dâu sấy','',60000,6,895,'0','https://bom.so/U3nFbQ','0'),(29,'Chuối sấy','',32000,6,372,'0','https://bom.so/vxKQY9','0'),(30,'Hạt đậu phộng','',45000,6,341,'1','https://bom.so/b6PSZw','0'),(31,'Lay\'s vị sườn nướng','',10000,2,357,'1','https://bom.so/PbzH4C','0'),(32,'Lay\'s Lemon Chip','',20000,2,224,'0','https://bom.so/C3eJxY','0'),(33,'Lay\'s khoai tây chiên','',15000,2,252,'0','https://bom.so/DOiDNM','0'),(34,'Snack mực','',5000,2,212,'0','https://bom.so/FZ7SH8','0'),(35,'Snack cà chua','',5000,2,123,'0','https://bom.so/2VpwMk','0'),(36,'Snack tôm cay','',5000,2,158,'1','https://bom.so/RNJXIJ','0'),(37,'Snack Hàn Quốc','',25000,2,168,'0','https://bom.so/Q89AQ7','0'),(38,'Bánh Qui Danisa','',71000,3,532,'0','https://bom.so/3gPpOW','0'),(39,'Bánh Qui Ligo','',99000,3,138,'1','https://bom.so/4heihi','0'),(40,'Bánh Qui Cosy','',40000,3,198,'0','https://bom.so/w7y0rS','0'),(41,'Bánh mì bơ sữa','',5000,4,54,'0','https://bom.so/1Zh88u','0'),(42,'Bánh mì nhân chà bông','',15000,4,73,'0','https://bom.so/yifcjL','0'),(43,'Bánh mì sandwich ','',25000,4,25,'0','https://bom.so/dleszh','0'),(44,'Bánh karo','',15000,4,56,'1','https://bom.so/D6KJRq','0'),(45,'Kẹo dẻo Chupa Chups','',12000,5,72,'0','https://bom.so/2trBCv','0'),(46,'Kẹo mút Milkita','',30000,5,15,'1','https://bom.so/04uCg9','0'),(47,'Kẹo socola vị dâu','',21000,5,73,'0','https://bom.so/EVEwx6','0'),(48,'Bánh gạo Nhật Ichi','',40000,5,73,'0','https://bom.so/jLW1Ij','0'),(49,'Kẹo cao ssu','',11000,5,41,'0','https://bom.so/sfYF0Q','1'),(50,'Kẹo Cao Su','Đây là kẹo cao su',11000,5,73,'0','https://bom.so/sfYF0Q','0'),(51,'Bánh Cosy','Bánh Cosy loại mới',75000,3,63,'0','https://pos.nvncdn.net/bfafb3-133431/ps/20230208_SATG1CnH7g3dVnaQ.jpeg','0');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_saved`
--

DROP TABLE IF EXISTS `user_saved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_saved` (
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`prod_id`),
  KEY `fk_prod_saved_idx` (`prod_id`),
  CONSTRAINT `fk_prod_saved` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  CONSTRAINT `fk_user_saved` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_saved`
--

LOCK TABLES `user_saved` WRITE;
/*!40000 ALTER TABLE `user_saved` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_saved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('member','admin') NOT NULL DEFAULT 'member',
  `regis_date` timestamp NULL DEFAULT current_timestamp(),
  `is_active` enum('active','disable','delete') NOT NULL DEFAULT 'active',
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_pk` (`username`),
  UNIQUE KEY `users_pk2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `email`, `username`, `fullname`, `password`, `role`, `regis_date`, `is_active`, `address`) VALUES (1,'test123@email.com','test1','Tran Van Test','zxcxzc','member','2023-11-15 10:07:11','delete',''),(2,'testuser2@email.com','test2','Nguyen Test 23','xzczxcvcx','member','2023-11-16 07:29:40','active',''),(3,'emailtest@gmail.com','usernametest','Trần Ngọc Hiếu','$2y$10$4lgOhIlSjSAO8hZX4BXr3ONsK5nx282JJNBVOtcnMLLZ4IDViCTl2','member','2023-11-16 16:05:48','delete',NULL),(8,'emailtest1@gmail.com','usernametest1','Trần Ngọc Hiếu','$2y$10$9uSq.y8FicX2qNZDEoIE9uAUNazhB8Xj3lfOKhPmU12dOWFK9BjN2','member','2023-11-16 16:40:13','delete',NULL),(9,'hieuxeom.media.1@gmail.com','hieuxeom','Trần Ngọc Hiếu','$2y$10$B7GSSpa7X3gAeZ/dn1AnMOGYnsOQYwPPogpDhnvJDny9tWLh458o.','admin','2023-11-23 07:14:14','active','Test new address'),(14,'check1@gmail.com','hieuxeom1333','Trần Ngọc Hiếu','$2y$10$PityvKWKDuSLrmrhMaGVP.FLtzTgbFEIy3G9bWTHo8PnTh8WJ9GbC','member','2023-11-23 19:21:11','active','89 Chiaroscuro Rd, Portland, USA'),(15,'dvngoc@gmail.com','dvngoc123','Đoàn Văn Ngọc','$2y$10$ctfcvYkSbQIaJhWQ8EfNfOUlD0IkRC.Nm0R732XLhW2lcTavve4mC','member','2023-11-24 10:09:37','disable',NULL),(16,'hieuxeomtest@gmail.com','hieuxeomtest','Trần Ngọc Hiếu','$2y$10$aDLJyjvrKjzwEUyXpkwxp.rax2B2p7EqLMbjCs.LVPtPdydha66/y','member','2023-11-27 15:31:21','active',NULL),(17,'testdisable@gmail.com','testdisable','Trần Ngọc Hiếu','$2y$10$o3Wdw/v14H009sIVG/Sg/.29oM53pYxms4CPCY06iWPEtNFv07aZe','member','2023-11-28 14:38:28','disable',NULL),(18,'tuanbaonguyenduy@gmail.com','nguyenduybao6704','Nguyễn Duy Tuấn Bảo','$2y$10$oR5JS/VE0hNreUU/OaEg5ebiJ5T3rr0cnUgWSRmO6W716T0o2HYdK','member','2023-11-30 05:13:18','active','33 đường số 3, Tân Bình, TPHCH'),(19,'baondtps35498@fpt.edu.vn','anhbaopro564','кутυ∂α¢вιєт','$2y$10$U.kX2LgeBeC1r59TVlQfy.pr04f61W2ZcZKX6pEVf4NeC91HNXjF2','member','2023-11-30 05:15:29','delete',NULL),(20,'ngoc@gmail.com','ngoc1234','Đoàn Ngọc','$2y$10$Ivh5d023dD6dZEc5mi7tB.Pq8p5E.YRysBpBNH/Y.pk8NwysHSbdi','member','2023-11-30 05:21:57','disable','Phạm Văn Chiêu, Gò Vấp'),(21,'test@gmail.com','test12345','test','$2y$10$uQMVmgYjpJaauYXDWhsu3uKK/ncxJbi/JQpcmK8Gw5fiK6NnxeKze','member','2023-11-30 06:02:20','delete',NULL),(22,'hieutnps35703@fpt.edu.vn','trunghieu123','Trần Trung Hiếu','$2y$10$YmkI1JCLuJ5JeBY0mp.i5ONxXnBqV8RByRXwErN8.x.m8XNPZgNKi','member','2023-12-01 09:24:05','active','Quang Trung, Gò Vấp'),(23,'haudvps35557@fpt.edu.vn','dangvanhau','dangvanhau','$2y$10$78.WSuUCnvH/.MJH3Rhpzem2aq8ZhMHRPjROTTlo/Q6m798NPAHlq','member','2023-12-02 03:49:54','active',NULL),(24,'hieutn.bedev@gmail.com','tranvana','Trần Văn A','$2y$10$HD50pUSSEXZEumxmYlwifu6ImT9rxCcHvQVgplKZOHwAEOSOwR43m','member','2023-12-04 10:05:34','active','Test new address'),(25,'ngocdvps35536@fpt.edu.vn','ngoc13','Ngọc Văn','$2y$10$QQrgzxvrrNozDr4qI.NGkOnlNkAfvetDrAQLVvSH09EeGR2NujtpO','admin','2023-12-05 06:04:17','active',NULL),(26,'vvant123@gmail.com','vvant123','Vo Van T','$2y$10$s58nruXCqHdvyZkpHGk1veqzi3EkcrIRdEMGwXsdqAMiYl4CzrQaS','member','2023-12-05 14:38:01','active',NULL),(27,'nobejad103@gyxmz.com','nobejad103','Test TempMail','$2y$10$n8CDIwGhEzIO3uUtIFOpV.cABXZVxQdYw75caomv/aonas0wrskW2','member','2023-12-06 05:45:56','active',NULL),(28,'pmt1906@gmail.com','pmt','pmt','$2y$10$7brj2iP8DTZ.Adom2AKMbuo.pXrFxR8.fbj5A/IJcknp74JpIVvsi','member','2023-12-07 17:19:17','active','gfhfg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violates`
--

DROP TABLE IF EXISTS `violates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `violates` (
  `violate_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `violate_reason` text DEFAULT NULL,
  `violate_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`violate_id`),
  KEY `fk_users_idx` (`user_id`),
  CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violates`
--

LOCK TABLES `violates` WRITE;
/*!40000 ALTER TABLE `violates` DISABLE KEYS */;
INSERT INTO `violates` (`violate_id`, `user_id`, `violate_reason`, `violate_date`) VALUES (2,15,'test','2023-11-27 10:09:24'),(3,20,'','2023-11-30 16:55:13'),(4,20,'','2023-11-30 17:00:49');
/*!40000 ALTER TABLE `violates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vouchers` (
  `voucher_id` varchar(100) NOT NULL,
  `voucher_discount` int(11) NOT NULL,
  `voucher_desc` text DEFAULT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `max_uses` int(11) NOT NULL,
  `remaining_uses` int(11) DEFAULT NULL,
  `type` enum('ship','product') NOT NULL,
  PRIMARY KEY (`voucher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
INSERT INTO `vouchers` (`voucher_id`, `voucher_discount`, `voucher_desc`, `valid_from`, `valid_to`, `max_uses`, `remaining_uses`, `type`) VALUES ('123456',25,'','2023-11-27 17:45:42','2023-12-30 17:45:46',100,100,'product'),('ABCXYZ',100,NULL,'2023-11-27 17:45:04','2023-11-27 17:45:14',100,100,'ship'),('TEST123',30,'','2023-11-28 00:00:00','2023-11-30 00:00:00',100,99,'product'),('VC01',30,'test vc01','2023-12-04 17:20:00','2023-12-04 17:20:00',20,19,'ship');
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'kdjxkbin_pro1014'
--

--
-- Dumping routines for database 'kdjxkbin_pro1014'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-08 16:42:21
