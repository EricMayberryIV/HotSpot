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
