-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 10:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olhrg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kategori` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(31, 'Dobok Teakwondo Hitam Adidas', 'Dobok Taekwondo Kerah warna hitam hanya digunakan untuk untuk pelatih atau hanya untuk yang sudah sa', 'Taekwondo', 400000, 7, 'taekwondoblack2.jpg'),
(32, 'Dobok Teakwondo Putih Adidas', 'Dobok Taekwondo Kerah warna putih hanya digunakan untuk untuk pemula atau untuk yang belum sabuk hit', 'Taekwondo', 200000, 10, 'taekwondowhite.jpg'),
(33, 'Seragam Karate Adidas Sabuk Hitam', 'Seragam Karate Adidas Sabuk Hitam di lengkapi sabuk hitam. Merk adidas harga terjangkau', 'Karate', 300000, 5, 'karateadidas.jpg'),
(34, 'Seragam Karate Adidas Sabuk Beginner', 'Seragam Karate Adidas Sabuk Putih di lengkapi sabuk Putih. Merk adidas harga terjangkau', 'Karate', 200000, 10, 'Karatebginner.jpg'),
(35, 'Seragam Judo Champion Biru', 'Seragam Judo Champion Biru dilengkapi sabuk. Cocok untuk para champion, dibuat dengan bahan terbaik ', 'Judo', 700000, 8, 'judoChampion.jpg'),
(37, 'Seragam Boxing', 'Seragam Boxing ini telah digunakan para juara tinju di Indonesia, dibuat dengan bahan berkualitas an', 'Boxing', 400000, 10, 'boxingglove.png'),
(38, 'Seragam Judo Putih', 'Seragam Judo Putih dilengkapi sabuk. Cocok untuk pemula, dibuat dengan bahan terbaik dari merk Adida', 'Judo', 300000, 8, 'judoiWhiteTraining1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(20, 'Joko Suherman', 'sleman, Yogyakarta', '2022-08-17 12:13:40', '2022-08-20 12:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`) VALUES
(1, 1, 1, 'sepatu', 1, 300000),
(2, 2, 2, 'Kamera', 1, 950000),
(20, 14, 3, 'Smartphone', 1, 1999000),
(21, 14, 5, 'Jam Tangan', 1, 200000),
(22, 14, 6, 'Kemeja', 1, 90000),
(25, 18, 1, 'Sepatu', 1, 300000),
(26, 18, 2, 'Kamera', 1, 950000),
(27, 19, 11, 'Tas Wanita', 1, 90000),
(28, 19, 4, 'Laptop', 1, 5000000),
(29, 20, 32, 'Dobok Teakwondo Putih Adidas', 2, 200000),
(30, 20, 35, 'Seragam Judo Champion Biru', 2, 700000),
(31, 20, 37, 'Seragam Boxing', 1, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`) VALUES
(10, 'JONO', 'JON@gmail.com', 'Koala1.jpg', '$2y$10$HaxD3OVvLQgO.JUMC0E.JeNNNUbWm6JuRQEo8Vjf.kZ1kqd4vCRE6', 1, 1),
(11, 'JOKO', 'jok@yahoo.com', 'default.jpg', '$2y$10$C8h7oXE7BBTTEXvPqTTje.tWOyFzNcksI17UGBQYN0X7aPqCnDlj6', 2, 1),
(12, 'Bang Jamet', 'jamet@gmail.com', 'default.jpg', '$2y$10$wpvS8Bo.8qT5ZxgkIZgfeOZHaMeeNlQj0v6qBfT7brSD6jvKCMQs6', 2, 1);

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
(3, 2, 2),
(4, 2, 3),
(5, 2, 4),
(6, 1, 5),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(3, 'Kategori'),
(5, 'Barang'),
(6, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `tittle`, `url`, `icon`, `is_active`) VALUES
(3, 3, 'Taekwondo', 'user/MrtialArts1', 'fas fa-fw fa-male', 1),
(6, 3, 'Karate', 'user/MrtialArts2', 'fas fa-fw fa-male', 1),
(7, 6, 'Menu Management', 'menu', 'far fa-fw fa-folder-open', 1),
(8, 6, 'Submenu Management', 'menu/submenu', 'far fa-fw fa-folder', 1),
(9, 3, 'Judo', 'user/MrtialArts3', 'fas fa-fw fa-male', 1),
(10, 3, 'Boxing', 'user/MrtialArts4', 'fas fa-fw fa-male', 1),
(11, 5, 'Data Barang', 'admin/data_barang', 'fas fa-fw fa-box', 1),
(19, 5, 'Invoice', 'admin/invoice', 'fas fa-fw fa-archive', 1),
(22, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
