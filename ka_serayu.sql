# Host: localhost  (Version 5.5.5-10.4.32-MariaDB)
# Date: 2024-12-08 20:41:11
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "penumpang"
#

DROP TABLE IF EXISTS `penumpang`;
CREATE TABLE `penumpang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_kursi` varchar(5) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `waktu_keberangkatan` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "penumpang"
#

INSERT INTO `penumpang` VALUES (2,'23','Nayla Rizka','P','Purwokerto','12:12:00'),(3,'2','Fayakun','L','Sumpiuh','12:12:00'),(5,'34','janu','L','papringan','03:45:00');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','0192023a7bbd73250516f069df18b500','admin'),(2,'vera','202cb962ac59075b964b07152d234b70','admin');
