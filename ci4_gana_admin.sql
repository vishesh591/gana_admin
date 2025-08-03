-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 03, 2025 at 08:35 AM
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
-- Database: `ci4_gana_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `g_artists`
--

CREATE TABLE `g_artists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artlist_name` varchar(255) NOT NULL,
  `spotify_id` varchar(255) DEFAULT NULL,
  `apple_id` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `g_labels`
--

CREATE TABLE `g_labels` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `primary_label` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `g_migrations`
--

CREATE TABLE `g_migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `g_migrations`
--

INSERT INTO `g_migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-09-25-092229', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1752599043, 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_release`
--

CREATE TABLE `g_release` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `label_name` varchar(255) DEFAULT NULL,
  `artist_ids` varchar(255) DEFAULT NULL,
  `featuring_artist_ids` varchar(255) DEFAULT NULL,
  `release_type` varchar(255) DEFAULT NULL,
  `mood_type` varchar(255) DEFAULT NULL,
  `genre_tpe` varchar(255) DEFAULT NULL,
  `upc_ean` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `artwork` varchar(255) DEFAULT NULL,
  `track_title` varchar(255) DEFAULT NULL,
  `secondary_track_type` varchar(255) DEFAULT NULL,
  `instrumental` enum('No','Yes') NOT NULL DEFAULT 'No',
  `isrc` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `composer` varchar(255) DEFAULT NULL,
  `remixer` varchar(255) DEFAULT NULL,
  `arranger` varchar(255) DEFAULT NULL,
  `music_producer` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `c_line_year` varchar(255) DEFAULT NULL,
  `c_line` varchar(255) DEFAULT NULL,
  `p_line_year` varchar(255) DEFAULT NULL,
  `p_line` varchar(255) DEFAULT NULL,
  `production_year` varchar(255) DEFAULT NULL,
  `track_title_language` varchar(255) DEFAULT NULL,
  `explicit_song` enum('NA','Yes','No') DEFAULT NULL,
  `lyrics` text DEFAULT NULL,
  `audio_file` varchar(255) DEFAULT NULL,
  `stores_ids` varchar(255) DEFAULT NULL,
  `rights_management_options` varchar(255) DEFAULT NULL,
  `release_date` varchar(255) DEFAULT NULL,
  `pre_sale_date` varchar(255) DEFAULT NULL,
  `original_release_date` varchar(255) DEFAULT NULL,
  `release_price` varchar(255) DEFAULT NULL,
  `sale_price` varchar(255) DEFAULT NULL,
  `t_and_c` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `g_users`
--

CREATE TABLE `g_users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_type` enum('Artist','Label','Sub Admin','Super Admin') NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `g_users`
--

INSERT INTO `g_users` (`id`, `name`, `email`, `password`, `role_type`, `parent_id`, `status`, `created_at`) VALUES
(1, 'Test', 'test@test.com', '$2y$10$TFqb2Fg.MFnyhgDY6Z2.LuL3mbDQVzeyLIuqPEgfZcOF/MqOy18sC', 'Super Admin', NULL, 1, '2025-07-15 22:35:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `g_artists`
--
ALTER TABLE `g_artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_labels`
--
ALTER TABLE `g_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_migrations`
--
ALTER TABLE `g_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_release`
--
ALTER TABLE `g_release`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_users`
--
ALTER TABLE `g_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `g_artists`
--
ALTER TABLE `g_artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `g_labels`
--
ALTER TABLE `g_labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `g_migrations`
--
ALTER TABLE `g_migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `g_release`
--
ALTER TABLE `g_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `g_users`
--
ALTER TABLE `g_users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
