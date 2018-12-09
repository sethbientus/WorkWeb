-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 09:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akando`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
`clubID` int(20) NOT NULL,
  `clubName` varchar(30) NOT NULL,
  `clubleader` varchar(40) NOT NULL,
  `field` varchar(40) NOT NULL,
  `campName` varchar(40) NOT NULL,
  `grouppassword` varchar(40) NOT NULL,
  `bkAccount` varchar(10) NOT NULL,
  `aboutClub` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`clubID`, `clubName`, `clubleader`, `field`, `campName`, `grouppassword`, `bkAccount`, `aboutClub`) VALUES
(1, 'indatwa', 'eric', 'web', 'mahama', '1212', 'hello', '1212'),
(2, 'intwari', 'turikumwe', 'construction', 'kigeme', '121212', '12121212', 'we are ready');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(3) NOT NULL,
  `post_id` int(3) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `content`, `username`) VALUES
(1, 1, 'sdfl', 'sdf'),
(2, 2, 'sdfl', 'sdf'),
(3, 3, 'ejjg', 'er'),
(4, 1, 'lhjgj', 'sdf'),
(5, 2, 'woooo', 'heyyy'),
(6, 2, 'woooo', 'heyyy'),
(7, 2, 'ejjg', 'heyyy'),
(11, 1, 'fggdtsres', 'fggggr'),
(12, 3, 'keeeeee', 'jooooo'),
(13, 5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `chapter` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `video` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `chapter`, `content`, `video`) VALUES
(1, 'tailro', 'try', 'hello world', 'upload/videos/UPVBSP10T315-V018400.MP4'),
(2, 'php', 'helloe', 'continue', 'upload/videos/UPVBSP10T315-V018300.MP4'),
(3, 'construction', 'plumbing', 'world', 'upload/docs/1b.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `funding`
--

CREATE TABLE IF NOT EXISTS `funding` (
`id` int(3) NOT NULL,
  `project_id` int(3) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `contact` int(12) NOT NULL,
  `financial_inst` varchar(100) NOT NULL,
  `bank_account` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funding`
--

INSERT INTO `funding` (`id`, `project_id`, `firstname`, `lastname`, `email`, `amount`, `contact`, `financial_inst`, `bank_account`) VALUES
(1, 2, 'divin', 'fiston', 'admin@server.domain', 123324, 2147483647, 'bk', 33545453),
(2, 2, 'divin', 'fiston', 'admin@server.domain', 123324, 2147483647, 'bk', 33545453),
(3, 1, 'dsd', 'dff', 'divinfiston1@gmail.com', 3223, 2147483647, 'bk', 345345453),
(4, 1, 'er', 'wq', 'we@.ce', 235, 2147483647, 'bk', 343534),
(5, 2, 'divin', 'fiston', 'admin@server.domain', 123324, 2147483647, 'bk', 33333333);

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE IF NOT EXISTS `help` (
`id` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE IF NOT EXISTS `ideas` (
`id` int(3) NOT NULL,
  `project_id` int(3) NOT NULL,
  `idea` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `project_id`, `idea`) VALUES
(42, 1, 'idea1'),
(43, 2, 'ide2'),
(44, 1, 'errorrr'),
(45, 2, 'err'),
(46, 1, 'rtti'),
(47, 2, 'hey'),
(48, 1, 'ertert'),
(49, 1, 'ddfd'),
(50, 2, 'dfggg'),
(51, 2, 'dfggg'),
(52, 1, 'ghjhj');

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE IF NOT EXISTS `opportunity` (
`id` int(3) NOT NULL,
  `title` varchar(500) NOT NULL,
  `opportunity` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`id`, `title`, `opportunity`) VALUES
(1, 'hello World', 'opportunity');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(3) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `content`, `user_id`) VALUES
(1, 'comment1', 1),
(2, 'comment2', 1),
(3, 'comment4', 1),
(4, 'fcomments', 1),
(5, 'comment7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(3) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `explanation` varchar(10000) NOT NULL,
  `file` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `explanation`, `file`) VALUES
(1, 'akando web app', 'Project1', 'our first project', ''),
(2, 'bk', 'kigali', 'rwanda', ''),
(3, 'third', 'third1', 'third11', 'upload/docs/network devices.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userID` int(30) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `passwrd` varchar(30) NOT NULL,
  `bkAccount` varchar(10) NOT NULL,
  `portfolio` varchar(50) NOT NULL,
  `aboutMe` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `userName`, `passwrd`, `bkAccount`, `portfolio`, `aboutMe`) VALUES
(1, 'clever', 'clever', 'clever', '11', '1212', '../Portfolios/20035.pdf', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
 ADD PRIMARY KEY (`clubID`), ADD UNIQUE KEY `clubleader` (`clubleader`,`field`), ADD UNIQUE KEY `clubName` (`clubName`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funding`
--
ALTER TABLE `funding`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opportunity`
--
ALTER TABLE `opportunity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userID`), ADD UNIQUE KEY `userName` (`userName`), ADD UNIQUE KEY `bkAccount` (`bkAccount`), ADD UNIQUE KEY `portfolio` (`portfolio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
MODIFY `clubID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `funding`
--
ALTER TABLE `funding`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `opportunity`
--
ALTER TABLE `opportunity`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
