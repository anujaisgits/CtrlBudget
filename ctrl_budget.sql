-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2020 at 05:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctrl_budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_det`
--

DROP TABLE IF EXISTS `bill_det`;
CREATE TABLE IF NOT EXISTS `bill_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `title_bill` varchar(255) NOT NULL,
  `amount_spent` int(11) NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `paid_on` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_and_person`
--

DROP TABLE IF EXISTS `plan_and_person`;
CREATE TABLE IF NOT EXISTS `plan_and_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `person` varchar(255) NOT NULL,
  `expenses` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_det`
--

DROP TABLE IF EXISTS `plan_det`;
CREATE TABLE IF NOT EXISTS `plan_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `last_date` date NOT NULL,
  `budget` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_det`
--
ALTER TABLE `bill_det`
  ADD CONSTRAINT `bill_det_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan_det` (`id`);

--
-- Constraints for table `plan_and_person`
--
ALTER TABLE `plan_and_person`
  ADD CONSTRAINT `plan_and_person_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan_det` (`id`);

--
-- Constraints for table `plan_det`
--
ALTER TABLE `plan_det`
  ADD CONSTRAINT `plan_det_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
