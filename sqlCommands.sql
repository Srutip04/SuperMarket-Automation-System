-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 10:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supplychain`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `PhnNo` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `Name`, `PhnNo`) VALUES
(501, 'sona', 9279651510),
(502, 'simran', 3812327273),
(503, 'rahul', 9207049981),
(504, 'aditi', 9658077043),
(505, 'sakshi', 3424256424),
(506, 'sruti', 6370126201),
(507, 'harish', 2045613378),
(508, 'sana', 78945661200);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `qty` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  'bill_id' int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `qty`, `price`, `product_id`, `customer_id`, `bill_id`) VALUES
(1, '2021-01-27', 15, 40, 1, 501, 1),
(2, '2021-01-22', 10, 32, 2, 502, 1),
(3, '2021-01-27', 20, 42, 3, 503, 1),
(4, '2021-01-21', 27, 21, 4, 504, 2),
(5, '2021-02-03', 10, 45, 1, 504, 2),
(6, '2021-03-10', 7, 35, 2, 507, 2),
(7, '2021-02-09', 12, 45, 3, 502, 2),
(8, '2021-02-17', 10, 22, 4, 502, 2),
(9, '2021-03-10', 20, 45, 1, 502, 2),
(10, '2021-04-14', 15, 33, 5, 502, 3),
(11, '2021-05-12', 6, 22, 4, 507, 3),
(12, '2021-06-16', 10, 43, 3, 507, 3),
(13, '2021-07-15', 15, 45, 1, 505, 4),
(14, '2021-08-18', 7, 31, 2, 507, 4),
(15, '2021-07-14', 10, 41, 3, 505, 4),
(16, '2021-07-28', 4, 25, 4, 505, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `mfg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `qty`, `price`, `mfg_date`) VALUES
(1, 'A', 100, 40, '2021-09-01'),
(2, 'B', 100, 30, '2021-09-01'),
(3, 'C', 100, 40, '2021-09-09'),
(4, 'D', 600, 20, '2021-09-08'),
(5, 'E', 120, 20, '2021-09-16'),
(6, 'F', 100, 100, '2021-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phn` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phn`) VALUES
(101, 'D&H', 5035557811),
(102, 'Perkinas', 4500051254),
(103, 'Harvest Food', 5035553199),
(104, 'Fresh Point', 5035559871),
(105, 'Cradle', 5035558861),
(106, 'The Lightman Group', 5035559891),
(107, 'Sassafaras', 5052461374);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `PhnNo` (`PhnNo`),
  -- ADD KEY `PhnNo_2` (`PhnNo`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);
  ADD KEY  `bill_id` (`bill_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `PhoneNumber` (`phn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
