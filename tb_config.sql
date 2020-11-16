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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_config` */

insert  into `tb_config`(`kd_config`,`nama_wp`,`kode_aktivasi`,`last_id_database`,`kd_jenispajak`,`id_client`,`username`,`database_client`,`password`,`interval_process`,`path_csv`,`string_query`,`path_move`,`url_server`) values (16,'Tantiono','07028','0','9','200030330000','user','PX_FO_SITE,myoh_fo_db','1234',60,'D:\\\\etaxbapenda\\\\csv\\\\','SELECT auditdate, pcid, dept_name, revenue FROM [PX_FO_SITE].[dbo].[na_saleshis] a, [myoh_fo_db].[dbo].tbl_department b WHERE a.pciddueto = b.dept_code','D:\\\\etaxbapenda\\\\move\\\\','http://36.89.91.154:8080/etax/JavaJson/krmDataJson');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
