-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2025 at 10:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackmywork`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `bank_address`, `created_at`, `updated_at`) VALUES
(1, 'SBI SME Gondal road branch, Rajkot', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(2, 'SBI SME Rajkot', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(3, 'SBI COMMERCIAL BRANCH, RAJKOT', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(4, 'SBI COMMERCIAL BRANCH, MORBI', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(5, 'SBI SME BRANCH, Morbi', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(6, 'SBI SSI BRANCH, MORBI', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(7, 'SBI, Gondal Branch', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(8, 'SBI SME LAW GARDEN BRANCH, Ahmedabad', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(9, 'SBI SME BRANCH, BODELI, CHHOTA UDAIPUR', NULL, '2025-08-21 15:28:42', '2025-08-21 15:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NEC', '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(2, 'Legal Audit', '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(3, 'TCR', '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(4, 'Certified Copy', '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(5, 'Mortgage', '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(6, 'Translation Memo', '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(7, 'Wetting Certificate', '2025-08-21 15:28:42', '2025-08-21 15:28:42'),
(8, 'Consortium Drafting', '2025-08-21 15:28:42', '2025-08-21 15:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `category_steps`
--

CREATE TABLE `category_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `step_name` varchar(255) NOT NULL,
  `step_type` enum('simple','received_pending','copy_option') NOT NULL DEFAULT 'simple',
  `status` enum('not_started','in_progress','completed','received','pending') NOT NULL DEFAULT 'not_started',
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `pending_since` timestamp NULL DEFAULT NULL,
  `copy_requested` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_steps`
--

INSERT INTO `category_steps` (`id`, `category_id`, `step_name`, `step_type`, `status`, `started_at`, `completed_at`, `pending_since`, `copy_requested`, `created_at`, `updated_at`) VALUES
(1, 1, 'Section 64-67 memo noting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(2, 1, 'Apply for search/encumbrance certificate', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(3, 1, 'NEC drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(4, 1, 'Bill drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(5, 1, 'NEC ready to print', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(6, 1, 'NEC ready for sign', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(7, 1, 'NEC is scanned', 'copy_option', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(8, 1, 'NEC ready to deliver', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(9, 1, 'Delivered', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(10, 1, 'Bill Received or Bill Pending', 'received_pending', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(11, 2, 'Apply for search/encumbrance certificate', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(12, 2, 'LAR drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(13, 2, 'LAR Bill drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(14, 2, 'LAR ready to print', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(15, 2, 'LAR ready for sign', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(16, 2, 'LAR is scanned', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(17, 2, 'LAR ready to deliver', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(18, 2, 'Delivered', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(19, 2, 'Bill Received or Bill Pending', 'received_pending', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(20, 3, 'Apply for search', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(21, 3, 'Apply for certified copy', 'received_pending', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(22, 3, 'TCR drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(23, 3, 'TCR Bill drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(24, 3, 'TCR ready to print', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(25, 3, 'TCR ready for sign', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(26, 3, 'TCR is scanned', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(27, 3, 'TCR ready to deliver', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(28, 3, 'Delivered', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(29, 3, 'Bill Received or Bill Pending', 'received_pending', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(30, 4, 'Apply for certified copy', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(31, 4, 'CF copy received', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(32, 4, 'CF Bill drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(33, 4, 'CF copy ready to deliver', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(34, 4, 'Delivered', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(35, 4, 'Bill received or pending', 'received_pending', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(36, 6, 'Translation memo drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(37, 6, 'Translation memo Bill drafting', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(38, 6, 'Translation memo ready to print', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(39, 6, 'Translation memo ready for signature', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(40, 6, 'Translation memo is scanned', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(41, 6, 'Translation memo ready to deliver', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(42, 6, 'Delivered', 'simple', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(43, 6, 'Bill received or pending', 'received_pending', 'not_started', NULL, NULL, NULL, NULL, '2025-08-22 16:05:29', '2025-08-22 16:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `whatsapp_number`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Phillip Beach', '992', 'In sapiente nulla mi', '2025-08-11 12:32:39', '2025-08-11 12:32:39'),
(3, 'August Pruitt', '189', 'Nulla voluptatem aut', '2025-08-11 12:34:28', '2025-08-11 12:34:28'),
(4, 'Todd Landry', '549', 'Quia id ut minim ex', '2025-08-11 12:37:21', '2025-08-11 12:37:21'),
(5, 'Barbara Colon', '883', 'Facere id sequi quae', '2025-08-11 12:37:51', '2025-08-11 12:37:51'),
(6, 'Kelly Carver', '755', 'Nostrud do repudiand', '2025-08-11 12:48:31', '2025-08-11 12:48:31'),
(7, 'Lilah Mcdaniel', '100', 'Ut atque ad saepe fa', '2025-08-11 12:49:01', '2025-08-11 12:49:01'),
(8, 'Shaeleigh Green', '285', 'Tempora totam adipis', '2025-08-11 12:51:45', '2025-08-11 12:51:45'),
(9, 'Alden Benton', '997', 'Dignissimos illum v', '2025-08-11 12:51:56', '2025-08-11 12:51:56'),
(10, 'Shellie Dotson', '672', 'Ad autem odio rerum', '2025-08-11 12:52:15', '2025-08-11 12:52:15'),
(11, 'Gisela Erickson', '824', 'Libero dolor consequ', '2025-08-11 12:52:43', '2025-08-11 12:52:43'),
(13, 'jaydeep', '7016314852', 'test purposee', '2025-08-13 12:57:49', '2025-08-13 12:57:49'),
(14, 'jd', '9773131515', 'Qui incididunt totam', '2025-08-18 12:25:11', '2025-08-23 13:15:16'),
(15, 'Frances Britt', '731', 'Et qui et commodi fu', '2025-08-18 12:28:44', '2025-08-18 12:28:44'),
(16, 'mohit tt', '9157425250', 'Et qui et commodi fu', '2025-08-18 12:28:45', '2025-08-23 13:12:54'),
(17, 'manthan', '9510884551', 'Accusamus inventore', '2025-08-18 12:48:16', '2025-08-23 13:12:22'),
(18, 'krunal', '9316693237', NULL, '2025-08-18 14:11:19', '2025-08-23 13:11:59'),
(19, 'abhii', '7016314980', 'ASc asdcs asdf ad', '2025-08-22 11:45:02', '2025-08-23 13:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_11_172956_create_clients_table', 2),
(9, '2025_08_18_200023_create_categories_table', 3),
(10, '2025_08_18_200100_create_category_steps_table', 3),
(11, '2025_08_18_200311_create_banks_table', 3),
(12, '2025_08_18_255960_create_works_table', 3),
(13, '2025_08_22_212233_create_required_docs_table', 4),
(14, '2025_08_22_212419_create_step_options_table', 4),
(15, '2025_08_23_111048_create_work_steps_table', 5),
(16, '2025_08_23_191730_create_work_step_options_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$eCVgxGyzOIXsF1b7C4JXFeEKOPjb/trijJM.ysurUMUOvgjnthK6u', '2025-08-13 12:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `required_docs`
--

CREATE TABLE `required_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `required_docs`
--

INSERT INTO `required_docs` (`id`, `category_id`, `doc_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Latest mortgage deed', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(2, 2, 'Allotment letter', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(3, 2, 'Latest sanction resolution', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(4, 2, 'Both advocate TCR name and date', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(5, 2, 'Last legal audit report if applicable', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(6, 2, 'Loan documents and property documents scrutiny', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(7, 3, 'Property file', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(8, 4, 'Deed PDF', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(9, 6, 'Deed to be translated', '2025-08-22 16:05:29', '2025-08-22 16:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iBOUnzPy7r2nmzwFhlBTTaGkgYfvjsHuNENBwiQz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYk4yNmJmY3BKaHRnODVCaFpLOExSNDRoa1VPRzlNNXY4a1BybXRveSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93b3JrL3RyYWNrLzUvbmVjL21hbnRoYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1755982019);

-- --------------------------------------------------------

--
-- Table structure for table `step_options`
--

CREATE TABLE `step_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `step_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `step_options`
--

INSERT INTO `step_options` (`id`, `step_id`, `option_name`, `created_at`, `updated_at`) VALUES
(1, 10, 'Received', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(2, 10, 'Pending', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(3, 19, 'Received', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(4, 19, 'Pending', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(5, 21, 'Available', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(6, 21, 'Not Available', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(7, 29, 'Received', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(8, 29, 'Pending', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(9, 35, 'Received', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(10, 35, 'Bill Pending', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(11, 43, 'Received', '2025-08-22 16:05:29', '2025-08-22 16:05:29'),
(12, 43, 'Pending', '2025-08-22 16:05:29', '2025-08-22 16:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'admin@gmail.com', NULL, '$2y$12$/NoRF//ovythdWgnswTOxOI8x7r82h0zOQvmTedeUydwkz.Ktmule', NULL, '2025-08-10 11:44:13', '2025-08-10 11:44:13'),
(2, 'Test User', 'test@example.com', '2025-08-21 15:24:57', '$2y$12$D9viAktghIvnhf4upYAIueLD8G28byjVX6SXD0dmRDzTHb/zVKXNy', 'WOormBoI7O', '2025-08-21 15:24:57', '2025-08-21 15:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','in_progress','completed','cancelled') NOT NULL DEFAULT 'pending',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `client_id`, `work_name`, `creation_date`, `status`, `category_id`, `bank_id`, `created_at`, `updated_at`) VALUES
(2, 17, 'secondddd demoo', '2025-08-22 19:41:09', 'pending', 3, 8, '2025-08-22 14:11:09', '2025-08-23 13:13:39'),
(3, 18, 'abhi chavda work', '2025-08-22 20:02:59', 'pending', 2, 1, '2025-08-22 14:32:59', '2025-08-23 13:13:25'),
(4, 14, 'this is new work', '2025-08-23 11:06:25', 'pending', 1, 5, '2025-08-23 05:36:25', '2025-08-23 13:15:34'),
(5, 17, 'new workk added', '2025-08-23 19:30:11', 'pending', 1, 8, '2025-08-23 14:00:11', '2025-08-23 14:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `work_steps`
--

CREATE TABLE `work_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `category_step_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_steps`
--

INSERT INTO `work_steps` (`id`, `work_id`, `category_step_id`, `status`, `started_at`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 3, 11, 'completed', '2025-08-23 07:14:51', '2025-08-23 07:14:51', '2025-08-23 07:14:51', '2025-08-23 07:14:51'),
(2, 3, 12, 'completed', '2025-08-23 07:20:35', '2025-08-23 07:20:35', '2025-08-23 07:20:35', '2025-08-23 07:20:35'),
(3, 3, 13, 'completed', '2025-08-23 07:25:27', '2025-08-23 07:26:45', '2025-08-23 07:25:27', '2025-08-23 07:26:45'),
(4, 3, 14, 'completed', '2025-08-23 07:26:56', '2025-08-23 07:26:56', '2025-08-23 07:26:56', '2025-08-23 07:26:56'),
(5, 3, 15, 'completed', '2025-08-23 07:27:08', '2025-08-23 07:27:08', '2025-08-23 07:27:08', '2025-08-23 07:27:08'),
(6, 3, 16, 'completed', '2025-08-23 07:27:12', '2025-08-23 07:27:12', '2025-08-23 07:27:12', '2025-08-23 07:27:12'),
(7, 4, 1, 'completed', '2025-08-23 07:46:23', '2025-08-23 13:43:03', '2025-08-23 07:46:23', '2025-08-23 13:43:03'),
(8, 4, 2, 'completed', '2025-08-23 07:46:27', '2025-08-23 07:46:27', '2025-08-23 07:46:27', '2025-08-23 07:46:27'),
(9, 4, 3, 'completed', '2025-08-23 07:46:29', '2025-08-23 07:46:29', '2025-08-23 07:46:29', '2025-08-23 07:46:29'),
(10, 4, 4, 'completed', '2025-08-23 07:46:32', '2025-08-23 07:46:32', '2025-08-23 07:46:32', '2025-08-23 07:46:32'),
(11, 4, 5, 'completed', '2025-08-23 07:46:35', '2025-08-23 07:46:35', '2025-08-23 07:46:35', '2025-08-23 07:46:35'),
(12, 4, 6, 'completed', '2025-08-23 07:46:38', '2025-08-23 07:46:38', '2025-08-23 07:46:38', '2025-08-23 07:46:38'),
(13, 4, 7, 'completed', '2025-08-23 07:47:44', '2025-08-23 13:42:43', '2025-08-23 07:47:44', '2025-08-23 13:42:43'),
(14, 4, 10, 'pending', '2025-08-23 09:21:07', NULL, '2025-08-23 09:21:07', '2025-08-23 10:43:37'),
(15, 2, 20, 'completed', '2025-08-23 14:29:28', '2025-08-23 14:29:28', '2025-08-23 14:29:28', '2025-08-23 14:29:28'),
(16, 2, 21, 'completed', '2025-08-23 14:29:29', '2025-08-23 14:30:09', '2025-08-23 14:29:29', '2025-08-23 14:30:09'),
(17, 2, 22, 'completed', '2025-08-23 14:36:12', '2025-08-23 14:36:12', '2025-08-23 14:36:12', '2025-08-23 14:36:12'),
(18, 2, 23, 'completed', '2025-08-23 14:37:05', '2025-08-23 14:37:05', '2025-08-23 14:37:05', '2025-08-23 14:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `work_step_options`
--

CREATE TABLE `work_step_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `category_step_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_step_options`
--

INSERT INTO `work_step_options` (`id`, `work_id`, `category_step_id`, `option_id`, `created_at`, `updated_at`) VALUES
(1, 4, 10, 1, '2025-08-23 13:58:57', '2025-08-23 13:59:36'),
(2, 2, 21, 6, '2025-08-23 14:24:48', '2025-08-23 20:13:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_steps`
--
ALTER TABLE `category_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_steps_category_id_foreign` (`category_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `required_docs`
--
ALTER TABLE `required_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `required_docs_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `step_options`
--
ALTER TABLE `step_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `step_options_step_id_foreign` (`step_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_client_id_foreign` (`client_id`),
  ADD KEY `works_category_id_foreign` (`category_id`),
  ADD KEY `works_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `work_steps`
--
ALTER TABLE `work_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_steps_work_id_foreign` (`work_id`),
  ADD KEY `work_steps_category_step_id_foreign` (`category_step_id`);

--
-- Indexes for table `work_step_options`
--
ALTER TABLE `work_step_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_step_options_work_id_foreign` (`work_id`),
  ADD KEY `work_step_options_category_step_id_foreign` (`category_step_id`),
  ADD KEY `work_step_options_option_id_foreign` (`option_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_steps`
--
ALTER TABLE `category_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `required_docs`
--
ALTER TABLE `required_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `step_options`
--
ALTER TABLE `step_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_steps`
--
ALTER TABLE `work_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `work_step_options`
--
ALTER TABLE `work_step_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_steps`
--
ALTER TABLE `category_steps`
  ADD CONSTRAINT `category_steps_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `required_docs`
--
ALTER TABLE `required_docs`
  ADD CONSTRAINT `required_docs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `step_options`
--
ALTER TABLE `step_options`
  ADD CONSTRAINT `step_options_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `category_steps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_steps`
--
ALTER TABLE `work_steps`
  ADD CONSTRAINT `work_steps_category_step_id_foreign` FOREIGN KEY (`category_step_id`) REFERENCES `category_steps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_steps_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_step_options`
--
ALTER TABLE `work_step_options`
  ADD CONSTRAINT `work_step_options_category_step_id_foreign` FOREIGN KEY (`category_step_id`) REFERENCES `category_steps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_step_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `step_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_step_options_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
