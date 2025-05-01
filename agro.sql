-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2025 at 09:15 PM
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
-- Database: `agro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_22_171348_add_two_factor_columns_to_users_table', 1),
(5, '2025_04_22_171405_create_personal_access_tokens_table', 1),
(6, '2025_04_23_134945_create_farmers_table', 2),
(8, '2025_04_26_040210_create_user_management_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BwmRgNaH4OW8db2lGz1qZ2DdZqDxWuwgtFfxx9gQ', 6, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibnB5R0FQeHk1MkZPREllREIzcjVBbUZ4OGVXQnFnVmNmZTd6ZVYweiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1746126551);

-- --------------------------------------------------------

--
-- Table structure for table `soil_data_analysis`
--

CREATE TABLE `soil_data_analysis` (
  `id` int(11) NOT NULL,
  `water_level` varchar(255) DEFAULT NULL,
  `ph_level` varchar(255) DEFAULT NULL,
  `nitrogen_level` varchar(255) DEFAULT NULL,
  `days_after_irrigation` varchar(255) DEFAULT NULL,
  `potassium_level` varchar(255) DEFAULT NULL,
  `ph_level_2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soil_data_analysis`
--

INSERT INTO `soil_data_analysis` (`id`, `water_level`, `ph_level`, `nitrogen_level`, `days_after_irrigation`, `potassium_level`, `ph_level_2`, `created_at`, `updated_at`) VALUES
(1, '26-50', '4-7', '0-25', '4-7', '0-25', '4-7', '2025-05-01 08:05:47', '2025-05-01 08:05:47'),
(2, '26-50', '4-7', '26-50', '4-7', '26-50', '4-7', '2025-05-01 08:46:41', '2025-05-01 08:46:41'),
(3, '26-50', '4-7', '26-50', '4-7', '26-50', '4-7', '2025-05-01 08:48:26', '2025-05-01 08:48:26'),
(4, '0-25', '4-7', '0-25', '4-7', '0-25', '4-7', '2025-05-01 08:48:38', '2025-05-01 08:48:38'),
(5, '0-25', '4-7', '26-50', '4-7', '26-50', '0-3', '2025-05-01 08:55:10', '2025-05-01 08:55:10'),
(6, '0-25', '4-7', '26-50', '4-7', '26-50', '4-7', '2025-05-01 09:05:06', '2025-05-01 09:05:06'),
(7, '0-25', '0-3', '0-25', '0-3', '0-25', '0-3', '2025-05-01 09:28:50', '2025-05-01 09:28:50'),
(8, '0-25', '4-7', '26-50', '4-7', '26-50', '4-7', '2025-05-01 10:02:43', '2025-05-01 10:02:43'),
(9, '26-50', '4-7', '26-50', '4-7', '26-50', '4-7', '2025-05-01 10:19:46', '2025-05-01 10:19:46'),
(10, '0-25', '4-7', '26-50', '4-7', '26-50', '4-7', '2025-05-01 10:33:17', '2025-05-01 10:33:17'),
(11, '0-25', '0-3', '0-25', '0-3', '0-25', '0-3', '2025-05-01 13:06:21', '2025-05-01 13:06:21'),
(12, '76-100', '12-14', '76-100', '12-14', '76-100', '12-14', '2025-05-01 13:07:00', '2025-05-01 13:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Abhishek Kaisar', 'abhishekkaisar2015@gmail.com', NULL, '$2y$12$1HY.dc6AZEfoxR.RC9S8hu5KK941aaaktNgk0d5J.lgkSOu004oFi', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-22 11:22:33', '2025-04-22 11:22:33'),
(5, 'Maisha Tabassum', 'maisha.t@gmail.com', NULL, '$2y$12$T0fUa4hN6HWsVkBm4n04Y.N7wejC4Nzt6NyZ1GvuMcu4HGD//cpjG', NULL, NULL, NULL, 'Tzf9cjJ83hgMfLGsHp70tIpqFH8hfHtNV6RXRl4OrxpCjmW0y85ywuDVw9UR', NULL, NULL, '2025-05-01 04:40:07', '2025-05-01 04:40:07'),
(6, 'Hridika Tuly', 'tuly2020@gmail.com', NULL, '$2y$12$BlnmYrSxZgG7mXwBsH8/Ge/NvphOg7U0r6M/n967/mPqNcq9VX2le', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-01 13:08:55', '2025-05-01 13:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`id`, `name`, `email`, `mobile`, `password`, `date_of_birth`, `blood_group`, `nid`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'fa', 'abhishekkaisar205@gmail.com', '01921522271', '$2y$12$pmANOHuBOHFwcQpfd.6qPeeZ68Yd/2UHBJxu8Bai2hvF5bWAYLFs2', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-05-01 03:28:37', '2025-05-01 03:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `weather_data`
--

CREATE TABLE `weather_data` (
  `id` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `temperature_celsius` float DEFAULT NULL,
  `temperature_fahrenheit` float DEFAULT NULL,
  `weather_type` varchar(255) DEFAULT NULL,
  `icon_code` varchar(50) DEFAULT NULL,
  `is_today` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather_data`
--

INSERT INTO `weather_data` (`id`, `city`, `country`, `day`, `temperature_celsius`, `temperature_fahrenheit`, `weather_type`, `icon_code`, `is_today`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'BD', 'Thursday', 34.31, 93.758, 'Clouds', '03d', 1, '2025-05-01 06:21:42', '2025-05-01 06:21:42'),
(2, 'Dhaka', 'BD', 'Friday', 28.19, 82.742, 'Rain', '10n', 0, '2025-05-01 06:21:42', '2025-05-01 06:21:42'),
(3, 'Dhaka', 'BD', 'Saturday', 26.47, 79.646, 'Clouds', '03n', 0, '2025-05-01 06:21:42', '2025-05-01 06:21:42'),
(4, 'Dhaka', 'BD', 'Sunday', 27.18, 80.924, 'Clouds', '04n', 0, '2025-05-01 06:21:42', '2025-05-01 06:21:42'),
(5, 'Dhaka', 'BD', 'Thursday', 34.31, 93.758, 'Clouds', '03d', 1, '2025-05-01 06:21:43', '2025-05-01 06:21:43'),
(6, 'Dhaka', 'BD', 'Friday', 28.19, 82.742, 'Rain', '10n', 0, '2025-05-01 06:21:43', '2025-05-01 06:21:43'),
(7, 'Dhaka', 'BD', 'Saturday', 26.47, 79.646, 'Clouds', '03n', 0, '2025-05-01 06:21:43', '2025-05-01 06:21:43'),
(8, 'Dhaka', 'BD', 'Sunday', 27.18, 80.924, 'Clouds', '04n', 0, '2025-05-01 06:21:43', '2025-05-01 06:21:43'),
(9, 'Dhaka', 'BD', 'Thursday', 34.31, 93.758, 'Clouds', '03d', 1, '2025-05-01 07:23:52', '2025-05-01 07:23:52'),
(10, 'Dhaka', 'BD', 'Friday', 27.51, 81.518, 'Rain', '10n', 0, '2025-05-01 07:23:52', '2025-05-01 07:23:52'),
(11, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 07:23:52', '2025-05-01 07:23:52'),
(12, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 07:23:52', '2025-05-01 07:23:52'),
(13, 'Dhaka', 'BD', 'Thursday', 29.89, 85.802, 'Clouds', '04n', 1, '2025-05-01 09:37:14', '2025-05-01 09:37:14'),
(14, 'Dhaka', 'BD', 'Friday', 28.3, 82.94, 'Rain', '10n', 0, '2025-05-01 09:37:14', '2025-05-01 09:37:14'),
(15, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 09:37:14', '2025-05-01 09:37:14'),
(16, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 09:37:14', '2025-05-01 09:37:14'),
(17, 'Dhaka', 'BD', 'Thursday', 28.61, 83.498, 'Clouds', '04n', 1, '2025-05-01 10:33:10', '2025-05-01 10:33:10'),
(18, 'Dhaka', 'BD', 'Friday', 25.13, 77.234, 'Rain', '10n', 0, '2025-05-01 10:33:10', '2025-05-01 10:33:10'),
(19, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 10:33:10', '2025-05-01 10:33:10'),
(20, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 10:33:10', '2025-05-01 10:33:10'),
(21, 'Dhaka', 'BD', 'Thursday', 26.1, 78.98, 'Clouds', '04n', 1, '2025-05-01 11:28:45', '2025-05-01 11:28:45'),
(22, 'Dhaka', 'BD', 'Friday', 25.13, 77.234, 'Rain', '10n', 0, '2025-05-01 11:28:45', '2025-05-01 11:28:45'),
(23, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 11:28:45', '2025-05-01 11:28:45'),
(24, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 11:28:45', '2025-05-01 11:28:45'),
(25, 'Dhaka', 'BD', 'Thursday', 26.1, 78.98, 'Clouds', '04n', 1, '2025-05-01 11:30:28', '2025-05-01 11:30:28'),
(26, 'Dhaka', 'BD', 'Friday', 25.13, 77.234, 'Rain', '10n', 0, '2025-05-01 11:30:28', '2025-05-01 11:30:28'),
(27, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 11:30:28', '2025-05-01 11:30:28'),
(28, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 11:30:28', '2025-05-01 11:30:28'),
(29, 'Dhaka', 'BD', 'Thursday', 26.1, 78.98, 'Clouds', '04n', 1, '2025-05-01 11:30:29', '2025-05-01 11:30:29'),
(30, 'Dhaka', 'BD', 'Friday', 25.13, 77.234, 'Rain', '10n', 0, '2025-05-01 11:30:29', '2025-05-01 11:30:29'),
(31, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 11:30:29', '2025-05-01 11:30:29'),
(32, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 11:30:29', '2025-05-01 11:30:29'),
(33, 'Dhaka', 'BD', 'Friday', 25.13, 77.234, 'Clouds', '04n', 1, '2025-05-01 12:11:25', '2025-05-01 12:11:25'),
(34, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 12:11:25', '2025-05-01 12:11:25'),
(35, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 12:11:25', '2025-05-01 12:11:25'),
(36, 'Dhaka', 'BD', 'Monday', 26.32, 79.376, 'Rain', '10n', 0, '2025-05-01 12:11:25', '2025-05-01 12:11:25'),
(37, 'Dhaka', 'BD', 'Friday', 25.13, 77.234, 'Clouds', '04n', 1, '2025-05-01 12:11:28', '2025-05-01 12:11:28'),
(38, 'Dhaka', 'BD', 'Saturday', 26.14, 79.052, 'Clouds', '02n', 0, '2025-05-01 12:11:28', '2025-05-01 12:11:28'),
(39, 'Dhaka', 'BD', 'Sunday', 24.2, 75.56, 'Rain', '10n', 0, '2025-05-01 12:11:28', '2025-05-01 12:11:28'),
(40, 'Dhaka', 'BD', 'Monday', 26.32, 79.376, 'Rain', '10n', 0, '2025-05-01 12:11:28', '2025-05-01 12:11:28'),
(41, 'Dhaka', 'BD', 'Friday', 26.14, 79.052, 'Clouds', '04n', 1, '2025-05-01 12:42:49', '2025-05-01 12:42:49'),
(42, 'Dhaka', 'BD', 'Saturday', 27.36, 81.248, 'Clear', '01n', 0, '2025-05-01 12:42:49', '2025-05-01 12:42:49'),
(43, 'Dhaka', 'BD', 'Sunday', 26.98, 80.564, 'Clouds', '04n', 0, '2025-05-01 12:42:49', '2025-05-01 12:42:49'),
(44, 'Dhaka', 'BD', 'Monday', 28.56, 83.408, 'Clouds', '04n', 0, '2025-05-01 12:42:49', '2025-05-01 12:42:49'),
(45, 'Dhaka', 'BD', 'Friday', 26.14, 79.052, 'Clouds', '04n', 1, '2025-05-01 13:06:03', '2025-05-01 13:06:03'),
(46, 'Dhaka', 'BD', 'Saturday', 27.36, 81.248, 'Clear', '01n', 0, '2025-05-01 13:06:03', '2025-05-01 13:06:03'),
(47, 'Dhaka', 'BD', 'Sunday', 26.98, 80.564, 'Clouds', '04n', 0, '2025-05-01 13:06:03', '2025-05-01 13:06:03'),
(48, 'Dhaka', 'BD', 'Monday', 28.56, 83.408, 'Clouds', '04n', 0, '2025-05-01 13:06:03', '2025-05-01 13:06:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `farmers_email_unique` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `soil_data_analysis`
--
ALTER TABLE `soil_data_analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_management_email_unique` (`email`),
  ADD UNIQUE KEY `user_management_mobile_unique` (`mobile`);

--
-- Indexes for table `weather_data`
--
ALTER TABLE `weather_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soil_data_analysis`
--
ALTER TABLE `soil_data_analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weather_data`
--
ALTER TABLE `weather_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
