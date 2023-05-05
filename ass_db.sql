-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 03:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `general_appointment`
--

CREATE TABLE `general_appointment` (
  `appointment_ID` int(8) NOT NULL,
  `student_ID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `concern` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_appointment`
--

INSERT INTO `general_appointment` (`appointment_ID`, `student_ID`, `type`, `concern`, `description`, `date`, `time`) VALUES
(264650, 32127091, 1, 'Pay Balance', 'Pay Balance', '3030-03-03', '16:00:00'),
(2341652, 21016980, 3, 'Department', 'Admissions Office', '2023-05-04', '08:00:00'),
(12196487, 21016980, 2, 'Avail Book', 'Avail Book', '2023-05-04', '08:00:00'),
(25405993, 32127091, 1, 'Pay Balance', 'Pay Balance', '6969-09-06', '10:00:00'),
(40194047, 21016980, 1, 'Pay Balance', 'Pay Balance', '2222-02-22', '12:00:00'),
(60006963, 32127091, 2, 'Avail Book', 'Avail Book', '2023-05-04', '10:00:00'),
(69707441, 21016980, 1, 'Pay Balance', 'Pay Balance', '2023-02-10', '10:00:00'),
(78582270, 21016980, 1, 'Pay Balance', 'Pay Balance', '1111-11-11', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `student_ID` mediumint(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `student_number` int(8) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `appt_count` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`student_ID`, `email`, `password`, `student_number`, `fname`, `lname`, `address`, `birthdate`, `appt_count`) VALUES
(1000, 'pyre123@gmail.com', 'qwerty', 21016980, 'Pyre', 'Aron', 'Caloocan City', '2001-10-31', 0),
(1001, 'Aaronovna@gmail.com', 'qwerty', 32127091, 'Aaronovna', 'Scitus', 'Quezon City', '2001-01-13', 0),
(1002, 'zeng24@gmail.com', '3242zeng', 21121690, 'zeng', 'chi', 'dolmar 2', '2002-03-24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general_appointment`
--
ALTER TABLE `general_appointment`
  ADD PRIMARY KEY (`appointment_ID`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `student_ID` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
