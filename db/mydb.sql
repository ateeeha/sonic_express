-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2018 pada 11.16
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` bigint(20) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','superadmin') NOT NULL,
  `email` varchar(100) NOT NULL,
  `status_login` enum('1','2') NOT NULL,
  `status_admin` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `password`, `level`, `email`, `status_login`, `status_admin`) VALUES
(1, 'Super Admin', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', 'superadmin', 'superadmin@gmail.com', '1', '2'),
(2, 'Admin', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', 'admin', 'admin@gmail.com', '1', '2'),
(3, 'admin2', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', 'admin', 'admin2@gmail.com', '1', '1'),
(4, 'admin3', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', 'admin', 'admin3@gmail.com', '1', '2'),
(5, 'admin4', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', 'admin', 'admin4@gmail.com', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_agen`
--

CREATE TABLE `t_agen` (
  `id_agen` bigint(20) NOT NULL,
  `id_dp` bigint(20) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL,
  `status_agen` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_agen`
--

INSERT INTO `t_agen` (`id_agen`, `id_dp`, `username`, `email`, `password`, `provinsi`, `kabupaten`, `status_agen`) VALUES
(1, 2, 'Agen Bantul', 'a_bantul@gmail.com', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', 'DI Yogyakarta', 'Yogyakarta', '2'),
(2, 2, 'Agen Yogyakarta', 'a_yogyakarta@gmail.com', '$2y$10$bPBz.sbYgO6nz.Mx.UnXvu9tneS6vqQ1vFyyC/uhm.IyeLCv2i3KK', 'DI Yogyakarta', 'Yogyakarta', '2'),
(3, 2, 'Agen Sleman', 'a_sleman@gmail.com', '$2y$10$4Wl7IJPcpGQqUmEA1kEYdeCd/cJgYQG1muPXw6AuoBNAfRbiMTH.C', 'DI Yogyakarta', 'Sleman', '2'),
(4, 1, 'Agen Jakarta Pusat', 'a_jakarta_pusat@gmail.com', '$2y$10$z8tz/Tz/1NT1AA.uqFiNNOvRPdQqtjYmACR.5DWMFNVTbDk6uaX3y', 'DKI Jakarta', 'Jakarta Pusat', '1'),
(5, 1, 'Agen Jakarta Utara', 'a_jakarta_utara@gmail.com', '$2y$10$bZuYwya5JGdmfdM/YTwUCuaSlFkI7eL67OzMrQwL5bQEMdRkIq2xy', 'DKI Jakarta', 'Jakarta Utara', '1'),
(6, 1, 'Agen Jakarta Barat', 'a_jakarta_barat@gmail.com', '$2y$10$9je/nh.SreOl9qQ05a3ZlOeCU4Pla7DNMWfow5Gg57WAS78AvKGJa', 'DKI Jakarta', 'Jakarta Barat', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_agen_dp`
--

CREATE TABLE `t_agen_dp` (
  `id_agen_dp` bigint(20) NOT NULL,
  `id_dp` bigint(20) NOT NULL,
  `id_agen` bigint(20) NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `tgl_sampai` datetime NOT NULL,
  `status_agen_dp` enum('baru','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_agen_dp`
--

INSERT INTO `t_agen_dp` (`id_agen_dp`, `id_dp`, `id_agen`, `tgl_kirim`, `tgl_sampai`, `status_agen_dp`) VALUES
(1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'baru'),
(2, 2, 2, '0000-00-00 00:00:00', '2018-09-26 11:10:29', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_agen_dp_detail`
--

CREATE TABLE `t_agen_dp_detail` (
  `id_agen_dp_detail` bigint(20) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `id_agen_dp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_agen_dp_detail`
--

INSERT INTO `t_agen_dp_detail` (`id_agen_dp_detail`, `no_resi`, `id_agen_dp`) VALUES
(1, 'RES210920181027002', 1),
(2, 'RES26092018858192', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dp`
--

CREATE TABLE `t_dp` (
  `id_dp` bigint(20) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_dp` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dp`
--

INSERT INTO `t_dp` (`id_dp`, `username`, `email`, `provinsi`, `kabupaten`, `password`, `status_dp`) VALUES
(1, 'DP JAKARTA', 'dp_jakarta@gmail.com', 'DKI Jakarta', 'Jakarta Pusat', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', '2'),
(2, 'DP DIY', 'dp_diy@gmail.com', 'DI Yogyakarta', 'Yogyakarta', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kecamatan`
--

CREATE TABLE `t_kecamatan` (
  `id_kecamatan` bigint(20) NOT NULL,
  `id_kota` bigint(20) NOT NULL,
  `nama_kecamatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kecamatan`
--

INSERT INTO `t_kecamatan` (`id_kecamatan`, `id_kota`, `nama_kecamatan`) VALUES
(1, 35, 'Bambanglipuro'),
(2, 35, 'Banguntapan'),
(3, 35, 'Bantul'),
(4, 35, 'Dlingo'),
(5, 35, 'Imogiri'),
(6, 39, 'Danurejan'),
(7, 39, 'Gedongtengen'),
(8, 39, 'Gondokusuman'),
(9, 39, 'Gondomanan'),
(10, 39, 'Jetis'),
(11, 35, 'Jetis'),
(12, 40, 'Cengkareng'),
(13, 40, 'Grogol'),
(14, 40, 'Kalideres'),
(15, 40, 'Kebon Jeruk'),
(16, 40, 'Kembangan'),
(17, 40, 'Palmerah'),
(18, 40, 'Tamansari'),
(19, 40, 'Tambora'),
(20, 44, 'Cilincing'),
(21, 44, 'Jakarta Utara'),
(22, 44, 'Kelapa Gading'),
(23, 44, 'Koja'),
(24, 44, 'Pademangan'),
(25, 44, 'Penjaringan'),
(26, 44, 'Tanjung Priok'),
(27, 41, 'Cempaka Putih'),
(28, 41, 'Gambir'),
(29, 41, 'Jakarta Pusat'),
(30, 41, 'Johar Baru'),
(31, 41, 'Kemayoran'),
(32, 41, 'Menteng'),
(33, 41, 'Sawah Besar'),
(34, 41, 'Senen'),
(35, 41, 'Tanah Abang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kota`
--

CREATE TABLE `t_kota` (
  `id_kota` bigint(20) NOT NULL,
  `id_provinsi` bigint(20) NOT NULL,
  `nama_kota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kota`
--

INSERT INTO `t_kota` (`id_kota`, `id_provinsi`, `nama_kota`) VALUES
(1, 1, 'Badung'),
(2, 1, 'Bangli'),
(3, 1, 'Buleleng'),
(4, 1, 'Denpasar'),
(5, 1, 'Gianyar'),
(6, 1, 'Jembrana'),
(7, 1, 'Karangasem'),
(8, 1, 'Klungkung'),
(9, 1, 'Tabanan'),
(10, 2, 'Bangka'),
(11, 2, 'Bangka Barat'),
(12, 2, 'Bangka Selatan'),
(13, 2, 'Bangka Tengah'),
(14, 2, 'Belitung'),
(15, 2, 'Belitung Timur'),
(16, 2, 'Pangkal Pinang'),
(17, 3, 'Cilegon'),
(18, 3, 'Lebak'),
(19, 3, 'Pandeglang'),
(21, 3, 'Serang'),
(23, 3, 'Tangerang'),
(24, 3, 'Tangerang Selatan'),
(25, 4, 'Bengkulu'),
(26, 4, 'Bengkulu Selatan'),
(27, 4, 'Bengkulu Tengah'),
(28, 4, 'Bengkulu Utara'),
(29, 4, 'Kaur'),
(30, 4, 'Kepahiang'),
(31, 4, 'Lebong'),
(32, 4, 'Muko Muko'),
(33, 4, 'Rejang Lebong'),
(34, 4, 'Seluma'),
(35, 5, 'Bantul'),
(36, 5, 'Gunung Kidul'),
(37, 5, 'Kulon Progo'),
(38, 5, 'Sleman'),
(39, 5, 'Yogyakarta'),
(40, 6, 'Jakarta Barat'),
(41, 6, 'Jakarta Pusat'),
(42, 6, 'Jakarta Selatan'),
(43, 6, 'Jakarta Timur'),
(44, 6, 'Jakarta Utara'),
(45, 6, 'Kepulauan Seribu'),
(46, 7, 'Boalemo'),
(47, 7, 'Bone Bolango'),
(49, 7, 'Gorontalo'),
(50, 7, 'Gorontalo Utara'),
(51, 7, 'Pohuwato'),
(52, 8, 'Batang Hari'),
(53, 8, 'Bungo'),
(54, 8, 'Jambi'),
(55, 8, 'Kerinci'),
(56, 8, 'Merangin'),
(57, 8, 'Muaro Jambi'),
(58, 8, 'Sarolangun'),
(59, 8, 'Sungaipenuh'),
(60, 8, 'Tanjung Jabung Barat'),
(61, 8, 'Tanjung Jabung Timur'),
(62, 8, 'Tebo'),
(63, 9, 'Bandung'),
(64, 9, 'Bandung'),
(65, 9, 'Bandung Barat'),
(66, 9, 'Banjar'),
(68, 9, 'Bekasi'),
(70, 9, 'Bogor'),
(71, 9, 'Ciamis'),
(72, 9, 'Cianjur'),
(73, 9, 'Cimahi'),
(74, 9, 'Cirebon'),
(76, 9, 'Depok'),
(77, 9, 'Garut'),
(78, 9, 'Indramayu'),
(79, 9, 'Karawang'),
(80, 9, 'Kuningan'),
(81, 9, 'Majalengka'),
(82, 9, 'Pangandaran'),
(83, 9, 'Purwakarta'),
(84, 9, 'Subang'),
(85, 9, 'Sukabumi'),
(87, 9, 'Sumedang'),
(88, 9, 'Tasikmalaya'),
(90, 10, 'Banjarnegara'),
(91, 10, 'Banyumas'),
(92, 10, 'Batang'),
(93, 10, 'Blora'),
(94, 10, 'Boyolali'),
(95, 10, 'Brebes'),
(96, 10, 'Cilacap'),
(97, 10, 'Demak'),
(98, 10, 'Grobogan'),
(99, 10, 'Jepara'),
(100, 10, 'Karanganyar'),
(101, 10, 'Kebumen'),
(102, 10, 'Kendal'),
(103, 10, 'Klaten'),
(104, 10, 'Kudus'),
(105, 10, 'Magelang'),
(107, 10, 'Pati'),
(108, 10, 'Pekalongan'),
(109, 10, 'Pekalongan'),
(110, 10, 'Pemalang'),
(111, 10, 'Purbalingga'),
(112, 10, 'Purworejo'),
(113, 10, 'Rembang'),
(114, 10, 'Salatiga'),
(115, 10, 'Semarang'),
(117, 10, 'Sragen'),
(118, 10, 'Sukoharjo'),
(119, 10, 'Surakarta (Solo)'),
(120, 10, 'Tegal'),
(122, 10, 'Temanggung'),
(123, 10, 'Wonogiri'),
(124, 10, 'Wonosobo'),
(125, 11, 'Bangkalan'),
(126, 11, 'Banyuwangi'),
(127, 11, 'Batu'),
(128, 11, 'Blitar'),
(130, 11, 'Bojonegoro'),
(131, 11, 'Bondowoso'),
(132, 11, 'Gresik'),
(133, 11, 'Jember'),
(134, 11, 'Jombang'),
(136, 11, 'Kediri'),
(137, 11, 'Lamongan'),
(138, 11, 'Lumajang'),
(139, 11, 'Madiun'),
(141, 11, 'Magetan'),
(142, 11, 'Malang'),
(145, 11, 'Mojokerto'),
(146, 11, 'Nganjuk'),
(147, 11, 'Ngawi'),
(148, 11, 'Pacitan'),
(149, 11, 'Pamekasan'),
(150, 11, 'Pasuruan'),
(152, 11, 'Ponorogo'),
(154, 11, 'Probolinggo'),
(155, 11, 'Sampang'),
(156, 11, 'Sidoarjo'),
(157, 11, 'Situbondo'),
(158, 11, 'Sumenep'),
(159, 11, 'Surabaya'),
(160, 11, 'Trenggalek'),
(161, 11, 'Tuban'),
(162, 11, 'Tulungagung'),
(163, 12, 'Bengkayang'),
(164, 12, 'Kapuas Hulu'),
(165, 12, 'Kayong Utara'),
(166, 12, 'Ketapang'),
(167, 12, 'Kubu Raya'),
(168, 12, 'Landak'),
(169, 12, 'Melawi'),
(170, 12, 'Pontianak'),
(172, 12, 'Sambas'),
(173, 12, 'Sanggau'),
(174, 12, 'Sekadau'),
(175, 12, 'Singkawang'),
(176, 12, 'Sintang'),
(177, 13, 'Balangan'),
(178, 13, 'Banjar'),
(179, 13, 'Banjarbaru'),
(180, 13, 'Banjarmasin'),
(181, 13, 'Barito Kuala'),
(182, 13, 'Hulu Sungai Selatan'),
(183, 13, 'Hulu Sungai Tengah'),
(184, 13, 'Hulu Sungai Utara'),
(185, 13, 'Kotabaru'),
(186, 13, 'Tabalong'),
(187, 13, 'Tanah Bumbu'),
(188, 13, 'Tanah Laut'),
(189, 13, 'Tapin'),
(190, 14, 'Barito Selatan'),
(191, 14, 'Barito Timur'),
(192, 14, 'Barito Utara'),
(193, 14, 'Gunung Mas'),
(194, 14, 'Kapuas'),
(195, 14, 'Katingan'),
(196, 14, 'Kotawaringin Barat'),
(197, 14, 'Kotawaringin Timur'),
(198, 14, 'Lamandau'),
(199, 14, 'Murung Raya'),
(200, 14, 'Palangka Raya'),
(201, 14, 'Pulang Pisau'),
(202, 14, 'Seruyan'),
(203, 14, 'Sukamara'),
(204, 15, 'Balikpapan'),
(205, 15, 'Berau'),
(206, 15, 'Bontang'),
(207, 15, 'Kutai Barat'),
(208, 15, 'Kutai Kartanegara'),
(209, 15, 'Kutai Timur'),
(210, 15, 'Paser'),
(211, 15, 'Penajam Paser Utara'),
(212, 15, 'Samarinda'),
(213, 16, 'Bulungan (Bulongan)'),
(214, 16, 'Malinau'),
(215, 16, 'Nunukan'),
(216, 16, 'Tana Tidung'),
(217, 16, 'Tarakan'),
(218, 17, 'Batam'),
(219, 17, 'Bintan'),
(220, 17, 'Karimun'),
(221, 17, 'Kepulauan Anambas'),
(222, 17, 'Lingga'),
(223, 17, 'Natuna'),
(224, 17, 'Tanjung Pinang'),
(225, 18, 'Bandar Lampung'),
(226, 18, 'Lampung Barat'),
(227, 18, 'Lampung Selatan'),
(228, 18, 'Lampung Tengah'),
(229, 18, 'Lampung Timur'),
(230, 18, 'Lampung Utara'),
(231, 18, 'Mesuji'),
(232, 18, 'Metro'),
(233, 18, 'Pesawaran'),
(234, 18, 'Pesisir Barat'),
(235, 18, 'Pringsewu'),
(236, 18, 'Tanggamus'),
(237, 18, 'Tulang Bawang'),
(238, 18, 'Tulang Bawang Barat'),
(239, 18, 'Way Kanan'),
(240, 19, 'Ambon'),
(241, 19, 'Buru'),
(242, 19, 'Buru Selatan'),
(243, 19, 'Kepulauan Aru'),
(244, 19, 'Maluku Barat Daya'),
(245, 19, 'Maluku Tengah'),
(246, 19, 'Maluku Tenggara'),
(247, 19, 'Maluku Tenggara Barat'),
(248, 19, 'Seram Bagian Barat'),
(249, 19, 'Seram Bagian Timur'),
(250, 19, 'Tual'),
(251, 20, 'Halmahera Barat'),
(252, 20, 'Halmahera Selatan'),
(253, 20, 'Halmahera Tengah'),
(254, 20, 'Halmahera Timur'),
(255, 20, 'Halmahera Utara'),
(256, 20, 'Kepulauan Sula'),
(257, 20, 'Pulau Morotai'),
(258, 20, 'Ternate'),
(259, 20, 'Tidore Kepulauan'),
(260, 21, 'Aceh Barat'),
(261, 21, 'Aceh Barat Daya'),
(262, 21, 'Aceh Besar'),
(263, 21, 'Aceh Jaya'),
(264, 21, 'Aceh Selatan'),
(265, 21, 'Aceh Singkil'),
(266, 21, 'Aceh Tamiang'),
(267, 21, 'Aceh Tengah'),
(268, 21, 'Aceh Tenggara'),
(269, 21, 'Aceh Timur'),
(270, 21, 'Aceh Utara'),
(271, 21, 'Banda Aceh'),
(272, 21, 'Bener Meriah'),
(273, 21, 'Bireuen'),
(274, 21, 'Gayo Lues'),
(275, 21, 'Langsa'),
(276, 21, 'Lhokseumawe'),
(277, 21, 'Nagan Raya'),
(278, 21, 'Pidie'),
(279, 21, 'Pidie Jaya'),
(280, 21, 'Sabang'),
(281, 21, 'Simeulue'),
(282, 21, 'Subulussalam'),
(283, 22, 'Bima'),
(284, 22, 'Bima'),
(285, 22, 'Dompu'),
(286, 22, 'Lombok Barat'),
(287, 22, 'Lombok Tengah'),
(288, 22, 'Lombok Timur'),
(289, 22, 'Lombok Utara'),
(290, 22, 'Mataram'),
(291, 22, 'Sumbawa'),
(292, 22, 'Sumbawa Barat'),
(293, 23, 'Alor'),
(294, 23, 'Belu'),
(295, 23, 'Ende'),
(296, 23, 'Flores Timur'),
(297, 23, 'Kupang'),
(298, 23, 'Kupang'),
(299, 23, 'Lembata'),
(300, 23, 'Manggarai'),
(301, 23, 'Manggarai Barat'),
(302, 23, 'Manggarai Timur'),
(303, 23, 'Nagekeo'),
(304, 23, 'Ngada'),
(305, 23, 'Rote Ndao'),
(306, 23, 'Sabu Raijua'),
(307, 23, 'Sikka'),
(308, 23, 'Sumba Barat'),
(309, 23, 'Sumba Barat Daya'),
(310, 23, 'Sumba Tengah'),
(311, 23, 'Sumba Timur'),
(312, 23, 'Timor Tengah Selatan'),
(313, 23, 'Timor Tengah Utara'),
(314, 24, 'Asmat'),
(315, 24, 'Biak Numfor'),
(316, 24, 'Boven Digoel'),
(317, 24, 'Deiyai (Deliyai)'),
(318, 24, 'Dogiyai'),
(319, 24, 'Intan Jaya'),
(320, 24, 'Jayapura'),
(321, 24, 'Jayapura'),
(322, 24, 'Jayawijaya'),
(323, 24, 'Keerom'),
(324, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(325, 24, 'Lanny Jaya'),
(326, 24, 'Mamberamo Raya'),
(327, 24, 'Mamberamo Tengah'),
(328, 24, 'Mappi'),
(329, 24, 'Merauke'),
(330, 24, 'Mimika'),
(331, 24, 'Nabire'),
(332, 24, 'Nduga'),
(333, 24, 'Paniai'),
(334, 24, 'Pegunungan Bintang'),
(335, 24, 'Puncak'),
(336, 24, 'Puncak Jaya'),
(337, 24, 'Sarmi'),
(338, 24, 'Supiori'),
(339, 24, 'Tolikara'),
(340, 24, 'Waropen'),
(341, 24, 'Yahukimo'),
(342, 24, 'Yalimo'),
(343, 25, 'Fakfak'),
(344, 25, 'Kaimana'),
(345, 25, 'Manokwari'),
(346, 25, 'Manokwari Selatan'),
(347, 25, 'Maybrat'),
(348, 25, 'Pegunungan Arfak'),
(349, 25, 'Raja Ampat'),
(350, 25, 'Sorong'),
(351, 25, 'Sorong'),
(352, 25, 'Sorong Selatan'),
(353, 25, 'Tambrauw'),
(354, 25, 'Teluk Bintuni'),
(355, 25, 'Teluk Wondama'),
(356, 26, 'Bengkalis'),
(357, 26, 'Dumai'),
(358, 26, 'Indragiri Hilir'),
(359, 26, 'Indragiri Hulu'),
(360, 26, 'Kampar'),
(361, 26, 'Kepulauan Meranti'),
(362, 26, 'Kuantan Singingi'),
(363, 26, 'Pekanbaru'),
(364, 26, 'Pelalawan'),
(365, 26, 'Rokan Hilir'),
(366, 26, 'Rokan Hulu'),
(367, 26, 'Siak'),
(368, 27, 'Majene'),
(369, 27, 'Mamasa'),
(370, 27, 'Mamuju'),
(371, 27, 'Mamuju Utara'),
(372, 27, 'Polewali Mandar'),
(373, 28, 'Bantaeng'),
(374, 28, 'Barru'),
(375, 28, 'Bone'),
(376, 28, 'Bulukumba'),
(377, 28, 'Enrekang'),
(378, 28, 'Gowa'),
(379, 28, 'Jeneponto'),
(380, 28, 'Luwu'),
(381, 28, 'Luwu Timur'),
(382, 28, 'Luwu Utara'),
(383, 28, 'Makassar'),
(384, 28, 'Maros'),
(385, 28, 'Palopo'),
(386, 28, 'Pangkajene Kepulauan'),
(387, 28, 'Parepare'),
(388, 28, 'Pinrang'),
(389, 28, 'Selayar (Kepulauan Selayar)'),
(390, 28, 'Sidenreng Rappang/Rapang'),
(391, 28, 'Sinjai'),
(392, 28, 'Soppeng'),
(393, 28, 'Takalar'),
(394, 28, 'Tana Toraja'),
(395, 28, 'Toraja Utara'),
(396, 28, 'Wajo'),
(397, 29, 'Banggai'),
(398, 29, 'Banggai Kepulauan'),
(399, 29, 'Buol'),
(400, 29, 'Donggala'),
(401, 29, 'Morowali'),
(402, 29, 'Palu'),
(403, 29, 'Parigi Moutong'),
(404, 29, 'Poso'),
(405, 29, 'Sigi'),
(406, 29, 'Tojo Una-Una'),
(407, 29, 'Toli-Toli'),
(408, 30, 'Bau-Bau'),
(409, 30, 'Bombana'),
(410, 30, 'Buton'),
(411, 30, 'Buton Utara'),
(412, 30, 'Kendari'),
(413, 30, 'Kolaka'),
(414, 30, 'Kolaka Utara'),
(415, 30, 'Konawe'),
(416, 30, 'Konawe Selatan'),
(417, 30, 'Konawe Utara'),
(418, 30, 'Muna'),
(419, 30, 'Wakatobi'),
(420, 31, 'Bitung'),
(421, 31, 'Bolaang Mongondow (Bolmong)'),
(422, 31, 'Bolaang Mongondow Selatan'),
(423, 31, 'Bolaang Mongondow Timur'),
(424, 31, 'Bolaang Mongondow Utara'),
(425, 31, 'Kepulauan Sangihe'),
(426, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(427, 31, 'Kepulauan Talaud'),
(428, 31, 'Kotamobagu'),
(429, 31, 'Manado'),
(430, 31, 'Minahasa'),
(431, 31, 'Minahasa Selatan'),
(432, 31, 'Minahasa Tenggara'),
(433, 31, 'Minahasa Utara'),
(434, 31, 'Tomohon'),
(435, 32, 'Agam'),
(436, 32, 'Bukittinggi'),
(437, 32, 'Dharmasraya'),
(438, 32, 'Kepulauan Mentawai'),
(439, 32, 'Lima Puluh Koto/Kota'),
(440, 32, 'Padang'),
(441, 32, 'Padang Panjang'),
(442, 32, 'Padang Pariaman'),
(443, 32, 'Pariaman'),
(444, 32, 'Pasaman'),
(445, 32, 'Pasaman Barat'),
(446, 32, 'Payakumbuh'),
(447, 32, 'Pesisir Selatan'),
(448, 32, 'Sawah Lunto'),
(449, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(450, 32, 'Solok'),
(451, 32, 'Solok'),
(452, 32, 'Solok Selatan'),
(453, 32, 'Tanah Datar'),
(454, 33, 'Banyuasin'),
(455, 33, 'Empat Lawang'),
(456, 33, 'Lahat'),
(457, 33, 'Lubuk Linggau'),
(458, 33, 'Muara Enim'),
(459, 33, 'Musi Banyuasin'),
(460, 33, 'Musi Rawas'),
(461, 33, 'Ogan Ilir'),
(462, 33, 'Ogan Komering Ilir'),
(463, 33, 'Ogan Komering Ulu'),
(464, 33, 'Ogan Komering Ulu Selatan'),
(465, 33, 'Ogan Komering Ulu Timur'),
(466, 33, 'Pagar Alam'),
(467, 33, 'Palembang'),
(468, 33, 'Prabumulih'),
(469, 34, 'Asahan'),
(470, 34, 'Batu Bara'),
(471, 34, 'Binjai'),
(472, 34, 'Dairi'),
(473, 34, 'Deli Serdang'),
(474, 34, 'Gunungsitoli'),
(475, 34, 'Humbang Hasundutan'),
(476, 34, 'Karo'),
(477, 34, 'Labuhan Batu'),
(478, 34, 'Labuhan Batu Selatan'),
(479, 34, 'Labuhan Batu Utara'),
(480, 34, 'Langkat'),
(481, 34, 'Mandailing Natal'),
(482, 34, 'Medan'),
(483, 34, 'Nias'),
(484, 34, 'Nias Barat'),
(485, 34, 'Nias Selatan'),
(486, 34, 'Nias Utara'),
(487, 34, 'Padang Lawas'),
(488, 34, 'Padang Lawas Utara'),
(489, 34, 'Padang Sidempuan'),
(490, 34, 'Pakpak Bharat'),
(491, 34, 'Pematang Siantar'),
(492, 34, 'Samosir'),
(493, 34, 'Serdang Bedagai'),
(494, 34, 'Sibolga'),
(495, 34, 'Simalungun'),
(496, 34, 'Tanjung Balai'),
(497, 34, 'Tapanuli Selatan'),
(498, 34, 'Tapanuli Tengah'),
(499, 34, 'Tapanuli Utara'),
(500, 34, 'Tebing Tinggi'),
(501, 34, 'Toba Samosir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kurir`
--

CREATE TABLE `t_kurir` (
  `id_kurir` bigint(20) NOT NULL,
  `id_agen` bigint(20) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_kurir` enum('1','2') NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kurir`
--

INSERT INTO `t_kurir` (`id_kurir`, `id_agen`, `username`, `email`, `password`, `status_kurir`, `provinsi`, `kabupaten`) VALUES
(1, 1, 'Kurir Bantul', 'k_bantul@gmail.com', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', '2', 'DI Yogyakarta', 'Bantul'),
(2, 2, 'Kurir Yogyakarta', 'k_yogyakarta@gmail.com', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', '2', 'DI Yogyakarta', 'Yogyakarta'),
(3, 3, 'Kurir Sleman', 'k_sleman@gmail.com', '$2y$10$Wz3w7djqkOUT5ufDH2G0peljlrOs6MQnhwmrK0JuGzAlumexP10ju', '1', 'DI Yogyakarta', 'Sleman'),
(4, 4, 'Kurir Jakarta Pusat', 'k_jakarta_pusat@gmail.com', '$2y$10$X0wsyDzOEHkpPDKsv2EBSewm6BHzFOyPXR5lNjdrjxe0AUToTgI.O', '1', 'DKI Jakarta', 'Jakarta Pusat'),
(5, 5, 'Kurir Jakarta Utara', 'k_jakarta_utara@gmail.com', '$2y$10$tGZweCc/AjC5qs.4.lZL/urk6vuj9agKLPyACShzxujHDKWbAMd5a', '1', 'DKI Jakarta', 'Jakarta Utara'),
(6, 6, 'Kurir Jakarta Barat', 'k_jakarta_barat@gmail.com', '$2y$10$PL9nof.EH/pcKkdhzmsXKuljLjdUKLcEfYRoc3fBjqP0nE9fOisIe', '1', 'DKI Jakarta', 'Jakarta Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ongkir`
--

CREATE TABLE `t_ongkir` (
  `id_ongkir` bigint(20) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `jenis_layanan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `estimasi` varchar(255) NOT NULL,
  `berat` varchar(35) NOT NULL,
  `origin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_ongkir`
--

INSERT INTO `t_ongkir` (`id_ongkir`, `kota`, `kecamatan`, `jenis_layanan`, `harga`, `estimasi`, `berat`, `origin`) VALUES
(1, 'Bondowoso', 'Tamanan', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(2, 'Jember', 'Tanggul', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(3, 'Bondowoso', 'Tapen', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(4, 'Bondowoso', 'Tegalampel', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(5, 'Banyuwangi', 'Tegaldlimo', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(6, 'Banyuwangi', 'Tegalsari', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(7, 'Jember', 'Tempurejo', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(8, 'Bondowoso', 'Tenggarang', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(9, 'Bondowoso', 'Tlogosari', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(10, 'Jember', 'Umbulsari', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(11, 'Banyuwangi', 'Wongsorejo', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(12, 'Bondowoso', 'Wonosari', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(13, 'Bondowoso', 'Wringin', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(14, 'Jember', 'Wuluhan', 'REG', '45000', '7 - 8', '1', 'Yogyakarta'),
(15, 'Bantul', 'Bambanglipuro', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(16, 'Bantul', 'Banguntapan', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(17, 'Bantul', 'Bantul', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(18, 'Sleman', 'Berbah', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(19, 'Sleman', 'Cangkringan', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(20, 'Yogyakarta', 'Danurejan', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(21, 'Sleman', 'Depok', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(22, 'Bantul', 'Dlingo', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(23, 'Kulon Progo', 'Galur', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(24, 'Sleman', 'Gamping', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(25, 'Gunung Kidul', 'Gedangsari', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(26, 'Yogyakarta', 'Gedongtengen', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(27, 'Kulon Progo', 'Girimulyo', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(28, 'Gunung Kidul', 'Girisubo', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(29, 'Sleman', 'Godean', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(30, 'Yogyakarta', 'Gondokusuman', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(31, 'Yogyakarta', 'Gondomanan', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(32, 'Bantul', 'Imogiri', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(33, 'Bantul', 'Jetis', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(34, 'Yogyakarta', 'Jetis', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(35, 'Jakarta Pusat', 'Cempaka Putih', 'REG', '5000', '2 - 4', '1', 'Jakarta Pusat'),
(36, 'Jakarta Pusat', 'Gambir', 'REG', '4000', '2 - 3', '1', 'Jakarta Pusat'),
(37, 'Jakarta Pusat', 'Jakarta Pusat', 'REG', '8000', '2 - 3', '1', 'Jakarta Pusat'),
(38, 'Jakarta Pusat', 'Johar Baru', 'REG', '7000', '1 - 3', '1', 'Jakarta Pusat'),
(39, 'Jakarta Pusat', 'Kemayoran', 'REG', '5000', '1 - 4', '1', 'Jakarta Pusat'),
(40, 'Jakarta Pusat', 'Menteng', 'REG', '5000', '1 - 2', '1', 'Jakarta Pusat'),
(41, 'Jakarta Pusat', 'Sawah Besar', 'REG', '4000', '1 - 2', '1', 'Jakarta Pusat'),
(42, 'Jakarta Pusat', 'Senen', 'REG', '5000', '1 - 2', '1', 'Jakarta Pusat'),
(43, 'Jakarta Pusat', 'Tanah Abang', 'REG', '10000', '1 - 3', '1', 'Jakarta Pusat'),
(44, 'Jakarta Barat', 'Cengkareng', 'REG', '5000', '1 -3', '1', 'Jakarta Barat'),
(45, 'Jakarta Barat', 'Grogol', 'REG', '4000', '1 -3', '1', 'Jakarta Barat'),
(47, 'Jakarta Barat', 'Kalideres', 'REG', '7000', '1 -3', '1', 'Jakarta Barat'),
(48, 'Jakarta Barat', 'Kebon Jeruk', 'REG', '5000', '1 -3', '1', 'Jakarta Barat'),
(49, 'Jakarta Barat', 'Kembangan', 'REG', '5000', '1 -3', '1', 'Jakarta Barat'),
(50, 'Jakarta Barat', 'Palmerah', 'REG', '4000', '1 -3', '1', 'Jakarta Barat'),
(51, 'Jakarta Barat', 'Tamansari', 'REG', '5000', '1 -3', '1', 'Jakarta Barat'),
(52, 'Jakarta Barat', 'Tambora', 'REG', '10000', '1 -3', '1', 'Jakarta Barat'),
(53, 'Jakarta Utara', 'Cilincing', 'REG', '5000', '1 -3', '1', 'Jakarta Utara'),
(54, 'Jakarta Utara', 'Jakarta Utara', 'REG', '4000', '1 -3', '1', 'Jakarta Utara'),
(55, 'Jakarta Utara', 'Kelapa Gading', 'REG', '7000', '1 -3', '1', 'Jakarta Utara'),
(56, 'Jakarta Utara', 'Koja', 'REG', '5000', '1 -3', '1', 'Jakarta Utara'),
(57, 'Jakarta Utara', 'Pademangan', 'REG', '5000', '1 -3', '1', 'Jakarta Utara'),
(58, 'Jakarta Utara', 'Penjaringan', 'REG', '4000', '1 -3', '1', 'Jakarta Utara'),
(59, 'Jakarta Utara', 'Tanjung Priok', 'REG', '5000', '1 -3', '1', 'Jakarta Utara'),
(60, 'Jakarta Barat', 'Cengkareng', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(61, 'Jakarta Barat', 'Grogol', 'REG', '4000', '1 -3', '1', 'Yogyakarta'),
(62, 'Jakarta Barat', 'Kalideres', 'REG', '7000', '1 -3', '1', 'Yogyakarta'),
(63, 'Jakarta Barat', 'Kebon Jeruk', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(64, 'Jakarta Barat', 'Kembangan', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(65, 'Jakarta Barat', 'Palmerah', 'REG', '4000', '1 -3', '1', 'Yogyakarta'),
(66, 'Jakarta Barat', 'Tamansari', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(67, 'Jakarta Barat', 'Tambora', 'REG', '10000', '1 -3', '1', 'Yogyakarta'),
(68, 'Jakarta Utara', 'Cilincing', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(69, 'Jakarta Utara', 'Jakarta Utara', 'REG', '4000', '1 -3', '1', 'Yogyakarta'),
(70, 'Jakarta Utara', 'Kelapa Gading', 'REG', '7000', '1 -3', '1', 'Yogyakarta'),
(71, 'Jakarta Utara', 'Koja', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(72, 'Jakarta Utara', 'Pademangan', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(73, 'Jakarta Utara', 'Penjaringan', 'REG', '4000', '1 -3', '1', 'Yogyakarta'),
(74, 'Jakarta Utara', 'Tanjung Priok', 'REG', '5000', '1 -3', '1', 'Yogyakarta'),
(75, 'Jakarta Pusat', 'Cempaka Putih', 'REG', '5000', '1 - 2', '1', 'Yogyakarta'),
(76, 'Jakarta Pusat', 'Gambir', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(77, 'Jakarta Pusat', 'Jakarta Pusat', 'REG', '8000', '1 - 2', '1', 'Yogyakarta'),
(78, 'Jakarta Pusat', 'Johar Baru', 'REG', '7000', '1 - 2', '1', 'Yogyakarta'),
(79, 'Jakarta Pusat', 'Kemayoran', 'REG', '5000', '1 - 2', '1', 'Yogyakarta'),
(80, 'Jakarta Pusat', 'Menteng', 'REG', '5000', '1 - 2', '1', 'Yogyakarta'),
(81, 'Jakarta Pusat', 'Sawah Besar', 'REG', '4000', '1 - 2', '1', 'Yogyakarta'),
(82, 'Jakarta Pusat', 'Senen', 'REG', '5000', '1 - 2', '1', 'Yogyakarta'),
(83, 'Jakarta Pusat', 'Tanah Abang', 'REG', '10000', '1 - 2', '1', 'Yogyakarta'),
(84, 'Bantul', 'Bambanglipuro', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(85, 'Bantul', 'Banguntapan', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(86, 'Bantul', 'Bantul', 'REG', '4000', '4 - 5', '1', 'Jakarta Pusat'),
(87, 'Sleman', 'Berbah', 'REG', '8000', '5 - 6', '1', 'Jakarta Pusat'),
(88, 'Sleman', 'Cangkringan', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(89, 'Yogyakarta', 'Danurejan', 'REG', '4000', '4 - 5', '1', 'Jakarta Pusat'),
(90, 'Sleman', 'Depok', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(91, 'Bantul', 'Dlingo', 'REG', '8000', '5 - 6', '1', 'Jakarta Pusat'),
(92, 'Kulon Progo', 'Galur', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(93, 'Sleman', 'Gamping', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(94, 'Gunung Kidul', 'Gedangsari', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(95, 'Yogyakarta', 'Gedongtengen', 'REG', '4000', '5 - 6', '1', 'Jakarta Pusat'),
(96, 'Kulon Progo', 'Girimulyo', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(97, 'Gunung Kidul', 'Girisubo', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(98, 'Sleman', 'Godean', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(99, 'Yogyakarta', 'Gondokusuman', 'REG', '4000', '5 - 6', '1', 'Jakarta Pusat'),
(100, 'Yogyakarta', 'Gondomanan', 'REG', '4000', '4 - 5', '1', 'Jakarta Pusat'),
(101, 'Bantul', 'Imogiri', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(102, 'Bantul', 'Jetis', 'REG', '8000', '4 - 5', '1', 'Jakarta Pusat'),
(103, 'Yogyakarta', 'Jetis', 'REG', '4000', '5 - 6', '1', 'Jakarta Pusat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_provinsi`
--

CREATE TABLE `t_provinsi` (
  `id_provinsi` bigint(20) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_provinsi`
--

INSERT INTO `t_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tracking`
--

CREATE TABLE `t_tracking` (
  `id_tracking` bigint(20) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status_tracking` enum('Dijemput Kurir','Diterima Kurir','Diterima Agen Kota Asal','Diproses Agen Kota Asal','Diterima Drop Point Kota Asal','Dikirim ke Drop Point Kota Tujuan','Diterima Drop Point Kota Tujuan','Diantar Kurir Ke Alamat Tujuan','Diterima Agen Kota Tujuan','Diantar Kurir Ke Alamat Tujuan','Paket Diterima','Dikirim ke Agen Kota Tujuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tracking`
--

INSERT INTO `t_tracking` (`id_tracking`, `no_resi`, `tanggal`, `status_tracking`) VALUES
(1, 'RES15092018836062', '2018-09-15 00:00:00', 'Dijemput Kurir'),
(2, 'RES15092018836062', '2018-09-15 00:00:00', 'Diterima Kurir'),
(3, 'RES15092018836062', '2018-09-15 00:00:00', 'Diterima Agen Kota Asal'),
(5, 'RES210920181027002', '2018-09-21 10:40:01', 'Dijemput Kurir'),
(6, 'RES210920181027002', '2018-09-21 10:41:27', 'Diterima Kurir'),
(7, 'RES210920181027002', '2018-09-21 11:15:20', 'Dijemput Kurir'),
(8, 'RES210920181027002', '2018-09-21 11:15:43', 'Diterima Kurir'),
(9, 'RES210920181027002', '2018-09-21 00:00:00', 'Diterima Agen Kota Asal'),
(10, 'RES210920181027002', '2018-09-21 11:25:12', 'Diproses Agen Kota Asal'),
(11, 'RES210920181027002', '2018-09-21 00:00:00', 'Diterima Drop Point Kota Asal'),
(12, 'RES210920181027002', '2018-09-21 00:00:00', 'Dikirim ke Drop Point Kota Tujuan'),
(13, 'RES210920181027002', '2018-09-21 00:00:00', 'Diterima Drop Point Kota Tujuan'),
(14, 'RES210920181027002', '2018-09-21 00:00:00', 'Dikirim ke Agen Kota Tujuan'),
(15, 'RES210920181027002', '2018-09-21 00:00:00', 'Diterima Agen Kota Tujuan'),
(16, 'RES210920181027002', '2018-09-21 11:50:12', 'Diantar Kurir Ke Alamat Tujuan'),
(17, 'RES210920181027002', '2018-09-21 11:50:22', 'Paket Diterima'),
(18, 'RES26092018858192', '2018-09-26 08:59:13', 'Dijemput Kurir'),
(19, 'RES26092018858192', '2018-09-26 08:59:21', 'Diterima Kurir'),
(20, 'RES26092018858192', '2018-09-26 00:00:00', 'Diterima Agen Kota Asal'),
(21, 'RES26092018858192', '2018-09-26 09:57:21', 'Diproses Agen Kota Asal'),
(22, 'RES26092018858192', '2018-09-26 00:00:00', 'Diterima Drop Point Kota Asal'),
(23, 'RES26092018858192', '2018-09-26 11:06:41', 'Diterima Drop Point Kota Asal'),
(24, 'RES26092018858192', '2018-09-26 11:09:00', 'Diterima Drop Point Kota Asal'),
(25, 'RES26092018858192', '2018-09-26 11:10:29', 'Diterima Drop Point Kota Asal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kurir_penjemput` bigint(20) NOT NULL,
  `kurir_pengantar` bigint(20) NOT NULL,
  `agen_asal` bigint(20) NOT NULL,
  `agen_tujuan` bigint(20) NOT NULL,
  `dp_asal` bigint(20) NOT NULL,
  `dp_tujuan` bigint(20) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `berat` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `jenis_layanan` varchar(35) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `provinsi_tujuan` varchar(35) NOT NULL,
  `kabupaten_tujuan` varchar(35) NOT NULL,
  `kecamatan_tujuan` varchar(35) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `no_tlp` varchar(35) NOT NULL,
  `status_transaksi` enum('Menunggu','Dijemput','Diterima','Ditolak','Selesai') NOT NULL,
  `status_kurir` enum('Belum','Proses','Selesai') NOT NULL,
  `dp_kirim` enum('Belum Dikirim','Sudah Dikirim') NOT NULL,
  `dp_jemput` enum('belum','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_user`, `kurir_penjemput`, `kurir_pengantar`, `agen_asal`, `agen_tujuan`, `dp_asal`, `dp_tujuan`, `tgl_pengiriman`, `no_resi`, `berat`, `panjang`, `lebar`, `tinggi`, `jenis_layanan`, `total_biaya`, `nama`, `provinsi_tujuan`, `kabupaten_tujuan`, `kecamatan_tujuan`, `alamat`, `kode_pos`, `no_tlp`, `status_transaksi`, `status_kurir`, `dp_kirim`, `dp_jemput`) VALUES
(2, 2, 0, 0, 0, 0, 0, 0, '2018-09-19', 'RES19092018922502', 1, 40, 30, 30, 'REG', 48000, 'Arfian', 'DI Yogyakarta', 'Bantul', 'Banguntapan', 'Banguntapan, Bantul', 55283, '08995413121', 'Menunggu', 'Belum', 'Belum Dikirim', 'belum'),
(3, 2, 0, 0, 0, 0, 0, 0, '2018-09-19', 'RES19092018929512', 20, 0, 0, 0, 'REG', 160000, 'Wahyu', 'DI Yogyakarta', 'Bantul', 'Jetis', 'Desa Jetis', 55283, '08995413121', 'Menunggu', 'Belum', 'Belum Dikirim', 'belum'),
(4, 2, 0, 0, 0, 0, 0, 0, '2018-09-19', 'RES190920181045032', 2000, 0, 0, 0, 'REG', 16000, 'Sri Lestari', 'DI Yogyakarta', 'Bantul', 'Banguntapan', 'Banguntapan ', 55283, '08995413121', 'Menunggu', 'Belum', 'Belum Dikirim', 'belum'),
(5, 2, 0, 0, 0, 0, 0, 0, '2018-09-19', 'RES190920181119332', 20, 0, 0, 0, 'REG', 160, 'Wahyu', 'DI Yogyakarta', 'Bantul', 'Banguntapan', 'dzfsdf', 55283, '0899541311', 'Menunggu', 'Belum', 'Belum Dikirim', 'belum'),
(6, 2, 0, 0, 0, 0, 0, 0, '2018-09-19', 'RES190920181124572', 20, 0, 0, 0, 'REG', 80, 'asdasd', 'DI Yogyakarta', 'Yogyakarta', 'Gondomanan', 'asdasd', 55283, '0899541311', 'Menunggu', 'Belum', 'Belum Dikirim', 'belum'),
(7, 2, 2, 4, 2, 4, 2, 1, '2018-09-21', 'RES210920181027002', 2000, 0, 0, 0, 'REG', 10000, 'Nila', 'DKI Jakarta', 'Jakarta Pusat', 'Menteng', 'Menteng RT6, RW2', 55283, '0899541311', 'Selesai', 'Selesai', 'Sudah Dikirim', 'selesai'),
(8, 2, 2, 0, 2, 0, 2, 0, '2018-09-26', 'RES26092018858192', 1001, 0, 0, 0, 'REG', 5000, 'Dono', 'DKI Jakarta', 'Jakarta Pusat', 'Kemayoran', 'Jalan Kemayoran', 12345, '08123456789', 'Diterima', 'Selesai', 'Belum Dikirim', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksidp`
--

CREATE TABLE `t_transaksidp` (
  `id_transaksidp` bigint(20) NOT NULL,
  `asal` bigint(20) NOT NULL,
  `tujuan` bigint(20) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_sampai` date NOT NULL,
  `status_tdp` enum('baru','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksidp`
--

INSERT INTO `t_transaksidp` (`id_transaksidp`, `asal`, `tujuan`, `tgl_kirim`, `tgl_sampai`, `status_tdp`) VALUES
(1, 2, 1, '2018-09-21', '2018-09-21', 'selesai'),
(2, 1, 1, '2018-09-21', '0000-00-00', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksidpagen`
--

CREATE TABLE `t_transaksidpagen` (
  `id_transaksidpagen` bigint(20) NOT NULL,
  `asal` bigint(20) NOT NULL,
  `tujuan` bigint(20) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_sampai` date NOT NULL,
  `status_tdpagen` enum('baru','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksidpagen`
--

INSERT INTO `t_transaksidpagen` (`id_transaksidpagen`, `asal`, `tujuan`, `tgl_kirim`, `tgl_sampai`, `status_tdpagen`) VALUES
(1, 1, 4, '2018-09-21', '2018-09-21', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksidpagendetail`
--

CREATE TABLE `t_transaksidpagendetail` (
  `id_transaksidetaildpagen` bigint(20) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `id_transaksidpagen` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksidpagendetail`
--

INSERT INTO `t_transaksidpagendetail` (`id_transaksidetaildpagen`, `no_resi`, `id_transaksidpagen`) VALUES
(1, 'RES210920181027002', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksidpdetail`
--

CREATE TABLE `t_transaksidpdetail` (
  `id_transaksidpdetail` bigint(20) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `id_transaksidp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksidpdetail`
--

INSERT INTO `t_transaksidpdetail` (`id_transaksidpdetail`, `no_resi`, `id_transaksidp`) VALUES
(1, 'RES210920181027002', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` bigint(20) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_user` enum('1','2') NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `email`, `password`, `status_user`, `provinsi`, `kabupaten`, `alamat`) VALUES
(1, 'User Bantul', 'u_bantul@gmail.com', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', '2', 'DI Yogyakarta', 'Bantul', ''),
(2, 'User Yogyakarta', 'u_yogyakarta@gmail.com', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', '1', 'DI Yogyakarta', 'Yogyakarta', 'jalan pemuda no 1'),
(3, 'User Sleman', 'u_sleman@gmail.com', '$2y$10$a3BBnM31xGvr7E81asQBY.V8KosNm9giM3WchPF1iw4LNKM.J5Fca', '1', 'DI Yogyakarta', 'Sleman', ''),
(4, 'User Jakarta Pusat', 'u_jakarta_pusat@gmail.com', '$2y$10$Ojn3bpD436MONFEYjoHOw.eUdMRdkbuJWJ/u4DrfwPftCQOGkOC3C', '1', 'DKI Jakarta', 'Jakarta Pusat', ''),
(5, 'User Jakarta Barat', 'u_jakarta_barat@gmail.com', '$2y$10$O9/m9naZotDtwlB7mcj4g.qj/9HTsMsl.YxK8SIc8xHUUTrOrsoMi', '1', 'DKI Jakarta', 'Jakarta Barat', ''),
(6, 'User Jakarta Utara', 'u_jakarta_utara@gmail.com', '$2y$10$yF/Ydv6RQ5r2jW4nioCNYuavJCVP0tGAvRdtbJjEUTJfBLwPvRkmO', '1', 'DKI Jakarta', 'Jakarta Utara', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_agen`
--
ALTER TABLE `t_agen`
  ADD PRIMARY KEY (`id_agen`);

--
-- Indeks untuk tabel `t_agen_dp`
--
ALTER TABLE `t_agen_dp`
  ADD PRIMARY KEY (`id_agen_dp`);

--
-- Indeks untuk tabel `t_agen_dp_detail`
--
ALTER TABLE `t_agen_dp_detail`
  ADD PRIMARY KEY (`id_agen_dp_detail`);

--
-- Indeks untuk tabel `t_dp`
--
ALTER TABLE `t_dp`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indeks untuk tabel `t_kecamatan`
--
ALTER TABLE `t_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `t_kota`
--
ALTER TABLE `t_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `t_kurir`
--
ALTER TABLE `t_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `t_ongkir`
--
ALTER TABLE `t_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `t_provinsi`
--
ALTER TABLE `t_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `t_tracking`
--
ALTER TABLE `t_tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indeks untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `t_transaksidp`
--
ALTER TABLE `t_transaksidp`
  ADD PRIMARY KEY (`id_transaksidp`);

--
-- Indeks untuk tabel `t_transaksidpagen`
--
ALTER TABLE `t_transaksidpagen`
  ADD PRIMARY KEY (`id_transaksidpagen`);

--
-- Indeks untuk tabel `t_transaksidpagendetail`
--
ALTER TABLE `t_transaksidpagendetail`
  ADD PRIMARY KEY (`id_transaksidetaildpagen`);

--
-- Indeks untuk tabel `t_transaksidpdetail`
--
ALTER TABLE `t_transaksidpdetail`
  ADD PRIMARY KEY (`id_transaksidpdetail`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_agen`
--
ALTER TABLE `t_agen`
  MODIFY `id_agen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_agen_dp`
--
ALTER TABLE `t_agen_dp`
  MODIFY `id_agen_dp` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_agen_dp_detail`
--
ALTER TABLE `t_agen_dp_detail`
  MODIFY `id_agen_dp_detail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_dp`
--
ALTER TABLE `t_dp`
  MODIFY `id_dp` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_kecamatan`
--
ALTER TABLE `t_kecamatan`
  MODIFY `id_kecamatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `t_kota`
--
ALTER TABLE `t_kota`
  MODIFY `id_kota` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `t_kurir`
--
ALTER TABLE `t_kurir`
  MODIFY `id_kurir` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_ongkir`
--
ALTER TABLE `t_ongkir`
  MODIFY `id_ongkir` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `t_tracking`
--
ALTER TABLE `t_tracking`
  MODIFY `id_tracking` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_transaksidp`
--
ALTER TABLE `t_transaksidp`
  MODIFY `id_transaksidp` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_transaksidpagen`
--
ALTER TABLE `t_transaksidpagen`
  MODIFY `id_transaksidpagen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_transaksidpagendetail`
--
ALTER TABLE `t_transaksidpagendetail`
  MODIFY `id_transaksidetaildpagen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_transaksidpdetail`
--
ALTER TABLE `t_transaksidpdetail`
  MODIFY `id_transaksidpdetail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
