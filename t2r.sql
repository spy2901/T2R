-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 09:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t2r`
--

-- --------------------------------------------------------

--
-- Table structure for table `igre`
--

CREATE TABLE `igre` (
  `id` int(11) NOT NULL,
  `igra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igre`
--

INSERT INTO `igre` (`id`, `igra`) VALUES
(1, 'ticket to ride'),
(2, 'ne ljuti se covece');

-- --------------------------------------------------------

--
-- Table structure for table `igre1`
--

CREATE TABLE `igre1` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `igraci` varchar(255) NOT NULL,
  `pobednik` varchar(255) NOT NULL,
  `vrsta_igre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igre1`
--

INSERT INTO `igre1` (`id`, `datum`, `igraci`, `pobednik`, `vrsta_igre`) VALUES
(1, '2022-03-09', 'admin,admin1,user1,user2,', 'user2', 'ticket to ride'),
(2, '2022-03-16', 'admin,admin1,user1,user2,', 'admin1', 'ne ljuti se covece'),
(3, '2022-03-17', 'admin,user,user1,user2,', 'user1', 'ticket to ride');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user',
  `brPobeda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`, `brPobeda`) VALUES
(1, 'admin', '1234', 'admin', 4),
(2, 'user', '1234', 'user', 5),
(3, 'admin1', '1234', 'admin', 11),
(4, 'user1', '1234', 'user', 7),
(5, 'user2', '1234', 'user', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igre`
--
ALTER TABLE `igre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `igre1`
--
ALTER TABLE `igre1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igre`
--
ALTER TABLE `igre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `igre1`
--
ALTER TABLE `igre1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
