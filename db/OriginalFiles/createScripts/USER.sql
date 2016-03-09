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
