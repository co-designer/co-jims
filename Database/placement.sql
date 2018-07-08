-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2016 at 10:53 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_details`
--

CREATE TABLE IF NOT EXISTS `academic_details` (
  `eno` varchar(11) NOT NULL,
  `xperc` decimal(5,2) DEFAULT NULL,
  `xyop` int(11) DEFAULT NULL,
  `xiiperc` decimal(5,2) DEFAULT NULL,
  `xiiyop` int(11) DEFAULT NULL,
  `course` varchar(4) DEFAULT NULL,
  `shift` char(1) NOT NULL,
  `batch` int(11) DEFAULT NULL,
  `gradperc` decimal(5,2) DEFAULT NULL,
  `ii` decimal(5,2) DEFAULT NULL,
  `iii` decimal(5,2) DEFAULT NULL,
  `iv` decimal(5,2) DEFAULT NULL,
  `backlogs` int(11) DEFAULT NULL,
  `maths` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_details`
--

INSERT INTO `academic_details` (`eno`, `xperc`, `xyop`, `xiiperc`, `xiiyop`, `course`, `shift`, `batch`, `gradperc`, `ii`, `iii`, `iv`, `backlogs`, `maths`) VALUES
('00614202014', NULL, NULL, NULL, NULL, 'BCA', 'M', NULL, NULL, NULL, NULL, NULL, NULL, ''),
('03114202014', NULL, NULL, NULL, NULL, 'BCA', 'M', NULL, NULL, NULL, NULL, NULL, NULL, ''),
('03214202014', NULL, NULL, NULL, NULL, 'BCA', 'M', NULL, NULL, NULL, NULL, NULL, NULL, ''),
('04514202014', '87.00', 2012, '90.00', 2014, 'BCA', 'M', 2014, '89.00', '84.00', '86.00', '88.00', 0, 'Yes'),
('04714202014', NULL, NULL, NULL, NULL, 'BCA', 'M', NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `eno` varchar(11) NOT NULL,
  `course` varchar(6) NOT NULL,
  `shift` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`eno`, `course`, `shift`) VALUES
('bbae_cc', 'BBA', 'E'),
('bbam_cc', 'BBA', 'M'),
('bcae_cc', 'BCA', 'E'),
('bcam_cc', 'BCA', 'M'),
('bjmce_cc', 'BJMC', 'E'),
('bjmcm_cc', 'BJMC', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `companyid` varchar(40) NOT NULL,
  `name` varchar(20) NOT NULL,
  `course` varchar(6) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `package` varchar(20) NOT NULL,
  `xperc` decimal(5,2) NOT NULL,
  `xiiperc` decimal(5,2) NOT NULL,
  `gradperc` decimal(5,2) NOT NULL,
  `backlogs` varchar(11) NOT NULL,
  `doi` date NOT NULL,
  `doa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyid`, `name`, `course`, `designation`, `package`, `xperc`, `xiiperc`, `gradperc`, `backlogs`, `doi`, `doa`) VALUES
('100', 'HCL', 'BCA', 'dssd', '20000', '60.00', '60.00', '60.00', '3', '2016-11-22', '2016-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `cv_details`
--

CREATE TABLE IF NOT EXISTS `cv_details` (
  `eno` varchar(11) NOT NULL,
  `cvfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_details`
--

INSERT INTO `cv_details` (`eno`, `cvfile`) VALUES
('00614202014', ''),
('03114202014', ''),
('03214202014', ''),
('04514202014', '1479493531.docx'),
('04714202014', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `eno` varchar(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `type` varchar(1) NOT NULL DEFAULT 'S',
  `verified` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`eno`, `password`, `email`, `type`, `verified`) VALUES
('00614202014', 'Op0-Ao.:a=e^', 'tanujjakhmola93@gmail.com', 'S', 0),
('03114202014', 'H*q$SM^V-,ri', 'sridhar94@hotmail.com', 'S', 0),
('03214202014', 'Hello@_123', 'samadahmed122@gmail.com', 'S', 1),
('04514202014', 'Hello@_123', 'piyush9083@gmail.com', 'S', 1),
('04714202014', 'Hello@_123', 'pwnkumar201@gmail.com', 'S', 0),
('admin_po', 'admin_po@123', 'jimsplacementcell2016@gmail.com', 'P', 1),
('bbae_cc', 'admin@123', NULL, 'C', 1),
('bbam_cc', 'admin@123', NULL, 'C', 1),
('bcae_cc', 'admin@123', NULL, 'C', 1),
('bcam_cc', 'admin@123', NULL, 'C', 1),
('bjmce_cc', 'admin@123', NULL, 'C', 1),
('bjmcm_cc', 'admin@123', NULL, 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
`S NO.` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`S NO.`, `name`, `description`, `date`) VALUES
(4, '1478006320.pdf', 'Test 3', '2016-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE IF NOT EXISTS `personal_details` (
  `eno` varchar(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `marital` varchar(20) NOT NULL,
  `path` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`eno`, `firstname`, `lastname`, `dob`, `gender`, `fathername`, `address`, `mobileno`, `state`, `city`, `marital`, `path`) VALUES
('00614202014', 'Tanuj', 'Jakhmola', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL),
('03114202014', 'D.', 'Sridhar', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL),
('03214202014', 'Samad', 'Ahmed', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL),
('04514202014', 'Piyush', 'Goel', '1996-11-05', 'male', 'Naveen Goel', 'F-112 , Block C , Aazadpur Mandi', '9560061369', 'Delhi', 'New Delhi', 'Unmarried', '1479483006.jpg'),
('04714202014', 'Pawan', 'Kumar', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_details`
--
ALTER TABLE `academic_details`
 ADD UNIQUE KEY `eno` (`eno`), ADD KEY `eno_2` (`eno`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD UNIQUE KEY `eno_2` (`eno`), ADD KEY `eno` (`eno`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`companyid`), ADD KEY `companyid` (`companyid`);

--
-- Indexes for table `cv_details`
--
ALTER TABLE `cv_details`
 ADD UNIQUE KEY `eno_2` (`eno`), ADD KEY `eno` (`eno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`eno`), ADD UNIQUE KEY `eno_2` (`eno`), ADD UNIQUE KEY `email` (`email`), ADD KEY `eno` (`eno`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
 ADD PRIMARY KEY (`S NO.`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
 ADD UNIQUE KEY `eno_2` (`eno`), ADD KEY `eno` (`eno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
MODIFY `S NO.` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_details`
--
ALTER TABLE `academic_details`
ADD CONSTRAINT `academic_details_ibfk_1` FOREIGN KEY (`eno`) REFERENCES `login` (`eno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`eno`) REFERENCES `login` (`eno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cv_details`
--
ALTER TABLE `cv_details`
ADD CONSTRAINT `cv_details_ibfk_1` FOREIGN KEY (`eno`) REFERENCES `login` (`eno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_details`
--
ALTER TABLE `personal_details`
ADD CONSTRAINT `personal_details_ibfk_1` FOREIGN KEY (`eno`) REFERENCES `login` (`eno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
