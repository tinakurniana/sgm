/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_bulan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_tahun` (`id_tahun`),
  KEY `id_bulan` (`id_bulan`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` text NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `simpanan_pokok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `simpanan` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_anggota` (`id_anggota`),
  CONSTRAINT `simpanan_pokok_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `simpanan_wajib` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `simpanan_wajib` bigint(20) DEFAULT NULL,
  `id_bulan` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_tahun` (`id_tahun`),
  KEY `id_bulan` (`id_bulan`),
  CONSTRAINT `simpanan_wajib_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE,
  CONSTRAINT `simpanan_wajib_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `simpanan_wajib_ibfk_4` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tahun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_bulan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_tahun` (`id_tahun`),
  KEY `id_bulan` (`id_bulan`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5');


INSERT INTO `anggota` (`id_anggota`, `username`, `password`, `nama`, `no_kartu`, `no_registrasi`, `alamat`, `ktp`, `luas_plasma`, `foto`, `foto_bukti`, `id_tahun`, `id_bulan`) VALUES
(26, '2', 'c81e728d9d4c2f636f067f89cc14862c', '2', '2', '2', '2', '2', 2, '647c03ff044ee.jpg', '647c03ff04996.jpg', 14, 19);


INSERT INTO `bulan` (`id`, `bulan`) VALUES
(19, 'Januari');


INSERT INTO `galeri` (`id_galeri`, `foto`, `judul`, `keterangan`) VALUES
(1, '646b1c457a50d.jpeg', 'Gedung', 'ini adalah Gedung');


INSERT INTO `kontak` (`id`, `alamat`, `telp`, `email`) VALUES
(1, 'Jalan G.Obos', '08xxxxxxxxxx', 'tes@gmail.com');




INSERT INTO `profil` (`id`, `keterangan`) VALUES
(1, '<h1><strong>Koperasi Plasma&nbsp;PT Sawit Graha Manunggal</strong></h1>\r\n\r\n<p>PT. Sawit Graha Manunggal adalah sebuah perusahaan perkebunan sawit swasta yang merupakan bagian dari Anglo Eastern Plantation (AEP) Group yaitu perusahaan PMA yang berdiri sejak tahun 1985, berkedudukan di Inggris dan terdaftar di London Stock Exchange. Sejak awal berdiri sampai dengan tahun 2006 AEP Group telah membangun beberapa kebun yaitu : PT. United Kingdom Indonesia Plantation, PT. Musam Utjing, PT. Simpang Ampat, PT. Tasik Raja, PT. Anak Tasik, Labuhan Batu (Sumatera Utara), PT.Mitra Puding Mas, PT. Alno Agro Utama, muko-muko selatan (Bengkulu), PT. Anglo Eastern Plantation Malaysia, Cenderung (Malaysia), PT. Bina Pitri Jaya, PT. Hijau Pryan Perdana, PT. Cahaya Pelita Andika, PT. Bangka Malindo Lestari.</p>\r\n\r\n<p>Pada tanggal 10 Desember 2007, AEP Indonesia berekspansi ke Kalimantan Tengah, tepatnya di daerah Tamiang Layang dan membangun kebun yang bernama PT. Sawit Graha Manunggal. Wilayah kerja PT. Sawit Graha Manunggal berada di Kabupaten Barito Timur dengan lokasi meliputi 6 wilayah kecamatan yaitu : Kecamatan Dusun Timur, Kecamatan Karusen Janang, Kecamatan Paku, Kecamatan Dusun Tengah, Kecamatan Paju Epat, dan Kecamatan Pematang Karau. Pembangunan usaha perkebunan dilakukan melalui pola Kebun Inti &amp; Kebun Kemitraan (Kebun Plasma dan Kebun Kas Desa).</p>\r\n');


INSERT INTO `simpanan_pokok` (`id`, `id_anggota`, `simpanan`) VALUES
(18, 26, 50000);


INSERT INTO `simpanan_wajib` (`id`, `id_anggota`, `simpanan_wajib`, `id_bulan`, `id_tahun`, `tanggal`) VALUES
(30, 26, 123, 19, 13, '2022-01-01');


INSERT INTO `tahun` (`id`, `tahun`) VALUES
(13, 2022);
INSERT INTO `tahun` (`id`, `tahun`) VALUES
(14, 2023);


INSERT INTO `transaksi` (`id`, `id_anggota`, `sumber_dana`, `nama_produk`, `bank_penerima`, `no_rek`, `nama_rek`, `mata_uang`, `jumlah`, `reference_number`, `id_tahun`, `id_bulan`, `tanggal`) VALUES
(14, 26, 123, '123', '123', 123, '213', '123', 123, 123, 13, 19, '2022-01-04');
INSERT INTO `transaksi` (`id`, `id_anggota`, `sumber_dana`, `nama_produk`, `bank_penerima`, `no_rek`, `nama_rek`, `mata_uang`, `jumlah`, `reference_number`, `id_tahun`, `id_bulan`, `tanggal`) VALUES
(15, 26, 123, '123', '123', 123, '123', '123', 123, 123, 13, 19, '2022-01-01');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;