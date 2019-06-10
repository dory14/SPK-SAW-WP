-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2016 pada 17.30
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_normalisasi`
--

CREATE TABLE IF NOT EXISTS `tbl_normalisasi` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `nilai1` double NOT NULL,
  `nilai2` double NOT NULL,
  `nilai3` double NOT NULL,
  `nilai4` double NOT NULL,
  `nilai5` double NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_normalisasi`
--

INSERT INTO `tbl_normalisasi` (`id_karyawan`, `nama_karyawan`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`) VALUES
('201601', 'achmad', 50, 50, 50, 50, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`) VALUES
('admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
