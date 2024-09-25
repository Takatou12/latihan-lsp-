-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2024 pada 13.18
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(15) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Kontak` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_admin`, `Nama`, `Kontak`, `Email`, `Level`) VALUES
(1, 'ikbaltron', '08123456789', 'iqbaltron@gmail.com', 'Admin'),
(2, 'uuya', '0987 6543 1123', 'uuya@gmail.com', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `Id` int(15) NOT NULL,
  `Nama_barang` varchar(30) NOT NULL,
  `Jenis_barang` varchar(30) NOT NULL,
  `Kuantitas_stock` int(30) NOT NULL,
  `Lokasi_gudang` varchar(30) NOT NULL,
  `Serial_number` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`Id`, `Nama_barang`, `Jenis_barang`, `Kuantitas_stock`, `Lokasi_gudang`, `Serial_number`, `harga`) VALUES
(1, 'PS3', 'Konsol Game', 199, 'NGAWI', '23c2024', 'RP. 1.500.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `storage_unit`
--

CREATE TABLE `storage_unit` (
  `Id` int(15) NOT NULL,
  `Nama_gudang` varchar(30) NOT NULL,
  `Lokasi_gudang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `storage_unit`
--

INSERT INTO `storage_unit` (`Id`, `Nama_gudang`, `Lokasi_gudang`) VALUES
(1, 'PT JMK 48', 'NGAWI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `Id` int(15) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Kontak` varchar(30) NOT NULL,
  `Nama_barang` varchar(30) NOT NULL,
  `Nomor_invoice` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`Id`, `Nama`, `Kontak`, `Nama_barang`, `Nomor_invoice`) VALUES
(1, 'Taka', '0821 2345 6666', 'PS3', 'Y678');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nama_barang` (`Nama_barang`,`Lokasi_gudang`),
  ADD KEY `Lokasi_gudang` (`Lokasi_gudang`);

--
-- Indeks untuk tabel `storage_unit`
--
ALTER TABLE `storage_unit`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Lokasi_gudang` (`Lokasi_gudang`),
  ADD UNIQUE KEY `Nama_gudang` (`Nama_gudang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nama_barang` (`Nama_barang`),
  ADD UNIQUE KEY `Nomor_invoice` (`Nomor_invoice`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `storage_unit`
--
ALTER TABLE `storage_unit`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Nama_barang`) REFERENCES `supplier` (`Nama_barang`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`Lokasi_gudang`) REFERENCES `storage_unit` (`Lokasi_gudang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
