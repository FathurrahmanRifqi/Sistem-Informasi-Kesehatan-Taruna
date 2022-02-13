-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 12:04 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemkesehatantaruna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `infografis`
--

CREATE TABLE `infografis` (
  `id_infografis` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_keluhan`
--

CREATE TABLE `kategori_keluhan` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_keluhan`
--

INSERT INTO `kategori_keluhan` (`id_kategori`, `kategori`) VALUES
(1, 'Ringan'),
(2, 'Sedang'),
(3, 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(55) NOT NULL,
  `jurusan` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`) VALUES
(1, 'I A', NULL),
(2, 'I B', NULL),
(3, 'I C', NULL),
(4, 'I D', NULL),
(5, 'I E', NULL),
(6, 'II Rekayasa Keamanan Siber Blue', 'Keamanan Siber'),
(7, 'II Rekayasa Keamanan Siber Red', 'Keamanan Siber'),
(8, 'II Rekayasa Perangkat Keras Kriptografi', 'Kriptografi'),
(9, 'II Rekayasa Perangkat Lunak Kripto', 'Kriptografi'),
(10, 'II Rekayasa Sistem Kriptografi', 'Kriptografi'),
(11, 'III Rekayasa Keamanan Siber Nexus', 'Keamanan Siber'),
(12, 'III Rekayasa Keamanan Siber Python', 'Keamanan Siber'),
(13, 'III Rekayasa Keamanan Siber Ruby', 'Keamanan Siber'),
(14, 'III Rekayasa Perangkat Keras Elektron', 'Kriptografi'),
(15, 'III Rekayasa Perangkat Lunak Kripto', 'Kriptografi');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `keluhan` varchar(55) NOT NULL,
  `deskripsi_keluhan` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `keluhan`, `deskripsi_keluhan`, `id_kategori`, `npm`, `created_at`) VALUES
(78, 'Meriang', 'Merindukan kasih sayang', 2, 1918101504, '2022-02-11 22:09:32');

--
-- Triggers `keluhan`
--
DELIMITER $$
CREATE TRIGGER `after_delete_keluhan` AFTER DELETE ON `keluhan` FOR EACH ROW IF (SELECT keluhan.npm FROM keluhan WHERE  keluhan.npm = OLD.npm Group By keluhan.npm) IS NULL THEN BEGIN
UPDATE users SET users.id_status = 1 WHERE users.npm = OLD.npm;
END;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_keluhan` AFTER INSERT ON `keluhan` FOR EACH ROW UPDATE users set id_status = 2 WHERE npm = NEW.npm
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `id_penanganan` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `keterangan_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_penanganan`, `nama_obat`, `keterangan_obat`) VALUES
(93, 74, 'Panadol Kelapss', '3 x 1 stlh makan');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE `penanganan` (
  `id_penanganan` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `id_keluhan` int(11) NOT NULL,
  `keterangan` text NOT NULL DEFAULT '-',
  `tindak_lanjut` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`id_penanganan`, `npm`, `id_keluhan`, `keterangan`, `tindak_lanjut`, `created_at`) VALUES
(74, 1918101504, 78, 'diantar oleh supir', 'Ke RS CISEENG', '2022-02-13 00:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Taruna'),
(2, 'Asisten Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `status_taruna`
--

CREATE TABLE `status_taruna` (
  `id_status` int(11) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_taruna`
--

INSERT INTO `status_taruna` (`id_status`, `status`) VALUES
(1, 'Sehat'),
(2, 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `npm` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `id_kelas` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL DEFAULT 1,
  `isoman` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`npm`, `nama`, `username`, `password`, `id_status`, `id_kelas`, `id_role`, `isoman`) VALUES
(1918101504, 'Fathurrahman Rifqi Azzami', 'fathurrahman.rifqi', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 15, 1, 0),
(1918101514, 'Hilya Tazkia Kamalia', 'hilya.tazkia', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 15, 2, 0),
(1918101541, 'guest', 'guest', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `infografis`
--
ALTER TABLE `infografis`
  ADD PRIMARY KEY (`id_infografis`);

--
-- Indexes for table `kategori_keluhan`
--
ALTER TABLE `kategori_keluhan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_penanganan` (`id_penanganan`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id_penanganan`),
  ADD KEY `id_keluhan` (`id_keluhan`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_taruna`
--
ALTER TABLE `status_taruna`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infografis`
--
ALTER TABLE `infografis`
  MODIFY `id_infografis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_keluhan`
--
ALTER TABLE `kategori_keluhan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id_penanganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_taruna`
--
ALTER TABLE `status_taruna`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `users` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_keluhan` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_penanganan`) REFERENCES `penanganan` (`id_penanganan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD CONSTRAINT `penanganan_ibfk_1` FOREIGN KEY (`id_keluhan`) REFERENCES `keluhan` (`id_keluhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penanganan_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `users` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_taruna` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
