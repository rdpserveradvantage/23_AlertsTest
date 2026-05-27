-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esurv`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_alerts_diebold_diebold`
--

CREATE TABLE `ai_alerts_diebold` (
  `id` int(11) NOT NULL,
  `panelid` varchar(10) NOT NULL,
  `seqno` varchar(100) DEFAULT NULL,
  `zone` varchar(3) DEFAULT NULL,
  `alarm` varchar(3) DEFAULT NULL,
  `createtime` datetime NOT NULL,
  `receivedtime` datetime DEFAULT current_timestamp(),
  `comment` varchar(500) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'O',
  `sendtoclient` char(1) DEFAULT NULL,
  `closedBy` varchar(20) DEFAULT NULL,
  `closedtime` datetime DEFAULT NULL,
  `sendip` varchar(15) DEFAULT NULL,
  `alerttype` varchar(50) DEFAULT NULL,
  `location` char(1) DEFAULT NULL,
  `priority` char(1) DEFAULT NULL,
  `AlertUserStatus` varchar(50) DEFAULT NULL,
  `ATMCode` varchar(50) DEFAULT NULL,
  `File_loc` mediumtext DEFAULT NULL,
  `cms_ip` varchar(15) DEFAULT NULL,
  `comment_status` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_alerts_diebold`
--
ALTER TABLE `ai_alerts_diebold`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receivedtime` (`receivedtime`),
  ADD KEY `status` (`status`),
  ADD KEY `closedBy` (`closedBy`),
  ADD KEY `createtime` (`createtime`),
  ADD KEY `sendip` (`sendip`),
  ADD KEY `alerttype` (`alerttype`),
  ADD KEY `ATMCode` (`ATMCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ai_alerts_diebold`
--
ALTER TABLE `ai_alerts_diebold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
