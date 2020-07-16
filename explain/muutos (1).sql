-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 12:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muutos`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandlogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `brandlogo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amul', 'brandlogo/GqRasy7UqT0hHvIRvlPhKI8xhrKNhFVhQ8GayIkp.jpeg', '1', '2020-07-15 04:29:20', '2020-07-15 04:29:20'),
(2, 'Basket', 'brandlogo/EeALlJh3ItUWl9gWqfhLuXBBZOciTp4lIdpIeRic.jpeg', '1', '2020-07-15 04:29:41', '2020-07-15 04:29:41'),
(3, 'Avani', 'brandlogo/ClNA1mZlI0ymq30edztcsheCDjPXwUkROR0dDpBs.jpeg', '1', '2020-07-15 04:30:05', '2020-07-15 04:30:05'),
(4, 'Playwood', 'brandlogo/6cT4gQqfF9cYCu3vClnLpvc4anZq6F9i3bCbmHi0.jpeg', '1', '2020-07-15 04:30:23', '2020-07-15 04:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_13_100433_create_permission_tables', 1),
(5, '2020_07_01_071146_create_settings_table', 2),
(6, '2020_07_14_102945_create_productcategorys_table', 3),
(9, '2020_07_15_062919_create_brands_table', 4),
(10, '2020_07_15_062116_create_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 6),
(3, 'App\\User', 4);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(2, 'user-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(3, 'user-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(4, 'user-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(5, 'role-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(6, 'role-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(7, 'role-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(8, 'role-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(9, 'job-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(10, 'job-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(11, 'job-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(12, 'job-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(13, 'setting-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(14, 'setting-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(15, 'setting-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(16, 'setting-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(17, 'productcategory-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(18, 'productcategory-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(19, 'productcategory-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(20, 'productcategory-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(21, 'vendor-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(22, 'vendor-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(23, 'vendor-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(24, 'vendor-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(25, 'brand-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(26, 'brand-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(27, 'brand-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(28, 'brand-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(29, 'product-list', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(30, 'product-create', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(31, 'product-edit', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27'),
(32, 'product-delete', 'web', '2020-07-13 07:55:27', '2020-07-13 07:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `productcategorys`
--

CREATE TABLE `productcategorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcategorys`
--

INSERT INTO `productcategorys` (`id`, `name`, `description`, `categoryimage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Purvesh Patel', 'asd asdsad', 'categoryimage/QH6gMUB4WE8BIFSgMf9dKJCNIUcarCtcrjOZ658Z.jpeg', '1', '2020-07-14 05:28:12', '2020-07-15 06:39:06'),
(2, 'admin', 'asdsdsdas asd saas', 'categoryimage/hmafjYEzkKJ7YKb0ECCXOBbHXo9d4hzKXeZc921g.jpeg', '1', '2020-07-14 05:42:27', '2020-07-15 06:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `details`, `price`, `description`, `productimage`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amul mil', 'amul-mil', 'adsa', 25, 'adas asd asdad asd as', 'productimage/Z4GgB1q9LuvQFXIKFPzXY0DIuMbzoDQ3A85s2HQg.jpeg', 1, '1', '2020-07-15 04:32:41', '2020-07-15 04:32:41'),
(2, 'Asko Playwood', 'asko-playwood', 'asda', 63, 'adas  sa as dsa', NULL, 4, '1', '2020-07-15 04:33:09', '2020-07-15 04:33:09'),
(3, 'Avani seed', 'avani-seed', 'sfsd', 300, 'asd  asdasd dadassad as as', 'productimage/86sNChTGpg67mRQQG4WV3BElVPIeLBk0Mk972NFW.jpeg', 3, '1', '2020-07-15 04:33:42', '2020-07-15 04:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-07-13 07:55:28', '2020-07-13 10:14:16'),
(2, 'vendor', 'web', '2020-07-13 10:15:28', '2020-07-13 10:15:28'),
(3, 'user', 'web', '2020-07-13 10:15:46', '2020-07-13 10:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(4, 1),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(8, 1),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supportemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpdriver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtphost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpusername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtppassword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpencrption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `adminemail`, `supportemail`, `smtpdriver`, `smtphost`, `smtpport`, `smtpusername`, `smtppassword`, `smtpencrption`, `status`, `created_at`, `updated_at`) VALUES
(1, 'purvesh.innovius@gmail.com', 'admin@gmail.com', 'smtp@gmail.com', 'smtp.gmail.com', '587', 'testbyinnovius@gmail.com', 'innovius@1234', 'tls', '1', '2020-07-13 10:27:59', '2020-07-13 10:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localization` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `company`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `city`, `bio`, `profileimage`, `localization`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'sds', 'dsa', 'admin6@gmail.com', NULL, '$2y$10$einPnRTPavuWx0VaPpDhneuz9zrmISpDF9SC2a5NS897klQw/1r2a', '1237894567', 'sjnagar', 'ahmedabad', 'bb', NULL, 'en', '1', NULL, '2020-07-13 07:55:28', '2020-07-14 23:08:38'),
(2, 'vendor', NULL, NULL, 'vendor@gmail.com', NULL, '$2y$10$WSG4QvmPRQGLK6F2IvmB2.EbYgzZrbYOKJMaNRzyMiJjxt50.GC62', '12345678', NULL, NULL, NULL, NULL, 'en', '1', NULL, '2020-07-13 11:04:40', '2020-07-14 05:43:04'),
(4, 'Purvesh555', 'Patel', NULL, 'admins1@gmail.com', NULL, '$2y$10$OQuLuHEU8xyq7UC1raNeUuuMq8x.V8kQpLQHnYoX2KogJ11.yDeOy', '09725366212', 'Paldi', 'Ahnedabad', NULL, 'profileimage/MkM8PSYf3ZRPWSVPel4L8KJXnKpKpywNzPYyqaZB.jpeg', 'fr', '1', NULL, '2020-07-13 22:42:36', '2020-07-14 03:43:50'),
(6, 'vendor 2 3', 'patel 2', 'vendor company 2 2', 'nikul@gmail.com', NULL, '$2y$10$4kapf7rc9D2A1lEXXMIwieb/IeOb9bPvTLfkTGcQUCfjU/CZGEIbK', '32423423423', 'Paldi 2', 'Ahnedabad 2', 'ds sa d as as ss as 2', 'profileimage/tTGmebijDPF0wZdOgbyBugoTohsYutBVgQ9U2Prt.jpeg', 'ar', '1', NULL, '2020-07-14 06:59:00', '2020-07-14 23:35:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategorys`
--
ALTER TABLE `productcategorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productcategorys`
--
ALTER TABLE `productcategorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
