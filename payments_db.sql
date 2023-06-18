-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2023 at 05:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022/ 2023', 1, '2023-06-15 16:01:02', '2023-06-17 00:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `programme_id`, `academic_year_id`, `created_at`, `updated_at`) VALUES
(1, 'First year', 1, 1, '2023-06-17 18:38:50', '2023-06-18 07:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `class_promotions`
--

CREATE TABLE `class_promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `to_class_id` bigint(20) UNSIGNED NOT NULL,
  `to_programme_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` varchar(255) NOT NULL,
  `new_academic_year_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_06_15_025850_create_programmes_table', 1),
(5, '2023_06_15_030202_create_academic_years_table', 1),
(6, '2023_06_15_030530_create_semesters_table', 1),
(7, '2023_06_15_030700_create_classes_table', 1),
(8, '2023_06_15_030856_create_students_table', 1),
(9, '2023_06_15_031121_create_class_promotions_table', 1),
(10, '2023_06_16_063437_create_payments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `amount_paid` varchar(255) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `amount_paid`, `transaction_code`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 1, '100.00', 'biZXrAUZiO-2023-06-17 21:41:01', 'PayPal', '2023-06-17 18:41:01', '2023-06-17 18:41:01'),
(2, 1, '120.00', 'DopzPurauw-2023-06-17 21:42:32', 'PayPal', '2023-06-17 18:42:32', '2023-06-17 18:42:32'),
(3, 1, '57.00', 'khxapDZAkQ-2023-06-17 21:43:29', 'PayPal', '2023-06-17 18:43:29', '2023-06-17 18:43:29'),
(4, 2, '231.00', 'Je3W4NE4CF-2023-06-17 22:35:43', 'PayPal', '2023-06-17 19:35:43', '2023-06-17 19:35:43'),
(5, 2, '100.00', 'NMTi8a4foP-2023-06-17 22:36:22', 'PayPal', '2023-06-17 19:36:22', '2023-06-17 19:36:22'),
(6, 2, '17.90', 'Q1oQ58PBWK-2023-06-18 14:03:46', 'PayPal', '2023-06-18 11:03:46', '2023-06-18 11:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `name`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'BCEIT', 1875400, '2023-06-15 15:34:43', '2023-06-15 15:34:43'),
(2, 'BA', 1490400, '2023-06-15 15:37:54', '2023-06-17 00:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `academic_year_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Semester one', 1, 1, '2023-06-15 16:24:59', '2023-06-15 16:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `reg_number`, `class_id`, `programme_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Simon Mbise', 'simonmbise@gmail.com', '19011028', 1, 1, '$2y$10$5cNjNE74XUChL3OExA6fqeoO4B5NEAQJ6QqNdYpxAB4Gw3wKrO/wK', '2023-06-17 18:39:41', '2023-06-18 07:38:21'),
(2, 'Beno Mwampamba', 'student@student.com', 'UAUT-20-2023', 1, 2, '$2y$10$VOFjQimyvZ3AXGittB9CfOx.awz5MlxkMjzYZqmF18Vu/H47VuQgK', '2023-06-17 19:34:30', '2023-06-18 11:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==burser, 1==admin',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Beno Mwampamba', 'benomwampamba@gmail.com', 1, '$2y$10$bWEvwnsWjfhmZJq0q1quFOvlfSxuxtzRdGmJA2ExG6jLkETeeE6dS', '2023-06-15 03:39:08', '2023-06-18 12:26:56'),
(2, 'Bursar', 'bursar@bursar@uaut.ac.tz', 0, '$2y$10$5j1gaAW7dEvns3k6sYeB1.2ymDy1r7RnBE6DLbxSnX0JirRKfIgqO', '2023-06-15 13:49:57', '2023-06-18 12:29:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_years_name_unique` (`name`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_programme_id_foreign` (`programme_id`),
  ADD KEY `classes_academic_year_id_foreign` (`academic_year_id`);

--
-- Indexes for table `class_promotions`
--
ALTER TABLE `class_promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_promotions_class_id_foreign` (`class_id`),
  ADD KEY `class_promotions_programme_id_foreign` (`programme_id`),
  ADD KEY `class_promotions_to_class_id_foreign` (`to_class_id`),
  ADD KEY `class_promotions_to_programme_id_foreign` (`to_programme_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programmes_name_unique` (`name`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesters_academic_year_id_foreign` (`academic_year_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_reg_number_unique` (`reg_number`),
  ADD KEY `students_class_id_foreign` (`class_id`),
  ADD KEY `students_programme_id_foreign` (`programme_id`);

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
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_promotions`
--
ALTER TABLE `class_promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_promotions`
--
ALTER TABLE `class_promotions`
  ADD CONSTRAINT `class_promotions_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_promotions_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_promotions_to_class_id_foreign` FOREIGN KEY (`to_class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_promotions_to_programme_id_foreign` FOREIGN KEY (`to_programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
