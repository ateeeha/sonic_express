-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Agu 2018 pada 13.26
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
  `status_admin` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `password`, `level`, `email`, `status_login`, `status_admin`) VALUES
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
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_dp` enum('1','2') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `t_dp`
--

INSERT INTO `t_dp` (`id_dp`, `username`, `email`, `provinsi`, `kabupaten`, `password`, `status_dp`) VALUES
(1, 'Drop Point', 'dp@gmail.com', 'DI Yogyakarta', 'Bantul', '$2y$10$BgEiw8qXzP2qhnKNVZyMqu7Pqn6sGqwoDfxULlro04igXiCAluIc2', '2'),
(3, 'Drop Point 2', 'dp2@gmail.com', 'DI Yogyakarta', 'Bantul', '$2y$10$BgEiw8qXzP2qhnKNVZyMqu7Pqn6sGqwoDfxULlro04igXiCAluIc2', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kota`
--

CREATE TABLE IF NOT EXISTS `t_kota` (
`id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kota` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=502 ;

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

CREATE TABLE IF NOT EXISTS `t_kurir` (
`id_kurir` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_kurir` enum('1','2') NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_kurir`
--

INSERT INTO `t_kurir` (`id_kurir`, `username`, `email`, `password`, `status_kurir`, `provinsi`, `kabupaten`) VALUES
(2, 'kurir', 'kurir@gmail.com', '$2y$10$1K5u4PpSDIdVjN/KZvzPOuTnAgALiClSofKvsBts.wlNwer2q1Cne', '2', 'DI Yogyakarta', 'Bantul'),
(3, 'kurir2', 'kurir2@gmail.com', '$2y$10$hgHi/hNIJhmEyUMTKmgX3.ZLDK3iNHSahSEn/Gaafnt/SDrrya7Eu', '1', 'DIY', 'Sleman'),
(5, 'kurir3', 'kurir3@gmail.com', '$2y$10$bKZQQfUCWTK.yJ0YeQCeBONhKeaEcHxxgW2GD3tkUWf7Z3qA3co6q', '2', 'DIY', 'Bantul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_provinsi`
--

CREATE TABLE IF NOT EXISTS `t_provinsi` (
  `id_provinsi` int(11) NOT NULL,
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

CREATE TABLE IF NOT EXISTS `t_tracking` (
`id_tracking` int(11) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status_tracking` enum('Dijemput Kurir','Diterima Kurir','Diterima Drop Point Kota Asal','Dikirim ke Drop Point Kota Tujuan','Diterima Drop Point Kota Tujuan','Diantar Kurir Ke Alamat Tujuan','Paket Diterima') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `t_tracking`
--

INSERT INTO `t_tracking` (`id_tracking`, `no_resi`, `tanggal`, `status_tracking`) VALUES
(5, 'RES160820181218494', '2018-08-16', 'Dijemput Kurir'),
(6, 'RES160820181218494', '2018-08-16', 'Diterima Kurir'),
(7, 'RES16082018249444', '2018-08-16', 'Diterima Kurir'),
(8, 'RES16082018254494', '2018-08-18', 'Diterima Drop Point Kota Asal'),
(9, 'RES160820181218494', '2018-08-18', 'Diterima Drop Point Kota Asal'),
(10, 'RES16082018254494', '2018-08-18', 'Diterima Drop Point Kota Asal'),
(11, 'RES160820181218494', '2018-08-18', 'Diterima Drop Point Kota Asal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE IF NOT EXISTS `t_transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kurir_penjemput` int(11) NOT NULL,
  `kurir_pengantar` int(11) NOT NULL,
  `dp_asal` int(11) NOT NULL,
  `dp_tujuan` int(11) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `no_tlp` varchar(35) NOT NULL,
  `status_transaksi` enum('Menunggu','Dijemput','Diterima','Ditolak','Selesai') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_user`, `kurir_penjemput`, `kurir_pengantar`, `dp_asal`, `dp_tujuan`, `tgl_pengiriman`, `no_resi`, `nama`, `alamat`, `kode_pos`, `no_tlp`, `status_transaksi`) VALUES
(2, 4, 2, 0, 3, 0, '2018-08-16', 'RES160820181218494', 'Wahyu', 'Jrakah Kaliurang Srumbung', 55283, '08995413121', 'Diterima'),
(4, 4, 2, 0, 0, 0, '2018-08-16', 'RES16082018248154', 'Sodiq', 'jrakah kaliurang srumbung magelang', 55283, '08995413121', 'Ditolak'),
(5, 4, 2, 0, 0, 0, '2018-08-16', 'RES16082018249444', 'Sodiq', 'jrakah kaliurang srumbung magelang', 55283, '08995413121', 'Menunggu'),
(6, 4, 2, 0, 1, 0, '2018-08-16', 'RES16082018254494', 'Anton her', 'jrakah kaliurang sumbung magelang', 55283, '08995413121', 'Diterima'),
(7, 4, 2, 0, 0, 0, '2018-08-16', 'RES16082018317424', 'Dino', 'jrakah kaliurang sumbung', 55283, '08995413121', 'Selesai');

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
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `email`, `password`, `status_user`, `provinsi`, `kabupaten`) VALUES
(4, 'Marijan', 'user@gmail.com', '$2y$10$KJOO7YJjNnYG0nDiG8G6teGnk8SNdAinHmv5faZdwpi/3s4QyNQV2', '1', 'DI Yogyakarta', 'Bantul'),
(5, 'Handoyo', 'user2@gmail.com', '$2y$10$QZhiwI./m01FBhlpS6qWEe.0cCUxvXDstwIG5/eKpYZBhDqsFw4cW', '1', 'DI Yogyakarta', 'Bantul');

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
MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=502;
--
-- AUTO_INCREMENT for table `t_kurir`
--
ALTER TABLE `t_kurir`
MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_tracking`
--
ALTER TABLE `t_tracking`
MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
