-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 07:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi-pirda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_kartu` varchar(255) NOT NULL,
  `no_registrasi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `luas_plasma` float NOT NULL,
  `foto` varchar(255) NOT NULL,
  `foto_bukti` varchar(255) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_bulan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `telp`, `email`) VALUES
(1, 'Murutuwu, Kec. Paju Epat, Kabupaten Barito Timur, Kalimantan Tengah 73614', '0852-4801-3601', 'ptsgm.bartim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `keterangan`) VALUES
(1, '<h3><strong>PT SAWIT GRAHA MANUNGGAL</strong></h3>\r\n\r\n<p>PT. Sawit Graha Manunggal adalah sebuah perusahaan perkebunan sawit swasta yang merupakan bagian dari Anglo Eastern Plantation (AEP) Group yaitu perusahaan PMA yang berdiri sejak tahun 1985, berkedudukan di Inggris dan terdaftar di London Stock Exchange. Sejak awal berdiri sampai dengan tahun 2006 AEP Group telah membangun beberapa kebun yaitu : PT. United Kingdom Indonesia Plantation, PT. Musam Utjing, PT. Simpang Ampat, PT. Tasik Raja, PT. Anak Tasik, Labuhan Batu (Sumatera Utara), PT.Mitra Puding Mas, PT. Alno Agro Utama, muko-muko selatan (Bengkulu), PT. Anglo Eastern Plantation Malaysia, Cenderung (Malaysia), PT. Bina Pitri Jaya, PT. Hijau Pryan Perdana, PT. Cahaya Pelita Andika, PT. Bangka Malindo Lestari.</p>\r\n\r\n<p>Pada tanggal 10 Desember 2007, AEP Indonesia berekspansi ke Kalimantan Tengah, tepatnya di daerah Tamiang Layang dan membangun kebun yang bernama PT. Sawit Graha Manunggal. Wilayah kerja PT. Sawit Graha Manunggal berada di Kabupaten Barito Timur dengan lokasi meliputi 6 wilayah kecamatan yaitu : Kecamatan Dusun Timur, Kecamatan Karusen Janang, Kecamatan Paku, Kecamatan Dusun Tengah, Kecamatan Paju Epat, dan Kecamatan Pematang Karau. Pembangunan usaha perkebunan dilakukan melalui pola Kebun Inti &amp; Kebun Kemitraan (Kebun Plasma dan Kebun Kas Desa).</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_pokok`
--

CREATE TABLE `simpanan_pokok` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `simpanan` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_wajib`
--

CREATE TABLE `simpanan_wajib` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `simpanan_wajib` bigint(20) DEFAULT NULL,
  `id_bulan` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `sumber_dana` bigint(20) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `bank_penerima` varchar(255) DEFAULT NULL,
  `no_rek` bigint(20) DEFAULT NULL,
  `nama_rek` varchar(255) DEFAULT NULL,
  `mata_uang` varchar(255) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `reference_number` bigint(20) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `id_bulan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  ADD CONSTRAINT `simpanan_pokok_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE;

--
-- Constraints for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD CONSTRAINT `simpanan_wajib_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE,
  ADD CONSTRAINT `simpanan_wajib_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `simpanan_wajib_ibfk_4` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
