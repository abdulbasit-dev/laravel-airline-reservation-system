-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 06:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_airline-reservation-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Austrian Airlines', 'OS', '2022-11-13 05:58:45', '2022-11-13 05:58:45'),
(2, 'Iraqi Airways', 'IA', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(3, 'Royal Jordanian Airlines', 'RJ', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(4, 'Lufthansa', 'LH', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(5, 'Middle East', 'ME', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(6, 'Fly Dubai   ', 'FZ', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(7, 'Turkish Airlines', 'TK', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(8, 'Egypt Air', 'MS', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(9, 'Pegasus Airlines', 'PC', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(10, 'Qatar Airways', 'QR ', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(11, 'Mahan Air', 'W5', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(12, 'AirArabia', 'G9', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(13, 'Fly Baghdad', 'IF', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(14, 'Cham Wings Airlines', 'SAW', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(15, 'Ur Airline', 'UD', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(16, 'SunExpress ', 'XQ ', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(17, 'Tailwind Airline', 'TI', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(18, 'Eurowings', 'EW ', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(19, 'Pouya Air', 'PY ', '2022-11-13 05:58:46', '2022-11-13 05:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `city_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Erbil Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(2, 2, 'Amman Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(3, 3, 'Antalya Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(4, 4, 'Athens Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(5, 5, 'Baghdad Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(6, 6, 'Bahrain Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(7, 7, 'Basra Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(8, 8, 'Beirut Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(9, 9, 'Damascus Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(10, 10, 'Dubai Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(11, 11, 'Dusseldorf Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(12, 12, 'Eindhoven Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(13, 13, 'Frankfurt Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(14, 14, 'Gothenburg Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(15, 15, 'Istanbul Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(16, 16, 'Jeddah Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(17, 17, 'London Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(18, 18, 'Malmo Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(19, 19, 'Manchester Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(20, 20, 'Munich Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(21, 21, 'Najaf Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(22, 22, 'Oslo Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(23, 23, 'Stockholm Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(24, 24, 'Tehran Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(25, 25, 'Vienna Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(26, 26, 'Orumiyeh Airport', '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(27, 27, 'Abu Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(28, 28, 'Amsterdam Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(29, 29, 'Copenhagen Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(30, 30, 'Sulaimany Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(31, 31, 'Madina Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(32, 32, 'Larnaca Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(33, 33, 'Cairo Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(34, 34, 'Ankara Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(35, 35, 'Antalya Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(36, 36, 'Doha Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(37, 37, 'sharjah Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(38, 38, 'Tbilisi Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(39, 39, 'Batumi Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(40, 40, 'Adana Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(41, 41, 'Tunis Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(42, 42, 'Berlin Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(43, 43, 'Yerevan Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(44, 44, 'Adana Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(45, 45, 'Stuttgart Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(46, 46, 'Baku Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(47, 47, 'Diyarbakir Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(48, 48, 'Gaziantep Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(49, 49, 'Minsk Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(50, 50, 'Nasiriyah Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(51, 51, 'Istanbul Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(52, 52, 'Kiev Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(53, 53, 'Nuremberg Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(54, 54, 'Odessa Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(55, 55, 'Birmingham Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(56, 56, 'Amsterdam Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(57, 57, 'Rotterdam Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(58, 58, 'Cologne Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(59, 59, 'Trabzon Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(60, 60, 'Mugla Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(61, 61, 'Madrid Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(62, 62, 'Bucharest Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(63, 63, 'Prague Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(64, 64, 'Hanover Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(65, 65, 'Aleppo Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(66, 66, 'Urmia Airport', '2022-11-13 05:58:47', '2022-11-13 05:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Erbil', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(2, NULL, 'Amman', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(3, NULL, 'Antalya', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(4, NULL, 'Athens', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(5, NULL, 'Baghdad', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(6, NULL, 'Bahrain', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(7, NULL, 'Basra', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(8, NULL, 'Beirut', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(9, NULL, 'Damascus', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(10, NULL, 'Dubai', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(11, NULL, 'Dusseldorf', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(12, NULL, 'Eindhoven', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(13, NULL, 'Frankfurt', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(14, NULL, 'Gothenburg', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(15, NULL, 'Istanbul', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(16, NULL, 'Jeddah', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(17, NULL, 'London', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(18, NULL, 'Malmo', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(19, NULL, 'Manchester', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(20, NULL, 'Munich', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(21, NULL, 'Najaf', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(22, NULL, 'Oslo', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(23, NULL, 'Stockholm', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(24, NULL, 'Tehran', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(25, NULL, 'Vienna', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(26, NULL, 'Orumiyeh', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(27, NULL, 'Abu', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(28, NULL, 'Amsterdam', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(29, NULL, 'Copenhagen', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(30, NULL, 'Sulaimany', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(31, NULL, 'Madina', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(32, NULL, 'Larnaca', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(33, NULL, 'Cairo', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(34, NULL, 'Ankara', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(35, NULL, 'Antalya', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(36, NULL, 'Doha', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(37, NULL, 'sharjah', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(38, NULL, 'Tbilisi', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(39, NULL, 'Batumi', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(40, NULL, 'Adana', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(41, NULL, 'Tunis', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(42, NULL, 'Berlin', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(43, NULL, 'Yerevan', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(44, NULL, 'Adana', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(45, NULL, 'Stuttgart', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(46, NULL, 'Baku', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(47, NULL, 'Diyarbakir', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(48, NULL, 'Gaziantep', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(49, NULL, 'Minsk', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(50, NULL, 'Nasiriyah', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(51, NULL, 'Istanbul', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(52, NULL, 'Kiev', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(53, NULL, 'Nuremberg', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(54, NULL, 'Odessa', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(55, NULL, 'Birmingham', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(56, NULL, 'Amsterdam', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(57, NULL, 'Rotterdam', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(58, NULL, 'Cologne', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(59, NULL, 'Trabzon', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(60, NULL, 'Mugla', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(61, NULL, 'Madrid', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(62, NULL, 'Bucharest', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(63, NULL, 'Prague', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(64, NULL, 'Hanover', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(65, NULL, 'Aleppo', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL),
(66, NULL, 'Urmia', '2022-11-13 05:58:46', '2022-11-13 05:58:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flight_number` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `airline_id` bigint(20) UNSIGNED NOT NULL,
  `plane_id` bigint(20) UNSIGNED NOT NULL,
  `origin_id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `seats` int(11) NOT NULL,
  `remain_seats` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `price` double(6,2) NOT NULL COMMENT 'in USD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `flight_number`, `airline_id`, `plane_id`, `origin_id`, `destination_id`, `departure`, `arrival`, `seats`, `remain_seats`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, '592', 1, 1, 14, 9, '2022-11-15 06:57:20', '2022-11-15 07:32:46', 174, 141, 0, 895.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(2, '924', 2, 2, 16, 44, '2022-11-14 11:49:30', '2022-11-15 01:13:52', 151, 88, 0, 113.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(3, '395', 3, 3, 26, 1, '2022-11-14 02:16:28', '2022-11-14 03:17:38', 166, 62, 1, 435.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(4, '845', 3, 4, 15, 52, '2022-11-14 02:16:28', '2022-11-14 03:17:38', 183, 84, 0, 496.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(5, '556', 3, 5, 21, 32, '2022-11-14 02:16:28', '2022-11-14 03:17:38', 195, 49, 0, 731.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(6, '131', 3, 6, 58, 61, '2022-11-14 02:16:28', '2022-11-14 03:17:38', 153, 74, 1, 440.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(7, '939', 4, 7, 6, 33, '2022-11-15 03:16:16', '2022-11-15 07:00:39', 182, 172, 0, 247.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(8, '248', 4, 8, 25, 64, '2022-11-15 03:16:16', '2022-11-15 07:00:39', 153, 25, 1, 233.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(9, '620', 4, 9, 66, 5, '2022-11-15 03:16:16', '2022-11-15 07:00:39', 178, 143, 1, 793.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(10, '458', 5, 10, 2, 12, '2022-11-14 10:44:46', '2022-11-14 21:45:05', 191, 24, 1, 762.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(11, '384', 5, 11, 42, 5, '2022-11-14 10:44:46', '2022-11-14 21:45:05', 160, 78, 0, 815.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(12, '891', 6, 12, 44, 27, '2022-11-13 20:31:21', '2022-11-14 05:28:18', 165, 133, 0, 774.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(13, '387', 7, 13, 12, 20, '2022-11-14 12:33:36', '2022-11-15 00:00:42', 172, 169, 1, 545.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(14, '897', 7, 14, 56, 20, '2022-11-14 12:33:36', '2022-11-15 00:00:42', 183, 63, 1, 249.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(15, '831', 8, 15, 19, 34, '2022-11-14 12:47:48', '2022-11-14 20:18:40', 158, 20, 0, 541.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(16, '614', 8, 16, 24, 66, '2022-11-14 12:47:48', '2022-11-14 20:18:40', 198, 128, 0, 493.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(17, '362', 9, 17, 54, 25, '2022-11-14 01:31:47', '2022-11-15 08:53:55', 185, 77, 1, 111.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(18, '945', 9, 18, 35, 18, '2022-11-14 01:31:47', '2022-11-15 08:53:55', 181, 71, 1, 621.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(19, '325', 9, 19, 5, 64, '2022-11-14 01:31:47', '2022-11-15 08:53:55', 187, 98, 0, 145.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(20, '829', 10, 20, 27, 26, '2022-11-13 17:06:14', '2022-11-14 03:33:50', 180, 8, 0, 578.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(21, '788', 10, 21, 45, 50, '2022-11-13 17:06:14', '2022-11-14 03:33:50', 168, 115, 1, 821.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(22, '402', 11, 22, 2, 19, '2022-11-15 00:38:05', '2022-11-15 06:14:28', 191, 122, 0, 795.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(23, '730', 12, 23, 34, 42, '2022-11-14 06:15:17', '2022-11-14 23:03:28', 199, 14, 1, 391.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(24, '706', 12, 24, 30, 42, '2022-11-14 06:15:17', '2022-11-14 23:03:28', 175, 63, 0, 285.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(25, '976', 12, 25, 57, 49, '2022-11-14 06:15:17', '2022-11-14 23:03:28', 191, 95, 1, 992.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(26, '285', 13, 26, 40, 49, '2022-11-14 13:02:28', '2022-11-15 06:05:29', 179, 19, 1, 804.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(27, '259', 13, 27, 54, 2, '2022-11-14 13:02:28', '2022-11-15 06:05:29', 177, 125, 0, 717.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(28, '141', 13, 28, 35, 8, '2022-11-14 13:02:28', '2022-11-15 06:05:29', 181, 84, 1, 613.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(29, '228', 13, 29, 62, 63, '2022-11-14 13:02:28', '2022-11-15 06:05:29', 168, 65, 0, 629.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(30, '782', 14, 30, 16, 19, '2022-11-15 02:39:50', '2022-11-15 04:44:00', 165, 9, 0, 716.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(31, '475', 15, 31, 20, 24, '2022-11-14 01:36:01', '2022-11-14 12:47:37', 199, 48, 1, 336.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(32, '913', 15, 32, 53, 65, '2022-11-14 01:36:01', '2022-11-14 12:47:37', 169, 150, 1, 895.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(33, '561', 16, 33, 48, 35, '2022-11-13 18:58:28', '2022-11-14 22:08:52', 150, 6, 1, 944.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(34, '329', 16, 34, 53, 22, '2022-11-13 18:58:28', '2022-11-14 22:08:52', 171, 43, 1, 128.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(35, '632', 17, 35, 6, 18, '2022-11-14 05:57:08', '2022-11-14 19:37:27', 171, 41, 0, 812.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(36, '643', 17, 36, 29, 5, '2022-11-14 05:57:08', '2022-11-14 19:37:27', 157, 70, 0, 205.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(37, '260', 17, 37, 36, 42, '2022-11-14 05:57:08', '2022-11-14 19:37:27', 181, 40, 0, 371.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(38, '965', 18, 38, 17, 1, '2022-11-13 23:04:44', '2022-11-14 14:58:16', 163, 94, 1, 447.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(39, '507', 18, 39, 56, 66, '2022-11-13 23:04:44', '2022-11-14 14:58:16', 166, 16, 0, 867.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(40, '374', 18, 40, 55, 43, '2022-11-13 23:04:44', '2022-11-14 14:58:16', 179, 171, 0, 347.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(41, '199', 18, 41, 8, 38, '2022-11-13 23:04:44', '2022-11-14 14:58:16', 156, 128, 0, 598.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(42, '209', 19, 42, 53, 63, '2022-11-13 09:56:50', '2022-11-14 07:51:14', 167, 77, 1, 972.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(43, '650', 19, 43, 22, 3, '2022-11-13 09:56:50', '2022-11-14 07:51:14', 178, 48, 0, 648.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(44, '317', 19, 44, 30, 59, '2022-11-13 09:56:50', '2022-11-14 07:51:14', 177, 47, 0, 324.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47'),
(45, '481', 19, 45, 28, 14, '2022-11-13 09:56:50', '2022-11-14 07:51:14', 150, 38, 1, 484.00, '2022-11-13 05:58:47', '2022-11-13 05:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `collection_name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `mime_type` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disk` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `conversions_disk` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Airline', 1, '59e4d78a-9231-4b68-a247-357bf693168a', 'default', 'Austrian Airlines', 'austrian.jpg', 'image/jpeg', 'public', 'public', 1609, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(2, 'App\\Models\\Airline', 2, 'b4f39d98-e96f-4403-aa47-d670d0ff2c9a', 'default', 'Iraqi Airways', 'iraqi_airways.jpg', 'image/jpeg', 'public', 'public', 2245, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(3, 'App\\Models\\Airline', 3, '9cdd3f90-c99a-412a-9d83-a5aa7dc60f65', 'default', 'Royal Jordanian Airlines', 'royal_jordanian.jpg', 'image/jpeg', 'public', 'public', 1462, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(4, 'App\\Models\\Airline', 4, '311069fa-90ff-4883-840c-9ae0571cb31e', 'default', 'Lufthansa', 'Lufthansa-Logo2.gif', 'image/gif', 'public', 'public', 4165, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(5, 'App\\Models\\Airline', 5, 'db4d0341-e768-4ab3-b0a0-f280fa010316', 'default', 'Middle East', 'mea-logo.jpg', 'image/jpeg', 'public', 'public', 147211, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(6, 'App\\Models\\Airline', 6, '84f74b02-fecf-47ac-a367-6f7e6b45cd43', 'default', 'Fly Dubai   ', 'en-logo_flydubai.gif', 'image/gif', 'public', 'public', 1308, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(7, 'App\\Models\\Airline', 7, '46ad8db2-b092-4c85-83f6-f9285dad79a8', 'default', 'Turkish Airlines', 'Turkish-Airlines.jpg', 'image/jpeg', 'public', 'public', 764, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(8, 'App\\Models\\Airline', 8, '04bd71e1-8270-4bed-b0fa-e7bf976a33b5', 'default', 'Egypt Air', 'Egypt-Air.jpg', 'image/jpeg', 'public', 'public', 4403, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(9, 'App\\Models\\Airline', 9, '8f7c4d86-df6d-4a99-98f4-7a40c52b7d10', 'default', 'Pegasus Airlines', 'pegasus_logo.jpg', 'image/jpeg', 'public', 'public', 136958, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(10, 'App\\Models\\Airline', 10, '4ed450d3-476c-46ae-9983-f7ee5698bbe5', 'default', 'Qatar Airways', 'Qatar-airways-logo.jpg', 'image/jpeg', 'public', 'public', 20568, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(11, 'App\\Models\\Airline', 11, '4440e270-3a42-49db-a79b-324d0877a8ce', 'default', 'Mahan Air', 'mahan-air.png', 'image/png', 'public', 'public', 3065, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(12, 'App\\Models\\Airline', 12, '2a97644d-1c72-47c1-a145-65d97634273e', 'default', 'AirArabia', 'logo_airarabia.jpg', 'image/jpeg', 'public', 'public', 23120, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(13, 'App\\Models\\Airline', 13, '19e669c7-b17d-4269-8bcd-de342f6a4905', 'default', 'Fly Baghdad', 'baghdadd.gif', 'image/gif', 'public', 'public', 105820, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(14, 'App\\Models\\Airline', 14, 'd1d495df-68ca-4d05-95b7-865445dca2e3', 'default', 'Cham Wings Airlines', 'cham.jpg', 'image/jpeg', 'public', 'public', 22676, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(15, 'App\\Models\\Airline', 15, '37734dcf-0198-4bb1-8fa7-60f3b7a0a831', 'default', 'Ur Airline', 'ur-airline-logo.jpg', 'image/jpeg', 'public', 'public', 31044, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(16, 'App\\Models\\Airline', 16, '6bbaff5d-401d-428c-bcee-c7776d5b5059', 'default', 'SunExpress ', 'SunExpress.jpg', 'image/jpeg', 'public', 'public', 37232, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(17, 'App\\Models\\Airline', 17, 'c8e26477-7af8-46c4-abcb-876342780427', 'default', 'Tailwind Airline', 'tailwind-airline.jpg', 'image/jpeg', 'public', 'public', 42877, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(18, 'App\\Models\\Airline', 18, '33b0c87d-7d99-4b6c-b591-e0d0932851f6', 'default', 'Eurowings', 'eurowings_logo.jpg', 'image/jpeg', 'public', 'public', 2683, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(19, 'App\\Models\\Airline', 19, '7bcb2466-f33d-44d0-8b9b-06f223ddbc2a', 'default', 'Pouya Air', 'pouya-air.jpg', 'image/jpeg', 'public', 'public', 23970, '[]', '[]', '[]', '[]', 1, '2022-11-13 05:58:46', '2022-11-13 05:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_22_065659_create_media_table', 1),
(6, '2022_09_20_123245_create_countries_table', 1),
(7, '2022_09_20_123321_create_cities_table', 1),
(8, '2022_09_20_123623_create_airports_table', 1),
(9, '2022_09_20_123739_create_airlines_table', 1),
(10, '2022_09_20_123751_create_planes_table', 1),
(11, '2022_09_20_123810_create_flights_table', 1),
(12, '2022_09_27_145710_create_tickets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `airline_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`id`, `airline_id`, `name`, `code`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Boeing 737-223', 'B730', 174, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(2, 2, 'Boeing 737-890', 'B736', 151, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(3, 3, 'Boeing 737-273', 'B736', 166, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(4, 3, 'Boeing 737-353', 'B735', 183, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(5, 3, 'Boeing 737-161', 'B731', 195, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(6, 3, 'Boeing 737-414', 'B736', 153, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(7, 4, 'Boeing 737-237', 'B739', 182, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(8, 4, 'Boeing 737-169', 'B737', 153, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(9, 4, 'Boeing 737-661', 'B730', 178, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(10, 5, 'Boeing 737-467', 'B736', 191, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(11, 5, 'Boeing 737-716', 'B730', 160, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(12, 6, 'Boeing 737-391', 'B739', 165, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(13, 7, 'Boeing 737-189', 'B730', 172, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(14, 7, 'Boeing 737-416', 'B738', 183, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(15, 8, 'Boeing 737-760', 'B733', 158, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(16, 8, 'Boeing 737-546', 'B739', 198, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(17, 9, 'Boeing 737-113', 'B730', 185, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(18, 9, 'Boeing 737-850', 'B734', 181, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(19, 9, 'Boeing 737-448', 'B739', 187, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(20, 10, 'Boeing 737-439', 'B730', 180, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(21, 10, 'Boeing 737-448', 'B736', 168, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(22, 11, 'Boeing 737-830', 'B732', 191, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(23, 12, 'Boeing 737-638', 'B736', 199, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(24, 12, 'Boeing 737-206', 'B736', 175, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(25, 12, 'Boeing 737-525', 'B739', 191, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(26, 13, 'Boeing 737-554', 'B737', 179, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(27, 13, 'Boeing 737-145', 'B739', 177, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(28, 13, 'Boeing 737-775', 'B736', 181, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(29, 13, 'Boeing 737-422', 'B730', 168, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(30, 14, 'Boeing 737-399', 'B735', 165, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(31, 15, 'Boeing 737-320', 'B738', 199, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(32, 15, 'Boeing 737-128', 'B739', 169, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(33, 16, 'Boeing 737-483', 'B738', 150, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(34, 16, 'Boeing 737-243', 'B734', 171, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(35, 17, 'Boeing 737-161', 'B734', 171, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(36, 17, 'Boeing 737-814', 'B732', 157, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(37, 17, 'Boeing 737-330', 'B730', 181, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(38, 18, 'Boeing 737-851', 'B730', 163, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(39, 18, 'Boeing 737-741', 'B739', 166, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(40, 18, 'Boeing 737-602', 'B733', 179, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(41, 18, 'Boeing 737-747', 'B730', 156, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(42, 19, 'Boeing 737-145', 'B737', 167, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(43, 19, 'Boeing 737-333', 'B737', 178, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(44, 19, 'Boeing 737-575', 'B734', 177, '2022-11-13 05:58:46', '2022-11-13 05:58:46'),
(45, 19, 'Boeing 737-798', 'B732', 150, '2022-11-13 05:58:46', '2022-11-13 05:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `flight_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `fcm_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `phone`, `address`, `is_accepted`, `email_verified_at`, `fcm_token`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'admin', 'admin@airline.com', '0123456789', NULL, 0, NULL, NULL, '$2y$10$AxwQzUsfca4nzeKPOC0yvu7samnC/pPPtke8TEj1N/WA9KsmczfSK', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(2, 1, 'Krista Ward', 'uschamberger@gmail.com', '+1-856-628-6760', '9020 Ford Isle Suite 079\nCorkeryside, NJ 48237-6273', 0, NULL, NULL, '$2y$10$jlIwCnIt3n2GRHJCMlmq6.CLM3/4DUuUridrE/ex8fnPexxhlw9m.', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(3, 0, 'Prof. Christian Koelpin', 'corkery.keira@herman.com', '(424) 781-8709', '8924 Schuster Glens Apt. 134\nNorth Sigmundton, NV 53811', 0, NULL, NULL, '$2y$10$pkBaWaEHebi87gZ83kgYuO/CA6cSW9eRIycupou0ByGEkU5XkhdyS', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(4, 0, 'Juliet Hettinger II', 'vito28@nitzsche.com', '+1.743.680.9468', '19437 Kira Mount\nSouth Cortneystad, NC 62281', 0, NULL, NULL, '$2y$10$MpAq/2Sp3iu4S0tsr.B.hOch87lPRaz0296sgqEgmRkuydv.2jE/e', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(5, 0, 'Mr. Rhett Deckow Sr.', 'rolando.king@gmail.com', '1-248-268-0436', '94440 Noah Crest Suite 756\nArdenport, AK 19194', 0, NULL, NULL, '$2y$10$kW/jUqrP/XpeWtQJKCjcbOM6MzLrCZSHwCQa.kZF5WnnHaAMQ2HGO', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(6, 1, 'Dina Legros', 'price.willie@steuber.com', '+1 (361) 973-1622', '28257 Nicolas Point Suite 262\nBennyton, NM 47789', 0, NULL, NULL, '$2y$10$GWYNzB1uHhyq6kbGWEJoaubuMLq5TWpgQDvlIy/6DUKPWT4g5I4Mq', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(7, 1, 'Prof. Abagail McKenzie', 'johnston.dane@hotmail.com', '+1-248-281-2320', '55970 Mayert Turnpike Suite 368\nWestland, MI 61228', 0, NULL, NULL, '$2y$10$o74ybEwxieuXebUnrTqm2eseh8pmw9kDdYlAuUZuCzsqSln5OPN4u', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(8, 0, 'Perry Gibson', 'mbednar@jacobs.com', '+1-234-528-5843', '834 Langworth Trail\nLake Lailachester, MO 72077', 0, NULL, NULL, '$2y$10$3nBjRweb8Dh6/S68G9EC7e7OJuThmv18PNw4ANAEwlwPUh.zCUjz2', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(9, 0, 'Matt Cormier PhD', 'ablick@ratke.net', '(970) 963-4951', '82438 Hackett Prairie Suite 524\nNew Nathanburgh, GA 23013-3094', 0, NULL, NULL, '$2y$10$JaCaU4D1r2gYsURemiSqberWjfoj6RSVmMG5.jxNm5XvIcqD4iHWW', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(10, 0, 'Ford Fadel', 'wintheiser.abelardo@gmail.com', '1-616-610-9090', '90802 Lavonne Stream Apt. 004\nWest Vinniebury, VA 15268-1827', 0, NULL, NULL, '$2y$10$QjMdtocptwXnnN3LV//aheV/hrzosd58NCuAJVcK9aSpHIvZ6Z/na', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL),
(11, 0, 'Thaddeus Schiller', 'onie.franecki@mcglynn.com', '1-859-210-7590', '810 Daniel Forge Suite 982\nHudsonfurt, HI 04786', 0, NULL, NULL, '$2y$10$z/fH16I4DYQypgIs9bnR1OupBRagbMoUlH37Rd3mg9Ovl9X4Iiw9y', NULL, '2022-11-13 05:58:45', '2022-11-13 05:58:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airports_city_id_foreign` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flights_airline_id_foreign` (`airline_id`),
  ADD KEY `flights_plane_id_foreign` (`plane_id`),
  ADD KEY `flights_origin_id_foreign` (`origin_id`),
  ADD KEY `flights_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planes_airline_id_foreign` (`airline_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_flight_id_foreign` (`flight_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airports`
--
ALTER TABLE `airports`
  ADD CONSTRAINT `airports_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_airline_id_foreign` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flights_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flights_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flights_plane_id_foreign` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `planes_airline_id_foreign` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_flight_id_foreign` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
