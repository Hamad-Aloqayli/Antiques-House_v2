-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2020 at 04:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `title`, `text`, `date`, `status`) VALUES
(33, 'Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ±', 'Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ±', NULL, 0),
(27, 'adf', 'ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfjlakd ajdfj ajdfjlakd ', NULL, 0),
(28, 'asdf', 'ddaasdf', NULL, 0),
(29, 'Test Test', 'tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 ', NULL, 0),
(30, 'ad', 'dfasdf', NULL, 0),
(31, 'likjhgf', 'kfufyyrkury ymujyd', NULL, 0),
(32, 'ddd', 'dddd d d d d dd', NULL, 0),
(34, 'test1', 'tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 tit 2 ', NULL, 0),
(35, 'test1', 'asd;lfasdfaf adfasdfa asdfasdfasdf ', NULL, 0),
(36, 'asdf', 'dfasdf', '2019-05-11', 0),
(37, 'Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ±', 'Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù… Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± Ù…Ø¯ÙŠØ± ÙŠØ± Ù…Ø¯ÙŠØ± ÙŠØ± Ù…Ø¯ÙŠØ± ÙŠØ± Ù', '2019-05-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `role`) VALUES
(38, 'saad', 'saad@gmail.com', '123', 'client'),
(37, 'saleh', 'saleh@gmail.com', '123', 'client'),
(33, 'yazeed', 'yazeed@gmail.com', '123', 'worker'),
(34, 'mohammed', 'mohammed@gmail.com', '123', 'worker'),
(22, 'hamad', 'hamad@gmail.com', '123', 'admin'),
(41, 'ahmed', 'ahmad@ahmad.com', '123', 'worker');

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

DROP TABLE IF EXISTS `orderr`;
CREATE TABLE IF NOT EXISTS `orderr` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Eid` int(100) NOT NULL,
  `Pid` int(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `Eid` (`Eid`),
  KEY `Pid` (`Pid`),
  KEY `Eid_2` (`Eid`)
) ENGINE=MyISAM AUTO_INCREMENT=800 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`id`, `Eid`, `Pid`, `status`) VALUES
(79, 33, 93, 3),
(78, 33, 88, 3),
(77, 27, 90, 3),
(80, 27, 105, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `image`, `title`, `text`, `category`, `price`) VALUES
(88, '19_500x500.jpg', 'ddd', 'aaa', 'Ù‚Ø¯ÙŠÙ…', 55),
(90, 'saleh.jpg', 'Ù…Ø¯ÙŠØ±', 'asdf', 'Ù‚Ø¯ÙŠÙ…', 55),
(93, 'oldImg.jpg', 'asdf', 'asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf ', 'Ù‚Ø¯ÙŠÙ…', 44),
(105, 'newImgComp.jpg', 'Ù‚Ù„Ù‚', 'Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ Ù‚Ù„Ù‚ ', 'Ù…Ù†ÙˆØ¹', 55643);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`) VALUES
(24, 'abc', 'abc@abc.com', '$2y$10$yDRZCAEQBmQmeN8F2iKPiOoWuHhzYJmooAOs65uX1NOgsCK3ZOCl.', 555555555),
(25, 'ttt', 'ttt@ttt', '$2y$10$CPWZqkxqNYYymwQ6vrqHzuKyF0J4N1VwqTzMdGH.3mlw9CtZUUE0m', 555555555),
(26, 'zzz', 'zzz@zzz', '$2y$10$MEDy5TbZvqfoYQgBkLIhB.mC.eOC5v4cyDIV9r5l2a6zggbFvCQ.u', 555555555),
(27, 'Ø³Ø¹Ø¯ Ø¨Ù† Ù…ÙÙ„Ø­', 'saad@gmail.com', '$2y$10$XqgHIWi/EWDCnYjd8DmVgOX2hY1kieOIdT3h0Xk.PR5ICCuL8hSSa', 555555555),
(28, 'Ù…Ø¯ÙŠØ±', 'admin@admin.com', '$2y$10$zKUZrwuGGOooTHuG4XBWcez21mHK22ltnnqJf1BRIA.x8YjLLnOOy', 555555555);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
