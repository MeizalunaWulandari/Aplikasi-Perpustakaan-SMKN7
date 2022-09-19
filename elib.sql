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
	(1, 'Admin', '$2y$10$JHoiNis267ppKdYTiNrAeu7rnSTnZuhKuQSdnWfCksBzJuDTP7TvW', 1, '2022-09-04 22:53:51');
/*!40000 ALTER TABLE `tbelib_admin` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_booking
CREATE TABLE IF NOT EXISTS `tbelib_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `notelp` char(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `buku_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tanggal_booking` datetime DEFAULT NULL,
  `created_at` varchar(20) CHARACTER SET utf8 NOT NULL,
  `updated_at` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbelib_booking_tbelib_buku` (`buku_id`) USING BTREE,
  CONSTRAINT `FK_tbelib_booking_tbelib_buku` FOREIGN KEY (`buku_id`) REFERENCES `tbelib_buku` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='Status :\r\n1 = Unverified\r\n2 = Verified\r\n3 = Due Date';

-- Dumping data for table elibrary.tbelib_booking: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbelib_booking` DISABLE KEYS */;
REPLACE INTO `tbelib_booking` (`id`, `nisn`, `nama`, `notelp`, `buku_id`, `status`, `tanggal_booking`, `created_at`, `updated_at`) VALUES
	(3, 21834761, 'RAKEIN NARAYA PUTRA', '85845947669', NULL, 1, NULL, '2022-09-18 09:49:42', '2022-09-18 09:49:42'),
	(4, 32277549, 'AFINA KHOIRI AZIZAH', '6285845947669', NULL, 1, NULL, '2022-09-18 21:16:54', '2022-09-18 21:16:54');
/*!40000 ALTER TABLE `tbelib_booking` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_buku
CREATE TABLE IF NOT EXISTS `tbelib_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover` varchar(50) CHARACTER SET utf8 NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pengarang` varchar(100) CHARACTER SET utf8 NOT NULL,
  `singkatan_pengarang` char(10) CHARACTER SET utf8 NOT NULL,
  `tempat_terbit` varchar(50) CHARACTER SET utf8 NOT NULL,
  `penerbit` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `no_klasifikasi` varchar(10) CHARACTER SET utf8 NOT NULL,
  `tahun_buku` year(4) NOT NULL,
  `inisial_buku` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `jenis_id` int(11) NOT NULL DEFAULT '0',
  `kategori_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbelib_buku_tbelib_kategori` (`kategori_id`),
  KEY `FK_tbelib_buku_index_tbelib_jenis_buku` (`jenis_id`),
  CONSTRAINT `FK_tbelib_buku_index_tbelib_jenis_buku` FOREIGN KEY (`jenis_id`) REFERENCES `tbelib_jenis_buku` (`id`),
  CONSTRAINT `FK_tbelib_buku_tbelib_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `tbelib_kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elibrary.tbelib_buku: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbelib_buku` DISABLE KEYS */;
REPLACE INTO `tbelib_buku` (`id`, `cover`, `judul`, `slug`, `pengarang`, `singkatan_pengarang`, `tempat_terbit`, `penerbit`, `tahun_terbit`, `no_klasifikasi`, `tahun_buku`, `inisial_buku`, `quantity`, `stock`, `jenis_id`, `kategori_id`) VALUES
	(2, 'coverbook.png', 'Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X', 'pendidikan-agama-katholik-dan-budi-pekerti-untuk-sma-smk-kelas-x', 'F. Sulis Bayu Setyawan', 'Bay', 'Jakarta', 'Kementrian Pendidikan', '2021', '200,1', '2021', 'P', 1, 1, 1, 1),
	(3, 'coverbook.png', 'Pendidikan Agama Katholik K13 Dan Budi Pekerti Untuk SMA/SMK Kelas X', 'pendidikan-agama-katholik-k13-dan-budi-pekerti-untuk-sma-smk-kelas-x', 'F. Sulis Bayu Setyawan', 'Bay', 'Jakarta', 'Kementrian Pendidikan', '2021', '200,1', '2021', 'P', 1, 1, 1, 2),
	(4, 'coverbook.png', 'Pendidikan Agama Kristen Dan Budi Pekerti Untuk SMA/SMK Kelas X', 'pendidikan-agama-kristen-dan-budi-pekerti-untuk-sma-smk-kelas-x', 'F. Sulis Bayu Setyawan', 'Bay', 'Jakarta', 'Kementrian Pendidikan', '2021', '200,1', '2021', 'P', 1, 1, 2, 1);
/*!40000 ALTER TABLE `tbelib_buku` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_buku_detail
CREATE TABLE IF NOT EXISTS `tbelib_buku_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_induk` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `isbn` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `buku_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbelib_buku_tbelib_buku_index` (`buku_id`) USING BTREE,
  CONSTRAINT `FK_tbelib_buku_detail_tbelib_buku` FOREIGN KEY (`buku_id`) REFERENCES `tbelib_buku` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='Status\r\n0 = Not Ready\r\n1 = Ready';

-- Dumping data for table elibrary.tbelib_buku_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbelib_buku_detail` DISABLE KEYS */;
REPLACE INTO `tbelib_buku_detail` (`id`, `no_induk`, `isbn`, `status`, `buku_id`) VALUES
	(1, '262/SMKN7/H.2021', '111-111-111-111-0', 1, 2),
	(2, '267/SMKN7/H.2021', '111-111-111-111-0', 1, 3),
	(3, '268/SMKN7/H.2021', '111-111-111-111-0', 1, 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elibrary.tbelib_jenis_buku: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbelib_jenis_buku` DISABLE KEYS */;
REPLACE INTO `tbelib_jenis_buku` (`id`, `keterangan`) VALUES
	(1, 'Fisik'),
	(2, 'PDF');
/*!40000 ALTER TABLE `tbelib_jenis_buku` ENABLE KEYS */;

-- Dumping structure for table elibrary.tbelib_kategori
CREATE TABLE IF NOT EXISTS `tbelib_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `type` int(11) DEFAULT NULL,
  `slug` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='type :\r\n1 = kategori\r\n2 = kurikulum';

-- Dumping data for table elibrary.tbelib_kategori: ~0 rows (approximately)
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
	(105, 'RAKEIN NARAYA PUTRA', '0021834761', '7f8e0f5a848549fb05d12b32de7a8309', 4, 0, '2021-05-03 04:54:51'),
	(106, 'AFINA KHOIRI AZIZAH', '0032277549', '875ef7ef98c51237a9fbbf5c50431e89', 4, 0, '2021-05-03 04:55:02'),
	(107, 'AHMAD NAFIQ UDIN', '0046058552', 'a8130527e1059350302b529be6cfadf6', 4, 0, '2020-12-02 07:27:44'),
	(108, 'AJI DANANG KUSUMA', '0034271005', 'a530181561aebab430c70e5e503ac5b6', 4, 0, '2020-12-08 07:29:46'),
	(109, 'ALDY RULANDA FIRMANSYAH', '0028792732', '351a1a85f9ce3933e089452d16fc3271', 4, 0, '2020-11-30 07:09:37');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
