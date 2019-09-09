-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2019 pada 05.56
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

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
-- Struktur dari tabel `ahliwarissimkesan`
--

CREATE TABLE `ahliwarissimkesan` (
  `aws_id` int(10) NOT NULL,
  `sik_kode` varchar(25) NOT NULL COMMENT 'fk dari simkesan',
  `aws_noid` varchar(30) DEFAULT NULL,
  `aws_jenisid` varchar(15) DEFAULT NULL,
  `aws_nama` varchar(50) NOT NULL,
  `aws_alamat` text NOT NULL,
  `aws_hubungan` varchar(30) NOT NULL,
  `aws_lampiran` text NOT NULL,
  `aws_tgl` datetime NOT NULL,
  `aws_flag` tinyint(2) NOT NULL,
  `aws_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ahliwarissimkesan`
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
(10, 'KE310819001', '332307', 'KTP', 'titik', 'parakan temanggung', 'Orang Tua', 'lengkap', '2019-08-31 12:09:55', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `ang_no` varchar(15) NOT NULL,
  `ang_nama` varchar(50) NOT NULL,
  `ang_alamat` text NOT NULL,
  `ang_noktp` varchar(25) DEFAULT NULL,
  `ang_nokk` varchar(25) DEFAULT NULL,
  `ang_nohp` varchar(15) DEFAULT NULL,
  `ang_tempatlahir` datetime DEFAULT NULL,
  `ang_tgllahir` date NOT NULL,
  `ang_status` tinyint(1) NOT NULL,
  `ang_tgl` datetime NOT NULL,
  `ang_flag` tinyint(2) NOT NULL,
  `ang_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`ang_no`, `ang_nama`, `ang_alamat`, `ang_noktp`, `ang_nokk`, `ang_nohp`, `ang_tempatlahir`, `ang_tgllahir`, `ang_status`, `ang_tgl`, `ang_flag`, `ang_info`) VALUES
('K270819001', 'silvia indah lestari', 'bajangan rt 04/Rw 07 Mandisari parakan', '3323', '3323', '', NULL, '1991-05-12', 1, '2019-08-27 12:38:21', 2, ''),
('K270819002', 'Adila septi Mayasa', ' Dsn. diwek 5/4 bojonegoro kedu', '3323', '33256', '0857991', NULL, '1995-02-08', 1, '2019-08-27 12:39:42', 2, ''),
('K270819003', 'maya', 'ngadirejo ', '3323', '', '', NULL, '1985-12-05', 1, '2019-08-27 12:54:19', 2, ''),
('K270819004', 'Septi dwi rahmawati', ' Grogol kutoanyar kedu', '3233', '33233', '081332', NULL, '1991-08-09', 1, '2019-08-27 12:55:30', 2, ''),
('K270819005', 'erlin ', ' parakan', '8888888', '88888888', '0852136142', NULL, '0000-00-00', 1, '2019-08-27 13:05:18', 2, ''),
('K270819006', 'Setiyowati', 'Dotakan 01/04 Candiroto', '123456789', '987654321', '085642135123', NULL, '0000-00-00', 1, '2019-08-27 13:16:49', 2, ''),
('K270819007', 'Nofi A', ' Prapak 05/02 Kranggan', '1323456789', '987654321', '085631245678', NULL, '0000-00-00', 1, '2019-08-27 13:37:03', 2, ''),
('K270819008', 'ngamini', 'ds. gejagan 3/4 kataan ngadirejo', '3323', '', '', NULL, '1991-05-01', 1, '2019-08-27 13:41:20', 2, ''),
('K270819009', 'rikhmatillah', ' ds. kauman 2/1 jumo', '3323', '', '', NULL, '2000-12-04', 1, '2019-08-27 13:44:01', 2, ''),
('K270819010', 'Budi Telat Pinjaman', 'Magelang', '53534', '345345', '086565', NULL, '2019-08-02', 1, '2019-08-27 13:45:11', 2, ''),
('K270819011', 'dina andriyani', ' magelang', '3323', '', '', NULL, '2000-02-05', 1, '2019-08-27 13:48:09', 2, ''),
('K280819012', 'Saras', ' Parakan', '33333333', '4444444', '0856341236', NULL, '1997-08-25', 1, '2019-08-28 12:32:46', 2, ''),
('K290819013', 'maya', ' sawahan rt 1 rw 5', '456431245645646', '6456456464564561', '21564646', NULL, '1985-08-08', 1, '2019-08-29 07:43:46', 2, ''),
('K290819014', 'siti', ' parakan temanggung', '222223333', '333456', '0856783', NULL, '1987-03-30', 1, '2019-08-29 13:53:41', 2, ''),
('K290819015', 'maya', ' traji parakan', '333333', '3333333', '08976', NULL, '1999-02-01', 1, '2019-08-29 13:56:59', 2, ''),
('K310819016', 'audi', ' parakan temanggung', '33332233', '3333234', '984367', NULL, '1999-11-29', 1, '2019-08-31 12:08:41', 2, ''),
('K4020919017', 'Suindriarto', ' krajan 1/1 Gunung payung', '3323523012980003', '', '', NULL, '1998-03-01', 1, '2019-09-02 09:17:22', 2, ''),
('K4020919018', 'Suindriarto', ' krajan 1/1 Gunung Payung Candiroto\r\n', '3323523012980003', '3323', '085643294926', NULL, '1998-12-30', 1, '2019-09-02 09:43:21', 0, ''),
('K4020919019', 'Heriyanto', ' Dsn Gondang 1/4 Candiroto ', '3323120101680001', '', '', NULL, '1968-01-01', 1, '2019-09-02 14:16:29', 0, ''),
('K4020919020', 'Martinah', 'Dsn Randusari  2/1 Muntung candiroto ', '332324801440001', '', '', NULL, '1944-01-08', 1, '2019-09-02 19:05:08', 0, ''),
('K4020919021', 'Sulami', 'larangan 2/3 Larangan Luwok Bejen ', '3323185506730001', '', '', NULL, '1973-06-15', 1, '2019-09-02 19:11:07', 0, ''),
('K4020919022', 'Iswati Muharni', ' Larangan 1/3 Larangan Luwok Bejen', '3323186112910003', '', '', NULL, '1991-12-21', 1, '2019-09-02 19:18:08', 0, ''),
('K4020919023', 'Siturrohmi', 'Dsn Larangan 1/3 Larangan Luwok Bejen', '3323185602830002', '', '', NULL, '1982-02-16', 1, '2019-09-02 19:34:05', 0, ''),
('K4030919024', 'Sukidi', ' Kemuning 2/1 Kemuning Bejen', '33233182551260001', '', '', NULL, '1960-12-25', 1, '2019-09-03 07:19:45', 0, ''),
('K4030919025', 'Sutaryo', 'Sengon Gunung 5/3 Plososari Patean ', '3324042504830003', '', '', NULL, '1983-04-25', 1, '2019-09-03 07:21:05', 0, ''),
('K4030919026', 'SOCHARI', ' Ngloji 2/1 Bejen', '3323180408810003', '', '', NULL, '1981-08-04', 1, '2019-09-03 07:22:18', 0, ''),
('K4030919027', 'Tri Rochmatun', ' Ngloji 2/1 Bejen', '3323186807860001', '', '', NULL, '0006-07-28', 1, '2019-09-03 07:23:28', 0, ''),
('K4030919028', 'Totok Hariyanto', ' Gandu 1/2 Gondang Winangun Ngadirejo', '3323071412750001', '', '', NULL, '1975-12-14', 1, '2019-09-03 07:41:40', 0, ''),
('K4030919029', 'Mufida Khoirunnisa', ' Dsn Senet 2/1 Purwosari Wonoboyo', '3323195401990002', '', '', NULL, '1999-01-14', 1, '2019-09-03 07:44:44', 0, ''),
('K4030919030', 'Suharti', 'Dsn Karanganyar 4/6 Purwosari Wonoboyo ', '3323194209660001', '', '', NULL, '1966-09-02', 1, '2019-09-03 07:45:45', 2, ''),
('K4030919031', 'Suharti', ' Dsn Karanganyar 4/6 Purwosari', '3323194209660001', '', '', NULL, '0966-09-02', 1, '2019-09-03 08:02:27', 0, ''),
('K4040919032', 'Wahyuningsih', 'Dsn Gotakan 1/4 Mento Candiroto ', '3323125302950001', '', '', NULL, '1995-02-13', 1, '2019-09-04 09:28:12', 0, ''),
('K4040919033', 'Yuliati', 'Dsn Tempelsari 1/- Muntung Candiroto ', '3323126711860004', '', '', NULL, '1986-11-27', 1, '2019-09-04 09:30:20', 0, ''),
('K4040919034', 'Nina Wati', ' Selosabrang 1 1/1 Selosabrang Bejen', '3323184709970001', '', '', NULL, '1997-09-07', 1, '2019-09-04 09:36:30', 0, ''),
('K4040919035', 'Siswiyanti', ' Selosabrang 4/2 Selosabrang Bejen', '3323186402740003', '3323181507080003', '', NULL, '1974-02-14', 1, '2019-09-04 09:44:04', 0, ''),
('K4040919036', 'Sariyati', 'Dsn Kentangan 3/2 Lempuyang Candiroto ', '3323124911720001', '', '', NULL, '1972-11-09', 1, '2019-09-04 09:51:48', 0, ''),
('K4040919037', 'Yossy Ratnasari', 'Tunggulsari 13/4 Sukabumi Cepogo ', '3323124503920001', '', '', NULL, '1992-03-05', 1, '2019-09-04 09:53:30', 0, ''),
('K4040919038', 'Hardwiyanti', ' Muntuk 1/3 Pitrosari Wonoboyo', '3323195808830002', '', '', NULL, '1983-08-18', 1, '2019-09-04 09:59:33', 0, ''),
('K4040919046', 'Irfan Ma\'arif', 'Sinongko 1/3 Plosogaden Candiroto ', '3323120512930001', '', '', NULL, '1993-12-05', 1, '2019-09-04 22:05:21', 2, ''),
('K4040919047', 'Dodi Endrasatri', ' Dsn Batursari 3/4 candiroto\r\n', '3323', '', '', NULL, '1999-02-11', 1, '2019-09-04 22:15:10', 2, ''),
('K4050919039', 'Surami', 'Dsn Kauman 3/3 Muntung Candiroto ', '3323127112610014', '', '', NULL, '1961-12-31', 1, '2019-09-05 08:27:13', 0, ''),
('K4050919040', 'Muhammad Azzam Firdaus', 'Dsn Wonoboyo 4/1 Wonoboyp ', '3323193005990001', '33233192112052285', '', NULL, '1999-05-30', 1, '2019-09-05 08:35:52', 0, ''),
('K4050919041', 'Sapariyah', 'Dsn Bojong 5/2 Bojong Tretep ', '3323113310810001', '3323113101070814', '', NULL, '1983-12-10', 1, '2019-09-05 08:43:17', 0, ''),
('K4050919042', 'Turiyah', 'Dsn Bojong 5/2 Bojong Tretep ', '3323115206640001', '', '', NULL, '0064-06-12', 1, '2019-09-05 08:47:02', 0, ''),
('K4050919043', 'Irfan Ma\'arif', 'Sinongko 1/3 Plosagaden Candiroto  ', '3323120512930001', '3323120512930001', '085643294926', NULL, '1993-12-05', 1, '2019-09-05 08:59:09', 2, ''),
('K4050919044', 'Ishadiyanto', 'Dsn Trocoh 1/4 Lempuyang Candiroto ', '3323121107000001', '', '', NULL, '2000-07-11', 1, '2019-09-05 09:00:47', 0, ''),
('K4050919045', 'Eni Mardiyah', 'Bulusari ', '3324064707730002', '33234061209120003', '', NULL, '1973-07-07', 1, '2019-09-05 09:14:13', 0, ''),
('K4050919048', 'Dodi Endrasatri', ' Dsn Batursari 3/4 candiroto\r\n', '3323', '', '', NULL, '1999-01-02', 1, '2019-09-05 22:17:21', 0, ''),
('K4050919049', 'Irfan Ma\'arif', ' Sinongko 1/3 Plosogaden Candiroto', '3323120512930001', '', '', NULL, '1993-12-05', 1, '2019-09-05 22:19:29', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `bungainvestasi`
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
-- Dumping data untuk tabel `bungainvestasi`
--

INSERT INTO `bungainvestasi` (`biv_id`, `biv_bunga`, `biv_keterangan`, `biv_tgl`, `biv_flag`, `biv_info`) VALUES
(1, 2, '2 %', '2019-05-21 01:18:09', 0, '0000-00-00'),
(2, 1, '1 %', '2019-05-21 01:18:41', 0, '0000-00-00'),
(3, 2.5, '2.5 %', '2019-05-21 01:19:47', 0, '0000-00-00'),
(4, 1.8, 'setiap bulan', '2019-08-24 14:37:29', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bungapinjaman`
--

CREATE TABLE `bungapinjaman` (
  `bup_id` int(11) NOT NULL,
  `bup_bunga` float NOT NULL,
  `bub_tgl` datetime NOT NULL,
  `bub_flag` tinyint(2) NOT NULL,
  `bup_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bungapinjaman`
--

INSERT INTO `bungapinjaman` (`bup_id`, `bup_bunga`, `bub_tgl`, `bub_flag`, `bup_info`) VALUES
(1, 4, '2019-04-19 19:28:44', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bungasetoransimpanan`
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
-- Struktur dari tabel `bungasimpanan`
--

CREATE TABLE `bungasimpanan` (
  `bus_id` int(11) NOT NULL,
  `bus_bunga` float NOT NULL,
  `bus_tgl` datetime NOT NULL,
  `bus_flag` tinyint(2) NOT NULL,
  `bus_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bungasimpanan`
--

INSERT INTO `bungasimpanan` (`bus_id`, `bus_bunga`, `bus_tgl`, `bus_flag`, `bus_info`) VALUES
(4, 1, '2019-04-20 05:24:43', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dendaangsuran`
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
-- Struktur dari tabel `historibungasimpanan`
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
-- Struktur dari tabel `investasiberjangka`
--

CREATE TABLE `investasiberjangka` (
  `ivb_kode` varchar(25) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `kar_kode` varchar(10) NOT NULL COMMENT 'fk dari karyawan',
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `jab_kode` int(11) NOT NULL,
  `jab_nama` varchar(50) NOT NULL,
  `jab_tgl` datetime NOT NULL,
  `jab_flag` tinyint(2) NOT NULL,
  `jab_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
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
(13, 'Collector', '2019-08-27 07:46:03', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan`
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
-- Dumping data untuk tabel `jaminan`
--

INSERT INTO `jaminan` (`jam_id`, `pin_id`, `jej_id`, `jam_nomor`, `jam_unit`, `jam_noregistrasi`, `jam_tahunpembuatan`, `jam_atasnama`, `jam_luas`, `jam_keterangan`, `jam_file`, `jam_tgl`, `jam_flag`, `jam_info`, `jam_alamat`) VALUES
(23, 'KE270819001', 1, '123456789', 'SEPEDAMOTOR mio', 'AA 2345 H', '2016', 'ERLIN AMALYA', NULL, 'kurang sk3', '', '2019-08-27 13:18:50', 0, '', 'parakan'),
(24, 'KE270819002', 1, '123456789', 'SEPEDAMOTOR mio', 'AA 1234 T', '2016', 'ERLIN AMALYA', NULL, '', '', '2019-08-27 13:38:44', 0, '', 'PARAKAN'),
(25, 'KE270819003', 1, '123456', 'SEPEDAMOTOR', 'AA 2345 H', '2015', 'ERLIN AMALYA', NULL, '', '', '2019-08-27 13:45:09', 0, '', 'PARAKAN'),
(26, 'KE280819001', 1, '236455', 'sepeda motor', 'aa 1245 h', '2018', 'erlin', NULL, '', '', '2019-08-28 12:34:48', 0, '', 'parakan'),
(27, 'KE290819001', 1, '5341564', 'sepeda motor klx', 'aa 1245 h', '2018', 'atyar', NULL, 'jhrzkmkli', '', '2019-08-29 08:46:05', 0, '', 'ghdchcgfh'),
(28, 'KE290819002', 2, '5341564', NULL, NULL, NULL, NULL, NULL, 'mvgvjcf', '', '2019-08-29 09:06:08', 0, '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jangkawaktuinvestasi`
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
-- Dumping data untuk tabel `jangkawaktuinvestasi`
--

INSERT INTO `jangkawaktuinvestasi` (`jwi_id`, `jwi_jangkawaktu`, `jwi_keterangan`, `jwi_tgl`, `jwi_flag`, `jwi_info`) VALUES
(1, 3, '3 bulan', '2019-05-21 01:09:34', 0, ''),
(2, 6, '6 bulan', '2019-05-21 01:12:08', 0, ''),
(3, 9, '9 bulan', '2019-05-21 01:12:18', 0, ''),
(4, 12, '12 bulan', '2019-05-21 01:12:30', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasainvestasi`
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
-- Dumping data untuk tabel `jasainvestasi`
--

INSERT INTO `jasainvestasi` (`jiv_id`, `jiv_jasa`, `jiv_keterangan`, `jiv_tgl`, `jiv_flag`, `jiv_info`) VALUES
(1, 'Hadiah', 'Ambil di depan', '2019-05-21 01:14:25', 0, ''),
(2, 'Per Bulan', 'Ambil tiap bulan', '2019-05-21 01:15:11', 1, ''),
(3, 'Belakang', 'Ambil di belakang', '2019-05-21 01:15:40', 0, ''),
(4, '1,8', 'setiap bulan', '2019-08-24 14:36:26', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisjaminan`
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
-- Dumping data untuk tabel `jenisjaminan`
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
-- Struktur dari tabel `jenisklaim`
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
-- Dumping data untuk tabel `jenisklaim`
--

INSERT INTO `jenisklaim` (`jkl_id`, `jkl_keuntungan`, `jkl_plan`, `jkl_tahunke`, `jkl_nominal`, `jkl_keterangan`, `jkl_administrasi`, `jkl_tgl`, `jkl_flag`, `jkl_info`) VALUES
(1, 'Santunan Duka Plan A', '1', 0, 5000000, 'Santunan duka untuk anggota jika meninggal', 5, '2019-07-28 22:16:21', 1, ''),
(2, 'Santunan Duka Plan B', '2', 0, 10000000, 'Santunan duka untuk anggota yang meninggal', 5, '2019-07-29 09:53:02', 0, ''),
(3, 'Santunan Duka Plan C', '3', 0, 15000000, 'Santunan duka untuk anggota jika menginggal', 5, '2019-07-29 09:53:44', 0, ''),
(4, 'Klaim Tahun Ke-2 Plan A', '1', 2, 600000, 'Bisa diklaim oleh anggota untuk rawat inap pada bulan ke-13', 5, '2019-07-29 09:55:46', 1, ''),
(5, 'Klaim Tahun Ke-3 Plan A', '1', 3, 1200000, 'Bisa diklaim oleh anggota untuk rawat inap pada bulan ke-25', 5, '2019-07-29 09:57:28', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenispelunasan`
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
-- Dumping data untuk tabel `jenispelunasan`
--

INSERT INTO `jenispelunasan` (`jep_id`, `jep_jenis`, `jep_keterangan`, `jep_tgl`, `jep_flag`, `jep_info`) VALUES
(1, 'Biasa', 'Pelunasan sesuai dengan jatuh tempo pelunasan', '2019-05-21 14:09:59', 0, ''),
(2, 'Dipercepat', 'Pelunasan lebih awal dari tenor pelunasan pinjaman', '2019-05-21 14:10:32', 0, ''),
(3, 'Macet', 'Pelunsan lebih dari jatuh tempo / tenor pelunasan', '2019-05-21 14:11:33', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenispenarikansimkesan`
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
-- Dumping data untuk tabel `jenispenarikansimkesan`
--

INSERT INTO `jenispenarikansimkesan` (`jps_id`, `jps_jenis`, `jps_administrasi`, `jps_persenpenarikan`, `jps_tgl`, `jps_flag`, `jps_info`) VALUES
(1, 'Penarikan 10', 5, 3, '2019-07-28 22:19:07', 1, ''),
(2, 'Penarikan 5', 5, 10, '2019-07-29 08:13:45', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenissetoran`
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
-- Dumping data untuk tabel `jenissetoran`
--

INSERT INTO `jenissetoran` (`jse_id`, `jse_setoran`, `jse_keterangan`, `jse_min`, `jse_tgl`, `jse_flag`, `jse_info`) VALUES
(1, 'Harian', 'setoran harian', 5000, '2019-04-19 19:06:22', 1, ''),
(2, 'Mingguan', 'Setoran Mingguan', 30000, '2019-04-19 19:06:37', 1, ''),
(3, 'Bulanan', 'Setoran bulanan', 100000, '2019-04-19 19:06:49', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenissimpanan`
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
-- Dumping data untuk tabel `jenissimpanan`
--

INSERT INTO `jenissimpanan` (`jsi_id`, `jsi_simpanan`, `jsi_keterangan`, `jsi_tgl`, `jsi_flag`, `jsi_info`) VALUES
(1, '9', 'Simpanan jangka 9 bulan', '2019-04-19 19:08:30', 0, ''),
(2, '12', 'Simpanan Jangka 12 Bulan', '2019-04-19 19:08:46', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantorksp`
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
-- Dumping data untuk tabel `kantorksp`
--

INSERT INTO `kantorksp` (`kks_id`, `kks_nama`, `kks_alamat`, `kks_kode`, `kks_flag`, `kks_tgl`, `kks_info`) VALUES
(1, 'Kantor Candiroto', 'Krajan RT3 RW1, Candiroto, Temanggung', 'K4', 0, '2019-09-01 19:40:29', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`kar_kode`, `kar_nama`, `kar_nik`, `jab_kode`, `kar_alamat`, `kar_nohp`, `kar_simpanan`, `kar_status`, `kar_tgl`, `kar_flag`, `kar_info`) VALUES
('2708004', 'Adilla', '3323223322122345', 2, 'Kedu', '085876329811', NULL, 0, '2019-08-27 07:26:24', 2, ''),
('2708005', 'Erlin', '33232123232456', 3, 'Parakan', '089768765543', NULL, 0, '2019-08-27 07:38:45', 2, ''),
('2708006', 'Silvia', '33234567867544', 11, 'Bulu', '089768765345', NULL, 0, '2019-08-27 07:47:19', 2, ''),
('3108007', 'CHOIRUL ANWAR', '3323101210000001', 4, 'DSN TAPAK 3.4 GIYONO JUMO TEMANGGUNG', '088225444603', NULL, 0, '2019-08-31 13:19:46', 0, ''),
('3108008', 'YUYUN FITRASTUTI', '33233076806960003', 4, 'BANDUNG GEDE 2/6 KEDU TEMANGGUNG', '0816697201', NULL, 0, '2019-08-31 13:24:31', 0, ''),
('3108009', 'AFRIN IRNAWATI', '3323', 4, 'KRAJAN 7/1 LEMPUYANG CANDIROTO', '085867427504', NULL, 0, '2019-08-31 13:27:21', 0, ''),
('3108010', 'ESTI RAHMANINGSIH', '3323', 4, 'KRAJAN 2/1 LEMPUYANG CANDIROTO', '085643294926', NULL, 0, '2019-08-31 13:30:36', 0, ''),
('3108011', 'RAKHA SATRIO AJI P', '332308291160001', 4, 'JUBUG 2/2 WANUTENGAH PARAKAN TEMANGGUNG', '085747350822', NULL, 0, '2019-08-31 13:33:38', 0, ''),
('3108012', 'FIFI ELISANDI', '3323', 11, 'GROGOL 2/2 KUTOANYAR KEDU', '081578484249', NULL, 0, '2019-08-31 13:36:58', 0, ''),
('3108013', 'ARIF SUSANTO', '3323092803950001', 11, 'SUMBERAN PETIREJO 2/3 NGADIREJO TEMANGGUNG', '085643533740', NULL, 0, '2019-08-31 13:39:48', 0, ''),
('3108014', 'SRI NUR JANAH', '3323084106560002', 3, 'KARANG BENDO 2/3 TEGALROSO PARAKAN  TEMANGGUNG', '085714138581', NULL, 0, '2019-08-31 13:42:55', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawanijasah`
--

CREATE TABLE `karyawanijasah` (
  `kij_id` int(11) NOT NULL,
  `kar_kode` int(11) NOT NULL COMMENT 'fk dr karyawan',
  `kij_sd` varchar(25) DEFAULT NULL,
  `kij_smp` varchar(25) DEFAULT NULL,
  `kij_sma` varchar(25) DEFAULT NULL,
  `kij_d3` varchar(25) DEFAULT NULL,
  `kij_s1` varchar(25) DEFAULT NULL,
  `kij_s2` varchar(25) DEFAULT NULL,
  `kij_s3` varchar(25) DEFAULT NULL,
  `kij_lainlain` varchar(25) DEFAULT NULL,
  `kij_status` tinyint(2) NOT NULL,
  `kij_tgl` datetime NOT NULL,
  `kij_flag` tinyint(2) NOT NULL,
  `kij_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawanijasah`
--

INSERT INTO `karyawanijasah` (`kij_id`, `kar_kode`, `kij_sd`, `kij_smp`, `kij_sma`, `kij_d3`, `kij_s1`, `kij_s2`, `kij_s3`, `kij_lainlain`, `kij_status`, `kij_tgl`, `kij_flag`, `kij_info`) VALUES
(3, 2708005, '-', '', 'SMK DN-03 MK 0012345', '', '', '', '', NULL, 0, '2019-08-27 07:38:45', 0, ''),
(4, 2708006, '-', '', '', '', 'S1/123/23/M', '', '', NULL, 0, '2019-08-27 07:47:19', 0, ''),
(5, 3108007, '-', '-', 'DN -03 D1/13 0019781', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:19:46', 0, ''),
(6, 3108008, '-', 'DN 03DI 0154120', 'DN 03MK0166705', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:24:31', 0, ''),
(7, 3108009, '-', '-', 'DN03 MK/13 0082624', '--', '-', '-', '-', NULL, 0, '2019-08-31 13:27:21', 0, ''),
(8, 3108010, '-', '-', 'DN 030074207', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:30:36', 0, ''),
(9, 3108011, '-', '-', 'DN03MK0099046', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:33:38', 0, ''),
(10, 3108012, '-', '-', 'MA 11015665', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:36:58', 0, ''),
(11, 3108013, '-', '-', 'DN03MA0022316', '0', '0', '0', '-', NULL, 0, '2019-08-31 13:39:48', 0, ''),
(12, 3108014, '-', '-', 'DN03MK/060052317', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:42:55', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawansimpanan`
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
-- Dumping data untuk tabel `karyawansimpanan`
--

INSERT INTO `karyawansimpanan` (`ksi_id`, `kar_kode`, `ksi_simpanan`, `ksi_status`, `ksi_tgl`, `ksi_flag`, `ksi_info`) VALUES
(2, '240819001', 2000000, 0, '2019-08-24 13:50:33', 0, ''),
(3, '240819002', 2000000, 0, '2019-08-24 13:50:41', 0, ''),
(4, '240819003', 2000000, 0, '2019-08-24 13:53:49', 0, ''),
(5, '2708004', 2000000, 0, '2019-08-27 07:26:24', 0, ''),
(6, '2708005', 2000000, 0, '2019-08-27 07:38:45', 0, ''),
(7, '2708006', 2000000, 0, '2019-08-27 07:47:19', 0, ''),
(8, '3108007', 2000000, 0, '2019-08-31 13:19:46', 0, ''),
(9, '3108008', 2000000, 0, '2019-08-31 13:24:31', 0, ''),
(10, '3108009', 2000000, 0, '2019-08-31 13:27:21', 0, ''),
(11, '3108010', 2000000, 0, '2019-08-31 13:30:36', 0, ''),
(12, '3108011', 2000000, 0, '2019-08-31 13:33:38', 0, ''),
(13, '3108012', 2000000, 0, '2019-08-31 13:36:58', 0, ''),
(14, '3108013', 2000000, 0, '2019-08-31 13:39:48', 0, ''),
(15, '3108014', 2000000, 0, '2019-08-31 13:42:55', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluargakaryawan`
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
-- Dumping data untuk tabel `keluargakaryawan`
--

INSERT INTO `keluargakaryawan` (`kka_id`, `kar_kode`, `kka_nama`, `kka_hubungan`, `kka_alamat`, `kka_nohp`, `kka_tgl`, `kka_flag`, `kka_info`) VALUES
(1, '2708004', 'Wakijo', 'Ayah', ' Kedu', '08976876565', '2019-08-27 07:26:24', 0, ''),
(2, '2708005', 'Andi', 'Ayah', ' Parakan', '0897865765', '2019-08-27 07:38:45', 0, ''),
(3, '2708006', 'aaaa', 'Ayah', ' Bulu', '0876765654', '2019-08-27 07:47:19', 0, ''),
(4, '3108007', 'ZAENAL ARIFIN', 'AYAH', ' DSN TAPAK 3.4 GIYONO JUMO TEMANGGUNG', '85228174424', '2019-08-31 13:19:46', 0, ''),
(5, '3108008', 'PURWANTI', 'IBU', ' BANDUNG GEDE 2/6 KEDU TEMANGGUNG', '81816697339', '2019-08-31 13:24:31', 0, ''),
(6, '3108009', 'SEPTI SORAYA', 'KAKAK KANDUNG', ' KRAJAN 7/1 LEMPUYANG CANDIROTO', '085867427504', '2019-08-31 13:27:21', 0, ''),
(7, '3108010', 'IBU', 'IBU', 'KRAJAN 2/1 LEMPUYANG CANDIROTO ', '085643294926', '2019-08-31 13:30:36', 0, ''),
(8, '3108011', 'GAMANG WARDOYO', 'KAKAK', ' JUBUG 2/2 WANUTENGAH PARAKAN TEMANGGUNG', '813938012767', '2019-08-31 13:33:38', 0, ''),
(9, '3108012', 'RESTU PRAMUJI', 'SUAMI', ' GROGOL 2/2 KUTOANYAR KEDU', '81578484249', '2019-08-31 13:36:58', 0, ''),
(10, '3108013', 'YAMIYAH', 'KAKAK', ' SUMBERAN PETIREJO 2/3 NGADIREJO TEMANGGUNG', '85291445836', '2019-08-31 13:39:48', 0, ''),
(11, '3108014', 'WULAN RAMADHANI', 'ADIK', ' KARANG BENDO 2/3 TEGALROSO PARAKAN  TEMANGGUNG', '85700996843', '2019-08-31 13:42:55', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuntunganinvestasi`
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
-- Struktur dari tabel `klaimsimkesan`
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
-- Struktur dari tabel `master_access`
--

CREATE TABLE `master_access` (
  `id` int(11) NOT NULL,
  `nm_access` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_access`
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
-- Struktur dari tabel `mutasiberjangka`
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
-- Struktur dari tabel `mutasipinjaman`
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
-- Struktur dari tabel `mutasisimkesan`
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
-- Struktur dari tabel `mutasisimpanan`
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
-- Struktur dari tabel `neracaaktivatetap`
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
-- Struktur dari tabel `neracaekuitas`
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
-- Struktur dari tabel `neracakasbank`
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
-- Struktur dari tabel `neracakasbanksimkesan`
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
-- Struktur dari tabel `neracakewajibanjangkapanjang`
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
-- Struktur dari tabel `pelunasan`
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
-- Struktur dari tabel `penarikaninvestasiberjangka`
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
-- Struktur dari tabel `penarikansimkesan`
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
-- Struktur dari tabel `penarikansimpanan`
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
-- Struktur dari tabel `penarikansimpananwajib`
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
-- Struktur dari tabel `penjamin`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `phu`
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
-- Struktur dari tabel `phusimkesan`
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
-- Struktur dari tabel `phusimkesanpendapatan`
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
-- Struktur dari tabel `phu_sistem`
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
-- Struktur dari tabel `pinjaman`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `plansimkesan`
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
-- Dumping data untuk tabel `plansimkesan`
--

INSERT INTO `plansimkesan` (`psk_id`, `psk_plan`, `psk_setoran`, `psk_keterangan`, `psk_tgl`, `psk_flag`, `psk_info`) VALUES
(1, 'Plan A', 50000, 'Plan A', '2019-05-08 14:11:42', 0, ''),
(2, 'Plan B', 100000, 'Plan B', '2019-05-08 14:47:23', 1, ''),
(3, 'Plan C', 150000, 'Plan C', '2019-07-29 09:47:07', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potonganprovisi`
--

CREATE TABLE `potonganprovisi` (
  `pop_id` int(11) NOT NULL,
  `pop_potongan` float NOT NULL,
  `pop_tgl` datetime NOT NULL,
  `pop_flag` tinyint(2) NOT NULL,
  `pop_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potonganprovisi`
--

INSERT INTO `potonganprovisi` (`pop_id`, `pop_potongan`, `pop_tgl`, `pop_flag`, `pop_info`) VALUES
(2, 5, '2019-08-27 13:15:08', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoransimkesan`
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

--
-- Dumping data untuk tabel `setoransimkesan`
--

INSERT INTO `setoransimkesan` (`ssk_id`, `sik_kode`, `ssk_tglsetoran`, `ssk_tglbayar`, `ssk_jmlsetor`, `ssk_status`, `ssk_tgl`, `ssk_flag`, `ssk_info`) VALUES
(8, 'KE290819001', '2019-08-29 13:57:42', '2019-08-29 13:57:42', 150000, 0, '2019-08-29 13:57:42', 0, ''),
(9, 'KE290819002', '2019-08-29 14:01:03', '2019-08-29 14:01:03', 100000, 0, '2019-08-29 14:01:03', 0, ''),
(10, 'KE290819002', '2019-08-29 14:02:32', '2019-08-29 14:02:32', 0, 0, '2019-08-29 14:02:32', 0, ''),
(11, 'KE290819002', '2019-08-29 14:02:45', '2019-08-29 14:02:45', 100000, 0, '2019-08-29 14:02:45', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoransimpanan`
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
-- Dumping data untuk tabel `setoransimpanan`
--

INSERT INTO `setoransimpanan` (`ssi_id`, `sim_kode`, `ssi_tglsetor`, `ssi_jmlsetor`, `ssi_tgl`, `ssi_flag`, `ssi_info`) VALUES
(44, 'K4B020919001', '2019-09-02 14:14:51', 40000, '2019-09-02 14:14:51', 0, ''),
(45, 'K4B020919002', '2019-09-02 14:18:51', 100000, '2019-09-02 14:18:51', 0, ''),
(46, 'K4B020919003', '2019-09-02 19:07:18', 15000, '2019-09-02 19:07:18', 0, ''),
(47, 'K4B020919004', '2019-09-02 19:12:26', 10000, '2019-09-02 19:12:26', 0, ''),
(48, 'K4B020919006', '2019-09-02 19:23:01', 200000, '2019-09-02 19:23:01', 0, ''),
(49, 'K4B020919007', '2019-09-02 19:35:04', 10000, '2019-09-02 19:35:04', 0, ''),
(50, 'K4B020919003', '2019-09-03 07:15:54', 15000, '2019-09-03 07:15:54', 0, ''),
(51, 'K4B030919001', '2019-09-03 07:25:49', 30000, '2019-09-03 07:25:49', 0, ''),
(52, 'K4B030919002', '2019-09-03 07:26:34', 20000, '2019-09-03 07:26:34', 0, ''),
(53, 'K4B030919003', '2019-09-03 07:27:15', 50000, '2019-09-03 07:27:15', 0, ''),
(54, 'K4B030919004', '2019-09-03 07:28:03', 50000, '2019-09-03 07:28:03', 0, ''),
(55, 'K4B020919006', '2019-09-04 00:00:00', 10000, '2019-09-04 20:59:53', 1, ''),
(56, 'K4B030919005', '2019-09-03 07:42:39', 10000, '2019-09-03 07:42:39', 0, ''),
(57, 'K4B020919002', '2019-09-03 07:43:01', 100000, '2019-09-03 07:43:01', 0, ''),
(58, 'K4A030919007', '2019-09-03 07:47:26', 1000000, '2019-09-03 07:47:26', 2, ''),
(59, 'K4B030919006', '2019-09-03 07:47:47', 50000, '2019-09-03 07:47:47', 0, ''),
(61, 'K4B040919002', '2019-09-04 09:32:30', 100000, '2019-09-04 09:32:30', 0, ''),
(62, 'K4B040919001', '2019-09-04 09:33:13', 10000, '2019-09-04 09:33:13', 0, ''),
(63, 'K4B020919003', '2019-09-04 09:33:48', 15000, '2019-09-04 09:33:48', 0, ''),
(64, 'K4B040919004', '2019-09-04 09:47:00', 30000, '2019-09-04 09:47:00', 0, ''),
(65, 'K4B040919003', '2019-09-04 09:47:22', 90000, '2019-09-04 09:47:22', 0, ''),
(66, 'K4B020919007', '2019-09-04 09:48:10', 20000, '2019-09-04 09:48:10', 0, ''),
(67, 'K4B040919006', '2019-09-04 09:55:05', 10000, '2019-09-04 09:55:05', 0, ''),
(68, 'K4B040919005', '2019-09-04 09:55:43', 10000, '2019-09-04 09:55:43', 0, ''),
(69, 'K4B030919005', '2019-09-04 09:56:11', 10000, '2019-09-04 09:56:11', 0, ''),
(70, 'K4B020919002', '2019-09-04 09:56:31', 50000, '2019-09-04 09:56:31', 0, ''),
(71, 'K4B040919007', '2019-09-04 10:00:34', 90000, '2019-09-04 10:00:34', 0, ''),
(72, 'K4B030919006', '2019-09-04 10:01:00', 20000, '2019-09-04 10:01:00', 0, ''),
(73, 'K4B030919008', '2019-09-04 10:01:23', 50000, '2019-09-04 10:01:23', 0, ''),
(74, 'K4B030919008', '2019-09-03 00:00:00', 1000000, '2019-09-03 00:00:00', 0, ''),
(75, 'K4B050919001', '2019-09-05 08:29:54', 40000, '2019-09-05 08:29:54', 0, ''),
(76, 'K4B020919003', '2019-09-05 08:30:57', 15000, '2019-09-05 08:30:57', 0, ''),
(77, 'K4B040919001', '2019-09-05 08:31:21', 10000, '2019-09-05 08:31:21', 0, ''),
(78, 'K4B050919004', '2019-09-05 08:49:26', 100000, '2019-09-05 08:49:26', 0, ''),
(79, 'K4B050919003', '2019-09-05 08:49:46', 100000, '2019-09-05 08:49:46', 0, ''),
(80, 'K4B050919002', '2019-09-05 08:50:08', 40000, '2019-09-05 08:50:08', 0, ''),
(81, 'K4B030919004', '2019-09-05 08:56:18', 50000, '2019-09-05 08:56:18', 0, ''),
(82, 'K4B040919004', '2019-09-05 08:56:38', 40000, '2019-09-05 08:56:38', 0, ''),
(83, 'K4B020919006', '2019-09-05 08:57:06', 30000, '2019-09-05 08:57:06', 0, ''),
(84, 'K4B020919002', '2019-09-05 09:11:23', 50000, '2019-09-05 09:11:23', 0, ''),
(85, 'K4B020919001', '2019-09-05 09:11:40', 60000, '2019-09-05 09:11:40', 0, ''),
(86, 'K4B050919005', '2019-09-05 09:12:35', 600000, '2019-09-05 09:12:35', 0, ''),
(87, 'K4B050919006', '2019-09-05 09:15:08', 200000, '2019-09-05 09:15:08', 0, ''),
(88, 'K4B030919008', '2019-09-05 09:20:51', 25000, '2019-09-05 09:20:51', 0, ''),
(89, 'K4B030919006', '2019-09-05 09:21:19', 50000, '2019-09-05 09:21:19', 0, ''),
(90, 'K4A050919007', '2019-09-05 22:22:17', 20000, '2019-09-05 22:22:17', 0, ''),
(91, 'K4B040919001', '2019-09-06 07:26:06', 10000, '2019-09-06 07:26:06', 0, ''),
(92, 'K4B040919002', '2019-09-06 07:27:04', 10000, '2019-09-06 07:27:04', 0, ''),
(93, 'K4B020919003', '2019-09-06 07:27:24', 15000, '2019-09-06 07:27:24', 0, ''),
(94, 'K4B050919001', '2019-09-06 07:28:12', 20000, '2019-09-06 07:28:12', 0, ''),
(95, 'K4B040919004', '2019-09-06 07:40:38', 40000, '2019-09-06 07:40:38', 0, ''),
(96, 'K4B020919007', '2019-09-06 07:41:26', 10000, '2019-09-06 07:41:26', 0, ''),
(97, 'K4B020919006', '2019-09-06 07:42:06', 50000, '2019-09-06 07:42:06', 0, ''),
(98, 'K4B040919005', '2019-09-06 07:42:57', 10000, '2019-09-06 07:42:57', 0, ''),
(99, 'K4B040919006', '2019-09-06 07:43:24', 20000, '2019-09-06 07:43:24', 0, ''),
(100, 'K4B030919005', '2019-09-06 07:43:54', 10000, '2019-09-06 07:43:54', 0, ''),
(101, 'K4B030919008', '2019-09-06 07:44:56', 25000, '2019-09-06 07:44:56', 0, ''),
(102, 'K4B030919006', '2019-09-06 07:45:17', 10000, '2019-09-06 07:45:17', 0, ''),
(103, 'K4B040919007', '2019-09-06 07:45:37', 50000, '2019-09-06 07:45:37', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoransimpananwajib`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `settingangsuran`
--

CREATE TABLE `settingangsuran` (
  `sea_id` int(11) NOT NULL,
  `sea_tenor` tinyint(3) NOT NULL,
  `sea_tgl` datetime NOT NULL,
  `sea_flag` tinyint(2) NOT NULL,
  `sea_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settingangsuran`
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
-- Struktur dari tabel `settingdenda`
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
-- Dumping data untuk tabel `settingdenda`
--

INSERT INTO `settingdenda` (`sed_id`, `sed_hari`, `sed_denda`, `sed_tgl`, `sed_flag`, `sed_info`) VALUES
(1, 1, 0.5, '2019-05-21 14:13:46', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settingkategoripeminjam`
--

CREATE TABLE `settingkategoripeminjam` (
  `skp_id` int(11) NOT NULL,
  `skp_kategori` varchar(25) NOT NULL,
  `skp_tgl` datetime NOT NULL,
  `skp_flag` tinyint(2) NOT NULL,
  `skp_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settingkategoripeminjam`
--

INSERT INTO `settingkategoripeminjam` (`skp_id`, `skp_kategori`, `skp_tgl`, `skp_flag`, `skp_info`) VALUES
(1, 'Umum', '2019-05-21 13:33:43', 1, ''),
(2, 'Karyawan', '2019-05-21 13:33:51', 1, ''),
(3, 'Khusus', '2019-05-21 13:36:45', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settingsimpanan`
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
-- Dumping data untuk tabel `settingsimpanan`
--

INSERT INTO `settingsimpanan` (`ses_id`, `ses_nama`, `ses_min`, `ses_max`, `ses_tgl`, `ses_flag`, `ses_info`) VALUES
(1, 'Simpanan Wajib', 20000, 240000, '2019-04-20 05:20:42', 1, ''),
(2, 'Simpanan Pokok', 10000, 10000, '2019-05-26 22:26:40', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settingstatuspeminjam`
--

CREATE TABLE `settingstatuspeminjam` (
  `ssp_id` int(11) NOT NULL,
  `ssp_namastatus` varchar(25) NOT NULL,
  `ssp_tgl` datetime NOT NULL,
  `ssp_flag` tinyint(2) NOT NULL,
  `ssp_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settingstatuspeminjam`
--

INSERT INTO `settingstatuspeminjam` (`ssp_id`, `ssp_namastatus`, `ssp_tgl`, `ssp_flag`, `ssp_info`) VALUES
(1, 'Lancar', '2019-05-21 13:45:59', 0, ''),
(2, 'Agak Macet', '2019-05-21 13:46:06', 0, ''),
(3, 'Macet', '2019-05-21 13:46:10', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shu`
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
  `phu_id` int(11) NOT NULL COMMENT 'fk dari phu',
  `psis_id` varchar(20) NOT NULL COMMENT 'fk dari phu_sistem'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shusimkesan`
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
-- Struktur dari tabel `simkesan`
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
-- Struktur dari tabel `simpanan`
--

CREATE TABLE `simpanan` (
  `sim_kode` varchar(25) NOT NULL,
  `ang_no` varchar(25) NOT NULL COMMENT 'fk dari anggota',
  `kar_kode` varchar(15) NOT NULL COMMENT 'fk dari karyawan',
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
-- Dumping data untuk tabel `simpanan`
--

INSERT INTO `simpanan` (`sim_kode`, `ang_no`, `kar_kode`, `bus_id`, `jsi_id`, `jse_id`, `wil_kode`, `sim_tglpendaftaran`, `sim_status`, `sim_tgl`, `sim_flag`, `sim_info`) VALUES
('K4A020919005', 'K4020919022', '3108011', 4, 1, 1, '15', '2019-09-02 00:00:00', '0', '2019-09-02 19:20:27', 2, ''),
('K4A030919007', 'K4030919030', '3108007', 4, 1, 1, '14', '2019-09-03 00:00:00', '0', '2019-09-03 07:46:49', 2, ''),
('K4A050919007', 'K4050919048', '3108007', 4, 1, 1, '14', '2019-09-05 00:00:00', '0', '2019-09-05 22:21:23', 0, ''),
('K4B020919001', 'K4020919018', '3108010', 4, 2, 1, '18', '2019-09-02 00:00:00', '0', '2019-09-02 14:13:41', 0, ''),
('K4B020919002', 'K4020919019', '3108010', 4, 2, 1, '18', '2019-09-02 00:00:00', '0', '2019-09-02 14:18:19', 0, ''),
('K4B020919003', 'K4020919020', '3108009', 4, 2, 1, '17', '2019-09-02 00:00:00', '0', '2019-09-02 19:06:26', 0, ''),
('K4B020919004', 'K4020919021', '3108011', 4, 2, 1, '15', '2019-09-02 00:00:00', '0', '2019-09-02 19:11:46', 0, ''),
('K4B020919006', 'K4020919022', '3108011', 4, 2, 1, '15', '2019-09-02 00:00:00', '0', '2019-09-02 19:21:27', 0, ''),
('K4B020919007', 'K4020919023', '3108011', 4, 2, 1, '15', '2019-09-02 00:00:00', '0', '2019-09-02 19:34:38', 0, ''),
('K4B030919001', 'K4030919024', '3108011', 4, 2, 1, '15', '2019-09-03 00:00:00', '0', '2019-09-03 07:25:00', 0, ''),
('K4B030919002', 'K4030919025', '3108011', 4, 2, 1, '15', '2019-09-03 00:00:00', '0', '2019-09-03 07:26:12', 0, ''),
('K4B030919003', 'K4030919026', '3108011', 4, 2, 1, '15', '2019-09-03 00:00:00', '0', '2019-09-03 07:26:58', 0, ''),
('K4B030919004', 'K4030919027', '3108011', 4, 2, 1, '15', '2019-09-03 00:00:00', '0', '2019-09-03 07:27:40', 0, ''),
('K4B030919005', 'K4030919028', '3108010', 4, 2, 1, '18', '2019-09-03 00:00:00', '0', '2019-09-03 07:42:11', 0, ''),
('K4B030919006', 'K4030919029', '3108007', 4, 2, 1, '14', '2019-09-03 00:00:00', '0', '2019-09-03 07:46:25', 0, ''),
('K4B030919008', 'K4030919030', '3108007', 4, 2, 1, '14', '2019-09-03 00:00:00', '0', '2019-09-03 07:46:49', 1, ''),
('K4B040919001', 'K4040919032', '3108009', 4, 2, 1, '17', '2019-09-04 00:00:00', '0', '2019-09-04 09:31:18', 0, ''),
('K4B040919002', 'K4040919033', '3108009', 4, 2, 1, '17', '2019-09-04 00:00:00', '0', '2019-09-04 09:31:51', 0, ''),
('K4B040919003', 'K4040919035', '3108011', 4, 2, 1, '15', '2019-09-04 00:00:00', '0', '2019-09-04 09:45:43', 0, ''),
('K4B040919004', 'K4040919034', '3108011', 4, 2, 1, '15', '2019-09-04 00:00:00', '0', '2019-09-04 09:46:23', 0, ''),
('K4B040919005', 'K4040919036', '3108010', 4, 2, 1, '18', '2019-09-04 00:00:00', '0', '2019-09-04 09:54:22', 0, ''),
('K4B040919006', 'K4040919037', '3108010', 4, 2, 1, '18', '2019-09-04 00:00:00', '0', '2019-09-04 09:54:41', 0, ''),
('K4B040919007', 'K4040919038', '3108007', 4, 2, 1, '14', '2019-09-04 00:00:00', '0', '2019-09-04 10:00:10', 0, ''),
('K4B050919001', 'K4050919039', '3108009', 4, 2, 1, '17', '2019-09-05 00:00:00', '0', '2019-09-05 08:28:36', 0, ''),
('K4B050919002', 'K4050919040', '3108008', 4, 2, 1, '16', '2019-09-05 00:00:00', '0', '2019-09-05 08:36:56', 0, ''),
('K4B050919003', 'K4050919041', '3108008', 4, 2, 1, '16', '2019-09-05 00:00:00', '0', '2019-09-05 08:44:47', 0, ''),
('K4B050919004', 'K4050919042', '3108008', 4, 2, 1, '16', '2019-09-05 00:00:00', '0', '2019-09-05 08:48:06', 0, ''),
('K4B050919005', 'K4050919044', '3108010', 4, 2, 1, '18', '2019-09-05 00:00:00', '0', '2019-09-05 09:05:22', 0, ''),
('K4B050919006', 'K4050919045', '3108011', 4, 2, 1, '15', '2019-09-05 00:00:00', '0', '2019-09-05 09:14:48', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpananpokok`
--

CREATE TABLE `simpananpokok` (
  `sip_id` int(10) NOT NULL,
  `ang_no` varchar(25) NOT NULL COMMENT 'fk dari anggota',
  `ses_id` int(11) NOT NULL COMMENT 'fk dari settingsimpanan',
  `sip_setoran` float NOT NULL,
  `sip_tglbayar` datetime NOT NULL,
  `sip_tgl` datetime NOT NULL,
  `sip_flag` tinyint(2) NOT NULL,
  `sip_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simpananpokok`
--

INSERT INTO `simpananpokok` (`sip_id`, `ang_no`, `ses_id`, `sip_setoran`, `sip_tglbayar`, `sip_tgl`, `sip_flag`, `sip_info`) VALUES
(31, 'K4020919019', 2, 10000, '2019-02-09 00:00:00', '2019-09-02 09:17:22', 0, ''),
(32, 'K4020919018', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 09:43:21', 0, ''),
(33, 'K402091901', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 14:16:29', 0, ''),
(34, 'K4020919021', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 19:05:08', 0, ''),
(35, 'K4020919020', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 19:11:07', 0, ''),
(36, 'K4020919022', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 19:18:08', 0, ''),
(37, 'K4020919023', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 19:34:05', 0, ''),
(38, 'K403091902', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 07:19:45', 0, ''),
(39, 'K403091902', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 07:21:05', 0, ''),
(40, 'K403091902', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 07:22:18', 0, ''),
(41, 'K403091902', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 07:23:28', 0, ''),
(42, 'K403091902', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 07:41:40', 0, ''),
(43, 'K4030919024', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 07:44:44', 0, ''),
(44, 'K403091903', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 07:45:45', 0, ''),
(45, 'K403091903', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 08:02:27', 0, ''),
(46, 'K404091903', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 09:28:12', 0, ''),
(47, 'K404091903', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 09:30:20', 0, ''),
(48, 'K404091903', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 09:36:30', 0, ''),
(49, 'K404091903', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 09:44:04', 0, ''),
(50, 'K404091903', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 09:51:48', 0, ''),
(51, 'K404091903', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 09:53:30', 0, ''),
(52, 'K404091903', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 09:59:33', 0, ''),
(53, 'K405091903', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 08:27:13', 0, ''),
(54, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 08:35:52', 0, ''),
(55, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 08:43:17', 0, ''),
(56, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 08:47:02', 0, ''),
(57, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 08:59:09', 0, ''),
(58, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 09:00:47', 0, ''),
(59, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 09:07:59', 0, ''),
(60, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 09:14:13', 0, ''),
(61, 'K404091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-04 22:05:21', 0, ''),
(62, 'K404091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-04 22:15:10', 0, ''),
(63, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 22:17:21', 0, ''),
(64, 'K405091904', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 22:19:29', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpananwajib`
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
-- Dumping data untuk tabel `simpananwajib`
--

INSERT INTO `simpananwajib` (`siw_id`, `ang_no`, `ses_id`, `siw_tglbayar`, `siw_status`, `siw_tglambil`, `siw_tgl`, `siw_flag`, `siw_info`) VALUES
(51, 'K402091901', 1, '2019-09-02 09:17:22', 0, NULL, '2019-09-02 09:17:22', 0, ''),
(52, 'K402091901', 1, '2019-09-02 09:43:21', 0, NULL, '2019-09-02 09:43:21', 0, ''),
(53, 'K402091901', 1, '2019-09-02 14:16:29', 0, NULL, '2019-09-02 14:16:29', 0, ''),
(54, 'K402091902', 1, '2019-09-02 19:05:08', 0, NULL, '2019-09-02 19:05:08', 0, ''),
(55, 'K402091902', 1, '2019-09-02 19:11:07', 0, NULL, '2019-09-02 19:11:07', 0, ''),
(56, 'K402091902', 1, '2019-09-02 19:18:08', 0, NULL, '2019-09-02 19:18:08', 0, ''),
(57, 'K402091902', 1, '2019-09-02 19:34:05', 0, NULL, '2019-09-02 19:34:05', 0, ''),
(58, 'K403091902', 1, '2019-09-03 07:19:45', 0, NULL, '2019-09-03 07:19:45', 0, ''),
(59, 'K403091902', 1, '2019-09-03 07:21:05', 0, NULL, '2019-09-03 07:21:05', 0, ''),
(60, 'K403091902', 1, '2019-09-03 07:22:18', 0, NULL, '2019-09-03 07:22:18', 0, ''),
(61, 'K403091902', 1, '2019-09-03 07:23:28', 0, NULL, '2019-09-03 07:23:28', 0, ''),
(62, 'K403091902', 1, '2019-09-03 07:41:40', 0, NULL, '2019-09-03 07:41:40', 0, ''),
(63, 'K403091902', 1, '2019-09-03 07:44:44', 0, NULL, '2019-09-03 07:44:44', 0, ''),
(64, 'K403091903', 1, '2019-09-03 07:45:45', 0, NULL, '2019-09-03 07:45:45', 0, ''),
(65, 'K403091903', 1, '2019-09-03 08:02:27', 0, NULL, '2019-09-03 08:02:27', 0, ''),
(66, 'K404091903', 1, '2019-09-04 09:28:12', 0, NULL, '2019-09-04 09:28:12', 0, ''),
(67, 'K404091903', 1, '2019-09-04 09:30:20', 0, NULL, '2019-09-04 09:30:20', 0, ''),
(68, 'K404091903', 1, '2019-09-04 09:36:30', 0, NULL, '2019-09-04 09:36:30', 0, ''),
(69, 'K404091903', 1, '2019-09-04 09:44:04', 0, NULL, '2019-09-04 09:44:04', 0, ''),
(70, 'K404091903', 1, '2019-09-04 09:51:48', 0, NULL, '2019-09-04 09:51:48', 0, ''),
(71, 'K404091903', 1, '2019-09-04 09:53:30', 0, NULL, '2019-09-04 09:53:30', 0, ''),
(72, 'K404091903', 1, '2019-09-04 09:59:33', 0, NULL, '2019-09-04 09:59:33', 0, ''),
(73, 'K405091903', 1, '2019-09-05 08:27:13', 0, NULL, '2019-09-05 08:27:13', 0, ''),
(74, 'K405091904', 1, '2019-09-05 08:35:52', 0, NULL, '2019-09-05 08:35:52', 0, ''),
(75, 'K405091904', 1, '2019-09-05 08:43:17', 0, NULL, '2019-09-05 08:43:17', 0, ''),
(76, 'K405091904', 1, '2019-09-05 08:47:02', 0, NULL, '2019-09-05 08:47:02', 0, ''),
(77, 'K405091904', 1, '2019-09-05 08:59:09', 0, NULL, '2019-09-05 08:59:09', 0, ''),
(78, 'K405091904', 1, '2019-09-05 09:00:47', 0, NULL, '2019-09-05 09:00:47', 0, ''),
(79, 'K405091904', 1, '2019-09-05 09:07:59', 0, NULL, '2019-09-05 09:07:59', 0, ''),
(80, 'K405091904', 1, '2019-09-05 09:14:13', 0, NULL, '2019-09-05 09:14:13', 0, ''),
(81, 'K404091904', 1, '2019-09-04 22:05:21', 0, NULL, '2019-09-04 22:05:21', 0, ''),
(82, 'K404091904', 1, '2019-09-04 22:15:10', 0, NULL, '2019-09-04 22:15:10', 0, ''),
(83, 'K405091904', 1, '2019-09-05 22:17:21', 0, NULL, '2019-09-05 22:17:21', 0, ''),
(84, 'K405091904', 1, '2019-09-05 22:19:29', 0, NULL, '2019-09-05 22:19:29', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuspeminjam`
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
-- Struktur dari tabel `sy_config`
--

CREATE TABLE `sy_config` (
  `id` int(11) NOT NULL,
  `conf_name` varchar(50) NOT NULL,
  `conf_val` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sy_config`
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
-- Struktur dari tabel `titipansimkesan`
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
-- Struktur dari tabel `tutupinvestasiberjangka`
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
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
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
-- Struktur dari tabel `user_access`
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
-- Dumping data untuk tabel `user_access`
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
-- Struktur dari tabel `user_group`
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
-- Dumping data untuk tabel `user_group`
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
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `wil_kode` int(10) NOT NULL,
  `wil_nama` varchar(50) NOT NULL,
  `wil_tgl` datetime NOT NULL,
  `wil_flag` tinyint(2) NOT NULL,
  `wil_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`wil_kode`, `wil_nama`, `wil_tgl`, `wil_flag`, `wil_info`) VALUES
(4, 'Tepusen', '2019-08-24 13:51:27', 2, ''),
(5, 'Karna', '2019-08-24 13:51:42', 2, ''),
(6, 'Anggrek', '2019-08-24 13:51:52', 2, ''),
(7, 'Wangi', '2019-08-24 13:51:59', 2, ''),
(8, 'Dahlia', '2019-08-24 13:52:06', 2, ''),
(9, 'Mahkota Dewa', '2019-08-24 13:52:28', 2, ''),
(10, 'Wilayah I', '2019-08-26 12:32:10', 2, ''),
(11, 'Wilayah II', '2019-08-26 12:32:16', 2, ''),
(12, 'Wilayah III', '2019-08-26 12:32:24', 2, ''),
(13, 'Wilayah IV', '2019-08-26 12:32:33', 2, ''),
(14, 'WONOBOYO', '2019-08-31 13:13:25', 0, ''),
(15, 'BEJEN', '2019-08-31 13:13:35', 0, ''),
(16, 'TRETEP', '2019-08-31 13:13:46', 0, ''),
(17, 'MUNTUNG', '2019-08-31 13:14:03', 0, ''),
(18, 'CANDIROTO', '2019-08-31 13:14:14', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah_karyawan`
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
-- Dumping data untuk tabel `wilayah_karyawan`
--

INSERT INTO `wilayah_karyawan` (`wik_id`, `wil_kode`, `status`, `kar_kode`, `wik_tgl`, `wik_flag`, `wik_info`) VALUES
(2, '9', 'aktif', '2708006', '2019-08-27 07:50:17', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ahliwarissimkesan`
--
ALTER TABLE `ahliwarissimkesan`
  ADD PRIMARY KEY (`aws_id`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ang_no`);

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`ags_id`);

--
-- Indeks untuk tabel `bungainvestasi`
--
ALTER TABLE `bungainvestasi`
  ADD PRIMARY KEY (`biv_id`);

--
-- Indeks untuk tabel `bungapinjaman`
--
ALTER TABLE `bungapinjaman`
  ADD PRIMARY KEY (`bup_id`);

--
-- Indeks untuk tabel `bungasetoransimpanan`
--
ALTER TABLE `bungasetoransimpanan`
  ADD PRIMARY KEY (`bss_id`);

--
-- Indeks untuk tabel `bungasimpanan`
--
ALTER TABLE `bungasimpanan`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indeks untuk tabel `dendaangsuran`
--
ALTER TABLE `dendaangsuran`
  ADD PRIMARY KEY (`dnd_id`);

--
-- Indeks untuk tabel `historibungasimpanan`
--
ALTER TABLE `historibungasimpanan`
  ADD PRIMARY KEY (`hbs_id`);

--
-- Indeks untuk tabel `investasiberjangka`
--
ALTER TABLE `investasiberjangka`
  ADD PRIMARY KEY (`ivb_kode`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jab_kode`);

--
-- Indeks untuk tabel `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`jam_id`);

--
-- Indeks untuk tabel `jangkawaktuinvestasi`
--
ALTER TABLE `jangkawaktuinvestasi`
  ADD PRIMARY KEY (`jwi_id`);

--
-- Indeks untuk tabel `jasainvestasi`
--
ALTER TABLE `jasainvestasi`
  ADD PRIMARY KEY (`jiv_id`);

--
-- Indeks untuk tabel `jenisjaminan`
--
ALTER TABLE `jenisjaminan`
  ADD PRIMARY KEY (`jej_id`);

--
-- Indeks untuk tabel `jenisklaim`
--
ALTER TABLE `jenisklaim`
  ADD PRIMARY KEY (`jkl_id`);

--
-- Indeks untuk tabel `jenispelunasan`
--
ALTER TABLE `jenispelunasan`
  ADD PRIMARY KEY (`jep_id`);

--
-- Indeks untuk tabel `jenispenarikansimkesan`
--
ALTER TABLE `jenispenarikansimkesan`
  ADD PRIMARY KEY (`jps_id`);

--
-- Indeks untuk tabel `jenissetoran`
--
ALTER TABLE `jenissetoran`
  ADD PRIMARY KEY (`jse_id`);

--
-- Indeks untuk tabel `jenissimpanan`
--
ALTER TABLE `jenissimpanan`
  ADD PRIMARY KEY (`jsi_id`);

--
-- Indeks untuk tabel `kantorksp`
--
ALTER TABLE `kantorksp`
  ADD PRIMARY KEY (`kks_id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kar_kode`);

--
-- Indeks untuk tabel `karyawanijasah`
--
ALTER TABLE `karyawanijasah`
  ADD PRIMARY KEY (`kij_id`);

--
-- Indeks untuk tabel `karyawansimpanan`
--
ALTER TABLE `karyawansimpanan`
  ADD PRIMARY KEY (`ksi_id`);

--
-- Indeks untuk tabel `keluargakaryawan`
--
ALTER TABLE `keluargakaryawan`
  ADD PRIMARY KEY (`kka_id`);

--
-- Indeks untuk tabel `keuntunganinvestasi`
--
ALTER TABLE `keuntunganinvestasi`
  ADD PRIMARY KEY (`kiv_id`);

--
-- Indeks untuk tabel `klaimsimkesan`
--
ALTER TABLE `klaimsimkesan`
  ADD PRIMARY KEY (`ksi_id`);

--
-- Indeks untuk tabel `master_access`
--
ALTER TABLE `master_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasiberjangka`
--
ALTER TABLE `mutasiberjangka`
  ADD PRIMARY KEY (`mib_id`);

--
-- Indeks untuk tabel `mutasipinjaman`
--
ALTER TABLE `mutasipinjaman`
  ADD PRIMARY KEY (`mup_id`);

--
-- Indeks untuk tabel `mutasisimkesan`
--
ALTER TABLE `mutasisimkesan`
  ADD PRIMARY KEY (`msk_id`);

--
-- Indeks untuk tabel `mutasisimpanan`
--
ALTER TABLE `mutasisimpanan`
  ADD PRIMARY KEY (`mus_id`);

--
-- Indeks untuk tabel `neracaaktivatetap`
--
ALTER TABLE `neracaaktivatetap`
  ADD PRIMARY KEY (`nat_id`);

--
-- Indeks untuk tabel `neracaekuitas`
--
ALTER TABLE `neracaekuitas`
  ADD PRIMARY KEY (`nek_id`);

--
-- Indeks untuk tabel `neracakasbank`
--
ALTER TABLE `neracakasbank`
  ADD PRIMARY KEY (`nkb_id`);

--
-- Indeks untuk tabel `neracakasbanksimkesan`
--
ALTER TABLE `neracakasbanksimkesan`
  ADD PRIMARY KEY (`nkbs_id`);

--
-- Indeks untuk tabel `neracakewajibanjangkapanjang`
--
ALTER TABLE `neracakewajibanjangkapanjang`
  ADD PRIMARY KEY (`njp_id`);

--
-- Indeks untuk tabel `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`pel_id`);

--
-- Indeks untuk tabel `penarikaninvestasiberjangka`
--
ALTER TABLE `penarikaninvestasiberjangka`
  ADD PRIMARY KEY (`pib_id`);

--
-- Indeks untuk tabel `penarikansimkesan`
--
ALTER TABLE `penarikansimkesan`
  ADD PRIMARY KEY (`pns_id`);

--
-- Indeks untuk tabel `penarikansimpanan`
--
ALTER TABLE `penarikansimpanan`
  ADD PRIMARY KEY (`pes_id`);

--
-- Indeks untuk tabel `penarikansimpananwajib`
--
ALTER TABLE `penarikansimpananwajib`
  ADD PRIMARY KEY (`psw_id`);

--
-- Indeks untuk tabel `penjamin`
--
ALTER TABLE `penjamin`
  ADD PRIMARY KEY (`pen_id`);

--
-- Indeks untuk tabel `phu`
--
ALTER TABLE `phu`
  ADD PRIMARY KEY (`phu_id`);

--
-- Indeks untuk tabel `phusimkesan`
--
ALTER TABLE `phusimkesan`
  ADD PRIMARY KEY (`phus_id`);

--
-- Indeks untuk tabel `phusimkesanpendapatan`
--
ALTER TABLE `phusimkesanpendapatan`
  ADD PRIMARY KEY (`phsp_id`);

--
-- Indeks untuk tabel `phu_sistem`
--
ALTER TABLE `phu_sistem`
  ADD PRIMARY KEY (`psis_id`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indeks untuk tabel `plansimkesan`
--
ALTER TABLE `plansimkesan`
  ADD PRIMARY KEY (`psk_id`);

--
-- Indeks untuk tabel `potonganprovisi`
--
ALTER TABLE `potonganprovisi`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indeks untuk tabel `setoransimkesan`
--
ALTER TABLE `setoransimkesan`
  ADD PRIMARY KEY (`ssk_id`);

--
-- Indeks untuk tabel `setoransimpanan`
--
ALTER TABLE `setoransimpanan`
  ADD PRIMARY KEY (`ssi_id`);

--
-- Indeks untuk tabel `setoransimpananwajib`
--
ALTER TABLE `setoransimpananwajib`
  ADD PRIMARY KEY (`ssw_id`);

--
-- Indeks untuk tabel `settingangsuran`
--
ALTER TABLE `settingangsuran`
  ADD PRIMARY KEY (`sea_id`);

--
-- Indeks untuk tabel `settingdenda`
--
ALTER TABLE `settingdenda`
  ADD PRIMARY KEY (`sed_id`);

--
-- Indeks untuk tabel `settingkategoripeminjam`
--
ALTER TABLE `settingkategoripeminjam`
  ADD PRIMARY KEY (`skp_id`);

--
-- Indeks untuk tabel `settingsimpanan`
--
ALTER TABLE `settingsimpanan`
  ADD PRIMARY KEY (`ses_id`);

--
-- Indeks untuk tabel `settingstatuspeminjam`
--
ALTER TABLE `settingstatuspeminjam`
  ADD PRIMARY KEY (`ssp_id`);

--
-- Indeks untuk tabel `shu`
--
ALTER TABLE `shu`
  ADD PRIMARY KEY (`shu_id`);

--
-- Indeks untuk tabel `shusimkesan`
--
ALTER TABLE `shusimkesan`
  ADD PRIMARY KEY (`shus_id`);

--
-- Indeks untuk tabel `simkesan`
--
ALTER TABLE `simkesan`
  ADD PRIMARY KEY (`sik_kode`);

--
-- Indeks untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`sim_kode`);

--
-- Indeks untuk tabel `simpananpokok`
--
ALTER TABLE `simpananpokok`
  ADD PRIMARY KEY (`sip_id`);

--
-- Indeks untuk tabel `simpananwajib`
--
ALTER TABLE `simpananwajib`
  ADD PRIMARY KEY (`siw_id`);

--
-- Indeks untuk tabel `statuspeminjam`
--
ALTER TABLE `statuspeminjam`
  ADD PRIMARY KEY (`stp_id`);

--
-- Indeks untuk tabel `sy_config`
--
ALTER TABLE `sy_config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `titipansimkesan`
--
ALTER TABLE `titipansimkesan`
  ADD PRIMARY KEY (`tts_id`);

--
-- Indeks untuk tabel `tutupinvestasiberjangka`
--
ALTER TABLE `tutupinvestasiberjangka`
  ADD PRIMARY KEY (`tib_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`wil_kode`);

--
-- Indeks untuk tabel `wilayah_karyawan`
--
ALTER TABLE `wilayah_karyawan`
  ADD PRIMARY KEY (`wik_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ahliwarissimkesan`
--
ALTER TABLE `ahliwarissimkesan`
  MODIFY `aws_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `ags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT untuk tabel `bungainvestasi`
--
ALTER TABLE `bungainvestasi`
  MODIFY `biv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bungapinjaman`
--
ALTER TABLE `bungapinjaman`
  MODIFY `bup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bungasetoransimpanan`
--
ALTER TABLE `bungasetoransimpanan`
  MODIFY `bss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `bungasimpanan`
--
ALTER TABLE `bungasimpanan`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dendaangsuran`
--
ALTER TABLE `dendaangsuran`
  MODIFY `dnd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `historibungasimpanan`
--
ALTER TABLE `historibungasimpanan`
  MODIFY `hbs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jab_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `jangkawaktuinvestasi`
--
ALTER TABLE `jangkawaktuinvestasi`
  MODIFY `jwi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jasainvestasi`
--
ALTER TABLE `jasainvestasi`
  MODIFY `jiv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenisjaminan`
--
ALTER TABLE `jenisjaminan`
  MODIFY `jej_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenisklaim`
--
ALTER TABLE `jenisklaim`
  MODIFY `jkl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenispelunasan`
--
ALTER TABLE `jenispelunasan`
  MODIFY `jep_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenispenarikansimkesan`
--
ALTER TABLE `jenispenarikansimkesan`
  MODIFY `jps_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenissetoran`
--
ALTER TABLE `jenissetoran`
  MODIFY `jse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenissimpanan`
--
ALTER TABLE `jenissimpanan`
  MODIFY `jsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kantorksp`
--
ALTER TABLE `kantorksp`
  MODIFY `kks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `karyawanijasah`
--
ALTER TABLE `karyawanijasah`
  MODIFY `kij_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `karyawansimpanan`
--
ALTER TABLE `karyawansimpanan`
  MODIFY `ksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `keluargakaryawan`
--
ALTER TABLE `keluargakaryawan`
  MODIFY `kka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `keuntunganinvestasi`
--
ALTER TABLE `keuntunganinvestasi`
  MODIFY `kiv_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `klaimsimkesan`
--
ALTER TABLE `klaimsimkesan`
  MODIFY `ksi_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_access`
--
ALTER TABLE `master_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mutasiberjangka`
--
ALTER TABLE `mutasiberjangka`
  MODIFY `mib_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mutasipinjaman`
--
ALTER TABLE `mutasipinjaman`
  MODIFY `mup_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mutasisimkesan`
--
ALTER TABLE `mutasisimkesan`
  MODIFY `msk_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mutasisimpanan`
--
ALTER TABLE `mutasisimpanan`
  MODIFY `mus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `neracaaktivatetap`
--
ALTER TABLE `neracaaktivatetap`
  MODIFY `nat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `neracaekuitas`
--
ALTER TABLE `neracaekuitas`
  MODIFY `nek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `neracakasbank`
--
ALTER TABLE `neracakasbank`
  MODIFY `nkb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `neracakasbanksimkesan`
--
ALTER TABLE `neracakasbanksimkesan`
  MODIFY `nkbs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `neracakewajibanjangkapanjang`
--
ALTER TABLE `neracakewajibanjangkapanjang`
  MODIFY `njp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelunasan`
--
ALTER TABLE `pelunasan`
  MODIFY `pel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penarikaninvestasiberjangka`
--
ALTER TABLE `penarikaninvestasiberjangka`
  MODIFY `pib_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penarikansimkesan`
--
ALTER TABLE `penarikansimkesan`
  MODIFY `pns_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penarikansimpanan`
--
ALTER TABLE `penarikansimpanan`
  MODIFY `pes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penarikansimpananwajib`
--
ALTER TABLE `penarikansimpananwajib`
  MODIFY `psw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjamin`
--
ALTER TABLE `penjamin`
  MODIFY `pen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `phu`
--
ALTER TABLE `phu`
  MODIFY `phu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `phusimkesan`
--
ALTER TABLE `phusimkesan`
  MODIFY `phus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `phusimkesanpendapatan`
--
ALTER TABLE `phusimkesanpendapatan`
  MODIFY `phsp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `plansimkesan`
--
ALTER TABLE `plansimkesan`
  MODIFY `psk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `potonganprovisi`
--
ALTER TABLE `potonganprovisi`
  MODIFY `pop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `setoransimkesan`
--
ALTER TABLE `setoransimkesan`
  MODIFY `ssk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `setoransimpanan`
--
ALTER TABLE `setoransimpanan`
  MODIFY `ssi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `setoransimpananwajib`
--
ALTER TABLE `setoransimpananwajib`
  MODIFY `ssw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `settingangsuran`
--
ALTER TABLE `settingangsuran`
  MODIFY `sea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `settingdenda`
--
ALTER TABLE `settingdenda`
  MODIFY `sed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `settingkategoripeminjam`
--
ALTER TABLE `settingkategoripeminjam`
  MODIFY `skp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `settingsimpanan`
--
ALTER TABLE `settingsimpanan`
  MODIFY `ses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `settingstatuspeminjam`
--
ALTER TABLE `settingstatuspeminjam`
  MODIFY `ssp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `shu`
--
ALTER TABLE `shu`
  MODIFY `shu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `shusimkesan`
--
ALTER TABLE `shusimkesan`
  MODIFY `shus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `simpananpokok`
--
ALTER TABLE `simpananpokok`
  MODIFY `sip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `simpananwajib`
--
ALTER TABLE `simpananwajib`
  MODIFY `siw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `statuspeminjam`
--
ALTER TABLE `statuspeminjam`
  MODIFY `stp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sy_config`
--
ALTER TABLE `sy_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `titipansimkesan`
--
ALTER TABLE `titipansimkesan`
  MODIFY `tts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tutupinvestasiberjangka`
--
ALTER TABLE `tutupinvestasiberjangka`
  MODIFY `tib_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `wil_kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `wilayah_karyawan`
--
ALTER TABLE `wilayah_karyawan`
  MODIFY `wik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
