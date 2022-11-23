-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 04:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
(1, 'Austrian Airlines', 'OS', '2022-11-23 03:15:23', '2022-11-23 03:15:23'),
(2, 'Iraqi Airways', 'IA', '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(3, 'Royal Jordanian Airlines', 'RJ', '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(4, 'Lufthansa', 'LH', '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(5, 'Middle East', 'ME', '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(6, 'Fly Dubai   ', 'FZ', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(7, 'Turkish Airlines', 'TK', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(8, 'Egypt Air', 'MS', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(9, 'Pegasus Airlines', 'PC', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(10, 'Qatar Airways', 'QR ', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(11, 'Mahan Air', 'W5', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(12, 'AirArabia', 'G9', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(13, 'Fly Baghdad', 'IF', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(14, 'Cham Wings Airlines', 'SAW', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(15, 'Ur Airline', 'UD', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(16, 'SunExpress ', 'XQ ', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(17, 'Tailwind Airline', 'TI', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(18, 'Eurowings', 'EW ', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(19, 'Pouya Air', 'PY ', '2022-11-23 03:15:26', '2022-11-23 03:15:26');

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
(1, 1, 'Erbil Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(2, 2, 'Amman Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(3, 3, 'Antalya Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(4, 4, 'Athens Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(5, 5, 'Baghdad Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(6, 6, 'Bahrain Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(7, 7, 'Basra Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(8, 8, 'Beirut Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(9, 9, 'Damascus Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(10, 10, 'Dubai Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(11, 11, 'Dusseldorf Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(12, 12, 'Eindhoven Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(13, 13, 'Frankfurt Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(14, 14, 'Gothenburg Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(15, 15, 'Istanbul Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(16, 16, 'Jeddah Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(17, 17, 'London Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(18, 18, 'Malmo Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(19, 19, 'Manchester Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(20, 20, 'Munich Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(21, 21, 'Najaf Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(22, 22, 'Oslo Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(23, 23, 'Stockholm Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(24, 24, 'Tehran Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(25, 25, 'Vienna Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(26, 26, 'Orumiyeh Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(27, 27, 'Abu Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(28, 28, 'Amsterdam Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(29, 29, 'Copenhagen Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(30, 30, 'Sulaimany Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(31, 31, 'Madina Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(32, 32, 'Larnaca Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(33, 33, 'Cairo Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(34, 34, 'Ankara Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(35, 35, 'Antalya Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(36, 36, 'Doha Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(37, 37, 'sharjah Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(38, 38, 'Tbilisi Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(39, 39, 'Batumi Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(40, 40, 'Adana Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(41, 41, 'Tunis Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(42, 42, 'Berlin Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(43, 43, 'Yerevan Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(44, 44, 'Adana Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(45, 45, 'Stuttgart Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(46, 46, 'Baku Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(47, 47, 'Diyarbakir Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(48, 48, 'Gaziantep Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(49, 49, 'Minsk Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(50, 50, 'Nasiriyah Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(51, 51, 'Istanbul Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(52, 52, 'Kiev Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(53, 53, 'Nuremberg Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(54, 54, 'Odessa Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(55, 55, 'Birmingham Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(56, 56, 'Amsterdam Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(57, 57, 'Rotterdam Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(58, 58, 'Cologne Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(59, 59, 'Trabzon Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(60, 60, 'Mugla Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(61, 61, 'Madrid Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(62, 62, 'Bucharest Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(63, 63, 'Prague Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(64, 64, 'Hanover Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(65, 65, 'Aleppo Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(66, 66, 'Urmia Airport', '2022-11-23 03:15:26', '2022-11-23 03:15:26');

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
(1, NULL, 'Erbil', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(2, NULL, 'Amman', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(3, NULL, 'Antalya', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(4, NULL, 'Athens', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(5, NULL, 'Baghdad', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(6, NULL, 'Bahrain', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(7, NULL, 'Basra', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(8, NULL, 'Beirut', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(9, NULL, 'Damascus', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(10, NULL, 'Dubai', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(11, NULL, 'Dusseldorf', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(12, NULL, 'Eindhoven', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(13, NULL, 'Frankfurt', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(14, NULL, 'Gothenburg', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(15, NULL, 'Istanbul', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(16, NULL, 'Jeddah', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(17, NULL, 'London', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(18, NULL, 'Malmo', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(19, NULL, 'Manchester', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(20, NULL, 'Munich', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(21, NULL, 'Najaf', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(22, NULL, 'Oslo', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(23, NULL, 'Stockholm', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(24, NULL, 'Tehran', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(25, NULL, 'Vienna', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(26, NULL, 'Orumiyeh', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(27, NULL, 'Abu', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(28, NULL, 'Amsterdam', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(29, NULL, 'Copenhagen', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(30, NULL, 'Sulaimany', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(31, NULL, 'Madina', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(32, NULL, 'Larnaca', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(33, NULL, 'Cairo', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(34, NULL, 'Ankara', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(35, NULL, 'Antalya', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(36, NULL, 'Doha', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(37, NULL, 'sharjah', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(38, NULL, 'Tbilisi', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(39, NULL, 'Batumi', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(40, NULL, 'Adana', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(41, NULL, 'Tunis', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(42, NULL, 'Berlin', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(43, NULL, 'Yerevan', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(44, NULL, 'Adana', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(45, NULL, 'Stuttgart', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(46, NULL, 'Baku', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(47, NULL, 'Diyarbakir', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(48, NULL, 'Gaziantep', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(49, NULL, 'Minsk', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(50, NULL, 'Nasiriyah', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(51, NULL, 'Istanbul', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(52, NULL, 'Kiev', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(53, NULL, 'Nuremberg', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(54, NULL, 'Odessa', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(55, NULL, 'Birmingham', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(56, NULL, 'Amsterdam', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(57, NULL, 'Rotterdam', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(58, NULL, 'Cologne', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(59, NULL, 'Trabzon', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(60, NULL, 'Mugla', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(61, NULL, 'Madrid', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(62, NULL, 'Bucharest', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(63, NULL, 'Prague', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(64, NULL, 'Hanover', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(65, NULL, 'Aleppo', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL),
(66, NULL, 'Urmia', '2022-11-23 03:15:26', '2022-11-23 03:15:26', NULL);

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
(1, '997', 1, 1, 13, 11, '2022-11-24 16:27:29', '2022-11-24 20:06:38', 197, 56, 0, 845.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(2, '936', 1, 2, 65, 63, '2022-11-24 16:27:29', '2022-11-24 20:06:38', 179, 151, 0, 509.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(3, '594', 1, 3, 49, 8, '2022-11-24 16:27:29', '2022-11-24 20:06:38', 173, 104, 1, 891.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(4, '768', 2, 4, 54, 24, '2022-11-24 12:55:35', '2022-11-24 23:19:04', 192, 105, 1, 535.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(5, '652', 3, 5, 64, 9, '2022-11-24 10:37:42', '2022-11-24 21:17:45', 177, 110, 0, 825.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(6, '482', 4, 6, 4, 5, '2022-11-25 06:09:03', '2022-11-25 06:10:57', 157, 63, 0, 111.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(7, '940', 4, 7, 65, 32, '2022-11-25 06:09:03', '2022-11-25 06:10:57', 182, 69, 1, 235.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(8, '622', 4, 8, 12, 59, '2022-11-25 06:09:03', '2022-11-25 06:10:57', 184, 86, 1, 817.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(9, '835', 5, 9, 46, 44, '2022-11-23 16:27:57', '2022-11-24 09:35:42', 163, 45, 0, 917.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(10, '462', 5, 10, 21, 8, '2022-11-23 16:27:57', '2022-11-24 09:35:42', 198, 22, 1, 310.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(11, '129', 5, 11, 47, 31, '2022-11-23 16:27:57', '2022-11-24 09:35:42', 172, 30, 1, 735.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(12, '949', 6, 12, 45, 36, '2022-11-24 03:59:30', '2022-11-25 04:53:10', 178, 62, 1, 916.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(13, '235', 6, 13, 55, 27, '2022-11-24 03:59:30', '2022-11-25 04:53:10', 174, 131, 1, 649.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(14, '204', 7, 14, 33, 53, '2022-11-24 17:39:11', '2022-11-25 05:54:56', 167, 13, 0, 816.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(15, '964', 7, 15, 6, 30, '2022-11-24 17:39:11', '2022-11-25 05:54:56', 200, 165, 1, 780.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(16, '404', 7, 16, 3, 65, '2022-11-24 17:39:11', '2022-11-25 05:54:56', 170, 87, 0, 127.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(17, '544', 7, 17, 5, 54, '2022-11-24 17:39:11', '2022-11-25 05:54:56', 160, 19, 1, 640.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(18, '441', 8, 18, 8, 13, '2022-11-23 06:26:11', '2022-11-23 15:37:51', 190, 6, 1, 154.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(19, '468', 9, 19, 5, 40, '2022-11-23 16:41:55', '2022-11-23 17:09:39', 166, 21, 1, 731.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(20, '258', 9, 20, 39, 40, '2022-11-23 16:41:55', '2022-11-23 17:09:39', 197, 132, 0, 118.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(21, '403', 9, 21, 65, 10, '2022-11-23 16:41:55', '2022-11-23 17:09:39', 185, 122, 1, 714.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(22, '453', 10, 22, 60, 24, '2022-11-23 06:20:08', '2022-11-23 14:26:40', 150, 146, 0, 315.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(23, '307', 10, 23, 18, 12, '2022-11-23 06:20:08', '2022-11-23 14:26:40', 162, 26, 1, 960.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(24, '306', 10, 24, 39, 43, '2022-11-23 06:20:08', '2022-11-23 14:26:40', 191, 113, 0, 923.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(25, '528', 10, 25, 33, 17, '2022-11-23 06:20:08', '2022-11-23 14:26:40', 200, 189, 0, 640.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(26, '704', 11, 26, 28, 65, '2022-11-24 01:24:04', '2022-11-24 05:51:07', 151, 40, 1, 945.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(27, '256', 11, 27, 58, 22, '2022-11-24 01:24:04', '2022-11-24 05:51:07', 177, 38, 1, 313.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(28, '741', 12, 28, 62, 60, '2022-11-23 23:19:33', '2022-11-24 15:50:50', 179, 35, 1, 595.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(29, '640', 13, 29, 36, 14, '2022-11-24 19:42:08', '2022-11-25 05:59:19', 157, 92, 1, 873.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(30, '361', 13, 30, 26, 34, '2022-11-24 19:42:08', '2022-11-25 05:59:19', 195, 94, 0, 696.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(31, '894', 14, 31, 1, 32, '2022-11-24 05:57:45', '2022-11-25 06:06:15', 158, 51, 1, 256.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(32, '816', 14, 32, 5, 57, '2022-11-24 05:57:45', '2022-11-25 06:06:15', 150, 33, 1, 350.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(33, '119', 14, 33, 31, 56, '2022-11-24 05:57:45', '2022-11-25 06:06:15', 186, 57, 0, 588.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(34, '950', 15, 34, 5, 66, '2022-11-25 02:38:05', '2022-11-25 03:51:55', 184, 100, 1, 153.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(35, '715', 15, 35, 13, 57, '2022-11-25 02:38:05', '2022-11-25 03:51:55', 183, 84, 1, 481.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(36, '931', 15, 36, 4, 14, '2022-11-25 02:38:05', '2022-11-25 03:51:55', 191, 65, 0, 452.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(37, '825', 15, 37, 7, 47, '2022-11-25 02:38:05', '2022-11-25 03:51:55', 190, 136, 0, 948.00, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(38, '526', 16, 38, 37, 45, '2022-11-24 09:21:57', '2022-11-24 22:07:29', 164, 58, 1, 744.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(39, '301', 17, 39, 61, 61, '2022-11-25 01:35:22', '2022-11-25 01:44:50', 180, 177, 0, 654.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(40, '654', 17, 40, 34, 49, '2022-11-25 01:35:22', '2022-11-25 01:44:50', 168, 30, 1, 563.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(41, '696', 17, 41, 49, 61, '2022-11-25 01:35:22', '2022-11-25 01:44:50', 181, 76, 0, 876.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(42, '577', 17, 42, 36, 15, '2022-11-25 01:35:22', '2022-11-25 01:44:50', 172, 62, 1, 823.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(43, '864', 18, 43, 11, 49, '2022-11-24 16:49:55', '2022-11-25 04:18:40', 186, 62, 1, 942.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(44, '803', 18, 44, 5, 28, '2022-11-24 16:49:55', '2022-11-25 04:18:40', 153, 8, 0, 150.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(45, '331', 19, 45, 37, 42, '2022-11-25 02:51:34', '2022-11-25 03:52:15', 163, 121, 1, 724.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(46, '743', 19, 46, 28, 33, '2022-11-25 02:51:34', '2022-11-25 03:52:15', 150, 80, 0, 259.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(47, '634', 19, 47, 21, 41, '2022-11-25 02:51:34', '2022-11-25 03:52:15', 152, 90, 0, 126.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27'),
(48, '515', 19, 48, 43, 34, '2022-11-25 02:51:34', '2022-11-25 03:52:15', 166, 53, 1, 566.00, '2022-11-23 03:15:27', '2022-11-23 03:15:27');

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
(1, 'App\\Models\\Airline', 1, '407207a3-d302-4614-a28b-02d5ae65f36d', 'default', 'Austrian Airlines', 'austrian.jpg', 'image/jpeg', 'public', 'public', 1609, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(2, 'App\\Models\\Airline', 2, 'f81456b6-55a5-48b2-8495-04818c3a7779', 'default', 'Iraqi Airways', 'iraqi_airways.jpg', 'image/jpeg', 'public', 'public', 2245, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(3, 'App\\Models\\Airline', 3, '3a31a1ba-759e-46f8-836f-6809fe595c56', 'default', 'Royal Jordanian Airlines', 'royal_jordanian.jpg', 'image/jpeg', 'public', 'public', 1462, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(4, 'App\\Models\\Airline', 4, '9a08b4d2-0670-48d7-abfc-e0de834f59da', 'default', 'Lufthansa', 'Lufthansa-Logo2.gif', 'image/gif', 'public', 'public', 4165, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(5, 'App\\Models\\Airline', 5, '054cc0e0-9db2-471d-af73-606d36b1d7bc', 'default', 'Middle East', 'mea-logo.jpg', 'image/jpeg', 'public', 'public', 147211, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(6, 'App\\Models\\Airline', 6, 'af193449-b73b-4b75-af24-18a71570f33b', 'default', 'Fly Dubai   ', 'en-logo_flydubai.gif', 'image/gif', 'public', 'public', 1308, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(7, 'App\\Models\\Airline', 7, 'a824291a-d713-45e4-aef9-99e3ed160a9d', 'default', 'Turkish Airlines', 'Turkish-Airlines.jpg', 'image/jpeg', 'public', 'public', 764, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(8, 'App\\Models\\Airline', 8, 'aa089cb9-eaae-4b8f-afed-86a83c79461a', 'default', 'Egypt Air', 'Egypt-Air.jpg', 'image/jpeg', 'public', 'public', 4403, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(9, 'App\\Models\\Airline', 9, 'f33e3fb1-fa5c-4259-9aee-53420bc8ed4a', 'default', 'Pegasus Airlines', 'pegasus_logo.jpg', 'image/jpeg', 'public', 'public', 136958, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(10, 'App\\Models\\Airline', 10, '2874d5f4-f222-4a01-b8d7-f85fa201d329', 'default', 'Qatar Airways', 'Qatar-airways-logo.jpg', 'image/jpeg', 'public', 'public', 20568, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(11, 'App\\Models\\Airline', 11, '3d061322-fa15-41ac-b377-19ec87de0360', 'default', 'Mahan Air', 'mahan-air.png', 'image/png', 'public', 'public', 3065, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(12, 'App\\Models\\Airline', 12, 'c0a63d3d-8b91-48f1-bb9b-3c9be8560544', 'default', 'AirArabia', 'logo_airarabia.jpg', 'image/jpeg', 'public', 'public', 23120, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(13, 'App\\Models\\Airline', 13, 'faf7ff4e-3baf-4ba4-9cbf-c023f88a57c3', 'default', 'Fly Baghdad', 'baghdadd.gif', 'image/gif', 'public', 'public', 105820, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(14, 'App\\Models\\Airline', 14, 'aea8b45b-da42-48c1-9beb-be437d4f85c0', 'default', 'Cham Wings Airlines', 'cham.jpg', 'image/jpeg', 'public', 'public', 22676, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(15, 'App\\Models\\Airline', 15, '89d3bdf5-170a-4f00-99df-ab69d6c24d86', 'default', 'Ur Airline', 'ur-airline-logo.jpg', 'image/jpeg', 'public', 'public', 31044, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(16, 'App\\Models\\Airline', 16, 'b01ee7bc-2758-48d9-a4e1-2ce539f9b71d', 'default', 'SunExpress ', 'SunExpress.jpg', 'image/jpeg', 'public', 'public', 37232, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(17, 'App\\Models\\Airline', 17, '6607d749-0bbf-4cb4-a07d-3c2b181a8b45', 'default', 'Tailwind Airline', 'tailwind-airline.jpg', 'image/jpeg', 'public', 'public', 42877, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(18, 'App\\Models\\Airline', 18, '93498652-978f-4544-99f5-82c453c5ad69', 'default', 'Eurowings', 'eurowings_logo.jpg', 'image/jpeg', 'public', 'public', 2683, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(19, 'App\\Models\\Airline', 19, 'c8c6e8a9-deb5-4889-a031-63117f153ffe', 'default', 'Pouya Air', 'pouya-air.jpg', 'image/jpeg', 'public', 'public', 23970, '[]', '[]', '[]', '[]', 1, '2022-11-23 03:15:26', '2022-11-23 03:15:26');

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
(12, '2022_09_27_145710_create_tickets_table', 1),
(13, '2022_11_13_123535_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `airline_id` bigint(20) UNSIGNED NOT NULL,
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
(1, 1, 'Boeing 737-261', 'B735', 197, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(2, 1, 'Boeing 737-255', 'B739', 179, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(3, 1, 'Boeing 737-845', 'B730', 173, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(4, 2, 'Boeing 737-432', 'B732', 192, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(5, 3, 'Boeing 737-408', 'B739', 177, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(6, 4, 'Boeing 737-840', 'B737', 157, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(7, 4, 'Boeing 737-795', 'B738', 182, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(8, 4, 'Boeing 737-109', 'B733', 184, '2022-11-23 03:15:25', '2022-11-23 03:15:25'),
(9, 5, 'Boeing 737-528', 'B734', 163, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(10, 5, 'Boeing 737-548', 'B735', 198, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(11, 5, 'Boeing 737-781', 'B733', 172, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(12, 6, 'Boeing 737-890', 'B739', 178, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(13, 6, 'Boeing 737-367', 'B732', 174, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(14, 7, 'Boeing 737-195', 'B738', 167, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(15, 7, 'Boeing 737-480', 'B736', 200, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(16, 7, 'Boeing 737-324', 'B736', 170, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(17, 7, 'Boeing 737-150', 'B730', 160, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(18, 8, 'Boeing 737-189', 'B738', 190, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(19, 9, 'Boeing 737-440', 'B732', 166, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(20, 9, 'Boeing 737-464', 'B736', 197, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(21, 9, 'Boeing 737-289', 'B735', 185, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(22, 10, 'Boeing 737-730', 'B731', 150, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(23, 10, 'Boeing 737-383', 'B735', 162, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(24, 10, 'Boeing 737-672', 'B736', 191, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(25, 10, 'Boeing 737-149', 'B737', 200, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(26, 11, 'Boeing 737-893', 'B733', 151, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(27, 11, 'Boeing 737-673', 'B735', 177, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(28, 12, 'Boeing 737-114', 'B738', 179, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(29, 13, 'Boeing 737-626', 'B731', 157, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(30, 13, 'Boeing 737-644', 'B738', 195, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(31, 14, 'Boeing 737-241', 'B733', 158, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(32, 14, 'Boeing 737-718', 'B732', 150, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(33, 14, 'Boeing 737-393', 'B739', 186, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(34, 15, 'Boeing 737-587', 'B731', 184, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(35, 15, 'Boeing 737-771', 'B736', 183, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(36, 15, 'Boeing 737-719', 'B731', 191, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(37, 15, 'Boeing 737-163', 'B730', 190, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(38, 16, 'Boeing 737-207', 'B732', 164, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(39, 17, 'Boeing 737-570', 'B734', 180, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(40, 17, 'Boeing 737-577', 'B731', 168, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(41, 17, 'Boeing 737-572', 'B730', 181, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(42, 17, 'Boeing 737-201', 'B734', 172, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(43, 18, 'Boeing 737-860', 'B738', 186, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(44, 18, 'Boeing 737-352', 'B734', 153, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(45, 19, 'Boeing 737-178', 'B731', 163, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(46, 19, 'Boeing 737-612', 'B737', 150, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(47, 19, 'Boeing 737-328', 'B738', 152, '2022-11-23 03:15:26', '2022-11-23 03:15:26'),
(48, 19, 'Boeing 737-564', 'B731', 166, '2022-11-23 03:15:26', '2022-11-23 03:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `flight_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: pendding, 1: accepted, 2: canceled',
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
(1, 1, 'admin', 'admin@airline.com', '0123456789', NULL, 0, NULL, NULL, '$2y$10$zOEqvV5zc4WR5lS7iu4/6ea8U2V7q6LdurGB8vGusIEy7/4xI1SKm', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(2, 0, 'Sean Nader', 'hirthe.cameron@romaguera.com', '239-514-6218', '228 Jonathon Club\nToyville, ME 88730-9493', 0, NULL, NULL, '$2y$10$hvUXLH9SgG7JTuMxF6elh.BWh.TUl1Jmcixn6y.m92kLXqGMH8UTq', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(3, 0, 'Mr. Taylor Gusikowski', 'domenico56@marks.org', '+1-830-212-7154', '4291 Dickinson Mountain Apt. 469\nPort Reina, CO 70542', 0, NULL, NULL, '$2y$10$Mqo8dMZbPWvozVCUHs/AIO5n6KzaHVyf05Exe.78DHt0xA2sXjqm2', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(4, 0, 'Marta Klocko', 'koch.rosendo@gulgowski.info', '1-820-972-1724', '308 Waters Valleys\nBodeport, CA 79478', 0, NULL, NULL, '$2y$10$lm4OhvDbSyhEJehe7L/XWOP11V1mBUOfnsUDieKKCWkunbdB37DFK', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(5, 0, 'Susanna Franecki III', 'sporer.mohammad@yahoo.com', '(484) 310-1806', '902 Rath Lake Suite 096\nBriellefurt, SC 13688-3465', 0, NULL, NULL, '$2y$10$w5I8fPt5rBekXNPlB95MgunpcoBy9hVJKVDHKnpCBpPQcQpYCtC0W', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(6, 0, 'Nels Boyle', 'giovanna.bauch@kub.biz', '419-890-6339', '4142 Schumm Glen\nWest Aronborough, MA 21650-2458', 0, NULL, NULL, '$2y$10$Ny1XhZOQ7epuyBunW5kMvedqF6Ln/rdbL.dYfk8ExUqWy3ZDMCaai', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(7, 0, 'Merle Hayes', 'pquigley@welch.com', '(531) 793-0835', '2370 Klein Orchard\nReidbury, MN 20607-6214', 0, NULL, NULL, '$2y$10$4Kg3JvFDwvqE2J8HPJeTWOHPfYvprjfVe0VmBDjLWIsq7kz1VHAHG', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(8, 0, 'Sydnie Hane II', 'morar.markus@gmail.com', '678-689-5712', '60974 Spinka Ridge\nSimonebury, CT 54102', 0, NULL, NULL, '$2y$10$I6pPgtSceQDIa44OY7HlbuiS6Svo4Gl2Bwa8Vhq1DZ.DZtcvGHazK', NULL, '2022-11-23 03:15:22', '2022-11-23 03:15:22', NULL),
(9, 0, 'Freeda Kuhic', 'farrell.marcelino@cummerata.info', '+1.765.974.6914', '6584 Baumbach Tunnel\nSchoenville, AK 50812', 0, NULL, NULL, '$2y$10$sn8FVj/L69N1tsRnAy6LbeHfZ9XFMIWTRec1S8W6jF7XkPp1FUjGy', NULL, '2022-11-23 03:15:23', '2022-11-23 03:15:23', NULL),
(10, 0, 'Kaia Schimmel', 'maxine81@pfannerstill.com', '479.250.5008', '77629 Kuhic Light\nKonopelskiborough, OK 69216-4549', 0, NULL, NULL, '$2y$10$/Tiem3CJmPO9j6EIhCRktuvr6FTIYdbACpg/bYiHM5pU5aZZ7a2nC', NULL, '2022-11-23 03:15:23', '2022-11-23 03:15:23', NULL),
(11, 0, 'Oscar Eichmann', 'ruth23@dare.com', '+1-878-592-2860', '10057 Conn Pass\nWest Chadside, TX 14053-1955', 0, NULL, NULL, '$2y$10$5duiQz9ohm9aez3FEUDaQOCavEYwGbJrDjl9lCDzZ/EZE1VQicrjC', NULL, '2022-11-23 03:15:23', '2022-11-23 03:15:23', NULL);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  ADD CONSTRAINT `planes_airline_id_foreign` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
