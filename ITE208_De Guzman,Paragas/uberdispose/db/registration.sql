-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 12:11 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `sched`
--

CREATE TABLE `sched` (
  `sched_date` varchar(450) NOT NULL,
  `time` varchar(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL,
  `doc_user` varchar(255) NOT NULL,
  `sched_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `sched_date` varchar(250) NOT NULL,
  `t1` varchar(250) NOT NULL,
  `t2` varchar(250) NOT NULL,
  `reserve` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(116) NOT NULL,
  `password` varchar(100) NOT NULL,
  `logintype` varchar(100) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `password`, `logintype`, `gender`, `description`, `date`, `contact_no`) VALUES
(9, 'admin', 'ZEUS', '', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '0000-00-00', ''),
(31, 'staff', 'staff', 'staff', '8e2ef94cad245adb8089356242f49e55', 'staff', 'Male', 'staff', '0000-00-00', ''),
(32, 'patient', 'patient', 'patient', '881d450aaf123f74e89b773c02acf75b', 'patient', 'Male', 'patient', '0000-00-00', ''),
(33, 'doctor', 'doctor', 'doctor', '42fc09c1135efe6604ed73cf74fc71b1', 'doctor', 'Male', 'doctor', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sched`
--
ALTER TABLE `sched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sched`
--
ALTER TABLE `sched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
