-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 04:21 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kashmiri_mart_0319`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `item_sub_cat_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_price` double NOT NULL,
  `item_weight` double NOT NULL,
  `item_image` text NOT NULL,
  `item_description_sh` text NOT NULL,
  `item_description_lg` text NOT NULL,
  `item_status` int(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(15) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_firstname`, `user_lastname`, `username`, `user_password`, `user_email`, `user_image`, `created_date`) VALUES
(1, 'umer', 'hurrah', 'umer', '$2y$10$ekaxxrJM.Ik57xAes4Mz3ukQhA530Y17V4llwekpFgL0ypSGr9IIO', 'umerfat@gmail.com', 'Zainab-case.jpg', '2017-11-24 18:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`

-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--

-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

