-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Agu 2018 pada 12.14
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databaseku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
`id_admin` tinyint(2) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','superadmin') NOT NULL,
  `email` varchar(100) NOT NULL,
  `status_login` enum('1','2') NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `password`, `level`, `email`, `status_login`, `status`) VALUES
(1, 'Super Admin', '$2y$10$NwTSANgtnU1MNSaR/tVK0u4pDv/fW74QYdrcl6MC2Ljs.oHMaTTMW', 'superadmin', 'superadmin@gmail.com', '1', '2'),
(2, 'Admin', '$2y$10$NwTSANgtnU1MNSaR/tVK0u4pDv/fW74QYdrcl6MC2Ljs.oHMaTTMW', 'admin', 'admin@gmail.com', '1', '1'),
(3, 'admin2', '$2y$10$s7EVjaJtDW1mr8qbUniHYe9zQcvRcKHeVPGN.veX4qu2a2Q1H0lkW', 'admin', 'admin2@gmail.com', '1', '1'),
(4, 'admin3', '$2y$10$DNL/HoUYIfE6KrMgQ4L2N.Ir1DZ6sm5fL.pEkzoNGeS/UUbixVMi.', 'admin', 'admin3@gmail.com', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dp`
--

CREATE TABLE IF NOT EXISTS `t_dp` (
`id_dp` tinyint(5) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_dp`
--

INSERT INTO `t_dp` (`id_dp`, `username`, `email`, `password`, `status`) VALUES
(1, 'anto', 'ateeeha@gmail.com', '$2y$10$BgEiw8qXzP2qhnKNVZyMqu7Pqn6sGqwoDfxULlro04igXiCAluIc2', '2'),
(3, 'hermawan', 'hermawan@gmail.com', '$2y$10$tkBulGeOhS6xB8qEFPENSeF6nW45lQ8NWvgKvLFHhbqZe97IbDuX.', '2'),
(4, 'admin', 'admin@gmail.com', '$2y$10$5vKAU8g3Pq0b/AQpET6Yuut/lY4d1QNlh00gFxcIORh7/mt7uFSDW', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kurir`
--

CREATE TABLE IF NOT EXISTS `t_kurir` (
`id_kurir` tinyint(5) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_kurir`
--

INSERT INTO `t_kurir` (`id_kurir`, `username`, `email`, `password`, `status`) VALUES
(2, 'kurir', 'kurir@gmail.com', '$2y$10$1K5u4PpSDIdVjN/KZvzPOuTnAgALiClSofKvsBts.wlNwer2q1Cne', '2'),
(3, 'kurir2', 'anton@gmail.com', '$2y$10$hgHi/hNIJhmEyUMTKmgX3.ZLDK3iNHSahSEn/Gaafnt/SDrrya7Eu', '1'),
(5, 'kurir3', 'kurir@gmail.com', '$2y$10$bKZQQfUCWTK.yJ0YeQCeBONhKeaEcHxxgW2GD3tkUWf7Z3qA3co6q', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_member`
--

CREATE TABLE IF NOT EXISTS `t_member` (
`id_member` tinyint(2) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `t_member`
--

INSERT INTO `t_member` (`id_member`, `username`, `fullname`, `email`, `password`, `status`, `level`) VALUES
(1, 'member1', 'Anton', 'anton@gmail.com', '$2y$10$jqlL0sspLwX1tle4gRm7tey/a8kS1Li/4HNfFkjMM7TFDyV6ovn5q', 2, '1'),
(2, 'member2', 'Hermawan', 'hermawan@gmail.com', '$2y$10$jqlL0sspLwX1tle4gRm7tey/a8kS1Li/4HNfFkjMM7TFDyV6ovn5q', 1, '2'),
(28, 'asdasd', 'asdasd', 'ateeeha@gmail.com', '$2y$10$Fl9lXfGKeOmAT1PFrEEu8uEvi51s/kFTUHMx5JzUxOWuMNW9jjdAm', 1, '2'),
(29, 'asdasdasd', 'Anton Hermawan', 'ahmad.adzan@gmail.com', '$2y$10$kzgCpaVoTddYdLnvbSPmKuJIJ1NBFkyzWXTIRQ5wC.NYzwJBWXQLq', 1, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`id_user` tinyint(5) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `email`, `password`, `status`) VALUES
(1, 'anton', 'ateha@gmail.com', '$2y$10$MQbuDf105ZsKMlsC32c2nukwIf9cGsXlvmnSeYWoxk6CkOFYSCjIK', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_dp`
--
ALTER TABLE `t_dp`
 ADD PRIMARY KEY (`id_dp`);

--
-- Indexes for table `t_kurir`
--
ALTER TABLE `t_kurir`
 ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `t_member`
--
ALTER TABLE `t_member`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
MODIFY `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_dp`
--
ALTER TABLE `t_dp`
MODIFY `id_dp` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_kurir`
--
ALTER TABLE `t_kurir`
MODIFY `id_kurir` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_member`
--
ALTER TABLE `t_member`
MODIFY `id_member` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `id_user` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
