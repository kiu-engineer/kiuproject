-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Des 2022 pada 09.18
-- Versi server: 10.3.37-MariaDB-log-cll-lve
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youngpre_os`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner_product`
--

CREATE TABLE `banner_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `subject` varchar(128) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `message` mediumtext NOT NULL,
  `contact_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `reply_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(32) NOT NULL,
  `credit` decimal(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_address` varchar(200) DEFAULT NULL,
  `max_credit` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `profile_picture` varchar(191) DEFAULT NULL,
  `salesman_id` int(11) NOT NULL,
  `kode_customer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `nik`, `npwp`, `name`, `phone_number`, `address`, `shop_name`, `shop_address`, `max_credit`, `level`, `profile_picture`, `salesman_id`, `kode_customer`) VALUES
(1, 56, 'nikcwahyu', '123123123123', 'cwahyu', '123123123123', 'alamatcwahyu7', 'tokowahyu7', 'jatimulyo gang ampel no 167', 25000000, 3, NULL, 54, ''),
(2, 57, '', '', 'Kurohige', '123123123', 'Impeldawn', '', NULL, 2000000, 1, NULL, 54, ''),
(3, 58, '3509200811830003', '21564465651', 'Erix Aqroby', '0982312312', 'jember', 'Kios Sahroni', NULL, 10000000, 2, NULL, 59, ''),
(4, 61, '030233432423', '1343432', 'PELANGGAN', '4534542524', 'BALUNG KIDUL', 'SENTOSA MAKMUR', 'PUGER WETAN', 10000000, 2, NULL, 54, ''),
(5, 66, '', '', 'test', '081236571723', 'alamat', '', NULL, 0, 1, NULL, 40, ''),
(6, 67, '', '', 'Cust', '08643664576', 'Balung', '', NULL, 0, 1, NULL, 40, ''),
(7, 68, '', '', 'Mope', '082333555777', 'Jember', 'Jaya selalu', 'Jl sumbersari', 0, 1, 'IMG-20221029-WA0004.jpg', 62, ''),
(8, 69, '', '', 'Test2', '086263626', 'Alamat nya', '', NULL, 0, 1, NULL, 40, ''),
(9, 70, '', '', 'Sayuri', '08276262727', 'Balung', 'Anugrah', 'Jl puger', 0, 1, 'IMG-20221101-WA00021.jpg', 62, ''),
(10, 71, '', '', 'Iwan', '082334567893', 'Jember', '', NULL, 0, 1, NULL, 40, ''),
(11, 74, '', '', 'faisal', '085633435633', 'ambulu', '', NULL, 0, 1, NULL, 62, ''),
(12, 76, '350912345870003', '10229373', 'RIAN', '08576543456', 'JL.KAHURIPAN 37 SUMBERSARI', 'UD. SEJAHTERA', 'JL SAHARA 14 KALIWINING', 25000000, 2, NULL, 54, ''),
(13, 78, '', '', 'akunbaru1', '081208108', 'Jl.Semeru Baru', 'belum ada', 'belum ada ', 0, 1, NULL, 0, ''),
(14, 80, '123456', '123123123', 'Custumer Trial', '08123123546', 'Jl.Cutomer Trial 1', 'Toko Trial', 'Jl. Trial Toko', 5000000, 2, NULL, 79, ''),
(15, 81, '123456123456', '132456132456', 'custemer trial', '01230123', 'JL,Toko baru', 'Toko Trial Baru 123', 'JL,Toko baru', 17000000, 3, NULL, 79, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `salesman_id` int(10) DEFAULT NULL,
  `customer_id` int(10) NOT NULL,
  `message` mediumtext NOT NULL,
  `chat_from` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `reply_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) DEFAULT NULL,
  `order_number` varchar(16) NOT NULL,
  `invoice_number` text NOT NULL,
  `ttb_number` text DEFAULT NULL,
  `order_status` enum('1','2','3','4','5','6','7') DEFAULT '1',
  `order_date` datetime NOT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `total_items` int(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT 1,
  `shipping_method` int(1) NOT NULL,
  `delivery_data` text DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `deliver_by` varchar(15) DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `shipping_cost` text DEFAULT '0',
  `insurance` text DEFAULT '0',
  `rating` int(11) DEFAULT NULL,
  `rating_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `payment_price` decimal(8,2) DEFAULT NULL,
  `payment_date` datetime NOT NULL,
  `picture_name` varchar(191) DEFAULT NULL,
  `payment_status` enum('1','2','3') DEFAULT '1',
  `confirmed_date` datetime DEFAULT NULL,
  `payment_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `id` int(11) NOT NULL,
  `no_faktur` text NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `payment_price` int(11) NOT NULL,
  `pay` int(11) NOT NULL DEFAULT 0,
  `payment_date` date NOT NULL,
  `payment_status` int(11) NOT NULL,
  `confirm_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `sku` varchar(32) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `picture_name` varchar(191) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_2` int(11) NOT NULL,
  `price_3` int(11) NOT NULL,
  `current_discount` decimal(8,2) DEFAULT 0.00,
  `stock` int(10) NOT NULL,
  `product_unit` varchar(32) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `add_date` datetime DEFAULT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `credit` decimal(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `review_text` mediumtext NOT NULL,
  `review_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `key` varchar(32) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `profile_picture` varchar(128) DEFAULT NULL,
  `role` varchar(32) DEFAULT '0' COMMENT '1 = admin, 2 = customer',
  `register_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_picture`, `role`, `register_date`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Brm3RNWFKvZ1e0ej1vBz9.QbFMW21q0l/iDSt5aDOoGj9zlLFuxh6', 'agung1.png', 'admin', NULL, 1),
(54, 'swahyu', 'swahyu@gmail.com', NULL, '$2y$10$Yl0H.az2oYdN8JsXgUagCeQBqxf1WIUphyd9y8AE/R6HzsNJfPuf2', NULL, 'salesman', '2022-09-22 17:35:28', 1),
(55, 'dwahyu', 'dwahyu@gmail.com', NULL, '$2y$10$64mC/JHkEyBfhymqU4b5b.oJyh3H46Xdsr6gPlKfUWLKs1s1cFU.q', NULL, 'distribusi', '2022-09-22 17:35:57', 1),
(56, NULL, 'cwahyu@gmail.com', NULL, '$2y$10$NW0poORtQS34wLh.I2knS.bbbWzSVlk71BzcCByVEfuTJoiPp5PBa', NULL, 'customer', '2022-09-22 17:37:38', 1),
(57, NULL, 'qwert@gmail.com', NULL, '$2y$10$rd4I82jFfR1aqfLarLysVuORCEFdjBUj47sJkudn6cR54KcCnAg/y', NULL, 'customer', '2022-09-22 19:38:29', 1),
(58, NULL, 'aqrobye@gmail.com', NULL, '$2y$10$7C7q54ZUl241VcEKrkK/HOhkuQt.nWhmKBasc2HIUoyFC0fV5D64G', NULL, 'customer', '2022-09-23 04:27:56', 1),
(59, 'Admin Penjualan', 'penjualan@gmail.com', NULL, '$2y$10$oXf2VHVBbngML9Pl4WevyORyeMQNKzQ.zLBfk/NfzU.mwpSh6MWZ6', NULL, 'salesman', '2022-09-23 04:29:41', 1),
(61, NULL, 'pelanggan@gmail.com', NULL, '$2y$10$o.hUZ.KztVzCfozdyNR1YeVMR7uF3qIJbxU2zka69YAMWnG9JGhJ6', NULL, 'customer', '2022-10-10 12:38:19', 1),
(62, 'Admin Online', 'adminonline@gmail.com', NULL, '$2y$10$Piw9jb8Sd.SVUh2SL4PRJuFD5aJ3bSDOHxy78I/dAPUeJ9GBtR6QW', NULL, 'adminonline', '2022-10-26 20:29:19', 1),
(63, 'Keuangan', 'keuangan@gmail.com', NULL, '$2y$10$YhoKD4bwf8eW9fSKKtmluujAswZtex5M/xS07wIw4W/t2WdglqMtW', NULL, 'keuangan', '2022-10-26 22:19:19', 1),
(64, NULL, 'mope@gmail.com', NULL, '$2y$10$P5pGf88j.SsFbeQ.nQ9ti.JbiPmjJ5AsIkef3AEPp6v5eYGS7eD2C', NULL, 'customer', '2022-11-01 18:02:05', 0),
(65, NULL, 'supri@gmail.com', NULL, '$2y$10$0ymggK6QZQz4x2lmyVDS5.GV7KP00cYltrW5zn4Ov98wUC9mzl6Jm', NULL, 'customer', '2022-11-01 18:06:31', 0),
(66, NULL, 'test@gmail.com', NULL, '$2y$10$yVuLQt7ILIsU.6uxpYH1DecAB/tA5q6DhcOhlHTw4MTvXQCXyucx.', NULL, 'customer', '2022-11-01 19:31:00', 1),
(67, NULL, 'customer@gmail.com', NULL, '$2y$10$6Vwyy0LXRcLxA8UZdeDRMuQiuG3XYOwRnBpshwREc90vkEcMebYTm', NULL, 'customer', '2022-11-01 19:36:22', 0),
(68, NULL, 'gusti.mope819@gmail.com', NULL, '$2y$10$iBC6YDMnusxQSm5RO2MtE.hfibYR3bwpwxhfDbuOxyQ2o7NBW3Nwq', NULL, 'customer', '2022-11-01 19:36:53', 1),
(69, NULL, 'emailnya@gmail.com', NULL, '$2y$10$nG1//i4cJnT9vwVKC94/6OHCypEiBkG6Byg6hoHTnZKUtnfERBcoG', NULL, 'customer', '2022-11-01 19:38:13', 0),
(70, NULL, 'sayuri@gmail.com', NULL, '$2y$10$7PerRcfHb5QJD4xNO9KwqOMC2V2RUp/rytpe3tBgplHbTWZBslYe6', NULL, 'customer', '2022-11-01 19:39:10', 1),
(71, NULL, 'iwan@gmail.com', NULL, '$2y$10$NLey.oZELOsmX.8K5uEBzuydLCMhfmONouP1AvhXuyfOF4bLWZwWe', NULL, 'customer', '2022-11-01 19:39:51', 0),
(72, 'Kadep', 'kadep@gmail.com', NULL, '$2y$10$Brm3RNWFKvZ1e0ej1vBz9.QbFMW21q0l/iDSt5aDOoGj9zlLFuxh6', NULL, 'kadep', '2022-11-02 11:56:19', 1),
(73, 'Kadep 1', 'kadep1@gmail.com', NULL, '$2y$10$8OhbMGn21ZMLHqj1ilLjKeQzMBsvciI7qNXFftJHtf4e8RSwIk99.', NULL, 'kadep', '2022-11-03 09:37:40', 1),
(74, NULL, 'faisal@gmail.com', NULL, '$2y$10$y9dKpR6lsu6FbyX5/sJY9.SB2Al9a7Pi9LpnN5jq18K.uxRskevi.', NULL, 'customer', '2022-11-03 10:02:40', 0),
(75, NULL, 'arif@gmail.com', NULL, '$2y$10$sDRmrH6uGpYWnoh4TYYabe33M11zkAyiPPTdmx0OMM.q81PcZkSSa', NULL, 'customer', '2022-11-09 20:21:01', 1),
(76, NULL, 'rian@gmail.com', NULL, '$2y$10$6nTIg8LQ/fr4zyrz/lA1NOrgXa1jpnZGoVEczfwvpNyfsj3Jg1nqq', NULL, 'customer', '2022-11-10 20:15:52', 1),
(77, 'ALIF', 'alif@gmail.com', NULL, '$2y$10$ADfDKeO8ZrPLWXFFSx3dgevM1woD4Uv9jADCDpwXygW29//jLS1NS', NULL, 'keuangan', '2022-11-10 20:17:18', 1),
(78, NULL, 'akunbaru1@gmail.com', NULL, '$2y$10$mB.ICCiM3nnYAYLuoCxdj.27KJ4ShiEr.qsxmCwdDYr6F5Vj5vH0i', NULL, 'customer', '2022-11-28 10:42:17', 1),
(79, 'Sales Trial', 'sales@gmail.com', NULL, '$2y$10$IRZLM8vlw9yvDnBO8R96We1pswHQCnTRATn/i1yFSBDY7wP82ipVu', NULL, 'salesman', '2022-11-30 13:18:01', 1),
(80, NULL, 'custrial@gmail.com', NULL, '$2y$10$o2rPkdmMxXRzjEmhddDun.zGKicsVNmVEl9cjX3u1kI57B47v8ZBS', NULL, 'customer', '2022-11-30 13:20:23', 1),
(81, NULL, 'customer2@gmail.com', NULL, '$2y$10$xXQXksNLB8SERgEnjDHnQur9gXHaijVS4usUdgKPW2MkNHr4DwxRW', NULL, 'customer', '2022-11-30 13:36:45', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_products`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_products` (
`id` bigint(20)
,`category_id` int(10)
,`sku` varchar(32)
,`name` varchar(191)
,`description` varchar(191)
,`picture_name` varchar(191)
,`promo` int(1)
,`price` int(11)
,`price_2` int(11)
,`price_3` int(11)
,`promo_price` decimal(13,2)
,`promo_price_2` decimal(13,2)
,`promo_price_3` decimal(13,2)
,`discount` decimal(10,0)
,`discount_2` decimal(10,0)
,`discount_3` decimal(10,0)
,`current_discount` decimal(8,2)
,`stock` int(10)
,`product_unit` varchar(32)
,`is_available` tinyint(1)
,`add_date` datetime
,`level_product` varchar(5)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_tagihan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_tagihan` (
`user_id` bigint(20) unsigned
,`tagihan` double
,`max_credit` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_products`
--
DROP TABLE IF EXISTS `v_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`youngpre`@`localhost` SQL SECURITY DEFINER VIEW `v_products`  AS SELECT `a`.`id` AS `id`, `a`.`category_id` AS `category_id`, `a`.`sku` AS `sku`, `a`.`name` AS `name`, `a`.`description` AS `description`, `a`.`picture_name` AS `picture_name`, if(`b`.`credit` is not null,1,0) AS `promo`, `a`.`price` AS `price`, `a`.`price_2` AS `price_2`, `a`.`price_3` AS `price_3`, if(`b`.`credit` is not null,`a`.`price` - `b`.`credit`,`a`.`price`) AS `promo_price`, if(`b`.`credit` is not null,`a`.`price_2` - `b`.`credit`,`a`.`price_2`) AS `promo_price_2`, if(`b`.`credit` is not null,`a`.`price_3` - `b`.`credit`,`a`.`price_3`) AS `promo_price_3`, if(`b`.`credit` is not null,round(`b`.`credit` / `a`.`price` * 100,0),0) AS `discount`, if(`b`.`credit` is not null,round(`b`.`credit` / `a`.`price_2` * 100,0),0) AS `discount_2`, if(`b`.`credit` is not null,round(`b`.`credit` / `a`.`price_3` * 100,0),0) AS `discount_3`, `a`.`current_discount` AS `current_discount`, `a`.`stock` AS `stock`, `a`.`product_unit` AS `product_unit`, `a`.`is_available` AS `is_available`, `a`.`add_date` AS `add_date`, CASE WHEN `a`.`price` <> 0 AND `a`.`price_2` = 0 AND `a`.`price_3` = 0 THEN '1' WHEN `a`.`price` = 0 AND `a`.`price_2` <> 0 AND `a`.`price_3` = 0 THEN '2' WHEN `a`.`price` = 0 AND `a`.`price_2` = 0 AND `a`.`price_3` <> 0 THEN '3' WHEN `a`.`price` <> 0 AND `a`.`price_2` <> 0 AND `a`.`price_3` = 0 THEN '1,2' WHEN `a`.`price` <> 0 AND `a`.`price_2` = 0 AND `a`.`price_3` <> 0 THEN '1,3' WHEN `a`.`price` = 0 AND `a`.`price_2` <> 0 AND `a`.`price_3` <> 0 THEN '2,3' WHEN `a`.`price` <> 0 AND `a`.`price_2` <> 0 AND `a`.`price_3` <> 0 THEN '1,2,3' END AS `level_product` FROM (`products` `a` left join `promo` `b` on(`b`.`product_id` = `a`.`id` and cast(`b`.`start_date` as date) <= curdate() and cast(`b`.`expired_date` as date) >= curdate())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tagihan`
--
DROP TABLE IF EXISTS `v_tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`youngpre`@`localhost` SQL SECURITY DEFINER VIEW `v_tagihan`  AS SELECT `a`.`user_id` AS `user_id`, sum(`a`.`tagihan`) AS `tagihan`, `a`.`max_credit` AS `max_credit` FROM (select `a`.`user_id` AS `user_id`,ifnull(`b`.`total_price`,0) + ifnull(`b`.`shipping_cost`,0) + ifnull(`b`.`insurance`,0) AS `tagihan`,`a`.`max_credit` AS `max_credit` from (`customers` `a` left join `orders` `b` on(`a`.`user_id` = `b`.`user_id` and `b`.`payment_method` = 1 and `b`.`order_status` < 6))) AS `a` GROUP BY `a`.`user_id` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner_product`
--
ALTER TABLE `banner_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contacts_contacts` (`parent_id`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_customers_users` (`user_id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contacts_contacts` (`salesman_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_users` (`user_id`),
  ADD KEY `FK_orders_coupons` (`coupon_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_product_category` (`category_id`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reviews_users` (`user_id`),
  ADD KEY `FK_reviews_orders` (`order_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner_product`
--
ALTER TABLE `banner_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `FK_contacts_contacts` FOREIGN KEY (`parent_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_customers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
