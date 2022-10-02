-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for elibrary
CREATE DATABASE IF NOT EXISTS `elibrary` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `elibrary`;

-- Dumping structure for procedure elibrary.sp_reset_quantity_stock_buku
DELIMITER //
CREATE PROCEDURE `sp_reset_quantity_stock_buku`()
BEGIN

UPDATE tbelib_buku SET quantity = 
	(SELECT COUNT(*) FROM tbelib_buku_detail WHERE buku_id = tbelib_buku.id);

UPDATE tbelib_buku SET stock = 
	(SELECT COUNT(*) FROM tbelib_buku_detail WHERE buku_id = tbelib_buku.id AND `status` = 1);

END//
DELIMITER ;

-- Dumping structure for table elibrary.tbelib_admin
CREATE TABLE IF NOT EXISTS `tbelib_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `level` int(11) NOT NULL,
  `login_terakhir` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elibrary.tbelib_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbelib_admin` DISABLE KEYS */;
REPLACE INTO `tbelib_admin` (`id`, `username`, `password`, `level`, `login_terakhir`) VALUES
	(1, 'Admin', '$2y$10$JHoiNis267ppKdYTiNrAeu7rnSTnZuhKuQSdnWfCksBzJuDTP7TvW', 1, '2022-10-02 13:47:17');
/*!40000 ALTER TABLE `tbelib_admin` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_booking
CREATE TABLE IF NOT EXISTS `tbelib_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(50) NOT NULL DEFAULT '',
  `nama` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `notelp` char(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `buku_detail_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tanggal_booking` datetime DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL COMMENT 'tanggal peminjaman/tanggal booking sama aja',
  `tanggal_pengembalian` date DEFAULT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `terlambat` int(11) DEFAULT '0' COMMENT 'hari (1 hari dst)',
  `denda` int(11) DEFAULT '0',
  `created_at` varchar(20) CHARACTER SET utf8 NOT NULL,
  `updated_at` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbelib_booking_tbelib_buku_detail` (`buku_detail_id`) USING BTREE,
  KEY `FK_tbelib_booking_tbelib_buku` (`buku_id`),
  CONSTRAINT `FK_tbelib_booking_tbelib_buku` FOREIGN KEY (`buku_id`) REFERENCES `tbelib_buku` (`id`),
  CONSTRAINT `FK_tbelib_booking_tbelib_buku_detail` FOREIGN KEY (`buku_detail_id`) REFERENCES `tbelib_buku_detail` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='Status :\r\n1 = Unverified\r\n2 = Verified\r\n3 = Due Date\r\n4 = Returned\r\n5 = Canceled';

-- Dumping data for table elibrary.tbelib_booking: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbelib_booking` DISABLE KEYS */;
REPLACE INTO `tbelib_booking` (`id`, `nisn`, `nama`, `notelp`, `buku_detail_id`, `buku_id`, `user_id`, `status`, `tanggal_booking`, `tanggal_peminjaman`, `tanggal_pengembalian`, `tanggal_dikembalikan`, `terlambat`, `denda`, `created_at`, `updated_at`) VALUES
	(1, '0021834761', 'RAKEIN NARAYA PUTRA', '628645312', 1, 2, 105, 4, '2022-10-02 22:18:19', '2022-10-02', '2022-10-09', '2022-10-02', 0, 0, '2022-10-02 22:18:20', '2022-10-02 22:19:42');
/*!40000 ALTER TABLE `tbelib_booking` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_buku
CREATE TABLE IF NOT EXISTS `tbelib_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover` varchar(100) CHARACTER SET utf8 NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pengarang` varchar(100) CHARACTER SET utf8 NOT NULL,
  `singkatan_pengarang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `tempat_terbit` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `penerbit` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `no_klasifikasi` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `tahun_buku` year(4) DEFAULT NULL,
  `inisial_buku` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `file_pdf` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `stock` int(11) DEFAULT '0',
  `jenis_id` int(11) NOT NULL DEFAULT '0',
  `kategori_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbelib_buku_tbelib_kategori` (`kategori_id`),
  KEY `FK_tbelib_buku_index_tbelib_jenis_buku` (`jenis_id`),
  CONSTRAINT `FK_tbelib_buku_index_tbelib_jenis_buku` FOREIGN KEY (`jenis_id`) REFERENCES `tbelib_jenis_buku` (`id`),
  CONSTRAINT `FK_tbelib_buku_tbelib_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `tbelib_kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elibrary.tbelib_buku: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbelib_buku` DISABLE KEYS */;
REPLACE INTO `tbelib_buku` (`id`, `cover`, `judul`, `slug`, `pengarang`, `singkatan_pengarang`, `tempat_terbit`, `penerbit`, `tahun_terbit`, `no_klasifikasi`, `tahun_buku`, `inisial_buku`, `file_pdf`, `quantity`, `stock`, `jenis_id`, `kategori_id`) VALUES
	(2, 'book-cover/BFL7SiUTx2UiEVEA7y0aBOQuqikcZ3leu8OfVZui.png', 'Pendidikan Agama Islam dan Budi Pekerti', 'pendidikan-agama-islam-dan-budi-pekerti', 'Ahmad Taufik, Nurwastuti Setyowati', 'TAU', 'Jakarta', 'Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi', '2021', '377', '2021', 'P', NULL, 3, 3, 1, 1);
/*!40000 ALTER TABLE `tbelib_buku` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_buku_detail
CREATE TABLE IF NOT EXISTS `tbelib_buku_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_induk` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `isbn` varchar(50) CHARACTER SET utf8 DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `buku_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbelib_buku_tbelib_buku_index` (`buku_id`) USING BTREE,
  CONSTRAINT `FK_tbelib_buku_detail_tbelib_buku` FOREIGN KEY (`buku_id`) REFERENCES `tbelib_buku` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='Status\r\n0 = Not Ready\r\n1 = Ready';

-- Dumping data for table elibrary.tbelib_buku_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbelib_buku_detail` DISABLE KEYS */;
REPLACE INTO `tbelib_buku_detail` (`id`, `no_induk`, `isbn`, `status`, `buku_id`) VALUES
	(1, '1/SMKN7/H.2021', NULL, 1, 2),
	(2, '2/SMKN7/H.2021', NULL, 1, 2),
	(3, '3/SMKN7/H.2021', NULL, 1, 2);
/*!40000 ALTER TABLE `tbelib_buku_detail` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_count
CREATE TABLE IF NOT EXISTS `tbelib_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_count` int(11) NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elibrary.tbelib_count: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbelib_count` DISABLE KEYS */;
REPLACE INTO `tbelib_count` (`id`, `total_count`, `keterangan`) VALUES
	(1, 500, 'Buku Telah Dibaca'),
	(2, 500, 'Total Kunjungan'),
	(3, 1230, 'Buku Tersedia');
/*!40000 ALTER TABLE `tbelib_count` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_jenis_buku
CREATE TABLE IF NOT EXISTS `tbelib_jenis_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elibrary.tbelib_jenis_buku: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbelib_jenis_buku` DISABLE KEYS */;
REPLACE INTO `tbelib_jenis_buku` (`id`, `keterangan`) VALUES
	(1, 'Fisik'),
	(5, 'PDF');
/*!40000 ALTER TABLE `tbelib_jenis_buku` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_kategori
CREATE TABLE IF NOT EXISTS `tbelib_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `type` int(11) DEFAULT NULL,
  `slug` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='type :\r\n1 = kategori\r\n2 = kurikulum';

-- Dumping data for table elibrary.tbelib_kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbelib_kategori` DISABLE KEYS */;
REPLACE INTO `tbelib_kategori` (`id`, `name`, `type`, `slug`) VALUES
	(1, 'Kurikulum Merdeka', 2, 'kurikulum-merdeka'),
	(2, 'Kurikulum K13', 2, 'kurikulum-k13');
/*!40000 ALTER TABLE `tbelib_kategori` ENABLE KEYS */;

-- Dumping structure for table elibrary.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `kelas` int(11) NOT NULL DEFAULT '0',
  `login_terakhir` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

-- Dumping data for table elibrary.tb_user: 5 rows
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
REPLACE INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `level`, `kelas`, `login_terakhir`) VALUES
	(105, 'RAKEIN NARAYA PUTRA', '0021834761', '7f8e0f5a848549fb05d12b32de7a8309', 4, 0, '2022-10-02 22:18:06'),
	(106, 'AFINA KHOIRI AZIZAH', '0032277549', '875ef7ef98c51237a9fbbf5c50431e89', 4, 0, '2022-10-02 17:04:12'),
	(107, 'AHMAD NAFIQ UDIN', '0046058552', 'a8130527e1059350302b529be6cfadf6', 4, 0, '2020-12-02 07:27:44'),
	(108, 'AJI DANANG KUSUMA', '0034271005', 'a530181561aebab430c70e5e503ac5b6', 4, 0, '2020-12-08 07:29:46'),
	(109, 'ALDY RULANDA FIRMANSYAH', '0028792732', '351a1a85f9ce3933e089452d16fc3271', 4, 0, '2020-11-30 07:09:37');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

-- Dumping structure for trigger elibrary.tbelib_booking_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `tbelib_booking_after_update` AFTER UPDATE ON `tbelib_booking` FOR EACH ROW BEGIN
 IF OLD.status = 1 AND NEW.status = 2 AND NEW.buku_detail_id IS NOT NULL
 THEN
     UPDATE tbelib_buku_detail
       SET `status` = 0
     WHERE id = NEW.buku_detail_id;
 END IF; 
 
 IF OLD.status = 2 AND NEW.status = 1 AND OLD.buku_detail_id IS NOT NULL
 THEN
     UPDATE tbelib_buku_detail
       SET `status` = 1
     WHERE id = OLD.buku_detail_id;
 END IF; 
 
 IF OLD.status = 2 AND NEW.status = 4 AND OLD.buku_detail_id IS NOT NULL
 THEN
     UPDATE tbelib_buku_detail
       SET `status` = 1
     WHERE id = OLD.buku_detail_id;
 END IF; 
 
 IF OLD.status = 4 AND NEW.status = 2 AND OLD.buku_detail_id IS NOT NULL
 THEN
     UPDATE tbelib_buku_detail
       SET `status` = 0
     WHERE id = OLD.buku_detail_id;
 END IF; 
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger elibrary.tbelib_buku_detail_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tbelib_buku_detail_after_delete` AFTER DELETE ON `tbelib_buku_detail` FOR EACH ROW BEGIN
 UPDATE tbelib_buku
    SET quantity = quantity - 1
	 WHERE id = OLD.buku_id;
 
 IF OLD.status = 1
 THEN
	 UPDATE tbelib_buku
   	SET stock = stock - 1
	 WHERE id = OLD.buku_id;
 END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger elibrary.tbelib_buku_detail_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tbelib_buku_detail_after_insert` AFTER INSERT ON `tbelib_buku_detail` FOR EACH ROW BEGIN
 UPDATE tbelib_buku
    SET quantity = quantity + 1
	 WHERE id = NEW.buku_id;
 
 IF NEW.status = 1
 THEN
	 UPDATE tbelib_buku
   	SET stock = stock + 1
	 WHERE id = NEW.buku_id;
 END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
