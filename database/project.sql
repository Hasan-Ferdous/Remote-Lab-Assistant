-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 05:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `roll` int(12) NOT NULL,
  `attendance_date` date NOT NULL DEFAULT current_timestamp(),
  `course_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`roll`, `attendance_date`, `course_name`, `status`) VALUES
(1903001, '2023-08-08', 'CSE 1101', 'present'),
(1903002, '2023-08-08', 'CSE 1101', 'present'),
(1903003, '2023-08-08', 'CSE 1101', 'absent'),
(1903121, '2023-08-08', 'CSE 1101', 'present'),
(1903122, '2023-08-08', 'CSE 1101', 'absent'),
(1903123, '2023-08-08', 'CSE 1101', 'absent'),
(1903124, '2023-08-08', 'CSE 1101', 'present'),
(1903001, '2023-08-09', 'CSE 1101', 'present'),
(1903002, '2023-08-09', 'CSE 1101', 'present'),
(1903003, '2023-08-09', 'CSE 1101', 'absent'),
(1903121, '2023-08-09', 'CSE 1101', 'absent'),
(1903122, '2023-08-09', 'CSE 1101', 'absent'),
(1903123, '2023-08-09', 'CSE 1101', 'present'),
(1903124, '2023-08-09', 'CSE 1101', 'present'),
(1903001, '2023-08-07', 'CSE 1101', 'absent'),
(1903002, '2023-08-07', 'CSE 1101', 'absent'),
(1903003, '2023-08-07', 'CSE 1101', 'present'),
(1903121, '2023-08-07', 'CSE 1101', 'present'),
(1903122, '2023-08-07', 'CSE 1101', 'present'),
(1903123, '2023-08-07', 'CSE 1101', 'present'),
(1903124, '2023-08-07', 'CSE 1101', 'absent'),
(1903001, '2023-08-08', 'CSE 1101', 'present'),
(1903002, '2023-08-08', 'CSE 1101', 'absent'),
(1903003, '2023-08-08', 'CSE 1101', 'present'),
(1903121, '2023-08-08', 'CSE 1101', 'absent'),
(1903122, '2023-08-08', 'CSE 1101', 'present'),
(1903123, '2023-08-08', 'CSE 1101', 'absent'),
(1903124, '2023-08-08', 'CSE 1101', 'present'),
(1903001, '2023-08-08', 'CSE 1101', 'present'),
(1903002, '2023-08-08', 'CSE 1101', 'absent'),
(1903003, '2023-08-08', 'CSE 1101', 'present'),
(1903121, '2023-08-08', 'CSE 1101', 'absent'),
(1903122, '2023-08-08', 'CSE 1101', 'present'),
(1903123, '2023-08-08', 'CSE 1101', 'present'),
(1903124, '2023-08-08', 'CSE 1101', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `submission_id` bigint(20) UNSIGNED NOT NULL,
  `roll` int(11) DEFAULT NULL,
  `problem_id` varchar(50) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `response` text DEFAULT NULL,
  `code_language` varchar(20) NOT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`submission_id`, `roll`, `problem_id`, `course_name`, `response`, `code_language`, `submission_time`) VALUES
(38, 1903001, 'P001', 'CSE 1101', '#include <stdio.h>\r\n\r\nint main()\r\n{\r\n    printf(\"Hello World\");\r\n\r\n    return 0;\r\n}\r\n', 'c', '2023-08-08 13:50:00'),
(39, 1903002, 'P001', 'CSE 1101', '#include <stdio.h>\r\n\r\nint main()\r\n{\r\n    printf(\"Hello World\");\r\n\r\n    return 0;\r\n}\r\n', 'c', '2023-08-08 13:50:22'),
(40, 1903122, 'P001', 'CSE 1101', '#include <stdio.h>\r\n\r\nint main()\r\n{\r\n    printf(\"Hello World\");\r\n\r\n    return 0;\r\n}\r\n', 'c', '2023-08-08 13:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` int(11) NOT NULL,
  `student_roll` varchar(20) NOT NULL,
  `joined_course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `student_roll`, `joined_course`) VALUES
(5, '1903002', 'CSE 1101'),
(9, '1903135', 'CSE 2103'),
(15, '1903003', 'CSE 1101'),
(16, '1903121', 'CSE 1101'),
(17, '1903122', 'CSE 1101'),
(18, '1903123', 'CSE 1101'),
(19, '1903124', 'CSE 1101'),
(25, '1903001', 'CSE 1101');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(50) DEFAULT NULL,
  `course` varchar(50) NOT NULL,
  `student_roll` int(11) DEFAULT NULL,
  `problem_no` varchar(20) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `f_back` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `teacher_name`, `course`, `student_roll`, `problem_no`, `post_time`, `f_back`) VALUES
(19, 'Prodosh C. Mitter', 'CSE 1101', 1903001, 'P001', '2023-08-08 17:52:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lobortis tempor finibus. Nullam in luctus ex. Vestibulum pulvinar, augue et semper viverra, ex odio rutrum lectus, vitae lobortis eros ipsum et libero. Morbi mattis condimentum sem eu fermentum. Curabitur maximus lectus non convallis fringilla. Sed suscipit vitae velit eu auctor. Cras egestas ultrices facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean vitae sodales massa. Ut vehicula tincidunt ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec convallis odio et lectus semper semper. Aenean in tincidunt elit, in scelerisque risus. Nullam in urna massa. Sed nibh ex, rhoncus a commodo vel, hendrerit eleifend nunc.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `username`, `email`, `password`) VALUES
(1803256, 'Ani Chawdhury', 'anu@gmail.com', '123456'),
(1903001, 'Pi Patel', 'pi@gmail.com', '123456'),
(1903002, 'Himaloy Himu', 'himu@gmail.com', '123456'),
(1903003, 'Rashed', 'rashed@gmail.com', '123456'),
(1903121, 'Abdullah Mamun', 'abd@gmail.com', '123456'),
(1903122, 'Babul Supriyo', 'babul@gmail.com', '123456'),
(1903123, 'Chinmoy Sarkar', 'chinmoy@gmail.com', '123456'),
(1903124, 'Dipjyoti Ghosh', 'dip@gmail.com', '123456'),
(1903125, 'Elham Kazi', 'elham@gmail.com', '123456'),
(1903135, 'Jyoti ', 'jyotirmoyprohor44@gmail.com', '123456'),
(1903152, 'Souvik Biswas', 'souvik@gmail.com', '123456'),
(1903166, 'Ferdous Hasan', 'ferdous@gmail.com', '123456'),
(1903566, 'Sifat Uz Zaman', 'zaman@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `problem_id` char(4) NOT NULL,
  `teacher_id` char(4) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `posting_time` datetime DEFAULT NULL,
  `statement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `task`
--
DELIMITER $$
CREATE TRIGGER `task_id_trigger` BEFORE INSERT ON `task` FOR EACH ROW BEGIN
    SET NEW.problem_id = CONCAT('P', LPAD((SELECT COUNT(*) FROM task) + 1, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` char(4) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `course_name`, `email`, `password`) VALUES
('t001', 'Prodosh C. Mitter', 'CSE 1101', 'feluda@gmail.com', '123456'),
('t002', 'Abdul Kalam', 'CSE 2103', 'kalam@gmail.com', '123456'),
('t003', 'Abdul Kaium', 'CSE 4201', 'abdulk@gmail.com', '123456'),
('t004', 'Md. Hanif Ahmed', 'CSE 3203', 'hanif@gmail.com', '123456'),
('t005', 'rittic saha', 'CSE 4205', 'saha@gmail.com', '123456');

--
-- Triggers `teacher`
--
DELIMITER $$
CREATE TRIGGER `teacher_id_trigger` BEFORE INSERT ON `teacher` FOR EACH ROW BEGIN
    SET NEW.teacher_id = CONCAT('t', LPAD((SELECT COUNT(*) FROM teacher) + 1, 3, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`problem_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_id` (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `submission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
