-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for furniture
CREATE DATABASE IF NOT EXISTS `furniture` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `furniture`;

-- Dumping structure for table furniture.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_admin` varchar(256) NOT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table furniture.admin: ~3 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama_admin`) VALUES
  (1, 'admin@admin.com', '$2y$12$CzTPDRz6XkQuTVV5Dy.fMevPLdIKPTD4.9XgP4ZdPP9P8eCDF3N3y', 'Admin Default'),
  (5, 'indrawanrhadi@gmail.com', '$2y$12$qun1mxwvx63dyNe2ondsKuBG8RRqF4CBf8GyOkf1/ejlWU3DeJbde', 'Indrawan');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table furniture.check_out
CREATE TABLE IF NOT EXISTS `check_out` (
  `id_checkout` varchar(250) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_barang` varchar(250) DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `bayar_via` varchar(150) DEFAULT NULL,
  `foto_bukti_tf` text DEFAULT NULL,
  `status_pesanan` varchar(50) DEFAULT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_checkout`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table furniture.check_out: ~5 rows (approximately)
/*!40000 ALTER TABLE `check_out` DISABLE KEYS */;
INSERT INTO `check_out` (`id_checkout`, `id_pelanggan`, `id_barang`, `ongkir`, `total_harga`, `bayar_via`, `foto_bukti_tf`, `status_pesanan`, `tgl_pesan`) VALUES
  ('CKO112305760', 5, '1||4||', 75000, 1075000, 'Mandiri', '1634556768tony.jpg', 'Dikemas', '2022-06-03 20:58:40'),
  ('CKO1667100272', 5, '1||6||', 75000, 3300000, 'BNI', '837139732WhatsApp_Image_2021-11-28_at_17.37.07-removebg-preview.png', 'Dikemas', '2022-06-03 18:53:47'),
  ('CKO741500755', 5, '4||1||', 180000, 695000, 'BNI', '2032352166WhatsApp Image 2022-05-31 at 16.13.11.jpeg', 'Dikemas', '2022-06-23 21:19:14'),
  ('CKO836289971', 7, '1||3||', 180000, 880000, 'Mandiri', '1303375048btik-tunik.jpg', 'Dikemas', '2022-06-14 19:18:19'),
  ('CKO927242925', 5, '4||3||5||', 75000, 670000, 'BNI', '644053627hulk.jpg', 'Dikemas', '2022-06-03 21:12:28'),
  ('CKO927778902', 5, '1||4||', 75000, 1075000, 'Mandiri', '2081805558oreo.jpg', 'Dikemas', '2022-06-03 20:58:40');
/*!40000 ALTER TABLE `check_out` ENABLE KEYS */;

-- Dumping structure for table furniture.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_pelanggan` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `asal_kota` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table furniture.pelanggan: ~2 rows (approximately)
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` (`id_pelanggan`, `email`, `password`, `nama_pelanggan`, `no_hp`, `asal_kota`, `alamat`) VALUES
  (5, 'rhadi.indrawankkpi@gmail.com', '$2y$12$obd08EPI9EvxAvRoxd0N8ezGkoofXzjFKvR.FGn6jWf.svqHwwzCa', 'rhadi indrawan', '085255554789', 'Makassar', 'Jl. pongtiku 1'),
  (7, 'indrawanrhadi@gmail.com', '$2y$12$PC6AFKBF6dS3buWnYJKHxuRJIoihVSaL5.8gOxqk01sq/C.qkhb1S', 'Indra Herlambang', '085255554789', 'Bandung', 'Jl. sahabat');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- Dumping structure for table furniture.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` varchar(250) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jum_dibeli` int(11) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table furniture.pesanan: ~0 rows (approximately)
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;

-- Dumping structure for table furniture.tb_barang
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(250) DEFAULT NULL,
  `harga_barang` double DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `desk_barang` text DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table furniture.tb_barang: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;
INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga_barang`, `berat`, `desk_barang`, `stok`, `foto`) VALUES
  (1, 'Meja', 500000, 20, 'meja belajar', 19, '1782691124meja.jpg'),
  (3, 'Kursi', 200000, 10, 'Kursi Belajar', 50, '1945586718kursi.jpg'),
  (4, 'Lampu Belajar', 15000, 30, 'Lampu Belajar', 59, '1432898208lampu.jpg'),
  (5, 'Vas Bunga', 40000, 10, 'Vas Bunga', 50, '1183699954vas.jpg'),
  (6, 'Lukisan indah', 400000, 30, 'Lukisan Indah', 40, '144256599lukisan.jpg');
/*!40000 ALTER TABLE `tb_barang` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
