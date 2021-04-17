/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80023
 Source Host           : localhost:3306
 Source Schema         : karyawan

 Target Server Type    : MySQL
 Target Server Version : 80023
 File Encoding         : 65001

 Date: 17/04/2021 22:12:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for tabel_cuti
-- ----------------------------
DROP TABLE IF EXISTS `tabel_cuti`;
CREATE TABLE `tabel_cuti`  (
  `nomor_induk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tanggal_cuti` date NULL DEFAULT NULL,
  `lama_cuti` smallint NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tabel_cuti
-- ----------------------------
INSERT INTO `tabel_cuti` VALUES ('IP06001', '2020-08-02', 2, 'Acara Keluarga');
INSERT INTO `tabel_cuti` VALUES ('IP06001', '2020-08-18', 2, 'Anak Sakit');
INSERT INTO `tabel_cuti` VALUES ('IP06006', '2020-08-19', 1, 'Nenek Sakit');
INSERT INTO `tabel_cuti` VALUES ('IP06007', '2020-08-23', 1, 'Sakit');
INSERT INTO `tabel_cuti` VALUES ('IP06004', '2020-08-29', 5, 'Menikah');
INSERT INTO `tabel_cuti` VALUES ('IP06003', '2020-08-30', 2, 'Acara Keluarga');

-- ----------------------------
-- Table structure for tabel_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `tabel_karyawan`;
CREATE TABLE `tabel_karyawan`  (
  `no` int NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `tanggal_bergabung` date NULL DEFAULT NULL,
  PRIMARY KEY (`no`, `nomor_induk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tabel_karyawan
-- ----------------------------
INSERT INTO `tabel_karyawan` VALUES (1, 'IP06001', 'Agus', 'Jln Gaja Mada no 12, Surabaya', '1980-01-11', '2005-08-07');
INSERT INTO `tabel_karyawan` VALUES (2, 'IP06002', 'Amin', 'Jln Imam Bonjol no 11, Mojokerto', '1977-03-09', '2005-08-07');
INSERT INTO `tabel_karyawan` VALUES (3, 'IP06003', 'Yusuf', 'Jln A Yani Raya 15 No 14 Malang', '1973-09-08', '2006-08-07');
INSERT INTO `tabel_karyawan` VALUES (4, 'IP06004', 'Alyssa', 'Jln Bungur Sari V no 166, Bandung', '1983-03-18', '2006-09-06');
INSERT INTO `tabel_karyawan` VALUES (5, 'IP06005', 'Maulana', 'Jln Candi Agung, No 78 Gg 5, Jakarta', '1978-11-10', '2006-09-10');
INSERT INTO `tabel_karyawan` VALUES (6, 'IP06006', 'Agfika', 'Jln Nangka, Jakarta Timur', '1979-02-07', '2007-01-02');
INSERT INTO `tabel_karyawan` VALUES (7, 'IP06007', 'James', 'Jln Merpati, 8 Surabaya', '1989-05-18', '2007-04-04');
INSERT INTO `tabel_karyawan` VALUES (8, 'IP06008', 'Octavanus', 'Jln A Yani 17, B 08 Sidoarjo', '1985-04-14', '2007-05-19');
INSERT INTO `tabel_karyawan` VALUES (9, 'IP06009', 'Nugroho', 'Jln Duren tiga 167, Jakarta Selatan', '1984-01-01', '2008-01-16');
INSERT INTO `tabel_karyawan` VALUES (10, 'IP06010', 'Raisa', 'Jln Kelapa Sawit, Jakarta Selatan', '1990-12-17', '2008-08-16');

-- ----------------------------
-- Table structure for tabel_sisa_cuti
-- ----------------------------
DROP TABLE IF EXISTS `tabel_sisa_cuti`;
CREATE TABLE `tabel_sisa_cuti`  (
  `nomor_induk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `sisa_cuti` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tabel_sisa_cuti
-- ----------------------------
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06001', 8);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06002', 12);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06003', 10);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06004', 7);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06005', 12);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06006', 11);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06007', 11);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06008', 12);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06009', 12);
INSERT INTO `tabel_sisa_cuti` VALUES ('IP06010', 12);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@gmail.com', NULL, '$2y$10$IYtp1LivHnXLwLncwuevG.nr8NyTLOZyN3y3w/mYXHrgTw5p0OpY6', 'AjvG8Mp7KqovayNkCAcCXnhMnDVTUlZVtn5CEZZdApkfUxsKvvfkIcGI6kxH', '2021-04-15 13:33:24', '2021-04-15 13:33:24');

-- ----------------------------
-- View structure for view_join_cuti_karyawan
-- ----------------------------
DROP VIEW IF EXISTS `view_join_cuti_karyawan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_join_cuti_karyawan` AS select (select `tabel_karyawan`.`nama` from `tabel_karyawan` where (`tabel_karyawan`.`nomor_induk` = `tabel_cuti`.`nomor_induk`)) AS `nama`,`tabel_cuti`.`nomor_induk` AS `nomor_induk`,`tabel_cuti`.`tanggal_cuti` AS `tanggal_cuti`,`tabel_cuti`.`lama_cuti` AS `lama_cuti`,`tabel_cuti`.`keterangan` AS `keterangan` from `tabel_cuti`;

-- ----------------------------
-- View structure for view_pernah_cuti
-- ----------------------------
DROP VIEW IF EXISTS `view_pernah_cuti`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_pernah_cuti` AS select distinct `tabel_cuti`.`nomor_induk` AS `nomor_induk`,(select `tabel_karyawan`.`nama` from `tabel_karyawan` where (`tabel_karyawan`.`nomor_induk` = `tabel_cuti`.`nomor_induk`)) AS `nama`,`tabel_cuti`.`tanggal_cuti` AS `tanggal_cuti`,`tabel_cuti`.`keterangan` AS `keterangan` from `tabel_cuti`;

-- ----------------------------
-- View structure for view_pernah_cuti_lebih
-- ----------------------------
DROP VIEW IF EXISTS `view_pernah_cuti_lebih`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_pernah_cuti_lebih` AS select `a`.`nomor_induk` AS `nomor_induk`,(select `tabel_karyawan`.`nama` from `tabel_karyawan` where (`tabel_karyawan`.`nomor_induk` = `a`.`nomor_induk`)) AS `nama`,`a`.`tanggal_cuti` AS `tanggal_cuti`,`a`.`keterangan` AS `keterangan` from (`tabel_cuti` `a` join (select `tabel_cuti`.`nomor_induk` AS `nomor_induk`,count(0) AS `COUNT(*)` from `tabel_cuti` group by `tabel_cuti`.`nomor_induk` having (count(0) > 1)) `b` on((`a`.`nomor_induk` = `b`.`nomor_induk`))) order by `a`.`nomor_induk`;

-- ----------------------------
-- View structure for view_sisa_cuti
-- ----------------------------
DROP VIEW IF EXISTS `view_sisa_cuti`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_sisa_cuti` AS select `tabel_karyawan`.`no` AS `no`,`tabel_karyawan`.`nomor_induk` AS `nomor_induk`,`tabel_karyawan`.`nama` AS `nama`,`tabel_karyawan`.`alamat` AS `alamat`,`tabel_karyawan`.`tanggal_lahir` AS `tanggal_lahir`,`tabel_karyawan`.`tanggal_bergabung` AS `tanggal_bergabung`,(select `tabel_sisa_cuti`.`sisa_cuti` from `tabel_sisa_cuti` where (`tabel_sisa_cuti`.`nomor_induk` = `tabel_karyawan`.`nomor_induk`)) AS `sisa_cuti` from `tabel_karyawan`;

SET FOREIGN_KEY_CHECKS = 1;
