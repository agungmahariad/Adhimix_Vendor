-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 04:07 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adhimix_vendor_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`, `fullname`, `email`, `level`, `created_at`, `updated_at`) VALUES
(1, 'username', 'password', 'Firman Prayoga', 'prayogafirman22@gmail.com', 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `do_pengirimen`
--

CREATE TABLE `do_pengirimen` (
  `id_do_pengiriman` int(10) UNSIGNED NOT NULL,
  `id_pengiriman` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `po` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `do` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_pol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `driver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kirim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terima` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `do_pengirimen`
--

INSERT INTO `do_pengirimen` (`id_do_pengiriman`, `id_pengiriman`, `po`, `do`, `tgl`, `jam`, `no_pol`, `driver`, `produk`, `kirim`, `terima`, `created_at`, `updated_at`) VALUES
(1, '2', '99089', '8098', '17-11-2019', '19:30', 'B 9031 J', 'parjo', 'semen', '100', '30', '2018-11-20 14:04:09', '2018-11-20 14:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `kontraks`
--

CREATE TABLE `kontraks` (
  `id_kontrak` int(10) UNSIGNED NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_penawaran` int(11) NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontraks`
--

INSERT INTO `kontraks` (`id_kontrak`, `id_perusahaan`, `id_penawaran`, `pdf`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 9, '-', '', '2018-11-10 12:51:24', '2018-11-10 12:51:24'),
(3, 2, 11, '-', '', '2018-11-10 13:04:37', '2018-11-10 13:04:37'),
(4, 2, 13, '-', '', '2018-11-10 15:01:00', '2018-11-10 15:01:00'),
(5, 2, 16, '-', '', '2018-11-10 15:22:43', '2018-11-10 15:22:43'),
(6, 2, 17, '-', '', '2018-11-10 15:25:48', '2018-11-10 15:25:48'),
(7, 2, 19, '-', '', '2018-11-11 01:42:10', '2018-11-11 01:42:10'),
(8, 2, 24, '-', '', '2018-11-11 02:52:15', '2018-11-11 02:52:15'),
(9, 2, 9, 'PDF_1541921737.pdf', '1', NULL, NULL),
(10, 2, 9, 'PDF_1541921796.pdf', '1', NULL, NULL),
(11, 2, 13, 'PDF_1541921819.pdf', '1', NULL, NULL),
(12, 0, 25, '-', '', '2018-11-11 11:02:53', '2018-11-11 11:02:53'),
(13, 0, 27, '-', '', '2018-11-13 02:38:25', '2018-11-13 02:38:25'),
(14, 2, 27, 'PDF_1542076764.pdf', '1', NULL, NULL),
(15, 0, 29, '-', '', '2018-11-14 09:07:13', '2018-11-14 09:07:13'),
(16, 5, 29, 'PDF_1542186485.pdf', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_06_075917_create_perusahaans_table', 2),
(4, '2018_11_06_165122_create_produks_table', 3),
(5, '2018_11_06_212316_create_admins_table', 4),
(6, '2018_11_06_220957_create_ratings_table', 5),
(7, '2018_11_06_231141_create_penawarans_table', 5),
(8, '2018_11_07_115536_create_produk_penawarans_table', 6),
(9, '2018_11_10_192251_create_kontraks_table', 7),
(10, '2018_11_20_201553_create_pengirimen_table', 8),
(11, '2018_11_20_202118_create_do_pengirimen_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penawarans`
--

CREATE TABLE `penawarans` (
  `id_penawaran` int(10) UNSIGNED NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `judul` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `uang_muka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lama_bayar` int(11) NOT NULL,
  `ppn` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8_unicode_ci NOT NULL,
  `rated` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `penawarans`
--

INSERT INTO `penawarans` (`id_penawaran`, `id_perusahaan`, `judul`, `tgl_mulai`, `tgl_akhir`, `uang_muka`, `lama_bayar`, `ppn`, `pesan`, `rated`, `status`, `created_at`, `updated_at`) VALUES
(9, 2, 'Penawaran Baru', '2018-01-01', '2019-01-01', '10', 3, NULL, 'dear [nama_perusahaan] jlkjlkjllkjkll', 0, 3, '2018-11-09 00:29:13', '2018-11-14 09:07:13'),
(11, 2, 'Bunga Terindah didunia', '2018-11-15', '2018-11-06', '10', 4, NULL, 'Dear perusahaan [nama_perusahaan]\nkami selaku anak bangsa yang beradab dan beragama\ningin menuntut anda selaku kepala dari perusahaan [nama_perusahaan] agar tidak menjual rokok lagi karna itu berbahaya. terimakasih', 0, 3, '2018-11-09 04:08:41', '2018-11-11 02:52:15'),
(12, 2, 'Penawaran baru ku', '2010-02-02', '2011-02-02', '10', 2, NULL, 'Dear [nama_perusahaan] haloo', 0, 3, '2018-11-09 08:05:30', '2018-11-10 14:57:47'),
(13, 2, 'Permintaan barang baru', '2009-02-02', '2010-02-02', '29', 4, NULL, 'Dear [nama_perusahaan]\nsaat ini kami sedang membutuhkan barang untuk\nproyek di daerah sini.\ntolong kirim penawaran harga dari produk yang telah kami sertakan', 0, 3, '2018-11-10 15:00:07', '2018-11-10 15:01:31'),
(14, 3, 'Permintaan barang baru', '2009-02-02', '2010-02-02', '-', 0, NULL, 'Dear [nama_perusahaan]\nsaat ini kami sedang membutuhkan barang untuk\nproyek di daerah sini.\ntolong kirim penawaran harga dari produk yang telah kami sertakan', 0, 3, '2018-11-10 15:00:14', '2018-11-10 15:01:00'),
(15, 2, 'lagi dong satu lagi', '2010-02-02', '2010-02-02', '99', 3, NULL, 'ketik [nama_perusahaan]', 0, 3, '2018-11-10 15:02:35', '2018-11-10 15:03:20'),
(16, 3, 'Penawaran baru', '2010-02-20', '2011-02-02', '11', 2, NULL, 'ketik [nama_perusahaan]', 0, 3, '2018-11-10 15:22:05', '2018-11-14 09:07:13'),
(17, 2, 'Bunga Terindah didunia', '2001-02-02', '2001-02-02', '10', 3, NULL, 'ketik [nama_perusahaan]', 0, 3, '2018-11-10 15:24:06', '2018-11-11 02:52:15'),
(18, 3, 'Bunga Terindah didunia', '2001-02-02', '2001-02-02', '10', 1, NULL, 'ketik [nama_perusahaan]', 0, 3, '2018-11-10 15:24:09', '2018-11-11 02:52:15'),
(19, 2, 'judul baru', '2018-12-31', '2018-12-01', '10', 3, 'Include', 'kekek', 0, 3, '2018-11-10 15:36:41', '2018-11-11 01:45:07'),
(20, 2, 'Judul', '2019-01-01', '2019-01-01', '10', 1, 'Exclude', '-', 0, 3, '2018-11-11 02:46:40', '2018-11-11 02:51:27'),
(21, 2, 'Judul', '2019-01-01', '2019-01-01', '10', 1, 'Exclude', '-', 0, 3, '2018-11-11 02:46:49', '2018-11-11 02:51:34'),
(22, 2, 'Judul respon', '2018-01-01', '2019-01-01', '6', 2, 'Exclude', '-', 0, 3, '2018-11-11 02:48:14', '2018-11-11 02:51:41'),
(23, 2, 'Judul respon', '2018-01-01', '2019-01-01', '6', 2, 'Exclude', '-', 0, 3, '2018-11-11 02:48:22', '2018-11-11 02:51:48'),
(24, 2, 'Bunga Terindah didunia', '2018-11-11', '2018-11-12', '90', 3, 'Include', '-', 0, 3, '2018-11-11 02:50:54', '2018-11-11 02:52:42'),
(25, 2, 'Penawaran terbaru', '2010-02-02', '2012-02-02', '10', 2, 'Exclude', '-', 0, 3, '2018-11-11 11:01:21', '2018-11-13 02:34:03'),
(26, 2, 'penawaran baru', '2018-01-01', '2019-01-01', '10', 2, 'Exclude', '-', 0, 3, '2018-11-13 02:33:19', '2018-11-14 09:07:13'),
(27, 2, 'judul penawaran', '2018-12-31', '2019-01-01', '10', 4, 'Exclude', 'dear [nama_perusahaan] minta penawaran dong', 0, 3, '2018-11-13 02:37:22', '2018-11-13 02:38:38'),
(28, 3, 'judul penawaran', '2018-12-31', '2019-01-01', '-', 0, NULL, 'dear [nama_perusahaan] minta penawaran dong', 0, 3, '2018-11-13 02:37:30', '2018-11-13 02:38:25'),
(29, 5, 'penawaran baru', '2020-02-02', '2021-02-02', '10', 7, 'Exclude', 'Hallo kepala [nama_perusahaan] \nmau penawaran nih', 0, 3, '2018-11-14 09:06:13', '2018-11-14 09:07:31'),
(30, 5, 'Judul', '2018-12-31', '2019-12-31', '10', 1, 'Exclude', '-', 0, 3, '2018-11-14 09:08:45', '2018-11-14 09:09:43'),
(31, 6, 'judul penawaran', '2017-11-30', '2018-12-31', '5', 2, 'Exclude', '-', 0, 1, '2018-11-21 04:53:21', '2018-11-21 04:53:21'),
(32, 7, 'judul penawaran', '2018-11-21', '2018-11-22', '-', 0, NULL, 'hallo [nama_perusahaan]', 0, 0, '2018-11-21 08:23:26', '2018-11-21 08:23:26'),
(33, 7, 'judul', '2017-12-29', '2018-11-21', '10', 1, 'Exclude', '-', 0, 1, '2018-11-21 08:59:08', '2018-11-21 08:59:08'),
(34, 5, 'Penawaran ke insyst', '2018-12-31', '2018-12-31', '19', 2, 'Exclude', '-', 0, 1, '2018-11-27 23:47:05', '2018-11-27 23:47:46'),
(35, 5, 'Bunga Terindah didunia', '2018-12-31', '2018-12-31', '-', 0, NULL, '-', 0, 0, '2018-11-28 01:03:43', '2018-11-28 01:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `pengirimen`
--

CREATE TABLE `pengirimen` (
  `id_pengiriman` int(10) UNSIGNED NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_faktur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_faktur` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pengirimen`
--

INSERT INTO `pengirimen` (`id_pengiriman`, `id_perusahaan`, `no_invoice`, `no_faktur`, `total`, `tgl_faktur`, `created_at`, `updated_at`) VALUES
(1, 2, '03921', 'no faktur', 1000, '2018-12-31', '2018-11-20 14:03:55', '2018-11-20 14:03:55'),
(2, 2, '03921', 'no faktur', 1000, '2018-12-31', '2018-11-20 14:04:09', '2018-11-20 14:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id_perusahaan` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telp_perusahaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rek_perusahaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telp_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pict` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `provinsi`, `kota`, `email`, `telp_perusahaan`, `rek_perusahaan`, `nama_admin`, `username`, `password`, `telp_pic`, `jabatan`, `pict`, `verified`, `created_at`, `updated_at`) VALUES
(4, 'Zamasco ', 'Alamat jakarta', '', '', 'prayogafirman22@gmail.co.id', '083811212847', '321083982', 'Bagus Goblok', 'bagus', 'bagus', '085693019317', 'Jabatan', '-', 1, '2018-11-10 10:06:23', '2018-11-10 10:06:53'),
(5, 'insyst', 'alamt', '', '', 'insyst.go@email.com', '080808080808', '1020102102', 'admin insyst', 'insyst', 'password', '083811212847', 'jabatan', '-', 1, '2018-11-14 09:03:45', '2018-11-14 09:04:32'),
(6, 'tes', 'alama', '', '', 'tes@tes.com', '083811212847', '119203910', 'admin', 'tes', 'tes', '123', 'tes', '-', 1, '2018-11-21 04:42:29', '2018-11-21 04:43:09'),
(7, 'adhimix', 'alamat', '', '', 'adhimix@email.com', '08381121284', '1112123123', 'Admin adhimix', 'admin', 'password', '0838121231231', 'jabatan', '-', 1, '2018-11-21 07:57:39', '2018-11-21 08:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spesifikasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kapasitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_produk`, `id_perusahaan`, `nama_produk`, `spesifikasi`, `merk`, `kapasitas`, `harga`, `created_at`, `updated_at`) VALUES
(3, 2, 'nama produk', 'spesifikasi', 'merk', 'kapasitas', 10000, '2018-11-06 14:45:04', '2018-11-06 14:45:04'),
(4, 2, 'Produk kedua', 'spesifikasi', 'merk', 'kapasitas', 100000, '2018-11-06 15:39:55', '2018-11-06 15:39:55'),
(5, 2, 'Produk tiga', 'spek', 'merk', 'kapa', 190000, '2018-11-07 03:13:09', '2018-11-07 03:13:09'),
(6, 3, 'Produk Pertama', 'spek', 'merk', 'kapasitas', 100000, '2018-11-07 03:18:38', '2018-11-07 03:18:38'),
(7, 3, 'nama produk', 'spek', 'merk', 'kapa', 100000, '2018-11-07 03:19:05', '2018-11-07 03:19:05'),
(8, 4, 'Nama Produk Baru', 'spek', 'merk', 'kapasitas', 120000, '2018-11-10 10:07:40', '2018-11-10 10:07:40'),
(9, 5, 'Produk nya insist', 'spek', 'merk', 'kapasitas', 19000, '2018-11-14 09:05:03', '2018-11-14 09:05:03'),
(10, 6, 'nama produk', 'spesifikasi', 'merk', 'kapasitas', 100000, '2018-11-21 04:44:17', '2018-11-21 04:44:17'),
(11, 7, 'Nama Produk 1', 'spek', 'merk', 'kapasitas', 100000, '2018-11-21 08:05:15', '2018-11-21 08:05:15'),
(12, 5, 'produk ku', 'spesifikasi', 'merk', 'kapasitas', 12000, '2018-11-27 23:34:28', '2018-11-27 23:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `produk_penawarans`
--

CREATE TABLE `produk_penawarans` (
  `id_produk_penawaran` int(10) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_penawaran` int(11) NOT NULL,
  `spesifikasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kapasitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produk_penawarans`
--

INSERT INTO `produk_penawarans` (`id_produk_penawaran`, `id_produk`, `id_penawaran`, `spesifikasi`, `merk`, `kapasitas`, `harga`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'spesifikasi', 'merk', 'kapasitas', 0, '2018-11-08 15:32:46', '2018-11-08 15:32:46'),
(2, 3, 7, 'spesifikasi', 'merk', 'kapasitas', 0, '2018-11-08 16:05:43', '2018-11-08 16:05:43'),
(3, 3, 8, 'spesifikasi', 'merk', 'kapasitas', 0, '2018-11-09 00:26:59', '2018-11-09 00:26:59'),
(4, 3, 9, 'spek', 'merk', 'kapa', 1000, '2018-11-09 00:29:13', '2018-11-09 03:06:07'),
(5, 3, 10, 'spek', 'merk', 'kapa', 0, '2018-11-09 00:29:49', '2018-11-09 00:29:49'),
(6, 3, 11, 'Spesifikasi 10', 'Merk 10', '10', 10000, '2018-11-09 04:08:41', '2018-11-09 04:18:42'),
(7, 3, 12, 'spesifikasi', 'merk', 'kapasitas', 100000, '2018-11-09 08:05:30', '2018-11-10 14:03:07'),
(8, 3, 13, 'spesifikasi baru', 'merk', 'kapasitas', 90000, '2018-11-10 15:00:08', '2018-11-10 15:00:47'),
(9, 3, 14, 'spesifikasi baru', 'merk', 'kapasitas', 0, '2018-11-10 15:00:14', '2018-11-10 15:00:14'),
(10, 3, 15, 'spek', 'merk', 'kapa', 9999999, '2018-11-10 15:02:36', '2018-11-10 15:02:48'),
(11, 3, 16, 'spesifikasi', 'merk', 'kapasitas', 10000, '2018-11-10 15:22:05', '2018-11-10 15:22:18'),
(12, 3, 17, 'spek', 'mek', 'kapa', 1000, '2018-11-10 15:24:06', '2018-11-10 15:25:19'),
(13, 3, 18, 'spek', 'mek', 'kapa', 37000, '2018-11-10 15:24:09', '2018-11-10 15:24:56'),
(14, 3, 19, 'spesifikasi', 'merk', 'kapasitas', 10000, '2018-11-10 15:36:41', '2018-11-10 15:40:50'),
(15, 4, 21, 'spek', 'merk', 'kapa', 0, '2018-11-11 02:46:49', '2018-11-11 02:46:49'),
(16, 3, 21, 'spek', 'merk', 'kapa', 0, '2018-11-11 02:46:49', '2018-11-11 02:46:49'),
(17, 3, 23, 'spek', 'merk', 'kapa', 0, '2018-11-11 02:48:22', '2018-11-11 02:48:22'),
(18, 4, 23, 'spek', 'merk', 'kapasitas', 0, '2018-11-11 02:48:22', '2018-11-11 02:48:22'),
(19, 3, 24, 'spek', 'merk', 'kapa', 1000, '2018-11-11 02:50:54', '2018-11-11 02:50:54'),
(20, 4, 24, 'spek', 'merk', 'kapa', 120000, '2018-11-11 02:50:54', '2018-11-11 02:50:54'),
(21, 3, 25, 'spek', 'mek', 'kap', 12000, '2018-11-11 11:01:26', '2018-11-11 11:01:26'),
(22, 4, 25, 'spek', 'merk', 'kap', 33000, '2018-11-11 11:01:28', '2018-11-11 11:01:28'),
(23, 3, 26, 'sepk', 'merk', 'kapa', 10000, '2018-11-13 02:33:19', '2018-11-13 02:33:19'),
(24, 3, 27, 'spek', 'merk', 'kapasitas', 10000, '2018-11-13 02:37:22', '2018-11-13 02:37:51'),
(25, 3, 28, 'spek', 'merk', 'kapasitas', 0, '2018-11-13 02:37:30', '2018-11-13 02:37:30'),
(26, 3, 29, 'spek', 'merk', 'kapasitas', 19000, '2018-11-14 09:06:14', '2018-11-14 09:06:43'),
(27, 9, 30, 'spek', 'merk', 'kapa', 12000, '2018-11-14 09:08:45', '2018-11-14 09:08:45'),
(28, 10, 31, 'spek', 'merk', 'kapa', 100000, '2018-11-21 04:53:22', '2018-11-21 04:53:22'),
(29, 3, 32, 'spek', 'merk', 'kapasitas', 0, '2018-11-21 08:23:26', '2018-11-21 08:23:26'),
(30, 11, 33, '10', '10', '10', 10, '2018-11-21 08:59:08', '2018-11-21 08:59:08'),
(31, 9, 34, 'spek', 'merk', 'kapasitas', 19, '2018-11-27 23:47:05', '2018-11-27 23:47:46'),
(32, 12, 34, 'spesifikasi', 'merk', 'kapasitas', 19, '2018-11-27 23:47:05', '2018-11-27 23:47:46'),
(33, 9, 35, 'spek', 'merk', 'kapasitas', 0, '2018-11-28 01:03:43', '2018-11-28 01:03:43'),
(34, 12, 35, 'spesifikasi', 'merk', 'kapasitas', 0, '2018-11-28 01:03:43', '2018-11-28 01:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_penawaran` int(11) NOT NULL,
  `rater` int(11) NOT NULL,
  `bintang` int(11) NOT NULL,
  `pesan` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `id_perusahaan`, `id_penawaran`, `rater`, `bintang`, `pesan`, `created_at`, `updated_at`) VALUES
(5, 2, 9, 1, 5, 'Bintang nya tuh dikasih lima sama saya', '2018-11-10 14:17:30', '2018-11-10 14:17:30'),
(6, 2, 11, 1, 4, 'keren sih.. tapi masih ada yang kurang', '2018-11-10 14:17:45', '2018-11-10 14:17:45'),
(18, 2, 13, 1, 5, 'keren nih perushaaan, udah cepet harga nya murah lagi..\r\nbarang nya juga oke oke', '2018-11-10 15:01:31', '2018-11-10 15:01:31'),
(19, 3, 16, 1, 5, 'dikasih 5', '2018-11-10 15:22:53', '2018-11-10 15:22:53'),
(20, 2, 17, 1, 5, 'komentarnya disini', '2018-11-10 15:26:16', '2018-11-10 15:26:16'),
(21, 2, 19, 1, 1, 'weak', '2018-11-11 01:45:07', '2018-11-11 01:45:07'),
(22, 2, 24, 1, 4, 'komentarku ada disii', '2018-11-11 02:52:42', '2018-11-11 02:52:42'),
(23, 2, 25, 1, 5, 'Perusahaan bagus sekali', '2018-11-13 02:34:07', '2018-11-13 02:34:07'),
(24, 2, 27, 1, 5, 'perusahaan bagus', '2018-11-13 02:38:38', '2018-11-13 02:38:38'),
(25, 5, 29, 1, 5, 'saya kasih sampe lima', '2018-11-14 09:07:31', '2018-11-14 09:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `do_pengirimen`
--
ALTER TABLE `do_pengirimen`
  ADD PRIMARY KEY (`id_do_pengiriman`);

--
-- Indexes for table `kontraks`
--
ALTER TABLE `kontraks`
  ADD PRIMARY KEY (`id_kontrak`);

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
-- Indexes for table `penawarans`
--
ALTER TABLE `penawarans`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indexes for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_penawarans`
--
ALTER TABLE `produk_penawarans`
  ADD PRIMARY KEY (`id_produk_penawaran`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `do_pengirimen`
--
ALTER TABLE `do_pengirimen`
  MODIFY `id_do_pengiriman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontraks`
--
ALTER TABLE `kontraks`
  MODIFY `id_kontrak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penawarans`
--
ALTER TABLE `penawarans`
  MODIFY `id_penawaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengirimen`
--
ALTER TABLE `pengirimen`
  MODIFY `id_pengiriman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id_perusahaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk_penawarans`
--
ALTER TABLE `produk_penawarans`
  MODIFY `id_produk_penawaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
