-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2021 at 11:03 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Jay_bloodbank`
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
(1, 2, 'A+', 10),
(2, 1, 'O-', 10),
(3, 2, 'A-', 5),
(4, 1, 'O+', 5),
(5, 2, 'B+', 15),
(6, 1, 'AB-', 7),
(7, 1, 'AB+', 8),
(8, 2, 'B-', 16),
(9, 2, 'AB+', 11),
(10, 2, 'AB-', 16),
(11, 1, 'B-', 10),
(12, 1, 'B+', 10),
(13, 2, 'O+', 1),
(14, 1, 'A-', 6),
(15, 2, 'O-', 10),
(16, 1, 'A+', 6),
(17, 3, 'A+', 6),
(18, 4, 'O-', 5),
(19, 3, 'B+', 8),
(20, 4, 'O+', 53),
(21, 3, 'B-', 8),
(22, 4, 'AB-', 3),
(23, 3, 'AB+', 4),
(24, 3, 'AB-', 9),
(25, 4, 'AB+', 5),
(26, 4, 'B-', 8),
(27, 4, 'B+', 1),
(28, 4, 'A-', 13),
(29, 5, 'A+', 10),
(30, 5, 'A-', 10),
(31, 5, 'B+', 1),
(32, 5, 'B-', 8),
(33, 5, 'AB+', 42),
(34, 5, 'AB-', 4),
(35, 5, 'O+', 9),
(36, 5, 'O-', 12);

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
  `datm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`sno`, `hospitalName`, `contactNo`, `email`, `city`, `password`, `datm`) VALUES
(1, 'QUEEN\'S NRI HOSPITAL', ' 089222 25177', 'queensnrihospital@gmail.com', 'VIZIANAGARAM', '$2y$10$q0jCg1hCBFb9iI/YQJ8JUOGmwu.8.SjCd3noNz1wBCjF957HULf4S', '2021-07-23 17:35:15'),
(2, 'Abhaya Poly Clinic', '096666 33885', 'abhayapolyclinic@gmail.com', 'VIZIANAGARAM', '$2y$10$kRf55HZAF/x1aPgA67yvau.gBLwxnc5qM/JKzrm6mkckTC7D8HzI.', '2021-07-23 17:36:05'),
(3, 'Apollo Hospitals ', '089127 27272', 'apollohospitals@gmail.com', 'VISAKHAPATNAM', '$2y$10$w0RvhJlNJNKgb4aiVURnLeRzaYL8Y0Zm17OrzEZElMPB4xOu6lcgi', '2021-07-23 17:37:40'),
(4, 'CARE Hospitals', '040 6165 6565', 'carehospitals@gmail.com', 'VISAKHAPATNAM', '$2y$10$JjCrTg2RJPUfKU.T.d1fQeD3WF3dorXFB8erRcvQkRcrgbisO9V7K', '2021-07-23 17:38:31'),
(5, 'Prathima Hospitals', '040 4345 4345', 'prathimahospitals@gmail.com', 'HYDERABAD', '$2y$10$ZjCnBlIRhFErY0T6LsFRLe6x32TRfkRRcREMEHaZJFsfS/pYoKtIG', '2021-07-23 17:45:28');

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
  `datm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`sno`, `name`, `email`, `contactNo`, `address`, `bloodType`, `password`, `datm`) VALUES
(1, 'Goteti Jayachandra', 'gotetijayachandra@gmail.com', '9491694195', 'MEDACHARLA Village', 'B+', '$2y$10$NK7Lrab9T/xu8A3IAJDJb.5ie4YZbZ24a2a7HzfUZyOYGbc..9gJC', '2021-07-23 18:32:29'),
(2, 'Nikhitha', 'nikhithapusarla@gmail.com', '9985376393', 'nikhithapusarla@gmail.com', 'O+', '$2y$10$NQn8pL2m0UxYiCE15ltJT.6rFawrTptmVru6vYpfcFDkZzs2CcBLW', '2021-07-24 05:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `sno` int(11) NOT NULL,
  `hospital` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `bloodGroup` varchar(4) NOT NULL,
  `alloted` tinyint(1) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`sno`, `hospital`, `receiver`, `bloodGroup`, `alloted`, `datm`) VALUES
(1, 2, 1, 'A+', 1, '2021-07-24 05:44:02'),
(2, 2, 2, 'A+', 0, '2021-07-24 05:48:10');

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
