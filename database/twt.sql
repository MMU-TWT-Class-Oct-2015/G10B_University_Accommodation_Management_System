-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-02-07 04:45:13
-- 服务器版本： 10.1.9-MariaDB
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
-- 表的结构 `agreement`
--

CREATE TABLE `agreement` (
  `lease_id` varchar(5) NOT NULL,
  `place_id` varchar(5) NOT NULL,
  `student_id` varchar(5) NOT NULL,
  `date_start` varchar(50) NOT NULL,
  `date_end` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `course_id` varchar(5) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_leader` varchar(50) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_leader`, `department_name`) VALUES
('ITCN', 'Computer Networking', 'Dr. Diego Costa', 'Faculty of Information Science & Technology'),
('ITMIS', 'Management in Information System', 'Dr. Jose Mourinho', 'Faculty of Information Science & Technology'),
('ITST', 'Security Technology', 'DR. Lim Eng Huat', 'Faculty of Information Science & Technology');

-- --------------------------------------------------------

--
-- 表的结构 `hall`
--

CREATE TABLE `hall` (
  `hall_id` varchar(5) NOT NULL,
  `hall_name` varchar(10) NOT NULL,
  `hall_address` varchar(50) NOT NULL,
  `hall_hp` int(11) NOT NULL,
  `hall_manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `hall_address`, `hall_hp`, `hall_manager`) VALUES
('H0001', 'Hall A', '1, jalan 1, taman 1', 123456789, 'Frank Lampard'),
('H0002', 'Hall B', '2, jalan 2, taman 2', 123456789, 'John Terry');

-- --------------------------------------------------------

--
-- 表的结构 `relative`
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
-- 转存表中的数据 `relative`
--

INSERT INTO `relative` (`relative_id`, `relative_name`, `relative_relation`, `relative_address`, `relative_hp`, `student_id`) VALUES
(1, 'Ezio Tiu', 'Father', '15, Jalan Bobo, Taman Ina', '123456789', 1121116126);

-- --------------------------------------------------------

--
-- 表的结构 `room`
--

CREATE TABLE `room` (
  `place_id` varchar(5) NOT NULL,
  `room_num` int(5) NOT NULL,
  `room_rent` int(3) NOT NULL,
  `hall_id` varchar(5) NOT NULL,
  `room_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `room`
--

INSERT INTO `room` (`place_id`, `room_num`, `room_rent`, `hall_id`, `room_status`) VALUES
('P0001', 15, 200, 'H0001', 'none'),
('P0002', 16, 200, 'H0001', 'none'),
('P0003', 30, 200, 'H0002', 'none'),
('P0004', 31, 200, 'H0002', 'none');

-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_role` varchar(50) NOT NULL,
  `staff_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_role`, `staff_pass`) VALUES
(1121116666, 'Harry Kane', 'Admin', '123456789');

-- --------------------------------------------------------

--
-- 表的结构 `student`
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
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_address`, `student_dob`, `student_category`, `student_status`, `course_id`, `student_pass`, `student_hp`) VALUES
(1121116126, 'Toures Tiu', '15, Jalan Emas, Taman Taktau', '2016-01-01', 'undergraduate', 'none', 'ITST', '123456789', '0123456789');

-- --------------------------------------------------------

--
-- 表的结构 `waiting`
--

CREATE TABLE `waiting` (
  `waiting_id` int(5) NOT NULL,
  `place_id` varchar(5) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `wait_start` varchar(50) NOT NULL,
  `wait_end` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `relative`
--
ALTER TABLE `relative`
  MODIFY `relative_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `waiting`
--
ALTER TABLE `waiting`
  MODIFY `waiting_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
