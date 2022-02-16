/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : skripsi_nur

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 16/02/2022 11:38:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_request_akta
-- ----------------------------
DROP TABLE IF EXISTS `data_request_akta`;
CREATE TABLE `data_request_akta`  (
  `id_request_akta` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `scan_ktp_ayah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_ktp_ibu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_suratnikah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_kk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_surat_kelahiran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keperluan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'KELAHIRAN',
  `status` int NOT NULL,
  `acc` date NOT NULL,
  PRIMARY KEY (`id_request_akta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_request_akta
-- ----------------------------
INSERT INTO `data_request_akta` VALUES (5, 'siti', 'Siti Aminah', '2022-02-16 10:51:09', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'Kelahiran anak', 'Data sedang diperiksa oleh Ketua RT', 'KELAHIRAN', 0, '0000-00-00');

-- ----------------------------
-- Table structure for data_request_kematian
-- ----------------------------
DROP TABLE IF EXISTS `data_request_kematian`;
CREATE TABLE `data_request_kematian`  (
  `id_request_kematian` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `scan_ktp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_kk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_ktp1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_ktp2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keperluan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'KEMATIAN',
  `status` int NOT NULL,
  `acc` date NOT NULL,
  PRIMARY KEY (`id_request_kematian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_request_kematian
-- ----------------------------
INSERT INTO `data_request_kematian` VALUES (2, 'siti', 'Siti Aminah', '2022-02-16 10:58:14', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'Kematian anak', 'Data sedang diperiksa oleh Ketua RT', 'KEMATIAN', 0, '0000-00-00');

-- ----------------------------
-- Table structure for data_request_kk
-- ----------------------------
DROP TABLE IF EXISTS `data_request_kk`;
CREATE TABLE `data_request_kk`  (
  `id_request_kk` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp,
  `scan_suratnikah` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akta_lahir` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keperluan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'LAINNYA',
  `status` int NOT NULL DEFAULT 0,
  `acc` date NOT NULL,
  PRIMARY KEY (`id_request_kk`) USING BTREE,
  INDEX `id_pemohon`(`username`) USING BTREE,
  CONSTRAINT `data_request_kk_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_request_kk
-- ----------------------------
INSERT INTO `data_request_kk` VALUES (1, 'siti', 'Siti Aminah', '2022-02-16 00:00:00', 'siti_.jpg', 'siti_.jpg', 'Pembuatan KK', 'Data sedang diperiksa oleh Ketua RT', 'LAINNYA', 0, '0000-00-00');

-- ----------------------------
-- Table structure for data_request_ktp
-- ----------------------------
DROP TABLE IF EXISTS `data_request_ktp`;
CREATE TABLE `data_request_ktp`  (
  `id_request_ktp` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp,
  `scan_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scan_kk` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akta_lahir` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keperluan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'KTP',
  `status` int NOT NULL DEFAULT 0,
  `acc` date NOT NULL,
  PRIMARY KEY (`id_request_ktp`) USING BTREE,
  INDEX `id_pemohon`(`username`) USING BTREE,
  CONSTRAINT `data_request_ktp_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_request_ktp
-- ----------------------------
INSERT INTO `data_request_ktp` VALUES (2, 'siti', 'Siti Aminah', '2022-02-16 11:09:07', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'Pembuatan KTP', 'Data sedang diperiksa oleh Ketua RT', 'KTP', 0, '0000-00-00');

-- ----------------------------
-- Table structure for data_request_pernikahan
-- ----------------------------
DROP TABLE IF EXISTS `data_request_pernikahan`;
CREATE TABLE `data_request_pernikahan`  (
  `id_request_pernikahan` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `akta_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ijazah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scan_suratnikah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keperluan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'PERNIKAHAN',
  `status` int NOT NULL,
  `acc` date NOT NULL,
  PRIMARY KEY (`id_request_pernikahan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_request_pernikahan
-- ----------------------------
INSERT INTO `data_request_pernikahan` VALUES (1, 'siti', 'Siti Aminah', '2022-02-16 11:11:58', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'Pembuatan surat nikah', 'Data sedang diperiksa oleh Ketua RT', 'PERNIKAHAN', 0, '0000-00-00');

-- ----------------------------
-- Table structure for data_request_skck
-- ----------------------------
DROP TABLE IF EXISTS `data_request_skck`;
CREATE TABLE `data_request_skck`  (
  `id_request_skck` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp,
  `scan_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scan_kk` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akta_lahir` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ijazah` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pas_foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keperluan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `request` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'SKCK',
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `status` int NOT NULL DEFAULT 0,
  `acc` date NOT NULL,
  PRIMARY KEY (`id_request_skck`) USING BTREE,
  INDEX `id_pemohon`(`username`) USING BTREE,
  CONSTRAINT `data_request_skck_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_request_skck
-- ----------------------------
INSERT INTO `data_request_skck` VALUES (3, 'siti', 'Siti Aminah', '2022-02-16 11:28:12', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'Pembuatan SKCK', 'SKCK', 'Data sedang diperiksa oleh Ketua RT', 0, '0000-00-00');

-- ----------------------------
-- Table structure for data_request_skd
-- ----------------------------
DROP TABLE IF EXISTS `data_request_skd`;
CREATE TABLE `data_request_skd`  (
  `id_request_skd` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp,
  `scan_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scan_kk` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scan_suratnikah` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pas_foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `skck` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keperluan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Ketua RT',
  `request` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'DOMISILI',
  `status` int NOT NULL DEFAULT 0,
  `acc` date NOT NULL,
  PRIMARY KEY (`id_request_skd`) USING BTREE,
  INDEX `id_pemohon`(`username`) USING BTREE,
  CONSTRAINT `data_request_skd_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_request_skd
-- ----------------------------
INSERT INTO `data_request_skd` VALUES (1, 'siti', 'Siti Aminah', '2022-02-16 11:30:13', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'siti_.jpg', 'Pembuatan surat SKD', 'Data sedang diperiksa oleh Ketua RT', 'DOMISILI', 0, '0000-00-00');

-- ----------------------------
-- Table structure for data_user
-- ----------------------------
DROP TABLE IF EXISTS `data_user`;
CREATE TABLE `data_user`  (
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hak_akses` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jekel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `agama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telepon` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_warga` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `warga` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Warga RT 01',
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_user
-- ----------------------------
INSERT INTO `data_user` VALUES ('1', '1', 'rw', 'coba', '', '2021-10-20', 'coba', 'Laki-Laki', '', 'coba', '', 'Kerja', 'RT1');
INSERT INTO `data_user` VALUES ('2', '2', 'rt', 'coba', '', '2021-10-20', 'coba', 'Perempuan', '', 'coba', '', 'Kerja', 'RT1');
INSERT INTO `data_user` VALUES ('23021999', '2', 'warga', 'Minhyuk', '1234567890', '0000-00-00', 'JAKARTA', 'laki laki', 'islam', 'BOGOR', '085888888888', 'kerja', 'RT1');
INSERT INTO `data_user` VALUES ('25021999', '123', 'warga', 'bintang', '2413548786', '1999-02-25', 'Malang', 'Laki-Laki', '', 'jaksel', '', 'Belum Bekerja', 'RT2');
INSERT INTO `data_user` VALUES ('28041999', '123', 'warga', 'nuraini', '21345567890', '1999-04-28', 'bogor', 'Perempuan', 'islam', 'BOGOR', '085888888888', 'sekolah', 'RT2');
INSERT INTO `data_user` VALUES ('admin', 'admin', 'admin', 'admin1', '1234567', '2022-08-02', 'JAKARTA', 'laki laki', 'islam', 'bogor bojong gede', '082525252', 'kerja', 'RT1');
INSERT INTO `data_user` VALUES ('siti', 'siti', 'warga', 'Siti Aminah', '3276354627123876', '1992-02-15', 'Bekasi', 'Perempuan', '', 'Jl. Pegangsaan Nomor 2 RT01/RW24 Jakarta Timur', '', 'Kerja', 'RT1');

-- ----------------------------
-- Table structure for data_user_rt02
-- ----------------------------
DROP TABLE IF EXISTS `data_user_rt02`;
CREATE TABLE `data_user_rt02`  (
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hak_akses` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jekel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_warga` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `warga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '7' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_user_rt02
-- ----------------------------
INSERT INTO `data_user_rt02` VALUES ('25021999', '1', 'Pemohon', 'Minhyuk', '012345678910', '1999-02-25', 'Jakarta', 'Laki-Laki', '', 'Bogor Bojong Gede', '', 'Kerja', 'Warga RT 02');

SET FOREIGN_KEY_CHECKS = 1;
