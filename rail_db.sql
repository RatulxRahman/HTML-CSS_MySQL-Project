-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 09:12 PM
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
-- Database: `rail_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticketbookings`
--

CREATE TABLE `ticketbookings` (
  `id` int(11) NOT NULL,
  `train` varchar(100) NOT NULL,
  `departure_location` varchar(100) NOT NULL,
  `arrival_location` varchar(100) NOT NULL,
  `travel_date` date NOT NULL,
  `passengers` int(11) NOT NULL,
  `national_id` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketbookings`
--

INSERT INTO `ticketbookings` (`id`, `train`, `departure_location`, `arrival_location`, `travel_date`, `passengers`, `national_id`, `phone_number`) VALUES
(1, 'dhaka_express', 'Dhaka', 'Chittagong', '2024-04-19', 5, '41654561524547242', '145-454-4155'),
(6, 'chittagong_shuttle', 'Cumilla', 'Faridput', '2024-04-11', 5, '43452222423', '145-454-4155'),
(7, 'dhaka_express', 'Cumilla', 'Faridput', '2024-04-26', 4, '3234234234', '145-454-4155');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticketbookings`
--
ALTER TABLE `ticketbookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticketbookings`
--
ALTER TABLE `ticketbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
