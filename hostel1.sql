-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 07:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'Sudha1', 'sudha1@gmail.com', 'Pantha123', '2023-06-05 06:35:31', '2023-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_sn` varchar(255) NOT NULL,
  `course_fn` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(2, 'BCOM1453', 'B.Com', 'Bachelor Of commerce ', '2016-04-11 19:32:46'),
(3, 'BSC12', 'BSC', 'Bachelor  of Science', '2016-04-11 19:33:23'),
(4, 'BC36356', 'BCA', 'Bachelor Of Computer Application', '2016-04-11 19:34:18'),
(5, 'MCA565', 'MCA', 'Master of Computer Application', '2016-04-11 19:34:40'),
(6, 'MBA75', 'MBA', 'Master of Business Administration', '2016-04-11 19:34:59'),
(7, 'BE765', 'BE', 'Bachelor of Engineering', '2016-04-11 19:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `feespm` int(11) NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` int(11) NOT NULL,
  `course` varchar(500) NOT NULL,
  `regno` int(11) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `egycontactno` bigint(11) NOT NULL,
  `guardianName` varchar(500) NOT NULL,
  `guardianRelation` varchar(500) NOT NULL,
  `guardianContactno` bigint(11) NOT NULL,
  `corresAddress` varchar(500) NOT NULL,
  `corresCIty` varchar(500) NOT NULL,
  `corresState` varchar(500) NOT NULL,
  `corresPincode` int(11) NOT NULL,
  `pmntAddress` varchar(500) NOT NULL,
  `pmntCity` varchar(500) NOT NULL,
  `pmnatetState` varchar(500) NOT NULL,
  `pmntPincode` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) NOT NULL,
  `roomno` int(11) DEFAULT NULL,
  `foodstatus` int(11) DEFAULT NULL,
  `seater` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `feespm`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`, `roomno`, `foodstatus`, `seater`, `status`) VALUES
(13, 11000, '2023-05-28', 2, 'Bachelor  of Science', 10123, 'Sudha', '.', 'Pantha', 'female', 9840249601, 'sudha@gmail.com', 333333, 'nnnnn', 'sssssssss', 9999, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, '2023-06-14 11:53:07', '', 202, 0, 2, 'Approved'),
(14, 11000, '2023-05-28', 2, 'Bachelor  of Science', 10123, 'Sudha', '.', 'Pantha', 'female', 9840249601, 'sudha@gmail.com', 333333, 'nnnnn', 'sssssssss', 9999, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, '2023-06-14 11:53:45', '', 202, 0, 2, ''),
(15, 11000, '2023-06-06', 10, 'Bachelor  of Science', 10123, 'Sudha', '.', 'Pantha', 'female', 9840249601, 'sudhapantha111@gmail.com', 8976666, 'kkkkk', 'kkkkkk', 888888, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, '2023-06-15 01:08:10', '', 202, 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `foodstatus` enum('with','without') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`, `foodstatus`) VALUES
(101, 1, 201, 15000, '2023-06-14 04:24:52', NULL),
(102, 2, 202, 11000, '2023-06-14 04:24:52', NULL),
(103, 3, 203, 10000, '2023-06-14 04:26:10', NULL),
(104, 4, 204, 9000, '2023-06-14 04:26:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(1, 101, 'test@gmail.com', '', '', '', '2023-05-24 15:17:38'),
(7, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-05-24 15:31:46'),
(8, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-05-24 17:15:52'),
(9, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-05-25 10:11:32'),
(10, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-05-28 15:33:26'),
(11, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-05-29 10:00:22'),
(12, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-10 04:32:39'),
(13, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-11 04:30:13'),
(14, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-11 06:58:16'),
(15, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-11 12:21:55'),
(16, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-11 17:43:01'),
(17, 21, 'nisha@gmail.com', 0x3a3a31, '', '', '2023-06-12 05:28:51'),
(18, 22, 'prawesh@gm', 0x3a3a31, '', '', '2023-06-13 04:22:44'),
(19, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-13 04:59:56'),
(20, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-13 05:36:15'),
(21, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-14 03:37:56'),
(22, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-14 06:53:10'),
(23, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-14 10:26:38'),
(24, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-15 01:06:10'),
(25, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-15 09:12:54'),
(26, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-15 09:26:57'),
(27, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-15 16:40:53'),
(28, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-16 03:44:23'),
(29, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-16 04:08:11'),
(30, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-16 05:44:50'),
(31, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-06-16 06:11:40'),
(32, 26, 'myemail@mail.com', 0x3a3a31, '', '', '2023-07-23 17:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(1, '10123', 'Sudha', '.', 'Pantha', 'female', 9840249601, 'sudha@gmail.com', 'Sudha123', '2023-05-24 15:29:42', '13-06-2023 10:31:23', ''),
(21, '02', 'Nisha', '.', 'Pantha', 'female', 9844715244, 'nisha@gmail.com', 'Nisha123', '2023-06-12 05:28:34', '', ''),
(22, '12345', 'Prawesh', '', 'Dhungana', 'male', 9851339619, 'prawesh@gm', '12345', '2023-06-13 04:22:04', '', ''),
(23, '12345', 'Sudha', '.', 'Pantha', 'female', 9840249601, 'sudhapantha21@gm', 'sudha', '2023-06-13 05:28:30', '', ''),
(24, '12345', 'Sudha', '.', 'Pantha', 'female', 9840249601, 'sudhapantha21@gm', 'sudha', '2023-06-13 05:33:22', '', ''),
(25, '05', 'Kritika', '.', 'Yesmali', 'female', 9851339619, 'kritika@gmail.com', 'kritika', '2023-06-13 05:34:22', '', ''),
(26, '753159', 'Bishal', '', 'Kc', 'male', 98666666666, 'myemail@mail.com', '123456', '2023-07-23 17:20:02', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
