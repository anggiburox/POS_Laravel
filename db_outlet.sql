-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 03:41 PM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Barang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_Barang`, `Nama_Barang`, `created_at`, `updated_at`) VALUES
('IB-0001', 'Ayam C9', NULL, NULL),
('IB-0002', 'Ayam C2', NULL, NULL),
('IB-0003', 'Ayam C3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rekap_pemasukan`
--

CREATE TABLE `detail_rekap_pemasukan` (
  `ID_Detail_Pemasukan` int(10) UNSIGNED NOT NULL,
  `ID_Pemasukan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_Jenis_Layanan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_Barang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QTY` bigint(20) DEFAULT NULL,
  `PCS` bigint(20) DEFAULT NULL,
  `Harga_Barang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_rekap_pemasukan`
--

INSERT INTO `detail_rekap_pemasukan` (`ID_Detail_Pemasukan`, `ID_Pemasukan`, `ID_Jenis_Layanan`, `ID_Barang`, `QTY`, `PCS`, `Harga_Barang`, `created_at`, `updated_at`) VALUES
(10, 'IRPM-0001', 'IRJL-0001', 'IB-0002', 10, 20, '2000000', NULL, NULL),
(11, 'IRPM-0002', 'IRJL-0001', 'IB-0002', 100, 200, '20000', NULL, NULL),
(12, 'IRPM-0002', 'IRJL-0002', 'IB-0003', 300, 400, '10000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rekap_pengeluaran`
--

CREATE TABLE `detail_rekap_pengeluaran` (
  `ID_Detail_Pengeluaran` int(10) UNSIGNED NOT NULL,
  `ID_Rekap_Pengeluaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nama_Barang_Pengeluaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QTY` bigint(20) DEFAULT NULL,
  `Harga_Barang_Pengeluaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('IF-0001', 'Anggi', 'Bandung', '2001-10-02', 'Laki-Laki', 'Bandung', '0123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `ID_Laporan` int(10) UNSIGNED NOT NULL,
  `ID_Outlet` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Laporan` date DEFAULT NULL,
  `Barang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Pemasukan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Pengeluaran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('ILO-0001', 'Sasa', 'Bandung', '1999-10-02', 'Perempuan', 'jakarta', '08123', NULL, NULL),
('ILO-0002', 'Fitri', 'bandung', '2000-10-02', 'Perempuan', 'bandung kopo', '071823', NULL, NULL);

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
(161, '2014_10_12_000000_create_users_table', 1),
(162, '2014_10_12_100000_create_password_resets_table', 1),
(163, '2019_08_19_000000_create_failed_jobs_table', 1),
(164, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(165, '2023_06_21_164008_create_outlet_table', 1),
(166, '2023_06_21_172339_create_leader_outlet_table', 1),
(167, '2023_06_22_121039_create_barang_table', 1),
(168, '2023_07_04_010559_create_users_role_table', 1),
(169, '2023_07_04_012215_create_finance_table', 1),
(170, '2023_07_04_131145_create_laporan_table', 1),
(171, '2023_09_29_132659_create_rekap_pengeluaran_table', 1),
(172, '2023_09_29_153524_create_pembayaran_table', 1),
(173, '2023_09_29_154316_create_rekap_pemasukan_table', 1),
(174, '2023_09_29_161340_create_detail_rekap_pemasukan_table', 1),
(175, '2023_09_29_171328_create_rekap_jenis_layanan_table', 1),
(176, '2023_10_01_163218_create_detail_rekap_pengeluaran_table', 1);

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
('IO-0001', 'ILO-0001', 'Makmur Jaya', 'Bandung', NULL, NULL),
('IO-0002', 'ILO-0002', 'Jatinangor Makmur', 'jatinangor', NULL, NULL),
('IO-0003', 'ILO-0001', 'Ayam kampus', 'bandung jauh', NULL, NULL);

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_Pembayaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_Pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `No_Rekening` bigint(20) DEFAULT NULL,
  `Pemilik_Rekening` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_Pembayaran`, `Jenis_Pembayaran`, `No_Rekening`, `Pemilik_Rekening`, `created_at`, `updated_at`) VALUES
('IPB-0001', 'Mandiri', 56789, 'Bagas', NULL, NULL),
('IPB-0002', 'BCA', 4567890, 'Bagas', NULL, NULL),
('IPB-0003', 'Cash', NULL, NULL, NULL, NULL);

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
-- Table structure for table `rekap_jenis_layanan`
--

CREATE TABLE `rekap_jenis_layanan` (
  `ID_Jenis_Layanan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Layanan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekap_jenis_layanan`
--

INSERT INTO `rekap_jenis_layanan` (`ID_Jenis_Layanan`, `Nama_Layanan`, `created_at`, `updated_at`) VALUES
('IRJL-0001', 'gofood', NULL, NULL),
('IRJL-0002', 'go send', NULL, NULL),
('IRJL-0003', 'gogo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekap_pemasukan`
--

CREATE TABLE `rekap_pemasukan` (
  `ID_Pemasukan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal_Pemasukan` date DEFAULT NULL,
  `ID_Outlet` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_Pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Total_Pemasukan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekap_pemasukan`
--

INSERT INTO `rekap_pemasukan` (`ID_Pemasukan`, `Tanggal_Pemasukan`, `ID_Outlet`, `ID_Pembayaran`, `Total_Pemasukan`, `created_at`, `updated_at`) VALUES
('IRPM-0001', '2023-10-02', 'IO-0001', 'IPB-0002', 'Rp 2.000.000', NULL, NULL),
('IRPM-0002', '2023-10-02', 'IO-0002', 'IPB-0001', 'Rp 30.000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekap_pembayaran`
--

CREATE TABLE `rekap_pembayaran` (
  `ID_Pembayaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_Pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `No_Rekening` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_pengeluaran`
--

CREATE TABLE `rekap_pengeluaran` (
  `ID_Rekap_Pengeluaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Pemasukan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Pengeluaran` date DEFAULT NULL,
  `Pengeluaran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekap_pengeluaran`
--

INSERT INTO `rekap_pengeluaran` (`ID_Rekap_Pengeluaran`, `ID_Pemasukan`, `Tanggal_Pengeluaran`, `Pengeluaran`, `created_at`, `updated_at`) VALUES
('IRPN-0001', 'IRPM-0001', '2023-10-02', '{\"1\":\"galon\",\"2\":\"10\",\"3\":\"10.000\",\"4\":\"air\",\"5\":\"20\",\"6\":\"20.000\",\"7\":null,\"8\":\"0\",\"9\":\"0\",\"10\":null,\"11\":\"0\",\"12\":\"0\",\"13\":null,\"14\":\"0\",\"15\":\"0\",\"16\":\"TOTAL PENGELUARAN\",\"17\":\"0\",\"18\":\"30.000\"}', NULL, NULL),
('IRPN-0002', 'IRPM-0002', '2023-10-02', '{\"1\":\"beras\",\"2\":\"10\",\"3\":\"10.000\",\"4\":null,\"5\":\"0\",\"6\":\"0\",\"7\":null,\"8\":\"0\",\"9\":\"0\",\"10\":null,\"11\":\"0\",\"12\":\"0\",\"13\":null,\"14\":\"0\",\"15\":\"0\",\"16\":\"TOTAL PENGELUARAN\",\"17\":\"0\",\"18\":\"10.000\"}', NULL, NULL);

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
(2, NULL, 'IF-0001', 'anggi', 'anggi123', 2, NULL, NULL),
(3, 'ILO-0001', NULL, 'sasa', 'sasa123', 3, NULL, NULL),
(4, 'ILO-0002', NULL, 'fitri', 'fitri123', 3, NULL, NULL);

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
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indexes for table `detail_rekap_pemasukan`
--
ALTER TABLE `detail_rekap_pemasukan`
  ADD PRIMARY KEY (`ID_Detail_Pemasukan`);

--
-- Indexes for table `detail_rekap_pengeluaran`
--
ALTER TABLE `detail_rekap_pengeluaran`
  ADD PRIMARY KEY (`ID_Detail_Pengeluaran`);

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
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`ID_Laporan`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_Pembayaran`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekap_jenis_layanan`
--
ALTER TABLE `rekap_jenis_layanan`
  ADD PRIMARY KEY (`ID_Jenis_Layanan`);

--
-- Indexes for table `rekap_pemasukan`
--
ALTER TABLE `rekap_pemasukan`
  ADD PRIMARY KEY (`ID_Pemasukan`);

--
-- Indexes for table `rekap_pembayaran`
--
ALTER TABLE `rekap_pembayaran`
  ADD PRIMARY KEY (`ID_Pembayaran`);

--
-- Indexes for table `rekap_pengeluaran`
--
ALTER TABLE `rekap_pengeluaran`
  ADD PRIMARY KEY (`ID_Rekap_Pengeluaran`);

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
-- AUTO_INCREMENT for table `detail_rekap_pemasukan`
--
ALTER TABLE `detail_rekap_pemasukan`
  MODIFY `ID_Detail_Pemasukan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_rekap_pengeluaran`
--
ALTER TABLE `detail_rekap_pengeluaran`
  MODIFY `ID_Detail_Pengeluaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `ID_Laporan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
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
