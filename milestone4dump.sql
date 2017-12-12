-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2017 at 09:38 PM
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
-- Table structure for table `admin`
--
CREATE DATABASE slack_lamp_stack_518;
USE slack_lamp_stack_518;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email_id` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email_id`, `password`) VALUES
('admincsodu518@cs.odu.edu', 'admincs518');

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
  `purpose` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `archieved_status` varchar(20) NOT NULL DEFAULT 'unarchieved',
  PRIMARY KEY (`channel_id`),
  KEY `wokr_space_url_channels` (`work_space_url`),
  KEY `user_id_channels` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`channel_id`, `channel_name`, `work_space_url`, `privacy_settings`, `purpose`, `user_id`, `timestamp`, `archieved_status`) VALUES
(1, 'general', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-10 04:00:00', 'unarchieved'),
(2, 'random', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-10 04:00:00', 'archieved'),
(3, 'testing', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-16 04:00:00', 'unarchieved'),
(4, 'milestone-1', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-16 04:00:00', 'unarchieved'),
(5, 'web_programming', 'slack.cs.odu.edu', 'public', '', 4, '2017-10-16 04:00:00', 'unarchieved'),
(6, 'private_channel', 'slack.cs.odu.edu', 'private', '', 1, '2017-10-12 04:00:00', 'unarchieved'),
(9, 'ewrewrew', 'slack.cs.odu.edu', 'public', 'werwerwer', 1, '2017-10-31 10:06:32', 'unarchieved'),
(10, 'sukku', 'slack.cs.odu.edu', 'public', 'wqdswqdwqdqwd', 1, '2017-10-31 10:08:32', 'unarchieved'),
(11, 'test_private', 'slack.cs.odu.edu', 'private', 'efdwsdfsdfgsagdsdfgsdf', 1, '2017-10-31 10:13:13', 'unarchieved'),
(12, 'hello_test', 'slack.cs.odu.edu', 'public', 'asd', 4, '2017-10-31 11:58:39', 'unarchieved'),
(13, 'hello', 'slack.cs.odu.edu', 'public', 'lkjljlj', 1, '2017-10-31 13:39:58', 'unarchieved'),
(14, 'dafdfsdfsd', 'slack.cs.odu.edu', 'public', 'sdfsdfsdf', 1, '2017-11-21 13:29:24', 'unarchieved'),
(15, 'testing_admin', 'slack.cs.odu.edu', 'public', 'sdsad', 18, '2017-11-21 13:33:48', 'unarchieved'),
(16, 'asdasdsad', 'slack.cs.odu.edu', 'public', 'sadsadsad', 1, '2017-11-21 19:27:30', 'unarchieved');

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
  `message_type` varchar(50) NOT NULL DEFAULT 'message',
  PRIMARY KEY (`message_id`),
  KEY `channel_id_messaged` (`channel_id`),
  KEY `user_id_messages` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel_messages`
--

INSERT INTO `channel_messages` (`message_id`, `channel_id`, `user_id`, `message`, `timestamp`, `smileys`, `message_type`) VALUES
(235, 1, 1, 'DELETE FROM table_name;', '2017-11-20 04:32:20', 'False', 'codesnip'),
(236, 1, 1, 'DELETE FROM table_name;', '2017-11-20 04:32:20', 'False', 'codesnip'),
(238, 1, 1, 'codesnip_value', '2017-11-20 04:35:08', 'False', 'codesnip'),
(239, 1, 1, 'codesnip_value', '2017-11-20 04:35:08', 'False', 'codesnip'),
(240, 1, 1, '../images/240msg_unique_img240.jpg', '2017-11-20 04:35:25', 'false', 'picture'),
(241, 1, 1, 'codesnip_value', '2017-11-20 04:37:08', 'False', 'codesnip'),
(242, 1, 1, 'codesnip_value', '2017-11-20 04:37:08', 'False', 'codesnip'),
(243, 1, 1, 'codesnip_value', '2017-11-20 04:40:03', 'False', 'codesnip'),
(244, 1, 1, 'codesnip_value', '2017-11-20 04:40:03', 'False', 'codesnip'),
(245, 1, 1, 'codesnip_value', '2017-11-20 04:41:48', 'False', 'codesnip'),
(246, 1, 1, 'codesnip_value', '2017-11-20 04:41:48', 'False', 'codesnip'),
(247, 1, 1, ' echo \"in code snip values\";', '2017-11-20 04:45:09', 'False', 'codesnip'),
(248, 1, 1, ' echo \"in code snip values\";', '2017-11-20 04:45:09', 'False', 'codesnip'),
(249, 1, 1, ' echo \"in code snip values\";', '2017-11-20 04:45:49', 'False', 'codesnip'),
(250, 1, 1, ' echo \"in code snip values\";', '2017-11-20 04:45:49', 'False', 'codesnip'),
(251, 1, 1, ' echo \"in code snip values\";', '2017-11-20 04:46:40', 'False', 'codesnip'),
(252, 1, 1, ' echo \"in code snip values\";', '2017-11-20 04:46:40', 'False', 'codesnip'),
(253, 1, 1, 'testing', '2017-11-20 04:51:06', 'False', 'message'),
(254, 1, 1, '\r\nif(isset($_POST[\"message\"])){\r\n    $channel_id=$_POST[\"channel_id\"];\r\n    $user_id=$_POST[\"user_id\"];\r\n    $message=$_POST[\"message\"];\r\n    $message_type=\"message\";\r\n    $return_value=$message_posting->post_message($channel_id,$user_id,$message,$message_type);\r\n    echo $return_value;\r\n    echo \"in message\";\r\n    /*\r\n    if($return_value==1){\r\n\r\n        header(\"location: home.php?$parameter#test\");\r\n\r\n    }*/\r\n\r\n\r\n\r\n\r\n}\r\n\r\n\r\nif(isset($_POST[\"codesnip_value\"])){\r\n\r\n    $channel_id=$_POST[\"channel_id\"];\r\n    $user_id=$_POST[\"user_id\"];\r\n    $message=$_POST[\"codesnip_value\"];\r\n    $message_type=$_POST[\"message_type\"];\r\n    $return_value=$message_posting->post_message($channel_id,$user_id,$message,$message_type);\r\n    echo $return_value;\r\n    echo \"in code snip values\";\r\n   /* if($return_value==1){\r\n        header(\"location: home.php?$parameter#test\");\r\n\r\n    }\r\n*/\r\n\r\n\r\n\r\n\r\n}\r\nif(isset($_POST[\"img_link_content\"])){\r\n\r\n    $channel_id=$_POST[\"channel_id\"];\r\n    $user_id=$_POST[\"user_id\"];\r\n    $message=$_POST[\"img_link_content\"];\r\n    $message_type=$_POST[\"message_type\"];\r\n    $return_value=$message_posting->post_message($channel_id,$user_id,$message,$message_type);\r\n    echo $return_value;\r\n    echo \"img_link_content\";\r\n  /*  if($return_value==1){\r\n        header(\"location: home.php?$parameter#test\");\r\n\r\n    }\r\n*/\r\n\r\n\r\n\r\n\r\n}\r\n\r\n\r\nif(isset($_POST[\"codesnip_value\"])){\r\n\r\n    $channel_id=$_POST[\"channel_id\"];\r\n    $user_id=$_POST[\"user_id\"];\r\n    $message=$_POST[\"codesnip_value\"];\r\n    $message_type=$_POST[\"message_type\"];\r\n    $return_value=$message_posting->post_message($channel_id,$user_id,$message,$message_type);\r\n    echo $return_value;\r\n    if($return_value==1){\r\n        header(\"location: home.php?$parameter#test\");\r\n\r\n    }\r\n\r\n\r\n\r\n\r\n\r\n}\r\nif(isset($_FILES[\"fileToUpload\"])){\r\n\r\n    $db_object=new db_queries();\r\n\r\n    $query=$db_object->get_file_name();\r\n    //mysqli_query($conn,$query);\r\n\r\n    $result_set=$conn->query($query);\r\n    mysqli_close($conn);\r\n    $row=$result_set->fetch_array(MYSQLI_ASSOC);\r\n    $number=$row[\"message_id\"]+1;\r\n    $channel_id=$_POST[\"channel_id\"];\r\n    $user_id=$_POST[\"user_id\"];\r\n    $submit=$_POST[\"submit\"];\r\n    $size=$_FILES[\"fileToUpload\"][\"size\"];\r\n    $image_name_a=$_FILES[\"fileToUpload\"][\"name\"];\r\n    $img_file_name=$_FILES[\"fileToUpload\"][\"tmp_name\"];\r\n    $img_name=$number.\"msg_unique_img\".$number;\r\n\r\n/*\r\n   echo $img_file_name;\r\n   echo \"<br>\";\r\n   echo $channel_id;\r\n    echo \"<br>\";\r\n   echo $user_id;\r\n    echo \"<br>\";\r\n   echo $submit;\r\n    echo \"<br>\";\r\n   echo $size;\r\n    echo \"<br>\";\r\n   echo $image_name_a;\r\n    echo \"<br>\";\r\n   echo $img_file_name;\r\n    echo \"<br>\";\r\n   //echo $img_file_name;\r\n    echo \"<br>\";\r\n   echo $img_name;*/\r\n$smiley_status=\"false\";\r\n$message_type=\"picture\";\r\n   $message_post_pic->upload_pic($submit,$img_name,$img_file_name,$image_name_a,$size,$channel_id,$user_id,$smiley_status,$message_type);\r\n\r\n   /* $query=$db_object->insert_message($channel_id,$user_id,$message_final,$current_date,$smiley_status,$message_type);\r\n\r\n    //$conn->query($query);\r\n\r\n\r\n    // $query = \"insert into channel_messages values(DEFAULT,\'$channel_id\',\'$user_id\',\'$message_final\',\'$current_date\',\'$smiley_status\',\'$message_type\')\";\r\n    mysqli_query($conn, $query);\r\n*/\r\n}\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '2017-11-20 04:52:11', 'False', 'codesnip'),
(256, 1, 1, '../images/256msg_unique_img256.jpg', '2017-11-20 04:53:23', 'false', 'picture'),
(257, 1, 1, 'kl;/kl\'/;l\'', '2017-11-20 05:51:14', 'False', 'codesnip'),
(258, 1, 1, '../images/258msg_unique_img258.jpg', '2017-11-20 05:56:23', 'false', 'picture'),
(260, 1, 1, 'data:image/jpeg;base64,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', '2017-11-20 05:57:26', 'False', 'image_link'),
(261, 1, 1, 'data:image/jpeg;base64,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', '2017-11-20 05:59:23', 'False', 'image_link'),
(262, 1, 1, '../images/262msg_unique_img262.jpg', '2017-11-20 05:59:48', 'false', 'picture'),
(263, 1, 1, '../images/263msg_unique_img263.jpg', '2017-11-20 06:00:30', 'false', 'picture'),
(264, 1, 1, '../images/264msg_unique_img264.jpg', '2017-11-20 06:17:29', 'false', 'picture'),
(265, 1, 1, '.col-xs-6', '2017-11-20 06:40:20', 'False', 'codesnip'),
(266, 1, 1, 'gfhfghjytjuutygjyjgtyjy', '2017-11-20 06:40:31', 'False', 'message'),
(267, 1, 1, 'vcfbfgnhjfgdjfghjghjghjghj', '2017-11-20 07:31:40', 'False', 'codesnip'),
(268, 1, 1, 'testing', '2017-11-20 19:40:39', 'False', 'message'),
(269, 1, 1, 'testing', '2017-11-20 19:40:54', 'False', 'message'),
(270, 1, 1, 'http://cs518.cs.odu.edu/logs.php?csusername=sukeshsangam', '2017-11-21 02:28:20', 'False', 'message'),
(273, 1, 1, 'http://images.all-free-download.com/images/graphiclarge/tiger_avatar_04_hd_pictures_169016.jpg', '2017-11-21 02:33:58', 'False', 'image_link'),
(274, 1, 1, 'https://dncache-mauganscorp.netdna-ssl.com/thumbseg/378/378006-bigthumbnail.jpg', '2017-11-21 02:34:50', 'False', 'image_link'),
(276, 1, 1, 'https://cdni.rt.com/files/2017.11/article/5a130359fc7e93db228b4567.jpg', '2017-11-21 02:38:20', 'False', 'image_link'),
(278, 3, 1, 'hello', '2017-11-21 05:49:19', 'False', 'message'),
(279, 4, 1, 'hello', '2017-11-21 05:50:57', 'False', 'message'),
(280, 6, 1, 'echo $channel_id;', '2017-11-21 05:52:34', 'False', 'codesnip'),
(281, 4, 1, 'fgddfghdghfgh', '2017-11-21 06:01:19', 'False', 'message'),
(282, 4, 1, '$parameter=\"channel_id=\".($channel_id).\"&user_id=\".($user_id).\"&channel_name=\".($channel_name);', '2017-11-21 06:01:28', 'False', 'codesnip'),
(283, 4, 1, '../images/283msg_unique_img283.jpg', '2017-11-21 06:01:39', 'false', 'picture'),
(284, 3, 1, 'https://www.planwallpaper.com/static/images/canberra_hero_image_JiMVvYU.jpg', '2017-11-21 06:02:21', 'False', 'image_link'),
(285, 3, 1, '../images/285msg_unique_img285.jpg', '2017-11-21 06:05:39', 'false', 'picture'),
(290, 1, 1, 'hello', '2017-11-21 06:25:53', 'False', 'message'),
(291, 1, 1, '../images/291msg_unique_img291.jpg', '2017-11-21 06:26:04', 'false', 'picture'),
(292, 1, 1, 'if($user_id!=0) {\r\n                        $parameter = \"channel_id=\" . ($channel_id) . \"&user_id=\" . ($user_id) . \"&channel_name=\" . ($channel_name);\r\n                        header(\"location: home.php?$parameter#test\");\r\n                    }\r\n                    else{\r\n\r\n                        $parameter = \"channel_id=\" . ($channel_id) . \"&user_id=\" . ($user_id) . \"&channel_name=\" . ($channel_name);\r\n                        header(\"location: admin_home.php?$parameter#test\");\r\n                    }', '2017-11-21 06:26:12', 'False', 'codesnip'),
(293, 1, 1, 'https://www.planwallpaper.com/static/images/canberra_hero_image_JiMVvYU.jpg', '2017-11-21 06:26:55', 'False', 'image_link'),
(296, 1, 18, 'ghjfghjghjfghj', '2017-11-21 06:38:11', 'False', 'message'),
(297, 1, 18, 'ghjfghjghjfghj', '2017-11-21 06:39:35', 'False', 'message'),
(298, 1, 18, 'hello', '2017-11-21 06:40:09', 'False', 'message'),
(299, 1, 18, 'sdfgvsdfgsdfgdsfg', '2017-11-21 06:42:19', 'False', 'message'),
(301, 1, 18, '../images/301msg_unique_img301.jpg', '2017-11-21 06:43:24', 'false', 'picture'),
(302, 1, 18, 'https://www.planwallpaper.com/static/images/canberra_hero_image_JiMVvYU.jpg', '2017-11-21 06:43:51', 'False', 'image_link'),
(303, 5, 18, 'https://www.planwallpaper.com/static/images/canberra_hero_image_JiMVvYU.jpg', '2017-11-21 06:47:24', 'False', 'codesnip'),
(304, 5, 18, 'https://www.planwallpaper.com/static/images/canberra_hero_image_JiMVvYU.jpg', '2017-11-21 06:47:32', 'False', 'image_link'),
(305, 5, 18, '../images/305msg_unique_img305.jpg', '2017-11-21 06:47:43', 'false', 'picture'),
(307, 9, 18, 'kjghjh', '2017-11-21 11:26:54', 'False', 'message'),
(308, 4, 1, 'https://static.pexels.com/photos/34950/pexels-photo.jpg', '2017-11-21 19:39:49', 'False', 'message'),
(309, 3, 1, 'https://www.w3schools.com/bootstrap/newyork.jpg', '2017-11-21 19:42:36', 'False', 'image_link'),
(310, 3, 1, 'https://www.w3schools.com/bootstrap/newyork.jpg', '2017-11-21 19:43:06', 'False', 'image_link'),
(311, 10, 1, 'fdghsdhdfghdfgh', '2017-11-21 23:13:24', 'False', 'message'),
(312, 10, 1, 'fgfgjnghjghjghj', '2017-11-21 23:14:55', 'False', 'message'),
(313, 10, 1, 'ujtyrutryuty', '2017-12-03 21:25:25', 'False', 'message'),
(314, 10, 1, 'ImportError: No module named mrec.sparse', '2017-12-03 21:25:41', 'False', 'codesnip'),
(315, 10, 1, '../images/315msg_unique_img315.jpg', '2017-12-03 21:25:58', 'false', 'picture'),
(316, 10, 1, 'http://test.cs518.cs.odu.edu/', '2017-12-03 21:26:20', 'False', 'message'),
(317, 3, 1, 'ghfgn', '2017-12-05 00:34:15', 'False', 'message'),
(318, 16, 1, 'to_display_name', '2017-12-06 04:10:18', 'False', 'codesnip'),
(319, 16, 1, '../images/319msg_unique_img319.jpg', '2017-12-06 04:10:29', 'false', 'picture'),
(320, 16, 1, 'https://www.w3schools.com/css/paris.jpg', '2017-12-06 04:11:07', 'False', 'image_link'),
(321, 16, 1, 'img_link_content', '2017-12-06 04:29:42', 'False', 'message');

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
(5, 9, '2017-10-16 04:00:00', '2017-10-16 04:00:00'),
(10, 1, '2017-10-31 10:08:32', '2017-10-31 10:08:32'),
(11, 1, '2017-10-31 10:13:13', '2017-10-31 10:13:13'),
(12, 4, '2017-10-31 11:58:39', '2017-10-31 11:58:39'),
(1, 14, '2017-10-31 16:10:54', '2017-10-31 16:10:54'),
(1, 16, '2017-10-31 16:12:10', '2017-10-31 16:12:10'),
(1, 15, '2017-10-31 12:14:41', '2017-10-31 12:14:41'),
(10, 4, '2017-10-31 12:23:20', '2017-10-31 12:23:20'),
(10, 2, '2017-10-31 12:26:51', '2017-10-31 12:26:51'),
(4, 2, '2017-10-31 12:28:49', '2017-10-31 12:28:49'),
(6, 4, '2017-10-31 12:30:47', '2017-10-31 12:30:47'),
(2, 16, '2017-10-31 13:38:34', '2017-10-31 13:38:34'),
(10, 6, '2017-10-31 13:38:53', '2017-10-31 13:38:53'),
(10, 9, '2017-10-31 13:39:03', '2017-10-31 13:39:03'),
(13, 1, '2017-10-31 13:39:58', '2017-10-31 13:39:58'),
(13, 4, '2017-10-31 13:40:15', '2017-10-31 13:40:15'),
(13, 2, '2017-11-13 22:33:28', '2017-11-13 22:33:28'),
(13, 5, '2017-11-13 22:33:32', '2017-11-13 22:33:32'),
(13, 6, '2017-11-13 22:33:34', '2017-11-13 22:33:34'),
(13, 7, '2017-11-13 22:33:37', '2017-11-13 22:33:37'),
(13, 8, '2017-11-13 22:33:39', '2017-11-13 22:33:39'),
(13, 9, '2017-11-13 22:33:42', '2017-11-13 22:33:42'),
(13, 10, '2017-11-13 22:33:44', '2017-11-13 22:33:44'),
(13, 14, '2017-11-13 22:33:47', '2017-11-13 22:33:47'),
(13, 15, '2017-11-13 22:33:49', '2017-11-13 22:33:49'),
(13, 16, '2017-11-13 22:33:52', '2017-11-13 22:33:52'),
(13, 17, '2017-11-13 22:33:55', '2017-11-13 22:33:55'),
(1, 1, '2017-11-21 12:54:02', '2017-11-21 12:54:02'),
(14, 1, '2017-11-21 13:29:24', '2017-11-21 13:29:24'),
(15, 18, '2017-11-21 13:33:48', '2017-11-21 13:33:48'),
(10, 5, '2017-11-21 19:25:59', '2017-11-21 19:25:59'),
(16, 1, '2017-11-21 19:27:30', '2017-11-21 19:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `direct_messages`
--

DROP TABLE IF EXISTS `direct_messages`;
CREATE TABLE IF NOT EXISTS `direct_messages` (
  `dr_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `message_type` varchar(50) NOT NULL DEFAULT 'message',
  `timestamp` timestamp NOT NULL,
  `work_space_url` varchar(500) NOT NULL,
  PRIMARY KEY (`dr_message_id`),
  KEY `dr_from_user_id` (`from_user_id`),
  KEY `dr_to_user_id` (`to_user_id`),
  KEY `dr_work_space_url` (`work_space_url`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direct_messages`
--

INSERT INTO `direct_messages` (`dr_message_id`, `from_user_id`, `to_user_id`, `message`, `message_type`, `timestamp`, `work_space_url`) VALUES
(1, 1, 8, 'hello', 'message', '2017-12-05 08:38:59', 'slack.cs.odu.edu'),
(2, 1, 6, 'dfsdf', 'message', '2017-12-05 08:40:27', 'slack.cs.odu.edu'),
(3, 1, 6, 'dfsdf', 'message', '2017-12-05 08:41:44', 'slack.cs.odu.edu'),
(4, 1, 6, 'gtfdgfdg', 'message', '2017-12-05 08:50:13', 'slack.cs.odu.edu'),
(5, 1, 4, 'dude', 'message', '2017-12-05 08:51:33', 'slack.cs.odu.edu'),
(6, 1, 4, 'dsfsdfsdfsdfsdfsdfsdfsdfsdfsdf', 'message', '2017-12-05 08:52:30', 'slack.cs.odu.edu'),
(7, 1, 4, 'dsfsdfsdfsdfsdfsdfsdfsdfsdfsdf', 'message', '2017-12-05 08:53:30', 'slack.cs.odu.edu'),
(8, 1, 4, 'dsfsdfsdfsdfsdfsdfsdfsdfsdfsdf', 'message', '2017-12-05 08:53:44', 'slack.cs.odu.edu'),
(9, 1, 4, 'hi', 'message', '2017-12-05 08:54:11', 'slack.cs.odu.edu'),
(10, 1, 4, 'hello', 'message', '2017-12-05 19:47:39', 'slack.cs.odu.edu'),
(11, 1, 4, 'https://www.w3schools.com/css/paris.jpg', 'message', '2017-12-06 04:11:20', 'slack.cs.odu.edu'),
(12, 1, 2, 'https://www.w3schools.com/css/paris.jpg', 'message', '2017-12-06 04:13:04', 'slack.cs.odu.edu'),
(13, 1, 2, 'gfd', 'message', '2017-12-06 04:16:00', 'slack.cs.odu.edu'),
(14, 1, 2, 'sfvfvdfvb', 'message', '2017-12-06 04:17:18', 'slack.cs.odu.edu'),
(15, 1, 2, 'fgfdgdfgfdg', 'message', '2017-12-06 04:19:09', 'slack.cs.odu.edu'),
(16, 1, 4, 'fgdfgdfgdf', 'message', '2017-12-06 04:22:16', 'slack.cs.odu.edu'),
(17, 1, 4, 'https://www.w3schools.com/css/paris.jpg', 'codesnip', '2017-12-06 04:28:35', 'slack.cs.odu.edu'),
(18, 1, 4, 'img_link_content', 'image_link', '2017-12-06 04:29:00', 'slack.cs.odu.edu'),
(19, 1, 2, ' $headers = get_headers($message, 1);\r\n        if (strpos($headers[\'Content-Type\'], \'image/\') !== false) {\r\n            $message_type = $_POST[\"message_type\"];\r\n        } else {\r\n            $message_type = \"message\";\r\n        }', 'message', '2017-12-06 04:31:40', 'slack.cs.odu.edu'),
(20, 1, 2, '1236563\r\n\r\n\r\n', 'message', '2017-12-06 04:46:15', 'slack.cs.odu.edu'),
(21, 1, 2, 'frfwefwef', 'message', '2017-12-06 05:03:52', 'slack.cs.odu.edu'),
(22, 1, 2, '$user_name', 'codesnip', '2017-12-06 05:12:59', 'slack.cs.odu.edu'),
(26, 1, 4, '../images/23dr_msg_unique_img23.jpg', 'picture', '2017-12-06 05:52:47', 'slack.cs.odu.edu'),
(27, 1, 4, '../images/27dr_msg_unique_img27.jpg', 'picture', '2017-12-06 05:53:07', 'slack.cs.odu.edu'),
(28, 1, 4, 'bngnhbgnhghn', 'message', '2017-12-06 07:36:46', 'slack.cs.odu.edu'),
(29, 1, 4, 'hgnghnghnghn', 'message', '2017-12-06 07:36:52', 'slack.cs.odu.edu'),
(30, 1, 4, 'https://images.pexels.com/photos/33109/fall-autumn-red-season.jpg?w=1260&h=750&auto=compress&cs=tinysrgb', 'message', '2017-12-06 07:40:35', 'slack.cs.odu.edu'),
(31, 1, 4, 'https://images.pexels.com/photos/33109/fall-autumn-red-season.jpg?w=1260&h=750&auto=compress&cs=tinysrgb', 'codesnip', '2017-12-06 07:40:46', 'slack.cs.odu.edu'),
(32, 1, 4, 'https://images.pexels.com/photos/33109/fall-autumn-red-season.jpg?w=1260&h=750&auto=compress&cs=tinysrgb', 'image_link', '2017-12-06 07:40:56', 'slack.cs.odu.edu'),
(33, 1, 4, '../images/33dr_msg_unique_img33.jpg', 'picture', '2017-12-06 07:41:11', 'slack.cs.odu.edu'),
(34, 1, 2, 'hello', 'message', '2017-12-09 06:48:51', 'slack.cs.odu.edu'),
(35, 1, 2, 'czxcxzczxczxczc', 'message', '2017-12-09 06:48:59', 'slack.cs.odu.edu'),
(36, 1, 2, 'zxczxczxczxczxczxc', 'message', '2017-12-09 06:49:05', 'slack.cs.odu.edu'),
(37, 1, 2, 'xzczxczxczxczxczxc', 'message', '2017-12-09 06:49:16', 'slack.cs.odu.edu'),
(38, 1, 2, 'zxczxccccccccccccccccccccccccc', 'message', '2017-12-09 06:49:24', 'slack.cs.odu.edu'),
(39, 1, 2, '$headers = get_headers($message, 1); if (strpos($headers[\'Content-Type\'], \'image/\') !== false) { $message_type = $_POST[\"message_type\"]; } else { $message_type = \"message\"; }', 'message', '2017-12-09 06:49:36', 'slack.cs.odu.edu'),
(40, 1, 2, '$headers = get_headers($message, 1); if (strpos($headers[\'Content-Type\'], \'image/\') !== false) { $message_type = $_POST[\"message_type\"]; } else { $message_type = \"message\"; }', 'message', '2017-12-09 06:49:41', 'slack.cs.odu.edu'),
(41, 1, 2, '$headers = get_headers($message, 1); if (strpos($headers[\'Content-Type\'], \'image/\') !== false) { $message_type = $_POST[\"message_type\"]; } else { $message_type = \"message\"; }', 'message', '2017-12-09 06:49:55', 'slack.cs.odu.edu'),
(42, 1, 2, '$headers = get_headers($message, 1); if (strpos($headers[\'Content-Type\'], \'image/\') !== false) { $message_type = $_POST[\"message_type\"]; } else { $message_type = \"message\"; }', 'message', '2017-12-09 06:50:02', 'slack.cs.odu.edu'),
(43, 1, 2, '$headers = get_headers($message, 1); if (strpos($headers[\'Content-Type\'], \'image/\') !== false) { $message_type = $_POST[\"message_type\"]; } else { $message_type = \"message\"; }', 'message', '2017-12-09 06:50:06', 'slack.cs.odu.edu'),
(44, 1, 2, '$headers = get_headers($message, 1); if (strpos($headers[\'Content-Type\'], \'image/\') !== false) { $message_type = $_POST[\"message_type\"]; } else { $message_type = \"message\"; }', 'message', '2017-12-09 06:50:12', 'slack.cs.odu.edu'),
(45, 1, 2, '$headers = get_headers($message, 1); if (strpos($headers[\'Content-Type\'], \'image/\') !== false) { $message_type = $_POST[\"message_type\"]; } else { $message_type = \"message\"; }', 'message', '2017-12-09 06:50:17', 'slack.cs.odu.edu');

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

--
-- Dumping data for table `emojis`
--

INSERT INTO `emojis` (`emoji_id`, `emoji`) VALUES
('1', 'like'),
('2', 'dis_like');

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

--
-- Dumping data for table `message_reaction`
--

INSERT INTO `message_reaction` (`message_id`, `reaction`, `user_id`) VALUES
(251, '1', 1),
(240, '1', 1),
(305, '1', 18),
(257, '2', 18),
(258, '1', 18),
(240, '2', 18);

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
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `message_id`, `message`, `user_id`, `timestamp`, `smileys`) VALUES
(218, 251, 'kl,kj.,kj.', 1, '2017-11-20 07:22:58', 'False'),
(219, 236, 'l;kkjl;klj;', 1, '2017-11-20 23:21:51', 'False'),
(220, 240, 'kl./kl/k/', 1, '2017-11-20 23:22:19', 'False'),
(221, 257, 'hello', 1, '2017-11-20 23:44:22', 'False'),
(222, 305, 'ukyuikuyik', 18, '2017-11-21 06:47:57', 'False'),
(223, 303, 'ghjnmfgjmghgh', 18, '2017-11-21 06:48:14', 'False'),
(224, 301, 'hi', 1, '2017-11-21 10:48:19', 'False'),
(225, 307, 'po\'op\'o', 18, '2017-11-21 11:27:06', 'False'),
(226, 283, 'hello', 1, '2017-11-21 19:38:50', 'False'),
(227, 283, 'fsdfsdf', 1, '2017-11-21 19:38:55', 'False'),
(228, 283, 'sfsdfsdfsdf', 1, '2017-11-21 19:39:02', 'False'),
(229, 285, 'xccxc', 1, '2017-11-21 19:42:14', 'False'),
(230, 285, 'xcxcxcxc', 1, '2017-11-21 19:42:19', 'False'),
(231, 285, 'xcxcxcxc', 1, '2017-11-21 19:42:24', 'False'),
(232, 309, 'vxcvxcvxcv', 1, '2017-11-21 19:42:44', 'False'),
(233, 309, 'fgfdgfdg', 1, '2017-11-21 19:43:15', 'False'),
(234, 310, 'fdgfdgfdg', 1, '2017-11-21 19:43:21', 'False'),
(235, 284, 'fdgbfdgfdg', 1, '2017-11-21 19:43:31', 'False'),
(236, 284, 'n,mjhkhjkl', 1, '2017-11-21 19:45:31', 'False'),
(237, 316, 'jhtyjtyj', 1, '2017-12-03 21:26:31', 'False');

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
  `email_id` varchar(200) NOT NULL,
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
  `type_registration` varchar(20) NOT NULL DEFAULT 'regular',
  PRIMARY KEY (`user_id`),
  KEY `work_space_url` (`work_space_url`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email_id`, `full_name`, `display_name`, `password`, `work_space_url`, `description`, `status`, `phone_number`, `time_zone`, `skype_id`, `picture`, `mode`, `timestamp`, `type_registration`) VALUES
(1, 'mater@rsprings.gov', 'Tow Mater', 'Tow Mater', '@mater', 'slack.cs.odu.edu', '', '', '', '', '', '../images/Tow Mater.jpg', '', '2017-10-10 04:00:00', 'regular'),
(2, 'porsche@rsprings.gov', 'Sally Carrera', 'Sally Carrera', '@sally', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-10 04:00:00', 'regular'),
(4, 'sukesh.sangam@gmail.com', 'sukesh sangam', 'sukesh sangam', 'COOLDev0099', 'slack.cs.odu.edu', '', '', '', '', '', '../images/sukesh sangam.jpg', '', '2017-10-10 04:00:00', 'regular'),
(5, 'hornet@rsprings.gov', 'Doc Hudson', 'Doc Hudson', '@doc', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00', 'regular'),
(6, 'topsecret@agent.org', 'Finn McMissile', 'Finn McMissile', '@mcmissile', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00', 'regular'),
(7, 'kachow@rusteze.com', 'Lightning McQueen', 'Lightning McQueen', '@mcqueen', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00', 'regular'),
(8, 'chinga@cars.com', 'Chick Hicks', 'Chick Hicks', '@chick', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00', 'regular'),
(9, 'sindhujareddy.pannala@gmail.com', 'sindhu reddy', 'sindhu reddy', '@sindhu', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00', 'regular'),
(10, 'shwethashyam@gmail.com', 'shwetha', 'shwetha', '@shwetha', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-16 04:00:00', 'regular'),
(14, 'sukesh.sangam9@gmail.com', 'asasassa', 'asasassa', 'asdfghj=', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-30 21:51:49', 'regular'),
(15, 'sukesh.sangam10@gmail.com', 'aasdsadsadsadsad', 'aasdsadsadsadsad', 'asdfghj=', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-30 21:54:25', 'regular'),
(16, 'sukesh.sangam9@gmail.com', 'sukesh.sangam@gmail.com', 'sukesh.sangam@gmail.com', 'asdfgh=', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-31 07:33:54', 'regular'),
(17, 'testing@gmail.com', 'testing', 'testing', 'testing=', 'slack.cs.odu.edu', '', '', '', '', '', '../images/default.png', '', '2017-10-31 18:32:57', 'regular'),
(18, 'admincsodu518@cs.odu.edu', 'Admin', 'Admin', '********************', 'slack.cs.odu.edu', '', '', '', '', '', '../images/admin.png', '', '2017-11-20 05:00:00', 'regular');

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
