-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 05:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` enum('old','new') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `price` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `desc`, `version`, `price`, `image`, `created_at`, `updated_at`) VALUES
(4, 'book 1', 'lorem', 'new', 16, '62fa5cb3f173a.png', '2022-08-15 12:48:20', '2022-08-15 12:51:49'),
(5, 'book 2', 'lorem', 'new', 16, '62fa5cb3f173a.png', '2022-08-15 12:48:20', '2022-08-15 12:51:49'),
(7, 'book 4', 'lorem', 'new', 16, '62fa5cb3f173a.png', '2022-08-15 12:48:20', '2022-08-15 12:51:49'),
(8, 'book 5', 'lorem', 'old', 11, '62fd1b1aeaade.jpg', '2022-08-17 14:45:15', '2022-08-17 14:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 4, 3, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 8, 1, NULL, NULL),
(6, 8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'romantic', '2022-08-10 13:43:53', '2022-08-10 13:43:53'),
(3, 'Historical', '2022-08-10 13:48:13', '2022-08-10 13:48:24'),
(4, 'Policy', '2022-08-10 14:11:47', '2022-08-10 14:11:47'),
(5, 'xMz54SWjDZ', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(6, 'xGYuBna7Or', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(7, 'VFpEtzPiQ4', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(8, 'I550FAMagM', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(9, '8UU1OBhew3', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(10, 'LG6rmHGPjg', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(11, 'NpXEP95qsB', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(12, 'fSooC92zLs', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(13, '7oJzgEJ0cw', '2022-08-22 07:21:06', '2022-08-22 07:21:06'),
(14, '5L83bUR0rO', '2022-08-22 07:21:06', '2022-08-22 07:21:06');

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
(3, '2022_08_08_165720_create_categories_table', 2),
(5, '2022_07_31_232931_create_books_table', 3),
(7, '2022_08_15_140254_create_book_category_table', 4),
(8, '2022_08_15_152801_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oAuth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ApiOAuth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `oAuth`, `ApiOAuth`, `created_at`, `updated_at`, `type`) VALUES
(2, 'mohamed elsayed', 'app@mail.com', '$2y$10$z3cVbpJHSutg3OvpznWTl.5Id5Yzud3bH3gByUc0xkoLmS2teX1au', NULL, NULL, '2022-08-15 14:01:25', '2022-08-15 14:01:25', 'user'),
(5, 'Mai Mahmoud', 'mail@mail.com', '$2y$10$kxi5vHL54208IjQL99sERenVjsxpadaCNAR64I9cw8gCjBKZC.A2a', NULL, NULL, '2022-08-15 14:11:58', '2022-08-15 14:11:58', 'user'),
(7, 'mohamedElsayedIbrahim', 'mohamdeesayed@outlook.com', '$2y$10$gm8BorwBEIdJt7.HuAFGP.B824mp17ngnvGIRc/AD/9rCM90hNan.', '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', NULL, '2022-08-17 13:40:47', '2022-08-17 13:40:47', 'user'),
(31, 'mail@mail.com', 'mail@mail.com', '$2y$10$gophJ7c47BoriBeklI7/KeVa1PiDXEf2A9BEPYA70CkzKuoeWM/4S', NULL, NULL, '2022-08-22 09:04:52', '2022-08-22 09:04:52', 'user'),
(32, 'mail@mail.com', 'mail@mail.com', '$2y$10$SWtNhaUzS.SHTNQNsIkz5.0BXR0vChIKocY3ngeEKS5cubtyhj4my', NULL, NULL, '2022-08-22 09:07:59', '2022-08-22 09:07:59', 'user'),
(33, 'mohamdeesayed@outlook.com', 'mail@mail.com', '$2y$10$PcxW6Hw4fiqKL8ezJwz9d.ROHDWyIiwNj8d.zBBAzynhmqUkXGhQi', NULL, NULL, '2022-08-22 09:08:55', '2022-08-22 09:08:55', 'user'),
(34, 'mail@mail.com', 'mail@mail.com', '$2y$10$r/RJ2fcjYYGcIVZ8JVogaurANdEGBsciqfx/baBPAP69si4wACaaS', NULL, NULL, '2022-08-22 15:48:25', '2022-08-22 15:48:25', 'user'),
(35, 'mail@mail.com', 'mail@mail.com', '$2y$10$Sxk6Rl3HZWDyJVSuArnjZ.gPKBL1MJ7uLkjzDyuxSK9ahz/pjdHD.', NULL, NULL, '2022-08-22 15:49:25', '2022-08-22 15:49:25', 'user'),
(36, 'mail@mail.com', 'mail@mail.com', '$2y$10$2fB5p90Sj76TMcfJnKrYK.Wy0eMP4v2SSZH61ZRa.z3if/XOTZAIW', NULL, NULL, '2022-08-22 15:52:52', '2022-08-22 15:52:52', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_book_id_foreign` (`book_id`),
  ADD KEY `book_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
