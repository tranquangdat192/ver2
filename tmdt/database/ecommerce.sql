-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2018 lúc 05:47 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('Footer','Product','Detail') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Footer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `company`, `position`, `created_at`, `updated_at`) VALUES
(1, 'banner/rd3Dam39K0LMrpTv3i558mji6Esjhbl83y27aoa2.png', 'Micro', 'Footer', '2018-11-06 21:17:41', '2018-11-06 21:17:41'),
(2, 'banner/cOTsqXPnTHH91n4UP42vetjm2qiRRKZBNZaFOy47.png', 'Trimscape', 'Footer', '2018-11-06 21:18:39', '2018-11-06 21:18:39'),
(3, 'banner/i29xppnhIuO5CojY32QWFUBjWbjkfcNHH7ai7iBi.png', 'Jasmine', 'Footer', '2018-11-06 21:18:59', '2018-11-06 21:18:59'),
(4, 'banner/aYj43bgaDRtXL1fRlqXoeNk50dA3lc5cOrPH2EwB.png', 'Data Entry', 'Footer', '2018-11-06 21:19:25', '2018-11-06 21:19:25'),
(5, 'banner/w3Pc3HGJGS1UnkwnjmMXpeu0uPQi0cuXcSXSjB5o.png', 'Tricefy', 'Footer', '2018-11-06 21:19:43', '2018-11-06 21:19:43'),
(6, 'banner/xDFEwVL0msLloD9eFtKNpTbI7XygTKqZ3fEKtUSn.png', 'Vccorp', 'Footer', '2018-11-06 21:20:02', '2018-11-06 21:20:02'),
(7, 'banner/fJZv7j0bW3cFzmt3vlwXOUENbjSApxAf0C5nYySi.jpeg', 'Roll', 'Product', '2018-11-06 21:21:02', '2018-11-06 21:21:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Apple (iPhone)', 'apple-iphone', 1, '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(2, 'Samsung', 'samsung', 1, '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(3, 'Huawei', 'huawei', 1, '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(4, 'Oppo', 'opppo', 1, '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(5, 'Xiaomi', 'xiaomi', 1, '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(6, 'Apple (Macbook)', 'apple-macbook', 3, '2018-11-06 20:17:20', '2018-11-06 20:17:20'),
(7, 'Dell', 'dell', 3, '2018-11-06 20:17:20', '2018-11-06 20:17:20'),
(8, 'HP', 'hp', 3, '2018-11-06 20:17:20', '2018-11-06 20:17:20'),
(9, 'Asus', 'asus', 3, '2018-11-06 20:17:20', '2018-11-06 20:17:20'),
(10, 'Acer', 'acer', 3, '2018-11-06 20:17:20', '2018-11-06 20:17:20'),
(11, 'Alienware', 'alienware', 2, '2018-11-06 20:17:20', '2018-11-06 20:17:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Smart Phone', 'smart-phone', '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(2, 'Desktop', 'desktop', '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(3, 'Laptop', 'laptop', '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(4, 'Accessories', 'accessories', '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(5, 'Networking', 'networking', '2018-11-06 20:17:19', '2018-11-06 20:17:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest`
--

CREATE TABLE `guest` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `guest`
--

INSERT INTO `guest` (`id`, `name`, `phone`, `address`, `email`, `created_at`, `updated_at`) VALUES
(2, 'Tran Quang Dat', '01657967678', 'ha noi', 'dattranquang@wepay.vn', '2018-11-06 21:36:02', '2018-11-06 21:36:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `guest_id` int(10) UNSIGNED DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Processing','Complete','Cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `guest_id`, `total`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, '1,827.00', '[{\"id\":1,\"name\":\"iPhone X\",\"qty\":1,\"image\":\"product\\/cYzXJXsyp2qy5xmjuyIU5RMxcmmvyozJrSKCv5ed-small.jpeg\",\"price\":1080},{\"id\":2,\"name\":\"Vivo v9\",\"qty\":1,\"image\":\"product\\/EBrYt2EbBcd2qECJiI6CqAoeNzjtAwZaqeWf8WPn-small.jpeg\",\"price\":297},{\"id\":3,\"name\":\"Note 9\",\"qty\":1,\"image\":\"product\\/8oIJwiTHlQH5VSWbYzr5gfhdIG4hMxPA12ACbVz8-small.jpeg\",\"price\":450}]', 'Processing', '2018-11-06 21:35:02', '2018-11-06 21:35:02'),
(4, NULL, 2, '1,827.00', '[{\"id\":1,\"name\":\"iPhone X\",\"qty\":1,\"image\":\"product\\/cYzXJXsyp2qy5xmjuyIU5RMxcmmvyozJrSKCv5ed-small.jpeg\",\"price\":1080},{\"id\":2,\"name\":\"Vivo v9\",\"qty\":1,\"image\":\"product\\/EBrYt2EbBcd2qECJiI6CqAoeNzjtAwZaqeWf8WPn-small.jpeg\",\"price\":297},{\"id\":3,\"name\":\"Note 9\",\"qty\":1,\"image\":\"product\\/8oIJwiTHlQH5VSWbYzr5gfhdIG4hMxPA12ACbVz8-small.jpeg\",\"price\":450}]', 'Processing', '2018-11-06 21:36:02', '2018-11-06 21:36:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_21_190000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_10_22_030135_create_category_table', 1),
(5, '2018_10_23_032438_create_brand_table', 1),
(6, '2018_10_23_034602_create_product_table', 1),
(7, '2018_10_25_134042_create_guest_table', 1),
(8, '2018_10_25_154146_create_banner_table', 1),
(9, '2018_10_25_155308_create_invoice_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `thumbnail`, `price`, `discount`, `quantity`, `brand_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'iPhone X', 'product/cYzXJXsyp2qy5xmjuyIU5RMxcmmvyozJrSKCv5ed.jpeg', '[\"product/NTNhmBHUNHsyshm9W55lbY4x7K1lmCNmxgFQEHZC.jpeg\",\"product/8vji7MWyLfmcYPM39brOdytTCgTFaRNdVgl8myXY.jpeg\",\"product/wf91cfLQ80le17UR7SBNZ6qym3BeVJdQVWNBdbVo.jpeg\"]', '1200.00', 10, 15, 1, NULL, '2018-11-06 20:18:44', '2018-11-06 20:20:14'),
(2, 'Vivo v9', 'product/EBrYt2EbBcd2qECJiI6CqAoeNzjtAwZaqeWf8WPn.jpeg', '[\"product/J7nYkWSoXX2Ccf7909kjMEZLTJYhJdJmnQjnHpev.jpeg\",\"product/qI8uqPVVpMTrsH6mAouYyLTrVQb9SJrOOP15zmIe.jpeg\",\"product/1agCJEXdyHmeHHpi38gJqCqt5sGl66O6hIcVhsH7.jpeg\"]', '300.00', 1, 16, 3, NULL, '2018-11-06 20:21:22', '2018-11-06 20:27:04'),
(3, 'Note 9', 'product/8oIJwiTHlQH5VSWbYzr5gfhdIG4hMxPA12ACbVz8.jpeg', '[\"product/N0QavPst3ML811JNTrLV1it0GQWroDfl6E40o4qg.jpeg\",\"product/ExjdElsKKgjOsOO1dakxlXXQCXCbeskyGGA4KBtA.jpeg\",\"product/51Bo8pVWf4nqbikTLJpx9Artwy5VBmfsgMAtCY7d.jpeg\"]', '500.00', 10, 10, 2, NULL, '2018-11-06 20:22:27', '2018-11-06 20:22:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2018-11-06 20:17:19', '2018-11-06 20:17:19'),
(2, 'normal', 'Normal', '2018-11-06 20:17:19', '2018-11-06 20:17:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users/default.png',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `phone`, `address`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$2BcgIto6iLCZX2gUWKJpBufcUFQ3OPS8LUfNbLAtWxd9zGErMKmGq', 'users/default.png', '01657967678', 'ha noi', 1, 'TEQDToA1Cp7wBCljB5kGfoXfNYlUPdLnXCCLMn5wdlonyuiRBFCv4wfo16LX', '2018-11-06 20:17:19', '2018-11-06 21:35:02'),
(2, 'Tran Quang Dat', 'tranquangdat192@gmail.com', '123123', 'user/8Du3xSDaHQxFL7XKgD8aKyCwZzxERLZtw7HquhNo.png', '0969886777', 'ha dong ha noi', 2, NULL, '2018-11-06 21:23:06', '2018-11-06 21:23:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guest_email_unique` (`email`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_user_id_foreign` (`user_id`),
  ADD KEY `invoice_guest_id_foreign` (`guest_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_guest_id_foreign` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
