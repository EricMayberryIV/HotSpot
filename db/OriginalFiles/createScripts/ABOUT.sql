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
