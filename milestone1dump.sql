-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2017 at 06:39 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE slack_lamp_stack;

USE slack_lamp_stack;


--
-- Database: `slack_lamp_stack`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

DROP TABLE IF EXISTS `channels`;
CREATE TABLE IF NOT EXISTS `channels` (
  `channel_id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(100) NOT NULL,
  `work_space_url` varchar(500) NOT NULL,
  `privacy_settings` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`channel_id`),
  KEY `wokr_space_url_channels` (`work_space_url`),
  KEY `user_id_channels` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`channel_id`, `channel_name`, `work_space_url`, `privacy_settings`, `purpose`, `user_id`, `timestamp`) VALUES
(1, 'general', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-10 04:00:00'),
(2, 'random', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-10 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `channel_messages`
--

DROP TABLE IF EXISTS `channel_messages`;
CREATE TABLE IF NOT EXISTS `channel_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL,
  `smileys` varchar(10) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `channel_id_messaged` (`channel_id`),
  KEY `user_id_messages` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel_messages`
--

INSERT INTO `channel_messages` (`message_id`, `channel_id`, `user_id`, `message`, `timestamp`, `smileys`) VALUES
(1, 1, 1, 'hello this is my first message', '2017-10-10 09:47:45', 'True'),
(2, 1, 1, 'hi dude', '2017-10-10 09:49:32', 'True'),
(3, 1, 1, 'hello', '2017-10-10 09:51:05', 'True'),
(4, 1, 1, 'hello hi', '2017-10-10 09:52:28', 'True'),
(5, 1, 1, 'hey', '2017-10-10 09:53:00', 'True'),
(6, 1, 1, 'hey\'\'\'', '2017-10-10 09:53:15', 'True'),
(7, 1, 1, 'hey\'', '2017-10-10 09:53:24', 'True'),
(8, 1, 1, 'hey this is sukesh', '2017-10-10 09:53:58', 'False'),
(9, 1, 1, 'hello this is general', '2017-10-10 10:03:08', 'False'),
(10, 1, 1, 'testing', '2017-10-10 10:04:44', 'False'),
(11, 1, 1, 'hello', '2017-10-10 11:13:20', 'False'),
(12, 1, 1, 'hello', '2017-10-10 11:13:29', 'False'),
(13, 1, 1, 'hello', '2017-10-10 11:13:38', 'False'),
(14, 1, 1, 'hello', '2017-10-10 11:13:52', 'False'),
(15, 1, 1, 'namaste', '2017-10-10 11:13:59', 'False'),
(16, 2, 1, 'helloe', '2017-10-10 11:19:43', 'False'),
(17, 2, 1, 'hello', '2017-10-10 11:20:07', 'False'),
(18, 2, 1, 'hi', '2017-10-10 11:25:44', 'False'),
(19, 2, 1, 'hi', '2017-10-10 11:25:45', 'False'),
(20, 2, 1, 'hi', '2017-10-10 11:25:59', 'False'),
(21, 1, 1, 'testing', '2017-10-11 00:03:59', 'False'),
(22, 1, 1, 'rdfgh', '2017-10-11 02:11:07', 'False'),
(23, 1, 1, 'fgthfdgyj y', '2017-10-11 02:11:17', 'False'),
(24, 1, 1, 'kjijljkl', '2017-10-11 02:11:27', 'False'),
(25, 1, 1, ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,jklkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2017-10-11 02:11:58', 'False'),
(26, 1, 1, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2017-10-11 02:16:57', 'False'),
(27, 1, 1, '<!--hjgjyh-->', '2017-10-11 02:27:08', 'False'),
(28, 1, 1, '<!--hjgjyh-->', '2017-10-11 02:27:09', 'False'),
(29, 1, 1, 'I\'m', '2017-10-11 02:40:50', 'False'),
(30, 1, 1, '<!--hjgjyh-->', '2017-10-11 02:41:04', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `channel_users`
--

DROP TABLE IF EXISTS `channel_users`;
CREATE TABLE IF NOT EXISTS `channel_users` (
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `joined_date` timestamp NOT NULL,
  `left_date` timestamp NOT NULL,
  KEY `channel_id_channel_users` (`channel_id`),
  KEY `channel_users_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel_users`
--

INSERT INTO `channel_users` (`channel_id`, `user_id`, `joined_date`, `left_date`) VALUES
(1, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(2, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `direct_messages`
--

DROP TABLE IF EXISTS `direct_messages`;
CREATE TABLE IF NOT EXISTS `direct_messages` (
  `dr_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `work_space_url` varchar(500) NOT NULL,
  PRIMARY KEY (`dr_message_id`),
  KEY `dr_from_user_id` (`from_user_id`),
  KEY `dr_to_user_id` (`to_user_id`),
  KEY `dr_work_space_url` (`work_space_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emojis`
--

DROP TABLE IF EXISTS `emojis`;
CREATE TABLE IF NOT EXISTS `emojis` (
  `emoji_id` varchar(20) NOT NULL,
  `emoji` varchar(500) NOT NULL,
  PRIMARY KEY (`emoji_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_reaction`
--

DROP TABLE IF EXISTS `message_reaction`;
CREATE TABLE IF NOT EXISTS `message_reaction` (
  `message_id` int(11) NOT NULL,
  `reaction` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `msg_id_channel_msg` (`message_id`),
  KEY `reaction_msg` (`reaction`),
  KEY `msg_reaction_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE IF NOT EXISTS `thread` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `smileys` varchar(10) NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `thread_msg_id` (`message_id`),
  KEY `thread_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread_reaction`
--

DROP TABLE IF EXISTS `thread_reaction`;
CREATE TABLE IF NOT EXISTS `thread_reaction` (
  `thread_id` int(11) NOT NULL,
  `reaction` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `reaction_thread` (`thread_id`),
  KEY `react_thread` (`reaction`),
  KEY `user_id_thread` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(60) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `work_space_url` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `time_zone` varchar(30) NOT NULL,
  `skype_id` varchar(30) NOT NULL,
  `picture` varchar(100) NOT NULL DEFAULT '../images/default.png',
  `mode` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `work_space_url` (`work_space_url`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email_id`, `full_name`, `display_name`, `password`, `work_space_url`, `description`, `status`, `phone_number`, `time_zone`, `skype_id`, `picture`, `mode`, `timestamp`) VALUES
(1, 'mater@rsprings.gov', 'Tow Mater', 'Tow Mater', '@mater', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00'),
(2, 'porsche@rsprings.gov', 'Sally Carrera', 'Sally Carrera', '@sally', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00'),
(3, 'hornet@rsprings.gov', 'hornet', 'hornet', '@hornet', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00'),
(4, 'sukesh.sangam@gmail.com', 'sukesh sangam', 'sukesh sangam', 'COOLDev0099', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `work_space`
--

DROP TABLE IF EXISTS `work_space`;
CREATE TABLE IF NOT EXISTS `work_space` (
  `email_id` varchar(60) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `display_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `Q1` varchar(100) NOT NULL,
  `Q2` varchar(100) NOT NULL,
  `Q3` varchar(100) NOT NULL,
  `Q4` varchar(100) NOT NULL,
  `work_space_name` varchar(60) NOT NULL,
  `work_space_url` varchar(500) NOT NULL,
  `time_stamp` timestamp NOT NULL,
  PRIMARY KEY (`work_space_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_space`
--

INSERT INTO `work_space` (`email_id`, `full_name`, `display_name`, `password`, `Q1`, `Q2`, `Q3`, `Q4`, `work_space_name`, `work_space_url`, `time_stamp`) VALUES
('sukesh.sangam@gmail.com', 'sukesh sangam', 'sukesh sangam', 'COOLdev0099', '', '', '', '', 'slack cs odu.', 'slack.cs.odu.edu', '2017-10-10 04:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `user_id_channels` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wokr_space_url_channels` FOREIGN KEY (`work_space_url`) REFERENCES `work_space` (`work_space_url`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channel_messages`
--
ALTER TABLE `channel_messages`
  ADD CONSTRAINT `channel_id_messaged` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`channel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_messages` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channel_users`
--
ALTER TABLE `channel_users`
  ADD CONSTRAINT `channel_id_channel_users` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`channel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channel_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `direct_messages`
--
ALTER TABLE `direct_messages`
  ADD CONSTRAINT `dr_from_user_id` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dr_to_user_id` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dr_work_space_url` FOREIGN KEY (`work_space_url`) REFERENCES `work_space` (`work_space_url`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_reaction`
--
ALTER TABLE `message_reaction`
  ADD CONSTRAINT `msg_id_channel_msg` FOREIGN KEY (`message_id`) REFERENCES `channel_messages` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `msg_reaction_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_msg` FOREIGN KEY (`reaction`) REFERENCES `emojis` (`emoji_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_msg_id` FOREIGN KEY (`message_id`) REFERENCES `channel_messages` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thread_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_reaction`
--
ALTER TABLE `thread_reaction`
  ADD CONSTRAINT `react_thread` FOREIGN KEY (`reaction`) REFERENCES `emojis` (`emoji_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_thread` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_thread` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `work_space_url_url` FOREIGN KEY (`work_space_url`) REFERENCES `work_space` (`work_space_url`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
