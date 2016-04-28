-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 02:13 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotspot`
--
CREATE DATABASE IF NOT EXISTS `hotspot` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `hotspot`;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `INDEX` varchar(45) COLLATE utf8_bin NOT NULL,
  `ABOUT_INFO` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`INDEX`, `ABOUT_INFO`) VALUES
('0', 'Stop wasting your time chatting with flaky people on your grandma''s dating app. It''s time to get out and meet people the way nature intended... While you''re out Partying!!!!!!!!  Introducing HOTSPOT. The first mobile social network that connects you with real people who are going to the same places that you are going.');

-- --------------------------------------------------------

--
-- Table structure for table `arrival`
--

CREATE TABLE `arrival` (
  `arr_id` int(11) NOT NULL,
  `arr_eventid` int(11) NOT NULL,
  `arr_userid` int(7) NOT NULL,
  `arr_arrived` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `A_ID` int(7) NOT NULL,
  `A_PASSWORD` longtext COLLATE utf8_bin,
  `A_TWITTER` int(11) DEFAULT NULL,
  `A_GOOGLE` int(11) DEFAULT NULL,
  `A_FACEBOOK` bigint(11) DEFAULT NULL,
  `USER_U_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`A_ID`, `A_PASSWORD`, `A_TWITTER`, `A_GOOGLE`, `A_FACEBOOK`, `USER_U_ID`) VALUES
(0, 'jdbeb8**h3nd', 2400303, 98765432, 283742, 0),
(1, 'kslurune^hd', 3434343, 12345678, 56232423453, 1),
(2, 'nsni&jebndl', 44473, 898477444, 234534345, 2),
(3, '9890ehnLKHf', 9897433, 9978554, 444333, 3),
(4, '84802nlsnifb', 2147483647, 2147483647, 6628282892, 4),
(5, ',na,sdna84HH', 2147483647, 345634673, 234522345, 5),
(9101344, 'thotnificenth03', NULL, NULL, NULL, 9101344),
(9365608, 'dogsbite', NULL, NULL, NULL, 9365608),
(9872264, 'daGszZ5DZvuJWA55', NULL, NULL, NULL, 9872264);

-- --------------------------------------------------------

--
-- Table structure for table `dir_mess`
--

CREATE TABLE `dir_mess` (
  `DM_ID` int(7) NOT NULL,
  `DM_FROM_ID` int(7) NOT NULL,
  `DM_TO_ID` int(7) NOT NULL,
  `DM_SUBJECT` varchar(5000) COLLATE utf8_bin DEFAULT NULL,
  `DM_MESSAGE` longtext COLLATE utf8_bin NOT NULL,
  `DM_DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_U_ID1` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dir_mess`
--

INSERT INTO `dir_mess` (`DM_ID`, `DM_FROM_ID`, `DM_TO_ID`, `DM_SUBJECT`, `DM_MESSAGE`, `DM_DATE_TIME`, `USER_U_ID1`) VALUES
(1, 2, 3, 'Hello', 'Just seeing if you''re going to the party', '2016-03-29 04:37:02', 2),
(2, 0, 2, 'ADMIN MESSAGE', 'Please update your password', '2016-03-29 04:36:53', 0),
(3, 1, 0, 'TESTING DMS', 'Testing DM capability', '2016-03-29 04:36:44', 1),
(4, 0, 9872264, '[ADMIN] Welcome!', 'Welcome to HotSpot!!', '2016-03-29 04:36:53', 0),
(7, 9101344, 9872264, 'Usability Testing', 'Testing messaging system...\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '2016-03-30 07:35:16', 9101344),
(9, 9101344, 9872264, 'testing success page 01', 'testing success page for messages', '2016-03-30 07:54:33', 9101344),
(11, 9872264, 0, 'FAQ?', 'Are we going to add a FAQ page? what about a site map?... Just some thoughts.', '2016-04-02 03:11:45', 9872264),
(12, 9365608, 3, 'empty', 'YOOOO', '2016-04-27 07:13:37', 9365608),
(13, 9365608, 2, 'Testing Group Messagest', 'ttttt', '2016-04-27 07:25:25', 9365608),
(14, 9365608, 5, 'Testing Group Messagest', 'ttttt', '2016-04-27 07:25:25', 9365608),
(16, 3, 9365608, 'Second Test', 'Group Messages', '2016-04-27 07:35:32', 3),
(17, 3, 2, 'Second Test', 'Group Messages', '2016-04-27 07:35:32', 3),
(18, 3, 5, 'Second Test', 'Group Messages', '2016-04-27 07:35:32', 3);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `E_ID` int(11) NOT NULL,
  `E_CREATOR` int(7) NOT NULL,
  `E_TITLE` char(255) NOT NULL,
  `E_LAT_DEG` int(2) NOT NULL,
  `E_LAT_MIN` int(2) NOT NULL,
  `E_LAT_SEC` int(2) NOT NULL,
  `E_LONG_DEG` int(2) NOT NULL,
  `E_LONG_MIN` int(2) NOT NULL,
  `E_LONG_SEC` tinyint(2) NOT NULL,
  `E_DATE` date NOT NULL,
  `E_TIME_START` time NOT NULL,
  `E_TIME_END` time DEFAULT NULL,
  `E_TYPE` varchar(255) NOT NULL,
  `E_DESC` longtext NOT NULL,
  `E_PRIVATE` char(1) NOT NULL,
  `E_AGE_GROUP` varchar(20) DEFAULT NULL,
  `E_PRICE` float(5,2) NOT NULL,
  `E_FOOD` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_FOOD_TYPE` char(3) DEFAULT NULL,
  `E_DRINK` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_DRINK_TYPE` char(3) DEFAULT NULL,
  `E_BYO` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_ATTIRE` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_ATTIRE_TYPE` char(3) DEFAULT NULL,
  `E_SPONSOR` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `E_SPONSOR_TITLE` char(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `USER_U_ID` int(7) NOT NULL,
  `LT_FOOD_F_FOOD_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `LT_ATTIRE_ATT_ATTIRE_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `LT_DRINK_D_DRINK_TYPE` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `LT_AGE_AGE_CODE` int(3) DEFAULT NULL,
  `E_MUSIC_TYPE` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`E_ID`, `E_CREATOR`, `E_TITLE`, `E_LAT_DEG`, `E_LAT_MIN`, `E_LAT_SEC`, `E_LONG_DEG`, `E_LONG_MIN`, `E_LONG_SEC`, `E_DATE`, `E_TIME_START`, `E_TIME_END`, `E_TYPE`, `E_DESC`, `E_PRIVATE`, `E_AGE_GROUP`, `E_PRICE`, `E_FOOD`, `E_FOOD_TYPE`, `E_DRINK`, `E_DRINK_TYPE`, `E_BYO`, `E_ATTIRE`, `E_ATTIRE_TYPE`, `E_SPONSOR`, `E_SPONSOR_TITLE`, `USER_U_ID`, `LT_FOOD_F_FOOD_TYPE`, `LT_ATTIRE_ATT_ATTIRE_TYPE`, `LT_DRINK_D_DRINK_TYPE`, `LT_AGE_AGE_CODE`, `E_MUSIC_TYPE`) VALUES
(0, 2, 'Party at my place', 30, 25, 14, 84, 17, 44, '2016-07-16', '20:00:00', '23:59:59', 'House Party', 'Come Party at my house. We don''t have to have a reason to party!!!', '', '10', 0.00, 'Y', 'BRZ', 'Y', 'T', 'Y', 'Y', 'C', 'Y', 'PEPSI', 2, 'BRZ', 'C', 'T', 10, NULL),
(1, 3, 'Party', 30, 25, 14, 84, 17, 44, '2016-01-14', '16:00:00', '22:00:00', 'Party', 'Come to the party', 'N', '10', 0.00, 'Y', 'BUR', 'Y', 'T', 'Y', 'Y', 'C', 'Y', 'Emily', 3, 'BUR', 'C', 'T', 10, NULL),
(2, 2, 'Party, Party, Party!!!', 30, 25, 14, 84, 17, 44, '2016-04-18', '20:00:00', '23:59:00', 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', '10', 0.00, 'Y', 'BRZ', 'Y', 'T', 'Y', 'N', NULL, 'N', NULL, 2, 'BRZ', NULL, 'T', 10, NULL),
(3, 3, 'Party', 30, 25, 14, 84, 17, 44, '2016-07-14', '16:00:00', '22:00:00', 'Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'N', '10', 0.00, 'Y', 'BUR', 'Y', 'T', 'Y', 'N', NULL, 'N', NULL, 3, 'BUR', NULL, 'T', 10, NULL),
(4, 2, 'Get-Together', 30, 25, 14, 84, 17, 44, '2016-05-22', '20:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 2, NULL, NULL, 'A', 10, NULL),
(5, 5, 'Throw-Down', 30, 20, 22, 84, 50, 40, '2016-05-20', '21:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'N', '10', 0.00, 'Y', 'BUR', 'Y', 'A', 'Y', 'Y', 'C', 'Y', 'Omega Psi Phi', 5, 'BUR', 'C', 'A', 10, 'Hip-Hop'),
(6, 3, 'Movie Marathon', 30, 25, 14, 84, 17, 44, '2016-06-10', '20:00:00', NULL, 'Movies', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', NULL, 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 3, NULL, NULL, 'A', 10, NULL),
(7, 4, 'Get-Together', 30, 22, 20, 84, 24, 40, '2016-04-18', '21:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 4, NULL, NULL, 'A', 10, NULL),
(8, 5, 'Party', 30, 20, 22, 84, 20, 40, '2016-05-24', '20:00:00', NULL, 'Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 5, NULL, NULL, 'A', 10, NULL),
(9, 4, 'Movie Marathon', 30, 22, 20, 84, 24, 40, '2016-06-22', '20:00:00', '23:59:00', 'Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 4, NULL, NULL, 'A', 10, NULL),
(10, 3, 'Party', 30, 25, 14, 84, 17, 44, '2016-06-11', '21:00:00', NULL, 'House Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'N', '10', 0.00, 'N', NULL, 'Y', 'A', 'Y', 'N', NULL, 'N', NULL, 3, NULL, NULL, 'A', 10, NULL),
(2147483647, 9365608, 'YOOOO', 0, 0, 0, 0, 0, 0, '2016-12-30', '22:00:00', '00:00:00', '', 'Lets Partyyyyyy																				', '', NULL, 0.00, '', NULL, '', NULL, '', '', NULL, '', NULL, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FB_ID` int(11) NOT NULL,
  `FB_FROM_ID` int(7) NOT NULL,
  `FB_EVENT_ID` int(11) NOT NULL,
  `FB_MESS` longtext CHARACTER SET utf8 NOT NULL,
  `FB_DATETIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_U_ID` int(7) NOT NULL,
  `EVENT_E_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FB_ID`, `FB_FROM_ID`, `FB_EVENT_ID`, `FB_MESS`, `FB_DATETIME`, `USER_U_ID`, `EVENT_E_ID`) VALUES
(1, 5, 5, 'TESTING MESSAGE 5:5', '2016-04-25 00:46:25', 0, 0),
(7, 9872264, 5, 'Testing Comments', '2016-04-25 01:22:39', 0, 0),
(12, 9872264, 5, 'Testing comments from Eric/Event#5', '2016-04-25 14:27:18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `flame`
--

CREATE TABLE `flame` (
  `F_ID` int(11) NOT NULL,
  `F_EVENTID` int(11) NOT NULL,
  `F_USERID` int(7) NOT NULL,
  `F_FLAME` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flame`
--

INSERT INTO `flame` (`F_ID`, `F_EVENTID`, `F_USERID`, `F_FLAME`) VALUES
(5, 0, 9872264, 1),
(6, 9, 9872264, 1),
(8, 5, 9101344, 1),
(9, 5, 9872264, 1),
(10, 8, 9872264, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `GR_ID` int(11) NOT NULL,
  `GR_CREATOR` int(7) NOT NULL,
  `GR_MEMBER` int(7) NOT NULL,
  `GR_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `USER_U_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`GR_ID`, `GR_CREATOR`, `GR_MEMBER`, `GR_NAME`, `USER_U_ID`) VALUES
(0, 2, 2, 'Red', 2),
(0, 2, 3, 'Red', 2),
(0, 2, 4, 'Red', 2),
(0, 2, 5, 'Red', 2),
(1, 5, 2, 'DummyCrew', 5),
(1, 5, 3, 'DummyCrew', 5),
(1, 5, 5, 'DummyCrew', 5),
(1, 5, 9365608, 'DummyCrew', 5),
(9209148, 9365608, 3, 'RockStarz', 9365608),
(9209148, 9365608, 9365608, 'RockStarz', 9365608);

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `IN_ID` int(11) NOT NULL,
  `IN_EVENT` int(11) NOT NULL,
  `IN_INVITEE` int(7) NOT NULL,
  `INV_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IN_GOING` char(1) COLLATE utf8_bin NOT NULL,
  `IN_ARRIVED` timestamp NULL DEFAULT NULL,
  `EVENT_E_ID` int(11) NOT NULL,
  `USER_U_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `invite`
--

INSERT INTO `invite` (`IN_ID`, `IN_EVENT`, `IN_INVITEE`, `INV_TIME`, `IN_GOING`, `IN_ARRIVED`, `EVENT_E_ID`, `USER_U_ID`) VALUES
(1, 0, 3, '2016-03-30 05:37:13', 'Y', NULL, 0, 3),
(2, 0, 4, '2016-03-30 05:37:13', 'Y', NULL, 0, 4),
(3, 0, 5, '2016-03-30 05:37:13', 'Y', NULL, 0, 5),
(6, 0, 9872264, '2016-03-30 05:37:13', 'Y', NULL, 0, 5),
(7, 2, 9872264, '2016-03-30 05:37:13', '', NULL, 0, 5),
(8, 0, 9365608, '2016-04-26 23:24:18', '', NULL, 1, 9365608);

-- --------------------------------------------------------

--
-- Table structure for table `lt_age`
--

CREATE TABLE `lt_age` (
  `AGE_CODE` int(3) NOT NULL,
  `AGE_GROUP` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lt_age`
--

INSERT INTO `lt_age` (`AGE_CODE`, `AGE_GROUP`) VALUES
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
-- Table structure for table `lt_attire`
--

CREATE TABLE `lt_attire` (
  `ATT_ATTIRE_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `ATT_ATTIRE` varchar(255) COLLATE utf8_bin NOT NULL,
  `ATT_COMMENT` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lt_attire`
--

INSERT INTO `lt_attire` (`ATT_ATTIRE_TYPE`, `ATT_ATTIRE`, `ATT_COMMENT`) VALUES
('B', 'Black Tie', NULL),
('BL', 'All Black', NULL),
('BW', 'Beach Wear', NULL),
('C', 'Casual', NULL),
('S', 'Suit/Tie', NULL),
('WH', 'All White', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lt_drink`
--

CREATE TABLE `lt_drink` (
  `D_DRINK_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `D_DRINK` varchar(255) COLLATE utf8_bin NOT NULL,
  `D_COMMENT` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lt_drink`
--

INSERT INTO `lt_drink` (`D_DRINK_TYPE`, `D_DRINK`, `D_COMMENT`) VALUES
('A', 'Alcohol', ''),
('J', 'Juice', ''),
('S', 'Soda', ''),
('T', 'Tea', ''),
('W', 'Water', '');

-- --------------------------------------------------------

--
-- Table structure for table `lt_food`
--

CREATE TABLE `lt_food` (
  `F_FOOD_TYPE` char(3) COLLATE utf8_bin NOT NULL,
  `F_FOOD` varchar(255) COLLATE utf8_bin NOT NULL,
  `F_COMMENT` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lt_food`
--

INSERT INTO `lt_food` (`F_FOOD_TYPE`, `F_FOOD`, `F_COMMENT`) VALUES
('AFG', 'Afghan', ''),
('AFR', 'African', ''),
('AME', 'American', ''),
('ARA', 'Arabian', ''),
('ARG', 'Argentine', ''),
('ARM', 'Armenian', ''),
('ASI', 'Asian', ''),
('AU', 'Australian', ''),
('AUS', 'Austrian', ''),
('BAN', 'Bangledeshi', ''),
('BAS', 'Basque', ''),
('BBQ', 'Barbeque', ''),
('BEL', 'Belgian', ''),
('BRA', 'Brasseries', ''),
('BRI', 'British', ''),
('BRM', 'Burmese', ''),
('BRZ', 'Brazalian', ''),
('BUF', 'Buffet', ''),
('BUR', 'Burgers', ''),
('CAJ', 'Cajun', ''),
('CAL', 'Calabrian', ''),
('CAM', 'Cambodian', ''),
('CAN', 'Cantonese', ''),
('CAR', 'Caribbean', ''),
('CAT', 'Catalan', ''),
('CHI', 'Chicken', ''),
('CHN', 'Chinese', ''),
('COL', 'Colombian', ''),
('COM', 'Comfort Food', ''),
('CRE', 'Creole', ''),
('CRP', 'Crepes', ''),
('CUB', 'Cuban', ''),
('CZE', 'Czech', ''),
('DEL', 'Deli', ''),
('DIM', 'Dim Sum', ''),
('DOM', 'Dominican', ''),
('EGY', 'Egyptian', ''),
('FAL', 'Flalfel', ''),
('FIL', 'Filipino', ''),
('FIS', 'Fish', ''),
('FON', 'Fondue', ''),
('FRE', 'French', ''),
('GAS', 'Gastropub', ''),
('GER', 'German', ''),
('GLU', 'Gluten-Free', ''),
('GRE', 'Greek', ''),
('HAI', 'Haitian', ''),
('HAL', 'Halal', ''),
('HAW', 'Hawaiian', ''),
('HIM', 'Himalayan', ''),
('HUN', 'Hungarian', ''),
('IBE', 'Iberian', ''),
('IND', 'Indian', ''),
('IRA', 'Iranian', ''),
('IRI', 'Irish', ''),
('ITA', 'Italian', ''),
('JAP', 'Japenese', ''),
('KOR', 'Korean', ''),
('KOS', 'Kosher', ''),
('LAO', 'Laotian', ''),
('LAT', 'Latin Am.', ''),
('LEB', 'Lebanese', ''),
('MAL', 'Malaysian', ''),
('MED', 'Mediterranean', ''),
('MEX', 'Mexican', ''),
('MID', 'Middle East', ''),
('MON', 'Mongolian', ''),
('MOR', 'Moroccan', ''),
('NEP', 'Nepelese', ''),
('PAK', 'Pakistani', ''),
('PER', 'Persian', ''),
('PIZ', 'Pizza', ''),
('POL', 'Polish', ''),
('PRV', 'Peruvian', '');

-- --------------------------------------------------------

--
-- Table structure for table `rt_event`
--

CREATE TABLE `rt_event` (
  `RT_ID` int(11) NOT NULL,
  `RT_FROM_ID` int(7) NOT NULL,
  `RT_EVENT` int(11) NOT NULL,
  `RT_MEDIA` longtext COLLATE utf8_bin,
  `RT_COMMENT` longtext COLLATE utf8_bin,
  `RT_STARS` int(1) DEFAULT NULL,
  `EVENT_E_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rt_event`
--

INSERT INTO `rt_event` (`RT_ID`, `RT_FROM_ID`, `RT_EVENT`, `RT_MEDIA`, `RT_COMMENT`, `RT_STARS`, `EVENT_E_ID`) VALUES
(0, 3, 0, '', 'You guys are missing it!!!!', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
  `U_IMAGE` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `U_ACCT_TYPE`, `U_USERNAME`, `U_F_NAME`, `U_L_NAME`, `U_DOB`, `U_HOME_LAT_DEG`, `U_HOME_LAT_MIN`, `U_HOME_LAT_SEC`, `U_HOME_LONG_DEG`, `U_HOME_LONG_MIN`, `U_HOME_LONG_SEC`, `U_SCHOOL`, `U_PHONE`, `U_IMAGE`) VALUES
(0, 'A', 'ADMIN', 'ADMIN', 'ADMIN', '2016-01-01', 30, 26, 26, 84, 18, 51, 'FAMU', 8505551111, NULL),
(1, 'A', 'ADMIN1', 'ADMIN1', 'ADMIN1', '2016-01-01', 30, 27, 43, 84, 18, 41, 'FAMU', 8505551222, NULL),
(2, 'L', 'JoeyBlast', 'Joseph', 'Williams', '1997-06-22', 30, 25, 14, 84, 17, 44, 'FAMU', 8505551111, NULL),
(3, 'L', 'RokStr', 'David', 'Simmons', '1996-12-13', 30, 25, 10, 84, 16, 59, 'FAMU', 8505552222, NULL),
(4, 'L', 'LizzardMan', 'Cory', 'Davis', '1996-09-29', 30, 27, 26, 84, 19, 51, 'FSU', 8505554321, NULL),
(5, 'L', 'PsiGuy', 'David', 'Humphries', '1997-04-03', 30, 27, 22, 84, 16, 19, 'FAMU', 8505551234, NULL),
(9101344, 'L', 'ThotM@tt1ck', 'Ratkisha', 'Mathis', '1995-12-28', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(9365608, 'A', 'Barker&Biter93', 'Trenique', 'Barker', '1993-10-11', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(9872264, 'L', 'Eric', 'Eric A.', 'Mayberry IV', '1977-04-14', 0, 0, 0, 0, 0, 0, 'FAMU', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`INDEX`);

--
-- Indexes for table `arrival`
--
ALTER TABLE `arrival`
  ADD PRIMARY KEY (`arr_id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `fk_AUTH_USER1_idx` (`USER_U_ID`);

--
-- Indexes for table `dir_mess`
--
ALTER TABLE `dir_mess`
  ADD PRIMARY KEY (`DM_ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FB_ID`);

--
-- Indexes for table `flame`
--
ALTER TABLE `flame`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`GR_ID`,`GR_MEMBER`) USING BTREE;

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`IN_ID`);

--
-- Indexes for table `lt_age`
--
ALTER TABLE `lt_age`
  ADD PRIMARY KEY (`AGE_CODE`);

--
-- Indexes for table `lt_attire`
--
ALTER TABLE `lt_attire`
  ADD PRIMARY KEY (`ATT_ATTIRE_TYPE`);

--
-- Indexes for table `lt_drink`
--
ALTER TABLE `lt_drink`
  ADD PRIMARY KEY (`D_DRINK_TYPE`);

--
-- Indexes for table `lt_food`
--
ALTER TABLE `lt_food`
  ADD PRIMARY KEY (`F_FOOD_TYPE`);

--
-- Indexes for table `rt_event`
--
ALTER TABLE `rt_event`
  ADD PRIMARY KEY (`RT_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrival`
--
ALTER TABLE `arrival`
  MODIFY `arr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dir_mess`
--
ALTER TABLE `dir_mess`
  MODIFY `DM_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `flame`
--
ALTER TABLE `flame`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `invite`
--
ALTER TABLE `invite`
  MODIFY `IN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
