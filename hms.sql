-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2019 at 07:40 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'admin', 'amit1234', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `apid` int(11) NOT NULL AUTO_INCREMENT,
  `patid` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `date` date NOT NULL,
  `slno` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `prescription` text NOT NULL,
  PRIMARY KEY (`apid`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `patid`, `docid`, `date`, `slno`, `status`, `prescription`) VALUES
(11, 2, 11, '2018-07-23', 0, 1, '4h4'),
(12, 1, 11, '2018-07-23', 0, 0, ''),
(13, 1, 12, '2018-07-23', 0, 1, 'jshdshjhd'),
(14, 1, 12, '2018-07-23', 0, 0, ''),
(15, 4, 11, '2018-07-23', 0, 1, 'hggjhgjgjgjgugyu\r\nhjjkhk\r\nbjhguy'),
(16, 4, 12, '2018-07-23', 0, 1, 'kjvkvj\r\nvjkll\r\nfjbklf\r\nkbl'),
(17, 1, 12, '2018-07-23', 0, 0, ''),
(18, 6, 12, '2018-07-23', 0, 0, ''),
(19, 4, 11, '2018-07-23', 0, 1, 'dfdf'),
(20, 1, 11, '2018-07-26', 0, 0, ''),
(21, 4, 11, '2018-07-26', 0, 0, ''),
(22, 3, 11, '2018-07-26', 0, 0, ''),
(23, 2, 11, '2018-07-26', 0, 0, ''),
(24, 5, 11, '2018-07-26', 0, 0, ''),
(25, 6, 11, '2018-07-26', 0, 0, ''),
(26, 1, 11, '2018-07-26', 0, 0, ''),
(27, 2, 11, '2018-07-26', 0, 1, ''),
(28, 3, 11, '2018-07-26', 0, 0, ''),
(29, 4, 11, '2018-07-26', 0, 0, ''),
(30, 5, 11, '2018-07-26', 0, 0, ''),
(31, 6, 11, '2018-07-26', 0, 1, 'need rest'),
(32, 1, 11, '2018-07-26', 0, 0, ''),
(33, 1, 11, '2018-07-26', 0, 0, ''),
(34, 2, 11, '2018-07-26', 0, 1, 'you need rest'),
(35, 3, 11, '2018-07-26', 0, 1, 'rest '),
(36, 3, 11, '2018-07-26', 0, 1, ''),
(37, 4, 11, '2018-07-26', 0, 1, 'You need to go Singapur'),
(38, 4, 11, '2018-07-26', 0, 1, 'something'),
(39, 1, 11, '2018-07-26', 0, 0, ''),
(40, 1, 11, '2018-07-26', 0, 0, ''),
(41, 3, 11, '2018-07-26', 0, 1, 'asdfg'),
(48, 1, 11, '2018-09-07', 1, 0, ''),
(49, 2, 11, '2018-09-07', 2, 1, 'You need to go USA'),
(50, 2, 3, '2019-04-06', 0, 0, ''),
(51, 2, 6, '2019-04-09', 0, 0, ''),
(52, 17, 13, '2019-04-29', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

DROP TABLE IF EXISTS `consumer`;
CREATE TABLE IF NOT EXISTS `consumer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pname` varchar(25) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `prids` varchar(900) NOT NULL,
  `prqties` varchar(900) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`id`, `pname`, `age`, `gender`, `phone`, `date`, `prids`, `prqties`) VALUES
(1, 'sadia', 88, 'Female', '324141', '2018-12-19', '', ''),
(25, 'JIbon', 19, 'Male', '01834355833', '2017-10-20', '', ''),
(26, 'hadi', 23, 'Male', '9858585', '2018-11-10', '', ''),
(27, 'Mamun', 22, 'Male', '72161767', '2018-11-12', '', ''),
(28, 'amit', 23, 'Male', '01822765566', '2018-11-12', '', ''),
(29, 'amit', 23, 'Male', '01822765566', '2018-11-12', '', ''),
(30, 'amit', 23, 'Male', '01822765566', '2018-11-12', '', ''),
(31, 'amit', 23, 'Male', '01822765566', '2018-11-12', '', ''),
(32, 'amit', 23, 'Male', '01822765566', '2018-11-12', '', ''),
(33, 'Mizan', 34, 'Male', '4565655', '2018-11-25', '', ''),
(34, 'Hadi', 23, 'Male', '01654873492', '2018-12-18', '', ''),
(35, 'Hadi', 23, 'Male', '01654873492', '2018-12-18', '', ''),
(36, 'Hadi', 23, 'Male', '01654873492', '2018-12-18', '', ''),
(37, 'Shabiha Akter', 22, 'Female', '1915566754', '2019-04-06', '3,5', '20,1');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `docFees` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `docEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(3, 'General Physician', 'Nitesh Kumar', 'Ghaziabad', '1200', 8523699999, 'nitesh@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:43:35', ''),
(4, 'Homeopath', 'Vijay Verma', 'New Delhi', '700', 25668888, 'vijay@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:45:09', ''),
(5, 'Ayurveda', 'Sanjeev', 'Gurugram', '8050', 442166644646, 'sanjeev@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:47:07', ''),
(6, 'General Physician', 'Amrita', 'New Delhi India', '2500', 45497964, 'amrita@test.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:52:50', ''),
(7, 'Demo test', 'abc ', 'xyz', '200', 852888888, 'test@demo.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:08:58', ''),
(8, 'Homeopath', 'samim', 'uttara sector 10 uttara dhaka', '2000', 91098108410, 's@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-01-28 19:05:06', ''),
(9, 'Dentist', 'amit', 'utttara', '2000', 91098108410, 'a@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2019-01-28 19:15:46', ''),
(10, 'Ear-Nose-Throat (Ent) Specialist', 'ashim goswami', 'uttara 10 no sector,Dhaka', '1000', 17243701817, 'as@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-02-22 18:58:24', ''),
(11, 'General Physician', 'Raju', 'uttara,dhaka', '2000', 17243701819, 'd@gmail.com', 'ce8724150e6fdcad631f5432d5c9dc3d', '2019-03-02 16:39:06', ''),
(12, 'Dermatologist', 'rinki', 'Asdsfg', '500', 1724370817, 'mjk.limon@outlook.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-03-09 11:36:44', ''),
(13, 'heart specialist ', 'Dr. Samim Sharkar', 'Gazipur ', '1000', 1967456893, 'samim@gmail.com', 'ce8724150e6fdcad631f5432d5c9dc3d', '2019-03-09 18:36:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

DROP TABLE IF EXISTS `doctorslog`;
CREATE TABLE IF NOT EXISTS `doctorslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 2, 'sarita@gmail.com', 0x30000000000000000000000000000000, '2017-01-06 05:53:31', '', 1),
(2, 0, 'admin', 0x3a3a3100000000000000000000000000, '2017-01-06 06:36:07', '', 0),
(3, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-06 06:36:37', '06/01/2017 07:36:45', 1),
(4, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-06 06:41:33', '12:11:46', 1),
(5, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-06 06:55:16', '06-01-2017 12:27:47 PM', 1),
(6, 0, 'admin', 0x3a3a3100000000000000000000000000, '2017-01-06 07:07:12', '', 0),
(7, 0, 'info@w3gang.com', 0x3a3a3100000000000000000000000000, '2017-01-07 08:04:42', '', 0),
(8, 0, 'info@w3gang.com', 0x3a3a3100000000000000000000000000, '2017-01-07 08:04:55', '', 0),
(9, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-07 08:05:54', '07-01-2017 01:36:28 PM', 1),
(10, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2019-01-23 10:49:37', '23-01-2019 04:20:46 PM', 1),
(11, 0, 'admin', 0x3a3a3100000000000000000000000000, '2019-01-28 19:01:02', '', 0),
(12, 0, 'hosne@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-28 19:10:49', '', 0),
(13, 0, 'hosne@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-28 19:11:54', '29-01-2019 01:51:35 AM', 0),
(14, 9, 'a@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-28 19:16:06', '29-01-2019 12:52:30 AM', 1),
(15, 9, 'a@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-28 20:15:35', '', 1),
(16, 0, 'eron', 0x3a3a3100000000000000000000000000, '2019-02-05 10:16:39', '', 0),
(17, 0, 'admin', 0x3a3a3100000000000000000000000000, '2019-02-05 15:15:18', '', 0),
(18, 10, 'as@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-22 19:03:05', '', 1),
(19, 10, 'as@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-22 19:03:20', '', 1),
(20, 10, 'as@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-22 19:03:29', '', 1),
(21, 0, 'as@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-22 19:08:07', '02-04-2019 11:38:05 AM', 0),
(22, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-02 16:40:38', '', 1),
(23, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-03 18:14:34', '', 1),
(24, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-03 18:16:21', '', 1),
(25, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-03 18:20:32', '03-03-2019 11:53:28 PM', 1),
(26, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-03 18:26:31', '04-03-2019 01:38:13 AM', 1),
(27, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-03 20:08:26', '04-03-2019 01:39:36 AM', 1),
(28, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-04 04:51:55', '04-03-2019 10:22:19 AM', 1),
(29, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-04 04:54:33', '04-03-2019 10:25:15 AM', 1),
(30, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-04 08:35:46', '04-03-2019 02:08:20 PM', 1),
(31, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-08 07:54:44', '08-03-2019 01:27:31 PM', 1),
(32, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-08 09:40:41', '08-03-2019 03:10:55 PM', 1),
(33, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-08 09:51:09', '08-03-2019 03:21:25 PM', 1),
(34, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-08 09:57:00', '08-03-2019 03:28:05 PM', 1),
(35, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-09 08:03:19', '09-03-2019 03:05:08 PM', 1),
(36, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-09 09:40:34', '09-03-2019 03:11:22 PM', 1),
(37, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-09 09:44:17', '09-03-2019 04:58:57 PM', 1),
(38, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-09 11:59:16', '09-03-2019 05:29:41 PM', 1),
(39, 13, 'samim@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-09 18:37:46', '29-04-2019 06:32:00 PM', 1),
(40, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-09 18:40:34', '10-03-2019 12:11:21 AM', 1),
(41, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-09 18:41:40', '10-03-2019 01:42:41 AM', 1),
(42, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-10 04:51:11', '', 1),
(43, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-10 04:57:46', '10-03-2019 10:30:02 AM', 1),
(44, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-11 07:12:25', '', 1),
(45, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-11 07:20:52', '11-03-2019 12:52:28 PM', 1),
(46, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-13 20:35:44', '14-03-2019 02:05:51 AM', 1),
(47, 11, 'r@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-17 19:37:40', '27-03-2019 05:58:57 PM', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(2, 'General Physician', '2016-12-28 06:38:12', '29-04-2019 06:32:46 PM'),
(3, 'Dermatologist', '2016-12-28 06:38:48', ''),
(4, 'heart specialist ', '2019-03-09 18:15:49', ''),
(5, 'Cardiologists ', '2019-03-09 18:26:56', ''),
(6, 'Cardiologists ', '2019-03-09 18:26:56', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invid` int(11) NOT NULL AUTO_INCREMENT,
  `patid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`invid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invid`, `patid`, `datetime`, `total`) VALUES
(13, 1, '2018-07-19 15:34:50', 400),
(14, 1, '2018-07-23 14:33:51', 5000),
(15, 1, '2018-07-23 15:02:09', 5000),
(16, 1, '2018-07-23 15:02:20', 5000),
(17, 4, '2018-07-24 02:08:42', 500),
(18, 4, '2018-07-24 03:43:35', 1500),
(19, 4, '2018-07-24 03:44:45', 500),
(20, 2, '2019-03-27 19:15:32', 1800),
(21, 2, '2019-03-27 19:18:12', 1800),
(22, 10, '2019-03-27 19:24:21', 600),
(23, 2, '2019-03-27 19:44:28', 1000),
(24, 2, '2019-03-27 19:45:44', 6000),
(25, 2, '2019-04-02 14:33:26', 1900),
(26, 2, '2019-04-21 16:08:31', 900),
(27, 17, '2019-04-29 19:00:32', 900);

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
  `problems` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(90) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adid` int(50) NOT NULL,
  PRIMARY KEY (`patid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patid`, `fullname`, `gender`, `age`, `problems`, `address`, `phone`, `datetime`, `blood_group`, `email`, `password`, `adid`) VALUES
(2, 'Rehana Parvin', 'Female', 22, '', 'Gazipur', '1915566754', '2018-07-19 15:17:17.000000', 'O+', 'p@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 60),
(3, 'Shabiha Akter', 'Female', 22, '', 'Savar', '1915566754', '2018-07-19 15:18:12.000000', 'A+', 'shabiha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 61),
(4, 'Farmadi Tousi', 'Male', 22, '', 'Comilla', '1915566754', '2018-07-19 15:19:07.000000', 'B+', 'tousi@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 62),
(5, 'Suvrho Mojumdar', 'Male', 22, '', 'Tangail', '1915566754', '2018-07-19 15:20:04.000000', 'B+', 'suvrho@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 63),
(6, 'Sharmin Akter', 'Female', 22, '', 'Mirpur,Dhaka', '1915566754', '2018-08-03 00:00:00.000000', 'B+', 'nipa@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(9, 'Raihan Subhan', 'Male', 22, '', 'Uttara, Dhaka', '1111119', '2018-08-03 17:02:15.000000', 'AB-', 'raihan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(10, 'Sanjida siddique', 'Female', 22, '', 'Uttara, Dhaka', '01915566754', '2018-08-03 17:09:11.000000', 'B-', 'shapla@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 75),
(11, 'Rabiul Alam', 'Male', 22, '', 'Savar', '01915566754', '2018-08-03 17:15:40.000000', 'B-', 'ratul@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(16, 'samim', 'male', 32, 'gastrict', 'uttara, dhaka', '0102850925', '0000-00-00 00:00:00.000000', 'ab+', 'sak@gmail.com', 'ce8724150e6fdcad631f5432d5c9dc3d', 61),
(17, 'Saifur Rahman', 'Male', 23, 'Fever', 'Badda Dhaka', '01967234567', '2019-04-29 00:00:00.000000', 'O+', 'saifur@gmail.com', 'e9127d8dddf46f0826a5fa3b3b76223c', 23);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
CREATE TABLE IF NOT EXISTS `pharmacist` (
  `pha_id` int(123) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `postal_address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `salary` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`pha_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pha_id`, `first_name`, `last_name`, `postal_address`, `phone`, `email`, `salary`, `password`, `type`) VALUES
(8, 'amit', 'goswami', 'faridpur', '01724370817', 'ph@gmail.com', '400000', 'e10adc3949ba59abbe56e057f20f883e', 'Pharm');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reciptionist`
--

INSERT INTO `reciptionist` (`id`, `recipName`, `address`, `reccontact`, `recemail`, `password`, `updationDate`) VALUES
(2, 'samim khan', 'uttara', '01822345834', 'r@gmail.com', 'd04d6ae54e92b63aa38d69b17495017c', '16-03-2019 02:52:28 AM');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  `seat` varchar(2) NOT NULL,
  `cost` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `seat`, `cost`, `type`, `status`) VALUES
(1, 501, 'A', 2000, 'M-D', 0),
(2, 501, 'B', 2000, 'M-D', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_admissions`
--

DROP TABLE IF EXISTS `room_admissions`;
CREATE TABLE IF NOT EXISTS `room_admissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomId` int(11) NOT NULL,
  `pName` varchar(900) NOT NULL,
  `pAge` int(11) NOT NULL,
  `pGender` varchar(10) NOT NULL,
  `pMobile` varchar(20) NOT NULL,
  `adDate` date NOT NULL,
  `lDate` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_admissions`
--

INSERT INTO `room_admissions` (`id`, `roomId`, `pName`, `pAge`, `pGender`, `pMobile`, `adDate`, `lDate`) VALUES
(1, 1, 'Shabiha Akter', 22, 'Female', '1915566754', '2019-04-10', '2019-04-10'),
(2, 2, 'Raihan Subhan', 22, 'Male', '1111119', '2019-04-10', '2019-04-10'),
(3, 2, 'Rehana Parvin', 22, 'Female', '1915566754', '2019-04-29', '2019-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(5) NOT NULL,
  `drug_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `company` varchar(35) NOT NULL,
  `supplier` varchar(35) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` int(10) NOT NULL,
  `status` enum('Available','Inavailable') NOT NULL,
  `date_supplied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `drug_name`, `category`, `description`, `company`, `supplier`, `quantity`, `cost`, `status`, `date_supplied`) VALUES
(3, 'Trevox', 'Tablet', 'kljljol    \r\n                                        ', 'Squire', 'Squire', 166, 25, 'Available', '2017-10-22'),
(4, 'Amodis', 'Tablet', '    edgdgd\r\n                                        ', 'Squire', 'beximco', 112, 5, 'Available', '2017-10-26'),
(5, 'napa', 'tablet', 'dfgdfgdf                                            ', 'Squire', 'Squire', 1000, 3, 'Available', '2017-11-26'),
(7, 'napa Extra', 'tablet', 'dgdfghdfg    \r\n                                        ', 'Squire', 'Squire', 281, 2, 'Available', '2017-11-26'),
(8, 'Bicozin', 'tablet', 'kjhfgsdjh    \r\n                                        ', 'Arotofarma', 'Arotofarma', 335, 3, 'Available', '2017-11-27'),
(11, 'Napa', 'Tablet', 'fsdfsdfsdfsdf                                            ', 'Renata Ltd', 'Renata Ltd', 235, 3, 'Available', '2017-12-12'),
(12, 'Ach Plus', 'Tab', '    Antibiotic                                        ', 'Zmt', 'Gazi', 300, 3, 'Available', '2018-12-18'),
(0, 'sarjel', 'tablet', '    hgjkghjjkkj\r\n                                        ', 'vescimco', 'afdafda', 500, 10, 'Available', '2018-12-19'),
(0, 'histacin', 'tablet', 'gfdgfhbv bbnmn,m', 'vescimco', 'vescimco', 300, 5, 'Available', '2019-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `suggesttest`
--

DROP TABLE IF EXISTS `suggesttest`;
CREATE TABLE IF NOT EXISTS `suggesttest` (
  `suggestid` int(11) NOT NULL AUTO_INCREMENT,
  `apid` int(11) NOT NULL,
  `patid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  PRIMARY KEY (`suggestid`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggesttest`
--

INSERT INTO `suggesttest` (`suggestid`, `apid`, `patid`, `testid`) VALUES
(8, 1, 1, 1),
(9, 1, 1, 1),
(10, 1, 1, 5),
(11, 2, 2, 7),
(12, 1, 1, 1),
(13, 1, 1, 5),
(14, 1, 1, 1),
(15, 1, 1, 5),
(16, 9, 1, 1),
(17, 9, 1, 5),
(18, 10, 1, 5),
(19, 10, 1, 6),
(20, 11, 2, 5),
(21, 13, 1, 5),
(22, 15, 4, 6),
(23, 16, 4, 5),
(24, 19, 4, 5),
(25, 41, 3, 1),
(26, 37, 4, 5),
(27, 37, 4, 6),
(28, 49, 2, 7),
(29, 49, 2, 8),
(30, 38, 4, 1),
(31, 38, 4, 6),
(32, 35, 3, 6),
(33, 35, 3, 6),
(34, 35, 3, 1),
(35, 35, 3, 5),
(36, 34, 2, 1),
(37, 34, 2, 5),
(38, 34, 2, 6),
(39, 31, 6, 6),
(40, 36, 3, 1),
(41, 36, 3, 5),
(42, 27, 2, 6),
(43, 27, 2, 7),
(44, 27, 2, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testlist`
--

INSERT INTO `testlist` (`testlistid`, `patid`, `invid`, `testid`, `status`, `deliverydate`, `report`) VALUES
(28, 1, 13, 1, 3, '2018-07-23', '<p>sdjsjdosaodsaodojsaoid</p>\r\n'),
(29, 1, 14, 1, 3, '2018-07-24', '<p>asdfg</p>\r\n'),
(30, 1, 14, 1, 1, '2018-07-10', ''),
(31, 1, 14, 5, 0, '0000-00-00', ''),
(32, 1, 14, 1, 0, '0000-00-00', ''),
(33, 1, 14, 5, 0, '0000-00-00', ''),
(34, 1, 14, 1, 0, '0000-00-00', ''),
(35, 1, 14, 5, 0, '0000-00-00', ''),
(36, 1, 14, 1, 0, '0000-00-00', ''),
(37, 1, 14, 5, 0, '0000-00-00', ''),
(38, 1, 14, 5, 0, '0000-00-00', ''),
(39, 1, 14, 6, 0, '0000-00-00', ''),
(40, 1, 15, 1, 0, '0000-00-00', ''),
(41, 1, 15, 1, 0, '0000-00-00', ''),
(42, 1, 15, 5, 0, '0000-00-00', ''),
(43, 1, 15, 1, 0, '0000-00-00', ''),
(44, 1, 15, 5, 0, '0000-00-00', ''),
(45, 1, 15, 1, 0, '0000-00-00', ''),
(46, 1, 15, 5, 0, '0000-00-00', ''),
(47, 1, 15, 1, 0, '0000-00-00', ''),
(48, 1, 15, 5, 0, '0000-00-00', ''),
(49, 1, 15, 5, 0, '0000-00-00', ''),
(50, 1, 15, 6, 0, '0000-00-00', ''),
(51, 1, 16, 1, 0, '0000-00-00', ''),
(52, 1, 16, 1, 0, '0000-00-00', ''),
(53, 1, 16, 5, 0, '0000-00-00', ''),
(54, 1, 16, 1, 0, '0000-00-00', ''),
(55, 1, 16, 5, 0, '0000-00-00', ''),
(56, 1, 16, 1, 0, '0000-00-00', ''),
(57, 1, 16, 5, 0, '0000-00-00', ''),
(58, 1, 16, 1, 0, '0000-00-00', ''),
(59, 1, 16, 5, 0, '0000-00-00', ''),
(60, 1, 16, 5, 0, '0000-00-00', ''),
(61, 1, 16, 6, 0, '0000-00-00', ''),
(62, 4, 17, 6, 3, '2018-07-23', '<p>Everything is Good...!</p>\r\n'),
(63, 4, 18, 6, 0, '0000-00-00', ''),
(64, 4, 18, 5, 0, '0000-00-00', ''),
(65, 4, 18, 5, 0, '0000-00-00', ''),
(66, 4, 19, 5, 0, '0000-00-00', ''),
(67, 2, 21, 5, 0, '2019-03-27', ''),
(68, 2, 21, 6, 0, '2019-03-27', ''),
(69, 2, 21, 7, 0, '2019-03-27', ''),
(70, 10, 22, 8, 0, '2019-03-27', ''),
(71, 2, 23, 5, 0, '2019-03-27', ''),
(72, 2, 23, 6, 0, '2019-03-27', ''),
(73, 2, 24, 7, 0, '2019-03-27', ''),
(74, 2, 24, 5, 0, '2019-03-27', ''),
(75, 2, 24, 7, 0, '2019-03-27', ''),
(76, 2, 24, 8, 0, '2019-03-27', ''),
(77, 2, 24, 1, 0, '2019-03-27', ''),
(78, 2, 24, 5, 0, '2019-03-27', ''),
(79, 2, 24, 6, 0, '2019-03-27', ''),
(80, 2, 24, 6, 0, '2019-03-27', ''),
(81, 2, 24, 7, 0, '2019-03-27', ''),
(82, 2, 24, 8, 0, '2019-03-27', ''),
(83, 2, 25, 6, 0, '2019-04-02', ''),
(84, 2, 25, 7, 0, '2019-04-02', ''),
(85, 2, 25, 8, 0, '2019-04-02', ''),
(86, 2, 26, 1, 0, '2019-04-21', ''),
(87, 2, 26, 5, 0, '2019-04-21', ''),
(88, 17, 27, 1, 0, '2019-04-29', ''),
(89, 17, 27, 5, 0, '2019-04-29', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testid`, `testname`, `price`, `template`) VALUES
(1, 'Blood', 400, ''),
(5, 'Sugar', 500, ''),
(6, 'Cholesterol', 500, ''),
(7, 'Liver', 800, ''),
(8, 'Kidney', 600, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
