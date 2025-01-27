-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2024 at 12:39 PM
-- Server version: 11.1.2-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamelibrary`
--

CREATE TABLE `gamelibrary` (
  `id` int(11) NOT NULL,
  `game_title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gamelibrary`
--

INSERT INTO `gamelibrary` (`id`, `game_title`, `genre`, `release_date`, `price`) VALUES
(1, 'Genshin Impact', 'Adventure & RPG', '2020-09-28', 0.00),
(2, 'Grand Theft Auto V', 'Action Adventure', '2013-09-17', 400000.00),
(3, 'Red Dead Redemption II', 'Action Open-World', '2019-12-06', 879000.00),
(4, 'VALORANT', 'FPS', '2020-06-02', 0.00),
(5, 'RAFT', 'Survival', '2022-06-20', 135000.00),
(6, 'SEKIRO', 'Action', '2019-03-22', 890000.00),
(7, 'Elden Ring', 'Openworld & RPG', '2022-02-25', 599000.00),
(8, 'The Last of Us', 'Post Apocalypse & Horror', '2023-03-28', 979000.00),
(9, 'Resident Evil 4 : Remake', 'Horror Survival', '2023-03-24', 595000.00),
(10, 'Stardew Valley', 'Pixel', '2016-02-27', 115000.00),
(16, 'Jujutsu Kaisen: Phantom Parade', 'Turn-Based Action RPG', '2024-11-07', 0.00),
(17, 'Call of Duty: Mobile', 'FPS', '2019-10-01', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamelibrary`
--
ALTER TABLE `gamelibrary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamelibrary`
--
ALTER TABLE `gamelibrary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
