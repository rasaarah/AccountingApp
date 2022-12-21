drop database db_bengkel;
create database db_bengkel;
use  db_bengkel;
-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 08. Juni 2015 jam 18:07
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `labarugi_akhir`
--

CREATE TABLE IF NOT EXISTS `labarugi_akhir` (
  `nomor` int(6) NOT NULL,
  `labarugi_d` int(11) NOT NULL,
  `labarugi_k` int(11) NOT NULL,
  `akhir_d` int(11) NOT NULL,
  `akhir_k` int(11) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `labarugi_akhir`
--

INSERT INTO `labarugi_akhir` (`nomor`, `labarugi_d`, `labarugi_k`, `akhir_d`, `akhir_k`) VALUES
(1000, 0, 0, 72500, 0),
(1100, 0, 0, 15000, 0),
(1200, 0, 0, 13000, 0),
(1300, 0, 0, 0, 5680),
(1400, 0, 0, 55000, 0),
(1500, 0, 0, 750, 0),
(1600, 0, 0, 4000, 0),
(1700, 0, 0, 150, 0),
(1810, 0, 0, 420000, 0),
(1811, 0, 0, 0, 89000),
(1910, 0, 0, 115000, 0),
(1911, 0, 0, 0, 12500),
(1920, 0, 0, 1100000, 0),
(1921, 0, 0, 0, 55000),
(2000, 0, 0, 0, 16400),
(2100, 0, 0, 0, 4000),
(2200, 0, 0, 0, 6000),
(3000, 0, 0, 0, 1480000),
(4000, 0, 406050, 0, 0),
(5000, 15000, 0, 0, 0),
(5100, 29000, 0, 0, 0),
(5200, 2000, 0, 0, 0),
(5300, 5680, 0, 0, 0),
(5400, 89000, 0, 0, 0),
(5500, 12500, 0, 0, 0),
(5600, 55000, 0, 0, 0),
(5700, 65350, 0, 0, 0),
(5800, 32200, 0, 0, 0),
(5900, 8000, 0, 0, 0),
(6000, 0, 500, 0, 0),
(6100, 0, 34000, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
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
  `NS_disesuaikan_K` int(11) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`nomor`, `nama`, `jenis`, `klp`, `saldo_d`, `saldo_k`, `d_penyesuaian`, `k_penyesuaian`, `NS_disesuaikan_D`, `NS_disesuaikan_K`) VALUES
(1000, 'KAS', 'Aktiva Lancar', 'Debit', 72500, 0, 0, 0, 72500, 0),
(1100, 'SURAT BERHARGA', 'Aktiva Lancar', 'Debit', 15000, 0, 0, 0, 15000, 0),
(1200, 'PIUTANG DAGANG', 'Aktiva Lancar', 'Debit', 13000, 0, 0, 0, 13000, 0),
(1300, 'CADANGAN PIUTANG DAGANG', 'Aktiva Lancar', 'Kredit', 0, 0, 0, 5680, 0, 5680),
(1400, 'PERLENGKAPAN BENGKEL', 'Aktiva Lancar', 'Debit', 120300, 0, 0, 65300, 55000, 0),
(1500, 'PERLENGKAPAN KANTOR', 'Aktiva Lancar', 'Debit', 35000, 0, 0, 34250, 750, 0),
(1600, 'BIAYA ASURANSI DIBAYAR DI MUKA', 'Aktiva Lancar', 'Debit', 10000, 0, 0, 6000, 4000, 0),
(1700, 'PIUTANG BUNGA', 'Aktiva Lancar', 'Debit', 0, 0, 150, 0, 150, 0),
(1810, 'PERALATAN BENGKEL', 'Aktiva Tak Lancar', 'Debit', 420000, 0, 0, 0, 420000, 0),
(1811, 'AKUMULASI DEPRESIASI PERALATAN FOTOGRAFI', 'Aktiva Tak Lancar', 'Kredit', 0, 0, 0, 89000, 0, 89000),
(1910, 'PERALATAN KANTOR', 'Aktiva Tak Lancar', 'Debit', 115000, 0, 0, 0, 115000, 0),
(1911, 'AKUMULASI DEPRESIASI PERALATAN KANTOR', 'Aktiva Tak Lancar', 'Kredit', 0, 0, 0, 12500, 0, 12500),
(1920, 'GEDUNG', 'Aktiva Tak Lancar', 'Debit', 1100000, 0, 0, 0, 1100000, 0),
(1921, 'AKUMULASI DEPRESIASI GEDUNG', 'Aktiva Tak Lancar', 'Kredit', 0, 0, 0, 55000, 0, 55000),
(2000, 'HUTANG DAGANG', 'Kewajiban', 'Kredit', 0, 16400, 0, 0, 0, 16400),
(2100, 'HUTANG GAJI', 'Kewajiban', 'Kredit', 0, 0, 0, 4000, 0, 4000),
(2200, 'PENDAPATAN SEWA DI MUKA', 'Kewajiban', 'Kredit', 0, 0, 0, 6000, 0, 6000),
(3000, 'MODAL FKKS', 'Modal', 'Kredit', 0, 1480000, 0, 0, 0, 1480000),
(4000, 'PENDAPATAN BENGKEL', 'Pendapatan', 'Kredit', 0, 406050, 0, 0, 0, 406050),
(5000, 'BIAYA LISTRIK', 'Biaya Operasional', 'Debit', 15000, 0, 0, 0, 15000, 0),
(5100, 'GAJI PEGAWAI', 'Biaya Operasional', 'Debit', 25000, 0, 4000, 0, 29000, 0),
(5200, 'BIAYA ADVERTENSI', 'Biaya Operasional', 'Debit', 2000, 0, 0, 0, 2000, 0),
(5300, 'KERUGIAN PIUTANG', 'Biaya Operasional', 'Debit', 0, 0, 5680, 0, 5680, 0),
(5400, 'DEPRESIASI PERALATAN BENGKEL', 'Biaya Operasional', 'Debit', 0, 0, 89000, 0, 89000, 0),
(5500, 'DEPRESIASI PERALATAN KANTOR', 'Biaya Operasional', 'Debit', 0, 0, 12500, 0, 12500, 0),
(5600, 'DEPRESIASI GEDUNG', 'Biaya Operasional', 'Debit', 0, 0, 55000, 0, 55000, 0),
(5700, 'BIAYA PERLENGKAPAN BENGKEL', 'Biaya Operasional', 'Debit', 0, 0, 65350, 0, 65350, 0),
(5800, 'BIAYA PERLENGKAPAN KANTOR', 'Biaya Operasional', 'Debit', 0, 0, 32200, 0, 32200, 0),
(5900, 'BIAYA ASURANSI', 'Biaya Operasional', 'Debit', 0, 0, 8000, 0, 8000, 0),
(6000, 'PENDAPATAN BUNGA', 'Pendapatan dan Biaya diluar Usaha', 'Kredit', 0, 350, 0, 150, 0, 500),
(6100, 'PENDAPATAN SEWA', 'Pendapatan dan Biaya diluar Usaha', 'Kredit', 0, 40000, 6000, 0, 0, 34000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subtotal`
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
-- Dumping data untuk tabel `subtotal`
--

INSERT INTO `subtotal` (`id`, `st_debit_labarugi`, `st_kredit_labarugi`, `st_debit_akhir`, `st_kredit_akhir`, `hasil_bersih`) VALUES
(1, 0, 0, 0, 0, 126820);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
