-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 09:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merchandise`
--

-- --------------------------------------------------------

--
-- Table structure for table `band_orders`
--

CREATE TABLE `band_orders` (
  `id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL,
  `band_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `band_orders`
--

INSERT INTO `band_orders` (`id`, `band_id`, `band_name`, `quantity`, `price`, `total_cost`, `created_at`) VALUES
(1, 9, 'Yaka Wristband', 1, 200.00, 200.00, '2025-08-13 16:49:46'),
(2, 9, 'Yaka Wristband', 5, 200.00, 1000.00, '2025-08-13 16:52:23'),
(3, 9, 'Yaka Wristband', 5, 200.00, 1000.00, '2025-08-13 16:56:41'),
(4, 10, 'j', 1, 700.00, 700.00, '2025-08-13 17:16:46'),
(5, 10, 'j', 4, 700.00, 2800.00, '2025-08-13 17:25:10'),
(6, 10, 'j', 10, 700.00, 7000.00, '2025-08-13 17:25:25'),
(7, 10, 'j', 1, 700.00, 700.00, '2025-08-13 17:28:46'),
(8, 9, 'Yaka Wristband', 2, 200.00, 400.00, '2025-08-13 18:48:47'),
(9, 9, 'Yaka Wristband', 4, 200.00, 800.00, '2025-08-13 18:54:40'),
(10, 9, 'Yaka Wristband', 3, 200.00, 600.00, '2025-08-13 19:29:49'),
(11, 9, 'Yaka Wristband', 1, 200.00, 200.00, '2025-08-13 19:32:48'),
(12, 10, 'j', 6, 700.00, 4200.00, '2025-08-13 19:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_cost` decimal(10,2) GENERATED ALWAYS AS (`price` * `quantity`) STORED,
  `product_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `size`, `color`, `quantity`, `price`, `created_at`, `product_id`) VALUES
(133, 'New T', 'S', 'White', 10, 2000.00, '2025-08-13 18:29:20', 39),
(141, 'New T', 'S', 'Black', 2, 2000.00, '2025-08-13 18:51:32', 39),
(142, 'New T', 'S', 'White', 1, 2000.00, '2025-08-13 18:54:15', 39),
(143, 'Hoody', 'S', 'Black', 6, 2000.00, '2025-08-13 18:54:31', 16),
(144, 'Yaka T', 'S', 'White', 6, 1000.00, '2025-08-13 18:55:32', 35),
(145, 'Yaka T', 'S', 'Black', 1, 2000.00, '2025-08-13 19:00:12', 36),
(146, 'Yaka T', 'S', 'Black', 4, 2000.00, '2025-08-13 19:01:40', 36),
(147, 'New T', 'S', 'White', 6, 2000.00, '2025-08-13 19:02:57', 39);

-- --------------------------------------------------------

--
-- Table structure for table `hoodies`
--

CREATE TABLE `hoodies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `caption` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_black_front` varchar(255) DEFAULT NULL,
  `image_black_back` varchar(255) DEFAULT NULL,
  `image_white_front` varchar(255) DEFAULT NULL,
  `image_white_back` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoodies`
--

INSERT INTO `hoodies` (`id`, `name`, `caption`, `price`, `image_black_front`, `image_black_back`, `image_white_front`, `image_white_back`) VALUES
(16, 'Hoody', 'Black and white hoodie', 2000.00, '1755072166_eec3daea-93a0-4c05-944e-95ffb92a7b8e.bd42369a0fa2b5e6f09924eaad2878a9.webp', '1755071068_Black-back.png', '1755071068_White-front.png', '1755111583_White-back.png'),
(17, 'ok', 'ok', 1000.00, '1755104708_Black-front.png', '1755104708_Black-back.png', '1755104708_White-front.png', '1755104708_White-back.png');

-- --------------------------------------------------------

--
-- Table structure for table `posters`
--

CREATE TABLE `posters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posters`
--

INSERT INTO `posters` (`id`, `name`, `image`, `caption`, `price`) VALUES
(12, 'Yaka Poster', '1755105050_image-4426622.webp', 'The poster for the event with Athula & Samitha', 800.00),
(13, 'Yaka Poster', '1755105062_image-6929949.jpg', 'The official poster for SLIIT Odessey event March, 2025', 200.00),
(14, 'Yaka Poster', '1755105090_image-7589988.jpeg', 'Thank You poster.', 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `poster_orders`
--

CREATE TABLE `poster_orders` (
  `id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `poster_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poster_orders`
--

INSERT INTO `poster_orders` (`id`, `poster_id`, `poster_name`, `quantity`, `price`, `total_cost`, `order_date`) VALUES
(1, 13, 'Yaka Poster', 5, 200.00, 1000.00, '2025-08-12 14:33:10'),
(2, 12, 'Yaka Poster', 1, 800.00, 800.00, '2025-08-12 18:20:10'),
(3, 14, 'Yaka Poster', 12, 200.00, 2400.00, '2025-08-12 18:26:21'),
(4, 14, 'Yaka Poster', 12, 200.00, 2400.00, '2025-08-12 18:29:49'),
(5, 13, 'Yaka Poster', 4, 200.00, 800.00, '2025-08-12 18:30:19'),
(6, 13, 'Yaka Poster', 1, 200.00, 200.00, '2025-08-12 18:41:10'),
(7, 12, 'Yaka Poster', 1, 800.00, 800.00, '2025-08-12 18:47:51'),
(8, 12, 'Yaka Poster', 2, 800.00, 1600.00, '2025-08-12 18:48:08'),
(9, 12, 'Yaka Poster', 1, 800.00, 800.00, '2025-08-12 19:21:35'),
(11, 12, 'Yaka Poster', 1, 800.00, 800.00, '2025-08-13 03:05:30'),
(12, 12, 'Yaka Poster', 4, 800.00, 3200.00, '2025-08-13 15:36:44'),
(13, 14, 'Yaka Poster', 1, 200.00, 200.00, '2025-08-13 16:43:46'),
(14, 14, 'Yaka Poster', 5, 200.00, 1000.00, '2025-08-13 16:50:01'),
(19, 13, 'Yaka Poster', 3, 200.00, 600.00, '2025-08-13 19:30:01'),
(20, 12, 'Yaka Poster', 6, 800.00, 4800.00, '2025-08-13 19:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `tshirts`
--

CREATE TABLE `tshirts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_black_front` varchar(255) DEFAULT NULL,
  `image_black_back` varchar(255) DEFAULT NULL,
  `image_white_front` varchar(255) DEFAULT NULL,
  `image_white_back` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tshirts`
--

INSERT INTO `tshirts` (`id`, `name`, `caption`, `price`, `image_black_front`, `image_black_back`, `image_white_front`, `image_white_back`) VALUES
(35, 'Yaka T', 'Tshirt Yaka', 1000.00, '1755071888_Black-front.png', '1755071888_Black-back.png', '1755071888_White-front.png', '1755071888_White-back.png'),
(36, 'Yaka T', 'T-Shirt', 2000.00, '1755079910_Black-front.png', '1755079910_Black-back.png', '1755079910_White-front.png', '1755079910_White-back.png'),
(37, 'Yaka T', 'T-Shirt', 2000.00, '1755080038_Black-front.png', '1755080038_Black-back.png', '1755080038_White-front.png', '1755080038_White-back.png'),
(38, 'New Tshirt', 'The T-Shirt', 4000.00, '1755093679_Black-front.png', '1755093679_Black-back.png', '1755093679_White-front.png', '1755093679_White-back.png'),
(39, 'New T', 'T T', 2000.00, '1755094304_Black-front.png', '1755094304_Black-back.png', '1755094304_White-front.png', '1755094304_White-back.png');

-- --------------------------------------------------------

--
-- Table structure for table `wristband`
--

CREATE TABLE `wristband` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wristband`
--

INSERT INTO `wristband` (`id`, `name`, `image`, `caption`, `price`) VALUES
(9, 'Yaka Wristband', '1754946314_107101-11.jpg', 'Wristband', 200.00),
(10, 'j', '1755104990_107101-11.jpg', 'Poster', 700.00),
(11, 'WB', '1755113676_107101-11.jpg', 'BAND', 800.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `band_orders`
--
ALTER TABLE `band_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoodies`
--
ALTER TABLE `hoodies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poster_orders`
--
ALTER TABLE `poster_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tshirts`
--
ALTER TABLE `tshirts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wristband`
--
ALTER TABLE `wristband`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `band_orders`
--
ALTER TABLE `band_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `hoodies`
--
ALTER TABLE `hoodies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `poster_orders`
--
ALTER TABLE `poster_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tshirts`
--
ALTER TABLE `tshirts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wristband`
--
ALTER TABLE `wristband`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
