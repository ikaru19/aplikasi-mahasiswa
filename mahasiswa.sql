-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Sep 2015 pada 16.25
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE IF NOT EXISTS `data_siswa` (
  `nim` varchar(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jk` varchar(9) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hp` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nim`, `nama_siswa`, `jk`, `foto`, `jurusan`, `tmp_lahir`, `tgl_lahir`, `alamat`, `nama_ibu`, `email`, `hp`) VALUES
('RPM0000001', 'Rina Febriani', 'Perempuan', '12.jpg', 'T-Mesin', 'Cilacap', '1986-02-18', 'Cilacap', 'Febriana', 'febriani86@gmail.com', '089812113344'),
('RPM0000002', 'Putri Nawangsari', 'Perempuan', '11.jpg', 'T-Informatika', 'Banyumas', '1987-12-22', 'Desa Uripharjo Kec. Senggol Kab. Banyumas', 'Nawangsari', 'nawangsari@gmail.com', '081200001100'),
('RPM0000003', 'Revalina', 'Perempuan', '1.jpg', 'T-Mesin', 'Bandung', '1987-06-14', 'Jl. Bandung Raya II No. 453', 'Stevany N', 'revalina@yahoo.com', '085600112221');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `nama`, `password`, `hak_akses`) VALUES
('admin', 'Ratna Sandra Dewi', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `guru_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `guru_mapel`) VALUES
('MAPEL00001', 'Troubleshoot Komputer', ''),
('MAPEL00002', 'Sistem Informasi', ''),
('MAPEL00003', 'Pemrograman Internet', ''),
('MAPEL00004', 'Algoritma Pemrograman', ''),
('MAPEL00005', 'Bahasa Rakitan', ''),
('MAPEL00006', 'Sistem Keamanan Komputer', ''),
('MAPEL00007', 'Borland Delphi', ''),
('MAPEL00008', 'Visual Basic', ''),
('MAPEL00009', 'Arsitektur Komputer', ''),
('MAPEL00010', 'Pemrograman Terstruktur', ''),
('MAPEL00011', 'Kewirausahaan', 'Dela Monica, SE'),
('MAPEL00012', 'Etika Usaha', 'Parasian, MM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` varchar(8) NOT NULL,
  `nim_siswa` varchar(10) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `nilai_mapel` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim_siswa`, `mapel`, `nilai_mapel`) VALUES
('N-000001', 'RPM0000001', 'Sistem Keamanan Komputer', 6),
('N-000002', 'RPM0000001', 'Sistem Informasi', 7),
('N-000003', 'RPM0000002', 'Pemrograman Internet', 8),
('N-000004', 'RPM0000001', 'Arsitektur Komputer', 5),
('N-000005', 'RPM0000002', 'Troubleshoot Komputer', 6),
('N-000006', 'RPM0000003', 'Troubleshoot Komputer', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
 ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
 ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
