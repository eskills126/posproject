-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 05:13 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aansoftdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `acctypetbl`
--

CREATE TABLE `acctypetbl` (
  `AccId` int(50) NOT NULL,
  `AccTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acctypetbl`
--

INSERT INTO `acctypetbl` (`AccId`, `AccTitle`) VALUES
(1, 'Asset'),
(2, 'Liability'),
(3, 'Income'),
(4, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `assettbl`
--

CREATE TABLE `assettbl` (
  `AssId` int(50) NOT NULL,
  `AssTitle` varchar(250) NOT NULL,
  `AssAddress` varchar(250) NOT NULL,
  `AssContact` varchar(250) NOT NULL,
  `AssOpenBal` int(50) NOT NULL,
  `AssAccType` int(50) NOT NULL,
  `AssType` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assettbl`
--

INSERT INTO `assettbl` (`AssId`, `AssTitle`, `AssAddress`, `AssContact`, `AssOpenBal`, `AssAccType`, `AssType`) VALUES
(1, 'Mobile', 'Office', '03127867567', 9000, 0, 1),
(2, 'AC', 'No Ac', '8799', 800, 0, 1),
(3, 'Rate', 'no', '8999', 9000, 0, 1),
(4, 'HBL', 'Grain Market', '0923457', 450000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cashpaidtbl`
--

CREATE TABLE `cashpaidtbl` (
  `cashid` int(11) NOT NULL,
  `cashdate` date NOT NULL,
  `payercode` int(50) NOT NULL,
  `payername` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `amountpaid` int(50) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashinhand` int(50) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashpaidtbl`
--

INSERT INTO `cashpaidtbl` (`cashid`, `cashdate`, `payercode`, `payername`, `remarks`, `amountpaid`, `uname`, `timestamp`, `cashinhand`) VALUES
(1, '2018-09-11', 5, 'Naeem', 'No Remarks', 1800, 'name', '2018-09-11 17:11:59', 5),
(2, '2018-09-11', 2, 'Amjad hanif', 'yes i have', 600, 'amj', '2018-09-11 17:11:59', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cashreceivetbl`
--

CREATE TABLE `cashreceivetbl` (
  `cashrid` int(50) NOT NULL,
  `cashrdate` date NOT NULL,
  `receivercode` int(50) NOT NULL,
  `receivername` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `receiveamount` int(50) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashinhandr` int(50) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashreceivetbl`
--

INSERT INTO `cashreceivetbl` (`cashrid`, `cashrdate`, `receivercode`, `receivername`, `remarks`, `receiveamount`, `uname`, `timestamp`, `cashinhandr`) VALUES
(1, '2018-09-11', 3, 'Asad', 'ok', 1200, 'abc', '2018-09-11 17:13:52', 5),
(2, '2018-09-11', 1, 'Rehman', 'wao', 800, 'asd', '2018-09-11 17:13:52', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE `customertbl` (
  `CusId` int(50) NOT NULL,
  `CusName` varchar(250) NOT NULL,
  `CusAddress` varchar(250) NOT NULL,
  `CusContact` varchar(250) NOT NULL,
  `CusCreditLimit` int(50) DEFAULT NULL,
  `CusOpenBal` int(50) NOT NULL,
  `CusAreaName` varchar(250) NOT NULL,
  `CusAccType` int(50) NOT NULL DEFAULT '1',
  `CusAssetType` int(50) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`CusId`, `CusName`, `CusAddress`, `CusContact`, `CusCreditLimit`, `CusOpenBal`, `CusAreaName`, `CusAccType`, `CusAssetType`) VALUES
(31, 'KOt', 'sdflkj', 'kj', 8, 7, 'Vehari123', 1, 2),
(36, 'Amjad Hanif', 'Grid Station', '03115575561', 900, 7800, '220 KV Grid Station', 1, 2),
(37, 'Kamran', 'Kot Addu', '067452300', 0, 12000, 'Islamabad', 1, 2),
(38, 'Ahmed', 'Raza', '03214354678', 700, 45000, 'Peshawar', 1, 2),
(39, 'Kaleem', 'Machiwal', '06189007656', 3400, 23000, 'Karachi', 1, 2),
(40, 'Parveen Shakar', 'Muslim Town', '03001234543', 0, 78000, 'Multan123', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exptbl`
--

CREATE TABLE `exptbl` (
  `ExpId` int(50) NOT NULL,
  `ExpTitle` varchar(250) NOT NULL,
  `ExpOpenBal` int(50) NOT NULL,
  `ExpAccType` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exptbl`
--

INSERT INTO `exptbl` (`ExpId`, `ExpTitle`, `ExpOpenBal`, `ExpAccType`) VALUES
(3, 'Free Exp', 8900, 1),
(4, 'Hot and Coal', 500, 1),
(5, 'Laptop', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gttbl`
--

CREATE TABLE `gttbl` (
  `gtid` int(50) NOT NULL,
  `gtdate` date NOT NULL,
  `drcode` int(50) NOT NULL,
  `drname` varchar(250) NOT NULL,
  `drremarks` varchar(250) NOT NULL,
  `crcode` int(50) NOT NULL,
  `crname` varchar(250) NOT NULL,
  `crremarks` varchar(250) NOT NULL,
  `cramount` int(50) NOT NULL,
  `dramount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gttbl`
--

INSERT INTO `gttbl` (`gtid`, `gtdate`, `drcode`, `drname`, `drremarks`, `crcode`, `crname`, `crremarks`, `cramount`, `dramount`) VALUES
(1, '2018-09-11', 1, 'computer', 'no remarks', 1, 'wao', 'wao', 600, 400),
(2, '2018-09-11', 4, 'ghs', 'sdf', 1, 'safd', 'asdf', 400, 800);

-- --------------------------------------------------------

--
-- Table structure for table `liabtbl`
--

CREATE TABLE `liabtbl` (
  `LiabId` int(50) NOT NULL,
  `LiabTitle` varchar(250) NOT NULL,
  `LiabAddress` varchar(250) NOT NULL,
  `LiabContact` varchar(250) NOT NULL,
  `LiabOpenBal` int(50) NOT NULL,
  `LiabAccType` int(50) NOT NULL DEFAULT '2',
  `LiabType` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liabtbl`
--

INSERT INTO `liabtbl` (`LiabId`, `LiabTitle`, `LiabAddress`, `LiabContact`, `LiabOpenBal`, `LiabAccType`, `LiabType`) VALUES
(1, 'Bag', 'No', '87', 8900, 2, 1),
(2, 'Pencil', 'Vehari', '700', 344444, 2, 1),
(3, 'Jug', 'Multan', '21345', 900, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetailtbl`
--

CREATE TABLE `purchaseorderdetailtbl` (
  `PurAutoId` int(11) NOT NULL,
  `PurOrderId` int(50) NOT NULL,
  `PurDate` date NOT NULL,
  `PurSupCode` int(50) NOT NULL,
  `PurSupCodeName` varchar(250) NOT NULL,
  `PurSupBal` int(50) NOT NULL,
  `PurItemCode` int(50) NOT NULL,
  `PurItemName` varchar(250) NOT NULL,
  `PurWHCode` int(50) NOT NULL,
  `PurWHName` varchar(250) NOT NULL,
  `PurQty` int(50) NOT NULL,
  `PurStockQty` int(50) NOT NULL,
  `PurGrossRate` int(50) NOT NULL,
  `PurGrossAmount` int(50) NOT NULL,
  `PurDiscInPercent` int(50) NOT NULL,
  `PurDiscValueInRate` int(50) NOT NULL,
  `PurDiscRate` int(50) NOT NULL,
  `PurRate` int(50) NOT NULL,
  `PurAmount` int(50) NOT NULL,
  `DisplayID` int(50) NOT NULL,
  `PurRemarks` varchar(250) NOT NULL,
  `PurTransType` varchar(250) NOT NULL DEFAULT 'PT',
  `PurSaleQty` int(50) NOT NULL DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorderdetailtbl`
--

INSERT INTO `purchaseorderdetailtbl` (`PurAutoId`, `PurOrderId`, `PurDate`, `PurSupCode`, `PurSupCodeName`, `PurSupBal`, `PurItemCode`, `PurItemName`, `PurWHCode`, `PurWHName`, `PurQty`, `PurStockQty`, `PurGrossRate`, `PurGrossAmount`, `PurDiscInPercent`, `PurDiscValueInRate`, `PurDiscRate`, `PurRate`, `PurAmount`, `DisplayID`, `PurRemarks`, `PurTransType`, `PurSaleQty`) VALUES
(1, 1, '2018-09-12', 1, 'Naeem AHmed', 0, 1, 'Laptop', 1, 'Warehouse', 7, 89, 78, 67, 89, 7, 78, 0, 98, 2, 'No Remarks', 'PT', 90),
(2, 2, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(3, 3, '0000-00-00', 5, 'Naeem Ahmed', 11898, 14, 'samsung', 1, 'Warehouse 2', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, '1', 'PT', 1),
(4, 3, '0000-00-00', 4, 'Amjad Hanif', 124106, 17, 'Chair', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(5, 4, '0000-00-00', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 1, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(6, 5, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 8, 8, 8, 8, 8, 8, 8, 0, 8, 8, '8', 'PT', 8),
(7, 6, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(8, 7, '0000-00-00', 4, 'Amjad Hanif', 124106, 17, 'Chair', 3, 'Shop Two', 1, 4, 4, 4, 4, 4, 4, 0, 4, 4, '4', 'PT', 4),
(9, 8, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(10, 9, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 3, 'Shop Two', 5, 5, 5, 5, 5, 5, 5, 0, 5, 5, '45000', 'PT', 5),
(11, 10, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(12, 11, '0000-00-00', 2, 'Dummy 2', 13898, 17, 'Chair', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(13, 12, '0000-00-00', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 4, 4, 4, 4, 4, 4, 4, 0, 4, 4, '4', 'PT', 4),
(14, 13, '0000-00-00', 4, 'Amjad Hanif', 124106, 21, 'Botle', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(15, 14, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '3', 'PT', 12),
(16, 15, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '2', 'PT', 12),
(17, 17, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Abc Don', 'PT', 12),
(18, 17, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Abc', 'PT', 12),
(19, 18, '0000-00-00', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'M Naeem Ahmed', 'PT', 12),
(20, 19, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '545 Naeem', 'PT', 12),
(21, 19, '0000-00-00', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '3', 'PT', 12),
(22, 20, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '66', 'PT', 12),
(23, 20, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 3, 'Shop Two', 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, '6', 'PT', 12),
(24, 21, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 4, 4, 4, 4, 4, 4, 4, 44, 4, 4, '4', 'PT', 12),
(25, 22, '0000-00-00', 2, 'Dummy 2', 13898, 16, 'Nadeem', 1, 'Warehouse 2', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, '44', 'PT', 12),
(26, 23, '0000-00-00', 5, 'Naeem Ahmed', 11898, 14, 'samsung', 1, 'Warehouse 2', 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, '7', 'PT', 12),
(27, 24, '0000-00-00', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, '9', 'PT', 12),
(28, 25, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, '6', 'PT', 12);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseordertbl`
--

CREATE TABLE `purchaseordertbl` (
  `PurOrderId` int(50) NOT NULL,
  `PurOrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseordertbl`
--

INSERT INTO `purchaseordertbl` (`PurOrderId`, `PurOrderDate`) VALUES
(1, '2018-09-09'),
(2, '2018-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturntbl`
--

CREATE TABLE `purchasereturntbl` (
  `PrAutoId` int(11) NOT NULL,
  `PrOrderId` int(50) NOT NULL,
  `PrDate` varchar(250) NOT NULL,
  `PrSupCode` int(50) NOT NULL,
  `PrSupCodeName` varchar(250) NOT NULL,
  `PrSupBal` int(50) NOT NULL,
  `PrItemCode` int(50) NOT NULL,
  `PrItemName` varchar(250) NOT NULL,
  `PrWHCode` int(50) NOT NULL,
  `PrWHName` varchar(250) NOT NULL,
  `PrQty` int(50) NOT NULL,
  `PrStockQty` int(50) NOT NULL,
  `PrRate` int(50) NOT NULL,
  `PrTempRate` int(50) NOT NULL,
  `PrAmount` int(50) NOT NULL,
  `PrRemarks` varchar(250) NOT NULL,
  `PrTransType` varchar(250) NOT NULL DEFAULT 'PR'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasereturntbl`
--

INSERT INTO `purchasereturntbl` (`PrAutoId`, `PrOrderId`, `PrDate`, `PrSupCode`, `PrSupCodeName`, `PrSupBal`, `PrItemCode`, `PrItemName`, `PrWHCode`, `PrWHName`, `PrQty`, `PrStockQty`, `PrRate`, `PrTempRate`, `PrAmount`, `PrRemarks`, `PrTransType`) VALUES
(5, 4, '16/09/2018', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 1, 2, 0, 2, 2, '2', 'PT'),
(6, 5, '16/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 8, 8, 0, 8, 8, '8', 'PT'),
(7, 6, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 0, 3, 3, '3', 'PT'),
(8, 7, '16/09/2018', 4, 'Amjad Hanif', 124106, 17, 'Chair', 3, 'Shop Two', 1, 4, 0, 4, 4, '4', 'PT'),
(9, 8, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 0, 2, 2, '2', 'PT'),
(10, 9, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 3, 'Shop Two', 5, 5, 0, 5, 5, '45000', 'PT'),
(11, 10, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 2, 2, 0, 2, 2, '2', 'PT'),
(12, 11, '17/09/2018', 2, 'Dummy 2', 13898, 17, 'Chair', 1, 'Warehouse 2', 3, 3, 0, 3, 3, '3', 'PT'),
(13, 12, '17/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 4, 4, 0, 4, 4, '4', 'PT'),
(14, 13, '17/09/2018', 4, 'Amjad Hanif', 124106, 21, 'Botle', 1, 'Warehouse 2', 3, 3, 0, 3, 3, '3', 'PT'),
(15, 14, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 3, 3, 3, 3, 3, '3', 'PT'),
(16, 15, '17/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 2, 2, 2, '2', 'PT'),
(17, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 'Abc Don', 'PT'),
(18, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 'Abc', 'PT'),
(19, 18, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 'M Naeem Ahmed', 'PT'),
(20, 19, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, '545 Naeem', 'PT'),
(21, 19, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 3, 3, 3, 3, 3, '3', 'PT'),
(22, 20, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, '66', 'PT'),
(23, 20, '18/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 3, 'Shop Two', 5, 5, 6, 6, 6, '6', 'PT'),
(24, 21, '18/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 4, 4, 44, 4, 4, '4', 'PT'),
(25, 22, '19/09/2018', 2, 'Dummy 2', 13898, 16, 'Nadeem', 1, 'Warehouse 2', 4, 4, 4, 4, 4, '44', 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `salareatbl`
--

CREATE TABLE `salareatbl` (
  `SalAreaId` int(50) NOT NULL,
  `SalAreaTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salareatbl`
--

INSERT INTO `salareatbl` (`SalAreaId`, `SalAreaTitle`) VALUES
(1, 'Vehari123'),
(2, 'Multan123'),
(3, '220 KV Grid Station'),
(4, 'Islamabad'),
(5, 'Karachi'),
(6, 'Peshawar'),
(15, 'Red'),
(16, 'Blue'),
(17, 'Green'),
(18, 'Yellow and Green'),
(19, 'Sky Blue'),
(20, 'Lala Moosa');

-- --------------------------------------------------------

--
-- Table structure for table `salesitemgrouptbl`
--

CREATE TABLE `salesitemgrouptbl` (
  `ProGroupId` int(50) NOT NULL,
  `ProGroupTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesitemgrouptbl`
--

INSERT INTO `salesitemgrouptbl` (`ProGroupId`, `ProGroupTitle`) VALUES
(2, 'Group Book'),
(3, 'Group Three');

-- --------------------------------------------------------

--
-- Table structure for table `salesitemtbl`
--

CREATE TABLE `salesitemtbl` (
  `ProId` int(50) NOT NULL,
  `ProName` varchar(250) NOT NULL,
  `ProUomName` varchar(250) NOT NULL,
  `ProOpenQtyUnit` int(50) NOT NULL,
  `ProOpenRate` int(50) NOT NULL,
  `ProOpenBal` int(50) NOT NULL,
  `ProSalesRate` int(50) NOT NULL,
  `ProItemGroupName` varchar(250) NOT NULL,
  `ProductTypeName` int(50) DEFAULT NULL,
  `ProAccType` int(50) NOT NULL DEFAULT '3',
  `ProType` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesitemtbl`
--

INSERT INTO `salesitemtbl` (`ProId`, `ProName`, `ProUomName`, `ProOpenQtyUnit`, `ProOpenRate`, `ProOpenBal`, `ProSalesRate`, `ProItemGroupName`, `ProductTypeName`, `ProAccType`, `ProType`) VALUES
(14, 'samsung', '1', 5, 5, 5, 2, '2', NULL, 3, 1),
(16, 'Nadeem', 'Meters', 6, 12, 5, 200, 'Group B', NULL, 3, 1),
(17, 'Chair', 'Kg', 5, 2, 1, 5, 'GroupA', NULL, 3, 1),
(18, 'Khan', 'Meters', 6, 12, 12, 23, 'Group B', NULL, 3, 1),
(20, 'sf', 'Kg', 56, 5, 5, 5, 'GroupA', NULL, 3, 1),
(21, 'Botle', 'Liters', 5, 1200, 900, 2500, 'GroupA', NULL, 3, 1),
(22, 'Keyboard', 'Kg', 5, 100, 100, 100, 'GroupA', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesorderdetailtbl`
--

CREATE TABLE `salesorderdetailtbl` (
  `SaleAutoId` int(11) NOT NULL,
  `SaleOrderId` int(50) NOT NULL,
  `SaleDate` varchar(250) NOT NULL,
  `SaleCusCode` int(50) NOT NULL,
  `SaleCusCodeName` varchar(250) NOT NULL,
  `SaleCusBal` int(50) NOT NULL,
  `SaleItemCode` int(50) NOT NULL,
  `SaleItemName` varchar(250) NOT NULL,
  `SaleWHCode` int(50) NOT NULL,
  `SaleWHName` varchar(250) NOT NULL,
  `SaleQty` int(50) NOT NULL,
  `SaleStockQty` int(50) NOT NULL,
  `SalePreviousRate` int(50) NOT NULL,
  `SaleGrossRate` int(50) NOT NULL,
  `SaleGrossAmount` int(50) NOT NULL,
  `DisplayID` int(50) NOT NULL,
  `SaleRemarks` varchar(250) NOT NULL,
  `SaleTQty` int(50) NOT NULL,
  `SaleBillAmount` int(50) NOT NULL,
  `SaleDiscPercentage` int(50) NOT NULL,
  `SaleDiscountValue` int(50) NOT NULL,
  `SaleFreight` int(50) NOT NULL,
  `SaleNetBill` int(50) NOT NULL,
  `SaleTransType` varchar(250) NOT NULL DEFAULT 'ST'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorderdetailtbl`
--

INSERT INTO `salesorderdetailtbl` (`SaleAutoId`, `SaleOrderId`, `SaleDate`, `SaleCusCode`, `SaleCusCodeName`, `SaleCusBal`, `SaleItemCode`, `SaleItemName`, `SaleWHCode`, `SaleWHName`, `SaleQty`, `SaleStockQty`, `SalePreviousRate`, `SaleGrossRate`, `SaleGrossAmount`, `DisplayID`, `SaleRemarks`, `SaleTQty`, `SaleBillAmount`, `SaleDiscPercentage`, `SaleDiscountValue`, `SaleFreight`, `SaleNetBill`, `SaleTransType`) VALUES
(1, 1, '2018-09-12', 1, 'Naeem AHmed', 0, 1, 'Laptop', 1, 'Warehouse', 7, 89, 0, 78, 67, 2, 'No Remarks', 89, 7, 78, 98, 0, 0, 'PT'),
(2, 2, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(3, 3, '0000-00-00', 5, 'Naeem Ahmed', 11898, 14, 'samsung', 1, 'Warehouse 2', 1, 1, 0, 1, 1, 1, '1', 1, 1, 1, 1, 0, 0, 'PT'),
(4, 3, '0000-00-00', 4, 'Amjad Hanif', 124106, 17, 'Chair', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(5, 4, '16/09/2018', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 1, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(6, 5, '16/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 8, 8, 0, 8, 8, 8, '8', 8, 8, 8, 8, 0, 0, 'PT'),
(7, 6, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(8, 7, '16/09/2018', 4, 'Amjad Hanif', 124106, 17, 'Chair', 3, 'Shop Two', 1, 4, 0, 4, 4, 4, '4', 4, 4, 4, 4, 0, 0, 'PT'),
(9, 8, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(10, 9, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 3, 'Shop Two', 5, 5, 0, 5, 5, 5, '45000', 5, 5, 5, 5, 0, 0, 'PT'),
(11, 10, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(12, 11, '17/09/2018', 2, 'Dummy 2', 13898, 17, 'Chair', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(13, 12, '17/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 4, 4, 0, 4, 4, 4, '4', 4, 4, 4, 4, 0, 0, 'PT'),
(14, 13, '17/09/2018', 4, 'Amjad Hanif', 124106, 21, 'Botle', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(15, 14, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 3, 0, 'PT'),
(16, 15, '17/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 2, 0, 'PT'),
(17, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 0, 4, 4, 4, 'Abc Don', 4, 4, 4, 4, 4, 0, 'PT'),
(18, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 0, 4, 4, 4, 'Abc', 4, 4, 4, 4, 4, 0, 'PT'),
(19, 18, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 1, 'Warehouse 2', 5, 5, 0, 5, 5, 5, 'M Naeem Ahmed', 5, 5, 5, 5, 5, 0, 'PT'),
(20, 19, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 0, 5, 5, 5, '545 Naeem', 5, 5, 5, 5, 5, 0, 'PT'),
(21, 19, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 3, 0, 'PT'),
(22, 20, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 0, 5, 5, 5, '66', 5, 5, 5, 5, 5, 0, 'PT'),
(23, 20, '18/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 3, 'Shop Two', 5, 5, 0, 5, 5, 6, '6', 5, 5, 5, 6, 6, 0, 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `salesproducttypetbl`
--

CREATE TABLE `salesproducttypetbl` (
  `ProductTypeId` int(50) NOT NULL,
  `ProductTypeName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesproducttypetbl`
--

INSERT INTO `salesproducttypetbl` (`ProductTypeId`, `ProductTypeName`) VALUES
(2, 'Old Item Name'),
(3, 'Desktop Version');

-- --------------------------------------------------------

--
-- Table structure for table `suptbl`
--

CREATE TABLE `suptbl` (
  `SupId` int(50) NOT NULL,
  `SupName` varchar(250) NOT NULL,
  `SupAddress` varchar(250) NOT NULL,
  `SupContact` varchar(250) NOT NULL,
  `SupOpenBal` int(50) NOT NULL,
  `SupAccType` int(50) NOT NULL DEFAULT '2',
  `SupLibType` int(50) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suptbl`
--

INSERT INTO `suptbl` (`SupId`, `SupName`, `SupAddress`, `SupContact`, `SupOpenBal`, `SupAccType`, `SupLibType`) VALUES
(2, 'Dummy 2', 'Dummy Address 2', '847', 9800, 2, 2),
(4, 'Amjad Hanif', 'Grid Station', '03115575561', 120008, 2, 2),
(5, 'Naeem Ahmed', 'Karachi', '95000000000', 7800, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_no` int(50) NOT NULL,
  `order_date` varchar(250) NOT NULL,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_remarks` varchar(500) NOT NULL,
  `order_total_before_discount_freight` decimal(10,2) NOT NULL,
  `order_total_discount_percentage` decimal(10,2) NOT NULL,
  `order_total_discount_value` decimal(10,2) NOT NULL,
  `order_total_freight` decimal(10,2) NOT NULL,
  `order_total_after_discount_freight` decimal(10,2) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_no`, `order_date`, `order_receiver_name`, `order_receiver_remarks`, `order_total_before_discount_freight`, `order_total_discount_percentage`, `order_total_discount_value`, `order_total_freight`, `order_total_after_discount_freight`, `order_datetime`) VALUES
(6, 4, '29/09/2018', 'Amjad', '220KV Grid Station', '500.00', '5.00', '250.00', '250.00', '500.00', '2018-09-29 00:00:00'),
(11, 5, '05/10/2018', 'Naeem', 'no', '21.00', '0.00', '0.00', '0.00', '21.00', '2018-10-05 00:00:00'),
(12, 6, '06/10/2018', 'Jamal Ahmed', 'no', '72.00', '0.00', '0.00', '0.00', '72.00', '2018-10-06 00:00:00'),
(13, 7, '07/10/2018', 'Jutt', '', '64.00', '0.00', '0.00', '0.00', '64.00', '2018-10-07 00:00:00'),
(14, 8, '07/10/2018', 'Jut2', 'no', '106.00', '0.00', '0.00', '0.00', '106.00', '2018-10-07 00:00:00'),
(21, 10, '08/10/2018', 'Imran', 'No', '25.00', '0.00', '0.00', '0.00', '25.00', '2018-10-08 00:00:00'),
(23, 11, '08/10/2018', 'Imran khan', '', '41.00', '0.00', '0.00', '0.00', '41.00', '2018-10-08 00:00:00'),
(27, 15, '11/10/2018', 'Ghs 567', 'govt high school', '3550.00', '0.00', '20.00', '200.00', '3730.00', '2018-10-11 00:00:00'),
(28, 16, '11/10/2018', 'Asad Umar', 'Address', '18000.00', '8.00', '1440.00', '200.00', '16760.00', '2018-10-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_whname` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_squantity` decimal(10,2) NOT NULL,
  `order_item_prate` decimal(10,2) NOT NULL,
  `order_item_grate` decimal(10,2) NOT NULL,
  `order_item_gamount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`order_item_id`, `order_id`, `item_name`, `order_item_whname`, `order_item_quantity`, `order_item_squantity`, `order_item_prate`, `order_item_grate`, `order_item_gamount`) VALUES
(390, 6, 'Fan', 'Shop1', '5.00', '5.00', '5.00', '100.00', '500.00'),
(404, 10, 'Cup', 'Shop', '5.00', '5.00', '5.00', '5.00', '25.00'),
(405, 11, 'no', 'no', '3.00', '7.00', '7.00', '7.00', '21.00'),
(406, 12, 'i', 'i', '8.00', '9.00', '8.00', '9.00', '72.00'),
(407, 13, 'Cup', 'cup', '8.00', '8.00', '8.00', '8.00', '64.00'),
(433, 33, '5', '5', '5.00', '5.00', '5.00', '5.00', '25.00'),
(434, 33, 'no', 'no', '5.00', '5.00', '5.00', '55.00', '275.00'),
(435, 21, 'item', 'no', '5.00', '5.00', '5.00', '5.00', '25.00'),
(438, 23, 't', 't', '5.00', '5.00', '5.00', '5.00', '25.00'),
(439, 23, 'r', 'r', '4.00', '4.00', '4.00', '4.00', '16.00'),
(457, 14, 'mug', 'mug', '9.00', '9.00', '9.00', '9.00', '81.00'),
(458, 14, 'Cup', 'shop', '5.00', '5.00', '5.00', '5.00', '25.00'),
(461, 27, '2-Dell', 'No', '5.00', '10.00', '0.00', '300.00', '1500.00'),
(462, 27, '4-Asus', 'Shop 2', '50.00', '70.00', '0.00', '20.00', '1000.00'),
(463, 27, '3-IBM', 'No', '5.00', '25.00', '0.00', '50.00', '250.00'),
(464, 27, '1-HP', 'N0', '4.00', '5.00', '0.00', '200.00', '800.00'),
(479, 28, '2-Dell', 'Shop 2', '60.00', '10.00', '500.00', '300.00', '18000.00');

-- --------------------------------------------------------

--
-- Table structure for table `uomtbl`
--

CREATE TABLE `uomtbl` (
  `UomId` int(50) NOT NULL,
  `UomName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uomtbl`
--

INSERT INTO `uomtbl` (`UomId`, `UomName`) VALUES
(1, 'Kg'),
(2, 'Gb'),
(3, 'Meters'),
(4, 'Liters'),
(5, 'CM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `retype_pass` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_role` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`, `pass`, `retype_pass`, `email`, `user_role`) VALUES
(2, 'Admin', '1234', '', 'abc@gmail.com', 1),
(3, 'Naeem', '1234', '', 'naeem@gmail.com', 2),
(4, 'User', '1234', '1234', 'user@gmail.com', 2),
(5, 'kasdfh', '9', '9', '9', 2),
(6, 'hg', '999', '999', '2', 2),
(7, 'uom', '456', '456', '456', 2),
(9, 'teh', '5', '5', 'ghs', 2),
(10, 'gh', '4', '4', '4', 2),
(12, 'kjl', '4', '4', 'dfgh', 2),
(13, 'kalemm', '4', '4', 'sdf', 2),
(14, 'Naeem Ahmed', '789', '789', 'gmail@gmail.com', 2),
(15, 'Ball', '4', '4', 'sdf@gmail.com', 2),
(16, 'imran', '45', '45', 'asdf', 2),
(17, 'kal', '4', '4', 'sf', 2),
(18, 'alskdj', '8', '8', 'asfdj', 2),
(19, 'asdj', '3', '3', 'sfs@', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wharehousetbl`
--

CREATE TABLE `wharehousetbl` (
  `WarehouseId` int(50) NOT NULL,
  `WarehouseName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wharehousetbl`
--

INSERT INTO `wharehousetbl` (`WarehouseId`, `WarehouseName`) VALUES
(1, 'Warehouse 2'),
(3, 'Shop Two');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acctypetbl`
--
ALTER TABLE `acctypetbl`
  ADD PRIMARY KEY (`AccId`);

--
-- Indexes for table `assettbl`
--
ALTER TABLE `assettbl`
  ADD PRIMARY KEY (`AssId`),
  ADD KEY `AssAccType` (`AssAccType`);

--
-- Indexes for table `cashpaidtbl`
--
ALTER TABLE `cashpaidtbl`
  ADD PRIMARY KEY (`cashid`);

--
-- Indexes for table `cashreceivetbl`
--
ALTER TABLE `cashreceivetbl`
  ADD PRIMARY KEY (`cashrid`);

--
-- Indexes for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD PRIMARY KEY (`CusId`),
  ADD KEY `CusAccType` (`CusAccType`),
  ADD KEY `CusAreaName` (`CusAreaName`);

--
-- Indexes for table `exptbl`
--
ALTER TABLE `exptbl`
  ADD PRIMARY KEY (`ExpId`),
  ADD KEY `ExpAccType` (`ExpAccType`);

--
-- Indexes for table `gttbl`
--
ALTER TABLE `gttbl`
  ADD PRIMARY KEY (`gtid`);

--
-- Indexes for table `liabtbl`
--
ALTER TABLE `liabtbl`
  ADD PRIMARY KEY (`LiabId`),
  ADD KEY `LiabAccType` (`LiabAccType`);

--
-- Indexes for table `purchaseorderdetailtbl`
--
ALTER TABLE `purchaseorderdetailtbl`
  ADD PRIMARY KEY (`PurAutoId`),
  ADD KEY `PurOrderId` (`PurOrderId`),
  ADD KEY `PurSupCodeName` (`PurSupCode`),
  ADD KEY `PurItemName` (`PurItemCode`),
  ADD KEY `PurWHName` (`PurWHCode`);

--
-- Indexes for table `purchaseordertbl`
--
ALTER TABLE `purchaseordertbl`
  ADD PRIMARY KEY (`PurOrderId`);

--
-- Indexes for table `purchasereturntbl`
--
ALTER TABLE `purchasereturntbl`
  ADD PRIMARY KEY (`PrAutoId`),
  ADD KEY `PurOrderId` (`PrOrderId`),
  ADD KEY `PurSupCodeName` (`PrSupCode`),
  ADD KEY `PurItemName` (`PrItemCode`),
  ADD KEY `PurWHName` (`PrWHCode`);

--
-- Indexes for table `salareatbl`
--
ALTER TABLE `salareatbl`
  ADD PRIMARY KEY (`SalAreaId`);

--
-- Indexes for table `salesitemgrouptbl`
--
ALTER TABLE `salesitemgrouptbl`
  ADD PRIMARY KEY (`ProGroupId`);

--
-- Indexes for table `salesitemtbl`
--
ALTER TABLE `salesitemtbl`
  ADD PRIMARY KEY (`ProId`),
  ADD KEY `ProAccType` (`ProAccType`),
  ADD KEY `ProItemGroupName` (`ProItemGroupName`),
  ADD KEY `ProductTypeName` (`ProductTypeName`),
  ADD KEY `ProUomName` (`ProUomName`);

--
-- Indexes for table `salesorderdetailtbl`
--
ALTER TABLE `salesorderdetailtbl`
  ADD PRIMARY KEY (`SaleAutoId`),
  ADD KEY `PurOrderId` (`SaleOrderId`),
  ADD KEY `PurSupCodeName` (`SaleCusCode`),
  ADD KEY `PurItemName` (`SaleItemCode`),
  ADD KEY `PurWHName` (`SaleWHCode`);

--
-- Indexes for table `salesproducttypetbl`
--
ALTER TABLE `salesproducttypetbl`
  ADD PRIMARY KEY (`ProductTypeId`);

--
-- Indexes for table `suptbl`
--
ALTER TABLE `suptbl`
  ADD PRIMARY KEY (`SupId`),
  ADD KEY `SupAccType` (`SupAccType`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `uomtbl`
--
ALTER TABLE `uomtbl`
  ADD PRIMARY KEY (`UomId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wharehousetbl`
--
ALTER TABLE `wharehousetbl`
  ADD PRIMARY KEY (`WarehouseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acctypetbl`
--
ALTER TABLE `acctypetbl`
  MODIFY `AccId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assettbl`
--
ALTER TABLE `assettbl`
  MODIFY `AssId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `CusId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `exptbl`
--
ALTER TABLE `exptbl`
  MODIFY `ExpId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `liabtbl`
--
ALTER TABLE `liabtbl`
  MODIFY `LiabId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchaseorderdetailtbl`
--
ALTER TABLE `purchaseorderdetailtbl`
  MODIFY `PurAutoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchaseordertbl`
--
ALTER TABLE `purchaseordertbl`
  MODIFY `PurOrderId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchasereturntbl`
--
ALTER TABLE `purchasereturntbl`
  MODIFY `PrAutoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salareatbl`
--
ALTER TABLE `salareatbl`
  MODIFY `SalAreaId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `salesitemgrouptbl`
--
ALTER TABLE `salesitemgrouptbl`
  MODIFY `ProGroupId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salesitemtbl`
--
ALTER TABLE `salesitemtbl`
  MODIFY `ProId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `salesorderdetailtbl`
--
ALTER TABLE `salesorderdetailtbl`
  MODIFY `SaleAutoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `salesproducttypetbl`
--
ALTER TABLE `salesproducttypetbl`
  MODIFY `ProductTypeId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suptbl`
--
ALTER TABLE `suptbl`
  MODIFY `SupId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `uomtbl`
--
ALTER TABLE `uomtbl`
  MODIFY `UomId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wharehousetbl`
--
ALTER TABLE `wharehousetbl`
  MODIFY `WarehouseId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD CONSTRAINT `customertbl_ibfk_1` FOREIGN KEY (`CusAccType`) REFERENCES `acctypetbl` (`AccId`);

--
-- Constraints for table `exptbl`
--
ALTER TABLE `exptbl`
  ADD CONSTRAINT `exptbl_ibfk_1` FOREIGN KEY (`ExpAccType`) REFERENCES `acctypetbl` (`AccId`);

--
-- Constraints for table `liabtbl`
--
ALTER TABLE `liabtbl`
  ADD CONSTRAINT `liabtbl_ibfk_1` FOREIGN KEY (`LiabAccType`) REFERENCES `acctypetbl` (`AccId`);

--
-- Constraints for table `suptbl`
--
ALTER TABLE `suptbl`
  ADD CONSTRAINT `suptbl_ibfk_1` FOREIGN KEY (`SupAccType`) REFERENCES `acctypetbl` (`AccId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
