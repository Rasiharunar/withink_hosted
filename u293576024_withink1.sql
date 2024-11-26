-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2024 at 01:20 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u293576024_withink1`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('112345dim@zein.com|182.2.37.251', 'i:1;', 1732337089),
('112345dim@zein.com|182.2.37.251:timer', 'i:1732337089;', 1732337089),
('20102103@ittelkom-pwt.ac.id|36.66.160.4', 'i:1;', 1731980155),
('20102103@ittelkom-pwt.ac.id|36.66.160.4:timer', 'i:1731980155;', 1731980155),
('admin@gmail.com|36.66.160.4', 'i:1;', 1731979897),
('admin@gmail.com|36.66.160.4:timer', 'i:1731979897;', 1731979897),
('cihuyy@gmail.com|2001:448a:40ac:1e9e:c15:2128:94e6:3b9f', 'i:1;', 1732279102),
('cihuyy@gmail.com|2001:448a:40ac:1e9e:c15:2128:94e6:3b9f:timer', 'i:1732279102;', 1732279102),
('dim@zein.com|182.2.37.251', 'i:3;', 1732337065),
('dim@zein.com|182.2.37.251:timer', 'i:1732337065;', 1732337065),
('fikrifufa@gmail.com|112.78.156.165', 'i:1;', 1732280352),
('fikrifufa@gmail.com|112.78.156.165:timer', 'i:1732280352;', 1732280352),
('fufafafu@gmail.com|112.78.156.165', 'i:1;', 1732284512),
('fufafafu@gmail.com|112.78.156.165:timer', 'i:1732284512;', 1732284512),
('harun@gmail.com|114.10.153.98', 'i:2;', 1732561000),
('harun@gmail.com|114.10.153.98:timer', 'i:1732561000;', 1732561000),
('harun@gmail.com|36.66.160.4', 'i:1;', 1732583886),
('harun@gmail.com|36.66.160.4:timer', 'i:1732583886;', 1732583886),
('kukuwanjoetbuwaduaq@gmail.com|103.18.35.61', 'i:1;', 1732281234),
('kukuwanjoetbuwaduaq@gmail.com|103.18.35.61:timer', 'i:1732281234;', 1732281234),
('roderoro329@gmail.com|36.73.34.27', 'i:1;', 1732338479),
('roderoro329@gmail.com|36.73.34.27:timer', 'i:1732338479;', 1732338479),
('tititsapi@gmail.com|36.73.33.133', 'i:1;', 1732545241),
('tititsapi@gmail.com|36.73.33.133:timer', 'i:1732545241;', 1732545241),
('zaproxy@example.com|114.10.151.48', 'i:1;', 1731957510),
('zaproxy@example.com|114.10.151.48:timer', 'i:1731957510;', 1731957510),
('zaproxy@example.com|175.158.55.17', 'i:1;', 1732470001),
('zaproxy@example.com|175.158.55.17:timer', 'i:1732470001;', 1732470001),
('zaproxy@example.com|36.73.34.190', 'i:1;', 1732526501),
('zaproxy@example.com|36.73.34.190:timer', 'i:1732526501;', 1732526501),
('zaproxy@example.com|36.73.34.220', 'i:5;', 1732338392),
('zaproxy@example.com|36.73.34.220:timer', 'i:1732338392;', 1732338392),
('zaproxy@example.com0w45pz4p|36.73.34.220', 'i:1;', 1732338377),
('zaproxy@example.com0w45pz4p|36.73.34.220:timer', 'i:1732338377;', 1732338377);

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
(21, '0001_01_01_000000_create_users_table', 1),
(22, '0001_01_01_000001_create_cache_table', 1),
(23, '0001_01_01_000002_create_jobs_table', 1),
(24, '2024_06_05_025743_create_relays_table', 1),
(25, '2024_10_19_124544_create_tb_sensor_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('dim@zein.com', '$2y$12$Wk/5WfAAcvubrj9JIkucC.vXnAjoxUK823lQEwovz9beaU19QNuyO', '2024-11-23 04:54:34'),
('ramaeshanin2@gmail.com', '$2y$12$KlyEo4OTMD/JVP4N8.IA6u/3x9ASNdGeRp4mJFa5m3C23DuTl0Asy', '2024-11-23 05:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `relays`
--

CREATE TABLE `relays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `relay1` varchar(1) NOT NULL DEFAULT '0',
  `relay2` varchar(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relays`
--

INSERT INTO `relays` (`id`, `user_id`, `relay1`, `relay2`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '0', '2024-11-11 10:35:17', '2024-11-24 02:14:11'),
(2, 2, '1', '1', '2024-11-11 10:37:41', '2024-11-11 10:43:58'),
(4, 4, '0', '0', '2024-11-18 15:39:04', '2024-11-18 15:39:14'),
(5, 5, '1', '1', '2024-11-19 02:10:50', '2024-11-21 00:38:59'),
(6, 6, '0', '0', '2024-11-21 00:40:37', '2024-11-21 00:40:37'),
(7, 7, '0', '1', '2024-11-21 00:42:22', '2024-11-21 00:42:31'),
(8, 8, '0', '0', '2024-11-22 12:39:36', '2024-11-22 12:39:36'),
(9, 9, '0', '0', '2024-11-22 12:49:30', '2024-11-22 12:49:49'),
(10, 10, '0', '0', '2024-11-22 12:53:50', '2024-11-22 12:55:35'),
(11, 11, '0', '0', '2024-11-22 13:12:45', '2024-11-22 13:12:45'),
(12, 12, '1', '0', '2024-11-22 13:13:39', '2024-11-22 13:14:02'),
(14, 14, '0', '0', '2024-11-23 04:57:31', '2024-11-23 04:57:31'),
(15, 15, '0', '0', '2024-11-23 05:05:23', '2024-11-23 05:05:23'),
(16, 16, '0', '0', '2024-11-23 05:08:18', '2024-11-23 05:08:18'),
(18, 18, '1', '1', '2024-11-24 15:57:24', '2024-11-24 17:52:09');

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
('4rxacSXYg85wCMq1VmclLsYghZmZ5P8IrqyIzUwM', NULL, '54.68.150.15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.53 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTVpVlR4QjkwU3E0MVR6RXJVS21qd2RFUDV0TEpjTDk3Q3BvT3VBciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vd2l0aGluay5wcm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1732581389),
('APu0XNZfKkWtlfojQtjDAJFYeefSNmUyr4Qq2Vbo', NULL, '114.10.153.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZjB0VGJqUk1TdU5KM3NxY3cxbDlCUVJxTlF3SFNsalphNzNacWV6UiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1732580664),
('fadGSphLOt9hi6HPh34JhTq9hYRPrefdE1s3k1cS', NULL, '36.66.160.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoic2Y2YjNDaVZpT1JkSU84aExyVHNyZ3RyTkRpbXc0akFqM1hFQmM5byI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1732584042),
('hbpT6SJTjoEbklotiYXCcA9VpgWYgfNGUpuxELXT', NULL, '36.66.160.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaU1WeWF4UTJqV251VG50RFpJdlR1ZG84UnhrUDREVlJmOVBld2dwTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd2l0aGluay5wcm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1732583555),
('IICkV8ARKuweYai4d0HauExu4HwZkqSrsOVCqhUH', 1, '36.66.160.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0FLSVp6aWttSElCSmUwY2JUTlFpNFdxaVY1cHdsdk1SN0xYY0RSMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vd2l0aGluay5wcm8vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1732583854);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sensor`
--

CREATE TABLE `tb_sensor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelembapan` double NOT NULL,
  `volume_tanki` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_sensor`
--

INSERT INTO `tb_sensor` (`id`, `user_id`, `kelembapan`, `volume_tanki`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 72.12, '2024-11-11 10:35:17', '2024-11-23 08:26:22'),
(2, 2, 0, 70, '2024-11-11 10:37:41', '2024-11-11 10:37:41'),
(4, 4, 0, 0, '2024-11-18 15:39:04', '2024-11-18 15:39:04'),
(5, 5, 0, 0, '2024-11-19 02:10:50', '2024-11-19 02:10:50'),
(6, 6, 0, 0, '2024-11-21 00:40:37', '2024-11-21 00:40:37'),
(7, 7, 0, 0, '2024-11-21 00:42:22', '2024-11-21 00:42:22'),
(8, 8, 0, 0, '2024-11-22 12:39:36', '2024-11-22 12:39:36'),
(9, 9, 0, 0, '2024-11-22 12:49:30', '2024-11-22 12:49:30'),
(10, 10, 0, 0, '2024-11-22 12:53:50', '2024-11-22 12:53:50'),
(11, 11, 0, 0, '2024-11-22 13:12:45', '2024-11-22 13:12:45'),
(12, 12, 0, 0, '2024-11-22 13:13:39', '2024-11-22 13:13:39'),
(14, 14, 0, 0, '2024-11-23 04:57:31', '2024-11-23 04:57:31'),
(15, 15, 0, 0, '2024-11-23 05:05:23', '2024-11-23 05:05:23'),
(16, 16, 0, 0, '2024-11-23 05:08:18', '2024-11-23 05:08:18'),
(18, 18, 0, 0, '2024-11-24 15:57:24', '2024-11-24 15:57:24');

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
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'harun', 'ramaeshanin2@gmail.com', NULL, '$2y$12$6F2hD82Pz6dXj7f9HuWF2OFc6gXw73lRBR7KJagWSoatPn1QfJq22', 'user', NULL, '2024-11-11 10:35:17', '2024-11-23 05:26:01'),
(2, 'himma', 'himma@gmail.com', NULL, '$2y$12$4O0739fQP6xH/wndx/I7buEkVob3iirCV4j4arqbjohh6Q8y2124S', 'user', NULL, '2024-11-11 10:37:41', '2024-11-11 10:37:41'),
(4, 'Nabil Helmy Asshidiqi', 'helmy.nabil04@gmail.com', NULL, '$2y$12$8WVHacSL35eGAMEl.gYyguABFXDzb2LuzoXjpJyLuiAtBdUTkHQfi', 'admin', NULL, '2024-11-18 15:39:04', '2024-11-18 15:39:04'),
(5, 'Sarumpaet', 'sarumpaet@gmail.com', NULL, '$2y$12$5CelHT6hT9zsqckZ6e1/XeC7qFjCMga/5rXn0414DVOT9szSeYbEy', 'admin', NULL, '2024-11-19 02:10:50', '2024-11-19 02:10:50'),
(6, 'Santo', 'santo@gmail.com', NULL, '$2y$12$lYFcucL9e9hKCa27GmAXn.Bj3C2VsH1hzIsBzWG3aw.JYWqlf/dtu', 'user', NULL, '2024-11-21 00:40:37', '2024-11-21 00:40:37'),
(7, 'CAK3BAB3', 'sirkelblunder@gmail.com', NULL, '$2y$12$vbgMH3eEARhQImCfZ7c1XeIHS3rCQqbkE71viai5cVaZMl5k2EXi6', 'editor', NULL, '2024-11-21 00:42:22', '2024-11-21 00:42:22'),
(8, 'Cihuyy', 'cihuyy@gmail.com', NULL, '$2y$12$Cce9FB0VNK0T1M8q8oISgekLVHFL08cYstQkgXyXKV2pla5E4cGD6', 'user', NULL, '2024-11-22 12:39:36', '2024-11-22 12:39:36'),
(9, 'kodokdokan', 'quwuwanjutbwadag@gmail.com', NULL, '$2y$12$EdUf2NPIVutcu/t0CVidgu1cqrM2CSCwZDHCZhhggsPLgDb5hmHqq', 'user', NULL, '2024-11-22 12:49:30', '2024-11-22 12:49:30'),
(10, 'Fikrifufa', 'fuad@gmail.com', NULL, '$2y$12$3k71KTGOgxJNM84Hlbf6.udxC9sX6qAoIeRH84Bhv0Gdfdtm6IIpa', 'user', NULL, '2024-11-22 12:53:50', '2024-11-22 12:53:50'),
(11, 'Anang', 'wagyu@gmail.com', NULL, '$2y$12$wMARIQsTc24E5BfF4Dh46OycpVHLdNzNbLqjxHkENctCosxckOfty', 'user', 'xC4AzhgOWgfXZm8OqLku5RQgnNvRiMucky8evqsBUCYmmClQmhkU8hSZKn22', '2024-11-22 13:12:45', '2024-11-22 13:12:45'),
(12, 'anuansapi', 'fufupedo@gmail.com', NULL, '$2y$12$AbkdSHvZ3tH4RtYfZRyDx.GDAmjgEi58.hfBn1dI3ocwOZcQyhlr2', 'user', NULL, '2024-11-22 13:13:39', '2024-11-22 13:13:39'),
(14, 'dimas', 'dimaszain2@gmail.com', NULL, '$2y$12$FDisdHIZyjr3DdV4BznV/upmUiYnNUoe3NviUbJwCkO6vqaZ2w5Ka', 'user', NULL, '2024-11-23 04:57:31', '2024-11-23 04:57:31'),
(15, 'wahyu', 'asede@gmail.com', NULL, '$2y$12$kvDjmu2KJ3hkNCt34dortubTVO9/p3cw50MlJXVEsJlSFoMuOptGe', 'admin', NULL, '2024-11-23 05:05:23', '2024-11-23 05:05:23'),
(16, 'TYTYDKBKAR69', 'bakarsos@sos.is', NULL, '$2y$12$PxYUTSQ81ECHIL751vfMiuPVsEtUrWx40Pq4LGCvyZkpjJmL.gJC6', 'user', NULL, '2024-11-23 05:08:18', '2024-11-23 05:08:18'),
(18, '<b>\'aaa\'</b>', 'aw@gmail.com', NULL, '$2y$12$DJb.GUjk5oGnyxDxxaFCfuV2Iy64gYPaRxsQEAOQtzugPeaVKCCeG', 'user', NULL, '2024-11-24 15:57:24', '2024-11-24 22:46:49');

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
-- Indexes for table `relays`
--
ALTER TABLE `relays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relays_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tb_sensor`
--
ALTER TABLE `tb_sensor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_sensor_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `relays`
--
ALTER TABLE `relays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_sensor`
--
ALTER TABLE `tb_sensor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relays`
--
ALTER TABLE `relays`
  ADD CONSTRAINT `relays_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_sensor`
--
ALTER TABLE `tb_sensor`
  ADD CONSTRAINT `tb_sensor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
