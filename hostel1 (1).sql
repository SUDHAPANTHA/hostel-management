-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 10:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `food_status` enum('WithFood','WithOutFood') NOT NULL,
  `stay_from` varchar(100) NOT NULL,
  `guardian_contact` varchar(20) NOT NULL,
  `emergency_contact` varchar(20) NOT NULL,
  `guardian_relation` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `total_fee` decimal(10,2) NOT NULL,
  `approved` int(255) DEFAULT NULL,
  `status` enum('pending','approved','cancelled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(14, 11000, '2023-05-28', 2, 'Bachelor  of Science', 10123, 'Sudha', '.', 'Pantha', 'female', 9840249601, 'sudha@gmail.com', 333333, 'nnnnn', 'sssssssss', 9999, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, '2023-06-14 11:53:45', '', 202, 0, 2, 'Approved'),
(19, 17000, '2023-07-25', 2, 'Bachelor Of commerce ', 1234, 'Maya', '', 'Gyawali', 'female', 9844712342, 'maya@gmail.com', 9845777777, 'anuj', 'Sister', 9855667788, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, 'Shantinagar', 'Kathamandu', 'Kathmandu', 44600, '2023-07-24 02:49:20', '', 201, NULL, 1, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `status` enum('available','booked','rejected') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `image_url`, `status`) VALUES
(1, 'one-seater', 'images/hostel1.jpg', 'available');

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
(32, 26, 'myemail@mail.com', 0x3a3a31, '', '', '2023-07-23 17:20:23'),
(33, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-24 02:08:12'),
(34, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-24 02:08:54'),
(35, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-24 02:09:58'),
(36, 27, 'maya@gmail.com', 0x3a3a31, '', '', '2023-07-24 02:41:27'),
(37, 26, 'myemail@mail.com', 0x3a3a31, '', '', '2023-07-24 02:52:56'),
(38, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-24 14:54:59'),
(39, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-25 04:00:45'),
(40, 1, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-28 14:07:03'),
(41, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-29 13:03:37'),
(42, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-29 17:40:35'),
(43, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-30 08:10:28'),
(44, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-31 05:40:36'),
(45, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-31 11:59:39'),
(46, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-31 12:28:14'),
(47, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-07-31 16:48:17'),
(48, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 03:02:30'),
(49, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 03:50:31'),
(50, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 04:12:26'),
(51, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 04:25:43'),
(52, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 07:01:38'),
(53, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 07:30:55'),
(54, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 08:03:17'),
(55, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-01 08:05:41'),
(56, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-02 09:26:26'),
(57, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-06 14:23:17'),
(58, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-06 14:35:56'),
(59, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-06 14:36:55'),
(60, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-06 14:45:52'),
(61, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-06 14:54:59'),
(62, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-06 15:06:25'),
(63, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-06 15:21:36'),
(64, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-07 04:11:30'),
(65, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-08 05:40:16'),
(66, 28, 'sudha@gmail.com', 0x3a3a31, '', '', '2023-08-09 06:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
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

INSERT INTO `userregistration` (`id`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(28, '001', 'Sudha', '', 'Pantha', 'female', 9840249601, 'sudha@gmail.com', 'Sudha123', '2023-07-28 14:33:39', '30-07-2023 02:05:03', ''),
(34, 'REG1', 'Rosha', '', 'Pantha', 'female', 9844712342, 'sudhapantha111@gmail.com', '1234', '2023-07-28 15:35:33', '', ''),
(35, '001', 'Nisha', '', 'Pantha', 'female', 9844715244, 'nisha@gmail.com', 'Nisha123', '2023-07-28 15:35:44', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
