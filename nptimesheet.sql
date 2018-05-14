-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 08:09 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `nptimesheet`
--

CREATE TABLE `nptimesheet` (
  `id` int(10) UNSIGNED NOT NULL,
  `week` int(191) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `nptask_id` int(10) UNSIGNED NOT NULL,
  `remarks` varchar(191) NOT NULL,
  `monday` int(10) NOT NULL,
  `tuesday` int(10) NOT NULL,
  `wednesday` int(10) NOT NULL,
  `thursday` int(10) NOT NULL,
  `friday` int(10) NOT NULL,
  `saturday` int(10) NOT NULL,
  `sunday` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nptimesheet`
--
ALTER TABLE `nptimesheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nptask_id` (`nptask_id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nptimesheet`
--
ALTER TABLE `nptimesheet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nptimesheet`
--
ALTER TABLE `nptimesheet`
  ADD CONSTRAINT `nptimesheet_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `nptimesheet_nptask_id_foreign` FOREIGN KEY (`nptask_id`) REFERENCES `nptask` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
