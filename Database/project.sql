-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 03:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `Eid` varchar(20) NOT NULL,
  `Tid` varchar(20) NOT NULL,
  `Dateassign` date NOT NULL,
  `Acivityid` int(20) NOT NULL,
  `Remarks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`Eid`, `Tid`, `Dateassign`, `Acivityid`, `Remarks`) VALUES
('E123', 'T123', '2023-10-17', 248, 'aa'),
('E123', 'T456', '2023-10-17', 252, 'aaa'),
('E222', 'T999', '2023-10-17', 256, 'lllllll'),
('E456', 'T456', '2023-10-24', 251, 'mmmm'),
('E456', 'T456', '2023-10-14', 252, 'f'),
('E789', 'T123', '2023-10-25', 248, 'lllll'),
('E789', 'T908', '2023-11-02', 254, 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Eid` varchar(20) NOT NULL,
  `Telephone` int(20) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Designation` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Eid`, `Telephone`, `Name`, `Email`, `Designation`) VALUES
('E123', 909090909, 'Kamal', 'kamal@kamal', 'aaaaaaa'),
('E222', 0, 'Dumidu', 'dumidu@dumidu', 'Ma1'),
('E456', 1212121212, 'Amal', 'amal@amal', 'bbbbb'),
('E789', 2147483647, 'Nimal', 'nim@nim', 'nnnnnn');

-- --------------------------------------------------------

--
-- Table structure for table `kaveesh`
--

CREATE TABLE `kaveesh` (
  `id` int(11) UNSIGNED NOT NULL,
  `taskid` varchar(20) DEFAULT NULL,
  `act` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `takactivitites`
--

CREATE TABLE `takactivitites` (
  `Acivityid` int(20) NOT NULL,
  `Tid` varchar(20) NOT NULL,
  `Activity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `takactivitites`
--

INSERT INTO `takactivitites` (`Acivityid`, `Tid`, `Activity`) VALUES
(247, 'T123', 'run'),
(248, 'T123', 'jump'),
(249, 'T123', 'walk'),
(251, 'T456', 'Kandy'),
(252, 'T456', 'Colombo'),
(254, 'T908', 'Wash'),
(255, 'T999', 'a1'),
(256, 'T999', 'a2');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `Tid` varchar(20) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Nature` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`Tid`, `Name`, `Start_date`, `End_date`, `Nature`) VALUES
('T123', 'Sports', '2023-10-10', '2023-10-26', 'ssssss'),
('T456', 'Trip', '2023-10-10', '2023-10-20', 'ttttt'),
('T908', 'Cleen', '2023-10-17', '2023-10-27', 'cccccc'),
('T999', 'T9', '2023-10-19', '2023-10-28', 'start');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `taskid` varchar(20) NOT NULL,
  `act` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(50) NOT NULL,
  `FullName` varchar(250) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `AccessL` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `FullName`, `Email`, `Password`, `AccessL`) VALUES
('jeffry123', 'Jeffry', 'jeff@jef', 'Jeffry123', 2),
('Kaveesh', 'Kaveesh Jeffry', 'kav@kav', 'Kaveesh1', 3),
('uvindu123', 'uvindu iroshan', 'uvi@uvi', 'Uvindu123', 2),
('vershan', 'Vershan', 'ver@ver', 'Vershan1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`Eid`,`Tid`,`Acivityid`),
  ADD KEY `FK_Tid` (`Tid`),
  ADD KEY `FK_Acivityid` (`Acivityid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Eid`),
  ADD UNIQUE KEY `Eid` (`Eid`);

--
-- Indexes for table `kaveesh`
--
ALTER TABLE `kaveesh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `takactivitites`
--
ALTER TABLE `takactivitites`
  ADD PRIMARY KEY (`Acivityid`),
  ADD UNIQUE KEY `Acivityid` (`Acivityid`),
  ADD KEY `FK_Tid2` (`Tid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`Tid`),
  ADD UNIQUE KEY `Tid` (`Tid`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kaveesh`
--
ALTER TABLE `kaveesh`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `takactivitites`
--
ALTER TABLE `takactivitites`
  MODIFY `Acivityid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `FK_Acivityid` FOREIGN KEY (`Acivityid`) REFERENCES `takactivitites` (`Acivityid`),
  ADD CONSTRAINT `FK_Eid` FOREIGN KEY (`Eid`) REFERENCES `employee` (`Eid`),
  ADD CONSTRAINT `FK_Tid` FOREIGN KEY (`Tid`) REFERENCES `task` (`TId`);

--
-- Constraints for table `takactivitites`
--
ALTER TABLE `takactivitites`
  ADD CONSTRAINT `FK_Tid2` FOREIGN KEY (`Tid`) REFERENCES `task` (`TId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
