-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2015 at 08:20 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socio`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL,
  `postid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) NOT NULL,
  `user1` int(10) NOT NULL,
  `user2` int(10) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `activityid` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user1`, `user2`, `text`, `activityid`, `timestamp`) VALUES
(2, 14, 14, '				hello', 1, '2015-10-28 14:21:38'),
(3, 14, 14, '				hello wporld', 1, '2015-10-28 14:27:45'),
(4, 14, 14, '				ok', 1, '2015-10-28 14:38:05'),
(10, 14, 14, '		affsd		', 1, '2015-10-29 08:43:46'),
(11, 14, 14, '				klrjvevkmvkmkvm', 1, '2015-10-29 08:46:25'),
(12, 14, 14, '				klrjvevkmvkmkvm', 1, '2015-10-29 08:51:01'),
(13, 14, 14, '			njxn	', 1, '2015-10-29 08:52:46'),
(16, 20, 20, '				ewf,le,lwg', 1, '2015-10-29 09:41:15'),
(17, 13, 13, '				njenfefw', 1, '2015-10-29 13:20:39'),
(18, 14, 14, '				wfgwg', 1, '2015-10-29 13:23:31'),
(19, 14, 14, '				adsfaf', 1, '2015-10-29 13:29:47'),
(20, 14, 14, '				adsfaf', 1, '2015-10-29 13:31:06'),
(21, 13, 14, '			from saikat', 1, '2015-10-30 08:17:41'),
(22, 13, 14, '			from saikat', 1, '2015-10-30 08:21:05'),
(23, 13, 14, '			there was a brown crow', 1, '2015-10-30 09:13:43'),
(24, 13, 13, '				wassup nigger', 1, '2015-10-30 09:14:11'),
(25, 13, 14, '				fwhjfn4  j3', 1, '2015-10-30 10:33:19'),
(29, 13, 14, '				fwhjfn4  j3', 1, '2015-10-30 10:56:27'),
(30, 13, 14, '				fwhjfn4  j3', 1, '2015-10-30 10:56:49'),
(33, 20, 20, '			helllo adafdf', 1, '2015-10-31 05:33:53'),
(34, 20, 20, '			helllo adafdf', 1, '2015-10-31 05:34:20'),
(35, 20, 20, '				adfadf', 1, '2015-10-31 05:35:51'),
(36, 20, 20, '				adfadf', 1, '2015-10-31 05:36:01'),
(37, 13, 20, '				hello worls', 1, '2015-10-31 05:58:41'),
(38, 13, 13, '		hello adafasdf		', 1, '2015-11-02 07:06:36'),
(39, 13, 13, '		hello adafasdf		', 1, '2015-11-02 07:20:18'),
(40, 13, 13, '				ehco', 1, '2015-11-02 08:05:29'),
(41, 13, 13, '				ehco', 1, '2015-11-02 08:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(50) NOT NULL,
  `id` int(10) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `id`, `age`, `gender`, `email`, `password`, `profile_pic`) VALUES
('saikat', 13, 25, 'm', 'saikat@gmail.com', '123', '13.jpeg'),
('ayush', 14, 23, 'm', 'ayush@mail.com', '123', '14.jpg'),
('potter', 20, 23, 'm', 'abcd@gmail.com', '1234', '20.png'),
('valar', 21, 23, 'm', 'valar@mail.com', 'valar', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
