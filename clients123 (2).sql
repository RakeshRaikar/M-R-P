-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8080
-- Generation Time: Jul 29, 2024 at 05:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clients123`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_data44`
--

CREATE TABLE `invoice_data44` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `crop` varchar(50) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `period` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `slot` varchar(255) NOT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_data44`
--

INSERT INTO `invoice_data44` (`id`, `email`, `crop`, `weight`, `period`, `total_amount`, `slot`, `STATUS`, `name`) VALUES
(1, '', 'ARECANUT', 4.00, 4, 960.00, '', 'Pending...', NULL),
(2, '', 'GINGER', 33.00, 3, 4950.00, '', 'Pending...', NULL),
(3, '', 'MILLET', 33.00, 3, 2970.00, '', 'Pending...', NULL),
(4, '', 'ARECANUT', 22.00, 3, 3960.00, '', 'Pending...', NULL),
(5, '', 'ARECANUT', 3.00, 3, 540.00, '1', 'Approved', 'rakesh');

-- --------------------------------------------------------

--
-- Table structure for table `slotavail`
--

CREATE TABLE `slotavail` (
  `slotid` int(11) NOT NULL,
  `invoice` int(11) DEFAULT NULL,
  `slotstatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slotavail`
--

INSERT INTO `slotavail` (`slotid`, `invoice`, `slotstatus`) VALUES
(0, NULL, 0),
(1, NULL, 0),
(2, NULL, 0),
(3, NULL, 0),
(4, NULL, 0),
(5, NULL, 0),
(6, NULL, 0),
(7, NULL, 0),
(8, NULL, 0),
(9, NULL, 0),
(10, NULL, 0),
(11, NULL, 0),
(12, NULL, 0),
(13, NULL, 0),
(14, NULL, 0),
(15, NULL, 0),
(16, NULL, 0),
(17, NULL, 0),
(18, NULL, 0),
(19, NULL, 0),
(20, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users123`
--

CREATE TABLE `users123` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users123`
--

INSERT INTO `users123` (`id`, `uname`, `Phone`, `address`, `email`) VALUES
(1, 'Rakesh', '7894561230', 'sagar', 'rakeshraikar.sagar2002@gmail.com'),
(4, 'Sayyam', '9874563210', 'Banglore', 'sayyam101@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_data44`
--
ALTER TABLE `invoice_data44`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slotavail`
--
ALTER TABLE `slotavail`
  ADD PRIMARY KEY (`slotid`);

--
-- Indexes for table `users123`
--
ALTER TABLE `users123`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_data44`
--
ALTER TABLE `invoice_data44`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users123`
--
ALTER TABLE `users123`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
