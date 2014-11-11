-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2014 at 10:36 AM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coursp`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branch_id` int(3) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`) VALUES
(1, 'Architecture and Planning'),
(2, 'Applied Science and Engineering'),
(3, 'Biotechnology'),
(4, 'Chemical Engineering'),
(5, 'Chemistry'),
(6, 'Civil Engineering'),
(7, 'Computer Science and Engineering'),
(8, 'Earthquake Engineering'),
(9, 'Earth Sciences'),
(10, 'Electrical Engineering'),
(11, 'Electronics and Communication Engineering'),
(12, 'Humanities and Social Sciences'),
(13, 'Hydrology'),
(14, 'Management Studies'),
(15, 'Mathematics'),
(16, 'Mechanical and Industrial Engineering'),
(17, 'Metallurgical and Materials Engineering'),
(18, 'Paper Technologies'),
(19, 'Polymer and Process Engineering'),
(20, 'Physics'),
(21, 'Water Resources Development and Management');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `post_id` int(20) NOT NULL,
  `comment` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_title` varchar(30) NOT NULL,
  `course_id` int(20) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `branch_id` int(3) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_title`, `course_id`, `course_name`, `branch_id`) VALUES
('EC-201', 3, 'Linear Circuits', 7),
('EC-202', 4, 'Signals and Systems', 7),
('EC-203', 5, 'Digital Electronics', 7),
('EC-251', 6, 'Data Structures', 7),
('EC-252', 7, 'Computer Architecture and Microprocessor', 7),
('EC-253', 8, 'System Softwares', 7),
('EC-254', 9, 'Discrete Structures', 7),
('EC-262', 10, 'Digital Hardware Lab', 7),
('EC-311', 11, 'Principle of Digital Computing', 7),
('EC-351', 12, 'Design and Analysis of algorithm', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alternate_email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `enroll` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `designation` tinyint(1) NOT NULL,
  `courses` varchar(300) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `profile_image` varchar(20) NOT NULL,
  `ext` varchar(4) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`,`alternate_email`,`enroll`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Users Data ' AUTO_INCREMENT=42 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `alternate_email`, `password`, `enroll`, `fullname`, `branch`, `designation`, `courses`, `salt`, `profile_image`, `ext`) VALUES
(37, 'ankg', 'ankgruec@iitr.ac.in', '', '$2y$10$IgkFdSwnQyLT2hx8gPmR9uif6tS0li2TxwJPt3sVLhdxYPhXj93G.', 0, 'Aniket Gupta', '', 0, '', '$6$TV4V6MtQSFbw$KiRsK.OENQ2jgGE/r0jrx0sp5dQKNPlhNTvW', '15', 'JPG');

-- --------------------------------------------------------

--
-- Table structure for table `users_extra`
--

CREATE TABLE IF NOT EXISTS `users_extra` (
  `uid` int(20) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `year` int(1) NOT NULL,
  `experience` varchar(512) NOT NULL,
  `skills` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_courses_map`
--

CREATE TABLE IF NOT EXISTS `user_courses_map` (
  `uid` int(20) NOT NULL,
  `course_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_courses_map`
--

INSERT INTO `user_courses_map` (`uid`, `course_id`) VALUES
(39, 4),
(39, 3),
(39, 8),
(39, 10),
(39, 9),
(39, 5),
(39, 11),
(37, 3),
(41, 7),
(41, 8),
(37, 7),
(41, 4),
(0, 3),
(0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_posts_courses`
--

CREATE TABLE IF NOT EXISTS `user_posts_courses` (
  `uid` int(20) NOT NULL,
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `post` varchar(1000) NOT NULL,
  `post_files` varchar(30) NOT NULL,
  `post_image` varchar(30) NOT NULL,
  `course_id` int(20) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user_posts_courses`
--

INSERT INTO `user_posts_courses` (`uid`, `post_id`, `post`, `post_files`, `post_image`, `course_id`, `timestamp`) VALUES
(37, 60, 'fuck', '', '', 3, '1415554645'),
(0, 61, 'wtf', '', '', 3, '1415560388'),
(0, 62, 'wtf', '', '', 3, '1415560388'),
(0, 63, 'wtf', '', '', 3, '1415560389'),
(37, 64, 'Yo!', '', '', 7, '1415563457'),
(37, 65, 'Hey!', '', '', 7, '1415563485');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `post_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `downvotes` int(20) NOT NULL,
  `upvotes` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
