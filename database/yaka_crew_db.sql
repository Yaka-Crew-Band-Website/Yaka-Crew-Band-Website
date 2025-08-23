-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 08, 2025 at 11:17 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yaka_crew_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `band_members`
--

DROP TABLE IF EXISTS `band_members`;
CREATE TABLE IF NOT EXISTS `band_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `band_members`
--

INSERT INTO `band_members` (`id`, `name`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Member 1', 'src/img/Chanuka Mora.jpg', '2025-07-25 08:14:26', '2025-08-01 00:09:36'),
(2, 'Member 2', 'src/img/Chanuka Mora.jpg', '2025-07-25 08:14:26', '2025-07-25 08:14:26'),
(3, 'Member 3', 'src/img/Chanuka Mora.jpg', '2025-07-25 08:14:26', '2025-07-25 08:14:26'),
(4, 'Member 4', 'src/img/Chanuka Mora.jpg', '2025-07-25 08:14:26', '2025-07-25 08:14:26'),
(5, 'Member 5', 'src/img/Chanuka Mora.jpg', '2025-07-25 08:14:26', '2025-07-25 08:14:26'),
(6, 'Member 6', 'src/img/Chanuka Mora.jpg', '2025-07-25 08:14:26', '2025-07-25 08:14:26'),
(7, 'Member 7', 'src/img/Chanuka Mora.jpg', '2025-07-25 08:14:26', '2025-07-25 08:14:26'),
(21, 'ABC', 'uploads/YCHome-uploads/band_members/688c603763632_Khanna.png', '2025-08-01 06:35:35', '2025-08-01 06:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `whats_new`
--

DROP TABLE IF EXISTS `whats_new`;
CREATE TABLE IF NOT EXISTS `whats_new` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `whats_new`
--

INSERT INTO `whats_new` (`id`, `title`, `description`, `image_path`, `is_active`, `created_at`, `updated_at`) VALUES
(11, 'Chanuka', 'Yaka Crew', 'uploads/YCHome-uploads/whats_new/688c3ecb2284f_Chanuka Mora.jpg', 1, '2025-08-01 04:12:59', '2025-08-01 04:12:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
