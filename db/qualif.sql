-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 01:55 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fname`, `role`, `username`, `password`) VALUES
(1, 'ejsms', 'admin', 'admin', 'admin'),
(2, 'meme', 'qc', 'qc', 'qc'),
(11, 'qualif', 'admin_reviewer', 'qualif', 'qualif'),
(12, 'app', 'hrd_approver', 'app', 'app'),
(13, 'asd', 'hrd_approver ', 'asd', 'asd'),
(14, 'qq', 'admin', 'qq', 'qq'),
(15, 'aa', 'admin_reviewer', 'aa', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'initial'),
(2, 'final');

-- --------------------------------------------------------

--
-- Table structure for table `m_agency`
--

CREATE TABLE `m_agency` (
  `id` int(11) NOT NULL,
  `agency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_agency`
--

INSERT INTO `m_agency` (`id`, `agency`) VALUES
(1, 'MAXIM'),
(2, 'ONESOURCE'),
(3, 'MEGATREND'),
(4, 'ADDEVEN'),
(5, 'GOLDENHAND'),
(7, 'FAS'),
(8, 'PKMT');

-- --------------------------------------------------------

--
-- Table structure for table `m_process`
--

CREATE TABLE `m_process` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `process` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_process`
--

INSERT INTO `m_process` (`id`, `category`, `process`) VALUES
(1, 'initial', 'Material Handling (Zaihai)'),
(2, 'initial', 'Silicon Injection'),
(3, 'initial', 'Gomusen Insertion'),
(4, 'initial', 'COT Semi-Automatic Cutting'),
(5, 'initial', 'LA Molding'),
(6, 'initial', 'Twisting'),
(7, 'initial', 'Joint Insulation Taping'),
(8, 'initial', 'Joint Insulation Taping (Intermediate Welding Joint)'),
(9, 'initial', 'Shikakari Handling'),
(10, 'initial', 'Point Marking'),
(11, 'initial', 'Automatic Cutting Crimping & Twisting'),
(12, 'initial', 'Aluminum Preparation'),
(13, 'initial', '(AB) Terminal Crimping'),
(14, 'initial', 'Cutting & Crimping Process'),
(15, 'initial', 'Terminal Crimping'),
(16, 'initial', 'Wire cutting process (include of special wire)'),
(17, 'initial', 'Stripping process (include of special wire)'),
(18, 'initial', 'Joint Crimping'),
(19, 'initial', 'Intermediate stripping'),
(20, 'initial', 'Resistance Welding Joint'),
(21, 'initial', 'Terminal Crimping for Battery'),
(22, 'initial', 'Shield wire'),
(23, 'initial', 'Shield wire Taping'),
(24, 'initial', 'Heat Shrink (Raychem)'),
(25, 'initial', 'Dip/Ultrasonic Dip Solder'),
(26, 'initial', 'Dip Soldering'),
(27, 'initial', 'Terminal Crimping Inspection (C&C and Manual)'),
(28, 'initial', 'Joint Crimping Inspection'),
(29, 'initial', 'Resistance Welding Joint Inspection'),
(30, 'initial', 'Dip Solder Inspection'),
(31, 'initial', 'Dip/Ultrasonic Dip Solder Inspection'),
(32, 'initial', 'LA Mold Inspection'),
(33, 'initial', 'Shield wire Inspection'),
(34, 'initial', 'STMac'),
(35, 'initial', 'Terminal Crimping Inspection (Airbag & Manual) '),
(36, 'initial', 'Joint Crimping Inspection'),
(37, 'initial', 'Resistance Welding Inspection'),
(38, 'initial', 'In-Process Inspection'),
(39, 'initial', 'Non Stop Crimping'),
(40, 'initial', 'Sub Assembly Machine (NS IV)'),
(41, 'initial', 'Lamp Connector Pressure Welding'),
(42, 'initial', 'Re-Crimping'),
(43, 'initial', 'V SHAPE TWISTING'),
(44, 'initial', 'UV III (Ultra violet)'),
(45, 'initial', 'C & C ALPHA'),
(46, 'initial', 'Tube Cutting Inspection'),
(47, 'initial', 'VS AUTOMATIC CUTTING'),
(48, 'initial', 'VO AUTOMATIC CUTTING'),
(49, 'initial', 'COT AUTOMATIC CUTTING'),
(50, 'initial', 'Tube Making Process'),
(51, 'initial', 'Heat Shrink (Blower)'),
(52, 'initial', 'Drainwire Tip Process'),
(53, 'initial', 'Temporary Servo Crimping & Ultrasonic Welding Process'),
(54, 'initial', 'Arc Welding C&C Machine Process'),
(55, 'initial', 'Ferrule Crimping Process'),
(56, 'final', 'LAY-OUT PROCESS'),
(57, 'final', 'Option Taping'),
(58, 'final', 'Taping Process'),
(59, 'final', 'BAND GUN'),
(60, 'final', 'Parts Distribution'),
(61, 'final', 'Material Handling (Distribution)'),
(62, 'final', 'GROMMET FITTING PROCESS'),
(63, 'final', 'Tsumesen Insertion'),
(64, 'final', 'NSUB'),
(65, 'final', 'Airbag NSPC '),
(66, 'final', 'Sub-Assy & Lay-out'),
(67, 'final', 'Assembly Process'),
(68, 'final', 'Taping, Band Gun & Parts Distribution Process'),
(69, 'final', 'Sub Assembly Process'),
(70, 'final', 'AIRBAG SUB ASSEMBLY'),
(71, 'final', 'Dimension Inspection'),
(72, 'final', 'ECT Inspection'),
(73, 'final', 'Appearance Inspection'),
(74, 'final', 'Assurance Inspection Process'),
(75, 'final', 'Fuse Image'),
(76, 'final', 'Arm Type Torque Fixing'),
(77, 'final', 'TBO Checking'),
(78, 'final', 'One Liquid Silicon Injection / Helium Leak Checker'),
(79, 'final', 'SPARK Test'),
(80, 'final', 'Reworking Responsible Person'),
(81, 'final', 'Terminal Remove'),
(82, 'final', 'FUNCTION INSPECTION TESTER'),
(83, 'final', 'Incoming Inspection'),
(84, 'final', 'FIRST GOOD INSPECTION'),
(85, 'final', 'INCOMING QUALITY INSPECTION'),
(86, 'final', 'Plastic Tube Inspection'),
(87, 'final', 'LONG GROMMET INSERTION PROCESS');

-- --------------------------------------------------------

--
-- Table structure for table `t_employee_m`
--

CREATE TABLE `t_employee_m` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `agency` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_employee_m`
--

INSERT INTO `t_employee_m` (`id`, `fullname`, `emp_id`, `agency`, `dept`, `batch`) VALUES
(1, 'Cabral, Rubelyn H.', '19-04494', 'FAS', 'PD', 177),
(2, 'Ñacasaet, Shiela L.', '15-02828', 'FAS', 'PD', 55),
(3, 'Valencia, Noemi L.', '14-01668', 'FAS', 'PD', 20),
(4, 'Buenaagua, Liza L.', '14-01362', 'FAS', 'PD', 18),
(5, 'Acunin, Mark Edward P.', '21_PK49260', 'PKMT', 'PD', 372),
(6, 'Magpulhin, Riza M.', '21-06780\r\n', 'FAS', 'PD', 245),
(7, 'DACARA, LOWILDA D.', '17_PK15043', 'PKMT', 'PD', 169),
(8, 'Valencia, Noemi L.', 'P14-01668', 'PKMT', 'PD', 20),
(9, 'ej', '123', 'ADDEVEN', 'it', 321),
(10, 'jj', '111', 'GOLDENHAND', 'ww', 222),
(12, 'Acunin, Mark Edward P.', '12345', 'FAS', 'PD', 372),
(13, 'Mark Edward P.', '12345', 'FAS', 'PD', 372),
(14, 'Quinio, Ariane A.', '18-03969', 'FAS', 'QA', 169),
(15, 'Carollo, Janine L.', 'BF-49944', 'MAXIM', 'QA', 530),
(16, 'SAPALARAN, JUDY ANNE C.', '21-06659', 'FAS', 'QA', 297),
(17, 'BATALLER, DAISY D.', 'EN69-1742', 'MEGATREND', 'QA', 295),
(18, 'LOPEZ, TRACIA ANNE B.', 'BF-17670', 'MAXIM', 'QA', 297),
(22, 'RENNA', '14-01314', 'FAS', 'rts', 15);

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
  `review_by` varchar(50) DEFAULT NULL,
  `approve_by` varchar(50) DEFAULT NULL,
  `i_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_f_process`
--

INSERT INTO `t_f_process` (`id`, `emp_id`, `process`, `auth_no`, `auth_year`, `date_authorized`, `expire_date`, `remarks`, `r_of_cancellation`, `d_of_cancellation`, `status`, `code`, `up_date_time`, `updated_by`, `r_status`, `review_by`, `approve_by`, `i_status`) VALUES
(1, '18-03969', 'Appearance Inspection', 'FALP-ApI-7042', '2024', '2023-03-03', '2024-03-31', '32-ADDITONAL', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL),
(2, 'BF-49944', 'Appearance Inspection', 'FALP-ApI-7043', '2024', '2023-03-04', '2024-03-31', '32-ADDITONAL', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL),
(3, '21-06659', 'Appearance Inspection', 'FALP-ApI-3276', '2022', '2021-02-16', '2022-02-28', '31,32', 'ng', '2023-09-05', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', 'ejsms/ 2023-09-08 09:50:34', 'Reviewed', 'qualif/ 2023-09-08 17:01:59', NULL, NULL),
(4, 'EN69-1742', 'Appearance Inspection', 'FALP-ApI-3277', '2022', '2021-01-15', '2022-02-28', '31', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL),
(5, 'BF-17670', 'Appearance Inspection', 'FALP-ApI-3278', '2022', '2021-01-07', '2022-02-28', '31', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-07 14:04:14', NULL, '', NULL, NULL, NULL),
(6, '21_PK49260', 'Appearance Inspection', 'AAA', '2023', '2023-09-05', '2023-09-09', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:11:03', NULL, NULL, NULL, NULL, NULL),
(7, '21-06780', 'Appearance Inspection', 'q123', '2123', '2023-09-12', '2023-09-22', '', '', '0000-00-00', NULL, NULL, 'ejsms/ 2023-09-08 16:17:27', NULL, NULL, NULL, NULL, NULL),
(8, '21-06659', 'Appearance Inspection', 'ww11', '2024', '2023-09-07', '2024-09-08', '', '', '0000-00-00', NULL, NULL, 'ejsms/ 2023-09-08 16:24:56', NULL, NULL, NULL, NULL, NULL),
(10, ' 18-03969', 'Appearance Inspection', 'FALP-ApI-7042', '2222', '2020-09-09', '2022-07-07', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-12 17:16:21', NULL, '', NULL, NULL, 'pending');

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
  `review_by` varchar(50) DEFAULT NULL,
  `approve_by` varchar(50) DEFAULT NULL,
  `i_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_i_process`
--

INSERT INTO `t_i_process` (`id`, `emp_id`, `process`, `auth_no`, `auth_year`, `date_authorized`, `expire_date`, `remarks`, `r_of_cancellation`, `d_of_cancellation`, `status`, `code`, `up_date_time`, `updated_by`, `r_status`, `review_by`, `approve_by`, `i_status`) VALUES
(1, '15-02828', 'Silicon Injection', 'FALP-SI-056', '2022', '2019-12-17', '2022-12-31', '24', 'sdd', '2023-09-08', NULL, NULL, NULL, 'ejsms/ 2023-09-07 08:25:32', 'Approved', 'qualif/ 2023-09-08 09:52:09', 'app/ 2023-09-08 09:52:57', NULL),
(2, '15-02828', 'Silicon Injection', 'FALP-SI-056', '2025', '2022-12-15', '2025-12-31', '24', 'sdd', '2023-09-08', NULL, NULL, NULL, 'ejsms/ 2023-09-07 08:25:32', 'Approved', 'qualif/ 2023-09-08 09:52:09', 'app/ 2023-09-08 09:52:57', NULL),
(10, '19-04494', 'Material Handling (Zaihai)', 'FALP-ZAIHAI-018', '2023', '2020-03-04', '2023-03-31', '22', 'aa', '2023-09-05', NULL, NULL, NULL, 'ejsms/ 2023-09-06 08:01:10', 'Approved', 'qualif/ 2023-09-06 08:01:41', 'app/ 2023-09-06 08:02:45', NULL),
(11, '19-04494', 'Material Handling (Zaihai)', 'FALP-ZAIHAI-018', '2026', '2023-02-09', '2026-03-31', 'qq', 'aa', '2023-09-05', NULL, NULL, NULL, 'ejsms/ 2023-09-06 08:01:10', 'Approved', 'qualif/ 2023-09-06 08:01:41', 'app/ 2023-09-06 08:02:45', NULL),
(13, '15-02828', 'Silicon Injection', 'FALP-SI-056', '2025', '2019-12-17', '2025-12-31', '24', 'sdd', '2023-09-08', NULL, NULL, NULL, 'ejsms/ 2023-09-07 08:25:32', 'Approved', 'qualif/ 2023-09-08 09:52:09', 'app/ 2023-09-08 09:52:57', NULL),
(14, '21_PK49260', 'Aluminum Preparation', 'III', '2021', '2023-09-06', '2023-09-09', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:03:42', NULL, NULL, NULL, NULL, NULL),
(15, '21_PK49260', 'Aluminum Preparation', 'aaA', '2222', '2023-09-07', '2023-09-16', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:18:25', NULL, NULL, NULL, NULL, NULL),
(16, '14-01314', 'C & C ALPHA', 'CCCN/A', '2233', '2023-09-04', '2023-09-07', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:24:46', NULL, NULL, NULL, NULL, NULL),
(17, '21_PK49260', 'Aluminum Preparation', 'III', '2022', '2022-08-06', '2022-09-06', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:41:07', NULL, '', NULL, NULL, NULL),
(18, '14-01314', 'C & C ALPHA', 'CCCN/A', '2222', '2020-09-09', '2022-07-07', '', '', '0000-00-00', NULL, NULL, 'qualif/ 2023-09-08 10:44:53', NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_notif_can`
--

CREATE TABLE `t_notif_can` (
  `id` int(10) UNSIGNED NOT NULL,
  `interface` varchar(255) NOT NULL,
  `notif_new_can_request` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `notif_approval` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `notif_approved` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `notif_disapproved` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_notif_can`
--

INSERT INTO `t_notif_can` (`id`, `interface`, `notif_new_can_request`, `notif_approval`, `notif_approved`, `notif_disapproved`) VALUES
(1, 'admin', 0, 0, 0, 0),
(2, 'hrd_approver', 0, 1, 0, 0),
(3, 'qc', 0, 0, 3, 2),
(4, 'admin_reviewer', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_agency`
--
ALTER TABLE `m_agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_process`
--
ALTER TABLE `m_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_employee_m`
--
ALTER TABLE `t_employee_m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_f_process`
--
ALTER TABLE `t_f_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_i_process`
--
ALTER TABLE `t_i_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_notif_can`
--
ALTER TABLE `t_notif_can`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_agency`
--
ALTER TABLE `m_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_process`
--
ALTER TABLE `m_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `t_employee_m`
--
ALTER TABLE `t_employee_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_f_process`
--
ALTER TABLE `t_f_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_i_process`
--
ALTER TABLE `t_i_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t_notif_can`
--
ALTER TABLE `t_notif_can`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
