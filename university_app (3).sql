-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 08:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_name_bn` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_slug` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deletable` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `division_name_bn`, `division_slug`, `division_title`, `deletable`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Barisal', 'বরিশাল', 'barisal', '', 1, 'Barisal related bangladesh story', 'bangladesh story', NULL, NULL),
(2, 'Chittagong', 'চট্টগ্রাম', 'chittagong', '', 1, 'Chittagong related bangladesh story', 'bangladesh story', NULL, NULL),
(3, 'Dhaka', 'ঢাকা', 'dhaka', '', 1, 'Dhaka related bangladesh story', 'bangladesh story', NULL, NULL),
(4, 'Khulna', 'খুলনা', 'khulna', '', 1, 'Khulna related bangladesh story', 'bangladesh story', NULL, NULL),
(5, 'Rajshahi', 'রাজশাহী', 'rajshahi', '', 1, 'Rajshahi related bangladesh story', 'bangladesh story', NULL, NULL),
(6, 'Sylhet', 'সিলেট', 'sylhet', '', 1, 'Sylhet related bangladesh story', 'bangladesh story', NULL, NULL),
(7, 'Rangpur', 'রংপুর', 'rangpur', '', 1, 'Rangpur related bangladesh story', 'bangladesh story', NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', 'mymensingh', '', 1, 'Mymensingh related bangladesh story', 'bangladesh story', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_09_065445_create_divisions_table', 1),
(6, '2024_11_09_065446_create_university_types_table', 1),
(7, '2024_11_09_065447_create_university_fund_types_table', 1),
(8, '2024_11_09_065448_create_university_program_subject_types_table', 1),
(9, '2024_11_09_065449_create_universities_table', 1),
(10, '2024_11_09_065451_create_university_program_types_table', 1),
(11, '2024_11_09_065452_create_university_university_program_type_table', 1),
(12, '2024_11_09_065453_create_university_programs_table', 1),
(13, '2024_11_11_053054_create_storages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storages`
--

CREATE TABLE `storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `storageable_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storages`
--

INSERT INTO `storages` (`id`, `storageable_id`, `storageable_type`, `file_type`, `path`, `created_at`, `updated_at`) VALUES
(1, '1', 'App\\University', 'png', 'University/University_1731914007.png', '2024-11-18 01:13:28', '2024-11-18 01:13:28'),
(2, '1', 'App\\UniversityProgram', 'jpg', 'UniversityProgram/UniversityProgram_1731914048.jpg', '2024-11-18 01:14:08', '2024-11-18 01:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_fund_type_id` bigint(20) UNSIGNED NOT NULL,
  `university_type_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_count` int(11) NOT NULL DEFAULT 0,
  `contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_links` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmap_link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_register` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `title`, `university_fund_type_id`, `university_type_id`, `division_id`, `description`, `phone`, `seat_count`, `contact`, `short_links`, `gmap_link`, `web_link`, `email`, `email_register`, `deletable`, `status`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Cupiditate inventore', 1, 1, 3, 'Nihil nostrum tempor', '+1 (869) 725-7412', 1000, 'Tempor exercitation', 'Eum accusantium libe', 'Eaque repellendus A', 'Velit reiciendis inc', 'pivo@mailinator.com', 'remideg@mailinator.com', 1, 1, 'Cupiditate inventore', 'Cupiditate inventore', '2024-11-18 01:13:27', '2024-11-18 01:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `university_fund_types`
--

CREATE TABLE `university_fund_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_fund_types`
--

INSERT INTO `university_fund_types` (`id`, `title`, `description`, `deletable`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'সরকারি', NULL, 1, 'সরকারি', '', NULL, NULL),
(2, 'বেসরকারি', NULL, 1, 'বেসরকারি', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university_programs`
--

CREATE TABLE `university_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `university_program_type_id` bigint(20) UNSIGNED NOT NULL,
  `university_program_subject_type_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_credit` int(11) NOT NULL DEFAULT 0,
  `total_year` int(11) NOT NULL DEFAULT 0,
  `exam_system` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_requirement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_cost` int(11) NOT NULL DEFAULT 0,
  `total_cost` int(11) NOT NULL DEFAULT 0,
  `admission_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_form_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_programs`
--

INSERT INTO `university_programs` (`id`, `title`, `university_id`, `university_program_type_id`, `university_program_subject_type_id`, `description`, `total_credit`, `total_year`, `exam_system`, `exam_requirement`, `admission_cost`, `total_cost`, `admission_link`, `online_form_link`, `web_link`, `deletable`, `status`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Nihil enim perferend', 1, 2, 1, 'Ut necessitatibus im', 150, 4, 'Tempore voluptate e', 'Qui exercitationem s', 500, 50000, 'Autem et sit ad id', 'Explicabo Ducimus', 'Temporibus aliquam r', 1, 1, 'Nihil enim perferend', 'Nihil enim perferend', '2024-11-18 01:14:08', '2024-11-18 01:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `university_program_subject_types`
--

CREATE TABLE `university_program_subject_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_program_subject_types`
--

INSERT INTO `university_program_subject_types` (`id`, `title`, `description`, `deletable`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'বিজ্ঞান বিভাগ', 'বিজ্ঞান বিভাগ', 1, 'বিজ্ঞান বিভাগ', 'বিজ্ঞান বিভাগ', NULL, NULL),
(2, 'মানবিক বিভাগ', 'মানবিক বিভাগ', 1, 'মানবিক বিভাগ', 'মানবিক বিভাগ', NULL, NULL),
(3, 'ব্যবসায় শিক্ষা বিভাগ', 'ব্যবসায় শিক্ষা বিভাগ', 1, 'ব্যবসায় শিক্ষা বিভাগ', 'ব্যবসায় শিক্ষা বিভাগ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university_program_types`
--

CREATE TABLE `university_program_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_program_types`
--

INSERT INTO `university_program_types` (`id`, `title`, `description`, `deletable`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'উপস্নাতক', NULL, 1, 'উপস্নাতক', '', NULL, NULL),
(2, 'স্নাতক', NULL, 1, 'স্নাতক', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university_types`
--

CREATE TABLE `university_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_types`
--

INSERT INTO `university_types` (`id`, `title`, `description`, `deletable`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'ইঞ্জিনিয়ারিং', NULL, 1, 'ইঞ্জিনিয়ারিং', '', NULL, NULL),
(2, 'ব্যবস্যায়িক', NULL, 1, 'ব্যবস্যায়িক', '', NULL, NULL),
(3, 'মেডিকেল', NULL, 1, 'মেডিকেল', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university_university_program_type`
--

CREATE TABLE `university_university_program_type` (
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `university_program_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_university_program_type`
--

INSERT INTO `university_university_program_type` (`university_id`, `university_program_type_id`) VALUES
(1, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$1CUY/D7lo5W/SaxhdXqrtu0mcL148sLia0mng5fAxiuXLasoXu176', 'VZaLpKWcm4AcO4dJZyZtZcwXgARhNYV9Hk8hLRFFXSzYqCrdeqjX36ng6yCk', '2024-11-08 12:59:56', '2024-11-08 12:59:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universities_university_fund_type_id_foreign` (`university_fund_type_id`),
  ADD KEY `universities_university_type_id_foreign` (`university_type_id`),
  ADD KEY `universities_division_id_foreign` (`division_id`);

--
-- Indexes for table `university_fund_types`
--
ALTER TABLE `university_fund_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_programs`
--
ALTER TABLE `university_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_programs_university_id_foreign` (`university_id`),
  ADD KEY `university_programs_university_program_type_id_foreign` (`university_program_type_id`),
  ADD KEY `university_programs_university_program_subject_type_id_foreign` (`university_program_subject_type_id`);

--
-- Indexes for table `university_program_subject_types`
--
ALTER TABLE `university_program_subject_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_program_types`
--
ALTER TABLE `university_program_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_types`
--
ALTER TABLE `university_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storages`
--
ALTER TABLE `storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university_fund_types`
--
ALTER TABLE `university_fund_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university_programs`
--
ALTER TABLE `university_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university_program_subject_types`
--
ALTER TABLE `university_program_subject_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `university_program_types`
--
ALTER TABLE `university_program_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university_types`
--
ALTER TABLE `university_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `universities_university_fund_type_id_foreign` FOREIGN KEY (`university_fund_type_id`) REFERENCES `university_fund_types` (`id`),
  ADD CONSTRAINT `universities_university_type_id_foreign` FOREIGN KEY (`university_type_id`) REFERENCES `university_types` (`id`);

--
-- Constraints for table `university_programs`
--
ALTER TABLE `university_programs`
  ADD CONSTRAINT `university_programs_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `university_programs_university_program_subject_type_id_foreign` FOREIGN KEY (`university_program_subject_type_id`) REFERENCES `university_program_subject_types` (`id`),
  ADD CONSTRAINT `university_programs_university_program_type_id_foreign` FOREIGN KEY (`university_program_type_id`) REFERENCES `university_program_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
