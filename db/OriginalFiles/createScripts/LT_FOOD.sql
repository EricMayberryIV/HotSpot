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
