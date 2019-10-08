-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 12:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wabi`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Model` varchar(300) NOT NULL,
  `Year` year(4) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `availability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `Name`, `Model`, `Year`, `Price`, `image`, `new`, `time_created`, `availability`) VALUES
(1, 'Mercedes Benz', 'v-8 ', 2018, '2,500,000', 'uploads/29-09-2019/mercedes.png', 1, '2019-10-05 07:11:01', 'Available'),
(2, 'Range Rover', 'v-6', 2017, '2,000,000', 'uploads/29-09-2019/rangeRover.png', 0, '2019-10-05 07:11:12', 'Sold'),
(3, 'Toyota ', 'Corolla', 2012, '800,000', 'uploads/29-09-2019/mercedes.png', 0, '2019-10-05 07:11:33', 'Available after 2 months'),
(4, 'Hyundai', 'v-6', 2014, '1,000,000', 'uploads/29-09-2019/rangeRover.png', 1, '2019-10-05 07:11:43', 'Available'),
(5, 'Toyota', 'vitz', 2013, '500,000', 'uploads/29-09-2019/mercedes.png', 0, '2019-10-05 07:12:11', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `origin` text NOT NULL,
  `mileage` text NOT NULL,
  `capacity` text NOT NULL,
  `power` text NOT NULL,
  `fuel` text NOT NULL,
  `fuel_consumption` text NOT NULL,
  `seat_no` double NOT NULL,
  `door_no` double NOT NULL,
  `transmission` text NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `category`, `origin`, `mileage`, `capacity`, `power`, `fuel`, `fuel_consumption`, `seat_no`, `door_no`, `transmission`, `color`) VALUES
(1, 'SUV Luxury', 'German', '0Km', '4,000cc', '400hp', 'diesel', '8 km/L', 4, 4.5, 'automatic', 'white');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `car` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
