-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2018 at 11:46 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `addreaction`
--

DROP TABLE IF EXISTS `addreaction`;
CREATE TABLE IF NOT EXISTS `addreaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addreaction`
--

INSERT INTO `addreaction` (`id`, `user_id`, `photo_id`, `comment`) VALUES
(152, 1, 175, 'dit werkt ook'),
(150, 8, 175, 'oo'),
(149, 8, 175, 'okk'),
(148, 1, 175, 'okk'),
(147, 8, 175, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `photo_liked`
--

DROP TABLE IF EXISTS `photo_liked`;
CREATE TABLE IF NOT EXISTS `photo_liked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `Active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=349 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_liked`
--

INSERT INTO `photo_liked` (`id`, `user_id`, `photo_id`, `Active`) VALUES
(341, 11, 175, 1);

-- --------------------------------------------------------

--
-- Table structure for table `upload_images`
--

DROP TABLE IF EXISTS `upload_images`;
CREATE TABLE IF NOT EXISTS `upload_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_name` text NOT NULL,
  `photo_d` text NOT NULL,
  `photo_description` varchar(311) NOT NULL,
  `randomnum` varchar(6534) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_images`
--

INSERT INTO `upload_images` (`id`, `user_id`, `photo_name`, `photo_d`, `photo_description`, `randomnum`) VALUES
(175, 8, 'IMG_20160828_192259.jpg', 'uploads//83327IMG_20160828_192259.jpg', 'test', '83327');

-- --------------------------------------------------------

--
-- Table structure for table `upload_images_profile`
--

DROP TABLE IF EXISTS `upload_images_profile`;
CREATE TABLE IF NOT EXISTS `upload_images_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_name` text NOT NULL,
  `photo_d` text NOT NULL,
  `photo_description` varchar(311) NOT NULL,
  `randomnum` varchar(6535) NOT NULL,
  `like_counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_images_profile`
--

INSERT INTO `upload_images_profile` (`id`, `user_id`, `photo_name`, `photo_d`, `photo_description`, `randomnum`, `like_counter`) VALUES
(77, 8, 'IMG_20160405_091810.jpg', 'uploads/profile-image/55787IMG_20160405_091810.jpg', 'mooi dit werkt ook', '55787', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `username` varchar(66) NOT NULL,
  `password` varchar(66) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `email`, `bio`) VALUES
(1, '', 'kevin', 'c12aca8cf827f9bd13d41d3cff451609', 'kevinherwijnen@live.nl', ''),
(2, '', 'luuk', 'lollig2', 'luukherwijnen@icloud.com', ''),
(5, 'pukkie', 'pukkie', '3e22252b8487424b0e5cc8b003e854f3', 'luukherwijnen@live.nl', ''),
(6, 'daan', 'de ram', 'fe6218a07502497d72203bfa5172103f', 'ram@live.nl', ''),
(8, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@live.nl', ' '),
(11, 'nogiets', 'nogiets', '91f7ff05da07fe0daa20d29e0025c7a7', 'nogiets@live.nl', ' '),
(12, 'nogiets', 'nogiets1', '56eb8be5b03ec3a1bd3c47672ce29a08', 'nogiets1@live.nl', ' '),
(13, 'nogiets2', 'nogiets2', '6be335d8bf417c7100e472f3fc8222fb', 'nogiets2@live.nl', ' '),
(14, 'nogiets3', 'nogiets3', '6888d58e1f328f3c0402225ae25c772c', 'nogiets3@live.nl', ' ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
