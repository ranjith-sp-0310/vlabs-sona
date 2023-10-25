-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 07:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la catalogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(4) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `AdminEmail` varchar(50) NOT NULL,
  `AdminPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `AdminName`, `AdminEmail`, `AdminPass`) VALUES
(1, 'Chanukya', 'Chanukya@LaCatalogue.com', 'Password@123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(4) NOT NULL,
  `CartIN` varchar(100) NOT NULL,
  `CartIP` double NOT NULL,
  `CartFinalPrice` double DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `cardname` varchar(100) DEFAULT NULL,
  `cardno` double DEFAULT NULL,
  `cardtype` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `CartIN`, `CartIP`, `CartFinalPrice`, `mail`, `cardname`, `cardno`, `cardtype`) VALUES
(125, 'Guitar', 30000, 30000, 'MinodPerera@gmail.com', 'Minod Perera', 100020003000, 'MasterCard');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`firstname`, `lastname`, `email`, `comment`) VALUES
('Dilshan', 'Dil', 'Dilshan@gmail.com', 'hello 2022'),
('Minod', 'Perera', 'MinodPerera@gmail.com', 'This is feedback left before');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `ItemPrice` double NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Contact_No` varchar(30) NOT NULL,
  `ItemImage` varchar(1000) DEFAULT NULL,
  `ItemImgString` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `ItemName`, `ItemDescription`, `ItemPrice`, `Email`, `Contact_No`, `ItemImage`, `ItemImgString`) VALUES
(1, 'iPhone 13', 'The iPhone 13 and iPhone 13 mini iterate upon the successful iPhone 12 with new cameras and longer battery life. The notch has been reduced in size, and the rear camera module now sits at a diagonal. In addition, the A15 processor brings more speed and efficiency to every task.', 300000, '', '', NULL, '\"../images/productpage/iphone/apple-iphone-13-3.png\"'),
(2, 'Alienware X17', 'Alienware’s thinnest 17\" high-performance gaming laptop.', 400000, '', '', NULL, '\"../images/productpage/465-4659317_alienware-m17-gaming-laptop-hd-png-download.png\"'),
(3, 'Guitar', 'The top selling acoustic guitar series of all time. For over 40 years, millions of musicians have used a Yamaha FG as the perfect tool to express their music. FGs have earned their respect due to their quality, dependability, playability and value.', 30000, '', '', NULL, '\'../images/productpage/yamaha-semi-acoustic-guitar-fx370c.png\''),
(4, 'Ponds Face Cream', 'Presenting pond’s bright beauty, a revolutionary anti-spot solution bought to you by the pond’s institute. Its anti-spot formula with pro-vitamin b3 is clinically proven to fade stubborn dark spots from within.', 5000, '', '', NULL, '\'../images/productpage/ponds.png\''),
(5, 'T-Shirt', 'Durable stitch and Quality finish. These T-shirts are stitched for higher durability using the best technology in the industry. After stitching, these products are finished and Quality checked for Size and any kinds of defects before packing. ', 2000, '', '', NULL, '\'../images/productpage/tshirt.png\''),
(6, 'Galaxy Watch', 'Super AMOLED display with customizable Always on Watch faces. 24/7 Activity Tracking - 4 stage Sleep, Activity with continuous HRM and Stress monitoring. 39 built-in trackers with 50m Water Resistance.', 40000, '', '', NULL, '\'../images/productpage/galaxywatch.png\''),
(17, 'wristwatch', 'lorem ipsum', 2000, 'MinodPerera@gmail.com', '0770080945', 'Null', '../uploads/a168wegg-1aef-casio-vintage-800x800.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `UserID` int(4) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`UserID`, `UserName`, `UserEmail`, `UserPassword`) VALUES
(7, 'MinodPerera', 'MinodPerera@gmail.com', 'Password@123');

-- --------------------------------------------------------

--
-- Table structure for table `shippingdetails`
--

CREATE TABLE `shippingdetails` (
  `SID` int(4) NOT NULL,
  `SName` varchar(50) NOT NULL,
  `SNo` varchar(10) NOT NULL,
  `SAddress` varchar(300) NOT NULL,
  `SCity` varchar(300) NOT NULL,
  `SDistrict` varchar(300) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingdetails`
--

INSERT INTO `shippingdetails` (`SID`, `SName`, `SNo`, `SAddress`, `SCity`, `SDistrict`, `email`) VALUES
(9, 'Minod Perera', '0770080945', 'no. 5/3,', 'Colombo 5', 'Puttalam', 'MinodPerera@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `shippingdetails`
--
ALTER TABLE `shippingdetails`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `UserID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shippingdetails`
--
ALTER TABLE `shippingdetails`
  MODIFY `SID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
