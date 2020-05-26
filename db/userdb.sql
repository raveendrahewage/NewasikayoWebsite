-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 06:36 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `memories`
--

CREATE TABLE `memories` (
  `mediaName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memories`
--

INSERT INTO `memories` (`mediaName`) VALUES
('Amal Lakshan.jpg'),
('Dimuthu Abeytunge.jpg'),
('Hansaka Sandaruwan.jpg'),
('set.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `stuNumber` varchar(255) NOT NULL,
  `postText` text NOT NULL,
  `mediaName` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `stuNumber`, `postText`, `mediaName`, `name`) VALUES
(6, '2018CS084', '         hghkjclkc\r\nckcsjkhklc\r\nckwcjksckjsc\r\nwkjckljcc', '', 'Raveendra Hewage'),
(9, '2018CS084', '         ', 'Uvindu Sandeepa.jpg', 'Raveendra Hewage'),
(10, '2018CS084', '         nfgjklkm\r\nklhvsxhvkjrgkv\r\nkhsjdhskljv\r\nklhjvhsdkfjvs\r\nkjhvklfjklsv\r\nnjkkvjs', 'Harukshan Kanagarathnam.jpg', 'Raveendra Hewage'),
(11, '2018CS084', 'bbcm nmbc ', '', 'Raveendra Hewage'),
(12, '2018CS084', '         ', 'Sudesh Bandara.jpg', 'Raveendra Hewage'),
(13, '2018CS084', 'ewcjgshgh\r\njksjh\r\nkhjccj', 'Amal Lakshan.jpg', 'Raveendra Hewage'),
(14, '2018CS084', 'xcs dv\r\nvs\r\nvsv\r\nvsvs\r\nvsv\r\nv', 'Kalana Ravishanka.jpg', 'Raveendra Hewage'),
(24, '2018CS084', '         ', '', 'Raveendra Hewage');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `stuNumber` varchar(100) NOT NULL,
  `IndNumber` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photoName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`stuNumber`, `IndNumber`, `firstName`, `lastName`, `email`, `photoName`, `password`, `phoNumber`) VALUES
('2018CS027', '18001127', 'Isuru', 'Srimal', 'isuru@gmail.com', 'Isuru Srimal.jpg', 'isuru123', 712347800),
('2018CS084', '18000843', 'Raveendra', 'Hewage', 'hewagerv@gmail.com', 'Raveendra Hewage.jpg', '1234', 717188823);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`mediaName`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`,`stuNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`stuNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
