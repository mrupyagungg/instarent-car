-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instarent2`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `posisi_d_c` enum('d','k') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `saldo_awal` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_akun`, `kategori`, `posisi_d_c`, `saldo_awal`) VALUES
(101, 'Kas', 'Harta', 'd', 0),
(102, 'Bank', 'Aktiva', 'd', 0),
(103, 'Peralatan', 'Aktiva', 'd', 0),
(104, 'Perlengkapan', 'Aktiva', 'd', 0),
(401, 'Pendapatan Sewa', 'Pendapatan', '', 0),
(402, 'Pendapatan Lain-lain', '', '', 0),
(501, 'Beban Pengiriman', 'Beban', 'd', 0),
(502, 'Beban Listrik', 'Beban', 'd', 0),
(503, 'Beban Air', 'Beban', 'd', 0),
(504, 'Beban Utilitas', 'beban', 'd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id_jenis_pengeluaran` varchar(20) NOT NULL,
  `nama_jenis_pengeluaran` varchar(64) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id_jenis_pengeluaran`, `nama_jenis_pengeluaran`, `id_akun`) VALUES
('JPN-002', 'gaji', 501),
('JPN-003', 'listrik', 502),
('JPN-004', 'Beban Utilitas', 504),
('JPN-005', 'Beban Kasir', 501);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `posisi` enum('d','k') NOT NULL,
  `reff` varchar(20) NOT NULL,
  `transaksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `tanggal`, `id_akun`, `nominal`, `posisi`, `reff`, `transaksi`) VALUES
(1, '2024-08-26', 101, 100000, 'd', 'PMS-001', 'Kas'),
(2, '2024-08-26', 401, 100000, 'k', 'PMS-001', 'Pendapatan Sewa'),
(3, '2024-08-26', 502, 50000, 'd', 'PNG-001', 'Beban Listrik'),
(4, '2024-08-26', 101, 50000, 'k', 'PNG-001', 'Kas'),
(7, '2024-09-10', 101, 400000, 'd', 'PMS-002', 'Kas'),
(8, '2024-09-10', 401, 400000, 'k', 'PMS-002', 'Pendapatan Sewa'),
(9, '2024-09-10', 503, 100000, 'd', 'PNG-002', 'Beban Air'),
(10, '2024-09-10', 101, 100000, 'k', 'PNG-002', 'Kas'),
(13, '2024-09-13', 101, 200000, 'd', 'PMS-003', 'Kas'),
(14, '2024-09-13', 401, 200000, 'k', 'PMS-003', 'Pendapatan Sewa'),
(15, '2024-09-13', 502, 250000, 'd', 'PNG-003', 'Beban Listrik'),
(16, '2024-09-13', 101, 250000, 'k', 'PNG-003', 'Kas'),
(17, '2024-09-13', 101, 600000, 'd', 'PMS-004', 'Kas'),
(18, '2024-09-13', 401, 600000, 'k', 'PMS-004', 'Pendapatan Sewa'),
(19, '2024-09-13', 502, 50000, 'd', 'PNG-004', 'Beban Listrik'),
(20, '2024-09-13', 101, 50000, 'k', 'PNG-004', 'Kas'),
(27, '2024-09-14', 501, 1000000, 'd', 'PNG-003', 'Beban Pengiriman'),
(28, '2024-09-14', 101, 1000000, 'k', 'PNG-003', 'Kas'),
(29, '2024-09-14', 101, 1000000, 'd', 'PMS-005', 'Kas'),
(30, '2024-09-14', 401, 1000000, 'k', 'PMS-005', 'Pendapatan Sewa'),
(31, '2024-09-15', 101, 1000000, 'd', 'PMS-006', 'Kas'),
(32, '2024-09-15', 401, 1000000, 'k', 'PMS-006', 'Pendapatan Sewa'),
(34, '2024-09-15', 101, 2500000, 'k', 'PNG-004', 'Kas'),
(35, '2024-09-15', 504, 2400000, 'd', 'PNG-005', 'Beban Utilitas'),
(36, '2024-09-15', 101, 2400000, 'k', 'PNG-005', 'Kas');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `kode_kendaraan` varchar(20) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL,
  `merk_kendaraan` varchar(20) NOT NULL,
  `tahun_kendaraan` varchar(5) NOT NULL,
  `warna_kendaraan` varchar(20) NOT NULL,
  `harga_sewa_kendaraan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `kode_kendaraan`, `jenis_kendaraan`, `nama_kendaraan`, `merk_kendaraan`, `tahun_kendaraan`, `warna_kendaraan`, `harga_sewa_kendaraan`) VALUES
(1, 'KND-001', 'Motor', 'beat', 'honda', '2019', 'merah', 100000),
(2, 'KND-002', 'Mobil', 'jaz', 'honda', '2023', 'hitam', 200000),
(3, 'KND-003', 'Motor', 'beat', 'honda', '2020', 'hitam', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telp_pelanggan` varchar(15) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `jenis_kelamin_pelanggan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `no_telp_pelanggan`, `email_pelanggan`, `alamat_pelanggan`, `jenis_kelamin_pelanggan`) VALUES
(1, 'PLG-001', 'bambang', '087784144576', 'ridhwansptyy@gmail.com', 'buah batu', 'Laki-Laki'),
(2, 'PLG-002', 'adit', '08888', 'ridhwansptyy@gmail.com', 'buah batu', 'Laki-Laki'),
(3, 'PLG-003', 'ridwan sn', '08888', 'ridhwansptyy@gmail.com', 'buah batu', 'Laki-Laki'),
(4, 'PLG-004', 'jovan', '0882382831831', 'jovan@gmail.com', 'jalan pejuan', 'Laki-Laki'),
(5, 'PLG-005', 'jovan', '088225434723', 'jovan@gmail,com', 'bebas13', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pemesanan` varchar(20) NOT NULL,
  `lama_pemesanan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_harga` double NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `jaminan_identitas` varchar(100) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `persetujuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `lama_pemesanan`, `tanggal_pemesanan`, `total_harga`, `plat_nomor`, `jaminan_identitas`, `pelanggan_id`, `kendaraan_id`, `persetujuan`) VALUES
(1, 'PMS-001', 1, '2024-08-26', 100000, '123', '1724608661.jpg', 1, 1, NULL),
(2, 'PMS-002', 2, '2024-09-10', 400000, '123', '1725977611.jpg', 2, 2, 'approved'),
(3, 'PMS-003', 1, '2024-09-13', 200000, '123', '1726192972.jpg', 3, 3, 'approved'),
(4, 'PMS-004', 3, '2024-09-16', 600000, '111', '1726194998.jpg', 1, 2, 'approved'),
(5, 'PMS-005', 10, '2024-09-14', 1000000, '1231', '1726313786.jpeg', 4, 1, 'disapproved'),
(6, 'PMS-006', 10, '2024-09-15', 1000000, '1233', '1726381731.jpeg', 4, 1, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `akun_id` int(11) NOT NULL,
  `jenis_pengeluaran_id` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kode_transaksi`, `akun_id`, `jenis_pengeluaran_id`, `tanggal`, `jumlah`, `keterangan`) VALUES
(9, 'PNG-001', 501, 'JPN-002', '2024-09-13', 500000, 'beban gaji'),
(11, 'PNG-002', 501, 'JPN-002', '2024-09-14', 1000000, 'beban gaji'),
(12, 'PNG-003', 501, 'JPN-002', '2024-09-14', 1000000, 'beban gaji'),
(13, 'PNG-004', 502, 'JPN-003', '2024-09-15', 2500000, 'beban gaji'),
(14, 'PNG-005', 504, 'JPN-004', '2024-09-15', 2400000, 'Beban utilitas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_created_at`) VALUES
(1, 'user', 'user@mail.com', '$2y$10$rfu/LVXhInetMds2VCl1sePTt4oA4ZC3CREaAVtbIzppobIq0jIXq', '2024-07-18 16:03:15'),
(5, 'jovan', 'jovan@gmail.com', '$2y$10$yUExyi1Qkmm5rtxO7V/KB.XZ8FLXR8VKLX9aGLQhymF78/7Qs4KUm', '2024-09-13 13:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `v_waktu`
--

CREATE TABLE `v_waktu` (
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_akun_id` (`id_akun`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD UNIQUE KEY `kode_kendaraan` (`kode_kendaraan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD UNIQUE KEY `kode_pemesanan` (`kode_pemesanan`),
  ADD KEY `fk_pemesanan_kendaraan` (`kendaraan_id`),
  ADD KEY `fk_pemesanan_pelanggan` (`pelanggan_id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluaran_akun_id` (`akun_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_akun_id` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_kendaraan` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `fk_pemesanan_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_akun_id` FOREIGN KEY (`akun_id`) REFERENCES `akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
