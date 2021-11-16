-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 11:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Salman', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `permasalahan` varchar(255) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `tpc` int(2) NOT NULL,
  `jam_permintaan` time NOT NULL,
  `status` varchar(25) NOT NULL,
  `cara_penyelsaian` text NOT NULL,
  `waktu_pengerjaan` time NOT NULL,
  `tanggapan` varchar(255) DEFAULT NULL,
  `teknisi` varchar(100) NOT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_permintaan`, `id_user`, `nama`, `bagian`, `permasalahan`, `tanggal_permintaan`, `tpc`, `jam_permintaan`, `status`, `cara_penyelsaian`, `waktu_pengerjaan`, `tanggapan`, `teknisi`, `rating`) VALUES
(1, 1, 2, 'SALMAN USER', 'Operasional Kelapa Sawit & Karet', 'samlekom koneksinya terdisable', '2020-09-14', 9, '02:03:07', 'Complete', 'dengan menyalakan kembali wifi', '02:04:07', '41', 'salman', 5),
(2, 2, 2, 'SALMAN USER', 'Satuan Pengawasan Internal', 'ppp', '2020-08-14', 8, '08:53:07', 'Complete', 'uuu', '08:54:49', 'pppp', 'imam', 3),
(3, 3, 3, 'SALMAN ADMIN', 'Perencanaan Strategis & Optimalisasi Aset', 'test', '2020-09-14', 9, '14:40:41', 'Complete', 'qq', '14:41:06', 'bb', 'yy', 3),
(4, 4, 2, 'SALMAN USER', 'Sekertariat Perusahaan', 'koneksi lambat', '2020-09-15', 9, '15:45:36', 'Complete', 'restart pc', '15:46:12', 'mantap', 'imam', 5),
(5, 5, 6, 'SALMAN User', 'Satuan Pengawasan Internal', 'monitor mati', '2020-09-16', 9, '15:34:25', 'Complete', 'dibongkar', '15:35:58', 'mantap', 'imam', 5),
(6, 6, 7, 'SALMAN FAISHAL', 'Operasional Kelapa Sawit & Karet', '34t22', '2020-09-19', 9, '21:31:42', 'Complete', '1', '21:31:56', NULL, 'sa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `permasalahan` text NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `jam_permintaan` time NOT NULL,
  `status` varchar(25) NOT NULL,
  `status_review` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `id_user`, `nama`, `bagian`, `permasalahan`, `tanggal_permintaan`, `jam_permintaan`, `status`, `status_review`) VALUES
(1, 2, 'SALMAN USER', 'Operasional Kelapa Sawit & Karet', 'samlekom koneksinya terdisable', '2020-09-14', '02:03:07', 'Complete', 1),
(2, 2, 'SALMAN USER', 'Satuan Pengawasan Internal', 'ppp', '2020-09-14', '08:53:07', 'Complete', 1),
(3, 3, 'SALMAN ADMIN', 'Perencanaan Strategis & Optimalisasi Aset', 'test', '2020-09-14', '14:40:41', 'Complete', 1),
(4, 2, 'SALMAN USER', 'Sekertariat Perusahaan', 'koneksi lambat', '2020-09-15', '15:45:36', 'Complete', 1),
(5, 6, 'SALMAN User', 'Satuan Pengawasan Internal', 'monitor mati', '2020-09-16', '15:34:25', 'Complete', 1),
(6, 7, 'SALMAN FAISHAL', 'Operasional Kelapa Sawit & Karet', '34t22', '2020-09-19', '21:31:42', 'Complete', 0),
(7, 8, 'salman user', 'Sekertariat Perusahaan', 'jaringan lemot', '2020-09-25', '09:54:02', 'Pending', 0),
(8, 8, 'salman user', 'Sumber Daya Manusia', 'printer tidak jalan', '2020-09-25', '09:54:23', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'satu', 'SALMAN User', 'salmanfaishal99@gmail.com', 'default.jpg', '$2y$10$sUNyE6pVpwWPHFoC913mMuTRKg0bYXE8ItgXeZ1sTS2sG3/qqpj8m', 2, 1, 1600238814),
(7, '', 'SALMAN FAISHAL', 'salmanfaishal27@gmail.com', 'default.jpg', '$2y$10$CyOk.DrWpmhHS8GgvD7.eOakv7cY3ZZIV1d2e5Xe5OQ7TRnF8wI3W', 1, 1, 1600245298),
(8, NULL, 'salman user', 'salman@gmail.com', 'default.jpg', '$2y$10$SZj5gFvgggdpHiNvN3O9RODcQh9WaZGoFe8abGiDi5p/KQ2PwL0iG', 2, 1, 1601002402);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(7, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Form Pelayanan', 'user', 'fab fa-fw fa-wpforms', 1),
(3, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(4, 2, 'Form Pelayanan', 'user', 'fab fa-fw fa-wpforms', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
