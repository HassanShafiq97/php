-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 03:28 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(50) DEFAULT 'Pakistan',
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `father_name`, `address`, `country`, `state`, `city`, `gender`, `email`, `created_at`) VALUES
(1, 'Hassan Shafique', 'Muhammad Shafique ', 'house # Gm-275 street no 20, Shaukat street naseerabad kohinoor mills Rawalpindi', 'Pakistan', 'Punjab', 'Rawalpindi', 'Male', 'hassanshafiqe97@gmail.com', '2025-05-04 09:00:02'),
(2, 'syed jabbar', 'syeh hussain', 'old airport islamabad', 'Pakistan', 'Gilgit Baltistan', 'Islamabad', 'Female', 'jabbar@gmail.com', '2025-05-04 09:02:32'),
(5, 'Hassan Shafique', 'Muhammad Shafique ', 'house # Gm-275 street no 20, Shaukat street naseerabad kohinoor mills Rawalpindi', 'Pakistan', 'Sindh', 'Rawalpindi', 'Female', 'hassanshafiqe97@gmail.com', '2025-05-04 13:26:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
