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
