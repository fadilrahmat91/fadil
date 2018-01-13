-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2018 at 05:00 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko_fadil`
--
CREATE DATABASE IF NOT EXISTS `toko_fadil` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `toko_fadil`;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(33) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `ukuran` varchar(33) NOT NULL,
  `merek` varchar(33) NOT NULL,
  `gambar` varchar(33) NOT NULL,
  `deskripsi` longtext NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `ukuran`, `merek`, `gambar`, `deskripsi`) VALUES
(16, 0, 'koko', 0, 'vn', 'samsung', '', 'yh'),
(17, 0, 'afa', 0, 'faq', 'ewwf', '', 'fqf'),
(18, 0, 'telaaa', 0, 'fa', 'fas', '', 'saf'),
(19, 0, 'df', 3000000, 'faq', 'a', '', 'af'),
(24, 0, 'nvnv', 0, ',mn', 'nn,m', '', 'nmm,,m'),
(25, 0, 'youo', 90909, '76', 'mn', '', 'nmn'),
(26, 0, 'tv', 30000000, '40x20', 'Panasonic', '', 'pendingin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `username` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`) VALUES
('fadil', 'af2a4c9d4c4956ec9d6ba62213eed568'),
('fadil', 'rahmat');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
