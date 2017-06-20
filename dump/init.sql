-- MySQL dump 10.13  Distrib 5.6.32, for Linux (x86_64)
--
-- Host: localhost    Database: onestyle
-- ------------------------------------------------------
-- Server version	5.6.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `groom_name` varchar(255) NOT NULL COMMENT '新郎',
  `bride_name` varchar(255) NOT NULL COMMENT '新婦',
  `radio_venue` int(2) NOT NULL DEFAULT 0 COMMENT 'サンプル可否',
  `tel_no` varchar(20) NOT NULL COMMENT '電話番号',
  `email` varchar(150) NOT NULL COMMENT 'メールアドレス',
  `zip1` varchar(3) DEFAULT NULL COMMENT '郵便番号1',
  `zip2` varchar(4) DEFAULT NULL COMMENT '郵便番号2',
  `prefecture` varchar(255) DEFAULT NULL COMMENT '都道府県',
  `address` varchar(255) DEFAULT NULL COMMENT '住所',
  `created_at` datetime NOT NULL COMMENT '登録日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='問い合わせテーブル';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'aaabbcc','ccccc','可','09012343333','abc@ab.com',NULL,NULL,NULL,NULL,'2017-06-19 14:12:18'),(2,'aaabbcc','ccccc','可','09012343333','abc@ab.com',NULL,NULL,NULL,NULL,'2017-06-19 14:13:27'),(3,'aaabbcc','ccccc','可','09012343333','abc@ab.com',NULL,NULL,NULL,NULL,'2017-06-19 14:25:07');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-19 15:27:00
