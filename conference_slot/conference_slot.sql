-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2023 at 11:16 AM
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
-- Database: `conference_slot`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_slot`
--

CREATE TABLE `booking_slot` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `day` text NOT NULL,
  `slot_time` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_slot`
--

INSERT INTO `booking_slot` (`id`, `username`, `email`, `date`, `day`, `slot_time`, `description`) VALUES
(26, 'Rohan Das', 'rohandas@gmail.com', '2023-09-28', 'Thursday', '03-04 PM', 'sadfasdf'),
(28, 'Rohan Das', 'rohandas@gmail.com', '2023-09-29', 'Friday', '10-11 AM', 'sdfafasdf'),
(32, 'Akash Halder', 'akashhalder520@gmail.com', '2023-09-29', 'Friday', '12-01 PM', 'sdfsdafsadfasdf'),
(38, 'Akash Halder', 'akashhalder520@gmail.com', '2023-10-03', 'Tuesday', '11-12 AM', 'dsfadfasdf'),
(39, 'Akash Halder', 'akashhalder520@gmail.com', '2023-09-21', 'Thursday', '11-12 AM', 'dffffffffff'),
(40, 'Akash Halder', 'akashhalder520@gmail.com', '2023-10-03', 'Tuesday', '02-03 PM', 'dsafasf');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `email`, `password`, `contact_number`, `last_login`, `created_at`, `status`) VALUES
(1, 'Akash Halder', 'akashhalder520@gmail.com', '$2y$10$37mXvVwNuepDF3Sf3WN1Cu1fH6ifH1Zmnjw8QrmbEJbqyXkYH1bSe', '9988767678', '2023-09-27 08:02:51', '2023-09-27 08:02:51', 1),
(2, 'Rohan Das', 'rohandas@gmail.com', '$2y$10$.CkjZL3fU3oZtryw2IaJ2OXAJvMgfjECL2BB6dNRnwKmVycFU4q4.', '9887654533', '2023-09-28 10:21:11', '2023-09-28 10:21:11', 1),
(3, 'Sanjukta Chowdhury', 'sanjukta@codilar.com', '$2y$10$eNlp..fiOGTmoSBCR9ShjOkktuyaOE4SuApbUkskS5KfUSckRN05O', '9634546253', '2023-09-28 11:42:25', '2023-09-28 11:42:25', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_slot`
--
ALTER TABLE `booking_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_slot`
--
ALTER TABLE `booking_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
