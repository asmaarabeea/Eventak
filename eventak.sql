-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 03:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `originalpass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `gender`, `image`, `remember_token`, `created_at`, `updated_at`, `originalpass`) VALUES
(1, 'Eventak', 'eventak.iti@gmail.com', '$2y$10$PsMekgc1n/H3.09D1PjvquqatwaDDjUU.h4iE4WrV9oLFJMLbJgVa', 'female', 'images/lkk3U1U5CCC1hZTkJajzDtHHTmVugv4NPBb9Omfq.png', NULL, '2017-04-24 11:16:29', '2017-04-25 13:32:18', 'alexeventak@iti');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Competitions', 'images/zXIoGWnDIlsL37re1cPxGbkmBrH2JyAizkZfNTUq.jpeg', '2017-04-25 09:35:52', '2017-04-25 09:35:52'),
(4, 'Music', 'images/81giMyDFMJHMtMjT0lZkXopdUN6WyPmMF3M884Es.jpeg', '2017-04-25 09:36:39', '2017-04-25 09:36:39'),
(5, 'Arts', 'images/2rNiOWUNKiX8U3wYFlMzRu34s2mowuJfUMoX6YqV.jpeg', '2017-04-25 09:36:54', '2017-04-25 09:36:54'),
(6, 'Open Days', 'images/cDKSnBj9NuPvHTSJmqc23hDotOtW8vvRGqb8aCoy.jpeg', '2017-04-25 09:37:48', '2017-04-25 09:37:48'),
(7, 'Seminars & Conferences', 'images/19GrO0G84mJ4qPG1o5oXKjunO5tN95ndkm4BAEyE.jpeg', '2017-04-25 09:39:15', '2017-04-25 09:39:15'),
(8, 'Workshops', 'images/iwZbBSpDHhPeK68Q69oJRZ8lQVOulgEReBBwm65u.jpeg', '2017-04-25 09:40:47', '2017-04-25 09:40:47'),
(10, 'Technology', 'images/iEueUX5SiVCUO7ORnWrxl3ujK2KupTpMcpkF7a5p.jpeg', '2017-04-25 11:19:52', '2017-04-25 11:19:52'),
(11, 'Educational', 'images/PO4Jk6zESuCZtJv5HuwUyCli5UV2ZO72E7AR1Vxl.jpeg', '2017-04-25 11:23:57', '2017-04-25 11:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

CREATE TABLE `category_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `approve`, `created_at`, `updated_at`, `user_id`, `event_id`) VALUES
(7, 'Special Event', 1, '2017-04-25 11:59:35', '2017-04-25 11:59:35', 4, 11),
(8, 'Good Event', 1, '2017-04-25 14:04:12', '2017-04-26 07:40:13', 4, 10),
(9, 'I care about so much ......', 1, '2017-04-25 17:51:11', '2017-04-26 07:01:33', 4, 12),
(10, 'dddddd\r\nsxsxdw', 0, '2017-04-26 08:14:15', '2017-04-26 08:35:27', 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` enum('waiting','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `start_time`, `end_time`, `description`, `image`, `user_type`, `approved`, `created_at`, `updated_at`, `user_id`, `category_id`, `location_id`, `end_date`) VALUES
(9, 'Success and Failure', '2017-04-29', '17:30:00', '23:30:00', 'ALEF Bookstore entertains a growing community sharing world inspirations while offering the latest news on its unique products, offers and events', 'images/JgI8vvNkc0ejVNaSaOygfyHG1yjNSUbeWmLOxKY2.jpeg', 'user', 'accepted', '2017-04-25 11:27:57', '2017-04-25 18:57:52', 4, 11, 4, '2017-04-29'),
(10, 'Alex fashion', '2017-06-04', '11:00:00', '23:00:00', 'Spring Fashion Mirage\r\nA day for the whole family full of shopping for summer stuff\r\nWe will entertain you by adding joy & satisfaction due to spring vibes full of surprises', 'images/5M36KQWMIX3wbKa62V0ZAX0Z66uPWGI0j3hrGX3n.jpeg', 'user', 'accepted', '2017-04-25 11:34:51', '2017-04-25 13:42:22', 2, 6, 5, '2017-06-04'),
(11, 'Paper Club | Nano Chemistry Conference', '2017-04-29', '09:00:00', '17:00:00', 'The American Chemical Society, Alexandria University Student Chapter ACS-Alex-SC aims to spread knowledge about research skills among university and put them on the way to start their own research and teach them how to gain funds to support their researches', 'images/2vNT5jOn8LHa0MVF7Ev5jiG25K7ZIHbolvQPBGZY.jpeg', 'user', 'accepted', '2017-04-25 11:52:41', '2017-04-25 11:53:30', 6, 11, 23, '2017-04-29'),
(12, 'حفل طرباند في مكتبة الاسكندرية | Tarabband live in Alexandria', '2017-04-30', '20:00:00', '22:00:00', 'After being awarded the ”Best group of the year award at the Swedish World Music Awards 2017 and after their astounding success on their 2016 tour in Finland, Spain, France England Palestine Jordan Tunisia Morocco the U.S among others Tarabband are delighted to return to their audience in Alexandria once again', 'images/IUMEBguEb7cJ8NJNQKAf7TNFjwPdXt9f4dHUYXyg.jpeg', 'user', 'accepted', '2017-04-25 13:03:13', '2017-04-25 13:42:25', 6, 4, 24, '2017-04-30'),
(13, 'NASA Space Apps Challenge Alexandria 2017', '2017-04-29', '10:00:00', '23:00:00', 'أكتر من 15000 مشارك، من 160 مكان في العالم، يوم 29 و 30 أبريل، بيتشاركو ويتنافسو في نفس الوقت في حل مجموعة من المشاكل المهمة اللي وكالة الفضاء الأمريكية - NASA بتشاركها معانا وتتيح فرصة لمشاركة عقول من خلفيات وثقافات وتخصصات مختلفة في ابتكار حلول مبدعة لمشاكل بتواجه كوكب الأرض وبتواجهنا في رغبتنا المستمرة في الانتقال للفضاء.', 'images/Z1De3MahUxpWZC0C1qNfG4rxWoUAvZlnkjv4N9Qk.jpeg', 'user', 'accepted', '2017-04-25 13:41:52', '2017-04-25 18:57:49', 4, 11, 25, '2017-04-30'),
(14, 'event X', '2017-04-26', '01:00:00', '03:00:00', 'Amaaazing', 'images/DSBR8duT6Hv15CR0gCs9Y8Zg10aX73eykZfRsWit.png', 'user', 'waiting', '2017-04-25 18:40:11', '2017-04-25 18:40:11', 4, 4, 17, '2017-04-26'),
(15, 'bbbbbbb', '2017-04-30', '08:00:00', '23:00:00', 'gcgcg', 'images/XB2wpUSF33e8MC0YYYfDxBh7tLp6iE7SqSHk5Jep.png', 'user', 'accepted', '2017-04-26 08:16:59', '2017-04-26 08:18:31', 9, 11, 5, '2017-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `interested` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_user`
--

INSERT INTO `event_user` (`id`, `interested`, `created_at`, `updated_at`, `user_id`, `event_id`) VALUES
(7, 0, '2017-04-25 12:00:59', '2017-04-25 19:01:17', 4, 11),
(8, 0, '2017-04-25 14:03:49', '2017-04-26 07:40:45', 4, 10),
(9, 0, '2017-04-25 14:04:48', '2017-04-25 19:01:22', 4, 12),
(10, 1, '2017-04-25 14:14:10', '2017-04-25 14:14:10', 2, 11),
(11, 1, '2017-04-25 14:14:15', '2017-04-25 14:14:15', 2, 9),
(12, 1, '2017-04-25 14:14:20', '2017-04-25 14:14:20', 2, 13),
(13, 1, '2017-04-25 14:14:40', '2017-04-25 14:14:40', 2, 12),
(14, 1, '2017-04-25 14:14:50', '2017-04-25 14:14:50', 2, 10),
(15, 1, '2017-04-25 14:15:57', '2017-04-25 14:15:57', 6, 10),
(16, 1, '2017-04-25 14:16:23', '2017-04-25 14:16:23', 6, 9),
(17, 1, '2017-04-25 14:16:31', '2017-04-25 14:16:31', 6, 13),
(18, 1, '2017-04-25 14:16:36', '2017-04-25 14:16:36', 6, 11),
(19, 1, '2017-04-26 08:13:54', '2017-04-26 08:26:28', 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(4, 'Alef Bookstore - Kafr Abdo', '2017-04-25 09:03:55', '2017-04-25 09:03:55'),
(5, 'Hilton Alexandria Green Plaza', '2017-04-25 09:04:21', '2017-04-25 09:04:21'),
(8, 'Alexandria Opera House-مسرح سيد درويش', '2017-04-25 09:08:51', '2017-04-25 09:08:51'),
(10, 'Mahmoud Said Museum-متحف محمود سعيد', '2017-04-25 09:11:35', '2017-04-25 09:11:35'),
(11, 'Quta Exhibition-معرض كوته', '2017-04-25 09:13:03', '2017-04-25 09:13:03'),
(14, 'المركز الثقافي الفرنسي بالاسكندرية', '2017-04-25 09:24:00', '2017-04-25 09:24:00'),
(15, 'مركز الجيزويت الثقافى', '2017-04-25 09:24:22', '2017-04-25 09:24:22'),
(16, 'متحف الفنون الجميلة بالاسكندرية', '2017-04-25 09:24:56', '2017-04-25 09:24:56'),
(17, 'تياترو الأسكندريه', '2017-04-25 09:27:13', '2017-04-25 09:27:13'),
(19, 'قصر التذوق الفنى', '2017-04-25 09:29:54', '2017-04-25 09:29:54'),
(20, 'Russian Cultural Center', '2017-04-25 09:33:25', '2017-04-25 09:33:25'),
(21, 'Alexandria Center of Arts-مركز الحريه للإبداع', '2017-04-25 11:16:20', '2017-04-25 11:16:20'),
(23, 'Faculty Of Science (Alshatby)', '2017-04-25 11:50:23', '2017-04-25 11:50:23'),
(24, 'Bibliotheca Alexandrina-lمكتبة الأسكندريه', '2017-04-25 12:57:37', '2017-04-25 12:57:37'),
(25, 'Arab Academy for Science, Technology & Maritime Transport, Alexandria', '2017-04-25 13:38:56', '2017-04-25 13:38:56');

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
(3, '2017_04_09_080356_create_events_table', 1),
(4, '2017_04_09_080415_create_locations_table', 1),
(5, '2017_04_09_080430_create_feedbacks_table', 1),
(6, '2017_04_09_080455_create_categories_table', 1),
(7, '2017_04_09_080547_create_category_user_table', 1),
(8, '2017_04_09_080603_create_event_user_table', 1),
(9, '2017_04_09_080909_create_admins_table', 1),
(10, '2017_04_09_090205_create_notify_user_table', 1),
(11, '2017_04_15_182417_create_comments_table', 1),
(12, '2017_04_19_200121_create_notifications_table', 1),
(13, '2017_04_20_153305_add_column_originalpass_to_users_table', 1),
(14, '2017_04_22_145513_add_column_user_id_to_table_events', 1),
(15, '2017_04_22_145543_add_column_category_id_to_table_events', 1),
(16, '2017_04_22_145603_add_column_location_id_to_table_events', 1),
(17, '2017_04_22_150553_add_column_user_id_to_table_feedbacks', 1),
(18, '2017_04_22_150836_add_column_user_id_to_table_category_user', 1),
(19, '2017_04_22_150909_add_column_category_id_to_table_category_user', 1),
(20, '2017_04_22_151159_add_column_user_id_to_table_event_user', 1),
(21, '2017_04_22_151217_add_column_event_id_to_table_event_user', 1),
(22, '2017_04_22_151542_add_column_user_id_to_table_notify_user', 1),
(23, '2017_04_22_151558_add_column_event_id_to_table_notify_user', 1),
(24, '2017_04_22_151842_add_column_user_id_to_table_comments', 1),
(25, '2017_04_22_151900_add_column_event_id_to_table_comments', 1),
(26, '2017_04_22_152828_add_column_user_type_to_table_users', 1),
(27, '2017_04_23_125135_add_column_end_date_to_table_events', 1),
(28, '2017_04_23_154458_add_column_originalpass_to_table_admins', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('075d0d63-3ae6-4d53-aa41-267a780c3797', 'App\\Notifications\\AddEvent', 6, 'App\\User', '{\"id\":10,\"title\":\"Alex fashion\",\"description\":\"Spring Fashion Mirage\\r\\nA day for the whole family full of shopping for summer stuff\\r\\nWe will entertain you by adding joy & satisfaction due to spring vibes full of surprises\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 14:00:05', '2017-04-25 13:42:22', '2017-04-25 14:00:05'),
('1f0601eb-e72c-4d34-9b37-1d9a1c22c04c', 'App\\Notifications\\AddEvent', 4, 'App\\User', '{\"id\":10,\"title\":\"Alex fashion\",\"description\":\"Spring Fashion Mirage\\r\\nA day for the whole family full of shopping for summer stuff\\r\\nWe will entertain you by adding joy & satisfaction due to spring vibes full of surprises\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 13:42:47', '2017-04-25 13:42:22', '2017-04-25 13:42:47'),
('214c2d53-c425-4a0f-86e6-757c48ff019a', 'App\\Notifications\\AddEvent', 2, 'App\\User', '{\"id\":10,\"title\":\"Alex fashion\",\"description\":\"Spring Fashion Mirage\\r\\nA day for the whole family full of shopping for summer stuff\\r\\nWe will entertain you by adding joy & satisfaction due to spring vibes full of surprises\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 14:13:06', '2017-04-25 13:42:22', '2017-04-25 14:13:06'),
('2a101c7c-2afe-477e-8089-3621016f9981', 'App\\Notifications\\AddEvent', 9, 'App\\User', '{\"id\":15,\"title\":\"bbbbbbb\",\"description\":\"gcgcg\",\"date\":\"10\\/10\\/2010\"}', '2017-04-26 08:18:47', '2017-04-26 08:18:31', '2017-04-26 08:18:47'),
('31b9ba26-9bc4-472c-af01-9efb9cee95c3', 'App\\Notifications\\AddEvent', 2, 'App\\User', '{\"id\":12,\"title\":\"\\u062d\\u0641\\u0644 \\u0637\\u0631\\u0628\\u0627\\u0646\\u062f \\u0641\\u064a \\u0645\\u0643\\u062a\\u0628\\u0629 \\u0627\\u0644\\u0627\\u0633\\u0643\\u0646\\u062f\\u0631\\u064a\\u0629 | Tarabband live in Alexandria\",\"description\":\"After being awarded the \\u201dBest group of the year award at the Swedish World Music Awards 2017 and after their astounding success on their 2016 tour in Finland, Spain, France England Palestine Jordan Tunisia Morocco the U.S among others Tarabband are delighted to return to their audience in Alexandria once again\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 14:13:05', '2017-04-25 13:42:25', '2017-04-25 14:13:05'),
('33279d15-0add-4cff-8e7a-55752669f2f3', 'App\\Notifications\\AddEvent', 2, 'App\\User', '{\"id\":3,\"title\":\"eee\",\"description\":\"www\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 11:29:42', '2017-04-24 11:55:39', '2017-04-25 11:29:42'),
('5d723f65-9f34-4854-a4d6-97609a81c911', 'App\\Notifications\\AddEvent', 2, 'App\\User', '{\"id\":4,\"title\":\"nnnnnnnnnn\",\"description\":\"sdfg\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 11:29:42', '2017-04-24 12:16:02', '2017-04-25 11:29:42'),
('6ad61a0a-a1e9-4191-9d0a-5c00b2cb8822', 'App\\Notifications\\AddEvent', 8, 'App\\User', '{\"id\":15,\"title\":\"bbbbbbb\",\"description\":\"gcgcg\",\"date\":\"10\\/10\\/2010\"}', NULL, '2017-04-26 08:18:31', '2017-04-26 08:18:31'),
('768be3c3-5c71-43b7-8c91-c27ded359814', 'App\\Notifications\\AddEvent', 1, 'App\\User', '{\"id\":2,\"title\":\"Admin Event\",\"description\":\"sssssssssssssss\",\"date\":\"10\\/10\\/2010\"}', '2017-04-24 11:32:19', '2017-04-24 11:32:11', '2017-04-24 11:32:19'),
('873e22cf-2865-4555-a548-9845d2481435', 'App\\Notifications\\AddEvent', 6, 'App\\User', '{\"id\":12,\"title\":\"\\u062d\\u0641\\u0644 \\u0637\\u0631\\u0628\\u0627\\u0646\\u062f \\u0641\\u064a \\u0645\\u0643\\u062a\\u0628\\u0629 \\u0627\\u0644\\u0627\\u0633\\u0643\\u0646\\u062f\\u0631\\u064a\\u0629 | Tarabband live in Alexandria\",\"description\":\"After being awarded the \\u201dBest group of the year award at the Swedish World Music Awards 2017 and after their astounding success on their 2016 tour in Finland, Spain, France England Palestine Jordan Tunisia Morocco the U.S among others Tarabband are delighted to return to their audience in Alexandria once again\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 14:00:05', '2017-04-25 13:42:25', '2017-04-25 14:00:05'),
('92a9b6f4-c424-4906-beb4-3005e122a886', 'App\\Notifications\\AddEvent', 1, 'App\\User', '{\"id\":15,\"title\":\"bbbbbbb\",\"description\":\"gcgcg\",\"date\":\"10\\/10\\/2010\"}', NULL, '2017-04-26 08:18:31', '2017-04-26 08:18:31'),
('97131b3a-9143-41c9-9af8-deecbb3ee5e3', 'App\\Notifications\\AddEvent', 2, 'App\\User', '{\"id\":11,\"title\":\"Paper Club | Nano Chemistry Conference\",\"description\":\"The American Chemical Society, Alexandria University Student Chapter ACS-Alex-SC aims to spread knowledge about research skills among university and put them on the way to start their own research and teach them how to gain funds to support their researches\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 14:13:07', '2017-04-25 11:53:30', '2017-04-25 14:13:07'),
('9cd1c326-6ea8-438f-b669-731b8a6709df', 'App\\Notifications\\AddEvent', 1, 'App\\User', '{\"id\":3,\"title\":\"eee\",\"description\":\"www\",\"date\":\"10\\/10\\/2010\"}', '2017-04-24 11:56:45', '2017-04-24 11:55:39', '2017-04-24 11:56:45'),
('a89060e1-456b-4aa5-893c-aa33525d1b17', 'App\\Notifications\\AddEvent', 4, 'App\\User', '{\"id\":15,\"title\":\"bbbbbbb\",\"description\":\"gcgcg\",\"date\":\"10\\/10\\/2010\"}', NULL, '2017-04-26 08:18:31', '2017-04-26 08:18:31'),
('ad40e07c-c3c2-4aa5-93b7-0bc9fc5bdcb6', 'App\\Notifications\\AddEvent', 6, 'App\\User', '{\"id\":11,\"title\":\"Paper Club | Nano Chemistry Conference\",\"description\":\"The American Chemical Society, Alexandria University Student Chapter ACS-Alex-SC aims to spread knowledge about research skills among university and put them on the way to start their own research and teach them how to gain funds to support their researches\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 11:54:03', '2017-04-25 11:53:30', '2017-04-25 11:54:03'),
('ae3513bb-fce9-4ccb-a2e7-a67afccd967c', 'App\\Notifications\\AddEvent', 1, 'App\\User', '{\"id\":1,\"title\":\"Asmaa Event\",\"description\":\"aaaaaaaaaaaa\",\"date\":\"10\\/10\\/2010\"}', '2017-04-24 11:32:19', '2017-04-24 11:31:29', '2017-04-24 11:32:19'),
('ceac0c3e-942f-40d3-9ef1-2fe1702713fe', 'App\\Notifications\\AddEvent', 6, 'App\\User', '{\"id\":15,\"title\":\"bbbbbbb\",\"description\":\"gcgcg\",\"date\":\"10\\/10\\/2010\"}', NULL, '2017-04-26 08:18:31', '2017-04-26 08:18:31'),
('cfd63067-1fa4-4af8-8780-efef0c59f07c', 'App\\Notifications\\AddEvent', 4, 'App\\User', '{\"id\":11,\"title\":\"Paper Club | Nano Chemistry Conference\",\"description\":\"The American Chemical Society, Alexandria University Student Chapter ACS-Alex-SC aims to spread knowledge about research skills among university and put them on the way to start their own research and teach them how to gain funds to support their researches\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 11:55:07', '2017-04-25 11:53:30', '2017-04-25 11:55:07'),
('d62b5783-3f99-4044-b64e-1eb12bbffa4c', 'App\\Notifications\\AddEvent', 1, 'App\\User', '{\"id\":4,\"title\":\"nnnnnnnnnn\",\"description\":\"sdfg\",\"date\":\"10\\/10\\/2010\"}', '2017-04-24 12:16:06', '2017-04-24 12:16:02', '2017-04-24 12:16:06'),
('dbf86fc0-f3f9-480c-8130-916c360ca9cd', 'App\\Notifications\\AddEvent', 2, 'App\\User', '{\"id\":15,\"title\":\"bbbbbbb\",\"description\":\"gcgcg\",\"date\":\"10\\/10\\/2010\"}', NULL, '2017-04-26 08:18:31', '2017-04-26 08:18:31'),
('e6cf33e2-e1f7-42e3-b384-1fee3f78daf1', 'App\\Notifications\\AddEvent', 4, 'App\\User', '{\"id\":12,\"title\":\"\\u062d\\u0641\\u0644 \\u0637\\u0631\\u0628\\u0627\\u0646\\u062f \\u0641\\u064a \\u0645\\u0643\\u062a\\u0628\\u0629 \\u0627\\u0644\\u0627\\u0633\\u0643\\u0646\\u062f\\u0631\\u064a\\u0629 | Tarabband live in Alexandria\",\"description\":\"After being awarded the \\u201dBest group of the year award at the Swedish World Music Awards 2017 and after their astounding success on their 2016 tour in Finland, Spain, France England Palestine Jordan Tunisia Morocco the U.S among others Tarabband are delighted to return to their audience in Alexandria once again\",\"date\":\"10\\/10\\/2010\"}', '2017-04-25 13:42:47', '2017-04-25 13:42:25', '2017-04-25 13:42:47'),
('f27d401d-7156-4700-98ef-8da28086dea7', 'App\\Notifications\\AddEvent', 6, 'App\\User', '{\"id\":13,\"title\":\"NASA Space Apps Challenge Alexandria 2017\",\"description\":\"\\u0623\\u0643\\u062a\\u0631 \\u0645\\u0646 15000 \\u0645\\u0634\\u0627\\u0631\\u0643\\u060c \\u0645\\u0646 160 \\u0645\\u0643\\u0627\\u0646 \\u0641\\u064a \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u060c \\u064a\\u0648\\u0645 29 \\u0648 30 \\u0623\\u0628\\u0631\\u064a\\u0644\\u060c \\u0628\\u064a\\u062a\\u0634\\u0627\\u0631\\u0643\\u0648 \\u0648\\u064a\\u062a\\u0646\\u0627\\u0641\\u0633\\u0648 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0648\\u0642\\u062a \\u0641\\u064a \\u062d\\u0644 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0643\\u0644 \\u0627\\u0644\\u0645\\u0647\\u0645\\u0629 \\u0627\\u0644\\u0644\\u064a \\u0648\\u0643\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0641\\u0636\\u0627\\u0621 \\u0627\\u0644\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\\u0629 - NASA \\u0628\\u062a\\u0634\\u0627\\u0631\\u0643\\u0647\\u0627 \\u0645\\u0639\\u0627\\u0646\\u0627 \\u0648\\u062a\\u062a\\u064a\\u062d \\u0641\\u0631\\u0635\\u0629 \\u0644\\u0645\\u0634\\u0627\\u0631\\u0643\\u0629 \\u0639\\u0642\\u0648\\u0644 \\u0645\\u0646 \\u062e\\u0644\\u0641\\u064a\\u0627\\u062a \\u0648\\u062b\\u0642\\u0627\\u0641\\u0627\\u062a \\u0648\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a \\u0645\\u062e\\u062a\\u0644\\u0641\\u0629 \\u0641\\u064a \\u0627\\u0628\\u062a\\u0643\\u0627\\u0631 \\u062d\\u0644\\u0648\\u0644 \\u0645\\u0628\\u062f\\u0639\\u0629 \\u0644\\u0645\\u0634\\u0627\\u0643\\u0644 \\u0628\\u062a\\u0648\\u0627\\u062c\\u0647 \\u0643\\u0648\\u0643\\u0628 \\u0627\\u0644\\u0623\\u0631\\u0636 \\u0648\\u0628\\u062a\\u0648\\u0627\\u062c\\u0647\\u0646\\u0627 \\u0641\\u064a \\u0631\\u063a\\u0628\\u062a\\u0646\\u0627 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0645\\u0631\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0627\\u0646\\u062a\\u0642\\u0627\\u0644 \\u0644\\u0644\\u0641\\u0636\\u0627\\u0621.\",\"date\":\"10\\/10\\/2010\"}', NULL, '2017-04-25 18:57:50', '2017-04-25 18:57:50'),
('fa10fe88-c326-4424-a5e6-0440c902f62a', 'App\\Notifications\\AddEvent', 8, 'App\\User', '{\"id\":13,\"title\":\"NASA Space Apps Challenge Alexandria 2017\",\"description\":\"\\u0623\\u0643\\u062a\\u0631 \\u0645\\u0646 15000 \\u0645\\u0634\\u0627\\u0631\\u0643\\u060c \\u0645\\u0646 160 \\u0645\\u0643\\u0627\\u0646 \\u0641\\u064a \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u060c \\u064a\\u0648\\u0645 29 \\u0648 30 \\u0623\\u0628\\u0631\\u064a\\u0644\\u060c \\u0628\\u064a\\u062a\\u0634\\u0627\\u0631\\u0643\\u0648 \\u0648\\u064a\\u062a\\u0646\\u0627\\u0641\\u0633\\u0648 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0648\\u0642\\u062a \\u0641\\u064a \\u062d\\u0644 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0643\\u0644 \\u0627\\u0644\\u0645\\u0647\\u0645\\u0629 \\u0627\\u0644\\u0644\\u064a \\u0648\\u0643\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0641\\u0636\\u0627\\u0621 \\u0627\\u0644\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\\u0629 - NASA \\u0628\\u062a\\u0634\\u0627\\u0631\\u0643\\u0647\\u0627 \\u0645\\u0639\\u0627\\u0646\\u0627 \\u0648\\u062a\\u062a\\u064a\\u062d \\u0641\\u0631\\u0635\\u0629 \\u0644\\u0645\\u0634\\u0627\\u0631\\u0643\\u0629 \\u0639\\u0642\\u0648\\u0644 \\u0645\\u0646 \\u062e\\u0644\\u0641\\u064a\\u0627\\u062a \\u0648\\u062b\\u0642\\u0627\\u0641\\u0627\\u062a \\u0648\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a \\u0645\\u062e\\u062a\\u0644\\u0641\\u0629 \\u0641\\u064a \\u0627\\u0628\\u062a\\u0643\\u0627\\u0631 \\u062d\\u0644\\u0648\\u0644 \\u0645\\u0628\\u062f\\u0639\\u0629 \\u0644\\u0645\\u0634\\u0627\\u0643\\u0644 \\u0628\\u062a\\u0648\\u0627\\u062c\\u0647 \\u0643\\u0648\\u0643\\u0628 \\u0627\\u0644\\u0623\\u0631\\u0636 \\u0648\\u0628\\u062a\\u0648\\u0627\\u062c\\u0647\\u0646\\u0627 \\u0641\\u064a \\u0631\\u063a\\u0628\\u062a\\u0646\\u0627 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0645\\u0631\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0627\\u0646\\u062a\\u0642\\u0627\\u0644 \\u0644\\u0644\\u0641\\u0636\\u0627\\u0621.\",\"date\":\"10\\/10\\/2010\"}', NULL, '2017-04-25 18:57:50', '2017-04-25 18:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `notify_user`
--

CREATE TABLE `notify_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `originalpass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `image`, `remember_token`, `created_at`, `updated_at`, `originalpass`, `user_type`) VALUES
(1, 'Zaynab', 'zeinabm.elaidy@gmail.com', '$2y$10$HbAX/LJttqctyxoBOZyl9uo4Ipi.iQnp2FqIItTIk2.RJ89tTGSIS', 'female', 'images/llw1jpb0G5aV5oyaTuytrHSZCPxGnlVhrCenki1u.png', NULL, '2017-04-25 18:48:28', '2017-04-25 18:48:28', '123456', 'user'),
(2, 'Menna', 'menna_nasser15@yahoo.com', '$2y$10$W7/YPcDWYVooHAoClL9lqOyfusGJqx7re82Y7416a.8mQRJZOqs/e', 'female', 'images/71OGHnfB57PJhpQRkKNKdb95hfTBesjTVBKRrq55.jpeg', 'cPBy4pmK78xJ4aLciN9pAOWjsfc1nvyCNeEOHRnnOZn8Y9fvaWSowxXEFfSO', '2017-04-24 11:34:19', '2017-04-24 11:34:19', '123456', 'user'),
(4, 'Asmaa Rabeea', 'asmaa.rabeea7@gmail.com', '$2y$10$3bYREv.OLb1yvvEhZR1wd.tX.lUcwdyJYlCU.8mcDlt6pc3l6JyTW', 'female', 'images/EgiOcjX2GozU5OlvqQfcp23VhzOruNEV4PPDm5AO.jpeg', 'Wbx5sQEaHqZ5CD33UqsUM03jxyvkcks0RunHCewbPLlxDJh3AeZK6ymf4z2X', '2017-04-25 10:00:58', '2017-04-26 07:42:55', '123456', 'user'),
(6, 'Amany', 'amanyadel1592@gmail.com', '$2y$10$cIv7jXiHCo1.ja8MVk6QtuI.8wtpZY5keuCEj7iUYDaKRXpZlrMha', 'female', 'images/qZB7FN50yMxnB7nGRUANJd4DPakwDAAdKSDGAz4k.jpeg', 'y0oEFAMiezJiiE0Fv1GqvBJgQzujk2Vgnm75bmv20s6s1redgX4rXEhaoTsn', '2017-04-25 11:47:43', '2017-04-25 14:01:07', '123456789', 'user'),
(8, 'Nadin', 'nadin.ebrahim@gmail.com', '$2y$10$1A0M23w2z4wfIXlMQaD4UOaatSBFz0VFOAVgQsbXpuq.WbCrGhcz.', 'female', 'images/tYLLby92LQWngVetzerZNTqRSYaAryfetZOtW9Ok.jpeg', 'LTNM7cO7tF3QEwWrE8eRKTPdEMpAjoBjDwJ1lO3zEjSa0nLojJAZK4xNJ0aX', '2017-04-25 18:50:26', '2017-04-25 18:51:30', '123456', 'user'),
(9, 'Asmaa', 'asmaa.rabeea22@gmail.com', '$2y$10$J8GhN6UT7ut2Ej32tuJl5uKmbvipsM0ItlNqrBmQHJeU6FZUIfJjq', 'female', 'images/ugpjzInegOJ10EOJEJLfoDe0C5htfNub66UPWq7e.html', NULL, '2017-04-26 08:07:52', '2017-04-26 08:07:52', '12345678', 'user');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_user_user_id_foreign` (`user_id`),
  ADD KEY `category_user_category_id_foreign` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_event_id_foreign` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`),
  ADD KEY `events_category_id_foreign` (`category_id`),
  ADD KEY `events_location_id_foreign` (`location_id`);

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_user_user_id_foreign` (`user_id`),
  ADD KEY `event_user_event_id_foreign` (`event_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_user_id_foreign` (`user_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `notify_user`
--
ALTER TABLE `notify_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notify_user_user_id_foreign` (`user_id`),
  ADD KEY `notify_user_event_id_foreign` (`event_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category_user`
--
ALTER TABLE `category_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `event_user`
--
ALTER TABLE `event_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `notify_user`
--
ALTER TABLE `notify_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_user`
--
ALTER TABLE `category_user`
  ADD CONSTRAINT `category_user_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `event_user_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notify_user`
--
ALTER TABLE `notify_user`
  ADD CONSTRAINT `notify_user_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notify_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
