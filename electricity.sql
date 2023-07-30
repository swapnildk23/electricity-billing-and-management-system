-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 08:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electricity`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `CONS_ID` bigint(20) DEFAULT NULL,
  `RR_NO` int(11) NOT NULL,
  `C_NAME` varchar(20) DEFAULT NULL,
  `TF_CODE` varchar(20) DEFAULT NULL,
  `SUB_CODE` varchar(50) DEFAULT NULL,
  `C_ADDRESS` varchar(50) DEFAULT NULL,
  `EMAIL_ID` varchar(50) DEFAULT NULL,
  `DISCOUNT` double DEFAULT NULL,
  `PASS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`CONS_ID`, `RR_NO`, `C_NAME`, `TF_CODE`, `SUB_CODE`, `C_ADDRESS`, `EMAIL_ID`, `DISCOUNT`, `PASS`) VALUES
(1834741253, 1010, 'GURURAM', 'LT-2(a)(i)', 'JAYANAGAR,S-1', '#51/6,5TH CROSS,JAYANAGAR,BENGALURU SOUTH', 'gururam@gmail.com', 230, '0101'),
(4480755, 1234, 'BHASKAR', 'LT-2(a)(ii)', 'HOSAKOTE,AVALAHALLI', 'AVALAHALLI,HOSAKOTE,BENGALURU RURAL', 'bhaskar@gmail.com', 0, '4321'),
(1461088947, 2345, 'EREN YEAGER', 'HT-4', 'WHITE FIELD,E-4', 'PRESTIGE,WHITE FIELD,BENGALURU EAST', 'eren_yeager@gmail.com', 0, '5432'),
(4593454, 8912, 'SHUBHAM', 'LT-3(ii)', 'TIPATURU,TURUVEKERE', '#91/2,TURUVEKERE VILLAGE,TUMUKUR', 'shubham@gmail.com', 100, '2198'),
(1853701666, 9876, 'SRUJAN', 'LT-3(ii)', 'MALLESHWARAM,C-2', '2ND CROSS,MALLESHWARAM,BENGALURU NORTH', 'srujan_arp@gmail.com', 50, '6789');

-- --------------------------------------------------------

--
-- Table structure for table `electricity_supplier`
--

CREATE TABLE `electricity_supplier` (
  `U_ID` varchar(20) DEFAULT NULL,
  `BRANCH` varchar(25) DEFAULT NULL,
  `SUB_CODE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electricity_supplier`
--

INSERT INTO `electricity_supplier` (`U_ID`, `BRANCH`, `SUB_CODE`) VALUES
('B2365', 'BENGALURU RURAL', 'HOSAKOTE,AVALAHALLI'),
('A1234', 'BENGALURU SOUTH', 'JAYANAGAR,S-1'),
('A4569', 'BENGALURU NORTH', 'MALLESHWARAM,C-2'),
('C0003', 'TUMKUR', 'TIPATURU,TURUVEKERE'),
('B8946', 'BENGALURU EAST', 'WHITE FIELD,E-4');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `RR_NO` int(11) DEFAULT NULL,
  `FEEDBACK_TXT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`RR_NO`, `FEEDBACK_TXT`) VALUES
(1234, 'POWER-CUT AT EARLY MORNING. WHICH DELAYS ALL WORKS NEAR TURUVEKERE.'),
(1234, 'EARLY MORNING POWER-CUT ISSUES NOT YET SOLVED.'),
(9876, 'POWER LINES ARE DOWN DUE TO HEAVY RAINFALL AND GUSTY WIND.'),
(9876, 'good '),
(9876, 'nice nice noice');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `RR_NO` int(11) NOT NULL,
  `TF_CODE` varchar(20) NOT NULL,
  `PREV_READING` int(11) DEFAULT NULL,
  `PREST_READING` int(11) DEFAULT NULL,
  `CONS_UNITS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`RR_NO`, `TF_CODE`, `PREV_READING`, `PREST_READING`, `CONS_UNITS`) VALUES
(1010, 'LT-2(a)(i)', 2000, 2000, 0),
(1234, 'LT-2(a)(ii)', 6700, 6800, 100),
(2345, 'HT-4', 1000, 5000, 4000),
(8912, 'LT-3(ii)', 9635, NULL, NULL),
(9876, 'LT-3(ii)', 5000, 4800, -200);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `U_ID` varchar(20) NOT NULL,
  `PSWD` varchar(20) DEFAULT NULL,
  `A_NAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`U_ID`, `PSWD`, `A_NAME`) VALUES
('A1234', '1234', 'ANKUSH CHATURVEDI'),
('A4569', '4569', 'AMAN MUSSU'),
('B2365', '2365', 'BHIMAR RAO'),
('B8946', '8946', 'BISHMANNA'),
('C0003', '0003', 'CARIYAPPA K');

-- --------------------------------------------------------

--
-- Table structure for table `pay_cash`
--

CREATE TABLE `pay_cash` (
  `RR_NO` int(11) DEFAULT NULL,
  `RECEPIT_NO` int(11) NOT NULL,
  `BILL_NO` int(11) DEFAULT NULL,
  `PAY_MODE` char(4) DEFAULT NULL,
  `PAID_AMT` double DEFAULT NULL,
  `RECEPIT_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_cash`
--

INSERT INTO `pay_cash` (`RR_NO`, `RECEPIT_NO`, `BILL_NO`, `PAY_MODE`, `PAID_AMT`, `RECEPIT_DATE`) VALUES
(1010, 1, 1, 'CASH', 1088, '2023-02-01'),
(1234, 2, 3, 'CASH', 562.5, '2023-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `pay_online`
--

CREATE TABLE `pay_online` (
  `RR_NO` int(11) DEFAULT NULL,
  `BILL_NO` int(11) DEFAULT NULL,
  `PREST_DATE` date DEFAULT NULL,
  `PMT_MODE` varchar(6) DEFAULT NULL,
  `TRANSACTION_ID` int(13) NOT NULL,
  `STATUS` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_online`
--

INSERT INTO `pay_online` (`RR_NO`, `BILL_NO`, `PREST_DATE`, `PMT_MODE`, `TRANSACTION_ID`, `STATUS`) VALUES
(1010, 1, '2023-01-18', 'UPI', 1, 'SUCCESS'),
(1010, 2, '2023-03-28', 'UPI', 2, 'SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE `tariff` (
  `TF_CODE` varchar(20) NOT NULL,
  `FIXED_CHARGES` double DEFAULT NULL,
  `S_LOAD` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`TF_CODE`, `FIXED_CHARGES`, `S_LOAD`) VALUES
('HT-2(a)(ii)', 250, '1.00KW/0.50'),
('HT-4', 155, '0.25KW+0HP'),
('LT-2(a)(i)', 100, '1.00KW/0.50'),
('LT-2(a)(ii)', 100, '2.00KW/0.50'),
('LT-2(b)(i)', 155, '0.25KW+0HP'),
('LT-3(ii)', 200, '1.954KW+0HP');

-- --------------------------------------------------------

--
-- Table structure for table `total_amt`
--

CREATE TABLE `total_amt` (
  `RR_NO` int(11) NOT NULL,
  `BILL_DATE` date DEFAULT NULL,
  `BILL_NO` int(11) NOT NULL,
  `BILL_AMT` double DEFAULT NULL,
  `PENALTY` double DEFAULT NULL,
  `NET_AMT` double DEFAULT NULL,
  `DUE_DATE` date DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_amt`
--

INSERT INTO `total_amt` (`RR_NO`, `BILL_DATE`, `BILL_NO`, `BILL_AMT`, `PENALTY`, `NET_AMT`, `DUE_DATE`, `STATUS`) VALUES
(1010, '2023-01-18', 1, 1318, 0, 1088, '2023-02-03', 'PAID'),
(1010, '2023-02-01', 2, 3763, 0, 3533, '2023-02-17', 'PAID'),
(1010, '2023-02-01', 5, -720, 0, -950, '2023-02-17', 'UNPAID'),
(1010, '2023-03-28', 6, 1318, 0, 1088, '2023-04-13', 'UNPAID'),
(1010, '2023-03-28', 7, 100, 0, -130, '2023-04-13', 'UNPAID'),
(1234, '2023-02-01', 3, 562.5, 0, 562.5, '2023-02-17', 'PAID'),
(9876, '2023-02-01', 4, -1370, 0, -1420, '2023-02-17', 'UNPAID');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`RR_NO`),
  ADD KEY `FK_SB1` (`SUB_CODE`),
  ADD KEY `FK_TF1` (`TF_CODE`);

--
-- Indexes for table `electricity_supplier`
--
ALTER TABLE `electricity_supplier`
  ADD PRIMARY KEY (`SUB_CODE`),
  ADD KEY `FK_UI1` (`U_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `FK_RR1` (`RR_NO`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`RR_NO`,`TF_CODE`),
  ADD KEY `FK_TF2` (`TF_CODE`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`U_ID`);

--
-- Indexes for table `pay_cash`
--
ALTER TABLE `pay_cash`
  ADD PRIMARY KEY (`RECEPIT_NO`),
  ADD KEY `FK_B1` (`RR_NO`,`BILL_NO`);

--
-- Indexes for table `pay_online`
--
ALTER TABLE `pay_online`
  ADD PRIMARY KEY (`TRANSACTION_ID`),
  ADD KEY `FK_B2` (`RR_NO`,`BILL_NO`);

--
-- Indexes for table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`TF_CODE`);

--
-- Indexes for table `total_amt`
--
ALTER TABLE `total_amt`
  ADD PRIMARY KEY (`RR_NO`,`BILL_NO`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumer`
--
ALTER TABLE `consumer`
  ADD CONSTRAINT `FK_SB1` FOREIGN KEY (`SUB_CODE`) REFERENCES `electricity_supplier` (`SUB_CODE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TF1` FOREIGN KEY (`TF_CODE`) REFERENCES `tariff` (`TF_CODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electricity_supplier`
--
ALTER TABLE `electricity_supplier`
  ADD CONSTRAINT `FK_UI1` FOREIGN KEY (`U_ID`) REFERENCES `login` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_RR1` FOREIGN KEY (`RR_NO`) REFERENCES `consumer` (`RR_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_RR2` FOREIGN KEY (`RR_NO`) REFERENCES `consumer` (`RR_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TF2` FOREIGN KEY (`TF_CODE`) REFERENCES `tariff` (`TF_CODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pay_cash`
--
ALTER TABLE `pay_cash`
  ADD CONSTRAINT `FK_B1` FOREIGN KEY (`RR_NO`,`BILL_NO`) REFERENCES `total_amt` (`RR_NO`, `BILL_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RR4` FOREIGN KEY (`RR_NO`) REFERENCES `consumer` (`RR_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pay_online`
--
ALTER TABLE `pay_online`
  ADD CONSTRAINT `FK_B2` FOREIGN KEY (`RR_NO`,`BILL_NO`) REFERENCES `total_amt` (`RR_NO`, `BILL_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RR5` FOREIGN KEY (`RR_NO`) REFERENCES `consumer` (`RR_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `total_amt`
--
ALTER TABLE `total_amt`
  ADD CONSTRAINT `FK_RR3` FOREIGN KEY (`RR_NO`) REFERENCES `consumer` (`RR_NO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
