/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.28-MariaDB : Database - skripsi-pirda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`skripsi-pirda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `skripsi-pirda`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`) values 
(1,'Admin','e00cf25ad42683b3df678c61f42c6bda');

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

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
  `mulai_bergabung` varchar(255) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `anggota` */

insert  into `anggota`(`id_anggota`,`username`,`password`,`nama`,`no_kartu`,`no_registrasi`,`alamat`,`ktp`,`luas_plasma`,`foto`,`foto_bukti`,`mulai_bergabung`) values 
(2,'tina','ef2afe0ea76c76b6b4b1ee92864c4d5c','tina','001','T.II/WH/0001','jalan sapan','98737818',0.66,'646cc7543bc51.jpg','646cc7543c265.jpg','2023-06'),
(3,'udin','6bec9c852847242e384a4d5ac0962ba0','udin','002','T.II/WH/0001','jalan yos','98737818',0.5,'646ccf6f6458d.png','646ccf6f64ad7.png','2023-01'),
(4,'zea','c84258e9c39059a89ab77d846ddab909','tes','003','T.II/WH/0006','jjjj','1234567',0.9,'646ccfd0e8d62.jpg','646ccfd0e94ee.jpg','2022-01');

/*Table structure for table `bulan` */

DROP TABLE IF EXISTS `bulan`;

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun` int(11) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `bulan_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `bulan` */

insert  into `bulan`(`id`,`id_tahun`,`bulan`) values 
(1,1,'Januari');

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `galeri` */

insert  into `galeri`(`id_galeri`,`foto`,`judul`,`keterangan`) values 
(4,'646ccef64df77.jpg','belajar php','yyyhhahahha'),
(5,'646ccf08bd137.png','belajar php','yajakkakak');

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` text NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id_kontak`,`alamat`,`telp`,`email`) values 
(2,'Murutuwu, Kec. Paju Epat, Kabupaten Barito Timur, Kalimantan Tengah 73614','0852-4801-3601','sgm@gmail.com');

/*Table structure for table `pengurus` */

DROP TABLE IF EXISTS `pengurus`;

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengurus` */

insert  into `pengurus`(`id_pengurus`,`nama`,`jabatan`,`no_hp`,`ktp`,`foto`) values 
(1,'Jonny','Ketua','0812345678','98737818','646af864e8cf4.jpg'),
(2,'Sunny','Sekretaris','086556','98737818','646af8c03fc8d.jpg');

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `profil` */

insert  into `profil`(`id`,`keterangan`) values 
(1,'<p><strong>tes<em> </em></strong><em>tes</em> tes</p>\r\n');

/*Table structure for table `simpanan_pokok` */

DROP TABLE IF EXISTS `simpanan_pokok`;

CREATE TABLE `simpanan_pokok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `simpanan` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_anggota` (`id_anggota`),
  CONSTRAINT `simpanan_pokok_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `simpanan_pokok` */

insert  into `simpanan_pokok`(`id`,`id_anggota`,`simpanan`) values 
(2,2,50000),
(3,3,50000),
(4,4,50000);

/*Table structure for table `simpanan_wajib` */

DROP TABLE IF EXISTS `simpanan_wajib`;

CREATE TABLE `simpanan_wajib` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `simpanan_wajib` bigint(20) DEFAULT NULL,
  `id_bulan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_bulan` (`id_bulan`),
  CONSTRAINT `simpanan_wajib_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE,
  CONSTRAINT `simpanan_wajib_ibfk_2` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `simpanan_wajib` */

insert  into `simpanan_wajib`(`id`,`id_anggota`,`simpanan_wajib`,`id_bulan`) values 
(2,2,5000,1);

/*Table structure for table `tahun` */

DROP TABLE IF EXISTS `tahun`;

CREATE TABLE `tahun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tahun` */

insert  into `tahun`(`id`,`tahun`) values 
(1,2020);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal` year(4) DEFAULT NULL,
  `sumber_dana` bigint(20) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `bank_penerima` varchar(255) DEFAULT NULL,
  `no_rek` bigint(20) DEFAULT NULL,
  `nama_rek` varchar(255) DEFAULT NULL,
  `mata_uang` varchar(255) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `reference_number` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anggota` (`id_anggota`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`id_anggota`,`tanggal`,`sumber_dana`,`nama_produk`,`bank_penerima`,`no_rek`,`nama_rek`,`mata_uang`,`jumlah`,`reference_number`) values 
(2,2,2023,100000,'yyyyyy','yy',123456,'yy','IDR',1000000,100000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
