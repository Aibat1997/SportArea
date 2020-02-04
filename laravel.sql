-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 04 2020 г., 07:44
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_sort_num` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_sort_num`, `created_at`, `updated_at`) VALUES
(1, 'Алматы', 1, '2020-01-27 08:00:23', '2020-01-27 08:00:23'),
(2, 'Нур-Султан', 2, '2020-01-28 09:48:59', '2020-01-28 09:48:59'),
(3, 'Актау', 3, '2020-01-28 09:49:11', '2020-01-28 09:49:11');

-- --------------------------------------------------------

--
-- Структура таблицы `complex_discounts`
--

CREATE TABLE `complex_discounts` (
  `cd_id` bigint(20) UNSIGNED NOT NULL,
  `cd_type` int(10) UNSIGNED NOT NULL,
  `cd_complex_id` bigint(20) UNSIGNED NOT NULL,
  `cd_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cd_start_date` date DEFAULT NULL,
  `cd_finish_date` date DEFAULT NULL,
  `cd_start_time` time DEFAULT NULL,
  `cd_finish_time` time DEFAULT NULL,
  `cd_pay_type` tinyint(1) NOT NULL DEFAULT 1,
  `cd_price` int(10) UNSIGNED NOT NULL,
  `cd_week_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_hours` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `courts`
--

CREATE TABLE `courts` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `c_complex_id` bigint(20) UNSIGNED NOT NULL,
  `c_coverage_id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_open_field` tinyint(1) NOT NULL DEFAULT 0,
  `c_cost` int(10) UNSIGNED NOT NULL,
  `c_prepayment` int(10) UNSIGNED NOT NULL,
  `c_prepayment_type` tinyint(1) NOT NULL DEFAULT 1,
  `c_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_close_start_time` time DEFAULT NULL,
  `c_close_end_time` time DEFAULT NULL,
  `c_close_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `court_infrastructures`
--

CREATE TABLE `court_infrastructures` (
  `ci_court_id` bigint(20) UNSIGNED NOT NULL,
  `ci_infrasructure_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `day_costs`
--

CREATE TABLE `day_costs` (
  `dc_id` bigint(20) UNSIGNED NOT NULL,
  `dc_day_week_id` bigint(20) UNSIGNED NOT NULL,
  `dc_start_time` time NOT NULL,
  `dc_end_time` time NOT NULL,
  `dc_cost` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `day_weeks`
--

CREATE TABLE `day_weeks` (
  `dw_id` bigint(20) UNSIGNED NOT NULL,
  `dw_court_id` bigint(20) UNSIGNED NOT NULL,
  `dw_day_week` int(10) UNSIGNED NOT NULL,
  `dw_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `entrances_numbers`
--

CREATE TABLE `entrances_numbers` (
  `en_user_id` bigint(20) UNSIGNED NOT NULL,
  `en_number_entrances` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `favorite_fields`
--

CREATE TABLE `favorite_fields` (
  `ff_complex_id` bigint(20) UNSIGNED NOT NULL,
  `ff_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `infrastructures`
--

CREATE TABLE `infrastructures` (
  `inf_id` bigint(20) UNSIGNED NOT NULL,
  `inf_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inf_sort_num` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `infrastructures`
--

INSERT INTO `infrastructures` (`inf_id`, `inf_name`, `inf_sort_num`, `created_at`, `updated_at`) VALUES
(1, 'Тренер', 1, '2020-02-03 19:12:18', '2020-02-03 19:12:18'),
(2, 'Туалет', 2, '2020-02-03 19:12:28', '2020-02-03 19:12:28');

-- --------------------------------------------------------

--
-- Структура таблицы `inventories`
--

CREATE TABLE `inventories` (
  `inv_id` bigint(20) UNSIGNED NOT NULL,
  `inv_complex_id` bigint(20) UNSIGNED NOT NULL,
  `inv_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inv_cost` int(10) UNSIGNED NOT NULL,
  `inv_is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `inventories`
--

INSERT INTO `inventories` (`inv_id`, `inv_complex_id`, `inv_name`, `inv_cost`, `inv_is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 5000, 1, NULL, '2020-02-03 19:21:55'),
(2, 1, 'Тест', 2000, 0, '2020-02-03 16:49:52', '2020-02-03 17:16:40');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_09_06_000000_create_failed_jobs_table', 1),
(2, '2019_09_06_081910_create_roles_table', 1),
(3, '2019_09_06_100000_create_password_resets_table', 1),
(4, '2019_09_07_000000_create_users_table', 1),
(5, '2020_01_07_140454_create_news_table', 1),
(6, '2020_01_07_140734_create_cities_table', 1),
(7, '2020_01_07_140800_create_sport_types_table', 1),
(8, '2020_01_07_140853_create_sport_complexes_table', 1),
(9, '2020_01_07_140923_create_reviews_table', 1),
(10, '2020_01_07_140947_create_type_coverages_table', 1),
(11, '2020_01_07_140949_create_inventories_table', 1),
(12, '2020_01_07_141018_create_favorite_fields_table', 1),
(13, '2020_01_07_141047_create_courts_table', 1),
(14, '2020_01_07_141114_create_infrastructures_table', 1),
(15, '2020_01_07_141210_create_court_infrastructures_table', 1),
(16, '2020_01_07_141303_create_day_weeks_table', 1),
(17, '2020_01_07_141321_create_day_costs_table', 1),
(18, '2020_01_07_141355_create_complex_discounts_table', 1),
(19, '2020_01_07_141410_create_payment_statuses_table', 1),
(20, '2020_01_07_141418_create_payments_table', 1),
(21, '2020_01_07_141609_create_entrances_numbers_table', 1),
(22, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(23, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(24, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(25, '2016_06_01_000004_create_oauth_clients_table', 2),
(26, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `n_id` bigint(20) UNSIGNED NOT NULL,
  `n_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'odq3VwYfIl8VrhICn6T41NFF84sr3CpCKVBnU9nS', 'http://localhost', 1, 0, 0, '2020-01-28 11:15:55', '2020-01-28 11:15:55'),
(2, NULL, 'Laravel Password Grant Client', 'Llh1aG4btGnNBQardbeicX4KvFNTIwpgXsCfhhyz', 'http://localhost', 0, 1, 0, '2020-01-28 11:15:55', '2020-01-28 11:15:55');

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-28 11:15:55', '2020-01-28 11:15:55');

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `cp_court_id` bigint(20) UNSIGNED NOT NULL,
  `cp_user_id` bigint(20) UNSIGNED NOT NULL,
  `cp_payment_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `ps_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `r_complex_id` bigint(20) UNSIGNED NOT NULL,
  `r_user_id` bigint(20) UNSIGNED NOT NULL,
  `r_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_raiting` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Администратор', '2020-01-28 11:31:54', '2020-01-28 11:31:54'),
(2, 'Клиент', '2020-01-28 11:32:00', '2020-01-28 11:32:00');

-- --------------------------------------------------------

--
-- Структура таблицы `sport_complexes`
--

CREATE TABLE `sport_complexes` (
  `sc_id` bigint(20) UNSIGNED NOT NULL,
  `sc_city_id` bigint(20) UNSIGNED NOT NULL,
  `sc_sport_type_id` bigint(20) UNSIGNED NOT NULL,
  `sc_creater_id` int(10) UNSIGNED NOT NULL,
  `sc_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_addres` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_work_time_weekday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_work_time_weekend` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_show_phone` tinyint(1) NOT NULL,
  `sc_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_accept_applications` tinyint(1) NOT NULL,
  `sc_is_closed` tinyint(1) NOT NULL,
  `sc_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_raiting` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sport_complexes`
--

INSERT INTO `sport_complexes` (`sc_id`, `sc_city_id`, `sc_sport_type_id`, `sc_creater_id`, `sc_name`, `sc_addres`, `sc_map`, `sc_work_time_weekday`, `sc_work_time_weekend`, `sc_phone`, `sc_show_phone`, `sc_description`, `sc_accept_applications`, `sc_is_closed`, `sc_image`, `sc_raiting`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'sadfasdf asdfasdf', 'asdfasdf asdfasdf', NULL, '46:54 - 65:46', '54:65 - 46:54', '+7 (465) 465-46-54', 0, 'asdfasdf', 0, 0, '/media/2020/02/01/091002243000.jpg', 0, '2020-02-01 09:10:02', '2020-02-03 04:31:25');

-- --------------------------------------------------------

--
-- Структура таблицы `sport_types`
--

CREATE TABLE `sport_types` (
  `st_id` bigint(20) UNSIGNED NOT NULL,
  `st_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_sort_num` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sport_types`
--

INSERT INTO `sport_types` (`st_id`, `st_name`, `st_img`, `st_sort_num`, `created_at`, `updated_at`) VALUES
(1, 'Футбол', '/media/2020/01/27/Coast_Sunrises_and_sunsets_Waves_USA_Ocean_Kaneohe_521540_1280x775.jpg', 1, '2020-01-27 08:01:40', '2020-01-27 08:01:40');

-- --------------------------------------------------------

--
-- Структура таблицы `type_coverages`
--

CREATE TABLE `type_coverages` (
  `tc_id` bigint(20) UNSIGNED NOT NULL,
  `tc_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_sort_num` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_coverages`
--

INSERT INTO `type_coverages` (`tc_id`, `tc_name`, `tc_sort_num`, `created_at`, `updated_at`) VALUES
(1, 'газон', 1, '2020-02-03 18:34:16', '2020-02-03 18:34:16'),
(2, 'асфальт', 2, '2020-02-03 18:34:25', '2020-02-03 18:34:25');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/img/default-user.jpg',
  `user_role_id` bigint(20) UNSIGNED NOT NULL,
  `user_raiting` double NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `phone`, `avatar`, `user_role_id`, `user_raiting`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aibat', NULL, '8 (775) 256-55-81', '/img/default-user.jpg', 2, 0, NULL, '$2y$10$y/XYLqCzS5sq/VVOyz9qQ.uzl4ZI/QJWpTjh.9AbashGZD29hShP.', NULL, '2020-01-28 11:51:10', '2020-01-28 12:18:28'),
(2, 'Aibat', NULL, '8 (265) 486-46-46', '/img/default-user.jpg', 2, 0, NULL, '$2y$10$0C3KqQIt83xxeUB1KaDeIebbUmNFZsW3DvBLlXcuTR2sBHLg/J9PC', NULL, '2020-01-28 12:04:19', '2020-01-28 12:04:19'),
(3, 'Айдын', NULL, '8 (564) 684-76-4_', '/img/default-user.jpg', 2, 0, NULL, '$2y$10$t4Bd5/tj1Q.L952gxPYrxue7NDvpHlOfhUDW7tyTXbj0Jp5TRhJei', NULL, '2020-01-28 12:11:19', '2020-01-28 12:11:19'),
(4, 'Айдын', NULL, '8 (654) 646-46-54', '/img/default-user.jpg', 2, 0, NULL, '$2y$10$OA1pSF1ON5K28cNvVT66wOcy2wC8s8Hj1Ulk1moMxDAseq89Eekwe', NULL, '2020-01-28 12:21:11', '2020-01-28 12:21:11'),
(5, 'Айдын', NULL, '8 (687) 897-79-98', '/img/default-user.jpg', 2, 0, NULL, '$2y$10$wxiDrlaiHH8NZLno0cQ3eOjX5BgFV7c0Hk.5cqNRXAKcs2LIEPrTW', NULL, '2020-01-28 12:22:42', '2020-01-28 12:22:42'),
(6, 'Айдын', NULL, '8 (666) 666-66-66', '/img/default-user.jpg', 2, 0, NULL, '$2y$10$fAcPZWKPpTSnKDa3AwqVE.hqH52FU1i0b7HTBkyUgpqBtGrGfr.xG', NULL, '2020-01-28 12:34:38', '2020-01-28 12:34:38');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Индексы таблицы `complex_discounts`
--
ALTER TABLE `complex_discounts`
  ADD PRIMARY KEY (`cd_id`),
  ADD KEY `complex_discounts_cd_complex_id_foreign` (`cd_complex_id`),
  ADD KEY `complex_discounts_cd_user_id_foreign` (`cd_user_id`);

--
-- Индексы таблицы `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `courts_c_complex_id_foreign` (`c_complex_id`),
  ADD KEY `courts_c_coverage_id_foreign` (`c_coverage_id`);

--
-- Индексы таблицы `court_infrastructures`
--
ALTER TABLE `court_infrastructures`
  ADD KEY `court_infrastructures_ci_court_id_foreign` (`ci_court_id`),
  ADD KEY `court_infrastructures_ci_infrasructure_id_foreign` (`ci_infrasructure_id`);

--
-- Индексы таблицы `day_costs`
--
ALTER TABLE `day_costs`
  ADD PRIMARY KEY (`dc_id`),
  ADD KEY `day_costs_dc_day_week_id_foreign` (`dc_day_week_id`);

--
-- Индексы таблицы `day_weeks`
--
ALTER TABLE `day_weeks`
  ADD PRIMARY KEY (`dw_id`),
  ADD KEY `day_weeks_dw_court_id_foreign` (`dw_court_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favorite_fields`
--
ALTER TABLE `favorite_fields`
  ADD KEY `favorite_fields_ff_complex_id_foreign` (`ff_complex_id`),
  ADD KEY `favorite_fields_ff_user_id_foreign` (`ff_user_id`);

--
-- Индексы таблицы `infrastructures`
--
ALTER TABLE `infrastructures`
  ADD PRIMARY KEY (`inf_id`);

--
-- Индексы таблицы `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `inventories_inv_complex_id_foreign` (`inv_complex_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Индексы таблицы `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Индексы таблицы `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD KEY `payments_cp_court_id_foreign` (`cp_court_id`),
  ADD KEY `payments_cp_user_id_foreign` (`cp_user_id`),
  ADD KEY `payments_cp_payment_status_id_foreign` (`cp_payment_status_id`);

--
-- Индексы таблицы `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`ps_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `reviews_r_complex_id_foreign` (`r_complex_id`),
  ADD KEY `reviews_r_user_id_foreign` (`r_user_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `sport_complexes`
--
ALTER TABLE `sport_complexes`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `sport_complexes_sc_city_id_foreign` (`sc_city_id`),
  ADD KEY `sport_complexes_sc_sport_type_id_foreign` (`sc_sport_type_id`);

--
-- Индексы таблицы `sport_types`
--
ALTER TABLE `sport_types`
  ADD PRIMARY KEY (`st_id`);

--
-- Индексы таблицы `type_coverages`
--
ALTER TABLE `type_coverages`
  ADD PRIMARY KEY (`tc_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_user_role_id_foreign` (`user_role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `complex_discounts`
--
ALTER TABLE `complex_discounts`
  MODIFY `cd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `courts`
--
ALTER TABLE `courts`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `day_costs`
--
ALTER TABLE `day_costs`
  MODIFY `dc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `day_weeks`
--
ALTER TABLE `day_weeks`
  MODIFY `dw_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `infrastructures`
--
ALTER TABLE `infrastructures`
  MODIFY `inf_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inv_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `n_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `ps_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sport_complexes`
--
ALTER TABLE `sport_complexes`
  MODIFY `sc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `sport_types`
--
ALTER TABLE `sport_types`
  MODIFY `st_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `type_coverages`
--
ALTER TABLE `type_coverages`
  MODIFY `tc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `complex_discounts`
--
ALTER TABLE `complex_discounts`
  ADD CONSTRAINT `complex_discounts_cd_complex_id_foreign` FOREIGN KEY (`cd_complex_id`) REFERENCES `sport_complexes` (`sc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complex_discounts_cd_user_id_foreign` FOREIGN KEY (`cd_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `courts`
--
ALTER TABLE `courts`
  ADD CONSTRAINT `courts_c_complex_id_foreign` FOREIGN KEY (`c_complex_id`) REFERENCES `sport_complexes` (`sc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courts_c_coverage_id_foreign` FOREIGN KEY (`c_coverage_id`) REFERENCES `type_coverages` (`tc_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `court_infrastructures`
--
ALTER TABLE `court_infrastructures`
  ADD CONSTRAINT `court_infrastructures_ci_court_id_foreign` FOREIGN KEY (`ci_court_id`) REFERENCES `courts` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `court_infrastructures_ci_infrasructure_id_foreign` FOREIGN KEY (`ci_infrasructure_id`) REFERENCES `infrastructures` (`inf_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `day_costs`
--
ALTER TABLE `day_costs`
  ADD CONSTRAINT `day_costs_dc_day_week_id_foreign` FOREIGN KEY (`dc_day_week_id`) REFERENCES `day_weeks` (`dw_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `day_weeks`
--
ALTER TABLE `day_weeks`
  ADD CONSTRAINT `day_weeks_dw_court_id_foreign` FOREIGN KEY (`dw_court_id`) REFERENCES `courts` (`c_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favorite_fields`
--
ALTER TABLE `favorite_fields`
  ADD CONSTRAINT `favorite_fields_ff_complex_id_foreign` FOREIGN KEY (`ff_complex_id`) REFERENCES `sport_complexes` (`sc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_fields_ff_user_id_foreign` FOREIGN KEY (`ff_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_inv_complex_id_foreign` FOREIGN KEY (`inv_complex_id`) REFERENCES `sport_complexes` (`sc_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_cp_court_id_foreign` FOREIGN KEY (`cp_court_id`) REFERENCES `courts` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_cp_payment_status_id_foreign` FOREIGN KEY (`cp_payment_status_id`) REFERENCES `payment_statuses` (`ps_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_cp_user_id_foreign` FOREIGN KEY (`cp_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_r_complex_id_foreign` FOREIGN KEY (`r_complex_id`) REFERENCES `sport_complexes` (`sc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_r_user_id_foreign` FOREIGN KEY (`r_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sport_complexes`
--
ALTER TABLE `sport_complexes`
  ADD CONSTRAINT `sport_complexes_sc_city_id_foreign` FOREIGN KEY (`sc_city_id`) REFERENCES `cities` (`city_id`),
  ADD CONSTRAINT `sport_complexes_sc_sport_type_id_foreign` FOREIGN KEY (`sc_sport_type_id`) REFERENCES `sport_types` (`st_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
