-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 06:07 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

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
  `aws_noid` varchar(30) NOT NULL,
  `aws_jenisid` varchar(15) NOT NULL,
  `aws_nama` varchar(50) NOT NULL,
  `aws_alamat` text NOT NULL,
  `aws_hubungan` varchar(30) NOT NULL,
  `aws_lampiran` text NOT NULL,
  `aws_tgl` datetime NOT NULL,
  `aws_flag` tinyint(2) NOT NULL,
  `aws_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ang_no` varchar(10) NOT NULL,
  `ang_nama` varchar(50) NOT NULL,
  `ang_alamat` text NOT NULL,
  `ang_noktp` varchar(25) NOT NULL,
  `ang_nokk` varchar(25) DEFAULT NULL,
  `ang_nohp` varchar(15) NOT NULL,
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
('A1', 'Tukiman', 'Magelang', '03992990020', '0300939390', '0859398299', '2019-05-07', 0, '2019-05-07 18:51:05', 0, ''),
('AA11', 'Paijo', 'Magelang', '23455235', '4444', '908999', '2019-04-24', 0, '2019-04-20 09:15:41', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `ags_id` int(11) NOT NULL,
  `pin_id` varchar(25) NOT NULL COMMENT 'fk dari pinjaman',
  `ang_angsuranke` int(3) NOT NULL,
  `ags_tgljatuhtempo` date NOT NULL,
  `ags_tglbayar` datetime NOT NULL,
  `ags_jmlpokok` float NOT NULL DEFAULT '0',
  `ags_jmlbunga` float NOT NULL DEFAULT '0',
  `ags_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:belumbayar 1:bayar 2:denda',
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
(1, 0.05, '2019-04-19 19:28:44', 0, '');

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
(4, 0.02, '2019-04-20 05:24:43', 0, '');

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
  `ivb_tglpendaftaran` datetime NOT NULL,
  `ivb_tglperpanjangan` datetime NOT NULL,
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
  `jab_kode` varchar(15) NOT NULL,
  `jab_nama` varchar(50) NOT NULL,
  `jab_tgl` datetime NOT NULL,
  `jab_flag` tinyint(2) NOT NULL,
  `jab_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE `jaminan` (
  `jam_id` int(11) NOT NULL,
  `pin_id` int(11) NOT NULL COMMENT 'fk dari pinjaman',
  `jej_id` tinyint(3) NOT NULL COMMENT 'fk dari jenisjaminan',
  `jam_nomor` varchar(30) NOT NULL,
  `jam_keterangan` text,
  `jam_file` text,
  `jam_tgl` datetime NOT NULL,
  `jam_flag` tinyint(2) NOT NULL,
  `jam_info` text NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `jenisjaminan`
--

CREATE TABLE `jenisjaminan` (
  `jej_id` tinyint(3) NOT NULL,
  `jej_jaminan` varchar(25) NOT NULL,
  `jej_keterangan` text,
  `jej_tgl` datetime NOT NULL,
  `jej_flag` tinyint(2) NOT NULL,
  `jej_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `jenispelunasan`
--

CREATE TABLE `jenispelunasan` (
  `jep_id` tinyint(2) NOT NULL,
  `jep_jenis` varchar(25) NOT NULL,
  `jep_keterangan` text,
  `jep_tgl` datetime NOT NULL,
  `jep_flag` tinyint(2) NOT NULL,
  `jep_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `jenissetoran`
--

CREATE TABLE `jenissetoran` (
  `jse_id` int(11) NOT NULL,
  `jse_setoran` varchar(25) NOT NULL,
  `jse_keterangan` text,
  `jse_min` float NOT NULL,
  `jse_tgl` datetime NOT NULL,
  `jse_flag` tinyint(2) NOT NULL,
  `jse_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissetoran`
--

INSERT INTO `jenissetoran` (`jse_id`, `jse_setoran`, `jse_keterangan`, `jse_min`, `jse_tgl`, `jse_flag`, `jse_info`) VALUES
(1, 'Harian', 'setoran harian', 20000, '2019-04-19 19:06:22', 1, ''),
(2, 'Mingguan', 'Setoran Mingguan', 50000, '2019-04-19 19:06:37', 1, ''),
(3, 'Bulanan', 'Setoran bulanan', 100000, '2019-04-19 19:06:49', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenissimpanan`
--

CREATE TABLE `jenissimpanan` (
  `jsi_id` int(11) NOT NULL,
  `jsi_simpanan` varchar(25) NOT NULL,
  `jsi_keterangan` text,
  `jsi_tgl` datetime NOT NULL,
  `jsi_flag` tinyint(2) NOT NULL,
  `jsi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissimpanan`
--

INSERT INTO `jenissimpanan` (`jsi_id`, `jsi_simpanan`, `jsi_keterangan`, `jsi_tgl`, `jsi_flag`, `jsi_info`) VALUES
(1, 'Simpanan Jangka 9 bulan', 'Simpanan jangka 9 bulan', '2019-04-19 19:08:30', 0, ''),
(2, 'Simpanan Jangka 12 Bulan', 'Simpanan Jangka 12 Bulan', '2019-04-19 19:08:46', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kar_kode` varchar(10) NOT NULL,
  `kar_nama` varchar(50) NOT NULL,
  `jab_kode` varchar(15) NOT NULL COMMENT 'fk dari jabatan',
  `kar_alamat` text NOT NULL,
  `kar_nohp` varchar(15) NOT NULL,
  `kar_tgl` datetime NOT NULL,
  `kar_flag` tinyint(2) NOT NULL,
  `kar_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ksi_jmlklaim` float NOT NULL,
  `ksi_jmltunggakan` float NOT NULL,
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
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_access`
--

INSERT INTO `master_access` (`id`, `nm_access`, `note`, `created_at`, `created_by`) VALUES
(1, 'M_USER', 'MENU USER', '0000-00-00 00:00:00', 0),
(5, 'M_LAPORAN', 'MENU LAPORAN', NULL, NULL),
(6, 'M_SISTEM', 'MENU SISTEM', NULL, NULL);

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
-- Table structure for table `pelunasan`
--

CREATE TABLE `pelunasan` (
  `pel_id` int(11) NOT NULL,
  `jep_id` tinyint(2) NOT NULL COMMENT 'fk dari jenispelunasan',
  `pin_id` varchar(25) NOT NULL COMMENT 'fk dari pinjaman',
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
  `pns_jmlsimkesan` float NOT NULL,
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
  `pes_jumlah` float NOT NULL,
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
  `pen_noktp` varchar(30) NOT NULL,
  `pen_nama` varchar(50) NOT NULL,
  `pen_alamat` text NOT NULL,
  `pen_nohp` varchar(15) NOT NULL,
  `pen_tgl` datetime NOT NULL,
  `pen_flag` tinyint(2) NOT NULL,
  `pen_info` text NOT NULL
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
  `skp_id` int(10) NOT NULL COMMENT 'fk dari settingkategoripeminjam',
  `pen_id` int(10) NOT NULL COMMENT 'fk dari penjamin',
  `pin_pengajuan` float NOT NULL,
  `pin_pinjaman` float NOT NULL,
  `pin_tglpengajuan` datetime NOT NULL,
  `pin_tglpencairan` datetime NOT NULL,
  `pin_marketing` varchar(20) NOT NULL,
  `pin_surveyor` varchar(20) NOT NULL,
  `pin_survey` varchar(20) NOT NULL,
  `pin_statuspinjaman` varchar(20) NOT NULL,
  `pin_tgl` datetime NOT NULL,
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
(2, 'Plan B', 75000, 'Plan B', '2019-05-08 14:47:23', 0, '');

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
  `ssi_jmlbunga` float NOT NULL,
  `ssi_tgl` datetime NOT NULL,
  `ssi_flag` tinyint(2) NOT NULL,
  `ssi_info` text NOT NULL
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
(1, 'Simpanan Wajib', 20000, 100000, '2019-04-20 05:20:42', 1, '');

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
  `sik_tglberakhir` datetime NOT NULL,
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
  `sim_status` varchar(20) NOT NULL,
  `sim_tgl` datetime NOT NULL,
  `sim_flag` tinyint(2) NOT NULL,
  `sim_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simpananpokok`
--

CREATE TABLE `simpananpokok` (
  `sip_id` int(10) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `ses_id` int(11) NOT NULL COMMENT 'fk dari settingsimpanan',
  `sip_tglbayar` datetime NOT NULL,
  `sip_tgl` datetime NOT NULL,
  `sip_flag` tinyint(2) NOT NULL,
  `sip_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpananpokok`
--

INSERT INTO `simpananpokok` (`sip_id`, `ang_no`, `ses_id`, `sip_tglbayar`, `sip_tgl`, `sip_flag`, `sip_info`) VALUES
(1, 'AA11', 1, '2019-05-07 00:00:00', '2019-05-08 08:23:40', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `simpananwajib`
--

CREATE TABLE `simpananwajib` (
  `siw_id` int(10) NOT NULL,
  `ang_no` varchar(10) NOT NULL COMMENT 'fk dari anggota',
  `ses_id` int(11) NOT NULL COMMENT 'fk dari settingsimpanan',
  `siw_tglbayar` datetime NOT NULL,
  `siw_status` tinyint(1) NOT NULL COMMENT '0:baru 1:diambil 2:hangus',
  `siw_tglambil` datetime NOT NULL,
  `siw_tgl` datetime NOT NULL,
  `siw_flag` tinyint(2) NOT NULL,
  `siw_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `sik_kode` int(11) NOT NULL COMMENT 'fk dr simkesan',
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
  `note_1` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `username`, `password`, `email`, `id_group`, `foto`, `telp`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`, `note_1`) VALUES
(1, 'Admin KSP Sido Mukti', 'dev', '033aca88b54053cf0ed7a641e27f9773', 'dev@email.com', 1, '', '085643242654', 'full akses', 1, 1, '2018-03-13 03:06:55', '2019-01-28 09:26:16', ''),
(2, 'agung widhiatmojo', 'dev', '827ccb0eea8a706c4c34a16891f84e7b', 'agung.widhiatmojo@gmail.com', 2, NULL, '085700085838', 'dfg', 1, 1, '2019-04-20 10:01:30', '2019-04-21 06:22:45', '');

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
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `id_group`, `kd_access`, `nm_access`, `is_allow`, `note`) VALUES
(8, 1, '1', NULL, 1, NULL),
(13, 1, '2', NULL, 1, NULL),
(14, 1, '3', NULL, 1, NULL),
(15, 1, '4', NULL, 1, NULL),
(16, 1, '5', NULL, 1, NULL),
(17, 1, '6', NULL, 1, NULL),
(18, 2, '6', NULL, 1, NULL),
(19, 2, '5', NULL, 0, NULL),
(20, 2, '1', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `note` text,
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
(2, 'kasir', 'kasir', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `wil_kode` varchar(10) NOT NULL,
  `wil_nama` varchar(50) NOT NULL,
  `wil_tgl` datetime NOT NULL,
  `wil_flag` tinyint(2) NOT NULL,
  `wil_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`wil_kode`, `wil_nama`, `wil_tgl`, `wil_flag`, `wil_info`) VALUES
('bunga', 'Bunga', '2019-05-08 14:53:46', 1, ''),
('Citra', 'Citra', '2019-05-08 14:54:00', 0, '');

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
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kar_kode`);

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
-- Indexes for table `simkesan`
--
ALTER TABLE `simkesan`
  ADD PRIMARY KEY (`sik_kode`);

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
  MODIFY `aws_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `ags_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bungainvestasi`
--
ALTER TABLE `bungainvestasi`
  MODIFY `biv_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bungapinjaman`
--
ALTER TABLE `bungapinjaman`
  MODIFY `bup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jangkawaktuinvestasi`
--
ALTER TABLE `jangkawaktuinvestasi`
  MODIFY `jwi_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasainvestasi`
--
ALTER TABLE `jasainvestasi`
  MODIFY `jiv_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenisjaminan`
--
ALTER TABLE `jenisjaminan`
  MODIFY `jej_id` tinyint(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenisklaim`
--
ALTER TABLE `jenisklaim`
  MODIFY `jkl_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenispelunasan`
--
ALTER TABLE `jenispelunasan`
  MODIFY `jep_id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenispenarikansimkesan`
--
ALTER TABLE `jenispenarikansimkesan`
  MODIFY `jps_id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `pelunasan`
--
ALTER TABLE `pelunasan`
  MODIFY `pel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penarikaninvestasiberjangka`
--
ALTER TABLE `penarikaninvestasiberjangka`
  MODIFY `pib_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penarikansimpanan`
--
ALTER TABLE `penarikansimpanan`
  MODIFY `pes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penarikansimpananwajib`
--
ALTER TABLE `penarikansimpananwajib`
  MODIFY `psw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjamin`
--
ALTER TABLE `penjamin`
  MODIFY `pen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plansimkesan`
--
ALTER TABLE `plansimkesan`
  MODIFY `psk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potonganprovisi`
--
ALTER TABLE `potonganprovisi`
  MODIFY `pop_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setoransimkesan`
--
ALTER TABLE `setoransimkesan`
  MODIFY `ssk_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setoransimpanan`
--
ALTER TABLE `setoransimpanan`
  MODIFY `ssi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settingangsuran`
--
ALTER TABLE `settingangsuran`
  MODIFY `sea_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settingdenda`
--
ALTER TABLE `settingdenda`
  MODIFY `sed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settingkategoripeminjam`
--
ALTER TABLE `settingkategoripeminjam`
  MODIFY `skp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settingsimpanan`
--
ALTER TABLE `settingsimpanan`
  MODIFY `ses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingstatuspeminjam`
--
ALTER TABLE `settingstatuspeminjam`
  MODIFY `ssp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simpananpokok`
--
ALTER TABLE `simpananpokok`
  MODIFY `sip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simpananwajib`
--
ALTER TABLE `simpananwajib`
  MODIFY `siw_id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `tts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutupinvestasiberjangka`
--
ALTER TABLE `tutupinvestasiberjangka`
  MODIFY `tib_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wilayah_karyawan`
--
ALTER TABLE `wilayah_karyawan`
  MODIFY `wik_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
