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
-- Table structure for table `t_f_process`
--

CREATE TABLE `t_f_process` (
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
-- Dumping data for table `t_f_process`
--

INSERT INTO `t_f_process` (`id`, `emp_id`, `process`, `auth_no`, `auth_year`, `date_authorized`, `expire_date`, `remarks`, `r_of_cancellation`, `d_of_cancellation`, `status`, `code`, `up_date_time`, `updated_by`, `r_status`, `r_review_by`, `r_approve_by`, `i_status`, `i_review_by`, `i_approve_by`) VALUES
(1, '18-03969', 'Appearance Inspection', 'FALP-ApI-7042', '2024', '2023-03-03', '2024-03-31', '32-ADDITONAL', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL, NULL, NULL),
(2, 'BF-49944', 'Appearance Inspection', 'FALP-ApI-7043', '2024', '2023-03-04', '2024-03-31', '32-ADDITONAL', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL, NULL, NULL),
(3, '21-06659', 'Appearance Inspection', 'FALP-ApI-3276', '2022', '2021-02-16', '2022-02-28', '31,32', 'ng', '2023-09-05', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', 'ejsms/ 2023-09-08 09:50:34', 'Reviewed', 'qualif/ 2023-09-08 17:01:59', NULL, NULL, NULL, NULL),
(4, 'EN69-1742', 'Appearance Inspection', 'FALP-ApI-3277', '2022', '2021-01-15', '2022-02-28', '31', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL, NULL, NULL),
(5, 'BF-17670', 'Appearance Inspection', 'FALP-ApI-3278', '2022', '2021-01-07', '2022-02-28', '31', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL, NULL, NULL),
(6, '21_PK49260', 'Appearance Inspection', 'AAA', '2023', '2023-09-05', '2023-09-09', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:11:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '21-06780', 'Appearance Inspection', 'q123', '2123', '2023-09-12', '2023-09-22', '', '', '0000-00-00', NULL, NULL, 'ejsms/ 2023-09-08 16:17:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '21-06659', 'Appearance Inspection', 'ww11', '2024', '2023-09-07', '2024-09-08', '', '', '0000-00-00', NULL, NULL, 'ejsms/ 2023-09-08 16:24:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, ' 18-03969', 'Appearance Inspection', 'FALP-ApI-7042', '2222', '2020-09-09', '2022-07-07', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-12 17:16:21', NULL, '', NULL, NULL, 'pending', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_f_process`
--
ALTER TABLE `t_f_process`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_f_process`
--
ALTER TABLE `t_f_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
