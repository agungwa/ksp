-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 04:19 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kantorksp`
--
ALTER TABLE `kantorksp`
  ADD PRIMARY KEY (`kks_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kantorksp`
--
ALTER TABLE `kantorksp`
  MODIFY `kks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
