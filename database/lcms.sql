-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 09:30 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `project_detail` int NOT NULL,
  `labor_id` int NOT NULL,
  `date` date NOT NULL,
  `attendances` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `project_id`, `project_detail`, `labor_id`, `date`, `attendances`, `created_at`, `updated_at`) VALUES
(37, 5, 3, 3, '2021-04-23', 1, '2021-04-22 19:17:17', '2021-04-22 19:17:32'),
(38, 5, 3, 4, '2021-04-23', 0, '2021-04-22 19:17:17', '2021-04-22 19:17:17'),
(39, 5, 3, 5, '2021-04-23', 1, '2021-04-22 19:17:17', '2021-04-22 19:19:09'),
(40, 5, 4, 3, '2021-04-23', 0, '2021-04-22 19:17:17', '2021-04-22 19:17:17'),
(41, 5, 4, 4, '2021-04-23', 0, '2021-04-22 19:17:17', '2021-04-22 19:17:17'),
(42, 5, 4, 5, '2021-04-23', 1, '2021-04-22 19:17:17', '2021-04-22 19:17:28'),
(43, 5, 3, 3, '2021-04-24', 1, '2021-04-23 19:48:40', '2021-04-23 19:49:05'),
(44, 5, 3, 4, '2021-04-24', 1, '2021-04-23 19:48:40', '2021-04-23 20:16:28'),
(45, 5, 3, 5, '2021-04-24', 1, '2021-04-23 19:48:40', '2021-04-23 19:48:49'),
(46, 5, 4, 3, '2021-04-24', 1, '2021-04-23 19:48:41', '2021-04-23 20:17:33'),
(47, 5, 4, 4, '2021-04-24', 1, '2021-04-23 19:48:41', '2021-04-23 20:17:31'),
(48, 5, 4, 5, '2021-04-24', 1, '2021-04-23 19:48:41', '2021-04-23 20:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labors`
--

CREATE TABLE `labors` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double(8,2) NOT NULL,
  `other` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labors`
--

INSERT INTO `labors` (`id`, `type`, `name`, `phone`, `nid`, `salary`, `other`, `created_at`, `updated_at`) VALUES
(1, 'rajmistri', 'Thaddeus Cochran', '+1 (518) 985-7136', '9865465496846', 500.00, 'Dolor esse totam mag', '2021-04-09 13:30:15', '2021-04-10 00:15:19'),
(3, 'general_labor', 'Victor Whitehead', '+1 (711) 961-1233', '70', 33.00, 'Totam error odio rec', '2021-04-13 12:36:23', '2021-04-13 12:36:23'),
(4, 'foreman', 'Yeo Lancaster', '+1 (805) 439-7444', '46', 74.00, 'Ut architecto odit s', '2021-04-13 12:36:28', '2021-04-13 12:36:28'),
(5, 'rajmistri', 'Elmo Padilla', '+1 (293) 822-4924', '15546546', 1000.00, 'Vel et id sint ulla', '2021-04-14 03:36:26', '2021-04-14 03:36:26'),
(6, 'general_labor', 'Ahmed Akhi', '01719221101', '1029503385934', 10.00, NULL, '2021-04-17 07:36:23', '2021-04-17 07:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2021_04_09_162701_create_labors_table', 2),
(7, '2021_04_10_181753_create_projects_table', 3),
(8, '2021_04_13_163625_create_project_details_table', 4),
(11, '2021_04_15_184908_create_attendances_table', 5),
(13, '2021_04_18_214436_create_salaries_table', 6),
(14, '2021_04_24_021045_create_salary_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyr_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strat_date` date NOT NULL,
  `end_date` date NOT NULL,
  `rate` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `companyr_name`, `location`, `area`, `budget`, `strat_date`, `end_date`, `rate`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Logan Terry', 'Hood and Maldonado Plc', 'Doloribus voluptatem', 'Excepturi vero corpo', '590', '2021-04-17', '1985-05-28', 2000.00, 'Officia molestias eu', '2021-04-11 10:19:59', '2021-04-16 15:13:30'),
(5, 'Mira Chan', 'Snider and Frazier Trading', 'Minim assumenda dolo', 'Proident excepteur', '900', '2021-04-17', '2021-04-24', 5000.00, 'Eiusmod quidem quis', '2021-04-14 03:37:11', '2021-04-16 21:23:33'),
(6, 'Glenna Blackwell', 'Riley Lee Inc', 'Dolore deserunt corr', '100', '5000', '2021-04-18', '2003-05-30', 50.00, 'Ut officia id qui es', '2021-04-15 12:50:17', '2021-04-16 21:20:06'),
(7, 'Britanney Snyder', 'Estes and Montoya Inc', 'Placeat et et dolor', '100', '2300', '2021-04-16', '2021-04-17', 23.00, 'Doloribus voluptatum', '2021-04-15 12:50:40', '2021-04-16 21:25:09'),
(8, 'Ahmed Bappy', 'Md Nurul Islam', 'Doloribus voluptatem', '30', '1020', '2021-04-17', '2021-04-30', 34.00, NULL, '2021-04-17 10:01:00', '2021-04-17 10:01:00'),
(9, 'Scarlet Barlow', 'Woods and Fulton Traders', 'Itaque et recusandae', '910', '91000', '2021-04-23', '1992-02-29', 100.00, 'Voluptatem exercitat', '2021-04-22 18:23:43', '2021-04-22 18:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strat_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `labor_id` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'panding',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `project_id`, `name`, `strat_date`, `end_date`, `description`, `labor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Damian Kinney', '2014-03-11', '1994-10-01', 'Recusandae Et vitae et rerum Nam aute dolore porro est non qui unde officia sint', '[\"3\",\"4\"]', 'panding', '2021-04-13 12:51:24', '2021-04-13 12:51:24'),
(2, 4, 'Elliott Jensen', '2009-05-15', '2008-10-22', 'Quia rerum sed sint ipsum atque cumque possimus sit quidem quidem dolores autem dolores et atque autem accusamus', '[\"3\",\"4\"]', 'panding', '2021-04-13 13:03:42', '2021-04-13 13:03:42'),
(3, 5, 'Ahmed Bappy', '2021-04-15', '2021-04-15', 'sdfg fdsg fsdg sfdg fdsgf dsgfds', '[\"3\",\"4\",\"5\"]', 'panding', '2021-04-14 03:38:00', '2021-04-14 03:38:00'),
(4, 5, 'Stone Callahan', '2015-12-29', '1973-07-05', 'Qui fugiat libero dolore est', '[\"3\",\"4\",\"5\"]', 'panding', '2021-04-15 10:59:17', '2021-04-15 10:59:17'),
(5, 7, 'Frances Irwin', '2021-04-17', '2021-04-18', 'Non deserunt ut dolor neque esse dolorum eos sunt et facilis voluptatem assumenda est esse qui quaerat et non officia', '[\"4\",\"5\"]', 'panding', '2021-04-17 07:33:58', '2021-04-17 07:33:58'),
(6, 9, 'matikata', '2021-04-23', '2021-04-24', 'sadf adsf dsaf adsf adsf adsf ads', '[\"1\",\"3\"]', 'panding', '2021-04-22 18:24:24', '2021-04-22 18:24:24'),
(7, 9, 'Accumsan Tree Fusce', '2021-04-23', '2021-04-30', 'asdf dsaf dsaf a', '[\"5\",\"6\"]', 'panding', '2021-04-22 18:25:01', '2021-04-22 18:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `labor_id` int NOT NULL,
  `project_id` int NOT NULL,
  `project_detail` int NOT NULL,
  `khoraki` double(8,2) NOT NULL,
  `salary` double(8,2) NOT NULL,
  `payable` double(8,2) NOT NULL,
  `pay` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'panding',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `labor_id`, `project_id`, `project_detail`, `khoraki`, `salary`, `payable`, `pay`, `status`, `note`, `created_at`, `updated_at`) VALUES
(10, 5, 5, 4, 400.00, 4000.00, 1100.00, 1100.00, 'paid', NULL, '2021-04-23 19:17:28', '2021-04-23 20:17:52'),
(11, 3, 5, 3, 300.00, 99.00, 133.00, 133.00, 'paid', NULL, '2021-05-22 19:17:32', '2021-04-23 20:18:22'),
(12, 5, 5, 4, 200.00, 2000.00, 2200.00, 2200.00, 'paid', NULL, '2021-04-21 19:17:28', '2021-04-22 19:28:07'),
(13, 5, 5, 4, 200.00, 2000.00, 2200.00, 2200.00, 'paid', NULL, '2021-04-20 19:17:28', '2021-04-20 19:28:07'),
(14, 4, 5, 3, 200.00, 148.00, 174.00, 174.00, 'paid', NULL, '2021-04-23 20:16:29', '2021-04-23 20:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `salary_details`
--

CREATE TABLE `salary_details` (
  `id` bigint UNSIGNED NOT NULL,
  `labor_id` int NOT NULL,
  `pay` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_details`
--

INSERT INTO `salary_details` (`id`, `labor_id`, `pay`, `created_at`, `updated_at`) VALUES
(1, 5, 1100.00, '2021-04-23 20:17:52', '2021-04-23 20:17:52'),
(2, 4, 174.00, '2021-04-23 20:18:02', '2021-04-23 20:18:02'),
(3, 3, 133.00, '2021-04-23 20:18:22', '2021-04-23 20:18:22'),
(4, 5, 1100.00, '2021-04-21 20:17:52', '2021-04-23 20:17:52'),
(5, 4, 174.00, '2021-04-21 20:18:02', '2021-04-23 20:18:02'),
(6, 3, 133.00, '2021-04-22 20:18:22', '2021-04-23 20:18:22'),
(19, 5, 1100.00, '2021-04-19 20:17:52', '2021-04-19 20:17:52'),
(20, 4, 174.00, '2021-04-19 20:18:02', '2021-04-19 20:18:02'),
(21, 3, 133.00, '2021-04-20 20:18:22', '2021-04-20 20:18:22'),
(22, 4, 174.00, '2021-04-22 20:18:02', '2021-04-22 20:18:02'),
(23, 5, 110.00, '2021-04-22 20:17:52', '2021-04-22 20:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'Super Admin', 'admin@dev.local', NULL, '$2y$10$9gDS2VAQ3vPcu.ii4F3ro.GRY9cevOZmjqWMwC9EW39mJVXpUUFrW', NULL, '2021-04-04 09:44:16', '2021-04-04 09:44:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `labors`
--
ALTER TABLE `labors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_details`
--
ALTER TABLE `salary_details`
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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labors`
--
ALTER TABLE `labors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salary_details`
--
ALTER TABLE `salary_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
