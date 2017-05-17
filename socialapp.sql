-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2016 at 12:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialapp`
--
CREATE DATABASE IF NOT EXISTS `socialapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `socialapp`;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `like` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `like`, `created_at`, `updated_at`) VALUES
(12, 1, 8, 0, '2016-09-27 07:47:55', '2016-09-27 07:47:55'),
(13, 1, 3, 0, '2016-09-27 07:47:58', '2016-09-27 07:48:01'),
(14, 1, 2, 1, '2016-09-27 07:48:04', '2016-09-27 07:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_09_26_052346_create_users_table', 1),
('2016_09_27_082120_create_likes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'hey this is post by the validation', 1, '2016-09-26 06:44:40', '2016-09-26 06:44:40'),
(3, 'hey the final test for thr posts', 1, '2016-09-26 06:49:14', '2016-09-26 06:49:14'),
(8, 'new post after update and see update emidatlly and hide the modal two', 3, '2016-09-27 03:11:32', '2016-09-27 07:07:23'),
(9, 'check the edit model after second edit try and see update  and test the new model close two', 3, '2016-09-27 03:40:50', '2016-09-27 07:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ali', 'alaa_dragneel@yahoo.com', '$2y$10$6V/ri5ZM4w2lov4JjGX3l.M9KImZAFOseJZlWvs0LgWNKbWYF7EZS', 'XkO1IeUeCZlCQq9ICyhkApZpckBQFpYkm4or04r6EN6r7tT7du7QdwX9f5Xb', '2016-09-26 04:10:23', '2016-09-27 08:13:43'),
(2, 'alaa', 'alaa@alaa.com', '$2y$10$pevuVZveLbig8el4UT1vEeHK2eGrVgqjLiSbdlc3dSkyYZmXDK74C', NULL, '2016-09-26 04:11:17', '2016-09-26 04:11:17'),
(3, 'sasuke', 'sasuke_alaa@yahoo.com', '$2y$10$/lcZxJ0jmw7fyVnxLP2O6u5YJqjq3orvx/I4uswVO9IyPY.ktpPmu', 'fuHgDJrKv1AzpXSzy8oA5Pn4C1bkF3P2Zrhsm8RlbSZFkGHz01V2uRJz25zE', '2016-09-26 04:12:32', '2016-09-27 08:27:44'),
(6, 'moaalaa', 'moaalaa@yahoo.com', '$2y$10$qzYZHBXO/xDO5zGhagNx4exOcoGxbNJRNcGGqDwGG1twI5g6tKrSa', NULL, '2016-09-26 04:31:52', '2016-09-26 04:31:52'),
(7, 'ddm', 'aaa@xxx.co', '$2y$10$ehoeELkwMRszxh4MCb9FiOx0ZhIr8XVvD/hO/.p312wbD5i6caSFm', NULL, '2016-09-26 05:01:15', '2016-09-26 05:01:15'),
(8, 'mohamed', 'alaa@mohamed.com', '$2y$10$z2KBNftoNLvUK6mojRsqHe1oYBKKLQYVSiHs9cadsPne7dBoB/466', NULL, '2016-09-26 05:11:20', '2016-09-26 05:11:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_relations` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
