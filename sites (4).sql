-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 10:38 AM
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
-- Table structure for table `sites_diebold`
--

CREATE TABLE `sites_diebold` (
  `SN` int(3) NOT NULL,
  `Status` varchar(22) DEFAULT NULL,
  `Phase` varchar(7) DEFAULT NULL,
  `Customer` varchar(25) DEFAULT NULL,
  `Bank` varchar(13) DEFAULT NULL,
  `ATMID` varchar(40) DEFAULT NULL,
  `ATMID_2` varchar(40) DEFAULT NULL,
  `ATMID_3` varchar(8) DEFAULT NULL,
  `ATMID_4` varchar(8) DEFAULT NULL,
  `TrackerNo` varchar(40) DEFAULT NULL,
  `ATMShortName` varchar(255) DEFAULT NULL,
  `SiteAddress` text DEFAULT NULL,
  `City` varchar(25) DEFAULT NULL,
  `State` varchar(25) DEFAULT NULL,
  `Zone` varchar(15) DEFAULT NULL,
  `Panel_Make` varchar(20) DEFAULT NULL,
  `OldPanelID` varchar(6) DEFAULT NULL,
  `NewPanelID` varchar(10) DEFAULT NULL,
  `DVRIP` varchar(20) DEFAULT NULL,
  `DVRName` varchar(15) DEFAULT NULL,
  `DVR_Model_num` varchar(250) DEFAULT NULL,
  `Router_Model_num` varchar(250) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `live` char(10) NOT NULL DEFAULT 'N',
  `current_dt` datetime DEFAULT NULL,
  `mailreceive_dt` datetime DEFAULT NULL,
  `eng_name` varchar(50) DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `editby` varchar(50) DEFAULT NULL,
  `site_remark` varchar(1000) DEFAULT NULL,
  `PanelIP` varchar(25) DEFAULT NULL,
  `AlertType` varchar(10) NOT NULL DEFAULT 'C',
  `live_date` date DEFAULT NULL,
  `RouterIp` varchar(50) DEFAULT NULL,
  `last_modified` int(11) NOT NULL DEFAULT 0,
  `partial_live` int(6) NOT NULL DEFAULT 0,
  `CTS_LocalBranch` varchar(200) DEFAULT NULL,
  `installationDate` datetime DEFAULT NULL,
  `old_atmid` varchar(60) DEFAULT NULL,
  `auto_alert` int(5) NOT NULL DEFAULT 0,
  `project` varchar(20) NOT NULL DEFAULT 'RMS',
  `comfortID` varchar(20) DEFAULT NULL,
  `panel_power_connection` varchar(250) DEFAULT NULL,
  `router_port` int(5) NOT NULL DEFAULT 0,
  `dvr_port` int(5) NOT NULL DEFAULT 0,
  `panel_port` int(5) NOT NULL DEFAULT 0,
  `server_ip` varchar(60) NOT NULL DEFAULT '0',
  `unique_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sites_diebold`
--
ALTER TABLE `sites_diebold`
  ADD PRIMARY KEY (`SN`),
  ADD KEY `live` (`live`),
  ADD KEY `OldPanelID` (`OldPanelID`),
  ADD KEY `DVRIP` (`DVRIP`),
  ADD KEY `NewPanelID` (`NewPanelID`),
  ADD KEY `Panel_Make` (`Panel_Make`),
  ADD KEY `live_date` (`live_date`),
  ADD KEY `Panel_Make_2` (`Panel_Make`),
  ADD KEY `PanelIP` (`PanelIP`),
  ADD KEY `auto_alert` (`auto_alert`),
  ADD KEY `idx_sites` (`NewPanelID`,`ATMID`),
  ADD KEY `server_ip` (`server_ip`),
  ADD KEY `idx_old_panelid` (`OldPanelID`),
  ADD KEY `idx_new_panelid` (`NewPanelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sites_diebold`
--
ALTER TABLE `sites_diebold`
  MODIFY `SN` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
