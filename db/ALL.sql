-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2016 at 07:29 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-05:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HOTSPOT`
--
CREATE DATABASE IF NOT EXISTS `HOTSPOT` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `HOTSPOT`;

-- --------------------------------------------------------

--
-- Table structure for table `ABOUT`
--

DROP TABLE IF EXISTS `ABOUT`;
CREATE TABLE `ABOUT` (
  `INDEX` varchar(45) COLLATE utf8_bin NOT NULL,
  `ABOUT_INFO` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ABOUT`
--

INSERT INTO `ABOUT` (`INDEX`, `ABOUT_INFO`) VALUES
('0', 'Stop wasting your time chatting with flaky people on your grandma''s dating app. It''s time to get out and meet people the way nature intended... While you''re out Partying!!!!!!!!  Introducing HOTSPOT. The first mobile social network that connects you with real people who are going to the same places that you are going.');

-- --------------------------------------------------------

--
-- Table structure for table `AUTH`
--

DROP TABLE IF EXISTS `AUTH`;
CREATE TABLE `AUTH` (
  `A_ID` int(7) NOT NULL,
  `A_PASSWORD` longtext COLLATE utf8_bin,
  `A_TWITTER` int(11) DEFAULT NULL,
  `A_GOOGLE` int(11) DEFAULT NULL,
  `A_FACEBOOK` bigint(11) DEFAULT NULL,
  `USER_U_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `AUTH`
--

INSERT INTO `AUTH` (`A_ID`, `A_PASSWORD`, `A_TWITTER`, `A_GOOGLE`, `A_FACEBOOK`, `USER_U_ID`) VALUES
(0, 'jdbeb8**h3nd', 2400303, 98765432, 283742, 0),
(1, 'kslurune^hd', 3434343, 12345678, 56232423453, 1),
(2, 'nsni&jebndl', 44473, 898477444, 234534345, 2),
(3, '9890ehnLKHf', 9897433, 9978554, 444333, 3),
(4, '84802nlsnifb', 2147483647, 2147483647, 6628282892, 4),
(5, ',na,sdna84HH', 2147483647, 345634673, 234522345, 5);

-- --------------------------------------------------------

--
-- Table structure for table `DIR_MESS`
--

DROP TABLE IF EXISTS `DIR_MESS`;
CREATE TABLE `DIR_MESS` (
  `DM_ID` int(7) NOT NULL,
  `DM_FROM_ID` int(7) NOT NULL,
  `DM_TO_ID` int(7) NOT NULL,
  `DM_SUBJECT` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `DM_MESSAGE` longtext COLLATE utf8_bin NOT NULL,
  `DM_DATE_TIME` datetime NOT NULL,
  `USER_U_ID1` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `DIR_MESS`
--

INSERT INTO `DIR_MESS` (`DM_ID`, `DM_FROM_ID`, `DM_TO_ID`, `DM_SUBJECT`, `DM_MESSAGE`, `DM_DATE_TIME`, `USER_U_ID1`) VALUES
(0, 2, 3, 'Hello', 'Just seeing if you''re going to the party', '2012-12-22 00:00:00', 0),
(1, 0, 2, 'ADMIN MESSAGE', 'Please update your password', '2016-02-03 05:26:30', 0),
(2, 1, 0, 'TESTING DMS', 'Testing DM capability', '2016-02-11 04:00:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `EVENT`
--

DROP TABLE IF EXISTS `EVENT`;
CREATE TABLE `EVENT` (
  `E_ID` int(11) NOT NULL,
  `E_CREATOR` int(7) NOT NULL,
  `E_TITLE` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_LAT_DEG` int(2) NOT NULL,
  `E_LAT_MIN` int(2) NOT NULL,
  `E_LAT_SEC` int(2) NOT NULL,
  `E_LONG_DEG` int(2) NOT NULL,
  `E_LONG_MIN` int(2) NOT NULL,
  `E_LONG_SEC` tinyint(2) NOT NULL,
  `E_DATE` date NOT NULL,
  `E_TIME_START` time NOT NULL,
  `E_TIME_END` time DEFAULT NULL,
  `E_TYPE` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_DESC` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_PRIVATE` char(1) NOT NULL,
  `E_AGE_GROUP` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_PRICE` float(5,2) NOT NULL,
  `E_FOOD` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_FOOD_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_DRINK` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_DRINK_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_BYO` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_ATTIRE` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_ATTIRE_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `E_SPONSOR` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_SPONSOR_TITLE` char(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `USER_U_ID` int(7) NOT NULL,
  `LT_FOOD_F_FOOD_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `LT_ATTIRE_ATT_ATTIRE_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `LT_DRINK_D_DRINK_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `LT_AGE_AGE_CODE` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EVENT`
--

INSERT INTO `EVENT` (`E_ID`, `E_CREATOR`, `E_TITLE`, `E_LAT_DEG`, `E_LAT_MIN`, `E_LAT_SEC`, `E_LONG_DEG`, `E_LONG_MIN`, `E_LONG_SEC`, `E_DATE`, `E_TIME_START`, `E_TIME_END`, `E_TYPE`, `E_DESC`, `E_PRIVATE`, `E_AGE_GROUP`, `E_PRICE`, `E_FOOD`, `E_FOOD_TYPE`, `E_DRINK`, `E_DRINK_TYPE`, `E_BYO`, `E_ATTIRE`, `E_ATTIRE_TYPE`, `E_SPONSOR`, `E_SPONSOR_TITLE`, `USER_U_ID`, `LT_FOOD_F_FOOD_TYPE`, `LT_ATTIRE_ATT_ATTIRE_TYPE`, `LT_DRINK_D_DRINK_TYPE`, `LT_AGE_AGE_CODE`) VALUES
(0, 2, 'Party at my place', 30, 25, 14, 84, 17, 44, '2016-02-18', '20:00:00', '23:59:59', 'House Party', 'Come Party at my house. We don''t have to have a reason to party!!!', 'Y', '10', 0.00, 'Y', 'BRZ', 'Y', 'T', 'Y', 'Y', 'C', 'Y', 'PEPSI', 2, 'BRZ', 'C', 'T', 10),
(1, 3, 'Party', 30, 25, 14, 84, 17, 44, '2016-01-14', '16:00:00', '22:00:00', 'Party', 'Come to the party', 'N', '10', 0.00, 'Y', 'BUR', 'Y', 'T', 'Y', 'Y', 'C', 'Y', 'Emily', 3, 'BUR', 'C', 'T', 10),
(2, 2, 'Party at my place', 30, 25, 14, 84, 17, 44, '2016-04-18', '20:00:00', '23:59:00', 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', '10', 0.00, 'Y', 'BRZ', 'Y', 'T', 'Y', 'N', NULL, 'N', NULL, 2, 'BRZ', NULL, 'T', 10),
(3, 3, 'Party', 30, 25, 14, 84, 17, 44, '2016-07-14', '16:00:00', '22:00:00', 'Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'N', '10', 0.00, 'Y', 'BUR', 'Y', 'T', 'Y', 'N', NULL, 'N', NULL, 3, 'BUR', NULL, 'T', 10),
(4, 2, 'Get-Together', 30, 25, 14, 84, 17, 44, '2016-05-22', '20:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 2, NULL, NULL, 'A', 10),
(5, 5, 'Throw-Down', 30, 20, 22, 84, 50, 40, '2016-05-20', '21:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 5, NULL, NULL, 'A', 10),
(6, 3, 'Movie Marathon', 30, 25, 14, 84, 17, 44, '2016-06-10', '20:00:00', NULL, 'Movies', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', NULL, 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 3, NULL, NULL, 'A', 10),
(7, 4, 'Get-Together', 30, 22, 20, 84, 24, 40, '2016-04-18', '21:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 4, NULL, NULL, 'A', 10),
(8, 5, 'Party', 30, 20, 22, 84, 20, 40, '2016-05-24', '20:00:00', NULL, 'Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 5, NULL, NULL, 'A', 10),
(9, 4, 'Movie Marathon', 30, 22, 20, 84, 24, 40, '2016-06-22', '20:00:00', '23:59:00', 'Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 4, NULL, NULL, 'A', 10),
(10, 3, 'Party', 30, 25, 14, 84, 17, 44, '2016-06-11', '21:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 3, NULL, NULL, 'A', 10);

-- --------------------------------------------------------

--
-- Table structure for table `FEEDBACK`
--

DROP TABLE IF EXISTS `FEEDBACK`;
CREATE TABLE `FEEDBACK` (
  `FB_ID` int(11) NOT NULL,
  `FB_FROM_ID` int(7) NOT NULL,
  `FB_EVENT_ID` int(11) NOT NULL,
  `FB_MESS` longtext COLLATE utf8_bin NOT NULL,
  `USER_U_ID` int(7) NOT NULL,
  `EVENT_E_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `FEEDBACK`
--

INSERT INTO `FEEDBACK` (`FB_ID`, `FB_FROM_ID`, `FB_EVENT_ID`, `FB_MESS`, `USER_U_ID`, `EVENT_E_ID`) VALUES
(0, 3, 0, 'Loved the party!', 3, 0),
(1, 2, 1, 'Hope you throw more parties, I had a blast.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `GROUP`
--

DROP TABLE IF EXISTS `GROUP`;
CREATE TABLE `GROUP` (
  `GR_ID` int(11) NOT NULL,
  `GR_CREATOR` int(7) NOT NULL,
  `GR_MEMBER` int(7) NOT NULL,
  `GR_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `USER_U_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `GROUP`
--

INSERT INTO `GROUP` (`GR_ID`, `GR_CREATOR`, `GR_MEMBER`, `GR_NAME`, `USER_U_ID`) VALUES
(0, 2, 3, 'Red', 2),
(1, 2, 4, 'Red', 2),
(2, 2, 5, 'Red', 2),
(3, 5, 2, 'DummyCrew', 5),
(4, 5, 3, 'DummyCrew', 5);

-- --------------------------------------------------------

--
-- Table structure for table `INVITE`
--

DROP TABLE IF EXISTS `INVITE`;
CREATE TABLE `INVITE` (
  `IN_ID` int(11) NOT NULL,
  `IN_EVENT` int(11) NOT NULL,
  `IN_INVITEE` int(7) NOT NULL,
  `IN_GOING` char(1) COLLATE utf8_bin NOT NULL,
  `IN_ARRIVED` datetime DEFAULT NULL,
  `EVENT_E_ID` int(11) NOT NULL,
  `USER_U_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `INVITE`
--

INSERT INTO `INVITE` (`IN_ID`, `IN_EVENT`, `IN_INVITEE`, `IN_GOING`, `IN_ARRIVED`, `EVENT_E_ID`, `USER_U_ID`) VALUES
(0, 0, 3, 'Y', NULL, 0, 3),
(1, 0, 4, 'Y', NULL, 0, 4),
(2, 0, 5, 'Y', NULL, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `LT_AGE`
--

DROP TABLE IF EXISTS `LT_AGE`;
CREATE TABLE `LT_AGE` (
  `AGE_CODE` int(3) NOT NULL,
  `AGE_GROUP` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `LT_AGE`
--

INSERT INTO `LT_AGE` (`AGE_CODE`, `AGE_GROUP`) VALUES
(2, '20''s'),
(3, '30''s'),
(4, '40''s'),
(5, '50''s'),
(6, '60''s'),
(7, '70''s'),
(8, '80''s'),
(9, '90''s +'),
(10, 'College'),
(11, 'Parents'),
(12, '13 - 19');

-- --------------------------------------------------------

--
-- Table structure for table `LT_ATTIRE`
--

DROP TABLE IF EXISTS `LT_ATTIRE`;
CREATE TABLE `LT_ATTIRE` (
  `ATT_ATTIRE_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `ATT_ATTIRE` varchar(255) COLLATE utf8_bin NOT NULL,
  `ATT_COMMENT` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `LT_ATTIRE`
--

INSERT INTO `LT_ATTIRE` (`ATT_ATTIRE_TYPE`, `ATT_ATTIRE`, `ATT_COMMENT`) VALUES
('B', 'BLACK TIE EVENT', NULL),
('BL', 'BLACK', NULL),
('BW', 'BEACH WEAR', NULL),
('C', 'CASUAL', NULL),
('S', 'SUIT/TIE', NULL),
('WH', 'ALL WHITE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `LT_DRINK`
--

DROP TABLE IF EXISTS `LT_DRINK`;
CREATE TABLE `LT_DRINK` (
  `D_DRINK_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `D_DRINK` varchar(255) COLLATE utf8_bin NOT NULL,
  `D_COMMENT` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `LT_DRINK`
--

INSERT INTO `LT_DRINK` (`D_DRINK_TYPE`, `D_DRINK`, `D_COMMENT`) VALUES
('A', 'ALCOHOLIC BEVERAGES', ''),
('J', 'JUICE', ''),
('S', 'SODA', ''),
('T', 'TEA', ''),
('W', 'WATER', '');

-- --------------------------------------------------------

--
-- Table structure for table `LT_FOOD`
--

DROP TABLE IF EXISTS `LT_FOOD`;
CREATE TABLE `LT_FOOD` (
  `F_FOOD_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `F_FOOD` varchar(255) COLLATE utf8_bin NOT NULL,
  `F_COMMENT` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `LT_FOOD`
--

INSERT INTO `LT_FOOD` (`F_FOOD_TYPE`, `F_FOOD`, `F_COMMENT`) VALUES
('AFG', 'AFGHAN', ''),
('AFR', 'AFRICAN', ''),
('AME', 'AMERICAN', ''),
('ARA', 'ARABIAN', ''),
('ARG', 'ARGENTINE', ''),
('ARM', 'ARMENIAN', ''),
('ASI', 'ASIAN', ''),
('AU', 'AUSTRALIAN', ''),
('AUS', 'AUSTRIAN', ''),
('BAN', 'BANGLADESHI', ''),
('BAS', 'BASQUE', ''),
('BBQ', 'BARBEQUE', ''),
('BEL', 'BELGIAN', ''),
('BRA', 'BRASSERIES', ''),
('BRI', 'BRITISH', ''),
('BRM', 'BURMESE', ''),
('BRZ', 'BRAZILIAN', ''),
('BUF', 'BUFFET', ''),
('BUR', 'BURGERS', ''),
('CAJ', 'CAJUN', ''),
('CAL', 'CALABRIAN', ''),
('CAM', 'CAMBODIAN', ''),
('CAN', 'CANTONESE', ''),
('CAR', 'CARIBBEAN', ''),
('CAT', 'CATALAN', ''),
('CHI', 'CHICKEN', ''),
('CHN', 'CHINESE', ''),
('COL', 'COLOMBIAN', ''),
('COM', 'COMFORT FOOD', ''),
('CRE', 'CREOLE', ''),
('CRP', 'CREPES', ''),
('CUB', 'CUBAN', ''),
('CZE', 'CZECH', ''),
('DEL', 'DELI', ''),
('DIM', 'DIM SUM', ''),
('DOM', 'DOMINICAN', ''),
('EGY', 'EGYPTIAN', ''),
('FAL', 'FALAFEL', ''),
('FIL', 'FILIPINO', ''),
('FIS', 'FISH', ''),
('FON', 'FONDUE', ''),
('FRE', 'FRENCH', ''),
('GAS', 'GASTROPUB', ''),
('GER', 'GERMAN', ''),
('GLU', 'GLUTEN-FREE', ''),
('GRE', 'GREEK', ''),
('HAI', 'HAITIAN', ''),
('HAL', 'HALAL', ''),
('HAW', 'HAWAIIAN', ''),
('HIM', 'HIMALAYAN', ''),
('HUN', 'HUNGARIAN', ''),
('IBE', 'IBERIAN', ''),
('IND', 'INDIAN', ''),
('IRA', 'IRANIAN', ''),
('IRI', 'IRISH', ''),
('ITA', 'ITALIAN', ''),
('JAP', 'JAPANESE', ''),
('KOR', 'KOREAN', ''),
('KOS', 'KOSHER', ''),
('LAO', 'LAOTIAN', ''),
('LAT', 'LATIN AMERICAN', ''),
('LEB', 'LEBANESE', ''),
('MAL', 'MALAYSIAN', ''),
('MED', 'MEDITERRANEAN', ''),
('MEX', 'MEXICAN', ''),
('MID', 'MIDDLE EAST', ''),
('MON', 'MONGOLIAN', ''),
('MOR', 'MOROCCAN', ''),
('NEP', 'NEPALESE', ''),
('PAK', 'PAKISTANI', ''),
('PER', 'PERSIAN', ''),
('PIZ', 'PIZZA', ''),
('POL', 'POLISH', ''),
('PRV', 'PERUVIAN', '');

-- --------------------------------------------------------

--
-- Table structure for table `RT_EVENT`
--

DROP TABLE IF EXISTS `RT_EVENT`;
CREATE TABLE `RT_EVENT` (
  `RT_ID` int(11) NOT NULL,
  `RT_FROM_ID` int(7) NOT NULL,
  `RT_EVENT` int(11) NOT NULL,
  `RT_MEDIA` longtext COLLATE utf8_bin,
  `RT_COMMENT` longtext COLLATE utf8_bin,
  `RT_STARS` int(1) DEFAULT NULL,
  `EVENT_E_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `RT_EVENT`
--

INSERT INTO `RT_EVENT` (`RT_ID`, `RT_FROM_ID`, `RT_EVENT`, `RT_MEDIA`, `RT_COMMENT`, `RT_STARS`, `EVENT_E_ID`) VALUES
(0, 3, 0, '', 'You guys are missing it!!!!', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
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
  `U_PHONE` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`U_ID`, `U_ACCT_TYPE`, `U_USERNAME`, `U_F_NAME`, `U_L_NAME`, `U_DOB`, `U_HOME_LAT_DEG`, `U_HOME_LAT_MIN`, `U_HOME_LAT_SEC`, `U_HOME_LONG_DEG`, `U_HOME_LONG_MIN`, `U_HOME_LONG_SEC`, `U_SCHOOL`, `U_PHONE`) VALUES
(0, 'A', 'ADMIN', 'ADMIN', 'ADMIN', '2016-01-01', 30, 26, 26, 84, 18, 51, 'FAMU', 8505551111),
(1, 'A', 'ADMIN1', 'ADMIN1', 'ADMIN1', '2016-01-01', 30, 27, 43, 84, 18, 41, 'FAMU', 8505551222),
(2, 'L', 'JoeyBlast', 'Joseph', 'Williams', '1997-06-22', 30, 25, 14, 84, 17, 44, 'FAMU', 8505551111),
(3, 'L', 'RokStr', 'David', 'Simmons', '1996-12-13', 30, 25, 10, 84, 16, 59, 'FAMU', 8505552222),
(4, 'L', 'LizzardMan', 'Cory', 'Davis', '1996-09-29', 30, 27, 26, 84, 19, 51, 'FSU', 8505554321),
(5, 'L', 'SouthernSweetie', 'Rebecca', 'Jones', '1997-04-03', 30, 27, 22, 84, 16, 19, 'FSU', 8505551234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ABOUT`
--
ALTER TABLE `ABOUT`
  ADD PRIMARY KEY (`INDEX`);

--
-- Indexes for table `AUTH`
--
ALTER TABLE `AUTH`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `fk_AUTH_USER1_idx` (`USER_U_ID`);

--
-- Indexes for table `DIR_MESS`
--
ALTER TABLE `DIR_MESS`
  ADD PRIMARY KEY (`DM_ID`),
  ADD KEY `fk_DIR_MESS_USER1_idx1` (`USER_U_ID1`);

--
-- Indexes for table `EVENT`
--
ALTER TABLE `EVENT`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `fk_EVENT_USER1_idx` (`USER_U_ID`),
  ADD KEY `fk_EVENT_LT_FOOD1_idx` (`LT_FOOD_F_FOOD_TYPE`),
  ADD KEY `fk_EVENT_LT_ATTIRE1_idx` (`LT_ATTIRE_ATT_ATTIRE_TYPE`),
  ADD KEY `fk_EVENT_LT_DRINK1_idx` (`LT_DRINK_D_DRINK_TYPE`),
  ADD KEY `fk_EVENT_LT_AGE1_idx` (`LT_AGE_AGE_CODE`);

--
-- Indexes for table `FEEDBACK`
--
ALTER TABLE `FEEDBACK`
  ADD PRIMARY KEY (`FB_ID`),
  ADD KEY `fk_FEEDBACK_USER1_idx` (`USER_U_ID`),
  ADD KEY `fk_FEEDBACK_EVENT1_idx` (`EVENT_E_ID`);

--
-- Indexes for table `GROUP`
--
ALTER TABLE `GROUP`
  ADD PRIMARY KEY (`GR_ID`),
  ADD KEY `fk_GROUP_USER1_idx` (`USER_U_ID`);

--
-- Indexes for table `INVITE`
--
ALTER TABLE `INVITE`
  ADD PRIMARY KEY (`IN_ID`),
  ADD KEY `fk_INVITE_EVENT1_idx` (`EVENT_E_ID`),
  ADD KEY `fk_INVITE_USER1_idx` (`USER_U_ID`);

--
-- Indexes for table `LT_AGE`
--
ALTER TABLE `LT_AGE`
  ADD PRIMARY KEY (`AGE_CODE`);

--
-- Indexes for table `LT_ATTIRE`
--
ALTER TABLE `LT_ATTIRE`
  ADD PRIMARY KEY (`ATT_ATTIRE_TYPE`);

--
-- Indexes for table `LT_DRINK`
--
ALTER TABLE `LT_DRINK`
  ADD PRIMARY KEY (`D_DRINK_TYPE`);

--
-- Indexes for table `LT_FOOD`
--
ALTER TABLE `LT_FOOD`
  ADD PRIMARY KEY (`F_FOOD_TYPE`);

--
-- Indexes for table `RT_EVENT`
--
ALTER TABLE `RT_EVENT`
  ADD PRIMARY KEY (`RT_ID`),
  ADD KEY `fk_RT_EVENT_EVENT1_idx` (`EVENT_E_ID`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`U_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AUTH`
--
ALTER TABLE `AUTH`
  ADD CONSTRAINT `fk_AUTH_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DIR_MESS`
--
ALTER TABLE `DIR_MESS`
  ADD CONSTRAINT `fk_DIR_MESS_USER1` FOREIGN KEY (`USER_U_ID1`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `EVENT`
--
ALTER TABLE `EVENT`
  ADD CONSTRAINT `fk_EVENT_LT_AGE1` FOREIGN KEY (`LT_AGE_AGE_CODE`) REFERENCES `LT_AGE` (`AGE_CODE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EVENT_LT_ATTIRE1` FOREIGN KEY (`LT_ATTIRE_ATT_ATTIRE_TYPE`) REFERENCES `LT_ATTIRE` (`ATT_ATTIRE_TYPE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EVENT_LT_DRINK1` FOREIGN KEY (`LT_DRINK_D_DRINK_TYPE`) REFERENCES `LT_DRINK` (`D_DRINK_TYPE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EVENT_LT_FOOD1` FOREIGN KEY (`LT_FOOD_F_FOOD_TYPE`) REFERENCES `LT_FOOD` (`F_FOOD_TYPE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EVENT_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `FEEDBACK`
--
ALTER TABLE `FEEDBACK`
  ADD CONSTRAINT `fk_FEEDBACK_EVENT1` FOREIGN KEY (`EVENT_E_ID`) REFERENCES `EVENT` (`E_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FEEDBACK_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `GROUP`
--
ALTER TABLE `GROUP`
  ADD CONSTRAINT `fk_GROUP_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `INVITE`
--
ALTER TABLE `INVITE`
  ADD CONSTRAINT `fk_INVITE_EVENT1` FOREIGN KEY (`EVENT_E_ID`) REFERENCES `EVENT` (`E_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_INVITE_USER1` FOREIGN KEY (`USER_U_ID`) REFERENCES `USER` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RT_EVENT`
--
ALTER TABLE `RT_EVENT`
  ADD CONSTRAINT `fk_RT_EVENT_EVENT1` FOREIGN KEY (`EVENT_E_ID`) REFERENCES `EVENT` (`E_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
