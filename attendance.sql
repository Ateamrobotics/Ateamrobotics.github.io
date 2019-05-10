-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 04:26 AM
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
(16, 123456, '2019-05-09', 22.14, 0);

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
  `timeEnd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('030623', 'Brendan', 'Fox', '2019-05-10 01:33:08', 0, 0),
('123456', 'Justin', 'Bornais', '2019-05-10 02:14:34', 3.79, 0),
('25202962', 'Mackenzie', 'Parks', '2019-05-09 12:41:28', 0, 1),
('25203020', 'Keaton', 'Conaty', '2019-05-09 12:41:28', 0, 1),
('25203031', 'Max', 'Beaudoin', '2019-05-09 12:41:28', 0, 1),
('35200915', 'Kaeleb', 'Mickle', '2019-05-09 12:41:28', 0, 1),
('35200923', 'Nick', 'Laframboise ', '2019-05-09 12:41:28', 0, 1),
('35201103', 'Ethan', 'Richard', '2019-05-09 12:41:28', 0, 1),
('35201621', 'Adam', 'Tronchin', '2019-05-09 21:50:49', 0.66, 1),
('367601', 'Cody', 'Drouillard', '2019-05-09 12:41:28', 0, 1);

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
(49, '35201621', '2019-05-09', 17.44, 0),
(50, '35201621', '2019-05-09', 17.5, 1),
(55, '030623', '2019-05-09', 21.33, 0),
(56, '123456', '2019-05-09', 22.14, 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `meeting_dates`
--
ALTER TABLE `meeting_dates`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `present_record`
--
ALTER TABLE `present_record`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
