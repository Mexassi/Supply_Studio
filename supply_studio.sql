-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 23, 2015 at 05:46 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MioSystemDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `orderNo` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `supplierId` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(70) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `supplierId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `userId`, `description`, `price`, `supplierId`) VALUES
(19, 'Eggplant', 21, 'Organic eggplant from NSW. Price per kilo. Order per kilo.', 3.49, 48),
(20, 'butter', 21, '1.5 kilo unsalted butter.', 13.79, 49),
(21, 'barramundi', 21, 'fresh farm barramundi. Price per kilo. Order per kilo.', 15.49, 51),
(22, 'tomato', 21, 'American tomatoes.', 4.7, 48),
(23, 'Rib Eye fillet', 21, 'fresh farm beef from victoria. order per kilo. price per kilo.', 13.79, 50),
(24, 'capers', 21, 'bottle capers', 6.59, 48),
(25, 'bananas', 21, 'price per kilo.', 3.49, 48),
(26, 'Banana bread', 21, 'Fresh baked banana bread. price per loaf. order per loaf.', 13.79, 52),
(27, 'snapper', 21, 'price per kilo', 16.55, 51),
(28, 'creme freiche', 21, 't4yjh45trh5trh5r', 13.79, 48),
(30, 'Mango bread', 21, 'fresh baked mango bread. Price per loaf.', 16.55, 52),
(31, 'beetroots', 21, 'order by kilo, price per kilo', 2.35, 48);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `supplierCompanyName` varchar(50) NOT NULL,
  `supplierEmail` varchar(100) NOT NULL,
  `supplierPhoneNo` varchar(15) NOT NULL,
  `supplierPaidAmount` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplierId`, `userId`, `supplierCompanyName`, `supplierEmail`, `supplierPhoneNo`, `supplierPaidAmount`) VALUES
(48, 21, 'Aussie Veggie', 'orders.veggie@hotmail.com', '0302345675', 0),
(49, 21, 'Dairy Farm', 'dairy@dairy.dairy', '0304567112', 0),
(50, 21, 'John\\''s Organic Meat', 'organic.meat@hotmail.com', '0403124567', 0),
(51, 21, 'Da Costa', 'dacosta@fish.fish', '0503479989', 0),
(52, 21, 'brasserie', 'brasserie@hotmail.com.au', '0305711231', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempUsers`
--

CREATE TABLE `tempUsers` (
  `userId` int(11) NOT NULL,
  `companyEmail` varchar(100) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyStreetName` varchar(50) NOT NULL,
  `companyStreetNo` int(11) NOT NULL,
  `companySuburb` varchar(30) NOT NULL,
  `companyPostCode` int(11) NOT NULL,
  `companyState` varchar(3) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `userKey` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tempUsers`
--

INSERT INTO `tempUsers` (`userId`, `companyEmail`, `phoneNo`, `companyName`, `companyStreetName`, `companyStreetNo`, `companySuburb`, `companyPostCode`, `companyState`, `passwd`, `userKey`) VALUES
(1, 'fra82.ruggiero@gmail.com', '0435019330', 'Traca', 'via Manaigo', 7, 'Milan', 2086, 'nsw', '7c222fb2927d828af22f592134e8932480637c0d', 'f718c00c9c969b15ac81f7c6a407809bcf55ace6'),
(4, 'mexassi.debugger@hotmail.com', '0402343232', 'La scala on jersey', 'jersey road', 22, 'woollahra', 2022, 'nsw', '$2y$20$bPUX1XKW.zCR8Awj5d/ztuwtZbptuLxQOC8Ex7SIzKnp1NWRCsBFG', '298d4d2036d857e87f8c15f1b103d4c8479ae2aa'),
(5, 'mexassi@hotmail.it', '21903829013', 'testme', 'mystreet', 11, 'mysub', 2000, 'nsw', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'a0dc1c23606ddc9f21043959d69554a35ac59624');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `companyEmail` varchar(100) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyStreetName` varchar(50) NOT NULL,
  `companyStreetNo` int(11) NOT NULL,
  `companySuburb` varchar(30) NOT NULL,
  `companyPostCode` int(11) NOT NULL,
  `companyState` varchar(3) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `companyEmail`, `phoneNo`, `companyName`, `companyStreetName`, `companyStreetNo`, `companySuburb`, `companyPostCode`, `companyState`, `passwd`) VALUES
(21, 'mexassi.debugger@hotmail.com', '0402354678', 'La scala on jersey', 'jersey road', 22, 'woollahra', 2022, 'nsw', 'fa6977c99b809db68e1c56888ec38bd004719b39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
ADD PRIMARY KEY (`orderNo`), ADD KEY `FOREIGN` (`userId`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
ADD KEY `FOREIGN` (`orderNo`), ADD KEY `FORE` (`productId`), ADD KEY `FOR` (`supplierId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
ADD PRIMARY KEY (`productId`), ADD KEY `FOR` (`supplierId`), ADD KEY `FOREIGN` (`userId`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
ADD PRIMARY KEY (`supplierId`), ADD KEY `FOREIGN` (`userId`);

--
-- Indexes for table `tempUsers`
--
ALTER TABLE `tempUsers`
ADD PRIMARY KEY (`userId`), ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `orderNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tempUsers`
--
ALTER TABLE `tempUsers`
MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON UPDATE CASCADE;

--
-- Constraints for table `placements`
--
ALTER TABLE `placements`
ADD CONSTRAINT `placements_ibfk_1` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`) ON UPDATE CASCADE,
ADD CONSTRAINT `placements_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON UPDATE CASCADE,
ADD CONSTRAINT `placements_ibfk_3` FOREIGN KEY (`supplierId`) REFERENCES `suppliers` (`supplierId`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplierId`) REFERENCES `suppliers` (`supplierId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
