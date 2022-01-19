-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 03:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jns_kendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jns_kendaraan`, `jenis_kendaraan`, `harga`) VALUES
(6, 'Motor', 2000),
(7, 'Mobil', 5000),
(9, 'Truk', 70000),
(15, 'Becak', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_keluar`
--

CREATE TABLE `kendaraan_keluar` (
  `id_transaksi` int(11) NOT NULL,
  `id_parkir` int(11) DEFAULT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `lama_parkir` int(11) DEFAULT NULL,
  `biaya_parkir` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan_keluar`
--

INSERT INTO `kendaraan_keluar` (`id_transaksi`, `id_parkir`, `waktu_keluar`, `lama_parkir`, `biaya_parkir`) VALUES
(10, 16, '2022-01-04 20:57:53', 0, 45000),
(11, 18, '2022-01-03 21:45:33', 0, 70000),
(12, 21, '2022-01-02 21:45:39', 0, 20000),
(13, 20, '2022-01-01 21:46:00', 0, 59000),
(15, 20, '2022-01-05 21:46:00', 10, 170000),
(16, 25, '2022-01-07 20:42:16', 61, 227000),
(17, 27, '2022-01-15 10:21:34', 0, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_masuk`
--

CREATE TABLE `kendaraan_masuk` (
  `id_parkir` int(11) NOT NULL,
  `plat_no` varchar(20) DEFAULT NULL,
  `waktu_masuk` datetime DEFAULT NULL,
  `jenis_kendaraan` int(11) DEFAULT NULL,
  `status_parkir` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan_masuk`
--

INSERT INTO `kendaraan_masuk` (`id_parkir`, `plat_no`, `waktu_masuk`, `jenis_kendaraan`, `status_parkir`) VALUES
(16, 'AE1223', '2022-01-04 20:57:45', 7, '0'),
(17, 'AE4455', '2022-01-04 20:58:21', 7, '1'),
(18, 'AE 445', '2022-01-04 21:42:45', 9, '0'),
(20, 'AE 898', '2022-01-04 21:43:00', 7, '0'),
(21, 'AE 5566', '2022-01-04 21:43:49', 6, '0'),
(24, 'AR 223', '2022-01-05 07:32:04', 6, '1'),
(25, 'AR 677', '2022-01-05 07:32:16', 9, '0'),
(26, 'AE 224', '2022-01-05 07:40:28', 7, '1'),
(27, 'AE 123777', '2022-01-15 10:21:14', 7, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id_user`, `user_name`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jns_kendaraan`);

--
-- Indexes for table `kendaraan_keluar`
--
ALTER TABLE `kendaraan_keluar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `kendaraan_masuk`
--
ALTER TABLE `kendaraan_masuk`
  ADD PRIMARY KEY (`id_parkir`),
  ADD KEY `kendaraan_masuk_ibfk_1` (`jenis_kendaraan`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jns_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kendaraan_keluar`
--
ALTER TABLE `kendaraan_keluar`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kendaraan_masuk`
--
ALTER TABLE `kendaraan_masuk`
  MODIFY `id_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
