-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 07:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roombooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_etime` time NOT NULL,
  `booking_edate` date NOT NULL DEFAULT current_timestamp(),
  `room_id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date`, `booking_time`, `booking_etime`, `booking_edate`, `room_id`, `user_id`) VALUES
(1, '2023-10-19', '18:01:00', '19:01:00', '2023-10-27', 1, 2),
(2, '2023-05-30', '17:13:00', '18:30:00', '2023-06-01', 1, 2),
(3, '2023-11-09', '18:52:00', '19:50:00', '2023-11-10', 2, 2),
(7, '2023-05-30', '22:33:00', '23:00:00', '2023-05-31', 3, 2),
(8, '2023-12-12', '18:38:00', '19:38:00', '2023-12-21', 4, 2),
(10, '2023-07-07', '17:44:00', '20:44:00', '2023-05-16', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `room_id`, `user_id`, `paymentDate`, `paymentType`) VALUES
(1, 1, 1, 2, '2023-06-23', 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_code` varchar(100) NOT NULL,
  `discount` double(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_code`, `discount`) VALUES
('discount10', 10.00),
('discount20', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `user_id` int(8) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `launch_room` tinyint(1) NOT NULL DEFAULT 1,
  `price` double(10,2) NOT NULL,
  `promotion_code` double(10,2) NOT NULL,
  `room_capacity` int(10) NOT NULL,
  `select_date` date NOT NULL,
  `date_column` date NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `user_id`, `availability`, `launch_room`, `price`, `promotion_code`, `room_capacity` , `select_date`, `date_column`) VALUES
(1, 'strawberry', 1, 1, 1, 69.00, '', 5,'2023-08-23', NULL),
(2, 'kiwi', 9, 0, 1, 70.00, '', 0,'2023-08-22', NULL),
(3, 'mango', 1, 1, 1, 53.00, '', 0,'2023-08-21', NULL),
(4, 'durian', 1, 1, 1, 100.00, '', 7,'2023-08-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstName`, `lastName`, `userType`, `email`, `password`, `address`) VALUES
(1, 'femilia', 'art', 'admin', 'abc123@gmail.com', '1234', 'singapore'),
(2, 'shawn', 'luah', 'student', 'abc1234@gmail.com', '12345', 'malaysia'),
(3, 'Eric', 'Tan', 'student', 'eric123@gmail.com', '1010', 'China'),
(4, 'cat', 'fat', 'student', 'cat123@gmail.com', '1212', 'Singapore'),
(5, 'dog', 'woof', 'admin', 'dog123@gmail.com', '1313', 'China'),
(6, 'esther', 'ng', 'student', 'esther123@gmail.com', '0909', 'America'),
(7, 'sam', 'jackson', 'student', 'sam123@gmail.com', '2121', 'australia'),
(9, 'apple', 'pen', 'admin', 'apple123@gmail.com', '9999', 'singapore'),
(10, 'timothy', 'lim', 'student', 'timothy123@gmail.com', '4444', 'singapore'),
(11, 'fat', 'cow', 'student', 'fat123@gmail.com', '3232', 'china'),
(13, 'dan', 'oh', 'student', 'dan123@gmail.com', '6565', 'china');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`,`room_id`,`user_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`,`booking_id`,`room_id`,`user_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_code`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
