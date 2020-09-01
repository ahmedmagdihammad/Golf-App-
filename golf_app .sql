-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 05:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastkood`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'صنف 1', 0, '2019-11-24 15:09:22', '2019-11-27 16:49:47'),
(2, 'صنف 2', 0, '2019-11-27 16:49:54', '2019-11-27 16:49:54'),
(3, 'صنف 3', 0, '2019-11-27 16:50:01', '2019-11-27 16:50:01'),
(4, 'صنف 4', 0, '2019-11-27 21:31:46', '2019-11-30 08:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descsription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `descsription`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ضفع فواتير', 'لم تدفع', '0', '2019-11-27 20:03:34', '2019-11-27 20:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `points`, `created_at`, `updated_at`, `phone`, `created_by`, `address`) VALUES
(1, 'مصطفي السيد صلاح', '50', '2019-11-26 08:54:57', '2019-11-26 08:54:57', '01120305070', '1', 'حلوان');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_managers`
--

CREATE TABLE `customer_service_managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `governorate_manager_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `states` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_service_managers`
--

INSERT INTO `customer_service_managers` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `governorate_manager_id`, `created_by`, `created_at`, `updated_at`, `states`) VALUES
(1, 'سمر ياسين', '0123456789', 'الحي السادس', '29601011434455', 'images/1574764209.jpg', 2, 1, '2019-11-23 22:00:00', '2019-11-26 09:37:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_representatives`
--

CREATE TABLE `customer_service_representatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `customer_service_manager_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_service_representatives`
--

INSERT INTO `customer_service_representatives` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `customer_service_manager_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'سمر ياسين', '0123456789', 'الحي السادس', '123456789212345', 'woman.png', 1, 1, '2019-11-23 22:00:00', '2019-11-23 22:00:00'),
(2, 'احمد طلعت محمدي', '01150512423', 'شبرا الخيمة', NULL, '1574608678python-programming-syntax-4k-1s.jpg', 1, 1, '2019-11-24 13:17:58', '2019-11-24 13:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `distributers`
--

CREATE TABLE `distributers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributers`
--

INSERT INTO `distributers` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'reda magdi', '01118763129', 'helwan', '12253285874', 'images/1574779033.PNG', 0, '2019-11-26 12:37:13', '2019-11-26 12:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `name`, `created_by`, `created_at`, `updated_at`, `manager_id`) VALUES
(1, 'القاهرة', 1, '2019-11-23 22:00:00', '2019-11-23 22:00:00', NULL),
(2, 'الجيزة', 1, '2019-11-23 22:00:00', '2019-11-23 22:00:00', NULL),
(5, 'القليوبية', 1, '2019-11-23 23:52:12', '2019-11-23 23:52:12', NULL),
(6, 'حلوان', 1, '2019-11-23 23:53:27', '2019-11-23 23:53:27', NULL),
(8, 'بني سويف', 1, '2019-11-24 00:20:32', '2019-11-24 00:20:32', NULL),
(9, 'المنيا', 1, '2019-11-24 00:21:03', '2019-11-24 00:21:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `governorate_managers`
--

CREATE TABLE `governorate_managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorate_managers`
--

INSERT INTO `governorate_managers` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'مصطفي السيد صلاح', '01120305070', 'حلوان', '2994821510555', 'images/1574767773.jpg', 1, '2019-11-26 09:29:33', '2019-11-26 09:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `distributer_id` int(191) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `distributer_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'مصطفي السيد صلاح', '01120305070', 'حلوان', '2994821510555', 'images/1574766214.jpg', 1, 0, '2019-11-26 09:03:34', '2019-11-27 16:16:40'),
(2, 'احمد مجدى', '01118763129', 'helwan', '12253285874', 'images/1574878374.PNG', 1, 0, '2019-11-27 16:12:54', '2019-11-27 16:16:56');

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
(3, '2019_11_23_200339_create_categories_table', 1),
(4, '2019_11_23_200458_create_products_table', 1),
(5, '2019_11_23_200516_create_distributers_table', 1),
(6, '2019_11_23_200551_create_merchants_table', 1),
(7, '2019_11_23_200606_create_technicians_table', 1),
(8, '2019_11_23_200641_create_governorate_managers_table', 1),
(9, '2019_11_23_200707_create_sales_managers_table', 1),
(10, '2019_11_23_200800_create_customer_service_managers_table', 1),
(11, '2019_11_23_200912_create_suppliers_table', 1),
(12, '2019_11_23_201021_create_sales_representatives_table', 1),
(13, '2019_11_23_201131_create_customer_service_representatives_table', 1),
(14, '2019_11_23_201155_create_gifts_table', 1),
(15, '2019_11_23_201324_create_preview_requests_table', 1),
(16, '2019_11_23_201453_create_states_table', 1),
(17, '2019_11_23_201505_create_governorates_table', 1),
(18, '2019_11_23_202042_create_customers_table', 1),
(19, '2019_11_24_173156_create_price_lists_table', 2),
(20, '2019_11_27_172247_create_pricelists_table', 3),
(21, '2019_11_27_173152_create_pricelists_table', 4),
(22, '2019_11_27_185752_create_price_products_table', 5),
(23, '2019_11_27_203431_create_complaints_table', 6),
(24, '2019_11_27_203512_create_tasks_table', 6),
(25, '2019_11_27_204039_add_manager_id_to_governorates_table', 7),
(26, '2019_11_27_204326_add_manager_id_to_states_table', 7),
(27, '2019_11_28_002624_add_states_column_to_sales_manager', 7),
(28, '2019_11_28_094649_add_states_column_to_customer_services_managers_table', 7);

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
-- Table structure for table `preview_requests`
--

CREATE TABLE `preview_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricelists`
--

CREATE TABLE `pricelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricelists`
--

INSERT INTO `pricelists` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'قائمة الاسعار 1', '0', '2019-11-27 15:35:02', '2019-11-27 15:37:14'),
(3, 'قائمة الاسعار 2', '0', '2019-11-27 15:39:15', '2019-11-27 15:39:15'),
(4, 'قائمة الاسعار 3', '0', '2019-11-27 15:39:33', '2019-11-27 15:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `price_products`
--

CREATE TABLE `price_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pricelist_id` int(255) DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL,
  `base_price` int(255) DEFAULT NULL,
  `coupon_price` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_products`
--

INSERT INTO `price_products` (`id`, `pricelist_id`, `product_id`, `base_price`, `coupon_price`, `created_at`, `updated_at`, `created_by`) VALUES
(9, 1, 4, 10, 8, '2019-11-30 10:03:08', '2019-11-30 10:03:08', 0),
(10, 1, 5, 10, 8, '2019-11-30 10:03:08', '2019-11-30 10:03:08', 0),
(11, 1, 6, 10, 8, '2019-11-30 10:03:08', '2019-11-30 10:03:08', 0),
(12, 3, 8, 10, 8, '2019-11-30 10:09:18', '2019-11-30 10:09:18', 0),
(13, 1, 7, 10, 8, '2019-11-30 10:10:00', '2019-11-30 10:10:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'منتج 1', 1, 0, '2019-11-27 22:44:27', '2019-11-27 22:44:27'),
(5, 'منتج 2', 1, 0, '2019-11-27 22:44:40', '2019-11-27 22:44:40'),
(6, 'منتج 3', 1, 0, '2019-11-27 22:44:56', '2019-11-27 22:44:56'),
(7, 'منتج 4', 2, 0, '2019-11-27 22:45:06', '2019-11-27 22:45:13'),
(8, 'منتج 5', 3, 0, '2019-11-27 22:45:24', '2019-11-27 22:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `sales_managers`
--

CREATE TABLE `sales_managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `governorate_manager_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `states` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_managers`
--

INSERT INTO `sales_managers` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `governorate_manager_id`, `created_by`, `created_at`, `updated_at`, `states`) VALUES
(1, 'احمد مجدي حماد', '01123456789', 'الهرم', '2313214564798', 'man.png', 2, 1, '2019-11-24 22:00:00', '2019-11-26 09:36:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_representatives`
--

CREATE TABLE `sales_representatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `sales_manager_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_representatives`
--

INSERT INTO `sales_representatives` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `sales_manager_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'احمد طلعت', '01150512423', 'شبرا الخيمة', '29601011434455', 'man.png', 1, 1, '2019-11-23 22:00:00', '2019-11-23 22:00:00'),
(7, 'مصطفي السيد صلاح', '01120305070', 'حلوان', '2994821510555', '1574606634097d2f53027817.59256e89916a3.jpg', 1, 1, '2019-11-24 12:43:54', '2019-11-24 12:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `governorate_id`, `created_by`, `created_at`, `updated_at`, `manager_id`) VALUES
(1, 'مدينة نصر', 1, 1, '2019-11-23 22:00:00', '2019-11-23 22:00:00', NULL),
(2, 'ميدان الرماية', 2, 1, '2019-11-23 22:00:00', '2019-11-23 22:00:00', NULL),
(3, 'مصطفي النحاس', 1, 1, '2019-11-24 00:24:29', '2019-11-24 00:24:29', NULL),
(4, 'اول عباس', 1, 1, '2019-11-24 00:24:46', '2019-11-24 00:24:46', NULL),
(5, 'اول مكرم', 1, 1, '2019-11-24 00:24:52', '2019-11-24 00:24:52', NULL),
(6, 'شبرا الخيمة', 5, 1, '2019-11-24 00:24:59', '2019-11-24 00:24:59', NULL),
(7, 'السيدة عائشة', 1, 1, '2019-11-24 00:28:27', '2019-11-24 00:28:27', NULL),
(8, 'حدائق حلوان', 6, 1, '2019-11-25 13:30:09', '2019-11-25 13:30:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '01150512423', 'حلوان', '2994821510555', 'images/1574765964.jpg', 1, '2019-11-26 08:59:24', '2019-11-26 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descsription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `created_by`, `user_id`, `name`, `descsription`, `deadline`, `created_at`, `updated_at`) VALUES
(2, '0', '1', 'مهمة', 'مهمة', '2019-01-01', '2019-11-27 20:06:12', '2019-11-27 20:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `national_id` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `merchant_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`id`, `name`, `phone`, `address`, `national_id`, `picture`, `created_by`, `created_at`, `updated_at`, `merchant_id`) VALUES
(1, 'حماد', '01118763129', 'helwan', '12253285874', 'images/1574779123.PNG', 0, '2019-11-26 12:38:43', '2019-11-27 16:34:49', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Muhammady', 'ahmed.t.muhammady2018@gmail.com', '$2y$10$fzVN5D3fqbhu70BVJT2sje7N3ZHEKaGWX1aCZT0lj2/8r/s.vm0QO', NULL, NULL, '2019-11-23 23:02:08', '2019-11-23 23:02:08'),
(0, 'Ahmed Hammad', 'ahmedhamad@gmail.com', '$2y$10$BcXCo2OHmmd7UDV4sFCTgesDMzJjO9BlENjYe2JaFpJCT9ZIDwhoi', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_service_managers`
--
ALTER TABLE `customer_service_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_service_representatives`
--
ALTER TABLE `customer_service_representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributers`
--
ALTER TABLE `distributers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorate_managers`
--
ALTER TABLE `governorate_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `preview_requests`
--
ALTER TABLE `preview_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricelists`
--
ALTER TABLE `pricelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_products`
--
ALTER TABLE `price_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_managers`
--
ALTER TABLE `sales_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_representatives`
--
ALTER TABLE `sales_representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_service_managers`
--
ALTER TABLE `customer_service_managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_service_representatives`
--
ALTER TABLE `customer_service_representatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distributers`
--
ALTER TABLE `distributers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `governorate_managers`
--
ALTER TABLE `governorate_managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `preview_requests`
--
ALTER TABLE `preview_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricelists`
--
ALTER TABLE `pricelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `price_products`
--
ALTER TABLE `price_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_managers`
--
ALTER TABLE `sales_managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_representatives`
--
ALTER TABLE `sales_representatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
