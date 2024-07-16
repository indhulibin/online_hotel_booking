-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 04:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1, 'indhu', 'indhu@gmail.com', '$2y$10$TXuHoGppqIvPgDXjGjGwMOx5c4sCwfVIXxSGfrNwxG9yqfdpY0EVC', 'admin.jpg', '', NULL, '2024-07-05 16:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Air Conditioner', '2024-05-08 17:45:05', '2024-05-08 22:17:46'),
(2, 'Complementary Breakfast', '2024-05-08 17:45:17', '2024-05-08 17:45:17'),
(3, 'Swimming Pool', '2024-05-08 17:45:27', '2024-05-08 17:45:27'),
(4, 'Free Wifi', '2024-05-08 17:45:36', '2024-05-08 17:45:36'),
(5, 'Car Parking Lot', '2024-05-08 17:45:46', '2024-05-08 17:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `booked_rooms`
--

CREATE TABLE `booked_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_date` text NOT NULL,
  `order_no` text NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booked_rooms`
--

INSERT INTO `booked_rooms` (`id`, `booking_date`, `order_no`, `room_id`, `created_at`, `updated_at`) VALUES
(1, '03/07/2024', '1719983128', 1, '2024-07-02 19:35:28', '2024-07-02 19:35:28'),
(2, '03/07/2024', '1719983128', 1, '2024-07-02 19:35:28', '2024-07-02 19:35:28'),
(3, '04/07/2024', '1720058220', 1, '2024-07-03 16:27:00', '2024-07-03 16:27:00'),
(4, '04/07/2024', '1720058220', 1, '2024-07-03 16:27:00', '2024-07-03 16:27:00'),
(5, '05/07/2024', '1720058220', 1, '2024-07-03 16:27:00', '2024-07-03 16:27:00'),
(6, '05/07/2024', '1720059487', 1, '2024-07-03 16:48:07', '2024-07-03 16:48:07'),
(7, '06/07/2024', '1720059487', 1, '2024-07-03 16:48:07', '2024-07-03 16:48:07'),
(8, '05/07/2024', '1720059487', 1, '2024-07-03 16:48:07', '2024-07-03 16:48:07'),
(9, '06/07/2024', '1720059487', 1, '2024-07-03 16:48:07', '2024-07-03 16:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `zip` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `country`, `address`, `state`, `city`, `zip`, `photo`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vinu', 'vinu@gmail.com', '$2y$10$wzQXOLxL00.z.E3r6iLzseQZiw4A6XUG9DmZyHQl.yE34kdvvjACu', '0434951251', 'Australia', '57a Gray Street, Plympton SA 5038, Australia', 'SA', 'Plympton', '5038', NULL, '', 1, '2024-05-28 23:01:47', '2024-06-04 19:15:27'),
(2, 'LIBIN', 'libin@gmail.com', '$2y$10$NGdBtCkEO6.meX4qIwpIh.l2K2s5hwxgaFev5Y/o6V4XsICcciryW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2024-05-29 17:13:08', '2024-06-20 18:33:32'),
(3, 'Aadi', 'aadi@gmail.com', '$2y$10$IWHts8ZmQXN3K4MLmCVtHe8LEE/BFbKohPgwqOEKfG/uNQX4aAB1O', '0434951251', 'Australia', '57a Gray Street, Plympton SA 5038, Australia', 'SA', 'Plympton', '5038', 'customer1717212197.jpg', '', 1, '2024-05-30 10:30:01', '2024-06-21 19:38:02'),
(4, 'ivy', 'ivy@gmail.com', '$2y$10$djxaJIpknK3ddUFXmWWTH.32HBdrxBDi.kBLcdgTGOE4zZ9wnyPwu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2024-05-30 20:39:48', '2024-05-30 20:48:49'),
(5, 'Delna', 'delna@gmail.com', '$2y$10$TCujCO0ozdCBxkFCERFzKuDFESZXRg2.mn7D4SyZixDj5zB1LE4p6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2024-06-20 17:51:06', '2024-06-20 22:57:56'),
(6, 'Riya', 'riya@gmail.com', '$2y$10$Oq2RVxs2/uyygQuGsxm2AeRnRlejqcIa14.AJo5pVluGawHwY0XIC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2024-06-20 23:02:05', '2024-06-20 23:23:43'),
(7, 'Anand', 'anand@gmail.com', '$2y$10$lDz.3/ZutBM1mrRIqT.tB.w2YcN2Fj0il5wWPubZKML.uEuxm6Lay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2024-06-20 23:33:14', '2024-06-21 19:39:58'),
(8, 'Ranni', 'ranni@gmail.com', '$2y$10$HwZX6JNXiMUB6F10yDH/cuWaBJ0vb.UQ/QVkopujUwHbQyOcaduri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2024-06-21 00:21:53', '2024-06-21 20:56:26');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Accordion Item_1', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ut has quidam prodesset, eos sumo ipsum civibus ea, vel quas nusquam ei. Et sea doming quodsi audire. No vim ornatus scaevola disputando, qui stet ceteros ad. Ad his choro appetere mnesarchum, no duo accusata incorrupte, vel essent fabulas ut.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Ne nam soluta libris. Cu sea utamur adipiscing, convenire patrioque dignissim et nec. Accusam incorrupte vituperatoribus vix ad, ei clita omnium mentitum pro. Est ad duis perpetua recteque, in autem posidonium qui. Illum nulla dolor mea an.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Officiis disputationi ne pri, libris malorum eam id. Molestie principes vix no. Ut velit iudicabit inciderint mea. Malorum mediocrem deseruisse nam ne, tale imperdiet vim ut. Aperiri splendide cu eos, vis in alia laoreet aliquando.</p>', '2024-04-29 01:51:28', '2024-04-29 20:45:00'),
(2, 'Accordion Item_2', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ut has quidam prodesset, eos sumo ipsum civibus ea, vel quas nusquam ei. Et sea doming quodsi audire. No vim ornatus scaevola disputando, qui stet ceteros ad. Ad his choro appetere mnesarchum, no duo accusata incorrupte, vel essent fabulas ut.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Ne nam soluta libris. Cu sea utamur adipiscing, convenire patrioque dignissim et nec. Accusam incorrupte vituperatoribus vix ad, ei clita omnium mentitum pro. Est ad duis perpetua recteque, in autem posidonium qui. Illum nulla dolor mea an.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Officiis disputationi ne pri, libris malorum eam id. Molestie principes vix no. Ut velit iudicabit inciderint mea. Malorum mediocrem deseruisse nam ne, tale imperdiet vim ut. Aperiri splendide cu eos, vis in alia laoreet aliquando.</p>', '2024-04-29 20:48:48', '2024-04-29 20:48:48'),
(3, 'Accordion Item_3', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ut has quidam prodesset, eos sumo ipsum civibus ea, vel quas nusquam ei. Et sea doming quodsi audire. No vim ornatus scaevola disputando, qui stet ceteros ad. Ad his choro appetere mnesarchum, no duo accusata incorrupte, vel essent fabulas ut.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Ne nam soluta libris. Cu sea utamur adipiscing, convenire patrioque dignissim et nec. Accusam incorrupte vituperatoribus vix ad, ei clita omnium mentitum pro. Est ad duis perpetua recteque, in autem posidonium qui. Illum nulla dolor mea an.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Officiis disputationi ne pri, libris malorum eam id. Molestie principes vix no. Ut velit iudicabit inciderint mea. Malorum mediocrem deseruisse nam ne, tale imperdiet vim ut. Aperiri splendide cu eos, vis in alia laoreet aliquando.</p>', '2024-04-29 20:49:05', '2024-04-29 20:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text NOT NULL,
  `heading` text NOT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `icon`, `heading`, `text`, `created_at`, `updated_at`) VALUES
(1, 'fa fa-clock-o', '24 hour Room service', 'If you find a lower online rate, we will match it and give you an additional 25% off on your stay.', '2024-04-15 23:26:26', '2024-04-16 08:53:51'),
(2, 'fa fa-wifi', 'Free Wifi', 'If you find a lower online rate, we will match it and give you an additional 25% off on your stay.', '2024-04-16 08:19:17', '2024-04-16 08:19:17'),
(3, 'fa fa-superpowers', 'Enjoy Free Nights', 'If you find a lower online rate, we will match it and give you an additional 25% off on your stay.', '2024-04-16 08:23:23', '2024-04-16 08:23:23'),
(4, 'fa fa-money', 'Save up to 40%', 'Members get access to an exclusive discounts on Radissonblu.com. Not a member yet? Hurry Up!', '2024-04-16 08:26:18', '2024-04-16 08:26:18');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_27_080612_create_admins_table', 1),
(7, '2024_04_08_013808_create_sliders_table', 2),
(8, '2024_04_15_081427_create_features_table', 3),
(9, '2024_04_16_191138_create_testimonials_table', 4),
(10, '2024_04_23_005955_create_posts_table', 5),
(11, '2024_04_27_053822_create_photos_table', 6),
(13, '2024_04_28_035940_create_videos_table', 7),
(14, '2024_04_29_072247_create_faqs_table', 7),
(15, '2024_04_30_091327_create_pages_table', 8),
(16, '2024_05_08_020535_create_subscribers_table', 9),
(17, '2024_05_09_023601_create_amenities_table', 10),
(18, '2024_05_09_080511_create_rooms_table', 11),
(19, '2024_05_09_091139_create_room_photos_table', 12),
(20, '2024_05_27_015537_create_customers_table', 13),
(21, '2024_06_17_083849_create_orders_table', 14),
(22, '2024_06_18_003804_create_order_details_table', 15),
(23, '2024_06_22_034921_create_sessions_table', 16),
(24, '2024_06_26_122538_create_booked_rooms_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_no` text NOT NULL,
  `transaction_id` text NOT NULL,
  `payment_method` text NOT NULL,
  `card_last_digit` text DEFAULT NULL,
  `paid_amount` text NOT NULL,
  `booking_date` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_no`, `transaction_id`, `payment_method`, `card_last_digit`, `paid_amount`, `booking_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '1719983128', 'txn_3PYLNjLuT1HOFDi01yS8B5hU', 'Stripe', '4242', '6', '03/07/2024', 'completed', '2024-07-02 19:35:28', '2024-07-02 19:35:28'),
(2, 3, '1720058220', 'txn_3PYeutLuT1HOFDi00la8acir', 'Stripe', '4242', '9', '04/07/2024', 'completed', '2024-07-03 16:27:00', '2024-07-03 16:27:00'),
(3, 3, '1720059487', 'txn_3PYfFJLuT1HOFDi00Qpg3de9', 'Stripe', '4242', '12', '04/07/2024', 'completed', '2024-07-03 16:48:07', '2024-07-03 16:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `order_no` text NOT NULL,
  `check_in_date` text NOT NULL,
  `check_out_date` text NOT NULL,
  `adult` text NOT NULL,
  `children` text DEFAULT NULL,
  `subtotal` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `room_id`, `order_no`, `check_in_date`, `check_out_date`, `adult`, `children`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1719983128', '03/07/2024', '04/07/2024', '1', NULL, '3', '2024-07-02 19:35:28', '2024-07-02 19:35:28'),
(2, 1, 1, '1719983128', '03/07/2024', '04/07/2024', '2', NULL, '3', '2024-07-02 19:35:28', '2024-07-02 19:35:28'),
(3, 2, 1, '1720058220', '04/07/2024', '05/07/2024', '1', NULL, '3', '2024-07-03 16:27:00', '2024-07-03 16:27:00'),
(4, 2, 1, '1720058220', '04/07/2024', '06/07/2024', '2', NULL, '6', '2024-07-03 16:27:00', '2024-07-03 16:27:00'),
(5, 3, 1, '1720059487', '05/07/2024', '07/07/2024', '1', NULL, '6', '2024-07-03 16:48:07', '2024-07-03 16:48:07'),
(6, 3, 1, '1720059487', '05/07/2024', '07/07/2024', '1', NULL, '6', '2024-07-03 16:48:07', '2024-07-03 16:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_heading` text NOT NULL,
  `about_content` text NOT NULL,
  `about_status` int(11) NOT NULL,
  `terms_heading` text NOT NULL,
  `terms_content` text NOT NULL,
  `terms_status` int(11) NOT NULL,
  `privacy_heading` text NOT NULL,
  `privacy_content` text NOT NULL,
  `privacy_status` int(11) NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_map` text NOT NULL,
  `contact_status` int(11) NOT NULL,
  `photo_gallery_heading` text NOT NULL,
  `photo_gallery_status` int(11) NOT NULL,
  `video_gallery_heading` text NOT NULL,
  `video_gallery_status` int(11) NOT NULL,
  `faq_heading` text NOT NULL,
  `faq_status` int(11) NOT NULL,
  `blog_heading` text NOT NULL,
  `blog_status` int(11) NOT NULL,
  `cart_heading` text NOT NULL,
  `cart_status` int(11) NOT NULL,
  `checkout_heading` text NOT NULL,
  `checkout_status` int(11) NOT NULL,
  `payment_heading` text NOT NULL,
  `signup_heading` text NOT NULL,
  `signup_status` int(11) NOT NULL,
  `signin_heading` text NOT NULL,
  `signin_status` int(11) NOT NULL,
  `room_heading` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `about_heading`, `about_content`, `about_status`, `terms_heading`, `terms_content`, `terms_status`, `privacy_heading`, `privacy_content`, `privacy_status`, `contact_heading`, `contact_map`, `contact_status`, `photo_gallery_heading`, `photo_gallery_status`, `video_gallery_heading`, `video_gallery_status`, `faq_heading`, `faq_status`, `blog_heading`, `blog_status`, `cart_heading`, `cart_status`, `checkout_heading`, `checkout_status`, `payment_heading`, `signup_heading`, `signup_status`, `signin_heading`, `signin_status`, `room_heading`, `created_at`, `updated_at`) VALUES
(1, 'About', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', 1, 'Terms and Conditions', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', 1, 'Privacy Policy', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', 1, 'Contact', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3270.136892774752!2d138.5601148753975!3d-34.95317747283102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0cf8be99c0071%3A0xc803d29b4b56e40c!2s57%20Gray%20St%2C%20Plympton%20SA%205038!5e0!3m2!1sen!2sau!4v1714638381198!5m2!1sen!2sau\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 'Photo Gallery', 1, 'Video  Gallery', 1, 'FAQ', 1, 'Blog', 1, 'Cart', 1, 'Checkout', 1, 'awe', 'Sign Up', 1, 'Login', 1, 'Rooms', '2024-04-30 09:16:39', '2024-05-24 21:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo`, `caption`, `created_at`, `updated_at`) VALUES
(1, '1720230302.jpg', 'Caption_1', '2024-04-26 21:30:30', '2024-07-05 16:15:02'),
(2, '1714201405.jpg', 'Caption_2', '2024-04-26 21:33:25', '2024-04-26 21:33:25'),
(3, '1714201433.jpg', 'Caption_3', '2024-04-26 21:33:53', '2024-04-26 21:33:53'),
(4, '1714201450.jpg', 'Caption_4', '2024-04-26 21:34:10', '2024-04-26 21:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `heading` text NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `total_view` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `photo`, `heading`, `short_content`, `content`, `total_view`, `created_at`, `updated_at`) VALUES
(4, '1713865205.jpg', 'This is a sample blog post title-1', 'If you want to get some good contents from the people of your country then just contribute into the main community of your people and I am sure you will be benfitted from that.', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', '1', '2024-04-23 00:10:05', '2024-04-24 04:03:32'),
(5, '1713865241.jpg', 'This is a sample blog post title-2', 'If you want to get some good contents from the people of your country then just contribute into the main community of your people and I am sure you will be benfitted from that.', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', '2', '2024-04-23 00:10:41', '2024-04-25 00:57:48'),
(6, '1713865280.jpg', 'This is a sample blog post title-3', 'If you want to get some good contents from the people of your country then just contribute into the main community of your people and I am sure you will be benfitted from that.', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', '4', '2024-04-23 00:11:20', '2024-05-14 22:55:10'),
(7, '1713866481.jpg', 'This is a sample blog post title-4', 'If you want to get some good contents from the people of your country then just contribute into the main community of your people and I am sure you will be benfitted from that.', '<p><br></p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p><span style=\"color: rgb(51, 51, 51); font-family: Karla, sans-serif;\"><br></span>                                        \r\n                                    </p>', '5', '2024-04-23 00:31:21', '2024-05-04 22:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `total_rooms` text NOT NULL,
  `amenities` text NOT NULL,
  `size` text NOT NULL,
  `total_beds` text NOT NULL,
  `total_bathrooms` text NOT NULL,
  `total_balconies` text NOT NULL,
  `total_guests` text NOT NULL,
  `featured_photo` text NOT NULL,
  `video_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `price`, `total_rooms`, `amenities`, `size`, `total_beds`, `total_bathrooms`, `total_balconies`, `total_guests`, `featured_photo`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 'Standard Couple Bed', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', '3', '2', '1,2,5', '56m2', '4', '2', '1', '6', '1720232124.jpg', 'FDdtZfCui40', '2024-05-14 21:43:44', '2024-07-05 16:45:24'),
(2, 'Standard Single Bed', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, suscipit dissentiunt usu at, eu nam veri vidit signiferumque. Ad mea erat fabellas, et facete everti eum, tation consul ea ius. Autem feugiat maiorum id sea. Est omnis mediocrem assentior ea. Nam ubique possit verterem ea, cum facer scriptorem an.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Equidem legendos duo ei, et legimus offendit mei. Mea amet tibique explicari ne. Nam blandit patrioque comprehensam an, sed in errem omnes partem. No quo impedit percipit comprehensam, ei dolores intellegam pro, et sed quaeque temporibus referrentur. Quodsi causae dissentias in pri, idque ridens cum an. Vis in facilisi conclusionemque, eu est erant affert veritus. Id qui quodsi iriure quaestio, omittam praesent ne sea, postulant consetetur definitiones an nec.</p>', '2', '1', '1,4,5', '30m2', '1', '1', '0', '2', '1716445555.jpg', '4K6Sh1tsAW4', '2024-05-22 20:55:55', '2024-06-16 21:45:33'),
(7, 'Deluxe Couple Bed Room', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, suscipit dissentiunt usu at, eu nam veri vidit signiferumque. Ad mea erat fabellas, et facete everti eum, tation consul ea ius. Autem feugiat maiorum id sea. Est omnis mediocrem assentior ea. Nam ubique possit verterem ea, cum facer scriptorem an.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Equidem legendos duo ei, et legimus offendit mei. Mea amet tibique explicari ne. Nam blandit patrioque comprehensam an, sed in errem omnes partem. No quo impedit percipit comprehensam, ei dolores intellegam pro, et sed quaeque temporibus referrentur. Quodsi causae dissentias in pri, idque ridens cum an. Vis in facilisi conclusionemque, eu est erant affert veritus. Id qui quodsi iriure quaestio, omittam praesent ne sea, postulant consetetur definitiones an nec.</p>', '1', '2', '1,2,3,4', '60m2', '2', '2', '1', '4', '1716455112.jpg', 'pTSu3YiRHPw', '2024-05-22 23:35:12', '2024-06-16 21:45:48'),
(8, 'Delux Single Bed Room', '<p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, suscipit dissentiunt usu at, eu nam veri vidit signiferumque. Ad mea erat fabellas, et facete everti eum, tation consul ea ius. Autem feugiat maiorum id sea. Est omnis mediocrem assentior ea. Nam ubique possit verterem ea, cum facer scriptorem an.</p><p style=\"color: rgb(33, 37, 41); font-family: Karla, sans-serif; font-size: 16px;\">Equidem legendos duo ei, et legimus offendit mei. Mea amet tibique explicari ne. Nam blandit patrioque comprehensam an, sed in errem omnes partem. No quo impedit percipit comprehensam, ei dolores intellegam pro, et sed quaeque temporibus referrentur. Quodsi causae dissentias in pri, idque ridens cum an. Vis in facilisi conclusionemque, eu est erant affert veritus. Id qui quodsi iriure quaestio, omittam praesent ne sea, postulant consetetur definitiones an nec.</p>', '4', '1', '1,4', '40', '1', '1', '0', '1', '1716455450.jpg', 'pTSu3YiRHPw', '2024-05-22 23:40:50', '2024-06-16 21:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `room_photos`
--

CREATE TABLE `room_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_photos`
--

INSERT INTO `room_photos` (`id`, `room_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, '0-1716445134.jpg', '2024-05-22 20:48:54', '2024-05-22 20:48:54'),
(2, 1, '1-1716445134.jpg', '2024-05-22 20:48:54', '2024-05-22 20:48:54'),
(3, 2, '0-1716445679.jpg', '2024-05-22 20:57:59', '2024-05-22 20:57:59'),
(4, 2, '1-1716445679.jpg', '2024-05-22 20:57:59', '2024-05-22 20:57:59');

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

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `heading` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `button_text` text DEFAULT NULL,
  `button_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `heading`, `text`, `button_text`, `button_url`, `created_at`, `updated_at`) VALUES
(1, '1712722934.jpg', 'BEST HOTEL IN THE CITY', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt libero voluptate, veritatis esse dolorem soluta.', 'Read More', '#', '2024-04-08 19:35:14', '2024-04-09 18:52:14'),
(2, '1712722999.jpg', 'QUALITY ROOMS FOR THE GUESTS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt libero voluptate, veritatis esse dolorem soluta.', 'Read More', '#', '2024-04-08 19:39:40', '2024-04-09 18:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vinu@gmail.com', '', 1, '2024-05-07 19:14:59', '2024-05-07 23:42:25'),
(5, 'libinpb@gmail.com', '', 1, '2024-05-08 16:09:42', '2024-05-08 16:10:02'),
(6, 'indhu@gmail.com', '', 1, '2024-05-08 16:31:43', '2024-05-08 16:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `photo`, `name`, `designation`, `comment`, `created_at`, `updated_at`) VALUES
(1, '1713790070.jpg', 'Dulquer Salmaan', 'Actor', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur\"', '2024-04-22 02:28:44', '2024-04-22 03:17:50'),
(2, '1713790247.jpg', 'Sal Harvey', 'Director,ABC Company', '\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, Ipsum is simply dummy text of the printing and typesetting industry.\"', '2024-04-22 03:20:47', '2024-04-22 04:01:39');

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

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video` text NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video`, `caption`, `created_at`, `updated_at`) VALUES
(1, 'J1ASMYP6bMQ', 'Cinematic Promo Video | Lisbon City Hotel', '2024-04-28 22:24:52', '2024-04-28 22:24:52'),
(2, 's8vnc9l8sz4', 'Hotel Room Promo Video', '2024-04-28 22:26:03', '2024-04-28 22:26:03'),
(3, 'S0akXQD8WAs', 'Hotel room Interior Video', '2024-04-28 22:26:52', '2024-04-28 22:26:52'),
(4, '0SlmQvcXBK8', 'Living Room TV Unit Design', '2024-04-28 22:26:56', '2024-04-28 22:26:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_photos`
--
ALTER TABLE `room_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_photos`
--
ALTER TABLE `room_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
