-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 01:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `f_name`, `l_name`, `phone`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Admin', 'Khandakar', '01759412381', 'admin@admin.com', '2021-01-27-601131f0dd079.png', '$2y$10$kfcKUwhpbjnoITSdbeSpIuSuOybwPntFwBhKw8eTZJ3LeWMAJBvLO', '1WVP1Qa7aGymNlF2C6asUWKWiRzgKwTuEhprrNlAFIXLcyvaUuH4xCW6nzMo', '2020-12-29 10:47:39', '2021-02-28 13:56:54'),
(2, 'admin', NULL, '2323230544', 'support@customdigital.cofd', NULL, '$2y$10$47V6isLOM3XFnaK91CkLuubFKCr.SNrs/H4D/bbcq2xMOTGurkFUC', NULL, '2021-03-06 05:58:51', '2021-03-06 05:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coverage` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `restaurant_id`, `name`, `email`, `password`, `latitude`, `longitude`, `address`, `status`, `created_at`, `updated_at`, `coverage`, `remember_token`) VALUES
(1, NULL, 'Main Branch', 'mainb@mainb.com', '$2y$10$S1EK4VV.uje5arb2xmlrLeVWVVfCV9O14rLN8Ncpz2.t1ywV2k/NK', '23.7807777', '90.3492345', '1', 1, '2021-02-24 09:45:49', '2021-03-14 06:22:25', 40075, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'self_pickup', '1', '2021-01-06 05:55:51', '2021-01-06 05:55:51'),
(3, 'restaurant_name', 'Emarket', NULL, NULL),
(4, 'currency', 'USD', NULL, NULL),
(5, 'logo', '2021-03-14-604e5619555bc.png', NULL, NULL),
(6, 'mail_config', '{\"name\":\"Emarket\",\"host\":\"mail.demo.com\",\"driver\":\"smtp\",\"port\":\"587\",\"username\":\"info@demo.com\",\"email_id\":\"info@demo.com\",\"encryption\":\"tls\",\"password\":\"demo\"}', NULL, '2021-04-03 12:15:38'),
(7, 'delivery_charge', '10', NULL, NULL),
(8, 'ssl_commerz_payment', '{\"status\":\"1\",\"store_id\":null,\"store_password\":null}', NULL, '2021-04-03 12:15:53'),
(9, 'paypal', '{\"status\":\"1\",\"paypal_client_id\":null,\"paypal_secret\":null}', NULL, '2021-04-03 12:16:07'),
(10, 'stripe', '{\"status\":\"1\",\"api_key\":null,\"published_key\":null}', NULL, '2021-04-03 12:16:14'),
(11, 'phone', '+8801747413273', NULL, NULL),
(13, 'footer_text', 'footer', NULL, NULL),
(14, 'address', 'House-00, Road-00, City', NULL, NULL),
(15, 'email_address', 'support@demo.com', NULL, NULL),
(16, 'cash_on_delivery', '{\"status\":\"1\"}', NULL, '2021-02-11 18:39:36'),
(17, 'email_verification', '0', NULL, NULL),
(18, 'digital_payment', '{\"status\":\"1\"}', '2021-01-30 19:38:54', '2021-01-30 19:38:58'),
(19, 'terms_and_conditions', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><h1>Terms and Condition</h1><p><br></p><ol><li>Hello, terms and conditions.......</li><li>Hello</li></ol></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', NULL, '2021-02-11 18:31:50'),
(20, 'fcm_topic', '', NULL, NULL),
(21, 'fcm_project_id', '3f34f34', NULL, NULL),
(22, 'push_notification_key', 'demo', NULL, NULL),
(24, 'order_pending_message', '{\"status\":1,\"message\":\"Your order has been placed successfully.\"}', NULL, NULL),
(25, 'order_processing_message', '{\"status\":1,\"message\":\"Your order is going to the cook\"}', NULL, NULL),
(26, 'out_for_delivery_message', '{\"status\":0,\"message\":\"Order out for delivery.\"}', NULL, NULL),
(27, 'order_delivered_message', '{\"status\":1,\"message\":\"delivered\"}', NULL, NULL),
(28, 'delivery_boy_assign_message', '{\"status\":1,\"message\":\"boy assigned\"}', NULL, NULL),
(29, 'delivery_boy_start_message', '{\"status\":1,\"message\":\"start delivery\"}', NULL, NULL),
(30, 'delivery_boy_delivered_message', '{\"status\":1,\"message\":\"boy delivered\"}', NULL, NULL),
(32, 'order_confirmation_msg', '{\"status\":1,\"message\":\"Your order has been confirmed.\"}', NULL, NULL),
(33, 'razor_pay', '{\"status\":\"1\",\"razor_key\":null,\"razor_secret\":null}', '2021-02-14 10:15:12', '2021-04-03 12:15:59'),
(34, 'location_coverage', '{\"status\":1,\"longitude\":\"91.410747\",\"latitude\":\"22.986282\",\"coverage\":\"20\"}', NULL, NULL),
(35, 'minimum_order_value', '50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(11) NOT NULL,
  `position` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `min_purchase` decimal(8,2) NOT NULL DEFAULT 0.00,
  `max_discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency_code`, `currency_symbol`, `exchange_rate`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', '$', '1.00', NULL, NULL),
(2, 'Canadian Dollar', 'CAD', 'CA$', '1.00', NULL, NULL),
(3, 'Euro', 'EUR', '€', '1.00', NULL, NULL),
(4, 'United Arab Emirates Dirham', 'AED', 'د.إ.‏', '1.00', NULL, NULL),
(5, 'Afghan Afghani', 'AFN', '؋', '1.00', NULL, NULL),
(6, 'Albanian Lek', 'ALL', 'L', '1.00', NULL, NULL),
(7, 'Armenian Dram', 'AMD', '֏', '1.00', NULL, NULL),
(8, 'Argentine Peso', 'ARS', '$', '1.00', NULL, NULL),
(9, 'Australian Dollar', 'AUD', '$', '1.00', NULL, NULL),
(10, 'Azerbaijani Manat', 'AZN', '₼', '1.00', NULL, NULL),
(11, 'Bosnia-Herzegovina Convertible Mark', 'BAM', 'KM', '1.00', NULL, NULL),
(12, 'Bangladeshi Taka', 'BDT', '৳', '1.00', NULL, NULL),
(13, 'Bulgarian Lev', 'BGN', 'лв.', '1.00', NULL, NULL),
(14, 'Bahraini Dinar', 'BHD', 'د.ب.‏', '1.00', NULL, NULL),
(15, 'Burundian Franc', 'BIF', 'FBu', '1.00', NULL, NULL),
(16, 'Brunei Dollar', 'BND', 'B$', '1.00', NULL, NULL),
(17, 'Bolivian Boliviano', 'BOB', 'Bs', '1.00', NULL, NULL),
(18, 'Brazilian Real', 'BRL', 'R$', '1.00', NULL, NULL),
(19, 'Botswanan Pula', 'BWP', 'P', '1.00', NULL, NULL),
(20, 'Belarusian Ruble', 'BYN', 'Br', '1.00', NULL, NULL),
(21, 'Belize Dollar', 'BZD', '$', '1.00', NULL, NULL),
(22, 'Congolese Franc', 'CDF', 'FC', '1.00', NULL, NULL),
(23, 'Swiss Franc', 'CHF', 'CHf', '1.00', NULL, NULL),
(24, 'Chilean Peso', 'CLP', '$', '1.00', NULL, NULL),
(25, 'Chinese Yuan', 'CNY', '¥', '1.00', NULL, NULL),
(26, 'Colombian Peso', 'COP', '$', '1.00', NULL, NULL),
(27, 'Costa Rican Colón', 'CRC', '₡', '1.00', NULL, NULL),
(28, 'Cape Verdean Escudo', 'CVE', '$', '1.00', NULL, NULL),
(29, 'Czech Republic Koruna', 'CZK', 'Kč', '1.00', NULL, NULL),
(30, 'Djiboutian Franc', 'DJF', 'Fdj', '1.00', NULL, NULL),
(31, 'Danish Krone', 'DKK', 'Kr.', '1.00', NULL, NULL),
(32, 'Dominican Peso', 'DOP', 'RD$', '1.00', NULL, NULL),
(33, 'Algerian Dinar', 'DZD', 'د.ج.‏', '1.00', NULL, NULL),
(34, 'Estonian Kroon', 'EEK', 'kr', '1.00', NULL, NULL),
(35, 'Egyptian Pound', 'EGP', 'E£‏', '1.00', NULL, NULL),
(36, 'Eritrean Nakfa', 'ERN', 'Nfk', '1.00', NULL, NULL),
(37, 'Ethiopian Birr', 'ETB', 'Br', '1.00', NULL, NULL),
(38, 'British Pound Sterling', 'GBP', '£', '1.00', NULL, NULL),
(39, 'Georgian Lari', 'GEL', 'GEL', '1.00', NULL, NULL),
(40, 'Ghanaian Cedi', 'GHS', 'GH¢', '1.00', NULL, NULL),
(41, 'Guinean Franc', 'GNF', 'FG', '1.00', NULL, NULL),
(42, 'Guatemalan Quetzal', 'GTQ', 'Q', '1.00', NULL, NULL),
(43, 'Hong Kong Dollar', 'HKD', 'HK$', '1.00', NULL, NULL),
(44, 'Honduran Lempira', 'HNL', 'L', '1.00', NULL, NULL),
(45, 'Croatian Kuna', 'HRK', 'kn', '1.00', NULL, NULL),
(46, 'Hungarian Forint', 'HUF', 'Ft', '1.00', NULL, NULL),
(47, 'Indonesian Rupiah', 'IDR', 'Rp', '1.00', NULL, NULL),
(48, 'Israeli New Sheqel', 'ILS', '₪', '1.00', NULL, NULL),
(49, 'Indian Rupee', 'INR', '₹', '1.00', NULL, NULL),
(50, 'Iraqi Dinar', 'IQD', 'ع.د', '1.00', NULL, NULL),
(51, 'Iranian Rial', 'IRR', '﷼', '1.00', NULL, NULL),
(52, 'Icelandic Króna', 'ISK', 'kr', '1.00', NULL, NULL),
(53, 'Jamaican Dollar', 'JMD', '$', '1.00', NULL, NULL),
(54, 'Jordanian Dinar', 'JOD', 'د.ا‏', '1.00', NULL, NULL),
(55, 'Japanese Yen', 'JPY', '¥', '1.00', NULL, NULL),
(56, 'Kenyan Shilling', 'KES', 'Ksh', '1.00', NULL, NULL),
(57, 'Cambodian Riel', 'KHR', '៛', '1.00', NULL, NULL),
(58, 'Comorian Franc', 'KMF', 'FC', '1.00', NULL, NULL),
(59, 'South Korean Won', 'KRW', 'CF', '1.00', NULL, NULL),
(60, 'Kuwaiti Dinar', 'KWD', 'د.ك.‏', '1.00', NULL, NULL),
(61, 'Kazakhstani Tenge', 'KZT', '₸.', '1.00', NULL, NULL),
(62, 'Lebanese Pound', 'LBP', 'ل.ل.‏', '1.00', NULL, NULL),
(63, 'Sri Lankan Rupee', 'LKR', 'Rs', '1.00', NULL, NULL),
(64, 'Lithuanian Litas', 'LTL', 'Lt', '1.00', NULL, NULL),
(65, 'Latvian Lats', 'LVL', 'Ls', '1.00', NULL, NULL),
(66, 'Libyan Dinar', 'LYD', 'د.ل.‏', '1.00', NULL, NULL),
(67, 'Moroccan Dirham', 'MAD', 'د.م.‏', '1.00', NULL, NULL),
(68, 'Moldovan Leu', 'MDL', 'L', '1.00', NULL, NULL),
(69, 'Malagasy Ariary', 'MGA', 'Ar', '1.00', NULL, NULL),
(70, 'Macedonian Denar', 'MKD', 'Ден', '1.00', NULL, NULL),
(71, 'Myanma Kyat', 'MMK', 'K', '1.00', NULL, NULL),
(72, 'Macanese Pataca', 'MOP', 'MOP$', '1.00', NULL, NULL),
(73, 'Mauritian Rupee', 'MUR', 'Rs', '1.00', NULL, NULL),
(74, 'Mexican Peso', 'MXN', '$', '1.00', NULL, NULL),
(75, 'Malaysian Ringgit', 'MYR', 'RM', '1.00', NULL, NULL),
(76, 'Mozambican Metical', 'MZN', 'MT', '1.00', NULL, NULL),
(77, 'Namibian Dollar', 'NAD', 'N$', '1.00', NULL, NULL),
(78, 'Nigerian Naira', 'NGN', '₦', '1.00', NULL, NULL),
(79, 'Nicaraguan Córdoba', 'NIO', 'C$', '1.00', NULL, NULL),
(80, 'Norwegian Krone', 'NOK', 'kr', '1.00', NULL, NULL),
(81, 'Nepalese Rupee', 'NPR', 'Re.', '1.00', NULL, NULL),
(82, 'New Zealand Dollar', 'NZD', '$', '1.00', NULL, NULL),
(83, 'Omani Rial', 'OMR', 'ر.ع.‏', '1.00', NULL, NULL),
(84, 'Panamanian Balboa', 'PAB', 'B/.', '1.00', NULL, NULL),
(85, 'Peruvian Nuevo Sol', 'PEN', 'S/', '1.00', NULL, NULL),
(86, 'Philippine Peso', 'PHP', '₱', '1.00', NULL, NULL),
(87, 'Pakistani Rupee', 'PKR', 'Rs', '1.00', NULL, NULL),
(88, 'Polish Zloty', 'PLN', 'zł', '1.00', NULL, NULL),
(89, 'Paraguayan Guarani', 'PYG', '₲', '1.00', NULL, NULL),
(90, 'Qatari Rial', 'QAR', 'ر.ق.‏', '1.00', NULL, NULL),
(91, 'Romanian Leu', 'RON', 'lei', '1.00', NULL, NULL),
(92, 'Serbian Dinar', 'RSD', 'din.', '1.00', NULL, NULL),
(93, 'Russian Ruble', 'RUB', '₽.', '1.00', NULL, NULL),
(94, 'Rwandan Franc', 'RWF', 'FRw', '1.00', NULL, NULL),
(95, 'Saudi Riyal', 'SAR', 'ر.س.‏', '1.00', NULL, NULL),
(96, 'Sudanese Pound', 'SDG', 'ج.س.', '1.00', NULL, NULL),
(97, 'Swedish Krona', 'SEK', 'kr', '1.00', NULL, NULL),
(98, 'Singapore Dollar', 'SGD', '$', '1.00', NULL, NULL),
(99, 'Somali Shilling', 'SOS', 'Sh.so.', '1.00', NULL, NULL),
(100, 'Syrian Pound', 'SYP', 'LS‏', '1.00', NULL, NULL),
(101, 'Thai Baht', 'THB', '฿', '1.00', NULL, NULL),
(102, 'Tunisian Dinar', 'TND', 'د.ت‏', '1.00', NULL, NULL),
(103, 'Tongan Paʻanga', 'TOP', 'T$', '1.00', NULL, NULL),
(104, 'Turkish Lira', 'TRY', '₺', '1.00', NULL, NULL),
(105, 'Trinidad and Tobago Dollar', 'TTD', '$', '1.00', NULL, NULL),
(106, 'New Taiwan Dollar', 'TWD', 'NT$', '1.00', NULL, NULL),
(107, 'Tanzanian Shilling', 'TZS', 'TSh', '1.00', NULL, NULL),
(108, 'Ukrainian Hryvnia', 'UAH', '₴', '1.00', NULL, NULL),
(109, 'Ugandan Shilling', 'UGX', 'USh', '1.00', NULL, NULL),
(110, 'Uruguayan Peso', 'UYU', '$', '1.00', NULL, NULL),
(111, 'Uzbekistan Som', 'UZS', 'so\'m', '1.00', NULL, NULL),
(112, 'Venezuelan Bolívar', 'VEF', 'Bs.F.', '1.00', NULL, NULL),
(113, 'Vietnamese Dong', 'VND', '₫', '1.00', NULL, NULL),
(114, 'CFA Franc BEAC', 'XAF', 'FCFA', '1.00', NULL, NULL),
(115, 'CFA Franc BCEAO', 'XOF', 'CFA', '1.00', NULL, NULL),
(116, 'Yemeni Rial', 'YER', '﷼‏', '1.00', NULL, NULL),
(117, 'South African Rand', 'ZAR', 'R', '1.00', NULL, NULL),
(118, 'Zambian Kwacha', 'ZMK', 'ZK', '1.00', NULL, NULL),
(119, 'Zimbabwean Dollar', 'ZWL', 'Z$', '1.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `contact_person_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_histories`
--

CREATE TABLE `delivery_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `deliveryman_id` bigint(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d_m_reviews`
--

CREATE TABLE `d_m_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_man_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 17),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 17),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 17),
(26, '2016_06_01_000004_create_oauth_clients_table', 17),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 17),
(68, '2021_03_07_065637_change_product_image_clumn_type', 42),
(69, '2021_03_11_061437_add_unit_column_to_products', 43),
(70, '2021_03_11_070016_add_unit_to_order_details', 44);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01a12949f80517fb631ca6c45a3d7500aedcd2c2ee4f6674fc4f763794cce191cc57aa2ac790bed6', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 08:24:06', '2021-03-20 08:24:06', '2022-03-20 08:24:06'),
('026c5e8225cd0f27150428f7f34e7db7495cc977396af4fe1b5ac4b51d14ce0d72ff804267913504', 10, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-23 00:12:35', '2021-03-23 00:12:35', '2022-03-23 00:12:35'),
('0f356f3f319b0a9f1a3de69121756147a9a35aced10698b78ce3e11af55a51c7b4403331aaf9f6fa', 2, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-21 11:21:14', '2021-03-21 11:21:14', '2022-03-21 11:21:14'),
('1cb3a8f1e32f97b9557b7cb9d3530869a3b91ad36fb43612f257a260daf31965ae71bccd667eba58', 4, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-14 11:43:17', '2021-03-14 11:43:17', '2022-03-14 11:43:17'),
('244c4080af4813322c2487ca1110d28c52c1736b93a00d65884e21d2cdeb546cd1afc8ca8c1ac889', 10, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 22:54:33', '2021-03-22 22:54:33', '2022-03-22 22:54:33'),
('2b04e706573133a9fdf9311d016d1665686b463b65b9619c096cd9015c5661227a47affc7d7c671a', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 09:51:07', '2021-03-20 09:51:07', '2022-03-20 09:51:07'),
('41c1cdc5181f6a56908c88c08bb30e2f0bf9c13de900995c092193076814c1938221084af6134b6f', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-11 11:03:01', '2021-03-11 11:03:01', '2022-03-11 11:03:01'),
('429566b77a8091d6a7ae216775e89fa0d969720befb9e6a7ac86468febe7da7b579476c1166fd02d', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 17:45:17', '2021-03-22 17:45:17', '2022-03-22 17:45:17'),
('44346fb3ede87b15f39e521cc6e0456ea6511cee81b54d0e079380ae083d2ce7fe5affcc36afd453', 5, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 10:44:42', '2021-03-22 10:44:42', '2022-03-22 10:44:42'),
('46b20396ce1708fc7d29f662d12eed63391efb26d5eaaf50cb1b40055c922e859e9a24745f24b55c', 11, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-28 15:28:06', '2021-03-28 15:28:06', '2022-03-28 15:28:06'),
('4955cd3ad02d7724e0273e19a6ee686a45b4c4315eca37dd484150c762cdd3c7a5c8621040cad36c', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-18 14:33:02', '2021-03-18 14:33:02', '2022-03-18 14:33:02'),
('4b525fb73129723c762ee9ba8c771d014b395db65d379bc202b1b78f73151d1da97d3a6b298e42ae', 3, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-11 11:58:57', '2021-03-11 11:58:57', '2022-03-11 11:58:57'),
('5df7509171c2910ae9c245651cafa7af67ac69165204e811117ca51c5d53e4c811ba6a7609dfcd6d', 2, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-11 11:39:20', '2021-03-11 11:39:20', '2022-03-11 11:39:20'),
('7b2eeade305282c688101289afa620b3fe21b9070d28778c21359f848a2c3a7ee26d141609c49fe4', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 17:41:57', '2021-03-22 17:41:57', '2022-03-22 17:41:57'),
('7bc53f72e1bc60ac868cc9cb3da23462e2d53325cd95ac1d9726183f551133f8f19357f5a4ab1c5c', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 08:22:20', '2021-03-20 08:22:20', '2022-03-20 08:22:20'),
('7f2be6438654e6aed7bc80db9c9fc42b453f7f7ee2b2e402c9ac4e4c3b4f1f4b5b15722956bc28d5', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-18 13:10:54', '2021-03-18 13:10:54', '2022-03-18 13:10:54'),
('85b0cda4e7ec88573dba80bce1654120e15ba85b8bc392f7b3abd7dd3cdbf9b42200b2acbfd48c51', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-13 08:38:38', '2021-03-13 08:38:38', '2022-03-13 08:38:38'),
('91655e4b6799de33e3273e9b1689d563b1fb191c3fa28bb8d2793beb00da3abc306ee526154e07ea', 7, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 20:50:26', '2021-03-22 20:50:26', '2022-03-22 20:50:26'),
('9b6cdb15eb03345f87576d21760eb69898702860340bb0b3cbe1946e20a3f4010c2a04ade0451100', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 09:59:08', '2021-03-20 09:59:08', '2022-03-20 09:59:08'),
('a5c881ee3b55e50e84b147831a0f39638d0540ae25e8bffb48054f278cfda5c13d1b93da32e9d34b', 9, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 21:46:51', '2021-03-22 21:46:51', '2022-03-22 21:46:51'),
('a8b70b8ed4e1a56c859b064e4470d315b2bf316df1bfb9474e05e3f13f19532de9c06054e8348b3e', 6, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 19:17:48', '2021-03-22 19:17:48', '2022-03-22 19:17:48'),
('abd610d4912a50e0def3e756b3c2687813f4b21ec4450fa055cb959587ed693e5a01d43e9bbbeb37', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-13 16:22:06', '2021-03-13 16:22:06', '2022-03-13 16:22:06'),
('aeae2539b124401f26472a9d72b831a7087aa65d167820c84be45ebc272465b79a78f5be3aab7d14', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-14 09:25:26', '2021-03-14 09:25:26', '2022-03-14 09:25:26'),
('ca7e1c05ff51d449684de5a59689d2e94b215a057d17b78921c5ee0bb99826ce82c0041bd72ec91c', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 17:32:27', '2021-03-22 17:32:27', '2022-03-22 17:32:27'),
('cd27c3181b417963552146e37e3d676fc72c0b7d25b52703252a6d85395a84d2b9937282df930f6a', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 10:11:13', '2021-03-20 10:11:13', '2022-03-20 10:11:13'),
('d3795be7a58fd4ba6831d7d43fbdaa1630f1f34f250f3b16208e567a14546701c0da8fbc96f98dd6', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-13 16:27:03', '2021-03-13 16:27:03', '2022-03-13 16:27:03'),
('d57d18fdc148fe22154ef23db91e0d2367379287a011a81d21b09f10e2cbd0bcee3742e1b238e29c', 2, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 16:04:26', '2021-03-20 16:04:26', '2022-03-20 16:04:26'),
('d775f8ca5a72cd237c0ca423fdef72bd28ef801ad6df3f0395f6777a809b5053325aebf03959b129', 8, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-22 21:43:03', '2021-03-22 21:43:03', '2022-03-22 21:43:03'),
('da3960d0e93327477e67e17c9e31afa7c744cd6445ded9c80ebdfdd8512ee5f45ff83e480350d713', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 08:15:44', '2021-03-20 08:15:44', '2022-03-20 08:15:44'),
('dfeef2fe532b50d0464f82af5cad62e8fdb52951db1178d5b77cb929979ae6c8894f4821685187e3', 4, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-21 14:03:35', '2021-03-21 14:03:35', '2022-03-21 14:03:35'),
('f46655232a4767c49957894ef1ddb787e041e8a9cae89748d29de31c4b91855552f3377dc6696fc1', 1, 1, 'RestaurantCustomerAuth', '[]', 0, '2021-03-20 08:27:41', '2021-03-20 08:27:41', '2022-03-20 08:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'z5ky1aF18fNgAczYo0W2MdglqUxpyt0KsKdmbRIt', NULL, 'http://localhost', 1, 0, 0, '2021-01-05 18:07:29', '2021-01-05 18:07:29'),
(2, NULL, 'Laravel Password Grant Client', 'clk5DEe0ANVDYwD79OUYBkLcZ6CLSykUvULubUuk', 'users', 'http://localhost', 0, 1, 0, '2021-01-05 18:07:29', '2021-01-05 18:07:29'),
(3, NULL, 'Laravel Personal Access Client', 'Wx0QvFbaPGq4yTUa7qDChXFvrEYj8uPvZkZ6xznn', NULL, 'http://localhost', 1, 0, 0, '2021-04-06 05:31:34', '2021-04-06 05:31:34'),
(4, NULL, 'Laravel Password Grant Client', '5ciZPy4YVtiVbZiPFdGpNI423YsJvRR8cCQNEdSF', 'users', 'http://localhost', 0, 1, 0, '2021-04-06 05:31:34', '2021-04-06 05:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-05 18:07:29', '2021-01-05 18:07:29'),
(2, 3, '2021-04-06 05:31:34', '2021-04-06 05:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `coupon_discount_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `coupon_discount_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total_tax_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `payment_method` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_reference` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_man_id` bigint(20) DEFAULT NULL,
  `delivery_charge` decimal(8,2) NOT NULL DEFAULT 0.00,
  `order_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'delivery',
  `branch_id` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_histories`
--

CREATE TABLE `order_delivery_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `delivery_man_id` bigint(20) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `start_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `product_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_on_product` decimal(8,2) DEFAULT NULL,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'amount',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `tax_amount` decimal(8,2) NOT NULL DEFAULT 1.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pc'
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `variations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `tax_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `track_deliverymen`
--

CREATE TABLE `track_deliverymen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `delivery_man_id` bigint(20) DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_phone_verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cm_firebase_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_histories`
--
ALTER TABLE `delivery_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivery_men_phone_unique` (`phone`);

--
-- Indexes for table `d_m_reviews`
--
ALTER TABLE `d_m_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_delivery_histories`
--
ALTER TABLE `order_delivery_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_deliverymen`
--
ALTER TABLE `track_deliverymen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_histories`
--
ALTER TABLE `delivery_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d_m_reviews`
--
ALTER TABLE `d_m_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_delivery_histories`
--
ALTER TABLE `order_delivery_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_deliverymen`
--
ALTER TABLE `track_deliverymen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
