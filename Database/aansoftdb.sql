-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 09:46 AM
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
  `AssOpenDr` int(50) NOT NULL,
  `AssOpenCr` int(50) NOT NULL,
  `AssAccType` int(50) NOT NULL,
  `AssType` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Cash Sales', 'Vehari', '03136927444', 900, 10000, '1', 1, 2),
(2, 'Take Away', 'Multan', '03115575561', 800, 15099, '1', 1, 2),
(27, 'Naeem', 'ahmed', '897', 899, 89, '2', 1, 2),
(28, 'Amjad', 'Hanif', '980', 899, 899, '2', 1, 2),
(29, 'Arif', 'Hussain', '89', 89, 89, '2', 1, 2),
(43, 'Rehman', 'Ali', '87', 87, 8, '2', 1, 2),
(44, 'Name', 'no', '8', 7, 8, '1', 1, 2),
(48, 'Naeem', 'u', '0673332312', 7, 8, '1', 1, 2),
(51, 'lskdfj', 'alsdfjk', '8', 7, 6, '2', 1, 2),
(52, 'james', 'bond', '8', 7, 6, '2', 1, 2),
(53, 'Khan', 'imran', '8', 7, 6, '1', 1, 2),
(54, 'Rate', 'ksdhh', '8', 7, 6, '2', 1, 2),
(55, 'Lota ', 'virus', '8', 7, 6, '1', 1, 2),
(56, 'Huawei', 'Mate', '7', 6, 5, '2', 1, 2),
(57, 'Amjad', 'Hanif', '7', 6, 5, '2', 1, 2),
(58, 'Karachi', 'khan', '8', 8, 7, '1', 1, 2),
(59, 'Yes', 'No', '8', 7, 6, '1', 1, 2),
(60, 'Javed ', 'sheikh', '8', 7, 6, '1', 1, 2),
(68, 'Jamal', 'khan', '7', 6, 5, '2', 1, 2),
(69, 'jaha', 'uy', '7', 6, 5, '1', 1, 2),
(70, 'Set', 'mehtos', '8', 7, 6, '1', 1, 2),
(71, 'skdfj', 'ksjdf', '8', 7, 6, '1', 1, 2),
(72, 'kjsdf', 'klsjdf', '9', 8, 6, '1', 1, 2),
(73, 'jah', 'ksd', '8', 7, 6, '1', 1, 2),
(74, 'lksfjd', 'uyu', '7', 6, 6, '1', 1, 2),
(75, 'sdf', 'ui', '78', 76, 7, '2', 1, 2),
(76, 'klasj', 'u', '7', 7, 7, '1', 1, 2),
(77, 'sdf', 'sfd', '9', 8, 7, '1', 1, 2),
(78, 'sdf', 'wer', '2', 2, 2, '2', 1, 2),
(79, 'jklsdfj', 'lksjdlk', '9', 8, 7, '1', 1, 2),
(80, 'jakal', 'lksjd', '8', 7, 6, '1', 1, 2),
(81, 'lskdfj', 'lksajdflk', '9', 8, 7, '1', 1, 2),
(82, 'sfd', 'sfq9', '9', 8, 7, '1', 1, 2),
(83, 'sdf', 'sfd', '9', 8, 7, '1', 1, 2),
(84, 'sdad', 'jk', '8', 7, 6, '1', 1, 2),
(85, 'sldkj', 'skdj', '8', 7, 76, '2', 1, 2),
(86, 'safd', 'sfjk', '8', 7, 6, '1', 1, 2),
(87, 'asf', 'asdf', '8', 7, 6, '1', 1, 2),
(88, 'karachi', 'slakfjj', '8', 7, 6, '1', 1, 2),
(89, 'Jamal', 'lskfjl', '9', 8, 7, '1', 1, 2),
(90, 'amjad', 'u', '8', 7, 6, '1', 1, 2),
(91, 'Naeem', '7', '6', 5, 8, '1', 1, 2),
(92, 'Moin', 'u', '8', 7, 6, '1', 1, 2),
(93, 'Mustajab', 'slfj', '8', 7, 6, '1', 1, 2),
(94, 'Kashif', 'i', '8', 7, 6, '1', 1, 2),
(95, 'u', 'k', '9', 8, 7, '1', 1, 2),
(96, 'jug', 'i', '9', 8, 7, '1', 1, 2),
(97, 'abcd', 'i', '8', 7, 6, '2', 1, 2),
(98, 'khail', 'k', '9', 8, 7, '1', 1, 2),
(99, 'customer', 'i', '8', 7, 6, '1', 1, 2),
(100, 'klain', 'u', '8', 7, 6, '2', 1, 2),
(101, 'yes', 'i', '8', 7, 6, '1', 1, 2),
(102, 'not a ', 'u', '7', 6, 5, '1', 1, 2),
(103, 'column', 'u', '8', 7, 6, '1', 1, 2),
(104, 'All', 'u', '8', 7, 6, '2', 1, 2),
(105, 'sdfklj', 'u', '9', 8, 6, '2', 1, 2),
(106, 'james', 'skdfj', '8', 7, 6, '2', 1, 2),
(107, 'kala', 'slfkjj', '9', 8, 67, '1', 1, 2),
(108, 'sfd', 'l', 'i', 0, 8, '2', 1, 2),
(109, 'jam', 'kja', '8', 7, 6, '2', 1, 2),
(110, 's;dfkl', 'ui', '8', 7, 6, '2', 1, 2),
(111, 'sljf', 'u', '7', 6, 5, '2', 1, 2),
(112, 'sdfklj', 'i', 'u', 9, 8, '1', 1, 2),
(113, 'asdf', 'jkj', '8', 7, 6, '1', 1, 2),
(114, 'asfd', 'klsdjf', '9', 8, 7, '2', 1, 2),
(115, 'asdf', '8', '7', 6, 5, '2', 1, 2),
(116, 'sldfj', 'sldkfj', '9', 8, 7, '2', 1, 2),
(117, 'sdfkj', 'sdlkfjh', '9', 8, 7, '1', 1, 2),
(118, 'kaleem', 'u', '8', 7, 6, '1', 1, 2),
(119, 'you', 'lskdfj', '9', 9, 8, '2', 1, 2),
(120, 'Kamkaj', 'u', '8', 7, 6, '2', 1, 2),
(121, 'kal', 'i', '8', 7, 6, '2', 1, 2),
(122, 'kool', 'j', '8', 9, 8, '2', 1, 2),
(123, 'slkfj', '9', '8', 7, 6, '2', 1, 2),
(127, 'lkasjfd', 'sldkj', '8', 67, 6, '2', 1, 2),
(128, 'yahoo and Gmail', 'askldj', '9', 8, 7, '2', 1, 2),
(129, 'Mobile', 'vehari', '7', 8, 6, '2', 1, 2),
(130, 'Mobile Phone', 'Lalazar', '87', 6, 8, '220 KV Grid Station', 1, 2),
(131, 'Naeem', 'Ahmed', '', 9, 8, 'Vehari123', 1, 2),
(132, 'Ready', '', '', 8, 7, 'Multan123', 1, 2),
(133, 'Naeem', '', '', 0, 7, 'Vehari123', 1, 2),
(134, 'Moin Again', '', '', 9, 8, 'Vehari123', 1, 2),
(135, 'Imran Khan', '', '', 0, 900, 'Vehari', 1, 2),
(136, 'Imran Khan', '', '', 8, 900, 'Vehari', 1, 2),
(137, 'Ahmed', '', '', 0, 1200, 'VHR', 1, 2),
(138, 'Jmal', '', '', 90, 3, '3', 1, 2),
(139, 'Rehman', '', '', 0, 89, '7', 1, 2),
(140, 'Kaleem', 'jan', '9800', 12500, 8, 'Vehari', 1, 2),
(141, '89', '', '', 0, 9, 'o', 1, 2),
(142, 'jkl', '', '', 0, 8, 'Vehari123', 1, 2),
(143, 'abdul', '', '', 0, 9, '220 KV Grid Station', 1, 2),
(144, 'NO Name', 'No Data', '', 0, 980, 'vhr', 1, 2),
(145, 'James', 'Dan', '', 50, 8, '7', 1, 2),
(146, 'Rao School', 'Rate', '879', 900, 8, 'Vehari123', 1, 2),
(149, 'Amjad hanif', 'Red', '', 9, 8, 'Islamabad', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exptbl`
--

CREATE TABLE `exptbl` (
  `ExpId` int(50) NOT NULL,
  `ExpTitle` varchar(250) NOT NULL,
  `ExpOpenDr` int(50) NOT NULL,
  `ExpOpenCr` int(50) NOT NULL,
  `ExpAccType` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liabtbl`
--

CREATE TABLE `liabtbl` (
  `LiabId` int(50) NOT NULL,
  `LiabTitle` varchar(250) NOT NULL,
  `LiabAddress` varchar(250) NOT NULL,
  `LiabContact` varchar(250) NOT NULL,
  `LiabOpenDr` int(50) NOT NULL,
  `LiabOpenCr` int(50) NOT NULL,
  `LiabAccType` int(50) NOT NULL DEFAULT '2',
  `LiabType` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producttbl`
--

CREATE TABLE `producttbl` (
  `ProId` int(50) NOT NULL,
  `ProName` varchar(250) NOT NULL,
  `ProUomName` int(50) NOT NULL,
  `ProOpenQtyUnit` int(50) NOT NULL,
  `ProOpenRate` int(50) NOT NULL,
  `ProOpenDr` int(50) NOT NULL,
  `ProOpenCr` int(50) NOT NULL,
  `ProSalesRate` int(50) NOT NULL,
  `ProItemGroupName` int(50) NOT NULL,
  `ProductTypeName` int(50) NOT NULL,
  `ProAccType` int(50) NOT NULL DEFAULT '3',
  `ProType` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producttypetbl`
--

CREATE TABLE `producttypetbl` (
  `ProductTypeId` int(50) NOT NULL,
  `ProductTypeName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progrouptbl`
--

CREATE TABLE `progrouptbl` (
  `ProGroupId` int(50) NOT NULL,
  `ProGroupTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetailtbl`
--

CREATE TABLE `purchaseorderdetailtbl` (
  `PurOrderId` int(50) NOT NULL,
  `PurSupCodeName` int(50) NOT NULL,
  `PurItemName` int(50) NOT NULL,
  `PurWHName` int(50) NOT NULL,
  `PurQty` int(50) NOT NULL,
  `PurGrossRate` int(50) NOT NULL,
  `PurGrossAmount` int(50) NOT NULL,
  `PurStockQty` int(50) NOT NULL,
  `PurSaleQty` int(50) NOT NULL,
  `PurDiscInPercent` int(50) NOT NULL,
  `PurDiscValueInRate` int(50) NOT NULL,
  `PurDiscRate` int(50) NOT NULL,
  `PurAmount` int(50) NOT NULL,
  `PurRemarks` varchar(250) NOT NULL,
  `PurTransType` varchar(250) NOT NULL DEFAULT 'PT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseordertbl`
--

CREATE TABLE `purchaseordertbl` (
  `PurOrderId` int(50) NOT NULL,
  `PurOrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 'Peshawar');

-- --------------------------------------------------------

--
-- Table structure for table `suptbl`
--

CREATE TABLE `suptbl` (
  `SupId` int(50) NOT NULL,
  `SupName` varchar(250) NOT NULL,
  `SupAddress` varchar(250) NOT NULL,
  `SupContact` varchar(250) NOT NULL,
  `SupOpenDr` int(50) NOT NULL,
  `SupOpenCr` int(50) NOT NULL,
  `SupAccType` int(50) NOT NULL DEFAULT '2',
  `SupLibType` int(50) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suptbl`
--

INSERT INTO `suptbl` (`SupId`, `SupName`, `SupAddress`, `SupContact`, `SupOpenDr`, `SupOpenCr`, `SupAccType`, `SupLibType`) VALUES
(1, 'Dummy1', 'Dummy Address', '455', 0, 0, 2, 2),
(2, 'Dummy 2', 'Dummy Address 2', '847', 0, 0, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uomtbl`
--

CREATE TABLE `uomtbl` (
  `UomId` int(50) NOT NULL,
  `UomName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`, `pass`, `email`, `profile_photo`) VALUES
(2, 'abc', '1234', 'abc@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wharehousetbl`
--

CREATE TABLE `wharehousetbl` (
  `WarehouseId` int(50) NOT NULL,
  `WarehouseName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `liabtbl`
--
ALTER TABLE `liabtbl`
  ADD PRIMARY KEY (`LiabId`),
  ADD KEY `LiabAccType` (`LiabAccType`);

--
-- Indexes for table `producttbl`
--
ALTER TABLE `producttbl`
  ADD PRIMARY KEY (`ProId`),
  ADD KEY `ProAccType` (`ProAccType`),
  ADD KEY `ProItemGroupName` (`ProItemGroupName`),
  ADD KEY `ProductTypeName` (`ProductTypeName`),
  ADD KEY `ProUomName` (`ProUomName`);

--
-- Indexes for table `producttypetbl`
--
ALTER TABLE `producttypetbl`
  ADD PRIMARY KEY (`ProductTypeId`);

--
-- Indexes for table `progrouptbl`
--
ALTER TABLE `progrouptbl`
  ADD PRIMARY KEY (`ProGroupId`);

--
-- Indexes for table `purchaseorderdetailtbl`
--
ALTER TABLE `purchaseorderdetailtbl`
  ADD KEY `PurOrderId` (`PurOrderId`),
  ADD KEY `PurSupCodeName` (`PurSupCodeName`),
  ADD KEY `PurItemName` (`PurItemName`),
  ADD KEY `PurWHName` (`PurWHName`);

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
  MODIFY `AssId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `CusId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `exptbl`
--
ALTER TABLE `exptbl`
  MODIFY `ExpId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liabtbl`
--
ALTER TABLE `liabtbl`
  MODIFY `LiabId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttbl`
--
ALTER TABLE `producttbl`
  MODIFY `ProId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttypetbl`
--
ALTER TABLE `producttypetbl`
  MODIFY `ProductTypeId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progrouptbl`
--
ALTER TABLE `progrouptbl`
  MODIFY `ProGroupId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseordertbl`
--
ALTER TABLE `purchaseordertbl`
  MODIFY `PurOrderId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salareatbl`
--
ALTER TABLE `salareatbl`
  MODIFY `SalAreaId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suptbl`
--
ALTER TABLE `suptbl`
  MODIFY `SupId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uomtbl`
--
ALTER TABLE `uomtbl`
  MODIFY `UomId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wharehousetbl`
--
ALTER TABLE `wharehousetbl`
  MODIFY `WarehouseId` int(50) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assettbl`
--
ALTER TABLE `assettbl`
  ADD CONSTRAINT `assettbl_ibfk_1` FOREIGN KEY (`AssAccType`) REFERENCES `acctypetbl` (`AccId`);

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
-- Constraints for table `producttbl`
--
ALTER TABLE `producttbl`
  ADD CONSTRAINT `producttbl_ibfk_1` FOREIGN KEY (`ProAccType`) REFERENCES `acctypetbl` (`AccId`),
  ADD CONSTRAINT `producttbl_ibfk_2` FOREIGN KEY (`ProductTypeName`) REFERENCES `producttypetbl` (`ProductTypeId`),
  ADD CONSTRAINT `producttbl_ibfk_3` FOREIGN KEY (`ProItemGroupName`) REFERENCES `progrouptbl` (`ProGroupId`),
  ADD CONSTRAINT `producttbl_ibfk_4` FOREIGN KEY (`ProUomName`) REFERENCES `uomtbl` (`UomId`);

--
-- Constraints for table `purchaseorderdetailtbl`
--
ALTER TABLE `purchaseorderdetailtbl`
  ADD CONSTRAINT `purchaseorderdetailtbl_ibfk_1` FOREIGN KEY (`PurOrderId`) REFERENCES `purchaseordertbl` (`PurOrderId`),
  ADD CONSTRAINT `purchaseorderdetailtbl_ibfk_2` FOREIGN KEY (`PurSupCodeName`) REFERENCES `suptbl` (`SupId`),
  ADD CONSTRAINT `purchaseorderdetailtbl_ibfk_3` FOREIGN KEY (`PurItemName`) REFERENCES `producttbl` (`ProId`),
  ADD CONSTRAINT `purchaseorderdetailtbl_ibfk_4` FOREIGN KEY (`PurWHName`) REFERENCES `wharehousetbl` (`WarehouseId`);

--
-- Constraints for table `suptbl`
--
ALTER TABLE `suptbl`
  ADD CONSTRAINT `suptbl_ibfk_1` FOREIGN KEY (`SupAccType`) REFERENCES `acctypetbl` (`AccId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
