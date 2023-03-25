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
-- Table structure for table `cement_plant`
--

CREATE TABLE `cement_plant` (
  `cement_plant_id` int(11) NOT NULL,
  `cement_plant` varchar(250) NOT NULL,
  `cement_plant_type_id` int(11) NOT NULL,
  `cement_company_id` int(11) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `contact_person_name` varchar(100) DEFAULT NULL,
  `contact_phone_no` varchar(100) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state_id` int(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cement_plant`
--

INSERT INTO `cement_plant` (`cement_plant_id`, `cement_plant`, `cement_plant_type_id`, `cement_company_id`, `latitude`, `longitude`, `contact_person_name`, `contact_phone_no`, `contact_email`, `city`, `state_id`, `address`, `create_dt`, `update_dt`, `status`) VALUES
(1, 'plant1_1', 3, 1, '12.967481', '80.116972', 'name1', '1321', 'r@gmail.com', 'Chennai', 1, '46,ergdfgh', '2023-03-24 11:16:49', '2023-03-24 11:16:49', 1),
(2, 'plant1', 3, 1, '13.554165', '79.383034', 'name1', '122434', 'r@gmail.com', 'Tirupati', 1, '23_sdhfjsd', '2023-03-24 11:17:15', '2023-03-24 11:17:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cement_plant`
--
ALTER TABLE `cement_plant`
  ADD PRIMARY KEY (`cement_plant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cement_plant`
--
ALTER TABLE `cement_plant`
  MODIFY `cement_plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
