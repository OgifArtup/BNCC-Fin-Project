-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 04:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bncc_fin_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `harga`, `jumlah`, `foto`, `id_kategori`, `created_at`, `updated_at`) VALUES
(16, 'The Three-Body Problem', 190000, 54, '6447dbb0cfa3e.jpg', 11, '2023-04-25 06:54:57', '2023-04-25 06:54:57'),
(17, 'Nineteen Eighty Four', 150000, 14, '6447dc09c5e80.jpg', 11, '2023-04-25 06:56:25', '2023-04-25 06:56:25'),
(18, 'Hyperion', 120000, 3, '6447dc58389fa.jpg', 11, '2023-04-25 06:57:44', '2023-04-25 06:57:44'),
(19, 'KKN Di Desa Penari', 135000, 21, '6447dc96b312f.jpg', 9, '2023-04-25 06:58:46', '2023-04-25 06:58:46'),
(20, 'Dracula', 200000, 62, '6447dcd3362b1.png', 9, '2023-04-25 06:59:47', '2023-04-25 06:59:47'),
(21, 'Frankenstein', 250000, 15, '6447dd1321294.png', 9, '2023-04-25 07:00:51', '2023-04-25 07:00:51'),
(22, 'The Hobbit', 500000, 34, '6447dd55e1ef0.png', 10, '2023-04-25 07:01:57', '2023-04-25 07:01:57'),
(23, 'The Wonderful Wizard of Oz', 145000, 20, '6447dd9a5e773.png', 10, '2023-04-25 07:03:06', '2023-04-25 07:03:06'),
(24, 'Declaration of Independence', 1320000, 1, '6447ddf6ea676.jpg', 10, '2023-04-25 07:04:38', '2023-04-25 07:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(9, 'Horror', '2023-04-25 06:53:36', '2023-04-25 06:53:36'),
(10, 'Fantasy', '2023-04-25 06:53:39', '2023-04-25 06:53:39'),
(11, 'Sci-fi', '2023-04-25 06:53:45', '2023-04-25 06:53:45');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_31_052110_[create_barangs_table]', 2),
(6, '2023_03_31_054913_create_users_table', 3),
(7, '2023_04_02_044657_create_barangs_table', 4),
(8, '2023_04_02_045607_create_barangs_table', 5),
(9, '2023_04_02_062120_create_posts_table', 6),
(10, '2023_04_02_062615_create_barangs_table', 7),
(11, '2023_04_05_054407_create_kategori_table', 7),
(12, '2023_04_05_060400_create_kategoris_table', 8),
(13, '2023_04_05_060848_create_barangs_table', 9),
(23, '2023_04_05_063933_create_kategoris_table', 10),
(24, '2023_04_05_063942_create_barangs_table', 10),
(25, '2023_04_05_063944_create_barangs_table', 10),
(26, '2023_04_05_102744_create_pembelis_table', 11),
(27, '2023_04_05_103433_create_barangs_table', 11),
(28, '2014_10_12_100000_create_password_resets_table', 12),
(29, '2023_04_20_055751_create_admins_table', 13),
(32, '2023_04_23_112149_create_carts_table', 14),
(33, '2023_04_23_112355_create_carts_table', 14),
(42, '2023_04_24_103314_create_transactions_table', 15),
(43, '2023_04_24_104023_create_transactions_table', 15),
(44, '2023_04_24_104222_create_tdetails_table', 15),
(45, '2023_04_24_104620_create_tdetails_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `tdetails`
--

CREATE TABLE `tdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaction` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tdetails`
--

INSERT INTO `tdetails` (`id`, `id_transaction`, `nama`, `kategori`, `jumlah`, `harga`) VALUES
(24, 22, 'Mouse Logitech', 'Electronics', 3, 100000),
(25, 22, 'Headphone Arctic Pro Wireless', 'Electronics', 1, 1000000),
(26, 22, 'Keyboard', 'Electronics', 1, 57000),
(27, 22, 'Iphone 14 Pro Max', 'Electronics', 1, 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `nomor_invoice` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_user`, `alamat`, `kode_pos`, `nomor_invoice`, `total`, `created_at`, `updated_at`) VALUES
(22, 3, 'Somewhere over the rainbow', '12345', 'INV-000000', 9357000, '2023-04-25 06:16:29', '2023-04-25 06:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(6) DEFAULT NULL,
  `id_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `nomor`, `remember_token`, `created_at`, `updated_at`, `roles`, `id_admin`) VALUES
(3, 'Maximillius Johanness Surasep', 'maxim@gmail.com', NULL, '$2y$10$u1OVMoTDSBhh8lOp7xrpOuqmi/4ECgexGwo5lztmualRZpDeg6oFK', '088812345678', NULL, '2023-04-19 09:42:13', '2023-04-19 09:42:13', 'user', NULL),
(10, 'nikolas', 'nikolas@gmail.com', NULL, '$2y$10$rn.EBDrlhTsT9wxMqKd34Oz4hTjfF0NCSDC8rvBd7D3QBcY1IQsPi', '081233445566', NULL, '2023-04-20 08:41:08', '2023-04-20 08:41:08', 'user', NULL),
(11, 'admin1', 'admin1@gmail.com', NULL, '$2y$10$dxSetM11DQItyZbSEQ03suZMZiKitbjDWpv5xuuodatWsFSbKaidi', '081233334444', NULL, '2023-04-20 08:42:00', '2023-04-20 08:42:00', 'admin', 'admin001'),
(12, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$zyF5FoE5QNvGReFQ0zuCg.pNdRPqbKrbW/.lACPyWV50yquicnvv6', '081233334444', NULL, '2023-04-20 08:42:00', '2023-04-20 08:42:00', 'admin', 'admin002'),
(13, 'admin3', 'admin3@gmail.com', NULL, '$2y$10$QckFU2pD1/teRfx1QO6aZesP6FNpHNy2Ip.Zz77EZVgkgPz9Gcpgq', '081233334444', NULL, '2023-04-20 08:42:00', '2023-04-20 08:42:00', 'admin', 'admin003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `tdetails`
--
ALTER TABLE `tdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tdetails`
--
ALTER TABLE `tdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tdetails`
--
ALTER TABLE `tdetails`
  ADD CONSTRAINT `tdetails_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
