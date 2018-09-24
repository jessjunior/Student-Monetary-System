-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 10:27 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Acc_No` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Balance` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `Pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Acc_No`, `Name`, `Type`, `Balance`, `time`, `Pin`) VALUES
(100000, 'Qwerty Keypad', 'Business', 250000, '26/4/2018    16:19:49', '2345'),
(110001, 'Kevin Mwenda', 'Business', 10000000, '12/12/2017	12:23:45', '5941'),
(110002, 'Esther Njoroge', 'Personal', 2400000, '12/01/2018	10:13:24', '1234'),
(110003, 'Lorna Kamau', 'Business', 434000, '12/01/2018	11:20:00', '0000'),
(110004, 'Mathenge John', 'Business', 2345678, '10/02/2018	09:20:00', '2367'),
(110005, 'Burugu Eric', 'Other', 2200000, '12/02/2018   08:23:32', '1234'),
(110006, 'Eric Njoroge', 'Other', 200000, '26/4/2018    13:48:11', '5678'),
(110007, 'Eric Burugu', 'Business', 3000000, '26/4/2018    13:56:34', '5973'),
(110008, 'Biggie Man', 'Personal', 10200000, '29/4/2018    0:16:36', '8901');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `Log_ID` int(11) NOT NULL,
  `Acc_No` int(11) DEFAULT NULL,
  `Transactions` varchar(255) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`Log_ID`, `Acc_No`, `Transactions`, `Amount`, `Time`) VALUES
(1, 110001, 'Withdraw', 1000000, '2018-09-24 08:26:53'),
(2, 110001, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(3, 110001, 'Deposit', 500000, '2018-09-24 08:26:53'),
(4, 110001, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(5, 110002, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(6, 110002, 'Withdraw', 1000000, '2018-09-24 08:26:53'),
(7, 100000, 'Deposit', 200000, '2018-09-24 08:26:53'),
(8, 100000, 'Withdraw', 50000, '2018-09-24 08:26:53'),
(9, 110001, 'Deposit', 700000, '2018-09-24 08:26:53'),
(10, 110001, 'Withdraw', 800000, '2018-09-24 08:26:53'),
(11, 110002, 'Deposit', 100000, '2018-09-24 08:26:53'),
(12, 110002, 'Withdraw', 300000, '2018-09-24 08:26:53'),
(13, 110008, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(14, 110008, 'Deposit', 10000000, '2018-09-24 08:26:53'),
(15, 110008, 'Withdraw', 1000000, '2018-09-24 08:26:53'),
(16, 110001, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(17, 110001, 'Deposit', 3000000, '2018-09-24 08:26:53'),
(18, 110001, 'Transferred', 3000000, '2018-09-24 08:26:53'),
(19, 110002, 'Received', 3000000, '2018-09-24 08:26:53'),
(20, 110002, 'Transferred', 3000000, '2018-09-24 08:26:53'),
(21, 110001, 'Received', 3000000, '2018-09-24 08:26:53'),
(22, 110002, 'Withdraw', 123456, '2018-09-24 08:26:53'),
(23, 110001, 'Transferred', 200000, '2018-09-24 08:26:53'),
(24, 110005, 'Received', 200000, '2018-09-24 08:26:53'),
(25, 110001, 'Deposit', 200000, '2018-09-24 08:26:53'),
(26, 110001, 'Transferred', 200000, '2018-09-24 08:26:53'),
(27, 110008, 'Received', 200000, '2018-09-24 08:26:53'),
(28, 110001, 'Deposit', 200000, '2018-09-24 08:26:53'),
(29, 110001, 'Withdraw', 500000, '2018-09-24 08:26:53'),
(30, 110001, 'Deposit', 500000, '2018-09-24 08:26:53'),
(31, 110001, 'Deposit', 100000, '2018-09-24 08:26:53'),
(32, 110001, 'Deposit', 3000000, '2018-09-24 08:26:53'),
(33, 110001, 'Transferred', 3000000, '2018-09-24 08:26:53'),
(34, 110007, 'Received', 3000000, '2018-09-24 08:26:53'),
(35, 110001, 'Deposit', 2000000, '2018-09-24 08:26:53'),
(36, 110001, 'Transferred', 2000000, '2018-09-24 08:26:53'),
(37, 110004, 'Received', 2000000, '2018-09-24 08:26:53'),
(38, 110001, 'Deposit', 100000, '2018-09-24 08:26:53'),
(39, 110001, 'Transferred', 100000, '2018-09-24 08:26:53'),
(40, 100000, 'Received', 100000, '2018-09-24 08:26:53'),
(41, 110001, 'Transferred', 200000, '2018-09-24 08:26:53'),
(42, 110002, 'Received', 200000, '2018-09-24 08:26:53'),
(43, 110001, 'Deposit', 100000, '2018-09-24 08:26:53'),
(44, 110001, 'Transferred', 200000, '2018-09-24 08:26:53'),
(45, 110006, 'Received', 200000, '2018-09-24 08:26:53'),
(46, 110001, 'Transferred', 200000, '2018-09-24 08:26:53'),
(47, 110002, 'Received', 200000, '2018-09-24 08:26:53'),
(48, 110001, 'Deposit', 400000, '2018-09-24 08:26:53'),
(49, 110001, 'Deposit', 4000000, '2018-09-24 08:26:53'),
(50, 110001, 'Deposit', 300000, '2018-09-24 08:26:53'),
(51, 110001, 'Deposit', 2700000, '2018-09-24 08:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `Pass`) VALUES
(1001, 'Kevin Mwenda', 'biggie5941'),
(1002, 'Tiffany Tirop', 'rapunzel'),
(1003, 'Richie Spice', 'GrovingMyGirl'),
(1004, 'Esther Njoroge', 'essnj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Acc_No`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`Log_ID`),
  ADD KEY `FK_Acc_No` (`Acc_No`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_Acc_No` FOREIGN KEY (`Acc_No`) REFERENCES `accounts` (`Acc_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
