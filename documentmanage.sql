-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 12, 2024 lúc 08:16 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `haotest`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `Country`, `city`, `created_at`, `updated_at`) VALUES
(4, '2', 'Hà Nội', '2023-07-13 19:14:02', '2023-07-13 19:19:08'),
(5, '2', 'Nghệ An', '2023-07-13 19:18:58', '2023-07-13 19:18:58'),
(6, '2', 'Hà Tĩnh', '2023-07-13 19:19:28', '2023-07-13 19:19:28'),
(7, '3', 'Bắc Chungcheong', '2023-07-13 19:20:24', '2023-07-13 19:20:24'),
(8, '3', 'Gangwon', '2023-07-13 19:20:44', '2023-07-13 19:20:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `thumb` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quanity` int NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `thumb`, `nameProduct`, `price`, `quanity`, `subtotal`, `product_id`, `created_at`, `updated_at`) VALUES
(21, 'extra-virgin-olive-oil-cold-processed-mediterranean-blend-1.jpg', 'Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend', 54.00, 7, 108.00, 1, '2023-07-28 00:04:22', '2023-07-30 21:33:40'),
(22, 'nuoc-hoa-1.jpg', 'nước hoa', 32.00, 1, 32.00, 2, '2023-07-28 00:04:46', '2023-07-28 00:04:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate`
--

CREATE TABLE `cate` (
  `id` bigint UNSIGNED NOT NULL,
  `CateName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cate`
--

INSERT INTO `cate` (`id`, `CateName`, `active`, `desc`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Food & Drink', 1, 'Food & Drink', 'food-drink', '2023-07-02 21:47:06', '2023-07-02 21:47:06'),
(2, 'sadfasdf', 0, 'ádfsadf', 'sadfasdf', NULL, '2023-07-04 08:19:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Việt Nam', '2023-07-13 18:53:41', '2023-07-13 18:53:41'),
(3, 'Hàn Quốc', '2023-07-13 19:13:12', '2023-07-13 19:13:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(2, 'gnfnfh', 0, 'fghfgmj', '', 'jfjff', 0, '2023-06-26 19:40:25', '2023-06-26 19:40:25'),
(3, 'ther con', 1, 'rfgefh', '', 'eh', 0, '2023-06-26 21:02:33', '2023-06-26 21:02:33'),
(4, 'heheheeh', 0, 'hshshshssh', '', 'hshshshssh', 1, '2023-06-26 21:30:20', '2023-06-26 21:30:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_23_033526_create_menus_table', 2),
(6, '2023_06_28_021530_create_products_table', 3),
(7, '2023_06_28_025014_create_admin_products_table', 4),
(8, '2023_06_28_031257_create_products_table', 5),
(9, '2023_07_02_144406_edit_tintuc_table', 6),
(10, '2023_07_02_144712_edit_tintuc_table', 7),
(11, '2023_07_02_144817_edit_tintuc_table', 8),
(12, '2023_07_02_145552_create_admin_products_table', 9),
(13, '2023_07_02_150137_create_products_table', 10),
(14, '2023_07_02_150424_create_products_table', 11),
(15, '2023_07_02_150509_create_products_table', 12),
(16, '2023_07_03_021556_create_cate_table', 13),
(17, '2023_07_03_043953_create_cates_table', 14),
(18, '2023_07_03_044434_create_products_table', 15),
(19, '2023_07_04_033859_update_product_id', 16),
(20, '2023_07_04_024959_create_addresses_table', 17),
(21, '2023_07_04_041626_update_product_id2', 18),
(22, '2023_07_04_151555_update_cate_id', 19),
(23, '2023_07_04_191057_update_address_id2', 20),
(24, '2023_07_05_013752_create_carts_table', 21),
(25, '2023_07_05_022116_remove_address_id_from_cart', 22),
(26, '2023_07_06_192016_create_countries_table', 23),
(27, '2023_07_07_011459_update_address', 24),
(28, '2023_07_14_025819_update_address2', 25),
(29, '2023_07_17_025738_create_vouchers_table', 26),
(30, '2023_07_17_041932_update_voucher', 27),
(31, '2023_07_17_042626_update_voucher2', 28),
(32, '2023_07_17_043742_update_voucher3', 29),
(33, '2023_07_18_032115_update_voucher4', 30),
(34, '2023_07_29_135300_create_orders_table', 31),
(35, '2023_07_29_142956_create_orders_table', 32),
(36, '2023_07_29_162223_create_orders_table', 33),
(37, '2023_07_29_162523_add_column_order', 34),
(38, '2023_07_30_141323_create_orders_table', 35),
(39, '2023_07_30_141737_create_orders_table', 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `userID` bigint UNSIGNED DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_add` longtext COLLATE utf8mb4_unicode_ci,
  `street_add2` longtext COLLATE utf8mb4_unicode_ci,
  `town` text COLLATE utf8mb4_unicode_ci,
  `state` text COLLATE utf8mb4_unicode_ci,
  `zip` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `product` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipType` text COLLATE utf8mb4_unicode_ci,
  `payMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canceled` blob,
  `paid` blob,
  `payDate` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `userID`, `firstName`, `lastName`, `company`, `country`, `street_add`, `street_add2`, `town`, `state`, `zip`, `phone`, `email`, `product`, `shipType`, `payMethod`, `total`, `orderDate`, `status`, `canceled`, `paid`, `payDate`, `created_at`, `updated_at`) VALUES
(9, NULL, 'Phan Duy', 'Hào', 'Sudo', '2', 'P268, P639, Toà nhà Vân Nam Building, 26 Đường Láng, HN (Trụ Sở Chính)', NULL, 'Cầu Giấy', 'Hà Nội', '23432', '0904848855', 'admin@gmail.com', '[{\"name\":\"Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend x 4\",\"price\":\"$216.00\"},{\"name\":\"n\\u01b0\\u1edbc hoa x 1\",\"price\":\"$32.00\"}]', 'flat_rate', 'internet_bank', NULL, NULL, 'Processing', NULL, NULL, NULL, '2023-07-30 19:01:26', '2023-07-30 19:01:26'),
(10, NULL, 'Phan Duy', 'Hào', 'Sudo', '2', 'P268, P639, Toà nhà Vân Nam Building, 26 Đường Láng, HN (Trụ Sở Chính)', NULL, 'Cầu Giấy', 'Hà Nội', '23432', '0904848855', 'admin@gmail.com', '[{\"name\":\"Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend x 4\",\"price\":\"$216.00\"},{\"name\":\"n\\u01b0\\u1edbc hoa x 1\",\"price\":\"$32.00\"}]', 'flat_rate', 'internet_bank', NULL, NULL, 'Processing', NULL, NULL, NULL, '2023-07-30 19:02:51', '2023-07-30 19:02:51'),
(11, NULL, 'Phan Duy', 'Hào', 'Sudo', '2', 'P268, P639, Toà nhà Vân Nam Building, 26 Đường Láng, HN (Trụ Sở Chính)', NULL, 'Cầu Giấy', 'Hà Nội', '23432', '0904848855', 'admin@gmail.com', '[{\"name\":\"Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend x 4\",\"price\":\"$216.00\"},{\"name\":\"n\\u01b0\\u1edbc hoa x 1\",\"price\":\"$32.00\"}]', 'flat_rate', 'cash_delivery', NULL, NULL, 'Processing', NULL, NULL, NULL, '2023-07-30 19:07:40', '2023-07-30 19:07:40'),
(12, NULL, 'Phan Duy', 'Hào', 'Sudo', '2', 'P268, P639, Toà nhà Vân Nam Building, 26 Đường Láng, HN (Trụ Sở Chính)', NULL, 'Cầu Giấy', 'Hà Nội', '23432', '0904848855', 'admin@gmail.com', '[{\"name\":\"Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend x 4\",\"price\":\"$216.00\"},{\"name\":\"n\\u01b0\\u1edbc hoa x 1\",\"price\":\"$32.00\"}]', 'flat_rate', 'Domestic ATM card/Internet Banking (Free of charge)', NULL, NULL, 'Processing', NULL, NULL, NULL, '2023-07-30 19:09:06', '2023-07-30 19:09:06'),
(13, NULL, 'Phan Duy', 'Hào', 'Sudo', '2', 'P268, P639, Toà nhà Vân Nam Building, 26 Đường Láng, HN (Trụ Sở Chính)', NULL, 'Cầu Giấy', 'Hà Nội', '23432', '0904848855', 'admin@gmail.com', '[{\"name\":\"Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend x 4\",\"price\":\"$216.00\"},{\"name\":\"n\\u01b0\\u1edbc hoa x 1\",\"price\":\"$32.00\"}]', 'flat_rate', 'Domestic ATM card/Internet Banking (Free of charge)', NULL, NULL, 'Processing', NULL, NULL, NULL, '2023-07-30 19:13:45', '2023-07-30 19:13:45'),
(14, NULL, 'Phan Duy', 'Hào', 'Sudo', '2', 'P268, P639, Toà nhà Vân Nam Building, 26 Đường Láng, HN (Trụ Sở Chính)', NULL, 'Cầu Giấy', 'Hà Nội', '23432', '0904848855', 'admin@gmail.com', '[]', 'flat_rate', 'Domestic ATM card/Internet Banking (Free of charge)', NULL, NULL, 'Processing', NULL, NULL, NULL, '2023-07-30 19:21:32', '2023-07-30 19:21:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `ishot` int NOT NULL,
  `isnewfeed` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `Title`, `thumb`, `cate_id`, `description`, `content`, `price`, `discount`, `slug`, `active`, `ishot`, `isnewfeed`, `created_at`, `updated_at`) VALUES
(1, 'Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend', '[\"extra-virgin-olive-oil-cold-processed-mediterranean-blend-1.jpg\",\"extra-virgin-olive-oil-cold-processed-mediterranean-blend-2.jpg\",\"extra-virgin-olive-oil-cold-processed-mediterranean-blend-3.jpg\",\"extra-virgin-olive-oil-cold-processed-mediterranean-blend-4.jpg\"]', 1, 'Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend', '<div class=\"flex-center-between\">\n<div class=\"flex-column text\">\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n\n<ul>\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</li>\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</li>\n	<li>Lorem ipsum dolor sit amet, consectetur</li>\n</ul>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n</div>\n\n<div class=\"image\"><img alt=\"\" src=\"/temp/images/shop-details/Bitmap (2).jpg\" /></div>\n</div>', 65.00, 54.00, 'extra-virgin-olive-oil-cold-processed-mediterranean-blend', 0, 0, 0, '2023-07-03 08:04:14', '2023-07-03 08:58:12'),
(2, 'nước hoa', '[\"nuoc-hoa-1.jpg\",\"nuoc-hoa-2.jpg\"]', 2, 'nước hoa', '<p>sdfsdf</p>', 352.00, 32.00, 'nc-hoa', 0, 0, 0, '2023-07-03 10:26:59', '2023-07-03 10:26:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$P.59diOwVwh17TKgA4yMA.JzrzrPuP/zKZKPIm2AhhAEMYaxjdYXO', 'GFfkWDTSsozgmETMxsj453QaaGHPx7WKvnrwp5WbPz0WQfLOfitERwxtD3Ys', '2023-06-22 02:06:08', '2023-06-22 02:06:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `codeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `price` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `codeName`, `type`, `created_at`, `updated_at`, `content`, `price`) VALUES
(11, 'voucher-09', 'định giá', '2023-07-17 19:16:27', '2023-07-17 20:45:14', 'giảm 30k', '30k'),
(12, 'voucher-01', 'theo %', '2023-07-17 20:45:32', '2023-07-17 20:45:32', 'giảm 10%', '10%');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userID`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `cate`
--
ALTER TABLE `cate`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cate` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
