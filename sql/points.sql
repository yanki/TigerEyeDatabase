-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2014 at 11:27 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `points`
--
CREATE DATABASE IF NOT EXISTS `points` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `points`;

-- --------------------------------------------------------

--
-- Table structure for table `artifact`
--

CREATE TABLE IF NOT EXISTS `artifact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(500) NOT NULL,
  `type` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `ref_id` (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `artifact_type`
--

CREATE TABLE IF NOT EXISTS `artifact_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `artifact_type`
--

INSERT INTO `artifact_type` (`id`, `type`) VALUES
(1, 'image');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gps_lat` double NOT NULL,
  `gps_lon` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poi`
--

CREATE TABLE IF NOT EXISTS `poi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gps_lat` double NOT NULL,
  `gps_lon` double NOT NULL,
  `campus_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `campus_id` (`campus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `time`) VALUES
(1, 'present'),
(2, 'past'),
(3, 'future');

-- --------------------------------------------------------

--
-- Table structure for table `time_ref`
--

CREATE TABLE IF NOT EXISTS `time_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `poi_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `poi_id` (`poi_id`),
  KEY `time_id` (`time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artifact`
--
ALTER TABLE `artifact`
  ADD CONSTRAINT `artifact_ibfk_2` FOREIGN KEY (`ref_id`) REFERENCES `time_ref` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artifact_ibfk_1` FOREIGN KEY (`type`) REFERENCES `artifact_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poi`
--
ALTER TABLE `poi`
  ADD CONSTRAINT `poi_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_ref`
--
ALTER TABLE `time_ref`
  ADD CONSTRAINT `time_ref_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `time` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_ref_ibfk_1` FOREIGN KEY (`poi_id`) REFERENCES `poi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
