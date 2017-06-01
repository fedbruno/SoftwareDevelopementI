-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 02:03 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Project3`
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

--
-- Dumping data for table `Reservations`
--

INSERT INTO `Reservations` (`RA_Name`, `CWID`, `Rerservation_Date`) VALUES
('Foy Townhouses', 20067267, '2016-11-19'),
('Midrise Hall', 20063728, '2016-11-21');

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
('Foy Townhouses', 5, 2, 1, 1, 1, 'Sophomore'),
('Fulton Street ', 5, 5, 1, 1, 1, 'Junior & Senior'),
('Leo Hall', 5, 5, 1, 1, 1, 'Freshman'),
('Lower West Cedar Townhouse', 5, 5, 1, 1, 1, 'Sophomore'),
('Marian Hall', 5, 5, 1, 0, 1, 'Freshman'),
('Midrise Hall', 5, 4, 1, 0, 1, 'Sophomore'),
('New Fulton Townhouses', 5, 5, 1, 1, 1, 'Junior & Senior'),
('New Townhouses', 5, 4, 1, 1, 1, 'Sophomore'),
('Sheahan Hall', 5, 5, 1, 1, 1, 'Freshman'),
('Talmadge Court', 5, 5, 1, 1, 1, 'Junior & Senior'),
('Upper West Cedar Townhouses', 5, 5, 1, 1, 1, 'Sophomore');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Name` varchar(30) NOT NULL,
  `CWID` int(8) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Class` varchar(30) NOT NULL,
  `Laundry` tinyint(1) NOT NULL,
  `Kitchen` tinyint(1) NOT NULL,
  `Special_Needs` tinyint(1) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`CWID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Name`, `CWID`, `Gender`, `Class`, `Laundry`, `Kitchen`, `Special_Needs`, `username`, `password`, `admin`, `email`) VALUES
('Federica', 200, 'F', 'Sophomore', 1, 0, 1, 'fedbruno', '*F5F7148B6A97711A056BDD3DE3AA70379F3A9C22', 0, 'fedbruno@marist.edu'),
('admin', 11111111, 'Y', 'N/A', 0, 0, 0, 'admin', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 1, 'admin@admin.com'),
('Nick', 20067267, 'M', 'Sophomore', 0, 1, 0, 'nklacik', '*6794E13B7D2F3ECCCFC7C7F10F52EC02CAE8DECC', 0, 'nickklacik@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
