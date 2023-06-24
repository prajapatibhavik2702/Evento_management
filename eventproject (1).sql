-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2023 at 11:29 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$UwzJciVIJqL0xS3YfUS.ReKXgGnz1S4RgWyBqVUZ/diTYKfM/B/ke', NULL, '2023-06-09 04:30:25', '2023-06-14 01:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Music', 'blERiCJIHvWtQ9K9P0EQ39fvXWcyVNHGLjacUXM7.jpg', '2023-06-19 04:40:21', '2023-06-19 05:27:26'),
(4, 'Sport Category', 'pkgRh5TDwG30MAO3ufGNojHJXTcMep7j42REtAT7.jpg', '2023-06-13 05:22:18', '2023-06-13 05:49:10'),
(5, 'Hackathon', 'UcTBdccXP2XvK0qWEqFqH1FJNpbUCBzuWfPkbY6d.jpg', '2023-06-13 05:57:00', '2023-06-19 05:27:54'),
(7, 'Party', 'G9QJaqgIlY6132VOTGvfT967KcWzVGG9yCQ4AMcW.jpg', '2023-06-19 04:42:14', '2023-06-19 05:28:08'),
(8, 'Food', 'lVsfZ0AU0kWLNdzYEIinbK5O6PWUYC0nRdoCrQjK.jpg', '2023-06-19 04:42:26', '2023-06-19 05:29:32'),
(9, 'Fitness', 'rZ9qR3hN2afX8ZqmnXY1xyfUsPml1opxeB31zsrU.jpg', '2023-06-19 04:50:56', '2023-06-19 05:28:24'),
(10, 'Festival', 'ubOmfIghdeW7EiaOb6jEDwnuOggR7c8VF2x8RjTY.jpg', '2023-06-19 05:28:45', '2023-06-19 05:28:45'),
(11, 'Education', 'pyrsHcOMVCmCoEFx8sJk5om6NR3Eabwxxvr84MnT.jpg', '2023-06-19 05:29:59', '2023-06-19 05:29:59'),
(12, 'Health', 'NvYlYAbI5NSNZN6mu6JSeR1d4CrpSxuZOr9tdw2B.jpg', '2023-06-19 05:32:28', '2023-06-19 05:32:28'),
(13, 'Tour party', 'KNaB90OoEXdKuOpE05iYhZUYGyCXjve8CX1TwNjV.jpg', '2023-06-19 05:34:04', '2023-06-19 05:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `eventable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventable_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_eventable_type_eventable_id_index` (`eventable_type`,`eventable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `category`, `date`, `start_time`, `end_time`, `total_ticket`, `available_ticket`, `price`, `image`, `address`, `city`, `state`, `pincode`, `status`, `eventable_type`, `eventable_id`, `created_at`, `updated_at`) VALUES
(17, 'Food Event', 'jamo Enjoy', 'Food', '2023-07-13', '20:00', '22:00', '200', '195', '300', 'tcdgMMd0ScRLMsBjPjdkiAAjfpXWEoRtQmMszDgY.jpg', 'Ghandhinagarq', 'Ghandinagar', 'GUJARAT', '214587', 'active', 'App\\Models\\Organiser', 23, '2023-06-19 04:54:15', '2023-06-23 05:43:41'),
(18, 'Footboll', 'Enjoy,,', 'Sport Category', '2023-07-27', '16:00', '18:00', '100', '95', '200', 'H5kq7opel15yu2JKibymfonKLBMhCjKGWD4uqjii.jpg', 'Ghodasar', 'Ahemdabad', 'GUJARAT', '985623', 'active', 'App\\Models\\Admin', 1, '2023-06-21 02:13:47', '2023-06-23 05:40:04'),
(19, 'Goa Tour party', 'Goa is home to famous party places such as The HillTop, Club LPK, Capetown Cafe, Cafe Lilliput, Club M, Leopard Valley, and so on', 'Tour party', '2023-07-05', '14:30', '23:00', '150', '142', '1500', 'ZIZI5KQS1wHL9aRW1hPuyrVZI2U0KPXqldcS6Trn.jpg', 'North Goa beach', 'Anjuna', 'Goa State', '403503', 'active', 'App\\Models\\Organiser', 23, '2023-06-23 05:21:16', '2023-06-23 05:28:11'),
(16, 'Coding Club', 'Go Ahead', 'Hackathon Category', '2023-07-11', '11:00', '15:00', '200', '197', '100', 'kZxoIKD4ZmzWA343FOEy674RWx9u94UDnTiLrgWF.jpg', 'Dodoa', 'Goa', 'GUJARAT', '452145', 'active', 'App\\Models\\Admin', 1, '2023-06-19 04:10:55', '2023-06-23 01:26:18'),
(15, 'Cricket', 'Yes,,', 'Sport Category', '2023-06-30', '10:00', '16:00', '100', '100', '50', 'd6N9hRLRz2IjC8mhiwac5QWlcrFCWuJcMX8pPYn3.jpg', 'Ghodasar', 'Ahemdabad', 'GUJARAT', '380050', 'active', 'App\\Models\\Admin', 1, '2023-06-19 04:09:28', '2023-06-19 04:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `event_speaker`
--

DROP TABLE IF EXISTS `event_speaker`;
CREATE TABLE IF NOT EXISTS `event_speaker` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` bigint NOT NULL,
  `speaker_id` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_speaker`
--

INSERT INTO `event_speaker` (`id`, `event_id`, `speaker_id`) VALUES
(14, 16, 16),
(13, 15, 16),
(11, 14, 17),
(12, 6, 16),
(8, 13, 16),
(7, 12, 17),
(15, 17, 17),
(16, 18, 16),
(17, 19, 19);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_05_125320_create_admins_table', 1),
(6, '2023_06_07_102041_create_organisers_table', 1),
(10, '2023_06_12_125832_create_speakers_table', 5),
(8, '2023_06_13_091244_create_categories_table', 3),
(11, '2023_06_13_114151_create_events_table', 6),
(12, '2023_06_16_052540_create_event_speaker_table', 7),
(14, '2023_06_22_090525_create_payments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `organisers`
--

DROP TABLE IF EXISTS `organisers`;
CREATE TABLE IF NOT EXISTS `organisers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisers`
--

INSERT INTO `organisers` (`id`, `name`, `email`, `email_verified_at`, `password`, `number`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'organiser', 'jay@gmail.com', NULL, '$2y$10$JHhdndj98y8CeEYI44owyuXJ.lFGekTv81eRExtOcZqsDi9hPuEjO', '8974563214', 'yes', 'Active', NULL, '2023-06-09 04:33:31', '2023-06-11 23:32:07'),
(5, 'akshar', 'akshar@gmail.com', NULL, '$2y$10$8qyL9cPtvOA0TDer1RT3Pes7ysNKeiBF3zY7.ssz2QNDGMUWVwdfm', '9784563257', 'yehdws', 'Active', NULL, '2023-06-12 00:55:20', '2023-06-12 00:59:12'),
(6, 'jadiyo  jaylo', 'jadiyo@gmail.com', NULL, '$2y$10$O3mg7z11hQD29o53VGSR7uAKCokgr3SJSGMsawJu.rRbjTXQkuosu', '5698784512', 'jadiyoo\\', 'Active', NULL, '2023-06-12 00:55:54', '2023-06-12 00:56:36'),
(24, 'msjhbf', 'kjfnd@gmail.com', NULL, '$2y$10$ZCRR9qC9i78H4uRch82WU.GKmN1MulDBzUp2j595wA44NTMmHAO6W', '5698784521', 'yes', 'Active', NULL, '2023-06-14 02:04:40', '2023-06-14 02:04:59'),
(15, 'akshu', 'aks@gmail.com', NULL, '$2y$10$O5AX9XHBgRXo0eymQGPxt.ZQsb4TzdX3z51DzZWxVlw5pPKvMin1u', '7877874512', 'yes', 'Active', NULL, '2023-06-12 05:35:43', '2023-06-12 05:35:43'),
(14, 'wsdfgasfgdf', 'gyh@gmmail.com', NULL, '$2y$10$U1.KOpLqnTul.UIToCJZteXbHd8X7dCxNnvHAe2GWlRLr2rZZ1OPK', '4569875689', 'yes', 'Active', NULL, '2023-06-12 05:19:48', '2023-06-12 05:19:48'),
(9, 'roham', 'roham@gmail.com', NULL, '$2y$10$okP7U4y32vwqaSNJFOCi4.XusazjiO2onpfSfY1GzyR8Y1JdnUIz6', '9856325258', 'yes', 'Active', NULL, '2023-06-12 01:19:09', '2023-06-12 01:23:49'),
(18, 'jagsygtyh', 'jahgfd@gmail.com', NULL, '$2y$10$GNRB.LiPkGwj5wYLYcB9o.WD7tayunV4Rnj/TjYwcxKt8IPnVUoUi', '4569874567', 'yes', 'Active', NULL, '2023-06-12 05:44:28', '2023-06-12 05:44:28'),
(16, 'ugfsdj', 'skdfjsh@gmail.com', NULL, '$2y$10$0e8uITg4SOtbr8Rg3od0ROj9slGkYhzCr2v8/Kb2T09mqhqXQK64q', '8780736954', 'yes', 'Active', NULL, '2023-06-12 05:38:51', '2023-06-12 05:38:51'),
(20, 'kwfergrhu', 'kdjfhb@gmail.com', NULL, '$2y$10$29McgFS3LGkShl6dAXOfMOfpU5NrdPFJrpfuQq0XxogVBsogkeKOm', '7898564521', 'yes', 'Active', NULL, '2023-06-12 07:08:28', '2023-06-12 07:08:28'),
(21, 'ksfjx', 'jfdfj@gmail.com', NULL, '$2y$10$BrK3v6W71YoF939kJiWxfeeNX7Hned1oC5KOeugbQkQJXnJ/Azbiy', '7845212356', 'yes', 'Active', NULL, '2023-06-12 07:10:11', '2023-06-12 07:10:11'),
(23, 'organiser', 'org@gmail.com', NULL, '$2y$10$gH5SgDk0HVtQkDGj8Nd9QOwXcTmhgETqMV/QqBy6Ira0z1v83Zwrq', '4578212356', 'YEs', 'Active', NULL, '2023-06-14 02:00:09', '2023-06-14 23:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `payment_no` bigint NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qnt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` bigint NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `event_id`, `user_id`, `payment_no`, `stripe_id`, `qnt`, `price`, `payment_amount`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 10, 84, 'txn_3NLkbhGHl4KbN4Xu1XulJixY', '5', '300', 1500, 'card', 'succeeded', '2023-06-22 04:49:18', '2023-06-22 04:49:18'),
(2, 17, 10, 477, 'txn_3NLkr4GHl4KbN4Xu0XNLbtM4', '5', '300', 1500, 'card', 'succeeded', '2023-06-22 05:05:11', '2023-06-22 05:05:11'),
(3, 17, 10, 266, 'txn_3NLkvAGHl4KbN4Xu11P2JLiY', '4', '300', 1200, 'card', 'succeeded', '2023-06-22 05:09:24', '2023-06-22 05:09:24'),
(4, 17, 10, 266, 'txn_3NLkwmGHl4KbN4Xu0QQu4FxA', '4', '300', 1200, 'card', 'succeeded', '2023-06-22 05:11:05', '2023-06-22 05:11:05'),
(5, 17, 10, 266, 'txn_3NLl2iGHl4KbN4Xu0ulOBea6', '4', '300', 1200, 'card', 'succeeded', '2023-06-22 05:17:12', '2023-06-22 05:17:12'),
(6, 17, 10, 348, 'txn_3NLl43GHl4KbN4Xu0agoElgA', '4', '300', 1200, 'card', 'succeeded', '2023-06-22 05:18:36', '2023-06-22 05:18:36'),
(7, 17, 10, 84, 'txn_3NLlJCGHl4KbN4Xu0L6UX1c4', '3', '300', 900, 'card', 'succeeded', '2023-06-22 05:34:15', '2023-06-22 05:34:15'),
(8, 17, 10, 84, 'txn_3NLlLbGHl4KbN4Xu0XCkfKL3', '3', '300', 900, 'card', 'succeeded', '2023-06-22 05:36:44', '2023-06-22 05:36:44'),
(9, 17, 10, 296, 'txn_3NLlpOGHl4KbN4Xu1UxgxEHZ', '2', '300', 600, 'card', 'succeeded', '2023-06-22 06:07:31', '2023-06-22 06:07:31'),
(10, 17, 10, 296, 'txn_3NLlqPGHl4KbN4Xu0SNxpDAB', '2', '300', 600, 'card', 'succeeded', '2023-06-22 06:08:34', '2023-06-22 06:08:34'),
(11, 17, 10, 296, 'txn_3NLltUGHl4KbN4Xu1x4hs7G6', '2', '300', 600, 'card', 'succeeded', '2023-06-22 06:11:45', '2023-06-22 06:11:45'),
(12, 16, 10, 426, 'txn_3NLlziGHl4KbN4Xu0lwDWMIv', '3', '100', 300, 'card', 'succeeded', '2023-06-22 06:18:11', '2023-06-22 06:18:11'),
(13, 16, 10, 420, 'txn_3NLm1dGHl4KbN4Xu1wvmrwrf', '3', '100', 300, 'card', 'succeeded', '2023-06-22 06:20:09', '2023-06-22 06:20:09'),
(14, 16, 10, 420, 'txn_3NLm3tGHl4KbN4Xu1VM0TBzv', '3', '100', 300, 'card', 'succeeded', '2023-06-22 06:22:30', '2023-06-22 06:22:30'),
(15, 17, 10, 325, 'txn_3NLmUCGHl4KbN4Xu0ZSXoOah', '4', '300', 1200, 'card', 'succeeded', '2023-06-22 06:49:40', '2023-06-22 06:49:40'),
(16, 17, 10, 325, 'txn_3NLmXRGHl4KbN4Xu1NRlJyld', '4', '300', 1200, 'card', 'succeeded', '2023-06-22 06:53:02', '2023-06-22 06:53:02'),
(17, 16, 10, 162, 'txn_3NM3uhGHl4KbN4Xu1Do6pnhW', '3', '100', 300, 'card', 'succeeded', '2023-06-23 01:26:12', '2023-06-23 01:26:12'),
(18, 19, 10, 409, 'txn_3NM7cCGHl4KbN4Xu10Lr3fCW', '2', '1500', 3000, 'card', 'succeeded', '2023-06-23 05:23:21', '2023-06-23 05:23:21'),
(19, 19, 13, 261, 'txn_3NM7goGHl4KbN4Xu02WvnSbC', '6', '1500', 9000, 'card', 'succeeded', '2023-06-23 05:28:06', '2023-06-23 05:28:06'),
(20, 18, 10, 79, 'txn_3NM7s5GHl4KbN4Xu0k9L96N1', '5', '200', 1000, 'card', 'succeeded', '2023-06-23 05:39:50', '2023-06-23 05:39:50'),
(21, 17, 10, 354, 'txn_3NM7vnGHl4KbN4Xu03JlZ4PT', '5', '300', 1500, 'card', 'succeeded', '2023-06-23 05:43:36', '2023-06-23 05:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
CREATE TABLE IF NOT EXISTS `speakers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speakerable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speakerable_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `speakers_speakerable_type_speakerable_id_index` (`speakerable_type`,`speakerable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`id`, `name`, `description`, `image`, `speakerable_type`, `speakerable_id`, `created_at`, `updated_at`) VALUES
(19, 'jay', 'Picnic founder', 'hQRzr1kXTHA7rBJ095Jlfudt5U7BXWHlTRePXV02.jpg', 'App\\Models\\Organiser', 23, '2023-06-23 05:16:54', '2023-06-23 05:16:54'),
(13, 'Okjwbehd bn', 'sdfbg', 'e6YMsW2eRGWxkpdCJI3PS3oCYXJDnfnOhRNWkZdc.jpg', 'App\\Models\\Organiser', 23, '2023-06-15 01:37:56', '2023-06-15 07:03:31'),
(18, 'jfhb', 'jkhf', 'fdpTMSy4v3B2dJ66o7X4uBlhW9DyB8ywTZpgDO3U.png', 'App\\Models\\Organiser', 23, '2023-06-16 04:59:51', '2023-06-16 04:59:51'),
(16, 'rahul', 'ew3ertjyk', 'kL8q9sBSOQ4n0omJznh2QUtMWWRuJJAolfCskcP7.jpg', 'App\\Models\\Admin', 1, '2023-06-15 02:13:52', '2023-06-16 06:27:59'),
(17, 'Bhavik b', 'ddjfhb', 'NkxRLSdmRxdpzpBUcVZl71lKCEpqBfdURABEjoAh.png', 'App\\Models\\Organiser', 23, '2023-06-15 02:19:25', '2023-06-15 03:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobilenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobilenumber`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bhavik', 'bhavik@gmail.com', NULL, '8978451236', '$2y$10$SVE.NEWeeWS.b93i1vJ3tui0MvwEFyzdpOJMhrmeVH2PqMN2nBagm', NULL, '2023-06-12 03:41:04', '2023-06-12 03:41:04'),
(2, 'jshnxfd', 'bfghj@gmail.com', NULL, '5698978451', '$2y$10$1OPN0O3M8xL6HIj92FHDH.NDafzpf1Iqhh5lUh53nyQk/GLWMAEiW', NULL, '2023-06-12 03:45:47', '2023-06-12 03:45:47'),
(10, 'user', 'user@gmail.com', NULL, '4521548745', '$2y$10$udnfJhg33UNqtq1X4XFXvu8zmrZn0yjELGZSTSL.j6dWk2f0f1hky', NULL, '2023-06-18 23:57:41', '2023-06-18 23:57:41'),
(4, 'jay', 'jay@gmail.com', NULL, '8978456321', '$2y$10$FSEmv7rSuwCQhagO6/xPOuPoI0heoSRHPEC0mQa5baM5HnbR5Y5me', NULL, '2023-06-12 04:05:46', '2023-06-12 04:05:46'),
(9, 'Cricket', 'prajapatibhavik8@gmail.com', '2023-06-16 06:51:55', '4521458745', '$2y$10$hcYzlmrkxTDMosQ8e7eqV.4d.RQ2j3ZzwlcCXXVndhvfrXCUJMnA.', NULL, '2023-06-16 06:30:23', '2023-06-16 06:51:55'),
(6, 'shyug', 'hjsbb@gmail.com', NULL, '1234567892', '$2y$10$gLCKygRMUcqCeBDQuAZoZuN.zn3P4hIM8BCZYx6T/gR7Q9tRsNmbC', NULL, '2023-06-12 04:13:52', '2023-06-12 04:13:52'),
(7, 'shyug', 'hjssdvbb@gmail.com', NULL, '1234567892', '$2y$10$4BBtFT/557LRYz64C/SM4eUyXE1L39IeZhrKH/j5mLXW/ttltCCnu', NULL, '2023-06-12 04:17:09', '2023-06-12 04:17:09'),
(8, 'df', 'asca@gmail.com', NULL, '2342456789', '$2y$10$CVJ6dhq79emZ89PTCecfe.pROg6QP6O0.goBNOAgGZsO4iRBBcLSu', NULL, '2023-06-12 04:18:05', '2023-06-12 04:18:05'),
(11, 'iufd', 'fjh@gmail.com', NULL, '2154874521', '$2y$10$oUND6/T6PZMVdNmrIKiw5.y2uJxpxufSKDOt5cdgtEOkepjXUpRni', NULL, '2023-06-18 23:58:36', '2023-06-18 23:58:36'),
(12, 'sfjidf', 'fjnjfk@gmail.com', NULL, '2145874521', '$2y$10$L836iTGkmaRd0Heks04UHuCdQUfU7jhTCoKnsihzL8O8ahsxp20KG', NULL, '2023-06-18 23:59:48', '2023-06-18 23:59:48'),
(13, 'Akshar', 'aks@gmail.com', NULL, '8956325698', '$2y$10$Xinr2HpaXO2WFdM9.o5x0eStSWFkjZg1bDWA9WV.jLJVKBetDTdzW', NULL, '2023-06-23 05:27:15', '2023-06-23 05:27:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
