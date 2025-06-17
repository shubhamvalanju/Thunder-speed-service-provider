-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 05:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ispmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookbplan`
--

CREATE TABLE `tblbookbplan` (
  `ID` int(5) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `PlanID` int(5) DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Assign` varchar(50) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookbplan`
--

INSERT INTO `tblbookbplan` (`ID`, `BookingNumber`, `UserID`, `PlanID`, `BookingDate`, `Assign`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 112339571, 7, 11, '2021-12-31 06:01:31', 'emp101', 'sd', 'Completed', '2022-01-12 12:18:02'),
(2, 347525961, 7, 11, '2021-12-31 06:01:58', 'emp101', 'Assign to technician', 'Assign', '2022-01-18 17:04:09'),
(3, 607378628, 11, 11, '2022-01-05 14:33:27', 'emp101', 'Assign to Technician', 'Assign', '2022-01-18 17:03:22'),
(10, 558614882, 13, 10, '2022-01-18 16:01:48', NULL, NULL, NULL, '2022-01-18 16:01:48'),
(11, 972523163, 14, 2, '2022-01-18 17:31:25', '', 'Installation complete', 'Completed', '2022-01-18 17:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookdthplan`
--

CREATE TABLE `tblbookdthplan` (
  `ID` int(5) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `PlanID` int(5) DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Assign` varchar(200) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookdthplan`
--

INSERT INTO `tblbookdthplan` (`ID`, `BookingNumber`, `UserID`, `PlanID`, `BookingDate`, `Assign`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 933830125, 7, 4, '2021-12-31 10:03:53', 'emp102', 'Completed', 'Completed', '2022-01-04 11:47:24'),
(2, 294220118, 11, 4, '2022-01-08 14:40:51', 'emp101', 'Ok', 'Assign', '2022-01-08 14:48:52'),
(3, 338108407, 12, 4, '2022-01-12 12:25:05', 'emp102', 'Completed', 'Completed', '2022-01-12 12:29:49'),
(4, 101687157, 12, 4, '2022-01-12 12:25:09', NULL, NULL, NULL, '2022-01-12 12:25:09'),
(5, 452612567, 12, 4, '2022-01-12 12:25:14', NULL, NULL, NULL, '2022-01-12 12:25:14'),
(9, 201726867, 14, 3, '2022-01-18 17:31:49', '', 'Rejected', 'Rejected', '2022-01-18 17:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblbroadbandplan`
--

CREATE TABLE `tblbroadbandplan` (
  `ID` int(5) NOT NULL,
  `Plan` varchar(200) DEFAULT NULL,
  `Speed` varchar(200) DEFAULT NULL,
  `FUP` varchar(200) DEFAULT NULL,
  `PostFUP` varchar(200) DEFAULT NULL,
  `Benefits` mediumtext DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbroadbandplan`
--

INSERT INTO `tblbroadbandplan` (`ID`, `Plan`, `Speed`, `FUP`, `PostFUP`, `Benefits`, `Price`, `CreationDate`) VALUES
(1, 'Elite', '125Mbps', '750GB', '2Mbps', 'Get superfast net with one month free', '400', '2021-12-29 09:40:45'),
(2, 'Stream', '125Mbps', '750GB', '2Mbps', 'jlkjasdkkhdehfor, khdiueyhdijl,.,kopwioueowdjklkjshd\r\n', '500', '2021-12-29 09:42:46'),
(3, 'C Elite', '125Mbps', '750GB', '2Mbps', 'Get superfast net with one month free', '60', '2021-12-29 09:40:45'),
(4, 'CL Stream', '125Mbps', '750GB', '2Mbps', 'jlkjasdkkhdehfor, khdiueyhdijl,.,kopwioueowdjklkjshd\r\n', '75', '2021-12-29 09:42:46'),
(5, 'EON', '125Mbps', '750GB', '2Mbps', 'Get superfast net with one month free', '85', '2021-12-29 09:40:45'),
(6, 'Premium Elite', '200Mbps', '750GB', '5Mbps', 'Get superfast net with one month free', '95', '2021-12-29 09:40:45'),
(7, 'Supreme Elite', '300Mbps', '750GB', '2Mbps', 'Get superfast net with two month free', '82', '2021-12-29 09:40:45'),
(8, 'Premium Stream', '125Mbps', '750GB', '2Mbps', 'Get superfast net with three month free', '400', '2021-12-29 09:40:45'),
(9, 'Supreme Eon', '125Mbps', '750GB', '2Mbps', 'Get superfast net with five month free', '89', '2021-12-29 09:40:45'),
(10, 'Supreme C Stream', '125Mbps', '750GB', '2Mbps', 'Get superfast net with one month free', '400', '2021-12-29 09:40:45'),
(11, 'Suprem EON Elite', '125Mbps', '750GB', '2Mbps', 'Get superfast net with one month free . Installation charges and taxes are included', '620', '2021-12-29 09:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(5) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `ServiceType` varchar(100) DEFAULT NULL,
  `EnquiryType` varchar(100) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `Enquirydate` timestamp NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `ServiceType`, `EnquiryType`, `MobileNumber`, `City`, `Message`, `Enquirydate`, `IsRead`, `Remark`, `UpdationDate`) VALUES
(1, 'Sarita Pandey', 'g@gmail.com', 'Digital TV', 'Feedback', 7894561236, 'kolkata', 'gjjhghjgjhghjghjghgjhgjh', '2022-01-01 12:47:46', NULL, NULL, '2022-01-05 05:37:41'),
(2, 'hkhkhk', 'jk@gmail.com', 'Broadband', 'Complaint', 8797987979, 'kjhkjh', 'kjhkjh', '2022-01-01 13:07:23', 1, 'Ok', '2022-01-05 06:32:11'),
(3, 'Sonam', 'sonam@gmail.com', 'Broadband', 'Query', 7897897987, 'Ghaziabad', 'hkjykdkjher', '2022-01-04 11:49:31', NULL, NULL, '2022-01-05 05:37:41'),
(4, 'Sonu', 'hjk@gmail.com', 'Digital TV', 'Request', 9878798799, 'rameshwaram', 'uiyuinnkjhiuhhgrjeoajoirtu', '2022-01-04 12:04:53', NULL, NULL, '2022-01-05 05:37:41'),
(5, 'Anuj', 'dsadg@gghgads.com', 'Digital TV', 'Request', 22336655, 'New Delhi', 'This is for testing', '2022-01-18 17:38:57', 1, 'Issue resolved', '2022-01-18 17:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbldthplan`
--

CREATE TABLE `tbldthplan` (
  `ID` int(5) NOT NULL,
  `DTHPlan` varchar(200) DEFAULT NULL,
  `Channels` varchar(200) DEFAULT NULL,
  `PlanPrice` decimal(10,0) DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL,
  `Features` mediumtext DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldthplan`
--

INSERT INTO `tbldthplan` (`ID`, `DTHPlan`, `Channels`, `PlanPrice`, `Duration`, `Features`, `Description`, `CreationDate`) VALUES
(1, 'Diamond HD', 'Diamond HD', '50', '1 Month', 'Total Channels: 189\r\nPopular Channels: 35\r\nSD Channels: 189', 'jlkjdueorujdljjfon\r\npoipoipolk;k\r\nkpoipoitoperitgopdip', '2021-12-30 04:59:09'),
(2, 'Airtel Digital TV Hindi Value Lite SD Pack New', 'News: 77 General Entertainment: 41 Movies: 31', '50', '1 Month', 'Total Channels: 189\r\nPopular Channels: 35\r\nSD Channels: 189', 'Enjoy the best of Tamil regional, infotainment, sports, kids, english GEC & more channels.', '2021-12-30 05:00:11'),
(3, 'Dish TV Hindi Premium', 'Hindi News: 26 Hindi Entertainment: 10 Infotainment: 6', '60', 'Two Month', 'Total Channels: 189\r\nPopular Channels: 35\r\nSD Channels: 189', 'Best Of Entertainment, Movies, Sports, News, Music, Knowledge & Lifestyle', '2021-12-30 05:01:52'),
(4, 'Videocon d2h Hamara Hindi Combo', 'News: 21 General Entertainment: 19 Movies: 14', '75', 'One Month', 'Total Channels: 87\r\nPopular Channels: 40\r\nSD Channels: 87', 'Best Of Hindi Entertainment, Hindi Movies, Hindi News', '2021-12-30 05:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbldthtracking`
--

CREATE TABLE `tbldthtracking` (
  `ID` int(10) NOT NULL,
  `ApplicationNumber` int(10) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldthtracking`
--

INSERT INTO `tbldthtracking` (`ID`, `ApplicationNumber`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 933830125, 'Assign', 'Assign', '2022-01-04 11:35:40'),
(2, 933830125, 'completed', 'Completed', '2022-01-04 11:46:58'),
(3, 933830125, 'Completed', 'Completed', '2022-01-04 11:47:24'),
(4, 294220118, 'Ok', 'Assign', '2022-01-08 14:48:52'),
(5, 338108407, 'Ok', 'Assign', '2022-01-12 12:26:58'),
(6, 338108407, 'Completed', 'Completed', '2022-01-12 12:29:49'),
(7, 201726867, 'Rejected', 'Rejected', '2022-01-18 17:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<span style=\"color: rgb(34, 34, 34); font-family: Roboto, sans-serif; background-color: rgb(238, 238, 238);\"><font size=\"6\">Commercial and critical success aside, what the corporation is most proud of is how its work works in the real world. Using its powerful reach to campaign for and with the people of India.</font></span><br>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', '730, Gulmhour Garden Lucknow', 'info@gmail.com', 7896541236, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltechnicians`
--

CREATE TABLE `tbltechnicians` (
  `ID` int(5) NOT NULL,
  `EmployeeID` varchar(50) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `JoiningDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltechnicians`
--

INSERT INTO `tbltechnicians` (`ID`, `EmployeeID`, `FullName`, `MobileNumber`, `Address`, `JoiningDate`) VALUES
(1, 'emp101', 'Gyanendra Pratap', 9787977979, 'x-8909, jhgytiiuyiueyr\'uyiuyriweuo', '2022-01-01 14:34:14'),
(3, 'emp102', 'John', 6546454646, 'c/o dr sunil srivastav, H-980 jain tower', '2022-01-03 05:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbltracking`
--

CREATE TABLE `tbltracking` (
  `ID` int(10) NOT NULL,
  `ApplicationNumber` int(10) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltracking`
--

INSERT INTO `tbltracking` (`ID`, `ApplicationNumber`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 112339571, 'Assign to technicians', 'Assign', '2022-01-04 04:35:11'),
(2, 112339571, 'sd', 'Completed', '2022-01-12 12:18:01'),
(3, 607378628, 'Assign to Technician', 'Assign', '2022-01-18 17:03:22'),
(4, 347525961, 'Assign to technician', 'Assign', '2022-01-18 17:04:09'),
(5, 972523163, 'Assign to technician', 'Assign', '2022-01-18 17:32:58'),
(6, 972523163, 'Installation complete', 'Completed', '2022-01-18 17:37:41'),
(7, 347525961, 'Completed', 'Completed', '2022-01-18 17:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Khusi', 8956234569, 'khusi@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-16 14:22:03'),
(2, 'Rishi Singh', 5689234578, 'rishi@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-16 14:37:49'),
(3, 'Abir Singh', 2147483649, 'abir@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-16 14:40:20'),
(4, 'Test Sample', 8797977779, 'sample@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-08 05:51:06'),
(5, 'Anuj  kumar', 1236547890, 'test@test.com', 'f925916e2754e5e03f75dd58a5733251', '2020-05-07 08:52:34'),
(6, 'ghhg', 8888888888, 'c@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-14 05:27:32'),
(7, 'Sarita', 1234567896, 'sarita@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-30 11:56:31'),
(8, 'Sonu', 7896541236, 'sonu@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-30 12:01:43'),
(9, 'Test', 7979789797, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-30 12:04:24'),
(10, 'Atul', 1236547890, 'gh@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2022-01-01 12:28:38'),
(11, 'Mahesh Singh', 7987987987, 'mah@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-01-05 14:31:40'),
(12, 'test1', 8797987898, 'test1@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-01-12 12:24:39'),
(13, 'John Doe', 1234569870, 'johndoe@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-01-18 15:26:20'),
(14, 'Anuj Singh', 1122334455, 'anujk30@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-01-18 17:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbookbplan`
--
ALTER TABLE `tblbookbplan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BookingNumber` (`BookingNumber`),
  ADD KEY `uid` (`UserID`),
  ADD KEY `pid` (`PlanID`),
  ADD KEY `BookingNumber_2` (`BookingNumber`),
  ADD KEY `tiddd` (`Assign`);

--
-- Indexes for table `tblbookdthplan`
--
ALTER TABLE `tblbookdthplan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BookingNumber` (`BookingNumber`),
  ADD KEY `uidd` (`UserID`),
  ADD KEY `ppid` (`PlanID`),
  ADD KEY `tid` (`Assign`);

--
-- Indexes for table `tblbroadbandplan`
--
ALTER TABLE `tblbroadbandplan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldthplan`
--
ALTER TABLE `tbldthplan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldthtracking`
--
ALTER TABLE `tbldthtracking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bbid` (`ApplicationNumber`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltechnicians`
--
ALTER TABLE `tbltechnicians`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `tbltracking`
--
ALTER TABLE `tbltracking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bid` (`ApplicationNumber`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbookbplan`
--
ALTER TABLE `tblbookbplan`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblbookdthplan`
--
ALTER TABLE `tblbookdthplan`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbroadbandplan`
--
ALTER TABLE `tblbroadbandplan`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldthplan`
--
ALTER TABLE `tbldthplan`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbldthtracking`
--
ALTER TABLE `tbldthtracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltechnicians`
--
ALTER TABLE `tbltechnicians`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbltracking`
--
ALTER TABLE `tbltracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
