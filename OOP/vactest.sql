-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 07:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vactest`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
`id` int(5) NOT NULL,
  `latitude` double(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userID` int(4) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `age` int(4) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'Male',
  `pictures` varchar(200) NOT NULL,
  `HomeCountry` varchar(50) NOT NULL DEFAULT 'Rwanda'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `userName`, `password`, `email`, `age`, `gender`, `pictures`, `HomeCountry`) VALUES
(1, 'admin', 'admin', '@admin', '11', 'admin@yahoo.fr', 1890, 'Male', 'Files/Photos/21098.png', 'Germany'),
(2, 'kim', 'ali', '@kim', '11', 'kimali@gmail.com', 1990, 'Female', 'Files/Photos/4955.jpg', 'Rwanda'),
(3, 'bella', 'bella', '@bella', '11', 'bella@gmail.com', 1995, 'Female', 'Files/Photos/10232.png', 'Rwanda'),
(4, 'seth', 'bientus', '@seth', '11', 'bientus@gmail.com', 1996, 'Male', 'Files/Photos/26273.jpg', 'Rwanda'),
(5, 'louis', 'suarez', '@suarez', '11', 'suarez@yahoo.fr', 1990, 'Male', 'Files/Photos/28257.jpg', 'Uruguay'),
(6, 'ishimwe', 'josee', '@josee', '11', 'josee@hotmail.com', 1997, 'Female', 'Files/Photos/15750.png', 'Rwanda'),
(7, 'alexis', 'sanchez', '@sanchez', '11', 'sanchez@gmail.com', 1990, 'Male', 'Files/Photos/13895.jpg', 'Chile'),
(8, 'arsene', 'wenger', '@arsene', '11', 'arsene@gmail.com', 1950, 'Male', 'Files/Photos/28276.png', 'France'),
(9, 'ariana', 'grande', '@ariana', '11', 'ariana@hotmail.com', 1997, 'Female', 'Files/Photos/3997.jpg', 'USA'),
(10, 'munezero', 'anna', '@anna', '11', 'anna@gmail.com', 1998, 'Female', 'Files/Photos/11282.jpg', 'Rwanda'),
(11, 'eden', 'hazard', '@eden', '11', 'eden@yahoo.fr', 1989, 'Male', 'Files/Photos/31559.jpg', 'Belgium'),
(12, 'baraka', 'gedeon', '@baraka', '11', 'gedeon@yahoo.fr', 1993, 'Male', 'Files/Photos/12417.jpg', 'DRC'),
(13, 'louis', 'nani', '@nani', '11', 'nani@gmail.com', 1990, 'Male', 'Files/Photos/26182.jpg', 'France');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userID`), ADD UNIQUE KEY `userName` (`userName`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
