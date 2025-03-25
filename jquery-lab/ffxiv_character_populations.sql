-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2025 at 07:49 PM
-- Server version: 10.5.27-MariaDB
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skampjes1_dmit2503`
--

-- --------------------------------------------------------

--
-- Table structure for table `ffxiv_character_populations`
--

CREATE TABLE `ffxiv_character_populations` (
  `race` varchar(50) NOT NULL,
  `2020` int(10) NOT NULL,
  `2021` int(10) NOT NULL,
  `2022` int(10) NOT NULL,
  `2023` int(10) NOT NULL,
  `2024` int(10) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ffxiv_character_populations`
--

INSERT INTO `ffxiv_character_populations` (`race`, `2020`, `2021`, `2022`, `2023`, `2024`, `id`) VALUES
('Au Ra', 121318, 177162, 208044, 246335, 265382, 1),
('Elezen', 31241, 44674, 50470, 59240, 63831, 2),
('Hrothgar', 18260, 21347, 24793, 29588, 32288, 3),
('Hyur', 114696, 164575, 179270, 209188, 225551, 4),
('Lalafell', 96817, 130158, 153846, 181891, 196422, 5),
('Miqote', 186885, 267706, 303550, 357363, 303012, 6),
('Roegadyn', 18900, 31246, 36938, 43260, 46540, 7),
('Viera', 59173, 145574, 163213, 189827, 204001, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ffxiv_character_populations`
--
ALTER TABLE `ffxiv_character_populations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ffxiv_character_populations`
--
ALTER TABLE `ffxiv_character_populations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
