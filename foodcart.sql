-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 10:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Created_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`, `created_at`, `Created_by`) VALUES
(7, 'Pitza', 150.00, 'food-2.png', 3, '2024-12-12 11:40:03', 1),
(8, 'Burger', 90.00, 'food-1.png', 4, '2024-12-12 11:40:06', 1),
(9, 'French fries', 100.00, 'food-6.png', 2, '2024-12-12 11:40:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `city` int(1) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` decimal(18,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Created_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `pay_type`, `flat`, `Street`, `city`, `state`, `country`, `pincode`, `total_products`, `total_price`, `created_at`, `Created_by`) VALUES
(1, 'Delphina', '8939470537', 'arockiyaanthoni1996@gmail.com', '11', '323', 'Souuth street', 8, 1, 9, 607804, 'Pitza(3) , Burger(4) , French fries(2) ', 1010.00, '2024-12-12 13:02:55', 1),
(2, 'Delphina', '8939470537', 'arockiyaanthoni1996@gmail.com', 'select Pay type', '323', 'Souuth street', 8, 1, 9, 607804, 'Pitza(3) , Burger(4) , French fries(2) ', 1010.00, '2024-12-12 13:04:10', 1),
(3, 'Delphina', '8939470537', 'arockiyaanthoni1996@gmail.com', '11', '323', 'Souuth street', 8, 1, 9, 607804, 'Pitza(3) , Burger(4) , French fries(2) ', 1010.00, '2024-12-12 13:04:40', 1),
(4, 'Delphina', '8939470537', 'arockiyaanthoni1996@gmail.com', '11', '323', 'Souuth street', 8, 1, 9, 607804, 'Pitza(3) , Burger(4) , French fries(2) ', 1010.00, '2024-12-12 13:07:00', 1),
(5, 'Delphina', '8939470537', 'arockiyaanthoni1996@gmail.com', '11', '323', 'Souuth street', 8, 1, 9, 607804, 'Pitza(3) , Burger(4) , French fries(2) ', 1010.00, '2024-12-12 13:07:06', 1),
(6, 'Delphina', '8939470537', 'arockiyaanthoni1996@gmail.com', 'Cash', '323', 'Souuth street', 0, 0, 0, 607804, 'Pitza(3) , Burger(4) , French fries(2) ', 1010.00, '2024-12-12 13:07:29', 1),
(7, 'Delphina', '8939470537', 'arockiyaanthoni1996@gmail.com', 'Cash', '323', 'Souuth street', 0, 0, 0, 607804, 'Pitza(3) , Burger(4) , French fries(2) ', 1010.00, '2024-12-12 13:09:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(18,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `created_at`, `created_by`) VALUES
(1, 'Pitza', 150.00, 'food-2.png', '2024-12-11 15:57:08', 1),
(2, 'Burger', 90.00, 'food-1.png', '2024-12-11 16:09:22', 1),
(3, 'French fries', 100.00, 'food-6.png', '2024-12-11 16:17:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addons`
--

CREATE TABLE `tbl_addons` (
  `addon_id` int(11) NOT NULL,
  `addon_name` varchar(100) NOT NULL,
  `addon_type` varchar(100) NOT NULL,
  `addon_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active ,2 deactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_addons`
--

INSERT INTO `tbl_addons` (`addon_id`, `addon_name`, `addon_type`, `addon_status`, `created_at`, `created_by`) VALUES
(1, 'Tamilnadu', 'state', 1, '2024-12-12 11:57:21', 1),
(2, 'Pondicherry', 'state', 1, '2024-12-12 11:57:57', 1),
(3, 'Kerala', 'state', 1, '2024-12-12 11:59:11', 1),
(4, 'Male', 'gender', 1, '2024-12-12 11:59:48', 1),
(5, 'Female', 'gender', 1, '2024-12-12 11:59:48', 1),
(6, 'chennai', 'city', 1, '2024-12-12 12:01:13', 1),
(7, 'Madurai', 'city', 1, '2024-12-12 12:01:13', 1),
(8, 'Neyveli', 'city', 1, '2024-12-12 12:01:13', 1),
(9, 'India', 'country', 1, '2024-12-12 12:02:24', 1),
(10, 'Australia', 'country', 1, '2024-12-12 12:02:24', 1),
(11, 'Cash', 'pay_method', 1, '2024-12-12 12:03:21', 1),
(12, 'Card', 'pay_method', 1, '2024-12-12 12:03:21', 1),
(13, 'Gpay', 'pay_method', 1, '2024-12-12 12:03:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_addons`
--
ALTER TABLE `tbl_addons`
  ADD PRIMARY KEY (`addon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_addons`
--
ALTER TABLE `tbl_addons`
  MODIFY `addon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
