-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2019 at 11:53 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webuycart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(9, 'Games', '2019-09-12 21:59:44', '2019-09-12 21:59:44'),
(10, 'Movies', '2019-09-12 21:59:48', '2019-09-12 21:59:48'),
(11, 'Electronics', '2019-09-12 21:59:53', '2019-09-12 21:59:53');

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
(1, '2019_09_07_090810_create_users_table', 1),
(2, '2019_09_07_091138_create_products_table', 2),
(4, '2019_09_07_091345_create_category_table', 3),
(9, '2019_09_09_041534_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_email`, `product_ids`, `status`, `address`, `city`, `state`, `mobile`, `payment_method`, `total_price`, `created_at`, `updated_at`) VALUES
(1, '1', 'pandeyaditya951@gmail.com', '[21]', 'confirm', 'Room no 15, Tripathi Niwas, Pratap Nagar, P.N Road, Bhandup (W) Mumbai 400078', 'MUMBAI', 'MAHARASHTRA', '9702099730', 'cash', '2500', '2019-09-13 03:38:50', '2019-09-13 03:38:50'),
(2, '4', 'ahana@gmail.com', '[22]', 'confirm', 'Kalyan', 'Mumbai', 'Maharashtra', '9702099730', 'cash', '5500', '2019-09-13 04:14:16', '2019-09-13 04:14:16'),
(3, '4', 'ahana@gmail.com', '[21]', 'confirm', 'Thane', 'Mumbai', 'Maharashtra', '9702099730', 'cash', '2500', '2019-09-13 04:15:46', '2019-09-13 04:15:46'),
(4, '4', 'ahana@gmail.com', '[21]', 'confirm', 'Bhandup', 'Mumbai', 'Maharashtra', '9702099730', 'cash', '2500', '2019-09-13 04:17:00', '2019-09-13 04:17:00'),
(5, '4', 'ahana@gmail.com', '[23]', 'confirm', 'Room no 15, Tripathi Niwas, Pratap Nagar, P.N Road, Bhandup (W) Mumbai 400078', 'Mumbai', 'Maharashtra', '9702099730', 'cash', '850', '2019-09-13 04:17:38', '2019-09-13 04:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(21, 'Call of Duty', 'Games', 'A PC Game', 'phpVW0L6w.jpg', 2500, '2019-09-12 22:12:47', '2019-09-12 22:12:47'),
(22, 'Headphones', 'Electronics', 'A new headphone', 'phpgoyuBj.jpg', 5500, '2019-09-12 22:13:20', '2019-09-12 22:13:20'),
(23, 'Ferdinand', 'Movies', 'Ferdinand Animated Movie', 'php1CQo8i.jpg', 850, '2019-09-12 22:17:56', '2019-09-12 22:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `mobileno`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Viraj', 'Bhandup', 'viraj@gmail.com', '9702099730', '13a4a200512058e39ca485c306372692', '2019-09-13 03:40:47', '2019-09-13 03:40:47'),
(3, 'Aditya Pandey', 'Kalyan', 'pandeyaditya951@gmail.com', '9702099730', 'cc03e747a6afbbcbf8be7668acfebee5', '2019-09-13 03:43:51', '2019-09-13 03:43:51'),
(4, 'Ahana Pandey', 'Kalyan', 'ahana@gmail.com', '9702099730', '9e684ca999f80dc190b44c901f2109ca', '2019-09-13 04:11:07', '2019-09-13 04:11:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
