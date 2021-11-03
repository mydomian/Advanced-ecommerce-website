-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 05:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'admin', '01943006504', 'admin@gmail.com', '$2y$10$Zpehh8qfCXAjT3vP/c5oH.qNPukMFNBnZyVL2BveyJgSHK.AwPdB.', 'C81E0nMkc1fgCBWfT8UKyXYCWyIh7jUkZipHc4WmDiUOwitpcIaRkXehED6G.PNG', 1, '2021-08-31 07:22:07', '2021-09-01 07:31:00'),
(7, 'Olin Leuschke V', 'subadmin', '(910) 248-5373', 'ole97@boehm.org', '$2y$10$wLhPNoOtBbtsEsX6ZQsq/.1TYEnXaaT48cbP8caog0DDkFbWnmjmC', '', 1, '2021-08-31 07:22:07', '2021-08-31 07:22:07'),
(8, 'Mr. Eusebio Leffler', 'admin', '+1.254.884.7732', 'nklocko@yahoo.com', '$2y$10$BGqGWuvCSepH3WdYPqynN.uUvg5IdUSq3IjhBduR84yTiCvtWocs.', '', 1, '2021-08-31 07:22:07', '2021-08-31 07:22:07'),
(9, 'Cheyanne Thompson', 'subadmin', '+1-562-791-3388', 'jacobson.kenny@yundt.com', '$2y$10$dne0E2AtCIVcGBYx.R1upO2iMMENlaonmFFPuNRurkI7DJknOb5E2', '', 1, '2021-08-31 07:22:07', '2021-08-31 07:22:07'),
(10, 'Maryam Stoltenberg DVM', 'admin', '+1 (309) 581-0463', 'temmerich@gaylord.com', '$2y$10$GgGAwQ3J9RUZYF5ZGInGa.3jUroIgYbDKfYYhN.NQpgPnHz0.GVBu', '', 1, '2021-08-31 07:22:07', '2021-08-31 07:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `name`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banner1.png', '', 'Black Jaket', 'Banner Image', 1, NULL, '2021-09-09 02:10:00'),
(2, 'banner2.png', '', 'blue Jaket', 'Banner Image', 1, NULL, '2021-09-09 02:09:58'),
(3, 'banner3.png', '', 'pink Jaket', 'Banner Image', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Easy Fashion', 1, NULL, '2021-08-31 08:04:51'),
(3, 'Dzone', 1, NULL, NULL),
(4, 'Mardicale', 1, '2021-08-31 08:25:40', '2021-08-31 08:25:40'),
(5, 'Evaly', 1, '2021-08-31 08:27:51', '2021-08-31 09:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `session_id`, `user_id`, `size`, `qty`, `created_at`, `updated_at`) VALUES
(37, 10, 'qF9bj8F81ufkcXBsYVMdQ83GJF3q5JKRr8hKWFRt', 0, 'large', 2, '2021-10-01 03:22:39', '2021-10-01 03:59:01'),
(38, 1, 'qF9bj8F81ufkcXBsYVMdQ83GJF3q5JKRr8hKWFRt', 0, 'medium', 1, '2021-10-01 03:22:47', '2021-10-01 03:58:15'),
(39, 6, 'bjgHc9MFsh9cCJUYVejtHBPvlqUTr0UyQiMIwxl7', 19, 'small', 1, '2021-10-15 10:14:08', '2021-10-15 10:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_discount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'T-shirt', '', 0.00, 'This is T-shirt Category Description', 't-shirt', '', '', '', 1, NULL, '2021-09-17 21:52:14'),
(2, 1, 1, 'Red T-Shirt', 'fQxUv5D3Cz5lTBQ8bjnucFjUXnWhydei9hylzGwlAhsMw2rnzKRXc6Fa7VeP.jpg', 0.00, 'This is red t-shirt category description', 'red-t-shirt', '', '', '', 1, NULL, '2021-09-10 10:27:08'),
(3, 0, 2, 'Tops', '', 0.00, 'This is  tops category description', 'tops', '', '', '', 1, NULL, '2021-09-10 10:23:41'),
(4, 3, 2, 'Red Tops', '', 0.00, '', 'red-tops', '', '', '', 1, '2021-08-31 05:40:22', '2021-09-08 08:40:19'),
(5, 0, 3, 'Toys', '', 0.00, 'This  is toys category description', 'toys', '', '', '', 1, NULL, '2021-09-10 10:24:15'),
(11, 5, 3, 'Jet Figher', '', 0.00, '', 'jet-fighter', '', '', '', 1, NULL, '2021-09-11 02:58:10'),
(12, 0, 1, 'Watch', '', 0.00, '', 'watch', '', '', '', 1, '2021-09-08 06:52:09', '2021-09-08 06:52:09'),
(13, 3, 2, 'Blue Tops', '', 0.00, '', 'blue-tops', '', '', '', 1, '2021-09-08 06:52:26', '2021-09-08 08:43:51'),
(14, 5, 3, 'Car', '', 0.00, '', 'car', '', '', '', 1, '2021-09-08 06:52:48', '2021-09-11 02:58:32'),
(15, 1, 1, 'Blue T-Shirt', '', 0.00, '', 'blue-t-shirt', '', '', '', 1, '2021-09-08 06:53:05', '2021-09-08 06:53:05'),
(16, 14, 3, 'Red Car', '', 0.00, '', 'red-cars', '', '', '', 1, '2021-09-08 08:49:49', '2021-09-08 08:49:49'),
(17, 14, 3, 'Blue Car', '', 0.00, '', 'blue-car', '', '', '', 1, '2021-09-10 07:58:39', '2021-09-11 02:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 1),
(2, 'AL', 'Albania', 1),
(3, 'DZ', 'Algeria', 1),
(4, 'DS', 'American Samoa', 1),
(5, 'AD', 'Andorra', 1),
(6, 'AO', 'Angola', 1),
(7, 'AI', 'Anguilla', 1),
(8, 'AQ', 'Antarctica', 1),
(9, 'AG', 'Antigua and Barbuda', 1),
(10, 'AR', 'Argentina', 1),
(11, 'AM', 'Armenia', 1),
(12, 'AW', 'Aruba', 1),
(13, 'AU', 'Australia', 1),
(14, 'AT', 'Austria', 1),
(15, 'AZ', 'Azerbaijan', 1),
(16, 'BS', 'Bahamas', 1),
(17, 'BH', 'Bahrain', 1),
(18, 'BD', 'Bangladesh', 1),
(19, 'BB', 'Barbados', 1),
(20, 'BY', 'Belarus', 1),
(21, 'BE', 'Belgium', 1),
(22, 'BZ', 'Belize', 1),
(23, 'BJ', 'Benin', 1),
(24, 'BM', 'Bermuda', 1),
(25, 'BT', 'Bhutan', 1),
(26, 'BO', 'Bolivia', 1),
(27, 'BA', 'Bosnia and Herzegovina', 1),
(28, 'BW', 'Botswana', 1),
(29, 'BV', 'Bouvet Island', 1),
(30, 'BR', 'Brazil', 1),
(31, 'IO', 'British Indian Ocean Territory', 1),
(32, 'BN', 'Brunei Darussalam', 1),
(33, 'BG', 'Bulgaria', 1),
(34, 'BF', 'Burkina Faso', 1),
(35, 'BI', 'Burundi', 1),
(36, 'KH', 'Cambodia', 1),
(37, 'CM', 'Cameroon', 1),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 1),
(40, 'KY', 'Cayman Islands', 1),
(41, 'CF', 'Central African Republic', 1),
(42, 'TD', 'Chad', 1),
(43, 'CL', 'Chile', 1),
(44, 'CN', 'China', 1),
(45, 'CX', 'Christmas Island', 1),
(46, 'CC', 'Cocos (Keeling) Islands', 1),
(47, 'CO', 'Colombia', 1),
(48, 'KM', 'Comoros', 1),
(49, 'CD', 'Democratic Republic of the Congo', 1),
(50, 'CG', 'Republic of Congo', 1),
(51, 'CK', 'Cook Islands', 1),
(52, 'CR', 'Costa Rica', 1),
(53, 'HR', 'Croatia (Hrvatska)', 1),
(54, 'CU', 'Cuba', 1),
(55, 'CY', 'Cyprus', 1),
(56, 'CZ', 'Czech Republic', 1),
(57, 'DK', 'Denmark', 1),
(58, 'DJ', 'Djibouti', 1),
(59, 'DM', 'Dominica', 1),
(60, 'DO', 'Dominican Republic', 1),
(61, 'TP', 'East Timor', 1),
(62, 'EC', 'Ecuador', 1),
(63, 'EG', 'Egypt', 1),
(64, 'SV', 'El Salvador', 1),
(65, 'GQ', 'Equatorial Guinea', 1),
(66, 'ER', 'Eritrea', 1),
(67, 'EE', 'Estonia', 1),
(68, 'ET', 'Ethiopia', 1),
(69, 'FK', 'Falkland Islands (Malvinas)', 1),
(70, 'FO', 'Faroe Islands', 1),
(71, 'FJ', 'Fiji', 1),
(72, 'FI', 'Finland', 1),
(73, 'FR', 'France', 1),
(74, 'FX', 'France, Metropolitan', 1),
(75, 'GF', 'French Guiana', 1),
(76, 'PF', 'French Polynesia', 1),
(77, 'TF', 'French Southern Territories', 1),
(78, 'GA', 'Gabon', 1),
(79, 'GM', 'Gambia', 1),
(80, 'GE', 'Georgia', 1),
(81, 'DE', 'Germany', 1),
(82, 'GH', 'Ghana', 1),
(83, 'GI', 'Gibraltar', 1),
(84, 'GK', 'Guernsey', 1),
(85, 'GR', 'Greece', 1),
(86, 'GL', 'Greenland', 1),
(87, 'GD', 'Grenada', 1),
(88, 'GP', 'Guadeloupe', 1),
(89, 'GU', 'Guam', 1),
(90, 'GT', 'Guatemala', 1),
(91, 'GN', 'Guinea', 1),
(92, 'GW', 'Guinea-Bissau', 1),
(93, 'GY', 'Guyana', 1),
(94, 'HT', 'Haiti', 1),
(95, 'HM', 'Heard and Mc Donald Islands', 1),
(96, 'HN', 'Honduras', 1),
(97, 'HK', 'Hong Kong', 1),
(98, 'HU', 'Hungary', 1),
(99, 'IS', 'Iceland', 1),
(100, 'IN', 'India', 1),
(101, 'IM', 'Isle of Man', 1),
(102, 'ID', 'Indonesia', 1),
(103, 'IR', 'Iran (Islamic Republic of)', 1),
(104, 'IQ', 'Iraq', 1),
(105, 'IE', 'Ireland', 1),
(106, 'IL', 'Israel', 1),
(107, 'IT', 'Italy', 1),
(108, 'CI', 'Ivory Coast', 1),
(109, 'JE', 'Jersey', 1),
(110, 'JM', 'Jamaica', 1),
(111, 'JP', 'Japan', 1),
(112, 'JO', 'Jordan', 1),
(113, 'KZ', 'Kazakhstan', 1),
(114, 'KE', 'Kenya', 1),
(115, 'KI', 'Kiribati', 1),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1),
(117, 'KR', 'Korea, Republic of', 1),
(118, 'XK', 'Kosovo', 1),
(119, 'KW', 'Kuwait', 1),
(120, 'KG', 'Kyrgyzstan', 1),
(121, 'LA', 'Lao People\'s Democratic Republic', 1),
(122, 'LV', 'Latvia', 1),
(123, 'LB', 'Lebanon', 1),
(124, 'LS', 'Lesotho', 1),
(125, 'LR', 'Liberia', 1),
(126, 'LY', 'Libyan Arab Jamahiriya', 1),
(127, 'LI', 'Liechtenstein', 1),
(128, 'LT', 'Lithuania', 1),
(129, 'LU', 'Luxembourg', 1),
(130, 'MO', 'Macau', 1),
(131, 'MK', 'North Macedonia', 1),
(132, 'MG', 'Madagascar', 1),
(133, 'MW', 'Malawi', 1),
(134, 'MY', 'Malaysia', 1),
(135, 'MV', 'Maldives', 1),
(136, 'ML', 'Mali', 1),
(137, 'MT', 'Malta', 1),
(138, 'MH', 'Marshall Islands', 1),
(139, 'MQ', 'Martinique', 1),
(140, 'MR', 'Mauritania', 1),
(141, 'MU', 'Mauritius', 1),
(142, 'TY', 'Mayotte', 1),
(143, 'MX', 'Mexico', 1),
(144, 'FM', 'Micronesia, Federated States of', 1),
(145, 'MD', 'Moldova, Republic of', 1),
(146, 'MC', 'Monaco', 1),
(147, 'MN', 'Mongolia', 1),
(148, 'ME', 'Montenegro', 1),
(149, 'MS', 'Montserrat', 1),
(150, 'MA', 'Morocco', 1),
(151, 'MZ', 'Mozambique', 1),
(152, 'MM', 'Myanmar', 1),
(153, 'NA', 'Namibia', 1),
(154, 'NR', 'Nauru', 1),
(155, 'NP', 'Nepal', 1),
(156, 'NL', 'Netherlands', 1),
(157, 'AN', 'Netherlands Antilles', 1),
(158, 'NC', 'New Caledonia', 1),
(159, 'NZ', 'New Zealand', 1),
(160, 'NI', 'Nicaragua', 1),
(161, 'NE', 'Niger', 1),
(162, 'NG', 'Nigeria', 1),
(163, 'NU', 'Niue', 1),
(164, 'NF', 'Norfolk Island', 1),
(165, 'MP', 'Northern Mariana Islands', 1),
(166, 'NO', 'Norway', 1),
(167, 'OM', 'Oman', 1),
(168, 'PK', 'Pakistan', 1),
(169, 'PW', 'Palau', 1),
(170, 'PS', 'Palestine', 1),
(171, 'PA', 'Panama', 1),
(172, 'PG', 'Papua New Guinea', 1),
(173, 'PY', 'Paraguay', 1),
(174, 'PE', 'Peru', 1),
(175, 'PH', 'Philippines', 1),
(176, 'PN', 'Pitcairn', 1),
(177, 'PL', 'Poland', 1),
(178, 'PT', 'Portugal', 1),
(179, 'PR', 'Puerto Rico', 1),
(180, 'QA', 'Qatar', 1),
(181, 'RE', 'Reunion', 1),
(182, 'RO', 'Romania', 1),
(183, 'RU', 'Russian Federation', 1),
(184, 'RW', 'Rwanda', 1),
(185, 'KN', 'Saint Kitts and Nevis', 1),
(186, 'LC', 'Saint Lucia', 1),
(187, 'VC', 'Saint Vincent and the Grenadines', 1),
(188, 'WS', 'Samoa', 1),
(189, 'SM', 'San Marino', 1),
(190, 'ST', 'Sao Tome and Principe', 1),
(191, 'SA', 'Saudi Arabia', 1),
(192, 'SN', 'Senegal', 1),
(193, 'RS', 'Serbia', 1),
(194, 'SC', 'Seychelles', 1),
(195, 'SL', 'Sierra Leone', 1),
(196, 'SG', 'Singapore', 1),
(197, 'SK', 'Slovakia', 1),
(198, 'SI', 'Slovenia', 1),
(199, 'SB', 'Solomon Islands', 1),
(200, 'SO', 'Somalia', 1),
(201, 'ZA', 'South Africa', 1),
(202, 'GS', 'South Georgia South Sandwich Islands', 1),
(203, 'SS', 'South Sudan', 1),
(204, 'ES', 'Spain', 1),
(205, 'LK', 'Sri Lanka', 1),
(206, 'SH', 'St. Helena', 1),
(207, 'PM', 'St. Pierre and Miquelon', 1),
(208, 'SD', 'Sudan', 1),
(209, 'SR', 'Suriname', 1),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1),
(211, 'SZ', 'Swaziland', 1),
(212, 'SE', 'Sweden', 1),
(213, 'CH', 'Switzerland', 1),
(214, 'SY', 'Syrian Arab Republic', 1),
(215, 'TW', 'Taiwan', 1),
(216, 'TJ', 'Tajikistan', 1),
(217, 'TZ', 'Tanzania, United Republic of', 1),
(218, 'TH', 'Thailand', 1),
(219, 'TG', 'Togo', 1),
(220, 'TK', 'Tokelau', 1),
(221, 'TO', 'Tonga', 1),
(222, 'TT', 'Trinidad and Tobago', 1),
(223, 'TN', 'Tunisia', 1),
(224, 'TR', 'Turkey', 1),
(225, 'TM', 'Turkmenistan', 1),
(226, 'TC', 'Turks and Caicos Islands', 1),
(227, 'TV', 'Tuvalu', 1),
(228, 'UG', 'Uganda', 1),
(229, 'UA', 'Ukraine', 1),
(230, 'AE', 'United Arab Emirates', 1),
(231, 'GB', 'United Kingdom', 1),
(232, 'US', 'United States', 1),
(233, 'UM', 'United States minor outlying islands', 1),
(234, 'UY', 'Uruguay', 1),
(235, 'UZ', 'Uzbekistan', 1),
(236, 'VU', 'Vanuatu', 1),
(237, 'VA', 'Vatican City State', 1),
(238, 'VE', 'Venezuela', 1),
(239, 'VN', 'Vietnam', 1),
(240, 'VG', 'Virgin Islands (British)', 1),
(241, 'VI', 'Virgin Islands (U.S.)', 1),
(242, 'WF', 'Wallis and Futuna Islands', 1),
(243, 'EH', 'Western Sahara', 1),
(244, 'YE', 'Yemen', 1),
(245, 'ZM', 'Zambia', 1),
(246, 'ZW', 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `categories`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'automatic', 'UWecwpX0', '11,14', 'mortuza@yopmail.com', 'Mutiple', 'Percentage', 20.00, '2021-10-05', 1, '2021-10-04 06:00:57', '2021-10-05 06:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_08_16_141128_create_admins_table', 1),
(6, '2021_08_16_141231_create_sections_table', 1),
(7, '2021_08_16_142049_create_categories_table', 1),
(8, '2021_08_20_060909_create_products_table', 1),
(9, '2021_08_31_141712_create_brands_table', 2),
(10, '2021_09_01_155410_create_product_attributes_table', 3),
(11, '2021_09_01_191426_create_product_images_table', 4),
(13, '2021_09_09_063515_create_banners_table', 5),
(15, '2021_09_17_081634_create_carts_table', 6),
(21, '2021_09_26_103351_add_column_to_users_table', 7),
(23, '2021_10_01_105320_create_coupons_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_weight` double(8,2) NOT NULL,
  `product_discount` double(8,2) NOT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sleeve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occasion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_feature` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `section_id`, `category_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_weight`, `product_discount`, `main_image`, `product_video`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occasion`, `meta_title`, `meta_keywords`, `meta_description`, `is_feature`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Red T-Shirt', 'FBR15', 'red', 600.00, 0.00, 10.00, '28390434.jpg', '3439.3gp', 'This is simple product description', 'wash careing', 'Poleaster', 'Plan', 'Sleeveless', 'Regular', 'Formal', 'rtyrhy67ujh7y', 'jfljntrdkgvtr', 'fdgvrktjdgjt', 'yes', 1, NULL, '2021-09-17 21:37:08'),
(3, 2, 3, 2, 'Red Tops', 'CaT12', 'black', 12500.00, 0.00, 0.00, '59587933.jpg', '42737.3gp', 'This is T-shirt Product Description', 'dfghfgjhgj', 'Coton', 'Plan', 'Short Sleeve', 'Slim', 'Formal', 'fdfcjdihgv', 'hfyhtyjuyji', 'joljhoihoijhnoliy', 'yes', 1, '2021-08-31 05:42:01', '2021-09-15 08:36:00'),
(4, 2, 4, 1, 'Blue tops', 'FT15', 'white', 1500.00, 0.00, 0.00, '47810994.jpg', '28111.3gp', 'This is T-shirt Product Description', 'lsdjfoheriog', 'Merble', 'Solid', 'Half Sleeve', 'Slim', 'Casual', 'tfhtyijiuy', 'trfgyhtujy', 'etgfrdyhth', 'yes', 1, '2021-08-31 05:54:30', '2021-09-12 05:48:02'),
(5, 2, 3, 2, 'Casual Tops', 'CT255', 'white', 255.00, 0.00, 10.00, '45604769.jpg', '40648.3gp', 'This is Tops Product Description', 'machine wash care', 'fiber', 'Plan', 'Full Sleeve', 'Slim', 'Casual', 'calsual tops', 'casual tops', 'white casual tops', 'yes', 1, '2021-08-31 06:40:01', '2021-09-15 05:21:02'),
(6, 1, 12, 1, 'Blue Watch', 'B001NT', 'Blue', 1500.00, 0.00, 10.00, '92685104.jpg', '', 'This is simple product description', '', 'Merble', '', 'Full Sleeve', '', '', '', '', '', 'yes', 1, NULL, '2021-09-12 05:48:17'),
(8, 3, 5, 3, 'Jet Fighter', 'R24', 'red', 1200.00, 0.00, 0.00, '34287955.jpg', '85268.3gp', 'This is T-shirt Product Description', 'machine wash', 'fiber', 'Check', 'Half Sleeve', 'Regular', 'Formal', 'machine wash', 'machine wash', 'machine wash', 'yes', 1, '2021-09-02 04:31:56', '2021-09-12 05:48:24'),
(9, 3, 14, 4, 'Red Care Marchidis', 'RedM54', 'red', 2500.00, 0.00, 0.00, '85798748.jpg', '20804.3gp', '', '', 'Poleaster', '', '', '', '', '', '', '', 'yes', 1, '2021-09-08 08:50:54', '2021-09-13 04:29:01'),
(10, 1, 1, 5, 'Blue T-Shirt', 'BLJ5', 'blue', 1545.00, 0.00, 0.00, '87036800.jpg', '72442.3gp', '', '', 'fiber', '', 'Short Sleeve', '', '', '', '', '', 'yes', 1, '2021-09-08 08:52:38', '2021-09-12 05:48:37'),
(11, 3, 11, 3, 'Casual T-Shirt', 'CTP12', 'pink', 1250.00, 0.00, 10.00, '20836397.jpg', '43887.3gp', 'machine washmachine wash', 'machine wash', 'Poleaster', 'Plan', 'Short Sleeve', 'Regular', 'Formal', 'machine wash', 'machine wash', 'machine wash', 'yes', 1, '2021-09-10 08:53:58', '2021-09-12 05:48:45'),
(12, 3, 5, 4, 'Baby Pump', 'KKKEI', 'pink', 524.00, 0.00, 0.00, '9624523.PNG', '8275.3gp', 'yes cate', 'yes cate', 'Poleaster', 'Check', 'Sleeveless', 'Medium', 'Regular', 'yes cate', 'yes cate', 'yes cate', 'yes', 1, '2021-09-11 03:02:35', '2021-09-11 03:02:35'),
(13, 1, 1, 2, 'gdfrtyhtuh', '847684', 'dfgfh', 656.00, 0.00, 0.00, '51764727.jpg', '57349.3gp', '', '', 'Merble', '', '', '', '', '', '', '', 'no', 1, '2021-09-13 04:41:13', '2021-09-12 05:31:04'),
(14, 1, 1, 2, 'fdgfhdyrfjhytj', '89638fthty', 'fdgfh', 896.00, 0.00, 0.00, '33856758.jpg', '82863.3gp', '', '', 'Poleaster', 'Check', 'Sleeveless', 'Slim', 'Formal', '', '', '', 'no', 1, '2021-09-12 07:28:16', '2021-09-12 07:28:16'),
(15, 1, 1, 4, 'sdfergrg', '785gfhb', 'dfghfrth', 7858.00, 0.00, 0.00, '30617240.jpg', '4710.3gp', '', '', 'Merble', 'Printed', 'Half Sleeve', 'Regular', 'Casual', '', '', '', 'no', 1, '2021-09-12 07:29:05', '2021-09-12 07:29:05'),
(16, 1, 1, 5, 'rtyhtujhy', '563hjh', 'dfhgrtfh', 56.00, 0.00, 0.00, '80240056.jpg', '60182.3gp', '', '', 'fiber', 'Check', 'Full Sleeve', 'Large', 'Regular', '', '', '', 'no', 1, '2021-09-12 07:30:00', '2021-09-12 07:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `price`, `stock`, `size`, `sku`, `created_at`, `updated_at`) VALUES
(4, 3, 12500, 15, 'SAMLL-X', 'SAMLL-X', '2021-09-01 11:04:47', '2021-09-01 11:04:47'),
(5, 3, 14000, 35, 'MEDIUM-X', 'MEDIUM-X', '2021-09-01 11:04:47', '2021-09-01 11:04:47'),
(6, 3, 5700, 18, 'LARGE-X', 'LARGE-X', '2021-09-01 11:04:47', '2021-09-01 11:04:47'),
(7, 7, 400, 10, 'small', 'SM-1', '2021-09-01 11:06:54', '2021-09-01 13:16:07'),
(8, 7, 200, 15, 'medium', 'MD-1', '2021-09-01 11:06:54', '2021-09-01 13:16:08'),
(9, 7, 300, 20, 'large', 'LG-1', '2021-09-01 11:06:55', '2021-09-01 13:16:08'),
(11, 6, 1500, 2, 'small', 'Sm1', '2021-09-01 12:12:22', '2021-09-17 21:30:53'),
(12, 6, 1600, 17, 'medium', 'Md1', '2021-09-01 12:12:22', '2021-09-17 21:30:54'),
(13, 1, 600, 0, 'small', 'KDHI565', '2021-09-15 05:54:24', '2021-09-15 05:54:24'),
(14, 1, 700, 5, 'medium', 'JIOE554', '2021-09-15 05:54:24', '2021-09-15 05:54:24'),
(15, 1, 800, 25, 'large', 'HEIUH54', '2021-09-15 05:54:24', '2021-09-15 05:54:24'),
(16, 5, 255, 3, 'small', 'EFIJJK65', '2021-09-17 21:31:37', '2021-09-17 21:31:37'),
(17, 8, 1200, 10, 'small', 'DIEFJ', '2021-09-17 21:32:07', '2021-09-17 21:32:07'),
(18, 9, 2500, 15, 'medium', 'HDJD', '2021-09-17 21:32:38', '2021-09-17 21:32:38'),
(19, 10, 1545, 16, 'large', 'DEEK', '2021-09-17 21:33:10', '2021-09-17 21:33:10'),
(20, 11, 1250, 20, 'small', 'LJOIE', '2021-09-17 21:33:28', '2021-09-17 21:33:28'),
(21, 12, 524, 25, 'medium', 'KEJI', '2021-09-17 21:33:51', '2021-09-17 21:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `main_image`, `status`, `created_at`, `updated_at`) VALUES
(13, 7, '31819448.jpeg', 1, '2021-09-02 05:59:11', '2021-09-02 05:59:11'),
(14, 7, '81667083.jpg', 1, '2021-09-02 05:59:12', '2021-09-02 05:59:12'),
(15, 7, '54168768.jpg', 1, '2021-09-02 05:59:12', '2021-09-02 05:59:12'),
(35, 1, '93331521.jpg', 1, '2021-09-08 10:39:58', '2021-09-08 10:39:58'),
(36, 1, '95229385.jpg', 1, '2021-09-08 10:39:58', '2021-09-08 10:39:58'),
(37, 1, '19119431.jpg', 1, '2021-09-08 10:39:58', '2021-09-08 10:39:58'),
(38, 3, '39364984.jpg', 1, '2021-09-08 10:40:49', '2021-09-08 10:40:49'),
(39, 3, '21648139.jpg', 1, '2021-09-08 10:40:49', '2021-09-08 10:40:49'),
(40, 4, '78957283.jpg', 1, '2021-09-08 10:41:37', '2021-09-08 10:41:37'),
(41, 4, '29362700.jpg', 1, '2021-09-08 10:41:38', '2021-09-08 10:41:38'),
(42, 5, '74031431.jpg', 1, '2021-09-08 10:42:15', '2021-09-08 10:42:15'),
(43, 5, '42666624.jpg', 1, '2021-09-08 10:42:15', '2021-09-08 10:42:15'),
(44, 6, '48259852.jpg', 1, '2021-09-08 10:43:04', '2021-09-08 10:43:04'),
(45, 6, '20284231.jpg', 1, '2021-09-08 10:43:04', '2021-09-08 10:43:04'),
(46, 8, '61375046.jpg', 1, '2021-09-08 10:43:39', '2021-09-08 10:43:39'),
(47, 8, '46298273.jpg', 1, '2021-09-08 10:43:39', '2021-09-08 10:43:39'),
(48, 9, '14527262.jpg', 1, '2021-09-08 10:44:20', '2021-09-08 10:44:20'),
(49, 9, '28209189.jpg', 1, '2021-09-08 10:44:20', '2021-09-08 10:44:20'),
(51, 10, '8863139.jpg', 1, '2021-09-08 10:44:59', '2021-09-08 10:44:59'),
(52, 10, '37022342.jpg', 1, '2021-09-08 10:45:15', '2021-09-08 10:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, NULL, '2021-09-07 11:29:34'),
(2, 'Women', 1, NULL, NULL),
(3, 'Kids', 1, NULL, '2021-09-07 11:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `country`, `city`, `address`, `email`, `email_verified_at`, `password`, `status`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(18, 'Mortuza', '01234567890', 'Bangladesh', 'Dhaka', 'Mohammadpur', 'mortuza@yopmail.com', NULL, '$2y$10$qURkOcDPP6owB0Qw3S8/0.SsG1ubLG8IignP0OKOdpIBr5OJKbEzK', 1, NULL, NULL, NULL, NULL, NULL, '2021-09-30 01:27:38', '2021-09-30 03:44:23'),
(19, 'Roni', '01234567890', '', '', '', 'roni@gmail.com', NULL, '$2y$10$nxbTKkpIfSPkWKXH6fdpcu6A9Jb7MAePwLzxDWQ9A1AkZxhZpqtSi', 1, NULL, NULL, NULL, NULL, NULL, '2021-10-15 10:02:47', '2021-10-15 10:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
