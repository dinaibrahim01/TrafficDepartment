-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 02:39 AM
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
-- Database: `traffic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_model` int(15) NOT NULL,
  `car_number` varchar(50) NOT NULL,
  `car_brand` varchar(50) NOT NULL,
  `car_color` varchar(50) NOT NULL,
  `car_owner` varchar(50) NOT NULL,
  `owner_num` int(50) NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `owner_pass` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_model`, `car_number`, `car_brand`, `car_color`, `car_owner`, `owner_num`, `owner_email`, `owner_pass`, `date`) VALUES
(4, 2023, 'ا س د - 3542', 'bmw', 'كحلي', 'محمد سعيد', 12345, 'ms@gmail.com', '12345', '2023-05-08'),
(5, 2019, 'روس-12345', 'توسان', 'ابيض', 'محمد احمد', 123456, 'ma@gmail.com', '123456', '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `grievances`
--

CREATE TABLE `grievances` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Complaint` varchar(999) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner_num` int(50) NOT NULL,
  `car_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `grievances`
--

INSERT INTO `grievances` (`id`, `email`, `Complaint`, `name`, `owner_num`, `car_num`) VALUES
(0, 'ms@gmail.com', 'السير ف الاتجاه المظبوط', 'محمد سعيد عبده', 12345, 'ا س د - 3542');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `card_number` int(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `completion_month` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `year_completion` int(50) NOT NULL,
  `cvv` int(50) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `Postal_code` int(50) NOT NULL,
  `pay` double(8,2) NOT NULL,
  `car_num` varchar(50) NOT NULL,
  `violations_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trafficviolations`
--

CREATE TABLE `trafficviolations` (
  `id` int(11) NOT NULL,
  `car_num` varchar(50) NOT NULL,
  `a_fine` int(100) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `carID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trafficviolations`
--

INSERT INTO `trafficviolations` (`id`, `car_num`, `a_fine`, `reason`, `date`, `carID`) VALUES
(39, 'ا س د - 3542', 100, 'سير عكس الاتجاه', '2023-05-23', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violations_id` (`violations_id`);

--
-- Indexes for table `trafficviolations`
--
ALTER TABLE `trafficviolations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carID` (`carID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trafficviolations`
--
ALTER TABLE `trafficviolations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`violations_id`) REFERENCES `trafficviolations` (`id`);

--
-- Constraints for table `trafficviolations`
--
ALTER TABLE `trafficviolations`
  ADD CONSTRAINT `trafficviolations_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
