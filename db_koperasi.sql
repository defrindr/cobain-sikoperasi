-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 11:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(65) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `no_hp`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Fachru Wildan Afdinal', 'Jl. Awaidijwjaiow No. 12 ,Ponorogo , jawa Timur , indonesia', '085604845437', 'fachruwildan@gmail.com', '2020-03-17 20:52:50', '2020-03-23 05:45:06'),
(2, 'Defri Indra Mahardika', 'Pulung', '089786565432', 'defri@gmail.com', '2020-03-17 20:52:50', '2020-03-17 20:52:50'),
(3, 'Fachru Wildan', 'Sarpon Kota', '08987656543213', 'fachruwildan@gmail.com', '2020-03-17 20:52:50', '2020-03-17 20:52:50'),
(4, 'Blitar EDU', 'asdf', '085604845437', 'asd@gmail.com', '2020-03-20 06:09:30', '2020-03-20 06:09:30'),
(6, 'as', 'as', '123', 'defriindr@gmail.com', '2020-03-20 06:10:06', '2020-03-20 06:10:06'),
(7, 'Defri Indra Mahardika', '123654', '085604845437', 'admin@rental.com', '2020-03-23 05:45:28', '2020-03-23 05:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `jml_angsur` varchar(45) DEFAULT NULL,
  `denda` bigint(20) NOT NULL DEFAULT '0',
  `total_bayar` int(11) NOT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `status` enum('dibayar','belum dibayar') NOT NULL DEFAULT 'belum dibayar',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `peminjaman_id`, `jatuh_tempo`, `jml_angsur`, `denda`, `total_bayar`, `tanggal_bayar`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '2020-03-12', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(2, 3, '2020-05-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(3, 3, '2020-06-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(4, 3, '2020-07-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(5, 3, '2020-08-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(6, 3, '2020-09-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(7, 3, '2020-10-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(8, 3, '2020-11-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(9, 3, '2020-12-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(10, 3, '2021-01-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(11, 3, '2021-02-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(12, 3, '2021-03-21', '0', 0, 0, NULL, 'dibayar', '2020-03-21 13:23:35', '2020-03-21 13:23:35'),
(13, 4, '2020-04-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(14, 4, '2020-05-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(15, 4, '2020-06-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(16, 4, '2020-07-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(17, 4, '2020-08-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(18, 4, '2020-09-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(19, 4, '2020-10-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(20, 4, '2020-11-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(21, 4, '2020-12-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(22, 4, '2021-01-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(23, 4, '2021-02-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26'),
(24, 4, '2021-03-22', '0', 0, 0, NULL, 'belum dibayar', '2020-03-22 07:24:26', '2020-03-22 07:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `app_name` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `icon` text COLLATE utf16_unicode_ci NOT NULL,
  `denda_perhari` decimal(10,2) NOT NULL,
  `saldo_awal_minimal` bigint(20) NOT NULL,
  `copyright` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `app_name`, `icon`, `denda_perhari`, `saldo_awal_minimal`, `copyright`) VALUES
(1, 'KSP STMJ', 'favicon.ico', '0.01', 50000, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `login_background`
--

CREATE TABLE `login_background` (
  `id` int(11) NOT NULL,
  `background_url` varchar(250) COLLATE utf16_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `login_background`
--

INSERT INTO `login_background` (`id`, `background_url`, `created_at`, `updated_at`) VALUES
(1, '/uploaded/login/login_base.jpg', '2020-03-22 10:23:16', '2020-03-22 10:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `anggota_id` int(10) NOT NULL,
  `bunga` int(11) DEFAULT NULL,
  `lama_angsur` int(11) NOT NULL,
  `pinjaman_awal` bigint(50) NOT NULL,
  `angsur_perbulan` bigint(50) DEFAULT NULL,
  `total_pinjaman` bigint(20) NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL DEFAULT 'belum lunas',
  `tanggal_pinjam` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `anggota_id`, `bunga`, `lama_angsur`, `pinjaman_awal`, `angsur_perbulan`, `total_pinjaman`, `status`, `tanggal_pinjam`, `created_at`, `updated_at`) VALUES
(2, 4, 10, 12, 12000, 1100, 13200, 'belum lunas', '2020-03-21', '2020-03-21 09:49:18', '2020-03-21 09:49:18'),
(3, 6, 5, 12, 1000000, 87500, 1050000, 'belum lunas', '2020-03-22', '2020-03-21 13:23:35', '2020-03-22 07:14:56'),
(4, 2, 5, 12, 120000, 10500, 126000, 'belum lunas', '2020-03-23', '2020-03-22 07:24:26', '2020-03-23 06:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_tabungan`
--

CREATE TABLE `riwayat_tabungan` (
  `id` int(11) NOT NULL,
  `tabungan_id` int(11) NOT NULL,
  `action` enum('simpan','ambil') NOT NULL,
  `value` bigint(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_tabungan`
--

INSERT INTO `riwayat_tabungan` (`id`, `tabungan_id`, `action`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 9, 'simpan', 120000, 1, '2020-03-23 05:26:34', '2020-03-23 05:26:34'),
(4, 1, 'simpan', 120000, 1, '2020-03-23 07:05:08', '2020-03-23 07:05:08'),
(5, 1, 'ambil', 50000, 1, '2020-03-23 07:06:00', '2020-03-23 07:06:00'),
(6, 1, 'ambil', 52000, 1, '2020-03-23 07:07:31', '2020-03-23 07:07:31'),
(7, 1, 'simpan', 82000, 1, '2020-03-23 07:09:23', '2020-03-23 07:09:23'),
(8, 1, 'ambil', 100000, 1, '2020-03-23 07:09:35', '2020-03-23 07:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `no_rekening` varchar(45) NOT NULL,
  `saldo` bigint(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id`, `anggota_id`, `no_rekening`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 6, '123876771237128881', 50000, '0000-00-00 00:00:00', '2020-03-23 07:09:35'),
(9, 3, '8470344764212183', 120000, '2020-03-23 05:26:34', '2020-03-23 05:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` enum('operator','administrator') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `nama`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$6G3PAMMNyIuGEyJ6DSRwQek/GRpV0hmrZxWJtF4mpxj/zJN7qHAcS', 'adminkece', 'administrator', '0000-00-00 00:00:00', '2020-03-24 02:40:51'),
(2, 'operator', '$2y$10$8iiZNmt262ABAhcpgQMvD.fkBmG0WtNxDiQ7ZTg2HfsOQj9zMHBJi', 'operator', 'operator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'test', '$2y$10$8iiZNmt262ABAhcpgQMvD.fkBmG0WtNxDiQ7ZTg2HfsOQj9zMHBJi', 'tesss', 'operator', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_angsuran_peminjaman1_idx` (`peminjaman_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_background`
--
ALTER TABLE `login_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peminjaman_anggota1_idx` (`anggota_id`);

--
-- Indexes for table `riwayat_tabungan`
--
ALTER TABLE `riwayat_tabungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_tabungan.tabungan.id` (`tabungan_id`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabungan_user_id` (`anggota_id`) USING BTREE;

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_background`
--
ALTER TABLE `login_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_tabungan`
--
ALTER TABLE `riwayat_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `fk_angsuran_peminjaman1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_anggota1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `riwayat_tabungan`
--
ALTER TABLE `riwayat_tabungan`
  ADD CONSTRAINT `riwayat_tabungan.tabungan.id` FOREIGN KEY (`tabungan_id`) REFERENCES `tabungan` (`id`);

--
-- Constraints for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_user_id` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
