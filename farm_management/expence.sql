-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 07:51 AM
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
-- Database: `farmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `expence`
--

CREATE TABLE `expence` (
  `method` varchar(20) NOT NULL,
  `expence_name` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `expence_date` date NOT NULL,
  `farmer_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expence`
--
ALTER TABLE `expence`
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expence`
--
ALTER TABLE `expence`
  ADD CONSTRAINT `farmer_id` FOREIGN KEY (`farmer_id`) REFERENCES `signup` (`farmer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
