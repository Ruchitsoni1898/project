-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 30, 2023 at 07:16 PM
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
-- Database: `rexx_systems`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`product_id`, `product_name`, `product_price`) VALUES
(1, 'Refactoring: Improving the Design of Existing Code', 37.98),
(2, 'Clean Architecture: A Craftsman\'s Guide to Software Structure and Design', 19.99);

-- --------------------------------------------------------

--
-- Table structure for table `sales_table`
--

CREATE TABLE `sales_table` (
  `sale_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_mail` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sale_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_table`
--

INSERT INTO `sales_table` (`sale_id`, `customer_name`, `customer_mail`, `product_id`, `sale_date`) VALUES
(1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, '2019-04-02 08:05:12'),
(2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, '2019-05-01 11:07:18'),
(3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, '2019-05-06 14:26:14'),
(4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, '2019-06-07 11:38:39'),
(5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, '2019-07-01 15:01:13'),
(6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, '2019-08-07 19:08:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales_table`
--
ALTER TABLE `sales_table`
  ADD PRIMARY KEY (`sale_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
