-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2018 at 08:16 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(20) NOT NULL AUTO_INCREMENT,
  `isAdmin` tinyint(2) NOT NULL DEFAULT '0',
  `firstName` varchar(20) DEFAULT NULL,
  `middleName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `isAdmin`, `firstName`, `middleName`, `lastName`, `contactNumber`, `emailAddress`, `username`, `password`) VALUES
(5, 1, 'Demo', NULL, 'Demo', '09012345678', 'demo@demo.com', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(6, 0, 'Test', NULL, 'Test', '9065260321', 'hbaniqued@yopmail.com', 'qweqwe', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `amenity_id` int(255) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` float NOT NULL,
  `isCocoylandia` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `amenity_name`, `quantity`, `price`, `isCocoylandia`) VALUES
(1, 'Videokee', 10, 500, 1),
(4, 'Wer', 12, 12, 1),
(5, 'test', 12, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(200) NOT NULL AUTO_INCREMENT,
  `reservation_code` varchar(50) NOT NULL,
  `isReserved` tinyint(1) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `isModified` tinyint(1) NOT NULL DEFAULT '0',
  `isCancelled` tinyint(1) NOT NULL DEFAULT '0',
  `isDayTour` tinyint(1) NOT NULL DEFAULT '0',
  `total_adult` int(50) NOT NULL,
  `total_children` int(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `special_requirement` text NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `total_amount` double DEFAULT NULL,
  `amount_paid` decimal(6,0) NOT NULL DEFAULT '0',
  `bank_slip` varchar(255) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `deposit` double NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone_no` varchar(30) NOT NULL,
  `add_line1` varchar(100) NOT NULL,
  `add_line2` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL DEFAULT 'PH',
  `postcode` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL DEFAULT 'Philippines',
  `isCocoylandia` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `reservation_code`, `isReserved`, `isActive`, `isModified`, `isCancelled`, `isDayTour`, `total_adult`, `total_children`, `checkin_date`, `checkout_date`, `special_requirement`, `payment_status`, `total_amount`, `amount_paid`, `bank_slip`, `reference_number`, `deposit`, `booking_date`, `first_name`, `last_name`, `email`, `telephone_no`, `add_line1`, `add_line2`, `city`, `state`, `postcode`, `country`, `isCocoylandia`) VALUES
(23, 'UEQ5Kwnf', 0, 0, 0, 1, 0, 0, 0, '2018-02-14', '2018-02-15', '', 'Pending', 0, '0', NULL, NULL, 0, '2018-02-08 16:39:32', '', '', '', '', '', '', '', 'PH', '', 'Philippines', 0),
(24, 'wBGF6VSZ', 1, 2, 0, 0, 0, 0, 0, '2018-02-15', '2018-02-16', '', 'Pending', 0, '0', NULL, NULL, 0, '2018-02-08 16:40:00', 'aaa', 'aaa', 'hbaniqued@yopmail.com', '9065260321', 'aaa', 'aa', 'MArikina', 'PH', '1800', 'Philippines', 0),
(25, 'dWl8jQDX', 1, 0, 0, 1, 0, 0, 0, '2018-02-14', '2018-02-15', '', 'Pending', 2500, '0', NULL, NULL, 500, '2018-02-09 13:48:26', 'AAA', 'AAA', 'hbaniqued@yopmail.com', '9065260321', 'AAA', 'AAA', 'MArikina', 'PH', '1800', 'Philippines', 0),
(26, 'R9IrGHqm', 1, 0, 0, 1, 0, 0, 0, '2018-02-19', '2018-02-20', '', 'Fully Paid', 2500, '2500', 'img/bankslips/123.jpg', 'Testgin', 500, '2018-02-09 14:02:14', 'BBB', 'BBB', 'hbaniqued@yopmail.com', '9065260321', 'BBB', 'BBB', 'MArikina', 'PH', '1800', 'Philippines', 0),
(27, 'TpQX1GiI', 0, 0, 0, 0, 0, 0, 0, '2018-02-13', '2018-02-16', '', 'Pending', 7500, '0', NULL, NULL, 1500, '2018-02-10 03:07:51', 'Kamille', 'Balisi', 'haroldbaniqued@yahoo.com', '09065260321', 'Marikina', 'Marikina', 'Marikina', 'PH', '1800', 'Philippines', 0),
(28, 'nIYOep2F', 1, 2, 0, 0, 0, 0, 0, '2018-02-10', '2018-02-11', '', 'Pending', 100, '0', NULL, NULL, 20, '2018-02-10 08:38:12', 'Cocoy', 'Bato', 'hbaniqued@yopmail.com', '09324360197', 'Pasig', 'Pasig', 'Marikina', 'PH', '1800', 'Philippines', 1),
(29, 'lu5aPt13', 1, 0, 0, 1, 0, 0, 0, '2018-02-10', '2018-02-11', '', 'Pending', 100, '0', NULL, NULL, 20, '2018-02-10 08:42:19', 'Testing', 'Testing', 'hbaniqued@yopmail.com', '65465465', 'qweqweq', 'qwe', 'Marikina', 'PH', '1800', 'Philippines', 1),
(30, '8yvtA2IE', 1, 0, 0, 1, 0, 0, 0, '2018-02-10', '2018-02-10', '', 'Fully Paid', 100, '100', 'img/bankslips/b4.png', '1234567890', 20, '2018-02-10 11:34:55', 'Testing', 'Testing', 'hbaniqued@yopmail.com', '09324360197', 'Marikina', '', 'Marikina', 'PH', '1800', 'Philippines', 1),
(31, 'Axc5zPeq', 0, 0, 0, 0, 0, 0, 0, '2018-02-13', '2018-02-21', '', 'Pending', 29600, '0', NULL, NULL, 5920, '2018-02-13 06:43:18', 'Renz', 'Batallion', 'renzb@yopmail.com', '56654654646', 'OCDAWGS', '', 'Ex Batallion', 'PH', '4545', 'Philippines', 0),
(32, '6IKOGmCF', 0, 0, 0, 0, 0, 0, 0, '2018-02-13', '2018-02-14', '', 'Pending', 7500, '0', NULL, NULL, 1500, '2018-02-13 08:17:29', 'renz', 'bisleg', 'charles.alonzo@gmail.com', '0298185988', 'san juan', '', 'san juan', 'PH', '5489', 'Philippines', 0),
(33, 'NI0kfruQ', 0, 0, 0, 0, 0, 0, 0, '2018-02-13', '2018-02-14', '', 'Pending', 3000, '0', NULL, NULL, 600, '2018-02-13 08:22:39', 'renz', 'bisleg', 'qwe@yahoo.com', '05889495561', 'san juan', '', 'pasig', 'PH', '1899', 'Philippines', 1),
(34, '4BnRLdCq', 1, 2, 0, 0, 0, 0, 0, '2018-02-14', '2018-02-16', '', 'Pending', 6000, '1200', NULL, NULL, 1200, '2018-02-14 06:38:25', 'charles', 'alonzo', 'charles.alonzo@gmail.com', '09385624998', 'san juan', '', 'san juan', 'PH', '1588', 'Philippines', 0),
(35, '06ah4Pqw', 1, 0, 0, 1, 0, 0, 0, '2018-02-23', '2018-02-23', '', 'Cancelled', 3000, '0', NULL, NULL, 600, '2018-02-22 16:31:16', '', '', '', '', '', '', '', 'PH', '', 'Philippines', 1),
(36, 'z7NXAKu4', 1, 0, 0, 1, 0, 0, 0, '2018-02-23', '2018-02-23', '', 'Cancelled', 3000, '0', NULL, NULL, 600, '2018-02-22 16:31:57', 'Arnold', 'Baniqued', 'hbaniqued@yopmail.com', '9065260321', 'Marikina', 'Marikina', 'Marikina', 'PH', '', 'Philippines', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(20) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) DEFAULT NULL,
  `middleName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(50) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(255) NOT NULL AUTO_INCREMENT,
  `isCottage` tinyint(1) NOT NULL DEFAULT '0',
  `total_room` int(255) NOT NULL,
  `occupancy` int(255) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `view` varchar(30) DEFAULT NULL,
  `room_name` varchar(50) NOT NULL,
  `descriptions` text,
  `rate` double NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `isCocoylandia` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `isCottage`, `total_room`, `occupancy`, `size`, `view`, `room_name`, `descriptions`, `rate`, `imgpath`, `isCocoylandia`) VALUES
(5, 0, 1, 5, '', '', 'Family Rooms', 'Insert description here', 3000, 'img/family1.jpg', 0),
(6, 0, 14, 4, '50 sqft', 'None', 'Standard Room', 'Insert description here', 2500, 'img/standard1.jpg', 0),
(14, 1, 5, 10, '', '', 'Small Cottage', '', 700, 'img/cottageSmall.jpg', 0),
(15, 1, 30, 15, '', '', 'Medium Cottage', '', 1000, 'img/CottageMedium.jpg', 0),
(16, 1, 15, 20, '', '', 'Large Cottage', '', 1200, 'img/cottageLarge.jpg', 0),
(17, 1, 2, 30, '', '', 'Pavillion', '', 2500, 'img/pavillion.jpg', 0),
(18, 0, 2, 6, '', '', 'Family Room', '', 3000, 'img/FamilyRoom.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

DROP TABLE IF EXISTS `roombook`;
CREATE TABLE IF NOT EXISTS `roombook` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `totalroombook` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isCocoylandia` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
