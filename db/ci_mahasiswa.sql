-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 11:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `kode_fakultas` varchar(10) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `kode_fakultas`, `nama_fakultas`) VALUES
(8, 'FKIP', 'Fakultas Keguruan dan Ilmu Pendidikan'),
(9, 'FMIPA', 'Fakultas Matematika dan Ilmu Pengetahuan Alam'),
(10, 'FEB', 'Fakultas Ekonomi dan Bisnis'),
(11, 'FAKUM', 'Fakultas Hukum'),
(12, 'FAPERTA', 'Fakultas Pertanian'),
(13, 'FATEK', 'Fakultas Teknik'),
(14, 'FISIP', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
(15, 'FAHUT', 'Fakultas Kehutanan'),
(16, 'FK', 'Fakultas Kedokteran'),
(17, 'FAPETKAN', 'Fakultas Peternakan dan Perikanan'),
(18, 'FKM', 'Fakultas Kesehatan Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `kodeJurusan` varchar(64) NOT NULL,
  `kode_fakultas` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `kodeJurusan`, `kode_fakultas`) VALUES
(5, 'Pendidikan Bahasa Indonesia', 'PBI', 'FKIP'),
(6, 'Pendidikan Bahasa Inggris', 'PBE', 'FKIP'),
(8, 'Pendidikan Guru Sekolah Dasar', 'PGSD', 'FKIP'),
(9, 'Pendidikan Anak Usia Dini', 'PAUD', 'FKIP'),
(10, 'Pendidikan Jasmani, Kesehatan, dan Rekreasi', 'PJKR', 'FKIP'),
(11, 'Pendidikan Pancasila dan Kewarganegaraan', 'PPKN', 'FKIP'),
(12, 'Pendidikan Sejarah', 'PSej', 'FKIP'),
(13, 'Pendidikan Geografi', 'PGEO', 'FKIP'),
(14, 'Pendidikan Fisika', 'PFIS', 'FKIP'),
(15, 'Pendidikan Kimia', 'PKIM', 'FKIP'),
(16, 'Pendidikan Matematika', 'PMAT', 'FKIP'),
(17, 'Pendidikan Biologi', 'PBIO', 'FKIP'),
(18, 'Pendidikan Ilmu Pengetahuan Alam', 'PMIPA', 'FKIP'),
(19, 'Pendidikan Ilmu Pengetahuan Sosial', 'PIPS', 'FKIP'),
(20, 'Fisika', 'FIS', 'FMIPA'),
(21, 'Matematika', 'MAT', 'FMIPA'),
(22, 'Statistika', 'STAT', 'FMIPA'),
(23, 'Kimia', 'KIM', 'FMIPA'),
(24, 'Biologi', 'BIO', 'FMIPA'),
(25, 'Farmasi', 'FARM', 'FMIPA'),
(26, 'Teknik Geofisika', 'GEOF', 'FMIPA'),
(27, 'Ilmu Ekonomi Pembangunan', 'IEP', 'FEB'),
(28, 'Manajemen', 'MAN', 'FEB'),
(29, 'Akuntansi', 'AKT', 'FEB'),
(30, 'Akuntansi Sektor Publik', 'ASP', 'FEB'),
(31, 'Ilmu Hukum', 'HUK', 'FAKUM'),
(32, 'Agroteknologi', 'AGT', 'FAPERTA'),
(33, 'Agrobisnis', 'AGB', 'FAPERTA'),
(34, 'Teknik Sipil', 'TS', 'FATEK'),
(35, 'Arsitektur', 'ARS', 'FATEK'),
(36, 'Teknik Mesin', 'TM', 'FATEK'),
(37, 'Teknik Rekayasa Kelistrikan', 'TRK', 'FATEK'),
(38, 'Teknik Elektro', 'TE', 'FATEK'),
(39, 'Teknik Informatika', 'TI', 'FATEK'),
(40, 'Teknik Geologi', 'TG', 'FATEK'),
(41, 'Perencanaan Wilayah dan Kota', 'PWK', 'FATEK'),
(42, 'Sistem Informasi', 'SI', 'FATEK'),
(43, 'Ilmu Administrasi Publik', 'IAP', 'FISIP'),
(44, 'Ilmu Pemerintahan', 'IP', 'FISIP'),
(45, 'Sosiologi', 'SOS', 'FISIP'),
(46, 'Antropologi', 'ANT', 'FISIP'),
(47, 'Ilmu Komunikasi', 'IK', 'FISIP'),
(48, 'Kehutanan', 'KH', 'FAHUT'),
(49, 'Konservasi Hutan', 'KHN', 'FAHUT'),
(50, 'Pendidikan Dokter', 'PD', 'FK'),
(51, 'Peternakan', 'PTN', 'FAPETKAN'),
(52, 'Akuakultur', 'AQU', 'FAPETKAN'),
(53, 'Sumber Daya Akuatik', 'SDA', 'FAPETKAN'),
(54, 'Kesehatan Masyarakat', 'KM', 'FKM'),
(55, 'Gizi', 'GIZ', 'FKM');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nama` varchar(100) DEFAULT NULL,
  `Fakultas` varchar(128) DEFAULT NULL,
  `Jurusan` varchar(128) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `NomorHp` varchar(15) DEFAULT NULL,
  `Ipk` decimal(3,2) DEFAULT NULL,
  `jenisKelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `id` int(11) NOT NULL,
  `NIM` varchar(24) NOT NULL,
  `statusRegist` int(2) NOT NULL,
  `PIN` varchar(64) DEFAULT NULL,
  `periode` int(12) NOT NULL,
  `kode_fakultas` varchar(64) NOT NULL,
  `kode_jurusan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nama`, `Fakultas`, `Jurusan`, `Alamat`, `NomorHp`, `Ipk`, `jenisKelamin`, `id`, `NIM`, `statusRegist`, `PIN`, `periode`, `kode_fakultas`, `kode_jurusan`) VALUES
('Andi Mardiansa', 'Fakultas Teknik', 'Teknik Informatika', 'tondo', '1231231231', 3.99, 'Laki-Laki', 31, '2222', 1, '22', 2, 'FATEK', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`, `keterangan`, `status`) VALUES
(1, 'Wisuda 128', 'Tes', 0),
(2, 'Wisuda 127', 'tes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(168) NOT NULL,
  `password` varchar(168) NOT NULL,
  `role` int(1) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `date_created`, `is_active`) VALUES
(2, 'Rasya Aditya', 'rasya@gmail.com', '4009aad68df72e30420d0bfe2f68ac43', 2, '2025-02-14', 1),
(3, 'Rangga', 'rangga@gmail.com', 'ad58b1c99aeb5cdf7663a02211e7f6fb', 3, '2025-02-14', 1),
(12, 'Andi Mardiansa', 'anca@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 4, '0000-00-00', 1),
(13, 'Super Admin', 'admin@gmail.com', '83eebac535d14f791f6ee4dbefe689dc', 1, '2025-02-16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
