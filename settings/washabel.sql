-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 12:01 AM
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
-- Database: `washabel`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_sizes`
--

CREATE TABLE `car_sizes` (
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_sizes`
--

INSERT INTO `car_sizes` (`size_id`, `name`, `cost`) VALUES
(1, 'Compact', 20.00),
(2, 'Mid-size', 25.00),
(3, 'Full-size', 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(1, 'ShawnSam', '$2y$10$tbA1HvNLyvqnrfAD/S.SvuSmed4WYJV9dwj2RwE9YJxArqzqpKi9u', 'hourhiere@gmail.com', 'manager'),
(3, 'JuliusCaesar', '$2y$10$GlXOMWtclnNrdIFNOrGGZuhHUBijD.DivQBI6J6Shuth0pmaHLrmC', 'no1praetor@gmail.com', 'staff'),
(5, 'CleoPatra', '$2y$10$TE6orxgGR5gUAUxB.WegaeaTKD50hureBeKUsiSL6Wr8qvHG0jakK', 'slayKween@yahoo.com', 'manager'),
(6, 'GeorgeWashing', '$2y$10$GEoLVfHbzQyiyIUqCAGPBOxkaDmzOTzUT6Hc69A3hDWIw/hnOGxrK', 'fredandliberty@yahoo.com', 'staff'),
(7, 'WebTech', '$2y$10$k9XpU2.PO/x1NPNweS5pVOZpCRNCPvnlZZRNwNuaIMESyPU4MjUmm', 'webtech@gmail.com', 'manager'),
(8, 'MrWinn', '$2y$10$jRJ.m7Yotu5vQI8GWuiaZegj4qDn5B0FkO/AJCXBntq4LuJ/Mhesy', 'heheeee@hotmail.com', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `washes`
--

CREATE TABLE `washes` (
  `wash_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `wash_type` varchar(100) NOT NULL,
  `wash_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_name` varchar(100) DEFAULT NULL,
  `car_type` enum('Compact','Mid-size','Full-size') DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `washes`
--

INSERT INTO `washes` (`wash_id`, `staff_id`, `wash_type`, `wash_date`, `customer_name`, `car_type`, `cost`) VALUES
(1, NULL, 'Basic', '2024-04-12 17:56:29', 'Jonathan Adu', 'Compact', 50.00),
(2, NULL, 'Extensive', '2024-04-12 17:45:55', 'Omar Farouk', 'Mid-size', 135.00),
(3, NULL, 'Extensive', '2024-04-12 17:46:47', 'Kofi Adjei', 'Full-size', 140.00),
(4, NULL, 'Basic', '2024-04-12 17:57:27', 'Trevor Belmont', 'Mid-size', 55.00),
(5, NULL, 'Basic', '2024-04-12 18:21:01', 'Dave Georgia', 'Mid-size', 55.00);

-- --------------------------------------------------------

--
-- Table structure for table `wash_types`
--

CREATE TABLE `wash_types` (
  `wash_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wash_types`
--

INSERT INTO `wash_types` (`wash_type_id`, `name`, `description`, `cost`) VALUES
(1, 'Basic', 'Body cleaning and tires', 40.00),
(2, 'Medium', 'Body cleaning, tires, and interior cleaning', 60.00),
(3, 'Extensive', 'Body cleaning, tires, interior, vacuuming, and polishing', 110.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_sizes`
--
ALTER TABLE `car_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `washes`
--
ALTER TABLE `washes`
  ADD PRIMARY KEY (`wash_id`);

--
-- Indexes for table `wash_types`
--
ALTER TABLE `wash_types`
  ADD PRIMARY KEY (`wash_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_sizes`
--
ALTER TABLE `car_sizes`
  MODIFY `size_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `washes`
--
ALTER TABLE `washes`
  MODIFY `wash_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wash_types`
--
ALTER TABLE `wash_types`
  MODIFY `wash_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
