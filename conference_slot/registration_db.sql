-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2023 at 11:17 AM
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
-- Database: `registration_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `edit_log`
--

CREATE TABLE `edit_log` (
  `id` int(11) NOT NULL,
  `edited_By` varchar(200) NOT NULL,
  `edited_At` datetime NOT NULL,
  `edited_field` varchar(255) NOT NULL,
  `edited_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edit_log`
--

INSERT INTO `edit_log` (`id`, `edited_By`, `edited_At`, `edited_field`, `edited_value`) VALUES
(1, 'akashhalder520@gmail.com', '2023-09-21 06:43:42', '', ''),
(2, 'akashhalder520@gmail.com', '2023-09-21 11:27:47', 'profile_img', 'images/tom.jpeg'),
(3, 'akashhalder520@gmail.com', '2023-09-21 11:27:47', 'gender', 'Male'),
(4, 'akashhalder520@gmail.com', '2023-09-21 11:27:47', 'city', 'kolkata'),
(5, 'akashhalder520@gmail.com', '2023-09-21 12:17:35', 'profile_img,gender,education', 'images/,female,B.tech,M.Tech,BCA,MCA,B.Sc'),
(6, 'akashhalder520@gmail.com', '2023-09-21 15:10:02', 'profile_img,mobile,gender,city,education', 'images/photo.jpeg,,Male,kolkata,BCA,MCA'),
(7, 'akashhalder520@gmail.com', '2023-09-21 15:10:22', 'profile_img,mobile', 'images/Untitled.png,');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `profile_img` varchar(400) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `education` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isDelete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `profile_img`, `name`, `email`, `password_hash`, `mobile`, `gender`, `city`, `education`, `lastlogin`, `created_at`, `status`, `isDelete`) VALUES
(34, 'images/', 'asdfasdf', 'asdf@adfa.com', '$2y$10$koZaszGCWVkxWwrxUwbNEuUPS0aA0t8mya52ySL5BQtR1.pbzUDAe', '213123213123', 'male', 'Siliguri', 'B.tech,M.Tech', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(36, 'images/images.jpeg', 'Akash Halder', 'akashhalder520@gmail.com', '$2y$10$r4fGIZbq3jMvzr/tBGV2euVFYl1HiNKjZzlgS1DHRz3pCyAGRj5MG', '9877722243', 'male', 'Siliguri', 'M.Tech', '2023-09-22 14:46:35', '0000-00-00 00:00:00', 0, 1),
(39, 'images/', 'rohan', 'rohan@ggg.com', '$2y$10$MwD78Pc0O.xHHFZYVBD/O.qb4U1UmIi9HIHLhzRlUThCGfVeRiBhS', '9877743332', 'female', 'Delhi', 'M.Tech,BCA', '2023-09-04 13:29:12', '2023-09-04 09:36:28', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `edit_log`
--
ALTER TABLE `edit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `edit_log`
--
ALTER TABLE `edit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
