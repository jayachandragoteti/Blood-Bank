-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 02:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `availableblood`
--

CREATE TABLE `availableblood` (
  `sno` int(11) NOT NULL,
  `hospital` int(11) NOT NULL,
  `bloodGroup` varchar(4) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availableblood`
--

INSERT INTO `availableblood` (`sno`, `hospital`, `bloodGroup`, `quantity`) VALUES
(2, 1, 'A+', 10),
(3, 1, 'A-', 10),
(4, 1, 'AB+', 19);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `sno` int(11) NOT NULL,
  `hospitalName` varchar(225) NOT NULL,
  `contactNo` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`sno`, `hospitalName`, `contactNo`, `email`, `city`, `password`, `datm`) VALUES
(1, 'My Hospital', '9347886639', 'g.jayachandramohan@gmail.com', 'VISAKHAPATNAM', '$2y$10$eVkupp6gPgjfOxtsjl6m4.FcjwuHGnsV5j6jvfM1X8Rl/4BX4NG0i', '2021-07-21 10:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `sno` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactNo` varchar(12) NOT NULL,
  `address` longtext NOT NULL,
  `bloodType` varchar(3) NOT NULL,
  `password` varchar(225) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`sno`, `name`, `email`, `contactNo`, `address`, `bloodType`, `password`, `datm`) VALUES
(1, 'GOTETI JAYACHANDRA', 'gotetijayachandra@gmail.com', '9491694195', 'MEDACHARLA Village', 'B+', '$2y$10$0Lv25thlIXPSUAeUT7qmCObPfaH42GeJSiRaMT9HkrmSDJEl4nnJK', '2021-07-21 10:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `sno` int(11) NOT NULL,
  `hospital` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `bloodGroup` varchar(4) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`sno`, `hospital`, `receiver`, `bloodGroup`, `datm`) VALUES
(1, 1, 1, 'B+', '2021-07-21 11:26:25'),
(2, 1, 1, 'A-', '2021-07-21 11:26:30'),
(3, 1, 1, 'A+', '2021-07-21 11:26:34'),
(4, 1, 1, 'A+', '2021-07-21 11:27:37'),
(5, 1, 1, 'A+', '2021-07-21 11:27:51'),
(6, 1, 1, 'A+', '2021-07-21 11:27:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availableblood`
--
ALTER TABLE `availableblood`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `contactNo` (`contactNo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contactNo` (`contactNo`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availableblood`
--
ALTER TABLE `availableblood`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
