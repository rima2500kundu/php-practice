-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2025 at 03:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phppractice`
--

-- --------------------------------------------------------

--
-- Table structure for table `phpcrud`
--

CREATE TABLE `phpcrud` (
  `id` int(18) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phpcrud`
--

INSERT INTO `phpcrud` (`id`, `title`, `description`, `timestamp`) VALUES
(5, 'rima', 'hi rima', '2025-07-11 16:10:26'),
(15, 'hhhgtfht', 'httht', '2025-07-11 18:41:29'),
(16, 'thth', 'thth', '2025-07-11 18:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `phppractice`
--

CREATE TABLE `phppractice` (
  `id` int(18) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phppractice`
--

INSERT INTO `phppractice` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'rima', '1234', '2025-07-11 14:57:52'),
(2, 'tima', '$2y$10$t2S0yY5D9OG3j4F/7otk.OSCmX.2JFlU33w0ywV1JSdxnuDgLGOVu', '2025-07-11 15:09:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phpcrud`
--
ALTER TABLE `phpcrud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phppractice`
--
ALTER TABLE `phppractice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phpcrud`
--
ALTER TABLE `phpcrud`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `phppractice`
--
ALTER TABLE `phppractice`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
