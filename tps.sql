-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 04:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tps`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `umur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `jk`, `umur`) VALUES
(1, 'Fathan', 'Pria', 26),
(2, 'Feisal', 'Pria', 21),
(3, 'Sinta', 'Wanita', 22),
(4, 'Towa', 'Wanita', 20),
(5, 'Rohsyam', 'Pria', 20),
(6, 'Iqbal', 'Pria', 20),
(7, 'Yojo', 'Pria', 30),
(8, 'Denji', 'Pria', 33),
(9, 'Dany', 'Pria', 21),
(10, 'Kiana', 'Wanita', 20),
(11, 'Hana', 'Wanita', 30),
(12, 'Lena', 'Wanita', 35);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(12) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL,
  `jawaban` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`, `jawaban`) VALUES
(1, 'Bagaimana cara memesan barang?', 'Untuk memesan suatu barang, pastikan barang yang diinginkan masih tersedia. Kemudian masukkan barang ke dalam keranjang. Lalu checkout pada menu keranjang.'),
(2, 'Bagaimana cara cancel pesanan?', 'Barang yang telah dipesan tidak dapat dicancel.'),
(3, 'Kapan penjualan dapat dikatakan baik?', 'Penjualan dapat dikatakan baik apabila grafik penjualan surplus yang artinya tidak mengalami kerugian.');

-- --------------------------------------------------------

--
-- Table structure for table `toko2`
--

CREATE TABLE `toko2` (
  `id` int(11) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko2`
--

INSERT INTO `toko2` (`id`, `produk`, `harga`, `jumlah`) VALUES
(1, 'VGA', 1000000, 20),
(2, 'Mouse', 30000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `produk`, `harga`, `jumlah`) VALUES
(8, 'Hp', 3000000, 28),
(9, 'VGA', 3000000, 9),
(11, 'Laptop Asus', 6000000, 13),
(12, 'Mouse', 15000, 45);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_name`, `user_email`, `user_password`, `role`) VALUES
(1, 'fathan', 'fathan@gmail.com', '111085f4bb513486d1fb6d5d6f45cc72', 'admin'),
(2, 'biasa', 'biasa@gmail.com', '95c2fbc7fc1feb035a95975519072b8e', 'user'),
(3, 'yusuf', 'yusuf@gmail.com', 'add3deb05fc6625aae939041e4131624', 'admin'),
(4, 'manajer', 'manajer@gmail.com', '5fbb69663039903931daf8b26344b76b', 'mngr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko2`
--
ALTER TABLE `toko2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toko2`
--
ALTER TABLE `toko2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
