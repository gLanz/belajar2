/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.10.2-MariaDB : Database - db_puskesmas_imunisasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_balita` */

DROP TABLE IF EXISTS `tbl_balita`;

CREATE TABLE `tbl_balita` (
  `id_balita` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nama_balita` varchar(50) NOT NULL,
  `jenkel_balita` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_balita`),
  KEY `fkbalita1` (`id_login`),
  CONSTRAINT `fkbalita1` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_balita` */

insert  into `tbl_balita`(`id_balita`,`id_login`,`nama_balita`,`jenkel_balita`,`tanggal_lahir`,`nama_ibu`,`nama_ayah`,`alamat`,`no_hp`) values 
(2,6,'Lisa Wati','P','2021-06-08','Sumiati','Suprapto','Jl Saudara, Medan','081335467892'),
(6,2,'Johan','L','2024-02-09','Budi','Dian','Jl Melati','081239213123'),
(7,3,'Vanta Meilina','P','2024-02-14','Agus','Bonita','medan','08123129234'),
(8,16,'Berliana','P','2024-02-15','Miskha','Suryadi','Pardede','082345167'),
(9,17,'Janheri','L','2024-02-13','Bara','Sinta','jl surya','098625533'),
(10,18,'Kevin','L','2024-02-13','jen','berta','Pardede','0812345'),
(11,19,'Fadly Samosir','L','2024-02-26','Bui','Kui','Jl Sepakat No.23','081237231231');

/*Table structure for table `tbl_daftar` */

DROP TABLE IF EXISTS `tbl_daftar`;

CREATE TABLE `tbl_daftar` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `id_balita` int(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `no_antrian` int(12) NOT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `status` enum('Daftar','Periksa','Selesai','Batal') DEFAULT NULL,
  PRIMARY KEY (`id_daftar`),
  KEY `fkdaftar1` (`id_balita`),
  KEY `fkdaftar2` (`id_petugas`),
  CONSTRAINT `fkdaftar1` FOREIGN KEY (`id_balita`) REFERENCES `tbl_balita` (`id_balita`),
  CONSTRAINT `fkdaftar2` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_daftar` */

insert  into `tbl_daftar`(`id_daftar`,`id_balita`,`id_petugas`,`tgl_daftar`,`no_antrian`,`tinggi`,`berat`,`keluhan`,`status`) values 
(2,2,1,'2024-01-25',1,60,12,'tidak ada','Selesai'),
(7,7,1,'2024-02-27',1,65,15,'Kosong','Selesai'),
(8,2,1,'2024-02-26',1,57,16,'Tidak ada','Selesai'),
(9,6,1,'2024-02-26',2,55,20,'-','Selesai'),
(10,8,1,'2024-02-22',3,90,10,'Demam','Selesai'),
(11,9,1,'2024-02-27',3,67,56,'-','Selesai'),
(17,11,1,'2024-02-27',4,55,16,'-','Periksa');

/*Table structure for table `tbl_dokter` */

DROP TABLE IF EXISTS `tbl_dokter`;

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialisasi` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_dokter` */

insert  into `tbl_dokter`(`id_dokter`,`nama_dokter`,`spesialisasi`,`no_hp`,`jenis_kelamin`) values 
(3,'dr Mahadewi Suprapto, MKsT','Anak','081239839434','P');

/*Table structure for table `tbl_imunisasi` */

DROP TABLE IF EXISTS `tbl_imunisasi`;

CREATE TABLE `tbl_imunisasi` (
  `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_vaksin` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_balita` int(11) NOT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  `tindakan` text DEFAULT NULL,
  `tgl_vaksin` date NOT NULL,
  PRIMARY KEY (`id_imunisasi`),
  KEY `fk_imuninasi1` (`id_vaksin`),
  KEY `fk_imuninasi2` (`id_petugas`),
  KEY `fk_imuninasi3` (`id_balita`),
  KEY `fk_imuninasi4` (`id_daftar`),
  KEY `fk_imuninasi5` (`id_dokter`),
  CONSTRAINT `fk_imuninasi1` FOREIGN KEY (`id_vaksin`) REFERENCES `tbl_vaksin` (`id_vaksin`),
  CONSTRAINT `fk_imuninasi2` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`),
  CONSTRAINT `fk_imuninasi3` FOREIGN KEY (`id_balita`) REFERENCES `tbl_balita` (`id_balita`),
  CONSTRAINT `fk_imuninasi4` FOREIGN KEY (`id_daftar`) REFERENCES `tbl_daftar` (`id_daftar`),
  CONSTRAINT `fk_imuninasi5` FOREIGN KEY (`id_dokter`) REFERENCES `tbl_dokter` (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_imunisasi` */

insert  into `tbl_imunisasi`(`id_imunisasi`,`id_vaksin`,`id_petugas`,`id_dokter`,`id_balita`,`id_daftar`,`tindakan`,`tgl_vaksin`) values 
(2,3,1,3,2,2,'Pemberian vaksin','2024-01-15'),
(3,4,1,3,2,2,'Pemberian vaksin','2024-02-25'),
(4,3,1,3,7,7,'Pemberian vaksin','2024-02-25'),
(5,5,1,3,2,8,'Pemberian vaksin','2024-02-26'),
(6,3,1,3,6,9,'Pemberian vaksin','2024-02-26'),
(7,3,1,3,8,10,'Pemberian vaksin dan obat','2024-02-26'),
(8,3,1,3,9,11,'Pemberian vaksin','2024-02-26');

/*Table structure for table `tbl_jadwal` */

DROP TABLE IF EXISTS `tbl_jadwal`;

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `jadwal` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `foreignkey4` (`id_dokter`),
  CONSTRAINT `foreignkey4` FOREIGN KEY (`id_dokter`) REFERENCES `tbl_dokter` (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_jadwal` */

insert  into `tbl_jadwal`(`id_jadwal`,`jadwal`,`id_dokter`) values 
(2,'<p>Setiap Bulan Tanggal 15 Mulai Pukul 10.00 sampai selesai&nbsp;</p>',3);

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `group` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`id_login`,`nama`,`username`,`password`,`group`) values 
(1,'Berliana','admin','d033e22ae348aeb5660fc2140aec35850c4da997',1),
(2,'Johan','johan','759412786bc533369b22377bf83fb9056c5b25b2',3),
(3,'Vanta Meilina','vanta','3e09ecd21ff3e39e4840456967e73182e0fcf5b6',3),
(6,'Lisa Wati','lisa','c4ed14e2020dd45edb57b5fba2f40dd93952505e',3),
(8,'Sany Sobrata','sany','4e0e2f177d1b01f2f4533d3dc2605e76a67073af',2),
(16,'Berliana','Berliana','b521caa6e1db82e5a01c924a419870cb72b81635',3),
(17,'Janheri','Janheri','d033e22ae348aeb5660fc2140aec35850c4da997',3),
(18,'Kevin','Kevin','e043899daa0c7add37bc99792b2c045d6abbc6dc',3),
(19,'Fadly Samosir','fadlysamosir','22915541e80aa17c2aaa6e9dd87a41574ab6afa1',3);

/*Table structure for table `tbl_petugas` */

DROP TABLE IF EXISTS `tbl_petugas`;

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(50) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `id_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `fk_petugas1` (`id_login`),
  CONSTRAINT `fk_petugas1` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_petugas` */

insert  into `tbl_petugas`(`id_petugas`,`nama_petugas`,`jabatan`,`jenis_kelamin`,`id_login`) values 
(1,'Sany Sobrata','perawat','P',8);

/*Table structure for table `tbl_vaksin` */

DROP TABLE IF EXISTS `tbl_vaksin`;

CREATE TABLE `tbl_vaksin` (
  `id_vaksin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_vaksin` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_vaksin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbl_vaksin` */

insert  into `tbl_vaksin`(`id_vaksin`,`nama_vaksin`,`keterangan`) values 
(3,'BCG Polio 1','Usia 0-1 Bulan,\r\nMencegah penularan tuberculosis dan polio'),
(4,'DPT-HB-Hib 1 Polio 2','Usia 2 bulan, \r\nMencegah polio, difteri, batuk rejan, retanus, hepatitis B, meningitis, & pneumonia'),
(5,'DPT-HB-Hib 2 Polio 3','Usia 3 bulan'),
(6,' DPT-HB-Hib 3 Polio 4','Usia 4 bulan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
