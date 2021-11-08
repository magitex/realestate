-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2021 at 07:16 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'test'),
(3, 'test1'),
(4, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `assign_to` int(255) DEFAULT NULL,
  `assign_by` int(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `description` text,
  `totalcost` varchar(255) DEFAULT NULL,
  `totalhour` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `category`, `assign_to`, `assign_by`, `start_date`, `description`, `totalcost`, `totalhour`, `document`, `image`, `status`) VALUES
(1, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(2, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(3, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(4, 'yyy', '4,5', 24, NULL, '2021-10-25', '666', '333', '554', '', '', 'Active'),
(5, 'yyy', '4', 24, 1, '2021-10-26', 'hhh', '333', '554', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `projectcategory`
--

DROP TABLE IF EXISTS `projectcategory`;
CREATE TABLE IF NOT EXISTS `projectcategory` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectcategory`
--

INSERT INTO `projectcategory` (`id`, `name`) VALUES
(4, 'test'),
(5, 'test1'),
(6, 'housing'),
(7, 'civil');

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

DROP TABLE IF EXISTS `senior`;
CREATE TABLE IF NOT EXISTS `senior` (
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

DROP TABLE IF EXISTS `todo`;
CREATE TABLE IF NOT EXISTS `todo` (
  `todo_id` int(10) NOT NULL AUTO_INCREMENT,
  `todo_name` varchar(250) NOT NULL,
  `todo_status` int(1) NOT NULL,
  `todo_date` date NOT NULL,
  `todo_comment` text NOT NULL,
  `assign_to` int(10) NOT NULL,
  `assign_from` int(10) NOT NULL,
  PRIMARY KEY (`todo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `user_password` varchar(150) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_role`, `user_email`, `phone`, `address`, `category`, `user_password`) VALUES
(1, 'Admin', 'Administrator', 'admin@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Elizabeth', 'IT Project Manager', 'elizabeth@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Daryl S Gomes\n', 'Help Desk Support', 'daryl@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Lois Kent', 'Business Analyst', 'loisk@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'Thomas Conlon', 'Network Administrator', 'thomasc@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e'),
(21, 'Kathleen Bennett', 'Software Testing & Quality Assurance', 'kathleen@gmail.com', NULL, NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(22, 'Keith Bishop', 'Developer', 'keith@gmail.com', NULL, NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(23, 'test', 'Customer', 'ddwwwd@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e'),
(24, 'test', 'Employee', 'ddd@gmail.com', '123456', 'gggg', '2,3', 'e10adc3949ba59abbe56e057f20f883e'),
(25, 'prosenjit', 'Employee', 'dd666d@gmail.com', '6666', 'yyyyyy', '4', 'e10adc3949ba59abbe56e057f20f883e'),
(26, 'yyyy', 'Customer', 'd333dd@gmail.com', 'uyuuu', 'hyyyhy', NULL, 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
