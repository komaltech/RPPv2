-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2015 at 12:11 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usul_rpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_panitia`
--

CREATE TABLE IF NOT EXISTS `anggota_panitia` (
  `id` int(10) unsigned NOT NULL,
  `id_pnt` int(10) unsigned DEFAULT NULL,
  `nip` decimal(18,0) NOT NULL,
  `agp_jabatan` char(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_panitia`
--

INSERT INTO `anggota_panitia` (`id`, `id_pnt`, `nip`, `agp_jabatan`, `created_at`, `updated_at`) VALUES
(6, 6, '123456789123456789', 'K', '2015-10-15 19:52:02', '2015-10-15 12:52:02'),
(7, 6, '987654321987654321', 'A', '2015-10-15 20:00:44', '2015-10-15 13:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_cat` int(11) NOT NULL,
  `cat_nama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_cat`, `cat_nama`, `created_at`, `updated_at`) VALUES
(1, 'Pengadaan Barang', '2014-11-14 03:55:34', '2014-11-14 03:55:38'),
(2, 'Jasa Konsultasi Badan Usaha', '2014-11-14 03:56:17', '2014-11-14 03:56:20'),
(3, 'Jasa Konsultasi Perorangan', '2014-11-14 03:56:39', '2014-11-14 03:56:42'),
(4, 'Pekerjaan Konstruksi', '2014-11-14 03:56:58', '2014-11-14 03:57:00'),
(5, 'Jasa & Lainnya', '2014-11-14 11:32:10', '2014-11-14 19:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_10_03_132916_create_user_table', 1),
('2015_10_15_174111_create_pegawai_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id` int(10) unsigned NOT NULL,
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nama_paket` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sumber_dana` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pagu` int(11) NOT NULL,
  `thn_anggaran` int(4) DEFAULT NULL,
  `kode_rek` int(50) NOT NULL,
  `kode_rup` int(20) NOT NULL,
  `jenis_bayar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT NULL,
  `aksi` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `user_id`, `id_cat`, `nama_paket`, `sumber_dana`, `pagu`, `thn_anggaran`, `kode_rek`, `kode_rup`, `jenis_bayar`, `status`, `aksi`, `created_at`, `updated_at`) VALUES
(1, '23412341234123', 1, 'makan minum', 'APBN', 234234, 2014, 0, 0, '', 0, 0, '0000-00-00 00:00:00', '2014-12-15 06:03:15'),
(2, '23412341234123', 5, '027/009/424.022/2014', 'APBD', 150000000, 2014, 0, 0, '', 0, 0, '0000-00-00 00:00:00', '2014-12-15 04:47:50'),
(3, '23412341234123', 1, '027/005/ 424.031/ 2014', 'APBD', 104870000, 2014, 0, 0, '', 0, 0, '0000-00-00 00:00:00', '2014-12-17 12:50:32'),
(4, '23412341234123', 1, '027/005/ 424.031/ 2014', 'APBD', 135000000, 2014, 0, 0, '', 0, 0, '0000-00-00 00:00:00', '2014-12-17 07:07:13'),
(5, '23412341234123', 1, '027/005/ 424.031/ 2014', 'APBD', 50000000, 2014, 0, 0, '', 0, 1, '0000-00-00 00:00:00', '2014-12-17 00:37:34'),
(6, '23412341234123', 5, '027/038/424.031/2014', 'APBD', 150000000, 2014, 0, 0, '', 0, 1, '0000-00-00 00:00:00', '2014-12-17 05:31:23'),
(7, '23412341234123', 1, '0001', 'APBD', 1000000, 2014, 0, 0, '', 0, 0, '0000-00-00 00:00:00', '2014-12-18 02:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `id_pnt` int(4) unsigned NOT NULL,
  `id_satker` int(5) NOT NULL,
  `nama_pnt` varchar(200) NOT NULL,
  `tahun_pnt` int(4) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_pnt`, `id_satker`, `nama_pnt`, `tahun_pnt`, `created_at`, `updated_at`) VALUES
(1, 4, 'Kelompok Kerja Barang', NULL, '2015-10-11 10:38:38', '2015-10-11 03:38:38'),
(2, 2, 'Kelompok Kerja Jasa Lainnya', NULL, '2015-10-11 20:59:18', '2015-10-11 13:59:18'),
(5, 1, 'kelompok macan', NULL, '2015-10-11 21:10:36', '2015-10-11 14:10:36'),
(6, 1, 'sukakerja', NULL, '2015-10-12 10:41:30', '2015-10-12 03:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` decimal(18,0) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `id_satker` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `golongan` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `alamat`, `phone`, `mobile_phone`, `id_satker`, `jabatan`, `golongan`, `level`, `email`, `foto`, `created_at`, `updated_at`) VALUES
('98798767663643', 'Luluk', 'pasuruan', '0343431788', '0812345678', '4', 'Staf', 'III/a', '1', 'luluk@gmail.com', NULL, '2015-10-15 11:53:01', '2015-10-15 11:53:01'),
('123456789123456789', 'Anang Yedi Pratama', 'Beji', '0343431788', '0812345678', '1', 'Staf', 'III/c', '4', 'anang@yahoo.com', NULL, '2015-10-15 11:48:00', '2015-10-15 11:48:00'),
('192837465546372819', 'Ratna Widiawati', 'prigen', '0343431788', '0812345678', '3', 'Staf', 'III/b', '2', 'ratna@yahoo.com', NULL, '2015-10-15 11:51:59', '2015-10-15 11:51:59'),
('197712122008011011', 'GUNTUR SETIYO BUDI', 'Perum Graha Purwosari Regency Blok D7', '082140024534', '082140024534', '1', 'Staf', 'II/b', '0', 'guntur_ay@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('987654321987654321', 'Wawan Wibandoko', 'pasuruan', '0343431788', '0812345678', '2', 'Staf', 'II/b', '4', 'wawan@gmail.com', NULL, '2015-10-15 11:49:16', '2015-10-15 11:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE IF NOT EXISTS `satker` (
  `id_satker` int(11) NOT NULL,
  `nama_satker` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id_satker`, `nama_satker`, `created_at`, `updated_at`) VALUES
(1, 'Keuangan', '2014-11-14 08:00:00', '2014-11-14 08:00:00'),
(2, 'Pendidikan & Kebudayaan', '2014-11-14 08:00:00', '2014-11-14 08:00:00'),
(3, 'Sekretariat daerah', '2014-12-16 07:51:04', '2014-12-16 07:51:04'),
(4, 'Bagian Keuangan dan Perlengkapan Sekretariat Daerah', '2014-12-16 08:01:04', '2014-12-16 08:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id_setting` int(11) NOT NULL,
  `protokol` varchar(10) DEFAULT NULL,
  `email_sender` varchar(100) DEFAULT NULL,
  `port` varchar(5) DEFAULT NULL,
  `host` varchar(20) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `pass_email` varchar(50) DEFAULT NULL,
  `enkripsi` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id_setting`, `protokol`, `email_sender`, `port`, `host`, `user_email`, `pass_email`, `enkripsi`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'gunsgen@gmail.com', '465', 'smtp.gmail.com', 'gunsgen', 'muhammadiyah', 'ssl', '2014-11-20 03:18:33', '2014-12-16 02:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `user_id` decimal(18,0) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `level_user` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `username`, `password`, `level_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '197712122008011011', 'admin', '$2y$10$JyqVeyWaJlNZxWaHr4Vsre54FcvGIAUrkb.8fXYUaL9MYgF/qJNHS', '0', '8EFN6v5oZSKLTWiXbG4PFzQcQXzeIetsRg5agEn8irDhfQ7OE2PyF6xHj684', '2014-11-20 06:45:53', '2014-11-20 06:45:53'),
(2, '123456789123456789', 'anang', '$2y$10$JihuWb/.BBUqdDawPGg2ReQOHLpNTWDIng6bcgR15Lvtg/RoFfWQu', '4', 'O5QvTZUXtDok9FIzqEzXh1AIqaVU35D9QU34ZYF9DcgizKGrAJJR3LdyRtFX', '2015-10-15 11:48:01', '2015-10-15 13:33:28'),
(3, '987654321987654321', 'wawan', '$2y$10$lR5Y/vhQmlYAkC7Tfdd55uujhlB164qc6devyM1rvCWNJv9laaM1G', '4', '', '2015-10-15 11:49:16', '2015-10-15 11:49:16'),
(4, '192837465546372819', 'ratna', '$2y$10$6FcNMgzaD0Jeq0lJvVmetOaavTTVvFZrjLxX/oo6enOLWuuguMgfi', '2', '', '2015-10-15 11:51:59', '2015-10-15 11:51:59'),
(5, '98798767663643', 'luluk', '$2y$10$MuG9AVvXkvX4tRlqk21rHeVR3QofJzz9Nnfv5QbAGuKI8h2Ecio7O', '1', '', '2015-10-15 11:53:01', '2015-10-15 11:53:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_panitia`
--
ALTER TABLE `anggota_panitia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anggota_panitia_panitia` (`id_pnt`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id_pnt`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_panitia`
--
ALTER TABLE `anggota_panitia`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id_pnt` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
