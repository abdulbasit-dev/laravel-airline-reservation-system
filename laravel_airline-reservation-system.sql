-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 08:39 AM
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
(1, 'Austrian Airlines', 'OS', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(2, 'Iraqi Airways', 'IA', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(3, 'Royal Jordanian Airlines', 'RJ', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(4, 'Lufthansa', 'LH', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(5, 'Middle East', 'ME', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(6, 'Fly Dubai   ', 'FZ', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(7, 'Turkish Airlines', 'TK', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(8, 'Egypt Air', 'MS', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(9, 'Pegasus Airlines', 'PC', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(10, 'Qatar Airways', 'QR ', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(11, 'Mahan Air', 'W5', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(12, 'AirArabia', 'G9', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(13, 'Fly Baghdad', 'IF', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(14, 'Cham Wings Airlines', 'SAW', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(15, 'Ur Airline', 'UD', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(16, 'SunExpress ', 'XQ ', '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(17, 'Tailwind Airline', 'TI', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(18, 'Eurowings', 'EW ', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(19, 'Pouya Air', 'PY ', '2022-10-24 06:38:44', '2022-10-24 06:38:44');

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
(1, 1, 'Erbil Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(2, 2, 'Amman Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(3, 3, 'Antalya Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(4, 4, 'Athens Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(5, 5, 'Baghdad Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(6, 6, 'Bahrain Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(7, 7, 'Basra Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(8, 8, 'Beirut Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(9, 9, 'Damascus Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(10, 10, 'Dubai Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(11, 11, 'Dusseldorf Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(12, 12, 'Eindhoven Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(13, 13, 'Frankfurt Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(14, 14, 'Gothenburg Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(15, 15, 'Istanbul Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(16, 16, 'Jeddah Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(17, 17, 'London Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(18, 18, 'Malmo Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(19, 19, 'Manchester Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(20, 20, 'Munich Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(21, 21, 'Najaf Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(22, 22, 'Oslo Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(23, 23, 'Stockholm Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(24, 24, 'Tehran Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(25, 25, 'Vienna Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(26, 26, 'Orumiyeh Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(27, 27, 'Abu Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(28, 28, 'Amsterdam Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(29, 29, 'Copenhagen Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(30, 30, 'Sulaimany Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(31, 31, 'Madina Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(32, 32, 'Larnaca Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(33, 33, 'Cairo Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(34, 34, 'Ankara Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(35, 35, 'Antalya Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(36, 36, 'Doha Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(37, 37, 'sharjah Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(38, 38, 'Tbilisi Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(39, 39, 'Batumi Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(40, 40, 'Adana Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(41, 41, 'Tunis Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(42, 42, 'Berlin Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(43, 43, 'Yerevan Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(44, 44, 'Adana Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(45, 45, 'Stuttgart Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(46, 46, 'Baku Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(47, 47, 'Diyarbakir Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(48, 48, 'Gaziantep Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(49, 49, 'Minsk Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(50, 50, 'Nasiriyah Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(51, 51, 'Istanbul Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(52, 52, 'Kiev Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(53, 53, 'Nuremberg Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(54, 54, 'Odessa Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(55, 55, 'Birmingham Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(56, 56, 'Amsterdam Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(57, 57, 'Rotterdam Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(58, 58, 'Cologne Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(59, 59, 'Trabzon Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(60, 60, 'Mugla Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(61, 61, 'Madrid Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(62, 62, 'Bucharest Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(63, 63, 'Prague Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(64, 64, 'Hanover Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(65, 65, 'Aleppo Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(66, 66, 'Urmia Airport', '2022-10-24 06:38:44', '2022-10-24 06:38:44');

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
(1, NULL, 'Erbil', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(2, NULL, 'Amman', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(3, NULL, 'Antalya', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(4, NULL, 'Athens', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(5, NULL, 'Baghdad', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(6, NULL, 'Bahrain', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(7, NULL, 'Basra', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(8, NULL, 'Beirut', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(9, NULL, 'Damascus', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(10, NULL, 'Dubai', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(11, NULL, 'Dusseldorf', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(12, NULL, 'Eindhoven', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(13, NULL, 'Frankfurt', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(14, NULL, 'Gothenburg', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(15, NULL, 'Istanbul', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(16, NULL, 'Jeddah', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(17, NULL, 'London', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(18, NULL, 'Malmo', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(19, NULL, 'Manchester', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(20, NULL, 'Munich', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(21, NULL, 'Najaf', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(22, NULL, 'Oslo', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(23, NULL, 'Stockholm', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(24, NULL, 'Tehran', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(25, NULL, 'Vienna', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(26, NULL, 'Orumiyeh', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(27, NULL, 'Abu', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(28, NULL, 'Amsterdam', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(29, NULL, 'Copenhagen', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(30, NULL, 'Sulaimany', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(31, NULL, 'Madina', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(32, NULL, 'Larnaca', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(33, NULL, 'Cairo', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(34, NULL, 'Ankara', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(35, NULL, 'Antalya', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(36, NULL, 'Doha', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(37, NULL, 'sharjah', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(38, NULL, 'Tbilisi', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(39, NULL, 'Batumi', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(40, NULL, 'Adana', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(41, NULL, 'Tunis', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(42, NULL, 'Berlin', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(43, NULL, 'Yerevan', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(44, NULL, 'Adana', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(45, NULL, 'Stuttgart', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(46, NULL, 'Baku', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(47, NULL, 'Diyarbakir', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(48, NULL, 'Gaziantep', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(49, NULL, 'Minsk', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(50, NULL, 'Nasiriyah', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(51, NULL, 'Istanbul', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(52, NULL, 'Kiev', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(53, NULL, 'Nuremberg', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(54, NULL, 'Odessa', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(55, NULL, 'Birmingham', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(56, NULL, 'Amsterdam', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(57, NULL, 'Rotterdam', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(58, NULL, 'Cologne', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(59, NULL, 'Trabzon', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(60, NULL, 'Mugla', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(61, NULL, 'Madrid', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(62, NULL, 'Bucharest', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(63, NULL, 'Prague', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(64, NULL, 'Hanover', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(65, NULL, 'Aleppo', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL),
(66, NULL, 'Urmia', '2022-10-24 06:38:44', '2022-10-24 06:38:44', NULL);

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
(1, '922', 1, 1, 20, 7, '2022-10-26 05:04:17', '2022-10-30 17:31:56', 167, 23, 1, 324.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(2, '259', 1, 2, 35, 36, '2022-10-31 01:42:00', '2022-10-25 13:22:20', 174, 146, 0, 258.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(3, '790', 1, 3, 52, 33, '2022-10-27 05:45:56', '2022-10-30 08:08:28', 189, 84, 0, 826.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(4, '843', 2, 4, 8, 5, '2022-10-26 19:32:07', '2022-10-25 04:43:08', 185, 180, 1, 673.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(5, '875', 2, 5, 40, 42, '2022-10-25 07:21:33', '2022-10-29 09:31:03', 199, 193, 0, 986.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(6, '285', 3, 6, 61, 23, '2022-10-27 08:31:47', '2022-10-31 00:01:43', 189, 2, 0, 984.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(7, '643', 3, 7, 51, 23, '2022-10-27 09:02:43', '2022-10-26 01:21:17', 162, 138, 0, 417.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(8, '801', 3, 8, 42, 45, '2022-10-31 00:06:37', '2022-10-30 20:31:26', 170, 58, 0, 430.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(9, '200', 4, 9, 3, 9, '2022-10-27 04:13:10', '2022-10-29 21:29:02', 194, 126, 0, 809.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(10, '352', 4, 10, 6, 40, '2022-10-27 20:39:17', '2022-10-29 04:09:05', 180, 133, 0, 139.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(11, '357', 4, 11, 1, 8, '2022-10-27 06:40:04', '2022-10-27 07:02:36', 183, 132, 1, 786.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(12, '195', 5, 12, 37, 41, '2022-10-24 21:05:17', '2022-10-28 03:24:35', 171, 144, 0, 353.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(13, '810', 5, 13, 5, 23, '2022-10-30 21:46:51', '2022-10-28 02:59:11', 196, 54, 1, 126.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(14, '822', 5, 14, 65, 9, '2022-10-26 05:11:45', '2022-10-25 08:38:47', 189, 32, 1, 784.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(15, '705', 6, 15, 66, 2, '2022-10-31 03:55:44', '2022-10-26 15:48:48', 192, 160, 0, 493.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(16, '350', 7, 16, 35, 55, '2022-10-25 16:50:17', '2022-10-26 02:59:17', 153, 116, 1, 408.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(17, '984', 7, 17, 26, 57, '2022-10-25 06:54:30', '2022-10-25 10:34:57', 198, 84, 1, 172.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(18, '570', 7, 18, 10, 25, '2022-10-26 11:21:24', '2022-10-31 06:05:33', 164, 162, 1, 636.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(19, '359', 7, 19, 47, 25, '2022-10-30 04:23:11', '2022-10-28 21:03:16', 196, 44, 1, 471.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(20, '172', 8, 20, 48, 4, '2022-10-31 07:19:50', '2022-10-29 03:45:24', 156, 126, 1, 164.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(21, '927', 8, 21, 55, 38, '2022-10-27 15:08:57', '2022-10-30 07:34:25', 176, 41, 0, 815.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(22, '537', 9, 22, 47, 41, '2022-10-30 12:01:44', '2022-10-30 20:19:52', 160, 3, 1, 133.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(23, '944', 9, 23, 47, 5, '2022-10-28 15:19:54', '2022-10-30 06:23:57', 195, 177, 0, 268.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(24, '325', 9, 24, 2, 63, '2022-10-28 13:46:36', '2022-10-30 22:16:16', 152, 120, 0, 912.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(25, '431', 9, 25, 12, 17, '2022-10-26 08:05:19', '2022-10-29 12:54:12', 187, 61, 1, 381.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(26, '115', 10, 26, 65, 56, '2022-10-25 09:33:59', '2022-10-27 04:16:32', 150, 46, 1, 256.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(27, '584', 10, 27, 23, 62, '2022-10-24 22:42:32', '2022-10-27 14:32:35', 190, 166, 1, 385.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(28, '520', 11, 28, 3, 12, '2022-10-24 12:32:14', '2022-10-25 22:40:18', 197, 105, 0, 750.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(29, '235', 11, 29, 9, 65, '2022-10-29 20:26:32', '2022-10-25 03:50:50', 162, 68, 1, 621.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(30, '432', 12, 30, 51, 40, '2022-10-29 11:50:06', '2022-10-29 16:52:21', 195, 44, 1, 843.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(31, '387', 12, 31, 17, 26, '2022-10-31 00:32:39', '2022-10-29 20:52:03', 162, 161, 0, 231.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(32, '784', 13, 32, 33, 56, '2022-10-28 13:00:15', '2022-10-29 06:32:24', 180, 4, 1, 342.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(33, '229', 13, 33, 10, 17, '2022-10-26 21:56:53', '2022-10-25 16:54:56', 200, 57, 1, 146.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(34, '427', 13, 34, 21, 33, '2022-10-24 14:55:49', '2022-10-30 11:37:07', 187, 67, 0, 408.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(35, '305', 14, 35, 61, 19, '2022-10-29 18:19:37', '2022-10-25 17:08:55', 195, 30, 0, 112.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(36, '815', 15, 36, 39, 22, '2022-10-27 10:20:34', '2022-10-25 04:52:19', 189, 58, 0, 575.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(37, '430', 15, 37, 59, 2, '2022-10-29 07:08:59', '2022-10-27 11:42:31', 162, 55, 1, 102.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(38, '564', 15, 38, 23, 40, '2022-10-30 10:56:39', '2022-10-30 13:09:43', 172, 166, 1, 903.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(39, '281', 16, 39, 41, 43, '2022-10-30 06:31:31', '2022-10-29 06:13:21', 183, 142, 0, 654.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(40, '751', 16, 40, 19, 36, '2022-10-26 16:01:32', '2022-10-31 04:52:15', 156, 86, 1, 452.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(41, '587', 16, 41, 50, 25, '2022-10-28 17:05:19', '2022-10-25 15:33:16', 151, 16, 0, 631.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(42, '198', 16, 42, 19, 61, '2022-10-24 13:57:29', '2022-10-30 01:07:14', 164, 140, 1, 960.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(43, '612', 17, 43, 38, 54, '2022-10-27 00:39:13', '2022-10-29 20:14:48', 150, 1, 0, 421.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(44, '238', 17, 44, 60, 6, '2022-10-24 17:35:29', '2022-10-28 09:26:17', 151, 74, 1, 727.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(45, '764', 18, 45, 50, 57, '2022-10-29 16:21:58', '2022-10-30 05:36:38', 150, 69, 1, 240.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(46, '957', 18, 46, 58, 18, '2022-10-29 21:11:39', '2022-10-31 05:38:10', 191, 32, 0, 204.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(47, '105', 18, 47, 52, 41, '2022-10-26 09:24:47', '2022-10-25 12:11:01', 193, 82, 0, 271.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(48, '890', 19, 48, 52, 58, '2022-10-26 17:06:33', '2022-10-29 19:51:02', 193, 123, 1, 288.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(49, '547', 19, 49, 16, 46, '2022-10-28 11:56:53', '2022-10-27 17:07:11', 150, 58, 0, 939.00, '2022-10-24 06:38:44', '2022-10-24 06:38:44');

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
(1, 'App\\Models\\Airline', 1, '4ae6e479-b99f-4871-b063-ca63e280f1a7', 'default', 'Austrian Airlines', 'austrian.jpg', 'image/jpeg', 'public', 'public', 1609, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(2, 'App\\Models\\Airline', 2, '4077d591-b62d-4c17-888f-cff52413b8a1', 'default', 'Iraqi Airways', 'iraqi_airways.jpg', 'image/jpeg', 'public', 'public', 2245, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(3, 'App\\Models\\Airline', 3, '9aa3fd88-d139-4c7e-aec3-f8676fb22ee4', 'default', 'Royal Jordanian Airlines', 'royal_jordanian.jpg', 'image/jpeg', 'public', 'public', 1462, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(4, 'App\\Models\\Airline', 4, 'dbbbca4f-8f49-41b5-b3c4-7607c9f6dd6a', 'default', 'Lufthansa', 'Lufthansa-Logo2.gif', 'image/gif', 'public', 'public', 4165, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(5, 'App\\Models\\Airline', 5, '49d94e70-8986-458b-9725-db1f3c76a060', 'default', 'Middle East', 'mea-logo.jpg', 'image/jpeg', 'public', 'public', 147211, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(6, 'App\\Models\\Airline', 6, '1ed667fb-79bf-4a81-93fb-25bbe8e33d6c', 'default', 'Fly Dubai   ', 'en-logo_flydubai.gif', 'image/gif', 'public', 'public', 1308, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(7, 'App\\Models\\Airline', 7, '6319e28c-3964-4b32-be9b-846857d89393', 'default', 'Turkish Airlines', 'Turkish-Airlines.jpg', 'image/jpeg', 'public', 'public', 764, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(8, 'App\\Models\\Airline', 8, '90392532-f120-4a09-8033-f0511532fa10', 'default', 'Egypt Air', 'Egypt-Air.jpg', 'image/jpeg', 'public', 'public', 4403, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(9, 'App\\Models\\Airline', 9, 'a13c1fdc-ee1f-469f-923c-a9e8263ac292', 'default', 'Pegasus Airlines', 'pegasus_logo.jpg', 'image/jpeg', 'public', 'public', 136958, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(10, 'App\\Models\\Airline', 10, '226bd2ac-9ea6-4730-96b9-6982e98cf1e4', 'default', 'Qatar Airways', 'Qatar-airways-logo.jpg', 'image/jpeg', 'public', 'public', 20568, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(11, 'App\\Models\\Airline', 11, 'b22ad758-7b29-4249-b3e3-ab48f4a94fb2', 'default', 'Mahan Air', 'mahan-air.png', 'image/png', 'public', 'public', 3065, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(12, 'App\\Models\\Airline', 12, '08c3cd35-f8cb-4d3c-92b8-8771c93c9a2a', 'default', 'AirArabia', 'logo_airarabia.jpg', 'image/jpeg', 'public', 'public', 23120, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(13, 'App\\Models\\Airline', 13, 'e24c72c5-1d9b-4499-a732-8ed70a26b65c', 'default', 'Fly Baghdad', 'baghdadd.gif', 'image/gif', 'public', 'public', 105820, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(14, 'App\\Models\\Airline', 14, 'dbdb70e0-c511-48ee-b81b-f296d06573a9', 'default', 'Cham Wings Airlines', 'cham.jpg', 'image/jpeg', 'public', 'public', 22676, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(15, 'App\\Models\\Airline', 15, 'cebf44e7-c0ac-4f84-b9c3-0ca5924bce00', 'default', 'Ur Airline', 'ur-airline-logo.jpg', 'image/jpeg', 'public', 'public', 31044, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(16, 'App\\Models\\Airline', 16, '1a8ffaaf-18dd-4ae1-8074-b4175dad98f6', 'default', 'SunExpress ', 'SunExpress.jpg', 'image/jpeg', 'public', 'public', 37232, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(17, 'App\\Models\\Airline', 17, '672884fe-027e-4526-a20d-df7eb7bce0ff', 'default', 'Tailwind Airline', 'tailwind-airline.jpg', 'image/jpeg', 'public', 'public', 42877, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(18, 'App\\Models\\Airline', 18, '55f001bb-be5d-4fdb-ae86-e50576fe9e7b', 'default', 'Eurowings', 'eurowings_logo.jpg', 'image/jpeg', 'public', 'public', 2683, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(19, 'App\\Models\\Airline', 19, 'afc5046e-6f8c-4508-8567-5022f2ae2d5b', 'default', 'Pouya Air', 'pouya-air.jpg', 'image/jpeg', 'public', 'public', 23970, '[]', '[]', '[]', '[]', 1, '2022-10-24 06:38:44', '2022-10-24 06:38:44');

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
(1, 1, 'Boeing 737-771', 'B733', 167, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(2, 1, 'Boeing 737-860', 'B730', 174, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(3, 1, 'Boeing 737-235', 'B733', 189, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(4, 2, 'Boeing 737-698', 'B732', 185, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(5, 2, 'Boeing 737-470', 'B732', 199, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(6, 3, 'Boeing 737-873', 'B735', 189, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(7, 3, 'Boeing 737-648', 'B739', 162, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(8, 3, 'Boeing 737-694', 'B730', 170, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(9, 4, 'Boeing 737-330', 'B737', 194, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(10, 4, 'Boeing 737-234', 'B732', 180, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(11, 4, 'Boeing 737-359', 'B731', 183, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(12, 5, 'Boeing 737-339', 'B739', 171, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(13, 5, 'Boeing 737-115', 'B736', 196, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(14, 5, 'Boeing 737-664', 'B739', 189, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(15, 6, 'Boeing 737-296', 'B736', 192, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(16, 7, 'Boeing 737-796', 'B734', 153, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(17, 7, 'Boeing 737-182', 'B733', 198, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(18, 7, 'Boeing 737-121', 'B737', 164, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(19, 7, 'Boeing 737-340', 'B734', 196, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(20, 8, 'Boeing 737-404', 'B735', 156, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(21, 8, 'Boeing 737-177', 'B733', 176, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(22, 9, 'Boeing 737-612', 'B734', 160, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(23, 9, 'Boeing 737-345', 'B739', 195, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(24, 9, 'Boeing 737-632', 'B739', 152, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(25, 9, 'Boeing 737-814', 'B731', 187, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(26, 10, 'Boeing 737-890', 'B734', 150, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(27, 10, 'Boeing 737-125', 'B738', 190, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(28, 11, 'Boeing 737-615', 'B733', 197, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(29, 11, 'Boeing 737-463', 'B732', 162, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(30, 12, 'Boeing 737-893', 'B735', 195, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(31, 12, 'Boeing 737-111', 'B733', 162, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(32, 13, 'Boeing 737-512', 'B738', 180, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(33, 13, 'Boeing 737-338', 'B738', 200, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(34, 13, 'Boeing 737-217', 'B732', 187, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(35, 14, 'Boeing 737-180', 'B739', 195, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(36, 15, 'Boeing 737-181', 'B736', 189, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(37, 15, 'Boeing 737-718', 'B738', 162, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(38, 15, 'Boeing 737-295', 'B736', 172, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(39, 16, 'Boeing 737-894', 'B732', 183, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(40, 16, 'Boeing 737-715', 'B736', 156, '2022-10-24 06:38:43', '2022-10-24 06:38:43'),
(41, 16, 'Boeing 737-892', 'B730', 151, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(42, 16, 'Boeing 737-826', 'B739', 164, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(43, 17, 'Boeing 737-199', 'B734', 150, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(44, 17, 'Boeing 737-190', 'B735', 151, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(45, 18, 'Boeing 737-711', 'B733', 150, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(46, 18, 'Boeing 737-328', 'B737', 191, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(47, 18, 'Boeing 737-388', 'B730', 193, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(48, 19, 'Boeing 737-517', 'B738', 193, '2022-10-24 06:38:44', '2022-10-24 06:38:44'),
(49, 19, 'Boeing 737-846', 'B739', 150, '2022-10-24 06:38:44', '2022-10-24 06:38:44');

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
(1, 1, 'admin', 'admin@airline.com', '0123456789', NULL, 0, NULL, NULL, '$2y$10$J/aNDC7tIX/SYlFZI7zoruL6f6gtD6mDsktZCdhc8WN1FvsUORgze', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(2, 1, 'Angie Kertzmann', 'theresia.kreiger@collins.com', '636.209.0161', '6189 Wava Harbor Apt. 630\nGustaveside, DE 17223-3096', 0, NULL, NULL, '$2y$10$QVEptRrkMW7ta7E8qFb7y.6h.CQAyhphaBpoPKJ0iyZF77CHJPtda', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(3, 1, 'Glenna Waters', 'cornelius.hodkiewicz@gmail.com', '440-359-0578', '92937 Malcolm Plains\nLake Candelario, UT 95137-0293', 0, NULL, NULL, '$2y$10$ndUmR45lTsOCbApyQ9WLDuiVAPDTQjdLehtL2PBYd.1NHwYjHUwGa', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(4, 1, 'Euna Harber', 'edison.howe@hotmail.com', '1-281-656-0398', '2545 Wendy Mount\nYoshikotown, MO 24404', 0, NULL, NULL, '$2y$10$IbI21MtlteQbwXaYbVvu1.V2FrxL.XB460Iwv1gvDC9dJ6SgNSeXe', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(5, 0, 'Mr. Remington Kohler', 'obahringer@gmail.com', '+1.681.444.0826', '239 Blanche Shoals Suite 412\nPort Florencioland, SD 59282-8798', 0, NULL, NULL, '$2y$10$f6YtFTMgWQ.6i6cGQpuAxOO6fqGgCbWiug1aMaV29EA7shwaaldRq', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(6, 1, 'Maritza Collier', 'elijah16@mosciski.biz', '+1-531-623-8141', '2966 Von Key Apt. 951\nBartonmouth, TX 94573', 0, NULL, NULL, '$2y$10$x4o29I3OROrUnYYupi/8letkBqEQT3lSxszpYqOtlVfYytAVUHCJi', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(7, 0, 'Macey Miller', 'lparker@quitzon.com', '(828) 581-9596', '9052 Rollin Greens Apt. 982\nAmaliaberg, FL 06999-1971', 0, NULL, NULL, '$2y$10$lHdYk//ekA5naiz7Y8m/vOUe.AqRNBOTvhLMm/mDq2D1ZKT34acj6', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(8, 1, 'Otho Kreiger', 'abernier@yahoo.com', '847-254-5576', '64133 Alejandra Mount\nNellieview, ME 21865-0489', 0, NULL, NULL, '$2y$10$c0ju/zAzHbCJtTAyTDsQvuhKCKNHWvBgmt/RIV2.YCBxC2ynOE1DG', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(9, 0, 'Mr. Antonio Weber', 'bauch.natalie@hudson.biz', '(334) 451-4815', '4329 Howell Mountain\nDeclanchester, WA 91718-0512', 0, NULL, NULL, '$2y$10$.VoyGgbYvwW1F1pZxdWvw.5pnkdTbrZSbh2K1ZjBgKiWLTlZbHntG', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(10, 1, 'Katharina Cole', 'brooklyn.padberg@collins.com', '570.319.0149', '72504 Beer Mission\nAriellefurt, SC 79002-3446', 0, NULL, NULL, '$2y$10$ZyFGixSNqWBPAFyPfkd5UutzkmSRXE04fMw8dWapxjRevaWfa4lN.', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL),
(11, 1, 'Prof. Talia Senger I', 'wsanford@gmail.com', '+1.410.641.7527', '54098 Thiel Square Suite 281\nNorth Jerodton, NC 15628', 0, NULL, NULL, '$2y$10$fMNBDgF2jjFOYc86bMf.jOz.9tMPnNssKnEm76DKldC7x.yGHEqw6', NULL, '2022-10-24 06:38:43', '2022-10-24 06:38:43', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
