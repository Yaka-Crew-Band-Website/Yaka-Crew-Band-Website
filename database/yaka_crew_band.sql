-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2025 at 08:47 PM
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
-- Database: `yaka_crew_band`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `cover_image` varchar(500) DEFAULT NULL,
  `spotify_link` varchar(500) DEFAULT NULL,
  `apple_music_link` varchar(500) DEFAULT NULL,
  `youtube_link` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_featured` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `band_members`
--

CREATE TABLE `band_members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `band_members`
--

INSERT INTO `band_members` (`id`, `name`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'chanuka', 'uploads/YCHome-uploads/band_members/689e2b2d7f2bb_Chanuka Mora.jpg', '2025-08-14 18:30:05', '2025-08-14 18:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `event_type` enum('concert','festival','private','charity','workshop') NOT NULL,
  `is_past_event` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `additional_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `start_time`, `end_time`, `location`, `price`, `event_type`, `is_past_event`, `created_at`, `updated_at`, `additional_info`) VALUES
(3, 'tt', 'tt', '2025-08-15', '17:35:00', '00:35:00', 'Colombo', 600.00, 'concert', 0, '2025-08-14 18:05:28', '2025-08-14 18:05:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `event_id`, `image_path`, `is_primary`) VALUES
(1, 1, 'event_689d5491d2cc31.12851061.jpeg', 1),
(2, 2, 'event_689dde184cc262.95007773.jpeg', 1),
(3, 3, 'event_689e2568944a82.13055791.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  `category` varchar(50) DEFAULT 'event',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_published` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `event_date`, `event_time`, `location`, `image_path`, `category`, `created_at`, `is_published`) VALUES
(23, 'Oddessy', '', '2025-08-02', NULL, 'Colombo', 'uploads/YCposts/1755053493_post_image8.jpeg', 'concert', '2025-08-13 02:51:33', 1),
(24, 'Yaka', '', '2025-05-09', NULL, 'Kandy ', 'uploads/YCposts/1755101570_post_image9.jpeg', 'album_release', '2025-08-13 16:12:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image_path`, `caption`, `is_active`, `created_at`) VALUES
(6, 'slider_689ded75946fe5.26875915.jpg', 'Slide 1', 1, '2025-08-14 14:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `artist_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `track_number` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `audio_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `category` varchar(100) DEFAULT NULL,
  `music_category` varchar(100) DEFAULT NULL,
  `hits` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist_name`, `description`, `album_id`, `duration`, `track_number`, `cover_image`, `audio_path`, `created_at`, `updated_at`, `is_active`, `category`, `music_category`, `hits`) VALUES
(75, 'Pinna pipena', 'Chanuka Mora with Naduni Yameesha', 'Yaka Crew, a vibrant musical ensemble, combines diverse talents to create a unique sonic experience.  @ChanukaMora  , the driving force behind Yaka Crew, leads with captivating vocals and musical prowess.  @dilohiphop    the rap virtuoso of the band, injects dynamic energy into Yaka Crew performances. Known for their versatility, Yaka Crew thrives in both concert halls and wedding celebrations, delivering an unforgettable musical backdrop. Brimming with youthful vigor and accomplished musicians, Yaka Crew embodies a harmonious fusion of emerging talent and seasoned expertise.\r\n', NULL, NULL, NULL, 'uploads/covers/YCaudio/audio_cover_5.jpeg', 'uploads/YCaudio/1755053753_media_Pinna Pipena Medley .mp3', '2025-08-13 02:55:53', '2025-08-13 02:56:04', 1, 'top', 'country', 300000),
(76, 'Ravana', 'Yaka Crew', '\r\nYaka Crew, a vibrant musical ensemble, combines diverse talents to create a unique sonic experience.  @ChanukaMora  , the driving force behind Yaka Crew, leads with captivating vocals and musical prowess.  @dilohiphop    the rap virtuoso of the band, injects dynamic energy into Yaka Crew performances. Known for their versatility, Yaka Crew thrives in both concert halls and wedding celebrations, delivering an unforgettable musical backdrop. Brimming with youthful vigor and accomplished musicians, Yaka Crew embodies a harmonious fusion of emerging talent and seasoned expertise.\r\n', NULL, NULL, NULL, 'uploads/covers/YCaudio/audio_cover_4.jpeg', 'uploads/YCaudio/1755056046_media_Ravana .mp3', '2025-08-13 03:34:06', '2025-08-13 03:34:06', 1, 'latest', 'hip_hop', 0),
(78, 'Nona', 'Yaka Crew', 'Music by - Chanuka Mora\r\nMelody by - Chanuka Mora\r\nLyrics - Ushani Wijewantha\r\nMusic Arrangments - Yaka crew\r\nMixed & Mastered - Ravindra Srinath\r\nDance Choreography - Ramod Malaka\r\nDirected by - Chanuka Mora\r\nDirector of Photography - Viyath Deelaka\r\nVideo Edit - Chanuka Mora\r\n\r\nCast\r\nAmaya Nanayakkara\r\nPabasara Samodana', NULL, NULL, NULL, 'uploads/covers/YCaudio/audio_cover_7.jpeg', 'uploads/YCaudio/1755069103_media_nona-yaka-crew.mp3', '2025-08-13 07:11:43', '2025-08-13 07:11:43', 1, 'latest', 'rock', 0),
(79, 'Deviyo Wadi', 'Yaka Crew', 'Music - Chanuka Mora\r\nMelody - Chanuka Mora\r\nLyrics - Chanuka Mora\r\nMusic Arrangments - Yakacrew\r\nBass - Nisal Jayaweera\r\nLead - Harith Wijayawardane\r\nKeys - Nadun Bandara\r\nMixed & Mastered - Azim Ousman\r\nArt Work - Viyath Deelaka ', NULL, NULL, NULL, 'uploads/covers/YCaudio/audio_cover_8.jpeg', 'uploads/YCaudio/1755070316_media_deviyo wadi.mp3', '2025-08-13 07:31:56', '2025-08-13 07:31:56', 1, 'latest', 'hip_hop', 0),
(82, 'AWURUDDAI HINAHENA', 'Yaka Crew', 'Music by - Chanuka Mora\r\nMelody by - Chanuka Mora\r\nLyrics - Chanuka Mora\r\nRap Lyrics - Dilo\r\nMusic Arrangments - Yakacrew\r\nMixed & Mastered - Azim Ousman\r\n\r\nVideo Concept - Pasindu Chamara\r\nVideo Director - Viyath Deelaka\r\nDirector of Photography - Viyath Deelaka', NULL, NULL, NULL, 'uploads/covers/YCaudio/audio_cover_9.jpeg', 'uploads/YCaudio/1755075294_media_Awuruddai hinahena.mp3', '2025-08-13 08:54:54', '2025-08-13 08:54:54', 1, 'latest', 'pop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `music_category` varchar(100) DEFAULT NULL,
  `artist_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `upload_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `cover_image`, `Location`, `music_category`, `artist_name`, `description`, `video_path`, `upload_date`) VALUES
(40, 'Ravana', 'uploads/covers/YCvideos/video_cover_689c01e8a95481.18483794.jpeg', 'video', 'traditional', 'Chanuka Mora', 'Yaka Crew, a vibrant musical ensemble, combines diverse talents to create a unique sonic experience.  @ChanukaMora  , the driving force behind Yaka Crew, leads with captivating vocals and musical prowess.  @dilohiphop    the rap virtuoso of the band, injects dynamic energy into Yaka Crew performances. Known for their versatility, Yaka Crew thrives in both concert halls and wedding celebrations, delivering an unforgettable musical backdrop. Brimming with youthful vigor and accomplished musicians, Yaka Crew embodies a harmonious fusion of emerging talent and seasoned expertise.\r\n', 'uploads/YCvideos/1755054547_media_videoplayback.mp4', '2025-08-13 08:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `whats_new`
--

CREATE TABLE `whats_new` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `band_members`
--
ALTER TABLE `band_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_posts_date` (`event_date`),
  ADD KEY `idx_posts_category` (`category`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_songs_album` (`album_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whats_new`
--
ALTER TABLE `whats_new`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `band_members`
--
ALTER TABLE `band_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `whats_new`
--
ALTER TABLE `whats_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
