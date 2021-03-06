-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 06:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_buget`
--

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` int(4) NOT NULL,
  `users_id` int(4) NOT NULL,
  `description` char(50) NOT NULL DEFAULT '''''',
  `value` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `users_id`, `description`, `value`, `created_at`) VALUES
(1, 1, 'Chirie', 1200, '2020-02-11 07:49:58'),
(2, 1, 'Intretinere', 600, '2020-02-11 07:49:58'),
(5, 1, 'Achizitie televizor', 1000, '2020-02-11 13:11:10'),
(10, 1, 'Taxa afterschool', 1200, '2020-02-13 13:12:09'),
(13, 3, 'Factura gaz', 100, '2020-02-20 13:47:57'),
(16, 5, 'Intretinere', 300, '2020-02-21 07:37:01'),
(17, 15, 'Fizioterapie', 420, '2020-01-21 13:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(4) NOT NULL,
  `users_id` int(4) NOT NULL,
  `description` char(50) NOT NULL DEFAULT '''''',
  `value` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `users_id`, `description`, `value`, `created_at`) VALUES
(1, 1, 'Salariu', 5000, '2020-02-11 07:24:35'),
(5, 1, 'Vanzare canapea', 200, '2020-02-11 13:10:41'),
(9, 3, 'Spor de stres', 500, '2020-02-20 14:58:16'),
(12, 15, 'Pensie', 1600, '2020-02-21 13:31:13'),
(13, 1, 'Vanzare bicicleta', 250, '2020-02-21 16:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `email` char(35) NOT NULL DEFAULT '''''',
  `first_name` char(20) NOT NULL DEFAULT '''''',
  `last_name` char(20) NOT NULL DEFAULT '''''',
  `password` char(32) CHARACTER SET utf32 NOT NULL DEFAULT '''''',
  `adress` char(30) NOT NULL DEFAULT '''''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `adress`, `created_at`) VALUES
(1, 'mihai@gmail.com', 'Mihai', 'Voina', '123456', 'Brasov', '2020-02-11 12:55:57'),
(3, 'bianca@gmail.com', 'Bianca', 'Voina', '123456', 'Brasov', '2020-02-20 12:47:01'),
(5, 'claudiu@gmail.com', 'Claudiu', 'Stan', 'ccc', 'Brasov', '2020-02-20 16:19:51'),
(15, 'elena@gmail.com', 'Elena', 'Voina', 'eee', 'Brasov', '2020-02-21 14:14:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
