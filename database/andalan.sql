-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for andalan
CREATE DATABASE IF NOT EXISTS `andalan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `andalan`;

-- Dumping structure for table andalan.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `client_id` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `program` varchar(255) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `goal` varchar(255) NOT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.clients: ~2 rows (approximately)
INSERT INTO `clients` (`id`, `name`, `client_id`, `email`, `password`, `phone`, `program`, `start_date`, `goal`, `birth_date`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(2, 'My Client', NULL, 'client@client.com', NULL, '12345678', '2x a Week | General Population', '2024-02-15 19:47:25', 'Mau ramping', '1989-12-31 17:00:00', 1, '2024-02-14 02:15:58', '2024-02-15 12:47:25', NULL, NULL),
	(3, 'Test Client', NULL, 'bstarz.66@gmail.com', NULL, '12345678', '1x a Week | General Population', '2024-02-15 17:00:00', 'Sixpack', '2010-05-09 17:00:00', 1, '2024-02-15 10:01:34', '2024-02-15 10:29:22', NULL, NULL);

-- Dumping structure for table andalan.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andalan.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table andalan.master_category
CREATE TABLE IF NOT EXISTS `master_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(225) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.master_category: ~7 rows (approximately)
INSERT INTO `master_category` (`id`, `category_name`, `updated_at`, `created_at`, `created_by`, `updated_by`) VALUES
	(1, 'Hinge', NULL, '2024-02-23 00:35:28', NULL, NULL),
	(2, 'Power', NULL, '2024-02-23 00:35:28', NULL, NULL),
	(3, 'Pull', NULL, '2024-02-23 00:35:28', NULL, NULL),
	(4, 'Push', NULL, '2024-02-23 00:35:28', NULL, NULL),
	(5, 'Cardio', NULL, '2024-02-23 00:35:28', NULL, NULL),
	(6, 'Squat', NULL, '2024-02-23 00:35:28', NULL, NULL),
	(7, 'Hamstring', NULL, '2024-02-23 00:35:28', NULL, NULL);

-- Dumping structure for table andalan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andalan.migrations: ~4 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table andalan.movements
CREATE TABLE IF NOT EXISTS `movements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `categories` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.movements: ~1 rows (approximately)
INSERT INTO `movements` (`id`, `name`, `categories`, `updated_at`, `created_at`, `created_by`, `updated_by`) VALUES
	(1, 'Movement 1', 'cardio squat hamstring', '2024-02-16 03:53:07', '2024-02-16 03:53:07', NULL, NULL),
	(2, 'Movement 2', 'hinge power push', '2024-02-25 07:51:36', '2024-02-25 07:51:36', NULL, NULL);

-- Dumping structure for table andalan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andalan.password_resets: ~0 rows (approximately)

-- Dumping structure for table andalan.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andalan.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table andalan.program_history
CREATE TABLE IF NOT EXISTS `program_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `program` varchar(255) DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.program_history: ~0 rows (approximately)

-- Dumping structure for table andalan.subs
CREATE TABLE IF NOT EXISTS `subs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `movement_id` int(11) NOT NULL,
  `movement_name` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(10) DEFAULT NULL,
  `sets` int(11) DEFAULT 0,
  `t` int(11) DEFAULT 0,
  `wt` int(11) DEFAULT 0,
  `rest` int(11) DEFAULT 0,
  `reps1` varchar(255) DEFAULT NULL,
  `reps2` varchar(255) DEFAULT NULL,
  `reps3` varchar(255) DEFAULT NULL,
  `reps4` varchar(255) DEFAULT NULL,
  `reps5` varchar(255) DEFAULT NULL,
  `reps6` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.subs: ~0 rows (approximately)

-- Dumping structure for table andalan.tabs
CREATE TABLE IF NOT EXISTS `tabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_name` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `tab_date` timestamp NULL DEFAULT NULL,
  `tab_notes` varchar(300) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.tabs: ~3 rows (approximately)
INSERT INTO `tabs` (`id`, `tab_name`, `client_id`, `tab_date`, `tab_notes`, `updated_at`, `created_at`, `created_by`, `updated_by`) VALUES
	(1, 'Week 1', 2, '2024-02-17 14:41:31', 'qwerty', '2024-02-26 22:57:16', '2024-02-17 14:41:34', NULL, 1),
	(2, 'Week 2', 2, '2024-02-15 14:42:31', NULL, NULL, '2024-02-17 14:42:27', NULL, NULL),
	(10, 'Week 3', 2, '2024-02-26 17:00:00', NULL, '2024-02-26 22:56:28', '2024-02-26 22:56:28', 1, NULL);

-- Dumping structure for table andalan.trainings
CREATE TABLE IF NOT EXISTS `trainings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `categories` varchar(225) DEFAULT '',
  `movement_id` int(11) NOT NULL,
  `movement_name` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(10) DEFAULT NULL,
  `sets` int(11) DEFAULT 0,
  `t` int(11) DEFAULT 0,
  `wt` int(11) DEFAULT 0,
  `rest` int(11) DEFAULT 0,
  `subs` varchar(1) DEFAULT 'N',
  `reps1` varchar(255) DEFAULT NULL,
  `reps2` varchar(255) DEFAULT NULL,
  `reps3` varchar(255) DEFAULT NULL,
  `reps4` varchar(255) DEFAULT NULL,
  `reps5` varchar(255) DEFAULT NULL,
  `reps6` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.trainings: ~2 rows (approximately)
INSERT INTO `trainings` (`id`, `date`, `client_id`, `tab_id`, `categories`, `movement_id`, `movement_name`, `status`, `sets`, `t`, `wt`, `rest`, `subs`, `reps1`, `reps2`, `reps3`, `reps4`, `reps5`, `reps6`, `updated_at`, `created_at`, `created_by`, `updated_by`) VALUES
	(1, NULL, 2, 1, NULL, 2, 'Movement 2', 'Good', 1, 1, 1, 0, 'Y', '1', '1', '1', '1', '1', '1', '2024-02-25 10:54:31', '2024-02-25 10:54:31', 1, NULL),
	(3, NULL, 2, 1, '', 1, 'Movement 1', 'Bad', 5, 5, 5, 5, 'N', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 09:19:01', '2024-02-26 09:19:01', 1, NULL);

-- Dumping structure for table andalan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ADMIN',
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andalan.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `last_login`, `password`, `role`, `phone`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'Finicode', 'finicodedigital@gmail.com', NULL, '2024-02-26 22:54:43', '$2y$10$UU9kucaD6b.7JP7SpsNMZ.7KKUrTaNVzVYYhns5uZmrguu7NtqkQe', 'SUPERADMIN', '', NULL, NULL, '2024-02-26 22:54:43', NULL, NULL),
	(8, 'Test User', 'test@gmail.com', NULL, '2024-02-13 01:49:46', '$2y$10$Q718w3dYN8NV2ECd6AOIuuPrP9aNb.IgIBbsqGXO/tuaiON0IFsrG', 'ADMIN', '12345678', NULL, '2024-02-08 01:32:13', '2024-02-15 11:05:07', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
