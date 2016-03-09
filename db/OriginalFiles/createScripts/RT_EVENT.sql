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
