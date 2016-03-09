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
