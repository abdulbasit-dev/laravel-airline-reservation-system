-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 05:38 PM
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
(1, 'Austrian Airlines', 'OS', '2022-11-08 03:45:31', '2022-11-08 03:45:31'),
(2, 'Iraqi Airways', 'IA', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(3, 'Royal Jordanian Airlines', 'RJ', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(4, 'Lufthansa', 'LH', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(5, 'Middle East', 'ME', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(6, 'Fly Dubai   ', 'FZ', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(7, 'Turkish Airlines', 'TK', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(8, 'Egypt Air', 'MS', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(9, 'Pegasus Airlines', 'PC', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(10, 'Qatar Airways', 'QR ', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(11, 'Mahan Air', 'W5', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(12, 'AirArabia', 'G9', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(13, 'Fly Baghdad', 'IF', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(14, 'Cham Wings Airlines', 'SAW', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(15, 'Ur Airline', 'UD', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(16, 'SunExpress ', 'XQ ', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(17, 'Tailwind Airline', 'TI', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(18, 'Eurowings', 'EW ', '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(19, 'Pouya Air', 'PY ', '2022-11-08 03:45:32', '2022-11-08 03:45:32');

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
(1, 1, 'Erbil Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(2, 2, 'Amman Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(3, 3, 'Antalya Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(4, 4, 'Athens Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(5, 5, 'Baghdad Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(6, 6, 'Bahrain Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(7, 7, 'Basra Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(8, 8, 'Beirut Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(9, 9, 'Damascus Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(10, 10, 'Dubai Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(11, 11, 'Dusseldorf Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(12, 12, 'Eindhoven Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(13, 13, 'Frankfurt Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(14, 14, 'Gothenburg Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(15, 15, 'Istanbul Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(16, 16, 'Jeddah Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(17, 17, 'London Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(18, 18, 'Malmo Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(19, 19, 'Manchester Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(20, 20, 'Munich Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(21, 21, 'Najaf Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(22, 22, 'Oslo Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(23, 23, 'Stockholm Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(24, 24, 'Tehran Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(25, 25, 'Vienna Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(26, 26, 'Orumiyeh Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(27, 27, 'Abu Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(28, 28, 'Amsterdam Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(29, 29, 'Copenhagen Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(30, 30, 'Sulaimany Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(31, 31, 'Madina Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(32, 32, 'Larnaca Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(33, 33, 'Cairo Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(34, 34, 'Ankara Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(35, 35, 'Antalya Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(36, 36, 'Doha Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(37, 37, 'sharjah Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(38, 38, 'Tbilisi Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(39, 39, 'Batumi Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(40, 40, 'Adana Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(41, 41, 'Tunis Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(42, 42, 'Berlin Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(43, 43, 'Yerevan Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(44, 44, 'Adana Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(45, 45, 'Stuttgart Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(46, 46, 'Baku Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(47, 47, 'Diyarbakir Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(48, 48, 'Gaziantep Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(49, 49, 'Minsk Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(50, 50, 'Nasiriyah Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(51, 51, 'Istanbul Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(52, 52, 'Kiev Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(53, 53, 'Nuremberg Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(54, 54, 'Odessa Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(55, 55, 'Birmingham Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(56, 56, 'Amsterdam Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(57, 57, 'Rotterdam Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(58, 58, 'Cologne Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(59, 59, 'Trabzon Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(60, 60, 'Mugla Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(61, 61, 'Madrid Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(62, 62, 'Bucharest Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(63, 63, 'Prague Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(64, 64, 'Hanover Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(65, 65, 'Aleppo Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(66, 66, 'Urmia Airport', '2022-11-08 03:45:33', '2022-11-08 03:45:33');

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
(1, NULL, 'Erbil', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(2, NULL, 'Amman', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(3, NULL, 'Antalya', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(4, NULL, 'Athens', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(5, NULL, 'Baghdad', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(6, NULL, 'Bahrain', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(7, NULL, 'Basra', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(8, NULL, 'Beirut', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(9, NULL, 'Damascus', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(10, NULL, 'Dubai', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(11, NULL, 'Dusseldorf', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(12, NULL, 'Eindhoven', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(13, NULL, 'Frankfurt', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(14, NULL, 'Gothenburg', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(15, NULL, 'Istanbul', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(16, NULL, 'Jeddah', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(17, NULL, 'London', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(18, NULL, 'Malmo', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(19, NULL, 'Manchester', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(20, NULL, 'Munich', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(21, NULL, 'Najaf', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(22, NULL, 'Oslo', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(23, NULL, 'Stockholm', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(24, NULL, 'Tehran', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(25, NULL, 'Vienna', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(26, NULL, 'Orumiyeh', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(27, NULL, 'Abu', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(28, NULL, 'Amsterdam', '2022-11-08 03:45:32', '2022-11-08 03:45:32', NULL),
(29, NULL, 'Copenhagen', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(30, NULL, 'Sulaimany', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(31, NULL, 'Madina', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(32, NULL, 'Larnaca', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(33, NULL, 'Cairo', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(34, NULL, 'Ankara', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(35, NULL, 'Antalya', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(36, NULL, 'Doha', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(37, NULL, 'sharjah', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(38, NULL, 'Tbilisi', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(39, NULL, 'Batumi', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(40, NULL, 'Adana', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(41, NULL, 'Tunis', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(42, NULL, 'Berlin', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(43, NULL, 'Yerevan', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(44, NULL, 'Adana', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(45, NULL, 'Stuttgart', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(46, NULL, 'Baku', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(47, NULL, 'Diyarbakir', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(48, NULL, 'Gaziantep', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(49, NULL, 'Minsk', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(50, NULL, 'Nasiriyah', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(51, NULL, 'Istanbul', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(52, NULL, 'Kiev', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(53, NULL, 'Nuremberg', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(54, NULL, 'Odessa', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(55, NULL, 'Birmingham', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(56, NULL, 'Amsterdam', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(57, NULL, 'Rotterdam', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(58, NULL, 'Cologne', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(59, NULL, 'Trabzon', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(60, NULL, 'Mugla', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(61, NULL, 'Madrid', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(62, NULL, 'Bucharest', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(63, NULL, 'Prague', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(64, NULL, 'Hanover', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(65, NULL, 'Aleppo', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL),
(66, NULL, 'Urmia', '2022-11-08 03:45:33', '2022-11-08 03:45:33', NULL);

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
(1, '460', 1, 1, 19, 19, '2022-11-08 22:01:24', '2022-11-09 19:21:21', 193, 126, 1, 919.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(2, '124', 1, 2, 7, 28, '2022-11-08 22:01:24', '2022-11-09 19:21:21', 159, 152, 0, 830.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(3, '669', 1, 3, 2, 22, '2022-11-08 22:01:24', '2022-11-09 19:21:21', 176, 6, 0, 992.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(4, '371', 2, 4, 7, 31, '2022-11-09 18:42:03', '2022-11-10 01:57:22', 177, 64, 1, 874.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(5, '858', 2, 5, 47, 26, '2022-11-09 18:42:03', '2022-11-10 01:57:22', 175, 162, 0, 499.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(6, '732', 3, 6, 42, 54, '2022-11-08 11:29:30', '2022-11-08 12:40:41', 156, 57, 0, 466.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(7, '624', 4, 7, 64, 62, '2022-11-09 08:12:04', '2022-11-10 01:23:03', 190, 139, 0, 743.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(8, '431', 5, 8, 52, 22, '2022-11-08 09:47:50', '2022-11-08 15:33:15', 158, 133, 1, 527.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(9, '743', 5, 9, 19, 2, '2022-11-08 09:47:50', '2022-11-08 15:33:15', 175, 71, 1, 126.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(10, '905', 6, 10, 17, 35, '2022-11-08 12:28:12', '2022-11-09 06:54:08', 181, 146, 1, 988.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(11, '543', 7, 11, 5, 40, '2022-11-08 16:43:08', '2022-11-09 06:06:19', 192, 58, 0, 449.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(12, '565', 7, 12, 21, 36, '2022-11-08 16:43:08', '2022-11-09 06:06:19', 189, 172, 0, 707.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(13, '132', 8, 13, 7, 29, '2022-11-10 02:11:02', '2022-11-10 03:25:21', 183, 126, 1, 823.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(14, '710', 9, 14, 28, 62, '2022-11-08 14:30:20', '2022-11-09 05:47:41', 193, 193, 1, 293.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(15, '143', 9, 15, 17, 8, '2022-11-08 14:30:20', '2022-11-09 05:47:41', 180, 16, 0, 318.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(16, '689', 9, 16, 1, 26, '2022-11-08 14:30:20', '2022-11-09 05:47:41', 154, 1, 0, 701.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(17, '160', 10, 17, 30, 20, '2022-11-08 07:50:39', '2022-11-08 20:24:38', 170, 7, 0, 869.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(18, '981', 10, 18, 4, 5, '2022-11-08 07:50:39', '2022-11-08 20:24:38', 152, 54, 1, 635.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(19, '195', 10, 19, 31, 3, '2022-11-08 07:50:39', '2022-11-08 20:24:38', 180, 109, 0, 789.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(20, '924', 11, 20, 22, 46, '2022-11-09 20:19:15', '2022-11-09 23:30:33', 151, 74, 1, 126.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(21, '276', 11, 21, 16, 10, '2022-11-09 20:19:15', '2022-11-09 23:30:33', 153, 13, 1, 625.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(22, '180', 12, 22, 16, 56, '2022-11-09 09:55:34', '2022-11-09 12:38:00', 182, 25, 0, 117.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(23, '573', 12, 23, 34, 17, '2022-11-09 09:55:34', '2022-11-09 12:38:00', 181, 13, 1, 628.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(24, '929', 13, 24, 56, 8, '2022-11-09 17:50:48', '2022-11-10 04:00:07', 166, 108, 1, 345.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(25, '110', 13, 25, 35, 3, '2022-11-09 17:50:48', '2022-11-10 04:00:07', 182, 97, 0, 385.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(26, '473', 14, 26, 58, 7, '2022-11-09 09:58:02', '2022-11-09 12:30:43', 176, 150, 0, 527.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(27, '219', 15, 27, 32, 61, '2022-11-08 15:34:38', '2022-11-09 12:52:37', 192, 167, 1, 574.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(28, '687', 15, 28, 47, 29, '2022-11-08 15:34:38', '2022-11-09 12:52:37', 183, 12, 0, 622.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(29, '958', 15, 29, 49, 17, '2022-11-08 15:34:38', '2022-11-09 12:52:37', 194, 22, 0, 224.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(30, '595', 15, 30, 66, 46, '2022-11-08 15:34:38', '2022-11-09 12:52:37', 179, 167, 1, 345.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(31, '342', 16, 31, 31, 40, '2022-11-09 01:59:46', '2022-11-09 21:52:01', 178, 168, 0, 644.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(32, '647', 16, 32, 60, 49, '2022-11-09 01:59:46', '2022-11-09 21:52:01', 180, 133, 1, 454.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(33, '609', 16, 33, 48, 20, '2022-11-09 01:59:46', '2022-11-09 21:52:01', 154, 144, 0, 966.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(34, '955', 17, 34, 61, 40, '2022-11-08 12:37:20', '2022-11-10 04:36:24', 195, 154, 0, 816.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(35, '358', 17, 35, 11, 3, '2022-11-08 12:37:20', '2022-11-10 04:36:24', 176, 28, 1, 732.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(36, '592', 17, 36, 28, 53, '2022-11-08 12:37:20', '2022-11-10 04:36:24', 164, 69, 1, 586.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(37, '278', 18, 37, 5, 6, '2022-11-09 07:43:11', '2022-11-09 23:31:06', 196, 87, 1, 888.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(38, '172', 18, 38, 15, 55, '2022-11-09 07:43:11', '2022-11-09 23:31:06', 191, 61, 1, 429.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(39, '982', 18, 39, 53, 7, '2022-11-09 07:43:11', '2022-11-09 23:31:06', 184, 12, 1, 837.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(40, '845', 18, 40, 41, 1, '2022-11-09 07:43:11', '2022-11-09 23:31:06', 189, 124, 1, 624.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33'),
(41, '666', 19, 41, 21, 20, '2022-11-09 06:02:48', '2022-11-09 13:03:49', 190, 182, 0, 436.00, '2022-11-08 03:45:33', '2022-11-08 03:45:33');

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
(1, 'App\\Models\\Airline', 1, '94817b63-ec42-4985-9ec7-62123a0c0978', 'default', 'Austrian Airlines', 'austrian.jpg', 'image/jpeg', 'public', 'public', 1609, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(2, 'App\\Models\\Airline', 2, '5399bbb7-6de4-404f-b8ee-4ff4347c343c', 'default', 'Iraqi Airways', 'iraqi_airways.jpg', 'image/jpeg', 'public', 'public', 2245, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(3, 'App\\Models\\Airline', 3, '3686fce0-d367-4661-9ef3-500815bf2c93', 'default', 'Royal Jordanian Airlines', 'royal_jordanian.jpg', 'image/jpeg', 'public', 'public', 1462, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(4, 'App\\Models\\Airline', 4, 'bfbea324-24af-4e09-a236-af64024b64cf', 'default', 'Lufthansa', 'Lufthansa-Logo2.gif', 'image/gif', 'public', 'public', 4165, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(5, 'App\\Models\\Airline', 5, '7f151783-4839-4665-8a57-e5d32910b813', 'default', 'Middle East', 'mea-logo.jpg', 'image/jpeg', 'public', 'public', 147211, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(6, 'App\\Models\\Airline', 6, '1e8f7863-7bd5-41c7-8faf-11d6b22335e1', 'default', 'Fly Dubai   ', 'en-logo_flydubai.gif', 'image/gif', 'public', 'public', 1308, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(7, 'App\\Models\\Airline', 7, '948987a8-22c3-4655-96cb-fbb0b9bc95f8', 'default', 'Turkish Airlines', 'Turkish-Airlines.jpg', 'image/jpeg', 'public', 'public', 764, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(8, 'App\\Models\\Airline', 8, 'b155811b-2617-4dbd-a989-6843a0f87180', 'default', 'Egypt Air', 'Egypt-Air.jpg', 'image/jpeg', 'public', 'public', 4403, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(9, 'App\\Models\\Airline', 9, 'b1d7569b-8ff1-4fef-adbf-9c2416e54642', 'default', 'Pegasus Airlines', 'pegasus_logo.jpg', 'image/jpeg', 'public', 'public', 136958, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(10, 'App\\Models\\Airline', 10, 'f48ac8ae-eea7-40c2-97e9-06f4574f2239', 'default', 'Qatar Airways', 'Qatar-airways-logo.jpg', 'image/jpeg', 'public', 'public', 20568, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(11, 'App\\Models\\Airline', 11, '421a3074-3839-46e2-adfe-52b003368f08', 'default', 'Mahan Air', 'mahan-air.png', 'image/png', 'public', 'public', 3065, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(12, 'App\\Models\\Airline', 12, 'c3eb84af-2b7e-426d-ba62-4bc92c4b04b3', 'default', 'AirArabia', 'logo_airarabia.jpg', 'image/jpeg', 'public', 'public', 23120, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(13, 'App\\Models\\Airline', 13, 'd1c044e2-03ce-418c-96c5-93bb197b1e4c', 'default', 'Fly Baghdad', 'baghdadd.gif', 'image/gif', 'public', 'public', 105820, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(14, 'App\\Models\\Airline', 14, '33a3e9a6-d73f-4e9c-bd7d-9dc28491847b', 'default', 'Cham Wings Airlines', 'cham.jpg', 'image/jpeg', 'public', 'public', 22676, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(15, 'App\\Models\\Airline', 15, '92f04578-1ad4-4a80-a780-bfd700d8bce1', 'default', 'Ur Airline', 'ur-airline-logo.jpg', 'image/jpeg', 'public', 'public', 31044, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(16, 'App\\Models\\Airline', 16, '3628137b-8330-434f-8d7d-370b56a47c75', 'default', 'SunExpress ', 'SunExpress.jpg', 'image/jpeg', 'public', 'public', 37232, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(17, 'App\\Models\\Airline', 17, '1edf3037-51f4-4758-88dd-1230f81e14a8', 'default', 'Tailwind Airline', 'tailwind-airline.jpg', 'image/jpeg', 'public', 'public', 42877, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(18, 'App\\Models\\Airline', 18, '9acf51e3-0aa6-4ede-a3b7-030d767ec744', 'default', 'Eurowings', 'eurowings_logo.jpg', 'image/jpeg', 'public', 'public', 2683, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(19, 'App\\Models\\Airline', 19, 'd57c0263-19f7-4dd3-bab8-14a110e7f6c0', 'default', 'Pouya Air', 'pouya-air.jpg', 'image/jpeg', 'public', 'public', 23970, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(20, 'App\\Models\\User', 13, '8c40e6af-560b-4d3e-9594-03634bb164df', 'default', 'Amy Poole', '6369d181c32ea_IMG_4522.JPG', 'image/jpeg', 'public', 'public', 493774, '[]', '[]', '[]', '[]', 1, '2022-11-08 03:48:20', '2022-11-08 03:48:20');

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
(1, 1, 'Boeing 737-342', 'B736', 193, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(2, 1, 'Boeing 737-650', 'B734', 159, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(3, 1, 'Boeing 737-193', 'B739', 176, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(4, 2, 'Boeing 737-659', 'B730', 177, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(5, 2, 'Boeing 737-627', 'B739', 175, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(6, 3, 'Boeing 737-447', 'B739', 156, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(7, 4, 'Boeing 737-885', 'B734', 190, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(8, 5, 'Boeing 737-380', 'B735', 158, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(9, 5, 'Boeing 737-257', 'B738', 175, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(10, 6, 'Boeing 737-727', 'B731', 181, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(11, 7, 'Boeing 737-240', 'B734', 192, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(12, 7, 'Boeing 737-363', 'B731', 189, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(13, 8, 'Boeing 737-144', 'B731', 183, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(14, 9, 'Boeing 737-247', 'B736', 193, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(15, 9, 'Boeing 737-712', 'B732', 180, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(16, 9, 'Boeing 737-449', 'B735', 154, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(17, 10, 'Boeing 737-574', 'B731', 170, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(18, 10, 'Boeing 737-275', 'B735', 152, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(19, 10, 'Boeing 737-500', 'B731', 180, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(20, 11, 'Boeing 737-806', 'B734', 151, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(21, 11, 'Boeing 737-666', 'B730', 153, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(22, 12, 'Boeing 737-406', 'B737', 182, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(23, 12, 'Boeing 737-423', 'B734', 181, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(24, 13, 'Boeing 737-662', 'B730', 166, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(25, 13, 'Boeing 737-185', 'B736', 182, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(26, 14, 'Boeing 737-548', 'B730', 176, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(27, 15, 'Boeing 737-627', 'B732', 192, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(28, 15, 'Boeing 737-758', 'B737', 183, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(29, 15, 'Boeing 737-494', 'B738', 194, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(30, 15, 'Boeing 737-287', 'B736', 179, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(31, 16, 'Boeing 737-329', 'B730', 178, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(32, 16, 'Boeing 737-397', 'B737', 180, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(33, 16, 'Boeing 737-615', 'B730', 154, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(34, 17, 'Boeing 737-531', 'B730', 195, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(35, 17, 'Boeing 737-743', 'B732', 176, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(36, 17, 'Boeing 737-738', 'B734', 164, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(37, 18, 'Boeing 737-193', 'B739', 196, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(38, 18, 'Boeing 737-406', 'B730', 191, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(39, 18, 'Boeing 737-657', 'B736', 184, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(40, 18, 'Boeing 737-254', 'B739', 189, '2022-11-08 03:45:32', '2022-11-08 03:45:32'),
(41, 19, 'Boeing 737-493', 'B734', 190, '2022-11-08 03:45:32', '2022-11-08 03:45:32');

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
(1, 1, 'admin', 'admin@airline.com', '0123456789', NULL, 0, NULL, NULL, '$2y$10$zX5lVj.JVz6.9vCj6aOmfuy4SS.roAOzv0Tp/tumZ5RTVNqJOq4Ii', NULL, '2022-11-08 03:45:30', '2022-11-08 03:45:30', NULL),
(2, 1, 'Lilyan Hermiston', 'allison38@yahoo.com', '956-701-3969', '8803 Kris Extensions\nNorth Macburgh, UT 79731-3340', 0, NULL, NULL, '$2y$10$A2EcbIVKC3Hq1PoN1ZJN0uMSPMWrALARMn8Ayc6zBaPP9K01000em', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(3, 1, 'Heaven Fadel', 'tiara12@zemlak.com', '(847) 994-0880', '9076 Daugherty Road Suite 299\nEast Cassidy, WA 99179-6575', 0, NULL, NULL, '$2y$10$zYG2p35I1P1a8Zpch/wcBuZmWragkzl7mvqRVfmy0Bio7BTO7qabO', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(4, 0, 'Morgan Balistreri', 'pmraz@johns.net', '+1 (816) 530-3543', '77818 Pearline Path Suite 039\nWestonbury, WY 62280', 0, NULL, NULL, '$2y$10$80MWOCuZQrlByNu5qRPPZODIV8cUFWYSFx8VfvFRSe3TxtYJb0PQG', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(5, 1, 'Mrs. Anabelle Kunze', 'harrison.bradtke@yahoo.com', '947-665-1232', '9701 Mozelle Light Apt. 784\nSouth Maximohaven, TN 58668', 0, NULL, NULL, '$2y$10$otIO1kgPdlQOupR2kD4mauJdvaHUi9SCnnulCTUFW2bIt0iES8O2i', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(6, 0, 'Miss Sarai Daniel III', 'blanda.breanna@yahoo.com', '352.822.5663', '4420 Talia Junctions Suite 644\nNorth Rhea, CO 60338-6236', 0, NULL, NULL, '$2y$10$O4LnsbKqw3q42qG4Gn0dPuMGA5DwfF/wAyxxbeVOLgCRn4gRDteXS', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(7, 1, 'Dr. Drew Cruickshank II', 'keenan.hodkiewicz@hotmail.com', '(570) 430-5071', '7694 Cartwright Bypass Suite 143\nBuckridgeton, PA 95389-4967', 0, NULL, NULL, '$2y$10$.s0eNCXOZyOq1gaNysKlZuupjT84.a4FyAWopZ.pGow./B5wzCZU2', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(8, 1, 'Miss Erica Pfannerstill', 'dawn.gaylord@jaskolski.info', '318.805.6940', '522 Parker Parkways\nWest Clotildeborough, WI 36788-7560', 0, NULL, NULL, '$2y$10$pSdq/XxZESDmbu1l9hpnHOVG2OKOPJ4E70P2jfq91V9k3HoFbEaGi', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(9, 0, 'Elisha Swaniawski', 'trenton.rohan@hotmail.com', '+1-843-473-3537', '22170 Abagail Meadows\nRaufurt, ND 95452', 0, NULL, NULL, '$2y$10$txa5fWYWfF6D6QFIqcl/eeyN1DSdoz0uw.67Wzk.OEw8v/xcTDCN.', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(10, 1, 'Celia Leffler', 'callie.koepp@gmail.com', '+1 (408) 587-9573', '592 Genesis Stream Apt. 082\nWest Jayden, MT 71058-8749', 0, NULL, NULL, '$2y$10$b8cM7wsS3t60pntTjFNKP.sLhyAQhUhRLnvdmKPG5a96cDQ/rrsta', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(11, 1, 'Queenie Leannon', 'ruecker.norberto@osinski.net', '+1 (424) 424-6701', '125 Berge Forge\nRatkeburgh, HI 01739', 0, NULL, NULL, '$2y$10$BPuSDK3ojG7s1WRm5bquReRYHx63Oy3oXbI8t2ukqMNW89gpxmaim', NULL, '2022-11-08 03:45:31', '2022-11-08 03:45:31', NULL),
(12, 0, 'Willa Miranda', 'wuqihimacy@mailinator.com', '+1 (946) 258-8839', 'Sed molestias in ame', 0, NULL, NULL, '$2y$10$oixj8C/O9UiQA99jGzC3mOZsvWvrWN5PVtftLa23uRC2BI2V/kbFW', NULL, '2022-11-08 03:46:32', '2022-11-08 03:46:32', NULL),
(13, 0, 'sara', 'pazyvywes@mailinator.com', '+1 (442) 957-2647', 'Voluptatum sint aper', 0, NULL, NULL, '$2y$10$hcOUtsIp7Yu4RpDM3ci1vOx9KvP3diexUscBBIMZ6S6IaXYgt2x16', NULL, '2022-11-08 03:47:41', '2022-11-08 03:51:15', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
