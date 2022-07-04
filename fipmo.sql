-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Mar 2022 pada 11.52
-- Versi server: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fipmo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuaca`
--

CREATE TABLE `cuaca` (
  `id_cuaca` int(11) NOT NULL,
  `nilai_cuaca` varchar(50) NOT NULL,
  `tanggal` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedalaman`
--

CREATE TABLE `kedalaman` (
  `id_kedalaman` int(11) NOT NULL,
  `nilai_kedalaman` varchar(100) NOT NULL,
  `tanggal` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ph`
--

CREATE TABLE `ph` (
  `id_ph` int(11) NOT NULL,
  `nilai_ph` float NOT NULL,
  `tanggal` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saklar`
--

CREATE TABLE `saklar` (
  `id_saklar` int(11) NOT NULL,
  `nilai_saklar` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password1` varchar(100) NOT NULL,
  `alamat_rumah` varchar(100) NOT NULL,
  `alamat_kolam` varchar(100) NOT NULL,
  `panjang` int(100) NOT NULL,
  `lebar` int(100) NOT NULL,
  `tinggi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `password1`, `alamat_rumah`, `alamat_kolam`, `panjang`, `lebar`, `tinggi`) VALUES
(11, 'Poo', 'admin', 'admin', 'admin', 'P', 'P', 23, 23, 23),
(13, 'Wilmar', 'Wilmar', 'wilmar', 'wilmar', 'Banggle', 'Banggle', 50, 50, 50),
(14, 'Muchrizkipradana', 'muchrizkipradana', '11223344', '11223344', 'Desa Banggle', '500', 20, 20, 200),
(15, 'Mitra', 'bangjago', 'bangjago', 'bangjago', 'Bangle', 'Bangle', 15, 20, 120),
(16, 'woke', 'woke', '', 'woke', 'woke', 'woke', 200, 200, 200);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuaca`
--
ALTER TABLE `cuaca`
  ADD PRIMARY KEY (`id_cuaca`);

--
-- Indeks untuk tabel `kedalaman`
--
ALTER TABLE `kedalaman`
  ADD PRIMARY KEY (`id_kedalaman`);

--
-- Indeks untuk tabel `ph`
--
ALTER TABLE `ph`
  ADD PRIMARY KEY (`id_ph`);

--
-- Indeks untuk tabel `saklar`
--
ALTER TABLE `saklar`
  ADD PRIMARY KEY (`id_saklar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuaca`
--
ALTER TABLE `cuaca`
  MODIFY `id_cuaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1357460;

--
-- AUTO_INCREMENT untuk tabel `kedalaman`
--
ALTER TABLE `kedalaman`
  MODIFY `id_kedalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1365594;

--
-- AUTO_INCREMENT untuk tabel `ph`
--
ALTER TABLE `ph`
  MODIFY `id_ph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2353595;

--
-- AUTO_INCREMENT untuk tabel `saklar`
--
ALTER TABLE `saklar`
  MODIFY `id_saklar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
