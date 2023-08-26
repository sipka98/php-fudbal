-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 06:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `football match`
--

CREATE TABLE `football match` (
  `id` int(11) NOT NULL,
  `home` int(11) NOT NULL,
  `guest` int(11) NOT NULL,
  `date` date NOT NULL,
  `home goals` int(11) NOT NULL,
  `guest goals` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `number of titles` int(11) NOT NULL,
  `date of establishment` date NOT NULL,
  `coach` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `country`, `town`, `number of titles`, `date of establishment`, `coach`) VALUES
(1, 'Manchester City', 'England', 'Manchester', 6, '1894-04-16', 'Pep Guardiola'),
(2, 'Manchester United', 'England', 'Manchester', 20, '1902-11-12', 'Erik Ten Hag'),
(3, 'Real Madrid', 'Spain', 'Madrid', 21, '1902-03-06', 'Carlo Anceloti'),
(4, 'Juventus', 'Italy', 'Torino', 36, '1897-11-01', 'Massimiliano Allegri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `football match`
--
ALTER TABLE `football match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_guestId` (`guest`),
  ADD KEY `fk_homeId` (`home`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `football match`
--
ALTER TABLE `football match`
  ADD CONSTRAINT `fk_guestId` FOREIGN KEY (`guest`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_homeId` FOREIGN KEY (`home`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
