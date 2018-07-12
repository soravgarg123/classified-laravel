-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2016 at 11:12 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mela`
--

-- --------------------------------------------------------

--
-- Table structure for table `ds_cart`
--

CREATE TABLE IF NOT EXISTS `ds_cart` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `company_id` int(10) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `book_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '0 - pending, 1- complete, 2 -cancelled, 3 - Book',
  `price` int(10) DEFAULT NULL,
  `txn_id` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_id` int(10) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `options` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_cart`
--

INSERT INTO `ds_cart` (`id`, `user_id`, `company_id`, `store_id`, `book_date`, `duration`, `status`, `price`, `txn_id`, `user_address`, `office_id`, `message`, `options`, `created_at`, `updated_at`) VALUES
(74, 11, 20, 70, '', NULL, 0, NULL, NULL, NULL, NULL, 'It`s a free service', 'a:3:{s:17:"service_available";N;s:13:"delivery_days";s:2:"10";s:14:"delivery_place";s:6:"online";}', '2016-02-23 01:42:12', '2016-02-23 01:42:12'),
(75, 11, 20, 68, '2016/03/23 15:00', '50', 2, 1000, NULL, '', 46, 'It`s a paid service', 'a:1:{s:17:"service_available";s:1:"1";}', '2016-02-23 01:42:26', '2016-02-26 07:34:11'),
(76, 11, 20, 70, '', NULL, 0, NULL, NULL, NULL, NULL, '', 'a:3:{s:17:"service_available";N;s:13:"delivery_days";s:2:"10";s:14:"delivery_place";s:6:"online";}', '2016-02-23 01:50:05', '2016-02-26 07:39:02'),
(78, 11, 20, 68, '2016/02/26 13:30', '50', 0, 1000, NULL, '', 46, '', 'a:1:{s:17:"service_available";s:1:"1";}', '2016-02-26 08:08:16', '2016-02-26 08:08:16'),
(79, 11, 20, 68, '2016/02/26 17:00', '50', 0, 1000, NULL, '', 46, '', 'a:1:{s:17:"service_available";s:1:"1";}', '2016-02-26 08:08:21', '2016-02-26 08:08:21'),
(80, 11, 20, 68, '2016/02/26 18:00', '50', 0, 1000, NULL, '', 46, '', 'a:1:{s:17:"service_available";s:1:"1";}', '2016-02-26 08:08:25', '2016-02-26 08:08:25'),
(82, 11, 20, 68, '2016/03/16 16:30', '50', 0, 1000, NULL, '', 46, '', 'a:1:{s:17:"service_available";s:1:"1";}', '2016-02-26 08:08:46', '2016-02-26 08:08:46'),
(85, 11, 20, 70, '', NULL, 0, NULL, NULL, NULL, NULL, '', 'a:3:{s:17:"service_available";N;s:13:"delivery_days";s:2:"10";s:14:"delivery_place";s:6:"online";}', '2016-02-26 08:09:15', '2016-02-26 08:09:15'),
(86, 11, 20, 68, '2016/04/14 16:30', '50', 2, 1000, NULL, '', 46, '', 'a:1:{s:17:"service_available";s:1:"1";}', '2016-02-26 08:09:46', '2016-02-26 08:09:46'),
(87, 11, 20, 68, '2016/04/14 16:00', '50', 3, 1000, NULL, '', 46, '', 'a:1:{s:17:"service_available";s:1:"1";}', '2016-02-26 08:09:55', '2016-03-03 06:43:33'),
(88, 11, 20, 70, '', NULL, 0, NULL, NULL, NULL, NULL, 'ffdsfdffdfddfdf', 'a:3:{s:17:"service_available";N;s:13:"delivery_days";s:2:"10";s:14:"delivery_place";s:6:"online";}', '2016-03-19 04:39:55', '2016-03-19 04:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `ds_category`
--

CREATE TABLE IF NOT EXISTS `ds_category` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptiones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_other` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_category`
--

INSERT INTO `ds_category` (`id`, `name`, `icon`, `description`, `slug`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`, `is_other`) VALUES
(1, 'Appraisals & Consulting', 'fa fa-cubes', 'Appraisals & Consulting', 'beauty-hair', '2015-03-13 04:55:49', '2015-11-15 00:45:33', 'Perizie & Consulenze', 'Consultoría & Tasaciones', 'Appraisals & Consulting', 'Appraisals & Consulting', 0),
(2, 'Beauty & Relax', 'fa fa-users', 'Beauty & Relax', 'restaurant', '2015-03-13 04:57:36', '2015-11-15 00:47:18', 'Bellezza & Relax', 'Belleza & Relajación', 'Beauty & Relax', 'Beauty & Relax', 0),
(3, 'Cinema & Entertainment', 'fa fa-video-camera', 'Cinema & Entertainment', 'car', '2015-03-13 04:58:11', '2015-09-15 04:13:44', 'Cinema & Entertainment', 'Cinema & Entertainment', 'Cinema & Entertainment', 'Cinema & Entertainment', 0),
(4, 'Courses & Training', 'fa fa-bar-chart-o', 'Courses & Training', 'wellness', '2015-03-13 04:59:25', '2015-11-15 00:51:45', 'Corsi & Formazione', 'Cursos & Formación', 'Courses & Training', 'Courses & Training', 0),
(5, 'Engineering', 'fa fa-gears', 'Engineering', 'activities', '2015-03-13 05:00:34', '2015-11-15 00:53:05', 'Ingegneria', 'Ingeniería', 'Engineering', 'Engineering', 0),
(6, 'Graphics & Photography', 'fa fa-camera', 'Graphics & Photography', 'home', '2015-03-13 05:03:36', '2015-11-15 00:53:42', 'Grafica & Fotografia', 'Gráficos & Fotografía', 'Graphics & Photography', 'Graphics & Photography', 0),
(7, 'Business & Finance', 'fa fa-money', 'Business & Finance', 'business-finance', '2015-09-15 03:56:38', '2015-11-15 00:48:24', 'Affari & Finanza', 'Economía & Negocios', 'Business & Finance', 'Business & Finance', 0),
(8, 'Architecture & Archeology', 'fa fa-institution', 'Architecture & Archeology', 'architecture-archeology', '2015-09-15 04:05:04', '2015-11-15 00:54:15', 'Architettura & Archeologia', 'Arquitectura & Arqueología', 'Architecture & Archeology', 'Architecture & Archeology', 0),
(9, 'Healthcare & Wellness', 'fa fa-smile-o', 'Healthcare & Wellness', 'healthcare-wellness', '2015-09-15 04:17:34', '2015-11-15 00:54:46', 'Salute & Benessere', 'Salud & Bienestar', 'Healthcare & Wellness', 'Healthcare & Wellness', 0),
(10, 'Laws & Rights', 'fa fa-legal', 'Laws & Rights', 'laws-rights', '2015-09-15 04:19:27', '2015-11-15 00:55:18', 'Diritti & Giustizia', 'Ley & Justicia', 'Laws & Rights', 'Laws & Rights', 0),
(11, 'Lifestyle & Taste ', 'fa fa-glass', 'Lifestyle & Taste ', 'lifestyle-taste', '2015-09-15 04:19:55', '2015-11-15 00:55:51', 'Stile di vita & Gusto', 'Estilo de vida & Sabor', 'Lifestyle & Taste ', 'Lifestyle & Taste ', 0),
(12, 'Management', 'fa fa-paper-plane-o', 'Management', 'management', '2015-09-15 04:20:18', '2015-09-15 04:20:18', 'Management', 'Management', 'Management', 'Management', 0),
(13, 'Marketing & Advertising', 'fa fa-tasks', 'Marketing & Advertising', 'marketing-advertising', '2015-09-15 04:20:53', '2015-11-15 00:56:37', 'Marketing & Pubblicità', 'Marketing & Publicidad', 'Marketing & Advertising', 'Marketing & Advertising', 0),
(14, 'Mechanics & Repairs', 'fa fa-wrench', 'Mechanics & Repairs', 'mechanics-repairs', '2015-09-15 04:21:26', '2015-11-15 00:58:07', 'Meccanica & Riparazioni', 'Mecánica & Reparaciones', 'Mechanics & Repairs', 'Mechanics & Repairs', 0),
(15, 'Mediation & Arbitration', 'fa fa-recycle', 'Mediation & Arbitration', 'mediation-arbitration', '2015-09-15 04:22:12', '2015-11-15 00:57:18', 'Mediazione & Arbitrato', 'Mediación & Arbitraje', 'Mediation & Arbitration', 'Mediation & Arbitration', 0),
(16, 'Programming & Technology', 'fa fa-keyboard-o', 'Programming & Technology', 'programming-technology', '2015-09-15 04:22:53', '2015-11-15 00:58:46', 'Tecnologia & Programmazione', 'Tecnología & Programación ', 'Programming & Technology', 'Programming & Technology', 0),
(17, 'Specialized Medicine', 'fa fa-graduation-cap', 'Specialized Medicine', 'specialized-medicine', '2015-09-15 04:23:41', '2015-11-15 00:59:34', 'Medicina Specializzata', 'Medicina Especializada', 'Specialized Medicine', 'Specialized Medicine', 0),
(18, 'Writing & Translation', 'fa fa-language', 'Writing & Translation ', 'writing-translation', '2015-09-15 04:24:11', '2015-11-15 01:00:08', 'Scrittura & Traduzione', 'Redacción & Traducción', 'Writing & Translation ', 'Writing & Translation ', 0),
(19, 'Video & Music', 'fa fa-music', 'Video & Music', 'video-music', '2015-09-15 04:28:03', '2015-11-15 01:00:44', 'Video & Musica', 'Vídeo & Música', 'Video & Music', 'Video & Music', 0),
(20, 'Other', 'fa fa-star', 'Other, this should be at the end.', 'other', '2015-09-15 04:28:37', '2015-11-15 01:02:00', 'Altro', 'Otros', 'Other, this should be at the end.', 'Other, this should be at the end.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ds_chat`
--

CREATE TABLE IF NOT EXISTS `ds_chat` (
  `id` int(20) NOT NULL,
  `from` varchar(10) NOT NULL,
  `to` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_chat`
--

INSERT INTO `ds_chat` (`id`, `from`, `to`, `message`, `sent`, `created_at`, `updated_at`) VALUES
(1, 'u11', 'p20', '3333', '2016-02-08 13:03:18', '2016-02-08 07:33:18', '2016-02-08 07:33:18'),
(2, 'p20', 'u11', 'vvv', '2016-02-08 13:03:28', '2016-02-08 07:33:28', '2016-02-08 07:33:28'),
(3, 'u11', 'p20', 'hello', '2016-02-08 13:09:21', '2016-02-08 07:39:21', '2016-02-08 07:39:21'),
(4, 'u11', 'p20', 'ddddf', '2016-02-08 13:09:31', '2016-02-08 07:39:31', '2016-02-08 07:39:31'),
(6, 'p20', 'u11', 'yiusuf', '2016-02-08 13:10:03', '2016-02-08 07:40:03', '2016-02-08 07:40:03'),
(7, 'u11', 'p20', 'sorav', '2016-02-08 13:10:10', '2016-02-08 07:40:10', '2016-02-08 07:40:10'),
(8, 'p20', 'u11', 'ddddd', '2016-02-08 13:22:15', '2016-02-08 07:52:15', '2016-02-08 07:52:15'),
(9, 'u11', 'p20', '1111111', '2016-02-08 13:22:20', '2016-02-08 07:52:20', '2016-02-08 07:52:20'),
(10, 'p20', 'u11', '33333', '2016-02-08 13:22:24', '2016-02-08 07:52:24', '2016-02-08 07:52:24'),
(11, 'p20', 'u11', 'Hello', '2016-02-08 13:27:24', '2016-02-08 07:57:24', '2016-02-08 07:57:24'),
(12, 'u11', 'p20', 'Hello', '2016-02-08 13:28:24', '2016-02-08 07:58:24', '2016-02-08 07:58:24'),
(13, 'u11', 'p20', 'ddd', '2016-02-08 13:28:38', '2016-02-08 07:58:38', '2016-02-08 07:58:38'),
(14, 'p20', 'u11', 'sssss', '2016-02-08 13:28:41', '2016-02-08 07:58:41', '2016-02-08 07:58:41'),
(15, 'u11', 'p20', 'Hello', '2016-02-08 13:29:18', '2016-02-08 07:59:18', '2016-02-08 07:59:18'),
(16, 'p20', 'u11', 'Hey sorav', '2016-02-08 13:29:30', '2016-02-08 07:59:30', '2016-02-08 07:59:30'),
(17, 'p20', 'u11', 'How are you ?', '2016-02-08 13:29:42', '2016-02-08 07:59:42', '2016-02-08 07:59:42'),
(18, 'u11', 'p20', 'i am good, thank you', '2016-02-08 13:29:55', '2016-02-08 07:59:55', '2016-02-08 07:59:55'),
(19, 'u11', 'p20', 'what about you?', '2016-02-08 13:30:05', '2016-02-08 08:00:05', '2016-02-08 08:00:05'),
(20, 'p20', 'u11', 'I`m fine', '2016-02-08 13:30:17', '2016-02-08 08:00:17', '2016-02-08 08:00:17'),
(21, 'p20', 'u11', ':)', '2016-02-08 13:30:19', '2016-02-08 08:00:19', '2016-02-08 08:00:19'),
(22, 'p20', 'u11', 'a', '2016-02-08 13:31:16', '2016-02-08 08:01:16', '2016-02-08 08:01:16'),
(23, 'u11', 'p20', 'b', '2016-02-08 13:31:23', '2016-02-08 08:01:23', '2016-02-08 08:01:23'),
(24, 'p20', 'u11', 'c', '2016-02-08 13:31:27', '2016-02-08 08:01:27', '2016-02-08 08:01:27'),
(25, 'p20', 'u11', 'ffffffffff', '2016-02-08 13:33:49', '2016-02-08 08:03:49', '2016-02-08 08:03:49'),
(26, 'u11', 'p20', 'aaaaaaa', '2016-02-08 13:34:10', '2016-02-08 08:04:10', '2016-02-08 08:04:10'),
(27, 'p20', 'u11', '121212', '2016-02-08 13:34:16', '2016-02-08 08:04:16', '2016-02-08 08:04:16'),
(28, 'u11', 'p20', 'f', '2016-02-08 13:36:01', '2016-02-08 08:06:01', '2016-02-08 08:06:01'),
(29, 'u11', 'p20', 'ghgh', '2016-02-08 13:44:39', '2016-02-08 08:14:39', '2016-02-08 08:14:39'),
(30, 'u11', 'p20', 'ssss', '2016-02-08 13:45:16', '2016-02-08 08:15:16', '2016-02-08 08:15:16'),
(31, 'p20', 'u11', 'aaa', '2016-02-08 13:45:20', '2016-02-08 08:15:20', '2016-02-08 08:15:20'),
(32, 'u11', 'p20', '111', '2016-02-08 13:46:07', '2016-02-08 08:16:07', '2016-02-08 08:16:07'),
(33, 'p20', 'u11', '22222', '2016-02-08 13:46:13', '2016-02-08 08:16:13', '2016-02-08 08:16:13'),
(34, 'u11', 'p20', 'dsdsdsds', '2016-02-08 13:46:47', '2016-02-08 08:16:47', '2016-02-08 08:16:47'),
(35, 'p20', 'u11', 'ssss', '2016-02-08 13:46:50', '2016-02-08 08:16:50', '2016-02-08 08:16:50'),
(36, 'u11', 'p20', 'hello goge', '2016-02-08 13:50:22', '2016-02-08 08:20:22', '2016-02-08 08:20:22'),
(37, 'u11', 'p20', 'dddd', '2016-02-08 14:53:21', '2016-02-08 09:23:21', '2016-02-08 09:23:21'),
(39, 'u11', 'p20', 'ssss', '2016-02-08 14:55:41', '2016-02-08 09:25:41', '2016-02-08 09:25:41'),
(40, 'u11', 'p20', 'dfdfd344434', '2016-02-08 14:56:04', '2016-02-08 09:26:04', '2016-02-08 09:26:04'),
(41, 'u11', 'p20', 'dssds', '2016-02-08 14:57:03', '2016-02-08 09:27:03', '2016-02-08 09:27:03'),
(42, 'u11', 'p20', 'Hello', '2016-02-08 15:05:39', '2016-02-08 09:35:39', '2016-02-08 09:35:39'),
(43, 'p20', 'u11', 'Hello', '2016-02-08 15:05:51', '2016-02-08 09:35:51', '2016-02-08 09:35:51'),
(44, 'p20', 'u11', 'How are you ?', '2016-02-08 15:05:55', '2016-02-08 09:35:55', '2016-02-08 09:35:55'),
(45, 'u11', 'p20', 'i am good', '2016-02-08 15:06:05', '2016-02-08 09:36:05', '2016-02-08 09:36:05'),
(46, 'p20', 'u11', 'Cool', '2016-02-08 15:06:13', '2016-02-08 09:36:13', '2016-02-08 09:36:13'),
(47, 'u11', 'p20', 'dddd', '2016-02-08 15:06:31', '2016-02-08 09:36:31', '2016-02-08 09:36:31'),
(48, 'p20', 'u11', 'aaaaaaa', '2016-02-08 15:06:35', '2016-02-08 09:36:35', '2016-02-08 09:36:35'),
(49, 'u11', 'p20', '142545', '2016-02-08 15:08:21', '2016-02-08 09:38:21', '2016-02-08 09:38:21'),
(50, 'u11', 'p20', 'Hello', '2016-02-09 06:14:50', '2016-02-09 00:44:50', '2016-02-09 00:44:50'),
(51, 'p20', 'u11', 'yes', '2016-02-09 06:14:58', '2016-02-09 00:44:58', '2016-02-09 00:44:58'),
(52, 'u11', 'p20', 'no', '2016-02-09 06:15:08', '2016-02-09 00:45:08', '2016-02-09 00:45:08'),
(53, 'p20', 'u11', 'ok', '2016-02-09 06:15:13', '2016-02-09 00:45:13', '2016-02-09 00:45:13'),
(54, 'u11', 'p20', 'sss', '2016-02-09 06:15:22', '2016-02-09 00:45:22', '2016-02-09 00:45:22'),
(55, 'u11', 'p20', 'wwww', '2016-02-09 06:15:28', '2016-02-09 00:45:28', '2016-02-09 00:45:28'),
(56, 'p20', 'u11', 'sss', '2016-02-09 06:15:45', '2016-02-09 00:45:45', '2016-02-09 00:45:45'),
(57, 'p20', 'u11', 'sss123', '2016-02-09 06:15:54', '2016-02-09 00:45:54', '2016-02-09 00:45:54'),
(58, 'p20', 'u11', '1', '2016-02-09 06:16:21', '2016-02-09 00:46:21', '2016-02-09 00:46:21'),
(59, 'u11', 'p20', 'd', '2016-02-09 06:16:52', '2016-02-09 00:46:52', '2016-02-09 00:46:52'),
(60, 'u11', 'p20', 's', '2016-02-09 06:16:58', '2016-02-09 00:46:58', '2016-02-09 00:46:58'),
(61, 'u11', 'p20', 's', '2016-02-09 06:17:03', '2016-02-09 00:47:03', '2016-02-09 00:47:03'),
(62, 'p19', 'p20', 'hello', '2016-02-09 06:21:02', '2016-02-09 00:51:02', '2016-02-09 00:51:02'),
(63, 'p20', 'p19', 'teee', '2016-02-09 06:21:07', '2016-02-09 00:51:07', '2016-02-09 00:51:07'),
(64, 'p19', 'p20', 'good', '2016-02-09 06:21:39', '2016-02-09 00:51:40', '2016-02-09 00:51:40'),
(65, 'u11', 'p20', 'dddddddd', '2016-02-09 11:29:49', '2016-02-09 05:59:49', '2016-02-09 05:59:49'),
(66, 'p20', 'u11', 'ssss', '2016-02-09 11:29:54', '2016-02-09 05:59:54', '2016-02-09 05:59:54'),
(67, 'u11', 'p20', 'a', '2016-02-09 14:05:42', '2016-02-09 08:35:42', '2016-02-09 08:35:42'),
(68, 'p20', 'u11', 'ss', '2016-02-09 14:05:47', '2016-02-09 08:35:47', '2016-02-09 08:35:47'),
(69, 'u11', 'p20', 'xx', '2016-02-09 14:05:53', '2016-02-09 08:35:53', '2016-02-09 08:35:53'),
(70, 'p20', 'u11', 'gh', '2016-02-09 14:05:58', '2016-02-09 08:35:58', '2016-02-09 08:35:58'),
(71, 'p20', 'u11', 'xcxc', '2016-02-09 14:06:07', '2016-02-09 08:36:07', '2016-02-09 08:36:07'),
(72, 'u11', 'p20', 'xczx', '2016-02-09 14:06:12', '2016-02-09 08:36:12', '2016-02-09 08:36:12'),
(73, 'u11', 'p20', 'a', '2016-02-09 14:09:45', '2016-02-09 08:39:45', '2016-02-09 08:39:45'),
(74, 'u11', 'p20', 'ss', '2016-02-09 14:10:50', '2016-02-09 08:40:50', '2016-02-09 08:40:50'),
(75, 'u11', 'p20', 'jj', '2016-02-09 14:18:04', '2016-02-09 08:48:04', '2016-02-09 08:48:04'),
(76, 'u11', 'p20', 'k', '2016-02-09 14:18:40', '2016-02-09 08:48:40', '2016-02-09 08:48:40'),
(77, 'u11', 'p20', 'll', '2016-02-09 14:19:01', '2016-02-09 08:49:01', '2016-02-09 08:49:01'),
(78, 'p20', 'u11', '4545', '2016-02-09 14:19:22', '2016-02-09 08:49:22', '2016-02-09 08:49:22'),
(79, 'p20', 'u11', '666', '2016-02-09 14:24:29', '2016-02-09 08:54:29', '2016-02-09 08:54:29'),
(80, 'u11', 'p20', 'aaa', '2016-02-09 14:26:53', '2016-02-09 08:56:53', '2016-02-09 08:56:53'),
(81, 'p20', 'u11', 'ffff', '2016-02-09 14:27:07', '2016-02-09 08:57:07', '2016-02-09 08:57:07'),
(82, 'u11', 'p20', '11', '2016-02-09 14:33:03', '2016-02-09 09:03:03', '2016-02-09 09:03:03'),
(83, 'u11', 'p20', '112', '2016-02-09 14:33:23', '2016-02-09 09:03:23', '2016-02-09 09:03:23'),
(84, 'p20', 'u11', '666', '2016-02-09 14:33:42', '2016-02-09 09:03:42', '2016-02-09 09:03:42'),
(85, 'u11', 'p20', 'www', '2016-02-09 14:36:19', '2016-02-09 09:06:19', '2016-02-09 09:06:19'),
(86, 'p20', 'u11', 'eeee', '2016-02-09 14:36:39', '2016-02-09 09:06:39', '2016-02-09 09:06:39'),
(87, 'u11', 'p20', 'gdf', '2016-02-09 14:41:07', '2016-02-09 09:11:07', '2016-02-09 09:11:07'),
(88, 'p20', 'u11', 'fgdfgf', '2016-02-09 14:41:19', '2016-02-09 09:11:19', '2016-02-09 09:11:19'),
(89, 'u11', 'p20', 'hello', '2016-02-10 13:46:38', '2016-02-10 08:16:38', '2016-02-10 08:16:38'),
(90, 'u11', 'p20', 'Hello', '2016-02-10 13:47:25', '2016-02-10 08:17:25', '2016-02-10 08:17:25'),
(91, 'p20', 'u11', 'Hello', '2016-02-10 13:48:09', '2016-02-10 08:18:09', '2016-02-10 08:18:09'),
(92, 'u11', 'p20', 'yes', '2016-02-10 13:48:16', '2016-02-10 08:18:16', '2016-02-10 08:18:16'),
(93, 'p20', 'u11', 'no\\', '2016-02-10 13:48:20', '2016-02-10 08:18:20', '2016-02-10 08:18:20'),
(94, 'u11', 'p20', 'sssss', '2016-02-10 13:48:37', '2016-02-10 08:18:37', '2016-02-10 08:18:37'),
(95, 'u11', 'p20', 'hello', '2016-02-10 13:51:29', '2016-02-10 08:21:29', '2016-02-10 08:21:29'),
(96, 'p20', 'u11', 's', '2016-02-10 13:52:45', '2016-02-10 08:22:45', '2016-02-10 08:22:45'),
(97, 'u11', 'p20', 'sa', '2016-02-10 13:53:11', '2016-02-10 08:23:11', '2016-02-10 08:23:11'),
(98, 'p20', 'u11', '12', '2016-02-10 13:53:19', '2016-02-10 08:23:19', '2016-02-10 08:23:19'),
(99, 'u11', 'p20', '34', '2016-02-10 13:53:51', '2016-02-10 08:23:51', '2016-02-10 08:23:51'),
(100, 'p20', 'u11', '56', '2016-02-10 13:53:58', '2016-02-10 08:23:58', '2016-02-10 08:23:58'),
(101, 'p20', 'u11', '12', '2016-02-10 13:55:33', '2016-02-10 08:25:33', '2016-02-10 08:25:33'),
(102, 'u11', 'p20', '56', '2016-02-10 13:55:53', '2016-02-10 08:25:53', '2016-02-10 08:25:53'),
(103, 'p20', 'u11', '667777778', '2016-02-10 13:56:15', '2016-02-10 08:26:15', '2016-02-10 08:26:15'),
(104, 'p20', 'u11', '33331313', '2016-02-10 13:59:13', '2016-02-10 08:29:13', '2016-02-10 08:29:13'),
(105, 'u11', 'p20', 'fffffffffffffffffffffffff', '2016-02-10 14:00:28', '2016-02-10 08:30:28', '2016-02-10 08:30:28'),
(106, 'p20', 'u11', 'fffffffffffffffwwwwwwwwwwwwwwwwwww', '2016-02-10 14:00:37', '2016-02-10 08:30:37', '2016-02-10 08:30:37'),
(107, 'p20', 'u11', 'sssssssssssssssssssssssssssss', '2016-02-10 14:03:18', '2016-02-10 08:33:18', '2016-02-10 08:33:18'),
(108, 'p20', 'u11', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '2016-02-10 14:04:50', '2016-02-10 08:34:50', '2016-02-10 08:34:50'),
(109, 'u11', 'p20', 'ddd', '2016-02-10 14:05:41', '2016-02-10 08:35:41', '2016-02-10 08:35:41'),
(110, 'p20', 'u11', 'ddd', '2016-02-10 14:05:46', '2016-02-10 08:35:46', '2016-02-10 08:35:46'),
(111, 'u11', 'p20', 'ddddddddddddddddddddwwwwwwwwwwwwwwwww', '2016-02-10 14:05:59', '2016-02-10 08:35:59', '2016-02-10 08:35:59'),
(112, 'p20', 'u11', 'sssssssssssssssssssssssss', '2016-02-10 14:06:08', '2016-02-10 08:36:08', '2016-02-10 08:36:08'),
(113, 'p20', 'u11', 'rtttttttrtrtrtrtrtrt', '2016-02-10 14:06:15', '2016-02-10 08:36:15', '2016-02-10 08:36:15'),
(114, 'u11', 'p20', 'hello', '2016-02-10 14:08:01', '2016-02-10 08:38:01', '2016-02-10 08:38:01'),
(115, 'p20', 'u11', 'wwwww', '2016-02-10 14:08:06', '2016-02-10 08:38:06', '2016-02-10 08:38:06'),
(116, 'u11', 'p20', 'wwwwww', '2016-02-10 14:08:14', '2016-02-10 08:38:14', '2016-02-10 08:38:14'),
(117, 'p20', 'u11', '111111', '2016-02-10 14:08:19', '2016-02-10 08:38:19', '2016-02-10 08:38:19'),
(118, 'u11', 'p20', '22222', '2016-02-10 14:08:28', '2016-02-10 08:38:28', '2016-02-10 08:38:28'),
(119, 'u11', 'p20', '12345', '2016-02-10 14:08:46', '2016-02-10 08:38:46', '2016-02-10 08:38:46'),
(120, 'u11', 'p20', 'dddddddddddddd', '2016-02-10 14:09:57', '2016-02-10 08:39:57', '2016-02-10 08:39:57'),
(121, 'u11', 'p20', '145236', '2016-02-10 14:10:23', '2016-02-10 08:40:23', '2016-02-10 08:40:23'),
(122, 'u11', 'p20', 'hey', '2016-02-10 14:41:10', '2016-02-10 09:11:10', '2016-02-10 09:11:10'),
(123, 'p20', 'u11', '123', '2016-02-10 14:41:16', '2016-02-10 09:11:16', '2016-02-10 09:11:16'),
(124, 'u11', 'p20', '1453', '2016-02-10 14:41:21', '2016-02-10 09:11:21', '2016-02-10 09:11:21'),
(125, 'p20', 'u11', '23233', '2016-02-10 14:41:26', '2016-02-10 09:11:26', '2016-02-10 09:11:26'),
(126, 'u11', 'p20', '123456', '2016-02-10 14:43:30', '2016-02-10 09:13:30', '2016-02-10 09:13:30'),
(127, 'p20', 'u11', '789', '2016-02-10 14:43:37', '2016-02-10 09:13:37', '2016-02-10 09:13:37'),
(128, 'p20', 'u11', '01235', '2016-02-10 14:43:43', '2016-02-10 09:13:43', '2016-02-10 09:13:43'),
(129, 'p20', 'u11', '36', '2016-02-10 14:43:56', '2016-02-10 09:13:56', '2016-02-10 09:13:56'),
(130, 'u11', 'p20', '1', '2016-02-10 14:44:52', '2016-02-10 09:14:52', '2016-02-10 09:14:52'),
(131, 'p20', 'u11', '2', '2016-02-10 14:44:56', '2016-02-10 09:14:56', '2016-02-10 09:14:56'),
(132, 'u11', 'p20', '3', '2016-02-10 14:44:59', '2016-02-10 09:14:59', '2016-02-10 09:14:59'),
(134, 'u11', 'p20', '5', '2016-02-10 14:45:07', '2016-02-10 09:15:07', '2016-02-10 09:15:07'),
(135, 'p20', 'u11', '6', '2016-02-10 14:45:12', '2016-02-10 09:15:12', '2016-02-10 09:15:12'),
(136, 'u11', 'p20', '4', '2016-02-10 14:45:17', '2016-02-10 09:15:17', '2016-02-10 09:15:17'),
(137, 'u11', 'p20', 'w', '2016-02-10 14:45:24', '2016-02-10 09:15:24', '2016-02-10 09:15:24'),
(138, 'p20', 'u11', 'wwww', '2016-02-10 14:45:31', '2016-02-10 09:15:31', '2016-02-10 09:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `ds_city`
--

CREATE TABLE IF NOT EXISTS `ds_city` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_city`
--

INSERT INTO `ds_city` (`id`, `name`, `slug`, `created_at`, `updated_at`, `nameit`, `namees`) VALUES
(1, 'Helsinki', 'helsinki', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Helsinki', 'Helsinki'),
(2, 'Espoo', 'espoo', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Espoo', 'Espoo'),
(3, 'Tampere', 'tampere', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Tampere', 'Tampere'),
(4, 'Vantaa', 'vantaa', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Vantaa', 'Vantaa'),
(5, 'Oulu', 'oulu', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Oulu', 'Oulu'),
(6, 'Turku', 'turku', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Turku', 'Turku'),
(7, 'Jyväskylä', 'jyvaskyla', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Jyväskylä', 'Jyväskylä'),
(8, 'Kuopio', 'kuopio', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Kuopio', 'Kuopio'),
(9, 'Lahti', 'lahti', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Lahti', 'Lahti'),
(10, 'Kouvola', 'kouvola', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Kouvola', 'Kouvola'),
(11, 'Pori', 'pori', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Pori', 'Pori'),
(12, 'Joensuu', 'joensuu', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Joensuu', 'Joensuu'),
(13, 'Lappeenranta', 'lappeenranta', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Lappeenranta', 'Lappeenranta'),
(14, 'Hämeenlinna', 'hameenlinna', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Hämeenlinna', 'Hämeenlinna'),
(15, 'Vaasa', 'vaasa', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Vaasa', 'Vaasa'),
(16, 'Rovaniemi', 'rovaniemi', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Rovaniemi', 'Rovaniemi'),
(17, 'Seinäjoki', 'seinajoki', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Seinäjoki', 'Seinäjoki'),
(18, 'Salo', 'salo', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Salo', 'Salo'),
(19, 'Kotka', 'kotka', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Kotka', 'Kotka'),
(20, 'Porvoo', 'porvoo', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Porvoo', 'Porvoo'),
(21, 'Mikkeli', 'mikkeli', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Mikkeli', 'Mikkeli'),
(22, 'Kokkola', 'kokkola', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Kokkola', 'Kokkola'),
(23, 'Hyvinkaa', 'hyvinkaa', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Hyvinkaa', 'Hyvinkaa'),
(24, 'Rauma', 'rauma', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Rauma', 'Rauma'),
(25, 'Lohja', 'lohja', '2015-04-21 16:41:52', '2015-04-21 16:41:52', 'Lohja', 'Lohja');

-- --------------------------------------------------------

--
-- Table structure for table `ds_class`
--

CREATE TABLE IF NOT EXISTS `ds_class` (
  `id` int(20) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `icon` varchar(64) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `slug` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) NOT NULL,
  `namees` varchar(255) NOT NULL,
  `descriptionit` varchar(255) NOT NULL,
  `descriptiones` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_class`
--

INSERT INTO `ds_class` (`id`, `name`, `icon`, `description`, `slug`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(1, 'WEB Developer', 'fa fa-graduation-cap', 'A web developer is a programmer who specializes in, or is specifically engaged in, the development of World Wide Web applications, or distributed network applications that are run over HTTP from a web server to a web browser.\r\n\r\nWeb developers are found wo', 'web-develop', '2015-05-30 18:00:56', '2015-11-19 02:55:52', 'Sviluppatore web', 'Desarrollo web', 'A web developer is a programmer who specializes in, or is specifically engaged in, the development of World Wide Web applications, or distributed network applications that are run over HTTP from a web server to a web browser.\r\n\r\nWeb developers are found w', 'A web developer is a programmer who specializes in, or is specifically engaged in, the development of World Wide Web applications, or distributed network applications that are run over HTTP from a web server to a web browser.\r\n\r\nWeb developers are found w'),
(2, 'Cleaner', 'fa fa-legal', 'You will find below everything you need to know about what we look for in our associates.', 'cleaner', '2015-05-30 18:39:44', '2015-11-18 05:37:07', 'Pulizie', 'Limpieza', 'You will find below everything you need to know about what we look for in our associates.', 'You will find below everything you need to know about what we look for in our associates.'),
(3, 'Keeper', 'fa fa-child', 'You will find below everything you need to know about what we look for in our associates.', 'keeper', '2015-05-30 18:56:41', '2015-11-18 05:39:09', 'Manutenzione', 'Mantenimiento', 'You will find below everything you need to know about what we look for in our associates.', 'You will find below everything you need to know about what we look for in our associates.'),
(4, 'category 4', 'fa fa-star', 'asf dsa fdsa fdsa ', 'category-4', '2015-11-04 00:27:12', '2015-11-18 05:41:23', 'categoria 4', 'categoría 4', 'asf dsa fdsa fdsa ', 'asf dsa fdsa fdsa ');

-- --------------------------------------------------------

--
-- Table structure for table `ds_comments`
--

CREATE TABLE IF NOT EXISTS `ds_comments` (
  `id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_comments`
--

INSERT INTO `ds_comments` (`id`, `post_id`, `content`, `user_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is a test comment for test blog.', 1, 0, '2015-07-09 23:35:40', '2015-07-09 23:35:40'),
(2, 1, 'I like this blog. Fantastic! Awesome!', 5, 0, '2015-07-09 23:59:49', '2015-07-09 23:59:49'),
(3, 1, 'No leave a test comment.\nThanks', 5, 1, '2015-07-11 17:18:24', '2015-07-11 17:18:24'),
(4, 1, 'Thanks for your comment!', 1, 2, '2015-07-11 17:21:33', '2015-07-11 17:21:33'),
(5, 1, 'sorry I had a test.  :)', 1, 3, '2015-07-11 17:25:50', '2015-07-11 17:25:50'),
(6, 2, 'Hello world blog is good', 1, 0, '2015-07-11 17:26:30', '2015-07-11 17:26:30'),
(7, 5, 'Hello Test', 9, 0, '2015-12-22 20:35:37', '2015-12-22 20:35:37'),
(8, 20, 'ffydfdfd\n', 10, 0, '2015-12-24 17:10:41', '2015-12-24 17:10:41'),
(9, 19, 'hello', 11, 0, '2016-01-02 00:25:26', '2016-01-02 00:25:26'),
(10, 19, 'yes', 11, 9, '2016-01-02 00:25:39', '2016-01-02 00:25:39'),
(11, 19, 'okay', 11, 0, '2016-01-02 00:25:47', '2016-01-02 00:25:47'),
(12, 19, 'good', 11, 11, '2016-01-02 00:26:00', '2016-01-02 00:26:00'),
(13, 19, 'hello123', 11, 0, '2016-01-02 00:29:18', '2016-01-02 00:29:18'),
(14, 19, 'ffdfdfd', 11, 0, '2016-01-02 00:30:06', '2016-01-02 00:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `ds_company`
--

CREATE TABLE IF NOT EXISTS `ds_company` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL COMMENT '0 = inactive, 1= active',
  `suspend` smallint(5) NOT NULL COMMENT '0 = block, 1 = unblock',
  `photo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `vat_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `languages` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_verified` smallint(5) NOT NULL COMMENT '0 = verified, 1= unverified',
  `payment_verified` smallint(5) NOT NULL COMMENT '0 = verified, 1= unverified',
  `rate` float DEFAULT NULL,
  `register` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_no` text COLLATE utf8_unicode_ci NOT NULL,
  `user_key` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count_email` int(10) unsigned DEFAULT '0',
  `count_sms` int(10) unsigned DEFAULT '0',
  `plan_id` int(10) unsigned DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `secure_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `paypal_id` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_amount` int(10) DEFAULT NULL,
  `session_status` int(10) DEFAULT NULL,
  `holidays` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registerit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registeres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionit` text COLLATE utf8_unicode_ci NOT NULL,
  `descriptiones` text COLLATE utf8_unicode_ci NOT NULL,
  `default_language` text COLLATE utf8_unicode_ci,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country_tax` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_vat_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gateway` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_company`
--

INSERT INTO `ds_company` (`id`, `name`, `email`, `phone`, `is_active`, `suspend`, `photo`, `vat_id`, `country`, `languages`, `phone_verified`, `payment_verified`, `rate`, `register`, `city`, `reg_no`, `user_key`, `keyword`, `count_email`, `count_sms`, `plan_id`, `is_completed`, `token`, `secure_key`, `salt`, `slug`, `description`, `paypal_id`, `user_type`, `service_amount`, `session_status`, `holidays`, `created_at`, `updated_at`, `nameit`, `namees`, `registerit`, `registeres`, `descriptionit`, `descriptiones`, `default_language`, `company_name`, `street`, `no`, `region`, `invoice_city`, `country_tax`, `invoice_vat_id`, `payment_gateway`, `payment_email`) VALUES
(1, 'Jeni Antony del Santo', 'jeni@where.com', '+394834838', 1, 0, 'vlxmSAiJoUhZPIUC4675h5Af.jpg', '087747473737', 'DE', 'ab,am,bs', 1, 0, 45, 'Professional College', 'Roma', '', '329-294-2394-23', 'restaurant, food, eating, service, drink, party', 0, 0, NULL, 1, 'FWL9Z0GA', 'fd523a4f738973dd5c1be8845af9f8e1', 'GCuQOcm5', 'jeni-varaa', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job. company who is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff of Company examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job.', 'ankorvisitor003@gmail.com', 'pro_ps', 9, 0, NULL, '2015-04-21 05:13:41', '2015-12-04 02:23:07', '', '', '', '', '', '', 'it', '', '', '', '', '', '', '', '', ''),
(2, 'Ronaldo', 'italianhomerestaurant@gmail.com', '123456789', 1, 1, 'SBgWVPRMMiBvOyyTUxMid7N4.jpeg', NULL, 'KW', 'bs,ce,da', 1, 1, 50, 'Professional College', 'Rome', '123654', NULL, NULL, 0, 0, NULL, 1, 'C4JEQVNS', 'a9f725009a54ab467011293e6a73eb31', 'iVuETJCo', 'jenistar', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.', 'ankorvisitor003@gmail.com', 'pro_ps', 6, 1, NULL, '2015-04-28 22:44:20', '2016-01-28 08:00:44', '', '', '', '', 'ItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianItalianIta', 'spanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspa', NULL, '', '', '', '', '', '', '', '', ''),
(3, 'Messi', 'jenio@where.com', '5959848', 0, 0, 'qPfneQMHZK9wUC0xschUPWCj.jpg', 'PI05848893', 'DZ', 'cr,fr,hi', 0, 0, 50, 'Professional College', 'Rome', '', '5555555', 'gym, fitness, car, motor, yoga', 0, 0, NULL, 1, '7D0ZTQUN', '4683af110341985ee309f664f613d9f0', 'cEKuRaIq', 'jeni', 'Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa quis tempor incididunt ut et dolore et dolorum fuga. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus.\r\nLorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde nostrudlaboris. Sed unde omnis iste natus error sit voluptatem.', 'ankorvisitor003@gmail.com', 'pro_ps', 5, 0, NULL, '2015-05-16 13:47:20', '2015-12-04 02:24:04', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(4, 'James', 'miracle.star1000@where.com', '4948477', 0, 1, 'EdPBNmQyoOPvjk0YXLOflMpf.jpg', 'VI00000', 'DJ', 'sq,da,ha', 0, 0, 25, 'Professional College', 'Rome', '', '556865532', 'house, cleaning, snow', 0, 0, NULL, 1, 'TNEEPCAW', 'b27cf92b2ac218d2edeb1b8bde25173e', 'BJEQKzG1', 'cleaning-service', 'Ayant travaillé un mois et demi au club med d''Avoriaz et durant 4 mois ensuite dans un hotel 4 étoiles en Corse en tant que femme de chambre, je vous propose mes service dans ce domaine.  Minutieuse et exigeante de nature, je mènerai à bien les tâches qui me seront confier par vos soins.  N''hésitez pas à me contacter pour tout renseignement.', 'ankorvisitor003@gmail.com', 'pro_ps', 4, 0, NULL, '2015-05-16 13:48:33', '2015-12-04 02:24:25', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(5, 'Mikaels pizzeria', 'mikae@where.com', '045555', 0, 1, 'Sa4MZPdMSgDV0KiO5QkJudS8.jpg', '54588987', 'IT', 'af,ak,az', 1, 0, 30, 'Professional College', 'Phnom Penh', '', '5555555', 'dirty, repair, program', 0, 0, NULL, 1, '5CGXYT17', '762e95baa76c91d6b053b68c250a6319', 'g5SSaZQf', 'mikaels-pizzeria', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.', 'ankorvisitor003@gmail.com', 'pro_ps', 5, 1, NULL, '2015-05-16 13:49:20', '2015-12-04 02:24:59', '', '', '', '', '', '', 'it', '', '', '', '', '', '', '', '', ''),
(6, 'John Nelson', 'goshawk310@where.com', '12345687987', 0, 1, '2VjVkJuwNSe7GGlVeQUrLbgG.jpg', '56545455', 'IT', 'ml,no,ru', 0, 1, 45, 'Professional College', 'rome', '', '55555555', 'program, IT, Center', 0, 0, NULL, 1, 'N0KZNM7N', '200af35eb388708dc2e90fc13e55ccfd', 'hQKLO8tJ', 'it-program-center', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.', 'ankorvisitor003@gmail.com', 'pro_py', 0, 1, '02/17/2015, 05/01/2015, 06/17/2015, 07/17/2015, 07/24/2015, 09/17/2015, 11/19/2015, 12/14/2015', '2015-05-16 14:38:33', '2015-12-24 04:05:47', '', '', '', '', '', '', 'it', '', '', '', '', '', '', '', '', ''),
(7, 'Ronaldinho', 'gaetano.gio@gmail.com', '5686545', 0, 1, 'MN60OpU464Zl0swPiUoxMuCB.jpg', '3323', 'IT', 'en,it', 0, 0, 50, 'Professional College', 'Rome', '', '8987555233', 'Football,House', 0, 0, NULL, 1, 'BB6OV3L7', '0f90eedf3652f7bbb0e3500f22d1e3d4', 'qD3hEAac', 'ronaldinho', 'Born on March 21, 1980, in Porto Alegre, Brazil, Ronaldinho came from a family of soccer players to reach the pinnacle of success in the sport. After a celebrated youth career, Ronaldinho became a key member of the Brazilian team that won the 2002 World Cup. He has played for clubs in Brazil, France, Spain and Italy, and twice been named FIFA World Player of the Year.', NULL, 'pro_ps', 3, 0, NULL, '2015-05-30 19:20:46', '2015-12-04 02:26:13', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(9, 'Mourinho', 'imak@where.com', '54681', 0, 0, 'cnkcHpkAyD5z5kPpbkxXveA1.jpg', '665558', 'MR', 'ff', 1, 0, 33, 'Professional College', 'rome', '', '54687543', 'Football, player', 0, 0, NULL, 1, 'QWE2GKD6', '02b5560ac3e24ef1f9c86cb603c08802', 'WA1kLRSo', 'mourinho', 'He is regarded by a number of players, coaches, and commentators as one of the greatest and most successful managers in the world.[2][3][4] Mourinho began his involvement in professional football as a player in the Portuguese Second Division. He studied sports science in Technical University of Lisbon and attended coaching courses in Britain. In Lisbon, he worked as a physical education teacher and had spells working as a youth team coach, a scout, and an assistant manager. In the early 1990s, he became an interpreter for Sir Bobby Robson at Sporting CP and Porto in Portugal, and Barcelona in Spain. He remained at the Catalonian club working with Robson''s successor Louis van Gaal.', NULL, 'pro_ps', 2, 0, NULL, '2015-05-30 19:44:42', '2015-12-04 02:26:48', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(10, 'Jack', 'golddong@where.com', '55555', 0, 0, 'pIfpEDTEnB7mlebBK4a3a1gS.jpg', '54787546', 'AF', 'en', 0, 0, 54, 'Professional College', 'cabul', '', '3212121', 'test', 0, 0, NULL, 1, 'EF8PNS3R', '97af0bf4a8316e3b6cd41683a219261d', 'n0pVAT2z', 'jack', '', '', 'pro_py', 0, 0, NULL, '2015-06-06 12:11:16', '2015-12-04 02:29:17', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(12, 'Toni del Santo', 'gaetano_gio@hotmail.com', '', 0, 0, 'sCiOVF3i5ZkDxlmOMm5bLt5n.jpg', '01234547484', 'AF', 'ab,aa,af', 0, 1, 44, 'Professional College', 'Roma', '', NULL, '', 0, 0, NULL, 0, '4SNF9FZG', '7db0374430d721188ba2137f85709a71', '9U4u86P0', 'toni-del-santo', '', NULL, NULL, NULL, NULL, NULL, '2015-09-08 13:05:06', '2015-12-04 02:30:41', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(13, 'Ylli', 'avv.yllipace@gmail.com', '3927122933', 0, 0, '27QEVdlSQFTHZyn5bMLZZ1Pm.jpg', '9876524341', 'IT', 'sq,en,it', 1, 0, 20, 'Bar Register', 'Lecce', '', NULL, '', 0, 0, NULL, 0, 'XAPDZNCH', '8225613c6e7ab47c9469bb8285660502', 'pE9kHjCq', 'ylli', 'Hello', NULL, 'basic', 1, 0, NULL, '2015-09-08 13:09:02', '2015-12-04 02:38:50', '', '', '', '', 'Ciao', 'Hola', NULL, '', '', '', '', '', '', '', '', ''),
(14, 'Antonio my Gmail ', 'gaetangiordano@gmail.com', '00393937425945', 0, 0, 'UQuOizF7ZjzOm8qDVeNJrcts.jpg', '01274746262', 'IT', 'en,it,pt,es', 0, 1, 40, 'Professional College', 'Roma', '', '346575DAB', 'Leggere, andare, tornare', 0, 0, NULL, 1, 'ZEPELVAP', 'b5c12df1c5ce58a46a685881fb0b7563', 'USTaycG1', 'antonio-del-frate', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users  solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of  reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff  examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job. company who is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users  solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of  reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff of Company examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job.', NULL, 'pro_ps', NULL, 0, NULL, '2015-09-08 13:14:16', '2015-11-08 23:31:54', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(15, 'Saurabh Singh', 'saurabh22_mca41@yahoo.co.in', '9891594731', 1, 0, 'V93ic9JMJaSeeqEp2f5qf5rf.jpg', '', 'IN', 'hi', 0, 0, 6, 'Professional College', '', '', '', '', 0, 0, NULL, 1, '8VQ6I79E', 'b020194087bb6b29df720c82845c9c82', 'HZXsZK1b', 'saurabh-singh', 'Hello how are you', NULL, 'basic', 1, 0, NULL, '2015-10-14 12:30:50', '2015-12-04 02:32:58', '', '', '', '', 'Ciao come stai', 'Hola que tal', '', '', '', '', '', '', '', '', '', ''),
(17, 'Protesta ', 'Trillo@gmail.cim', '346529', 1, 0, 'RJ4t3A7eayHDNExPSoWuds1B.jpg', '', 'AX', 'af,am', 1, 0, 40, 'Professional College', '', '', NULL, '', 0, 0, NULL, 0, 'Q0HH9ZV0', 'f7ff3c8efb518cc7e40d36498bfd973e', 'kBISAmE0', 'protesta', '', NULL, 'pro_ps', NULL, 0, NULL, '2015-11-18 04:56:57', '2015-12-04 02:33:36', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(18, 'gae gio 1', 'gae.gio1@aa.com', '+393937003531', 1, 0, 'flUaP2RnFh8g2DMsR7KOpsz3.jpg', '1291919192019', 'IT', 'it', 0, 0, 23, 'Professional College', 'Roma', '', '29293939B3A', '', 0, 0, NULL, 1, 'TITC9HZ1', 'cc3e40d8d2ac64d737da47dbb4cdac5e', 'VbEL3hi2', 'gae-gio-1', 'Hello hello', NULL, 'pro_ps', NULL, 0, NULL, '2015-11-19 20:44:22', '2015-12-04 02:34:34', '', '', '', '', 'Ciao Ciao', 'Hola Hola', 'es', '', '', '', '', '', '', '', '', ''),
(19, 'Tarun', 'test@gmail.com', '000000000', 1, 1, 'default.jpg', '', 'IN', 'fr', 0, 0, 25, 'Professional College', '', '', NULL, '', 0, 0, NULL, 0, 'LYB3V2NL', 'e0b914b6843c6e1e19419bd86f863cbd', 'it3gPt5v', 'tarun', '', NULL, 'basic', 1, 0, NULL, '2015-12-22 20:23:18', '2016-02-09 01:07:22', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(20, 'sorav garg p', 'sourav@mobiwebtech.com', 'sss9074939905', 1, 1, 'default.jpg', NULL, 'AF', 'en', 1, 0, 10, 'Professional College', '111111111111dsdsdsdss', '22jjjjjdsdsdsds', NULL, NULL, 0, 0, NULL, 1, 'CBDE6M08', '77838e06cbf67a5701ad7375a015596d', 'xheFxP0b', 'sorav-garg', 'dssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsd\r\n', NULL, 'basic', 1, 0, NULL, '2015-12-24 08:56:38', '2016-03-19 04:38:54', '', '', '', '', 'dssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsd\r\ndssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsddssdsdsdsdsdsddsd\r\n', 'spanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanishspanish', '', 'Company Name', 'Street', 'NO', 'Region', 'City', 'Company With VAT ID', 'VAT ID', 'paypal', 'sourav@mobiwebtech.com'),
(21, 'trtrrtr', 'sourav@mobiwebtrtrtech.com', '9074939905', 0, 0, 'default.jpg', NULL, '', NULL, 0, 1, NULL, NULL, NULL, '', NULL, NULL, 0, 0, NULL, 0, 'STKAZ2PK', '844d9fbad5532cdf48d8b69ba202d7d1', 'NIlDuTNM', 'trtrrtr', NULL, NULL, 'basic', 1, NULL, NULL, '2016-01-25 05:21:02', '2016-01-25 05:21:02', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', ''),
(22, 'ttrt4554454', 'italianhomerestaurererant@gmail.com', '9074939905', 0, 0, 'default.jpg', NULL, '', NULL, 0, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, NULL, 0, 'BLSQW0OD', '49415e4e612bd776255c7f72b13d300d', 'Mi4NGukS', 'ttrt4554454', NULL, NULL, 'basic', 1, NULL, NULL, '2016-01-25 05:22:11', '2016-01-25 05:22:11', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ds_company_sub_category`
--

CREATE TABLE IF NOT EXISTS `ds_company_sub_category` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `sub_category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_company_sub_category`
--

INSERT INTO `ds_company_sub_category` (`id`, `company_id`, `category_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(108, 2, 1, 1, '2015-05-23 23:07:23', '2015-05-23 23:07:23'),
(109, 2, 1, 2, '2015-05-23 23:07:23', '2015-05-23 23:07:23'),
(110, 2, 1, 3, '2015-05-23 23:07:23', '2015-05-23 23:07:23'),
(111, 2, 5, 17, '2015-05-23 23:07:23', '2015-05-23 23:07:23'),
(123, 1, 2, 4, '2015-05-23 23:09:47', '2015-05-23 23:09:47'),
(124, 1, 2, 5, '2015-05-23 23:09:47', '2015-05-23 23:09:47'),
(125, 1, 2, 6, '2015-05-23 23:09:47', '2015-05-23 23:09:47'),
(126, 1, 2, 7, '2015-05-23 23:09:47', '2015-05-23 23:09:47'),
(127, 1, 2, 8, '2015-05-23 23:09:47', '2015-05-23 23:09:47'),
(128, 5, 1, 1, '2015-05-23 23:12:55', '2015-05-23 23:12:55'),
(129, 5, 1, 2, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(130, 5, 2, 6, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(131, 5, 2, 7, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(132, 5, 2, 8, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(133, 5, 3, 9, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(134, 5, 3, 10, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(135, 5, 3, 11, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(136, 5, 4, 13, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(137, 5, 4, 14, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(138, 5, 5, 21, '2015-05-23 23:12:56', '2015-05-23 23:12:56'),
(139, 3, 5, 17, '2015-05-24 00:04:52', '2015-05-24 00:04:52'),
(140, 3, 5, 18, '2015-05-24 00:04:52', '2015-05-24 00:04:52'),
(141, 3, 5, 19, '2015-05-24 00:04:52', '2015-05-24 00:04:52'),
(142, 3, 5, 20, '2015-05-24 00:04:52', '2015-05-24 00:04:52'),
(143, 3, 5, 21, '2015-05-24 00:04:52', '2015-05-24 00:04:52'),
(144, 3, 5, 22, '2015-05-24 00:04:52', '2015-05-24 00:04:52'),
(145, 4, 1, 1, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(146, 4, 1, 2, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(147, 4, 1, 3, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(148, 4, 6, 23, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(149, 4, 6, 24, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(150, 4, 6, 25, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(151, 4, 6, 26, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(152, 4, 6, 27, '2015-05-24 00:11:57', '2015-05-24 00:11:57'),
(153, 6, 1, 1, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(154, 6, 1, 2, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(155, 6, 1, 3, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(156, 6, 3, 9, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(157, 6, 3, 10, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(158, 6, 3, 11, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(159, 6, 3, 12, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(160, 6, 6, 23, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(161, 6, 6, 24, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(162, 6, 6, 25, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(163, 6, 6, 26, '2015-05-24 12:38:12', '2015-05-24 12:38:12'),
(164, 6, 6, 27, '2015-05-24 12:38:12', '2015-05-24 12:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `ds_company_transaction`
--

CREATE TABLE IF NOT EXISTS `ds_company_transaction` (
  `id` int(20) unsigned NOT NULL,
  `company_id` int(20) unsigned NOT NULL,
  `subscr_id` varchar(64) DEFAULT NULL,
  `txn_id` varchar(64) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `data` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_company_widget`
--

CREATE TABLE IF NOT EXISTS `ds_company_widget` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `logo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `header` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `is_header` tinyint(1) NOT NULL DEFAULT '1',
  `custom_css` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_company_widget`
--

INSERT INTO `ds_company_widget` (`id`, `company_id`, `logo`, `color`, `header`, `background`, `is_header`, `custom_css`, `created_at`, `updated_at`) VALUES
(1, 1, 'P5xYd4kVRL0ugX55XhhVomOC.jpg', '#e6400c', '#e6400c', '#ffffff', 1, '@import url(http://fonts.googleapis.com/css?family=Just+Another+Hand);\r\n\r\n.header-background-color {\r\n  background: #40e60c !important;\r\n}\r\n\r\nbody, h1, h2, h3, h4, h5, h6 {\r\n font-family: ''Just Another Hand'', cursive !important;\r\n}\r\n', '2015-04-23 11:25:50', '2015-04-28 00:51:50'),
(2, 13, 'sMWeoweSaKbZn2ZO449dGL0q.jpg', '#7a3520', '#e6400c', '#ffffff', 1, '', '2015-09-08 13:29:33', '2015-09-08 13:29:33'),
(3, 19, 'CiGCcHfFeiboiBF6lzOF4vaN.jpg', '#520ce6', '#e6400c', '#ffffff', 1, '', '2015-12-22 20:34:52', '2015-12-22 20:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `ds_consumer`
--

CREATE TABLE IF NOT EXISTS `ds_consumer` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `count_visit` int(10) unsigned NOT NULL,
  `count_stamp` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_consumer`
--

INSERT INTO `ds_consumer` (`id`, `company_id`, `user_id`, `count_visit`, `count_stamp`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2015-04-21 10:14:31', '2015-04-21 10:56:59'),
(2, 1, 2, 1, 1, '2015-04-22 12:12:14', '2015-10-14 12:42:39'),
(3, 2, 5, 0, 0, '2015-05-16 15:07:02', '2015-05-16 15:07:02'),
(4, 6, 5, 0, 0, '2015-05-21 05:57:56', '2015-05-21 05:57:56'),
(5, 4, 5, 0, 0, '2015-05-24 01:11:26', '2015-05-24 01:11:26'),
(6, 5, 5, 0, 0, '2015-05-24 01:12:26', '2015-05-24 01:12:26'),
(7, 3, 5, 0, 0, '2015-05-24 01:13:42', '2015-05-24 01:13:42'),
(8, 2, 1, 0, 0, '2015-05-26 04:52:26', '2015-05-26 04:52:26'),
(9, 10, 1, 0, 0, '2015-06-23 12:22:59', '2015-06-23 12:22:59'),
(10, 7, 1, 0, 0, '2015-06-25 11:42:20', '2015-06-25 11:42:20'),
(11, 15, 8, 0, 0, '2015-11-18 02:15:10', '2015-11-18 02:15:10'),
(12, 20, 12, 7, 7, '2016-01-20 02:26:28', '2016-02-23 03:06:08'),
(13, 20, 11, 2, 2, '2016-01-20 02:33:55', '2016-02-23 03:06:05'),
(14, 4, 11, 0, 0, '2016-02-12 03:37:49', '2016-02-12 03:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `ds_contact`
--

CREATE TABLE IF NOT EXISTS `ds_contact` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_processed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptiones` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_contact`
--

INSERT INTO `ds_contact` (`id`, `company_id`, `name`, `email`, `description`, `is_processed`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(1, 1, 'love', 'jeni@varaa.com', 'admin\r\n', 0, '2015-04-23 11:51:29', '2015-04-23 11:51:29', 'love', 'love', 'admin\r\n', 'admin\r\n'),
(2, 1, '', '', '', 0, '2015-09-08 16:38:31', '2015-09-08 16:38:31', '', '', '', ''),
(3, 1, 'hello', 'ewew@hjhjh.com', 'hello', 0, '2015-09-08 16:39:10', '2015-09-08 16:39:10', 'hello', 'hello', 'hello', 'hello'),
(4, 14, '', 'gaetano.gio@gmail.com', 'Hello I need info about this service', 0, '2015-09-17 03:42:18', '2015-09-17 03:42:18', '', '', 'Hello I need info about this service', 'Hello I need info about this service'),
(5, 4, '', '', '', 0, '2015-09-25 17:00:45', '2015-09-25 17:00:45', '', '', '', ''),
(6, 14, 'My name', 'gaetano.gio@gmail.com', 'Hello this message was send from the front end of profile page ', 0, '2015-09-26 06:26:36', '2015-09-26 06:26:36', 'My name', 'My name', 'Hello this message was send from the front end of profile page ', 'Hello this message was send from the front end of profile page '),
(7, 14, 'My name', 'skillbooking@libero.it', 'Hello this message was send from the front end of profile page ', 0, '2015-09-26 06:28:08', '2015-09-26 06:28:08', 'My name', 'My name', 'Hello this message was send from the front end of profile page ', 'Hello this message was send from the front end of profile page '),
(8, 14, 'Kdkdj', 'djdhe', 'Sjsjeh', 0, '2015-09-27 14:45:57', '2015-09-27 14:45:57', 'Kdkdj', 'Kdkdj', 'Sjsjeh', 'Sjsjeh'),
(9, 2, 'hoeelo', 'ewewe@d.com', 'sla''SLa''sa', 0, '2015-11-16 05:41:10', '2015-11-16 05:41:10', '', '', '', ''),
(10, 3, '', '', '', 0, '2015-11-21 01:26:29', '2015-11-21 01:26:29', '', '', '', ''),
(11, 19, 'qwertyu', 'qwerty@gmail.com', 'qwrety', 0, '2015-12-22 20:26:47', '2015-12-22 20:26:47', '', '', '', ''),
(12, 19, 'qwertyu', 'qwerty@gmail.com', 'qwrety', 0, '2015-12-22 20:28:28', '2015-12-22 20:28:28', '', '', '', ''),
(13, 5, 'ds', 'dsf@gmsfg.fvrth', 'sd', 0, '2015-12-22 20:36:39', '2015-12-22 20:36:39', '', '', '', ''),
(14, 5, '', '', '', 0, '2015-12-24 17:19:54', '2015-12-24 17:19:54', '', '', '', ''),
(15, 6, '', '', '', 0, '2015-12-30 05:25:27', '2015-12-30 05:25:27', '', '', '', ''),
(16, 6, '', '', '', 0, '2015-12-30 05:27:49', '2015-12-30 05:27:49', '', '', '', ''),
(17, 6, '555555', 'GGYUGYU@HGYUGUY.YHFT', '8498498416', 0, '2015-12-30 05:34:22', '2015-12-30 05:34:22', '', '', '', ''),
(18, 6, '65448', 'fgyguyg@yubnuihj.lhiugy', 'YUJNMOKOPKOP', 0, '2015-12-30 05:44:05', '2015-12-30 05:44:05', '', '', '', ''),
(19, 6, 'ytf6ft', 'dtyhuhh@guyhuui.lhyughyug', 'gfyughyughuhh', 0, '2015-12-30 05:49:39', '2015-12-30 05:49:39', '', '', '', ''),
(20, 6, '78yy78', 'ty@YUGHUUIH.HUYGUU', 'UIJHNIOJIOJ', 0, '2015-12-30 05:50:30', '2015-12-30 05:50:30', '', '', '', ''),
(21, 15, '', '', '', 0, '2016-01-18 01:26:42', '2016-01-18 01:26:42', '', '', '', ''),
(22, 20, '', '', '', 0, '2016-01-23 01:40:13', '2016-01-23 01:40:13', '', '', '', ''),
(23, 20, 'fdfdfd', 'dfdf@fdfd.h', 'dfdfdf', 0, '2016-01-23 01:41:02', '2016-01-23 01:41:02', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ds_country`
--

CREATE TABLE IF NOT EXISTS `ds_country` (
  `id` int(5) NOT NULL,
  `iso2` char(2) DEFAULT NULL,
  `short_name` varchar(80) NOT NULL DEFAULT '',
  `long_name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` varchar(6) DEFAULT NULL,
  `un_member` varchar(12) DEFAULT NULL,
  `calling_code` varchar(8) DEFAULT NULL,
  `cctld` varchar(5) DEFAULT NULL,
  `short_nameit` varchar(255) NOT NULL,
  `short_namees` varchar(255) NOT NULL,
  `long_nameit` varchar(255) NOT NULL,
  `long_namees` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ds_country`
--

INSERT INTO `ds_country` (`id`, `iso2`, `short_name`, `long_name`, `iso3`, `numcode`, `un_member`, `calling_code`, `cctld`, `short_nameit`, `short_namees`, `long_nameit`, `long_namees`) VALUES
(1, 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '004', 'yes', '93', '.af', 'Afghanistan', 'Afghanistan', 'Islamic Republic of Afghanistan', 'Islamic Republic of Afghanistan'),
(2, 'AX', 'Aland Islands', '&Aring;land Islands', 'ALA', '248', 'no', '358', '.ax', 'Aland Islands', 'Aland Islands', '&Aring;land Islands', '&Aring;land Islands'),
(3, 'AL', 'Albania', 'Republic of Albania', 'ALB', '008', 'yes', '355', '.al', 'Albania', 'Albania', 'Republic of Albania', 'Republic of Albania'),
(4, 'DZ', 'Algeria', 'People''s Democratic Republic of Algeria', 'DZA', '012', 'yes', '213', '.dz', 'Algeria', 'Algeria', 'People''s Democratic Republic of Algeria', 'People''s Democratic Republic of Algeria'),
(5, 'AS', 'American Samoa', 'American Samoa', 'ASM', '016', 'no', '1+684', '.as', 'American Samoa', 'American Samoa', 'American Samoa', 'American Samoa'),
(6, 'AD', 'Andorra', 'Principality of Andorra', 'AND', '020', 'yes', '376', '.ad', 'Andorra', 'Andorra', 'Principality of Andorra', 'Principality of Andorra'),
(7, 'AO', 'Angola', 'Republic of Angola', 'AGO', '024', 'yes', '244', '.ao', 'Angola', 'Angola', 'Republic of Angola', 'Republic of Angola'),
(8, 'AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'no', '1+264', '.ai', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla'),
(9, 'AQ', 'Antarctica', 'Antarctica', 'ATA', '010', 'no', '672', '.aq', 'Antarctica', 'Antarctica', 'Antarctica', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '028', 'yes', '1+268', '.ag', 'Antigua and Barbuda', 'Antigua and Barbuda', 'Antigua and Barbuda', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina', 'Argentine Republic', 'ARG', '032', 'yes', '54', '.ar', 'Argentina', 'Argentina', 'Argentine Republic', 'Argentine Republic'),
(12, 'AM', 'Armenia', 'Republic of Armenia', 'ARM', '051', 'yes', '374', '.am', 'Armenia', 'Armenia', 'Republic of Armenia', 'Republic of Armenia'),
(13, 'AW', 'Aruba', 'Aruba', 'ABW', '533', 'no', '297', '.aw', 'Aruba', 'Aruba', 'Aruba', 'Aruba'),
(14, 'AU', 'Australia', 'Commonwealth of Australia', 'AUS', '036', 'yes', '61', '.au', 'Australia', 'Australia', 'Commonwealth of Australia', 'Commonwealth of Australia'),
(15, 'AT', 'Austria', 'Republic of Austria', 'AUT', '040', 'yes', '43', '.at', 'Austria', 'Austria', 'Republic of Austria', 'Republic of Austria'),
(16, 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '031', 'yes', '994', '.az', 'Azerbaijan', 'Azerbaijan', 'Republic of Azerbaijan', 'Republic of Azerbaijan'),
(17, 'BS', 'Bahamas', 'Commonwealth of The Bahamas', 'BHS', '044', 'yes', '1+242', '.bs', 'Bahamas', 'Bahamas', 'Commonwealth of The Bahamas', 'Commonwealth of The Bahamas'),
(18, 'BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '048', 'yes', '973', '.bh', 'Bahrain', 'Bahrain', 'Kingdom of Bahrain', 'Kingdom of Bahrain'),
(19, 'BD', 'Bangladesh', 'People''s Republic of Bangladesh', 'BGD', '050', 'yes', '880', '.bd', 'Bangladesh', 'Bangladesh', 'People''s Republic of Bangladesh', 'People''s Republic of Bangladesh'),
(20, 'BB', 'Barbados', 'Barbados', 'BRB', '052', 'yes', '1+246', '.bb', 'Barbados', 'Barbados', 'Barbados', 'Barbados'),
(21, 'BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'yes', '375', '.by', 'Belarus', 'Belarus', 'Republic of Belarus', 'Republic of Belarus'),
(22, 'BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '056', 'yes', '32', '.be', 'Belgium', 'Belgium', 'Kingdom of Belgium', 'Kingdom of Belgium'),
(23, 'BZ', 'Belize', 'Belize', 'BLZ', '084', 'yes', '501', '.bz', 'Belize', 'Belize', 'Belize', 'Belize'),
(24, 'BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'yes', '229', '.bj', 'Benin', 'Benin', 'Republic of Benin', 'Republic of Benin'),
(25, 'BM', 'Bermuda', 'Bermuda Islands', 'BMU', '060', 'no', '1+441', '.bm', 'Bermuda', 'Bermuda', 'Bermuda Islands', 'Bermuda Islands'),
(26, 'BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '064', 'yes', '975', '.bt', 'Bhutan', 'Bhutan', 'Kingdom of Bhutan', 'Kingdom of Bhutan'),
(27, 'BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', '068', 'yes', '591', '.bo', 'Bolivia', 'Bolivia', 'Plurinational State of Bolivia', 'Plurinational State of Bolivia'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'no', '599', '.bq', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '070', 'yes', '387', '.ba', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana', 'Republic of Botswana', 'BWA', '072', 'yes', '267', '.bw', 'Botswana', 'Botswana', 'Republic of Botswana', 'Republic of Botswana'),
(31, 'BV', 'Bouvet Island', 'Bouvet Island', 'BVT', '074', 'no', 'NONE', '.bv', 'Bouvet Island', 'Bouvet Island', 'Bouvet Island', 'Bouvet Island'),
(32, 'BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '076', 'yes', '55', '.br', 'Brazil', 'Brazil', 'Federative Republic of Brazil', 'Federative Republic of Brazil'),
(33, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'IOT', '086', 'no', '246', '.io', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei', 'Brunei Darussalam', 'BRN', '096', 'yes', '673', '.bn', 'Brunei', 'Brunei', 'Brunei Darussalam', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'yes', '359', '.bg', 'Bulgaria', 'Bulgaria', 'Republic of Bulgaria', 'Republic of Bulgaria'),
(36, 'BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'yes', '226', '.bf', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso'),
(37, 'BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'yes', '257', '.bi', 'Burundi', 'Burundi', 'Republic of Burundi', 'Republic of Burundi'),
(38, 'KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'yes', '855', '.kh', 'Cambodia', 'Cambodia', 'Kingdom of Cambodia', 'Kingdom of Cambodia'),
(39, 'CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'yes', '237', '.cm', 'Cameroon', 'Cameroon', 'Republic of Cameroon', 'Republic of Cameroon'),
(40, 'CA', 'Canada', 'Canada', 'CAN', '124', 'yes', '1', '.ca', 'Canada', 'Canada', 'Canada', 'Canada'),
(41, 'CV', 'Cape Verde', 'Republic of Cape Verde', 'CPV', '132', 'yes', '238', '.cv', 'Cape Verde', 'Cape Verde', 'Republic of Cape Verde', 'Republic of Cape Verde'),
(42, 'KY', 'Cayman Islands', 'The Cayman Islands', 'CYM', '136', 'no', '1+345', '.ky', 'Cayman Islands', 'Cayman Islands', 'The Cayman Islands', 'The Cayman Islands'),
(43, 'CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'yes', '236', '.cf', 'Central African Republic', 'Central African Republic', 'Central African Republic', 'Central African Republic'),
(44, 'TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'yes', '235', '.td', 'Chad', 'Chad', 'Republic of Chad', 'Republic of Chad'),
(45, 'CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'yes', '56', '.cl', 'Chile', 'Chile', 'Republic of Chile', 'Republic of Chile'),
(46, 'CN', 'China', 'People''s Republic of China', 'CHN', '156', 'yes', '86', '.cn', 'China', 'China', 'People''s Republic of China', 'People''s Republic of China'),
(47, 'CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'no', '61', '.cx', 'Christmas Island', 'Christmas Island', 'Christmas Island', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'no', '61', '.cc', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'yes', '57', '.co', 'Colombia', 'Colombia', 'Republic of Colombia', 'Republic of Colombia'),
(50, 'KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'yes', '269', '.km', 'Comoros', 'Comoros', 'Union of the Comoros', 'Union of the Comoros'),
(51, 'CG', 'Congo', 'Republic of the Congo', 'COG', '178', 'yes', '242', '.cg', 'Congo', 'Congo', 'Republic of the Congo', 'Republic of the Congo'),
(52, 'CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'some', '682', '.ck', 'Cook Islands', 'Cook Islands', 'Cook Islands', 'Cook Islands'),
(53, 'CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'yes', '506', '.cr', 'Costa Rica', 'Costa Rica', 'Republic of Costa Rica', 'Republic of Costa Rica'),
(54, 'CI', 'Cote d''ivoire (Ivory Coast)', 'Republic of C&ocirc;te D''Ivoire (Ivory Coast)', 'CIV', '384', 'yes', '225', '.ci', 'Cote d''ivoire (Ivory Coast)', 'Cote d''ivoire (Ivory Coast)', 'Republic of C&ocirc;te D''Ivoire (Ivory Coast)', 'Republic of C&ocirc;te D''Ivoire (Ivory Coast)'),
(55, 'HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'yes', '385', '.hr', 'Croatia', 'Croatia', 'Republic of Croatia', 'Republic of Croatia'),
(56, 'CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'yes', '53', '.cu', 'Cuba', 'Cuba', 'Republic of Cuba', 'Republic of Cuba'),
(57, 'CW', 'Curacao', 'Cura&ccedil;ao', 'CUW', '531', 'no', '599', '.cw', 'Curacao', 'Curacao', 'Cura&ccedil;ao', 'Cura&ccedil;ao'),
(58, 'CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'yes', '357', '.cy', 'Cyprus', 'Cyprus', 'Republic of Cyprus', 'Republic of Cyprus'),
(59, 'CZ', 'Czech Republic', 'Czech Republic', 'CZE', '203', 'yes', '420', '.cz', 'Czech Republic', 'Czech Republic', 'Czech Republic', 'Czech Republic'),
(60, 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'COD', '180', 'yes', '243', '.cd', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo'),
(61, 'DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'yes', '45', '.dk', 'Denmark', 'Denmark', 'Kingdom of Denmark', 'Kingdom of Denmark'),
(62, 'DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'yes', '253', '.dj', 'Djibouti', 'Djibouti', 'Republic of Djibouti', 'Republic of Djibouti'),
(63, 'DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'yes', '1+767', '.dm', 'Dominica', 'Dominica', 'Commonwealth of Dominica', 'Commonwealth of Dominica'),
(64, 'DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'yes', '1+809, 8', '.do', 'Dominican Republic', 'Dominican Republic', 'Dominican Republic', 'Dominican Republic'),
(65, 'EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'yes', '593', '.ec', 'Ecuador', 'Ecuador', 'Republic of Ecuador', 'Republic of Ecuador'),
(66, 'EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'yes', '20', '.eg', 'Egypt', 'Egypt', 'Arab Republic of Egypt', 'Arab Republic of Egypt'),
(67, 'SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'yes', '503', '.sv', 'El Salvador', 'El Salvador', 'Republic of El Salvador', 'Republic of El Salvador'),
(68, 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'yes', '240', '.gq', 'Equatorial Guinea', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'Republic of Equatorial Guinea'),
(69, 'ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'yes', '291', '.er', 'Eritrea', 'Eritrea', 'State of Eritrea', 'State of Eritrea'),
(70, 'EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'yes', '372', '.ee', 'Estonia', 'Estonia', 'Republic of Estonia', 'Republic of Estonia'),
(71, 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'yes', '251', '.et', 'Ethiopia', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'Federal Democratic Republic of Ethiopia'),
(72, 'FK', 'Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)', 'FLK', '238', 'no', '500', '.fk', 'Falkland Islands (Malvinas)', 'Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)'),
(73, 'FO', 'Faroe Islands', 'The Faroe Islands', 'FRO', '234', 'no', '298', '.fo', 'Faroe Islands', 'Faroe Islands', 'The Faroe Islands', 'The Faroe Islands'),
(74, 'FJ', 'Fiji', 'Republic of Fiji', 'FJI', '242', 'yes', '679', '.fj', 'Fiji', 'Fiji', 'Republic of Fiji', 'Republic of Fiji'),
(75, 'FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'yes', '358', '.fi', 'Finland', 'Finland', 'Republic of Finland', 'Republic of Finland'),
(76, 'FR', 'France', 'French Republic', 'FRA', '250', 'yes', '33', '.fr', 'France', 'France', 'French Republic', 'French Republic'),
(77, 'GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'no', '594', '.gf', 'French Guiana', 'French Guiana', 'French Guiana', 'French Guiana'),
(78, 'PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'no', '689', '.pf', 'French Polynesia', 'French Polynesia', 'French Polynesia', 'French Polynesia'),
(79, 'TF', 'French Southern Territories', 'French Southern Territories', 'ATF', '260', 'no', NULL, '.tf', 'French Southern Territories', 'French Southern Territories', 'French Southern Territories', 'French Southern Territories'),
(80, 'GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'yes', '241', '.ga', 'Gabon', 'Gabon', 'Gabonese Republic', 'Gabonese Republic'),
(81, 'GM', 'Gambia', 'Republic of The Gambia', 'GMB', '270', 'yes', '220', '.gm', 'Gambia', 'Gambia', 'Republic of The Gambia', 'Republic of The Gambia'),
(82, 'GE', 'Georgia', 'Georgia', 'GEO', '268', 'yes', '995', '.ge', 'Georgia', 'Georgia', 'Georgia', 'Georgia'),
(83, 'DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'yes', '49', '.de', 'Germany', 'Germany', 'Federal Republic of Germany', 'Federal Republic of Germany'),
(84, 'GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'yes', '233', '.gh', 'Ghana', 'Ghana', 'Republic of Ghana', 'Republic of Ghana'),
(85, 'GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'no', '350', '.gi', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar'),
(86, 'GR', 'Greece', 'Hellenic Republic', 'GRC', '300', 'yes', '30', '.gr', 'Greece', 'Greece', 'Hellenic Republic', 'Hellenic Republic'),
(87, 'GL', 'Greenland', 'Greenland', 'GRL', '304', 'no', '299', '.gl', 'Greenland', 'Greenland', 'Greenland', 'Greenland'),
(88, 'GD', 'Grenada', 'Grenada', 'GRD', '308', 'yes', '1+473', '.gd', 'Grenada', 'Grenada', 'Grenada', 'Grenada'),
(89, 'GP', 'Guadaloupe', 'Guadeloupe', 'GLP', '312', 'no', '590', '.gp', 'Guadaloupe', 'Guadaloupe', 'Guadeloupe', 'Guadeloupe'),
(90, 'GU', 'Guam', 'Guam', 'GUM', '316', 'no', '1+671', '.gu', 'Guam', 'Guam', 'Guam', 'Guam'),
(91, 'GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', 'yes', '502', '.gt', 'Guatemala', 'Guatemala', 'Republic of Guatemala', 'Republic of Guatemala'),
(92, 'GG', 'Guernsey', 'Guernsey', 'GGY', '831', 'no', '44', '.gg', 'Guernsey', 'Guernsey', 'Guernsey', 'Guernsey'),
(93, 'GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'yes', '224', '.gn', 'Guinea', 'Guinea', 'Republic of Guinea', 'Republic of Guinea'),
(94, 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'yes', '245', '.gw', 'Guinea-Bissau', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'Republic of Guinea-Bissau'),
(95, 'GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'yes', '592', '.gy', 'Guyana', 'Guyana', 'Co-operative Republic of Guyana', 'Co-operative Republic of Guyana'),
(96, 'HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'yes', '509', '.ht', 'Haiti', 'Haiti', 'Republic of Haiti', 'Republic of Haiti'),
(97, 'HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'no', 'NONE', '.hm', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands'),
(98, 'HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'yes', '504', '.hn', 'Honduras', 'Honduras', 'Republic of Honduras', 'Republic of Honduras'),
(99, 'HK', 'Hong Kong', 'Hong Kong', 'HKG', '344', 'no', '852', '.hk', 'Hong Kong', 'Hong Kong', 'Hong Kong', 'Hong Kong'),
(100, 'HU', 'Hungary', 'Hungary', 'HUN', '348', 'yes', '36', '.hu', 'Hungary', 'Hungary', 'Hungary', 'Hungary'),
(101, 'IS', 'Iceland', 'Republic of Iceland', 'ISL', '352', 'yes', '354', '.is', 'Iceland', 'Iceland', 'Republic of Iceland', 'Republic of Iceland'),
(102, 'IN', 'India', 'Republic of India', 'IND', '356', 'yes', '91', '.in', 'India', 'India', 'Republic of India', 'Republic of India'),
(103, 'ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'yes', '62', '.id', 'Indonesia', 'Indonesia', 'Republic of Indonesia', 'Republic of Indonesia'),
(104, 'IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'yes', '98', '.ir', 'Iran', 'Iran', 'Islamic Republic of Iran', 'Islamic Republic of Iran'),
(105, 'IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'yes', '964', '.iq', 'Iraq', 'Iraq', 'Republic of Iraq', 'Republic of Iraq'),
(106, 'IE', 'Ireland', 'Ireland', 'IRL', '372', 'yes', '353', '.ie', 'Ireland', 'Ireland', 'Ireland', 'Ireland'),
(107, 'IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'no', '44', '.im', 'Isle of Man', 'Isle of Man', 'Isle of Man', 'Isle of Man'),
(108, 'IL', 'Israel', 'State of Israel', 'ISR', '376', 'yes', '972', '.il', 'Israel', 'Israel', 'State of Israel', 'State of Israel'),
(109, 'IT', 'Italy', 'Italian Republic', 'ITA', '380', 'yes', '39', '.jm', 'Italy', 'Italy', 'Italian Republic', 'Italian Republic'),
(110, 'JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'yes', '1+876', '.jm', 'Jamaica', 'Jamaica', 'Jamaica', 'Jamaica'),
(111, 'JP', 'Japan', 'Japan', 'JPN', '392', 'yes', '81', '.jp', 'Japan', 'Japan', 'Japan', 'Japan'),
(112, 'JE', 'Jersey', 'The Bailiwick of Jersey', 'JEY', '832', 'no', '44', '.je', 'Jersey', 'Jersey', 'The Bailiwick of Jersey', 'The Bailiwick of Jersey'),
(113, 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'yes', '962', '.jo', 'Jordan', 'Jordan', 'Hashemite Kingdom of Jordan', 'Hashemite Kingdom of Jordan'),
(114, 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'yes', '7', '.kz', 'Kazakhstan', 'Kazakhstan', 'Republic of Kazakhstan', 'Republic of Kazakhstan'),
(115, 'KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'yes', '254', '.ke', 'Kenya', 'Kenya', 'Republic of Kenya', 'Republic of Kenya'),
(116, 'KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'yes', '686', '.ki', 'Kiribati', 'Kiribati', 'Republic of Kiribati', 'Republic of Kiribati'),
(117, 'XK', 'Kosovo', 'Republic of Kosovo', '---', '---', 'some', '381', '', 'Kosovo', 'Kosovo', 'Republic of Kosovo', 'Republic of Kosovo'),
(118, 'KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'yes', '965', '.kw', 'Kuwait', 'Kuwait', 'State of Kuwait', 'State of Kuwait'),
(119, 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', 'KGZ', '417', 'yes', '996', '.kg', 'Kyrgyzstan', 'Kyrgyzstan', 'Kyrgyz Republic', 'Kyrgyz Republic'),
(120, 'LA', 'Laos', 'Lao People''s Democratic Republic', 'LAO', '418', 'yes', '856', '.la', 'Laos', 'Laos', 'Lao People''s Democratic Republic', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'yes', '371', '.lv', 'Latvia', 'Latvia', 'Republic of Latvia', 'Republic of Latvia'),
(122, 'LB', 'Lebanon', 'Republic of Lebanon', 'LBN', '422', 'yes', '961', '.lb', 'Lebanon', 'Lebanon', 'Republic of Lebanon', 'Republic of Lebanon'),
(123, 'LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'yes', '266', '.ls', 'Lesotho', 'Lesotho', 'Kingdom of Lesotho', 'Kingdom of Lesotho'),
(124, 'LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'yes', '231', '.lr', 'Liberia', 'Liberia', 'Republic of Liberia', 'Republic of Liberia'),
(125, 'LY', 'Libya', 'Libya', 'LBY', '434', 'yes', '218', '.ly', 'Libya', 'Libya', 'Libya', 'Libya'),
(126, 'LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'yes', '423', '.li', 'Liechtenstein', 'Liechtenstein', 'Principality of Liechtenstein', 'Principality of Liechtenstein'),
(127, 'LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'yes', '370', '.lt', 'Lithuania', 'Lithuania', 'Republic of Lithuania', 'Republic of Lithuania'),
(128, 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'yes', '352', '.lu', 'Luxembourg', 'Luxembourg', 'Grand Duchy of Luxembourg', 'Grand Duchy of Luxembourg'),
(129, 'MO', 'Macao', 'The Macao Special Administrative Region', 'MAC', '446', 'no', '853', '.mo', 'Macao', 'Macao', 'The Macao Special Administrative Region', 'The Macao Special Administrative Region'),
(130, 'MK', 'Macedonia', 'The Former Yugoslav Republic of Macedonia', 'MKD', '807', 'yes', '389', '.mk', 'Macedonia', 'Macedonia', 'The Former Yugoslav Republic of Macedonia', 'The Former Yugoslav Republic of Macedonia'),
(131, 'MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'yes', '261', '.mg', 'Madagascar', 'Madagascar', 'Republic of Madagascar', 'Republic of Madagascar'),
(132, 'MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'yes', '265', '.mw', 'Malawi', 'Malawi', 'Republic of Malawi', 'Republic of Malawi'),
(133, 'MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'yes', '60', '.my', 'Malaysia', 'Malaysia', 'Malaysia', 'Malaysia'),
(134, 'MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'yes', '960', '.mv', 'Maldives', 'Maldives', 'Republic of Maldives', 'Republic of Maldives'),
(135, 'ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'yes', '223', '.ml', 'Mali', 'Mali', 'Republic of Mali', 'Republic of Mali'),
(136, 'MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'yes', '356', '.mt', 'Malta', 'Malta', 'Republic of Malta', 'Republic of Malta'),
(137, 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'yes', '692', '.mh', 'Marshall Islands', 'Marshall Islands', 'Republic of the Marshall Islands', 'Republic of the Marshall Islands'),
(138, 'MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'no', '596', '.mq', 'Martinique', 'Martinique', 'Martinique', 'Martinique'),
(139, 'MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'yes', '222', '.mr', 'Mauritania', 'Mauritania', 'Islamic Republic of Mauritania', 'Islamic Republic of Mauritania'),
(140, 'MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'yes', '230', '.mu', 'Mauritius', 'Mauritius', 'Republic of Mauritius', 'Republic of Mauritius'),
(141, 'YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'no', '262', '.yt', 'Mayotte', 'Mayotte', 'Mayotte', 'Mayotte'),
(142, 'MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'yes', '52', '.mx', 'Mexico', 'Mexico', 'United Mexican States', 'United Mexican States'),
(143, 'FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'yes', '691', '.fm', 'Micronesia', 'Micronesia', 'Federated States of Micronesia', 'Federated States of Micronesia'),
(144, 'MD', 'Moldava', 'Republic of Moldova', 'MDA', '498', 'yes', '373', '.md', 'Moldava', 'Moldava', 'Republic of Moldova', 'Republic of Moldova'),
(145, 'MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'yes', '377', '.mc', 'Monaco', 'Monaco', 'Principality of Monaco', 'Principality of Monaco'),
(146, 'MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'yes', '976', '.mn', 'Mongolia', 'Mongolia', 'Mongolia', 'Mongolia'),
(147, 'ME', 'Montenegro', 'Montenegro', 'MNE', '499', 'yes', '382', '.me', 'Montenegro', 'Montenegro', 'Montenegro', 'Montenegro'),
(148, 'MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'no', '1+664', '.ms', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat'),
(149, 'MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'yes', '212', '.ma', 'Morocco', 'Morocco', 'Kingdom of Morocco', 'Kingdom of Morocco'),
(150, 'MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'yes', '258', '.mz', 'Mozambique', 'Mozambique', 'Republic of Mozambique', 'Republic of Mozambique'),
(151, 'MM', 'Myanmar (Burma)', 'Republic of the Union of Myanmar', 'MMR', '104', 'yes', '95', '.mm', 'Myanmar (Burma)', 'Myanmar (Burma)', 'Republic of the Union of Myanmar', 'Republic of the Union of Myanmar'),
(152, 'NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'yes', '264', '.na', 'Namibia', 'Namibia', 'Republic of Namibia', 'Republic of Namibia'),
(153, 'NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'yes', '674', '.nr', 'Nauru', 'Nauru', 'Republic of Nauru', 'Republic of Nauru'),
(154, 'NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', '524', 'yes', '977', '.np', 'Nepal', 'Nepal', 'Federal Democratic Republic of Nepal', 'Federal Democratic Republic of Nepal'),
(155, 'NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'yes', '31', '.nl', 'Netherlands', 'Netherlands', 'Kingdom of the Netherlands', 'Kingdom of the Netherlands'),
(156, 'NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'no', '687', '.nc', 'New Caledonia', 'New Caledonia', 'New Caledonia', 'New Caledonia'),
(157, 'NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'yes', '64', '.nz', 'New Zealand', 'New Zealand', 'New Zealand', 'New Zealand'),
(158, 'NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'yes', '505', '.ni', 'Nicaragua', 'Nicaragua', 'Republic of Nicaragua', 'Republic of Nicaragua'),
(159, 'NE', 'Niger', 'Republic of Niger', 'NER', '562', 'yes', '227', '.ne', 'Niger', 'Niger', 'Republic of Niger', 'Republic of Niger'),
(160, 'NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'yes', '234', '.ng', 'Nigeria', 'Nigeria', 'Federal Republic of Nigeria', 'Federal Republic of Nigeria'),
(161, 'NU', 'Niue', 'Niue', 'NIU', '570', 'some', '683', '.nu', 'Niue', 'Niue', 'Niue', 'Niue'),
(162, 'NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'no', '672', '.nf', 'Norfolk Island', 'Norfolk Island', 'Norfolk Island', 'Norfolk Island'),
(163, 'KP', 'North Korea', 'Democratic People''s Republic of Korea', 'PRK', '408', 'yes', '850', '.kp', 'North Korea', 'North Korea', 'Democratic People''s Republic of Korea', 'Democratic People''s Republic of Korea'),
(164, 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', 'MNP', '580', 'no', '1+670', '.mp', 'Northern Mariana Islands', 'Northern Mariana Islands', 'Northern Mariana Islands', 'Northern Mariana Islands'),
(165, 'NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'yes', '47', '.no', 'Norway', 'Norway', 'Kingdom of Norway', 'Kingdom of Norway'),
(166, 'OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'yes', '968', '.om', 'Oman', 'Oman', 'Sultanate of Oman', 'Sultanate of Oman'),
(167, 'PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'yes', '92', '.pk', 'Pakistan', 'Pakistan', 'Islamic Republic of Pakistan', 'Islamic Republic of Pakistan'),
(168, 'PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'yes', '680', '.pw', 'Palau', 'Palau', 'Republic of Palau', 'Republic of Palau'),
(169, 'PS', 'Palestine', 'State of Palestine (or Occupied Palestinian Territory)', 'PSE', '275', 'some', '970', '.ps', 'Palestine', 'Palestine', 'State of Palestine (or Occupied Palestinian Territory)', 'State of Palestine (or Occupied Palestinian Territory)'),
(170, 'PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'yes', '507', '.pa', 'Panama', 'Panama', 'Republic of Panama', 'Republic of Panama'),
(171, 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'yes', '675', '.pg', 'Papua New Guinea', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'Independent State of Papua New Guinea'),
(172, 'PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'yes', '595', '.py', 'Paraguay', 'Paraguay', 'Republic of Paraguay', 'Republic of Paraguay'),
(173, 'PE', 'Peru', 'Republic of Peru', 'PER', '604', 'yes', '51', '.pe', 'Peru', 'Peru', 'Republic of Peru', 'Republic of Peru'),
(174, 'PH', 'Phillipines', 'Republic of the Philippines', 'PHL', '608', 'yes', '63', '.ph', 'Phillipines', 'Phillipines', 'Republic of the Philippines', 'Republic of the Philippines'),
(175, 'PN', 'Pitcairn', 'Pitcairn', 'PCN', '612', 'no', 'NONE', '.pn', 'Pitcairn', 'Pitcairn', 'Pitcairn', 'Pitcairn'),
(176, 'PL', 'Poland', 'Republic of Poland', 'POL', '616', 'yes', '48', '.pl', 'Poland', 'Poland', 'Republic of Poland', 'Republic of Poland'),
(177, 'PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'yes', '351', '.pt', 'Portugal', 'Portugal', 'Portuguese Republic', 'Portuguese Republic'),
(178, 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'no', '1+939', '.pr', 'Puerto Rico', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'Commonwealth of Puerto Rico'),
(179, 'QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'yes', '974', '.qa', 'Qatar', 'Qatar', 'State of Qatar', 'State of Qatar'),
(180, 'RE', 'Reunion', 'R&eacute;union', 'REU', '638', 'no', '262', '.re', 'Reunion', 'Reunion', 'R&eacute;union', 'R&eacute;union'),
(181, 'RO', 'Romania', 'Romania', 'ROU', '642', 'yes', '40', '.ro', 'Romania', 'Romania', 'Romania', 'Romania'),
(182, 'RU', 'Russia', 'Russian Federation', 'RUS', '643', 'yes', '7', '.ru', 'Russia', 'Russia', 'Russian Federation', 'Russian Federation'),
(183, 'RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'yes', '250', '.rw', 'Rwanda', 'Rwanda', 'Republic of Rwanda', 'Republic of Rwanda'),
(184, 'BL', 'Saint Barthelemy', 'Saint Barth&eacute;lemy', 'BLM', '652', 'no', '590', '.bl', 'Saint Barthelemy', 'Saint Barthelemy', 'Saint Barth&eacute;lemy', 'Saint Barth&eacute;lemy'),
(185, 'SH', 'Saint Helena', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', '654', 'no', '290', '.sh', 'Saint Helena', 'Saint Helena', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha'),
(186, 'KN', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', 'KNA', '659', 'yes', '1+869', '.kn', 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', 'Federation of Saint Christopher and Nevis'),
(187, 'LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'yes', '1+758', '.lc', 'Saint Lucia', 'Saint Lucia', 'Saint Lucia', 'Saint Lucia'),
(188, 'MF', 'Saint Martin', 'Saint Martin', 'MAF', '663', 'no', '590', '.mf', 'Saint Martin', 'Saint Martin', 'Saint Martin', 'Saint Martin'),
(189, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'no', '508', '.pm', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon'),
(190, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'yes', '1+784', '.vc', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines'),
(191, 'WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'yes', '685', '.ws', 'Samoa', 'Samoa', 'Independent State of Samoa', 'Independent State of Samoa'),
(192, 'SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', 'yes', '378', '.sm', 'San Marino', 'San Marino', 'Republic of San Marino', 'Republic of San Marino'),
(193, 'ST', 'Sao Tome and Principe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'STP', '678', 'yes', '239', '.st', 'Sao Tome and Principe', 'Sao Tome and Principe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe'),
(194, 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'yes', '966', '.sa', 'Saudi Arabia', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'Kingdom of Saudi Arabia'),
(195, 'SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'yes', '221', '.sn', 'Senegal', 'Senegal', 'Republic of Senegal', 'Republic of Senegal'),
(196, 'RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'yes', '381', '.rs', 'Serbia', 'Serbia', 'Republic of Serbia', 'Republic of Serbia'),
(197, 'SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'yes', '248', '.sc', 'Seychelles', 'Seychelles', 'Republic of Seychelles', 'Republic of Seychelles'),
(198, 'SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'yes', '232', '.sl', 'Sierra Leone', 'Sierra Leone', 'Republic of Sierra Leone', 'Republic of Sierra Leone'),
(199, 'SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'yes', '65', '.sg', 'Singapore', 'Singapore', 'Republic of Singapore', 'Republic of Singapore'),
(200, 'SX', 'Sint Maarten', 'Sint Maarten', 'SXM', '534', 'no', '1+721', '.sx', 'Sint Maarten', 'Sint Maarten', 'Sint Maarten', 'Sint Maarten'),
(201, 'SK', 'Slovakia', 'Slovak Republic', 'SVK', '703', 'yes', '421', '.sk', 'Slovakia', 'Slovakia', 'Slovak Republic', 'Slovak Republic'),
(202, 'SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'yes', '386', '.si', 'Slovenia', 'Slovenia', 'Republic of Slovenia', 'Republic of Slovenia'),
(203, 'SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '090', 'yes', '677', '.sb', 'Solomon Islands', 'Solomon Islands', 'Solomon Islands', 'Solomon Islands'),
(204, 'SO', 'Somalia', 'Somali Republic', 'SOM', '706', 'yes', '252', '.so', 'Somalia', 'Somalia', 'Somali Republic', 'Somali Republic'),
(205, 'ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'yes', '27', '.za', 'South Africa', 'South Africa', 'Republic of South Africa', 'Republic of South Africa'),
(206, 'GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'no', '500', '.gs', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands'),
(207, 'KR', 'South Korea', 'Republic of Korea', 'KOR', '410', 'yes', '82', '.kr', 'South Korea', 'South Korea', 'Republic of Korea', 'Republic of Korea'),
(208, 'SS', 'South Sudan', 'Republic of South Sudan', 'SSD', '728', 'yes', '211', '.ss', 'South Sudan', 'South Sudan', 'Republic of South Sudan', 'Republic of South Sudan'),
(209, 'ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'yes', '34', '.es', 'Spain', 'Spain', 'Kingdom of Spain', 'Kingdom of Spain'),
(210, 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'yes', '94', '.lk', 'Sri Lanka', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'Democratic Socialist Republic of Sri Lanka'),
(211, 'SD', 'Sudan', 'Republic of the Sudan', 'SDN', '729', 'yes', '249', '.sd', 'Sudan', 'Sudan', 'Republic of the Sudan', 'Republic of the Sudan'),
(212, 'SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'yes', '597', '.sr', 'Suriname', 'Suriname', 'Republic of Suriname', 'Republic of Suriname'),
(213, 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'SJM', '744', 'no', '47', '.sj', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen'),
(214, 'SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', '748', 'yes', '268', '.sz', 'Swaziland', 'Swaziland', 'Kingdom of Swaziland', 'Kingdom of Swaziland'),
(215, 'SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'yes', '46', '.se', 'Sweden', 'Sweden', 'Kingdom of Sweden', 'Kingdom of Sweden'),
(216, 'CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'yes', '41', '.ch', 'Switzerland', 'Switzerland', 'Swiss Confederation', 'Swiss Confederation'),
(217, 'SY', 'Syria', 'Syrian Arab Republic', 'SYR', '760', 'yes', '963', '.sy', 'Syria', 'Syria', 'Syrian Arab Republic', 'Syrian Arab Republic'),
(218, 'TW', 'Taiwan', 'Republic of China (Taiwan)', 'TWN', '158', 'former', '886', '.tw', 'Taiwan', 'Taiwan', 'Republic of China (Taiwan)', 'Republic of China (Taiwan)'),
(219, 'TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'yes', '992', '.tj', 'Tajikistan', 'Tajikistan', 'Republic of Tajikistan', 'Republic of Tajikistan'),
(220, 'TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'yes', '255', '.tz', 'Tanzania', 'Tanzania', 'United Republic of Tanzania', 'United Republic of Tanzania'),
(221, 'TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'yes', '66', '.th', 'Thailand', 'Thailand', 'Kingdom of Thailand', 'Kingdom of Thailand'),
(222, 'TL', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'yes', '670', '.tl', 'Timor-Leste (East Timor)', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', 'Democratic Republic of Timor-Leste'),
(223, 'TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'yes', '228', '.tg', 'Togo', 'Togo', 'Togolese Republic', 'Togolese Republic'),
(224, 'TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'no', '690', '.tk', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau'),
(225, 'TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'yes', '676', '.to', 'Tonga', 'Tonga', 'Kingdom of Tonga', 'Kingdom of Tonga'),
(226, 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'yes', '1+868', '.tt', 'Trinidad and Tobago', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'Republic of Trinidad and Tobago'),
(227, 'TN', 'Tunisia', 'Republic of Tunisia', 'TUN', '788', 'yes', '216', '.tn', 'Tunisia', 'Tunisia', 'Republic of Tunisia', 'Republic of Tunisia'),
(228, 'TR', 'Turkey', 'Republic of Turkey', 'TUR', '792', 'yes', '90', '.tr', 'Turkey', 'Turkey', 'Republic of Turkey', 'Republic of Turkey'),
(229, 'TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'yes', '993', '.tm', 'Turkmenistan', 'Turkmenistan', 'Turkmenistan', 'Turkmenistan'),
(230, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'no', '1+649', '.tc', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Islands'),
(231, 'TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'yes', '688', '.tv', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu'),
(232, 'UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'yes', '256', '.ug', 'Uganda', 'Uganda', 'Republic of Uganda', 'Republic of Uganda'),
(233, 'UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'yes', '380', '.ua', 'Ukraine', 'Ukraine', 'Ukraine', 'Ukraine'),
(234, 'AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'yes', '971', '.ae', 'United Arab Emirates', 'United Arab Emirates', 'United Arab Emirates', 'United Arab Emirates'),
(235, 'GB', 'United Kingdom', 'United Kingdom of Great Britain and Nothern Ireland', 'GBR', '826', 'yes', '44', '.uk', 'United Kingdom', 'United Kingdom', 'United Kingdom of Great Britain and Nothern Ireland', 'United Kingdom of Great Britain and Nothern Ireland'),
(236, 'US', 'United States', 'United States of America', 'USA', '840', 'yes', '1', '.us', 'United States', 'United States', 'United States of America', 'United States of America'),
(237, 'UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'no', 'NONE', 'NONE', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands'),
(238, 'UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'yes', '598', '.uy', 'Uruguay', 'Uruguay', 'Eastern Republic of Uruguay', 'Eastern Republic of Uruguay'),
(239, 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'yes', '998', '.uz', 'Uzbekistan', 'Uzbekistan', 'Republic of Uzbekistan', 'Republic of Uzbekistan'),
(240, 'VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'yes', '678', '.vu', 'Vanuatu', 'Vanuatu', 'Republic of Vanuatu', 'Republic of Vanuatu'),
(241, 'VA', 'Vatican City', 'State of the Vatican City', 'VAT', '336', 'no', '39', '.va', 'Vatican City', 'Vatican City', 'State of the Vatican City', 'State of the Vatican City'),
(242, 'VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'yes', '58', '.ve', 'Venezuela', 'Venezuela', 'Bolivarian Republic of Venezuela', 'Bolivarian Republic of Venezuela'),
(243, 'VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'yes', '84', '.vn', 'Vietnam', 'Vietnam', 'Socialist Republic of Vietnam', 'Socialist Republic of Vietnam'),
(244, 'VG', 'Virgin Islands, British', 'British Virgin Islands', 'VGB', '092', 'no', '1+284', '.vg', 'Virgin Islands, British', 'Virgin Islands, British', 'British Virgin Islands', 'British Virgin Islands'),
(245, 'VI', 'Virgin Islands, US', 'Virgin Islands of the United States', 'VIR', '850', 'no', '1+340', '.vi', 'Virgin Islands, US', 'Virgin Islands, US', 'Virgin Islands of the United States', 'Virgin Islands of the United States'),
(246, 'WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '876', 'no', '681', '.wf', 'Wallis and Futuna', 'Wallis and Futuna', 'Wallis and Futuna', 'Wallis and Futuna'),
(247, 'EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'no', '212', '.eh', 'Western Sahara', 'Western Sahara', 'Western Sahara', 'Western Sahara'),
(248, 'YE', 'Yemen', 'Republic of Yemen', 'YEM', '887', 'yes', '967', '.ye', 'Yemen', 'Yemen', 'Republic of Yemen', 'Republic of Yemen'),
(249, 'ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'yes', '260', '.zm', 'Zambia', 'Zambia', 'Republic of Zambia', 'Republic of Zambia'),
(250, 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'yes', '263', '.zw', 'Zimbabwe', 'Zimbabwe', 'Republic of Zimbabwe', 'Republic of Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `ds_feedback`
--

CREATE TABLE IF NOT EXISTS `ds_feedback` (
  `id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ST01',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_feedback`
--

INSERT INTO `ds_feedback` (`id`, `store_id`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 5, 'Great Service !!!', 'ST01', '2015-05-16 15:07:02', '2015-05-16 15:07:02'),
(4, 20, 5, 'Very good Service', 'ST01', '2015-05-23 06:26:33', '2015-05-23 06:26:33'),
(5, 27, 5, 'Awesome! Great!', 'ST01', '2015-05-24 01:11:26', '2015-05-24 01:11:26'),
(6, 21, 5, 'very Kind, and Happy.', 'ST01', '2015-05-24 01:12:26', '2015-05-24 01:12:26'),
(7, 18, 5, 'Great World!', 'ST01', '2015-05-24 01:13:42', '2015-05-24 01:13:42'),
(8, 6, 1, 'He did supported. Thanks', 'ST01', '2015-05-26 04:52:26', '2015-05-26 04:52:26'),
(9, 46, 1, 'Good Service', 'ST01', '2015-06-23 12:22:58', '2015-06-23 12:22:58'),
(10, 42, 1, 'Awesome! Fanstic!', 'ST01', '2015-06-25 11:42:19', '2015-06-25 11:42:19'),
(11, 70, 11, '', 'ST01', '2016-02-22 09:11:57', '2016-02-22 09:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `ds_group`
--

CREATE TABLE IF NOT EXISTS `ds_group` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_once` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_group`
--

INSERT INTO `ds_group` (`id`, `company_id`, `name`, `is_once`, `created_at`, `updated_at`) VALUES
(1, 20, '', 1, '2016-01-20 02:37:30', '2016-01-20 02:37:30'),
(2, 20, '', 1, '2016-01-20 02:38:06', '2016-01-20 02:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `ds_help`
--

CREATE TABLE IF NOT EXISTS `ds_help` (
  `id` int(11) NOT NULL,
  `titleen` text NOT NULL,
  `titleit` text NOT NULL,
  `titlees` text NOT NULL,
  `contenten` text NOT NULL,
  `contentit` text NOT NULL,
  `contentes` text NOT NULL,
  `status` smallint(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_howitworks`
--

CREATE TABLE IF NOT EXISTS `ds_howitworks` (
  `id` int(11) NOT NULL,
  `titleen` text NOT NULL,
  `titleit` text NOT NULL,
  `titlees` text NOT NULL,
  `contenten` text NOT NULL,
  `contentit` text NOT NULL,
  `contentes` text NOT NULL,
  `image` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` smallint(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_howitworks`
--

INSERT INTO `ds_howitworks` (`id`, `titleen`, `titleit`, `titlees`, `contenten`, `contentit`, `contentes`, `image`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dsdsd', 'dsdsds', 'dsdsddsds', '<div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div><div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div><div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div><div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div>', '<div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div><div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div><div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div><div>ghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghghgh</div>', 'ddsdsd', '', 'Professional', 0, '2016-02-03 10:11:16', '2016-02-03 04:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `ds_languages`
--

CREATE TABLE IF NOT EXISTS `ds_languages` (
  `id` int(5) unsigned NOT NULL,
  `bibliographical` char(3) NOT NULL,
  `terminological` char(3) DEFAULT NULL,
  `alpha2` char(2) DEFAULT NULL,
  `name` varchar(80) NOT NULL,
  `nameit` varchar(80) NOT NULL,
  `namees` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1506 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ds_languages`
--

INSERT INTO `ds_languages` (`id`, `bibliographical`, `terminological`, `alpha2`, `name`, `nameit`, `namees`) VALUES
(1023, 'aar', '', 'aa', 'Afar', 'afar\r', 'Afar'),
(1024, 'abk', '', 'ab', 'Abkhazian', 'abkhaze\r', 'Abkhazian'),
(1031, 'afr', '', 'af', 'Afrikaans', 'afrikaans\r', 'Afrikaans'),
(1033, 'aka', '', 'ak', 'Akan', 'akan\r', 'Akan'),
(1035, 'alb', 'sqi', 'sq', 'Albanian', 'albanais\r', 'Albanian'),
(1039, 'amh', '', 'am', 'Amharic', 'amharique\r', 'Amharic'),
(1043, 'ara', '', 'ar', 'Arabic', 'arabe\r', 'Arabic'),
(1045, 'arg', '', 'an', 'Aragonese', 'aragonais\r', 'Aragonese'),
(1046, 'arm', 'hye', 'hy', 'Armenian', 'armÃ©nien\r', 'Armenian'),
(1051, 'asm', '', 'as', 'Assamese', 'assamais\r', 'Assamese'),
(1055, 'ava', '', 'av', 'Avaric', 'avar\r', 'Avaric'),
(1056, 'ave', '', 'ae', 'Avestan', 'avestique\r', 'Avestan'),
(1058, 'aym', '', 'ay', 'Aymara', 'aymara\r', 'Aymara'),
(1059, 'aze', '', 'az', 'Azerbaijani', 'azÃ©ri\r', 'Azerbaijani'),
(1062, 'bak', '', 'ba', 'Bashkir', 'bachkir\r', 'Bashkir'),
(1064, 'bam', '', 'bm', 'Bambara', 'bambara\r', 'Bambara'),
(1066, 'baq', 'eus', 'eu', 'Basque', 'basque\r', 'Basque'),
(1070, 'bel', '', 'be', 'Belarusian', 'biÃ©lorusse\r', 'Belarusian'),
(1072, 'ben', '', 'bn', 'Bengali', 'bengali\r', 'Bengali'),
(1075, 'bih', '', 'bh', 'Bihari languages', 'langues biharis\r', 'Bihari languages'),
(1078, 'bis', '', 'bi', 'Bislama', 'bichlamar\r', 'Bislama'),
(1081, 'bos', '', 'bs', 'Bosnian', 'bosniaque\r', 'Bosnian'),
(1083, 'bre', '', 'br', 'Breton', 'breton\r', 'Breton'),
(1087, 'bul', '', 'bg', 'Bulgarian', 'bulgare\r', 'Bulgarian'),
(1088, 'bur', 'mya', 'my', 'Burmese', 'birman\r', 'Burmese'),
(1093, 'cat', '', 'ca', 'Catalan; Valencian', 'catalan; valencien\r', 'Catalan; Valencian'),
(1097, 'cha', '', 'ch', 'Chamorro', 'chamorro\r', 'Chamorro'),
(1099, 'che', '', 'ce', 'Chechen', 'tchÃ©tchÃ¨ne\r', 'Chechen'),
(1101, 'chi', 'zho', 'zh', 'Chinese', 'chinois\r', 'Chinese'),
(1108, 'chu', '', 'cu', 'Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic', 'slavon d''Ã©glise; vieux slave; slavon liturgique; vieux bulgare\r', 'Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic'),
(1109, 'chv', '', 'cv', 'Chuvash', 'tchouvache\r', 'Chuvash'),
(1113, 'cor', '', 'kw', 'Cornish', 'cornique\r', 'Cornish'),
(1114, 'cos', '', 'co', 'Corsican', 'corse\r', 'Corsican'),
(1118, 'cre', '', 'cr', 'Cree', 'cree\r', 'Cree'),
(1123, 'cze', 'ces', 'cs', 'Czech', 'tchÃ¨que\r', 'Czech'),
(1125, 'dan', '', 'da', 'Danish', 'danois\r', 'Danish'),
(1132, 'div', '', 'dv', 'Divehi; Dhivehi; Maldivian', 'maldivien\r', 'Divehi; Dhivehi; Maldivian'),
(1138, 'dut', 'nld', 'nl', 'Dutch; Flemish', 'nÃ©erlandais; flamand\r', 'Dutch; Flemish'),
(1140, 'dzo', '', 'dz', 'Dzongkha', 'dzongkha\r', 'Dzongkha'),
(1145, 'eng', '', 'en', 'English', 'anglais\r', 'English'),
(1147, 'epo', '', 'eo', 'Esperanto', 'espÃ©ranto\r', 'Esperanto'),
(1148, 'est', '', 'et', 'Estonian', 'estonien\r', 'Estonian'),
(1149, 'ewe', '', 'ee', 'Ewe', 'Ã©wÃ©\r', 'Ewe'),
(1152, 'fao', '', 'fo', 'Faroese', 'fÃ©roÃ¯en\r', 'Faroese'),
(1154, 'fij', '', 'fj', 'Fijian', 'fidjien\r', 'Fijian'),
(1156, 'fin', '', 'fi', 'Finnish', 'finnois\r', 'Finnish'),
(1159, 'fre', 'fra', 'fr', 'French', 'franÃ§ais\r', 'French'),
(1164, 'fry', '', 'fy', 'Western Frisian', 'frison occidental\r', 'Western Frisian'),
(1165, 'ful', '', 'ff', 'Fulah', 'peul\r', 'Fulah'),
(1171, 'geo', 'kat', 'ka', 'Georgian', 'gÃ©orgien\r', 'Georgian'),
(1172, 'ger', 'deu', 'de', 'German', 'allemand\r', 'German'),
(1175, 'gla', '', 'gd', 'Gaelic; Scottish Gaelic', 'gaÃ©lique; gaÃ©lique Ã©cossais\r', 'Gaelic; Scottish Gaelic'),
(1176, 'gle', '', 'ga', 'Irish', 'irlandais\r', 'Irish'),
(1177, 'glg', '', 'gl', 'Galician', 'galicien\r', 'Galician'),
(1178, 'glv', '', 'gv', 'Manx', 'manx; mannois\r', 'Manx'),
(1186, 'gre', 'ell', 'el', 'Greek, Modern (1453-)', 'grec moderne (aprÃ¨s 1453)\r', 'Greek, Modern (1453-)'),
(1187, 'grn', '', 'gn', 'Guarani', 'guarani\r', 'Guarani'),
(1189, 'guj', '', 'gu', 'Gujarati', 'goudjrati\r', 'Gujarati'),
(1192, 'hat', '', 'ht', 'Haitian; Haitian Creole', 'haÃ¯tien; crÃ©ole haÃ¯tien\r', 'Haitian; Haitian Creole'),
(1193, 'hau', '', 'ha', 'Hausa', 'haoussa\r', 'Hausa'),
(1195, 'heb', '', 'he', 'Hebrew', 'hÃ©breu\r', 'Hebrew'),
(1196, 'her', '', 'hz', 'Herero', 'herero\r', 'Herero'),
(1199, 'hin', '', 'hi', 'Hindi', 'hindi\r', 'Hindi'),
(1202, 'hmo', '', 'ho', 'Hiri Motu', 'hiri motu\r', 'Hiri Motu'),
(1203, 'hrv', '', 'hr', 'Croatian', 'croate\r', 'Croatian'),
(1205, 'hun', '', 'hu', 'Hungarian', 'hongrois\r', 'Hungarian'),
(1208, 'ibo', '', 'ig', 'Igbo', 'igbo\r', 'Igbo'),
(1209, 'ice', 'isl', 'is', 'Icelandic', 'islandais\r', 'Icelandic'),
(1210, 'ido', '', 'io', 'Ido', 'ido\r', 'Ido'),
(1211, 'iii', '', 'ii', 'Sichuan Yi; Nuosu', 'yi de Sichuan\r', 'Sichuan Yi; Nuosu'),
(1213, 'iku', '', 'iu', 'Inuktitut', 'inuktitut\r', 'Inuktitut'),
(1214, 'ile', '', 'ie', 'Interlingue; Occidental', 'interlingue\r', 'Interlingue; Occidental'),
(1216, 'ina', '', 'ia', 'Interlingua (International Auxiliary Language Association)', 'interlingua (langue auxiliaire internationale)\r', 'Interlingua (International Auxiliary Language Association)'),
(1218, 'ind', '', 'id', 'Indonesian', 'indonÃ©sien\r', 'Indonesian'),
(1221, 'ipk', '', 'ik', 'Inupiaq', 'inupiaq\r', 'Inupiaq'),
(1224, 'ita', '', 'it', 'Italian', 'italien\r', 'Italian'),
(1225, 'jav', '', 'jv', 'Javanese', 'javanais\r', 'Javanese'),
(1227, 'jpn', '', 'ja', 'Japanese', 'japonais\r', 'Japanese'),
(1233, 'kal', '', 'kl', 'Kalaallisut; Greenlandic', 'groenlandais\r', 'Kalaallisut; Greenlandic'),
(1235, 'kan', '', 'kn', 'Kannada', 'kannada\r', 'Kannada'),
(1237, 'kas', '', 'ks', 'Kashmiri', 'kashmiri\r', 'Kashmiri'),
(1238, 'kau', '', 'kr', 'Kanuri', 'kanouri\r', 'Kanuri'),
(1240, 'kaz', '', 'kk', 'Kazakh', 'kazakh\r', 'Kazakh'),
(1244, 'khm', '', 'km', 'Central Khmer', 'khmer central\r', 'Central Khmer'),
(1246, 'kik', '', 'ki', 'Kikuyu; Gikuyu', 'kikuyu\r', 'Kikuyu; Gikuyu'),
(1247, 'kin', '', 'rw', 'Kinyarwanda', 'rwanda\r', 'Kinyarwanda'),
(1248, 'kir', '', 'ky', 'Kirghiz; Kyrgyz', 'kirghiz\r', 'Kirghiz; Kyrgyz'),
(1251, 'kom', '', 'kv', 'Komi', 'kom\r', 'Komi'),
(1252, 'kon', '', 'kg', 'Kongo', 'kongo\r', 'Kongo'),
(1253, 'kor', '', 'ko', 'Korean', 'corÃ©en\r', 'Korean'),
(1260, 'kua', '', 'kj', 'Kuanyama; Kwanyama', 'kuanyama; kwanyama\r', 'Kuanyama; Kwanyama'),
(1262, 'kur', '', 'ku', 'Kurdish', 'kurde\r', 'Kurdish'),
(1267, 'lao', '', 'lo', 'Lao', 'lao\r', 'Lao'),
(1268, 'lat', '', 'la', 'Latin', 'latin\r', 'Latin'),
(1269, 'lav', '', 'lv', 'Latvian', 'letton\r', 'Latvian'),
(1271, 'lim', '', 'li', 'Limburgan; Limburger; Limburgish', 'limbourgeois\r', 'Limburgan; Limburger; Limburgish'),
(1272, 'lin', '', 'ln', 'Lingala', 'lingala\r', 'Lingala'),
(1273, 'lit', '', 'lt', 'Lithuanian', 'lituanien\r', 'Lithuanian'),
(1276, 'ltz', '', 'lb', 'Luxembourgish; Letzeburgesch', 'luxembourgeois\r', 'Luxembourgish; Letzeburgesch'),
(1278, 'lub', '', 'lu', 'Luba-Katanga', 'luba-katanga\r', 'Luba-Katanga'),
(1279, 'lug', '', 'lg', 'Ganda', 'ganda\r', 'Ganda'),
(1284, 'mac', 'mkd', 'mk', 'Macedonian', 'macÃ©donien\r', 'Macedonian'),
(1287, 'mah', '', 'mh', 'Marshallese', 'marshall\r', 'Marshallese'),
(1290, 'mal', '', 'ml', 'Malayalam', 'malayalam\r', 'Malayalam'),
(1292, 'mao', 'mri', 'mi', 'Maori', 'maori\r', 'Maori'),
(1294, 'mar', '', 'mr', 'Marathi', 'marathe\r', 'Marathi'),
(1296, 'may', 'msa', 'ms', 'Malay', 'malais\r', 'Malay'),
(1305, 'mlg', '', 'mg', 'Malagasy', 'malgache\r', 'Malagasy'),
(1306, 'mlt', '', 'mt', 'Maltese', 'maltais\r', 'Maltese'),
(1311, 'mon', '', 'mn', 'Mongolian', 'mongol\r', 'Mongolian'),
(1323, 'nau', '', 'na', 'Nauru', 'nauruan\r', 'Nauru'),
(1324, 'nav', '', 'nv', 'Navajo; Navaho', 'navaho\r', 'Navajo; Navaho'),
(1325, 'nbl', '', 'nr', 'Ndebele, South; South Ndebele', 'ndÃ©bÃ©lÃ© du Sud\r', 'Ndebele, South; South Ndebele'),
(1326, 'nde', '', 'nd', 'Ndebele, North; North Ndebele', 'ndÃ©bÃ©lÃ© du Nord\r', 'Ndebele, North; North Ndebele'),
(1327, 'ndo', '', 'ng', 'Ndonga', 'ndonga\r', 'Ndonga'),
(1329, 'nep', '', 'ne', 'Nepali', 'nÃ©palais\r', 'Nepali'),
(1334, 'nno', '', 'nn', 'Norwegian Nynorsk; Nynorsk, Norwegian', 'norvÃ©gien nynorsk; nynorsk, norvÃ©gien\r', 'Norwegian Nynorsk; Nynorsk, Norwegian'),
(1335, 'nob', '', 'nb', 'BokmÃ¥l, Norwegian; Norwegian BokmÃ¥l', 'norvÃ©gien bokmÃ¥l\r', 'BokmÃ¥l, Norwegian; Norwegian BokmÃ¥l'),
(1338, 'nor', '', 'no', 'Norwegian', 'norvÃ©gien\r', 'Norwegian'),
(1343, 'nya', '', 'ny', 'Chichewa; Chewa; Nyanja', 'chichewa; chewa; nyanja\r', 'Chichewa; Chewa; Nyanja'),
(1348, 'oci', '', 'oc', 'Occitan (post 1500); ProvenÃ§al', 'occitan (aprÃ¨s 1500); provenÃ§al\r', 'Occitan (post 1500); ProvenÃ§al'),
(1349, 'oji', '', 'oj', 'Ojibwa', 'ojibwa\r', 'Ojibwa'),
(1350, 'ori', '', 'or', 'Oriya', 'oriya\r', 'Oriya'),
(1351, 'orm', '', 'om', 'Oromo', 'galla\r', 'Oromo'),
(1353, 'oss', '', 'os', 'Ossetian; Ossetic', 'ossÃ¨te\r', 'Ossetian; Ossetic'),
(1360, 'pan', '', 'pa', 'Panjabi; Punjabi', 'pendjabi\r', 'Panjabi; Punjabi'),
(1364, 'per', 'fas', 'fa', 'Persian', 'persan\r', 'Persian'),
(1367, 'pli', '', 'pi', 'Pali', 'pali\r', 'Pali'),
(1368, 'pol', '', 'pl', 'Polish', 'polonais\r', 'Polish'),
(1370, 'por', '', 'pt', 'Portuguese', 'portugais\r', 'Portuguese'),
(1373, 'pus', '', 'ps', 'Pushto; Pashto', 'pachto\r', 'Pushto; Pashto'),
(1375, 'que', '', 'qu', 'Quechua', 'quechua\r', 'Quechua'),
(1380, 'roh', '', 'rm', 'Romansh', 'romanche\r', 'Romansh'),
(1382, 'rum', 'ron', 'ro', 'Romanian; Moldavian; Moldovan', 'roumain; moldave\r', 'Romanian; Moldavian; Moldovan'),
(1383, 'run', '', 'rn', 'Rundi', 'rundi\r', 'Rundi'),
(1385, 'rus', '', 'ru', 'Russian', 'russe\r', 'Russian'),
(1387, 'sag', '', 'sg', 'Sango', 'sango\r', 'Sango'),
(1392, 'san', '', 'sa', 'Sanskrit', 'sanskrit\r', 'Sanskrit'),
(1403, 'sin', '', 'si', 'Sinhala; Sinhalese', 'singhalais\r', 'Sinhala; Sinhalese'),
(1407, 'slo', 'slk', 'sk', 'Slovak', 'slovaque\r', 'Slovak'),
(1408, 'slv', '', 'sl', 'Slovenian', 'slovÃ¨ne\r', 'Slovenian'),
(1410, 'sme', '', 'se', 'Northern Sami', 'sami du Nord\r', 'Northern Sami'),
(1414, 'smo', '', 'sm', 'Samoan', 'samoan\r', 'Samoan'),
(1416, 'sna', '', 'sn', 'Shona', 'shona\r', 'Shona'),
(1417, 'snd', '', 'sd', 'Sindhi', 'sindhi\r', 'Sindhi'),
(1420, 'som', '', 'so', 'Somali', 'somali\r', 'Somali'),
(1422, 'sot', '', 'st', 'Sotho, Southern', 'sotho du Sud\r', 'Sotho, Southern'),
(1423, 'spa', '', 'es', 'Spanish; Castilian', 'espagnol; castillan\r', 'Spanish; Castilian'),
(1424, 'srd', '', 'sc', 'Sardinian', 'sarde\r', 'Sardinian'),
(1426, 'srp', '', 'sr', 'Serbian', 'serbe\r', 'Serbian'),
(1429, 'ssw', '', 'ss', 'Swati', 'swati\r', 'Swati'),
(1431, 'sun', '', 'su', 'Sundanese', 'soundanais\r', 'Sundanese'),
(1434, 'swa', '', 'sw', 'Swahili', 'swahili\r', 'Swahili'),
(1435, 'swe', '', 'sv', 'Swedish', 'suÃ©dois\r', 'Swedish'),
(1438, 'tah', '', 'ty', 'Tahitian', 'tahitien\r', 'Tahitian'),
(1440, 'tam', '', 'ta', 'Tamil', 'tamoul\r', 'Tamil'),
(1441, 'tat', '', 'tt', 'Tatar', 'tatar\r', 'Tatar'),
(1442, 'tel', '', 'te', 'Telugu', 'tÃ©lougou\r', 'Telugu'),
(1446, 'tgk', '', 'tg', 'Tajik', 'tadjik\r', 'Tajik'),
(1447, 'tgl', '', 'tl', 'Tagalog', 'tagalog\r', 'Tagalog'),
(1448, 'tha', '', 'th', 'Thai', 'thaÃ¯\r', 'Thai'),
(1449, 'tib', 'bod', 'bo', 'Tibetan', 'tibÃ©tain\r', 'Tibetan'),
(1451, 'tir', '', 'ti', 'Tigrinya', 'tigrigna\r', 'Tigrinya'),
(1458, 'ton', '', 'to', 'Tonga (Tonga Islands)', 'tongan (ÃŽles Tonga)\r', 'Tonga (Tonga Islands)'),
(1461, 'tsn', '', 'tn', 'Tswana', 'tswana\r', 'Tswana'),
(1462, 'tso', '', 'ts', 'Tsonga', 'tsonga\r', 'Tsonga'),
(1463, 'tuk', '', 'tk', 'Turkmen', 'turkmÃ¨ne\r', 'Turkmen'),
(1466, 'tur', '', 'tr', 'Turkish', 'turc\r', 'Turkish'),
(1469, 'twi', '', 'tw', 'Twi', 'twi\r', 'Twi'),
(1473, 'uig', '', 'ug', 'Uighur; Uyghur', 'ouÃ¯gour\r', 'Uighur; Uyghur'),
(1474, 'ukr', '', 'uk', 'Ukrainian', 'ukrainien\r', 'Ukrainian'),
(1477, 'urd', '', 'ur', 'Urdu', 'ourdou\r', 'Urdu'),
(1478, 'uzb', '', 'uz', 'Uzbek', 'ouszbek\r', 'Uzbek'),
(1480, 'ven', '', 've', 'Venda', 'venda\r', 'Venda'),
(1481, 'vie', '', 'vi', 'Vietnamese', 'vietnamien\r', 'Vietnamese'),
(1482, 'vol', '', 'vo', 'VolapÃ¼k', 'volapÃ¼k\r', 'VolapÃ¼k'),
(1488, 'wel', 'cym', 'cy', 'Welsh', 'gallois\r', 'Welsh'),
(1490, 'wln', '', 'wa', 'Walloon', 'wallon\r', 'Walloon'),
(1491, 'wol', '', 'wo', 'Wolof', 'wolof\r', 'Wolof'),
(1493, 'xho', '', 'xh', 'Xhosa', 'xhosa\r', 'Xhosa'),
(1496, 'yid', '', 'yi', 'Yiddish', 'yiddish\r', 'Yiddish'),
(1497, 'yor', '', 'yo', 'Yoruba', 'yoruba\r', 'Yoruba'),
(1503, 'zha', '', 'za', 'Zhuang; Chuang', 'zhuang; chuang\r', 'Zhuang; Chuang'),
(1505, 'zul', '', 'zu', 'Zulu', 'zoulou\r', 'Zulu');

-- --------------------------------------------------------

--
-- Table structure for table `ds_language_labels`
--

CREATE TABLE IF NOT EXISTS `ds_language_labels` (
  `id` int(11) NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `valueit` varchar(300) DEFAULT NULL,
  `value` varchar(300) DEFAULT NULL,
  `valuees` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=724 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_language_labels`
--

INSERT INTO `ds_language_labels` (`id`, `label`, `valueit`, `value`, `valuees`) VALUES
(1, 'Dashboard', 'Cruscotto', 'Dashboard', 'Tablero'),
(2, 'Dashboard will come soon!', 'Pannelo in arrivo!', 'Dashboard will come soon!', 'Dashboard vendrá pronto!'),
(3, 'Professional Management', 'Gestione Professionisti', 'Professionals Management', 'Gestión Profesionales'),
(4, 'Category Management', 'Gestione Categorie', 'Category Management', 'Gestión de Categorias'),
(5, 'Service Management', 'Gestione Servizi', 'Service Management', 'Gestión de Servicios'),
(6, 'Post Management', 'Gestione Post', 'Post Management', 'Gestión de Post'),
(7, 'World of Profession', 'Mondo delle Professioni', 'World of Professions', 'Mundo de las Profesiónes'),
(8, 'User Management', 'Gestione Utenti', 'User Management', 'Gestión de Usuarios'),
(9, 'Offer Management', 'Gestione Offerte', 'Offers Management', 'Gestión de Ofertas'),
(10, 'Loyalty Management', 'Gestione Loyalty', 'Loyalty Management', 'Gestión de Loyalty'),
(11, 'Office Management', 'Gestione Uffici', 'Offices Management', 'Gestión de Oficinas'),
(12, 'Plan Management', 'Gestione Piani', 'Plans Management', 'Gestión de Planos'),
(13, 'Professional', 'Professionista', 'Professional', 'Profesional'),
(14, 'List', 'Lista', 'List', 'Lista'),
(15, 'Professional List', 'Lista Professionisti', 'Professionals List', 'Lista Profesionalels'),
(16, 'Name', 'Nome', 'Name', 'Nombre'),
(17, 'Email', 'Email', 'Email', 'Email'),
(18, 'Phone', 'Telefono', 'Phone', 'Teléfono'),
(19, 'VAT ID', 'Partita Iva', 'VAT ID', 'RUC'),
(20, 'SMS', 'SMS', 'SMS', 'SMS'),
(21, 'Created At', 'Creato il', 'Created At', 'Creado en'),
(22, 'Edit', 'Modifica', 'Edit', 'Editar'),
(23, 'Feedback', 'Feedback', 'Feedback', 'Feedback'),
(24, 'Delete', 'Cancellare', 'Delete', 'Borrar'),
(25, 'Add New', 'Inserisci', 'Add New', 'Agregar nuevo'),
(26, 'Icon', 'Icona', 'Icon', 'Icono'),
(27, 'Sub Categories', 'Sotto Categorie', 'Sub Categories', 'Sub Categorías'),
(28, 'Description', 'Descrizione', 'Description', 'Descripción'),
(29, 'Create', 'Crea', 'Create', 'Crear'),
(30, 'Category', 'Categoria', 'Category', 'Categoría'),
(31, 'Password', 'Password', 'Password', 'Clave'),
(32, 'Country', 'Nazione', 'Country', 'País'),
(33, 'Languages', 'Lingue', 'Languages', 'Idiomas'),
(34, 'Hourly Rate', 'Tariffa oraria', 'Hourly Rate', 'Tarifa por hora'),
(35, 'Registered to', 'Registrato a', 'Registered to', 'Registrado a'),
(36, 'City of College or Order', 'Presso la Città', 'In the City of', 'En la Ciudad de'),
(37, 'Registration Number', 'Numero di registrazione', 'Registration Number', 'Numero de registro'),
(38, 'Keyword', 'Parola chiave', 'Keyword', 'Palabra clave'),
(39, 'Photo', 'Foto', 'Photo', 'Foto'),
(40, 'Select image', 'Seleziona immagine', 'Select image', 'Seleccionar imagen'),
(41, 'Change', 'Cambia', 'Change', 'Cambiar'),
(42, 'Remove', 'Rimuovere', 'Remove', 'Eliminar'),
(43, 'Save', 'Salva', 'Save', 'Guardar'),
(44, 'Back', 'Indietro', 'Back', 'Atrás'),
(45, 'Click the button to change the Icon', 'Fare clic sul pulsante per cambiare l''icona', 'Click the button to change the Icon', 'Haga clic en el botón para cambiar el icono'),
(46, 'Select Professional', 'Seleziona Professionista', 'Select Professional', 'Seleccionar Profesional'),
(47, 'Service Available', 'Servizio prenotabile con calendario', 'Service bookable with calendar', 'Servicio reservarble con calendario'),
(48, 'Duration', 'Durata', 'Duration', 'Duración'),
(49, 'min', 'min', 'min', 'min'),
(50, 'Office', 'Ufficio', 'Office', 'Oficina'),
(51, 'Find Address', 'Trova indirizzo', 'Find Address', 'Buscar dirección'),
(52, 'Available out of office', 'Disponibile fuori sede', 'Available offsite', 'Disponible fuera del sitio'),
(53, 'Discount Available', 'Sconto disponibile', 'Discount Available', 'Descuento disponible'),
(54, 'Price', 'Prezzo', 'Price', 'Precio'),
(55, 'Amount of Book at a time', 'Numero Servizi prenotabili per volta', 'Number of Services bookable at a time', 'Cantidad de Servicios reservables a la vez'),
(56, 'Location', 'Posizione', 'Location', 'Localización'),
(57, 'Service List', 'Elenco Servizi', 'Service List', 'Lista de servicios'),
(58, 'Service', 'Servizio', 'Service', 'Servicio'),
(59, 'Post', 'Post', 'Post', 'Post'),
(60, 'Post List', 'Elenco Post', 'Post List', 'Lista Post'),
(61, 'Title', 'Titolo', 'Title', 'Título'),
(62, 'Post Title', 'Titolo del Post', 'Post Title', 'Título del Post'),
(63, 'Featured Image', 'Foto di presentazione', 'Featured Image', 'Foto principal'),
(64, 'User', 'Utente', 'User', 'Usuario'),
(65, 'User List', 'Elenco Utenti', 'User List', 'Lista de Usuarios'),
(66, 'Offer', 'Offerta', 'Offer', 'Oferta'),
(67, 'Offer List', 'Elenco Offerte', 'Offer List', 'Lista de Ofertas'),
(68, 'Company', 'Company', 'Company', 'Company'),
(69, 'Received', 'Ricevuto', 'Received', 'Recibido'),
(70, 'Expire At', 'Scade il', 'Expire At', 'Expirará al'),
(71, 'Select Company', 'Seleziona Azienda', 'Select Company', 'Seleccione la empresa'),
(72, 'Create Offer', 'Crea Offerta', 'Create Offer', 'Crear una Oferta'),
(73, 'Create User', 'Crea Utente', 'Create User', 'Crear usuario'),
(74, 'Create Post', 'Crea Post', 'Create Post', 'Crear Post'),
(75, 'Create Service', 'Crea Servizio', 'Create Service', 'Crear Servicio'),
(76, 'Add Professional', 'Inserisci Professionista', 'Add Professional', 'Añadir Profesional'),
(77, 'Edit Professional', 'Modifica Professionista', 'Edit Professional', 'Edición Profesional'),
(78, 'Edit Category', 'Modifica Categoria', 'Edit Category', 'Editar categoría'),
(79, 'Edit Post', 'Modifica Post', 'Edit Post', 'Editar Post'),
(80, 'Edit User', 'Modifica Utente', 'Edit User', 'Editar Usuario'),
(81, 'Edit Offer', 'Modifica Offerta', 'Edit Offer', 'Editar Oferta'),
(82, 'Loyalty', 'Loyalty', 'Loyalty', 'Royalty'),
(83, 'Create Loyalty', 'Crea Loyalty', 'Create Loyalty', 'Crear Loyalty'),
(84, 'Edit Loyalty', 'Modifica Loyalty', 'Edit Loyalty', 'Editar Loyalty'),
(85, 'Count Stamp', 'Conteggio Timbro', 'Count Stamp', 'Contador sello'),
(86, 'Address', 'Indirizzo', 'Address', 'Dirección'),
(87, 'Holidays', 'Vacanze', 'Holidays', 'Vacaciones'),
(88, 'January', 'Gennaio', 'January', 'Enero'),
(89, 'February', 'Febbraio', 'February', 'Febrero'),
(90, 'March', 'Marzo', 'March', 'Marcha'),
(91, 'April', 'Aprile', 'April', 'Abril'),
(92, 'May', 'Maggio', 'May', 'Mayo'),
(93, 'June', 'Giugno', 'June', 'Junio'),
(94, 'July', 'Luglio', 'July', 'Julio'),
(95, 'August', 'Agosto', 'August', 'Agosto'),
(96, 'September', 'Settembre', 'September', 'Setiembre'),
(97, 'October', 'Ottobre', 'October', 'Octubre'),
(98, 'November', 'Novembre', 'November', 'Noviembre'),
(99, 'December', 'Dicembre', 'December', 'Diciembre'),
(100, 'Opening Hours', 'Orari di apertura', 'Opening Hours', 'Horario de apertura'),
(101, 'Mon', 'Lun', 'Mon', 'Lun'),
(102, 'Tue', 'Mar', 'Tue', 'Mar'),
(103, 'Wed', 'Mer', 'Wed', 'Mier'),
(104, 'Thu', 'Gio', 'Thu', 'Jue'),
(105, 'Fri', 'Ven', 'Fri', 'Vie'),
(106, 'Sat', 'Sab', 'Sat', 'Sáb'),
(107, 'Sun', 'Dom', 'Sun', 'Dom'),
(108, 'Plan', 'Piano', 'Plan', 'Plano'),
(109, 'Plan List', 'Lista Piani', 'Plan List', 'Lista Planos'),
(110, 'Code', 'Codice', 'Code', 'Codigo'),
(111, 'Type', 'Tipo', 'Type', 'Tipo'),
(112, 'Create Plan', 'Crea Piano', 'Create Plan', 'Crear plan'),
(113, 'Per Year', 'Per Anno', 'Per Year', 'Por Año'),
(114, 'Per Service', 'Per Servizio', 'Per Service', 'Por Servicio'),
(115, 'Sign Out', 'Esci', 'Sign Out', 'Salir'),
(116, 'Administrator Login', 'Accesso Amministratore', 'Administrator Login', 'Acseso Administrador'),
(117, 'Username', 'Nome Utente', 'Username', 'Nombre de usuario'),
(118, 'Sign in', 'Registrati', 'Sign in', 'Registrarse'),
(119, 'Register', 'Registrazione', 'Register', 'Registro'),
(120, 'Forgot Password', 'Password dimenticata', 'Forgot Password', 'Se te olvidó tu contraseña'),
(121, 'Welcome back!', 'Bentornato!', 'Welcome back!', 'Bienvenido de vuelta!'),
(122, 'User has been saved successfully', 'Utente salvato con successo', 'User has been saved successfully', 'El usuario ha sido guardado con éxito'),
(123, 'User has been deleted successfully', 'Utente eliminato con successo', 'User has been deleted successfully', 'El usuario ha sido eliminado correctamente'),
(124, 'This user has been already used', 'Questo utente è già utilizzato', 'This User has been already used', 'Este usuario no ha sido ya utilizado'),
(125, 'Sub category has been saved successfully', 'Sotto categoria salvata con successo', 'Sub Category has been saved successfully', 'Subcategoría ha sido guardado con éxito'),
(126, 'Sub category has been deleted successfully', 'Sotto categoria eliminata con successo', 'Sub Category has been deleted successfully', 'Subcategoría se ha eliminado correctamente'),
(127, 'This sub category has been already used', 'Questa sottocategoria già utilizzata', 'This Sub Category has been already used', 'Esta categoría Sub ha sido ya utilizado'),
(128, 'Service has been saved successfully', 'Servizio salvato con successo', 'Service has been saved successfully', 'El servicio ha sido guardado con éxito'),
(129, 'Store has been deleted successfully', 'Store cancellato con successo', 'Store has been deleted successfully', 'Tienda se ha eliminado correctamente'),
(130, 'This store has been already used', 'Questo negozio già utilizzato', 'This Store has been already used', 'Tienda se ha eliminado correctamente...'),
(131, 'Post has been saved successfully', 'Post salvato con successo', 'Post has been saved successfully', 'Post ha sido guardado con éxito'),
(132, 'Post has been deleted successfully', 'Post eliminato con successo', 'Post has been deleted successfully', 'Post ha sido eliminado correctamente'),
(133, 'This post has been already used', 'Questo post è già utilizzato', 'This Post has been already used', 'Esta publicación ha sido ya utilizado'),
(134, 'Category has been saved successfully', 'Categoria salvata con successo', 'Category has been saved successfully', 'Categoría ha sido guardado con éxito'),
(135, 'Category has been deleted successfully', 'Categoria eliminata con successo', 'Category has been deleted successfully', 'Categoría se ha eliminado correctamente'),
(136, 'This category has been already used', 'Questa categoria è già utilizzata', 'This Category has been already used', 'Esta categoría ha sido ya utilizado'),
(137, 'Plan has been saved successfully', 'Piano salvato con successo', 'Plan has been saved successfully', 'Plan ha sido guardado con éxito'),
(138, 'Plan has been deleted successfully', 'Piano eliminato con successo', 'Plan has been deleted successfully', 'Plan ha sido eliminado correctamente'),
(139, 'This plan has been already used', 'Questo Piano è stato già utilizzato', 'This Plan has been already used', 'Este Plan ha sido ya utilizado'),
(140, 'Office has been saved successfully', 'Ufficio  salvato con successo', 'Office has been saved successfully', 'Oficina ha sido guardado con éxito'),
(141, 'Office has been deleted successfully', 'Ufficio eliminato con successo', 'Office has been deleted successfully', 'Oficina se ha eliminado correttamente'),
(142, 'This office has been already used', 'Questo Ufficio è già utilizzato', 'This Office has been already used', 'Esta Oficina ha sido ya utilizado'),
(143, 'Offer has been saved successfully', 'Offerta salvata con successo', 'Offer has been saved successfully', 'Oferta ha sido guardado con éxito'),
(144, 'Offer has been deleted successfully', 'Offerta eliminata con successo', 'Offer has been deleted successfully', 'Oferta se ha eliminado correctamente'),
(145, 'This offer has been already used', 'Questa offerta è stata già utilizzata', 'This Offer has been already used', 'Esta oferta ha sido ya utilizado'),
(146, 'Loyalty has been saved successfully', 'Fedeltà è stato salvato con successo', 'Loyalty has been saved successfully', 'La lealtad ha sido guardado con éxito'),
(147, 'Loyalty has been deleted successfully', 'Fedeltà è stato eliminato con successo', 'Loyalty has been deleted successfully', 'La lealtad se ha eliminado correctamente'),
(148, 'This loyalty has been already used', 'Questa fedeltà è stato già utilizzata', 'This Loyalty has been already used', 'Esta lealtad ha sido ya utilizado'),
(149, 'Company has been saved successfully', 'Società è stata salvato con successo', 'Company has been saved successfully', 'Company ha sido guardado con éxito'),
(150, 'Company has been deleted successfully', 'Società è stata eliminato con successo', 'Company has been deleted successfully', 'Empresa se ha eliminado correctamente'),
(151, 'This company has been already used', 'Questa società è stata già utilizzata', 'This Company has been already used', 'Esta empresa ha sido ya utilizado'),
(152, 'City has been saved successfully', 'City è stato salvata con successo', 'City has been saved successfully', 'City ha sido guardado con éxito'),
(153, 'City has been deleted successfully', 'Città è stato eliminata con successo', 'City has been deleted successfully', 'City ha sido eliminado correctamente'),
(154, 'This city has been already used', 'Questa Città è stato già utilizzata', 'This City has been already used', 'Esta ciudad ha sido ya utilizada'),
(155, 'Invalid username and password', 'Username e password non validi', 'Invalid username and password', 'Nombre de usuario y una contraseña no válida'),
(156, 'The account is already exist', 'L''account già esistente', 'The account already exist', 'La cuenta ya existe'),
(157, 'Check your email to verify your account', 'Controlla la tua e-mail per verificare il tuo account', 'Check your email to verify your account', 'Revise su correo electrónico para verificar su cuenta'),
(158, 'You must verify your account to login.', 'È necessario verificare il tuo account per effettuare il login.', 'You must verify your account to login.', 'Usted debe verificar su cuenta para iniciar sesión.'),
(159, 'Resend Email', 'Rinvia l''e-mail', 'Resend Email', 'Reenviar email'),
(160, 'Invalid Email and Password', 'E-mail e Password non valida', 'Invalid Email and Password', 'No válida de correo electrónico y contraseña'),
(161, 'You left the feedback successfully. You got the Offer. Check your email.', 'Hai lasciato il feedback con successo. Hai l''Offerta. Controlla la tua email.', 'You left the feedback successfully. You got the Offer. Check your email.', 'Dejaste las votaciones éxito. Tienes la Oferta. Consultar su correo electrónico.'),
(162, 'Email is not exist', 'Email non esiste', 'Email is not exist', 'El correo electrónico no es existir'),
(163, 'Password has been reset successfully', 'La password è stata reimpostata', 'Password has been reset successfully', 'Contraseña se ha restablecido con éxito'),
(164, 'Password changes email has been sent', 'Password modificata inviata', 'Password changes email has been sent', 'Los cambios de contraseña de correo electrónico ha sido enviado'),
(165, 'You have successfully active your account', 'Avete successo attiva il tuo account', 'You have successfully active your account', 'Usted tiene éxito activa su cuenta'),
(166, 'User profile has been updated successfully', 'Profilo utente aggiornato con successo', 'User profile has been updated successfully', 'Perfil de usuario se ha actualizado correctamente'),
(167, 'You sent your contact detail successfully', 'Contatti inviati con successo', 'You sent your contact detail successfully', 'Tú enviaste a tu detalle de contactos con éxito'),
(168, 'You left the feedback successfully', 'Hai lasciato il feedback con successo', 'You left the feedback successfully', 'Dejaste las votaciones éxito'),
(169, 'Image has been uploaded successfully', 'Immagine caricata con successo', 'Image has been uploaded successfully', 'La imagen se ha cargado correctamente'),
(170, 'Please select file to upload', 'Seleziona il file da caricare', 'Please select file to upload', 'Por favor, seleccione archivo a subir'),
(171, 'Your booking has been added on cart successfully.', 'La tua prenotazione è stata aggiunta al carrello con successo.', 'Your booking has been added on cart successfully.', 'Su libro ha sido añadido a la cesta con éxito.'),
(172, 'You have to login.', 'Devi effettuare il login.', 'You have to login.', 'Debes iniciar sesión.'),
(173, 'Please pick a date and duration', 'Si prega di scegliere la data e la durata', 'Please pick a date and duration', 'Por favor, elegir una fecha y duración'),
(174, 'Invalid Request', 'richiesta non valida', 'Invalid Request', 'Solicitud no válida'),
(175, 'The company has been removed succssfully from the cart', 'La società è stata rimosso con successo dal carrello', 'The company has been removed succssfully from the cart', 'La compañía se ha eliminado con éxito de la compra'),
(176, 'Your comment has been posted successfully.', 'Il tuo commento è stato pubblicato con successo.', 'Your comment has been posted successfully.', 'Su comentario ha sido publicado con éxito.'),
(177, 'You have already joined on this store.', 'Hai già aderito su questo negozio.', 'You have already joined on this store.', 'Usted ya ha sumado en esta tienda.'),
(178, 'You have successfully joined on this store.', 'Si sono uniti con successo su questo negozio.', 'You have successfully joined on this store.', 'Te has unido con éxito en esta tienda.'),
(179, 'You have purchased successfully.', 'Avete acquistato con successo.', 'You have purchased successfully.', 'Usted ha adquirido con éxito.'),
(180, 'You have failed on purchasing.', 'Hai fallito sull''acquisto.', 'You have failed on purchasing.', 'Usted ha fallado en la compra.'),
(181, 'Message has been sent successfully', 'La comunicazione è stata inviata con successo', 'Message has been sent successfully', 'Mensaje ha sido enviado con éxito'),
(182, 'Widget Setting has been updated successfully.', 'Impostazione Widget è stato aggiornato con successo.', 'Widget Setting has been updated successfully.', 'Ajuste Widget se ha actualizado correctamente.'),
(183, 'This consumer already registered on our business', 'Questo consumatore già registrato sul nostro business', 'This consumer already registered on our business', 'Este consumidor ya registrado en nuestro negocio'),
(184, 'This consumer has been registered successfully on our business', 'Questo consumo è stato registrato con successo il nostro business', 'This consumer has been registered successfully on our business', 'Este consumo se ha registrado correctamente en nuestro negocio'),
(185, 'Offer has been used.', 'Offerta è già utilizzata.', 'Offer has been used.', 'Oferta ha sido utilizado.'),
(186, 'Loyalty has been used.', 'Fedeltà è stato utilizzato.', 'Loyalty has been used.', 'La lealtad se ha utilizado.'),
(187, 'You dont have enough credits for sending Message', 'Non hai abbastanza crediti per l''invio del messaggio', 'You don''t have enough credits for sending Message', 'No tienes suficiente credito para enviar el mensaje'),
(188, 'Stamp has been added successfully.', 'Stamp è stato aggiunto con successo.', 'Stamp has been added successfully.', 'Sello se ha agregado correctamente.'),
(189, 'You subscribed successfully', 'Ti sei iscritto con successo', 'You subscribed successfully', 'Usted suscrito con éxito'),
(190, 'Subscribed cancelled successfully', 'Sottoscritta annullata correttamente', 'Subscribed cancelled successfully', 'Suscrito cancelado con éxito'),
(191, 'Store has been saved successfully', 'Store è stato salvato con successo', 'Store has been saved successfully', 'Tienda ha sido guardado con éxito'),
(192, 'Rating type has been saved successfully', 'Valutazione Type è stato salvato con successo', 'Rating type has been saved successfully', 'Habilitación de tipo ha sido guardado con éxito'),
(193, 'Rating type has been deleted successfully', 'Valutazione Tipo è stato eliminato con successo', 'Rating type has been deleted successfully', 'Habilitación de Tipo se ha eliminado correctamente'),
(194, 'This rating type has been already used', 'Questo tipo di valutazione è stato già utilizzato', 'This Rating Type has been already used', 'Esta habilitación de tipo ha sido ya utilizado'),
(195, 'Feedback has been deleted successfully', 'Il feedback è stato eliminato con successo', 'Feedback has been deleted successfully', 'Feedback se ha eliminado correctamente'),
(196, 'This feedback has been already used', 'Questo feedback è stato già utilizzato', 'This Feedback has been already used', 'Esta Evaluación ha sido ya utilizado'),
(197, 'Comment has been deleted successfully', 'Commento è stato eliminato con successo', 'Comment has been deleted successfully', 'Comentario se ha eliminado correctamente'),
(198, 'This comment has been already used', 'Questo commento è stato già utilizzato', 'This Comment has been already used', 'Este comentario ha sido ya utilizado'),
(199, 'Book has been deleted successfully', 'Prenotazione eliminata con successo', 'Booking has been deleted successfully', 'Cita eliminada correctamente'),
(200, 'This book has been already done', 'Questo prenotazione è stata già fatta', 'This Booking has been already done', 'Esta cita ha sido ya hecha'),
(201, 'Status updated successfully!', 'Stato aggiornato con successo!', 'Status updated successfully!', 'Estado actualizado correctamente!'),
(202, 'You have registered successfully.', 'Registrazione completata con successo.', 'You have registered successfully.', 'Te has registrado exitosamente.'),
(203, 'You have failed on signup.', 'Qualcosa è andata male durante l’iscrizione.', 'You have failed on signup.', 'Usted ha fallado en registrarse.'),
(204, 'Please login and complete your profile', 'Effettua il login e completa il tuo profilo', 'Please login and complete your profile', 'Por favor, iniciar sesión y completar tu perfil'),
(205, 'Password has been updated successfully', 'La password aggiornata con successo', 'Password has been updated successfully', 'Contraseña se ha actualizado correctamente'),
(206, 'Current Password is incorrect', 'Password non corretta', 'Current Password is incorrect', 'La contraseña es incorrecta'),
(207, 'Professional has been updated successfully', 'Professionista aggiornato con successo', 'Professional has been updated successfully', 'Profesional se ha actualizado correctamente'),
(208, 'Professional Photo has been updated successfully', 'Foto aggiornata con successo', 'Photo has been updated successfully', 'Fotos actualizada correctamente'),
(209, 'Holidays has been updated successfully', 'Vacanze aggiornate con successo', 'Holidays updated successfully', 'Vacaciones se ha actualizado con éxito'),
(210, 'Period', 'Periodo', 'Period', 'Periodo'),
(211, 'Search', 'Ricerca', 'Search', 'Buscar'),
(212, 'Select Period', 'Seleziona il periodo', 'Select Period', 'Seleccione Período'),
(213, 'Sold', 'Venduto', 'Sold', 'Vendido'),
(214, 'Sold Offers Count', 'Count Offerte vendute', 'Sold Offers Count', 'Ofertas vendidos Count'),
(215, 'Sold Offers Revenue', 'Venduto Offerte Entrate', 'Sold Offers Revenue', 'Vendido Ofertas de Rentas'),
(216, 'Loyalties', 'Loyalties', 'Loyalties', 'Las lealtades'),
(217, 'Loyalties Uses', 'Loyalties Utilizzi', 'Loyalties Uses', 'Lealtades Usos'),
(218, 'feedbacks', 'Valutazioni', 'Feedbacks', 'Votaciones'),
(219, 'Feedbacks Count', 'Count Valutazioni', 'Feedbacks Count', 'Votaciones Count'),
(220, 'Feedbacks Average', 'Valutazioni media', 'Feedbacks Average', 'Votaciones Promedio'),
(221, 'User Registered', 'Utente registrato', 'User Registered', 'Usuario Registrado'),
(222, 'Book', 'Prenota', 'Book', 'Reserva'),
(223, 'Book List', 'Lista Prenotaizoni', 'Booking List', 'Lista de Citas'),
(224, 'Store Name', 'Nome del negozio', 'Store Name', 'Nombre tienda'),
(225, 'User Name', 'Nome utente', 'User Name', 'Nombre de usuario'),
(226, 'Booking Date', 'Data di prenotazione', 'Booking Date', 'Fecha de la cita'),
(227, 'Status', 'Stato', 'Status', 'Estado'),
(228, 'View', 'Vista', 'View', 'Ver'),
(229, 'Consumer', 'Consumatore', 'Consumer', 'Consumidor'),
(230, 'Consumer List', 'Lista dei consumatori', 'Consumer List', 'Lista Consumidor'),
(231, 'Consumer Info', 'Info Consumatori', 'Consumer Info', 'Información al Consumidor'),
(232, 'Register Consumer', 'Consumatori Registrati', 'Register Consumer', 'Regístrese Consumidor'),
(233, 'Visits', 'Visite', 'Visits', 'Visitas'),
(234, 'Registered At', 'Registrato A', 'Registered At', 'Registrado en'),
(235, 'Detail', 'Dettaglio', 'Detail', 'Detalle'),
(236, 'Stamp', 'Francobollo', 'Stamp', 'Sello'),
(237, 'Visible', 'Visibile', 'Visible', 'Visible'),
(238, 'Score', 'Risultato', 'Score', 'Puntuación'),
(239, 'Consumer Management', 'Gestione Consumatori', 'Consumer Management', 'Gestión Consumidor'),
(240, 'Rating Type Management', 'Gestione Valutazione', 'Rating Type Management', 'Habilitación de Tipo de gestión'),
(241, 'Prev Month', 'Prev Mese', 'Prev Month', 'Mes Anterior'),
(242, 'Current Month', 'Mese Corrente', 'Current Month', 'Mes actual'),
(243, 'Total Feedbacks', 'Totale Valutazioni', 'Total Feedbacks', 'Votaciones totales'),
(244, 'Quality', 'Qualità', 'Quality', 'Calidad'),
(245, 'Clean', 'Pulisci', 'Clean', 'Limpiar'),
(246, 'All Services', 'Tutti i servizi', 'All Services', 'Todos los Servicios'),
(247, 'Feedback Management', 'Gestione Feedback', 'Feedback Management', 'Gestión de votos'),
(248, 'Message Management', 'Gestione Messaggi', 'Message Management', 'Gestión de Mensajes'),
(249, 'Message List', 'Elenco Messaggi', 'Message List', 'Lista de mensajes'),
(250, 'Message', 'Messaggio', 'Message', 'Mensaje'),
(251, 'Purchase Offer List', 'Acquisto Elenco prodotti', 'Purchase Offer List', 'Compra Lista de producto'),
(252, 'Revenue', 'Ricavi', 'Revenue', 'Ingresos'),
(253, 'Solds', 'Solds', 'Solds', 'Solds'),
(254, 'Activity Offer List', 'Attività Elenco prodotti', 'Activity Offer List', 'Actividad Lista de producto'),
(255, 'Office List', 'Lista Uffici', 'Office List', 'Lista de Office'),
(256, 'Subscribe Management', 'Gestione Iscrizione', 'Subscribe Management', 'Suscribirse Gestión'),
(257, 'Subscribe', 'Abbonati', 'Subscribe', 'Suscribirse'),
(258, 'VIEWING YOUR PROFESSIONAL DETAILS', 'VISUALIZZARE I VOSTRI DATI PROFESSIONALI', 'VIEWING YOUR PROFESSIONAL DETAILS', 'VIENDO TUS DATOS PROFESIONALES'),
(259, 'PERSONAL ADMINISTRATOR PANEL', 'PERSONALE AMMINISTRATORE PANEL', 'PERSONAL ADMINISTRATOR PANEL', 'PANEL DE ADMINISTRADOR PERSONAL'),
(260, 'MULTIPLE SERVICES AND MULTIPLE OFFICES', 'SERVIZI MULTIPLI E UFFICI MULTIPLE', 'MULTIPLE SERVICES AND MULTIPLE OFFICES', 'SERVICIOS MÚLTIPLES Y OFICINAS DE MÚLTIPLES'),
(261, 'PERSONAL CONNECTION URL', 'URL PERSONALIZZATO', 'PERSONAL CONNECTION URL', 'CONEXIÓN URL PERSONAL'),
(262, 'INDEX PROFILE', 'INDICE PROFILO', 'INDEX PROFILE', 'PERFIL INDEX'),
(263, 'OFFERS PUBLICATION', 'OFFERTE PUBBLICAZIONE', 'OFFERS PUBLICATION', 'OFERTAS PUBLICACIÓN'),
(264, 'SECTION PERSONAL ITEMS', 'SEZIONE OGGETTI PERSONALI', 'SECTION PERSONAL ITEMS', 'SECCIÓN ARTÍCULOS PERSONALES'),
(265, 'How many services?', 'Quanti servizi?', 'How many services?', 'Cuántos servicios?'),
(266, 'Pay Now', 'Paga adesso', 'Pay Now', 'Paga ahora'),
(267, 'Widgets', 'Widgets', 'Widgets', 'Widgets'),
(268, 'Setting', 'Setting', 'Setting', 'Ajuste'),
(269, 'Logo', 'Logo', 'Logo', 'Logo'),
(270, 'Color', 'Colore', 'Color', 'Color'),
(271, 'Header', 'Intestazione', 'Header', 'Cabecera'),
(272, 'Background', 'Sfondo', 'Background', 'Fondo'),
(273, 'Header and Footer', 'Header and Footer', 'Header and Footer', 'Encabezado de pie de página'),
(274, 'Custom CSS', 'Custom CSS', 'Custom CSS', 'CSS personalizado'),
(275, 'Registration Widget', 'Widget registrazione', 'Registration Widget', 'Registro Widget'),
(276, 'Offers Widget', 'Offerte widget', 'Offers Widget', 'Ofrece Widget'),
(277, 'Update', 'Aggiorna', 'Update', 'Actualizar'),
(278, 'Professional Profile', 'Profilo Professionale', 'Professional Profile', 'Perfil profesional'),
(279, 'General Information', 'Informazioni Generali', 'General Informations', 'Informacion General'),
(280, 'Profile & Cover Photo', 'Profilo & Cover Photo', 'Profile & Cover Photo', 'Perfil Y Foto de la portada'),
(281, 'Change Password', 'Cambia password', 'Change Password', 'Cambiar Contraseña'),
(282, 'About Me', 'Su di me', 'About Me', 'Acerca de mí'),
(283, 'Photos', 'Foto', 'Photos', 'Fotos'),
(284, 'Current Password', 'Password attuale', 'Current Password', 'Contraseña actual'),
(285, 'New Password', 'Nuova password', 'New Password', 'Nueva contraseña'),
(286, 'Retype Password', 'Riscrivi password', 'Retype Password', 'Vuelva a escribir la contraseña'),
(287, 'Contact Us', 'Contattaci', 'Contact Us', 'Contáctenos'),
(288, 'Contact List', 'Lista Contatti', 'Contact List', 'Lista Contactos'),
(289, 'Contact', 'Contatto', 'Contact', 'Contacto'),
(290, 'Close', 'Chiudi', 'Close', 'Cerca'),
(291, 'Please input your address correctly!', 'Si prega di inserire il tuo indirizzo correttamente!', 'Please input your address correctly!', 'Por favor, introduzca su dirección correcta!'),
(292, 'Loyalty List', 'Lista fedeltà', 'Loyalty List', 'Lista de Lealtad'),
(293, 'Please select the office', 'Si prega di selezionare ufficio', 'Please select the office', 'Por favor, seleccione la oficina'),
(294, 'You can choose only 1 category', 'È possibile scegliere solo 1 categoria', 'You can choose only 1 category', 'Usted puede elegir sólo 1 categoría'),
(295, 'Embed Widget', 'Incorpora widget', 'Embed Widget', 'Integrar Widget'),
(296, 'Please select the city', 'Seleziona la città', 'Please select the city', 'Por favor, seleccione la ciudad'),
(297, 'Category List', 'Lista Categorie', 'Category List', 'Lista Categorías'),
(298, 'Please select the Icon', 'Seleziona l''icona', 'Please select the Icon', 'Por favor, seleccione el icono'),
(299, 'Select', 'Seleziona', 'Select', 'Seleccionar'),
(300, 'italian', 'Italiano', 'Italian', 'Italiano'),
(301, 'english', 'Inglese', 'English', 'Inglés'),
(302, 'spanish', 'Spagnolo', 'Spanish', 'Español'),
(303, 'Store', 'Negozio', 'Store', 'Almacén'),
(304, 'Membership', 'Appartenenza', 'Membership', 'Afiliación'),
(305, 'Create Category', 'Crea Categoria', 'Create Category', 'Crear categoría'),
(306, 'Days for Deliver', 'Giorni per la consegna', 'Days for Deliver', 'Días de Entrega'),
(307, 'Delivery Place', 'Dove consegnare', 'Where Deliver', 'Donde Entregar'),
(308, 'Office *', 'Ufficio *', 'Office *', 'Oficina *'),
(309, 'Range of Office', 'Range di Km fuori sede', 'Range of Km offsite', 'Rango de Km fuera del sitio'),
(310, 'Price *', 'Prezzo *', 'Price *', 'Precio *'),
(311, 'Discount Price', 'Prezzo scontato', 'Discount Price', 'Precio con Descuento'),
(312, 'Amount of Book at a time(max:5)', 'Numero massimo di servizi prenotaibili per volta. ', 'Amount of maximun services bookable at a time.', 'Cantidad de Citas a la vez'),
(313, 'Create Office', 'Crea Ufficio', 'Create Office', 'Crear Oficina'),
(314, 'Edit Plan', 'Modifica Piano', 'Edit Plan', 'Plan Editar'),
(315, 'Updated At', 'Aggiornato A', 'Updated At', 'Actualizado a las'),
(316, 'Edit Office', 'Modifica Ufficio', 'Edit Office', 'Oficina Editar'),
(317, 'Sub Category List', 'Lista Sotto categoria', 'Sub Category List', 'Lista de categoría Sub'),
(318, 'Edit Service', 'Modifica Servizio', 'Edit Service', 'El servicio de edición'),
(319, 'Sub Category Management', 'Gestione Sotto categoria', 'Sub Category Management', 'Gestión por Categorías Sub'),
(320, 'Sub Category', 'Sotto categoria', 'Sub Category', 'Sub Categoría'),
(321, 'Edit Sub Category', 'Modifica Sotto categoria', 'Edit Sub Category', 'Editar Sub Categoría'),
(322, 'Create Sub Category', 'Crea Sotto categoria', 'Create Sub Category', 'Crear Sub Categoría'),
(323, 'Copyright', 'Copyright', 'Copyright', 'Derechos de autor'),
(324, 'All Rights Reserved', 'Tutti i diritti riservati', 'All Rights Reserved', 'Reservados todos los derechos'),
(325, 'Powered by', 'Offerto da', 'Powered by', 'Desarrollado por'),
(326, 'Professional Login', 'Accesso Professionale', 'Professional Sign In', 'Entrar Profesional'),
(327, 'Signup for free', 'Iscriviti gratuitamente', 'Signup for free', 'Regístrese para recibir gratis'),
(328, 'Email Address', 'Indirizzo e-mail', 'Email Address', 'Dirección correo electrónico'),
(329, 'Professional Basic', 'Professionista Basic', 'Professional Basic', 'Profesional Básico'),
(330, 'ONE SERVICE AND ONE OFFICE', 'UN SERVIZIO E UN UFFICIO', 'ONE SERVICE AND ONE OFFICE', 'UN SERVICIO Y UNA OFICINA'),
(331, 'Sign Up', 'Registrati', 'Sign Up', 'Contratar'),
(332, 'Create the Account as Professional', 'Crea account come Professionista', 'Create Account as Professional', 'Crear cuenta como profesional'),
(333, 'Password Confirmation', 'Conferma password', 'Password Confirmation', 'Confirmación de contraseña'),
(334, 'Professional Name', 'Nome Professionista', 'Professional Name', 'Nombre Profesional'),
(335, 'Phone No', 'Telefono', 'Phone No', 'Telefono'),
(336, 'Price in Euro', 'Prezzo in Euro', 'Price in Euro', 'Precio en Euro'),
(337, 'Please fill email and name filed!', 'Si prega di inserire e-mail e nome!', 'Please fill email and name filed!', 'Rellene correo electrónico y nombre presentado!'),
(338, 'Pending', 'In attesa', 'Pending', 'En espera'),
(339, 'Complete', 'Completo', 'Complete', 'Completa'),
(340, 'Cancelled', 'Annullato', 'Cancelled', 'Cancelado'),
(341, 'View Booking', 'Visualizzare Prenotazione', 'View Booking', 'Ver Reservas'),
(342, 'Booked', 'Prenotato', 'Booked', 'Reservados'),
(343, 'Service Name', 'Nome del Servizio', 'Service Name', 'Nombre del Servicio'),
(344, 'Customer Name', 'Nome Cliente', 'Customer Name', 'Nombre del cliente'),
(345, 'Customers Address', 'Indirizzo del cliente', 'Customer''s Address', 'Dirección del Cliente'),
(346, 'Count Visit', 'Conteggio Visite', 'Count Visit', 'Contador de Visitas'),
(347, 'Company Profile', 'Profilo Aziendale', 'Company Profile', 'Perfil de la compañía'),
(348, 'Comments Management', 'Gestione Commenti', 'Comments Management', 'Gestión Comentarios'),
(349, 'Rating Management', 'Gestione Recensioni', 'Rating Management', 'Gestión de Clasificación'),
(350, 'Marketing Tools', 'Strumenti di Marketing', 'Marketing Tools', 'Herramientas de marketing'),
(351, 'Message Detail', 'Dettagli Messaggio', 'Message Detail', 'Detalles del mensaje'),
(352, 'Send', 'Inviare', 'Send', 'Enviar'),
(353, 'Start Date', 'Data d''inizio', 'Start Date', 'Fecha de inicio'),
(354, 'End Date', 'Data finale', 'End Date', 'Fecha final'),
(355, 'Last 3 days', 'Ultimi 3 giorni', 'Last 3 days', 'Últimos 3 días'),
(356, 'Last 1 week', 'Ultimo 1 settimana', 'Last 1 week', 'Última 1 semana'),
(357, 'Last 1 month', 'Ultimo 1 mese', 'Last 1 month', 'Última 1 mes'),
(358, 'Last 2 months', 'Ultimi 2 mesi', 'Last 2 months', 'Últimos 2 meses'),
(359, 'Last 3 months', 'Gli ultimi 3 mesi', 'Last 3 months', 'Últimos 3 meses'),
(360, 'Last 6 months', 'Ultimi 6 mesi', 'Last 6 months', 'Últimos 6 meses'),
(361, 'Last 1 year', '1 anno scorso', 'Last 1 year', 'Última 1 año'),
(362, 'Rating Type', 'Tipo di Valutazione', 'Rating Type', 'Habilitación de Tipo'),
(363, 'Create Rating Type', 'Crea Valutazione Tipo', 'Create Rating Type', 'Crear habilitación de tipo'),
(364, 'Question', 'Domanda', 'Question', 'Pregunta'),
(365, 'Rating Type List', 'Valutazione Tipo Lista', 'Rating Type List', 'Clasificación Tipo de lista'),
(366, 'Cancel Subscription', 'Annulla iscrizione', 'Cancel Subscription', 'Cancelar subscripción'),
(367, 'Show', 'Mostra', 'Show', 'Mostrar'),
(368, 'Hide', 'Nascondi', 'Hide', 'Esconder'),
(369, 'Basic Member', 'Membro Base', 'Basic Member', 'Miembro Básico'),
(370, 'Pro Member', 'Membro Pro', 'Pro Member', 'Pro Miembro'),
(371, 'Latest', 'Più recente', 'Latest', 'Último'),
(372, 'Stamps Requires', 'Francobolli Richiede', 'Stamps Requires', 'Sellos Requiere'),
(373, 'Write Message Here', 'Scrivi il messaggio qui', 'Write Message Here', 'Escribir mensaje aquí'),
(374, 'Please enter message to send', 'Inserisci il messaggio da inviare', 'Please enter message to send', 'Por favor, introduzca el mensaje a enviar'),
(375, 'Please select users.', 'Si prega di selezionare gli utenti.', 'Please select users.', 'Por favor, seleccione los usuarios.'),
(376, 'Send Email To User', 'Invia email all’utente', 'Send Email To User', 'Enviar correo electrónico a usuario'),
(377, 'Send SMS To User', 'Invia SMS all''utente', 'Send SMS To User', 'Enviar SMS al usuario'),
(378, 'By Activity', 'Per Nazione', 'By Activity', 'Por actividad'),
(379, 'Use Offer', 'Usa Offerta', 'Use Offer', 'Uso Oferta'),
(380, 'There is no offers', 'Non ci sono offerte', 'There is no offers', 'No hay ofertas'),
(381, 'Available Loyalties', 'Loyalties disponibili', 'Available Loyalties', 'Las lealtades disponibles'),
(382, 'Provided Feedbacks', 'Valutazioni fornite', 'Provided Feedbacks', 'Votaciones prestados'),
(383, 'Sorry!', 'Scusate!', 'Sorry!', 'Apenado!'),
(384, 'You need to upgrade your membership or buy more services.', 'È necessario aggiornare la tua iscrizione o comprare più servizi.', 'You need to upgrade your membership or buy more services.', 'Necesitas actualizar tu membresía o comprar más servicios.'),
(385, 'Please check this one as well', 'Si prega di controllare questo pure', 'Please check this one as well', 'Por favor, verifique éste a su vez'),
(386, 'SELECT A CATEGORY', 'SELEZIONA UNA CATEGORIA', 'SELECT A CATEGORY', 'SELECCIONE UNA CATEGORÍA'),
(387, 'By email', 'Per e-mail', 'By email', 'Por correo electrónico'),
(388, 'To the office', 'In Ufficio', 'To the office', 'A la oficina'),
(389, 'Maximum number of days to deliver', 'Numero massimo di giorni per la consegna', 'Maximum number of days to deliver', 'Número máximo de días para entregar'),
(390, 'Range with maximun km out of the office', 'Inserisci i km massimi percorribili fuori ufficio', 'Enter the maximum km practicable offsite', 'Introduzca el máximo km posible fuera del sitio'),
(391, 'Use Y/N', 'Utilizzare Y/N', 'Use Y/N', 'Utilice S/N'),
(392, 'Did you forgot the password?', 'Hai dimenticato la password?', 'Did you forgot the password?', 'Has olvidado la contraseña?'),
(393, 'Enter your email to reset', 'Per reimpostare inserisci la tua email', 'Enter your email to reset', 'Ingrese su correo electrónico para restablecer'),
(394, 'Submit', 'Invia', 'Submit', 'Enviar'),
(395, 'Update Profile', 'Aggiorna il profilo', 'Update Profile', 'Actualización del perfil'),
(396, 'Reset Your Password', 'Resetta la tua password', 'Reset Your Password', 'Restablecer su contraseña'),
(397, 'Enter New Password', 'Inserire una nuova password', 'Enter New Password', 'Introduzca nueva contraseña'),
(398, 'The cart is empty', 'Il carrello è vuoto', 'The cart is empty', 'La cesta está vacía'),
(399, 'Send Message', 'Invia il messaggio', 'Send Message', 'Enviar mensaje'),
(400, 'Available for Offsite Service', 'Disponibile fuori sede', 'Available for Offsite Service', 'Disponible fuera del sitio'),
(401, 'CONTACT NOW', 'CONTATTA ORA', 'CONTACT NOW', 'CONTACTA AHORA'),
(402, 'Reviews', 'Recensioni', 'Reviews', 'Críticas'),
(403, 'Recent Reviews', 'Recensioni recenti', 'Recent Reviews', 'Comentarios recientes'),
(404, 'Professionals', 'Professionisti', 'Professionals', 'Profesionales'),
(405, 'Services', 'Servizi', 'Services', 'Servicios'),
(406, 'Enter Keyword', 'Inserisci parola chiave', 'Enter Keyword', 'Inserte palabra clave'),
(407, 'Rating Range', 'Range di Valutazione', 'Rating Range', 'Rango Clasificación'),
(408, 'Price Range', 'Fascia di Prezzo', 'Price Range', 'Rango de Precios'),
(409, 'Available offsite Services', 'Disponibili fuori sede', 'Available Offsite', 'Disponibles fuera del sitio'),
(410, 'Posts Published', 'Post Pubblicati', 'Posts Published', 'Post Publicados'),
(411, 'Terms & Conditions', 'Termini & Condizioni', 'Terms & Conditions', 'Términos & Condiciones'),
(412, 'Me', 'Me', 'Me', 'Yo'),
(413, 'The post is empty.', 'Il post è vuoto.', 'The post is empty.', 'El Post está vacío.'),
(414, 'Book Management', 'Gestione Prenotazioni', 'Booking Management', 'Gestión de Reservas'),
(415, 'Sign In', 'Registrati', 'Sign In', 'Ingresar'),
(416, 'Please input your password correctly!', 'Si prega di inserire la password corretta!', 'Please input your password correctly!', 'Por favor, introduzca su contraseña correctamente!'),
(417, 'Please fill required filed!', 'Si prega di compilare il campo obbligatiorio!', 'Please fill required filed!', 'Rellene campo obligatorio!'),
(418, 'Users', 'Utenti', 'Users', 'Usuarios'),
(419, 'Select the period correctly.', 'Selezionare il periodo correttamente.', 'Select the period correctly.', 'Seleccione el período correctamente.'),
(420, 'Send Email', 'Invia una email', 'Send Email', 'Enviar correo electrónico'),
(421, 'Send SMS', 'Invia SMS', 'Send SMS', 'Enviar SMS'),
(422, 'Stamps', 'Francobolli', 'Stamps', 'Sellos'),
(423, 'Online', 'Online', 'Online', 'En línea'),
(424, 'Yes', 'Sì', 'Yes', 'Sí'),
(425, 'No', 'No', 'No', 'No'),
(426, 'Start Time', 'Ora di inizio', 'Start Time', 'Hora de inicio'),
(427, 'End Time', 'Chiusura', 'End Time', 'Hora de finalización'),
(428, 'Received', 'Ricevuti', 'Riceived', 'Recibidas'),
(429, 'Feedback List', 'Elenco Commenti', 'Feedback List', 'Lista de Votación'),
(430, 'Default Language', 'Lingua di default', 'Default Language', 'Idioma predeterminado'),
(431, 'Online Payment', 'Pagamento Online', 'Online Payment', 'Pago en línea'),
(432, 'FAQ', 'FAQ', 'FAQ', 'FAQ'),
(433, 'Was this answer helpful?', 'Questa risposta ti è stata d''aiuto?', 'Was this answer helpful?', 'Te resultó útil esta respuesta'),
(434, 'Recent Posts', 'Post recenti', 'Recent Posts', 'Post recientes'),
(435, 'My Offers', 'Le mie offerte', 'My Offers', 'Mis Ofertas'),
(436, 'Get At', 'Arrivare a', 'Get At', 'Llegar a'),
(437, 'comments', 'commenti', 'comments', 'comentarios'),
(438, 'Read More', 'Leggi tutto', 'Read More', 'Lee mas'),
(439, 'World of Professions', 'Mondo delle Professioni', 'World of Professions', 'Mundo de las Profesiones'),
(440, 'Recent Professions', 'Ultimi Post sulle Professioni', 'Recent Post of Professions', 'Post recientes de las Profesiones'),
(441, 'Post a Comment', 'Pubblica un commento', 'Post a Comment', 'Publicar un comentario'),
(442, 'Comments', 'Commenti', 'Comments', 'Comentarios'),
(443, 'Leave a Comment', 'Lascia un commento', 'Leave a Comment', 'Deja un comentario'),
(444, 'You need to login.', 'Devi effettuare il login.', 'You need to login.', 'Tienes que iniciar sesión.'),
(445, 'Please leave your comment.', 'Si prega di lasciare un commento.', 'Please leave your comment.', 'Por favor, deje su comentario.'),
(446, 'Please leave a message.', 'Per favore lascia un messaggio.', 'Please leave a message.', 'Por favor, deje un mensaje.'),
(447, 'Write feedback here', 'Scrivi i commenti qui', 'Write feedback here', 'Escribir comentarios aquí'),
(448, 'We Are Here', 'Siamo qui', 'We Are Here', 'Estamos aquí'),
(449, 'All Reviews', 'Tutti i pareri', 'All Reviews', 'Todos los comentarios'),
(450, 'Report', 'Rapporto', 'Report', 'Informe'),
(451, 'Duration of service', 'Durata del servizio', 'Duration of service', 'Duración del servicio'),
(452, 'Delivery by email', 'Consegna via mail', 'Delivery by email', 'Entrega por correo electrónico'),
(453, 'Delivery to the office', 'Consegna in ufficio', 'Delivery to the office', 'Entrega a la oficina'),
(454, 'Service Available in', 'Servizio disponibile in', 'Service available in', 'Servicio disponible en'),
(455, 'I want to book offsite service', 'Voglio prenotare fuori sede', 'I want to book offsite', 'Quiero reservar fuera oficina'),
(456, 'Max days for delivery', 'Max giorni per la consegna', 'Max days for delivery', 'Número máximo de días para la entrega'),
(457, 'days', 'giorni', 'days', 'día'),
(458, 'Your Booking', 'La Tua prenotazione', 'Your Booking', 'Su Reserva'),
(459, 'Online Pay', 'Paga online', 'Pay Online', 'Pagar en línea'),
(460, 'Pay to the office', 'Paga in Ufficio', 'Pay to the office', 'Pagar a la oficina'),
(461, 'Send Us A Message', 'Inviaci un Messaggio', 'Send Us A Message', 'Mandanos un mensaje'),
(462, 'Ask Info', 'Chiedi Info', 'Ask Info', 'Solicitar Info'),
(463, 'Order', 'Ordina', 'Order', 'Solicitar'),
(464, 'Join now', 'Iscriviti adesso', 'Join now', 'Únete ahora'),
(465, 'Give Feedback', 'Dai un feedback', 'Give Feedback', 'Dar opinion'),
(466, 'You need to select booking date and duration', 'È necessario selezionare data di prenotazione e la durata.', 'You need to select booking date and duration', 'Es necesario seleccionar la fecha de reserva y duración'),
(467, 'Please answer the question.', 'Si prega di rispondere alla domanda.', 'Please answer the question.', 'Por favor, conteste la pregunta.'),
(468, 'Please input your address', 'Si prega di inserire il tuo indirizzo', 'Please input your address', 'Por favor, introduzca su dirección'),
(469, 'Featured Company', 'Azienda in primo piano', 'Featured Company', 'Ultima Empresa'),
(470, 'There is no similars', 'Non ci sono simili', 'There is no similars', 'No hay similitud'),
(471, 'Offices', 'Uffici', 'Offices', 'Oficinas'),
(472, 'There is no search result', 'La ricerca non ha avuto risultati.', 'There is no search result.', 'La búsqueda no tuvo resultados.'),
(473, 'hour', 'ora', 'hour', 'hora'),
(474, 'Zip Code', 'Cap', 'Zip Code', 'Código postal'),
(475, 'Your message', 'Il tuo messaggio', 'Your message', 'Tu mensaje'),
(476, 'Profile', 'Profilo', 'Profile', 'Perfil'),
(477, 'Offers', 'Offerte', 'Offers', 'Ofertas'),
(478, 'Login', 'Login', 'Login', 'Iniciar sesión'),
(479, 'Business Area', 'Business Area', 'Business Area', 'Área de Negocio'),
(480, 'Request a service', 'Richiedi un Servizio', 'Request a Service', 'Solicitar un Servicio'),
(481, 'Contact and Support', 'Contatto & Supporto', 'Contact & Support', 'Contactos & Ayuda'),
(482, 'How it works', 'Come funziona', 'How it works', 'Cómo funciona'),
(483, 'Help', 'Aiuto', 'Help', 'Ayuda'),
(484, 'Terms and Condition', 'Termini & Condizioni', 'Terms & Condition', 'Términos & Condiciones'),
(485, 'English', 'Inglese', 'English', 'Inglés'),
(486, 'Italian', 'Italiano', 'Italian', 'Italiano'),
(487, 'Spainish', 'Spagnolo', 'Spanish', 'Español'),
(488, 'Blog', 'Blog', 'Blog', 'Blog'),
(489, 'For newsletters enter your email here.', 'Per la newsletter inserisci la tua email qui.', 'For newsletters enter your email here.', 'Para boletines introduzca su email aquí.'),
(490, 'Are you sure?', 'Sei sicuro?', 'Are you sure?', 'Estas seguro?'),
(491, 'You have already left the review here.', 'Hai già lasciato qui la recensione.', 'You have already left the review here.', 'Usted ya ha dejado el comentario aquí.'),
(492, 'Submit Review', 'Invia Recensione', 'Submit Review', 'Enviar opinión'),
(493, 'Enter your information here. So we can register you as our customer.', 'Inserisci i tuoi dati qui. Così possiamo registrarti come nostro cliente.', 'Enter your information here. So we can register you as our customer.', 'Ingrese su información aquí. Así que usted puede registrarse como cliente.'),
(494, 'optional', 'opzionale', 'optional', 'opcional'),
(495, 'Our Offers', 'Le nostre Offerte', 'Our Offers', 'Nuestras Ofertas'),
(496, 'Expires In', 'Scade tra', 'Expires In', 'Expira en'),
(497, 'Buy', 'Acquista', 'Buy', 'Comprar'),
(498, 'Registration Page', 'Pagina Registrazione', 'Registration Page', 'Página de registro'),
(499, 'Categories', 'Categorie', 'Categories', 'Categorías'),
(500, 'Keywords', 'Parole chiave', 'Keywords', 'Palabras clave'),
(501, 'Featured Professional', 'Ultimi Professionisti', 'Featured Professional', 'Ultimi Profesionales'),
(502, 'Featured Services', 'Ultimi Servizi inseriti', 'Latest Services ', 'Ultimos Servicios'),
(503, 'You need to select office.', 'Devi selezionare un ufficio.', 'You need to select office.', 'Es necesario seleccionar la oficina.'),
(504, 'Member Since', 'Membro da', 'Member Since', 'Miembro desde'),
(505, 'From', 'Paese', 'From', 'De'),
(506, 'Speaks', 'Parla', 'Speaks', 'Habla'),
(507, 'Skills Booked', 'Servizi Prenotati ', 'Skills Booked', 'Servicios Reservados'),
(508, 'ONLINE', 'ON LINE', 'ONLINE', 'EN LÍNEA'),
(509, 'OFFLINE', 'OFFLINE', 'OFFLINE', 'OFFLINE'),
(510, 'Type your message', 'Inserisci il tuo messaggio', 'Type your message', 'Escriba su mensaje'),
(511, 'All posts about Professions', 'Tutti i Post sulle Professioni', 'All posts about Professions', 'Todos los Posts de las Profesiones'),
(512, 'Rating', 'Valutazione', 'Rating', 'Clasificación'),
(513, 'Select where', 'Seleziona dove', 'Select where', 'Seleccione dónde'),
(514, 'When', 'Quando', 'When', 'Cuando'),
(515, 'About', 'Informazioni su', 'About', 'Acerca de'),
(516, 'Cart', 'Carrello', 'Cart', 'Carro'),
(517, 'Messages', 'Messaggi', 'Messages', 'Mensajes'),
(518, 'User Profile', 'Profilo Utente', 'User Profile', 'Perfil del usuario'),
(519, 'Phone Number', 'Numero di telefono', 'Phone Number', 'Número de teléfono'),
(520, 'Professional College', 'Collegio Professionale', 'Professional College', 'Colegio Profesional'),
(521, 'Professional Order', 'Ordine Professionale', 'Professional Order', 'Orden Profesional'),
(522, 'Bar Register', 'Albo Professionale', 'Professionals Register', 'Registro Profesional'),
(523, 'Start Searching', 'Seleziona e inizia la ricerca', 'Select and Start Searching', 'Seleciona y búsca'),
(524, 'Select Hourly Rate', 'Scegli Tariffa oraria', 'Select Hourly Rate', 'Seleccione Tarifa por hora'),
(525, 'Select Rating Range', 'Seleziona per Recensioni', 'Select Rating Range', 'Seleccione por Evaluación'),
(526, 'Online for Chat', 'Online per Chat', 'Online for Chat', 'En Línea para Chat'),
(527, 'Offsite Available', 'Disponibile fuori Sede', 'Offsite Available', 'Disponible fuera oficina'),
(528, 'Select Price Range', 'Seleziona Prezzo', 'Select Price Range', 'Seleccione Precios'),
(529, 'See More', 'Mostra altro', 'See More', 'Ver más'),
(530, 'See Less', 'Mostra meno', 'See Less', 'Ver menos'),
(531, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Política de Privacidad'),
(532, 'World of Professionals', 'Mondo delle Professioni', 'World of Professions', 'Mundo de las Profesiones'),
(533, 'Latest Posts from our Professionals', 'Ultimi Post dei nostri Professionisti', 'Latest Posts from our Professionals', 'Últimos Posts de nuestros Profesionales'),
(534, 'Directory Template', 'DoveCercare', 'DoveCercare', 'DoveCercare'),
(535, 'Create your own directory website by using Superlist template incorporating all features of modern directory website.', 'Crea il tuo profilo professionale, inserisci i tuoi servizi<br>inizia subito a ricevere prenotazioni.', 'Create your professional profile, enter your services <br> get immediately bookings.', 'Crear tu perfil profesional, introduzca tu servicios <br> comienza inmediatamente a recibir reservas.'),
(536, 'Find a dog sitter near you', 'Servizio, Consulenza o Professionista?', 'Service, Consulting or Professional?', 'Servicio, Consultoría o Profesional?');
INSERT INTO `ds_language_labels` (`id`, `label`, `valueit`, `value`, `valuees`) VALUES
(537, 'With thousands of trusted and insured dog sitters, you are sure to find the perfect one', 'Puoi cercare tra le tantissime categorie di servizi, chattare online con i Professionisti. Se non riesci a trovare il tuo servizio,  pubblica una richiesta.', 'You can search between many services categories, chat online with Professionals. If you can''t find your service, make a Service Request.', 'Puedes buscar entre las muchas categorías de servicios, chatear en línea con los Profesionales. Si no encontras tu servicio, puedes hacer una solicitud.'),
(538, 'Schedule, book and pay online', 'Scegli data orario e prenota.', 'Choose the date, time and book.', 'Elije fecha, hora y reserva tu cita.'),
(539, 'No need for cash, and all bookings through the site are covered by pet insurance and a 24/7 vet line.', 'Scegli comodamente data e orario del tuo appuntamento, prenota e decidi se ottenere il servizio in sede o direttamente a casa tua.', 'Choose comfortably the date and time of your appointment, book it and decide whether to get the service, to the office or directly at your home.', 'Elija cómodamente la fecha y hora de tu cita y decide si quieres tener el servicio en la oficina o directamente a tu casa.'),
(540, 'Happy Dog!', 'Paga Online o in Ufficio.', 'Pay Online or to the Office.', 'Paga en línea o en Oficina.'),
(541, 'Send your pooch on his own holiday confident he will have more fun than you.', 'Paga in tutta sicurezza e, se scegli di pagare online, costa meno.', 'Pay safely and, if you choose to pay online, pay less.', 'Pague con seguridad y, si decides  de pagar en línea, cuesta menos.'),
(542, 'City of', 'Città di', 'City of', 'Ciudad de'),
(543, 'with online payment', 'Pagamento Online', 'Online Payment ', 'Pago en línea'),
(544, 'Other', 'Altro', 'Other', 'Otros'),
(545, 'By', 'Di', 'By', 'Por'),
(546, 'Select Language', 'Seleziona la lingua', 'Select Language', 'Seleccione idioma'),
(547, 'Jan', 'Jan', 'Jan', 'Enero'),
(548, 'Feb', 'Febbraio', 'Feb', 'Febrero'),
(549, 'Mar', 'Marzo', 'Mar', 'Marzo'),
(550, 'Apr', 'Aprile', 'Apr', 'Abril'),
(551, 'Jun', 'Giugno', 'Jun', 'Junio'),
(552, 'Jul', 'Luglio', 'Jul', 'Julio'),
(553, 'Aug', 'Agosto', 'Aug', 'Agosto'),
(554, 'Sep', 'Settembre', 'Sep', 'Septiembre'),
(555, 'Oct', 'Ottobre', 'Oct', 'Octubre'),
(556, 'Nov', 'Novembre', 'Nov', 'Noviembre'),
(557, 'Dec', 'Dicembre', 'Dec', 'Diciembre'),
(558, 'ON', 'SI', 'YES', 'SI'),
(559, 'OFF', 'NO', 'NO', 'NO'),
(560, 'None selected', 'Nessuna selezione', 'None selected', 'Ninguna seleccionada'),
(561, 'All selected', 'Tutti selezionati', 'All selected', 'Todo seleccionado'),
(562, 'Select all', 'Seleziona tutto', 'Select all', 'Seleccionar todo'),
(563, 'Email does not exist.', 'Email `t di Doesn Exist', 'Email Doesn`t Exist', 'Correo electrónico doesn `t Existir'),
(564, 'review', 'Recensione', 'Review', 'Revisión'),
(565, 'links not allowed', 'Inserire tutti i dettagli "I miei dati" senza vari link', 'Enter all the details "My information" without various links', 'Introduzca todos los detalles "Mi información" sin varios enlaces'),
(566, 'need atleast one office', 'Hai bisogno di creare al-almeno un ufficio', 'Need to create al-least one office', 'Necesidad de crear al-menos una oficina'),
(567, 'need atleast one service', 'Hai bisogno di creare at-almeno un servizio', 'Need to create at-least one service', 'Necesidad de crear al menos un servicio-'),
(568, 'Subject', 'Soggetto', 'Subject', 'Sujeto'),
(569, 'Contact Success', 'E-mail Invia con successo il nostro team di supporto sarà contatteremo al più presto', 'Email Send Successfully Our Support Team Will Contact You Soon', 'Correo electrónico Enviar éxito Nuestro equipo de soporte le contactará pronto'),
(570, 'Privacy Policy Management', 'Privacy Policy Management', 'Privacy Policy Management', 'Política de Privacidad Gestión'),
(571, 'Terms Condition Management', 'Termini e Condizioni Gestione', 'Terms & Condition Management', 'Términos y Gestión Condición'),
(572, 'Help Management', 'Aiuto Gestione', 'Help Management', 'Gestión de Ayuda'),
(573, 'How it works Management', 'Come funziona Gestione', 'How it works Management', 'Cómo funciona Gestión'),
(574, 'Policy', 'Politica', 'Policy', 'Política'),
(575, 'Content', 'Soddisfare', 'Content', 'Contenido'),
(576, 'Management', 'Gestione', 'Management', 'administración'),
(577, 'Add', 'Aggiungere', 'Add', 'Añadir'),
(578, 'Success', 'Successo', 'Success', 'Éxito'),
(579, 'Error', 'Errore', 'Error', 'Error'),
(580, 'Terms', 'condizioni', 'Terms', 'Condiciones'),
(581, '@ not allowed', '"@" Carattere non ammessi', '"@" character not allowed', '"@" Carácter no permitido'),
(582, 'duration time', 'Durata tempo dovrebbe essere un minimo di 15 minuti', 'Duration Time Should be minimum 15 minutes', 'Tiempo de duración debe ser mínimo 15 minutos'),
(583, 'Appointment date should be atleast 1 day before', 'Data dell''appuntamento deve essere di almeno 1 giorno prima', 'Appointment date should be atleast 1 day before', 'Fecha de la cita debe ser de al menos 1 día antes'),
(584, 'booked date should be different', 'data prenotata dovrebbe essere diverso', 'booked date should be different', 'fecha reservada debe ser diferente'),
(585, 'profile decription length', 'Aggiungi il tuo informazioni min 80 caratteri max 1200 chars', 'Add your information min 80 chars max 1200 chars', 'Añade tu información min 80 caracteres max 1200 chars'),
(586, 'select country', 'Seleziona il tuo paese', 'Select Your Country', 'Selecciona tu país'),
(587, 'select language', 'Scegli le lingue parlate', 'Select your languages spoken', 'Seleccione sus lenguas habladas'),
(588, 'Languages spoken', 'Lingue parlate', 'Languages Spoken', 'Idiomas hablados'),
(589, 'city of', 'Città di college o ordine', 'City of college or order', 'Ciudad de la universidad o el orden'),
(590, 'reg no', 'Numero di registrazione', 'Registration Number', 'Número de registro'),
(591, 'registration type', 'Seleziona il tuo tipo di registrazione', 'Select your Registration Type', 'Seleccione el Tipo de registro'),
(592, 'max five category', 'è possibile selezionare un massimo di cinque categorie', 'you can select maximum five categories', 'puede seleccionar un máximo de cinco categorías'),
(593, 'Min: 80 Characters, Max: 1200 Characters', 'Min: 80 caratteri, N. max: 1200 caratteri', 'Min: 80 Characters, Max: 1200 Characters', 'Min: 80 caracteres, Máx: 1200 Personajes'),
(594, 'Company Management', 'società di Gestione', 'Company Management', 'Administración de la compañía'),
(595, 'action', 'Azione', 'Action', 'Acción'),
(596, 'Consumer Detail', 'Dettaglio dei consumatori', 'Consumer Detail', 'Detalle del Consumidor'),
(597, 'Consumer Offers', 'Offerte di consumo', 'Consumer Offers', 'Ofertas de consumo'),
(598, 'There is no available loyalties', 'Non ci sono lealtà disponibili', 'There is no available loyalties', 'No hay lealtades disponibles'),
(599, 'Professional user unblocked', 'Utente professionale sbloccato con successo', 'Professional user successfully unblocked', 'Usuario profesional desbloqueó con éxito'),
(600, 'Professional user blocked', 'Utente professionale bloccato', 'Professional user successfully blocked', 'Usuario profesional bloqueado con éxito'),
(601, 'your account has been blocked, please contact our support', 'il tuo account è stato bloccato, si prega di contattare il nostro supporto', 'Your Account Has Been Blocked, Please contact our support', 'tu cuenta ha sido bloqueada, por favor póngase en contacto con nuestro apoyo'),
(602, 'user unblocked', 'utente sbloccato con successo', 'user successfully unblocked', 'usuario desbloqueó con éxito'),
(603, 'user blocked', 'utente bloccato con successo', 'user successfully blocked', 'usuario bloqueado con éxito'),
(604, 'howitworks', 'Come funziona', 'How It Works', '¿Cómo funciona?'),
(605, 'Register as', 'Registrati come', 'Register as', 'Registrarse como'),
(606, 'user type', 'Tipo di utente', 'User Type', 'Tipo de usuario'),
(607, 'agree Terms and Condition', 'Accetto i Termini e Condizioni', 'I Agree To Terms and Condition', 'Acepto Términos y Condiciones'),
(608, 'agree Privacy Policy', 'Acepto la Política de Privacidad', 'I Agree To Privacy Policy', 'Accetto l''informativa sulla privacy'),
(609, 'Website Management', 'Gestione del sito', 'Website Management', 'Mantenimiento del Sitio Web'),
(610, 'Website', 'sito web', 'Website', 'Sitio web'),
(611, 'Create account', 'Crea un account', 'Create account', 'crear cuenta'),
(612, 'and', 'e', 'and', 'y'),
(613, 'By registering you confirm that you accept the', 'Con l''iscrizione si conferma di accettare la', 'By registering you confirm that you accept the', 'Al registrarse usted confirma que acepta el'),
(614, 'Remember me', 'Ricordati di me', 'Remember me', 'Recuérdame'),
(615, 'Don`t have an account yet?', 'Non hai ancora un tuo account?', 'Don`t have an account yet?', '¿No tienes una cuenta todavía?'),
(616, 'Messasge', 'Mensaje', 'Message', 'Messaggio'),
(617, 'Message Management', 'Gestión Mensaje', 'Message Management', 'Gestione del messaggio'),
(618, 'Profesional User', 'usuario Professional', 'Professional User', 'utente professionale'),
(619, 'general user ', 'usuario general', 'General User', 'utente generale'),
(620, 'Read Less', 'Leggi meno', 'Read Less', 'leer Menos'),
(621, 'Write your message here...', 'Scrivi il tuo messaggio qui ...', 'Write your message here...', 'Escribe un mensaje aquí ...'),
(622, 'Login as', 'Accedi come', 'Login as', 'Inicie la sesión como'),
(623, 'Invite', 'invitare', 'Invite', 'invitar'),
(624, 'Invite Message', 'Invita Messaggio', 'Invite Message', 'invitar Mensaje'),
(625, 'Invite your friend by typing email address below: ', 'Invita amico digitando il tuo indirizzo Email:', 'Invite your friend by typing email address below: ', 'Invite a su amigo escribiendo dirección de correo electrónico a continuación:'),
(626, 'Invite Friend', 'Invita un amico', 'Invite Friend', 'invitar amigo'),
(627, 'characters left', 'caratteri rimanenti', 'characters left', 'quedan caracteres'),
(628, 'valid email', 'Si prega di inserire l''indirizzo e-mail valido', 'Please enter valid email address', 'Por favor, introduzca la dirección de correo electrónico válida'),
(629, 'Hello, I visited http://mela.dovecercare.com/ and it''s great, you should visit it and sign up.', 'Ciao, ho visitato http://mela.dovecercare.com/ ed è grande, vi consigliamo di visitare e registrarsi.', 'Hello, I visited http://mela.dovecercare.com/ and it''s great, you should visit it and sign up.', 'Hola, visité http://mela.dovecercare.com/ y es genial, usted debe visitar y registrarse.'),
(630, 'Invited you to join', 'Ti ha invitato a partecipare', 'Invited you to join', 'Te ha invitado a unirse a'),
(631, 'Receiver Name', 'Nome del destinatario', 'Receiver Name', 'Nombre del destinatario'),
(632, 'Receiver Type', 'Tipo di ricevitore', 'Receiver Type', 'Tipo de receptor'),
(633, 'Invoice Management', 'gestione delle fatture', 'Invoice Management', 'Gestión de Facturas'),
(634, 'Company Name', 'Nome della ditta', 'Company Name', 'nombre de empresa'),
(635, 'street', 'strada', 'Street', 'Calle'),
(636, 'NO.', 'NO.', 'NO.', 'NO.'),
(637, 'region', 'regione', 'Region', 'región'),
(638, 'city', 'città', 'City', 'ciudad'),
(639, 'country tax', 'paese fiscale', 'Country Tax', 'Impuestos país'),
(640, 'company extra ue', 'Società Extra UE', 'Company Extra UE', 'Compañía-UE'),
(641, 'Company With UE VAT ID', 'Azienda con Partita IVA UE', 'Company With UE VAT ID', 'Compañía Con IVA de la UE ID'),
(642, 'Company With VAT ID', 'Società con partita IVA', 'Company With VAT ID', 'Empresa con número de identificación fiscal'),
(643, 'Payment Gateway', 'Gateway di pagamento', 'Payment Gateway', 'pasarela de pago'),
(644, 'paypal', 'Paypal', 'Paypal', 'Paypal'),
(645, 'payment account email', 'Conto di pagamento e-mail', 'Payment Account Email', 'Cuenta de pago por correo electrónico'),
(646, 'Invoice Update Successfully', 'Fattura aggiornamento con successo', 'Invoice Update Successfully', 'Factura actualizar correctamente'),
(647, 'Need to have an payment account', 'Necessario disporre di un conto di pagamento', 'Need to have an payment account', 'Necesita tener una cuenta de pago'),
(648, 'Write On DoveCercare', 'Scrivere su Dove Cercare', 'Write On DoveCercare', 'Escribe sobre dónde buscar'),
(649, 'Remember that yuo can cancel your service untill 1 day before your appointemt date', 'Ricorda che puoi annullare il servizio fino a 1 giorno prima della data di appuntamento', 'Remember that you can cancel your service untill 1 day before your appointemt date', 'Recuerde que puede cancelar su servicio hasta el 1 día antes de su cita'),
(650, 'Category Already Added', 'Categoria Già Aggiunto', 'Category Already Added', 'Ya se ha añadido la categoría'),
(651, 'Sub-category Already Added', 'Sotto-categoria già Aggiunto', 'Sub-category Already Added', 'Sotto-categoria già Aggiunto'),
(652, 'Site is under maintenance', 'Sito è in manutenzione', 'Site is under maintenance', 'El sitio se encuentra en mantenimiento'),
(653, 'World Of Professional', 'World Of professionale', 'World Of Professional', 'World Of Profesional'),
(654, 'Your book has been added on cart successfully', 'Il tuo libro è stato aggiunto-on della spesa con successo', 'Your book has been added on cart successfully', 'Su libro ha sido añadido a la cesta con éxito'),
(655, 'Free Service', 'Servizio gratuito', 'Free Service', 'Servicio gratuito'),
(656, 'Your service has been cancelled succssfully', 'Il vostro servizio è stato annullato con successo', 'Your service has been cancelled successfully', 'Su servicio ha sido cancelado correctamente'),
(657, 'User has cancelled your service', 'El usuario ha cancelado su servicio', 'User has cancelled your service', 'L''utente ha cancellato il servizio'),
(658, 'you can create maximum 5 offices', 'è possibile creare un massimo di 5 uffici', 'you can create maximum 5 offices', 'puede crear un máximo de 5 oficinas'),
(659, 'Address Area', 'indirizzo Area', 'Address Area', 'Área de dirección'),
(660, 'Telephone', 'Telefono', 'Telephone', 'Teléfono'),
(661, 'Select Your Availability', 'Seleziona la tua disponibilità', 'Select Your Availability', 'Seleccione su disponibilidad'),
(662, 'Available in down town', 'Disponibile in centro', 'Available in down town', 'Disponibles en el centro'),
(663, 'Available in the province', 'Disponibile in provincia', 'Available in the province', 'Disponible en la provincia'),
(664, 'In the region', 'Nella regione', 'In the region', 'En la región'),
(665, 'Available in the country', 'Disponibile nel paese', 'Available in the country', 'Disponible en el país'),
(666, 'Available within max km range', 'Disponibile entro la portata max km', 'Available within max km range', 'Disponible dentro del rango km max'),
(667, 'Free Service', 'Servizio gratuito', 'Free Service', 'Servicio gratuito'),
(668, 'Delivery Date', 'Data di consegna', 'Delivery Date', 'Fecha de entrega'),
(669, 'Request a Service', 'Richiedere il servizio', 'Request a Service', 'Solicitar un Servicio'),
(670, 'Add the title of your request', 'Aggiungere il titolo della tua richiesta', 'Add the title of your request', 'Añadir el título de su solicitud'),
(671, 'Select the category of professionals where to send the request', 'Seleziona la categoria di professionisti dove inviare la richiesta', 'Select the category of professionals where to send the request', 'Seleccione la categoría de profesionales dónde enviar la solicitud'),
(672, 'Type the days from 1 day to maximum 30 days', 'Digitare i giorni da 1 giorno a 30 giorni al massimo', 'Type the days from 1 day to 30 days maximum', 'Escriba los días de 1 día a 30 días como máximo'),
(673, 'Select your budget € 5 minimum', 'Seleziona il tuo budget minimo 5 £', 'Select your budget £ 5 minimum', 'Seleccione su presupuesto mínimo de 5 £'),
(674, 'Send Request', 'Invia richiesta', 'Send Request', 'Enviar petición'),
(675, 'The Request will be sent to all professionals of category choosen. By Sending this request you confirm that you accept', 'La richiesta sarà inviata a tutti i professionisti della categoria prescelta. Con l''invio di questa richiesta confermi di accettare', 'The Request will be sent to all professionals of category chosen. By Sending this request you confirm That you accept', 'La solicitud se enviará a todos los profesionales de la categoría elegida. Al enviar esta solicitud se confirma que acepta'),
(676, 'Describe your request, please add as more details as possible.', 'Descrivi la tua richiesta, si prega di aggiungere come più dettagli possibile.', 'Describe your request, please add as more details as possible.', 'Describir su solicitud, por favor añadir más detalles.'),
(677, 'Attach File', 'Allega file', 'Attach File', 'Adjuntar archivo'),
(678, 'Max Size 30 MB', 'Max Dimensione 30 MB', 'Max Size 30 MB', 'Tamaño máximo de 30 MB'),
(679, 'lets get started', 'Iniziamo', 'lets get started', 'empecemos'),
(680, 'delivery time', 'tempo di consegna', 'delivery time', 'el tiempo de entrega'),
(681, 'set your budget', 'impostare il budget', 'set your budget', 'establecer su presupuesto'),
(682, 'define in detail', 'definire nel dettaglio', 'define in detail', 'definir en detalle'),
(683, 'choose the category and subcategory that best fits your request', 'Scegli la categoria e sottocategoria che meglio si adatta la vostra richiesta', 'Choose the category and subcategory that best fits your request', 'elegir la categoría y subcategoría que mejor se adapte a su solicitud'),
(684, 'For example:', 'Per esempio:', 'For example:', 'Por ejemplo:'),
(685, 'If you are looking for a logo, you should choose "logo design" with in the "graphics & design" category', 'Se siete alla ricerca di un logo, si dovrebbe scegliere "Logo Design" con la categoria "Grafica & Design"', 'If you are looking for a logo, you should choose "Logo Design" with in the "Graphics & Design" category', 'Si usted está buscando un logotipo, que debe elegir "Logo Design", con la categoría de "Gráficos y Diseño"'),
(686, 'If you are looking for a logo, you should choose logo design with in the graphics & design category', 'Se siete alla ricerca di un logo, si dovrebbe scegliere "Logo Design" con la categoria "Grafica & Design"', 'If you are looking for a logo, you should choose "Logo Design" with in the "Graphics & Design" category', 'Si usted está buscando un logotipo, que debe elegir "Logo Design", con la categoría de "Gráficos y Diseño"'),
(687, 'This is the amount of time the seller has to work on your order. Please note that a request for faster delivery may impact the price.', 'Questa è la quantità di tempo che il venditore deve lavorare per il vostro acquisto. Si prega di notare che la richiesta di consegna più veloce può influire il prezzo.', 'This is the amount of time the seller has to work on your order. Please note that a request for faster delivery may impact the price.', 'Esta es la cantidad de tiempo que el vendedor tiene que trabajar en su pedido. Tenga en cuenta que una solicitud de entrega más rápida puede afectar el precio.'),
(688, 'Enter an amount you are willing to spend for this service', 'Inserisci un importo che si è disposti a spendere per questo servizio', 'Enter an amount you are willing to spend for this service', 'Introduzca una cantidad que está dispuesto a pagar por este servicio'),
(689, 'Include all the necessary details needed to complete your request.', 'Includere tutti i dettagli necessari necessari per completare la richiesta.', 'Include all the necessary details needed to complete your request.', 'Incluir todos los detalles necesarios para completar su solicitud.'),
(690, 'If you are looking for a logo, you can specify your company name, bussiness type,preferred color etc.', 'Se siete alla ricerca di un logo, è possibile specificare il nome della società, tipo di attività, colore preferito etc.', 'If you are looking for a logo, you can specify your company name, bussiness type,preferred color etc.', 'Si usted está buscando un logotipo, puede especificar el nombre de la empresa, tipo de negocio, el color preferido, etc.'),
(691, 'you need to login', 'effettua il login', 'You need to login', 'necesitas iniciar sesión'),
(692, 'File size should be less than 30 MB !', 'dimensione del file deve essere inferiore a 30 MB!', 'File size should be less than 30 MB !', 'Tamaño del archivo debe ser inferior a 30 MB!'),
(693, 'Your request successfully created', 'La tua richiesta ha creato con successo', 'Your request successfully created', 'Su solicitud ha creado correctamente'),
(694, 'made a New Request by DoveCercare!', 'fatta una nuova richiesta da DoveCercare!', 'made a New Request by DoveCercare!', 'presentó una nueva solicitud por DoveCercare!'),
(695, 'Requests', 'richieste', 'Requests', 'Peticiones'),
(696, 'Expiring Date', 'Data scadenza', 'Expiring Date', 'Fecha que expira'),
(697, 'Budget', 'bilancio', 'Budget', 'presupuesto'),
(698, 'Request Name', 'richiesta Nome', 'Request Name', 'Solicitar nombre'),
(699, 'Closed', 'chiuso', 'Closed', 'cerrado'),
(700, 'Re-Open', 'riaprire', 'Re-Open', 'reabrir'),
(701, 'Pause', 'pausa', 'Pause', 'pausa'),
(702, 'None', 'nessuno', 'None', 'ninguno'),
(703, 'My Requests', 'Le mie richieste', 'My Requests', 'Mis solicitudes'),
(704, 'No Requests Found', 'Richieste non trovata', 'No Requests Found', 'No se han encontrado peticiones'),
(705, 'Attachement', 'attaccamento', 'Attachement', 'accesorio'),
(706, 'deleted a Request by DoveCercare!', 'cancellato una richiesta da parte DoveCercare!', 'deleted a Request by DoveCercare!', 'Solicitud de un borrado DoveCercare!'),
(707, 'changed status of Request by', 'stato modificato di Richiesta', 'changed status of Request by', 'ha cambiado de estado de Solicitud'),
(708, 'Current Status', 'Stato corrente', 'Current Status', 'Estado actual'),
(709, 'Leave a Reply', 'Lascia un Commento', 'Leave a Reply', 'Deja un comentario'),
(710, 'Please fill message field !', 'Si prega di compilare campo del messaggio!', 'Please fill message field !', 'Por favor, rellene los campos del mensaje!'),
(711, 'Something wrong please try again !', 'Qualcosa non va riprova!', 'Something wrong please try again !', 'Algo mal por favor intente de nuevo!'),
(712, 'has replied on your post request', 'Hai risposto alla richiesta posta', 'has replied on your post request', 'ha respondido a su solicitud POST'),
(713, 'Completed', 'Completato', 'Completed', 'Terminado'),
(714, 'This book has been already used', 'Questo libro è stato già utilizzato', 'This book has been already used', 'Este libro ha sido ya utilizado'),
(715, 'Payment', 'Pagamento', 'Payment', 'Pago'),
(716, 'Email-id Verified', 'E-mail-id Verificati', 'Email-id Verified', 'Correo-id verificado'),
(717, 'Phone Verified', 'Telefono Verificato', 'Phone Verified', 'teléfono verificado'),
(718, 'Phone Not Verified', 'Telefono non verificato', 'Phone Not Verified', 'Teléfono No Verificado'),
(719, 'Payment Verified', 'pagamento ha verificato', 'Payment Verified', 'pago verificara'),
(720, 'Payment Not Verified', 'Il pagamento non verificato', 'Payment Not Verified', 'Pago No Verificado'),
(721, 'Sender', 'Mittente', 'Sender', 'Remitente'),
(722, 'Receiver', 'Ricevitore', 'Receiver', 'Receptor'),
(723, 'Sent Time', 'Tempo Sent', 'Sent Time', 'Hora de envío');

-- --------------------------------------------------------

--
-- Table structure for table `ds_language_labels_copy`
--

CREATE TABLE IF NOT EXISTS `ds_language_labels_copy` (
  `id` int(11) NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `valueit` varchar(300) DEFAULT NULL,
  `value` varchar(300) DEFAULT NULL,
  `valuees` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_language_labels_copy`
--

INSERT INTO `ds_language_labels_copy` (`id`, `label`, `valueit`, `value`, `valuees`) VALUES
(1, 'Dashboard', 'Cruscotto', 'Dashboard', 'Tablero'),
(2, 'Dashboard will come soon!', 'Dashboard arriverà presto!', 'Dashboard will come soon!', 'Dashboard vendrá pronto!'),
(3, 'Professional Management', 'Gestione Professionale', 'Professional Management', 'Gestión Profesional'),
(4, 'Category Management', 'Gestione Categoria', 'Category Management', 'Administración de categorias'),
(5, 'Service Management', 'Gestione Dei Servizi', 'Service Management', 'Gestión De Servicios'),
(6, 'Post Management', 'Gestione post', 'Post Management', 'Gestión del anuncio'),
(7, 'World of Profession', 'Mondo della Professione', 'World of Profession', 'Mundial de la Profesión'),
(8, 'User Management', 'Gestione Utenti', 'User Management', 'Gestión de usuarios'),
(9, 'Offer Management', 'Offerta di Gestione', 'Offer Management', 'Gestión de ofertas'),
(10, 'Loyalty Management', 'Gestione Loyalty', 'Loyalty Management', 'Gestión de Lealtad'),
(11, 'Office Management', 'Gestione dell''ufficio', 'Office Management', 'Gestión de Oficina'),
(12, 'Plan Management', 'Piano di Gestione', 'Plan Management', 'Plan de Gestión'),
(13, 'Professional', 'Professionale', 'Professional', 'Profesional'),
(14, 'List', 'Lista', 'List', 'Lista'),
(15, 'Professional List', 'Lista Professionale', 'Professional List', 'Lista Profesional'),
(16, 'Name', 'Nome', 'Name', 'Nombre'),
(17, 'Email', 'Email', 'Email', 'Email'),
(18, 'Phone', 'Telefono', 'Phone', 'Teléfono'),
(19, 'VAT ID', 'Partita Iva', 'VAT ID', 'ID de IVA'),
(20, 'SMS', 'SMS', 'SMS', 'SMS'),
(21, 'Created At', 'Creato il', 'Created At', 'Creado en'),
(22, 'Edit', 'Modifica', 'Edit', 'Editar'),
(23, 'Feedback', 'Retroazione', 'Feedback', 'Realimentación'),
(24, 'Delete', 'Cancellare', 'Delete', 'Borrar'),
(25, 'Add New', 'Aggiungere Nuova', 'Add New', 'Agregar nuevo'),
(26, 'Icon', 'Icona', 'Icon', 'Icono'),
(27, 'Sub Categories', 'Sotto Categorie', 'Sub Categories', 'Sub Categorías'),
(28, 'Description', 'Descrizione', 'Description', 'Descripción'),
(29, 'Create', 'Creare', 'Create', 'Crear'),
(30, 'Category', 'Categoria', 'Category', 'Categoría'),
(31, 'Password', 'Password', 'Password', 'Clave'),
(32, 'Country', 'Nazione', 'Country', 'País'),
(33, 'Languages', 'Lingue', 'Languages', 'Idiomas'),
(34, 'Hourly Rate', 'Tariffa oraria', 'Hourly Rate', 'Tarifa por hora'),
(35, 'Registered to', 'Registrato a', 'Registered to', 'Registrado a'),
(36, 'City of College or Order', 'Città di College o Ordine', 'City of College or Order', 'Ciudad de College u Orden'),
(37, 'Registration Number', 'Numero di registrazione', 'Registration Number', 'Numero de registro'),
(38, 'Keyword', 'Parola chiave', 'Keyword', 'Palabra clave'),
(39, 'Photo', 'Foto', 'Photo', 'Foto'),
(40, 'Select image', 'Seleziona immagine', 'Select image', 'Seleccionar imagen'),
(41, 'Change', 'Cambiamento', 'Change', 'Cambiar'),
(42, 'Remove', 'Rimuovere', 'Remove', 'Eliminar'),
(43, 'Save', 'Salva', 'Save', 'Guardar'),
(44, 'Back', 'Indietro', 'Back', 'Atrás'),
(45, 'Click the button to change the Icon', 'Fare clic sul pulsante per cambiare l''icona', 'Click the button to change the Icon', 'Haga clic en el botón para cambiar el icono'),
(46, 'Select Professional', 'Seleziona professionale', 'Select Professional', 'Seleccionar Profesional'),
(47, 'Service Available', 'Servizio disponibile', 'Service Available', 'Servicio disponible'),
(48, 'Duration', 'Durata', 'Duration', 'Duración'),
(49, 'min', 'min', 'min', 'min'),
(50, 'Office', 'Ufficio', 'Office', 'Oficina'),
(51, 'Find Address', 'Trova indirizzo', 'Find Address', 'Buscar dirección'),
(52, 'Available out of office', 'Disponibile fuori sede', 'Available out of office', 'Disponible fuera de la oficina'),
(53, 'Discount Available', 'Sconto disponibile', 'Discount Available', 'Descuento disponible'),
(54, 'Price', 'Prezzo', 'Price', 'Precio'),
(55, 'Amount of Book at a time', 'Quantità di libro alla volta', 'Amount of Book at a time', 'Cantidad de libro a la vez'),
(56, 'Location', 'Posizione', 'Location', 'Localización'),
(57, 'Service List', 'Elenco servizi', 'Service List', 'Lista de servicios'),
(58, 'Service', 'Servizio', 'Service', 'Servicio'),
(59, 'Post', 'Posta', 'Post', 'Publicar'),
(60, 'Post List', 'Elenco Posta', 'Post List', 'Lista Publicar'),
(61, 'Title', 'Titolo', 'Title', 'Título'),
(62, 'Post Title', 'Titolo del post', 'Post Title', 'Título de la entrada'),
(63, 'Featured Image', 'Foto di presentazione', 'Featured Image', 'Foto principal'),
(64, 'User', 'Utilizzatore', 'User', 'Usuario'),
(65, 'User List', 'Elenco utenti', 'User List', 'Lista de usuarios'),
(66, 'Offer', 'Offerta', 'Offer', 'Oferta'),
(67, 'Offer List', 'Elenco prodotti', 'Offer List', 'Lista de producto'),
(68, 'Company', 'Società', 'Company', 'Compañía'),
(69, 'Received', 'Ricevuto', 'Received', 'Recibido'),
(70, 'Expire At', 'Alla scadenza', 'Expire At', 'Expirará al'),
(71, 'Select Company', 'Seleziona Azienda', 'Select Company', 'Seleccione la empresa'),
(72, 'Create Offer', 'Creare Offerta', 'Create Offer', 'Crear una Oferta'),
(73, 'Create User', 'Crea Utente', 'Create User', 'Crear usuario'),
(74, 'Create Post', 'Creare post', 'Create Post', 'Crear Mensaje'),
(75, 'Create Service', 'Crea Servizio', 'Create Service', 'Crear Servicio'),
(76, 'Add Professional', 'Aggiungere Professionale', 'Add Professional', 'Añadir Profesional'),
(77, 'Edit Professional', 'Modifica Professionale', 'Edit Professional', 'Edición Profesional'),
(78, 'Edit Category', 'Modifica Categoria', 'Edit Category', 'Editar categoría'),
(79, 'Edit Post', 'Modifica Messaggio', 'Edit Post', 'Editar Mensaje'),
(80, 'Edit User', 'Modifica utente', 'Edit User', 'Editar usuario'),
(81, 'Edit Offer', 'Modifica Offerta', 'Edit Offer', 'Editar Oferta'),
(82, 'Loyalty', 'Lealtà', 'Loyalty', 'Lealtad'),
(83, 'Create Loyalty', 'Creare Fedeltà', 'Create Loyalty', 'Crear Lealtad'),
(84, 'Edit Loyalty', 'Modifica Fedeltà', 'Edit Loyalty', 'Editar Lealtad'),
(85, 'Count Stamp', 'Conte Timbro', 'Count Stamp', 'Conde sello'),
(86, 'Address', 'Indirizzo', 'Address', 'Dirección'),
(87, 'Holidays', 'Vacanze', 'Holidays', 'Vacaciones'),
(88, 'January', 'Gennaio', 'January', 'Enero'),
(89, 'February', 'Febbraio', 'February', 'Febrero'),
(90, 'March', 'Marzo', 'March', 'Marcha'),
(91, 'April', 'Aprile', 'April', 'Abril'),
(92, 'May', 'Maggio', 'May', 'Mayo'),
(93, 'June', 'Giugno', 'June', 'Junio'),
(94, 'July', 'Luglio', 'July', 'Julio'),
(95, 'August', 'Agosto', 'August', 'Agosto'),
(96, 'September', 'Settembre', 'September', 'Setiembre'),
(97, 'October', 'Ottobre', 'October', 'Octubre'),
(98, 'November', 'Novembre', 'November', 'Noviembre'),
(99, 'December', 'Dicembre', 'December', 'Diciembre'),
(100, 'Opening Hours', 'Orari di apertura', 'Opening Hours', 'Horario de apertura'),
(101, 'Mon', 'Mon', 'Mon', 'Lun'),
(102, 'Tue', 'Mar', 'Tue', 'Mar'),
(103, 'Wed', 'Mer', 'Wed', 'Mier'),
(104, 'Thu', 'Gio', 'Thu', 'Jue'),
(105, 'Fri', 'Fri', 'Fri', 'Vie'),
(106, 'Sat', 'Sat', 'Sat', 'Sáb'),
(107, 'Sun', 'Sun', 'Sun', 'Sol'),
(108, 'Plan', 'Piano', 'Plan', 'Plano'),
(109, 'Plan List', 'Piano Lista', 'Plan List', 'Lista plan'),
(110, 'Code', 'Codice', 'Code', 'Prefijo'),
(111, 'Type', 'Tipo', 'Type', 'Escribe'),
(112, 'Create Plan', 'Creare Piano', 'Create Plan', 'Crear plan'),
(113, 'Per Year', 'All''anno', 'Per Year', 'Por año'),
(114, 'Per Service', 'Per Servizio', 'Per Service', 'Por Servicio'),
(115, 'Sign Out', 'Disconnessione', 'Sign Out', 'Desconectarse'),
(116, 'Administrator Login', 'Accesso dell''amministratore', 'Administrator Login', 'Administrador de inicio de sesión'),
(117, 'Username', 'Nome Utente', 'Username', 'Nombre de usuario'),
(118, 'Sign in', 'Registrati', 'Sign in', 'Registrarse'),
(119, 'Register', 'Registrazione', 'Register', 'Registro'),
(120, 'Forgot Password', 'Ha dimenticato la password', 'Forgot Password', 'Se te olvidó tu contraseña'),
(121, 'Welcome back!', 'Bentornato!', 'Welcome back!', 'Bienvenido de vuelta!'),
(122, 'User has been saved successfully', 'L''utente è stato salvato con successo', 'User has been saved successfully', 'El usuario ha sido guardado con éxito'),
(123, 'User has been deleted successfully', 'Utente è stato eliminato con successo', 'User has been deleted successfully', 'El usuario ha sido eliminado correctamente'),
(124, 'This user has been already used', 'Questo utente è stato già utilizzato', 'This User has been already used', 'Este usuario no ha sido ya utilizado'),
(125, 'Sub category has been saved successfully', 'Sotto categoria è stato salvato con successo', 'Sub Category has been saved successfully', 'Subcategoría ha sido guardado con éxito'),
(126, 'Sub category has been deleted successfully', 'Sotto categoria è stato eliminato con successo', 'Sub Category has been deleted successfully', 'Subcategoría se ha eliminado correctamente'),
(127, 'This sub category has been already used', 'Questa sottocategoria già utilizzata', 'This Sub Category has been already used', 'Esta categoría Sub ha sido ya utilizado'),
(128, 'Service has been saved successfully', 'Servizio è stato salvato con successo', 'Service has been saved successfully', 'El servicio ha sido guardado con éxito'),
(129, 'Store has been deleted successfully', 'Store è stato cancellato con successo', 'Store has been deleted successfully', 'Tienda se ha eliminado correctamente'),
(130, 'This store has been already used', 'Questo negozio è stato già utilizzato', 'This Store has been already used', 'Tienda se ha eliminado correctamente...'),
(131, 'Post has been saved successfully', 'Post è stato salvato con successo', 'Post has been saved successfully', 'Post ha sido guardado con éxito'),
(132, 'Post has been deleted successfully', 'Post è stato eliminato con successo', 'Post has been deleted successfully', 'Post ha sido eliminado correctamente'),
(133, 'This post has been already used', 'Questo post è stato già utilizzato', 'This Post has been already used', 'Esta publicación ha sido ya utilizado'),
(134, 'Category has been saved successfully', 'Categoria è stato salvato con successo', 'Category has been saved successfully', 'Categoría ha sido guardado con éxito'),
(135, 'Category has been deleted successfully', 'Categoria è stato eliminato con successo', 'Category has been deleted successfully', 'Categoría se ha eliminado correctamente'),
(136, 'This category has been already used', 'Questa categoria è stata già utilizzata', 'This Category has been already used', 'Esta categoría ha sido ya utilizado'),
(137, 'Plan has been saved successfully', 'Piano è stato salvato con successo', 'Plan has been saved successfully', 'Plan ha sido guardado con éxito'),
(138, 'Plan has been deleted successfully', 'Piano è stato eliminato con successo', 'Plan has been deleted successfully', 'Plan ha sido eliminado correctamente'),
(139, 'This plan has been already used', 'Questo Piano è stato già utilizzato', 'This Plan has been already used', 'Este Plan ha sido ya utilizado'),
(140, 'Office has been saved successfully', 'Ufficio è stato salvato con successo', 'Office has been saved successfully', 'Oficina ha sido guardado con éxito'),
(141, 'Office has been deleted successfully', 'Ufficio è stato eliminato con successo', 'Office has been deleted successfully', 'Oficina se ha eliminado correctamente'),
(142, 'This office has been already used', 'Questo Ufficio è stato già utilizzato', 'This Office has been already used', 'Esta Oficina ha sido ya utilizado'),
(143, 'Offer has been saved successfully', 'Offerta è stato salvato con successo', 'Offer has been saved successfully', 'Oferta ha sido guardado con éxito'),
(144, 'Offer has been deleted successfully', 'Offerta è stato eliminato con successo', 'Offer has been deleted successfully', 'Oferta se ha eliminado correctamente'),
(145, 'This offer has been already used', 'Questa offerta è stata già utilizzata', 'This Offer has been already used', 'Esta oferta ha sido ya utilizado'),
(146, 'Loyalty has been saved successfully', 'Fedeltà è stato salvato con successo', 'Loyalty has been saved successfully', 'La lealtad ha sido guardado con éxito'),
(147, 'Loyalty has been deleted successfully', 'Fedeltà è stato eliminato con successo', 'Loyalty has been deleted successfully', 'La lealtad se ha eliminado correctamente'),
(148, 'This loyalty has been already used', 'Questa fedeltà è stato già utilizzato', 'This Loyalty has been already used', 'Esta lealtad ha sido ya utilizado'),
(149, 'Company has been saved successfully', 'Società è stato salvato con successo', 'Company has been saved successfully', 'Company ha sido guardado con éxito'),
(150, 'Company has been deleted successfully', 'Società è stato eliminato con successo', 'Company has been deleted successfully', 'Empresa se ha eliminado correctamente'),
(151, 'This company has been already used', 'Questa società è stato già utilizzato', 'This Company has been already used', 'Esta empresa ha sido ya utilizado'),
(152, 'City has been saved successfully', 'City è stato salvato con successo', 'City has been saved successfully', 'City ha sido guardado con éxito'),
(153, 'City has been deleted successfully', 'Città è stato eliminato con successo', 'City has been deleted successfully', 'City ha sido eliminado correctamente'),
(154, 'This city has been already used', 'Questa Città è stato già utilizzato', 'This City has been already used', 'Esta ciudad ha sido ya utilizado'),
(155, 'Invalid username and password', 'Username e password non validi', 'Invalid username and password', 'Nombre de usuario y una contraseña no válida'),
(156, 'The account is already exist', 'L''account è già esistenti', 'The account is already exist', 'La cuenta es que ya existe'),
(157, 'Check your email to verify your account', 'Controlla la tua e-mail per verificare il tuo account', 'Check your email to verify your account', 'Revise su correo electrónico para verificar su cuenta'),
(158, 'You must verify your account to login.', 'È necessario verificare il tuo account per effettuare il login.', 'You must verify your account to login.', 'Usted debe verificar su cuenta para iniciar sesión.'),
(159, 'Resend Email', 'Rinvia l''e-mail', 'Resend Email', 'Reenviar email'),
(160, 'Invalid Email and Password', 'E-mail e Password non valida', 'Invalid Email and Password', 'No válida de correo electrónico y contraseña'),
(161, 'You left the feedback successfully. You got the Offer. Check your email.', 'Hai lasciato il feedback con successo. Hai l''Offerta. Controlla la tua email.', 'You left the feedback successfully. You got the Offer. Check your email.', 'Dejaste las votaciones éxito. Tienes la Oferta. Consultar su correo electrónico.'),
(162, 'Email is not exist', 'Email non esistono', 'Email is not exist', 'El correo electrónico no es existir'),
(163, 'Password has been reset successfully', 'La password è stata reimpostata', 'Password has been reset successfully', 'Contraseña se ha restablecido con éxito'),
(164, 'Password changes email has been sent', 'Le modifiche di password e-mail è stata inviata', 'Password changes email has been sent', 'Los cambios de contraseña de correo electrónico ha sido enviado'),
(165, 'You have successfully active your account', 'Avete successo attiva il tuo account', 'You have successfully active your account', 'Usted tiene éxito activa su cuenta'),
(166, 'User profile has been updated successfully', 'Profilo utente è stato aggiornato con successo', 'User profile has been updated successfully', 'Perfil de usuario se ha actualizado correctamente'),
(167, 'You sent your contact detail successfully', 'Hai mandato il vostro particolare contatto con successo', 'You sent your contact detail successfully', 'Tú enviaste a tu detalle de contactos con éxito'),
(168, 'You left the feedback successfully', 'Hai lasciato il feedback con successo', 'You left the feedback successfully', 'Dejaste las votaciones éxito'),
(169, 'Image has been uploaded successfully', 'Immagine è stato caricato con successo', 'Image has been uploaded successfully', 'La imagen se ha cargado correctamente'),
(170, 'Please select file to upload', 'Seleziona il file da caricare', 'Please select file to upload', 'Por favor, seleccione archivo a subir'),
(171, 'Your book has been added on cart successfully.', 'Il tuo libro è stato aggiunto sul carrello con successo.', 'Your book has been added on cart successfully.', 'Su libro ha sido añadido a la cesta con éxito.'),
(172, 'You have to login.', 'Devi effettuare il login.', 'You have to login.', 'Debes iniciar sesión.'),
(173, 'Please pick a date and duration', 'Si prega di scegliere la data e la durata', 'Please pick a date and duration', 'Por favor, elegir una fecha y duración'),
(174, 'Invalid Request', 'richiesta non valida', 'Invalid Request', 'Solicitud no válida'),
(175, 'The company has been removed succssfully from the cart', 'La società è stato rimosso con successo dal carrello', 'The company has been removed succssfully from the cart', 'La compañía se ha eliminado con éxito de la compra'),
(176, 'Your comment has been posted successfully.', 'Il tuo commento è stato pubblicato con successo.', 'Your comment has been posted successfully.', 'Su comentario ha sido publicado con éxito.'),
(177, 'You have already joined on this store.', 'Hai già aderito su questo negozio.', 'You have already joined on this store.', 'Usted ya ha sumado en esta tienda.'),
(178, 'You have successfully joined on this store.', 'Si sono uniti con successo su questo negozio.', 'You have successfully joined on this store.', 'Te has unido con éxito en esta tienda.'),
(179, 'You have purchased successfully.', 'Avete acquistato con successo.', 'You have purchased successfully.', 'Usted ha adquirido con éxito.'),
(180, 'You have failed on purchasing.', 'Hai fallito sull''acquisto.', 'You have failed on purchasing.', 'Usted ha fallado en la compra.'),
(181, 'Message has been sent successfully', 'La comunicazione è stata inviata con successo', 'Message has been sent successfully', 'Mensaje ha sido enviado con éxito'),
(182, 'Widget Setting has been updated successfully.', 'Impostazione Widget è stato aggiornato con successo.', 'Widget Setting has been updated successfully.', 'Ajuste Widget se ha actualizado correctamente.'),
(183, 'This consumer already registered on our business', 'Questo consumatore già registrato sul nostro business', 'This consumer already registered on our business', 'Este consumidor ya registrado en nuestro negocio'),
(184, 'This consumer has been registered successfully on our business', 'Questo consumo è stato registrato con successo il nostro business', 'This consumer has been registered successfully on our business', 'Este consumo se ha registrado correctamente en nuestro negocio'),
(185, 'Offer has been used.', 'Offerta è stato utilizzato.', 'Offer has been used.', 'Oferta ha sido utilizado.'),
(186, 'Loyalty has been used.', 'Fedeltà è stato utilizzato.', 'Loyalty has been used.', 'La lealtad se ha utilizado.'),
(187, 'You don''t have enough credits for sending Message', 'Non hai abbastanza crediti per l''invio del messaggio', 'You don''t have enough credits for sending Message', 'No tienes suficiente credito para enviar el mensaje'),
(188, 'Stamp has been added successfully.', 'Stamp è stato aggiunto con successo.', 'Stamp has been added successfully.', 'Sello se ha agregado correctamente.'),
(189, 'You subscribed successfully', 'Ti sei iscritto con successo', 'You subscribed successfully', 'Usted suscrito con éxito'),
(190, 'Subscribed cancelled successfully', 'Sottoscritta annullata correttamente', 'Subscribed cancelled successfully', 'Suscrito cancelado con éxito'),
(191, 'Store has been saved successfully', 'Store è stato salvato con successo', 'Store has been saved successfully', 'Tienda ha sido guardado con éxito'),
(192, 'Rating type has been saved successfully', 'Valutazione Type è stato salvato con successo', 'Rating type has been saved successfully', 'Habilitación de tipo ha sido guardado con éxito'),
(193, 'Rating type has been deleted successfully', 'Valutazione Tipo è stato eliminato con successo', 'Rating type has been deleted successfully', 'Habilitación de Tipo se ha eliminado correctamente'),
(194, 'This rating type has been already used', 'Questo tipo di valutazione è stato già utilizzato', 'This Rating Type has been already used', 'Esta habilitación de tipo ha sido ya utilizado'),
(195, 'Feedback has been deleted successfully', 'Il feedback è stato eliminato con successo', 'Feedback has been deleted successfully', 'Feedback se ha eliminado correctamente'),
(196, 'This feedback has been already used', 'Questo feedback è stato già utilizzato', 'This Feedback has been already used', 'Esta Evaluación ha sido ya utilizado'),
(197, 'Comment has been deleted successfully', 'Commento è stato eliminato con successo', 'Comment has been deleted successfully', 'Comentario se ha eliminado correctamente'),
(198, 'This comment has been already used', 'Questo commento è stato già utilizzato', 'This Comment has been already used', 'Este comentario ha sido ya utilizado'),
(199, 'Book has been deleted successfully', 'Libro è stato eliminato con successo', 'Book has been deleted successfully', 'Libro se ha eliminado correctamente'),
(200, 'This book has been already used', 'Questo libro è stato già utilizzato', 'This Book has been already used', 'Este libro ha sido ya utilizado'),
(201, 'Status updated successfully!', 'Stato aggiornato con successo!', 'Status updated successfully!', 'Estado actualizado correctamente!'),
(202, 'You have registered successfully.', 'Hai completato la registrazione con successo.', 'You have registered successfully.', 'Te has registrado exitosamente.'),
(203, 'You have failed on signup.', 'Hai fallito su iscrizione.', 'You have failed on signup.', 'Usted ha fallado en registrarse.'),
(204, 'Please login and complete your profile', 'Effettua il login e completa il tuo profilo', 'Please login and complete your profile', 'Por favor, iniciar sesión y completar tu perfil'),
(205, 'Password has been updated successfully', 'La password è stata aggiornata con successo', 'Password has been updated successfully', 'Contraseña se ha actualizado correctamente'),
(206, 'Current Password is incorrect', 'Password corrente non è corretta', 'Current Password is incorrect', 'La contraseña es incorrecta'),
(207, 'Professional has been updated successfully', 'Professional è stato aggiornato con successo', 'Professional has been updated successfully', 'Profesional se ha actualizado correctamente'),
(208, 'Professional Photo has been updated successfully', 'Photo Professional è stato aggiornato con successo', 'Professional Photo has been updated successfully', 'Profesional de fotos se ha actualizado correctamente'),
(209, 'Holidays has been updated successfully', 'Vacanze è stato aggiornato con successo', 'Holidays has been updated successfully', 'Vacaciones se ha actualizado con éxito'),
(210, 'Period', 'Periodo', 'Period', 'Periodo'),
(211, 'Search', 'Ricerca', 'Search', 'Buscar'),
(212, 'Select Period', 'Seleziona il periodo', 'Select Period', 'Seleccione Período'),
(213, 'Sold', 'Venduto', 'Sold', 'Vendido'),
(214, 'Sold Offers Count', 'Count Offerte vendute', 'Sold Offers Count', 'Ofertas vendidos Count'),
(215, 'Sold Offers Revenue', 'Venduto Offerte Entrate', 'Sold Offers Revenue', 'Vendido Ofertas de Rentas'),
(216, 'Loyalties', 'Loyalties', 'Loyalties', 'Las lealtades'),
(217, 'Loyalties Uses', 'Loyalties Utilizzi', 'Loyalties Uses', 'Lealtades Usos'),
(218, 'Feedbacks', 'Valutazioni', 'Feedbacks', 'Votaciones'),
(219, 'Feedbacks Count', 'Count Valutazioni', 'Feedbacks Count', 'Votaciones Count'),
(220, 'Feedbacks Average', 'Valutazioni media', 'Feedbacks Average', 'Votaciones Promedio'),
(221, 'User Registered', 'Utente registrato', 'User Registered', 'Usuario Registrado'),
(222, 'Book', 'Libro', 'Book', 'Libro'),
(223, 'Book List', 'Lista libro', 'Book List', 'Lista de libros'),
(224, 'Store Name', 'Nome del negozio', 'Store Name', 'Nombre tienda'),
(225, 'User Name', 'Nome utente', 'User Name', 'Nombre de usuario'),
(226, 'Booking Date', 'Data di prenotazione', 'Booking Date', 'Fecha para registrarse'),
(227, 'Status', 'Stato', 'Status', 'Estado'),
(228, 'View', 'Vista', 'View', 'Ver'),
(229, 'Consumer', 'Consumatore', 'Consumer', 'Consumidor'),
(230, 'Consumer List', 'Lista dei consumatori', 'Consumer List', 'Lista Consumidor'),
(231, 'Consumer Info', 'Info consumatori', 'Consumer Info', 'Información al Consumidor'),
(232, 'Register Consumer', 'Registrati consumatori', 'Register Consumer', 'Regístrese Consumidor'),
(233, 'Visits', 'Visite', 'Visits', 'Visitas'),
(234, 'Registered At', 'Registrato A', 'Registered At', 'Registrado en'),
(235, 'Detail', 'Dettaglio', 'Detail', 'Detalle'),
(236, 'Stamp', 'Francobollo', 'Stamp', 'Sello'),
(237, 'Visible', 'Visibile', 'Visible', 'Visible'),
(238, 'Score', 'Risultato', 'Score', 'Puntuación'),
(239, 'Consumer Management', 'Gestione dei consumatori', 'Consumer Management', 'Gestión del Consumidor'),
(240, 'Rating Type Management', 'Valutazione Tipo Gestione', 'Rating Type Management', 'Habilitación de Tipo de gestión'),
(241, 'Prev Month', 'Prev Mese', 'Prev Month', 'Mes Anterior'),
(242, 'Current Month', 'Corrente Mese', 'Current Month\r\n', 'Mes actual'),
(243, 'Total Feedbacks', 'Totale Valutazioni', 'Total Feedbacks', 'Votaciones totales'),
(244, 'Quality', 'Qualità', 'Quality', 'Calidad'),
(245, 'Clean', 'Pulito', 'Clean', 'Limpio'),
(246, 'All Services', 'Tutti i servizi', 'All Services', 'Todos los Servicios'),
(247, 'Feedback Management', 'Gestione dei feedback', 'Feedback Management', 'Gestión de votos'),
(248, 'Message Management', 'Gestione del messaggio', 'Message Management', 'Gestión del mensaje'),
(249, 'Message List', 'Elenco dei messaggi', 'Message List', 'Lista de mensajes'),
(250, 'Message', 'Messaggio', 'Message', 'Mensaje'),
(251, 'Purchase Offer List', 'Acquisto Elenco prodotti', 'Purchase Offer List', 'Compra Lista de producto'),
(252, 'Revenue', 'Ricavi', 'Revenue', 'Ingresos'),
(253, 'Solds', 'Solds', 'Solds', 'Solds'),
(254, 'Activity Offer List', 'Attività Elenco prodotti', 'Activity Offer List\r\n', 'Actividad Lista de producto'),
(255, 'Office List', 'Lista ufficio', 'Office List', 'Lista de Office'),
(256, 'Subscribe Management', 'Iscriviti gestione', 'Subscribe Management', 'Suscribirse Gestión'),
(257, 'Subscribe', 'Abbonarsi', 'Subscribe', 'Suscribirse'),
(258, 'VIEWING YOUR PROFESSIONAL DETAILS', 'VISUALIZZARE I VOSTRI DATI PROFESSIONALI', 'VIEWING YOUR PROFESSIONAL DETAILS', 'VIENDO TUS DATOS PROFESIONALES'),
(259, 'PERSONAL ADMINISTRATOR PANEL', 'PERSONALE AMMINISTRATORE PANEL', 'PERSONAL ADMINISTRATOR PANEL', 'PANEL DE ADMINISTRADOR PERSONAL'),
(260, 'MULTIPLE SERVICES AND MULTIPLE OFFICES', 'SERVIZI MULTIPLI E UFFICI MULTIPLE', 'MULTIPLE SERVICES AND MULTIPLE OFFICES', 'SERVICIOS MÚLTIPLES Y OFICINAS DE MÚLTIPLES'),
(261, 'PERSONAL CONNECTION URL', 'PERSONAL URL COLLEGAMENTO', 'PERSONAL CONNECTION URL', 'CONEXIÓN URL PERSONAL'),
(262, 'INDEX PROFILE', 'INDICE PROFILO', 'INDEX PROFILE', 'PERFIL INDEX'),
(263, 'OFFERS PUBLICATION', 'OFFERTE PUBBLICAZIONE', 'OFFERS PUBLICATION', 'OFERTAS PUBLICACIÓN'),
(264, 'SECTION PERSONAL ITEMS', 'SEZIONE OGGETTI PERSONALI', 'SECTION PERSONAL ITEMS', 'SECCIÓN ARTÍCULOS PERSONALES'),
(265, 'How many services?', 'Quanti servizi?', 'How many services?', 'Cuántos servicios?'),
(266, 'Pay Now', 'Paga adesso', 'Pay Now', 'Paga ahora'),
(267, 'Widgets', 'Widgets', 'Widgets', 'Widgets'),
(268, 'Setting', 'Ambiente', 'Setting', 'Ajuste'),
(269, 'Logo', 'Logo', 'Logo', 'Logo'),
(270, 'Color', 'Colore', 'Color', 'Color'),
(271, 'Header', 'Intestazione', 'Header', 'Cabecera'),
(272, 'Background', 'Sfondo', 'Background', 'Fondo'),
(273, 'Header and Footer', 'Header and Footer', 'Header and Footer', 'Encabezado de pie de página'),
(274, 'Custom CSS', 'Custom CSS', 'Custom CSS', 'CSS personalizado'),
(275, 'Registration Widget', 'Widget registrazione', 'Registration Widget', 'Registro Widget'),
(276, 'Offers Widget', 'Offerte widget', 'Offers Widget', 'Ofrece Widget'),
(277, 'Update', 'Aggiornamento', 'Update', 'Actualizar'),
(278, 'Professional Profile', 'Profilo professionale', 'Professional Profile', 'Perfil profesional'),
(279, 'General Information', 'Informazione generale', 'General Information', 'Informacion General'),
(280, 'Profile & Cover Photo', 'Profilo & Cover Photo', 'Profile & Cover Photo', 'Perfil Y Foto de la portada'),
(281, 'Change Password', 'Cambiare la password', 'Change Password', 'Cambiar la contraseña'),
(282, 'About Me', 'Su di me', 'About Me', 'Acerca de mí'),
(283, 'Photos', 'Foto', 'Photos', 'Fotos'),
(284, 'Current Password', 'Password attuale', 'Current Password', 'Contraseña actual'),
(285, 'New Password', 'Nuova password', 'New Password', 'Nueva contraseña'),
(286, 'Retype Password', 'Ripeti password', 'Retype Password', 'Vuelva a escribir la contraseña'),
(287, 'Contact Us', 'Contattaci', 'Contact Us', 'Contáctenos'),
(288, 'Contact List', 'Lista dei contatti', 'Contact List', 'Lista de contactos'),
(289, 'Contact', 'Contatto', 'Contact', 'Contacto'),
(290, 'Close', 'Chiudere', 'Close', 'Cerca'),
(291, 'Please input your address correctly!', 'Si prega di inserire il tuo indirizzo correttamente!', 'Please input your address correctly!', 'Por favor, introduzca su dirección correcta!'),
(292, 'Loyalty List', 'Lista fedeltà', 'Loyalty List', 'Lista de Lealtad'),
(293, 'Please select the office', 'Si prega di selezionare l''ufficio', 'Please select the office', 'Por favor, seleccione la oficina'),
(294, 'You can choose only 1 category', 'È possibile scegliere solo 1 categoria', 'You can choose only 1 category', 'Usted puede elegir sólo 1 categoría'),
(295, 'Embed Widget', 'Incorpora widget', 'Embed Widget', 'Integrar Widget'),
(296, 'Please select the city', 'Seleziona la città', 'Please select the city', 'Por favor, seleccione la ciudad'),
(297, 'Category List', 'Lista Categoria', 'Category List', 'Lista de categoría'),
(298, 'Please select the Icon', 'Seleziona l''icona', 'Please select the Icon', 'Por favor, seleccione el icono'),
(299, 'Select', 'Selezionare', 'Select', 'Seleccionar'),
(300, 'italian', 'italiano', 'italian', 'italiano'),
(301, 'english', 'Inglese', 'english', 'inglés'),
(302, 'spanish', 'spagnolo', 'spanish', 'ispañol'),
(303, 'Store', 'Negozio', 'Store', 'Almacén'),
(304, 'Membership', 'Appartenenza', 'Membership', 'Afiliación'),
(305, 'Create Category', 'Crea categoria', 'Create Category', 'Crear categoría'),
(306, 'Days for Deliver', 'Giorni per Deliver', 'Days for Deliver', 'Días de Entrega'),
(307, 'Delivery Place', 'Luogo di consegna', 'Delivery Place', 'Entregar Place'),
(308, 'Office *', 'Ufficio *', 'Office *', 'Oficina *'),
(309, 'Range of Office', 'Gamma di ufficio', 'Range of Office', 'Rango de la oficina'),
(310, 'Price *', 'Prezzo *', 'Price *', 'Precio *'),
(311, 'Discount Price', 'Prezzo scontato', 'Discount Price', 'Precio de descuento'),
(312, 'Amount of Book at a time(max:5)', 'Quantità di libro alla volta (max: 5)', 'Amount of Book at a time(max:5)', 'Cantidad de libro a la vez (máximo: 5)'),
(313, 'Create Office', 'Creare Ufficio', 'Create Office', 'Crear la oficina'),
(314, 'Edit Plan', 'Modifica Piano', 'Edit Plan', 'Plan Editar'),
(315, 'Updated At', 'Aggiornato A', 'Updated At', 'Actualizado a las'),
(316, 'Edit Office', 'Modifica Ufficio', 'Edit Office', 'Oficina Editar'),
(317, 'Sub Category List', 'Lista Sotto categoria', 'Sub Category List', 'Lista de categoría Sub'),
(318, 'Edit Service', 'Modifica servizio', 'Edit Service', 'El servicio de edición'),
(319, 'Sub Category Management', 'Gestione Sotto categoria', 'Sub Category Management', 'Gestión por Categorías Sub'),
(320, 'Sub Category', 'Sotto categoria', 'Sub Category', 'Sub Categoría'),
(321, 'Edit Sub Category', 'Modifica Sotto categoria', 'Edit Sub Category', 'Editar Sub Categoría'),
(322, 'Create Sub Category', 'Creare Sotto categoria', 'Create Sub Category', 'Crear Sub Categoría'),
(323, 'Copyright', 'Diritto d''autore', 'Copyright', 'Derechos de autor'),
(324, 'All Rights Reserved', 'Tutti i diritti riservati', 'All Rights Reserved', 'Reservados todos los derechos'),
(325, 'Powered by', 'Offerto da', 'Powered by', 'Desarrollado por'),
(326, 'Professional Login', 'Accesso professionale', 'Professional Sign In', 'Entrar Profesional'),
(327, 'Please fill the forms', 'Vi preghiamo di compilare i moduli', 'Please fill the forms', 'Por favor, rellene los formularios'),
(328, 'Email Address', 'Indirizzo e-mail', 'Email Address', 'Dirección de correo electrónico'),
(329, 'Professional Basic', 'Professionale di base', 'Professional Basic', 'Profesional Básico'),
(330, 'ONE SERVICE AND ONE OFFICE', 'UN SERVIZIO E UN UFFICIO', 'ONE SERVICE AND ONE OFFICE', 'UN SERVICIO Y UNA OFICINA'),
(331, 'Sign Up', 'Registrati', 'Sign Up', 'Contratar'),
(332, 'Create the Account as Professional', 'Creare l''account come Professionista', 'Create the Account as Professional', 'Cree la cuenta como profesional'),
(333, 'Password Confirmation', 'Conferma password', 'Password Confirmation', 'Confirmación de contraseña'),
(334, 'Professional Name', 'Nome professionale', 'Professional Name', 'Nombre Profesional'),
(335, 'Phone No', 'Telefono No', 'Phone No', 'Telefono no'),
(336, 'Price in Euro', 'Prezzo in Euro', 'Price in Euro', 'Precio en Euro'),
(337, 'Please fill email and name filed!', 'Si prega di compilare e-mail e campo del nome!', 'Please fill email and name filed!', 'Rellene correo electrónico y nombre presentado!'),
(338, 'Pending', 'In attesa di', 'Pending', 'A la espera de'),
(339, 'Complete', 'Completo', 'Complete', 'Completa'),
(340, 'Cancelled', 'Annullato', 'Cancelled', 'Cancelado'),
(341, 'View Booking', 'Visualizzare Prenotazione', 'View Booking', 'Ver Reservas'),
(342, 'Booked', 'Prenotato', 'Booked', 'Reservados'),
(343, 'Service Name', 'Nome del servizio', 'Service Name', 'Nombre del Servicio'),
(344, 'Customer Name', 'Nome Cliente', 'Customer Name', 'Nombre del cliente'),
(345, 'Customer''s Address', 'Indirizzo del cliente', 'Customer''s Address', 'Dirección del Cliente'),
(346, 'Count Visit', 'Conte Visita', 'Count Visit', 'Contador de Visitas'),
(347, 'Company Profile', 'Profilo Aziendale', 'Company Profile', 'Perfil de la compañía'),
(348, 'Comments Management', 'Commenti Gestione', 'Comments Management', 'Gestión Comentarios'),
(349, 'Rating Management', 'Valutazione Gestione', 'Rating Management', 'Gestión de Clasificación'),
(350, 'Marketing Tools', 'Strumenti di marketing', 'Marketing Tools', 'Herramientas de marketing'),
(351, 'Message Detail', 'Messaggio Dettaglio', 'Message Detail', 'Detalles del mensaje'),
(352, 'Send', 'Inviare', 'Send', 'Enviar'),
(353, 'Start Date', 'Data d''inizio', 'Start Date', 'Fecha de inicio'),
(354, 'End Date', 'Data di fine', 'End Date', 'Fecha final'),
(355, 'Last 3 days', 'Ultimi 3 giorni', 'Last 3 days', 'Últimos 3 días'),
(356, 'Last 1 week', 'Ultimo 1 settimana', 'Last 1 week', 'Última 1 semana'),
(357, 'Last 1 month', 'Ultimo 1 mese', 'Last 1 month', 'Última 1 mes'),
(358, 'Last 2 months', 'Ultimi 2 mesi', 'Last 2 months', 'Últimos 2 meses'),
(359, 'Last 3 months', 'Gli ultimi 3 mesi', 'Last 3 months', 'Últimos 3 meses'),
(360, 'Last 6 months', 'Ultimi 6 mesi', 'Last 6 months', 'Últimos 6 meses'),
(361, 'Last 1 year', '1 anno scorso', 'Last 1 year', 'Última 1 año'),
(362, 'Rating Type', 'Valutazione Tipo', 'Rating Type', 'Habilitación de Tipo'),
(363, 'Create Rating Type', 'Creare Valutazione Tipo', 'Create Rating Type', 'Crear habilitación de tipo'),
(364, 'Question', 'Domanda', 'Question', 'Pregunta'),
(365, 'Rating Type List', 'Valutazione Tipo Lista', 'Rating Type List', 'Clasificación Tipo de lista'),
(366, 'Cancel Subscription', 'Annulla iscrizione', 'Cancel Subscription', 'Cancelar subscripción'),
(367, 'Show', 'Mostrare', 'Show', 'Mostrar'),
(368, 'Hide', 'Nascondere', 'Hide', 'Esconder'),
(369, 'Basic Member', 'Membro Base', 'Basic Member', 'Miembro Básico'),
(370, 'Pro Member', 'Pro membro', 'Pro Member', 'Pro Miembro'),
(371, 'Latest', 'Più recente', 'Latest', 'Último'),
(372, 'Stamps Requires', 'Francobolli Richiede', 'Stamps Requires', 'Sellos Requiere'),
(373, 'Write Message Here', 'Scrivi messaggio qui', 'Write Message Here', 'Escribir mensaje aquí'),
(374, 'Please enter message to send', 'Inserisci il messaggio da inviare', 'Please enter message to send', 'Por favor, introduzca el mensaje a enviar'),
(375, 'Please select users.', 'Si prega di selezionare gli utenti.', 'Please select users.', 'Por favor, seleccione los usuarios.'),
(376, 'Send Email To User', 'Invia email a utenti', 'Send Email To User', 'Enviar correo electrónico a usuario'),
(377, 'Send SMS To User', 'Invia SMS all''utente', 'Send SMS To User', 'Enviar SMS al usuario'),
(378, 'By Activity', 'Per Nazione', 'By Activity', 'Por actividad'),
(379, 'Use Offer', 'Usa Offerta', 'Use Offer', 'Uso Oferta'),
(380, 'There is no offers', 'Non ci sono offerte', 'There is no offers', 'No hay ofertas'),
(381, 'Available Loyalties', 'Loyalties disponibili', 'Available Loyalties', 'Las lealtades disponibles'),
(382, 'Provided Feedbacks', 'Valutazioni fornite', 'Provided Feedbacks', 'Votaciones prestados'),
(383, 'Sorry!', 'Scusate!', 'Sorry!', 'Apenado!'),
(384, 'You need to upgrade your membership or buy more services.', 'È necessario aggiornare la tua iscrizione o comprare più servizi.', 'You need to upgrade your membership or buy more services.', 'Necesitas actualizar tu membresía o comprar más servicios.'),
(385, 'Please check this one as well', 'Si prega di controllare questo pure', 'Please check this one as well', 'Por favor verifique éste a su vez'),
(386, 'SELECT A CATEGORY', 'SELEZIONA UNA CATEGORIA', 'SELECT A CATEGORY', 'SELECCIONE UNA CATEGORÍA'),
(387, 'By email', 'Per e-mail', 'By email', 'Por correo electrónico'),
(388, 'To the office', 'All''ufficio', 'To the office', 'A la oficina'),
(389, 'Maximum number of days to deliver', 'Numero massimo di giorni per consegnare', 'Maximum number of days to deliver', 'Número máximo de días para entregar'),
(390, 'Range with maximun km out of the office', 'Range con km Maximun fuori ufficio', 'Range with maximun km out of the office', 'Serie compuesta km máximas fuera de la oficina'),
(391, 'Use Y/N', 'Utilizzare Y/N', 'Use Y/N', 'Utilice S/N'),
(392, 'Did you forgot the password?', 'Hai dimenticato la password?', 'Did you forgot the password?', 'Has olvidado la contraseña?'),
(393, 'Enter your email to reset', 'Inserisci la tua email per reimpostare', 'Enter your email to reset', 'Ingrese su correo electrónico para restablecer'),
(394, 'Submit', 'Presentare', 'Submit', 'Enviar'),
(395, 'Update Profile', 'Aggiorna il profilo', 'Update Profile', 'Actualización del perfil'),
(396, 'Reset Your Password', 'Resetta la tua password', 'Reset Your Password', 'Restablecer su contraseña'),
(397, 'Enter New Password', 'Inserire una nuova password', 'Enter New Password', 'Introduzca nueva contraseña'),
(398, 'The cart is empty', 'Il carrello è vuoto', 'The cart is empty', 'La cesta está vacía'),
(399, 'Send Message', 'Invia il messaggio', 'Send Message', 'Enviar mensaje'),
(400, 'Available for Offsite Service', 'Disponibile per servizio fuori sede', 'Available for Offsite Service', 'Disponible para servicio fuera del hotel'),
(401, 'CONTACT NOW', 'CONTATTA ORA', 'CONTACT NOW', 'CONTACTA AHORA'),
(402, 'Reviews', 'Recensioni', 'Reviews', 'Críticas'),
(403, 'Recent Reviews', 'Recensioni recenti', 'Recent Reviews', 'Comentarios recientes'),
(404, 'Professionals', 'Professionisti', 'Professionals', 'Profesionales'),
(405, 'Services', 'Servizi', 'Services', 'Servicios'),
(406, 'Enter Keyword', 'Inserisci parola chiave', 'Enter Keyword', 'Inserte palabra clave'),
(407, 'Rating Range', 'Valutazione Gamma', 'Rating Range', 'Rango Clasificación'),
(408, 'Price Range', 'Fascia di prezzo', 'Price Range', 'Rango de precios'),
(409, 'Available offsite Services', 'Servizi disponibili fuori sede', 'Available offsite Services', 'Servicios disponibles fuera del sitio'),
(410, 'Posts Published', 'Messaggi Pubblicato', 'Posts Published', 'Mensajes Publicado'),
(411, 'Terms & Conditions', 'Termini & Condizioni', 'Terms & Conditions', 'Términos y condiciones'),
(412, 'Me', 'Me', 'Me', 'Yo'),
(413, 'The post is empty.', 'Il post è vuoto.', 'The post is empty.', 'El puesto está vacío.'),
(414, 'Book Management', 'Gestione libro', 'Book Management', 'Gestión de la libreta'),
(415, 'Sign In', 'Registrati', 'Sign In', 'Ingresar'),
(416, 'Please input your password correctly!', 'Si prega di inserire la password corretta!', 'Please input your password correctly!', 'Por favor, introduzca su contraseña correctamente!'),
(417, 'Please fill required filed!', 'Si prega di compilare richiesto archiviato!', 'Please fill required filed!', 'Rellene campo obligatorio!'),
(418, 'Users', 'Utenti', 'Users', 'Usuarios'),
(419, 'Select the period correctly.', 'Selezionare il periodo correttamente.', 'Select the period correctly.', 'Seleccione el período correctamente.'),
(420, 'Send Email', 'Invia una email', 'Send Email', 'Enviar correo electrónico'),
(421, 'Send SMS', 'Invia SMS', 'Send SMS', 'Enviar SMS'),
(422, 'Stamps', 'Francobolli', 'Stamps', 'Sellos'),
(423, 'Online', 'In linea', 'Online', 'En línea'),
(424, 'Yes', 'Sì', 'Yes', 'Sí'),
(425, 'No', 'No', 'No', 'No'),
(426, 'Start Time', 'Ora di inizio', 'Start Time', 'Hora de inicio'),
(427, 'End Time', 'Fine del tempo', 'End Time', 'Hora de finalización'),
(428, 'Received', 'Ricevuto', 'Ricevuti', 'Recibidas'),
(429, 'Feedback List', 'Elenco Commenti', 'Feedback List', 'Lista de Votación'),
(430, 'Default Language', 'Lingua di default', 'Default Language', 'Idioma predeterminado'),
(431, 'Online Payment', 'Pagamento on line', 'Online Payment', 'Pago en línea'),
(432, 'FAQ', 'FAQ', 'FAQ', 'FAQ'),
(433, 'Was this answer helpful?', 'Questa risposta ti è stata d''aiuto?', 'Was this answer helpful?', 'Te resultó útil esta respuesta'),
(434, 'Recent Posts', 'messaggi recenti', 'Recent Posts', 'Mensajes recientes'),
(435, 'My Offers', 'Le mie offerte', 'My Offers', 'Mis Ofertas'),
(436, 'Get At', 'Arrivare a', 'Get At', 'Llegar a'),
(437, 'comments', 'commenti', 'comments', 'comentarios'),
(438, 'Read More', 'Per saperne di più', 'Read More', 'Lee mas'),
(439, 'World of Professions', 'Mondo delle professioni', 'World of Professions', 'Mundial de las Profesiones'),
(440, 'Recent Professions', 'Professioni recenti', 'Recent Professions', 'Profesiones recientes'),
(441, 'Post a Comment', 'Posta un commento', 'Post a Comment', 'Publicar un comentario'),
(442, 'Comments', 'Commenti', 'Comments', 'Comentarios'),
(443, 'Leave a Comment', 'Lascia un commento', 'Leave a Comment', 'Deja un comentario'),
(444, 'You need to login.', 'Devi effettuare il login.', 'You need to login.', 'Tienes que iniciar sesión.'),
(445, 'Please leave your comment.', 'Si prega di lasciare il vostro commento.', 'Please leave your comment.', 'Por favor, deje su comentario.'),
(446, 'Please leave a message.', 'Per favore lascia un messaggio.', 'Please leave a message.', 'Por favor, deje un mensaje.'),
(447, 'Write feedback here', 'Scrivi feedback qui', 'Write feedback here', 'Escribir comentarios aquí'),
(448, 'We Are Here', 'Siamo qui', 'We Are Here', 'Estamos aquí'),
(449, 'All Reviews', 'Tutti i pareri', 'All Reviews', 'Todos los comentarios'),
(450, 'Report', 'Rapporto', 'Report', 'Informe'),
(451, 'Duration of service', 'Durata del servizio', 'Duration of service', 'Duración del servicio'),
(452, 'Delivery by email', 'Consegna per e-mail', 'Delivery by email', 'Entrega por correo electrónico'),
(453, 'Delivery to the office', 'Consegna in ufficio', 'Delivery to the office', 'Entrega a la oficina'),
(454, 'Service Available in', 'Servizio Disponibile in', 'Service Available in', 'Servicio disponible en'),
(455, 'I want to book offsite service', 'Vorrei prenotare il servizio fuori sede', 'I want to book offsite service', 'Quiero reservar un servicio fuera de las instalaciones'),
(456, 'Max days for delivery', 'Max giorni per la consegna', 'Max days for delivery', 'Número máximo de días para la entrega'),
(457, 'days', 'giorni', 'days', 'día'),
(458, 'Your Booking', 'Sua prenotazione', 'Your Booking', 'Su Reserva'),
(459, 'Online Pay', 'Paga online', 'Online Pay', 'Pago en línea'),
(460, 'Pay to the office', 'Pagare per l''ufficio', 'Pay to the office', 'Pagar a la oficina'),
(461, 'Send Us A Message', 'Inviarci un messaggio', 'Send Us A Message', 'Mandanos un mensaje'),
(462, 'Ask Info', 'Chiedi informazioni', 'Ask Info', 'Pregunta Info'),
(463, 'Order', 'Ordine', 'Order', 'Orden'),
(464, 'Join now', 'Iscriviti adesso', 'Join now', 'Únete ahora'),
(465, 'Give Feedback', 'Dare un feedback', 'Give Feedback', 'Dar opinion'),
(466, 'You need to select booking date and duration', 'È necessario selezionare data di prenotazione e la durata', 'You need to select booking date and duration', 'Es necesario seleccionar la fecha de reserva y duración'),
(467, 'Please answer the question.', 'Si prega di rispondere alla domanda.', 'Please answer the question.', 'Por favor conteste la pregunta.'),
(468, 'Please input your address', 'Si prega di inserire il tuo indirizzo', 'Please input your address', 'Por favor, introduzca su dirección'),
(469, 'Featured Company', 'In primo piano Azienda', 'Featured Company', 'Inmobiliaria destacada'),
(470, 'There is no similars', 'Non ci sono simili', 'There is no similars', 'No hay similitud'),
(471, 'Offices', 'Uffici', 'Offices', 'Oficinas'),
(472, 'There is no search result', 'Non ci sono risultati di ricerca', 'There is no search result', 'No hay resultados de la búsqueda'),
(473, 'hour', 'ora', 'hour', 'hora'),
(474, 'Zip Code', 'Cap', 'Zip Code', 'Código postal'),
(475, 'Your message', 'Il tuo messaggio', 'Your message', 'Tu mensaje'),
(476, 'Profile', 'Profilo', 'Profile', 'Perfil'),
(477, 'Offers', 'Offerte', 'Offers', 'Ofertas'),
(478, 'Login', 'Login', 'Login', 'Iniciar sesión'),
(479, 'Business Area', 'Business Area', 'Business Area', 'Área de negocios'),
(480, 'Request a service', 'Richiedi un servizio', 'Request a service', 'Solicitar un servicio'),
(481, 'Contact and Support', 'Contatto e supporto', 'Contact and Support', 'Contacto y Ayuda'),
(482, 'How it works', 'Come funziona', 'How it works', 'Cómo funciona'),
(483, 'Help', 'Aiuto', 'Help', 'Ayuda'),
(484, 'Terms and Condition', 'Termini e condizioni', 'Terms & Condition', 'Términos y Condiciones'),
(485, 'English', 'Inglese', 'English', 'Inglés'),
(486, 'Italian', 'Italiano', 'Italian', 'Italiano'),
(487, 'Spainish', 'Spagnolo', 'Spainish', 'Español'),
(488, 'Blog', 'Blog', 'Blog', 'Blog'),
(489, 'For newsletters enter your email here.', 'Per la newsletter inserisci la tua email qui.', 'For newsletters enter your email here.', 'Para boletines introduzca su email aquí.'),
(490, 'Are you sure?', 'Sei sicuro?', 'Are you sure?', 'Estas seguro?'),
(491, 'You have already left the review here.', 'Hai già lasciato qui la recensione.', 'You have already left the review here.', 'Usted ya ha dejado el comentario aquí.'),
(492, 'Submit Review', 'Invia Recensioni', 'Submit Review', 'Enviar opinión'),
(493, 'Enter your information here. So we can register you as our customer.', 'Inserisci i tuoi dati qui. Così possiamo registrare come nostro cliente.', 'Enter your information here. So we can register you as our customer.', 'Ingrese su información aquí. Así que usted puede registrarse como cliente.'),
(494, 'optional', 'opzionale', 'optional', 'opcional'),
(495, 'Our Offers', 'Le nostre offerte', 'Our Offers', 'Nuestras ofertas'),
(496, 'Expires In', 'Scade tra', 'Expires In', 'Expira en'),
(497, 'Buy', 'Acquistare', 'Buy', 'Comprar'),
(498, 'Registration Page', 'Registrazione Pagina', 'Registration Page', 'Página de registro'),
(499, 'Categories', 'Categorie', 'Categories', 'Categorías'),
(500, 'Keywords', 'Parole chiave', 'Keywords', 'Palabras clave'),
(501, 'Featured Professional', 'In primo piano professionale', 'Featured Professional', 'Profesional destacado'),
(502, 'Featured Services', 'Servizi in primo piano', 'Featured Services', 'Servicios destacados'),
(503, 'You need to select office.', 'È necessario selezionare ufficio.', 'You need to select office.', 'Es necesario seleccionar la oficina.'),
(504, 'Member Since', 'Membro da', 'Member Since', 'Miembro desde'),
(505, 'From', 'Da parte di', 'From', 'De'),
(506, 'Speaks', 'Parla', 'Speaks', 'Habla'),
(507, 'Skills Booked', 'Competenze Prenotato', 'Skills Booked', 'Habilidades Reservados'),
(508, 'ONLINE', 'IN LINEA', 'ONLINE', 'EN LÍNEA'),
(509, 'OFFLINE', 'ASSENTE', 'OFFLINE', 'DESCONECTADO'),
(510, 'Type your message', 'Inserisci il tuo messaggio', 'Type your message', 'Escriba su mensaje'),
(511, 'All posts about Professions', 'Tutti i post su Professioni', 'All posts about Professions', 'Todos los mensajes sobre Profesiones'),
(512, 'Rating', 'Valutazione', 'Rating', 'Clasificación'),
(513, 'Select where', 'Selezionare dove', 'Select where', 'Seleccione dónde'),
(514, 'When', 'Quando', 'When', 'Cuando'),
(515, 'About', 'Di', 'About', 'Acerca de'),
(516, 'Cart', 'Carrello', 'Cart', 'Carro'),
(517, 'Messages', 'Messaggi', 'Messages', 'Mensajes'),
(518, 'User Profile', 'Profilo utente', 'User Profile', 'Perfil del usuario'),
(519, 'Phone Number', 'Numero di telefono', 'Phone Number', 'Número de teléfono'),
(520, 'Professional College', 'Collegio professionale', 'Professional College', 'Colegio Profesional'),
(521, 'Professional Order', 'Ordine professionale', 'Professional Order', 'Orden Profesional'),
(522, 'Bar Register', 'Bar Registro', 'Bar Register', 'Bar Registro'),
(523, 'Start Searching', 'Inizia la ricerca', 'Start Searching', 'Iniciar la búsqueda'),
(524, 'Select Hourly Rate', 'Scegli Tariffa oraria', 'Select Hourly Rate', 'Seleccione Tarifa por hora'),
(525, 'Select Rating Range', 'Selezionare Valutazione Gamma', 'Select Rating Range', 'Seleccione Rating Rango'),
(526, 'Online for Chat', 'Online per Chat', 'Online for Chat', 'Línea para chatear'),
(527, 'Offsite Available', 'Fuori sede Disponibile', 'Offsite Available', 'Offsite Disponible'),
(528, 'Select Price Range', 'Seleziona Fascia di prezzo', 'Select Price Range', 'Seleccione Escala de precios'),
(529, 'See More', 'Mostra di più', 'See More', 'Ver más'),
(530, 'See Less', 'Vedi meno', 'See Less', 'Ver menos'),
(531, 'Privacy Policy', 'Politica sulla riservatezza', 'Privacy Policy', 'Política de privacidad'),
(532, 'World of Professionals', 'World of Professionals', 'World of Professionals', 'Mundial de Profesionales'),
(533, 'Latest Posts from our Professionals', 'Gli ultimi messaggi dei nostri professionisti', 'Latest Posts from our Professionals', 'Últimos mensajes de nuestros profesionales'),
(534, 'Directory Template', 'Elenco Template', 'Directory Template', 'Plantilla Directorio');
INSERT INTO `ds_language_labels_copy` (`id`, `label`, `valueit`, `value`, `valuees`) VALUES
(535, 'Create your own directory website by using Superlist template incorporating all features of modern directory website.', 'Crea il tuo sito web directory utilizzando modelli Superlist incorpora tutte le<br> funzionalità del sito web directory moderna.', 'Create your own directory website by using Superlist template incorporating all features of modern directory website.', 'Cree su propio sitio web directorio utilizando la plantilla Superlista incorpora todas las características del sitio web directorio moderna.'),
(536, 'Find a dog sitter near you', 'Trova un dog sitter vicino a te', 'Find a dog sitter near you', 'Encontrar una niñera perro cerca de usted'),
(537, 'With thousands of trusted and insured dog sitters, you are sure to find the perfect one', 'Con migliaia di dog sitter di fiducia e assicurato, siete sicuri di trovare quello perfetto', 'With thousands of trusted and insured dog sitters, you''re sure to find the perfect one', 'Con miles de cuidadores de perros de confianza y asegurados, que está seguro de encontrar el perfecto'),
(538, 'Schedule, book and pay online', 'Pianificazione, libro e pagare on-line', 'Schedule, book and pay online', 'Planificar, reservar y pagar en línea'),
(539, 'No need for cash, and all bookings through the site are covered by pet insurance and a 24/7 vet line.', 'Non c''è bisogno di denaro contante, e tutte le prenotazioni attraverso il sito sono coperti da assicurazione dell''animale domestico e una linea 24/7 veterinario.', 'No need for cash, and all bookings through the site are covered by pet insurance and a 24/7 vet line.', 'No hay necesidad de dinero en efectivo, y todas las reservas a través del sitio están cubiertos por el seguro de mascotas y una línea 24/7 veterinario.'),
(540, 'Happy Dog!', 'Cane felice!', 'Happy Dog!', 'Perro feliz!'),
(541, 'Send your pooch on his own holiday confident he will have more fun than you.', 'Inviate il vostro cane da solo vacanza fiducioso che sarà lui a avere più divertente di quanto si.', 'Send your pooch on his own holiday confident he''ll have more fun than you.', 'Enviar a su perro en su propio día de fiesta seguro de que va a tener más diversión que usted.'),
(542, 'City of', 'Città di', 'City of', 'Ciudad de'),
(543, 'with online payment', 'con pagamento on-line', 'with online payment', 'con el pago en línea'),
(544, 'Other', 'Altro', 'Other', 'Otros'),
(545, 'By', 'Di', 'By', 'Por'),
(546, 'Select Language', 'Seleziona la lingua', 'Select Language', 'Seleccione idioma'),
(547, 'Jan', 'Jan', 'Jan', 'Enero'),
(548, 'Feb', 'Febbraio', 'Feb', 'Febrero'),
(549, 'Mar', 'Mar', 'Mar', 'Estropear'),
(550, 'Apr', 'Aprile', 'Apr', 'Abril'),
(551, 'Jun', 'Giugno', 'Jun', 'Junio'),
(552, 'Jul', 'Luglio', 'Jul', 'Julio'),
(553, 'Aug', 'Agosto', 'Aug', 'Agosto'),
(554, 'Sep', 'Settembre', 'Sep', 'Septiembre'),
(555, 'Oct', 'Ottobre', 'Oct', 'Octubre'),
(556, 'Nov', 'Novembre', 'Nov', 'Noviembre'),
(557, 'Dec', 'Dicembre', 'Dec', 'Diciembre'),
(558, 'ON', 'IN DATA', 'ON', 'EN'),
(559, 'OFF', 'OFF', 'OFF', 'APAGADO');

-- --------------------------------------------------------

--
-- Table structure for table `ds_loyalty`
--

CREATE TABLE IF NOT EXISTS `ds_loyalty` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `count_stamp` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptiones` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_loyalty`
--

INSERT INTO `ds_loyalty` (`id`, `company_id`, `name`, `photo`, `count_stamp`, `description`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(3, 2, '333333', 'default.jpg', 33, '33333', '2015-04-29 09:51:24', '2015-04-29 09:52:38', '333333', '333333', '33333', '33333');

-- --------------------------------------------------------

--
-- Table structure for table `ds_marketing_history`
--

CREATE TABLE IF NOT EXISTS `ds_marketing_history` (
  `id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_email` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_marketing_history`
--

INSERT INTO `ds_marketing_history` (`id`, `group_id`, `description`, `is_email`, `created_at`, `updated_at`) VALUES
(1, 2, '95895', 0, '2016-01-20 02:38:09', '2016-01-20 02:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `ds_member`
--

CREATE TABLE IF NOT EXISTS `ds_member` (
  `id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_member`
--

INSERT INTO `ds_member` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 11, '2016-01-20 02:37:30', '2016-01-20 02:37:30'),
(2, 2, 11, '2016-01-20 02:38:06', '2016-01-20 02:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `ds_message`
--

CREATE TABLE IF NOT EXISTS `ds_message` (
  `id` int(10) unsigned NOT NULL,
  `feedback_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_company_sent` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ds_migrations`
--

CREATE TABLE IF NOT EXISTS `ds_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_migrations`
--

INSERT INTO `ds_migrations` (`migration`, `batch`) VALUES
('2015_02_11_180641_create_city_table', 1),
('2015_02_25_135924_create_category_table', 1),
('2015_02_25_140056_create_sub_category_table', 1),
('2015_02_26_133753_create_plan_table', 1),
('2015_03_04_094446_create_company_table', 1),
('2015_03_04_101218_create_company_opening_table', 1),
('2015_03_06_181041_create_company_sub_category_table', 1),
('2015_03_07_015951_create_offer_table', 1),
('2015_03_07_024049_create_loyalty_table', 1),
('2015_03_10_091737_create_store_table', 1),
('2015_03_10_093647_create_store_sub_category_table', 1),
('2015_03_11_000507_create_user_table', 1),
('2015_03_13_041505_create_rating_type_table', 1),
('2015_03_13_141623_create_feedback_table', 1),
('2015_03_13_141943_create_rating_table', 1),
('2015_03_13_142710_create_review_photo_table', 1),
('2015_03_13_154610_create_contact_table', 1),
('2015_03_15_044055_create_cart_table', 1),
('2015_03_17_021103_create_user_offer_table', 1),
('2015_03_19_041805_create_consumer_table', 1),
('2015_03_20_221427_create_user_loyalty_table', 1),
('2015_03_25_144325_create_transaction_table', 1),
('2015_03_26_141421_create_subscribe_table', 1),
('2015_04_04_211454_create_group_table', 1),
('2015_04_04_211827_create_member_table', 1),
('2015_04_04_212017_create_marketing_history_table', 1),
('2015_04_06_132718_create_company_widget_table', 1),
('2015_04_21_182546_create_message_table', 2),
('2015_04_23_045854_delete_expire_in_on_offer_table', 3),
('2015_04_23_080848_add_expire_at_on_offer_table', 3),
('2015_04_27_044338_add_is_header_on_company_widget_table', 4),
('2015_04_27_102116_delete_expired_at_on_user_offer_table', 5),
('2015_04_27_102432_add_received_on_offer_table', 6),
('2015_10_22_024049_create_site_language_table', 7),
('2015_10_22_024050_create_language_fields_to_all_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ds_offer`
--

CREATE TABLE IF NOT EXISTS `ds_offer` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` decimal(6,2) DEFAULT NULL,
  `received` decimal(8,1) DEFAULT NULL,
  `expire_at` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_review` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptiones` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_offer`
--

INSERT INTO `ds_offer` (`id`, `company_id`, `name`, `photo`, `description`, `price`, `received`, `expire_at`, `is_review`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(6, 13, 'Affari legali ', 'wCpY8ENiFwpZALcQPX4hApNw.jpg', 'Troppi affari ', '200.00', NULL, '2015-09-25', 0, '2015-09-08 13:18:35', '2015-09-08 13:18:35', 'Affari legali ', 'Affari legali ', 'Troppi affari ', 'Troppi affari '),
(7, 13, 'Lettera stragiudiziale ', '4spMRLh7DUmM7ZtlAFeAXIRu.jpg', 'Lettera di messa in mora per aziende ', NULL, NULL, '', 1, '2015-09-08 13:22:50', '2015-09-08 13:22:50', 'Lettera stragiudiziale ', 'Lettera stragiudiziale ', 'Lettera di messa in mora per aziende ', 'Lettera di messa in mora per aziende ');

-- --------------------------------------------------------

--
-- Table structure for table `ds_office`
--

CREATE TABLE IF NOT EXISTS `ds_office` (
  `id` int(20) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `address_area` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `select_availability` varchar(100) DEFAULT NULL,
  `km_range` varchar(100) DEFAULT NULL,
  `office_city` varchar(100) NOT NULL,
  `office_country` varchar(100) NOT NULL,
  `company_id` int(20) NOT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lng` decimal(10,6) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `holidays` text,
  `office_available` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_office`
--

INSERT INTO `ds_office` (`id`, `name`, `address_area`, `telephone`, `select_availability`, `km_range`, `office_city`, `office_country`, `company_id`, `lat`, `lng`, `address`, `holidays`, `office_available`, `created_at`, `updated_at`) VALUES
(1, 'Jeni Modena Office', '', '', NULL, NULL, '', '', 1, '44.648837', '10.920087', 'Modena via giardini 112', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', 1, '2015-05-29 13:36:19', '2015-09-15 08:21:33'),
(2, 'John Rome Office', '', '', NULL, NULL, '', '', 1, '41.902784', '12.496366', 'Roma via del babuino 108', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', 1, '2015-05-29 14:15:26', '2015-09-15 08:37:41'),
(3, 'Nova Trento Office', '', '', NULL, NULL, '', '', 1, '46.070092', '11.119763', 'Trento via roma 90', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', 1, '2015-05-29 14:19:39', '2015-09-15 08:38:37'),
(9, 'GSK Rome Office', '', '', NULL, NULL, '', '', 6, '41.922238', '12.439309', 'Via Giorgio Morpurgo 22 Roma', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', 1, '2015-05-30 04:39:56', '2015-11-21 01:33:37'),
(10, 'GSK Palermo Office', '', '', NULL, NULL, '', '', 6, '38.111486', '13.335901', 'Palermo viale grassi 101', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', 1, '2015-05-30 04:40:33', '2015-11-21 01:33:47'),
(11, 'Ventimiglia Office', '', '', NULL, NULL, '', '', 6, '43.812487', '7.628535', 'Ventimiglia via del corso 120', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 04:41:38', '2015-09-17 05:31:37'),
(12, 'GSK Trento Office', '', '', NULL, NULL, '', '', 6, '46.069629', '11.120519', 'Trento via roma 90', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 15:37:49', '2015-09-17 05:31:56'),
(13, 'Bologna Office', '', '', NULL, NULL, '', '', 2, '44.495139', '11.347653', 'Bologna via zamboni 10', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:26:52', '2015-09-17 05:32:15'),
(14, 'Modena Office', '', '', NULL, NULL, '', '', 2, '44.637529', '10.954290', 'Modena viale spighi 13', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:27:31', '2015-09-17 05:32:35'),
(15, 'Verona Office', '', '', NULL, NULL, '', '', 2, '45.458274', '10.984456', 'Verona via della pace 12', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:28:03', '2015-09-17 05:32:59'),
(16, 'Pisa-Livorno  Office', '', '', NULL, NULL, '', '', 2, '43.516898', '10.318874', 'Livorno via del mare 12', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:29:02', '2015-09-17 05:33:27'),
(17, 'Pescara Office', '', '', NULL, NULL, '', '', 2, '42.461790', '14.216090', 'Pescara viale rainusso 130', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:29:33', '2015-09-17 05:33:50'),
(18, 'Versilia Office', '', '', NULL, NULL, '', '', 3, '44.134917', '12.227057', 'Italy Versilia', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:38:45', '2015-05-30 22:38:45'),
(19, 'Vicenza Office', '', '', NULL, NULL, '', '', 3, '45.545479', '11.535421', 'Italy Vicenza', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:39:15', '2015-05-30 22:39:15'),
(20, 'Cagliari Office', '', '', NULL, NULL, '', '', 3, '39.223841', '9.121661', 'Italy Cagliari', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:40:27', '2015-05-30 22:40:27'),
(21, 'Taranto Office', '', '', NULL, NULL, '', '', 3, '40.464361', '17.247030', 'Italy Taranto', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:41:20', '2015-05-30 22:41:20'),
(22, 'Trieste Office', '', '', NULL, NULL, '', '', 3, '45.649526', '13.776818', 'Italy Trieste', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 22:41:51', '2015-05-30 22:41:51'),
(23, 'Ancona Office', '', '', NULL, NULL, '', '', 4, '43.615830', '13.518915', 'Italy Ancona', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 23:21:34', '2015-05-30 23:21:34'),
(24, 'Perugia Office', '', '', NULL, NULL, '', '', 4, '43.110717', '12.390828', 'Italy Perugia', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 23:22:03', '2015-05-30 23:22:03'),
(25, 'Lecce Office', '', '', NULL, NULL, '', '', 4, '40.351516', '18.175016', 'Italy Lecce', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 23:22:34', '2015-05-30 23:22:34'),
(26, 'Reggio nell''Emilia Office', '', '', NULL, NULL, '', '', 4, '44.698993', '10.629686', 'Italy Reggio nell''Emilia', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-05-30 23:23:08', '2015-05-30 23:23:08'),
(27, 'Parma Office', '', '', NULL, NULL, '', '', 5, '44.801485', '10.327904', 'Italy Parma', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', 1, '2015-05-30 23:25:59', '2015-06-16 21:39:13'),
(28, 'Milan Office', '', '', NULL, NULL, '', '', 5, '45.465422', '9.185924', 'Italy Milan', '01/01/2015, 02/18/2015, 03/17/2015, 04/15/2015, 05/21/2015, 06/18/2015, 07/22/2015, 08/13/2015, 09/15/2015, 10/23/2015, 11/21/2015, 12/17/2015', NULL, '2015-05-30 23:26:27', '2015-06-16 21:40:08'),
(29, 'Rome Office', '', '', NULL, NULL, '', '', 5, '41.902784', '12.496366', 'Italy Rome', '01/01/2015, 02/20/2015, 04/16/2015, 04/19/2015, 05/20/2015, 07/16/2015, 08/19/2015, 09/16/2015, 10/15/2015, 11/17/2015, 12/06/2015', 1, '2015-05-30 23:27:10', '2015-06-16 21:39:49'),
(30, 'Acerrae Office', '', '', NULL, NULL, '', '', 7, '40.944109', '14.371438', 'Italy Acerrae', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-06-01 23:49:17', '2015-06-01 23:49:17'),
(31, 'Apiolae Office', '', '', NULL, NULL, '', '', 7, '41.842410', '12.550387', 'Italy Apiolae', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-06-01 23:51:01', '2015-06-01 23:51:01'),
(32, 'Chioggia Office', '', '', NULL, NULL, '', '', 7, '45.219865', '12.279014', 'Italy Chioggia', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-06-01 23:52:32', '2015-06-01 23:52:32'),
(33, 'Pordenone Office', '', '', NULL, NULL, '', '', 9, '45.962640', '12.655136', 'Italy Pordenone', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-06-02 00:27:04', '2015-06-02 00:27:04'),
(34, 'Gallarate Office', '', '', NULL, NULL, '', '', 9, '45.662363', '8.792127', 'Italy Gallarate', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-06-02 00:27:34', '2015-06-02 00:27:34'),
(36, 'Modena Office', '', '', NULL, NULL, '', '', 6, '44.648837', '10.920087', 'Italy Modena', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-06-11 10:01:44', '2015-06-11 10:01:44'),
(37, 'Verona Office', '', '', NULL, NULL, '', '', 6, '45.438384', '10.991622', 'Italy Verona', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/20/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/16/2015, 10/15/2015, 11/18/2015, 12/16/2015', NULL, '2015-06-11 12:56:55', '2015-06-11 12:56:55'),
(38, 'Main Office', '', '', NULL, NULL, '', '', 10, '40.944109', '14.371438', 'Italy Acerrae', '01/01/2015, 01/05/2015, 02/20/2015, 03/17/2015, 04/13/2015, 04/16/2015, 05/11/2015, 05/13/2015, 06/18/2015, 07/15/2015, 08/13/2015, 09/18/2015, 10/14/2015, 10/17/2015, 11/20/2015, 12/15/2015', NULL, '2015-06-15 18:11:11', '2015-06-15 18:18:57'),
(39, 'Modena Office', '', '', NULL, NULL, '', '', 10, '44.648837', '10.920087', 'Italy Modena', '01/01/2015, 02/18/2015, 03/18/2015, 04/15/2015, 05/13/2015, 07/13/2015, 08/20/2015, 09/17/2015, 10/17/2015, 11/19/2015, 12/06/2015', 1, '2015-06-15 18:34:01', '2015-06-15 18:40:39'),
(40, 'Catania Office', '', '', NULL, NULL, '', '', 5, '37.507877', '15.083030', 'Italy Catania', '01/01/2015, 02/17/2015, 03/17/2015, 04/23/2015, 05/07/2015, 06/10/2015, 07/10/2015, 08/13/2015, 09/17/2015, 10/15/2015, 11/11/2015, 12/16/2015', NULL, '2015-06-25 21:34:12', '2015-06-25 21:34:12'),
(41, 'Studio legale Pace ', '', '', NULL, NULL, '', '', 13, '41.912814', '12.442911', 'Via elio donato roma', '01/01/2015', 1, '2015-09-08 13:27:01', '2015-09-08 13:27:01'),
(42, 'Ghjjhj', '', '', NULL, NULL, '', '', 1, '41.922226', '12.439443', 'Via Giorgio Morpurgo 20 Roma', '01/01/2015, 01/16/2015, 02/18/2015, 07/07/2015, 11/15/2015', 1, '2015-10-14 13:07:33', '2015-10-14 13:07:33'),
(43, 'Bangalore Office', '', '', NULL, NULL, '', '', 15, '12.971599', '77.594563', 'Bangalore ', '01/01/2015', 1, '2015-11-16 04:25:49', '2015-11-16 04:25:49'),
(44, 'New Office created', '', '', NULL, NULL, '', '', 1, '41.909333', '12.477037', 'Via del corso 10  Roma', '01/01/2015', NULL, '2015-11-22 22:09:04', '2015-11-22 22:09:04'),
(45, 'my office', 'vishnupuri', '25893254988', 'Available within max km range', '1000', 'indore', 'IN', 20, '41.902784', '12.496366', '', '01/01/2016', 1, '2016-02-12 02:03:47', '2016-02-26 07:28:37'),
(46, 'my second office', 'snokada', '258921848', NULL, '', 'indora', 'AO', 20, '41.902784', '12.496366', '', '01/01/2016', NULL, '2016-02-19 05:46:59', '2016-02-26 07:22:40'),
(48, 'My Second New Office', 'bhavrakua square', '9874563581', NULL, '', 'Madhya Pradesh', '', 20, '26.218287', '78.182831', 'gwalior', '01/01/2016, 04/05/2016, 05/24/2016, 07/13/2016, 08/25/2016, 10/17/2016, 12/19/2016, 12/23/2016', NULL, '2016-02-22 07:58:38', '2016-02-22 08:13:44'),
(49, 'My Third New Office', 'bhavrakua', '90748529322', NULL, '', 'indore', 'india', 20, '22.719569', '75.857726', 'indore', '01/01/2016', NULL, '2016-02-22 08:02:10', '2016-02-22 08:02:10'),
(50, 'My Feburary Service', 'janjeer bala square', '963225884544', NULL, '', 'indore', 'IN', 20, '41.902784', '12.496366', '', '01/01/2016, 03/18/2016, 05/13/2016, 06/23/2016, 08/11/2016, 09/05/2016, 10/20/2016', NULL, '2016-02-26 06:31:16', '2016-02-26 06:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `ds_office_opening`
--

CREATE TABLE IF NOT EXISTS `ds_office_opening` (
  `id` int(10) unsigned NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `mon_start` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `mon_end` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `tue_start` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `tue_end` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `wed_start` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `wed_end` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `thu_start` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `thu_end` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `fri_start` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `fri_end` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sat_start` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sat_end` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sun_start` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sun_end` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_office_opening`
--

INSERT INTO `ds_office_opening` (`id`, `office_id`, `mon_start`, `mon_end`, `tue_start`, `tue_end`, `wed_start`, `wed_end`, `thu_start`, `thu_end`, `fri_start`, `fri_end`, `sat_start`, `sat_end`, `sun_start`, `sun_end`, `created_at`, `updated_at`) VALUES
(49, 1, '09:00', '18:00', '10:00', '17:00', '10:30', '18:00', '09:00', '18:30', '09:00', '18:00', '', '', '', '', '2015-06-11 14:44:15', '2015-11-16 05:50:15'),
(50, 2, '10:00', '19:00', '09:30', '17:00', '08:00', '17:30', '10:00', '19:30', '09:00', '18:00', '09:30', '18:00', '10:00', '18:00', '2015-06-11 14:44:37', '2015-06-11 14:44:37'),
(51, 3, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:44:44', '2015-06-11 14:44:44'),
(52, 9, '09:00', '18:00', '12:00', '18:00', '09:00', '18:00', '10:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:45:08', '2015-06-11 12:55:16'),
(53, 10, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:45:22', '2015-06-11 14:45:22'),
(54, 11, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:45:41', '2015-06-11 14:45:41'),
(55, 12, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:46:09', '2015-06-11 14:46:09'),
(56, 13, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:46:15', '2015-06-11 14:46:15'),
(57, 14, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:46:20', '2015-06-11 14:46:20'),
(58, 15, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:46:26', '2015-06-11 14:46:26'),
(59, 16, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:46:31', '2015-06-11 14:46:31'),
(60, 17, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:46:38', '2015-06-11 14:46:38'),
(61, 18, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:46:59', '2015-06-11 14:46:59'),
(62, 19, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:03', '2015-06-11 14:47:03'),
(63, 20, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:10', '2015-06-11 14:47:10'),
(64, 21, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:14', '2015-06-11 14:47:14'),
(65, 22, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:19', '2015-06-11 14:47:19'),
(66, 23, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:30', '2015-06-11 14:47:30'),
(67, 24, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:36', '2015-06-11 14:47:36'),
(68, 25, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:43', '2015-06-11 14:47:43'),
(69, 26, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:51', '2015-06-11 14:47:51'),
(70, 27, '09:00', '18:00', '10:30', '17:00', '11:00', '18:30', '08:30', '17:00', '10:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:47:55', '2015-06-22 13:57:35'),
(71, 28, '08:00', '18:00', '08:30', '18:30', '09:00', '17:30', '09:30', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:00', '2015-06-22 13:58:43'),
(72, 29, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:04', '2015-06-11 14:48:04'),
(73, 30, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:10', '2015-06-11 14:48:10'),
(74, 31, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:23', '2015-06-11 14:48:23'),
(75, 32, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:29', '2015-06-11 14:48:29'),
(76, 33, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:35', '2015-06-11 14:48:35'),
(77, 34, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:41', '2015-06-11 14:48:41'),
(79, 36, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-11 14:48:55', '2015-06-11 14:48:55'),
(80, 37, '10:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '15:00', '2015-06-11 12:56:55', '2015-06-11 12:56:55'),
(81, 38, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-15 18:11:11', '2015-06-15 18:11:11'),
(82, 39, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-06-15 18:34:01', '2015-06-15 18:34:01'),
(83, 40, '09:00', '18:00', '09:00', '18:00', '10:00', '18:00', '09:00', '18:00', '09:00', '18:00', '08:30', '18:00', '09:00', '18:00', '2015-06-25 21:34:13', '2015-06-25 21:40:33'),
(84, 41, '09:00', '18:00', '09:00', '18:00', '09:00', '21:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-09-08 13:27:01', '2015-09-08 13:27:01'),
(85, 42, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-10-14 13:07:33', '2015-10-14 13:07:33'),
(86, 43, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-11-16 04:25:49', '2015-11-16 04:25:49'),
(87, 44, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2015-11-22 22:09:04', '2015-11-22 22:09:04'),
(88, 45, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2016-02-12 02:03:47', '2016-02-12 02:03:47'),
(89, 46, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2016-02-19 05:46:59', '2016-02-19 05:46:59'),
(91, 48, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2016-02-22 07:58:38', '2016-02-22 07:58:38'),
(92, 49, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2016-02-22 08:02:10', '2016-02-22 08:02:10'),
(93, 50, '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '09:00', '18:00', '2016-02-26 06:31:16', '2016-02-26 06:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `ds_plan`
--

CREATE TABLE IF NOT EXISTS `ds_plan` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,1) NOT NULL,
  `type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_plan`
--

INSERT INTO `ds_plan` (`id`, `name`, `price`, `type`, `code`, `created_at`, `updated_at`, `nameit`, `namees`) VALUES
(4, 'Professional Fee Pro', '151.0', 'py', '', '2015-06-05 11:07:09', '2016-01-12 01:21:04', 'Professional Fee Pro', 'Professional Fee Pro'),
(5, 'Professional Fee', '11.0', 'ps', '', '2015-06-05 11:07:29', '2015-11-04 00:44:16', 'Professional Fee', 'Professional Fee');

-- --------------------------------------------------------

--
-- Table structure for table `ds_policy`
--

CREATE TABLE IF NOT EXISTS `ds_policy` (
  `id` int(11) NOT NULL,
  `contenten` text NOT NULL,
  `contentit` text NOT NULL,
  `contentes` text NOT NULL,
  `status` smallint(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleen` text NOT NULL,
  `titleit` text NOT NULL,
  `titlees` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_policy`
--

INSERT INTO `ds_policy` (`id`, `contenten`, `contentit`, `contentes`, `status`, `created_at`, `updated_at`, `titleen`, `titleit`, `titlees`) VALUES
(10, 'Content (English)', 'Content (Italian)', 'Content (Spanish)', 0, '2016-02-03 09:07:31', '2016-02-03 03:37:31', 'Title (English)', 'Title (Italian)', 'Title (Spanish)');

-- --------------------------------------------------------

--
-- Table structure for table `ds_postcategory`
--

CREATE TABLE IF NOT EXISTS `ds_postcategory` (
  `id` bigint(20) unsigned NOT NULL,
  `name` tinytext,
  `icon` varchar(64) DEFAULT NULL,
  `description` longtext,
  `slug` varchar(64) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) NOT NULL,
  `namees` varchar(255) NOT NULL,
  `descriptionit` varchar(255) NOT NULL,
  `descriptiones` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_postcategory`
--

INSERT INTO `ds_postcategory` (`id`, `name`, `icon`, `description`, `slug`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(1, 'Architecture & Archeology', 'fa fa-institution', 'Architecture & Archeology', 'architecture-archeology', '2015-08-06 22:14:32', '2015-11-19 05:46:48', 'Architettura & Archeologia', 'Arquitectura & Arqueología', 'Architecture & Archeology', 'Architecture & Archeology'),
(2, 'Appraisals & Consulting', 'fa fa-cubes', 'Appraisals & Consulting', 'appraisals-consulting', '2015-08-18 01:48:06', '2015-11-19 05:49:16', 'Perizie & Consulenze', 'Consultoría & Tasaciones', 'Appraisals & Consulting', 'Appraisals & Consulting'),
(3, 'Beauty & Relax', 'fa fa-group', 'Beauty & Relax', 'technology', '2015-09-12 06:20:58', '2015-11-19 05:49:58', 'Bellezza & Relax', 'Belleza & Relajación', 'Beauty & Relax', 'Beauty & Relax'),
(4, 'Engineering', 'fa fa-gears', '', 'engineering', '2015-09-12 09:50:07', '2015-11-19 05:50:47', 'Ingegneria', 'Ingeniería', '', ''),
(5, 'Cinema & Entertainment', 'fa fa-video-camera', 'Cinema & Entertainment', 'cinema-entertainment', '2015-09-15 04:48:30', '2015-11-19 05:51:53', 'Cinema & Intrattenimento ', 'Cine & Entretenimiento', 'Cinema & Entertainment', 'Cinema & Entertainment'),
(6, 'Courses & Training', 'fa fa-signal', 'Courses & Training', 'courses-training', '2015-09-15 04:48:51', '2015-11-19 05:52:40', 'Corsi & Formazione', 'Cursos & Formación', 'Courses & Training', 'Courses & Training'),
(8, 'Graphics & Photography', 'fa fa-camera', 'Graphics & Photography', 'graphics-photography', '2015-09-15 04:49:29', '2015-11-19 05:53:13', 'Grafica & Fotografia', 'Gráficos & Fotografía', 'Graphics & Photography', 'Graphics & Photography'),
(9, 'Business & Finance', 'fa fa-money', 'Business & Finance', 'business-finance', '2015-09-15 04:50:15', '2015-11-19 05:53:39', 'Affari & Finanza', 'Economía & Negocios', 'Business & Finance', 'Business & Finance'),
(10, 'Healthcare & Wellness', 'fa fa-smile-o', 'Healthcare & Wellness', 'architecture-archeology-1', '2015-09-15 04:50:33', '2015-11-19 05:54:15', 'Salute & Benessere', 'Salud & Bienestar', 'Healthcare & Wellness', 'Healthcare & Wellness'),
(11, 'Laws & Rights', 'fa fa-legal', 'Laws & Rights', 'laws-rights', '2015-09-15 04:52:47', '2015-11-19 05:55:22', 'Diritti & Giustizia', 'Ley & Justicia', 'Laws & Rights', 'Laws & Rights'),
(12, 'Lifestyle & Taste', 'fa fa-glass', 'Lifestyle & Taste', 'lifestyle-taste', '2015-09-15 04:53:12', '2015-11-19 05:56:15', 'Stile di vita & Gusto', 'Estilo de vida & Sabor', 'Lifestyle & Taste', 'Lifestyle & Taste'),
(13, 'Management', 'fa fa-paper-plane', 'Management', 'management', '2015-09-15 04:53:55', '2015-09-15 04:53:55', 'Management', 'Management', 'Management', 'Management'),
(14, 'Marketing & Advertising', 'fa fa-tasks', 'Marketing & Advertising', 'marketing-advertising', '2015-09-15 04:55:36', '2015-11-19 05:56:49', 'Marketing & Pubblicità', 'Marketing & Publicidad', 'Marketing & Advertising', 'Marketing & Advertising'),
(15, 'Mechanics & Repairs', 'fa fa-wrench', 'Mechanics & Repairs', 'mechanics-repairs', '2015-09-15 04:59:12', '2015-11-19 05:57:08', 'Meccanica & Riparazioni', 'Mecánica & Reparaciones', 'Mechanics & Repairs', 'Mechanics & Repairs'),
(16, 'Mediation & Arbitration', 'fa fa-recycle', 'Mediation & Arbitration', 'mediation-arbitration', '2015-09-15 04:59:37', '2015-09-15 04:59:37', 'Mediation & Arbitration', 'Mediation & Arbitration', 'Mediation & Arbitration', 'Mediation & Arbitration'),
(17, 'Programming & Technology', 'fa fa-keyboard-o', 'Programming & Technology', 'programming-technology', '2015-09-15 04:59:57', '2015-11-19 05:57:36', 'Tecnologia & Programmazione', 'Tecnología & Programación ', 'Programming & Technology', 'Programming & Technology'),
(18, 'Specialized Medicine', 'fa fa-graduation-cap', 'Specialized Medicine', 'specialized-medicine', '2015-09-15 05:00:26', '2015-11-19 05:57:55', 'Medicina Specializzata', 'Medicina Especializada', 'Specialized Medicine', 'Specialized Medicine'),
(19, 'Writing & Translation', 'fa fa-language', 'Writing & Translation', 'writing-translation', '2015-09-15 05:00:54', '2015-11-19 05:58:41', 'Scrittura & Traduzione', 'Redacción & Traducción', 'Writing & Translation', 'Writing & Translation'),
(20, 'Video & Music', 'fa fa-music', 'Video & Music', 'video-music', '2015-09-15 05:06:03', '2015-11-19 05:58:59', 'Video & Musica', 'Vídeo & Música', 'Video & Music', 'Video & Music'),
(21, 'Other', 'fa fa-star', 'Other', 'other', '2015-09-15 05:06:26', '2015-11-19 05:59:16', 'Altro', 'Otros', 'Other', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `ds_posts`
--

CREATE TABLE IF NOT EXISTS `ds_posts` (
  `id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `post_content` longtext,
  `post_title` text,
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `featured_image` varchar(128) DEFAULT NULL,
  `slug` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_contentit` longtext NOT NULL,
  `post_contentes` longtext NOT NULL,
  `post_titleit` varchar(255) NOT NULL,
  `post_titlees` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_posts`
--

INSERT INTO `ds_posts` (`id`, `company_id`, `post_content`, `post_title`, `comment_status`, `comment_count`, `featured_image`, `slug`, `created_at`, `updated_at`, `post_contentit`, `post_contentes`, `post_titleit`, `post_titlees`) VALUES
(1, 9, 'Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Eserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpa', 'Hello World', 'open', 5, 'EnHOinSVqRpghkus2GGhjWLZ.jpg', 'hello-world', '2015-07-04 23:35:45', '2016-01-14 03:55:50', 'Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Eserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. A', 'Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Eserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. A', 'Hello World', 'Hello World'),
(12, 1, 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job. company who is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff of Company examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job.<div><br></div>', 'Beauty & Relax', 'open', 0, 'hDhvpz6T64QTgIpM3c064GJq.png', 'beauty-relax', '2015-09-15 05:19:42', '2015-09-15 05:19:42', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bo', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bo', 'Beauty & Relax', 'Beauty & Relax'),
(13, 1, 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job. company who is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff of Company examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management, production and innovation, safety on the job.<div><br></div>', 'Post without image', 'open', 0, '5Fdv4pAkfYcYZmbPw2RmNno5.png', 'post-without-image', '2015-09-15 05:20:22', '2015-09-15 05:20:22', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bo', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bo', 'Post without image', 'Post without image'),
(28, 0, '1', 'sasasa', 'open', 0, 'wM7dHoWTP4lXADvMo62arLI2.jpg', 'sasasa', '2016-02-04 04:44:44', '2016-02-04 04:44:44', '2', '3', 'asasa', 'assasasa'),
(29, 20, 'dwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsds', 'Title (English) 11', 'open', 0, 'SdwaemY0UoodayZHESl7Jg3Q.jpg', '1', '2016-02-09 01:16:44', '2016-03-14 03:57:48', 'dwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsds', 'Title (Spanish)', 'Title (Italian) 22', 'Title (Spanish) 33'),
(30, 20, 'dwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsdsdwdddsddsds', '1', 'open', 0, NULL, '1-1', '2016-02-09 01:17:29', '2016-02-09 01:17:29', '', '', '', ''),
(31, 20, 'dsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsddsdsd', 'dsddsdsds', 'open', 0, NULL, 'dsddsdsds', '2016-02-09 01:22:08', '2016-02-09 01:22:08', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ds_postsubcategory`
--

CREATE TABLE IF NOT EXISTS `ds_postsubcategory` (
  `id` int(20) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `category_id` int(10) NOT NULL,
  `icon` varchar(64) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `slug` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) NOT NULL,
  `namees` varchar(255) NOT NULL,
  `descriptionit` varchar(255) NOT NULL,
  `descriptiones` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_postsubcategory`
--

INSERT INTO `ds_postsubcategory` (`id`, `name`, `category_id`, `icon`, `description`, `slug`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(1, 'Football', 1, 'fa fa-music', 'This is a subcategory for sports', 'football', '2015-08-06 22:29:37', '2015-08-06 22:36:08', 'Football', 'Football', 'This is a subcategory for sports', 'This is a subcategory for sports'),
(2, 'Table-Tennis', 1, 'fa fa-bell', 'This is a subcategory for Table-Tennis.', 'table-tennis', '2015-08-06 23:45:39', '2015-08-06 23:45:39', 'Table-Tennis', 'Table-Tennis', 'This is a subcategory for Table-Tennis.', 'This is a subcategory for Table-Tennis.');

-- --------------------------------------------------------

--
-- Table structure for table `ds_post_category`
--

CREATE TABLE IF NOT EXISTS `ds_post_category` (
  `id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_post_request`
--

CREATE TABLE IF NOT EXISTS `ds_post_request` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_category` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `budget` double NOT NULL,
  `description` text NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `expiry_date` varchar(100) NOT NULL,
  `status` smallint(5) NOT NULL COMMENT '0 = closed, 1 = re-open, 2= pause',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_post_request`
--

INSERT INTO `ds_post_request` (`id`, `title`, `sub_category`, `days`, `budget`, `description`, `file`, `user_id`, `company_id`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(29, 'Database', 2, 26, 2000, 'hello', NULL, NULL, 20, '21/03/2016', 2, '2016-02-24 14:31:33', '2016-02-25 14:59:19'),
(34, 'CodeIgniter Rocks', 2, 20, 20000, 'The CodeIgniter User Guide comes with the download. It contains an introduction, tutorial, a number of "how to" guides, and then reference documentation for the components that make up the framework.CodeIgniter is not trying to be all things to all people. It is a lean MVC framework, with enough.', NULL, 11, NULL, '16/03/2016', 0, '2016-02-25 11:34:43', '2016-02-25 06:04:43'),
(35, 'CakePHP 3.2.2 Released', 1, 10, 5000, 'The CakePHP core team is happy to announce the immediate availability of CakePHP 3.2.2. This is a maintenance release for the 3.2 branch that fixes several community reported issues and adds a few minor features. The CakePHP core team is happy to announce the immediate availability of CakePHP 3.2.2.', NULL, 11, NULL, '06/03/2016', 2, '2016-02-25 11:35:34', '2016-02-25 11:47:09'),
(36, 'Laravel 5.3', 2, 30, 2500, 'Laravel 5.2 continues the improvements made in Laravel 5.1 by adding multiple authentication driver support, implicit model binding, simplified Eloquent global scopes, opt-in authentication scaffolding, middleware groups, rate limiting middleware, array validation improvements, and more.', NULL, 11, NULL, '26/03/2016', 0, '2016-02-25 11:36:28', '2016-02-25 06:06:28'),
(37, 'Symfony', 2, 10, 2000, 'The standard foundation on which the best PHP applications are built. Choose any of the 30 stand-alone components available for your own applications.The standard foundation on which the best PHP applications are built. Choose any of the 30 stand-alone components available for your own applications.', NULL, 11, NULL, '06/03/2016', 0, '2016-02-25 11:36:54', '2016-02-25 06:06:54'),
(38, 'Laravel Developer', 2, 25, 1000, 'Laravel Developer Laravel DeveloperLaravel DeveloperLaravel DeveloperLaravel DeveloperLaravel DeveloperLaravel DeveloperLaravel DeveloperLaravel DeveloperLaravel Developer', 'request_cVdYqV6Kf3gZDpupVzt3Qhi4.pdf', 11, NULL, '21/03/2016', 0, '2016-02-25 14:56:42', '2016-02-25 09:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `ds_post_sub_category`
--

CREATE TABLE IF NOT EXISTS `ds_post_sub_category` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_post_sub_category`
--

INSERT INTO `ds_post_sub_category` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(50, 2, 9, '2015-09-15 05:15:19', '2015-09-15 05:15:19'),
(54, 6, 5, '2015-09-15 05:16:09', '2015-09-15 05:16:09'),
(55, 7, 10, '2015-09-15 05:16:25', '2015-09-15 05:16:25'),
(56, 8, 14, '2015-09-15 05:16:39', '2015-09-15 05:16:39'),
(57, 9, 18, '2015-09-15 05:16:55', '2015-09-15 05:16:55'),
(59, 5, 2, '2015-10-17 08:48:01', '2015-10-17 08:48:01'),
(60, 10, 1, '2015-10-17 08:48:19', '2015-10-17 08:48:19'),
(64, 20, 1, '2015-11-17 03:30:50', '2015-11-17 03:30:50'),
(65, 20, 10, '2015-11-17 03:30:50', '2015-11-17 03:30:50'),
(70, 1, 1, '2016-01-14 03:55:50', '2016-01-14 03:55:50'),
(71, 4, 17, '2016-01-14 03:56:09', '2016-01-14 03:56:09'),
(73, 3, 13, '2016-01-14 03:56:38', '2016-01-14 03:56:38'),
(74, 31, 15, '2016-02-09 01:22:08', '2016-02-09 01:22:08'),
(79, 29, 1, '2016-03-14 03:57:48', '2016-03-14 03:57:48'),
(80, 29, 15, '2016-03-14 03:57:48', '2016-03-14 03:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `ds_prof_sub_class`
--

CREATE TABLE IF NOT EXISTS `ds_prof_sub_class` (
  `id` int(20) unsigned NOT NULL,
  `company_id` int(20) unsigned NOT NULL,
  `class_id` int(20) unsigned NOT NULL,
  `sub_class_id` int(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=449 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_prof_sub_class`
--

INSERT INTO `ds_prof_sub_class` (`id`, `company_id`, `class_id`, `sub_class_id`, `created_at`, `updated_at`) VALUES
(238, 14, 1, 1, '2015-09-17 08:32:50', '2015-09-17 08:32:50'),
(239, 14, 2, 7, '2015-09-17 08:32:50', '2015-09-17 08:32:50'),
(240, 14, 3, 9, '2015-09-17 08:32:50', '2015-09-17 08:32:50'),
(287, 16, 1, 1, '2015-11-18 01:59:58', '2015-11-18 01:59:58'),
(336, 1, 1, 1, '2015-12-04 02:23:07', '2015-12-04 02:23:07'),
(337, 1, 1, 3, '2015-12-04 02:23:07', '2015-12-04 02:23:07'),
(338, 1, 2, 5, '2015-12-04 02:23:07', '2015-12-04 02:23:07'),
(339, 1, 3, 9, '2015-12-04 02:23:07', '2015-12-04 02:23:07'),
(340, 1, 3, 11, '2015-12-04 02:23:07', '2015-12-04 02:23:07'),
(345, 3, 1, 2, '2015-12-04 02:24:04', '2015-12-04 02:24:04'),
(346, 3, 2, 6, '2015-12-04 02:24:04', '2015-12-04 02:24:04'),
(347, 3, 3, 9, '2015-12-04 02:24:04', '2015-12-04 02:24:04'),
(348, 3, 3, 10, '2015-12-04 02:24:04', '2015-12-04 02:24:04'),
(349, 4, 1, 1, '2015-12-04 02:24:25', '2015-12-04 02:24:25'),
(350, 4, 2, 6, '2015-12-04 02:24:25', '2015-12-04 02:24:25'),
(351, 4, 2, 8, '2015-12-04 02:24:25', '2015-12-04 02:24:25'),
(352, 4, 3, 10, '2015-12-04 02:24:25', '2015-12-04 02:24:25'),
(353, 5, 1, 1, '2015-12-04 02:24:59', '2015-12-04 02:24:59'),
(354, 5, 3, 10, '2015-12-04 02:24:59', '2015-12-04 02:24:59'),
(359, 7, 1, 1, '2015-12-04 02:26:13', '2015-12-04 02:26:13'),
(360, 7, 1, 3, '2015-12-04 02:26:13', '2015-12-04 02:26:13'),
(361, 7, 2, 5, '2015-12-04 02:26:13', '2015-12-04 02:26:13'),
(362, 7, 2, 6, '2015-12-04 02:26:13', '2015-12-04 02:26:13'),
(363, 7, 2, 7, '2015-12-04 02:26:13', '2015-12-04 02:26:13'),
(364, 7, 3, 11, '2015-12-04 02:26:13', '2015-12-04 02:26:13'),
(365, 9, 1, 2, '2015-12-04 02:26:48', '2015-12-04 02:26:48'),
(366, 9, 1, 3, '2015-12-04 02:26:48', '2015-12-04 02:26:48'),
(367, 9, 2, 6, '2015-12-04 02:26:48', '2015-12-04 02:26:48'),
(368, 9, 2, 7, '2015-12-04 02:26:48', '2015-12-04 02:26:48'),
(369, 9, 2, 8, '2015-12-04 02:26:48', '2015-12-04 02:26:48'),
(370, 9, 3, 9, '2015-12-04 02:26:48', '2015-12-04 02:26:48'),
(371, 9, 3, 11, '2015-12-04 02:26:48', '2015-12-04 02:26:48'),
(372, 10, 1, 2, '2015-12-04 02:29:17', '2015-12-04 02:29:17'),
(373, 10, 1, 3, '2015-12-04 02:29:17', '2015-12-04 02:29:17'),
(374, 10, 2, 5, '2015-12-04 02:29:17', '2015-12-04 02:29:17'),
(375, 10, 2, 7, '2015-12-04 02:29:17', '2015-12-04 02:29:17'),
(376, 10, 3, 9, '2015-12-04 02:29:17', '2015-12-04 02:29:17'),
(377, 10, 3, 10, '2015-12-04 02:29:17', '2015-12-04 02:29:17'),
(378, 12, 1, 1, '2015-12-04 02:30:41', '2015-12-04 02:30:41'),
(379, 12, 2, 6, '2015-12-04 02:30:41', '2015-12-04 02:30:41'),
(380, 12, 2, 8, '2015-12-04 02:30:41', '2015-12-04 02:30:41'),
(381, 15, 1, 2, '2015-12-04 02:32:58', '2015-12-04 02:32:58'),
(382, 18, 1, 1, '2015-12-04 02:34:34', '2015-12-04 02:34:34'),
(385, 6, 1, 1, '2015-12-24 04:05:47', '2015-12-24 04:05:47'),
(386, 6, 2, 6, '2015-12-24 04:05:47', '2015-12-24 04:05:47'),
(387, 6, 2, 8, '2015-12-24 04:05:47', '2015-12-24 04:05:47'),
(388, 6, 3, 10, '2015-12-24 04:05:47', '2015-12-24 04:05:47'),
(389, 13, 1, 1, '2015-12-24 04:06:48', '2015-12-24 04:06:48'),
(409, 2, 1, 1, '2016-01-22 01:53:48', '2016-01-22 01:53:48'),
(410, 2, 2, 7, '2016-01-22 01:53:48', '2016-01-22 01:53:48'),
(411, 2, 3, 8, '2016-01-22 01:53:48', '2016-01-22 01:53:48'),
(412, 2, 3, 11, '2016-01-22 01:53:48', '2016-01-22 01:53:48'),
(446, 20, 1, 1, '2016-03-01 06:08:32', '2016-03-01 06:08:32'),
(447, 20, 1, 2, '2016-03-01 06:08:33', '2016-03-01 06:08:33'),
(448, 20, 1, 3, '2016-03-01 06:08:33', '2016-03-01 06:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `ds_rating`
--

CREATE TABLE IF NOT EXISTS `ds_rating` (
  `id` int(10) unsigned NOT NULL,
  `feedback_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `answer` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_rating`
--

INSERT INTO `ds_rating` (`id`, `feedback_id`, `type_id`, `answer`, `created_at`, `updated_at`) VALUES
(7, 3, 4, 5, '2015-05-16 15:07:02', '2015-05-16 15:07:02'),
(8, 3, 5, 5, '2015-05-16 15:07:02', '2015-05-16 15:07:02'),
(9, 3, 6, 5, '2015-05-16 15:07:02', '2015-05-16 15:07:02'),
(10, 4, 16, 5, '2015-05-23 06:26:33', '2015-05-23 06:26:33'),
(11, 4, 17, 5, '2015-05-23 06:26:33', '2015-05-23 06:26:33'),
(12, 4, 18, 5, '2015-05-23 06:26:33', '2015-05-23 06:26:33'),
(13, 5, 10, 5, '2015-05-24 01:11:26', '2015-05-24 01:11:26'),
(14, 5, 11, 4, '2015-05-24 01:11:26', '2015-05-24 01:11:26'),
(15, 5, 12, 3, '2015-05-24 01:11:26', '2015-05-24 01:11:26'),
(16, 6, 13, 5, '2015-05-24 01:12:26', '2015-05-24 01:12:26'),
(17, 6, 14, 3, '2015-05-24 01:12:26', '2015-05-24 01:12:26'),
(18, 6, 15, 5, '2015-05-24 01:12:26', '2015-05-24 01:12:26'),
(19, 7, 7, 5, '2015-05-24 01:13:42', '2015-05-24 01:13:42'),
(20, 7, 8, 5, '2015-05-24 01:13:42', '2015-05-24 01:13:42'),
(21, 7, 9, 5, '2015-05-24 01:13:42', '2015-05-24 01:13:42'),
(22, 8, 4, 5, '2015-05-26 04:52:26', '2015-05-26 04:52:26'),
(23, 8, 5, 4, '2015-05-26 04:52:26', '2015-05-26 04:52:26'),
(24, 8, 6, 2, '2015-05-26 04:52:26', '2015-05-26 04:52:26'),
(25, 9, 28, 5, '2015-06-23 12:22:58', '2015-06-23 12:22:58'),
(26, 9, 29, 4, '2015-06-23 12:22:58', '2015-06-23 12:22:58'),
(27, 9, 30, 5, '2015-06-23 12:22:58', '2015-06-23 12:22:58'),
(28, 10, 19, 5, '2015-06-25 11:42:19', '2015-06-25 11:42:19'),
(29, 10, 20, 5, '2015-06-25 11:42:20', '2015-06-25 11:42:20'),
(30, 10, 21, 5, '2015-06-25 11:42:20', '2015-06-25 11:42:20'),
(31, 11, 52, 3, '2016-02-22 09:11:57', '2016-02-22 09:11:57'),
(32, 11, 53, 3, '2016-02-22 09:11:58', '2016-02-22 09:11:58'),
(33, 11, 54, 3, '2016-02-22 09:11:58', '2016-02-22 09:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `ds_rating_type`
--

CREATE TABLE IF NOT EXISTS `ds_rating_type` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_score` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_rating_type`
--

INSERT INTO `ds_rating_type` (`id`, `company_id`, `name`, `is_visible`, `is_score`, `created_at`, `updated_at`, `nameit`, `namees`) VALUES
(1, 1, 'Service', 1, 1, '2015-04-21 05:13:41', '2015-04-21 05:13:41', 'Service', 'Service'),
(2, 1, 'Quality', 1, 1, '2015-04-21 05:13:41', '2015-04-21 05:13:41', 'Quality', 'Quality'),
(3, 1, 'Clean', 1, 1, '2015-04-21 05:13:41', '2015-04-21 05:13:41', 'Clean', 'Clean'),
(4, 2, 'Service', 1, 1, '2015-04-28 22:44:20', '2015-04-28 22:44:20', 'Service', 'Service'),
(5, 2, 'Quality', 1, 1, '2015-04-28 22:44:20', '2015-04-28 22:44:20', 'Quality', 'Quality'),
(6, 2, 'Clean', 1, 1, '2015-04-28 22:44:20', '2015-04-28 22:44:20', 'Clean', 'Clean'),
(7, 3, 'Service', 1, 1, '2015-05-16 13:47:20', '2015-05-16 13:47:20', 'Service', 'Service'),
(8, 3, 'Quality', 1, 1, '2015-05-16 13:47:20', '2015-05-16 13:47:20', 'Quality', 'Quality'),
(9, 3, 'Clean', 1, 1, '2015-05-16 13:47:20', '2015-05-16 13:47:20', 'Clean', 'Clean'),
(10, 4, 'Service', 1, 1, '2015-05-16 13:48:33', '2015-05-16 13:48:33', 'Service', 'Service'),
(11, 4, 'Quality', 1, 1, '2015-05-16 13:48:33', '2015-05-16 13:48:33', 'Quality', 'Quality'),
(12, 4, 'Clean', 1, 1, '2015-05-16 13:48:33', '2015-05-16 13:48:33', 'Clean', 'Clean'),
(13, 5, 'Service', 1, 1, '2015-05-16 13:49:20', '2015-05-16 13:49:20', 'Service', 'Service'),
(14, 5, 'Quality', 1, 1, '2015-05-16 13:49:20', '2015-05-16 13:49:20', 'Quality', 'Quality'),
(15, 5, 'Clean', 1, 1, '2015-05-16 13:49:20', '2015-05-16 13:49:20', 'Clean', 'Clean'),
(16, 6, 'Service', 1, 1, '2015-05-16 14:38:33', '2015-05-16 14:38:33', 'Service', 'Service'),
(17, 6, 'Quality', 1, 1, '2015-05-16 14:38:34', '2015-05-16 14:38:34', 'Quality', 'Quality'),
(18, 6, 'Clean', 1, 1, '2015-05-16 14:38:34', '2015-05-16 14:38:34', 'Clean', 'Clean'),
(19, 7, 'Service', 1, 1, '2015-05-30 19:20:46', '2015-05-30 19:20:46', 'Service', 'Service'),
(20, 7, 'Quality', 1, 1, '2015-05-30 19:20:46', '2015-05-30 19:20:46', 'Quality', 'Quality'),
(21, 7, 'Clean', 1, 1, '2015-05-30 19:20:46', '2015-05-30 19:20:46', 'Clean', 'Clean'),
(25, 9, 'Service', 1, 1, '2015-05-30 19:44:42', '2015-05-30 19:44:42', 'Service', 'Service'),
(26, 9, 'Quality', 1, 1, '2015-05-30 19:44:42', '2015-05-30 19:44:42', 'Quality', 'Quality'),
(27, 9, 'Clean', 1, 1, '2015-05-30 19:44:42', '2015-05-30 19:44:42', 'Clean', 'Clean'),
(28, 10, 'Service', 1, 1, '2015-06-06 12:11:16', '2015-06-06 12:11:16', 'Service', 'Service'),
(29, 10, 'Quality', 1, 1, '2015-06-06 12:11:16', '2015-06-06 12:11:16', 'Quality', 'Quality'),
(30, 10, 'Clean', 1, 1, '2015-06-06 12:11:16', '2015-06-06 12:11:16', 'Clean', 'Clean'),
(31, 13, 'Service', 1, 1, '2015-09-08 13:09:02', '2015-09-08 13:09:02', 'Service', 'Service'),
(32, 13, 'Quality', 1, 1, '2015-09-08 13:09:02', '2015-09-08 13:09:02', 'Quality', 'Quality'),
(33, 13, 'Clean', 1, 1, '2015-09-08 13:09:02', '2015-09-08 13:09:02', 'Clean', 'Clean'),
(34, 14, 'Service', 1, 1, '2015-09-08 13:14:16', '2015-09-08 13:14:16', 'Service', 'Service'),
(35, 14, 'Quality', 1, 1, '2015-09-08 13:14:16', '2015-09-08 13:14:16', 'Quality', 'Quality'),
(36, 14, 'Clean', 1, 1, '2015-09-08 13:14:16', '2015-09-08 13:14:16', 'Clean', 'Clean'),
(37, 15, 'Service', 1, 1, '2015-10-14 12:30:50', '2015-10-14 12:30:50', 'Service', 'Service'),
(38, 15, 'Quality', 1, 1, '2015-10-14 12:30:50', '2015-10-14 12:30:50', 'Quality', 'Quality'),
(39, 15, 'Clean', 1, 1, '2015-10-14 12:30:50', '2015-10-14 12:30:50', 'Clean', 'Clean'),
(43, 17, 'Service', 1, 1, '2015-11-18 04:56:57', '2015-11-18 04:56:57', '', ''),
(44, 17, 'Quality', 1, 1, '2015-11-18 04:56:57', '2015-11-18 04:56:57', '', ''),
(45, 17, 'Clean', 1, 1, '2015-11-18 04:56:57', '2015-11-18 04:56:57', '', ''),
(46, 18, 'Service', 1, 1, '2015-11-19 20:44:22', '2015-11-19 20:44:22', '', ''),
(47, 18, 'Quality', 1, 1, '2015-11-19 20:44:22', '2015-11-19 20:44:22', '', ''),
(48, 18, 'Clean', 1, 1, '2015-11-19 20:44:22', '2015-11-19 20:44:22', '', ''),
(49, 19, 'Service', 1, 1, '2015-12-22 20:23:18', '2015-12-22 20:23:18', '', ''),
(50, 19, 'Quality', 1, 1, '2015-12-22 20:23:18', '2015-12-22 20:23:18', '', ''),
(51, 19, 'Clean', 1, 1, '2015-12-22 20:23:18', '2015-12-22 20:23:18', '', ''),
(52, 20, 'Service', 1, 1, '2015-12-24 08:56:38', '2015-12-24 08:56:38', '', ''),
(53, 20, 'Quality', 1, 1, '2015-12-24 08:56:38', '2015-12-24 08:56:38', '', ''),
(54, 20, 'Clean', 1, 1, '2015-12-24 08:56:38', '2015-12-24 08:56:38', '', ''),
(55, 22, 'Service', 1, 1, '2016-01-25 05:22:11', '2016-01-25 05:22:11', '', ''),
(56, 22, 'Quality', 1, 1, '2016-01-25 05:22:11', '2016-01-25 05:22:11', '', ''),
(57, 22, 'Clean', 1, 1, '2016-01-25 05:22:11', '2016-01-25 05:22:11', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ds_review_photo`
--

CREATE TABLE IF NOT EXISTS `ds_review_photo` (
  `id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `photo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ds_site_languages`
--

CREATE TABLE IF NOT EXISTS `ds_site_languages` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_site_languages`
--

INSERT INTO `ds_site_languages` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'english', '', '2015-10-21 22:44:46', '2015-10-21 22:44:46'),
(2, 'italian', 'it', '2015-10-21 22:44:46', '2015-10-21 22:44:46'),
(3, 'spanish', 'es', '2015-10-21 22:44:46', '2015-10-21 22:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `ds_store`
--

CREATE TABLE IF NOT EXISTS `ds_store` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lng` decimal(10,6) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count_view` int(11) NOT NULL,
  `token` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `secure_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_value` int(20) DEFAULT NULL,
  `duration` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_amount` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionit` text COLLATE utf8_unicode_ci NOT NULL,
  `descriptiones` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_store`
--

INSERT INTO `ds_store` (`id`, `company_id`, `name`, `email`, `city_id`, `phone`, `photo`, `zip_code`, `address`, `lat`, `lng`, `description`, `keyword`, `count_view`, `token`, `secure_key`, `salt`, `slug`, `price`, `price_value`, `duration`, `book_amount`, `options`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(6, 2, 'Car Gas Station', 'jeni@varaa.com', 1, '4834838', 'M9NUippoQbd9OVIBjV7CEzmP.jpg', '', '', '60.170800', '24.937500', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe first floor is home to an intimate and sophisticated Brasserie that serves traditional British dishes using the best of seasonal ingredients. It is a fantastic place to draw out lunches and dinners with cocktails, fine wines and a plate of Britain’s best produce prepared by Head Chef Michael Lecouter. The Chef Dining Room is ideal for 28 guests seated or 40 guests standing and beautifully decorated with antique maps and a majestic chandelier. The Art Gallery, an airy space that’s perfect for a canapé party for up to 30 guests, opens onto the courtyard for an al fresco summer atmosphere. La Cave is a Bespoke Wine Retailer as well as a private room situated which can accommodate up to 15 seated or up to 25 for a standing reception.', '333', 93, 'L8A3O', '878eb7e6915b316df5b749375e1c3e20', 'V7iC0Cx6', 'jeni-varaa-1', 'HP', 45, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-04-21 13:31:43', '2016-02-26 07:19:48', 'Car Gas Station', 'Car Gas Station', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe fi', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe fi'),
(7, 2, 'Motor Service', 'jeni@varaa.com2', 3, '48348382', 'Hq9ytGMkaTaPKrdO1uNPSpqm.jpg', '23948', '2', '60.170800', '24.937500', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe first floor is home to an intimate and sophisticated Brasserie that serves traditional British dishes using the best of seasonal ingredients. It is a fantastic place to draw out lunches and dinners with cocktails, fine wines and a plate of Britain’s best produce prepared by Head Chef Michael Lecouter. The Chef Dining Room is ideal for 28 guests seated or 40 guests standing and beautifully decorated with antique maps and a majestic chandelier. The Art Gallery, an airy space that’s perfect for a canapé party for up to 30 guests, opens onto the courtyard for an al fresco summer atmosphere. La Cave is a Bespoke Wine Retailer as well as a private room situated which can accommodate up to 15 seated or up to 25 for a standing reception.', '333', 36, '9G9T4', '878eb7e6915b316df5b749375e1c3e20', 'AhtjoSoy', 'jeni-varaa2', 'FP', 450, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-04-21 13:32:46', '2016-02-26 07:19:47', 'Motor Service', 'Motor Service', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe fi', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe fi'),
(10, 2, 'Snow Cleaning', 'jeni@varaa.com', 1, '49839391', 'DKGKlu8unLsZPFIQM2Htu7Wd.jpg', '49489111', '48498111', '60.223447', '24.611092', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe first floor is home to an intimate and sophisticated Brasserie that serves traditional British dishes using the best of seasonal ingredients. It is a fantastic place to draw out lunches and dinners with cocktails, fine wines and a plate of Britain’s best produce prepared by Head Chef Michael Lecouter. The Chef Dining Room is ideal for 28 guests seated or 40 guests standing and beautifully decorated with antique maps and a majestic chandelier. The Art Gallery, an airy space that’s perfect for a canapé party for up to 30 guests, opens onto the courtyard for an al fresco summer atmosphere. La Cave is a Bespoke Wine Retailer as well as a private room situated which can accommodate up to 15 seated or up to 25 for a standing reception.', '89437439873498', 19, 'RLYZU', '93cdc937d3b65bf5334a13a1ac777e2d', 'kjcM5d1B', 'jeni-sushi-restaurant', 'FP', 700, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-04-28 23:58:54', '2016-02-23 02:09:59', 'Snow Cleaning', 'Snow Cleaning', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe fi', 'Located within a historic cobbled courtyard in the heart of Mayfair, the two traditional Mews buildings are beautifully converted to a first floor Brasserie, Private Dining Rooms, Lounge and Cocktail Bar serving London''s most discerning residents.\r\nThe fi'),
(18, 3, 'Fitness & Health Center', 'jeni@finternet-group.com', 1, '5959848', 'oi4VSr6ktwQgo1ljSemYjYBF.jpg', '49487', 'ST, Helsinki', '60.170800', '24.937500', 'Main workout area[edit]\r\nMost health clubs have a main workout area, which primarily consists of free weights including dumbbells, barbells and exercise machines. This area often includes mirrors so that exercisers can monitor and maintain correct posture during their workout.\r\n\r\nA gym that predominantly or exclusively consists of free weights (dumbbells and barbells), as opposed to exercise machines, is sometimes referred to as a black-iron gym, after the traditional color of weight plates.[1]\r\n\r\nCardio area/Theatre[edit]\r\n\r\nA cardio theatre including treadmills, stationary bikes and TV displays\r\nA cardio theater or cardio area includes many types of cardiovascular training-related equipment such as rowing machines, stationary exercise bikes, elliptical trainers and treadmills. These areas often include a number of audio-visual displays (either integrated into the equipment, or placed on walls around the area itself) in order to keep exercisers entertained during long cardio workout sessions.', 'gym, fitness, car, motor, yoga', 24, 'G6O9N', '4732cdcc5481e4403bc52c7e2956cce5', '9mkT1rPs', 'fitness-health-center', 'HP', 20, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-16 14:20:53', '2016-02-12 03:49:08', 'Fitness & Health Center', 'Fitness & Health Center', 'Main workout area[edit]\r\nMost health clubs have a main workout area, which primarily consists of free weights including dumbbells, barbells and exercise machines. This area often includes mirrors so that exercisers can monitor and maintain correct posture', 'Main workout area[edit]\r\nMost health clubs have a main workout area, which primarily consists of free weights including dumbbells, barbells and exercise machines. This area often includes mirrors so that exercisers can monitor and maintain correct posture'),
(19, 3, 'Health Center', 'jeni@finternet-group.com', 1, '5959848', '6lAbiSvsL8H4dKtwrYq4352f.jpg', '489489', 'address 10', '60.170800', '24.937500', 'Group exercise classes[edit]\r\n\r\nSpin-cycle group exercise class\r\nMost newer health clubs offer group exercise classes that are conducted by certified fitness instructors. Many types of group exercise classes exist, but generally these include classes based on aerobics, cycling (spin cycle), boxing or martial arts, high intensity training, step, regular and hot (Bikram) yoga, pilates, muscle training, and self-defense classes such as Krav Maga and Brazilian jiu-jitsu. Health clubs with swimming pools often offer aqua aerobics classes. The instructors often must gain certification in order to teach these classes and ensure participant safety.', 'gym, fitness, car, motor, yoga', 148, '9ZEDM', 'af296b9f295aa59d05e611e5fa926dd9', 'Sg0d5nqm', 'health-center', 'FP', 500, '90', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-16 14:24:05', '2016-02-25 09:35:57', 'Health Center', 'Health Center', 'Group exercise classes[edit]\r\n\r\nSpin-cycle group exercise class\r\nMost newer health clubs offer group exercise classes that are conducted by certified fitness instructors. Many types of group exercise classes exist, but generally these include classes base', 'Group exercise classes[edit]\r\n\r\nSpin-cycle group exercise class\r\nMost newer health clubs offer group exercise classes that are conducted by certified fitness instructors. Many types of group exercise classes exist, but generally these include classes base'),
(20, 6, 'IT Program Center', 'goshawk310@gmail.com', NULL, '12345687987', 'BGsopbpbhJjz8VZiBK4YlRIr.jpg', '65001', 'Vaasa 76', '41.902784', '12.496366', 'The Center for Khmer Studies (CKS) is offering 5 American, 5 Cambodian and 5 French undergraduate students an exciting opportunity to join a 6 weeks (from Monday June 29th, 2015 to Friday August 7th, 2015) Summer Junior Resident Fellowship Program in Cambodia. The program provides a unique experience allowing students to live and study alongside others from different backgrounds and cultures while learning about the history and society of today’s Cambodia. - See more at: http://www.khmerstudies.org/research-training/summer-junior-resident-fellowship-program/#sthash.IYY89z5I.dpuf', 'program, IT, Center', 176, 'RCNQU', 'e638ea0cf947e944dd632eb64f4665fd', 'xeOXWENS', 'it-program-center', 'HP', 30, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-16 14:42:20', '2016-02-26 07:19:43', 'IT Program Center', 'IT Program Center', 'The Center for Khmer Studies (CKS) is offering 5 American, 5 Cambodian and 5 French undergraduate students an exciting opportunity to join a 6 weeks (from Monday June 29th, 2015 to Friday August 7th, 2015) Summer Junior Resident Fellowship Program in Camb', 'The Center for Khmer Studies (CKS) is offering 5 American, 5 Cambodian and 5 French undergraduate students an exciting opportunity to join a 6 weeks (from Monday June 29th, 2015 to Friday August 7th, 2015) Summer Junior Resident Fellowship Program in Camb'),
(21, 5, 'Baby Sitting', 'imak.success@gmail.com', 1, '123548542', 'ZjohVxw1xz4vA29O1CDcogfG.jpg', '455688', 'Phonompenh', '60.170800', '24.937500', '<b>Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</b>', 'bay, mother, sitting', 188, 'V7EZP', 'cb0da000d668aecb50f21a363c1a8811', 'zzcxdU8o', 'baby-sitting', 'HP', 20, '60', '5', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:2:"30";s:14:"delivery_place";s:6:"online";s:16:"office_available";s:1:"1";s:12:"office_range";s:2:"25";s:18:"discount_available";s:1:"1";s:14:"discount_price";s:2:"15";}', '2015-05-23 23:49:44', '2016-02-23 02:09:40', 'Baby Sitting', 'Baby Sitting', '<b>Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliq', '<b>Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliq'),
(24, 5, 'Music Lesson', 'imak.success@gmail.com', 3, '2125458', 'A5emJu3AaZIuvAPGqXO9EheJ.jpg', '488952', 'Music Street No lesson', '60.170800', '24.937500', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.', 'Music, Lesson, Younger', 11, 'IJLIN', 'b2da8e4f0a91155a7ae81f311ecd3c2f', 'hyDTINYw', 'music-lesson', 'FP', 50, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-23 23:58:30', '2015-11-21 17:52:26', 'Music Lesson', 'Music Lesson', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip'),
(25, 3, 'Coffee bar', 'jeni@finternet-group.com', 8, '12354879', '1zR7AMPT8jjfKUwHSsbkNa00.jpg', '87965', 'coffee street', '60.170800', '24.937500', 'Ayant travaillé un mois et demi au club med d''Avoriaz et durant 4 mois ensuite dans un hotel 4 étoiles en Corse en tant que femme de chambre, je vous propose mes service dans ce domaine.  Minutieuse et exigeante de nature, je mènerai à bien les tâches qui me seront confier par vos soins.  N''hésitez pas à me contacter pour tout renseignement.', 'Coffee, bar, food, dirty, clean', 11, 'D7VQV', '91662178ffdf76ae339c36c0e396b394', '1pwivJvE', 'coffee-bar', 'FP', 50, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-24 00:07:41', '2015-12-03 01:17:42', 'Coffee bar', 'Coffee bar', 'Ayant travaillé un mois et demi au club med d''Avoriaz et durant 4 mois ensuite dans un hotel 4 étoiles en Corse en tant que femme de chambre, je vous propose mes service dans ce domaine.  Minutieuse et exigeante de nature, je mènerai à bien les tâches qui', 'Ayant travaillé un mois et demi au club med d''Avoriaz et durant 4 mois ensuite dans un hotel 4 étoiles en Corse en tant que femme de chambre, je vous propose mes service dans ce domaine.  Minutieuse et exigeante de nature, je mènerai à bien les tâches qui'),
(26, 3, 'Motor service', 'goshawk310@gmail.com', 7, '12654898', 'dOXwqKI2NQJzAWPxwga8HuDf.jpg', '548899', 'Motor street', '60.170800', '24.937500', 'Ayant travaillé un mois et demi au club med d''Avoriaz et durant 4 mois ensuite dans un hotel 4 étoiles en Corse en tant que femme de chambre, je vous propose mes service dans ce domaine.  Minutieuse et exigeante de nature, je mènerai à bien les tâches qui me seront confier par vos soins.  N''hésitez pas à me contacter pour tout renseignement.', 'Motor, engine, repair', 6, 'TZMUF', '92cafcaa0a155ebf8c2cba770fc19711', 'TtpCCdIZ', 'motor-service', 'FP', 30, '120', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-24 00:10:36', '2016-02-02 06:50:32', 'Motor service', 'Motor service', 'Ayant travaillé un mois et demi au club med d''Avoriaz et durant 4 mois ensuite dans un hotel 4 étoiles en Corse en tant que femme de chambre, je vous propose mes service dans ce domaine.  Minutieuse et exigeante de nature, je mènerai à bien les tâches qui', 'Ayant travaillé un mois et demi au club med d''Avoriaz et durant 4 mois ensuite dans un hotel 4 étoiles en Corse en tant que femme de chambre, je vous propose mes service dans ce domaine.  Minutieuse et exigeante de nature, je mènerai à bien les tâches qui'),
(27, 4, 'WEB Sevice', 'imak.success@gmail.com', 4, '2354568', 'xVdhRNrWNinkmtRQE7GQ1Ne6.jpg', '54895', 'service street', '60.170800', '24.937500', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.', 'WEB, program, wordpress, joomla, laravel', 90, 'VKFAR', '261bc6436f9a23fbd9b86558c95b7c6f', 'cCx8HpY5', 'web-sevice', 'HP', 30, '120', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-24 00:59:39', '2016-02-26 08:07:36', 'WEB Sevice', 'WEB Sevice', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip'),
(29, 4, 'Car Gas Station', 'imak.success@gmail.com', 4, '58795655', 'R4GJr1wo2r3aekMOglCMLB9B.jpg', '55898', 'station green street', '60.170800', '24.937500', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.', 'car, engine, gas, repair', 24, 'DJPQI', '1955feca715c5b13545690c65bfd2972', 'j65cs2Ay', 'car-gas-station', 'FP', 350, '120', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-24 01:04:36', '2016-02-26 09:05:29', 'Car Gas Station', 'Car Gas Station', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip'),
(30, 6, 'baby sitting', 'goshawk310@gmail.com', NULL, '87465463', 'N0VVzFMjIsXHqo6BgaXBsH3Z.jpg', '54489', 'sitting street', '41.902784', '12.496366', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.', 'baby, parent,house, sitting', 23, 'ZWM7P', '1f152a785d8e91246c5b1aa5e4cb92b8', 'LMJuYm8R', 'baby-sitting-1', 'HP', 30, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-24 01:07:02', '2016-02-10 07:11:14', 'baby sitting', 'baby sitting', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip', 'Raw denim you probably haven''t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip'),
(40, 6, 'Car Service', 'goshawk310@gmail.com', NULL, '5978662', 'Ky1sl57DLKABNYbqa9B1wjIP.jpg', '55555', '', '41.902784', '12.496366', 'The way we maintain our prized possessions often determines their value in our life. All car owners know the vital importance that maintenance plays in keeping their favourite vehicles in the right shape. Snapdeal brings you an extensive range of car care products and fresheners from popular brands like Armor All, Turtle Wax, F1, Speedwav, Speedy, ABRO, Bosch, Ambi Pur, and many others. All you need to do is browse the list and get the needful products based on the type, mechanism, function, etc.\r\n\r\nShop Online for Car Care and Fresheners\r\nWhy depend on external resources when you have do-it-yourself tools and equipmentâs to assist you with the cleaning and maintenance of your favourite car? Take some time out of your busy schedule on the weekends to ensure that it stays brand new and at its functional best. By doing so, you can also improve their performance and speed. For instance, you can buy a car cleaning kit to keep your vehicle shining as ever.\r\n\r\nComplete Care for Your Car\r\nShop for your car to your heartâs content. Opt for a suitable high pressure car washer or a hose pipe to clean the exterior. There are various types of car shampoos, dusters and wipers, useful cloths and microfibers available to aid you with the cleaning. The separate parts of an automobile require separate care. There are different types of cleaners available for dashboards, exteriors, glasses, interiors, tyres and so on. With the car polish and waxes and other maintenance products, caring for your car will be a smooth affair. Need to fix disfiguring scratches? There are scratch removers and spray paints to offer help. The polishing machines, paint protectors, adhesives and sealants are all provided to enable you to maintain the original novelty of your car. Prevent unexpected punctures by opting for any of the anti-puncture liquids.', 'car,clean,engine', 26, 'M56SE', '9a6f79b5c003a68676507b8cb0b515c7', 'l8TNEoIM', 'car-service-1', 'FP', 300, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-30 04:43:22', '2016-02-10 06:06:15', 'Car Service', 'Car Service', 'The way we maintain our prized possessions often determines their value in our life. All car owners know the vital importance that maintenance plays in keeping their favourite vehicles in the right shape. Snapdeal brings you an extensive range of car care', 'The way we maintain our prized possessions often determines their value in our life. All car owners know the vital importance that maintenance plays in keeping their favourite vehicles in the right shape. Snapdeal brings you an extensive range of car care'),
(41, 6, 'Dental Service', NULL, NULL, NULL, 'ZIjolTuavwof9Cvk1LuZuEbi.jpg', NULL, NULL, NULL, NULL, 'MAY 2015 - Volunteer and make a difference | Master infection control | Maximize oral cancer screening reimbursement | Managing stress\r\nAPRIL 2015 - Why I chose dental assisting | How to ask for a raise | Eye safety | 4 ways to a happier practice\r\nMARCH 2015 - Avoid your worst nightmare | Tackling ethical dilemmas | Medicare choices | 24/7 appointing\r\nFEB 2015 - Office managers say roles changing for better | ADAA undergoes major changes | Coding tips galore!\r\nJAN 2015 - Introducing new DAD editorial director | How to handle angry patients | Meet the unexpected challenges of dental assisting\r\nDEC 2014 - A fun look at a typical day for an assistant| Avoid these 8 mistakes! | Creating a kid-friendly office\r\nNOV 2014 - Assistants: Glue that hold practice together | Microscope-enhanced dentistry | Increase your productivity', 'Dental,doctor,patient', 78, '2LDBR', '55d074781c29b795c76495204debf7d4', 'dgRBLV9z', 'dental-service', 'HP', 50, '120', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-05-30 15:42:16', '2016-02-24 00:26:29', 'Dental Service', 'Dental Service', 'MAY 2015 - Volunteer and make a difference | Master infection control | Maximize oral cancer screening reimbursement | Managing stress\r\nAPRIL 2015 - Why I chose dental assisting | How to ask for a raise | Eye safety | 4 ways to a happier practice\r\nMARCH 2', 'MAY 2015 - Volunteer and make a difference | Master infection control | Maximize oral cancer screening reimbursement | Managing stress\r\nAPRIL 2015 - Why I chose dental assisting | How to ask for a raise | Eye safety | 4 ways to a happier practice\r\nMARCH 2'),
(42, 7, 'Car Service Repair', NULL, NULL, NULL, 'bEwlXxZKSbQAO52dMXIzIIJr.jpg', NULL, NULL, NULL, NULL, 'Here at The CAM Auto Repair garage, Our staffs have 20 years of combined experience in the automotive industry and pride ourselves on the fact that we take our business of diagnosing, repairing and periodic maintenance your car just as serious as your doctor does with your health in Cambodia. We guarantee you and your vehicle will be treated with respect and you will feel confident in knowing that your car was diagnosed correctly, repair and cured with care. We provide Full service and maintenance for all marks and models including: Acura, Audi, BMW, Buick, Cadillac, Chevrolet, Chrysler, Dodge, Ford, GMC, Honda, HUMMER, Hyundai, Infiniti, Isuzu, Jaguar, Jeep, Kia, Land Rover, Lexus, Lincoln, Mazda, Mercedes-Benz, Mercury, MINI, Mitsubishi, Nissan, Pontiac, Porsche, Saab, Saturn, Scion, Subaru, Suzuki, Toyota, Volkswagen, Volvo. Have your vehicle repaired right the first time; bring it in to CAM Auto Repair!', 'car, repair, engine', 46, 'DGOSC', 'f70335307deb760c2ae8a86a57ec206c', '3oYVCCBJ', 'car-service-repair-1', 'FP', 500, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-01 23:55:24', '2016-02-23 05:56:02', 'Car Service Repair', 'Car Service Repair', 'Here at The CAM Auto Repair garage, Our staffs have 20 years of combined experience in the automotive industry and pride ourselves on the fact that we take our business of diagnosing, repairing and periodic maintenance your car just as serious as your doc', 'Here at The CAM Auto Repair garage, Our staffs have 20 years of combined experience in the automotive industry and pride ourselves on the fact that we take our business of diagnosing, repairing and periodic maintenance your car just as serious as your doc'),
(43, 7, 'Hotel Clean', NULL, NULL, NULL, 'dDZA6NLIMoIiHCvFRscEJM5q.jpg', NULL, NULL, NULL, NULL, 'n our living accommodation, we always wanted to have a good environment and there is no disturb from pest. But who can control those insects not to be invaded into our building? Who can stop them? Stop pest invasion and made a good environment for your family, living with a healthy that is the purpose and goal of Khmer Cleaning Services Co., Ltd.\r\n\r\nWe are the professional company with many years of experience in the local places. We served the communities and got the refutable names from our previous customers and remarked as the leading service company in Cambodia. We equipped with the best quality products and the latest technology equipments, strong leadership management system with high responsibility, expert human resource with high commitment to accomplish the goal in front of us, guarantee to give you the best values, protect your places, no pollution environment left after our services.', 'Clean, house,dirty', 9, 'VVAAJ', 'b6f208414b95895b9abba7caa98f29ca', '0Mhdnnra', 'hotel-clean', 'HP', 31, '90', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-01 23:58:31', '2016-02-22 08:44:39', 'Hotel Clean', 'Hotel Clean', 'n our living accommodation, we always wanted to have a good environment and there is no disturb from pest. But who can control those insects not to be invaded into our building? Who can stop them? Stop pest invasion and made a good environment for your fa', 'n our living accommodation, we always wanted to have a good environment and there is no disturb from pest. But who can control those insects not to be invaded into our building? Who can stop them? Stop pest invasion and made a good environment for your fa'),
(44, 9, 'Grass Cutting', NULL, NULL, NULL, 'XWty7p1VrTXsc3loDEqWA5b4.jpg', NULL, NULL, NULL, NULL, 'A consistently maintained lawn is something that is very pleasant to behold. Mowing the lawn on a regular basis helps keep the grass short, neat and even. This also gives your lawn a very well manicured and orderly appearance. Mowing the lawn helps keep your lawn healthy and eliminate some of the pests from the grass at the same time.\r\n\r\nIt also can ensure that various pieces of debris are picked up and are cleared every week; so that nothing really accumulates on the grass. Due to this fact, we mow on a weekly basis which will allow the lawn to remain consistent in nature. All of the resources that are gained from the sun and water are spread out evenly throughout the yard. Consistency is important to both health and appearance. We usually mow once or twice a month during dormant seasons.', 'grass,cutting,garden', 8, '31PVR', 'a65b1b3e01c879b395d62e7170f2bff6', 'bWIGFo59', 'grass-cutting', 'HP', 50, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-02 00:31:03', '2016-02-12 03:31:25', 'Grass Cutting', 'Grass Cutting', 'A consistently maintained lawn is something that is very pleasant to behold. Mowing the lawn on a regular basis helps keep the grass short, neat and even. This also gives your lawn a very well manicured and orderly appearance. Mowing the lawn helps keep y', 'A consistently maintained lawn is something that is very pleasant to behold. Mowing the lawn on a regular basis helps keep the grass short, neat and even. This also gives your lawn a very well manicured and orderly appearance. Mowing the lawn helps keep y'),
(45, 9, 'House Keeping', NULL, NULL, NULL, 'nPcNwsJF7YYEfPPEXKVO4y6S.jpg', NULL, NULL, NULL, NULL, 'I have been using Linda''s bimonthly, and it is very nice to come home to a clean house on a regular basis. They are very reliable and do a good job, sometimes even outstanding. \r\n\r\nLast week after they were here I walked into my bathroom and noticed that the sink faucets were so clean they looked brand-new. I''ve been. living here 15 years and never saw them look that good! The ladies who work for Linda''s really care about pleasing the customer, and it is very much appreciated.', 'House,keeping', 2, 'KHB8D', 'fef780b5acebba747caf9560b0e02e88', 'NIFIMViK', 'house-keeping', 'HP', 30, '90', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-02 00:35:55', '2016-02-03 08:29:10', 'House Keeping', 'House Keeping', 'I have been using Linda''s bimonthly, and it is very nice to come home to a clean house on a regular basis. They are very reliable and do a good job, sometimes even outstanding. \r\n\r\nLast week after they were here I walked into my bathroom and noticed that ', 'I have been using Linda''s bimonthly, and it is very nice to come home to a clean house on a regular basis. They are very reliable and do a good job, sometimes even outstanding. \r\n\r\nLast week after they were here I walked into my bathroom and noticed that '),
(46, 10, 'Consultance', NULL, NULL, NULL, 'QHniJ0Eyjo4g7AdonM2EGIth.jpg', NULL, NULL, NULL, NULL, 'this is a test service', 'consultance, people,', 71, 'IDP4R', '62a3e6d9d328dca5de6e32e6c80e5abd', 'bBixbNOc', 'consultance', 'HP', 30, '60', '3', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";s:1:"1";s:14:"discount_price";s:2:"25";}', '2015-06-09 23:59:35', '2016-02-12 03:49:13', 'Consultance', 'Consultance', 'this is a test service', 'this is a test service'),
(47, 6, 'Wrestling', NULL, NULL, NULL, '0ez00HISNJXRlXOiaSTNhvXm.jpg', NULL, NULL, NULL, NULL, 'this is a test service', 'sport,wrestling', 50, 'PSZU6', '4a34cf338be45fb2f2618e91360fcb03', 'iO2IMAGe', 'wrestling', 'HP', 100, '90', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-10 00:32:26', '2016-02-23 05:56:06', 'Wrestling', 'Wrestling', 'this is a test service', 'this is a test service'),
(51, 6, 'Makeup', NULL, NULL, NULL, 'V5sJeEjSPFIZ0NGf21khJhhf.png', NULL, NULL, NULL, NULL, 'This is a test service ', 'makeup, test', 5, '8IXEB', 'e59611a69d9635ccf0877ff3a3f55b28', 'uar9wXKz', 'makeup', 'FP', 99, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-11 06:32:01', '2016-02-03 08:29:44', 'Makeup', 'Makeup', 'This is a test service ', 'This is a test service '),
(52, 6, 'Iron', NULL, NULL, NULL, 'hRoni0m4Yg20AWMq0qnblGov.jpg', NULL, NULL, NULL, NULL, 'this is a test service', 'iron,clean,cloth', 9, 'DOJWH', 'eb8effa28e474b515f46c2aabbcfa490', 'nLr9CiZ7', 'iron', 'HP', 50, '90', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-11 12:40:08', '2016-02-23 02:13:29', 'Iron', 'Iron', 'this is a test service', 'this is a test service'),
(53, 6, 'Yoga Sport', NULL, NULL, NULL, '3GPPUYHH9JE92xuAfHTxo5XD.jpg', NULL, NULL, NULL, NULL, 'This is a test service', 'yoga,health', 6, 'CRXAH', '83c5dff5c4d3e99de2e184fb2e810aff', '3m1BL31A', 'yoga-sport', 'FP', 100, '60', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:2:"30";s:14:"delivery_place";s:6:"online";s:16:"office_available";s:1:"1";s:12:"office_range";s:2:"25";s:18:"discount_available";s:1:"1";s:14:"discount_price";s:2:"90";}', '2015-06-13 11:54:57', '2016-02-23 02:13:28', 'Yoga Sport', 'Yoga Sport', 'This is a test service', 'This is a test service'),
(54, 5, 'Advertise', NULL, NULL, NULL, 'X8goDdKWNJCRrJ2UU91v089p.jpg', NULL, NULL, NULL, NULL, 'this is a test service', 'Total', 8, 'HWKVI', 'c394367511693388b482f88a2bddea26', 'mEFD47om', 'advertise', 'FP', 850, '60', '3', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-23 23:01:30', '2015-12-24 17:49:48', 'Advertise', 'Advertise', 'this is a test service', 'this is a test service'),
(55, 10, 'Computer Repair', NULL, NULL, NULL, 'L8v6pjYIYEQyHg5ni1p0vzt5.jpg', NULL, NULL, NULL, NULL, 'This is a test service on admin', 'computer,repair', 24, 'Z5C8M', 'e119cfc047ddc99fab903e752116ed7f', 'XqpxhQih', 'computer-repair', NULL, 555, '60', '3', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-06-25 23:17:41', '2016-02-22 01:15:16', 'Computer Repair', 'Computer Repair', 'This is a test service on admin', 'This is a test service on admin'),
(56, 5, 'LOGO CREATE', NULL, NULL, NULL, '4g5UE57G5qT3O2AYeG6LoZii.jpg', NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec aliquet turpis. Nam in arcu in lorem dapibus ultricies ac eu quam. Mauris dignissim orci.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec aliquet turpis. Nam in arcu in lorem dapibus ultricies ac eu quam. Mauris dignissim orci.', 'logo,web,service', 9, 'T7ODF', '35c65a94b342386a9d5e617076ca591b', 'IYk2xwjE', 'logo-create', NULL, 99, '90', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2015-07-02 12:59:58', '2016-02-26 06:01:14', 'LOGO CREATE', 'LOGO CREATE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec aliquet turpis. Nam in arcu in lorem dapibus ultricies ac eu quam. Mauris dignissim orci.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec aliquet turpis. Nam in arcu ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec aliquet turpis. Nam in arcu in lorem dapibus ultricies ac eu quam. Mauris dignissim orci.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec aliquet turpis. Nam in arcu '),
(57, 14, 'Service without Offices and deliver online', NULL, NULL, NULL, 'dcDe7bYGkHdTmYMZMcypPpcz.jpg', NULL, NULL, NULL, NULL, 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management&nbsp;<i><u><b>Read more</b></u></i><br>', 'company, tools, computer', 35, 'K666A', '74d064112e7b63c22178694e1590ae33', 'f6S5DnJ1', 'service-without-offices', NULL, 40, '60', '5', 'a:7:{s:17:"service_available";N;s:13:"delivery_days";s:1:"5";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:3:"100";s:18:"discount_available";N;s:14:"discount_price";s:2:"28";}', '2015-09-08 16:05:00', '2016-02-22 01:13:03', 'Service without Offices and deliver online', 'Service without Offices and deliver online', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bo', 'The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bo'),
(58, 14, 'Service without Offices and deliver online with discount', NULL, NULL, NULL, 'apXbJA17yzz32AyspHSQFzC3.png', NULL, NULL, NULL, NULL, '<span>The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , public bodies, in order to meet their needs. Company was born from the passion of scholars and technicians who have decided to offer a service of quality and competence to its clients ready to be of assistance for the professional growth to the development of the market dynamics .Through training courses, Company is able to develop training projects aimed at providing an added value to its work in terms of quality and competitiveness.The training area, in fact, foresees an educational offer that gives to the users solutions of professional development aimed to consolidate its skills and acquire new ones for a conscious approach to the world of work , or simply for its own personal growth in the working sector of reference.The training takes place in the class but also through training “in house” and modules that provide users with a great dynamism in terms of saving time and costs.The Staff examines with the interested parties the chosen course and recommends the training course which best suits their needs, aspirations and attitudes.For the enterprises, training is supplied in the thematic areas related to the activity of the enterprise: the market , the economic and financial management <b><i><u>Read more</u></i></b></span>', '', 23, '8KCAL', '7a34e0e0514be0317c886eda5f6d567b', 'wB94gEa4', 'service-online-deliver', NULL, 30, '60', '5', 'a:7:{s:17:"service_available";N;s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";s:1:"1";s:14:"discount_price";s:2:"20";}', '2015-09-08 16:08:19', '2016-02-26 07:19:46', 'Service without Offices and deliver online with discount', 'Service without Offices and deliver online with discount', '<span>The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , pub', '<span>The Company is situated in Italy and provides effective solutions for the professional growth through a wide range of services for professionals ranging from the training to the professional updating but they look to the citizens , enterprises , pub'),
(66, 2, 'dsds', NULL, NULL, NULL, 'bWcW52EYU4s5qz6Lqt9h9YdC.jpg', NULL, NULL, NULL, NULL, 'namenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamename', '', 1, 'ZH2DQ', '40d42c6d413f1506fe357c1c0cd2cb5e', 'A7maTusa', 'dsds', NULL, 2332232, '25', '1', 'a:7:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";s:0:"";s:18:"discount_available";N;s:14:"discount_price";s:0:"";}', '2016-01-28 04:45:37', '2016-02-26 07:19:43', 'dsds', 'dsds', 'namenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenam', 'namenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenam'),
(68, 20, 'My First Service', NULL, NULL, NULL, 'XT7v8GPrYKutc7wTQcCpjc18.jpg', NULL, NULL, NULL, NULL, 'My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service My First Service ', NULL, 30, 'X2XYO', '76cd3b8814dbdfb1afc08dbe0c73442b', 'TnZZxJ2a', 'my-first-service-1', NULL, 1000, '50', '1,2', 'a:8:{s:17:"service_available";s:1:"1";s:13:"delivery_days";s:0:"";s:14:"delivery_place";s:6:"online";s:16:"office_available";s:1:"1";s:12:"office_range";N;s:18:"discount_available";N;s:14:"discount_price";s:0:"";s:12:"free_service";N;}', '2016-02-22 05:01:07', '2016-02-26 08:07:42', '', '', '', ''),
(70, 20, 'My third Service', NULL, NULL, NULL, 'Cinema-Entertainment.jpg', NULL, NULL, NULL, NULL, 'My third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third ServiceMy third Service My third Service', NULL, 44, '10T6C', '99aaf936b56d82f1c1be21dd94fdb58e', 'Ucg3xwO1', 'my-third-service', NULL, 0, '', '1', 'a:8:{s:17:"service_available";N;s:13:"delivery_days";s:2:"10";s:14:"delivery_place";s:6:"online";s:16:"office_available";N;s:12:"office_range";N;s:18:"discount_available";N;s:14:"discount_price";s:0:"";s:12:"free_service";s:1:"1";}', '2016-02-22 06:10:59', '2016-03-19 04:39:30', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ds_store_office`
--

CREATE TABLE IF NOT EXISTS `ds_store_office` (
  `id` int(20) NOT NULL,
  `store_id` int(20) DEFAULT NULL,
  `office_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=471 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_store_office`
--

INSERT INTO `ds_store_office` (`id`, `store_id`, `office_id`, `created_at`, `updated_at`) VALUES
(254, 42, 30, '2015-06-19 18:21:54', '2015-06-19 18:21:54'),
(255, 42, 32, '2015-06-19 18:21:54', '2015-06-19 18:21:54'),
(256, 43, 30, '2015-06-19 18:22:01', '2015-06-19 18:22:01'),
(257, 43, 31, '2015-06-19 18:22:01', '2015-06-19 18:22:01'),
(260, 30, 9, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(261, 30, 10, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(262, 40, 9, '2015-06-19 18:23:08', '2015-06-19 18:23:08'),
(263, 40, 11, '2015-06-19 18:23:08', '2015-06-19 18:23:08'),
(264, 41, 10, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(265, 41, 11, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(266, 41, 12, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(267, 47, 10, '2015-06-19 18:23:20', '2015-06-19 18:23:20'),
(268, 47, 11, '2015-06-19 18:23:20', '2015-06-19 18:23:20'),
(271, 51, 9, '2015-06-19 18:23:34', '2015-06-19 18:23:34'),
(272, 51, 11, '2015-06-19 18:23:34', '2015-06-19 18:23:34'),
(273, 52, 10, '2015-06-19 18:23:40', '2015-06-19 18:23:40'),
(274, 52, 11, '2015-06-19 18:23:40', '2015-06-19 18:23:40'),
(275, 53, 11, '2015-06-19 18:23:46', '2015-06-19 18:23:46'),
(276, 53, 36, '2015-06-19 18:23:46', '2015-06-19 18:23:46'),
(277, 44, 33, '2015-06-19 18:26:03', '2015-06-19 18:26:03'),
(278, 44, 34, '2015-06-19 18:26:03', '2015-06-19 18:26:03'),
(279, 45, 33, '2015-06-19 18:26:12', '2015-06-19 18:26:12'),
(280, 45, 34, '2015-06-19 18:26:12', '2015-06-19 18:26:12'),
(296, 26, 18, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(297, 26, 20, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(298, 26, 22, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(332, 27, 23, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(333, 27, 25, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(336, 29, 23, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(337, 29, 25, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(338, 29, 26, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(351, 54, 28, '2015-06-24 09:30:02', '2015-06-24 09:30:02'),
(352, 54, 29, '2015-06-24 09:30:02', '2015-06-24 09:30:02'),
(377, 55, 38, '2015-06-25 23:41:55', '2015-06-25 23:41:55'),
(378, 55, 39, '2015-06-25 23:41:55', '2015-06-25 23:41:55'),
(387, 46, 35, '2015-06-26 21:17:57', '2015-06-26 21:17:57'),
(388, 46, 39, '2015-06-26 21:17:57', '2015-06-26 21:17:57'),
(402, 56, 28, '2015-07-02 13:00:14', '2015-07-02 13:00:14'),
(403, 56, 40, '2015-07-02 13:00:14', '2015-07-02 13:00:14'),
(424, 6, 13, '2015-09-17 03:44:39', '2015-09-17 03:44:39'),
(425, 6, 14, '2015-09-17 03:44:39', '2015-09-17 03:44:39'),
(426, 6, 15, '2015-09-17 03:44:39', '2015-09-17 03:44:39'),
(427, 7, 14, '2015-09-17 03:45:05', '2015-09-17 03:45:05'),
(428, 7, 15, '2015-09-17 03:45:05', '2015-09-17 03:45:05'),
(429, 7, 16, '2015-09-17 03:45:05', '2015-09-17 03:45:05'),
(433, 10, 14, '2015-09-17 03:45:44', '2015-09-17 03:45:44'),
(434, 10, 16, '2015-09-17 03:45:44', '2015-09-17 03:45:44'),
(435, 10, 17, '2015-09-17 03:45:44', '2015-09-17 03:45:44'),
(445, 19, 20, '2015-09-17 03:47:20', '2015-09-17 03:47:20'),
(446, 19, 21, '2015-09-17 03:47:20', '2015-09-17 03:47:20'),
(447, 19, 22, '2015-09-17 03:47:20', '2015-09-17 03:47:20'),
(448, 20, 10, '2015-09-17 03:47:44', '2015-09-17 03:47:44'),
(449, 20, 11, '2015-09-17 03:47:44', '2015-09-17 03:47:44'),
(450, 21, 28, '2015-09-17 03:48:44', '2015-09-17 03:48:44'),
(451, 21, 29, '2015-09-17 03:48:44', '2015-09-17 03:48:44'),
(462, 18, 18, '2015-09-17 03:55:20', '2015-09-17 03:55:20'),
(463, 18, 20, '2015-09-17 03:55:20', '2015-09-17 03:55:20'),
(464, 18, 21, '2015-09-17 03:55:20', '2015-09-17 03:55:20'),
(469, 68, 45, '2016-02-26 07:17:51', '2016-02-26 07:17:51'),
(470, 68, 46, '2016-02-26 07:17:51', '2016-02-26 07:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `ds_store_sub_category`
--

CREATE TABLE IF NOT EXISTS `ds_store_sub_category` (
  `id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `sub_category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=1199 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_store_sub_category`
--

INSERT INTO `ds_store_sub_category` (`id`, `store_id`, `category_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(809, 30, 1, 1, '2015-06-19 18:22:59', '2015-06-19 18:22:59'),
(810, 30, 1, 2, '2015-06-19 18:22:59', '2015-06-19 18:22:59'),
(811, 30, 1, 3, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(812, 30, 3, 9, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(813, 30, 3, 10, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(814, 30, 3, 11, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(815, 30, 3, 12, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(816, 30, 6, 23, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(817, 30, 6, 24, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(818, 30, 6, 25, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(819, 30, 6, 26, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(820, 30, 6, 27, '2015-06-19 18:23:00', '2015-06-19 18:23:00'),
(821, 40, 3, 9, '2015-06-19 18:23:08', '2015-06-19 18:23:08'),
(822, 40, 3, 10, '2015-06-19 18:23:08', '2015-06-19 18:23:08'),
(823, 40, 3, 11, '2015-06-19 18:23:08', '2015-06-19 18:23:08'),
(824, 40, 3, 12, '2015-06-19 18:23:08', '2015-06-19 18:23:08'),
(825, 41, 1, 1, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(826, 41, 1, 2, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(827, 41, 1, 3, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(828, 41, 6, 23, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(829, 41, 6, 24, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(830, 41, 6, 25, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(831, 41, 6, 26, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(832, 41, 6, 27, '2015-06-19 18:23:14', '2015-06-19 18:23:14'),
(833, 47, 4, 14, '2015-06-19 18:23:20', '2015-06-19 18:23:20'),
(834, 52, 6, 24, '2015-06-19 18:23:40', '2015-06-19 18:23:40'),
(835, 53, 4, 14, '2015-06-19 18:23:46', '2015-06-19 18:23:46'),
(836, 44, 3, 11, '2015-06-19 18:26:03', '2015-06-19 18:26:03'),
(837, 45, 6, 25, '2015-06-19 18:26:12', '2015-06-19 18:26:12'),
(878, 26, 5, 17, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(879, 26, 5, 18, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(880, 26, 5, 19, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(881, 26, 5, 20, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(882, 26, 5, 21, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(883, 26, 5, 22, '2015-06-19 18:29:49', '2015-06-19 18:29:49'),
(936, 27, 1, 1, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(937, 27, 1, 2, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(938, 27, 1, 3, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(939, 27, 4, 15, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(940, 27, 4, 16, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(941, 27, 6, 23, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(942, 27, 6, 24, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(943, 27, 6, 25, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(944, 27, 6, 26, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(945, 27, 6, 27, '2015-06-19 18:33:48', '2015-06-19 18:33:48'),
(954, 29, 1, 1, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(955, 29, 1, 2, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(956, 29, 1, 3, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(957, 29, 3, 9, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(958, 29, 3, 10, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(959, 29, 3, 11, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(960, 29, 3, 12, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(961, 29, 6, 23, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(962, 29, 6, 24, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(963, 29, 6, 25, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(964, 29, 6, 26, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(965, 29, 6, 27, '2015-06-19 18:34:02', '2015-06-19 18:34:02'),
(990, 54, 6, 23, '2015-06-24 09:30:02', '2015-06-24 09:30:02'),
(1105, 55, 6, 25, '2015-06-25 23:41:55', '2015-06-25 23:41:55'),
(1136, 46, 4, 13, '2015-06-26 21:17:57', '2015-06-26 21:17:57'),
(1137, 46, 4, 14, '2015-06-26 21:17:57', '2015-06-26 21:17:57'),
(1138, 46, 4, 15, '2015-06-26 21:17:57', '2015-06-26 21:17:57'),
(1139, 46, 4, 16, '2015-06-26 21:17:57', '2015-06-26 21:17:57'),
(1147, 56, 2, 5, '2015-07-02 13:00:14', '2015-07-02 13:00:14'),
(1168, 6, 2, 4, '2015-09-17 03:44:39', '2015-09-17 03:44:39'),
(1169, 7, 6, 24, '2015-09-17 03:45:05', '2015-09-17 03:45:05'),
(1172, 10, 4, 14, '2015-09-17 03:45:44', '2015-09-17 03:45:44'),
(1176, 19, 4, 14, '2015-09-17 03:47:20', '2015-09-17 03:47:20'),
(1177, 20, 5, 18, '2015-09-17 03:47:44', '2015-09-17 03:47:44'),
(1178, 21, 5, 21, '2015-09-17 03:48:44', '2015-09-17 03:48:44'),
(1181, 24, 3, 11, '2015-09-17 03:50:37', '2015-09-17 03:50:37'),
(1182, 25, 3, 12, '2015-09-17 03:52:08', '2015-09-17 03:52:08'),
(1183, 18, 5, 22, '2015-09-17 03:55:20', '2015-09-17 03:55:20'),
(1186, 58, 1, 1, '2015-09-17 08:39:08', '2015-09-17 08:39:08'),
(1189, 57, 2, 8, '2015-09-17 08:41:42', '2015-09-17 08:41:42'),
(1193, 66, 2, 91, '2016-01-28 04:46:20', '2016-01-28 04:46:20'),
(1196, 70, 3, 100, '2016-02-22 06:10:59', '2016-02-22 06:10:59'),
(1198, 68, 2, 94, '2016-02-26 07:17:51', '2016-02-26 07:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `ds_subscribe`
--

CREATE TABLE IF NOT EXISTS `ds_subscribe` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `plan_id` int(10) unsigned NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `customer_code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sub_category`
--

CREATE TABLE IF NOT EXISTS `ds_sub_category` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `icon` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptiones` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_sub_category`
--

INSERT INTO `ds_sub_category` (`id`, `name`, `category_id`, `icon`, `description`, `slug`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(1, 'Football', 1, 'fa fa-plane', 'This is a subcategory for sports', 'beautysalon', '2015-03-13 05:04:03', '2015-08-06 22:31:17', 'Football', 'Football', 'This is a subcategory for sports', 'This is a subcategory for sports'),
(2, 'Nails', 1, 'fa fa-star', 'Nails', 'nails', '2015-03-13 05:04:13', '2015-03-13 05:04:13', 'Nails', 'Nails', 'Nails', 'Nails'),
(3, 'Hairdresser', 1, 'fa fa-star', 'Hairdresser', 'hairdresser', '2015-03-13 05:04:25', '2015-03-13 05:04:25', 'Hairdresser', 'Hairdresser', 'Hairdresser', 'Hairdresser'),
(4, 'Fine Dining', 2, 'fa fa-star', 'Fine Dining', 'fine-dining', '2015-03-13 05:04:44', '2015-03-13 05:04:44', 'Fine Dining', 'Fine Dining', 'Fine Dining', 'Fine Dining'),
(5, 'Sushi', 2, 'fa fa-star', 'Sushi', 'sushi', '2015-03-13 05:04:56', '2015-03-13 05:04:56', 'Sushi', 'Sushi', 'Sushi', 'Sushi'),
(6, 'Chinese', 2, 'fa fa-star', 'Chinese', 'chinese', '2015-03-13 05:05:13', '2015-03-13 05:05:13', 'Chinese', 'Chinese', 'Chinese', 'Chinese'),
(7, 'Italian', 2, 'fa fa-star', 'Italian', 'italian', '2015-03-13 05:05:27', '2015-03-13 05:05:27', 'Italian', 'Italian', 'Italian', 'Italian'),
(8, 'Traditional', 2, 'fa fa-star', 'Traditional', 'traditional', '2015-03-13 05:05:40', '2015-03-13 05:05:40', 'Traditional', 'Traditional', 'Traditional', 'Traditional'),
(9, 'Car Service', 3, 'fa fa-star', 'Car Service', 'car-service', '2015-03-13 05:06:15', '2015-03-13 05:06:15', 'Car Service', 'Car Service', 'Car Service', 'Car Service'),
(10, 'Car Wash', 3, 'fa fa-star', 'Car Wash', 'car-wash', '2015-03-13 05:06:25', '2015-03-13 05:06:25', 'Car Wash', 'Car Wash', 'Car Wash', 'Car Wash'),
(11, 'Bike Service', 3, 'fa fa-star', 'Bike Service', 'bike-service', '2015-03-13 05:06:34', '2015-03-13 05:06:34', 'Bike Service', 'Bike Service', 'Bike Service', 'Bike Service'),
(12, 'Motor Service', 3, 'fa fa-star', 'Motor Service', 'motor-service', '2015-03-13 05:06:47', '2015-03-13 05:06:47', 'Motor Service', 'Motor Service', 'Motor Service', 'Motor Service'),
(13, 'Physical Theraphy', 4, 'fa fa-star', 'Physical Theraphy', 'physical-theraphy', '2015-03-13 05:07:15', '2015-03-13 05:07:15', 'Physical Theraphy', 'Physical Theraphy', 'Physical Theraphy', 'Physical Theraphy'),
(14, 'Massage', 4, 'fa fa-star', 'Massage', 'massage', '2015-03-13 05:07:25', '2015-03-13 05:07:25', 'Massage', 'Massage', 'Massage', 'Massage'),
(15, 'Dentist', 4, 'fa fa-star', 'Dentist', 'dentist', '2015-03-13 05:07:36', '2015-03-13 05:07:36', 'Dentist', 'Dentist', 'Dentist', 'Dentist'),
(16, 'Teeth Whitening', 4, 'fa fa-star', 'Teeth Whitening', 'teeth-whitening', '2015-03-13 05:07:50', '2015-03-13 05:07:50', 'Teeth Whitening', 'Teeth Whitening', 'Teeth Whitening', 'Teeth Whitening'),
(17, 'Bowling', 5, 'fa fa-star', '', 'bowling', '2015-03-13 05:08:13', '2015-03-13 05:08:13', 'Bowling', 'Bowling', '', ''),
(18, 'Karting', 5, 'fa fa-star', '', 'karting', '2015-03-13 05:08:23', '2015-03-13 05:08:23', 'Karting', 'Karting', '', ''),
(19, 'Gym', 5, 'fa fa-star', '', 'gym', '2015-03-13 05:08:32', '2015-03-13 05:08:32', 'Gym', 'Gym', '', ''),
(20, 'Dance', 5, 'fa fa-star', '', 'dance', '2015-03-13 05:08:40', '2015-03-13 05:08:40', 'Dance', 'Dance', '', ''),
(21, 'Football', 5, 'fa fa-star', '', 'football', '2015-03-13 05:08:49', '2015-03-13 05:08:49', 'Football', 'Football', '', ''),
(22, 'Yoga', 5, 'fa fa-star', 'Yoga', 'yoga', '2015-03-13 05:08:59', '2015-03-13 05:08:59', 'Yoga', 'Yoga', 'Yoga', 'Yoga'),
(23, 'House Cleaning', 6, 'fa fa-star', '', 'house-cleaning', '2015-03-13 05:09:26', '2015-12-08 01:07:01', 'Pulizie Casa', 'Limpieza en Casa', '', ''),
(24, 'Handy Man', 6, 'fa fa-star', '', 'handy-man', '2015-03-13 05:09:35', '2015-03-13 05:09:35', 'Handy Man', 'Handy Man', '', ''),
(25, 'Photography', 6, 'fa fa-star', '', 'photography', '2015-03-13 05:09:45', '2015-03-13 05:09:45', 'Photography', 'Photography', '', ''),
(26, 'Baby Sitting', 6, 'fa fa-star', '', 'baby-sitting', '2015-03-13 05:09:55', '2015-03-13 05:09:55', 'Baby Sitting', 'Baby Sitting', '', ''),
(27, 'Snow Removal', 6, 'fa fa-star', '', 'snow-removal', '2015-03-13 05:10:04', '2015-03-13 05:10:04', 'Snow Removal', 'Snow Removal', '', ''),
(28, 'Mechanics & Repairs 1', 14, 'fa fa-star', '', 'mechanics-repairs-1', '2015-09-29 12:49:40', '2015-09-29 12:49:40', 'Mechanics & Repairs 1', 'Mechanics & Repairs 1', '', ''),
(29, 'Mechanics & Repairs 2', 14, 'fa fa-star', '', 'mechanics-repairs-2', '2015-09-29 12:49:48', '2015-09-29 12:49:48', 'Mechanics & Repairs 2', 'Mechanics & Repairs 2', '', ''),
(30, 'Mechanics & Repairs 3', 14, 'fa fa-star', '', 'mechanics-repairs-3', '2015-09-29 12:49:57', '2015-09-29 12:49:57', 'Mechanics & Repairs 3', 'Mechanics & Repairs 3', '', ''),
(31, 'Mechanics & Repairs 4', 14, 'fa fa-star', '', 'mechanics-repairs-4', '2015-09-29 12:50:12', '2015-09-29 12:50:12', 'Mechanics & Repairs 4', 'Mechanics & Repairs 4', '', ''),
(32, 'Medical Equipment Repairer', 14, 'fa fa-star', '', 'medical-equipment-repairer', '2015-09-30 14:21:22', '2015-09-30 14:21:22', 'Medical Equipment Repairer', 'Medical Equipment Repairer', '', ''),
(33, 'Repair electric motors and electronic', 14, 'fa fa-star', '', 'repair-electric-motors-and-electronic', '2015-09-30 14:21:35', '2015-09-30 14:21:35', 'Repair electric motors and electronic', 'Repair electric motors and electronic', '', ''),
(34, 'Mechanic heavy machinery', 14, 'fa fa-star', '', 'mechanic-heavy-machinery', '2015-09-30 14:21:49', '2015-09-30 14:21:49', 'Mechanic heavy machinery', 'Mechanic heavy machinery', '', ''),
(35, 'Electrical Repairer', 14, 'fa fa-star', '', 'electrical-repairer', '2015-09-30 14:22:04', '2015-09-30 14:22:04', 'Electrical Repairer', 'Electrical Repairer', '', ''),
(36, 'Repairman installer telephone lines', 14, 'fa fa-star', '', 'repairman-installer-telephone-lines', '2015-09-30 14:22:15', '2015-09-30 14:22:15', 'Repairman installer telephone lines', 'Repairman installer telephone lines', '', ''),
(37, 'Recruitment and redundancies', 10, 'fa fa-star', '', 'recruitment-and-redundancies', '2015-10-17 07:12:04', '2015-10-17 07:12:04', 'Recruitment and redundancies', 'Recruitment and redundancies', '', ''),
(38, 'Collective actions for compensation for damages', 10, 'fa fa-star', '', 'collective-actions-for-compensation-for-damages', '2015-10-17 07:12:36', '2015-11-19 02:49:14', 'Azioni collettive per risarcimento danno', 'Collective actions for compensation for damages', '', ''),
(39, 'Legal advice', 10, 'fa fa-star', '', 'legal-advice', '2015-10-17 07:13:01', '2015-10-17 07:13:01', 'Legal advice', 'Legal advice', '', ''),
(40, 'Contentious civil and ordinary', 10, 'fa fa-star', '', 'contentious-civil-and-ordinary', '2015-10-17 07:15:10', '2015-10-17 07:15:10', 'Contentious civil and ordinary', 'Contentious civil and ordinary', '', ''),
(41, 'Contracts', 10, 'fa fa-star', '', 'contracts', '2015-10-17 07:15:26', '2015-10-17 07:15:26', 'Contracts', 'Contracts', '', ''),
(42, 'Labor disputes', 10, 'fa fa-star', '', 'labor-disputes', '2015-10-17 07:15:51', '2015-10-17 07:15:51', 'Labor disputes', 'Labor disputes', '', ''),
(43, 'General Civil Law', 10, 'fa fa-star', '', 'general-civil-law', '2015-10-17 07:16:15', '2015-10-17 07:16:15', 'General Civil Law', 'General Civil Law', '', ''),
(44, 'Labor law and social security', 10, 'fa fa-star', '', 'labor-law-and-social-security', '2015-10-17 07:16:32', '2015-10-17 07:16:32', 'Labor law and social security', 'Labor law and social security', '', ''),
(45, 'IT Law', 10, 'fa fa-star', '', 'it-law', '2015-10-17 07:16:46', '2015-10-17 07:16:46', 'IT Law', 'IT Law', '', ''),
(46, 'Family law and separations between spouses', 10, 'fa fa-star', '', 'family-law-and-separations-between-spouses', '2015-10-17 07:17:06', '2015-10-17 07:17:06', 'Family law and separations between spouses', 'Family law and separations between spouses', '', ''),
(47, 'Family law, separations, divorces', 10, 'fa fa-star', '', 'family-law-separations-divorces', '2015-10-17 07:17:26', '2015-10-17 07:17:26', 'Family law, separations, divorces', 'Family law, separations, divorces', '', ''),
(48, 'Criminal Law and crimes', 10, 'fa fa-star', '', 'criminal-law-and-crimes', '2015-10-17 07:18:06', '2015-10-17 07:18:06', 'Criminal Law and crimes', 'Criminal Law and crimes', '', ''),
(49, 'Company law', 10, 'fa fa-star', '', 'company-law', '2015-10-17 07:18:24', '2015-11-19 03:01:32', 'Diritto societario', 'Derecho de sociedades', '', ''),
(50, 'Domiciles and replacements trial', 10, 'fa fa-star', '', 'domiciles-and-replacements-trial', '2015-10-17 07:19:49', '2015-10-17 07:19:49', 'Domiciles and replacements trial', 'Domiciles and replacements trial', '', ''),
(51, 'Appeals of the dismissals', 10, 'fa fa-star', '', 'appeals-of-the-dismissals', '2015-10-17 07:20:14', '2015-11-19 02:54:51', 'Impugnative dei licenziamenti', 'Apelaciones de los despidos', '', ''),
(52, 'Defensive investigations preventive', 10, 'fa fa-star', '', 'defensive-investigations-preventive', '2015-10-17 07:20:40', '2015-10-17 07:20:40', 'Defensive investigations preventive', 'Defensive investigations preventive', '', ''),
(53, 'Road accidents and compensation', 10, 'fa fa-star', '', 'road-accidents-and-compensation', '2015-10-17 07:21:07', '2015-10-17 07:21:07', 'Road accidents and compensation', 'Road accidents and compensation', '', ''),
(54, 'Leases and property sales', 10, 'fa fa-star', '', 'leases-and-property-sales', '2015-10-17 07:21:33', '2015-10-17 07:21:33', 'Leases and property sales', 'Leases and property sales', '', ''),
(55, 'Harassment and demotion', 10, 'fa fa-star', '', 'harassment-and-demotion', '2015-10-17 07:21:47', '2015-10-17 07:21:47', 'Harassment and demotion', 'Harassment and demotion', '', ''),
(56, 'Opposition to the decrees of criminal conviction', 10, 'fa fa-star', '', 'opposition-to-the-decrees-of-criminal-conviction', '2015-10-17 07:22:11', '2015-10-17 07:22:11', 'Opposition to the decrees of criminal conviction', 'Opposition to the decrees of criminal conviction', '', ''),
(57, 'Opposition to administrative sanctions', 10, 'fa fa-star', '', 'opposition-to-administrative-sanctions', '2015-10-17 07:22:29', '2015-10-17 07:22:29', 'Opposition to administrative sanctions', 'Opposition to administrative sanctions', '', ''),
(58, 'Practices for foreign citizens and immigrants', 10, 'fa fa-star', '', 'practices-for-foreign-citizens-and-immigrants', '2015-10-17 07:22:47', '2015-10-17 07:22:47', 'Practices for foreign citizens and immigrants', 'Practices for foreign citizens and immigrants', '', ''),
(59, 'First advice', 10, 'fa fa-star', '', 'first-advice', '2015-10-17 07:24:35', '2015-10-17 07:24:35', 'First advice', 'First advice', '', ''),
(60, 'Privacy and the right to privacy', 10, 'fa fa-star', '', 'privacy-and-the-right-to-privacy', '2015-10-17 07:24:50', '2015-10-17 07:24:50', 'Privacy and the right to privacy', 'Privacy and the right to privacy', '', ''),
(61, 'Chamber proceedings and summaries', 10, 'fa fa-star', '', 'chamber-proceedings-and-summaries', '2015-10-17 07:25:06', '2015-11-19 02:58:33', 'Procedimenti camerali e sommari', 'Procedimientos de la Cámara y resúmenes', '', ''),
(62, 'Corporate crime and environmental', 10, 'fa fa-star', '', 'corporate-crime-and-environmental', '2015-10-17 07:25:22', '2015-10-17 07:25:22', 'Corporate crime and environmental', 'Corporate crime and environmental', '', ''),
(63, 'Debt collection', 10, 'fa fa-star', '', 'debt-collection', '2015-10-17 07:25:37', '2015-10-17 07:25:37', 'Debt collection', 'Debt collection', '', ''),
(64, 'Debt collection company', 10, 'fa fa-star', '', 'debt-collection-company', '2015-10-17 07:25:52', '2015-10-17 07:25:52', 'Debt collection company', 'Debt collection company', '', ''),
(65, 'Preparation of typical and atypical contracts', 10, 'fa fa-star', '', 'preparation-of-typical-and-atypical-contracts', '2015-10-17 07:26:22', '2015-10-17 07:26:22', 'Preparation of typical and atypical contracts', 'Preparation of typical and atypical contracts', '', ''),
(66, 'Civil and criminal liability', 10, 'fa fa-star', '', 'civil-and-criminal-liability', '2015-10-17 07:26:37', '2015-11-19 03:00:01', 'Responsabilità civile e penale', 'Responsabilidad civil y penal', '', ''),
(67, 'Medical liability', 10, 'fa fa-star', '', 'medical-liability', '2015-10-17 07:26:49', '2015-10-17 07:26:49', 'Medical liability', 'Medical liability', '', ''),
(68, 'Damages in general and from road accidents', 10, 'fa fa-star', '', 'damages-in-general-and-from-road-accidents', '2015-10-17 07:27:03', '2015-10-17 07:27:03', 'Damages in general and from road accidents', 'Damages in general and from road accidents', '', ''),
(69, 'Seizures preventive and protective measures', 10, 'fa fa-star', '', 'seizures-preventive-and-protective-measures', '2015-10-17 07:27:19', '2015-10-17 07:27:19', 'Seizures preventive and protective measures', 'Seizures preventive and protective measures', '', ''),
(70, 'Stalking and abuse in the family', 10, 'fa fa-star', '', 'stalking-and-abuse-in-the-family', '2015-10-17 07:27:38', '2015-10-17 07:27:38', 'Stalking and abuse in the family', 'Stalking and abuse in the family', '', ''),
(71, 'Transactions and settlements out of court', 10, 'fa fa-star', '', 'transactions-and-settlements-out-of-court', '2015-10-17 07:27:53', '2015-10-17 07:27:53', 'Transactions and settlements out of court', 'Transactions and settlements out of court', '', ''),
(72, 'Financial advice', 7, 'fa fa-star', '', 'financial-advice', '2015-10-17 07:33:08', '2015-10-17 07:37:23', 'Financial advice', 'Financial advice', '', ''),
(73, 'Insurance advice', 7, 'fa fa-star', '', 'insurance-advice', '2015-10-17 07:33:23', '2015-10-17 07:37:31', 'Insurance advice', 'Insurance advice', '', ''),
(74, 'Business consultant', 7, 'fa fa-star', '', 'business-consultant', '2015-10-17 07:33:40', '2015-10-17 07:33:40', 'Business consultant', 'Business consultant', '', ''),
(75, 'Financial analisis', 7, 'fa fa-star', '', 'financial-analisis', '2015-10-17 07:33:53', '2015-10-17 07:37:40', 'Financial analisis', 'Financial analisis', '', ''),
(76, 'Economist advice', 7, 'fa fa-star', '', 'economist-advice', '2015-10-17 07:34:29', '2015-10-17 07:37:49', 'Economist advice', 'Economist advice', '', ''),
(77, 'Credit advice', 7, 'fa fa-star', '', 'credit-advice', '2015-10-17 07:34:52', '2015-10-17 07:37:58', 'Credit advice', 'Credit advice', '', ''),
(78, 'First advice', 7, 'fa fa-star', '', 'first-advice-1', '2015-10-17 07:36:59', '2015-10-17 07:36:59', 'First advice', 'First advice', '', ''),
(79, 'Purchase new insurance policy', 7, 'fa fa-star', '', 'purchase-new-insurance-policy', '2015-10-17 07:38:36', '2015-10-17 07:38:36', 'Purchase new insurance policy', 'Purchase new insurance policy', '', ''),
(80, 'Declarations on taxes', 7, 'fa fa-star', '', 'declarations-on-taxes', '2015-10-17 07:41:09', '2015-10-17 07:41:09', 'Declarations on taxes', 'Declarations on taxes', '', ''),
(81, 'Tax accounting', 7, 'fa fa-star', '', 'tax-accounting', '2015-10-17 07:42:32', '2015-10-17 07:42:32', 'Tax accounting', 'Tax accounting', '', ''),
(82, 'Business Plan', 7, 'fa fa-star', '', 'business-plan', '2015-10-17 07:43:07', '2015-10-17 07:43:07', 'Business Plan', 'Business Plan', '', ''),
(83, 'Appraisals & Consulting 1', 1, 'fa fa-star', '', 'appraisals-consulting-1', '2015-10-17 07:43:57', '2015-10-17 07:43:57', 'Appraisals & Consulting 1', 'Appraisals & Consulting 1', '', ''),
(84, 'Appraisals & Consulting 2', 1, 'fa fa-star', '', 'appraisals-consulting-2', '2015-10-17 07:44:05', '2015-10-17 07:44:05', 'Appraisals & Consulting 2', 'Appraisals & Consulting 2', '', ''),
(85, 'Appraisals & Consulting 3', 1, 'fa fa-star', '', 'appraisals-consulting-3', '2015-10-17 07:45:49', '2015-10-17 07:45:49', 'Appraisals & Consulting 3', 'Appraisals & Consulting 3', '', ''),
(86, 'Appraisals & Consulting 4', 1, 'fa fa-star', '', 'appraisals-consulting-4', '2015-10-17 07:45:58', '2015-10-17 07:45:58', 'Appraisals & Consulting 4', 'Appraisals & Consulting 4', '', ''),
(87, 'Appraisals & Consulting 5', 1, 'fa fa-star', '', 'appraisals-consulting-5', '2015-10-17 07:46:07', '2015-10-17 07:46:07', 'Appraisals & Consulting 5', 'Appraisals & Consulting 5', '', ''),
(88, 'Appraisals & Consulting 6', 1, 'fa fa-star', '', 'appraisals-consulting-6', '2015-10-17 07:46:15', '2015-10-17 07:46:15', 'Appraisals & Consulting 6', 'Appraisals & Consulting 6', '', ''),
(89, 'Appraisals & Consulting 7', 1, 'fa fa-star', '', 'appraisals-consulting-7', '2015-10-17 07:46:23', '2015-10-17 07:46:23', 'Appraisals & Consulting 7', 'Appraisals & Consulting 7', '', ''),
(90, 'Appraisals & Consulting 11', 1, 'fa fa-star', '', 'appraisals-consulting-11', '2015-10-17 07:46:34', '2015-10-17 07:46:34', 'Appraisals & Consulting 11', 'Appraisals & Consulting 11', '', ''),
(91, 'Beauty & Relax 6', 2, 'fa fa-star', '', 'beauty-relax-6', '2015-10-17 07:46:51', '2015-10-17 07:46:51', 'Beauty & Relax 6', 'Beauty & Relax 6', '', ''),
(92, 'Beauty & Relax 7', 2, 'fa fa-star', '', 'beauty-relax-7', '2015-10-17 07:47:00', '2015-10-17 07:47:00', 'Beauty & Relax 7', 'Beauty & Relax 7', '', ''),
(93, 'Appraisals & Consulting 8', 2, 'fa fa-star', '', 'appraisals-consulting-8', '2015-10-17 07:47:08', '2015-10-17 07:47:08', 'Appraisals & Consulting 8', 'Appraisals & Consulting 8', '', ''),
(94, 'Business and Finance 9', 2, 'fa fa-star', '', 'business-and-finance-9', '2015-10-17 07:47:17', '2015-10-17 07:47:17', 'Business and Finance 9', 'Business and Finance 9', '', ''),
(95, 'Appraisals & Consulting 10', 2, 'fa fa-star', '', 'appraisals-consulting-10', '2015-10-17 07:47:26', '2015-10-17 07:47:26', 'Appraisals & Consulting 10', 'Appraisals & Consulting 10', '', ''),
(96, 'Cinematographic and audiovisual sound Engineer 11', 2, 'fa fa-star', '', 'cinematographic-and-audiovisual-sound-engineer-11', '2015-10-17 07:47:38', '2015-10-17 07:47:38', 'Cinematographic and audiovisual sound Engineer 11', 'Cinematographic and audiovisual sound Engineer 11', '', ''),
(97, 'Appraisals & Consulting 5', 3, 'fa fa-star', '', 'appraisals-consulting-5-1', '2015-10-17 07:47:57', '2015-10-17 07:47:57', 'Appraisals & Consulting 5', 'Appraisals & Consulting 5', '', ''),
(98, 'Defensive investigations preventive 6', 3, 'fa fa-star', '', 'defensive-investigations-preventive-6', '2015-10-17 07:48:06', '2015-10-17 07:48:06', 'Defensive investigations preventive 6', 'Defensive investigations preventive 6', '', ''),
(99, 'Appraisals & Consulting 7', 3, 'fa fa-star', '', 'appraisals-consulting-7-1', '2015-10-17 07:48:25', '2015-10-17 07:48:25', 'Appraisals & Consulting 7', 'Appraisals & Consulting 7', '', ''),
(100, 'Family law and separations between spouses 8', 3, 'fa fa-star', '', 'family-law-and-separations-between-spouses-8', '2015-10-17 07:49:02', '2015-10-17 07:49:02', 'Family law and separations between spouses 8', 'Family law and separations between spouses 8', '', ''),
(101, 'Teacher method Feldenkreis 9', 3, 'fa fa-star', '', 'teacher-method-feldenkreis-9', '2015-10-17 07:49:11', '2015-10-17 07:49:11', 'Teacher method Feldenkreis 9', 'Teacher method Feldenkreis 9', '', ''),
(102, 'Family law, separations, divorces9', 3, 'fa fa-star', '', 'family-law-separations-divorces9', '2015-10-17 07:49:23', '2015-10-17 07:49:23', 'Family law, separations, divorces9', 'Family law, separations, divorces9', '', ''),
(103, 'Debt collection company11', 3, 'fa fa-star', '', 'debt-collection-company11', '2015-10-17 07:49:35', '2015-10-17 07:49:35', 'Debt collection company11', 'Debt collection company11', '', ''),
(104, 'Defensive investigations preventive5', 4, 'fa fa-star', '', 'defensive-investigations-preventive5', '2015-10-17 07:49:54', '2015-10-17 07:49:54', 'Defensive investigations preventive5', 'Defensive investigations preventive5', '', ''),
(105, 'Specialized Medicine7', 4, 'fa fa-star', '', 'specialized-medicine7', '2015-10-17 07:50:04', '2015-10-17 07:50:04', 'Specialized Medicine7', 'Specialized Medicine7', '', ''),
(106, 'Writing & Translation8', 4, 'fa fa-star', '', 'writing-translation8', '2015-10-17 07:50:17', '2015-10-17 07:50:17', 'Writing & Translation8', 'Writing & Translation8', '', ''),
(107, 'Appraisals & Consulting8', 4, 'fa fa-star', '', 'appraisals-consulting8', '2015-10-17 07:50:28', '2015-10-17 07:50:28', 'Appraisals & Consulting8', 'Appraisals & Consulting8', '', ''),
(108, 'Business and Finance9', 4, 'fa fa-star', '', 'business-and-finance9', '2015-10-17 07:50:39', '2015-10-17 07:50:39', 'Business and Finance9', 'Business and Finance9', '', ''),
(109, 'Healthcare & Wellness9', 4, 'fa fa-star', '', 'healthcare-wellness9', '2015-10-17 07:50:48', '2015-10-17 07:50:48', 'Healthcare & Wellness9', 'Healthcare & Wellness9', '', ''),
(110, 'Graphics & Photography11', 4, 'fa fa-star', '', 'graphics-photography11', '2015-10-17 07:50:58', '2015-10-17 07:50:58', 'Graphics & Photography11', 'Graphics & Photography11', '', ''),
(111, 'Environmental Engineer7', 5, 'fa fa-star', '', 'environmental-engineer7', '2015-10-17 07:51:15', '2015-10-17 07:51:15', 'Environmental Engineer7', 'Environmental Engineer7', '', ''),
(112, 'Graphics & Photography8', 5, 'fa fa-star', '', 'graphics-photography8', '2015-10-17 07:51:25', '2015-10-17 07:51:25', 'Graphics & Photography8', 'Graphics & Photography8', '', ''),
(113, 'Landscape Architect9', 5, 'fa fa-star', '', 'landscape-architect9', '2015-10-17 07:51:37', '2015-10-17 07:51:37', 'Landscape Architect9', 'Landscape Architect9', '', ''),
(114, 'Specialized Medicine10', 5, 'fa fa-star', '', 'specialized-medicine10', '2015-10-17 07:51:46', '2015-10-17 07:51:46', 'Specialized Medicine10', 'Specialized Medicine10', '', ''),
(115, 'Engineering11', 5, 'fa fa-star', '', 'engineering11', '2015-10-17 07:51:57', '2015-10-17 07:51:57', 'Engineering11', 'Engineering11', '', ''),
(116, 'zander defense', 6, 'fa fa-star', '', 'zander-defense', '2015-10-17 07:52:27', '2015-10-17 07:52:27', 'zander defense', 'zander defense', '', ''),
(117, 'Appraisals & Consulting7', 6, 'fa fa-star', '', 'appraisals-consulting7', '2015-10-17 07:52:40', '2015-10-17 07:52:40', 'Appraisals & Consulting7', 'Appraisals & Consulting7', '', ''),
(118, 'Preparation of typical and atypical contracts8', 6, 'fa fa-star', '', 'preparation-of-typical-and-atypical-contracts8', '2015-10-17 07:52:50', '2015-10-17 07:52:50', 'Preparation of typical and atypical contracts8', 'Preparation of typical and atypical contracts8', '', ''),
(119, 'Graphics & Photography9', 6, 'fa fa-star', '', 'graphics-photography9', '2015-10-17 07:53:01', '2015-10-17 07:53:01', 'Graphics & Photography9', 'Graphics & Photography9', '', ''),
(120, 'Teacher method Feldenkreis10', 6, 'fa fa-star', '', 'teacher-method-feldenkreis10', '2015-10-17 07:53:11', '2015-10-17 07:53:11', 'Teacher method Feldenkreis10', 'Teacher method Feldenkreis10', '', ''),
(121, 'Engineer Economic11', 6, 'fa fa-star', '', 'engineer-economic11', '2015-10-17 07:53:23', '2015-10-17 07:53:23', 'Engineer Economic11', 'Engineer Economic11', '', ''),
(122, 'Architecture & Archaeology1', 8, 'fa fa-star', '', 'architecture-archaeology1', '2015-10-17 07:53:41', '2015-10-17 07:53:41', 'Architecture & Archaeology1', 'Architecture & Archaeology1', '', ''),
(123, 'Zara experts', 8, 'fa fa-star', '', 'zara-experts', '2015-10-17 07:54:02', '2015-10-17 07:54:02', 'Zara experts', 'Zara experts', '', ''),
(124, 'Civil and criminal liability3', 8, 'fa fa-star', '', 'civil-and-criminal-liability3', '2015-10-17 07:54:12', '2015-10-17 07:54:12', 'Civil and criminal liability3', 'Civil and criminal liability3', '', ''),
(125, 'Harassment and demotion4', 8, 'fa fa-star', '', 'harassment-and-demotion4', '2015-10-17 07:54:19', '2015-10-17 07:54:19', 'Harassment and demotion4', 'Harassment and demotion4', '', ''),
(126, 'Hairdressing5', 8, 'fa fa-star', '', 'hairdressing5', '2015-10-17 07:54:29', '2015-10-17 07:54:29', 'Hairdressing5', 'Hairdressing5', '', ''),
(127, 'Industrial Consultant6', 8, 'fa fa-star', '', 'industrial-consultant6', '2015-10-17 07:54:38', '2015-10-17 07:54:38', 'Industrial Consultant6', 'Industrial Consultant6', '', ''),
(128, 'Keywords search', 8, 'fa fa-star', '', 'keywords-search', '2015-10-17 07:54:55', '2015-10-17 07:54:55', 'Keywords search', 'Keywords search', '', ''),
(129, 'Criminal Law and crimes 8', 8, 'fa fa-star', '', 'criminal-law-and-crimes-8', '2015-10-17 07:55:04', '2015-10-17 07:55:04', 'Criminal Law and crimes 8', 'Criminal Law and crimes 8', '', ''),
(130, 'First advice', 8, 'fa fa-star', '', 'first-advice-2', '2015-10-17 07:55:13', '2015-10-17 07:55:13', 'First advice', 'First advice', '', ''),
(131, 'Sales Agent 9', 8, 'fa fa-star', '', 'sales-agent-9', '2015-10-17 07:55:30', '2015-10-17 07:55:30', 'Sales Agent 9', 'Sales Agent 9', '', ''),
(132, 'Defensive investigations preventive 11', 8, 'fa fa-star', '', 'defensive-investigations-preventive-11', '2015-10-17 07:55:42', '2015-10-17 07:55:42', 'Defensive investigations preventive 11', 'Defensive investigations preventive 11', '', ''),
(133, 'Nails service', 9, 'fa fa-star', '', 'nails-service', '2015-10-17 07:56:31', '2015-10-17 07:56:31', 'Nails service', 'Nails service', '', ''),
(134, 'Professional hairdresser', 9, 'fa fa-star', '', 'professional-hairdresser', '2015-10-17 07:56:51', '2015-10-17 07:56:51', 'Professional hairdresser', 'Professional hairdresser', '', ''),
(135, 'Beautician', 9, 'fa fa-star', '', 'beautician', '2015-10-17 07:57:08', '2015-10-17 07:57:08', 'Beautician', 'Beautician', '', ''),
(136, 'Debt collection company', 9, 'fa fa-star', '', 'debt-collection-company-2', '2015-10-17 07:57:18', '2015-10-17 07:57:18', 'Debt collection company', 'Debt collection company', '', ''),
(137, 'Zara experts', 9, 'fa fa-star', '', 'zara-experts-1', '2015-10-17 07:57:26', '2015-10-17 07:57:26', 'Zara experts', 'Zara experts', '', ''),
(138, 'First advice', 9, 'fa fa-star', '', 'first-advice-3', '2015-10-17 07:57:35', '2015-10-17 07:57:35', 'First advice', 'First advice', '', ''),
(139, 'Graphics & Photography 6', 9, 'fa fa-star', '', 'graphics-photography-6', '2015-10-17 07:57:48', '2015-10-17 07:57:48', 'Graphics & Photography 6', 'Graphics & Photography 6', '', ''),
(140, 'Hairdressing', 9, 'fa fa-star', '', 'hairdressing', '2015-10-17 07:58:00', '2015-10-17 07:58:00', 'Hairdressing', 'Hairdressing', '', ''),
(141, 'Management', 9, 'fa fa-star', '', 'management', '2015-10-17 07:58:11', '2015-10-17 07:58:11', 'Management', 'Management', '', ''),
(142, 'Novelist Writer 10', 9, 'fa fa-star', '', 'novelist-writer-10', '2015-10-17 07:58:33', '2015-10-17 07:58:33', 'Novelist Writer 10', 'Novelist Writer 10', '', ''),
(143, 'Laws & Rights 11', 9, 'fa fa-star', '', 'laws-rights-11', '2015-10-17 07:58:45', '2015-10-17 07:58:45', 'Laws & Rights 11', 'Laws & Rights 11', '', ''),
(144, 'Nutritional Consultant', 11, 'fa fa-star', '', 'nutritional-consultant', '2015-10-17 08:00:27', '2015-10-17 08:00:27', 'Nutritional Consultant', 'Nutritional Consultant', '', ''),
(145, 'Chef advices', 11, 'fa fa-star', '', 'chef-advices', '2015-10-17 08:01:15', '2015-10-17 08:01:15', 'Chef advices', 'Chef advices', '', ''),
(146, 'Cooking classes', 11, 'fa fa-star', '', 'cooking-classes', '2015-10-17 08:01:50', '2015-10-17 08:01:50', 'Cooking classes', 'Cooking classes', '', ''),
(147, 'Lifestyle & Taste 4', 11, 'fa fa-star', '', 'lifestyle-taste-4', '2015-10-17 08:02:07', '2015-10-17 08:02:07', 'Lifestyle & Taste 4', 'Lifestyle & Taste 4', '', ''),
(148, 'Motor Boats Repairing 5', 11, 'fa fa-star', '', 'motor-boats-repairing-5', '2015-10-17 08:02:17', '2015-10-17 08:02:17', 'Motor Boats Repairing 5', 'Motor Boats Repairing 5', '', ''),
(149, 'Appraisals & Consulting 6', 11, 'fa fa-star', '', 'appraisals-consulting-6-1', '2015-10-17 08:02:28', '2015-10-17 08:02:28', 'Appraisals & Consulting 6', 'Appraisals & Consulting 6', '', ''),
(150, 'Motor Boats Repairing 7', 11, 'fa fa-star', '', 'motor-boats-repairing-7', '2015-10-17 08:02:42', '2015-10-17 08:02:42', 'Motor Boats Repairing 7', 'Motor Boats Repairing 7', '', ''),
(151, 'Business and Finance8', 11, 'fa fa-star', '', 'business-and-finance8', '2015-10-17 08:02:56', '2015-10-17 08:02:56', 'Business and Finance8', 'Business and Finance8', '', ''),
(152, 'Courses & Trainingm', 11, 'fa fa-star', '', 'courses-trainingm', '2015-10-17 08:03:15', '2015-10-17 08:03:15', 'Courses & Trainingm', 'Courses & Trainingm', '', ''),
(153, 'Debt collection companyc', 11, 'fa fa-star', '', 'debt-collection-companyc', '2015-10-17 08:03:29', '2015-10-17 08:03:29', 'Debt collection companyc', 'Debt collection companyc', '', ''),
(154, 'First advice', 11, 'fa fa-star', '', 'first-advice-4', '2015-10-17 08:03:46', '2015-10-17 08:03:46', 'First advice', 'First advice', '', ''),
(155, 'Condominium Administration', 12, 'fa fa-star', '', 'condominium-administration', '2015-10-17 08:05:01', '2015-10-17 08:05:01', 'Condominium Administration', 'Condominium Administration', '', ''),
(156, 'Auditor', 12, 'fa fa-star', '', 'auditor', '2015-10-17 08:06:12', '2015-10-17 08:06:12', 'Auditor', 'Auditor', '', ''),
(157, 'Social management', 12, 'fa fa-star', '', 'social-management', '2015-10-17 08:06:27', '2015-10-17 08:06:27', 'Social management', 'Social management', '', ''),
(158, 'Temporary Management', 12, 'fa fa-star', '', 'temporary-management', '2015-10-17 08:06:43', '2015-10-17 08:06:43', 'Temporary Management', 'Temporary Management', '', ''),
(159, 'System Management', 12, 'fa fa-star', '', 'system-management', '2015-10-17 08:06:58', '2015-10-17 08:06:58', 'System Management', 'System Management', '', ''),
(160, 'Freenet Director', 12, 'fa fa-star', '', 'freenet-director', '2015-10-17 08:07:20', '2015-10-17 08:07:20', 'Freenet Director', 'Freenet Director', '', ''),
(161, 'Security Management', 12, 'fa fa-star', '', 'security-management', '2015-10-17 08:07:38', '2015-10-17 08:07:38', 'Security Management', 'Security Management', '', ''),
(162, 'Cultural Management', 12, 'fa fa-star', '', 'cultural-management', '2015-10-17 08:08:26', '2015-10-17 08:08:26', 'Cultural Management', 'Cultural Management', '', ''),
(163, 'Responsible environmental safety', 12, 'fa fa-star', '', 'responsible-environmental-safety', '2015-10-17 08:08:40', '2015-10-17 08:08:40', 'Responsible environmental safety', 'Responsible environmental safety', '', ''),
(164, 'Responsabile quality assurance', 12, 'fa fa-star', '', 'responsabile-quality-assurance', '2015-10-17 08:08:52', '2015-10-17 08:08:52', 'Responsabile quality assurance', 'Responsabile quality assurance', '', ''),
(165, 'Project Management', 12, 'fa fa-star', '', 'project-management', '2015-10-17 08:09:12', '2015-10-17 08:09:12', 'Project Management', 'Project Management', '', ''),
(166, 'Web marketing Consultant', 13, 'fa fa-star', '', 'web-marketing-consultant', '2015-10-17 08:11:41', '2015-10-17 08:11:41', 'Web marketing Consultant', 'Web marketing Consultant', '', ''),
(167, 'Professional advertising', 13, 'fa fa-star', '', 'professional-advertising', '2015-10-17 08:11:53', '2015-10-17 08:11:53', 'Professional advertising', 'Professional advertising', '', ''),
(168, 'Market analyst and expert marketing', 13, 'fa fa-star', '', 'market-analyst-and-expert-marketing', '2015-10-17 08:12:33', '2015-10-17 08:12:33', 'Market analyst and expert marketing', 'Market analyst and expert marketing', '', ''),
(169, 'Marketing Director', 13, 'fa fa-star', '', 'marketing-director', '2015-10-17 08:12:46', '2015-10-17 08:12:46', 'Marketing Director', 'Marketing Director', '', ''),
(170, 'Riparazioni', 13, 'fa fa-star', '', 'riparazioni', '2015-10-17 08:13:11', '2015-10-17 08:13:11', 'Riparazioni', 'Riparazioni', '', ''),
(171, 'Consigli pratici', 13, 'fa fa-star', '', 'consigli-pratici', '2015-10-17 08:13:22', '2015-10-17 08:13:22', 'Consigli pratici', 'Consigli pratici', '', ''),
(172, 'Investire facile', 13, 'fa fa-star', '', 'investire-facile', '2015-10-17 08:13:35', '2015-10-17 08:13:35', 'Investire facile', 'Investire facile', '', ''),
(173, 'Prima consulenza', 13, 'fa fa-star', '', 'prima-consulenza', '2015-10-17 08:13:49', '2015-10-17 08:13:49', 'Prima consulenza', 'Prima consulenza', '', ''),
(174, 'Gestione pubblicitaria', 13, 'fa fa-star', '', 'gestione-pubblicitaria', '2015-10-17 08:14:07', '2015-10-17 08:14:07', 'Gestione pubblicitaria', 'Gestione pubblicitaria', '', ''),
(175, 'Campagna AdWords', 13, 'fa fa-star', '', 'campagna-adwords', '2015-10-17 08:14:43', '2015-10-17 08:14:43', 'Campagna AdWords', 'Campagna AdWords', '', ''),
(176, 'Pay per Click', 13, 'fa fa-star', '', 'pay-per-click', '2015-10-17 08:14:56', '2015-10-17 08:14:56', 'Pay per Click', 'Pay per Click', '', ''),
(177, 'Veicoli industriali', 14, 'fa fa-star', '', 'veicoli-industriali', '2015-10-17 08:16:08', '2015-10-17 08:16:08', 'Veicoli industriali', 'Veicoli industriali', '', ''),
(178, 'Autovetture ', 14, 'fa fa-star', '', 'autovetture', '2015-10-17 08:16:21', '2015-10-17 08:16:21', 'Autovetture ', 'Autovetture ', '', ''),
(179, 'Condominiums Mediation', 15, 'fa fa-star', '', 'condominiums-mediation', '2015-10-17 08:17:24', '2015-10-17 08:17:24', 'Condominiums Mediation', 'Condominiums Mediation', '', ''),
(180, 'Civil Mediation', 15, 'fa fa-star', '', 'civil-mediation', '2015-10-17 08:17:43', '2015-10-17 08:17:43', 'Civil Mediation', 'Civil Mediation', '', ''),
(181, 'Insurance contracts bank financial', 15, 'fa fa-star', '', 'insurance-contracts-bank-financial', '2015-10-17 08:18:18', '2015-10-17 08:18:18', 'Insurance contracts bank financial', 'Insurance contracts bank financial', '', ''),
(182, 'Mediation for tenancies of company', 15, 'fa fa-star', '', 'mediation-for-tenancies-of-company', '2015-10-17 08:18:43', '2015-10-17 08:18:43', 'Mediation for tenancies of company', 'Mediation for tenancies of company', '', ''),
(183, 'Real rights', 15, 'fa fa-star', '', 'real-rights', '2015-10-17 08:19:08', '2015-10-17 08:19:08', 'Real rights', 'Real rights', '', ''),
(184, 'Hereditary divisions', 15, 'fa fa-star', '', 'hereditary-divisions', '2015-10-17 08:19:27', '2015-10-17 08:19:27', 'Hereditary divisions', 'Hereditary divisions', '', ''),
(186, 'Donations', 15, 'fa fa-star', '', 'donations', '2015-10-17 08:19:54', '2015-10-17 08:19:54', 'Donations', 'Donations', '', ''),
(187, 'Business and Finance8', 15, 'fa fa-star', '', 'business-and-finance8-1', '2015-10-17 08:21:29', '2015-10-17 08:21:29', 'Business and Finance8', 'Business and Finance8', '', ''),
(188, 'Zara experts 9', 15, 'fa fa-star', '', 'zara-experts-9', '2015-10-17 08:21:38', '2015-10-17 08:21:38', 'Zara experts 9', 'Zara experts 9', '', ''),
(189, 'Prima Istanza', 15, 'fa fa-star', '', 'prima-istanza', '2015-10-17 08:21:53', '2015-10-17 08:21:53', 'Prima Istanza', 'Prima Istanza', '', ''),
(190, 'Istanza a domicilio', 15, 'fa fa-star', '', 'istanza-a-domicilio', '2015-10-17 08:22:09', '2015-10-17 08:22:09', 'Istanza a domicilio', 'Istanza a domicilio', '', ''),
(191, 'Web Programming1', 16, 'fa fa-star', '', 'web-programming1', '2015-10-17 08:22:37', '2015-10-17 08:22:37', 'Web Programming1', 'Web Programming1', '', ''),
(192, 'Laravel', 16, 'fa fa-star', '', 'laravel', '2015-10-17 08:22:46', '2015-10-17 08:22:46', 'Laravel', 'Laravel', '', ''),
(193, 'Joomla', 16, 'fa fa-star', '', 'joomla', '2015-10-17 08:22:57', '2015-10-17 08:22:57', 'Joomla', 'Joomla', '', ''),
(194, 'Worpress', 16, 'fa fa-star', '', 'worpress', '2015-10-17 08:23:05', '2015-10-17 08:23:05', 'Worpress', 'Worpress', '', ''),
(195, 'Magento', 16, 'fa fa-star', '', 'magento', '2015-10-17 08:23:13', '2015-10-17 08:23:13', 'Magento', 'Magento', '', ''),
(196, 'Java', 16, 'fa fa-star', '', 'java', '2015-10-17 08:23:21', '2015-10-17 08:23:21', 'Java', 'Java', '', ''),
(197, 'Cakewalk', 16, 'fa fa-star', '', 'cakewalk', '2015-10-17 08:23:57', '2015-10-17 08:23:57', 'Cakewalk', 'Cakewalk', '', ''),
(198, 'Zend', 16, 'fa fa-star', '', 'zend', '2015-10-17 08:24:46', '2015-10-17 08:24:46', 'Zend', 'Zend', '', ''),
(199, 'Software', 16, 'fa fa-star', '', 'software', '2015-10-17 08:25:02', '2015-10-17 08:25:02', 'Software', 'Software', '', ''),
(200, 'Programmi ', 16, 'fa fa-star', '', 'programmi', '2015-10-17 08:25:12', '2015-10-17 08:25:12', 'Programmi ', 'Programmi ', '', ''),
(201, 'IT management', 16, 'fa fa-star', '', 'it-managenent', '2015-10-17 08:25:29', '2015-10-17 08:25:39', 'IT management', 'IT management', '', ''),
(202, 'Appraisals & Consulting 1', 17, 'fa fa-star', '', 'appraisals-consulting-1-1', '2015-10-17 08:26:02', '2015-10-17 08:26:02', 'Appraisals & Consulting 1', 'Appraisals & Consulting 1', '', ''),
(203, 'Business and Finance 2', 17, 'fa fa-star', '', 'business-and-finance-2', '2015-10-17 08:26:10', '2015-10-17 08:26:10', 'Business and Finance 2', 'Business and Finance 2', '', ''),
(204, 'Cinema & Entertainment 3', 17, 'fa fa-star', '', 'cinema-entertainment-3', '2015-10-17 08:26:18', '2015-10-17 08:26:18', 'Cinema & Entertainment 3', 'Cinema & Entertainment 3', '', ''),
(205, 'Debt collection company 4', 17, 'fa fa-star', '', 'debt-collection-company-4', '2015-10-17 08:26:29', '2015-10-17 08:26:29', 'Debt collection company 4', 'Debt collection company 4', '', ''),
(206, 'Engineering 5', 17, 'fa fa-star', '', 'engineering-5', '2015-10-17 08:26:38', '2015-10-17 08:26:38', 'Engineering 5', 'Engineering 5', '', ''),
(207, 'First advice', 17, 'fa fa-star', '', 'first-advice-5', '2015-10-17 08:26:46', '2015-10-17 08:26:46', 'First advice', 'First advice', '', ''),
(208, 'Graphics & Photography 6', 17, 'fa fa-star', '', 'graphics-photography-6-1', '2015-10-17 08:26:55', '2015-10-17 08:26:55', 'Graphics & Photography 6', 'Graphics & Photography 6', '', ''),
(209, 'Healthcare & Wellness 8', 17, 'fa fa-star', '', 'healthcare-wellness-8', '2015-10-17 08:27:04', '2015-10-17 08:27:04', 'Healthcare & Wellness 8', 'Healthcare & Wellness 8', '', ''),
(210, 'Industrial Consultant 9', 17, 'fa fa-star', '', 'industrial-consultant-9', '2015-10-17 08:27:13', '2015-10-17 08:27:13', 'Industrial Consultant 9', 'Industrial Consultant 9', '', ''),
(211, 'Java 10', 17, 'fa fa-star', '', 'java-10', '2015-10-17 08:27:24', '2015-10-17 08:27:24', 'Java 10', 'Java 10', '', ''),
(212, 'Lifestyle & Taste 11', 17, 'fa fa-star', '', 'lifestyle-taste-11', '2015-10-17 08:27:35', '2015-10-17 08:27:35', 'Lifestyle & Taste 11', 'Lifestyle & Taste 11', '', ''),
(213, 'Business Copywriting', 18, 'fa fa-star', '', 'business-copywriting', '2015-10-17 08:28:18', '2015-10-17 08:31:22', 'Business Copywriting', 'Business Copywriting', '', ''),
(214, 'Creative Writing', 18, 'fa fa-star', '', 'creative-writing', '2015-10-17 08:28:38', '2015-10-17 08:31:49', 'Creative Writing', 'Creative Writing', '', ''),
(215, 'Translations', 18, 'fa fa-star', '', 'translation', '2015-10-17 08:28:56', '2015-10-17 08:29:36', 'Translations', 'Translations', '', ''),
(216, 'Transcriptions', 18, 'fa fa-star', '', 'transcriptions', '2015-10-17 08:29:13', '2015-10-17 08:29:13', 'Transcriptions', 'Transcriptions', '', ''),
(217, 'Articles Writing', 18, 'fa fa-star', '', 'articles', '2015-10-17 08:30:13', '2015-10-17 08:31:32', 'Articles Writing', 'Articles Writing', '', ''),
(218, 'Blog Writing', 18, 'fa fa-star', '', 'blog-writing', '2015-10-17 08:30:24', '2015-10-17 08:30:24', 'Blog Writing', 'Blog Writing', '', ''),
(219, 'Legal Writing', 18, 'fa fa-star', '', 'legal-writing', '2015-10-17 08:30:59', '2015-10-17 08:31:39', 'Legal Writing', 'Legal Writing', '', ''),
(220, 'Mixing', 19, 'fa fa-star', '', 'mixing', '2015-10-17 08:32:52', '2015-10-17 08:32:52', 'Mixing', 'Mixing', '', ''),
(221, 'Mastering', 19, 'fa fa-star', '', 'mastering', '2015-10-17 08:33:01', '2015-10-17 08:33:01', 'Mastering', 'Mastering', '', ''),
(222, 'Sound Effects', 19, 'fa fa-star', '', 'sound-effects', '2015-10-17 08:33:20', '2015-10-17 08:33:20', 'Sound Effects', 'Sound Effects', '', ''),
(223, 'Singers', 19, 'fa fa-star', '', 'singers', '2015-10-17 08:33:41', '2015-10-17 08:33:41', 'Singers', 'Singers', '', ''),
(224, 'Songwriters', 19, 'fa fa-star', '', 'songwriters', '2015-10-17 08:33:58', '2015-10-17 08:33:58', 'Songwriters', 'Songwriters', '', ''),
(225, 'Poesie', 19, 'fa fa-star', '', 'poesie', '2015-10-17 08:34:21', '2015-10-17 08:34:21', 'Poesie', 'Poesie', '', ''),
(226, 'Cortometraggi', 19, 'fa fa-star', '', 'cortometraggi', '2015-10-17 08:34:51', '2015-10-17 08:34:51', 'Cortometraggi', 'Cortometraggi', '', ''),
(227, 'Registrazioni audio', 19, 'fa fa-star', '', 'registrazioni-audio', '2015-10-17 08:35:08', '2015-10-17 08:35:08', 'Registrazioni audio', 'Registrazioni audio', '', ''),
(228, 'Videoregistrazioni', 19, 'fa fa-star', '', 'videoregistrazioni', '2015-10-17 08:35:22', '2015-10-17 08:35:22', 'Videoregistrazioni', 'Videoregistrazioni', '', ''),
(229, 'Video presentazioni', 19, 'fa fa-star', '', 'video-presentazioni', '2015-10-17 08:35:56', '2015-10-17 08:35:56', 'Video presentazioni', 'Video presentazioni', '', ''),
(230, 'Video Pubblicitari', 19, 'fa fa-star', '', 'video-pubblicitari', '2015-10-17 08:36:16', '2015-10-17 08:36:16', 'Video Pubblicitari', 'Video Pubblicitari', '', ''),
(231, 'Quello che manca', 20, 'fa fa-star', '', 'quello-che-manca', '2015-10-17 08:36:39', '2015-10-17 08:36:39', 'Quello che manca', 'Quello che manca', '', ''),
(232, 'Altro che non trovo', 20, 'fa fa-star', '', 'altro-che-non-trovo', '2015-10-17 08:36:56', '2015-10-17 08:36:56', 'Altro che non trovo', 'Altro che non trovo', '', ''),
(233, 'Per strada', 20, 'fa fa-star', '', 'per-strada', '2015-10-17 08:37:06', '2015-10-17 08:37:06', 'Per strada', 'Per strada', '', ''),
(234, 'Nel cammino', 20, 'fa fa-star', '', 'nel-cammino', '2015-10-17 08:37:17', '2015-10-17 08:37:17', 'Nel cammino', 'Nel cammino', '', ''),
(235, 'Forgot', 20, 'fa fa-star', '', 'forgot', '2015-10-17 08:37:28', '2015-10-17 08:37:28', 'Forgot', 'Forgot', '', ''),
(236, 'We can add ', 20, 'fa fa-star', '', 'we-can-add', '2015-10-17 08:37:45', '2015-10-17 08:37:45', 'We can add ', 'We can add ', '', ''),
(237, 'Copywriting added', 20, 'fa fa-star', '', 'copywriting-added', '2015-10-17 08:37:57', '2015-10-17 08:37:57', 'Copywriting added', 'Copywriting added', '', ''),
(238, 'Specialized Medicine 2', 20, 'fa fa-star', '', 'specialized-medicine-2', '2015-10-17 08:38:07', '2015-10-17 08:38:07', 'Specialized Medicine 2', 'Specialized Medicine 2', '', ''),
(239, 'More than', 20, 'fa fa-star', '', 'more-than', '2015-10-17 08:38:23', '2015-10-17 08:38:23', 'More than', 'More than', '', ''),
(240, 'Leases and property sales', 20, 'fa fa-star', '', 'leases-and-property-sales-1', '2015-10-17 08:38:32', '2015-10-17 08:38:32', 'Leases and property sales', 'Leases and property sales', '', ''),
(241, 'Web Design', 20, 'fa fa-star', '', 'web-design', '2015-10-17 08:38:40', '2015-10-17 08:38:40', 'Web Design', 'Web Design', '', ''),
(242, 'Legal Writing 2', 18, 'fa fa-star', '', 'legal-writing-2', '2015-10-17 08:39:07', '2015-10-17 08:39:07', 'Legal Writing 2', 'Legal Writing 2', '', ''),
(243, 'Professional Photographer', 18, 'fa fa-star', '', 'professional-photographer', '2015-10-17 08:39:18', '2015-10-17 08:39:18', 'Professional Photographer', 'Professional Photographer', '', ''),
(244, 'Mechanic heavy machinery', 18, 'fa fa-star', '', 'mechanic-heavy-machinery-1', '2015-10-17 08:39:28', '2015-10-17 08:39:28', 'Mechanic heavy machinery', 'Mechanic heavy machinery', '', ''),
(245, 'Zara experts', 18, 'fa fa-star', '', 'zara-experts-10', '2015-10-17 08:39:38', '2015-10-17 08:39:38', 'Zara experts', 'Zara experts', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ds_sub_class`
--

CREATE TABLE IF NOT EXISTS `ds_sub_class` (
  `id` int(20) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `icon` varchar(64) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `slug` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) NOT NULL,
  `namees` varchar(255) NOT NULL,
  `descriptionit` varchar(255) NOT NULL,
  `descriptiones` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_sub_class`
--

INSERT INTO `ds_sub_class` (`id`, `name`, `class_id`, `icon`, `description`, `slug`, `created_at`, `updated_at`, `nameit`, `namees`, `descriptionit`, `descriptiones`) VALUES
(1, 'Web Designer', 1, 'fa fa-wordpress', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.The core software is built by hundreds of community volunteers, and when you’re ready for more there ar', 'wordpress', '2015-05-30 18:22:26', '2015-11-19 03:03:22', 'Disegnatore Web', 'Diseñador Web', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.The core software is built by hundreds of community volunteers, and when you’re ready for more there a', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.The core software is built by hundreds of community volunteers, and when you’re ready for more there a'),
(2, 'App Builder', 1, 'fa fa-bug', 'Joomla is a free and open-source content management system (CMS) for publishing web content. It is built on a model–view–controller web application framework that can be used independently of the CMS.Joomla is written in PHP, uses object-oriented progr', 'joomla', '2015-05-30 18:24:29', '2015-11-19 03:03:51', 'Sviluppatore App', 'Desarollo App', 'Joomla is a free and open-source content management system (CMS) for publishing web content. It is built on a model–view–controller web application framework that can be used independently of the CMS.Joomla is written in PHP, uses object-oriented prog', 'Joomla is a free and open-source content management system (CMS) for publishing web content. It is built on a model–view–controller web application framework that can be used independently of the CMS.Joomla is written in PHP, uses object-oriented prog'),
(3, 'Magento Builder', 1, 'fa fa-bookmark', 'Magento is an open-source content management system for e-commerce web sites. The software was originally developed by Varien Inc., a US private company headquartered in Culver City, California, with assistance from volunteers.Varien published the firs', 'magento', '2015-05-30 18:25:26', '2015-11-19 03:04:16', 'Programmatore Magento', 'Programador Magento', 'Magento is an open-source content management system for e-commerce web sites. The software was originally developed by Varien Inc., a US private company headquartered in Culver City, California, with assistance from volunteers.Varien published the fir', 'Magento is an open-source content management system for e-commerce web sites. The software was originally developed by Varien Inc., a US private company headquartered in Culver City, California, with assistance from volunteers.Varien published the fir'),
(4, 'Wordpress', 0, 'fa fa-wordpress', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.\r\nThe core software is built by hundreds of community volunteers, and when you’re ready for more there ar', 'wordpress-1', '2015-05-30 18:29:03', '2015-05-30 18:29:03', 'Wordpress', 'Wordpress', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.\r\nThe core software is built by hundreds of community volunteers, and when you’re ready for more there a', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.\r\nThe core software is built by hundreds of community volunteers, and when you’re ready for more there a'),
(5, 'House Cleaner', 2, 'fa fa-cog', 'Responsible for cleaning houses. Vacuums, washes dishes, sweeps floors, launders clothes, cleans and scrubs counters, and dusts surfaces.', 'house-cleaner', '2015-05-30 18:41:11', '2015-11-19 03:04:57', 'Pulizie Casa ', 'Limpieza Casa', 'Responsible for cleaning houses. Vacuums, washes dishes, sweeps floors, launders clothes, cleans and scrubs counters, and dusts surfaces.', 'Responsible for cleaning houses. Vacuums, washes dishes, sweeps floors, launders clothes, cleans and scrubs counters, and dusts surfaces.'),
(6, 'Car Washer', 2, 'fa fa-car', 'Car wash attendants wash, scrub and polish the exteriors of vehicles. They may also vacuum seats and carpets and clean door trims and hinges in the interior of vehicles.', 'car-washer', '2015-05-30 18:42:16', '2015-11-19 03:05:30', 'Lavaggio auto', 'Limpieza carro', 'Car wash attendants wash, scrub and polish the exteriors of vehicles. They may also vacuum seats and carpets and clean door trims and hinges in the interior of vehicles.', 'Car wash attendants wash, scrub and polish the exteriors of vehicles. They may also vacuum seats and carpets and clean door trims and hinges in the interior of vehicles.'),
(7, 'Hotel Cleaner', 2, 'fa fa-building', 'You will find below everything you need to know about what we look for in our associates.', 'hotel-cleaner', '2015-05-30 18:55:25', '2015-11-18 05:38:32', 'Hotel Cleaner', 'Hotel Cleaner', 'You will find below everything you need to know about what we look for in our associates.', 'You will find below everything you need to know about what we look for in our associates.'),
(8, 'House Keeper', 3, 'fa fa-search', 'You will find below everything you need to know about what we look for in our associates.', 'house-keeper', '2015-05-30 18:57:09', '2015-05-30 18:57:09', 'House Keeper', 'House Keeper', 'You will find below everything you need to know about what we look for in our associates.', 'You will find below everything you need to know about what we look for in our associates.'),
(9, 'Hotel Keeper', 3, 'fa fa-bug', 'You will find below everything you need to know about what we look for in our associates.', 'hotel-keeper', '2015-05-30 18:57:27', '2015-05-30 18:57:27', 'Hotel Keeper', 'Hotel Keeper', 'You will find below everything you need to know about what we look for in our associates.', 'You will find below everything you need to know about what we look for in our associates.'),
(10, 'Store Keeper', 3, 'fa fa-tree', 'You will find below everything you need to know about what we look for in our associates.', 'store-keeper', '2015-05-30 18:57:52', '2015-05-30 18:57:52', 'Store Keeper', 'Store Keeper', 'You will find below everything you need to know about what we look for in our associates.', 'You will find below everything you need to know about what we look for in our associates.'),
(11, 'Body Guard', 3, 'fa fa-glass', 'You will find below everything you need to know about what we look for in our associates.', 'body-guard', '2015-05-30 18:58:10', '2015-05-30 18:58:10', 'Body Guard', 'Body Guard', 'You will find below everything you need to know about what we look for in our associates.', 'You will find below everything you need to know about what we look for in our associates.');

-- --------------------------------------------------------

--
-- Table structure for table `ds_terms`
--

CREATE TABLE IF NOT EXISTS `ds_terms` (
  `id` int(11) NOT NULL,
  `contenten` text NOT NULL,
  `contentit` text NOT NULL,
  `contentes` text NOT NULL,
  `status` smallint(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleen` text NOT NULL,
  `titleit` text NOT NULL,
  `titlees` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_transaction`
--

CREATE TABLE IF NOT EXISTS `ds_transaction` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `offer_id` int(10) unsigned NOT NULL,
  `txn_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `ip` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ds_user`
--

CREATE TABLE IF NOT EXISTS `ds_user` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `secure_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `suspend` smallint(5) NOT NULL COMMENT '0 = block, 1 = unblock',
  `session_status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nameit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default_language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ds_user`
--

INSERT INTO `ds_user` (`id`, `name`, `email`, `phone`, `photo`, `token`, `secure_key`, `salt`, `slug`, `is_active`, `suspend`, `session_status`, `created_at`, `updated_at`, `nameit`, `namees`, `default_language`) VALUES
(1, 'jeni', 'jeni@varaus.com', '39388474', 'default.jpg', 'LNWQ2A', '68aea46843cc3b6104a0c90f373204ef', 'Pj6flgcp', 'jeni', 1, 0, 0, '2015-04-21 04:46:19', '2015-10-07 14:36:58', '', '', NULL),
(2, 'Mi Hyang', 'miracle.star1000@whereis.com', '49483', 'default.jpg', '5RVP2F', '9f7f3fa697dd215e3cf794e88124eccc', 'uKckf2zB', 'mi-hyang', 1, 0, NULL, '2015-04-22 12:12:14', '2015-10-07 14:37:11', '', '', NULL),
(3, 'Fantastic', 'jeni@whereis.com', '', 'default.jpg', '1EZKBK', '55ba918d5d53aa00bdc9b61681884eb7', 'ofAvU4E5', 'fantastic', 0, 0, NULL, '2015-04-29 00:22:13', '2015-10-07 14:37:25', '', '', NULL),
(4, 'chongmi1', 'chongmiop@gmail.com', '493981111', 'dOxdDnmMKRiDvIbg81yfTWvs.jpg', 'SJ8TBQ', 'a4d27a5a12a8a5c698d558d524064556', 'vlMJDGsT', 'chongmi', 1, 0, NULL, '2015-04-29 00:22:45', '2015-10-07 14:37:39', '', '', NULL),
(5, 'goshawk310', 'imak.success@yesgmail.com', '1235685258', 'default.jpg', '2ORK6F', '0c9e4dc154a1b6c51ece2bf1fc19b1a4', 'F0SAWINN', 'goshawk310', 1, 0, 0, '2015-05-16 15:01:47', '2015-10-07 14:37:52', '', '', NULL),
(6, 'gae', 'gaetano.gio@gmail.com', '+393937003532', 'EdK3maafjaop9DRIv63ncUrX.jpg', 'BCMZTC', '3b8f463ac1def538d68c77cef905e8ba', 'v8B919xs', 'gae', 1, 0, 1, '2015-09-15 06:20:37', '2015-11-08 23:32:42', '', '', NULL),
(7, 'ali', 'info@aligys.com', '', 'default.jpg', 'ACH0PT', '5ffc5aea3a1a25283e8fbb79d70785ca', '7uS3WNjA', 'ali', 1, 0, 0, '2015-11-17 02:10:58', '2015-11-19 23:13:36', '', '', 'it'),
(8, 'Gaetano Giordano', 'gaetangiordano@gmail.com', '+393937003535', 'default.jpg', 'S9TYPK', 'bdf00ce9b35f4109bbd7605be67b19eb', 'k65IsbBH', 'gaetano-giordano', 0, 0, NULL, '2015-11-18 02:15:10', '2015-11-18 02:15:10', 'Gaetano Giordano', 'Gaetano Giordano', NULL),
(9, 'Rahul', 'rahulk@mobiwebtech.com', '9009336001', 'default.jpg', 'PPZOFG', 'c097a795a529821ca36c0330b9710f04', 'K4gmUnsF', 'rahul', 1, 1, 0, '2015-12-22 20:01:38', '2015-12-22 20:43:20', '', '', ''),
(11, 'sorav garg', 'sourav@mobiwebtech.com', '9074939905', 'default.jpg', '6NWI8G', 'a1b177a8c66ffd931aa47ca1a74840de', 'KB1Dlb0H', 'sorav-garg-1', 1, 1, 0, '2015-12-28 02:15:18', '2016-03-19 04:42:08', '', '', NULL),
(12, 'English', 'sorav@gmail.com', '9074939905', 'default.jpg', 'GKK95W', 'd12afeb3a975fba0b0669e4b3c38998f', 'xeb8oEzH', 'english', 0, 0, NULL, '2016-01-20 02:26:28', '2016-01-20 02:26:28', 'Italian', 'Spanish', NULL),
(13, 'dsddsdsd', 'sourav@mobiwdsdsdsebtech.com', '9074939905', 'default.jpg', 'QTJFYA', 'ef16f953f6487e2e14b451d3a265993d', '1pJxXw3M', 'dsddsdsd', 0, 0, NULL, '2016-01-25 05:20:23', '2016-01-25 05:20:23', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ds_user_loyalty`
--

CREATE TABLE IF NOT EXISTS `ds_user_loyalty` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `loyalty_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ds_user_offer`
--

CREATE TABLE IF NOT EXISTS `ds_user_offer` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `offer_id` int(10) unsigned NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ds_website`
--

CREATE TABLE IF NOT EXISTS `ds_website` (
  `id` int(11) NOT NULL,
  `value` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_website`
--

INSERT INTO `ds_website` (`id`, `value`, `image`, `created_at`, `updated_at`) VALUES
(1, 'online', 'gEPmlAZFZfamSxXCYfay7Npe.png', '2016-01-27 07:33:41', '2016-02-12 10:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `ds_world_of_professional`
--

CREATE TABLE IF NOT EXISTS `ds_world_of_professional` (
  `id` int(11) NOT NULL,
  `post_contenten` text NOT NULL,
  `post_contentit` text NOT NULL,
  `post_contentes` text NOT NULL,
  `post_titleen` varchar(100) NOT NULL,
  `post_titleit` varchar(100) NOT NULL,
  `post_titlees` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_world_of_professional`
--

INSERT INTO `ds_world_of_professional` (`id`, `post_contenten`, `post_contentit`, `post_contentes`, `post_titleen`, `post_titleit`, `post_titlees`, `image`, `created_at`, `updated_at`) VALUES
(3, 'World Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of Professional', 'World Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of Professional', 'World Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of ProfessionalWorld Of Professional', 'World Of Professional', 'World Of Professional', 'World Of Professional', 'k28iokCXThGaYqGKQDESoWsv.png', '2016-02-15 07:50:33', '2016-02-15 02:20:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_cart`
--
ALTER TABLE `ds_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_store_id_foreign` (`store_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `ds_category`
--
ALTER TABLE `ds_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_chat`
--
ALTER TABLE `ds_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_city`
--
ALTER TABLE `ds_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_class`
--
ALTER TABLE `ds_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_comments`
--
ALTER TABLE `ds_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_company`
--
ALTER TABLE `ds_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `ds_company_sub_category`
--
ALTER TABLE `ds_company_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_sub_category_company_id_foreign` (`company_id`),
  ADD KEY `company_sub_category_category_id_foreign` (`category_id`),
  ADD KEY `company_sub_category_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `ds_company_transaction`
--
ALTER TABLE `ds_company_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_company_widget`
--
ALTER TABLE `ds_company_widget`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_widget_company_id_foreign` (`company_id`);

--
-- Indexes for table `ds_consumer`
--
ALTER TABLE `ds_consumer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumer_company_id_foreign` (`company_id`),
  ADD KEY `consumer_user_id_foreign` (`user_id`);

--
-- Indexes for table `ds_contact`
--
ALTER TABLE `ds_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_company_id_foreign` (`company_id`);

--
-- Indexes for table `ds_country`
--
ALTER TABLE `ds_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_feedback`
--
ALTER TABLE `ds_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_store_id_foreign` (`store_id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`);

--
-- Indexes for table `ds_group`
--
ALTER TABLE `ds_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_company_id_foreign` (`company_id`);

--
-- Indexes for table `ds_help`
--
ALTER TABLE `ds_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_howitworks`
--
ALTER TABLE `ds_howitworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_languages`
--
ALTER TABLE `ds_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_language_labels`
--
ALTER TABLE `ds_language_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_language_labels_copy`
--
ALTER TABLE `ds_language_labels_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_loyalty`
--
ALTER TABLE `ds_loyalty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loyalty_company_id_foreign` (`company_id`);

--
-- Indexes for table `ds_marketing_history`
--
ALTER TABLE `ds_marketing_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketing_history_group_id_foreign` (`group_id`);

--
-- Indexes for table `ds_member`
--
ALTER TABLE `ds_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_group_id_foreign` (`group_id`),
  ADD KEY `member_user_id_foreign` (`user_id`);

--
-- Indexes for table `ds_message`
--
ALTER TABLE `ds_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_feedback_id_foreign` (`feedback_id`),
  ADD KEY `message_company_id_foreign` (`company_id`),
  ADD KEY `message_user_id_foreign` (`user_id`);

--
-- Indexes for table `ds_offer`
--
ALTER TABLE `ds_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_company_id_foreign` (`company_id`);

--
-- Indexes for table `ds_office`
--
ALTER TABLE `ds_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_office_opening`
--
ALTER TABLE `ds_office_opening`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_opening_company_id_foreign` (`office_id`);

--
-- Indexes for table `ds_plan`
--
ALTER TABLE `ds_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_policy`
--
ALTER TABLE `ds_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_postcategory`
--
ALTER TABLE `ds_postcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_posts`
--
ALTER TABLE `ds_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_postsubcategory`
--
ALTER TABLE `ds_postsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_post_category`
--
ALTER TABLE `ds_post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_post_request`
--
ALTER TABLE `ds_post_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_post_sub_category`
--
ALTER TABLE `ds_post_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_prof_sub_class`
--
ALTER TABLE `ds_prof_sub_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_rating`
--
ALTER TABLE `ds_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_feedback_id_foreign` (`feedback_id`),
  ADD KEY `rating_type_id_foreign` (`type_id`);

--
-- Indexes for table `ds_rating_type`
--
ALTER TABLE `ds_rating_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_type_company_id_foreign` (`company_id`);

--
-- Indexes for table `ds_review_photo`
--
ALTER TABLE `ds_review_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_photo_store_id_foreign` (`store_id`),
  ADD KEY `review_photo_user_id_foreign` (`user_id`);

--
-- Indexes for table `ds_site_languages`
--
ALTER TABLE `ds_site_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_store`
--
ALTER TABLE `ds_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_company_id_foreign` (`company_id`),
  ADD KEY `store_city_id_foreign` (`city_id`);

--
-- Indexes for table `ds_store_office`
--
ALTER TABLE `ds_store_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_store_sub_category`
--
ALTER TABLE `ds_store_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_sub_category_store_id_foreign` (`store_id`),
  ADD KEY `store_sub_category_category_id_foreign` (`category_id`),
  ADD KEY `store_sub_category_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `ds_subscribe`
--
ALTER TABLE `ds_subscribe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribe_company_id_foreign` (`company_id`),
  ADD KEY `subscribe_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `ds_sub_category`
--
ALTER TABLE `ds_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `ds_sub_class`
--
ALTER TABLE `ds_sub_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_terms`
--
ALTER TABLE `ds_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_transaction`
--
ALTER TABLE `ds_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_user`
--
ALTER TABLE `ds_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_user_loyalty`
--
ALTER TABLE `ds_user_loyalty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_loyalty_user_id_foreign` (`user_id`),
  ADD KEY `user_loyalty_loyalty_id_foreign` (`loyalty_id`);

--
-- Indexes for table `ds_user_offer`
--
ALTER TABLE `ds_user_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_offer_user_id_foreign` (`user_id`),
  ADD KEY `user_offer_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `ds_website`
--
ALTER TABLE `ds_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_world_of_professional`
--
ALTER TABLE `ds_world_of_professional`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_cart`
--
ALTER TABLE `ds_cart`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `ds_category`
--
ALTER TABLE `ds_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ds_chat`
--
ALTER TABLE `ds_chat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `ds_city`
--
ALTER TABLE `ds_city`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ds_class`
--
ALTER TABLE `ds_class`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ds_comments`
--
ALTER TABLE `ds_comments`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ds_company`
--
ALTER TABLE `ds_company`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ds_company_sub_category`
--
ALTER TABLE `ds_company_sub_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `ds_company_transaction`
--
ALTER TABLE `ds_company_transaction`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_company_widget`
--
ALTER TABLE `ds_company_widget`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ds_consumer`
--
ALTER TABLE `ds_consumer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ds_contact`
--
ALTER TABLE `ds_contact`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `ds_country`
--
ALTER TABLE `ds_country`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `ds_feedback`
--
ALTER TABLE `ds_feedback`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ds_group`
--
ALTER TABLE `ds_group`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ds_help`
--
ALTER TABLE `ds_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_howitworks`
--
ALTER TABLE `ds_howitworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ds_languages`
--
ALTER TABLE `ds_languages`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1506;
--
-- AUTO_INCREMENT for table `ds_language_labels`
--
ALTER TABLE `ds_language_labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=724;
--
-- AUTO_INCREMENT for table `ds_language_labels_copy`
--
ALTER TABLE `ds_language_labels_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=560;
--
-- AUTO_INCREMENT for table `ds_loyalty`
--
ALTER TABLE `ds_loyalty`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ds_marketing_history`
--
ALTER TABLE `ds_marketing_history`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ds_member`
--
ALTER TABLE `ds_member`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ds_message`
--
ALTER TABLE `ds_message`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_offer`
--
ALTER TABLE `ds_offer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ds_office`
--
ALTER TABLE `ds_office`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `ds_office_opening`
--
ALTER TABLE `ds_office_opening`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `ds_plan`
--
ALTER TABLE `ds_plan`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ds_policy`
--
ALTER TABLE `ds_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ds_postcategory`
--
ALTER TABLE `ds_postcategory`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ds_posts`
--
ALTER TABLE `ds_posts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `ds_postsubcategory`
--
ALTER TABLE `ds_postsubcategory`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ds_post_category`
--
ALTER TABLE `ds_post_category`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_post_request`
--
ALTER TABLE `ds_post_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `ds_post_sub_category`
--
ALTER TABLE `ds_post_sub_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `ds_prof_sub_class`
--
ALTER TABLE `ds_prof_sub_class`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=449;
--
-- AUTO_INCREMENT for table `ds_rating`
--
ALTER TABLE `ds_rating`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `ds_rating_type`
--
ALTER TABLE `ds_rating_type`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `ds_review_photo`
--
ALTER TABLE `ds_review_photo`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_site_languages`
--
ALTER TABLE `ds_site_languages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ds_store`
--
ALTER TABLE `ds_store`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `ds_store_office`
--
ALTER TABLE `ds_store_office`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=471;
--
-- AUTO_INCREMENT for table `ds_store_sub_category`
--
ALTER TABLE `ds_store_sub_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1199;
--
-- AUTO_INCREMENT for table `ds_subscribe`
--
ALTER TABLE `ds_subscribe`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sub_category`
--
ALTER TABLE `ds_sub_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `ds_sub_class`
--
ALTER TABLE `ds_sub_class`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ds_terms`
--
ALTER TABLE `ds_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_transaction`
--
ALTER TABLE `ds_transaction`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_user`
--
ALTER TABLE `ds_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ds_user_loyalty`
--
ALTER TABLE `ds_user_loyalty`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_user_offer`
--
ALTER TABLE `ds_user_offer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_website`
--
ALTER TABLE `ds_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ds_world_of_professional`
--
ALTER TABLE `ds_world_of_professional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ds_cart`
--
ALTER TABLE `ds_cart`
  ADD CONSTRAINT `cart_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `ds_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_company`
--
ALTER TABLE `ds_company`
  ADD CONSTRAINT `company_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `ds_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_company_sub_category`
--
ALTER TABLE `ds_company_sub_category`
  ADD CONSTRAINT `company_sub_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ds_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_sub_category_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_sub_category_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `ds_sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_company_widget`
--
ALTER TABLE `ds_company_widget`
  ADD CONSTRAINT `company_widget_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_consumer`
--
ALTER TABLE `ds_consumer`
  ADD CONSTRAINT `consumer_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_contact`
--
ALTER TABLE `ds_contact`
  ADD CONSTRAINT `contact_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_feedback`
--
ALTER TABLE `ds_feedback`
  ADD CONSTRAINT `feedback_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `ds_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_group`
--
ALTER TABLE `ds_group`
  ADD CONSTRAINT `group_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_loyalty`
--
ALTER TABLE `ds_loyalty`
  ADD CONSTRAINT `loyalty_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_marketing_history`
--
ALTER TABLE `ds_marketing_history`
  ADD CONSTRAINT `marketing_history_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `ds_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_member`
--
ALTER TABLE `ds_member`
  ADD CONSTRAINT `member_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `ds_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_message`
--
ALTER TABLE `ds_message`
  ADD CONSTRAINT `message_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_feedback_id_foreign` FOREIGN KEY (`feedback_id`) REFERENCES `ds_feedback` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_offer`
--
ALTER TABLE `ds_offer`
  ADD CONSTRAINT `offer_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_office_opening`
--
ALTER TABLE `ds_office_opening`
  ADD CONSTRAINT `office_opening_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `ds_office` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_rating`
--
ALTER TABLE `ds_rating`
  ADD CONSTRAINT `rating_feedback_id_foreign` FOREIGN KEY (`feedback_id`) REFERENCES `ds_feedback` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `ds_rating_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_rating_type`
--
ALTER TABLE `ds_rating_type`
  ADD CONSTRAINT `rating_type_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_review_photo`
--
ALTER TABLE `ds_review_photo`
  ADD CONSTRAINT `review_photo_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `ds_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_photo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_store`
--
ALTER TABLE `ds_store`
  ADD CONSTRAINT `store_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `ds_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_store_sub_category`
--
ALTER TABLE `ds_store_sub_category`
  ADD CONSTRAINT `store_sub_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ds_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_sub_category_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `ds_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_sub_category_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `ds_sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_subscribe`
--
ALTER TABLE `ds_subscribe`
  ADD CONSTRAINT `subscribe_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `ds_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribe_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `ds_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_sub_category`
--
ALTER TABLE `ds_sub_category`
  ADD CONSTRAINT `sub_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ds_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_user_loyalty`
--
ALTER TABLE `ds_user_loyalty`
  ADD CONSTRAINT `user_loyalty_loyalty_id_foreign` FOREIGN KEY (`loyalty_id`) REFERENCES `ds_loyalty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_loyalty_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ds_user_offer`
--
ALTER TABLE `ds_user_offer`
  ADD CONSTRAINT `user_offer_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `ds_offer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_offer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ds_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
