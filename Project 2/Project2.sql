-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2016 at 08:43 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Reservations`
--

CREATE TABLE IF NOT EXISTS `Reservations` (
  `RA_Name` varchar(30) NOT NULL,
  `CWID` int(8) NOT NULL,
  `Rerservation_Date` date NOT NULL,
  PRIMARY KEY (`RA_Name`,`CWID`),
  KEY `CWID` (`CWID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ResidenceArea`
--

CREATE TABLE IF NOT EXISTS `ResidenceArea` (
  `Name` varchar(30) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Available_Slots` int(11) NOT NULL,
  `Laundry` tinyint(1) NOT NULL,
  `Kitchen` tinyint(1) NOT NULL,
  `Special_Needs` tinyint(1) NOT NULL,
  `Class` varchar(30) NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ResidenceArea`
--

INSERT INTO `ResidenceArea` (`Name`, `Capacity`, `Available_Slots`, `Laundry`, `Kitchen`, `Special_Needs`, `Class`) VALUES
('Building A', 5, 5, 1, 1, 1, 'Junior & Senior'),
('Champagnat Hall', 5, 5, 1, 1, 1, 'Freshman'),
('Foy Townhouses', 5, 5, 1, 1, 1, 'Sophomore'),
('Fulton Street ', 5, 5, 1, 1, 1, 'Junior & Senior'),
('Leo Hall', 5, 5, 1, 1, 1, 'Freshman'),
('Lower West Cedar Townhouse', 5, 5, 1, 1, 1, 'Sophomore'),
('Marian Hall', 5, 5, 1, 0, 1, 'Freshman'),
('Midrise Hall', 5, 5, 1, 0, 1, 'Sophomore'),
('New Fulton Townhouses', 5, 5, 1, 1, 1, 'Junior & Senior'),
('New Townhouses', 5, 5, 1, 1, 1, 'Sophomore'),
('Sheahan Hall', 5, 5, 1, 1, 1, 'Freshman'),
('Talmadge Court', 5, 5, 1, 1, 1, 'Junior & Senior'),
('Upper West Cedar Townhouses', 5, 5, 1, 1, 1, 'Sophomore');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE IF NOT EXISTS `Students` (
  `Name` varchar(30) NOT NULL,
  `CWID` int(8) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Class` varchar(30) NOT NULL,
  `Laundry` tinyint(1) NOT NULL,
  `Kitchen` tinyint(1) NOT NULL,
  `Special_Needs` tinyint(1) NOT NULL,
  PRIMARY KEY (`CWID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `Reservations_ibfk_1` FOREIGN KEY (`RA_Name`) REFERENCES `ResidenceArea` (`Name`),
  ADD CONSTRAINT `Reservations_ibfk_2` FOREIGN KEY (`CWID`) REFERENCES `Students` (`CWID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
