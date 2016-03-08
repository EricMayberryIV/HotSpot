CREATE DATABASE  IF NOT EXISTS `HOTSPOT` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `HOTSPOT`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: HOTSPOT
-- ------------------------------------------------------
-- Server version 5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `ABOUT`
--

DROP TABLE IF EXISTS `ABOUT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ABOUT` (
  `INDEX` varchar(45) COLLATE utf8_bin NOT NULL,
  `ABOUT_INFO` longtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`INDEX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ABOUT`
--

LOCK TABLES `ABOUT` WRITE;
/*!40000 ALTER TABLE `ABOUT` DISABLE KEYS */;
INSERT INTO `ABOUT` VALUES ('',''),('0','Stop wasting your time chatting with flaky people on your grandma\'s dating app. It\'s time to get out and meet people the way nature intended... While you\'re out Partying!!!!!!!!  Introducing HotSpot. The first mobile social network that connects you with real people who are going to the same places that you are going.');
/*!40000 ALTER TABLE `ABOUT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AUTH`
--

DROP TABLE IF EXISTS `AUTH`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AUTH` (
  `A_ID` int(7) NOT NULL,
  `A_PASSWORD` longtext COLLATE utf8_bin,
  `A_TWITTER` int(11) DEFAULT NULL,
  `A_GOOGLE` int(11) DEFAULT NULL,
  `A_FACEBOOK` bigint(11) DEFAULT NULL,
  `USER_U_ID` int(7) NOT NULL,
  PRIMARY KEY (`A_ID`),
  KEY `fk_AUTH_USER1_idx` (`USER_U_ID`),
  CONSTRAINT `fk_AUTH_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AUTH`
--

LOCK TABLES `AUTH` WRITE;
/*!40000 ALTER TABLE `AUTH` DISABLE KEYS */;
INSERT INTO `AUTH` VALUES (0,'jdbeb8**h3nd',2400303,98765432,283742,0),(1,'kslurune^hd',3434343,12345678,56232423453,1),(2,'nsni&jebndl',44473,898477444,234534345,2),(3,'9890ehnLKHf',9897433,9978554,444333,3),(4,'84802nlsnifb',2147483647,2147483647,6628282892,4),(5,',na,sdna84HH',2147483647,345634673,234522345,5);
/*!40000 ALTER TABLE `AUTH` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DIR_MESS`
--

DROP TABLE IF EXISTS `DIR_MESS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DIR_MESS` (
  `DM_ID` int(7) NOT NULL,
  `DM_FROM_ID` int(7) NOT NULL,
  `DM_TO_ID` int(7) NOT NULL,
  `DM_SUBJECT` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `DM_MESSAGE` longtext COLLATE utf8_bin NOT NULL,
  `DM_DATE_TIME` datetime NOT NULL,
  `USER_U_ID1` int(7) NOT NULL,
  PRIMARY KEY (`DM_ID`),
  KEY `fk_DIR_MESS_USER1_idx1` (`USER_U_ID1`),
  CONSTRAINT `fk_DIR_MESS_USER1` FOREIGN KEY (`USER_U_ID1`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DIR_MESS`
--

LOCK TABLES `DIR_MESS` WRITE;
/*!40000 ALTER TABLE `DIR_MESS` DISABLE KEYS */;
INSERT INTO `DIR_MESS` VALUES (0,2,3,'Hello','Just seeing if you\'re going to the party','2012-12-22 00:00:00',0),(1,0,2,'ADMIN MESSAGE','Please update your password','2016-02-03 05:26:30',0),(2,1,0,'TESTING DMS','Testing DM capability','2016-02-11 04:00:22',0);
/*!40000 ALTER TABLE `DIR_MESS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EVENT`
--

DROP TABLE IF EXISTS `EVENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EVENT` (
  `E_ID` int(11) NOT NULL,
  `E_CREATOR` int(7) NOT NULL,
  `E_TITLE` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_LAT_DEG` int(2) NOT NULL,
  `E_LAT_MIN` int(2) NOT NULL,
  `E_LAT_SEC` int(2) NOT NULL,
  `E_LONG_DEG` int(2) NOT NULL,
  `E_LONG_MIN` int(2) NOT NULL,
  `E_LONG_SEC` tinyint(2) NOT NULL,
  `E_DATE` date NOT NULL,
  `E_TIME_START` time NOT NULL,
  `E_TIME_END` time DEFAULT NULL,
  `E_TYPE` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_DESC` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_PRIVATE` char(1) NOT NULL,
  `E_AGE_GROUP` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_PRICE` float(5,2) DEFAULT NULL,
  `E_FOOD` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_FOOD_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_DRINK` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_DRINK_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_BYO` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_ATTIRE` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_ATTIRE_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_SPONSOR` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_SPONSOR_TITLE` char(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `USER_U_ID` int(7) NOT NULL,
  `LT_FOOD_F_FOOD_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LT_ATTIRE_ATT_ATTIRE_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LT_DRINK_D_DRINK_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LT_AGE_AGE_CODE` int(3) NOT NULL,
  PRIMARY KEY (`E_ID`),
  KEY `fk_EVENT_USER1_idx` (`USER_U_ID`),
  KEY `fk_EVENT_LT_FOOD1_idx` (`LT_FOOD_F_FOOD_TYPE`),
  KEY `fk_EVENT_LT_ATTIRE1_idx` (`LT_ATTIRE_ATT_ATTIRE_TYPE`),
  KEY `fk_EVENT_LT_DRINK1_idx` (`LT_DRINK_D_DRINK_TYPE`),
  KEY `fk_EVENT_LT_AGE1_idx` (`LT_AGE_AGE_CODE`),
  CONSTRAINT `fk_EVENT_LT_AGE1` FOREIGN KEY (`LT_AGE_AGE_CODE`) REFERENCES `LT_AGE` (`AGE_CODE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENT_LT_ATTIRE1` FOREIGN KEY (`LT_ATTIRE_ATT_ATTIRE_TYPE`) REFERENCES `LT_ATTIRE` (`ATT_ATTIRE_TYPE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENT_LT_DRINK1` FOREIGN KEY (`LT_DRINK_D_DRINK_TYPE`) REFERENCES `LT_DRINK` (`D_DRINK_TYPE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENT_LT_FOOD1` FOREIGN KEY (`LT_FOOD_F_FOOD_TYPE`) REFERENCES `LT_FOOD` (`F_FOOD_TYPE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENT_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EVENT`
--

LOCK TABLES `EVENT` WRITE;
/*!40000 ALTER TABLE `EVENT` DISABLE KEYS */;
INSERT INTO `EVENT` VALUES (0,2,'Party at my place',30,25,14,84,17,44,'2016-02-18','20:00:00','23:59:59','House Party','Come Party at my house. We don\'t have to have a reason to party!!!','Y','10',0.00,'Y','BRZ','Y','T','Y','Y','C','Y','PEPSI',2,'BRZ','C','T',10),(1,3,'Party',30,25,14,84,17,44,'2016-01-14','16:00:00','22:00:00','Party','Come to the party','N','10',0.00,'Y','BUR','Y','T','Y','Y','C','Y','Emily',3,'BUR','C','T',10);
/*!40000 ALTER TABLE `EVENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FEEDBACK`
--

DROP TABLE IF EXISTS `FEEDBACK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FEEDBACK` (
  `FB_ID` int(11) NOT NULL,
  `FB_FROM_ID` int(7) NOT NULL,
  `FB_EVENT_ID` int(11) NOT NULL,
  `FB_MESS` longtext COLLATE utf8_bin NOT NULL,
  `USER_U_ID` int(7) NOT NULL,
  `EVENT_E_ID` int(11) NOT NULL,
  PRIMARY KEY (`FB_ID`),
  KEY `fk_FEEDBACK_USER1_idx` (`USER_U_ID`),
  KEY `fk_FEEDBACK_EVENT1_idx` (`EVENT_E_ID`),
  CONSTRAINT `fk_FEEDBACK_EVENT1` FOREIGN KEY (`EVENT_E_ID`) REFERENCES `EVENT` (`E_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FEEDBACK_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FEEDBACK`
--

LOCK TABLES `FEEDBACK` WRITE;
/*!40000 ALTER TABLE `FEEDBACK` DISABLE KEYS */;
INSERT INTO `FEEDBACK` VALUES (0,3,0,'Loved the party!',3,0),(1,2,1,'Hope you throw more parties, I had a blast.',2,1);
/*!40000 ALTER TABLE `FEEDBACK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GROUP`
--

DROP TABLE IF EXISTS `GROUP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GROUP` (
  `GR_ID` int(11) NOT NULL,
  `GR_CREATOR` int(7) NOT NULL,
  `GR_MEMBER` int(7) NOT NULL,
  `GR_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `USER_U_ID` int(7) NOT NULL,
  PRIMARY KEY (`GR_ID`),
  KEY `fk_GROUP_USER1_idx` (`USER_U_ID`),
  CONSTRAINT `fk_GROUP_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GROUP`
--

LOCK TABLES `GROUP` WRITE;
/*!40000 ALTER TABLE `GROUP` DISABLE KEYS */;
INSERT INTO `GROUP` VALUES (0,2,3,'Red',2),(1,2,4,'Red',2),(2,2,5,'Red',2),(3,5,2,'DummyCrew',5),(4,5,3,'DummyCrew',5);
/*!40000 ALTER TABLE `GROUP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `INVITE`
--

DROP TABLE IF EXISTS `INVITE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `INVITE` (
  `IN_ID` int(11) NOT NULL,
  `IN_EVENT` int(11) NOT NULL,
  `IN_INVITEE` int(7) NOT NULL,
  `IN_GOING` char(1) COLLATE utf8_bin NOT NULL,
  `IN_ARRIVED` datetime DEFAULT NULL,
  `EVENT_E_ID` int(11) NOT NULL,
  `USER_U_ID` int(7) NOT NULL,
  PRIMARY KEY (`IN_ID`),
  KEY `fk_INVITE_EVENT1_idx` (`EVENT_E_ID`),
  KEY `fk_INVITE_USER1_idx` (`USER_U_ID`),
  CONSTRAINT `fk_INVITE_EVENT1` FOREIGN KEY (`EVENT_E_ID`) REFERENCES `EVENT` (`E_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_INVITE_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `INVITE`
--

LOCK TABLES `INVITE` WRITE;
/*!40000 ALTER TABLE `INVITE` DISABLE KEYS */;
INSERT INTO `INVITE` VALUES (0,0,3,'Y',NULL,0,3),(1,0,4,'Y',NULL,0,4),(2,0,5,'Y',NULL,0,5);
/*!40000 ALTER TABLE `INVITE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LT_AGE`
--

DROP TABLE IF EXISTS `LT_AGE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LT_AGE` (
  `AGE_CODE` int(3) NOT NULL,
  `AGE_GROUP` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`AGE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LT_AGE`
--

LOCK TABLES `LT_AGE` WRITE;
/*!40000 ALTER TABLE `LT_AGE` DISABLE KEYS */;
INSERT INTO `LT_AGE` VALUES (2,'20\'s'),(3,'30\'s'),(4,'40\'s'),(5,'50\'s'),(6,'60\'s'),(7,'70\'s'),(8,'80\'s'),(9,'90\'s +'),(10,'College'),(11,'Parents'),(12,'13 - 19');
/*!40000 ALTER TABLE `LT_AGE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LT_ATTIRE`
--

DROP TABLE IF EXISTS `LT_ATTIRE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LT_ATTIRE` (
  `ATT_ATTIRE_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `ATT_ATTIRE` varchar(255) COLLATE utf8_bin NOT NULL,
  `ATT_COMMENT` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ATT_ATTIRE_TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LT_ATTIRE`
--

LOCK TABLES `LT_ATTIRE` WRITE;
/*!40000 ALTER TABLE `LT_ATTIRE` DISABLE KEYS */;
INSERT INTO `LT_ATTIRE` VALUES ('B','BLACK TIE EVENT',NULL),('BL','BLACK',NULL),('BW','BEACH WEAR',NULL),('C','CASUAL',NULL),('S','SUIT/TIE',NULL),('WH','ALL WHITE',NULL);
/*!40000 ALTER TABLE `LT_ATTIRE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LT_DRINK`
--

DROP TABLE IF EXISTS `LT_DRINK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LT_DRINK` (
  `D_DRINK_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `D_DRINK` varchar(255) COLLATE utf8_bin NOT NULL,
  `D_COMMENT` longtext COLLATE utf8_bin,
  PRIMARY KEY (`D_DRINK_TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LT_DRINK`
--

LOCK TABLES `LT_DRINK` WRITE;
/*!40000 ALTER TABLE `LT_DRINK` DISABLE KEYS */;
INSERT INTO `LT_DRINK` VALUES ('A','ALCOHOLIC BEVERAGES',''),('J','JUICE',''),('S','SODA',''),('T','TEA',''),('W','WATER','');
/*!40000 ALTER TABLE `LT_DRINK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LT_FOOD`
--

DROP TABLE IF EXISTS `LT_FOOD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LT_FOOD` (
  `F_FOOD_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `F_FOOD` varchar(255) COLLATE utf8_bin NOT NULL,
  `F_COMMENT` longtext COLLATE utf8_bin,
  PRIMARY KEY (`F_FOOD_TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LT_FOOD`
--

LOCK TABLES `LT_FOOD` WRITE;
/*!40000 ALTER TABLE `LT_FOOD` DISABLE KEYS */;
INSERT INTO `LT_FOOD` VALUES ('AFG','AFGHAN',''),('AFR','AFRICAN',''),('AME','AMERICAN',''),('ARA','ARABIAN',''),('ARG','ARGENTINE',''),('ARM','ARMENIAN',''),('ASI','ASIAN',''),('AU','AUSTRALIAN',''),('AUS','AUSTRIAN',''),('BAN','BANGLADESHI',''),('BAS','BASQUE',''),('BBQ','BARBEQUE',''),('BEL','BELGIAN',''),('BRA','BRASSERIES',''),('BRI','BRITISH',''),('BRM','BURMESE',''),('BRZ','BRAZILIAN',''),('BUF','BUFFET',''),('BUR','BURGERS',''),('CAJ','CAJUN',''),('CAL','CALABRIAN',''),('CAM','CAMBODIAN',''),('CAN','CANTONESE',''),('CAR','CARIBBEAN',''),('CAT','CATALAN',''),('CHI','CHICKEN',''),('CHN','CHINESE',''),('COL','COLOMBIAN',''),('COM','COMFORT FOOD',''),('CRE','CREOLE',''),('CRP','CREPES',''),('CUB','CUBAN',''),('CZE','CZECH',''),('DEL','DELI',''),('DIM','DIM SUM',''),('DOM','DOMINICAN',''),('EGY','EGYPTIAN',''),('FAL','FALAFEL',''),('FIL','FILIPINO',''),('FIS','FISH',''),('FON','FONDUE',''),('FRE','FRENCH',''),('GAS','GASTROPUB',''),('GER','GERMAN',''),('GLU','GLUTEN-FREE',''),('GRE','GREEK',''),('HAI','HAITIAN',''),('HAL','HALAL',''),('HAW','HAWAIIAN',''),('HIM','HIMALAYAN',''),('HUN','HUNGARIAN',''),('IBE','IBERIAN',''),('IND','INDIAN',''),('IRA','IRANIAN',''),('IRI','IRISH',''),('ITA','ITALIAN',''),('JAP','JAPANESE',''),('KOR','KOREAN',''),('KOS','KOSHER',''),('LAO','LAOTIAN',''),('LAT','LATIN AMERICAN',''),('LEB','LEBANESE',''),('MAL','MALAYSIAN',''),('MED','MEDITERRANEAN',''),('MEX','MEXICAN',''),('MID','MIDDLE EAST',''),('MON','MONGOLIAN',''),('MOR','MOROCCAN',''),('NEP','NEPALESE',''),('PAK','PAKISTANI',''),('PER','PERSIAN',''),('PIZ','PIZZA',''),('POL','POLISH',''),('PRV','PERUVIAN','');
/*!40000 ALTER TABLE `LT_FOOD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RT_EVENT`
--

DROP TABLE IF EXISTS `RT_EVENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RT_EVENT` (
  `RT_ID` int(11) NOT NULL,
  `RT_FROM_ID` int(7) NOT NULL,
  `RT_EVENT` int(11) NOT NULL,
  `RT_MEDIA` longtext COLLATE utf8_bin,
  `RT_COMMENT` longtext COLLATE utf8_bin,
  `RT_STARS` int(1) DEFAULT NULL,
  `EVENT_E_ID` int(11) NOT NULL,
  PRIMARY KEY (`RT_ID`),
  KEY `fk_RT_EVENT_EVENT1_idx` (`EVENT_E_ID`),
  CONSTRAINT `fk_RT_EVENT_EVENT1` FOREIGN KEY (`EVENT_E_ID`) REFERENCES `EVENT` (`E_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RT_EVENT`
--

LOCK TABLES `RT_EVENT` WRITE;
/*!40000 ALTER TABLE `RT_EVENT` DISABLE KEYS */;
INSERT INTO `RT_EVENT` VALUES (0,3,0,'','You guys are missing it!!!!',4,0);
/*!40000 ALTER TABLE `RT_EVENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `U_ID` int(7) NOT NULL,
  `U_ACCT_TYPE` char(1) NOT NULL,
  `U_USERNAME` char(255) NOT NULL,
  `U_F_NAME` char(255) NOT NULL,
  `U_L_NAME` char(255) NOT NULL,
  `U_DOB` date NOT NULL,
  `U_HOME_LAT_DEG` int(2) NOT NULL,
  `U_HOME_LAT_MIN` int(2) NOT NULL,
  `U_HOME_LAT_SEC` int(2) NOT NULL,
  `U_HOME_LONG_DEG` int(2) NOT NULL,
  `U_HOME_LONG_MIN` int(2) NOT NULL,
  `U_HOME_LONG_SEC` int(2) NOT NULL,
  `U_SCHOOL` char(255) DEFAULT NULL,
  `U_PHONE` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`U_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (0,'A','ADMIN','ADMIN','ADMIN','2016-01-01',30,26,26,84,18,51,'FAMU',8505551111),(1,'A','ADMIN1','ADMIN1','ADMIN1','2016-01-01',30,27,43,84,18,41,'FAMU',8505551222),(2,'L','JoeyBlast','Joseph','Williams','1997-06-22',30,25,14,84,17,44,'FAMU',8505551111),(3,'L','RokStr','David','Simmons','1996-12-13',30,25,10,84,16,59,'FAMU',8505552222),(4,'L','LizzardMan','Cory','Davis','1996-09-29',30,27,26,84,19,51,'FSU',8505554321),(5,'L','SouthernSweetie','Rebecca','Jones','1997-04-03',30,27,22,84,16,19,'FSU',8505551234);
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-11  9:49:30
