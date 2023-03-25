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
-- Table structure for table `cement_group`
--

CREATE TABLE `cement_group` (
  `cement_group_id` int(11) NOT NULL,
  `cement_group` varchar(250) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cement_group`
--

INSERT INTO `cement_group` (`cement_group_id`, `cement_group`, `create_dt`, `update_dt`, `status`) VALUES
(1, 'ACC Limited', '2023-03-23 12:15:51', '2023-03-23 12:15:51', 1),
(2, 'Aditya Birla Group', '2023-03-23 12:28:30', '2023-03-23 12:28:30', 1),
(3, 'Amrit Cement India Ltd', '2023-03-23 12:28:54', '2023-03-23 12:28:54', 1),
(5, 'Asian Concretes and Cements Pvt. Ltd.', '2023-03-23 12:29:21', '2023-03-23 12:29:21', 1),
(6, 'Bagalkot Cement & Industries Ltd.', '2023-03-23 12:29:41', '2023-03-23 12:29:41', 1),
(7, 'Birla Corporation Limited', '2023-03-23 12:31:48', '2023-03-23 12:31:48', 1),
(10, 'BK Birla Group of Companies', '2023-03-23 12:30:25', '2023-03-23 12:30:25', 1),
(11, 'Cement Corporation of India Limited (CCI)', '2023-03-23 12:30:56', '2023-03-23 12:30:56', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cement_group`
--
ALTER TABLE `cement_group`
  ADD PRIMARY KEY (`cement_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cement_group`
--
ALTER TABLE `cement_group`
  MODIFY `cement_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
