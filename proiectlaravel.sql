-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: ian. 22, 2024 la 05:12 PM
-- Versiune server: 8.0.31
-- Versiune PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiectlaravel`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `agendas`
--

DROP TABLE IF EXISTS `agendas`;
CREATE TABLE IF NOT EXISTS `agendas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume_Sesiune` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ora_Start` time NOT NULL,
  `Ora_Finish` time NOT NULL,
  `Descriere` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Event` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_Event` (`ID_Event`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `agendas`
--

INSERT INTO `agendas` (`id`, `Nume_Sesiune`, `Ora_Start`, `Ora_Finish`, `Descriere`, `ID_Event`, `created_at`, `updated_at`) VALUES
(1, 'Movie session', '13:30:00', '15:30:00', 'Come see the new Hunger Game Movie!', 1, '2023-12-13 09:31:28', '2023-12-13 09:31:28'),
(2, 'Q&A Session', '16:30:00', '18:30:00', 'Don\'t miss the chance to talk with your favourites actors!', 1, '2023-12-13 09:33:09', '2023-12-13 09:33:09'),
(3, 'Pictures Session', '19:00:00', '21:00:00', 'Come take a picture with the new Hunger Games cast!', 1, '2023-12-13 09:35:05', '2023-12-13 09:35:21');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `ticket_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, '200.00', '2023-12-12 08:22:45', '2023-12-12 12:49:03'),
(3, 1, 2, 1, '250.00', '2023-12-12 08:22:45', '2023-12-12 12:44:24'),
(4, 1, 1, 3, '200.00', '2023-12-12 10:50:35', '2023-12-12 10:50:35'),
(5, 1, 1, 1, '200.00', '2023-12-12 10:56:34', '2023-12-12 10:56:34'),
(6, 1, 2, 1, '250.00', '2023-12-12 10:56:34', '2023-12-12 10:56:34'),
(7, 1, 3, 2, '300.00', '2023-12-12 12:21:15', '2023-12-12 12:28:27'),
(8, 1, 1, 1, '200.00', '2023-12-13 05:45:23', '2023-12-13 05:45:23'),
(9, 1, 2, 2, '250.00', '2023-12-13 05:45:23', '2023-12-13 05:45:23'),
(10, 1, 1, 1, '200.00', '2023-12-13 05:53:59', '2023-12-13 05:53:59'),
(11, 1, 2, 2, '250.00', '2023-12-13 05:53:59', '2023-12-13 05:53:59'),
(12, 1, 1, 1, '200.00', '2023-12-13 05:55:12', '2023-12-13 05:55:12'),
(13, 1, 2, 2, '250.00', '2023-12-13 05:55:12', '2023-12-13 05:55:12'),
(14, 1, 1, 1, '200.00', '2023-12-13 05:55:49', '2023-12-13 05:55:49'),
(15, 1, 2, 2, '250.00', '2023-12-13 05:55:49', '2023-12-13 05:55:49'),
(16, 1, 1, 2, '200.00', '2023-12-13 05:57:29', '2023-12-13 05:57:29'),
(17, 1, 3, 1, '300.00', '2023-12-13 05:57:29', '2023-12-13 05:57:29'),
(18, 1, 2, 1, '250.00', '2023-12-13 08:48:38', '2023-12-13 08:48:38'),
(19, 1, 1, 1, '200.00', '2023-12-13 08:48:38', '2023-12-13 08:48:38'),
(20, 1, 1, 1, '200.00', '2023-12-14 11:28:25', '2023-12-14 11:28:25'),
(21, 1, 2, 1, '250.00', '2023-12-15 04:31:07', '2023-12-15 04:31:07'),
(22, 1, 2, 1, '250.00', '2023-12-15 04:33:58', '2023-12-15 04:33:58'),
(23, 2, 1, 1, '200.00', '2023-12-18 08:01:52', '2023-12-18 08:01:52'),
(24, 1, 1, 2, '200.00', '2023-12-19 05:34:19', '2023-12-19 05:34:19'),
(25, 1, 2, 1, '250.00', '2023-12-19 05:34:19', '2023-12-19 05:34:19'),
(26, 1, 1, 2, '200.00', '2023-12-19 05:53:01', '2023-12-19 05:53:01'),
(27, 1, 2, 1, '250.00', '2023-12-19 05:53:01', '2023-12-19 05:53:01'),
(28, 1, 1, 2, '200.00', '2023-12-19 05:59:15', '2023-12-19 05:59:15'),
(29, 1, 2, 1, '250.00', '2023-12-19 05:59:15', '2023-12-19 05:59:15'),
(30, 1, 1, 2, '200.00', '2023-12-19 06:00:06', '2023-12-19 06:00:06'),
(31, 1, 2, 1, '250.00', '2023-12-19 06:00:06', '2023-12-19 06:00:06'),
(32, 1, 1, 2, '200.00', '2023-12-19 06:02:36', '2023-12-19 06:02:36'),
(33, 1, 2, 1, '250.00', '2023-12-19 06:02:36', '2023-12-19 06:02:36'),
(34, 1, 1, 1, '200.00', '2023-12-19 11:52:29', '2023-12-19 11:52:29'),
(35, 1, 1, 1, '200.00', '2023-12-19 12:13:28', '2023-12-19 12:13:28'),
(36, 1, 2, 1, '250.00', '2023-12-19 12:13:28', '2023-12-19 12:13:28'),
(37, 1, 1, 1, '200.00', '2023-12-19 12:13:51', '2023-12-19 12:13:51'),
(38, 1, 2, 1, '250.00', '2023-12-19 12:13:51', '2023-12-19 12:13:51'),
(39, 1, 1, 2, '200.00', '2023-12-19 16:44:06', '2023-12-19 16:44:06'),
(40, 1, 2, 1, '250.00', '2023-12-19 16:44:06', '2023-12-19 16:44:06'),
(41, 1, 3, 1, '300.00', '2023-12-19 16:44:06', '2023-12-19 16:44:06'),
(42, 1, 1, 2, '200.00', '2023-12-19 17:05:19', '2023-12-19 17:05:19'),
(43, 1, 2, 2, '250.00', '2023-12-19 17:05:19', '2023-12-19 17:05:19'),
(44, 1, 3, 1, '300.00', '2023-12-19 17:05:19', '2023-12-19 17:05:19');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume_Eveniment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descriere` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Data_Start` datetime NOT NULL,
  `Data_Finish` datetime NOT NULL,
  `Locatie` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Numar_Participant_Maxim` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `events`
--

INSERT INTO `events` (`id`, `Nume_Eveniment`, `Descriere`, `Data_Start`, `Data_Finish`, `Locatie`, `Numar_Participant_Maxim`, `created_at`, `updated_at`) VALUES
(1, 'The Hunger Games: The Ballad of Songbirds and Snakes', 'Don\'t miss the opportunity to watch the newest Hunger Games film and participate in an exclusive Q&A session with the cast. Plus, seize the chance to take a memorable photo with them!', '2023-12-19 13:30:44', '2023-12-19 21:30:44', 'Cluj Napoca', 150, NULL, '2023-12-19 09:48:55');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_05_082052_create_events_table', 1),
(6, '2023_12_05_083224_create_tickets_table', 1),
(7, '2023_12_08_113234_create_packages_table', 1),
(8, '2023_12_08_114335_create_partners_table', 1),
(9, '2023_12_08_130106_create_sponsors_table', 1),
(10, '2023_12_08_132912_create_agendas_table', 1),
(11, '2023_12_10_160325_create_carts_table', 1),
(12, '2023_12_11_094735_create_partcipants_table', 1),
(13, '2023_12_11_110824_create_speakers_table', 1),
(14, '2023_12_11_113628_create_sessions_table', 1),
(15, '2023_12_11_115831_create_speakers_sessions_table', 1),
(16, '2023_12_13_115832_create_admins_table', 2),
(17, '2023_12_13_171959_add_role_as_to_users_table', 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume_Pachet` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descriere` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pret` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `packages`
--

INSERT INTO `packages` (`id`, `Nume_Pachet`, `Descriere`, `Pret`, `created_at`, `updated_at`) VALUES
(1, 'Gold', 'Gold Package', '2000.00', '2023-12-13 09:37:17', '2023-12-13 09:37:17'),
(2, 'Silver', 'Silver Package', '3000.00', '2023-12-13 09:37:35', '2023-12-13 09:37:35'),
(3, 'Platinum', 'Platinum Package', '4000.00', '2023-12-13 09:37:55', '2023-12-13 09:37:55');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenume` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `participants`
--

INSERT INTO `participants` (`id`, `Nume`, `Prenume`, `Email`, `Telefon`, `created_at`, `updated_at`) VALUES
(1, 'Popoviciu', 'Beatrix', 'bea.popoviciu@gmail.com', '0727524988', '2023-12-11 17:37:47', '2023-12-11 17:37:47'),
(2, 'Bianca', 'Florea', 'bianca.florea@gmail.com', '0268126489', '2023-12-12 07:51:19', '2023-12-12 07:51:19'),
(3, 'Delia', 'Dumitru', 'delia.dumitru@gmail.com', '0740127634', '2023-12-12 07:51:52', '2023-12-12 07:51:52');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume_Partener` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descriere` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Nume` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Telefon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Event` bigint UNSIGNED NOT NULL,
  `ID_Package` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_Package` (`ID_Package`),
  KEY `ID_Event` (`ID_Event`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `partners`
--

INSERT INTO `partners` (`id`, `Nume_Partener`, `Descriere`, `Contact_Nume`, `Contact_Email`, `Contact_Telefon`, `ID_Event`, `ID_Package`, `created_at`, `updated_at`) VALUES
(1, 'Cineplexx', 'The best movie theater', 'Alina Stoica', 'alina.stoica@gmail.com', '0726341298', 1, 3, '2023-12-13 09:38:30', '2023-12-13 09:38:30'),
(2, 'Radio Romania Cluj', 'The best Radio Station', 'Carmen Muresan', 'carmen.muresan@gmail.com', '0722645981', 1, 2, '2023-12-13 09:39:28', '2023-12-13 09:39:28');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume_Sesiune` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Event` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_Event` (`ID_Event`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `sessions`
--

INSERT INTO `sessions` (`id`, `Nume_Sesiune`, `ID_Event`, `created_at`, `updated_at`) VALUES
(1, 'Movie Session', 1, '2023-12-12 07:57:47', '2023-12-12 07:57:47'),
(2, 'Q&A Session', 1, '2023-12-12 07:58:07', '2023-12-12 07:58:07'),
(3, 'Pictures Session', 1, '2023-12-12 07:58:24', '2023-12-12 07:58:24');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `speakers`
--

DROP TABLE IF EXISTS `speakers`;
CREATE TABLE IF NOT EXISTS `speakers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenume` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `speakers`
--

INSERT INTO `speakers` (`id`, `Nume`, `Prenume`, `Email`, `Telefon`, `Bio`, `created_at`, `updated_at`) VALUES
(1, 'Rachel', 'Zegler', 'rachel.zegler@gmail.com', '0722643569', 'movie star', '2023-12-12 07:57:19', '2023-12-12 07:57:19'),
(2, 'Tom', 'Blyth', 'tom.blyth@gmail.com', '0723198345', 'movie star', '2023-12-13 09:44:51', '2023-12-13 09:44:51');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `speakers_sessions`
--

DROP TABLE IF EXISTS `speakers_sessions`;
CREATE TABLE IF NOT EXISTS `speakers_sessions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_Speaker` bigint UNSIGNED NOT NULL,
  `ID_Sesiune` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_Sesiune` (`ID_Sesiune`),
  KEY `ID_Speaker` (`ID_Speaker`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `speakers_sessions`
--

INSERT INTO `speakers_sessions` (`id`, `ID_Speaker`, `ID_Sesiune`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-12-12 07:58:47', '2023-12-12 07:58:47'),
(2, 1, 2, '2023-12-12 07:58:54', '2023-12-12 07:58:54'),
(3, 1, 3, '2023-12-12 07:59:00', '2023-12-12 07:59:00'),
(4, 2, 1, '2023-12-13 09:45:14', '2023-12-13 09:45:14'),
(5, 2, 2, '2023-12-13 09:45:21', '2023-12-13 09:45:21');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nume_Sponsor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descriere` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Nume` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Telefon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Event` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_Event` (`ID_Event`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `sponsors`
--

INSERT INTO `sponsors` (`id`, `Nume_Sponsor`, `Descriere`, `Contact_Nume`, `Contact_Email`, `Contact_Telefon`, `ID_Event`, `created_at`, `updated_at`) VALUES
(1, 'Banca Transilvania', 'The best bank in Romania.', 'Togorean Ionut', 'ionut.togorean@gmail.com', '0740238945', 1, '2023-12-13 09:41:01', '2023-12-13 09:41:01'),
(2, 'Storia', 'The best imobiliar platform in Romania.', 'Taurean Raul', 'raul.taurean@gmail.com', '0798212341', 1, '2023-12-13 09:42:32', '2023-12-13 09:42:43');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Tip_Bilet` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pret` decimal(8,2) NOT NULL,
  `ID_Event` bigint UNSIGNED NOT NULL,
  `ID_Participant` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_Participant` (`ID_Participant`),
  KEY `ID_Event` (`ID_Event`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `tickets`
--

INSERT INTO `tickets` (`id`, `Tip_Bilet`, `Pret`, `ID_Event`, `ID_Participant`, `created_at`, `updated_at`) VALUES
(1, 'Movie', '200.00', 1, 1, NULL, NULL),
(2, 'Movie + Q&A', '250.00', 1, 2, '2023-12-12 07:48:54', '2023-12-12 07:54:05'),
(3, 'Movie + Q&A + Poze', '300.00', 1, 3, '2023-12-12 07:54:43', '2023-12-12 07:54:49');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Negrea Florina', 'negreaflorina366@yahoo.com', NULL, '$2y$10$KwBeCLL3KgZ31YkOziExvun402/xsByKnKZUGtX1dgvMtzf1gRPcO', 1, NULL, '2023-12-11 17:36:33', '2023-12-13 15:28:10'),
(2, 'Catalin Negrea', 'negreacatalin27@gmail.com', NULL, '$2y$10$nzageOa0HAthz7zp88J2r.XpYA/SDBDl..pNKVR/fnemMMpODS9rG', 0, NULL, '2023-12-13 15:39:43', '2023-12-13 15:39:43');

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_ibfk_1` FOREIGN KEY (`ID_Event`) REFERENCES `events` (`id`);

--
-- Constrângeri pentru tabele `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constrângeri pentru tabele `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_ibfk_1` FOREIGN KEY (`ID_Package`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `partners_ibfk_2` FOREIGN KEY (`ID_Event`) REFERENCES `events` (`id`);

--
-- Constrângeri pentru tabele `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`ID_Event`) REFERENCES `events` (`id`);

--
-- Constrângeri pentru tabele `speakers_sessions`
--
ALTER TABLE `speakers_sessions`
  ADD CONSTRAINT `speakers_sessions_ibfk_1` FOREIGN KEY (`ID_Sesiune`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `speakers_sessions_ibfk_2` FOREIGN KEY (`ID_Speaker`) REFERENCES `speakers` (`id`);

--
-- Constrângeri pentru tabele `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `sponsors_ibfk_1` FOREIGN KEY (`ID_Event`) REFERENCES `events` (`id`);

--
-- Constrângeri pentru tabele `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`ID_Participant`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`ID_Event`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
