-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 09:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2eris`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_customer`
--

INSERT INTO `data_customer` (`id_customer`, `nama`, `jenis_kelamin`, `alamat`, `id_user`) VALUES
(1, 'asdf', 'Laki-laki', 'jl subang kabup', 11),
(2, 'aku', 'Laki-laki', 'kp kdung gede', 11);

-- --------------------------------------------------------

--
-- Table structure for table `data_merk`
--

CREATE TABLE `data_merk` (
  `id_merk` int(10) NOT NULL,
  `merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_merk`
--

INSERT INTO `data_merk` (`id_merk`, `merk`) VALUES
(1, 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

CREATE TABLE `data_mobil` (
  `id_mobil` int(10) NOT NULL,
  `nama_merk` varchar(10) NOT NULL,
  `nama_mobil` varchar(15) NOT NULL,
  `warna_mobil` varchar(10) NOT NULL,
  `jumlah_kursi` varchar(10) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `tahun_beli` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mobil`
--

INSERT INTO `data_mobil` (`id_mobil`, `nama_merk`, `nama_mobil`, `warna_mobil`, `jumlah_kursi`, `no_polisi`, `tahun_beli`, `harga`, `gambar`) VALUES
(20, 'Toyota', 'dfd', 'df', '123', 'dfd', '23', 300000, '1686837066_2cb70a3de07bf664afa9.jpg'),
(21, 'Mitsubishi', 'Mobil Bekas', 'Hitam', '4', '123456', '2015', 100000, '1686838136_d25294ac81bdf52ab19a.jpeg'),
(22, 'Toyota', 'MObil Baru', 'Hitam', '1', '123', '2020', 200000000, '1686838479_ff6dba7c955374e523c4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `id_bayar` int(10) NOT NULL,
  `jenis_bayar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pembayaran`
--

INSERT INTO `data_pembayaran` (`id_bayar`, `jenis_bayar`) VALUES
(2, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `data_perjalanan`
--

CREATE TABLE `data_perjalanan` (
  `id_perjalanan` int(11) NOT NULL,
  `kota_asal` varchar(15) NOT NULL,
  `kota_tujuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_perjalanan`
--

INSERT INTO `data_perjalanan` (`id_perjalanan`, `kota_asal`, `kota_tujuan`) VALUES
(1, 'dfd', 'bekasi'),
(2, 'subang', 'bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_perjalanan` int(11) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_harga` int(20) NOT NULL,
  `status` enum('Melakukan Pembayaran','Pembayaran Selesai','Pembayaran Dibatalkan','Pembayaran Ditolak','Selesai') NOT NULL,
  `jenis_bayar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pesanan`
--

INSERT INTO `data_pesanan` (`id_pesanan`, `id_user`, `id_customer`, `id_perjalanan`, `id_mobil`, `tanggal_pinjam`, `tanggal_kembali`, `total_harga`, `status`, `jenis_bayar`) VALUES
(1, 11, 2, 2, 21, '2023-06-27', '2023-06-29', 200000, 'Pembayaran Dibatalkan', 'Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2023-05-18-070821', 'App\\Database\\Migrations\\Users', 'default', 'App', 1684460941, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `role`, `created_at`, `updated_at`) VALUES
(2, 'admin1', '$2y$10$B.x3UWczIyJLHfqvkd24O.Z9Ex9oRz5R4am9FGHjwjmjFjqwLn0xy', 'Eris ', '', '2023-05-19 02:00:41', '2023-05-19 02:00:41'),
(3, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Eris ', 'Admin', '2023-05-19 02:02:40', '2023-05-19 02:02:40'),
(4, 'project', '$2y$10$9u/FBcCUGAlu1Q.FBScDeOvzov1q6x2XWpk1/WopQsG87y6OJpC/6', 'rental', '', '2023-05-21 03:26:50', '2023-05-21 03:26:50'),
(5, 'jolll', '$2y$10$mM6m7PFBwLxtzC3O1YxGCOz7jbGMfvoa1JxjKO.D2Ds3hVFtNvlyK', 'jolll', '', '2023-05-21 13:49:45', '2023-05-21 13:49:45'),
(6, 'admpeny', '$2y$10$o9XwNfbdLYeLzIPtyeekL.BZKXSxbv4Z2/YB2XRVVdtLY67HMsvpe', 'penyedia', 'Admin', '2023-05-29 10:37:56', '2023-05-29 10:37:56'),
(7, 'adminjasa', '$2y$10$DnASQj7Vwb1P.a6C.5mc9epQJgGs6VkJTNPEyBnvTBnIisj5ZX3ni', 'penyedia jasa', 'Admin', '2023-05-30 09:16:27', '2023-05-30 09:16:27'),
(8, 'ma\'rup', '$2y$10$fJMjJGRdz3BF58uhvF4dFumPVzl0tnOWIqFKsEQrcWTU8azgHo.yW', 'dailah', '', '2023-06-01 02:21:16', '2023-06-01 02:21:16'),
(9, 'ma\'rup', '$2y$10$wuwxPzyZULr1tAZFbXLUcOPXRy7dm1Y7fQg9.dUKSThiujKUQi28e', 'dailah', '', '2023-06-01 02:22:26', '2023-06-01 02:22:26'),
(10, 'user', 'df0c1173924805b55e2f162788d64578', 'penyewa', '', '2023-06-12 12:38:28', '2023-06-12 12:38:28'),
(11, 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'penyewa', 'User', '2023-06-13 15:59:27', '2023-06-13 15:59:27'),
(12, 'penyewa', '202cb962ac59075b964b07152d234b70', 'Eris Nugraha', 'User', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_merk`
--
ALTER TABLE `data_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `data_perjalanan`
--
ALTER TABLE `data_perjalanan`
  ADD PRIMARY KEY (`id_perjalanan`);

--
-- Indexes for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`,`id_customer`,`id_perjalanan`),
  ADD KEY `id_perjalanan` (`id_perjalanan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_merk`
--
ALTER TABLE `data_merk`
  MODIFY `id_merk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_mobil`
--
ALTER TABLE `data_mobil`
  MODIFY `id_mobil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  MODIFY `id_bayar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_perjalanan`
--
ALTER TABLE `data_perjalanan`
  MODIFY `id_perjalanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD CONSTRAINT `data_customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD CONSTRAINT `data_pesanan_ibfk_1` FOREIGN KEY (`id_perjalanan`) REFERENCES `data_perjalanan` (`id_perjalanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pesanan_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `data_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pesanan_ibfk_3` FOREIGN KEY (`id_mobil`) REFERENCES `data_mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pesanan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
