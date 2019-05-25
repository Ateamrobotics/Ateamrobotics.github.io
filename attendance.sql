-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 01:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `absent_record`
--

CREATE TABLE `absent_record` (
  `id` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_action_log`
--

CREATE TABLE `admin_action_log` (
  `id` int(12) NOT NULL,
  `action` varchar(500) NOT NULL,
  `affectedUser` int(12) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(12) NOT NULL,
  `userName` varchar(500) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `userName`, `firstName`, `lastName`, `password`, `dateAdded`) VALUES
(1, 'adamTronchin', 'Adam', 'Tronchin', 'PASSpass9', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` double NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `uid`, `date`, `time`, `state`) VALUES
(3, 35201621, '2019-05-09', 10.58, 0),
(4, 35201621, '2019-05-09', 10.59, 1),
(5, 35201621, '2019-05-09', 16.17, 0),
(6, 35201621, '2019-05-09', 16.5, 1),
(7, 35201621, '2019-05-09', 17.18, 0),
(8, 35201621, '2019-05-09', 17.44, 1),
(9, 35201621, '2019-05-09', 17.44, 0),
(10, 35201621, '2019-05-09', 17.5, 1),
(11, 123456, '2019-05-09', 17.52, 0),
(12, 123456, '2019-05-09', 17.54, 1),
(13, 123456, '2019-05-09', 17.54, 0),
(14, 123456, '2019-05-09', 21.31, 1),
(15, 30623, '2019-05-09', 21.33, 0),
(16, 123456, '2019-05-09', 22.14, 0),
(17, 30623, '2019-05-09', 22.4, 1),
(18, 123456, '2019-05-09', 22.4, 1),
(19, 35201621, '2019-05-09', 22.41, 0),
(20, 35201621, '2019-05-10', 8.37, 0),
(21, 35201621, '2019-05-10', 10.1, 1),
(22, 1120, '2019-05-12', 12.08, 0),
(23, 35201621, '2019-05-12', 12.11, 0),
(24, 35201621, '2019-05-12', 14.41, 1),
(25, 35201621, '2019-05-12', 18, 0),
(26, 123456, '2019-05-12', 18.04, 0),
(27, 123456, '2019-05-12', 18.54, 1),
(28, 35201621, '2019-05-12', 19.38, 1),
(29, 123456, '2019-05-12', 19.38, 0),
(30, 123456, '2019-05-12', 19.39, 1),
(31, 35201621, '2019-05-12', 20.26, 0),
(32, 35201621, '2019-05-12', 21.01, 1),
(33, 35201621, '2019-05-13', 22.27, 0),
(34, 35201621, '2019-05-16', 16.29, 0),
(35, 35201621, '2019-05-16', 20.29, 1),
(36, 30623, '2019-05-24', 15.36, 0),
(37, 123456, '2019-05-24', 15.36, 0),
(38, 25202962, '2019-05-24', 15.36, 0),
(39, 25203020, '2019-05-24', 15.36, 0),
(40, 30623, '2019-05-24', 15.36, 1),
(41, 123456, '2019-05-24', 15.36, 1),
(42, 25202962, '2019-05-24', 15.36, 1),
(43, 25203020, '2019-05-24', 15.36, 1),
(44, 30623, '2019-05-24', 15.39, 0),
(45, 30623, '2019-05-24', 15.44, 1),
(46, 30623, '2019-05-24', 21.14, 0),
(47, 123456, '2019-05-24', 21.14, 0),
(48, 123456, '2019-05-24', 21.14, 1),
(49, 30623, '2019-05-24', 21.14, 1),
(50, 30623, '2019-05-24', 21.15, 0),
(51, 123456, '2019-05-24', 21.15, 0),
(52, 25202962, '2019-05-24', 21.15, 0),
(53, 25203020, '2019-05-24', 21.15, 0),
(54, 25203031, '2019-05-24', 21.15, 0),
(55, 35200915, '2019-05-24', 21.15, 0),
(56, 35200923, '2019-05-24', 21.15, 0),
(57, 35201103, '2019-05-24', 21.15, 0),
(58, 35201621, '2019-05-24', 21.15, 0),
(59, 367601, '2019-05-24', 21.15, 0),
(60, 367601, '2019-05-24', 21.15, 1),
(61, 35201621, '2019-05-24', 21.15, 1),
(62, 367601, '2019-05-24', 21.15, 0),
(63, 35201621, '2019-05-24', 21.15, 0),
(64, 35201621, '2019-05-24', 21.15, 1),
(65, 35200923, '2019-05-24', 21.15, 1),
(66, 25203031, '2019-05-24', 21.15, 1),
(67, 25202962, '2019-05-24', 21.15, 1),
(68, 30623, '2019-05-24', 21.15, 1),
(69, 35201621, '2019-05-24', 21.15, 0),
(70, 35200923, '2019-05-24', 21.15, 0),
(71, 25203031, '2019-05-24', 21.15, 0),
(72, 25202962, '2019-05-24', 21.15, 0),
(73, 30623, '2019-05-24', 21.15, 0),
(74, 25203031, '2019-05-24', 21.15, 1),
(75, 30623, '2019-05-24', 21.16, 1),
(76, 123456, '2019-05-24', 21.16, 1),
(77, 25202962, '2019-05-24', 21.16, 1),
(78, 25203020, '2019-05-24', 21.18, 1),
(79, 35200915, '2019-05-24', 21.18, 1),
(80, 35200923, '2019-05-24', 21.18, 1),
(81, 35201103, '2019-05-24', 21.18, 1),
(82, 35201621, '2019-05-24', 21.18, 1),
(83, 367601, '2019-05-24', 21.18, 1),
(84, 35201103, '2019-05-24', 21.19, 0),
(85, 35200923, '2019-05-24', 21.19, 0),
(86, 35200923, '2019-05-24', 21.44, 1),
(87, 35201103, '2019-05-24', 21.44, 1),
(88, 30623, '2019-05-24', 21.55, 0),
(89, 123456, '2019-05-24', 21.55, 0),
(90, 25202962, '2019-05-24', 22.2, 0),
(91, 25203020, '2019-05-24', 22.2, 0),
(92, 25203031, '2019-05-24', 22.2, 0),
(93, 35200915, '2019-05-24', 22.2, 0),
(94, 35200923, '2019-05-24', 22.2, 0),
(95, 35201103, '2019-05-24', 22.2, 0),
(96, 35201621, '2019-05-24', 22.21, 0),
(97, 367601, '2019-05-24', 22.21, 0),
(98, 30623, '2019-05-24', 22.27, 1),
(99, 123456, '2019-05-24', 22.27, 1),
(100, 25202962, '2019-05-24', 22.27, 1),
(101, 25203020, '2019-05-24', 22.27, 1),
(102, 25203031, '2019-05-24', 22.27, 1),
(103, 35200915, '2019-05-24', 22.27, 1),
(104, 35200923, '2019-05-24', 22.27, 1),
(105, 35201103, '2019-05-24', 22.27, 1),
(106, 367601, '2019-05-24', 22.27, 1),
(107, 35201621, '2019-05-24', 22.58, 1),
(108, 123456, '2019-05-25', 0.09, 0),
(109, 123456, '2019-05-25', 0.09, 1),
(110, 35200923, '2019-05-25', 0.43, 0),
(111, 25202962, '2019-05-25', 0.43, 0),
(112, 25203031, '2019-05-25', 0.43, 0),
(113, 25203020, '2019-05-25', 0.43, 0),
(114, 35200915, '2019-05-25', 0.43, 0),
(115, 123456, '2019-05-25', 0.43, 0),
(116, 35201103, '2019-05-25', 0.43, 0),
(117, 367601, '2019-05-25', 0.43, 0),
(118, 30623, '2019-05-25', 0.43, 0),
(119, 35201261, '2019-05-25', 0.43, 0),
(120, 367601, '2019-05-25', 0.45, 1),
(121, 367601, '2019-05-25', 0.45, 0),
(122, 35201261, '2019-05-25', 1.01, 1),
(123, 30623, '2019-05-25', 1.01, 1),
(124, 367601, '2019-05-25', 1.01, 1),
(125, 35201103, '2019-05-25', 1.01, 1),
(126, 123456, '2019-05-25', 1.01, 1),
(127, 35200915, '2019-05-25', 1.01, 1),
(128, 25203020, '2019-05-25', 1.01, 1),
(129, 25202962, '2019-05-25', 1.01, 1),
(130, 25203031, '2019-05-25', 1.01, 1),
(131, 35200923, '2019-05-25', 1.01, 1),
(132, 367601, '2019-05-25', 1.08, 0),
(133, 367601, '2019-05-25', 1.08, 1),
(134, 35201103, '2019-05-25', 1.5, 0),
(135, 35201103, '2019-05-25', 1.5, 1),
(136, 35201261, '2019-05-25', 12.38, 0),
(137, 35201261, '2019-05-25', 13.32, 1),
(138, 35201261, '2019-05-25', 14.03, 0),
(139, 35201261, '2019-05-25', 16.51, 1),
(140, 367601, '2019-05-25', 16.56, 0),
(141, 30623, '2019-05-25', 16.56, 0),
(142, 35201103, '2019-05-25', 16.56, 0),
(143, 25203031, '2019-05-25', 16.56, 0),
(144, 35200923, '2019-05-25', 16.56, 0),
(145, 25203020, '2019-05-25', 17.02, 0),
(146, 123456, '2019-05-25', 17.02, 0),
(147, 35200915, '2019-05-25', 17.02, 0),
(148, 25202962, '2019-05-25', 17.02, 0),
(149, 35201261, '2019-05-25', 17.02, 0),
(150, 35201261, '2019-05-25', 18.18, 1),
(151, 30623, '2019-05-25', 18.18, 1),
(152, 367601, '2019-05-25', 18.18, 1),
(153, 35201103, '2019-05-25', 18.18, 1),
(154, 123456, '2019-05-25', 18.18, 1),
(155, 35200915, '2019-05-25', 18.18, 1),
(156, 25203020, '2019-05-25', 18.18, 1),
(157, 25202962, '2019-05-25', 18.18, 1),
(158, 25203031, '2019-05-25', 18.18, 1),
(159, 35200923, '2019-05-25', 18.18, 1),
(160, 35201261, '2019-05-25', 18.18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_dates`
--

CREATE TABLE `meeting_dates` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting_dates`
--

INSERT INTO `meeting_dates` (`id`, `title`, `description`, `date`, `timeStart`, `timeEnd`, `link`) VALUES
(10, 'Programming Meeting', 'Work on server. Work on robot and work on inventory app.', '2019-05-28', '18:30:00', '21:05:00', 'https://docs.google.com/document/d/1-K2O-6SfOEx4KsnoqW-zlaHmu3tA3doGh-UXItBsO8k/edit?usp=drivesdk'),
(11, 'Fish Fry', 'Fundraiser at the Knights of Columbus in Amherstburg', '2019-05-24', '15:30:00', '21:30:00', 'http://a-teamrobotics.com');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `uid` varchar(12) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hours` double NOT NULL,
  `presence` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`uid`, `firstName`, `lastName`, `dateAdded`, `hours`, `presence`) VALUES
('030623', 'Brendan', 'Fox', '2019-05-25 22:18:37', 4.05, 1),
('123456', 'Justin', 'Bornais', '2019-05-25 22:18:39', 7.03, 1),
('25202962', 'Mackenzie', 'Parks', '2019-05-25 22:18:41', 1.82, 1),
('25203020', 'Keaton', 'Conaty', '2019-05-25 22:18:40', 1.84, 1),
('25203031', 'Max', 'Beaudoin', '2019-05-25 22:18:42', 2.27, 1),
('35200915', 'Kaeleb', 'Mickle', '2019-05-25 22:18:40', 1.84, 1),
('35200923', 'Nick', 'Laframboise ', '2019-05-25 22:18:42', 2.55, 1),
('35201103', 'Ethan', 'Richard', '2019-05-25 22:18:38', 2.55, 1),
('35201261', 'Adam', 'Tronchin', '2019-05-25 22:18:52', 16.38, 0),
('367601', 'Cody', 'Drouillard', '2019-05-25 22:18:38', 2.26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `present_record`
--

CREATE TABLE `present_record` (
  `id` int(12) NOT NULL,
  `uid` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `time` double NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `present_record`
--

INSERT INTO `present_record` (`id`, `uid`, `date`, `time`, `state`) VALUES
(62, '1120', '2019-05-12', 12.08, 0),
(136, '35201621', '2019-05-24', 22.21, 0),
(147, '35201621', '2019-05-24', 22.58, 1),
(180, '367601', '2019-05-25', 16.56, 0),
(181, '030623', '2019-05-25', 16.56, 0),
(182, '35201103', '2019-05-25', 16.56, 0),
(183, '25203031', '2019-05-25', 16.56, 0),
(184, '35200923', '2019-05-25', 16.56, 0),
(185, '25203020', '2019-05-25', 17.02, 0),
(186, '123456', '2019-05-25', 17.02, 0),
(187, '35200915', '2019-05-25', 17.02, 0),
(188, '25202962', '2019-05-25', 17.02, 0),
(191, '030623', '2019-05-25', 18.18, 1),
(192, '367601', '2019-05-25', 18.18, 1),
(193, '35201103', '2019-05-25', 18.18, 1),
(194, '123456', '2019-05-25', 18.18, 1),
(195, '35200915', '2019-05-25', 18.18, 1),
(196, '25203020', '2019-05-25', 18.18, 1),
(197, '25202962', '2019-05-25', 18.18, 1),
(198, '25203031', '2019-05-25', 18.18, 1),
(199, '35200923', '2019-05-25', 18.18, 1),
(200, '35201261', '2019-05-25', 18.18, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absent_record`
--
ALTER TABLE `absent_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_action_log`
--
ALTER TABLE `admin_action_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_dates`
--
ALTER TABLE `meeting_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `present_record`
--
ALTER TABLE `present_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absent_record`
--
ALTER TABLE `absent_record`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_action_log`
--
ALTER TABLE `admin_action_log`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `meeting_dates`
--
ALTER TABLE `meeting_dates`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `present_record`
--
ALTER TABLE `present_record`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
