-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: sso
-- ------------------------------------------------------
-- Server version	5.1.73-log

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
-- Table structure for table `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `tags` char(15) NOT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `public` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmark`
--

LOCK TABLES `bookmark` WRITE;
/*!40000 ALTER TABLE `bookmark` DISABLE KEYS */;
INSERT INTO `bookmark` VALUES (1,0,'','','','',0,1,1439807947,1439807947),(2,0,'','','','',0,1,1439807977,1439807977),(3,0,'','','','',0,1,1439808254,1439808254),(4,2,'hello','www.emao.com','fun','good',1,1,1439808329,1439808329),(5,2,'hello','www.emao.com','fun','good',1,1,1439808369,1439808369),(6,2,'alert(\\\'ookk\\\')','www.emao.com','fun','good',1,1,1439808449,1439808449);
/*!40000 ALTER TABLE `bookmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_feedback`
--

DROP TABLE IF EXISTS `common_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL,
  `useragent` varchar(200) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `ip` int(10) unsigned NOT NULL,
  `comment` varchar(300) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_feedback`
--

LOCK TABLES `common_feedback` WRITE;
/*!40000 ALTER TABLE `common_feedback` DISABLE KEYS */;
INSERT INTO `common_feedback` VALUES (1,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'woshini',1),(2,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'woshini',1),(3,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'woshini',0),(4,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'woshini',1),(5,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'woshini',0),(6,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'ninini',0),(7,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'alert(7788)',0),(8,'shiyili','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36',0,192168,'alert(7788)',0);
/*!40000 ALTER TABLE `common_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_member`
--

DROP TABLE IF EXISTS `common_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `passwd` char(32) NOT NULL,
  `regtime` int(10) unsigned NOT NULL,
  `ip` char(15) NOT NULL,
  `logintime` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_member`
--

LOCK TABLES `common_member` WRITE;
/*!40000 ALTER TABLE `common_member` DISABLE KEYS */;
INSERT INTO `common_member` VALUES (1,'shiyili@eyou.com',NULL,'112233',1438534344,'192.168.2.10',1438534344,1),(2,'shiyili@eyou.com',NULL,'112233',1438534345,'192.168.2.10',1438534345,1),(3,'shiyili@mail.com',NULL,'admin9999',1438576074,'192.168.20.223',1438576074,4),(4,'shiyili@eyou.com',NULL,'4321',1438685153,'192.168.20.223',1438685153,1),(5,'shiyili@eyou.com',NULL,'4321',1438685172,'192.168.20.223',1438685172,1),(6,'shiyili3@eyou.com',NULL,'4321',1438685307,'192.168.20.223',1438685307,1),(7,'shiyili4@eyou.com',NULL,'4321',1438685373,'192.168.20.223',1438685373,1),(8,'wangming@kaixin.com',NULL,'ganniniang',1438745804,'192.168.20.223',1438745804,1);
/*!40000 ALTER TABLE `common_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_tags`
--

DROP TABLE IF EXISTS `common_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` char(15) NOT NULL,
  `father` varchar(50) NOT NULL,
  `reference` int(10) unsigned NOT NULL COMMENT '引用次数',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_tags`
--

LOCK TABLES `common_tags` WRITE;
/*!40000 ALTER TABLE `common_tags` DISABLE KEYS */;
INSERT INTO `common_tags` VALUES (1,'shiyili@eyou.co','333',1,1439483667),(2,'333','shiyili@eyou.com',3,1439483812),(3,'333','shiyili@eyou.com',3,1439484082),(4,'333','shiyili@eyou.com',3,1439484175),(5,'33388888','shiyili555@eyou.com',3,1439484698),(6,'2222','shiyili555@eyou.com',15,1439486320),(7,'22224','shiyili555@eyou.com',12,1439794167),(8,'222245','shiyili555@eyou.com',4,1439795264),(9,'222246','shiyili555@eyou.com',6,1439795416),(10,'222247','shiyili555@eyou.com',2,1439795516);
/*!40000 ALTER TABLE `common_tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-18 10:00:48
