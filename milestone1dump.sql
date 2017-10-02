-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2017 at 01:50 AM
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

CREATE DATABASE slack_lampstack;

USE slack_lampstack; 

--
-- Database: `slack_lampstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

DROP TABLE IF EXISTS `channels`;
CREATE TABLE IF NOT EXISTS `channels` (
  `channel_id` int(11) NOT NULL,
  `channel_name` varchar(30) NOT NULL,
  `work_space_url` varchar(100) NOT NULL,
  `privacy_settings` varchar(20) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`channel_id`),
  KEY `user_id` (`user_id`),
  KEY `work_space_url` (`work_space_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel_messages`
--

DROP TABLE IF EXISTS `channel_messages`;
CREATE TABLE IF NOT EXISTS `channel_messages` (
  `message_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `timestamp` timestamp NOT NULL,
  `smileys` int(11) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `channel_id` (`channel_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel_users`
--

DROP TABLE IF EXISTS `channel_users`;
CREATE TABLE IF NOT EXISTS `channel_users` (
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `joined_time` timestamp NOT NULL,
  `left_time` timestamp NOT NULL,
  KEY `channel_id` (`channel_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `direct_messages`
--

DROP TABLE IF EXISTS `direct_messages`;
CREATE TABLE IF NOT EXISTS `direct_messages` (
  `message_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL,
  `work_space_url` varchar(100) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`),
  KEY `work_space_url` (`work_space_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emojis`
--

DROP TABLE IF EXISTS `emojis`;
CREATE TABLE IF NOT EXISTS `emojis` (
  `emoji_id` varchar(20) NOT NULL,
  `emoji` blob NOT NULL,
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
  KEY `reaction_ref` (`reaction`),
  KEY `m_id_ref` (`message_id`),
  KEY `u_id_ref` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE IF NOT EXISTS `thread` (
  `thread_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `smileys` int(11) NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `message_id` (`message_id`),
  KEY `user_id` (`user_id`)
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
  KEY `th_id_ref` (`thread_id`),
  KEY `reaction_id_ref` (`reaction`),
  KEY `user_id_ref` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `display_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `work_space_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `time_zone` varchar(20) NOT NULL,
  `skype_id` varchar(30) NOT NULL,
  `picture` varchar(200) NOT NULL DEFAULT '../images/default.png',
  `mode` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `work_space_url` (`work_space_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email_id`, `full_name`, `display_name`, `password`, `work_space_url`, `description`, `status`, `phone_number`, `time_zone`, `skype_id`, `picture`, `mode`, `timestamp`) VALUES
(1, 'mater@rsprings.gov', 'Tow Mater', 'mater', '@mater', 'cs.odu.slack', '', 'busy', '7573559674', 'UTC', 'master', '../images/default.png', 'away', '2017-09-30 04:00:00'),
(2, 'porsche@rsprings.gov', 'porsche', 'porsche', '@sally', 'cs.odu.slack', '', '', '', '', '', '../images/default.png', '', '2017-09-30 04:00:00'),
(3, 'hornet@rsprings.gov', 'Doc Hudson', 'Doc Hudson', ' @doc', 'cs.odu.slack', '', '', '', '', '', '../images/default.png', '', '2017-09-30 04:00:00'),
(4, 'topsecret@agent.org', 'Finn McMissile', 'Finn McMissile', '@mcmissile', 'cs.odu.slack', '', '', '', '', '', '../images/default.png', '', '2017-09-30 04:00:00'),
(5, 'kachow@rusteze.com', 'Lightning McQueen', 'Lightning McQueen', '@mcqueen', 'cs.odu.slack', '', '', '', '', '', '../images/default.png', '', '2017-09-30 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `work_space`
--

DROP TABLE IF EXISTS `work_space`;
CREATE TABLE IF NOT EXISTS `work_space` (
  `emial_id` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Q1` varchar(100) NOT NULL,
  `Q2` varchar(100) NOT NULL,
  `Q3` varchar(100) NOT NULL,
  `Q4` varchar(100) NOT NULL,
  `work_space_name` varchar(50) NOT NULL,
  `work_space_url` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL,
  PRIMARY KEY (`work_space_url`),
  KEY `work_space_url` (`work_space_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_space`
--

INSERT INTO `work_space` (`emial_id`, `full_name`, `display_name`, `password`, `Q1`, `Q2`, `Q3`, `Q4`, `work_space_name`, `work_space_url`, `time_stamp`) VALUES
('sukesh.sangam@gmail.com', 'sukesh sangam', 'sukesh', 'COOLdev0099', '', '', '', '', 'cs odu workspace', 'cs.odu.slack', '2017-09-29 04:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `user_id_channels` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_space_url_channel` FOREIGN KEY (`work_space_url`) REFERENCES `work_space` (`work_space_url`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channel_messages`
--
ALTER TABLE `channel_messages`
  ADD CONSTRAINT `mesg_c_id` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`channel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mesg_u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channel_users`
--
ALTER TABLE `channel_users`
  ADD CONSTRAINT `channel_id_user` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`channel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channel_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `direct_messages`
--
ALTER TABLE `direct_messages`
  ADD CONSTRAINT `dm_f_t_id` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dm_f_u_id` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dm_f_w_url` FOREIGN KEY (`work_space_url`) REFERENCES `work_space` (`work_space_url`);

--
-- Constraints for table `message_reaction`
--
ALTER TABLE `message_reaction`
  ADD CONSTRAINT `m_id_ref` FOREIGN KEY (`message_id`) REFERENCES `channel_messages` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_ref` FOREIGN KEY (`reaction`) REFERENCES `emojis` (`emoji_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_id_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_m_id` FOREIGN KEY (`message_id`) REFERENCES `channel_messages` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thread_u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_reaction`
--
ALTER TABLE `thread_reaction`
  ADD CONSTRAINT `reaction_id_ref` FOREIGN KEY (`reaction`) REFERENCES `emojis` (`emoji_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `th_id_ref` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `work_space_url` FOREIGN KEY (`work_space_url`) REFERENCES `work_space` (`work_space_url`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
