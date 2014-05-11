-- MySQL dump 10.13  Distrib 5.6.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pi
-- ------------------------------------------------------
-- Server version	5.6.15-log

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
-- Table structure for table `chatmessage`
--

DROP TABLE IF EXISTS `chatmessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatmessage` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `message` longtext NOT NULL,
  `date` tinytext NOT NULL,
  `sender` tinytext NOT NULL,
  `receiver` tinytext NOT NULL,
  `viewed` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatmessage`
--

LOCK TABLES `chatmessage` WRITE;
/*!40000 ALTER TABLE `chatmessage` DISABLE KEYS */;
INSERT INTO `chatmessage` VALUES (1,'สวัสดี','1399366176','2','3','Y'),(2,'กำ\n','1399366224','3','2','Y'),(3,'555','1399366237','2','3','Y'),(4,'กหดกิดกเดกเ','1399366248','3','2','Y'),(5,'ss','1399369936','3','2','Y'),(6,'ddd\n','1399370043','3','2','Y'),(7,'q','1399370984','3','2','Y'),(8,'tt','1399371088','2','3','Y'),(9,'f','1399371252','2','3','Y'),(10,'f','1399371324','3','2','Y'),(11,'d','1399371357','3','2','Y'),(12,'a','1399371694','3','2','Y'),(13,'1','1399372818','2','3','Y'),(14,'s','1399375348','3','2','Y'),(15,'rr','1399375539','3','2','Y'),(16,'ee','1399375675','3','2','Y'),(17,'k','1399375809','3','2','Y'),(18,'l','1399375827','3','2','Y'),(19,'hh','1399375867','3','2','Y'),(20,'g','1399375909','3','2','Y'),(21,'h','1399375981','3','2','Y'),(22,'h','1399376052','3','2','Y'),(23,'g','1399377367','3','2','Y'),(24,'k','1399377419','3','2','Y'),(25,'h','1399377719','3','2','Y'),(26,'g','1399377787','3','2','Y'),(27,'s','1399377856','2','3','Y'),(28,'h','1399377921','2','3','Y'),(29,'h','1399377927','3','2','Y'),(30,'i','1399378003','2','3','Y'),(31,';;','1399378010','3','2','Y'),(32,'ee','1399378017','2','3','Y'),(33,'f','1399378040','2','3','Y'),(34,'f','1399378044','3','2','Y'),(35,'f','1399378051','2','3','Y'),(36,'f','1399378064','3','2','Y'),(37,'d','1399378171','3','2','Y'),(38,'f','1399378524','3','2','Y'),(39,'e','1399378537','3','2','Y'),(40,'e','1399378548','2','3','Y'),(41,'l','1399378619','3','2','Y'),(42,'l','1399378630','3','2','Y'),(43,';','1399378643','2','3','Y'),(44,'a','1399379136','3','2','Y'),(45,'h','1399379349','3','2','Y'),(46,'d','1399379833','3','2','Y'),(47,'d','1399379838','2','3','Y'),(48,'dsfs','1399379844','3','2','Y'),(49,'dsfdsf','1399379845','2','3','Y'),(50,'d','1399379849','3','2','Y'),(51,'qqqq','1399379851','2','3','Y'),(52,'สวัสดีครับ\n','1399429379','2','3','Y'),(53,'ครับ','1399429407','3','2','Y'),(54,'ssdsd','1399461227','3','2','Y');
/*!40000 ALTER TABLE `chatmessage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(50) DEFAULT NULL,
  `topic_id` tinytext,
  `status` enum('1','2','3') DEFAULT NULL,
  `type` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (1,'Scan0017.jpg','000001','1','crame'),(2,'Scan0017.jpg','000001','1','cussy'),(3,'Scan0005.jpg','000001','1','drive'),(4,'Scan0017.jpg','000001','1','grom'),(5,'S103715947[1].jpg','000001','1','img'),(6,'S103715948[1].jpg','000001','1','img'),(7,'S103715950[1].jpg','000001','1','img'),(8,'S103715953[1].jpg','000001','1','img'),(9,'S103715954[1].jpg','000001','1','img'),(10,'S103715957[1].jpg','000001','1','img'),(11,'S103715958[1].jpg','000001','1','img'),(12,'IMG_3666_resize.JPG','000001','2','img'),(13,'IMG_3667_resize - Copy.JPG','000001','2','img'),(14,'IMG_3667_resize.JPG','000001','2','img'),(15,'IMG_3668_resize - Copy.JPG','000001','2','img'),(16,'IMG_3668_resize.JPG','000001','2','img'),(17,'1379511597-anigif-o.gif','000007','1','crame'),(18,'1396331215-o.gif','000007','1','cussy'),(19,'1382207283-image-o.jpg','000007','1','drive'),(20,'1382207283-image-o.jpg','000007','1','img'),(21,'1396331646-1395941619-o.gif','000007','1','img'),(22,'anYbOXo_700b_v1.jpg','000007','1','img'),(23,'back.jpg','000007','2','img'),(24,'beautiful-beach-wallpaper-1366x768.jpg','000007','2','img');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topicID` tinytext,
  `header` tinytext,
  `detail` longtext,
  `note` longtext,
  `note2` longtext,
  `note3` longtext,
  `user_id` tinytext,
  `user_id2` tinytext,
  `user_id3` tinytext,
  `date` int(50) DEFAULT NULL,
  `status` enum('1','2','3') DEFAULT '1',
  `last_update` int(50) DEFAULT NULL,
  `verify` enum('Y','N') DEFAULT 'N',
  `edit_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'000001','กค1324','ซีวิคดำ','ทำให้เสร็จภายในวันที 25 มิ.ย.','กำลังซ่อม 2','','2','2',NULL,1399427909,'2',1399428827,'N',NULL),(2,'000002','พพ4533','ฮอนด้า','ทำให้เสร็จภายในวันที 25 มิ.ย.',NULL,NULL,'2',NULL,NULL,1399427909,'1',1399427909,'N',NULL),(3,'000003','คค1123','แจซ','ทำให้เสร็จภายในวันที 25 มิ.ย.',NULL,NULL,'2',NULL,NULL,1399427909,'1',1399427909,'Y',NULL),(4,'000004','รด1234','ซิตี้','ทำให้เสร็จภายในวันที 25 มิ.ย.',NULL,NULL,'2',NULL,NULL,1399427909,'1',1399427909,'N',NULL),(5,'000005','ออ2233','ซีวิค','ทำให้เสร็จภายในวันที 25 มิ.ย.',NULL,NULL,'2',NULL,NULL,1399427909,'1',1399427909,'N',NULL),(6,'000006','ออ2233','ซีวิค','ทำให้เสร็จภายในวันที 25 มิ.ย.',NULL,NULL,'2',NULL,NULL,1399427909,'1',1399427909,'Y',NULL),(7,'000007','หก1234','sss','sss','dddd',NULL,'3','2',NULL,1399461161,'2',1399461193,'N',NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` tinytext,
  `password` text,
  `class` enum('user','admin','owner') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'rb04','1','owner'),(3,'epic','1','user'),(4,'qq','qq','user'),(5,'atm','1','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-11 15:58:30
