-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 07:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ride`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `route` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `distance`, `is_available`, `route`) VALUES
(22, 'Erupathacor', '4', 1, 1),
(23, 'Nariyanpara', '5', 1, 1),
(24, 'Kanchiyar South', '7', 1, 1),
(25, 'Kanchiyar', '9', 1, 1),
(26, 'Labbakkada', '12', 1, 1),
(27, 'Swaraj', '15', 1, 1),
(28, 'Vettikuzhikavala', '5', 1, 2),
(29, 'ELite Jn', '7', 1, 2),
(30, 'Erattayar', '9', 1, 2),
(31, 'Santhigram', '12', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int(11) NOT NULL,
  `ride_date` varchar(20) NOT NULL,
  `from_distance` varchar(50) NOT NULL,
  `to_distance` varchar(50) NOT NULL,
  `cab_type` varchar(20) NOT NULL,
  `total_distance` varchar(50) NOT NULL,
  `luggage` varchar(50) NOT NULL,
  `total_fare` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `customer_user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `route` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route`, `status`) VALUES
(1, 'R1', 1),
(2, 'R2', 1),
(3, 'R3', 1),
(4, 'R4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateofsignup` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `isblock` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `name`, `dateofsignup`, `mobile`, `isblock`, `password`, `is_admin`) VALUES
(8, 'admin@admin.com', 'admin', '2020-11-25 03:48', '0987654321', 1, '0192023a7bbd73250516f069df18b500', 1),
(9, 'localhost@localhost.com', 'Localhost', '2020-11-25 06:03', '1234509876', 1, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(10, 'vaibhav@baba.com', 'vaibhav srivastav', '2020-11-26 11:19', '4654545444', 1, 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(11, 'newuser@new.com', 'newuser', '2020-11-27 02:55', '8888888888', 1, 'e10adc3949ba59abbe56e057f20f883e', 0),
(12, 'newuser123@new.com', 'newuser123', '2020-11-27 03:17', '9999999999', 0, '81dc9bdb52d04dc20036dbd8313ed055', 0),
(13, 'pranjal@shukla.com', 'pranjal', '2020-11-30 02:39', '8936545622522', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 0),
(14, 'local@user.com', 'local user', '2020-11-30 02:45', '23435565756', 1, 'e10adc3949ba59abbe56e057f20f883e', 0),
(15, 'abc@gmail.com', 'abc444', '2020-12-01 03:31', '7865434663', 0, '202cb962ac59075b964b07152d234b70', 0),
(20, 'random@random.rr', 'random', '2020-12-02 06:01', '2436464644', 0, '202cb962ac59075b964b07152d234b70', 0),
(28, 'test@user.com', 'test user', '2020-12-03 09:59', '7418529635', 0, 'e10adc3949ba59abbe56e057f20f883e', 0),
(30, 'user@is.com', 'user is', '2020-12-03 04:10', '5445546464', 0, 'e10adc3949ba59abbe56e057f20f883e', 0),
(36, 'new@new.in', 'new', '2020-12-03 06:42', '7898965654', 0, '202cb962ac59075b964b07152d234b70', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `id` (`customer_user_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `id` FOREIGN KEY (`customer_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
