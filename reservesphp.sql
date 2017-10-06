-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2017 at 02:45 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservesphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `answer` text COLLATE utf8_bin NOT NULL,
  `rankrequest` text COLLATE utf8_bin NOT NULL,
  `rank` text COLLATE utf8_bin NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL,
  `ign` varchar(80) COLLATE utf8_bin NOT NULL,
  `server` int(14) NOT NULL,
  `appid` varchar(30) COLLATE utf8_bin NOT NULL,
  `why` varchar(300) COLLATE utf8_bin NOT NULL,
  `cause` varchar(300) COLLATE utf8_bin NOT NULL,
  `ideas` varchar(300) COLLATE utf8_bin NOT NULL,
  `ayenay` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `text` varchar(300) COLLATE utf8_bin NOT NULL,
  `author` varchar(80) COLLATE utf8_bin NOT NULL,
  `articleid` varchar(80) COLLATE utf8_bin NOT NULL,
  `id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `devboard`
--

CREATE TABLE `devboard` (
  `github` varchar(190) COLLATE utf8_bin NOT NULL,
  `boards` varchar(190) COLLATE utf8_bin NOT NULL,
  `languages` text COLLATE utf8_bin NOT NULL,
  `crypto` varchar(80) COLLATE utf8_bin NOT NULL,
  `signature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donortokens` int(14) NOT NULL,
  `donorgold` int(14) NOT NULL,
  `skillpoints` int(14) NOT NULL,
  `exp` int(14) NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `gamechars`
--

CREATE TABLE `gamechars` (
  `signature` varchar(80) COLLATE utf8_bin NOT NULL,
  `Minecraft` varchar(80) COLLATE utf8_bin NOT NULL,
  `LoL` varchar(80) COLLATE utf8_bin NOT NULL,
  `Steam` varchar(190) COLLATE utf8_bin NOT NULL,
  `WoW` varchar(80) COLLATE utf8_bin NOT NULL,
  `wurm` varchar(30) COLLATE utf8_bin NOT NULL,
  `runescape` varchar(50) COLLATE utf8_bin NOT NULL,
  `pokeshowdown` varchar(50) COLLATE utf8_bin NOT NULL,
  `3ds` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `leaderposts`
--

CREATE TABLE `leaderposts` (
  `imagea` varchar(190) COLLATE utf8_bin NOT NULL,
  `imageb` varchar(190) COLLATE utf8_bin NOT NULL,
  `imagec` varchar(190) COLLATE utf8_bin NOT NULL,
  `expvalue` int(14) NOT NULL,
  `timestamp` varchar(24) COLLATE utf8_bin NOT NULL,
  `text` varchar(2500) COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `reservevalue` int(14) NOT NULL,
  `amount` int(14) NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL,
  `itemid` varchar(30) COLLATE utf8_bin NOT NULL,
  `postinguser` varchar(30) COLLATE utf8_bin NOT NULL,
  `aid` varchar(80) COLLATE utf8_bin NOT NULL,
  `description` varchar(300) COLLATE utf8_bin NOT NULL,
  `title` varchar(80) COLLATE utf8_bin NOT NULL,
  `image` varchar(190) COLLATE utf8_bin NOT NULL,
  `listed` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` varchar(14) COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `gold` int(14) NOT NULL,
  `command` varchar(80) COLLATE utf8_bin NOT NULL,
  `point` int(14) NOT NULL,
  `itemid` varchar(30) COLLATE utf8_bin NOT NULL,
  `skillpoint` int(14) NOT NULL,
  `btc` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `UID` varchar(200) COLLATE utf8_bin NOT NULL,
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `hashid` varchar(120) COLLATE utf8_bin NOT NULL,
  `friendcode` varchar(180) COLLATE utf8_bin NOT NULL,
  `salt` varchar(512) COLLATE utf8_bin NOT NULL,
  `email` varchar(120) COLLATE utf8_bin NOT NULL,
  `password` varchar(512) COLLATE utf8_bin NOT NULL,
  `id` int(14) NOT NULL,
  `tolerance` int(2) NOT NULL,
  `points` int(14) NOT NULL,
  `exp` int(14) NOT NULL,
  `pin` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `cpu` varchar(20) COLLATE utf8_bin NOT NULL,
  `gpu` varchar(20) COLLATE utf8_bin NOT NULL,
  `psu` varchar(20) COLLATE utf8_bin NOT NULL,
  `mobo` varchar(20) COLLATE utf8_bin NOT NULL,
  `memory` varchar(20) COLLATE utf8_bin NOT NULL,
  `hood` varchar(20) COLLATE utf8_bin NOT NULL,
  `screen` varchar(20) COLLATE utf8_bin NOT NULL,
  `keyboard` varchar(20) COLLATE utf8_bin NOT NULL,
  `mouse` varchar(20) COLLATE utf8_bin NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `image` varchar(190) COLLATE utf8_bin NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL,
  `pets` varchar(80) COLLATE utf8_bin NOT NULL,
  `food` varchar(80) COLLATE utf8_bin NOT NULL,
  `games` varchar(190) COLLATE utf8_bin NOT NULL,
  `websites` varchar(190) COLLATE utf8_bin NOT NULL,
  `wishfor` varchar(300) COLLATE utf8_bin NOT NULL,
  `siga` varchar(300) COLLATE utf8_bin NOT NULL,
  `sigb` varchar(300) COLLATE utf8_bin NOT NULL,
  `sigc` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `userposts`
--

CREATE TABLE `userposts` (
  `post` varchar(600) COLLATE utf8_bin NOT NULL,
  `id` int(14) NOT NULL,
  `delid` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `vault`
--

CREATE TABLE `vault` (
  `itemid` varchar(80) COLLATE utf8_bin NOT NULL,
  `amount` int(14) NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL,
  `command` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
