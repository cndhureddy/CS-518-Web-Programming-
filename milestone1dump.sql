-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2017 at 04:25 PM
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

--
-- Database: `slack_lamp_stack_518`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE DATABASE `slack_lamp_stack_518`;
USE slack_lamp_stack_518;



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`channel_id`, `channel_name`, `work_space_url`, `privacy_settings`, `purpose`, `user_id`, `timestamp`) VALUES
(1, 'general', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-10 04:00:00'),
(2, 'random', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-10 04:00:00'),
(3, 'testing', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-16 04:00:00'),
(4, 'milestone-1', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-16 04:00:00'),
(5, 'web_programming', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-16 04:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel_messages`
--

INSERT INTO `channel_messages` (`message_id`, `channel_id`, `user_id`, `message`, `timestamp`, `smileys`) VALUES
(1, 1, 1, 'Hello, hi all', '2017-10-14 04:00:00', 'false'),
(2, 2, 1, 'Hello, hi all', '2017-10-14 04:00:00', 'false'),
(3, 3, 1, 'Hello, hi all!', '2017-10-14 04:00:00', 'false'),
(4, 4, 1, 'hello!', '2017-10-14 04:00:00', 'false'),
(5, 1, 8, 'hello', '2017-10-14 04:00:00', 'false'),
(6, 2, 8, 'hello', '2017-10-14 04:00:00', 'false'),
(7, 4, 8, 'hello', '2017-10-14 04:00:00', 'false'),
(8, 5, 8, 'hello', '2017-10-14 04:00:00', 'false'),
(9, 4, 1, 'Can some provide me good tutorials for php', '2017-10-17 16:13:29', 'False'),
(10, 1, 1, 'can some one provide me good tutorials for php?', '2017-10-17 16:14:42', 'False'),
(11, 1, 4, 'Hello , this may help you https://www.tutorialspoint.com/php/', '2017-10-17 16:15:54', 'True'),
(12, 2, 4, 'Hi ', '2017-10-17 16:17:05', 'False'),
(13, 5, 9, 'Hi all, can some one provide me good tutorials on sql', '2017-10-16 05:01:00', 'false'),
(14, 3, 9, 'hi , all this is testing message', '2017-10-16 05:00:00', 'false');

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
(2, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(2, 2, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 4, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(2, 4, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(3, 1, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(3, 4, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(5, 7, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(5, 6, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(5, 5, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(5, 4, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(5, 1, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(4, 4, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(4, 1, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(3, 6, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(3, 5, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(2, 8, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(2, 7, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(4, 7, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(4, 6, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 2, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 5, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(2, 5, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 6, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(2, 6, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 7, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 8, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 9, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(2, 9, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(1, 10, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(2, 10, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(5, 10, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(5, 9, '2017-10-16 04:00:00', '2017-10-16 04:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email_id`, `full_name`, `display_name`, `password`, `work_space_url`, `description`, `status`, `phone_number`, `time_zone`, `skype_id`, `picture`, `mode`, `timestamp`) VALUES
(1, 'mater@rsprings.gov', 'Tow Mater', 'Tow Mater', '@mater', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00'),
(2, 'porsche@rsprings.gov', 'Sally Carrera', 'Sally Carrera', '@sally', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00'),
(4, 'sukesh.sangam@gmail.com', 'sukesh sangam', 'sukesh sangam', 'COOLDev0099', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00'),
(5, 'hornet@rsprings.gov', 'Doc Hudson', 'Doc Hudson', '@doc', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00'),
(6, 'topsecret@agent.org', 'Finn McMissile', 'Finn McMissile', '@mcmissile', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00'),
(7, 'kachow@rusteze.com', 'Lightning McQueen', 'Lightning McQueen', '@mcqueen', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00'),
(8, 'chinga@cars.com', 'Chick Hicks', 'Chick Hicks', '@chick', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00'),
(9, 'sindhujareddy.pannala@gmail.com', 'sindhu reddy', 'sindhu reddy', '@sindhu', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00'),
(10, 'shwethashyam@gmail.com', 'shwetha', 'shwetha', '@shwetha', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00');

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
