-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 05:40 PM
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
(40, 'Parveen Shakar', 'Muslim Town', '03001234543', 0, 78000, 'Multan123', 1, 2),
(41, 'Khalid', '', '', 0, 90, 'Vehari123', 1, 2),
(42, 'Add', 'a', '878', 78, 78, 'Multan123', 1, 2),
(43, 'Minus', 'u', '5654', 90, -7800, 'Peshawar', 1, 2);

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
  `PurOrderId` int(50) NOT NULL,
  `PurDate` date NOT NULL,
  `PurSupCode` int(50) NOT NULL,
  `PurSupCodeName` varchar(250) NOT NULL,
  `PurItemCode` int(50) NOT NULL,
  `PurItemName` varchar(250) NOT NULL,
  `PurWHCode` int(50) NOT NULL,
  `PurWHName` varchar(250) NOT NULL,
  `PurQty` int(50) NOT NULL,
  `PurGrossRate` int(50) NOT NULL,
  `PurGrossAmount` int(50) NOT NULL,
  `PurStockQty` int(50) NOT NULL,
  `PurSaleQty` int(50) NOT NULL,
  `PurDiscInPercent` int(50) NOT NULL,
  `PurDiscValueInRate` int(50) NOT NULL,
  `PurDiscRate` int(50) NOT NULL,
  `PurAmount` int(50) NOT NULL,
  `DisplayID` int(50) NOT NULL,
  `PurRemarks` varchar(250) NOT NULL,
  `PurTransType` varchar(250) NOT NULL DEFAULT 'PT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorderdetailtbl`
--

INSERT INTO `purchaseorderdetailtbl` (`PurOrderId`, `PurDate`, `PurSupCode`, `PurSupCodeName`, `PurItemCode`, `PurItemName`, `PurWHCode`, `PurWHName`, `PurQty`, `PurGrossRate`, `PurGrossAmount`, `PurStockQty`, `PurSaleQty`, `PurDiscInPercent`, `PurDiscValueInRate`, `PurDiscRate`, `PurAmount`, `DisplayID`, `PurRemarks`, `PurTransType`) VALUES
(1, '2018-09-12', 1, 'Naeem AHmed', 1, 'Laptop', 1, 'Warehouse', 7, 78, 67, 89, 90, 89, 7, 78, 98, 2, 'No Remarks', 'PT');

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
(19, 'Sky Blue');

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
  MODIFY `CusId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
-- AUTO_INCREMENT for table `purchaseordertbl`
--
ALTER TABLE `purchaseordertbl`
  MODIFY `PurOrderId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salareatbl`
--
ALTER TABLE `salareatbl`
  MODIFY `SalAreaId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
