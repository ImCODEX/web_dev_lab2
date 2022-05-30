-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 05:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariuri_sportive`
--

-- --------------------------------------------------------

--
-- Table structure for table `pariu`
--

CREATE TABLE `pariu` (
  `echipa1` varchar(50) NOT NULL,
  `echipa2` varchar(50) NOT NULL,
  `cota1` float NOT NULL,
  `cota2` float NOT NULL,
  `data` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pariu`
--

INSERT INTO `pariu` (`echipa1`, `echipa2`, `cota1`, `cota2`, `data`, `id`) VALUES
('K23', 'Isurus', 2.9, 2, '2020-05-24', 2),
('Entropiq', 'Sprout', 1.13, 8, '2022-05-25', 5),
('Rapid', 'Cluj', 2, 3, '2022-06-01', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(3, 'admin', 'admin@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(14, 'razvan', 'razvanpostescu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(15, 'razvanpostescu', 'razvan@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_bets`
--

CREATE TABLE `user_bets` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `cota` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_bets`
--

INSERT INTO `user_bets` (`id`, `uid`, `pid`, `cota`, `date_added`) VALUES
(11, 3, 5, 1, '2022-05-25'),
(14, 3, 2, 2, '2020-05-24'),
(17, 3, 5, 8, '2022-05-25'),
(18, 3, 10, 2, '2022-06-01'),
(19, 15, 5, 8, '2022-05-25'),
(20, 15, 10, 3, '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_cards`
--

CREATE TABLE `user_cards` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cards`
--

INSERT INTO `user_cards` (`id`, `uid`, `card_number`, `card_name`) VALUES
(3, 3, '4000500060007000', 'Razvan Postescu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pariu`
--
ALTER TABLE `pariu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_bets`
--
ALTER TABLE `user_bets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_bets_ibfk_2` (`pid`),
  ADD KEY `user_bets_ibfk_1` (`uid`);

--
-- Indexes for table `user_cards`
--
ALTER TABLE `user_cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pariu`
--
ALTER TABLE `pariu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_bets`
--
ALTER TABLE `user_bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_cards`
--
ALTER TABLE `user_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_bets`
--
ALTER TABLE `user_bets`
  ADD CONSTRAINT `user_bets_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_bets_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `pariu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
