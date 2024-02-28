-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 06:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `user todo list`
--

CREATE TABLE `user todo list` (
  `id` int(15) NOT NULL,
  `task_id` int(20) NOT NULL,
  `task_title` varchar(300) NOT NULL,
  `task_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user todo list`
--

INSERT INTO `user todo list` (`id`, `task_id`, `task_title`, `task_description`) VALUES
(15, 5, '', ''),
(15, 6, 'I am not posting anything', 'fshfdfdsfds'),
(15, 7, '', ''),
(15, 8, 'I am not posting anything', 'fsadadasd'),
(15, 9, 'editing', 'updated proper description'),
(15, 10, '', ''),
(15, 11, 'Doing nothing', 'vdsfsfdsf'),
(15, 12, 'dsfs', 'dbsdsf\r\n\r\n'),
(15, 13, 'show me my data', 'i want to see display of all my data'),
(17, 30, 'new title updated', 'nly updating desc'),
(17, 33, '', 'updated desc'),
(23, 35, 'adding', 'not adding'),
(32, 37, 'updated title', 'updated description');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(15) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `firstname`, `lastname`, `email`, `password`, `designation`, `image`) VALUES
(12, 'Masab', 'Khan', 'test@test.com', 'test', 'Professional', NULL),
(13, '', '', '', '', '', NULL),
(14, 'Masab', 'Khan', 'masabkhan@gmail.com', 'masabkhan', 'Professional', NULL),
(15, 'should not ', 'enter', 'enter@enter.com', 'enter', 'Student', NULL),
(16, 'khan', 'baba', 'khanbaba@hotmail.com', 'khababa', 'Professional', NULL),
(17, 'new', 'name', 'newname@newname.com', 'c', '', NULL),
(18, 'masab', 'khan', 'masabkhan420@hotmail.com', 'masabkhan420', 'Professional', NULL),
(19, 'login', 'account', 'login2@2.com', '22login', 'Student', NULL),
(20, '1', '2', '1@2.com', '1234', 'Professional', NULL),
(21, 'ali', 'khan', 'alikhan@gmail.com', 'ali123', 'Student', NULL),
(22, 'testing', 'the output', 'outputtester@gmail.com', 'tester123', 'Student', NULL),
(23, 'IMage', 'man', 'imageman@gmail.com', 'imageman.com', 'Professional', ''),
(24, 'asdad', 'dadwea', 'dasd@gmail.cm', 'asdada', 'Professional', ''),
(25, 'image', 'Man', 'imageman@hotmail.com', 'iamimageman', 'Student', ''),
(26, 'man', 'earth', 'man@earth.com', 'earthearth', 'Professional', ''),
(27, 'photo', 'image', 'pi@pi.com', 'password', 'Student', ''),
(28, 'DUbe', 'Sanon', 'dubesanon@hotmail.com', 'asd123', 'Student', ''),
(29, 'car', 'car', 'carman@gmail.com', 'asd123', 'Student', ''),
(30, 'Captain', 'Marvel', 'captainmarvel@marvel.uk', 'captainmarvel', 'Professional', 'uploads/a.jpg'),
(31, 'Mr.', 'Car', 'mr.car@car.com', 'asd123', 'Student', 'uploads/uwp1218089.jpeg'),
(32, 'a', 's', 's@as.com', 'asd123', 'Professional', 'uploads/wp2150865-cars-in-dark-wallpapers.jpg'),
(33, '', '', '', '', '', ''),
(34, '', '', '', '', '', ''),
(35, '', '', '', '', '', ''),
(36, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user todo list`
--
ALTER TABLE `user todo list`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user todo list`
--
ALTER TABLE `user todo list`
  MODIFY `task_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
