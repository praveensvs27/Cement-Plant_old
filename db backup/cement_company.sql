-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 192.168.1.42:3310
-- Generation Time: Mar 25, 2023 at 06:27 AM
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
-- Table structure for table `cement_company`
--

CREATE TABLE `cement_company` (
  `cement_company_id` int(11) NOT NULL,
  `cement_company` varchar(250) NOT NULL,
  `cement_group_id` int(11) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cement_company`
--

INSERT INTO `cement_company` (`cement_company_id`, `cement_company`, `cement_group_id`, `create_dt`, `update_dt`, `status`) VALUES
(1, 'Asian Concretes and Cements Pvt. Ltd.', 1, '2023-03-23 12:33:07', '2023-03-23 12:33:07', 1),
(2, 'UltraTech Cement Ltd', 2, '2023-03-23 12:33:30', '2023-03-23 12:33:30', 1),
(4, 'Amrit Cement India Ltd', 3, '2023-03-23 12:33:50', '2023-03-23 12:33:50', 1),
(5, 'Asian Fine Cements PVt Ltd', 1, '2023-03-23 12:34:12', '2023-03-23 12:34:12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cement_company`
--
ALTER TABLE `cement_company`
  ADD PRIMARY KEY (`cement_company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cement_company`
--
ALTER TABLE `cement_company`
  MODIFY `cement_company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
