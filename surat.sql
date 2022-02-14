-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 01:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_request_akta`
--

CREATE TABLE `data_request_akta` (
  `id_request_akta` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `scan_ktp_ayah` text NOT NULL,
  `scan_ktp_ibu` text NOT NULL,
  `scan_suratnikah` text NOT NULL,
  `scan_kk` text NOT NULL,
  `scan_surat_kelahiran` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) NOT NULL DEFAULT 'KELAHIRAN',
  `status` int(11) NOT NULL,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_request_kematian`
--

CREATE TABLE `data_request_kematian` (
  `id_request_kematian` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `scan_ktp1` text NOT NULL,
  `scan_ktp2` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) NOT NULL DEFAULT 'KEMATIAN',
  `status` int(11) NOT NULL,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_request_kk`
--

CREATE TABLE `data_request_kk` (
  `id_request_kk` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_suratnikah` text NOT NULL,
  `akta_lahir` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) NOT NULL DEFAULT 'LAINNYA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_request_ktp`
--

CREATE TABLE `data_request_ktp` (
  `id_request_ktp` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `akta_lahir` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) NOT NULL DEFAULT 'KTP',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_request_pernikahan`
--

CREATE TABLE `data_request_pernikahan` (
  `id_request_pernikahan` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `akta_lahir` text NOT NULL,
  `ijazah` text NOT NULL,
  `scan_suratnikah` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) NOT NULL DEFAULT 'PERNIKAHAN',
  `status` int(11) NOT NULL,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skck`
--

CREATE TABLE `data_request_skck` (
  `id_request_skck` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `akta_lahir` text NOT NULL,
  `ijazah` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `request` varchar(20) NOT NULL DEFAULT 'SKCK',
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skd`
--

CREATE TABLE `data_request_skd` (
  `id_request_skd` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `scan_suratnikah` text NOT NULL,
  `pas_foto` text NOT NULL,
  `skck` text NOT NULL,
  `keperluan` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) NOT NULL DEFAULT 'DOMISILI',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` varchar(225) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `status_warga` varchar(30) NOT NULL,
  `warga1` varchar(50) NOT NULL DEFAULT 'Warga RT 01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`username`, `password`, `hak_akses`, `nama`, `nik`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `status_warga`, `warga1`) VALUES
('08022022', '1', 'Admin', 'admin1', '1234567', '2022-08-02', 'JAKARTA', 'laki laki', 'islam', 'bogor bojong gede', '082525252', 'kerja', 'Warga RT 01'),
('1', '1', 'Ketua RW', 'coba', '', '2021-10-20', 'coba', 'Laki-Laki', '', 'coba', '', 'Kerja', ''),
('2', '2', 'Ketua RT', 'coba', '', '2021-10-20', 'coba', 'Perempuan', '', 'coba', '', 'Kerja', ''),
('23021999', '2', 'Warga RT01', 'Minhyuk', '1234567890', '0000-00-00', 'JAKARTA', 'laki laki', 'islam', 'BOGOR', '085888888888', 'kerja', 'Warga RT 01'),
('25021999', '123', 'Warga RT02', 'bintang', '2413548786', '1999-02-25', 'Malang', 'Laki-Laki', '', 'jaksel', '', 'Belum Bekerja', 'Warga RT 01'),
('28041999', '123', 'Warga RT02', 'nuraini', '21345567890', '1999-04-28', 'bogor', 'Perempuan', 'islam', 'BOGOR', '085888888888', 'sekolah', 'Warga RT 02');

-- --------------------------------------------------------

--
-- Table structure for table `data_user_rt02`
--

CREATE TABLE `data_user_rt02` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `status_warga` varchar(20) NOT NULL,
  `warga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='7';

--
-- Dumping data for table `data_user_rt02`
--

INSERT INTO `data_user_rt02` (`username`, `password`, `hak_akses`, `nama`, `nik`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `status_warga`, `warga`) VALUES
('25021999', '1', 'Pemohon', 'Minhyuk', '012345678910', '1999-02-25', 'Jakarta', 'Laki-Laki', '', 'Bogor Bojong Gede', '', 'Kerja', 'Warga RT 02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_request_akta`
--
ALTER TABLE `data_request_akta`
  ADD PRIMARY KEY (`id_request_akta`);

--
-- Indexes for table `data_request_kematian`
--
ALTER TABLE `data_request_kematian`
  ADD PRIMARY KEY (`id_request_kematian`);

--
-- Indexes for table `data_request_kk`
--
ALTER TABLE `data_request_kk`
  ADD PRIMARY KEY (`id_request_kk`),
  ADD KEY `id_pemohon` (`username`);

--
-- Indexes for table `data_request_ktp`
--
ALTER TABLE `data_request_ktp`
  ADD PRIMARY KEY (`id_request_ktp`),
  ADD KEY `id_pemohon` (`username`);

--
-- Indexes for table `data_request_pernikahan`
--
ALTER TABLE `data_request_pernikahan`
  ADD PRIMARY KEY (`id_request_pernikahan`);

--
-- Indexes for table `data_request_skck`
--
ALTER TABLE `data_request_skck`
  ADD PRIMARY KEY (`id_request_skck`),
  ADD KEY `id_pemohon` (`username`);

--
-- Indexes for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD PRIMARY KEY (`id_request_skd`),
  ADD KEY `id_pemohon` (`username`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_user_rt02`
--
ALTER TABLE `data_user_rt02`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_request_akta`
--
ALTER TABLE `data_request_akta`
  MODIFY `id_request_akta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_request_kematian`
--
ALTER TABLE `data_request_kematian`
  MODIFY `id_request_kematian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_request_kk`
--
ALTER TABLE `data_request_kk`
  MODIFY `id_request_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_request_ktp`
--
ALTER TABLE `data_request_ktp`
  MODIFY `id_request_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_request_pernikahan`
--
ALTER TABLE `data_request_pernikahan`
  MODIFY `id_request_pernikahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_request_skck`
--
ALTER TABLE `data_request_skck`
  MODIFY `id_request_skck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  MODIFY `id_request_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_request_kk`
--
ALTER TABLE `data_request_kk`
  ADD CONSTRAINT `data_request_kk_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_ktp`
--
ALTER TABLE `data_request_ktp`
  ADD CONSTRAINT `data_request_ktp_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_skck`
--
ALTER TABLE `data_request_skck`
  ADD CONSTRAINT `data_request_skck_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD CONSTRAINT `data_request_skd_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
