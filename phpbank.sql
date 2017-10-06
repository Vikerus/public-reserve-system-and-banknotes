-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2017 at 02:44 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `dex`
--

CREATE TABLE `dex` (
  `bsh` varchar(60) COLLATE utf8_bin NOT NULL,
  `timestamphash` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `hashtable`
--

CREATE TABLE `hashtable` (
  `xmlnest` varchar(900) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `free` int(14) NOT NULL,
  `signature` varchar(80) COLLATE utf8_bin NOT NULL,
  `public` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `usermask`
--

CREATE TABLE `usermask` (
  `userpinhmac` varchar(120) COLLATE utf8_bin NOT NULL,
  `userhandlehash` varchar(120) COLLATE utf8_bin NOT NULL,
  `signature` varchar(120) COLLATE utf8_bin NOT NULL,
  `pin` varchar(120) COLLATE utf8_bin NOT NULL,
  `sighmac` varchar(120) COLLATE utf8_bin NOT NULL,
  `tmpprofile` varchar(130) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
