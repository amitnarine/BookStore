-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2021 at 06:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore1.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `UserID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `CartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `ISBN` int(13) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for order `cart`
--

CREATE TABLE `order` (
  `OrderNum` int(10) NOT NULL,
  `OrderDate` varchar(255) NOT NULL,
  `OrderItems` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



 INSERT INTO `order` (`OrderNum`, `OrderDate`, `OrderItems`, `Total`) VALUES
(1, '10/25/22', '10','10.00'),
(2, '11/12/22', '5','11.56'),
(3, '12/23/22', '9','2.56');

-- --------------------------------------------------------
--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promoID` int(10) NOT NULL,
  `promoName` varchar(255) NOT NULL,
  `priceOff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `promo` (`promoID`, `promoName`,`priceOff`) VALUES
(1, '10off','10%'),
(2, '20off', '20%');
-- --------------------------------------------------------
--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `ISBN` int(13) NOT NULL,
  `Price` float NOT NULL,
  `Image` varchar(255) NOT NULL,
  `ProductDescription` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`,`Author`,`ISBN`, `Price`, `Image`, `ProductDescription`, `Subject`) VALUES
(1, 'English','Tim', 1234567891234, 0.99, 'images/books.jpg', 'A textbook.', 'English'),
(2, 'Physics', 'Tim', 1234567891234, 4.99, 'images/books.jpg', 'A textbook.', 'Physics'),
(3, 'Math', 'Tim', 1234567891234, 15.99, 'images/books.jpg', 'A textbook.', 'Math'),
(4, 'Chem', 'Tim', 1234567891234, 1.99, 'images/books.jpg', 'A textbook.', 'Chemistry'),
(5, 'History','Tim', 1234567891234, 3.99, 'images/books.jpg', 'A textbook.', 'History'),
(6, 'Literature', 'Tim', 1234567891234, 1.99, 'images/books.jpg', 'A textbook.', 'Literature'),
(7, 'Georgraphy', 'Tim', 1234567891234, 0.99, 'images/books.jpg', 'A textbook.', 'Geography');


CREATE TABLE `reserved` (
  `UserID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `DateAdded` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Birthdate` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `Subscribed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Email`, `Birthdate`, `Address`, `Password`, `type`, `Subscribed`) VALUES
(1, '123', '123@gmail.com','01/01/2000','500 Baxter Street', '123', 'user' , NULL),
(2, '321', '321@gmail.com','01/01/2000','500 Baxter Street', '321', 'user', NULL),
(3, '12345', '12345@gmail.com','01/01/2000','500 Baxter Street', '12345', 'user', NULL),
(4, '444', '444@gmail.com','01/01/2000','500 Baxter Street', '444', 'user', NULL),
(5, 'admin', 'admin@gmail.com','01/01/2000','500 Baxter Street', 'admin', 'admin', NULL),
(6, 'owner', 'owner@gmail.com','01/01/2000','500 Baxter Street', 'owner', 'vendor', NULL);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderNum`);
 

 

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);
--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promoID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
