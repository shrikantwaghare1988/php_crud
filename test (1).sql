-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 05:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `doj` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `first_name`, `last_name`, `gender`, `country`, `age`, `doj`, `created_date`) VALUES
(1, 'Dulce', 'Abril', 'Female', 'United States', 32, '2017-10-15', '2023-07-27 15:58:37'),
(2, 'Mara', 'Hashimoto', 'Female', 'Great Britain', 25, '2016-08-16', '2023-07-27 15:58:37'),
(3, 'Philip', 'Gent', 'Male', 'France', 36, '2015-05-21', '2023-07-27 15:58:37'),
(4, 'Kathleen', 'Hanner', 'Female', 'United States', 25, '2017-10-15', '2023-07-27 15:58:37'),
(5, 'Nereida', 'Magwood', 'Female', 'United States', 58, '2016-08-16', '2023-07-27 15:58:37'),
(6, 'Gaston', 'Brumm', 'Male', 'United States', 24, '2015-05-21', '2023-07-27 15:58:37'),
(7, 'Etta', 'Hurn', 'Female', 'Great Britain', 56, '2017-10-15', '2023-07-27 15:58:37'),
(8, 'Earlean', 'Melgar', 'Female', 'United States', 27, '2016-08-16', '2023-07-27 15:58:37'),
(9, 'Vincenza', 'Weiland', 'Female', 'United States', 40, '2015-05-21', '2023-07-27 15:58:37'),
(10, 'Fallon', 'Winward', 'Female', 'Great Britain', 28, '2016-08-16', '2023-07-27 15:58:37'),
(11, 'Arcelia', 'Bouska', 'Female', 'Great Britain', 39, '2015-05-21', '2023-07-27 15:58:37'),
(12, 'Franklyn', 'Unknow', 'Male', 'France', 38, '2017-10-15', '2023-07-27 15:58:37'),
(13, 'Sherron', 'Ascencio', 'Female', 'Great Britain', 32, '2016-08-16', '2023-07-27 15:58:37'),
(14, 'Marcel', 'Zabriskie', 'Male', 'Great Britain', 26, '2015-05-21', '2023-07-27 15:58:37'),
(15, 'Kina', 'Hazelton', 'Female', 'Great Britain', 31, '2016-08-16', '2023-07-27 15:58:37'),
(16, 'Shavonne', 'Pia', 'Female', 'France', 24, '2015-05-21', '2023-07-27 15:58:37'),
(17, 'Shavon', 'Benito', 'Female', 'France', 39, '2017-10-15', '2023-07-27 15:58:37'),
(18, 'Lauralee', 'Perrine', 'Female', 'Great Britain', 28, '2016-08-16', '2023-07-27 15:58:37'),
(19, 'Loreta', 'Curren', 'Female', 'France', 26, '2015-05-21', '2023-07-27 15:58:37'),
(20, 'Teresa', 'Strawn', 'Female', 'France', 46, '2015-05-21', '2023-07-27 15:58:37'),
(21, 'Belinda', 'Partain', 'Female', 'United States', 37, '2017-10-15', '2023-07-27 15:58:37'),
(22, 'Holly', 'Eudy', 'Female', 'United States', 52, '2016-08-16', '2023-07-27 15:58:37'),
(23, 'Many', 'Cuccia', 'Female', 'Great Britain', 46, '2015-05-21', '2023-07-27 15:58:37'),
(24, 'Libbie', 'Dalby', 'Female', 'France', 42, '2015-05-21', '2023-07-27 15:58:37'),
(25, 'Lester', 'Prothro', 'Male', 'France', 21, '2017-10-15', '2023-07-27 15:58:37'),
(26, 'Marvel', 'Hail', 'Female', 'Great Britain', 28, '2016-08-16', '2023-07-27 15:58:37'),
(27, 'Angelyn', 'Vong', 'Female', 'United States', 29, '2015-05-21', '2023-07-27 15:58:37'),
(28, 'Francesca', 'Beaudreau', 'Female', 'France', 23, '2017-10-15', '2023-07-27 15:58:37'),
(29, 'Garth', 'Gangi', 'Male', 'United States', 41, '2016-08-16', '2023-07-27 15:58:37'),
(30, 'Carla', 'Trumbull', 'Female', 'Great Britain', 28, '2015-05-21', '2023-07-27 15:58:37'),
(31, 'Veta', 'Muntz', 'Female', 'Great Britain', 37, '2017-10-15', '2023-07-27 15:58:37'),
(32, 'Stasia', 'Becker', 'Female', 'Great Britain', 34, '2016-08-16', '2023-07-27 15:58:37'),
(33, 'Jona', 'Grindle', 'Female', 'Great Britain', 26, '2015-05-21', '2023-07-27 15:58:37'),
(34, 'Judie', 'Claywell', 'Female', 'France', 35, '2016-08-16', '2023-07-27 15:58:37'),
(35, 'Dewitt', 'Borger', 'Male', 'United States', 36, '2015-05-21', '2023-07-27 15:58:37'),
(36, 'Nena', 'Hacker', 'Female', 'United States', 29, '2017-10-15', '2023-07-27 15:58:37'),
(37, 'Kelsie', 'Wachtel', 'Female', 'France', 27, '2016-08-16', '2023-07-27 15:58:37'),
(38, 'Sau', 'Pfau', 'Female', 'United States', 25, '2015-05-21', '2023-07-27 15:58:37'),
(39, 'Shanice', 'Mccrystal', 'Female', 'United States', 36, '2015-05-21', '2023-07-27 15:58:37'),
(40, 'Chase', 'Karner', 'Male', 'United States', 37, '2017-10-15', '2023-07-27 15:58:37'),
(41, 'Tommie', 'Underdahl', 'Male', 'United States', 26, '2016-08-16', '2023-07-27 15:58:37'),
(42, 'Dorcas', 'Darity', 'Female', 'United States', 37, '2015-05-21', '2023-07-27 15:58:37'),
(43, 'Angel', 'Sanor', 'Male', 'France', 24, '2017-10-15', '2023-07-27 15:58:37'),
(44, 'Willodean', 'Harn', 'Female', 'United States', 39, '2016-08-16', '2023-07-27 15:58:37'),
(45, 'Weston', 'Martina', 'Male', 'United States', 26, '2015-05-21', '2023-07-27 15:58:37'),
(46, 'Roma', 'Lafollette', 'Female', 'United States', 34, '2017-10-15', '2023-07-27 15:58:37'),
(47, 'Felisa', 'Cail', 'Female', 'United States', 28, '2016-08-16', '2023-07-27 15:58:37'),
(48, 'Demetria', 'Abbey', 'Female', 'United States', 32, '2015-05-21', '2023-07-27 15:58:37'),
(49, 'Jeromy', 'Danz', 'Male', 'United States', 39, '2017-10-15', '2023-07-27 15:58:37'),
(50, 'Rasheeda', 'Alkire', 'Female', 'United States', 29, '2016-08-16', '2023-07-27 15:58:37'),
(51, 'Dulce', 'Abril', 'Female', 'United States', 32, '2017-10-15', '2023-07-27 15:58:37'),
(52, 'Mara', 'Hashimoto', 'Female', 'Great Britain', 25, '2016-08-16', '2023-07-27 15:58:37'),
(53, 'Philip', 'Gent', 'Male', 'France', 36, '2015-05-21', '2023-07-27 15:58:37'),
(54, 'Kathleen', 'Hanner', 'Female', 'United States', 25, '2017-10-15', '2023-07-27 15:58:37'),
(55, 'Nereida', 'Magwood', 'Female', 'United States', 58, '2016-08-16', '2023-07-27 15:58:37'),
(56, 'Gaston', 'Brumm', 'Male', 'United States', 24, '2015-05-21', '2023-07-27 15:58:37'),
(57, 'Etta', 'Hurn', 'Female', 'Great Britain', 56, '2017-10-15', '2023-07-27 15:58:37'),
(58, 'Earlean', 'Melgar', 'Female', 'United States', 27, '2016-08-16', '2023-07-27 15:58:37'),
(59, 'Vincenza', 'Weiland', 'Female', 'United States', 40, '2015-05-21', '2023-07-27 15:58:37'),
(60, 'Fallon', 'Winward', 'Female', 'Great Britain', 28, '2016-08-16', '2023-07-27 15:58:37'),
(61, 'Arcelia', 'Bouska', 'Female', 'Great Britain', 39, '2015-05-21', '2023-07-27 15:58:37'),
(62, 'Franklyn', 'Unknow', 'Male', 'France', 38, '2017-10-15', '2023-07-27 15:58:37'),
(63, 'Sherron', 'Ascencio', 'Female', 'Great Britain', 32, '2016-08-16', '2023-07-27 15:58:37'),
(64, 'Marcel', 'Zabriskie', 'Male', 'Great Britain', 26, '2015-05-21', '2023-07-27 15:58:37'),
(65, 'Kina', 'Hazelton', 'Female', 'Great Britain', 31, '2016-08-16', '2023-07-27 15:58:37'),
(66, 'Shavonne', 'Pia', 'Female', 'France', 24, '2015-05-21', '2023-07-27 15:58:37'),
(67, 'Shavon', 'Benito', 'Female', 'France', 39, '2017-10-15', '2023-07-27 15:58:37'),
(68, 'Lauralee', 'Perrine', 'Female', 'Great Britain', 28, '2016-08-16', '2023-07-27 15:58:37'),
(69, 'Loreta', 'Curren', 'Female', 'France', 26, '2015-05-21', '2023-07-27 15:58:37'),
(70, 'Teresa', 'Strawn', 'Female', 'France', 46, '2015-05-21', '2023-07-27 15:58:37'),
(71, 'Belinda', 'Partain', 'Female', 'United States', 37, '2017-10-15', '2023-07-27 15:58:37'),
(72, 'Holly', 'Eudy', 'Female', 'United States', 52, '2016-08-16', '2023-07-27 15:58:37'),
(73, 'Many', 'Cuccia', 'Female', 'Great Britain', 46, '2015-05-21', '2023-07-27 15:58:37'),
(74, 'Libbie', 'Dalby', 'Female', 'France', 42, '2015-05-21', '2023-07-27 15:58:37'),
(75, 'Lester', 'Prothro', 'Male', 'France', 21, '2017-10-15', '2023-07-27 15:58:37'),
(76, 'Marvel', 'Hail', 'Female', 'Great Britain', 28, '2016-08-16', '2023-07-27 15:58:37'),
(77, 'Angelyn', 'Vong', 'Female', 'United States', 29, '2015-05-21', '2023-07-27 15:58:37'),
(78, 'Francesca', 'Beaudreau', 'Female', 'France', 23, '2017-10-15', '2023-07-27 15:58:37'),
(79, 'Garth', 'Gangi', 'Male', 'United States', 41, '2016-08-16', '2023-07-27 15:58:37'),
(80, 'Carla', 'Trumbull', 'Female', 'Great Britain', 28, '2015-05-21', '2023-07-27 15:58:37'),
(81, 'Veta', 'Muntz', 'Female', 'Great Britain', 37, '2017-10-15', '2023-07-27 15:58:37'),
(82, 'Stasia', 'Becker', 'Female', 'Great Britain', 34, '2016-08-16', '2023-07-27 15:58:37'),
(83, 'Jona', 'Grindle', 'Female', 'Great Britain', 26, '2015-05-21', '2023-07-27 15:58:37'),
(84, 'Judie', 'Claywell', 'Female', 'France', 35, '2016-08-16', '2023-07-27 15:58:37'),
(85, 'Dewitt', 'Borger', 'Male', 'United States', 36, '2015-05-21', '2023-07-27 15:58:37'),
(86, 'Nena', 'Hacker', 'Female', 'United States', 29, '2017-10-15', '2023-07-27 15:58:37'),
(87, 'Kelsie', 'Wachtel', 'Female', 'France', 27, '2016-08-16', '2023-07-27 15:58:37'),
(88, 'Sau', 'Pfau', 'Female', 'United States', 25, '2015-05-21', '2023-07-27 15:58:37'),
(89, 'Shanice', 'Mccrystal', 'Female', 'United States', 36, '2015-05-21', '2023-07-27 15:58:37'),
(90, 'Chase', 'Karner', 'Male', 'United States', 37, '2017-10-15', '2023-07-27 15:58:37'),
(91, 'Tommie', 'Underdahl', 'Male', 'United States', 26, '2016-08-16', '2023-07-27 15:58:37'),
(92, 'Dorcas', 'Darity', 'Female', 'United States', 37, '2015-05-21', '2023-07-27 15:58:37'),
(93, 'Angel', 'Sanor', 'Male', 'France', 24, '2017-10-15', '2023-07-27 15:58:37'),
(94, 'Willodean', 'Harn', 'Female', 'United States', 39, '2016-08-16', '2023-07-27 15:58:37'),
(95, 'Weston', 'Martina', 'Male', 'United States', 26, '2015-05-21', '2023-07-27 15:58:37'),
(96, 'Roma', 'Lafollette', 'Female', 'United States', 34, '2017-10-15', '2023-07-27 15:58:37'),
(97, 'Felisa', 'Cail', 'Female', 'United States', 28, '2016-08-16', '2023-07-27 15:58:37'),
(98, 'Demetria', 'Abbey', 'Female', 'United States', 32, '2015-05-21', '2023-07-27 15:58:37'),
(99, 'Jeromy', 'Danz', 'Male', 'United States', 39, '2017-10-15', '2023-07-27 15:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `emp_crud`
--

CREATE TABLE `emp_crud` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp_crud`
--

INSERT INTO `emp_crud` (`id`, `full_name`, `mobile_no`, `email`, `city`, `profile_pic`, `department`, `description`, `created_date`) VALUES
(2, 'Shrikant Waghare2', '9898989898', 'shrikantbro322886@gmail.com', 'Ambarnath', '', '', 'uyyuvuyvu', '2023-07-29 06:53:32'),
(3, 'Shrikant Waghare', '9898989898', 'prashant24waghare@gmail.com', 'Ambarnath', '', 'HR', '', '2023-07-29 07:10:04'),
(4, 'Shrikant Waghare', '7676767898', 'prashant24wttaghare@gmail.com', 'Ambarnath', '', 'Account', 'ytffyf', '2023-07-29 11:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `country`, `state`, `city`) VALUES
(4, 'India', 'Maharashtra', 'Ambarnath'),
(6, 'India', 'Maharashtra', 'Ambarnath'),
(7, 'India', 'Maharashtra', 'Kalyan'),
(8, 'India', 'Maharashtra', 'Kalyan'),
(9, 'India', 'Maharashtra', 'Kalyan'),
(10, 'India', 'Maharashtra', 'Kalyan'),
(11, 'India', 'Maharashtra', 'Kalyan'),
(12, 'India', 'Maharashtra', 'Kalyan'),
(13, 'India', 'Maharashtra', 'Kalyan'),
(14, 'India', 'Maharashtra', 'Thane'),
(15, 'India', 'Maharashtra', 'Thane'),
(16, 'India', 'Maharashtra', 'Thane'),
(17, 'India', 'Maharashtra', 'Thane'),
(18, 'India', 'Maharashtra', 'Ambarnath'),
(19, 'India', 'Maharashtra', 'Karjat'),
(20, 'India', 'Maharashtra', 'Thane'),
(21, 'India', 'Maharashtra', 'Thane'),
(22, 'India', 'Maharashtra', 'Thane'),
(23, 'India', 'Maharashtra', 'Thane'),
(24, 'India', 'Maharashtra', 'Thane'),
(25, 'India', 'Maharashtra', 'Thane'),
(26, 'India', 'Maharashtra', 'Thane'),
(27, 'India', 'Maharashtra', 'Thane'),
(28, 'India', 'Maharashtra', 'Thane'),
(29, 'India', 'Maharashtra', 'Thane'),
(30, 'India', 'Maharashtra', 'Thane'),
(31, 'India', 'Maharashtra', 'Thane'),
(32, 'India', 'Maharashtra', 'Thane'),
(33, 'India', 'Maharashtra', 'Thane'),
(34, 'India', 'Maharashtra', 'Thane'),
(35, 'India', 'Maharashtra', 'Thane'),
(36, 'India', 'Maharashtra', 'Thane'),
(37, 'India', 'Maharashtra', 'Thane'),
(38, 'India', 'Maharashtra', 'Thane'),
(39, 'India', 'Maharashtra', 'Thane');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `mobile_no`, `email`, `loc_id`, `file_name`, `created_date`) VALUES
(18, 'Shrikant Waghare', '7676565676', 'shrikant23@gmail.com', 4, 'pic_27560.jpg', '2023-07-01 06:13:17'),
(19, 'Dinesh', '9898788787', 'testemail3232@gmail.com', 6, '', '2023-07-01 06:17:47'),
(20, 'Akash', '9898543434', 'testemail326532@gmail.com', 7, 'pic_88392.jpg', '2023-07-03 06:19:18'),
(22, 'Prakash', '9898543434', 'testemail3826532@gmail.com', 9, 'pic_53800.jpg', '2023-07-04 06:19:43'),
(23, 'Satish', '9898543434', 'testemail38626532@gmail.com', 10, '', '2023-07-04 06:19:58'),
(24, 'Jayesh', '9898543434', 'testemail386296532@gmail.com', 11, 'pic_48176.jpg', '2023-07-06 06:20:16'),
(25, 'Haresh', '9898543434', 'testemail54@gmail.com', 12, '', '2023-07-06 06:20:35'),
(26, 'Mahesh', '9898543434', 'testemail584@gmail.com', 13, '', '2023-07-07 06:20:52'),
(27, 'Mandar', '9898543434', 'testemail784@gmail.com', 14, 'pic_69118.jpg', '2023-07-08 06:21:27'),
(28, 'Bharat', '9898543434', 'testemail7874@gmail.com', 15, '', '2023-07-08 06:21:40'),
(29, 'Kunal', '9898543434', 'testemail78794@gmail.com', 16, 'pic_48249.jpg', '2023-07-13 06:21:53'),
(30, 'Atul', '9898543434', 'testemail878794@gmail.com', 17, 'pic_88025.jpg', '2023-07-13 06:22:05'),
(31, 'Prashant', '9898543434', 'testemail8778794@gmail.com', 18, 'pic_20987.jpg', '2023-07-13 06:22:38'),
(32, 'Bharti Waghare', '8987876765', 'bharti345@gmail.com', 19, 'pic_57468.jpg', '2023-07-15 06:03:42'),
(33, 'Shrikant_1531', '9898543434', 'testemail877899758@gmail.com', 20, '', '2023-07-15 16:11:01'),
(34, 'Shrikant_4306', '9898543434', 'testemail877878658@gmail.com', 21, '', '2023-07-15 16:11:05'),
(35, 'Shrikant_56', '9898543434', 'testemail877837784@gmail.com', 22, '', '2023-07-15 16:11:06'),
(36, 'Shrikant_1233', '9898543434', 'testemail877836698@gmail.com', 23, '', '2023-07-15 16:11:06'),
(37, 'Shrikant_2951', '9898543434', 'testemail877898991@gmail.com', 24, '', '2023-07-15 16:11:07'),
(38, 'Shrikant_959', '9898543434', 'testemail877853647@gmail.com', 25, '', '2023-07-15 16:11:07'),
(39, 'Shrikant_3727', '9898543434', 'testemail877846010@gmail.com', 26, '', '2023-07-15 16:11:10'),
(40, 'Shrikant_3901', '9898543434', 'testemail877843870@gmail.com', 27, '', '2023-07-15 16:11:11'),
(41, 'Shrikant_1745', '9898543434', 'testemail877898158@gmail.com', 28, '', '2023-07-15 16:11:11'),
(42, 'Shrikant_885', '9898543434', 'testemail877827400@gmail.com', 29, '', '2023-07-15 16:11:11'),
(43, 'Shrikant_3657', '9898543434', 'testemail877864324@gmail.com', 30, '', '2023-07-15 16:11:11'),
(44, 'Shrikant_1715', '9898543434', 'testemail877880997@gmail.com', 31, '', '2023-07-15 16:11:12'),
(45, 'Shrikant_2980', '9898543434', 'testemail877838555@gmail.com', 32, '', '2023-07-15 16:11:12'),
(46, 'Shrikant_4069', '9898543434', 'testemail877862807@gmail.com', 33, '', '2023-07-15 16:11:12'),
(47, 'Shrikant_598', '9898543434', 'testemail877869657@gmail.com', 34, '', '2023-07-15 16:11:12'),
(48, 'Shrikant_2204', '9898543434', 'testemail877847238@gmail.com', 35, '', '2023-07-15 16:11:12'),
(49, 'Shrikant_4456', '9898543434', 'testemail877895585@gmail.com', 36, '', '2023-07-15 16:11:12'),
(50, 'Shrikant_1088', '9898543434', 'testemail877829448@gmail.com', 37, '', '2023-07-15 16:11:13'),
(51, 'Shrikant_2319', '9898543434', 'testemail877845457@gmail.com', 38, '', '2023-07-15 16:11:13'),
(52, 'Shrikant_355', '9898543434', 'testemail877898660@gmail.com', 39, '', '2023-07-15 16:11:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_crud`
--
ALTER TABLE `emp_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `emp_crud`
--
ALTER TABLE `emp_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
