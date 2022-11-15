-- --------------------------------------------------------
-- Host:                         127.0.0.1
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

-- Dumping structure for table kedaiku.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `successfull` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kedaiku.auth_logins: 4 rows
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` (`id`, `user_id`, `firstname`, `lastname`, `role`, `ip_address`, `date`, `successfull`) VALUES
	(1, 1, 'ajwad', 'aqhari', '2', '127.0.0.1', '2022-08-08 02:25:49', 1),
	(2, 1, 'ajwad', 'aqhari', '1', '127.0.0.1', '2022-08-08 02:58:41', 1),
	(3, 1, 'ajwad', 'aqhari', '1', '127.0.0.1', '2022-08-08 11:02:27', 1),
	(4, 1, 'ajwad', 'aqhari', '1', '127.0.0.1', '2022-08-18 04:28:49', 1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;

-- Dumping structure for table kedaiku.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedvalidator` varchar(255) NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kedaiku.auth_tokens: 0 rows
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;

-- Dumping structure for table kedaiku.gambar
CREATE TABLE IF NOT EXISTS `gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nama_fail` varchar(100) DEFAULT NULL,
  `tingkatan` int(100) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kedaiku.gambar: ~11 rows (approximately)
/*!40000 ALTER TABLE `gambar` DISABLE KEYS */;
INSERT INTO `gambar` (`id`, `nama`, `nama_fail`, `tingkatan`, `kelas`) VALUES
	(1, 'AINUN', 'ainun.jpg', 5, 'SF'),
	(2, 'MUHD AIMAN', 'aiman.jpg', 5, 'ST'),
	(3, 'MUHD AQIL', 'aqil.jpg', 5, 'SP'),
	(4, 'MUHD HANIF', 'hanif.jpg', 5, 'SP'),
	(6, 'SITI HUMAIRAH', '1659593826_966d37a6c796df957bad.jpg', 5, 'ST'),
	(7, 'ALICE', '1659547910_485805af8a500be455f8.jpg', 5, 'SF'),
	(8, 'SITI UDAIMATUNUUR ', '1659620641_dec329092bc721355194.jpg', 5, 'ST'),
	(9, 'SITI UDAIMATUNUUR ', '1659620711_ebfcd067ef1923bee7b1.jpg', 5, 'ST'),
	(10, 'AINATUL', '1659621118_31d7868e617a9b100f72.jpg', 5, 'ST'),
	(11, 'AINATUL', '1659621276_faa647b6af9966bc2c3b.jpg', 5, 'ST'),
	(13, 'SAIFUL', '1659623099_2edb61c2d20cf6ae40b2.jpg', 5, 'SP');
/*!40000 ALTER TABLE `gambar` ENABLE KEYS */;

-- Dumping structure for table kedaiku.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kedaiku.produk: ~11 rows (approximately)
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`id`, `nama`, `gambar`, `keterangan`, `harga`, `deleted_at`) VALUES
	(1, 'AINUN', 'ainun.jpg', 'SF', 5.00, NULL),
	(2, 'MUHD AIMAN', 'aiman.jpg', 'ST', 5.00, NULL),
	(3, 'MUHD AQIL', 'aqil.jpg', 'SP', 5.00, NULL),
	(4, 'MUHD HANIF', 'hanif.jpg', 'SP', 5.00, NULL),
	(6, 'SITI HUMAIRAH', '1659593826_966d37a6c796df957bad.jpg', 'ST', 5.00, NULL),
	(7, 'ALICE', '1659547910_485805af8a500be455f8.jpg', 'SF', 5.00, NULL),
	(8, 'SITI UDAIMATUNUUR ', '1659620641_dec329092bc721355194.jpg', 'ST', 5.00, NULL),
	(9, 'SITI UDAIMATUNUUR ', '1659620711_ebfcd067ef1923bee7b1.jpg', 'ST', 5.00, NULL),
	(10, 'AINATUL', '1659621118_31d7868e617a9b100f72.jpg', 'ST', 5.00, NULL),
	(11, 'AINATUL', '1659621276_faa647b6af9966bc2c3b.jpg', 'ST', 5.00, NULL),
	(13, 'SAIFUL', '1659623099_2edb61c2d20cf6ae40b2.jpg', 'SP', 5.00, NULL);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- Dumping structure for table kedaiku.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(250) NOT NULL,
  `reset_expire` datetime DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `activate_token` varchar(250) DEFAULT NULL,
  `activate_expire` varchar(250) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kedaiku.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `reset_token`, `reset_expire`, `activated`, `activate_token`, `activate_expire`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'ajwad', 'aqhari', 'ajwadaqhari1@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZzgyRUlkM2RIc3lGbThFeA$+IcvG/P8eLT/cASF0GThu4Gc6MFBj+qE7yfCq2f+xGE', '', NULL, 1, NULL, NULL, 1, '2022-08-08 15:11:13', '2022-08-08 15:11:13', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table kedaiku.user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kedaiku.user_roles: 0 rows
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
kedaiku_newkedaiku_newproduk