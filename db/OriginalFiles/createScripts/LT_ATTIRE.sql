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
