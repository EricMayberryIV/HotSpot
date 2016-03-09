--
-- Table structure for table `INVITE`
--

DROP TABLE IF EXISTS `INVITE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `INVITE` (
  `IN_ID` int(11) NOT NULL,
  `IN_EVENT` int(11) NOT NULL,
  `IN_INVITEE` int(7) NOT NULL,
  `IN_GOING` char(1) COLLATE utf8_bin NOT NULL,
  `IN_ARRIVED` datetime DEFAULT NULL,
  `EVENT_E_ID` int(11) NOT NULL,
  `USER_U_ID` int(7) NOT NULL,
  PRIMARY KEY (`IN_ID`),
  KEY `fk_INVITE_EVENT1_idx` (`EVENT_E_ID`),
  KEY `fk_INVITE_USER1_idx` (`USER_U_ID`),
  CONSTRAINT `fk_INVITE_EVENT1` FOREIGN KEY (`EVENT_E_ID`) REFERENCES `EVENT` (`E_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_INVITE_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;
