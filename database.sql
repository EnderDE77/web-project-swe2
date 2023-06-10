-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 12:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cartPaymentid` int(11) NOT NULL,
  `cartHolderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cartPaymentid`, `cartHolderId`) VALUES
(121, 129, 1),
(122, 130, 1),
(123, 131, 1),
(124, 132, 1),
(125, 133, 1),
(126, 134, 1),
(127, 135, 1),
(128, 136, 1),
(129, 137, 1),
(130, 138, 1),
(131, 139, 1),
(132, 140, 3),
(133, 141, 3),
(134, 142, 1),
(135, 143, 5),
(136, 144, 1),
(137, 145, 3),
(138, 146, 5),
(139, 146, 3),
(140, 146, 5),
(141, 146, 3),
(142, 146, 5),
(143, 146, 1),
(144, 146, 3),
(145, 146, 3),
(146, 146, 1),
(147, 146, 1),
(148, 146, 1),
(149, 146, 1),
(150, 146, 1),
(151, 160, 1),
(152, 162, 1),
(153, 163, 1),
(154, 164, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cartcontains`
--

CREATE TABLE `cartcontains` (
  `productId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartcontains`
--

INSERT INTO `cartcontains` (`productId`, `cartId`, `quantity`) VALUES
(1, 121, 5),
(1, 125, 10),
(2, 126, 2),
(1, 128, 1),
(1, 130, 1),
(2, 130, 1),
(1, 131, 1),
(2, 131, 2),
(3, 133, 10),
(4, 133, 3),
(3, 134, 5),
(4, 134, 2),
(3, 136, 15),
(3, 136, 15),
(4, 140, 9),
(4, 140, 1),
(4, 143, 15),
(4, 144, 10),
(5, 146, 3),
(5, 148, 2),
(5, 149, 2),
(5, 151, 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `isRead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `isRead`) VALUES
(1, 'Erlis Kendezi', 'erliskendezi@gmail.com', 'AAAAAAAA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL,
  `method` varchar(10) NOT NULL,
  `payingUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `price`, `date`, `method`, `payingUserId`) VALUES
(129, 149.95, '2023-06-06', 'Card', 1),
(130, 0, '2023-06-07', 'Card', 1),
(131, 0, '2023-06-08', 'Card', 1),
(132, 0, '2023-06-08', 'Card', 1),
(133, 299.9, '2023-06-08', 'Card', 1),
(134, 20, '2023-06-09', 'Card', 1),
(135, 0, '2023-06-09', 'Card', 1),
(136, 29.99, '2023-06-09', 'Card', 1),
(137, 0, '2023-06-09', 'Card', 1),
(138, 39.99, '2023-06-09', 'Card', 1),
(139, 49.99, '2023-06-09', 'Card', 1),
(140, 0, '2023-06-09', 'Card', 3),
(141, 85, '2023-06-09', 'Card', 3),
(142, 45, '2023-06-09', 'Card', 1),
(143, 0, '2023-06-09', 'Card', 5),
(144, 210, '2023-06-09', 'Card', 1),
(145, 0, '2023-06-09', 'Card', 3),
(146, 0, '2023-06-09', 'Card', 5),
(147, 0, '2023-06-09', 'Card', 3),
(148, 50, '2023-06-09', 'Card', 5),
(149, 0, '2023-06-09', 'Card', 3),
(150, 0, '2023-06-09', 'Card', 5),
(151, 75, '2023-06-09', 'Card', 1),
(152, 50, '2023-06-09', 'Card', 3),
(153, 0, '2023-06-09', 'Card', 3),
(154, 30, '2023-06-09', 'Card', 1),
(155, 0, '2023-06-09', 'Card', 1),
(156, 20, '2023-06-09', 'Card', 1),
(157, 20, '2023-06-09', 'Card', 1),
(158, 0, '2023-06-09', 'Card', 1),
(159, 0, '2023-06-10', 'Card', 1),
(160, 50, '2023-06-10', 'Card', 1),
(161, 0, '2023-06-10', 'Card', 1),
(162, 0, '2023-06-10', 'Card', 1),
(163, 0, '2023-06-10', 'Card', 1),
(164, 0, '2023-06-10', 'Card', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `imgPath` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `imgPath`) VALUES
(4, 'Carrot', 5, 0, 'uploads/download.jpeg'),
(5, 'Salad', 10, 23, 'uploads/download (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `level` char(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`, `name`, `surname`, `email`, `password`) VALUES
(1, '1', 'Erlis', 'Kendezi', 'erliskendezi@gmail.com', '$2y$10$byMBQ3MRMQ1Bc8Aq2xSBrOJyLKVl3kZNfzq5Y6QFIxiJxwYa2qbhy'),
(2, '2', 'Erlis', 'Kendezi', 'erliskendezi@gamil.com', '$2y$10$.PHYYbfRp9hoEOiUbmbkGuUQGvCevd1GN0JZrRmGyk6c4TNmVuo3S'),
(3, '1', 'AAA', 'BBB', 'aa@gmail.com', '$2y$10$GmekvNflm4GJE1/JxJQpfeRpcdAuFcI4DvNlmgp27G5dgsblgUYbO'),
(4, '2', 'BBB', 'AAA', 'bb@gmail.com', '$2y$10$ECHpA11Jk8xJ.Ho8AzZ4i.d8x3SWubvh.l6SAzy.AU6sw0xFjYxAq'),
(5, '1', 'AAA', 'BBB', 'cc@gmail.com', '$2y$10$6I5QetGetGyNlOzFjHghU.CeqkWn2lvDZONUgwkQdIXA8mrq.OIhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartHolderId` (`cartHolderId`),
  ADD KEY `cartPaymentid` (`cartPaymentid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payingUserId` (`payingUserId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cartHolderId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cartPaymentid`) REFERENCES `payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartcontains`
--
ALTER TABLE `cartcontains`
  ADD CONSTRAINT `cartcontains_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartcontains_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payingUserId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
