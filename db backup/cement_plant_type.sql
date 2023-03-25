-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 192.168.1.42:3310
-- Generation Time: Mar 25, 2023 at 06:28 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zigmaglo_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cement_plant_type`
--

CREATE TABLE `cement_plant_type` (
  `cement_plant_type_id` int(11) NOT NULL,
  `cement_plant_type` varchar(250) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cement_plant_type`
--

INSERT INTO `cement_plant_type` (`cement_plant_type_id`, `cement_plant_type`, `create_dt`, `update_dt`, `status`) VALUES
(3, 'Cement Plant', '2023-03-23 12:22:32', '2023-03-23 12:22:32', 1),
(8, 'Power Plant', '2023-03-23 13:36:16', '2023-03-23 13:36:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cement_plant_type`
--
ALTER TABLE `cement_plant_type`
  ADD PRIMARY KEY (`cement_plant_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cement_plant_type`
--
ALTER TABLE `cement_plant_type`
  MODIFY `cement_plant_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
