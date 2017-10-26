-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 08:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookjourneysimpledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `comment`) VALUES
(1, 'hiwadup'),
(2, 'hithsidfhsdhfhi'),
(3, 'test'),
(5, 'test'),
(6, 'test'),
(7, 'test'),
(8, '&lt;iframe style=&quot;position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;&quot; border=&quot;0&quot; src=&quot;http://ju.se/&quot;  /&gt;'),
(9, '&lt;b&gt;hi&lt;/b&gt;'),
(10, '&lt;b&gt;hiiii&lt;/b&gt;'),
(11, '<b>yo</b>');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `ID` int(11) NOT NULL,
  `SSN` char(10) DEFAULT NULL,
  `First name` varchar(20) NOT NULL,
  `Last name` varchar(20) NOT NULL,
  `Birth year` int(11) DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `ISBN` char(13) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Pages` int(11) DEFAULT NULL,
  `Edition` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Publishing company` varchar(50) DEFAULT NULL,
  `Reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`ID`, `SSN`, `First name`, `Last name`, `Birth year`, `URL`, `ISBN`, `Title`, `Pages`, `Edition`, `Year`, `Publishing company`, `Reserved`) VALUES
(1, '0123456789', 'Book', 'Journey', 1973, 'http://bookjourney.com/', '1234567890123', 'Book Journey', 289, 1, 2017, 'Book Journey Inc.', 0),
(2, '0123456789', 'Book', 'Journey', 1973, 'http://bookjourney.com/', '3224547890153', 'Book Journey 2', 229, 2, 2017, 'Book Journey Inc.', 0),
(3, '0123456789', 'Book', 'Journey', 1973, 'http://bookjourney.com/', '5234567890123', 'Book Journey 3', 328, 3, 2017, 'Book Journey Inc.', 1),
(4, '1234567890', 'Destroy', 'Bookson', 1987, NULL, '9234563890123', 'Book Bye', 82, 1, 2014, 'Book Publishing 101 Inc.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`) VALUES
(1, 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785'),
(2, 'username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
