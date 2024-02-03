-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 02:22 AM
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
-- Database: `qualif`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_i_process`
--

CREATE TABLE `t_i_process` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `process` varchar(255) DEFAULT NULL,
  `auth_no` varchar(255) NOT NULL,
  `auth_year` varchar(20) NOT NULL,
  `date_authorized` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `r_of_cancellation` varchar(255) DEFAULT NULL,
  `d_of_cancellation` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `up_date_time` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `r_status` varchar(20) DEFAULT NULL,
  `r_review_by` varchar(50) DEFAULT NULL,
  `r_approve_by` varchar(50) DEFAULT NULL,
  `i_status` varchar(50) DEFAULT NULL,
  `i_review_by` varchar(50) DEFAULT NULL,
  `i_approve_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_i_process`
--

INSERT INTO `t_i_process` (`id`, `emp_id`, `process`, `auth_no`, `auth_year`, `date_authorized`, `expire_date`, `remarks`, `r_of_cancellation`, `d_of_cancellation`, `status`, `code`, `up_date_time`, `updated_by`, `r_status`, `r_review_by`, `r_approve_by`, `i_status`, `i_review_by`, `i_approve_by`) VALUES
(1, '15-02828', 'Silicon Injection', 'FALP-SI-056', '2022', '2019-12-17', '2022-12-31', '24', 'sdd', '2023-09-08', NULL, NULL, NULL, 'ejsms/ 2023-09-07 08:25:32', 'Approved', 'qualif/ 2023-09-08 09:52:09', 'app/ 2023-09-08 09:52:57', NULL, NULL, NULL),
(2, '15-02828', 'Silicon Injection', 'FALP-SI-056', '2025', '2022-12-15', '2025-12-31', '24', 'sdd', '2023-09-08', NULL, NULL, NULL, 'ejsms/ 2023-09-07 08:25:32', 'Approved', 'qualif/ 2023-09-08 09:52:09', 'app/ 2023-09-08 09:52:57', NULL, NULL, NULL),
(10, '19-04494', 'Material Handling (Zaihai)', 'FALP-ZAIHAI-018', '2023', '2020-03-04', '2023-03-31', '22', 'aa', '2023-09-05', NULL, NULL, NULL, 'ejsms/ 2023-09-06 08:01:10', 'Approved', 'qualif/ 2023-09-06 08:01:41', 'app/ 2023-09-06 08:02:45', NULL, NULL, NULL),
(11, '19-04494', 'Material Handling (Zaihai)', 'FALP-ZAIHAI-018', '2026', '2023-02-09', '2026-03-31', 'qq', 'aa', '2023-09-05', NULL, NULL, NULL, 'ejsms/ 2023-09-06 08:01:10', 'Approved', 'qualif/ 2023-09-06 08:01:41', 'app/ 2023-09-06 08:02:45', NULL, NULL, NULL),
(13, '15-02828', 'Silicon Injection', 'FALP-SI-056', '2025', '2019-12-17', '2025-12-31', '24', 'sdd', '2023-09-08', NULL, NULL, NULL, 'ejsms/ 2023-09-07 08:25:32', 'Approved', 'qualif/ 2023-09-08 09:52:09', 'app/ 2023-09-08 09:52:57', NULL, NULL, NULL),
(14, '21_PK49260', 'Aluminum Preparation', 'III', '2021', '2023-09-06', '2023-09-09', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:03:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '21_PK49260', 'Aluminum Preparation', 'aaA', '2222', '2023-09-07', '2023-09-16', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:18:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '14-01314', 'C & C ALPHA', 'CCCN/A', '2233', '2023-09-04', '2023-09-07', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:24:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '21_PK49260', 'Aluminum Preparation', 'III', '2022', '2022-08-06', '2022-09-06', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:41:07', NULL, '', NULL, NULL, NULL, NULL, NULL),
(18, '14-01314', 'C & C ALPHA', 'CCCN/A', '2222', '2020-09-09', '2022-07-07', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:44:53', NULL, '', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_i_process`
--
ALTER TABLE `t_i_process`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_i_process`
--
ALTER TABLE `t_i_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
