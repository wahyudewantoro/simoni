/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.21-MariaDB : Database - etax
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`etax` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `etax`;

/*Table structure for table `ms_menu` */

DROP TABLE IF EXISTS `ms_menu`;

CREATE TABLE `ms_menu` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) DEFAULT NULL,
  `link_menu` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_inc`),
  KEY `FK_ms_menu` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `ms_menu` */

insert  into `ms_menu`(`id_inc`,`nama_menu`,`link_menu`,`parent`,`sort`,`icon`) values (1,'Sistem','#',0,90,'fa fa-cogs'),(2,'role','role',1,1,'fa fa-lock'),(3,'pengguna','pengguna',1,2,'fa fa-user'),(4,'menu','menu',1,3,'fa fa-list'),(5,'Beranda','welcome',0,0,'fa fa-home'),(27,'Master','#',0,4,'fa fa-cubes'),(28,'Jenis Pajak','refjenispajak',27,1,'fa fa-database'),(29,'Wajib Pajak','refclient',0,3,'fa fa-users'),(31,'Transaksi','#',0,2,'fa fa-line-chart'),(32,'Monitoring Transaksi','transaksi',31,1,'fa fa-binoculars'),(33,'Monitoring Transaksi All','transaksi/alldata',31,2,'fa fa-cubes'),(34,'Transaksi Wajib Pajak','transaksi/wp',31,3,'fa fa-users'),(35,'Data WP tidak termonitor','transaksi/gagal',31,4,'fa fa-close'),(36,'Konfigurasi','konfigurasi',27,2,'fa fa-database');

/*Table structure for table `ms_pengguna` */

DROP TABLE IF EXISTS `ms_pengguna`;

CREATE TABLE `ms_pengguna` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ms_role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inc`),
  KEY `FK_ms_pengguna` (`ms_role_id`),
  CONSTRAINT `FK_ms_pengguna` FOREIGN KEY (`ms_role_id`) REFERENCES `ms_role` (`id_inc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ms_pengguna` */

insert  into `ms_pengguna`(`id_inc`,`nama`,`username`,`password`,`ms_role_id`) values (8,'super user','admin','d033e22ae348aeb5660fc2140aec35850c4da997',1);

/*Table structure for table `ms_privilege` */

DROP TABLE IF EXISTS `ms_privilege`;

CREATE TABLE `ms_privilege` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `ms_role_id` int(11) DEFAULT NULL,
  `ms_menu_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inc`),
  KEY `FK_ms_privilege` (`ms_role_id`),
  KEY `FK_ms_priasilege` (`ms_menu_id`),
  CONSTRAINT `FK_ms_priasilege` FOREIGN KEY (`ms_menu_id`) REFERENCES `ms_menu` (`id_inc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ms_privilege` FOREIGN KEY (`ms_role_id`) REFERENCES `ms_role` (`id_inc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `ms_privilege` */

insert  into `ms_privilege`(`id_inc`,`ms_role_id`,`ms_menu_id`,`status`) values (1,1,1,1),(2,1,5,1),(3,1,2,1),(4,1,3,1),(5,1,4,1),(8,1,27,1),(9,1,28,1),(10,1,29,1),(12,1,31,1),(13,1,32,1),(14,1,33,1),(15,1,34,1),(16,1,35,1),(17,1,36,1);

/*Table structure for table `ms_role` */

DROP TABLE IF EXISTS `ms_role`;

CREATE TABLE `ms_role` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_inc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ms_role` */

insert  into `ms_role`(`id_inc`,`nama_role`) values (1,'Super User');

/*Table structure for table `ref_client` */

DROP TABLE IF EXISTS `ref_client`;

CREATE TABLE `ref_client` (
  `kd_client` int(11) NOT NULL AUTO_INCREMENT,
  `nama_wp` varchar(100) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_client`)
) ENGINE=InnoDB AUTO_INCREMENT=10084 DEFAULT CHARSET=latin1;

/*Data for the table `ref_client` */

insert  into `ref_client`(`kd_client`,`nama_wp`,`npwp`,`email`) values (5,'Rachmat H','100000007616',NULL),(6,'MOCH ROCHIM','100000567805',NULL),(7,'Drs. MUJIB SHOVY','200000578002',NULL),(8,'H. WAHAB','100000625414',NULL),(9,'JAYA MAKMUR. PT','200000687801',NULL),(10,'BALITAS','200000727903',NULL),(11,'WARIONO','100000757803',NULL),(12,'NURALI','100000927106',NULL),(13,'STEVAN BASUKI','100001237706',NULL),(14,'HENRY SUGIARTO TRISNO','200001367809',NULL),(15,'Rudi','100001855602',NULL),(16,'Nanik Sumiati','100002580000',NULL),(17,'MS.PRESILIA OKTAVIANI TJAHYONO','100002770000',NULL),(18,'SUGIARTO','200003175608',NULL),(19,'TAN SUNTONO','100003237805',NULL),(20,'H ARDI','100003247805',NULL),(21,'Anwar Taruna','200003259999',NULL),(22,'M. Yusuf','100003485606',NULL),(23,'HM Husein','100003940000',NULL),(24,'UMI CHORBIATUL MUNAWAROH','200004507001',NULL),(321,'HARYOK','100008485506',NULL),(854,'Kursus Gamajaya Sengkaling','100018598002',NULL),(4093,'TEGUH','100064416501',NULL),(9027,'AGUS SUYANTO','100173047707',NULL),(10083,'ERLIANDINI RIFKA AMALIA','100190825401',NULL);

/*Table structure for table `ref_jenispajak` */

DROP TABLE IF EXISTS `ref_jenispajak`;

CREATE TABLE `ref_jenispajak` (
  `kd_jenispajak` int(11) NOT NULL AUTO_INCREMENT,
  `rekening` varchar(50) DEFAULT NULL,
  `nama_pajak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_jenispajak`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `ref_jenispajak` */

insert  into `ref_jenispajak`(`kd_jenispajak`,`rekening`,`nama_pajak`) values (2,'0501.00.00.4.1.1.01','Hotel'),(3,'0501.00.00.4.1.1.02','Restoran'),(4,'0501.00.00.4.1.1.03','Hiburan'),(5,'0501.00.00.4.1.1.07','Parkir'),(6,'0501.00.00.4.1.1.06','MBLB'),(7,'0501.00.00.4.1.1.09','Sarang Burung'),(8,'0501.00.00.4.1.1.05','PPJ'),(9,'0501.00.00.4.1.1.08','Air Tanah'),(10,'0501.00.00.4.1.1.04','Reklame');

/*Table structure for table `tb_client` */

DROP TABLE IF EXISTS `tb_client`;

CREATE TABLE `tb_client` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `kd_client` int(11) DEFAULT NULL,
  `kd_jenispajak` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_client` */

/*Table structure for table `tb_config` */

DROP TABLE IF EXISTS `tb_config`;

CREATE TABLE `tb_config` (
  `kd_config` int(5) NOT NULL AUTO_INCREMENT,
  `nama_wp` varchar(100) DEFAULT NULL,
  `kode_aktivasi` varchar(10) DEFAULT NULL,
  `last_id_database` varchar(100) DEFAULT NULL,
  `kd_jenispajak` varchar(100) DEFAULT NULL,
  `id_client` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `database_client` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `interval_process` int(10) DEFAULT NULL,
  `path_csv` varchar(200) DEFAULT NULL,
  `string_query` varchar(200) DEFAULT NULL,
  `path_move` varchar(200) DEFAULT NULL,
  `url_server` tinytext,
  PRIMARY KEY (`kd_config`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_config` */

insert  into `tb_config`(`kd_config`,`nama_wp`,`kode_aktivasi`,`last_id_database`,`kd_jenispajak`,`id_client`,`username`,`database_client`,`password`,`interval_process`,`path_csv`,`string_query`,`path_move`,`url_server`) values (6,'Drs. MUJIB SHOVY','21621','0','01','111111','root','etax','',60,'D:\\\\bapenda\\\\epajak\\\\etax\\\\data_transaksi.csv','SELECT * FROM tb_transaksi','D:\\\\bapenda\\\\epajak\\\\etax\\\\move\\\\','http://dnh-solution.com/etax/JavaJson/krmDataJson'),(5,'MOCH ROCHIM','99590','0','01','111111','root','etax','',60,'D:\\\\Project-DNH\\\\Etax\\\\data_transaksi.csv','SELECT * FROM tb_transaksi','D:\\\\Project-DNH\\\\Etax\\\\move\\\\','http://dnh-solution.com/etax/JavaJson/krmDataJson'),(4,'BALITAS','18114','0','01','111111','root','etax','',60,'F:\\\\bapenda\\\\epajak\\\\etax\\\\data_transaksi.csv','SELECT * FROM tb_transaksi','F:\\\\bapenda\\\\epajak\\\\etax\\\\move\\\\','http://dnh-solution.com/etax/JavaJson/krmDataJson'),(13,'H. WAHAB','35436','0','01','111111','root','etax','',60,'D:\\\\bapenda\\\\epajak\\\\etax\\\\data_transaksi.csv','SELECT * FROM tb_transaksi','D:\\\\bapenda\\\\epajak\\\\etax\\\\move\\\\','http://dnh-solution.com/etax/JavaJson/krmDataJson'),(10,'NURALI','91845','0','01','111111','root','etax','',60,'D:\\\\Project-DNH\\\\Etax\\\\data_transaksi.csv','Select * from tb_transaksi','D:\\\\Project-DNH\\\\Etax\\\\move\\\\','http://dnh-solution.com/etax/JavaJson/krmDataJson'),(8,'Rachmat H','81364','0','01','111111','root','etax','',60,'D:\\\\Project-DNH\\\\Etax\\\\data_transaksi.csv','SELECT * FROM tb_transaksi','D:\\\\Project-DNH\\\\Etax\\\\move\\\\','http://dnh-solution.com/etax/JavaJson/krmDataJson\r\n'),(14,'H ARDI','88614','0','01','111111','root','etax','',60,'E:\\\\Program\\\\simoni\\\\data_transaksi.csv','SELECT * FROM tb_transaksi','D:\\\\Project\\\\Java\\Etax_\\\\program\\move\\\\','http://36.89.91.154:8080/etax/JavaJson/krmDataJson'),(15,'UMI CHORBIATUL MUNAWAROH','99027','0','01','111111','root','etax','',60,'E:\\\\bapenda\\\\simoni\\\\data_transaksi.csv','SELECT * FROM tb_transaksi','E:\\\\bapenda\\\\simoni\\\\move\\\\','http://36.89.91.154:8080/etax/JavaJson/krmDataJson');

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `kd_trx` int(11) NOT NULL AUTO_INCREMENT,
  `kd_client` int(11) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `nama_wp` varchar(100) DEFAULT NULL,
  `kd_jenispajak` int(11) DEFAULT NULL,
  `rekening` varchar(100) DEFAULT NULL,
  `jenis_pajak` varchar(100) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `waktu_trx` timestamp NULL DEFAULT NULL,
  `nilai_trx` int(11) DEFAULT NULL,
  `disc_trx` int(11) DEFAULT NULL,
  `keterangan` text,
  `tanggal_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kd_trx`)
) ENGINE=InnoDB AUTO_INCREMENT=11733 DEFAULT CHARSET=latin1;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`kd_trx`,`kd_client`,`npwp`,`nama_wp`,`kd_jenispajak`,`rekening`,`jenis_pajak`,`id_transaksi`,`waktu_trx`,`nilai_trx`,`disc_trx`,`keterangan`,`tanggal_insert`) values (11723,111111,NULL,'surabaya',2,NULL,'',2560,'2017-12-13 14:00:00',10000,0,'keterangan 2','2018-11-16 14:09:00'),(11724,111111,NULL,'denpasar',2,NULL,'',2561,'2017-12-13 14:00:00',10000,0,'keterangan 2','2018-11-16 14:09:00'),(11725,111111,NULL,'wp satu',2,NULL,'',2816,'2017-12-13 13:00:00',10000,0,'keterangan satu','2018-11-16 14:09:00'),(11726,111111,NULL,'pekanbaru',2,NULL,'',2817,'2018-11-16 21:05:00',10000,NULL,'keterangan','2018-11-16 14:09:00'),(11727,111111,NULL,'H ARDI',1,NULL,'Restoran',304460,'2018-06-08 06:59:59',54000,-770,'Nasi Goreng^2^10000.00|Es Jeruk^2^5000.00|Peyek^2^2000.00','2019-06-21 16:38:20'),(11728,111111,NULL,'surabaya',2,NULL,'',11723,'2017-12-13 21:00:00',10000,0,'keterangan 2','2019-06-21 17:13:51'),(11729,111111,NULL,'denpasar',2,NULL,'',11724,'2017-12-13 21:00:00',10000,0,'keterangan 2','2019-06-21 17:13:51'),(11730,111111,NULL,'wp satu',2,NULL,'',11725,'2017-12-13 20:00:00',10000,0,'keterangan satu','2019-06-21 17:13:51'),(11731,111111,NULL,'pekanbaru',2,NULL,'',11726,'2018-11-17 04:05:00',10000,NULL,'keterangan','2019-06-21 17:13:52'),(11732,111111,NULL,'H ARDI',1,NULL,'',11727,'2018-06-08 13:59:59',54000,-770,'Nasi Goreng^2^10000.00|Es Jeruk^2^5000.00|Peyek^2^2000.00','2019-06-21 17:13:52');

/*Table structure for table `tb_transaksi_dept` */

DROP TABLE IF EXISTS `tb_transaksi_dept`;

CREATE TABLE `tb_transaksi_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departement` varchar(50) DEFAULT NULL,
  `revenue` double DEFAULT NULL,
  `date_file` varchar(22) DEFAULT NULL,
  `insert_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pcid` varchar(10) DEFAULT NULL,
  `bill_no` varchar(10) DEFAULT NULL,
  `room_no` int(5) DEFAULT NULL,
  `remark` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `tb_transaksi_dept` */

insert  into `tb_transaksi_dept`(`id`,`departement`,`revenue`,`date_file`,`insert_data`,`pcid`,`bill_no`,`room_no`,`remark`) values (1,'LOTUS RESTO',49586.78,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00011',0,'1-Cash'),(2,'LOTUS RESTO',49586.78,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00012',0,'1-Cash'),(3,'LOTUS RESTO',49586.78,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00013',0,'1-Cash'),(4,'LOTUS RESTO',49586.78,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(5,'LOTUS RESTO',49586.78,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(6,'LOTUS RESTO',49586.78,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(7,'LOTUS RESTO',12402066.12,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00011',0,'1-Cash'),(8,'LOTUS RESTO',12402066.12,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00012',0,'1-Cash'),(9,'LOTUS RESTO',12402066.12,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00013',0,'1-Cash'),(10,'LOTUS RESTO',12402066.12,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(11,'LOTUS RESTO',12402066.12,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(12,'LOTUS RESTO',12402066.12,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(13,'LOTUS RESTO',28512.4,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00011',0,'1-Cash'),(14,'LOTUS RESTO',28512.4,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00012',0,'1-Cash'),(15,'LOTUS RESTO',28512.4,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00013',0,'1-Cash'),(16,'LOTUS RESTO',28512.4,'2019-10-09 00:00:00.0','2019-10-23 15:09:09','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(17,'LOTUS RESTO',28512.4,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(18,'LOTUS RESTO',28512.4,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(19,'LOTUS RESTO',41322.32,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00011',0,'1-Cash'),(20,'LOTUS RESTO',41322.32,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00012',0,'1-Cash'),(21,'LOTUS RESTO',41322.32,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00013',0,'1-Cash'),(22,'LOTUS RESTO',41322.32,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(23,'LOTUS RESTO',41322.32,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(24,'LOTUS RESTO',41322.32,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(25,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00011',0,'1-Cash'),(26,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00012',0,'1-Cash'),(27,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00013',0,'1-Cash'),(28,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(29,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(30,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(31,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00011',0,'1-Cash'),(32,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00012',0,'1-Cash'),(33,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:10','O-01','LT0JA00013',0,'1-Cash'),(34,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(35,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(36,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(37,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00011',0,'1-Cash'),(38,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00012',0,'1-Cash'),(39,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00013',0,'1-Cash'),(40,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(41,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(42,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(43,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00011',0,'1-Cash'),(44,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00012',0,'1-Cash'),(45,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00013',0,'1-Cash'),(46,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00014',325,'-*PUBLISH RATE'),(47,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00015',0,'1-F&B CITYLEDGER'),(48,'LOTUS RESTO',0,'2019-10-09 00:00:00.0','2019-10-23 15:09:11','O-01','LT0JA00016',325,'-*PUBLISH RATE'),(49,'R001 Room Charge',7999468,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(50,'R003 Extra Bed',264463,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(51,'R004 Noshow Fee',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(52,'R005 Cxld. Fee',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(53,'R006 Additional Room Charge',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(54,'R007 Late Check Out',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(55,'RA01 Room Adjustment',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(56,'PCKG Package',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(57,'BNQT BANQUET',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(58,'O-01 LOTUS RESTO',283058,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(59,'O-02 ROOM SERVICE',342744,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(60,'RV-8 Mini Bar Reversal',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(61,'XF&B Adjustment F&B',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(62,'CBRK Coffee Break',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(63,'DINE Dinner',0,'20191005','2019-10-23 15:10:05',NULL,NULL,NULL,NULL),(64,'GLDR GALA DINNER',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(65,'LNCH Lunch',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(66,'ML01 Breakfast',1917355,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(67,'LSBK LOSS AND BREAKAGE',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(68,'XSPA SPA Adjustment',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(69,'OPBL OPENING BALANCE',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(70,'CC25 CHARGE CARD 2,5 %',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(71,'FACI Meeting Facilities',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL),(72,'HALL Meeting Room',0,'20191005','2019-10-23 15:10:06',NULL,NULL,NULL,NULL);

/* Trigger structure for table `ms_menu` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trig_newmenu` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trig_newmenu` AFTER INSERT ON `ms_menu` FOR EACH ROW BEGIN
	INSERT INTO ms_privilege (ms_role_id,ms_menu_id,`status`) 
	VALUE ('1',new.id_inc,'1');
    END */$$


DELIMITER ;

/* Function  structure for function  `bayar_terakhir` */

/*!50003 DROP FUNCTION IF EXISTS `bayar_terakhir` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `bayar_terakhir`(vnpwp VARCHAR(100)) RETURNS date
BEGIN
    
	DECLARE i INT;
	DECLARE res DATE;
	SELECT COUNT(kd_trx) INTO i FROM tb_transaksi WHERE npwp=vnpwp;
	IF i >0 THEN 
		SELECT tanggal_insert INTO res FROM tb_transaksi WHERE npwp=vnpwp ORDER BY tanggal_insert DESC LIMIT 1;
	ELSE
		SET res=NULL;
	END IF;
	RETURN res;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
