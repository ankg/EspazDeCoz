-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2014 at 02:30 PM
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_title` varchar(30) NOT NULL,
  `course_id` int(20) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(40) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`,`alternate_email`,`enroll`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Users Data ' AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `alternate_email`, `password`, `enroll`, `fullname`, `branch`, `designation`, `courses`, `salt`) VALUES
(2, 'saksham', 'aryasuec@iitr.ac.in', '', '$2y$10$guu7Gyhpu3ZuhLS3Mi1QZOOPGg8tIVc20', 0, 'Saksham', '', 0, '', '0'),
(3, 'jdskfn', 'uiesrfdjk', '', '$2y$10$oLo5ZlGMRocQvIHUE0o4oe.Ng01T/IVgq', 0, 'jrkdsfxn', '', 0, '', '0'),
(5, 'ada', 'u', '', '$2y$10$KyGkKACWJlpi9q7dRZQuEe8WFy0X8nSN9', 0, 'jrkdsfxn', '', 0, '', '$6$tbs4Ds9jhns.$duyAIyfH.PwH7WqF1oxPxjU0F4VTzk2kaE'),
(6, 'asaassss', 'u', '', '$2y$10$UYza4JOzTnuwOk7Z/QuRjez6gdtCF5zVl', 0, 'jrkdsfxn', '', 0, '', '$6$cSrv/m.MXGHd$Jh6rOywHPd4rUD9D1o/w4vr1.fo7zN9D.d'),
(7, 'qwertyyuiop', 'u', '', '$2y$10$AEnT0OzYlQcnhI6Bgp81ZemUmf8Iu0Me/', 0, 'jrkdsfxn', '', 0, '', '$6$5b52RppKS.CK$bcfsIY70qjTLSJG/mtdeGTTqbefgGM3zD/'),
(8, 'qwertyyuiopnmk', 'u', '', '$2y$10$LU1wRA6BrQfD3RwHc2i0YO/5rPfmxkuUT', 0, 'jrkdsfxn', '', 1, '', '$6$BxDA2LSV0f0L$gcDs5sM01R8SEAUAIG58LSetLl2iQym9Ct'),
(9, 'as', 'sadaseee@iitr.ac.in', '', '$2y$10$U5c4WYejuNzl/KR3oqDUXecoxfIZoq4Pc', 0, 'sad', '', 0, '', '$6$QfPmYaQsEUAt$gpenrbY0IhPrCmy1B8uOQb6qtNXbsoRulR'),
(10, 'a', 'aaaaaaaa@iitr.ac.in', '', '$2y$10$OQWZYnR9uJXlqv67gX.nh.tiruIH10G3w', 0, 'a', '', 0, '', '$6$GEXJ5mD3ez8J$7UyS2wi4Scfp3gsX5.yC4fYO.osmZk4gWW'),
(12, 'aniket', 'asddasue@iitr.ac.in', '', '$2y$10$1JVihKhwsQJor67e8fyVXuTI9kqJSw5iZ', 0, 'as', '', 0, '', '$6$PjY7PQk68yoU$uE9JWO8f2Nsn6RpDCSdpvBW2pAdH24za3Y'),
(13, 'ankg', 'ankgruec@iitr.ac.in', '', '$2y$10$KA3OBRZZZrSdW2L7RqTc7eAQkIGMtiG6n', 0, 'Aniket', '', 0, '', '$6$MmBClYXleV2x$5R8Jkdd2n2l8.NwqgaIC/K4FbzH0RY2kZH'),
(15, '', '', '', '', 0, '', '', 0, '', ''),
(18, 'aa', 'aaaaaaaa@iitr.ac.in', '', '$2y$10$0U0LnjFRd2gU1hpQbWkw5uxWqW.sEKRvO', 0, 'aaa', '', 0, '', '$6$1VFetTZOki98$Fe4e42s.U/oaU0oHLSUA2hYkMubpo6kt/f'),
(19, 'ankgiitr', 'ankgrues@iitr.ac.in', '', '$2y$10$qJI6XKzJ9CeUaOmdvAcVxOSQh1hIREP4u', 0, 'sa', '', 0, '', '$6$XMufG9GzRtvg$O.F.yjfVI5tDe7HiLCNjWgJxO2qflhDNOx'),
(20, 'baba', 'nanaruec@iitr.ac.in', '', '$2y$10$q93ZYcrbXU1lgtQs2ysGwe4HOlQQAH8I3PtE6544uW840tk6JDxU.', 0, 'a', '', 0, '', '$6$c1O.TT5hNThk$EpTlaSKlgMKCQyED8EuU6kaew3EVOtplttmw');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses_map`
--

CREATE TABLE IF NOT EXISTS `user_courses_map` (
  `uid` int(20) NOT NULL,
  `course_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
