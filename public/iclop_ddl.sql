-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 07:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iclop_ddl`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(20) NOT NULL,
  `year_id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `year_id`, `teacher_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kelas A', NULL, NULL),
(2, 1, 1, 'Kelas B', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) NOT NULL,
  `year_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `year_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'UTS', '2022-07-26 02:05:00', '2022-07-26 02:05:00'),
(2, 1, 'UAS', '2022-08-08 09:57:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `no` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `exam_id`, `question_id`, `no`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, '2022-08-08 13:07:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year_id` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `year_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Latihan 1', 1, 'Latihan 1', '2022-07-24 17:21:00', '2022-07-24 17:21:00'),
(2, 'Latihan 2', 1, 'Ujian 1', '2022-07-26 02:02:49', '2022-07-26 02:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_questions`
--

CREATE TABLE `exercise_questions` (
  `id` bigint(20) NOT NULL,
  `exercise_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `no` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise_questions`
--

INSERT INTO `exercise_questions` (`id`, `exercise_id`, `question_id`, `no`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, NULL, NULL),
(3, 1, 2, 2, NULL, NULL),
(4, 1, 3, 3, NULL, NULL),
(5, 1, 4, 4, NULL, NULL),
(6, 1, 5, 5, NULL, NULL),
(7, 2, 6, 1, NULL, NULL),
(8, 2, 7, 2, NULL, NULL),
(9, 2, 8, 3, NULL, NULL),
(10, 2, 9, 6, NULL, NULL),
(11, 2, 10, 7, NULL, NULL),
(12, 2, 11, 8, NULL, NULL),
(13, 1, 12, 6, NULL, NULL),
(14, 1, 13, 7, NULL, NULL),
(15, 1, 14, 8, NULL, NULL),
(16, 1, 15, 9, NULL, NULL),
(17, 1, 16, 10, NULL, NULL),
(18, 1, 17, 11, NULL, NULL),
(19, 1, 18, 12, NULL, NULL),
(20, 1, 19, 13, NULL, NULL),
(21, 1, 20, 14, NULL, NULL),
(22, 1, 21, 15, NULL, NULL),
(23, 2, 22, 4, NULL, NULL),
(24, 2, 23, 5, NULL, NULL),
(25, 2, 24, 6, NULL, NULL),
(26, 2, 25, 7, NULL, NULL),
(27, 2, 26, 8, NULL, NULL),
(28, 2, 27, 9, NULL, NULL),
(29, 2, 28, 10, NULL, NULL),
(30, 2, 29, 11, NULL, NULL),
(31, 2, 30, 12, NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `dbname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `required_table` text DEFAULT NULL,
  `test_code` text DEFAULT NULL,
  `guide` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `topic`, `dbname`, `description`, `required_table`, `test_code`, `guide`, `created_at`, `updated_at`) VALUES
(1, 'MEMBUAT DATABASE my_playlist', 'CREATE Database', 'my_playlist', 'membuat database', NULL, '', 'Modul 1.pdf', NULL, NULL),
(2, 'MEMBUAT TABLE playlists', 'CREATE Table', 'my_playlist', 'tipe data', NULL, 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'playlists\', \'TABEL playlists\');\r\nRETURN NEXT has_column( \'playlists\', \'id\', \'KOLOM id\');\r\nRETURN NEXT has_column( \'playlists\', \'playlist_name\', \'KOLOM playlist_name\');\r\nRETURN NEXT col_type_is( \'playlists\', \'id\', \'integer\', \'TIPE KOLOM id\');\r\nRETURN NEXT col_type_is( \'playlists\', \'playlist_name\', \'character varying(50)\', \'TIPE KOLOM playlist_name\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name) OFFSET 1 LIMIT 5;', 'Modul 2.pdf', NULL, NULL),
(3, 'MEMBUAT TABEL artists', 'CREATE Table', 'my_playlist', 'primary key', '', 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'artists\', \'TABEL artists\');\r\nRETURN NEXT has_column( \'artists\', \'id\', \'KOLOM id\');\r\nRETURN NEXT has_column( \'artists\', \'name\', \'KOLOM name\');\r\nRETURN NEXT col_type_is( \'artists\', \'id\', \'integer\', \'TIPE KOLOM id\');\r\nRETURN NEXT col_type_is( \'artists\', \'name\', \'character varying(50)\', \'TIPE KOLOM name\');\r\nRETURN NEXT col_is_pk( \'artists\', \'id\', \'KOLOM id PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name)\r\nOFFSET 1 LIMIT 6;', 'Modul 3.pdf', '2022-08-08 08:28:57', NULL),
(4, 'MEMBUAT TABEL albums', 'CREATE Table', 'my_playlist', 'null dan not null', NULL, 'CREATE EXTENSION IF NOT EXISTS pgtap; CREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'users\', \'TABEL users\');\r\nRETURN NEXT has_column( \'users\', \'id\', \'KOLOM id\');\r\nRETURN NEXT has_column( \'users\', \'name\', \'KOLOM name\');\r\nRETURN NEXT has_column( \'users\', \'email\', \'KOLOM email\');\r\nRETURN NEXT has_column( \'users\', \'password\', \'KOLOM password\');\r\nRETURN NEXT col_type_is( \'users\', \'id\', \'integer\', \'TIPE KOLOM id\');\r\nRETURN NEXT col_type_is( \'users\', \'name\', \'character varying(50)\', \'TIPE KOLOM name\');\r\nRETURN NEXT col_type_is( \'users\', \'email\', \'character varying(50)\', \'TIPE KOLOM email\');\r\nRETURN NEXT col_not_null( \'users\', \'name\', \'KOLOM name NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'email\', \'KOLOM email adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'password\', \'KOLOM password NOT NULL\');\r\nRETURN NEXT col_is_unique( \'users\', \'email\', \'KONLOM email UNIQUE\');\r\nRETURN NEXT col_is_pk( \'users\', \'id\', \'KOLOM id PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name)\r\nOFFSET 1 LIMIT 13;', 'Modul 4.pdf', '2022-08-08 09:58:40', NULL),
(5, 'MEMBUAT TABEL playlists', 'CREATE Table', 'my_playlist', 'default', NULL, 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'playlists\', \'TABEL playlists\');\r\nRETURN NEXT has_column( \'playlists\', \'id\', \'KOLOM id\');\r\nRETURN NEXT has_column( \'playlists\', \'playlist_name\', \'KOLOM name\');\r\nRETURN NEXT col_type_is( \'playlists\', \'id\', \'integer\', \'TIPE KOLOM id\');\r\nRETURN NEXT col_type_is( \'playlists\', \'playlist_name\', \'character varying(50)\', \'TIPE KOLOM playlist_name\');\r\nRETURN NEXT col_has_default( \'playlists\', \'playlist_name\', \'KOLOM playlist_name DEFAULT\');\r\nRETURN NEXT col_default_is( \'playlists\', \'playlist_name\', \'favourite\',\'NILAI DEFAULT KOLOM playlist_name\');\r\nRETURN NEXT col_is_pk( \'playlists\', \'id\', \'KOLOM id PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name) OFFSET 1 LIMIT 8;', 'Modul 5.pdf', '2022-08-09 07:27:49', NULL),
(6, 'MEMBUAT TABEL songs', 'CREATE Table', 'my_playlist', 'unique', NULL, 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'users\', \'TABEL users\');\r\nRETURN NEXT has_column( \'users\', \'id\', \'KOLOM id\');\r\nRETURN NEXT has_column( \'users\', \'name\', \'KOLOM name\');\r\nRETURN NEXT has_column( \'users\', \'email\', \'KOLOM email\');\r\nRETURN NEXT col_type_is( \'users\', \'id\', \'integer\', \'TIPE KOLOM id\');\r\nRETURN NEXT col_type_is( \'users\', \'name\', \'character varying(50)\', \'TIPE KOLOM name\');\r\nRETURN NEXT col_type_is( \'users\', \'email\', \'character varying(50)\', \'TIPE KOLOM email\');\r\nRETURN NEXT col_not_null( \'users\', \'name\', \'KOLOM name NOT NULL\');\r\nRETURN NEXT col_is_unique( \'users\', \'email\', \'KOLOM email UNIQUE\');\r\nRETURN NEXT col_is_pk( \'users\', \'id\', \'KOLOM id PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name)\r\nOFFSET 1 LIMIT 10;', 'Modul 6.pdf', '2022-08-09 07:28:54', NULL),
(7, 'MODIFIKASI TABEL users', 'CREATE Table', 'my_playlist', 'check', 'CREATE TABLE users (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50) NOT NULL,\r\nemail VARCHAR(50)UNIQUE NOT NULL,\r\npassword VARCHAR (255) NOT NULL,\r\navatar VARCHAR (255) NOT NULL,\r\nis_admin BOOLEAN DEFAULT FALSE\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap; CREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'users\', \'Database my_playlist memiliki tabel users\');\r\nRETURN NEXT has_column( \'users\', \'id\', \'Tabel users memiliki kolom id\');\r\nRETURN NEXT has_column( \'users\', \'name\', \'Tabel users memiliki kolom name\');\r\nRETURN NEXT has_column( \'users\', \'email\', \'Tabel users memiliki kolom email\');\r\nRETURN NEXT has_column( \'users\', \'password\', \'Tabel users memiliki kolom password\');\r\nRETURN NEXT has_column( \'users\', \'is_admin\', \'Tabel users memiliki kolom is_admin\');\r\nRETURN NEXT has_column( \'users\', \'picture\', \'Tabel users memiliki kolom picture\');\r\nRETURN NEXT col_type_is( \'users\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'users\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'users\', \'email\', \'character varying(50)\', \'Tipe kolom email adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'users\', \'password\', \'character varying(255)\', \'Tipe kolom password adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'users\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_not_null( \'users\', \'name\', \'Kolom name adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'email\', \'Kolom email adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'password\', \'Kolom password NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'picture\', \'Kolom picture NOT NULL\');\r\nRETURN NEXT col_is_unique( \'users\', \'email\', \'Kolom email UNIQUE\');\r\nRETURN NEXT col_has_default( \'users\', \'is_admin\', \'Kolom is_admin DEFAULT\');\r\nRETURN NEXT col_default_is( \'users\', \'is_admin\', FALSE ,\'Nilai DEFAULT kolom is_admin adalah FALSE\');\r\nRETURN NEXT col_is_pk( \'users\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Master.pdf', '2022-08-09 07:30:08', NULL),
(8, 'MODIFIKASI TABEL artists', 'ALTER Table', 'my_playlist', 'foreign key', 'CREATE TABLE artists (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50),\r\navatar varchar(255),\r\nborn date,\r\noccupation varchar(255),\r\nyears_active varchar(50)\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'artists\', \'Database my_playlist memiliki tabel artists\');\r\nRETURN NEXT has_column( \'artists\', \'id\', \'Tabel artists memiliki kolom id\');\r\nRETURN NEXT has_column( \'artists\', \'name\', \'Tabel artists memiliki kolom name\');\r\nRETURN NEXT has_column( \'artists\', \'picture\', \'Tabel artists memiliki kolom picture\');\r\nRETURN NEXT has_column( \'artists\', \'born\', \'Tabel artists memiliki kolom born\');\r\nRETURN NEXT has_column( \'artists\', \'occupation\', \'Tabel artists memiliki kolom occupation\');\r\nRETURN NEXT has_column( \'artists\', \'years_active\', \'Tabel artists memiliki kolom years_active\');\r\nRETURN NEXT col_type_is( \'artists\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'artists\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'artists\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'artists\', \'born\', \'date\', \'Tipe kolom born adalah DATE\');\r\nRETURN NEXT col_type_is( \'artists\', \'occupation\', \'character varying(255)\', \'Tipe kolom occupation adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'artists\', \'years_active\', \'character varying(50)\', \'Tipe kolom years_active adalah VARCHAR(50)\');\r\nRETURN NEXT col_is_pk( \'artists\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', NULL, '2022-08-09 07:31:06', NULL),
(9, 'MODIFIKASI TABEL users', 'ALTER Table', 'my_playlist', 'rename table', 'CREATE TABLE users ( \r\nid serial PRIMARY KEY, \r\nname VARCHAR(50) NOT NULL, \r\nemail VARCHAR(50)UNIQUE NOT NULL, \r\npassword VARCHAR(255) NOT NULL, \r\npicture VARCHAR(255) DEFAULT \'profile.jpg\',\r\nis_admin BOOLEAN DEFAULT FALSE\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap; CREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'users\', \'Database my_playlist memiliki tabel users\');\r\nRETURN NEXT has_column( \'users\', \'id\', \'Tabel users memiliki kolom id\');\r\nRETURN NEXT has_column( \'users\', \'name\', \'Tabel users memiliki kolom name\');\r\nRETURN NEXT has_column( \'users\', \'email\', \'Tabel users memiliki kolom email\');\r\nRETURN NEXT has_column( \'users\', \'password\', \'Tabel users memiliki kolom password\');\r\nRETURN NEXT has_column( \'users\', \'picture\', \'Tabel users memiliki kolom picture\');\r\nRETURN NEXT has_column( \'users\', \'is_admin\', \'Tabel users memiliki kolom is_admin\');\r\nRETURN NEXT col_type_is( \'users\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'users\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'users\', \'email\', \'character varying(255)\', \'Tipe kolom email adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'users\', \'password\', \'character varying(255)\', \'Tipe kolom password adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'users\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_not_null( \'users\', \'name\', \'Kolom name adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'email\', \'Kolom email adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'password\', \'Kolom password NOT NULL\');\r\nRETURN NEXT col_is_unique( \'users\', \'email\', \'Kolom email UNIQUE\');\r\nRETURN NEXT col_has_default( \'users\', \'is_admin\', \'Kolom is_admin DEFAULT\');\r\nRETURN NEXT col_default_is( \'users\', \'is_admin\', FALSE ,\'Nilai DEFAULT kolom is_admin adalah FALSE\');\r\nRETURN NEXT col_is_pk( \'users\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 9.pdf', '2022-08-09 07:31:42', NULL),
(10, 'MODIFIKASI TABEL artists', 'ALTER Table', 'my_playlist', 'rename kolom', 'CREATE TABLE artists (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50),\r\npicture varchar(255),\r\nborn date,\r\noccupation varchar(255),\r\nyears_active varchar(50)\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'artists\', \'Database my_playlist memiliki tabel artists\');\r\nRETURN NEXT has_column( \'artists\', \'id\', \'Tabel artists memiliki kolom id\');\r\nRETURN NEXT has_column( \'artists\', \'name\', \'Tabel artists memiliki kolom name\');\r\nRETURN NEXT has_column( \'artists\', \'picture\', \'Tabel artists memiliki kolom picture\');\r\nRETURN NEXT has_column( \'artists\', \'born\', \'Tabel artists memiliki kolom born\');\r\nRETURN NEXT has_column( \'artists\', \'occupation\', \'Tabel artists memiliki kolom occupation\');\r\nRETURN NEXT has_column( \'artists\', \'years_active\', \'Tabel artists memiliki kolom years_active\');\r\nRETURN NEXT col_type_is( \'artists\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'artists\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'artists\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'artists\', \'born\', \'date\', \'Tipe kolom born adalah DATE\');\r\nRETURN NEXT col_type_is( \'artists\', \'occupation\', \'character varying(255)\', \'Tipe kolom occupationadalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'artists\', \'years_active\', \'character varying(50)\', \'Tipe kolom years_activeadalah VARCHAR(50)\');\r\nRETURN NEXT col_not_null( \'artists\', \'name\', \'Kolom name NOT NULL\');\r\nRETURN NEXT col_is_pk( \'artists\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 10.pdf', '2022-08-09 07:32:32', NULL),
(11, 'MODIFIKASI TABEL users', 'ALTER Table', 'my_playlist', 'tambah kolom', 'CREATE TABLE users (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50) NOT NULL,\r\nemail VARCHAR(50)UNIQUE NOT NULL,\r\npassword VARCHAR (255) NOT NULL,\r\npicture VARCHAR(255) NOT NULL,\r\nis_admin BOOLEAN DEFAULT FALSE\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap; CREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'users\', \'Database my_playlist memiliki tabel users\');\r\nRETURN NEXT has_column( \'users\', \'id\', \'Tabel users memiliki kolom id\');\r\nRETURN NEXT has_column( \'users\', \'name\', \'Tabel users memiliki kolom name\');\r\nRETURN NEXT has_column( \'users\', \'email\', \'Tabel users memiliki kolom email\');\r\nRETURN NEXT has_column( \'users\', \'password\', \'Tabel users memiliki kolom password\');\r\nRETURN NEXT has_column( \'users\', \'is_admin\', \'Tabel users memiliki kolom is_admin\');\r\nRETURN NEXT has_column( \'users\', \'picture\', \'Tabel users memiliki kolom picture\');\r\nRETURN NEXT col_type_is( \'users\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'users\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'users\', \'email\', \'character varying(50)\', \'Tipe kolom email adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'users\', \'password\', \'character varying(255)\', \'Tipe kolom password adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'users\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'users\', \'is_admin\', \'boolean\', \'Tipe kolom is_admin adalah boolean\');\r\nRETURN NEXT col_not_null( \'users\', \'name\', \'Kolom name adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'email\', \'Kolom email adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'password\', \'Kolom password NOT NULL\');\r\nRETURN NEXT col_is_null( \'users\', \'picture\', \'Kolom picture NULL\');\r\nRETURN NEXT col_is_unique( \'users\', \'email\', \'Kolom email UNIQUE\');\r\nRETURN NEXT col_has_default( \'users\', \'is_admin\', \'Kolom is_admin DEFAULT\');\r\nRETURN NEXT col_default_is( \'users\', \'is_admin\', FALSE ,\'Nilai DEFAULT kolom is_admin adalah FALSE\');\r\nRETURN NEXT col_is_pk( \'users\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 11.pdf', '2022-08-09 07:33:25', NULL),
(12, 'MODIFIKASI TABEL artists', 'ALTER Table', 'my_playlist', 'drop kolom', 'CREATE TABLE artists (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50) NOT NULL,\r\npicture varchar(255),\r\nborn date,\r\noccupation varchar(255),\r\nyears_active varchar(50)\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'artists\', \'Database my_playlist memiliki tabel artists\');\r\nRETURN NEXT has_column( \'artists\', \'id\', \'Tabel artists memiliki kolom id\');\r\nRETURN NEXT has_column( \'artists\', \'name\', \'Tabel artists memiliki kolom name\');\r\nRETURN NEXT has_column( \'artists\', \'picture\', \'Tabel artists memiliki kolom picture\');\r\nRETURN NEXT has_column( \'artists\', \'born\', \'Tabel artists memiliki kolom born\');\r\nRETURN NEXT has_column( \'artists\', \'occupation\', \'Tabel artists memiliki kolom occupation\');\r\nRETURN NEXT has_column( \'artists\', \'years_active\', \'Tabel artists memiliki kolom years_active\');\r\nRETURN NEXT col_type_is( \'artists\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'artists\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'artists\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'artists\', \'born\', \'date\', \'Tipe kolom date adalah DATE\');\r\nRETURN NEXT col_type_is( \'artists\', \'occupation\', \'character varying(255)\', \'Tipe kolom occupation adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'artists\', \'years_active\', \'character varying(50)\', \'Tipe kolom years_active adalah VARCHAR(50)\');\r\nRETURN NEXT col_has_default( \'artists\', \'occupation\', \'Kolom occupation DEFAULT\');\r\nRETURN NEXT col_default_is( \'artists\', \'occupation\',  \'SINGER\' ,\'Nilai DEFAULT kolom occupation adalah SINGER\');\r\nRETURN NEXT col_is_pk( \'artists\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 12.pdf', '2022-08-09 07:36:11', NULL),
(13, 'MODIFIKASI TABEL users', 'ALTER Table', 'my_playlist', 'ganti tipe data', 'CREATE TABLE users ( \r\nid serial PRIMARY KEY, \r\nname VARCHAR(50) NOT NULL, \r\nemail VARCHAR(50)UNIQUE NOT NULL, \r\npassword VARCHAR(255) NOT NULL, \r\npicture VARCHAR(255) NULL DEFAULT \'profile.jpg\',\r\nis_admin BOOLEAN DEFAULT FALSE\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap; CREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'users\', \'Database my_playlist memiliki tabel users\');\r\nRETURN NEXT has_column( \'users\', \'id\', \'Tabel users memiliki kolom id\');\r\nRETURN NEXT has_column( \'users\', \'name\', \'Tabel users memiliki kolom name\');\r\nRETURN NEXT has_column( \'users\', \'email\', \'Tabel users memiliki kolom email\');\r\nRETURN NEXT has_column( \'users\', \'password\', \'Tabel users memiliki kolom password\');\r\nRETURN NEXT has_column( \'users\', \'is_admin\', \'Tabel users memiliki kolom is_admin\');\r\nRETURN NEXT has_column( \'users\', \'picture\', \'Tabel users memiliki kolom picture\');\r\nRETURN NEXT col_type_is( \'users\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'users\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'users\', \'email\', \'character varying(50)\', \'Tipe kolom email adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'users\', \'password\', \'character varying(255)\', \'Tipe kolom password adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'users\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'users\', \'is_admin\', \'boolean\', \'Tipe kolom is_admin adalah boolean\');\r\nRETURN NEXT col_not_null( \'users\', \'name\', \'Kolom name adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'email\', \'Kolom email adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'users\', \'password\', \'Kolom password NOT NULL\');\r\nRETURN NEXT col_is_null( \'users\', \'picture\', \'Kolom picture NOT NULL\');\r\nRETURN NEXT col_is_unique( \'users\', \'email\', \'Kolom email UNIQUE\');\r\nRETURN NEXT col_hasnt_default( \'users\', \'is_admin\', \'Kolom picture tidak memiliki nilai DEFAULT\');\r\nRETURN NEXT col_is_pk( \'users\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 13.pdf', '2022-08-09 07:37:09', NULL),
(14, 'MODIFIKASI TABEL artists', 'ALTER Table', 'my_playlist', 'ganti panjang data', 'CREATE TABLE artists (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50),\r\npicture varchar(255),\r\nborn date,\r\noccupation varchar(255) DEFAULT \'SINGER\',\r\nyears_active varchar(50)\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'artists\', \'Database my_playlist memiliki tabel artists\');\r\nRETURN NEXT has_column( \'artists\', \'id\', \'Tabel artists memiliki kolom id\');\r\nRETURN NEXT has_column( \'artists\', \'name\', \'Tabel artists memiliki kolom name\');\r\nRETURN NEXT has_column( \'artists\', \'picture\', \'Tabel artists memiliki kolom picture\');\r\nRETURN NEXT has_column( \'artists\', \'born\', \'Tabel artists memiliki kolom born\');\r\nRETURN NEXT has_column( \'artists\', \'occupation\', \'Tabel artists memiliki kolom occupation\');\r\nRETURN NEXT col_type_is( \'artists\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'artists\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'artists\', \'picture\', \'character varying(255)\', \'Tipe kolom picture adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'artists\', \'born\', \'date\', \'Tipe kolom born adalah DATE\');\r\nRETURN NEXT col_type_is( \'artists\', \'occupation\', \'character varying(255)\', \'Tipe kolom occupation adalah VARCHAR(255)\');\r\nRETURN NEXT col_has_default( \'artists\', \'occupation\', \'Kolom occupation DEFAULT\');\r\nRETURN NEXT col_default_is( \'artists\', \'occupation\', \'SINGER\' ,\'Nilai DEFAULT kolom occupation adalah SINGER\');\r\nRETURN NEXT hasnt_column(\'artists\', \'years_active\', \'Tabel artists tidak memiliki kolom years_active\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 14.pdf', '2022-08-09 07:38:21', NULL),
(15, 'MODIFIKASI TABEL albums', 'ALTER Table', 'my_playlist', 'menambah primary key', 'CREATE TABLE artists (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50),\r\navatar varchar(255),\r\nborn date,\r\noccupation varchar(255),\r\nyears_active varchar(50)\r\n);\r\nCREATE TABLE albums ( \r\nid serial PRIMARY KEY, \r\nartist_id integer, \r\nname VARCHAR(50) NOT NULL,\r\ncover VARCHAR(255) NULL,\r\nreleased date NOT NULL, \r\nlabel varchar(255) NOT NULL\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap; CREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'albums\', \'Database my_playlist memiliki tabel albums\');\r\nRETURN NEXT has_column( \'albums\', \'id\', \'Tabel albums memiliki kolom id\');\r\nRETURN NEXT has_column( \'albums\', \'artist_id\', \'Tabel albums memiliki kolom artist_id\');\r\nRETURN NEXT has_column( \'albums\', \'name\', \'Tabel albums memiliki kolom name\');\r\nRETURN NEXT has_column( \'albums\', \'cover\', \'Tabel albums memiliki kolom cover\');\r\nRETURN NEXT has_column( \'albums\', \'released\', \'Tabel albums memiliki kolom released\');\r\nRETURN NEXT has_column( \'albums\', \'label\', \'Tabel albums memiliki kolom id\');\r\nRETURN NEXT col_type_is( \'albums\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'albums\', \'artist_id\', \'integer\', \'Tipe kolom artist_id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'albums\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'albums\', \'cover\', \'character varying(255)\', \'Tipe kolom cover adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'albums\', \'released\', \'date\', \'Tipe kolom released adalah date\');\r\nRETURN NEXT col_type_is( \'albums\', \'label\', \'character varying(255)\', \'Tipe kolom label adalah VARCHAR(255)\');\r\nRETURN NEXT col_is_pk( \'albums\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nRETURN NEXT col_not_null( \'albums\', \'name\', \'Kolom name adalah NOT NULL\');\r\nRETURN NEXT col_is_null( \'albums\', \'cover\', \'Kolom cover adalah NULL\');\r\nRETURN NEXT col_not_null( \'albums\', \'released\', \'Kolom released adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'albums\', \'label\', \'Kolom label adalah NOT NULL\');\r\nRETURN NEXT fk_ok( \'albums\', \'artist_id\', \'artists\', \'id\', \'Kolom artists_id adalah FOREIGN KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 15.pdf', '2022-08-09 07:39:51', NULL),
(16, 'MODIFIKASI TABEL albums', 'ALTER Table', 'my_playlist', 'menghapus primary key', 'CREATE TABLE artists (\r\nid serial PRIMARY KEY,\r\nname VARCHAR(50),\r\navatar varchar(255),\r\nborn date,\r\noccupation varchar(255),\r\nyears_active varchar(50)\r\n);\r\nCREATE TABLE albums ( \r\nid serial PRIMARY KEY, \r\nartist_id integer, \r\nname VARCHAR(50) NOT NULL,\r\ncover VARCHAR(255) NULL,\r\nreleased date NOT NULL, \r\nlabel varchar(255) NOT NULL,\r\n   CONSTRAINT fk_album_artist\r\n      FOREIGN KEY(artist_id) \r\n	  REFERENCES artists(id)\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap; CREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT has_table( \'albums\', \'Database my_playlist memiliki tabel albums\');\r\nRETURN NEXT has_column( \'albums\', \'id\', \'Tabel albums memiliki kolom id\');\r\nRETURN NEXT has_column( \'albums\', \'artist_id\', \'Tabel albums memiliki kolom artist_id\');\r\nRETURN NEXT has_column( \'albums\', \'name\', \'Tabel albums memiliki kolom name\');\r\nRETURN NEXT has_column( \'albums\', \'cover\', \'Tabel albums memiliki kolom cover\');\r\nRETURN NEXT has_column( \'albums\', \'released\', \'Tabel albums memiliki kolom released\');\r\nRETURN NEXT has_column( \'albums\', \'label\', \'Tabel albums memiliki kolom label\');\r\nRETURN NEXT col_type_is( \'albums\', \'id\', \'integer\', \'Tipe kolom id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'albums\', \'artist_id\', \'integer\', \'Tipe kolom artist_id adalah INTEGER\');\r\nRETURN NEXT col_type_is( \'albums\', \'name\', \'character varying(50)\', \'Tipe kolom name adalah VARCHAR(50)\');\r\nRETURN NEXT col_type_is( \'albums\', \'cover\', \'character varying(255)\', \'Tipe kolom cover adalah VARCHAR(255)\');\r\nRETURN NEXT col_type_is( \'albums\', \'released\', \'date\', \'Tipe kolom released adalah date\');\r\nRETURN NEXT col_type_is( \'albums\', \'label\', \'character varying(255)\', \'Tipe kolom label adalah VARCHAR(255)\');\r\nRETURN NEXT col_is_pk( \'albums\', \'id\', \'Kolom id adalah PRIMARY KEY\');\r\nRETURN NEXT col_not_null( \'albums\', \'name\', \'Kolom name adalah NOT NULL\');\r\nRETURN NEXT col_is_null( \'albums\', \'cover\', \'Kolom cover adalah NULL\');\r\nRETURN NEXT col_not_null( \'albums\', \'released\', \'Kolom released adalah NOT NULL\');\r\nRETURN NEXT col_not_null( \'albums\', \'label\', \'Kolom label adalah NOT NULL\');\r\nRETURN NEXT hasnt_fk( \'albums\', \'Tabel albums tidak memiliki FOREIGN KEY\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 16.pdf', '2022-08-09 07:40:55', NULL),
(17, 'MENGHAPUS TABEL playlists', 'DROP Table', 'my_playlist', 'menambah not null', 'CREATE Table playlists(\r\nid serial primary key,\r\nplaylist_name varchar(50)\r\n);', 'CREATE EXTENSION IF NOT EXISTS pgtap;\r\nCREATE OR REPLACE FUNCTION public.testschema()\r\nRETURNS SETOF TEXT LANGUAGE plpgsql AS $$\r\nBEGIN\r\nRETURN NEXT hasnt_table( \'playlists\', \'Database my_playlists tidak memiliki tabel playlists\');\r\nEND;\r\n$$;\r\nSELECT * FROM runtests(\'public\'::name);', 'Modul 17.pdf', '2022-08-09 07:42:13', NULL),
(18, 'MENGHAPUS DATABASE my_playlist', 'DROP Database', 'my_playlist', 'menghapus not null', NULL, NULL, 'Modul 18.pdf', '2022-08-09 07:43:08', NULL),
(19, 'menambah default', 'menambah default', 'menambah default', 'menambah default', NULL, NULL, 'Modul 19.pdf', NULL, NULL),
(20, 'mengganti nilai default', 'mengganti nilai default', 'mengganti nilai default', 'mengganti nilai default', NULL, NULL, 'Modul 20.pdf', NULL, NULL),
(21, 'menghapus default', 'menghapus default', 'menghapus default', 'menghapus default', NULL, NULL, 'Modul 21.pdf', NULL, NULL),
(22, 'menambah unique', 'menambah unique', 'menambah unique', 'menambah unique', NULL, NULL, 'Modul 22.pdf', NULL, NULL),
(23, 'menghapus unique', 'menghapus unique', 'menghapus unique', 'menghapus unique', NULL, NULL, 'Modul 23.pdf', NULL, NULL),
(24, 'menambah check', 'menambah check', 'menambah check', 'menambah check', NULL, NULL, 'Modul 24.pdf', NULL, NULL),
(25, 'mengganti check', 'mengganti check', 'mengganti check', 'mengganti check', NULL, NULL, 'Modul 25.pdf', NULL, NULL),
(26, 'menghapus check', 'menghapus check', 'menghapus check', 'menghapus check', NULL, NULL, NULL, NULL, NULL),
(27, 'menambah fk', 'menambah fk', 'menambah fk', 'menambah fk', NULL, NULL, NULL, NULL, NULL),
(28, 'menghapus fk', 'menghapus fk', 'menghapus fk', 'menghapus fk', NULL, NULL, NULL, NULL, NULL),
(29, 'drop table', 'drop table', 'drop table', 'drop table', NULL, NULL, NULL, NULL, NULL),
(30, 'drop database', 'drop database', 'drop database', 'drop database', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-08-07 01:50:53', '2022-08-07 01:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `solution` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `student_id`, `question_id`, `status`, `solution`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Passed', 'CREATE Table playlists(\nid serial primary key,\nplaylist_name varchar(255)\n);', '2022-08-07 06:20:21', '2022-08-07 06:28:19'),
(2, 2, 2, 'Passed', 'create database my_playlist;', '2022-08-07 09:35:03', '2022-08-07 11:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `year_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `year_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tugas 1', 'tugas 1', '2022-07-26 01:50:46', '2022-07-26 01:50:46'),
(2, 1, 'Tugas 2', 'tugas 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_questions`
--

CREATE TABLE `task_questions` (
  `id` bigint(20) NOT NULL,
  `task_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `no` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_questions`
--

INSERT INTO `task_questions` (`id`, `task_id`, `question_id`, `no`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2022-08-08 08:42:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dwi Puspitasari', 'teacher@mail.com', 'teacher', NULL, '$2y$10$4LDdR4/nSzcQqcVIR8uO1uI9vlSK5AlMtcWi/n6QPMPg55TVgGNcK', NULL, '2022-07-20 07:07:59', '2022-07-20 07:07:59'),
(2, 'Fajar Pandu', 'student@mail.com', 'student', NULL, '$2y$10$rcf/4itdpWVV4GSkZVKaw.6Hwlc.JhXnErEyuZ/FlCSHHi0lV4YM6', NULL, '2022-07-20 08:42:30', '2022-07-20 08:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ganjil 2021/2022', '2022-07-01', '2022-07-31', 'aktif', '2022-07-23 08:49:24', '2022-07-23 08:49:24'),
(2, 'Genap 2021/2022', '2022-07-01', '2022-07-29', 'aktif', '2022-07-23 08:57:51', '2022-07-23 08:57:51'),
(3, 'Piper Gilmore', '1977-01-24', '1989-07-27', 'Et magna est id vel', '2022-07-23 08:58:34', '2022-07-23 08:58:34'),
(4, 'Lamar Joyce', '2008-06-25', '2016-11-13', 'Anim magna deserunt', '2022-07-23 09:00:06', '2022-07-23 09:00:06'),
(5, 'Judith Foster', '1986-11-07', '2004-01-27', 'Ratione repudiandae', '2022-07-23 09:00:22', '2022-07-23 09:00:22'),
(6, 'Kerry Grimes', '1996-10-05', '1994-08-07', 'Quod soluta et duis', '2022-07-23 09:00:44', '2022-07-23 09:00:44'),
(7, 'Irma Nixon', '1974-06-22', '1995-08-08', 'Odit magna aperiam n', '2022-07-23 16:37:36', '2022-07-23 16:37:36'),
(8, 'Gabriel Bird', '1983-06-04', '1980-01-07', 'Nonaktif', '2022-07-23 16:39:08', '2022-07-23 16:39:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_questions`
--
ALTER TABLE `exercise_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_questions`
--
ALTER TABLE `task_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exercise_questions`
--
ALTER TABLE `exercise_questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_questions`
--
ALTER TABLE `task_questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
