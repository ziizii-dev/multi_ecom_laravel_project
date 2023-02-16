-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 07:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_url`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Camere update', 'https://www.youtube.com', 'upload/banner/1757873752793749.jpg', 1, NULL, '2023-02-15 13:30:50'),
(2, 'Foscam', 'https://www.foscam.com', 'upload/banner/1757873810964660.jpg', 1, NULL, '2023-02-15 13:31:45'),
(3, 'Fujifilm', 'Fujifilm', 'upload/banner/1757873957365567.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(255) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TESTING', '', 'upload/brand/1757292274526288.jpg', 0, NULL, '2023-02-09 06:25:18'),
(2, 'Canon one', 'canon-one', 'upload/brand/1757300067318703.jpg', 1, NULL, '2023-02-09 05:32:20'),
(3, 'Canon', 'canon', 'upload/brand/1757310001679570.jpg', 1, NULL, '2023-02-09 08:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Camera', 'camera', 'upload/category/1757307232176934.jpg', 1, NULL, NULL),
(2, 'Fashion', 'fashion', 'upload/category/1757309925066616.jpg', 1, NULL, '2023-02-09 08:09:01'),
(3, 'Movie', 'movie', 'upload/category/1757309957062963.jpg', 1, NULL, '2023-02-09 08:09:32'),
(4, 'Electronic', 'electronic', 'upload/category/1757317485234875.jpg', 1, NULL, NULL),
(5, 'Canon', 'canon', 'upload/category/1757849332499192.png', 1, NULL, NULL),
(6, 'Beauty Sloon', 'beauty-sloon', 'upload/category/1757854158863673.webp', 1, NULL, NULL),
(7, 'Cosmetics', 'cosmetics', 'upload/category/1757854373422708.jpg', 1, NULL, NULL),
(8, 'Shampoo', 'shampoo', 'upload/category/1757854506208553.jpg', 1, NULL, NULL),
(9, 'Gernier', 'gernier', 'upload/category/1757854636867205.jpeg', 1, NULL, NULL);

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_02_08_060350_create_brands_table', 2),
(18, '2023_02_08_224422_create_categories_table', 3),
(19, '2023_02_09_002259_create_sub_categories_table', 4),
(20, '2023_02_10_010236_create_products_table', 5),
(21, '2023_02_10_012621_create_multi_imgs_table', 5),
(22, '2023_02_14_183644_create_sliders_table', 6),
(23, '2023_02_14_213222_create_banners_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(255) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `delete_status`, `created_at`, `updated_at`) VALUES
(2, 9, 'upload/products/multi-image/1757936516744181.jpg', 1, '2023-02-16 06:08:26', '2023-02-16 06:08:26'),
(3, 10, 'upload/products/multi-image/1757747655562650.jpg', 1, '2023-02-14 04:06:34', '2023-02-14 08:02:08'),
(4, 10, 'upload/products/multi-image/1757747671829897.png', 1, '2023-02-14 04:06:49', '2023-02-14 08:02:08'),
(5, 10, 'upload/products/multi-image/1757747692759662.jpg', 1, '2023-02-14 04:07:09', '2023-02-14 08:02:08'),
(6, 10, 'upload/products/multi-image/1757747716472629.jpg', 1, '2023-02-14 04:07:32', '2023-02-14 08:02:08'),
(12, 12, 'upload/products/multi-image/1757765077402003.jpg', 1, '2023-02-14 08:43:29', '2023-02-14 08:47:12'),
(13, 12, 'upload/products/multi-image/1757764850232809.jpg', 1, '2023-02-14 08:39:52', '2023-02-14 08:47:12'),
(14, 12, 'upload/products/multi-image/1757764851216537.jpg', 1, '2023-02-14 08:39:53', '2023-02-14 08:47:12'),
(15, 12, 'upload/products/multi-image/1757764851840146.jpg', 1, '2023-02-14 08:39:53', '2023-02-14 08:47:12'),
(16, 13, 'upload/products/multi-image/1757829321201896.jpg', 1, '2023-02-15 01:44:37', '2023-02-15 02:15:13'),
(17, 13, 'upload/products/multi-image/1757787085508309.jpg', 1, '2023-02-14 14:33:17', '2023-02-15 02:15:13'),
(18, 13, 'upload/products/multi-image/1757787085696079.jpg', 1, '2023-02-14 14:33:17', '2023-02-15 02:15:13'),
(19, 8, 'upload/products/multi-image/1757937723086499.jpg', 1, '2023-02-16 06:27:36', '2023-02-16 06:27:36'),
(21, 8, 'upload/products/multi-image/1757937742923397.jpg', 1, '2023-02-16 06:27:55', '2023-02-16 06:27:55'),
(22, 8, 'upload/products/multi-image/1757937765633667.jpg', 1, '2023-02-16 06:28:17', '2023-02-16 06:28:17'),
(23, 9, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(24, 9, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(25, 9, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(26, 9, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(27, 6, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(28, 6, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(29, 6, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(30, 6, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(31, 7, 'upload/products/multi-image/1757747716472629.jpg\r\n', 1, NULL, '2023-02-16 09:39:03'),
(32, 7, 'upload/products/multi-image/1757747716472629.jpg', 1, NULL, '2023-02-16 09:39:03'),
(33, 7, 'upload/products/multi-image/1757747716472629.jpg', 0, NULL, '2023-02-16 09:39:03');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `delete_status` int(255) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tags`, `product_size`, `product_color`, `selling_price`, `discount_price`, `short_descp`, `long_descp`, `product_thambnail`, `vendor_id`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 2, 'Miyazaki three', 'miyazaki-three', '346666', '1000', 'top product', 'Small,Medium,Large', 'Red,Green,Blue,Black', '500', NULL, 'Kyanon kabushiki gaisha) is a Japanese multinational corporation headquartered in Ōta, Tokyo, Japan, specializing in optical, imaging, and industrial products, such as lenses, cameras, medical equipment, scanners, printers, and semiconductor manufacturing equipment. Canon has a', 'Kyanon kabushiki gaisha) is a Japanese multinational corporation headquartered in Ōta, Tokyo, Japan, specializing in optical, imaging, and industrial products, such as lenses, cameras, medical equipment, scanners, printers, and semiconductor manufacturing equipment. Canon has a', 'upload/products/thambnail/1757679809129919.jpg', '2', 1, 1, 1, 1, 1, 1, '2023-02-14 04:16:40', '2023-02-14 07:55:12'),
(7, 1, 1, 4, 'Miyazaki', 'miyazaki', '346666', '1000', 'new>                                      </div>                  <div class=>                                      </div>                  <div class=', 'Small,Medium,Large', 'Red,Green,Blue,Black', '500', '360', 'Hayao Miyazaki is a Japanese animator, director, producer, screenwriter, author, and manga artist. A co-founder of Studio Ghibli, he has attained international acclaim as a masterful storyteller', 'Hayao Miyazaki is a Japanese animator, director, producer, screenwriter, author, and manga artist. A co-founder of Studio Ghibli, he has attained international acclaim as a masterful storytellerHayao Miyazaki is a Japanese animator, director, producer, screenwriter, author, and manga artist. A co-founder of Studio Ghibli, he has attained international acclaim as a masterful storyteller', 'upload/products/thambnail/1757687023569545.jpg', NULL, 1, 1, 1, 1, 1, 1, '2023-02-16 10:31:02', '2023-02-16 10:31:02'),
(8, 1, 1, 3, 'UPDATE TESTING', 'update-testing', '3466669', '888', 'test', 'Small,Medium,Large', 'Red,Green,Blue,Black', '400', '390', 'This is testing', 'this is update testing', 'upload/products/thambnail/1757688603145390.jpg', '1', 1, 1, 1, 1, 1, 1, '2023-02-14 04:14:07', '2023-02-14 04:14:07'),
(9, 1, 1, 6, 'FujiFlin', 'fujiflin', '000000123', '1000', NULL, NULL, NULL, '500', '390', 'FUJIFILM Holdings Corporation, trading as Fujifilm, or simply Fuji, is a Japanese multinational conglomerate headquartered in Tokyo, Japan, operating in the realms of photography, optics, office and medical electronics, biotechnology, and chemicals.', 'FUJIFILM Holdings Corporation, trading as Fujifilm, or simply Fuji, is a Japanese multinational conglomerate headquartered in Tokyo, Japan, operating in the realms of photography, optics, office and medical electronics, biotechnology, and chemicals.\r\nFUJIFILM Holdings Corporation, trading as Fujifilm, or simply Fuji, is a Japanese multinational conglomerate headquartered in Tokyo, Japan, operating in the realms of photography, optics, office and medical electronics, biotechnology, and chemicals.', 'upload/products/thambnail/1757885528635643.jpg', '2', 1, 1, 1, 1, 1, 1, '2023-02-16 04:33:52', '2023-02-16 04:33:52'),
(10, 1, 1, 4, 'Testin', 'testin', '346111', '999', 'sony', 'Small,Medium,Large', 'Red,Green,Blue,Black', '500', '450', 'testing', 'testing', 'upload/products/thambnail/1757747580475541.jpg', '15', 1, 1, 1, 1, 1, 1, '2023-02-14 04:13:41', '2023-02-14 08:01:05'),
(12, 1, 2, 15, 'Miyazaki one', 'miyazaki-one', '346666', '1000', 'test', 'Small,Medium,Large', 'Red,Green,Blue,Black', '300', '250', 'this is testing', 'testing', 'upload/products/thambnail/1757765109654757.jpg', '15', 1, NULL, 1, NULL, 1, 1, '2023-02-14 08:39:51', '2023-02-14 08:47:12'),
(13, 1, 4, 16, 'Panasonic Online Store', 'panasonic-online-store', '0000123', '1000', 'new porduct', 'Small,Medium,Large', 'Red,Green,Blue', '700', '650', 'Panasonic Holdings Corporation, formerly Matsushita Electric Industrial Co., Ltd. between 1935 and 2008 and the first incarnation of Panasonic Corporation between 2008 and 2022, is a major Japanese mu…', 'Panasonic Holdings Corporation, formerly Matsushita Electric Industrial Co., Ltd. between 1935 and 2008 and the first incarnation of Panasonic Corporation between 2008 and 2022, is a major Japanese mu…Panasonic Holdings Corporation, formerly Matsushita Electric Industrial Co., Ltd. between 1935 and 2008 and the first incarnation of Panasonic Corporation between 2008 and 2022, is a major Japanese mu…', 'upload/products/thambnail/1757829044012914.jpg', '15', 1, 1, 1, 1, 1, 0, '2023-02-14 15:13:55', '2023-02-15 02:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(255) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `short_title`, `slider_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Canon 5D Mark', 'Canon  Update', 'upload/slider/1757858312373373.jpg', 1, NULL, '2023-02-15 09:25:24'),
(2, 'Canon 7D Mark', 'Action cameras, 360-degree cameras', 'upload/slider/1757858368503722.jpg', 1, NULL, '2023-02-15 09:26:18'),
(3, 'Camera', 'THSI IS AWESOME', 'upload/slider/1757857902700874.jpg', 1, NULL, NULL),
(4, 'HERVARD UNIVERSITY', 'FOR YOUR EDUCATION FIST', 'upload/slider/1757858255222491.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Action movie', 'action-movie', 0, NULL, '2023-02-10 01:33:53'),
(2, 1, 'Nikon', 'nikon', 1, NULL, NULL),
(3, 4, 'Phone', 'phone', 1, NULL, NULL),
(4, 1, 'Sony', 'sony', 1, NULL, NULL),
(5, 1, 'Samsung', 'samsung', 1, NULL, NULL),
(6, 1, 'BenQ', 'benq', 1, NULL, NULL),
(7, 3, 'The Shawshank Redemption', 'the-shawshank-redemption', 1, NULL, NULL),
(8, 3, 'Schindler\'s List', 'schindler\'s-list', 1, NULL, NULL),
(9, 3, 'Casablanca', 'casablanca', 1, NULL, '2023-02-11 06:14:45'),
(10, 2, 'Fashions Fashion', 'fashions-fashion', 1, NULL, NULL),
(11, 2, 'Dressing Down', 'dressing-down', 1, NULL, NULL),
(12, 2, 'Well Worn', 'well-worn', 1, NULL, NULL),
(13, 2, 'Ideologica', 'ideologica', 1, NULL, NULL),
(14, 2, 'Civilian Costume', 'civilian-costume', 1, NULL, NULL),
(15, 2, 'Cultural Slue Trading', 'cultural-slue-trading', 1, NULL, NULL),
(16, 4, 'hard disk drive', 'hard-disk-drive', 1, NULL, NULL),
(17, 4, 'video cassette recorder', 'video-cassette-recorder', 1, NULL, NULL),
(18, 4, 'printer', 'printer', 1, NULL, NULL),
(19, 6, 'Beauty sloon one', 'beauty-sloon-one', 1, NULL, NULL),
(20, 6, 'A Touch of Class', 'a-touch-of-class', 1, NULL, NULL),
(21, 6, 'Mia Bella', 'mia-bella', 1, NULL, NULL),
(22, 6, 'Pretty Parlor', 'pretty-parlor', 1, NULL, NULL),
(23, 6, 'Serenity Salon', 'serenity-salon', 1, NULL, NULL),
(24, 6, 'Tres Beaux', 'tres-beaux', 1, NULL, NULL),
(25, 7, 'Estee Lauder', 'estee-lauder', 1, NULL, NULL),
(26, 7, 'L’Oreal', 'l’oreal', 1, NULL, NULL),
(27, 7, 'L’Oreal', 'l’oreal', 1, NULL, NULL),
(28, 7, 'Maybelline New York', 'maybelline-new-york', 1, NULL, NULL),
(29, 7, 'Guerlain', 'guerlain', 1, NULL, NULL),
(30, 7, 'Chanel', 'chanel', 1, NULL, NULL),
(31, 5, 'A Canon F1 A Canon F1', 'a-canon-f1-a-canon-f1', 1, NULL, NULL),
(32, 5, 'A Canon AE-1 A Canon AE-1', 'a-canon-ae-1-a-canon-ae-1', 1, NULL, NULL),
(33, 5, 'A Canon AV-1 A Canon AV-1', 'a-canon-av-1-a-canon-av-1', 1, NULL, NULL),
(34, 5, 'A Canon EOS 650', 'a-canon-eos-650', 1, NULL, NULL),
(35, 5, 'An original Canon Digital IXUS', 'an-original-canon-digital-ixus', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_join` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_short_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','vendor','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `vendor_join`, `vendor_short_info`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin update', 'admin', 'admin@gmail.com', NULL, '$2y$10$02Hwc2uoUqMxjmIafTPZm.mUdcLZR901i.g4x04E5s/6c.bbPGGhq', '63dd8ce55115e1600w-EW4cggXkgbc.jpg', '0998745612', 'mandalay', NULL, 'surprise', 'admin', 'active', NULL, NULL, '2023-02-08 13:52:56'),
(2, 'canon.,Ltd', 'vendor', 'vendor@gmail.com', NULL, '$2y$10$K9NAWAgVjLyS1PpSr6/.aOOIiSGJYganawfbrNaZkRAnWjBIqijK6', '63e17211dc72454c5f2a0-58c2-11ea-9ded-62bd24758be4.jpg', '0978456123', 'bago', '2023', 'this is testing', 'vendor', 'active', NULL, NULL, '2023-02-07 09:31:20'),
(3, 'User', 'user', 'user1@gmail.com', NULL, '$2y$10$1JRtPUW.gQ6DbS5PQwbDKuQQGaQw6ovRubF2LD8p4roICnU4DW.ta', '63e17211dc72454c5f2a0-58c2-11ea-9ded-62bd24758be4.jpg', '098745231', 'yangon', NULL, 'amazing', 'user', 'active', NULL, NULL, NULL),
(12, 'user one', 'userone  update', 'user@gmail.com', NULL, '$2y$10$N7sVOFCkzsQ5FxvZ81/dheOaHbJNofkXpfqgV8juVKzBR9M4pKvfu', '63e2e5082daecR (6).jpg', '0987456123', 'yangon', NULL, 'awesome', 'user', 'active', NULL, '2023-02-08 05:06:35', '2023-02-08 09:59:22'),
(13, 'usertwo', 'usetwo', 'usertwo@gmail.com', NULL, '$2y$10$utLPbvf.nd/La6VqBvnYtuE0UBZGMpDe28wXxXRzkdx9DyK4NnbaO', NULL, '09874566', 'mandalay', NULL, 'heool', 'user', 'active', NULL, '2023-02-08 05:09:53', '2023-02-08 05:09:53'),
(14, 'Nikon', 'nikon', 'nikon@gmail.com', NULL, '$2y$10$g.HEXkhMhizorI628/KBHeXPuhj.VLt6LuTBXNdpvgwRJ9AJDACgK', '63e54f28a2facnikon-logo.jpg', '09874562123', 'Japan', '2022', 'Nikon\'s products include cameras, camera lenses, binoculars, microscopes, ophthalmic lenses, measurement instruments, rifle scopes, spotting scopes, and the steppers used in the photolithography steps of semiconductor fabrication, of which it is the world\'s second largest manufacturer.[4]', 'vendor', 'inactive', NULL, NULL, '2023-02-10 07:08:11'),
(15, 'panisonic', 'panisonic', 'pansonic@gmail.com', NULL, '$2y$10$bfxKqRnILl5QvXoeVZOR1ur/uDnDRO5vVoVCkSpeiWm.WRVu5e5jG', '63e54e2855359panasonic-logo.jpg', '039874561', 'Newyork', '2023', 'Panasonic Holdings Corporation,[a] formerly Matsushita Electric Industrial Co., Ltd.[b] between 1935 and 2008 and the first incarnation of Panasonic Corporation[c] between 2008 and 2022,[1] is a major Japanese multinational conglomerate corporation, headquartered in Kadoma, Osaka. It was founded by Kōnosuke Matsushita in 1918 as a lightbulb socket manufacturer.[3] In addition to consumer electronics, of which it was the world\'s largest maker in the late 20th century, Panasonic offers a wide range of products and services, including rechargeable batteries, automotive and avionic systems, industrial systems, as well as home renovation and construction', 'vendor', 'active', NULL, NULL, '2023-02-10 08:39:36'),
(16, 'GUCCI', 'GUCCI', 'gucci@gmail.com', NULL, '$2y$10$e5wyfzpfyj.nPy/.eHQxoO.cMOucONFFkE1tZ02.iY.eVDvF2FMCK', '63e550e0d230bgucci.png', '0321654987', 'England', '2023', 'Gucci (/ˈɡuːtʃi/ (listen), GOO-chee; Italian pronunciation: [ˈɡuttʃi]) is an Italian high-end luxury fashion house based in Florence, Italy.[1][2][3] Its product lines include handbags, ready-to-wear, footwear, accessories, and home decoration; and it licenses its name and branding to Coty, Inc. for fragrance and cosmetics under the name Gucci Beauty.[4]', 'vendor', 'active', NULL, NULL, '2023-02-10 07:08:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
