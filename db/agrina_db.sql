-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 04:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrina_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-Active,2-Pending,3-Delete,4-Removed',
  `date` varchar(55) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `district_id`, `name`, `status`, `date`, `created_at`, `updated_at`) VALUES
(3, 27, 'Amour', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(4, 27, 'Baisa', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(5, 27, 'Baisi', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(6, 27, 'Banmankhi', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(7, 27, 'Barahara Kothi', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(8, 27, 'Bhawanipur', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(9, 27, 'Dagarua', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(10, 27, 'Dhamdaha', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(11, 27, 'Jalalgarh', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(12, 27, 'Kasba', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(13, 27, 'Krityanand Nagar', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(14, 27, 'Purnia Purw', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(15, 27, 'Rupauli ', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(16, 27, 'Srinagar', 1, '12-02-2021', '2022-05-12 09:24:03', NULL),
(17, 7, 'Agiaon', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(18, 7, 'Arrah', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(19, 7, 'Barhara', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(20, 7, 'Bihiyan', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(21, 7, 'Charpokhari', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(22, 7, 'Garhani', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(23, 7, 'Jagdishpur', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(24, 7, 'Koilwar', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(25, 7, 'Piro', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(26, 7, 'Sahar', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(27, 7, 'Sandesh', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(28, 7, 'Shahpur', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(29, 7, 'Tarari', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(30, 7, 'Udwantnagar', 1, '15-02-2021', '2022-05-12 09:24:03', NULL),
(32, 1, 'Araria', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(33, 1, 'Bhargama ', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(34, 1, 'Forbesganj', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(35, 1, 'Jokihat', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(36, 1, 'Kursakanta', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(37, 1, 'Narpatganj', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(38, 1, 'Palasi', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(39, 1, 'Raniganj', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(40, 1, 'Sikti', 1, '20-02-2021', '2022-05-12 09:24:03', NULL),
(41, 15, 'Amdabad', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(42, 15, 'Azamnagar', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(43, 15, 'Balrampur ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(44, 15, 'Barari ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(45, 15, 'Barsoi ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(46, 15, 'Dandkhora ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(47, 15, 'Falka ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(48, 15, 'Hasanganj ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(49, 15, 'Kadwa ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(50, 15, 'Katihar ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(51, 15, 'Korha ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(52, 15, 'Kursela ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(53, 15, 'Manihari ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(54, 15, 'Mansahi ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(55, 15, 'Pranpur ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(56, 15, 'Sameli ', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(57, 17, 'Bahadurganj', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(58, 17, 'Dighalbank', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(59, 17, 'Kishanganj', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(60, 17, 'Kochadhaman', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(61, 17, 'Pothia', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(62, 17, 'Terhagachh', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(63, 17, 'Thakurganj', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(64, 19, 'Alamnagar', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(65, 19, 'Bihariganj', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(66, 19, 'Chausa', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(67, 19, 'Ghailadh', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(68, 19, 'Ghamharia', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(69, 19, 'Gualpara', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(70, 19, 'Kumarkhand', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(71, 19, 'Madhepura', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(72, 19, 'Murliganj', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(73, 19, 'Puraini', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(74, 19, 'Shankarpur', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(75, 19, 'Singheshwar', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(76, 19, 'Udakishunganj', 1, '22-02-2021', '2022-05-12 09:24:03', NULL),
(77, 16, 'Alauli', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(78, 16, 'Beldaur', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(79, 16, 'Chautham', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(80, 16, 'Gogri', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(81, 16, 'Khagaria', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(82, 16, 'Mansi', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(83, 16, 'Parbatta', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(84, 30, 'Kahara', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(85, 30, 'Mahishi', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(86, 30, 'Nauhatta', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(87, 30, 'Patarghat', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(88, 30, 'Salkhua', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(89, 30, 'Sattar Kataiya', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(90, 30, 'Simri Bakhtiarpur', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(91, 30, 'Sonbarsha', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(92, 30, 'Sour Bazar', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(93, 30, 'Banma Itahri', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(94, 37, 'Basantpur', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(95, 37, 'Chhatapur', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(96, 37, 'Kishanpur', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(97, 37, 'Marauna', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(98, 37, 'Nirmali', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(99, 37, 'Pipra', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(100, 37, 'Pratapganj', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(101, 37, 'Raghopur', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(102, 37, 'Saraigarh Bhaptiyahi', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(103, 37, 'Supaul', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(104, 37, 'Triveniganj', 1, '23-02-2021', '2022-05-12 09:24:03', NULL),
(105, 31, 'Bibhutpur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(106, 31, 'Bithan', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(107, 31, 'Dalsinghsarai', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(108, 31, 'Hasanpur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(109, 31, 'Kalyanpur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(110, 31, 'Khanpur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(111, 31, 'Mohanpur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(112, 31, 'Mohiuddinagar', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(113, 31, 'Morwa', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(114, 31, 'Patori', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(115, 31, 'Pusa', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(116, 31, 'Rosera', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(117, 31, 'Samastipur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(118, 31, 'Sarairanjan', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(119, 31, 'Shivaji Nagar', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(120, 31, 'Singhia', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(121, 31, 'Tajpur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(122, 31, 'Ujiarpur', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(123, 31, 'Vidyapati Nagar', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(124, 31, 'Warisnagar', 1, '01-02-2022', '2022-05-12 09:24:03', NULL),
(125, 35, 'Bairgania', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(126, 35, 'Bajpatti', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(127, 35, 'Bathnaha', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(128, 35, 'Belsand', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(129, 35, 'Bokhra', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(130, 35, 'Choraut', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(131, 35, 'Dumra', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(132, 35, 'Majorganj', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(133, 35, 'Nanpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(134, 35, 'Parihar', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(135, 35, 'Parsauni', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(136, 35, 'Pupri', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(137, 35, 'Riga', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(138, 35, 'Runni Saidpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(139, 35, 'Sonbarsa', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(140, 35, 'Sursand', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(141, 35, 'Suppi', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(142, 6, 'Goradih', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(143, 6, 'Jagdishpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(144, 6, 'Nathnagar', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(145, 6, 'Sabour', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(146, 6, 'Shahkund', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(147, 6, 'Sultanganj', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(148, 6, 'Kahalgaon', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(149, 6, 'Pirpainty', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(150, 6, 'Sanhaula', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(151, 6, 'Bihpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(152, 6, 'Gopalpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(153, 6, 'Ismailpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(154, 6, 'Kharik', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(155, 6, 'Narayanpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(156, 6, 'Naugachhiya', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(157, 6, 'Rangrachowk', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(158, 25, 'Bettiah', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(159, 25, 'Piprasi', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(160, 25, 'Nautan', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(161, 25, 'Bairiya', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(162, 25, 'Majhaulia', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(163, 25, 'Bhitaha', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(164, 25, 'Lauriya', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(165, 25, 'Chanpatia', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(166, 25, 'Mainatand', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(167, 25, 'Sikta', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(168, 25, 'Yogapatti', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(169, 25, 'Narkatiaganj', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(170, 25, 'Gaunaha', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(171, 25, 'Ramnagar', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(172, 25, 'Bagaha 1', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(173, 25, 'Bagaha 2', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(174, 25, 'Thakaraha', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(175, 25, 'Madhubani', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(176, 9, 'Darbhanga Sadar', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(177, 9, 'Bahadurpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(178, 9, 'Baheri', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(179, 9, 'Hayaghat', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(180, 9, 'Hanuman Nagar', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(181, 9, 'Jale', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(182, 9, 'Singhwara', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(183, 9, 'Keoti', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(184, 9, 'Manigachhi', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(185, 9, 'Tardih', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(186, 9, 'Benipur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(187, 9, 'Alinagar', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(188, 9, 'Biraul', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(189, 9, 'Gaura Bauram', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(190, 9, 'Kiratpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(191, 9, 'Ghanshyampur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(192, 9, 'Kusheshwar Asthan', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(193, 9, 'Kusheshwar Asthan East', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(194, 26, 'Patna Sadar', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(195, 26, 'Sampatchak', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(196, 26, 'Phulwarisarif', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(197, 26, 'Fatwah', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(198, 26, 'Daniyawan', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(199, 26, 'Khusrupur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(200, 26, 'Athmal gola', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(201, 26, 'Mokama', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(202, 26, 'Belchhi', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(203, 26, 'Ghoswari', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(204, 26, 'Pandarak', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(205, 26, 'Bakhtiyarpur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(206, 26, 'Barh', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(207, 26, 'Masaurhi', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(208, 26, 'Punpun', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(209, 26, 'Dhanarua', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(210, 26, 'Danapur', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(211, 26, 'Maner', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(212, 26, 'Bihta', 1, '05-02-2022', '2022-05-12 09:24:03', NULL),
(213, 9, 'Darbhanga Sadar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(214, 9, 'Bahadurpur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(215, 9, 'Baheri', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(216, 9, 'Hayaghat', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(217, 9, 'Hanuman Nagar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(218, 9, 'Jale', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(219, 9, 'Singhwara', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(220, 9, 'Keoti', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(221, 9, 'Manigachhi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(222, 9, 'Tardih', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(223, 9, 'Benipur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(224, 9, 'Alinagar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(225, 9, 'Biraul', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(226, 9, 'Gaura Bauram', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(227, 9, 'Kiratpur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(228, 9, 'Ghanshyampur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(229, 9, 'Kusheshwar Asthan', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(230, 9, 'Kusheshwar Asthan East', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(231, 8, 'Buxar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(232, 8, 'Itarhi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(233, 8, 'Chausa', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(234, 8, 'Rajpur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(235, 8, 'Dumraon', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(236, 8, 'Nawanagar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(237, 8, 'Brahampur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(238, 8, 'Kesath', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(239, 8, 'Chakki', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(240, 8, 'Chougain', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(241, 8, 'Simri', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(242, 4, 'Amarpur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(243, 4, 'Banka', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(244, 4, 'Barahat', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(245, 4, 'Belhar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(246, 4, 'Bounsi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(247, 4, 'Chandan', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(248, 4, 'Dhoraiya', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(249, 4, 'Fullidumer', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(250, 4, 'Katoriya', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(251, 4, 'Rajoun', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(252, 4, 'Sambhuganj', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(253, 3, 'Aurangabad', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(254, 3, 'Barun', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(255, 3, 'Navinagar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(256, 3, 'Kutumba', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(257, 3, 'Madanpur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(258, 3, 'Deo', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(259, 3, 'Rafiganj', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(260, 3, 'Obra', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(261, 3, 'Daudnagar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(262, 3, 'Goh', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(263, 3, 'Haspura', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(264, 2, 'Arwal', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(265, 2, 'Kaler', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(266, 2, 'Karpi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(267, 2, 'Kurtha', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(268, 2, 'Sonbhadra Banshi Suryapur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(269, 20, 'Madhubani Sadar (Rahika)', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(270, 20, 'Pandaul', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(271, 20, 'rajnagar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(272, 20, 'Babubarhi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(273, 20, 'Kaluahi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(274, 20, 'Khjauli', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(275, 20, 'Jainagar', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(276, 20, 'Ladaniya', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(277, 20, 'Basopatti', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(278, 20, 'Benipatti', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(279, 20, 'Bisfi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(280, 20, 'Harlakhi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(281, 20, 'Madhwapur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(282, 20, 'Jhanjarpur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(283, 20, 'Andhrathadi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(284, 20, 'Lakhnaur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(285, 20, 'Madhepur', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(286, 20, 'Phulparas', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(287, 20, 'Ghoghardiha', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(288, 20, 'Khutauna', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(289, 20, 'Laukahi', 1, '24-02-2022', '2022-05-12 09:24:03', NULL),
(290, 5, 'Begusarai', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(291, 5, 'Barauni', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(292, 5, 'Matihani', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(293, 5, 'Birpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(294, 5, 'Samho Akha Kurha', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(295, 5, 'Balia', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(296, 5, 'Dandari', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(297, 5, 'Sahebpur Kamal', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(298, 5, 'Teghra', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(299, 5, 'Bachhwara', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(300, 5, 'Bhagwanpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(301, 5, 'Mansoorchak', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(302, 5, 'Cheriya Bariyarpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(303, 5, 'Chhorahi', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(304, 5, 'Khudabandpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(305, 5, 'Bakhari', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(306, 5, 'Garhpura', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(307, 5, 'Nawkothi', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(308, 10, 'Gaya Sadar', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(309, 10, 'Belaganj', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(310, 10, 'Wazirganj', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(311, 10, 'Manpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(312, 10, 'Bodhgaya', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(313, 10, 'Tankuppa', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(314, 10, 'Fatehpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(315, 10, 'Konch', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(316, 10, 'Tekari', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(317, 10, 'Guraru', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(318, 10, 'Paraiya', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(319, 10, 'Khizarsarai', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(320, 10, 'Atri', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(321, 10, 'Bathani', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(322, 10, 'Mohra', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(323, 10, 'Gurua', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(324, 10, 'Amas', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(325, 10, 'Banke Bazar', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(326, 10, 'Imamganj', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(327, 10, 'Dumariya', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(328, 10, 'Sherghati', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(329, 10, 'Dobhi', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(330, 10, 'Mohanpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(331, 10, 'Barachatti', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(332, 11, 'Baikunthpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(333, 11, 'Barauli', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(334, 11, 'Gopalganj', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(335, 11, 'Kuchaikote', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(336, 11, 'Manjha', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(337, 11, 'Thawe', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(338, 11, 'Sidhwaliya', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(339, 11, 'Bhorey', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(340, 11, 'Hathua', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(341, 11, 'Kateya', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(342, 11, 'Panchdewari', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(343, 11, 'Phulwariya', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(344, 11, 'Uchkagaon', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(345, 11, 'Vijayipur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(346, 12, 'जहानाबाद', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(347, 12, 'Makhdumpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(348, 12, 'Ghosi', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(349, 12, 'Hulasganj', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(350, 12, 'Ratni Faridpur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(351, 12, 'Modanganj', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(352, 12, 'Kako', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(353, 13, 'Jamui', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(354, 13, 'Sikandra', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(355, 13, 'Khaira', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(356, 13, 'Chakai', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(357, 13, 'Sono', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(358, 13, 'Laxmipur', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(359, 13, 'Jhajha', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(360, 13, 'Barhat', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(361, 13, 'Gidhour', 1, '23-03-2022', '2022-05-12 09:24:03', NULL),
(362, 13, 'IslamnagarAliganj', 1, '23-03-2022', '2022-05-12 09:24:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) NOT NULL,
  `company_id` bigint(50) NOT NULL,
  `registration_number` bigint(120) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `owner_name` varchar(150) NOT NULL,
  `pan_number` varchar(50) DEFAULT NULL,
  `gst_number` varchar(150) DEFAULT NULL,
  `land_mark` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `alt_mobile` bigint(20) DEFAULT NULL,
  `email` varchar(180) NOT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `established_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_id`, `registration_number`, `company_name`, `owner_name`, `pan_number`, `gst_number`, `land_mark`, `city`, `state`, `country`, `pin_code`, `mobile`, `alt_mobile`, `email`, `logo`, `established_date`, `created_at`, `updated_at`) VALUES
(2, 16487531980401, 164875319820220401, 'TECHNOLOGY WATER WELLS', 'Mr. MUFIZUDDIN AL-RIYAZI', 'NA', 'NA', 'Munnawar Nagar', 'Araria', 'Bihar', 'India', 854312, 9931481362, 9733190190, 'eewells.in@gmail.com', 'company-logo-1648753198.jpeg', '2022-04-01', '2022-04-01 00:29:58', NULL),
(3, 16487534560401, 164875345620220401, 'AL-ROWAD KSA', 'Mr. MUFIZUDDIN AL-RIYAZI', 'NA', 'NA', 'Munnawar Nagar', 'Araria', 'Bihar', 'India', 854312, 9931481362, 9733190190, 'alrowad.india@gmail.com', 'company-logo-1648753456.jpeg', '2022-04-01', '2022-04-01 00:34:16', NULL),
(4, 16487537200401, 164875372020220401, 'AL-ROWAD TR', 'Mr. MUFIZUDDIN AL-RIYAZI', 'NA', 'NA', 'Munnawar Nagar', 'Araria', 'Bihar', 'India', 854312, 9931481362, 9733190190, 'alrowad.india@gmail.com', 'company-logo-1648753720.png', '2022-04-01', '2022-04-01 00:38:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Rana Sharma', '8825171386', 'ranasharma880@gmail.com', 'ecqw', '2022-02-24 19:57:22', '2022-02-24 19:57:22'),
(2, 'cs', 'asc', 'ascasc@gmail.com', 'ssdjhv', '2022-03-07 10:29:55', '2022-03-07 10:29:55'),
(3, 's', 's', 'ssssssssssssssssssssssssssssssssssssssssssss@gmail.com', 'Raa', '2022-04-26 21:01:32', '2022-04-26 21:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `contact_id` int(6) DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `altMobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `contact_id`, `mobile`, `altMobile`, `email`, `address`, `created_at`, `updated_at`, `status`) VALUES
(1, 970682, '9060781860', '9060781887', 'nkflicktechnology@gmail.comes', 'Purnia', '2022-02-08 15:01:21', '2022-02-09 15:45:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id_district` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1-Active,2-Pending',
  `date` varchar(30) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id_district`, `name`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'ARARIA (अररिया)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(2, 'ARWAL (अरवल)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(3, 'AURANGABAD (औरंगाबाद)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(4, 'BANKA (बांका)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(5, 'BEGUSARAI (बेगूसराय)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(6, 'BHAGALPUR (भागलपुर)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(7, 'BHOJPUR (भोजपुर)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(8, 'BUXAR (बक्सर)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(9, 'DARBHANGA (दरभंगा)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(10, 'GAYA (गया)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(11, 'GOPALGANJ (गोपालगंज)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(12, 'JAHANABAD (जहानाबाद)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(13, 'JAMUI (जमुई)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(14, 'KAIMUR (BHABUA) (कैमूर (भभुआ))', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(15, 'KATIHAR (कटिहार)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(16, 'KHAGARIA (खगड़िया)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(17, 'KISHANGANJ (किशनगंज)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(18, 'LAKHISARAI (लखीसराय', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(19, 'MADHEPURA (मधेपुरा)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(20, 'MADHUBANI (मधुबनी)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(21, 'MUNGER (मुंगेर)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(22, 'MUZAFFARPUR (मुजफ्फरपुर)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(23, 'NALANDA (नालन्दा)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(24, 'NAWADA (नवादा)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(25, 'PASCHIM CHAMPARAN (पश्चिम चम्पारण)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(26, 'PATNA (पटना)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(27, 'PURNIA (पूर्णियां)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(28, 'PURVI CHAMPARAN (पूर्वी चम्पारण)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(29, 'ROHTAS (रोहतास)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(30, 'SAHARSA (सहरसा)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(31, 'SAMASTIPUR (समस्तीपुर)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(32, 'SARAN (सारण)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(33, 'SHEIKHPURA (शेखपुरा)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(34, 'SHEOHAR (शिवहर)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(35, 'SITAMARHI (सीतामढ़ी)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(36, 'SIWAN (सिवान)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(37, 'SUPAUL (सुपौल)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL),
(38, 'VAISHALI (वैशाली)', 1, '12-02-2021', '2022-05-12 09:23:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `user_id` bigint(80) NOT NULL,
  `employee_id` bigint(80) NOT NULL,
  `qualification` varchar(150) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(60) NOT NULL,
  `aadhar_card` varchar(150) NOT NULL,
  `pan_card` varchar(150) NOT NULL,
  `voter_id` varchar(150) NOT NULL,
  `landmark` varchar(180) NOT NULL,
  `city` varchar(90) NOT NULL,
  `state` varchar(90) NOT NULL,
  `country` varchar(80) NOT NULL,
  `pincode` int(10) NOT NULL,
  `alt_mobile` varchar(20) DEFAULT NULL,
  `employee_photo` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `employee_id`, `qualification`, `experience`, `dob`, `gender`, `aadhar_card`, `pan_card`, `voter_id`, `landmark`, `city`, `state`, `country`, `pincode`, `alt_mobile`, `employee_photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 118880, 16487534560401, 'BCA', '2', '2000-01-01', 'Male', 'aadhar_card-1648828743.pdf', 'pan_card-1648828743.pdf', 'voter_id-1648828743.pdf', 'Munnawar Nagar', 'Araria', 'Bihar', 'India', 854301, NULL, 'employees-1648828743.jpg', 1, '2022-04-01 21:29:03', '2022-04-01 21:29:03'),
(2, 118881, 16523529559580, 'jh', '3', '2022-05-07', 'Female', 'aadhar_card-1652352955.pdf', 'pan_card-1652352955.pdf', 'voter_id-1652352955.pdf', 'a', 'Bagalkot', 'Karnataka', 'India', 854301, NULL, 'employees-1652352955.jpg', 1, '2022-05-12 10:55:55', '2022-05-12 10:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eventID` bigint(25) NOT NULL,
  `eventName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `eventTitle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `eventDetails` longtext COLLATE utf8_unicode_ci NOT NULL,
  `eventImage` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventID`, `eventName`, `eventTitle`, `eventDetails`, `eventImage`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(10, 1647444259202203, 'Test Event', 'Test Event', '<h1 class=\"register_heading\">Welcome to<br />Hasanah Girls College</h1>', 'event-image-1647444259.jpg', 'test-event', 1, '2022-03-16 20:54:19', '2022-03-16 20:54:19'),
(11, 1651491584202205, 'Event test', 'Event test', '<p>Event test</p>', 'event-image-1651491584.jpg', 'event-test', 1, '2022-05-02 17:09:44', '2022-05-02 17:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(90) NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `receipt_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `payment_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `payment_status` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `payment_card_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `method` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `wallet` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `payment_vpa` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `international_payment` tinyint(1) DEFAULT NULL,
  `error_reason` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=success, 2=pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `teacher_id`, `amount`, `payment_id`, `transaction_id`, `transaction_date`, `receipt_no`, `payment_mobile`, `payment_email`, `payment_status`, `payment_card_id`, `method`, `wallet`, `payment_vpa`, `international_payment`, `error_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HET104', '', 'pay_JPfHa9C822UGoA', '1651342939722230', '2022-04-30 23:52:19', '16513429394', '+919060781861', 'nkflicktechnology@gmail.com', 'captured', NULL, 'upi', NULL, '9199758612@paytm', 0, NULL, 1, '2022-04-30 23:51:36', '2022-04-30 23:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) NOT NULL,
  `galleryTitle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `galleryImage` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `galleryTitle`, `galleryImage`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Test Event', 'gallery-image-1647444284.jpg', 1, '2022-03-16 20:54:44', '2022-03-16 20:54:44'),
(5, 'dsvdsvdsv', 'gallery-image-1647444362.jpg', 1, '2022-03-16 20:56:02', '2022-03-16 20:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `logo_id` int(6) NOT NULL,
  `logo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logoType` tinyint(1) NOT NULL COMMENT '1= Header Logo, 2= Footer Logo and 3= Favicon',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo_id`, `logo`, `logoType`, `created_at`, `updated_at`, `status`) VALUES
(1, 365581, 'header-logo-1644301004.jpeg', 1, '2022-02-08 06:16:44', NULL, 1),
(2, 366194, 'footer-logo-1644301020.jpeg', 2, '2022-02-08 06:17:00', NULL, 1),
(3, 526303, 'favicon-1644301105.jpeg', 3, '2022-02-08 06:18:25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) NOT NULL,
  `noticeID` bigint(25) NOT NULL,
  `noticeName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `noticeTitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `noticeDetails` longtext COLLATE utf8_unicode_ci NOT NULL,
  `noticeImage` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `noticeID`, `noticeName`, `noticeTitle`, `noticeDetails`, `noticeImage`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1644488241202202, 'Notice Name', 'Notice Title', '<p><strong>Notice</strong></p>', 'notice-image-1644488241.png', 'notice-title', 1, '2022-02-10 15:47:21', '2022-02-10 15:47:21'),
(2, 1644488355202202, 'Notice Name', 'Notice Title', '<p><strong>Notice Test</strong></p>', 'notice-image-1644488355.png', 'notice-title-2', 1, '2022-02-10 15:49:15', '2022-02-10 15:49:15'),
(3, 1651491617202205, 'Event testEvent testEvent test', 'Event test', '<p>Event testEvent testEvent testEvent test</p>', 'notice-image-1651491617.jpg', 'event-test', 1, '2022-05-02 17:10:17', '2022-05-02 17:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sliderImage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sliderImage`, `created_at`, `updated_at`, `status`) VALUES
(1, 'jhjhb', NULL, '2022-02-09 23:11:32', '2022-02-09 23:11:32', 1),
(2, 'kfjn', 'slider-1644428764.jpg', '2022-02-09 23:16:04', '2022-02-09 23:16:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `facebook` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `instagram`, `linkedin`, `twitter`, `created_at`, `updated_at`, `status`) VALUES
(1, 'https://facebook.com/prabuddham-academy', 'https://instagram.com/prabuddham-academy', 'https://linkedin.com/prabuddham-academy', 'https://twitter.com/prabuddham-academy', '2022-02-08 18:05:19', '2022-02-09 03:27:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(90) NOT NULL,
  `student_id` varchar(150) COLLATE utf8_bin NOT NULL,
  `name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(190) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `state_id` int(191) NOT NULL,
  `district_id` int(191) NOT NULL,
  `block_id` int(191) NOT NULL,
  `school_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `school_id` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `name`, `email`, `mobile`, `password`, `state_id`, `district_id`, `block_id`, `school_name`, `school_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DBT1001', 'Rana Sharma', 'iamranasharma@gmail.com', '8825171386', '123456', 1, 27, 16, '', '', 1, '2022-04-28 09:01:43', '2022-05-02 14:42:13'),
(3, 'DBT1002', 'Ajit Sir', 'ajitkumarbarihat@gmail.com', '9199758612', '123', 1, 27, 16, 'Don Bosco School', 'AB00154', 1, '2022-05-12 09:45:18', '2022-05-12 09:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` bigint(50) DEFAULT NULL,
  `password` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verificationcode` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_approve` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Normal, 1=Approve, 2=Dis-Approve',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `role` tinyint(1) NOT NULL COMMENT '1= Admin, 2= Employee, 3= Distributor, 4=Contractor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `name`, `email`, `mobile`, `verificationcode`, `verified_at`, `is_verified`, `is_approve`, `created_at`, `updated_at`, `status`, `role`) VALUES
(1, 118866, '123456', 'Company', 'info@hasanah.in', '8825171386', NULL, '2022-03-22 07:13:00', 0, 0, '2022-03-22 11:43:38', '2022-03-22 07:13:00', 1, 1),
(15, 118875, 'vpwf5@v@', 'ZIYAUL HOQUE', 'ziyasalafi1991@gmail.com', '9852657238', NULL, NULL, 0, 0, '2022-04-01 00:48:59', '2022-04-01 00:48:59', 1, 3),
(16, 118876, 'r1ivzu2$', 'MOINUL HOQUE', 'na@gmail.com', '9113443694', NULL, NULL, 0, 0, '2022-04-01 00:55:43', '2022-04-01 00:55:43', 1, 3),
(17, 118877, '4vo6mp2l', 'AFROZ ALAM', 'afrozislampur@gmail.com', '9642347517', NULL, NULL, 0, 0, '2022-04-01 00:58:41', '2022-04-01 00:58:41', 1, 3),
(18, 118878, '123', 'NASIRUL ISLAM', 'shakilnasirul@gmail.com', '9733190190', 'd339841482b1337f139b022c58f9360ee6421e56', NULL, 0, 1, '2022-04-01 01:02:42', '2022-04-01 17:42:47', 1, 4),
(19, 118879, '123', 'REZAUL KARIM', 'na@gmail.com', '9734915456', 'bf249e47568a77293701813d5928d0033230260c', NULL, 0, 0, '2022-04-01 01:07:07', '2022-04-01 01:07:07', 1, 4),
(20, 118880, '123', 'Rana Sharma', 'ranasharma880@gmail.com', '7367086805', NULL, NULL, 0, 0, '2022-04-01 21:29:03', '2022-04-01 21:29:03', 1, 2),
(21, 118881, '123', 'Aniket', 'ww@gmail.com', '8825171386', NULL, NULL, 0, 0, '2022-05-12 10:55:55', '2022-05-12 10:55:55', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_histories`
--

CREATE TABLE `user_login_histories` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `system_info` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `browser` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_login_histories`
--

INSERT INTO `user_login_histories` (`id`, `user_id`, `system_info`, `ip_address`, `loc`, `org`, `timezone`, `browser`, `os`, `created_at`, `updated_at`) VALUES
(1, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-04-28 09:10:24', '2022-04-28 09:10:24'),
(2, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-04-28 09:16:19', '2022-04-28 09:16:19'),
(3, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-04-28 12:01:52', '2022-04-28 12:01:52'),
(4, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-04-28 18:24:45', '2022-04-28 18:24:45'),
(5, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-01 18:53:50', '2022-05-01 18:53:50'),
(6, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-02 10:27:15', '2022-05-02 10:27:15'),
(7, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-02 13:38:16', '2022-05-02 13:38:16'),
(8, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-09 09:38:46', '2022-05-09 09:38:46'),
(9, 'DBT1002', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-11 16:30:51', '2022-05-11 16:30:51'),
(10, '118881', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-13 10:17:28', '2022-05-13 10:17:28'),
(11, 'DBT1002', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-13 10:23:56', '2022-05-13 10:23:56'),
(12, 'DBT1003', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-14 18:29:50', '2022-05-14 18:29:50'),
(13, 'DBT1002', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-14 18:30:12', '2022-05-14 18:30:12'),
(14, 'DBT1002', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-15 05:57:25', '2022-05-15 05:57:25'),
(15, '118880', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-15 06:02:10', '2022-05-15 06:02:10'),
(16, 'DBT1002', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-25 19:51:11', '2022-05-25 19:51:11'),
(17, '118881', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-25 19:54:50', '2022-05-25 19:54:50'),
(18, '8825171386', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-27 19:34:41', '2022-05-27 19:34:41'),
(19, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-27 19:34:57', '2022-05-27 19:34:57'),
(20, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-27 19:35:11', '2022-05-27 19:35:11'),
(21, '118880', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-27 19:52:12', '2022-05-27 19:52:12'),
(22, '118880', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-29 16:55:12', '2022-05-29 16:55:12'),
(23, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-31 14:46:50', '2022-05-31 14:46:50'),
(24, 'DBT1001', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-31 14:47:17', '2022-05-31 14:47:17'),
(25, '118881', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-31 14:58:09', '2022-05-31 14:58:09'),
(26, '118880', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2022-05-31 14:58:35', '2022-05-31 14:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE `user_projects` (
  `id` int(11) NOT NULL,
  `project_id` bigint(50) NOT NULL,
  `user_id` bigint(50) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_upload_images`
--

CREATE TABLE `user_upload_images` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `user_id` bigint(100) DEFAULT NULL,
  `project_id` bigint(80) NOT NULL,
  `distributor_id` bigint(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_upload_images`
--

INSERT INTO `user_upload_images` (`id`, `title`, `image_name`, `image_url`, `status`, `created_at`, `updated_at`, `user_id`, `project_id`, `distributor_id`) VALUES
(1, 'project Title', 'project Title', 'https://res.cloudinary.com/rana-developer-purnia/image/upload/v1649137384/g7u919lobfep2i4zpn8q.jpg', 0, '2022-04-05 11:13:03', '2022-04-05 11:13:03', 118878, 40316490053654669, 11648754339397);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(190) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `paid_by` bigint(20) NOT NULL,
  `work_id` bigint(20) NOT NULL,
  `amount` float(80,2) DEFAULT NULL,
  `transaction_no` bigint(20) NOT NULL,
  `cr_dr` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `employee_id`, `paid_by`, `work_id`, `amount`, `transaction_no`, `cr_dr`, `status`, `created_at`, `updated_at`) VALUES
(3, 118880, 118866, 2, 50.00, 662132, 'Credit', 1, '2022-05-29 18:38:45', '2022-05-29 18:38:45'),
(4, 118880, 118866, 2, 30.00, 996021, 'Credit', 1, '2022-05-31 15:00:37', '2022-05-31 15:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `work_completed_status` int(4) DEFAULT NULL,
  `work_completed_date` datetime DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `amount` int(191) DEFAULT NULL,
  `user_work_amount` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(250) DEFAULT NULL,
  `payment_mobile` varchar(250) DEFAULT NULL,
  `payment_email` varchar(250) DEFAULT NULL,
  `payment_card_id` varchar(250) DEFAULT NULL,
  `method` varchar(250) DEFAULT NULL,
  `wallet` varchar(250) DEFAULT NULL,
  `payment_vpa` varchar(250) DEFAULT NULL,
  `international_payment` tinyint(1) DEFAULT NULL,
  `error_reason` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `teacher_id`, `employee_id`, `work_completed_status`, `work_completed_date`, `title`, `images`, `amount`, `user_work_amount`, `payment_status`, `payment_mode`, `transaction_id`, `transaction_date`, `payment_id`, `receipt_no`, `payment_mobile`, `payment_email`, `payment_card_id`, `method`, `wallet`, `payment_vpa`, `international_payment`, `error_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DBT1001', NULL, 1, NULL, 'Testing title here', '[\"gallery-image-16536801592175.jpeg\",\"gallery-image-16536801592000.jpeg\",\"gallery-image-16536801597288.jpeg\",\"gallery-image-1653680159611.jpeg\"]', 500, '100', 'captured', NULL, '1653680315272227', '2022-05-27 19:38:35', 'pay_JaN0TrnfZxayfF', '16536803151', '+918825171386', 'iamranasharma@gmail.com', NULL, 'upi', NULL, '8825171386@paytm', 0, NULL, 3, '2022-05-28 01:05:59', '2022-05-27 19:38:35'),
(2, 'DBT1001', '118880', 2, '2022-05-31 15:00:04', 'Test 2', '[\"gallery-image-16536803643868.jpeg\",\"gallery-image-1653680364459.jpeg\"]', 400, '50', 'captured', NULL, '1653680412192227', '2022-05-27 19:40:12', 'pay_JaN2BsdI4Mnu50', '16536804121', '+918825171386', 'iamranasharma@gmail.com', NULL, 'upi', NULL, '9199758612@ybl', 0, NULL, 3, '2022-05-28 01:09:24', '2022-05-31 15:00:37'),
(3, 'DBT1001', '118881', 1, NULL, 'Shahbaz Sir', '[\"gallery-image-16540084663914.png\",\"gallery-image-16540084662090.jpg\",\"gallery-image-16540084666291.png\"]', 500, '100', 'captured', NULL, '1654008550932231', '2022-05-31 14:49:10', 'pay_JbsDGtuoSksWDt', '16540085501', '+918825171386', 'iamranasharma@gmail.com', NULL, 'upi', NULL, '8825171386@paytm', 0, NULL, 3, '2022-05-31 20:17:46', '2022-05-31 14:57:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id_district`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login_histories`
--
ALTER TABLE `user_login_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_projects`
--
ALTER TABLE `user_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_upload_images`
--
ALTER TABLE `user_upload_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id_district` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_login_histories`
--
ALTER TABLE `user_login_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_projects`
--
ALTER TABLE `user_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_upload_images`
--
ALTER TABLE `user_upload_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(190) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
