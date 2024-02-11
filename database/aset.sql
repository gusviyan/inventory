-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2023 at 10:13 AM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `kode`, `jabatan`, `username`, `pass`, `date`) VALUES
(3, 'AD-547', 'Administrasi', 'admin', '$2y$10$nqg4GjHRzpnObHnTWhe0vebR2FKyYa5w9AecZWD.LWdFvDuagAQNK', '2023-05-09 10:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aset`
--

CREATE TABLE `tbl_aset` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `lantai` varchar(20) NOT NULL,
  `lokasi_aset` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `qr` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aset`
--

INSERT INTO `tbl_aset` (`id`, `kode`, `nama_aset`, `kategori`, `lantai`, `lokasi_aset`, `ip`, `processor`, `ram`, `foto`, `qr`, `user`, `date`) VALUES
(11, 'KA-357', 'Komputer', 'Elektronik', 'Bekas', 'Lantai 1', '3434343434333', '2000000', 'Amanahkom', '1adb2144b8f0889e1482988434c66bd3.PNG', '687474703a2f2f6c6f63616c686f73742f617365742f617365742f696e6465782f4b412d333537', '', '2023-04-05 07:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id` int(11) NOT NULL,
  `kode_peminjam` varchar(15) NOT NULL,
  `kode_aset` varchar(15) NOT NULL,
  `tgl_pengembalian` varchar(15) NOT NULL,
  `denda` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_denda`
--

INSERT INTO `tbl_denda` (`id`, `kode_peminjam`, `kode_aset`, `tgl_pengembalian`, `denda`, `date`) VALUES
(2, '3434', 'KA-885', '2023-04-05', '0', '2023-04-05 04:31:06'),
(3, 'PJM-1986', 'KA-357', '2023-04-05', '360000', '2023-05-09 10:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kode`, `nama_kategori`, `date`) VALUES
(2, 'KT-88', 'Elektronik', '2023-04-03 09:04:22'),
(3, 'KT-561', 'Material', '2023-04-03 09:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lantai`
--

CREATE TABLE `tbl_lantai` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `lantai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lantai`
--

INSERT INTO `tbl_lantai` (`id`, `kode`, `lantai`) VALUES
(3, 'KL-896', 'Bekas'),
(4, 'KL-265', 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id`, `kode`, `nama_lokasi`, `ruangan`, `date`) VALUES
(3, '', 'Lantai 1', 'Gudang', '2023-05-09 10:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `kode_aset` varchar(15) NOT NULL,
  `nama_peminjam` varchar(30) NOT NULL,
  `alamat_peminjam` text NOT NULL,
  `nohp_peminjam` int(13) NOT NULL,
  `jml_barang` varchar(5) NOT NULL,
  `tgl_peminjaman` varchar(15) NOT NULL,
  `tgl_pengembalian` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(2) NOT NULL,
  `status_denda` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id`, `kode`, `kode_aset`, `nama_peminjam`, `alamat_peminjam`, `nohp_peminjam`, `jml_barang`, `tgl_peminjaman`, `tgl_pengembalian`, `keterangan`, `status`, `status_denda`, `date`) VALUES
(3, 'PJM-1986', 'KA-357', 'Aldi', 'Stabat', 2147483647, '3', '2023-04-02', '2023-04-03', 'Tidak ada', 0, 1, '2023-04-05 08:07:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lantai`
--
ALTER TABLE `tbl_lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_lantai`
--
ALTER TABLE `tbl_lantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
