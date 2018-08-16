-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Agu 2018 pada 08.39
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
`id_admin` int(11) NOT NULL,
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
(2, 'Admin', '$2y$10$NwTSANgtnU1MNSaR/tVK0u4pDv/fW74QYdrcl6MC2Ljs.oHMaTTMW', 'admin', 'admin@gmail.com', '1', '2'),
(3, 'admin2', '$2y$10$s7EVjaJtDW1mr8qbUniHYe9zQcvRcKHeVPGN.veX4qu2a2Q1H0lkW', 'admin', 'admin2@gmail.com', '1', '1'),
(4, 'admin3', '$2y$10$DNL/HoUYIfE6KrMgQ4L2N.Ir1DZ6sm5fL.pEkzoNGeS/UUbixVMi.', 'admin', 'admin3@gmail.com', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dp`
--

CREATE TABLE IF NOT EXISTS `t_dp` (
`id_dp` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `t_dp`
--

INSERT INTO `t_dp` (`id_dp`, `username`, `email`, `password`, `status`) VALUES
(1, 'anto', 'ateeeha@gmail.com', '$2y$10$BgEiw8qXzP2qhnKNVZyMqu7Pqn6sGqwoDfxULlro04igXiCAluIc2', '2'),
(3, 'hermawan', 'hermawan@gmail.com', '$2y$10$tkBulGeOhS6xB8qEFPENSeF6nW45lQ8NWvgKvLFHhbqZe97IbDuX.', '2'),
(4, 'admin', 'admin@gmail.com', '$2y$10$5vKAU8g3Pq0b/AQpET6Yuut/lY4d1QNlh00gFxcIORh7/mt7uFSDW', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kota`
--

CREATE TABLE IF NOT EXISTS `t_kota` (
`id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `t_kota`
--

INSERT INTO `t_kota` (`id_kota`, `id_provinsi`, `nama_kota`) VALUES
(1, 1, 'Magelang'),
(2, 2, 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kurir`
--

CREATE TABLE IF NOT EXISTS `t_kurir` (
`id_kurir` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `propinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_kurir`
--

INSERT INTO `t_kurir` (`id_kurir`, `username`, `email`, `password`, `status`, `propinsi`, `kabupaten`) VALUES
(2, 'kurir', 'kurir@gmail.com', '$2y$10$1K5u4PpSDIdVjN/KZvzPOuTnAgALiClSofKvsBts.wlNwer2q1Cne', '2', 'DIY', 'Bantul'),
(3, 'kurir2', 'kurir2@gmail.com', '$2y$10$hgHi/hNIJhmEyUMTKmgX3.ZLDK3iNHSahSEn/Gaafnt/SDrrya7Eu', '1', 'DIY', 'Sleman'),
(5, 'kurir3', 'kurir3@gmail.com', '$2y$10$bKZQQfUCWTK.yJ0YeQCeBONhKeaEcHxxgW2GD3tkUWf7Z3qA3co6q', '2', 'DIY', 'Bantul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_provinsi`
--

CREATE TABLE IF NOT EXISTS `t_provinsi` (
`id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `t_provinsi`
--

INSERT INTO `t_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Tengah'),
(2, 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tracking`
--

CREATE TABLE IF NOT EXISTS `t_tracking` (
`id_tracking` int(11) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('kurir1','droppoint1','droppoint2','kurir2','sampai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE IF NOT EXISTS `t_transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kurir_penjemput` int(11) NOT NULL,
  `kurir_pengantar` int(11) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `no_tlp` varchar(35) NOT NULL,
  `status_transaksi` enum('menunggu','dijemput','diterima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`id_user` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_user` enum('1','2') NOT NULL,
  `propinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `email`, `password`, `status_user`, `propinsi`, `kabupaten`) VALUES
(1, 'anton', 'user@gmail.com', '$2y$10$MQbuDf105ZsKMlsC32c2nukwIf9cGsXlvmnSeYWoxk6CkOFYSCjIK', '2', 'DIY', 'Sleman'),
(2, 'Tri Winanto', 'user2@gmail.com', '$2y$10$8H4krasdEeDvpwlJta8a7.wPbNXTfBzL8Mkj2fIsX98xAmtZrRSmS', '2', 'DIY', 'Yogyakarta'),
(3, 'hermawan', 'user3@gmail.com', '$2y$10$MsW1RZCOVpb5z07N1gCZDu1h81H4dmdeXFOuBQs/R9URuDZZDvrb6', '1', 'DIY', 'Bantul');

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
-- Indexes for table `t_kota`
--
ALTER TABLE `t_kota`
 ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `t_kurir`
--
ALTER TABLE `t_kurir`
 ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `t_provinsi`
--
ALTER TABLE `t_provinsi`
 ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `t_tracking`
--
ALTER TABLE `t_tracking`
 ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

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
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_dp`
--
ALTER TABLE `t_dp`
MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_kota`
--
ALTER TABLE `t_kota`
MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_kurir`
--
ALTER TABLE `t_kurir`
MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_provinsi`
--
ALTER TABLE `t_provinsi`
MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_tracking`
--
ALTER TABLE `t_tracking`
MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
