-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 08:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanceecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_bn`, `brand_slug_en`, `brand_slug_bn`, `brand_image`, `created_at`, `updated_at`) VALUES
(3, 'iphone', 'আইফোন', 'iphone', 'আইফোন', ' public/uploads/brand/5fc32edac8911.png', '2020-11-28 23:20:25', '2020-11-28 23:20:25'),
(4, 'walton', 'ওয়ালটন', 'walton', 'ওয়ালটন', 'uploads/brand/5fc32b7799a3c.png', '2020-11-28 23:02:48', '2020-11-28 23:02:48'),
(5, 'Sweets', 'সুইটস', 'sweets', 'সুইটস', 'uploads/brand/5fc330073dd56.webp', '2020-11-28 23:22:15', NULL),
(6, 'Oppo', 'অপ্পো', 'oppo', 'অপ্পো', 'uploads/brand/5fc330c8a982d.png', '2020-11-28 23:25:28', NULL),
(7, 'Samsung', 'স্যামস্যাং', 'samsung', 'স্যামস্যাং', 'uploads/brand/5fc3316c0cc93.jpg', '2020-11-28 23:28:12', NULL),
(8, 'Huawei', 'হুয়াওয়েই', 'huawei', 'হুয়াওয়েই', 'uploads/brand/5fc331cb32e43.png', '2020-11-28 23:29:47', NULL),
(9, 'eBazar', 'ই-বাজার', 'ebazar', 'ই-বাজার', 'uploads/brand/5fc33233c4631.png', '2020-11-28 23:31:31', NULL),
(10, 'Grind broken oil', 'ঘানি ভাঙ্গা তেল', 'grind-broken-oil', 'ঘানি-ভাঙ্গা-তেল', 'uploads/brand/5fc332db0adcf.jpg', '2020-11-28 23:34:19', NULL),
(11, 'Natural Honey', 'প্রাকৃতিক মধু', 'natural-honey', 'প্রাকৃতিক-মধু', 'uploads/brand/5fc333f664fd7.png', '2020-11-28 23:39:02', NULL),
(12, 'Online Food', 'অনলাইন ফুুড', 'online-food', 'অনলাইন-ফুুড', 'uploads/brand/5fc33446382b6.png', '2020-11-28 23:40:22', NULL),
(13, 'Electronics', 'ইলেক্ট্রোনিকস', 'electronics', 'ইলেক্ট্রোনিকস', 'uploads/brand/5fc3359452643.jpg', '2020-11-28 23:45:56', NULL),
(14, 'Our Products', 'আমাদের প্রোডাক্ট', 'our-products', 'আমাদের-প্রোডাক্ট', 'uploads/brand/5fc3361b3f6f7.jpg', '2020-11-28 23:48:11', NULL),
(15, 'Rado', 'রাডো', 'rado', 'রাডো', 'uploads/brand/5fd47dd30df63.png', '2020-12-12 02:22:43', NULL),
(16, 'sound box', 'সাউন্ড বক্স', 'sound-box', 'সাউন্ড-বক্স', 'uploads/brand/602ba7823687a.png', '2021-02-27 23:05:28', '2021-02-27 23:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_bn`, `category_slug_en`, `category_slug_bn`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Our Products', 'আমাদের প্রাডাক্ট', 'our-products', 'আমাদের-প্রাডাক্ট', 'icon fa fa-envira', '2020-11-29 11:07:11', '2020-11-29 11:07:11'),
(3, 'money', 'মধু', 'money', 'মধু', 'fa fa-shopping-bag', '2020-11-29 01:35:52', '2020-11-29 01:35:52'),
(4, 'Fast Food', 'ফাস্ট ফুড', 'fast-food', 'ফাস্ট-ফুড', 'icon fa fa-heartbeat', '2020-11-29 11:05:41', '2020-11-29 11:05:41'),
(5, 'Electronics', 'ইলেকট্রনিক্স', 'electronics', 'ইলেকট্রনিক্স', 'fa fa-shopping-bag', '2020-11-29 00:04:36', '2020-11-29 00:04:36'),
(6, 'eBazar', 'ই-বাজার', 'ebazar', 'ই-বাজার', 'fas fa-shopping-cart', '2021-02-16 01:27:22', '2021-02-16 01:27:22'),
(7, 'Fabrics (Man)', 'ফ্যাব্রিক্স (পুরুষ)', 'fabrics-(man)', 'ফ্যাব্রিক্স-(পুরুষ)', 'fa fa-shopping-bag', '2020-11-29 00:15:27', '2020-11-29 00:15:27'),
(8, 'Fabrics (Women)', 'ফ্যাব্রিক্স (মহিলা)', 'fabrics-(women)', 'ফ্যাব্রিক্স-(মহিলা)', 'fa fa-shopping-bag', '2020-11-29 00:15:08', NULL),
(9, 'Kids and Babies', 'বাচ্চাদের আইটেম', 'kids-and-babies', 'বাচ্চাদের-আইটেম', 'icon fa fa-paper-plane', '2020-11-29 11:11:54', '2020-11-29 11:11:54'),
(10, 'Shoes', 'সুজ', 'shoes', 'সুজ', 'icon fa fa-paw', '2020-11-29 11:03:32', '2020-11-29 11:03:32'),
(13, 'Others', 'অন্যন্য', 'others', 'অন্যন্য', 'fa fa-shopping-bag', '2020-11-29 09:21:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(4, 'HAPPY NEW YEAR', 10, '2021-05-16', 1, '2021-01-07 05:24:38', NULL),
(5, 'EMON', 15, '2021-01-30', 1, '2021-01-14 10:22:04', NULL),
(6, 'VALENTINE DAY', 10, '2021-03-13', 1, '2021-02-15 14:31:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2020_11_02_035709_create_roles_table', 1),
(5, '2020_11_09_125214_create_brands_table', 2),
(6, '2020_11_09_142412_create_categories_table', 3),
(7, '2020_11_12_033545_create_sub_categories_table', 4),
(8, '2020_11_12_151458_create_subsub_categories_table', 5),
(9, '2020_11_15_055251_create_products_table', 6),
(10, '2020_11_15_062815_create_multi_imgs_table', 7),
(14, '2020_11_24_150421_create_sliders_table', 8),
(20, '2020_11_24_172230_create_sliders_table', 9),
(21, '2020_12_27_111750_create_wishlists_table', 10),
(22, '2020_12_29_140702_create_coupons_table', 11),
(23, '2020_12_29_165041_create_ship_divisions_table', 12),
(24, '2020_12_29_165205_create_ship_districts_table', 12),
(25, '2020_12_29_165231_create_ship_thanas_table', 12),
(26, '2021_01_07_141253_create_shippings_table', 13),
(27, '2021_01_14_133619_create_orders_table', 14),
(30, '2021_01_14_133648_create_order_items_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(27, 9, 'uploads/multi-img/5fd476cd9d398.jpeg', '2020-12-12 01:52:47', NULL),
(28, 9, 'uploads/multi-img/5fd47b2ecb6bd.jpg', '2020-12-12 01:52:48', '2020-12-12 02:11:27'),
(29, 9, 'uploads/multi-img/5fd476d0364a5.jpg', '2020-12-12 01:52:48', NULL),
(30, 9, 'uploads/multi-img/5fd476d0a0130.jpg', '2020-12-12 01:52:49', NULL),
(31, 9, 'uploads/multi-img/5fd476d11d0e1.jpg', '2020-12-12 01:52:49', NULL),
(32, 9, 'uploads/multi-img/5fd476d189c1e.jpg', '2020-12-12 01:52:50', NULL),
(33, 10, 'uploads/multi-img/5fd47d6711b21.jpg', '2020-12-12 02:20:55', NULL),
(34, 10, 'uploads/multi-img/5fd47d6782f49.jpg', '2020-12-12 02:20:55', NULL),
(35, 10, 'uploads/multi-img/5fd47d68070b9.jpg', '2020-12-12 02:20:56', NULL),
(36, 10, 'uploads/multi-img/5fd47d6872f02.jpg', '2020-12-12 02:20:56', NULL),
(37, 10, 'uploads/multi-img/5fd47d6901aff.jpg', '2020-12-12 02:20:57', NULL),
(38, 10, 'uploads/multi-img/5fd47d698b47d.jpg', '2020-12-12 02:20:57', NULL),
(39, 11, 'uploads/multi-img/5fd48001ad04a.png', '2020-12-12 02:32:04', NULL),
(40, 11, 'uploads/multi-img/5fd480043861e.png', '2020-12-12 02:32:05', NULL),
(41, 11, 'uploads/multi-img/5fd48005f1b55.jpg', '2020-12-12 02:32:10', NULL),
(46, 13, 'uploads/multi-img/5fd4817d3064f.jpg', '2020-12-12 02:38:28', NULL),
(47, 13, 'uploads/multi-img/5fd4818508efd.jpg', '2020-12-12 02:38:33', NULL),
(48, 13, 'uploads/multi-img/5fd48189be133.jpg', '2020-12-12 02:38:38', NULL),
(49, 14, 'uploads/multi-img/5fd487193b570.jpg', '2020-12-12 03:02:17', NULL),
(50, 14, 'uploads/multi-img/5fd48719c6ebc.jpg', '2020-12-12 03:02:19', NULL),
(51, 14, 'uploads/multi-img/5fd4871b831e3.jpg', '2020-12-12 03:02:20', NULL),
(52, 14, 'uploads/multi-img/5fd4871c35836.jpg', '2020-12-12 03:02:20', NULL),
(53, 14, 'uploads/multi-img/5fd4871cce6b6.jpg', '2020-12-12 03:02:21', NULL),
(54, 14, 'uploads/multi-img/5fd4871d7d7d0.jpg', '2020-12-12 03:02:22', NULL),
(55, 14, 'uploads/multi-img/5fd4871e243ee.jpg', '2020-12-12 03:02:22', NULL),
(56, 15, 'uploads/multi-img/5fd48a92c159c.jpg', '2020-12-12 03:17:07', NULL),
(57, 15, 'uploads/multi-img/5fd48a93632f3.webp', '2020-12-12 03:17:10', NULL),
(58, 15, 'uploads/multi-img/5fd48a969e53d.jpg', '2020-12-12 03:17:11', NULL),
(59, 16, 'uploads/multi-img/5fd48d25c4dcd.png', '2020-12-12 03:28:06', NULL),
(60, 16, 'uploads/multi-img/5fd48d26bad9c.png', '2020-12-12 03:28:07', NULL),
(61, 16, 'uploads/multi-img/5fd48d276ed3b.png', '2020-12-12 03:28:08', NULL),
(62, 17, 'uploads/multi-img/5fd48e586e4bb.jpg', '2020-12-12 03:33:13', NULL),
(63, 17, 'uploads/multi-img/5fd48e59c50da.jpg', '2020-12-12 03:33:14', NULL),
(64, 18, 'uploads/multi-img/5fd4d4d1bf1b5.jpg', '2020-12-12 08:33:56', NULL),
(65, 18, 'uploads/multi-img/5fd4d4d45c794.jpg', '2020-12-12 08:33:57', NULL),
(66, 18, 'uploads/multi-img/5fd4d4d6445e6.jpg', '2020-12-12 08:33:59', NULL),
(67, 18, 'uploads/multi-img/5fd4d4d727f6b.jpg', '2020-12-12 08:33:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `thana_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `thana_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(36, 21, 10, 1, 1, 'Md.Mazharul Islam', 'user@gmail.com', '01883675858', '14414', 'This is first Order', 'card_1IEzwaLVjUl3jfbmfzwmCMrx', 'Stripe', 'txn_1IEzwcLVjUl3jfbmwamE93wH', 'bdt', 680.00, '60143958f39f6', 'SPM49219774', '29 January 2021', 'January', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Confirm', '2021-01-29 10:35:40', '2021-02-01 12:29:47'),
(37, 21, 10, 1, 5, 'Md.Mazharul Islam', 'user@gmail.com', '01883675858', '1442', 'This is second order', NULL, 'SSL Payment', '60143e637d0db', 'BDT', 1350.00, NULL, 'SPM34239435', '29 January 2021', 'January', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Processing', '2021-01-29 10:57:07', NULL),
(38, 21, 10, 1, 2, 'Md.Mazharul Islam', 'user@gmail.com', '01883675858', '1442', 'this third Order', NULL, 'SSL Payment', '60143f2a6626a', 'BDT', 4420.00, NULL, 'SPM69651652', '29 January 2021', 'January', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Picked', '2021-01-29 11:00:26', '2021-02-01 12:19:21'),
(39, 21, 10, 1, 2, 'Md.Mazharul Islam', 'user@gmail.com', '01883675858', '1442', 'this third Order', NULL, 'SSL Payment', '60143f2b1022a', 'BDT', 4420.00, NULL, 'SPM70056629', '29 January 2021', 'January', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancel', '2021-01-29 11:00:27', NULL),
(40, 21, 10, 1, 2, 'Md.Mazharul Islam', 'user@gmail.com', '01883675858', '1442', 'fsdff', 'card_1IF24ULVjUl3jfbm3PYuBkJH', 'Stripe', 'txn_1IF24WLVjUl3jfbm1aNz1elV', 'bdt', 5200.00, '6014594b23478', 'SPM95885293', '29 January 2021', 'January', '2021', NULL, NULL, NULL, NULL, NULL, NULL, '10 February 2021', 'false Product', 'Delivered', '2021-01-29 12:51:56', '2021-02-10 08:12:36'),
(41, 21, 10, 1, 2, 'Md.Mazharul Islam', 'user@gmail.com', '01883675858', '1442', 'fdsfs', 'card_1IJBv6LVjUl3jfbm4MfknIos', 'Stripe', 'txn_1IJBv8LVjUl3jfbmvIfgIHnr', 'bdt', 750.00, '6023790f29277', 'SPM92139727', '10 February 2021', 'February', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2021-02-10 00:11:30', NULL),
(42, 21, 10, 1, 2, 'Md.Mazharul Islam', 'user@gmail.com', '01883675858', '1442', 'ffd', NULL, 'SSL Payment', '603b7f3a7b13f', 'BDT', 550.00, NULL, 'SPM86961213', '28 February 2021', 'February', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Processing', '2021-02-28 05:32:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 42, 15, 'N/A', NULL, '1', 550.00, '2021-02-28 05:32:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('eng.mazharul2@gmail.com', '$2y$10$3o317c9wZstfpY5D5HgSj.Bt0w7Tj0jUPFrms80sYnn/9LgTLDac.', '2020-11-01 21:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `subsubcategory_id` int(11) DEFAULT NULL,
  `product_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_bn`, `long_descp_en`, `long_descp_bn`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(9, 11, 3, 38, 32, 'Nutural Money', 'প্রাকৃতিক চাকের মধু', 'nutural-money', 'প্রাকৃতিক-চাকের মধু', '101', 'available', 'Nutural Money', 'প্রাকৃতিক চাকের মধু', 'N/A', 'N/A', 'N/A', 'N/A', '900', '800', '<p>Nutural Money<br></p>', '<p>প্রাকৃতিক চাকের মধু<br></p>', '<p>Nutural Money<br></p>', '<p>প্রাকৃতিক চাকের মধু<br></p>', 'uploads/product/thambnail/5fd476c876861.jpg', 1, 1, 1, 1, 1, '2020-12-12 01:52:45', '2020-12-12 02:12:53'),
(10, 13, 5, 15, 10, 'iphone 6', 'আইফোন ৬', 'iphone-6', 'আইফোন ৬', '1012', '100', 'iphone 6', 'আইফোন ৬', '5.5\',6.5,6.6', '৫.৫\',৬.৫,৬.৬\'', 'white,red', 'সাদা,লাল', '32000', '31000', '<p>iphone 6<br></p>', '<p>আইফোন ৬<br></p>', '<p>iphone 6<br></p>', '<p>আইফোন ৬<br></p>', 'uploads/product/thambnail/5fd47d61622fe.jpg', 1, 1, 1, 1, 1, '2020-12-12 02:20:54', NULL),
(11, 15, 5, 48, 33, 'Smart Leather Watch', 'আকৃষনীয় চামড়ার গড়ি', 'smart-leather-watch', 'আকৃষনীয়-চামড়ার গড়ি', 'wt-101', '65', 'Smart Leather Watch', 'আকৃষনীয় চামড়ার গড়ি', 'meddium,large ,small', 'মিডিয়াম,বড়,ছোট', 'black,golden', 'কালো,সোনালী', '1350', NULL, '<p>Smart Leather Watch<br></p>', '<p>আকৃষনীয় চামড়ার গড়ি<br></p>', '<p>Smart Leather Watch<br></p>', '<p>আকৃষনীয় চামড়ার গড়ি<br></p>', 'uploads/product/thambnail/5fd47ffdb67af.png', 1, 1, 1, 1, 1, '2020-12-12 02:32:01', '2020-12-12 04:39:13'),
(13, 15, 5, 48, 34, 'Smart Leather Watch', 'আকৃষনীয় চামড়ার গড়ি', 'smart-leather-watch', 'আকৃষনীয়-চামড়ার গড়ি', 'wwt-101', '100', 'Smart Leather Watch', 'আকৃষনীয় চামড়ার গড়ি', 'meddium,large,small', 'মাঝারী,ছোট,বড়', 'black,golden', 'কালো,সোনালী', '1200', NULL, '<p>Smart Leather Watch<br></p>', '<p>আকৃষনীয় চামড়ার গড়ি<br></p>', '<p>Smart Leather Watch<br></p>', '<p>আকৃষনীয় চামড়ার গড়ি<br></p>', 'uploads/product/thambnail/5fd48178a659d.jpg', 1, 1, 1, 1, 1, '2020-12-12 02:38:21', NULL),
(14, 5, 1, 1, 35, 'Sweets', 'মিষ্টি', 'sweets', 'মিষ্টি', 'sw-101', '100', 'Sweets', 'মিষ্টি', 'N/A', 'N/A', 'N/A', 'N/A', '260', '250', '<p>Sweets<br></p>', '<p>মিষ্টি<br></p>', '<p>Sweets<br></p>', '<p>মিষ্টি<br></p>', 'uploads/product/thambnail/5fd48718956fc.jpg', 1, 1, 1, 1, 1, '2020-12-12 03:02:17', NULL),
(15, 10, 1, 2, NULL, 'olives Oil', 'জলপাইয়ের তেল', 'olives-oil', 'জলপাইয়ের-তেল', 'wt-101', '100', 'olives Oil', 'জলপাইয়ের তেল', NULL, 'N/A', 'N/A', 'N/A', '650', '550', '<p>olives Oil<br></p>', '<p>জলপাইয়ের তেল<br></p>', '<p>olives Oil<br></p>', '<p>জলপাইয়ের তেল<br></p>', 'uploads/product/thambnail/5fd48a90f3578.jpg', 1, 1, 1, 1, 1, '2020-12-12 03:17:06', NULL),
(16, 13, 5, 18, 26, 'HP Laptop', 'এইচ ল্যাপটপ', 'hp-laptop', 'এইচ-ল্যাপটপ', '102', '100', 'HP Laptop', 'এইচ ল্যাপটপ', '15.6\',17\',18\'', '১৫.৬\',১৭\',১৮\'', 'black,white,red', 'কালো,সাদা,লাল', '42000', '39000', '<p>HP Laptop<br></p>', '<p>এইচ ল্যাপটপ<br></p>', '<p>HP Laptop<br></p>', '<p>এইচ ল্যাপটপ<br></p>', 'uploads/product/thambnail/5fd48d24977ef.jpg', 1, 1, 1, 1, 1, '2020-12-12 03:28:05', NULL),
(17, 9, 7, 20, 15, 'T-Shirt', 'টি-শার্ট', 't-shirt', 'টি-শার্ট', '1023', '100', 'T-Shirt', 'টি-শার্ট', 'meddium,large,small', 'মাঝারী,বড়,ছোট', 'available', 'সব কালার', '167', NULL, '<p>T-Shirt<br></p>', '<p>টি-শার্ট<br></p>', '<p>T-Shirt<br></p>', '<p>টি-শার্ট<br></p>', 'uploads/product/thambnail/5fd48e56ddab9.jpg', 1, 1, 1, 1, 0, '2020-12-12 03:33:12', '2021-01-07 05:22:16'),
(18, 13, 8, NULL, NULL, 'Hijab', 'হিজাব', 'hijab', 'Hijab', '1012', '0', 'Hijab', 'হিজাব', NULL, 'N/A', 'N/A', 'N/A', '1100', NULL, '<p>American retailer, Banana Republic unveiled their first hijab \r\ncollection, which included four headscarves. It is a great step towards \r\ninclusivity and making hijab mainstream and many applauded the brand for\r\n this step. However, not all reactions were positive and several modest \r\ninfluencers even called the label out.<br></p>', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"0\"><span>আমেরিকান খুচরা বিক্রেতা, কলা প্রজাতন্ত্র তাদের প্রথম হিজাব সংগ্রহ উন্মোচন করেছে, যার মধ্যে চারটি হেড স্কার্ভ অন্তর্ভুক্ত ছিল।</span></span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"1\"><span>এটি অন্তর্ভুক্তি এবং হিজাব মূলধারাকে তৈরির দিকে এক দুর্দান্ত পদক্ষেপ এবং অনেকে এই পদক্ষেপের জন্য ব্র্যান্ডকে প্রশংসা করেছেন।</span></span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\"><span>তবে, সমস্ত প্রতিক্রিয়া ইতিবাচক ছিল না এবং বেশ কয়েকটি বিনয়ী প্রভাবক এমনকি এমনকি লেবেলটিকে আউট বলে আখ্যায়িত করেছিলেন।</span></span></span><br></p>', '<p style=\"\">Wondering why not everyone were welcoming of this release? \r\nIt is because of the campaign’s promotional pictures. Two of the hight \r\nprofile influencers who spoke out were&nbsp;British-Moroccan model and \r\ninfluencer Mariah Idrissi and Haute Hijab founder Melanie Elturk. They \r\nboth took to Instagram on Tuesday to voice their concerns regarding \r\nthe&nbsp;misrepresentation of Muslim women in the fashion industry.</p><p><br></p><p>Melanie,\r\n who is the American-Muslim CEO of&nbsp;accessories e-tailer Haute Hijab was \r\nthe first to speak out. She shared&nbsp;promotional images from Banana \r\nRepublic’s website on her Instagram, writing:&nbsp;“While I LOVE that hijab \r\nis becoming more mainstream and applaud @bananarepublic for their \r\nefforts in inclusivity… I have to pause at the way it’s portrayed.”&nbsp;The \r\nimage she shared showed a woman in a hijab wearing a short-sleeved \r\nt-shirt.</p><p><br></p>', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"0\"><span>ভাবছেন কেন সবাই এই প্রকাশকে স্বাগত জানায় না?</span></span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"1\"><span>এটি প্রচারের প্রচারমূলক ছবিগুলির কারণে।</span></span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\"><span>হাইট প্রোফাইল প্রভাবশালীদের মধ্যে যারা বক্তব্য রেখেছিলেন তাদের মধ্যে ছিলেন হলেন ব্রিটিশ-মরোক্কোর মডেল এবং প্রভাবক মারিয়াহা ইদ্রিসি এবং হাউতে হিজাবের প্রতিষ্ঠাতা মেলানিয়া এল্টুর্ক।</span></span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\"><span>ফ্যাশন ইন্ডাস্ট্রিতে মুসলিম মহিলাদের ভুল উপস্থাপনা সম্পর্কিত তাদের উদ্বেগ প্রকাশের জন্য তারা দু\'জন মঙ্গলবার ইনস্টাগ্রামে গিয়েছিলেন।</span></span><span class=\"JLqJ4b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\"><span>\r\n\r\n</span></span><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\"><span>মেলানিয়া, যিনি আনুষাঙ্গিক ই-টেলর হাউতে হিজাবের আমেরিকান-মুসলিম প্রধান নির্বাহী ছিলেন তিনি প্রথম বক্তব্য রেখেছিলেন।</span></span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\"><span>তিনি নিজের ইনস্টাগ্রামে কলা রিপাবলিকের ওয়েবসাইট থেকে প্রচারমূলক চিত্রগুলি ভাগ করে লিখেছেন: \"যদিও আমি ভালবাসি যে হিজাব আরও মূলধারায় পরিণত হচ্ছে এবং অন্তর্ভুক্তিতে তাদের প্রচেষ্টার জন্য @ বানানরেপাবলিককে প্রশংসা করছে ... এটি যেভাবে চিত্রিত হয়েছে তাতে আমাকে বিরতি দিতে হবে।\"</span></span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\"><span>তিনি যে চিত্রটি ভাগ করেছেন তাতে হিজাবের কোনও মহিলাকে স্বল্প-কাটা টি-শার্ট পরা দেখানো হয়েছিল।</span></span></span><br></p>', 'uploads/product/thambnail/5fd4d4cf4f035.jpg', 1, 1, 1, 1, 1, '2020-12-12 08:33:53', '2021-02-16 00:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 10, 'narayangonj', '2020-12-29 12:56:14', NULL),
(2, 10, 'monshigonj', '2020-12-30 04:04:53', '2020-12-30 04:04:53'),
(4, 10, 'norsingdi', '2020-12-30 04:16:02', '2020-12-30 04:16:02'),
(5, 4, 'gaibanda', '2020-12-30 05:28:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE `ship_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(3, 'Rangpur', '2020-12-29 12:00:56', '2020-12-29 12:00:56'),
(4, 'Rajshahi', '2020-12-29 11:35:18', NULL),
(5, 'Khulna', '2020-12-29 11:35:40', NULL),
(6, 'Barishal', '2020-12-29 11:35:51', NULL),
(8, 'mymansingh', '2020-12-29 12:06:01', '2020-12-29 12:06:01'),
(10, 'Dhaka', '2020-12-29 12:55:50', NULL),
(11, 'sylet', '2021-01-16 10:10:42', NULL),
(12, 'Mymonsingh', '2021-01-16 10:11:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_thanas`
--

CREATE TABLE `ship_thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `thana_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_thanas`
--

INSERT INTO `ship_thanas` (`id`, `division_id`, `district_id`, `thana_name`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'Sonargoan', '2020-12-30 06:37:50', NULL),
(2, 10, 1, 'Araihazar', '2020-12-30 06:42:52', '2020-12-30 07:25:08'),
(4, 10, 1, 'Rupgonj', '2020-12-30 06:50:23', NULL),
(5, 10, 1, 'Bondor', '2020-12-30 07:27:09', NULL),
(6, 10, 1, 'siddirgonj', '2020-12-30 07:27:41', NULL),
(7, 10, 1, 'Futtollah', '2020-12-30 07:28:57', '2021-01-06 08:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title_en`, `title_bn`, `description_en`, `description_bn`, `status`, `created_at`, `updated_at`) VALUES
(4, 'uploads/slider/5fc499d44e23c.jpg', 'Bagra Dai', 'বগুনা দই', 'Get 25% discount', '২৫% ছাড় !', 1, '2020-11-30 01:08:50', '2020-12-12 04:40:36'),
(5, 'uploads/slider/5fc49ac67222c.jpg', 'New Offer', 'নতুুন অফার', 'Get 25% discount', '২৫% ছাড় !', 1, '2020-11-30 01:09:58', NULL),
(6, 'uploads/slider/5fc49be953b9f.jpg', 'Olive oil', 'জলপাইয়ের তেল', 'Get 25% discount', '২৫% ছাড় !', 1, '2021-02-15 14:29:16', '2021-02-15 14:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `subsub_categories`
--

CREATE TABLE `subsub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsub_categories`
--

INSERT INTO `subsub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_bn`, `subsubcategory_slug_en`, `subsubcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(8, 5, 15, 'Oppo', 'অপ্পো', 'Oppo', 'অপ্পো', '2020-11-29 02:28:26', NULL),
(9, 5, 15, 'sumsang', 'স্যামসাং', 'sumsang', 'স্যামসাং', '2020-11-29 02:29:05', NULL),
(10, 5, 15, 'iPhone', 'আইফোন', 'iPhone', 'আইফোন', '2020-11-29 02:29:46', NULL),
(11, 5, 15, 'Nokia', 'নকিয়া', 'Nokia', 'নকিয়া', '2020-11-29 02:30:40', NULL),
(12, 5, 15, 'Symphony', 'সিম্ফনি', 'Symphony', 'সিম্ফনি', '2020-11-29 02:32:44', NULL),
(13, 7, 21, 'Wool', 'সিল্ক', 'Wool', 'সিল্ক', '2020-11-29 02:37:03', NULL),
(14, 7, 21, 'Cotton', 'কটন', 'Cotton', 'কটন', '2020-11-29 02:38:05', NULL),
(15, 7, 20, 'Half T-Shirt', 'হাফ টি-শার্ট', 'Half T-Shirt', 'হাফ টি-শার্ট', '2020-11-29 02:41:36', NULL),
(16, 7, 20, 'full T-Shirt', 'ফুল টি-শার্ট', 'full T-Shirt', 'ফুল টি-শার্ট', '2020-11-29 02:42:28', NULL),
(17, 8, 28, 'Tangail Sharee', 'টাংগাইল শাড়ী', 'Tangail Sharee', 'টাংগাইল শাড়ী', '2020-11-29 02:43:31', NULL),
(19, 8, 28, 'Weavers Sharee', 'তাঁতের শাড়ী', 'Weavers Sharee', 'তাঁতের শাড়ী', '2020-11-29 02:46:29', NULL),
(20, 8, 28, 'Benarshi Sharee', 'বেনারশী শাড়ী', 'Benarshi Sharee', 'বেনারশী শাড়ী', '2020-11-29 02:47:33', NULL),
(21, 1, 12, 'Padma hilsa', 'পদ্মার ইলিশ', 'Padma hilsa', 'পদ্মার ইলিশ', '2020-11-29 02:49:11', NULL),
(22, 1, 12, 'Hilsa of Meghna', 'মেঘনার ইলিশ', 'Hilsa of Meghna', 'মেঘনার ইলিশ', '2020-11-29 02:50:14', NULL),
(23, 4, 7, 'Chicken', 'চিকেন', 'Chicken', 'চিকেন', '2020-11-29 09:32:47', NULL),
(24, 4, 7, 'beef', 'গরু', 'beef', 'গরু', '2020-11-29 09:34:12', NULL),
(25, 4, 7, 'vegetable Burger', 'সবজি বার্গার', 'vegetable Burger', 'সবজি বার্গার', '2020-11-29 09:37:48', NULL),
(26, 5, 18, 'HP Laptop', 'এইচ পি ল্যাপটপ', 'HP Laptop', 'এইচ পি ল্যাপটপ', '2020-11-29 09:39:35', '2020-11-29 09:48:49'),
(27, 5, 18, 'LG Labtop', 'এল জি ল্যাপটপ', 'LG Labtop', 'এল জি ল্যাপটপ', '2020-11-29 09:40:09', '2020-11-29 09:48:29'),
(28, 5, 18, 'sumsang Laptop', 'স্যামসাং ল্যাপটপ', 'sumsang Laptop', 'স্যামসাং ল্যাপটপ', '2020-11-29 09:40:45', '2020-11-29 09:48:12'),
(29, 5, 18, 'Walton Laptop', 'ওয়াটন ল্যাপটপ', 'Walton Laptop', 'ওয়াটন ল্যাপটপ', '2020-11-29 09:41:28', '2020-11-29 09:47:42'),
(30, 5, 18, 'Dell Laptop', 'ডেল ল্যাপটপ', 'Dell Laptop', 'ডেল ল্যাপটপ', '2020-11-29 09:43:53', '2020-11-29 09:47:06'),
(31, 5, 18, 'Asus Laptop.', 'আসুস ল্যাপটপ', 'Asus Laptop.', 'আসুস ল্যাপটপ', '2020-11-29 09:45:46', NULL),
(32, 3, 38, 'Shondhar Boner Money', 'সুন্দরবনের মধু', 'Shondhar Boner Money', 'সুন্দরবনের মধু', '2020-12-12 01:47:13', NULL),
(33, 5, 48, 'Men\'s Watch', 'পুরুষদের গড়ি', 'Men\'s Watch', 'পুরুষদের গড়ি', '2020-12-12 02:25:42', NULL),
(34, 5, 48, 'women\'s Watch', 'মহিলাদের গড়ি', 'women\'s Watch', 'মহিলাদের গড়ি', '2020-12-12 02:26:46', NULL),
(35, 1, 1, 'Tangail Sweets', 'টাংগাইল মিষ্টি', 'Tangail Sweets', 'টাংগাইল মিষ্টি', '2020-12-12 02:58:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_bn`, `subcategory_slug_en`, `subcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(1, 1, 'sweets', 'মিষ্টি', 'sweets', 'মিষ্টি', '2020-11-12 04:35:23', '2020-11-29 00:56:49'),
(2, 1, 'Blackberry oil', 'কালোজিরা তেল', 'Blackberry oil', 'কালোজিরা তেল', '2020-11-12 04:38:14', '2020-11-29 00:54:34'),
(3, 1, 'Natural Money', 'প্রাকৃতিক মধু', 'Natural Money', 'প্রাকৃতিক মধু', '2020-11-12 05:10:46', '2020-11-29 04:13:25'),
(5, 4, 'chicken', 'চিকেন', 'chicken', 'চিকেন', '2020-11-12 10:04:33', '2020-11-29 00:44:59'),
(6, 4, 'pizza', 'পিজা', 'pizza', 'পিজা', '2020-11-12 10:05:08', '2020-11-29 00:44:00'),
(7, 4, 'Burger', 'বার্গার', 'Burger', 'বার্গার', '2020-11-12 10:06:02', '2020-11-29 00:45:31'),
(9, 1, 'grinder Broken Oil', 'ঘানি ভাঙ্গা তেল', 'grinder Broken Oil', 'ঘানি ভাঙ্গা তেল', '2020-11-12 12:51:57', '2020-11-29 00:52:07'),
(10, 4, 'junk food', 'জাঙ্ক ফুড', 'junk food', 'জাঙ্ক ফুড', '2020-11-12 13:49:18', '2020-11-29 00:49:22'),
(11, 4, 'Obesity', 'ওবেসিটি', 'Obesity', 'ওবেসিটি', '2020-11-12 15:14:45', '2020-11-29 00:47:11'),
(12, 1, 'Fresh Fish', 'তাজা মাছ', 'Fresh Fish', 'তাজা মাছ', '2020-11-29 00:58:40', NULL),
(15, 5, 'Mobile', 'ফোন', 'Mobile', 'ফোন', '2020-11-29 01:01:41', NULL),
(17, 5, 'computer', 'কম্পিউটার', 'computer', 'কম্পিউটার', '2020-11-29 01:04:04', NULL),
(18, 5, 'Labtop', 'ল্যাবটপ', 'Labtop', 'ল্যাবটপ', '2020-11-29 01:04:24', NULL),
(19, 5, 'HeadPhone', 'হেডফোন', '', 'হেডফোন', '2020-11-29 01:05:40', NULL),
(20, 7, 'T-shirt', 'টি-র্শাট', 'T-shirt', 'টি-র্শাট', '2020-11-29 01:09:22', NULL),
(21, 7, 'Sweater', 'সুয়েটার', 'Sweater', 'সুয়েটার', '2020-11-29 01:10:14', NULL),
(22, 8, 'Cap', 'ক্যাপ', 'Cap', 'ক্যাপ', '2020-11-29 01:12:52', NULL),
(23, 7, 'Pant', 'প্যান্ট', 'Pant', 'প্যান্ট', '2020-11-29 01:17:10', NULL),
(24, 7, 'Shirt', 'র্শাট', 'Shirt', 'র্শাট', '2020-11-29 01:17:48', NULL),
(25, 8, 'Hijab', 'হিজাব', 'Hijab', 'হিজাব', '2020-11-29 01:18:30', NULL),
(27, 8, 'Burqa', 'বোরকা', 'Burqa', 'বোরকা', '2020-11-29 01:21:20', NULL),
(28, 8, 'Sharee', 'শাড়ী', 'Sharee', 'শাড়ী', '2020-11-29 01:23:04', NULL),
(30, 9, 'T-shirt', 'টি-র্শাট', 'T-shirt', 'টি-র্শাট', '2020-11-29 01:27:00', NULL),
(31, 9, 'shoes', 'সুজ', 'shoes', 'সুজ', '2020-11-29 01:27:47', NULL),
(32, 9, 'Sweater', 'সুয়েটার', 'Sweater', 'Sweater', '2020-11-29 01:28:15', NULL),
(33, 10, 'Apex', 'এপেক্স', 'Apex', 'এপেক্স', '2020-11-29 01:29:37', NULL),
(34, 10, 'Bata', 'বাটা', 'Bata', 'বাটা', '2020-11-29 01:30:00', NULL),
(35, 10, 'Referary', 'রেফেরারী', 'Referary', 'রেফেরারী', '2020-11-29 01:30:50', NULL),
(36, 10, 'Loto', 'লটো', 'Loto', 'লটো', '2020-11-29 01:31:39', NULL),
(37, 3, 'Mustard honey', 'সরিষার মধু', 'Mustard honey', 'সরিষার মধু', '2020-11-29 01:33:27', NULL),
(38, 3, 'Natural Money', 'প্রাকৃতিক মধু', 'Natural Money', 'প্রাকৃতিক মধু', '2020-11-29 01:34:06', '2020-11-29 05:06:45'),
(39, 3, 'Cultivated honey', 'চাষের মধু', 'Cultivated honey', 'চাষের মধু', '2020-11-29 01:35:09', NULL),
(40, 3, 'Honey of the Sundarbans', 'সুন্দরবনের মধু', 'Honey of the Sundarbans', 'সুন্দরবনের মধু', '2020-11-29 01:37:27', NULL),
(41, 4, 'Day Food', 'ডাই ফুড', 'Day Food', 'ডাই ফুড', '2020-11-29 01:38:17', NULL),
(42, 6, 'Chal', 'চাল', 'Chal', 'চাল', '2020-11-29 09:52:40', NULL),
(43, 6, 'Oil', 'তেল', 'Oil', 'তেল', '2020-11-29 09:53:09', NULL),
(46, 3, 'Natural Money', 'প্রাকৃতিক মধু', 'Natural Money', 'প্রাকৃতিক মধু', '2020-12-12 01:44:49', NULL),
(47, 3, 'Cultivated honey', 'চাষের মধু', 'Cultivated honey', 'চাষের মধু', '2020-12-12 01:45:44', NULL),
(48, 5, 'Watch', 'গড়ি', 'Watch', 'গড়ি', '2020-12-12 02:24:12', NULL),
(49, 5, 'printer', 'প্রিন্টার', 'printer', 'প্রিন্টার', '2020-12-14 23:23:52', NULL),
(50, 5, 'sfsfs', 'fsfsf', 'sfsfs', 'fsfsf', '2021-02-15 14:19:34', NULL),
(51, 5, 'Somethings else', 'Somethins else', 'somethings-else', 'Somethins-else', '2021-02-15 16:09:40', '2021-02-16 05:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `isban` tinyint(4) NOT NULL DEFAULT 0,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `isban`, `last_seen`, `email`, `phone`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Md Mazharul Islam', 1, 0, NULL, 'eng.mazharul2@gmail.com', '01716448668', 'frontend/img/5fec8128a11a8.jpg', NULL, '$2y$10$3UttE.E/uWFDT0KChQBpwOrCzbB84z42hCdL7ezI3GQIilOeVq3i.', NULL, '2020-11-01 21:25:15', '2020-12-30 07:31:25'),
(20, 'jaman', 2, 0, '2021-02-28 14:23:13', 'emon@gmail.com', '01716448668', 'frontend/img/603ba30fed02b.png', NULL, '$2y$10$btmPcDie6eVpsoSrk3quPevqzZxWMm4PaZPQniK2cgLGYRjhzy1nW', NULL, '2020-11-06 22:25:04', '2021-02-28 08:23:13'),
(21, 'Md.Mazharul Islam', 2, 0, '2021-02-28 14:03:16', 'user@gmail.com', '01883675858', 'frontend/img/60030e2a1bf61.jpg', NULL, '$2y$10$P65o.jI0ftznikFFT3bZ4uzMDW44kwYwO9nAFFIwwg6eywA0T57Oa', 'TpGqD6DSeSKsHwr90yeXSw9LFJ8ZckSwhKj5tqQqeiaSWvkBiIKXOGUTmJfx', '2020-12-27 04:35:02', '2021-02-28 08:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 21, 17, '2020-12-27 07:49:46', NULL),
(15, 21, 15, '2020-12-27 11:55:15', NULL),
(17, 21, 16, '2021-01-10 00:05:29', NULL),
(18, 21, 14, '2021-01-10 00:09:39', NULL),
(19, 21, 9, '2021-01-10 00:11:16', NULL),
(20, 21, 10, '2021-01-10 00:11:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_thanas`
--
ALTER TABLE `ship_thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsub_categories`
--
ALTER TABLE `subsub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ship_thanas`
--
ALTER TABLE `ship_thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subsub_categories`
--
ALTER TABLE `subsub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
