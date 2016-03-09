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
