-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 01:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regesteration`
--

-- --------------------------------------------------------

--
-- Table structure for table `rools`
--

CREATE TABLE `rools` (
  `r_id` int(2) NOT NULL,
  `r_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rools`
--

INSERT INTO `rools` (`r_id`, `r_name`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(2) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `u_password` varchar(20) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `r_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_password`, `u_email`, `username`, `r_id`) VALUES
(19, 'mohamed samy mo', '04e79', 'mohamed23@gmail.com', 'mosamy', 1),
(21, 'amal', '123456', 'amal123@gmail.com', 'amola', 1),
(22, 'asmaa', '123456', 'asmaa23@gmail.com', 'semsema', 3),
(28, 'Mohamed Samy', '9f81e', 'mohamedsamy680@gmail.com', 'mohamedsamy680', 2),
(31, '', '', 'mahmoud.fahmy@hotmail.com', 'mahmoud Fahmy', 1),
(32, 'ayda ebrahim azzam', '04e79', 'aya123@gmail.com', 'ayda123', 1),
(33, 'Mohamed Ali', 'ee7bb', 'mmali77@gmail.com', 'mmali', 2),
(34, 'Ahmed Abd Rabo', 'ee7bb', 'ahmed_abdrabo@outlook.com', 'AhmedAbdRabo', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rools`
--
ALTER TABLE `rools`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `r_id` (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rools`
--
ALTER TABLE `rools`
  MODIFY `r_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `rools` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
