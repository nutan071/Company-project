-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2024 at 06:12 PM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin@', '2024-07-18 06:56:49', '2024-07-18 06:56:49');

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
(1, '2024_07_16_121111_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(4, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2019_08_19_000000_create_failed_jobs_table', 2),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2024_07_16_080935_create_admin_table', 2),
(8, '2024_07_16_081132_create_product_table', 2),
(9, '2024_07_16_081833_create_orders_table', 2),
(10, '2024_07_16_120339_add_role_id_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 'chocolate', 'yummy..!', '500.00', 5, '1721303202.jpg', '2024-07-18 08:15:11', '2024-07-18 06:16:42'),
(3, 'Aimee Adams', 'Aspernatur dolores e', '230.00', 4, '1721303416.jpg', '2024-07-18 06:20:16', '2024-07-18 06:20:16'),
(5, 'Dieter Bond', 'Placeat est aliqui', '9.00', 75, '1721389554.jpg', '2024-07-18 06:29:08', '2024-07-19 06:15:54'),
(21, 'Porter Landry', 'Consequat Rem ut de', '144.00', 41, '1721389389.jpg', '2024-07-19 06:13:09', '2024-07-19 06:13:09'),
(22, 'Joel Christian', 'Rerum earum in excep', '862.00', 22, '1721389540.jpg', '2024-07-19 06:14:14', '2024-07-19 06:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2024-07-18 06:14:45', '2024-07-18 06:14:45'),
(2, 'admin', '2024-07-18 06:14:45', '2024-07-18 06:14:45');

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
  `role_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abigail Mcclure', 'fotyjogem@mailinator.com', NULL, '$2y$12$8/weWMQGFdJ9Q8Bos8WCYOOYYo1afHLJ.pWsCvFwFlUB/wIFXy.Ta', 1, NULL, '2024-07-18 00:48:07', '2024-07-18 00:48:07'),
(2, 'Hector Sanford', 'robusa@mailinator.com', NULL, '$2y$12$XMPNd7dvXdgoKusNONv8PemCuGi9D54t.Z2JO6jgYPr.7nVr8Zeuy', 1, NULL, '2024-07-18 00:50:44', '2024-07-18 00:50:44'),
(3, 'krisha', 'krisha@gmail.com', NULL, '$2y$12$Zy9p3SDMcDNFVDVojvnl7.K8L.S74uMhht2K96gf7oD.szTnWF/12', 1, NULL, '2024-07-18 00:54:45', '2024-07-18 00:54:45'),
(4, 'krish', 'krish123@gmail.com', NULL, '$2y$12$F9BbAT7w3xdM/CBbG1LXyesmeTdIkKKO1.V1W2iL2.LUMWOAj9euu', 2, NULL, '2024-07-18 01:24:28', '2024-07-18 01:24:28'),
(5, 'Amanda Huffman', 'aman@gmail.com', NULL, '$2y$12$4iiNJqBzMj9J/1JhunAIX.WMw9Mnox.B8C0UrOR4P31qQWvtH3Rni', 2, NULL, '2024-07-18 01:28:45', '2024-07-18 01:28:45'),
(6, 'kinjal', 'kinjal123@gmail.com', NULL, '$2y$12$GtZgBrMY1FcSjuu8K/p3U.TvEwAaeC.V8vUN.RGEWiYSG8fbu.LYi', 2, NULL, '2024-07-18 02:52:13', '2024-07-18 02:52:13'),
(7, 'kinjal_kyada', 'kinjal123_kyada@gmail.com', NULL, '$2y$12$il8rwpH708yyOWRHY5OJ0uem5b3MrQoHahnUkkxjPRu1uc2Oir6Bm', 2, NULL, '2024-07-18 02:53:30', '2024-07-18 02:53:30'),
(8, 'Quinn Levine', 'pufafo@mailinator.com', NULL, '$2y$12$dipYL239Mn9tqSx8FRviauGY4WxHbBZeyoILNZZOo/wJ8d3K5M8ke', 2, NULL, '2024-07-18 04:28:34', '2024-07-18 04:28:34'),
(9, 'Nola Lucas', 'nebihibin@mailinator.com', NULL, '$2y$12$kXIvvkYP1XxdqFHendB4m.B7digvUCMOw.LBA4msCYapJjN9sKTJu', 2, NULL, '2024-07-18 04:56:49', '2024-07-18 04:56:49'),
(10, 'Admin', 'admin@example.com', NULL, '$2y$12$MW85y8QzYQMmLgf64R7rCewoonTSkZ/9I8Zos16CY.9yIbxHQfNui', 1, NULL, '2024-07-18 05:13:10', '2024-07-18 05:13:10'),
(11, 'Connor Mckee', 'xydymaw@mailinator.com', NULL, '$2y$12$PkawDYApjysoRsCyC/CI8uBdPm1JSLBH9m.0wAbJiFc9yqfe/3oUG', 2, NULL, '2024-07-18 05:47:44', '2024-07-18 05:47:44'),
(12, 'liza', 'lz123@gmail.com', NULL, '$2y$12$ktq8vO41mZIUmW802.kbHuAda.NCrkXN.jmq/xrALKasgokcLKdYO', 2, NULL, '2024-07-18 05:48:25', '2024-07-18 05:48:25'),
(13, 'urvi', 'urvi123@gmail.com', NULL, '$2y$12$cBgjjXjA0vQP1xla/4FdbeF7K5rSZWt3RzC.jg79ZUbVEVMYHfC/C', 2, NULL, '2024-07-18 06:23:02', '2024-07-18 06:23:02'),
(14, 'Unity Dillon', 'fizyhij@mailinator.com', NULL, '$2y$12$4.0DinlGpL/RKGPBRhSMyeA63F/CG2Hvf8VehzNu8gkpvWggm.BWS', 2, NULL, '2024-07-18 06:33:14', '2024-07-18 06:33:14'),
(15, 'Francis Whitfield', 'wicojima@mailinator.com', NULL, '$2y$12$pqIrS//iGjeQIXIr1sRW3.g3gRttCQwLvCf3oBIQOsoMf9drwh3H6', 2, NULL, '2024-07-18 07:37:32', '2024-07-18 07:37:32'),
(16, 'Chaim Burns', 'medoboqe@mailinator.com', NULL, '$2y$12$uUEqVfKBMx2xtzlKyqQEYuPHM6FQ6YfBmWEBSYRQups3mpqkPwYKm', 2, NULL, '2024-07-18 07:43:20', '2024-07-18 07:43:20'),
(17, 'Kirestin Sanders', 'xihyg@mailinator.com', NULL, '$2y$12$64KTXqiihJPLSS6Zd8eu1uEh2b6qWocqtBcXWkyTQ9k3VrZ.w/HHi', 2, NULL, '2024-07-18 07:58:11', '2024-07-18 07:58:11'),
(18, 'Janna Wiggins', 'palizi@mailinator.com', NULL, '$2y$12$eDVexwclyS1fFEjd3utnYO9xkYyrEMeW1Oe6Oh665msza6.gaaJ.2', 2, NULL, '2024-07-18 08:26:33', '2024-07-18 08:26:33'),
(19, 'Ruth Glass', 'tybewy@mailinator.com', NULL, '$2y$12$48XPMRJeBWG3rDCuE6SZQ.jYhGymNhocEFzVXYhT4kLwW8ayOTdxS', 2, NULL, '2024-07-18 22:51:14', '2024-07-18 22:51:14'),
(20, 'hitiksha', 'hiti@gmail.com', NULL, '$2y$12$xZSQ/oMBNIipEbT.UddnO.pJxqSO2SHO2tqJciGYCjxWbMvVIuiLm', 2, NULL, '2024-07-18 22:55:25', '2024-07-18 22:55:25'),
(21, 'Zephania Bradford', 'bylot@mailinator.com', NULL, '$2y$12$facgQI2GTuRdZx1d5BsBcu1SLCuUfcSZfYIn24rgCYoVoU4GJ187i', 2, NULL, '2024-07-19 00:13:56', '2024-07-19 00:13:56'),
(22, 'Hayfa Rush', 'jysitus@mailinator.com', NULL, '$2y$12$eWmgb9rAGK0BXvqh.KNp8.K5asjS7UABIez8Nr8IDXr1AC94rm6q2', 2, NULL, '2024-07-19 02:23:34', '2024-07-19 02:23:34'),
(23, 'Amena Tanner', 'didyh@mailinator.com', NULL, '$2y$12$5lWY01NPlq9aAvs8GBPf8eVRODTI.21q8uZl19dHMlAKv1356bDvG', 2, NULL, '2024-07-19 02:43:52', '2024-07-19 02:43:52'),
(24, 'Aquila Horn', 'vulaka@mailinator.com', NULL, '$2y$12$yRf0EkBimv7XoyeikbtckuVGjVj30x.W5yDTXPQ3H17lR.iuUmj86', 2, NULL, '2024-07-19 02:51:05', '2024-07-19 02:51:05'),
(25, 'Ulla Nash', 'pawifenu@mailinator.com', NULL, '$2y$12$Oc5xwN1eyB7PY1IS4qQts.ErLkCEz3tMg5Nu37869Q9CMEAYUwU52', 2, NULL, '2024-07-19 03:30:16', '2024-07-19 03:30:16'),
(26, 'Tamara Sexton', 'wuzodeleh@mailinator.com', NULL, '$2y$12$F5loWKikaCBojhqZzxUWw.9BBtvqmsrZNut9iaVK2CqA/KJYbl502', 2, NULL, '2024-07-19 03:45:02', '2024-07-19 03:45:02'),
(27, 'Hiram Rhodes', 'wutahu@mailinator.com', NULL, '$2y$12$BZO93Pesays1mcB5NFP0JeYHQ6TzYJkPVN8qJynYXJDMW89LLk3UO', 2, NULL, '2024-07-19 03:52:02', '2024-07-19 03:52:02'),
(28, 'Nyssa Buckley', 'jabased@mailinator.com', NULL, '$2y$12$VBrJpfNRE2fMNFnP5IHGJegX9Lqj3ujlWfXUf.MSdWwQQTyqWNo5.', 2, NULL, '2024-07-19 04:24:00', '2024-07-19 04:24:00'),
(29, 'Myles Duncan', 'raziwami@mailinator.com', NULL, '$2y$12$aZI.1fTBeOy5Yaa5IvbP.u4.w7SyqzJ0KXZ6eY5kiASsjv/q2EjCe', 2, NULL, '2024-07-19 04:24:31', '2024-07-19 04:24:31'),
(30, 'Graham Dawson', 'qyly@mailinator.com', NULL, '$2y$12$ZLo1pAjys76giKe8E3F2GeDaybtYm.mh222ZTi0BUYZ/JanrTxp3e', 2, NULL, '2024-07-19 05:10:31', '2024-07-19 05:10:31'),
(31, 'Sonya Valencia', 'nylac@mailinator.com', NULL, '$2y$12$lCbzln4aalc.Z.heYC2htucAG8MiFdJQnBswrYjbu9EPAxPCX3xdq', 2, NULL, '2024-07-19 06:17:05', '2024-07-19 06:17:05'),
(32, 'Daniel Savage', 'pinegel@mailinator.com', NULL, '$2y$12$tlngHjAQeCgyQw3j.RsmKuVkWhQrlIwk9ffV0TOAqyYG0XJTGNJ3.', 2, NULL, '2024-07-19 06:26:30', '2024-07-19 06:26:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
