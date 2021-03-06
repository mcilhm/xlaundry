/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.37-MariaDB : Database - xlaundry
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xlaundry` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `bahan` */

DROP TABLE IF EXISTS `bahan`;

CREATE TABLE `bahan` (
  `id_bahan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(50) NOT NULL,
  `harga_kiloan` decimal(13,0) NOT NULL DEFAULT '0',
  `harga_satuan` decimal(13,0) NOT NULL DEFAULT '0',
  `status_bahan` int(1) NOT NULL COMMENT '0 = Tidak aktif, 1 = Aktif',
  `waktu_pembuatan` datetime DEFAULT NULL,
  `waktu_perubahan_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bahan` */

insert  into `bahan`(`id_bahan`,`nama_bahan`,`harga_kiloan`,`harga_satuan`,`status_bahan`,`waktu_pembuatan`,`waktu_perubahan_terakhir`) values (1,'Kain Wol',10000,3000,1,'2019-06-27 22:21:49','2019-06-27 22:21:49'),(2,'Kain Katun',10000,5000,1,'2019-07-03 01:34:28','2019-07-03 01:34:28');

/*Table structure for table `mesin_cuci` */

DROP TABLE IF EXISTS `mesin_cuci`;

CREATE TABLE `mesin_cuci` (
  `id_mesin_cuci` int(3) NOT NULL AUTO_INCREMENT,
  `nama_mesin_cuci` varchar(20) NOT NULL,
  `maksimal_berat` int(3) NOT NULL DEFAULT '0',
  `status_mesin_cuci` int(1) NOT NULL DEFAULT '0' COMMENT '0 = Tersedia, 1 = Dipakai, 2 = Rusak',
  `waktu_pembuatan` datetime NOT NULL,
  `waktu_perubahan_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mesin_cuci`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mesin_cuci` */

insert  into `mesin_cuci`(`id_mesin_cuci`,`nama_mesin_cuci`,`maksimal_berat`,`status_mesin_cuci`,`waktu_pembuatan`,`waktu_perubahan_terakhir`) values (1,'Mesin Cuci 1',10,1,'2019-06-27 22:22:11','2019-06-28 11:14:56'),(2,'Mesin Cuci 2',7,1,'2019-07-03 01:34:58','2019-07-04 01:38:22');

/*Table structure for table `paketan` */

DROP TABLE IF EXISTS `paketan`;

CREATE TABLE `paketan` (
  `id_paketan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_paketan` varchar(100) NOT NULL,
  `total_harga_paketan` decimal(13,0) NOT NULL DEFAULT '0',
  `tipe_potongan_paketan` int(1) NOT NULL COMMENT '0 = Rupiah, 1 = Persen',
  `potongan_harga_paketan` double NOT NULL,
  `waktu_pembuatan` datetime NOT NULL,
  `waktu_perubahan_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_paketan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `paketan` */

insert  into `paketan`(`id_paketan`,`nama_paketan`,`total_harga_paketan`,`tipe_potongan_paketan`,`potongan_harga_paketan`,`waktu_pembuatan`,`waktu_perubahan_terakhir`) values (1,'Paketan Kain Wol',99000,1,20,'2019-06-27 22:23:42','2019-07-03 01:37:34'),(2,'Paketan Wol dan Katun',95000,0,5000,'2019-07-03 01:37:11','2019-07-03 01:40:34');

/*Table structure for table `paketan_detail` */

DROP TABLE IF EXISTS `paketan_detail`;

CREATE TABLE `paketan_detail` (
  `id_paketan_detail` int(3) NOT NULL AUTO_INCREMENT,
  `id_paketan` int(3) NOT NULL,
  `id_bahan` int(3) NOT NULL,
  `minimal_berat` int(3) NOT NULL,
  `harga_paketan` decimal(13,0) NOT NULL,
  PRIMARY KEY (`id_paketan_detail`),
  KEY `id_paketan` (`id_paketan`),
  CONSTRAINT `paketan_detail_ibfk_1` FOREIGN KEY (`id_paketan`) REFERENCES `paketan` (`id_paketan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `paketan_detail` */

insert  into `paketan_detail`(`id_paketan_detail`,`id_paketan`,`id_bahan`,`minimal_berat`,`harga_paketan`) values (1,1,1,10,100000),(6,2,1,5,50000),(7,2,2,5,50000);

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT,
  `id_pesanan` varchar(20) NOT NULL,
  `total_harga` decimal(13,0) NOT NULL,
  `status_pembayaran` int(1) NOT NULL DEFAULT '0',
  `waktu_pembayaran` datetime DEFAULT NULL,
  `nama_rekening` varchar(100) DEFAULT NULL,
  `nomor_rekening` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_pesanan` (`id_pesanan`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_pesanan`,`total_harga`,`status_pembayaran`,`waktu_pembayaran`,`nama_rekening`,`nomor_rekening`,`bank`,`bukti_pembayaran`) values (1,'HLBOOK-000001',95000,1,NULL,'demo','2321412','BCA','d2.PNG');

/*Table structure for table `pemesan` */

DROP TABLE IF EXISTS `pemesan`;

CREATE TABLE `pemesan` (
  `id_pemesan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat_pemesan` text,
  `telepon_pemesan` varchar(14) DEFAULT NULL,
  `email_pemesan` varchar(100) DEFAULT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pemesan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pemesan` */

insert  into `pemesan`(`id_pemesan`,`nama_pemesan`,`alamat_pemesan`,`telepon_pemesan`,`email_pemesan`,`id_pengguna`) values (1,'demo','Jakarta','42142','demo@gmail.com','demo');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(100) NOT NULL,
  `tipe_pengguna` int(1) NOT NULL DEFAULT '0' COMMENT '0 = admin, 1 = pengguna',
  `status_pengguna` int(1) NOT NULL COMMENT '0 = Tidak aktif, 1 = Aktif',
  `waktu_pembuatan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_pengguna`,`kata_sandi`,`tipe_pengguna`,`status_pengguna`,`waktu_pembuatan`) values ('admin','admin',0,1,'2019-06-27 22:20:39'),('ayam','ayam',1,1,'2019-06-28 04:38:13'),('bebek','bebek',1,1,'2019-06-28 04:38:43'),('demo','demo',1,1,'2019-06-28 00:32:07');

/*Table structure for table `pengiriman` */

DROP TABLE IF EXISTS `pengiriman`;

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(3) NOT NULL AUTO_INCREMENT,
  `nama_pengiriman` varchar(100) NOT NULL,
  `lama_pengiriman` int(2) NOT NULL COMMENT 'Dalam Bentuk Jam',
  `harga_pengiriman` decimal(13,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pengiriman` */

insert  into `pengiriman`(`id_pengiriman`,`nama_pengiriman`,`lama_pengiriman`,`harga_pengiriman`) values (2,'Paket Express',2,20000),(3,'Paket Standar',5,10000);

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(20) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat_pemesan` text,
  `telepon_pemesan` varchar(14) DEFAULT NULL,
  `email_pemesan` varchar(100) DEFAULT NULL,
  `estimasi_pesanan` int(3) NOT NULL DEFAULT '0' COMMENT 'Dalam Bentuk Hari',
  `total_harga` decimal(13,0) NOT NULL DEFAULT '0',
  `status_pesanan` int(1) NOT NULL COMMENT '0 = Antrian, 1 = Proses Cuci, 2 = Proses Setrika, 3 = Sudah Siap diambil/diantar',
  `tipe_pesanan` int(2) NOT NULL COMMENT '0 = kiloan, 1 = Satuan',
  `id_mesin_cuci` int(3) DEFAULT NULL,
  `id_paketan` int(3) DEFAULT NULL,
  `id_pengiriman` int(3) DEFAULT NULL COMMENT 'Jika null maka pesanan diambil',
  `id_pengguna` varchar(20) DEFAULT NULL COMMENT 'Jika null maka bukan member',
  `id_promo` int(3) DEFAULT NULL COMMENT 'Jika null maka tidak pakai promo',
  `waktu_pesanan` datetime NOT NULL,
  `waktu_perubahan_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesanan`),
  KEY `id_mesin_cuci` (`id_mesin_cuci`),
  KEY `id_paketan` (`id_paketan`),
  KEY `id_pengiriman` (`id_pengiriman`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_promo` (`id_promo`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_mesin_cuci`) REFERENCES `mesin_cuci` (`id_mesin_cuci`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_paketan`) REFERENCES `paketan` (`id_paketan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `pesanan_ibfk_5` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id_pesanan`,`nama_pemesan`,`alamat_pemesan`,`telepon_pemesan`,`email_pemesan`,`estimasi_pesanan`,`total_harga`,`status_pesanan`,`tipe_pesanan`,`id_mesin_cuci`,`id_paketan`,`id_pengiriman`,`id_pengguna`,`id_promo`,`waktu_pesanan`,`waktu_perubahan_terakhir`) values ('HLBOOK-000001','demo','Jakarta','42142','demo@gmail.com',2,95000,1,0,1,2,2,'demo',2,'2019-07-04 04:58:17','2019-07-04 05:24:00');

/*Table structure for table `pesanan_detail` */

DROP TABLE IF EXISTS `pesanan_detail`;

CREATE TABLE `pesanan_detail` (
  `id_pesanan_detail` int(3) NOT NULL AUTO_INCREMENT,
  `id_pesanan` varchar(20) NOT NULL,
  `id_bahan` int(3) DEFAULT NULL,
  `jumlah` int(3) NOT NULL COMMENT 'Ikutin sesuai pesanannya jika satuan maka ini jumlah satu, jika kiloan maka ini jumlah berat',
  `harga` decimal(13,0) NOT NULL,
  PRIMARY KEY (`id_pesanan_detail`),
  KEY `id_pesanan` (`id_pesanan`),
  KEY `id_bahan` (`id_bahan`),
  CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan_detail` */

insert  into `pesanan_detail`(`id_pesanan_detail`,`id_pesanan`,`id_bahan`,`jumlah`,`harga`) values (35,'HLBOOK-000001',1,5,50000),(36,'HLBOOK-000001',2,10,100000);

/*Table structure for table `pesanan_histori` */

DROP TABLE IF EXISTS `pesanan_histori`;

CREATE TABLE `pesanan_histori` (
  `id_pesanan_histori` int(3) NOT NULL AUTO_INCREMENT,
  `id_pesanan` varchar(20) NOT NULL,
  `status_pesanan` int(1) NOT NULL COMMENT '0 = Antrian, 1 = Proses Cuci, 2 = Proses Setrika, 3 = Sudah Siap diambil/diantar',
  `waktu_histori` datetime NOT NULL,
  PRIMARY KEY (`id_pesanan_histori`),
  KEY `id_pesanan` (`id_pesanan`),
  CONSTRAINT `pesanan_histori_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan_histori` */

insert  into `pesanan_histori`(`id_pesanan_histori`,`id_pesanan`,`status_pesanan`,`waktu_histori`) values (53,'HLBOOK-000001',0,'2019-07-04 04:58:17'),(54,'HLBOOK-000001',0,'2019-07-04 04:58:17'),(55,'HLBOOK-000001',0,'2019-07-04 04:58:17'),(56,'HLBOOK-000001',1,'2019-07-04 05:24:00');

/*Table structure for table `promo` */

DROP TABLE IF EXISTS `promo`;

CREATE TABLE `promo` (
  `id_promo` int(3) NOT NULL AUTO_INCREMENT,
  `nama_promo` varchar(50) NOT NULL,
  `waktu_mulai_promo` datetime NOT NULL,
  `waktu_akhir_promo` datetime NOT NULL,
  `potongan_harga_promo` double NOT NULL,
  `tipe_potongan_promo` int(1) NOT NULL COMMENT '0 = Rupiah, 1 = Persen',
  `tipe_promo` int(1) NOT NULL COMMENT '0 =Semua, 1 = Pelanggan',
  `waktu_pembuatan` datetime NOT NULL,
  `waktu_perubahan_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `promo` */

insert  into `promo`(`id_promo`,`nama_promo`,`waktu_mulai_promo`,`waktu_akhir_promo`,`potongan_harga_promo`,`tipe_potongan_promo`,`tipe_promo`,`waktu_pembuatan`,`waktu_perubahan_terakhir`) values (1,'Promo Lebaran','2019-06-27 00:00:00','2019-06-30 00:00:00',20,1,0,'2019-06-27 22:23:20','2019-06-27 22:23:20'),(2,'Promo bulan syawal','2019-07-01 00:00:00','2019-07-06 23:59:00',20000,0,0,'2019-07-03 01:36:46','2019-07-03 01:36:46');

/* Trigger structure for table `paketan_detail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tg_update_total_harga_paketan_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tg_update_total_harga_paketan_update` AFTER UPDATE ON `paketan_detail` FOR EACH ROW BEGIN  
    
    DECLARE total_harga_ DECIMAL(13,0);
    DECLARE potongan_harga_paketan_ DOUBLE;
    DECLARE tipe_potongan_paketan_ INT(1);
  
    
    SELECT
	B.total_harga,
	A.tipe_potongan_paketan,
	A.potongan_harga_paketan
    INTO 
	total_harga_,
	tipe_potongan_paketan_,
	potongan_harga_paketan_
    FROM paketan AS A
    INNER JOIN (
	SELECT
		id_paketan,
		SUM(harga_paketan) AS total_harga
	FROM paketan_detail
	WHERE id_paketan = OLD.id_paketan
	GROUP BY id_paketan
    ) AS B ON A.id_paketan = B.id_paketan
    WHERE A.id_paketan = OLD.id_paketan;
    
    
    UPDATE paketan
    SET total_harga_paketan = total_harga_ - (IF(tipe_potongan_paketan_ = 0, potongan_harga_paketan_, total_harga_ * potongan_harga_paketan_ / 100))
    WHERE id_paketan = OLD.id_paketan; 
    
    END */$$


DELIMITER ;

/* Trigger structure for table `paketan_detail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tg_update_total_harga_paketan_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tg_update_total_harga_paketan_delete` AFTER DELETE ON `paketan_detail` FOR EACH ROW BEGIN  
    
    DECLARE total_harga_ DECIMAL(13,0);
    DECLARE potongan_harga_paketan_ DOUBLE;
    DECLARE tipe_potongan_paketan_ INT(1);
  
    
    SELECT
	B.total_harga,
	A.tipe_potongan_paketan,
	A.potongan_harga_paketan
    INTO 
	total_harga_,
	tipe_potongan_paketan_,
	potongan_harga_paketan_
    FROM paketan AS A
    INNER JOIN (
	SELECT
		id_paketan,
		SUM(harga_paketan) AS total_harga
	FROM paketan_detail
	WHERE id_paketan = OLD.id_paketan
	GROUP BY id_paketan
    ) AS B ON A.id_paketan = B.id_paketan
    WHERE A.id_paketan = OLD.id_paketan;
    
    
    UPDATE paketan
    SET total_harga_paketan = total_harga_ - (IF(tipe_potongan_paketan_ = 0, potongan_harga_paketan_, total_harga_ * potongan_harga_paketan_ / 100))
    WHERE id_paketan = OLD.id_paketan; 
    
    END */$$


DELIMITER ;

/* Trigger structure for table `pesanan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tg_insert_pesanan_history` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tg_insert_pesanan_history` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
		
	INSERT INTO `xlaundry`.`pesanan_histori`
		(`id_pesanan`,
		`status_pesanan`,
		`waktu_histori`)
	VALUES (NEW.id_pesanan,
		NEW.status_pesanan,
		NOW());
		
	
	INSERT INTO `xlaundry`.`pembayaran` 
		(`id_pesanan`,
		`total_harga`) 
	VALUES (NEW.id_pesanan, NEW.total_harga);
	
    END */$$


DELIMITER ;

/* Trigger structure for table `pesanan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tg_update_pesanan_history` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tg_update_pesanan_history` AFTER UPDATE ON `pesanan` FOR EACH ROW BEGIN
		
	INSERT INTO `xlaundry`.`pesanan_histori`
		(`id_pesanan`,
		`status_pesanan`,
		`waktu_histori`)
	VALUES (NEW.id_pesanan,
		NEW.status_pesanan,
		NOW());
    END */$$


DELIMITER ;

/* Procedure structure for procedure `sp_get_estimation_laundry_time` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_get_estimation_laundry_time` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_estimation_laundry_time`(IN idpesanan VARCHAR(20))
BEGIN
    
	DECLARE id_mesin_cuci_ int(3);
	DECLARE maksimal_berat_ INT(3);
	DECLARE tipe_pesanan_ INT(3);
    	DECLARE total_berat_pesanan_ int(3);
    	declare estimasi_pesanan_ int(3);
	
	select
		 id_mesin_cuci,
		maksimal_berat
	into
		id_mesin_cuci_,
		maksimal_berat_ 
	from mesin_cuci
	where status_mesin_cuci = 0
	limit 1;
	
	SELECT
		tipe_pesanan
	INTO
		tipe_pesanan_
	FROM pesanan
	WHERE id_pesanan = idpesanan;
	
	SELECT
		SUM(jumlah)
	INTO 
		total_berat_pesanan_
	FROM pesanan AS a 
	INNER JOIN pesanan_detail AS b ON a.id_pesanan = b.id_pesanan
	WHERE a.id_pesanan = idpesanan
	GROUP BY a.id_pesanan;
	
	IF(id_mesin_cuci_ IS NOT NULL) THEN
	
		UPDATE mesin_cuci
		SET status_mesin_cuci = 1
		WHERE id_mesin_cuci = id_mesin_cuci_;
		
		UPDATE pesanan
		SET id_mesin_cuci = id_mesin_cuci_
		WHERE id_pesanan = idpesanan;
		
		SET estimasi_pesanan_ = CEIL(total_berat_pesanan_/maksimal_berat_);
		
		UPDATE pesanan
		SET estimasi_pesanan = estimasi_pesanan_,
		id_mesin_cuci = id_mesin_cuci_
		WHERE id_pesanan = idpesanan;
	ELSE 
		SELECT
			 id_mesin_cuci,
			 maksimal_berat
		INTO 
			id_mesin_cuci_,
			maksimal_berat_
		FROM mesin_cuci
		WHERE status_mesin_cuci = 1
		LIMIT 1;
		
		UPDATE mesin_cuci
		SET status_mesin_cuci = 1
		WHERE id_mesin_cuci = id_mesin_cuci_;
		
		UPDATE pesanan
		SET id_mesin_cuci = id_mesin_cuci_
		WHERE id_pesanan = idpesanan;
		
		SET estimasi_pesanan_ = CEIL(total_berat_pesanan_/maksimal_berat_);
		
		UPDATE pesanan
		SET estimasi_pesanan = estimasi_pesanan_,
		id_mesin_cuci = id_mesin_cuci_
		WHERE id_pesanan = idpesanan;
	END IF;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
