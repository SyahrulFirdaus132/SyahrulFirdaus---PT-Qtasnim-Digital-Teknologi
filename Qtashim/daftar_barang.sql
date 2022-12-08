-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2022 pada 09.12
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_barang`
--

CREATE TABLE `daftar_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_stok` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_barang`
--

INSERT INTO `daftar_barang` (`id`, `kode_barang`, `nama_barang`, `id_stok`, `stok`, `jumlah_terjual`, `tanggal_transaksi`, `jenis_barang`) VALUES
(12, 'A01', 'Kopi', 'S01', 100, 10, '2021-05-01', 'Konsumsi'),
(13, 'A07', 'Teh', 'S07', 81, 10, '2022-12-16', 'Pembersih'),
(14, 'A03', 'Kopi', 'S03', 90, 15, '2021-05-10', 'Konsumsi'),
(15, 'A04', 'Pasta Gigi', 'S04', 100, 20, '2021-05-11', 'Pembersih'),
(16, 'A05', 'Sabun Mandi', 'S05', 100, 30, '2021-05-11', 'Pembersih'),
(17, 'A06', 'Sampo', 'S06', 100, 25, '2021-05-12', 'Pembersih'),
(20, 'A07', 'Teh', 'S07', 81, 5, '2022-05-12', 'Konsumsi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_barang`
--
ALTER TABLE `daftar_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
