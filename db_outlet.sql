-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 06:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_outlet`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `ID_Finance` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Finance` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tempat_Lahir_Finance` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Lahir_Finance` date DEFAULT NULL,
  `Jenis_Kelamin_Finance` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat_Finance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nomor_Telepon_Finance` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`ID_Finance`, `Nama_Finance`, `Tempat_Lahir_Finance`, `Tanggal_Lahir_Finance`, `Jenis_Kelamin_Finance`, `Alamat_Finance`, `Nomor_Telepon_Finance`, `created_at`, `updated_at`) VALUES
('IF-0001', 'Wawan S', 'Bandung', '2023-07-05', 'Laki-Laki', 'Bandung Rck', '1233', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leader_outlet`
--

CREATE TABLE `leader_outlet` (
  `ID_Leader` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Leader` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tempat_Lahir_Leader` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Lahir_Leader` date DEFAULT NULL,
  `Jenis_Kelamin_Leader` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat_Leader` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nomor_Telepon_Leader` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leader_outlet`
--

INSERT INTO `leader_outlet` (`ID_Leader`, `Nama_Leader`, `Tempat_Lahir_Leader`, `Tanggal_Lahir_Leader`, `Jenis_Kelamin_Leader`, `Alamat_Leader`, `Nomor_Telepon_Leader`, `created_at`, `updated_at`) VALUES
('ILO-0001', 'Agus', 'Bandung', '2011-07-05', 'Laki-Laki', 'Bandung', '123321', NULL, NULL),
('ILO-0002', 'Bambang', 'Jakarta', '2013-07-05', 'Laki-Laki', 'jakarta', '066789123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(47, '2014_10_12_000000_create_users_table', 1),
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2019_08_19_000000_create_failed_jobs_table', 1),
(50, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(51, '2023_06_21_164008_create_outlet_table', 1),
(52, '2023_06_21_172339_create_leader_outlet_table', 1),
(53, '2023_06_22_121039_create_report_harian_table', 1),
(54, '2023_07_04_010559_create_users_role_table', 1),
(55, '2023_07_04_012215_create_finance_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `ID_Outlet` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Leader` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nama_Outlet` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat_Outlet` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`ID_Outlet`, `ID_Leader`, `Nama_Outlet`, `Alamat_Outlet`, `created_at`, `updated_at`) VALUES
('IO-0001', 'ILO-0001', 'tes', 'asdasdasdassadsadadsdsaasd', NULL, NULL),
('IO-0002', 'ILO-0002', 'tes 12', 'Rancaekek', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_harian`
--

CREATE TABLE `report_harian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_User` int(10) UNSIGNED NOT NULL,
  `ID_Leader` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_Finance` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_User_Roles` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_User`, `ID_Leader`, `ID_Finance`, `Username`, `Password`, `ID_User_Roles`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'admin', 'admin123', 1, NULL, NULL),
(2, NULL, 'IF-0001', 'wawan123', '123', 2, NULL, NULL),
(3, 'ILO-0001', NULL, 'agus', 'agus123', 3, NULL, NULL),
(4, 'ILO-0002', NULL, 'bambang', 'bambang123', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `ID_User_Roles` int(10) UNSIGNED NOT NULL,
  `Role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`ID_User_Roles`, `Role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Finance', NULL, NULL),
(3, 'Leader', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`ID_Finance`);

--
-- Indexes for table `leader_outlet`
--
ALTER TABLE `leader_outlet`
  ADD PRIMARY KEY (`ID_Leader`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`ID_Outlet`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `report_harian`
--
ALTER TABLE `report_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`ID_User_Roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_harian`
--
ALTER TABLE `report_harian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `ID_User_Roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
