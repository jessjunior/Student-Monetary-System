-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 12:13 PM
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
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Acc_No`, `Name`, `Type`, `Balance`, `time`, `Pin`) VALUES
(100000, 'Qwerty Keypad', 'Business', 250000, '2017-09-30 11:00:00', '2345'),
(110001, 'Kevin Mwenda', 'Business', 10000000, '2017-09-30 11:00:00', '5941'),
(110002, 'Esther Njoroge', 'Personal', 2400000, '2017-09-30 11:00:00', '1234'),
(110003, 'Lorna Kamau', 'Business', 434000, '2017-09-30 11:00:00', '0000'),
(110004, 'Mathenge John', 'Business', 2345678, '2017-09-30 11:00:00', '2367'),
(110005, 'Burugu Eric', 'Other', 2200000, '2017-09-30 11:00:00', '1234'),
(110006, 'Eric Njoroge', 'Other', 200000, '2017-09-30 11:00:00', '5678'),
(110007, 'Eric Burugu', 'Business', 3000000, '2017-09-30 11:00:00', '5973'),
(110008, 'Biggie Man', 'Personal', 10200000, '2017-09-30 11:00:00', '8901');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `Log_ID` int(11) NOT NULL,
  `Acc_No` int(11) DEFAULT NULL,
  `To/From` int(11) NOT NULL,
  `Transactions` varchar(255) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`Log_ID`, `Acc_No`, `To/From`, `Transactions`, `Amount`, `Time`) VALUES
(0, 110001, 110001, 'Deposit', 2700000, '2018-09-24 08:26:53'),
(1, 110001, 110001, 'Withdraw', 1000000, '2018-09-24 08:26:53'),
(2, 110001, 110001, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(3, 110001, 110001, 'Deposit', 500000, '2018-09-24 08:26:53'),
(4, 110001, 110001, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(5, 110002, 110002, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(6, 110002, 110002, 'Withdraw', 1000000, '2018-09-24 08:26:53'),
(7, 100000, 100000, 'Deposit', 200000, '2018-09-24 08:26:53'),
(8, 100000, 100000, 'Withdraw', 50000, '2018-09-24 08:26:53'),
(9, 110001, 110001, 'Deposit', 700000, '2018-09-24 08:26:53'),
(10, 110001, 110001, 'Withdraw', 800000, '2018-09-24 08:26:53'),
(11, 110002, 110002, 'Deposit', 100000, '2018-09-24 08:26:53'),
(12, 110002, 110002, 'Withdraw', 300000, '2018-09-24 08:26:53'),
(13, 110008, 110008, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(14, 110008, 110008, 'Deposit', 10000000, '2018-09-24 08:26:53'),
(15, 110008, 110008, 'Withdraw', 1000000, '2018-09-24 08:26:53'),
(16, 110001, 110001, 'Deposit', 1000000, '2018-09-24 08:26:53'),
(17, 110001, 110001, 'Deposit', 3000000, '2018-09-24 08:26:53'),
(18, 110001, 110002, 'Transferred', 3000000, '2018-09-24 08:26:53'),
(19, 110002, 110001, 'Transferred', 3000000, '2018-09-24 08:26:53'),
(20, 110002, 110002, 'Withdraw', 123456, '2018-09-24 08:26:53'),
(21, 110001, 110005, 'Transferred', 200000, '2018-09-24 08:26:53'),
(22, 110001, 110001, 'Deposit', 200000, '2018-09-24 08:26:53'),
(23, 110001, 110008, 'Transferred', 200000, '2018-09-24 08:26:53'),
(24, 110001, 110001, 'Deposit', 200000, '2018-09-24 08:26:53'),
(25, 110001, 110001, 'Withdraw', 500000, '2018-09-24 08:26:53'),
(26, 110001, 110001, 'Deposit', 500000, '2018-09-24 08:26:53'),
(27, 110001, 110001, 'Deposit', 100000, '2018-09-24 08:26:53'),
(28, 110001, 110001, 'Deposit', 3000000, '2018-09-24 08:26:53'),
(29, 110001, 110007, 'Transferred', 3000000, '2018-09-24 08:26:53'),
(30, 110001, 110001, 'Deposit', 2000000, '2018-09-24 08:26:53'),
(31, 110001, 110004, 'Transferred', 2000000, '2018-09-24 08:26:53'),
(32, 110001, 110001, 'Deposit', 100000, '2018-09-24 08:26:53'),
(33, 110001, 100000, 'Transferred', 100000, '2018-09-24 08:26:53'),
(34, 110001, 110002, 'Transferred', 200000, '2018-09-24 08:26:53'),
(35, 110001, 110001, 'Deposit', 100000, '2018-09-24 08:26:53'),
(36, 110001, 110006, 'Transferred', 200000, '2018-09-24 08:26:53'),
(37, 110001, 110002, 'Transferred', 200000, '2018-09-24 08:26:53'),
(38, 110001, 110001, 'Deposit', 400000, '2018-09-24 08:26:53'),
(39, 110001, 110001, 'Deposit', 4000000, '2018-09-24 08:26:53'),
(40, 110001, 110001, 'Deposit', 300000, '2018-09-24 08:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `Pass`, `deleted`) VALUES
(1001, 'Kevin Mwenda', 'biggie5941', 0),
(1002, 'Tiffany Tirop', 'rapunzel', 0),
(1003, 'Richie Spice', 'GrovingMyGirl', 0),
(1004, 'Esther Njoroge', 'essnj', 0);

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
  ADD KEY `FK_Acc_No` (`Acc_No`),
  ADD KEY `FK_To_From` (`To/From`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_Acc_No` FOREIGN KEY (`Acc_No`) REFERENCES `accounts` (`Acc_No`),
  ADD CONSTRAINT `FK_To_From` FOREIGN KEY (`To/From`) REFERENCES `accounts` (`Acc_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
