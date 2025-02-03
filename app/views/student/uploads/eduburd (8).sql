-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 10:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduburd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(10) NOT NULL,
  `grade_class_id` int(10) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `deadline` datetime(6) NOT NULL,
  `file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `grade_class_id`, `title`, `description`, `deadline`, `file`) VALUES
(3, NULL, 'farshad', 'gombettah\r\nthadiya\r\nhotu kolla', '2024-11-30 09:29:50.960419', 0x75706c6f6164732f323032312d47726164652d30382d4d617468732d54686972642d5465726d2d50617065722d576974682d416e73776572732d5765737465726e2d50726f76696e63652d70616765732d64656c657465642e706466);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE `assignment_submission` (
  `assignment_submission_id` int(10) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `file` mediumblob NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `result` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment_submission`
--

INSERT INTO `assignment_submission` (`assignment_submission_id`, `assignment_id`, `file`, `created_at`, `result`) VALUES
(2, 3, 0x2e52686973746f7279, '2024-11-29 11:23:04.000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `class_history`
--

CREATE TABLE `class_history` (
  `class_history_id` int(10) NOT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `grade`, `description`) VALUES
(1, 'English', 'Primary', 'English Language');

-- --------------------------------------------------------

--
-- Table structure for table `course_class`
--

CREATE TABLE `course_class` (
  `course_class_id` int(10) NOT NULL,
  `grade_class_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_grade`
--

CREATE TABLE `course_grade` (
  `course_grade_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `grade_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_grade`
--

INSERT INTO `course_grade` (`course_grade_id`, `course_id`, `grade_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `tutor_name` int(100) NOT NULL,
  `course_name` int(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `tutor_name`, `course_name`, `rating`, `comments`) VALUES
(3, 0, 0, 2, 'gftg');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(10) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `grade_class`
--

CREATE TABLE `grade_class` (
  `grade_class_id` int(10) NOT NULL,
  `tutor_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_class`
--

INSERT INTO `grade_class` (`grade_class_id`, `tutor_id`, `student_id`, `course_id`, `date`, `time`, `description`) VALUES
(1, 1, 1, 1, '2024-11-29', '19:55:00.000000', 'TEst');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `user_id`, `nic`) VALUES
(1, 11, '23456788900d'),
(2, 14, '23456788900'),
(3, 17, '23456788900d');

-- --------------------------------------------------------

--
-- Table structure for table `parent_student`
--

CREATE TABLE `parent_student` (
  `parent_student_id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `nick_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_student_request`
--

CREATE TABLE `parent_student_request` (
  `parent_student_request_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `method` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_library`
--

CREATE TABLE `resource_library` (
  `resource_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` int(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_library`
--

INSERT INTO `resource_library` (`resource_id`, `user_id`, `title`, `description`, `type`, `file_path`, `created_at`) VALUES
(1, 16, 'aa', 0, 'document', 'eduburd.sql', '2024-11-28'),
(3, 16, 'serh', 333, 'document', 'Tuition_Class2.drawio.pdf', '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`) VALUES
(1, 8),
(2, 9),
(3, 12),
(4, 13),
(5, 15),
(6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_subject_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `time_slot_id` int(10) NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `status` varchar(10) NOT NULL,
  `day` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `years_of_experience` int(4) NOT NULL,
  `cv` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `user_id`, `years_of_experience`, `cv`) VALUES
(1, 4, 3, 0x433a5c78616d70705c6874646f63735c456475627572645c7369676e75705c7369676e75702f75706c6f6164732f323032312d47726164652d30382d4d617468732d54686972642d5465726d2d50617065722d576974682d416e73776572732d5765737465726e2d50726f76696e63652d70616765732d64656c657465642e706466),
(2, 18, 3, 0x433a5c78616d70705c6874646f63735c456475627572645c7369676e75705c7369676e75702f75706c6f6164732f323031392d47726164652d30382d4d617468656d61746963732d54686972642d5465726d2d546573742d50617065722d416e756c612d436f6c6c6167652e706466),
(3, 19, 2, 0x433a5c78616d70705c6874646f63735c656475627572645c76696577735c7475746f722f75706c6f6164732f43726561746520414945534543206d61696c732e706466);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorial_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `upload` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorial_id`, `class_id`, `title`, `description`, `upload`) VALUES
(1, 1, 'English', 'Introduction', ''),
(2, 1, 'Database', 'Introduction', ''),
(3, 1, 'Database', 'Intro', 0x42695765656b6c795265706f72742d312e646f6378);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_admin_request`
--

CREATE TABLE `tutor_admin_request` (
  `tutor_admin_request_id` int(10) NOT NULL,
  `tutor_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_student`
--

CREATE TABLE `tutor_student` (
  `tutor_student_id` int(10) NOT NULL,
  `tutor_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_student_request`
--

CREATE TABLE `tutor_student_request` (
  `request_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `tutor_id` int(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_subject`
--

CREATE TABLE `tutor_subject` (
  `tutor_course_id` int(10) NOT NULL,
  `tutor_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(6) NOT NULL,
  `contact_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_role`, `first_name`, `last_name`, `email`, `dob`, `password`, `contact_no`) VALUES
(1, 'student', 'aa', 'aa', 'ss@gmail.com', '0000-00-00', '$2y$10', 1111),
(2, '', 'w', 'aa', 'qq@gmail.com', '0000-00-00', '$2y$10', 222),
(3, '', 'w', 'ww', 'ww@gmail.com', '2024-11-29', '$2y$10', 123),
(4, '', 'aa', 'ss', 'as@gmail.com', '2024-11-08', '$2y$10', 555),
(8, '', 'A', 'gg', 'ccc@gmail.com', '2024-10-27', '$2y$10', 555),
(9, '', 'A', 'gg', 'ccs@gmail.com', '2024-10-27', '$2y$10', 555),
(11, '', 'ssss', 'aaaa', 'hhs@gmail.com', '2024-10-27', '$2y$10', 123),
(12, '', 'chathumini', 'rashmika', 'chathuminirashmika7@gmail.com', '2024-10-27', '$2y$10', 112224448),
(13, '', 'chathu', 'rashmika', 'chathurashmika7@gmail.com', '2024-10-27', '$2y$10', 112224448),
(14, '', 'sasindu', 'chathuranga', 'sasindu@gmail.com', '2024-11-12', '12345', 223),
(15, '', 'farshad', 'fahumy', 'farshad@gmail.com', '2024-10-27', '1234', 98),
(16, 'student', 'kamala', 'wathi', 'zx@gmail.com', '2024-12-06', '1234', 1234),
(17, 'parent', 'lalith', 'kumara', 'cv@gmail.com', '2024-11-01', '4567', 456),
(18, 'tutor', 'kumudu', 'witha', 'sj234@gmail.com', '2024-11-02', '234', 345),
(19, 'tutor', 'farshad', 'paga', 'sssss@gmail.com', '2024-11-16', '12222', 1122244481),
(20, 'tutor', 'Ayathma', 'Amanethmi', 'ayathma@gmail.com', '2024-11-01', '1111', 1234556),
(21, 'admin', 'Farshad', 'Fahumy', 'farshad1@gmail.com', '2024-11-29', '2222', 2222);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `class_id` (`grade_class_id`);

--
-- Indexes for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD PRIMARY KEY (`assignment_submission_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `class_history`
--
ALTER TABLE `class_history`
  ADD PRIMARY KEY (`class_history_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_class`
--
ALTER TABLE `course_class`
  ADD PRIMARY KEY (`course_class_id`),
  ADD KEY `grade_class_id` (`grade_class_id`);

--
-- Indexes for table `course_grade`
--
ALTER TABLE `course_grade`
  ADD PRIMARY KEY (`course_grade_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `grade_class`
--
ALTER TABLE `grade_class`
  ADD PRIMARY KEY (`grade_class_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`course_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `parent_student`
--
ALTER TABLE `parent_student`
  ADD PRIMARY KEY (`parent_student_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `parent_student_request`
--
ALTER TABLE `parent_student_request`
  ADD PRIMARY KEY (`parent_student_request_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `resource_library`
--
ALTER TABLE `resource_library`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_subject_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`time_slot_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `tutor_admin_request`
--
ALTER TABLE `tutor_admin_request`
  ADD PRIMARY KEY (`tutor_admin_request_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `tutor_student`
--
ALTER TABLE `tutor_student`
  ADD PRIMARY KEY (`tutor_student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `tutor_student_request`
--
ALTER TABLE `tutor_student_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `tutor_subject`
--
ALTER TABLE `tutor_subject`
  ADD PRIMARY KEY (`tutor_course_id`),
  ADD KEY `subject_id` (`course_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  MODIFY `assignment_submission_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_history`
--
ALTER TABLE `class_history`
  MODIFY `class_history_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_class`
--
ALTER TABLE `course_class`
  MODIFY `course_class_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_grade`
--
ALTER TABLE `course_grade`
  MODIFY `course_grade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade_class`
--
ALTER TABLE `grade_class`
  MODIFY `grade_class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent_student`
--
ALTER TABLE `parent_student`
  MODIFY `parent_student_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_student_request`
--
ALTER TABLE `parent_student_request`
  MODIFY `parent_student_request_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_library`
--
ALTER TABLE `resource_library`
  MODIFY `resource_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `student_subject_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `time_slot_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorial_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tutor_admin_request`
--
ALTER TABLE `tutor_admin_request`
  MODIFY `tutor_admin_request_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutor_student`
--
ALTER TABLE `tutor_student`
  MODIFY `tutor_student_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutor_student_request`
--
ALTER TABLE `tutor_student_request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutor_subject`
--
ALTER TABLE `tutor_subject`
  MODIFY `tutor_course_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class` (`grade_class_id`);

--
-- Constraints for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD CONSTRAINT `assignment_submission_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`assignment_id`);

--
-- Constraints for table `course_class`
--
ALTER TABLE `course_class`
  ADD CONSTRAINT `course_class_ibfk_1` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class` (`grade_class_id`),
  ADD CONSTRAINT `course_class_ibfk_2` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class` (`grade_class_id`);

--
-- Constraints for table `course_grade`
--
ALTER TABLE `course_grade`
  ADD CONSTRAINT `course_grade_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_grade_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`);

--
-- Constraints for table `grade_class`
--
ALTER TABLE `grade_class`
  ADD CONSTRAINT `grade_class_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `grade_class_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `grade_class_ibfk_3` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `parent_student`
--
ALTER TABLE `parent_student`
  ADD CONSTRAINT `parent_student_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`),
  ADD CONSTRAINT `parent_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `parent_student_request`
--
ALTER TABLE `parent_student_request`
  ADD CONSTRAINT `parent_student_request_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`),
  ADD CONSTRAINT `parent_student_request_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `grade_class` (`grade_class_id`);

--
-- Constraints for table `resource_library`
--
ALTER TABLE `resource_library`
  ADD CONSTRAINT `resource_library_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `grade_class` (`grade_class_id`);

--
-- Constraints for table `tutor_admin_request`
--
ALTER TABLE `tutor_admin_request`
  ADD CONSTRAINT `tutor_admin_request_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `tutor_student`
--
ALTER TABLE `tutor_student`
  ADD CONSTRAINT `tutor_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `tutor_student_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `tutor_student_request`
--
ALTER TABLE `tutor_student_request`
  ADD CONSTRAINT `tutor_student_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `tutor_student_request_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `tutor_subject`
--
ALTER TABLE `tutor_subject`
  ADD CONSTRAINT `tutor_subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `tutor_subject_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
