-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 05:50 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v_status`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `pdf_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firm_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_approve` int(11) DEFAULT '0',
  `CreatedBy` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `artist_name`, `email`, `city`, `firm_address`, `phone`, `about`, `facebook`, `instagram`, `youtube`, `image`, `image_id`, `video`, `rate`, `to_approve`, `CreatedBy`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', 'rajkot', 'rajkot', '9909378781', 'music artist', 'https://www.facebook.com/ykcreationfamilysalon/', 'https://www.instagram.com/ykcreationfamilysalon/', 'https://www.youtube.com/channel/UCe9TGif8bRwWPH1-YDvgbVg', 'artist/1611301582.jpg', NULL, 'artist-video/m1cfUsetCCNWNyIwCs1fvJ6cwLHrPVuqDpAT1cA8.mp4', '2', 1, 1, '2021-01-22 02:16:55', '2021-01-22 02:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_approve` int(11) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `image`, `to_approve`, `CreatedBy`, `created_at`, `updated_at`) VALUES
(2, 'brand name', 'brand/1604306686.jpg', 2, 1, '2020-11-02 03:14:48', '2021-01-22 06:23:47'),
(3, 'brand', 'brand/1604306703.jpg', 1, 1, '2020-11-02 03:15:05', '2020-11-02 03:15:05'),
(4, 'brand', 'brand/1604306719.jpg', 1, 2, '2020-11-02 03:15:21', '2020-11-02 03:15:21'),
(6, 'test', 'brand/1609393246.jpg', 1, 1, '2020-12-31 00:10:48', '2020-12-31 00:10:48'),
(7, 'testing brand', 'brand/EL2T9OtqH2BXmUazIOJVUB01iCACIfmV899dStcE.jpeg', 1, 1, '2020-12-31 02:45:25', '2021-01-01 01:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `module_id`, `cat_name`, `cat_image`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin test', 'category/UcDLEBpVARJXV8pv8gCBTlBcNNMu56nfRjn7pqWn.jpeg', NULL, '2020-12-26 06:57:17', '2020-12-26 06:57:17'),
(3, 1, 'test by admin', 'category/w6NggPACol8822w5lD37xAx3BenEkxiBQVfjiPdi.png', NULL, '2020-12-26 07:04:01', '2020-12-26 07:04:01'),
(4, 1, 'Automobile', 'category/1608986142.jpg', NULL, '2020-12-26 07:05:45', '2020-12-26 07:05:45'),
(5, 1, 'Hair Style', 'category/5GQDUR1Kg9eGAoSPfcvfhX0i0SzfFZOxeYHIJLYC.jpeg', NULL, '2020-12-26 08:44:21', '2020-12-26 08:44:21'),
(19, 1, 'Hair Style ss', 'category/1609070861.jpg', NULL, '2020-12-27 06:37:44', '2020-12-27 06:37:44'),
(20, 1, 'test by admin api', 'category/YSGMJyvJz7oRZUiZzczjihxt7P5zEbeiTgbxQxLS.jpeg', NULL, '2021-01-24 06:51:40', '2021-01-24 06:55:00');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','shipping','complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `package_id` int(125) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `single_video_id` int(11) DEFAULT NULL,
  `video_count` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `Order_id`, `user_id`, `product_id`, `quantity`, `total`, `transaction_id`, `status`, `package_id`, `video_id`, `single_video_id`, `video_count`, `category_id`, `stat`, `payment`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '1', '500', '125304', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, '2020-11-02 06:49:04', '2020-11-02'),
(2, NULL, 1, NULL, NULL, NULL, '123456', 'pending', 1, NULL, NULL, NULL, NULL, 1, 'true', '1970-01-01', '2020-11-02 06:50:02', '2020-11-02'),
(3, 2, 2, 1, '1', '500', '125304', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, '2020-12-10 16:33:34', '2020-12-10'),
(4, 3, 6, 1, '1', '500', '125304', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, '2020-12-10 16:35:18', '2020-12-10'),
(5, 4, 3, 1, '1', '500', '125304', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, '2020-12-10 16:35:22', '2020-12-10'),
(6, 5, 4, 1, '1', '500', '125304', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, '2020-12-10 16:35:27', '2020-12-10'),
(7, 6, 5, 1, '1', '500', '125304', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, '2020-12-10 16:35:31', '2020-12-10'),
(8, 7, 1, 5, '1', '500', '125304', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, '2021-01-24 10:07:19', '2021-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `artist_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 2, 'images/GDgCYwrSNe7vB4UMLI9qfXeuMLPFT5LcPvRMUpSp.jpeg', '2021-01-22 02:16:57', NULL);

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
(330, '2014_10_12_000000_create_users_table', 1),
(331, '2014_10_12_100000_create_password_resets_table', 1),
(332, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(333, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(334, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(335, '2016_06_01_000004_create_oauth_clients_table', 1),
(336, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(337, '2019_08_19_000000_create_failed_jobs_table', 1),
(338, '2020_07_25_112152_create_category_table', 1),
(339, '2020_07_26_040424_create_artist_table', 1),
(340, '2020_07_27_090324_create_video_table', 1),
(341, '2020_07_30_111727_create_image_table', 1),
(342, '2020_07_30_172529_create_module_table', 1),
(343, '2020_08_04_065144_create_pdf_table', 1),
(344, '2020_08_04_100336_create_product_table', 1),
(345, '2020_08_06_075656_create_advertise_table', 1),
(346, '2020_08_15_085224_create_product_image_table', 1),
(347, '2020_08_25_075438_add_brand_to_product_table', 1),
(348, '2020_08_25_075919_create_brand_table', 1),
(349, '2020_08_26_135647_add_status_to_advertise_table', 1),
(350, '2020_08_27_053905_add_remember_token_to_oauth_access_tokens_table', 1),
(351, '2020_08_29_080239_create_sponsor_table', 1),
(352, '2020_08_29_092417_create_sponsor_image_table', 1),
(353, '2020_08_29_095317_add_sponsor_id_to_product_table', 1),
(354, '2020_09_03_122130_add_mobile_to_product_table', 1),
(355, '2020_09_03_130633_create_notifications_table', 1),
(356, '2020_09_05_161749_create_package_table', 2),
(357, '2020_09_07_121651_add_detail_to_package_table', 3),
(358, '2020_09_08_062527_add_multiple_column_to_package', 4),
(359, '2020_09_14_183206_create_order_table', 5),
(360, '2020_09_17_130259_create_user_package_table', 6),
(361, '2020_09_18_063704_add_forgot_password_stat_to_users', 7),
(362, '2020_09_28_071415_create_history_table', 8),
(363, '2020_11_09_112906_create_role_table', 9),
(364, '2020_11_09_155256_create_role_user_table', 10),
(365, '2020_11_14_085306_create_sub_role_table', 11),
(366, '2020_12_12_103943_create_referral_table', 12),
(367, '2020_12_16_084722_create_setting_table', 13),
(368, '2020_12_21_105421_create_referral_history_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'video', 'test', NULL, NULL),
(2, 'pdf', 'test', NULL, NULL),
(3, 'product', 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
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
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `remember_token`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0b4646295c34dc05e01662f57a0ffa70980f483589ae369f382d67bd2171f8fbb61062874329bb28', 12, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiIwYjQ2NDYyOTVjMzRkYzA1ZTAxNjYyZjU3YTBmZmE3MDk4MGY0ODM1ODlhZTM2OWYzODJkNjdiZDIxNzFmOGZiYjYxMDYyODc0MzI5YmIyOCIsImlhdCI6MTYxMTQxNzM4NiwibmJmIjoxNjExNDE3Mzg2LCJleHAiOjE2NDI5NTMzODUsInN1YiI6IjEyIiwic2NvcGVzIjpbXX0.QRghgT15XIm8mHlSG1GCsBzq5Q3xdYbnRk7mxI2SKD0omuf_R-u_qhbH_j6aQMRMDVhY7T8-xXJuejb0PPEYFwm7g2_lZe0m-LIz23no1oZcJHKJi8E6W-_Xf8NumNVqz1l8eWcWwRBUfD3mIFV3Wsj4oYxaToNM65SRB0kl17Te49fnfK-cPrsYy8QlmyD0TQA6eh0sOsdvGlxycezTrm6QNdEW5LTLprO_dxyohJGIcAInxh_B8GI6hOI0IICo2i1HWsbPn2BnMdvVl3uVLVM3zlDflPOY10KadWa3WfF-zPCVera9_zQTrEdZPxOl-KEWVAqL20-4PHU9dgtSrAArwPFkyKFEXUMEB81WaT66dnOLv6O10yE_SAMrLy7O2m5ce9xHNLW2HnuqvZivZKp8XH3T5riXA5NAHsDHaloxchGl4hBR1XcS0A32IcgRXVV_rQ4BUu3aR4Og14UT3oR_T4aBsNhlEAwlHYxrM39ZpNpWLoiZsSv20LvUQ2eCcGGVkE_UHte5kL6KUzEgsifXPFdEUfQeo5S960SlEsRwp2KfpxneWAahyHGp70rEkuhlUtR0vNwixob9HvNoW6B6aUbBsvwdZmFRtWRh9XTuC70OVPG6IJcyyu0XSXI_rscs1AGNvJSh2uUovVu6bm611XTW-vrzOQV0iCGAL6c', 0, '2021-01-23 10:26:25', '2021-01-23 10:26:25', '2022-01-23 15:56:25'),
('106ee448e864ec39c5d34b3c41392d2f0c1e5efafb41f05d7e27e351be129a30c300ac985390a09c', 2, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiJhZDYxMzBmOWFjODJlMjAzNjM0ZjQ3ODYxZTA1NGU5ZDA4ZjBiYzJmOTZmNDA3YjY1NzY4ZGZkZjY0ZWMyNmZiN2ZkZjdmZmZiNjlmOTI4YiIsImlhdCI6MTYwNTAwOTE3NSwibmJmIjoxNjA1MDA5MTc1LCJleHAiOjE2MzY1NDUxNzUsInN1YiI6IjIiLCJzY29wZXMiOltdfQ.s50Lmm9ZxThnpmO-qnsjvWxjgc8D52bc-tHXurOUAPyu99_73o3eRi9kI-DHvwiD8hbeVylpK8JuW5jFyG5LoR-M0UxfdPxvUl2PZwxOvVf8vvy2q3YvN3TMJpvKW34dgYw0Wg2lm18vcO4jumM19UfOAUHgvzcYdRdcLObi84T6IWVybA7moJnjKBtuOqYjSheu6I-n-sbBWpTftiQ94SJPqUCdrVx7T5TpmND6OevNH4jeDABQvWVRAYc3XTp3cTgQ9OpICNFb3ba_s8Uz2UiIgxkuF7czRhTu1s0_Mtb3LzdhLtMOXL6AvgdUiL8kIANczEjy-R8zXSxuX8FTOSxi5aQNL6wxVnXKPO3pGNsfJyN4N8t5rnqFz7lFc6Cb31rq6c2ALQDqkNhHjC9i1ts-zQ7W4VH1mU5BzWslXcPa_Uc9K3kr72tIaqQo0GIdcv50m6sGpzRtbm_A_VBlhskRQ4rMrcN31pT_QrO3GLPsCraUep3UB4Uuwz_3RkAY_XC1oGB93ahOQ58T-owAyVmPxBucynzHz_oVDrfolCjtZtEj1kgcTIpoD0Nfg8Lh6W6xk-wPIl4S0vKWmqZCv072g6i1dTVR6cDatb1F2E-yqk53fD7bOTf-QwM3a8jy4BhjniWB7RM-N0dKMx5eyNxC5TTRSQWE2V_hyTkR2qg', 0, '2020-09-12 06:24:47', '2020-09-12 06:24:47', '2021-09-12 11:54:47'),
('1e9a3f404e6a46f7660ee192d7dc765592f48fae4fc08a795d1b506dc18aa7c7ae5d5071b19501e7', 1, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiJiNzFkOWYzMWYxYzdkZjY3MzBkZGE1Mzg0YzJmNzE5NGQ2NDQwZWZhMzgxZjgxMmFlMGJlOTg4MWQ4YjA3YzM1YWJmNGY0ZjI0YWY4OGE0OCIsImlhdCI6MTYwMzg2MjAzMiwibmJmIjoxNjAzODYyMDMyLCJleHAiOjE2MzUzOTgwMzIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.xQqWgGAQj_krCwlfPdvs8Wecb4QCRlz0US0yvB9jk0Hmq0modgDukdbTWFoScOki3ormXbbLvKptiXObgiV6zBRyIL5E_55qeZGVtjockYrWUaPPfqTLTUy9BUmzo0sie5MzD5P90JBVUxNok0XCvhONV_atIKdP2c_k3uAW8RHFipwSqGUkKR6QiqaC1rihQSjg3gOQ6BybbsWDv5fXVdB7OSprkuhc0T_6wPj2DQd17a314TCiSasJTNXOZJyOO6-Cy4JHJhhF-0Mz4JKb5sPZZ_pOfmUMLBvrDgf4xXFNDs-m94XR4CpKNeGT84dtA90N0hw8nIf-I8IKXJNRpBI_fyCMSH5sY3v20WPVwZlDSmjB1yAj323eeTr7upbI98mr6Z7YWsBr-U2BDYZ0DeG2sKIXL2josJ9iIlUQJmDEdgUvD1GlQRkvILQgoBqTdDBdk4RCzbvcbCu8PoU1nksmJG6m5lDFUiqAODf234QMKTFf643WIJl9fzWOncVIYhsPSyvqM8kgSvQCeDB4Mcohb0g3npIbGCehXglS6NRRE9ftovKgqCvJFTNkAjo5fprOR7QfJ4T15Z4LZh9lPUHbO4ZAyTQ-KAnocsjjOLfZP2omKl_mlAULMycXlY_LBkSl84iiPMBediHtRgHZfDKP4wQWJFs4_ct1lF6cnJg', 0, '2020-09-05 08:56:16', '2020-09-05 08:56:16', '2021-09-05 14:26:16'),
('2fafd7020b62508d83d9cbeed6df5c262aa397f88baa4b4023e654d8b14bbb0089f0e48cc9ce9af8', 8, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiIyZmFmZDcwMjBiNjI1MDhkODNkOWNiZWVkNmRmNWMyNjJhYTM5N2Y4OGJhYTRiNDAyM2U2NTRkOGIxNGJiYjAwODlmMGU0OGNjOWNlOWFmOCIsImlhdCI6MTYwNjIwNzAzNCwibmJmIjoxNjA2MjA3MDM0LCJleHAiOjE2Mzc3NDMwMzQsInN1YiI6IjgiLCJzY29wZXMiOltdfQ.nwdT01MjMlCgtAFK2m0uZgiS8356-bM4qRgS3hLzgfd8khVcXrNaJczg6kLfoqqMDJY8bNHiTc83oxpxF95mEdYy36qvbqmksADA6MJqo2JIBF_5u7ecO-UNt410AMEVxPkpkNuT4fNb2q-NWgJLbVtfgdzeLL05qNw4CdSRnftQ_kUIRcYbOU8Q2CNL_NKR9pXIc5BXWnByVyrhoTE-PM7a9T-BcIyWgH8vtuY9cVXqjo7Q3tghl70Eq21Cll288E7LjzXhyPReWhdcxCYLHXYCnCo7BWf8aiWOGk1DdeOspFhWgF6-o8mC0SNUoxWvV8ycgmgcSZW_76_8LvNmNy2LK4NND68kg2tyDockuRxbi4wttaqarn8qor1GSou72BqmmwMDtXhYedCI06E9wLpi5pohNu_iWQWZzKLeJHicjYW5U5yCiOhoveQCBLUAXC-YECVOXlFQ9JdQe6t0RBPtTQBwuypO2oDca5zU16hZcneOlJs1la-TAwOm-Awfh5-xYsrBkua3MYzys28vfqNe7uT33DCLPTBfFhC_3TraO_Oez_1v9zbk-NZGnERH1nN9ox6qsmMVu3skpjOqSeH4fbarefSGAbHrse2z8Yyr_4Apqo3kPYk7kRhB8_XWhZPdmr3g_abR7PXHcorcsM0dvI_CCWI6-xPwmt4yZlk', 0, '2020-11-24 03:07:14', '2020-11-24 03:07:14', '2021-11-24 08:37:14'),
('36d90aa8a4514d26bf6b18887fd12bd4d5e7367f986c5a854047050639e70d5b48953aa23e72ce74', 4, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiIzNmQ5MGFhOGE0NTE0ZDI2YmY2YjE4ODg3ZmQxMmJkNGQ1ZTczNjdmOTg2YzVhODU0MDQ3MDUwNjM5ZTcwZDViNDg5NTNhYTIzZTcyY2U3NCIsImlhdCI6MTYwNjIwNjU3NiwibmJmIjoxNjA2MjA2NTc2LCJleHAiOjE2Mzc3NDI1NzYsInN1YiI6IjQiLCJzY29wZXMiOltdfQ.gYGK7TOuMni1WRzpXtQUw6rI7MRcZoWWOy1U1fkiBmTEhmdK-zysr1KnbrB8UrM_VY4kAkGsC6b4tV0h7AHWvYdhht49d-Ogzp0qCdLQdP0abP1QSBAeE6C55gxck_kFCHzFASVUqpNux6wAdEIvYuN6t8WvlDLF_I5iHL2q0Oal2WfzWvxyTYKCHWO6kFoDKASVdmKgIX3cqRwJDg5NHwE7ASpKTvqWSeZkovCDDl9VTVwSK9rj4-PNb1VktdbFhlEqJobATufimvkWPZ7N-Jwl23W-s_TvAkA8qum_-6vH1FmoL3SMRUa8_msp0JxpofOQwlLJVQTyJ_yzQgOMzVbs-MiTay2_QkHqwuHgDMHgVEwY8V3EsjknrLjHa0tiFujAPmUCwIJOhR4XQ41Ugdg5ygRluq4kVtB0-KEIip7-A3UPKtgRibtZqy9gJwRxt1Oo6I5RYaPB90FdpHkaKTmsXR7kQhfuRXYK1jYaQfpnVkG2rQar5SLog32n8Yl-5R6siAe3G2EbEEBRCwCDeVNC_2qtmhDCscRVp94ZsSUCP-5ZFAIOmcmCI1b2xkhyUTW_hHuQobAX5kYObhYpmOvVCXZoiw7PjRPTbGQd-a8HhaSJz80JxMhPn5SBFIp8cppVSIyqquCIhHYpj0mW878hJkJVR2yGrAx_LG1B8EE', 0, '2020-11-24 02:59:36', '2020-11-24 02:59:36', '2021-11-24 08:29:36'),
('5d0dc02a8c37a426d40d6fe02806abcd3c51b081f9e5f623420e9709c183876d5f837ea9f50b6344', 11, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiI1ZDBkYzAyYThjMzdhNDI2ZDQwZDZmZTAyODA2YWJjZDNjNTFiMDgxZjllNWY2MjM0MjBlOTcwOWMxODM4NzZkNWY4MzdlYTlmNTBiNjM0NCIsImlhdCI6MTYwODExMzM1OCwibmJmIjoxNjA4MTEzMzU4LCJleHAiOjE2Mzk2NDkzNTcsInN1YiI6IjExIiwic2NvcGVzIjpbXX0.F88sbEUmPJE_nDM1JEC3_zbRJ3eovJG7o0yBvuaInQJEW2cDvLK4gtHhS5cNooMyGDFq91VLc2GdTonFrhtOcWSZ9G1ZZqffQo8N1Gnww1kPhT6iLsv_MKLAQ8nmDWqeB4nQMt23o5asZQ-TDg8bEqVhDaKd4KzXTJZxD-UBtRh5lYeilvVOxTUtkRPIh-6VGLTTAwKC121lua62Mziv67YjACqRMlWjRauSii0cghO_TjHTGUUrbQV_FdVInWNWDq6UZExzU6mUxNQrjmxiVcrvaMxe5pZRzoADqjznWApd_0KaWCj_kWsZCrti8x0ydEhwIKG_BxVWjxmPtFfQh1V2RlOZT9J91dBjmgWxTy6xt2vOc4DdhOn6KW-FyJXa6YZ9v6n7_xKql2zFQTq1g75LvjG1njQ3Lp--8E_oj-r8eBeNMsVPrb_1HMpQMA-mdZ9r86kML0OZQdsfgpkGJchIonKCl4aUMjPPVnZ-rpa81V5xiI3QpVltw80WtUGlApmU9qeQysPU5tmvd51sksYB5HAxsdQE4N_cKq49YiRIUzqe7u7brpK_9sqtAMGLAfUM5YryCA2etNqQWOV7xmxNzK9ch09ezNDIzRB60fBsF53qSS1UokAJ2toAnzjzkylxg4Y5EgnppMr1JU_Cb42jtiP9aZ9d5DRT-_DnyVs', 0, '2020-12-16 04:39:17', '2020-12-16 04:39:17', '2021-12-16 10:09:17'),
('65429f2adca086fb28129fe4b18313568d203c3962cafdfab61b887544acf979a2baac0a49ea48d7', 3, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiI2NTQyOWYyYWRjYTA4NmZiMjgxMjlmZTRiMTgzMTM1NjhkMjAzYzM5NjJjYWZkZmFiNjFiODg3NTQ0YWNmOTc5YTJiYWFjMGE0OWVhNDhkNyIsImlhdCI6MTYwNjIwNjUyOSwibmJmIjoxNjA2MjA2NTI5LCJleHAiOjE2Mzc3NDI1MjgsInN1YiI6IjMiLCJzY29wZXMiOltdfQ.oFxmxUl-oa0j0cRzGPM93c1fqZWZ95yQ3BhXaFsGdF4hkgcFKFGCZqQ7i6n_J819fSSzYVVDCWGO9vBZUAW7afyzEtZdgcooBjAeUjlf1beskNQqjrmfFOVlTYDa1JJFsQHptUe56x88hkEjR2m3OuiuYGTEZfqqz66CxbEoCmCVxTTBB-TwT9VCD1bKsz66y-dqo7L9nc0PMgWa5JQuAVh2raPrYX3KKpyfI2_JKPw7sZgLXSLG2y0l7CZM938Ca2tFxp-ME1mcdgS7UhoU7ybpGqu_CHLy0Cz4z3uMQyUjVxe2V-uqIbFg0nKBG5YYQ6eJ_ZIYemi707P6-_Sn52ISz52DCNJdGoApyKtyF7IQ_-UF6Oumdsa5Q7rckry7hqAWmJNkY7i0V8eOrLDz8-l_pOtyd1Ka9gIAliBJveO-LvbUymnIOURwIM7FsuJXYpkwWUwoRzuGxxpLrHpHcTyT-ci0pntNVoE5_3iClIgORdvSxw_j6S7fZC8VNW4loU6hk8VQ9_2JnQb8RWMU9TN8w12KZNc-w4WAA7WkGKS8mBGc4NCiaQ1P6DfvRHlG2m4e-gKTVq0OzBkfexg4Ng_JXJMl59Qgc1H2XYqxl2aACgp65sd8KCJWGKRahPPjbg-SJdbaZ_-Np95ORV73Vg1E-f2JHjTXGk7dlO0wgwM', 0, '2020-11-24 02:58:48', '2020-11-24 02:58:48', '2021-11-24 08:28:48'),
('8971f0134a1165cf047717ca2f83e1787cfd217c1b5502ec523506e9c6b6c2881faa84def8249293', 6, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiI4OTcxZjAxMzRhMTE2NWNmMDQ3NzE3Y2EyZjgzZTE3ODdjZmQyMTdjMWI1NTAyZWM1MjM1MDZlOWM2YjZjMjg4MWZhYTg0ZGVmODI0OTI5MyIsImlhdCI6MTYwNjIwNjYwNCwibmJmIjoxNjA2MjA2NjA0LCJleHAiOjE2Mzc3NDI2MDQsInN1YiI6IjYiLCJzY29wZXMiOltdfQ.EJNOIM281RVKtK9OuZisBJUrqU2f70BujB5ppnRI8QijDsDhtcrjW80hiQYd26CLcjG1GLJsrwGFnwmNblr3aeeuaXRI5yxAAKHyFkd0WZR2JGmx229y7GzSUdJkc_fejAe6S3fR5xZ-xBchmehPv2gHA5qGciFP2g7SgEmEDNJelnxbq9GmB7iQ7c6DQP_VxdmYQ6UzaqRazOGjW7Dz-MeoGJ0CwmI6pcZYIGeIRcMzbZ4oqyun_pIUlhk_a860O40M56tE0PWBtXlhp1dJ34ofe8dJdYP3Ra_kplmRk9Kj6_ood69Ziwz_lixXIv5R7SebWVz1096QdOLPWCVWn6X8-c2dispasbmMup0qJWHbChcjp0YX6NV3zOTm4Csj4azzmQlftn1aIiH9y2rFA-7v_u6sESdJrPZ0WBERt5qXnO6vc8Owfh3Y16krfSG5YsJn2hlk6gMnspQpP5OFx0LmTs9n5qOpwNsYK3zoIAXQReXCRCKA3K_MsriczFjT9ARePCsGDafk6OOWnGIdb22NtBFq1B4B1PfZBN01mS59mcvJP1sdjuqP9SphDTYNv-rtLMdDGLR-3ao0HaDe3vHDab8s5rD1v-wiE3GExaogmM1dpLOkB58R7MKUAZ07oOGhD67jm_OFN1TsGYrMfGeDO5QrIUX7XPzIud_edCk', 0, '2020-11-24 03:00:04', '2020-11-24 03:00:04', '2021-11-24 08:30:04'),
('91c792d77b609d1dbc136ea34b3ff5894c7c34ecaf93f174a30e7b41c2b30a35e723eb017d8f54e5', 10, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiI5MWM3OTJkNzdiNjA5ZDFkYmMxMzZlYTM0YjNmZjU4OTRjN2MzNGVjYWY5M2YxNzRhMzBlN2I0MWMyYjMwYTM1ZTcyM2ViMDE3ZDhmNTRlNSIsImlhdCI6MTYwODExMzI0MywibmJmIjoxNjA4MTEzMjQzLCJleHAiOjE2Mzk2NDkyNDMsInN1YiI6IjEwIiwic2NvcGVzIjpbXX0.daQXOOrwY_eFejATBroBOmR7ROiz9mhnxnBBuca_2nL28oq20j9bzjQk1JWuURxB3ZLQ7ohYEpQJI0g9s1p08sWc8MOWvXUawQnlNeWIk2khzYlyCfq7ubGxsDUAfBV30bfO4_seoSvGf03yQ2Bj20IWoM8870UpybcUWAj-7LEPq7-DeJYOKITZfpeDymTSAzbZ1RXTk_FfzAxFQwiz97g7rtJs8_QMY-7V5qF6t0oo0DsDj2oqTn-TVLMfnXgR1Ov8y30kZRlW_gq_zMTs0noxLPITry4_Rd651EdTrGrxZrLnqEcqhIzOWEc75PPWazBio7-Xv69SjlkDNyCxhWgU3bdPbhYt933XkxR0Ss6vz2sX8-Rxj7Wp8KWdLdrI_xMIh3HsdVTkPj5nVcsGaLZfSKIgFLx7XWi0HxUeH4Uojj72g8Eh3aF0ARX3s4cCCftvYRlY48Gt_PfhJeefHtmTpcvLjKsFXCfjHqMBMTjYdTyDH1EEd6W82BJ0bqBG1F5h-OmshhKF2c3ZdhvkL6TDxcZyfoBzWalWrWv4iLlGI4q9vYoJqTrWqPiRl2ZyzA4OyjZxhAXyNkDJnpmISUhjAEjjWL3Yg6nBEeN1kUUU-zldkQKrBZRn-BchjcsWtwOsGEOuw2hESMQX_VglcaHwm_a_SXTOpL5xNMfC2xQ', 0, '2020-12-16 04:37:23', '2020-12-16 04:37:23', '2021-12-16 10:07:23'),
('ad6130f9ac82e203634f47861e054e9d08f0bc2f96f407b65768dfdf64ec26fb7fdf7fffb69f928b', 2, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiJhZDYxMzBmOWFjODJlMjAzNjM0ZjQ3ODYxZTA1NGU5ZDA4ZjBiYzJmOTZmNDA3YjY1NzY4ZGZkZjY0ZWMyNmZiN2ZkZjdmZmZiNjlmOTI4YiIsImlhdCI6MTYwNTAwOTE3NSwibmJmIjoxNjA1MDA5MTc1LCJleHAiOjE2MzY1NDUxNzUsInN1YiI6IjIiLCJzY29wZXMiOltdfQ.s50Lmm9ZxThnpmO-qnsjvWxjgc8D52bc-tHXurOUAPyu99_73o3eRi9kI-DHvwiD8hbeVylpK8JuW5jFyG5LoR-M0UxfdPxvUl2PZwxOvVf8vvy2q3YvN3TMJpvKW34dgYw0Wg2lm18vcO4jumM19UfOAUHgvzcYdRdcLObi84T6IWVybA7moJnjKBtuOqYjSheu6I-n-sbBWpTftiQ94SJPqUCdrVx7T5TpmND6OevNH4jeDABQvWVRAYc3XTp3cTgQ9OpICNFb3ba_s8Uz2UiIgxkuF7czRhTu1s0_Mtb3LzdhLtMOXL6AvgdUiL8kIANczEjy-R8zXSxuX8FTOSxi5aQNL6wxVnXKPO3pGNsfJyN4N8t5rnqFz7lFc6Cb31rq6c2ALQDqkNhHjC9i1ts-zQ7W4VH1mU5BzWslXcPa_Uc9K3kr72tIaqQo0GIdcv50m6sGpzRtbm_A_VBlhskRQ4rMrcN31pT_QrO3GLPsCraUep3UB4Uuwz_3RkAY_XC1oGB93ahOQ58T-owAyVmPxBucynzHz_oVDrfolCjtZtEj1kgcTIpoD0Nfg8Lh6W6xk-wPIl4S0vKWmqZCv072g6i1dTVR6cDatb1F2E-yqk53fD7bOTf-QwM3a8jy4BhjniWB7RM-N0dKMx5eyNxC5TTRSQWE2V_hyTkR2qg', 0, '2020-11-10 06:22:55', '2020-11-10 06:22:55', '2021-11-10 11:52:55'),
('b71d9f31f1c7df6730dda5384c2f7194d6440efa381f812ae0be9881d8b07c35abf4f4f24af88a48', 1, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiJiNzFkOWYzMWYxYzdkZjY3MzBkZGE1Mzg0YzJmNzE5NGQ2NDQwZWZhMzgxZjgxMmFlMGJlOTg4MWQ4YjA3YzM1YWJmNGY0ZjI0YWY4OGE0OCIsImlhdCI6MTYwMzg2MjAzMiwibmJmIjoxNjAzODYyMDMyLCJleHAiOjE2MzUzOTgwMzIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.xQqWgGAQj_krCwlfPdvs8Wecb4QCRlz0US0yvB9jk0Hmq0modgDukdbTWFoScOki3ormXbbLvKptiXObgiV6zBRyIL5E_55qeZGVtjockYrWUaPPfqTLTUy9BUmzo0sie5MzD5P90JBVUxNok0XCvhONV_atIKdP2c_k3uAW8RHFipwSqGUkKR6QiqaC1rihQSjg3gOQ6BybbsWDv5fXVdB7OSprkuhc0T_6wPj2DQd17a314TCiSasJTNXOZJyOO6-Cy4JHJhhF-0Mz4JKb5sPZZ_pOfmUMLBvrDgf4xXFNDs-m94XR4CpKNeGT84dtA90N0hw8nIf-I8IKXJNRpBI_fyCMSH5sY3v20WPVwZlDSmjB1yAj323eeTr7upbI98mr6Z7YWsBr-U2BDYZ0DeG2sKIXL2josJ9iIlUQJmDEdgUvD1GlQRkvILQgoBqTdDBdk4RCzbvcbCu8PoU1nksmJG6m5lDFUiqAODf234QMKTFf643WIJl9fzWOncVIYhsPSyvqM8kgSvQCeDB4Mcohb0g3npIbGCehXglS6NRRE9ftovKgqCvJFTNkAjo5fprOR7QfJ4T15Z4LZh9lPUHbO4ZAyTQ-KAnocsjjOLfZP2omKl_mlAULMycXlY_LBkSl84iiPMBediHtRgHZfDKP4wQWJFs4_ct1lF6cnJg', 0, '2020-10-27 23:43:52', '2020-10-27 23:43:52', '2021-10-28 05:13:52'),
('bcddf0c7e44dfce6fc1b389db065810233309f2583f9659a8d51dc50dab747fa09e47f49e344b921', 5, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiJiY2RkZjBjN2U0NGRmY2U2ZmMxYjM4OWRiMDY1ODEwMjMzMzA5ZjI1ODNmOTY1OWE4ZDUxZGM1MGRhYjc0N2ZhMDllNDdmNDllMzQ0YjkyMSIsImlhdCI6MTYwNjIwNjU5MCwibmJmIjoxNjA2MjA2NTkwLCJleHAiOjE2Mzc3NDI1OTAsInN1YiI6IjUiLCJzY29wZXMiOltdfQ.a4Y76dr6r08nd-SLLj58ZOvgfgKqgMOUi10mBm_CF7TG-LIYS1ZA0PzXaYiFIy1XwPFRrjY9AfAS0EcgDQ98g8kWUPbGSLlZrIrrEq7enZKBLnrEcP0n7Js2swLMaTZ-VSGVj28wWDT_dxN8qYqKao5ejaGqCmmDQ_xUmdUY09PTMwXfV9BuexTnf0ZtaqDE7bLRhrjFuENu1kXdAEbnk7X7DGHBSlqLk1371K3BsQYRgYSVR9OgmQYzKdXSfmxrAHtxufsPm7OMMyQBysim2KBLeCohSIWu4nRAI_zTGsYcaDPdO9rClEEafhcgQZzFNod3PcwdGqYlSYRLf90evZI1t62KLuOt7VrJdsVZwskRpSS0o-D1XPHa5sc9K8x8eoL5lKiQaC6HOuBqz8nQSa1fX-s88u5AIyP4CErQlYhcoX7q4JUiuRX4mxd_oxnSP3d5ZNnaaphEsjYx9kEjOMO7bp6VM2vfJ7_-Nj7zsfeorax35NhAimZs7_FMkG-1hIp5zaMXppsXht0ofVndfoFEAtpurN9M-w45GzEzx1q5rJKN6zZVfSbdgWwiQ9J0RkgTTqLPS7YiL0t1VOfBO1YrTgGj_KhUZyxSfJwn2pOLxXKvhQYEPojE9W_IhAswKYuSNBv1sbmRcch7cjS6gMf_i7-Y08bsYuKM1JVYE9c', 0, '2020-11-24 02:59:50', '2020-11-24 02:59:50', '2021-11-24 08:29:50'),
('c6c3e66755c465be3bb5ec059bc7b3957c6e28ff0934600f7b35335bf60c23b04ad329ec8c905e3f', 7, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiJjNmMzZTY2NzU1YzQ2NWJlM2JiNWVjMDU5YmM3YjM5NTdjNmUyOGZmMDkzNDYwMGY3YjM1MzM1YmY2MGMyM2IwNGFkMzI5ZWM4YzkwNWUzZiIsImlhdCI6MTYwNjIwNjYyNSwibmJmIjoxNjA2MjA2NjI1LCJleHAiOjE2Mzc3NDI2MjUsInN1YiI6IjciLCJzY29wZXMiOltdfQ.MA-zJQxO5UOJtso1BRdr3ggO6XMLOocvxm1uGpYPSGO-c3C0zMmhwhndkCXJYvnQdzl0fQp52hnUQUkkDSnVs557kh5ZsmidBMAHayOUk2Xu7oBqFwm0HqR6SxGrvq-PT08KbTOnQvFVl5QZ2Urkif8veWvCY1vTrdttw_zCQY08luzylX6HLgdBfcEVY6bQxi5iunsQH2Y5eSM8y0JpJJelrauPrEZYDa52eoeNqFZo3FWuRHatx6QiRXCP3lp8lyG2ZpusZcsYXepIUOadIujvUrUueZANsSCAX_L9ryKDoCUf2HsRvZHCF2rDJZthzu_cLHvCRsjr6Gn_p13kZhS29fekoNW9l0grzMEY3e8YXH9XyVTIECVr0UkSdiL8GXGA0zn602gBuwnhdsuu6II8bLu7sxPtG474krVQwxvI1FfcIS-X7XWusVg7oO7jPDlwxPtD-s4Jho_B_4bxgBAIA1M_tJoskXfn_RbDP6xUM2Cae6Mh5AM33ZJGdo8badJcm9uf0JPReWPRJW9A0GT5LCxeJdukbeTMgSycL0nLmHO0l3VyRH5ttTmIhdYWQd2X4t22m5_r1r5CornYbdoUseJAU_KwRvG4U1_ukxL7zJRYXsVagosPRsKPJeBnXzmUMbQFa6MJSF2rkh3lSdQAY6DFyLObZtejnU8ljLE', 0, '2020-11-24 03:00:25', '2020-11-24 03:00:25', '2021-11-24 08:30:25'),
('e2b38a2bfbff3ec0d62e4dfca31939c831d351e28ae8459c77ea6dc2b7814ef0590d519c457a4476', 9, '9174f9d9-ba7e-4058-a610-245d70159140', 'MyApp', '[]', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTc0ZjlkOS1iYTdlLTQwNTgtYTYxMC0yNDVkNzAxNTkxNDAiLCJqdGkiOiJlMmIzOGEyYmZiZmYzZWMwZDYyZTRkZmNhMzE5MzljODMxZDM1MWUyOGFlODQ1OWM3N2VhNmRjMmI3ODE0ZWYwNTkwZDUxOWM0NTdhNDQ3NiIsImlhdCI6MTYwODExMzE1NiwibmJmIjoxNjA4MTEzMTU2LCJleHAiOjE2Mzk2NDkxNTUsInN1YiI6IjkiLCJzY29wZXMiOltdfQ.OsZsO0Jy2GnPtGh7Qm0wQW8GwzzAQTxB77COOQoxmuVEf1ymvVJB0MYaTubd5p4GQlmsnzFj0FuMFwdOv0KH3GhNQ-hH1hWnZLJTZsbsFJ-tCVSZeMnUTvH3B6qPf-BLnWGM8G1ViRxmIu7Lq8RNvRWfHiVNqqSqsr7f17oFU7aCHp_KS6Q7bENuaqaWB_zBKRSdI_GUvEBoEUXsiBdmlMLmMZKErRfiCo4FTwpktCywr1L4-CSg5KENS-gFvmnFYj0VkSSTqH9zypd4WnJh1FPn7D0fpzbj1C_MRuWui2E8PeFPt3RypmHUB5TqEAVcsrM5pFsolJk_Eb5Ud7AYgd9d3EwUEpINzMPOtXfeeIZD4rOSFzal-ZtKbaZueXSKa4xbddNTY5J6IqFXZP-cYZRnJUB-4aESTxEFh6Npjosy5BHAQC_r-iTI0EVlL4PKy-9ABj8dCcQ5lfgxC9CyebpBKIvLIr_hPaYQUt16PD-ln5FgdqmH6jMmPJx3TUnjj9ZgIARGSUSXJvo_S3KPlSDJgqHGP-RQsjYdSNvWeQE9K44ZoH8OSBsk-Q2z9AcZcTjgSCPn28E7NmXYUac6KrWNVyAyI1RB1EUUk8QIf84lBv3_O-PsYEp_RCfnQt7P85TKIsia-GSvmaSqAEsj0l5kWixpYg3OIKlBd62mGec', 0, '2020-12-16 04:35:55', '2020-12-16 04:35:55', '2021-12-16 10:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
('9174f9d9-ba7e-4058-a610-245d70159140', NULL, 'client', 'wJz3ruqEJ07hjut2r2VOSbUnu6BTscK3YDHWoel9', NULL, 'http://localhost', 1, 0, 0, '2020-09-05 08:55:40', '2020-09-05 08:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '9174f9d9-ba7e-4058-a610-245d70159140', '2020-09-05 08:55:40', '2020-09-05 08:55:40');

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
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `quantity` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','shipping','complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `quantity`, `total`, `transaction_id`, `status`, `payment`, `created_at`, `updated_at`) VALUES
(1, 1, 21, '1', '500', '125304', 'shipping', 'true', '2020-11-02 01:19:03', '2020-12-10 13:10:56'),
(2, 2, 12, '1', '500', '125304', 'pending', 'true', '2020-12-10 11:03:33', '2020-12-10 13:07:20'),
(3, 6, 5, '1', '500', '125304', 'complete', 'true', '2020-12-10 11:05:17', '2020-12-10 13:14:25'),
(4, 3, 5, '1', '500', '125304', 'pending', 'true', '2020-12-10 11:05:22', '2020-12-10 13:07:26'),
(5, 4, 7, '1', '500', '125304', 'complete', 'true', '2020-12-10 11:05:27', '2020-12-10 13:07:03'),
(6, 5, 7, '1', '500', '125304', 'complete', 'true', '2020-12-10 11:05:31', '2020-12-10 13:15:29'),
(7, 1, 22, '1', '500', '125304', 'pending', 'true', '2021-01-24 04:37:19', '2021-01-24 04:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `content_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` bigint(20) DEFAULT NULL,
  `month` bigint(20) DEFAULT NULL,
  `day` bigint(20) DEFAULT NULL,
  `count_duration` bigint(20) DEFAULT NULL,
  `time_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `price`, `module_type`, `image`, `detail`, `category_id`, `content_count`, `year`, `month`, `day`, `count_duration`, `time_method`, `created_at`, `updated_at`) VALUES
(1, 'ankit ramani', '20000', '1', 'package/1604316865.jpg', '<p>                              test                                   \r\n                                                        </p>', NULL, '2', NULL, NULL, 5, 5, 'day', '2020-11-02 06:04:29', '2020-11-02 06:04:29'),
(2, 'admin', '8000', '1', 'package/1604316997.jpg', '<p>test          \r\n                                                        </p>', NULL, '4', NULL, 3, NULL, 3, 'month', '2020-11-02 06:06:45', '2020-11-02 06:06:45'),
(4, 'krishna', '8000', NULL, 'package/1604317101.jpg', '<p>      test                                                  \r\n                                                </p>', NULL, NULL, NULL, NULL, 5, 5, 'day', '2020-11-02 06:08:25', '2020-11-02 06:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$QRfZ8UUfZulf.yKJc.C/xeUuke13EZt5P4UN8ARjO2RI6TzQqfbV.', '2020-11-06 11:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pdf_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `cat_id`, `pdf_name`, `file`, `price`, `detail`, `token`, `created_at`, `updated_at`) VALUES
(1, 7, 'dd', 'pdf/5o2l7YTEhxNc1KK7CRNlZkenUUeVvzdNrOLDuElV.pdf', '20000', '<p>tets</p>', '1', '2020-11-02 04:45:37', '2020-11-02 04:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_id` text COLLATE utf8mb4_unicode_ci,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `to_approve` int(11) DEFAULT '0',
  `CreatedBy` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `product_name`, `detail`, `mobile`, `price`, `quantity`, `video`, `brand`, `sponsor_id`, `token`, `to_approve`, `CreatedBy`, `created_at`, `updated_at`) VALUES
(15, 4, 'Choli Dr2', '<p>                                                        </p><p>                                                   </p><p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી\r\n                                                </p><p>\r\n                                                </p>', '9824768144', '000', '00', NULL, '3', NULL, '0', NULL, 1, '2020-09-03 11:43:20', '2021-01-22 03:48:20'),
(21, 16, 'SEMPU Chair', '<p>  <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                      </p><p><br></p><p>\r\n                                                </p>', '9274200008', '000', '00', NULL, '14', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:23:08', '2020-10-14 05:32:14'),
(22, 16, 'WOCH', '<p>                                                        </p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p><p>\r\n                                                </p>', '9274200008', '000', '00', NULL, '14', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:25:17', '2020-10-14 05:32:45'),
(23, 16, 'Chair Card', '<p>  <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                     </p><p>\r\n                                                </p>', '9274200008', '000', '00', NULL, '14', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:26:56', '2020-11-04 22:49:11'),
(25, 20, 'LIPO WEX', '<p>  <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                   </p><p>\r\n                                                </p>', '9824878547', '000', '00', NULL, '10', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:40:53', '2020-10-14 05:34:57'),
(26, 20, 'LIPO WEX', '<p>      <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                               </p><p>\r\n                                                </p>', '9824878547', '000', '00', NULL, '10', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:43:08', '2020-10-14 05:35:26'),
(27, 20, 'SIRAM', '<p>                                                        </p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>\r\n                                                </p>', '9824878547', '00', '00', NULL, '10', 'Choose sponsor', '1', 1, 1, '2020-09-03 12:45:01', '2020-10-05 07:47:43'),
(28, 16, 'Chair - 285', '<p>HVHGVKHGKHGKHGKH</p>', '9374898999', '000', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:50:29', '2020-09-23 05:20:07'),
(29, 16, 'Chair - 282', '<p>  <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                  </p><p>\r\n                                                </p>', '9374898999', '000', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:52:43', '2020-10-14 05:36:20'),
(30, 16, 'shampoo chair - 303', '<p>      <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                               </p><p>\r\n                                                </p>', '9374898999', '000', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:54:20', '2020-10-14 05:36:49'),
(32, 16, 'trolly', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                     </p><p>\r\n                                                </p>', '9374898999', '000', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-03 12:57:16', '2020-10-14 05:37:19'),
(34, 10, 'amboda', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                </p><p>\r\n                                                </p>', '9265532727', '000', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-09-06 13:15:16', '2020-10-14 05:38:24'),
(35, 10, 'amboda', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                     </p><p>\r\n                                                </p>', '9265532727', '0000', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-09-06 13:18:29', '2020-10-14 05:38:52'),
(36, 10, 'amboda', '<p>                                                      </p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>\r\n                                                </p>', '9265532727', '0000', '000', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-09-06 13:20:17', '2020-10-14 05:39:20'),
(37, 10, 'veni', '<p>   <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                    </p><p>\r\n                                                </p>', '9265532727', '0000', '000', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-09-06 13:21:49', '2020-10-14 05:39:44'),
(38, 10, 'veni', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                       </p><p>\r\n                                                </p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-09-06 13:25:11', '2020-10-14 05:40:33'),
(39, 10, 'Amboda', '<p>   <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                   	</p><p>\r\n                                                </p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-09-06 13:29:01', '2020-10-14 05:41:34'),
(40, 10, 'amboda', '<p>      <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                               </p><p>\r\n                                                </p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-09-06 13:32:12', '2020-10-14 05:42:25'),
(41, 10, 'Switch', '<p> <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                    </p><p>\r\n                                                </p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '1', 1, 1, '2020-09-06 13:34:16', '2020-10-14 05:43:48'),
(43, 10, 'Flower Pithi set', '<p>   <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                  </p><p>\r\n                                                </p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '1', 1, 1, '2020-09-06 13:38:12', '2020-10-14 05:47:29'),
(44, 10, 'amboda', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                   </p><p>\r\n                                                </p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '1', 1, 1, '2020-09-06 13:41:30', '2020-10-14 05:48:11'),
(45, 16, 'Wall Clock', '<p> <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                      </p><p>\r\n                                                </p>', '9274200008', '000', '00', NULL, '14', 'Choose sponsor', '1', 1, 1, '2020-09-06 23:32:15', '2020-10-14 05:48:44'),
(46, 16, 'Razor', '<p>     <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                </p><p>\r\n                                                </p>', '9274200008', '00', '00', NULL, '14', 'Choose sponsor', '1', 1, 1, '2020-09-06 23:33:43', '2020-10-14 05:50:31'),
(53, 13, 'face wash', '<p>        <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                            </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-09-10 12:33:02', '2020-10-14 05:56:02'),
(54, 13, 'Ac clean', '<p>       <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                             </p><p>\r\n                                                </p>', '9879457766', '000', '00', NULL, '7', 'Choose sponsor', '1', 1, 1, '2020-09-10 12:37:33', '2020-10-14 05:58:04'),
(57, 13, 'skin serum 7in1', '<p>                                                        </p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-09-11 08:38:02', '2020-10-14 06:05:18'),
(59, 16, 'shampoo chair - 2', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                     </p><p>\r\n                                                </p>', '9274200008', '00', '00', NULL, '14', 'Choose sponsor', '0', 1, 1, '2020-09-23 05:01:31', '2020-10-14 06:07:05'),
(67, 13, 'hom cer', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર 1૦% ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-09-26 05:37:21', '2020-09-26 05:37:21'),
(68, 16, 'Trolly', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p>', '9327908910', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-26 06:33:09', '2020-10-14 06:15:36'),
(69, 16, 'Torlly', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p>', '9327908910', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-26 06:37:57', '2020-09-26 06:37:57'),
(70, 16, 'Torlly', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p>', '9327908910', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-26 08:22:15', '2020-09-26 08:22:15'),
(71, 16, 'Torlly', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p>', '9327908910', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-26 08:24:29', '2020-09-26 08:24:29'),
(73, 16, 'washbesin', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p>', '9327908910', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-09-26 08:30:46', '2020-09-26 08:30:46'),
(74, 10, 'side broch', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                     </p><p>\r\n                                                </p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-05 06:53:09', '2020-10-14 06:17:09'),
(75, 10, 'simple flower', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-05 07:01:40', '2020-10-05 07:01:40'),
(76, 13, 'golden shiner', '<p>  <span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>                                                    </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-05 07:26:49', '2020-10-14 06:18:49'),
(78, 35, 'Eyebrow grow oil', '<p>                                                       </p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</span>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-06 07:07:55', '2020-10-14 06:20:05'),
(81, 16, 'salun chair', '<p> આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી\r\n                                                </p>', '9274200008', '00', '00', NULL, '14', 'Choose sponsor', '0', 1, 1, '2020-10-08 06:36:56', '2020-10-14 06:21:15'),
(82, 16, 'SEMPU CER', '<p>   આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                    </p><p>\r\n                                                </p>', '9274200008', '00', '00', NULL, '14', 'Choose sponsor', '0', 1, 1, '2020-10-08 06:53:58', '2020-10-14 06:21:49'),
(83, 16, 'SEMPU CER', '<p>    આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                               \r\n                                                </p>', '9274200008', '00', '00', NULL, '14', 'Choose sponsor', '0', 1, 1, '2020-10-08 06:56:19', '2020-10-14 06:22:44'),
(84, 13, 'oxy shainer', '<p>      આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                 </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-08 07:44:20', '2020-10-14 06:23:31'),
(85, 13, 'sleeping serum', '<p>                           </p><p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-08 07:56:46', '2020-10-14 06:24:12'),
(87, 10, 'veni', '<p>  આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                     </p><p>\r\n                                                </p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-08 08:35:13', '2020-10-14 06:25:16'),
(88, 10, 'amboda', '<p>  આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                      </p><p><br></p><p>\r\n                                                </p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-08 10:47:14', '2020-10-14 06:26:03'),
(91, 13, 'oxy D-tan', '<p>         આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                           </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-12 06:53:22', '2020-10-14 06:26:32'),
(93, 10, 'amboda', '<p>                                                   \r\n      આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                          </p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-12 07:08:22', '2020-10-14 06:27:05'),
(94, 10, 'amboda', '<p>    આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                </p><p>\r\n                                                </p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-12 07:14:34', '2020-10-14 06:27:32'),
(95, 13, 'Facial Foam(Skin Whitening)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                     </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-12 07:20:37', '2020-10-14 06:28:11'),
(96, 13, '3 in 1 (scrub,cream,pack)', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                       </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-12 07:27:17', '2020-10-14 06:28:39'),
(97, 13, 'Hadra sps(mask)', '<p>    આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                  </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-12 07:29:46', '2020-10-14 06:29:17'),
(98, 13, 'Facial Whitening', '<p>                                                        </p><p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p>\r\n                                                </p>', '9265532727', '00', '00', NULL, '7', NULL, '0', 1, 1, '2020-10-12 07:47:45', '2020-11-08 11:25:06'),
(99, 13, 'Facial Alo Herbal kit', '<p> આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                     </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-12 07:51:56', '2020-10-14 06:30:21'),
(100, 13, 'Facial oxy plarl', '<p>   આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                      </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-12 08:02:23', '2020-10-14 06:31:05'),
(110, 13, 'Derma skin (face wahs)', '<p>     આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                </p><p>\r\n                                                </p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-13 07:25:56', '2020-10-14 06:40:28'),
(122, 13, 'soothing gel', '<p>                                                      </p><p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી\r\n                                                </p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-13 08:26:49', '2020-10-14 06:53:58'),
(123, 13, 'Ander arms whitener gel', '<p>                                                        </p><p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p>\r\n                                                </p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-13 08:31:14', '2020-10-14 06:54:36'),
(124, 18, 'Switche', '<p>      આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી                                                 </p><p>\r\n                                                </p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-13 08:38:35', '2020-10-14 06:58:14'),
(126, 35, 'Shampoo (damage repair)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:07:24', '2020-10-14 07:07:24'),
(128, 35, 'Shampoo (hair protein)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:29:06', '2020-10-14 07:29:06'),
(129, 35, 'Shampo (clean dandruf)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:31:59', '2020-10-14 07:31:59'),
(130, 13, 'Face wash (dermal skin)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:34:01', '2020-10-14 07:34:01'),
(131, 35, 'Hair oil (clean dandruff)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:36:35', '2020-10-14 07:36:35'),
(132, 35, 'Combo pack (hair oil & shampoo)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:40:08', '2020-10-14 07:40:08'),
(133, 35, 'Gold hair serum', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:44:23', '2020-10-14 07:44:23'),
(134, 35, 'Crystal hair serum', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:45:40', '2020-10-14 07:45:40'),
(135, 35, 'Hair oil (hair protein)', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:46:55', '2020-10-14 07:46:55'),
(136, 35, 'Hair oil (smoting)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 07:48:49', '2020-10-14 07:48:49'),
(137, 13, 'Face wash (deram skin)', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:00:46', '2020-10-14 08:00:46'),
(138, 13, 'Serum color corrector', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:08:04', '2020-10-14 08:08:04'),
(139, 13, 'Sun safe serum', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:09:32', '2020-10-14 08:09:32'),
(140, 13, 'A.c.clean face pack', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:11:15', '2020-10-14 08:11:15'),
(141, 13, 'Gel under eye', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:13:20', '2020-10-14 08:13:20'),
(142, 13, 'Cream new age', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:17:00', '2020-10-14 08:17:00'),
(143, 13, 'Face pack (skin whitening)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:19:47', '2020-10-14 08:19:47'),
(144, 13, 'moisturizer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:21:35', '2020-10-14 08:21:35'),
(145, 13, 'moist glow (senso skin)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:33:07', '2020-10-14 08:33:07'),
(146, 13, 'moist glow(spf 15++', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:35:24', '2020-10-14 08:35:24'),
(147, 13, 'Serum new age', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:38:57', '2020-10-14 08:38:57'),
(148, 13, 'Soothing gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:47:12', '2020-10-14 08:47:12'),
(149, 13, 'Anderarm whitener gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:48:46', '2020-10-14 08:48:46'),
(150, 13, 'Acen & pimpel gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:50:30', '2020-10-14 08:50:30'),
(151, 35, 'Elida hair oil(dandruff control)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:52:46', '2020-10-14 08:52:46'),
(152, 13, 'Face clean cream', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-14 08:54:28', '2020-10-14 08:54:28'),
(153, 35, 'Hair oil', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9824878547', '00', '00', NULL, '10', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:00:30', '2020-10-14 09:00:30'),
(157, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:28:39', '2020-10-14 09:29:50'),
(158, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:31:15', '2020-10-14 09:31:15'),
(160, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:34:14', '2020-10-14 09:34:14'),
(161, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:36:56', '2020-10-14 09:36:56'),
(162, 10, 'amboda broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:40:27', '2020-10-14 09:40:27'),
(163, 10, 'amboda broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:41:33', '2020-10-14 09:41:33'),
(164, 10, 'amboda broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:42:46', '2020-10-14 09:42:46'),
(165, 10, 'amboda broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:43:44', '2020-10-14 09:43:44'),
(166, 10, 'amboda broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-14 09:45:04', '2020-10-14 09:54:54'),
(167, 10, 'amboda broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-15 05:12:04', '2020-10-15 05:12:04'),
(175, 9, 'Product brosar', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:29:31', '2020-10-15 06:53:40'),
(176, 9, 'Lipastick brosar', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:31:11', '2020-10-15 06:54:16'),
(177, 9, 'product brosar', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:42:31', '2020-10-15 06:47:46'),
(178, 9, 'Foundation Product brosar', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:45:55', '2020-10-15 06:53:00'),
(179, 9, 'product brosar', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:49:01', '2020-10-15 06:49:01'),
(180, 9, 'Product brosar', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:50:10', '2020-10-15 06:50:10'),
(181, 9, 'Product brosar', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:51:07', '2020-10-15 06:51:07'),
(182, 9, 'Product brosar', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9099404065', '00', '00', NULL, '24', 'Choose sponsor', '0', 1, 1, '2020-10-15 06:52:01', '2020-10-15 06:52:01'),
(183, 9, 'Moisturizer (aquva blast)', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 07:43:09', '2020-10-15 07:43:09'),
(184, 9, 'Baking powder', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 07:44:43', '2020-10-15 07:44:43'),
(185, 9, 'Eye shadow palette', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 07:47:18', '2020-10-15 08:03:53'),
(186, 9, 'Eye shadow palette', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 07:50:53', '2020-10-15 08:05:04'),
(187, 9, 'Glitter', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 07:53:25', '2020-10-15 07:53:25'),
(189, 9, 'Hush blush', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 07:59:39', '2020-10-15 07:59:39'),
(190, 9, 'Lip palette', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 08:02:44', '2020-10-15 08:03:18'),
(191, 9, 'Mate eye shadow', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 08:06:52', '2020-10-15 08:06:52'),
(192, 9, 'Moisture make up lotion', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-15 08:09:19', '2020-10-15 08:09:19'),
(194, 9, 'Flawless blender', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 06:57:18', '2020-10-16 06:57:18'),
(195, 9, 'Accupro eye liner', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:01:54', '2020-10-16 07:01:54'),
(196, 9, 'PAC Highlightr', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:04:15', '2020-10-16 07:04:15'),
(197, 9, 'PAC primer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:08:57', '2020-10-16 07:08:57'),
(198, 9, '25 brush set', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:10:43', '2020-10-16 07:15:30'),
(199, 9, 'PAC cake liner', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:17:39', '2020-10-16 07:17:39'),
(200, 9, 'Beauty blender', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:19:08', '2020-10-16 07:19:08'),
(201, 9, 'Clean slate wipes', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:20:50', '2020-10-16 07:20:50'),
(202, 9, 'PAC cleansing gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:22:14', '2020-10-16 07:22:14'),
(203, 9, 'PAC peel off', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:23:39', '2020-10-16 07:23:39'),
(204, 9, 'Double volume mascara', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:25:16', '2020-10-16 07:25:16'),
(205, 13, 'Haldi facial kit', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:30:50', '2020-10-16 07:30:50'),
(206, 35, 'Hair oil', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:32:13', '2020-10-16 07:33:59'),
(207, 13, 'Pear', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', 'Choose sponsor', '0', 1, 1, '2020-10-16 07:33:28', '2020-10-16 07:33:28'),
(217, 13, 'Face wash gel', '<p>આ પ્રોડક્ટ ઉપર૫ ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:03:54', '2020-10-16 08:03:54'),
(218, 13, 'Fat burn cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:05:18', '2020-10-16 08:05:18'),
(219, 13, 'Pigmentation  gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:10:42', '2020-10-16 08:12:54'),
(220, 13, 'soft heels cream', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:14:20', '2020-10-16 08:14:20'),
(221, 13, 'under eye gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:16:02', '2020-10-16 08:16:02'),
(222, 35, 'Tripple action shampoo', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:19:19', '2020-10-16 08:19:19'),
(223, 35, 'Hair oil', '<p>આ પ્રોડક્ટ ઉપર ૫૦%ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:20:43', '2020-10-16 08:20:43'),
(224, 13, 'Wrinkle remover gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:22:16', '2020-10-16 08:22:16'),
(225, 13, 'Body acne gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:23:36', '2020-10-16 08:23:36'),
(226, 13, 'Puff eye gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:24:50', '2020-10-16 08:24:50'),
(227, 13, 'Pore reducer gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9300850933', '00', '00', NULL, '20', 'Choose sponsor', '0', 1, 1, '2020-10-16 08:26:24', '2020-10-16 08:26:24'),
(241, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 05:59:13', '2020-10-17 05:59:13'),
(242, 10, 'switch bits', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:00:34', '2020-10-17 06:00:34'),
(243, 10, 'Flowor bits', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:02:03', '2020-10-17 06:02:03'),
(244, 10, 'amboda switch', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:03:04', '2020-10-17 06:03:04'),
(245, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:03:46', '2020-10-17 06:03:46'),
(246, 10, 'switch', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:05:01', '2020-10-17 06:05:01'),
(247, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:06:11', '2020-10-17 06:06:11'),
(248, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:07:12', '2020-10-17 06:07:12'),
(249, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:07:52', '2020-10-17 06:07:52'),
(250, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:08:27', '2020-10-17 06:08:27'),
(251, 10, 'Saidar broach', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-17 06:11:26', '2020-10-17 06:11:26'),
(252, 13, 'Moisturizing lotion (Aroma)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9375777666', '00', '00', NULL, '17', 'Choose sponsor', '0', 1, 1, '2020-10-19 05:57:39', '2020-10-19 05:57:39'),
(253, 35, 'Brazilian thermal Reconstruction', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9375777666', '00', '00', NULL, '17', 'Choose sponsor', '0', 1, 1, '2020-10-19 05:59:02', '2020-10-19 05:59:43'),
(254, 13, 'Formalted based on your skin type', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9375777666', '00', '00', NULL, '17', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:01:12', '2020-10-19 06:01:12'),
(255, 9, 'Red & black Pro cosmetics', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9375777666', '00', '00', NULL, '17', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:04:24', '2020-10-19 06:04:24'),
(256, 13, 'O3+ Skin care products', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9375777666', '00', '00', NULL, '17', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:09:20', '2020-10-19 06:09:20'),
(257, 13, 'Shop our best sellers', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9375777666', '00', '00', NULL, '17', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:12:27', '2020-10-19 06:12:27'),
(258, 9, 'Dual fold liquid gel', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:19:50', '2020-10-19 06:19:50'),
(259, 9, 'express brush cleaner', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, 'Choose Brand', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:22:16', '2020-10-19 06:22:16'),
(260, 9, 'Eye serise', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:24:29', '2020-10-19 06:24:29'),
(261, 9, 'Ail eyes this way', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:27:19', '2020-10-19 06:27:19'),
(262, 9, 'Eyebrow Definer (3 colors)', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:31:16', '2020-10-19 06:31:16'),
(263, 9, 'Eyebrow difiner (4 colors)', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:34:00', '2020-10-19 06:34:00'),
(264, 9, 'Eye shsdow primer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:35:22', '2020-10-19 06:35:22'),
(265, 9, 'Floking blender', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:36:50', '2020-10-19 06:36:50'),
(266, 9, 'Fresh color tower', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:37:59', '2020-10-19 06:37:59'),
(267, 16, 'Trolly 101', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:53:26', '2020-10-19 06:56:50'),
(268, 16, 'Trolly 106', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:58:22', '2020-10-19 06:58:22'),
(269, 16, 'Chair 108', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 06:59:48', '2020-10-19 06:59:48'),
(270, 16, 'Chair 107', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:01:12', '2020-10-19 07:01:12'),
(271, 16, 'Trolly 114', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:03:02', '2020-10-19 07:03:02'),
(272, 16, 'Chair 126', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:04:11', '2020-10-19 07:04:11');
INSERT INTO `product` (`id`, `cat_id`, `product_name`, `detail`, `mobile`, `price`, `quantity`, `video`, `brand`, `sponsor_id`, `token`, `to_approve`, `CreatedBy`, `created_at`, `updated_at`) VALUES
(273, 16, 'Trolly 115', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:05:45', '2020-10-19 07:05:45'),
(274, 16, 'Chair 123', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:07:17', '2020-10-19 07:07:17'),
(275, 16, 'Chair 127', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:08:33', '2020-10-19 07:08:33'),
(276, 16, 'Chair 124', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:09:49', '2020-10-19 07:09:49'),
(277, 16, 'Trolly 118', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-19 07:11:25', '2020-10-19 07:11:25'),
(278, 9, 'PAC gjitter', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 05:58:40', '2020-10-20 05:58:40'),
(279, 9, 'PAC glitter', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 05:59:49', '2020-10-20 05:59:49'),
(280, 9, 'PAC Highlightr', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 06:07:44', '2020-10-20 06:07:44'),
(281, 9, 'PAC moisturizer & primer', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 06:35:42', '2020-10-20 06:35:42'),
(282, 9, 'PAC brus cleaner', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 06:47:07', '2020-10-20 06:47:07'),
(283, 9, 'PAC makup fixr', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 06:52:35', '2020-10-20 06:52:35'),
(284, 9, 'Contact lenses', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 06:54:33', '2020-10-20 06:54:33'),
(285, 9, 'PAC lightening toner', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 06:57:08', '2020-10-20 06:57:08'),
(286, 9, 'moisture cream', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 06:58:51', '2020-10-20 06:58:51'),
(287, 9, 'PAC lip palette', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:05:47', '2020-10-20 07:05:47'),
(288, 16, 'stul 131', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:15:34', '2020-10-20 07:15:34'),
(289, 16, 'Chiar 134', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:18:03', '2020-10-20 07:18:03'),
(290, 16, 'chair 128', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:20:26', '2020-10-20 07:20:26'),
(291, 16, 'chair 130', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:21:53', '2020-10-20 07:21:53'),
(292, 16, 'chair 310', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:23:15', '2020-10-20 07:23:15'),
(293, 16, 'chair 306', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:25:27', '2020-10-20 07:25:27'),
(294, 16, 'chair 307', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:29:46', '2020-10-20 07:29:46'),
(295, 16, 'chair 315', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:35:28', '2020-10-20 07:35:28'),
(296, 16, 'chair 312', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કોલ કરવા વિનીતી</p><p><br></p>', '9427217888', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-20 07:36:37', '2020-10-20 07:36:37'),
(297, 16, 'Chair 313', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:18:42', '2020-10-21 06:18:42'),
(298, 16, 'Chair 314', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:27:44', '2020-10-21 06:27:44'),
(299, 16, 'Chair 316', '<p><br></p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:29:08', '2020-10-21 06:29:08'),
(300, 16, 'Chair 320', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:32:11', '2020-10-21 06:32:11'),
(301, 16, 'Chair 318', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:33:34', '2020-10-21 06:33:34'),
(302, 16, 'Chair 319', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:34:52', '2020-10-21 06:34:52'),
(303, 16, 'Chair 329', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:36:04', '2020-10-21 06:36:04'),
(304, 16, 'Chair 231', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:39:28', '2020-10-21 06:39:28'),
(305, 16, 'Chair 322', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:41:40', '2020-10-21 06:41:40'),
(306, 16, 'Chair 322', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:44:06', '2020-10-21 06:44:06'),
(307, 16, 'Chair 325', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:45:05', '2020-10-21 06:45:05'),
(308, 16, 'Chair 327', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:47:41', '2020-10-21 06:47:41'),
(309, 16, 'Chair 502', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:53:00', '2020-10-21 06:53:00'),
(310, 16, 'Bad 500', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:54:19', '2020-10-21 06:54:19'),
(311, 16, 'Bad 501', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:56:11', '2020-10-21 06:56:11'),
(312, 16, 'Chair 504', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 06:58:12', '2020-10-21 06:58:12'),
(313, 16, 'chair 503', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:02:03', '2020-10-21 07:02:03'),
(314, 16, 'Chair 509', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:05:35', '2020-10-21 07:05:35'),
(315, 16, 'Chair 504', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:07:35', '2020-10-21 07:07:35'),
(316, 16, 'Chair 506', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:11:19', '2020-10-21 07:11:19'),
(317, 16, 'tub 604', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:12:47', '2020-10-21 07:12:47'),
(318, 16, 'Tub 602', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:13:47', '2020-10-21 07:13:47'),
(319, 16, 'Tub 603', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:15:58', '2020-10-21 07:15:58'),
(320, 16, 'Chair 901', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:17:08', '2020-10-21 07:17:08'),
(321, 16, 'Tub 605', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:18:08', '2020-10-21 07:18:08'),
(322, 16, 'Chair 801', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:19:10', '2020-10-21 07:19:10'),
(323, 16, 'Chair 902', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:20:14', '2020-10-21 07:20:14'),
(324, 16, 'Chair 903', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:21:17', '2020-10-21 07:21:17'),
(325, 16, 'Chair 904', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:22:11', '2020-10-21 07:22:11'),
(326, 16, 'Chair 305', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:24:51', '2020-10-21 07:24:51'),
(327, 16, 'Chair 304', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:26:25', '2020-10-21 07:26:25'),
(328, 16, 'Chair 286', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:27:51', '2020-10-21 07:27:51'),
(329, 16, 'Chair 285', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:29:03', '2020-10-21 07:29:03'),
(330, 16, 'Chair 281', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:31:00', '2020-10-21 07:31:00'),
(331, 16, 'Chair 280', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:33:26', '2020-10-21 07:33:26'),
(332, 16, 'Chair 274', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:34:30', '2020-10-21 07:34:30'),
(333, 16, 'Chair 267', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:36:47', '2020-10-21 07:36:47'),
(334, 16, 'Chair 264', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:39:05', '2020-10-21 07:39:05'),
(335, 16, 'Chair 262', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:40:03', '2020-10-21 07:40:03'),
(336, 16, 'Chair 261', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-21 07:41:46', '2020-10-21 07:41:46'),
(337, 16, 'Chair 259', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:33:47', '2020-10-22 05:33:47'),
(338, 16, 'Chair 255', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:36:08', '2020-10-22 05:36:08'),
(339, 16, 'Chair 225', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:37:43', '2020-10-22 05:37:43'),
(340, 16, 'Chair 254', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:39:38', '2020-10-22 05:39:38'),
(341, 16, 'Chair 285', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:43:36', '2020-10-22 05:43:36'),
(342, 16, 'Chair 282', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:44:40', '2020-10-22 05:44:40'),
(343, 16, 'chair284', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:46:14', '2020-10-22 05:46:14'),
(344, 16, 'Chair 326', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:49:08', '2020-10-22 05:49:08'),
(345, 16, 'Chair 324', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:50:23', '2020-10-22 05:50:23'),
(346, 16, 'Chair 601', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9374898999', '00', '00', NULL, '13', 'Choose sponsor', '0', 1, 1, '2020-10-22 05:51:59', '2020-10-22 05:51:59'),
(347, 9, 'PAC luxe shadow', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 06:24:17', '2020-10-22 06:31:10'),
(348, 9, 'luxe shadow', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 06:28:18', '2020-10-22 06:31:44'),
(349, 9, 'PAC magic mascara', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 06:33:31', '2020-10-22 06:33:31'),
(350, 9, 'PAC makeup blener', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 06:36:46', '2020-10-22 06:36:46'),
(351, 9, 'PAC prime & setting sprar', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 06:44:30', '2020-10-22 06:44:30'),
(352, 9, 'moisture losion', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 06:56:10', '2020-10-22 06:56:10'),
(353, 9, 'mascara', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 06:59:09', '2020-10-22 06:59:09'),
(354, 9, 'primer shine', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:00:49', '2020-10-22 07:00:49'),
(355, 9, 'oli control primer', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:02:16', '2020-10-22 07:02:16'),
(356, 9, 'oil control primer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:05:15', '2020-10-22 07:05:15'),
(357, 9, 'pro primer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:07:36', '2020-10-22 07:07:36'),
(358, 9, 'retro  matte gloss', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:15:55', '2020-10-22 07:15:55'),
(359, 9, 'shaine killer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:20:21', '2020-10-22 07:20:21'),
(360, 9, 'slimmer mascara', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:21:46', '2020-10-22 07:21:46'),
(361, 9, 'sparkly dis', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:28:07', '2020-10-22 07:28:07'),
(362, 9, 'eye cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:30:46', '2020-10-22 07:30:46'),
(363, 9, 'finish primer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:31:53', '2020-10-22 07:31:53'),
(364, 9, 'cleansing cream', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:33:11', '2020-10-22 07:33:11'),
(365, 9, 'eye cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:34:20', '2020-10-22 07:34:20'),
(366, 9, 'makeup remover', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:36:12', '2020-10-22 07:36:12'),
(367, 9, 'transparent mascara', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:37:49', '2020-10-22 07:37:49'),
(368, 9, 'transparent primer', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:39:09', '2020-10-22 07:39:09'),
(369, 9, 'transparent two way gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:41:56', '2020-10-22 07:41:56'),
(370, 9, 'hydration gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:43:43', '2020-10-22 07:43:43'),
(371, 9, 'lip primer', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:45:17', '2020-10-22 07:45:17'),
(372, 9, 'volume blast', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9427217888', '00', '00', NULL, '23', 'Choose sponsor', '0', 1, 1, '2020-10-22 07:47:07', '2020-10-22 07:47:07'),
(373, 9, 'basement primer', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 05:56:58', '2020-10-24 05:56:58'),
(374, 9, 'founation', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 05:58:11', '2020-10-24 05:58:11'),
(375, 9, 'HD conceler (HD founation)', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 05:59:35', '2020-10-24 06:02:49'),
(376, 9, 'Stay glow (HD founation)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:01:25', '2020-10-24 06:12:44'),
(381, 9, 'conceler palat', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:18:42', '2020-10-24 06:18:42'),
(382, 9, 'Lipsatic', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:20:07', '2020-10-24 06:20:07'),
(383, 9, 'TL pawoder', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:22:56', '2020-10-24 06:22:56'),
(384, 9, 'stay creamy', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:27:17', '2020-10-24 06:27:17'),
(385, 9, 'gel eye liner', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:28:46', '2020-10-24 06:28:46'),
(386, 9, 'eye shadow base', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:31:04', '2020-10-24 06:31:04'),
(387, 9, 'eye pigment', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9879457766', '00', '00', NULL, '7', 'Choose sponsor', '0', 1, 1, '2020-10-24 06:34:22', '2020-10-24 06:34:22'),
(436, 19, 'Choli Dr3', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:10:37', '2020-10-25 06:15:43'),
(437, 19, 'Choli Dr4', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:14:51', '2020-10-25 06:14:51'),
(438, 19, 'Choli Dr5', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:16:54', '2020-10-25 06:16:54'),
(439, 19, 'Choli Dr6', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:18:16', '2020-10-25 06:18:16'),
(440, 19, 'Choli Dr7', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:19:42', '2020-10-25 06:19:42'),
(441, 19, 'Choli Dr8', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:22:35', '2020-10-25 06:22:35'),
(442, 19, 'Choli Dr9', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:23:56', '2020-10-25 06:23:56'),
(443, 19, 'Choli Dr10', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:25:14', '2020-10-25 06:25:14'),
(444, 19, 'Choli Dr11', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:26:15', '2020-10-25 06:26:15'),
(445, 19, 'Choli Dr12', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:27:42', '2020-10-25 06:27:42'),
(447, 19, 'Choli Dr14', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:31:38', '2020-10-25 06:31:38'),
(448, 19, 'Choli Dr15', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:33:30', '2020-10-25 06:33:30'),
(449, 19, 'Choli Dr16', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 06:35:43', '2020-10-25 08:07:28'),
(452, 19, 'Choli Dr16', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:09:02', '2020-10-25 08:09:02'),
(453, 19, 'Choli Dr17', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:12:00', '2020-10-25 08:12:00'),
(454, 19, 'Choli Dr18', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:14:40', '2020-10-25 08:14:40'),
(455, 19, 'Choli Dr19', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:19:15', '2020-10-25 08:19:15'),
(456, 19, 'Choli Dr20', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:22:21', '2020-10-25 08:22:21'),
(457, 19, 'Choli Dr21', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:25:05', '2020-10-25 08:25:05'),
(458, 19, 'Choli Dr22', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:27:10', '2020-10-25 08:27:10'),
(459, 19, 'Choli Dr23', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:28:49', '2020-10-25 08:28:49'),
(460, 19, 'Choli Dr24', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-25 08:30:30', '2020-10-25 08:30:30'),
(461, 19, 'Choli Dr25', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 07:34:01', '2020-10-26 07:34:01'),
(462, 19, 'Choli Dr26', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 07:35:48', '2020-10-26 07:35:48'),
(463, 19, 'Choli Dr27', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 07:41:56', '2020-10-26 07:41:56'),
(464, 19, 'Choli Dr28', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 07:43:35', '2020-10-26 07:43:35'),
(465, 19, 'Choli Dr29', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 07:47:04', '2020-10-26 07:52:29'),
(466, 19, 'Choli Dr30', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 07:50:20', '2020-10-26 07:54:52'),
(467, 19, 'Choli Dr31', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 07:57:51', '2020-10-26 07:57:51'),
(468, 19, 'Choli Dr 32', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 08:00:18', '2020-10-26 08:00:18'),
(469, 19, 'Choli Dr33', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 08:03:20', '2020-10-26 08:03:20'),
(470, 19, 'Choli Dr34', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 08:08:10', '2020-10-26 08:08:10'),
(471, 19, 'Choli Dr35', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 08:10:37', '2020-10-26 08:10:37'),
(472, 19, 'Choli Dr36', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 08:13:42', '2020-10-26 08:13:42'),
(473, 19, 'Choli Dr37', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 08:16:50', '2020-10-26 08:16:50'),
(474, 19, 'Choli Dr38', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9824768144', '00', '00', NULL, '6', 'Choose sponsor', '0', 1, 1, '2020-10-26 08:20:46', '2020-10-26 08:20:46'),
(476, 10, 'Saider broach', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:13:29', '2020-10-28 05:13:29'),
(477, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:20:44', '2020-10-28 05:20:44'),
(478, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:23:15', '2020-10-28 05:23:15'),
(479, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:29:04', '2020-10-28 05:29:04'),
(480, 10, 'Saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:32:12', '2020-10-28 05:32:12'),
(481, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:35:00', '2020-10-28 05:35:00'),
(482, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:38:13', '2020-10-28 05:38:13'),
(483, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:40:55', '2020-10-28 05:40:55'),
(484, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:43:57', '2020-10-28 05:43:57'),
(485, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:47:48', '2020-10-28 05:47:48'),
(486, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:50:49', '2020-10-28 05:50:49'),
(487, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:53:46', '2020-10-28 05:53:46'),
(488, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 05:57:25', '2020-10-28 05:57:25'),
(489, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:02:23', '2020-10-28 06:02:23'),
(490, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:05:13', '2020-10-28 06:05:13'),
(491, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:08:39', '2020-10-28 06:08:39'),
(492, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:12:00', '2020-10-28 06:12:00'),
(493, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:15:06', '2020-10-28 06:15:06'),
(494, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:18:05', '2020-10-28 06:18:05'),
(495, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:20:58', '2020-10-28 06:20:58'),
(496, 10, 'saider broach', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:24:08', '2020-10-28 06:24:08'),
(497, 10, 'smoll broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:28:06', '2020-10-28 06:28:06'),
(498, 10, 'switch', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9265532727', '00', '00', NULL, '4', 'Choose sponsor', '0', 1, 1, '2020-10-28 06:36:44', '2020-10-28 06:36:44'),
(499, 37, 'wex knife', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 05:43:47', '2020-10-29 05:43:47'),
(500, 35, 'hair spre enzo', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 05:50:08', '2020-10-29 05:50:08'),
(511, 13, 'wex rica', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 07:19:46', '2020-10-29 07:19:46'),
(516, 37, 'ikonic criamping', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 07:43:06', '2020-10-29 07:43:06'),
(517, 37, 'dammy stend', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 07:49:28', '2020-10-29 07:49:28'),
(518, 37, 'Disinfect gun', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 07:53:10', '2020-10-29 07:53:10'),
(519, 37, 'ikonic curl mashin', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 07:57:58', '2020-10-29 07:57:58'),
(520, 37, 'Double crimp', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 08:01:33', '2020-10-29 08:01:33'),
(521, 37, 'ikonic straight', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 08:05:01', '2020-10-29 08:05:01'),
(522, 37, '3 in 1 criamp', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 08:07:41', '2020-10-29 08:07:41'),
(523, 13, 'hydra cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 08:11:50', '2020-10-29 08:11:50'),
(524, 9, 'conceler palat', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 08:14:48', '2020-10-29 08:14:48'),
(525, 9, 'Glitter eye shadow', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 08:18:23', '2020-10-29 08:18:23'),
(526, 36, 'shin spre', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '9879944993', '00', '00', NULL, '3', 'Choose sponsor', '0', 1, 1, '2020-10-29 08:21:32', '2020-10-29 08:21:32'),
(527, 35, 'Hair & skin Gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 05:41:05', '2020-10-30 05:41:05'),
(528, 35, '3 in 1Body wash', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 05:44:41', '2020-10-30 05:44:41'),
(530, 35, 'Gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 05:53:45', '2020-10-30 05:53:45'),
(531, 35, 'Casctor oil', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 06:04:40', '2020-10-30 06:04:40'),
(532, 35, 'onion oil', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 06:06:26', '2020-10-30 06:06:26'),
(533, 35, 'Treatment oil', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 06:09:27', '2020-10-30 06:09:27'),
(534, 13, 'Pimple repair facial kit', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 06:18:10', '2020-10-30 06:18:10'),
(535, 13, 'D-Tan facial kit', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 06:47:09', '2020-10-30 06:47:09'),
(536, 13, 'Whit & glow facial kit', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 06:53:39', '2020-10-30 06:53:39'),
(537, 13, 'Day care cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 06:59:04', '2020-10-30 06:59:04'),
(538, 13, 'Hand Wash neem', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:08:50', '2020-10-30 07:08:50'),
(539, 13, 'Hand wash', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:12:18', '2020-10-30 07:12:18'),
(540, 13, 'Polishing scrub', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:15:11', '2020-10-30 07:15:11'),
(541, 13, 'Express fash wash', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:19:00', '2020-10-30 07:19:00'),
(542, 13, 'D - TAN s-zone mask', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:22:41', '2020-10-30 07:22:41'),
(543, 35, 'Hair conditioner', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:25:52', '2020-10-30 07:25:52'),
(544, 13, 'Rose skin toner', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:30:12', '2020-10-30 07:30:12'),
(545, 13, 'Face & Body lotion', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:34:31', '2020-10-30 07:34:31'),
(546, 13, 'Hand Wash (choco coffee)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:39:11', '2020-10-30 07:39:11');
INSERT INTO `product` (`id`, `cat_id`, `product_name`, `detail`, `mobile`, `price`, `quantity`, `video`, `brand`, `sponsor_id`, `token`, `to_approve`, `CreatedBy`, `created_at`, `updated_at`) VALUES
(547, 13, 'under eye gel', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:44:46', '2020-10-30 07:44:46'),
(548, 13, 'Clear Black heads', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:50:03', '2020-10-30 07:50:03'),
(549, 13, 'Sun spotless cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:54:19', '2020-10-30 07:54:19'),
(550, 13, 'cracked heel cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 07:59:20', '2020-10-30 07:59:20'),
(551, 13, 'Corrective cream', '<p>આ પ્રોડક્ટ ઉપરડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:05:26', '2020-10-30 08:05:26'),
(552, 13, 'Express day cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, 'Choose Brand', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:08:50', '2020-10-30 08:08:50'),
(553, 13, 'Natural soap', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:13:05', '2020-10-30 08:13:05'),
(554, 13, 'soap (charcoal & coffee)', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:17:41', '2020-10-30 08:17:41'),
(555, 13, 'skin serum', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:21:07', '2020-10-30 08:21:07'),
(556, 35, 'Hair spa', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:24:31', '2020-10-30 08:24:31'),
(557, 13, '3 in 1 Embellish cream', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:32:11', '2020-10-30 08:32:11'),
(558, 13, 'D-TEN scrub', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:35:25', '2020-10-30 08:35:25'),
(559, 35, 'Hair oil', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:38:18', '2020-10-30 08:38:18'),
(560, 13, 'Black mud mask', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:44:39', '2020-10-30 08:44:39'),
(561, 13, 'choco coffee scrub', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 08:48:15', '2020-10-30 11:23:23'),
(562, 13, 'Shaving cream', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</span></p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 11:32:45', '2020-10-30 11:32:45'),
(563, 13, 'Charcol & bamboo', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</span></p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 11:42:42', '2020-10-30 11:42:42'),
(564, 35, 'Hair serum', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 36);\">આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</span></p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-30 12:05:03', '2020-10-30 12:05:03'),
(565, 13, 'Sanscreen gel', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-31 05:53:04', '2020-10-31 05:53:04'),
(566, 13, 'Anti mark serum', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '6355364488', '00', '00', NULL, '25', 'Choose sponsor', '0', 1, 1, '2020-10-31 05:57:25', '2020-10-31 05:57:25'),
(622, 10, 'Pithi set', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:09:07', '2020-11-27 06:09:07'),
(623, 10, 'Broch', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:10:05', '2020-11-27 06:10:05'),
(624, 10, 'broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:11:27', '2020-11-27 06:11:27'),
(625, 10, 'amboda broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:12:34', '2020-11-27 06:12:34'),
(626, 10, 'Broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:17:29', '2020-11-27 06:17:29'),
(627, 10, 'Broach', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:18:14', '2020-11-27 06:18:14'),
(628, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:18:50', '2020-11-27 06:18:50'),
(629, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:19:26', '2020-11-27 06:19:26'),
(630, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:20:12', '2020-11-27 06:20:12'),
(631, 10, 'amboda', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:20:45', '2020-11-27 06:20:45'),
(632, 10, 'Pithi set', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:21:25', '2020-11-27 06:21:25'),
(633, 10, 'Pithi set', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:22:11', '2020-11-27 06:22:11'),
(634, 10, 'Pithi set', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:22:46', '2020-11-27 06:22:46'),
(635, 10, 'Pithi set', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p><p><br></p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:23:24', '2020-11-27 06:23:24'),
(636, 10, 'Pithi set', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '8320676762', '00', '00', NULL, '27', NULL, '0', 1, 1, '2020-11-27 06:25:32', '2020-11-27 06:25:32'),
(637, 37, 'ABS Pro', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:33:33', '2020-11-27 06:33:33'),
(638, 37, 'ABS PRO CRIMPER', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:36:06', '2020-11-27 06:36:06'),
(639, 37, 'ABS PRO', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:37:27', '2020-11-27 06:37:27'),
(640, 37, 'ABS PRO', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:38:14', '2020-11-27 06:38:14'),
(641, 37, 'ABS PRO', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:39:00', '2020-11-27 06:39:00'),
(642, 37, 'ABS PRO', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:39:46', '2020-11-27 06:39:46'),
(643, 37, 'ABS PRO', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:40:50', '2020-11-27 06:40:50'),
(644, 37, 'ABS PRO', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:41:35', '2020-11-27 06:41:35'),
(645, 37, 'ABS PRO', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '9276308645', '00', '00', NULL, '26', NULL, '0', 1, 1, '2020-11-27 06:42:42', '2020-11-27 06:42:42'),
(796, 13, 'FAce pack', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', NULL, '0', 1, 1, '2020-11-30 08:30:08', '2020-11-30 08:30:08'),
(797, 13, 'Facial', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', NULL, '0', 1, 1, '2020-11-30 08:32:00', '2020-11-30 08:32:00'),
(798, 13, 'Facial', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', NULL, '0', 1, 1, '2020-11-30 08:32:54', '2020-11-30 08:32:54'),
(799, 13, 'Facial', '<p>આ પ્રોડક્ટ ઉપર  ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', NULL, '0', 1, 1, '2020-11-30 08:34:21', '2020-11-30 08:34:21'),
(800, 13, 'Facial', '<p>આ પ્રોડક્ટ ઉપર ડિસ્કાઉન્ટ છે, જો તમારે ખરીદી કરવી હોય તો નીચે આપેલા કોલ બટન પર કો લ કરવા વિનીતી</p>', '8160358110', '00', '00', NULL, '22', NULL, '0', 1, 1, '2020-11-30 08:35:26', '2020-11-30 08:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(40, 21, 'product_images/P3jjCqdgTx1F4IpPRuoGtBb6IgFxz6ZcjPJgOgHZ.jpeg', '2020-09-03 12:23:08', NULL),
(41, 22, 'product_images/JVFQgGXTlTYKgvWdGkmcPNtBJKmL2so9tN6cGMZJ.jpeg', '2020-09-03 12:25:17', NULL),
(42, 23, 'product_images/cQKGRfkdWLgwpAVvBHiAB5rddCP0IxG55bIZXokX.jpeg', '2020-09-03 12:26:56', NULL),
(44, 25, 'product_images/ctc4zdrzoqIkmAB3mlLyQZ4dDIoujRfQb5YVAfpu.jpeg', '2020-09-03 12:40:53', NULL),
(45, 26, 'product_images/W138EViXLIVjWdsUcGjAF0DBJBW4uWuO5GFzZnrV.jpeg', '2020-09-03 12:43:08', NULL),
(46, 27, 'product_images/7HPc0sW7rYgxVcXAITkNB4xwz4BTKgtYJfE5NpIx.jpeg', '2020-09-03 12:45:01', NULL),
(47, 28, 'product_images/w8Xqm1VYhW7M5m9ymQGlICxfDF618PcQJJwT2duf.jpeg', '2020-09-03 12:50:29', NULL),
(48, 29, 'product_images/48btNHta4spEeZa0oWJ0Zw6wR16d67594hXbesh0.jpeg', '2020-09-03 12:52:43', NULL),
(49, 30, 'product_images/6IlzZR1W9M0daym1NiFCqXcjspMWKroetFEkqlGN.jpeg', '2020-09-03 12:54:20', NULL),
(50, 32, 'product_images/pxMIK5IKyNmxgtQfqIhNBO97yFQ68CdGP5YgXcWu.jpeg', '2020-09-03 12:57:16', NULL),
(52, 34, 'product_images/eVixj6oCMO2QYRyY6kH9x2rHxG1CIfClaev4q255.jpeg', '2020-09-06 13:15:16', NULL),
(53, 35, 'product_images/EESpSkLCOp7AMRh4cixQWcQp0rEHNfKaQMGqbEpv.jpeg', '2020-09-06 13:18:29', NULL),
(54, 36, 'product_images/3qwMFLQyLmsrymtptVmPHY2sSPzF2kcVWNZ1xDyK.jpeg', '2020-09-06 13:20:17', NULL),
(55, 37, 'product_images/IShMoKwXoV6iFxMvLWpIi2i0DFfpqe00K6O3I01C.jpeg', '2020-09-06 13:21:49', NULL),
(56, 38, 'product_images/Znx4RGLpOjdh7cmIglECYMzsjNwm6ArHnNSwumfI.jpeg', '2020-09-06 13:25:11', NULL),
(57, 39, 'product_images/opBIUbTtvLZF5bwY6kiEsGH42itKRmhl37KT7tvP.jpeg', '2020-09-06 13:29:01', NULL),
(58, 40, 'product_images/mF8ExBz4ShVSu6F5NroDry3I9pVsk75e2qH8Ngzq.jpeg', '2020-09-06 13:32:12', NULL),
(59, 41, 'product_images/v1LtKOlJlmWNwMPL6FgAxsVGSd2CPJaYsNo0PGTF.jpeg', '2020-09-06 13:34:16', NULL),
(61, 43, 'product_images/kebvaVH8JD7WDtmEKdgChYoLgZaibjSfpUvnQYum.jpeg', '2020-09-06 13:38:12', NULL),
(62, 44, 'product_images/fb8cK3jVhdkNn0Kg6PGPwVHm9tw06F0BSeaIpJNN.jpeg', '2020-09-06 13:41:30', NULL),
(63, 45, 'product_images/LLlHquTfEGxRu6XbaMe8xeuhxN5cKIBhqixhpsz8.jpeg', '2020-09-06 23:32:15', NULL),
(64, 46, 'product_images/izkRMvik1J6NIL5ZfbsgXApBmaSqF0vTupGZozBR.jpeg', '2020-09-06 23:33:43', NULL),
(66, 48, 'product_images/2HBF8mufURHxxm2JF2HVAth1McaygvgIT6uwzEnb.jpeg', '2020-09-09 04:14:03', NULL),
(67, 49, 'product_images/WDKuis73xD9rFcINICP5c82B0Xe2IhappdmndaP3.jpeg', '2020-09-09 04:16:52', NULL),
(71, 53, 'product_images/WAiHyCmHIS4ag3VTSTuSm43B8p9lSVSRdpGlSBW2.jpeg', '2020-09-10 12:33:02', NULL),
(72, 54, 'product_images/x3yStvNeT3qJ1Fns0OoXWLL0CoNxuugM2TaY9O2p.jpeg', '2020-09-10 12:37:33', NULL),
(75, 57, 'product_images/8wKdBdZRciIw1QztXN8UoMbKqKTx0rnuLY33gXqE.jpeg', '2020-09-11 08:38:02', NULL),
(77, 59, 'product_images/gRsVBMPsppXg1I0epin0awIbqZz7PC1VBjjn1o2K.jpeg', '2020-09-23 05:01:31', NULL),
(85, 67, 'product_images/B7PuvE3hLRfQhNXXYIkcfUPwI6MyBwGoxruOGozF.jpeg', '2020-09-26 05:37:22', NULL),
(86, 68, 'product_images/euF9xooixJ5oVMCt3twk5z9BLBjPb77iswed2FId.jpeg', '2020-09-26 06:33:09', NULL),
(87, 69, 'product_images/aEfuoWSlfAoxiifqgTUS70f4dikdkhcLetp3Itfg.jpeg', '2020-09-26 06:37:57', NULL),
(88, 70, 'product_images/GjF8Y8xKXFdnLhyTT9Vjld0QFndQquA4XB1mHhi4.jpeg', '2020-09-26 08:22:16', NULL),
(89, 71, 'product_images/6d0ckwKaPzzimI9CXcJMQ0AACUr9VeJ4tv8FR6gB.jpeg', '2020-09-26 08:24:29', NULL),
(91, 73, 'product_images/Iu7ZR83cHw3JZ5HoqIioBAdcSKoLZgXMuCfXZeHJ.jpeg', '2020-09-26 08:30:46', NULL),
(92, 74, 'product_images/cMwAuNqbC85x6pYnKCK7r733i5TjDps7QyRQHdBo.jpeg', '2020-10-05 06:53:09', NULL),
(93, 75, 'product_images/dzuDEkmzhzk9eskb1HWcBvYinyKhMPKfUL0gi1cc.jpeg', '2020-10-05 07:01:40', NULL),
(94, 76, 'product_images/VPAviOSkH3g6XVIPNsRTgEcreRkXnPILhEEYvJeM.jpeg', '2020-10-05 07:26:49', NULL),
(96, 78, 'product_images/gmCLMburzvK94XCgBOw4AnkDelvOIBrE1z2Nd8Cn.jpeg', '2020-10-06 07:07:56', NULL),
(99, 81, 'product_images/E1wWtuzTHXgvcTjoboIRKLWQhINaiUjEfAVM5tOY.jpeg', '2020-10-08 06:36:56', NULL),
(100, 82, 'product_images/x9k6kVicWFqJ1CVLQO7RD1X1ZyWBmlFscqKKWmn2.jpeg', '2020-10-08 06:53:58', NULL),
(101, 83, 'product_images/71NelilCrXaV5bG57WSwNII7ef6sgM18eR3ribhD.jpeg', '2020-10-08 06:56:19', NULL),
(102, 84, 'product_images/LE4vMiWwvFP2joiLtseObP9O54PrY5Ii5Q28n4CD.jpeg', '2020-10-08 07:44:20', NULL),
(103, 85, 'product_images/yjcVf7hAKyESIdiYtsUsEz2BawzIcKp0NeB9ZD4w.jpeg', '2020-10-08 07:56:46', NULL),
(105, 87, 'product_images/09XjvWXD3NwQfXZlDYJnL41782z13Uic7iSjqjNH.jpeg', '2020-10-08 08:35:13', NULL),
(106, 88, 'product_images/0KqsJPcJkCnOstt67ehsnJ1KDHq9OqAj5WHFAiZk.jpeg', '2020-10-08 10:47:14', NULL),
(108, 91, 'product_images/KPefmuReKmyXx1BZybcJVQYCOoXhlrINJ7CBTQLa.jpeg', '2020-10-12 06:53:22', NULL),
(110, 93, 'product_images/EMj9q0HVmW7gdJxLaWzyiQ1ai5SHqKhXNQO9heno.jpeg', '2020-10-12 07:08:22', NULL),
(111, 94, 'product_images/besMYoj7KSM5UMaojTM8uwnluw9LiRDB1f8ho5Nt.jpeg', '2020-10-12 07:14:34', NULL),
(112, 95, 'product_images/izA7rKTcN7Q8dOEkPIJjrnomscUvlHxLDJANm9B3.jpeg', '2020-10-12 07:20:37', NULL),
(113, 96, 'product_images/KPpEJuje1jRAB83Zu48ChWukOkZ1nKSI27Ag1zrp.jpeg', '2020-10-12 07:27:17', NULL),
(114, 97, 'product_images/SQ2HFhrupP5Twle4rfbPGwZq13q8jG8D0IQRUD9I.jpeg', '2020-10-12 07:29:46', NULL),
(116, 99, 'product_images/uGzUY6vcpVyeB5vh9XsYuxkekLXo8xTV9l8LFngT.jpeg', '2020-10-12 07:51:56', NULL),
(117, 100, 'product_images/Vav7LkmBB2JGHqPBaBiIzKfWEDOwjpb7oQHUJFV3.jpeg', '2020-10-12 08:02:23', NULL),
(124, 110, 'product_images/TZ4QLWIJjO1grZ5ltJGUYTJKK80kskZqX4VABjPD.jpeg', '2020-10-13 07:25:56', NULL),
(136, 122, 'product_images/EKwenkkfJAkoXRCqMiTHZiLjTXOcy77MxlnzKkRr.jpeg', '2020-10-13 08:26:49', NULL),
(137, 123, 'product_images/2L167DBJY22QUwSyoR1ADw4OGOPktUG6u62gOrWh.jpeg', '2020-10-13 08:31:14', NULL),
(138, 124, 'product_images/nwTyuQVlhN019oZG4oKfHd9dsQ7BknZzoYSPm8CV.jpeg', '2020-10-13 08:38:35', NULL),
(140, 126, 'product_images/2CLPFJKzv2HgWLhA6OOozWjblr7zWHNr0oXasVXd.jpeg', '2020-10-14 07:07:24', NULL),
(142, 128, 'product_images/RQ3m48eGNvkBKhQOw174FcNkDTUqP6r1LTYgPG0Q.jpeg', '2020-10-14 07:29:06', NULL),
(143, 129, 'product_images/sqF3Jsr4L8dBzP0ETHfEWB8b1P0D0YjQnw4qcFAH.jpeg', '2020-10-14 07:31:59', NULL),
(144, 130, 'product_images/UwCZJGFOLhiVSk5aWBMQejrpRLIVbGSV4vfHWElH.jpeg', '2020-10-14 07:34:01', NULL),
(145, 131, 'product_images/4jtk8LMmwfhZwoRmmrMzohHpMufZeMCFN7Ecldqb.jpeg', '2020-10-14 07:36:35', NULL),
(146, 132, 'product_images/lzpuFRruwW4K4fOeOsPODZqyK8EjvbRF6J56Ifuj.jpeg', '2020-10-14 07:40:08', NULL),
(147, 133, 'product_images/wdgOeVAfMtBU44cJMoi3DzYdsBXEGepNErQkLl52.jpeg', '2020-10-14 07:44:23', NULL),
(148, 134, 'product_images/RRAOFHGM5uiqlGdcpODHCVkhk39Ji1Hzn2e8NQe5.jpeg', '2020-10-14 07:45:40', NULL),
(149, 135, 'product_images/gM9r5roYBvMeF6tMDQrysBfpG8Tm8xXd7b31JpIc.jpeg', '2020-10-14 07:46:55', NULL),
(150, 136, 'product_images/PhlpEb4yelIZDG8pz0GSZeEF3LDqKR9jlVfjFk3o.jpeg', '2020-10-14 07:48:49', NULL),
(151, 137, 'product_images/QOYMmDXs5SDJP34iAPz3aFVMBYdiArpgB3lw224k.jpeg', '2020-10-14 08:00:46', NULL),
(152, 138, 'product_images/LHomlnnaGiGyVaswruolAQ6F31ho9y7Vmloebzdc.jpeg', '2020-10-14 08:08:04', NULL),
(153, 139, 'product_images/TFYXC1UwwjYB90E73FoDA8LlT19V7HVUNY6Vl3Mc.jpeg', '2020-10-14 08:09:32', NULL),
(154, 140, 'product_images/525xF708Diepmigf2a6t9FFwV8q12InlnnBLEsD2.jpeg', '2020-10-14 08:11:15', NULL),
(155, 141, 'product_images/ITE1X9tPeR6lC7nXFBAmwUuYeM7VdI9LnE2TWwSY.jpeg', '2020-10-14 08:13:20', NULL),
(156, 142, 'product_images/qnz74SiSqueOY1U3bUKw0ZNdXaIv5jOgqSKqZngq.jpeg', '2020-10-14 08:17:00', NULL),
(157, 143, 'product_images/eIzpAuzcUF93NXJqaY9Ftm4yUAPB5ZGobc6AUPQN.jpeg', '2020-10-14 08:19:47', NULL),
(158, 144, 'product_images/z3vPfKQOzpMQpqKWeAnxrwqa4AMpZFUQlxDgEfcT.jpeg', '2020-10-14 08:21:35', NULL),
(159, 145, 'product_images/gVhoV0dsKi3AsU0n2c2IJnnxMCz6pmCC2ZTk9YJg.jpeg', '2020-10-14 08:33:07', NULL),
(160, 146, 'product_images/2UOerlxFeQ0pbcYTeScDCpz4gxB9X4KChkx2iffL.jpeg', '2020-10-14 08:35:24', NULL),
(161, 147, 'product_images/b9LbgMHt4frDIwfeiewHCflKsYudJo2Miulffcsd.jpeg', '2020-10-14 08:38:57', NULL),
(162, 148, 'product_images/JaaSR0Izr1RJANayfqoTw2Fp7x0AuRslS0BTWFAe.jpeg', '2020-10-14 08:47:12', NULL),
(163, 149, 'product_images/aB8DCmxJytqfAGm5Cvud9Ji7gNoAYAHcpqjbEJc7.jpeg', '2020-10-14 08:48:46', NULL),
(164, 150, 'product_images/kO4rfjxji5PuymQSJhuS9zH6KGjLMxKjQcRwqTjv.jpeg', '2020-10-14 08:50:30', NULL),
(165, 151, 'product_images/jIcVvaVjy1PUPCfbbNjK5807h1TkUghXONXm5FsH.jpeg', '2020-10-14 08:52:46', NULL),
(166, 152, 'product_images/D1cGcrw1PsKnCuLTkIAkwWENAAXw7w4P1xU0nRTY.jpeg', '2020-10-14 08:54:28', NULL),
(167, 153, 'product_images/Sn1ilS9hb6NSo96hhKPQxkXRg55TfLVAwS9vimcK.jpeg', '2020-10-14 09:00:30', NULL),
(171, 157, 'product_images/ZV5hbf4VF1ol8JmrVpgJTKsouYDevAAmpbXDlMOS.jpeg', '2020-10-14 09:28:39', NULL),
(172, 158, 'product_images/KR9bdm5AgZf2FVuAwSE1hkJ7VrgfQQvSc7xTQGBk.jpeg', '2020-10-14 09:31:15', NULL),
(174, 160, 'product_images/XiNBjafLRdVtGmn5wXEfexraXVlzQJZ5YHprrAof.jpeg', '2020-10-14 09:34:14', NULL),
(175, 161, 'product_images/k31ssSPuaiqURELv6PSBSak2AYJ3u7WFdBZGWCW2.jpeg', '2020-10-14 09:36:56', NULL),
(176, 162, 'product_images/KQjuCyauVBPuKRF1ziT4BXpeUDG0kPGU7bcio1C6.jpeg', '2020-10-14 09:40:27', NULL),
(177, 163, 'product_images/8s3M5XIdrvmlFN95H1F3hR8EYyHiFSPWQiFNr4lT.jpeg', '2020-10-14 09:41:33', NULL),
(178, 164, 'product_images/kuzeHW64LqGCt4LpuIExOPBFE3gDN09gjFJeJYMV.jpeg', '2020-10-14 09:42:46', NULL),
(179, 165, 'product_images/RDSjrVrH7EsWL5PwnfgAHpJObdHv3GRGi3opukqs.jpeg', '2020-10-14 09:43:44', NULL),
(180, 166, 'product_images/fAWUzDFSDTaeVN5COme2ChkZ99JLTAXETWUl9jmM.jpeg', '2020-10-14 09:45:04', NULL),
(181, 167, 'product_images/y74Em7dWu3us7o2XdqXQTJlLvqn70KXFRkGLcQy9.jpeg', '2020-10-15 05:12:04', NULL),
(189, 175, 'product_images/Zmk2RRBfsOh4Gb3RQ3mAXluBHQOVZOffW24pqYPx.jpeg', '2020-10-15 06:29:31', NULL),
(190, 176, 'product_images/Cj7uhhysiMD5dQEF8tm9lKGJ8YC6gpW6eyMkPSHO.jpeg', '2020-10-15 06:31:11', NULL),
(191, 177, 'product_images/CagtENswhJXvVFiBzJ0KWjk0fS2FJ3hGbDrYmUWE.jpeg', '2020-10-15 06:42:31', NULL),
(192, 178, 'product_images/2ecueSTyx5Xas6UymI6Fuzqau4CNqqVvTAJ0jr84.jpeg', '2020-10-15 06:45:55', NULL),
(193, 179, 'product_images/QHXkOw43PAFf1Q1SHz4cpfRsECbfm2KPOJ9WiW7s.jpeg', '2020-10-15 06:49:01', NULL),
(194, 180, 'product_images/Ct3F4LxpVAveq93oYMLxqSCbyWbuHc0wKuUiPr6F.jpeg', '2020-10-15 06:50:10', NULL),
(195, 181, 'product_images/mAg756fSkqYYvDPIMPwv5mkdpbYzP75PZY3cQ8ZO.jpeg', '2020-10-15 06:51:07', NULL),
(196, 182, 'product_images/nN6uEzQuu5vknz9EqFbNbMoTkGDLYk5vhDzGwZtP.jpeg', '2020-10-15 06:52:01', NULL),
(197, 183, 'product_images/8bB914o7UuZX2jDFNLQbkhzHXrozI2K7YzSvveDi.jpeg', '2020-10-15 07:43:09', NULL),
(198, 184, 'product_images/A8YLDOvgx5OXAvXJK0snO44nwaULpqbGmBY3y5v0.jpeg', '2020-10-15 07:44:43', NULL),
(199, 185, 'product_images/J6aIZOCw2yU88EY91FkBZMkbcX9GkZEIBuVvDynu.jpeg', '2020-10-15 07:47:18', NULL),
(200, 186, 'product_images/XTuatEDE7mwPmh7UJQYLUW5m2VY6Qmj1A883q1uv.jpeg', '2020-10-15 07:50:53', NULL),
(201, 187, 'product_images/kfmZOahKW9FrTGDkK78y4YRjyGRGCKvswWN4CpQX.jpeg', '2020-10-15 07:53:25', NULL),
(203, 189, 'product_images/ZggnZOWP67PbnHvRVKKyN2YmekgTWgJjnqPznULR.jpeg', '2020-10-15 07:59:39', NULL),
(204, 190, 'product_images/fd36mvC4D5I3LcR5DygViejqa8nKoKvca9icwhFJ.jpeg', '2020-10-15 08:02:44', NULL),
(205, 191, 'product_images/CghEhqcI97HZrTVeJmcKcwcY93pw6Ia84J12CbuH.jpeg', '2020-10-15 08:06:52', NULL),
(206, 192, 'product_images/0DbooUti7w2cM7DHGshZSfpD44qQTiePDKYzZAkI.jpeg', '2020-10-15 08:09:19', NULL),
(208, 194, 'product_images/TXmBmn02ruqhyNcWMN3uvgom390dJIUyQJMgJzHG.jpeg', '2020-10-16 06:57:19', NULL),
(209, 195, 'product_images/2Ggp8Fp8Ybj91T1KpwpjpJzMWvW0SBULgQQEwCgf.jpeg', '2020-10-16 07:01:54', NULL),
(210, 196, 'product_images/P44DZX4o3HoiGAtWtxLlWnXY3Xn9u0EHHDl8JEKn.jpeg', '2020-10-16 07:04:15', NULL),
(211, 197, 'product_images/YB83rt285RGj76wGQn7vDcHHKhDpL3p6bvwHKe35.jpeg', '2020-10-16 07:08:57', NULL),
(213, 199, 'product_images/NbXNwN08NRM2i1a400wtF2C0tLmj1w6pdseLQnYl.jpeg', '2020-10-16 07:17:39', NULL),
(214, 200, 'product_images/qXDM3Boh4tRQ6ZYDKZdKa7BnsEbsTsCa575wqmBS.jpeg', '2020-10-16 07:19:08', NULL),
(215, 201, 'product_images/ijZdDmh07QvXZttFzB99S2n6SYUN2Q3hLtJ6pjaI.jpeg', '2020-10-16 07:20:50', NULL),
(216, 202, 'product_images/NwaeGIrmLfxkyUasVfqr6eJyEVMbE8WuGrdeWRc5.jpeg', '2020-10-16 07:22:14', NULL),
(217, 203, 'product_images/5HVLdEEISskuZSoxHtf4OgW30OwvnWNeeV6DY6xV.jpeg', '2020-10-16 07:23:39', NULL),
(218, 204, 'product_images/Rsag6QCQArPatdtzA9YdaXuoQfg6nTNem5N2O2j4.jpeg', '2020-10-16 07:25:16', NULL),
(219, 205, 'product_images/U0oNqrJL7GTD0akAoBIU3Aq8wBHZgRypYBdj7eS7.jpeg', '2020-10-16 07:30:50', NULL),
(220, 206, 'product_images/2bYyW7QgoWi0QucoIFNm0Uh6JaSZEzdsMylfmXAc.jpeg', '2020-10-16 07:32:13', NULL),
(221, 207, 'product_images/l5AvTHKhfuRGwayDAyydTCN1hgU2Ajg7mi2R4wuf.jpeg', '2020-10-16 07:33:28', NULL),
(231, 217, 'product_images/atqjn7rR5rzK3lol4pGZUWWwXkh3vTdvx2oKQmXx.jpeg', '2020-10-16 08:03:54', NULL),
(232, 218, 'product_images/a99J9kREfsPOzyBeE1Ve7coMVTCwuCiDdQe06wbn.jpeg', '2020-10-16 08:05:18', NULL),
(233, 219, 'product_images/Xwr5f6ZjQeYSJfz3qsZIw9Xt1bKwCpEwJq9Nt9mp.jpeg', '2020-10-16 08:10:42', NULL),
(234, 220, 'product_images/jWs1pJbyOgVGrKIJYl12qwLxXJ0QjWAyJh97Q0Yv.jpeg', '2020-10-16 08:14:20', NULL),
(235, 221, 'product_images/s9MCw15Fdl5nUHUrs9yrn3V2oh0xIaa9YbRkIPRe.jpeg', '2020-10-16 08:16:02', NULL),
(236, 222, 'product_images/ZKImI4EoNmVg3WHJ08wSxQ2tgT8xarBMgDgCbOUL.jpeg', '2020-10-16 08:19:19', NULL),
(237, 223, 'product_images/crLMJnR07mFA7WhATfQYsfSnfUyl5oR5XRyd3c8s.jpeg', '2020-10-16 08:20:43', NULL),
(238, 224, 'product_images/Cbm1AIqQfX3mTjuxCIxVl7nooBLYpF7b8Xx9eVGm.jpeg', '2020-10-16 08:22:16', NULL),
(239, 225, 'product_images/7e1oPMOwsVJCAT2XS6ezkg1vZIQuZS0z9CKBV0ah.jpeg', '2020-10-16 08:23:36', NULL),
(240, 226, 'product_images/dGX54mOqCZMuS5hZHtxz1DGs0SJK0NnXIv3Is837.jpeg', '2020-10-16 08:24:50', NULL),
(241, 227, 'product_images/6G7CpewBBQACsutfBAWFQtTQXginVBQTHUml8rOe.jpeg', '2020-10-16 08:26:24', NULL),
(255, 241, 'product_images/KhkXVMe1xhSxuFjVlkJIM77EiPqwtvKnwvyqDdNL.jpeg', '2020-10-17 05:59:13', NULL),
(256, 242, 'product_images/l1zf8qSHeFcstRg1TTKbG1GibN9CqXDXGfMSXDzc.jpeg', '2020-10-17 06:00:34', NULL),
(257, 243, 'product_images/nSrfrFQAEKaBSfmofjzaFIRPygkJRVofpUsZgduf.jpeg', '2020-10-17 06:02:03', NULL),
(258, 244, 'product_images/jvIg9w5QWmW0vLOj2VttgNVYhKow2JadmLaUhaSG.jpeg', '2020-10-17 06:03:04', NULL),
(259, 245, 'product_images/wkuDPzBIXtUM9hxlwzjqttVIjaq4JmE2OHGau75s.jpeg', '2020-10-17 06:03:46', NULL),
(260, 246, 'product_images/JpGIEWhRpu1pvVtlws5PD299TXbQa2P7OfSYxld9.jpeg', '2020-10-17 06:05:01', NULL),
(261, 247, 'product_images/UN8dlJTHYpMDHDcPS4PRBBI3OstnpTcffTtRZc6A.jpeg', '2020-10-17 06:06:11', NULL),
(262, 248, 'product_images/AK0qIXpKmt1T5oW1BBXRNnJjQdRc5u44vjFKJUuy.jpeg', '2020-10-17 06:07:12', NULL),
(263, 249, 'product_images/LYwASINwdm2PgRacn8UXPbtpt9WcybnqdvIwvW0O.jpeg', '2020-10-17 06:07:52', NULL),
(264, 250, 'product_images/6GAHCZlxr1mjYoXQdm0BJslkDQHQKeWo5FCGXBuM.jpeg', '2020-10-17 06:08:27', NULL),
(265, 251, 'product_images/ZmjTBLL6Dq7cnh2MdFzD43HKbBlxWhK2XIIgUfmd.jpeg', '2020-10-17 06:11:26', NULL),
(266, 252, 'product_images/a2P2zCUWPstJn7MTURgUM2TTejooPtpc6WN7krbn.jpeg', '2020-10-19 05:57:39', NULL),
(267, 253, 'product_images/cLwByhr6h7uSnYvZ0Wiit0pF4WD0x784vyTbdRFR.jpeg', '2020-10-19 05:59:02', NULL),
(268, 254, 'product_images/uqU00ptugDabLrEKlDhXNEF3NvOvkcNNrFit0TQw.png', '2020-10-19 06:01:12', NULL),
(269, 255, 'product_images/QSt1RTKR9nCTtM1vRTheUhchC9lMxIyKT03BZder.png', '2020-10-19 06:04:24', NULL),
(270, 256, 'product_images/3DT3TWAz0uhXIx9iGczdK4Xy0m4qevvpFift9jHP.jpeg', '2020-10-19 06:09:20', NULL),
(271, 257, 'product_images/fBwdAsifcaV9wkuYdEZtOeowNClGlo0uQ9vFkTaw.jpeg', '2020-10-19 06:12:27', NULL),
(272, 258, 'product_images/Ij1z6yBL9WDOwECQL7bAnQLeLbEqQzfAuTlltZah.jpeg', '2020-10-19 06:19:50', NULL),
(273, 259, 'product_images/qjutNxf7a8R5SVXvhDL9AIDGDlGaRXSxriFYP0jW.jpeg', '2020-10-19 06:22:16', NULL),
(274, 260, 'product_images/ClviuxD2n7aUaQRXUKClEHW9NhPjXIZAABFjKYDI.jpeg', '2020-10-19 06:24:29', NULL),
(275, 261, 'product_images/hnYBJKD4coqSDrFGNtJ1MkTtExZyISWVXqunfrpk.jpeg', '2020-10-19 06:27:19', NULL),
(276, 262, 'product_images/ZwzNs3YhbQoXsd5FHx1G9D5sa9x81NatiRfAo0Iv.jpeg', '2020-10-19 06:31:16', NULL),
(277, 263, 'product_images/NjNHccTRmZUM76tdXFskz4D5oAMRjh7Qi8oVkAOT.jpeg', '2020-10-19 06:34:00', NULL),
(278, 264, 'product_images/JgN1KPscrSJkiuVBuXNiQU8pNFh1aQ1fVhBin0Ot.jpeg', '2020-10-19 06:35:22', NULL),
(279, 265, 'product_images/7mKn2IGVinVZDBYxxh99JDaLAA1EMTFO50DJJGQ7.jpeg', '2020-10-19 06:36:50', NULL),
(280, 266, 'product_images/MXF5zjCohqDKsX7IHhNb6gnuv7zLJlYET0RcA4YU.jpeg', '2020-10-19 06:37:59', NULL),
(281, 267, 'product_images/SfQJ9jXuDsuDxgwraTwLAYIJWhFNKwE5VdiwFVVc.jpeg', '2020-10-19 06:53:26', NULL),
(282, 268, 'product_images/64k7VnidhTHzenpeEsBYiXeh9A7jUmmG9jgBkkHz.jpeg', '2020-10-19 06:58:22', NULL),
(283, 269, 'product_images/qGh7ay3OpXTpvWtBJGXwKBvSn2S0jxQCQsEC2R6r.jpeg', '2020-10-19 06:59:48', NULL),
(284, 270, 'product_images/lPkfXgSVZArhT8ASZqgZlEI1oVxE8b7fVUAN2DQ3.jpeg', '2020-10-19 07:01:12', NULL),
(285, 271, 'product_images/laLUTgCu7Uspapa2w77qG6w6254AZozGzKeeH9EJ.jpeg', '2020-10-19 07:03:02', NULL),
(286, 272, 'product_images/4sp0qWheeOJkWJSUjb8JD5NOVKaFPEd2ANSNIlSs.jpeg', '2020-10-19 07:04:11', NULL),
(287, 273, 'product_images/DIirHQy3r9h9M55LBbTm58LRz64JC1KqKgFbQpfi.jpeg', '2020-10-19 07:05:45', NULL),
(288, 274, 'product_images/xx4jErf0pirkJSr8mJMEQZLUkJvivkyVRBqicolT.jpeg', '2020-10-19 07:07:17', NULL),
(289, 275, 'product_images/t5Ky82Bm5FeH9gwbEbqhRJcg3jQp0snFuenvkRNG.jpeg', '2020-10-19 07:08:33', NULL),
(290, 276, 'product_images/6xWkLhd9w5JMBPmfcqR22YHcq658tkJd7fbSUo1V.jpeg', '2020-10-19 07:09:49', NULL),
(291, 277, 'product_images/UvBo8POgRfXoYeAn8Ma7yMadVyjvCOo9phBOREp5.jpeg', '2020-10-19 07:11:25', NULL),
(292, 278, 'product_images/lyHQ2Ei9Uf5flIfN2ZYo9GMiFIReFrLLylDIDjHB.jpeg', '2020-10-20 05:58:40', NULL),
(293, 279, 'product_images/htQAt5WJjjpn2dZPalrMrc7eaAyFNL7qOT3vqBPn.jpeg', '2020-10-20 05:59:49', NULL),
(294, 280, 'product_images/v0aaM10qonSRUZ78rY6eYINvR4e94mtSCAphX1gd.jpeg', '2020-10-20 06:07:44', NULL),
(295, 281, 'product_images/o1rJImm23xSeXiHzKPlYbdkZElITgk6sAzAGXXuj.jpeg', '2020-10-20 06:35:42', NULL),
(296, 282, 'product_images/g6H8N2h8FcMYybMO4itqA2qH4bIraG4yJSLmM5EI.jpeg', '2020-10-20 06:47:07', NULL),
(297, 283, 'product_images/3sFjou1YdeJzuTPgQvEHUz8UKBg1nabVvyCxXezi.jpeg', '2020-10-20 06:52:35', NULL),
(298, 284, 'product_images/YTRg7NKkciOo1Ua5twfroIXTvDWyQwFtS07D9B1G.jpeg', '2020-10-20 06:54:33', NULL),
(299, 285, 'product_images/GYmsZyUwq9hwhKJA3w8RAOPXqcnm6lecoUh8APVO.jpeg', '2020-10-20 06:57:08', NULL),
(300, 286, 'product_images/DcbUH6CtbNn1j9IpPyZA80Hd4yotzpgjZDB8fIsd.jpeg', '2020-10-20 06:58:51', NULL),
(301, 287, 'product_images/w4CQcy1XpdaHzVJQGinRQLu1ii42II2Gxr2zzUVj.jpeg', '2020-10-20 07:05:47', NULL),
(302, 288, 'product_images/10U7Fhg7GISY7QkfHTvrK3GmRLad3mqQBkxt138h.jpeg', '2020-10-20 07:15:34', NULL),
(303, 289, 'product_images/k5a4mifM4jRlpAp11AEeblq6Gpqo75kfVCdAb3Vm.jpeg', '2020-10-20 07:18:03', NULL),
(304, 290, 'product_images/SZEADesc6UFuulaQ2uSInQgo3b0I4uSbq85rYWjm.jpeg', '2020-10-20 07:20:26', NULL),
(305, 291, 'product_images/lbKongdlsFA1oKLHl5GItMZPRQtqUgzBcw5G8ZlO.jpeg', '2020-10-20 07:21:53', NULL),
(306, 292, 'product_images/Q2XBPD2DiFqOk5YgrATA92DioShrwvcGD75amwB9.jpeg', '2020-10-20 07:23:15', NULL),
(307, 293, 'product_images/PBrzLYYNjtWUcUD0JjDeqNKIAul8VRXcyuLmiZUF.jpeg', '2020-10-20 07:25:27', NULL),
(308, 294, 'product_images/9jfF8xq13cOXPSlDi4kOkTKm6VMcChQc3rnj9KIP.jpeg', '2020-10-20 07:29:46', NULL),
(309, 295, 'product_images/xdktXXNIll51CwBbEiBNqqYIlICT8J5EPy3MASPf.jpeg', '2020-10-20 07:35:28', NULL),
(310, 296, 'product_images/AMOaIuLainFdrLpCP4Rro9QWtXkkzFRffUInzyf2.jpeg', '2020-10-20 07:36:37', NULL),
(311, 297, 'product_images/EJ3BbAPLXr34d6ywlldMbzYrff10XfmCEUjZoT5p.jpeg', '2020-10-21 06:18:42', NULL),
(312, 298, 'product_images/G1oghvGlxXkvVLYb6j9JCX0HiFEUh0Eh6Z9sQSTg.jpeg', '2020-10-21 06:27:44', NULL),
(313, 299, 'product_images/0fsDUG4inL8FrBZdqdjvFctomaKu0MZbosE5hjiV.jpeg', '2020-10-21 06:29:08', NULL),
(314, 300, 'product_images/zMk5RSMjMHOY3xl0t2VqvjtuwyrQjLhKTPIWaUUl.jpeg', '2020-10-21 06:32:11', NULL),
(315, 301, 'product_images/KsYyvBP7kR4Jste2LvV95g8OCODfFgh1kt3CsPYX.jpeg', '2020-10-21 06:33:34', NULL),
(316, 302, 'product_images/totcGfkWovk0bZ1l8UpfkA1r69EkuX8gGCdQu1rc.jpeg', '2020-10-21 06:34:52', NULL),
(317, 303, 'product_images/svw14jxdeWZyP9834srTGCLgAih6jusEyQGUre74.jpeg', '2020-10-21 06:36:04', NULL),
(318, 304, 'product_images/khTHmcWylBBaRKWl0ltYAhmpJNhvYRfDp9I8kGgO.jpeg', '2020-10-21 06:39:28', NULL),
(319, 305, 'product_images/O9iL6wkJLF6oUfj8oPlEOJH2KWe3af16r6tO4lsQ.jpeg', '2020-10-21 06:41:40', NULL),
(320, 306, 'product_images/Cl5OZPy1Atl2nYHL7dmhhvuXt1gkO0um5mZxlH88.jpeg', '2020-10-21 06:44:06', NULL),
(321, 307, 'product_images/ahLfIPemcDGxOhe2YRB84APfVlpmBkZ2i0hejxsk.jpeg', '2020-10-21 06:45:05', NULL),
(322, 308, 'product_images/tapNeUQNnUW6lFDHnRhnrWkwhMqiqlYdMNEUl4rg.jpeg', '2020-10-21 06:47:41', NULL),
(323, 309, 'product_images/lttjefhTr8vp3DjqYThYt4tC7fsdcj4HA4Q1usAz.jpeg', '2020-10-21 06:53:00', NULL),
(324, 310, 'product_images/d73Kj1qKVQ5kVA6oeEhpetFWsH1PXC5rAwwnCAbB.jpeg', '2020-10-21 06:54:19', NULL),
(325, 311, 'product_images/VWh1zH9IRtQVZfsSGBGzCFT0UEKQRXjGZPgo9mxj.jpeg', '2020-10-21 06:56:11', NULL),
(326, 312, 'product_images/VvcTSN1b4ZqciBXiDRirWXNmKYwe4plbXWYRFWRg.jpeg', '2020-10-21 06:58:12', NULL),
(327, 313, 'product_images/h0FBDZuL6VMQETgIjFTz0PWDY4GEjMkbYFspt5oI.jpeg', '2020-10-21 07:02:03', NULL),
(328, 314, 'product_images/B7lvyyqmK6O1M9SjrnXTA8DiUtwlQ3qVnRNXtRSB.jpeg', '2020-10-21 07:05:35', NULL),
(329, 315, 'product_images/hDiRhcNfDCAKVdFDZy4uC1ZBZRErcX8HO8RgPQQ9.jpeg', '2020-10-21 07:07:35', NULL),
(330, 316, 'product_images/7pckKnA90rQhFRmbzezyPrvKv5Aya877aoDutIAF.jpeg', '2020-10-21 07:11:19', NULL),
(331, 317, 'product_images/ILlbbKXcPJx6TEJNw4MxsM0fMppu6KtHwEyouZHd.jpeg', '2020-10-21 07:12:47', NULL),
(332, 318, 'product_images/bYoxDeED0mdLkE7ivLnPojnEtXRU5X7cESCChMLJ.jpeg', '2020-10-21 07:13:47', NULL),
(333, 319, 'product_images/tzgs9HyIZ9zfgxGGyvsWkBtexxFP2GGHu0mgAGNz.jpeg', '2020-10-21 07:15:58', NULL),
(334, 320, 'product_images/yroMbtcLLCMvuMr609cNLPQ9SvnaCn1XtwTsAfIf.jpeg', '2020-10-21 07:17:08', NULL),
(335, 321, 'product_images/NqtvTxGHcRp1glyhDe0n1w4rPDX7LSd0ywzy1mwj.jpeg', '2020-10-21 07:18:08', NULL),
(336, 322, 'product_images/Ck06acGiwYypmz5lpPMK7lR3m9o41b6CGxMyNxN8.jpeg', '2020-10-21 07:19:10', NULL),
(337, 323, 'product_images/rQzgqonHQKDRnXBDdBgm6GmOPHyKRBInqhCHeELc.jpeg', '2020-10-21 07:20:14', NULL),
(338, 324, 'product_images/nVwl9iiOlFD25Ibuub0Hq2kyqc6tFYH6bNvH2H1q.jpeg', '2020-10-21 07:21:17', NULL),
(339, 325, 'product_images/QYJmpSZptfeZ8zFyRzY52leeu2kJ0dCa2k8VSNlP.jpeg', '2020-10-21 07:22:11', NULL),
(340, 326, 'product_images/DWLGBPGU4KA7beC99gEOOZmMIt8XZBEdpFsUPOI3.jpeg', '2020-10-21 07:24:51', NULL),
(341, 327, 'product_images/TvDthhPSoO28TxdRwfjsQjYNeokxnHL405qrXsrs.jpeg', '2020-10-21 07:26:25', NULL),
(342, 328, 'product_images/Z0RHMjpweTx4jrKyf3r8UYFJ4bHHbP9G8qem258W.jpeg', '2020-10-21 07:27:51', NULL),
(343, 329, 'product_images/2xUUny3wopLjMPAkWt9kLjgrG8u8mkknKOkm2QGN.jpeg', '2020-10-21 07:29:03', NULL),
(344, 330, 'product_images/I5lRyZsiDMyWQBWC9zIG8rPNLQc8PVt0Ayx5vZHN.jpeg', '2020-10-21 07:31:00', NULL),
(345, 331, 'product_images/jNmtzYfj4NdFGR2A5EAyHc14yCMkrQzUI1EdYnJ2.jpeg', '2020-10-21 07:33:26', NULL),
(346, 332, 'product_images/KYETMy3hHFOGTNr4TNWjdphJryFqONI2eN7glIzh.jpeg', '2020-10-21 07:34:30', NULL),
(347, 333, 'product_images/VgiYUBkI4xfWuIvcB4BkKyCSzBVXxgWydoqENQwR.jpeg', '2020-10-21 07:36:47', NULL),
(348, 334, 'product_images/cJg4Pdf4bpfwonqoEz7URAH9NvgFNTsjAO83Lqza.jpeg', '2020-10-21 07:39:05', NULL),
(349, 335, 'product_images/6guFsgIETbBiXW4mVRbfsQIuVv07lLQNmNNM2yBD.jpeg', '2020-10-21 07:40:03', NULL),
(350, 336, 'product_images/KxDldr4ZqwTqKGZxzX7KW5OkrUTFDQC4HkmmMWdH.jpeg', '2020-10-21 07:41:46', NULL),
(351, 337, 'product_images/G3lozDOvXmHUNy2EZ3u7HVODqgum0jamWJQ92mSE.jpeg', '2020-10-22 05:33:48', NULL),
(352, 338, 'product_images/HRbYbG8kwYnG68lXDqDbz7HCfO8PoAqfIKtUZsvJ.jpeg', '2020-10-22 05:36:08', NULL),
(353, 339, 'product_images/SpcoulBmtLtAn9WNu8T6zNIL5evM70bg0BZJlV6s.jpeg', '2020-10-22 05:37:43', NULL),
(354, 340, 'product_images/O1be1ZyikTiJDUBQUUKrtn8eNyjgUkbvV5OCWAT6.jpeg', '2020-10-22 05:39:38', NULL),
(355, 341, 'product_images/gaiGkq0K9PdDKczKyRTpzsKuDcGht7dgmOiCyNZl.jpeg', '2020-10-22 05:43:36', NULL),
(356, 342, 'product_images/kgH4Gih0lGtMBbVyYirBzQoDduYhF6wbn6DDiPBE.jpeg', '2020-10-22 05:44:40', NULL),
(357, 343, 'product_images/CXjyibaRsYLiQkD9h2iVnymOpWFhMnVCd7Iqr2Rv.jpeg', '2020-10-22 05:46:14', NULL),
(358, 344, 'product_images/ReyNFQN1KyW1DBLseNac5BY3ofhW0M2O51OF9EeR.jpeg', '2020-10-22 05:49:08', NULL),
(359, 345, 'product_images/O7CPfH5Jw7rZEYE6FrAjAzBOHfvNoqbcqt9UO8IE.jpeg', '2020-10-22 05:50:23', NULL),
(360, 346, 'product_images/xTJ2QN76lUI8et73LwdQPm4HBgkIrR2smVRQRXaY.jpeg', '2020-10-22 05:51:59', NULL),
(361, 347, 'product_images/KyTa1tB1uhHGRj4PfNH9LZbbo0J1qU13YOTodtkT.jpeg', '2020-10-22 06:24:17', NULL),
(362, 348, 'product_images/VYgqLvltN3Js1vGNCpX4mcVoSDoayt7LG43T7JZz.jpeg', '2020-10-22 06:28:18', NULL),
(363, 349, 'product_images/LC03iqgNmgcp6uzdOq40Iy2hfEUS5RG85V7ugl79.jpeg', '2020-10-22 06:33:31', NULL),
(364, 350, 'product_images/6XDgpevi5kZAfOaQ2XzlsCt2BeNmSPq2B4yBYL0A.jpeg', '2020-10-22 06:36:46', NULL),
(365, 351, 'product_images/juQcTQ6HNTJLJNthXBHFZo8hxqHNK9XycHRwsH0P.jpeg', '2020-10-22 06:44:30', NULL),
(366, 352, 'product_images/6ZBy2jOM5ovyoWGYwLFqhscPCvKN7BaKnXwi1ZiL.jpeg', '2020-10-22 06:56:10', NULL),
(367, 353, 'product_images/MoeNXy6BGj7uCTgX4jYlxmXenzdvaFepZfA5eY36.jpeg', '2020-10-22 06:59:09', NULL),
(368, 354, 'product_images/mVYnR9wFKBeJJ6rkH69HKYn9MZRiA1s0ivDmXo9S.jpeg', '2020-10-22 07:00:49', NULL),
(369, 355, 'product_images/1hJ1y0vnEoPrxqXvcJujVk9LL5Uf3AMLf8nkzKed.jpeg', '2020-10-22 07:02:16', NULL),
(370, 356, 'product_images/XJCnTAgFlfJA9xpdgChnn9pDZTvxRngFZ4Ng65gg.jpeg', '2020-10-22 07:05:15', NULL),
(371, 357, 'product_images/bYNED6ivMcgFVSpNVZeMWj7QWpVGtwo22WnYDEuT.jpeg', '2020-10-22 07:07:36', NULL),
(372, 358, 'product_images/VycEnIoYk55NYrhwKL8DzojleZoOqecilD3faVsY.jpeg', '2020-10-22 07:15:55', NULL),
(373, 359, 'product_images/UagKqOsGTSnQ0t66lR19FrlKXwhWLSYIGoMNVmwW.jpeg', '2020-10-22 07:20:21', NULL),
(374, 360, 'product_images/xlR5gV5KkBeTchFoqGMZApccBbdquvACYrSJQid3.jpeg', '2020-10-22 07:21:46', NULL),
(375, 361, 'product_images/dQlmQtwFt8xb5LN4slQE8NCcOmS4eFC7w44Hc89I.jpeg', '2020-10-22 07:28:07', NULL),
(376, 362, 'product_images/Dzkteg4DZrxQl9MWEoPlHWDUCyKjBD2NEcNkbg8p.jpeg', '2020-10-22 07:30:46', NULL),
(377, 363, 'product_images/FqQxJz0FNN5mJDreLBN38iceqWE2cdeSdB9b8i8H.jpeg', '2020-10-22 07:31:53', NULL),
(378, 364, 'product_images/ftvVLHfz6uWlQ49z7FBaJxUxqmxIg4Fp3TKyQxWt.jpeg', '2020-10-22 07:33:11', NULL),
(379, 365, 'product_images/VMnUThT1OmvxfQjYsmTYzjDDcRqaIPwb68Um1PW2.jpeg', '2020-10-22 07:34:20', NULL),
(380, 366, 'product_images/KX3Hr88N6UsYMmAUQ6QpoZM8Mpm2HrfM56YatAt8.jpeg', '2020-10-22 07:36:12', NULL),
(381, 367, 'product_images/DfLZ9Q2TkP2uftLLdNQFsnjywa8NWNzDVBSu4NWD.jpeg', '2020-10-22 07:37:49', NULL),
(382, 368, 'product_images/lmVTo6qgwD01IfkCx9dZQKCi2FhPJWMSKNWeHseb.jpeg', '2020-10-22 07:39:09', NULL),
(383, 369, 'product_images/Zd892KClBzxvFPJgVWJokil3VFy0RQ5tAYGlo5jv.jpeg', '2020-10-22 07:41:56', NULL),
(384, 370, 'product_images/MEeeOSIfhiJWMueShWv0AIgiDa7BbilMyM1Qycy3.jpeg', '2020-10-22 07:43:43', NULL),
(385, 371, 'product_images/b8F92ldnl5DJR9JbGMgwvBDloIL0TXWzEiDfjwOL.jpeg', '2020-10-22 07:45:17', NULL),
(386, 372, 'product_images/pc70a4Rf3sunxxDHwjyab17u44y8lKmdt6uUnCwT.jpeg', '2020-10-22 07:47:07', NULL),
(387, 373, 'product_images/alOFHn2XrXXjzyujYiti6IA0CNpZ89BJrjBN5YUy.jpeg', '2020-10-24 05:56:58', NULL),
(388, 374, 'product_images/f43bfdBEgN2qhs24IQzEe3uU7JigN5hy5lQRFhpv.jpeg', '2020-10-24 05:58:11', NULL),
(389, 375, 'product_images/9zSPJoIw6iLL5tbqYPIfzGncNnOSQMMhhOnP8cCW.jpeg', '2020-10-24 05:59:35', NULL),
(390, 376, 'product_images/GXm3w6PyX9LrKkRNLGZkNhcMSH3DwS58ApG7hTow.jpeg', '2020-10-24 06:01:25', NULL),
(394, 381, 'product_images/KxtaftZJqZkAS7eCQq26pjvpEcDxKzS8FPsZMUcc.jpeg', '2020-10-24 06:18:42', NULL),
(395, 382, 'product_images/xkfrMv2oh7BJYue05ibu2w6Cwr5AyO0YcWsFglRq.jpeg', '2020-10-24 06:20:07', NULL),
(396, 383, 'product_images/1JP6LNjuh8jVAfPA5EMFQuvEW0JUwIONc879iSgp.jpeg', '2020-10-24 06:22:56', NULL),
(397, 384, 'product_images/sLhD953wtnOJuq4HKULPFI0KtoI5Q2YQl32eWwYv.jpeg', '2020-10-24 06:27:17', NULL),
(398, 385, 'product_images/zuP8TDSp4blyEPPRp104NogQggcQ6UfuvvA1LLkt.jpeg', '2020-10-24 06:28:46', NULL),
(399, 386, 'product_images/PhInAOLi9xJmfaoSCeZiJMkNiZEEsl33YCuVMcUw.jpeg', '2020-10-24 06:31:04', NULL),
(400, 387, 'product_images/kltG8wBwAIcMMZmZeyJ8jkfmxQRoT4bcjTYa0pR7.jpeg', '2020-10-24 06:34:22', NULL),
(449, 436, 'product_images/l6Y0fI5w7PKZvzhTeBRdJB66gctrbNrUuLyT8foy.jpeg', '2020-10-25 06:10:37', NULL),
(450, 437, 'product_images/m9EkuY13WqXeYdbMwpeD9xf1Sn63BTv7eCOKxaGF.jpeg', '2020-10-25 06:14:51', NULL),
(451, 438, 'product_images/Fg75LsOVcTlDqEA4M5NOKX8ufKX6mvtWYQKk2hW0.jpeg', '2020-10-25 06:16:54', NULL),
(452, 439, 'product_images/IjS0Wbi9ZuyJVFFagxCX8i5oFyA4WsMVx4UFc7yo.jpeg', '2020-10-25 06:18:16', NULL),
(453, 440, 'product_images/PVAJtNOI1pinjg4GA59bx2gbj8i8n6KzXwfpxykG.jpeg', '2020-10-25 06:19:42', NULL),
(454, 441, 'product_images/5MrREmG3YZIFPtaV3bybTzORpQDcX6Fj2qZZ03ry.jpeg', '2020-10-25 06:22:35', NULL),
(455, 442, 'product_images/SzB0akQGT5poI1H9cjo4O4dXKPOp7xY4LIvDzDbp.jpeg', '2020-10-25 06:23:56', NULL),
(456, 443, 'product_images/VX25rdh2FemoZdBa7kdtdurEjLqEorR2LoCsJ4FW.jpeg', '2020-10-25 06:25:14', NULL),
(457, 444, 'product_images/pGFf7TOTJJ544DlE1I67GGke5cQFgCHtESzd4RJh.jpeg', '2020-10-25 06:26:15', NULL),
(458, 445, 'product_images/VMgWm6dRC3bcZB5p1JPmuP4i8IYDsHj5OSS1hdbG.jpeg', '2020-10-25 06:27:42', NULL),
(460, 447, 'product_images/gK5pwmHMX0jvSBuz1FT2fTd5pqyn9ZZ1yumBHFjA.jpeg', '2020-10-25 06:31:38', NULL),
(461, 448, 'product_images/1DExIj7B5enIDAWNvRK4f8m3c8bJUQR5jSyQibmO.jpeg', '2020-10-25 06:33:30', NULL),
(462, 449, 'product_images/cGsUNevTzjdmlCA4ml2M8ivKeQvReyPl4yoUeIy4.jpeg', '2020-10-25 06:35:43', NULL),
(465, 452, 'product_images/6Rr1VHNCd96xdCnT5gwwe4zd2EMsOBHBX2eHu2zQ.jpeg', '2020-10-25 08:09:02', NULL),
(466, 453, 'product_images/Y7ewk3DOWRpl4hZLlwAkILtiK9NcPCK5PpmLYAmv.jpeg', '2020-10-25 08:12:00', NULL),
(467, 454, 'product_images/GOtMuchiQCOHahTpRX6XpL7PeXMKdXi1QSlq0rRl.jpeg', '2020-10-25 08:14:41', NULL),
(468, 455, 'product_images/mwOjzLoFmBnT3rwDfWXWJTtkkWYBamI9ddIrjVoh.jpeg', '2020-10-25 08:19:15', NULL),
(469, 456, 'product_images/yxpKVhpcbJDlteVivX79PW8BatCo631BahZfu5PP.jpeg', '2020-10-25 08:22:21', NULL),
(470, 457, 'product_images/CSITmeJBmlvixOrQFeOTDAYETzi5Hp7brM6Ufd95.jpeg', '2020-10-25 08:25:05', NULL),
(471, 458, 'product_images/JGDiOnsRFUpKvenPQeAmRxNQBUzxwBzBHefRvNn1.jpeg', '2020-10-25 08:27:10', NULL),
(472, 459, 'product_images/XCZzyQ1xTt2mU81V5F3jHfqUdoK7veBA37SUvpHh.jpeg', '2020-10-25 08:28:49', NULL),
(473, 460, 'product_images/oNTgZujM4pgnxSCsqUNZ5X4DJukF7VpdPEpvbPPj.jpeg', '2020-10-25 08:30:30', NULL),
(474, 461, 'product_images/4Xc9zbjIovgVheS7u0kujtXZDsdTBpWd3qZIAcSY.jpeg', '2020-10-26 07:34:01', NULL),
(475, 462, 'product_images/FDE7rl6Q2optwRBkkoMcUujhkecM7mr02EB2hIJx.jpeg', '2020-10-26 07:35:48', NULL),
(476, 463, 'product_images/vU3dae6Kb7gulmiWWbmmSe0W1DM7Dl2AScZUf6Pl.jpeg', '2020-10-26 07:41:56', NULL),
(477, 464, 'product_images/IA74jyusuwVKNZZ4fLXO5d7rZaaM1Xl3sE7FJwwh.jpeg', '2020-10-26 07:43:35', NULL),
(478, 465, 'product_images/4B7Pd3aETYB4TxWY4ZsTcHHdEhaxRZej8Gns4fDR.jpeg', '2020-10-26 07:47:04', NULL),
(479, 466, 'product_images/g0AG8keEnHJ18ZB6FyOtmAUtcSfsm8DSFc3qtQSd.jpeg', '2020-10-26 07:50:20', NULL),
(480, 467, 'product_images/yN2wMxaSLfJJeRZATcodXm4IrWUf3WiVvNiDJqnn.jpeg', '2020-10-26 07:57:51', NULL),
(481, 468, 'product_images/KdqP3e7NSJCITbf1L6gZLEl80oroBtJZa7QEMWcn.jpeg', '2020-10-26 08:00:18', NULL),
(482, 469, 'product_images/giV0L2pO6b6Qtcm1HZBYzFzUXDUVTBqaBDlelJwm.jpeg', '2020-10-26 08:03:20', NULL),
(483, 470, 'product_images/4nlx1VNx5RlsqAZHqyTMRhtkEHf9XqzY6Le4wSqK.jpeg', '2020-10-26 08:08:11', NULL),
(484, 471, 'product_images/1khSh03UtLScnotuj2HOTFsAYVLLBF4xDo3RrjiK.jpeg', '2020-10-26 08:10:37', NULL),
(485, 472, 'product_images/mQGqPsmTEYyzJVAHjKszijRKoKgBRJ5ZvF5oP6PV.jpeg', '2020-10-26 08:13:42', NULL),
(486, 473, 'product_images/HWcKDL13qFrcwDPIHEl04DkWncn1ZVghuchcHep7.jpeg', '2020-10-26 08:16:50', NULL),
(487, 474, 'product_images/9ymntkEiOWgg84ki39o7VGXhB2ktG3hbKE1uSNJQ.jpeg', '2020-10-26 08:20:46', NULL),
(489, 476, 'product_images/cVHY81wPxeeg8PwgEMBcWZ5fRmoI2Py4pAOUrI4N.jpeg', '2020-10-28 05:13:29', NULL),
(490, 477, 'product_images/MNWnBjAmVLHSlfNxjwh9OmY6tIjoAIWJ8ugirh16.jpeg', '2020-10-28 05:20:45', NULL),
(491, 478, 'product_images/c3qpzeSgQyI9jLUuJHM1GMC4LhmCEZlhnqgBSddH.jpeg', '2020-10-28 05:23:15', NULL),
(492, 479, 'product_images/jwcX3dfqI9BMvJwxtu4Bo9IQkXXL5QT0u7empg6g.jpeg', '2020-10-28 05:29:04', NULL),
(493, 480, 'product_images/bc9aXeiVAdNSVkxyKCqqjXDunbyOjOTxtbJgWbR0.jpeg', '2020-10-28 05:32:12', NULL),
(494, 481, 'product_images/67b7eAFcMyMxpiIj5DEWwMsopKpyN6uEpOM1OEHc.jpeg', '2020-10-28 05:35:00', NULL),
(495, 482, 'product_images/HbORJgAPFpWLZia40igat2xRjHh2N4mkmX8Xfy8b.jpeg', '2020-10-28 05:38:13', NULL),
(496, 483, 'product_images/Qo6s5ml5uYgVPImOeMklSDf1UKHjuRPELIrC32oZ.jpeg', '2020-10-28 05:40:55', NULL),
(497, 484, 'product_images/MLA14y5z4WbTworDZ2RlQ0hggREijpmJza1bzgXx.jpeg', '2020-10-28 05:43:57', NULL),
(498, 485, 'product_images/KgNEbs1rSgbeTO18UHGLLoat7zgBkdRLJEvUr9kw.jpeg', '2020-10-28 05:47:48', NULL),
(499, 486, 'product_images/4vPh0qh1QTAUX9URLUKMqIBdaTqgGn9NzFaE77Py.jpeg', '2020-10-28 05:50:49', NULL),
(500, 487, 'product_images/Q3SE6PuIODRGGrPKZwxxVeXJ59w330K1Ffkmb138.jpeg', '2020-10-28 05:53:46', NULL),
(501, 488, 'product_images/NWmjPEhAmdoF2i8ZTvwNK1AoG8rk5sBh9NelAOdx.jpeg', '2020-10-28 05:57:25', NULL),
(502, 489, 'product_images/F9gw48VFtzogxVOL6G00Gk18mhUA5ow89Neqg0S4.jpeg', '2020-10-28 06:02:23', NULL),
(503, 490, 'product_images/dvj1lKyzJnTboLd0t2usmICYX2FDZXhwJz2qZ1pS.jpeg', '2020-10-28 06:05:13', NULL),
(504, 491, 'product_images/olW6s3VdaLIVB34P8xwoaQDCXdPP2oyG4XS7Qo5f.jpeg', '2020-10-28 06:08:39', NULL),
(505, 492, 'product_images/m9j8xqYnWIwFpoXnijj01liIjcr1NSYfc7EYXdxX.jpeg', '2020-10-28 06:12:00', NULL),
(506, 493, 'product_images/jD6IsSU5D614OefG5r33mwPRTKS4wjxk425kEJJ7.jpeg', '2020-10-28 06:15:06', NULL),
(507, 494, 'product_images/NfDR9NGrSeMo8IpLkRo48jHBvumtzMbsOpU8TXUM.jpeg', '2020-10-28 06:18:05', NULL),
(508, 495, 'product_images/yN4ZjdqnTMpp4I5dSdcoMDjsKpyyyfuIDSHXrBkl.jpeg', '2020-10-28 06:20:58', NULL),
(509, 496, 'product_images/bRUUAXYNp3BarlsRFdx0SW165BFF9le8bmnp5WKv.jpeg', '2020-10-28 06:24:08', NULL),
(510, 497, 'product_images/MTrNQkhgg1U5UCPB1lLKBmsJIIUYtryCfAeEgpJm.jpeg', '2020-10-28 06:28:06', NULL),
(511, 498, 'product_images/tXSSGAKjkYue48gHNmYoKF6i8RxjCYrS5um903Kr.jpeg', '2020-10-28 06:36:44', NULL),
(512, 499, 'product_images/pIG3ajGfBj63BBhpestNOKq0yWEnKuIl2rZ2vJob.jpeg', '2020-10-29 05:43:47', NULL),
(513, 500, 'product_images/k0EPQUH2TpYvvWgpxcHxxPal3gRh0f44Qzr9Qkoc.jpeg', '2020-10-29 05:50:08', NULL),
(524, 511, 'product_images/VKZEM98sSHOExAPRLJTUi6ClwsY2OdaxY3jDsKQF.jpeg', '2020-10-29 07:19:46', NULL),
(529, 516, 'product_images/6zMYHyAsvOMQiVaJLluM88fkmVw6yFbLEjXMyKD1.jpeg', '2020-10-29 07:43:06', NULL),
(530, 517, 'product_images/YZsR16N02STx5hbwJ9UJki4uqvM2g0xUpmHbBLUE.jpeg', '2020-10-29 07:49:28', NULL),
(531, 518, 'product_images/zdidY1TicFBTtYQpQyLH8LbFDce5xIJ6ZYGAxSWh.jpeg', '2020-10-29 07:53:10', NULL),
(532, 519, 'product_images/JgZWNVb8lEMQn9g5dK9dAjskWC62636PdfcDlpDl.jpeg', '2020-10-29 07:57:58', NULL),
(533, 520, 'product_images/ECpDlmmnjj3LNnOHGSokjPr9TOlHeUUR5CtbqA7s.jpeg', '2020-10-29 08:01:33', NULL),
(534, 521, 'product_images/5UdGqTBQSVrNP3zt8NyUgOQsndRdqoKtVSYSmD4f.jpeg', '2020-10-29 08:05:01', NULL),
(535, 522, 'product_images/N3c3WTMhomPpk8VLw23sNJWbEpEydopQhLoxO6HD.jpeg', '2020-10-29 08:07:41', NULL),
(536, 523, 'product_images/y6yRoplFkt4LJpoHUE6T4PCJ1z0AyrCXIVxsplyG.jpeg', '2020-10-29 08:11:50', NULL),
(537, 524, 'product_images/N64OVMMTObi9cySIAf7S5pGx8U3ijXUGLU6RtjMW.jpeg', '2020-10-29 08:14:48', NULL),
(538, 525, 'product_images/tMuySdZVVvbV07600MxhO3o2U23yjS6q8Ai4Gf64.jpeg', '2020-10-29 08:18:23', NULL),
(539, 526, 'product_images/xLpawqMYVqJpD18MSYUM8eG56J6wavawbHlC6Fzx.jpeg', '2020-10-29 08:21:32', NULL),
(540, 527, 'product_images/v4IpaekE2HsvF0euJBpzbwrn2QBLAgk2gxLBAXGA.jpeg', '2020-10-30 05:41:05', NULL),
(541, 528, 'product_images/TEkvz6GatxonFlRuuQZeDmXEytdKStpkUiiU7lOR.jpeg', '2020-10-30 05:44:41', NULL),
(543, 530, 'product_images/FljPKGGpRoSbz952x0dLgnTO1poGmfVWomQSwwFF.jpeg', '2020-10-30 05:53:45', NULL),
(544, 531, 'product_images/GZAvZzeZJIOial3j7yQae57ggx6mD6sZiccbUhqj.jpeg', '2020-10-30 06:04:40', NULL),
(545, 532, 'product_images/GfFQzNRmj6EdjWB3RbYvnwPGnw7ZbMkH9J5BdkWn.jpeg', '2020-10-30 06:06:26', NULL),
(546, 533, 'product_images/hNMsFhzsvnAoevsEBYcfi6eGnX5tXaWEAq17ohwm.jpeg', '2020-10-30 06:09:27', NULL),
(547, 534, 'product_images/AP5Zn4GpcaslgE5bVJHkswOPVU5GJpXPb81IMJOF.jpeg', '2020-10-30 06:18:10', NULL),
(548, 535, 'product_images/8Lfr4BDWxUd2tYfQozvb7XPoArHjlx5nrURyr1He.jpeg', '2020-10-30 06:47:09', NULL),
(549, 536, 'product_images/Z9AUMPHBYRnY7k59MXGnoZvpPzlk7UxG0UsJxF9z.jpeg', '2020-10-30 06:53:39', NULL),
(550, 537, 'product_images/zCLVqN9rBZMM3ntU1R1Yy9WALcfCvJzcItsagxBK.jpeg', '2020-10-30 06:59:04', NULL),
(551, 538, 'product_images/1eIOa2HewkGGcqHLXAdA1EbHzfYDTJYTCRGdqmSe.jpeg', '2020-10-30 07:08:50', NULL),
(552, 539, 'product_images/34LLLdhgDJ01zLhhqmvuW6qx8u8PNofawya8fAyA.jpeg', '2020-10-30 07:12:18', NULL),
(553, 540, 'product_images/9F8mymE4HkqhMU0suyX4WWwLBhGe18ACURElCqO8.jpeg', '2020-10-30 07:15:11', NULL),
(554, 541, 'product_images/5OP97CJyOfKaPSDFL1HPwc2RUfWgrzrH7JG1r3qX.jpeg', '2020-10-30 07:19:00', NULL),
(555, 542, 'product_images/V6C2zIq2xgOmqDVtfRs5SK2hKhIhZxmd9ysZkqJt.jpeg', '2020-10-30 07:22:41', NULL),
(556, 543, 'product_images/xeXk2aLoMb4EkQcYAtFHc75In9SoFSuBymEgT5aV.jpeg', '2020-10-30 07:25:52', NULL),
(557, 544, 'product_images/aR71STRclLz1af97WjghCQS51wwToTuqbyBOaWac.jpeg', '2020-10-30 07:30:12', NULL),
(558, 545, 'product_images/RPhUQXSSuIwhut5BzWAk5IQTKrMkOXZQ7A9pRbS6.jpeg', '2020-10-30 07:34:31', NULL),
(559, 546, 'product_images/1UGqlDvJoGdDqWv7qzKdGn3QmvyB7QBOh35p7q5E.jpeg', '2020-10-30 07:39:11', NULL),
(560, 547, 'product_images/BKpnAwl0qEFaeCaU7LtC7mpjPTnq77Apl3mqWYqE.jpeg', '2020-10-30 07:44:46', NULL),
(561, 548, 'product_images/MmQSxPiXk2MtkGJ1vqFp3doarO5S09w8i4nmMKXQ.jpeg', '2020-10-30 07:50:03', NULL),
(562, 549, 'product_images/4homWDmr7hwglAElmdZGLWlp2JS8gvjwhdGiwAGf.jpeg', '2020-10-30 07:54:19', NULL),
(563, 550, 'product_images/OsR9hxGTlSr4AKNAOYu9tzfxA2J2n0SM8KNT0quQ.jpeg', '2020-10-30 07:59:20', NULL),
(564, 551, 'product_images/kngOooAT7DlGgC65F4Xgcz09MEFiMVyZmbHVVssM.jpeg', '2020-10-30 08:05:26', NULL),
(565, 552, 'product_images/zSfDo9s08AJQsVdXEaNs292pSlvNpyIBz8Zs6YOQ.jpeg', '2020-10-30 08:08:50', NULL),
(566, 553, 'product_images/p5n57LEreUyyYLTI5lTfrlIm24C0J4h6EhcZ0pzI.jpeg', '2020-10-30 08:13:05', NULL),
(567, 554, 'product_images/VuG6WFyQEytxu9VEyQHhYqXQKGQnu03VhNwU2MlO.jpeg', '2020-10-30 08:17:41', NULL),
(568, 555, 'product_images/66AKa46r46myC23wkhLSTgfpRv05OT8jParfms7G.jpeg', '2020-10-30 08:21:07', NULL),
(569, 556, 'product_images/Otdt9ycQ0Vvizsxn0SY2W3RGjDAhC4mjeSwy7e0J.jpeg', '2020-10-30 08:24:31', NULL),
(570, 557, 'product_images/vauiX4TMR4AnyCBj6Lwq7MZAij2vbMJPNUT4Fp8O.jpeg', '2020-10-30 08:32:11', NULL),
(571, 558, 'product_images/w7X3MIDp0FsGp5H7UHZnpe1ysl6FJv3XZJ1K1znq.jpeg', '2020-10-30 08:35:25', NULL),
(572, 559, 'product_images/Pvixxq4KPqwycMyIm7sl6xSJeo0yruo8HlrlVy8L.jpeg', '2020-10-30 08:38:18', NULL),
(573, 560, 'product_images/rDOX9kMOjbJ86xx4syc7ROM1ToFfbUOo4p1DpRp3.jpeg', '2020-10-30 08:44:39', NULL),
(574, 561, 'product_images/xkRxMwn4HXEIFhYNGryDWxd4MnuYZe9IFqOoQgNN.jpeg', '2020-10-30 08:48:15', NULL),
(575, 562, 'product_images/lq4l5Xamuw7mYUK7tTk4MfJdFx4ZwBx8EPf5EhYZ.jpeg', '2020-10-30 11:32:45', NULL),
(576, 563, 'product_images/ZPzq2D27ZhBgLcmni7RxWrjNxlsgloWkmBhdBr8n.jpeg', '2020-10-30 11:42:42', NULL),
(577, 564, 'product_images/AHIrtQb019QIpShXdAeAzWDNXmns78GcB1B85yFA.jpeg', '2020-10-30 12:05:03', NULL),
(578, 565, 'product_images/Apj7g6AxtwHA8qO6BiRmbduerjRe1ZsxSRGRsnDC.jpeg', '2020-10-31 05:53:04', NULL),
(579, 566, 'product_images/TuXUZf22pGumiIKhDpi8UePmPSiteCUuJXWEH3Lq.jpeg', '2020-10-31 05:57:25', NULL),
(630, 622, 'product_images/bny6jdG0z67QFOqwcsMFZkc187FuAYHJhMa82F3p.jpeg', '2020-11-27 06:09:07', NULL),
(631, 623, 'product_images/COs0ehb4o2cE7FKO8mpkTzbBMvJLe9Sg9kHjTJi7.jpeg', '2020-11-27 06:10:05', NULL),
(632, 624, 'product_images/54DgWKzovnxCwObzDuxIYHO9hjcMqAUneL2xb97N.jpeg', '2020-11-27 06:11:27', NULL),
(633, 625, 'product_images/VTLTLUorUw0CX2V15VOHUFaKiwsjiV3XQ1l7KrCq.jpeg', '2020-11-27 06:12:34', NULL),
(634, 626, 'product_images/LRVAEkHxAI5jWHcowUaGtsgM9llNf4gXLOsiP1wL.jpeg', '2020-11-27 06:17:29', NULL),
(635, 627, 'product_images/2QZ4sVInFaQQTgZb0liqCLtivFDx62znrOFqzzBA.jpeg', '2020-11-27 06:18:14', NULL),
(636, 628, 'product_images/V6JPSQ3VE8t3eMFcbD941TDOfEGQUomri7n014vO.jpeg', '2020-11-27 06:18:50', NULL),
(637, 629, 'product_images/fGy01oCVIKpQKFHQDnvY24jzNngqIc3ypiMWLAjX.jpeg', '2020-11-27 06:19:26', NULL),
(638, 630, 'product_images/hyXoRcjd7hHHm6CXwFEkbU3H8KPzgzRkzM9Vwe6y.jpeg', '2020-11-27 06:20:12', NULL),
(639, 631, 'product_images/r9BNUHYLghSZcpllpS9dlpwxL6O2FpIGkI5YwbiV.jpeg', '2020-11-27 06:20:45', NULL),
(640, 632, 'product_images/aeG2mS1vHBxQH8QMDa5QSSMFuhQzpkQZMkY5BF0W.jpeg', '2020-11-27 06:21:25', NULL),
(641, 633, 'product_images/Zl5IjLvoL9CDV5jOM7qYMV07WtxaKv4qI5cy6Oz7.jpeg', '2020-11-27 06:22:11', NULL),
(642, 634, 'product_images/4YpzK83dTzpWvRC3MK7SfiaCcIx40AMiG2ruimSg.jpeg', '2020-11-27 06:22:46', NULL),
(643, 635, 'product_images/GGoTx2seyMjABmNen2ABk7gJH3gwIJD2wTgj5C0z.jpeg', '2020-11-27 06:23:24', NULL),
(644, 636, 'product_images/YiYJxp1G0sYAIfZlymM7EWh6rWYQuLLn7KXet93P.jpeg', '2020-11-27 06:25:33', NULL),
(645, 637, 'product_images/JdgaHWOuCNjoPCzJ5yfiGvaFWRy9WdjSdc3hQuRK.jpeg', '2020-11-27 06:33:33', NULL),
(646, 638, 'product_images/9Bt7FJC9cOo6IeMOBjgkhM91cxNnmdivOZStn1sr.jpeg', '2020-11-27 06:36:06', NULL),
(647, 639, 'product_images/klq4hRzJSpQiZOJi2SN3dXCx7cibzpynGhYAsbrP.jpeg', '2020-11-27 06:37:27', NULL),
(648, 640, 'product_images/T1Ye5Z5YCVsqQBiIRKXvp6xeAusP1RCrySCTINdW.jpeg', '2020-11-27 06:38:14', NULL),
(649, 641, 'product_images/9dLumBu9FodeIp5Mlpu5IelEUAiTdpJmVrxY2EoZ.jpeg', '2020-11-27 06:39:00', NULL),
(650, 642, 'product_images/q4PHsNf7BcfuzVSog5pAcQy76VuZNN1XMV9fPq9a.jpeg', '2020-11-27 06:39:46', NULL),
(651, 643, 'product_images/sRHiCaIPTUvM5UR9SpHrkmaoW2xo9QQjxS1JJ1jR.jpeg', '2020-11-27 06:40:50', NULL),
(652, 644, 'product_images/Er38RXoOfacxNNCwUDVjJMfisNhHXgE41ywXg0WF.jpeg', '2020-11-27 06:41:35', NULL),
(653, 645, 'product_images/e8uowKBYJCp2OSyKMs4iBPYLY6aV5uzTYC0VGC1I.jpeg', '2020-11-27 06:42:42', NULL),
(804, 796, 'product_images/QAiHi2jijY9inUx7F82QZuzanO0BcG4c932U1las.jpeg', '2020-11-30 08:30:08', NULL),
(805, 797, 'product_images/KAB8soupk6npjowAh3NFqt9bXsU9lr37Vg8hBazj.jpeg', '2020-11-30 08:32:00', NULL),
(806, 798, 'product_images/3zk1vfK8s6b3BzSW43eqXaCUqCPD5tqqDMlagRnJ.jpeg', '2020-11-30 08:32:54', NULL),
(807, 799, 'product_images/cvBmB03Ovpr3pQwI8ehRr8zgv5Y0wFl2XiJgjuTD.jpeg', '2020-11-30 08:34:22', NULL),
(808, 800, 'product_images/loAYjTcfLr8Dz7WbyM1MQ3kHbMaSSu35xNhm1L0b.jpeg', '2020-11-30 08:35:27', NULL),
(809, 15, 'product_images/mZx8m4DDdco81y4zva9nqVUwDRzxx34PgdBEtpY8.jpeg', NULL, '2020-12-08 02:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(10) UNSIGNED NOT NULL,
  `stat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `magazine_id` int(11) DEFAULT NULL,
  `referral_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `stat`, `status`, `user_id`, `product_id`, `magazine_id`, `referral_code`, `created_at`, `updated_at`) VALUES
(1, '1', 'unpaid', 12, NULL, NULL, 'u1m7j1', '2021-01-23 10:26:23', '2021-01-23 10:26:23'),
(2, '1', 'unpaid', 1, NULL, NULL, 'u1m7j1', '2021-01-23 10:26:23', '2021-01-23 10:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `referral_history`
--

CREATE TABLE `referral_history` (
  `id` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `status` enum('paid','unpaid') DEFAULT 'unpaid',
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `magazine_id` int(11) DEFAULT NULL,
  `referral_code` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_history`
--

INSERT INTO `referral_history` (`id`, `stat`, `status`, `user_id`, `product_id`, `magazine_id`, `referral_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'paid', 2, NULL, NULL, '123456', '2020-12-22 13:40:05', '2020-12-22 05:58:44'),
(2, 1, 'paid', 3, NULL, NULL, '123456', '2020-12-22 13:40:11', '2020-12-22 05:58:44'),
(3, 1, 'paid', 11, NULL, NULL, 'u1m7j1', '2020-12-22 06:00:42', '2020-12-22 06:00:42'),
(4, 1, 'paid', 9, NULL, NULL, '456123', '2020-12-22 07:39:55', '2020-12-22 07:39:55'),
(5, 1, 'paid', 4, NULL, NULL, '456123', '2020-12-22 07:39:56', '2020-12-22 07:39:56'),
(6, 1, 'paid', 2, NULL, NULL, '6g1UM3', '2020-12-23 06:36:41', '2020-12-23 06:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Artist', 'artist', NULL, NULL),
(3, 'Product', 'product_manager', NULL, NULL),
(4, 'Magazine', 'Magazine_manager', NULL, NULL),
(5, 'Category', 'category', '2020-11-09 18:30:00', '2020-11-09 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(21, 4, 4, NULL, NULL),
(22, 5, 4, NULL, NULL),
(39, 1, 4, NULL, NULL),
(40, 2, 4, NULL, NULL),
(41, 3, 4, NULL, NULL),
(42, 4, 3, NULL, NULL),
(43, 5, 3, NULL, NULL),
(44, 4, 5, NULL, NULL),
(45, 5, 5, NULL, NULL),
(48, 2, 6, NULL, NULL),
(49, 5, 6, NULL, NULL),
(50, 2, 2, NULL, NULL),
(51, 5, 2, NULL, NULL),
(52, 1, 3, NULL, NULL),
(53, 2, 3, NULL, NULL),
(54, 3, 3, NULL, NULL),
(55, 1, 2, NULL, NULL),
(56, 3, 2, NULL, NULL),
(57, 4, 2, NULL, NULL),
(58, 4, 8, NULL, NULL),
(59, 5, 8, NULL, NULL),
(64, 2, 7, NULL, NULL),
(65, 5, 7, NULL, NULL),
(66, 2, 9, NULL, NULL),
(67, 5, 9, NULL, NULL),
(68, 1, 10, NULL, NULL),
(69, 2, 10, NULL, NULL),
(70, 3, 10, NULL, NULL),
(71, 4, 10, NULL, NULL),
(72, 5, 10, NULL, NULL),
(93, 2, 11, NULL, NULL),
(94, 5, 11, NULL, NULL),
(100, 1, 1, NULL, NULL),
(101, 2, 1, NULL, NULL),
(102, 3, 1, NULL, NULL),
(103, 4, 1, NULL, NULL),
(104, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `download` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `magazine` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `download`, `product`, `magazine`, `created_at`, `updated_at`) VALUES
(1, 50, 50, 66, NULL, '2020-12-20 04:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponsor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firm_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `sponsor_name`, `email`, `city`, `firm_address`, `phone`, `about`, `facebook`, `instagram`, `youtube`, `image`, `image_id`, `video`, `CreatedBy`, `created_at`, `updated_at`) VALUES
(1, 'tets', 'admin@gmail.com', 'rajkot', 'rajkot', '9909378781', 'music artist', 'https://www.facebook.com/ykcreationfamilysalon/', 'https://www.instagram.com/ykcreationfamilysalon/', 'https://www.youtube.com/channel/UCe9TGif8bRwWPH1-YDvgbVg', 'sponsor/1603862192.jpg', NULL, 'sponsor-video/OFROKvu4xD9r3HeCkbtnUk5UXtovRroIP4lsjDwl.mp4', NULL, '2020-10-27 23:46:59', '2020-10-27 23:46:59'),
(2, 'tets', 'admin@gmail.com', 'rajkot', 'rajkot', '9909378781', 'product  sponsor', 'https://www.facebook.com/ykcreationfamilysalon/', 'https://www.instagram.com/ykcreationfamilysalon/', 'https://www.youtube.com/channel/UCe9TGif8bRwWPH1-YDvgbVg', 'sponsor/1604459429.jpg', NULL, 'sponsor-video/WAysYZgWdLlQ75Pgxa4sike495ql7nOUeyOXUOYt.mp4', NULL, '2020-11-03 21:40:59', '2020-11-03 21:40:59'),
(3, 'tets', 'ankit.ramani1999@gmail.com', 'rajkot', 'rajkot', '9909378781', 'music artist', 'https://www.facebook.com/ykcreationfamilysalon/', 'https://www.instagram.com/ykcreationfamilysalon/', 'https://www.youtube.com/channel/UCe9TGif8bRwWPH1-YDvgbVg', 'sponsor/1604459679.jpg', NULL, 'sponsor-video/4hiNFZdzOeFgm8zXDnxN1gcZUPw5mLfpRkbfQcQ0.mp4', NULL, '2020-11-03 21:44:54', '2020-11-03 21:44:54'),
(4, 'dmkj', 'kjdj@gmail.com', 'jsj', 'jhwdj', '8899788999', 'jdhj', 'https://www.facebook.com/ykcreationfamilysalon/', 'https://www.instagram.com/ykcreationfamilysalon/', 'https://www.youtube.com/channel/UCe9TGif8bRwWPH1-YDvgbVg', 'sponsor/1604843345.jpg', NULL, 'sponsor-video/BXauAcrAapSAUsvsRN4uPa50LpPzurckCoW3xGUO.mp4', NULL, '2020-11-08 08:21:42', '2020-11-08 08:21:42'),
(5, 'test', 'admin@gmail.com', 'rajkot', 'rajkot', '9909378781', 'tesing', 'https://www.facebook.com/ykcreationfamilysalon/', 'https://www.instagram.com/ykcreationfamilysalon/', 'https://www.youtube.com/channel/UCe9TGif8bRwWPH1-YDvgbVg', 'sponsor/1604916633.jpg', NULL, 'sponsor-video/5iu2i82KXB2yixRs9tPT7dUWpQO28SEM34keo94K.mp4', NULL, '2020-11-09 04:41:03', '2020-11-09 04:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_image`
--

CREATE TABLE `sponsor_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor_image`
--

INSERT INTO `sponsor_image` (`id`, `sponsor_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'sponsor_images/7EtZNVjcqEnCriBFgZus57XxfzFTSnqhDpdV1eL1.jpeg', '2020-10-27 23:46:59', NULL),
(2, 2, 'sponsor_images/spfqC70pQo4fG56uvhg4de8N4phBMHNVJ5e77bN4.jpeg', '2020-11-03 21:40:59', NULL),
(5, 3, 'sponsor_images/NT5ghnMPgrCBVpMbBWf19DRW4Zg1rnxCX1dF3cA2.jpeg', NULL, '2020-11-03 21:51:52'),
(6, 4, 'sponsor_images/gAAwjfkSA2jiY8pLaAf3r4NJesgqMBgZ8R0Y0cLj.jpeg', '2020-11-08 08:21:43', NULL),
(7, 5, 'sponsor_images/dQU7hp7x4gwGzI1yfCoGnLy03rFTczWSwclk3aFq.jpeg', '2020-11-09 04:41:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_role`
--

CREATE TABLE `sub_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_role`
--

INSERT INTO `sub_role` (`role_id`, `role`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'white', NULL, '2020-11-14 12:28:07', '2020-11-14 12:28:07'),
(4, 'krishna', NULL, '2020-11-14 12:28:27', '2020-11-14 12:28:27'),
(5, 'ramani', NULL, '2020-11-14 12:28:27', '2020-11-14 12:28:27'),
(6, 'hiii', NULL, '2020-11-14 12:33:17', '2020-11-14 12:33:17'),
(7, 'testing', NULL, '2020-11-21 04:30:30', '2020-11-21 04:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `sub_role_id` bigint(11) DEFAULT NULL,
  `referral_code` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot_password_stat` int(11) NOT NULL DEFAULT '0',
  `otp` int(125) DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `device_id` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `sub_role_id`, `referral_code`, `name`, `business_name`, `email`, `mobile`, `email_verified_at`, `password`, `forgot_password_stat`, `otp`, `city`, `address`, `image`, `device_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '123456', 'Admin', 'Admin_business', 'admin@gmail.com', '8888888888', '2020-10-25 04:13:59', '$2y$10$CWH4XTcP08GZA1B4wBtpNOuPk9v7mdhU2yuiVYqOYD9sJfmzQc5ve', 0, NULL, 'Rajkot', 'rajkot', 'user/m8KGNPgrVSYMAsZGbakUT8DiIrK8RdPi5KzPlk4h.jpeg', 'admin', NULL, NULL, '2021-01-21 01:38:55'),
(2, 1, 3, NULL, 'ankit', 'test', 'ankit@gmail.com', '8896978786', '2020-11-10 06:22:51', '$2y$10$V/GJ4Fow9WJy2qVLPXRTIONHxyiWDoM7AxIDtrRnb4wJqNeUvDfK6', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/TBVHHE8l73c7TWICFszTrPs2NGvfq4I99W6Z2LTJ.jpeg', 'admin', NULL, '2020-11-10 06:22:52', '2021-01-20 01:28:14'),
(3, 1, 7, NULL, 'kishu', 'test', 'kishu@gmail.com', '8896978788', '2020-11-24 02:58:43', '$2y$10$5pLrUmdBjGh672ffXqEECeZTN7uhifdpvpXAQA8CULQro6c1DY84C', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/aTlyInAXBfZJjZm1MC339dl7jzSjLlCI2fbaHzTo.jpeg', 'admin', NULL, '2020-11-24 02:58:44', '2021-01-20 01:28:14'),
(4, 1, 7, NULL, 'meera', 'test', 'meera@gmail.com', '8896978782', '2020-11-24 02:59:36', '$2y$10$ZfoL2bx2iKP38T8mcLDy3eB0nJxEu6u1pwHWwoa7N0co3nLxl4JFS', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/8u9VNNbUqWZHR6exXVr1NWjreN0UuFr7Rt1rpjlV.jpeg', 'admin', NULL, '2020-11-24 02:59:36', '2021-01-20 01:28:14'),
(5, 4, 3, '456123', 'kajal', 'test', 'kajal@gmail.com', '8896978763', '2020-11-24 02:59:50', '$2y$10$aUVproOwXA0/ZlSDOhUhDuucYiHUVno/elnlf8951sDziEuX4RSGG', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/vHJYTaCjoJsoWeXIfg66DmFrVn5gK2GhshsCIcvM.jpeg', 'admin', NULL, '2020-11-24 02:59:50', '2021-01-20 01:28:14'),
(6, 2, 3, NULL, 'raj', 'test', 'raj@gmail.com', '8896978723', '2020-11-24 03:00:04', '$2y$10$HGy/LDxvJz0W8MobgJt/QOjkFwrv7daOAejbl9Jf13hVHf3lpAG3u', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/9EDILMoZDWSsUBXrTiu8UauTLZ5xdHkI4keNvaW0.jpeg', 'admin', NULL, '2020-11-24 03:00:04', '2021-01-20 01:28:14'),
(7, 2, 7, NULL, 'angat', 'test', 'angat@gmail.com', '8896978778', '2020-11-24 03:00:25', '$2y$10$IyiLqy.8SOXhBY1nHH.LFOpXZlBFlAZs7N4yBop7X4QJeVsmPlQdK', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/MOl0mEvECohBwsjk5iMr03CfKqndubpBTnEQg5vy.jpeg', 'admin', NULL, '2020-11-24 03:00:25', '2021-01-20 01:28:14'),
(8, 4, 6, NULL, 'rajveer', 'test', 'rajveer@gmail.com', '8896978798', '2020-11-24 03:07:13', '$2y$10$OeVdugJKjgStAcXoG3sbiuMwJx6gcBu0EeqAXmxE32sbQwPQNV4QC', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/9IvXPEtqtG0a9o1wiK8SG6dulE6vxLLWR49bFAyi.jpeg', 'admin', NULL, '2020-11-24 03:07:14', '2021-01-20 01:28:14'),
(9, 2, NULL, 'u1m7j1', 'rk', 'test', 'missrk@gmail.com', '8896978796', '2020-12-16 04:35:55', '$2y$10$Sq3Jzd7teBFJmbZ1aV6aA.Q25/Xrad3N9HXoBpO4zP7S1bKmR53ZS', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/elFlqd8dmfi7RxJBSrQQnSt1jv7RSyX2G8ipyPon.jpeg', 'admin', NULL, '2020-12-16 04:35:55', '2021-01-20 01:28:14'),
(10, 1, 1, '32CD0u', 'umit', 'test', 'umit@gmail.com', '8896978792', '2020-12-16 04:37:22', '$2y$10$ux8slEi6CQGw.vxG/ZB0ZuNR1CHk3Cvbg6OVNAD54Ka6CI3nakNGa', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/y4EMATTqyr3zSKwsswAzdg7dMK0ired0ctwyYC8Y.jpeg', 'admin', NULL, '2020-12-16 04:37:22', '2021-01-20 05:04:55'),
(11, 2, NULL, '6g1UM3', 'vinod', 'test', 'vinod@gmail.com', '8896978732', '2020-12-16 04:39:17', '$2y$10$eFi0Eo3/fnwEFAknUSm2EeCQDgTWGOtzNaFozxsgr386EKvByoHKO', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/uzrF5ZAib7Qhen8U7fLIR71Zw1lAStnIQ7mQpOCH.jpeg', 'admin', NULL, '2020-12-16 04:39:17', '2021-01-21 01:41:57'),
(12, NULL, NULL, 'cjyFy2', 'man', 'test', 'man@gmail.com', '8896978755', '2021-01-23 10:26:22', '$2y$10$tKjOa.999Gegt4ke6BTy4exvTWMcGiVe3uV9/ToVgbAmpqpk8FtC6', 0, NULL, 'rajkot', 'ramesvwe 8,rajkot', 'user/ZdTzaW4RKAmSQySbQG7aVURQlehc6sgIpnjlznqo.jpeg', 'admin', NULL, '2021-01-23 10:26:22', '2021-01-23 10:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_package`
--

CREATE TABLE `user_package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `video_id` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_video_id` int(125) DEFAULT NULL,
  `video_count` int(225) DEFAULT NULL,
  `category_id` int(125) DEFAULT NULL,
  `stat` int(125) DEFAULT NULL,
  `transaction_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_package`
--

INSERT INTO `user_package` (`id`, `user_id`, `package_id`, `video_id`, `single_video_id`, `video_count`, `category_id`, `stat`, `transaction_id`, `payment`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, 1, '123456', 'true', '1970-01-01', '2020-11-02 01:20:02', '2020-11-02 01:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `artist_id` bigint(20) DEFAULT NULL,
  `video_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `day` int(11) DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `to_approve` int(11) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `cat_id`, `artist_id`, `video_name`, `video`, `day`, `url`, `detail`, `image`, `price`, `token`, `to_approve`, `CreatedBy`, `created_at`, `updated_at`) VALUES
(4, 2, 2, 'test', 'VjG2dlCyT4Ov7ki8GjFQISzuSDxMos61j8AQCrGv.mp4', NULL, NULL, 'testing api', 'thumbnail/0zIClrckshqRb6TZ3QPxd2ZocaeI1GQpSSv1c3Fa.png', '1000', '0', 1, 1, '2021-01-22 02:37:12', '2021-01-23 06:04:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `category_cat_name_unique` (`cat_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_history`
--
ALTER TABLE `referral_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor_image`
--
ALTER TABLE `sponsor_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_role`
--
ALTER TABLE `sub_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_package`
--
ALTER TABLE `user_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=810;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referral_history`
--
ALTER TABLE `referral_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsor_image`
--
ALTER TABLE `sponsor_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_role`
--
ALTER TABLE `sub_role`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_package`
--
ALTER TABLE `user_package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
