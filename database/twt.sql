-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2016 at 07:42 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twt`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

CREATE TABLE `agreement` (
  `lease_id` int(5) NOT NULL,
  `place_id` varchar(5) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `date_start` varchar(50) NOT NULL,
  `date_end` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(5) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_leader` varchar(50) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_leader`, `department_name`) VALUES
('BM', 'Business Management', 'Mr.Tan', 'Faculty Of Business'),
('ITCN', 'Computer Networking', 'Dr. Diego Costa', 'Faculty of Information System'),
('ITSC', 'Security Technology', 'DR. Lim Eng Huat', 'Faculty of Information Science & Technology');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` varchar(5) NOT NULL,
  `hall_name` varchar(10) NOT NULL,
  `hall_address` varchar(50) NOT NULL,
  `hall_hp` int(11) NOT NULL,
  `hall_manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `hall_address`, `hall_hp`, `hall_manager`) VALUES
('H0001', 'Hall A', '1, jalan 1, taman 1', 123456789, 'Frank Lampard'),
('H0002', 'Hall B', '2, jalan 2, taman 2', 123456789, 'John Terry');

-- --------------------------------------------------------

--
-- Table structure for table `relative`
--

CREATE TABLE `relative` (
  `relative_id` int(5) NOT NULL,
  `relative_name` varchar(50) NOT NULL,
  `relative_relation` varchar(50) NOT NULL,
  `relative_address` varchar(50) NOT NULL,
  `relative_hp` varchar(11) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relative`
--

INSERT INTO `relative` (`relative_id`, `relative_name`, `relative_relation`, `relative_address`, `relative_hp`, `student_id`) VALUES
(1, 'Ezio Tiu', 'Father', '15, Jalan Bobo, Taman Ina', '123456789', 1121116126),
(2, 'Hong Leong', 'Father', '16,Jalan xxx', '0123546987', 1121115859);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `place_id` varchar(5) NOT NULL,
  `room_num` int(5) NOT NULL,
  `room_rent` int(3) NOT NULL,
  `hall_id` varchar(5) NOT NULL,
  `room_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`place_id`, `room_num`, `room_rent`, `hall_id`, `room_status`) VALUES
('P0001', 15, 200, 'H0001', 'Pending'),
('P0002', 16, 200, 'H0001', 'None'),
('P0003', 30, 200, 'H0002', 'None'),
('P0004', 31, 200, 'H0002', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_role` varchar(50) NOT NULL,
  `staff_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_role`, `staff_pass`) VALUES
(1121116666, 'Harry Kane', 'Admin', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_address` varchar(50) NOT NULL,
  `student_dob` date NOT NULL,
  `student_category` varchar(50) NOT NULL,
  `student_status` varchar(10) NOT NULL,
  `course_id` varchar(5) NOT NULL,
  `student_pass` varchar(50) NOT NULL,
  `student_hp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_address`, `student_dob`, `student_category`, `student_status`, `course_id`, `student_pass`, `student_hp`) VALUES
(1121115859, 'Leong Yoong Wah', '16,janlan kerjasame,taman Ayer Keroh', '2016-02-03', 'Postgraduate', 'None', 'ITCN', '123456789', '0121236547'),
(1121116126, 'Toures Tiu', '15, Jalan Emas, Taman Taktau', '2016-01-01', 'Undergraduate', 'Pending', 'ITSC', '123456789', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `waiting`
--

CREATE TABLE `waiting` (
  `waiting_id` int(5) NOT NULL,
  `place_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `wait_start` varchar(50) NOT NULL,
  `wait_end` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiting`
--

INSERT INTO `waiting` (`waiting_id`, `place_id`, `student_id`, `wait_start`, `wait_end`) VALUES
(1, 'P0001', '1121116126', '15/16 Semester 1', '15/16 Semester 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreement`
--
ALTER TABLE `agreement`
  ADD PRIMARY KEY (`lease_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `relative`
--
ALTER TABLE `relative`
  ADD PRIMARY KEY (`relative_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `waiting`
--
ALTER TABLE `waiting`
  ADD PRIMARY KEY (`waiting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreement`
--
ALTER TABLE `agreement`
  MODIFY `lease_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relative`
--
ALTER TABLE `relative`
  MODIFY `relative_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `waiting`
--
ALTER TABLE `waiting`
  MODIFY `waiting_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
