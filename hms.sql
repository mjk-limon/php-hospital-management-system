-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2022 at 12:40 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '123456', '22-01-2022 01:11:21 PM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `apid` int(11) NOT NULL AUTO_INCREMENT,
  `patid` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `slno` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `prescription` text NOT NULL,
  PRIMARY KEY (`apid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `patid`, `docid`, `date`, `slno`, `status`, `prescription`) VALUES
(1, 1, 2, '2022-01-22 00:00:00', 0, 1, ''),
(7, 4, 1, '2022-01-23 15:35:00', 0, 0, ''),
(8, 5, 2, '2022-01-23 15:39:00', 0, 0, ''),
(9, 3, 2, '2022-01-23 15:42:00', 0, 0, ''),
(10, 1, 2, '2022-01-29 23:02:24', 0, 0, ''),
(12, 3, 3, '2022-02-01 13:00:00', 0, 0, ''),
(14, 1, 3, '2022-02-01 13:00:00', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `docQualification` tinytext NOT NULL,
  `docSchedule` text NOT NULL,
  `address` longtext NOT NULL,
  `docFees` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `docEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `docQualification`, `docSchedule`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dermatologists', 'Dr Sk Babu', 'MBBS - Abdul malek medical', '11:00-12:00', 'Sunflower Hospital, Room 500, Level 5', '600', 1755555550, 'sfsfsf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-22 08:33:15', ''),
(2, 'Dentist', 'Dr Imh Piash', '', '', 'Sunflower Hospital, Room 600, Level 6', '400', 17395896587, 'imhpiash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-22 08:34:29', ''),
(3, 'Dermatologists', 'Dr Altaf Hossain', 'BMBS - Sydney Medical College\r\nMBBS - Midfort College', '13:00-14:00\r\n15:00-16:00', 'Room 618, Level 6, Sunflower hospital', '450', 1512345678, 'altaf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-01 07:10:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

DROP TABLE IF EXISTS `doctorspecilization`;
CREATE TABLE IF NOT EXISTS `doctorspecilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Dermatologists', '2022-01-22 08:29:42', ''),
(2, 'Neurologist', '2022-01-22 08:30:37', ''),
(3, 'Dentist', '2022-01-22 08:30:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(90) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`patid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patid`, `fullname`, `gender`, `age`, `address`, `phone`, `datetime`, `blood_group`, `email`, `password`) VALUES
(1, 'Md Jahid Limon', 'Male', 75, 'Uttara Dhaka', '01956758055', '2022-01-22 09:38:19.000000', 'B+', 'jhmasterlimon11@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Foujia Khanom', 'Female', 30, 'Dhaka', '01956758055', '2022-01-22 16:56:31.000000', 'A+', 'foujia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Jubayer', 'Male', 20, 'Gajipur', '01333333333', '2022-01-23 07:52:36.000000', 'B+', 'jubayer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Fahim', 'Male', 30, 'Dhaka', '01755704390', '2022-01-23 13:12:46.000000', 'A+', 'fahim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `reciptionist`
--

DROP TABLE IF EXISTS `reciptionist`;
CREATE TABLE IF NOT EXISTS `reciptionist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipName` varchar(120) NOT NULL,
  `address` varchar(233) NOT NULL,
  `reccontact` varchar(233) NOT NULL,
  `recemail` varchar(233) NOT NULL,
  `password` varchar(233) NOT NULL,
  `updationDate` varchar(244) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reciptionist`
--

INSERT INTO `reciptionist` (`id`, `recipName`, `address`, `reccontact`, `recemail`, `password`, `updationDate`) VALUES
(1, 'Foujia Khanom', 'Sunflower Hospital, Room 300, Level 3', '01789456123', 'foujia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '');

-- --------------------------------------------------------

--
-- Table structure for table `testlist`
--

DROP TABLE IF EXISTS `testlist`;
CREATE TABLE IF NOT EXISTS `testlist` (
  `testlistid` int(11) NOT NULL AUTO_INCREMENT,
  `patid` int(11) NOT NULL,
  `invid` int(11) NOT NULL,
  `testid` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL,
  `deliverydate` date NOT NULL,
  `report` text NOT NULL,
  PRIMARY KEY (`testlistid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `testid` int(11) NOT NULL AUTO_INCREMENT,
  `testname` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `template` text NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testid`, `testname`, `price`, `template`) VALUES
(1, 'Blood', 400, ''),
(2, 'Sugar', 800, '');

-- --------------------------------------------------------

--
-- Table structure for table `test_bookings`
--

DROP TABLE IF EXISTS `test_bookings`;
CREATE TABLE IF NOT EXISTS `test_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `bookdate` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_bookings`
--

INSERT INTO `test_bookings` (`id`, `userid`, `testid`, `bookdate`, `status`) VALUES
(1, 1, 2, '2022-01-22 09:38:50', 2),
(3, 3, 1, '2022-01-24 21:04:02', 1),
(4, 1, 1, '2022-01-29 23:01:43', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
