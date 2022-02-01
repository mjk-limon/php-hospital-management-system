-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 08:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '123456', '22-01-2022 01:11:21 PM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apid` int(11) NOT NULL,
  `patid` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `slno` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `prescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `patid`, `docid`, `date`, `slno`, `status`, `prescription`) VALUES
(1, 1, 2, '2022-01-22 00:00:00', 0, 1, ''),
(7, 4, 1, '2022-01-23 15:35:00', 0, 0, ''),
(8, 5, 2, '2022-01-23 15:39:00', 0, 0, ''),
(9, 3, 2, '2022-01-23 15:42:00', 0, 0, ''),
(10, 1, 2, '2022-01-29 23:02:24', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `docFees` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `docEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dermatologists', 'Dr Sk Babu', 'Sunflower Hospital, Room 500, Level 5', '600', 1755555550, 'sfsfsf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-22 08:33:15', ''),
(2, 'Dentist', 'Dr Imh Piash', 'Sunflower Hospital, Room 600, Level 6', '400', 17395896587, 'imhpiash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-22 08:34:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `patients` (
  `patid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(90) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `reciptionist` (
  `id` int(11) NOT NULL,
  `recipName` varchar(120) NOT NULL,
  `address` varchar(233) NOT NULL,
  `reccontact` varchar(233) NOT NULL,
  `recemail` varchar(233) NOT NULL,
  `password` varchar(233) NOT NULL,
  `updationDate` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reciptionist`
--

INSERT INTO `reciptionist` (`id`, `recipName`, `address`, `reccontact`, `recemail`, `password`, `updationDate`) VALUES
(1, 'Foujia Khanom', 'Sunflower Hospital, Room 300, Level 3', '01789456123', 'foujia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '');

-- --------------------------------------------------------

--
-- Table structure for table `testlist`
--

CREATE TABLE `testlist` (
  `testlistid` int(11) NOT NULL,
  `patid` int(11) NOT NULL,
  `invid` int(11) NOT NULL,
  `testid` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL,
  `deliverydate` date NOT NULL,
  `report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testid` int(11) NOT NULL,
  `testname` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `test_bookings` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `bookdate` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_bookings`
--

INSERT INTO `test_bookings` (`id`, `userid`, `testid`, `bookdate`, `status`) VALUES
(1, 1, 2, '2022-01-22 09:38:50', 2),
(3, 3, 1, '2022-01-24 21:04:02', 1),
(4, 1, 1, '2022-01-29 23:01:43', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patid`);

--
-- Indexes for table `reciptionist`
--
ALTER TABLE `reciptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testlist`
--
ALTER TABLE `testlist`
  ADD PRIMARY KEY (`testlistid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `test_bookings`
--
ALTER TABLE `test_bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reciptionist`
--
ALTER TABLE `reciptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testlist`
--
ALTER TABLE `testlist`
  MODIFY `testlistid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_bookings`
--
ALTER TABLE `test_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
