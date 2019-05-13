-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Mei 2019 pada 06.37
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kearsipan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `koderak`
--

CREATE TABLE `koderak` (
  `id_rak` int(11) NOT NULL,
  `id_terdakwa` int(11) NOT NULL,
  `koderak` varchar(255) NOT NULL,
  `tgl_perkara` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koderak`
--

INSERT INTO `koderak` (`id_rak`, `id_terdakwa`, `koderak`, `tgl_perkara`) VALUES
(1, 2, '12co2', '2017-06-14'),
(2, 3, '12sa3', '2017-06-23'),
(3, 4, '12ca4', '2017-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saksi`
--

CREATE TABLE `saksi` (
  `id_saksi` int(11) NOT NULL,
  `id_terdakwa` int(11) NOT NULL,
  `saksi_saksi` mediumtext NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saksi`
--

INSERT INTO `saksi` (`id_saksi`, `id_terdakwa`, `saksi_saksi`, `tgl_input`) VALUES
(1, 1, 'Sample saksi', '2017-06-14'),
(2, 2, 'Saksi sample', '2017-06-14'),
(3, 3, 'saksi 1 ddsds\r\nsaksi 2 cece', '2017-06-23'),
(4, 4, '1. Aldo Tangerang\r\n2. Wonas Pasaribu\r\n3. Polut Sitampar', '2017-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terdakwa`
--

CREATE TABLE `terdakwa` (
  `id_terdakwa` int(11) NOT NULL,
  `noper` varchar(50) NOT NULL,
  `noput` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` char(2) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `ttl` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kebangsaan` varchar(50) NOT NULL,
  `tempating` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `u_pn` varchar(255) NOT NULL,
  `u_pt` varchar(255) NOT NULL,
  `u_ma` varchar(255) NOT NULL,
  `u_puter` varchar(255) NOT NULL,
  `tgl_insert` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `terdakwa`
--

INSERT INTO `terdakwa` (`id_terdakwa`, `noper`, `noput`, `nama`, `umur`, `tempat`, `ttl`, `jk`, `kebangsaan`, `tempating`, `agama`, `pekerjaan`, `u_pn`, `u_pt`, `u_ma`, `u_puter`, `tgl_insert`) VALUES
(1, '101ptn22', '102ptn33', 'Contoh data', '21', 'Ranoyapo', '06 Februari 1996', 'Laki-laki', 'Indoneisa', 'Sasaaran', 'Kristen', 'Petani', 'KIsi-kisi -KKPI-1.pdf', 'KIsi-kisi -KKPI-1.pdf', 'KIsi-kisi -KKPI-1.pdf', '', '2017-06-14'),
(2, '101ptn22', '102ptn33', 'Contoh data', '21', 'Ranoyapo', '06 Februari 1996', 'Laki-laki', 'Indoneisa', 'Sasaaran', 'Kristen Katolik', 'Petani', 'http://localhost/e-arsip/', 'https://www.w3schools.com/php/filter_validate_url.asp', 'https://www.w3schools.com/php/php_form_url_email.asp', 'http://localhost/e-arsip/admin/edit_arsip.php', '2017-06-14'),
(3, '1022ptb', '1033ptn', 'Sample Human', '22', 'Papakelan', '07 Februari 2017', 'Laki-laki', 'Indonesia', 'Papakelan', 'Kristen Katolik', 'Petani', 'https://www.w3schools.com/php/filter_validate_url.asp', 'https://www.w3schools.com/php/php_form_url_email.asp', 'http://localhost/e-arsip/', 'https://www.w3schools.com/php/php_form_url_email.asp', '2017-06-23'),
(4, '1044ptb', '1043ptn', 'Canon Pixma', '33', 'Selayar', '08 Januari 1996', 'Laki-laki', 'Indonesia', 'Selayar Panjang', 'Kristen', 'Petani', 'S1 RPP PBO .pdf', 'S1 RPP PBO .pdf', 'S1 RPP PBO .pdf', 'S1 RPP PBO .pdf', '2017-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin12345', 'super'),
(2, 'user', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `koderak`
--
ALTER TABLE `koderak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `saksi`
--
ALTER TABLE `saksi`
  ADD PRIMARY KEY (`id_saksi`);

--
-- Indexes for table `terdakwa`
--
ALTER TABLE `terdakwa`
  ADD PRIMARY KEY (`id_terdakwa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `koderak`
--
ALTER TABLE `koderak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `saksi`
--
ALTER TABLE `saksi`
  MODIFY `id_saksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `terdakwa`
--
ALTER TABLE `terdakwa`
  MODIFY `id_terdakwa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
