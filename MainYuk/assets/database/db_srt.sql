-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 05:10 AM
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
-- Database: `db_srt`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `idPemilik` int(11) NOT NULL,
  `namaPemilik` varchar(100) NOT NULL,
  `alamatPemilik` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `idPenyewa` int(11) NOT NULL,
  `namaPenyewa` varchar(100) NOT NULL,
  `alamatPenyewa` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `idReservasi` int(11) NOT NULL,
  `idPenyewa` int(11) NOT NULL,
  `idTempat` int(11) NOT NULL,
  `mulaiSewa` date NOT NULL,
  `akhirSewa` date NOT NULL,
  `status` enum('belum','lunas') NOT NULL,
  `jenisPembayaran` enum('Transfer Virtual Account','Aplikasi Dana','Aplikasi Link Aja','Aplikasi OVO','Aplikasi Go-Pay') NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `idTempat` int(11) NOT NULL,
  `idPemilik` int(11) NOT NULL,
  `namaTempat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kapasitas` enum('1 - 2 orang','3 - 5 orang','5 - 10 orang','10 - 15 orang','> 15 orang') NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kategori` enum('Futsal','Badminton','Basket','') NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`idPemilik`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`idPenyewa`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`idReservasi`),
  ADD KEY `FK_RESERVASI_1` (`idPenyewa`),
  ADD KEY `FK_RESERVASI_2` (`idTempat`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`idTempat`),
  ADD KEY `FK_TEMPAT_1` (`idPemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `idPemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `idPenyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `idReservasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `idTempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `FK_RESERVASI_1` FOREIGN KEY (`idPenyewa`) REFERENCES `penyewa` (`idPenyewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RESERVASI_2` FOREIGN KEY (`idTempat`) REFERENCES `tempat` (`idTempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `FK_TEMPAT_1` FOREIGN KEY (`idPemilik`) REFERENCES `pemilik` (`idPemilik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
