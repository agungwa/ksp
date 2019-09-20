-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 07:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `aws_lampiran` text NOT NULL,
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
(10, 'KE310819001', '332307', 'KTP', 'titik', 'parakan temanggung', 'Orang Tua', 'lengkap', '2019-08-31 12:09:55', 0, '');

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
  `ang_tgllahir` date NOT NULL,
  `ang_status` tinyint(1) NOT NULL,
  `ang_tgl` datetime NOT NULL,
  `ang_flag` tinyint(2) NOT NULL,
  `ang_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ang_no`, `ang_nama`, `ang_alamat`, `ang_noktp`, `ang_nokk`, `ang_nohp`, `ang_tgllahir`, `ang_status`, `ang_tgl`, `ang_flag`, `ang_info`) VALUES
('K1020919001', 'Hajar Fuadah', ' Dusun Banaran 8/1 Banaran Gemawang', '3323206106860002', '3323202112056733', '08152209192', '1986-03-27', 1, '2019-09-02 10:28:46', 0, ''),
('K1020919002', 'widayanti', 'Brujulan 4/2 Krempong Gemawang', '3323205007940001', '33232029071300007', '082329443402', '1994-07-10', 1, '2019-09-02 11:06:02', 0, ''),
('K1020919003', 'Ambar Purnamasari', 'Kaliduren 2/7 Ngadisepi Gemawang', '3323205306920006', '3323206507110002', '081214488398', '1992-06-13', 1, '2019-09-02 11:43:20', 0, ''),
('K1020919004', 'Minroatun Nafisah', ' Kaliduren 6/7 Ngadisepi gemawang', '3323205202910001', '3323200210090002', '081214480398', '1991-02-12', 1, '2019-09-02 11:53:45', 0, ''),
('K1020919005', 'Asih Setyowati', ' Mandang 3/2 Sucen Gemawang', '3323204508850003', '3323202502071711', '082329443402', '1985-08-05', 1, '2019-09-02 14:36:20', 0, ''),
('K1030919006', 'Jumiyah', ' Dsn Klodran 2/6 Gemawang', '3323204307740001', '3323202112052323', '08152209192', '1974-07-03', 1, '2019-09-03 14:01:32', 0, ''),
('K1030919007', 'Ruwanti', ' Sucen 3/4 Gemawang', '3323204808760005', '332320250271790', '085729705458', '1976-08-08', 1, '2019-09-03 15:56:54', 0, ''),
('K1030919008', 'Tri Risyani', ' Biron 1/3  Banaran Gemawang', '3323204202850005', '3323202502070462', '081729705458', '1985-02-02', 1, '2019-09-03 16:02:13', 0, ''),
('K1030919009', 'Waltini', ' kayutahun 4/2 Banaran Gemawang', '3323204704880001', '3323202502070455', '082329443402', '1988-04-07', 1, '2019-09-03 16:06:57', 0, ''),
('K1030919010', 'Pujiyanah', ' Dsn Muncar Lor 1/2 Muncar Gemawang', '3323205309930003', '3323200401160004', '082322127960', '1993-09-13', 1, '2019-09-03 16:12:40', 0, ''),
('K1030919011', 'Yuniyati', ' Dsn Kalidurem 3/7 Ngadisepi Gemawang', '3323105004940002', '3323202112054163', '081214480398', '1994-04-10', 1, '2019-09-03 16:16:41', 0, ''),
('K1030919012', 'Kurnia Widi Asih', ' Libak 1/8 Ngadisepi Gemawang', '3323204406950001', '3323201104120003', '081214480398', '1995-06-04', 1, '2019-09-03 16:21:11', 0, ''),
('K1040919013', 'Taslimah', ' Klodran 4/6 Gemawang Gemwanag', '3323204312850001', '33232011003090012', '08152209192', '1986-12-03', 1, '2019-09-04 10:10:02', 0, ''),
('K1040919014', 'Sihwiyati', ' Dsn Kruwisan 2/4 Banaran Gemawang', '3323206111890001', '33232021011120006', '085729705458', '1989-11-21', 1, '2019-09-04 10:19:07', 0, ''),
('K1040919015', 'Sumartini', ' Dsn Kruwisan 2/4 Banaran', '3323205207780003', '3323202112051047', '05729705458', '1978-07-12', 1, '2019-09-04 10:30:26', 0, ''),
('K1040919016', 'Nanik Wahyuni', ' Ngabuh 2/2 Karangseneng Gemawang', '332305005890002', '332305058990002', '08232944342', '1989-05-10', 1, '2019-09-04 10:40:51', 0, ''),
('K1040919017', 'Tunah', ' Dsn Blawong kulon 1/8 Muncar Gemawang', '3323206911740001', '3323206911740001', '082322127960', '1974-11-29', 1, '2019-09-04 10:45:15', 0, ''),
('K1040919018', 'Ramidi', ' Dsn Sumur 3/6 Ngadisepi Gemawang', '', '3323202112054163', '082322127960', '1957-07-04', 1, '2019-09-04 10:53:25', 0, ''),
('K1040919019', 'Ponimah', ' Dsn Margosari 1/7 Gemawang', '3323204105890002', '3323204105890002', '081214480398', '1989-05-01', 1, '2019-09-04 10:55:50', 0, ''),
('K1050919020', 'Tri Mulyani', ' Klodran 1/6 Gemawang Gemawang', '3323205911860001', '3323205911860001', '08152209192', '1986-11-19', 1, '2019-09-05 12:29:57', 0, ''),
('K1050919021', 'Iswati', ' Dsn Muncar Krajan 3/1 Muncar Gemawang', '3323207110690001', '3323207110690001', '082322127960', '1969-10-31', 1, '2019-09-05 12:38:51', 0, ''),
('K1050919022', 'Sri Mulyawati', ' Dsn Tlogowunggu 2/5 Muncar Gemawang', '332305607740001', '332305607740001', '082322127960', '1974-07-16', 1, '2019-09-05 13:04:40', 0, ''),
('K1050919023', 'Puji Melimona', ' Dsn Seseh 2/10 Ngadisepi Gemawang', '3323204804990001', '3323201512160001', '081214480398', '1999-04-08', 1, '2019-09-05 13:17:20', 0, ''),
('K1050919024', 'Slamet', ' Dsn Pelahan 3/1 Ngadisepi GeMAWANG', '3323095401920003', '3323095401920003', '081327497763', '1992-01-14', 1, '2019-09-05 13:27:37', 0, ''),
('K1050919025', 'Fika Nurmaulida', ' Dsn Pelahan 3/1 Ngadisepi Gemawang', '3323206007990001', '3323206007990001', '081327497763', '1999-07-20', 1, '2019-09-05 13:34:38', 0, ''),
('K1050919026', 'Rois Syarifudin', ' Dsn Kalibanger 3/2 Kalibanger Gemawang', '3323202704860001', '3323202704860001', '081327497763', '1986-05-27', 1, '2019-09-05 13:38:25', 0, ''),
('K1070919027', 'Sri Mukirni', ' Klodran 1/6 Gemawang Gemawang', '3223204404720003', '3223204404720003', '08152209192', '1972-04-04', 1, '2019-09-07 08:57:57', 0, ''),
('K1070919028', 'Misyem', ' Dsn Kruwisam 1/4 Banaran Gemawang', '3323204904670001', '3323204904670001', '085729705458', '1967-04-09', 1, '2019-09-07 09:14:39', 0, ''),
('K1070919029', 'Pirni', ' Sucen 4/5 Sucen Gemawang', '3323206406890007', '3323206406890007', '085729705458', '1989-06-24', 1, '2019-09-07 09:16:45', 0, ''),
('K1070919030', 'Ghufron Machmud', 'Dsn Mrian Kulon 1/3 Kundisari', '332307110770012', '332307110770012', '081214480398', '1994-12-10', 1, '2019-09-07 09:29:21', 0, ''),
('K1070919031', 'Lilik Kristiani', ' Dsn Muncar Lor 8/2 Muncar Gemawang', '3323206710990001', '3323206710990001', '082322127960', '1999-10-17', 1, '2019-09-07 10:08:55', 0, ''),
('K1070919032', 'Khomsatun Khasanah', ' Dsn Kaliduren 2/7 Ngadisepi Gemawang', '3323205509860005', '3323205509860005', '081214480398', '1996-09-15', 1, '2019-09-07 10:27:54', 0, ''),
('K1070919033', 'Siti Khotimah', ' Dsn Plekoran 4/4 Kalibanger Gemawang', '3323206103880002', '3323206103880002', '082322127960', '1988-03-21', 1, '2019-09-07 11:03:53', 0, ''),
('K1070919034', 'Taslimah', ' Muncar Lor 8/2 Gemawang', '3323204904840002', '3323204904840002', '', '1982-04-09', 1, '2019-09-07 15:22:42', 0, ''),
('K1080919035', 'Watini', ' Klodran 6/6 Gemawang', '3323206905670001', '3323206905670001', '08152209192', '1967-05-29', 1, '2019-09-08 06:36:26', 0, ''),
('K1080919036', 'Sulastri', ' Dsn Biron 3/3 Banaran Gemawang', '3323202112950634', '3323202112950634', '085729705458', '1979-10-15', 1, '2019-09-08 06:39:55', 0, ''),
('K1080919037', 'Rohmi', ' Brujulan 1/2 Krempong Gemawang', '3323205507760006', '3323205507760006', '085729705458', '1970-03-15', 1, '2019-09-08 06:49:53', 0, ''),
('K1080919038', 'Sumarni', ' Dsn Gabug 4/6 Kemiriombo', '3323205204730001', '3323205204730001', '081214480497', '1973-04-12', 1, '2019-09-08 06:55:38', 0, ''),
('K1080919039', 'Deni Elma Fiani', ' Tlogowunggu 2/5 Muncar Gemawang', '3323204107990011', '3323204107990011', '082322127960', '1996-12-26', 1, '2019-09-08 06:59:32', 0, ''),
('K1080919040', 'Sasmiyati', ' Muncar Krajan 1/1 Gemawang', '3323206504930001', '3323206504930001', '082322127960', '1993-04-25', 1, '2019-09-08 07:06:25', 0, ''),
('K1080919041', 'Sugiyem', ' Dsn Tlogowunggu 2/5 Gemawang', '323204505790002', '323204505790002', '082214480398', '1979-05-05', 1, '2019-09-08 07:10:00', 0, ''),
('K1080919042', 'Rusiyanti', ' Dsn Kedungombo 1/4 Jambon Gemawang', '3323204901720001', '3323204901720001', '081327497763', '1972-09-01', 1, '2019-09-08 07:16:44', 0, ''),
('K1080919043', 'Toifah ', 'Dsn Sepi 3/4 Ngadisepi Gemawang', '3323204606780002', '3323204606780002', '081327497763', '1978-06-06', 1, '2019-09-08 07:20:52', 0, ''),
('K1100919044', 'Yumaedah', ' Dsn Klodran 4/6 Gemawang Gemawang', '332305607860001', '332305607860001', '08152209192', '1986-07-16', 1, '2019-09-10 07:08:39', 0, ''),
('K1100919045', 'Yeni Suci Rahmayani', ' Krempong 2/1 Krempong gemawang', '3323204506930002', '3323204506930002', '085729705458', '1993-06-05', 1, '2019-09-10 07:12:42', 0, ''),
('K1100919046', 'Muwarti', ' Brujulan 1/2 Krempong Gemawang', '3323204804780001', '3323204804780001', '082329443402', '1978-04-08', 1, '2019-09-10 07:51:01', 0, ''),
('K1100919047', 'Samini', ' Dsn Sepi 3/4 Ngadisepi Gemawang', '3323205706440001', '3323205706440001', '081327497763', '1944-06-17', 1, '2019-09-10 08:01:50', 0, ''),
('K1100919048', 'Sarah', ' Dsn Blawong Kulon 3/7 Gemawang', '3323204309710001', '3323204309710001', '081214480398', '1971-09-03', 1, '2019-09-10 08:06:24', 0, ''),
('K1100919049', 'Paidi', ' Dsn Blawong Kulon 3/7 Muncar Gemawang', '3323201307620001', '3323201307620001', '081214480398', '1962-07-13', 1, '2019-09-10 08:08:44', 0, ''),
('K1100919050', 'Uswatun Hasanah ', ' Dsn Muncar Lor 8/2 Gemawang', '33233125510930002', '33233125510930002', '082322127960', '1993-10-15', 1, '2019-09-10 08:13:17', 0, ''),
('K1100919051', 'Artoyo', ' Dsn Blawong Kulon 3/7 Muncar Gemawang', '3323201109900001', '3323201109900001', '082322127960', '1990-09-11', 1, '2019-09-10 08:15:16', 0, ''),
('K1100919052', 'Nining', ' Dsn Blawong 1/8 Gemawang', '3323201010820006', '3323201010820006', '082322127960', '1982-10-10', 1, '2019-09-10 08:17:02', 0, ''),
('K1100919053', 'Supriyanti', ' Dsn Muncar Krajan 3/1 Muncar Gemawang', '3323075808870001', '3323075808870001', '082322127960', '1987-08-18', 1, '2019-09-10 08:19:00', 0, ''),
('K1110919054', 'Nur khasanah', ' Sucen 5/5 Sucen Gemawang', '3323203010070004', '3323203010070004', '085729705458', '1990-11-15', 1, '2019-09-11 12:57:42', 0, ''),
('K1110919055', 'Fika Astutik', ' Ds Kedungombo 7/4 Jambon Gemawang', '3323075509960007', '3323075509960007', '081327497763', '1996-09-15', 1, '2019-09-11 13:05:44', 0, ''),
('K1110919056', 'Titik Astuti', ' Kayutahun 4/2 Banaran Gemawang', '001114570238', '001114570238', '082329443402', '2000-11-10', 1, '2019-09-11 13:21:52', 0, ''),
('K1110919057', 'Sukaryati', ' Brujulan 1/2 Krempong Gemawang', '3323202502071573', '3323202502071573', '082329443402', '1984-01-04', 1, '2019-09-11 13:33:57', 0, ''),
('K1110919058', 'Ngesti Anjarwani', ' Dsn Margosari 2/7 Gemawang Gemawang', '3323207101960001', '3323207101960001', '082322127960', '1996-01-30', 1, '2019-09-11 06:31:31', 0, ''),
('K1110919059', 'Juwarti', ' Dsn Seseh 2/10 Ngadisepi Gemawang', '3323204206790004', '3323204206790004', '081214480398', '1979-06-02', 1, '2019-09-11 06:37:08', 0, ''),
('K1110919060', 'Rubiyah', ' Dsn Seseh 3/10 Ngadisepi Gemawang', '332320670970003', '332320670970003', '081214480398', '1974-09-24', 1, '2019-09-11 06:48:02', 0, ''),
('K1110919061', 'Ardi', ' Dsn Seseh 3/10 Ngadisepi Gemawang', '3323200111810001', '3323200111810001', '081214480398', '1981-11-01', 1, '2019-09-11 06:53:22', 0, ''),
('K1110919062', 'Fuad Aqna', ' Dsn Penangkan 4/5 Gemawang', '33232021122052245', '33232021122052245', '08152209192', '1999-01-29', 1, '2019-09-11 07:16:09', 0, ''),
('K1110919063', 'Mariyam', ' Gemawang 2/3 Gemawang', '33232046100570001', '33232046100570001', '081327497763', '1957-10-06', 1, '2019-09-11 08:34:16', 0, ''),
('K1130919064', 'Sukradi', ' Dsn Kalinongko 4/4 Gemawang Gemawang', '332302004820002', '332302004820002', '08152209192', '1982-04-20', 1, '2019-09-13 09:14:39', 0, ''),
('K1130919065', 'Miyati', ' Biron 3/3 Banaran Gemawang', '3323205109940001', '3323205109940001', '085729705458', '1994-09-11', 1, '2019-09-13 09:30:58', 0, ''),
('K1130919066', 'Parno', ' Ngabuh 2/2 Karangseneng Gemawang', '3323', '3323', '085729705458', '1880-11-11', 1, '2019-09-13 09:45:23', 0, ''),
('K1130919067', 'Susana Tri Wahyuni', ' Dsn Muncar Kulon 3/4 Gemawang', '332305105660005', '332305105660005', '082322127960', '1966-05-11', 1, '2019-09-13 10:18:23', 0, ''),
('K1130919068', 'Hana Arwiyah', ' Ds Muncar Kulon 2/4 gemawang', '3323070038110001', '3323070038110001', '082322127690', '1981-03-12', 1, '2019-09-13 10:21:54', 0, ''),
('K1130919069', 'Sutri Handayani', ' Dsn Kaliduren 5/7 Ngadisepi Gemawang', '33230430393007', '33230430393007', '081214480398', '1993-03-03', 1, '2019-09-13 10:33:32', 0, ''),
('K1130919070', 'Istiyanto', ' Dsn Kaliduren 6/7 Ngadisepi Gemawang', '3323', '3323', '081214480398', '1980-01-01', 1, '2019-09-13 10:41:25', 0, ''),
('K1130919071', 'Yulia Aris Asmaah', ' Dsn Kalipaing 1/3 Ngadisepi Gemawang', '332304107900003', '332304107900003', '081327497763', '1990-07-01', 1, '2019-09-13 10:54:50', 0, ''),
('K1130919072', 'Poniyah', ' Dsn Pelahan 1/1 Ngadisepi Gemawang', '332304705780002', '332304705780002', '081327497763', '1978-05-07', 1, '2019-09-13 10:56:23', 0, ''),
('K1140919073', 'Saefudin', ' Dsn Gemawang 4/3 Gemawang', '3323200506740001', '3323200506740001', '08152209192', '1974-06-05', 1, '2019-09-14 10:17:15', 0, ''),
('K1140919074', 'Sakroni', ' Dsn Klodran2/6 Gemawang', '332322207780001', '332322207780001', '08152209192', '1978-07-22', 1, '2019-09-14 10:20:58', 0, ''),
('K1140919075', 'Juwarni', ' Dsn Kayutahun 2/2 Banaran Gemawang', '332304505870002', '332304505870002', '085729705458', '1987-05-05', 1, '2019-09-14 10:32:37', 0, ''),
('K1140919076', 'Hosea Juwantoro', ' Krempong 5/1 Krempong Gemawang', '332397000453', '332397000453', '085729705458', '1980-01-01', 1, '2019-09-14 10:37:08', 0, ''),
('K1140919077', 'Nurul Zulaikha', ' Dsn Ngabuh 4/2 Karangseneng Gemawang', '322067111990003', '322067111990003', '082329443402', '1999-01-10', 1, '2019-09-14 10:43:22', 0, ''),
('K1140919078', 'Sunarni', ' Tlogowunggu 2/5 Muncar Gemawang', '33232067890001', '33232067890001', '082322127960', '1981-01-01', 1, '2019-09-14 10:48:59', 0, ''),
('K1140919079', 'Yusuf', ' Dsn Babadan 4/7 Kemiriombo Gemawang', '3323206768001', '3323206768001', '081214480398', '1999-01-01', 1, '2019-09-14 10:56:44', 0, ''),
('K1140919080', 'Umi Sriyanti', ' Kaliduren 3/7 Ngadisepi GEMAWANG', '3323201410090001', '3323201410090001', '081214480398', '1992-05-06', 1, '2019-09-14 11:05:27', 0, ''),
('K1140919081', 'Ismidah', ' Dsn Sepi 1/4 Ngadisepi Gemawang', '3323204501970001', '3323204501970001', '081327497763', '1999-01-01', 1, '2019-09-14 11:14:30', 0, ''),
('K1160919082', 'Khoiriyah', ' Penangkan 4/5 Gemawang', '33232022310001', '33232022310001', '0852209192', '1980-01-01', 1, '2019-09-16 09:43:39', 0, ''),
('K1160919083', ' Sarini', ' Dsn Krempong 3/1 Krempong Gemawang', '33232022010001', '33232022010001', '085729705458', '1980-01-01', 1, '2019-09-16 09:53:21', 0, ''),
('K1160919084', 'Pramesti Riana Dewi', ' Sodong 3/8 Gesing Kandangan', '3323066006970001', '3323066006970001', '082329443402', '1997-08-20', 1, '2019-09-16 10:09:24', 0, ''),
('K1160919085', 'Sarini', ' Ling bebengan 4/5 Kertosari Temanggung', '33232052077500004', '33232052077500004', '082329443402', '1975-07-12', 1, '2019-09-16 10:14:13', 0, ''),
('K1160919086', 'Beta Regita Anggraeni', ' Dsn Mandang 3/3 Sucen Gemawang', '3323204802000002', '3323204802000002', '082329443402', '2000-09-08', 1, '2019-09-16 10:16:09', 0, ''),
('K1160919087', 'Paryudiyanto', ' Dsn Seseh 3/10 Ngadisepi Gemawang', '332300110770002', '332300110770002', '081214480398', '1977-10-01', 1, '2019-09-16 08:38:06', 0, ''),
('K1160919088', 'Santoso', ' Dsn Kalinongko  1/4 gemawang', '810914570646', '810914570646', '02322127960', '1981-09-03', 1, '2019-09-16 09:02:45', 0, ''),
('K1160919089', 'Alif Juliadi', ' Dusun Kayutahun 3/2 Gemawang', '3323201706870004', '3323201706870004', '081214480398', '1987-06-17', 1, '2019-09-16 09:09:21', 0, ''),
('K1160919090', 'Yasin', ' Dsn Pelahan 3/1 Ngadisepi Gemawang', '3323200101840008', '3323200101840008', '081327497763', '1984-01-01', 1, '2019-09-16 09:45:01', 0, ''),
('K1160919091', 'Sriyati', 'Dsn Pelahan 1/1 Ngadisepi Gemawang ', '33232000567001', '33232000567001', '081327497763', '1975-01-01', 1, '2019-09-16 09:48:02', 0, ''),
('K1170919092', 'Sarifatun', ' Klodran 1/6 Gemawang', '3323202502071044', '3323202502071044', '08152209192', '1983-04-16', 1, '2019-09-17 12:11:42', 0, ''),
('K1170919093', 'Siti Sofiyah', ' Dsn Penangkan 3/5 Gemawang', '33232055906130001', '33232055906130001', '08152209192', '1975-12-01', 1, '2019-09-17 12:13:24', 0, ''),
('K1170919094', 'Sri Pujiati', ' Dsn Sucen 2/4 Sucen gemawang', '3323205003030001', '3323205003030001', '085729705458', '1990-06-20', 1, '2019-09-17 12:23:40', 0, ''),
('K1170919095', 'Ngatimin', ' Dsn silegok 3/4 Karangseneng', '3323201608690001', '3323201608690001', '082392443402', '1969-08-16', 1, '2019-09-17 12:26:31', 0, ''),
('K1170919096', '  Muriyah', ' Dsn Tlogowunggu 1/5 Muncar Gemawang', '3323204107780026', '3323204107780026', '082322127960', '1981-06-05', 1, '2019-09-17 12:38:06', 0, ''),
('K1170919097', 'Daroyah', 'Muncar 1/6 Muncar GEMAWANG', '8206015306880002', '8206015306880002', '082322127960', '1983-06-13', 1, '2019-09-17 12:39:51', 0, ''),
('K1170919098', 'Siyah', ' Dsn Sumur 1/6 Ngadisepi Gemawang', '33232061088830002', '33232061088830002', '081214480398', '1983-08-21', 1, '2019-09-17 12:50:16', 0, ''),
('K1170919099', 'Sholihun', ' Dsn Kaliduren Ngadisepi Gemawang', '3323', '3323', '081214480398', '1980-01-01', 1, '2019-09-17 12:53:04', 0, ''),
('K1170919100', 'Ira Susanti', ' Dsn Klepihan 5/5 Kalibanger Gemawang', '3323', '3323', '081327497763', '1980-09-09', 1, '2019-09-17 12:58:32', 2, ''),
('K1180919100', 'Ira Susanti', ' dsn klepian 5/5 kalibanger gemawang', '3323', '3323', '081327497763', '1970-10-09', 1, '2019-09-18 08:28:56', 0, ''),
('K1190919100', 'Nuryanti', ' Dsn Sepi 3/4 Ngadisepi Gemawang', '3323', '3323', '081327497763', '1980-11-11', 1, '2019-09-19 08:38:52', 0, '');

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
(4, 1.8, 'setiap bulan', '2019-08-24 14:37:29', 0, '0000-00-00');

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

--
-- Dumping data for table `historibungasimpanan`
--

INSERT INTO `historibungasimpanan` (`hbs_id`, `ang_no`, `hbs_tglterakhir`, `hbs_tgl`, `hbs_flag`, `hbs_info`) VALUES
(6, 'manager', '2019-08-28 00:00:00', '2019-08-28 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `investasiberjangka`
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
(14, 'Pimpinan Cabang', '2019-08-31 12:49:11', 0, ''),
(15, 'administrasi', '2019-08-31 13:34:23', 0, '');

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
(4, 12, '12 bulan', '2019-05-21 01:12:30', 0, '');

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
(5, 'Klaim Tahun Ke-3 Plan A', '1', 3, 1200000, 'Bisa diklaim oleh anggota untuk rawat inap pada bulan ke-25', 5, '2019-07-29 09:57:28', 0, '');

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
(1, 'Kantor Gemawang', 'Temanggung', 'K1', 0, '2019-09-01 19:40:29', '');

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
('2708004', 'Adilla', '3323223322122345', 2, 'Kedu', '085876329811', NULL, 0, '2019-08-27 07:26:24', 2, ''),
('2708005', 'Erlin', '33232123232456', 3, 'Parakan', '089768765543', NULL, 0, '2019-08-27 07:38:45', 2, ''),
('2708006', 'Silvia', '33234567867544', 11, 'Bulu', '089768765345', NULL, 0, '2019-08-27 07:47:19', 2, ''),
('3108007', 'GHUFRON MAHMUD', '3323073009910001', 4, 'MRIAN KULON 1/3 KUNDISARI KEDU TEMANGGUNG', '081214480398', NULL, 0, '2019-08-31 12:48:32', 0, ''),
('3108008', 'Rita Ningsih', '332310661290005', 4, 'barang kulon 2/2 barang jumo temanggung', '085729705458', NULL, 0, '2019-08-31 12:53:21', 0, ''),
('3108009', 'Karunia Dara Tungga', '3323016002990001', 4, 'pakurejo 2/1 pakurejo bulu temanggung', '085290468646', NULL, 0, '2019-08-31 12:57:41', 0, ''),
('3108010', 'Fatkhul Aziz', '3323200706970001', 4, 'seseh 1/9 ngadisepi Gemawang', '082329443402', NULL, 0, '2019-08-31 13:03:14', 0, ''),
('3108011', 'Tri Andriani', '3323049007940002', 4, 'Karangmanggis 3/3 karangseneng gemawang', '085601896665', NULL, 0, '2019-08-31 13:08:07', 0, ''),
('3108012', 'ardhyka Wulan Saputri', '3323', 4, 'Gabungan 01/09 Tegalsari Kedu temanggung', '081327497763', NULL, 0, '2019-08-31 13:13:22', 0, ''),
('3108013', 'Tutik Anjarwani', '3323205912950001', 14, 'karangmangis 1/3 Karangseneng Gemawang', '085869139362', NULL, 0, '2019-08-31 13:32:08', 0, ''),
('3108014', 'Bekti Yuni maharani', '3323204906950001', 15, 'babadan 4/7 Kemiriombo Gemawang', '081228502770', NULL, 0, '2019-08-31 13:37:42', 0, ''),
('3108015', 'Nasrullah Efendi', '350217073830003', 11, 'jl kalimantan 60 ponorogo 2/1 mangkujayan ponorogo ', '08562890739', NULL, 0, '2019-08-31 13:42:16', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawanijasah`
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
-- Dumping data for table `karyawanijasah`
--

INSERT INTO `karyawanijasah` (`kij_id`, `kar_kode`, `kij_sd`, `kij_smp`, `kij_sma`, `kij_d3`, `kij_s1`, `kij_s2`, `kij_s3`, `kij_lainlain`, `kij_status`, `kij_tgl`, `kij_flag`, `kij_info`) VALUES
(3, 2708005, '-', '', 'SMK DN-03 MK 0012345', '', '', '', '', NULL, 0, '2019-08-27 07:38:45', 0, ''),
(4, 2708006, '-', '', '', '', 'S1/123/23/M', '', '', NULL, 0, '2019-08-27 07:47:19', 0, ''),
(5, 3108007, '-', '-', 'DN-103MK0090564', '-', '-', '-', '-', NULL, 0, '2019-08-31 12:48:32', 0, ''),
(6, 3108008, '-', '-', 'paket c DN-03 PC 0006125', '-', '-', '-', '-', NULL, 0, '2019-08-31 12:53:21', 0, ''),
(7, 3108009, '-', 'dn-03 di 0145243', '-', '-', '-', '-', '-', NULL, 0, '2019-08-31 12:57:41', 0, ''),
(8, 3108010, '-', '-', 'DN-03 mK/06 00031398', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:03:14', 0, ''),
(9, 3108011, '-', '-', 'dn 03 ma 0025336', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:08:07', 0, ''),
(10, 3108012, '-', '-', '-', '', 'manajemen 17 2471 02 2261', '-', '-', NULL, 0, '2019-08-31 13:13:22', 0, ''),
(11, 3108013, 'dn 03 dd 1350381', 'MTS 110090565', 'dn 03 mk 0187022', '-', '-', '-', '-', NULL, 0, '2019-08-31 13:32:08', 0, ''),
(12, 3108014, '-', '-', '-', '-', 'keguruan 003983/s/fkip/pg', '-', '-', NULL, 0, '2019-08-31 13:37:42', 0, ''),
(13, 3108015, '-', '-', '-', '-', '590/unmer-po/fh/5-1 /2007', '-', '-', NULL, 0, '2019-08-31 13:42:16', 0, '');

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
(2, '240819001', 2000000, 0, '2019-08-24 13:50:33', 0, ''),
(3, '240819002', 2000000, 0, '2019-08-24 13:50:41', 0, ''),
(4, '240819003', 2000000, 0, '2019-08-24 13:53:49', 0, ''),
(5, '2708004', 2000000, 0, '2019-08-27 07:26:24', 0, ''),
(6, '2708005', 2000000, 0, '2019-08-27 07:38:45', 0, ''),
(7, '2708006', 2000000, 0, '2019-08-27 07:47:19', 0, ''),
(8, '3108007', 2000000, 0, '2019-08-31 12:48:32', 0, ''),
(9, '3108008', 5000000, 0, '2019-08-31 12:53:21', 0, ''),
(10, '3108009', 2000000, 0, '2019-08-31 12:57:41', 0, ''),
(11, '3108010', 2000000, 0, '2019-08-31 13:03:14', 0, ''),
(12, '3108011', 2000000, 0, '2019-08-31 13:08:07', 0, ''),
(13, '3108012', 2000000, 0, '2019-08-31 13:13:22', 0, ''),
(14, '3108013', 2000000, 0, '2019-08-31 13:32:08', 0, ''),
(15, '3108014', 2000000, 0, '2019-08-31 13:37:42', 0, ''),
(16, '3108015', 2000000, 0, '2019-08-31 13:42:16', 0, '');

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
(4, '3108007', 'WAHYUDI', 'AYAH', ' MRIAN KULON 1/3 KUNDISARI KEDU TEMANGGUNG', '085228503071', '2019-08-31 12:48:32', 0, ''),
(5, '3108008', 'SLAMET WIDODO', 'KAKAK', 'GIYONO', '085292038757', '2019-08-31 12:53:21', 0, ''),
(6, '3108009', 'Niti Wintoro', 'Ayah ', ' pakurejo 2/1 pakurejo bulu temanggung', '08152209192', '2019-08-31 12:57:41', 0, ''),
(7, '3108010', 'MUSTAVIN DEVAH MATIS', 'Adik', ' seseh 1/9 ngadisepi gemawang', '085742296381', '2019-08-31 13:03:14', 0, ''),
(8, '3108011', 'fatriyadi', 'suami', ' Karangmanggis 3/3 karangseneng gemawang', '082220116716', '2019-08-31 13:08:07', 0, ''),
(9, '3108012', 'ibu', 'ibu', ' Gabungan 01/09 Tegalsari Kedu temanggung', '081327497763', '2019-08-31 13:13:22', 0, ''),
(10, '3108013', 'tugiyati', 'ibu', ' karangmangis 1/3 Karangseneng Gemawang', '085869139362', '2019-08-31 13:32:08', 0, ''),
(11, '3108014', 'andhi aziz andung dewanto', 'kakak', ' gelangan tlogomulyo temanggung', '081229066655', '2019-08-31 13:37:42', 0, ''),
(12, '3108015', 'luluk budiana', 'sepupu', 'wonosroyo 8/1 bojonergoro kedu temanggung', '08528907390', '2019-08-31 13:42:16', 0, '');

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
(44, 'K1B020919004', '2019-09-02 11:36:18', 20000, '2019-09-02 11:36:18', 0, ''),
(45, 'K1B020919005', '2019-09-02 11:39:45', 5000, '2019-09-02 11:39:45', 0, ''),
(46, 'K1B020919006', '2019-09-02 11:46:24', 10000, '2019-09-02 11:46:24', 0, ''),
(47, 'K1A020919007', '2019-09-02 11:55:29', 70000, '2019-09-02 11:55:29', 0, ''),
(48, 'K1B020919008', '2019-09-02 14:38:49', 100000, '2019-09-02 14:38:49', 0, ''),
(49, 'K1B030919001', '2019-09-03 15:53:42', 200000, '2019-09-03 15:53:42', 0, ''),
(50, 'K1B030919002', '2019-09-03 15:59:00', 20000, '2019-09-03 15:59:00', 0, ''),
(51, 'K1B030919002', '2019-09-03 16:04:01', 30000, '2019-09-03 16:04:01', 0, ''),
(52, 'K1B030919004', '2019-09-03 16:08:47', 10000, '2019-09-03 16:08:47', 0, ''),
(53, 'K1B030919005', '2019-09-03 16:14:15', 60000, '2019-09-03 16:14:15', 0, ''),
(54, 'K1B020919006', '2019-09-03 16:18:30', 20000, '2019-09-03 16:18:30', 0, ''),
(55, 'K1B030919006', '2019-09-03 16:18:56', 60000, '2019-09-03 16:18:56', 0, ''),
(56, 'K1B030919007', '2019-09-03 16:22:54', 20000, '2019-09-03 16:22:54', 0, ''),
(57, 'K1B040919001', '2019-09-04 10:14:02', 90000, '2019-09-04 10:14:02', 0, ''),
(58, 'K1B040919002', '2019-09-04 10:21:21', 20000, '2019-09-04 10:21:21', 0, ''),
(59, 'K1B040919003', '2019-09-04 10:31:52', 40000, '2019-09-04 10:31:52', 0, ''),
(60, 'K1B020919005', '2019-09-04 10:32:52', 10000, '2019-09-04 10:32:52', 0, ''),
(61, 'K1B040919004', '2019-09-04 10:42:40', 50000, '2019-09-04 10:42:40', 0, ''),
(62, 'K1B040919005', '2019-09-04 10:46:49', 50000, '2019-09-04 10:46:49', 0, ''),
(63, 'K1B020919006', '2019-09-04 10:59:16', 20000, '2019-09-04 10:59:16', 0, ''),
(64, 'K1B040919008', '2019-09-04 11:11:46', 80000, '2019-09-04 11:11:46', 0, ''),
(65, 'K1B040919007', '2019-09-04 11:13:37', 10000, '2019-09-04 11:13:37', 0, ''),
(66, 'K1B040919006', '2019-09-04 11:14:37', 20000, '2019-09-04 11:14:37', 0, ''),
(67, 'K1B050919001', '2019-09-05 12:33:07', 60000, '2019-09-05 12:33:07', 0, ''),
(68, 'K1B030919002', '2019-09-05 12:33:53', 20000, '2019-09-05 12:33:53', 0, ''),
(69, 'K1B030919005', '2019-09-05 12:36:32', 5000, '2019-09-05 12:36:32', 0, ''),
(70, 'K1B050919004', '2019-09-05 12:45:00', 60000, '2019-09-05 12:45:00', 0, ''),
(71, 'K1B050919002', '2019-09-05 12:45:39', 500000, '2019-09-05 12:45:39', 0, ''),
(72, 'K1B050919005', '2019-09-05 13:09:12', 50000, '2019-09-05 13:09:12', 0, ''),
(73, 'K1B030919007', '2019-09-05 13:10:50', 20000, '2019-09-05 13:10:50', 0, ''),
(74, 'K1B040919007', '2019-09-05 13:11:23', 10000, '2019-09-05 13:11:23', 0, ''),
(75, 'K1B020919006', '2019-09-05 13:11:51', 20000, '2019-09-05 13:11:51', 0, ''),
(76, 'K1B050919006', '2019-09-05 13:18:53', 10000, '2019-09-05 13:18:53', 0, ''),
(77, 'K1B050919007', '2019-09-05 13:31:30', 10000, '2019-09-05 13:31:30', 0, ''),
(78, 'K1B050919008', '2019-09-05 13:36:05', 50000, '2019-09-05 13:36:05', 0, ''),
(79, 'K1B050919009', '2019-09-05 13:40:02', 50000, '2019-09-05 13:40:02', 0, ''),
(80, 'K1B020919004', '2019-09-06 11:19:39', 30000, '2019-09-06 11:19:39', 0, ''),
(81, 'K1B030919001', '2019-09-06 11:20:14', 50000, '2019-09-06 11:20:14', 0, ''),
(82, 'K1B020919005', '2019-09-06 11:32:53', 10000, '2019-09-06 11:32:53', 0, ''),
(83, 'K1B050919002', '2019-09-06 11:33:56', 50000, '2019-09-06 11:33:56', 0, ''),
(84, 'K1B020919006', '2019-09-06 11:35:18', 20000, '2019-09-06 11:35:18', 0, ''),
(85, 'K1B030919007', '2019-09-06 11:36:52', 10000, '2019-09-06 11:36:52', 0, ''),
(86, 'K1B040919008', '2019-09-06 11:38:14', 10000, '2019-09-06 11:38:14', 0, ''),
(87, 'K1B050919006', '2019-09-06 11:41:39', 10000, '2019-09-06 11:41:39', 0, ''),
(88, 'K1B050919009', '2019-09-06 11:44:25', 10000, '2019-09-06 11:44:25', 0, ''),
(89, 'K1B050919007', '2019-09-06 11:44:51', 10000, '2019-09-06 11:44:51', 0, ''),
(90, 'K1B050919008', '2019-09-06 11:45:22', 100000, '2019-09-06 11:45:22', 0, ''),
(91, 'K1B070919001', '2019-09-07 08:59:46', 230000, '2019-09-07 08:59:46', 0, ''),
(92, 'K1B040919001', '2019-09-07 09:00:08', 30000, '2019-09-07 09:00:08', 0, ''),
(93, 'K1B050919004', '2019-09-07 09:00:41', 20000, '2019-09-07 09:00:41', 0, ''),
(94, 'K1B030919001', '2019-09-07 09:01:08', 50000, '2019-09-07 09:01:08', 0, ''),
(95, 'K1B030919002', '2019-09-07 09:02:39', 20000, '2019-09-07 09:02:39', 0, ''),
(96, 'K1B030919003', '2019-09-07 09:03:03', 20000, '2019-09-07 09:03:03', 0, ''),
(97, 'K1B040919003', '2019-09-07 09:03:38', 10000, '2019-09-07 09:03:38', 0, ''),
(98, 'K1B070919003', '2019-09-07 09:20:15', 10000, '2019-09-07 09:20:15', 0, ''),
(99, 'K1B070919002', '2019-09-07 09:21:40', 20000, '2019-09-07 09:21:40', 0, ''),
(100, 'K1B020919008', '2019-09-07 09:24:46', 25000, '2019-09-07 09:24:46', 0, ''),
(101, 'K1B040919004', '2019-09-07 09:25:05', 50000, '2019-09-07 09:25:05', 0, ''),
(102, 'K1B070919004', '2019-09-07 09:33:59', 200000, '2019-09-07 09:33:59', 0, ''),
(103, 'K1B050919005', '2019-09-07 09:36:27', 50000, '2019-09-07 09:36:27', 0, ''),
(104, 'K1B050919002', '2019-09-07 09:58:03', 50000, '2019-09-07 09:58:03', 0, ''),
(105, 'K1B030919005', '2019-09-07 09:58:26', 5000, '2019-09-07 09:58:26', 0, ''),
(106, 'K1B040919006', '2019-09-07 09:59:34', 10000, '2019-09-07 09:59:34', 0, ''),
(107, 'K1B070919005', '2019-09-07 10:21:39', 10000, '2019-09-07 10:21:39', 0, ''),
(108, 'K1B040919007', '2019-09-07 10:22:14', 20000, '2019-09-07 10:22:14', 0, ''),
(109, 'K1B030919007', '2019-09-07 10:22:38', 10000, '2019-09-07 10:22:38', 0, ''),
(110, 'K1B030919006', '2019-09-07 10:23:32', 10000, '2019-09-07 10:23:32', 0, ''),
(111, 'K1B040919008', '2019-09-07 10:24:53', 50000, '2019-09-07 10:24:53', 0, ''),
(112, 'K1B070919006', '2019-09-07 10:31:16', 40000, '2019-09-07 10:31:16', 0, ''),
(113, 'K1B050919009', '2019-09-07 10:31:41', 10000, '2019-09-07 10:31:41', 0, ''),
(114, 'K1B070919007', '2019-09-07 11:05:26', 15000, '2019-09-07 11:05:26', 0, ''),
(115, 'K1B070919008', '2019-09-07 15:24:03', 30000, '2019-09-07 15:24:03', 0, ''),
(116, 'K1B020919004', '2019-09-08 12:03:58', 100000, '2019-09-08 12:03:58', 0, ''),
(117, 'K1B040919001', '2019-09-08 12:04:26', 10000, '2019-09-08 12:04:26', 0, ''),
(118, 'K1B080919001', '2019-09-08 12:04:43', 150000, '2019-09-08 12:04:43', 0, ''),
(119, 'K1B030919002', '2019-09-08 12:07:11', 20000, '2019-09-08 12:07:11', 0, ''),
(120, 'K1B080919002', '2019-09-08 12:07:32', 20000, '2019-09-08 12:07:32', 0, ''),
(121, 'K1B080919003', '2019-09-08 12:08:05', 50000, '2019-09-08 12:08:05', 0, ''),
(122, 'K1B020919005', '2019-09-08 12:09:37', 10000, '2019-09-08 12:09:37', 0, ''),
(123, 'K1B030919007', '2019-09-08 12:13:38', 10000, '2019-09-08 12:13:38', 0, ''),
(124, 'K1B040919007', '2019-09-08 12:14:06', 15000, '2019-09-08 12:14:06', 0, ''),
(125, 'K1B030919006', '2019-09-08 12:14:32', 10000, '2019-09-08 12:14:32', 0, ''),
(126, 'K1B080919004', '2019-09-08 12:22:23', 20000, '2019-09-08 12:22:23', 0, ''),
(127, 'K1B080919009', '2019-09-08 12:24:30', 40000, '2019-09-08 12:24:30', 0, ''),
(128, 'K1B080919008', '2019-09-08 12:25:01', 50000, '2019-09-08 12:25:01', 0, ''),
(129, 'K1B050919009', '2019-09-08 12:51:09', 10000, '2019-09-08 12:51:09', 0, ''),
(130, 'K1B050919008', '2019-09-08 12:51:58', 150000, '2019-09-08 12:51:58', 0, ''),
(131, 'K1B080919007', '2019-09-08 12:57:59', 10000, '2019-09-08 12:57:59', 0, ''),
(132, 'K1B080919005', '2019-09-08 12:59:57', 70000, '2019-09-08 12:59:57', 0, ''),
(133, 'K1B050919005', '2019-09-08 13:07:38', 50000, '2019-09-08 13:07:38', 0, ''),
(134, 'K1B030919005', '2019-09-08 13:08:14', 20000, '2019-09-08 13:08:14', 0, ''),
(135, 'K1B050919002', '2019-09-08 13:23:15', 50000, '2019-09-08 13:23:15', 0, ''),
(136, 'K1B080919006', '2019-09-08 13:24:08', 10000, '2019-09-08 13:24:08', 0, ''),
(137, 'K1B050919004', '2019-09-08 13:26:54', 25000, '2019-09-08 13:26:54', 0, ''),
(138, 'K1B070919001', '2019-09-10 12:55:45', 80000, '2019-09-10 12:55:45', 0, ''),
(139, 'K1B050919004', '2019-09-10 12:57:00', 25000, '2019-09-10 12:57:00', 0, ''),
(140, 'K1B020919004', '2019-09-10 12:57:48', 50000, '2019-09-10 12:57:48', 0, ''),
(141, 'K1B040919001', '2019-09-10 12:58:10', 10000, '2019-09-10 12:58:10', 0, ''),
(142, 'K1B080919001', '2019-09-10 12:58:59', 20000, '2019-09-10 12:58:59', 0, ''),
(143, 'K1B100919001', '2019-09-10 12:59:34', 50000, '2019-09-10 12:59:34', 0, ''),
(144, 'K1B030919003', '2019-09-10 13:00:48', 20000, '2019-09-10 13:00:48', 0, ''),
(145, 'K1B080919002', '2019-09-10 13:03:30', 20000, '2019-09-10 13:03:30', 0, ''),
(146, 'K1B040919003', '2019-09-10 13:03:57', 20000, '2019-09-10 13:03:57', 0, ''),
(147, 'K1B100919002', '2019-09-10 13:05:11', 20000, '2019-09-10 13:05:11', 0, ''),
(148, 'K1B100919003', '2019-09-10 13:05:39', 100000, '2019-09-10 13:05:39', 0, ''),
(149, 'K1B030919004', '2019-09-10 13:05:57', 10000, '2019-09-10 13:05:57', 0, ''),
(150, 'K1B020919005', '2019-09-10 13:06:26', 5000, '2019-09-10 13:06:26', 0, ''),
(151, 'K1B040919005', '2019-09-10 13:09:43', 20000, '2019-09-10 13:09:43', 0, ''),
(152, 'K1B100919011', '2019-09-10 13:10:56', 150000, '2019-09-10 13:10:56', 0, ''),
(153, 'K1B100919010', '2019-09-10 13:11:34', 150000, '2019-09-10 13:11:34', 0, ''),
(154, 'K1B100919008', '2019-09-10 13:12:19', 120000, '2019-09-10 13:12:19', 0, ''),
(155, 'K1B030919005', '2019-09-10 13:14:08', 10000, '2019-09-10 13:14:08', 0, ''),
(156, 'K1B070919008', '2019-09-10 13:14:39', 20000, '2019-09-10 13:14:39', 0, ''),
(157, 'K1B070919005', '2019-09-10 13:33:04', 25000, '2019-09-10 13:33:04', 0, ''),
(158, 'K1B100919009', '2019-09-10 13:38:45', 70000, '2019-09-10 13:38:45', 0, ''),
(159, 'K1B100919005', '2019-09-10 13:39:22', 40000, '2019-09-10 13:39:22', 0, ''),
(160, 'K1B050919002', '2019-09-10 13:40:00', 50000, '2019-09-10 13:40:00', 0, ''),
(161, 'K1B100919006', '2019-09-10 13:40:44', 40000, '2019-09-10 13:40:44', 0, ''),
(162, 'K1B080919004', '2019-09-10 13:41:17', 20000, '2019-09-10 13:41:17', 0, ''),
(163, 'K1B030919006', '2019-09-10 13:41:41', 10000, '2019-09-10 13:41:41', 0, ''),
(164, 'K1B040919007', '2019-09-10 13:42:03', 20000, '2019-09-10 13:42:03', 0, ''),
(165, 'K1B040919008', '2019-09-10 13:43:02', 10000, '2019-09-10 13:43:02', 0, ''),
(166, 'K1B030919007', '2019-09-10 13:43:22', 10000, '2019-09-10 13:43:22', 0, ''),
(167, 'K1B050919009', '2019-09-10 13:44:01', 10000, '2019-09-10 13:44:01', 0, ''),
(168, 'K1B050919008', '2019-09-10 13:44:25', 100000, '2019-09-10 13:44:25', 0, ''),
(169, 'K1B080919009', '2019-09-10 13:44:51', 50000, '2019-09-10 13:44:51', 0, ''),
(170, 'K1B100919004', '2019-09-10 13:46:08', 40000, '2019-09-10 13:46:08', 0, ''),
(171, 'K1B070919001', '2019-09-11 12:43:59', 30000, '2019-09-11 12:43:59', 0, ''),
(172, 'K1B050919004', '2019-09-11 12:44:25', 25000, '2019-09-11 12:44:25', 0, ''),
(173, 'K1B020919004', '2019-09-11 12:44:49', 30000, '2019-09-11 12:44:49', 0, ''),
(174, 'K1B040919001', '2019-09-11 12:45:15', 10000, '2019-09-11 12:45:15', 0, ''),
(175, 'K1B030919005', '2019-09-11 12:47:55', 10000, '2019-09-11 12:47:55', 0, ''),
(176, 'K1B050919002', '2019-09-11 12:48:16', 50000, '2019-09-11 12:48:16', 0, ''),
(177, 'K1B050919009', '2019-09-11 12:48:55', 10000, '2019-09-11 12:48:55', 0, ''),
(178, 'K1B050919007', '2019-09-11 12:49:19', 10000, '2019-09-11 12:49:19', 0, ''),
(179, 'K1B030919002', '2019-09-11 12:49:54', 20000, '2019-09-11 12:49:54', 0, ''),
(180, 'K1B070919003', '2019-09-11 12:51:10', 10000, '2019-09-11 12:51:10', 0, ''),
(181, 'K1B050919006', '2019-09-11 12:52:22', 5000, '2019-09-11 12:52:22', 0, ''),
(182, 'K1B030919007', '2019-09-11 12:52:42', 20000, '2019-09-11 12:52:42', 0, ''),
(183, 'K1B080919004', '2019-09-11 12:53:19', 20000, '2019-09-11 12:53:19', 0, ''),
(184, 'K1B040919007', '2019-09-11 12:53:46', 20000, '2019-09-11 12:53:46', 0, ''),
(185, 'K1B020919006', '2019-09-11 12:54:14', 20000, '2019-09-11 12:54:14', 0, ''),
(186, 'K1B110919001', '2019-09-11 12:59:39', 15000, '2019-09-11 12:59:39', 0, ''),
(187, 'K1B110919002', '2019-09-11 13:08:20', 30000, '2019-09-11 13:08:20', 0, ''),
(188, 'K1B080919003', '2019-09-11 13:09:12', 30000, '2019-09-11 13:09:12', 0, ''),
(189, 'K1B100919003', '2019-09-11 13:13:42', 10000, '2019-09-11 13:13:42', 0, ''),
(190, 'K1B110919003', '2019-09-11 13:27:48', 90000, '2019-09-11 13:27:48', 0, ''),
(191, 'K1B110919004', '2019-09-11 14:04:14', 50000, '2019-09-11 14:04:14', 0, ''),
(192, 'K1B110919005', '2019-09-11 06:33:33', 60000, '2019-09-11 06:33:33', 0, ''),
(193, 'K1B110919010', '2019-09-11 08:51:50', 40000, '2019-09-11 08:51:50', 0, ''),
(194, 'K1B110919009', '2019-09-11 08:52:16', 100000, '2019-09-11 08:52:16', 0, ''),
(195, 'K1B040919006', '2019-09-11 09:00:08', 20000, '2019-09-11 09:00:08', 0, ''),
(196, 'K1B110919006', '2019-09-11 09:05:40', 40000, '2019-09-11 09:05:40', 0, ''),
(197, 'K1B110919008', '2019-09-11 09:06:01', 10000, '2019-09-11 09:06:01', 0, ''),
(198, 'K1B110919007', '2019-09-11 09:06:29', 40000, '2019-09-11 09:06:29', 0, ''),
(199, 'K1B050919008', '2019-09-11 09:08:45', 30000, '2019-09-11 09:08:45', 0, ''),
(200, 'K1B050919004', '2019-09-12 09:15:23', 25000, '2019-09-12 09:15:23', 0, ''),
(201, 'K1B020919004', '2019-09-12 09:17:01', 30000, '2019-09-12 09:17:01', 0, ''),
(202, 'K1B100919001', '2019-09-12 09:17:40', 10000, '2019-09-12 09:17:40', 0, ''),
(203, 'K1B110919009', '2019-09-12 09:18:20', 25000, '2019-09-12 09:18:20', 0, ''),
(204, 'K1B040919003', '2019-09-12 09:22:33', 10000, '2019-09-12 09:22:33', 0, ''),
(205, 'K1B030919002', '2019-09-12 09:25:31', 20000, '2019-09-12 09:25:31', 0, ''),
(206, 'K1B080919003', '2019-09-12 09:28:34', 50000, '2019-09-12 09:28:34', 0, ''),
(207, 'K1B020919005', '2019-09-12 09:28:52', 10000, '2019-09-12 09:28:52', 0, ''),
(208, 'K1B040919004', '2019-09-12 09:29:20', 25000, '2019-09-12 09:29:20', 0, ''),
(209, 'K1B050919005', '2019-09-12 09:31:47', 50000, '2019-09-12 09:31:47', 0, ''),
(210, 'K1B080919005', '2019-09-12 09:32:07', 10000, '2019-09-12 09:32:07', 0, ''),
(211, 'K1B030919005', '2019-09-12 09:32:34', 10000, '2019-09-12 09:32:34', 0, ''),
(212, 'K1B050919002', '2019-09-12 09:32:53', 50000, '2019-09-12 09:32:53', 0, ''),
(213, 'K1B050919002', '2019-09-12 09:32:55', 50000, '2019-09-12 09:32:55', 0, ''),
(214, 'K1B110919005', '2019-09-12 09:33:23', 20000, '2019-09-12 09:33:23', 0, ''),
(215, 'K1B050919006', '2019-09-12 09:50:36', 10000, '2019-09-12 09:50:36', 0, ''),
(216, 'K1B110919006', '2019-09-12 10:00:03', 20000, '2019-09-12 10:00:03', 0, ''),
(217, 'K1B110919008', '2019-09-12 10:00:22', 10000, '2019-09-12 10:00:22', 0, ''),
(218, 'K1B030919007', '2019-09-12 10:00:41', 10000, '2019-09-12 10:00:41', 0, ''),
(219, 'K1B040919007', '2019-09-12 10:01:12', 25000, '2019-09-12 10:01:12', 0, ''),
(220, 'K1B020919006', '2019-09-12 10:01:29', 20000, '2019-09-12 10:01:29', 0, ''),
(221, 'K1B040919008', '2019-09-12 10:01:59', 10000, '2019-09-12 10:01:59', 0, ''),
(222, 'K1B050919009', '2019-09-12 10:03:10', 20000, '2019-09-12 10:03:10', 0, ''),
(223, 'K1B070919007', '2019-09-12 10:03:30', 20000, '2019-09-12 10:03:30', 0, ''),
(224, 'K1B050919007', '2019-09-12 10:04:03', 10000, '2019-09-12 10:04:03', 0, ''),
(225, 'K1B050919008', '2019-09-12 10:18:17', 10000, '2019-09-12 10:18:17', 0, ''),
(226, 'K1B050919008', '2019-09-12 10:18:59', 25000, '2019-09-12 10:18:59', 0, ''),
(227, 'K1B100919004', '2019-09-12 10:20:24', 10000, '2019-09-12 10:20:24', 0, ''),
(228, 'K1B080919009', '2019-09-12 10:21:17', 50000, '2019-09-12 10:21:17', 0, ''),
(229, 'K1B040919001', '2019-09-12 10:23:52', 10000, '2019-09-12 10:23:52', 0, ''),
(230, 'K1B070919001', '2019-09-13 08:08:05', 30000, '2019-09-13 08:08:05', 0, ''),
(231, 'K1B020919004', '2019-09-13 08:09:23', 50000, '2019-09-13 08:09:23', 0, ''),
(232, 'K1B100919001', '2019-09-13 08:09:41', 5000, '2019-09-13 08:09:41', 0, ''),
(233, 'K1B040919001', '2019-09-13 09:08:02', 10000, '2019-09-13 09:08:02', 0, ''),
(234, 'K1B110919009', '2019-09-13 09:09:19', 25000, '2019-09-13 09:09:19', 0, ''),
(235, 'K1B130919001', '2019-09-13 09:15:47', 50000, '2019-09-13 09:15:47', 0, ''),
(236, 'K1B070919002', '2019-09-13 09:22:27', 50000, '2019-09-13 09:22:27', 0, ''),
(237, 'K1B030919002', '2019-09-13 09:22:56', 20000, '2019-09-13 09:22:56', 0, ''),
(238, 'K1B100919002', '2019-09-13 09:34:29', 20000, '2019-09-13 09:34:29', 0, ''),
(239, 'K1B130919002', '2019-09-13 09:35:02', 100000, '2019-09-13 09:35:02', 0, ''),
(240, 'K1B080919003', '2019-09-13 09:40:25', 50000, '2019-09-13 09:40:25', 0, ''),
(241, 'K1B130919003', '2019-09-13 09:49:21', 40000, '2019-09-13 09:49:21', 0, ''),
(242, 'K1B070919005', '2019-09-13 09:56:01', 20000, '2019-09-13 09:56:01', 0, ''),
(243, 'K1B100919006', '2019-09-13 09:56:22', 50000, '2019-09-13 09:56:22', 0, ''),
(244, 'K1B100919008', '2019-09-13 09:56:47', 80000, '2019-09-13 09:56:47', 0, ''),
(245, 'K1B100919011', '2019-09-13 09:58:36', 50000, '2019-09-13 09:58:36', 0, ''),
(246, 'K1B100919010', '2019-09-13 09:59:42', 100000, '2019-09-13 09:59:42', 0, ''),
(247, 'K1B040919005', '2019-09-13 10:11:48', 20000, '2019-09-13 10:11:48', 0, ''),
(248, 'K1B070919008', '2019-09-13 10:12:15', 10000, '2019-09-13 10:12:15', 0, ''),
(249, 'K1B030919005', '2019-09-13 10:12:53', 5000, '2019-09-13 10:12:53', 0, ''),
(250, 'K1B100919005', '2019-09-13 10:13:23', 5000, '2019-09-13 10:13:23', 0, ''),
(251, 'K1B130919004', '2019-09-13 10:19:49', 20000, '2019-09-13 10:19:49', 0, ''),
(252, 'K1B130919005', '2019-09-13 10:24:01', 200000, '2019-09-13 10:24:01', 0, ''),
(253, 'K1B110919008', '2019-09-13 10:27:03', 10000, '2019-09-13 10:27:03', 0, ''),
(254, 'K1B030919007', '2019-09-13 10:27:20', 5000, '2019-09-13 10:27:20', 0, ''),
(255, 'K1B080919004', '2019-09-13 10:28:06', 20000, '2019-09-13 10:28:06', 0, ''),
(256, 'K1B040919007', '2019-09-13 10:28:30', 20000, '2019-09-13 10:28:30', 0, ''),
(257, 'K1B040919008', '2019-09-13 10:28:48', 10000, '2019-09-13 10:28:48', 0, ''),
(258, 'K1B020919006', '2019-09-13 10:29:08', 20000, '2019-09-13 10:29:08', 0, ''),
(259, 'K1B130919006', '2019-09-13 10:42:29', 20000, '2019-09-13 10:42:29', 0, ''),
(260, 'K1B130919007', '2019-09-13 10:43:15', 30000, '2019-09-13 10:43:15', 0, ''),
(261, 'K1B080919008', '2019-09-13 10:43:46', 50000, '2019-09-13 10:43:46', 0, ''),
(262, 'K1B050919007', '2019-09-13 10:44:09', 10000, '2019-09-13 10:44:09', 0, ''),
(263, 'K1B080919009', '2019-09-13 10:44:37', 50000, '2019-09-13 10:44:37', 0, ''),
(264, 'K1B130919009', '2019-09-13 10:59:29', 20000, '2019-09-13 10:59:29', 0, ''),
(265, 'K1B130919008', '2019-09-13 10:59:57', 50000, '2019-09-13 10:59:57', 0, ''),
(266, 'K1B100919004', '2019-09-13 11:03:44', 10000, '2019-09-13 11:03:44', 0, ''),
(267, 'K1B070919001', '2019-09-15 09:22:25', 50000, '2019-09-15 09:22:25', 0, ''),
(268, 'K1B050919004', '2019-09-15 09:22:48', 50000, '2019-09-15 09:22:48', 0, ''),
(269, 'K1B020919004', '2019-09-15 09:23:40', 100000, '2019-09-15 09:23:40', 0, ''),
(270, 'K1B110919009', '2019-09-15 09:27:03', 25000, '2019-09-15 09:27:03', 0, ''),
(271, 'K1B030919003', '2019-09-15 09:28:34', 20000, '2019-09-15 09:28:34', 0, ''),
(272, 'K1B080919002', '2019-09-15 09:30:18', 20000, '2019-09-15 09:30:18', 0, ''),
(273, 'K1B040919003', '2019-09-15 09:32:37', 10000, '2019-09-15 09:32:37', 0, ''),
(274, 'K1B030919002', '2019-09-15 09:33:59', 20000, '2019-09-15 09:33:59', 0, ''),
(275, 'K1B100919002', '2019-09-15 09:35:10', 50000, '2019-09-15 09:35:10', 0, ''),
(276, 'K1B100919003', '2019-09-15 09:45:21', 50000, '2019-09-15 09:45:21', 0, ''),
(277, 'K1B080919003', '2019-09-15 09:45:46', 50000, '2019-09-15 09:45:46', 0, ''),
(278, 'K1B020919005', '2019-09-15 09:47:42', 10000, '2019-09-15 09:47:42', 0, ''),
(279, 'K1B040919004', '2019-09-15 09:48:12', 100000, '2019-09-15 09:48:12', 0, ''),
(280, 'K1B080919007', '2019-09-15 09:56:31', 10000, '2019-09-15 09:56:31', 0, ''),
(281, 'K1B080919005', '2019-09-15 09:57:04', 10000, '2019-09-15 09:57:04', 0, ''),
(282, 'K1B050919002', '2019-09-15 09:57:59', 50000, '2019-09-15 09:57:59', 0, ''),
(283, 'K1B110919005', '2019-09-15 09:58:38', 20000, '2019-09-15 09:58:38', 0, ''),
(284, 'K1B110919006', '2019-09-15 10:00:45', 20000, '2019-09-15 10:00:45', 0, ''),
(285, 'K1B110919007', '2019-09-15 10:01:24', 20000, '2019-09-15 10:01:24', 0, ''),
(286, 'K1B030919007', '2019-09-15 10:01:57', 20000, '2019-09-15 10:01:57', 0, ''),
(287, 'K1B110919008', '2019-09-15 10:02:26', 10000, '2019-09-15 10:02:26', 0, ''),
(288, 'K1B040919007', '2019-09-15 10:03:10', 20000, '2019-09-15 10:03:10', 0, ''),
(289, 'K1B020919006', '2019-09-15 10:03:52', 20000, '2019-09-15 10:03:52', 0, ''),
(290, 'K1B130919006', '2019-09-15 10:04:28', 10000, '2019-09-15 10:04:28', 0, ''),
(291, 'K1B110919002', '2019-09-15 10:05:05', 20000, '2019-09-15 10:05:05', 0, ''),
(292, 'K1B050919009', '2019-09-15 10:05:45', 10000, '2019-09-15 10:05:45', 0, ''),
(293, 'K1B050919008', '2019-09-15 10:06:19', 15000, '2019-09-15 10:06:19', 0, ''),
(294, 'K1B080919009', '2019-09-15 10:07:02', 50000, '2019-09-15 10:07:02', 0, ''),
(295, 'K1B140919002', '2019-09-14 10:22:37', 300000, '2019-09-14 10:22:37', 0, ''),
(296, 'K1B140919001', '2019-09-14 10:23:03', 270000, '2019-09-14 10:23:03', 0, ''),
(297, 'K1B140919003', '2019-09-14 10:34:34', 100000, '2019-09-14 10:34:34', 0, ''),
(298, 'K1B140919004', '2019-09-14 10:39:53', 50000, '2019-09-14 10:39:53', 0, ''),
(299, 'K1B140919005', '2019-09-14 10:45:00', 110000, '2019-09-14 10:45:00', 0, ''),
(300, 'K1B140919006', '2019-09-14 10:50:25', 150000, '2019-09-14 10:50:25', 0, ''),
(301, 'K1B140919007', '2019-09-14 10:58:24', 50000, '2019-09-14 10:58:24', 0, ''),
(302, 'K1B140919008', '2019-09-14 11:07:02', 20000, '2019-09-14 11:07:02', 0, ''),
(303, 'K1B080919004', '2019-09-14 11:09:12', 20000, '2019-09-14 11:09:12', 0, ''),
(304, 'K1B020919006', '2019-09-14 11:09:28', 10000, '2019-09-14 11:09:28', 0, ''),
(305, 'K1B140919009', '2019-09-14 11:12:44', 30000, '2019-09-14 11:12:44', 0, ''),
(306, 'K1B140919010', '2019-09-14 11:15:38', 60000, '2019-09-14 11:15:38', 0, ''),
(307, 'K1B080919001', '2019-09-14 11:20:03', 30000, '2019-09-14 11:20:03', 0, ''),
(308, 'K1B110919010', '2019-09-16 09:33:27', 10000, '2019-09-16 09:33:27', 0, ''),
(309, 'K1B070919001', '2019-09-16 09:33:46', 30000, '2019-09-16 09:33:46', 0, ''),
(310, 'K1B020919004', '2019-09-16 09:34:07', 50000, '2019-09-16 09:34:07', 0, ''),
(311, 'K1B040919001', '2019-09-16 09:34:32', 20000, '2019-09-16 09:34:32', 0, ''),
(312, 'K1B140919002', '2019-09-16 09:37:58', 50000, '2019-09-16 09:37:58', 0, ''),
(313, 'K1B110919009', '2019-09-16 09:38:33', 25000, '2019-09-16 09:38:33', 0, ''),
(314, 'K1B140919001', '2019-09-16 09:38:57', 10000, '2019-09-16 09:38:57', 0, ''),
(315, 'K1B080919001', '2019-09-16 09:40:21', 100000, '2019-09-16 09:40:21', 0, ''),
(316, 'K1B160919001', '2019-09-16 09:45:35', 190000, '2019-09-16 09:45:35', 0, ''),
(317, 'K1B030919002', '2019-09-16 09:48:02', 20000, '2019-09-16 09:48:02', 0, ''),
(318, 'K1B110919001', '2019-09-16 09:48:19', 20000, '2019-09-16 09:48:19', 0, ''),
(319, 'K1B140919004', '2019-09-16 09:48:53', 50000, '2019-09-16 09:48:53', 0, ''),
(320, 'K1B160919003', '2019-09-16 09:57:49', 190000, '2019-09-16 09:57:49', 0, ''),
(321, 'K1B160919002', '2019-09-16 09:58:44', 20000, '2019-09-16 09:58:44', 0, ''),
(322, 'K1B100919003', '2019-09-16 10:00:56', 20000, '2019-09-16 10:00:56', 0, ''),
(323, 'K1B080919003', '2019-09-16 10:01:16', 50000, '2019-09-16 10:01:16', 0, ''),
(324, 'K1B160919004', '2019-09-16 10:11:14', 40000, '2019-09-16 10:11:14', 0, ''),
(325, 'K1B160919005', '2019-09-16 10:21:25', 10000, '2019-09-16 10:21:25', 0, ''),
(326, 'K1B160919006', '2019-09-16 10:23:05', 10000, '2019-09-16 10:23:05', 0, ''),
(327, 'K1B110919006', '2019-09-16 08:20:47', 20000, '2019-09-16 08:20:47', 0, ''),
(328, 'K1B030919007', '2019-09-16 08:21:47', 10000, '2019-09-16 08:21:47', 0, ''),
(329, 'K1B110919008', '2019-09-16 08:22:57', 10000, '2019-09-16 08:22:57', 0, ''),
(330, 'K1B040919007', '2019-09-16 08:24:00', 20000, '2019-09-16 08:24:00', 0, ''),
(331, 'K1B030919006', '2019-09-16 08:25:10', 10000, '2019-09-16 08:25:10', 0, ''),
(332, 'K1B130919007', '2019-09-16 08:25:31', 30000, '2019-09-16 08:25:31', 0, ''),
(333, 'K1B160919007', '2019-09-16 08:41:04', 90000, '2019-09-16 08:41:04', 0, ''),
(334, 'K1B130919004', '2019-09-16 08:50:42', 150000, '2019-09-16 08:50:42', 0, ''),
(335, 'K1B080919007', '2019-09-16 08:50:57', 10000, '2019-09-16 08:50:57', 0, ''),
(336, 'K1B080919005', '2019-09-16 08:52:10', 10000, '2019-09-16 08:52:10', 0, ''),
(337, 'K1B050919002', '2019-09-16 08:55:36', 50000, '2019-09-16 08:55:36', 0, ''),
(338, 'K1B040919006', '2019-09-16 08:55:51', 10000, '2019-09-16 08:55:51', 0, ''),
(339, 'K1B110919005', '2019-09-16 08:56:06', 25000, '2019-09-16 08:56:06', 0, ''),
(340, 'K1B160919008', '2019-09-16 09:04:43', 20000, '2019-09-16 09:04:43', 0, ''),
(341, 'K1B160919010', '2019-09-16 09:49:52', 50000, '2019-09-16 09:49:52', 0, ''),
(342, 'K1B160919011', '2019-09-16 10:07:33', 30000, '2019-09-16 10:07:33', 0, ''),
(343, 'K1B130919008', '2019-09-16 10:07:49', 20000, '2019-09-16 10:07:49', 0, ''),
(344, 'K1B050919008', '2019-09-16 10:08:19', 20000, '2019-09-16 10:08:19', 0, ''),
(345, 'K1B140919010', '2019-09-16 10:08:34', 20000, '2019-09-16 10:08:34', 0, ''),
(346, 'K1B080919009', '2019-09-16 10:09:04', 20000, '2019-09-16 10:09:04', 0, ''),
(347, 'K1B140919009', '2019-09-16 10:09:19', 10000, '2019-09-16 10:09:19', 0, ''),
(348, 'K1B130919009', '2019-09-16 10:09:36', 20000, '2019-09-16 10:09:36', 0, ''),
(349, 'K1B160919009', '2019-09-16 10:11:06', 40000, '2019-09-16 10:11:06', 0, ''),
(350, 'K1B160919008', '2019-09-16 10:11:31', 20000, '2019-09-16 10:11:31', 0, ''),
(351, 'K1B070919001', '2019-09-17 12:40:11', 50000, '2019-09-17 12:40:11', 0, ''),
(352, 'K1B050919004', '2019-09-17 12:40:28', 25000, '2019-09-17 12:40:28', 0, ''),
(353, 'K1B020919004', '2019-09-17 12:40:43', 120000, '2019-09-17 12:40:43', 0, ''),
(354, 'K1B160919003', '2019-09-17 12:45:51', 115000, '2019-09-17 12:45:51', 0, ''),
(355, 'K1B110919009', '2019-09-17 12:46:14', 25000, '2019-09-17 12:46:14', 0, ''),
(356, 'K1B170919001', '2019-09-17 12:46:30', 10000, '2019-09-17 12:46:30', 0, ''),
(357, 'K1B170919002', '2019-09-17 12:46:47', 330000, '2019-09-17 12:46:47', 0, ''),
(358, 'K1B140919001', '2019-09-17 12:47:55', 10000, '2019-09-17 12:47:55', 0, ''),
(359, 'K1B030919003', '2019-09-17 12:48:37', 20000, '2019-09-17 12:48:37', 0, ''),
(360, 'K1B080919002', '2019-09-17 12:49:06', 10000, '2019-09-17 12:49:06', 0, ''),
(361, 'K1B030919002', '2019-09-17 12:49:26', 20000, '2019-09-17 12:49:26', 0, ''),
(362, 'K1B170919003', '2019-09-17 12:49:44', 100000, '2019-09-17 12:49:44', 0, ''),
(363, 'K1B030919004', '2019-09-17 12:50:32', 10000, '2019-09-17 12:50:32', 0, ''),
(364, 'K1B100919003', '2019-09-17 12:50:47', 30000, '2019-09-17 12:50:47', 0, ''),
(365, 'K1B080919003', '2019-09-17 12:51:02', 50000, '2019-09-17 12:51:02', 0, ''),
(366, 'K1B170919004', '2019-09-17 12:51:19', 40000, '2019-09-17 12:51:19', 0, ''),
(367, 'K1B130919004', '2019-09-17 12:54:26', 20000, '2019-09-17 12:54:26', 0, ''),
(368, 'K1B130919005', '2019-09-17 12:54:46', 100000, '2019-09-17 12:54:46', 0, ''),
(369, 'K1B100919006', '2019-09-17 12:56:14', 20000, '2019-09-17 12:56:14', 0, ''),
(370, 'K1B040919005', '2019-09-17 12:56:32', 15000, '2019-09-17 12:56:32', 0, ''),
(371, 'K1B100919010', '2019-09-17 12:58:02', 100000, '2019-09-17 12:58:02', 0, ''),
(372, 'K1B100919008', '2019-09-17 12:59:11', 50000, '2019-09-17 12:59:11', 0, ''),
(373, 'K1B100919011', '2019-09-17 12:59:34', 50000, '2019-09-17 12:59:34', 0, ''),
(374, 'K1B070919005', '2019-09-17 13:00:06', 20000, '2019-09-17 13:00:06', 0, ''),
(375, 'K1B100919009', '2019-09-17 13:00:27', 80000, '2019-09-17 13:00:27', 0, ''),
(376, 'K1B070919008', '2019-09-17 13:00:45', 20000, '2019-09-17 13:00:45', 0, ''),
(377, 'K1B050919002', '2019-09-17 13:03:27', 50000, '2019-09-17 13:03:27', 0, ''),
(378, 'K1B110919005', '2019-09-17 13:03:45', 20000, '2019-09-17 13:03:45', 0, ''),
(379, 'K1B170919006', '2019-09-17 07:47:09', 20000, '2019-09-17 07:47:09', 0, ''),
(380, 'K1B170919005', '2019-09-17 07:47:36', 40000, '2019-09-17 07:47:36', 0, ''),
(381, 'K1B110919007', '2019-09-17 07:49:12', 15000, '2019-09-17 07:49:12', 0, ''),
(382, 'K1B110919006', '2019-09-17 07:55:10', 20000, '2019-09-17 07:55:10', 0, ''),
(383, 'K1B110919008', '2019-09-17 07:55:31', 5000, '2019-09-17 07:55:31', 0, ''),
(384, 'K1B030919007', '2019-09-17 07:55:55', 10000, '2019-09-17 07:55:55', 0, ''),
(385, 'K1B080919004', '2019-09-17 08:17:46', 20000, '2019-09-17 08:17:46', 0, ''),
(386, 'K1B140919007', '2019-09-17 08:18:25', 50000, '2019-09-17 08:18:25', 0, ''),
(387, 'K1B040919007', '2019-09-17 08:18:48', 20000, '2019-09-17 08:18:48', 0, ''),
(388, 'K1B020919006', '2019-09-17 08:19:02', 20000, '2019-09-17 08:19:02', 0, ''),
(389, 'K1B130919007', '2019-09-17 08:19:20', 10000, '2019-09-17 08:19:20', 0, ''),
(390, 'K1B170919008', '2019-09-17 08:19:35', 40000, '2019-09-17 08:19:35', 0, ''),
(391, 'K1B170919007', '2019-09-17 08:22:45', 40000, '2019-09-17 08:22:45', 0, ''),
(392, 'K1B160919011', '2019-09-17 08:25:10', 20000, '2019-09-17 08:25:10', 0, ''),
(393, 'K1B140919010', '2019-09-17 08:25:24', 20000, '2019-09-17 08:25:24', 0, ''),
(394, 'K1B080919009', '2019-09-17 08:25:43', 50000, '2019-09-17 08:25:43', 0, ''),
(395, 'K1B140919009', '2019-09-17 08:26:02', 10000, '2019-09-17 08:26:02', 0, ''),
(396, 'K1B170919010', '2019-09-17 08:57:17', 40000, '2019-09-17 08:57:17', 0, ''),
(397, 'K1B170919009', '2019-09-17 08:57:38', 50000, '2019-09-17 08:57:38', 0, ''),
(398, 'K1B110919010', '2019-09-18 09:19:49', 10000, '2019-09-18 09:19:49', 0, ''),
(399, 'K1B130919001', '2019-09-18 09:20:23', 50000, '2019-09-18 09:20:23', 0, ''),
(400, 'K1B070919001', '2019-09-18 09:20:43', 50000, '2019-09-18 09:20:43', 0, ''),
(401, 'K1B020919004', '2019-09-18 09:21:22', 30000, '2019-09-18 09:21:22', 0, ''),
(402, 'K1B100919001', '2019-09-18 09:21:39', 5000, '2019-09-18 09:21:39', 0, ''),
(403, 'K1B080919001', '2019-09-18 09:21:52', 50000, '2019-09-18 09:21:52', 0, ''),
(404, 'K1B160919003', '2019-09-18 09:23:02', 25000, '2019-09-18 09:23:02', 0, ''),
(405, 'K1B110919009', '2019-09-18 09:29:06', 25000, '2019-09-18 09:29:06', 0, ''),
(406, 'K1B140919001', '2019-09-18 09:29:25', 10000, '2019-09-18 09:29:25', 0, ''),
(407, 'K1B100919002', '2019-09-18 09:30:21', 20000, '2019-09-18 09:30:21', 0, ''),
(408, 'K1B100919003', '2019-09-18 09:33:46', 50000, '2019-09-18 09:33:46', 0, ''),
(409, 'K1B080919003', '2019-09-18 09:34:05', 30000, '2019-09-18 09:34:05', 0, ''),
(410, 'K1B020919005', '2019-09-18 09:34:34', 10000, '2019-09-18 09:34:34', 0, ''),
(411, 'K1B130919004', '2019-09-18 09:51:35', 20000, '2019-09-18 09:51:35', 0, ''),
(412, 'K1B130919005', '2019-09-18 09:53:07', 100000, '2019-09-18 09:53:07', 0, ''),
(413, 'K1B050919002', '2019-09-18 09:53:29', 50000, '2019-09-18 09:53:29', 0, ''),
(414, 'K1B110919005', '2019-09-18 09:53:45', 20000, '2019-09-18 09:53:45', 0, ''),
(415, 'K1B110919008', '2019-09-18 10:42:05', 5000, '2019-09-18 10:42:05', 0, ''),
(416, 'K1B030919007', '2019-09-18 10:43:38', 10000, '2019-09-18 10:43:38', 0, ''),
(417, 'K1B110919007', '2019-09-18 10:43:51', 15000, '2019-09-18 10:43:51', 0, ''),
(418, 'K1B080919004', '2019-09-18 10:44:47', 20000, '2019-09-18 10:44:47', 0, ''),
(419, 'K1B040919007', '2019-09-18 10:45:29', 20000, '2019-09-18 10:45:29', 0, ''),
(420, 'K1B030919006', '2019-09-18 10:46:20', 10000, '2019-09-18 10:46:20', 0, ''),
(421, 'K1B130919007', '2019-09-18 10:46:50', 10000, '2019-09-18 10:46:50', 0, ''),
(422, 'K1B040919008', '2019-09-18 10:47:10', 10000, '2019-09-18 10:47:10', 0, ''),
(423, 'K1B130919006', '2019-09-18 10:47:50', 20000, '2019-09-18 10:47:50', 0, ''),
(424, 'K1B020919006', '2019-09-18 10:48:17', 20000, '2019-09-18 10:48:17', 0, ''),
(425, 'K1B170919007', '2019-09-18 10:48:52', 20000, '2019-09-18 10:48:52', 0, ''),
(426, 'K1B110919002', '2019-09-18 10:53:55', 20000, '2019-09-18 10:53:55', 0, ''),
(427, 'K1B110919002', '2019-09-18 11:02:35', 5000, '2019-09-18 11:02:35', 0, ''),
(428, 'K1B170919010', '2019-09-18 11:02:58', 10000, '2019-09-18 11:02:58', 0, ''),
(429, 'K1B050919009', '2019-09-18 11:03:17', 20000, '2019-09-18 11:03:17', 0, ''),
(430, 'K1B050919008', '2019-09-18 11:04:12', 20000, '2019-09-18 11:04:12', 0, ''),
(431, 'K1B160919011', '2019-09-18 11:04:40', 10000, '2019-09-18 11:04:40', 0, ''),
(432, 'K1B170919009', '2019-09-18 11:05:15', 20000, '2019-09-18 11:05:15', 0, ''),
(433, 'K1B140919010', '2019-09-18 11:05:39', 20000, '2019-09-18 11:05:39', 0, ''),
(434, 'K1B100919004', '2019-09-18 11:06:00', 10000, '2019-09-18 11:06:00', 0, '');

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
  `phu_id` int(11) NOT NULL COMMENT 'fk dari phu',
  `psis_id` varchar(20) NOT NULL COMMENT 'fk dari phu_sistem'
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

--
-- Dumping data for table `simkesan`
--

INSERT INTO `simkesan` (`sik_kode`, `ang_no`, `kar_kode`, `psk_id`, `wil_kode`, `sik_tglpendaftaran`, `sik_tglberakhir`, `sik_status`, `sik_tgl`, `sik_flag`, `sik_info`) VALUES
('KE240819001', 'K240819003', '240819003', 3, '5', '2019-08-24 00:00:00', NULL, 0, '2019-08-24 14:06:44', 2, ''),
('KE240819002', 'K240819001', '240819001', 2, '7', '2019-08-24 00:00:00', NULL, 0, '2019-08-24 14:12:09', 2, ''),
('KE240819003', 'K240819002', '240819003', 1, '9', '2019-08-24 00:00:00', NULL, 0, '2019-08-24 14:14:07', 2, ''),
('KE260819001', 'K240819004', '240819001', 1, '9', '2019-08-26 00:00:00', NULL, 0, '2019-08-26 13:00:41', 2, ''),
('KE290819001', 'K290819014', '2708006', 3, '10', '2019-08-29 00:00:00', NULL, 0, '2019-08-29 13:55:58', 0, ''),
('KE290819002', 'K290819015', '2708005', 2, '11', '2019-08-29 00:00:00', NULL, 0, '2019-08-29 14:00:31', 0, ''),
('KE310819001', 'K310819016', '2708006', 1, '13', '2019-08-31 00:00:00', NULL, 0, '2019-08-31 12:09:55', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `sim_kode` varchar(25) NOT NULL,
  `ang_no` varchar(25) NOT NULL COMMENT 'fk dari anggota',
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
('K1A020919002', 'K102091900', '3108010', 4, 1, 1, '16', '2019-09-02 00:00:00', '0', '2019-09-02 11:07:47', 2, ''),
('K1A020919007', 'K1020919004', '3108007', 4, 1, 1, '18', '2019-09-02 00:00:00', '0', '2019-09-02 11:54:25', 2, ''),
('K1A050919003', 'K1050919020', '3108009', 4, 1, 1, '14', '2019-09-05 00:00:00', '0', '2019-09-05 12:42:56', 2, ''),
('K1B020919001', 'K102091900', '3108009', 4, 2, 1, '14', '2019-09-02 00:00:00', '0', '2019-09-02 10:56:50', 2, ''),
('K1B020919003', 'K102091900', '3108010', 4, 2, 1, '16', '2019-09-02 00:00:00', '0', '2019-09-02 11:09:02', 2, ''),
('K1B020919004', 'K1020919001', '3108009', 4, 2, 1, '14', '2019-09-02 00:00:00', '0', '2019-09-02 11:34:48', 0, ''),
('K1B020919005', 'K1020919002', '3108010', 4, 2, 1, '16', '2019-09-02 00:00:00', '0', '2019-09-02 11:37:49', 0, ''),
('K1B020919006', 'K1020919003', '3108007', 4, 2, 1, '18', '2019-09-02 00:00:00', '0', '2019-09-02 11:44:37', 0, ''),
('K1B020919008', 'K1020919005', '3108010', 4, 2, 1, '16', '2019-09-02 00:00:00', '0', '2019-09-02 14:37:46', 0, ''),
('K1B030919001', 'K1030919006', '3108009', 4, 2, 1, '14', '2019-09-03 00:00:00', '0', '2019-09-03 15:52:34', 0, ''),
('K1B030919002', 'K1030919007', '3108008', 4, 2, 1, '15', '2019-09-03 00:00:00', '0', '2019-09-03 15:58:05', 0, ''),
('K1B030919003', 'K1030919008', '3108008', 4, 2, 1, '15', '2019-09-03 00:00:00', '0', '2019-09-03 16:03:19', 0, ''),
('K1B030919004', 'K1030919009', '3108010', 4, 2, 1, '16', '2019-09-03 00:00:00', '0', '2019-09-03 16:08:28', 0, ''),
('K1B030919005', 'K1030919010', '3108011', 4, 2, 1, '17', '2019-09-03 00:00:00', '0', '2019-09-03 16:13:36', 0, ''),
('K1B030919006', 'K1030919011', '3108007', 4, 2, 1, '18', '2019-09-03 00:00:00', '0', '2019-09-03 16:17:34', 0, ''),
('K1B030919007', 'K1030919012', '3108007', 4, 2, 1, '18', '2019-09-03 00:00:00', '0', '2019-09-03 16:22:33', 0, ''),
('K1B040919001', 'K1040919013', '3108009', 4, 2, 1, '14', '2019-09-04 00:00:00', '0', '2019-09-04 10:12:17', 0, ''),
('K1B040919002', 'K1040919014', '3108008', 4, 2, 1, '15', '2019-09-04 00:00:00', '0', '2019-09-04 10:20:43', 0, ''),
('K1B040919003', 'K1040919015', '3108008', 4, 2, 1, '15', '2019-09-04 00:00:00', '0', '2019-09-04 10:31:21', 0, ''),
('K1B040919004', 'K1040919016', '3108010', 4, 2, 1, '16', '2019-09-04 00:00:00', '0', '2019-09-04 10:42:15', 0, ''),
('K1B040919005', 'K1040919017', '3108011', 4, 2, 1, '17', '2019-09-04 00:00:00', '0', '2019-09-04 10:46:21', 0, ''),
('K1B040919006', 'K1040919019', '3108011', 4, 2, 1, '17', '2019-09-04 00:00:00', '0', '2019-09-04 10:56:42', 0, ''),
('K1B040919007', 'K1040919018', '3108007', 4, 2, 1, '18', '2019-09-04 00:00:00', '0', '2019-09-04 10:58:20', 0, ''),
('K1B040919008', 'K1020919004', '3108007', 4, 2, 1, '18', '2019-09-04 00:00:00', '0', '2019-09-04 11:11:11', 0, ''),
('K1B050919001', 'K1050919020', '3108009', 4, 2, 1, '', '2019-09-05 00:00:00', '0', '2019-09-05 12:32:12', 2, ''),
('K1B050919002', 'K1050919021', '3108011', 4, 2, 1, '17', '2019-09-05 00:00:00', '0', '2019-09-05 12:42:05', 0, ''),
('K1B050919004', 'K1050919020', '3108009', 4, 2, 1, '14', '2019-09-05 00:00:00', '0', '2019-09-05 12:44:35', 0, ''),
('K1B050919005', 'K1050919022', '3108011', 4, 2, 1, '17', '2019-09-05 00:00:00', '0', '2019-09-05 13:08:31', 0, ''),
('K1B050919006', 'K1050919023', '3108007', 4, 2, 1, '18', '2019-09-05 00:00:00', '0', '2019-09-05 13:18:19', 0, ''),
('K1B050919007', 'K1050919024', '3108012', 4, 2, 1, '19', '2019-09-05 00:00:00', '0', '2019-09-05 13:30:49', 0, ''),
('K1B050919008', 'K1050919025', '3108012', 4, 2, 1, '19', '2019-09-05 00:00:00', '0', '2019-09-05 13:35:31', 0, ''),
('K1B050919009', 'K1050919026', '3108012', 4, 2, 1, '19', '2019-09-05 00:00:00', '0', '2019-09-05 13:39:23', 0, ''),
('K1B070919001', 'K1070919027', '3108009', 4, 2, 1, '14', '2019-09-07 00:00:00', '0', '2019-09-07 08:59:20', 0, ''),
('K1B070919002', 'K1070919028', '3108008', 4, 2, 1, '15', '2019-09-07 00:00:00', '0', '2019-09-07 09:18:53', 0, ''),
('K1B070919003', 'K1070919029', '3108008', 4, 2, 1, '15', '2019-09-07 00:00:00', '0', '2019-09-07 09:19:49', 0, ''),
('K1B070919004', 'K1070919030', '3108010', 4, 2, 1, '16', '2019-09-07 00:00:00', '0', '2019-09-07 09:33:12', 0, ''),
('K1B070919005', 'K1070919031', '3108011', 4, 2, 1, '17', '2019-09-07 00:00:00', '0', '2019-09-07 10:17:02', 0, ''),
('K1B070919006', 'K1070919032', '3108007', 4, 2, 1, '18', '2019-09-07 00:00:00', '0', '2019-09-07 10:30:52', 0, ''),
('K1B070919007', 'K1070919033', '3108012', 4, 2, 1, '19', '2019-09-07 00:00:00', '0', '2019-09-07 11:05:02', 0, ''),
('K1B070919008', 'K1070919034', '3108011', 4, 2, 1, '17', '2019-09-07 00:00:00', '0', '2019-09-07 15:23:43', 0, ''),
('K1B080919001', 'K1080919035', '3108009', 4, 2, 1, '14', '2019-09-08 00:00:00', '0', '2019-09-08 06:37:19', 0, ''),
('K1B080919002', 'K1080919036', '3108008', 4, 2, 1, '15', '2019-09-08 00:00:00', '0', '2019-09-08 06:40:42', 0, ''),
('K1B080919003', 'K1080919037', '3108010', 4, 2, 1, '16', '2019-09-08 00:00:00', '0', '2019-09-08 06:50:41', 0, ''),
('K1B080919004', 'K1080919038', '3108007', 0, 2, 1, '18', '2019-09-08 00:00:00', '0', '2019-09-08 06:56:21', 0, ''),
('K1B080919005', 'K1080919039', '3108011', 4, 2, 1, '17', '2019-09-08 00:00:00', '0', '2019-09-08 07:00:22', 0, ''),
('K1B080919006', 'K1080919040', '3108011', 4, 2, 1, '17', '2019-09-08 00:00:00', '0', '2019-09-08 07:07:22', 0, ''),
('K1B080919007', 'K1080919041', '3108011', 4, 2, 1, '17', '2019-09-08 00:00:00', '0', '2019-09-08 07:10:57', 0, ''),
('K1B080919008', 'K1080919042', '3108012', 4, 2, 1, '19', '2019-09-08 00:00:00', '0', '2019-09-08 07:17:31', 0, ''),
('K1B080919009', 'K1080919043', '3108012', 4, 2, 1, '19', '2019-09-08 00:00:00', '0', '2019-09-08 07:22:46', 0, ''),
('K1B100919001', 'K1100919044', '3108009', 4, 2, 1, '14', '2019-09-10 00:00:00', '0', '2019-09-10 07:09:55', 0, ''),
('K1B100919002', 'K1100919045', '3108008', 4, 2, 1, '15', '2019-09-10 00:00:00', '0', '2019-09-10 07:17:46', 0, ''),
('K1B100919003', 'K1100919046', '3108010', 4, 2, 1, '16', '2019-09-10 00:00:00', '0', '2019-09-10 07:56:47', 0, ''),
('K1B100919004', 'K1100919047', '3108012', 4, 2, 1, '19', '2019-09-10 00:00:00', '0', '2019-09-10 08:03:50', 0, ''),
('K1B100919005', 'K1100919053', '3108011', 4, 2, 1, '17', '2019-09-10 00:00:00', '0', '2019-09-10 08:22:31', 0, ''),
('K1B100919006', 'K1100919052', '3108011', 4, 2, 1, '17', '2019-09-10 00:00:00', '0', '2019-09-10 08:23:48', 0, ''),
('K1B100919007', 'K1100919051', '', 4, 2, 1, '17', '2019-09-10 00:00:00', '0', '2019-09-10 08:24:39', 2, ''),
('K1B100919008', 'K1100919051', '3108011', 4, 2, 1, '17', '2019-09-10 00:00:00', '0', '2019-09-10 08:26:03', 0, ''),
('K1B100919009', 'K1100919050', '3108011', 4, 2, 1, '17', '2019-09-10 00:00:00', '0', '2019-09-10 08:27:36', 0, ''),
('K1B100919010', 'K1100919049', '3108011', 4, 2, 1, '17', '2019-09-10 00:00:00', '0', '2019-09-10 08:34:18', 0, ''),
('K1B100919011', 'K1100919048', '3108011', 4, 2, 1, '17', '2019-09-10 00:00:00', '0', '2019-09-10 08:35:13', 0, ''),
('K1B110919001', 'K1110919054', '3108008', 4, 2, 1, '15', '2019-09-11 00:00:00', '0', '2019-09-11 12:59:10', 0, ''),
('K1B110919002', 'K1110919055', '3108012', 4, 2, 1, '19', '2019-09-11 00:00:00', '0', '2019-09-11 13:07:37', 0, ''),
('K1B110919003', 'K1110919056', '3108010', 4, 2, 1, '16', '2019-09-11 00:00:00', '0', '2019-09-11 13:27:26', 0, ''),
('K1B110919004', 'K1110919057', '3108010', 4, 2, 1, '16', '2019-09-11 00:00:00', '0', '2019-09-11 13:34:41', 0, ''),
('K1B110919005', 'K1110919058', '3108011', 4, 2, 1, '17', '2019-09-11 00:00:00', '0', '2019-09-11 06:32:56', 0, ''),
('K1B110919006', 'K1110919060', '3108007', 4, 2, 1, '18', '2019-09-11 00:00:00', '0', '2019-09-11 06:49:07', 0, ''),
('K1B110919007', 'K1110919059', '3108007', 4, 2, 1, '18', '2019-09-11 00:00:00', '0', '2019-09-11 06:51:32', 0, ''),
('K1B110919008', 'K1110919061', '3108007', 4, 2, 1, '18', '2019-09-11 00:00:00', '0', '2019-09-11 06:54:11', 0, ''),
('K1B110919009', 'K1110919062', '3108009', 4, 2, 1, '14', '2019-09-11 00:00:00', '0', '2019-09-11 08:29:00', 0, ''),
('K1B110919010', 'K1110919063', '3108009', 4, 2, 1, '14', '2019-09-11 00:00:00', '0', '2019-09-11 08:36:10', 0, ''),
('K1B130919001', 'K1130919064', '3108009', 4, 2, 1, '14', '2019-09-13 00:00:00', '0', '2019-09-13 09:15:27', 0, ''),
('K1B130919002', 'K1130919065', '3108008', 4, 2, 1, '15', '2019-09-13 00:00:00', '0', '2019-09-13 09:33:26', 0, ''),
('K1B130919003', 'K1130919066', '3108010', 4, 2, 1, '16', '2019-09-13 00:00:00', '0', '2019-09-13 09:49:01', 0, ''),
('K1B130919004', 'K1130919067', '3108011', 4, 2, 1, '17', '2019-09-13 00:00:00', '0', '2019-09-13 10:19:16', 0, ''),
('K1B130919005', 'K1130919068', '3108011', 4, 2, 1, '17', '2019-09-13 00:00:00', '0', '2019-09-13 10:23:09', 0, ''),
('K1B130919006', 'K1130919069', '3108007', 4, 2, 1, '18', '2019-09-13 00:00:00', '0', '2019-09-13 10:40:21', 0, ''),
('K1B130919007', 'K1130919070', '3108007', 4, 2, 1, '18', '2019-09-13 00:00:00', '0', '2019-09-13 10:42:12', 0, ''),
('K1B130919008', 'K1130919072', '3108012', 4, 2, 1, '19', '2019-09-13 00:00:00', '0', '2019-09-13 10:57:13', 0, ''),
('K1B130919009', 'K1130919071', '3108012', 4, 2, 1, '19', '2019-09-13 00:00:00', '0', '2019-09-13 10:59:01', 0, ''),
('K1B140919001', 'K1140919073', '3108009', 4, 2, 1, '14', '2019-09-14 00:00:00', '0', '2019-09-14 10:18:09', 0, ''),
('K1B140919002', 'K1140919074', '3108009', 4, 2, 1, '14', '2019-09-14 00:00:00', '0', '2019-09-14 10:22:00', 0, ''),
('K1B140919003', 'K1140919075', '3108008', 4, 2, 1, '15', '2019-09-14 00:00:00', '0', '2019-09-14 10:34:06', 0, ''),
('K1B140919004', 'K1140919076', '3108008', 4, 2, 1, '15', '2019-09-14 00:00:00', '0', '2019-09-14 10:39:29', 0, ''),
('K1B140919005', 'K1140919077', '3108010', 4, 2, 1, '16', '2019-09-14 00:00:00', '0', '2019-09-14 10:44:29', 0, ''),
('K1B140919006', 'K1140919078', '3108011', 4, 2, 1, '17', '2019-09-14 00:00:00', '0', '2019-09-14 10:49:56', 0, ''),
('K1B140919007', 'K1140919079', '3108007', 4, 2, 1, '18', '2019-09-14 00:00:00', '0', '2019-09-14 10:57:52', 0, ''),
('K1B140919008', 'K1140919080', '3108007', 4, 2, 1, '18', '2019-09-14 00:00:00', '0', '2019-09-14 11:06:36', 0, ''),
('K1B140919009', 'K1080919043', '3108012', 4, 2, 1, '19', '2019-09-14 00:00:00', '0', '2019-09-14 11:11:40', 0, ''),
('K1B140919010', 'K1140919081', '3108012', 4, 2, 1, '19', '2019-09-14 00:00:00', '0', '2019-09-14 11:15:04', 0, ''),
('K1B160919001', 'K1160919082', '3108009', 4, 2, 1, '', '2019-09-16 00:00:00', '0', '2019-09-16 09:44:56', 2, ''),
('K1B160919002', 'K1160919083', '3108008', 4, 2, 1, '15', '2019-09-16 00:00:00', '0', '2019-09-16 09:54:46', 0, ''),
('K1B160919003', 'K1160919082', '3108009', 4, 2, 1, '14', '2019-09-16 00:00:00', '0', '2019-09-16 09:57:12', 0, ''),
('K1B160919004', 'K1160919084', '3108010', 4, 2, 1, '16', '2019-09-16 00:00:00', '0', '2019-09-16 10:10:39', 0, ''),
('K1B160919005', 'K1160919086', '3108010', 4, 2, 1, '16', '2019-09-16 00:00:00', '0', '2019-09-16 10:20:51', 0, ''),
('K1B160919006', 'K1160919085', '3108010', 4, 2, 1, '16', '2019-09-16 00:00:00', '0', '2019-09-16 10:22:12', 0, ''),
('K1B160919007', 'K1160919087', '3108007', 4, 2, 1, '18', '2019-09-16 00:00:00', '0', '2019-09-16 08:39:26', 0, ''),
('K1B160919008', 'K1160919088', '3108011', 4, 2, 1, '17', '2019-09-16 00:00:00', '0', '2019-09-16 09:04:02', 0, ''),
('K1B160919009', 'K1160919089', '3108011', 4, 2, 1, '17', '2019-09-16 00:00:00', '0', '2019-09-16 09:10:08', 0, ''),
('K1B160919010', 'K1160919091', '3108012', 4, 2, 1, '19', '2019-09-16 00:00:00', '0', '2019-09-16 09:49:26', 0, ''),
('K1B160919011', 'K1160919090', '3108012', 4, 2, 1, '19', '2019-09-16 00:00:00', '0', '2019-09-16 09:59:46', 0, ''),
('K1B170919001', 'K1170919093', '3108009', 4, 2, 1, '14', '2019-09-17 00:00:00', '0', '2019-09-17 12:14:15', 0, ''),
('K1B170919002', 'K1170919092', '3108009', 4, 2, 1, '14', '2019-09-17 00:00:00', '0', '2019-09-17 12:15:09', 0, ''),
('K1B170919003', 'K1170919094', '3108008', 4, 2, 1, '15', '2019-09-17 00:00:00', '0', '2019-09-17 12:24:35', 0, ''),
('K1B170919004', 'K1170919095', '3108010', 4, 2, 1, '16', '2019-09-17 00:00:00', '0', '2019-09-17 12:33:15', 0, ''),
('K1B170919005', 'K1170919097', '3108011', 4, 2, 1, '17', '2019-09-17 00:00:00', '0', '2019-09-17 12:46:53', 0, ''),
('K1B170919006', 'K1170919096', '3108011', 4, 2, 1, '17', '2019-09-17 00:00:00', '0', '2019-09-17 12:47:29', 0, ''),
('K1B170919007', 'K1170919099', '3108007', 4, 2, 1, '18', '2019-09-17 00:00:00', '0', '2019-09-17 12:53:42', 0, ''),
('K1B170919008', 'K1170919098', '3108007', 4, 2, 1, '18', '2019-09-17 00:00:00', '0', '2019-09-17 12:55:28', 0, ''),
('K1B170919009', 'K1190919100', '3108012', 4, 2, 1, '19', '2019-09-17 00:00:00', '0', '2019-09-17 08:49:28', 0, ''),
('K1B170919010', 'K1180919100', '3108012', 4, 2, 1, '19', '2019-09-17 00:00:00', '0', '2019-09-17 08:52:14', 0, ''),
('KA270819003', 'K270819001', '2708005', 4, 1, 3, '8', '2019-08-27 00:00:00', '0', '2019-08-27 12:44:42', 2, ''),
('KA270819005', 'K270819008', '2708006', 4, 1, 3, '11', '2019-08-27 00:00:00', '0', '2019-08-27 13:42:08', 2, ''),
('KB270819004', 'K270819003', '2708004', 4, 2, 2, '10', '2019-08-27 00:00:00', '0', '2019-08-27 12:55:55', 2, ''),
('KB270819006', 'K270819009', '2708004', 4, 2, 3, '10', '2019-08-27 00:00:00', '0', '2019-08-27 13:44:39', 2, ''),
('KB270819007', 'K270819011', '2708005', 4, 2, 3, '10', '2019-08-27 00:00:00', '1', '2019-08-27 13:48:52', 2, '');

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
(31, 'K102091900', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 10:28:46', 0, ''),
(32, 'K102091900', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 11:06:02', 0, ''),
(33, 'K102091900', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 11:43:20', 0, ''),
(34, 'K102091900', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 11:53:45', 0, ''),
(35, 'K102091900', 2, 10000, '2019-09-02 00:00:00', '2019-09-02 14:36:20', 0, ''),
(36, 'K103091900', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 14:01:32', 0, ''),
(37, 'K103091900', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 15:56:54', 0, ''),
(38, 'K103091900', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 16:02:13', 0, ''),
(39, 'K103091900', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 16:06:57', 0, ''),
(40, 'K103091901', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 16:12:40', 0, ''),
(41, 'K103091901', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 16:16:41', 0, ''),
(42, 'K103091901', 2, 10000, '2019-09-03 00:00:00', '2019-09-03 16:21:11', 0, ''),
(43, 'K104091901', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 10:10:02', 0, ''),
(44, 'K104091901', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 10:19:07', 0, ''),
(45, 'K104091901', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 10:30:26', 0, ''),
(46, 'K104091901', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 10:40:51', 0, ''),
(47, 'K104091901', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 10:45:15', 0, ''),
(48, 'K104091901', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 10:53:25', 0, ''),
(49, 'K104091901', 2, 10000, '2019-09-04 00:00:00', '2019-09-04 10:55:50', 0, ''),
(50, 'K105091902', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 12:29:57', 0, ''),
(51, 'K105091902', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 12:38:51', 0, ''),
(52, 'K105091902', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 13:04:40', 0, ''),
(53, 'K105091902', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 13:17:20', 0, ''),
(54, 'K105091902', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 13:27:37', 0, ''),
(55, 'K105091902', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 13:34:38', 0, ''),
(56, 'K105091902', 2, 10000, '2019-09-05 00:00:00', '2019-09-05 13:38:25', 0, ''),
(57, 'K107091902', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 08:57:57', 0, ''),
(58, 'K107091902', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 09:14:39', 0, ''),
(59, 'K107091902', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 09:16:45', 0, ''),
(60, 'K107091903', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 09:29:21', 0, ''),
(61, 'K107091903', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 10:08:55', 0, ''),
(62, 'K107091903', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 10:27:54', 0, ''),
(63, 'K107091903', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 11:03:53', 0, ''),
(64, 'K107091903', 2, 10000, '2019-09-07 00:00:00', '2019-09-07 15:22:42', 0, ''),
(65, 'K108091903', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 06:36:26', 0, ''),
(66, 'K108091903', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 06:39:55', 0, ''),
(67, 'K108091903', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 06:49:53', 0, ''),
(68, 'K108091903', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 06:55:38', 0, ''),
(69, 'K108091903', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 06:59:32', 0, ''),
(70, 'K108091904', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 07:06:25', 0, ''),
(71, 'K108091904', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 07:10:00', 0, ''),
(72, 'K108091904', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 07:16:44', 0, ''),
(73, 'K108091904', 2, 10000, '2019-09-08 00:00:00', '2019-09-08 07:20:52', 0, ''),
(74, 'K110091904', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 07:08:39', 0, ''),
(75, 'K110091904', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 07:12:42', 0, ''),
(76, 'K110091904', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 07:51:01', 0, ''),
(77, 'K110091904', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 08:01:50', 0, ''),
(78, 'K110091904', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 08:06:24', 0, ''),
(79, 'K110091904', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 08:08:44', 0, ''),
(80, 'K110091905', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 08:13:17', 0, ''),
(81, 'K110091905', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 08:15:16', 0, ''),
(82, 'K110091905', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 08:17:02', 0, ''),
(83, 'K110091905', 2, 10000, '2019-09-10 00:00:00', '2019-09-10 08:19:00', 0, ''),
(84, 'K111091905', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 12:57:42', 0, ''),
(85, 'K111091905', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 13:05:44', 0, ''),
(86, 'K111091905', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 13:21:52', 0, ''),
(87, 'K111091905', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 13:33:57', 0, ''),
(88, 'K111091905', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 06:31:31', 0, ''),
(89, 'K111091905', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 06:37:08', 0, ''),
(90, 'K111091906', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 06:48:02', 0, ''),
(91, 'K111091906', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 06:53:22', 0, ''),
(92, 'K111091906', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 07:16:09', 0, ''),
(93, 'K111091906', 2, 10000, '2019-09-11 00:00:00', '2019-09-11 08:34:16', 0, ''),
(94, 'K113091906', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 09:14:39', 0, ''),
(95, 'K113091906', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 09:30:58', 0, ''),
(96, 'K113091906', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 09:45:23', 0, ''),
(97, 'K113091906', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 10:18:23', 0, ''),
(98, 'K113091906', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 10:21:54', 0, ''),
(99, 'K113091906', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 10:33:32', 0, ''),
(100, 'K113091907', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 10:41:25', 0, ''),
(101, 'K113091907', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 10:54:50', 0, ''),
(102, 'K113091907', 2, 10000, '2019-09-13 00:00:00', '2019-09-13 10:56:23', 0, ''),
(103, 'K114091907', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 10:17:15', 0, ''),
(104, 'K114091907', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 10:20:58', 0, ''),
(105, 'K114091907', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 10:32:37', 0, ''),
(106, 'K114091907', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 10:37:08', 0, ''),
(107, 'K114091907', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 10:43:22', 0, ''),
(108, 'K114091907', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 10:48:59', 0, ''),
(109, 'K114091907', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 10:56:44', 0, ''),
(110, 'K114091908', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 11:05:27', 0, ''),
(111, 'K114091908', 2, 10000, '2019-09-14 00:00:00', '2019-09-14 11:14:30', 0, ''),
(112, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 09:43:39', 0, ''),
(113, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 09:53:21', 0, ''),
(114, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 10:09:24', 0, ''),
(115, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 10:14:13', 0, ''),
(116, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 10:16:09', 0, ''),
(117, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 08:38:06', 0, ''),
(118, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 09:02:45', 0, ''),
(119, 'K116091908', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 09:09:21', 0, ''),
(120, 'K116091909', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 09:45:01', 0, ''),
(121, 'K116091909', 2, 10000, '2019-09-16 00:00:00', '2019-09-16 09:48:02', 0, ''),
(122, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:11:42', 0, ''),
(123, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:13:24', 0, ''),
(124, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:23:40', 0, ''),
(125, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:26:31', 0, ''),
(126, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:38:06', 0, ''),
(127, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:39:51', 0, ''),
(128, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:50:16', 0, ''),
(129, 'K117091909', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:53:04', 0, ''),
(130, 'K117091910', 2, 10000, '2019-09-17 00:00:00', '2019-09-17 12:58:32', 0, ''),
(131, 'K118091910', 2, 10000, '2019-09-18 00:00:00', '2019-09-18 08:28:56', 0, ''),
(132, 'K119091910', 2, 10000, '2019-09-19 00:00:00', '2019-09-19 08:38:52', 0, '');

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
(51, 'K102091900', 1, '2019-09-02 10:28:46', 0, NULL, '2019-09-02 10:28:46', 0, ''),
(52, 'K102091900', 1, '2019-09-02 11:06:02', 0, NULL, '2019-09-02 11:06:02', 0, ''),
(53, 'K102091900', 1, '2019-09-02 11:43:20', 0, NULL, '2019-09-02 11:43:20', 0, ''),
(54, 'K102091900', 1, '2019-09-02 11:53:45', 0, NULL, '2019-09-02 11:53:45', 0, ''),
(55, 'K102091900', 1, '2019-09-02 14:36:20', 0, NULL, '2019-09-02 14:36:20', 0, ''),
(56, 'K103091900', 1, '2019-09-03 14:01:32', 0, NULL, '2019-09-03 14:01:32', 0, ''),
(57, 'K103091900', 1, '2019-09-03 15:56:54', 0, NULL, '2019-09-03 15:56:54', 0, ''),
(58, 'K103091900', 1, '2019-09-03 16:02:13', 0, NULL, '2019-09-03 16:02:13', 0, ''),
(59, 'K103091900', 1, '2019-09-03 16:06:57', 0, NULL, '2019-09-03 16:06:57', 0, ''),
(60, 'K103091901', 1, '2019-09-03 16:12:40', 0, NULL, '2019-09-03 16:12:40', 0, ''),
(61, 'K103091901', 1, '2019-09-03 16:16:41', 0, NULL, '2019-09-03 16:16:41', 0, ''),
(62, 'K103091901', 1, '2019-09-03 16:21:11', 0, NULL, '2019-09-03 16:21:11', 0, ''),
(63, 'K104091901', 1, '2019-09-04 10:10:02', 0, NULL, '2019-09-04 10:10:02', 0, ''),
(64, 'K104091901', 1, '2019-09-04 10:19:07', 0, NULL, '2019-09-04 10:19:07', 0, ''),
(65, 'K104091901', 1, '2019-09-04 10:30:26', 0, NULL, '2019-09-04 10:30:26', 0, ''),
(66, 'K104091901', 1, '2019-09-04 10:40:51', 0, NULL, '2019-09-04 10:40:51', 0, ''),
(67, 'K104091901', 1, '2019-09-04 10:45:15', 0, NULL, '2019-09-04 10:45:15', 0, ''),
(68, 'K104091901', 1, '2019-09-04 10:53:25', 0, NULL, '2019-09-04 10:53:25', 0, ''),
(69, 'K104091901', 1, '2019-09-04 10:55:50', 0, NULL, '2019-09-04 10:55:50', 0, ''),
(70, 'K105091902', 1, '2019-09-05 12:29:57', 0, NULL, '2019-09-05 12:29:57', 0, ''),
(71, 'K105091902', 1, '2019-09-05 12:38:51', 0, NULL, '2019-09-05 12:38:51', 0, ''),
(72, 'K105091902', 1, '2019-09-05 13:04:40', 0, NULL, '2019-09-05 13:04:40', 0, ''),
(73, 'K105091902', 1, '2019-09-05 13:17:20', 0, NULL, '2019-09-05 13:17:20', 0, ''),
(74, 'K105091902', 1, '2019-09-05 13:27:37', 0, NULL, '2019-09-05 13:27:37', 0, ''),
(75, 'K105091902', 1, '2019-09-05 13:34:38', 0, NULL, '2019-09-05 13:34:38', 0, ''),
(76, 'K105091902', 1, '2019-09-05 13:38:25', 0, NULL, '2019-09-05 13:38:25', 0, ''),
(77, 'K107091902', 1, '2019-09-07 08:57:57', 0, NULL, '2019-09-07 08:57:57', 0, ''),
(78, 'K107091902', 1, '2019-09-07 09:14:39', 0, NULL, '2019-09-07 09:14:39', 0, ''),
(79, 'K107091902', 1, '2019-09-07 09:16:45', 0, NULL, '2019-09-07 09:16:45', 0, ''),
(80, 'K107091903', 1, '2019-09-07 09:29:21', 0, NULL, '2019-09-07 09:29:21', 0, ''),
(81, 'K107091903', 1, '2019-09-07 10:08:55', 0, NULL, '2019-09-07 10:08:55', 0, ''),
(82, 'K107091903', 1, '2019-09-07 10:27:54', 0, NULL, '2019-09-07 10:27:54', 0, ''),
(83, 'K107091903', 1, '2019-09-07 11:03:53', 0, NULL, '2019-09-07 11:03:53', 0, ''),
(84, 'K107091903', 1, '2019-09-07 15:22:42', 0, NULL, '2019-09-07 15:22:42', 0, ''),
(85, 'K108091903', 1, '2019-09-08 06:36:26', 0, NULL, '2019-09-08 06:36:26', 0, ''),
(86, 'K108091903', 1, '2019-09-08 06:39:55', 0, NULL, '2019-09-08 06:39:55', 0, ''),
(87, 'K108091903', 1, '2019-09-08 06:49:53', 0, NULL, '2019-09-08 06:49:53', 0, ''),
(88, 'K108091903', 1, '2019-09-08 06:55:38', 0, NULL, '2019-09-08 06:55:38', 0, ''),
(89, 'K108091903', 1, '2019-09-08 06:59:32', 0, NULL, '2019-09-08 06:59:32', 0, ''),
(90, 'K108091904', 1, '2019-09-08 07:06:25', 0, NULL, '2019-09-08 07:06:25', 0, ''),
(91, 'K108091904', 1, '2019-09-08 07:10:00', 0, NULL, '2019-09-08 07:10:00', 0, ''),
(92, 'K108091904', 1, '2019-09-08 07:16:44', 0, NULL, '2019-09-08 07:16:44', 0, ''),
(93, 'K108091904', 1, '2019-09-08 07:20:52', 0, NULL, '2019-09-08 07:20:52', 0, ''),
(94, 'K110091904', 1, '2019-09-10 07:08:39', 0, NULL, '2019-09-10 07:08:39', 0, ''),
(95, 'K110091904', 1, '2019-09-10 07:12:42', 0, NULL, '2019-09-10 07:12:42', 0, ''),
(96, 'K110091904', 1, '2019-09-10 07:51:01', 0, NULL, '2019-09-10 07:51:01', 0, ''),
(97, 'K110091904', 1, '2019-09-10 08:01:50', 0, NULL, '2019-09-10 08:01:50', 0, ''),
(98, 'K110091904', 1, '2019-09-10 08:06:24', 0, NULL, '2019-09-10 08:06:24', 0, ''),
(99, 'K110091904', 1, '2019-09-10 08:08:44', 0, NULL, '2019-09-10 08:08:44', 0, ''),
(100, 'K110091905', 1, '2019-09-10 08:13:17', 0, NULL, '2019-09-10 08:13:17', 0, ''),
(101, 'K110091905', 1, '2019-09-10 08:15:16', 0, NULL, '2019-09-10 08:15:16', 0, ''),
(102, 'K110091905', 1, '2019-09-10 08:17:02', 0, NULL, '2019-09-10 08:17:02', 0, ''),
(103, 'K110091905', 1, '2019-09-10 08:19:00', 0, NULL, '2019-09-10 08:19:00', 0, ''),
(104, 'K111091905', 1, '2019-09-11 12:57:42', 0, NULL, '2019-09-11 12:57:42', 0, ''),
(105, 'K111091905', 1, '2019-09-11 13:05:44', 0, NULL, '2019-09-11 13:05:44', 0, ''),
(106, 'K111091905', 1, '2019-09-11 13:21:52', 0, NULL, '2019-09-11 13:21:52', 0, ''),
(107, 'K111091905', 1, '2019-09-11 13:33:57', 0, NULL, '2019-09-11 13:33:57', 0, ''),
(108, 'K111091905', 1, '2019-09-11 06:31:31', 0, NULL, '2019-09-11 06:31:31', 0, ''),
(109, 'K111091905', 1, '2019-09-11 06:37:08', 0, NULL, '2019-09-11 06:37:08', 0, ''),
(110, 'K111091906', 1, '2019-09-11 06:48:02', 0, NULL, '2019-09-11 06:48:02', 0, ''),
(111, 'K111091906', 1, '2019-09-11 06:53:22', 0, NULL, '2019-09-11 06:53:22', 0, ''),
(112, 'K111091906', 1, '2019-09-11 07:16:09', 0, NULL, '2019-09-11 07:16:09', 0, ''),
(113, 'K111091906', 1, '2019-09-11 08:34:16', 0, NULL, '2019-09-11 08:34:16', 0, ''),
(114, 'K113091906', 1, '2019-09-13 09:14:39', 0, NULL, '2019-09-13 09:14:39', 0, ''),
(115, 'K113091906', 1, '2019-09-13 09:30:58', 0, NULL, '2019-09-13 09:30:58', 0, ''),
(116, 'K113091906', 1, '2019-09-13 09:45:23', 0, NULL, '2019-09-13 09:45:23', 0, ''),
(117, 'K113091906', 1, '2019-09-13 10:18:23', 0, NULL, '2019-09-13 10:18:23', 0, ''),
(118, 'K113091906', 1, '2019-09-13 10:21:54', 0, NULL, '2019-09-13 10:21:54', 0, ''),
(119, 'K113091906', 1, '2019-09-13 10:33:32', 0, NULL, '2019-09-13 10:33:32', 0, ''),
(120, 'K113091907', 1, '2019-09-13 10:41:25', 0, NULL, '2019-09-13 10:41:25', 0, ''),
(121, 'K113091907', 1, '2019-09-13 10:54:50', 0, NULL, '2019-09-13 10:54:50', 0, ''),
(122, 'K113091907', 1, '2019-09-13 10:56:23', 0, NULL, '2019-09-13 10:56:23', 0, ''),
(123, 'K114091907', 1, '2019-09-14 10:17:15', 0, NULL, '2019-09-14 10:17:15', 0, ''),
(124, 'K114091907', 1, '2019-09-14 10:20:58', 0, NULL, '2019-09-14 10:20:58', 0, ''),
(125, 'K114091907', 1, '2019-09-14 10:32:37', 0, NULL, '2019-09-14 10:32:37', 0, ''),
(126, 'K114091907', 1, '2019-09-14 10:37:08', 0, NULL, '2019-09-14 10:37:08', 0, ''),
(127, 'K114091907', 1, '2019-09-14 10:43:22', 0, NULL, '2019-09-14 10:43:22', 0, ''),
(128, 'K114091907', 1, '2019-09-14 10:48:59', 0, NULL, '2019-09-14 10:48:59', 0, ''),
(129, 'K114091907', 1, '2019-09-14 10:56:44', 0, NULL, '2019-09-14 10:56:44', 0, ''),
(130, 'K114091908', 1, '2019-09-14 11:05:27', 0, NULL, '2019-09-14 11:05:27', 0, ''),
(131, 'K114091908', 1, '2019-09-14 11:14:30', 0, NULL, '2019-09-14 11:14:30', 0, ''),
(132, 'K116091908', 1, '2019-09-16 09:43:39', 0, NULL, '2019-09-16 09:43:39', 0, ''),
(133, 'K116091908', 1, '2019-09-16 09:53:21', 0, NULL, '2019-09-16 09:53:21', 0, ''),
(134, 'K116091908', 1, '2019-09-16 10:09:24', 0, NULL, '2019-09-16 10:09:24', 0, ''),
(135, 'K116091908', 1, '2019-09-16 10:14:13', 0, NULL, '2019-09-16 10:14:13', 0, ''),
(136, 'K116091908', 1, '2019-09-16 10:16:09', 0, NULL, '2019-09-16 10:16:09', 0, ''),
(137, 'K116091908', 1, '2019-09-16 08:38:06', 0, NULL, '2019-09-16 08:38:06', 0, ''),
(138, 'K116091908', 1, '2019-09-16 09:02:45', 0, NULL, '2019-09-16 09:02:45', 0, ''),
(139, 'K116091908', 1, '2019-09-16 09:09:21', 0, NULL, '2019-09-16 09:09:21', 0, ''),
(140, 'K116091909', 1, '2019-09-16 09:45:01', 0, NULL, '2019-09-16 09:45:01', 0, ''),
(141, 'K116091909', 1, '2019-09-16 09:48:02', 0, NULL, '2019-09-16 09:48:02', 0, ''),
(142, 'K117091909', 1, '2019-09-17 12:11:42', 0, NULL, '2019-09-17 12:11:42', 0, ''),
(143, 'K117091909', 1, '2019-09-17 12:13:24', 0, NULL, '2019-09-17 12:13:24', 0, ''),
(144, 'K117091909', 1, '2019-09-17 12:23:40', 0, NULL, '2019-09-17 12:23:40', 0, ''),
(145, 'K117091909', 1, '2019-09-17 12:26:31', 0, NULL, '2019-09-17 12:26:31', 0, ''),
(146, 'K117091909', 1, '2019-09-17 12:38:06', 0, NULL, '2019-09-17 12:38:06', 0, ''),
(147, 'K117091909', 1, '2019-09-17 12:39:51', 0, NULL, '2019-09-17 12:39:51', 0, ''),
(148, 'K117091909', 1, '2019-09-17 12:50:16', 0, NULL, '2019-09-17 12:50:16', 0, ''),
(149, 'K117091909', 1, '2019-09-17 12:53:04', 0, NULL, '2019-09-17 12:53:04', 0, ''),
(150, 'K117091910', 1, '2019-09-17 12:58:32', 0, NULL, '2019-09-17 12:58:32', 0, ''),
(151, 'K118091910', 1, '2019-09-18 08:28:56', 0, NULL, '2019-09-18 08:28:56', 0, ''),
(152, 'K119091910', 1, '2019-09-19 08:38:52', 0, NULL, '2019-09-19 08:38:52', 0, '');

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
(14, 'PANDHU', '2019-08-31 12:41:14', 0, ''),
(15, 'ARJUNA', '2019-08-31 12:41:22', 0, ''),
(16, 'BIMA', '2019-08-31 12:41:31', 0, ''),
(17, 'KRISNA', '2019-08-31 12:41:39', 0, ''),
(18, 'KUNTI', '2019-08-31 12:41:48', 0, ''),
(19, 'SADEWA', '2019-08-31 12:44:11', 0, '');

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
  MODIFY `aws_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `ags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `bungainvestasi`
--
ALTER TABLE `bungainvestasi`
  MODIFY `biv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `jab_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jangkawaktuinvestasi`
--
ALTER TABLE `jangkawaktuinvestasi`
  MODIFY `jwi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `jkl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `kij_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `karyawansimpanan`
--
ALTER TABLE `karyawansimpanan`
  MODIFY `ksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keluargakaryawan`
--
ALTER TABLE `keluargakaryawan`
  MODIFY `kka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `pen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `ssk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setoransimpanan`
--
ALTER TABLE `setoransimpanan`
  MODIFY `ssi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `setoransimpananwajib`
--
ALTER TABLE `setoransimpananwajib`
  MODIFY `ssw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `sip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `simpananwajib`
--
ALTER TABLE `simpananwajib`
  MODIFY `siw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

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
  MODIFY `wil_kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wilayah_karyawan`
--
ALTER TABLE `wilayah_karyawan`
  MODIFY `wik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
