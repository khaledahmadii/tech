-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 avr. 2026 à 18:16
-- Version du serveur : 11.8.6-MariaDB-log
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u381857447_tech`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-interventions_par_racc', 'a:2:{i:0;a:2:{s:8:\"racc_nom\";s:3:\"SAV\";s:5:\"total\";i:73;}i:1;a:2:{s:8:\"racc_nom\";s:3:\"PLP\";s:5:\"total\";i:2;}}', 1775849698),
('laravel-cache-interventions_this_day', 'i:0;', 1775849698),
('laravel-cache-interventions_this_month', 'i:1;', 1775849698),
('laravel-cache-interventions_this_year', 'i:612;', 1775849698),
('laravel-cache-monthly_interventions', 'a:4:{i:0;a:2:{s:4:\"mois\";s:7:\"2026-01\";s:5:\"total\";i:298;}i:1;a:2:{s:4:\"mois\";s:7:\"2026-02\";s:5:\"total\";i:149;}i:2;a:2:{s:4:\"mois\";s:7:\"2026-03\";s:5:\"total\";i:164;}i:3;a:2:{s:4:\"mois\";s:7:\"2026-04\";s:5:\"total\";i:1;}}', 1775849698),
('laravel-cache-racc', 'a:6:{i:0;a:2:{s:2:\"id\";i:1;s:3:\"nom\";s:20:\"Raccordement aérien\";}i:1;a:2:{s:2:\"id\";i:2;s:3:\"nom\";s:23:\"Raccordement en chambre\";}i:2;a:2:{s:2:\"id\";i:3;s:3:\"nom\";s:21:\"Raccordement immeuble\";}i:3;a:2:{s:2:\"id\";i:4;s:3:\"nom\";s:3:\"PLP\";}i:4;a:2:{s:2:\"id\";i:7;s:3:\"nom\";s:3:\"SAV\";}i:5;a:2:{s:2:\"id\";i:11;s:3:\"nom\";s:20:\"Raccordement Façade\";}}', 2091260774),
('laravel-cache-tech_list', 'a:16:{i:0;a:7:{s:2:\"id\";i:2;s:5:\"login\";s:8:\"Shamani3\";s:3:\"nom\";s:6:\"hamani\";s:6:\"prenom\";s:4:\"samy\";s:6:\"presta\";i:2;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:8:\"Shamani3\";}i:1;a:7:{s:2:\"id\";i:3;s:5:\"login\";s:7:\"Yharik4\";s:3:\"nom\";s:5:\"harik\";s:6:\"prenom\";s:6:\"youcef\";s:6:\"presta\";i:2;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:7:\"Yharik4\";}i:2;a:7:{s:2:\"id\";i:4;s:5:\"login\";s:5:\"rkrid\";s:3:\"nom\";s:4:\"krid\";s:6:\"prenom\";s:4:\"rabi\";s:6:\"presta\";i:2;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:5:\"rkrid\";}i:3;a:7:{s:2:\"id\";i:5;s:5:\"login\";s:9:\"kboukhris\";s:3:\"nom\";s:8:\"boukhris\";s:6:\"prenom\";s:6:\"khalil\";s:6:\"presta\";i:2;s:4:\"role\";s:7:\"salarie\";s:7:\"grillet\";s:9:\"kboukhris\";}i:4;a:7:{s:2:\"id\";i:6;s:5:\"login\";s:8:\"achaouki\";s:3:\"nom\";s:5:\"ahmed\";s:6:\"prenom\";s:6:\"chawki\";s:6:\"presta\";i:2;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:8:\"achaouki\";}i:5;a:7:{s:2:\"id\";i:7;s:5:\"login\";s:7:\"bmoussa\";s:3:\"nom\";s:10:\"ben moussa\";s:6:\"prenom\";s:5:\"bilel\";s:6:\"presta\";i:0;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:7:\"ygrairi\";}i:6;a:7:{s:2:\"id\";i:8;s:5:\"login\";s:6:\"anizar\";s:3:\"nom\";s:6:\"assadi\";s:6:\"prenom\";s:5:\"nizar\";s:6:\"presta\";i:0;s:4:\"role\";s:7:\"salarie\";s:7:\"grillet\";s:6:\"anizar\";}i:7;a:7:{s:2:\"id\";i:9;s:5:\"login\";s:5:\"admin\";s:3:\"nom\";s:8:\"yahyaoui\";s:6:\"prenom\";s:4:\"sami\";s:6:\"presta\";i:0;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:5:\"ysami\";}i:8;a:7:{s:2:\"id\";i:10;s:5:\"login\";s:5:\"admin\";s:3:\"nom\";s:7:\"meziane\";s:6:\"prenom\";s:6:\"djerdi\";s:6:\"presta\";i:0;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:8:\"mdjerdi3\";}i:9;a:7:{s:2:\"id\";i:11;s:5:\"login\";s:5:\"admin\";s:3:\"nom\";s:6:\"mayouf\";s:6:\"prenom\";s:3:\"ali\";s:6:\"presta\";i:0;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:9:\"amayoufi3\";}i:10;a:7:{s:2:\"id\";i:12;s:5:\"login\";s:10:\"rbouzelma4\";s:3:\"nom\";s:8:\"bouzelma\";s:6:\"prenom\";s:5:\"ridha\";s:6:\"presta\";i:0;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:10:\"rbouzelma4\";}i:11;a:7:{s:2:\"id\";i:13;s:5:\"login\";s:6:\"fjlidi\";s:3:\"nom\";s:5:\"jlidi\";s:6:\"prenom\";s:5:\"fateh\";s:6:\"presta\";i:0;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:6:\"ajlidi\";}i:12;a:7:{s:2:\"id\";i:14;s:5:\"login\";s:8:\"abennali\";s:3:\"nom\";s:7:\"ben ali\";s:6:\"prenom\";s:3:\"ali\";s:6:\"presta\";i:0;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:8:\"abennali\";}i:13;a:7:{s:2:\"id\";i:15;s:5:\"login\";s:8:\"asofiane\";s:3:\"nom\";s:10:\"bouazzouni\";s:6:\"prenom\";s:7:\"sofiane\";s:6:\"presta\";i:2;s:4:\"role\";s:17:\"auto-entrepreneur\";s:7:\"grillet\";s:8:\"asofiane\";}i:14;a:7:{s:2:\"id\";i:16;s:5:\"login\";s:14:\"cabdelouadaoud\";s:3:\"nom\";s:9:\"cheballah\";s:6:\"prenom\";s:13:\"abdelouadaoud\";s:6:\"presta\";i:0;s:4:\"role\";s:7:\"salarie\";s:7:\"grillet\";s:10:\"sbenguecci\";}i:15;a:7:{s:2:\"id\";i:17;s:5:\"login\";s:7:\"asidali\";s:3:\"nom\";s:11:\"amergrouche\";s:6:\"prenom\";s:6:\"sidali\";s:6:\"presta\";i:0;s:4:\"role\";s:7:\"salarie\";s:7:\"grillet\";s:7:\"asidali\";}}', 2091430049),
('laravel-cache-technicians_count', 'i:52;', 1775849698);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `id` int(11) NOT NULL,
  `technicien` int(11) NOT NULL,
  `type_rac` int(11) NOT NULL,
  `jeton` varchar(100) NOT NULL,
  `heure` varchar(11) DEFAULT NULL,
  `notre` varchar(100) NOT NULL,
  `valid` varchar(5) NOT NULL,
  `date_int` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_04_02_124204_create_sessions_table', 1),
(4, '2026_04_08_192827_tarif', 2);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`id`, `nom`) VALUES
(0, 'Aucun'),
(1, 'orange'),
(2, 'Free'),
(4, 'Bouygues');

-- --------------------------------------------------------

--
-- Structure de la table `racc`
--

CREATE TABLE `racc` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `racc`
--

INSERT INTO `racc` (`id`, `nom`) VALUES
(1, 'Raccordement aérien'),
(2, 'Raccordement en chambre'),
(3, 'Raccordement immeuble'),
(4, 'PLP'),
(7, 'SAV'),
(11, 'Raccordement Façade');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('14I4wWWmIIwSE0noMsw489J3SpyP5amj0ytZmvDT', NULL, '196.203.86.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJJWXVHcFVUelBZeER6RGszYmFrUG9KWXl3SXN6M3VCSUgzQUU5Z3RGIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776089108),
('1THNDu0zQNCc0VFLIiz0F1ZolmGdv04J1Aw0zFka', NULL, '41.226.16.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJtUXJTUjQxMHBqaWhhVGZHSFY2bFIxeEpYNVRKdnF5U0ZhcGJnQjV2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776089112),
('4PkvUygcJZFXeGd4iEa0BrNA1JzeGYO4T9dfoo2o', NULL, '2001:41d0:80a:3a00::', 'python-httpx/0.27.2', 'eyJfdG9rZW4iOiJwSUR0Vkg4d3lMZnZrZkxPS3RXY2pTQXNCdTNxVmVDZHlSanBkZGRWIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776134604),
('8OntJpRmJRTuOqDNxmkdWb5n6AHfQC3Iq9ytzH0n', NULL, '2001:bc8:50c0:316:da5e:d3ff:feea:e431', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'eyJfdG9rZW4iOiIxNm5icm5UdndMZm1uYTVBS284QVh6cnByU1E3d0tSMkJWdk8zT2pEIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaXNrYWNvbm5lY3QuZnJcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1776087693),
('AbbuwMpMkMzh0W1GhYBTD9vbIxD3UMBQhw7yT42u', NULL, '122.164.126.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'eyJfdG9rZW4iOiJjV1hoUnpvMlZMVldKNXczS1QzZXdwNUQ2cnRKZFk3MDV1SkRCNjU5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776100404),
('azYFQYbs695q31yAyMbx3iIa20g5llpybvSC3ter', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJRdXZwMGk0WUFOOWFhMlFaVnYxUVdNbzJNZUF2Q2tKc0I5cFVrbXZHIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1776101360),
('DbbBmT2QknvVsfYOB2FpsSmhkHgTZX188yfU172z', NULL, '2001:bc8:50c0:316:da5e:d3ff:feea:e431', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'eyJfdG9rZW4iOiJLRDBYTWVQdG5ubVZDYU10dFhxOUlnYjJFME1pY3pVeHhBZ0RscGoxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776087693),
('EC4PI1AFWLNQjV7UtCYff4Zd6zbCo9mSdcki5lzc', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJRSHJDa1hHb3ZOaDVySDBPWGZ1NlpMa0hCVXgwYjdid3RnZkZaMWQwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mciIsInJvdXRlIjoiZGFzaCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1776101601),
('EXaRPfj94VWWvZazkFaRyIxs4JWgeakQQmbSZDMg', NULL, '196.176.92.217', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 OPR/129.0.0.0', 'eyJfdG9rZW4iOiI0T1R2cFNDcHhZbFNoSktCWVlwV2FiMDZPQUw0UU5OdEFhYVM4cGtkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776103215),
('gxORU8neKXwmxGjqgDkhsOpoKqIxIJeQItJ8s7kC', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJRVjlTWG1TcnZRSWlHT3RoQ3U5QVozNGQ4Njk3SzN2b2N5ak9vV2tyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776098164),
('HiGXk8O1nqwGtEsft6ochEyvooUTUrDjc82tGafG', NULL, '34.16.195.8', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'eyJfdG9rZW4iOiJPUXZOVmZScjVCd0NSWlc3UjZrYU81TjhLSFpuUnUxbDdIMkN6R3ozIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaXNrYWNvbm5lY3QuZnIiLCJyb3V0ZSI6ImRhc2gifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1776103952),
('Hj7mdfWxdKbTBSibuoHwr5MucSk4IZt09DnmoEMZ', NULL, '122.164.126.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJYMWRnd2JjWnBMd2NpZUtPUUZWSFVoNXd0RXpnZWlGMGtkQjQ2R1dYIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776103860),
('hlPrl9oUIPeIbFIQV9KQ3iLaG6EFDMHu6X99SFiC', 1, '2c0f:4280:3060:484f:642a:1e42:2e5:97ca', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJXbWJvanhjbFFyR3JZSnpIVGxnUDZ3MEdRZjVkeURzOXh0VmhFZTNkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mciIsInJvdXRlIjoiZGFzaCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJ1c2VyX2lkIjoxLCJ1c2VyX2xvZ2luIjoiYWRtaW4iLCJ1c2VyX3JvbGUiOiJBZG1pbmlzdHJhdGV1ciJ9', 1776103281),
('kgxaVNFoMoVwazOv5uoSWPWqBwGvHWTNZn7DXAJc', 1, '196.203.86.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJoZFVsVkVWTUI1U3dvMDJNRHpSTHB4SHl4UFhDdGFQV3lqZUdFaE5qIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvY29tcHRlIiwicm91dGUiOiJjb21wdGUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwidXNlcl9pZCI6MSwidXNlcl9sb2dpbiI6ImFkbWluIiwidXNlcl9yb2xlIjoiQWRtaW5pc3RyYXRldXIifQ==', 1776096763),
('KqlfxuwavHXJDydiBBuIeVpVmmpkmPUZumFiHP7s', NULL, '196.176.92.217', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 OPR/129.0.0.0', 'eyJfdG9rZW4iOiJOTzREYXRhaGhBT2xVRDdNeVdNRmhmc2xoWmYwYmhMM3pVb2RTcFpjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776112028),
('LnjmfFEVICtlTfrul1MISwkq6CgU0D44qVsQhF1j', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJQZ0hUU1h2bWptT3lzemRYS0pkYVZHNEd6QnVkUktrSE1heTFEMjFyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776101355),
('m5VLusqpF7lMXIinpZnO7EzodRmItmRSw4jjQVGr', NULL, '2001:41d0:80a:3a00::', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', 'eyJfdG9rZW4iOiJSV3lCYjNMaTFYZUtZblkzRTRUODd1WHJDNG42Q1RmR0RtYm9XR0Y1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776134604),
('mfI5Gb59eUANUVVsd23VCGweHxWoAKbnzDeS1iOx', NULL, '23.27.145.10', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'eyJfdG9rZW4iOiJFaTltaDVQbTVpUUN4dDhNZkxkdmQwNlJQeXFoM1dSVkExblNnSk1vIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaXNrYWNvbm5lY3QuZnJcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1776100194),
('NLOVIyg4WbGLKr9pyLOTyVBTIokdgVlR1VqQi4h1', NULL, '2a0a:4cc0:c0:9393:242c:79ff:fef6:207d', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:109.0) Gecko/20100101 Firefox/113.0', 'eyJfdG9rZW4iOiJyc3lHS3lTSFdPQ2oyMlNrc25kNGs2MDVtdmdCdEUwVFp6dWRWSnZkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776097016),
('nUv7xtBc3WlvCzOha6GqJkdHztwbfaFAYu3yBYL7', NULL, '2001:bc8:50c0:316:da5e:d3ff:feea:e431', 'curl/7.81.0', 'eyJfdG9rZW4iOiJCd0plUDRQRG5Zbmx4YjZQbmJoaFY2SVJiM3dwajRscFlKRDB4RGJjIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1776087691),
('oaNtOdlK15U5RBMAKE6L1qDg0WGygMFLqULUxEzJ', NULL, '2001:bc8:50c0:316:da5e:d3ff:feea:e431', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'eyJfdG9rZW4iOiJkTmtlY0haNFVHTmxqaTU5SUtKVTlFNmNQc2hUVjlYWGpCVFlUcU43IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776087693),
('oJIWP9o284BLAPGste3fy3o0hqFveL0UZ0EtKysU', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJKQ3VMVEJ4YWR2R1pVaUxTVW5PZDZiWG1WamF6bWIxdjB0bFIwazg2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mciIsInJvdXRlIjoiZGFzaCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1776101354),
('OUFCQU00t4wmT6jfXDC0EHG9qHkkImQMnNFW8HWy', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJpNEFtc1RhdGl0dHgzYmVrOE9JbHNCbEZ0c0hmWTliWVR2Z3NIdFBjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mciIsInJvdXRlIjoiZGFzaCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1776101363),
('pxjX7EXQqJDFeDtQIAo2IjOVRBoFWE6cK1l1JQ9x', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJmckpGTzVvVnlBSlB4UW9qb2FibkNMemtGbVdnRDhwemk3am1VcGZ2IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1776101361),
('QEjW7XoM9xz5g8QJwh9Jn7om7EfYdthL5nfqKPEJ', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJtVm9EOWgxZjdHRXRaRHYwajlDdEExanZweDlMcTFFWTF5VmFoNDBXIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776101602),
('Qhf7lzKI2ogjHWQtyuzk1fLscfFY8YW0Zlmnv2wX', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJQUjAwS2tUSGM3U0Q2RTZZSTAxYTY3MjBLaDlDalQ0cVNsZzlZTTMwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776101607),
('qsmLbw2vAV1hKyfGpIPhpLmQrJVeZDtsmaRjlo2r', NULL, '2001:41d0:80a:3a00::', 'python-httpx/0.27.2', 'eyJfdG9rZW4iOiJFUEQ3OWQwSmNWSmY4WjA2TDVWc2tKOEZrbUtZTUgyZ1FuOERwWmxZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776134604),
('rdcinUQjsRbqMsYKpI7GHVClHjEDT5HdLe468XeE', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiI0dmVVWm1XYlNyVHdZdXAxQ0xXMmEzTWxUeWVtNkdkanZMbGp1Y0VZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776101363),
('sTPNg6TgKTO3H6UdIXZtaaL8cUTp0AzX8sgb8vxf', 1, '196.203.86.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJYNk1Pa0RJcHNSOVBqUm1FMHI5QjhKT2tDMXhzNjZNbkc1dEZ2emZkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvaW50ZXJ2Iiwicm91dGUiOiJpbnRlcnZlbnRpb24ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwidXNlcl9pZCI6MSwidXNlcl9sb2dpbiI6ImFkbWluIiwidXNlcl9yb2xlIjoiQWRtaW5pc3RyYXRldXIifQ==', 1776176743),
('TozslbLJO2Hhzv2VkEBXTYmom72WugRJ903KzsUx', NULL, '44.252.126.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0', 'eyJfdG9rZW4iOiIyVThYbDhMMVFRVWJuMDlZVURLRFBVWEZWMXhpSHRXZ2ZqWjFkalZlIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776108089),
('W0cngCaCVjkJ9fU6yu0MwKOJEXkYDJI3hV96nVUS', NULL, '34.16.195.8', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'eyJfdG9rZW4iOiJSZmFtcEk1azRnN2VqSXZQaXZudHd1RGFTclBlMmpsRjA0UkRRcjQ1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaXNrYWNvbm5lY3QuZnJcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1776103952),
('wpj5KO1M5AXlvWxLjZwHrit1pvAyy9dzh1AcgOSL', NULL, '122.164.126.53', 'curl/8.7.1', 'eyJfdG9rZW4iOiJURTV3TnhYd21HQWdkRFVKRUtIQWZIMnN1QkF4QnRuYXBhejh3YzV5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mciIsInJvdXRlIjoiZGFzaCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1776098164),
('WXOmDRbp2UJT7OwaMY0twS6wYtTRHDNdyi14mwDC', NULL, '184.72.244.125', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 'eyJfdG9rZW4iOiJveHZoU245V3M5RFBGc2NtOThZdHBnZTNvZHhleTFsaW5SaWNuUE02IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776097933),
('ZdBIYN2eKhxOcM1ajhnDdDSDRSrYokzDEhDLii8l', NULL, '51.75.141.254', 'req/v3 (https://github.com/imroc/req)', 'eyJfdG9rZW4iOiJrcTFtOVluYjNyTzNuN2RIY2RLMkc1OFBzYURaSTMyYjZrNXk0akVtIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pc2thY29ubmVjdC5mclwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776082628);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rac` int(11) NOT NULL,
  `prix_salarie` int(11) NOT NULL,
  `prix_auto` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`id`, `id_rac`, `prix_salarie`, `prix_auto`, `created_at`, `updated_at`) VALUES
(1, 1, 65, 140, NULL, '2026-04-10 17:45:03'),
(2, 2, 50, 80, NULL, NULL),
(3, 3, 30, 50, NULL, NULL),
(4, 4, 17, 30, NULL, NULL),
(5, 7, 17, 25, NULL, NULL),
(6, 11, 50, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `presta` int(11) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `grillet` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `nom`, `prenom`, `presta`, `role`, `grillet`) VALUES
(1, 'admin', '$2y$12$FI00aIl2n3d0vdM59f4Flunp/Q2eJX.lj1mxwz5pkqpUFsFKR2rnO', 'admin', 'admin', 0, 'Administrateur', NULL),
(2, 'Shamani3', '$2y$12$ie5/v2pC6j6o/GcneN0FP.sGcUKxHh70iCjnsC0UPszaHRDt38ZFW', 'hamani', 'samy', 2, 'auto-entrepreneur', 'Shamani3'),
(3, 'Yharik4', '$2y$12$eAywqaMFb0W0ErvZUd.i5OXpQJHipDPqciAEn0UJHtbNTmj6fu7Gu', 'harik', 'youcef', 2, 'auto-entrepreneur', 'Yharik4'),
(4, 'rkrid', '$2y$12$BDuEogiQysyuTJ03VpEnTuDX2dmUY/67UniiN.8MGgLTMY7UrKiia', 'krid', 'rabi', 2, 'auto-entrepreneur', 'rkrid'),
(5, 'kboukhris', '$2y$12$/Repn8ffUyvaOCZCEH.hHOKf8MB.3w2KK4Ndr/Ob7uPLwyRd2uxW6', 'boukhris', 'khalil', 2, 'salarie', 'kboukhris'),
(6, 'achaouki', '$2y$12$yv1pQc/A/Si4jOa2OGkJI.JwKT6SvLrA03Bony71wMBoPUgjuw.vK', 'ahmed', 'chawki', 2, 'auto-entrepreneur', 'achaouki'),
(7, 'bmoussa', '$2y$12$EJc/g.GYqWZMr8ypvqwg9e.iw7NKNYFbd3A1Fe4F.0hc3O2a3/Pu6', 'ben moussa', 'bilel', 0, 'auto-entrepreneur', 'ygrairi'),
(8, 'anizar', '$2y$12$hq5I7VCyNFmWL6ibSfmtJ.LJ06ecUWbJ/UbjORiOKRjTlc8cVutMa', 'assadi', 'nizar', 0, 'salarie', 'anizar'),
(9, 'admin', '$2y$12$EpDbqcSvUp.fthICC7hFTO6KS3QGg1UIPUSNyQ29BfZG8UqJeTNAm', 'yahyaoui', 'sami', 0, 'auto-entrepreneur', 'ysami'),
(10, 'admin', '$2y$12$1kVPW4VUUD5OCWfWwUms4O5teCHb4trVHZVX9vXN2heS9wFlmpLZ6', 'meziane', 'djerdi', 0, 'auto-entrepreneur', 'mdjerdi3'),
(11, 'admin', '$2y$12$vDz3pYtJknDkS8T.JL79WuO5KzjONiElD2G2n6IfTnc6eI41c8npy', 'mayouf', 'ali', 0, 'auto-entrepreneur', 'amayoufi3'),
(12, 'rbouzelma4', '$2y$12$IQoO4Z9PiF053rD4zGOwpeD864w/5.tmNDZQkqND9IGclcqhBr/iW', 'bouzelma', 'ridha', 0, 'auto-entrepreneur', 'rbouzelma4'),
(13, 'fjlidi', '$2y$12$q6SbnaDVupK4GMNKpF9TGO/E6ATbUaDepwMIkz7sa6G52NbMyZhkq', 'jlidi', 'fateh', 0, 'auto-entrepreneur', 'ajlidi'),
(14, 'abennali', '$2y$12$TZeZgwCq0VmfmI084DqAFOHpXzHpjEiEKAXZRx/O/7qAgvRhUe9yi', 'ben ali', 'ali', 0, 'auto-entrepreneur', 'abennali'),
(15, 'asofiane', '$2y$12$/Qg93xKmHbaAO1bTDFFAjO9fkApYsWD7BU8I7Pzbli82Fk6GKeksG', 'bouazzouni', 'sofiane', 2, 'auto-entrepreneur', 'asofiane'),
(16, 'cabdelouadaoud', '$2y$12$ILWdISIeanSNXRnMKpElbOx/qw73aSuedRF0RctujgViMD4rHHOBO', 'cheballah', 'abdelouadaoud', 0, 'salarie', 'sbenguecci'),
(17, 'asidali', '$2y$12$/AqJy.JAbwRmjmdGJOanLOM1ryPFzRiZltoxxSgrnlhH7eptAj2Di', 'amergrouche', 'sidali', 0, 'salarie', 'asidali');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `racc`
--
ALTER TABLE `racc`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `racc`
--
ALTER TABLE `racc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
