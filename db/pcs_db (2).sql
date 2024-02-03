-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 07:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `partsname_master`
--

CREATE TABLE `partsname_master` (
  `id` int(11) NOT NULL,
  `parts` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ircs_line_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partsname_master`
--

INSERT INTO `partsname_master` (`id`, `parts`, `ircs_line_name`) VALUES
(1, '81817AN010(2)-A', 'SUBARU_05'),
(2, '81817AN00A(8)', 'SUBARU_05'),
(3, '81817AN05A(8)', 'SUBARU_05'),
(5, '81817AN060(2)-A', 'SUBARU_05'),
(6, '81817AN03A(8)', 'SUBARU_05'),
(7, '81817AN04A(8)', 'SUBARU_05'),
(8, '81802AN000(5)', 'SUBARU_07_2_APP'),
(9, '81802AN010(5)', 'SUBARU_07_2_APP'),
(10, '81802AN020(5)', 'SUBARU_07_2 _APP'),
(11, '81802AN030(5)', 'SUBARU_07_2_APP'),
(12, '81802AN040(5)', 'SUBARU_07_2 APP'),
(13, '81802AN050(5)', 'SUBARU_07_2 APP'),
(14, '81802AN060(5)', 'SUBARU_07_2 APP'),
(15, '81802AN070(5)', 'SUBARU_07_2 APP'),
(16, '81802AN080(5)', 'SUBARU_07_2 APP'),
(17, '81802AN090(5)', 'SUBARU_07_2 APP'),
(18, '81802AN0100(5)', 'SUBARU_07_2 APP'),
(19, '81802AN0110(5)', 'SUBARU_07_2 APP'),
(20, '81802AN0120(5)', 'SUBARU_07_2 APP'),
(21, '81802AN0130(5)', 'SUBARU_07_2 APP'),
(22, '81802AN0140(5)', 'SUBARU_07_2 APP'),
(23, '81802AN0150(5)', 'SUBARU_07_2 APP'),
(24, '81802AN0160(5)', 'SUBARU_07_2 APP'),
(25, '81802AN0170(5)', 'SUBARU_07_2 APP'),
(26, '81817-AN050(2)-A', 'SUBARU_05'),
(27, '81817-AN000(2)-A', 'SUBARU_05'),
(28, '81817AN050(2)-A', 'SUBARU_05'),
(29, '36680-67T00-3-P', 'SUZUKI_83'),
(30, '36680-67T10-3-P', 'SUZUKI_83'),
(31, '36680-67T20-3-P', 'SUZUKI_83'),
(32, '36680-67T20-3-P', 'SUZUKI_83'),
(33, '36680-67T30-3-P', 'SUZUKI_83'),
(37, '36680-67T50-3-P', 'SUZUKI_83'),
(38, '36680-67T00-2-P', 'SUZUKI_83'),
(40, '36843-67T00-2-P', 'SUZUKI_83'),
(41, '36680-67T40-3-P', 'SUZUKI_83_APP'),
(42, '32752-TJB-C612-12-L', 'HONDA_70'),
(43, '32751-TJB-A012-12-L', 'HONDA_70'),
(44, '3A530-59S00', 'SUZUKI_73'),
(45, '3A530-83S00', 'SUZUKI_73'),
(46, 'product1', 'TEST'),
(47, 'product2', 'TEST'),
(48, '36076-50TGO-3-P', 'SUZUKI_01'),
(49, '36076-50T80-3-P', 'SUZUKI_01');

-- --------------------------------------------------------

--
-- Table structure for table `pcs_accounts`
--

CREATE TABLE `pcs_accounts` (
  `ID` int(11) NOT NULL,
  `User_ID` varchar(255) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Full_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level_db` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcs_accounts`
--

INSERT INTO `pcs_accounts` (`ID`, `User_ID`, `User_name`, `Full_name`, `Password`, `Level_db`) VALUES
(1, '18-03686', 'Russel', 'Russel Masangkay', '-', 'User Account'),
(2, '123', 'Russel', 'Russel Masangkay', '-', 'User Account');

-- --------------------------------------------------------

--
-- Table structure for table `pcs_admin_account`
--

CREATE TABLE `pcs_admin_account` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcs_admin_account`
--

INSERT INTO `pcs_admin_account` (`id`, `name`, `password`) VALUES
(1, 'Prince Arce', '20008'),
(2, 'IT Support Group', 'FALPITsupgrp@2018'),
(3, 'JB Jalla', '14-01871'),
(4, 'jj', 'jj');

-- --------------------------------------------------------

--
-- Table structure for table `pcs_ircs_line`
--

CREATE TABLE `pcs_ircs_line` (
  `ID` int(11) NOT NULL,
  `line_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ircs_line` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IP_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pcs_ircs_line`
--

INSERT INTO `pcs_ircs_line` (`ID`, `line_name`, `ircs_line`, `IP_address`) VALUES
(1, '6101', 'NISSAN_01', ''),
(2, '6102', 'NISSAN_02', ''),
(3, '6103', 'NISSAN_03', ''),
(4, '3110', 'HONDA_10', ''),
(5, '2107', 'DAIHATSU_07', ''),
(6, '1115', 'MAZDA_15', ''),
(7, '1130', 'MAZDA_30', ''),
(8, '2102', 'DAIHATSU_02', ''),
(9, '3107', 'HONDA_05', ''),
(14, '1032', 'MAZDA_53', ''),
(15, '5105', 'SUZUKI_04', ''),
(16, '5006', 'SUZUKI_24', ''),
(17, '5108', 'SUZUKI_12', ''),
(18, '5110', 'SUZUKI_19', ''),
(19, '5111', 'SUZUKI_20', ''),
(20, '5112', 'SUZUKI_21', ''),
(21, '5015', 'SUZUKI_33', ''),
(22, '5121', 'SUZUKI_51', ''),
(23, '5022', 'SUZUKI_54', ''),
(24, '5101', 'SUZUKI_01', '172.25.119.133'),
(25, '1033', 'MAZDA_67', '172.25.113.196'),
(26, '1033', 'MAZDA_65', '172.25.113.246'),
(27, '1033', 'MAZDA_60', '172.25.113.198'),
(28, '1033', 'MAZDA_59', '172.25.115.251'),
(29, '1033', 'MAZDA_61', '172.25.115.60'),
(30, '1033', 'MAZDA_62', '172.25.113.218'),
(31, '1033', 'MAZDA_64', '172.25.113.197'),
(32, '1034', 'MAZDA_66', '172.25.115.65'),
(35, '5031', 'SUZUKI_73', '172.25.114.186'),
(36, '5031', 'SUZUKI_67', '172.25.115.244'),
(45, '3037', 'HONDA_49', '172.25.167.62'),
(49, '3135', 'HONDA_47_3', '172.25.165.66'),
(53, '7110', 'SUBARU_05_App', '172.25.167.28'),
(61, '5130', 'SUZUKI_70', '172.25.115.154'),
(62, '5132', 'SUZUKI_71', '172.25.115.102'),
(69, '3140', 'HONDA_48', '172.25.161.80'),
(70, '3142', 'HONDA_50', '172.25.167.121'),
(71, '3138', 'HONDA_40', '172.25.167.85'),
(72, '3043', 'HONDA_41', '172.25.161.128'),
(73, '3043', 'HONDA_51', '172.25.161.148'),
(74, '3043', 'HONDA_52', '172.25.161.123'),
(75, '3043', 'HONDA_42', '172.25.161.120'),
(78, '7111', 'SUBARU_02', '172.25.165.29'),
(79, '3129', 'HONDA_32', '172.25.165.128'),
(82, '3125', 'HONDA_34', '172.25.165.103'),
(83, '3139', 'HONDA_40_2', '172.25.161.75'),
(84, '3141', 'HONDA_53', '172.25.167.135'),
(85, '3124', 'HONDA_35', '172.25.165.122'),
(86, '5133', 'SUZUKI_77', '172.25.113.214'),
(89, '5031', 'SUZUKI_78', '172.25.113.146'),
(90, '3123', 'HONDA_36', '172.25.165.118'),
(93, '7121', 'SUBARU_09', '172.25.165.148'),
(96, '5136', 'SUZUKI_75', '172.25.113.83'),
(97, '3144', 'HONDA_47_5', '172.25.161.154'),
(98, '7122', 'SUBARU_10', '172.25.161.105'),
(99, '3127', 'HONDA_33', '172.25.165.165'),
(104, '7119', 'SUBARU_08_1', '172.25.167.226'),
(108, '7104', 'SUBARU_04', '172.25.167.129'),
(110, '7120', 'SUBARU_08_2', '172.25.167.39'),
(118, '3145', 'HONDA_47_6', '172.25.161.108'),
(119, '7101', 'SUBARU_04_1', '172.25.165.18'),
(120, '2117', 'DAIHATSU_16', '172.25.161.141'),
(121, '3133', 'HONDA_47_1', '172.25.165.57'),
(122, 'MAZDA 1008', 'MAZDA_16_2', '172.25.115.42'),
(124, '3130', 'HONDA_63', '161.165'),
(125, '7109', 'SUBARU_05', '172.25.165.27'),
(129, '3134', 'HONDA_47', '172.25.167.146'),
(132, '4111', 'TOYOTA_10', '172.25.119.93'),
(133, '4112', 'TOYOTA_11', '172.25.116.80'),
(134, '0000', 'TEST', '172.25.162.113'),
(136, '5138', 'SUZUKI_83_QA', '172.25.115.17'),
(137, '4117', 'TOYOTA_16', '172.25.114.134'),
(139, '5140', 'SUZUKI_82', '172.25.115.14'),
(140, '5138', 'SUZUKI_83', '172.25.113.146'),
(141, '3147', 'HONDA_60', '172.25.161.35'),
(142, '3126', 'HONDA_61', '172.25.167.161'),
(143, '3155', 'HONDA_71', '172.25.160.106'),
(144, '3154', 'HONDA_70', '172.25.160.97'),
(145, '3156', 'HONDA_69', '172.25.160.101'),
(146, '4121', 'TOYOTA_19', '172.25.117.133'),
(147, '4122', 'TOYOTA_21', '172.25.162.130'),
(148, '4122', 'TOYOTA_21', '172.25.162.130'),
(150, '4124', 'TOYOTA_22', '172.25.162.20'),
(151, '3136', 'HONDA_47_4', '172.25.161.9'),
(152, '3122', 'HONDA_37', '172.25.165.146'),
(153, '4120', 'TOYOTA_23', '172.25.162.80'),
(154, '1135', 'MAZDA_71', '172.25.114.247'),
(155, '4115', 'TOYOTA_12', '172.25.160.119'),
(156, '4125', 'TOYOTA_24', '172.25.165.224'),
(157, '3157', 'HONDA_72', '172.25.161.225'),
(158, '4126', 'TOYOTA_25', '172.25.162.110'),
(160, '3163', 'HONDA_76', '172.25.162.217'),
(161, '3162', 'HONDA_75', '172.25.162.223'),
(162, '3161', 'HONDA_74', '172.25.162.113'),
(163, '3067_1', 'HONDA_84', '172.25.162.183'),
(164, '3067_2', 'HONDA_85', '172.25.162.252'),
(165, '3067_3', 'HONDA_86', '172.25.162.193'),
(166, '3067_4', 'HONDA_87', '172.25.162.199'),
(167, '3067_5', 'HONDA_88', '172.25.162.230'),
(168, '3066_1', 'HONDA_80', '172.25.162.228'),
(169, '3066_2', 'HONDA_81', '172.25.162.236'),
(170, '3066_3', 'HONDA_82', '172.25.162.241'),
(171, '3066_4', 'HONDA_83', '172.25.162.246'),
(173, '3160', 'HONDA_74_QA', '172.25.162.46'),
(175, '3165', 'HONDA_78', '172.25.162.214'),
(176, '3158', 'HONDA_73', '172.25.165.161'),
(177, '1125', 'MAZDA_40', '172.25.119.175'),
(178, 'Suzuki 5139', 'SUZUKI_84', '172.25.115.103'),
(180, '2130', 'DAIHATSU_29', '172.25.160.180'),
(181, '2131', 'DAIHATSU_30_1', '172.25.162.38'),
(184, '2132', 'DAIHATSU_30', '172.25.161.166'),
(186, '5031', 'SUZUKI_72', '172.25.114.189'),
(187, '3169', 'HONDA_91', '172.25.160.105'),
(188, '3149', 'HONDA_64', '172.25.165.95'),
(189, '2115', 'DAIHATSU_09_APP', '172.25.160.198'),
(192, '7118', 'SUBARU_07_APP', '172.25.161.93'),
(193, '7118', 'SUBARU_07_QA', '172.25.161.107'),
(194, '7116_APP', 'SUBARU_07', '172.25.167.233'),
(195, '1138', 'MAZDA_72', '172.25.112.176'),
(199, '1136 ', 'MAZDA_71_1', '172.25.112.225'),
(200, '3170', 'HONDA_93', '172.25.165.66'),
(201, '5136', 'SUZUKI_73', '172.25.113.83'),
(202, '3171', 'HONDA_93_QA', '172.25.162.247'),
(203, '5134', 'SUZUKI_76', '172.25.113.251'),
(204, '5029', 'SUZUKI_85', '172.25.167.2'),
(205, '5041', 'SUZUKI_13', '172.25.116.253'),
(206, '5041', 'SUZUKI_05', '172.25.117.68'),
(207, '7112', 'SUBARU_02_1', '172.25.167.24'),
(208, '1008', 'MAZDA_16_1_QA_1', '172.25.115.189'),
(209, '1008', 'MAZDA_16_1_APP_1', '172.25.115.41'),
(210, '3161', 'HONDA_74_APP', '172.25.162.115'),
(211, '5104', 'SUZUKI_02', '172.25.119.165'),
(212, '2116', 'DAIHATSU_09_01', '172.25.165.139'),
(213, '5126', 'SUZUKI_66', '172.25.113.231'),
(214, '5128', 'SUZUKI_63', '172.25.113.227'),
(215, '2125', 'DAIHATSU_12', '172.25.165.187');

-- --------------------------------------------------------

--
-- Table structure for table `pcs_plan`
--

CREATE TABLE `pcs_plan` (
  `ID` int(11) NOT NULL,
  `Carmodel` varchar(255) NOT NULL,
  `Line` varchar(255) NOT NULL,
  `ID_No` varchar(255) DEFAULT NULL,
  `Target` int(11) NOT NULL DEFAULT 0,
  `Actual_Target` int(11) NOT NULL DEFAULT 0,
  `Remaining_Target` varchar(255) NOT NULL DEFAULT '0',
  `Status` varchar(255) NOT NULL,
  `is_paused` varchar(255) NOT NULL DEFAULT 'NO',
  `IRCS_Line` varchar(255) NOT NULL,
  `lot_no` varchar(1024) DEFAULT NULL,
  `datetime_DB` datetime DEFAULT NULL,
  `ended_DB` datetime DEFAULT NULL,
  `takt_secs_DB` int(11) DEFAULT 0,
  `last_takt_DB` int(11) DEFAULT 0,
  `last_update_DB` datetime DEFAULT NULL,
  `actual_start_DB` datetime DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `IP_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcs_plan`
--

INSERT INTO `pcs_plan` (`ID`, `Carmodel`, `Line`, `ID_No`, `Target`, `Actual_Target`, `Remaining_Target`, `Status`, `is_paused`, `IRCS_Line`, `lot_no`, `datetime_DB`, `ended_DB`, `takt_secs_DB`, `last_takt_DB`, `last_update_DB`, `actual_start_DB`, `theme`, `IP_address`) VALUES
(1, 'TEST', '0000', NULL, 2, 0, '-2', 'Done', 'NO', 'TEST', '', '2022-12-09 08:52:56', '2022-12-09 08:53:40', 15, 8, '2022-12-09 08:53:38', '2022-12-09 08:00:00', NULL, '172.25.162.113'),
(2, 'TEST', '0000', NULL, 5, 0, '-5', 'Done', 'NO', 'TEST', '', '2022-12-09 10:20:36', '2022-12-09 10:21:41', 10, 6, '2022-12-09 10:21:39', '2022-12-09 08:00:00', NULL, '172.25.162.113'),
(3, 'HONDA', '3138', NULL, 0, 34, '34', 'Done', 'NO', 'HONDA_40', '593ERX,593FQM,593FF8,593ES0,593ERY,593ERV,593DK9,593FQJ,', '2022-12-09 10:23:29', '2022-12-09 10:23:48', 30, 12, '2022-12-09 10:23:43', '2022-12-09 08:00:00', NULL, '172.25.167.85'),
(4, 'HONDA', '3138', NULL, 6, 22, '16', 'Done', 'NO', 'HONDA_40', '593ERX,593FQM,593ERV,593FQJ,', '2022-12-09 10:24:02', '2022-12-09 10:29:54', 50, 44, '2022-12-09 10:29:53', '2022-12-09 08:00:00', NULL, '172.25.167.85'),
(5, 'MAZDA', 'MAZDA 1008', NULL, 0, 0, '0', 'Done', 'NO', 'MAZDA_16_2', '', '2022-12-09 10:30:23', '2022-12-09 10:30:27', 60, 0, '2022-12-09 10:30:23', '2022-12-09 08:00:00', NULL, '172.25.115.42'),
(6, 'MAZDA', 'MAZDA 1008', NULL, 2, 92, '90', 'Done', 'NO', 'MAZDA_16_2', '593G8L,593FMK,', '2022-12-09 10:30:36', '2022-12-09 10:33:01', 54, 27, '2022-12-09 10:32:55', '2022-12-09 08:00:00', NULL, '172.25.115.42'),
(7, 'MAZDA', '1008', NULL, 0, 83, '83', 'Done', 'NO', 'MAZDA_16_1_APP_1', '593FLW,', '2022-12-09 10:33:23', '2022-12-09 10:34:19', 270, 47, '2022-12-09 10:34:12', '2022-12-09 08:00:00', NULL, '172.25.115.41'),
(8, 'SUBARU', '7118', NULL, 6, 27, '21', 'Done', 'NO', 'SUBARU_07_APP', '593G11,593FBN,593DGR,', '2022-12-09 11:18:17', '2022-12-09 11:35:27', 151, 115, '2022-12-09 11:35:26', '2022-12-09 08:00:00', NULL, '172.25.161.93'),
(9, 'SUBARU', '7116_APP', NULL, 4, 64, '60', 'Done', 'NO', 'SUBARU_07', '593FNG,593G11,', '2022-12-09 11:22:49', '2022-12-09 11:33:25', 151, 26, '2022-12-09 11:33:24', '2022-12-09 08:00:00', NULL, '172.25.167.233'),
(10, 'SUBARU', '7119', NULL, 2, 64, '62', 'Done', 'NO', 'SUBARU_08_1', '593D65,593HBE,', '2022-12-09 11:27:23', '2022-12-09 11:32:36', 126, 55, '2022-12-09 11:32:34', '2022-12-09 08:00:00', NULL, '172.25.167.226'),
(11, 'SUBARU', '7120', NULL, 67, 69, '2', 'Pending', 'NO', 'SUBARU_08_2', '593HBE,', '2022-12-09 11:32:06', NULL, 120, 40, '2022-12-09 11:46:55', '2022-12-09 08:00:00', NULL, '172.25.167.39'),
(12, 'SUBARU', '7119', NULL, 66, 74, '8', 'Pending', 'NO', 'SUBARU_08_1', '593D65,593HBE,', '2022-12-09 11:33:06', NULL, 126, 46, '2022-12-09 11:46:36', '2022-12-09 08:00:00', NULL, '172.25.167.226'),
(13, 'SUBARU', '7116_APP', NULL, 70, 65, '-5', 'Done', 'NO', 'SUBARU_07', '593FNG,593G11,', '2022-12-09 11:34:27', '2022-12-09 11:34:36', 151, 5, '2022-12-09 11:34:34', '2022-12-09 08:00:00', NULL, '172.25.167.233'),
(14, 'SUBARU', '7116_APP', NULL, 64, 72, '8', 'Pending', 'NO', 'SUBARU_07', '593FNG,593G11,', '2022-12-09 11:35:11', NULL, 151, 121, '2022-12-09 11:47:22', '2022-12-09 08:00:00', NULL, '172.25.167.233'),
(15, 'SUBARU', '7118', NULL, 65, 31, '-34', 'Pending', 'NO', 'SUBARU_07_APP', '593G11,593FBN,593DGR,', '2022-12-09 11:36:11', NULL, 151, 8, '2022-12-09 11:49:02', '2022-12-09 08:00:00', NULL, '172.25.161.93'),
(16, 'SUBARU', '7112', NULL, 78, 83, '5', 'Pending', 'NO', 'SUBARU_02_1', '593FNP,593FBT,593FNM,', '2022-12-09 11:39:41', NULL, 128, 110, '2022-12-09 11:48:00', '2022-12-09 08:00:00', NULL, '172.25.167.24'),
(17, 'SUBARU', '7110', NULL, 61, 59, '-2', 'Pending', 'NO', 'SUBARU_05_App', '593FNF,', '2022-12-09 11:43:14', NULL, 161, 141, '2022-12-09 11:48:19', '2022-12-09 08:00:00', NULL, '172.25.167.28'),
(18, 'MAZDA', '1008', NULL, 0, 105, '105', 'Done', 'NO', 'MAZDA_16_1_APP_1', '593FLW,', '2022-12-09 11:55:31', '2022-12-09 11:56:15', 270, 26, '2022-12-09 11:56:07', '2022-12-09 08:00:00', NULL, '172.25.115.41'),
(19, 'MAZDA', '1008', NULL, 0, 105, '105', 'Done', 'NO', 'MAZDA_16_1_APP_1', '593FLW,', '2022-12-09 11:55:34', '2022-12-09 11:56:15', 270, 26, '2022-12-09 11:56:07', '2022-12-09 08:00:00', NULL, '172.25.115.41'),
(20, 'MAZDA', '1008', NULL, 0, 105, '105', 'Done', 'NO', 'MAZDA_16_1_APP_1', '593FLW,', '2022-12-09 11:55:37', '2022-12-09 11:56:15', 270, 26, '2022-12-09 11:56:07', '2022-12-09 08:00:00', NULL, '172.25.115.41'),
(21, 'MAZDA', '1008', NULL, 0, 105, '105', 'Done', 'NO', 'MAZDA_16_1_APP_1', '593FLW,', '2022-12-09 11:55:37', '2022-12-09 11:56:15', 270, 26, '2022-12-09 11:56:07', '2022-12-09 08:00:00', NULL, '172.25.115.41'),
(22, 'MAZDA', '1008', NULL, 0, 105, '105', 'Done', 'NO', 'MAZDA_16_1_APP_1', '593FLW,', '2022-12-09 11:55:38', '2022-12-09 11:56:15', 270, 26, '2022-12-09 11:56:07', '2022-12-09 08:00:00', NULL, '172.25.115.41');

-- --------------------------------------------------------

--
-- Table structure for table `pcs_resolution_tv`
--

CREATE TABLE `pcs_resolution_tv` (
  `id` int(11) NOT NULL,
  `line_number` varchar(200) DEFAULT NULL,
  `ircs_line_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcs_resolution_tv`
--

INSERT INTO `pcs_resolution_tv` (`id`, `line_number`, `ircs_line_name`) VALUES
(5, '1033', 'MAZDA_61'),
(6, '1034', 'MAZDA_66'),
(7, '1033', 'MAZDA_64'),
(8, '1033', 'MAZDA_62'),
(9, '5130', 'SUZUKI_70'),
(10, '5132', 'SUZUKI_71'),
(11, '5133', 'SUZUKI_77'),
(12, '5031', 'SUZUKI_67'),
(13, '5031', 'SUZUKI_73'),
(18, '5136', 'SUZUKI_75'),
(22, '2107', 'DAIHATSU_07'),
(24, '3031', 'HONDA_49'),
(25, '7017', 'SUBARU_08'),
(27, '3135', 'HONDA_47_3'),
(30, '7110', 'SUBARU_05'),
(33, '3136', 'HONDA_47_4'),
(38, 'SUZUKI_70', '5130'),
(39, 'SUZUKI_71', '5132'),
(42, '3140', 'HONDA_48'),
(43, '3142', 'HONDA_50'),
(44, '3141', 'HONDA_53'),
(45, '3043', 'HONDA_41'),
(46, '3043', 'HONDA_51'),
(47, '3138', 'HONDA_40'),
(48, '3043', 'HONDA_42'),
(49, '3043', 'HONDA_52'),
(51, '3129', 'HONDA_32'),
(53, '3125', 'HONDA_34'),
(55, '3124', 'HONDA_35'),
(56, '5031', 'SUZUKI_78'),
(57, '3123', 'HONDA_36'),
(59, '7104', 'SUBARU_04'),
(60, '7121', 'SUBARU_09'),
(61, '3144', 'HONDA_47_5'),
(62, '3139', 'HONDA_40_2'),
(69, '3127', 'HONDA_33'),
(71, '7101', 'SUBARU_04_1'),
(72, '7120', 'SUBARU_08_02'),
(74, '7118', 'SUBARU_07_03'),
(76, '7122', 'SUBARU_10'),
(78, '7119', 'SUBARU_08_1'),
(79, '7120', 'SUBARU_08_2'),
(80, '1033', 'MAZDA_65'),
(81, '1033', 'MAZDA_67'),
(83, '7116', 'SUBARU_07_2_APP'),
(84, '3145', 'HONDA_47_6'),
(85, '5101', 'SUZUKI_01'),
(86, '2117', 'DAIHATSU_16'),
(87, '3133', 'HONDA_47_1'),
(88, 'MAZDA 1008', 'MAZDA_16_2'),
(89, '3130', 'HONDA_63'),
(90, 'SUZUKI 5031', 'SUZUKI_82'),
(91, 'HONDA 3147', 'HONDA_60'),
(92, '3134', 'HONDA_47'),
(94, '7111', 'SUBARU_02'),
(95, '5138', 'SUZUKI_83'),
(96, '4117', 'TOYOTA_16');

-- --------------------------------------------------------

--
-- Table structure for table `view_count`
--

CREATE TABLE `view_count` (
  `id` int(11) NOT NULL,
  `ip_viewer` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partsname_master`
--
ALTER TABLE `partsname_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcs_accounts`
--
ALTER TABLE `pcs_accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pcs_admin_account`
--
ALTER TABLE `pcs_admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcs_ircs_line`
--
ALTER TABLE `pcs_ircs_line`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pcs_plan`
--
ALTER TABLE `pcs_plan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pcs_resolution_tv`
--
ALTER TABLE `pcs_resolution_tv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_count`
--
ALTER TABLE `view_count`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partsname_master`
--
ALTER TABLE `partsname_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pcs_accounts`
--
ALTER TABLE `pcs_accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pcs_admin_account`
--
ALTER TABLE `pcs_admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pcs_ircs_line`
--
ALTER TABLE `pcs_ircs_line`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `pcs_plan`
--
ALTER TABLE `pcs_plan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pcs_resolution_tv`
--
ALTER TABLE `pcs_resolution_tv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `view_count`
--
ALTER TABLE `view_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
