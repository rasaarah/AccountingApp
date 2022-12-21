drop database db_bengkel1;
create database dbbengkel1;
use dbbengkel1;
-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 03:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `dbneraca`
--

-- --------------------------------------------------------

--
-- Table structure for table `labarugi_akhir`
--

CREATE TABLE IF NOT EXISTS `labarugi_akhir` (
  `nomor` int(6) NOT NULL,
  `labarugi_d` int(11) NOT NULL,
  `labarugi_k` int(11) NOT NULL,
  `akhir_d` int(11) NOT NULL,
  `akhir_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labarugi_akhir`
--

INSERT INTO `labarugi_akhir` (`nomor`, `labarugi_d`, `labarugi_k`, `akhir_d`, `akhir_k`) VALUES
(1000, 0, 0, 52350, 0),
(1100, 0, 0, 10000, 0),
(1200, 0, 0, 18200, 0),
(1300, 0, 0, 0, 4576),
(1400, 0, 0, 32400, 0),
(1500, 0, 0, 15500, 0),
(1600, 0, 0, 4000, 0),
(1700, 0, 0, 150, 0),
(1810, 0, 0, 480000, 0),
(1811, 0, 0, 0, 96000),
(1910, 0, 0, 115000, 0),
(1911, 0, 0, 0, 11500),
(1920, 0, 0, 1000000, 0),
(1921, 0, 0, 0, 50000),
(2000, 0, 0, 0, 12050),
(2100, 0, 0, 0, 2000),
(2200, 0, 0, 0, 6000),
(3000, 0, 0, 0, 1363000),
(4000, 0, 457600, 0, 0),
(5000, 20000, 0, 0, 0),
(5100, 24000, 0, 0, 0),
(5200, 4000, 0, 0, 0),
(5300, 4576, 0, 0, 0),
(5400, 96000, 0, 0, 0),
(5500, 11500, 0, 0, 0),
(5600, 50000, 0, 0, 0),
(5700, 63750, 0, 0, 0),
(5800, 25800, 0, 0, 0),
(5900, 6000, 0, 0, 0),
(6000, 0, 500, 0, 0),
(6100, 0, 30000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `nomor` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `klp` varchar(10) NOT NULL,
  `saldo_d` int(11) NOT NULL,
  `saldo_k` int(11) NOT NULL,
  `d_penyesuaian` int(11) NOT NULL,
  `k_penyesuaian` int(11) NOT NULL,
  `NS_disesuaikan_D` int(11) NOT NULL,
  `NS_disesuaikan_K` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`nomor`, `nama`, `jenis`, `klp`, `saldo_d`, `saldo_k`, `d_penyesuaian`, `k_penyesuaian`, `NS_disesuaikan_D`, `NS_disesuaikan_K`) VALUES
(1000, 'KAS', 'Aktiva Lancar', 'Debit', 52350, 0, 0, 0, 52350, 0),
(1100, 'SURAT BERHARGA', 'Aktiva Lancar', 'Debit', 10000, 0, 0, 0, 10000, 0),
(1200, 'PIUTANG DAGANG', 'Aktiva Lancar', 'Debit', 18200, 0, 0, 0, 18200, 0),
(1300, 'CADANGAN PIUTANG DAGANG', 'Aktiva Lancar', 'Kredit', 0, 0, 0, 4576, 0, 4576),
(1400, 'PERLENGKAPAN FOTOGRAFI', 'Aktiva Lancar', 'Debit', 96150, 0, 0, 63750, 32400, 0),
(1500, 'PERLENGKAPAN KANTOR', 'Aktiva Lancar', 'Debit', 41300, 0, 0, 25800, 15500, 0),
(1600, 'BIAYA ASURANSI DIBAYAR DI MUKA', 'Aktiva Lancar', 'Debit', 10000, 0, 0, 6000, 4000, 0),
(1700, 'PIUTANG BUNGA', 'Aktiva Lancar', 'Debit', 0, 0, 150, 0, 150, 0),
(1810, 'PERALATAN FOTOGRAFI', 'Aktiva Tak Lancar', 'Debit', 480000, 0, 0, 0, 480000, 0),
(1811, 'AKUMULASI DEPRESIASI PERALATAN FOTOGRAFI', 'Aktiva Tak Lancar', 'Kredit', 0, 0, 0, 96000, 0, 96000),
(1910, 'PERALATAN KANTOR', 'Aktiva Tak Lancar', 'Debit', 115000, 0, 0, 0, 115000, 0),
(1911, 'AKUMULASI DEPRESIASI PERALATAN KANTOR', 'Aktiva Tak Lancar', 'Kredit', 0, 0, 0, 11500, 0, 11500),
(1920, 'GEDUNG', 'Aktiva Tak Lancar', 'Debit', 1000000, 0, 0, 0, 1000000, 0),
(1921, 'AKUMULASI DEPRESIASI GEDUNG', 'Aktiva Tak Lancar', 'Kredit', 0, 0, 0, 50000, 0, 50000),
(2000, 'HUTANG DAGANG', 'Kewajiban', 'Kredit', 0, 12050, 0, 0, 0, 12050),
(2100, 'HUTANG GAJI', 'Kewajiban', 'Kredit', 0, 0, 0, 2000, 0, 2000),
(2200, 'PENDAPATAN SEWA DI MUKA', 'Kewajiban', 'Kredit', 0, 0, 0, 6000, 0, 6000),
(3000, 'MODAL PEMILIK', 'Modal', 'Kredit', 0, 1363000, 0, 0, 0, 1363000),
(4000, 'PENDAPATAN FOTO STUDIO', 'Pendapatan', 'Kredit', 0, 457600, 0, 0, 0, 457600),
(5000, 'BIAYA LISTRIK', 'Biaya Operasional', 'Debit', 20000, 0, 0, 0, 20000, 0),
(5100, 'GAJI PEGAWAI', 'Biaya Operasional', 'Debit', 22000, 0, 2000, 0, 24000, 0),
(5200, 'BIAYA ADVERTENSI', 'Biaya Operasional', 'Debit', 4000, 0, 0, 0, 4000, 0),
(5300, 'KERUGIAN PIUTANG', 'Biaya Operasional', 'Debit', 0, 0, 4576, 0, 4576, 0),
(5400, 'DEPRESIASI PERALATAN FOTOGRAFI', 'Biaya Operasional', 'Debit', 0, 0, 96000, 0, 96000, 0),
(5500, 'DEPRESIASI PERALATAN KANTOR', 'Biaya Operasional', 'Debit', 0, 0, 11500, 0, 11500, 0),
(5600, 'DEPRESIASI GEDUNG', 'Biaya Operasional', 'Debit', 0, 0, 50000, 0, 50000, 0),
(5700, 'BIAYA PERLENGKAPAN FOTOGRAFI ', 'Biaya Operasional', 'Debit', 0, 0, 63750, 0, 63750, 0),
(5800, 'BIAYA PERLENGKAPAN KANTOR', 'Biaya Operasional', 'Debit', 0, 0, 25800, 0, 25800, 0),
(5900, 'BIAYA ASURANSI', 'Biaya Operasional', 'Debit', 0, 0, 6000, 0, 6000, 0),
(6000, 'PENDAPATAN BUNGA', 'Pendapatan dan Biaya diluar Usaha', 'Kredit', 0, 350, 0, 150, 0, 500),
(6100, 'PENDAPATAN SEWA', 'Pendapatan dan Biaya diluar Usaha', 'Kredit', 0, 36000, 6000, 0, 0, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `subtotal`
--

CREATE TABLE IF NOT EXISTS `subtotal` (
  `id` int(11) NOT NULL,
  `st_debit_labarugi` int(11) NOT NULL,
  `st_kredit_labarugi` int(11) NOT NULL,
  `st_debit_akhir` int(11) NOT NULL,
  `st_kredit_akhir` int(11) NOT NULL,
  `hasil_bersih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtotal`
--

INSERT INTO `subtotal` (`id`, `st_debit_labarugi`, `st_kredit_labarugi`, `st_debit_akhir`, `st_kredit_akhir`, `hasil_bersih`) VALUES
(1, 0, 0, 0, 0, 182474);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labarugi_akhir`
--
ALTER TABLE `labarugi_akhir`
 ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
 ADD PRIMARY KEY (`nomor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
