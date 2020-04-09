-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2019 at 08:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uberdispose`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcollectors`
--

CREATE TABLE `tblcollectors` (
  `id` int(11) NOT NULL,
  `mission` varchar(250) NOT NULL,
  `vision` varchar(250) NOT NULL,
  `collectorname` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `rating` float NOT NULL,
  `bir` varchar(250) NOT NULL,
  `barangay` varchar(250) NOT NULL,
  `tin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcollectors`
--

INSERT INTO `tblcollectors` (`id`, `mission`, `vision`, `collectorname`, `status`, `location`, `owner`, `rating`, `bir`, `barangay`, `tin`) VALUES
(34, 'sample mission', 'sample vision', 'sample collector name', 'Activated', 'sample location collector', 'sample owner collector name', 4, '222', '222', '222'),
(39, 'sample mission', 'samplevisinon', 'collectorko', 'Activated', 'Dagupan', 'haji', 0, '12', '', '12132');

-- --------------------------------------------------------

--
-- Table structure for table `tblcollectorsrequest`
--

CREATE TABLE `tblcollectorsrequest` (
  `id` int(10) NOT NULL,
  `date` varchar(250) NOT NULL,
  `collectorname` varchar(250) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `mark` varchar(250) NOT NULL,
  `restaurant` varchar(250) NOT NULL,
  `time2` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `price` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcollectorsrequest`
--

INSERT INTO `tblcollectorsrequest` (`id`, `date`, `collectorname`, `rating`, `location`, `mark`, `restaurant`, `time2`, `time`, `price`) VALUES
(21, 'MWF', 'sample collector name', '4', 'sample location collector', 'Available', '', '4:30 PM', '3:30 PM', 0),
(22, 'mwf', 'sample collector name', '4', 'sample location collector', 'Available', '', '6:45 PM', '4:45 PM', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tblrating`
--

CREATE TABLE `tblrating` (
  `id` int(10) NOT NULL,
  `rating` int(10) NOT NULL,
  `collectorname` varchar(250) NOT NULL,
  `restaurant` varchar(250) NOT NULL,
  `feedback` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrating`
--

INSERT INTO `tblrating` (`id`, `rating`, `collectorname`, `restaurant`, `feedback`) VALUES
(37, 4, 'sample collector name', 'sample resto name', ''),
(38, 4, 'sample collector name', 'sample resto name', ''),
(39, 4, 'sample collector name', 'sample resto name', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

CREATE TABLE `tblrequest` (
  `id` int(100) NOT NULL,
  `request` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `restaurant` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `collectorname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrequestrestaurant`
--

CREATE TABLE `tblrequestrestaurant` (
  `id` int(10) NOT NULL,
  `restaurant` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `collector` varchar(250) NOT NULL,
  `mark` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `time2` varchar(250) NOT NULL,
  `loadgarbage` varchar(250) NOT NULL,
  `addofall` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrestaurant`
--

CREATE TABLE `tblrestaurant` (
  `id` int(10) NOT NULL,
  `restaurantname` varchar(250) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrestaurant`
--

INSERT INTO `tblrestaurant` (`id`, `restaurantname`, `owner`, `location`) VALUES
(7, 'sample resto name', 'sample owner name', 'sample restaurant location');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `username`, `password`, `type`, `owner`, `status`) VALUES
(1, 'admin', 'admin', 'Admin', 'zeus', 'Activated'),
(46, 'resto', '123', 'Restaurant', 'sample owner name', 'Activated'),
(47, 'collector', '123', 'Collector', 'sample owner collector name', 'Activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcollectors`
--
ALTER TABLE `tblcollectors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `collectorname` (`collectorname`),
  ADD UNIQUE KEY `owner` (`owner`),
  ADD UNIQUE KEY `bir` (`bir`,`tin`);

--
-- Indexes for table `tblcollectorsrequest`
--
ALTER TABLE `tblcollectorsrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrating`
--
ALTER TABLE `tblrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrequestrestaurant`
--
ALTER TABLE `tblrequestrestaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrestaurant`
--
ALTER TABLE `tblrestaurant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurantname` (`restaurantname`,`owner`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `owner` (`owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcollectors`
--
ALTER TABLE `tblcollectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblcollectorsrequest`
--
ALTER TABLE `tblcollectorsrequest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblrating`
--
ALTER TABLE `tblrating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrequestrestaurant`
--
ALTER TABLE `tblrequestrestaurant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrestaurant`
--
ALTER TABLE `tblrestaurant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
