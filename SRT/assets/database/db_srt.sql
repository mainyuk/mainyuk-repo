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
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`idPemilik`, `namaPemilik`, `alamatPemilik`, `email`, `username`, `password`) VALUES
(1, 'Agung Prakasa', 'Jalan Lengkong Besar 110 Bandung, Jawa Barat, Indonesia', 'agung@pemilik.com', 'agungprakasa', '$2y$10$37zEayvabGYkRzl5ZWXAPuNni.tb9yQY4XCVHEZM9uMgSv/vLyg06'),
(7, 'Siti Nurbaya Salimah', 'Jalan Cigondewah 65 Bandung, Jawa Barat, Indonesia', 'sitinurbaya@pemilik.com', 'sitinurbaya', '$2y$10$VMCDClbCEyi98MoxeZaKuuHnQ5hzI1YdnavPYB/r84ZKmS/FMU35K'),
(8, 'Mustofa Jajang', 'Jalan KH Mustofa 58 Bandung', 'mustofa@pemilik.com', 'musJang', '$2y$10$Om0psYIE8qX/zUPQ0Ip.rujWRQxisbKGfs8Yz/lpT4Ourm9VL/LvW');

-- --------------------------------------------------------

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
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`idPenyewa`, `namaPenyewa`, `alamatPenyewa`, `email`, `username`, `password`) VALUES
(1, 'Gusti Cantika', 'Jalan Jendral Sudirman 117 Bandung, Jawa Barat, Indonesia', 'cantika@penyewa.com', 'cantikagusti', '$2y$10$9MuKJ5anQYbbZWUQeEJw2O0ZgiF82PKlulkg9W.B8cWOioihhgTNa'),
(2, 'Tetew Imas', 'Jalan Raya Kasisi Saeutik', 'tetew@penyewa.com', 'tetew123', '$2y$10$qaCKEYnOxp8tftdQVOKBmOoh3rzs32f7RO6nbAA02nvrtNPeC3I0y'),
(3, 'Kalev Jordan Gamaliel', 'di bumi dan di surga', 'kalev@penyewa.com', 'kalevjordan', '$2y$10$x.NT/BNa/.Vq.wAeRUePA.QGqkZBb61/d1NqAda4Hl2NEtyKm2CPG'),
(4, 'Jajang Mustofa', 'Jalan Banceuy 207 Kota Bandung', 'jajang@penyewa.com', 'jangMus', '$2y$10$R2SrhcRfukFjAE/55ZVG3.wNJjpMzqr2UznFbLixaFJPQ0Dgkq0Uq'),
(5, 'Joshua Galilea', 'Perumahan Puri Cipageran Indah 2 Blok B No 130 Cimahi Utara, Kota Cimahi, Jawa Barat, Indonesia', 'joga@penyewa.com', 'joga123', '$2y$10$WbWIIo5ZyGTRhbcwKqC.uuNEeD8dVOPMMQjWzdnenCUe3oMvgdl4a');

-- --------------------------------------------------------

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
  `kategori` enum('Rumah/ Villa','Working Space','Meeting Room','') NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`idTempat`, `idPemilik`, `namaTempat`, `deskripsi`, `kapasitas`, `provinsi`, `kota`, `kecamatan`, `alamat`, `kategori`, `tarif`) VALUES
(1, 1, 'Agung Working Space', 'Agung Working Space adalah tempat bekerja privat yang memberikan nuansa kerja yang nyaman. ', '1 - 2 orang', 'Jawa Barat', 'Bandung', 'Bandung Utara', 'Jalan Sukajadi 672', 'Working Space', 300000);

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
