-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 12:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--
CREATE DATABASE IF NOT EXISTS `training` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `training`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pswd` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `pswd`) VALUES
(100, 'tiger', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(10) NOT NULL,
  `course_name` text NOT NULL,
  `price` float NOT NULL,
  `start_date` date NOT NULL,
  `stop_date` date NOT NULL,
  `schedule` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `price`, `start_date`, `stop_date`, `schedule`) VALUES
(101, 'weight lifting', 1000, '0000-00-00', '0000-00-00', 'onsite');

-- --------------------------------------------------------

--
-- Table structure for table `course_history`
--

DROP TABLE IF EXISTS `course_history`;
CREATE TABLE IF NOT EXISTS `course_history` (
  `course_history_id` int(10) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `ch_course_id` int(10) NOT NULL,
  PRIMARY KEY (`course_history_id`),
  KEY `ch_course_id` (`ch_course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_history`
--

INSERT INTO `course_history` (`course_history_id`, `reserve_id`, `date`, `ch_course_id`) VALUES
(1234, 665, '0000-00-00 00:00:00', 101);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(20) NOT NULL,
  `cust_name` text NOT NULL,
  `cust_trainerid` int(15) NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `cust_trainerid` (`cust_trainerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `cust_name`, `cust_trainerid`) VALUES
(200, 'kelvin', 556),
(201, 'ann', 556);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(15) NOT NULL,
  `member_usrname` text NOT NULL,
  `member_pwd` int(11) NOT NULL,
  `mem_customer_id` int(20) NOT NULL,
  KEY `mem_customer_id` (`mem_customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_usrname`, `member_pwd`, `mem_customer_id`) VALUES
(1001, 'test', 0, 200);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(10) NOT NULL,
  `service_type` text NOT NULL,
  `service_status` text NOT NULL,
  `ser_customer_id` int(20) NOT NULL,
  PRIMARY KEY (`service_id`),
  KEY `ser_customer_id` (`ser_customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_type`, `service_status`, `ser_customer_id`) VALUES
(1111, 'gym', 'in progress', 200);

-- --------------------------------------------------------

--
-- Table structure for table `service_history`
--

DROP TABLE IF EXISTS `service_history`;
CREATE TABLE IF NOT EXISTS `service_history` (
  `service_history_id` int(20) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `sh_customer_id` int(15) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`service_history_id`),
  KEY `sh_customer_id` (`sh_customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE IF NOT EXISTS `trainer` (
  `trainer_id` int(15) NOT NULL,
  `trainer_name` text NOT NULL,
  `trainer_course` text NOT NULL,
  `tele_number` int(11) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `trainer_course`, `tele_number`) VALUES
(556, 'yyyy', 'it', 89893489);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_history`
--
ALTER TABLE `course_history`
  ADD CONSTRAINT `course_history_ibfk_1` FOREIGN KEY (`ch_course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cust_trainerid`) REFERENCES `trainer` (`trainer_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`mem_customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`ser_customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `service_history`
--
ALTER TABLE `service_history`
  ADD CONSTRAINT `service_history_ibfk_1` FOREIGN KEY (`sh_customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
