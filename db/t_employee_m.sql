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
-- Table structure for table `t_employee_m`
--

CREATE TABLE `t_employee_m` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `agency` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_employee_m`
--

INSERT INTO `t_employee_m` (`id`, `fullname`, `emp_id`, `agency`, `batch`) VALUES
(1, 'Cabral, Rubelyn H.', '19-04494', 'FAS',  177),
(2, 'Ñacasaet, Shiela L.', '15-02828', 'FAS',  55),
(3, 'Valencia, Noemi L.', '14-01668', 'FAS',  20),
(4, 'Buenaagua, Liza L.', '14-01362', 'FAS',  18),
(5, 'Acunin, Mark Edward P.', '21_PK49260', 'PKMT',  372),
(6, 'Magpulhin, Riza M.', '21-06780\r\n', 'FAS',  245),
(7, 'DACARA, LOWILDA D.', '17_PK15043', 'PKMT',  169),
(8, 'Valencia, Noemi L.', 'P14-01668', 'PKMT',  20),
(9, 'ej', '123', 'ADDEVEN',  321),
(10, 'jj', '111', 'GOLDENHAND',  222),
(12, 'Acunin, Mark Edward P.', '12345', 'FAS',  372),
(13, 'Mark Edward P.', '12345', 'FAS',  372),
(14, 'Quinio, Ariane A.', '18-03969', 'FAS',  169),
(15, 'Carollo, Janine L.', 'BF-49944', 'MAXIM',  530),
(16, 'SAPALARAN, JUDY ANNE C.', '21-06659', 'FAS',  297),
(17, 'BATALLER, DAISY D.', 'EN69-1742', 'MEGATREND',  295),
(18, 'LOPEZ, TRACIA ANNE B.', 'BF-17670', 'MAXIM',  297),
(22, 'RENNA', '14-01314', 'FAS',  15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_employee_m`
--
ALTER TABLE `t_employee_m`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_employee_m`
--
ALTER TABLE `t_employee_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
