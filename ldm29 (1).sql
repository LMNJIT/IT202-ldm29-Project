 -- Luka Mayer
-- 4/16/2024
-- IT202 Internet Applications | Section 006
-- Phase 5 Assignment: Read SQL Data with PHP and Javascript
-- ldm29@njit.edu 
-- Version 1.0

-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Apr 17, 2024 at 02:19 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ldm29`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
`adminID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'admin@myguitarshop.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Admin', 'User'),
(2, 'joel@murach.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Joel', 'Murach'),
(3, 'mike@murach.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Mike', 'Murach'),
(4, 'ldm29@njit.edu', 'pass321', 'L', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Guitars'),
(2, 'Basses'),
(3, 'Drums'),
(4, 'Piano');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `orderDate`) VALUES
(1, 1, '2024-02-14 10:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productCode` varchar(10) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `listPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `listPrice`) VALUES
(1, 1, 'strat', 'Fender Stratocaster', 699.00),
(2, 1, 'les_paul', 'Gibson Les Paul', 1199.00),
(3, 1, 'sg', 'Gibson SG', 2517.00),
(4, 1, 'fg700s', 'Yamaha FG700S', 489.99),
(5, 1, 'washburn', 'Ludwig 5-Piece Kit with Cymbals', 299.00),
(6, 1, 'rodriguez', 'Rodriguez Caballero 11', 415.00),
(7, 2, 'precision', 'Fender Precision', 299.00),
(9, 3, 'ludwig', 'Ludwig 5-piece Drum Set with Cymbals', 699.99),
(10, 3, 'tama', 'Tama 5-Piece Drum Set with Cymbals', 799.99),
(11, 1, 'tele2', 'Fender Telecaster 2', 699.99),
(13, 4, 'fazioli', 'Fazioli Piano', 5000.00),
(14, 4, 'baldwin', 'Baldwin Piano', 3252.34),
(16, 3, 'drums2', 'My Set of Drums', 299.99),
(18, 2, '6', 'BRUCE', 55.00);

-- --------------------------------------------------------

--
-- Table structure for table `techaccessories`
--

CREATE TABLE IF NOT EXISTS `techaccessories` (
`techaccessoriesID` int(11) NOT NULL,
  `techaccessoriesCategoryID` int(11) NOT NULL,
  `techaccessoriesCode` varchar(10) NOT NULL,
  `techaccessoriesName` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `techaccessoriesStock` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `techaccessories`
--

INSERT INTO `techaccessories` (`techaccessoriesID`, `techaccessoriesCategoryID`, `techaccessoriesCode`, `techaccessoriesName`, `description`, `price`, `techaccessoriesStock`, `dateCreated`) VALUES
(1, 1, 'apple', 'Apple Airpods Pro', 'Apple''s flagship wireless earbuds!', 249.00, 29, '2024-02-21 19:35:05'),
(2, 1, 'sony', 'Sony WF-100XM5', 'The best wireless earbuds shipped by Sony.', 299.00, 17, '2024-02-21 19:36:43'),
(3, 1, 'jabra', 'Jabra Elite 8 Active', 'The best wireless earbuds for active workouts.', 199.00, 5, '2024-02-21 19:38:10'),
(4, 1, 'creative', 'Creative Aurvana Ace 2', 'Unique design with excellent audio.', 149.00, 8, '2024-02-21 19:39:55'),
(6, 2, 'aerstand', 'Elite Laptop Stand', 'An elite laptop stand designed to hold heavy laptops.', 56.53, 7, '2024-04-02 20:05:49'),
(7, 2, 'macstand', 'Aether Mac Stand', 'Elegant laptop stand designed for an apple user.', 156.53, 4, '2024-04-02 20:06:29'),
(8, 2, 'affordable', 'Affordable Stand', 'Affordable laptop stand for those that enjoy great value.', 23.10, 21, '2024-04-02 20:07:09'),
(9, 2, 'logiteck', 'Logitech Stand', 'Represent Logitech with this sleek laptop stand.', 33.10, 2, '2024-04-02 20:07:45'),
(12, 3, 'nimble', 'Nimble Champ (Medium)', 'The Nimble Champ is light weight, environmentally friendly, and has excellent wattage!', 60.00, 22, '2024-02-21 20:40:58'),
(13, 3, 'anker2', 'Anker 737 Power Bank', 'Compact and high quality, the Anker 737 justifies it''s high price.', 110.00, 16, '2024-02-21 20:42:34'),
(14, 3, 'monoprice', 'Monoprice Power Bank', 'High capacity charger at an affordable price.', 35.00, 12, '2024-02-21 20:43:24'),
(15, 3, 'anker3', 'Anker Nano Power Bank', 'The best charger to use for phones!', 30.00, 11, '2024-02-21 20:44:11'),
(16, 3, 'einova', 'Einova Eggtronic Power Bank', 'An excellent choice for to keep your tablet powered up.', 47.00, 9, '2024-02-21 20:45:07'),
(17, 4, 'logitech', 'Logitech Pebble Keys 2 K380', 'The best keyboard for those just entering the bluetooth keyboard space.', 40.00, 29, '2024-02-21 20:46:36'),
(18, 4, 'nuphy', 'NuPhy Air96 V2 ', 'Higher quality than your usual bluetooth keyboards while retaining a reasonable price.', 130.00, 19, '2024-02-21 20:47:37'),
(19, 4, 'keychron', 'Keychron K2 Version 2', 'Great option for those who want an affordable bluetooth mechanical keyboard.', 99.99, 15, '2024-02-21 20:48:46'),
(20, 4, 'razer', 'Razer Pro Type Ultra', 'Sleek and aesthetically pleasing, this keyboard works to justify it''s price tag.', 159.99, 17, '2024-02-21 20:49:31'),
(21, 4, 'steels', 'SteelSeries Apex Pro Mini Wireless', 'A great bluetooth keyboard that caters to gamers.', 189.99, 7, '2024-02-21 20:50:35'),
(22, 5, 'troubadour', 'Troubador Apex 3.0 Backpack', 'Ergonomic, well designed, and beautiful.', 245.00, 17, '2024-02-21 20:52:58'),
(23, 5, 'timbuk2', 'Timbuk2 Authority Laptop Backpack', 'A laptop backpack which caters to the rugged adventurer.', 159.00, 12, '2024-02-21 20:53:47'),
(24, 5, 'july', 'July Carry All Backpack', 'Awesome for those who travel often! Very affordable as well.', 44.00, 6, '2024-02-21 20:54:42'),
(48, 5, 'everlane', 'Everlane The ReNew Transit Backpack	', 'Environmentally friendly, cute, and functional!	', 95.00, 9, '2024-04-02 23:45:00'),
(66, 1, 'anker', 'Anker Soundcore Liberty 4 NC', 'Wireless earbuds at an affordable price.', 55.00, 3, '2024-04-16 21:09:27'),
(75, 2, 'razerSt', 'Razer Laptop Stand', 'New razer laptop stand to hold up your expensive Macbook.', 37.00, 7, '2024-04-16 22:12:38'),
(76, 4, 'keychr', 'Keychron wireless 65% ', 'Short, small keyboard that is very transportable.', 54.00, 3, '2024-04-16 22:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `techaccessoriesCategories`
--

CREATE TABLE IF NOT EXISTS `techaccessoriesCategories` (
`techaccessoriesCategoryID` int(11) NOT NULL,
  `techaccessoriesCategoryName` varchar(64) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `techaccessoriesCategories`
--

INSERT INTO `techaccessoriesCategories` (`techaccessoriesCategoryID`, `techaccessoriesCategoryName`, `dateCreated`) VALUES
(1, 'Wireless Earbuds', '2024-02-21 19:23:52'),
(2, 'Laptop Stands', '2024-02-21 19:24:05'),
(3, 'Portable Phone Chargers', '2024-02-21 19:24:17'),
(4, 'Bluetooth Keyboards', '2024-02-21 19:24:29'),
(5, 'Laptop Backpacks', '2024-02-21 19:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `techaccessoriesManagers`
--

CREATE TABLE IF NOT EXISTS `techaccessoriesManagers` (
`techaccessoriesManagerID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `techaccessoriesManagers`
--

INSERT INTO `techaccessoriesManagers` (`techaccessoriesManagerID`, `emailAddress`, `password`, `firstName`, `lastName`, `dateCreated`) VALUES
(1, 'luka@lukastechaccessories.com', '$2y$10$JBTUfq0PBgufhf3UEMkJFOkt2OTbUVqsygyZxS8pnObB2jWOwE6Uq', 'Luka', 'Mayer', '2024-03-27 12:33:16'),
(2, 'maurice@lukastechaccessories.com', '$2y$10$ipDFD/CW.pg2lvdVXSZwhuGGGuoZOWQNYLcTdAlzFJZQDHugDqsEW', 'Maurice', 'Geese', '2024-03-27 12:33:17'),
(3, 'diocletian@lukastechaccessories.com', '$2y$10$ikCmP9PCB38oVyMHBugDqe0ZNxUC9nZoI/9kGUZ81BlU/RVA0VqeC', 'Diocletian', 'III', '2024-03-27 12:33:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
 ADD PRIMARY KEY (`adminID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`productID`), ADD UNIQUE KEY `productCode` (`productCode`);

--
-- Indexes for table `techaccessories`
--
ALTER TABLE `techaccessories`
 ADD PRIMARY KEY (`techaccessoriesID`), ADD UNIQUE KEY `techaccessoriesCode` (`techaccessoriesCode`);

--
-- Indexes for table `techaccessoriesCategories`
--
ALTER TABLE `techaccessoriesCategories`
 ADD PRIMARY KEY (`techaccessoriesCategoryID`);

--
-- Indexes for table `techaccessoriesManagers`
--
ALTER TABLE `techaccessoriesManagers`
 ADD PRIMARY KEY (`techaccessoriesManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `techaccessories`
--
ALTER TABLE `techaccessories`
MODIFY `techaccessoriesID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `techaccessoriesCategories`
--
ALTER TABLE `techaccessoriesCategories`
MODIFY `techaccessoriesCategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `techaccessoriesManagers`
--
ALTER TABLE `techaccessoriesManagers`
MODIFY `techaccessoriesManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
