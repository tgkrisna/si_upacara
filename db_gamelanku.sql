/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.31-MariaDB : Database - db_gamelanku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_gamelanku` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_gamelanku`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2020_04_04_005200_create_m__users_table',1),
(2,'2020_04_21_131240_create_m__kategoris_table',2);

/*Table structure for table `tb_detil_post` */

DROP TABLE IF EXISTS `tb_detil_post`;

CREATE TABLE `tb_detil_post` (
  `id_det_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_parent_post` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `spesial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_post`),
  KEY `id_post` (`id_post`),
  KEY `id_tag` (`id_tag`),
  KEY `id_status` (`id_status`),
  KEY `id_parent_post` (`id_parent_post`),
  CONSTRAINT `tb_detil_post_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `tb_post` (`id_post`),
  CONSTRAINT `tb_detil_post_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`),
  CONSTRAINT `tb_detil_post_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`),
  CONSTRAINT `tb_detil_post_ibfk_4` FOREIGN KEY (`id_parent_post`) REFERENCES `tb_post` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_detil_post` */

insert  into `tb_detil_post`(`id_det_post`,`id_tag`,`id_post`,`id_parent_post`,`id_status`,`spesial`) values 
(1,3,4,5,1,4),
(2,3,5,6,NULL,4),
(3,1,5,1,NULL,4),
(4,3,5,7,NULL,4);

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`nama_kategori`,`deskripsi`,`gambar`) values 
(2,'Pitra Yadnya','Pitra Yadnya',NULL),
(3,'Dewa Yadnya','Dewa Yadnya',NULL),
(4,'Bhuta Yadnya','Bhuta Yadnya',NULL);

/*Table structure for table `tb_post` */

DROP TABLE IF EXISTS `tb_post`;

CREATE TABLE `tb_post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  `nama_post` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `video` text,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_tag` (`id_tag`),
  KEY `tb_post_ibfk_2` (`id_kategori`),
  CONSTRAINT `tb_post_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`),
  CONSTRAINT `tb_post_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tb_post` */

insert  into `tb_post`(`id_post`,`id_kategori`,`id_tag`,`nama_post`,`deskripsi`,`video`,`gambar`) values 
(1,NULL,1,'Gamelan A','Gamelan A',NULL,NULL),
(2,NULL,2,'Tari B','Tari B',NULL,NULL),
(3,NULL,1,'Gamelan C','Gamelan C',NULL,NULL),
(4,3,NULL,'Upacara A','Upacara A',NULL,NULL),
(5,NULL,3,'Prosesi A','Prosesi A',NULL,NULL),
(6,NULL,3,'Prosesi B','Prosesi B',NULL,NULL),
(7,NULL,3,'Prosesi C','Prosesi C',NULL,NULL),
(8,2,NULL,'Tes',NULL,'https://www.youtube.com/watch?v=9lVPAWLWtWc',NULL),
(9,2,NULL,'Tes 2',NULL,'https://www.youtube.com/watch?v=9lVPAWLWtWc',NULL),
(10,2,NULL,'Tes 3',NULL,'https://www.youtube.com/watch?v=9lVPAWLWtWc',NULL),
(11,3,NULL,'Tes 123',NULL,'https://www.youtube.com/watch?v=9lVPAWLWtWc',NULL),
(12,2,NULL,'Tes 2222','<p>tes222222</p>','https://www.youtube.com/watch?v=9lVPAWLWtWc',NULL),
(13,2,NULL,'tes111','<p>tes1111</p>','https://www.youtube.com/watch?v=9lVPAWLWtWc',NULL),
(14,2,NULL,'gujhagvfgv','<p>asdbkajhsbfdjha</p>','https://www.youtube.com/watch?v=9lVPAWLWtWc',NULL),
(15,2,NULL,'qwerty','<p>12312313</p>','https://www.youtube.com/watch?v=9lVPAWLWtWc','1588403785_download.jfif'),
(16,2,NULL,'qwertyuio','<p>asdasdqwdq</p>','https://www.youtube.com/watch?v=9lVPAWLWtWc','1588421936_download.jfif'),
(17,2,NULL,'yorushika','<p>yorushika</p>','9lVPAWLWtWc','1588422018_download.jfif'),
(18,2,NULL,'lol','<p>lol</p>','9lVPAWLWtWc','1588504793_Yorushika_Logo.jpg'),
(19,2,NULL,'achillea','<p>achillea</p>','9lVPAWLWtWc','1588593596_artworks-000409460535-61sens-t500x500.jpg'),
(20,2,NULL,'Dummy1','<p>Dummy1</p>','9lVPAWLWtWc','Kategori_2');

/*Table structure for table `tb_status` */

DROP TABLE IF EXISTS `tb_status`;

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status` */

insert  into `tb_status`(`id_status`,`nama_status`) values 
(1,'Awal'),
(2,'Puncak'),
(3,'Akhir');

/*Table structure for table `tb_tag` */

DROP TABLE IF EXISTS `tb_tag`;

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tag` */

insert  into `tb_tag`(`id_tag`,`nama_tag`,`deskripsi`,`gambar`) values 
(1,'Gamelan','Gamelan',NULL),
(2,'Tari Bali','Tari Bali',NULL),
(3,'Prosesi Upacara','Prosesi Upacara',NULL),
(4,'Tabuh','Tabuh',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `m__users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`email`,`password`,`name`,`remember_token`,`created_at`,`updated_at`) values 
(1,'tes@gmail.com','123456','Tes123',NULL,NULL,'2020-04-16 11:01:27'),
(2,'lonte@gmail.com','123456','Made Lonte 2',NULL,'2020-04-13 13:43:11','2020-04-13 13:43:11'),
(4,'atta@gmail.com','123456','Atta Halilintar 2',NULL,'2020-04-13 13:47:06','2020-04-16 11:01:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
