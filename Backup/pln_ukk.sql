-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2019 pada 22.25
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln_ukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(20) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_jabatan`) VALUES
(1, 'Pelanggan'),
(2, 'Admin'),
(3, 'Kasir'),
(4, 'Pemantau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(20) NOT NULL,
  `nomor_kwh` varchar(12) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_tarif` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES
(5, '2147483647', 'Kafka Khalis', 'Jl.Kaki Lima ', 2),
(6, '118391113', 'Arief', 'JL.Sempoa', 1),
(9, '131311211', 'Boim Musthofa', 'Jl.Yaktapena No.2 Pondok Ranji ', 1),
(12, '91981371111', 'Alvian Faiz', 'Jl.Sukamaju No.8 Ciputat Tanggerang Selatan', 2),
(13, '8319112347', 'Fachrurozi', 'Jl. Mamah Muda No.12 Jakarta Utara ', 2),
(14, '719171971411', 'Andruw Dharma', 'Jl.Kakak Tua No.3 Pamulang Tangsel', 1),
(15, '817718871811', 'Ila', 'Jl.Arif No.1 Pondok Aren Tangsel\r\n', 1),
(16, '747782778428', 'Arya', 'Jl.Tobrut No.31 Tangsel ', 1),
(17, '147817817817', 'Nisa', 'Jl.Papah Muda No.13 Jakarta Selatan', 1),
(18, '788171861673', 'Tegar', 'Jl.Villa Dago No.34 Blok A Pamulang Tangsel', 1),
(19, '841918956899', 'Akhmad Naufal', 'Jl.Arabian No.114 Tangsel ', 1),
(20, '381717817178', 'Jordan', 'Jl.Monyet Sekali Oji No.3 Kalimantan Utara', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(20) NOT NULL,
  `id_tagihan` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bulan_bayar` varchar(12) NOT NULL,
  `tahun` varchar(21) NOT NULL,
  `biaya_admin` int(12) NOT NULL,
  `total_bayar` int(30) NOT NULL,
  `id_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `meter_awal` int(30) NOT NULL,
  `meter_akhir` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
(2, 5, 'January', '2019', 9000, 9174),
(4, 12, 'October', '2019', 9174, 9200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(20) NOT NULL,
  `id_penggunaan` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `bulan` varchar(12) NOT NULL,
  `tahun` varchar(12) NOT NULL,
  `jumlah_meter` int(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `status`) VALUES
(5, 2, 5, 'January', '2019', 174, 'Belum Bayar'),
(9, 4, 12, 'October', '2019', 26, 'Lunas'),
(10, 4, 12, 'October', '2019', 26, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(12) NOT NULL,
  `Golongan` varchar(21) NOT NULL,
  `daya` varchar(20) NOT NULL,
  `tarifperkwh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `Golongan`, `daya`, `tarifperkwh`) VALUES
(1, 'R-1/TR', '1.300 VA', ' 1467'),
(2, 'R-1/TR', '2.200 VA', '1467');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_level` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_admin`, `username`, `password`, `nama`, `id_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 2),
(3, 'kafka', '541661622185851c248b41bf0cea7ad0', 'kafka', 2);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_penggunaan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_penggunaan` (
`id_penggunaan` int(20)
,`id_pelanggan` int(20)
,`nomor_kwh` varchar(12)
,`bulan` varchar(20)
,`tahun` varchar(20)
,`meter_awal` int(30)
,`meter_akhir` int(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_tagihan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_tagihan` (
`id_tagihan` int(20)
,`nama_pelanggan` varchar(20)
,`nomor_kwh` varchar(12)
,`alamat` varchar(50)
,`bulan` varchar(12)
,`tahun` varchar(12)
,`jumlah_meter` int(30)
,`daya` varchar(20)
,`tarifperkwh` varchar(50)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_penggunaan`
--
DROP TABLE IF EXISTS `v_penggunaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penggunaan`  AS  select `p`.`id_penggunaan` AS `id_penggunaan`,`pl`.`id_pelanggan` AS `id_pelanggan`,`pl`.`nomor_kwh` AS `nomor_kwh`,`p`.`bulan` AS `bulan`,`p`.`tahun` AS `tahun`,`p`.`meter_awal` AS `meter_awal`,`p`.`meter_akhir` AS `meter_akhir` from (`pelanggan` `pl` join `penggunaan` `p` on((`pl`.`id_pelanggan` = `p`.`id_pelanggan`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tagihan`
--
DROP TABLE IF EXISTS `v_tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tagihan`  AS  select `t`.`id_tagihan` AS `id_tagihan`,`pl`.`nama_pelanggan` AS `nama_pelanggan`,`pl`.`nomor_kwh` AS `nomor_kwh`,`pl`.`alamat` AS `alamat`,`t`.`bulan` AS `bulan`,`t`.`tahun` AS `tahun`,`t`.`jumlah_meter` AS `jumlah_meter`,`tr`.`daya` AS `daya`,`tr`.`tarifperkwh` AS `tarifperkwh`,`t`.`status` AS `status` from ((`tagihan` `t` join `pelanggan` `pl` on((`t`.`id_pelanggan` = `pl`.`id_pelanggan`))) join `tarif` `tr` on((`tr`.`id_tarif` = `pl`.`id_tarif`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `nomor_kwh` (`nomor_kwh`),
  ADD KEY `tarif` (`id_tarif`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `admin` (`id_admin`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `penggunaan` (`id_penggunaan`),
  ADD KEY `pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id_penggunaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_penggunaan`) REFERENCES `penggunaan` (`id_penggunaan`),
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
