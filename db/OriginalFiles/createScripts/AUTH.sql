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
