-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 05:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bloodGroup` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `securityQuestion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `lastname`, `dob`, `email`, `phoneNumber`, `gender`, `bloodGroup`, `password`, `securityQuestion`) VALUES
(11, 'md', 'rifat', '2023-11-01', 'rifatshikdar6@gmail.com', '01793466943', 'Male', 'A-', '111', 'orange'),
(13, 'Ri', 'Shikdar', '2023-11-02', 'rifatshikdar@gmail.com', '01793466943', 'Male', 'A+', '111', 'apple'),
(14, 'Rifatttt', 'Shikdar', '2023-11-02', 'rifat6@gmail.com', '01793466943', 'Male', 'A+', '222', 'ice'),
(15, 'aakash', 'mredul', '2023-11-03', 'yeallah@gmail.com', '01815003714', 'gender', 'A+', '666', 'milk'),
(16, 'ali', 'ali', '2023-11-02', 'yeallahabibi@gmail.com', '0111651265', 'gender', 'A+', '222', 'apple'),
(17, 'hh', 'lalafgdf', '2023-11-02', 'lililala@yahoo.com', '01793466943', 'Male', 'A+', '444', 'milk'),
(18, 'Md Rifat', 'Shikdar', '2023-11-01', 'mdhrifat6@gmail.com', '01793466943', 'Male', 'A+', '123', 'apple'),
(19, 'abc', 'ddd', '2023-11-01', 'yeallahabibi444@gmail.com', '01815003714', 'Male', 'A+', '111', 'ice'),
(20, 'hjgvy', 'dfg', '2023-11-01', 'aaaa@gmail.com', '31265465511', 'Male', 'AB+', '111', 'kola'),
(21, 'fhgbdjhk', 'sdfsdf', '2023-11-01', 'bbbbb@gmail.com', '356546646', 'Male', 'AB+', '555', 'lolita'),
(22, 'ki', 'li', '2023-11-01', 'kili@gmail.com', '31565461661', 'Male', 'A+', '111', 'apple'),
(23, 'koomo', 'fooco', '2023-11-01', 'kofo@gmail.com', '161456121', 'Female', 'A-', '666', 'milk');

-- --------------------------------------------------------

--
-- Table structure for table `testreport`
--

CREATE TABLE `testreport` (
  `email` varchar(100) NOT NULL,
  `testName` varchar(100) NOT NULL,
  `testDate` date NOT NULL,
  `medicalHistory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testreport`
--

INSERT INTO `testreport` (`email`, `testName`, `testDate`, `medicalHistory`) VALUES
('lililala@yahoo.com', 'Blood Group Test', '2023-10-31', 'Allergy'),
('rifatshikdar6@gmail.com', 'Blood Group Test', '2023-10-29', 'Diabetes ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `testreport`
--
ALTER TABLE `testreport`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `testreport`
--
ALTER TABLE `testreport`
  ADD CONSTRAINT `test` FOREIGN KEY (`email`) REFERENCES `patient` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
