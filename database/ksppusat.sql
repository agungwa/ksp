-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2019 at 08:06 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksp_sidomukti`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahliwarissimkesan`
--

CREATE TABLE `ahliwarissimkesan` (
  `aws_id` int(10) NOT NULL,
  `sik_kode` varchar(25) NOT NULL COMMENT 'fk dari simkesan',
  `aws_noid` varchar(30) DEFAULT NULL,
  `aws_jenisid` varchar(15) DEFAULT NULL,
  `aws_nama` varchar(50) NOT NULL,
  `aws_alamat` text NOT NULL,
  `aws_hubungan` varchar(30) NOT NULL,
  `aws_lampiran` text DEFAULT NULL,
  `aws_tgl` datetime NOT NULL,
  `aws_flag` tinyint(2) NOT NULL,
  `aws_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahliwarissimkesan`
--

INSERT INTO `ahliwarissimkesan` (`aws_id`, `sik_kode`, `aws_noid`, `aws_jenisid`, `aws_nama`, `aws_alamat`, `aws_hubungan`, `aws_lampiran`, `aws_tgl`, `aws_flag`, `aws_info`) VALUES
(1, 'KE210719001', NULL, NULL, 'Budiyono', 'Kaliangkrik', 'Suami', 'suami', '2019-07-21 19:55:11', 0, ''),
(2, 'KE120819001', '503030490930', 'KTP', 'Japari', 'Ngadirejo, Temanggung', 'Keluarga', 'Tidak ada', '2019-08-12 07:36:02', 0, ''),
(3, 'KE120819002', '4322323', 'KTP', 'Haris', 'Magelang', 'Keluarga', 'Tidak Ada', '2019-08-12 08:18:28', 0, ''),
(4, 'KE240819001', '332307', 'KTP', 'herlin', 'sawahan tegalsari', 'adikl kandung', 'lengkap', '2019-08-24 14:06:44', 0, ''),
(5, 'KE240819002', '332307', 'KTP', 'supini', 'bulu temanggung', 'Orang Tua', 'lengkap', '2019-08-24 14:12:09', 0, ''),
(6, 'KE240819003', '332307', 'KTP', 'Misdi', 'kedu', 'Orang Tua', 'lengkap', '2019-08-24 14:14:07', 0, ''),
(7, 'KE260819001', '332307', 'KTP', 'titik', 'parakan temanggung', 'Orang Tua', 'lengkap', '2019-08-26 13:00:41', 0, ''),
(8, 'KE290819001', '332307', 'KTP', 'herlin', 'parakan temanggung', 'anak', 'lengkap', '2019-08-29 13:55:58', 0, ''),
(9, 'KE290819002', '332307', 'KTP', 'titik', 'traji', 'Orang Tua', 'kurang ktp ahli waris\r\n', '2019-08-29 14:00:31', 0, ''),
(10, 'KE310819001', '332307', 'KTP', 'titik', 'parakan temanggung', 'Orang Tua', 'lengkap', '2019-08-31 12:09:55', 0, ''),
(11, 'KE310819001', '332307', 'KTP', 'herlin', 'ngadirejo', 'adik', 'lengkap', '2019-08-31 12:49:41', 0, ''),
(12, 'KE310819002', '332307', 'KTP', 'supini', 'parakan temanggung', 'Orang Tua', 'lengkap', '2019-08-31 12:52:35', 0, ''),
(13, 'KE310819003', '332307', 'KTP', 'susi', 'parakan ', 'Orang Tua', 'kurang ktp ahli waris', '2019-08-31 12:55:01', 0, ''),
(14, 'KE310819004', '332307', 'KTP', 'herlin', 'sawahan tegalsari', 'adik', 'lengkap', '2019-08-31 12:58:07', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ang_no` varchar(15) NOT NULL,
  `ang_nama` varchar(50) NOT NULL,
  `ang_alamat` text NOT NULL,
  `ang_noktp` varchar(25) DEFAULT NULL,
  `ang_nokk` varchar(25) DEFAULT NULL,
  `ang_nohp` varchar(15) DEFAULT NULL,
  `ang_tempatlahir` varchar(35) DEFAULT NULL,
  `ang_tgllahir` date NOT NULL,
  `ang_status` tinyint(1) NOT NULL,
  `ang_tgl` datetime NOT NULL,
  `ang_flag` tinyint(2) NOT NULL,
  `ang_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ang_no`, `ang_nama`, `ang_alamat`, `ang_noktp`, `ang_nokk`, `ang_nohp`, `ang_tempatlahir`, `ang_tgllahir`, `ang_status`, `ang_tgl`, `ang_flag`, `ang_info`) VALUES
('K020919001', 'Bariyah', ' Dsn Gandu Kulon 1/2 Gondang Winangun Ngadirejo', '3323097112560089', '332309', '81225708171', NULL, '1956-07-20', 1, '2019-09-02 13:59:30', 0, ''),
('K020919002', 'SITI ROKHIMAH', 'NGADIPRONO 3/7 NGADIMULYO KEDU ', '3323017008910001', '', '', NULL, '1991-08-30', 1, '2019-09-02 11:55:17', 0, ''),
('K020919003', 'KHUSNUL KHOTIMAH', 'MARGOSARI 011/005 ROWO KANDANGAN ', '3323066301870003', '', '', NULL, '1987-01-23', 1, '2019-09-02 12:18:22', 0, ''),
('K020919004', 'Slamet Rochman', 'margosari 11/005 rowo kandnagan ', '', '', '', NULL, '1991-12-05', 1, '2019-09-02 12:24:14', 0, ''),
('K020919005', 'Warni', 'Ds. kabunan 9/1 bandunggede kedu ', '3323075207570004', '', '', NULL, '1957-07-12', 1, '2019-09-02 12:27:38', 0, ''),
('K020919006', 'parsilah', 'mulyo 3/1 pandemulyo buliu ', '3323016905760003', '', '', NULL, '1976-05-29', 1, '2019-09-02 12:31:52', 0, ''),
('K020919007', 'DWI ARIYANI', 'DSN. TEGALSARI 3/2 WADAS KANDANGAN ', '3323066102890002', '', '', NULL, '1983-02-21', 1, '2019-09-02 12:38:52', 0, ''),
('K020919008', 'FITRI ANGGRAENI', 'DIWEKAN 2/1 GLAPANSARI PARAKAN ', '3323085808920003', '', '', NULL, '1992-08-18', 1, '2019-09-02 12:41:53', 0, ''),
('K020919009', 'INDRA LESTARI', 'DS. GLAPANSARI 1/3 GLAPANSARI PARAKAN ', '3323085312920002', '', '', NULL, '1992-12-13', 1, '2019-09-02 12:46:49', 0, ''),
('K020919010', 'WARSITI', ' Jagalan Rt 03/ Rw 02 Jumo, Teamnggung', '3323', '3323', '085228223711', NULL, '2019-09-02', 1, '2019-09-02 13:05:59', 0, ''),
('K020919011', 'NARWITO', 'Garung Rt 14/ Rw 05 Butuh Kalikajar', '3307072509510001', '3323', '08', NULL, '1951-09-25', 1, '2019-09-02 13:23:36', 0, ''),
('K020919012', 'Septi Dwi R', ' Kerokan Rt 02/ Rw 01 Kutoanyar Kedu', '3323', '3323', '087734202339', NULL, '1987-09-18', 1, '2019-09-02 13:33:05', 0, ''),
('K020919013', 'Nguwaljiwanto', ' Bongos Rt 03/ Rw 01 Jumo', '3323101610680001', '3323', '081392931614', NULL, '1968-10-16', 1, '2019-09-02 13:44:54', 0, ''),
('K020919014', 'NURMA SETIYONO', 'KALIDUREN 2/7 NGADISEPI GEMAWANG ', '890914570681', '', '', NULL, '1989-09-11', 1, '2019-09-02 13:55:57', 0, ''),
('K020919015', 'SURYATI', 'KRAJAN WETAN 4/1 GIYONO JUMO ', '3323', '', '', NULL, '1991-05-12', 1, '2019-09-02 13:59:44', 0, ''),
('K020919029', 'NARWITO', ' Garung Rt 14/ Rw 05 Butuh Kalikajar', '3307072509500001', '3323', '08', 'Wonosobo', '1951-09-25', 1, '2019-09-02 12:56:02', 0, ''),
('K020919030', 'FATKUROCHMAN', 'Ds. Ngasian Rt 05/ Rw 06 Sucen Gemawang', '3323', '3323', '085292149263', 'Temanggung', '2019-09-03', 1, '2019-09-03 13:01:17', 0, ''),
('K030919016', 'Tumirah', 'Ds. Garon 1/5 purbosari ngadirejo ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-03 12:20:32', 0, ''),
('K030919017', 'Lina indrawati', 'grogol 2/2 kutoanyar kedu ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-03 12:26:41', 0, ''),
('K030919018', 'sri wahyuni', 'ds. tegalsari 2/1 wadas kandnagan ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-03 12:29:11', 0, ''),
('K030919019', 'Rohmadi', ' Dsn Bandung 3/6 Bandunggede Kedu', '3323072110840002', '3323072402073191', '081327035655', 'Temanggung', '1984-10-21', 1, '2019-09-03 12:42:27', 2, ''),
('K030919020', 'Tentrem mujiyati', 'krajan timur 3/3 karangtejo kedu ', '3323076506660003', '', '', 'Temanggung', '1966-06-25', 1, '2019-09-03 12:44:35', 0, ''),
('K030919021', 'Rozzak Ardiyanto', 'bero 2/1 caruban kandangan ', '3323060204020002', '', '', 'Temanggung', '2002-04-02', 1, '2019-09-03 12:50:14', 0, ''),
('K030919022', 'murni', 'tanjungan 6/5 kembangsari kandangan ', '3404015510720009', '', '', 'Temanggung', '1972-10-15', 1, '2019-09-03 12:54:22', 0, ''),
('K030919023', 'OKTO KHARISMA PUTRI', 'DSN. KRAJAN WETAN 4/1 GIYONO JUMO ', '3323104510980001', '', '', 'Temanggung', '1998-10-05', 1, '2019-09-03 13:01:38', 0, ''),
('K030919024', 'Riyati', 'sukosarono 2/2 jombor jumo ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-03 13:03:30', 0, ''),
('K030919025', 'Diana dewi', 'Ds. Krajan 7/1 petirejo ngadirejo', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-03 13:06:32', 0, ''),
('K030919026', 'Bothok paryuni', 'kenteng 3/5 pagersari tlogomulyo ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-03 13:10:19', 0, ''),
('K030919031', 'KASIATI', 'Reco Rt 12/ Rw 09 Reco Kertek ', '3323', '3323', '08', 'Wonosobo', '2019-09-02', 1, '2019-09-03 13:05:26', 0, ''),
('K030919032', 'MAHYUNANI', ' Anggurgondok Rt 02/ Rw 03 Reco Kertek ', '3307084505730005', '3323', '08', 'Wonosobo', '1973-05-05', 1, '2019-09-03 13:08:47', 1, ''),
('K030919033', 'BADRIYAH', 'Ds. grogol Rt 02/ Rw 02Kutoanyar', '3323', '3323', '08', 'Temanggung', '1969-09-30', 1, '2019-09-03 13:12:29', 0, ''),
('K030919034', 'WIWIK ZUMROTUN', ' Krajan II Rt 02/ Rw 01 Kandangan', '3323', '3323', '08', 'Temanggung', '2019-09-04', 1, '2019-09-04 13:15:48', 0, ''),
('K040919035', 'SRIYATI JIL RAHAYU', ' Panjangsari Baru Rt 03/ Rw 10 Parakan', '3323', '3323', '08', 'Temanggung', '2019-09-04', 1, '2019-09-04 13:18:39', 0, ''),
('K040919036', 'RINA HERMAWATI', ' Ds. pagutan Rt 02/ Rw 03 Pakurejo', '3323', '3323', '08', 'Temanggung', '2019-09-04', 1, '2019-09-04 13:20:41', 0, ''),
('K040919037', 'PUJI LESTARI', ' Limbangan Rt 18/ Rw 09 Kentengsari Candiroto', '3323', '3323', '08', 'Temanggung', '2019-09-04', 1, '2019-09-04 13:24:12', 0, ''),
('K040919038', 'ZAHROTUN MUFIDAH', ' Ds. mandang Rt 02/ Rw 02 Sucen ', '332320685840001', '3323', '08', 'Jombang', '1984-05-28', 1, '2019-09-04 13:26:17', 1, ''),
('K040919039', 'SUYANTI', ' Kledung Rt 01/ Rw 01 Kledung', '3323', '3323', '085747873155', 'Temanggung', '2019-09-22', 1, '2019-09-04 13:29:44', 0, ''),
('K040919040', 'RIRIN SUCIANA', ' Ds. Sangkon Rt 03/ Rw 02 Tuksari Kledung', '3323176609930001', '3323', '085726648055', 'Temanggung.', '1993-09-26', 1, '2019-09-04 13:34:59', 0, ''),
('K040919041', 'PARIYATI', ' Sigaplok Rt 09/ Rw 03 Kledung ', '3323175207690001', '3323', '08', 'Temanggung', '1970-03-10', 1, '2019-09-04 13:40:31', 1, ''),
('K040919042', 'RUWET', ' Samponsari Rt 07/ Rw 04 Getan Kranggan', '3323135011670001', '3323', '08', 'Temanggung', '1967-11-10', 1, '2019-09-04 14:11:17', 0, ''),
('K040919043', 'susanti', 'ngesrep 3/1 ringinanom parakan ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-04 14:33:06', 0, ''),
('K040919044', 'widarsih', 'kalensari 2/2 balesari bansari ', '3323165311870001', '', '', 'Temanggung', '1987-11-13', 1, '2019-09-04 14:35:53', 0, ''),
('K040919045', 'istinatun', 'tegalsari wadas kandangan ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-04 14:40:14', 0, ''),
('K040919046', 'Danang cahyo p', 'dermonganti ketitang jumo ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-04 14:44:13', 0, ''),
('K040919048', 'Buyarti', 'Ds. Seseh 5/10 ngadisepi gemawang', '3323204904780002', '', '', 'Temanggung', '1976-04-09', 1, '2019-09-04 06:49:39', 0, ''),
('K040919049', 'SITI KHOLIFAH', 'DS. SUNGAPAN 2/3 JAMUSAN JUMO ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-04 06:54:48', 0, ''),
('K040919050', 'KIRYATI', 'BRUJULAN 6/2 KREMPONG GEMAWANG ', '', '', '', 'Temanggung', '1991-12-05', 1, '2019-09-04 06:57:32', 0, ''),
('K050919027', 'Rohmadi', ' Dsn Bandung 3/6 Bandunggede Kedu', '3323072110840002', '3323072402073191', '081327035655', 'Temanggung', '1984-10-21', 1, '2019-09-05 11:30:07', 0, ''),
('K050919028', 'Nurul Maisaroh', ' Dsn Muncar Lor 5/2 Muncar Gemawang', '3323205705950003', '3323201509140004', '085729025956', 'Temanggung', '0005-05-17', 1, '2019-09-05 11:34:50', 0, ''),
('K060919047', 'Budiyanto', ' Lotermas 1/5 Tepusen Kaloran', '3323051707840001', '3323052604180003', '083840450006', 'Temanggung', '1984-07-17', 1, '2019-09-06 06:26:53', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `ags_id` int(11) NOT NULL,
  `pin_id` varchar(25) NOT NULL COMMENT 'fk dari pinjaman',
  `ang_angsuranke` int(3) NOT NULL,
  `ags_tgljatuhtempo` datetime NOT NULL,
  `ags_tglbayar` datetime NOT NULL,
  `ags_jmlpokok` float NOT NULL DEFAULT 0,
  `ags_jmlbunga` float NOT NULL DEFAULT 0,
  `ags_jmlbayar` float DEFAULT NULL,
  `ags_denda` float DEFAULT NULL,
  `ags_bayartunggakan` float DEFAULT NULL,
  `ags_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:belumbayar 1:kurang 2:bayar',
  `ags_tgl` datetime NOT NULL,
  `ags_flag` tinyint(2) NOT NULL,
  `ags_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`ags_id`, `pin_id`, `ang_angsuranke`, `ags_tgljatuhtempo`, `ags_tglbayar`, `ags_jmlpokok`, `ags_jmlbunga`, `ags_jmlbayar`, `ags_denda`, `ags_bayartunggakan`, `ags_status`, `ags_tgl`, `ags_flag`, `ags_info`) VALUES
(199, 'KE030919001', 1, '2019-10-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(200, 'KE030919001', 2, '2019-11-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(201, 'KE030919001', 3, '2019-12-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(202, 'KE030919001', 4, '2020-01-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(203, 'KE030919001', 5, '2020-02-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(204, 'KE030919001', 6, '2020-03-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(205, 'KE030919001', 7, '2020-04-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(206, 'KE030919001', 8, '2020-05-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(207, 'KE030919001', 9, '2020-06-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(208, 'KE030919001', 10, '2020-07-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(209, 'KE030919001', 11, '2020-08-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(210, 'KE030919001', 12, '2020-09-02 00:00:00', '0000-00-00 00:00:00', 500000, 240000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(211, 'KE040919001', 1, '2019-10-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(212, 'KE040919001', 2, '2019-11-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(213, 'KE040919001', 3, '2019-12-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(214, 'KE040919001', 4, '2020-01-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(215, 'KE040919001', 5, '2020-02-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(216, 'KE040919001', 6, '2020-03-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(217, 'KE040919001', 7, '2020-04-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(218, 'KE040919001', 8, '2020-05-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(219, 'KE040919001', 9, '2020-06-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(220, 'KE040919001', 10, '2020-07-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(221, 'KE040919001', 11, '2020-08-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(222, 'KE040919001', 12, '2020-09-03 00:00:00', '0000-00-00 00:00:00', 916667, 440000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(223, 'KE060919001', 1, '2019-10-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(224, 'KE060919001', 2, '2019-11-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(225, 'KE060919001', 3, '2019-12-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(226, 'KE060919001', 4, '2020-01-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(227, 'KE060919001', 5, '2020-02-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(228, 'KE060919001', 6, '2020-03-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(229, 'KE060919001', 7, '2020-04-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(230, 'KE060919001', 8, '2020-05-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(231, 'KE060919001', 9, '2020-06-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(232, 'KE060919001', 10, '2020-07-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(233, 'KE060919001', 11, '2020-08-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, ''),
(234, 'KE060919001', 12, '2020-09-03 00:00:00', '0000-00-00 00:00:00', 416667, 200000, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `bungainvestasi`
--

CREATE TABLE `bungainvestasi` (
  `biv_id` int(10) NOT NULL,
  `biv_bunga` float NOT NULL,
  `biv_keterangan` text NOT NULL,
  `biv_tgl` datetime NOT NULL,
  `biv_flag` tinyint(2) NOT NULL,
  `biv_info` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bungainvestasi`
--

INSERT INTO `bungainvestasi` (`biv_id`, `biv_bunga`, `biv_keterangan`, `biv_tgl`, `biv_flag`, `biv_info`) VALUES
(1, 2, '2 %', '2019-05-21 01:18:09', 0, '0000-00-00'),
(2, 1, '1 %', '2019-05-21 01:18:41', 0, '0000-00-00'),
(3, 2.5, '2.5 %', '2019-05-21 01:19:47', 0, '0000-00-00'),
(4, 1.8, 'setiap bulan', '2019-08-24 14:37:29', 0, '0000-00-00'),
(5, 2.3, '2.3%', '2019-09-02 14:46:13', 0, '0000-00-00'),
(6, 2.3, '2.3%', '2019-09-02 14:46:34', 2, '0000-00-00'),
(7, 2.5, '2.5', '2019-09-03 13:03:01', 0, '0000-00-00'),
(8, 1.8, '1.8', '2019-09-03 13:09:37', 0, '0000-00-00'),
(9, 2.2, '2.2', '2019-09-04 13:38:17', 0, '0000-00-00'),
(10, 1.6, '1.6', '2019-09-04 14:08:02', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bungapinjaman`
--

CREATE TABLE `bungapinjaman` (
  `bup_id` int(11) NOT NULL,
  `bup_bunga` float NOT NULL,
  `bub_tgl` datetime NOT NULL,
  `bub_flag` tinyint(2) NOT NULL,
  `bup_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bungapinjaman`
--

INSERT INTO `bungapinjaman` (`bup_id`, `bup_bunga`, `bub_tgl`, `bub_flag`, `bup_info`) VALUES
(1, 4, '2019-04-19 19:28:44', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `bungasetoransimpanan`
--

CREATE TABLE `bungasetoransimpanan` (
  `bss_id` int(11) NOT NULL,
  `sim_kode` varchar(25) NOT NULL COMMENT 'fk dr simpanan',
  `bss_saldosimpanan` float NOT NULL,
  `bss_bungabulanini` float NOT NULL,
  `bss_saldobulanini` float NOT NULL,
  `bss_jumlahsetoranbulanan` float NOT NULL,
  `bss_tglbunga` datetime NOT NULL,
  `bss_tgl` datetime NOT NULL,
  `bss_flag` tinyint(4) NOT NULL,
  `bss_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bungasimpanan`
--

CREATE TABLE `bungasimpanan` (
  `bus_id` int(11) NOT NULL,
  `bus_bunga` float NOT NULL,
  `bus_tgl` datetime NOT NULL,
  `bus_flag` tinyint(2) NOT NULL,
  `bus_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bungasimpanan`
--

INSERT INTO `bungasimpanan` (`bus_id`, `bus_bunga`, `bus_tgl`, `bus_flag`, `bus_info`) VALUES
(4, 1, '2019-04-20 05:24:43', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `dendaangsuran`
--

CREATE TABLE `dendaangsuran` (
  `dnd_id` int(11) NOT NULL,
  `ags_id` int(11) NOT NULL COMMENT 'fk dari angsuran',
  `sed_id` int(11) NOT NULL COMMENT 'fk dari settingdenda',
  `dnd_tgl` datetime NOT NULL,
  `dnd_flag` tinyint(2) NOT NULL,
  `dnd_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `historibungasimpanan`
--

CREATE TABLE `historibungasimpanan` (
  `hbs_id` int(11) NOT NULL,
  `ang_no` varchar(15) NOT NULL COMMENT 'fk dr anggota',
  `hbs_tglterakhir` datetime NOT NULL,
  `hbs_tgl` datetime NOT NULL,
  `hbs_flag` tinyint(4) NOT NULL,
  `hbs_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investasiberjangka`
--

CREATE TABLE `investasiberjangka` (
  `ivb_kode` varchar(25) NOT NULL,
  `ang_no` varchar(25) NOT NULL COMMENT 'fk dari anggota',
  `kar_kode` varchar(25) NOT NULL COMMENT 'fk dari karyawan',
  `wil_kode` varchar(10) NOT NULL COMMENT 'fk dari wilayah',
  `jwi_id` int(10) NOT NULL COMMENT 'fk dari jangkawaktuinvestasi',
  `jiv_id` int(10) NOT NULL COMMENT 'fk dari jasainvestasi',
  `biv_id` int(10) NOT NULL COMMENT 'fk dari bungainvestasi',
  `ivb_jumlah` float NOT NULL,
  `ivb_tglpendaftaran` datetime NOT NULL,
  `ivb_tglperpanjangan` datetime DEFAULT NULL,
  `ivb_status` tinyint(1) NOT NULL,
  `ivb_tgl` datetime NOT NULL,
  `ivb_flag` tinyint(2) NOT NULL,
  `ivb_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investasiberjangka`
--

INSERT INTO `investasiberjangka` (`ivb_kode`, `ang_no`, `kar_kode`, `wil_kode`, `jwi_id`, `jiv_id`, `biv_id`, `ivb_jumlah`, `ivb_tglpendaftaran`, `ivb_tglperpanjangan`, `ivb_status`, `ivb_tgl`, `ivb_flag`, `ivb_info`) VALUES
('KD020919001', 'K020919010', '214005', '17', 4, 3, 1, 20000000, '2019-09-02 00:00:00', NULL, 0, '2019-09-02 13:19:46', 0, ''),
('KD020919003', 'K020919012', '0116019', '19', 4, 3, 1, 4000000, '2019-09-02 00:00:00', NULL, 0, '2019-09-02 13:40:02', 0, ''),
('KD020919004', 'K020919011', '1016046', '21', 4, 3, 1, 25000000, '2019-09-05 00:00:00', '2020-09-02 00:00:00', 0, '2019-09-02 14:44:55', 2, ''),
('KD020919005', 'K020919013', '614007', '16', 4, 2, 5, 25000000, '2019-09-02 00:00:00', NULL, 0, '2019-09-02 14:47:25', 0, ''),
('KD020919006', 'K020919029', '1016046', '21', 4, 3, 1, 25000000, '2019-09-02 00:00:00', NULL, 0, '2019-09-02 12:57:35', 0, ''),
('KD030919001', 'K020919030', '214005', '17', 5, 3, 7, 70000000, '2019-09-03 00:00:00', NULL, 0, '2019-09-03 13:03:59', 0, ''),
('KD030919002', 'K030919031', '1016049', '21', 5, 3, 1, 15000000, '2019-09-03 00:00:00', NULL, 0, '2019-09-03 13:06:23', 0, ''),
('KD030919003', 'K030919032', '814009', '21', 5, 3, 8, 2000000, '2019-09-03 00:00:00', NULL, 0, '2019-09-03 13:10:24', 0, ''),
('KD030919004', 'K030919033', '0116019', '19', 5, 3, 8, 2000000, '2019-09-03 00:00:00', NULL, 0, '2019-09-03 13:14:06', 0, ''),
('KD040919001', 'K030919034', '614007', '16', 4, 2, 1, 30000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:16:37', 0, ''),
('KD040919002', 'K040919035', '614007', '16', 4, 2, 1, 110000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:19:26', 0, ''),
('KD040919003', 'K040919036', '0116019', '19', 5, 3, 1, 5000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:22:03', 0, ''),
('KD040919004', 'K040919037', '214005', '17', 4, 3, 1, 2000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:25:07', 0, ''),
('KD040919005', 'K040919039', '814009', '21', 6, 2, 3, 50000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:30:52', 0, ''),
('KD040919006', 'K040919039', '814009', '21', 6, 2, 7, 15000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:31:26', 0, ''),
('KD040919007', 'K040919040', '1216060', '21', 6, 3, 9, 10000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:39:26', 0, ''),
('KD040919008', 'K040919041', '814009', '21', 6, 3, 8, 5000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 13:41:11', 0, ''),
('KD040919009', 'K040919038', '1016048', '20', 6, 3, 10, 15000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 14:09:12', 0, ''),
('KD040919010', 'K040919042', '1115016', '23', 5, 2, 1, 25000000, '2019-09-04 00:00:00', NULL, 0, '2019-09-04 14:22:32', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jab_kode` int(11) NOT NULL,
  `jab_nama` varchar(50) NOT NULL,
  `jab_tgl` datetime NOT NULL,
  `jab_flag` tinyint(2) NOT NULL,
  `jab_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jab_kode`, `jab_nama`, `jab_tgl`, `jab_flag`, `jab_info`) VALUES
(2, 'Koordinator Wilayah', '2019-08-24 13:49:13', 0, ''),
(3, 'Administrasi', '2019-08-24 13:49:18', 0, ''),
(4, 'Marketing Simpanan', '2019-08-24 13:49:30', 0, ''),
(5, 'Marketing SIMKESAN', '2019-08-24 13:49:38', 0, ''),
(6, 'Direktur Utama', '2019-08-27 07:41:06', 0, ''),
(7, 'Marketing SIMKESAN', '2019-08-27 07:41:13', 2, ''),
(8, 'Kepala Bagian Deposito', '2019-08-27 07:41:30', 0, ''),
(9, 'Kepala Bagian Pinjaman', '2019-08-27 07:41:39', 0, ''),
(10, 'Kepala Bagian SIMKESAN', '2019-08-27 07:41:56', 0, ''),
(11, 'Kepala Bagian Simpanan', '2019-08-27 07:45:46', 0, ''),
(12, 'Marketing Pinjaman', '2019-08-27 07:45:56', 0, ''),
(13, 'Collector', '2019-08-27 07:46:03', 0, ''),
(14, 'Surveyor', '2019-09-02 06:23:00', 0, ''),
(15, 'Staff', '2019-09-02 06:23:06', 0, ''),
(16, 'Manager', '2019-09-02 06:23:16', 0, ''),
(17, 'Driver', '2019-09-02 06:23:53', 0, ''),
(18, 'Office Boy', '2019-09-02 06:23:59', 0, ''),
(19, 'Chef', '2019-09-02 06:24:06', 0, ''),
(20, 'Security', '2019-09-02 06:24:31', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE `jaminan` (
  `jam_id` int(11) NOT NULL,
  `pin_id` varchar(11) NOT NULL COMMENT 'fk dari pinjaman',
  `jej_id` tinyint(3) NOT NULL COMMENT 'fk dari jenisjaminan',
  `jam_nomor` varchar(30) NOT NULL,
  `jam_unit` varchar(30) DEFAULT NULL,
  `jam_noregistrasi` varchar(30) DEFAULT NULL,
  `jam_tahunpembuatan` varchar(30) DEFAULT NULL,
  `jam_atasnama` varchar(30) DEFAULT NULL,
  `jam_luas` int(11) DEFAULT NULL,
  `jam_keterangan` text DEFAULT NULL,
  `jam_file` text DEFAULT NULL,
  `jam_tgl` datetime NOT NULL,
  `jam_flag` tinyint(2) NOT NULL,
  `jam_info` text NOT NULL,
  `jam_alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jaminan`
--

INSERT INTO `jaminan` (`jam_id`, `pin_id`, `jej_id`, `jam_nomor`, `jam_unit`, `jam_noregistrasi`, `jam_tahunpembuatan`, `jam_atasnama`, `jam_luas`, `jam_keterangan`, `jam_file`, `jam_tgl`, `jam_flag`, `jam_info`, `jam_alamat`) VALUES
(29, 'KE030919001', 1, 'L-13376955I', 'MOBIL TOYOTA KF 20', 'H 8654 AD', '1984', 'AGUS KUSMANTO', NULL, '', '', '2019-09-03 12:10:47', 0, '', 'DS BEBENGAN 2/6 BOJA KENDAL'),
(30, 'KE040919001', 1, 'M-14368108', 'SEPEDA MOTOR HONDA K1H02N14L0 ', 'AA 2786 YN', '2016', 'SUJARWADI', NULL, '', '', '2019-09-04 14:09:54', 0, '', 'DSN BRINGIN 1/5 TEGALSARI KEDU'),
(33, 'KE060919001', 1, 'M-13860341', 'MOBIL SUZUKI GC415V-APV DLX', 'AA 8981 VE', '2005', 'RUWIYATI', NULL, 'SK3 sudah', '', '2019-09-06 06:18:21', 0, '', 'DSN MUNCAR LOR 5/2 MUNCAR GEMA');

-- --------------------------------------------------------

--
-- Table structure for table `jangkawaktuinvestasi`
--

CREATE TABLE `jangkawaktuinvestasi` (
  `jwi_id` int(10) NOT NULL,
  `jwi_jangkawaktu` tinyint(2) NOT NULL,
  `jwi_keterangan` text NOT NULL,
  `jwi_tgl` datetime NOT NULL,
  `jwi_flag` tinyint(2) NOT NULL,
  `jwi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jangkawaktuinvestasi`
--

INSERT INTO `jangkawaktuinvestasi` (`jwi_id`, `jwi_jangkawaktu`, `jwi_keterangan`, `jwi_tgl`, `jwi_flag`, `jwi_info`) VALUES
(1, 3, '3 bulan', '2019-05-21 01:09:34', 0, ''),
(2, 6, '6 bulan', '2019-05-21 01:12:08', 0, ''),
(3, 9, '9 bulan', '2019-05-21 01:12:18', 0, ''),
(4, 12, '12 bulan', '2019-05-21 01:12:30', 0, ''),
(5, 11, '11', '2019-09-03 13:02:01', 0, ''),
(6, 7, '7', '2019-09-04 13:30:11', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jasainvestasi`
--

CREATE TABLE `jasainvestasi` (
  `jiv_id` int(10) NOT NULL,
  `jiv_jasa` varchar(50) NOT NULL,
  `jiv_keterangan` text NOT NULL,
  `jiv_tgl` datetime NOT NULL,
  `jiv_flag` tinyint(2) NOT NULL,
  `jiv_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasainvestasi`
--

INSERT INTO `jasainvestasi` (`jiv_id`, `jiv_jasa`, `jiv_keterangan`, `jiv_tgl`, `jiv_flag`, `jiv_info`) VALUES
(1, 'Hadiah', 'Ambil di depan', '2019-05-21 01:14:25', 0, ''),
(2, 'Per Bulan', 'Ambil tiap bulan', '2019-05-21 01:15:11', 1, ''),
(3, 'Belakang', 'Ambil di belakang', '2019-05-21 01:15:40', 0, ''),
(4, '1,8', 'setiap bulan', '2019-08-24 14:36:26', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenisjaminan`
--

CREATE TABLE `jenisjaminan` (
  `jej_id` tinyint(3) NOT NULL,
  `jej_jaminan` varchar(25) NOT NULL,
  `jej_keterangan` text DEFAULT NULL,
  `jej_tgl` datetime NOT NULL,
  `jej_flag` tinyint(2) NOT NULL,
  `jej_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisjaminan`
--

INSERT INTO `jenisjaminan` (`jej_id`, `jej_jaminan`, `jej_keterangan`, `jej_tgl`, `jej_flag`, `jej_info`) VALUES
(1, 'BPKB', 'BPKB motor, mobil dll', '2019-05-21 14:05:31', 1, ''),
(2, 'SERTIFIKAT', 'Sertifikat rumah, tanah dll', '2019-05-21 14:06:18', 0, ''),
(3, 'IJASAH', 'Ijasah sekolah, kuliah dll', '2019-05-21 14:08:22', 1, ''),
(4, 'LAIN-LAIN', 'jaminan lain-lain', '2019-06-20 07:54:02', 0, ''),
(5, 'Investasi Berjangka', 'Investasi Berjangka', '2019-08-29 08:21:17', 0, ''),
(6, 'Simkesan', 'Simkesan', '2019-08-29 08:21:29', 0, ''),
(7, 'Simpanan', 'Simpanan', '2019-08-29 08:21:39', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenisklaim`
--

CREATE TABLE `jenisklaim` (
  `jkl_id` int(10) NOT NULL,
  `jkl_keuntungan` varchar(50) NOT NULL,
  `jkl_plan` varchar(15) NOT NULL,
  `jkl_tahunke` tinyint(2) NOT NULL,
  `jkl_nominal` float NOT NULL,
  `jkl_keterangan` text NOT NULL,
  `jkl_administrasi` float NOT NULL,
  `jkl_tgl` datetime NOT NULL,
  `jkl_flag` tinyint(2) NOT NULL,
  `jkl_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisklaim`
--

INSERT INTO `jenisklaim` (`jkl_id`, `jkl_keuntungan`, `jkl_plan`, `jkl_tahunke`, `jkl_nominal`, `jkl_keterangan`, `jkl_administrasi`, `jkl_tgl`, `jkl_flag`, `jkl_info`) VALUES
(1, 'Santunan Duka Plan A', '1', 0, 5000000, 'Santunan duka untuk anggota jika meninggal', 5, '2019-07-28 22:16:21', 1, ''),
(2, 'Santunan Duka Plan B', '2', 0, 10000000, 'Santunan duka untuk anggota yang meninggal', 5, '2019-07-29 09:53:02', 0, ''),
(3, 'Santunan Duka Plan C', '3', 0, 15000000, 'Santunan duka untuk anggota jika menginggal', 5, '2019-07-29 09:53:44', 0, ''),
(4, 'Klaim Tahun Ke-2 Plan A', '1', 2, 600000, 'Bisa diklaim oleh anggota untuk rawat inap pada bulan ke-13', 5, '2019-07-29 09:55:46', 1, ''),
(5, 'Klaim Tahun Ke-3 Plan A', '1', 3, 1200000, 'Bisa diklaim oleh anggota untuk rawat inap pada bulan ke-25', 5, '2019-07-29 09:57:28', 0, ''),
(6, 'Klaim Tahun Ke 4 Plan A', '1', 4, 1800000, 'Simkesan plan A tahun ke 4', 5, '2019-08-31 13:42:01', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenispelunasan`
--

CREATE TABLE `jenispelunasan` (
  `jep_id` tinyint(2) NOT NULL,
  `jep_jenis` varchar(25) NOT NULL,
  `jep_keterangan` text DEFAULT NULL,
  `jep_tgl` datetime NOT NULL,
  `jep_flag` tinyint(2) NOT NULL,
  `jep_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenispelunasan`
--

INSERT INTO `jenispelunasan` (`jep_id`, `jep_jenis`, `jep_keterangan`, `jep_tgl`, `jep_flag`, `jep_info`) VALUES
(1, 'Biasa', 'Pelunasan sesuai dengan jatuh tempo pelunasan', '2019-05-21 14:09:59', 0, ''),
(2, 'Dipercepat', 'Pelunasan lebih awal dari tenor pelunasan pinjaman', '2019-05-21 14:10:32', 0, ''),
(3, 'Macet', 'Pelunsan lebih dari jatuh tempo / tenor pelunasan', '2019-05-21 14:11:33', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenispenarikansimkesan`
--

CREATE TABLE `jenispenarikansimkesan` (
  `jps_id` int(10) NOT NULL,
  `jps_jenis` varchar(50) NOT NULL,
  `jps_administrasi` float NOT NULL,
  `jps_persenpenarikan` float NOT NULL,
  `jps_tgl` datetime NOT NULL,
  `jps_flag` tinyint(2) NOT NULL,
  `jps_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenispenarikansimkesan`
--

INSERT INTO `jenispenarikansimkesan` (`jps_id`, `jps_jenis`, `jps_administrasi`, `jps_persenpenarikan`, `jps_tgl`, `jps_flag`, `jps_info`) VALUES
(1, 'Penarikan 10', 5, 3, '2019-07-28 22:19:07', 1, ''),
(2, 'Penarikan 5', 5, 10, '2019-07-29 08:13:45', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenissetoran`
--

CREATE TABLE `jenissetoran` (
  `jse_id` int(11) NOT NULL,
  `jse_setoran` varchar(25) NOT NULL,
  `jse_keterangan` text DEFAULT NULL,
  `jse_min` float NOT NULL,
  `jse_tgl` datetime NOT NULL,
  `jse_flag` tinyint(2) NOT NULL,
  `jse_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissetoran`
--

INSERT INTO `jenissetoran` (`jse_id`, `jse_setoran`, `jse_keterangan`, `jse_min`, `jse_tgl`, `jse_flag`, `jse_info`) VALUES
(1, 'Harian', 'setoran harian', 5000, '2019-04-19 19:06:22', 1, ''),
(2, 'Mingguan', 'Setoran Mingguan', 30000, '2019-04-19 19:06:37', 1, ''),
(3, 'Bulanan', 'Setoran bulanan', 100000, '2019-04-19 19:06:49', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenissimpanan`
--

CREATE TABLE `jenissimpanan` (
  `jsi_id` int(11) NOT NULL,
  `jsi_simpanan` varchar(25) NOT NULL,
  `jsi_keterangan` text DEFAULT NULL,
  `jsi_tgl` datetime NOT NULL,
  `jsi_flag` tinyint(2) NOT NULL,
  `jsi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissimpanan`
--

INSERT INTO `jenissimpanan` (`jsi_id`, `jsi_simpanan`, `jsi_keterangan`, `jsi_tgl`, `jsi_flag`, `jsi_info`) VALUES
(1, '9', 'Simpanan jangka 9 bulan', '2019-04-19 19:08:30', 0, ''),
(2, '12', 'Simpanan Jangka 12 Bulan', '2019-04-19 19:08:46', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `kantorksp`
--

CREATE TABLE `kantorksp` (
  `kks_id` int(11) NOT NULL,
  `kks_nama` varchar(25) NOT NULL,
  `kks_alamat` text NOT NULL,
  `kks_kode` varchar(20) NOT NULL,
  `kks_flag` tinyint(4) NOT NULL,
  `kks_tgl` datetime NOT NULL,
  `kks_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kantorksp`
--

INSERT INTO `kantorksp` (`kks_id`, `kks_nama`, `kks_alamat`, `kks_kode`, `kks_flag`, `kks_tgl`, `kks_info`) VALUES
(1, 'Kantor Pusat', 'Temanggung', 'K', 0, '2019-09-01 19:40:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kar_kode` varchar(10) NOT NULL,
  `kar_nama` varchar(50) NOT NULL,
  `kar_nik` varchar(25) NOT NULL,
  `jab_kode` int(11) NOT NULL COMMENT 'fk dari jabatan',
  `kar_alamat` text NOT NULL,
  `kar_nohp` varchar(15) NOT NULL,
  `kar_simpanan` float DEFAULT NULL,
  `kar_status` tinyint(2) NOT NULL,
  `kar_tgl` datetime NOT NULL,
  `kar_flag` tinyint(2) NOT NULL,
  `kar_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kar_kode`, `kar_nama`, `kar_nik`, `jab_kode`, `kar_alamat`, `kar_nohp`, `kar_simpanan`, `kar_status`, `kar_tgl`, `kar_flag`, `kar_info`) VALUES
('0116018', 'PUJI RAHAYU', '3323135811770001', 16, 'PENDOWO RT 04 RW 17 PENDOWO KRANGGAN TEMANGGUNG\r\n', '087745506237', NULL, 0, '2019-09-02 12:39:05', 0, ''),
('0116019', 'Riska Windi A', '3323205204930002', 11, 'SITUK COYUDAN UTARA RT 03 RW 16 PARAKAN \r\n', '085601032328', NULL, 0, '2019-09-02 13:38:53', 0, ''),
('0116020', 'YENI NOVITASARI', '3323074101940006', 3, 'PAKISAN RT 05 RW 05 CANDIMULYO KEDU TEMANGGUNG\r\n', '085713861689', NULL, 0, '2019-09-04 14:48:46', 0, ''),
('0116021', 'ARIF HIDAYATUL IKHSAN', '3323080209910001', 14, 'DSN.TANDURAN RT 01 RW 04 CATURANOM, \r\n', '081548221037', NULL, 0, '2019-09-03 09:46:45', 0, ''),
('0415024', 'TUTIK ANJARWANI', '3323205912950001', 16, 'KARANG MANGGIS RT 01 RW 03 KARANG SENENG GEMAWANG\r\n', '085740020875', NULL, 0, '2019-09-05 09:24:20', 0, ''),
('0416023', 'FIFI ELISANDI', '3323075809920003', 15, 'GROGOL RT 02 RW 02 KUTOANYAR KEDU TEMANGGUNG\r\n', '085942041255', NULL, 0, '2019-09-05 11:45:38', 0, ''),
('0416027', 'NASRULLAH EFENDI', '3502170703830003', 15, 'JL. KALIMNTAN 60 PONOROGO\r\n', '081239590992', NULL, 0, '2019-09-05 09:26:47', 0, ''),
('0516031', 'APRILIYA STYANINGRUM', '3323105304960003', 15, 'BALEKKERSO, GEDONGSARI JUMO \r\n', '085747338180', NULL, 0, '2019-09-04 14:32:43', 0, ''),
('0716033', 'SUPRIYOKO', '3323071609710002', 20, 'DSN WONOSROYO RT 001 RW 001 BOJONEGORO KEDU\r\n', '085743213336', NULL, 0, '2019-09-05 09:20:57', 0, ''),
('0806071', 'TUHU SUSILOWATI', '3307074309830005', 12, 'GARUNG BUTUH KALIKAJAR WONOSOBO\r\n', '085325515051', NULL, 0, '2019-09-02 12:51:50', 0, ''),
('0806072', 'LEDY ADIT SAPUTRO', '3323093004950001', 15, 'SUMBERAN, PETIREJO NGADIREJO\r\n', '08562873717', NULL, 0, '2019-09-03 11:27:47', 0, ''),
('0806073', 'HENI PURWANTI', '3323045104790001', 4, 'BANJARSARI RT 03 RW 01 KEBUMEN PRINGSURAT \r\n', '085868980337', NULL, 0, '2019-09-06 06:29:20', 0, ''),
('0815013', 'ERLIN AMALIA', '3323086809970005', 3, 'CAMPURSALAM RT 02 RW 02 PARAKAN TEMANGGUNG\r\n', '085743211590', NULL, 0, '2019-09-03 11:55:34', 0, ''),
('0815015', 'SILVIA INDAH LESTARI', '3323084512910006', 11, 'BAJANGAN RT 04 RW 01 MANDISARI PARAKAN\r\n', '08562865880', NULL, 0, '2019-09-03 11:30:36', 0, ''),
('0816036', 'ARIF SUSANTO ', '3323092803950001', 16, 'DSN. SUMBERAN DSN PETIREJO\r\n', '085643533740', NULL, 0, '2019-09-05 11:36:12', 0, ''),
('1016040', 'TRI LESTARI', '332312520493', 15, 'DSN. DOTAKAN RT 04 RW 03 CANDIROTO\r\n', '085743895800', NULL, 0, '2019-09-03 11:46:50', 0, ''),
('1016042', 'ARIYANTO', '3323102306850002', 17, 'CARIKAN III KERTOSARI JUMO\r\n', '085326676746', NULL, 0, '2019-09-03 12:05:12', 0, ''),
('1016044', 'GITO ROMI ARIYADI', '3323170612950002', 13, 'BATUR SARI RT 01 RW 01 KLEDUNG\r\n', '08562558049', NULL, 0, '2019-09-03 11:36:51', 0, ''),
('1016046', 'ASIH AWALIA PUTRI', '3404075607940001', 4, 'BATUR SARI RT 01 RW 01 KLEDUNG\r\n', '085741985256', NULL, 0, '2019-09-05 12:10:22', 0, ''),
('1016048', 'ISNATUN KHOLIFAH', '332320712920001', 16, 'DSN SUCEN RT 05 TW 05 SUCEN GEMAWANG\r\n', '085643361006', NULL, 0, '2019-09-04 14:05:54', 0, ''),
('1016049', 'LAILI SANGADAH', '3307076106930005', 15, 'GARUNG BUTUH RT 09 RW 02 KALIKAJAR  WONOSOBO\r\n', '085743347434', NULL, 0, '2019-09-05 12:21:57', 0, ''),
('108123', 'YOGGA EGHE PANGESTU', '3502170406990007', 4, 'JL. LAWU GG I/43 P RT 004 RW 002, NOLOGATEN, PONOROGO\r\n', '083851716726', NULL, 0, '2019-09-04 14:38:10', 0, ''),
('1112137', 'DWI HASTORO', '3323140807930001', 20, 'GELANGAN RT 03 RW 02 TLOGOMULRO TEMANGGUNG\r\n', '085643007155', NULL, 0, '2019-09-04 14:28:34', 0, ''),
('1115016', 'MAHFIROH', '3323105303920002', 16, 'CARIKAN 1 RT 04 RW 01 KERTISARI JUMO TEMANGGUNG\r\n', '085726581139', NULL, 0, '2019-09-04 14:14:33', 0, ''),
('1116050', 'Yuyun Arista', '3323106706930002', 9, 'PAGERJURANG RT 02 RW 02 JAMUSAN JUMO\r\n', '085643328708', NULL, 0, '2019-09-02 12:44:58', 0, ''),
('1207163', 'DITAR ROSSANO PITAYO', '3323071008820003', 16, 'PERUM AZA GRIYA BLOK DI RT 2 RW 4 WALITELON UTARA 085747474801\r\n', '085747474801', NULL, 0, '2019-09-04 06:55:07', 0, ''),
('1207164', 'KOESTIJONO', '3323091311790001', 15, 'BONDALEM RT 5 RW 2 MANGUNSARI NGADIREJO\r\n', '085743321123', NULL, 0, '2019-09-04 06:56:46', 0, ''),
('1209001', 'ARYADI', '3323071907820006', 6, 'DSN. SROYO RT 08 RW 01 BOJONEGORO KEDU TEMANGGUNG\r\n', '081325252736', NULL, 0, '2019-09-02 11:20:00', 0, ''),
('1211131', 'ESTI RAHMANINGSIH', '3323104809900005', 4, 'DSN KRAJAN RT 02 RW 01 LEMPUYANG CANDIROTO TEMANGGUNG\r\n', '085643294926', NULL, 0, '2019-09-05 12:19:16', 0, ''),
('1211133', 'KURNIA APRILYA', '3323085404960003', 4, 'JETIS KAUMAN RT 04 W 12 PARAKAN KAUMAN\r\n', '081327284167', NULL, 0, '2019-09-04 14:26:15', 0, ''),
('1211134', 'MAULITA', '3323075206000005', 12, 'KABUNAN RT 05 RW 01 BANDUNGGEDE KEDU TEMANGGUNG\r\n', '085802929492', NULL, 0, '2019-09-02 13:01:02', 0, ''),
('1211136', 'ARDHYKA WULAN SAPUTRI', '3323075305950003', 4, 'GABUNGAN RT 01 RW 09 TEGALSARI KEDU\r\n', '081327497763', NULL, 0, '2019-09-05 11:57:17', 0, ''),
('1216060', 'RIRIN SUCIANA', '3323176609930001', 3, 'SANGKON TUKSARI RT 03 RW 02 KLEDUNG TEMANGGUNG\r\n', '085726648055', NULL, 0, '2019-09-05 12:24:22', 0, ''),
('1216063', 'DIAH AYU RAHMAWATI', '3323014307980002', 3, 'TEGALURUNG RT 05 RW 01 BULU\r\n', '085743276576', NULL, 0, '2019-09-04 14:41:39', 0, ''),
('1306103', 'WAHYUDI EKO SILAWANTO', '3323032611660001', 20, 'PURI KENCANA RT 02 RW 05 MANDING TEMANGGUNG\r\n', '085727135018', NULL, 0, '2019-09-05 08:07:10', 0, ''),
('1307155', 'TITIK ASTUTI', '3323205010000001', 4, 'KAYUTAHUN 4/2 BANARAN GEMAWANG\r\n', '085749175662', NULL, 0, '2019-09-02 11:40:37', 0, ''),
('1307156', 'SLAMET SAEFUDIN', '3323200608960001', 4, 'KALIPAHING 2/3 NGADISEPI GEMAWANG\r\n', '085800504145', NULL, 0, '2019-09-06 06:35:11', 0, ''),
('1307157', 'AGUSTINI PUJI LESTARI', '3323134108950003', 3, 'JURANG 2/1 KEMLOKO KRANGGAN\r\n', '085806961134', NULL, 0, '2019-09-04 14:50:29', 0, ''),
('1307158', 'FAIZA FUTRI FITRIA', '3323096310950002', 3, 'GONDANG DHUWUR 5/1 MANGGONG NGADIREJO\r\n', '081229920814', NULL, 0, '2019-09-04 14:44:47', 0, ''),
('1307159', 'WENING SARASWATI', '3323084706930002', 3, 'WARUNGSARI 1/2 MANDISARI PARAKAN\r\n', '081392439715', NULL, 0, '2019-09-04 14:43:18', 0, ''),
('1601138', 'DANANG CAHYO PURNOMO', '3323102304980001', 4, 'DERMONGANTI RT 01 RW 03 KETITANG JUMO\r\n', '085299985365', NULL, 0, '2019-09-02 11:48:19', 0, ''),
('1601139', 'OKTA LEVIA', '3323106110990001', 4, 'PAGERJURANG RT 02 RW 02 JAMUSAN JUMO\r\n', '085526314469', NULL, 0, '2019-09-06 06:26:02', 0, ''),
('1604099', 'FERI HARIYANTO', '3323202405900002', 20, 'MUNCAR KULON RT 03 RW 04 MUNCAR GEMAWANG\r\n', '085727145424', NULL, 0, '2019-09-05 08:12:21', 0, ''),
('1608161', 'HERMAWAN INDRA PRATAMA', '3323090207000003', 4, 'NGLARANG I 4/3 MANGUNSARI NGADIREJO TEMANGGUNG\r\n', '089667879751', NULL, 0, '2019-09-02 11:42:31', 0, ''),
('1610078', 'FATKHURRIZKIYAH', '332301530930003', 3, 'BANYUURIP RT 06 RW 02 BULU TEMANGGUNG\r\n', '085878523645', NULL, 0, '2019-09-05 12:26:30', 0, ''),
('1610079', 'Fiya Alfi Maulida', '3323206502010002', 12, 'SEDELEP RT 004 RW 007 GEMAWANG\r\n', '085801418727', NULL, 0, '2019-09-02 12:57:17', 0, ''),
('1701140', 'KOMARUDI', '3323058806890001', 20, 'LINGKUNGAN SENDANG WALITELON SELATAN TEMANGGUNG\r\n', '089648592903', NULL, 0, '2019-09-06 06:41:13', 0, ''),
('1701141', 'AUDIA KHAQQI', '3308014906950001', 3, 'PARAKAN KAUMAN', '082226679658', NULL, 0, '2019-09-03 12:02:24', 0, ''),
('1701142', 'RIFKI ZULFIYANTO', '3323011206910003', 10, 'DS NGIMBRANG 2/1 BULU TEMANGGUNG \r\n', '085803095110', NULL, 0, '2019-09-03 11:43:58', 0, ''),
('1907118', 'HARYONO', '330709121076002', 20, 'BANJARAN RT 003/ RW 002, KRAMATAN, WONOSOBO\r\n', '082242812015', NULL, 0, '2019-09-05 08:14:39', 0, ''),
('204098', 'DINA ANDRIYANTI', '3307014802950003', 3, 'KALIGOWONG RT 01 RW 03 WADASLINTANG WONOSOBO\r\n', '085867058655', NULL, 0, '2019-09-03 11:51:14', 0, ''),
('2103146', 'MAYA SYARIFATUL FAJARAH', '3323075408950004', 3, 'SAWAHAN  1/2 TEGALSARI KEDU, TEMANGGUNG\r\n', '081325409512', NULL, 0, '2019-09-03 11:59:34', 0, ''),
('2112089', 'EDI PURNAMA', '3323060401820004', 4, 'KRAJAN 1 RT 04 RW 07 KRAJAN KANDANGAN TEMANGGUNG\r\n', '085385742865', NULL, 0, '2019-09-05 12:28:53', 0, ''),
('214005', 'Adila Septi Mayasa', '3323074809940003', 8, 'DIWEK RT 05 RW 06 BOJONEGORO KEDU TEMANGGUNG\r\n', '085799100015', NULL, 0, '2019-09-02 13:16:26', 0, ''),
('215011', 'YUYUN FITRASTUTI', '3323076806960003', 4, 'BANDUNG RT 02 RW 06 BANDUNGGEDE KEDU TEMANGGUNG\r\n', '085601560409', NULL, 0, '2019-09-05 12:08:06', 0, ''),
('2207160', 'JOKO PRASETYO', '3323205112960001', 20, 'DALEM TEGOWANUH 3/1 KALORAN TEMANGGUNG\r\n', '085691893175', NULL, 0, '2019-09-05 08:16:25', 0, ''),
('2401092', 'JOKO DWIYANTO', '3323201212940001', 4, 'MANDANG RT 03 RW 02 SUCEN GEMAWANG TEMANGGUNG\r\n', '085741466922', NULL, 0, '2019-09-06 06:30:59', 0, ''),
('2401093', 'BUDIYONO', '332302070770006', 13, 'NGAGLIK, RT 02 RW 04 DESA JRAGAN\r\n', '082227453876', NULL, 0, '2019-09-03 11:39:08', 0, ''),
('2405070', 'AHMAD ARIFIN', '3323083012840003', 20, 'WADAS WETAN 02/07 WADAS KANDANGAN \r\n\r\n', '085741119818', NULL, 0, '2019-09-05 11:31:18', 0, ''),
('2407075', 'EDDY IRAWAN', '3323121112930001', 4, 'MENTOSARI KENTENGSARI CANDIROTO\r\n', '085708708613', NULL, 0, '2019-09-02 11:34:21', 0, ''),
('2410129', 'DESTO WASMA\'UN', '3323101412980001', 20, 'DSN.TAPAK 001/004 GIYONO,JUMO, TEMANGGUNG\r\n', '083131798806', NULL, 0, '2019-09-06 06:44:20', 0, ''),
('2411084', 'RITA NINGSIH', '332310661290005', 4, 'BARANG KULON 02/02 BARANG JUMO TEMANGGUNG\r\n', '085729705458', NULL, 0, '2019-09-05 09:33:47', 0, ''),
('2411088', 'AFRIN IRNAWATI', '3323126904990001', 4, 'KRAJAN RT 07 RW 01 LEMPUYUNG CANDIROTO\r\n', '085867427504', NULL, 0, '2019-09-04 14:24:00', 0, ''),
('2604100', 'KUNDI PRAMUDIA RETNA', '3323075104070001', 4, 'PRUPUGAN RT 04 RW 02 BOJONEGORO KEDU TEMANGGUNG\r\n', '081327172564', NULL, 0, '2019-09-04 14:55:00', 0, ''),
('2708004', 'Adilla', '3323223322122345', 2, 'Kedu', '085876329811', NULL, 0, '2019-08-27 07:26:24', 2, ''),
('2708005', 'Erlin', '33232123232456', 3, 'Parakan', '089768765543', NULL, 0, '2019-08-27 07:38:45', 2, ''),
('2708006', 'Silvia', '33234567867544', 11, 'Bulu', '089768765345', NULL, 0, '2019-08-27 07:47:19', 2, ''),
('2806150', 'RAKHA SATRIO AJI PRATAMA', '332308291160001', 4, 'JUBUG 2/2 WANUTENGAH PARAKAN\r\n', '085747350822', NULL, 0, '2019-09-05 12:02:25', 0, ''),
('2806151', 'RIZKI DIDI SETYAWAN', '3323130507020003', 4, 'KEJI 2/3 GENTAN KRANGGAN\r\n', '085335322021', NULL, 0, '2019-09-02 11:36:54', 0, ''),
('2806152', 'YUNI TRI WARDANI', '3323094406000002', 4, 'KRAJAN 5/1 PETIREJO NGADIREJO\r\n', '083842337348', NULL, 0, '2019-09-05 12:30:43', 0, ''),
('2806153', 'CHOIRUL ANWAR', '3323101210000001', 4, 'DSN. TAPAK 3/4 GIYONO JUMO\r\n', '088225444603', NULL, 0, '2019-09-05 12:06:00', 0, ''),
('2806154', 'SIWI TUNJUNG SAPUTRI', '3323096701970001', 5, 'GONDANGSARI 2/4 GONDANGWAYANG KEDU\r\n', '0895415458933', NULL, 0, '2019-09-03 11:48:38', 0, ''),
('2808162', 'UNTUNG GALIH PRATAMA', '3323072606980007', 20, 'LIMBO MAKMUR BUMIRAYA MAROWALI SULTENG ( CANDIMULYO KEDU)\r\n', '082296237751', NULL, 0, '2019-09-05 08:18:17', 0, ''),
('3009130', 'RONDIYAH', '3323075404740004', 19, 'DSN KEPAL RT 003 RW 008 MERGOWATI KEDU\r\n', '085727139303', NULL, 0, '2019-09-04 06:49:01', 0, ''),
('302101', 'ARIF NUR YAHYA', '3323082712800005', 20, 'Kembaran 7/1 Campursalam, Parakan, Temanggung\r\n', '085799037382', NULL, 0, '2019-09-05 09:57:21', 0, ''),
('307107', 'SRI NUR JANAH', '3323084106960002', 3, 'KARANGBENDO RT 02 RW 03 TEGALROSO PARAKAN TEMANGGUNG\r\n', '085702271231', NULL, 0, '2019-09-05 11:55:16', 0, ''),
('307108', 'VIKA AMELIA NURJANAH', '3323076705940001', 3, 'KEDU GANG 3 RT 06 RW 03 KEDU TEMANGGUNG\r\n', '085740525073', NULL, 0, '2019-09-03 11:53:21', 0, ''),
('309128', 'WITDIYONO', '3323090612870003', 20, 'KRAJAN RT 04 RW 01 PETIREJO, NGADIREJO\r\n', '08562954020', NULL, 0, '2019-09-05 09:47:03', 0, ''),
('3101144', 'ZULFA KHOIRUL UMAM', '3323134206000002', 20, 'TEGALSARI 7/4 PURWOSARI KRANGGAN\r\n', '081391222174', NULL, 0, '2019-09-06 06:39:33', 0, ''),
('404147', 'GRENIDIA AMELIA W', '3307086703000001', 4, 'RECO 07/08 KERTEK WONOSOBO\r\n', '082198393656', NULL, 0, '2019-09-02 11:46:33', 0, ''),
('404148', 'FATKHUL AZIZ', '3323200706970001', 4, 'SESEH 01/09 NGADISEPI GEMAWANG\r\n', '082329443402', NULL, 0, '2019-09-05 09:37:33', 0, ''),
('407110', 'MAHA RESI ANDY SETYAWAN', '331340710800003', 13, 'KARANGANYAR, 07 OKTOBER 1980\r\n', '085726162896', NULL, 0, '2019-09-03 11:41:30', 0, ''),
('407112', 'BEKTI YUNI MAHARANI', '3323204906950001', 3, 'DSN BABADAN 04/07 KEMIRIOMBO GEMAWANG\r\n', '081228502770', NULL, 0, '2019-09-05 09:28:59', 0, ''),
('407113', 'SANTOSO ADI SAPUTRO', '3307082709850003', 4, 'DSN RECO RT 05 RW 08 DESA RECO KERTEK WONOSOBO\r\n', '082335735696', NULL, 0, '2019-09-04 14:34:40', 0, ''),
('407115', 'ELIS DWI SETYARANI', '3323174601830004', 4, 'BATURSARI RT 03/02 KLEDUNG TEMANGGUNG\r\n', '085225563285', NULL, 0, '2019-09-06 06:33:05', 0, ''),
('412002', 'RETNO EKO ASTUTI,A.MD', '3323105412940001', 3, 'DSN. GONDANG BAWANG RT 05 RW 02 JUMO TEMANGGUNG\r\n', '085728660800', NULL, 0, '2019-09-02 11:25:19', 0, ''),
('413003', 'AGUS SUPRIYANTO', '3323010902770001', 20, 'MENAYU RT 02 RW 02 BULU TEMANGGUNG\r\n', '082134579953', NULL, 0, '2019-09-06 06:37:47', 0, ''),
('503094', 'RADEN BAGUS SETYA AJI NUGROHO', '3301061504920003', 14, 'DRINGA RT 03 RW 07 TLOGOPUCANG KANDANGAN\r\n', '0895384915113', NULL, 0, '2019-09-03 09:51:14', 0, ''),
('503096', 'GHUFRON MACHMUD', '3323073009910001', 4, 'MRIAN KULON RT 01 RW 03 KUNDISARI KEDU\r\n', '081214480398', NULL, 0, '2019-09-05 09:35:45', 0, ''),
('503097', 'KRISTI NALARATIH', '3323106305920001', 4, 'JAMUSAN RT 09 RW 01 JAMUSAN JUMO TEMANGGUNG\r\n', '08985105408', NULL, 0, '2019-09-04 14:36:28', 0, ''),
('503149', 'ERNI SETYOWATI', '3323105404950001', 3, 'CARIKAN II RT 03 RW 01 KERTOSARI JUMO TEMANGGUNG\r\n', '085742298050', NULL, 0, '2019-09-03 11:57:42', 0, ''),
('614007', 'Septi Dwi R', '3323075809870001', 2, 'KEROKAN RT 02 RW 01 KUTOANYAR KEDU TEMANGGUNG\r\n', '087734202339', NULL, 0, '2019-09-02 13:50:43', 0, ''),
('811080', 'TRI ADRIANI', '3323204907940002', 4, 'KARANG MANGGIS RT 03 RW 03 KARANGSENENG GEMAWANG\r\n', '085601896665', NULL, 0, '2019-09-05 09:39:55', 0, ''),
('811082', 'EVI FITRI ASTUTI', '3323096302980001', 4, 'GEDEGAN RT 03 RW 08 GIRIPURNO NGADIREJO\r\n', '082133317551', NULL, 0, '2019-09-02 11:30:58', 0, ''),
('811083', 'DEVI PRASTYA', '3323106209970001', 4, 'DERMONGANTI RT 01 RW 04 KETITANG JUMO\r\n', '085801290189', NULL, 0, '2019-09-02 11:44:36', 0, ''),
('811120', 'KHAFIF', '332310712920001', 18, 'GONDOSULI RT 05 RW 01 TEMANGGUNG\r\n', '085693883076', NULL, 0, '2019-09-03 12:08:13', 0, ''),
('814009', 'FINA SOFIANA', '3323095105950004', 16, 'DUSUN SUSUKAN RT 01 RW 04 PURBOSARI NGADIREJO TEMANGGUNG\r\n', '085643964764', NULL, 0, '2019-09-05 12:14:39', 0, ''),
('902145', 'NANANG SULISTYO', '3323082905960001', 20, 'DIWEK SUNGGINGSARI RT 03 RW 03 PARAKAN \r\n', '089513214143', NULL, 0, '2019-09-04 14:30:21', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawanijasah`
--

CREATE TABLE `karyawanijasah` (
  `kij_id` int(11) NOT NULL,
  `kar_kode` varchar(25) NOT NULL COMMENT 'fk dr karyawan',
  `kij_sd` varchar(40) DEFAULT NULL,
  `kij_smp` varchar(40) DEFAULT NULL,
  `kij_sma` varchar(40) DEFAULT NULL,
  `kij_d3` varchar(40) DEFAULT NULL,
  `kij_s1` varchar(40) DEFAULT NULL,
  `kij_s2` varchar(40) DEFAULT NULL,
  `kij_s3` varchar(40) DEFAULT NULL,
  `kij_lainlain` varchar(40) DEFAULT NULL,
  `kij_status` tinyint(2) NOT NULL,
  `kij_tgl` datetime NOT NULL,
  `kij_flag` tinyint(2) NOT NULL,
  `kij_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawanijasah`
--

INSERT INTO `karyawanijasah` (`kij_id`, `kar_kode`, `kij_sd`, `kij_smp`, `kij_sma`, `kij_d3`, `kij_s1`, `kij_s2`, `kij_s3`, `kij_lainlain`, `kij_status`, `kij_tgl`, `kij_flag`, `kij_info`) VALUES
(3, '2708005', '-', '', 'SMK DN-03 MK 0012345', '', '', '', '', NULL, 0, '2019-08-27 07:38:45', 0, ''),
(4, '2708006', '-', '', '', '', 'S1/123/23/M', '', '', NULL, 0, '2019-08-27 07:47:19', 0, ''),
(6, '1209001', '-', '', '', '', '', '', '', NULL, 0, '2019-09-02 11:20:00', 0, ''),
(7, '412002', '-', 'SMP DN-03 DI 0239702', '', '', '', '', '', NULL, 0, '2019-09-02 11:25:19', 0, ''),
(8, '811082', '-', '', 'SMK DN-03 MK/06 004683', '', '', '', '', NULL, 0, '2019-09-02 11:30:58', 0, ''),
(9, '2407075', '-', '', 'SMK DN-03 MK 0093604', '', '', '', '', NULL, 0, '2019-09-02 11:34:21', 0, ''),
(10, '2806151', '-', 'SMP DN-03 DI/06 0135946', '', '', '', '', '', NULL, 0, '2019-09-02 11:36:54', 0, ''),
(11, '1307155', '-', 'SMP DN-03 DI 0152411', '', '', '', '', '', NULL, 0, '2019-09-02 11:40:37', 0, ''),
(12, '1608161', '-', 'SMP DN-03 DI/06 0140373', 'SMK M-SMK/13-3/0312955', '', '', '', '', NULL, 0, '2019-09-02 11:42:31', 0, ''),
(13, '811083', '-', 'MTs MTS.021/11.23/PP.01.1', '', '', '', '', '', NULL, 0, '2019-09-02 11:44:36', 0, ''),
(14, '404147', '-', '', 'SMA DN-Ma/13 150002196', '', '', '', '', NULL, 0, '2019-09-02 11:46:33', 0, ''),
(15, '1601138', '-', '', 'SMK DN-03 Mk 0054408', '', '', '', '', NULL, 0, '2019-09-02 11:48:19', 0, ''),
(16, '0116018', '-', '-', '03. 0A od 0025348', '-', '-', '-', '-', '', 0, '2019-09-02 12:39:05', 1, ''),
(17, '1116050', '-', '', 'DN-03 Mk 0001867', '', '', '', '', NULL, 0, '2019-09-02 12:44:58', 0, ''),
(18, '0806071', '-', '03 DI 0095316', '03-MU 0135937', '', '', '', '', '', 0, '2019-09-02 12:51:50', 1, ''),
(19, '1610079', 'DN-03 Dd 0174077', '', '', '', '', '', '', NULL, 0, '2019-09-02 12:57:17', 0, ''),
(20, '1211134', '-', '', 'DN-Mk/13 0190496', '', '', '', '', NULL, 0, '2019-09-02 13:01:02', 0, ''),
(21, '214005', '-', 'DN-03 DI 0159442', '', '', '', '', '', NULL, 0, '2019-09-02 13:16:26', 0, ''),
(23, '0116019', '-', '', 'DN-03 MK 0007035', '', '', '', '', '', 0, '2019-09-02 13:38:53', 1, ''),
(24, '614007', '-', '', 'MA 0091870', '', '', '', '', NULL, 0, '2019-09-02 13:50:43', 0, ''),
(25, '0116021', '-', '', '', '', '2752/S1/RG.LII/TI/0III/20', '', '', '', 0, '2019-09-03 09:46:45', 1, ''),
(26, '503094', '-', 'SMP 03PB0101684 085909', '', '', '', '', '', NULL, 0, '2019-09-03 09:51:14', 0, ''),
(27, '0806072', '-', 'SMP DN-03 DI 0153087', '', '', '', '', '', '', 0, '2019-09-03 11:27:47', 1, ''),
(28, '0815015', '-', '', '', '', '3186/UMY/5/0160/2015 (13-', '', '', '', 0, '2019-09-03 11:30:36', 1, ''),
(29, '1016044', '-', '', 'SMK DN-03 MK 0131772', '', '', '', '', NULL, 0, '2019-09-03 11:36:51', 0, ''),
(30, '2401093', '03 0A OA 0493036', '', '', '', '', '', '', NULL, 0, '2019-09-03 11:39:08', 0, ''),
(31, '407110', '-', '', '', '2.01005458', '', '', '', NULL, 0, '2019-09-03 11:41:30', 0, ''),
(32, '1701142', '-', '', '', '', '6.12012E+14', '', '', NULL, 0, '2019-09-03 11:43:58', 0, ''),
(33, '1016040', '-', 'SMP DN-03 DI 0239311', '', '', '', '', '', NULL, 0, '2019-09-03 11:46:50', 0, ''),
(34, '2806154', '-', '', 'SMK DN-03 MK 0134315', '', '', '', '', NULL, 0, '2019-09-03 11:48:38', 0, ''),
(35, '204098', '-', '', 'SMA DN-03 MA 0023616', '', '2017201127', '', '', NULL, 0, '2019-09-03 11:51:14', 0, ''),
(36, '307108', '-', '', 'SMK DN-03 MK 0159332', '', '0058.0101.1.51.0416', '', '', NULL, 0, '2019-09-03 11:53:21', 0, ''),
(37, '0815013', 'DN-03 Dd 0354870', 'SMP DN-03 D1 0153302', '', '', '', '', '', '', 0, '2019-09-03 11:55:34', 1, ''),
(38, '503149', '-', '', 'SMA DN-03 Ma 0024691', '', '', '', '', NULL, 0, '2019-09-03 11:57:42', 0, ''),
(39, '2103146', '-', '', 'SMA DN-03 Ma 0022497', '', '', '', '', NULL, 0, '2019-09-03 11:59:34', 0, ''),
(40, '1701141', '-', '', '', '', '6.12012E+14', '', '', NULL, 0, '2019-09-03 12:02:24', 0, ''),
(41, '1016042', '-', 'MTs 068176 E.IV/K/MTS/B.8', '', '', '', '', '', NULL, 0, '2019-09-03 12:05:12', 0, ''),
(42, '811120', 'LAIN LAIN DN-30 PC 001578', '', '', '', '', '', '', NULL, 0, '2019-09-03 12:08:13', 0, ''),
(43, '1306103', 'Sertifikat Satpam 532/VI/', '', '', '', '', '', '', NULL, 0, '2019-09-05 08:07:10', 0, ''),
(44, '1604099', 'Sertifikat satpam IJ/4590', '', 'SMK DN-03 MK 0146172', '', '', '', '', NULL, 0, '2019-09-05 08:12:21', 0, ''),
(45, '1907118', 'AKTA HIBAH DAN LETER C', '', '', '', '', '', '', NULL, 0, '2019-09-05 08:14:39', 0, ''),
(46, '2207160', '-', '', 'SMK DN-03 MK 0199391', '', '', '', '', NULL, 0, '2019-09-05 08:16:25', 0, ''),
(47, '2808162', 'Sertifikat Satpam 2017/85', '', 'SMK DN-03 MK/06 0029223', '', '', '', '', NULL, 0, '2019-09-05 08:18:17', 0, ''),
(48, '0716033', '-', '', '', '', '', '', '', '', 0, '2019-09-05 09:20:57', 1, ''),
(49, '0415024', 'DN-03 Dd 1350381', 'MTs MTs 11 0090565', 'SMK DN-03 MK 0187022', '', '', '', '', '', 0, '2019-09-05 09:24:20', 1, ''),
(50, '0416027', '-', '', '', '', '590/UNMER-PO/FH/5-1/2007', '', '', '', 0, '2019-09-05 09:26:47', 1, ''),
(51, '407112', '-', '', '', '', '003983/S/FKIP/PGSD/B/17', '', '', '', 0, '2019-09-05 09:28:59', 0, ''),
(52, '2411084', '-', '', '', '', '', '', '', 'DN-03 PC 006125', 0, '2019-09-05 09:33:47', 0, ''),
(53, '503096', '-', '', 'SMK DN-03 MK 0090564', '', '', '', '', '', 0, '2019-09-05 09:35:45', 0, ''),
(54, '404148', '-', '', 'SMK DN-03 Mk/06 0001398', '', '', '', '', '', 0, '2019-09-05 09:37:33', 0, ''),
(55, '811080', '-', '', 'SMA DN-03 MA 0025336', '', '', '', '', '', 0, '2019-09-05 09:39:55', 0, ''),
(56, '309128', '-', 'Mts 0323599', '', '', '', '', '', 'SKET/16/V/2005', 0, '2019-09-05 09:47:03', 0, ''),
(57, '302101', '-', 'SMP 03 DI 0849605', '', '', '', '', '', '', 0, '2019-09-05 09:57:21', 0, ''),
(58, '2405070', '-', 'SMP 03-DI 0858047', '', '', '', '', '', '', 0, '2019-09-05 11:31:18', 0, ''),
(59, '0816036', '-', 'SMP DN-03DI 0158144', 'SMA DN-03 Ma 0022316', '', '', '', '', '', 0, '2019-09-05 11:36:12', 0, ''),
(60, '0416023', '-', '', 'MA 11015665', '', '', '', '', '', 0, '2019-09-05 11:45:38', 0, ''),
(61, '307107', '-', '', 'SMK DN-03 MK/06 0052317', '', '', '', '', '', 0, '2019-09-05 11:55:16', 0, ''),
(62, '1211136', '-', '', '', '', '17 2471 02 2261', '', '', '', 0, '2019-09-05 11:57:17', 0, ''),
(63, '2806150', '-', '', 'SMK DN-03 Mk 0099046', '', '', '', '', '', 0, '2019-09-05 12:02:25', 0, ''),
(64, '2806153', '-', 'SMP DN-03 DI/13 0019781', '', '', '', '', '', '', 0, '2019-09-05 12:06:00', 0, ''),
(65, '215011', '-', 'SMP DN-03 D1 0154120', 'SMK DN-03 MK 0166705', '', '', '', '', '', 0, '2019-09-05 12:08:06', 0, ''),
(66, '1016046', '-', '', 'MA 110000888', '', '', '', '', '', 0, '2019-09-05 12:10:22', 0, ''),
(67, '814009', '-', 'SMP DN-03 D1 0151413', 'SMA DN-03 Ma 0022627', '', '', '', '', '', 0, '2019-09-05 12:14:39', 0, ''),
(68, '1211131', '-', '', 'SMK DN-03 Mk 0074207', '', '', '', '', '', 0, '2019-09-05 12:19:16', 0, ''),
(69, '1016049', '-', '', 'SMK DN-03 MK 0138798', '', '', '', '', '', 0, '2019-09-05 12:21:57', 0, ''),
(70, '1216060', '-', '', 'SMK DN-03 MK 0159329', '', '000366/5/FKIP/PE/B/16', '', '', '', 0, '2019-09-05 12:24:22', 0, ''),
(71, '1610078', '-', '', '110030614 MA.001/11.23/PP.01.1/0160/2013', '', '', '', '', '', 0, '2019-09-05 12:26:30', 0, ''),
(72, '2112089', '03/OA/oa 0534010', '03 DI 0264242', 'DN-03 Mu 0142315', '', '', '', '', 'RA MSYITOH WADAS 1', 0, '2019-09-05 12:28:53', 0, ''),
(73, '2806152', '-', 'DN-03 DI/06 0139706', '', '', '', '', '', '', 0, '2019-09-05 12:30:43', 0, ''),
(74, '1016048', '-', 'DN-03 DI 0120926', '', '', '', '', '', '', 0, '2019-09-04 14:05:54', 0, ''),
(75, '1115016', 'DN-03 Dd 0177503', 'DN-03 D1 0120364', '', '', '', '', '', '', 0, '2019-09-04 14:14:33', 0, ''),
(76, '2411088', '-', '', 'SMK DN-03 MK/13 0082624', '', '', '', '', '', 0, '2019-09-04 14:24:00', 0, ''),
(77, '1211133', '-', '', 'SMK DN-03 Mk 0098975', '', '', '', '', '', 0, '2019-09-04 14:26:15', 0, ''),
(78, '1112137', '-', 'DN-03 DI 0241679', 'DN-03 Mk 0090536', '', '', '', '', 'IJ/461220/V/2018', 0, '2019-09-04 14:28:34', 0, ''),
(79, '902145', '-', 'DN-03 DO 0158117', '', '', '', '', '', 'SKL NO: 367/GITDIV.DIK/SKL/XII-2018', 0, '2019-09-04 14:30:21', 0, ''),
(80, '0516031', '-', '', 'DN-03 MK 0166672', '', '', '', '', '', 0, '2019-09-04 14:32:43', 0, ''),
(81, '407113', '-', '', '', '', 'CE131012/12013423380', '', '', '', 0, '2019-09-04 14:34:40', 0, ''),
(82, '503097', '-', '', 'DN-03 MK 0083789', '', '', '', '', '', 0, '2019-09-04 14:36:28', 0, ''),
(83, '108123', '-', 'DN-05 DI 0191039', '', '', '', '', '', '', 0, '2019-09-04 14:38:10', 0, ''),
(84, '1216063', '-', 'DN-03 DI 0143319', 'DN-03 MK/06 0088206', '', '', '', '', '', 0, '2019-09-04 14:41:39', 0, ''),
(85, '1307159', '-', '', '', '', '423/PSIK/2015', '', '', '', 0, '2019-09-04 14:43:18', 0, ''),
(86, '1307158', '-', '', 'DN-03 MK 0118579', '', '', '', '', '', 0, '2019-09-04 14:44:47', 0, ''),
(87, '0116020', '-', '', 'DN-03 Ma 0024849', 'E. 016415/351.066/PL4.6/2015', '', '', '', '', 0, '2019-09-04 14:48:46', 0, ''),
(88, '1307157', '-', '', '', '', 'SKI 00448', '', '', '', 0, '2019-09-04 14:50:29', 0, ''),
(89, '2604100', '-', '', 'DN-03 MK 0118583', '', '', '', '', '', 0, '2019-09-04 14:55:00', 0, ''),
(90, '1601139', '-', '', 'DN-Mk/06 0398525', '', '', '', '', '', 0, '2019-09-06 06:26:02', 0, ''),
(91, '0806073', '-', '03 0A OB 0582780 ', '03 0B 0F 103118650', '', '62 1053 H', '', '', '', 0, '2019-09-06 06:29:20', 0, ''),
(92, '2401092', '-', '', '', '', '', '', '', '', 0, '2019-09-06 06:30:59', 0, ''),
(93, '407115', '-', '', '03 MU 0116457', '', '', '', '', '', 0, '2019-09-06 06:33:05', 0, ''),
(94, '1307156', '-', '', 'DN-03 MK 0052974', '', '', '', '', '', 0, '2019-09-06 06:35:11', 0, ''),
(95, '413003', '-', '03 OA ob 0574138', '', '', '', '', '', 'AKTA KELAHIRAN (6502/DIS/1988)', 0, '2019-09-06 06:37:47', 0, ''),
(96, '3101144', '-', '', 'DN-03 Ma/06 0013880', '', '', '', '', 'IJ/462624/VIII/2018', 0, '2019-09-06 06:39:33', 0, ''),
(97, '1701140', '-', '', 'DN-03 Mk 0218458', '', '', '', '', 'SKCK', 0, '2019-09-06 06:41:13', 0, ''),
(98, '2410129', '-', 'DN-03 DI 0152577', 'DN-Mk/06 0306027', '', '', '', '', '', 0, '2019-09-06 06:44:20', 0, ''),
(99, '3009130', '-', '', '', '', '', '', '', 'AKTA AL 6780097607 / BUKU NIKAH 0312651', 0, '2019-09-04 06:49:01', 0, ''),
(100, '1207163', '-', '', '', '', '', '', '', '', 0, '2019-09-04 06:55:07', 0, ''),
(101, '1207164', '-', '', '', '', '', '', '', 'SERTIFIKAT', 0, '2019-09-04 06:56:46', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawansimpanan`
--

CREATE TABLE `karyawansimpanan` (
  `ksi_id` int(11) NOT NULL,
  `kar_kode` varchar(20) NOT NULL COMMENT 'fk dr karyawan',
  `ksi_simpanan` float NOT NULL,
  `ksi_status` tinyint(2) NOT NULL,
  `ksi_tgl` datetime NOT NULL,
  `ksi_flag` tinyint(2) NOT NULL,
  `ksi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawansimpanan`
--

INSERT INTO `karyawansimpanan` (`ksi_id`, `kar_kode`, `ksi_simpanan`, `ksi_status`, `ksi_tgl`, `ksi_flag`, `ksi_info`) VALUES
(5, '2708004', 2000000, 0, '2019-08-27 07:26:24', 0, ''),
(6, '2708005', 2000000, 0, '2019-08-27 07:38:45', 0, ''),
(7, '2708006', 2000000, 0, '2019-08-27 07:47:19', 0, ''),
(9, '1209001', 0, 0, '2019-09-02 11:20:00', 0, ''),
(10, '412002', 2000000, 0, '2019-09-02 11:25:19', 0, ''),
(11, '811082', 2000000, 0, '2019-09-02 11:30:58', 0, ''),
(12, '2407075', 2000000, 0, '2019-09-02 11:34:21', 0, ''),
(13, '2806151', 2000000, 0, '2019-09-02 11:36:54', 0, ''),
(14, '1307155', 2000000, 0, '2019-09-02 11:40:37', 0, ''),
(15, '1608161', 2000000, 0, '2019-09-02 11:42:31', 0, ''),
(16, '811083', 2000000, 0, '2019-09-02 11:44:36', 0, ''),
(17, '404147', 2000000, 0, '2019-09-02 11:46:33', 0, ''),
(18, '1601138', 2000000, 0, '2019-09-02 11:48:19', 0, ''),
(19, '0116018', 2000000, 0, '2019-09-02 12:39:05', 0, ''),
(20, '1116050', 2000000, 0, '2019-09-02 12:44:58', 0, ''),
(21, '0806071', 2000000, 0, '2019-09-02 12:51:50', 0, ''),
(22, '1610079', 2000000, 0, '2019-09-02 12:57:17', 0, ''),
(23, '1211134', 2000000, 0, '2019-09-02 13:01:02', 0, ''),
(24, '214005', 2000000, 0, '2019-09-02 13:16:26', 0, ''),
(26, '0116019', 2000000, 0, '2019-09-02 13:38:53', 0, ''),
(27, '614007', 2000000, 0, '2019-09-02 13:50:43', 0, ''),
(28, '0116021', 2000000, 0, '2019-09-03 09:46:45', 0, ''),
(29, '503094', 2000000, 0, '2019-09-03 09:51:14', 0, ''),
(30, '0806072', 2000000, 0, '2019-09-03 11:27:47', 0, ''),
(31, '0815015', 3000000, 0, '2019-09-03 11:30:36', 0, ''),
(32, '1016044', 2000000, 0, '2019-09-03 11:36:51', 0, ''),
(33, '2401093', 2000000, 0, '2019-09-03 11:39:08', 0, ''),
(34, '407110', 2000000, 0, '2019-09-03 11:41:30', 0, ''),
(35, '1701142', 2000000, 0, '2019-09-03 11:43:58', 0, ''),
(36, '1016040', 2000000, 0, '2019-09-03 11:46:50', 0, ''),
(37, '2806154', 2000000, 0, '2019-09-03 11:48:38', 0, ''),
(38, '204098', 2000000, 0, '2019-09-03 11:51:14', 0, ''),
(39, '307108', 2000000, 0, '2019-09-03 11:53:21', 0, ''),
(40, '0815013', 3000000, 0, '2019-09-03 11:55:34', 0, ''),
(41, '503149', 2000000, 0, '2019-09-03 11:57:42', 0, ''),
(42, '2103146', 2000000, 0, '2019-09-03 11:59:34', 0, ''),
(43, '1701141', 2000000, 0, '2019-09-03 12:02:24', 0, ''),
(44, '1016042', 2000000, 0, '2019-09-03 12:05:12', 0, ''),
(45, '811120', 2000000, 0, '2019-09-03 12:08:13', 0, ''),
(46, '1306103', 2000000, 0, '2019-09-05 08:07:10', 0, ''),
(47, '1604099', 2000000, 0, '2019-09-05 08:12:21', 0, ''),
(48, '1907118', 2000000, 0, '2019-09-05 08:14:39', 0, ''),
(49, '2207160', 2000000, 0, '2019-09-05 08:16:25', 0, ''),
(50, '2808162', 2000000, 0, '2019-09-05 08:18:17', 0, ''),
(51, '0716033', 0, 0, '2019-09-05 09:20:57', 0, ''),
(52, '0415024', 2000000, 0, '2019-09-05 09:24:20', 0, ''),
(53, '0416027', 2000000, 0, '2019-09-05 09:26:47', 0, ''),
(54, '407112', 2000000, 0, '2019-09-05 09:28:59', 0, ''),
(55, '2411084', 5000000, 0, '2019-09-05 09:33:47', 0, ''),
(56, '503096', 2000000, 0, '2019-09-05 09:35:45', 0, ''),
(57, '404148', 2000000, 0, '2019-09-05 09:37:33', 0, ''),
(58, '811080', 2000000, 0, '2019-09-05 09:39:55', 0, ''),
(59, '309128', 2000000, 0, '2019-09-05 09:47:03', 0, ''),
(60, '302101', 2000000, 0, '2019-09-05 09:57:21', 0, ''),
(61, '2405070', 2000000, 0, '2019-09-05 11:31:18', 0, ''),
(62, '0816036', 2000000, 0, '2019-09-05 11:36:12', 0, ''),
(63, '0416023', 2000000, 0, '2019-09-05 11:45:38', 0, ''),
(64, '307107', 2000000, 0, '2019-09-05 11:55:16', 0, ''),
(65, '1211136', 2000000, 0, '2019-09-05 11:57:17', 0, ''),
(66, '2806150', 2000000, 0, '2019-09-05 12:02:25', 0, ''),
(67, '2806153', 2000000, 0, '2019-09-05 12:06:00', 0, ''),
(68, '215011', 2000000, 0, '2019-09-05 12:08:06', 0, ''),
(69, '1016046', 2000000, 0, '2019-09-05 12:10:22', 0, ''),
(70, '814009', 2000000, 0, '2019-09-05 12:14:39', 0, ''),
(71, '1211131', 2000000, 0, '2019-09-05 12:19:16', 0, ''),
(72, '1016049', 2000000, 0, '2019-09-05 12:21:57', 0, ''),
(73, '1216060', 2000000, 0, '2019-09-05 12:24:22', 0, ''),
(74, '1610078', 2000000, 0, '2019-09-05 12:26:30', 0, ''),
(75, '2112089', 2000000, 0, '2019-09-05 12:28:53', 0, ''),
(76, '2806152', 2000000, 0, '2019-09-05 12:30:43', 0, ''),
(77, '1016048', 2000000, 0, '2019-09-04 14:05:54', 0, ''),
(78, '1115016', 2000000, 0, '2019-09-04 14:14:33', 0, ''),
(79, '2411088', 2000000, 0, '2019-09-04 14:24:00', 0, ''),
(80, '1211133', 2000000, 0, '2019-09-04 14:26:15', 0, ''),
(81, '1112137', 2000000, 0, '2019-09-04 14:28:34', 0, ''),
(82, '902145', 2000000, 0, '2019-09-04 14:30:21', 0, ''),
(83, '0516031', 2000000, 0, '2019-09-04 14:32:43', 0, ''),
(84, '407113', 2000000, 0, '2019-09-04 14:34:40', 0, ''),
(85, '503097', 2000000, 0, '2019-09-04 14:36:28', 0, ''),
(86, '108123', 2000000, 0, '2019-09-04 14:38:10', 0, ''),
(87, '1216063', 2000000, 0, '2019-09-04 14:41:39', 0, ''),
(88, '1307159', 2000000, 0, '2019-09-04 14:43:18', 0, ''),
(89, '1307158', 2000000, 0, '2019-09-04 14:44:47', 0, ''),
(90, '0116020', 2000000, 0, '2019-09-04 14:48:46', 0, ''),
(91, '1307157', 2000000, 0, '2019-09-04 14:50:29', 0, ''),
(92, '2604100', 2000000, 0, '2019-09-04 14:55:00', 0, ''),
(93, '1601139', 2000000, 0, '2019-09-06 06:26:02', 0, ''),
(94, '0806073', 2000000, 0, '2019-09-06 06:29:20', 0, ''),
(95, '2401092', 2000000, 0, '2019-09-06 06:30:59', 0, ''),
(96, '407115', 2000000, 0, '2019-09-06 06:33:05', 0, ''),
(97, '1307156', 2000000, 0, '2019-09-06 06:35:11', 0, ''),
(98, '413003', 2000000, 0, '2019-09-06 06:37:47', 0, ''),
(99, '3101144', 2000000, 0, '2019-09-06 06:39:33', 0, ''),
(100, '1701140', 2000000, 0, '2019-09-06 06:41:13', 0, ''),
(101, '2410129', 2000000, 0, '2019-09-06 06:44:20', 0, ''),
(102, '3009130', 0, 0, '2019-09-04 06:49:01', 0, ''),
(103, '1207163', 0, 0, '2019-09-04 06:55:07', 0, ''),
(104, '1207164', 0, 0, '2019-09-04 06:56:46', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `keluargakaryawan`
--

CREATE TABLE `keluargakaryawan` (
  `kka_id` int(11) NOT NULL,
  `kar_kode` varchar(20) NOT NULL COMMENT 'fk dr karyawan',
  `kka_nama` varchar(30) NOT NULL,
  `kka_hubungan` varchar(30) NOT NULL,
  `kka_alamat` text NOT NULL,
  `kka_nohp` varchar(20) NOT NULL,
  `kka_tgl` datetime NOT NULL,
  `kka_flag` tinyint(2) NOT NULL,
  `kka_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluargakaryawan`
--

INSERT INTO `keluargakaryawan` (`kka_id`, `kar_kode`, `kka_nama`, `kka_hubungan`, `kka_alamat`, `kka_nohp`, `kka_tgl`, `kka_flag`, `kka_info`) VALUES
(1, '2708004', 'Wakijo', 'Ayah', ' Kedu', '08976876565', '2019-08-27 07:26:24', 0, ''),
(2, '2708005', 'Andi', 'Ayah', ' Parakan', '0897865765', '2019-08-27 07:38:45', 0, ''),
(3, '2708006', 'aaaa', 'Ayah', ' Bulu', '0876765654', '2019-08-27 07:47:19', 0, ''),
(5, '1209001', 'LULUK BUDIANA', 'ISTRI', ' DSN. SROYO RT 08 RW 01 BOJONEGORO KEDU TEMANGGUNG\r\n', '08562890739', '2019-09-02 11:20:00', 0, ''),
(6, '412002', 'SRI HARYADI', 'AYAH', ' DSN. GONDANG BAWANG RT 05 RW 02 JUMO TEMANGGUNG\r\n', '085292037777', '2019-09-02 11:25:19', 0, ''),
(7, '811082', 'ROMIDIYANTO', 'AYAH', ' GEDEGAN RT 03 RW 08 GIRIPURNO NGADIREJO\r\n', '081227937511', '2019-09-02 11:30:58', 0, ''),
(8, '2407075', 'VITA WIRANTI', 'ISTRI', ' BANGUNSARI BANSARI TEMANGGUNG\r\n', '085708708613', '2019-09-02 11:34:21', 0, ''),
(9, '2806151', 'PARTINI', 'IBU KANDUNG', ' KEJI 2/3 GENTAN KRANGGAN\r\n', '085225240935', '2019-09-02 11:36:54', 0, ''),
(10, '1307155', 'DILA ERLINA', 'ADIK KANDUNG', ' KAYUTAHUN 4/2 BANARAN GEMAWANG\r\n', '085722211138', '2019-09-02 11:40:37', 0, ''),
(11, '1608161', 'RITA PUJIARTI', 'IBU KANDUNG', ' NGLARANG I 4/3 MANGUNSARI NGADIREJO TEMANGGUNG', '085842193379', '2019-09-02 11:42:31', 0, ''),
(12, '811083', 'SUKRIYANTO', 'AYAH', ' DERMONGANTI RT 01 RW 04 KETITANG JUMO\r\n', '085387902550', '2019-09-02 11:44:36', 0, ''),
(13, '404147', 'HERU', 'AYAH', ' RECO 07/08 KERTEK WONOSOBO', '082155123487', '2019-09-02 11:46:33', 0, ''),
(14, '1601138', 'MARDINA WAHYU INDARTI', 'IBU KANDUNG', ' DERMONGANTI RT 01 RW 03 KETITANG JUMO\r\n', '085299985365', '2019-09-02 11:48:19', 0, ''),
(15, '0116018', 'Mujiyono', 'Suami', 'PENDOWO RT 04 RW 17 PENDOWO KRANGGAN TEMANGGUNG\r\n', '081392137690', '2019-09-02 12:39:05', 0, ''),
(16, '1116050', 'EKO PRASETYO', 'Suami', ' PAGERJURANG RT 02 RW 02 JAMUSAN JUMO\r\n', '085712974694', '2019-09-02 12:44:58', 0, ''),
(17, '0806071', 'EKO MISGITANTO', 'Suami', ' GARUNG BUTUH KALIKAJAR WONOSOBO\r\n', '085227885051', '2019-09-02 12:51:50', 0, ''),
(18, '1610079', 'SUMIDI', 'Ayah', ' SEDELEP GEMAWNG\r\n', '81380488591', '2019-09-02 12:57:17', 0, ''),
(19, '1211134', 'SUWATI', 'IBU', ' KABUNAN RT 05 RW 01 BANDUNGGEDE KEDU\r\n', '081227107584', '2019-09-02 13:01:02', 0, ''),
(20, '214005', 'Wakijo', 'Ayah', ' DIWEK RT 05 RW 06 BOJONEGORO KEDU TEMANGGUNG', '081225193816', '2019-09-02 13:16:26', 0, ''),
(22, '0116019', 'MUJARI', 'Ayah', ' MUNCAR LOR', '085695566849', '2019-09-02 13:38:53', 0, ''),
(23, '614007', 'MUHAMMAD MAKRUF', 'Suami', ' KEROKAN RT 02 RW 01 KUTOANYAR KEDU TEMANGGUNG\r\n', '087834263105', '2019-09-02 13:50:43', 0, ''),
(24, '0116021', 'SUPRAPTO', 'AYAH', ' DSN.TANDURAN RT 01 RW 04 CATURANOM, \r\n', '081548221037', '2019-09-03 09:46:45', 0, ''),
(25, '503094', 'Rr. DWIYANTI BUDI UTAMI', 'KAKAK', ' BANDUNG\r\n', '085726589967', '2019-09-03 09:51:14', 0, ''),
(26, '0806072', 'SLAMET NARHADI', 'ADIK KANDUNG', ' SUMBERAN, PETIREJO NGADIREJO\r\n', '085803318605', '2019-09-03 11:27:47', 0, ''),
(27, '0815015', 'SUSMITARTI', 'IBU KANDUNG', ' BAJANGAN RT 04 RW 01 MANDISARI PARAKAN\r\n', '085290615763', '2019-09-03 11:30:36', 0, ''),
(28, '1016044', 'RONI', 'KAKAK', ' BATUR SARI RT 01 RW 01 KLEDUNG\r\n', '085878347924', '2019-09-03 11:36:51', 0, ''),
(29, '2401093', 'SULAMI', 'IBU KANDUNG', ' BUGEN RT 02 RW 01 GEBLOK KALORAN TEMANGGUNG\r\n', '082357541241', '2019-09-03 11:39:08', 0, ''),
(30, '407110', 'RINA WAHYU SUCI', 'ADIK KANDUNG', ' PETAK BLORANG JUMANTORO SOLO\r\n', '082323206767', '2019-09-03 11:41:30', 0, ''),
(31, '1701142', 'SUTARTO', 'AYAH', ' DS NGIMBRANG 2/1 BULU TEMANGGUNG \r\n', '081390306064', '2019-09-03 11:43:58', 0, ''),
(32, '1016040', 'ISNAENI HASTUTI', 'KAKAK', ' DSN. DOTAKAN RT 02 RW 02 MUNTUNG CANDIROTO\r\n', '085643545925', '2019-09-03 11:46:50', 0, ''),
(33, '2806154', 'ROBI', 'KAKAK', ' KAUMAN 4/3 MUNTUNG CANDIROTO\r\n', '085668377898', '2019-09-03 11:48:38', 0, ''),
(34, '204098', 'MUHAMMAD SAHLi', 'PAMAN', ' MEKARSARI RT 03 RW 05 MANDISARI PARAKAN', '082137348608', '2019-09-03 11:51:14', 0, ''),
(35, '307108', 'MASHUDI', 'AYAH', ' KEDU GANG 3 RT 06 RW 03 KEDU TEMANGGUNG', '085867380552', '2019-09-03 11:53:21', 0, ''),
(36, '0815013', 'SUPRAPTO', 'AYAH', ' CAMPURSALAM RT 02 RW 02 PARAKAN TEMANGGUNG', '085743960313', '2019-09-03 11:55:34', 0, ''),
(37, '503149', 'ERIN KURNIA NINGRUM', 'ADIK IPAR', ' TORO RT   RW   KERTOSARI JUMO TEMANGGUNG\r\n', '085725915050', '2019-09-03 11:57:42', 0, ''),
(38, '2103146', 'LILIK ASWATUN MUQODIMAH', 'IBU KANDUNG', ' SAWAHAN  1/2 TEGALSARI KEDU, TEMANGGUNG\r\n', '081393208667', '2019-09-03 11:59:34', 0, ''),
(39, '1701141', 'KHUSNIATUR ROFIAH', 'BUDHE', ' PARAKAN KAUMAN', '081578864118', '2019-09-03 12:02:24', 0, ''),
(40, '1016042', 'WALUYO', 'SAUDARA', ' CARIKAN III KERTOSARI JUMO\r\n', '085326676746', '2019-09-03 12:05:12', 0, ''),
(41, '811120', 'SUNAJAD', 'SAUDARA', ' GONDOSULI RT 05 RW 01 TEMANGGUNG', '085693883076', '2019-09-03 12:08:13', 0, ''),
(42, '1306103', 'HENI RESMININGSIH', 'ADIK KANDUNG', ' PURI KENCANA RT 02 RW 05 MANDING TEMANGGUNG\r\n', '085877608286', '2019-09-05 08:07:10', 0, ''),
(43, '1604099', 'RULY RETNO PERTIWI', 'ISTRI', ' MUNCAR KULON RT 03 RW 04 MUNCAR GEMAWANG\r\n', '085601000523', '2019-09-05 08:12:21', 0, ''),
(44, '1907118', 'WAHYUDI', 'KAKAK', ' BANJARAN, KRAMATAN, WONOSOBO\r\n', '081392171708', '2019-09-05 08:14:39', 0, ''),
(45, '2207160', 'ERNI SUSANTI', 'ISTRI', ' DALEM TEGOWANUH 3/1 KALORAN TEMANGGUNG', '085890050254', '2019-09-05 08:16:25', 0, ''),
(46, '2808162', 'IMAM MUSTAQIM', 'ADIK KANDUNG', ' LIMBO MAKMUR BUMIRAYA MAROWALI SULTENG ( CANDIMULYO KEDU)\r\n', '082296237751', '2019-09-05 08:18:17', 0, ''),
(47, '0716033', 'SAKRONI', 'ADIK KANDUNG', ' DSN WONOSROYO RT 001 RW 001 BOJONEGORO KEDU\r\n', '085647607857', '2019-09-05 09:20:57', 0, ''),
(48, '0415024', 'TUGIYATI', 'IBU KANDUNG', ' KARANG MANGGIS RT 01 RW 03 KARANG SENENG GEMAWANG', '085950601810', '2019-09-05 09:24:20', 0, ''),
(49, '0416027', 'LULUK BUDIANA', 'SEPUPU', ' WONOSROYO RT 8 RW 01 BOJONEGORO KEDU TEMNGGUNG\r\n', '08562890739', '2019-09-05 09:26:47', 0, ''),
(50, '407112', 'ANDHI AZIZ ANDUNG DEWANTO', 'KAKAK', ' GELANGAN TLOGOMULYO TEMANGGUNG\r\n', '081229066655', '2019-09-05 09:28:59', 0, ''),
(51, '2411084', 'SLAMET WIDODO', 'KAKAK', 'GIYONO JUMO ', '085292038757', '2019-09-05 09:33:47', 0, ''),
(52, '503096', 'WAHYUDI', 'AYAH', ' MRIAN KULON RT 01 RW 03 KUNDISARI KEDU\r\n', '085228503071', '2019-09-05 09:35:45', 0, ''),
(53, '404148', 'MUSTAVIN DEVAH MAYIS', 'ADIK KANDUNG', ' SESEH 01/09 NGADISEPI GEMAWANG', '085742296381', '2019-09-05 09:37:33', 0, ''),
(54, '811080', 'FATRIYADI', 'SUAMI', ' KARANG MANGGIS RT 03 RW 03 KARANGSENENG GEMAWANG', '082220116716', '2019-09-05 09:39:55', 0, ''),
(55, '309128', 'INTAN ARI SANTI', 'ISTRI', ' KRAJAN RT 04 RW 01 PETIREJO, NGADIREJO', '085228900232', '2019-09-05 09:47:03', 0, ''),
(56, '302101', 'AZIS NURAHMANTO', 'KAKAK', ' MERGAGDAN TIMUR YOGYAKARTA', '085600617280', '2019-09-05 09:57:21', 0, ''),
(57, '2405070', 'TRI UTAMI WAHYU NINGSIH', 'ISTRI', ' WADAS WETAN 02/07 WADAS KANDANGAN \r\n', '085641430043', '2019-09-05 11:31:18', 0, ''),
(58, '0816036', 'YAMIYAH', 'KAKAK', ' DSN. SUMBERAN DSN PETIREJO', '085291445836', '2019-09-05 11:36:12', 0, ''),
(59, '0416023', 'RESTU PRAMUJI', 'SUAMI', ' GROGOL RT 02 RW 02 KUTOANYAR KEDU TEMANGGUNG', '085942041255', '2019-09-05 11:45:38', 0, ''),
(60, '307107', 'WULAN RAMADHANI', 'ADIK KANDUNG', ' KARANGBENDO RT 02 RW 03 TEGALROSO PARAKAN TEMANGGUNG', '085700996843', '2019-09-05 11:55:16', 0, ''),
(61, '1211136', 'RAHARDIAN NUR LAILY AISYAH', 'ADIK KANDUNG', ' GABUNGAN RT 01 RW 09 TEGALSARI KEDU', '081327497763', '2019-09-05 11:57:17', 0, ''),
(62, '2806150', 'GAMANG WARDOYO', 'KAKAK', ' JUBUG 2/2 WANUTENGAH PARAKAN\r\n', '081393812767', '2019-09-05 12:02:25', 0, ''),
(63, '2806153', 'ZAENAL ARIFIN', 'AYAH', 'DSN. TAPAK 3/4 GIYONO JUMO ', '085228174424', '2019-09-05 12:06:00', 0, ''),
(64, '215011', 'PURWANTI', 'IBU KANDUNG', ' BANDUNG RT 02 RW 06 BANDUNGGEDE KEDU TEMANGGUNG', '085290195587', '2019-09-05 12:08:06', 0, ''),
(65, '1016046', 'WIDIYONO', 'SUAMI', ' BATUR SARI RT 01 RW 01 KLEDUNG\r\n', '085741985246', '2019-09-05 12:10:22', 0, ''),
(66, '814009', 'AAA', 'KAKAK', ' GARON RT 03 RW 05 PURBOSARI NGADIREJO\r\n', '081548218603', '2019-09-05 12:14:39', 0, ''),
(67, '1211131', 'ARI ARISTYO', 'SUAMI', ' DSN KRAJAN RT 02 RW 01 LEMPUYANG CANDIROTO TEMANGGUNG', '085234482946', '2019-09-05 12:19:16', 0, ''),
(68, '1016049', 'MARYUDI', 'AYAH', ' GARUNG BUTUH RT 09 RW 02 KALIKAJAR  WONOSOBO', '085291045393', '2019-09-05 12:21:57', 0, ''),
(69, '1216060', '085726648055', 'KAKAK', ' SANGKON TUKSARI RT 03 RW 02 KLEDUNG TEMANGGUNG\r\n', '085328338602', '2019-09-05 12:24:22', 0, ''),
(70, '1610078', 'ANDUNG JATI', 'ADIK KANDUNG', ' BANYUURIP RT 06 RW 02 BULU TEMANGGUNG', '085878523645', '2019-09-05 12:26:30', 0, ''),
(71, '2112089', 'WISNU WARDOYO ', 'ADIK KANDUNG', ' WADAS KULON RT 02 RW 07 WADAS KANDANGAN\r\n', '085743898057', '2019-09-05 12:28:53', 0, ''),
(72, '2806152', 'YANTI DWI YULIANTI', 'KAKAK', ' KRAJAN 5/1 PETIREJO NGADIREJO', '081228733693', '2019-09-05 12:30:43', 0, ''),
(73, '1016048', 'JUPIYAH', 'IBU KANDUNG', ' DSN SUCEN RT 05 TW 05 SUCEN GEMAWANG\r\n', '085802428501', '2019-09-04 14:05:54', 0, ''),
(74, '1115016', 'SUSANTO', 'KAKAK', ' BARANG WETAN (SUWIGNYO : CARIKAN 1 04/01 KERTOSARI JUMO)\r\n', '085877288244', '2019-09-04 14:14:33', 0, ''),
(75, '2411088', 'SEPTI SORAYA', 'KAKAK', ' KRAJAN RT 07 RW 01 LEMPUYUNG CANDIROTO\r\n', '082137744679', '2019-09-04 14:24:00', 0, ''),
(76, '1211133', 'EWIK NOVIANA', 'ADIK KANDUNG', ' JETIS KAUMAN RT 04 W 12 PARAKAN KAUMAN\r\n', '085840227375', '2019-09-04 14:26:15', 0, ''),
(77, '1112137', 'RINI MURDIANINGSING', 'KAKAK', ' TLOGOREJO TEMANGGUNG\r\n', '085743684397', '2019-09-04 14:28:34', 0, ''),
(78, '902145', 'PUJI RAHAYU', 'KAKAK', ' DIWEK SUNGGINGSARI RT 03 RW 03 PARAKAN \r\n', '085865772415', '2019-09-04 14:30:21', 0, ''),
(79, '0516031', 'ABDUL ROCHIM', 'AYAH', ' BALEKKERSO, GEDONGSARI JUMO ', '081903971069', '2019-09-04 14:32:43', 0, ''),
(80, '407113', 'SETYO NUGROHO', 'KAKAK', ' PERUM GREEN AMBARAWA RESIDENCE KELURAHAN POJOK SARI AMBARAWA SEMARANG\r\n', '081363635395', '2019-09-04 14:34:40', 0, ''),
(81, '503097', 'SETYO PRAMONO', 'AYAH', ' JAMUSAN RT 09 RW 01 JAMUSAN JUMO TEMANGGUNG\r\n', '087745611666', '2019-09-04 14:36:28', 0, ''),
(82, '108123', 'SONNY WIJATNARKO', 'AYAH', ' JL. LAWU GG I/43 P RT 004 RW 002, NOLOGATEN, PONOROGO', '082234688538', '2019-09-04 14:38:10', 0, ''),
(83, '1216063', 'WIDIYAWATI', 'IBU KANDUNG', ' TEGALURUNG RT 05 RW 01 BULU\r\n', '082137781071', '2019-09-04 14:41:39', 0, ''),
(84, '1307159', 'SIDIK SUPRAPTO', 'AYAH', ' WARUNGSARI NO 9 MANDISARI PARAKAN\r\n', '081392920045', '2019-09-04 14:43:18', 0, ''),
(85, '1307158', 'FATONI', 'AYAH', ' GONDANG DHUWUR 5/1 MANGGONG NGADIREJO', '085640714865', '2019-09-04 14:44:47', 0, ''),
(86, '0116020', 'ELLA FITRIASARI', 'KAKAK', ' PAKISAN RT 05 RW 05 CANDIMULYO KEDU TEMANGGUNG\r\n', '08562526657', '2019-09-04 14:48:46', 0, ''),
(87, '1307157', 'RUSMINAH', 'IBU KANDUNG', ' JURANG 2/1 KEMLOKO KRANGGAN', '082327725978', '2019-09-04 14:50:29', 0, ''),
(88, '2604100', 'TITIK SULAMIYATI', 'IBU KANDUNG', ' PRUPUGAN RT 04 RW 02 BOJONEGORO KEDU TEMANGGUNG\r\n', '085328085901', '2019-09-04 14:55:00', 0, ''),
(89, '1601139', 'YUYUN ARISTA', 'KAKAK', ' PAGERJURANG RT 02 RW 02 JAMUSAN JUMO\r\n', '085643328708', '2019-09-06 06:26:02', 0, ''),
(90, '0806073', 'DENI KURNIAWAN', 'ADIK KANDUNG', ' BANJARSARI RT 03 RW 01 KEBUMEN PRINGSURAT \r\n', '085642591805', '2019-09-06 06:29:20', 0, ''),
(91, '2401092', 'ARMIYANI', 'KAKAK', ' MANDANG RT 03 RW 02 SUCEN GEMAWANG TEMANGGUNG\r\n', '085741466922', '2019-09-06 06:30:59', 0, ''),
(92, '407115', 'DARWATI', 'SEPUPU', ' BATURSARI RT 02/01 KLEDUNG TEMANGGUNG\r\n', '085712975149', '2019-09-06 06:33:05', 0, ''),
(93, '1307156', 'MUHAMMAD SOLIKHIN', 'ADIK KANDUNG', ' KALIPAHING 2/3 NGADISEPI GEMAWANG', '081228960389', '2019-09-06 06:35:11', 0, ''),
(94, '413003', 'SUPRIHATIN ', 'ISTRI ', ' GENENG TEMANGGUNG / MENAYU RT 02 RW 02  MENAYU BULU TEMANGGUNG\r\n', '082138415161', '2019-09-06 06:37:47', 0, ''),
(95, '3101144', 'SITI FAROZAH', 'IBU KANDUNG', ' TEGALSARI 7/4 PURWOSARI KRANGGAN', '085726656684', '2019-09-06 06:39:33', 0, ''),
(96, '1701140', 'NOVIA', 'ISTRI', ' LINGKUNGAN SENDANG WALITELON SELATAN TEMANGGUNG', '088232889339', '2019-09-06 06:41:13', 0, ''),
(97, '2410129', 'SULFARI UTAMI', 'SAUDARA', ' DSN.TAPAK 001/004 GIYONO,JUMO, TEMANGGUNG\r\n', '085227012036', '2019-09-06 06:44:20', 0, ''),
(98, '3009130', 'SUDIYANTO', 'SUAMI', 'DSN KEPAL RT 003 RW 008 MERGOWATI KEDU ', '082138755685', '2019-09-04 06:49:01', 0, ''),
(99, '1207163', 'RETNO WULAN SARI', 'ISTRI', ' PERUM AZA GRIYA BLOK DI RT 2 RW 4 WALITELON UTARA 085747474801', '085740283973', '2019-09-04 06:55:07', 0, ''),
(100, '1207164', 'NASTIKHATUL A', 'ISTRI', ' BONDALEM RT 5 RW 2 MANGUNSARI NGADIREJO', '085799146107', '2019-09-04 06:56:46', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `keuntunganinvestasi`
--

CREATE TABLE `keuntunganinvestasi` (
  `kiv_id` int(10) NOT NULL,
  `pib_id` int(10) NOT NULL COMMENT 'fk dari penarikaninvestasiberjangka',
  `kiv_jmlkeuntungan` float NOT NULL,
  `kiv_tglkeuntungan` datetime NOT NULL,
  `kiv_tgl` datetime NOT NULL,
  `kiv_flag` tinyint(2) NOT NULL,
  `kiv_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klaimsimkesan`
--

CREATE TABLE `klaimsimkesan` (
  `ksi_id` int(10) NOT NULL,
  `sik_kode` varchar(25) NOT NULL COMMENT 'fk dari simkesan',
  `jkl_id` int(10) NOT NULL COMMENT 'fk dari jenisklaim',
  `ksi_tglklaim` datetime NOT NULL,
  `ksi_totalsetor` float NOT NULL,
  `ksi_jmlklaim` float NOT NULL,
  `ksi_jmltunggakan` float NOT NULL,
  `ksi_administrasi` float NOT NULL,
  `ksi_jmlditerima` float NOT NULL,
  `ksi_status` tinyint(1) NOT NULL,
  `ksi_tgl` datetime NOT NULL,
  `ksi_flag` tinyint(2) NOT NULL,
  `ksi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_access`
--

CREATE TABLE `master_access` (
  `id` int(11) NOT NULL,
  `nm_access` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_access`
--

INSERT INTO `master_access` (`id`, `nm_access`, `note`, `created_at`, `created_by`) VALUES
(1, 'M_USER', 'MENU USER', '0000-00-00 00:00:00', 0),
(5, 'M_LAPORAN', 'MENU LAPORAN', NULL, NULL),
(6, 'M_SISTEM', 'MENU SISTEM', NULL, NULL),
(7, 'M_SIMPANAN', 'ADMIN SIMPANAN', '2019-08-12 12:57:54', 1),
(8, 'M_PINJAMAN', 'ADMIN PINJAMAN', '2019-08-12 12:58:15', 1),
(9, 'M_SIMKESAN', 'ADMIN SIMKESAN', '2019-08-12 12:58:39', 1),
(10, 'M_INVESTASI', 'ADMIN INVESTASI', '2019-08-12 12:59:02', 1),
(11, 'M_UTILITAS', 'M_UTILITAS', '2019-08-29 07:09:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasiberjangka`
--

CREATE TABLE `mutasiberjangka` (
  `mib_id` int(10) NOT NULL,
  `ivb_kode` varchar(25) NOT NULL COMMENT 'fk dari investasiberjangka',
  `mib_tglmutasi` datetime NOT NULL,
  `mib_asal` varchar(25) NOT NULL,
  `mib_tujuan` varchar(25) NOT NULL,
  `mib_status` tinyint(1) NOT NULL,
  `mib_tgl` datetime NOT NULL,
  `mib_flag` tinyint(2) NOT NULL,
  `mib_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasipinjaman`
--

CREATE TABLE `mutasipinjaman` (
  `mup_id` int(15) NOT NULL,
  `pin_id` varchar(25) NOT NULL COMMENT 'fk dari pinjaman',
  `mup_tglmutasi` datetime NOT NULL,
  `mup_asal` varchar(25) NOT NULL,
  `mup_tujuan` varchar(25) NOT NULL,
  `mup_status` tinyint(1) NOT NULL,
  `mup_tgl` datetime NOT NULL,
  `mup_flag` tinyint(2) NOT NULL,
  `mup_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasisimkesan`
--

CREATE TABLE `mutasisimkesan` (
  `msk_id` int(10) NOT NULL,
  `sik_kode` varchar(25) NOT NULL COMMENT 'fk dari simkesan',
  `msk_tglmutasi` datetime NOT NULL,
  `msk_asal` varchar(25) NOT NULL,
  `msk_tujuan` varchar(25) NOT NULL,
  `msk_status` tinyint(1) NOT NULL,
  `msk_tgl` datetime NOT NULL,
  `msk_flag` tinyint(2) NOT NULL,
  `msk_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasisimpanan`
--

CREATE TABLE `mutasisimpanan` (
  `mus_id` int(11) NOT NULL,
  `sim_kode` varchar(25) NOT NULL COMMENT 'fk dari simpanan',
  `mus_tglmutasi` datetime NOT NULL,
  `mus_asal` varchar(25) NOT NULL,
  `mus_tujuan` varchar(25) NOT NULL,
  `mus_status` tinyint(1) NOT NULL,
  `mus_tgl` datetime NOT NULL,
  `mus_flag` tinyint(2) NOT NULL,
  `mus_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `neracaaktivatetap`
--

CREATE TABLE `neracaaktivatetap` (
  `nat_id` int(11) NOT NULL,
  `nat_tanah` float DEFAULT NULL,
  `nat_bangunan` float DEFAULT NULL,
  `nat_elektronik` float DEFAULT NULL,
  `nat_kendaraan` float DEFAULT NULL,
  `nat_peralatan` float DEFAULT NULL,
  `nat_akumulasipenyusutan` float DEFAULT NULL,
  `nat_tanggal` datetime NOT NULL,
  `nat_tgl` datetime NOT NULL,
  `nat_flag` tinyint(4) NOT NULL,
  `nat_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `neracaekuitas`
--

CREATE TABLE `neracaekuitas` (
  `nek_id` int(11) NOT NULL,
  `nek_tanggal` datetime NOT NULL,
  `nek_simpanancdr` float NOT NULL,
  `nek_donasi` float NOT NULL,
  `nek_tgl` datetime NOT NULL,
  `nek_flag` tinyint(2) NOT NULL,
  `nek_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `neracakasbank`
--

CREATE TABLE `neracakasbank` (
  `nkb_id` int(11) NOT NULL,
  `nkb_tanggal` datetime NOT NULL,
  `nkb_jumlah` float NOT NULL,
  `nkb_tgl` datetime NOT NULL,
  `nkb_flag` tinyint(4) NOT NULL,
  `nkb_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `neracakasbanksimkesan`
--

CREATE TABLE `neracakasbanksimkesan` (
  `nkbs_id` int(11) NOT NULL,
  `nkbs_tanggal` datetime NOT NULL,
  `nkbs_jumlah` float NOT NULL,
  `nkbs_tgl` datetime NOT NULL,
  `nkbs_flag` tinyint(4) NOT NULL,
  `nkbs_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `neracakewajibanjangkapanjang`
--

CREATE TABLE `neracakewajibanjangkapanjang` (
  `njp_id` int(11) NOT NULL,
  `njp_tanggal` datetime NOT NULL,
  `njp_rekeningkoran` float DEFAULT NULL,
  `njp_modalpenyertaan` float DEFAULT NULL,
  `njp_tgl` datetime NOT NULL,
  `njp_flag` tinyint(2) NOT NULL,
  `njp_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan`
--

CREATE TABLE `pelunasan` (
  `pel_id` int(11) NOT NULL,
  `pin_id` varchar(25) NOT NULL COMMENT 'fk dari pinjaman',
  `pel_jenis` tinyint(1) NOT NULL COMMENT '0=dipercepat 1=biasa 2=macet',
  `pel_tenor` tinyint(3) NOT NULL,
  `pel_angsuran` float NOT NULL,
  `pel_bungaangsuran` float NOT NULL,
  `pel_totalkekuranganpokok` float NOT NULL,
  `pel_totalbungapokok` float NOT NULL,
  `pel_bungatambahan` float NOT NULL,
  `pel_biayapenarikan` float DEFAULT NULL,
  `pel_totaldenda` float NOT NULL,
  `pel_tglpelunasan` datetime NOT NULL,
  `pel_tgl` datetime NOT NULL,
  `pel_flag` tinyint(2) NOT NULL,
  `pel_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penarikaninvestasiberjangka`
--

CREATE TABLE `penarikaninvestasiberjangka` (
  `pib_id` int(10) NOT NULL,
  `ivb_kode` varchar(25) NOT NULL COMMENT 'fk dari investasiberjangka',
  `pib_penarikanke` tinyint(3) NOT NULL,
  `pib_jmlkeuntungan` float NOT NULL,
  `pib_jmlditerima` float NOT NULL,
  `pib_tgl` datetime NOT NULL,
  `pib_flag` tinyint(2) NOT NULL,
  `pib_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penarikansimkesan`
--

CREATE TABLE `penarikansimkesan` (
  `pns_id` int(11) NOT NULL,
  `sik_kode` varchar(25) NOT NULL COMMENT 'fk dari simkesan',
  `jps_id` int(10) NOT NULL COMMENT 'fk dari jenispenarikansimkesan',
  `pns_tglpenarikan` datetime NOT NULL,
  `pns_totalsetor` float NOT NULL,
  `pns_jmlsimkesan` float NOT NULL,
  `pns_administrasi` float NOT NULL,
  `pns_jmlpenarikan` float NOT NULL,
  `pns_catatan` text NOT NULL,
  `pns_tgl` datetime NOT NULL,
  `pns_flag` tinyint(2) NOT NULL,
  `pns_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penarikansimpanan`
--

CREATE TABLE `penarikansimpanan` (
  `pes_id` int(11) NOT NULL,
  `sim_kode` varchar(25) NOT NULL COMMENT 'fk dari simpanan',
  `pes_tglpenarikan` datetime NOT NULL,
  `pes_saldopokok` float NOT NULL,
  `pes_bunga` float NOT NULL,
  `pes_jumlah` float NOT NULL,
  `pes_phbuku` float NOT NULL,
  `pes_administrasi` float NOT NULL,
  `pes_jmltarik` float NOT NULL,
  `pes_tgl` datetime NOT NULL,
  `pes_flag` tinyint(2) NOT NULL,
  `pes_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penarikansimpananwajib`
--

CREATE TABLE `penarikansimpananwajib` (
  `psw_id` int(11) NOT NULL,
  `siw_id` int(11) NOT NULL,
  `psw_tglpenarikan` datetime NOT NULL,
  `psw_jumlah` float NOT NULL,
  `psw_tgl` datetime NOT NULL,
  `psw_flag` tinyint(2) NOT NULL,
  `psw_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjamin`
--

CREATE TABLE `penjamin` (
  `pen_id` int(11) NOT NULL,
  `pin_id` varchar(25) NOT NULL COMMENT 'fk dari pinjaman',
  `pen_noktp` varchar(30) NOT NULL,
  `pen_nama` varchar(50) NOT NULL,
  `pen_hubungan` varchar(30) DEFAULT NULL,
  `pen_alamat` text NOT NULL,
  `pen_nohp` varchar(15) NOT NULL,
  `pen_tgl` datetime NOT NULL,
  `pen_flag` tinyint(2) NOT NULL,
  `pen_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjamin`
--

INSERT INTO `penjamin` (`pen_id`, `pin_id`, `pen_noktp`, `pen_nama`, `pen_hubungan`, `pen_alamat`, `pen_nohp`, `pen_tgl`, `pen_flag`, `pen_info`) VALUES
(29, 'KE030919001', '3323092903570001', 'Sakirman', 'Suami', 'Dsn Gandu Kulon 1/2 Gondang Winangun Ngadirejo', '081225708175', '2019-09-03 12:10:47', 0, ''),
(30, 'KE040919001', '3323074107840011', 'Isti Wilujeng', 'Istri', 'Dsn Bandung 3/6 Bandunggede Kedu', '081327035655', '2019-09-04 14:09:54', 0, ''),
(33, 'KE060919001', '3323021210850002', 'Afifudin', 'Suami', 'Dsn Muncar Lor 5/2 Muncar Gemawang', '085729025956', '2019-09-06 06:18:21', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `phu`
--

CREATE TABLE `phu` (
  `phu_id` int(11) NOT NULL,
  `phu_gaji` float NOT NULL,
  `phu_operasional` float NOT NULL,
  `phu_lps` float NOT NULL,
  `phu_komunikasi` float NOT NULL,
  `phu_perlengkapan` float NOT NULL,
  `phu_penyusutan` float NOT NULL,
  `phu_asuransi` float NOT NULL,
  `phu_insentif` float NOT NULL,
  `phu_pajakkendaraan` float NOT NULL,
  `phu_rapat` float NOT NULL,
  `phu_atk` float NOT NULL,
  `phu_keamanan` float NOT NULL,
  `phu_phpinjaman` float NOT NULL,
  `phu_sosial` float NOT NULL,
  `phu_tayakuran` float NOT NULL,
  `phu_koran` float NOT NULL,
  `phu_pajakkoprasi` float NOT NULL,
  `phu_servicekendaraan` float NOT NULL,
  `phu_konsumsi` float NOT NULL,
  `phu_rat` float NOT NULL,
  `phu_thr` float NOT NULL,
  `phu_nonoprasional` float NOT NULL,
  `phu_perawatankantor` float NOT NULL,
  `phu_keterangan` text DEFAULT NULL,
  `phu_tanggal` datetime NOT NULL,
  `phu_tgl` datetime NOT NULL,
  `phu_info` text NOT NULL,
  `phu_flag` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phusimkesan`
--

CREATE TABLE `phusimkesan` (
  `phus_id` int(11) NOT NULL,
  `phus_insentif` float NOT NULL,
  `phus_gaji` float NOT NULL,
  `phus_promosi` float DEFAULT NULL,
  `phus_lainlain` float DEFAULT NULL,
  `phus_tgl` datetime NOT NULL,
  `phus_flag` tinyint(4) NOT NULL,
  `phus_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phusimkesanpendapatan`
--

CREATE TABLE `phusimkesanpendapatan` (
  `phsp_id` int(11) NOT NULL,
  `phsp_klaim` float NOT NULL,
  `phsp_tarik` float NOT NULL,
  `phsp_gugur` float NOT NULL,
  `phsp_administrasi` float NOT NULL,
  `phsp_lainlain` float DEFAULT NULL,
  `phsp_tgl` datetime NOT NULL,
  `phsp_flag` tinyint(4) NOT NULL,
  `phsp_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phu_sistem`
--

CREATE TABLE `phu_sistem` (
  `psis_id` varchar(20) NOT NULL,
  `psis_jasapinjaman` float NOT NULL,
  `psis_adminpin` float NOT NULL,
  `psis_pinalti` float NOT NULL,
  `psis_adminsim` float NOT NULL,
  `psis_phbuku` float NOT NULL,
  `psis_lainlain` float DEFAULT NULL,
  `psis_pengeluaran` float NOT NULL,
  `psis_pendapatan` float NOT NULL,
  `psis_tgl` datetime NOT NULL,
  `psis_flag` tinyint(2) NOT NULL,
  `psis_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `pin_id` varchar(25) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `sea_id` int(10) NOT NULL COMMENT 'fk dari settingangsuran',
  `bup_id` int(10) NOT NULL COMMENT 'fk dari bungapinjaman',
  `pop_id` int(10) NOT NULL COMMENT 'fk dari potonganprovisi',
  `wil_kode` varchar(10) NOT NULL COMMENT 'fk dari wilayah',
  `skp_id` int(10) DEFAULT NULL COMMENT 'fk dari settingkategoripeminjam',
  `pin_pengajuan` float DEFAULT NULL,
  `pin_pinjaman` float DEFAULT NULL,
  `pin_tglpengajuan` datetime NOT NULL,
  `pin_tglpencairan` datetime DEFAULT NULL,
  `pin_marketing` varchar(20) DEFAULT NULL,
  `pin_surveyor` varchar(20) DEFAULT NULL,
  `pin_survey` text DEFAULT NULL,
  `pin_statuspinjaman` varchar(20) DEFAULT NULL,
  `pin_tgl` datetime DEFAULT NULL,
  `pin_flag` tinyint(2) NOT NULL,
  `pin_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`pin_id`, `ang_no`, `sea_id`, `bup_id`, `pop_id`, `wil_kode`, `skp_id`, `pin_pengajuan`, `pin_pinjaman`, `pin_tglpengajuan`, `pin_tglpencairan`, `pin_marketing`, `pin_surveyor`, `pin_survey`, `pin_statuspinjaman`, `pin_tgl`, `pin_flag`, `pin_info`) VALUES
('KE030919001', 'K020919001', 5, 1, 2, '11', 1, 6000000, 6000000, '2019-08-30 00:00:00', '2019-09-02 00:00:00', '1211134', '0116021', '1567493377.JPG', '1', '2019-09-03 12:10:47', 0, ''),
('KE040919001', 'K030919019', 5, 1, 2, '10', 1, 12000000, 11000000, '2019-09-02 00:00:00', '2019-09-03 00:00:00', '1211134', '0116021', '1567664766.JPG', '1', '2019-09-04 14:09:54', 0, ''),
('KE060919001', 'K050919028', 5, 1, 2, '12', 1, 5000000, 5000000, '2019-08-31 00:00:00', '2019-09-03 00:00:00', '1610079', '503094', '1567731081.JPG', '1', '2019-09-06 06:18:21', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `plansimkesan`
--

CREATE TABLE `plansimkesan` (
  `psk_id` int(10) NOT NULL,
  `psk_plan` varchar(30) NOT NULL,
  `psk_setoran` float NOT NULL,
  `psk_keterangan` text NOT NULL,
  `psk_tgl` datetime NOT NULL,
  `psk_flag` tinyint(2) NOT NULL,
  `psk_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plansimkesan`
--

INSERT INTO `plansimkesan` (`psk_id`, `psk_plan`, `psk_setoran`, `psk_keterangan`, `psk_tgl`, `psk_flag`, `psk_info`) VALUES
(1, 'Plan A', 50000, 'Plan A', '2019-05-08 14:11:42', 0, ''),
(2, 'Plan B', 100000, 'Plan B', '2019-05-08 14:47:23', 1, ''),
(3, 'Plan C', 150000, 'Plan C', '2019-07-29 09:47:07', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `potonganprovisi`
--

CREATE TABLE `potonganprovisi` (
  `pop_id` int(11) NOT NULL,
  `pop_potongan` float NOT NULL,
  `pop_tgl` datetime NOT NULL,
  `pop_flag` tinyint(2) NOT NULL,
  `pop_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potonganprovisi`
--

INSERT INTO `potonganprovisi` (`pop_id`, `pop_potongan`, `pop_tgl`, `pop_flag`, `pop_info`) VALUES
(2, 5, '2019-08-27 13:15:08', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `setoransimkesan`
--

CREATE TABLE `setoransimkesan` (
  `ssk_id` int(10) NOT NULL,
  `sik_kode` varchar(25) NOT NULL COMMENT 'fk dari simkesan',
  `ssk_tglsetoran` datetime NOT NULL,
  `ssk_tglbayar` datetime NOT NULL,
  `ssk_jmlsetor` float NOT NULL,
  `ssk_status` tinyint(1) NOT NULL,
  `ssk_tgl` datetime NOT NULL,
  `ssk_flag` tinyint(1) NOT NULL,
  `ssk_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setoransimpanan`
--

CREATE TABLE `setoransimpanan` (
  `ssi_id` int(11) NOT NULL,
  `sim_kode` varchar(25) NOT NULL COMMENT 'fk dari simpanan',
  `ssi_tglsetor` datetime NOT NULL,
  `ssi_jmlsetor` float NOT NULL,
  `ssi_tgl` datetime NOT NULL,
  `ssi_flag` tinyint(2) NOT NULL,
  `ssi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setoransimpanan`
--

INSERT INTO `setoransimpanan` (`ssi_id`, `sim_kode`, `ssi_tglsetor`, `ssi_jmlsetor`, `ssi_tgl`, `ssi_flag`, `ssi_info`) VALUES
(44, 'KB020919001', '2019-09-02 12:05:51', 35000, '2019-09-02 12:05:51', 0, ''),
(45, 'KB020919002', '2019-09-02 12:21:38', 400000, '2019-09-02 12:21:38', 0, ''),
(46, 'KB020919003', '2019-09-02 12:25:35', 400000, '2019-09-02 12:25:35', 0, ''),
(47, 'KB020919004', '2019-09-02 12:28:50', 50000, '2019-09-02 12:28:50', 0, ''),
(48, 'KB020919005', '2019-09-02 12:33:39', 190000, '2019-09-02 12:33:39', 0, ''),
(49, 'KB020919006', '2019-09-02 12:40:13', 20000, '2019-09-02 12:40:13', 0, ''),
(50, 'KB020919007', '2019-09-02 12:44:40', 110000, '2019-09-02 12:44:40', 0, ''),
(51, 'KB020919008', '2019-09-02 12:48:15', 20000, '2019-09-02 12:48:15', 0, ''),
(52, 'KB020919009', '2019-09-02 13:56:47', 100000, '2019-09-02 13:56:47', 0, ''),
(53, 'KB020919010', '2019-09-02 14:00:56', 20000, '2019-09-02 14:00:56', 0, ''),
(54, 'KB030919001', '2019-09-03 12:24:25', 5000, '2019-09-03 12:24:25', 0, ''),
(55, 'KB030919002', '2019-09-03 12:27:33', 10000, '2019-09-03 12:27:33', 0, ''),
(56, 'KB030919003', '2019-09-03 12:30:01', 20000, '2019-09-03 12:30:01', 0, ''),
(57, 'KB030919004', '2019-09-03 12:46:34', 5000, '2019-09-03 12:46:34', 0, ''),
(58, 'KB030919005', '2019-09-03 12:52:26', 200000, '2019-09-03 12:52:26', 0, ''),
(59, 'KB030919006', '2019-09-03 12:55:09', 50000, '2019-09-03 12:55:09', 0, ''),
(60, 'KB020919002', '2019-09-03 12:57:23', 50000, '2019-09-03 12:57:23', 0, ''),
(61, 'KB020919003', '2019-09-03 12:57:38', 50000, '2019-09-03 12:57:38', 0, ''),
(62, 'KB030919007', '2019-09-03 13:02:36', 50000, '2019-09-03 13:02:36', 0, ''),
(63, 'KB030919008', '2019-09-03 13:04:22', 115000, '2019-09-03 13:04:22', 0, ''),
(64, 'KB030919009', '2019-09-03 13:07:26', 200000, '2019-09-03 13:07:26', 0, ''),
(65, 'KB030919010', '2019-09-03 13:11:59', 160000, '2019-09-03 13:11:59', 0, ''),
(66, 'KB020919005', '2019-09-03 13:21:21', 100000, '2019-09-03 13:21:21', 0, ''),
(67, 'KB040919001', '2019-09-04 14:34:56', 200000, '2019-09-04 14:34:56', 0, ''),
(68, 'KB040919002', '2019-09-04 14:37:20', 200000, '2019-09-04 14:37:20', 0, ''),
(69, 'KB040919003', '2019-09-04 14:42:08', 160000, '2019-09-04 14:42:08', 0, ''),
(70, 'KB040919004', '2019-09-04 14:45:48', 570000, '2019-09-04 14:45:48', 0, ''),
(71, 'KB020919002', '2019-09-04 14:52:16', 50000, '2019-09-04 14:52:16', 0, ''),
(72, 'KB020919003', '2019-09-04 14:52:36', 50000, '2019-09-04 14:52:36', 0, ''),
(73, 'KB030919005', '2019-09-04 14:52:49', 100000, '2019-09-04 14:52:49', 0, ''),
(74, 'KB030919010', '2019-09-04 14:57:46', 20000, '2019-09-04 14:57:46', 0, ''),
(75, 'KB030919001', '2019-09-04 14:58:18', 5000, '2019-09-04 14:58:18', 0, ''),
(76, 'KB020919004', '2019-09-04 14:58:33', 20000, '2019-09-04 14:58:33', 0, ''),
(77, 'KB040919005', '2019-09-04 06:52:12', 20000, '2019-09-04 06:52:12', 0, ''),
(78, 'KB040919006', '2019-09-04 06:56:31', 20000, '2019-09-04 06:56:31', 0, ''),
(79, 'KB040919007', '2019-09-04 06:58:49', 10000, '2019-09-04 06:58:49', 0, ''),
(80, 'KB030919008', '2019-09-04 07:02:19', 15000, '2019-09-04 07:02:19', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `setoransimpananwajib`
--

CREATE TABLE `setoransimpananwajib` (
  `ssw_id` int(11) NOT NULL,
  `siw_id` int(11) NOT NULL COMMENT 'fk simpanan wajib',
  `ssw_tglsetor` date NOT NULL,
  `ssw_jmlsetor` float NOT NULL,
  `ssw_tgl` datetime NOT NULL,
  `ssw_flag` tinyint(2) NOT NULL,
  `ssw_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setoransimpananwajib`
--

INSERT INTO `setoransimpananwajib` (`ssw_id`, `siw_id`, `ssw_tglsetor`, `ssw_jmlsetor`, `ssw_tgl`, `ssw_flag`, `ssw_info`) VALUES
(35, 53, '2019-09-02', 20000, '2019-09-02 13:59:56', 0, ''),
(36, 62, '2019-09-02', 20000, '2019-09-02 13:07:46', 0, ''),
(37, 98, '2019-09-04', 20000, '2019-09-04 14:44:34', 0, ''),
(38, 103, '2019-09-04', 20000, '2019-09-04 06:50:08', 0, ''),
(39, 104, '2019-09-04', 20000, '2019-09-04 06:55:11', 0, ''),
(40, 105, '2019-09-04', 20000, '2019-09-04 06:57:50', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settingangsuran`
--

CREATE TABLE `settingangsuran` (
  `sea_id` int(11) NOT NULL,
  `sea_tenor` tinyint(3) NOT NULL,
  `sea_tgl` datetime NOT NULL,
  `sea_flag` tinyint(2) NOT NULL,
  `sea_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingangsuran`
--

INSERT INTO `settingangsuran` (`sea_id`, `sea_tenor`, `sea_tgl`, `sea_flag`, `sea_info`) VALUES
(1, 1, '2019-05-21 13:38:38', 0, ''),
(2, 2, '2019-05-21 13:38:43', 0, ''),
(3, 3, '2019-05-21 13:38:47', 0, ''),
(4, 6, '2019-05-21 13:38:51', 0, ''),
(5, 12, '2019-05-21 13:38:55', 0, ''),
(6, 24, '2019-05-21 13:39:29', 0, ''),
(7, 10, '2019-07-19 07:59:27', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settingdenda`
--

CREATE TABLE `settingdenda` (
  `sed_id` int(11) NOT NULL,
  `sed_hari` tinyint(3) NOT NULL,
  `sed_denda` float NOT NULL,
  `sed_tgl` datetime NOT NULL,
  `sed_flag` tinyint(2) NOT NULL,
  `sed_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingdenda`
--

INSERT INTO `settingdenda` (`sed_id`, `sed_hari`, `sed_denda`, `sed_tgl`, `sed_flag`, `sed_info`) VALUES
(1, 1, 0.5, '2019-05-21 14:13:46', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settingkategoripeminjam`
--

CREATE TABLE `settingkategoripeminjam` (
  `skp_id` int(11) NOT NULL,
  `skp_kategori` varchar(25) NOT NULL,
  `skp_tgl` datetime NOT NULL,
  `skp_flag` tinyint(2) NOT NULL,
  `skp_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingkategoripeminjam`
--

INSERT INTO `settingkategoripeminjam` (`skp_id`, `skp_kategori`, `skp_tgl`, `skp_flag`, `skp_info`) VALUES
(1, 'Umum', '2019-05-21 13:33:43', 1, ''),
(2, 'Karyawan', '2019-05-21 13:33:51', 1, ''),
(3, 'Khusus', '2019-05-21 13:36:45', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `settingsimpanan`
--

CREATE TABLE `settingsimpanan` (
  `ses_id` int(11) NOT NULL,
  `ses_nama` varchar(50) NOT NULL,
  `ses_min` float NOT NULL,
  `ses_max` float NOT NULL,
  `ses_tgl` datetime NOT NULL,
  `ses_flag` tinyint(2) NOT NULL,
  `ses_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingsimpanan`
--

INSERT INTO `settingsimpanan` (`ses_id`, `ses_nama`, `ses_min`, `ses_max`, `ses_tgl`, `ses_flag`, `ses_info`) VALUES
(1, 'Simpanan Wajib', 20000, 240000, '2019-04-20 05:20:42', 1, ''),
(2, 'Simpanan Pokok', 10000, 10000, '2019-05-26 22:26:40', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settingstatuspeminjam`
--

CREATE TABLE `settingstatuspeminjam` (
  `ssp_id` int(11) NOT NULL,
  `ssp_namastatus` varchar(25) NOT NULL,
  `ssp_tgl` datetime NOT NULL,
  `ssp_flag` tinyint(2) NOT NULL,
  `ssp_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingstatuspeminjam`
--

INSERT INTO `settingstatuspeminjam` (`ssp_id`, `ssp_namastatus`, `ssp_tgl`, `ssp_flag`, `ssp_info`) VALUES
(1, 'Lancar', '2019-05-21 13:45:59', 0, ''),
(2, 'Agak Macet', '2019-05-21 13:46:06', 0, ''),
(3, 'Macet', '2019-05-21 13:46:10', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `shu`
--

CREATE TABLE `shu` (
  `shu_id` int(11) NOT NULL,
  `shu_pendapatan` float NOT NULL,
  `shu_pengeluaran` float NOT NULL,
  `shu_jumlah` float NOT NULL,
  `shu_tanggal` datetime NOT NULL,
  `shu_tgl` datetime NOT NULL,
  `shu_flag` tinyint(2) NOT NULL,
  `shu_info` text NOT NULL,
  `phu_id` int(11) DEFAULT NULL COMMENT 'fk dari phu',
  `psis_id` varchar(20) DEFAULT NULL COMMENT 'fk dari phu_sistem'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shusimkesan`
--

CREATE TABLE `shusimkesan` (
  `shus_id` int(11) NOT NULL,
  `shus_pendapatan` float NOT NULL,
  `shus_pengeluaran` float NOT NULL,
  `shus_jumlah` float NOT NULL,
  `shus_tgl` datetime NOT NULL,
  `shus_flag` tinyint(4) NOT NULL,
  `shus_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simkesan`
--

CREATE TABLE `simkesan` (
  `sik_kode` varchar(25) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `kar_kode` varchar(10) NOT NULL COMMENT 'fk dari karyawan',
  `psk_id` int(10) NOT NULL COMMENT 'fk dari plansimkesan',
  `wil_kode` varchar(10) NOT NULL COMMENT 'fk dari wilayah',
  `sik_tglpendaftaran` datetime NOT NULL,
  `sik_tglberakhir` datetime DEFAULT NULL,
  `sik_status` tinyint(1) NOT NULL,
  `sik_tgl` datetime NOT NULL,
  `sik_flag` tinyint(2) NOT NULL,
  `sik_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `sim_kode` varchar(25) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `kar_kode` varchar(10) NOT NULL COMMENT 'fk dari karyawan',
  `bus_id` int(11) NOT NULL COMMENT 'fk dari bungasimapanan',
  `jsi_id` int(11) NOT NULL COMMENT 'fk dari jenissimpanan',
  `jse_id` int(11) NOT NULL COMMENT 'fk dari jenissetoran',
  `wil_kode` varchar(10) NOT NULL COMMENT 'fk dari wilayah',
  `sim_tglpendaftaran` datetime NOT NULL,
  `sim_status` varchar(20) DEFAULT NULL,
  `sim_tgl` datetime NOT NULL,
  `sim_flag` tinyint(2) NOT NULL,
  `sim_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`sim_kode`, `ang_no`, `kar_kode`, `bus_id`, `jsi_id`, `jse_id`, `wil_kode`, `sim_tglpendaftaran`, `sim_status`, `sim_tgl`, `sim_flag`, `sim_info`) VALUES
('KB020919001', 'K020919002', '1601138', 4, 2, 1, '14', '2019-09-02 00:00:00', '0', '2019-09-02 11:58:24', 0, ''),
('KB020919002', 'K020919003', '2407075', 4, 2, 1, '9', '2019-09-02 00:00:00', '0', '2019-09-02 12:19:05', 0, ''),
('KB020919003', 'K020919004', '2407075', 4, 2, 1, '9', '2019-09-02 00:00:00', '0', '2019-09-02 12:24:58', 0, ''),
('KB020919004', 'K020919005', '404147', 4, 2, 1, '15', '2019-09-02 00:00:00', '0', '2019-09-02 12:28:15', 0, ''),
('KB020919005', 'K020919006', '1307155', 4, 2, 1, '5', '2019-09-02 00:00:00', '0', '2019-09-02 12:32:30', 0, ''),
('KB020919006', 'K020919007', '2806151', 4, 2, 1, '4', '2019-09-02 00:00:00', '0', '2019-09-02 12:39:33', 0, ''),
('KB020919007', 'K020919008', '811083', 4, 2, 1, '8', '2019-09-02 00:00:00', '0', '2019-09-02 12:43:06', 0, ''),
('KB020919008', 'K020919009', '811083', 4, 2, 1, '8', '2019-09-02 00:00:00', '0', '2019-09-02 12:47:47', 0, ''),
('KB020919009', 'K020919014', '1608161', 4, 2, 1, '7', '2019-09-02 00:00:00', '0', '2019-09-02 13:56:30', 0, ''),
('KB020919010', 'K020919015', '1608161', 4, 2, 1, '7', '2019-09-02 00:00:00', '0', '2019-09-02 14:00:24', 0, ''),
('KB030919001', 'K030919016', '811082', 4, 2, 1, '6', '2019-09-03 00:00:00', '0', '2019-09-03 12:23:58', 0, ''),
('KB030919002', 'K030919017', '811083', 4, 2, 1, '8', '2019-09-03 00:00:00', '0', '2019-09-03 12:27:17', 0, ''),
('KB030919003', 'K030919018', '2806151', 4, 2, 1, '4', '2019-09-03 00:00:00', '0', '2019-09-03 12:29:48', 0, ''),
('KB030919004', 'K030919020', '1601138', 4, 2, 1, '14', '2019-09-03 00:00:00', '0', '2019-09-03 12:45:23', 0, ''),
('KB030919005', 'K030919021', '2407075', 4, 2, 1, '9', '2019-09-03 00:00:00', '0', '2019-09-03 12:51:30', 0, ''),
('KB030919006', 'K030919022', '2407075', 4, 2, 1, '9', '2019-09-03 00:00:00', '0', '2019-09-03 12:54:54', 0, ''),
('KB030919007', 'K030919023', '1608161', 4, 2, 1, '7', '2019-09-03 00:00:00', '0', '2019-09-03 13:02:18', 0, ''),
('KB030919008', 'K030919024', '1608161', 4, 2, 1, '7', '2019-09-03 00:00:00', '0', '2019-09-03 13:04:06', 0, ''),
('KB030919009', 'K030919025', '404147', 4, 2, 1, '15', '2019-09-03 00:00:00', '0', '2019-09-03 13:06:59', 0, ''),
('KB030919010', 'K030919026', '1307155', 4, 2, 1, '5', '2019-09-03 00:00:00', '0', '2019-09-03 13:11:21', 0, ''),
('KB040919001', 'K040919043', '811083', 4, 2, 1, '8', '2019-09-04 00:00:00', '0', '2019-09-04 14:34:40', 0, ''),
('KB040919002', 'K040919044', '811083', 4, 2, 1, '8', '2019-09-04 00:00:00', '0', '2019-09-04 14:36:54', 0, ''),
('KB040919003', 'K040919045', '2806151', 4, 2, 1, '4', '2019-09-04 00:00:00', '0', '2019-09-04 14:41:46', 0, ''),
('KB040919004', 'K040919046', '1601138', 4, 2, 1, '14', '2019-09-04 00:00:00', '0', '2019-09-04 14:45:27', 0, ''),
('KB040919005', 'K040919048', '1608161', 4, 2, 1, '7', '2019-09-04 00:00:00', '0', '2019-09-04 06:51:45', 0, ''),
('KB040919006', 'K040919049', '1608161', 4, 2, 1, '7', '2019-09-04 00:00:00', '0', '2019-09-04 06:56:08', 0, ''),
('KB040919007', 'K040919050', '1608161', 4, 2, 1, '7', '2019-09-04 00:00:00', '0', '2019-09-04 06:58:34', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `simpananpokok`
--

CREATE TABLE `simpananpokok` (
  `sip_id` int(10) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `ses_id` int(11) NOT NULL COMMENT 'fk dari settingsimpanan',
  `sip_setoran` float NOT NULL,
  `sip_tglbayar` datetime NOT NULL,
  `sip_tgl` datetime NOT NULL,
  `sip_flag` tinyint(2) NOT NULL,
  `sip_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpananpokok`
--

INSERT INTO `simpananpokok` (`sip_id`, `ang_no`, `ses_id`, `sip_setoran`, `sip_tglbayar`, `sip_tgl`, `sip_flag`, `sip_info`) VALUES
(33, 'K020919001', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 13:59:30', 0, ''),
(34, 'K020919002', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 11:55:17', 0, ''),
(35, 'K020919003', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:18:22', 0, ''),
(36, 'K020919004', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:24:14', 0, ''),
(37, 'K020919005', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:27:38', 0, ''),
(38, 'K020919006', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:31:52', 0, ''),
(39, 'K020919007', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:38:52', 0, ''),
(40, 'K020919008', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:41:53', 0, ''),
(41, 'K020919009', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:46:49', 0, ''),
(42, 'K020919010', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 13:05:59', 0, ''),
(43, 'K020919011', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 13:23:36', 0, ''),
(44, 'K020919012', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 13:33:05', 0, ''),
(45, 'K020919013', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 13:44:54', 0, ''),
(46, 'K020919014', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 13:55:57', 0, ''),
(47, 'K020919015', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 13:59:44', 0, ''),
(48, 'K030919016', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 12:20:32', 0, ''),
(49, 'K030919017', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 12:26:41', 0, ''),
(50, 'K030919018', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 12:29:11', 0, ''),
(51, 'K030919019', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 12:42:27', 0, ''),
(52, 'K030919020', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 12:44:35', 0, ''),
(53, 'K030919021', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 12:50:14', 0, ''),
(54, 'K030919022', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 12:54:22', 0, ''),
(55, 'K030919023', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 13:01:38', 0, ''),
(56, 'K030919024', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 13:03:30', 0, ''),
(57, 'K030919025', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 13:06:32', 0, ''),
(58, 'K030919026', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 13:10:19', 0, ''),
(59, 'K050919027', 2, 10000, '2019-09-03 00:00:00', '2019-09-05 11:30:07', 0, ''),
(60, 'K050919028', 2, 10000, '2019-09-03 00:00:00', '2019-09-05 11:34:50', 0, ''),
(61, 'K020919029', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 12:56:02', 0, ''),
(62, 'K020919030', 2, 10000, '2019-09-02 00:00:00', '2019-09-03 13:01:17', 0, ''),
(63, 'K030919031', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 13:05:26', 0, ''),
(64, 'K030919032', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 13:08:47', 0, ''),
(65, 'K030919033', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 13:12:29', 0, ''),
(66, 'K030919034', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:15:48', 0, ''),
(67, 'K040919035', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:18:39', 0, ''),
(68, 'K040919036', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:20:41', 0, ''),
(69, 'K040919037', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:24:12', 0, ''),
(70, 'K040919038', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:26:17', 0, ''),
(71, 'K040919039', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:29:44', 0, ''),
(72, 'K040919040', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:34:59', 0, ''),
(73, 'K040919041', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 13:40:31', 0, ''),
(74, 'K040919042', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 14:11:17', 0, ''),
(75, 'K040919043', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 14:33:06', 0, ''),
(76, 'K040919044', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 14:35:53', 0, ''),
(77, 'K040919045', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 14:40:14', 0, ''),
(78, 'K040919046', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 14:44:13', 0, ''),
(79, 'K040919041', 2, 10000, '2019-09-05 00:00:00', '2019-09-04 14:45:14', 0, ''),
(80, 'K030919032', 2, 10000, '2019-09-05 00:00:00', '2019-09-04 14:47:34', 0, ''),
(81, 'K040919038', 2, 10000, '2019-09-05 00:00:00', '2019-09-04 14:51:52', 0, ''),
(82, 'K060919047', 2, 10000, '2019-09-03 00:00:00', '2019-09-06 06:26:53', 0, ''),
(83, 'K040919048', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 06:49:39', 0, ''),
(84, 'K040919049', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 06:54:48', 0, ''),
(85, 'K040919050', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 06:57:32', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `simpananwajib`
--

CREATE TABLE `simpananwajib` (
  `siw_id` int(10) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `ses_id` int(11) NOT NULL COMMENT 'fk dari settingsimpanan',
  `siw_tglbayar` datetime NOT NULL,
  `siw_status` tinyint(1) DEFAULT NULL COMMENT '0:aktif 1:ditarik 2:belum dibayar',
  `siw_tglambil` datetime DEFAULT NULL,
  `siw_tgl` datetime NOT NULL,
  `siw_flag` tinyint(2) NOT NULL,
  `siw_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpananwajib`
--

INSERT INTO `simpananwajib` (`siw_id`, `ang_no`, `ses_id`, `siw_tglbayar`, `siw_status`, `siw_tglambil`, `siw_tgl`, `siw_flag`, `siw_info`) VALUES
(53, 'K020919001', 1, '2019-09-02 13:59:30', 0, NULL, '2019-09-02 13:59:30', 0, ''),
(54, 'K020919002', 1, '2019-09-02 11:55:17', 0, NULL, '2019-09-02 11:55:17', 0, ''),
(55, 'K020919003', 1, '2019-09-02 12:18:22', 0, NULL, '2019-09-02 12:18:22', 0, ''),
(56, 'K020919004', 1, '2019-09-02 12:24:14', 0, NULL, '2019-09-02 12:24:14', 0, ''),
(57, 'K020919005', 1, '2019-09-02 12:27:38', 0, NULL, '2019-09-02 12:27:38', 0, ''),
(58, 'K020919006', 1, '2019-09-02 12:31:52', 0, NULL, '2019-09-02 12:31:52', 0, ''),
(59, 'K020919007', 1, '2019-09-02 12:38:52', 0, NULL, '2019-09-02 12:38:52', 0, ''),
(60, 'K020919008', 1, '2019-09-02 12:41:53', 0, NULL, '2019-09-02 12:41:53', 0, ''),
(61, 'K020919009', 1, '2019-09-02 12:46:49', 0, NULL, '2019-09-02 12:46:49', 0, ''),
(62, 'K020919010', 1, '2019-09-02 13:05:59', 0, NULL, '2019-09-02 13:05:59', 0, ''),
(63, 'K020919011', 1, '2019-09-02 13:23:36', 0, NULL, '2019-09-02 13:23:36', 0, ''),
(64, 'K020919012', 1, '2019-09-02 13:33:05', 0, NULL, '2019-09-02 13:33:05', 0, ''),
(65, 'K020919013', 1, '2019-09-02 13:44:54', 0, NULL, '2019-09-02 13:44:54', 0, ''),
(66, 'K020919014', 1, '2019-09-02 13:55:57', 0, NULL, '2019-09-02 13:55:57', 0, ''),
(67, 'K020919015', 1, '2019-09-02 13:59:44', 0, NULL, '2019-09-02 13:59:44', 0, ''),
(68, 'K030919016', 1, '2019-09-03 12:20:32', 0, NULL, '2019-09-03 12:20:32', 0, ''),
(69, 'K030919017', 1, '2019-09-03 12:26:41', 0, NULL, '2019-09-03 12:26:41', 0, ''),
(70, 'K030919018', 1, '2019-09-03 12:29:11', 0, NULL, '2019-09-03 12:29:11', 0, ''),
(71, 'K030919019', 1, '2019-09-03 12:42:27', 0, NULL, '2019-09-03 12:42:27', 0, ''),
(72, 'K030919020', 1, '2019-09-03 12:44:35', 0, NULL, '2019-09-03 12:44:35', 0, ''),
(73, 'K030919021', 1, '2019-09-03 12:50:14', 0, NULL, '2019-09-03 12:50:14', 0, ''),
(74, 'K030919022', 1, '2019-09-03 12:54:22', 0, NULL, '2019-09-03 12:54:22', 0, ''),
(75, 'K030919023', 1, '2019-09-03 13:01:38', 0, NULL, '2019-09-03 13:01:38', 0, ''),
(76, 'K030919024', 1, '2019-09-03 13:03:30', 0, NULL, '2019-09-03 13:03:30', 0, ''),
(77, 'K030919025', 1, '2019-09-03 13:06:32', 0, NULL, '2019-09-03 13:06:32', 0, ''),
(78, 'K030919026', 1, '2019-09-03 13:10:19', 0, NULL, '2019-09-03 13:10:19', 0, ''),
(79, 'K050919027', 1, '2019-09-05 11:30:07', 0, NULL, '2019-09-05 11:30:07', 0, ''),
(80, 'K050919028', 1, '2019-09-05 11:34:50', 0, NULL, '2019-09-05 11:34:50', 0, ''),
(81, 'K020919029', 1, '2019-09-02 12:56:02', 0, NULL, '2019-09-02 12:56:02', 0, ''),
(82, 'K020919030', 1, '2019-09-03 13:01:17', 0, NULL, '2019-09-03 13:01:17', 0, ''),
(83, 'K030919031', 1, '2019-09-03 13:05:26', 0, NULL, '2019-09-03 13:05:26', 0, ''),
(84, 'K030919032', 1, '2019-09-03 13:08:47', 0, NULL, '2019-09-03 13:08:47', 0, ''),
(85, 'K030919033', 1, '2019-09-03 13:12:29', 0, NULL, '2019-09-03 13:12:29', 0, ''),
(86, 'K030919034', 1, '2019-09-04 13:15:48', 0, NULL, '2019-09-04 13:15:48', 0, ''),
(87, 'K040919035', 1, '2019-09-04 13:18:39', 0, NULL, '2019-09-04 13:18:39', 0, ''),
(88, 'K040919036', 1, '2019-09-04 13:20:41', 0, NULL, '2019-09-04 13:20:41', 0, ''),
(89, 'K040919037', 1, '2019-09-04 13:24:12', 0, NULL, '2019-09-04 13:24:12', 0, ''),
(90, 'K040919038', 1, '2019-09-04 13:26:17', 0, NULL, '2019-09-04 13:26:17', 0, ''),
(91, 'K040919039', 1, '2019-09-04 13:29:44', 0, NULL, '2019-09-04 13:29:44', 0, ''),
(92, 'K040919040', 1, '2019-09-04 13:34:59', 0, NULL, '2019-09-04 13:34:59', 0, ''),
(93, 'K040919041', 1, '2019-09-04 13:40:31', 0, NULL, '2019-09-04 13:40:31', 0, ''),
(94, 'K040919042', 1, '2019-09-04 14:11:17', 0, NULL, '2019-09-04 14:11:17', 0, ''),
(95, 'K040919043', 1, '2019-09-04 14:33:06', 0, NULL, '2019-09-04 14:33:06', 0, ''),
(96, 'K040919044', 1, '2019-09-04 14:35:53', 0, NULL, '2019-09-04 14:35:53', 0, ''),
(97, 'K040919045', 1, '2019-09-04 14:40:14', 0, NULL, '2019-09-04 14:40:14', 0, ''),
(98, 'K040919046', 1, '2019-09-04 14:44:13', 0, NULL, '2019-09-04 14:44:13', 0, ''),
(99, 'K040919041', 1, '2019-09-04 14:45:14', 0, NULL, '2019-09-04 14:45:14', 0, ''),
(100, 'K030919032', 1, '2019-09-04 14:47:34', 0, NULL, '2019-09-04 14:47:34', 0, ''),
(101, 'K040919038', 1, '2019-09-04 14:51:52', 0, NULL, '2019-09-04 14:51:52', 0, ''),
(102, 'K060919047', 1, '2019-09-06 06:26:53', 0, NULL, '2019-09-06 06:26:53', 0, ''),
(103, 'K040919048', 1, '2019-09-04 06:49:39', 0, NULL, '2019-09-04 06:49:39', 0, ''),
(104, 'K040919049', 1, '2019-09-04 06:54:48', 0, NULL, '2019-09-04 06:54:48', 0, ''),
(105, 'K040919050', 1, '2019-09-04 06:57:32', 0, NULL, '2019-09-04 06:57:32', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `statuspeminjam`
--

CREATE TABLE `statuspeminjam` (
  `stp_id` int(11) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `ssp_id` int(11) NOT NULL COMMENT 'fk dari settingstatuspeminjam',
  `pin_id` varchar(25) NOT NULL COMMENT 'fk dari pinjaman',
  `stp_tgl` datetime NOT NULL,
  `stp_flag` tinyint(2) NOT NULL,
  `stp_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sy_config`
--

CREATE TABLE `sy_config` (
  `id` int(11) NOT NULL,
  `conf_name` varchar(50) NOT NULL,
  `conf_val` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_config`
--

INSERT INTO `sy_config` (`id`, `conf_name`, `conf_val`, `note`) VALUES
(3, 'APP_NAME', 'KSP Sido Mukti', ''),
(8, 'OPD_NAME', 'KABUPATEN TEMANGGUNG', ''),
(9, 'LEFT_FOOTER', '<strong>Copyright</strong> robetechno © 2019 | v1.0', ''),
(10, 'RIGHT_FOOTER', 'KSP Sido Mukti Temanggung', ''),
(11, 'APP_DESC', 'Sistem Informasi Perbankan KSP Sido Mukti', '-'),
(12, 'OPD_ADDR', 'Jl. Suyoto nomor 7.A Temanggung', ''),
(13, 'VISI_MISI', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `titipansimkesan`
--

CREATE TABLE `titipansimkesan` (
  `tts_id` int(11) NOT NULL,
  `sik_kode` varchar(20) NOT NULL COMMENT 'fk dr simkesan',
  `tts_tgltitip` datetime NOT NULL,
  `tts_jmltitip` float NOT NULL,
  `tts_jmlambil` float NOT NULL,
  `tts_status` tinyint(1) NOT NULL,
  `tts_tgl` datetime NOT NULL,
  `tts_flag` tinyint(2) NOT NULL,
  `tts_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutupinvestasiberjangka`
--

CREATE TABLE `tutupinvestasiberjangka` (
  `tib_id` int(10) NOT NULL,
  `ivb_kode` varchar(25) NOT NULL COMMENT 'fk dari investasiberjangka',
  `tib_tgltutup` datetime NOT NULL,
  `tib_catatan` text NOT NULL,
  `tib_tgl` datetime NOT NULL,
  `tib_flag` tinyint(2) NOT NULL,
  `tib_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL COMMENT 'fk dari tabel user_group',
  `foto` varchar(250) DEFAULT NULL,
  `telp` varchar(250) DEFAULT NULL,
  `note` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note_1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `username`, `password`, `email`, `id_group`, `foto`, `telp`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`, `note_1`) VALUES
(1, 'Admin KSP Sido Mukti', 'dev', '033aca88b54053cf0ed7a641e27f9773', 'dev@email.com', 1, '', '085643242654', 'full akses', 1, 1, '2018-03-13 03:06:55', '2019-01-28 09:26:16', ''),
(2, 'agung widhiatmojo', 'dev', '827ccb0eea8a706c4c34a16891f84e7b', 'agung.widhiatmojo@gmail.com', 2, NULL, '085700085838', 'dfg', 1, 1, '2019-04-20 10:01:30', '2019-04-21 06:22:45', ''),
(5, 'admin simpanan', 'simpanan', 'fdc85a9ad78d855ed4de5d14075d80ad', 'simpanan@gmail.com', 3, NULL, '0893993993', 'admin simpanan', 1, 0, '2019-08-12 18:06:44', '0000-00-00 00:00:00', ''),
(6, 'admin investasi', 'investasi', 'cbc74767c3b1bc62f5ead2a21548a53a', 'investasi@gmail.com', 6, NULL, '089488488488', 'Admin Investasi Berjangka', 5, 0, '2019-08-12 18:52:21', '0000-00-00 00:00:00', ''),
(7, 'admin pinjaman', 'pinjaman', '032aa9469717367ccc7b74693b23e7b7', 'pinjaman@gmail.com', 5, NULL, '088565656', 'Admin Pinjaman', 6, 0, '2019-08-12 19:00:35', '0000-00-00 00:00:00', ''),
(8, 'admin simkesan', 'simkesan', '97543921c1fa34523cb1b6f03adf3b5f', 'simkesan@gmail.com', 4, NULL, '083873773737', 'Admin Simkesan', 7, 0, '2019-08-12 19:11:51', '0000-00-00 00:00:00', ''),
(9, 'Akuntan', 'akuntan', 'd017f7d301ea2115374da19e2d05e1cb', 'akuntan@gmail.com', 7, NULL, '0849494', 'Akuntan', 1, 0, '2019-08-14 20:59:07', '0000-00-00 00:00:00', ''),
(10, 'manager', 'manager', '0795151defba7a4b5dfa89170de46277', 'manager@gmail.com', 8, NULL, '08979797979', 'manager', 1, 0, '2019-08-27 10:20:17', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `kd_access` varchar(12) DEFAULT NULL,
  `nm_access` varbinary(100) DEFAULT NULL,
  `is_allow` int(1) DEFAULT NULL COMMENT '0=false,1=true',
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `id_group`, `kd_access`, `nm_access`, `is_allow`, `note`) VALUES
(37, 3, '7', NULL, 1, NULL),
(38, 1, '7', NULL, 1, NULL),
(39, 1, '1', NULL, 1, NULL),
(40, 1, '5', NULL, 1, NULL),
(41, 1, '6', NULL, 1, NULL),
(42, 1, '8', NULL, 1, NULL),
(43, 1, '9', NULL, 1, NULL),
(44, 1, '10', NULL, 1, NULL),
(45, 3, '6', NULL, 0, NULL),
(46, 3, '8', NULL, 0, NULL),
(47, 3, '9', NULL, 0, NULL),
(48, 3, '10', NULL, 0, NULL),
(49, 3, '5', NULL, 0, NULL),
(50, 3, '1', NULL, 0, NULL),
(51, 6, '10', NULL, 1, NULL),
(52, 5, '8', NULL, 1, NULL),
(53, 4, '9', NULL, 1, NULL),
(54, 7, '5', NULL, 1, NULL),
(55, 7, '1', NULL, 1, NULL),
(56, 8, '5', NULL, 1, NULL),
(57, 8, '6', NULL, 0, NULL),
(58, 8, '1', NULL, 1, NULL),
(59, 8, '7', NULL, 1, NULL),
(60, 8, '8', NULL, 1, NULL),
(61, 8, '9', NULL, 1, NULL),
(62, 8, '10', NULL, 1, NULL),
(63, 8, '11', NULL, 1, NULL),
(64, 1, '11', NULL, 1, NULL),
(65, 7, '11', NULL, 0, NULL),
(66, 7, '9', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `group_name`, `note`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Developer', 'full akses', NULL, NULL, NULL, NULL),
(2, 'Teller', 'Teller', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Simpanan', 'Simpanan', NULL, NULL, NULL, NULL),
(4, 'Simkesan', 'Simkesan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'Pinjaman', 'Pinjaman', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'Investasi', 'Investasi', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 'Akuntan', 'Akuntan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 'manager', 'manager', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `wil_kode` int(10) NOT NULL,
  `wil_nama` varchar(50) NOT NULL,
  `wil_tgl` datetime NOT NULL,
  `wil_flag` tinyint(2) NOT NULL,
  `wil_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`wil_kode`, `wil_nama`, `wil_tgl`, `wil_flag`, `wil_info`) VALUES
(4, 'Tepusen', '2019-08-24 13:51:27', 0, ''),
(5, 'Karna', '2019-08-24 13:51:42', 0, ''),
(6, 'Anggrek', '2019-08-24 13:51:52', 0, ''),
(7, 'Wangi', '2019-08-24 13:51:59', 0, ''),
(8, 'Dahlia', '2019-08-24 13:52:06', 0, ''),
(9, 'Mahkota Dewa', '2019-08-24 13:52:28', 0, ''),
(10, 'Wilayah I', '2019-08-26 12:32:10', 0, ''),
(11, 'Wilayah II', '2019-08-26 12:32:16', 0, ''),
(12, 'Wilayah III', '2019-08-26 12:32:24', 0, ''),
(13, 'Wilayah IV', '2019-08-26 12:32:33', 0, ''),
(14, 'Nakula', '2019-09-02 06:42:58', 0, ''),
(15, 'Mawar', '2019-09-02 06:43:49', 0, ''),
(16, 'SEPTI', '2019-09-02 06:46:26', 0, ''),
(17, 'STAFF', '2019-09-02 06:46:38', 0, ''),
(18, 'RETNO', '2019-09-02 06:46:45', 0, ''),
(19, 'KANTOR PUSAT', '2019-09-02 06:47:07', 0, ''),
(20, 'KC. NGADIREJO', '2019-09-02 06:47:19', 0, ''),
(21, 'KC. KLEDUNG', '2019-09-02 06:47:38', 0, ''),
(22, 'KC. GEMAWANG', '2019-09-02 06:47:50', 0, ''),
(23, 'KC. KRANGGAN', '2019-09-02 06:48:03', 0, ''),
(24, 'KC. CANDIROTO', '2019-09-02 06:49:05', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_karyawan`
--

CREATE TABLE `wilayah_karyawan` (
  `wik_id` int(11) NOT NULL,
  `wil_kode` varchar(10) NOT NULL COMMENT 'fk dari wilayah',
  `status` varchar(10) NOT NULL,
  `kar_kode` varchar(10) NOT NULL COMMENT 'fk dari karyawan',
  `wik_tgl` datetime NOT NULL,
  `wik_flag` tinyint(2) NOT NULL,
  `wik_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_karyawan`
--

INSERT INTO `wilayah_karyawan` (`wik_id`, `wil_kode`, `status`, `kar_kode`, `wik_tgl`, `wik_flag`, `wik_info`) VALUES
(2, '9', 'aktif', '2708006', '2019-08-27 07:50:17', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahliwarissimkesan`
--
ALTER TABLE `ahliwarissimkesan`
  ADD PRIMARY KEY (`aws_id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ang_no`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`ags_id`);

--
-- Indexes for table `bungainvestasi`
--
ALTER TABLE `bungainvestasi`
  ADD PRIMARY KEY (`biv_id`);

--
-- Indexes for table `bungapinjaman`
--
ALTER TABLE `bungapinjaman`
  ADD PRIMARY KEY (`bup_id`);

--
-- Indexes for table `bungasetoransimpanan`
--
ALTER TABLE `bungasetoransimpanan`
  ADD PRIMARY KEY (`bss_id`);

--
-- Indexes for table `bungasimpanan`
--
ALTER TABLE `bungasimpanan`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `dendaangsuran`
--
ALTER TABLE `dendaangsuran`
  ADD PRIMARY KEY (`dnd_id`);

--
-- Indexes for table `historibungasimpanan`
--
ALTER TABLE `historibungasimpanan`
  ADD PRIMARY KEY (`hbs_id`);

--
-- Indexes for table `investasiberjangka`
--
ALTER TABLE `investasiberjangka`
  ADD PRIMARY KEY (`ivb_kode`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jab_kode`);

--
-- Indexes for table `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`jam_id`);

--
-- Indexes for table `jangkawaktuinvestasi`
--
ALTER TABLE `jangkawaktuinvestasi`
  ADD PRIMARY KEY (`jwi_id`);

--
-- Indexes for table `jasainvestasi`
--
ALTER TABLE `jasainvestasi`
  ADD PRIMARY KEY (`jiv_id`);

--
-- Indexes for table `jenisjaminan`
--
ALTER TABLE `jenisjaminan`
  ADD PRIMARY KEY (`jej_id`);

--
-- Indexes for table `jenisklaim`
--
ALTER TABLE `jenisklaim`
  ADD PRIMARY KEY (`jkl_id`);

--
-- Indexes for table `jenispelunasan`
--
ALTER TABLE `jenispelunasan`
  ADD PRIMARY KEY (`jep_id`);

--
-- Indexes for table `jenispenarikansimkesan`
--
ALTER TABLE `jenispenarikansimkesan`
  ADD PRIMARY KEY (`jps_id`);

--
-- Indexes for table `jenissetoran`
--
ALTER TABLE `jenissetoran`
  ADD PRIMARY KEY (`jse_id`);

--
-- Indexes for table `jenissimpanan`
--
ALTER TABLE `jenissimpanan`
  ADD PRIMARY KEY (`jsi_id`);

--
-- Indexes for table `kantorksp`
--
ALTER TABLE `kantorksp`
  ADD PRIMARY KEY (`kks_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kar_kode`);

--
-- Indexes for table `karyawanijasah`
--
ALTER TABLE `karyawanijasah`
  ADD PRIMARY KEY (`kij_id`);

--
-- Indexes for table `karyawansimpanan`
--
ALTER TABLE `karyawansimpanan`
  ADD PRIMARY KEY (`ksi_id`);

--
-- Indexes for table `keluargakaryawan`
--
ALTER TABLE `keluargakaryawan`
  ADD PRIMARY KEY (`kka_id`);

--
-- Indexes for table `keuntunganinvestasi`
--
ALTER TABLE `keuntunganinvestasi`
  ADD PRIMARY KEY (`kiv_id`);

--
-- Indexes for table `klaimsimkesan`
--
ALTER TABLE `klaimsimkesan`
  ADD PRIMARY KEY (`ksi_id`);

--
-- Indexes for table `master_access`
--
ALTER TABLE `master_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasiberjangka`
--
ALTER TABLE `mutasiberjangka`
  ADD PRIMARY KEY (`mib_id`);

--
-- Indexes for table `mutasipinjaman`
--
ALTER TABLE `mutasipinjaman`
  ADD PRIMARY KEY (`mup_id`);

--
-- Indexes for table `mutasisimkesan`
--
ALTER TABLE `mutasisimkesan`
  ADD PRIMARY KEY (`msk_id`);

--
-- Indexes for table `mutasisimpanan`
--
ALTER TABLE `mutasisimpanan`
  ADD PRIMARY KEY (`mus_id`);

--
-- Indexes for table `neracaaktivatetap`
--
ALTER TABLE `neracaaktivatetap`
  ADD PRIMARY KEY (`nat_id`);

--
-- Indexes for table `neracaekuitas`
--
ALTER TABLE `neracaekuitas`
  ADD PRIMARY KEY (`nek_id`);

--
-- Indexes for table `neracakasbank`
--
ALTER TABLE `neracakasbank`
  ADD PRIMARY KEY (`nkb_id`);

--
-- Indexes for table `neracakasbanksimkesan`
--
ALTER TABLE `neracakasbanksimkesan`
  ADD PRIMARY KEY (`nkbs_id`);

--
-- Indexes for table `neracakewajibanjangkapanjang`
--
ALTER TABLE `neracakewajibanjangkapanjang`
  ADD PRIMARY KEY (`njp_id`);

--
-- Indexes for table `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`pel_id`);

--
-- Indexes for table `penarikaninvestasiberjangka`
--
ALTER TABLE `penarikaninvestasiberjangka`
  ADD PRIMARY KEY (`pib_id`);

--
-- Indexes for table `penarikansimkesan`
--
ALTER TABLE `penarikansimkesan`
  ADD PRIMARY KEY (`pns_id`);

--
-- Indexes for table `penarikansimpanan`
--
ALTER TABLE `penarikansimpanan`
  ADD PRIMARY KEY (`pes_id`);

--
-- Indexes for table `penarikansimpananwajib`
--
ALTER TABLE `penarikansimpananwajib`
  ADD PRIMARY KEY (`psw_id`);

--
-- Indexes for table `penjamin`
--
ALTER TABLE `penjamin`
  ADD PRIMARY KEY (`pen_id`);

--
-- Indexes for table `phu`
--
ALTER TABLE `phu`
  ADD PRIMARY KEY (`phu_id`);

--
-- Indexes for table `phusimkesan`
--
ALTER TABLE `phusimkesan`
  ADD PRIMARY KEY (`phus_id`);

--
-- Indexes for table `phusimkesanpendapatan`
--
ALTER TABLE `phusimkesanpendapatan`
  ADD PRIMARY KEY (`phsp_id`);

--
-- Indexes for table `phu_sistem`
--
ALTER TABLE `phu_sistem`
  ADD PRIMARY KEY (`psis_id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `plansimkesan`
--
ALTER TABLE `plansimkesan`
  ADD PRIMARY KEY (`psk_id`);

--
-- Indexes for table `potonganprovisi`
--
ALTER TABLE `potonganprovisi`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `setoransimkesan`
--
ALTER TABLE `setoransimkesan`
  ADD PRIMARY KEY (`ssk_id`);

--
-- Indexes for table `setoransimpanan`
--
ALTER TABLE `setoransimpanan`
  ADD PRIMARY KEY (`ssi_id`);

--
-- Indexes for table `setoransimpananwajib`
--
ALTER TABLE `setoransimpananwajib`
  ADD PRIMARY KEY (`ssw_id`);

--
-- Indexes for table `settingangsuran`
--
ALTER TABLE `settingangsuran`
  ADD PRIMARY KEY (`sea_id`);

--
-- Indexes for table `settingdenda`
--
ALTER TABLE `settingdenda`
  ADD PRIMARY KEY (`sed_id`);

--
-- Indexes for table `settingkategoripeminjam`
--
ALTER TABLE `settingkategoripeminjam`
  ADD PRIMARY KEY (`skp_id`);

--
-- Indexes for table `settingsimpanan`
--
ALTER TABLE `settingsimpanan`
  ADD PRIMARY KEY (`ses_id`);

--
-- Indexes for table `settingstatuspeminjam`
--
ALTER TABLE `settingstatuspeminjam`
  ADD PRIMARY KEY (`ssp_id`);

--
-- Indexes for table `shu`
--
ALTER TABLE `shu`
  ADD PRIMARY KEY (`shu_id`);

--
-- Indexes for table `shusimkesan`
--
ALTER TABLE `shusimkesan`
  ADD PRIMARY KEY (`shus_id`);

--
-- Indexes for table `simkesan`
--
ALTER TABLE `simkesan`
  ADD PRIMARY KEY (`sik_kode`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`sim_kode`);

--
-- Indexes for table `simpananpokok`
--
ALTER TABLE `simpananpokok`
  ADD PRIMARY KEY (`sip_id`);

--
-- Indexes for table `simpananwajib`
--
ALTER TABLE `simpananwajib`
  ADD PRIMARY KEY (`siw_id`);

--
-- Indexes for table `statuspeminjam`
--
ALTER TABLE `statuspeminjam`
  ADD PRIMARY KEY (`stp_id`);

--
-- Indexes for table `sy_config`
--
ALTER TABLE `sy_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titipansimkesan`
--
ALTER TABLE `titipansimkesan`
  ADD PRIMARY KEY (`tts_id`);

--
-- Indexes for table `tutupinvestasiberjangka`
--
ALTER TABLE `tutupinvestasiberjangka`
  ADD PRIMARY KEY (`tib_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`wil_kode`);

--
-- Indexes for table `wilayah_karyawan`
--
ALTER TABLE `wilayah_karyawan`
  ADD PRIMARY KEY (`wik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahliwarissimkesan`
--
ALTER TABLE `ahliwarissimkesan`
  MODIFY `aws_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `ags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `bungainvestasi`
--
ALTER TABLE `bungainvestasi`
  MODIFY `biv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bungapinjaman`
--
ALTER TABLE `bungapinjaman`
  MODIFY `bup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bungasetoransimpanan`
--
ALTER TABLE `bungasetoransimpanan`
  MODIFY `bss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bungasimpanan`
--
ALTER TABLE `bungasimpanan`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dendaangsuran`
--
ALTER TABLE `dendaangsuran`
  MODIFY `dnd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historibungasimpanan`
--
ALTER TABLE `historibungasimpanan`
  MODIFY `hbs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jab_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jangkawaktuinvestasi`
--
ALTER TABLE `jangkawaktuinvestasi`
  MODIFY `jwi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jasainvestasi`
--
ALTER TABLE `jasainvestasi`
  MODIFY `jiv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenisjaminan`
--
ALTER TABLE `jenisjaminan`
  MODIFY `jej_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenisklaim`
--
ALTER TABLE `jenisklaim`
  MODIFY `jkl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenispelunasan`
--
ALTER TABLE `jenispelunasan`
  MODIFY `jep_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenispenarikansimkesan`
--
ALTER TABLE `jenispenarikansimkesan`
  MODIFY `jps_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenissetoran`
--
ALTER TABLE `jenissetoran`
  MODIFY `jse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenissimpanan`
--
ALTER TABLE `jenissimpanan`
  MODIFY `jsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kantorksp`
--
ALTER TABLE `kantorksp`
  MODIFY `kks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawanijasah`
--
ALTER TABLE `karyawanijasah`
  MODIFY `kij_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `karyawansimpanan`
--
ALTER TABLE `karyawansimpanan`
  MODIFY `ksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `keluargakaryawan`
--
ALTER TABLE `keluargakaryawan`
  MODIFY `kka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `keuntunganinvestasi`
--
ALTER TABLE `keuntunganinvestasi`
  MODIFY `kiv_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klaimsimkesan`
--
ALTER TABLE `klaimsimkesan`
  MODIFY `ksi_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_access`
--
ALTER TABLE `master_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mutasiberjangka`
--
ALTER TABLE `mutasiberjangka`
  MODIFY `mib_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasipinjaman`
--
ALTER TABLE `mutasipinjaman`
  MODIFY `mup_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasisimkesan`
--
ALTER TABLE `mutasisimkesan`
  MODIFY `msk_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasisimpanan`
--
ALTER TABLE `mutasisimpanan`
  MODIFY `mus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `neracaaktivatetap`
--
ALTER TABLE `neracaaktivatetap`
  MODIFY `nat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `neracaekuitas`
--
ALTER TABLE `neracaekuitas`
  MODIFY `nek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `neracakasbank`
--
ALTER TABLE `neracakasbank`
  MODIFY `nkb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `neracakasbanksimkesan`
--
ALTER TABLE `neracakasbanksimkesan`
  MODIFY `nkbs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `neracakewajibanjangkapanjang`
--
ALTER TABLE `neracakewajibanjangkapanjang`
  MODIFY `njp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelunasan`
--
ALTER TABLE `pelunasan`
  MODIFY `pel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penarikaninvestasiberjangka`
--
ALTER TABLE `penarikaninvestasiberjangka`
  MODIFY `pib_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penarikansimkesan`
--
ALTER TABLE `penarikansimkesan`
  MODIFY `pns_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penarikansimpanan`
--
ALTER TABLE `penarikansimpanan`
  MODIFY `pes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penarikansimpananwajib`
--
ALTER TABLE `penarikansimpananwajib`
  MODIFY `psw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjamin`
--
ALTER TABLE `penjamin`
  MODIFY `pen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `phu`
--
ALTER TABLE `phu`
  MODIFY `phu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phusimkesan`
--
ALTER TABLE `phusimkesan`
  MODIFY `phus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phusimkesanpendapatan`
--
ALTER TABLE `phusimkesanpendapatan`
  MODIFY `phsp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plansimkesan`
--
ALTER TABLE `plansimkesan`
  MODIFY `psk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `potonganprovisi`
--
ALTER TABLE `potonganprovisi`
  MODIFY `pop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setoransimkesan`
--
ALTER TABLE `setoransimkesan`
  MODIFY `ssk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setoransimpanan`
--
ALTER TABLE `setoransimpanan`
  MODIFY `ssi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `setoransimpananwajib`
--
ALTER TABLE `setoransimpananwajib`
  MODIFY `ssw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `settingangsuran`
--
ALTER TABLE `settingangsuran`
  MODIFY `sea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settingdenda`
--
ALTER TABLE `settingdenda`
  MODIFY `sed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingkategoripeminjam`
--
ALTER TABLE `settingkategoripeminjam`
  MODIFY `skp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settingsimpanan`
--
ALTER TABLE `settingsimpanan`
  MODIFY `ses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settingstatuspeminjam`
--
ALTER TABLE `settingstatuspeminjam`
  MODIFY `ssp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shu`
--
ALTER TABLE `shu`
  MODIFY `shu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shusimkesan`
--
ALTER TABLE `shusimkesan`
  MODIFY `shus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simpananpokok`
--
ALTER TABLE `simpananpokok`
  MODIFY `sip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `simpananwajib`
--
ALTER TABLE `simpananwajib`
  MODIFY `siw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `statuspeminjam`
--
ALTER TABLE `statuspeminjam`
  MODIFY `stp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sy_config`
--
ALTER TABLE `sy_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `titipansimkesan`
--
ALTER TABLE `titipansimkesan`
  MODIFY `tts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutupinvestasiberjangka`
--
ALTER TABLE `tutupinvestasiberjangka`
  MODIFY `tib_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `wil_kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wilayah_karyawan`
--
ALTER TABLE `wilayah_karyawan`
  MODIFY `wik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
