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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatmessage`
--

LOCK TABLES `chatmessage` WRITE;
/*!40000 ALTER TABLE `chatmessage` DISABLE KEYS */;
INSERT INTO `chatmessage` VALUES (1,'gfhfgh','1398946807','2','3'),(2,'dsfsdgsg','1111','3','2'),(3,'fdgdfgg','1398979344','2','3'),(4,'s','1398986831','2','3'),(5,'e','1398986941','2','3'),(6,'ddsadfsf','1398986974','2','3'),(7,'ww','1398987050','2','3'),(8,'ฟฟฟ','1398987066','2','3'),(9,'ก','1398987301','2','3'),(10,'ฟฟฟฟฟฟฟฟฟ','1398987360','2','3'),(11,'ก','1398987383','2','3'),(12,'assss','1398987443','2','3'),(13,'d','1398987461','2','3'),(14,'gg','1398987689','2','3'),(15,'eeeeeeeeeeee','1398987735','2','3'),(16,'d','1398987739','2','3'),(17,'ssss','1398987786','3','2'),(18,'qwqw','1398987792','3','2'),(19,'555','1399016596','2','3'),(20,'k','1399117730','2','4'),(21,'s','1399117791','2','5'),(22,'sdsdsdsd','1399206351','2','3');
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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (13,'1382207283-image-o.jpg','000010','1','crame'),(14,'1396331646-1395941619-o.gif','000010','1','cussy'),(15,'1396331215-o.gif','000010','1','drive'),(16,'1379511597-anigif-o.gif','000010','1','grom'),(17,'1381916925-tumblrlzva-o.gif','000010','1','img'),(18,'537164_652805004764938_338957171_n.jpg','000011','1','crame'),(19,'anYbOXo_700b_v1.jpg','000011','1','cussy'),(20,'1396331215-o.gif','000011','1','drive'),(21,'1235294113_0.93804500.gif','000011','1','grom'),(22,'ATT00004.jpg','000011','1','img'),(23,'ATT00005.jpg','000011','1','img'),(24,'ATT00008.jpg','000011','1','img'),(34,'1381916925-tumblrlzva-o.gif','000012','1','crame'),(35,'Blue-sea-and-sky-1366x768.jpg','000012','1','cussy'),(36,'anYbOXo_700b_v1.jpg','000012','1','drive'),(37,'1379511597-anigif-o.gif','000012','1','grom'),(38,'colorful_flower-1366x768.jpg','000012','1','img'),(39,'cxlscreenshotnehoon10.jpg','000012','1','img'),(40,'desktop72020102nd.png','000012','1','img'),(41,'Blue-sea-and-sky-1366x768.jpg','000013','1','crame'),(42,'Hawkeye-7.jpg','000013','1','drive'),(43,'beautiful-beach-wallpaper-1366x768.jpg','000013','1','grom'),(44,'io72dg0i.jpg','000013','1','img'),(45,'2895_4cfc.gif','000011','2','img'),(46,'anYbOXo_700b_v1.jpg','000011','2','img'),(47,'1379511597-anigif-o.gif','000014','1','crame'),(48,'1284512545726.gif','000014','1','cussy'),(49,'1396331646-1395941619-o.gif','000014','1','grom'),(50,'C107554-5.gif','000015','1','crame'),(51,'Blue_Linckia_Sea_Stars_Tonga_1366x768.jpg','000015','1','cussy'),(52,'big-ocean-wave-wallpaper-1366x768.jpg','000015','1','drive'),(53,'back.jpg','000015','1','grom'),(54,'desktop72020102nd.png','000015','1','img'),(55,'long_cat1.gif','000016','1','crame'),(56,'n2dTdP.gif','000016','1','cussy'),(57,'Megaman_retro_3D_by_cezkid.gif','000016','1','drive'),(58,'Four_Seasons_by_mariusp.jpg','000016','1','grom'),(59,'Retro_Mario_in_3D_flavor_by_cezkid.gif','000016','1','img'),(60,'tumblr_mf11v5roIl1r7tibko1_400.gif','000018','1','crame'),(61,'U9605201-58.gif','000018','1','cussy'),(62,'U9604550-15.gif','000018','1','drive'),(63,'spectrum_of_the_sky_hdtv_1080p-HD.jpg','000018','1','grom'),(64,'X9390959-7.gif','000018','1','img'),(65,'X9519701-26.jpg','000018','1','img'),(66,'2895_4cfc.gif','000011','2','img'),(67,'X9757693-1.jpg','000011','2','img'),(68,'anYbOXo_700b_v1.jpg','000011','2','img'),(69,'2895_4cfc.gif','000011','3','img'),(70,'X9757693-1.jpg','000011','3','img'),(71,'Y9528496-4.jpg','000011','3','img'),(72,'anYbOXo_700b_v1.jpg','000011','3','img'),(73,'2895_4cfc.gif','000011',NULL,'img'),(74,'X9757693-1.jpg','000011',NULL,'img'),(75,'Y9528496-4.jpg','000011',NULL,'img'),(76,'anYbOXo_700b_v1.jpg','000011',NULL,'img'),(77,'551612_156374461159808_1621853153_n.jpg','000019','1','crame'),(78,'1378576889-anigif-o.gif','000019','1','cussy'),(79,'1396331646-1395941619-o.gif','000019','1','drive'),(80,'6Dt0hjb.gif','000019','1','grom'),(81,'6Dt0hjb.gif','000019','1','img'),(82,'1381916925-tumblrlzva-o.gif','000019','3','img'),(83,'943078_517973188250702_682183966_n.jpg','000019','3','img');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (10,'000010','dsfdsfsd','sdfsdf',NULL,NULL,'2',NULL,NULL,1398271295,'1',1398271295,'N',NULL),(11,'000011','ee','ee','wwwwwwwwwwwwwwwww','dddddddd','2','2','2',1398405597,'3',1399156876,'Y',NULL),(12,'000012','1234','dsfsdfsdff',NULL,NULL,'2',NULL,NULL,1398771711,'1',1398771711,'N',NULL),(13,'000013','กด1234','sdsad',NULL,NULL,'2',NULL,NULL,1398776730,'1',1398776730,'N',NULL),(14,'000014','ttt','ttt',NULL,NULL,'2',NULL,NULL,1399153832,'1',1399153832,'N',NULL),(15,'000015','ฟฟ2222','dfdsfsdf',NULL,NULL,'3',NULL,NULL,1399153972,'1',1399153972,'N',NULL),(16,'000016','ke3333','3333',NULL,NULL,'3',NULL,NULL,1399154108,'1',1399154108,'N',NULL),(17,'000017','rr','rr',NULL,NULL,'3',NULL,NULL,1399154144,'1',1399191650,'Y',NULL),(18,'000018','ttt','ttt',NULL,NULL,'3',NULL,NULL,1399154289,'1',1399154289,'Y',NULL),(19,'000019','กก1234','kdfgmkljdsfgnmf;sd,mbvnfmdklcmvdfv','fdkdskjlnfkmsdvk',NULL,'2','3',NULL,1399206104,'2',1399206212,'Y',NULL);
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

-- Dump completed on 2014-05-04 19:26:55
