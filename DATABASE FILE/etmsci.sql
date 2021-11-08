-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 07:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etmsci`
--

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

CREATE TABLE `senior` (
  `senior_id` int(10) NOT NULL,
  `junior_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senior`
--

INSERT INTO `senior` (`senior_id`, `junior_id`) VALUES
(3, 2),
(3, 7),
(18, 3),
(7, 18),
(4, 18),
(4, 19),
(20, 4),
(20, 3),
(20, 6),
(3, 21),
(3, 22);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `todo_id` int(10) NOT NULL,
  `todo_name` varchar(250) NOT NULL,
  `todo_status` int(1) NOT NULL,
  `todo_date` date NOT NULL,
  `todo_comment` text NOT NULL,
  `assign_to` int(10) NOT NULL,
  `assign_from` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`todo_id`, `todo_name`, `todo_status`, `todo_date`, `todo_comment`, `assign_to`, `assign_from`) VALUES
(3, 'Demo', 1, '2021-05-18', 'Demo Demo Demo', 7, 1),
(4, 'Meetings at sharp 1:35 PM', 1, '2021-05-18', 'Attend meeting with clients regarding features and other updates', 1, 1),
(5, 'Online Meetings', 0, '2021-05-18', 'Held Online Meetings regarding further plans for the company', 20, 20),
(6, 'Meeting with new clients for something', 1, '2021-05-18', 'This is a demo text!!', 1, 1),
(7, 'Develop Website', 1, '2021-05-18', 'Completed, submitted for testings', 22, 1),
(8, 'Testings', 0, '2021-05-18', 'To test website submitted by Keith, deadline is near', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_role`, `user_email`, `user_password`) VALUES
(1, 'Admin', 'Administrator', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Charles Turner', 'Hardware Technician', 'charles@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Elizabeth', 'IT Project Manager', 'elizabeth@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Daryl S Gomes\n', 'Help Desk Support', 'daryl@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Lois Kent', 'Business Analyst', 'loisk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'Thomas Conlon', 'Network Administrator', 'thomasc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(20, 'Will Williams', 'IT Director', 'williams@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(21, 'Kathleen Bennett', 'Software Testing & Quality Assurance', 'kathleen@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(22, 'Keith Bishop', 'Developer', 'keith@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
