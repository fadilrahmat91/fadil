-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2015 at 10:52 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penjualan_barang`
--
CREATE DATABASE IF NOT EXISTS `penjualan_barang` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `penjualan_barang`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(333) NOT NULL,
  `password` varchar(333) NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `status`, `level`) VALUES
(1, 'fadil', 'rahmat', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `id_barang` int(6) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(222) NOT NULL,
  `harga_barang` varchar(222) NOT NULL,
  `tgl_barang_masuk` date NOT NULL,
  `stok_barang` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga_barang`, `tgl_barang_masuk`, `stok_barang`) VALUES
(1, 'TONGSIS BLUETOOTH', '60.000', '2015-11-03', -1),
(2, 'TONGSIS KABEL ', '40.000', '2015-11-07', 1),
(3, 'TONGSIS BIASA (TIMER)', '30.000', '2015-11-05', 1),
(4, 'H/F BLUETOOTH BESAR', '170.000', '2015-11-07', 1),
(5, 'HEADSET BIASA', '17.000', '2015-11-07', 2),
(6, 'HEADSET SAMBUNG ', '25.000', '2015-11-05', 4),
(7, 'SPEAKER BLUETOOTH', '75.000', '2015-11-07', 1),
(8, 'FISH EYE', '32.000', '2015-11-03', -3),
(9, 'USB PARFUME+LAMP', '19.000', '2015-11-07', 1),
(10, 'USB HIGH SPEED(SAMSUNG)', '25.000', '2015-11-07', 1),
(11, 'POWERBANK CYK 8000MAH', '65.000', '2015-11-03', 0),
(12, 'POWERBANK 4000MAH (CYK/SAMSUNG)', '30.000', '2015-11-03', -5),
(13, 'POWERBANK 6000MAH(HUAWEI)', '75.000', '2015-11-06', 0),
(14, 'HEADSET + PENGAIT SONY', '25.000', '2015-11-06', -1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsumen`
--

CREATE TABLE IF NOT EXISTS `tbl_konsumen` (
  `id_konsumen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(222) NOT NULL,
  `telp_konsumen` varchar(22) NOT NULL,
  `alamat_konsumen` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_member` varchar(222) NOT NULL,
  PRIMARY KEY (`id_konsumen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id_konsumen`, `nama_konsumen`, `telp_konsumen`, `alamat_konsumen`, `waktu`, `id_member`) VALUES
(1, 'PARNO GULTOM', '082370706476', 'JL.JAMIN GINTING ', '2015-11-07 09:01:44', 'MEMBER0001'),
(2, 'RINA KARO', '0614528611', 'ARTECHELECTRONICS CAMBRIDGE CITY SQUARE LEVEL 1- 05 MEDAN', '2015-11-07 09:12:50', 'MEMBER0002'),
(3, 'SORA', '0614528611', 'ARTECHELECTRONICS CAMBRIDGE CITY SQUARE LEVEL 1- 05 MEDAN', '2015-11-07 09:14:32', 'MEMBER0003'),
(4, 'SAM', '085XXXX', 'TESTING', '2015-11-07 09:42:10', 'MEMBER0004'),
(5, 'LIDYA', '-', 'ARTECH CAMBRIDGE', '2015-11-09 08:49:04', 'MEMBER0005'),
(6, 'RIBKA SIMANUNGKALIT', '082255922260', 'TARUTUNG\r\n- Diambil di loket Tarutung', '2015-11-10 07:21:44', 'MEMBER0006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pencapaian`
--

CREATE TABLE IF NOT EXISTS `tbl_pencapaian` (
  `target_pencapaian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pencapaian`
--

INSERT INTO `tbl_pencapaian` (`target_pencapaian`) VALUES
('1250000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(333) NOT NULL,
  `tanggal_terjual` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah_terjual` int(11) NOT NULL,
  `id_member` varchar(333) NOT NULL,
  `harga_satuan` varchar(333) NOT NULL,
  `penjualan_uniq` varchar(333) NOT NULL,
  `memo` text NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `nama_barang`, `tanggal_terjual`, `jumlah_terjual`, `id_member`, `harga_satuan`, `penjualan_uniq`, `memo`) VALUES
(1, 'TONGSIS BLUETOOTH', '2015-11-07 09:38:56', 1, 'MEMBER0002', '60000', '151107043856', 'Bayar gajian/Not Cash'),
(2, 'HEADSET + PENGAIT SONY', '2015-11-07 09:40:19', 1, 'MEMBER0001', '25000', '151107044019', ''),
(3, 'POWERBANK 6000MAH(HUAWEI)', '2015-11-07 09:40:19', 1, 'MEMBER0001', '75000', '151107044019', ''),
(4, 'POWERBANK CYK 8000MAH', '2015-11-07 09:41:00', 1, 'MEMBER0003', '65000', '151107044100', ''),
(5, 'POWERBANK 4000MAH (CYK/SAMSUNG)', '2015-11-07 09:43:06', 3, 'MEMBER0004', '30000', '151107044306', ''),
(6, 'FISH EYE', '2015-11-07 09:43:06', 2, 'MEMBER0004', '32000', '151107044306', ''),
(7, 'FISH EYE', '2015-11-09 08:46:54', 1, 'MEMBER0003', '28000', '151109034654', 'cash'),
(8, 'POWERBANK CYK 8000MAH', '2015-11-09 08:49:35', 1, 'MEMBER0005', '65000', '151109034935', 'BESOK BAYAR '),
(9, 'POWERBANK 10400MAH', '2015-11-10 07:24:55', 2, 'MEMBER0006', '105000', '151110022455', 'Transfer Bank 270.000'),
(10, 'SD Card 8GB', '2015-11-10 07:24:55', 1, 'MEMBER0006', '45000', '151110022455', 'Transfer Bank 270.000'),
(11, 'Ongkir', '2015-11-10 07:24:55', 1, 'MEMBER0006', '20000', '151110022455', 'Transfer Bank 270.000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
